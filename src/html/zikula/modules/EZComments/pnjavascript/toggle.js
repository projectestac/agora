/* javascript code taken from dustiandiaz.com article entitled Check one, check all Javascript
Reference: http://www.dustindiaz.com/archives/2005/04/check_one_check_all_javascript.php */
function checkAllFields(ref)
{
    var chkAll = document.getElementById('checkAll');
    var checks = document.getElementsByName('comments[]');
    var removeButton = document.getElementById('removeChecked');
    var boxLength = checks.length;
    var allChecked = false;
    var totalChecked = 0;
    if ( ref == 1 )
    {
        if ( chkAll.checked == true )
        {
            for ( i=0; i < boxLength; i++ )
            checks[i].checked = true;
        }
        else
        {
            for ( i=0; i < boxLength; i++ )
            checks[i].checked = false;
        }
    }
    else
    {
        for ( i=0; i < boxLength; i++ )
        {
            if ( checks[i].checked == true )
            {
                allChecked = true;
                continue;
            }
            else
            {
                allChecked = false;
                break;
            }
        }
        if ( allChecked == true )
        chkAll.checked = true;
        else
        chkAll.checked = false;
    }
    for ( j=0; j < boxLength; j++ )
    {
        if ( checks[j].checked == true )
        totalChecked++;
    }
}
