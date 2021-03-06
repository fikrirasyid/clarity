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
	$('.toggle-button').click(function(e){
		e.preventDefault();

		var target_id = $(this).attr( 'data-target-id' );

		$('div[data-target-id="'+target_id+'"], button[data-target-id="'+target_id+'"]').toggleClass('toggled');

		$('#'+target_id).toggleClass('toggled');
	});

});