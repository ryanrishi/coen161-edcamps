<?php
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
  <script>
  $(document).ready(function() {
    var $form = $('.registration-form');
    // validate email addresses
    $('.email').each(function(i, el) {
      $(el).change(function() {
        var email = $(this).val();
        console.debug(email);
        // TODO
      });
    });

    // validate phone number
    $('.phone').each(function(i, el) {
      $(el).change(function() {
        var phoneNumber = $(this).val();
        console.debug(phoneNumber);
        // TODO
      });
    });

    // validate dates
    // TODO
  });
  </script>
  <form class="registration-form" action="register.php" method="post">
    <div class="camper-information">
      <h3>Camper Information</h3>
      <hr>
      <div class="form-group">
        <label>First</label>
        <input type="text" name="camper_first_name" value="" placeholder="First">
      </div>
      <div class="form-group">
        <label>Last</label>
        <input type="text" name="camper_last_name" value="" placeholder="Last">
      </div>
      <div class="form-group">
        <label>Date of Birth</label>
        <input type="text" class="date datepicker" name="camper_dob" placeholder="mm/dd/yyyy">
      </div>
      <div class="form-group">
        <label>Grade level</label>

        <select name="camper_grade">
          <?php
          $supported_grades = array("K", 1, 2, 3, 4, 5);
          foreach ($supported_grades as $key => $grade) {
            echo "<option value=$grade>$grade</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Allergies, notes, etc.</label>
        <input type="text" name="camper_notes" value="">
      </div>
      <div class="form-group">
        <label>Camp location</label>
        <select class="campsite-location" name="campsite_location" onchange="showSessionsForSelectedLocation()">
          <?php
          require_once("helpers/db.php");
          $conn = get_db_conn();
          $sql = "SELECT * FROM campsites";
          $result = $conn->query($sql);

          if (!$result) {
            echo "ERROR: " . mysqli_error($conn);
          }

          while ($row = mysqli_fetch_assoc($result)) {
            $campsite_id = $row['id'];
            $campsite_name = $row['name'];
            echo "<option value=$campsite_id>$campsite_name</option>";
          }
          ?>
        </select>
      </div>
        <table class="table active-sessions-for-selected-location">
          <!-- this will be populated when user selects a campsite locaation -->
        </table>

        <script>
        function showSessionsForSelectedLocation() {
          console.debug('showSessionsForSelectedLocation');
          var selectedLocationId = $('.camper-information .campsite-location').val();
          if (selectedLocationId === null || selectedLocationId === undefined) {
            console.error('showSessionsForSelectedLocation', 'locationId is not selected');
            return;
          }
          $.ajax({
            data: 'locationId=' + selectedLocationId,
            url: 'helpers/get_campsite_sessions.php',
            method: 'POST',
            success: function(data) {
              console.debug('showSessionsForSelectedLocation', 'success', data);
              if (data.length === 0) {
                // TODO tell user that no sessions are available for that location
                console.debug('showSessionsForSelectedLocation', 'success', 'no sessions active', selectedLocationId);
                return;
              }
              var $sessions = $('.active-sessions-for-selected-location');
              // empty the sessions table
              $sessions.empty();
              var tableHeader = '<tr><th></th><th>Camp Session</th><th>Start Date</th><th>End Date</th><th>Cost</th></tr>';
              $sessions.append(tableHeader);
              data.forEach(function(d) {
                var tableRow = $(document.createElement('tr'));
                // radio button
                var radio = document.createElement('input');
                radio.setAttribute('type', 'radio');
                radio.setAttribute('name', 'session');
                radio.setAttribute('value', d.id);
                $(radio).prop('required', true);
                var td = $(document.createElement('td'));
                td.append(radio);
                tableRow.append(td);
                for (key in d) {
                  if (d.hasOwnProperty(key)) {
                    var td = $(document.createElement('td'));
                    if (key === 'id') {
                      // skip id
                      continue;
                    }
                    else {
                      td.append(d[key]);
                    }
                    tableRow.append(td);
                  }
                }
                $sessions.append(tableRow);
              });
            }
          });
        }
        </script>
        <script src="js/validate.js"></script>
        <script>
        function emailDidChange() {
          var $email = $('.registration-form .email');
          var emailAddress = $email.val();
          if (!validateEmailAddress(emailAddress)) {
            alert('The email address you entered is not valid.');
            $email.addClass('error');
            return;
          }
          $email.removeClass('error');
        }

        function phoneDidChange() {
          var $phone = $('.registration-form .phone-number');
          var phoneNumber = $phone.val();
          if (!validatePhoneNumber(phoneNumber)) {
            alert('The phone number you entered is not valid');
            $phone.addClass('error');
            return;
          }
          $phone.removeClass('error');
        }

        </script>
      </div>

      <div class="parent-information">
        <?php
        // get parent information
        require_once('helpers/db.php');

        global $parent_first, $parent_last, $parent_email, $parent_phone;

        if (isset($_SESSION['user_id'])) {
          $conn = get_db_conn();
          $user_id = $_SESSION['user_id'];
          $sql = "SELECT * FROM users WHERE id=$user_id";
          $result = $conn->query($sql);
          $row = mysqli_fetch_assoc($result);
          $parent_first = $row['first_name'];
          $parent_last = $row['last_name'];
          $parent_email = $row['email'];
          $parent_phone = $row['phone'];
        }

        ?>
        <h3>Parent Information</h3>
        <hr>
        <div class="form-group">
          <label>First</label>
          <input type="text" name="parent_first_name" value="<?php global $parent_first; echo $parent_first; ?>" placeholder="First">
        </div>
        <div class="form-group">
          <label>Last</label>
          <input type="text" name="parent_last_name" value="<?php global $parent_last; echo $parent_last; ?>" placeholder="Last">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" class="email" name="parent_email" value="<?php global $parent_email; echo $parent_email; ?>" onchange="emailDidChange()" placeholder="email">
        </div>
        <div class="form-group">
          <label>Phone</label>
          <input type="text" class="phone-number" name="parent_phone" value="<?php global $parent_phone; echo $parent_phone; ?>" onchange="phoneDidChange()">
        </div>
      </div>

      <div class="payment-information">
        <h3>Payment Information</h3>
        <hr>
        <div class="form-group">
          <label>Card Type</label>

          <select class="" name="card_type">
            <?php
            $supported_cards = array("MasterCard", "Visa", "Discover", "American Express");
            foreach($supported_cards as $key => $card) {
              echo "<option value=$card>$card</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Card Number</label>
          <input type="text" name="card_number" value="" placeholder="XXXX XXXX XXXX XXXX">
        </div>
        <div class="form-group">
          <label>Expiration Date</label>
          <input class="date datepicker" type="text" name="card_exp" value="" placeholder="mm/yyyy">
        </div>
        <div class="form-group">
          <label>CVV</label>
          <input type="text" name="card_cvv" value="" placehodler="XXX">
        </div>
      </div>

      <input type="submit" name="submit" value="Submit" class="btn">
    </form>
  </div>
  <script src="../resources/lib/js/jquery.mask.min.js" type="text/javascript"></script>
  <script>
  $(document).ready(function() {
    $('.datepicker').datepicker();
    $('.phone-number').mask('(999) 999-9999');
  });
  </script>
  <?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
