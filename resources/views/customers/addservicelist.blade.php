@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Select Service Category</h3>
</div>

<?php $i = 0; ?>

@if($sale)
  @include('partials._editsale')
@else
  @include('partials._addservicelist')
@endif

@endsection