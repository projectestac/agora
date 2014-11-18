//Targeta mes alta determina l'alcada de les targetes de la fila	

jQuery(".articles > .row").each(function(index, value) { 
    
    targetes_fila = jQuery(this).children();
    maxHeight = Math.max.apply(
    Math, targetes_fila.map(function() {
        return jQuery(this).height();
    }).get());
    
    targetes_fila.height(maxHeight+20);
    
    targeta=jQuery(this).find("footer");
    targeta.css ({'position':'absolute','top':maxHeight-60});
    
});
