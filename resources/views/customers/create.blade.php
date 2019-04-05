@extends('layouts.app')

@section('content')
<h3>Create New Customer</h3>

{!! Form::open(['route' => 'customers.store', 'class' => 'col s12']) !!}

  <div class="row">
    <div class="input-field col s12">
      <input id="plate_no" name="plate_no" type="text" placeholder="Enter Plate No" value="{{ isset($plate_no) ? $plate_no : '' }}" >
      <label for="plate_no">Plate No</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <select id="brand_id" name="brand_id">
        <option value="" disabled selected>Select car Brand</option>

        @foreach($brands as $brand)
          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach

        </select>
      <label>Select Brand</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <select id="model_id" name="model_id">
        <option value="" disabled selected>Select car Model</option>
      </select>
      <label>Select Model</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <select name="color_id">
        <option value="" disabled selected>Select car Color</option>

        @foreach($colors as $color)
          <option value="{{ $color->id }}">{{ $color->name }}</option>
        @endforeach

        </select>
      <label>Select Color</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <input id="contact_no" name="contact_no" type="text" placeholder="Enter Contact No">
      <label for="contact_no">Contact No</label>
    </div>
  </div>

  <button type="submit" name="add" class="waves-effect waves-light btn-large">Add</button>

{!! Form::close() !!}

@endsection