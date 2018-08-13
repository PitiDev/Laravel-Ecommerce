@extends('layout')
@section('content')

<section>
	<div class="container well">
	  <div class="row">
	  	<div>
	  		<h3 class="text-center">ກະລຸນາຊຳລະເງີນຜ່ານບັນຊິທະນາຄານລຸ່ມນີ້</h3>
	  		<hr>
	  	</div>

		  <div class="col-md-2"></div>
		  <div class="col-md-5">
		  		<h4 class="text-center">ທະນາຄານການຄ້າຕ່າງປະເທດລາວ</h4>
		  		<p>ຊື່ບັນຊີ: Piti PHANTHASOMBATH</p>
		  		<p>ເລກບັນຊີ: 160-12-00-01150032-001</p>
		  </div>
		  <div class="col-md-5">
		  		<img src="{{URL::to('frontend/images/bcel_bank.png')}}" alt="">
		  </div>
		  <hr>
		  <div class="">
		  	<div class="col-md-3"></div>
			  <div class="col-md-6">
			  	
			  	<h2 class="text-center">ເລກໄອດີສັ່ງ: PX<?php $shipping_id = Session::get('shipping_id'); print_r($shipping_id) ?></h2>
			  	<h3 class="text-center">ເລກໄອດີຜູ່ໃຊ້: U<?php $customer_id = Session::get('customer_id'); print_r($customer_id) ?></h3>
			  	<h1 class="text-center">ລາຄາທັງໝົດ: {{Cart::total()}} Kip</h1>

			  </div>
			  <div class="col-md-12 text-center">
			  	<p>ເມື່ອທ່ານໂອນເງີນສຳເລັດແລ້ວກະລຸນາແຄັບຮູບສົ່ງມາທີ່ເບີ Whatsapp: 020 97778968 ເພື່ອເປັນຫຼັກຖານໃນການມາເອົາສີນຄ້າ</p>
			  	<form action="{{url('/order_place')}}" method="post">
			  		<input type="hidden" name="payment_method" value="Bce lOne">
			  		{{ csrf_field() }}
			  	<button type="submit" class="btn btn-default btn-lg">ກົດຢືນຢັນການສັ່ງຊື້ສີນຄ້າ</button>
			  	</form>
			  </div>
		   <div class="col-md-3"></div>
		  </div>
	  </div>

	 </div>
</section>

@endsection