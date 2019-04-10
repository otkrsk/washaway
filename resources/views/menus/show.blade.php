@extends('layouts.app')

@section('content')

<div class="row">
  <h3>{{ $menu->name }}</h3>
</div>

<div class="row">
  <p>

    <ol>
      @foreach($menuitems as $mi)
        <li>{{ $mi->name }}</li>
      @endforeach
    </ol>
    
  </p>
</div>

@endsection