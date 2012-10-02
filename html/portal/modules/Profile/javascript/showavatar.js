// Copyright 2011 Zikula Foundation.

function showavatar()
{
    if ($('prop_avatar') && $('youravatardisplay')) {
        $('youravatardisplay').src = Zikula.Config.baseURL + $('youravatarpath').innerHTML + '/' + $('prop_avatar').options[$('prop_avatar').selectedIndex].value;
    }
}
