$(function() {
  // User search
  $('#user_search_btn').click(function() {
    if ( $.isNumeric($('#user_search_box').val()) ) {
      if ( $('#user_search_box').val() >= 5000 ) {
        var search_number = $('#user_search_box').val();
        $.ajax({
          type: "GET",
          url: getSearchLotteryNumber.ajax_get_url,
          dataType: 'html',
          data: {
            action: 'get_search_lottery_number',
            'searchNumber': search_number
          }
        })
          .done(function(data) {
            $('#user_search_result').html(data);
          })
          .fail(function(data) {
            console.log('Error: ' + data);
          });
      } else {
        $('#user_search_result').html("<span class='bold-text'>Invalid lottery number</span>");
      }
    } else {
      $('#user_search_result').html('Lottery search must contain only numbers');
    }
  });

  // Show all lottery numbers
  $.ajax({
    type: "GET",
    url: getSearchLotteryNumber.ajax_get_url,
    dataType: 'html',
    data: {
      action: 'get_all_lottery_number',
    }
  })
    .done(function(data) {
      $('#chatbox').html(data);
    })
    .fail(function(data) {
      alert('Error: ' + data);
    });

});
