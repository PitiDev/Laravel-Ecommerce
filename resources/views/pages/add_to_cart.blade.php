@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Home</a></li>
				  <li class="active">ສີນຄ້າທັງໝົດ: {{Cart::count()}} ລາຍການ</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php $contents = Cart::content(); ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>

						<?php foreach($contents as $v_content) {?>
						<tr>
							<td class="cart_product">
								<a href="#"><img src="{{URL::to($v_content->options->image)}}" alt="" style="width: 100px;"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								<p></p>
							</td>
							<td class="cart_price">
								<p><a href="">{{$v_content->price}} Kip</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								  <form action="{{url('/update_cart')}}" method="post">
								  	{{ csrf_field() }}
									<div class="col-md-3">
									  <input class="form-control" type="number" name="qty" value="{{$v_content->qty}}" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="{{$v_content->rowId}}" >
									</div>
									<input type="submit" name="submit" value="ອັບເດດ" class="btn btn-sm-default">
								  </form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_content->total}} Kip</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete_to_cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php } ?>

						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}} Kip</span></li>
							<li>Delivery <span>{{Cart::tax()}} Kip</span></li>
							<li>Total <span>{{Cart::total()}} Kip</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>

							<?php $customer_id = Session::get('customer_id');
							      $shipping_id = Session::get('shipping_id');
							        ?>

							<?php if($customer_id != NULL && $shipping_id == NULL) {?>
							<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">CheckOut</a>
							<?php } if($customer_id != NULL && $shipping_id != NULL) { ?>
							<a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Payment </a>
							<?php } else{ ?>
							<a class="btn btn-default check_out" href="{{URL::to('/login_check')}}">Login For ChectOut </a>
							<?php } ?>
							

					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection