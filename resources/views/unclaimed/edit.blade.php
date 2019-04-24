@extends('layouts.app')

@section('content')
<h3>Edit Member's Unclaimed Services</h3>

{!! Form::open(['route' => ['unclaimed.update', 'id' => $customer->id], 'class' => 'col s12', 'method' => 'PATCH']) !!}

<div class="row">
  <table>
    <tbody>

      <tr>
        <td>{{ $customer->name }}</td>
        <td colspan="2">{{ $customer->plate_no }}</td>
      </tr>

      <tr>
        <td colspan="3"><h4>Member's Unclaimed</h4></td>
      </tr>

      <tr>
        <td>Jack</td>
        <td>10</td>
        <td>REMOVE</td>
      </tr>

      <tr>
        <td colspan="3"><h4>Add Services</h4></td>
      </tr>

      @foreach($services as $service)
        <tr>

          <td>
            <div class="input-field col s12">
              {{ Form::select("service_$service->id", $service_plucked, null, ['placeholder' => 'Select']) }}
            </div>
          </td>

          <td colspan="2">
            <div class="input-field col s12">
              <input id="quantity" name="quantity_{{ $service->id }}"  type="text" placeholder="Enter Quantity">
              <label for="quantity">Quantity</label>
            </div>
          </td>

        </tr>
      @endforeach

    </tbody>
  </table>
</div>

<div class="row">
  <button type="submit" class="waves-effect waves-light btn-large">Submit</button>
</div>


{!! Form::close() !!}

@endsection