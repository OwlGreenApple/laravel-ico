<?php

namespace Icocheckr\Http\Controllers\Auth;

use Icocheckr\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// use Icocheckr\Http\Request as loginRequest;
use Illuminate\Http\Request as loginRequest, Input, Redirect, App, Carbon, Crypt, Mail;
use Illuminate\Contracts\Encryption\DecryptException;
use Icocheckr\User;

use Icocheckr\Mail\ForgotPassword;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        // $this->middleware('guest')->except('logout');
			$this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

	/**
	 * Menampilkan halaman login
	 *
	 * @return response
	 */
	public function getLogin(loginRequest $request)
	{
		
		if (Auth::check()){
			return Redirect('/');
		}
		else{
			$request->session()->put('url.intended',url()->previous());
			
			return view('auth/login');
			// return view("auth.login")->with(array(
				// 'content'=>$content,
				// ));
		}
	}
	
	/**
	 * login kedalam aplikasi
	 *
	 * var loginRequest $request
	 *
	 * @return response
	 */
	public function postLogin(loginRequest $request)
	{
		$remember = (Input::has('remember')) ? true : false;
		$field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		if (Auth::attempt([$field => $request->email, 'password' => $request->password], $remember)) {
			/*if (isset($request->r)){
				return redirect($request->r);
			}
			else{
				return redirect('/home');
			}*/
			return redirect($request->session()->get('url.intended'));
		} else {
			return Redirect::to('/login')
				->with(array("error"=>"Login anda salah"));
		}
	}
	
	/**
	 * logout
	 *
	 *
	 * @return response
	 */
	public function getLogout(loginRequest $request)
	{
		$request->session()->flush();
		Auth::logout();
		return Redirect('/');
	}
	
	
	public function forgot_password() {
		return view('auth.forgot-password');
	}
	
	public function auth_forgot(loginRequest $request) {
		$email = $request->username;
		$user = User::where('email','=',$email)->first();
		if (is_null($user)) {
			return redirect('forgot-password')->with(array('error'=>'1',));
		}
		if (App::environment() == 'local'){
			$url = 'https://localhost/icocheckr/public/redirect-auth/';
		}
		else if (App::environment() == 'production'){
			$url = 'https://icocheckr.com/redirect-auth/';
		}
		$secret_data = [
			'email' => $email,
			'register_time' => Carbon::now()->toDateTimeString(),
		];
		$emaildata = [
			'url' => $url.Crypt::encrypt(json_encode($secret_data)),
		];
		/*Mail::queue('emails.forgot-password', $emaildata, function ($message) use ($email) {
			$message->from('no-reply@celebgramme.com', 'Celebgramme');
			$message->to($email);
			$message->subject('[Celebgramme] Email Forgot & RESET Password');
		});*/
		//new ways to send email
		Mail::to($user->email)->queue(new ForgotPassword($emaildata));



		return redirect('forgot-password')->with(array('success'=>'1',));
	}
	
	public function redirect_auth(loginRequest $request,$cryptedcode)
	{
		try {
			$decryptedcode = Crypt::decrypt($cryptedcode);
			$data = json_decode($decryptedcode);
			$user = User::where("email","=",$data->email)->first();
			if (!is_null($user)) {
				$request->session()->put('email', $data->email);
				return view('auth.new-password');
			} else{
				return redirect("http://celebgramme.com/error-page/");
			}
		} catch (DecryptException $e) {
			return redirect("http://celebgramme.com/error-page/");
		}
	}	
	
	public function change_password(loginRequest $request){
		$email = $request->session()->get('email');
		$user = User::where("email",'=',$email)->first();
		$user->password = $request->password;
		$user->save();
		return redirect('login')->with(array("success"=>"Password successfully replaced"));
	}


  public function verifyEmail($cryptedcode)
  {
		try {
			$decryptedcode = Crypt::decrypt($cryptedcode);
			$data = json_decode($decryptedcode);
			$user = User::where("email","=",$data->email)->first();
			if (!is_null($user)) {
				// Check customer email and status
				if (!$user->is_confirm_email){
					// Check Verification Code
					if ($user->verification_code == $data->verification_code){
						$reg_date = Carbon::createFromFormat('Y-m-d H:i:s', $data->register_time);
							// Change customer status to verified, then redirect to Home
							$user->is_confirm_email = 1;
							$user->save();
							
							return redirect('/login')->with("success","Welcome to ICOCheckr! Thank you for confirming your e-mail address.");  //masih belum fix, harusnya ke thank you page, karena ada kemungkinan user sudah login sebelum link ini diklik.
					}
					else{
						return redirect(404);
					}
				}
				else{
					return redirect(404);
				}
			}
			else{
				return redirect(404);
			}
		} catch (DecryptException $e) {
			return redirect(404);
		}
  }
	
}
