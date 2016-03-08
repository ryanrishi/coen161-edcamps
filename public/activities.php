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
    $name = $row['name'];
    $description = $row['description'];
    echo '<div class="activity">';
    echo "<h3>$name</h3>";
    echo "<hr>";
    echo "<p>$description</p>";
    echo '</div>';
  }
  ?>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
