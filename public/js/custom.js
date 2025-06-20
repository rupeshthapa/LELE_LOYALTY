// (function ($) {

  "use strict";
  let alternate = 0;

    // PRE LOADER
    $(window).load(function(){
      $('.preloader').fadeOut(1000); // set duration in brackets    
    });


    // MENU
    $('.navbar-collapse a').on('click',function(){
      $(".navbar-collapse").collapse('hide');
    });

    $(window).scroll(function() {
      if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
          } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
          }
    });


    // PARALLAX EFFECT
    $.stellar({
      horizontalScrolling: false,
    }); 


    // ABOUT SLIDER
    $('.owl-carousel').owlCarousel({
      animateOut: 'fadeOut',
      items: 1,
      loop: true,
      autoplayHoverPause: false,
      autoplay: true,
      smartSpeed: 1000,
    });


    // SMOOTHSCROLL
    $(function() {
      $('.custom-navbar a').on('click', function(event) {
        var $anchor = $(this);
          $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 49
          }, 1000);
            event.preventDefault();
      });
    });  

// })(jQuery);

  //toogle



$(document).ready(function() {
  $(window).on('scroll', function() {
      var scrollPos = $(document).scrollTop(); 
      var windowHeight = $(window).height(); 
      $('.smoothScroll').each(function() {
          var currLink = $(this);
          var refElement = $(currLink.attr("href"));
          var sectionTop = refElement.offset().top;
          var sectionBottom = sectionTop + refElement.height();
          if (scrollPos >= sectionTop - windowHeight / 2 && scrollPos < sectionBottom - windowHeight / 2) {
              $('.custom-navbar .nav li').removeClass('active');
              currLink.parent().addClass('active');
          }
      });
  });
  $('a.smoothScroll').on('click', function(event) {
      event.preventDefault();
      $('.custom-navbar .nav li').removeClass('active');
      $(this).parent().addClass('active');
  });

    $(document).on("click",".navbar-toggle",function(){
      if(alternate == 0){
        $(".ff").css({
          "display" : "none",
        });
        alternate = 1
      }else{
        $(".ff").css({
          "display" : "block",
        });
        alternate = 0
      }
    });

});