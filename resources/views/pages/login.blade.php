@extends('layout')
@section('content')

<section><!--form-->
		<div class="container col-md-9">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>ເຂົ້າສູ່ລະບົບ</h2>
						<form action="{{url('/customer_login')}}" method="post">
							{{ csrf_field() }}
							<input type="email" placeholder="ອີເມວ" name="customer_email" required="" />
							<input type="password" placeholder="ລະຫັດຜ່ານ" name="password" required="" />
							<span>
								<input type="checkbox" class="checkbox"> 
								ຈື່ໄວ້
							</span>
							<button type="submit" class="btn btn-default">ເຂົ້າສູ່ລະບົບ</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">ຫຼື</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>ລົງທະບຽນ</h2>
						<form action="{{url('/customer_registration')}}" method="post">
							{{ csrf_field() }}
							<input type="text" placeholder="ຊື່ ແລະ ນາມສະກຸນ" name="customer_name" required="" />
							<input type="email" placeholder="ອີເມວ" name="customer_email" required="" />
							<input type="password" placeholder="ລະຫັດຜ່ານ" name="password" required="" />
							<input type="text" placeholder="ເບີໂທລະສັບ" name="mobile_number" required=""/>
							<button type="submit" class="btn btn-default">ລົງທະບຽນ</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection