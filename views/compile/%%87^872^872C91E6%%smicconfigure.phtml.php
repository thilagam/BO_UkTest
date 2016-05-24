<?php /* Smarty version 2.6.19, created on 2013-11-27 14:32:01
         compiled from gebo/ao/smicconfigure.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/ao/smicconfigure.phtml', 59, false),)), $this); ?>
<?php echo '
	<script>
		$(document).ready(function() { 
			$(".uni_style").uniform(); 
		});
		function updatesmicall()
		{
			if($("#smiccheck").attr(\'checked\'))
			{
				var value = $("#smicapply").val();
				var count = $("#smiccount").val();
				for(var i = 0; i < count; i++)
				{
					$("#SMIC_"+i).val(value);
				}
			}	
		}
		
		
	</script>
'; ?>


<div class="row-fluid">
  	<div class="span12">
		<h3 class="heading">CONFIGURATION SMIC / COUNTRY</h3>

	<div align="right" style="padding-right:120px">
		<input type="button" class="btn btn-info" onClick="window.location='/ao/pollconfiguration?submenuId=ML2-SL23';" value="Return" />
	</div>	
	<form action="/ao/smicconfigure?submenuId=ML2-SL23" method="POST">
		<table align="center" width="55%" cellpadding="2" cellspacing="2" style="margin-top:15px; padding:10px;clear:both;" >
				<tr>
					<td>
						<label class="uni-checkbox">
							<input type="checkbox" name="smiccheck" id="smiccheck" onClick="updatesmicall();" class="uni_style"/> Apply this amount to all countries
						</label>
					</td>	
					<td colspan="2">
						<input type="text" name="smicapply" id="smicapply" value=""/>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
			<?php $_from = $this->_tpl_vars['smiclist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['smicloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['smicloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['smic']):
        $this->_foreach['smicloop']['iteration']++;
?> 
				<tr>
					<td><?php echo $this->_tpl_vars['language_array'][$this->_tpl_vars['smic']['id']]; ?>
</td>
					<td>
						<input type="text" name="SMIC[]" id="SMIC_<?php echo ($this->_foreach['smicloop']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['smic']['SMIC']; ?>
"/>
						<input type="hidden" name="id[]" value="<?php echo $this->_tpl_vars['smic']['id']; ?>
"/>
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			<tr>
				<td colspan="2">
					<input type="button" class="btn btn-info" onClick="window.location='/ao/pollconfiguration?submenuId=ML2-SL23';" value="Return" />
					<input type="submit" name="smic_submit" id="smic_submit" value="SAVE ALL" class="btn btn-info"/>
				</td>
			</tr>
		</table>
		<input type="hidden" name="smiccount" id="smiccount" value="<?php echo count($this->_tpl_vars['smiclist']); ?>
" />
	</form>		
	</div>
</div>