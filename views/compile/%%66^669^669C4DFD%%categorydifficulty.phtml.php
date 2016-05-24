<?php /* Smarty version 2.6.19, created on 2013-11-27 14:43:59
         compiled from gebo/ao/categorydifficulty.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/ao/categorydifficulty.phtml', 58, false),)), $this); ?>
<?php echo '
	<script>
		$(document).ready(function() { 
			$(".uni_style").uniform(); 
		});
		function updatediffall()
		{
			if($("#catcheck").attr(\'checked\'))
			{
				var value = $("#catapply").val();
				var count = $("#catcount").val();
				for(var i = 0; i < count; i++)
				{
					$("#percentage_"+i).val(value);
				}
			}			
		}
	</script>
'; ?>


<div class="row-fluid">
  	<div class="span12">
		<h3 class="heading">% PERCENTAGE OF DIFFICULTY BY CATEGORY</h3>
	
	<div align="right" style="padding-right:120px;">
		<input type="button" class="btn btn-info" onClick="window.location='/ao/pollconfiguration?submenuId=ML2-SL23';" value="RETURN" />
	</div>	
	
	<form action="/ao/categorydifficulty?submenuId=ML2-SL23" method="POST">
		<table align="center" width="55%" cellpadding="2" cellspacing="2" style="margin-top:15px; padding:10px;clear:both;" >
			<tr>
				<td>
					<label class="uni-checkbox">
						<input type="checkbox" name="catcheck" id="catcheck" onClick="updatediffall();" class="uni_style"/> Apply this % in all categories
					</label>
				</td>	
				<td colspan="2">
					<input type="text" name="catapply" id="catapply" value=""/>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<?php $_from = $this->_tpl_vars['catdifflist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['catloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['catloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['catdiff']):
        $this->_foreach['catloop']['iteration']++;
?>
				<tr> 
					<td><?php echo $this->_tpl_vars['catdiff']['title']; ?>
</td> 
					<td>
						<input type="text" name="percentage[]" id="percentage_<?php echo ($this->_foreach['catloop']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['catdiff']['percentage']; ?>
"/>
						<input type="hidden" name="id[]" value="<?php echo $this->_tpl_vars['catdiff']['id']; ?>
"/> 
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			<tr>
				<td colspan="2">
					<input type="button" class="btn btn-info" onClick="window.location='/ao/pollconfiguration?submenuId=ML2-SL23';" value="RETURN" />
					<input type="submit" name="catdiff_submit" id="catdiff_submit" value="SAVE ALL" class="btn btn-info" /> 
				</td>
			</tr>
		</table>
		<input type="hidden" name="catcount" id="catcount" value="<?php echo count($this->_tpl_vars['catdifflist']); ?>
" />
	</form>	
</div>
</div>	