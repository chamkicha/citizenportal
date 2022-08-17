<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->


<head>
    <!--====== USEFULL META ======-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="THE TRAIN HOUSE RESTAURANT" />
    <meta name="keywords" content="restaurant, pizza, burger, business, house, online, delevery, html, coffee, cafe, bar" />
    <meta name="author" content="BDEXPERT" />
    
    <!--====== TITLE TAG ======-->
    <title>THE TRAIN HOUSE</title>

    <!--====== FAVICON ICON =======-->
    <link rel="shortcut icon" type="image/ico" href="{{ asset('/icon2.png') }}" />

    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="{{ asset('web/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/pogo-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/magnific-popup.css') }}">
    <link href="{{ asset('web/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/css/font-awesome.min.css') }}" rel="stylesheet">

    <!--====== MAIN STYLESHEETS ======-->
    <link href="{{ asset('web/style.css') }}" rel="stylesheet">
    <link href="{{ asset('web/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <script src="{{ asset('web/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body style="background-image: url('{{ asset('web/img/background.png')}}'); background-repeat: no-repeat;  background-attachment: fixed;   background-size: 100% 100%;">

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"><i class="fa fa-cutlery"></i></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>




    <!--MENUS AREA-->
    <section class="menus-area section-padding" id="home">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                    <img style="height:150px" src="{{ asset('/images/logo.png') }}" alt=""><br>
                    <h2>Today’s menu</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="food-menu-list-menu">
                        <ul>
                            <li onclick="PrintMe('all')" class="filter active" data-filter="all">All</li>
                            @foreach($categories as $category)
                            <li onclick="PrintMe('{{ $category->id }}')" class="menu" data-filter=".{{ $category->id }}">{{ $category->category_name }} </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row portfolio-area" id="data">
                {{--  @foreach($products as $product)
                <div class="col-12 col-md-6 col-lg-4 portfolio-item">
                    <div class="portfolio-inner-content">
                        <a >
                            <div class="item-img-holder position-relative">
                                <img style="max-height: 260px;" src="{{ asset('/uploads/products/'.$product->product_image) }}">
                                <div class="item-badge rounded-circle">{{ number_format($product->price,2) }}<span>Tsh</span></div>
                            </div>
                            <div class="item-detail-area">
                                <div class="d-flex justify-content-between">
                                    <h4 class="item-name">{{ $product->name }}</h4>
                                </div>
                                <p class="text">{{ $product->description }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach  --}}
            </div>

        
            
        </div>
    </section>
    <!--MENUS AREA END-->

    {{--  <div id="data">
    </div>  --}}

    <!--Text-->
    <div class="col-12 text-center mt-3">
        <p class="company-about fadeIn">© 2020 Train House Zanzibar. Made With Love By <a href="http://www.chamkicha.co.tz">pawanet</a>
        </p>
    </div>
    <br>
    <br>

    <script language="javascript">
        function PrintMe(DivID3) {
            $value=DivID3;

            $.ajax({
                
                type : 'get',
                url: '{!!URL::to('web/search')!!}',
                data:{'id':$value},
                success:function(data){

                 $('#data').empty().append(data).show(2000);
                }
            });
            
        }

        

    </script>

    <script type="text/javascript">
        $(".li").hover(function () {
            $(this).toggleClass("active");
        });
    
    </script>

    <script type="text/javascript">
        
        $('li').on('click',function(){
            $('li a').removeClass('active');
            $(this).addClass('active');
       }).first().click();

    </script>


    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script> 
            
    <script type="text/javascript">
        function loadMenu(){
            $.ajax({
                
                type : 'get',
                url:"{{ route('loadMenu') }}",
                success:function(data){
                 console.log(data);
                 $('#data').empty().append(data);
                }
            });
        }
    window.onload = loadMenu;

    </script>

    <!--====== SCRIPTS JS ======-->
    <script src="{{ asset('web/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('web/js/vendor/bootstrap.min.js') }}"></script>

    <!--====== PLUGINS JS ======-->
    <script src="{{ asset('web/js/vendor/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('web/js/vendor/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.pogo-slider.js') }}"></script>
    <script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('web/js/stellar.js') }}"></script>
    <script src="{{ asset('web/js/jquery.mixitup.min.js') }}"></script>
    <script src="{{ asset('web/js/instafeed.min.js') }}"></script>
    <script src="{{ asset('web/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('web/js/timepicker.min.js') }}"></script>
    <script src="{{ asset('web/js/wow.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.sticky.js') }}"></script>

    <!--===== ACTIVE JS=====-->
    <script src="{{ asset('web/js/main.js') }}"></script>
</body>


</html>