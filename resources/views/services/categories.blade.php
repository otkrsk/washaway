@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Select Service Category</h3>
</div>

<div class="divider"></div>
<a href="{{ route('services.listservices', ['id' => $customer->id,'product_type' => 1]) }}">
  <div class="section">
    <h5>Wash</h5>
  </div>
</a>

<div class="divider"></div>
<!-- <a href="{{ route('admin.editmenu') }}"> -->
<a href="#">
  <div class="section">
    <h5>Package</h5>
  </div>
</a>

<div class="divider"></div>
<!-- <a href="{{ route('admin.editmenu') }}"> -->
<a href="#">
  <div class="section">
    <h5>Polish</h5>
  </div>
</a>

<div class="divider"></div>
<!-- <a href="{{ route('admin.editmenu') }}"> -->
<a href="#">
  <div class="section">
    <h5>Coating</h5>
  </div>
</a>

<div class="divider"></div>
<!-- <a href="{{ route('admin.editmenu') }}"> -->
<a href="#">
  <div class="section">
    <h5>Other</h5>
  </div>
</a>

@endsection