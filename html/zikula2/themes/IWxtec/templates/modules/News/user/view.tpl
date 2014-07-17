{nocache}{include file='user/menu.tpl'}{/nocache}
<div class="">
{modurl modname='News' func='view' type='user' startnum=$startnum assign='returnur'l}
{section name=news loop=$newsitems}
    {$newsitems[news]}
{/section}
{pager display='page' rowcount=$pager.numitems limit=$pager.itemsperpage posvar='page' maxpages='10'}
</div>
