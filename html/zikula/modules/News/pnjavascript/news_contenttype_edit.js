/**
  *  $Id:  $ 
  * Create the onload function to enable the switch visibility functions
 */
Event.observe(window, 'load', news_contenttype_edit_init, false);

function news_contenttype_edit_init()
{
  Event.observe('dispnewimage', 'click', news_contenttype_dispnewimage_onchange);
  Event.observe('disphometext', 'click', news_contenttype_disphometext_onchange);
  if ( !$('dispnewimage').checked) {
    $('news_contenttype_dispnewimage_container').hide();
  }
  if ( !$('disphometext').checked) {
    $('news_contenttype_disphometext_container').hide();
  }
}
function news_contenttype_dispnewimage_onchange()
{
  switchdisplaystate('news_contenttype_dispnewimage_container');
}
function news_contenttype_disphometext_onchange()
{
  switchdisplaystate('news_contenttype_disphometext_container');
}

