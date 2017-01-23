<html>
<head>
	<title>Dadad</title>
	
</head>
<body>
	<?php if($this->session->has_userdata('rank') && $this->session->rank == "admin"){ ?>
	<div class="adminEditPanel">
		<div class="editPanelRow editPanelHeader">
			Admin
		</div>
		<div class="editPanelRow" data-toggle="modal" data-target="#myModal">
			<span class="glyphicon glyphicon-trash"></span>
		</div>
		<div class="editPanelRow">
			<span class="glyphicon glyphicon-wrench"></span>
		</div>
	</div>
	<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-body">
				<center><span style="font-size: 16px;">Czy jesteś pewny usunięcia przedmiotu?</span></center>
			</div>
			<div class="modal-footer">
				<center>
					<form method="POST" action=<?= base_url().'usunoferte' ?>>
					<input type="hidden" name="offerId" value=<?= $query->id ?>>
					<input type="submit" class="btn btn-default" value="Tak">
					<button type="button" class="btn btn-default" data-dismiss="modal">Nie</button>
					</form>
				</center>
			</div>
			</div>
		</div>
		</div>
	<?php } ?>
	<div class="container">
		<?php if($this->session->has_userdata('opinion')) {?>
		<div class="alert alert-danger">
			<?= $this->session->opinion; ?>
		</div>
		<?php } ?>
		<?php if($this->session->has_userdata('opinion_success')) {?>
		<div class="alert alert-success">
			<?= $this->session->opinion_success; ?>
		</div>
		<?php } ?>
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
				<header class="clearbottom" id="opinie">OPINIE</header>
				<div class="opinion-box">
					
					<?php if($comments->num_rows() > 0 ){ ?>
					<?php foreach($comments->result() as $comment){ ?>
					<div class="opinion" id=<?= $comment->id ?>>
						<div class="opinion-user">
						<img src="http://vignette3.wikia.nocookie.net/the-enigma-corporation/images/0/01/Users-User-icon.png/revision/latest?cb=20140213102228" width="60px">
						<?= $comment->author; ?>
					</div>
					<div class="opinion-content">
						<div class="opinion-content-date"><?= date("Y-m-d H:i", $comment->date) ?></div>
						<div class="opinionRate">
							<i class="material-icons colorGreen">thumb_up</i>
							<i class="material-icons cursorPointer" onclick="hideComment(<?= $comment->id ?>, '<?= base_url() ?>')">delete</i>
						</div>
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
		<?php if($this->session->has_userdata('login')){ ?>
		<div class="row">
			<div class="col-sm-12">
				<form action=<?= base_url()."opinia/".$query->id ?> method="POST">
					<div class="form-group">
						<textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" style="float: right">Dodaj opinię</button>
					</div>
				</form>
			</div>
		</div>
		<?php }else{ ?>
			<i>Aby dodać opinie do produktu, musisz być zalogowany</i>
		<?php } ?>
		<div class="row">
			<div class="col-sm-12">
				<header>PODOBNE PRODUKTY</header>
				<?php for ($i=1; $i <=12 ; $i++) { ?>
			<div class="col-sm-4 col-md-3" style="padding: 5px;">
			<div class="product-data-box">
				<div class="product-data-photo">
					<img src="http://fitbay.pl/3228-3005-thickbox/skakanka-obciazenie-red-pump.jpg" width="100%">
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
		<form id="testForm2">
			<input type="text" name="text">
			<input type="submit" class="btn btn-primary" value="GO!">
		</form>
	</div>
</body>
</html>