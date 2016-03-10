<?php
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
  <h1>Activities</h1>
  <hr>
  <div class="row">
    <p>We offer a wide range of indoor and outdoor activities.</p>
    <p>To get a taste of what we offer, check out some examples such as our <a href="puzzle.php">puzzle</a> or <a href="pong.php">3D Pong</a>!</p>
  </div>
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
