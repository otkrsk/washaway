@extends('layouts.app')

@section('content')
<h3>REPORT</h3>

<ul class="collapsible">
  <li>
    <div class="collapsible-header"><i class="material-icons">date_range</i>Daily</div>
    <div class="collapsible-body">
      <span>Daily</span>
    </div>

  </li>

  <li>
    <div class="collapsible-header"><i class="material-icons">date_range</i>Monthly</div>
    <div class="collapsible-body"><span>&nbsp;</span></div>
  </li>

  <li>
    <div class="collapsible-header"><i class="material-icons">date_range</i>Custom</div>
    <div class="collapsible-body"><span>&nbsp;</span></div>
  </li>
</ul>

@endsection