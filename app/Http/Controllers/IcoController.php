<?php namespace Icocheckr\Http\Controllers;

use Illuminate\Http\Request as req;
use Icocheckr\Http\Controllers\Controller;

use Icocheckr\Ico;
use Icocheckr\Submit;
use Icocheckr\Order;

use Icocheckr\Mail\OrderPremium;
use Icocheckr\Mail\ConfirmPayment;
use Icocheckr\Mail\ApplicationSubmit;

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
		$data = Ico::orderBy("status","desc")->get();

		if ($request->name<>"") {
			$collection1 = Ico::where("name","like","%".$request->name."%")
										->orderBy("status","desc")
										->get();
			$data = $data->intersect($collection1);
		}

		if ($request->status<>"rating") {
			$collection2 = Ico::where("rating",">",$request->rating)
									->orderBy("status","desc")
									->get();
		}
		
		if ( ($request->startDate<>"") && ($request->endDate<>"") ) {
			$dt = Carbon::createFromFormat("m/d/Y", $request->startDate); 
			$dt1 = Carbon::createFromFormat("m/d/Y", $request->endDate); 
			$collection3 = Ico::whereDate("presale_start",">=",Carbon::createFromFormat("m/d/Y", $request->startDate))
									->where("presale_end","<=",Carbon::createFromFormat("m/d/Y", $request->endDate))
									
									
									->orWhere(function ($query) use($dt,$dt1){
										$query->whereDate("sale_start",">=",$dt)
										->whereDate("sale_end","<=",$dt1);
									})
									
									->orderBy("status","desc")
									->get();
			$data = $data->intersect($collection3);
		}
		else if ($request->startDate<>"") {
		// if ($request->startDate<>"") {
			$collection4 = Ico::whereDate("presale_start",">=",Carbon::createFromFormat("m/d/Y", $request->startDate))
									->orWhereDate("sale_start",">=",Carbon::createFromFormat("m/d/Y", $request->startDate))
									->orderBy("status","desc")
									->get();
			$data = $data->intersect($collection4);
		}
		else if ($request->endDate<>"") {
		// if ($request->endDate<>"") {
			$collection5= Ico::whereDate("presale_end","<=",Carbon::createFromFormat("m/d/Y", $request->endDate))
									->orWhereDate("sale_end","<=",Carbon::createFromFormat("m/d/Y", $request->endDate))
									->orderBy("status","desc")
									->get();
			$data = $data->intersect($collection5);
		}
		if ($request->modeSearch=="all"){
			if ($request->status<>"any") {
				$collection6 = Ico::where("status","=",$request->status)
										->orderBy("status","desc")
										->get();
				$data = $data->intersect($collection6);
			}
			if ($request->category<>"all") {
				$collection7 = Ico::where("categories","like","%".$request->category."%")
										->orderBy("status","desc")
										->get();
				$data = $data->intersect($collection7);
			}
			if ($request->country<>"") {
				$collection8 = Ico::where("country_operation","like","%".$request->country."%")
										->orderBy("status","desc")
										->get();
				$data = $data->intersect($collection8);
			}
			if ($request->platform<>"any") {
				$collection9 = Ico::where("platform","like","%".$request->platform."%")
										->orderBy("status","desc")
										->get();
				$data = $data->intersect($collection9);
			}
		}

		//sort data
		// $data = $data->sortByDesc("rating");
		
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
	
	public function publish(req $request,$package="")
  {
		return view('ico.publish')->with([
			"package"=>$package,
		]);
	}

	public function submit_publish_ico(req $request)
  {
    $arr["type"] = "success";
    $arr["message"] = "Submit success";
		$data = $request->all();
		
		$user_id = 0;
		$user = Auth::user();
		if (!is_null($user)) {
			$user_id = $user->id;
		}
		$data["user_id"] = $user_id;
		$data["status"] = "pending";
		
		Submit::create($data);
		
		//send mail
		if (!is_null($user)) {
			$emaildata = [
			];
			Mail::to($user->email)
			->bcc(["celebgramme.dev@gmail.com","vendella.celebgramme@gmail.com"])
			->queue(new ApplicationSubmit($emaildata));
		}
		
		return $arr;
	}

	public function premium(req $request)
  {
		return view('ico.premium')->with([
		]);
	}

	public function submit_premium(req $request)
	{
		$unique_code = mt_rand(1, 1000);
		if (Auth::guest()) {
			$arr["type"] = "register";
			// buatkan session, register dulu
			$arr_data = array (
				"total"=>$request->eth + floatval("0.000".$unique_code),
				"package"=>$request->package,
			);
			
			$request->session()->put('checkout_data', $arr_data);
		}
		else {
			$user = Auth::user();
			$arr["type"] = "success";

			$order = new Order;
			
			$dt = Carbon::now();
			$str = $dt->format('ymd');
			$order_number = Order::autoGenerateID($order, 'no_order', $str, 3, '0');
			$order->no_order = $order_number;
			
			$order->user_id = $user->id;
			$order->total = $request->eth + floatval("0.000".$unique_code);
			$order->status = "pending";
			$order->package = $request->package;
			$order->image = "";
			$order->save();
			
			//send mail
			$dt1 = Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at);
			$emaildata = [
				'no_order' => $order->no_order,
				'total' => $order->total,
				'created' => $dt1->format('M d Y'),
			];
			Mail::to($user->email)
			->bcc(["celebgramme.dev@gmail.com","vendella.celebgramme@gmail.com"])
			->queue(new OrderPremium($emaildata));
		}
		
		return $arr;
	}

	public function confirm_payment(req $request)
  {
		return view('confirm-payment')->with([
		]);
	}

	public function submit_confirm_payment(req $request)
	{
		$user = Auth::user();
    $order = Order::where("no_order","=",Request::input("no_order"))->first();
    if (is_null($order)) { 
      $arr["message"]= "Order No not found on database";
      $arr["type"]= "error";
      return $arr;
    }
		if ($order->order_status=="success") {
      $arr["message"]= "Order no have been paid confirmed";
      $arr["type"]= "error";
      return $arr;
		}
		
    if ($order->image<>"") {
      $arr["message"]= "Please wait admin verification, your order number already confirmed";
      $arr["type"]= "error";
      return $arr;
    }
		
    if ($order->user_id <> $user->id) {
      $arr["message"]= "This is not your order number, please input your order number";
      $arr["type"]= "error";
      return $arr;
    }
		
		$destinationPath = base_path().'/public/confirm-payment-file/';
		if (!file_exists($destinationPath)) {
			mkdir($destinationPath,0755,true);
		}
    $filename = $order->no_order.".".Input::file('photo')->getClientOriginalExtension();
    Input::file('photo')->move($destinationPath, $filename);
    $order->image = $filename;
		$dt = Carbon::now();
    $order->confirmed_at = $dt->toDateTimeString();
    $order->status = "user-confirm";
    $order->save();
		
		//send mail
		$emaildata = [
		];
		Mail::to($user->email)
		->bcc(["celebgramme.dev@gmail.com","vendella.celebgramme@gmail.com"])
		->queue(new ConfirmPayment($emaildata));
		
    $arr["message"]= "";
    $arr["type"]= "success";
		return $arr;
	}
}

