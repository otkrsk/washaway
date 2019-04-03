@extends('layouts.app')

@section('content')
<h3>Menus</h3>

<div class="row">
  <a href="{{ route('menus.create') }}">Create New</a>
</div>

<div class="row">
  <table>
    <thead>
      <tr>
        <th>Menu Item</th>
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