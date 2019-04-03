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

  <p>Add Service</p>
  <div class="row">

    <div class="input-field col s12">
      <select name="car_type">
        <option value="" disabled selected>Select Service</option>
        <option value="1">Sedan</option>
        <option value="2">MPV</option>
        <option value="3">Sedan (Member)</option>
        <option value="4">MPV (Member)</option>
      </select>
      <label>Select Service</label>
    </div>

    <div class="input-field col s12">
      <input id="menu_item_name" name="menu_item_name" type="text" placeholder="Enter Name">
      <label for="menu_item_name">Name</label>
    </div>

    <div class="input-field col s12">
      <input id="price" name="price" type="text" placeholder="Enter Price">
      <label for="price">Price</label>
    </div>

    <div class="input-field col s12">
      <p>
        <label>
          <input type="checkbox" class="filled-in" id="unclaimed" name="unclaimed" />
          <span>Add to Unclaimed Services</span>
        </label>
      </p>
    </div>

  </div>

  <button type="submit" name="add" class="waves-effect waves-light btn-large">Add</button>

{!! Form::close() !!}

@endsection