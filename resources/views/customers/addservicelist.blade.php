@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Select Service Category</h3>
</div>

<div class="row">
  <ul>
    <li><a href="{{ route('services.listservices') }}">Services</a></li>
    <li><a href="{{ route('services.listmemberships') }}">Membership</a></li>
    <li><a href="{{ route('services.listpromotions') }}">Promotion</a></li>
    <li><a href="{{ route('services.listunclaimed') }}">Claim Unclaimed Services</a></li>
    <li><a href="{{ route('services.giftcredits') }}">Gift Credits</a></li>
  </ul>
</div>

<div class="row">
  <a href='{{ route("customers.addservicelist", ["id" => $customer->id]) }}' class='waves-effect waves-light btn'>Add Service</a>
</div>

@endsection