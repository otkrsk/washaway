@extends('layouts.app')

@section('content')

<div class="row">
  <h3>Services</h3>
  @if($message = Session::get('error'))
  <strong style="color:red;">{{ $message }}</strong>
  @endif
</div>

<div class="row">
  <table>
    <thead>
      <tr>
        <th>Service</th>
        <th>Normal Price</th>
        <th colspan='2'>Member Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach($menuitems as $menuitem)
        <tr>
          @if($menuitem->prices->first()->car_type == $customer->cars->first()->type)
            <td>{{ $menuitem->name }}</td>
            <td>{{ $menuitem->prices->first()->normal_price }}</td>
            <td>{{ $menuitem->prices->first()->member_price }}</td>
            <td><a href='{{ route("sales.new", ["customer" => $customer->id, "item" => $menuitem->id, "flag" => 1]) }}' class='waves-effect waves-light btn'>Add</a></td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection