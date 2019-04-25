@extends('layouts.app')

@section('content')
<div class="row">
  <h3>Edit Member's Unclaimed Services</h3>

  @if($message = Session::get('success'))
    <strong style="color:green;">{{ $message }}</strong>
  @endif

  @if($message = Session::get('error'))
    <strong style="color:red;">{{ $message }}</strong>
  @endif
</div>

<div class="row">
  <table>
    <tbody>

      <tr>
        <td><h5>{{ $customer->name }}</h5></td>
        <td colspan="2"><h5>{{ $customer->plate_no }}</h5></td>
      </tr>

      <tr>
        <td colspan="3"><h4>Member's Unclaimed</h4></td>
      </tr>

    </tbody>
  </table>
</div>

{!! Form::open(['route' => ['unclaimed.updatequantity', 'customer' => $customer], 'class' => 'col s12', 'method' => 'POST']) !!}

<div class="row">
  <table id="quantity_tbl">
    <thead>
      <tr>
        <th>Service Name</th>
        <th colspan="2">Quantity</th>
      </tr>
    </thead>
    <tbody>

      @foreach($customer->unclaimed as $unclaimed)
        <tr>
          <td>{{ $unclaimed->menuitems->first()->name }}</td>
          <td>
            <input class="menuitem_qty" name="menuitem[{{ $unclaimed->menuitems->first()->id }}]" type="text" value="{{ $unclaimed->quantity }}">
          </td>
          <td>
            <a href="{{ route('unclaimed.removeunclaimed',['unclaimed' => $unclaimed, 'customer' => $customer]) }}" data-sedan-identifier='1' class='sedan_remove waves-effect waves-light btn'>X</a>
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>

</div>
<div class="row">
  <button disabled id="quantity_btn" type="submit" class="waves-effect waves-light btn-large">Save</button>
</div>

{!! Form::close() !!}

{!! Form::open(['route' => ['unclaimed.addunclaimed', 'customer' => $customer], 'class' => 'col s12', 'method' => 'POST']) !!}

<div class="row">
  <table id="addservice_tbl">
    <tbody>

      <tr>
        <td colspan="3"><h4>Add Services</h4></td>
      </tr>

      @for($i = 0; $i < 3; $i++)
        <tr>

          <td>
            <div class="input-field col s12">
              {{ Form::select("menuitem[$i][id]", $service_plucked, null, ['class' => 'service_select','placeholder' => 'Select']) }}
            </div>
          </td>

          <td colspan="2">
            <div class="input-field col s12">
              <input class="service_qty" data-menuitem="menuitem[{{ $i }}]" name="menuitem[{{ $i }}][quantity]"  type="text" placeholder="Enter Quantity">
              <label for="quantity">Quantity</label>
            </div>
          </td>

        </tr>
      @endfor

    </tbody>
  </table>
</div>

<div class="row">
  <button disabled id="addservice_btn" type="submit" class="waves-effect waves-light btn-large">Submit</button>
</div>


{!! Form::close() !!}

@endsection