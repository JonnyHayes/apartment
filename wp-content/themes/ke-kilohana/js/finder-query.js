// Show only floor plans that match the number of bedrooms
$('#bedrooms_select').change(function() {
  var selected_bedroom = $('#bedrooms_select option:selected').val();
  $.ajax({
    type: 'POST',
    url: '../wp-content/themes/ke-kilohana/finder-query.php',
    data: { bedroom : selected_bedroom }
  }).done(function(data) {
    $('#floor_plan_response').html(data);
  });
});

// Show only floor numbers that fall inside the floor group range
$('#floor_groups_select').change(function() {
  var selected_floor_group = $('#floor_groups_select option:selected').val();
  $.ajax({
    type: 'POST',
    url: '../wp-content/themes/ke-kilohana/finder-query.php',
    data: { floorgroup : selected_floor_group }
  }).done(function(data) {
    $('#floor_number_response').html(data);
  });
});
