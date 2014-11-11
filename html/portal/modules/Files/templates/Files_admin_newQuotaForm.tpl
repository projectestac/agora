<form class="z-form" enctype="application/x-www-form-urlencoded" method="post" id="newQuota">
    <select name="groupId">
        <option value="0">{gt text="Choose a group..."}</option>
        {foreach item="group" from=$groups}
        <option value="{$group.gid|safetext}">{$group.name|safetext}</option>
        {/foreach}
    </select>
    
    <input type="text" size="3" name="quotaValue" /> {gt text="MB"}
    
    <a href="javascript:createGroupQuota();">
        {img modname='core' src='button_ok.png' set='icons/extrasmall' __alt="Save the changes" __title="Save the changes"}
    </a>
    
    <div class="z-informationmsg">
        {gt text="-1 means no disk quota limit"}
    </div>
</form>