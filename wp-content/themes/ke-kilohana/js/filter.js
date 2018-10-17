$(function() {
  var filters = {};
  var $grid = $('.grid').isotope({
    itemSelector: '.filter-item',
    // filter: ':not(*)',
  });

  $('.filter-select').change(function() {
    filters[$(this).attr('data-filter-group')] = this.value;
    $grid.isotope({
      filter: concatValues(filters)
    });
  });

});

function concatValues(arr) {
  var result = '';
  _.each(arr, function(val, key) {
    result += arr[key];
  });
  return result;
}
