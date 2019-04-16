@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Confirm Services for Payment</h3>
</div>

<div class="row">
  <table>
    <tbody>
      @foreach($menuitems as $menuitem)
        <tr>
          <td>{{ $menuitem->name }}</td>
          <td>{{ ($customer_is_member) ? $menuitem->prices->first()->normal_price : $menuitem->prices->first()->normal_price }}</td>
        </tr>
      @endforeach
      <tr>
        <td><strong>TOTAL:</strong></td>
        <td><strong>{{ $sale->sales_total }}</strong></td>
      </tr>
      <tr>
        <td colspan="2"><a href='{{ route("payments.pay", ["sale" => $sale]) }}' class='waves-effect waves-light btn'>Confirm Pay</a></td>
      </tr>
    </tbody>
  </table>
</div>

@endsection