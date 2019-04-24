@extends('layouts.app')

@section('content')
<h3>Manage Unclaimed Services</h3>

<div class="row">

  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th colspan="2">Plate No</th>
      </tr>
    </thead>
    <tbody>
      @foreach($members as $member)
        <tr>
          <td>{{ $member->customer->name }}</td>
          <td>{{ $member->customer->plate_no }}</td>
          <td><a href="{{ route('unclaimed.edit',['customer' => $member->customer]) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>

</div>

@endsection