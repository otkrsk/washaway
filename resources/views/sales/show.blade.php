@extends('layouts.app')

@section('content')
<h3>Today Sales Transaction</h3>

<div class="row">
  <table>
    <tbody>

      <tr>
        <td>{{ strtoupper($car->plate_no) }}</td>
        <td>Time Entry: {{ date_format($sale->created_at, 'H:i:s') }}</td>
      </tr>

      <tr>
        <td>Member Status</td>
        <td>{{ $member_status }}</td>
      </tr>

      <tr>
        <td>Name</td>
        <td>{{ ($customer->is_member) ? $customer->name : "-" }}</td>
      </tr>

      <tr>
        <td>Contact No.</td>
        <td>{{ $customer->contact_no }}</td>
      </tr>

      <tr>
        <td>Car Make/Model</td>
        <td>{{ $car->brand()->first()->name }} {{ $car->model()->first()->name }}</td>
      </tr>

      <tr>
        <td>Car Colour</td>
        <td>{{ $car->color()->first()->name }}</td>
      </tr>

      <tr>
        <td>Car Type</td>
        <td>{{ $car->model()->first()->carType->type }}</td>
      </tr>

      <tr>
        <td>Paid Time</td>
        <td>{{ $paid_time }}</td>
      </tr>

      <tr>
        <td>Payment Method</td>
        <td>{{ $payment_method }}</td>
      </tr>

      <tr>
        <td>Receipt No.</td>
        <td>{{ $receipt_no }}</td>
      </tr>

      <tr>
        <td colspan="2"><strong>TOTAL: RM{{ $sale->sales_total }}</strong></td>
      </tr>

      <tr>
        <td><a href='{{ route("sales.cancel", ["sale" => $sale]) }}' class='waves-effect waves-light btn'>Cancel Sales</a></td>
        <td><a href='{{ route("sales.edit", ["sale" => $sale]) }}' class='waves-effect waves-light btn'>Edit Services</a></td>
      </tr>

      <tr>
        <td colspan="2"><a href='#' class='disabled waves-effect waves-light btn'>Print Receipt</a></td>
      </tr>

    </tbody>
</div>

@endsection