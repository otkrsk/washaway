@extends('layouts.app')

@section('content')
<h3>Edit Branches</h3>

<div class="divider"></div>
  <div class="section">
    <a href="{{ route('cars.create') }}">
      <h5>Add New Branch</h5>
    </a>
  </div>
<div class="divider"></div>

<div class="row">
  <table>
    <thead>
      <tr>
        <th>Brand</th>
        <th colspan=2>Status</th>
      </tr>
    </thead>

    <tbody>
      @foreach($branches as $branch)
        <tr>
          <td>{{ $branch }}</td>
          <td>
            <div class="switch">
              <label>
                Off
                <input type="checkbox" name="checkbox02">
                <span class="lever"></span>
                On
              </label>
            </div>
          </td>
          <td><a href="#">Delete</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<button type="submit" name="add" class="waves-effect waves-light btn-large">Save Changes</button>

@endsection