<?php
require_once('../resources/config.php');
require_once(TEMPLATES_PATH . '/header.php');
?>
<div class="container container-fluid">
  <h1>3D Pong</h1>
  <hr>
  <div class="row">
    <canvas id="canvas" width="800" height="800">Your broswer does not support HTML Canvas.</canvas>
    <p id="output"></p>

    <script type="text/javascript">
    $(document).ready(function() {
      var canvas = document.getElementById("canvas");
      var px = 0;
      var pz = 0;
      var dx = 1+ Math.random() % 10;
      var dy = 1 + Math.random() % 10;
      var dz = 1 + Math.random() % 10;

      canvas.addEventListener('mousemove', function(event)   {
        px = Math.min(event.pageX + 0.3*pW, canvas.width - 0.5*pW);
        pz = Math.min(event.pageY + 0.3*pD, canvas.height - 0.5*pD);
        pad.position.x=px;
        pad.position.z=pz;
      });

      var box, light;
      var geometry, material;

      var width = 300,
      height = 300;

      var view_angle = 45,
      aspect = width / height,
      near = 0.1,
      far = 1000;

      var renderer = new THREE.WebGLRenderer({canvas: canvas});
      var camera = new THREE.PerspectiveCamera(view_angle, aspect, near, far);
      var scene = new THREE.Scene();

      scene.add(camera);

      var look = new THREE.Vector3(width/2, 75, 0);

      camera.position.z = 650;
      camera.position.y = width;
      camera.position.x = width/2;
      camera.lookAt(look);


      renderer.setSize(width, height);

      document.body.appendChild(renderer.domElement);

      var radius = 10,
      segments = 16,
      rings = 16;


      var sphereMaterial = new THREE.MeshBasicMaterial({
        color: 0xCC0000
      });

      var sphere = new THREE.Mesh(new THREE.SphereGeometry(radius, segments, rings), sphereMaterial);
      sphere.position.x = width/2;
      sphere.position.y = width/2;
      scene.add(sphere);

      var boxMaterial = new THREE.MeshBasicMaterial({
        color: 0x00CC00, wireframe:true
      });

      var faces = [
        {color: 0x00CC00, wireframe:false},
        {color: 0x00CC00, wireframe:false},
        {color: 0x00CC00, wireframe:false},
        {color: 0x00CC00, wireframe:false},
        {color: 0x000000, wireframe:false},
        {color: 0x00CC00, wireframe:false}
      ];

      var box = new THREE.Mesh(new THREE.BoxGeometry(width, width, width), boxMaterial);
      box.position.x = width/2;
      box.position.y = width/2;
      box.position.z = width/2;

      //-------Paddle-----
      var pW = 100;
      var pH = 4;
      var pD = 100;

      var pMaterial = new THREE.MeshBasicMaterial({
        color: 0xFF0000
      });

      var pad = new THREE.Mesh(new THREE.BoxGeometry(pW, pH, pD), pMaterial);
      pad.position.y = 0;
      pad.position.z = pz;
      pad.position.x = px;
      scene.add(pad);

      scene.add(box);

      function irand() {
        var v = Math.floor(Math.random() * 256).toString(16);
        return v;
      }

      function update() {
        sphere.position.x += dx;
        if (sphere.position.x > canvas.width || sphere.position.x < 0) {
          dx = - Math.sign(dx) * (1 + Math.random() % 10);
          color = "#"+irand()+irand()+irand();

        }
        sphere.position.z += dz;
        if (sphere.position.z > canvas.width || sphere.position.z < 0) {
          dz = - Math.sign(dz) * (1 + Math.random() % 10);
          color = "#"+irand()+irand()+irand();

        }

        sphere.position.y += dy;
        if (sphere.position.y > height) {
          dy = - Math.sign(dy) * (1 + Math.random()%10);
          color = "#"+irand()+irand()+irand();
        }

        else if (sphere.position.y <= 2) {
          if (sphere.position.x >= pad.position.x - 50 && sphere.position.x <= pad.position.x + 50
            && sphere.position.z >= pad.position.z - 50 && sphere.position.z <= pad.position.z + 50) {
              dy = - Math.sign(dy) * (1 + Math.random() % 10);
              color = "#"+irand()+irand()+irand();
            }
            else {
              clearInterval(alarm);
            }

          }
          renderer.render(scene, camera)
        }
        var alarm = setInterval(update, 10);
        var color = "#FF0000";
        renderer.render(scene, camera);
      });
      </script>
      <script src="../resources/lib/js/three.min.js"></script>
    </div>
  </div>
  <?php require_once(TEMPLATES_PATH . '/footer.php'); ?>
