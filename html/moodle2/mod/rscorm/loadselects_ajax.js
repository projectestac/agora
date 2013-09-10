
//MARSUPIAL ********** AFEGIT - js to requests ajax calls

/** 
 * 
 * Javascript to request ajax calls to rscorm mod
 * 
 */

/**
 * Request isbn list from bd by ajax
 * 
 * @param int $levelid ID of the level
 */
function rscorm_load_isbn_list(levelid){ 
    if (levelid!=undefined){
        var callback = {
            success: function(o) {/*success handler code*/ 
                fill_select('isbn',o);	    	    
            },
            failure: function(o) {/*failure handler code*/ 
                rscorm_yui_ajax_process_error('ajaxresponseerror');
            }
        };

        //load data from bd by ajax
        var url=ajax_config.wwwroot +  '/mod/rscorm/loadselects_ajax.php?action=loadisbn&bookid='+levelid+'&sesskey=' + ajax_config.sesskey;
        rscorm_yui_async_request(url, callback);
    }else{
        rscorm_yui_ajax_process_error('parametererror');
    }
}

/**
 * Request unit list from bd by ajax
 * 
 * @param int $bookid ID of book
 */
function rscorm_load_unit_list(bookid){
    if (bookid!=undefined){
        var callback = {
            success: function(o) {/*success handler code*/ 
                fill_select('unit',o);	    	    
            },
            failure: function(o) {/*failure handler code*/ 
                rscorm_yui_ajax_process_error('ajaxresponseerror');
            }
        };

        //load data from bd by ajax
        var url=ajax_config.wwwroot +  '/mod/rscorm/loadselects_ajax.php?action=loadunit&bookid='+bookid+'&sesskey=' + ajax_config.sesskey;
        rscorm_yui_async_request(url, callback);
    }else{
        rscorm_yui_ajax_process_error('parametererror');
    }
}

/**
 * Request activity list from bd by ajax
 * 
 * @param int $bookid ID of book
 * @param int $unitid ID of unit
 */
function rscorm_load_activity_list(bookid, unitid){
    if (bookid!=undefined&&unitid!=undefined){
        var callback = {
            success: function(o) {/*success handler code*/
                fill_select('activity',o);	    	    
            },
            failure: function(o) {/*failure handler code*/ 
                rscorm_yui_ajax_process_error('ajaxresponseerror');
            }
            };
        //load data from bd by ajax
        var url=ajax_config.wwwroot +  '/mod/rscorm/loadselects_ajax.php?action=loadactivity&bookid='+bookid+'&unitid='+unitid+'&sesskey=' + ajax_config.sesskey;
        rscorm_yui_async_request(url, callback);
    }else{
        rscorm_yui_ajax_process_error('parametererror');
    }
}

/**
 * Fill the selected combo width the responsed data
 * 
 * @param string id ID od the selected combo
 * @param object o responsed data
 */
function fill_select(id,o){
    var response=[];
    var select=document.getElementById('id_'+id);

    //first remove other select options
    if (id=='isbn'){
        select_unit=document.getElementById('id_unit');
        for(i = select_unit.length - 1; i>=0; i--){
            select_unit.remove(i);	
        }
        var option = document.createElement('option');
        option.appendChild(document.createTextNode(ajax_config.get_string_unit));
        option.setAttribute('value', '0');
        select_unit.appendChild(option);
    }
    if (id=='unit'||id=='isbn'){
        select_activity=document.getElementById('id_activity');
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
        // Parse the data returned from the server
        try{
            response = rscorm_yui_json_parse(o.responseText);
        } catch(e){
            rscorm_yui_ajax_process_error('jsonerror');
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

function rscorm_yui_async_request(url){
    yui_async_request(url, null);
}

function rscorm_yui_async_request(url, callback){
    if(typeof YAHOO != 'undefined') {
        // Up to Moodle 2.3 
        YAHOO.util.Connect.asyncRequest('GET', url, callback);
    } else{
        // Moodle 2.4 or higuer
        YUI().use('yui2-json', 'yui2-connection', 'yui2-event', function(Y) {
            Y.YUI2.util.Connect.asyncRequest('GET', url, callback)
        });
    }
}

function rscorm_yui_ajax_process_error (typerror){
    //save error in bd by ajax
    alert(eval('ajax_config.'+typerror));
    var url=ajax_config.wwwroot +  '/mod/rscorm/loadselects_ajax.php?action='+typerror+'&bookid='+bookid+'&sesskey=' + ajax_config.sesskey;
    if(ajax_config.cmid!=undefined) url+='&cmid='+ajax_config.cmid;
    rscorm_yui_async_request(url);
}

function rscorm_yui_json_parse(responseText){
    if(typeof YAHOO != 'undefined') {
        // Up to Moodle 2.3 
        resp = YAHOO.lang.JSON.parse(responseText);
    } else{
        // Moodle 2.4 or higuer
        YUI().use('json-parse', 'json-stringify', function (Y) {
            resp = Y.JSON.parse(responseText);
        });
    }
    return resp;
}


//********** FI