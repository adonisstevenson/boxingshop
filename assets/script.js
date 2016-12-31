var slide = 2;

function slideright(){

$('#slide-2').css('left', '-100%');
$('#slide-3').css('display', 'none');
$('#slide-1').animate({left:'100%'}, 1000);
$('#slide-2').animate({left:'0'}, 1000);

}