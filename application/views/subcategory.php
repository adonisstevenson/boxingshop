<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div class="container">
		<div class="row">
				<div class="well">
				<header class="clearborder">PODKATEGORIE</header>
				<?php if($category == 'training'){ ?>
					<div class="col-md-3 col-sm-4" style="padding: 5px;">
					<div class="product-data-box">
						<div class="category-data-title">
							RĘKAWICE
						</div>
						<div class="product-data-photo clearborder">
							<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="85%">
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4" style="padding: 5px;">
					<div class="product-data-box">
						<div class="category-data-title">
							RĘKAWICE
						</div>
						<div class="product-data-photo clearborder">
							<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="85%">
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4" style="padding: 5px;">
					<div class="product-data-box">
						<div class="category-data-title">
							BANDAŻE BOKSERSKIE
						</div>
						<div class="product-data-photo clearborder">
							<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="85%">
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4" style="padding: 5px;">
					<div class="product-data-box">
						<div class="category-data-title">
							TAŚMY I AKCESORIE
						</div>
						<div class="product-data-photo clearborder">
							<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="85%">
						</div>
					</div>
				</div>
				<?php }elseif($category == "defense"){ ?>

					<div class="col-md-3 col-sm-4" style="padding: 5px;">
						<div class="product-data-box">
							<div class="category-data-title">
								SUSPENSORY
							</div>
							<div class="product-data-photo clearborder">
								<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="85%">
							</div>
						</div>
					</div>
				<?php }elseif($category == "shoes"){ ?>
					<div class="col-md-3 col-sm-4" style="padding: 5px;">
						<div class="product-data-box">
							<div class="category-data-title">
								BUTY BOKSERSKIE
							</div>
							<div class="product-data-photo clearborder">
								<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="85%">
							</div>
						</div>
					</div>
				<?php }elseif($category == "clothes"){ ?>
					<div class="col-md-3 col-sm-4" style="padding: 5px;">
						<div class="product-data-box">
							<div class="category-data-title">
								RUSHGUARDY
							</div>
							<div class="product-data-photo clearborder">
								<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="85%">
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4" style="padding: 5px;">
						<div class="product-data-box">
							<div class="category-data-title">
								BLUZY
							</div>
							<div class="product-data-photo clearborder">
								<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="85%">
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4" style="padding: 5px;">
						<div class="product-data-box">
							<div class="category-data-title">
								SPODENKI TRENINGOWE
							</div>
							<div class="product-data-photo clearborder">
								<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="85%">
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4" style="padding: 5px;">
						<div class="product-data-box">
							<div class="category-data-title">
								CZAPKI
							</div>
							<div class="product-data-photo clearborder">
								<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="85%">
							</div>
						</div>
					</div>
				<?php } ?>
				<div style="clear: both;"></div>
			</div>
		</div>
		<div class="row">
			<header>POLECANE W TEJ KATEGORII</header>
			<?php foreach($productsCategory->result() as $product){ ?>
			<div class="col-sm-4 col-md-3" style="padding: 5px;">
			<div class="product-data-box">
				<div class="product-data-photo">
					<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="85%">
				</div>
				<div class="product-data-title">
					<?= strtoupper($product->title) ?>
				</div>
			</div>
		</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>