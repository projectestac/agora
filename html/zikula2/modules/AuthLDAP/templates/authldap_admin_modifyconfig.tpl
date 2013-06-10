{include file="authldap_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{pnimg modname='core' src='configure.png' set='icons/large' __alt='Settings' }</div>
    <h2>{gt text="Settings"}</h2>
    <form id="config" class="z-form" action="{modurl modname='AuthLDAP' type='admin' func='updateconfig'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <fieldset>
                <div class="z-formrow">
                    <label for="authldap_serveradr">{gt text="Server address"}</label>
                    <input id="authldap_serveradr" type="text" name="authldap_serveradr" size="40" value="{$AuthLDAP.authldap_serveradr}" />
                </div>
                <div class="z-formrow">
                    <label for="authldap_protocol">{gt text="Protocol version"}</label>
                    <select id="authldap_protocol" name="authldap_protocol">
                        <option value="3"{if $AuthLDAP.authldap_protocol ne 2} selected="selected"{/if}>LDAPv3</option>
                        <option value="2"{if $AuthLDAP.authldap_protocol eq 2} selected="selected"{/if}>LDAPv2</option>
                    </select>
                </div>
                <div class="z-formrow">
                    <label for="authldap_basedn">{gt text="Base DN"}</label>
                    <input id="authldap_basedn" type="text" name="authldap_basedn" size="40" value="{$AuthLDAP.authldap_basedn}" />
                </div>
                <div class="z-formrow">
                    <label for="authldap_bindas">{gt text="Bind as"}</label>
                    <input id="authldap_bindas" type="text" name="authldap_bindas" size="40" value="{$AuthLDAP.authldap_bindas}" />
                </div>
                <div class="z-formrow">
                    <label for="authldap_hash_method">{gt text="Encryption method"}</label>
                    <select id="authldap_hash_method" name="authldap_hash_method">
                        {html_options options=$encryptionTypes selected=$AuthLDAP.authldap_hash_method}
                    </select>
                </div>
                <div class="z-formrow">
                    <label for="authldap_bindpass">{gt text="Bind password"}</label>
                    <input id="authldap_bindpass" type="text" name="authldap_bindpass" size="40" value="{$AuthLDAP.authldap_bindpass}" />
                </div>
                <div class="z-formrow">
                    <label for="authldap_searchdn">{gt text="Search base"}</label>
                    <input id="authldap_searchdn" type="text" name="authldap_searchdn" size="40" value="{$AuthLDAP.authldap_searchdn}" />
                </div>
                <div class="z-formrow">
                    <label for="authldap_searchattr">{gt text="Search user using attribute"}</label>
                    <input id="authldap_searchattr" type="text" name="authldap_searchattr" size="40" value="{$AuthLDAP.authldap_searchattr}" />
                </div>
            </fieldset>
            <div class="z-center">
                <span class="z-buttons">
                    <a href="javascript:document.forms['config'].submit();">
                        {img modname='core' src='button_ok.png' set='icons/small' __alt="Update Configuration" __title="Update Configuration"}
                        {gt text="Update Configuration"}
                    </a>
                </span>
                <span class="z-buttons">
                    <a href="{modurl modname='AuthLDAP' type='admin' func='main'}">
                        {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel" __title="Cancel"}
                        {gt text="Cancel"}
                    </a>
                </span>
            </div>
        </div>
    </form>
</div>