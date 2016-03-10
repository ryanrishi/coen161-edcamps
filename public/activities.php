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

  $div_counter = 0; // will use 4 column bootstrap layout
  while ($row = mysqli_fetch_assoc($result)) {
    global $div_counter;
    if ($div_counter == 0) {
      echo '<div class="row">';
    }
    $name = $row['name'];
    $description = $row['description'];
    $image_url = $row['image_url'];
    if (!$image_url) {
      $image_url = "http://placehold.it/200x200";
    }
    else {
      $image_url = 'activities/' . $image_url;
    }
    echo '<div class="activity col-lg-3 col-md-3 col-sm-3">';
    echo '<img src="' . $image_url . '" width="200" height="200" />';
    echo "<h3>$name</h3>";
    echo "<hr>";
    echo "<p>$description</p>";
    echo '</div>';
    if ($div_counter == 3) {
      echo '</div>';
    }
    $div_counter = ($div_counter + 1) % 4;
  }
  ?>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
