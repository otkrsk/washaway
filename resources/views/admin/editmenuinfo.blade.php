@extends('layouts.app')

@section('content')
<h3>Edit Menu Information</h3>

<form class="col s12" action="post_capture.php" method="POST">

  <div class="row">
    <table>
      <thead>
        <tr>
          <th>Menu Item</th>
          <th>Status</th>
        </tr>
      </thead>

      <tbody>
        @foreach($menuItems as $menu)
          <tr>
            <td>{{ $menu }}</td>
            <td>
              <div class="switch">
                <label>
                  Off
                  <input type="checkbox" name="checkbox01">
                  <span class="lever"></span>
                  On
                </label>
              </div>
            </td>

          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <button type="submit" name="submit" class="waves-effect waves-light btn-large">Save Changes</button>
</form>

@endsection