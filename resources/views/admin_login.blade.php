
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}">

<section style="margin-top: 100px;">
  <div class="container">
	 <div class="row justify-content-center">
	  <div class="col-md-6">
	    <div class="card">
	     <center>
	     	<?php 
	       $message=Session::get('message');
		     if ($message){
		     	echo $message;
		     	Session::put('message', null);
		     }
	        ?>
	     </center>
	      <div class="card-header"><b><a href=""><i class="fas fa-arrow-left"></i> Log In</a></b></div>
	        <div class="card-body">
	                
	          <div>
	          	<form action="{{ url('/admin-dashboard') }}" method="post">
	          		{{ csrf_field() }}
				  <div class="form-group">
				    <label for="exampleInputEmail1">Username</label>
				    <input type="text" class="form-control" name="admin_email" " aria-describedby="emailHelp" placeholder="Enter User">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" name="admin_password" placeholder="Password">
				  </div>
				  <div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1">
				    <label class="form-check-label" for="exampleCheck1">Check me out</label>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
	          </div>

	      </div>
	    </div>
	  </div>
	 </div>
</div>
</section>
