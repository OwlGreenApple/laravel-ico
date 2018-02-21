<?php namespace Icocheckr\Http\Controllers;

use Illuminate\Http\Request as req;
use Icocheckr\Http\Controllers\Controller;

use Icocheckr\Ico;

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
		$total_data = count($arr);
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

}

