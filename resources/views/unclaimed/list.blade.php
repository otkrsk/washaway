@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Select Remaining Unclaimed</h3>
  @if($message = Session::get('error'))
  <strong style="color:red;">{{ $message }}</strong>
  @endif
</div>


{!! Form::open(['route' => ['unclaimed.add', 'customer' => $customer], 'class' => 'col s12']) !!}
<div class="row">
  <table>
    @foreach($customer->unclaimed as $unclaimed)
      <tr>
        <td>{{ $unclaimed->menuitems->first()->name }}</td>
        <td>x {{ $unclaimed->quantity }}</td>
        <td>
          <label>
            <input name="menu_item[{{ $unclaimed->menuitems->first()->id }}]" type="checkbox" />
            <span>&nbsp;</span>
          </label>
        </td>
      </tr>
    @endforeach
  </table>
</div>

<div class="row">
  <button type="submit" class="waves-effect waves-light btn-large">Add Service(s)</button>
</div>
{!! Form::close() !!}

@endsection