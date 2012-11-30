<?php /* Smarty version 2.6.26, created on 2012-11-30 16:35:10
         compiled from IWagendas_block_next.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'IWagendas_block_next.htm', 16, false),)), $this); ?>
<script language="JavaScript1.2"><?php echo '

    //Translucent scroller- By Dynamic Drive
    //For full source code and more DHTML scripts, visit http://www.dynamicdrive.com
    //This credit MUST stay intact for use

    var scroller_width=\'95%\'
    var scroller_height=\'80px\'
    var bgcolor=\'lightyellow\'
    var pause=3000 //SET PAUSE BETWEEN SLIDE (3000=3 seconds)

    var scrollercontent=new Array()

    '; ?>
<?php $_from = $this->_tpl_vars['events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oneEvent'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oneEvent']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['event']):
        $this->_foreach['oneEvent']['iteration']++;
?><?php echo '
    var id='; ?>
<?php echo ($this->_foreach['oneEvent']['iteration']-1); ?>
<?php echo '
    scrollercontent[id]=\''; ?>
<?php if (! empty ( $this->_tpl_vars['event']['date'] )): ?><?php echo ''; ?>
<?php echo $this->_tpl_vars['event']['date']; ?>
<?php echo ' (<strong>'; ?>
<?php echo $this->_tpl_vars['event']['title']; ?>
<?php echo '</strong>)<br />'; ?>
<?php endif; ?><?php echo ''; ?>
<?php echo $this->_tpl_vars['event']['datafield']; ?>
<?php echo ''; ?>
<?php if ($this->_tpl_vars['event']['deleted']): ?><?php echo ' (<strong>'; ?>
<?php echo smarty_function_gt(array('text' => 'Deleted','domain' => 'module_IWagendas'), $this);?>
<?php echo '</strong>)'; ?>
<?php endif; ?><?php echo ''; ?>
<?php if ($this->_tpl_vars['event']['modified']): ?><?php echo ' (<strong>'; ?>
<?php echo smarty_function_gt(array('text' => 'Agenda updated','domain' => 'module_IWagendas'), $this);?>
<?php echo '</strong>)'; ?>
<?php endif; ?><?php echo '\'
    '; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '

    ////NO need to edit beyond here/////////////

    var ie4=document.all
    var dom=document.getElementById&&navigator.userAgent.indexOf("Opera")==-1

    if (ie4||dom)
        document.write(\'<div style="position:relative;width:\'+scroller_width+\';height:\'+scroller_height+\';overflow:hidden"><div id="canvas0" style="position:absolute;background-color:\'+bgcolor+\';width:\'+scroller_width+\';height:\'+scroller_height+\';top:\'+scroller_height+\';filter:alpha(opacity=20);-moz-opacity:0.2; padding: 5px;"></div><div id="canvas1" style="position:absolute;background-color:\'+bgcolor+\';width:\'+scroller_width+\';height:\'+scroller_height+\';top:\'+scroller_height+\';filter:alpha(opacity=20);-moz-opacity:0.2; padding: 5px;"></div></div>\')
    else if (document.layers) {
        document.write(\'<ilayer id=tickernsmain visibility=hide width=\'+scroller_width+\' height=\'+scroller_height+\' bgColor=\'+bgcolor+\'><layer id=tickernssub width=\'+scroller_width+\' height=\'+scroller_height+\' left=0 top=0>\'+scrollercontent[0]+\'</layer></ilayer>\')
    }

    var curpos=scroller_height*(1)
    var degree=10
    var curcanvas="canvas0"
    var curindex=0
    var nextindex=1

    function moveslide(){
        if (curpos>0) {
            curpos=Math.max(curpos-degree,0)
            tempobj.style.top=curpos+"px"
        } else {
            clearInterval(dropslide)
            if (crossobj.filters)
                crossobj.filters.alpha.opacity=100
            else if (crossobj.style.MozOpacity)
                crossobj.style.MozOpacity=1
            nextcanvas=(curcanvas=="canvas0")? "canvas0" : "canvas1"
            tempobj=ie4? eval("document.all."+nextcanvas) : document.getElementById(nextcanvas)
            tempobj.innerHTML=scrollercontent[curindex]
            nextindex=(nextindex<scrollercontent.length-1)? nextindex+1 : 0
            setTimeout("rotateslide()",pause)
        }
    }

    function rotateslide() {
        if (ie4||dom){
            resetit(curcanvas)
            crossobj=tempobj=ie4? eval("document.all."+curcanvas) : document.getElementById(curcanvas)
            crossobj.style.zIndex++
            if (crossobj.filters)
                document.all.canvas0.filters.alpha.opacity=document.all.canvas1.filters.alpha.opacity=20
            else if (crossobj.style.MozOpacity)
                document.getElementById("canvas0").style.MozOpacity=document.getElementById("canvas1").style.MozOpacity=0.2
            var temp=\'setInterval("moveslide()",50)\'
            dropslide=eval(temp)
            curcanvas=(curcanvas=="canvas0")? "canvas1" : "canvas0"
        }
        else if (document.layers){
            crossobj.document.write(scrollercontent[curindex])
            crossobj.document.close()
        }
        curindex=(curindex<scrollercontent.length-1)? curindex+1 : 0
    }

    function resetit(what){
        curpos=parseInt(scroller_height)*(1)
        var crossobj=ie4? eval("document.all."+what) : document.getElementById(what)
        crossobj.style.top=curpos+"px"
    }

    function startit(){
        crossobj=ie4? eval("document.all."+curcanvas) : dom? document.getElementById(curcanvas) : document.tickernsmain.document.tickernssub
        if (ie4||dom){
            crossobj.innerHTML=scrollercontent[curindex]
            rotateslide()
            crossobj.onclick=new Function("window.open(\'index.php?module=IWagendas\',\'_parent\')");
        }else{
            document.tickernsmain.visibility=\'show\'
            curindex++
            setInterval("rotateslide()",pause)
        }
    }

    // if (ie4||dom||document.layers)
    // window.onload=startit
    if (ie4||dom||document.layers) startit();

'; ?>
</script>

<div class="iwagendas-block-next">
    <?php echo smarty_function_gt(array('text' => "In the next %s days",'tag1' => $this->_tpl_vars['days'],'domain' => 'module_IWagendas'), $this);?>

</div>