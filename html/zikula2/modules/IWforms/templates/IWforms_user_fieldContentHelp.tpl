<span>
    &nbsp;&nbsp;
    <a style="cursor:pointer;" onClick="return overlay(this, 'info_{$field.fndid}')">
        {img modname='core' src='info.png' set='icons/extrasmall'}
    </a>
    <div id="info_{$field.fndid}" class="helpBox">
        <div class="helpHeader"><div class="helpTitle">{$field.fieldNameShort|safehtml}</div></div>
        <div class="helpContent">
            {$field.help|safehtml}
            <div class="helpBoxClose"><a href="#" onClick="overlayclose('info_{$field.fndid}'); return false">{gt text="Close the window"} {img modname='IWmain' src='postitcloseicon.png'}</a></div>
        </div>
    </div>
</span>
