<?php
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
  <form class="" action="register.php" method="post">
    <div class="camper-information">
      <h3>Camper Information</h3>
      <hr>
      <p>First&nbsp;<input type="text" name="camper_first_name" value=""></p>
      <p>Last&nbsp;<input type="text" name="camper_last_name" value=""></p>
      <p>Date of Birth&nbsp;<input type="text" name="camper_dob" value="mm/dd/yyyy"></p>
      <p>Grade level&nbsp;
        <select name="camper_grade">
          <?php
          $supported_grades = array("K", 1, 2, 3, 4, 5);
          foreach ($supported_grades as $key => $grade) {
            echo "<option value=$grade>$grade</option>";
          }
          ?>
        </select>
      </p>
      <p>Allergies, notes, etc.&nbsp;<input type="text" name="camper_notes" value=""></p>
      <p>Camp location&nbsp;
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
          // TODO when a user selects a location, populate sessions
          ?>
        </select>
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
              console.debug('get_campsite_sessions', JSON.parse(data));
              var sessionsActive = JSON.parse(data);
              var $sessions = $('.active-sessions-for-selected-location');
              sessionsActive.forEach(function(d) {
                var input = document.createElement('input');
                input.setAttribute('type', 'radio');
                input.setAttribute('name', 'session');
                input.setAttribute('value', d.id);
                $sessions.append(input);
                $sessions.append('&nbsp;' + d.start + ' - ' + d.end); // TODO format dates
              });
            }
          });
        }
        </script>
      </div>

      <div class="parent-information">
        <h3>Parent Information</h3>
        <hr>
        <p>Name&nbsp;<input type="text" name="parent_name" value=""></p>
        <p>Email&nbsp;<input type="text" name="parent_email" value=""></p>
        <p>Phone&nbsp;<input type="text" name="parent_phone" value=""></p>
      </div>

      <div class="payment-information">
        <h3>Payment Information</h3>
        <hr>
        <p>Card Type&nbsp;
          <select class="" name="card_type">
            <?php
            $supported_cards = array("MasterCard", "Visa", "Discover", "American Express");
            foreach($supported_cards as $key => $card) {
              echo "<option value=$card>$card</option>";
            }
            ?>
          </select>
        </p>
        <p>Card Number&nbsp;<input type="text" name="card_number" value=""></p>
        <p>Expiration Date&nbsp;<input type="text" name="card_exp" value=""></p>
        <p>CVV&nbsp;<input type="text" name="card_cvv" value=""></p>
      </div>

      <input type="button" name="submit" value="Submit" class="btn">
    </form>

    <?php
    require_once("helpers/db.php");

    $conn = get_db_conn();

    $sql = "SELECT * FROM activities";
    $result = $conn->query($sql);

    if (!$result) {
      echo "ERROR: " . mysqli_error($conn);
    }

    while ($row = mysqli_fetch_assoc($result)) {
      var_dump($row);
    }
    ?>
  </div>
  <?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
