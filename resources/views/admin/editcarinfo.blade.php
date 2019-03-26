@extends('layouts.app')

@section('content')
<h3>Edit Car Information</h3>

<table>
  <thead>
    <tr>
      <th>Brand</th>
      <th>Model</th>
      <th>Colour</th>
      <th>Edit</th>
    </tr>
  </thead>

  <tbody>
    @foreach($carInfo as $key => $value)
      <tr>
        <td>{{ $value['brand'] }}</td>
        <td>{{ $value['model'] }}</td>
        <td>{{ $value['color'] }}</td>
        <td>Enable/Disable</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection