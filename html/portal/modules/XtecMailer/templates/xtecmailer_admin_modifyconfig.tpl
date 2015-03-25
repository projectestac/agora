{include file="xtecmailer_admin_menu.tpl"}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname='core' src='configure.png' set='icons/large' __alt='Settings' }</div>
    <h2>{gt text="Settings"}</h2>
    <form id="config" class="z-form" action="{modurl modname='XtecMailer' type='admin' func='updateconfig'}" method="post" enctype="application/x-www-form-urlencoded">
        <div>
            <input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />
            <fieldset>
                <legend>Activació</legend>
                <div class="z-formrow">
                    <label for="enabled">Activa l'enviament de correu electrònic utilitzant el servei web de la XTEC</label>
                    <input id="enabled" type="checkbox" name="enabled" {if $enabled eq 1}checked{/if} value="1"/>
                           <p class="z-formnote z-informationmsg">Si l'enviament de correu electrònic per servei web està desactivat, s'utilitza el sistema d'enviament definit en el mòdul Mailer</p>
                </div>
            </fieldset>
            {* aginard: hide some params to everybody but xtecadmin *}
            {if $showextraparams}
            <fieldset>
                <legend>Paràmetres generals</legend>
                <div class="z-formrow">
                    <label for="idApp">idApp</label>
                    <input id="idApp" type="text" name="idApp" size="40" value="{$idApp}" />
                    <p class="z-formnote z-informationmsg">{gt text='Codi de l\'aplicació'}</p>
                </div>
                <div class="z-formrow">
                    <label for="replyAddress">replyAddress</label>
                    <input id="replyAddress" type="text" name="replyAddress" size="40" value="{$replyAddress}" readonly="readonly" />
                    <p class="z-formnote z-informationmsg">{gt text='Adreça de correu electrònic de resposta'}</p>
                </div>
                <div class="z-formrow">
                    <label for="sender">sender</label>
                    <input id="sender" type="text" name="sender" size="40" value="{$sender}" />
                    <p class="z-formnote z-informationmsg">{gt text='Codi del servei d\'enviament'}</p>
                </div>
                <div class="z-formrow">
                    <label for="environment">enviroment</label>
                    <input id="environment" type="text" name="environment" size="40" value="{$environment}" />
                    <p class="z-formnote z-informationmsg">{gt text='Codi de l\'entorn'}</p>
                </div>
                <div class="z-formrow">
                    <label for="contenttype">contenttype</label>
                    <select id="contenttype" name="contenttype">{html_options options=$contenttypes selected=$contenttype}</select>
                    <p class="z-formnote z-informationmsg">{gt text='Tipus de contingut predeterminat del cos del missatge'}</p>
                </div>
            </fieldset>			
            <fieldset>
                <legend>Paràmetres de registre</legend>
                <div class="z-formrow">
                    <label for="log">log</label>
                    <input id="log" type="checkbox" name="log" size="40" {if $log eq 1}checked{/if} value="1" />
                           <p class="z-formnote z-informationmsg">{gt text='Activa o desactiva el registre de l\'enviament de correu'}</p>
                </div>
                <div class="z-formrow">
                    <label for="debug">debug</label>
                    <input id="debug" type="checkbox" name="debug" size="40" {if $debug eq 1}checked{/if} value="1" />
                           <p class="z-formnote z-informationmsg">{gt text='Activa o desactiva el mode de depuració d\'errors si el registre està activat'}</p>
                </div>
                <div class="z-formrow">
                    <label for="logpath">logpath</label>
                    <input id="logpath" type="text" name="logpath" size="100%" value="{$logpath}" />
                    <p class="z-formnote z-informationmsg">{gt text='Camí absolut al fitxer de registre'}</p>
                </div>
            </fieldset>
            {else}
            <input id="idApp" type="hidden" name="idApp" size="40" value="{$idApp}" />
            <input id="replyAddress" type="hidden" name="replyAddress" size="40" value="{$replyAddress}" />
            <input id="sender" type="hidden" name="sender" size="40" value="{$sender}" />
            <input id="environment" type="hidden" name="environment" size="40" value="{$environment}" />
            <input id="contenttype" type="hidden" name="contenttype" value="2" />
            <input id="log" type="hidden" name="log" size="40" value="0" />
            <input id="debug" type="hidden" name="debug" size="40" value="0" />
            <input id="logpath" type="hidden" name="logpath" size="100%" value="" />
            {/if}
            {* aginard: end of change *}
            <div class="z-center">
                <span class="z-buttons">
                    <a href="javascript:document.forms['config'].submit();">
                        {img modname='core' src='button_ok.png' set='icons/small' __alt="Actualitza la configuració" __title="Actualitza la configuració"}
                        {gt text="Actualitza la configuració"}
                    </a>
                </span>
                <span class="z-buttons">
                    <a href="{modurl modname='XtecMailer' type='admin' func='main'}">
                        {img modname='core' src='button_cancel.png' set='icons/small' __alt="Cancel·la" __title="Cancel·la"}
                        {gt text="Actualitza la configuració"}
                    </a>
                </span>
            </div>
        </div>
    </form>
</div>
