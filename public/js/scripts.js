$(document).ready(function() {
  $('#brand_id').change(function() {
    console.log($(this).val());

    var value = $(this).val();
    var token = $('input[name="_token"]').val();

    $.ajax({
      url: "{{ route('ajax.test') }}",
      method: 'POST',
      data: { value: value, _token: token },
      dataType: 'json'
    }).done(function(data) {
      console.log(data);

      var content = "<option value='' disabled selected>Select car Model</option>";

      $.each(data, function(k,v) {
        content += "<option value='" + v['id'] + "'>" + v['name'] + "</option>";
      });

      $('select[name="model_id"]').empty();
      $('select[name="model_id"]').append(content);
      $('select[name="model_id"]').formSelect();

      console.log(content);
    });
  });
});