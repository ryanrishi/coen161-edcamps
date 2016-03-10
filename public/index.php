<?php
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
<div class="container container-fluid">
	<img id="edcamps" src="edcamps.jpg" alt="edcamps";>
	<section id="misison">
		<p>Edcamps provides an educational journey for children aged 10-14 through fun, critical thinking, and creativity.</p>
	</section>
	<section id="overview">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<h2>Overview</h2>
				<p>Edcamps Inc was created to foster a child’s love of learning. During their time at camp, students will participate
					in a variety of outdoor activities such as kayaking, swimming, tennis, soccer, and more! Through these activities
					the children develop relationships with one another, decision-making skills, and engage in physical activity.</p>
					<p>Not only will your children participate in outdoor activities, but in computer-based activities as well. We teach
						over 20 STEM courses in programming, video game design, robotics, and web design.</p>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<img id="kids" alt="kids" src="kids.jpg"/>
					</div>
				</section>
				<section id="location">
					<h2>Locations</h2>
					<ul>
						<li>Portland, OR</li>
						<p></p>
						<li>Santa Clara, CA</li>
						<p></p>
						<li>Chicago, IL</li>
						<p></p>
						<li>Atlanta, GA</li>
						<p></p>
						<li>New York, NY</li>
						<p></p>
					</ul>
				</section>
				<div id="map"></div>
				<script type="text/javascript" language="javascript">
				function initMap() {
					var mapDiv = document.getElementById('map');
					var map = new google.maps.Map(mapDiv, {
						center: {lat: 41.83682804465982, lng: -95.36132850000001},
						zoom: 4
					});
					var santaclara = new google.maps.Marker({map: map,position: new google.maps.LatLng(37.3541079,-121.95523559999998)});
					var chicago = new google.maps.Marker({map: map,position: new google.maps.LatLng(41.8781136,-87.62979819999998)});
					var portland = new google.maps.Marker({map: map,position: new google.maps.LatLng(45.5230622,-122.67648159999999)});
					var newyork = new google.maps.Marker({map: map,position: new google.maps.LatLng(40.7127837,-74.00594130000002)});
					var atlanta = new google.maps.Marker({map: map,position: new google.maps.LatLng(33.7489954,-84.3879824)});
				}
				</script>
				<script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
			</div>
			<?php require_once(TEMPLATES_PATH . "/footer.php");
