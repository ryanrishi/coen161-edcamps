<?php
session_start();
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
  <?php

  require_once("helpers/db.php");

  $conn = get_db_conn();

  $sql = "SELECT * FROM inventory";
  $result = $conn->query($sql);

  if (!$result) {
    echo "ERROR: " . mysqli_error($conn);
  }

  $div_counter = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    global $div_counter;
    if ($div_counter == 0) {
      echo '<div class="row">';
    }
    $id = $row['id'];
    $name = $row['name'];
    $price = money_format("%n", $row['price']);
    $remaining = $row['remaining'];
    echo '<div class="store-item col-lg-4 col-md-4 col-sm-4">';
    echo '<img src="http://placehold.it/200x200" />';
    echo '<p class="item-name">' . $name . '</p>';
    echo '<p class="item-price">$' . $price . '</p>';
    if ($remaining > 0) {
      echo '<a href="cart.php?add=' . $id . '"><button class="button btn">Add to Cart</button></a>';
    }
    else {
      echo '<button class="button btn" disabled>Sold out!</button>';
    }
    echo '</div>';
    if ($div_counter == 3) {
      echo '</div>';
    }
    $div_counter = ($div_counter + 1) % 3;
  }
  ?>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
