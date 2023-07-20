{if $templatetitle|default:'' eq ''}
    {gt text='Legal information' assign='templatetitle'}
{/if}
{moduleheader modname=$module type='user' title=$templatetitle setpagetitle=true insertstatusmsg=true}
