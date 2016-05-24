<?php /* Smarty version 2.6.19, created on 2016-04-20 13:45:31
         compiled from gebo-new/quote/popup-close-relance.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo-new/quote/popup-close-relance.phtml', 14, false),array('modifier', 'escape', 'gebo-new/quote/popup-close-relance.phtml', 23, false),)), $this); ?>
<div class="modal-header">
	<button class="close" data-dismiss="modal" >&times;</button>
	<h3>Relance</h3>
</div>
<div class="modal-body">

	<form action="/quote-new/close-reasion-relance/" method="post" id="closequote">
			<input type="hidden" name="quote_id" id="closequoteid" value="<?php echo $this->_tpl_vars['qid']; ?>
" />
		
		<div class="form-group">
			<label>Reason<span class="f_req">*</span></label>
			<div class="controls">
				<select name="reason" id="reason" class="validate[required]" data-title="Select Reason">
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['closedreasons'],'selected' => $this->_tpl_vars['selected_reasons']), $this);?>

				</select>
			</div>
		</div>
		
	
		<div class="form-group">
			<label>Commentaire concernant la fermeture du devis<span class="f_req">*</span></label>
			<div class="controls">
				<textarea cols="30" id="closetxt" name="closetxt" rows="5" class="form-control validate[required]" ><?php echo ((is_array($_tmp=$this->_tpl_vars['closed_comments'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</textarea>
			</div>
		</div>
	
		<div class="form-group">
			<div class="controls">
				<button class="btn btn-primary" type="submit">Valider</button>
				<button  class="btn" data-dismiss="modal" type="reset">Annuler</button>
			</div>
		</div>			
	</form>
</div>
<?php echo '
<script>
var prefix = "close_";
	<!-- Bootstrap Select Picker -->
	$("#reason").selectpicker();
	$(\'select\').each(function() {
        $(this).next(\'div.select\').attr("id", prefix + this.id).removeClass("validate[required]");
    });	
	$("#closequote").validationEngine({prettySelect : true,usePrefix: prefix});	
	$(\'textarea\').attr(\'data-prompt-position\',\'topLeft\');
</script>
'; ?>
