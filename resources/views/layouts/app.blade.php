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
  <script src="{{ asset('js/dynamic_form.js') }}"></script>

  <script>
    $(document).ready(function() {
      $('.collapsible').collapsible();
      $('select').formSelect();
      $('.modal').modal();

      // Auto-populate Car Models in Customer creation form
      $('#brand_id').change(function() {
        console.log($(this).val());

        var value = $(this).val();
        var token = $('input[name="_token"]').val();

        $.ajax({
          url: "{{ route('ajax.test') }}",
          method: 'POST',
          data: { value: value, _token: token },
          dataType: 'json'
        }).done(function(data) {
          console.log(data);

          var content = "<option value='' disabled selected>Select car Model</option>";

          $.each(data, function(k,v) {
            content += "<option value='" + v['id'] + "'>" + v['name'] + "</option>";
          });

          $('select[name="model_id"]').empty();
          $('select[name="model_id"]').append(content);
          $('select[name="model_id"]').formSelect();

          console.log(content);
        });
      });

      // Dynamically add div in Add New Menu form
      $('#add_service').click(function() {
        console.log('yougaotme');

        var content = "<p>Add Service</p><div class='row'>";

        content += "<div class='input-field col s12'><select class='car_type' name='car_type'>";

        content += "<option value='' disabled selected>Select Service</option>";
        content += "<option value='1'>Sedan</option>";
        content += "<option value='2'>MPV</option>";
        content += "<option value='3'>Sedan (Member)</option>";
        content += "<option value='4'>MPV (Member)</option>";

        content += "</select><label>Select Service</label></div>";

        content += "<div class='input-field col s12'><input id='menu_item_name' name='menu_item_name' type='text' placeholder='Enter Name'><label class='active' for='menu_item_name'>Name</label></div>";

        content += "<div class='input-field col s12'><input id='price' name='price' type='text' placeholder='Enter Price'><label class='active' for='price'>Price</label></div>";

        content += "<div class='input-field col s12'><p><label><input type='checkbox' class='filled-in' id='unclaimed' name='unclaimed' /><span>Add to Unclaimed Services</span></label></p></div>";

        content += "<a id='save_service' class='waves-effect waves-light btn'>Add</a></div>";

        $('.services').append(content);
        $('.car_type').formSelect();
      });
    });

    $('#quantity_tbl .menuitem_qty').keyup(function() {

      if($(this).val() == '')
      {
        $('#quantity_btn').prop('disabled',true);
      }
      else
      {
        $('#quantity_btn').prop('disabled',false);
      }

    });

  </script>

</body>
</html>
