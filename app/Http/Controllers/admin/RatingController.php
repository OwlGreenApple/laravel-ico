<?php namespace Icocheckr\Http\Controllers\Admin;

use Illuminate\Http\Request as req;
use Icocheckr\Http\Controllers\Controller;

use Icocheckr\Ico;
use Icocheckr\Rating;

use View,Auth,Request,DB,Carbon,Excel, Mail, Validator, Input, Config;

class RatingController extends Controller {


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
					
		return view('admin.rating.index')->with([
			'user'=>$user,
		]);
	}
  
	public function load_rating_admin(req $request)
  {
		$user = Auth::user();
		$perPage = 15;
		$arr = Rating::paginate($perPage);
					
			
			
		//buat pagination
		$total_data = count($arr);
		$page = $request->page; // Get the current page or default to 1, this is what you miss!
		// $offset = ($page * $perPage) - $perPage;
		$totalPage = floor($total_data / $perPage) +1;
			
		return view('admin.rating.content')->with(
								array(
									'arr'=>$arr,
									'page'=>$page,
									'totalPage'=>$totalPage,
								));
  }

	public function save_rating_admin(req $request)
  {
    $arr["type"] = "success";
    $arr["message"] = "Proses save ico berhasil dilakukan";
		
		if ($request->idIco=="new"){
			Ico::create($request->all());
		}
		else {
			Ico::find($request->idIco)->update($request->all());
		}
		
		return $arr;
	}

	public function delete_ico_admin(req $request)
	{
    $arr["type"] = "success";
    $arr["message"] = "Proses save ico berhasil dilakukan";
		
		Ico::find($request->id)->delete();
		
		return $arr;
	}
}

