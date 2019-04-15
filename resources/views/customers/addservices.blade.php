@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Add Services</h3>
  <h3><a href="#">Plate No: {{ $customer->plate_no }}</a></h3>
</div>

<div class="row">
  <p>
    <a href='{{ route("customers.addservicelist", ["id" => $customer->id]) }}' class='waves-effect waves-light btn'>Add Service</a>
  </p>
</div>

<div class="row">
  @foreach($menuitems as $menuitem)
    <p>{{ $menuitem->name }} <a href='{{ route("sales.removeservice", ["id" => $customer->id, "sale" => $sale->id, "item" => $menuitem->id]) }}' class='waves-effect waves-light btn'>X</a></p>
  @endforeach
</div>

<div class="row">
  <a href='{{ route("customers.addservicelist", ["id" => $customer->id]) }}' class='waves-effect waves-light btn'>Cancel</a>
  <a href='{{ route("customers.addservicelist", ["id" => $customer->id]) }}' class='waves-effect waves-light btn'>Submit</a>
</div>

@endsection