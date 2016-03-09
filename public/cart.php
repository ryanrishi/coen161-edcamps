<?php
session_start();
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
  <?php
  function show_cart() {
    if (!isset($_SESSION['cart'])) {
      return;
    }
    $subtotal = 0;
    echo '<table class="table">';
    echo '<tr><th>Quantity</th><th>Item</th><th>Price</th></tr>';
    foreach ($_SESSION['cart'] as $id => $quantity) {
      $item_details = get_item_details($id);
      $name = $item_details['name'];
      $price = money_format("%n", $item_details['price']);
      $subtotal += $item_details['price'] * $quantity;
      echo "<tr><td><a href=\"cart.php?drop=$id\">-</a>$quantity<a href=\"cart.php?add=$id\">+</a></td><td>$name</td><td>$price</td></td>";
    }
    echo "<p>Subtotal: $" . $subtotal . "</p>"; // TODO format?
    if (isset($_SESSION['store_discount'])) {
      echo "<p>Discount: " . $_SESSION['store_discount'] * 100 . "%</p>";
      $subtotal *= (1 - $_SESSION['store_discount']);
    }
    echo "<p>Total: $" . $subtotal . "</p>";
  }

  function addToCart() {
    $addItemId = $_GET['add'];

    if (isset($_SESSION['cart'])) {
      if (isset($_SESSION['cart'][$addItemId])) {
        $_SESSION['cart'][$addItemId]+= 1;
      }
      else {
        $_SESSION['cart'][$addItemId] = 1;
      }
    }
    else {
      // cart does not exist; create one
      $_SESSION['cart'] = array();
      $_SESSION['cart'][$addItemId] = 1;
    }
    $item_details = get_item_details($addItemId);
    $item_name = $item_details['name'];
  }

  function drop() {
    if (isset($_GET['drop'])) {
      $dropItemId = $_GET['drop'];
      if (isset($_SESSION['cart'])) {
        $mycart = $_SESSION['cart'];
        // unset($mycart[$dropItemId]);
        if ($mycart[$dropItemId] == 1) {
          unset($mycart[$dropItemId]);
        }
        else {
          $mycart[$dropItemId]--;
        }
        $_SESSION['cart'] = $mycart;
      }
    }
  }

  // returns a KV pair of item details (basically that row in database)
  function get_item_details($item_id) {
    require_once('helpers/db.php');
    $conn = get_db_conn();

    $sql = "SELECT * FROM inventory WHERE id=$item_id";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);

    return $row;
  }

  if (isset($_GET['add'])) {
    addToCart();
    unset($_GET['add']);
  }
  // // if user has chosen "show cart"
  // elseif (isset($_GET['show'])) {
  //   show_cart();
  //   unset($_GET['show']);
  // }
  // // if user has chosen "clear cart"
  // elseif (isset($_GET['clear'])) {
  //   clearCart();
  //   unset($_GET['clear']);
  // }
  // if user has chosen "remove item from cart"
  elseif (isset($_GET['drop'])) {
    drop();
    unset($_GET['drop']);
  }// if user has chosen "remove item from cart"
  // elseif (isset($_GET['checkout'])) {
  //   checkout();
  //   unset($_GET['checkout']);
  // }

  // apply discounts
  $_SESSION['store_discount'] = 0.15;

  if (isset($_SESSION['cart'])) {
    show_cart();
  }
  else {
    echo "Your cart is empty.";
    echo 'Head to our <a href="store.php">store</a> to get some EdCamps gear!';
  }

  ?>
  <div class="row">
    <a href="checkout.php"><button class="button btn">Checkout</button></a>
  </div>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
