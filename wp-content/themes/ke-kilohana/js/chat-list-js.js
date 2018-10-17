( function( $ ) { //console.log ('t');
	var socket = io.connect('http://hhkk.mvnpclients.com:8900');
	var uid='4';
	socket.emit('validate',uid);



	$('.msg_box').mousedown(function(event){

		if ( event.which == 1 ) {
        	data={
        		id:uid,
        		msg:$("#msg_box").val()
	        };
	        socket.emit('send msg',data);
            $("#msg_box").val('');
					MyCounter.thecounter = 	newCounter;
        }
    });

	socket.on('user entrance',function(data){
	//	alert ('poop');
			  $('#lotterytable').empty();
		if(uid!="0"){
		//	$("#lotterytable").append("<div class='col-xs-12'><h2><center>"+data.info+"</center></h2></div>");

			for(var i=1;i<data.message.length;i++){  MyCounter = {}; MyCounter.thecounter = [i];
				if(data.message[i]['uid']==uid){


					$("#lotterytable").append("<li class='lottery_actual_msg' style=''><div class='leftdiv' style='background-color:#f4c350;'>"+[i]+"</div><div class='rightdiv'>" +data.message[i].packetnumber+"</div></li>");




			}


			$("#lotterytable").animate({scrollTop: $("#lotterytable").get(0).scrollHeight},9);
		}
	}
	});

	// socket.on('exit',function(data){
	//     if((data.message).trim()!="undefined"){
	//     	$("#lotterytable").append("<div class='col-xs-12'><h2><center>"+data.message+" is offline</center></h2></div>");
	//     }
	// });

	socket.on('get msg',function(data){

		//to scroll the div
		$("#lotterytable").animate({scrollTop: $("#lotterytable").get(0).scrollHeight},9);
		if(data.id==uid){
			newCounter= {};
			newCounter = parseInt(MyCounter.thecounter);
			newCounter = (newCounter + 1);


				$("#lotterytable").append("<li class='lottery_actual_msg' style='text-align:left;float:left'><div class='leftdiv' style='background-color:#f4c350;'>"+newCounter+"</div><div class='rightdiv'>"+data.message+"</div></li>");


	}
});

} )( jQuery );
