<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>WASHAWAY Auto Detailing POS</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">WASHAWAY</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ route('home') }}">Sales</a></li>
        <li><a href="{{ route('member') }}">Member</a></li>
        <li><a href="{{ route('report') }}">Report</a></li>
        <li><a href="{{ route('appointment') }}">Appointment</a></li>
        @guest
          <li><a href="{{ route('login') }}">Login</a></li>
        @else
          <li><a href="{{ route('logout') }}">Logout {{ Auth::user()->username }}</a></li>
        @endguest

        @can('manage_site')
          <li><a href="{{ route('admin.index') }}">Admin</a></li>
        @endcan
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="{{ route('home') }}">Sales</a></li>
        <li><a href="{{ route('member') }}">Member</a></li>
        <li><a href="{{ route('report') }}">Report</a></li>
        <li><a href="{{ route('appointment') }}">Appointment</a></li>
        <li>
          <div class="divider"></div>
        </li>

        @guest
          <li><a href="{{ route('login') }}">Login</a></li>
        @else
          <li><a href="{{ route('logout') }}">Logout {{ Auth::user()->username }}</a></li>
        @endguest

        @can('manage_site')
          <li><a href="{{ route('admin.index') }}">Admin</a></li>
        @endcan
      </ul>

      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="section">

        @yield('content')

      </div>
    </div>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{ asset('js/materialize.js') }}"></script>
  <script src="{{ asset('js/init.js') }}"></script>
  <script src="{{ asset('js/scripts.js') }}"></script>

  <script>
    $(document).ready(function(){
      $('.collapsible').collapsible();
      $('select').formSelect();
    });

  </script>

</body>
</html>
