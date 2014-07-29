M.local_rcommon = {};

M.local_rcommon.init = function(){
        return;
};

M.local_rcommon.exec_test = function(id_cr){
        //show loading_small and hide others
        document.getElementById("loading_small_" + id_cr).style.visibility = "visible";
        document.getElementById("desc_" + id_cr).innerHTML = "";

        var url = M.cfg.wwwroot+"/local/rcommon/state/check_credentials.php?id_cr=" + id_cr;
        var callback = {
                method: 'POST',
                on: {
                        success: function(id, o, args) {
                            document.getElementById("loading_small_" + id_cr).style.visibility = "hidden";
                            document.getElementById("desc_" + id_cr).innerHTML = o.responseText;
                        },
                        failure: function(id, o, args) {
                            alert("exec_test ajax failure: " + o.responseText);
                            document.getElementById("loading_small_" + id_cr).style.visibility = "hidden";
                        }
                },
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                context: this,
                arguments: this
        };
        Y.io(url, callback);
        return false;
};

M.local_rcommon.check_publishers = function(id_cr){
        //show loading_small and hide others
        document.getElementById("loading_small").style.visibility = "visible";

        var url = M.cfg.wwwroot+"/local/rcommon/state/check_publishers.php";
        var callback = {
                method: 'POST',
                on: {
                        success: function(id, o, args) {
                            document.getElementById("loading_small").style.visibility = "hidden";
                            var pubs = o.responseXML.getElementsByTagName("publisher");
                            for (x=0; x < pubs.length; x++) {
                                var id = pubs[x].getAttribute("id");
                                var state = pubs[x].getAttribute("state");
                                document.getElementById("pubstate"+id).innerHTML = pubs[x].firstChild.nodeValue;
                                if(state == 0){
                                    document.getElementById("pubstate"+id).className = "notifyproblem";
                                } else {
                                    document.getElementById("pubstate"+id).className = "notifysuccess";
                                }
                            }
                        },
                        failure: function(id, o, args) {
                            document.getElementById("loading_small").style.visibility = "hidden";
                        }
                },
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                context: this,
                arguments: this
        };
        Y.io(url, callback);
        return false;
};
