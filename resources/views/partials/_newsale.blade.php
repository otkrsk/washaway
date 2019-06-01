<form method="POST" action="{{ route('customers.search') }}" class="col s12">

  @csrf

  @if ($message = Session::get('plate_no_error'))
    <div class="alert alert-danger alert-block">
      <strong style="color:red;">{{ $message }}</strong>
    </div>
  @endif

  <div class="row">
    <div class="input-field col s12">
      <input id="plate_no" name="plate_no" type="text" class="validate">
      <label for="plate_no">Plate No.</label>
    </div>
  </div>

  <button type="submit" name="open_sales" class="waves-effect waves-light btn-large">Next
    <i class="material-icons right">keyboard_arrow_right</i>
  </button>

</form>