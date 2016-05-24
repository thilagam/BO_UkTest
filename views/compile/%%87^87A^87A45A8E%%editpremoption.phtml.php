<?php /* Smarty version 2.6.19, created on 2014-12-01 13:01:36
         compiled from gebo/ao/editpremoption.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/ao/editpremoption.phtml', 31, false),array('function', 'html_options', 'gebo/ao/editpremoption.phtml', 53, false),)), $this); ?>
<?php echo '
 <script type="text/javascript" >
    $(document).ready(function(){
		$("#belongs_to").chosen({ disable_search: true });	
		$("#parentoptions_list").chosen({ disable_search: true });	
		$("#status").chosen({ disable_search: true });	
		$(".uni_style").uniform(); 
	});	
		
	function parentOrChild()
    {
        var parentoption=$("#parentoptions_list").val();
        if(parentoption != 0)
			$("#typeOption").hide();
        else
			$("#typeOption").show();
    }
 </script>
 <style>
	input {text-transform:none !important;}
	textarea {text-transform:none !important;}
</style>
'; ?>

<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Premiun Options :: Edit Option </h3>
		<form action="/ao/editpremoption?submenuId=ML2-SL8&optionId=<?php echo $this->_tpl_vars['optiondetails'][0]['id']; ?>
" method="post" enctype="multipart/form-data">
			<table cellpadding="4" cellspacing="4" width="80%" align="center">
				<tr>
					<td>Option Name</td>
					<td><input type="text" name="option_name" id="option_name" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['optiondetails'][0]['option_name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
"/></td>
				</tr>
				<tr>	
					<td>Option Price</td>
					<td><input type="text" name="option_price" id="option_price" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['optiondetails'][0]['option_price'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
"/></td>
				</tr>
				<tr>
					<td>BO Option Price</td>
					<td><input type="text" name="option_price_bo" id="option_price_bo" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['optiondetails'][0]['option_price_bo'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
"/></td>
				</tr>
				<tr>	
					<td>Option Belongs to</td>
					<td> 
						<select name="belongs_to" id="belongs_to">
							<option value="fo" <?php if ($this->_tpl_vars['optiondetails'][0]['belongs'] == 'fo'): ?> selected="selected" <?php endif; ?>>FO</option>
							<option value="bo" <?php if ($this->_tpl_vars['optiondetails'][0]['belongs'] == 'bo'): ?> selected="selected" <?php endif; ?>>BO</option>
							<option value="both" <?php if ($this->_tpl_vars['optiondetails'][0]['belongs'] == 'both'): ?> selected="selected" <?php endif; ?>>BOTH</option>
						</select>
					</td>
				</tr>
				<tr <?php if ($this->_tpl_vars['optiondetails'][0]['parent'] == '0'): ?>style="display:none;"<?php endif; ?>>
					<td>Parent</td>
					<td><?php echo smarty_function_html_options(array('name' => 'parentoptions_list','id' => 'parentoptions_list','options' => $this->_tpl_vars['parentoptions_list'],'selected' => $this->_tpl_vars['parentOption']), $this);?>
</td>
				</tr>
				<tr <?php if ($this->_tpl_vars['optiondetails'][0]['parent'] != '0'): ?>style="display:none;"<?php endif; ?>>
					<td valign="top">Type</td>
					<td> 
						<label class="uni-radio"><input type="radio" name="parentoptiontype" id="unique" disabled="disabled" class="uni_style" value="unique" <?php if ($this->_tpl_vars['optiondetails'][0]['type'] == 'unique'): ?> checked="checked"<?php endif; ?> />Unique</label>
						<label class="uni-radio"><input type="radio" name="parentoptiontype" id="addition" disabled="disabled" class="uni_style" value="additional" <?php if ($this->_tpl_vars['optiondetails'][0]['type'] == 'additional'): ?> checked="checked"<?php endif; ?> />Additional</label>
					</td>	
				</tr>
				<tr>
					<td>Status </td>
					<td>
						<select name="status" id="status">
							<option value="active" <?php if ($this->_tpl_vars['optiondetails'][0]['status'] == 'active'): ?> selected="selected" <?php endif; ?>>Active</option>
							<option value="inactive" <?php if ($this->_tpl_vars['optiondetails'][0]['status'] == 'inactive'): ?> selected="selected" <?php endif; ?>>Inactive</option>
						</select>
					</td>
				</tr>	
				<tr>
					<td valign="top">Option Description </td>
					<td><textarea rows="6" class="span9" name="option_desc"><?php echo ((is_array($_tmp=$this->_tpl_vars['optiondetails'][0]['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</textarea></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" value="SUBMIT" name="optionsubmit" class="btn btn-info">
						<input type="button" value="CANCEL" onClick="window.location='/ao/premiumoptions?submenuId=ML2-SL8'" class="btn btn-info"/>
					</td>
				</tr>
			</table>	
		</form>
	</div>
</div>	
