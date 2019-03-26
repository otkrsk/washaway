@extends('layouts.app')

@section('content')
<h3>ADMINISTRATION</h3>

<ul class="collapsible">
  <li>
    <div class="collapsible-header"><i class="material-icons">add</i>Add/Edit/Remove Menu Information</div>
    <div class="collapsible-body">
      <span>Manage Users</span>

      <form class="col s12">

        <div class="row">
          <div class="input-field col s12">
            <input id="amount" type="text" class="validate">
            <label for="amount">RM</label>
          </div>
        </div>

        <button type="submit" name="open_sales" class="waves-effect waves-light btn-large">Open Today Sales
          <i class="material-icons right">keyboard_arrow_right</i>
        </button>

      </form>

    </div>

  </li>
  <li>
    <div class="collapsible-header"><i class="material-icons">attach_money</i>Add/Edit/Remove Car Information</div>
    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
  </li>
  <li>
    <div class="collapsible-header"><i class="material-icons">attach_money</i>Add/Edit/Remove Payment Type</div>
    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
  </li>
  <li>
    <div class="collapsible-header"><i class="material-icons">attach_money</i>Add/Edit/Remove Unclaimed Service Attach to Plate No</div>
    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
  </li>
  <li>
    <div class="collapsible-header"><i class="material-icons">attach_money</i>Search Transaction to Edit/Remove</div>
    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
  </li>
  <li>
    <div class="collapsible-header"><i class="material-icons">attach_money</i>Edit Membership's Free Unclaimed Services</div>
    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
  </li>
</ul>

@endsection