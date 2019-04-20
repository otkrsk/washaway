@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Select Remaining Unclaimed</h3>
  <h4>!! REMEMBER TO CONTINUE FROM HERE AFTER YOU'VE FINISHED EATING YOUR BREAKFAST AND WATCHING MODERN FAMILY !!</h4>
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