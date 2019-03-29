@extends('layouts.app')

@section('content')
<h3>Add New Payment Type</h3>

{!! Form::open(['route' => 'payments.store', 'class' => 'col s12']) !!}

  <div class="row">
    <div class="input-field col s12">
      <input id="payment_name" name="payment_name" type="text">
      <label for="payment_name">Payment Type Name</label>
    </div>
  </div>

  <button type="submit" name="add" class="waves-effect waves-light btn-large">Add</button>

{!! Form::close() !!}

@endsection