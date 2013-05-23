{getallusers assign="users"}
{usergetvar name="uid" assign="currentUID"}
{if $data.uid == 1}
{assign var="selectedUID" value=$currentUID}
{else}
{assign var="selectedUID" value=$data.uid}
{/if}

<div class="z-formrow">
    {formlabel for='uid' __text='Author'}
    {formdropdownlist id="uid" items=$users group="data" selectedValue=$selectedUID}
</div>