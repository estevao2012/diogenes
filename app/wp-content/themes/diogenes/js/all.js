jQuery(document).ready(function($){  
  console.log($(".slider-container"));
  $(".slider-container").swiper({
    mode:'horizontal',
    loop: true,
    pagination: ".paginacao ul",
    paginationClickable: true
  });
});