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
        <div class="active-sessions-for-selected-location">
          <!-- this will be populated when user selects a campsite locaation -->
        </div>

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
              // console.debug('get_campsite_sessions', JSON.parse(data));
              var sessionsActive = JSON.parse(data);
              var $sessions = $('.active-sessions-for-selected-location');
              sessionsActive.forEach(function(d) {
                var input = document.createElement('input');
                input.setAttribute('type', 'radio');
                input.setAttribute('name', 'session');
                input.setAttribute('value', d.id);
                $sessions.append(input);
                $sessions.append('&nbsp;Session ' + d.id + ' (' + d.start + ' - ' + d.end + ')'); // TODO format dates
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
        <h3>Parent Information</h3>
        <hr>
        <div class="form-group">
          <label>First</label>
          <input type="text" name="parent_first_name" value="" placeholder="First">
        </div>
        <div class="form-group">
          <label>Last</label>
          <input type="text" name="parent_last_name" value="" placeholder="Last">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" class="email" name="parent_email" value="" onchange="emailDidChange()" placeholder="email">
        </div>
        <div class="form-group">
          <label>Phone</label>
          <input type="text" class="phone-number" name="parent_phone" value="" onchange="phoneDidChange()" placeholder="(XXX) XXX-XXXX">
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

      <input type="button" name="submit" value="Submit" class="btn">
    </form>
  </div>
  <script>
  $(document).ready(function() {
    $('.datepicker').datepicker();
  });
  </script>
  <?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
