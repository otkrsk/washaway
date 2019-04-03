@extends('layouts.app')

@section('content')
<h3>APPOINTMENT</h3>

<ul class="collapsible">
  <li>
    <div class="collapsible-header"><i class="material-icons">date_range</i>Today</div>
    <div class="collapsible-body">
      <span>Today Appointment</span>
      </div>
  </li>

  <li>
    <div class="collapsible-header"><i class="material-icons">add</i>Add Appointment</div>
    <div class="collapsible-body"><span>&nbsp;</span></div>
  </li>

  <li>
    <div class="collapsible-header"><i class="material-icons">date_range</i>Calendar</div>
    <div class="collapsible-body"><span>&nbsp;</span></div>
  </li>
</ul>

@endsection