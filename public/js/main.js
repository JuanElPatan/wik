$(document).ready(function(){
    $('img').on('error', function() {
        $(this).attr("src", "../img/err.jpg");
    });
});
