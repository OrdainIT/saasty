(function ($) {
	"use strict";

	////////////////////////////////////////////////////
	//  Swiper Js
	const blogswiper = new Swiper('.it-blog-active', {
		// Optional parameters
		speed:1500,
		loop: true,
		slidesPerView: 1,
        spaceBetween: 35,
		autoplay: true,
		breakpoints: {
			'1400': {
				slidesPerView: 3,
			},
			'1200': {
				slidesPerView: 3,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
		navigation: {
			prevEl: '.slider-prev',
			nextEl: '.slider-next',
		},
		
	  });

	////////////////////////////////////////////////////
	//  Swiper Js
	const teamswiper = new Swiper('.it-team-details-active', {
		// Optional parameters
		speed:1500,
		loop: true,
		slidesPerView: 1,
        spaceBetween: 35,
		autoplay: true,
		breakpoints: {
			'1400': {
				slidesPerView: 4,
			},
			'1200': {
				slidesPerView: 4,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
		navigation: {
			prevEl: '.slider-prev',
			nextEl: '.slider-next',
		},
		
	  });


	  ////////////////////////////////////////////////////
	// 13. Swiper Js
	var cr_brand_slider = new Swiper(".it-brand-active", {
		loop: true,
		freemode: true,
		slidesPerView: 'auto',
		spaceBetween: 100,
		centeredSlides: true,
		allowTouchMove: false,
		speed: 2500,
		autoplay: {
		  delay: 1,
		  disableOnInteraction: true,
		},
	  });



	




	
	  


	  

})(jQuery);