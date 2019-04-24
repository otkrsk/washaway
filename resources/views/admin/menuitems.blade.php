@extends('layouts.app')

@section('content')
<h3>ADMINISTRATION</h3>

<div class="divider"></div>
<a href="{{ route('admin.editmenu') }}">
  <div class="section">
    <h5>Manage Menu Information</h5>
  </div>
</a>
<div class="divider"></div>
<a href="{{ route('admin.editcarinfo') }}">
  <div class="section">
    <h5>Manage Car Information</h5>
  </div>
</a>
<div class="divider"></div>
<a href="{{ route('admin.editmembers') }}">
  <div class="section">
    <h5>Manage Users</h5>
  </div>
</a>
<div class="divider"></div>
<a href="{{ route('admin.editbranches') }}">
  <div class="section">
    <h5>Manage Branches</h5>
  </div>
</a>
<div class="divider"></div>
<a href="{{ route('admin.editpromotions') }}">
  <div class="section">
    <h5>Manage Promotions</h5>
  </div>
</a>
<div class="divider"></div>
<a href="{{ route('admin.editpayment') }}">
  <div class="section">
    <h5>Manage Payment Type</h5>
  </div>
</a>
<div class="divider"></div>
<!-- <a href="{{ route('admin.searchtransaction') }}"> -->
<a href="#">
  <div class="section">
    <h5>Search Transaction to Edit/Remove</h5>
  </div>
</a>
<div class="divider"></div>
<a href="{{ route('unclaimed.index') }}">
  <div class="section">
    <h5>Manage Unclaimed Service Attach to Plate No</h5>
  </div>
</a>
<div class="divider"></div>

@endsection