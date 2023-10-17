<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>HoloolTech</title>
        {{-- <meta name="description" content=""> --}}
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
        <header class="header-area" id="sticky-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="header-bottom">
                             <div class="row">
                                <div class="col-md-3 col-sm-9 col-xs-6">
                                    <div class="logo">
                                        <a href="index.html">
                                            <img src="assets/images/logo.png" alt="">
                                        </a>
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
                                        <li><a href="{{route('/showcart')}}"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span>0</span></a></li>
                                        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- shop-area start -->
        <div class="shop-area bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                        <div class="section-title text-center">
                            @if ($message = Session::get('Message'))
                            <div class="alert2">
                                <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span>
                                {{$message}}
                            </div>
                            @endif
                            <h2>Our Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($product as $item)
                    @php
                    $images = explode('|',$item->images);
                    $img = $images[0];
                    @endphp
                    <div class="col-md-3 col-sm-6 col-xs-12 col-2">
                        <div class="shop-wrap">
                            <div class="shop-img">
                                <img src="{{$img}}" alt="">

                                <ul>
                                    <li><a href="{{route('/addtocart',$item->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    {{-- <li><a href="#"><i class="fa fa-eye"></i></a></li> --}}
                                </ul>
                            </div>
                            <div class="shop-content">
                                <h3><a href="shop.html">{{$item->name}}</a></h3>
                                <p>{{$item->price}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- shop-area end -->

        <!-- footer-area start -->
        <footer class="footer-area bg-1">
            <div class="footer-top">
            </div>
            <div class="footer-bottom-area">
            </div>
        </footer>
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


