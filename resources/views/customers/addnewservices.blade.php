@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Add Services</h3>
  <h4><a href="#">Plate No: {{ $customer->plate_no }}</a></h4>
</div>

<div class="row">
  <p>
    <a href='{{ route("customers.addservicelist", ["id" => $customer->id]) }}' class='waves-effect waves-light btn'>Add Service</a>
  </p>
</div>

<div class="row">
  <a href='{{ route("customers.addservicelist", ["id" => $customer->id]) }}' class='waves-effect waves-light btn'>Cancel</a>
  <a href='{{ route("customers.addservicelist", ["id" => $customer->id]) }}' class='waves-effect waves-light btn'>Submit</a>
</div>

@endsection