/**
 * This file is to be added in edit question forms, for all wirisquizzes question
 * types, and also to the popup launched wen user clicks 'Initial Content'
 ***/

function setWirisQuizzesEditBehaviours(){
  var initialCASButton = document.getElementById('id_initialCAS');
  if(initialCASButton !== null){
    addUniqueListener("opencaspopup",initialCASButton, 'click', openInitialCASContentPopup);
  }
  var initialCASOk = document.getElementById('initialCASOk');
  if(initialCASOk != null){
    addUniqueListener("saveinicas",initialCASOk, 'click', saveInitialCasContent);
  }
  var initialCASCancel = document.getElementById('initialCASCancel');
  if(initialCASCancel != null){
    addUniqueListener("cancel",initialCASCancel, 'click', function(){window.close()});
  }
  var initialCASApplets = document.getElementsByName('initialwirisCAS');
  if(initialCASApplets.length >0){
    loadInitialCasContent();
  }
}

function openInitialCASContentPopup(){
  window.open(WirisQuizzes.constants.wwwroot + '/wiris-quizzes/lib/initialcascontent.php', '_blank', 'width=650,height=340');
}

function loadInitialCasContent(){
  var cas = document.getElementsByName('initialwirisCAS')[0];
  if(!YAHOO.util.Dom.hasClass(cas, "#@initial@#")){
    if(!cas.isActive()){
      setTimeOut(loadInitialCasContent(),200);
    }else{
      var session = opener.document.getElementsByName('hiddenInitialCASValue')[0].value;
      if(session.length >0){
        cas.setXML(session);
      }
    }
    YAHOO.util.Dom.addClass(cas, "#@initial@#");
  }
}

function saveInitialCasContent(){
  //get session
  var session = document.getElementsByName('initialwirisCAS')[0].getXML();
  //save to hidden element of opener (parent) window
  opener.document.getElementsByName('hiddenInitialCASValue')[0].value = session;
  window.close();
}

//This function is useful to workaround a YUI bug, so you can try several times
//to add the listener.

function addUniqueListener(id, elem, event, func){
  if(!YAHOO.util.Dom.hasClass(elem, '#@'+id+'@#')){
    YAHOO.util.Event.addListener(elem, event, func);
    YAHOO.util.Dom.addClass(elem, '#@'+id+'@#');
  }
}
YAHOO.util.Event.onDOMReady(setWirisQuizzesEditBehaviours);
YAHOO.util.Event.addListener(window, "load", setWirisQuizzesEditBehaviours);

