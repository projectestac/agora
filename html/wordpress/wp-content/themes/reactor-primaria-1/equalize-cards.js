 
    //Targeta mes alta determina l'alcada de la fila		
    for (i=0;i<=30;i++){
        targetes_fila = jQuery('.fila'+i.toString()+'> .targeta > .entry-body');
        maxHeight = Math.max.apply(
        Math, targetes_fila.map(function() {
        return jQuery(this).height();
        }).get());
        targetes_fila.height(maxHeight);
    }

    //Perque quedin alineats, coloquem el footer partint de la base de la targeta, no del contingut	
    targetes = jQuery('.targeta > .entry-body >.entry-footer');
    targetes.css('position', 'absolute');
    targetes.css('bottom', '1em');

