var poptions = null;
M.mod_rcontentform = {};
M.mod_rcontentform.init = function(Y) {
    var rcontentform = document.getElementById('rcontentviewform');
    var cwidth = rcontentplayerdata.cwidth;
    var cheight = rcontentplayerdata.cheight;
    poptions = rcontentplayerdata.popupoptions;
    if ((cwidth==100) && (cheight==100)) {
        poptions = poptions+',width='+screen.availWidth+',height='+screen.availHeight+',left=0,top=0';
    } else {
        if (cwidth<=100) {
            cwidth = Math.round(screen.availWidth * cwidth / 100);
        }
        if (cheight<=100) {
            cheight = Math.round(screen.availHeight * cheight / 100);
        }
        poptions = poptions+',width='+cwidth+',height='+cheight;
    }
   rcontentform.onsubmit = function() {
        windowobj = openit();
        windowobj.focus();
   };
}
function openit() {
    windowobj = window.open('', 'Popup', poptions); 
    this.target='Popup';
    return windowobj;
}
M.mod_rcontentform.dosubmit = function(Y) {
   windowobj = openit();
   var rcontentform = document.getElementById('rcontentviewform');
   rcontentform.submit();
   if (windowobj)
    windowobj.focus();
}
