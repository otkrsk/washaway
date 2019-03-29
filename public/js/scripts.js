// Check/uncheck the checkboxes
var checkboxes = document.getElementsByTagName('input');

for (var i = 0; i < checkboxes.length; i++)
{
  if (checkboxes[i].type == 'checkbox')
  {
    var status = checkboxes[i].getAttribute('data-status');
    checkboxes[i].checked = (status == 1 ? true : false);
  }
}