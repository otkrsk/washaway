@extends('layouts.app')

@section('content')
<h3>MEMBER</h3>

<ul class="collapsible">

  @if ($message = Session::get('error_unclaimed_search'))
  <li>
  @else
  <li class="active">
  @endif

    <div class="collapsible-header"><i class="material-icons">search</i>Member Search</div>
    <div class="collapsible-body">
      <span>Member Search</span>

      @if ($message = Session::get('error_member_search'))
        <div class="alert alert-danger alert-block">
          <strong style="color:red;">{{ $message }}</strong>
        </div>
      @endif

      <form method="POST" action="{{ route('unclaimed.search') }}" class="col s12">

        @csrf

        <input type="hidden" name="search_type" value="member">

        <div class="row">
          <div class="input-field col s12">
            <input id="plate_no" name="plate_no" type="text">
            <label for="plate_no">Plate No.</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input id="contact_no" name="contact_no" type="text">
            <label for="contact_no">Contact No.</label>
          </div>
        </div>

        <button type="submit" class="waves-effect waves-light btn-large">Search
          <i class="material-icons right">keyboard_arrow_right</i>
        </button>

      </form>

    </div>

  </li>

  @if ($message = Session::get('error_unclaimed_search'))
  <li class="active">
  @else
  <li>
  @endif

    <div class="collapsible-header"><i class="material-icons">stars</i>Unclaimed Services</div>
    <div class="collapsible-body">

      @if ($message = Session::get('error_unclaimed_search'))
        <div class="alert alert-danger alert-block">
          <strong style="color:red;">{{ $message }}</strong>
        </div>
      @endif

      <form method="POST" action="{{ route('unclaimed.search') }}" class="col s12">

        @csrf

        <input type="hidden" name="search_type" value="unclaimed">

        <div class="row">
          <div class="input-field col s12">
            <input id="plate_no" name="plate_no" type="text">
            <label for="plate_no">Plate No.</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input id="contact_no" name="contact_no" type="text">
            <label for="contact_no">Contact No.</label>
          </div>
        </div>

        <button type="submit" class="waves-effect waves-light btn-large">Search
          <i class="material-icons right">keyboard_arrow_right</i>
        </button>

      </form>
    </div>

  </li>

</ul>

@endsection