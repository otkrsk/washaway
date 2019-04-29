@extends('layouts.app')

@section('content')

<div class="row">
  @if(is_null($plate_no))
    <h3>Confirm Sub Car Info</h3>
  @else
    <h3>Create New Customer</h3>
  @endif

</div>

{!! Form::open(['route' => $route, 'class' => 'col s12']) !!}

@if(is_null($plate_no))
  @include('partials._addsubcar')
@else
  @include('partials._createcustomer')
@endif

<button type="submit" class="waves-effect waves-light btn-large">Add</button>

{!! Form::close() !!}

@endsection