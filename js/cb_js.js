(function($){
	$(document).ready(function(){
	//First child show
	$('#accordion').children('.single_accordion:first-child').children('.accordion_content').slideDown();
	
	//first child add active class
	$('#accordion').children('.single_accordion:first-child').children('.accordion_hearder').addClass('accordion_active');
	
	//Main Accordion
	$('.accordion_hearder').click(function(){
		//Accordion Content Toggle Slide
		$(this).next('.accordion_content').slideToggle();
		//add class
		$(this).toggleClass('accordion_active');
		
		//When click any accordion other content slide up.
		$(this).parents('.single_accordion').siblings().children('.accordion_content').slideUp();
		
		//Active class remove other accordion header
		$(this).parents('.single_accordion').siblings().children('.accordion_hearder').removeClass('accordion_active');
		
	});
	
})
	
	
	
})(jQuery);