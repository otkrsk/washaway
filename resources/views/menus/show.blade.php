@extends('layouts.app')

@section('content')

<div class="row">
  <h3>{{ $menu->name }}</h3>
</div>

<div class="row">
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Normal Price</th>
        <th>Member Price</th>
        <th colspan="3">Car Type</th>
      </tr>
    </thead>
    <tbody>
      @foreach($menuitems as $mi)
      <tr>
        <td>{{ $id++ }}</td>
        <td>{{ $mi->name }}</td>
        <td>{{ $mi->prices->first()->normal_price }}</td>
        <td>{{ $mi->prices->first()->member_price }}</td>
        <td>{{ $mi->prices->first()->car_types->type }}</td>
        <td><a href="{{ route('items.edit', ['item' => $mi->id]) }}" class='waves-effect waves-light btn-small'>Edit</a></td>
        <td><a href="{{ route('items.delete', ['item' => $mi->id]) }}" class='waves-effect waves-light btn-small'>Remove</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="row">
  <a href="{{ route('menus.addmenuitem', ['id' => $menu->id]) }}" class='waves-effect waves-light btn'>Add New Menu Item</a>
</div>
@endsection