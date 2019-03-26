@extends('layouts.app')

@section('content')
<h3>Edit Menu Information</h3>

<table>
  <thead>
    <tr>
      <th>Menu Item</th>
      <th>Status</th>
    </tr>
  </thead>

  <tbody>
    @foreach($menuItems as $menu)
      <tr>
        <td>{{ $menu }}</td>
        <td>Enable/Disable</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection