{pageaddvar name="javascript" value="jquery"}
{ajaxheader modname=Files filename=files.js}

<div class="files_container">
    <div class="z-clearfix">
        <div class="userpageicon">{img modname='core' src='lists.png' set='icons/large'}</div>
        <h2>{gt text="List of files in folder"}: <strong>{if $folderName neq ''}{$folderName}{else}{gt text="Main"}{/if}</strong></h2>
    </div>

    {insert name="getstatusmsg"}

    {if $notwriteable}
    <p class="z-errormsg">
        {gt text="It is not possible to write in this directory. Make it writable."}
    </p>
    {/if}
    

    <div class="actionIcons z-menuitem-title">
        <a class="fi_image fi_createdir" href="javascript: createDir('{$folderName}',0)">{gt text="Create directory"}</a>
        <a class="fi_image fi_uploadfile" href="javascript: uploadFile('{$folderName}',0)">{gt text="Upload file"}</a>
        {if $publicFolder}
        <a class="fi_image fi_public" href="{modurl modname='Files' type='user' func='setAsPublic' folder=$folderName|replace:'/':'|' not=1}">
            {gt text="Set as not public folder"}
        </a>
        {elseif $folderName neq '' OR $defaultPublic eq '1'}
        <a class="fi_image fi_notpublic" href="{modurl modname='Files' type='user' func='setAsPublic' folder=$folderName|replace:'/':'|'}">
            {gt text="Set as a public folder"}
        </a>
        {/if}
    </div>
    
    <div id="actionForm" class="actionForm">

 
	    {gt text="Disk use:"}
            {if $usedSpace.maxDiskSpace neq -1048576} 
            <div style="width:{$usedSpace.widthUsage}px; background:url({$baseurl}modules/Files/images/usage.gif);">&nbsp;</div>
            {gt text="%s%% - %s of %s" tag1=$usedSpace.percentage tag2=$usedSpace.usedDiskSpace tag3=$usedSpace.maxDiskSpace}
            {else}
            <div class="diskSpace">{$usedSpace.usedDiskSpace}</div>
            {/if}

    </div>
    

    {if $publicFolder}
        <p class="z-warningmsg">
        {gt text="The files in this directory are accessible directly from the navigator. Anybody can access to them with the URL"} 
    {elseif $folderName neq '' }
            <p class="z-informationmsg">
            {gt text="The files in this directory no are accessible directly. Set directory as Public."} 
    {else}
            <p class="z-informationmsg">
            {gt text="The files in root directory aren't accessible directly."} 
    {/if}
	

    <form class="z-form" method="post" action="{modurl modname='Files' type='user' func='actionSelect' folder=$folderName|replace:'/':'|'}" id="form1">
        <table class="z-datatable" summary="table files">
            <thead>
                <tr>
                    <th align="center"><input type="checkbox" onclick="selectAll(this)" id="selectall" value="Select all" title="{gt text="Select all"}"/></th>
                    <th align="left">{gt text="Name"}</th>
                    <th align="right">{gt text="Size"}</th>
                    <th align="right">{gt text="Modified"}</th>
                    <th align="right">{gt text="Action"}</th>
                </tr>
            </thead>
            <tbody>
                {if $folderName neq ""}
                <tr class="{cycle values="z-odd,z-even"}">
                    <td>&nbsp;</td>
                     <td>
                         <a title="{gt text='Go to main'}" class="fi_image fi_folder" href="{modurl modname='Files' type='user' func='main' folder='' root=1}">
                             .
                         </a>
                     </td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                 </tr>
                 <tr class="{cycle values="z-odd,z-even"}">
                     <td>&nbsp;</td>
                     <td>
                         {if $folderPrev eq ''}
                             <a title="{gt text='Go to upper folder'}" class="fi_image fi_folder" href="{modurl modname='Files' type='user' func='main' folder='' root=1}">    
                         {else}
                             <a title="{gt text='Go to upper folder'}" class="fi_image fi_folder" href="{modurl modname='Files' type='user' func='main' folder=$folderPrev|replace:'/':'|'}">
                         {/if}
                             ..
                         </a>
                     </td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                 </tr>
                 {/if}
                <!-- folders -->
                 {foreach item=file from=$fileList.dir}
                 <!-- non equal thumbnail image -->
                 {if $file.name neq '.tbn'}
                 <tr class="{cycle values="z-odd,z-even"}">
                     <td align="center">
                         <input type="checkbox" class="cbList" name="list_{$file.name|replace:'.':'$$$$$'}"/>
                     </td>
                     <td align="left">
                         {if $folderName eq ''}
                         <a class="fi_image fi_folder" href="{modurl modname='Files' type='user' func='main' folder=$file.name|replace:'/':'|'}">
                             {$file.name}
                         </a>
                         {else}
                         <a class="fi_image fi_folder" href="{modurl modname='Files' type='user' func='main' folder=$folderName|cat:'|'|cat:$file.name|replace:'/':'|'}">
                             {$file.name}
                         </a>
                         {/if}
                     </td>
                     <td>&nbsp;</td>
                     <td align="right">
                         {$file.time|dateformat:'datetimebrief'}
                     </td>
                     <td align="right">
                         <a href="{modurl modname='Files' type='user' func='action' do='rename' fileName=$file.name folder=$folderName|replace:'/':'|'}">
                             {img modname='core' src='edit.png' set='icons/extrasmall' __alt="Rename file" __title="Rename folder"}
                         </a>
                         <a href="{modurl modname='Files' type='user' func='action' do='delete' fileName=$file.name folder=$folderName|replace:'/':'|'}">
                             {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Delete folder" __title="Delete File"}
                         </a>
                     </td>
                 </tr>
                 {/if}
                 {/foreach}
                 <!-- files -->
                 {foreach item=file from=$fileList.file}
                 <tr class="{cycle values="z-odd,z-even"}">
                     <td align="center">
                         <input type="checkbox" class="cbList" name="list_{$file.name|replace:'.':'$$$$$'}"/>
                     </td>
                     <td align="left">
                         {if $publicFolder}
                             <a target="_blank" class="fi_image" style="background: url({$baseurl}modules/Files/images/fileIcons/{$file.fileIcon}) no-repeat 0 50%;" href="{$baseurl}file.php?file={$folderPath}{if $folderPath neq ''}{if $folderPath|substr:-1 neq '/'}/{/if}{/if}{$file.name}">
                                 {$file.name}
                             </a>
                         {else}
                             <a href="" onclick="javascript:alert('{gt text="Move the file to a public directory to get an access URL"}');" title="{gt text="Move the file to a public directory to get an access URL"}" class="fi_image" style="background: url({$baseurl}modules/Files/images/fileIcons/{$file.fileIcon}) no-repeat 0 50%;">
                                 {$file.name}
                             </a>
                         {/if}
                     </td>
                     <td align="right">
                         {$file.size} {gt text="Bytes"}
                     </td>
                     <td align="right">
                         {$file.time|dateformat:'datetimebrief'}
                     </td>
                     <td align="right">
                         {foreach item=option from=$file.options}
                         <a href="{$option.url|safetext}">
                             {img modname=core set=icons/extrasmall src=$option.image title=$option.title alt=$option.title}
                         </a>
                         {/foreach}
                     </td>
                 </tr>
                 {/foreach}

                </tbody>
            </table>

            <fieldset>
                <select id="menuaction" name="menuaction" onchange="javascript:getElementById('form1').submit()">
                    <option value="">{gt text="-- Selected files --"}</option>
                    <option value="move">{gt text="Move them to another folder"}</option>
                    <option value="delete">{gt text="Delete them"}</option>
                    <option value="zip">{gt text="Create a zip file with them"}</option>
                </select>
	     {if $agora}
             <span style="color:grey;float:right;">{gt text="Disk use:"} {$usedSpace.usedDiskSpace} de {$diskSpace} ({$percentatgeUs}%)</span>
             {/if}
             </fieldset>
            
        </form>
    
 
            
 </div>
<script>
    function selectAll(obj){
        jQuery('.cbList').attr('checked', obj.checked);
    }
</script>
