<?php namespace Icocheckr\Http\Controllers\Admin;

use Illuminate\Http\Request as req;
use Icocheckr\Http\Controllers\Controller;

use Icocheckr\Ico;
use Icocheckr\Meta;

use View,Auth,Request,DB,Carbon,Excel, Mail, Validator, Input, Config;

class IcoController extends Controller {


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

		return view('admin.ico.index')->with([
			'user'=>$user,
		]);
	}
  
	public function load_ico_admin(req $request)
  {
		$user = Auth::user();
		$perPage = 15;
		$arr = Ico::orderBy("id")->paginate($perPage);
					
			
			
		//buat pagination
		$total_data = count(Ico::all());
		$page = $request->page; // Get the current page or default to 1, this is what you miss!
		// $offset = ($page * $perPage) - $perPage;
		$totalPage = floor($total_data / $perPage) +1;
			
		return view('admin.ico.content')->with(
								array(
									'arr'=>$arr,
									'page'=>$page,
									'totalPage'=>$totalPage,
								));
  }

	public function save_ico_admin(req $request)
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

	public function save_ico_about(req $request)
  {
    $arr["type"] = "success";
    $arr["message"] = "Proses save about berhasil dilakukan";
		
		Ico::find($request->id)->update($request->all());
		
		return $arr;
	}

	public function save_ico_description(req $request)
  {
    $arr["type"] = "success";
    $arr["message"] = "Proses save description berhasil dilakukan";
		
		Ico::find($request->id)->update($request->all());
		
		return $arr;
	}

	public function save_ico_financial(req $request)
  {
    $arr["type"] = "success";
    $arr["message"] = "Proses save financial berhasil dilakukan";
		
		Ico::find($request->id)->update($request->all());
		
		return $arr;
	}

	public function save_ico_logo(req $request)
  {
    $arr["type"] = "success";
    $arr["message"] = "Proses save logo berhasil dilakukan";
		
		$ico = Ico::find($request->id_ico_logo);
		if (!is_null($ico)){
			$destinationPath = base_path().'/public/images/logo-ico';
			if (!file_exists($destinationPath)) {
				mkdir($destinationPath,0755,true);
			}
			$filename = $ico->id.".".$request->logo->getClientOriginalExtension();
			$request->logo->move($destinationPath, $filename);
			$ico->logo = $filename;
			$ico->save();
		}
		
		return $arr;
	}

	public function save_ico_icon(req $request)
  {
    $arr["type"] = "success";
    $arr["message"] = "Proses save link icon berhasil dilakukan";
		
		Meta::createMeta("twitter_link","icos",$request->id_icon,$request->twitter_link);
		Meta::createMeta("facebook_link","icos",$request->id_icon,$request->facebook_link);
		Meta::createMeta("github_link","icos",$request->id_icon,$request->github_link);
		Meta::createMeta("reddit_link","icos",$request->id_icon,$request->reddit_link);
		Meta::createMeta("bitcointalk_link","icos",$request->id_icon,$request->bitcointalk_link);
		Meta::createMeta("medium_link","icos",$request->id_icon,$request->medium_link);
		Meta::createMeta("telegram_link","icos",$request->id_icon,$request->telegram_link);
		
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

