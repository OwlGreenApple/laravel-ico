<?php

namespace Icocheckr\Http\Controllers\Auth;

use Icocheckr\User;
use Icocheckr\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request as req;

use Icocheckr\Mail\UserRegistered;

use Carbon, Hash, App, Crypt, Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Icocheckr\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

		/**
		 * Menampilkan Halaman Register
		 *
		 * @return response
		 */
		public function getRegister(req $request)
		{
			if ($request->session()->has('register_data')) {
				$request->session()->forget('register_data');
			}
			if (session('user_data')){
				$user_data = session('user_data');
			}
			else{
				$user_data = [
					'username' => '',
					'email' => '',
					'social_login' => false,
					'social_token' => '',
				];
			}
			// dd($user_data);
			return view('auth/register')->with([
				'user_data' => $user_data,
				// 'grecaptcha_key' => env('GOOGLE_RECAPTCHA_KEY'),
			]);
		}
		
		/**
		 * Memproses Data User yang mendaftar
		 *
		 * @return response
		 */
		public function postRegister(req $request)
		{
			$validator  = User::validator($request->all());
			if (!$validator->fails()){
				$user = User::create($request->all());
			} 
			else {
				return redirect("register")->with("error","email already registered");
			}
			
			//Auth::attempt(['email' => $request->email, 'password' => $request->password], true);
			//send email konfirmasi email
			$register_time = Carbon::now()->toDateTimeString();
			$request->session()->put('resend_email', $register_time);
			$verificationcode = Hash::make($user->email.$register_time);
			$user->verification_code = $verificationcode;
			$user->save();
			if (App::environment() == 'local'){
				$url = 'https://localhost/icocheckr/public/verifyemail';
			}
			else if (App::environment() == 'production'){
				$url = 'https://icocheckr.com/verifyemail/';
			}
			$secret_data = [
				'email' => $user->email,
				'register_time' => $register_time,
				'verification_code' => $verificationcode,
			];
			$emaildata = [
				'url' => $url.Crypt::encrypt(json_encode($secret_data)),
				'user' => $user,
				'password' => $request->password,
			];
			/*Mail::queue('emails.confirm-email', $emaildata, function ($message) use ($user) {
				$message->from('no-reply@celebgramme.com', 'Celebgramme');
				$message->to($user->email);
				$message->subject('[Celebgramme] Email Confirmation');
			});*/
			Mail::to($user->email)->queue(new UserRegistered($emaildata));

			return redirect('/');
			/*if (! $request->session()->has('checkout_data')) {
				//return redirect('/home');
				// return Redirect::to("http://celebgramme.com/email-konfirmasi/");
			} 
			else {
				$user->valid_until = "0000-00-00 00:00:00";
				$user->status_free_trial = 0;
				$user->save();

				$checkout_data = $request->session()->get('checkout_data');
				$package = Package::find($checkout_data["package_id"]);
				
				if ($checkout_data["payment_method"]== 1) {
					$data = array (
						"order_type" => "transfer_bank",
						"order_status" => "pending",
						"user_id" => $user->id,
						"order_total" => $checkout_data["total"],
						"package_id" => $checkout_data["package_id"],
						"package_manage_id" => $checkout_data["package_manage_id"],
						"coupon_code" => $checkout_data["coupon_code"],
						"logs" => "NEW MEMBER",
					);
					
					$order = Order::createOrder($data, true);
					// return redirect('/home');
					return Redirect::to("http://celebgramme.com/halaman-konfirmasi/");
				}
				
				if ($checkout_data["payment_method"]== 2) {
					
					// Validation passes
					$vt = new Veritrans;
					// Populate items
					$items = [];

					// package
					array_push($items, [
						'id' => '#Package',
						'price' => $checkout_data['total'],
						'quantity' => 1,
						'name' => "Paket ".$package->package_name,
					]);
					$totalPrice = $checkout_data['total'];
					// Populate customer's billing address
					$billing_address = [
						'first_name' => $user->fullname,
						'last_name' => "",
						'phone' => $user->phone_number,
					];

					// Populate customer's Info
					$customer_details = array(
						'first_name' => $user->fullname,
						'last_name' => "",
						'email' => $user->email,
						'billing_address' => $billing_address,
					);
						
					$checkout_data['unique_id'] = uniqid();
					$transaction_data = array(
						'payment_type' => 'vtweb', 
						'vtweb' => array(
								// 'enabled_payments' => ["credit_card"],
								'credit_card_3d_secure' => true
						),
						'transaction_details'=> array(
							'order_id' => $checkout_data['unique_id'],
							'gross_amount' => $totalPrice
						),
						'item_details' => $items,
						'customer_details' => $customer_details
					);
					try
					{
						$checkout_data["order_type"] = "VERITRANS";
						$checkout_data["order_status"] = "PENDING";
						$checkout_data["user_id"] = $user->id;
						$checkout_data["order_total"] = $totalPrice;
						$checkout_data["email"] = $user->email;
						$checkout_data["package_id"] = $package->id;
						$request->session()->put('checkout_data', $checkout_data);
						$vtweb_url = $vt->vtweb_charge($transaction_data);
						return redirect($vtweb_url);
					} 
					catch (Exception $e) 
					{   
						return $e->getMessage;
					}
					
				}
				$request->session()->forget('checkout_data');
				
			}*/
		}

}
