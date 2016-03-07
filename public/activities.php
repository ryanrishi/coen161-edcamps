<?php
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
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
