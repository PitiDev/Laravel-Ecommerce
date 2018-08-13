@extends('admin_layout');

{{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}"> --}}

@section('admin_content')

<section style="margin-bottom:30px;" class="w3-animate-top">
  <div class="w3-container">
  	<h4 class="w3-panel w3-border-left w3-border-blue">Edit Category</h4>

  	<div class="row justify-content-center">
  	 <div class="col-md-6">
  	  <form action="{{ url('/update_category', $category_info->category_id)}}" method="post">
  	  	{{ csrf_field() }}
  	  	<div class="form-group">
		    <label for="exampleInputEmail1">ຊື່ໝວດໝູ່</label><br>
		    <input type="text" class="w3-input w3-border" name="category_name" placeholder="ຊື່ໝວດໝູ່" value="{{ $category_info->category_name }}">
		 </div>
		 <div class="form-group">
		    <label for="exampleInputEmail1">ຄຳອະທິບາຍໝວດໝູ່</label>
		    <textarea type="text" class="w3-input w3-border" name="category_description" placeholder="Category Description...">
		    	{{ $category_info->category_description }}
		    </textarea>
		 </div>

		 <div class="box-footer" style="float:right;margin-top:10px;">
            <button type="submit" class="w3-btn w3-white w3-border w3-border-blue w3-round-large">Update Category</button>
         </div>
  	  </form>
  	</div>
   </div>
  </div>
</section>


  <script type="text/javascript" src="{{ url('/')}}/tiny/jquery.tinymce.min.js "></script>
  <script type="text/javascript" src="{{ url('/') }}/tiny/tinymce.min.js"></script>
  <script type="text/javascript" src="{{url('/')}}/tiny/tinymce.setting.js"></script>
  <script type="text/javascript" src="{{url('/')}}/tiny/AjaxImage.js"></script>

  @endsection