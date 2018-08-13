@extends('admin_layout');

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
  	  <form action="{{ url('/save_slider')}}" method="post" enctype="multipart/form-data">
  	  	{{ csrf_field() }}

        <div class="form-group">
         <label for="exampleInputEmail1">Slider Title</label><br>
         <input type="text" class="w3-input w3-border" name="slider_title" placeholder="Title" required>
       </div>
       <div class="form-group">
         <label for="exampleInputEmail1">Slider Description</label><br>
         <input type="text" class="w3-input w3-border" name="slider_description" placeholder="Description" required>
       </div>
        <div class="form-group">
         <label for="exampleInputEmail1">Slider Image</label><br>
         <input type="file" class="w3-input w3-border" name="slider_image" placeholder="Image" required>
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

  @endsection