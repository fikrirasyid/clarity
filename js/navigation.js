jQuery(document).ready(function($){
	/**
	 * Main navigation desktop UX
	 */
	$('.main-navigation li').hover(
		function(){
			$(this).addClass('hovered');
		},
		function(){
			$(this).removeClass('hovered');
		}
	);	

	/**
	 * Mobile toggle main navigation UX
	 */
	$('.menu-toggle').click(function(e){
		e.preventDefault();

		var target_id = $(this).attr( 'data-target-id' );

		$('#'+target_id).toggleClass('toggled');
	});

});