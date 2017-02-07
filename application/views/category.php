<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div class="container">

		<div class="row relativeRow">
        <header>Produkty w dziale <?= $subcategory ?></header>
        <div class="col-sm-12 sortMenu">
            <span style="color: gray;float: left">Sortuj wg. </span>
            <form style="float: left">
                <select name="sortby" onchange="this.form.submit();">
                    <option>Domyślnie</option>
                    <optgroup label="cena">
                        <option value="current_price">rosnąco</option>
                        <option value="current_price desc">malejąco</option>
                    </optgroup>
                    <optgroup label="marka">
                        <option value="title">najpopularniejsze</option>
                        <option value="title desc">najwyżej oceniane</option>
                    </optgroup>
                    <optgroup label="alfabetycznie">
                        <option value="title">A-Z</option>
                        <option value="title desc">Z-A</option>
                    </optgroup>
                    
                </select>
            </form>
            <div style="clear: both"></div>
        </div>
			<?php foreach($offers->result() as $product){ ?>
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