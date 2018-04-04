<?php

namespace Icocheckr\Http\Controllers\Auth;

use Icocheckr\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// use Icocheckr\Http\Request as loginRequest;
use Illuminate\Http\Request as loginRequest, Input, Redirect, App, Carbon, Crypt, Mail;
use Illuminate\Contracts\Encryption\DecryptException;
use Icocheckr\User;

use Icocheckr\Mail\UserRegistered;

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
	public function getLogin()
	{
		
		if (Auth::check()){
			return Redirect('/');
		}
		else{
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
			if (isset($request->r)){
				return redirect($request->r);
			}
			else{
				return redirect('/home');
			}
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
		Mail::to($user->email)->bcc($adminEmails)->queue(new UserRegistered($emaildata));



		return redirect('forgot-password')->with(array('success'=>'1',));
	}
	
	public function redirect_auth(req $request,$cryptedcode)
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
	
	public function change_password(req $request){
		$email = $request->session()->get('email');
		$user = User::where("email",'=',$email)->first();
		$user->password = Request::input("password");
		$user->save();
		return redirect('login')->with(array("success"=>"Password berhasil diganti"));
	}


	
}
