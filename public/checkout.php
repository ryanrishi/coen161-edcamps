<?php
session_start();
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
  <?php
  if (!isset($_SESSION['cart'])) {
    echo "Your cart is empty.";
    echo 'Visit our <a href="store.php">store</a> to view our items.';
  }
  else {
    require_once("helpers/db.php");
    $conn = get_db_conn();
    foreach ($_SESSION['cart'] as $id => $quantity) {
      $sql = "SELECT * FROM inventory WHERE id=$id";
      $result = $conn->query($sql);
      $row = mysqli_fetch_assoc($result);
      $remaining = $row['remaining'];
      // verify that there are at least that many of this item left in stock
      if ($quantity  > $remaining) {
        echo "ERROR quantity > remaining. Quantity of item $id requested is $quantity; only $remaining left";
        error_log ("ERROR quantity > remaining. Quantity of item $id requested is $quantity; only $remaining left");
        continue;
      }
      $new_remaining = $remaining - $quantity;
      $sql = "UPDATE inventory SET remaining=$new_remaining WHERE id=$id";
      $result = $conn->query($sql);
    }
    echo "Your order was successful.";
    // order summary ?
  }
  ?>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
