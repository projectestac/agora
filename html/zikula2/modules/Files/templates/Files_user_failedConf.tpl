<h2>{gt text="Failed Files Module configuration"}</h2>
<p class="z-errormsg">{gt text="Problems with folders configuration"}</p>
<ul>
{if $check.config eq 'multisites'}
<li>{gt text="Problems with multisites configuration. Check <i>\$ZConfig['Multisites']['filesRealPath']</i> and <i>\$ZConfig['Multisites']['siteFilesFolder']</i> definitions."}</li>
{/if}
{if $check.config eq 'config_site'}
<li>{gt text="Problems with site configuration. Check <i>\$ZConfig['FilesModule']['folderPath']</i> in <i>config.php</i>."}</li>
{/if}
{if $check.config eq 'default_site'}
<li>{gt text="Problems with Zikula configuration. Check <i>\$ZConfig['System']['datadir']</i> in <i>config.php</i>."}</li>
{/if}
{if $check.warning eq 'no_folderPath'}
<li>{gt text="Folder <i>%s</i> not exists." tag1=$check.folderPath}</li>
{/if}
{if $check.warning eq 'noWriteable_folderPath'}
<li>{gt text="Folder <i>%s</i> is no writeable." tag1=$check.folderPath}</li>
{/if}
<li>{gt text="Contact site admin and report this problem."}</li>
</ul><br>
<a href='index.php'>{gt text="Go to homepage"}</a>
