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
    <div class="input-field col s12">
      <select name="pricing">
        <option value="" disabled selected>Select your Pricing</option>
        <option value="1">Sedan</option>
        <option value="1">MPV</option>
        <option value="1">Sedan (Member)</option>
        <option value="1">MPV (Member)</option>
      </select>
      <label for="pricing">Pricing</label>
    </div>
  </div>

  <button type="submit" name="add" class="waves-effect waves-light btn-large">Add</button>

{!! Form::close() !!}

@endsection