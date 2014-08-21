{contentinsertlink pageId=$pageId contentAreaIndex=$contentAreaIndex}
{if !empty($content[$contentAreaIndex])}
<script type="text/javascript">
    //<![CDATA[
    {{foreach from=$content[$contentAreaIndex] item=c}}
    {{modurl modname='Content' type='admin' func='editcontent' cid=$c.id fqurl=1 assign='editUrl'}}
    {{formcontextmenureference menuId="contentEditMenu" commandArgument=$c.id imageURL="modules/Content/images/contextarrow.png" assign='menuHandle'}}
    var extraInfo = ({{$c.visiblefor}}==0)?"{{gt text='only visible when Logged In'}}":(({{$c.visiblefor}}==2)?"{{gt text='only visible when Not Logged In'}}":"");
	{{if $c.active}}
	var activeLed = '<span id="activitycid_{{$c.id}}"></span>&nbsp;<a class="content_activationbutton" href="javascript:void(0);" onclick="togglecontentstate({{$c.id}})">{{img src="page-greenled.gif" modname="Content" title=$deactivate alt=$deactivate id="activecid_`$c.id`"}}{{img src="page-redled.gif" modname="Content" title=$activate alt=$activate style="display: none;" id="inactivecid_`$c.id`"}}</a>' +
	'<noscript>{{img src=greenled.png modname=core set=icons/extrasmall __title="Active" __alt="Active" }}</noscript>';
	{{else}}
	var activeLed = '<span id="activitycid_{{$c.id}}">{{gt text="Inactive"}}</span>&nbsp;<a class="content_activationbutton" href="javascript:void(0);" onclick="togglecontentstate({{$c.id}})">{{img src="page-greenled.gif" modname="Content" title=$deactivate alt=$deactivate style="display: none;" id="activecid_`$c.id`"}}{{img src="page-redled.gif" modname="Content" title=$activate alt=$activate id="inactivecid_`$c.id`"}}</a>' +
	'<noscript>{{img src=redled.png modname=core set=icons/extrasmall __title="Inactive" __alt="Inactive" }}</noscript>';
	{{/if}}
    content.items.push
    ({ {{* XXXs added to avoid wrong short URL handling in the Zikula short URL output filter *}}
        title: "<a hrefXXX=\"{{$editUrl|escape:html}}\">{{$c.title|safetext}} [{{gt text="ID %d" tag1=$c.id}}]</a> {{$menuHandle|replace:src:srcXXX|escape:javascript}}" + '<span style="float:right">' + activeLed + '</span>',
        content: "{{$c.output|replace:" src=":" srcXXX="|replace:" href=":" hrefXXX="|escape:'quotes'|escape:javascript}}" + '<div class="widget_extrainfo">' + extraInfo + "</div>",
        column: {{$contentAreaIndex}},
        active: {{$c.active}},
        visiblefor: {{$c.visiblefor}},
        contentId: {{$c.id}}
    });
    {{/foreach}}
    //]]>
</script>
{/if}