<?php /* Smarty version 2.6.19, created on 2013-09-27 09:52:07
         compiled from gebo/ao/validtemppopup.phtml */ ?>
<?php echo '
<script type="text/javascript" >
	$(document).ready(function() {
		$("#valtemp_type").chosen({disable_search:true});
		$("#valtemp_active").chosen({disable_search:true});
	});
</script>
<style>
	input,textarea {text-transform:none;}
</style>
'; ?>


<form  action="/template/editvalidationtemplate?submenuId=ML4-SL6" method="post">	
	<table cellpadding="4" cellspacing="4" align="center">
		<tr>
			<td>Type</td>
			<td>
				<select name="valtemp_type" id="valtemp_type">
					<option value="0">Select</option>
					<option value="refuse"<?php if ($this->_tpl_vars['type'] == 'refuse'): ?> selected=selected <?php endif; ?>>Refuse</option>
					<option value="information"<?php if ($this->_tpl_vars['type'] == 'information'): ?> selected=selected <?php endif; ?>>Information</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Title</td>
			<td><input type="text" id="valtemp_title" name="valtemp_title" class="span5" value="<?php echo $this->_tpl_vars['title']; ?>
"/>  </td>
		</tr>
		<tr>
			<td valign="top">Text</td>
			<td><textarea id="valtemp_content" name="valtemp_content" value="" class="span5" rows="8"><?php echo $this->_tpl_vars['text']; ?>
</textarea></td>
		</tr>	
		<tr>
			<td>Status</td>
			<td>
				<select name="valtemp_active" id="valtemp_active">
					<option value="yes"<?php if ($this->_tpl_vars['status'] == 'yes'): ?> selected=selected <?php endif; ?>>Active</option>
					<option value="no"<?php if ($this->_tpl_vars['status'] == 'no'): ?> selected=selected <?php endif; ?>>Inactive</option>
                </select>  
			</td>
		</tr>
		<tr>
			<td></td>
			<td>	
				<input type="hidden" id="valtempId" name="valtempId" value="<?php echo $this->_tpl_vars['identifier']; ?>
">
				<input type="submit" id="valtemp_submit" name="valtemp_submit" value="" class="btn btn-info"/>
				<input type="button" id="close_pop" name="close_pop" value="Close" class="btn btn-info" data-dismiss="modal" />
			</td>
		</tr>
	</table>		
</form>
