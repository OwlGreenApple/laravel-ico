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
			"type"=>"",
		]);
	}
  
	public function load_ico(req $request)
  {
		$perPage = 15;
		// dd($request->startDate);
		// $arr = Ico::paginate($perPage);
		$data = Ico::all();

		if ($request->name<>"") {
			$collection1 = Ico::where("name","like","%".$request->name."%")
										->get();
			$data = $data->intersect($collection1);
		}

		if ($request->status<>"rating") {
			$collection2 = Ico::where("rating",">",$request->rating)
									->get();
		}
		if ($request->startDate<>"") {
			$collection3 = Ico::whereDate("presale_start",">=",Carbon::createFromFormat("m/d/Y", $request->startDate))
									->orWhereDate("sale_start",">=",Carbon::createFromFormat("m/d/Y", $request->startDate))
									->get();
			$data = $data->intersect($collection3);
		}
		if ($request->endDate<>"") {
			$collection4= Ico::where("presale_end","<=",Carbon::createFromFormat("m/d/Y", $request->endDate))
									->orWhere("sale_end","<=",Carbon::createFromFormat("m/d/Y", $request->endDate))
									->get();
			$data = $data->intersect($collection4);
		}
		if ($request->modeSearch=="all"){
			if ($request->status<>"any") {
				$collection5 = Ico::where("status","=",$request->status)
										->get();
				$data = $data->intersect($collection5);
			}
			if ($request->category<>"all") {
				$collection6 = Ico::where("categories","like","%".$request->category."%")
										->get();
				$data = $data->intersect($collection6);
			}
			if ($request->country<>"") {
				$collection7 = Ico::where("country_operation","like","%".$request->country."%")
										->get();
				$data = $data->intersect($collection7);
			}
			if ($request->platform<>"any") {
				$collection8 = Ico::where("platform","like","%".$request->platform."%")
										->get();
				$data = $data->intersect($collection8);
			}
		}

		$arr = $data->forPage($request->page, $perPage); //Filter the page var
		$total_data = $data->count();

		//buat pagination
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
		if ( ($ico_name=="upcoming") || ($ico_name=="ongoing") || ($ico_name=="ended") ) {
			return view('ico.index')->with([
				"type"=>$ico_name,
			]);
		}
		else {
			$ico = Ico::where("name",$ico_name)->first();
			return view('ico.detail')->with([
				"ico"=>$ico,
			]);
		}
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

	public function premium(req $request)
  {
		return view('ico.premium')->with([
		]);
	}

	
}

