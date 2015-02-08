jQuery(document).ready(function($) {
  	var mySwiper = $('.swiper-container').swiper({loop: true, calculateHeight: true});
  	if(mySwiper !== undefined){  		
	    $(".small-slider .fa-chevron-left").click(mySwiper.swipePrev);
	    $(".small-slider .fa-chevron-right").click(mySwiper.swipeNext);
  	}
});
