// $('#floor_numbers_buttons').on('click', 'button', function() {
//   var clicked_floor_number = $(this).val();
//   console.log('begin ajax with floor #' + clicked_floor_number);
//   $.ajax({
//     type: 'POST',
//     url: '../wp-content/themes/ke-kilohana/view-planes-query.php',
//     data: { elevation : clicked_floor_number }
//   }).done(function(data) {
//     // TODO pass response back into main twig file, to match elevation group
//     $('#viewer-response').html(data);
//     console.log('ajax finished');
//   });
// });
