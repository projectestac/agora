{ajaxheader modname=$modinfo.name filename='IWusers.js' ui=true}
{adminheader}
{insert name='getstatusmsg'}
{math equation="100/a" a=$hc assign="w"}

<div class="z-admincontainer">
    <div class="z-admin-content-pagetitle">
        {icon type="info" size="small"}
        <h3>{gt text="Import summary"}</h3>
    </div>

    {if isset($iErrors) && $iErrors|@count}
        <div id="iErrors">

            <h2>{icon type="error" size="small"}&nbsp;{gt text = "Errors"}</h2>
            <table class="z-admintable errormsg">
                <thead>
                    <tr>
                        <th>
                            {gt text = "User name"}
                        </th>
                        <th>
                            {gt text="Reason"}
                        </th>

                    </tr>
                </thead>
                {foreach from=$iErrors item=line}
                    <tr bgcolor="{cycle values="#ffffff, #eeeeee"}">                        
                        <td>
                            {$line.uname}
                        </td>
                        <td>
                            {$line.error}
                        </td>
                    </tr>
                {/foreach}

            </table>         

        </div>      
    {/if}
    {if isset($insert) && $insert|@count}
        <div id="newUsers">                     
            <h2>{img src='add_group.png' modname='core' set='icons/small' __alt='New users' }&nbsp;{gt text = "New users"}</h2> 
            <table class="z-admintable"><thead>
                    <tr>
                        {foreach from=$header item=field}
                            <th width="{$w}%">{$field}</th>
                        {/foreach}
                    </tr>
                </thead>
                {foreach from=$insert item=line }
                    <tr bgcolor="{cycle values="#ffffff, #eeeeee"}">              
                        {foreach from=$line key=k item=user name=upd}
                            {if $smarty.foreach.upd.iteration <= $header|@count}
                                <td width="{$w}">
                                    {$user}
                                </td>
                            {/if}
                        {/foreach}
                    </tr>
                {/foreach}
            </table>
        </div>
    {/if}
    {if isset($update) && $update|@count}
        <div id="updates">
            <h2>{img src='group.png' modname='core' set='icons/small' __alt='Updated records' }&nbsp;{gt text = "Updated records"}</h2>
            <table class="z-admintable">
                <thead>
                    <tr>
                        {foreach from=$header item=field}
                            <th width="{$w}%">{$field}</th>
                        {/foreach}
                    </tr>
                </thead>
                {foreach from=$update item=line }
                    <tr bgcolor="{cycle values="#ffffff, #eeeeee"}">              
                        {foreach from=$line key=k item=user name=upd}
                            {if $smarty.foreach.upd.iteration <= $header|@count}
                                <td width="{$w}">
                                    {$user}
                                </td>
                            {/if}
                        {/foreach}
                    </tr>
                {/foreach}
            </table>
        </div>
    {/if}    
</div>