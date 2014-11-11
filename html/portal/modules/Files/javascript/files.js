function failure()
{

}

/*
 * Show the form to create a new folder
 * @author: Albert Pérez Monfort
 * @params: folder => name of the folder where user is
 *          external => 1 if user is in a external plug-in and 0 otherwise
 * @return: form with the needed fields  
 */
function createDir(a,aa,aaa,editor)
{
    $("actionForm").update('<img src="'+Zikula.Config.baseURL+'images/ajax/circle-ball-dark-antialiased.gif">');
    var b={
        folder:a,
        external: aa,
        hook: aaa,
        editor: editor
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=Files&func=createDir",{
        parameters: b,
        onComplete: createDir_response,
        onFailure: failure
    });
}

function createDir_response(a)
{
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("actionForm").update(b.content);
}

/*
 * Show the form to upload a new file
 * @author: Albert Pérez Monfort
 * @params: folder => name of the folder where user is
 *          external => 1 if user is in a external plug-in and 0 otherwise
 * @return: form with the needed fields  
 */
function uploadFile(a,aa,aaa,editor)
{
    $("actionForm").update('<img src="'+Zikula.Config.baseURL+'images/ajax/circle-ball-dark-antialiased.gif">');
    var b={
        folder:a,
        external: aa,
        hook: aaa,
        editor: editor
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=Files&func=uploadFile",{
        parameters: b,
        onComplete: uploadFile_response,
        onFailure: failure
    });
}

function uploadFile_response(a)
{
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("actionForm").update(b.content);
}

/*
 * Submit the upload form
 * @author: Albert Pérez Monfort
 * @return: true if success and false otherwise  
 */
function submitUpdateFile()
{
    document.forms["updateFile"].submit();
    $("actionForm").update('<img src="'+Zikula.Config.baseURL+'images/ajax/circle-ball-dark-antialiased.gif">');
}

/*
 * Submit the create a new dir form
 * @author: Albert Pérez Monfort
 * @return: true if success and false otherwise  
 */
function submitCreateDir()
{
    document.forms["createDir"].submit();
    $("actionForm").update('<img src="'+Zikula.Config.baseURL+'images/ajax/circle-ball-dark-antialiased.gif">');
}

/*
 * Show the form needed to create a new group quota
 * @author: Albert Pérez Monfort
 * @return: The form fields
 */
function newGroupQuota()
{
    $("newQuota").update('<img src="'+Zikula.Config.baseURL+'images/ajax/circle-ball-dark-antialiased.gif">');
    var b={
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=Files&func=newGroupQuota",{
        parameters: b,
        onComplete: newGroupQuota_response,
        onFailure: failure
    });
}

function newGroupQuota_response(a)
{
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("newQuota").update(b.content);
}

/*
 * Submit the new group quota
 * @author: Albert Pérez Monfort
 * @return: True if success and false otherwise
 */
function createGroupQuota()
{
    var a = document.forms["newQuota"].groupId.value;
    var aa = document.forms["newQuota"].quotaValue.value;
    $("newQuota").update('<img src="'+Zikula.Config.baseURL+'images/ajax/circle-ball-dark-antialiased.gif">');
    var b={
        gid:a,
        quota: aa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=Files&func=createGroupQuota",{
        parameters: b,
        onComplete: createGroupQuota_response,
        onFailure: failure
    });
}

function createGroupQuota_response(a)
{
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("quotaTable").update(b.content);
}

/*
 * Delete the quota for a group
 * @author: Albert Pérez Monfort
 * @return: True if success and false otherwise
 */
function deleteGroupQuota(a)
{
    $("newQuota").update('<img src="'+Zikula.Config.baseURL+'images/ajax/circle-ball-dark-antialiased.gif">');
    var b={
        gid:a
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=Files&func=deleteGroupQuota",{
        parameters: b,
        onComplete: deleteGroupQuota_response,
        onFailure: failure
    });
}

function deleteGroupQuota_response(a)
{
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("quotaTable").update(b.content);
}
