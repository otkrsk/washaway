@extends('layouts.app')

@section('content')
<h3>Edit Payment Types</h3>

<table>
  <thead>
    <tr>
      <th>Brand</th>
      <th>Edit</th>
    </tr>
  </thead>

  <tbody>
    @foreach($paymentTypes as $pt)
      <tr>
        <td>{{ $pt }}</td>
        <td>Enable/Disable</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection