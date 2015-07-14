{include file="agoraportal_user_menu.tpl"}

<nav class="navbar navbar-default">
    <div class="container-fluid">
    <ul class="nav navbar-nav">
        <li><a href="{modurl modname='Agoraportal' type='user' func='files' action='uploadFiles' clientCode=$client->clientCode}" >{gt text="Envia fitxers"}</a></li>
        <li><a href="{modurl modname='Agoraportal' type='user' func='files' action='m2x' clientCode=$client->clientCode}">{gt text="Llista els fitxers"}</a></li>
    </ul>
    </div>
</nav>

<h3>{gt text="Fitxers grans a Moodle2"}</h3>
{include file="agoraportal_user_service_disk_usage.tpl"}

{if $action eq 'uploadFiles'}
<div id="uploadFiles">
    <h4>{gt text="Envia fitxers grans al servidor"}</h4>
    {if $service->disk_percentage < 100}
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
        <div class="alert alert-info">
            <p>{gt text="Des d'aquí podeu afegir fitxers grans al vostre espai Moodle, tenint en compte les condicions següents:"}</p>
            <ul>
                <li>{gt text="Només s'admeten fitxers comprimits en format ZIP i MBZ que tinguin una mida compresa entre 10 i 200 MB."}</li>
                <li>{gt text="Els fitxers de menys de 10 MB s'han de pujar des de l'espai web."}</li>
                <li>{gt text="Mantingueu una còpia del fitxer en local fins que hàgiu comprovat que el fitxer s'ha enviat correctament."}</li>
                <li>{gt text="Si en el repositori <strong>Fitxers</strong> n'hi ha un amb el mateix nom, serà sobreescrit."}</li>
            </ul>
        </div>
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
        <div class="alert alert-danger">
            {gt text="Heu superat el límit de capacitat de pujada de fitxers al servidor.
                Per poder pujar fitxers abans heu d'alliberar quota o obtenir-ne més.
                Podeu trobar més informació de com sol·licitar l'ampliació de la quota en aquesta <a href=\"http://agora.xtec.cat/moodle/moodle/mod/glossary/view.php?id=461&amp;mode=entry&amp;hook=561\">pregunta freqüent d'Àgora</a>."}
        </div>
    {/if}
{/if}
{if $action eq 'm2x'}
<div id="m2x">
    <h4>{gt text="Llistat de fitxers"}</h4>
    <span id="reload"></span>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>{gt text="Nom del fitxer"}</th>
                <th>{gt text="Mida (MB)"}</th>
                <th>{gt text="Data"}</th>
                <th>{gt text="Esborra"}</th>
            </tr>
        </thead>
        <tbody>
            {foreach item=file from=$moodle2RepoFiles}
            <tr id="file_{$file.name}">
                {if $file.type == 'dir'}
                    <td class="info">{$file.name}/</td>
                    <td></td>
                {else}
                    <td>{$file.name}</td>
                    <td>{$file.size} MB</td>
                {/if}
                <td>{$file.time}</td>
                <td>
                    <div class="btn-group" role="group">
                        {if $file.type != 'dir'}
                            <a class="btn btn-info" href="{modurl modname='Agoraportal' type='user' func='downloadFile' filename=$file.filename name=$file.name clientCode=$client->clientCode target='m2x'}" title="Descarrega el fitxer">
                                <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                <span class="sr-only">Descarrega el fitxer</span>
                            </a>
                        {/if}
                        <button class="btn btn-danger" onclick="deleteFileM2x('{$file.filename}','{$file.name}','{$client->clientCode}');" title="Esborra el fitxer">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            <span class="sr-only">Esborra el fitxer</span>
                        </button>
                    </div>
                </td>
            </tr>
            {foreachelse}
            <tr>
                <td colspan="4">
                    {gt text="No s'han trobat fitxers"}
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{/if}
