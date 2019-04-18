@extends('layouts.app')

@section('content')
<h3>Edit Payment Types</h3>

<div class="divider"></div>
  <div class="section">
    <a href="{{ route('types.create') }}">
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
        <td>{{ ucwords($pt->name) }}</td>
        <td><a href="{{ route('types.edit', ['id' => $pt->id]) }}">Edit</a></td>
        <td><a href="{{ route('types.delete', ['id' => $pt->id]) }}">Delete</a></td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection