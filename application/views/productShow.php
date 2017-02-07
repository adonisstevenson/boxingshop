<html>
<head>
	<title>Dadad</title>
	<script type="text/javascript">
   		var base_url = '<?= base_url() ?>';
		var offerID = <?= $query->id ?>;
	</script>
</head>
<body style="position: relative">
	<div class="darkBox"></div>
	<?php if($this->session->has_userdata('rank') && $this->session->rank == "admin"){ ?>
	<div class="adminEditPanel hidden-xs">
		<div class="editPanelRow editPanelHeader">
			Admin
		</div>
		<div class="editPanelRow" data-toggle="modal" data-target="#myModal">
			<span class="glyphicon glyphicon-trash"></span>
		</div>
		<div class="editPanelRow">
			<form action=<?= base_url().'edytujoferte' ?> method="POST">
				<input type="hidden" name="offer_id" value=<?= $query->id ?>>
			    <button type="submit" class="clearButtonElements"><span class="glyphicon glyphicon-wrench"></span></button>
			</form>
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
	<div class="container" style="position: relative">
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
		<?php if($this->session->has_userdata('edit_success')): ?>
		<div class="alert alert-success">
			<?= $this->session->edit_success; ?>
		</div>
		<?php endif; ?>
		<?php if($this->session->has_userdata('edit_error')): ?>
		<div class="alert alert-danger">
			<?= $this->session->edit_error; ?>
		</div>
		<?php endif; ?>
		<?php if($this->session->has_userdata('cart_success')): ?>
		<div class="alert alert-success">
			<?= $this->session->cart_success; ?>
		</div>
		<?php endif; ?>
		<?php if($this->session->has_userdata('cart_error')): ?>
		<div class="alert alert-danger">
			<?= $this->session->cart_error; ?>
		</div>
		<?php endif; ?>
		<header style="border-bottom: none; padding-left: 10px;"><?= $query->title ?></header>
		<div class="col-sm-5 product-photo" onclick="popupPhoto()">
			<img src=<?= $query->photo ?> width="100%" style="cursor: pointer">
		</div>
		<!-- popup window -->
		<div class="col-sm-7 col-sm-offset-2 popupPhoto">
			<div class="well">			
				<div class="popupPhotoHeader">
					<i class="material-icons" style="cursor: pointer" onclick="closePopupPhoto()">close</i>
				</div>
				<img src=<?= $query->photo ?> width="100%">
			</div>
		</div>
		<!-- popup window -->
		<div class="col-sm-7 product-data">
			<div class="well" style="position: relative">
				<div class="voteBox">
					<?php if(!get_cookie('has_voted_'.$query->id) || get_cookie('has_voted_'.$query->id)=='down'){ ?>
					<button class="voteButt" id="up" style="color: limegreen; width: 100%" onclick="voteUp()"><span class="glyphicon glyphicon-menu-up"> </span> </button>
					<?php }elseif(get_cookie('has_voted_'.$query->id) && get_cookie('has_voted_'.$query->id) == 'up'){ ?>
					<button class="voteButt" id="upDisabled" style="width: 100%"><span class="glyphicon glyphicon-menu-up"> </span> </button>
					<?php } ?>
					<span id="upvotes"> <?= $query->upvotes ?> </span>
					<span id="downvotes"> <?= $query->downvotes ?> </span>
					<?php if(!get_cookie('has_voted_'.$query->id) || get_cookie('has_voted_'.$query->id)=='up'){ ?>
					<button class="voteButt" id="down" style="color: red; width: 100%" onclick="voteDown()"><span class="glyphicon glyphicon-menu-down"> </span> </button>
					<?php }elseif(get_cookie('has_voted_'.$query->id) && get_cookie('has_voted_'.$query->id) == 'down'){ ?>
					<button class="voteButt" id="downDisabled" style="width: 100%"><span class="glyphicon glyphicon-menu-down"> </span> </button>
					<?php } ?>
					
					
				</div>
				<center><h2><?= $query->current_price."zł/szt." ?> <small><s><?= $query->previous_price ?></s></small></h2><small><?= $quantity ?> sztuk</small></center>
					<?php if($quantity>0){ ?>
						<div class="cart-flex">
							<i class="material-icons icon-large">add_shopping_cart</i>
							<form method="POST" action=<?= base_url()."do_koszyka" ?>>
								<input type="hidden" name="offer_id" value=<?= $query->id ?>>
								<input type="hidden" name="max_quantity" value=<?= $quantity ?>>
								<input type="text" name="quantity" class="cart-quantity form-control" value="1"></input><br><br>
								<input type="submit" class="btn btn-primary buttonWidth" value="+"></input>
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
						<img src=<?= base_url().'assets/usercomment.png' ?> width="55px">
						<?= $comment->author; ?>
					</div>
					<div class="opinion-content">
						<div class="opinion-content-date"><?= date("Y-m-d H:i", $comment->date) ?></div>
						<?php if($this->session->has_userdata('rank') && $this->session->rank = "admin"){ ?>
						<div class="opinionRate">
							<i class="material-icons cursorPointer" style="color:gray;" onclick="hideComment(<?= $comment->id ?>)">delete</i>
						</div>
						<?php } ?>
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
					<div class="form-group marginLeft">
						<textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" style="float: right">Dodaj opinię</button>
					</div>
				</form>
			</div>
		</div>
		<?php }else{ ?>
			<span style="padding-left:5px"> <i>Aby dodać opinie do produktu, musisz być zalogowany</i> </span>
		<?php } ?>
		<div class="row">
			<div class="col-sm-12">
				<header>PODOBNE PRODUKTY</header>
				<?php foreach ($similar->result() as $similar) { ?>
			<div class="col-sm-4 col-md-3 productList" style="padding: 5px;">
			<div class="product-data-box">
				<div class="product-data-photo">
					<img src=<?= $similar->photo ?> width="100%">	
					<?php if($similar->previous_price != NULL && $similar->previous_price > $similar->current_price){ ?>
					<div class="discount">
						<?= $similar->current_price-$similar->previous_price."zł" ?>
					</div>
					<?php } ?>
				</div>
				<a href=<?= base_url().'produkty/'.urlencode($similar->title) ?> style="text-decoration:none">
						<div class="product-data-title">
							
								<?= mb_strtoupper($similar->title, "UTF-8") ?>
							
						</div>
					</a>
			</div>
		</div>
		<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>