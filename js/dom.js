"use strict"; // Start of use strict
$(document).ready(function(){
  // jQuery for page scrolling feature - requires jQuery Easing plugin
  $('body a.page-scroll').bind('click', function(event) {
      var $anchor = $(this);
      $('html, body.home').stop().animate({
          scrollTop: ($($anchor.attr('href')).offset().top - 50)
      }, 1250, 'easeInOutExpo');
      event.preventDefault();
  });

  // Highlight the top nav as scrolling occurs
  $('body').scrollspy({
      target: '.navbar-fixed-top',
      offset: 51
  });

  // Closes the Responsive Menu on Menu Item Click
  $('.navbar-collapse ul li a').click(function(){
    $('.navbar-toggle:visible').click();
  });

  // Offset for Main Navigation
  $('body #mainNavHome').affix({
      offset: {
          top: 200
      }
  })
  autoPlayYouTubeModal();
  $('#videoModal').on('hidden.bs.modal', function () {
      $('#videoModal button.close').click();
  })
})

function autoPlayYouTubeModal(){
  var trigger = $("body").find('[data-toggle="modal"]');
  trigger.click(function() {
    var theModal = $(this).data( "target" ),
    videoSRC = $(this).attr( "data-theVideo" ),
    videoSRCauto = videoSRC+"?autoplay=1&showinfo=0" ;
    $(theModal+' iframe').attr('src', videoSRCauto);
    $(theModal+' button.close').click(function () {
        $(theModal+' iframe').attr('src', videoSRC);
        $(theModal+' iframe').attr('height', '100%');
    });
  });
}
