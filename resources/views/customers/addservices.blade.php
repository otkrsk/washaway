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
  <button type="submit" class="waves-effect waves-light btn-large">Cancel</button>
  <button type="submit" class="waves-effect waves-light btn-large">Submit</button>
</div>

@endsection