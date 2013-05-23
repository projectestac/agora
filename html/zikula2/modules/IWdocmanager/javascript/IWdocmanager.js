function failure()
{

}

function addCategory(a){
    var b={
        categoryId:a
    };
    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWdocmanager&func=addCategory",{
        parameters: b,
        onComplete: addCategory_response,
        onFailure: failure
    });
}

function addCategory_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("newCategory_" + b.categoryId).update(b.content);
}

function cancelCreateCategory(a){
    $("newCategory_" + a).update('');
}

function editCategory(a){
    var b={
        categoryId:a
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWdocmanager&func=editCategory",{
        parameters: b,
        onComplete: editCategory_response,
        onFailure: failure
    });
}

function editCategory_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }

    var b=a.getData();
    $("newCategory_" + b.categoryId).update(b.content);
}

function deleteCategory(a){
    var r = confirm(deteleText);
    
    if (!r) {
        return true;
    }
    
    var b={
        categoryId:a
    };
    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWdocmanager&func=deleteCategory",{
        parameters: b,
        onComplete: deleteCategory_response,
        onFailure: failure
    });
}

function deleteCategory_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("categoryId_" + b.categoryId).update('');
}

function createCategory(a){
    var f = document.forms['add_' + a];
    var aa = f.categoryName.value;
    var aaa = f.description.value;
    var aaaa = f.active.value;
    var aaaaa = '';
    var aaaaaa = '';

    var groups = f.elements['groups[]'];
    for (var i = 0; i < groups.length; i++) {
        if (groups[i].checked) {
            aaaaa = aaaaa + '$' + groups[i].value + '$';
        }
    }

    var groupsAdd = f.elements['groupsAdd[]'];
    for (var j = 0; j < groupsAdd.length; j++) {
        if (groupsAdd[j].checked) {
            aaaaaa = aaaaaa + '$' + groupsAdd[j].value + '$';
        }
    }
    
    var b={
        categoryId:a,
        categoryName:aa,
        description:aaa,
        active:aaaa,
        groups:aaaaa,
        groupsAdd:aaaaaa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWdocmanager&func=createCategory",{
        parameters: b,
        onComplete: createCategory_response,
        onFailure: failure
    });
}

function createCategory_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    
    $("IWdocmanager_admin").update(b.content);
}

function updateCategory(a){
    var f = document.forms['edit_' + a];
    var aa = f.categoryName.value;
    var aaa = f.description.value;
    var aaaa = f.active.value;
    var aaaaa = '';
    var aaaaaa = '';
    
    var groups = f.elements['groups[]'];
    for (var i = 0; i < groups.length; i++) {
        if (groups[i].checked) {
            aaaaa = aaaaa + '$' + groups[i].value + '$';
        }
    }
    
    var groupsAdd = f.elements['groupsAdd[]'];
    for (var j = 0; j < groupsAdd.length; j++) {
        if (groupsAdd[j].checked) {
            aaaaaa = aaaaaa + '$' + groupsAdd[j].value + '$';
        }
    }
    
    var b={
        categoryId:a,
        categoryName:aa,
        description:aaa,
        active:aaaa,
        groups:aaaaa,
        groupsAdd:aaaaaa
    };
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWdocmanager&func=updateCategory",{
        parameters: b,
        onComplete: updateCategory_response,
        onFailure: failure
    });
}

function updateCategory_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    
    $("IWdocmanager_admin").update(b.content);
}

function openDocumentLink(a){
    var b={
        documentId:a
    };
    
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWdocmanager&func=openDocumentLink",{
        parameters: b,
        onComplete: openDocumentLink_response,
        onFailure: failure
    });
}

function openDocumentLink_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    $("documentsContent").update(b.content);
}

function validateDocument(a){
    var b={
        documentId:a
    };
       
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWdocmanager&func=validateDocument",{
        parameters: b,
        onComplete: validateDocument_response,
        onFailure: failure
    });
}

function validateDocument_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    
    $("documentsContent").update(b.content);
}

function deleteDocument(a){
    var r = confirm(deteleText);
    
    if (!r) {
        return true;
    }
    var b={
        documentId:a
    };
       
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWdocmanager&func=deleteDocument",{
        parameters: b,
        onComplete: deleteDocument_response,
        onFailure: failure
    });
}

function deleteDocument_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    
    $("documentsContent").update(b.content);
}

function viewDocumentVersions(a){
    var b={
        documentId:a
    };
       
    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWdocmanager&func=viewDocumentVersions",{
        parameters: b,
        onComplete: viewDocumentVersions_response,
        onFailure: failure
    });
}

function viewDocumentVersions_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    
    $("documentsContent").update(b.content);
}

function viewDocuments(a){
    var b={
        documentId:a
    };

    var c=new Zikula.Ajax.Request(Zikula.Config.baseURL+"ajax.php?module=IWdocmanager&func=viewDocuments",{
        parameters: b,
        onComplete: viewDocuments_response,
        onFailure: failure
    });
}

function viewDocuments_response(a){
    if(!a.isSuccess()){
        Zikula.showajaxerror(a.getMessage());
        return
    }
    var b=a.getData();
    
    $("documentsContent").update(b.content);
}