<html>
<head>
	<title>Dadad</title>
</head>
<body>
	<div class="container">
		<header style="border-bottom: none; padding-left: 10px;"><?= $query->title ?></header>
		<div class="col-sm-5 product-photo">
			<img src=<?= $query->photo ?> width="100%">
			<div class="product-photo-list">
				<div class="product-photo-list-element paddingright">
					<img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
				</div>
				<div class="product-photo-list-element paddingright">
					<img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
				</div>
				<div class="product-photo-list-element paddingright">
					<img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
				</div>
				<div class="product-photo-list-element paddingright">
					<img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
				</div>
				<div class="product-photo-list-element paddingleft">
					<img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
		<div class="col-sm-7 product-data">
			<div class="well">
				<center><h2><?= $query->current_price."zł/szt." ?> <small><s><?= $query->previous_price ?></s></small></h2></center>
					<?php if($quantity>0){ ?>
						<div class="cart-flex">
							<i class="material-icons icon-large">add_shopping_cart</i>
							<form>
								<input type="text" name="quantity" class="cart-quantity form-control" value="1"></input><br><br>
								<input type="submit" class="btn btn-primary" value="+"></input>
							</form>
							<div style="clear: both;"></div>
						</div>
						<?php }else{ ?>
							<center><i>Chwilowo brak produktów w magazynie</i></center><br>
							<?php } ?>
					<?= $query->description ?>
			</div>
		</div>
		
			<div class="row">
				<div class="col-sm-12">
				<header class="clearbottom">OPINIE</header>
				<div class="opinion-box">
					<?php if($comments->num_rows() > 0 ){ ?>
					<?php foreach($comments->result() as $comment){ ?>
					<div class="opinion">
						<div class="opinion-user">
						<img src="http://vignette3.wikia.nocookie.net/the-enigma-corporation/images/0/01/Users-User-icon.png/revision/latest?cb=20140213102228" width="60px">
						<?= $comment->author; ?>
					</div>
					<div class="opinion-content">
						<div class="opinion-content-date">10-01-2017</div>
						<?= $comment->comment; ?>
					</div>
					<div style="clear: both;"></div>
					</div>

					<?php }}else{ ?>
						<i>Nie ma żadnych opinii dla tego produktu</i>
					<?php } ?>
				</div>		
			</div>	
		</div>
		<div class="row">
			<div class="col-sm-12">
				<header>PODOBNE PRODUKTY</header>
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