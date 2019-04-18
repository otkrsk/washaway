@extends('layouts.app')

@section('content')
<h3>Edit Car Information</h3>

<h5>Brands</h5>
<table>
  <thead>
    <tr>
      <th>Brand</th>
    </tr>
  </thead>

  <tbody>
    @foreach($carArray as $car)
      <tr>
        <td>{{ $car->name }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

<div class="divider"></div>
<div class="section">
  <a href="{{ route('cars.create',['flag' => 1]) }}">Add Brand</a>
</div>

<h5>Models</h5>
<table>
  <thead>
    <tr>
      <th>Brand</th>
      <th>Model</th>
      <th colspan="3">Type</th>
    </tr>
  </thead>

  <tbody>
    @foreach($carArray as $car)
      @foreach($car->carModels as $carModel)
        <tr>
          <td>{{ $car->name }}</td>
          <td>{{ $carModel->name }}</td>
          <td>{{ $carModel->carType->type }}</td>
          <td><a href="#">Edit</a></td>
          <td><a href="{{ route('cars.delete', ['id' => $carModel->id]) }}">Delete</a></td>
        </tr>
      @endforeach
    @endforeach
  </tbody>
</table>

<div class="divider"></div>
<div class="section">
  <a href="{{ route('cars.create',['flag' => 2]) }}">Add Model</a>
</div>

@endsection