{include file="IWnoteboard_user_menu.tpl"}
<h2>{gt text="Have seen the note"}</h2>
<table width="100%">
    {section name=vist loop=$registres}
    <tr>
        <td>
            {$registres[vist].usuari}
        </td>
    </tr>
    {/section}
</table>
<br />
<br />
<a href="{modurl modname='IWnoteboard' type='user' func='main' tema=$tema}">{gt text="Back to previous table"}</a>
