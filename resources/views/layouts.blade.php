<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.ico">
<link rel="stylesheet" href="{{asset('assets/frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/assets/css/custom.css')}}">


</head>
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
 <meta name="csrf-token" content="{{ csrf_token() }}" />

<body>
    <header class="header-area header-style-1 header-height-2 sticky-bar">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
            @php

              $setting=App\Models\Setting::first();
              $coupon=App\Models\Coupon::get();

            @endphp
                <div class="row align-items-center">
                    
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                   
                                    <li>{{$setting->notice_one}}</li>
                                    @foreach($coupon as $v_coupon)
                                   <li> <strong class="text-danger">Coupon code : {{$v_coupon->coupon_code}}</strong></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block ">
            <div class="container">
                <div class="header-wrap ">
                    <div class="logo logo-width-1">
                        <a href="{{route('home')}}"><img src="{{asset($setting->logo)}}" alt="logo" style="height: 80px;"></a>
                        
                    </div>
                    <div class="header-right">

                        <div class="search-style-1">
                             <form action="{{route('search')}}" method="GET" role="search">
                     @csrf                               
                                <input type="search" name="search" id="search" placeholder="Search for Product…" ></form>

                              


                            </form>
                        </div>

                        <div class="header-action-right">
                            <div class="header-action-2">
                                @if(Auth::user())
                                <div id="profont">{{Auth::user()->name}}</div>
                                @else
                                <div id="profont">Sign In</div>
                                @endif
                                <div class="header-action-icon-2 ">
                                    <a class="mini-cart-icon" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                        </svg>
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <div class="shopping-cart-footer">
                                            
                                                @if(Auth::user())

                                                <div class="shopping-cart-button">
                                                <a class="dropdown-item" href="{{route('myaccount')}}">
                                                 <strong>{{ __('my Account') }}</strong>
                                                 </a>
                                                
                                            </div>


                                                <div class="shopping-cart-button ">
                                                <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                 <strong>{{ __('Sign Out ') }}</strong>
                                                 </a>
                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>

                                            

                                            


                                            @else

                                            <div class="shopping-cart-button" id="authbtn">
                                                <a class="dropdown-item" href="{{url('/login')}}">
                                                 <strong>{{ __('Log In account') }}</strong>
                                                 </a>
                                                
                                            </div>

                                            <div class="shopping-cart-button" id="authbtn">
                                                <a class="dropdown-item" href="{{url('/register')}}">
                                                 <strong>{{ __('Sign In accoun') }}</strong>
                                                 </a>
                                                
                                            </div>


                                                

                

                                           </div>

                                            @endif


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="cart_total" id="btn_total">          
                            </div>
                        </div>
                       
                        
                        
            
                            <div class="header-action-2">
                              
                                <div class="header-action-icon-2">
                                      {{-- cart total and count start--}}
                                    <a class="mini-cart-icon" href="{{route('cart')}}">
                                        <img alt="Surfside Media" src="{{asset('assets/frontend/assets/imgs/theme/icons/icon-cart.svg')}}">
                                      
                                        <span class="pro-count blue cart_qty"></span>
                                        
                                    </a>

                                    {{-- cart total and count end--}}
                                    
                                </div>


                            </div>
                        </div>

                       
                                
                        


                       
                   
               


                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="{{asset('assets/frontend/assets/imgs/logo/logo.png')}}" alt="logo"></a>
                    </div>

                
                    <div class="header-nav d-none d-lg-flex">
                        
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="{{route('home')}}">Home </a></li>

                                    
                                  @php

                                  $category=App\Models\Category::orderBy('id', 'DESC')->get();

                                  @endphp
                                  
                                   
                                    @foreach($category as $v_category)
                                    <li><a href="#">{{$v_category->cat_name}}<i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            @foreach($v_category->sub_categoies as $v_subcat)
                                            <li><a href="{{route('product_by_category',$v_subcat->id)}}">{{$v_subcat->subcat_name}}</a></li>
                                            @endforeach
                                                                                       
                                        </ul>
                                    </li>

                                     @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.php">
                                    <img alt="Surfside Media" src="{{asset('assets/frontend/assets/imgs/theme/icons/icon-heart.svg')}}">
                                    <span class="pro-count white">4</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="cart.html">
                                    <img alt="Surfside Media" src="{{asset('assets/frontend/assets/imgs/theme/icons/icon-cart.svg')}}">
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media" src="{{asset('assets/frontend/assets/imgs/shop/thumbnail-3.jpg')}}"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                                <h3><span>1 × </span>$800.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media" src="{{asset('assets/frontend/assets/imgs/shop/thumbnail-4.jpg')}}"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                                <h3><span>1 × </span>$3500.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="cart.html">View cart</a>
                                            <a href="shop-checkout.php">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{asset('assets/frontend/assets/imgs/logo/logo.png')}}" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">

                    <form action="{{route('search')}}" method="GET" role="search">
                     @csrf
                        <input type="search" name="search" id="search" placeholder="Search for Product…" ></form>

                        <button class="btn bg-white" type="submit">
                                  <i class="fa fa-search"></i> 
                                </button>
                    </form>

                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                <li><a href="shop.html"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a></li>
                                <li> <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="index.html">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="shop.html">shop</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our Collections</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Dresses</a></li>
                                            <li><a href="product-details.html">Blouses & Shirts</a></li>
                                            <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-details.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Jackets</a></li>
                                            <li><a href="product-details.html">Casual Faux Leather</a></li>
                                            <li><a href="product-details.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Gaming Laptops</a></li>
                                            <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                            <li><a href="product-details.html">Tablets</a></li>
                                            <li><a href="product-details.html">Laptop Accessories</a></li>
                                            <li><a href="product-details.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Blog</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a href="contact.html"> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="login.html">Log In </a>                        
                    </div>
                    <div class="single-mobile-header-info">                        
                        <a href="register.html">Sign Up</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#">(+1) 0000-000-000 </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="#"><img src="{{asset('assets/frontend/assets/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('assets/frontend/assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('assets/frontend/assets/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a>
                    <a href="#"><img src="{{asset('assets/frontend/assets/imgs/theme/icons/icon-youtube.svg')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>        
    <main class="main">
        @yield('content')
        
    </main>

    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            
            <div class="container">
                <h3 class="section-title mb-20 wow fadeIn animated"><span> Our service </span> </h3> 
                <div class="row">
                    @php
                        $feature=App\Models\Feature::latest()->get();
                        
                    @endphp

                @foreach ($feature as $v_feature )
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset($v_feature->feature_image)}}" height="100px" alt="">
                            <h4 class="bg-1">{{$v_feature ->feature_name}}</h4>
                        </div>
                    </div>
                    
                @endforeach

                    

                    
                   
                </div>
            </div>
      
        </section>
       
        
    </footer>    
    <!-- Vendor JS-->
<script src="{{asset('assets/frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/slick.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/wow.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/jquery-ui.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/counterup.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/isotope.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{asset('assets/frontend/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{asset('assets/frontend/assets/js/main.js?v=3.3')}}"></script>
<script src="{{asset('assets/frontend/assets/js/shop.js?v=3.3')}}"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>

    function cart(){
         $.ajax({
    type:'get',
    url:'{{route('all_cart')}}',
    dataType:'json',
    success:function(data){
        $('.cart_qty').empty();
        $('.cart_total').empty();
        $('.cart_qty').append(data.qty);
        $('.cart_total').append(data.total);
        
    }

    });

    }

$(document ).ready(function (e) {
    // alert('done');

   cart();



});


// cart_total

</script>


<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "126598050530945");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v17.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

</body>

</html>