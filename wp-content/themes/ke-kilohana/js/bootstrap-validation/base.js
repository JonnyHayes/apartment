$("#register-now-btn-top-nav").on("touchstart click", function(){
    ga("send", "event", { eventCategory: "RegistrationInterest", eventAction: "LinkClick", eventLabel: "HeaderLink"});
    
    $(".btn-primary").hover(
function () {
    $(this).fadeOut(function () {
        $(this).removeClass(".pull-right register-img").addClass(".pull-right register-img:hover").fadeIn('fast');
    });
},
function () {
    $(this).fadeOut(function () {
        $(this).removeClass(".pull-right register-img:hover").addClass(".pull-right register-img").fadeIn('fast');
    });
});
    
    
});
