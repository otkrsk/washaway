@extends('layouts.app')

@section('content')
<h3>Manage Users</h3>

<div class="row">
  <h4>Admin</h4>
  <table class="responsive-table">
    <thead>
      <tr>
        <th>Member Name</th>
        <th>Branch</th>
      </tr>
    </thead>

    <tbody>
      @foreach($admin as $ad)
        <tr>
          <td><a href="{{ route('users.show', ['id' => $ad->id]) }}">{{ $ad->name }}</a></td>
          <td>RM20</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="row">
  <h4>Staff</h4>

  <table class="responsive-table">
    <thead>
      <tr>
        <th>Member Name</th>
        <th>Branch</th>
      </tr>
    </thead>

    <tbody>
      @foreach($members as $mem)
        <tr>
          <td><a href="{{ route('users.show', ['id' => $mem->id]) }}">{{ $mem->name }}</a></td>
          <td>RM20</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection