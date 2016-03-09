<?php
require_once("../../resources/config.php");
header("Content-type: application/json");
$location_id = $_POST['locationId'];
// error_log($location_id);
require_once("db.php");
$conn = get_db_conn();

$sql = "SELECT * FROM camp_sessions WHERE campsite_id=$location_id";
$result = $conn->query($sql);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
  // error_log($row);
  $data[] = array("id" => $row["id"], "start" => $row["start_date"], "end" => $row["end_date"]);
}

echo json_encode($data);
?>
