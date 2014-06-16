M.mod_rcontentform = {};
M.mod_rcontentform.init = function(Y) {
    var cwidth = rcontentplayerdata.cwidth;
    var cheight = rcontentplayerdata.cheight;
    var poptions = rcontentplayerdata.popupoptions;
    var courseid = rcontentplayerdata.courseid;
    var launch = rcontentplayerdata.launch;
    var launch_url = rcontentplayerdata.launch_url;
    var course_url = M.cfg.wwwroot+"/course/view.php?id="+courseid+"&sesskey="+M.cfg.sesskey;
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

    if (launch == true) {
        //launch_url = launch_url+"&display=popup";
        window.open(launch_url,'Popup', poptions);
        //parent.window.location = course_url;
    }
}
