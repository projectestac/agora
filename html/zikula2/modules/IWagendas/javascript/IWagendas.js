function modifyField(daid, char)
{
  showfieldinfo(daid, modifyingfield);
  var pars = "module=IWagendas&func=modifyAgenda&daid=" + daid + "&char=" + char;
  var myAjax = new Ajax.Request("ajax.php",
  {
    method: 'get',
    parameters: pars,
    onComplete: modifyField_response,
    onFailure: modifyField_failure
  });
}

function modifyField_response(req)
{
  if (req.status != 200 ){
    pnshowajaxerror(req.responseText);
    return;
  }
  var json = pndejsonize(req.responseText);

  changeContent(json.daid);
}

function modifyField_failure(){
}

function modifyColor(daid,color)
{
  var pars = "module=IWagendas&func=modifyColor&daid=" + daid + "&color=" + color;
  var myAjax = new Ajax.Request("ajax.php",
  {
    method: 'get',
    parameters: pars,
    onComplete: modifyColor_response,
    onFailure: modifyColor_failure
  });
}

function modifyColor_response(req){
  if (req.status != 200 ){
//    pnshowajaxerror(req.responseText);
    return;
  }
  var json = pndejsonize(req.responseText);

}

function modifyColor_failure(){
}

function showfieldinfo(fndid, infotext)
{
  if (fndid) {
    var info = 'agendainfo_' + fndid;
    if (!Element.hasClassName(info, 'z-hide')) {
      Element.update(info, '&nbsp;');
      Element.addClassName(info, 'z-hide');
    } else {
      Element.update(info, infotext);
      Element.removeClassName(info, 'z-hide');
    }
  } else {
    $A(document.getElementsByClassName('fieldinfo')).each(function(info){
      Element.update(info, '&nbsp;');
      Element.addClassName(info, 'z-hide');
    });
  }
}

function changeContent(daid)
{
  var pars = "module=IWagendas&func=changeContent&daid=" + daid;
  var myAjax = new Ajax.Request("ajax.php",
  {
    method: 'get',
    parameters: pars,
    onComplete: changeContent_response,
    onFailure: changeContent_failure
  });
}

function changeContent_response(req)
{
  if (req.status != 200) {
    pnshowajaxerror(req.responseText);
    return;
  }
  var json = pndejsonize(req.responseText);
  Element.update('agendaChars_'+json.daid, json.content).innerHTML;
}

function changeContent_failure() {
}

function chgUsers(gid) {
  var pars = "module=IWagendas&func=chgUsers&gid=" + gid;
  show_info();
  var myAjax = new Ajax.Request("ajax.php",
  {
    method: 'get',
    parameters: pars,
    onComplete: chgUsers_response,
    onFailure: chgUsers_failure
  });
}

function chgUsers_failure(){
  show_info();
  Element.update('uid', '').innerHTML;
}

function chgUsers_response(req){
  if (req.status != 200) {
    pnshowajaxerror(req.responseText);
    return;
  }
  var json = pndejsonize(req.responseText);
  show_info();
  Element.update('uid', json.content).innerHTML;
}

/**
 * Show a bus while ajax process
 * called twice: 
 * #1: Show the icon
 * #2: restore normal display
 *
 *@return none;
 *@author Albert Pérez Monfort
 */
function show_info()
{
  var info = 'chgInfo';
  if(!Element.hasClassName(info, 'z-hide')) {
    Element.update(info, '&nbsp;');
    Element.addClassName(info, 'z-hide');
  } else {
    Element.update(info, '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    Element.removeClassName(info, 'z-hide');
  }
}  

function deleteNote(aid,daid){
  resposta=confirm(confirmDeletion);
  if (resposta){
    var pars = "module=IWagendas&func=deleteNote&aid=" + aid + "&daid=" + daid;
    var myAjax = new Ajax.Request("ajax.php",
    {
      method: 'get',
      parameters: pars,
      onComplete: deleteNote_response,
      onFailure: deleteNote_failure
    });
  }
}

function deleteNote_response(req)
{
  if (req.status != 200 ){
    pnshowajaxerror(req.responseText);
    return;
  }

  var json = pndejsonize(req.responseText);

  $('note_' + json.aid).toggle()
}

function deleteNote_failure() {
}

function protectNote(aid,daid)
{
  var pars = "module=IWagendas&func=protectNote&aid=" + aid + "&daid=" + daid;
  var myAjax = new Ajax.Request("ajax.php",
  {
    method: 'get',
    parameters: pars,
    onComplete: protectNote_response,
    onFailure: protectNote_failure
  });
}

function protectNote_response(req)
{
  if (req.status != 200) {
    pnshowajaxerror(req.responseText);
    return;
  }

  var json = pndejsonize(req.responseText);

  //alert(json.aid +' '+json.protected);
  if (json.protected == 1) {
    $('protectedIcon_'+json.aid).src="modules/IWagendas/images/nocandau.gif";
  } else {
    $('protectedIcon_'+json.aid).src="modules/IWagendas/images/candau.gif";
  }
  $('protectedIcon_'+json.aid).alt=json.alt;
  $('aprotectedIcon_'+json.aid).title=json.alt;
}

function protectNote_failure() {
}

function completeNote(aid,daid)
{
  var pars = "module=IWagendas&func=completeNote&aid=" + aid + "&daid=" + daid;
  var myAjax = new Ajax.Request("ajax.php",
  {
    method: 'get',
    parameters: pars,
    onComplete: completeNote_response,
    onFailure: completeNote_failure
  });
}

function completeNote_response(req)
{
  if (req.status != 200) {
    pnshowajaxerror(req.responseText);
    return;
  }

  var json = pndejsonize(req.responseText);
  var icon;
  var alt;
  if (json.completed == 1) {
    if (json.daid == 0){
      icon = 'ncompleta.gif';
    } else {
      icon = 'mostra.gif';
    }
  } else {
    if (json.daid == 0) {
      icon = 'completa.gif';
    } else {
      icon = 'amaga.gif';
    }
  }
  $('completedIcon_'+json.aid).src="modules/IWagendas/images/" + icon;
  $('completedIcon_'+json.aid).alt=json.alt;
  $('acompletedIcon_'+json.aid).title=json.alt;
  $('noteText_'+json.aid).style.background=json.bgcolor;
}

function completeNote_failure() {
}

function changeMonth(mes,any,daid)
{
  var pars = "module=IWagendas&func=changeMonth&mes=" + mes + "&any=" + any + "&daid=" + daid;
  var myAjax = new Ajax.Request("ajax.php",
  {
    method: 'get',
    parameters: pars,
    onComplete: changeMonth_response,
    onFailure: changeMonth_failure
  });
}

function changeMonth_response(req)
{
  if (req.status != 200 ){
    pnshowajaxerror(req.responseText);
    return;
  }
  var json = pndejsonize(req.responseText);
  Element.update('userCalendarContainer', json.content).innerHTML;
}

function changeMonth_failure() {
}

function subs(mes,any,daid) {
  var pars = "module=IWagendas&func=subs&mes=" + mes + "&any=" + any + "&daidSubs=" + daid;
  var myAjax = new Ajax.Request("ajax.php",
  {
    method: 'get',
    parameters: pars,
    onComplete: subs_response,
    onFailure: subs_failure
  });
}

function subs_response(req)
{
  if (req.status != 200) {
    pnshowajaxerror(req.responseText);
    return;
  }
  var json = pndejsonize(req.responseText);
  Element.update('userCalendarContainer', json.content).innerHTML;
}

function subs_failure() {
}

function calendarBlockMonth(month,year)
{
  var pars = "module=IWagendas&func=calendarBlockMonth&month=" + month + "&year=" + year;
  var myAjax = new Ajax.Request("ajax.php",
  {
    method: 'get',
    parameters: pars,
    onComplete: calendarBlockMonth_response,
    onFailure: calendarBlockMonth_failure
  });
}
function calendarBlockMonth_response(req)
{
  if (req.status != 200) {
    pnshowajaxerror(req.responseText);
    return;
  }
  var json = pndejsonize(req.responseText);
  Element.update('calendarContent', json.content).innerHTML;
}

function calendarBlockMonth_failure(){
}
