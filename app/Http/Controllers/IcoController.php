<?php namespace Icocheckr\Http\Controllers;

use Illuminate\Http\Request as req;
use Icocheckr\Http\Controllers\Controller;

use Icocheckr\Ico;
use Icocheckr\Submit;

use View,Auth,Request,DB,Carbon,Excel, Mail, Validator, Input, Config;

class IcoController extends Controller {


	/**
	 * Show proxy page.
	 *
	 * @return Response
	 */
	public function index()
	{
					
		return view('ico.index')->with([
		]);
	}
  
	public function load_ico(req $request)
  {
		$perPage = 15;
		$arr = Ico::paginate($perPage);



		//buat pagination
		$total_data = Ico::all()->count();
		$page = $request->page; // Get the current page or default to 1, this is what you miss!
		// $offset = ($page * $perPage) - $perPage;
		$totalPage = floor($total_data / $perPage) +1;
			
		return view('ico.content')->with(
								array(
									'arr'=>$arr,
									'page'=>$page,
									'totalPage'=>$totalPage,
								));
  }

	public function detail(req $request, $ico_name)
  {
		$ico = Ico::where("name",$ico_name)->first();
		return view('ico.detail')->with([
			"ico"=>$ico,
		]);
	}
	
	public function publish(req $request)
  {
		return view('ico.publish')->with([
		]);
	}

	public function submit_publish_ico(req $request)
  {
    $arr["type"] = "success";
    $arr["message"] = "Submit success";
		
		Submit::create($request->all());
		
		return $arr;
	}

	
}

