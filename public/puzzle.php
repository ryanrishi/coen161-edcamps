<?php
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
  <h1>Puzzle</h1>
  <p>Click on a tile that is adjacent to the empty tile to move it. Have fun!</p>
  <canvas id="puzzle" width="400" height="400">Your browser does not support HTML5 canvas.</canvas>
  <button type="button" class="btn btn-default btn-lg" onclick="shuffle()">Shuffle Puzzle!</button>
  <script src="js/puzzle.js"></script>
</div>
<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
