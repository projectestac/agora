    
<div class="form-group">
    
    {if (!isset($missatge.adjunt) || $missatge.adjunt eq "") && ($adjunts eq 1)}
        <label class="col-xs-2 control-label" for="adjunt">{gt text="Attached file"}</label>
        {* bootstrap-filestyle*}
        <div class=" col-xs-5">
            <input id='adjunt' type="file" onchange="jQuery('#clear').show()" class="filestyle" name='adjunt' data-buttonBefore="true" data-buttonText='{gt text="Browse..."}' data-iconName="glyphicon-paperclip">
        </div>
        <div>
            <span id="clear" style="cursor:pointer; display:none; vertical-align:-35%;line-height: 1em;" data-toggle="tooltip" class="red fa fa-times fa-lg" title="{gt text='Clear selection'}"></span>                             
        </div>                          
    {elseif (isset($missatge.adjunt) && $missatge.adjunt neq "") }
        <label class="col-xs-2 control-label" for="adjunt">{gt text="Attached file"}</label>
        <input type="hidden" name="adjunt" value="">
        <span class="fs1em label label-default">{if isset($missatge.adjunt)}{$missatge.adjunt}{/if}</span>
        <span data-toggle="modal" data-target="#attached">
        <span class="fa fa-times fa-lg" style="cursor:pointer; color:#AC2013"  data-toggle="tooltip" title="{gt text='Delete the attached file'}"></span>
        </span>                          
    {/if}
</div>

<!-- Modal attached file delete confirmation -->
            <div class="modal fade" id="attached">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">{gt text="Attachment removal confirmation"}</h3>                             
                        </div>
                        <div class="modal-body">
                            {if isset($missatge.adjunt)}                                 
                                {gt text ="Delete the file"} {$missatge.adjunt}?
                            {/if}
                        </div>         
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="delAttachment()"><span class="white fs1em glyphicon glyphicon-ok"></span>&nbsp;{gt text="I'm sure"}</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="white fs1em glyphicon glyphicon-remove"></span>&nbsp;{gt text="Cancel"}</button>                            
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal --> 
<script>
    jQuery('[data-toggle="modal"]').tooltip();
    jQuery('[data-toggle="tooltip"]').tooltip();
    
    // Clear selected filename
    jQuery("#clear").on("click", function () {
        jQuery(':file').filestyle('clear');
        jQuery('#clear').hide();
    });
</script>
{pageaddvar name='javascript' value='jQuery'}
{pageaddvar name='stylesheet' value='vendor/font-awesome/css/font-awesome.css'}
{pageaddvar name='javascript' value='vendor/bootstrap/js/bootstrap.js'}
{pageaddvar name='stylesheet' value='vendor/bootstrap/css/bootstrap.css'}
{pageaddvar name='javascript' value='vendor/bootstrap/filestyle/bootstrap-filestyle.min.js'}
{ajaxheader modname=IWforums filename=IWforums.js}