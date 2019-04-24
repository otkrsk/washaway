@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Confirm Services for Payment</h3>
    @if($message = Session::get('error'))
      <strong style="color:red;">{{ $message }}</strong>
    @endif
</div>

{!! Form::open(['route' => ['payments.pay', 'sale' => $sale], 'class' => 'col s12', 'method' => 'POST']) !!}

<div class="row">
  <table>
    <tbody>

      @foreach($menuitems as $menuitem)
        <tr>
          <td>{{ $menuitem->name }}</td>
          <td>RM{{ ($customer_is_member) ? $menuitem->prices->first()->member_price : $menuitem->prices->first()->normal_price }}</td>
        </tr>
      @endforeach

      <tr>
        <td><strong>TOTAL:</strong></td>
        <td><strong>RM{{ $sale->sales_total }}</strong></td>
      </tr>

      <tr>
        <td colspan="2">
          <div class="input-field col s12">

            {{ Form::select("payment_type[1]", $payment_types, null, ['placeholder' => 'Select']) }}

            <label>Select Payment Type</label>
          </div>
        </td>
      </tr>

      <tr>
        <td colspan="2">
          <div class="input-field col s12">

            {{ Form::select("payment_type[2]", $payment_types, null, ['placeholder' => 'Select']) }}

            <label>Select Payment Type</label>
          </div>
        </td>
      </tr>

      <tr>
        <td><button type="submit" class="waves-effect waves-light btn-large">Pay</button></td>
      </tr>

    </tbody>
  </table>
</div>

{!! Form::close() !!}

@endsection