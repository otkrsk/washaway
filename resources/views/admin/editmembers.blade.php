@extends('layouts.app')

@section('content')
<h3>Manage Members</h3>

<table>
  <thead>
    <tr>
      <th>Member Name</th>
      <th>Branch</th>
    </tr>
  </thead>

  <tbody>
    @foreach($members as $mem)
      <tr>
        <td>{{ $mem }}</td>
        <td>RM20</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection