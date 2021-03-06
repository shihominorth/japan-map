/**
 *	@package patricia
 *	@since 1.0
 */
(function($){
	"use strict";	
    $(document).ready(function() {
            
        if ( $('.post').length ) { $('.post').fitVids(); }
            
        if ( $('select').length ) { $('select').chosen(); }
		$(".woocommerce-checkout select").chosen("destroy");

		// Toggle menu
		$('.mobile-menu .menu-item-has-children .submenu-toggle').click(function() {
			$(this).next().slideToggle();
			$(this).toggleClass('active');
		});
		
		$('.main-navigation .nav-toggle').click(function() {
			$('body').addClass('menu-active');
			$(this).siblings('div').animate({
				width: 'toggle',
			});
		});

		$('.main-navigation .close').click(function() {
			$('body').removeClass('menu-active');
			$(this).parent('div').animate({
				width: 'toggle',
			});
		});

		//for accessibility 
		$('.main-navigation ul li a, .secondary-menu ul li a').focus(function() {
			$(this).parents('li').addClass('focused');
		}).blur(function() {
			$(this).parents('li').removeClass('focused');
		});

		/* Featured Slider */
		var owl = $('.carousel-slider');
		owl.owlCarousel({
			items: 3,
			lazyLoad: true,
			loop: true,
			margin: 10,
			dots: false,
			autoplay: true,	
			smartSpeed: 3000,
			autoplayTimeout:7300,
			nav: true,
			navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
			responsive: {
				0: {
					nav: false,
					mouseDrag: false,
					touchDrag: false,
					items: 1
				},
				600: {
					nav: false,
					mouseDrag: false,
					touchDrag: false,
					items: 2
				},
				1000: {
					nav: true,
					mouseDrag: true,
					touchDrag: true,
					items: 3
				}
			}
		});
		
		// Cart
		$(document).on('click', function (e) {
			if (!$(e.target).closest('.site-header-cart').length){
				$('.site-header-cart').find('.widget_shopping_cart').slideUp();
			}
		});
		if($(".site-header-cart").length > 0) {
			$('.site-header-cart').on('click', function (event) {
				$(this).find('.widget_shopping_cart').slideToggle();            
			});
		}
		
		// Fitvids
		$(".container").fitVids();
			
		// Scroll to top
		var offset = 500;
		jQuery(window).scroll(function(){
			if (jQuery(this).scrollTop() > offset) {	
				jQuery('#backtotop').css({bottom:"60px"});
			} else {
				jQuery('#backtotop').css({bottom:"-100px"});
			}
		});
		jQuery('#backtotop').click(function(){
			jQuery('html, body').animate({scrollTop: '0px'}, 1800);
			return false;
		});
		
    });
})(jQuery);