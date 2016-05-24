<?php /* Smarty version 2.6.19, created on 2015-06-26 15:47:39
         compiled from gebo/survey/load-survey-participation.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/survey/load-survey-participation.phtml', 8, false),array('modifier', 'utf8_encode', 'gebo/survey/load-survey-participation.phtml', 21, false),array('modifier', 'zero_cut', 'gebo/survey/load-survey-participation.phtml', 51, false),)), $this); ?>
<table class="table surveyselect" id="surveyselect">	
	<thead>
		<tr style="display:none">
			<th></th><th></th><th></th><th></th><th></th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($this->_tpl_vars['surveyParticipants']) > 0): ?>
		<?php $_from = $this->_tpl_vars['surveyParticipants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['survey'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['survey']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['survey']):
        $this->_foreach['survey']['iteration']++;
?>
			<tr>
				<td style="width:15%">
					<div class="imageHolder">									
						<img class="media-object  img-circle" width="50px" height="50px"  src="<?php echo $this->_tpl_vars['fo_path']; ?>
/<?php echo $this->_tpl_vars['survey']['image']; ?>
" >
						<span class="caption label label-level">
							<i class="icon-bookmark"></i>
							<?php echo $this->_tpl_vars['survey']['profile_type']; ?>

						</span>
					</div>
				</td>
				<td style="width:18%">
					<b><?php echo ((is_array($_tmp=$this->_tpl_vars['survey']['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['survey']['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</b>
				</td>
				<td <?php if ($this->_tpl_vars['survey']['under_smic'] == 'yes'): ?> class="under_smic" <?php else: ?> class="smic" <?php endif; ?>>
					<?php if ($this->_tpl_vars['survey']['under_smic'] == 'yes'): ?>
						<img src="/BO/theme/gebo/img/gCons/dollar.png" alt="" />
					<?php else: ?>	
						<img src="/BO/theme/gebo/img/gCons/green-dollar.png" alt="" />	
					<?php endif; ?>	
					<div class="text"><?php echo $this->_tpl_vars['survey']['price_user']; ?>
 &<?php echo $this->_tpl_vars['currency']; ?>
; / art</div>
				</td>
				<td <?php if ($this->_tpl_vars['survey']['under_smic'] == 'yes'): ?> class="under_smic" <?php else: ?> class="smic" <?php endif; ?>>
					<?php if ($this->_tpl_vars['survey']['under_smic'] == 'yes'): ?>
						<img src="/BO/theme/gebo/img/gCons/copy-item.png" alt="" />
					<?php else: ?>
						<img src="/BO/theme/gebo/img/gCons/green-copy-item.png" alt="" />
					<?php endif; ?>50 <div class="text">
								<?php echo $this->_tpl_vars['survey']['response_details'][1]['response']; ?>
 &<?php echo $this->_tpl_vars['currency']; ?>
; / art
							</div>
				</td>
				<td>
					<input type="checkbox" name="status[]" <?php if ($this->_tpl_vars['survey']['status'] == 'active'): ?> checked <?php endif; ?> value="<?php echo $this->_tpl_vars['survey']['participate_id']; ?>
" class="validate[minCheckbox[1]]"/>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>	
			<tr class="avgprice_row">
				<td></td>
				<td>
					Average price/art
				</td>
				<td>
					<span class="avgprice"><?php echo ((is_array($_tmp=$this->_tpl_vars['avg_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['currency']; ?>
;</span>
				</td>
				<td>
					Average price/art <br> for 50 articles
				</td>
				<td>
					<span class="avgprice"><?php echo ((is_array($_tmp=$this->_tpl_vars['avg_bulk_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['currency']; ?>
;</span>
				</td>
			</tr>
	<?php else: ?>
		<tr>
			<td colspan="5">No Participants Found!</td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>
<?php echo '
<script type="text/javascript">
	 $(\'input[name="status[]"]\').each(function(){		
			$(this).iCheck({
				checkboxClass: \'icheckbox_square-yellow\',
				radioClass: \'iradio_square-yellow\'
			});
		  }); 
	
		  
'; ?>

<?php if (count($this->_tpl_vars['surveyParticipants']) > 0): ?>
<?php echo '
	 $(\'#surveyselect\').dataTable({
			 "bPaginate":   false,
			 "bSort":   false,
			"aoColumns": [
				null,
				null,
				null,
				null,
				null
			]
		});
'; ?>

<?php endif; ?>
<?php echo '
</script>
'; ?>