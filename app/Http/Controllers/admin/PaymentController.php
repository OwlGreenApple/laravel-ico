<?php namespace Icocheckr\Http\Controllers\Admin;

use Illuminate\Http\Request as req;
use Icocheckr\Http\Controllers\Controller;

use Icocheckr\Ico;
use Icocheckr\Order;
use Icocheckr\Meta;
use Icocheckr\User;

use Icocheckr\Mail\ConfirmPaymentAdmin;

use View,Auth,Request,DB,Carbon,Excel, Mail, Validator, Input, Config;

class PaymentController extends Controller {


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

		return view('admin.payment.index')->with([
			'user'=>$user,
		]);
	}
  
	public function load_order(req $request)
  {
		$user = Auth::user();
		$perPage = 15;
		
		if($request->s == "") {
			$arr = Order::orderBy("updated_at","desc")->paginate($perPage);
		}
		else {
			$arr = Order::where("no_order","like","%".$request->s."%")->orderBy("updated_at","desc")->paginate($perPage);
		}

		//buat pagination
		// $total_data = count(Order::all());
		$total_data = count($arr);
		$page = $request->page; // Get the current page or default to 1, this is what you miss!
		// $offset = ($page * $perPage) - $perPage;
		$totalPage = floor($total_data / $perPage) + 1;
			
		return view('admin.payment.content')->with(
								array(
									'arr'=>$arr,
									'page'=>$page,
									'totalPage'=>$totalPage,
								));
  }

	public function accept_payment(req $request)
  {
    $arr["type"] = "success";
    $arr["message"] = "Order Confirmed";
		
		$order = Order::find($request->id);
		if (!is_null($order)){
			$order->status = "success";
			$order->save();
			
			$user = User::find($order->user_id);
			if (!is_null($user)) {
				//send mail
				$emaildata = [
					"package"=>$order->package,
				];
				Mail::to($user->email)->queue(new ConfirmPaymentAdmin($emaildata));
			}
		}
		
		return $arr;
	}

	public function reject_payment(req $request)
	{
    $arr["type"] = "success";
    $arr["message"] = "Order Rejected";
		
		$order = Order::find($request->id);
		if (!is_null($order)){
			$order->status = "rejected";
			$order->save();
		}
		
		return $arr;
	}

	
}

