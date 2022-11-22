<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/fotosvideos.css">
</head>
<body>
	<div>
		<h1 style="color: goldenrod; text-align: center;">
			<strong> Areas Comunes y Màs</strong>
		</h1>
	</div>
	<section >
		<video id="slider" autoplay muted loop>
			<source src="img/1.mp4" type="video/mp4">		

		</video>
	
	<ul class="navegacion">
		<li onclick="cargarVideo('img/1.mp4');">
			<img src="img/1video.jpg">
		</li>
		<li onclick="cargarVideo('img/2.mp4');">
			<img src="img/2video.jpg">
		</li>
		<li onclick="cargarVideo('img/3.mp4');">
			<img src="img/3video.jpg">
		</li>
	</ul>

	</section>
</body>
<script type="text/javascript">
	function cargarVideo(url){
		document.getElementById('slider').src=url;
	}	
</script>
</html>