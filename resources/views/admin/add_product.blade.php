@extends('admin_layout');

{{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}"> --}}

@section('admin_content')

<section style="margin-bottom:30px;" class="w3-animate-top">
  <div class="w3-container">
  	<h4 class="w3-panel w3-border-left w3-border-blue">Add Product</h4>

      <center>
        <?php 
          $message=Session::get('message'); 
          if($message){
            echo $message;
            Session::put('message', null);
          }
        ?>
        </center>

  	<div class="row justify-content-center">
  	 <div class="col-md-6">
  	  <form action="{{ url('/save_product')}}" method="post" enctype="multipart/form-data">
  	  	{{ csrf_field() }}
  	  	<div class="form-group">
		     <label for="exampleInputEmail1">Name</label><br>
		     <input type="text" class="w3-input w3-border" name="product_name" placeholder="ຊື່ສີນຄ້າ" required>
		    </div>
       <div>
         <label for="">Category</label>
         <select class="w3-select w3-border" name="category_id">
          <option value="" disabled selected>Choose Category</option>
          <?php
            $all_published_category = DB::table('tb1_category')
                                    ->where('publication_status',1)
                                    ->get();
            foreach($all_published_category as $v_category){
             ?>
           <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
          <?php } ?>
        </select>
       </div>
       <div>
         <label for="">Brand</label>
         <select class="w3-select w3-border" name="manufacture_id">
          <option value="" disabled selected>Choose Manufacture</option>
          <?php
            $all_published_manufacture = DB::table('tb1_manufacture')
                                    ->where('publication_status',1)
                                    ->get();
            foreach($all_published_manufacture as $v_manufacture){
             ?>
           <option value="{{$v_manufacture->manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>
          <?php } ?>
        </select>
       </div>
  		 <div class="form-group">
  		    <label for="exampleInputEmail1">Product Short Description</label>
  		    <textarea type="text" class="w3-input w3-border" name="product_short_description" placeholder="product_short_description ..." required></textarea>
  		 </div>
       <div class="form-group">
          <label for="exampleInputEmail1">Product Long Description</label>
          <textarea type="text" class="w3-input w3-border" name="product_long_description" placeholder="product_long_description Description..." required></textarea>
       </div>
       <div class="form-group">
         <label for="exampleInputEmail1">Product Price</label><br>
         <input type="text" class="w3-input w3-border" name="product_price" placeholder="ລາຄາສີນຄ້າ" required>
       </div>
       <div class="form-group">
         <label for="exampleInputEmail1">Product Image</label><br>
         <input type="file" class="w3-input w3-border" name="product_image" placeholder="Image" required>
       </div>
       <div class="form-group">
         <label for="exampleInputEmail1">Product Size</label><br>
         <input type="text" class="w3-input w3-border" name="product_size" placeholder="Size" required>
       </div>
       <div class="form-group">
         <label for="exampleInputEmail1">Product Color</label><br>
         <input type="text" class="w3-input w3-border" name="product_color" placeholder="Color" required>
       </div>

     <br>
     <input class="w3-check" type="checkbox" name="publication_status" value="1" required>
      <label>Publication_status</label></p>
		 <div class="box-footer" style="float:right;margin-top:10px;">
            <button type="submit" class="w3-btn w3-white w3-border w3-border-blue w3-round-large">Publish</button>
         </div>
  	  </form>
  	</div>
   </div>
  </div>
</section>

{{-- 
  <script type="text/javascript" src="{{ url('/')}}/tiny/jquery.tinymce.min.js "></script>
  <script type="text/javascript" src="{{ url('/') }}/tiny/tinymce.min.js"></script>
  <script type="text/javascript" src="{{url('/')}}/tiny/tinymce.setting.js"></script>
  <script type="text/javascript" src="{{url('/')}}/tiny/AjaxImage.js"></script> --}}

  @endsection