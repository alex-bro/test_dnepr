$(document).ready(function(){
	$('.portfolio-box').mouseout(function(){$(this).find('span').css('display', 'none');
		$(this).find('img').css('opacity', '0.40','background','#979797');

});
	$('.portfolio-box').mouseover(function(){$(this).find('span').css('display', 'block')
		$(this).find('img').css('opacity', '0.95','background','#495259');
});
})