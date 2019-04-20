@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Select Remaining Unclaimed</h3>
</div>

<div class="row">
  <table>
    @foreach($customer->unclaimed as $unclaimed)
      <tr>
        <td>{{ $unclaimed->menuitems->first()->name }}</td> <td>x {{ $unclaimed->quantity }}</td>
      </tr>
    @endforeach
  </table>
</div>

@endsection