<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div class="container">
		<div class="row">
				<?php foreach($subCategories->result() as $subCategory){ ?>
				<div class="col-sm-4 col-xs-12 category-box">
						<img src=<?= $subCategory->photo ?> width="100%">
						<div class="category-title">
							<?= mb_strtoupper($subCategory->subcategory, "UTF-8") ?>
						</div>
				</div>
				<?php } ?>
		</div>
		<div class="row relativeRow">
			<header>POLECANE W TEJ KATEGORII</header>
			<?php foreach($productsCategory->result() as $product){ ?>
			<div class="col-sm-4 col-md-3 productList" style="padding: 5px;">
			<div class="product-data-box">
				
					<div class="product-data-photo">
						<img src=<?= $product->photo ?> width="100%">
					</div>
					<a href=<?= base_url().'produkty/'.urlencode($product->title) ?> style="text-decoration:none">
						<div class="product-data-title">
							
								<?= mb_strtoupper($product->title, "UTF-8") ?>
							
						</div>
					</a>		
			</div>
		</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>