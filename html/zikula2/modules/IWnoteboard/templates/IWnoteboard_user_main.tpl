{include file="IWnoteboard_user_menu.tpl"}
{ajaxheader modname=IWnoteboard filename=IWnoteboard.js}
{if $temes_MS|@count gt 2 && $loggedIn}
<form method="post" name="main" action="{modurl modname='IWnoteboard' type='user' func='main' tema=$tema}">
    <input type="hidden" name="saved" value="{$saved}">
    {gt text="Choose a topic"}
    <select name="tema" onchange='submit()'>
        {section name=temes_MS loop=$temes_MS}
        <option {if $tema eq $temes_MS[temes_MS].id}selected{/if} value="{$temes_MS[temes_MS].id}">{$temes_MS[temes_MS].name|safetext}</option>
        {/section}
    </select>
</form>
{/if}
{if $saved eq 1}
<strong>{gt text="List of expired notes"}</strong>
{/if}

<table class="z-datatable">
    <thead>
        <tr align="left">
            <th>
                {gt text="Date"}{if $temes_MS|@count gt 2 && $loggedIn}/{gt text="Topic"}{/if}
            </th>
            <th>
                {gt text="Note content"}
            </th>
            {if $loggedIn || !$notRegisteredSeeRedactors}
            <th>
                {gt text="Informant"}
            </th>
            {/if}
            {if $loggedIn}
            <th>
                {gt text="Options"}
            </th>
            {/if}
        </tr>
    </thead>
    <tbody>
        {foreach item=note from=$anotacions}
        <tr id="note_{$note.nid}">
            <td style="padding: 5px; background-color:{$note.bgcolor}" valign="top" width="80px">
                <div>
                    {if $note.marca eq 1}
                    {img src='flag.png' modname='core' set='icons/extrasmall' __alt='Mark the note with a flag'  id="flag_`$note.nid`"}
                    {else}
                    {img src='flag.png' modname='core' set='icons/extrasmall' __alt='Mark the note with a flag'  style="display: none;" id="flag_`$note.nid`"}
                    {/if}
                </div>
                {$note.data|safetext}
                {if $note.data neq $note.edited and $note.edited neq ''}
                <div>{gt text="Edited by"}</div>
                {$note.edited_by}
                <div>{gt text="at date"}</div>
                {$note.edited|safetext}
                {/if}
                {if $note.acces_tema}
                {$note.tema_anotacio|safetext}
                {/if}
            </td>
            <td style="padding: 5px; background-color:{$note.bgcolor}" valign="top" align="left">
                <div class="messageBody">
                    {$note.noticia|nl2br}
                </div>
                {if $note.mes_info neq '' and $note.mes_info neq 'http://' and $note.text neq ''}
                <div>
                    <a href="{$note.mes_info}" target="_blanc">
                        {$note.text|safetext}
                    </a>
                </div>
                {/if}
                {if $note.fitxer neq '' and $note.textfitxer neq ''}
                <div>
                    <img src="modules/IWmain/images/fileIcons/{$note.fileIcon}" alt="" />
                    <a href="{modurl modname='IWnoteboard' type='user' func='download' fileName=$note.fitxer nid=$note.nid}">
                        {$note.textfitxer|safetext}
                    </a>
                </div>
                {/if}
                <div id="noteinfo_{$note.nid}" class="z-hide z-noteinfo"></div>
                {if $note.admet_comentaris and $note.n_comentaris > 0}
                <div class="comments">
                    {gt text="Comments"}
                </div>
                {foreach item=comment from=$note.comentaris}
                {if $comment.verifica eq 1 or $permisos.potverificar}
                <div id="noteinfo_{$comment.nid}" class="z-hide z-noteinfo">&nbsp;</div>
                <table class="z-datatable" cellspacing="0" bgcolor="{$comment.bgcolorcomentari}" border="1" width="100%" id="note_{$comment.nid}">
                    <tr>
                        <td style="padding: 10px;">
                            <div class="commentInfo">
                                <div>
                                    {$comment.data|safetext} {$comment.hora|safetext} - {$users[$comment.id_user_informa]|safetext}
                                </div>
                                {if $permisos.potverificar and $comment.verifica eq 0}
                                <a href="{modurl modname='IWnoteboard' type='user' func='editacomentari' nid=$comment.nid v=1}" title="{gt text="Validate"}">{img modname='IWnoteboard' src='verifica.gif'}</a>
                                {/if}
                                {if $permisos.potverificar || $comment.id_user eq $comment.id_user_informa}
                                {if $permisos.potverificar || $permisos.nivell >=5}
                                <a href="{modurl modname='IWnoteboard' type='user' func='editacomentari' nid=$comment.nid}" title="{gt text='Edit'}">
                                    {img modname='IWnoteboard' src='editar.gif'}
                                </a>
                                {/if}
                                {if $permisos.potverificar || $permisos.nivell >=6}
                                <a href="javascript:del({$comment.nid},'{gt text="Confirm the action"}')" title="{gt text='Delete'}">
                                   <img src="modules/IWnoteboard/images/del.gif" alt="{gt text='Delete'}">
                                </a>
                                {/if}
                                {/if}
                            </div>
                            <div>
                                {$comment.noticia|nl2br}
                            </div>
                            <div id="noteinfo_{$comment.nid}" class="z-hide z-noteinfo"></div>
                        </td>
                    </tr>
                </table>
                {/if}
                {/foreach}
                {/if}
            </td>
            {if $loggedIn || !$notRegisteredSeeRedactors}
            <td style="padding: 5px; background-color:{$note.bgcolor}" valign="top" width="150px" align="left">
                {$users[$note.created_by]}
                {if $note.photo neq ''}
                <div class="userAvatar">
                    <img src="{$baseurl}{modurl modname='IWnoteboard' type='user' func='getFile' fileName=$note.photo}" alt="" />
                </div>
                {/if}
            </td>
            {/if}
            {if $loggedIn}
            <td style="padding: 5px; background-color:{$note.bgcolor}" align=center valign=top width="10">
                {if $note.verifica eq 0}
                <div>
                    <a href="{modurl modname='IWnoteboard' type='user' func='nova' nid=$note.nid tema=$tema m=v}" title="{gt text='Validate'}">
                        {img modname='IWnoteboard' src='verifica.gif'}
                    </a>
                </div>
                {/if}
                {if $note.pot_editar || ($permisos.potverificar && $saved eq 1)}
                <div>
                    <a href="{modurl modname='IWnoteboard' type='user' func='nova' nid=$note.nid tema=$tema m=e saved=$saved}" title="{gt text='Edit'}">
                        {img modname='IWnoteboard' src='editar.gif'}
                    </a>
                </div>
                {/if}
                {if $note.pot_esborrar || ($permisos.potverificar && $saved eq 1)}
                <div>
                    <a href="javascript:del({$note.nid})" title="{gt text='Delete'}">
                        {img modname='IWnoteboard' src='del.gif'}
                    </a>
                </div>
                {/if}
                {if $saved neq 1}
                <div>
                    <a href="javascript:hide({$note.nid})" title="{gt text='Hide'}">
                        {img modname='IWnoteboard' src='ocultar.gif'}
                    </a>
                </div>
                <div>
                    <a href="{modurl modname='IWnoteboard' type='user' func='hanvist' nid=$note.nid tema=$tema}" title="{gt text='Has been seen by'}">
                        {img modname='IWnoteboard' src='vist.gif'}
                    </a>
                </div>
		{if $note.marca eq 1}
                <div>
                    <a href="javascript:void(0);" onclick="marca({$note.nid})">
                        {img src='marcat.gif' modname='IWnoteboard' __alt='Mark the note with a flag'  style="display: none;" id="marca_`$note.nid`"}{img src='nmarcat.gif' modname='IWnoteboard' __alt='Remove the mark'  id="nomarca_`$note.nid`"}
                    </a>
                </div>
                {else}
                <div>
                    <a href="javascript:void(0);" onclick="marca({$note.nid})" title="{gt text='Mark the note with a flag'}">
                        {img src='marcat.gif' modname='IWnoteboard' __alt='Mark the note with a flag'  id="marca_`$note.nid`"}{img src='nmarcat.gif' modname='IWnoteboard' __alt='Remove the mark'  style="display: none;" id="nomarca_`$note.nid`"}
                    </a>
                </div>
                {/if}
                {/if}
                {if $permisos.potverificar and $saved eq 0}
                <div>
                    <a href="javascript:save({$note.nid})" title="{gt text='Force the expiration of the note'}">
                        {img modname='IWnoteboard' src='save.gif'}
                    </a>
                </div>
                {/if}
                {if $permisos.nivell >= 2 and $saved eq 0 and $note.admet_comentaris}
                <div>
                    <a href="{modurl modname='IWnoteboard' type='user' func='comenta' nid=$note.nid tema=$tema}" title="{gt text='Comment'}">
                        {img modname='IWnoteboard' src='comentar.gif'}
                    </a>
                </div>
                {/if}
            </td>
            {/if}
        </tr>
        {foreachelse}
        <tr>
            <td style="padding: 5px;" valign="top" colspan="5">
                {gt text="There are no notes in the noteboard"}
            </td>
        </tr>
    </tbody>
    {/foreach}
</table>

<script type="text/javascript">
    var deletingnote = "{{gt text="...deleting the note..."}}";
    var addingflag = "{{gt text="...modifying note flag status..."}}";
    var hidingnote = "{{gt text="...hidding note..."}}";
    var savingnote = "{{gt text="...saving note..."}}";
</script>
