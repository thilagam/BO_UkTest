<?php /* Smarty version 2.6.19, created on 2016-04-12 14:52:45
         compiled from gebo-new/quote/popup-close-quote.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo-new/quote/popup-close-quote.phtml', 13, false),)), $this); ?>
<div class="modal-header modal-header-black">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title center-block">Fermer devis</h4>
</div>
<div class="modal-body">	 
	<form action="/quote-new/close-quote/" method="post" id="closequote">
		<input type="hidden" name="quote_id" id="closequoteid" value="<?php echo $this->_tpl_vars['qid']; ?>
" />					
		<div class="form-group">
			<label>Reason<span class="f_req">*</span></label>
			<div class="controls">
				<select name="reason" id="reason" class="validate[required] span6" placeholder="Select Reason">
					<option>Select Reason</option>
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['closedreasons']), $this);?>

								
				</select>
			</div>
		</div>		
	
		<div class="form-group">
			<label>Commentaire concernant la fermeture du devis<span class="f_req">*</span></label>
			<div class="controls">
				<textarea cols="30" class="form-control" id="closetxt" name="closetxt" rows="5" class="span12 validate[required]"></textarea>
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
