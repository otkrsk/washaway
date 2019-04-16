@extends('layouts.app')

@section('content')

<div class="row">
  <table>
    <tbody>

      <tr>
        <td>{{ $cc_plate_no }}</td>
        <td>Time Entry: 4:20PM</td>
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
        <td>{{ $contact_no }}</td>
      </tr>

      <tr>
        <td>Car Make/Model</td>
        <td>{{ $cc }}</td>
      </tr>

      <tr>
        <td>Car Colour</td>
        <td>{{ $cc_color }}</td>
      </tr>

      <tr>
        <td>Car Type</td>
        <td>{{ $cc_car_type }}</td>
      </tr>

      <tr>
        <td>Paid Time</td>
        <td>N/A</td>
      </tr>

      <tr>
        <td>Payment Method</td>
        <td>N/A</td>
      </tr>

      <tr>
        <td>Receipt No.</td>
        <td>N/A</td>
      </tr>

      <tr>
        <td colspan="2">TOTAL: RM{{ $sale->sales_total }}</td>
      </tr>

      <tr>
        <td><a href='#' class='waves-effect waves-light btn'>Cancel Sales</a></td>
        <td><a href='#' class='waves-effect waves-light btn'>Edit Services</a></td>
      </tr>

      <tr>
        <td colspan="2"><a href='{{ route("payments.confirm", ["sale" => $sale]) }}' class='waves-effect waves-light btn'>Make Payment</a></td>
      </tr>

    </tbody>
  </table>
</div>

@endsection