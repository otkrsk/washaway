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
      <th colspan=2>Colour</th>
    </tr>
  </thead>

  <tbody>
    @foreach($carArray as $car)
      <tr>
        <td>{{ $car->brand }}</td>
        <td>{{ $car->model }}</td>
        <td>{{ $car->color }}</td>
        <td><a href="{{ route('cars.delete', ['id' => $car->id]) }}">Delete</a></td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection