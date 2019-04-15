@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Memberships</h3>
</div>

<div class="row">
  <table>
    <thead>
      <tr>
        <th colspan="2">Membership</th>
      </tr>
    </thead>
    <tbody>
      @foreach($memberships as $membership)
        <tr>
          <td>{{ $membership->name }}</td>
          <td><a href='{{ route("sales.new", ["customer" => $customer->id, "item" => $membership->id]) }}' class='waves-effect waves-light btn'>Add</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection