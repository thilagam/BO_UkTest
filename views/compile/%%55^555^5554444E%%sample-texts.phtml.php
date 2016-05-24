<?php /* Smarty version 2.6.19, created on 2015-12-23 08:46:14
         compiled from gebo/ebookers/sample-texts.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/ebookers/sample-texts.phtml', 1, false),array('modifier', 'utf8_encode', 'gebo/ebookers/sample-texts.phtml', 6, false),array('modifier', 'htmlentities', 'gebo/ebookers/sample-texts.phtml', 15, false),)), $this); ?>
<?php if (count($this->_tpl_vars['sampletexts']) > 0): ?>
<form class="form-horizontal"  action="" method="get" id="sampletxt_form">
<table class="table" id="sampletext_table">
	<thead>
		<tr>
			<th colspan="2" style="text-align:left"><h2> Sample texts for Token: <?php echo ((is_array($_tmp=$this->_tpl_vars['sampletexts'][0]['category_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 </h2></th>
		</tr>
	</thead>
<?php $_from = $this->_tpl_vars['sampletexts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sample'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sample']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sample']):
        $this->_foreach['sample']['iteration']++;
?>
	<tr>
		<td>
			<input type="radio" name="sampletextid" class="icheck validate[required]" id="<?php echo $this->_tpl_vars['sample']['sample_id']; ?>
" value="<?php echo $this->_tpl_vars['sample']['sample_id']; ?>
" <?php if ($this->_tpl_vars['sample']['sample_id'] == $this->_tpl_vars['sample_id']): ?> checked="checked" <?php endif; ?>/>
		</td>
		<td>
			<label for="<?php echo $this->_tpl_vars['sample']['sample_id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sample']['description'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>
</label>
		</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<div class="control-group topset2">
	<div class="pull-center">
		<button class="btn btn-primary" id="" type="submit">Select</button>
		<button class="btn" id=""  data-dismiss="modal" type="reset">Annular</button>
	</div>
</div>
</form>	
<?php else: ?>
<table class="table">
<thead>
	<tr>
		<th> No Sample texts found! </th>
	</tr>
</thead>
</table>
<?php endif; ?>

<?php echo '
<script type="text/javascript">
$(".icheck").iCheck({
		radioClass: \'iradio_square-blue\'
	});
	$("#sampletxt_form").validationEngine({prettySelect : true,useSuffix: "_chzn",onValidationComplete: function(form, status){
			if(status===true)
			{
				$("#sampletext, #seeall").val($("[name=\'sampletextid\']:checked").val());
				$("#sampletxt_text").html($("[name=\'sampletextid\']:checked").closest("tr").find("label").html());
				$("#seeall").text("Change Selection");
				$(\'#sampletexts\').modal(\'hide\');
			}
	}});
</script>
'; ?>