<?php

namespace Icocheckr\Http\Controllers\Auth;

use Icocheckr\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// use Icocheckr\Http\Request as loginRequest;
use Illuminate\Http\Request as loginRequest, Input, Redirect;

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
        $this->middleware('guest')->except('logout');
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
			return Redirect::to('/')
				->with(array("error"=>"Login anda salah"));
		}
	}
	
	/**
	 * logout
	 *
	 *
	 * @return response
	 */
	public function getLogout(Request $request)
	{
		$request->session()->flush();
		Auth::logout();
		return Redirect('/');
	}
	
		
}
