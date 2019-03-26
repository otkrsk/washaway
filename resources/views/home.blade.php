@extends('layouts.app')

@section('content')
<h3>SALES</h3>

<ul class="collapsible">
  <li>
    <div class="collapsible-header"><i class="material-icons">add</i>New</div>
    <div class="collapsible-body">
      <span>Register Cash</span>

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
    <div class="collapsible-header"><i class="material-icons">attach_money</i>Payment</div>
    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
  </li>
  <li>
    <div class="collapsible-header"><i class="material-icons">date_range</i>Today Sales</div>
    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
  </li>
</ul>

@endsection