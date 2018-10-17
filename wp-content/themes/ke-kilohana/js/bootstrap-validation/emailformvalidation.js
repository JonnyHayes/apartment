$(function() {



    $("input").jqBootstrapValidation({
      //sniffHtml: false,
        preventSubmit: true,
        submitSuccess: function($form, event, errors) {
            var from = $("input#from").val();
            var to = $("input#to").val();




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
$('#to').blur(function() {
    $("#brokertextbox").removeClass("hidden")
});
 



$("#email-share-residenceguide-submit").on("touchstart click", function(){
    ga("send", "event", { eventCategory: "email-share-residenceguide", eventAction: "SubmitResidenceGuideEmailShare", eventLabel: "EmailShareResidenceGuideForm"});

});


$("#email-share-homefinder-submit").on("touchstart click", function(){
    ga("send", "event", { eventCategory: "email-share-homefinder", eventAction: "SubmitHomeFinderEmailShare", eventLabel: "EmailShareHomeFinderForm"});

});


$("#email-share-unit-submit").on("touchstart click", function(){
    ga("send", "event", { eventCategory: "email-share-unit", eventAction: "SubmitUnitEmailShare", eventLabel: "EmailShareUnitForm"});

});



$(function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
});
