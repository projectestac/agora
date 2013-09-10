M.mod_rscormform = {};
M.mod_rscormform.init = function(Y) {
    var rscormform = document.getElementById('rscormviewform');
    var cwidth = rscormplayerdata.cwidth;
    var cheight = rscormplayerdata.cheight;
    var poptions = rscormplayerdata.popupoptions;
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
   rscormform.onsubmit = function() {window.open('', 'Popup', poptions); this.target='Popup';};
}
