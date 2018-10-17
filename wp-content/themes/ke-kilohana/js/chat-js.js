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
      $('#chatbox').empty();
    if(uid!="0"){
      $("#chatbox").append("<div class='col-xs-12'><h2><center>"+data.info+"</center></h2></div>");

      for(var i=1;i<data.message.length;i++){  MyCounter = {}; MyCounter.thecounter = [i];
        if(data.message[i]['uid']==uid){
            if ( [i] == 1 ) {
                $("#chatbox").append("<div class='broaky'></div>");

            }



          if ( [i] % 20 === 0 ){
              $("#chatbox").append("<li class='actual_msg' style='text-align:right;float:right''>"+[i]+"</li>");
              //	$("#chatbox").append("<div  style id='"+[i]+"'>brekapoint</div>");
          }
          else {

            // $("#chatbox").append("<li class='actual_msg' style='text-align:right;float:right'><section>Lottery Number: "+[i]+" Packet Number:" +data.message[i].packetnumber+"</section><span class='date'>"+data.message[i].time+"</span></li>");

          }

          $("#chatbox").append("<li class='actual_msg' style='text-align:right;float:right'><section>Lottery Number: "+[i]+" Packet Number:" +data.message[i].packetnumber+"</section><span class='date'>"+data.message[i].time+"</span></li>");

          // if ( [i] % 20 === 0 ){
          // $("#chatbox").append("end table c");
          // }
          // else {
          //
          // 	// $("#chatbox").append("<li class='actual_msg' style='text-align:right;float:right'><section>Lottery Number: "+[i]+" Packet Number:" +data.message[i].packetnumber+"</section><span class='date'>"+data.message[i].time+"</span></li>");
          //
          // }
        //	$("#chatbox").append("</table>");

      }
  $("#chatbox").animate({scrollTop: $("#chatbox").get(0).scrollHeight},900);

    }


  } // $( "div.breaky" ).replaceWith("</div><div>") ;
  });

  // socket.on('exit',function(data){
  //     if((data.message).trim()!="undefined"){
  //     	$("#chatbox").append("<div class='col-xs-12'><h2><center>"+data.message+" is offline</center></h2></div>");
  //     }
  // });

  socket.on('get msg',function(data){

    //to scroll the div
    $("#chatbox").animate({scrollTop: $("#chatbox").get(0).scrollHeight},900);
    if(data.id==uid){
      newCounter= {};
      newCounter = parseInt(MyCounter.thecounter);
      newCounter = (newCounter + 1);

        if (newCounter % 20 === 0 ){
        $("#chatbox").append("<table><tr><td><li class='actual_msg' style='text-align:right;float:right'><section>Lottery Number: "+newCounter+" Packet Number:"+data.message+"</section><span class='date'>"+data.date+"</span></li></td></tr></table>");


        }
         else {

         newCounter= {};
         newCounter = parseInt(MyCounter.thecounter);
         newCounter = (newCounter + 1);

         $("#chatbox").append("<li class='actual_msg' style='text-align:right;float:right'><section>Lottery Number: "+newCounter+" Packet Number:"+data.message+"</section><span class='date'>"+data.date+"</span></li>");
        }
  }
});

} )( jQuery );
