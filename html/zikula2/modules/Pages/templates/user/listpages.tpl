{gt text='Pages list' assign=templatetitle}
{pagesetvar name='title' value=$templatetitle}
{insert name='getstatusmsg'}

<h2>{gt text='Pages list'}</h2>
<p>{gt text='Available pages:'}</p>

<ul>
    {foreach item='page' from=$pages}
    {include file='user/pagelink.tpl'}
    {/foreach}
</ul>

{pager show='page' rowcount=$pager.numitems limit=$pager.itemsperpage posvar='startnum'}