<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Home One || Nonid || SEO & Software Landing Page HTML Template</title>

    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('public/img/favicon/apple-icon-57x57.png')}}">

    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('public/img/favicon/apple-icon-60x60.png')}}">

    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('public/img/favicon/apple-icon-72x72.png')}}">

    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/img/favicon/apple-icon-76x76.png')}}">

    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('public/img/favicon/apple-icon-114x114.png')}}">

    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('public/img/favicon/apple-icon-120x120.png')}}">

    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('public/img/favicon/apple-icon-144x144.png')}}">

    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('public/img/favicon/apple-icon-152x152.png')}}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/img/favicon/apple-icon-180x180.png')}}">

    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('public/img/favicon/android-icon-192x192.png')}}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/img/favicon/favicon-32x32.png')}}">

    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('public/img/favicon/favicon-96x96.png')}}">

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/img/favicon/favicon-16x16.png')}}">

    <link rel="manifest" href="{{asset('public/img/favicon/manifest.json')}}">

    <meta name="msapplication-TileColor" content="#ffffff">

    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">

    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style_timelane.css?v2?>')}}">

    <link rel="stylesheet" href="{{asset('public/css/style.css?v=1.0')}}">

    <link rel="stylesheet" href="{{asset('public/css/responsive.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/dropify.min.css')}}">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"> --}}

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    @yield('css')



    {{-- <style>

        .select2 {

            width: 100% !important;

        }

        footer .site-footer__bottom-footer span {

            font-size: 9px;

        }

    </style> --}}

</head>



<body>

    <div class="preloader" style="display: none;"></div><!-- /.preloader -->
    <div class="page-wrapper">

    	<header class="site-header header-one">
            <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky slideIn animated">
                <div class="container clearfix">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="logo-box clearfix">
                        <a class="navbar-brand" href="{{ url('home') }}">
                            <img src="{{ asset('public/img/logo-1-1.png') }}" class="main-logo" alt="Awesome Image">
                        </a>
                        <button class="menu-toggler" data-target=".header-one .main-navigation">
                            <span class="fa fa-bars"></span>
                        </button>
                    </div><!-- /.logo-box -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="main-navigation">
                        <ul class=" navigation-box one-page-scroll-menu ">
                            <li class="scrollToLink current">
                                <a href="{{ url('home') }}">Materi</a>
                            </li>
                            <li class="scrollToLink">
                                <a href="{{ url('project') }}">Project</a>
                            </li>
                            <li class="scrollToLink">
                                <a href="{{ url('domain') }}">Domain</a>
                                
                            </li>
                            <li class="scrollToLink">
                                <a href="{{ url('info') }}">Info</a>
                                
                            </li>
                            <li class="scrollToLink">
                                <a href="{{ url('/') }}">Timeline</a>
                            </li>
                            <li class="scrollToLink">
                                <a href="#blog">Other<button class="sub-nav-toggler"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('absen') }}">Absen Monitoring</a></li>
                                    <li><a href="{{ url('cases') }}">Case</a></li>
                                    <li><a href="{{ url('reporting-monitoring') }}">Reporting Monitoring</a></li>
                                    <li><a href="{{ url('sisa-ram') }}">Sisa Ram</a></li>
                                </ul><!-- /.sub-menu -->
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                    <div class="right-side-box">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn header-one__btn">logout</button>
                        </form>
                    </div><!-- /.right-side-box -->
                </div>
                <!-- /.container -->
            </nav>
        </header><!-- /.header-one -->


        @yield('content')
        <footer class="site-footer mt-5">

            <img src="{{asset('public/img/banner-icon-1-1.png')}}" alt="Awesome Image" class="bubble-1" />

            <img src="{{asset('public/img/banner-icon-1-3.png')}}" alt="Awesome Image" class="bubble-2" />

            <img src="{{asset('public/img/banner-icon-1-2.png')}}" alt="Awesome Image" class="bubble-3" />

            <img src="{{asset('public/img/banner-icon-1-4.png')}}" alt="Awesome Image" class="bubble-4" />

            <div class="site-footer__bottom-footer text-center">

                <div class="container">

                    <p>&copy; copyright 2022 by <a href="#">Tim Teknis Monitoring ></a></p>

                </div><!-- /.container -->

            </div><!-- /.site-footer__bottom-footer -->

        </footer><!-- /.site-footer -->
    </div><!-- /.page-wrapper -->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top" style="display: none;"><i class="fa fa-angle-up"></i></a>
    <!-- /.scroll-to-top -->

    <script src="{{asset('public/js/jquery.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script> --}}

    <script src="{{asset('public/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('public/js/waypoints.min.js')}}"></script>

    <script src="{{asset('public/js/jquery.counterup.min.js')}}"></script>

    <script src="{{asset('public/js/jquery.bxslider.min.js')}}"></script>

    <script src="{{asset('public/js/jquery.easing.min.js')}}"></script>

    <script src="{{asset('public/js/theme.js')}}"></script>

    <script src="{{asset('public/js/dropify.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('js_after')



    <script>

        $(document).ready(function() {

            $('.js-example-basic-single').select2({

                theme:"bootstrap4"

            });

        });

    </script>

</body>



</html>