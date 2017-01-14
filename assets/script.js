
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

$(document).ready(function(){
	
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrolltop').fadeIn();
		} else {
			$('.scrolltop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrolltop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
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
