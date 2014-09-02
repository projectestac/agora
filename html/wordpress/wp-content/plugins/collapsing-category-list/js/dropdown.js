var collapsCatList = jQuery.noConflict();

collapsCatList(document).ready(function(){
  //collapsCatList('.children').slideUp();
  collapsCatList('.cat-item a[class^="expand"]').closest('.cat-item').find('ul.children').slideUp();

  collapsCatList('.cat-item a[class^="expand"], .cat-item a[class^="collapse"]').click(function(){

    var display_val = collapsCatList(this).closest('.cat-item').find('ul.children').css('display');
    if (display_val == 'none'){
      console.log('hola');
      var src = collapsCatList(this).children('img').attr("src").replace("expand.gif", "collapse.gif");
      src = collapsCatList(this).children('img').attr("src").replace("expand_neg.gif", "collapse_neg.gif");
    }else{
      console.log('hola2');
      var src = collapsCatList(this).children('img').attr("src").replace("collapse.gif", "expand.gif");
      src = collapsCatList(this).children('img').attr("src").replace("collapse_neg.gif", "expand_neg.gif");
    }
    collapsCatList(this).children('img').attr("src", src);
    collapsCatList(this).closest('.cat-item').find('ul.children').slideToggle();

    return false;
  });
});


