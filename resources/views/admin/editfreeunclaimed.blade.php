@extends('layouts.app')

@section('content')
<h3>Edit Unclaimed Free Services</h3>

<table>
  <thead>
    <tr>
      <th>Service Name</th>
      <th>Remark 1</th>
      <th>Remark 2</th>
      <th>Amount</th>
    </tr>
  </thead>

  <tbody>
    @foreach($unclaimedServices as $us)
      <tr>
        <td>{{ $us }}</td>
        <td></td>
        <td></td>
        <td>RM20</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection