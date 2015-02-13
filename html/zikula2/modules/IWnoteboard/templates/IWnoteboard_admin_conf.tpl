<script type="text/javascript" src="modules/IWmain/js/ColorPicker2.js"></script>
<script type="text/javascript" src="modules/IWmain/js/AnchorPosition.js"></script>
<script type="text/javascript" src="modules/IWmain/js/PopupWindow.js"></script>
{include file="IWnoteboard_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large'}</div>
    <h2>{gt text="Module configuration"}</h2>
    {if $topicsSystem eq 0}
    <table class="z-datatable">
        <thead>
            <tr align="left">
                <th colspan="4">{gt text="List of topics"}</th>
            </tr>
            <tr>
                <th>{gt text="Topic"}</th>
                <th>{gt text="Description"}</th>
                <th>{gt text="Group with access"}</th>
                <th>{gt text="Options"}</th>
            </tr>
        </thead>
        <tbody>
            {foreach item=topic from=$temes}
            <tr class="{cycle values="pn-odd,pn-even"}" id="topic_{$topic.tid}">
                <td align="left">
                     {$topic.nomtema}
                 </td>
                 <td align="left">
                     {$topic.descriu}
                     <div id="topicinfo_{$topic.tid}" class="z-hide z-noteinfo">&nbsp;</div>
                 </td>
                 <td align="left">
                     {$topic.grup}
                 </td>
                 <td align="center">
                     <a href="{modurl modname='IWnoteboard' type='admin' func='editar' tid=$topic.tid}">
                         {img modname='core' src='xedit.png' set='icons/extrasmall'   __alt="Edit" __title="Edit"}
                     </a>
                     <a href="javascript:deltopic({$topic.tid})" title="{gt text='Delete the topic'}">
                         {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall'   __alt="Edit" __title="Delete"}
                     </a>
                 </td>
             </tr>
             {foreachelse}
             <tr>
                 <td colspan="4" align="left">
                     {gt text="There are no defined topics"}
                 </td>
             </tr>
             {/foreach}
            </tbody>
        </table>
        <a href="{modurl modname='IWnoteboard' type='admin' func='noutema'}">
            {gt text="Create a new topic"}
        </a>
        {else}
        <div class="z-formrow">
        {nocache}
        <ul>
            {foreach from=$cats key=property item=category}
            <li>{$category.name}</li>
            {/foreach}
        </ul>
        {/nocache}
    </div>
    {/if}
    <form class="z-form" enctype="application/x-www-form-urlencoded" method="post" id="conf" action="{modurl modname='IWnoteboard' type='admin' func='confupdate'}">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <table class="z-datatable">
            <thead>
                <tr align="left">
                    <th rowspan="2" valign="bottom">{gt text="Groups"}</th>
                    <th colspan="2">{gt text="Groups that can be chosen when sending a note"}</th>
                    <th colspan="2">{gt text="Permission level of the users"}</th>
                </tr>
                <tr>
                    <th>{gt text="Can be chosen"}</th>
                    <th>{gt text="Checked by default"}</th>
                    <th>{gt text="Permissions"}</th>
                    <th>{gt text="Validation required"}</th>
                </tr>
            </thead>
            <tbody>
                {section name=grups loop=$grups}
                <tr class="{cycle values="pn-odd,pn-even"}">
                    <td align="left" valign="top">
                         {$grups[grups].name}
                     </td>
                     <td valign="top" align="center">
                         <input type="checkbox" name="g[]" {if $grups[grups].select}checked{/if} value="{$grups[grups].id}" />
                     </td>
                     <td valign="top" align="center">
                         <input type="checkbox" name="m[]" {if $grups[grups].select1}checked{/if} value="{$grups[grups].id}" />
                     </td>
                     <td valign="top" align="center">
                         {if $grups[grups].id neq 0}
                         <select name="p[]">
                             <option value="1" {if $grups[grups].permis eq 1}selected{/if}>{gt text="1 - Read"}</option>
                             <option value="2" {if $grups[grups].permis eq 2}selected{/if}>{gt text="2 - Comment"}</option>
                             <option value="3" {if $grups[grups].permis eq 3}selected{/if}>{gt text="3 - Write"}</option>
                             <option value="4" {if $grups[grups].permis eq 4}selected{/if}>{gt text="4 - Choose users who are going to see the note"}</option>
                             <option value="5" {if $grups[grups].permis eq 5}selected{/if}>{gt text="5 - Edit the own notes"}</option>
                             <option value="6" {if $grups[grups].permis eq 6}selected{/if}>{gt text="6 - Delete the own notes"}</option>
                             <option value="7" {if $grups[grups].permis eq 7}selected{/if}>{gt text="7 - Edit and delete notes sent by others"}</option>
                         </select>
                         {else}
                         <input type="hidden" value="1" name="p[]" />{gt text="1 - Read"}
                         {/if}
                     </td>
                     <td valign="top" align="center">
                         {if $grups[grups].id neq 0}
                         <input type="checkbox" name="v[]" {if $grups[grups].select2}checked{/if} value="{$grups[grups].id}" />
                                {else}
                                <input type="hidden" value="" name="v[]" />
                         {/if}
                     </td>
                 </tr>
                 {/section}
                </tbody>
            </table>
            <strong>{gt text="Warning: "}</strong> {gt text="Every permission level includes lower levels"}
            {if not $multizk}
            <div class="z-formrow">
                <label for="directoriroot">{gt text="Root of the file folder"}</label>
                <input type="text" name="directoriroot" size="50" maxlength="50" value="{$directoriroot}" onFocus='blur()' />
            </div>
            {/if}
            <div class="z-formrow">
                <label for="attached">{gt text="Server folder for attached files"}</label>
                <input type="text" name="attached" size="30" maxlength="30" value="{$attached}" />
                {if $noFolder}
                <div class="z-errormsg z-formnote">
                    {gt text="The attached files folder have not been found."}
                </div>
                {/if}
                {if $noWriteable}
                <div class="z-errormsg z-formnote">
                    {gt text="The attached files folder needs write permissions."}
                </div>
                {/if}
            </div>
            <div class="z-formrow">
                <label for="q">{gt text="Group to verify notes"}</label>
                <select name="q">
                    <option></option>
                    {section name=grups loop=$grups}
                    {if $grups[grups].id neq 0}
                    <option {if $grups[grups].id eq $quiverifica}selected{/if} value="{$grups[grups].id}">{$grups[grups].name}</option>
                    {/if}
                    {/section}
                </select>
            </div>
            <div class="z-formrow">
                <label for="notifyNewEntriesByMail">{gt text="Notify new entries by email"}</label>
                <input id="notifyNewEntriesByMail" type="checkbox" {if $notifyNewEntriesByMail}checked{/if} name="notifyNewEntriesByMail" value="1"/>
            </div>
            <div class="z-formrow">
                <label for="notifyNewCommentsByMail">{gt text="Notify new comments to authors by email"}</label>
                <input id="notifyNewCommentsByMail" type="checkbox" {if $notifyNewCommentsByMail}checked{/if} name="notifyNewCommentsByMail" value="1"/>
            </div>
            <div class="z-formrow">
                <label for="commentCheckedByDefault">{gt text="The comments option is checked by default"}</label>
                <input id="commentCheckedByDefault" type="checkbox" {if $commentCheckedByDefault}checked{/if} name="commentCheckedByDefault" value="1"/>
            </div>
            <div class="z-formrow">
                <label for="c">{gt text="The notes expire at"}</label>
                <input type="text" name="c" maxlength="3" size="3" value="{$caducitat}" /> {gt text="days from their creation"}
            </div>
            <div class="z-formrow">
                <label for="editPrintAfter">{gt text="Inform about edition after the minutes given from creation time (-1 = never)"}</label>
                <input type="text" name="editPrintAfter" size="5" maxlength="5" value="{$editPrintAfter}" />
            </div>
            <div class="z-formrow">
                <label for="r">{gt text="When addressee cannot be chosen are"}</label>
                <select name="r">
                    <option value="0" {if $repperdefecte eq 0}selected{/if}>{gt text="All users"}</option>
                    <option value="1" {if $repperdefecte eq 1}selected{/if}>{gt text="Users from groups checked by default"}</option>
                    <option value="2" {if $repperdefecte eq 2}selected{/if}>{gt text="Users chosen during the validation of the note"}</option>
                </select>
            </div>
            <div class="z-formrow">
                <label for="smallAvatars">{gt text="Use small avatars"}</label>
                <input type="checkbox" {if $smallAvatars}checked{/if} name="smallAvatars" value="1"/>
            </div>
            <div class="z-formrow">
                <label for="notRegisteredSeeRedactors">{gt text="Unregistered cannot see who has sent the notes"}</label>
                <input type="checkbox" {if $notRegisteredSeeRedactors}checked{/if} name="notRegisteredSeeRedactors" value="1"/>
            </div>
            <div class="z-formrow">
                <label for="multiLanguage">{gt text="Multi language notes are allowed"}</label>
                <input type="checkbox" {if $multiLanguage}checked{/if} name="multiLanguage" value="1"/>
            </div>
            <div class="z-formrow">
                <label for="shipHeadersLines">{gt text="Skip Headlines"}</label>
                <input type="checkbox" {if $shipHeadersLines}checked{/if} name="shipHeadersLines" value="1"/>
            </div>
            <div class="z-formrow">
                <label for="color1">{gt text="Row color one for visited notes"}</label>
                <div class="z-formnote">
                    <input type="text" name="color1" id="color1" size="7" maxlength="7" style="background-color:{$colorrow1};" value="{$colorrow1}" />
                <a href="#" onClick="pick('pick','color1');return false;" name="pick" id="pick">
                    {gt text="Choose a color"}
                </a>
            </div>
        </div>
        <div class="z-formrow">
            <label for="color2">{gt text="Row color two for visited notes"}</label>
            <div class="z-formnote">
                <input type="text" name="color2" id="color2" size="7" maxlength="7" style="background-color:{$colorrow2};" value="{$colorrow2}" />
                <a href="#" onClick="pick('pick','color2');return false;" name="pick" id="pick">
                    {gt text="Choose a color"}
                </a>
            </div>
        </div>
        <div class="z-formrow">
            <label for="colornew1">{gt text="Row color one for not visited notes"}</label>
            <div class="z-formnote">
                <input type="text" name="colornew1" id="colornew1" size="7" maxlength="7" style="background-color:{$colornewrow1};" value="{$colornewrow1}" />
                <a href="#" onClick="pick('pick','colornew1');return false;" name="pick" id="pick">
                    {gt text="Choose a color"}
                </a>
            </div>
        </div>
        <div class="z-formrow">
            <label for="colornew2">{gt text="Row color tho for not visited notes"}</label>
            <div class="z-formnote">
                <input type="text" name="colornew2" id="colornew2" size="7" maxlength="7" style="background-color:{$colornewrow2};" value="{$colornewrow2}" />
                <a href="#" onClick="pick('pick','colornew2');return false;" name="pick" id="pick">
                    {gt text="Choose a color"}
                </a>
            </div>
        </div>
        <div class="z-center">
            <div class="z-buttons">
                <a href="javascript:send();">
                    {img modname='core' src='button_ok.png' set='icons/small'} {gt text="Modify the configuration"}
                </a>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    var deletingtopic = '{{gt text="...deleting topic..."}}';
    var deletingshared = '{{gt text="...deleting shared noteboard..."}}';
    var changingsharedURL = '{{gt text="...deleting shared URL..."}}';

    var cp = new ColorPicker('window');
    // Runs when a color is clicked

    function pickColor(color) {
        field.value = color;
        //document.forms.conf.color1.style.backgroundColor=color;
        changeColor();
    }

    var field;
    function pick(anchorname,camp) {
        field = eval('document.forms.conf.'+camp);
        cp.show(anchorname);
    }
	
    function changeColor(){
        document.forms.conf.color1.style.backgroundColor=document.forms.conf.color1.value;
        document.forms.conf.color2.style.backgroundColor=document.forms.conf.color2.value;
        document.forms.conf.colornew1.style.backgroundColor=document.forms.conf.colornew1.value;
        document.forms.conf.colornew2.style.backgroundColor=document.forms.conf.colornew2.value;
    }
</script>
