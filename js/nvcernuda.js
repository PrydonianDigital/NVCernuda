jQuery(function() {
	jQuery("[data-menu-underline-from-center] a").addClass("underline-from-center");
	jQuery(window).scroll(function() {
		var winTop = jQuery(window).scrollTop();
		if (winTop >= 30) {
			jQuery('body').addClass('closed');
		} else{
			jQuery('body').removeClass('closed');
		}
	});
});