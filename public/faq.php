<?php
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
  <h1>Frequently Asked Questions</h1>
  <?php
    require_once('helpers/db.php');
    $conn = get_db_conn();

    $sql = "SELECT * FROM questions";
    $result = $conn->query($sql);

    while ($row = mysqli_fetch_assoc($result)) {
      $question = $row['question'];
      $answer = $row['answer'];
      echo '<div>';
      echo '<p class="question">' . $question . '</p>';
      echo '<p class="answer">' . $answer . '</p>';
      echo '</div>';
    }
  ?>
  <div class="question-answer-pair"></div>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
