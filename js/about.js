"use strict"; // Start of use strict
$(document).ready(function(){
  // jQuery for page scrolling feature - requires jQuery Easing plugin
  $('body.dsb a.page-scroll').bind('click', function(event) {
      var $anchor = $(this);
      $('html, body.home').stop().animate({
          scrollTop: ($($anchor.attr('href')).offset().top - 50)
      }, 1250, 'easeInOutExpo');
      event.preventDefault();
  });

  // Highlight the top nav as scrolling occurs
  $('body.dsb').scrollspy({
      target: '.navbar-fixed-top',
      offset: 51
  });

  // Closes the Responsive Menu on Menu Item Click
  $('.navbar-collapse ul li a').click(function(){
    $('.navbar-toggle:visible').click();
  });

  // Offset for Main Navigation
  $('body.dsb #mainNav').affix({
      offset: {
          top: 60
      }
  });
});
