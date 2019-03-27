@extends('layouts.app')

@section('content')
<h3>Add New Car</h3>

<form class="col s12">

  <div class="row">
    <div class="input-field col s12">
      <input id="brand" type="text">
      <label for="brand">Brand</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <input id="model" type="text">
      <label for="model">Model</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <input id="color" type="text">
      <label for="color">Color</label>
    </div>
  </div>

  <button type="submit" name="add" class="waves-effect waves-light btn-large">Add</button>

</form>

@endsection