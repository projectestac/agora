{nocache}{include file='user/menu.tpl'}{/nocache}
<div class="">
{pnmodurl modname=News func=view startnum=$startnum assign=returnurl}
{section name=news loop=$newsitems}
{$newsitems[news]}
{/section}
{pager display='page' rowcount=$pager.numitems limit=$pager.itemsperpage posvar='page' maxpages='10'}
</div>
