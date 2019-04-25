@extends('layouts.app')

@section('content')

<div class="row">
  <h3>UNCLAIMED SERVICE</h3>
</div>

<div class="row">
  <ul>
    <li>Name: {{ $customer->name }}</li>  
    <li>Contact No: {{ $customer->contact_no }}</li>  
    <li>Member Status: {{ ($customer->membership->is_expired) ? "Expired" : "Member" }}</li>  
    <li>Expiry Date: {{ date('d-m-Y', strtotime($customer->membership->membership_expires) ) }}</li>  
    <li>Branch: {{ $customer->branches->first()->name }}</li>  
  </ul>

  <div class="col s12">
    <ul class="tabs">
      <li class="tab col s6"><a class="active" href="#test1">Unclaimed</a></li>
      <li class="tab col s6"><a href="#test2">Claimed</a></li>
    </ul>
  </div>

  <div id="test1" class="col s12">
    <table>

      <thead>
        <tr>
          <th>Services</th>
          <th>Quantity</th>
        </tr>
      </thead>

      <tbody>

        @foreach($customer->unclaimed as $unclaimed)
          <tr>
            <td>{{ $unclaimed->menuitems->first()->name }}</td>
            <td>{{ $unclaimed->quantity }}</td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>

  <div id="test2" class="col s12">
    <table>

      <thead>
        <tr>
          <th>Plate No.</th>
          <th>Services</th>
        </tr>
      </thead>

      <tbody>

        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

      </tbody>
    </table>
  </div>
</div>

@endsection