<?php
require_once("../resources/config.php");
require_once("helpers/db.php");
header("Content-type: application/json");
$conn = get_db_conn();

$sql = "SELECT * FROM users ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if (!$result) {
  $error_message = mysqli_error($conn);
  echo json_encode($error_message);
}

$row = mysqli_fetch_assoc($result);
// set session user_id so that it stays logged in
$_SESSION['user_id'] = $row['id'];
echo json_encode($row);
?>
