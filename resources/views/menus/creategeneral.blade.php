@extends('layouts.app')

@section('content')
<h3>Add New Menu</h3>

{!! Form::open(['route' => 'menus.store', 'class' => 'col s12']) !!}

  <input id='menu_type' name='menu_type' type='hidden' value='1'>

  <div class="row sedan">
    <h4>Sedan</h4>

    <table id="sedan_table" class="responsive-table">
      <tbody id="more_sedan">
        <tr id='sedan_row1'>
          <td>
            <div class='input-field col s12'>
              <input id='sedan_service_name' name='sedan_service[1][name]' data-car-type='1' type='text' placeholder='Enter Sedan service name'>
              <label class='active' for='sedan_service_name'>Service Name</label>
            </div>
          </td>

          <td>
            <div class='input-field col s12'>
              <input id='sedan_service_normal_price' name='sedan_service[1][normal_price]' type='text' placeholder='Enter Sedan service price'>
              <label class='active' for='sedan_service_normal_price'>Service Price (Normal)</label>
            </div>
          </td>

          <td>
            <div class='input-field col s12'>
              <input id='sedan_service_member_price' name='sedan_service[1][member_price]' type='text' placeholder='Enter Sedan service price'>
              <label class='active' for='sedan_service_member_price'>Service Price (Member)</label>
            </div>
          </td>

          <td>
            <a data-sedan-identifier='1' class='sedan_remove waves-effect waves-light btn'>Remove</a>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4">
            <input id='car_type' name='sedan_service[car_type]' type='hidden' value='1' />
            <a id="add_sedan" class="waves-effect waves-light btn">Add Another Sedan Service</a>
          </td>
        </tr>
      </tfoot>
    </table>

  </div>

  <div class="row mpv">
    <h4>MPV</h4>

    <table id="mpv_table" class="responsive-table">
      <tbody id="more_mpv">
        <tr id='mpv_row1'>
          <td>
            <div class='input-field col s12'>
              <input id='mpv_service_name' name='mpv_service[1][name]' data-car-type='2' type='text' placeholder='Enter MPV service name'>
              <label class='active' for='mpv_service_name'>Service Name</label>
            </div>
          </td>

          <td>
            <div class='input-field col s12'>
              <input id='mpv_service_normal_price' name='mpv_service[1][normal_price]' type='text' placeholder='Enter MPV service price'>
              <label class='active' for='mpv_service_normal_price'>Service Price (Normal)</label>
            </div>
          </td>

          <td>
            <div class='input-field col s12'>
              <input id='mpv_service_member_price' name='mpv_service[1][member_price]' type='text' placeholder='Enter MPV service price'>
              <label class='active' for='mpv_service_member_price'>Service Price (Member)</label>
            </div>
          </td>

          <td>
            <a data-mpv-identifier='1' class='mpv_remove waves-effect waves-light btn'>Remove</a>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4">
            <input id='car_type' name='mpv_service[car_type]' type='hidden' value='2' />
            <a id="add_mpv" class="waves-effect waves-light btn">Add Another MPV Service</a>
          </td>
        </tr>
      </tfoot>
    </table>

  </div>

  <div class="row">
    <button type="submit" class="waves-effect waves-light btn-large">Submit</button>
  </div>

{!! Form::close() !!}

@endsection