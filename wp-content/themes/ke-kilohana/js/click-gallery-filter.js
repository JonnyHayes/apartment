// data-filter-slug="amenities"
// data-filter-slug="floor-plans"
// data-filter-slug="village-life"
// div class="jig-filterButtonSelected"

$(window).load(function() {
  // Trigger click event on filter buttons
  $('#jig1-filterButtons div').trigger('click', function() {
    var $jigFilterButton = $('.jig-filterButtons').children();
    var storedGalleryFilter = localStorage.getItem('galleryFilter');
    // All button is automatically selected. Remove this class.
    $jigFilterButton.first().removeClass('jig-filterButtonSelected');
    $jigFilterButton.each(function() {
      // Check that stored value from previous page matches the data-filter-slug
      if (storedGalleryFilter == $(this).attr('data-filter-slug')) {
        $(this).addClass('jig-filterButtonSelected');
      }
    });
    localStorage.removeItem('galleryFilter');
  });
});
