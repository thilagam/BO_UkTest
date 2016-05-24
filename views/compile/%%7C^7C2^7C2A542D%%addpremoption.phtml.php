<?php /* Smarty version 2.6.19, created on 2013-12-03 15:11:39
         compiled from gebo/ao/addpremoption.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/ao/addpremoption.phtml', 54, false),)), $this); ?>
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
		<h3 class="heading">Premiun Options :: Add Option </h3>
		<form action="/ao/addpremoption?submenuId=ML2-SL8" method="post" enctype="multipart/form-data">
			<table cellpadding="4" cellspacing="4" width="80%" align="center">
				<tr>
					<td>Option Name</td>
					<td><input type="text" name="option_name" id="option_name" value="" /></td>
				</tr>
				<tr>	
					<td>FO Option Price</td>
					<td><input type="text" name="option_price" id="option_price" value="" /></td>
				</tr>
				<tr>
					<td>BO Option Price</td>
					<td><input type="text" name="option_price_bo" id="option_price_bo" value=""/></td>
				</tr>
				<tr>	
					<td>Option Belongs to</td>
					<td>
						<select name="belongs_to" id="belongs_to">
							<option value="fo" >FO</option>
							<option value="bo" >BO</option>
							<option value="both" selected="selected">BOTH</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Parent</td>
					<td><?php echo smarty_function_html_options(array('name' => 'parentoptions_list','id' => 'parentoptions_list','options' => $this->_tpl_vars['parentoptions_list'],'selected' => $this->_tpl_vars['parentOption'],'onchange' => "parentOrChild();"), $this);?>
</td>
				</tr>
				<tr>	
					<td>Status</td>
					<td>
						<select name="status" id="status" >
							<option value="active" <?php if ($this->_tpl_vars['optiondetails'][0]['status'] == 'active'): ?> selected="selected" <?php endif; ?>>Active</option>
							<option value="inactive" <?php if ($this->_tpl_vars['optiondetails'][0]['status'] == 'inactive'): ?> selected="selected" <?php endif; ?>>Inactive</option>
						</select>
					</td>
				</tr>
				<tr id="typeOption">
					<td valign="top">Type</td>
					<td>
						<label class="uni-radio"><input type="radio" name="parentoptiontype" id="unique" class="uni_style" value="unique" <?php if ($this->_tpl_vars['optiondetails'][0]['type'] == 'unique'): ?> checked="checked"<?php endif; ?> />Unique</label>
						<label class="uni-radio"><input type="radio" name="parentoptiontype" id="addition" class="uni_style" value="additional" <?php if ($this->_tpl_vars['optiondetails'][0]['type'] == 'additional'): ?> checked="checked"<?php endif; ?> />Additional</label>
					</td>
				</tr>
				<tr>
					<td valign="top">Option Description</td>
					<td><textarea rows="6" class="span9" name="option_desc"></textarea></td>
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
