<?php namespace Icocheckr\Http\Controllers\Admin;

use Illuminate\Http\Request as req;
use Icocheckr\Http\Controllers\Controller;

use Icocheckr\Ico;
use Icocheckr\Submit;
use Icocheckr\Meta;
use Icocheckr\User;

use Icocheckr\Mail\ApplicationSubmitAdmin;

use View,Auth,Request,DB,Carbon,Excel, Mail, Validator, Input, Config;

class PublishController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show proxy page.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();

		return view('admin.publish.index')->with([
			'user'=>$user,
		]);
	}
  
	public function load_publish(req $request)
  {
		$user = Auth::user();
		$perPage = 15;
		
		if($request->s == "") {
			$arr = Submit::orderBy("id","desc");
			$total_data = count($arr->get());
		}
		else {
			$arr = Submit::where("ico_name","like","%".$request->s."%")->orderBy("id","desc");
			$total_data = count($arr->get());
		}

		//buat pagination
		// $total_data = count(Order::all());
		$arr = $arr->paginate($perPage);
		$page = $request->page; // Get the current page or default to 1, this is what you miss!
		// $offset = ($page * $perPage) - $perPage;
		$totalPage = floor($total_data / $perPage) + 1;
			
		return view('admin.publish.content')->with(
								array(
									'arr'=>$arr,
									'page'=>$page,
									'totalPage'=>$totalPage,
								));
  }

	public function submit_publish_ico(req $request)
  {
    $arr["type"] = "success";
    $arr["message"] = "Data Updated";
		
		$submit = Submit::find($request->id);
		if (!is_null($submit)) {
			$submit->status="accepted";
			$submit->save();
			
			$day = 0;
			if ($submit->type_application=="basic"){
				$day = 7;
			}
			else if ($submit->type_application=="boost"){
				$day = 15;
			}
			else if ($submit->type_application=="premium"){
				$day = 45;
			}
			else if ($submit->type_application=="platinum"){
				$day = 60;
			}
			
			$user = User::find($submit->user_id);
			$emaildata = [
				"day"=>$day,
			];
			Mail::to($user->email)
			->bcc(["celebgramme.dev@gmail.com","vendella.celebgramme@gmail.com"])
			->queue(new ApplicationSubmitAdmin($emaildata));
			
		}
		
		return $arr;
	}
	
}

