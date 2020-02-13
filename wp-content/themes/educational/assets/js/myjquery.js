(function($) {
  "use strict";
  $(document).ready(function(){
    // grab an element
    var myElement = document.querySelector("header");
// construct an instance of Headroom, passing the element
var headroom = new Headroom(myElement, {
	"offset": 50,
	"tolerance": {
		"up" : 5,
		"down" : 0
	},
	"classes": {
		"initial": "animated",
		"pinned": "slideDown",
		"unpinned": "slideUp"
	}
});

headroom.init();

});

  $(document).ready(function() {
   var s = $("header");
   var pos = s.position();					   
   $(window).scroll(function() {
    var windowpos = $(window).scrollTop();
    if (windowpos >= pos.top & windowpos >=70) {
     s.addClass("background");
   } else {
     s.removeClass("background");	
   }
 });
 });


  $(document).ready(function(){
    $('.b-header .navbar-toggler').click(function(){
      $('.b-header .navbar-toggler #nav-icon3').toggleClass('open');
    });
  });



  $('.banner').slick({
    infinite: true,
    dots: true,
    arrows: false,
    speed: 800,
    autoplay: true,
    autoplaySpeed: 4000,
    pauseOnFocus: false,
    responsive: [
    {
      breakpoint: 475,
      settings: {
        arrows: true,
        dots: false
      }
    }
    ]
  });

  $('.courses-slider .row').slick({
    infinite: true,
    dots: false,
    arrows: true,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplaySpeed: 4000,
    pauseOnFocus: false,
    responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1
      }
    }
    ]
  });

  $('.event-slider .media-block').slick({
    infinite: true,
    dots: false,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 4000,
    pauseOnFocus: false
  });

  $('.clients .client-block').slick({
    infinite: true,
    dots: false,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 4000,
    pauseOnFocus: false
  });

  $('.blog-slider .row').slick({
    infinite: true,
    dots: false,
    arrows: true,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplaySpeed: 4000,
    pauseOnFocus: false,
    responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1
      }
    }
    ]
  });
})(jQuery);
