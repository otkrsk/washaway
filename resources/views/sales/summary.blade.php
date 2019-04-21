@extends('layouts.app')

@section('content')
<h3>Today Sales Summary</h3>

<div class="row">

  <table>
    <tr>
      <td><h4>Total Sales</h4></td>
      <td><h5>RM{{ $sum }}</h5></td>
    </tr>
    <tr>
      <td>Total Cars</td>
      <td>{{ "TBD" }}</td>
    </tr>
    <tr>
      <td>Non-Member</td>
      <td>{{ "TBD" }}</td>
    </tr>
    <tr>
      <td>Member</td>
      <td>{{ "TBD" }}</td>
    </tr>
    <tr>
      <td>Total Service</td>
      <td>{{ "TBD" }}</td>
    </tr>
    <tr>
      <td>Total New/Renew Member</td>
      <td>{{ "TBD" }}</td>
    </tr>
    <tr>
      <td>Total Pending</td>
      <td>{{ $total_pending }}</td>
    </tr>
    <tr>
      <td>Total Paid</td>
      <td>{{ $total_paid }}</td>
    </tr>
  </table>

</div>

<div class="row">
  <a href='{{ route("home") }}' class='waves-effect waves-light btn'>Back</a>
</div>

@endsection