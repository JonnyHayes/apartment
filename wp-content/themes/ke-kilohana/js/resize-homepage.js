// Monitor the height of the columns and insure they stay the same at any size.
$( document ).ready(function() {
    var h1 = document.getElementById("right-column-one").offsetHeight;
    document.getElementById("row2_vertical_image").style.height = h1 + "px";

    var h2 = document.getElementById("row3_vertical_image").offsetHeight;
    document.getElementById("right-column-two").style.height = h2 + "px";

    var h2a = document.getElementById("row3_vertical_image").offsetHeight;
    document.getElementById("right-column-two").style.height = h2a + "px";

    var h3 = document.getElementById("left-column-two-container").offsetHeight;
    document.getElementById("row4_vertical_image1").style.height = h3 + "px";

    var h4 = document.getElementById("row4_vertical_image2").offsetHeight;
    document.getElementById("row-4-left-column-inner").style.height = h4 + "px";
});

$(window).on('resize', function(){
    var h1 = document.getElementById("right-column-one").offsetHeight;
    document.getElementById("row2_vertical_image").style.height = h1 + "px";

    var h2 = document.getElementById("row3_vertical_image").offsetHeight;
    document.getElementById("right-column-two").style.height = h2 + "px";

    var h2a = document.getElementById("row3_vertical_image").offsetHeight;
    document.getElementById("right-column-two").style.height = h2a + "px";

    var h3 = document.getElementById("left-column-two-container").offsetHeight;
    document.getElementById("row4_vertical_image1").style.height = h3 + "px";

    var h4 = document.getElementById("row4_vertical_image2").offsetHeight;
    document.getElementById("row-4-left-column-inner").style.height = h4 + "px";

});
