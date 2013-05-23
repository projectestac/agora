<table class="content-layout-edit">
    <tr>
        {* First table column contains the regular 2 column layout *}
        {* Extra placeholder table cells have gotten a higher widget_col 
           to make sure they don't interfere with the regular contentareas *}
        <td style="width: 66%">
            <table style="width: 100%">
                <tr>
                    <td id="widget_col_00" class="content-area" colspan="2">
                        {contentareatitle page=$page contentArea=0}
                        {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=0}
                    </td>
                </tr>
                <tr>
                    <td id="widget_col_01" class="content-area" style="width: 33%">
                        {contentareatitle page=$page contentArea=1}
                        {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=1}
                    </td>
                    <td id="widget_col_02" class="content-area" style="width: 33%">
                        {contentareatitle page=$page contentArea=2}
                        {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=2}
                    </td>
                </tr>
                <tr>
                    <td id="widget_col_03" class="content-area" colspan="2">
                        {contentareatitle page=$page contentArea=3}
                        {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=3}
                    </td>
                </tr>
                <tr>
                    <td id="widget_col_04" class="content-area" style="width: 33%">
                        {contentareatitle page=$page contentArea=4}
                        {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=4}
                    </td>
                    <td id="widget_col_05" class="content-area" style="width: 33%">
                        {contentareatitle page=$page contentArea=5}
                        {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=5}
                    </td>
                </tr>
                <tr>
                    <td id="widget_col_06" class="content-area" colspan="2">
                        {contentareatitle page=$page contentArea=6}
                        {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=6}
                    </td>
                </tr>
                <tr>
                    <td id="widget_col_07" class="content-area" style="width: 33%">
                        {contentareatitle page=$page contentArea=7}
                        {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=7}
                    </td>
                    <td id="widget_col_08" class="content-area" style="width: 33%">
                        {contentareatitle page=$page contentArea=8}
                        {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=8}
                    </td>
                </tr>
                <tr>
                    <td id="widget_col_09" class="content-area" colspan="2">
                        {contentareatitle page=$page contentArea='9'}
                        {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex='9'}
                    </td>
                </tr>
            </table>
        </td>
        
        {* Second table column contains the extra right column blocks *}
        <td style="width: 33%">
            <table style="width: 100%">
                <tr>
                    <td id="widget_col_10" class="content-area" style="width: 33%">
                        {contentareatitle page=$page contentArea='10'}
                        {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex='10'}
                    </td>
                </tr>
                <tr>
                    <td id="widget_col_99" class="content-area-inactive" style="width: 33%">
                        Blocks in blockposition <strong>"content_rightblocks"</strong> will be displayed here.
                    </td>
                </tr>
                <tr>
                    <td id="widget_col_11" class="content-area" style="width: 33%">
                        {contentareatitle page=$page contentArea='11'}
                        {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex='11'}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>