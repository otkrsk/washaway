@extends('layouts.app')

@section('content')

<h3>{{ $customer->name }}</h3>
<h4>Plate No: {{ $customer->plate_no }}</h4>
<h4>Model: {{ $customer_car->brand()->first()->name }} {{ $customer_car->model()->first()->name }}</h4>
<h4>Member Status: {{ ($customer->is_member) ? "Member" : "Walk-In" }}</h4>
<h4 style="visibility:hidden;">Remaining Unclaimed Services (TBD)</h3>

<a class='waves-effect waves-light btn'>Cancel</a>
<a href='{{ route("customers.addservice", ["id" => $customer->id]) }}' class='waves-effect waves-light btn'>Confirm</a>
@endsection