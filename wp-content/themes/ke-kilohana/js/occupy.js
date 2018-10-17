// reserve it function

    $('.reserve-button').click(function(){
    //  alert ($(this).data('id'))

     $( this ).toggleClass( "reserved" );
        //var book_id = '1723'
          var book_id = $(this).data('id');
					var status = $(this).attr('class');
          	//alert (status)
					if (status != 'reserve-button'){
          	//alert (status);
					var status_switch = 1;

					}


					if (status != 'reserve-button reserved'){
						//alert (status);
					var status_switch = 0;

					}

        // $(this).parent().data('id');

        $.ajax
        ({
            url : postoccupy.ajax_url,
            data: {
              action : 'post_occupy_add_occupy',
              "bookID": book_id,
						  "statusSwitch": status_switch},
            type: 'post',
            success : function( response ) {

			    //  alert('poop ' +response)

		    }

        });



    });
