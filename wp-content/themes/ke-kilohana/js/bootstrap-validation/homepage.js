$("#registernowbtn").on("touchstart click", function(){
    ga("send", "event", { eventCategory: "RegistrationInterest", eventAction: "LinkClick", eventLabel: "BodyLink"});
    
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




$("#viewgallerybtn").on("touchstart click", function(){
   
    $(".tf-btn").hover(
function () {
    $(this).fadeOut(function () {
        $(this).removeClass(".tf-btn").addClass(".tf-btn:hover").fadeIn('fast');
    });
},
function () {
    $(this).fadeOut(function () {
        $(this).removeClass(".tf-btn:hover").addClass(".tf-btn").fadeIn('fast');
    });
});
    
    
});


$("#scroll-down-btn").on("touchstart click", function(){
   
    $(".goto-btn").hover(
function () {
    $(this).fadeOut(function () {
        $(this).removeClass(".goto-btn").addClass(".goto-btn:hover").fadeIn('fast');
    });
},
function () {
    $(this).fadeOut(function () {
        $(this).removeClass(".goto-btn:hover").addClass(".goto-btn").fadeIn('fast');
    });
});
    
    
});
