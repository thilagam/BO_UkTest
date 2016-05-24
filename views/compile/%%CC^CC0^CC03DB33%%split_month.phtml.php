<?php /* Smarty version 2.6.19, created on 2015-09-02 14:45:16
         compiled from gebo/quotecontractmission/split_month.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/quotecontractmission/split_month.phtml', 13, false),array('modifier', 'utf8_encode', 'gebo/quotecontractmission/split_month.phtml', 19, false),array('modifier', 'zero_cut_t', 'gebo/quotecontractmission/split_month.phtml', 22, false),array('modifier', 'count', 'gebo/quotecontractmission/split_month.phtml', 27, false),)), $this); ?>
<div class="w-box-content cnt_a">
<table class="table table-bordered">
	<?php if ($this->_tpl_vars['edit_status']): ?>
	<thead>
		<tr>
			<td style="text-align:left"><span class="btn btn-primary" onclick="updatesplitval()">Update</span></td>
		</tr>
	</thead>
	<?php endif; ?>
	<tr>
		<th style="width:200px !important"></th>
		<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
			<th><?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%b %y") : smarty_modifier_date_format($_tmp, "%b %y")); ?>
 (&<?php echo $this->_tpl_vars['currency']; ?>
;)</th>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
	<?php $_from = $this->_tpl_vars['turnovers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['producttype'] => $this->_tpl_vars['turnover1']):
?>
		<?php $_from = $this->_tpl_vars['turnover1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['missiontype'] => $this->_tpl_vars['turnover']):
?>
		<tr>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['missiontype'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
		<?php $_from = $this->_tpl_vars['turnover']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['monthname'] => $this->_tpl_vars['value']):
?>
		<td>
		<span class="splitvaltxt"><?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span>
		<input type="text" value="<?php echo $this->_tpl_vars['value']; ?>
" name="splitval[<?php echo $this->_tpl_vars['producttype']; ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['missiontype'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
][<?php echo $this->_tpl_vars['monthname']; ?>
]" style="width:60px" class="validate[required,custom[number]] hide splitfield"/> 
		<input type="hidden" name="splittype[<?php echo $this->_tpl_vars['producttype']; ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['missiontype'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
][<?php echo $this->_tpl_vars['monthname']; ?>
]" value="<?php echo $this->_tpl_vars['producttype']; ?>
"/>
		</td>
		<?php endforeach; endif; unset($_from); ?>
		<?php $this->assign('foo', count($this->_tpl_vars['turnover'])); ?>
		<?php while ($this->_tpl_vars['monthcount'] > $this->_tpl_vars['foo']) { ?>
		  <td><?php $this->assign('foo', $this->_tpl_vars['foo']+1); ?>-</td>
		<?php } ?>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	<?php endforeach; endif; unset($_from); ?>
</table>
<input type="hidden" value="<?php echo $this->_tpl_vars['explaunchdate']; ?>
" id="explaunchdate" name="expenddate" />
</div>