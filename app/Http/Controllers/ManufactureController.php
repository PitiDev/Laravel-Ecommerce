<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class ManufactureController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
    	$all_manufacture_info = DB::table('tb1_manufacture')->get();
    	$manage_manufacture = view('admin.manufacture')
    	->with('all_manufacture_info',$all_manufacture_info);

    	return view('admin_layout')
    	->with('admin.manufacture', $manage_manufacture);

    }
    //For Security Hacker
    public function AdminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function add(){
        $this->AdminAuthCheck();
    	return view('admin.add_manufacture');
    }

    public function save_manufacture(Request $request){
        $this->AdminAuthCheck();
    	$data=array();
    	$data['manufacture_id'] = $request->manufacture_id;
    	$data['manufacture_name'] = $request->manufacture_name;
    	$data['manufacture_description'] = $request->manufacture_description;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tb1_manufacture')->insert($data);
    	Session::put('message','
    		<div class="w3-panel w3-green w3-round-large">
			  <h3>Add Manufacture Success!</h3>
			</div>
    		');
    	return Redirect::to('/add_manufacture');
    }

// Action
        public function active_manufacture($manufacture_id){
    	DB::table('tb1_manufacture')
    		->where('manufacture_id', $manufacture_id)
    		->update(['publication_status' => 1]);
    		Session::put('message','
    		<div class="w3-panel w3-red w3-round-large">
			  <h3>UnActive Status Success!</h3>
			</div>
    		');
    		return Redirect::to('/manufacture');
    }

    public function unactive_manufacture($manufacture_id){
    	DB::table('tb1_manufacture')
    		->where('manufacture_id', $manufacture_id)
    		->update(['publication_status' => 0]);
    		Session::put('message','
    		<div class="w3-panel w3-green w3-round-large">
			  <h3>Active Status Success!</h3>
			</div>
    		');
    		return Redirect::to('/manufacture');
    }

    public function edit_manufacture($manufacture_id){
        $this->AdminAuthCheck();
    	$manufacture_info = DB::table('tb1_manufacture')
    		->where('manufacture_id',$manufacture_id)
    		->first();
    	
    	$manufacture_info = view('admin.edit_manufacture')
    	->with('manufacture_info',$manufacture_info);
    	return view('admin_layout')
    	->with('admin.edit_manufacture', $manufacture_info);
    }

    public function update_manufacture(Request $request, $manufacture_id){
        $this->AdminAuthCheck();
    	$data = array();
    	$data['manufacture_name'] = $request->manufacture_name;
    	$data['manufacture_description'] = $request->manufacture_description;
    	
    	DB::table('tb1_manufacture')
    		->where('manufacture_id', $manufacture_id)
    		->update($data);

    		Session::get('message','
    		<div class="w3-panel w3-green w3-round-large">
			  <h3> Update Success!</h3>
			</div>
    		');
    		return Redirect::to('/manufacture');

    }

    public function delete_manufacture($manufacture_id){
        $this->AdminAuthCheck();
    	DB::table('tb1_manufacture')
    		->where('manufacture_id', $manufacture_id)
    		->delete();

    		Session::put('message','
    		<div class="w3-panel w3-red w3-round-large">
			  <h3> Delete Success!</h3>
			</div>
    		');
    		return Redirect::to('/manufacture');

    }
}
