{if $nextpage || $prevpage}
<table width="100%" border="0">
    <tr>
        <td style="background: none repeat scroll 0% 0% transparent ! important;" width="25%">{if $prevpage}
            <a href="{modurl modname='Content' type='user' func='view' pid=$prevpage.id}" {if $prevpage.onlymembers && !$loggedin}class="membersonly"{/if} title="{$prevpage.title|safetext}">{gt text="<- Back"}</a>
            {/if}</td>
        <td style="background: none repeat scroll 0% 0% transparent ! important;" align="center"><a href="{modurl modname='Content' type='user' func='view' pid=$page.parentPageId}">{gt text="Overview"}</a></td>
        <td style="background: none repeat scroll 0% 0% transparent ! important;" width="25%" align="right">{if $nextpage}
            <a href="{modurl modname='Content' type='user' func='view' pid=$nextpage.id}" {if $nextpage.onlymembers && !$loggedin}class="membersonly"{/if} title="{$nextpage.title|safetext}">{gt text="Forward ->"}</a>
            {/if}</td>
    </tr>
</table>
{/if}
