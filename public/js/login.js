$(document).ready(function() {
  $('#login').click(function(evt) {
    // dumb way to check if user is logged in
    if ($('#login').html() === 'Login') {
      $.ajax({
        url: 'login.php',
        method: 'POST',
        success: function(d) {
          console.debug(d);
          $('.account-name').text(d.first_name + ' ' + d.last_name);
        }
      });
    }
    else {
      // user is already logged in
      // don't log out if they clicked caret next to login
      if (evt.currentTarget.classList.contains('dropdown-toggle')) {
        return;
      }
      $.ajax({
        url: 'logout.php',
        method: 'POST',
        success: function() {
          $('.account-name').text('Login'); // set back to "Login"
        }
      });
    }
  });
});
