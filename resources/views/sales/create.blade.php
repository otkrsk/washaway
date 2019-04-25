@extends('layouts.app')

@section('content')
<h3>SALES</h3>

<ul class="collapsible">
  <li class="active">
    <div class="collapsible-header"><i class="material-icons">add</i>New</div>
    <div class="collapsible-body">

      <form method="POST" action="{{ route('customers.search') }}" class="col s12">

        @csrf
        <div class="row">
          <div class="input-field col s12">
            <input id="plate_no" name="plate_no" type="text" class="validate">
            <label for="plate_no">wakaPlate No.</label>
          </div>
        </div>

        <button type="submit" name="open_sales" class="waves-effect waves-light btn-large">Next
          <i class="material-icons right">keyboard_arrow_right</i>
        </button>

      </form>

    </div>

  </li>
  <li>
    <div class="collapsible-header"><i class="material-icons">attach_money</i>Payment</div>
    <div class="collapsible-body"><span>&nbsp;</span></div>
  </li>
  <li>
    <div class="collapsible-header"><i class="material-icons">date_range</i>Today Sales</div>
    <div class="collapsible-body"><span>&nbsp;</span></div>
  </li>
</ul>

<!-- Modal Trigger -->
<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Modal Header</h4>
    <p>A bunch of text</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
  </div>
</div>

@endsection