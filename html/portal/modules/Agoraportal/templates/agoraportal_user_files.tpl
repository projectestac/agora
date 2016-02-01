{include file="agoraportal_user_menu.tpl" clientCode=$client.clientCode}

<div class="usercontainer">
    <div class="z-pageicon">{img modname='core' src='folder_documents.png' set='icons/large'}</div>
    {if $isAdmin}
    {assign var='clientCode' value=$client.clientCode}
    {else}
    {assign var='clientCode' value=''}
    {/if}
    <h2 id="menuuserfiles" class="z-menuitem-title">
        [
        <a href="{modurl modname='Agoraportal' type='user' func='files' action='uploadFiles' clientCode=$clientCode}" >{gt text="Envia fitxers grans al servidor"}</a>
        |
        <a href="{modurl modname='Agoraportal' type='user' func='files' action='m2x' clientCode=$clientCode}">{gt text="Fitxers Moodle 2.x"}</a>
        ]
    </h2>
    {if $isAdmin}
    {include file="agoraportal_admin_clientInfo.tpl"}
    {/if}
    {if $action eq 'uploadFiles'}
        <div id="uploadFiles">
        <h2>{gt text="Envia fitxers grans al servidor"}</h2>
            <div style="margin-left:1em; margin-bottom: 37px;">
                <div style="margin:0px;">{gt text="Servei"}: <strong>{$serviceName}</strong></div>
                <div style="float:left; margin:0px;">{gt text="Espai de disc ocupat"}&nbsp;</div>
                <div style="float:left; margin:0px; width:{$usage.widthUsage}px; background:url(modules/Agoraportal/images/usage.gif);">&nbsp;</div>
                <div style="float:left; margin:0px;">&nbsp;{$usage.percentage}%</div>
                <div style="float:left; margin:0px;">&nbsp;&nbsp;( {$usage.usedDiskSpace}MB / {$usage.totalDiskSpace}MB ) <a href="{modurl modname='Agoraportal' type='user' func='recalcConsume' clientServiceId=$clientServiceId}">{gt text="Actualitza"}</a></div>
            </div>
        {if $usage.percentage < 100}
            {if $version eq 'new'}
                <script language="javascript" type="text/javascript" src="modules/Agoraportal/upload/plupload.full.min.js"></script>
                <div class="form-inline">
                    <noscript><div class="alert alert-danger">Atenció: Per pujar fitxers grans cal que el navegador tingui el Javascript activat.</div></noscript>
                    <div id="container">
                        <button class="form-control" type="file" id="pickfiles" name="pickfiles">Selecciona un fitxer</button>
                        <button class="btn btn-success" type="submit" id="uploadfiles" name="uploadfiles">Envia</button>
                    </div>
                    <div id="filelist">Your browser doesn't have HTML5 support.</div>
                    <div id="uploadstatus"></div>
                </div>
                <br/>
                <script type="text/javascript">
                    var uploader = new plupload.Uploader({
                        runtimes : 'html5,html4',
                        browse_button : 'pickfiles', // you can pass an id...
                        container: document.getElementById('container'), // ... or DOM Element itself
                        url : 'modules/Agoraportal/upload/upload.php',
                        multi_selection: false,
                        max_file_count: 1,
                        multiple_queues: false,
                        autostart: true,
                        flash_swf_url : false,
                        silverlight_xap_url : false,
                        chunk_size: '1mb',
                        filters : {
                            max_file_size : '200mb',
                            mime_types: [
                                {title : "Arxius Zip", extensions : "zip,mbr"}
                            ]
                        },

                        init: {
                            PostInit: function() {
                                document.getElementById('filelist').innerHTML = '';

                                document.getElementById('uploadfiles').onclick = function() {
                                    uploader.start();
                                    return false;
                                };
                            },

                            FilesAdded: function(up, files) {
                                if (up.files.length > 1) {
                                    up.splice(0, up.files.length - 1);
                                }
                                plupload.each(files, function(file) {
                                    if (file.size < 10*1024*1024) {
                                        up.splice(0);
                                        document.getElementById('filelist').innerHTML = '';
                                        document.getElementById('uploadstatus').innerHTML = '<div class="alert alert-danger">ERROR: el fitxer seleccionat és menor de 10Mb</div>';
                                    } else {
                                        document.getElementById('uploadstatus').innerHTML = '';
                                        document.getElementById('filelist').innerHTML = '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ')</div>';
                                    }
                                });
                            },
                            BeforeUpload : function(up, files) {
                                document.getElementById('container').style.display = "none";
                            },

                            UploadProgress: function(up, file) {
                                document.getElementById('uploadstatus').innerHTML = '<div class="progress" style="width:200px;">\
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="'+file.percent+'" aria-valuemin="0" aria-valuemax="100" style="width: '+file.percent+'%;">\
                                    '+file.percent+'%</div></div>';
                            },

                            UploadComplete: function(up, files) {
                                document.getElementById('uploadstatus').innerHTML = '<div class="alert alert-success">Pujada finalitzada</div>';
                                plupload.each(files, function(file) {
                                    var loc = location.href;
                                    loc = loc.replace('#','') + '&file='+file.name;
                                    location.assign(loc);
                                });
                            },

                            Error: function(up, err) {
                                document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
                            }
                        }
                    });
                    uploader.init();
                </script>
            {else}
                <script language="javascript" type="text/javascript">
                    var path_to_link_script = "modules/Agoraportal/upload/ubr_link_upload.php";
                    var path_to_set_progress_script = "modules/Agoraportal/upload/ubr_set_progress.php";
                    var path_to_get_progress_script = "modules/Agoraportal/upload/ubr_get_progress.php";
                    var path_to_upload_script = "{{$cgi_script}}";
                    var multi_configs_enabled = 0;
                    var check_allow_extensions_on_client = 1;
                    var check_disallow_extensions_on_client = 0;
                    var allow_extensions = /(zip|mbz)$/i;
                    var check_file_name_format = 1;
                    var check_null_file_count = 1;
                    var check_duplicate_file_count = 1;
                    var max_upload_slots = 1;
                    var cedric_progress_bar = 1;
                    var cedric_hold_to_sync = 0;
                    var progress_bar_width = 400;
                    var show_percent_complete = 1;
                    var show_files_uploaded = 1;
                    var show_current_position = 1;
                    var show_elapsed_time = 1;
                    var show_est_time_left = 1;
                    var show_est_speed = 1;
                </script>
                <script language="javascript" type="text/javascript" src="modules/Agoraportal/upload/ubr_file_upload.js"></script>
                    <div id="formsArea">
                        <form name="form_upload" id="form_upload"  method="post" enctype="multipart/form-data" action="#" style="margin: 0px; padding: 0px;">
                            <noscript><font color='red'>Atenció: </font>Per pujar fitxers grans cal que el navegador tingui el Javascript activat.<br /><br /></noscript>
                            <input type="hidden" name="clientServiceId" value="" />
                                <div style="float:left; margin-left: 20px;">
                                    <!-- Include extra values you want passed to the upload script here. -->
                                    <!-- eg. <input type="text" name="employee_num" value="5"> -->
                                    <!-- Access the value in the CGI with $query->param('employee_num'); -->
                                    <!-- Access the value in the PHP finished page with $_POST_DATA['employee_num']; -->
                                    <!-- DO NOT USE "upfile_" for any of your values. -->
                                    <input type="file" name="upfile_{$smarty.foreach.service.index}" size="30" onChange="addUploadSlot(1)"  onkeypress="return handleKey(event)" value="" />
                                    <input type="button" id="upload_button" name="upload_button" value="Envia" onClick="document.forms['form_upload'].clientServiceId.value = {$clientServiceId};linkUpload();document.getElementById('formsArea').style.display='none';" />
                                </div>
                                <div style="clear:both; height: 20px;"></div>
                        </form>
                    </div>
                    <!-- Start Progress Bar -->
                    <div class="alert" id="ubr_alert"></div>
                    <div id="progress_bar" style="display:none">
                        <div class="bar1" id="upload_status_wrap">
                            <div class="bar2" id="upload_status"></div>
                        </div>
                        <br />
                        <center>
                            <table class="data" cellpadding='3' cellspacing='1' width="350">
                                <tr>
                                    <td align="left" width="200"><b>{gt text="Percentatge completat"}:</b></td>
                                    <td align="center"><span id="percent">0%</span></td>
                                </tr>
                                <tr>
                                    <td align="left" width="150"><b>{gt text="Fitxers enviats"}:</b></td>
                                    <td align="center"><span id="uploaded_files">0</span> de <span id="total_uploads"></span></td>
                                </tr>
                                <tr>
                                    <td align="left"><b>{gt text="Posició actual"}:</b></td>
                                    <td align="center"><span id="current">0</span> / <span id="total_kbytes"></span>KB</td>
                                </tr>
                                <tr>
                                    <td align="left"><b>{gt text="Temps consumit"}:</b></td>
                                    <td align="center"><span id="time">0</span></td>
                                </tr>
                                <tr>
                                    <td align="left"><b>{gt text="Temps restant"}:</b></td>
                                    <td align="center"><span id="remain">0</span></td>
                                </tr>
                                <tr>
                                    <td align="left"><b>{gt text="Velocitat"}:</b></td>
                                    <td align="center"><span id="speed">0</span> KB/s.</td>
                                </tr>
                            </table>
                        </center>
                    </div>
                    <!-- End Progress Bar -->
            {/if}
            <br />
            <div class="z-informationmsg">
                <p>{gt text="Des d'aquí podeu afegir fitxers grans al vostre espai Moodle, tenint en compte les condicions següents:"}</p>
                <ul>
                    <li>{gt text="Només s'admeten fitxers comprimits en format ZIP i MBZ que tinguin una mida compresa entre 10 i 200 MB."}</li>
                    <li>{gt text="Els fitxers de menys de 10 MB s'han de pujar des de l'espai web."}</li>
                    <li>{gt text="Mantingueu una còpia del fitxer en local fins que hàgiu comprovat que el fitxer s'ha enviat correctament."}</li>
                    <li>{gt text="Si en el repositori <strong>Fitxers</strong> n'hi ha un amb el mateix nom, serà sobreescrit."}</li>
                </ul>
            </div>
        {else}
            <div class="z-errormsg">
                {gt text="Heu superat el límit de capacitat de pujada de fitxers al servidor.
                          Per poder pujar fitxers abans heu d'alliberar quota o obtenir-ne més.
                          Podeu trobar més informació de com sol·licitar l'ampliació de la quota en aquesta <a href=\"http://agora.xtec.cat/moodle/moodle/mod/glossary/view.php?id=461&amp;mode=entry&amp;hook=561\">pregunta freqüent d'Àgora</a>."}
            </div>
        {/if}

        </div>
    {else if $action eq 'm2x'}
    <div id="m2x">
        <h2>{gt text="Fitxers Moodle 2.x"}</h2>
        <table class="z-datatable">
            <thead>
                <tr>
                    <th>
                        {gt text="Nom del fitxer"}
                    </th>
                    <th>
                        {gt text="Mida (MB)"}
                    </th>
                    <th>
                        {gt text="Data"}
                    </th>
                    <th>
                        {gt text="Esborra"}
                    </th>
                </tr>
            </thead>
            <tbody>
                {foreach item=file from=$moodle2RepoFiles}
                <tr id="file_{$file.name}">
                    {if $file.type == 'dir'}
                        <td style="color: blue;">
                            {$file.name}/
                        </td>
                        <td align="center">
                        </td>
                    {else}
                        <td>
                            {$file.name}
                        </td>
                        <td align="center">
                            {$file.size} MB
                        </td>
                    {/if}
                    <td>
                        {$file.time}
                    </td>
                    <td>
                        <a href="javascript:deleteFileM2x('{$file.filename}','{$file.name}','{$clientCode}');">
                            {img modname='core' src='14_layer_deletelayer.png' set='icons/extrasmall'}
                        </a>
                        {if $file.type != 'dir'}
                        |
                        <a href="{modurl modname='Agoraportal' type='user' func='downloadFile' filename=$file.filename name=$file.name clientCode=$clientCode target='m2x'}">
                            {img modname='core' src='agt_update_recommended.png' set='icons/extrasmall' __alt='Descarrega el fitxer' __title='Descarrega el fitxer'}
                        </a>
                        {/if}
                    </td>
                </tr>
                {foreachelse}
                <tr>
                    <td colspan="10">
                        {gt text="No s'han trobat fitxers"}
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
    {/if}
</div>