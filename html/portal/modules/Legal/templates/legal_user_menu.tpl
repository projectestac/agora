{if $templatetitle|default:'' eq ''}
    {gt text='Legal information' assign='templatetitle'}
{/if}
{pagesetvar name='title' value=$templatetitle}

<div class="z-menu">
    {legaluserlinks}
</div>

{insert name='getstatusmsg'}

<h2>{$templatetitle}</h2>
