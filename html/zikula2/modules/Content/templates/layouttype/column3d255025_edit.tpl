<table class="content-layout-edit">
    <tr>
        <td id="widget_col_0" class="content-area" colspan="3">
            {contentareatitle page=$page contentArea=0}
            {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=0}
        </td>
    </tr>
    <tr>
        <td id="widget_col_1" class="content-area" style="width: 25%">
            {contentareatitle page=$page contentArea=1}
            {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=1}
        </td>
        <td id="widget_col_2" class="content-area" style="width: 50%">
            {contentareatitle page=$page contentArea=2}
            {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=2}
        </td>
        <td id="widget_col_3" class="content-area" style="width: 25%">
            {contentareatitle page=$page contentArea=3}
            {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=3}
        </td>
    </tr>
    <tr>
        <td id="widget_col_4" class="content-area" colspan="3">
            {contentareatitle page=$page contentArea=4}
            {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=4}
        </td>
    </tr>
</table>