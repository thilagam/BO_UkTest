<?php /* Smarty version 2.6.19, created on 2015-10-08 14:48:55
         compiled from gebo/quote/close-quote.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/quote/close-quote.phtml', 10, false),)), $this); ?>
<form action="/quote/close-quote/" class="form-horizontal" method="post" id="closequote">
			<input type="hidden" name="quote_id" id="closequoteid" value="<?php echo $this->_tpl_vars['qid']; ?>
" />
			<section>
				<div class="row-fluid topset2">
					<div class="control-group">
						<label class="control-label">Reason<span class="f_req">*</span></label>
						<div class="controls">
							<select name="reason" id="reason" class="validate[required] span6" placeholder="Select Reason">
								<option>Select Reason</option>
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['closedreasons']), $this);?>

							</select>
						</div>
					</div>
					
				</div>
				<div class="row-fluid">
					<div class="control-group">
						<label class="control-label">Close quote - leave a comment<span class="f_req">*</span></label>
						<div class="controls">
							<textarea cols="30" id="closetxt" name="closetxt" rows="5" class="span12 validate[required]"></textarea>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-primary" type="submit">Validate</button>
							<button  class="btn" data-dismiss="modal" type="reset">Cancel</button>
						</div>
					</div>
				</div>
			</section>
</form>
<?php echo '
<script>
	$("#reason").chosen({ allow_single_deselect: false,disable_search: true});
	$("#closequote").validationEngine({prettySelect : true,useSuffix: "_chzn"});
	$(\'textarea\').attr(\'data-prompt-position\',\'topLeft\');
</script>
'; ?>