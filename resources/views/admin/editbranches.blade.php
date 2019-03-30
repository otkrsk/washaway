@extends('layouts.app')

@section('content')
<h3>Edit Branches</h3>

<div class="divider"></div>
  <div class="section">
    <a href="{{ route('branches.create') }}">
      <h5>Add New Branch</h5>
    </a>
  </div>
<div class="divider"></div>

<div class="row">
  <table>
    <thead>
      <tr>
        <th>Branch</th>
        <th colspan=2>Status</th>
      </tr>
    </thead>

    <tbody>
      @foreach($branches as $branch)
        <tr>
          <td>{{ $branch->name }}</td>
          <td><a href="{{ route('branches.delete', ['id' => $branch->id]) }}">Delete</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection