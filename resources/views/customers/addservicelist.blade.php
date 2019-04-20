@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Select Service Category</h3>
</div>

<div class="row">
  <table>
    <tbody>
      <tr>
        <td><a href="{{ route('services.listservices', ['id' => $customer->id]) }}">Services</a></td>
      </tr>
      <tr>
        <td><a href="{{ route('services.listmemberships', ['id' => $customer->id]) }}">Membership</a></td>
      </tr>
        <td style="visibility:hidden;"><a href="{{ route('services.listpromotions') }}">Promotion</a></td>
      <tr>
      </tr>
        <td><a href="{{ route('unclaimed.list',['customer' => $customer->id]) }}">Claim Unclaimed Services</a></td>
      </tr>
      <tr>
        <td style="visibility:hidden;"><a href="{{ route('services.giftcredits') }}">Gift Credits</a></td>
      </tr>
    </tbody>
  </table>
</div>

<div class="row">
  <a href='{{ route("customers.addservicelist", ["id" => $customer->id]) }}' class='waves-effect waves-light btn'>Add Service</a>
</div>

@endsection