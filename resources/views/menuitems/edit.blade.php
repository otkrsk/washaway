@extends('layouts.app')
@section('content')

<div class="row">
  <h4>Editing {{ $item->name }}</h4>
</div>
<div class="row">

  {!! Form::open(['route' => ['items.update', 'id' => $item->id], 'class' => 'col s12', 'method' => 'PATCH']) !!}

  <table class="responsive-table">
    <tbody>
      <tr>
        <td>
          <div class='input-field col s12'>
            <input id='item_name' name='item_name' type='text' value='{{ $item->name }}'>
            <label class='active' for='item_name'>Menu Item Name</label>
          </div>
        </td>

        <td>
          <div class='input-field col s12'>
            <input id='normal_price' name='normal_price' type='text' value='{{ $item->prices()->first()->normal_price }}'>
            <label class='active' for='normal_price'>Normal Price</label>
          </div>
        </td>

        <td>
          <div class='input-field col s12'>
            <input id='member_price' name='member_price' type='text' value='{{ $item->prices()->first()->member_price }}'>
            <label class='active' for='member_price'>Member Price</label>
          </div>
        </td>

      </tr>
    </tbody>
  </table>

</div>

<div class="row">
  <button type="submit" class="waves-effect waves-light btn-large">Submit</button>
</div>

{!! Form::close() !!}

@endsection