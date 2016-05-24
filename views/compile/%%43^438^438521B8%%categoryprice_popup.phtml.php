<?php /* Smarty version 2.6.19, created on 2013-09-27 08:56:06
         compiled from gebo/ao/categoryprice_popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/ao/categoryprice_popup.phtml', 5, false),)), $this); ?>
<form name="" action="/ao/categoryprice?submenuId=ML2-SL12" method="post">
	<table cellpadding="4" cellspacing="4" align="center">
		<tr>
			<td>Category</td>
			<td><b><?php echo ((is_array($_tmp=$this->_tpl_vars['categories_array'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</b></td>
		</tr>
		<tr>
			<td>Char price</td>
			<td><input type="text" name="charprice" id="charprice" value="<?php echo $this->_tpl_vars['PriceList'][0]['charprice']; ?>
"/></td>
		</tr>
		<tr>
			<td>Word price</td>
			<td><input type="text" name="wordprice" id="wordprice" value="<?php echo $this->_tpl_vars['PriceList'][0]['wordprice']; ?>
"/></td>
		</tr>
		<tr>	
			<td>Sheet price</td>
			<td><input type="text" name="sheetprice" id="sheetprice" value="<?php echo $this->_tpl_vars['PriceList'][0]['sheetprice']; ?>
"/></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="submit_price" value="Submit" class="btn btn-info"/>
				<input type="button" name="cancel" value="Fermer" data-dismiss="modal" class="btn btn-info"/>
			</td>	
		</tr>
	</table>	
    <input type="hidden" name="category_id" id="category_id" value="<?php echo $this->_tpl_vars['PriceList'][0]['category_id']; ?>
"/>
</form>