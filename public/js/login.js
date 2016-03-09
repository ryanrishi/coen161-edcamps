$(document).ready(function() {
  $('#login').click(function() {
    console.debug('click');
    $.ajax({
      url: 'login.php',
      method: 'POST',
      success: function(d) {
        console.debug(d);
        $('.account-name').text(d.first_name + ' ' + d.last_name);
      }
    })
  })
});
