@extends('admin_layout');
@section('admin_content')

<section class="w3-container" style="margin-bottom:20px;">
  <div class="">
  	<h4 class="w3-panel w3-border-left w3-border-blue">Order</h4>
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

  	<div style="margin-bottom:10px;">
  		<input oninput="w3.filterHTML('#id01', '.item', this.value)" class="w3-input w3-border" placeholder="ຄົ້າຫາ..">
  	</div>
     <script src="{{asset('backend/js/filter.js')}}"></script>
  	  <table class="w3-table-all w3-hoverable" id="id01">
	    <thead>
	      <tr class="w3-blue" style="">
	      	<th>Oder_ID</th>
	        <th>Customer Name</th>
	        <th>Order Total</th>
	        <th>Status</th>
	        <th>Date & Time</th>
	        <th>Action</th>
	      </tr>
	    </thead>

	    @foreach($all_order_info as $v_order)
	    <tr class="item">
	      <td>PX{{ $v_order->order_id }}</td>
	      <td>{{ $v_order->customer_name }}</td>
	      <th>{{ $v_order->order_total }} ກີບ</th>
	      <th style="color: red;">{{ $v_order->order_status }}</th>
	      <td>{{ $v_order->created_at }}</td>
	      <td>
	
	      	<a href="{{URL::to('/active_order/'.$v_order->order_id)}}" class="w3-btn w3-white w3-border w3-border-green w3-round-large">
	      		<i class="fas fa-thumbs-up"></i>
	      	</a>

	      	<a href="{{URL::to('/view_order/'.$v_order->order_id)}}" class="w3-btn w3-white w3-border w3-border-blue w3-round-large">
	      		<i class="fas fa-eye"></i>
	      	</a>
	  
	      	<a href="{{URL::to('/delete_order/'.$v_order->order_id)}}" class="w3-btn w3-white w3-border w3-border-red w3-round-large">
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