@extends('layouts.app')

@section('content')
<h3>Add New Brand</h3>

{!! Form::open(['route' => 'cars.store', 'class' => 'col s12']) !!}

  <input name="flag" type="hidden" value="1">

  <div class="row">
    <div class="input-field col s12">
      <input id="brand" name="brand" type="text">
      <label for="brand">Brand</label>
    </div>
  </div>

  <button type="submit" name="add" class="waves-effect waves-light btn-large">Add</button>

{!! Form::close() !!}

@endsection