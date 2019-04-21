@extends('layouts.app')

@section('content')
<h3>Today Sales Transaction</h3>

<div class="row">

  <table>
    <tbody>

      @foreach($sale->menuitems as $menuitem)
        <tr>
          <td>{{ $menuitem->name }}</td>
          <td>RM{{ ($sale->customers->first()->is_member) ? $menuitem->prices()->first()->member_price : $menuitem->prices()->first()->normal_price }}</td>
          <td><a href='{{ route("sales.removeservice",["customer" => $sale->customers->first()->id, "sale" => $sale, "id" => $menuitem->id, "flag" => 1]) }}' class='waves-effect waves-light btn'>X</a></td>
        </tr>
      @endforeach

      <tr>
        <td colspan="3"><a href='{{ route("customers.addservicelist", ["customer" => $sale->customers->first()->id,"sale" => $sale]) }}' class='waves-effect waves-light btn'>Add Service</a></td>
      </tr>

      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>

      <tr>
        <td colspan="3">TOTAL: RM{{ $sale->sales_total }}</td>
      </tr>

      <tr>
        <td colspan="3"><a href='#' class='waves-effect waves-light btn'>Confirm Edit</a></td>
      </tr>

    </tbody>
  </table>

</div>

@endsection