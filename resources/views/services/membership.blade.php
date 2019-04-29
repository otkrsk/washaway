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
          <td><a href='{{ route("memberships.new", ["membership" => $membership, "customer" => $customer->id]) }}' class='waves-effect waves-light btn'>Add</a></td>
          <!-- <td><a href='{{ route("memberships.create") }}' class='waves-effect waves-light btn'>Add</a></td> -->
        </tr>
      @endforeach
      <tr>
        <td>Add Sub Car</td>
          <td><a href='{{ route("memberships.addsubcar", ["customer" => $customer->id]) }}' class='waves-effect waves-light btn'>Add</a></td>
      </tr>
    </tbody>
  </table>
</div>

@endsection