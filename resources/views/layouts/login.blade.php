<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>online exam</title>

    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/sweetalert.css') }}">


    <style>
      body {
        font-family: 'Kanit', sans-serif;
      }
    </style>

  </head>
  <body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            บ้านเตรียม
        </a>

      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">

          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">

            @if (session('current_menu') == 'login')
                <li class="active">
            @else
                <li>
            @endif
                    <a href="{{ URL('/') }}">เข้าสู่ระบบ</a>
                </li>

            @if (session('current_menu') == 'register')
                <li class="active">
            @else
                <li>
            @endif
                    <a href="{{ URL('/register') }}">สมัครสมาชิก</a>
                </li>

          </ul>

      </div>

    </div>
  </nav>

  <!-- JavaScripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="{{ URL::asset('assets/js/sweetalert.min.js') }}"></script>

  @yield('content')

  </body>
</html>
