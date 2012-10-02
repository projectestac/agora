<div class="z-formrow">
    <label for="profile_featured_username">{gt text='User name'}</label>
    <input id="profile_featured_username" type="text" name="username" value="{$username|safehtml}" size="20" maxlength="255" />
</div>

<div class="z-formrow">
    <label for="profile_block_fields">{gt text='Information to show'}</label>
    <div id="profile_block_fields">
        {foreach from=$dudarray key='dud_label' item='dud_display'}
        <div class="z-formlist">
            <input id="featured_field_{$dud_label|safetext}" type="checkbox" name="fieldstoshow[]" value="{$dud_label|safetext}"{if isset($fieldstoshow.$dud_label)} checked="checked"{/if} />
            <label for="featured_field_{$dud_label|safetext}">{$dud_display|safetext}</label>
        </div>
        {/foreach}
    </div>
</div>

<div class="z-formrow">
    <label for="profile_featured_regdate">{gt text='Show registration date'}</label>
    <input id="profile_featured_regdate" type="checkbox" name="showregdate" value="1"{if $showregdate} checked="checked"{/if} />
</div>
