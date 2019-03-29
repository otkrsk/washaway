@extends('layouts.app')

@section('content')
<h3>Edit Car Information</h3>

<div class="divider"></div>
  <div class="section">
    <a href="{{ route('cars.create') }}">
      <h5>Add Car</h5>
    </a>
  </div>
<div class="divider"></div>

<table>
  <thead>
    <tr>
      <th>Brand</th>
      <th>Model</th>
      <th>Colour</th>
      <th colspan=2>Status</th>
    </tr>
  </thead>

  <tbody>
    @foreach($carInfo as $key => $value)
      <tr>
        <td>{{ $value['brand'] }}</td>
        <td>{{ $value['model'] }}</td>
        <td>{{ $value['color'] }}</td>
        <td>Enable/Disable</td>
        <td><a href="#">Delete</a></td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection