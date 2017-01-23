<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div class="container">
		<div class="row">
				<?php if($category == 'training'){ ?>
				<div class="col-sm-4 category-box">
						<img src="http://efabrykamocy.pl/userdata/gfx/cdf2bc18b08fffcfe2e1d63e2b2e26a4.jpg" width="100%">
						<div class="category-title">
							RĘKAWICE
						</div>
				</div>
				<div class="col-sm-4 category-box">
						<img src="http://fitfight.pl/pol_pl_Skakanka-bokserska-stalowa-260-cm-1857_2.jpg" width="100%">
						<div class="category-title">
							SKAKANKI
						</div>
				</div>
				<div class="col-sm-4 category-box">
						<img src="http://www.gopower.pl/3517-home_default/cm04-niebiesko-szary-ciezarki-miekkie-2-x-1-kg.jpg" width="100%">
						<div class="category-title">
							CIĘŻARKI
						</div>
				</div>
				<?php }elseif($category == "defense"){ ?>
					<div class="col-sm-4 category-box">
						<img src="http://disport.pl/10025-17469-thickbox/pojedynczy-ochraniacz-na-zeby-allright.jpg" width="100%">
						<div class="category-title">
							SZCZĘKI
						</div>
					</div>
					<div class="col-sm-4 category-box">
						<img src="http://image.ceneo.pl/data/products/31186754/i-adidas-suspensor-ochraniacz-krocza-pu3g-adibp05.jpg" width="100%">
						<div class="category-title">
							SUSPENSORIUM
						</div>
					</div>
					<div class="col-sm-4 category-box">
						<img src="http://mmaniak.pl/7270-thickbox_default/venum-ochraniacze-piszczelistopy-kontact.jpg" width="100%">
						<div class="category-title">
							PISZCZELE
						</div>
					</div>
					<div class="col-sm-4 category-box">
						<img src="http://rowerowy.interbikes.eu/file/46244/fox-ochraniacz-kolana-launch-pro-knee-junior.jpg" width="100%">
						<div class="category-title">
							KOLANA
						</div>
					</div>
				<?php }elseif($category == "shoes"){ ?>
					<div class="col-sm-4 category-box">
						<img src="http://rowerowy.interbikes.eu/file/46244/fox-ochraniacz-kolana-launch-pro-knee-junior.jpg" width="100%">
						<div class="category-title">
							BUTY BOKSERSKIE
						</div>
					</div>
				<?php }elseif($category == "clothes"){ ?>
					<div class="col-sm-4 category-box">
						<img src="http://rowerowy.interbikes.eu/file/46244/fox-ochraniacz-kolana-launch-pro-knee-junior.jpg" width="100%">
						<div class="category-title">
							RUSHGUARDY
						</div>
					</div>
					<div class="col-sm-4 category-box">
						<img src="http://rowerowy.interbikes.eu/file/46244/fox-ochraniacz-kolana-launch-pro-knee-junior.jpg" width="100%">
						<div class="category-title">
							BLUZY
						</div>
					</div>
					<div class="col-sm-4 category-box">
						<img src="http://rowerowy.interbikes.eu/file/46244/fox-ochraniacz-kolana-launch-pro-knee-junior.jpg" width="100%">
						<div class="category-title">
							CZAPKI
						</div>
					</div>
				<?php } ?>
				<div style="clear: both;"></div>
		</div>
		<div class="row">
			<header>POLECANE W TEJ KATEGORII</header>
			<?php foreach($productsCategory->result() as $product){ ?>
			<div class="col-sm-4 col-md-3" style="padding: 5px;">
			<div class="product-data-box">
				
					<div class="product-data-photo">
						<img src=<?= $product->photo ?> width="80%">
					</div>
					<div class="product-data-title">
						<a href=<?= base_url().'produkty/'.urlencode($product->title) ?>>
							<?= strtoupper($product->title) ?>
						</a>
					</div>
				
			</div>
		</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>