{ajaxheader modname=$modinfo.name filename='IWusers.js' ui=true}
{pageaddvar name='javascript' value='jquery-ui'}
{adminheader}
{insert name='getstatusmsg'}
<div class="z-admincontainer">
    <div class="z-admin-content-pagetitle">
        {icon type="import" size="small"}
        <h3>{gt text="Import from a file"}</h3>
    </div>

    <form class="z-form" action="{modurl modname='IWusers' type='admin' func='import'}" method="post" enctype="multipart/form-data">
        <div>
            <input type="hidden" name="confirmed" value="1" />
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <fieldset>
                <legend>{gt text="Select the CSV file"}</legend>
                <div class="z-formrow">
                    <label for="users_import">{gt text="CSV file (Max. %s)" tag1=$post_max_size}</label>
                    <input id="importFile" type="file" name="importFile" size="30" />
                    <em class="z-formnote z-sub">{gt text='The file must be utf8 encoded.'}</em>
                </div>
                <div id="btnsImport" style="display:none;">
                    <div class="z-formrow">
                        <label for="users_import_delimiter">{gt text="CSV delimiter"}</label>
                        <select id="users_import_delimiter" name="delimiter">
                            <option value=";">{gt text = 'Semicolon'} (;)</option>                            
                            <option value=",">{gt text = 'Comma'} (,)</option>                            
                            <option value=":">{gt text = 'Colon'} (:)</option>
                        </select>
                    </div>                
                    <div class="z-formbuttons z-buttons">
                        {button src='button_ok.png' set='icons/extrasmall' __alt='Import' __title='Import' __text='Import'}
                        <a href="{modurl modname='Users' type='admin' func='view'}" title="{gt text='Cancel'}">{img modname='core' src='button_cancel.png' set='icons/extrasmall' __alt='Cancel' __title='Cancel'} {gt text='Cancel'}</a>
                    </div>
                </div>
                <div class="z-errormsg" id="errorFileExtMsg" style="display:none;">
                    {gt text = "Error! The file extension is incorrect. The only allowed extension is csv."}
                </div>
            </fieldset>
        </div>
    </form>

    <div class="z-informationmsg">
        <h4>{gt text="About the CSV file"}</h4>
        <dl>
            <dt>{gt text="The first row of the CSV file must contain the field names. Fields allowed are:"}</dt>
            <dd><span style="font-family: courier; line-height:80%">uname,new_uname,email,password,forcechgpass,activated,firstname,lastname1,lastname2,birthdate,gender,in,out</span></dd>
        </dl>            
        <dl><table width="100%">
                <tr>
                    <td>
                        <div id="fieldsInfobtn" >
                            <span style="font-weight:bold;color: #59110A; cursor:pointer" onclick = "javascript:showMoreInfo('#fieldsInfo');">
                                {img modname=core set="icons/extrasmall" src="edit_add.png" alt="" style="vertical-align:middle;"} {gt text="Fields information"}&nbsp;...
                            </span>                            
                        </div>
                    </td>
                    <td style="text-align:right">
                        <div id="groupInfobtn">
                            <span style="font-weight:bold;color: #59110A; cursor:pointer" onclick = "javascript:showMoreInfo('#groupInfo');">
                                {img modname=core set="icons/extrasmall" src="group.png" alt="" style="vertical-align:middle;"} {gt text="Groups"}&nbsp;...
                            </span>                              
                        </div>                        
                    </td>
                </tr>
            </table>
            <div id ="fieldsInfo" class="z-form" style="display:none">
                <fieldset style="border-radius:15px;box-shadow: 3px 3px 3px #888888;">
                    <dt>{gt text="where:"}</dt>
                    <dd>
                    <li><b>uname</b>: ({gt text="mandatori"}): {gt text="The user name. This value must be unique."}</li>
                    <li><b>new_uname</b>: {gt text="New user name. This value must be unique."} </li>
                    <li><b>email</b>: {gt text="The user email. If the validation method is based on the user email this value must be unique."} ({gt text="mandatori"})</li>
                    <li><b>password</b>: {gt text="The user password. It must have %s characters or more. Preferentially containing letters and numbers." tag1=$modvars.Users.minpass}</li>
                    <li><b>forcechgpass</b>: {gt text="Type 1 to force a password change. The user must change password at next logon."}</li>            
                    <li><b>activated</b>: {gt text="Type 0 if user is not active, 1 if the user must be active. The default value is 1."}</li>
                    <li><b>firstname</b>: {gt text ="User's first name."}
                    <li><b>lastname1/lastname2</b>: {gt text="User's last name."}
                    <li><b>birthdate</b>: {gt text="Birthdate."}    
                    <li><b>gender</b>: {gt text="Gender (M or F)."}
                    <li><b>in</b>: {gt text="The identities of the groups where the user must belong separated by the character |."}</li>
                    <li><b>out</b>: {gt text="The identities of the groups where the user should be removed separated by the character |."}<br>
                        {gt text="Group membership deletions (out) are processed before additions (in)."}</li>
                    </dd>
                    <span style="float:right;font-weight:bold;color: #59110A; cursor:pointer" onclick = "javascript:showLessInfo('#fieldsInfo');">
                        {img modname=core set="icons/extrasmall" src="button_cancel.png" alt="" style="vertical-align:middle;"} {gt text="Close"}
                    </span>
                </fieldset>
            </div>

            <div id ="groupInfo" class="z-form" style="display:none">
                {include file="IWusers_groupsTable.tpl"}
            </div>
        </dl>
        <dl>
            <dt>{gt text="An example of a valid CSV file"}</dt>
            <span style="font-family: courier; font-size: 1.2em; line-height:80%">
                <dd><b>uname;password;email;activated;firstname;lastname1;in;out</b></dd>
                <dd>albert;12Secure09;albert@example.org;1;Albert;White;1;2</dd>
                <dd>george;lesssEcure;george@example.org;0;George;Brown;1|5;</dd>
                <dd>robert;h1sp@ssworD;robert@example.org;;Robert;Smith;2|4|5;1|2|3|4|5</dd>
            </span>
        </dl>
        <dl>
            <dt>{gt text="Another example of a valid CSV file"}</dt>
            <span style="font-family: courier;font-size: 1.2em;line-height:80%">
                <dd><b>uname;firstname;lastname1;password;in</b></dd>
                <dd>albert;Albert;White;12Secure09;2|7</dd>
                <dd>george;George;Brown;lesssEcure;3|4|54</dd>
                <dd>robert;Robert;Smith;h1sp@ssworD;</dd></span>
        </dl>
    </div>

    {adminfooter}

    <script type="text/javascript">
        (function(jQuery) {
            jQuery.fn.checkFileType = function(options) {
            var defaults = {
                allowedExtensions: [],
                success: function() {},
                error: function() {}
            };
            options = jQuery.extend(defaults, options);
            return this.each(function() {
                jQuery(this).on('change', function() {
                    var value = jQuery(this).val(),
                    file = value.toLowerCase(),
                    extension = file.substring(file.lastIndexOf('.') + 1);
                    if (jQuery.inArray(extension, options.allowedExtensions) == - 1) {
                        options.error();
                        jQuery(this).focus();
                    } else {
                        options.success();
                    }

                });
            });
        };
        })(jQuery);
        
        jQuery(function() {
                jQuery('#importFile').checkFileType({
                allowedExtensions: ['csv'],
                        success: function() {
                        //alert('Success');
                        jQuery('#btnsImport').show();
                                jQuery('#errorFileExtMsg').hide();
                        },
                        error: function() {
                        //alert('Error');
                        jQuery('#errorFileExtMsg').show();
                                jQuery('#btnsImport').hide();
                        }
                });
                
        });
                
        function showMoreInfo(id){
            jQuery(id).show('fast');
            jQuery(id + "btn").hide();
        }
        function showLessInfo(id){
            jQuery(id).hide('fast');
            jQuery(id + "btn").show();
        }
    </script>