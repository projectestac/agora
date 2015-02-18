{*<pre>{$files|print_r}</pre>*}
    {if $hi_ha_temes}
        <table id="topicsTable" class="table table-striped">
            <thead>
                <tr>
                    {if $userid neq ''}
                        <th scope="col"></th>
                        {/if}
                    <th scope="col" class="col-xs-4">
                        <strong>{gt text="List of topics"}</strong>
                    </th>
                    <th scope="col" class="col-xs-3">
                        <strong>{gt text="Started by"}</strong>
                    </th>
                    <th scope="col" class="col-xs-1">
                        <strong>{gt text="Messages"}</strong>
                    </th>
                    <th scope="col" class="col-xs-1" style="text-align:center; padding-left: 4px; padding-right: 4px;">
                        <strong>{gt text="Unread"}</strong>
                    </th>
                    <th style="text-align:right" scope="col" class="col-xs-3">
                        <strong>{gt text="Last post"}</strong>
                    </th>   
                    <th scope="col"></th>
                    {if $moderator}
                        <th scope="col">
                            <div id="divEDSort" title="{gt text='Enable topics list reorder'}" data-toggle="tooltip">
                            <span id="EnDisSort" class="disabled glyphicon glyphicon-move" style="cursor:pointer" onclick="enableTopicListSort();"></span>                             
                            </div>
                        </th>                       
                    {/if}     
                </tr>
            </thead>
            <tbody id="topicsTableBody">
                {foreach item=tema from=$temes name="temes"}
                    {* Show topic information*}
                    {include file="user/IWforums_user_topicInfo.tpl"}                    
                {/foreach}
            </tbody>
        </table>
    {/if}
    <!-- Modal delete topic confirmation -->
    <div class="modal fade" id="delTopicConfirm">
        <div class="modal-dialog" style="top:25%">
            <div class="modal-content">
                <div class="modal-header" style=" height:40px">                            
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title red" style="line-height: 1;"><i class="fa fa-exclamation-triangle"></i>&nbsp;{gt text="Confirmation of deletion of the topic and its messages"}</h3>                             
                </div>
                <div class="modal-body" style="padding-bottom: 8%;">
                    <form>
                        <input type="hidden" id="fid">
                        <input type="hidden" id="ftid">
                    </form>
                    <div id="descrip"></div><br>
                    <span>
                        <span id="MsgsInfo" class="col-xs-5" style="float:left;"></span>
                    <div class="col-xs-5" style="float:right;"><b>{gt text="Started by"}</b>:<br> <div id="UserInfo"></div></div>
                    </span>
                </div>         
                <div class="modal-footer">
                    <button id="btnDelete" type="button" class="btn btn-success" data-dismiss="modal" onclick="deleteTopic()"><span class="white fs1em glyphicon glyphicon-ok"></span>&nbsp;{gt text="I'm sure"}</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="white fs1em glyphicon glyphicon-remove"></span>&nbsp;{gt text="Cancel"}</button>                            
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> 
<script type="text/javascript">
// Load topic values before modal dialog show
    jQuery(".mDelete").click(function(){ 
        // Applies to user/IWforums_user_topicInfo.tpl template fields
        var ftid = jQuery(this).data('ftid');
        jQuery('#fid').val(jQuery(this).data('fid'));
        jQuery('#ftid').val(jQuery(this).data('ftid'));
        jQuery("#UserInfo").html(jQuery('#startedBy').html());
        jQuery("#MsgsInfo").html(jQuery('#totalMessages'+ftid).html()+'/'+jQuery('#totalUnread'+ftid).html());
        jQuery("#descrip").html(jQuery('#topicDesc'+ftid).html());

    });

    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('[data-toggle="modal"]').tooltip();
   // callback helper. 
   // Sometimes, the width of the row gets collapsed and the row looks 
   // shrinked than the actual width. 
    var fixHelper = function(e, ui) {
        ui.children().each(function() {
            jQuery(this).width(jQuery(this).width());
        });
        return ui;
    }

    jQuery( "#topicsTableBody" ).sortable({
        //items :'tr',
        update: function( event, ui ) {
            reorderTopics({{$fid}}, {{$ftid}});
        },
        helper: fixHelper,
        containment: "parent" ,
        handle: '.handle',
        distance: 1,
        opacity: 0.5,
        tolerance: "pointer",
        scroll: true
    });

</script>