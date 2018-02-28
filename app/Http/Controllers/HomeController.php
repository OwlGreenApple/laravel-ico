<?php

namespace Icocheckr\Http\Controllers;

use Illuminate\Http\Request as req;

use Icocheckr\Ico;
use Icocheckr\Subscribe;
use Validator;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
			// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('home')->with([
		]);
	}
	
	public function load_ico_home_banner(req $request)
  {
		$arr = Ico::all();

		return view('load-ico-banner')->with(
								array(
									'arr'=>$arr,
								));
  }

	public function load_ico_home(req $request)
  {
		$arr = Ico::all();

		return view('load-ico')->with(
								array(
									'arr'=>$arr,
								));
  }

	public function subscribe(req $request)
	{
		$arr["type"] = "success";
		$arr["message"] = "Email subscribed";
		
		$temp = array (
			"email" => $request->email,
		);
		$validator = Validator::make($temp, [
			'email' => 'email|max:255',
		]);
		if ($validator->fails()){
			$arr["type"] = "error";
			$arr["message"] = "Email wrong format";
		}
		
		$subscribe = Subscribe::where("email",$request->email)->first();
		if (is_null($subscribe)) {
			$subscribe = new Subscribe;
			$subscribe->name=$request->name;
			$subscribe->email=$request->email;
			$subscribe->save();
		}
		else {
			$arr["type"] = "error";
			$arr["message"] = "Subscribe failed";
		}
		
		return $arr;
	}
}
