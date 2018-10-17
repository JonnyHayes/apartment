$(function() {

    $("input,textarea,#00Ni000000D08UT").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events

              if ($('#00Ni000000D08UT').val().length == 0) {
                //alert('');
                event.preventDefault();
              }

            }
        ,
        submitSuccess: function($form, event) {
          //  event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var firstName = $("input#first_name").val();
      var lastName = $("input#last_name").val();
            var email = $("input#email").val();
            var phone = $("input#phone").val();
           //  var marketingchannel = $("select#marketingchannel").val();
           // var message = $("textarea#message").val();
            //var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }

        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
       // e.preventDefault();
        $(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});

$("#brokeryes").click(
 function () {   
    $("#brokertextbox").removeClass("hidden")
    
 });

$("#brokerno").click(
 function () {   
    $("#brokertextbox").addClass("hidden")
 });

$("#brokerno").click(
 function () {   
     var t = "";
    $("#brokertextbox").val(t)
 });



//$("#brokerno").click("#brokertextbox").addclass(".hidden");
//$("#brokerno").click("#brokertextbox").value("");



$("#registernowbtn").on("touchstart click", function(){
    ga("send", "event", { eventCategory: "Registration", eventAction: "SubmitRegistration", eventLabel: "RegistrationForm"});





    $(".btn-primary").hover(
function () {
    $(this).fadeOut(function () {
        $(this).removeClass(".btn-primary").addClass(".btn-primary:hover").fadeIn('fast');
    });
},
function () {
    $(this).fadeOut(function () {
        $(this).removeClass(".btn-primary:hover").addClass(".btn-primary").fadeIn('fast');
    });
});


});


$("select.country").change(function(){
    //salert('tp');
        var selectedCountry = $(".country option:selected").val();
        $.ajax({
            type: "POST",
            url: "../../wp-content/themes/ke-kilohana/process-request.php",
            data: { country : selectedCountry }
        }).done(function(data){
            $("#response").html(data);
        });
    });

