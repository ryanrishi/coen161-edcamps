<?php
  require_once("../resources/config.php");

  function get_db_conn() {
    global $config;
    ini_set("display_errors", "On");
    error_reporting(E_ALL);

    $db_host = $config['db']['host'];
    $db_user = $config['db']['username'];
    $db_pass = $config['db']['password'];
    $db_name = $config['db']['name'];

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      return -1;
    }

    return $conn;

  }
?>
