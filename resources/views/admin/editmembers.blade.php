@extends('layouts.app')

@section('content')
<h3>Manage Users</h3>

<!-- Admin -->
<div class="row">
  <h4>Admin</h4>
  <a href="{{ route('users.create', ['role_id' => 1]) }}">Add New Admin</a>
  <table class="responsive-table">
    <thead>
      <tr>
        <th>Username</th>
        <th>Branch</th>
      </tr>
    </thead>

    <tbody>
      @foreach($admin as $ad)
        <tr>
          <td><a href="{{ route('users.show', ['id' => $ad->id]) }}">{{ $ad->username }}</a></td>
          <td>{{ $ad->branches->first()->name }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- Staff -->
<div class="row">
  <h4>Staff</h4>
  <a href="{{ route('users.create', ['role_id' => 2]) }}">Add New Staff</a>

  <table class="responsive-table">
    <thead>
      <tr>
        <th>Username</th>
        <th>Branch</th>
      </tr>
    </thead>

    <tbody>
      @foreach($staff as $st)
        <tr>
          <td><a href="{{ route('users.show', ['id' => $st->id]) }}">{{ $st->username }}</a></td>
          <td>{{ $st->branches->first()->name }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection