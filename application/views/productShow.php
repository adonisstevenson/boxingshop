<html>
<head>
	<title>Dadad</title>
</head>
<body>
	<div class="container">
		<header style="border-bottom: none"><?= $query->title ?></header>
		<div class="col-sm-5 product-photo">
			<img src=<?= $query->photo ?> width="100%">
		</div>
		<div class="col-sm-7 product-data">
			<div class="well">
				<center><h2><?= $query->current_price."zł" ?> <small><s><?= $query->previous_price ?></s></small></h2></center>
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
	</div>
</body>
</html>