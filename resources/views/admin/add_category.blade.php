@extends('admin_layout');

{{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}"> --}}

@section('admin_content')

<section style="margin-bottom:30px;" class="w3-animate-top">
  <div class="w3-container">
  	<h4 class="w3-panel w3-border-left w3-border-blue">Add Category</h4>

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
  	  <form action="{{ url('/save_category')}}" method="post">
  	  	{{ csrf_field() }}
  	  	<div class="form-group">
		    <label for="exampleInputEmail1">ຊື່ໝວດໝູ່</label><br>
		    <input type="text" class="w3-input w3-border" name="category_name" placeholder="ຊື່ໝວດໝູ່" required>
		 </div>
		 <div class="form-group">
		    <label for="exampleInputEmail1">ຄຳອະທິບາຍໝວດໝູ່</label>
		    <textarea type="text" class="w3-input w3-border" name="category_description" placeholder="Category Description..." required></textarea>
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