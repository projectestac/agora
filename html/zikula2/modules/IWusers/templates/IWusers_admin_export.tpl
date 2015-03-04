{ajaxheader modname=$modinfo.name filename='IWusers.js' ui=true}
{adminheader}
{insert name='getstatusmsg'}
<div class="z-adminpageicon">{img modname='core' src='fileexport.png' set='icons/large'}</div>
<h2>{gt text="Export to CSV"}</h2>
<!-- Selecció dels camps a exportar -->
<form class="z-form" action="{modurl modname='IWusers' type='admin' func='exporter'}" method="post" enctype="multipart/form-data">
    <div>
        <input type="hidden" name="confirmed" value="1" />
        <input type="hidden" id="users_csrftoken" name="csrftoken" value="{insert name='csrftoken'}" />
        <fieldset>
            <legend>{gt text ="Export options"}</legend>

            <table class="z-admintable">
                <thead>
                    <tr>
                        <th colspan="8">{gt text="Add to the export file"}</th>
                    </tr>
                </thead>                   
                <tr>
                    <td>                        
                        <input id="export_email" type="checkbox" name="export_email" value="1" 
                           {if (isset($export_email))}
                               {if ($export_email)}
                                   checked="checked" 
                               {/if}
                           {else}
                               checked="checked"
                           {/if}
                        />                
                        <label for="export_email">{gt text="email"}</label>
                    </td>
                    <td>  
                        <input id="export_activated" type="checkbox" name="export_activated" value="1"
                            {if (isset($export_activated))}
                               {if ($export_activated)}
                                   checked="checked" 
                               {/if}
                           {else}
                               checked="checked"
                           {/if}
                        />                
                        <label for="export_activated">{gt text="activated"}</label>                        
                    </td>
                    <td>                         
                        <input id="export_firstname" type="checkbox" name="export_firstname" value="1"
                            {if (isset($export_firstname))}
                               {if ($export_firstname)}
                                   checked="checked" 
                               {/if}
                           {else}
                               checked="checked"
                           {/if}
                        />          
                        <label for="export_firstname">{gt text="firstname"}</label>
                    </td>
                    <td>                         
                        <input id="export_lastname1" type="checkbox" name="export_lastname1" value="1"
                            {if (isset($export_lastname1))}
                               {if ($export_lastname1)}
                                   checked="checked" 
                               {/if}
                           {else}
                               checked="checked"
                           {/if}
                        />          
                        <label for="export_lastname1">{gt text="lastname1"}</label>
                    </td>
                    <td>                         
                        <input id="export_lastname2" type="checkbox" name="export_lastname2" value="1"
                            {if (isset($export_lastname2))}
                               {if ($export_lastname2)}
                                   checked="checked" 
                               {/if}
                           {else}
                               checked="checked"
                           {/if}
                        />          
                        <label for="export_lastname2">{gt text="lastname2"}</label>
                    </td>
                    <td>                         
                        <input id="export_birthdate" type="checkbox" name="export_birthdate" value="1"
                            {if (isset($export_birthdate))}
                               {if ($export_birthdate)}
                                   checked="checked" 
                               {/if}
                           {else}
                               checked="checked"
                           {/if}
                        />          
                        <label for="export_birtdate">{gt text="birthdate"}</label>
                    </td>
                    <td>                         
                        <input id="export_gender" type="checkbox" name="export_gender" value="1"
                            {if (isset($export_gender))}
                               {if ($export_gender)}
                                   checked="checked" 
                               {/if}
                           {else}
                               checked="checked"
                           {/if}
                        />          
                        <label for="export_gender">{gt text="gender"}</label>
                    </td>
                    <td>                         
                        <input id="export_groups" type="checkbox" name="export_groups" value="1"
                            {if (isset($export_groups))}
                               {if ($export_groups)}
                                   checked="checked" 
                               {/if}
                           {else}
                               checked="checked"
                           {/if}
                        />          
                        <label for="export_groups">{gt text="groups"}</label>
                    </td>
                </tr>                
            </table>            
            {if isset($groups) && $groups == '1'}
                <div class="z-formrow">
                    <label for="users_export_groups">{gt text="Export Group Membership"}</label>
                    <input id="users_export_groups" type="checkbox" name="exportGroups" value="1"/>
                </div>
            {/if}
        </fieldset>
        <fieldset>
            <legend>{gt text="CSV export file"}</legend>
            <div class="z-formrow">
                <label for="users_export">{gt text="CSV filename"}</label>
                <input id="users_export" type="text" name="filename" size="30" />
            </div>
            <div class="z-formrow">
                <label for="users_export_delimiter">{gt text="CSV delimiter"}</label>
                <select id="users_export_delimiter" name="delimiter">
                    <option value=";">{gt text="Semicolon"} (;)</option>
                    <option value=",">{gt text="Comma"} (,)</option>
                    <option value=":">{gt text="Colon"} (:)</option>
                </select>
            </div>
        </fieldset>
        <div class="z-formbuttons z-buttons">
            {button src='button_ok.png' set='icons/extrasmall' __alt='Export' __title='Export' __text='Export'}
            <a href="{modurl modname='Users' type='admin' func='view'}" title="{gt text='Cancel'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel' __title='Cancel'} {gt text='Cancel'}</a>
        </div>
    </div>
</form>
{adminfooter}
