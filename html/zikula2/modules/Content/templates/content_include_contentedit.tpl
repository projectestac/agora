{contentinsertlink pageId=$pageId contentAreaIndex=$contentAreaIndex}
{if !empty($content[$contentAreaIndex])}
<script type="text/javascript">
    //<![CDATA[
    {{foreach from=$content[$contentAreaIndex] item=c}}
    {{modurl modname='Content' type='admin' func='editcontent' cid=$c.id fqurl=1 assign='editUrl'}}
    {{formcontextmenureference menuId="contentEditMenu" commandArgument=$c.id imageURL="modules/Content/images/contextarrow.png" assign='menuHandle'}}
    var extrainfo = ((!{{$c.active}})?"<strong><em>&rArr; {{gt text='Item not Active'}} &lArr;</em></strong>":({{$c.visiblefor}}==0)?"<strong><em>&rArr; {{gt text='only logged in members'}} &lArr;</em></strong>":({{$c.visiblefor}}==2)?"<strong><em>&rArr; {{gt text='only not logged in people'}} &lArr;</em></strong>":"");
    content.items.push
    ({ {{* XXXs added to avoid wrong short URL handling in the Zikula short URL output filter *}}
        title: "<a hrefXXX=\"{{$editUrl|escape:html}}\">{{$c.title|safetext}} [{{gt text="ID %d" tag1=$c.id}}]</a> {{$menuHandle|replace:src:srcXXX|escape:javascript}}",
        content: "{{$c.output|replace:" src=":" srcXXX="|replace:" href=":" hrefXXX="|escape:'quotes'|escape:javascript}}"+extrainfo,
        column: {{$contentAreaIndex}},
        active: {{$c.active}},
        visiblefor: {{$c.visiblefor}},
        contentId: {{$c.id}}
    });
    {{/foreach}}
    //]]>
</script>
{/if}