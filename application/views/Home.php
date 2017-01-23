
<html>
<head>

</head>
<body>
	<?php if($this->session->has_userdata('deleteOffer')){ ?>
		<div class="container">
			<div class="alert alert-success">
				<?= $this->session->deleteOffer; ?>
			</div>
		</div>
	<?php } ?>
<div class="container slider-box">
	<div class="slider">
		<button class="arrow arrow-right" onclick="slideright()">
			<i class="material-icons" style="font-size: 60px">keyboard_arrow_right</i>
		</button>
		<button class="arrow arrow-left" onclick="slideleft()">
			<i class="material-icons" style="font-size: 60px">keyboard_arrow_left</i>
		</button>
		<div class="slide slide-1">
			<img src="http://www.artsfon.com/pic/201511/2560x1440/artsfon.com-76912.jpg" width="100%" alt="">
		</div>
		<div class="slide slide-2">
			<img src="https://i.ytimg.com/vi/FvcMVmb3MIg/maxresdefault.jpg" width="100%" alt="">
		</div>
		<div class="slide slide-3">
			<img src="http://media.gettyimages.com/photos/professional-heavyweight-boxer-anthony-joshua-is-photographed-for-picture-id511141526?s=594x594" width="100%" alt="">
		</div>
		<div class="slide slide-4">
			<img src="http://i2.liverpoolecho.co.uk/incoming/article6358662.ece/ALTERNATES/s1227b/4296829.jpg" width="100%" alt="">
		</div>
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
					<img src="http://image.ceneo.pl/data/products/31635712/i-everlast-profesjonalne-rekawice-bokserskie-141-black.jpg" width="80%">
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

<div class="container-fluid" style="background-image: url(<?= base_url().'assets/background-second.png' ?>); padding-bottom: 10px; z-index:1;">
	<div class="container">
		<div class="row">
			<header style="color: #F6F6F6">NOWOŚCI W MAGAZYNACH</header>

			<?php for ($i=1; $i <=12 ; $i++) { ?>
			<div class="col-sm-4 col-md-3" style="padding: 5px;">
			<div class="product-data-box">
				<div class="product-data-photo">
					<img src="http://image.ceneo.pl/data/products/31635712/i-everlast-profesjonalne-rekawice-bokserskie-141-black.jpg" width="80%">
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
					<img src="http://image.ceneo.pl/data/products/31635712/i-everlast-profesjonalne-rekawice-bokserskie-141-black.jpg" width="80%">
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