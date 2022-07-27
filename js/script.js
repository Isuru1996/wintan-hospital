$(document).ready(function() {
    $('a').click(function() {
        var clickedLink = $(this).attr('id');
        if(clickedLink=="about"||clickedLink=="services"||clickedLink=="gallery"||clickedLink=="doctors"||clickedLink=="contact"){
            $('#main').show();
            $('#main').load('content.php #' + clickedLink);
            $('#hero').hide();  
        }
        else{
            $('#hero').show();
            $('#main').hide();
        }
    });
   
});

