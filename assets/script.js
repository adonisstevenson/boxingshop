
var slide = 2; // first slide

function moveforward(current, next){
		var left = $('.slide-'+current).css('left');

		if(left == '0px'){ // if previous slide will be on right place (not in way);
			$('.slide-'+next).css('left', '-100%').css('display', 'block');
			$('.slide-'+next).animate({left: '0%'}, 400);
			$('.slide-'+current).animate({left: '100%'}, 400, function(){ //do when animation will be complete
			$('.slide-'+current).css('display', 'none');
				if(slide==8) slide=2;
				else slide+=2;

				console.log(slide);
			});
		}


}
$('.scrolltop').click(function(){
		$('html, body').animate({scrollTop : 0},300);
		return false;
	});

$(document).ready(function() {
var stickyNavTop = $('.scrolltop').offset().top;
var windowHeight = $(window).height();
var stickyButton = function(){
var scrollTop = $(window).scrollTop();
    if(scrollTop > windowHeight/2){
		$('.scrolltop').fadeIn();
	}else if(scrollTop < windowHeight/2){
		$('.scrolltop').fadeOut();
	}
    $('.scrolltop').addClass('sticky');

};
 
stickyButton();
 
$(window).scroll(function() {
  stickyButton();
});
});

function movebackward(current, next){
		var left = $('.slide-'+current).css('left');

		if(left == '0px'){ // if previous slide will be on right place (not in way);
			$('.slide-'+next).css('left', '100%').css('display', 'block');
			$('.slide-'+next).animate({left: '0%'}, 400);
			$('.slide-'+current).animate({left: '-100%'}, 400, function(){ //do when animation will be complete
			$('.slide-'+current).css('display', 'none');
				if(slide==-1) slide=2;
				else slide-=1;

				console.log(slide);
			});
		}

}

function slideright(){
		if(slide==-1){
			slide=4;
		}

		if(slide==0){
			slide=6;

		}

		if(slide==1){
			slide=8;

		}

		if(slide==2){ // from first to second slide
			
			moveforward(1, 2);

		}

		if(slide==4){ //from second to third slide
			
			moveforward(2, 3);
			
		}

		if(slide==6){ //from second to third slide
			
			moveforward(3, 4);
			
		}

		if(slide==8){

			moveforward(4, 1);

		}
	}
	


function slideleft(){
	if(slide==4){
		slide=-1
	}

	if(slide==6){
		slide=0
	}

	if(slide==8){
		slide=1;
	}

	if(slide==2){

		movebackward(1, 4);
	}

	if(slide==1){

		movebackward(4, 3);
	}

	if(slide==0){
		movebackward(3, 2);
	}

	if(slide==-1){

		movebackward(2, 1);
	}

}
var clickedOnUser = 0;
$('#navUser').click(function(){
	if(clickedOnUser==0){ // if form is closed
		OpenForm();
		clickedOnUser=1; //tel JS that user has form opened 
	}else{ // if form is opened
		CloseForm();
		clickedOnUser=0; //tel JS that user has form closed
	}
	
});

function OpenForm(){
		$('#navSearch').css('display', 'none');
		$('.navUserForm').css('display', 'block');
		$('.fixWidth').animate({width: '150px'}, 150);
		$('.navFormButton').animate({width: '65px'}, 150);

		
}
function CloseForm(){
	$('.fixWidth').animate({width: '0px'}, 150);
	$('.navFormButton').animate({width: '0px'}, 150, function(){
		$('#navSearch').css('display', 'block');
		$('.navUserForm').css('display', 'none');
	});

	
}

$('#navSearch').click(function(){
	alert("user clicked");
});
tinymce.init({
    selector: "textarea",
    setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    }
});
function testVal(){
	tinyMCE.triggerSave();
	$('.showOfferView').css('display', 'block');

	var photo = $('#offerPhoto').val();
	var title = $('#offerTitle').val();
	var price = $('#offerPrice').val();
	var description = $('#offerDescription').val();

	console.log($('#offerDescription').val());
	if(photo=='') $('.offerPhoto').html("<img src=" + "http://image.ceneo.pl/data/products/31635712/i-everlast-profesjonalne-rekawice-bokserskie-141-black.jpg" + " width=100%>");
	else $('.offerPhoto').html("<img src=" + photo + " width=100%>");
	if(price == '')	$('.offerPrice').html(0+" PLN");	
	else $('.offerPrice').html(price+" PLN");	
	if(title=='') $('#offerTitleEx').html("Tytuł oferty");
	else $('#offerTitleEx').html(title);
	if(description=='') $('.offerDescription').html("Opis oferty");
	else $('.offerDescription').html(description);
}