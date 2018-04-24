<?php

namespace Icocheckr\Http\Controllers\Auth;

use Icocheckr\User;
use Icocheckr\Order;
use Icocheckr\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request as req;

use Icocheckr\Mail\UserRegistered;
use Icocheckr\Mail\OrderPremium;

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

			if ($request->session()->has('checkout_data')) {
				$checkout_data = $request->session()->get('checkout_data');
				
				$order = new Order;
				
				$dt = Carbon::now();
				$str = $dt->format('ymd');
				$order_number = Order::autoGenerateID($order, 'no_order', $str, 3, '0');
				$order->no_order = $order_number;
				
				$order->user_id = $user->id;
				$order->total = $checkout_data["total"];
				$order->status = "pending";
				$order->package = $checkout_data["package"];
				$order->image = "";
				$order->save();
				
				//send mail
				$dt1 = Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at);
				$emaildata = [
					'no_order' => $order->no_order,
					'total' => $order->total,
					'created' => $dt1->format('M d Y'),
				];
				Mail::to($user->email)->queue(new OrderPremium($emaildata));
				
				
				$request->session()->forget('checkout_data');
			}
			return redirect('/');
		}

}
