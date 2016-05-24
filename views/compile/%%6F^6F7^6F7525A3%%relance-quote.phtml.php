<?php /* Smarty version 2.6.19, created on 2015-10-07 17:42:09
         compiled from gebo/quote/relance-quote.phtml */ ?>
<div class="row-fluid">

<form action="/quote/relance-client/" class="form-horizontal" method="post" id="relancequote">
			<input type="hidden" name="quote_id" id="relancequoteid" value="<?php echo $this->_tpl_vars['qid']; ?>
" />
			<input type="hidden" name="active" id="active" value="<?php echo $this->_tpl_vars['active']; ?>
" />
			<section>
				<br>
				<br>
				<div class="row-fluid">
					<div class="control-group">
						<label class="control-label">Comment(s) <span class="f_req">*</span></label>
						<div class="controls">
							<textarea cols="30" id="comments" name="relancer_commet" rows="5" class="span12 validate[required]"></textarea>
						</div>
					</div>
				</div>
				
				<div class="row-fluid topset2">
					<div class="control-group">
						<label class="control-label">Date<span class="f_req">*</span></label>
						<div class="controls">
							<div class="input-append date">
								<input type="text" id="relance_date" name="relance_at" value="" class="span12 validate[required]"><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
							</div>
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
<div>
<?php echo '
<link href="/BO/theme/gebo/css/jquery.datetimepicker.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.datetimepicker.js" type="text/javascript" charset="utf-8"></script>
<script>
	$("#relancequote").validationEngine({prettySelect : true,useSuffix: "_chzn"});
	$(\'textarea\').attr(\'data-prompt-position\',\'topLeft\');
	$(document).ready(function() {
		var dateNow = new Date();
	$(\'#relance_date\').datetimepicker({
		   	format:\'Y-m-d h:m:s\',
			lang:\'fr\',
			minDate: 0,
			defaultDate: dateNow,
			timepicker:false		
		});
		});
</script>

'; ?>
