<?php /* Smarty version 2.6.19, created on 2014-07-30 13:18:22
         compiled from gebo/ao/poll_popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/ao/poll_popup.phtml', 4, false),array('modifier', 'zero_cut', 'gebo/ao/poll_popup.phtml', 29, false),array('modifier', 'count', 'gebo/ao/poll_popup.phtml', 32, false),)), $this); ?>
<div style="min-height:auto;max-height:200px;overflow:auto;margin-right:8px;overflow-x:hidden; border-radius:5px; margin-left:8px;">
	<table border="0" id="contrib_list_quicktip" style="max-height:40px;overflow:auto;" >
		<tr>
			<td style="color: #841515;font-size: 14px;padding-bottom: 5px;" colspan="3" align="center" valign="top"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['polllist'][0]['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</b></td>
		</tr>
		<tr>
			<td>
				<?php $_from = $this->_tpl_vars['PollParticipationDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['condetail_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['condetail_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['condetail_key'] => $this->_tpl_vars['condetail_item']):
        $this->_foreach['condetail_loop']['iteration']++;
?>
					<table>
						<tr>
							<td rowspan="4" valign="top">
								<img src="<?php echo $this->_tpl_vars['condetail_item']['contrib_home_picture']; ?>
" style="border-radius:10px; border:1px dashed #999999;" />
							</td>
						</tr>
						<tr>
							<td>Name </td>
							<td>: 
								<b>
									<?php if ($this->_tpl_vars['condetail_item']['first_name'] == "" && $this->_tpl_vars['condetail_item']['last_name'] == ""): ?>
										<?php echo $this->_tpl_vars['condetail_item']['email']; ?>

									<?php else: ?>	
										<?php echo ((is_array($_tmp=$this->_tpl_vars['condetail_item']['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['condetail_item']['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

									<?php endif; ?>	
								</b>
							</td>
						</tr>
						<tr>
							<td>Price </td>
							<td>: <b><?php echo ((is_array($_tmp=$this->_tpl_vars['condetail_item']['price_user'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 </b></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<?php if (count($this->_tpl_vars['PollParticipationDetails']) > 1 && count($this->_tpl_vars['PollParticipationDetails']) != $this->_tpl_vars['condetail_key']+1): ?>
						<tr>
							<td colspan="4"><hr></td>
						</tr>
						<?php endif; ?>
					</table>
				<?php endforeach; endif; unset($_from); ?>
			</td>
		</tr>
	</table>
</div>