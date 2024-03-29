@extends('layouts.app')

@section('content')
  <h3>Member</h3>
  <ul>
    <li>Name: {{ $member->name }}</li>  
    <li>Contact No: {{ $member->contact_no }}</li>  
    <li>Member Status: {{ ($member->membership->is_expired) ? "Expired" : "Member" }}</li>  
    <li>Expiry Date: {{ date('d-m-Y', strtotime($member->membership->membership_expires) ) }}</li>  
    <li>Branch: {{ $member->branches->first()->name }}</li>  
  </ul>

  <div class="row">
    <h4>Main Car #1</h4>
    <table>
      <tbody>
        <tr>
          <td>Plate No:</td><td><a href="{{ route('memberships.cartransactions',['car' => $member->cars->first()]) }}">{{ $member->cars->first()->plate_no }}</a></td>
        </tr>
        <tr>
          <td>Make & Model:</td><td>{{ $member->cars->first()->brand()->first()->name }} {{ $member->cars->first()->model()->first()->name }}</td>
        </tr>
        <tr>
          <td>Colour:</td><td>{{ $member->cars->first()->color()->first()->name }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  @foreach($member_subcars as $subcar)
    <div class="row">
      <h4>Sub Car #{{ $i++ }}</h4>
      <table>
        <tbody>
          <tr>
            <td>Plate No:</td><td><a href="{{ route('memberships.cartransactions',['car' => $subcar]) }}">{{ $subcar->plate_no }}</a></td>
          </tr>
          <tr>
            <td>Make & Model:</td><td>{{ $subcar->brand()->first()->name }} {{ $subcar->model()->first()->name }}</td>
          </tr>
          <tr>
            <td>Colour:</td><td>{{ $subcar->color()->first()->name }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  @endforeach

@endsection