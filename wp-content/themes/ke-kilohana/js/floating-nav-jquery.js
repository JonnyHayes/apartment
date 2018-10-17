function showActiveNav(unorderedListId, wrapperId) {
  // Demo for setting active list items on scrolling the same page:
  // http://jsfiddle.net/mekwall/up4nu/

  // Cache selectors
  var lastId,
      topMenu = $(unorderedListId),
      topMenuHeight = topMenu.outerHeight()+15,
      // All list items
      menuItems = topMenu.find("a"),
      // Anchors corresponding to menu items
      scrollItems = menuItems.map(function(){
        var item = $($(this).attr("href"));
        if (item.length) { return item; }
      });

  // Bind click handler to menu items
  // so we can get a fancy scroll animation
  // menuItems.click(function(e){
  //   var href = $(this).attr("href"),
  //       offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
  //   $('html, body').stop().animate({
  //       scrollTop: offsetTop
  //   }, 300);
  //   e.preventDefault();
  // });

  menuItems.click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

  // Bind to scroll
  $(window).scroll(function(){

     // Get container scroll position
     var fromTop = $(this).scrollTop()+topMenuHeight;

     // Get id of current scroll item
     var cur = scrollItems.map(function(){
       if ($(this).offset().top < fromTop)
         return this;
     });
     // Get the id of the current element
     cur = cur[cur.length-1];
     var id = cur && cur.length ? cur[0].id : "";

     if (lastId !== id) {
         lastId = id;
         // Set/remove active class
         menuItems
           .parent().removeClass("active")
           .end().filter("[href='#"+id+"']").parent().addClass("active");
     }
  });

  // scrollMonitor
  var elementWatcher = scrollMonitor.create( $(wrapperId), {top: -200, bottom: 200} );
  elementWatcher.partiallyExitViewport(function() {
    if ( $(wrapperId) == '#homepage-nav-wrapper' ) {
      menuItems.parent().removeClass('white').addClass('black');
    } else {
      menuItems.parent().removeClass('black').addClass('white');
    }
  });
  elementWatcher.fullyEnterViewport(function() {
     menuItems.parent().removeClass('white').addClass('black');
  });

  // First child content
  var firstChildWatcher = scrollMonitor.create( $(wrapperId).first(), {bottom: 200} );
  firstChildWatcher.partiallyExitViewport(function() {
    $("#tf-menu").css("background", "transparent");
  });
  firstChildWatcher.fullyEnterViewport(function() {
     $("#tf-menu").css("background", "rgba(255,255,255,.75)");
  });

}
