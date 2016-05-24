<?php /* Smarty version 2.6.19, created on 2015-06-26 09:36:04
         compiled from gebo/deliveryongoing/load-contrib-correctors.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/deliveryongoing/load-contrib-correctors.phtml', 5, false),)), $this); ?>
<?php if ($this->_tpl_vars['userreqtype'] == 'contributors'): ?>
	<select multiple="multiple" name="favcontribcheck[]" data-placeholder="Select Writer..." id="favcontribcheck" style="width:400px">
	<?php $_from = $this->_tpl_vars['contriblistall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contrib']):
?>
		<?php if (in_array ( $this->_tpl_vars['contrib']['identifier'] , $this->_tpl_vars['contrib_array'] )): ?>
		<option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
" selected><?php echo ((is_array($_tmp=$this->_tpl_vars['contrib']['name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
		<?php else: ?>
		<option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['contrib']['name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</select>
<?php elseif ($this->_tpl_vars['userreqtype'] == 'correctors'): ?>
	<select multiple="multiple" <?php if ($this->_tpl_vars['stage2'] == 'yes'): ?> disabled <?php endif; ?> name="favcorrectorcheck[]" data-placeholder="Select corrector..." id="favcorrectorcheck" style="width:400px">
	<?php $_from = $this->_tpl_vars['correctorlistall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contrib']):
?>
		<?php if (in_array ( $this->_tpl_vars['contrib']['identifier'] , $this->_tpl_vars['correctors_array'] )): ?>
		<option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
" selected><?php echo ((is_array($_tmp=$this->_tpl_vars['contrib']['name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
		<?php else: ?>
		<option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['contrib']['name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</select>
<?php endif; ?>