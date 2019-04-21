@extends('layouts.app')

@section('content')
<h3>Today Sales Transaction</h3>

<div class="row">

  <table>
    <thead>
      <tr>
        <th><h5>Plate No.</h5></th>
        <th><h5>Model</h5></th>
        <th><h5>Amount</h5></th>
        <th><h5>Status</h5></th>
      </tr>
    </thead>
    <tbody>

      @foreach($sales as $sale)
        <tr>
          <td>{{ $sale->customers->first()->plate_no }}</td>
          <td>{{ $sale->customers->first()->cars()->first()->brand()->first()->name }}</td>
          <td>RM{{ $sale->sales_total }}</td>
          <td><a href="{{ route('sales.show', ['sale' => $sale]) }}">{{ ($sale->status == 2) ? "Paid" : (($sale->status == 1) ? "Pending" : "Ongoing") }}</a></td>
        </tr>
      @endforeach

      <tr>
        <td colspan="4"><h5>Total Sales: RM{{ $sum }}</h5></td>
      </tr>

    </tbody>
  </table>

</div>

@endsection