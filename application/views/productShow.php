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
				<div class="product-photo-list-element">
					<img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
				</div>
				<div class="product-photo-list-element">
					<img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
				</div>
				<div class="product-photo-list-element">
					<img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
				</div>
				<div class="product-photo-list-element">
					<img src="http://seka-sports.com/image/cache/data/ADIBT01-RD-1-500x500.jpg" width="100%">
				</div>
				<div class="product-photo-list-element">
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
								<input type="text" name="quantity" class="cart-quantity form-control" value="1"></input>
								<input type="submit" class="btn btn-primary" value="Do koszyka"></input>
							</form>
							<div style="clear: both;"></div>
						</div>
						<?php }else{ ?>
							<center><i>Chwilowo brak produktów w magazynie</i></center><br>
							<?php } ?>
					<?= $query->description ?>
			</div>
		</div>
		<div class="col-sm-12">
			<header class="clearbottom">OPINIE</header>
			<div class="opinion-box">
				<div class="opinion">
					<div class="opinion-user">
					<img src="http://vignette3.wikia.nocookie.net/the-enigma-corporation/images/0/01/Users-User-icon.png/revision/latest?cb=20140213102228" width="60px">
					Adonis
				</div>
				<div class="opinion-content">
					<div class="opinion-content-date">10-01-2017</div>
					uważem, że uważem, że uważem, że uważem, że uważem, że uważem, że uważem, że uważem, że uważem, że uważem, że uważem, że
				</div>
				<div style="clear: both;"></div>
				</div>
				<div class="opinion">
					<div class="opinion-user">
					<img src="http://vignette3.wikia.nocookie.net/the-enigma-corporation/images/0/01/Users-User-icon.png/revision/latest?cb=20140213102228" width="60px">
					Adonis
				</div>
				<div class="opinion-content">
					<div class="opinion-content-date">10-01-2017</div>
					uważem, że uważem, że uważem, że uważem, że uważem, że uważem, że uważem, że uważem, że uważem, że uważem, że uważem, że
					fsdf asd asdasdsa dsad sad sad 
				</div>
				<div style="clear: both;"></div>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>