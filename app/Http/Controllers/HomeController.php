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
  protected $mailchimp;
  protected $listId='660d661c25';

	public function __construct(\Mailchimp $mailchimp)
	{
			// $this->middleware('auth');
      $this->mailchimp=$mailchimp;
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
		$arr = Ico::where("status","ongoing")
					->orWhere("status","upcoming")
					->orderBy("rating", "desc")
					->paginate(8);

		return view('load-ico-banner')->with(
								array(
									'arr'=>$arr,
								));
  }

	public function load_ico_home(req $request)
  {
		if ($request->s=="all") {
			$arr = Ico::where("rating",">=",7)->orderBy("id","desc")->paginate(8);
		}
		else {
			$arr = Ico::where("categories","like","%".$request->s."%")->where("rating",">=",7)->orderBy("id","desc")->paginate(8);
		}

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
      //dd("test");
			$subscribe = new Subscribe;
			$subscribe->name=$request->name;
			$subscribe->email=$request->email;
			$subscribe->save();
      //daftarin ke mailchimp
      try {
        $this->mailchimp
             ->lists
             ->subscribe(
                $this->listId,
                ['email'=> $request->email ],
                ['name' => $request->name ]
             );
      } catch (\Mailchimp_List_AlreadySubscribed $e) {
        $arr["type"] = "error";
        $arr["message"] = "Already subscribe";
      } catch (\Mailchimp_Error $e) {
        $arr["type"] = "error";
        $arr["message"] = "Error Mailchimp";
      }
		}
		else {
			$arr["type"] = "error";
			$arr["message"] = "Subscribe failed";
		}
		
		return $arr;
	}
}
