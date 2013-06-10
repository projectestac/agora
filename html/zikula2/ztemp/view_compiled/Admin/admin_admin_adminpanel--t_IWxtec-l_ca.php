<?php /* Smarty version 2.6.26, created on 2012-11-30 16:33:10
         compiled from admin_admin_adminpanel.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'safetext', 'admin_admin_adminpanel.tpl', 3, false),array('modifier', 'gt', 'admin_admin_adminpanel.tpl', 21, false),array('modifier', 'truncate', 'admin_admin_adminpanel.tpl', 53, false),array('function', 'math', 'admin_admin_adminpanel.tpl', 11, false),array('function', 'img', 'admin_admin_adminpanel.tpl', 21, false),array('function', 'modapifunc', 'admin_admin_adminpanel.tpl', 25, false),array('function', 'gt', 'admin_admin_adminpanel.tpl', 62, false),)), $this); ?>
<?php echo $this->_tpl_vars['menu']; ?>

<div id="z-admincontainer" class="z-admin-content">
    <h2><?php echo ((is_array($_tmp=$this->_tpl_vars['category']['name'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
</h2>
    <div class="z-admincategorydescription"><?php echo ((is_array($_tmp=$this->_tpl_vars['category']['description'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
</div>

    <?php if (! empty ( $this->_tpl_vars['adminlinks'] )): ?>

        <div id="z-adminiconlist">
            <?php $this->assign('moduleid', '0'); ?>
            <?php $_from = $this->_tpl_vars['adminlinks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['adminlink'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['adminlink']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['adminlink']):
        $this->_foreach['adminlink']['iteration']++;
?>
            <?php echo smarty_function_math(array('equation' => ($this->_tpl_vars['moduleid'])."+1",'assign' => 'moduleid'), $this);?>


            <?php if (($this->_foreach['adminlink']['iteration'] <= 1)): ?><div class="z-adminiconrow z-clearfix" id="modules"><?php endif; ?>
                <div id="module_<?php echo $this->_tpl_vars['adminlink']['id']; ?>
" class="z-adminiconcontainer draggable" style="width:<?php echo smarty_function_math(array('equation' => '100/x','x' => $this->_tpl_vars['modvars']['Admin']['modulesperrow'],'format' => '%.0f'), $this);?>
%;z-index:<?php echo smarty_function_math(array('equation' => "2200-".($this->_tpl_vars['moduleid'])), $this);?>
;">
                    <?php if ($this->_tpl_vars['modvars']['Admin']['admingraphic'] == 1): ?>
                    <a class="z-adminicon z-adminfloat" title="<?php echo $this->_tpl_vars['adminlink']['menutexttitle']; ?>
" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminlink']['menutexturl'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
">
                        <img class="z-adminfloat" src="<?php echo $this->_tpl_vars['adminlink']['adminicon']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminlink']['menutext'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminlink']['menutext'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
" />
                    </a>
                    <?php endif; ?>
                    <div class="z-adminlinkheader">
                        <?php echo smarty_function_img(array('modname' => 'Admin','src' => 'mouse.png','alt' => ((is_array($_tmp='Drag and drop into a new module category')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view'])),'title' => ((is_array($_tmp='Drag and drop into a new module category')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view'])),'id' => "dragicon".($this->_tpl_vars['adminlink']['id']),'class' => 'z-dragicon'), $this);?>

                        <a class="z-adminmodtitle" title="<?php echo $this->_tpl_vars['adminlink']['menutexttitle']; ?>
" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminlink']['menutexturl'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['adminlink']['menutext'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
</a>

                        <?php $this->assign('modlinks', false); ?>
                        <?php echo smarty_function_modapifunc(array('modname' => $this->_tpl_vars['adminlink']['modname'],'type' => 'admin','func' => 'getlinks','assign' => 'modlinks'), $this);?>

                        <?php if ($this->_tpl_vars['modlinks']): ?>
                        <span id="mcontext<?php echo $this->_tpl_vars['moduleid']; ?>
" class="z-pointericon" title='Functions'>&nbsp;</span>
                        <?php endif; ?>

                        <script type="text/javascript"><?php echo '
                        /* <![CDATA[ */
                        '; ?>
<?php if ($this->_tpl_vars['modlinks']): ?><?php echo '
                            var context_mcontext'; ?>
<?php echo $this->_tpl_vars['moduleid']; ?>
<?php echo ' = new Control.ContextMenu(\'mcontext'; ?>
<?php echo $this->_tpl_vars['moduleid']; ?>
<?php echo '\',{
                                leftClick: true,
                                animation: false
                            });

                            '; ?>
<?php $_from = $this->_tpl_vars['modlinks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['modlink']):
?><?php echo '
                                context_mcontext'; ?>
<?php echo $this->_tpl_vars['moduleid']; ?>
<?php echo '.addItem({
                                    label: \''; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['modlink']['text'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
<?php echo '\',
                                    callback: function(){window.location = \''; ?>
<?php echo $this->_tpl_vars['modlink']['url']; ?>
<?php echo '\';}
                                });
                            '; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '

                        '; ?>
<?php endif; ?><?php echo '
                        /* ]]> */
                        '; ?>
</script>


                    </div>

                    <?php echo smarty_function_math(array('equation' => "170-x*30",'x' => $this->_tpl_vars['modvars']['Admin']['modulesperrow'],'format' => "%.0f",'assign' => 'trunLen'), $this);?>

                    <div class="z-menutexttitle"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['adminlink']['menutexttitle'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_tpl_vars['trunLen'], "&hellip;", false) : smarty_modifier_truncate($_tmp, $this->_tpl_vars['trunLen'], "&hellip;", false)); ?>
</div>

                </div>
        <?php if (($this->_foreach['adminlink']['iteration'] == $this->_foreach['adminlink']['total'])): ?></div><?php endif; ?>

        <?php endforeach; endif; unset($_from); ?>
        </div>

    <?php else: ?>
    <p class="z-bold z-center"><?php echo smarty_function_gt(array('text' => "There are currently no modules in this category."), $this);?>
</p>
    <?php endif; ?>
</div>

<div class="z-admin-coreversion z-right">Zikula <?php echo $this->_tpl_vars['coredata']['version_num']; ?>
</div>