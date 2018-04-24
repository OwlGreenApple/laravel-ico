<?php namespace Icocheckr\Http\Controllers\Admin;

use Illuminate\Http\Request as req;
use Icocheckr\Http\Controllers\Controller;

use Icocheckr\Ico;
use Icocheckr\Submit;
use Icocheckr\Meta;

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
			$arr = Submit::orderBy("id","desc")->paginate($perPage);
		}
		else {
			$arr = Submit::where("ico_name","like","%".$request->s."%")->orderBy("id","desc")->paginate($perPage);
		}
			
		//buat pagination
		// $total_data = count(Order::all());
		$total_data = count($arr);
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

	
}

