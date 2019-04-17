@extends('layouts.app')

@section('content')
<h3>SALES</h3>

<ul class="collapsible">
  <li class="active">
    <div class="collapsible-header"><i class="material-icons">add</i>New</div>
    <div class="collapsible-body">
      <span>Register Cash</span>

      <form method="POST" action="{{ route('sales.open') }}" class="col s12">

        @csrf
        <div class="row">
          <div class="input-field col s12">
            <input id="amount" name="amount" type="text" class="validate">
            <label for="amount">RM</label>
          </div>
        </div>

        <button type="submit" name="open_sales" class="waves-effect waves-light btn-large">Open Today Sales
          <i class="material-icons right">keyboard_arrow_right</i>
        </button>

      </form>

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
    <div class="collapsible-body"><span>&nbsp;</span></div>
  </li>
</ul>

@endsection