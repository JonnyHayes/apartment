// Set the gallery filter, based on clicked item
function setGalleryFilterValue(link, filterValue) {
  $(link).click(function() {
    // Set filter value for page-specific calls-to-action
    localStorage.setItem('galleryFilter', filterValue);
    window.open('/gallery');
  });
}
