var N = 4;
var canvas, puzzle, images;
_setup('puzzle');

function _setup(canvasId) {
    images = loadImages();
    canvas = document.getElementById(canvasId);
    puzzle = loadPuzzle(Math.pow(N, 2));
    setTimeout(drawBoard, 2*1000, 'puzzle', puzzle, images);  //  @todo have this use event handlers
    // shuffle();
    canvas.addEventListener('click', didClickTileHandler)
}

function shuffle() {
  //  @todo make sure this only generates solvable puzzles
  //  @todo use swap()
  for (var size = N*N-1; size > 1; --size) {
    var r = Math.floor(Math.random()*(size+1));
    var t = puzzle[size];
    puzzle[size] = puzzle[r];
    puzzle[r] = t;
  }
  drawBoard();
}

function loadPuzzle(size) {
  var puzzle = [];
  for (var i = 0; i < size - 1; i++) {
    puzzle[i] = i;
  }
  puzzle[size - 1] = null;  //  last one is empty slot
  return puzzle;
}

function loadImages() {
  var images = {};
  for (var i = 0; i < 15; i++) {
    var img = document.createElement('img');
    img.setAttribute('src', 'tile_' + (i < 10 ? '0' + i : i) + '.png');
    images[i] = img;
  }
  return images
}

function didClickTileHandler(event) {
  var tile = {};
  tile.col = Math.floor((event.pageX - canvas.offsetLeft) / 100); //  @todo don't hardcode these
  tile.row = Math.floor((event.pageY - canvas.offsetTop) / 100);  //  @todo don't hardcode these
  // console.debug(tile);

  var nullTile = {};
  for (var i = 0; i < puzzle.length; i++) {
    if (puzzle[i] === null) {
      nullTile.row = Math.floor(i / N);
      nullTile.col = i % N;
    }
  }

  // console.debug(isNeighbor(tile, nullTile));
  if (isNeighbor(tile, nullTile)) {
    var selectedIndex = tile.row * N + tile.col,
        nullTileIndex = nullTile.row * N + nullTile.col;
    swap(selectedIndex, nullTileIndex);
    drawBoard();
  }
}

function swap(selectedIndex, nullIndex) {
  console.debug('swap', selectedIndex, nullIndex)
  puzzle[nullIndex] = puzzle[selectedIndex];
  puzzle[selectedIndex] = null;
}

function isNeighbor(a, b) {
  // console.debug('isNeighbor', a, b);
  return (Math.abs(a.row - b.row) + Math.abs(a.col - b.col) == 1);
}

function drawBoard() {
  console.debug('drawBoard', puzzle);
  var ctx = canvas.getContext('2d');
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  /* draw images */
  for (var i = 0; i < puzzle.length; i++) {
    var x = (i % N) * Math.floor(canvas.width / N),
        y = Math.floor(i / N) * canvas.height / N;
    // console.debug(i, x, y);
    if (images[puzzle[i]] !== undefined) {
      ctx.drawImage(images[puzzle[i]], x, y);
    }
  }

  /* draw grid */
  ctx.fillStyle = '#666';
  for (var i = 0; i <= N; i++) {
    ctx.beginPath();
    ctx.moveTo(i / N * canvas.width, 0);
    ctx.lineTo(i / N * canvas.width, canvas.height);
    ctx.moveTo(0, i / N * canvas.height);
    ctx.lineTo(canvas.width, i / N * canvas.height);
    ctx.stroke();
  }
}
