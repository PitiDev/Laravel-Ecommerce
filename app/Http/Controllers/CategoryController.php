<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class CategoryController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
    	$all_category_info = DB::table('tb1_category')->get();
    	$manage_category = view('admin.category')
    	->with('all_category_info',$all_category_info);

    	return view('admin_layout')
    	->with('admin.category', $manage_category);
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
    	return view('admin.add_category');
    }

    public function save_category(Request $request){
        $this->AdminAuthCheck();
    	$data=array();
    	$data['category_id'] = $request->category_id;
    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tb1_category')->insert($data);
    	Session::put('message','
    		<div class="w3-panel w3-green w3-round-large">
			  <h3>Add Success!</h3>
			</div>
    		');
    	return Redirect::to('/add_category');
    }

    public function active_category($category_id){
        $this->AdminAuthCheck();
    	DB::table('tb1_category')
    		->where('category_id', $category_id)
    		->update(['publication_status' => 1]);
    		Session::put('message','
    		<div class="w3-panel w3-red w3-round-large">
			  <h3>UnActive Status Success!</h3>
			</div>
    		');
    		return Redirect::to('/category');
    }

    public function unactive_category($category_id){
        $this->AdminAuthCheck();
    	DB::table('tb1_category')
    		->where('category_id', $category_id)
    		->update(['publication_status' => 0]);
    		Session::put('message','
    		<div class="w3-panel w3-green w3-round-large">
			  <h3>Active Status Success!</h3>
			</div>
    		');
    		return Redirect::to('/category');
    }

    public function edit_category($category_id){
        $this->AdminAuthCheck();
    	$category_info = DB::table('tb1_category')
    		->where('category_id',$category_id)
    		->first();
    	
    	$category_info = view('admin.edit_category')
    	->with('category_info',$category_info);
    	return view('admin_layout')
    	->with('admin.edit_category', $category_info);
    }

    public function update_category(Request $request, $category_id){
        $this->AdminAuthCheck();
    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;
    	
    	DB::table('tb1_category')
    		->where('category_id', $category_id)
    		->update($data);

    		Session::get('message','
    		<div class="w3-panel w3-green w3-round-large">
			  <h3> Update Success!</h3>
			</div>
    		');
    		return Redirect::to('/category');

    }

    public function delete_category($category_id){
        $this->AdminAuthCheck();
    	DB::table('tb1_category')
    		->where('category_id', $category_id)
    		->delete();

    		Session::put('message','
    		<div class="w3-panel w3-red w3-round-large">
			  <h3> Delete Success!</h3>
			</div>
    		');
    		return Redirect::to('/category');

    }

}
