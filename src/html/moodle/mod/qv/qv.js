// $Id: qv.js,v 1.3 2009/03/11 13:29:36 sarjona Exp $

function openpopup(url,options,fullscreen) {
  windowobj = window.open(url,name,options);
  if (fullscreen) {
     windowobj.moveTo(0,0);
     windowobj.resizeTo(screen.availWidth, screen.availHeight);
  }
  windowobj.focus();
  return false;
}

function openpopupName(url,options,fullscreen) {
  windowobj = window.open(url,"QV",options);//Albert
  if (fullscreen) {
     windowobj.moveTo(0,0);
     windowobj.resizeTo(screen.availWidth, screen.availHeight);
  }
  windowobj.focus();
  return false;
}
