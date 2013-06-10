<table class="content-layout-edit">
    <tr>
        <td id="widget_col_0" class="content-area" colspan="2">
            {contentareatitle page=$page contentArea=0}
            {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=0}
        </td>
    </tr>
    <tr>
        <td id="widget_col_1" class="content-area" style="width: 62%">
            {contentareatitle page=$page contentArea=1}
            {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=1}
        </td>
        <td id="widget_col_2" class="content-area" style="width: 38%">
            {contentareatitle page=$page contentArea=2}
            {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=2}
        </td>
    </tr>
    <tr>
        <td id="widget_col_3" class="content-area" colspan="2">
            {contentareatitle page=$page contentArea=3}
            {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=3}
        </td>
    </tr>
</table>