<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\support\Facades\Redirect;

use DB;
use App\http\Requests;
use Session;
session_start();

class ProductController extends Controller
{
    public function index(){
    	$this->AdminAuthCheck();
    	$all_product_info = DB::table('products')
    	               ->join('tb1_category','products.category_id','=','tb1_category.category_id')
    	               ->join('tb1_manufacture','products.manufacture_id','=','tb1_manufacture.manufacture_id')
    	               ->select('products.*','tb1_category.category_name','tb1_manufacture.manufacture_name')
    	               ->get();

    	$manage_product = view('admin.product')
    	->with('all_product_info',$all_product_info);

    	return view('admin_layout')
    	->with('admin.product', $manage_product);
    }

    public function add(){
    	$this->AdminAuthCheck();
    	return view('admin.add_product');
    }

    public function save_product(Request $request){
    	$this->AdminAuthCheck();
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['category_id'] = $request->category_id;
    	$data['manufacture_id'] = $request->manufacture_id;
    	$data['product_short_description'] = $request->product_short_description;
    	$data['product_long_description'] = $request->product_long_description;
    	$data['product_price'] = $request->product_price;
    	$data['product_size'] = $request->product_size;
    	$data['product_color'] = $request->product_color;
    	$data['publication_status'] = $request->publication_status;
    	$image = $request->file('product_image');
    	if($image){
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if($success){
    			$data['product_image'] = $image_url;

    			DB::table('products')->insert($data);
    			Session::put('message','
		    		<div class="w3-panel w3-green w3-round-large">
					  <h3> Add Products Success!</h3>
					</div>');
    		    return Redirect::to('/add_product');
    		}
    	}

    	$data['product_image'] = '';
    	DB::table('products')->insert($data);
    	Session::put('message','
		    		<div class="w3-panel w3-green w3-round-large">
					  <h3> Add Products Success!</h3>
					</div>');
    		    return Redirect::to('/add_product');
    }

    // Action

        public function active_product($product_id){
        	$this->AdminAuthCheck();
    	DB::table('products')
    		->where('product_id', $product_id)
    		->update(['publication_status' => 1]);
    		Session::put('message','
    		<div class="w3-panel w3-red w3-round-large">
			  <h3>UnActive Status Success!</h3>
			</div>
    		');
    		return Redirect::to('/product');
    }

    public function unactive_product($product_id){
    	$this->AdminAuthCheck();
    	DB::table('products')
    		->where('product_id', $product_id)
    		->update(['publication_status' => 0]);
    		Session::put('message','
    		<div class="w3-panel w3-green w3-round-large">
			  <h3>Active Status Success!</h3>
			</div>
    		');
    		return Redirect::to('/product');
    }

    public function edit_product($product_id){
    	$this->AdminAuthCheck();
    	$product_info = DB::table('products')
    		->where('product_id',$product_id)
    		->first();
    	
    	$product_info = view('admin.edit_product')
    	->with('product_info',$product_info);
    	return view('admin_layout')
    	->with('admin.edit_product', $product_info);
    }

    public function update_product(Request $request, $product_id){
    	$this->AdminAuthCheck();
    	$data = array();
    	$data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['manufacture_id'] = $request->manufacture_id;
    	$data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['product_price'] = $request->product_price;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
    	
    	DB::table('products')
    		->where('product_id', $product_id)
    		->update($data);

    		Session::get('message','
    		<div class="w3-panel w3-green w3-round-large">
			  <h3> Update Success!</h3>
			</div>
    		');
    		return Redirect::to('/product');

    }

    public function delete_product($product_id){
    	$this->AdminAuthCheck();
    	DB::table('products')
    		->where('product_id', $product_id)
    		->delete();

    		Session::put('message','
    		<div class="w3-panel w3-red w3-round-large">
			  <h3> Delete Success!</h3>
			</div>
    		');
    		return Redirect::to('/product');

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
 