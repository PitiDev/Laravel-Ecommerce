@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container col-md-9">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="register-req">
				<p>ກະລຸນາຕື່ມຂໍ້ມູນລຸ່ມນີ້ໃຫ້ຄົບ !ກ່ອນການສັ່ງຊື້</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 ">
						<div class="bill-to">
							<p></p>
							<div class="form-one">
								<form action="{{url('/save_shipping_details')}}" method="post">
									{{ csrf_field() }}

									<input type="text" name="shipping_email" placeholder="E mail" required="">
									<input type="text" name="shipping_name" placeholder="ຊື່ ແລະ ນາມສະກຸນ" required="">
									<input type="text" name="shipping_mobile" placeholder="ເບີໂທ , Whatsapp" required="">
									<input type="text" name="shipping_address" placeholder="ທີ່ຢູ່: ບ້ານ, ເມືອງ" required="">
									<center>
										<button type="submit" class="btn btn-default" style="margin-bottom:20px;" ><h2>ສັ່ງຊື້ສິນຄ້າ</h2></button>
									</center>
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>

		</div>
	</section> <!--/#cart_items-->

@endsection