@extends('layouts.app')

@section('content')
<h3>SALES</h3>

<ul class="collapsible">

  <li class="active">
    <div class="collapsible-header"><i class="material-icons">add</i>New</div>
    <div class="collapsible-body">
      @include('partials._newsale')
    </div>
  </li>

  <li>
    <div class="collapsible-header"><i class="material-icons">attach_money</i>Payment</div>
    <div class="collapsible-body">
      @if(count($sales) > 0)
        <table>
          <thead>
            <tr>
              <th>Plate No</th>
              <th>Model</th>
              <th colspan="2">Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sales as $sale)
              <tr>
                <td>{{ strtoupper($sale->customers->first()->cars()->first()->plate_no) }}</td>
                <td>{{ $sale->customers->first()->cars()->first()->model()->first()->name }}</td>
                <td>{{ $sale->sales_total }}</td>
                <td><a href="{{ route('payments.summary', ['sale' => $sale]) }}">Pay</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        No sales yet for today.
      @endif
    </div>
  </li>
  <li>
    <div class="collapsible-header"><i class="material-icons">date_range</i>Today Sales</div>
    <div class="collapsible-body">
      <a href="{{ route('sales.summary') }}">
        <div class="section">
          <h6>Sales Summary</h6>
        </div>
      </a>
      <div class="divider"></div>
      <a href="{{ route('sales.transactions') }}">
        <div class="section">
          <h6>Transaction</h6>
        </div>
      </a>
      <div class="divider"></div>
      <a href="{{ route('admin.editmenu') }}">
        <div class="section">
          <h6>Close Today Sales</h6>
        </div>
      </a>
    </div>
  </li>
</ul>

@endsection