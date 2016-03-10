<?php
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
  <?php

  $registration_success = NULL;

  // check form
  if (isset($_POST["camper_first_name"])) {
    // camper info
    if (empty($_POST["camper_last_name"])
    || empty($_POST["camper_dob"])
    || empty($_POST["camper_grade"])
    || empty($_POST["campsite_location"])
    || empty($_POST["session"])
    // parent info
    || empty($_POST["parent_first_name"])
    || empty($_POST["parent_last_name"])
    || empty($_POST["parent_email"])
    || empty($_POST["parent_phone"])
    // payment info
    || empty($_POST["card_type"])
    || empty($_POST["card_number"])
    || empty($_POST["card_exp"])
    || empty($_POST["card_cvv"])) {
      // error
      echo "ERROR: Form not complete.";
      error_log('ERROR: register.php -- Form not complete.');
    }

    require_once("helpers/validation.php");

    if (!validate_email($_POST["parent_email"] || !validate_phone($_POST["parent_phone"]))) {
      // error
      $registration_success = False;
      echo '<span class="error">Not a valid email or phone number.</span>';
      echo $_POST['parent_email'] . ' ' . $_POST['parent_phone'];
    }
  }

  // var_dump($_POST);

  // if this is reached, it assumes form has been validated
  require_once("helpers/db.php");

  // camper info
  $camper_first_name = $_POST["camper_first_name"];
  $camper_last_name = $_POST["camper_last_name"];
  $camper_dob = $_POST["camper_dob"];
  $camper_notes = $_POST["camper_notes"];
  $camper_grade = $_POST["camper_grade"];

  // parent info
  $parent_first = $_POST["parent_first_name"];
  $parent_last = $_POST["parent_last_name"];
  $parent_email = $_POST["parent_email"];
  $parent_phone = $_POST["parent_phone"];

  // payment info
  $payment_card_type = $_POST["card_type"];
  $payment_card_number = $_POST["card_number"];
  $payment_card_exp = $_POST["card_exp"];
  $payment_card_cvv = $_POST["card_cvv"];

  $conn = get_db_conn();

  // create parent in database if doesn't exist
  $sql = "SELECT * FROM users
          WHERE first_name='$parent_first',
          last_name='$parent_last',
          email='$parent_email'";
  $result = $conn->query($sql);

  $parent_id = NULL;
  if (!$result) {
    // parent does not exist in database (or error?)
    $sql = "INSERT INTO users (first_name, last_name, email, phone)
    VALUES ($parent_first,
      $parent_last,
      $parent_email,
      $parent_phone)";
    error_log($sql);
    $result = $conn->query($sql);
    $parent_id = mysqli_insert_id($conn);
    if ($result == False) {
      // an error ooccured
      $registration_success = False;
      echo '<span class="error">Error inserting user into database. ' . mysqli_error($conn) . '</span>';
    }
  }
  else {
    // parent already exists in database
    $row = mysqli_fetch_assoc($result);
    $parent_id = $row['id'];
  }

  error_log("register.php parent_id $parent_id");

  // check if camper exists in database
  $sql = "SELECT * FROM campers
          WHERE first_name='$camper_first_name'
          AND last_name='$camper_last_name'
          AND dob='$camper_dob'";
  $result = $conn->query($sql);
  $camper_id = NULL;
  if (!$result) {
    // camper does not exist (or error?)
    $sql = "INSERT INTO campers (first_name, last_name, dob, grade, notes, parent1_id)
    VALUES ('$camper_first_name', '$camper_last_name', '$camper_dob', '$camper_grade', '$camper_notes', $parent_id
    )";
    $result = $conn->query($sql);
    $camper_id = mysqli_insert_id($conn);
    if ($result == False) {
      $registration_success = False;
      echo '<span class="error">Error inserting camper into database. ' . mysqli_error($conn) . '</span>';
    }
  }
  else {
    // camper does exist in database
    $row = mysqli_fetch_assoc($result);
    $camper_id = $row['id'];
  }

  // insert into registrations table
  $camp_session_id = $_POST['session'];
  $sql = "INSERT INTO registrations (camper_id, session_id) VALUES ($camper_id, $camp_session_id)";
  $result = $conn->query($sql);

  if ($result == False) {
    $registration_success = False;
    echo '<span class="error">Error inserting registration into database. ' . mysqli_error($conn) . '</span>';
  }

  if ($registration_success != False) {
    echo "Congratulations, you're registered!";
  }
  ?>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
