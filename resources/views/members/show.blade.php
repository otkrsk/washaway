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

@endsection