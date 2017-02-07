
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
			});
		}


}

function hideComment(id){
	$('#'+id).fadeOut(250);
	console.log(url);	
	var jqxhr = $.get( base_url+"usunkomentarz/"+id, function (data){
		if(data!=''){
			alert(data);
		}
	});
  
}
	$(document).ready(function(){
			setTimeout(function() {
				$('.productList').css('opacity', '1');
			}, 10);
		});



function getCartItems(url){
	$.get( url+"koszyk_lista", function( data ) {
		$( ".modal-body" ).html( data );
	});
}
function delSelected(url){
	var checked = [];
	$("input:checkbox[name=check]:checked").each(function(){
		checked.push($(this).val());
	});

	var jsonString = JSON.stringify(checked);

	$.ajax({
		type: "POST",
		url: url+'koszyk_usun',
		data: {data:jsonString},
		error: function(response) { alert(response) },
		success: function(response) {
			 alert(response);
		}
	});

}

function popupPhoto(){
	var popupPosition = $('.popupPhoto').position();
	var popupTop = popupPosition.top;
	console.log(popupTop);

	$('html, body').animate({scrollTop: 100 });

	$('.darkBox').css('display', 'block');
	$('.popupPhoto').css('display', 'block').animate({opacity: '1'}, 100);
	
}
function closePopupPhoto(){
	$('.popupPhoto').animate({opacity: '0'}, 100, function(){
		$('.darkBox').css('display', 'none');
		$('.popupPhoto').css('display', 'none');
	});
}
function delTodo(id, url){
	console.log(id);
	$.get( url+"usun_todo/"+id, function( data ) {
		if(data!=1){
			alert("Wystąpił błąd, nie udało się usunąć danych z bazy");
		}else{
			$('#todo-'+id).fadeOut(100);
		}
	}).fail(function() {
    alert( "Wystąpił nieznany błąd");
  	});
	
	
}

//$('.cart').click(function(){
	
	//$('.modal-body').load( "assets/load/Cart.php");
//});

$('#testForm').submit(function(event){
	event.preventDefault();

	var data = $(this).serialize();

	$.post( "http://localhost/boxingshop/testform", data)
			.done(function( response ) {
			console.log( "Data Loaded: " + response );
		}).fail(function(){
			alert("error");
		});
});//1st way

$('#testForm2').submit(function(event){
	event.preventDefault();

	var data = $(this).serialize();

	$.ajax({
		type: "POST",
		url: 'http://localhost/boxingshop/testform',
		data: data,
		error: function() { alert('Error'); },
		success: function(response) {
			 var responses = jQuery.parseJSON(response);

			 console.log('Success '+ responses.one); 
			
		}
	});
});//2nd way
function addComment(offerId){
	console.log(offerId);
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
			});
		}

}

var mlSecondsToSlide = 5000;

function slideright(){
		mlSecondsToSlide = 5000;

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
	mlSecondsToSlide= 5000;
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

setInterval(function(){
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
}, mlSecondsToSlide);

var showed = false;

$('#navUser').click(function(){
	if(showed==false){ // then show
		showed=true;
		showForm();
	}else{
		showed = false;
		hideForm();
	} 

	console.log(showed);
});

function showForm(){
	$('.navUserForm').css('height', '2px').css('display', 'block');
	$('.navUserForm').animate({height: '110px'}, 100);
}

function hideForm(){
	$('.navUserForm').animate({height: '5px'}, 100, function(){
		$('.navUserForm').css('display', 'none');
	});
}

var navShowed = false;

$('#mobNav').click(function(){
	if(navShowed == false){
		$('.mobileNav').css('height', '10px').css('display', 'block');
		$('.mobileNav').animate({height: '185px'}, 200);
		navShowed = true;
	}else if(navShowed == true){
		$('.mobileNav').animate({height: '10px'}, 200, function(){
			$('.mobileNav').css('display', 'none');
		});
		navShowed = false;
	}
});

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

function voteUp(){
		var upVotes = parseInt($('#upvotes').text());
		var downVotes = parseInt($('#downvotes').text());
	$.get( base_url+"vote_up/"+offerID, function( data ) {
		if(data==1){
			$('#upvotes').html(upVotes+1);
			$( "#up" ).replaceWith( '<button class="voteButt" id="upDisabled" style="width: 100%"><span class="glyphicon glyphicon-menu-up"> </span> </button>' );
		}else if(data==0){
			downVotes = downVotes-1;
			$('#downvotes').html(downVotes);
			$( "#downDisabled" ).replaceWith( '<button class="voteButt" id="down" style="width: 100%; color: red" onclick="voteDown()"><span class="glyphicon glyphicon-menu-down"> </span> </button>' );
		}
	}).fail(function() {
    alert( "Wystąpił nieznany błąd");
  	});
}
function voteDown(){
		var upVotes = parseInt($('#upvotes').text());
		var downVotes = parseInt($('#downvotes').text());

	$.get( base_url+"vote_down/"+offerID, function( data ) {
		if(data==1){
			$('#downvotes').html(downVotes+1);
			$( "#down" ).replaceWith( '<button class="voteButt" id="downDisabled" style=" width: 100%"><span class="glyphicon glyphicon-menu-down"> </span> </button>' );
		}else if(data==0){
			upVotes = upVotes-1;
			$('#upvotes').html(upVotes);
			$( "#upDisabled" ).replaceWith( '<button class="voteButt" id="up" style="width: 100%; color: limegreen" onclick="voteUp()"><span class="glyphicon glyphicon-menu-up"> </span> </button>' );
		}
	}).fail(function() {
    alert( "Wystąpił nieznany błąd");
  	});
}
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