{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text='Settings'}</h3>
</div>

<form class="z-form" action="{modurl modname="Weblinks" type="admin" func="updateconfig"}" method="post" enctype="application/x-www-form-urlencoded">
    <div>
        <input type="hidden" name="csrftoken" value="{insert name="csrftoken"}" />
        <fieldset>
            <legend>{gt text="Number of links"}</legend>
            <div class="z-formrow">
                <label for="config_perpage">{gt text="Links per page"}</label>
                <select id="config_perpage" name="config[perpage]" size="1">
                    <option value="10"{if $modvars.Weblinks.perpage eq '10'} selected="selected"{/if}>10</option>
                    <option value="15"{if $modvars.Weblinks.perpage eq '15'} selected="selected"{/if}>15</option>
                    <option value="20"{if $modvars.Weblinks.perpage eq '20'} selected="selected"{/if}>20</option>
                    <option value="25"{if $modvars.Weblinks.perpage eq '25'} selected="selected"{/if}>25</option>
                    <option value="30"{if $modvars.Weblinks.perpage eq '30'} selected="selected"{/if}>30</option>
                    <option value="50"{if $modvars.Weblinks.perpage eq '50'} selected="selected"{/if}>50</option>
                </select>
            </div>
            <div class="z-formrow">
                <label for="config_newlinks">{gt text="Number of links as new"}</label>
                <select id="config_newlinks" name="config[newlinks]" size="1">
                    <option value="10"{if $modvars.Weblinks.newlinks eq '10'} selected="selected"{/if}>10</option>
                    <option value="15"{if $modvars.Weblinks.newlinks eq '15'} selected="selected"{/if}>15</option>
                    <option value="20"{if $modvars.Weblinks.newlinks eq '20'} selected="selected"{/if}>20</option>
                    <option value="25"{if $modvars.Weblinks.newlinks eq '25'} selected="selected"{/if}>25</option>
                    <option value="30"{if $modvars.Weblinks.newlinks eq '30'} selected="selected"{/if}>30</option>
                    <option value="50"{if $modvars.Weblinks.newlinks eq '50'} selected="selected"{/if}>50</option>
                </select>
            </div>
            <div class="z-formrow">
                <label for="config_bestlinks">{gt text="Number of links required to qualify as best"}</label>
                <select id="config_bestlinks" name="config[bestlinks]" size="1">
                    <option value="10"{if $modvars.Weblinks.bestlinks eq '10'} selected="selected"{/if}>10</option>
                    <option value="15"{if $modvars.Weblinks.bestlinks eq '15'} selected="selected"{/if}>15</option>
                    <option value="20"{if $modvars.Weblinks.bestlinks eq '20'} selected="selected"{/if}>20</option>
                    <option value="25"{if $modvars.Weblinks.bestlinks eq '25'} selected="selected"{/if}>25</option>
                    <option value="30"{if $modvars.Weblinks.bestlinks eq '30'} selected="selected"{/if}>30</option>
                    <option value="50"{if $modvars.Weblinks.bestlinks eq '50'} selected="selected"{/if}>50</option>
                </select>
            </div>
            <div class="z-formrow">
                <label for="config_linksresults">{gt text="Links in search results"}</label>
                <select id="config_linksresults" name="config[linksresults]">
                    <option value="10"{if $modvars.Weblinks.linksresults eq '10'} selected="selected"{/if}>10</option>
                    <option value="15"{if $modvars.Weblinks.linksresults eq '15'} selected="selected"{/if}>15</option>
                    <option value="20"{if $modvars.Weblinks.linksresults eq '20'} selected="selected"{/if}>20</option>
                    <option value="25"{if $modvars.Weblinks.linksresults eq '25'} selected="selected"{/if}>25</option>
                    <option value="30"{if $modvars.Weblinks.linksresults eq '30'} selected="selected"{/if}>30</option>
                    <option value="50"{if $modvars.Weblinks.linksresults eq '50'} selected="selected"{/if}>50</option>
                </select>
            </div>
            <div class="z-formrow">
                <label for="linksinblock">{gt text="Number of links in the feature link box"}</label>
                <input type="text" id="linksinblock" name="config[linksinblock]" value="{$modvars.Weblinks.linksinblock}" size="4" />
            </div>
        </fieldset>

        <fieldset>
            <legend>{gt text="Popular"}</legend>
            <div class="z-formrow">
                <label for="config_popular">{gt text="Number of hits required to qualify as popular"}</label>
                <select id="config_popular" name="config[popular]" size="1">
                    <option value="100"{if $modvars.Weblinks.popular eq '100'} selected="selected"{/if}>100</option>
                    <option value="250"{if $modvars.Weblinks.popular eq '250'} selected="selected"{/if}>250</option>
                    <option value="500"{if $modvars.Weblinks.popular eq '500'} selected="selected"{/if}>500</option>
                    <option value="1000"{if $modvars.Weblinks.popular eq '1000'} selected="selected"{/if}>1000</option>
                    <option value="1500"{if $modvars.Weblinks.popular eq '1500'} selected="selected"{/if}>1500</option>
                    <option value="2000"{if $modvars.Weblinks.popular eq '2000'} selected="selected"{/if}>2000</option>
                </select>
            </div>
            <div class="z-formrow">
                <label for="weblinks_popular_mostpoplinkspercentrigger">{gt text="Want to show most-popular links as a percentage?<br />(If 'no', enter the number of links to show)"}</label>
                <div id="weblinks_popular_mostpoplinkspercentrigger">
                    <input id="weblinks_popular_mostpoplinkspercentrigger_yes" type="radio" name="config[mostpoplinkspercentrigger]" value="1"{if $modvars.Weblinks.mostpoplinkspercentrigger eq '1'} checked="checked"{/if} />
                    <label for="weblinks_popular_mostpoplinkspercentrigger_yes">{gt text="yes"}</label>
                    <input id="weblinks_popular_mostpoplinkspercentrigger_no" type="radio" name="config[mostpoplinkspercentrigger]" value="0"{if $modvars.Weblinks.mostpoplinkspercentrigger eq '0'} checked="checked"{/if} />
                    <label for="weblinks_popular_mostpoplinkspercentrigger_no">{gt text="no"}</label>
                </div>
            </div>
            <div class="z-formrow">
                <label for="config_mostpoplinks">{gt text="Most-popular links: either a number of links or the percentage to display (percentage as whole number, such as 25/100)"}</label>
                <input type="text" id="config_mostpoplinks" name="config[mostpoplinks]" value="{$modvars.Weblinks.mostpoplinks}" size="4" />
            </div>
        </fieldset>

        <fieldset>
            <legend>{gt text="Settings"}</legend>
            <div class="z-formrow">
                <label for="weblinks_settings_featurebox">{gt text="Show featured link box on web links main page?"}</label>
                <div id="weblinks_settings_featurebox">
                    <input id="weblinks_settings_featurebox_yes" type="radio" name="config[featurebox]" value="1"{if $modvars.Weblinks.featurebox eq '1'} checked="checked"{/if} />
                    <label for="weblinks_settings_featurebox_yes">{gt text="yes"}</label>
                    <input id="weblinks_settings_featurebox_no" type="radio" name="config[featurebox]" value="0"{if $modvars.Weblinks.featurebox eq '0'} checked="checked"{/if} />
                    <label for="weblinks_settings_featurebox_no">{gt text="no"}</label>
                </div>
            </div>
            <div class="z-formrow">
                <label for="weblinks_settings_targetblank">{gt text="Open link in a new window?"}</label>
                <div id="weblinks_settings_targetblank">
                    <input id="weblinks_settings_targetblank_yes" type="radio" name="config[targetblank]" value="1"{if $modvars.Weblinks.targetblank eq '1'} checked="checked"{/if} />
                    <label for="weblinks_settings_targetblank_yes">{gt text="yes"}</label>
                    <input id="weblinks_settings_targetblank_no" type="radio" name="config[targetblank]" value="0"{if $modvars.Weblinks.targetblank eq '0'} checked="checked"{/if} />
                    <label for="weblinks_settings_targetblank_no">{gt text="no"}</label>
                </div>
            </div>
            <div class="z-formrow">
                <label for="weblinks_settings_doubleurl">{gt text="Allow multiple use of an URL?"}</label>
                <div id="weblinks_settings_doubleurl">
                    <input id="weblinks_settings_doubleurl_yes" type="radio" name="config[doubleurl]" value="1"{if $modvars.Weblinks.targetblank eq '1'} checked="checked"{/if} />
                    <label for="weblinks_settings_doubleurl_yes">{gt text="yes"}</label>
                    <input id="weblinks_settings_doubleurl_no" type="radio" name="config[doubleurl]" value="0"{if $modvars.Weblinks.targetblank eq '0'} checked="checked"{/if} />
                    <label for="weblinks_settings_doubleurl_no">{gt text="no"}</label>
                </div>
            </div>
            <div class="z-formrow">
                <label for="weblinks_settings_unregbroken">{gt text="Allow unregistered users to suggest broken links?"}</label>
                <div id="weblinks_settings_unregbroken">
                    <input id="weblinks_settings_unregbroken_yes" type="radio" name="config[unregbroken]" value="1"{if $modvars.Weblinks.unregbroken eq '1'} checked="checked"{/if} />
                    <label for="weblinks_settings_unregbroken_yes">{gt text="yes"}</label>
                    <input id="weblinks_settings_unregbroken_no" type="radio" name="config[unregbroken]" value="0"{if $modvars.Weblinks.unregbroken eq '0'} checked="checked"{/if} />
                    <label for="weblinks_settings_unregbroken_no">{gt text="no"}</label>
                </div>
            </div>
            <div class="z-formrow">
                <label for="weblinks_settings_blockunregmodify">{gt text="Allow unregistered users to suggest link changes?"}</label>
                <div id="weblinks_settings_blockunregmodify">
                    <input id="weblinks_settings_blockunregmodify_yes" type="radio" name="config[blockunregmodify]" value="1"{if $modvars.Weblinks.blockunregmodify eq '1'} checked="checked"{/if} />
                    <label for="weblinks_settings_blockunregmodify_yes">{gt text="yes"}</label>
                    <input id="weblinks_settings_blockunregmodify_no" type="radio" name="config[blockunregmodify]" value="0"{if $modvars.Weblinks.blockunregmodify eq '0'} checked="checked"{/if} />
                    <label for="weblinks_settings_blockunregmodify_no">{gt text="no"}</label>
                </div>
            </div>
            <div class="z-formrow">
                <label for="weblinks_settings_anonaddlinklock">{gt text="Allow unregistered users to post new links?"}</label>
                <div id="weblinks_settings_anonaddlinklock">
                    <input id="weblinks_settings_anonaddlinklock_yes" type="radio" name="config[links_anonaddlinklock]" value="1"{if $modvars.Weblinks.links_anonaddlinklock eq '1'} checked="checked"{/if} />
                    <label for="weblinks_settings_anonaddlinklock_yes">{gt text="yes"}</label>
                    <input id="weblinks_settings_anonaddlinklock_no" type="radio" name="config[links_anonaddlinklock]" value="0"{if $modvars.Weblinks.links_anonaddlinklock eq '0'} checked="checked"{/if} />
                    <label for="weblinks_settings_anonaddlinklock_no">{gt text="no"}</label>
                </div>
            </div>
            <div class="z-formrow">
                <label for="weblinks_settings_showPendingContent">{gt text="Show pending content in Pending Content block"}</label>
                <div id="weblinks_settings_showPendingContent">
                    <input id="weblinks_settings_showPendingContent" type="checkbox" name="config[showPendingContent]" value="1"{if $modvars.Weblinks.showPendingContent} checked="checked"{/if} />
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>{gt text="Screenshots"}</legend>
            <div class="z-informationmsg">
                {gt text="If you want to use the screenshot function with thumber.de, register here:"} -&gt; <a href="http://www.thumber.de">{gt text="www.thumber.de"}</a><br />
            </div>
            <div class="z-formrow">
                <label for="weblinks_screenshot_active">{gt text="Show screenshots with thumber.de?"}</label>
                <div id="weblinks_screenshot_active">
                    <input id="weblinks_screenshot_active_yes" type="radio" name="config[thumber]" value="1"{if $modvars.Weblinks.thumber eq '1'} checked="checked"{/if} />
                    <label for="weblinks_screenshot_active_yes">{gt text="yes"}</label>
                    <input id="weblinks_screenshot_active_no" type="radio" name="config[thumber]" value="0"{if $modvars.Weblinks.thumber eq '0'} checked="checked"{/if} />
                    <label for="weblinks_screenshot_active_no">{gt text="no"}</label>
                </div>
            </div>
            <div class="z-formrow">
                <label for="weblinks_sreenshot_size">{gt text="Select size of thumb"}</label>
                <div id="weblinks_sreenshot_size">
                    <input id="weblinks_sreenshot_size_yes" type="radio" name="config[thumbersize]" value="S"{if $modvars.Weblinks.thumbersize eq 'S'} checked="checked"{/if} />
                    <label for="weblinks_sreenshot_size_yes">{gt text="S (100 x 75)"}</label>
                    <input id="weblinks_sreenshot_size_no" type="radio" name="config[thumbersize]" value="M"{if $modvars.Weblinks.thumbersize eq 'M'} checked="checked"{/if} />
                    <label for="weblinks_sreenshot_size_no">{gt text="M (120 x 90)"}</label>
                    <input id="weblinks_sreenshot_size_no" type="radio" name="config[thumbersize]" value="L"{if $modvars.Weblinks.thumbersize eq 'L'} checked="checked"{/if} />
                    <label for="weblinks_sreenshot_size_no">{gt text="L (150 x 113)"}</label>
                    <input id="weblinks_sreenshot_size_no" type="radio" name="config[thumbersize]" value="XL"{if $modvars.Weblinks.thumbersize eq 'XL'} checked="checked"{/if} />
                    <label for="weblinks_sreenshot_size_no">{gt text="XL (200 x 150)"}</label>
                    <input id="weblinks_sreenshot_size_no" type="radio" name="config[thumbersize]" value="XXL"{if $modvars.Weblinks.thumbersize eq 'XXL'} checked="checked"{/if} />
                    <label for="weblinks_sreenshot_size_no">{gt text="XXL (250 x 188)"}</label>
                    <input id="weblinks_sreenshot_size_no" type="radio" name="config[thumbersize]" value="XXXL"{if $modvars.Weblinks.thumbersize eq 'XXXL'} checked="checked"{/if} />
                    <label for="weblinks_sreenshot_size_no">{gt text="XXXL (300 x 255)"}</label>
                    <input id="weblinks_sreenshot_size_no" type="radio" name="config[thumbersize]" value="SXL"{if $modvars.Weblinks.thumbersize eq 'SXL'} checked="checked"{/if} />
                    <label for="weblinks_sreenshot_size_no">{gt text="SXL (400 x 300)"}</label>
                </div>
            </div>
        </fieldset>
        <div class="z-buttons z-formbuttons">
            {button src="button_ok.png" set="icons/extrasmall" class='z-btgreen' __alt="Modify configuration" __title="Modify configuration" __text="Modify configuration"}
            <a class='z-btred' href="{modurl modname='Weblinks' type='admin' func='view'}" title="{gt text="Cancel"}">{img modname='core' src="button_cancel.png" set="icons/extrasmall" __alt="Cancel" __title="Cancel"} {gt text="Cancel"}</a>
        </div>
    </div>
</form>
