@extends('layouts.app')

@section('content')
<h3>Add New Menu</h3>

{!! Form::open(['route' => 'menus.store', 'class' => 'col s12']) !!}

  <div class="row">
    <div class="input-field col s12">
      <input id="menu_name" name="menu_name" type="text" placeholder="Enter menu name">
      <label for="menu_name">Menu Name</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <select name="branch_id">
        <option value="" disabled selected>Select your Branch</option>

        @foreach($branches as $branch)
          <option value="{{ $branch->id }}">{{ $branch->name }}</option>
        @endforeach

        </select>
      <label>Select Branch</label>
    </div>
  </div>

  <div class="row">
    <a id="add_service" class="waves-effect waves-light btn">Add Service</a>
  </div>

  <div class="services">
  </div>

  <button type="submit" name="add" class="waves-effect waves-light btn-large">Add</button>

{!! Form::close() !!}

@endsection