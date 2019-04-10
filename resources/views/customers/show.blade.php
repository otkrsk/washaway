@extends('layouts.app')

@section('content')

<h3>{{ $customer->name }}</h3>
<h3>Plate No: {{ $customer->plate_no }}</h3>
<h3>Model: {{ $customer_car->brand()->first()->name }} {{ $customer_car->model()->first()->name }}</h3>
<h3>Member Status: TBD</h3>
<h3>Remaining Unclaimed Services (TBD)</h3>

<a class='waves-effect waves-light btn'>Cancel</a>
<a href='{{ route("customers.addservice", ["id" => $customer->id]) }}' class='waves-effect waves-light btn'>Confirm</a>
@endsection