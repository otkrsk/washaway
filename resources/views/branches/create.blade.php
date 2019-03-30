@extends('layouts.app')

@section('content')
<h3>Add New Branch</h3>

{!! Form::open(['route' => 'branches.store', 'class' => 'col s12']) !!}

  <div class="row">
    <div class="input-field col s12">
      <input id="branch" name="branch" type="text">
      <label for="branch">Enter New Branch Name</label>
    </div>
  </div>

  <button type="submit" name="add" class="waves-effect waves-light btn-large">Add</button>

{!! Form::close() !!}

@endsection