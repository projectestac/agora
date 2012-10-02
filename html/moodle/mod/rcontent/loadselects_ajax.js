
/** 
 * 
 * Javascript to request ajax calls to rcontent mod
 * 
 */

/**
 * Request isbn list from bd by ajax
 * @param int $levelid ID of the level
 */
function rcontent_load_isbn_list(levelid){ 
	if (levelid!=undefined){
	    var callback = {
	        success: function(o) {/*success handler code*/ 
	    	    fill_select('isbn',o);	    	    
	        },
	    	failure: function(o) {/*failure handler code*/ 
	        	alert(ajax_config.ajaxresponseerror);
	        	//save error in bd by ajax
	            var url=ajax_config.wwwroot +  '/mod/rcontent/loadselects_ajax.php?action=ajaxresponseerror&bookid='+levelid+'&sesskey=' + ajax_config.sesskey;
	            if(ajax_config.cmid!=undefined) url+='&cmid='+ajax_config.cmid;
	            YAHOO.util.Connect.asyncRequest('GET', url);
	        }
	   	};
	    
	    //load data from bd by ajax
	    var url=ajax_config.wwwroot +  '/mod/rcontent/loadselects_ajax.php?action=loadisbn&bookid='+levelid+'&sesskey=' + ajax_config.sesskey;
	    YAHOO.util.Connect.asyncRequest('GET', url, callback);
	}else{
		//save error in bd by ajax
		alert(ajax_config.parametererror);
	    var url=ajax_config.wwwroot +  '/mod/rcontent/loadselects_ajax.php?action=parametererror&bookid='+levelid+'&sesskey=' + ajax_config.sesskey;
	    if(ajax_config.cmid!=undefined) url+='&cmid='+ajax_config.cmid;
        YAHOO.util.Connect.asyncRequest('GET', url);
    }
}

/**
 * Load from bd units list for a single isbn
 * 
 * @param int bookid ID of the book 
 */
function rcontent_load_unit_list(bookid){
	if (bookid!=undefined){
	    var callback = {
	        success: function(o) {/*success handler code*/ 
	    	    fill_select('unit',o);	    	    
	        },
	    	failure: function(o) {/*failure handler code*/ 
	        	alert(ajax_config.ajaxresponseerror);
	        	//save error in bd by ajax
	            var url=ajax_config.wwwroot +  '/mod/rcontent/loadselects_ajax.php?action=ajaxresponseerror&bookid='+bookid+'&sesskey=' + ajax_config.sesskey;
	            if(ajax_config.cmid!=undefined) url+='&cmid='+ajax_config.cmid;
	            YAHOO.util.Connect.asyncRequest('GET', url);
	        }
	   	};
	    //load data from bd by ajax
	    var url=ajax_config.wwwroot +  '/mod/rcontent/loadselects_ajax.php?action=loadunit&bookid='+bookid+'&sesskey=' + ajax_config.sesskey;
	    YAHOO.util.Connect.asyncRequest('GET', url, callback);
	}else{
		//save error in bd by ajax
		alert(ajax_config.parametererror);
	    var url=ajax_config.wwwroot +  '/mod/rcontent/loadselects_ajax.php?action=parametererror&bookid='+bookid+'&sesskey=' + ajax_config.sesskey;
	    if(ajax_config.cmid!=undefined) url+='&cmid='+ajax_config.cmid;
        YAHOO.util.Connect.asyncRequest('GET', url);
    }
}

/**
 * Load from bd activities list for a single isbn and a sigle unit
 * 
 * @param int bookid ID of the book
 * @param int unitid ID of the unit
 */
function rcontent_load_activity_list(bookid, unitid){ 
	if (bookid!=undefined&&unitid!=undefined){
	    var callback = {
	        success: function(o) {/*success handler code*/
	    	    fill_select('activity',o);	    	    
	        },
	    	failure: function(o) {/*failure handler code*/ 
	        	alert(ajax_config.ajaxresponseerror+"..");
	        	//save error in bd by ajax
	        	var url=ajax_config.wwwroot +  '/mod/rcontent/loadselects_ajax.php?action=ajaxresponseerror&bookid='+bookid+'&sesskey=' + ajax_config.sesskey;
	        	if(ajax_config.cmid!=undefined) url+='&cmid='+ajax_config.cmid;
	            YAHOO.util.Connect.asyncRequest('GET', url);
	        }
	   	};
	    //load data from bd by ajax
	    var url=ajax_config.wwwroot +  '/mod/rcontent/loadselects_ajax.php?action=loadactivity&bookid='+bookid+'&unitid='+unitid+'&sesskey=' + ajax_config.sesskey;
	    YAHOO.util.Connect.asyncRequest('GET', url, callback);
	}else{
		alert(ajax_config.parametererror+".");
		//save error in bd by ajax
		var url=ajax_config.wwwroot +  '/mod/rcontent/loadselects_ajax.php?action=parametererror&bookid='+bookid+'&sesskey=' + ajax_config.sesskey;
		if(ajax_config.cmid!=undefined) url+='&cmid='+ajax_config.cmid;
        YAHOO.util.Connect.asyncRequest('GET', url);
	}
	
}

/**
 * Shows the loaded list
 * 
 * @param string id name of the select list
 * @param json o data loades from bd
 */
function fill_select(id,o){
	
    var response=[];
    var select=document.getElementById('id_'+id);
    
  //first remove other select options
    if (id=='isbn'){
        select_unit=YAHOO.util.Dom.get('id_unit');
        for(i = select_unit.length - 1; i>=0; i--){
    	    select_unit.remove(i);	
        }
        var option = document.createElement('option');
        option.appendChild(document.createTextNode(ajax_config.get_string_unit));
        option.setAttribute('value', '0');
        select_unit.appendChild(option);
    }
    if (id=='unit'||id=='isbn'){
        select_activity=YAHOO.util.Dom.get('id_activity');
        for(i = select_activity.length - 1; i>=0; i--){
    	    select_activity.remove(i);	
        }
        var option = document.createElement('option');
        option.appendChild(document.createTextNode(ajax_config.get_string_activity));
        option.setAttribute('value', '0');
        select_activity.appendChild(option);
    }
    
    for(i = select.length - 1; i>=0; i--){
        select.remove(i);	
    }
    
    //second show new select options
    if(o.responseText!='[""]'){
    
        // Use the JSON Utility to parse the data returned from the server
        try{
            response=YAHOO.lang.JSON.parse(o.responseText);
        }
        catch(e){
        	alert(ajax_config.jsonerror);
            //save error in bd by ajax
    		var url=ajax_config.wwwroot +  '/mod/rcontent/loadselects_ajax.php?action=jsonerror&bookid='+bookid+'&sesskey=' + ajax_config.sesskey;
    		if(ajax_config.cmid!=undefined) url+='&cmid='+ajax_config.cmid;
            YAHOO.util.Connect.asyncRequest('GET', url);
            return;
        }
        
        // The returned data was parsed into an array of objects
        for (var i = 0, len = response.length; i < len; ++i) {
   	        //second fill new options
            var r = response[i]; 
            var option = document.createElement('option');
            option.appendChild(document.createTextNode(r.name));
            option.setAttribute('value', r.id);
            select.appendChild(option);
        }
    }
}