<?php /* Smarty version 2.6.19, created on 2015-10-08 17:20:38
         compiled from gebo/quote/close-quote-sale.phtml */ ?>
<form action="/quote/save-close-quote-sale/" class="form-horizontal" method="post" id="closequote">
			<input type="hidden" name="quote_id" id="closequoteid" value="<?php echo $this->_tpl_vars['qid']; ?>
" />
			<section>
				<div class="row-fluid topset2">
					<div class="control-group">
						<label class="control-label">Reason<span class="f_req">*</span></label>
						<div class="controls">
							<select name="reason" id="reason" class="validate[required] span6" placeholder="Select Reason" readonly>
								<option>Select Reason</option>
								
								<option selected value="refusal_to_answer_EP">Refusal to answer EP</option>				
							</select>
						</div>
					</div>
					
				</div>
				<div class="row-fluid">
					<div class="control-group">
						<label class="control-label">Comment on the closure of quote<span class="f_req">*</span></label>
						<div class="controls">
							<textarea cols="30" id="closetxt" name="closetxt" rows="5" class="span12 validate[required]"></textarea>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-primary" type="submit">Ok</button>
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
