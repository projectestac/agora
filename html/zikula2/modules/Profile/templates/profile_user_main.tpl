{gt text='Account Panel' assign='templatetitle'}

{include file='profile_user_menu.tpl'}

{section name='accountlinks' loop=$accountlinks}
<div class="z-profilelink" style="width:{math equation='100/x' x=$pncore.Profile.itemsperrow format='%.0d'}%;">
    {if $pncore.Profile.displaygraphics eq 1}
    <a href="{$accountlinks[accountlinks].url|safetext}">{img src=$accountlinks[accountlinks].icon modname=$accountlinks[accountlinks].module set=$accountlinks[accountlinks].set}</a><br />
    {/if}
    <a href="{$accountlinks[accountlinks].url|safetext}">{$accountlinks[accountlinks].title|safetext}</a>
</div>
{/section}
<br style="clear: left" />
