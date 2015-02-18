<td colspan="9">
    <form class="form-horizontal" role="form"  name="feditTopic" id="feditTopic" action="javascript:setTopic();" method="post">
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="fid" value="{$fid}" />
        <input type="hidden" name="ftid" value="{$ftid}" />

        <div class="form-group">
            <label class="col-xs-2 control-label">{gt text='Title'}</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="titol" required value="{$titol}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">{gt text='Description'} ({gt text="optional"})</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="descriu" value="{$descriu}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 z-center">
                <button type="submit" class="btn btn-success btn-xs" >{gt text='Apply changes'}&nbsp;<span class="glyphicon glyphicon-ok"></span></button>
                &nbsp;
                <button type="button" class="btn btn-danger btn-xs" onclick="getTopic({$fid}, {$ftid})">{gt text='Cancel'}&nbsp;<span class="glyphicon glyphicon-remove"></span></button>
            </div>
        </div>   
    </form>
</td>