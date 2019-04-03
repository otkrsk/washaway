@extends('layouts.app')

@section('content')
<h3>Add New User</h3>

{!! Form::open(['route' => 'users.store', 'class' => 'col s12']) !!}

  <input id="rid" name="rid" type="hidden" value="{{ $_GET['role_id'] }}">
  <div class="row">
    <div class="input-field col s12">
      <input id="username" name="username" type="text">
      <label for="username">Enter username</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <select name="branch_id">
        <option value="" disabled selected>Choose your option</option>

        @foreach($branches as $key => $value)
          <option value="{{ $key }}">{{ $value }}</option>
        @endforeach

      </select>
      <label>Branch</label>
    </div>
  </div>

  <button type="submit" name="add" class="waves-effect waves-light btn-large">Add</button>

{!! Form::close() !!}

@endsection