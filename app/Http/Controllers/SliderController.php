<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\support\Facades\Redirect;
session_start();

class SliderController extends Controller
{

	public function index(){
		$this->AdminAuthCheck();
    	$all_slider = DB::table('tb1_slider')->get();
    	$manage_slider = view('admin.all_slider')
    	->with('all_slider',$all_slider);

    	return view('admin_layout')
    	->with('admin.all_slider', $manage_slider);

		// return view('admin.slider');
	}

	public function add(){
        $this->AdminAuthCheck();
    	return view('admin.add_slider');
    }

    public function save_slider(Request $request){
    	$this->AdminAuthCheck();
    	$data = array();
    	$data['slider_title'] = $request->slider_title;
    	$data['slider_description'] = $request->slider_description;
    	$data['publication_status'] = $request->publication_status;
    	$image = $request->file('slider_image');
    	if($image){
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'slider/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if($success){
    			$data['slider_image'] = $image_url;

    			DB::table('tb1_slider')->insert($data);
    			Session::put('message','
		    		<div class="w3-panel w3-green w3-round-large">
					  <h3> Add Slider Success!</h3>
					</div>');
    		    return Redirect::to('/add_slider');
    		}
    	}

    	$data['slider_image'] = '';
    	DB::table('tb1_slider')->insert($data);
    	Session::put('message','
		    		<div class="w3-panel w3-green w3-round-large">
					  <h3> Add Slider Success!</h3>
					</div>');
    		    return Redirect::to('/add_slider');
    }

    // Action
        public function active_slider($slider_id){
        	$this->AdminAuthCheck();
    	DB::table('tb1_slider')
    		->where('slider_id', $slider_id)
    		->update(['publication_status' => 1]);
    		Session::put('message','
    		<div class="w3-panel w3-red w3-round-large">
			  <h3>UnActive Status Success!</h3>
			</div>
    		');
    		return Redirect::to('/all_slider');
    }

    public function unactive_slider($slider_id){
    	$this->AdminAuthCheck();
    	DB::table('tb1_slider')
    		->where('slider_id', $slider_id)
    		->update(['publication_status' => 0]);
    		Session::put('message','
    		<div class="w3-panel w3-green w3-round-large">
			  <h3>Active Status Success!</h3>
			</div>
    		');
    		return Redirect::to('/all_slider');
    }

    public function delete_slider($slider_id){
        $this->AdminAuthCheck();
    	DB::table('tb1_slider')
    		->where('slider_id', $slider_id)
    		->delete();

    		Session::put('message','
    		<div class="w3-panel w3-red w3-round-large">
			  <h3> Delete Success!</h3>
			</div>
    		');
    		return Redirect::to('/all_slider');
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
