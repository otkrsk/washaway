@extends('layouts.app')

@section('content')
<h3>Edit Payment Types</h3>

<div class="divider"></div>
  <div class="section">
    <a href="#">
      <h5>Add New Payment Type</h5>
    </a>
  </div>
<div class="divider"></div>

<table>
  <thead>
    <tr>
      <th colspan=3>Payment Type</th>
    </tr>
  </thead>

  <tbody>
    @foreach($paymentTypes as $pt)
      <tr>
        <td>{{ $pt }}</td>
        <td><a href="#">Edit</a></td>
        <td><a href="#">Delete</a></td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection