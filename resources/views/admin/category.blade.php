@extends('admin_layout');
@section('admin_content')

<section class="w3-container" style="margin-bottom:20px;">
  <div class="">
  	<h4 class="w3-panel w3-border-left w3-border-blue">ໝວດສີນຄ້າ</h4>
  	    <center>
        <?php 
          $message=Session::get('message'); 
          if($message){
            echo $message;
            Session::put('message', null);
          }
        ?>
        </center>
  	<div class="row">
  	 <div class="">
  	  <a href="{{URL::to('/add_category')}}" style="float: right; margin-bottom:20px;" class="w3-btn w3-white w3-border w3-border-blue w3-round-large">
  	  	Add Category
  	  </a>
  	</div>

  	<div style="margin-bottom:10px;">
  		<input oninput="w3.filterHTML('#id01', '.item', this.value)" class="w3-input w3-border" placeholder="ຄົ້າຫາ..">
  	</div>
     <script src="{{asset('backend/js/filter.js')}}"></script>
  	  <table class="w3-table-all w3-hoverable" id="id01">
	    <thead>
	      <tr class="w3-light-grey">
	      	<th>#</th>
	        <th>ຊື່ໝວດສີນຄ້າ</th>
	        <th>ຄຳອະທິບາຍ</th>
	        <th>Status</th>
	        <th>ຈັດການ</th>
	      </tr>
	    </thead>

	    @foreach($all_category_info as $v_category)
	    <tr class="item">
	      <td>{{ $v_category->category_id }}</td>
	      <td>{{ $v_category->category_name }}</td>
	      <td>{{ $v_category->category_description }}</td>
	      <td>
	      	@if($v_category->publication_status == 1)
	      	 <b class="w3-button w3-blue w3-round-xxlarge">Active</b>
	      	@else
	      	 <b class="w3-button w3-red w3-round-xxlarge">UnActive</b>
	      	@endif
	      </td>
	      <td>
	      	@if($v_category->publication_status == 1)
	      	<a href="{{URL::to('/unactive_category/'.$v_category->category_id)}}" class="w3-btn w3-white w3-border w3-border-red w3-round-large">
	      		<i class="fas fa-thumbs-down"></i>
	      	</a>
	      	@else
	      	<a href="{{URL::to('/active_category/'.$v_category->category_id)}}" class="w3-btn w3-white w3-border w3-border-green w3-round-large">
	      		<i class="fas fa-thumbs-up"></i>
	      	</a>
	      	@endif
	     
	      	<a href="{{URL::to('/edit_category/'.$v_category->category_id)}}" class="w3-btn w3-white w3-border w3-border-blue w3-round-large">
	      		<i class="fas fa-edit"></i>
	      	</a>
	  
	      	<a href="{{URL::to('/delete_category/'.$v_category->category_id)}}" class="w3-btn w3-white w3-border w3-border-red w3-round-large">
	      		<i class="far fa-trash-alt"></i>
	      	</a>
	      </td>
	    </tr>
       @endforeach

	  </table>

   </div>
  </div>
</section>

@endsection