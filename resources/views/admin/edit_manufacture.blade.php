@extends('admin_layout');

@section('admin_content')

<section style="margin-bottom:30px;" class="w3-animate-top">
  <div class="w3-container">
  	<h4 class="w3-panel w3-border-left w3-border-blue">Edit Manufacture</h4>

  	<div class="row justify-content-center">
  	 <div class="col-md-6">
  	  <form action="{{ url('/update_manufacture', $manufacture_info->manufacture_id)}}" method="post">
  	  	{{ csrf_field() }}
  	  	<div class="form-group">
		    <label for="exampleInputEmail1">Manufacture Name</label><br>
		    <input type="text" class="w3-input w3-border" name="manufacture_name" placeholder="manufacture_name" value="{{ $manufacture_info->manufacture_name }}">
		 </div>
		 <div class="form-group">
		    <label for="exampleInputEmail1">Manufacture description</label>
		    <textarea type="text" class="w3-input w3-border" name="manufacture_description" placeholder="Category Description...">
		    	{{ $manufacture_info->manufacture_description }}
		    </textarea>
		 </div>

		 <div class="box-footer" style="float:right;margin-top:10px;">
            <button type="submit" class="w3-btn w3-white w3-border w3-border-blue w3-round-large">Update ManuFacture</button>
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