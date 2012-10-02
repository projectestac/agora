/**
  *  $Id:  $ 
  * Create the onload function to enable the switch visibility functions
 */
Event.observe(window, 'load', news_storiesextblock_modify_init, false);

/**
 * Functions to enable watching for changes in  the optional divs and show and hide these divs 
 * with the switchdisplaystate funtion of javascript/ajax/pnajax.js. This function uses BlindDown and BlindUp
 * when scriptaculous Effects is loaded and otherwise show and hide of prototype.
 */
function news_storiesextblock_modify_init()
{
  Event.observe('news_storiesextblock_disphometext_yes', 'click', news_storiesextblock_disphometext_onchange);
  Event.observe('news_storiesextblock_disphometext_no', 'click', news_storiesextblock_disphometext_onchange);
  Event.observe('news_storiesextblock_dispnewimage_yes', 'click', news_storiesextblock_dispnewimage_onchange);
  Event.observe('news_storiesextblock_dispnewimage_no', 'click', news_storiesextblock_dispnewimage_onchange);
  Event.observe('news_storiesextblock_scrolling', 'change', news_storiesextblock_scrolling_onchange);
  // Set the initial state of the optional visible parts
  if ( !$('news_storiesextblock_disphometext_yes').checked) {
    $('news_storiesextblock_disphometext_container').hide();
  }
  if ( !$('news_storiesextblock_dispnewimage_yes').checked) {
    $('news_storiesextblock_dispnewimage_container').hide();
  }
  if ( $F('news_storiesextblock_scrolling') == "1") {
    // Hide scrolling parameters when the first option "No Scrolling" is selected
    $('news_storiesextblock_scrolling_container').hide();
  }
}
function news_storiesextblock_disphometext_onchange()
{
  switchdisplaystate('news_storiesextblock_disphometext_container');
}
function news_storiesextblock_dispnewimage_onchange()
{
  switchdisplaystate('news_storiesextblock_dispnewimage_container');
}
function news_storiesextblock_scrolling_onchange()
{
  switchdisplaystate('news_storiesextblock_scrolling_container');
}

/**
 * Function to set all option elements of a form select to selected (true/false)
 */
function news_storiesextblock_selectAllOptions(selectElement, selected)
{
    if (selected == null) {
      selected = true;
    }
    for (var i = 0; i < selectElement.options.length; i++) {
      selectElement.options[i].selected = selected;
    }
}