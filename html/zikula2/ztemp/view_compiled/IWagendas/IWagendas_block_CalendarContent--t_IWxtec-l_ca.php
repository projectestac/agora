<?php /* Smarty version 2.6.26, created on 2012-11-30 16:35:10
         compiled from IWagendas_block_CalendarContent.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'img', 'IWagendas_block_CalendarContent.htm', 7, false),array('function', 'modurl', 'IWagendas_block_CalendarContent.htm', 9, false),array('modifier', 'gt', 'IWagendas_block_CalendarContent.htm', 7, false),)), $this); ?>

<table cellpadding="0" style="width:100%; border: 2px solid #<?php echo $this->_tpl_vars['colors'][7]; ?>
; background-color:#<?php echo $this->_tpl_vars['colors'][4]; ?>
">
        <tr>
        <td align="center" bgcolor="#<?php echo $this->_tpl_vars['colors'][0]; ?>
" colspan="7">
            <a href="javascript:calendarBlockMonth(<?php echo $this->_tpl_vars['previous_month']; ?>
,<?php echo $this->_tpl_vars['year']; ?>
)">
                <?php echo smarty_function_img(array('modname' => 'IWagendas','src' => 'mesmenys.gif','alt' => ((is_array($_tmp='Previous month')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view'])),'title' => ((is_array($_tmp='Previous month')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view']))), $this);?>

            </a>
            <a href="<?php echo smarty_function_modurl(array('modname' => 'IWagendas','type' => 'user','func' => 'main','mes' => $this->_tpl_vars['month'],'any' => $this->_tpl_vars['year']), $this);?>
" style="color:#<?php echo $this->_tpl_vars['colors'][1]; ?>
">
                <strong><?php echo $this->_tpl_vars['month_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['year']; ?>
</strong>
            </a>
            <a href="javascript:calendarBlockMonth(<?php echo $this->_tpl_vars['next_month']; ?>
,<?php echo $this->_tpl_vars['year']; ?>
)">
                <?php echo smarty_function_img(array('modname' => 'IWagendas','src' => 'mesmes.gif','alt' => ((is_array($_tmp='Next month')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view'])),'title' => ((is_array($_tmp='Next month')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view']))), $this);?>

            </a>
        </td>
    </tr>
        <tr>
    <?php unset($this->_sections['day_name']);
$this->_sections['day_name']['name'] = 'day_name';
$this->_sections['day_name']['loop'] = is_array($_loop=$this->_tpl_vars['day_names_abbr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['day_name']['show'] = true;
$this->_sections['day_name']['max'] = $this->_sections['day_name']['loop'];
$this->_sections['day_name']['step'] = 1;
$this->_sections['day_name']['start'] = $this->_sections['day_name']['step'] > 0 ? 0 : $this->_sections['day_name']['loop']-1;
if ($this->_sections['day_name']['show']) {
    $this->_sections['day_name']['total'] = $this->_sections['day_name']['loop'];
    if ($this->_sections['day_name']['total'] == 0)
        $this->_sections['day_name']['show'] = false;
} else
    $this->_sections['day_name']['total'] = 0;
if ($this->_sections['day_name']['show']):

            for ($this->_sections['day_name']['index'] = $this->_sections['day_name']['start'], $this->_sections['day_name']['iteration'] = 1;
                 $this->_sections['day_name']['iteration'] <= $this->_sections['day_name']['total'];
                 $this->_sections['day_name']['index'] += $this->_sections['day_name']['step'], $this->_sections['day_name']['iteration']++):
$this->_sections['day_name']['rownum'] = $this->_sections['day_name']['iteration'];
$this->_sections['day_name']['index_prev'] = $this->_sections['day_name']['index'] - $this->_sections['day_name']['step'];
$this->_sections['day_name']['index_next'] = $this->_sections['day_name']['index'] + $this->_sections['day_name']['step'];
$this->_sections['day_name']['first']      = ($this->_sections['day_name']['iteration'] == 1);
$this->_sections['day_name']['last']       = ($this->_sections['day_name']['iteration'] == $this->_sections['day_name']['total']);
?> <!-- Header with the name of the day abbreviated -->
        <td style="color:#<?php echo $this->_tpl_vars['colors'][3]; ?>
; background:#<?php echo $this->_tpl_vars['colors'][2]; ?>
; text-align:center;"><?php echo $this->_tpl_vars['day_names_abbr'][$this->_sections['day_name']['index']]; ?>
</td>
    <?php endfor; endif; ?>
    </tr>
        <tr>
    <?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['day_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['day_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k_day'] => $this->_tpl_vars['v_day']):
        $this->_foreach['day_loop']['iteration']++;
?>         <?php if ($this->_foreach['day_loop']['iteration'] <= $this->_tpl_vars['days_month']): ?> 
            <?php if ($this->_foreach['day_loop']['iteration'] == 1): ?>                 <?php unset($this->_sections['empty_days']);
$this->_sections['empty_days']['name'] = 'empty_days';
$this->_sections['empty_days']['loop'] = is_array($_loop=$this->_tpl_vars['first_day']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['empty_days']['start'] = (int)1;
$this->_sections['empty_days']['show'] = true;
$this->_sections['empty_days']['max'] = $this->_sections['empty_days']['loop'];
$this->_sections['empty_days']['step'] = 1;
if ($this->_sections['empty_days']['start'] < 0)
    $this->_sections['empty_days']['start'] = max($this->_sections['empty_days']['step'] > 0 ? 0 : -1, $this->_sections['empty_days']['loop'] + $this->_sections['empty_days']['start']);
else
    $this->_sections['empty_days']['start'] = min($this->_sections['empty_days']['start'], $this->_sections['empty_days']['step'] > 0 ? $this->_sections['empty_days']['loop'] : $this->_sections['empty_days']['loop']-1);
if ($this->_sections['empty_days']['show']) {
    $this->_sections['empty_days']['total'] = min(ceil(($this->_sections['empty_days']['step'] > 0 ? $this->_sections['empty_days']['loop'] - $this->_sections['empty_days']['start'] : $this->_sections['empty_days']['start']+1)/abs($this->_sections['empty_days']['step'])), $this->_sections['empty_days']['max']);
    if ($this->_sections['empty_days']['total'] == 0)
        $this->_sections['empty_days']['show'] = false;
} else
    $this->_sections['empty_days']['total'] = 0;
if ($this->_sections['empty_days']['show']):

            for ($this->_sections['empty_days']['index'] = $this->_sections['empty_days']['start'], $this->_sections['empty_days']['iteration'] = 1;
                 $this->_sections['empty_days']['iteration'] <= $this->_sections['empty_days']['total'];
                 $this->_sections['empty_days']['index'] += $this->_sections['empty_days']['step'], $this->_sections['empty_days']['iteration']++):
$this->_sections['empty_days']['rownum'] = $this->_sections['empty_days']['iteration'];
$this->_sections['empty_days']['index_prev'] = $this->_sections['empty_days']['index'] - $this->_sections['empty_days']['step'];
$this->_sections['empty_days']['index_next'] = $this->_sections['empty_days']['index'] + $this->_sections['empty_days']['step'];
$this->_sections['empty_days']['first']      = ($this->_sections['empty_days']['iteration'] == 1);
$this->_sections['empty_days']['last']       = ($this->_sections['empty_days']['iteration'] == $this->_sections['empty_days']['total']);
?><td style="width:14.27%; text-align:center;">&nbsp;</td><?php endfor; endif; ?>
            <?php endif; ?>

            <?php if (!(( $this->_tpl_vars['first_day'] + $this->_foreach['day_loop']['iteration'] - 2 ) % 7)): ?>                 </tr><tr>
            <?php endif; ?>

            <?php if (isset ( $this->_tpl_vars['v_day']['info'] )): ?>                 <td style="width:14.27%; background:#<?php echo $this->_tpl_vars['v_day']['bgcolor']; ?>
; text-align:center;" onmouseout="nd();" onmouseover="overlib('<?php echo $this->_tpl_vars['v_day']['label']; ?>
<?php echo $this->_tpl_vars['v_day']['content']; ?>
<br /><img src=\'modules/IWagendas/images/info.gif\' width=\'14\' height=\'14\' alt=\'info\' />&nbsp;<?php echo $this->_tpl_vars['v_day']['info']; ?>
', CAPTION, '<?php echo $this->_tpl_vars['v_day']['caption']; ?>
', BGCOLOR, '#316ac5', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">
                    <span style="color:#<?php echo $this->_tpl_vars['v_day']['color']; ?>
;"><a href="<?php echo smarty_function_modurl(array('modname' => 'IWagendas','type' => 'user','func' => 'main','mes' => $this->_tpl_vars['month'],'any' => $this->_tpl_vars['year'],'daid' => 0,'dia' => $this->_foreach['day_loop']['iteration']), $this);?>
"><?php echo $this->_foreach['day_loop']['iteration']; ?>
<?php if ($this->_tpl_vars['v_day']['haveContent']): ?>*<?php endif; ?></a></span>
                    <br /><?php echo smarty_function_img(array('modname' => 'IWagendas','src' => 'info.gif'), $this);?>

                </td>
            <?php else: ?>
                <td style="width:14.27%; background:#<?php echo $this->_tpl_vars['v_day']['bgcolor']; ?>
; text-align:center;" onmouseout="nd();" onmouseover="overlib('<?php echo $this->_tpl_vars['v_day']['label']; ?>
<?php echo $this->_tpl_vars['v_day']['content']; ?>
', CAPTION, '<?php echo $this->_tpl_vars['v_day']['caption']; ?>
', BGCOLOR, '#316ac5', TIMEOUT, 100000, DELAY, 200, WIDTH, 200)">
                    <span style="color:#<?php echo $this->_tpl_vars['v_day']['color']; ?>
;"><a href="<?php echo smarty_function_modurl(array('modname' => 'IWagendas','type' => 'user','func' => 'main','mes' => $this->_tpl_vars['month'],'any' => $this->_tpl_vars['year'],'daid' => 0,'dia' => $this->_foreach['day_loop']['iteration']), $this);?>
"><?php echo $this->_foreach['day_loop']['iteration']; ?>
<?php if ($this->_tpl_vars['v_day']['haveContent']): ?>*<?php endif; ?></a></span>
                </td>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    </tr>
</table>