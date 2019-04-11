@extends('layouts.app')

@section('content')
<h3>Menus</h3>

<div class="row">
  <a href="{{ route('menus.create') }}">Create New Menu</a>
</div>

<div class="row">
  <a href="{{ route('menus.creategeneral') }}">Create New General Menu</a>
</div>

<div class="row">
  <h4>General Menu</h4>
  <table>
    <thead>
      <tr>
        <th>Menu Items</th>
      </tr>
    </thead>

    <tbody>
      @foreach($general_menu_items as $gmi)
        <tr>
          <td>{{ $gmi->name }}</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="row">
  <h4>Branch Menus</h4>
  <table>
    <thead>
      <tr>
        <th>Menu Name</th>
        <th>Branch</th>
      </tr>
    </thead>

    <tbody>
      @foreach($menus as $menu)
        <tr>
          <td><a href="{{ route('menus.show', ['id' => $menu->id]) }}">{{ $menu->name }}</a></td>
          <td>{{ $menu->branches->first()->name }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection