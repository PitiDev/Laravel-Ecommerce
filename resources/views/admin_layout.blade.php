<!DOCTYPE html>
<html>
<title>Piti Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('backend/css/w3.css')}}">
<link rel="stylesheet" href="{{asset('backend/lao/style.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<body class="w3-light-grey">


<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <a href="{{URL('/logout')}}" class="w3-bar-item w3-right"><b>ອອກຈາກລະບົບ</b></a>
  <span class="w3-bar-item w3-right" style="float: left;"><b>ຜູ່ໃຊ້:</b> {{ Session::get('admin_name') }}</span>
</div>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white " style="z-index:3;width:260px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <h1 style="color: #2196F3;"><i class="fas fa-user-lock" aria-hidden="true"></i></h1>
    </div>
    <div class="w3-col s8 w3-bar">
      <span><b>ສະບາຍດີ</b> <strong>{{ Session::get('admin_name') }}</strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5><b>ໜ້າຄວບຄຸມ</b></h5>
  </div>
	<div class="w3-bar-block">
	<a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>

	<a href="{{URL::to('/dashboard')}}" class="w3-bar-item w3-button w3-padding">
    <i class="fa fa-users fa-fw"></i>  <b>Dashboard</b>
  </a>

	<a href="{{URL::to('/category')}}" class="w3-bar-item w3-button w3-padding">
    <i class="fas fa-angle-double-right" aria-hidden="true"></i>  <b>All Category</b>
  </a>

  <a href="{{URL::to('/manufacture')}}" class="w3-bar-item w3-button w3-padding">
    <i class="fas fa-bullhorn" aria-hidden="true"></i>  <b>All Manufacture</b>
  </a>

  <a href="{{URL::to('/product')}}" class="w3-bar-item w3-button w3-padding">
    <i class="fab fa-product-hunt" aria-hidden="true"></i>  <b>All Product</b>
  </a>

  <a href="{{URL::to('/all_slider')}}" class="w3-bar-item w3-button w3-padding">
    <i class="far fa-images" aria-hidden="true"></i>  <b>Slider</b>
  </a>

  <a href="{{URL::to('/manage_order')}}" class="w3-bar-item w3-button w3-padding">
    <i class="fas fa-shopping-basket" aria-hidden="true"></i>  <b>Order</b>
  </a>

  <a href="#" class="w3-bar-item w3-button w3-padding">
    <i class="fab fa-facebook-square" aria-hidden="true"></i>  <b>Social Link</b>
  </a>

  <a href="#" class="w3-bar-item w3-button w3-padding">
    <i class="fas fa-truck" aria-hidden="true"></i>  <b>Delivery</b>
  </a>

	<a href="#" class="w3-bar-item w3-button w3-padding">
    <i class="fas fa-user-lock" aria-hidden="true"></i>  <b>User Admin</b>
  </a>

	<a href="#" class="w3-bar-item w3-button w3-padding">
    <i class="fa fa-cog fa-fw"></i>  <b>Setting</b>
  </a><br><br>
	</div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
{{--   <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> ໜ້າຄວບຄຸມ</b></h5>
  </header> --}}

   @yield('admin_content')