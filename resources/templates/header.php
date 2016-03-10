<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <?php
  require_once(TEMPLATES_PATH . "/head.php");
  ?>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">EdCamps</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="registration.php">Schedule and Registration<span class="sr-only">(current)</span></a></li>
          <li><a href="activities.php">Activities</a></li>
          <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li> -->
        </ul>
        <!-- <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form> -->
        <ul class="nav navbar-nav navbar-right">
          <?php
          // check if user is logged in
          if (isset($_SESSION['user_id'])) {
            require_once('../resources/config.php');
            require_once('helpers/db.php');
            $conn = get_db_conn();

            // get user name
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM users WHERE id=$user_id";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            echo '<li class="dropdown">';
            echo '<a href="#" id="login" class="dropdown-toggle account-name" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $first_name . ' ' . $last_name . '<span class="caret"></span></a>';
            echo '<ul class="dropdown-menu">';
            echo '<li><a href="#">Account</a></li>';
            echo '<li><a href="faq.php">FAQ</a></li>';
            echo '<li><a href="#" class="logout">Logout</a></li>';
            echo '</li>';
            echo '</ul>';
            // echo '<li><a id="login" class="account-name" href="#">' . $first_name . ' ' . $last_name . '</a></li>';
          }
          else {
            // not logged in
            echo '<li><a id="login" class="account-name" href="#">Login</a></li>';
          }
          ?>
          <li><a href="store.php">Store</a></li>
          <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li> -->
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    <script>
    // quick and dirty logout script
    $(document).ready(function() {
      $('nav .logout').click(function() {
        $.ajax({
          url: 'logout.php',
          method: 'POST',
          success: function() {
            $('.account-name').text('Login');
          }
        });
      });
    });
    </script>
  </nav>
