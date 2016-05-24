<?php /* Smarty version 2.6.19, created on 2014-07-30 12:25:36
         compiled from gebo/ao/markstatdetail.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/ao/markstatdetail.phtml', 46, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
	
	$(document).keyup(function(e){
			if(e.which == 27){
			    $("#markdetail").removeClass("in");
				$("#markdetail").css("display","none");
				$(\'div\').removeClass("modal-backdrop fade in");
			}
		});
		
	function addroyalties(art)
	{
		$.ajax({
		  type: \'GET\',
		  url: \'/ao/addroyalties\',
		  data: \'article=\' + art,
		  
		  success: function(data1) 
		  {  alert(data1); 
				smoke.alert("Article validated");
				$("#validate").hide();
				$("#validtext").html(\'<b>Validated</b>\');
		  }
		});
	}
	
</script>

'; ?>
	

	<table class="table table-bordered table-striped table_vam" id="markdetailtable">
		<thead>
			<tr>
				<th>User</th>
				<th>Type</th>
				<th>Download</th>
				<th>Price</th>
				<th>Mark</th>
				<th>Comment</th>
			</tr>
		</thead>
		<tbody>
			<!----------------------------- Writer -------------------------------->
			<tr>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['writerdetail'][0]['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['writerdetail'][0]['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
				<td>Writer</td>
				<td><a class="label label-warning" href="/ao/downloadarticle?process_id=<?php echo $this->_tpl_vars['writerdetail'][0]['id']; ?>
">Download</a></td>
				<td><?php echo $this->_tpl_vars['writerdetail'][0]['price_user']; ?>
</td>
				<td>-</td>
				<td><?php echo $this->_tpl_vars['writerdetail'][0]['comments']; ?>
</td>
			</tr>
			
			<!----------------------------- Corrector -------------------------------->
			<?php $_from = $this->_tpl_vars['correctiondetail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['correction_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['correction_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['corr_item']):
        $this->_foreach['correction_loop']['iteration']++;
?>
			<tr>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['corr_item']['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['corr_item']['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
				<td>Corrector</td>
				<td><a class="label label-warning" href="/ao/downloadarticle?process_id=<?php echo $this->_tpl_vars['corr_item']['id']; ?>
">Download</a></td>
				<td><?php echo $this->_tpl_vars['corr_item']['price_corrector']; ?>
</td>
				<td><?php echo $this->_tpl_vars['corr_item']['marks']; ?>
</td>
				<td><?php echo $this->_tpl_vars['corr_item']['comments']; ?>
</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
		</tbody>
	</table>
	
	<div align="center">
		<b>Note/10</b>: <?php echo $this->_tpl_vars['writerdetail'][0]['min_mark']; ?>
 
		<br>
		<b>Average Marks</b>: <?php echo $this->_tpl_vars['sum']; ?>
/<?php echo $this->_tpl_vars['corrcnt']; ?>
 : <b><?php echo $this->_tpl_vars['average']; ?>
</b>
		<br><br>	
		<?php if ($this->_tpl_vars['average'] >= $this->_tpl_vars['writerdetail'][0]['min_mark']): ?> 
			<?php if ($this->_tpl_vars['writerdetail'][0]['profile_type'] != 'senior'): ?>
				<?php if ($this->_tpl_vars['writerdetail'][0]['profile_type'] == 'sub-junior'): ?>
					<a href="javascript:void(0);" onClick="updowngrade('<?php echo $this->_tpl_vars['writerdetail'][0]['user_id']; ?>
','junior','<?php echo $this->_tpl_vars['writerdetail'][0]['profile_type']; ?>
');" class="hint--left hint--info" data-hint="Upgrade to Junior"><img src="/BO/theme/gebo/img/up_blue.png"/></a>
					&nbsp;
				<?php endif; ?>
				<a href="javascript:void(0);" onClick="updowngrade('<?php echo $this->_tpl_vars['writerdetail'][0]['user_id']; ?>
','senior','<?php echo $this->_tpl_vars['writerdetail'][0]['profile_type']; ?>
');" class="hint--left hint--info" data-hint="Upgrade to Senior"><img src="/BO/theme/gebo/img/up_green.png"/></a>
			<?php endif; ?>
		<?php else: ?>
			<?php if ($this->_tpl_vars['writerdetail'][0]['profile_type'] != 'sub-junior'): ?>
				<?php if ($this->_tpl_vars['writerdetail'][0]['profile_type'] == 'senior'): ?>
					<a href="javascript:void(0);" onClick="updowngrade('<?php echo $this->_tpl_vars['writerdetail'][0]['user_id']; ?>
','junior','<?php echo $this->_tpl_vars['writerdetail'][0]['profile_type']; ?>
');" class="hint--left hint--info" data-hint="Downgrade to Junior"><img src="/BO/theme/gebo/img/down_orange.png"/></a>
					&nbsp;
				<?php endif; ?>
				<a href="javascript:void(0);" onClick="updowngrade('<?php echo $this->_tpl_vars['writerdetail'][0]['user_id']; ?>
','sub-junior','<?php echo $this->_tpl_vars['writerdetail'][0]['profile_type']; ?>
');" class="hint--left hint--info" data-hint="Downgrade to Sub-junior"><img src="/BO/theme/gebo/img/down_red.png"/></a>
			<?php endif; ?>
		<?php endif; ?>
		
	</div>
	
	<div style="float:right">
		<span id="validtext">
			<?php if ($this->_tpl_vars['writerdetail'][0]['status'] != 'published'): ?>
				<input type="button" name="validate" id="validate" value="Validate" class="btn btn-info" onClick="addroyalties('<?php echo $this->_tpl_vars['writerdetail'][0]['article_id']; ?>
');"></input>&nbsp;
			<?php else: ?>
				<b>Validated</b>
			<?php endif; ?>	
		</span>
	</div>	

