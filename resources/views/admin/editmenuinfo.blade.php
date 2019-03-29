@extends('layouts.app')

@section('content')
<h3>Edit Menu Information</h3>

{!! Form::open(['route' => 'admin.updatemenu', 'class' => 'col s12']) !!}

  <div class="row">
    <table>
      <thead>
        <tr>
          <th>Menu Item</th>
          <th>Status</th>
        </tr>
      </thead>

      <tbody>
        @foreach($menuItems as $key => $value)
          <tr>
            <td>{{ $value->menu_item }}</td>
            <td>
              <div class="switch">
                <label>
                  Off
                  <input type="checkbox" name="cb[{{ $value->id }}]" data-status="{{ $value->status }}">
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
{!! Form::close() !!}

@endsection