<span>Register Cash</span>

<form method="POST" action="{{ route('sales.open') }}" class="col s12">

  @csrf

  <div class="row">
    <div class="input-field col s12">
      <input id="amount" name="amount" type="text" class="validate">
      <label for="amount">RM</label>
    </div>
  </div>

  <button type="submit" name="open_sales" class="waves-effect waves-light btn-large">Open Today Sales
    <i class="material-icons right">keyboard_arrow_right</i>
  </button>

</form>