@extends('layouts.app')

@section('content')
<h2>WASHAWAY</h2>
<p class="subh1">Auto Detailing</p>
<div class="row">

  {!! Form::open(['route' => 'login', 'class' => 'col s12']) !!}

    <div class="row">
      <div class="input-field col s12">
        <input id="email" name="email" type="text">
        <label for="email">Login ID</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <input id="password" type="password" name="password">
        <label for="password">Password</label>
      </div>
    </div>

    <button type="submit" name="login" class="waves-effect waves-light btn-large">Login</button>

  {!! Form::close() !!}

</div>
@endsection