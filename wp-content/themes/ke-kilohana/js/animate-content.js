function animateContent(wrapperId) {
  // Watch for scroll event
  $(window).scroll(function() {
    // Get the block of div content for each page, wrapped in a div id.
    $(wrapperId).children().each(function() {
      if ($(window).scrollTop() >= ($(this).offset().top - 100)) {
        // $.when(
          $(this).find('.fade-in-first').delay(1000).css({
            'opacity': '0.15'
          });
          // $.Deferred(function(deferred) {
          //   $(deferred.resolve);
          // })
        // ).done(function() {
          $(this).find('.fade-up').delay(5000).css({
            'margin-top': '0px',
            'opacity': '1',
          });
          $(this).find('.yellow-bar-divider').delay(5000).css({
            'width': '100px',
            'opacity': '1'
          });
          $(this).find('.fade-in').delay(5000).css({
            'opacity': '1'
          });
        // });
      } else {
        // $.when(
          $(this).find('.fade-in-first').delay(1000).css({
            'opacity': '1'
          });
          // $.Deferred(function(deferred) {
          //   $(deferred.resolve);
          // })
        // ).done(function() {
          $(this).find('.fade-up').delay(5000).css({
            'margin-top': '50px',
            'opacity': '0',
          });
          $(this).find('.yellow-bar-divider').delay(5000).css({
            'width': '0px',
            'opacity': '0'
          });
          $(this).find('.fade-in').delay(5000).css({
            'opacity': '0'
          });
        // });
      }
    });
  });
}
