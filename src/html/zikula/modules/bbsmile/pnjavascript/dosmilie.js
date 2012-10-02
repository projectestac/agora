// $Id: dosmilie.js 101 2008-06-23 20:59:43Z Landseer $

Event.observe(window, 'load', function() {
        $$('.bbsmile_smilies').each(function(el) {
            el.removeClassName('bbsmile_smilies');
        });
        if($('smiliemodal')) {
            new Control.Modal($('smiliemodal'), {});
        }
    });
    
    
// new function
function AddSmilie(textfieldname, SmilieCode) {
    var SmilieCode;
    var revisedMessage;
    var textfield = $(textfieldname);

    Control.Modal.close()

    if(textfield==null) {
        alert("internal error: unknown textfieldname '" + textfieldname + "'supplied");
        return;
    }

    //
    // for Internet Explorer
    //
    if(typeof document.selection != 'undefined') {
        textfield.focus();
        var range = document.selection.createRange();
        //var insText = range.text;

        range.text = SmilieCode; //aTag + insText + eTag;
        range = document.selection.createRange();
        range.move('character', -SmilieCode.length);
    }
    //
    // for Gecko based browsers
    //
    else if(typeof textfield.selectionStart != 'undefined')
    {

        var start = textfield.selectionStart;
        var end = textfield.selectionEnd;
        var insText = textfield.value.substring(start, end);

        // insert Smilie
        textfield.value = textfield.value.substr(0, start) + SmilieCode + textfield.value.substr(end);

        // adjust cursorposition
        textfield.selectionStart = start + SmilieCode.length;
        textfield.selectionEnd = start + SmilieCode.length;
    }
    //
    // for all other browsers
    //
    else
    {
        // insert at end
        textfield.value = textfield.value + SmilieCode;
    }
    textfield.focus();

}

function togglesmilies(theid)
{
    if($(theid)) {
        $(theid).toggleClassName('hidden');
    }
}
//
// old and deprecated functions, not longer maintained!
//
//
// old function wrapper
function DoSmilie(SmilieCode) {
    return AddSmilie('post', SmilieCode);
}

// new ShowHide, taken from pnUpper
function getFormObject(name, form) {
    var myobj = null;
    if (document.getElementById) myobj = document.getElementById(name);
    else if (document.all) myobj = document.all[name];
    else myobj = document.forms[form][name];
    if (!myobj) alert('Internal error with field ' + name + '!!');
    else return myobj;
}


function ShowHide(id) {
    var myobj = getFormObject(id, '');
    if (myobj.style) {
        if (myobj.style.display == "none") { myobj.style.display = ""; }
        else { myobj.style.display = "none"; }
    }
    else {
        myobj.visibility = "show";
    }
}


