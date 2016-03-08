<?php
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
  <?php
  require_once("helpers/db.php");

  $required_fields = array("camper_first_name", "camper_last_name", "camper_dob", "camper_grade", "campsite_location")

  $camper_first_name = $_POST["camper_first_name"];
  $camper_last_name = $_POST["camper_last_name"];
  $camper_dob = $_POST["camper_dob"];
  $camper_notes = $_POST["camper_notes"]

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
