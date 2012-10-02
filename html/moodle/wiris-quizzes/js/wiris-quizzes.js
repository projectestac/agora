/**
 * This file is to be added to every response form. For all wiris-quizzes
 * question-types.
 ***/

function setWirisQuizzesBehaviours(){
  if(YAHOO.util.Dom.getElementsByClassName("wirisCASApplet", "div").length > 0){
    addUniqueListener("savecassession","responseform", "submit", saveCasSessions);
  }
  if(YAHOO.util.Dom.getElementsByClassName("wirisEditorApplet", "div").length > 0){
    addUniqueListener("saveeditorcontent","responseform", "submit", saveEditorContent);
  }
  //navigate links do not properly fire submit events!!!
  var as = document.getElementsByTagName("a");
  for(var i=0;i<as.length;i++){
    if(as[i].getAttribute("href") != null){
      if(as[i].getAttribute("href").indexOf("navigate") !== -1){
        addUniqueListener("saveeditorcontent",as[i], "click", saveEditorContent);
        addUniqueListener("savecassession",as[i], "click", saveCasSessions);
      }
    }
  }
}

function saveCasSessions(){
  var CASapplets = YAHOO.util.Dom.getElementsByClassName("wirisCASApplet", "div");
  for(var i=0; i<CASapplets.length;i++){
    var cas = CASapplets[i].getElementsByTagName('applet')[0];
    var hid = document.getElementById(cas.name + 'Hidden');
    hid.value = cas.getXML();
  }
}
function saveEditorContent(){
  var editorApplets = YAHOO.util.Dom.getElementsByClassName("wirisEditorApplet", "div");
  for(var i=0; i<editorApplets.length;i++){
    var editor = editorApplets[i].getElementsByTagName('applet')[0];
    //save MathML content to response field
    var res = document.getElementById(editor.name + 'Response');
    res.value = editor.getContent();
    //save transformed (Omega) content to another hidden field
    var hid = document.getElementById(editor.name + 'Hidden');
    try{
      var transformation = editor.getTransformation("f1");
      if(transformation != null){
        hid.value = transformation;
      }
    }catch(e){}
  }
}
function copyCASSessionToEditor(id, prefix){
  var button = document.getElementById(prefix+"copy_button");
  button.disabled = true;
  try{
    var url = WirisQuizzes.constants.wwwroot + '/question/type/shortanswerwiris/cas2editor.php';
    var xml=document.getElementsByName(prefix+"wirisCAS")[0].getXML();
    var params="question="+id+"&program="+encodeURIComponent(xml);
    var callback = {
      success:function(o){
        document.getElementsByName(prefix+"wirisEditor")[0].setContent(o.responseText);
        button.disabled = false;
      },
      failure:function(o){
        button.disabled = false;
      }
    };
    YAHOO.util.Connect.asyncRequest('POST', url ,callback, params);
  }finally{
    
  }
}
//This function is useful to workaround a YUI bug, so you can try several times
//to add the listener.

function addUniqueListener(id, elem, event, func){
  if(!YAHOO.util.Dom.hasClass(elem, '#@'+id+'@#')){
    YAHOO.util.Event.addListener(elem, event, func);
    YAHOO.util.Dom.addClass(elem, '#@'+id+'@#');
  }
}

//It is done twice because a bug of YUI related with FRAMES:
//http://yuilibrary.com/projects/yui2/ticket/2008289
YAHOO.util.Event.onDOMReady(setWirisQuizzesBehaviours);
YAHOO.util.Event.addListener(window, "load", setWirisQuizzesBehaviours);