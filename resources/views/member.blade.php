@extends('layouts.app')

@section('content')
<h3>MEMBER</h3>

<ul class="collapsible">
  <li>
    <div class="collapsible-header"><i class="material-icons">search</i>Member Search</div>
    <div class="collapsible-body">
      <span>Member Search</span>

      <form class="col s12">

        <div class="row">
          <div class="input-field col s12">
            <input id="amount" type="text" class="validate">
            <label for="amount">Enter Search Query</label>
          </div>
        </div>

        <button type="submit" name="open_sales" class="waves-effect waves-light btn-large">Search
          <i class="material-icons right">keyboard_arrow_right</i>
        </button>

      </form>

    </div>

  </li>
  <li>
    <div class="collapsible-header"><i class="material-icons">cancel</i>Unclaimed Services</div>
    <div class="collapsible-body"><span>&nbsp;</span></div>
  </li>
</ul>

@endsection