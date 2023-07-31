<!DOCTYPE html>

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
  .logoutbtn {
    width: 107px;
    height: 48px;
    left: 1710px;
    top: 46px;
    background: #FB3A3A;
    border: none;
    border-radius: 5px;
    text-align: center;
    font-size: 12px;

    cursor: pointer;
  }
</style>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>REPORT ITSA</title>

  <link rel="apple-touch-icon" sizes="57x57" href="{{asset('public/img/favicon3/apple-icon-57x57.png')}}">

  <link rel="apple-touch-icon" sizes="60x60" href="{{asset('public/img/favicon3/apple-icon-60x60.png')}}">

  <link rel="apple-touch-icon" sizes="72x72" href="{{asset('public/img/favicon3/apple-icon-72x72.png')}}">

  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/img/favicon3/apple-icon-76x76.png')}}">

  <link rel="apple-touch-icon" sizes="114x114" href="{{asset('public/img/favicon3/apple-icon-114x114.png')}}">

  <link rel="apple-touch-icon" sizes="120x120" href="{{asset('public/img/favicon3/apple-icon-120x120.png')}}">

  <link rel="apple-touch-icon" sizes="144x144" href="{{asset('public/img/favicon3/apple-icon-144x144.png')}}">

  <link rel="apple-touch-icon" sizes="152x152" href="{{asset('public/img/favicon3/apple-icon-152x152.png')}}">

  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/img/favicon3/apple-icon-180x180.png')}}">

  <link rel="icon" type="image/png" sizes="192x192" href="{{asset('public/img/favicon3/android-icon-192x192.png')}}">

  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/img/favicon3/favicon-32x32.png')}}">

  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('public/img/favicon3/favicon-96x96.png')}}">

  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/img/favicon3/favicon-16x16.png')}}">

  <link rel="manifest" href="{{asset('public/img/favicon3/manifest.json')}}">

  <meta name="msapplication-TileColor" content="#ffffff">

  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">

  <meta name="theme-color" content="#ffffff">


  <!---------------------------- FOR USE CSS ---------------------------->
  <!-- Add this in the <head> section of your HTML -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style_timelane.css?v2?>')}}">

  <link rel="stylesheet" href="{{asset('public/css/style.css?v=1.0')}}">

  <link rel="stylesheet" href="{{asset('public/css/responsive.css')}}">

  <link rel="stylesheet" href="{{asset('public/css/dropify.min.css')}}">

  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"> --}}

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"> -->

  @yield('css')

  <style>
    body {
      background: #F0F0F0 !important;
    }

    a.ex3:hover,
    a.ex3:active {
      /* background: black; */
    }

    .desktop-show {
      display: block !important;
    }

    .mobile-show {
      display: none !important;
    }

    .header-menu-c {
      color: #464A53;
    }

    .width-offset-desk {
      width: 102% !important;
    }

    .height-nav-desk {
      height: 15vh;
    }

    .bg-1D7B85 {
      background: #1D7B85;
    }

    .nav-box-sh {
      box-shadow: 0px 3px 10px 0px #abab;
    }

    .site-footer__bottom-footer p a {
      color: #898989 !important;
      /* -webkit-transition: all .4s ease;
      transition: all .4s ease; */
    }

    .site-footer__bottom-footer {
      /* background-color: #FAFAFA; */
      padding: 25px 0 !important;
    }

    @media screen and (min-width: 499px) and (max-width: 1000px) {
      .desktop-show {
        display: none !important;
      }

      .mobile-show {
        display: block !important;
      }
    }

    @media screen and (max-width: 489px) {
      .desktop-show {
        display: none !important;
      }

      .mobile-show {
        display: block !important;
      }
    }
  </style>

</head>

@php
$role = Auth::user()->role;
@endphp

<body>

  <div class="preloader" style="display: none;"></div><!-- /.preloader -->
  <div class="page-wrapper">

    <!--------- Desktop header --------->
    <header class="site-header header-one desktop-show" style="background-color: #fff;">
      <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky slideIn animated width-offset-desk nav-box-sh" style="background-color: #fff;">
        <div class="row clearfix w-100 ">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="col-2 col-lg-2 col-xl-2 logo-box clearfix d-flex justify-content-center align-items-center bg-1D7B85">
            <img src="{{ asset('public/img/aset/monitoring-globaldeva-goodeva-logo.png') }}" style="width: 75%; height: auto;" class="main-logo" alt="Awesome Image">
          </div><!-- /.logo-box -->
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="col-8 col-lg-8 col-xl-8 main-navigation">
            <ul class=" navigation-box one-page-scroll-menu ">
              <li class="scrollToLink">
                <a class="ex3 header-menu-c" href="{{ url('home') }}">
                  Materi
                  <button class="sub-nav-toggler">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </a>
                <ul class="sub-menu">
                  <li><a href="{{ url('library') }}">Library</a></li>
                </ul>
                <!-- /.sub-menu -->
              </li>
              <!-- <li class="scrollToLink current">
                <a class="ex3 header-menu-c" href="{{ url('home') }}">Materi</a>
              </li> -->
              <li class="scrollToLink">
                <a class="ex3 header-menu-c" href="{{ url('project') }}">Project</a>
              </li>
              <li class="scrollToLink">
                <a class="ex3 header-menu-c" href="{{ url('domain') }}">Domain</a>

              </li>
              <li class="scrollToLink">
                <a class="ex3 header-menu-c" href="{{ url('FAQ') }}">FaQ</a>

              </li>
              <li class="scrollToLink">
                <a class="ex3 header-menu-c" href="#blog">Leader Board<button class="sub-nav-toggler"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button></a>
                <ul class="sub-menu">
                  <li><a href="{{ url('/leaderboard-response') }}">Response</a></li>
                  <li><a href="{{ url('/leaderboard-performance')}}">Performance</a></li>
                </ul><!-- /.sub-menu -->
                {{-- <a class="ex3 header-menu-c" href="{{ url('/leaderboard') }}">Leader Board</a> --}}
              </li>

              <li class="scrollTolink">
                @if($role == "1")
                <a class="ex3 header-menu-c" href="{{ url('cases') }}">Case</a>
                @endif

                @if($role == "2")
                <a class="ex3 header-menu-c" href="#blog">Report<button class="sub-nav-toggler"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> <span class="icon-bar"></span></button></a>
                <ul class="sub-menu">
                  <li><a href="{{url('status-cases')}}">Daily Case</a></li>
                  <li><a href="{{url('cms-pertanyaan')}}">Question Monitoring</a></li>
                  <li><a href="{{url('cms-pertanyaan-case')}}">Kategori Case</a></li>
                </ul>
                @endif

                @if($role == "3")
                <a class="ex3 header-menu-c" href="#blog">KPI<button class="sub-nav-toggler"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span class="icon-bar"></span> <span class="icon-bar"></span></button></a>
                {{-- <a class="ex3 header-menu-c" href="{{url('status-cases')}}">Case</a> --}}
                <ul class="sub-menu">
                  <li><a href="{{url('status-cases')}}">Case</a></li>
                  <li><a href="{{url('penalty')}}">Penalty</a></li>
                  <li><a href="{{url('cms-pertanyaan')}}">Question Monitoring</a></li>
                  <li><a href="{{url('cms-pertanyaan-case')}}">Kategori Case</a></li>
                </ul>
                @endif
              </li>

              <li class="scrollToLink">
                <a class="ex3 header-menu-c" href="#blog">Monitoring<button class="sub-nav-toggler"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button></a>
                <ul class="sub-menu">
                  @if($role == "2")
                  <li><a href="{{ url('absen-monitoring') }}">Absen Monitoring</a></li>
                  <li><a href="{{ url('reporting-monitoring') }}">Reporting Monitoring</a></li>
                  <li><a href="{{ url('reporting-monitoring-v2-dev') }}">Reporting Monitoring V2</a></li>
                  <li><a href="{{ url('jadwal-monitoring') }}">Jadwal Monitoring</a></li>
                  @endif

                  @if($role == "1")
                  <li><a href="{{ url('absen-monitoring') }}">Absen Monitoring</a></li>
                  <li><a href="{{ url('reporting-monitoring') }}">Reporting Monitoring</a></li>
                  <li><a href="{{ url('reporting-monitoring-v2-dev') }}">Reporting Monitoring V2</a></li>
                  <li><a href="{{ url('sisa-ram') }}">Absen Ram 30 Menit</a></li>
                  <li><a href="{{ url('jadwal-monitoring') }}">Jadwal Monitoring</a></li>
                  @endif

                  @if($role == "3")
                  <li><a href="{{ url('absen-monitoring') }}">Absen Monitoring</a></li>
                  <li><a href="{{ url('reporting-monitoring') }}">Reporting Monitoring</a></li>
                  <li><a href="{{ url('reporting-monitoring-v2-dev') }}">Reporting Monitoring V2</a></li>
                  <li><a href="{{ url('sisa-ram') }}">Absen Ram 30 Menit</a></li>
                  <li><a href="{{ url('jadwal-monitoring') }}">Jadwal Monitoring</a></li>
                  @endif
                </ul><!-- /.sub-menu -->
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
          <div class="col-2 col-lg-2 col-xl-2 d-flex justify-content-center align-items-center right-side-box warna-logout">
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="logoutbtn text-white"><img style="width: 25px; height:20px; margin-right: 15px;" src="{{ asset('public/img/logo/logo-logout.png') }}" alt="Awesome Image">Log Out</button>
            </form>
          </div><!-- /.right-side-box -->
        </div>
        <!-- /.container -->
      </nav>
    </header><!-- /.header-one -->


    <!--------- Mobile header --------->
    <header class="site-header header-one mobile-show" style="background-color: #66BFBF;">
      <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky slideIn animated" style="background-color: #252525">
        <div class="container-fluid clearfix">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="logo-box clearfix">
            <img src="{{ asset('public/img/aset/monitoring-globaldeva-goodeva-logo.png') }}" style="width: 48px; height: 70px; margin-left: 25%" class="main-logo" alt="Awesome Image">
            <button class="menu-toggler" data-target=".header-one .main-navigation" style="margin-right: 0%;">
              <span class="fa fa-bars"></span>
            </button>
          </div><!-- /.logo-box -->
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="main-navigation">
            <ul class=" navigation-box one-page-scroll-menu ">
              <li class="scrollToLink">
                <a class="ex3" href="{{ url('home') }}" style="color: #464A53;">
                  Materi
                  <button class="sub-nav-toggler">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </a>
                <ul class="sub-menu">
                  <li><a href="{{ url('library') }}">Library</a></li>
                </ul>
                <!-- /.sub-menu -->
              </li>
              <!-- <li class="scrollToLink current">
                <a class="ex3" href="{{ url('home') }}" style="color: #464A53;">Materi</a>
              </li> -->
              <li class="scrollToLink">
                <a class="ex3" href="{{ url('project') }}" style="color: #464A53;">Project</a>
              </li>
              <li class="scrollToLink">
                <a class="ex3" href="{{ url('domain') }}" style="color: #464A53;">Domain</a>

              </li>
              <li class="scrollToLink">
                <a class="ex3" href="{{ url('FAQ') }}" style="color: #464A53;">FaQ</a>

              </li>
              <li class="scrollToLink">
                <a class="ex3" href="#blog" style="color: #464A53;">Leader Board<button class="sub-nav-toggler"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button></a>
                <ul class="sub-menu">
                  <li><a href="{{ url('/leaderboard-response') }}">Response</a></li>
                  <li><a href="{{ url('/leaderboard-performance')}}">Performance</a></li>
                </ul><!-- /.sub-menu -->
                {{-- <a class="ex3" href="{{ url('/leaderboard') }}" style="color: white;">Leader Board</a> --}}
              </li>

              <li class="scrollTolink">
                @if($role == "1")
                <a class="ex3" href="{{ url('cases') }}" style="color: white;">Case</a>
                @endif

                @if($role == "2")
                <a class="ex3" href="#blog" style="color: white;">Report<button class="sub-nav-toggler"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> <span class="icon-bar"></span></button></a>
                <ul class="sub-menu">
                  <li><a href="{{url('status-cases')}}">Daily Case</a></li>
                  <li><a href="{{url('cms-pertanyaan')}}">Question Monitoring</a></li>
                  <li><a href="{{url('cms-pertanyaan-case')}}">Kategori Case</a></li>
                </ul>
                @endif

                @if($role == "3")
                <a class="ex3" href="#blog" style="color: white;">KPI<button class="sub-nav-toggler"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span class="icon-bar"></span> <span class="icon-bar"></span></button></a>
                {{-- <a class="ex3" href="{{url('status-cases')}}" style="color: white;">Case</a> --}}
                <ul class="sub-menu">
                  <li><a href="{{url('status-cases')}}">Case</a></li>
                  <li><a href="{{url('penalty')}}">Penalty</a></li>
                  <li><a href="{{url('cms-pertanyaan')}}">Question Monitoring</a></li>
                  <li><a href="{{url('cms-pertanyaan-case')}}">Kategori Case</a></li>
                </ul>
                @endif
              </li>

              <li class="scrollToLink">
                <a class="ex3" href="#blog" style="color: white;">Monitoring<button class="sub-nav-toggler"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button></a>
                <ul class="sub-menu">
                  @if($role == "2")
                  <li><a href="{{ url('absen-monitoring') }}">Absen Monitoring</a></li>
                  <li><a href="{{ url('reporting-monitoring') }}">Reporting Monitoring</a></li>
                  <li><a href="{{ url('reporting-monitoring-v2-dev') }}">Reporting Monitoring V2</a></li>
                  <li><a href="{{ url('jadwal-monitoring') }}">Jadwal Monitoring</a></li>
                  @endif

                  @if($role == "1")
                  <li><a href="{{ url('absen-monitoring') }}">Absen Monitoring</a></li>
                  <li><a href="{{ url('reporting-monitoring') }}">Reporting Monitoring</a></li>
                  <li><a href="{{ url('reporting-monitoring-v2-dev') }}">Reporting Monitoring V2</a></li>
                  <li><a href="{{ url('sisa-ram') }}">Absen Ram 30 Menit</a></li>
                  <li><a href="{{ url('jadwal-monitoring') }}">Jadwal Monitoring</a></li>
                  @endif

                  @if($role == "3")
                  <li><a href="{{ url('absen-monitoring') }}">Absen Monitoring</a></li>
                  <li><a href="{{ url('reporting-monitoring') }}">Reporting Monitoring</a></li>
                  <li><a href="{{ url('reporting-monitoring-v2-dev') }}">Reporting Monitoring V2</a></li>
                  <li><a href="{{ url('sisa-ram') }}">Absen Ram 30 Menit</a></li>
                  <li><a href="{{ url('jadwal-monitoring') }}">Jadwal Monitoring</a></li>
                  @endif
                </ul><!-- /.sub-menu -->
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
          <div class="right-side-box warna-logout">
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="logoutbtn text-white"><img style="width: 25px; height:20px; margin-right: 15px;" src="{{ asset('public/img/logo/logo-logout.png') }}" alt="Awesome Image">Log Out</button>
            </form>
          </div><!-- /.right-side-box -->
        </div>
        <!-- /.container -->
      </nav>
    </header><!-- /.header-one -->


    @yield('content')

    <!--------- Footer --------->
    <footer class="site-footer mt-5">

      <!-- <img src="{{asset('public/img/banner-icon-1-1.png')}}" alt="Awesome Image" class="bubble-1" /> -->
      <!-- <img src="{{asset('public/img/banner-icon-1-3.png')}}" alt="Awesome Image" class="bubble-2" /> -->
      <!-- <img src="{{asset('public/img/banner-icon-1-2.png')}}" alt="Awesome Image" class="bubble-3" /> -->
      <!-- <img src="{{asset('public/img/banner-icon-1-4.png')}}" alt="Awesome Image" class="bubble-4" /> -->

      <div class="site-footer__bottom-footer text-center">

        <div class="container">

          <p> {{ date('Y') }} copyright &copy; <a href="#">Tim Teknis Monitoring ></a></p>

        </div><!-- /.container -->

      </div><!-- /.site-footer__bottom-footer -->

    </footer><!-- /.site-footer -->
    <!--------- Footer --------->

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

  <script src="{{asset('public/js/fslightbox.js')}}"></script>

  @yield('js_after')



  <script>
    $(document).ready(function() {

      $('.js-example-basic-single').select2({

        //theme:"bootstrap4"

      });

    });
  </script>
</body>



</html>