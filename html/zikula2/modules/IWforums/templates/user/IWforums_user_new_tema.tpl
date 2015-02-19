{ajaxheader modname=IWforums filename=IWforums.js}
{pageaddvar name='javascript' value='jQuery'}
{pageaddvar name='javascript' value='vendor/bootstrap/js/bootstrap.js'}
{pageaddvar name='javascript' value='vendor/zikula1.4/bootstrap-zikula.js'}
{pageaddvar name='stylesheet' value='vendor/bootstrap/css/bootstrap.css'}
{pageaddvar name='stylesheet' value='modules/IWforums/style/bsRewrite.css'}
{pageaddvar name='javascript' value='vendor/bootstrap/filestyle/bootstrap-filestyle.min.js'}

<div class="usercontainer">
    <div class="userpageicon">{img modname='core' src='filenew.png' set='icons/large'}</div>
    <h2>{gt text="Add a new topic"}</h2>    
    <form class="form-horizontal" action='javascript:void();' role="form"  name="new_tema" id="new_tema" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
        <input type="hidden" name="fid" {if isset($fid)} value="{$fid}" {/if}/>
        <input type="hidden" name="ftid" {if isset($ftid)} value="{$ftid}" {/if} />
        <input type="hidden" name="fmid" {if isset($fmid)} value="{$fmid}" {/if} />
        <input type="hidden" name="oid" {if isset($oid)} value="{$oid}" {/if} />
        <input type="hidden" name="u" {if isset($u)} value="{$u}" {/if} />
        <div class="well">
            <div class="form-group"> 
                <label class="col-xs-2 control-label">{gt text='Subject'}</label>
                <div class="col-xs-8" id="inputName">
                    <input type="text" class="form-control" id="titol" name="titol" placeholder='{gt text="Write the topic title"}' onblur="checkName();" oninput="checkName();">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-2 control-label">{gt text='Description'} ({gt text="optional"})</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="descriu">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-2 control-label" for="msg">{gt text='Message'}</label>
                <div class="col-xs-8">
                    <textarea class="form-control" id="msg" name="msg" rows="5"></textarea>
                </div>
            </div>
            {if $adjunts neq "0"}
                <div class="form-group">
                    <label class="col-xs-2 control-label" for="adjunt">{gt text="Attached file"}</label>
                    <div class="col-xs-6">
                        {* bootstrap-filestyle*}
                        <input type="file" class="filestyle" name='adjunt' data-buttonBefore="true" data-buttonText="{gt text="Browse..."}" data-iconName="glyphicon-paperclip">
                    </div>
                </div>
            {/if}

            <div class="form-group">
                <div class="col-xs-12 z-center">
                    <button id="btnSend" class="btn btn-success" onclick="javascript:preSubmit();">
                        <span class="glyphicon glyphicon-save tooltips"></span>&nbsp;{gt text='Post to forum'}
                    </button>
                    <button type="cancel" class="btn btn-danger" onclick='javascript:cancel()'>
                        <span class="glyphicon glyphicon-remove tooltips"></span>&nbsp;{gt text='Cancel'}
                    </button>
                </div>
            </div>
        </div>

        {notifydisplayhooks eventname='IWforums.ui_hooks.IWforums.form_edit' id=null}
    </form>
    <script>
        //action = "index.php?module=IWforums&type=user&func=crear_tema"
        function cancel() {
            window.location = "index.php?module=IWforums&type=user&func=forum&fid={{$fid}}";
        }

        function preSubmit(){
            document.new_tema.action = "javascript:validate();";
            document.getElementById('new_tema').submit();
        }
        
        function validate() {
            var error = "";
            if (jQuery('#titol').val() == '') {
                // for gt detection
                error = "{{gt text="You didn't write a title for the message."}}"+'\n';
            }
            if (jQuery('#msg').val() == '') {
                document.new_tema.action = "javascript:void();";
                // for gt detection
                error = error + "{{gt text="You didn't write the message."}}";
            }
            if (error == ''){
                document.new_tema.action = "index.php?module=IWforums&type=user&func=crear_tema";
                document.new_tema.submit();
            } else {
                alert(error);
                document.new_tema.action = 'javascript:void();';
            }
        }
    </script>
