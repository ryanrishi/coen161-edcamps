<?php
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
  <?php

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

    // TODO validate phone and email
    // if (!validate_email($_POST["parent_email"] || !validate_phone($_POST["parent_phone"]))) {
    //   // error
    //   $registration_success = False;
    //   echo '<span class="error">Not a valid email or phone number.</span>';
    //   echo $_POST['parent_email'] . ' ' . $_POST['parent_phone'];
    // }
  }

  // var_dump($_POST);

  // if this is reached, it assumes form has been validated
  require_once("helpers/db.php");

  // camper info
  $camper = array(
    "first" => $_POST["camper_first_name"],
    "last" => $_POST["camper_last_name"],
    "dob" => $_POST["camper_dob"],
    "notes" => $_POST["camper_notes"],
    "grade" => $_POST["camper_grade"]
  );

  // $camper_first_name = $_POST["camper_first_name"];
  // $camper_last_name = $_POST["camper_last_name"];
  // $camper_dob = $_POST["camper_dob"];
  // $camper_notes = $_POST["camper_notes"];
  // $camper_grade = $_POST["camper_grade"];

  // parent info
  $parent = array(
    "first" => $_POST["parent_first_name"],
    "last" => $_POST["parent_last_name"],
    "email" => $_POST["parent_email"],
    "phone" => $_POST["parent_phone"]
  );
  // $parent_first = $_POST["parent_first_name"];
  // $parent_last = $_POST["parent_last_name"];
  // $parent_email = $_POST["parent_email"];
  // $parent_phone = $_POST["parent_phone"];

  // payment info
  $payment = array(
    "card_type" => $_POST["card_type"],
    "number" => $_POST["card_number"],
    "expiration" => $_POST["card_exp"],
    "cvv" => $_POST["card_cvv"]
  );
  // $payment_card_type = $_POST["card_type"];
  // $payment_card_number = $_POST["card_number"];
  // $payment_card_exp = $_POST["card_exp"];
  // $payment_card_cvv = $_POST["card_cvv"];

  // $conn = get_db_conn();
  //
  // // create parent in database if doesn't exist
  // $sql = "SELECT * FROM users
  //         WHERE first_name='$parent[first]',
  //         last_name='$parent[last]',
  //         email='$parent[email]'";
  // $result = $conn->query($sql);
  //
  // if (!$result) {
  //   echo "Error getting users from database.";
  // }
  //
  // if ($result->num_rows === 0) {
  //   // parent does not exist in database (or error?)
  //   $sql = "INSERT INTO users (first_name, last_name, email, phone)
  //   VALUES ('$parent[first]', '$parent[last]', '$parent[email]', '$parent[phone]')";
  //   error_log($sql);
  //   $result = $conn->query($sql);
  //   $parent['id'] = mysqli_insert_id($conn);
  //   if ($result == False) {
  //     // an error ooccured
  //     $registration_success = False;
  //     echo '<span class="error">Error inserting user into database. ' . mysqli_error($conn) . '</span>';
  //   }
  // }
  // else {
  //   // parent already exists in database
  //   $row = mysqli_fetch_assoc($result);
  //   $parent['id'] = $row['id'];
  // }
  //
  // echo("register.php parent_id $parent[id]");
  //
  // // check if camper exists in database
  // $sql = "SELECT * FROM campers
  //         WHERE first_name='$camper[first]'
  //         AND last_name='$camper[last]'
  //         AND dob=$camper[dob]";
  // $result = $conn->query($sql);
  // if ($result->num_rows === 0) {
  //   echo "ERROR error inserting camper into database";
  //   // camper does not exist (or error?)
  //   $sql = "INSERT INTO campers (first_name, last_name, dob, grade, notes, parent1_id)
  //   VALUES ('$camper[first]', '$camper[last]', $camper[dob], $camper[grade], '$camper[notes]', $parent[id])";
  //   $result = $conn->query($sql);
  //   $camper['id'] = mysqli_insert_id($conn);
  //   if ($result == False) {
  //     $registration_success = False;
  //     echo '<span class="error">Error inserting camper into database. ' . mysqli_error($conn) . '</span>';
  //   }
  // }
  // else {
  //   echo "here";
  //   // camper does exist in database
  //   $row = mysqli_fetch_assoc($result);
  //   $camper['id'] = $row['id'];
  // }
  //
  // $camp_session_id = $_POST["session"];
  //
  // echo "camper[id]: $camper[id]";
  // echo "camp_session_id: $camp_session_id";
  //
  // // insert into registrations table
  // $camp_session_id = $_POST['session'];
  // $sql = "INSERT INTO registrations (camper_id, session_id) VALUES ($camper[id], $camp_session_id)";
  // $result = $conn->query($sql);
  //
  // if ($result == False) {
  //   $registration_success = False;
  //   echo '<span class="error">Error inserting registration into database. ' . mysqli_error($conn) . '</span>';
  // }
  //
  // if ($registration_success != False) {
    echo "Congratulations, you're registered!";
  // }
  ?>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
