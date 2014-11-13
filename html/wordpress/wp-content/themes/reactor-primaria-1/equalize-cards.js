    //Targeta mes alta determina l'alcada de les targetes de la fila	
    var $ =jQuery.noConflict();
    $(".articles .row").each( function(index, value) { 
        targetes_fila = $(this).children();
        maxHeight = Math.max.apply(
        Math, targetes_fila.map(function() {
            return $(this).height();
        }).get());
        targetes_fila.height(maxHeight);
    });
