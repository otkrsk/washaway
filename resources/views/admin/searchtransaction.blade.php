@extends('layouts.app')

@section('content')
<h3>Search Transaction</h3>
<div class="row">

  {!! Form::open(['route' => 'login', 'class' => 'col s12']) !!}

    <div class="row">
      <div class="input-field col s12">
        <input id="search_keyword" name="search_keyword" type="text">
        <label for="search_keyword">Enter Transaction ID...</label>
      </div>
    </div>

    <button type="submit" name="search" class="waves-effect waves-light btn-large">Search</button>

  {!! Form::close() !!}

</div>
@endsection