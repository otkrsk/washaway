@extends('layouts.app')

@section('content')
<h3>Add New Model</h3>

{!! Form::open(['route' => 'cars.store', 'class' => 'col s12']) !!}

  <input name="flag" type="hidden" value="2">

  <div class="row">
    <div class="input-field col s12">
      <select name="brand">
        <option value="" disabled selected>Select Brand</option>

        @foreach($brands as $brand)
          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach

        </select>
      <label>Select Brand</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <input id="model" name="model" type="text">
      <label for="model">Model</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <select name="car_type">
        <option value="" disabled selected>Select Car Type</option>

        <option value="1">Sedan, Hatchback</option>
        <option value="2">SUV, MPV, 4x4</option>

      </select>
      <label>Select Car Type</label>
    </div>
  </div>

  <button type="submit" class="waves-effect waves-light btn-large">Add</button>

{!! Form::close() !!}

@endsection