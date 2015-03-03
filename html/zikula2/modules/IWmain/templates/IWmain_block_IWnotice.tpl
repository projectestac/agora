
<div>
    {$message}
    {if $admin}
        <div style="margin-top:15px; text-align:right;">
            <a style="font-size:x-small;" href="{modurl modname='IWmain' type='admin' func='iwNoticeDeactivate' bid=$bid}">
                {gt text="Amaga aquest bloc"}
            </a>
        </div>
    {/if}
</div>