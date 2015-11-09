{include file="Files_external_header.tpl"}
<style>
    .menuTriggered {
        display:none;
        background-color: #FEEFB3;
        //background-image: url("contextMenuBackground.gif");
        //background-position: left center;
        //background-repeat: repeat-y;
        border: 1px solid #777777;
        border: 1px solid rgba(0, 0, 0, 0);
        cursor: pointer;
        padding: 1px;
        //vertical-align: middle;
    }
    li.separator {
        border-top: 1px solid #000000;
        height: 1px;
        line-height: 0;
        margin: 0;
        padding: 0;
    }
</style>


<div class="files_container">
    <div class="z-clearfix">
        <div class="userpageicon">
            {img modname='core' src='lists.png' set='icons/large'}
        </div>
        <h2>{gt text="List of files in folder"}: <strong>{if $folderName neq ''}{$folderName}{else}{gt text="Main"}{/if}</strong></h2>
    </div>

    {insert name="getstatusmsg"}

    {if $notwriteable}
    <p class="z-errormsg">{gt text="It is not possible to write in this directory. Make it writable."}</p>
    {/if}

    <div class="actionIcons z-menuitem-title">
        <a class="fi_image fi_createdir" href="javascript: createDir('{$folderName}',1,{$hook},'{$editor}')">{gt text="Create directory"}</a>
        <a class="fi_image fi_uploadfile" href="javascript: uploadFile('{$folderName}',1,{$hook},'{$editor}')">{gt text="Upload file"}</a>
        {if $publicFolder}
        <a class="fi_image fi_public" href="{modurl modname='Files' type='user' func='setAsPublic' external='1' folder=$folderName|replace:'/':'|' hook=$hook not=1 editor=$editor}">{gt text="Set as not public folder"}</a>
        {elseif $folderName neq '' OR $defaultPublic eq '1'}
        <a class="fi_image fi_notpublic" href="{modurl modname='Files' type='user' func='setAsPublic' external='1' folder=$folderName|replace:'/':'|' hook=$hook editor=$editor}">{gt text="Set as a public folder"}</a>
        {/if}
    </div>

    <div id="actionForm" class="actionForm">
        <div class="diskSpace">
            {gt text="Disk use:"}
            {if $usedSpace.maxDiskSpace neq -1048576}
            <div style="width:{$usedSpace.widthUsage}px; background:url(modules/Files/images/usage.gif);">&nbsp;</div>
            {gt text="%s%% - %s of %s" tag1=$usedSpace.percentage tag2=$usedSpace.usedDiskSpace tag3=$usedSpace.maxDiskSpace}
        </div>
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

    <form class="z-form" method="post" action="{modurl modname='Files' type='user' func='actionSelect' folder=$folderName|replace:'/':'|' hook=$hook}"  id="form1">
        <div>
            <input type="hidden" name="external" value="1" />
            <table class="z-datatable" summary="table files">
                <thead>
                    <tr>
                        <th align="center"><input type="checkbox" onclick="selectAll(this);" id="selectall" value="Select all" title="{gt text="Select all"}"/></th>
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
                         <td align="left">
                             <a title="{gt text='Go to main'}" class="fi_image fi_folder" href="{modurl modname='Files' type='external' func='getFiles' folder='' root=1 editor=$editor}">
                                 .
                             </a>
                         </td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                     </tr>
                     <tr class="{cycle values="z-odd,z-even"}">
                         <td>&nbsp;</td>
                         <td align="left">
                             {if $folderPrev eq ''}
                                 <a title="{gt text='Go to upper folder'}" class="fi_image fi_folder" href="{modurl modname='Files' type='external' func='getFiles' folder='' root=1 editor=$editor}">    
                             {else}
                                 <a title="{gt text='Go to upper folder'}" class="fi_image fi_folder" href="{modurl modname='Files' type='external' func='getFiles' folder=$folderPrev|replace:'/':'|' editor=$editor}">
                             {/if}
                                 ..
                             </a>
                         </td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                     </tr>
                     {/if}

                     {foreach item=file from=$fileList.dir}
                     {if $file.name neq '.tbn'}
                     <tr class="{cycle values="z-odd,z-even"}">
                         <td align="center">
                             <input type="checkbox" class="cbList" name="list_{$file.name|replace:'.':'$$$$$'}" onclick="stateCheckAll(this.checked)" />
                         </td>
                         <td align="left">
                             {if $folderName eq ''}
                             <a class="fi_image fi_folder" href="{modurl modname='Files' func='getFiles' type='external' hook=$hook folder=$file.name editor=$editor}">
                                 {$file.name}
                             </a>
                             {else}
                             <a class="fi_image fi_folder" href="{modurl modname='Files' func='getFiles' type='external' hook=$hook folder=$folderName|cat:'/'|cat:$file.name editor=$editor}">
                                 {$file.name}
                             </a>
                             {/if}
                         </td>
                         <td>&nbsp;</td>
                         <td align="right">{$file.time|dateformat:'datetimebrief'}</td>
                         <td align="right">
                             <a href="{modurl modname='Files' type='user' external='1' func='action' do='rename' fileName=$file.name folder=$folderName|replace:'/':'|' hook=$hook editor=$editor}">
                                 {img modname='core' src='edit.png' set='icons/extrasmall' __alt="Rename file" __title="Rename folder"}
                             </a>
                             <a href="{modurl modname='Files' type='user' external='1' func='action' do='delete' fileName=$file.name folder=$folderName|replace:'/':'|' hook=$hook editor=$editor}">
                                 {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall' __alt="Delete folder" __title="Delete folder"}
                             </a>
                         </td>
                     </tr>
                     {/if}
                     {/foreach}

                     {foreach item=file from=$fileList.file}
                     {if $file.name|substr:0:1 neq '.'}
                     <tr class="{cycle values="z-odd,z-even"}">
                         <td align="center">
                             <input type="checkbox" class="cbList" name="list_{$file.name|replace:'.':'$$$$$'}"/>
                         </td>
                         <td align="left">
                             {if $publicFolder}
                                 {if $hook eq 1}
                                     <a class="fi_image" style="background: url({$baseurl}modules/Files/images/fileIcons/{$file.fileIcon}) no-repeat 0 50%;">
                                         {$file.name}
                                     </a>
                                  {else}
                                      <a id="t_{$file.name}" onclick="menuOptions('{$file.name}')" class="fi_image menuTrigger" style="background: url({$baseurl}modules/Files/images/fileIcons/{$file.fileIcon}) no-repeat 0 50%;" href="javascript:void(0)">
                                          {$file.name}
                                      </a>
                                     
                                  {/if}
                             {else}
                                 <a href="" onclick="javascript:alert('{gt text="Move the file to a public directory to get an access URL"}')" title="{gt text="Move the file to a public directory to get an access URL"}" class="fi_image" style="background: url({$baseurl}modules/Files/images/fileIcons/{$file.fileIcon}) no-repeat 0 50%;">
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
                                 {if !($option.needpublic && !$publicFolder)}
                                     <a href="{$option.url|safetext}">
                                        {img modname=core set=icons/extrasmall src=$option.image title=$option.title alt=$option.title}
                                     </a>
                                 {/if}
                             {/foreach}
                         </td>
                      </tr>
                     
                         <tr style="height:0px;padding:0px;margin:0px;">
                             <td colspan="5" style="height:0px;padding:0px;margin:0px;">
                                 <div id="menu_{$file.name}" class="menuTriggered">
                                     {if $file.img}
                                         <a href="" onclick="javascript:returnEditor('insertImg',false,'{$file.name}')" title="Insert image" >
                                             {img modname='Files' set="fileIcons" src='ed_image.gif' __title="Insert image" __alt="Insert image"}
                                             {gt text="Insert image"}
                                         </a>
                                         <span style="margin:0px 5px;">-</span>
                                     {/if}
                                     <a href="" onclick="javascript:returnEditor('insertLink',false,'{$file.name}')" title="Insert link" >
                                         {img modname='Files' set="fileIcons" src='ed_link.gif' __title="Insert link" __alt="Insert link"}
                                         {gt text="Insert link"}
                                     </a>
                                     <span style="margin:0px 10px;">--</span>
                                     <a href="" onclick="javascript:returnEditor('copyURL',false,'{$file.name}')" title="Copy URL" >
                                         {img modname='Files' set="fileIcons" src='text.gif' __title="Copy URL" __alt="Copy URL"}
                                         {gt text="Copy URL"}
                                     </a>
                                     <span style="margin:0px 5px;">-</span>
                                     <a href="" onclick="javascript:returnEditor('gotoURL',false,'{$file.name}')" title="Go to URL" >
                                         {img modname='Files' set="fileIcons" src='web.gif' __title="Go to URL" __alt="Go to URL"}
                                         {gt text="Go to URL"}
                                     </a>
                                 </div>
                             </td>
                         </tr>
                     

                     {/if}
                     {/foreach}
                    </tbody>
                </table>

                    <select id="menuaction" name="menuaction" onchange="javascript:getElementById('form1').submit()">
                        <option value="">{gt text="-- Selected files --"}</option>
                        <option value="move">{gt text="Move them to another folder"}</option>
                        <option value="delete">{gt text="Delete them"}</option>
                        <option value="zip">{gt text="Create a zip file with them"}</option>
                    </select>
            </div>
        </form>

        {if $publicFolder AND  $imagesArray|@count gt 0}
            <div class="z-form">
               <fieldset class="z-fieldset">
                   <legend>{gt text="Thumbnails"}</legend>
                   <table class="z-datatable">
                       <thead>
                           <tr>
                               <th align="center"></th>
                               <th>{gt text="Size(factor)"}</th>
                               <th>{gt text="Actions"}</th>
                           </tr>
                       </thead>
                       <tbody>
                   {foreach item=file from=$imagesArray}
                      {* <tr class="{cycle values="z-odd,z-even"}">*}
                           {include file="Files_external_getFilesImgContent.tpl"}
                      {* </tr> *}
                   {/foreach}
                       </tbody>
                   </table>
               </fieldset>
            </div>
        <div style="clear: both;"></div>
        <div class="z-informationmsg">
            {gt text="The values displayed in each image are its real size \"width x height\" and the factor of the modification of its size (value). The value 1 means that the image is in its natural size. A value upper than 1 means that the image has been reduced and a value lower than 1 means that the image has been increased."}
        </div>
        {/if}
    </div>

    {include file="Files_external_footer.tpl"}
    <script>
        function returnEditor(opt,thumb,filename) {
            if (thumb == true) {
                var val=new Array(opt,'file.php?file={{$folderPath}}{{if $folderPath|substr:-1 neq '/'}}/{{/if}}/.tbn/'+filename);
            }else {
                var val=new Array(opt,'file.php?file={{$folderPath}}{{if $folderPath|substr:-1 neq '/'}}/{{/if}}'+filename);
            }
            if ('{{$editor}}' == 'TinyMCE'){ 
            	var ed = tinyMCEPopup.editor, dom = ed.dom;
            	if(val[0] == 'insertImg'){
            	tinyMCEPopup.execCommand('mceReplaceContent', false, dom.createHTML('img', {
            	src : val[1],
            	border : 0
            	}));
            	} else if(val[0] == 'copyURL'){
            		tinyMCEPopup.execCommand('mceReplaceContent', false, Zikula.Config.baseURL+val[1]);
            	}else if (val[0] == 'gotoURL') {
                    window.open(Zikula.Config.baseURL+val[1],'_blank');
            	} else {
            		// old code: tinyMCEPopup.execCommand('mceInsertLink', false, val[1]);
					var text_link = tinyMCEPopup.editor.selection.getContent();
					if (text_link == '') {
						htmlLink = '<a href="' + val[1] + '" alt="' + filename + '" title="' + filename + '">' + filename + '</a>';
					} else {
						htmlLink = '<a href="' + val[1] + '" alt="' + filename + '" title="' + filename + '">' + text_link + '</a>';
					}
					tinyMCEPopup.execCommand('mceReplaceContent', false, htmlLink);
            	}
            	tinyMCEPopup.close();
			}
			if ('{{$editor}}' == 'Xinha') {
            	__dlg_close(val,'tt');
			}
        }
        function menuOptions(file) {
            //file = file.split('.');
            //file = file.join('\\.');
            file = file.replace( /(:|\.|\[|\]|,|\(|\))/g, "\\$1" );
            var index = "#menu_"+file;
            var newTarget = jQuery(index);
            jQuery('.menuTriggered').not(newTarget).slideUp('fast');
            newTarget.slideToggle('fast');
            
          
        }
        function selectAll(obj){
            jQuery('.cbList').attr('checked', obj.checked);
        }
    </script>
    
