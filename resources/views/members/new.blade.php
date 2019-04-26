@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Complete New Member Info</h3>

  @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <strong style="color:red;">{{ $message }}</strong>
    </div>
  @endif

</div>

<form method="POST" action="{{ route('memberships.store') }}" class="col s12">

  @csrf

  <input name="customer" type="hidden" class="validate" value="{{ $customer->id }}">
  <input name="membership" type="hidden" class="validate" value="{{ $membership->id }}">

  <div class="row">
    <table>
      <tbody>
        <tr>
          <td>Name</td>

          <td>
            <div class="input-field col s12">
              <input id="name" name="name" type="text" class="validate">
              <label for="name">Name</label>
            </div>
          </td>

        </tr>
        <tr>
          <td>Contact No.</td>

          <td>
            <div class="input-field col s12">
              <input id="contact_no" name="contact_no" type="text" class="validate">
              <label for="contact_no">Contact No.</label>
            </div>
          </td>

        </tr>
      </tbody>
    </table>
  </div>

  <button type="submit" class="waves-effect waves-light btn-large">Confirm
    <i class="material-icons right">keyboard_arrow_right</i>
  </button>


</form>
@endsection