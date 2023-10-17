<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>HoloolTech</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/png" href="asset/images/favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- all css here -->
        <!-- bootstrap v3.3.7 css -->
        <link rel="stylesheet" href="{{ URL::asset('asset/css/bootstrap.min.css')}}" />
        <!-- animate css -->
        <link rel="stylesheet" href="{{ URL::asset('asset/css/animate.css')}}" />
        <!-- owl.carousel.2.0.0-beta.2.4 css -->
        <link rel="stylesheet" href="{{ URL::asset('asset/css/owl.carousel.css')}}" />
        <!-- font-awesome v4.6.3 css -->
        <link rel="stylesheet" href="{{ URL::asset('asset/css/font-awesome.min.css')}}" />
        <!-- magnific-popup.css -->
        <link rel="stylesheet" href="{{ URL::asset('asset/css/magnific-popup.css')}}" />
        <!-- flaticon.css -->
        <link rel="stylesheet" href="{{ URL::asset('asset/css/flaticon.css')}}" />
        <!-- slicknav.min.css -->
        <link rel="stylesheet" href="{{ URL::asset('asset/css/slicknav.min.css')}}" />
        <!-- style css -->
        <link rel="stylesheet" href="{{ URL::asset('asset/css/styles.css')}}" />
        <!-- responsive css -->
        <link rel="stylesheet" href="{{ URL::asset('asset/css/responsive.css')}}" />
        <!-- modernizr css -->
        <script href="{{ URL::asset('asset/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- header-area start -->
        <header class="header-area" id="sticky-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="header-bottom">
                             <div class="row">
                                <div class="col-md-3 col-sm-9 col-xs-6">
                                    <div class="logo">

                                    </div>
                                </div>
                                <div class="col-md-8 hidden-sm hidden-xs">
                                    <div class="mainmenu text-right">
                                        <ul id="navigation">
                                            <li class="active"><a href="index.html">Home</a>
                                            </li>
                                            <li><a href="service.html">Services</a>
                                            </li>
                                            <li><a href="#">Product</a>
                                            </li>
                                            <li><a href="blog.html">Certifications</a>
                                            </li>
											<li><a href="shop.html">Shop</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-2 col-xs-4">
                                    <div class="search-wrap text-right">
                                        <ul>

                                            <li><a href="cart.html"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span>1</span></a></li>
                                            <li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class=" col-xs-2 col-sm-1 hidden-md hidden-lg" style="color:green">
                                    <div class="responsive-menu-wrap floatright"></div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
		<!-- cart-area start -->
        @php
            $alltotal = 0;
        @endphp
		<div class="cart-area bg-1 ptb-130">
			<div class="container">
				<div class="row">
                    @if ($message = Session::get('Message'))
                    <div class="alert2">
                        <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span>
                        {{$message}}
                    </div>
                    @endif
					<div class="col-md-10 col-md-offset-1 col-xs-12">
						<div class="shoping-cart-wrap table-responsive  bg-2 mb-30">
							<table>
								<thead>
									<tr>
										<th class="shoping-cart-img">Image</th>
										<th class="shoping-cart-name">Product Name</th>
										<th class="shoping-cart-price">Price</th>
										<th class="shoping-cart-quantity">Quantity</th>
										<th class="shoping-cart-total">Total</th>
										<th class="shoping-cart-remove">Action</th>
									</tr>
								</thead>
							</table>
							<div class="table-wrap bg-2">
								<table>
									<tbody>
                                        @php
                                            $total = 0
                                        @endphp
                                        @if(session()->has('cartdata'))
                                         @if ($message = Session::get('cartdata'))
                                         @foreach ($message as $item)
                                        <tr>
                                            @php
                                            $images = explode('|',$item['images']);
                                            $img = $images[0];
                                            @endphp
											<td class="shoping-cart-img">
												<img src="{{$img}}" alt="" />
											</td>
											<td class="shoping-cart-name">
												<a href="#">{{$item['name']}}</a>
											</td>
											<td class="shoping-cart-price">
												<span>{{$item['price']}}</span>
											</td>
											<td class="shoping-cart-quantity">
                                                @php
                                                    $test = null;
                                                @endphp
                                                <form action="{{route('/updatecart',$item['id'])}}" method="GET">
												<input type="number" name ="quantity" value="{{$item['quantity']}}" />
											</td>
                                            @php
                                            $total = $item['price'] * $item['quantity'];
                                            @endphp
											<td class="shoping-cart-total">
												<span>
                                                    {{$total}}
                                                    @php
                                                        $alltotal += $total;
                                                    @endphp
                                                    {{-- {{$test}} --}}
                                                </span>
											</td>
											<td class="shoping-cart-remove">
                                            <div class="row row-col-2">
                                                <div class="col">
                                                        <button  class="btn btn-warning" type="submit"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col" style="padding-top: 5%">
                                                    <form action="{{route('/deleteitem', $item['id'])}}">
                                                        @method('DELETE')
                                                        <button class="btn btn-warning" type="submit"> <i class="fa fa-times"></i> </button>
                                                    </form>
                                            </div>
                                            </div>
												{{-- <a href="{{route('/deleteitem')}}"><i class="fa fa-times"></i></a> --}}
											</td>
										</tr>
                                        @endforeach
                                        @php
                                            $order = array();
                                            $order = $message;
                                        @endphp
                                        @else
                                        @endif

									</tbody>
								</table>
								<div class="shoping-cart-btn">
									{{-- <a href="#">Update Cart</a>
                                    <button type="submit"> Update Cart </button>
                                    <form action="{{route('/storeorder')}}" method="POST">
                                        @csrf
                                    @foreach ($message as $item)
                                        <input type="hidden" name = "id[]" value="{{$item['id']}}">
                                    @endforeach
                                    <button class="btn btn-warning" type="submit">Checkout</button>
                                </form> --}}
                                @endif
								</div>
							</div>
						</div>
							<div class="col-md-8 col-xs-12">
								<div class="shoping-cart-wrapper cart-form-wrap bg-2">
									<h3 class="widget-title">Cart Total</h3>
									<ul>
										<li>Total Summation<span>{{$alltotal}}</span></li>
									</ul>
                                    @if (Session::has('cartdata'))
                                    <form action="{{route('/storeorder',$alltotal)}}" method="POST">
                                        @csrf
                                    @foreach ($message as $item)
                                        <input type="hidden" name = "id[]" value="{{$item['id']}}">
                                    @endforeach
                                    <button  type="submit">Proceed To Checkout</button>
                                    @endif
                                    {{-- <button class="btn btn-warning" type="submit">Checkout</button> --}}
                                </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        {{-- <footer class="footer-area bg-1">
            <div class="footer-top">
            </div>
            <div class="footer-bottom-area">
            </div>
        </footer> --}}
        <!-- footer-area end -->

		<!-- all js here -->
		<!-- jquery latest version -->
        <script href="{{ URL::asset('asset/js/vendor/jquery-1.12.4.min.js')}}"></script>
		<!-- bootstrap js -->
        <script href="{{ URL::asset('asset/js/bootstrap.min.js')}}"></script>
		<!-- owl.carousel.2.0.0-beta.2.4 css -->
        <script href="{{ URL::asset('asset/js/owl.carousel.min.js')}}"></script>
		<!-- counterup.main.js -->
        <script href="{{ URL::asset('asset/js/counterup.main.js')}}"></script>
		<!-- isotope.pkgd.min.js -->
        <script href="{{ URL::asset('asset/js/imagesloaded.pkgd.min.js')}}"></script>
		<!-- isotope.pkgd.min.js -->
        <script href="{{ URL::asset('asset/js/isotope.pkgd.min.js')}}"></script>
		<!-- jquery.waypoints.min.js -->
        <script href="{{ URL::asset('asset/js/jquery.waypoints.min.js')}}"></script>
		<!-- jquery.magnific-popup.min.js -->
        <script href="{{ URL::asset('asset/js/jquery.magnific-popup.min.js')}}"></script>
		<!-- jquery.slicknav.min.js -->
        <script href="{{ URL::asset('asset/js/jquery.slicknav.min.js')}}"></script>
		<!-- wow js -->
        <script href="{{ URL::asset('asset/js/wow.min.js')}}"></script>
		<!-- plugins js -->
        <script href="{{ URL::asset('asset/js/plugins.js')}}"></script>
		<!-- main js -->
        <script href="{{ URL::asset('asset/js/scripts.js')}}"></script>
    </body>
</html>
