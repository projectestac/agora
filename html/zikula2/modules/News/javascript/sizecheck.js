/*
 *  $Id: sizecheck.js 34 2008-12-24 00:07:35Z Guite $ 
 */

/**
 * function that starts monitoring the textareas for updating the information span 
 * must be declared this way, we need to call the function after the ajax
 * request for inline editing has returned
 */
 
var template;
 
sizecheckinit =  function() 
                 {
                     template = new Template(bytesused);
                     
                     if($('news_hometext_remaining') && $('news_hometext')) {
                         Event.observe($('news_hometext'), 'keyup', updatehometext, false);
                         updatehometext();
                     } 
                     if($('news_bodytext_remaining') && $('news_bodytext')) {
                         Event.observe($('news_bodytext'), 'keyup', updatebodytext, false);
                         updatebodytext();
                     } 
                 }

/**
 * onload event handler for window
 *
 */
Event.observe(window, 
              'load', 
              sizecheckinit,
              false);

/**
 * the update functions
 * when changing the templates make sure that the id's don't change!!
 *
 */
function updatehometext()
{
    Element.update($('news_hometext_remaining'), template.evaluate({chars: $('news_hometext').value.length}));
}

function updatebodytext()
{
    Element.update($('news_bodytext_remaining'), template.evaluate({chars: $('news_bodytext').value.length}));
}

