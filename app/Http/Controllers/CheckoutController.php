<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function login_check(){
    	return view('pages.login');
    }

    public function customer_registration(Request $request){
    	$data=array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_email'] = $request->customer_email;
    	$data['password'] = md5($request->password);
    	$data['mobile_number'] = $request->mobile_number;

    		$customer_id = DB::table('tb1_customer')
    					->insertGetId($data);

    		Session::put('customer_id', $customer_id);
    		Session::put('customer_name', $request->customer_name);
    		return Redirect::to('/checkout');

    }

    public function checkout(){

    	return view('pages.checkout');
    }

    public function save_shipping_details(Request $request){
    	$data=array();
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_mobile'] = $request->shipping_mobile;
    	$data['shipping_address'] = $request->shipping_address;

    	$shipping_id = DB::table('tb1_shipping')
    				->insertGetId($data);
    				Session::put('shipping_id', $shipping_id);
    				return Redirect::to('/payment');
    }

    public function customer_login(Request $request){
    	$customer_email = $request->customer_email;
    	$password = md5($request->password);
    	$result = DB::table('tb1_customer')
    			->where('customer_email', $customer_email)
    			->where('password', $password)
    			->first();

    	if ($result) {

    		Session::put('customer_id', $result->customer_id);
    		return Redirect::to('/');
    	}else {
    		return Redirect::to('/login_check');
    	}
    }

    public function payment(){
    	return view('pages.payment');
    }

    public function order_place(Request $request){
    	$payment_gateway = $request->payment_method;
    	
    	$pdata = array();
    	$pdata['payment_method'] = $request->payment_method;
    	$pdata['payment_status'] = 'pending';
    	$payment_id = DB::table('tb1_payment')
    				->insertGetId($pdata);

    	$odata = array();
    	$odata['customer_id'] = Session::get('customer_id');
    	$odata['shipping_id'] = Session::get('shipping_id');
    	$odata['payment_id'] = $payment_id;
    	$odata['order_total'] = Cart::total();
    	$odata['order_status'] = 'pending';
    	$order_id = DB::table('tb1_order')
    				->insertGetId($odata);

    	$contents = Cart::content();
    	$odata = array();
    	foreach ($contents as $v_content) {
    		$odata['order_id'] = $order_id;
    		$odata['product_id'] = $v_content->id;
    		$odata['product_name'] = $v_content->name;
    		$odata['product_price'] = $v_content->price;
    		$odata['product_sale_quantity'] = $v_content->qty;

    		DB::table('tb1_order_detail')
    				->insert($odata);
    	}

    	if ($payment_gateway == 'BcelOne') {
    		Cart::destroy();
    		return view('pages.order_success');
    	}

		return view('pages.order_success');
    }

    public function manage_order(){
    	$this->AdminAuthCheck();
    	$all_order_info = DB::table('tb1_order')
    	               ->join('tb1_customer','tb1_order.customer_id','=','tb1_customer.customer_id')
    	               ->select('tb1_order.*','tb1_customer.customer_name')
    	               ->get();

    	$manage_order = view('admin.manage_order')
    	->with('all_order_info',$all_order_info);

    	return view('admin_layout')
    	->with('admin.manage_order', $manage_order);
    }

    public function view_order($order_id){
    	$this->AdminAuthCheck();
    	$order_by_id = DB::table('tb1_order')
    	              ->join('tb1_customer','tb1_order.customer_id','=','tb1_customer.customer_id')
    	              ->join('tb1_order_detail','tb1_order.order_id','=','tb1_order_detail.order_id')
    	              ->join('tb1_shipping','tb1_shipping.shipping_id','=','tb1_shipping.shipping_id')
    	              ->select('tb1_order.*','tb1_order_detail.*','tb1_shipping.*','tb1_customer.*')
    	              ->get();

    	$view_order = view('admin.view_order')
    	->with('order_by_id',$order_by_id);

    	return view('admin_layout')
    	->with('admin.view_order', $view_order);

    }

    public function delete_order($order_id){
    	$this->AdminAuthCheck();
    	DB::table('tb1_order')
    		->where('order_id', $order_id)
    		->delete();

    		Session::put('message','
    		<div class="w3-panel w3-red w3-round-large">
			  <h3> Delete Success!</h3>
			</div>
    		');
    		return Redirect::to('/manage_order');

    }

    public function customer_logout(){
    	Session::flush();
    	return Redirect::to('/');
    }

    // For Security Hacker
    public function AdminAuthCheck(){
    	$admin_id = Session::get('admin_id');
    	if($admin_id){
    		return;
    	}else{
    		return Redirect::to('/admin')->send();
    	}
    }

}
