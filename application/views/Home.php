
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>
<body>	
<div class="container slider-box">
	<div class="slider">
		<div class="arrow arrow-right" onclick="slideright()">
			<i class="material-icons" style="font-size: 60px">keyboard_arrow_right</i>
		</div>
		<div class="arrow arrow-left" onclick="slideleft()">
			<i class="material-icons" style="font-size: 60px">keyboard_arrow_left</i>
		</div>
		<div class="slide slide-1">
			1
		</div>
		<div class="slide slide-2">
			2
		</div>
		<div class="slide slide-3">
			3
		</div>
		<div class="slide slide-4">
			4
		</div>
</div>
<div class="container-fluid" style="background-color: #f6f6f6;">
	<div class="container">
	<div class="row">
	<header>PROMOCJE</header>
		<?php for ($i=1; $i <=12 ; $i++) { ?>
			<div class="col-sm-4 col-md-3" style="padding: 5px;">
			<div class="product-data-box">
				<div class="product-data-photo">
					<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="100%" height="120%">
					<div class="discount">
					-5%
					</div>
				</div>
				<div class="product-data-title">
					RĘKAWICE BOKSERSKIE ADIDAS PRO AIR
				</div>
			</div>
		</div>
		<?php } ?>
		
	</div>

</div>
</div>

<div class="container-fluid" style="background-image: url(<?= base_url().'assets/background-second.png' ?>); padding-bottom: 10px;">
	<div class="container">
		<div class="row">
			<header style="color: #F6F6F6">NOWOŚCI W MAGAZYNACH</header>

			<?php for ($i=1; $i <=12 ; $i++) { ?>
			<div class="col-sm-4 col-md-3" style="padding: 5px;">
			<div class="product-data-box">
				<div class="product-data-photo">
					<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="100%" height="120%">
					<div class="discount">
					-5%
					</div>
				</div>
				<div class="product-data-title">
					RĘKAWICE BOKSERSKIE ADIDAS PRO AIR
				</div>
			</div>
		</div>
		<?php } ?>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="container">
		<img src="https://scontent-waw1-1.xx.fbcdn.net/v/t31.0-8/12314276_10153224858400205_5321206216073306625_o.jpg?oh=7905170b002fd7174f7d72f64ad322e8&oe=58E6E630" width="100%">
	</div>
</div>
<div class="container-fluid" style="background-image: url(<?= base_url().'assets/background-third.png' ?>); ; padding-bottom: 10px;">
	<div class="container">
		<div class="row">
			<header style="color: #F6F6F6">REKOMENDOWANE WŚRÓD KLIENTÓW</header>

			<?php for ($i=1; $i <=12 ; $i++) { ?>
			<div class="col-sm-4 col-md-3" style="padding: 5px;">
			<div class="product-data-box">
				<div class="product-data-photo">
					<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="100%" height="120%">
					<div class="discount">
					-5%
					</div>
				</div>
				<div class="product-data-title">
					RĘKAWICE BOKSERSKIE ADIDAS PRO AIR
				</div>
			</div>
		</div>
		<?php } ?>
		</div>
	</div>
</div>
</body>
</html>