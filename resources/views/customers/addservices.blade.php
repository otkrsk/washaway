@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Add Services</h3>
  <h4><a href="#">Plate No: {{ $customer->plate_no }}</a></h4>
</div>

<div class="row">
  <p>
    <a href='{{ route("customers.addservicelist", ["id" => $customer->id]) }}' class='waves-effect waves-light btn'>Add Service</a>
  </p>
</div>

<div class="row">
  <table>
    <tbody>
      @foreach($menuitems as $menuitem)
        <tr>
          <td>{{ $menuitem->name }}</td>
          <td>RM{{ ($customer->is_member) ? $menuitem->prices()->first()->member_price : $menuitem->prices()->first()->normal_price }}</td>
          <td><a href='{{ route("sales.removeservice", ["id" => $customer->id, "sale" => $sale->id, "item" => $menuitem->id]) }}' class='waves-effect waves-light btn'>X</a></td>
        </tr>
      @endforeach
      <tr>
        <td>&nbsp;</td>

        <td>TOTAL RM{{ money_format("%.2n",$sum) }}</td>

        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
</div>

<div class="row">
  <a href='{{ route("customers.addservicelist", ["id" => $customer->id]) }}' class='waves-effect waves-light btn'>Cancel</a>
  <a href='{{ route("sales.submit", ["sale" => $sale->id]) }}' class='waves-effect waves-light btn'>Submit</a>
</div>

@endsection