@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Services</h3>
</div>

<div class="row">
  <p>
    <ul>
      @foreach($menuitems as $menuitem)
        <li>{{ $menuitem->name }} {{ $menuitem->prices->first()->normal_price }}</li>
      @endforeach
    </ul>
    
  </p>
</div>

@endsection