@extends('admin_layout');
@section('admin_content')

<section class="w3-container" style="margin-bottom:20px;">
  <div class="">
  	@foreach($order_by_id as $v_order)
  	@endforeach
  	<div class="w3-col m4 w3-panel w3-border-left w3-border-blue w3-card">
  		<h5 class="w3-panel w3-blue" style="text-align: center;">ລູກຄ້າ</h5>
  		<p>OrderID: PX{{ $v_order->order_id}}</p>
  		<p>Name: {{ $v_order->customer_name}}</p>
  		<p>Email: {{ $v_order->customer_email}}</p>
  		<p>Phone: {{ $v_order->mobile_number}}</p>
  		<p>Create At: {{ $v_order->created_at}}</p>
  	</div>
  	@foreach($order_by_id as $v_order)
  	@endforeach
  	<div class="w3-col m4 w3-panel w3-border-left w3-border-green w3-card" style="margin-left:20px;">
  		<h5 class="w3-panel w3-green" style="text-align: center;">ບ່ອນຈັດສົ່ງສີນຄ້າ</h5>
  		<p>ShippingID: PX{{ $v_order->shipping_id}}</p>
  		<p>Name: {{ $v_order->shipping_name}}</p>
  		<p>Mobile: {{ $v_order->shipping_mobile}}</p>
  		<p>Address: {{ $v_order->shipping_address}}</p>
  		<p>Create At: {{ $v_order->created_at}}</p>
  	</div>
  	    
  	<div class="w3-col m12">

 
     <table class="w3-table-all w3-hoverable">
					<thead>
						<tr class="cart_menu">
							<td class="image">ID</td>
							<td class="description">ຊື່ສິນຄ້າ</td>
							<td class="price">ລາຄາ</td>
							<td class="quantity">ຈຳນວນ</td>
							<td class="total">ລວມລາຄາ</td>
						</tr>
					</thead>
					<tbody>

						@foreach($order_by_id as $v_order)
						<tr>
							<td class="cart_product">
								{{ $v_order->order_id}}
							</td>
							<td class="cart_description">
								{{ $v_order->product_name}}
							</td>
							<td class="cart_price">
								<p>{{ $v_order->product_price}} ກີບ</p>
							</td>
							<td class="cart_quantity">
								{{ $v_order->product_sale_quantity }}
							</td>
							<td class="cart_total">
								{{ $v_order->product_price*$v_order->product_sale_quantity }} ກີບ
							</td>
						</tr>
						@endforeach

						</tr>
					</tbody>
					<tfoot>
						<tr class="w3-blue">
							<td colspan="3"><h3>ລວມລາຄາທັງໝົດ:</h3></td>
							<td><h3>{{ $v_order->product_sale_quantity }}</h3></td>
							<td><h3>{{ $v_order->order_total}} ກີບ</h3></td>
						</tr>
					</tfoot>
				</table>

   </div>
  </div>
</section>

@endsection