@extends('layouts.app')

@section('content')
  <div class="row">
    <h3>Transaction Result</h3>
  </div>

  <div class="row">
    <table>
      <tr>
        <td><h4>ABC111/Perodua Alza</h4></td>
        <td><a href="#"><i class="medium material-icons">arrow_drop_down_circle</i></a></td>
      </tr>
    </table>
      
    <table>
      <thead>
        <tr>
          <th>Date</th>
          <th>Service</th>
          <th colspan="2">Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>28 May 2019</td>
          <td>Cook Wax</td>
          <td>RM200</td>
          <td><a href="#" class='waves-effect waves-light btn'>View</a></td>
        </tr>
      </tbody>
    </table>

@endsection