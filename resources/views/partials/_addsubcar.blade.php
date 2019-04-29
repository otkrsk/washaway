  <input id="customer_id" name="customer_id" type="hidden" value="{{ $customer->id }}" >

  <div class="row">
    <div class="input-field col s12">
      <input id="plate_no" name="plate_no" type="text" placeholder="Enter Plate No" >
      <label for="plate_no">Plate No</label>
      @if ($message = Session::get('plate_no_error'))
        <strong style="color:red;">{{ $message }}</strong>
      @endif
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <select id="brand_id" name="brand_id">
        <option value="" disabled selected>Select car Brand</option>

        @foreach($brands as $brand)
          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach

      </select>
      <label>Select Brand</label>
      @if ($message = Session::get('brand_error'))
        <strong style="color:red;">{{ $message }}</strong>
      @endif
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <select id="model_id" name="model_id">
        <option value="" disabled selected>Select car Model</option>
      </select>
      <label>Select Model</label>
      @if ($message = Session::get('model_error'))
        <strong style="color:red;">{{ $message }}</strong>
      @endif
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
      <select name="color_id">
        <option value="" disabled selected>Select car Color</option>

        @foreach($colors as $color)
          <option value="{{ $color->id }}">{{ $color->name }}</option>
        @endforeach

      </select>
      <label>Select Color</label>
      @if ($message = Session::get('color_error'))
        <strong style="color:red;">{{ $message }}</strong>
      @endif
    </div>
  </div>
