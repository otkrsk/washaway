  $(document).ready(function() {

    var i = 2;
    var x = 2;

    $('#add_sedan').click(function() {
      console.log('sedan');

      var sedan_content = "<tr id='sedan_row" + i + "'><td><div class='input-field col s12'>";
      sedan_content += "<input id='sedan_service_name' name='sedan_service[" + i + "][name]' type='text' placeholder='Enter Sedan service name'><label class='active' for='sedan_service_name'>Service Name</label>";
      sedan_content += "</div></td>";

      sedan_content += "<td><div class='input-field col s12'>";
      sedan_content += "<input id='sedan_service_normal_price' name='sedan_service[" + i + "][normal_price]' type='text' placeholder='Enter Sedan service price'><label class='active' for='sedan_service_price'>Service Price (Normal)</label></div></td>";

      sedan_content += "<td><div class='input-field col s12'>";
      sedan_content += "<input id='sedan_service_member_price' name='sedan_service[" + i + "][member_price]' type='text' placeholder='Enter Sedan service price'><label class='active' for='sedan_service_member_price'>Service Price (Member)</label>";
      sedan_content += "</div></td>";

      sedan_content += "<td><p><label><input id='sedan_service_unclaimed' name='sedan_service[" + i + "][unclaimed]' type='checkbox' /><span>Add to Unclaimed Services</span></label></p></td>";

      sedan_content += "<td>";
      sedan_content += "<a data-sedan-identifier='" + i + "' class='sedan_remove waves-effect waves-light btn'>Remove</a>";
      sedan_content += "</td></tr>";

      $('#more_sedan').append(sedan_content);

      i++;

      M.updateTextFields();

    });

    $(document).on('click', '.sedan_remove', function() {
      var quack = $(this).attr('data-sedan-identifier');
      console.log('remove sedan');
      console.log(quack);
      $('#sedan_row' + quack).remove();
    });

    $('#add_mpv').click(function() {
      console.log('mpv');

      var mpv_content = "<tr id='mpv_row" + x + "'><td><div class='input-field col s12'>";
      mpv_content += "<input id='mpv_service_name' name='mpv_service[" + x + "][name]' type='text' placeholder='Enter MPV service name'><label class='active' for='mpv_service_name'>Service Name</label>";
      mpv_content += "</div></td>";

      mpv_content += "<td><div class='input-field col s12'>";
      mpv_content += "<input id='mpv_service_normal_price' name='mpv_service[" + x + "][normal_price]' type='text' placeholder='Enter MPV service price'><label class='active' for='mpv_service_price'>Service Price (Normal)</label></div></td>";

      mpv_content += "<td><div class='input-field col s12'>";
      mpv_content += "<input id='mpv_service_member_price' name='mpv_service[" + x + "][member_price]' type='text' placeholder='Enter MPV service price'><label class='active' for='mpv_service_member_price'>Service Price (Member)</label>";
      mpv_content += "</div></td>";

      mpv_content += "<td><p><label><input id='mpv_service_unclaimed' name='mpv_service[" + x + "][unclaimed]' type='checkbox' /><span>Add to Unclaimed Services</span></label></p></td>";

      mpv_content += "<td>";
      mpv_content += "<a data-mpv-identifier='" + x + "' class='mpv_remove waves-effect waves-light btn'>Remove</a>";
      mpv_content += "</td></tr>";

      $('#more_mpv').append(mpv_content);

      i++;

      M.updateTextFields();

    });

    $(document).on('click', '.mpv_remove', function() {
      var quack = $(this).attr('data-mpv-identifier');
      console.log('remove mpv');
      console.log(quack);
      $('#mpv_row' + quack).remove();
    });

  });