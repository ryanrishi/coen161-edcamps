<?php
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
  <h1>Schedule</h1>
  <hr>
  <?php
  if (isset($_SESSION['user_id'])) {
    // user is logged in
    require_once('helpers/db.php');
    $conn = get_db_conn();
    $parent_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM campers WHERE parent1_id=$parent_id OR parent2_id=$parent_id";
    $result = $conn->query($sql);
    $children = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $children[] = $row;
    }

    // display schedule for each child
    foreach ($children as $key => $camper) {
      echo "Here is $camper[first_name]'s schedule.";
      $sql = "SELECT * FROM registrations WHERE camper_id=$camper[id]";
      $result = $conn->query($sql);

      if (!$result) {
        echo "ERROR getting registrations with camper id $camper[id] " . mysqli_error($conn);
      }

      echo '<table class="table">';
      echo '<tr><th>Camp Site</th><th>Start Date</th><th>End Date</th></tr>';
      while ($row = mysqli_fetch_assoc($result)) {
        $sql = "SELECT * FROM camp_sessions WHERE id=$row[session_id]"; // will return session
        $result = $conn->query($sql);
        $session = mysqli_fetch_assoc($result);

        $sql = "SELECT * FROM campsites WHERE id=$session[campsite_id]";
        $result = $conn->query($sql);
        $campsite = mysqli_fetch_assoc($result);
        echo "<tr><td>$campsite[name]</td><td>$session[start_date]</td><td>$session[end_date]</td></tr>";
      }
    }
  }
  else {
    echo "You must first log in to see your child's schedule.";
  }
  ?>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
