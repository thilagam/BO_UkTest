<?php /* Smarty version 2.6.19, created on 2016-04-20 13:45:59
         compiled from gebo-new/quote/popup-relance-quote.phtml */ ?>
<div class="modal-header">
	<button class="close" data-dismiss="modal" >&times;</button>
	<h3>Relance</h3>
</div>
<div class="modal-body">
	<form action="/quote-new/relance-client/" method="post" id="relancequote">
			<input type="hidden" name="quote_id" id="relancequoteid" value="<?php echo $this->_tpl_vars['qid']; ?>
" />
			<input type="hidden" name="active" id="active" value="<?php echo $this->_tpl_vars['active']; ?>
" />			
				
			<div class="form-group">
				<label>Commentaire <span class="f_req">*</span></label>
				<div class="controls">
					<textarea cols="30" id="comments" name="relancer_commet" rows="5" class="form-control validate[required]"></textarea>
				</div>
			</div>
		
			<div class="form-group">
				<label>Date<span class="f_req">*</span></label>
				<div >
					<div class="input-append date">
						<input type="text" id="relance_date" name="relance_at" value="" class="form-control validate[required]"><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
					</div>
				</div>
			</div>
			
		
			<div class="form-group">
				<div>
					<button class="btn btn-primary" type="submit">Valider</button>
					<button  class="btn" data-dismiss="modal" type="reset">Annuler</button>
				</div>
			</div>
				
			
	</form>
</div>
<?php echo '
<script src="/BO/theme/lbd/js/moment.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/lbd/js/bootstrap-datetimepicker.js" type="text/javascript" charset="utf-8"></script>

<script>
	$("#relancequote").validationEngine();
	$(\'textarea\').attr(\'data-prompt-position\',\'topLeft\');
	
	$(document).ready(function() {
		var dateNow = new Date();
		$(\'#relance_date\').datetimepicker({
			format:\'YYYY-M-D\'
            
         });
	});
</script>

'; ?>
