<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Administrator</title>

    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/sweetalert.css') }}">


    <style>
      body {
        font-family: 'Kanit', sans-serif;
      }
      tr th {
        text-align: center;
      }
      tr td {
        text-align: center;
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
        <a class="navbar-brand" href="{{ url('/admin') }}">
            บ้านเตรียม
        </a>

      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">

          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">

          @if (session('current_menu') == 'ManageExam')
            <li class="dropdown active">
            @else
            <li class="dropdown">
          @endif
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    จัดการข้อสอบ <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/manage_exam/1') }}">ระดับ 1</a></li>
                    <li><a href="{{ url('/manage_exam/2') }}">ระดับ 2</a></li>
                    <li><a href="{{ url('/manage_exam/3') }}">ระดับ 3</a></li>
                    <li><a href="{{ url('/manage_exam/4') }}">ระดับ 4</a></li>
                    <li><a href="{{ url('/manage_exam/5') }}">ระดับ 5</a></li>
                    <li><a href="{{ url('/manage_exam/6') }}">ระดับ 6</a></li>
                    <li><a href="{{ url('/manage_exam/7') }}">ระดับ 7</a></li>
                    <li><a href="{{ url('/manage_exam/8') }}">ระดับ 8</a></li>
                    <li><a href="{{ url('/manage_exam/9') }}">ระดับ 9</a></li>
                    <li><a href="{{ url('/manage_exam/10') }}">ระดับ 10</a></li>
                </ul>
            </li>

            @if (session('current_menu') == 'ManageMember')
              <li class="dropdown active">
              @else
              <li class="dropdown">
            @endif
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      จัดการข้อมูลผู้ใช้งาน <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li><a href="{{ url('/manage_member') }}">ผู้ใช้งานทั้งหมด</a></li>
                      <li><a href="{{ url('/search_member') }}">ค้นหาผู้ใช้งาน</a></li>
                  </ul>
              </li>

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">

            @if (session('current_menu') == 'info_personal')
              <li class="dropdown active">
              @else
              <li class="dropdown">
            @endif
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->username }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/personal') }}"><i class="fa fa-btn fa-info"></i> แก้ไขข้อมูลส่วนตัว</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> ออกจากระบบ</a></li>
                </ul>
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
