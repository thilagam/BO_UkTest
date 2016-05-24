<?php /* Smarty version 2.6.19, created on 2015-07-03 10:25:04
         compiled from gebo/quote/estimate-sign-details-popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/quote/estimate-sign-details-popup.phtml', 29, false),)), $this); ?>
<div class="row-fluid">
	<div class="span12">		
		<form class="form-horizontal form_validation_ttip" id="estimate_sign_form" action="/quote/save-estimate-sign-details" method="POST">
			<input type="hidden" id="quote_id" name="quote_id" value="<?php echo $_GET['quote_id']; ?>
">
			<fieldset>
				<div class="control-group formSep">
					<label class="control-label">% estimated to sign :</label>
					<div class="controls">
						<select name="estimate_sign_percentage" id="estimate_sign_percentage" class="span5" style="margin-top: -10px;">					
							<option value="20" <?php if ($this->_tpl_vars['quote']['estimate_sign_percentage'] == '20'): ?> selected <?php endif; ?>>20</option>
							<option value="40" <?php if ($this->_tpl_vars['quote']['estimate_sign_percentage'] == '40'): ?> selected <?php endif; ?>>40</option>
							<option value="60" <?php if ($this->_tpl_vars['quote']['estimate_sign_percentage'] == '60'): ?> selected <?php endif; ?>>60</option>
							<option value="80" <?php if ($this->_tpl_vars['quote']['estimate_sign_percentage'] == '80'): ?> selected <?php endif; ?>>80</option>
							
						</select>						
					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">Estimated date of signature :</label>
					<div class="controls">
						<div class="input-append date">
							<input class="span12 validate[required]" value="<?php echo $this->_tpl_vars['quote']['estimate_sign_date']; ?>
" type="text" name="estimate_sign_date" id="estimate_sign_date"/><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
						</div>							
					</div>
				</div>				
				<div class="control-group formSep">
					<label class="control-label">Comment(s) :</label>
					<div class="controls">
						<textarea name="estimate_sign_comments" id="estimate_sign_comments" class="span12"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['estimate_sign_comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</textarea>	
					</div>
				</div>					
				<div class="control-group">
					<div class="controls">
						<button class="btn btn-gebo" name="estimate_sign" type="submit">Validate</button>
						<button class="btn" data-dismiss="modal" id="cancel">Cancel</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
<?php echo '
<link href="/BO/theme/gebo/css/jquery.datetimepicker.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.datetimepicker.js" type="text/javascript" charset="utf-8"></script>
<script language="javascript">
	$(document).ready(function(){
			$("#estimate_sign_form").validationEngine();
			//estimate sign date 
		$(\'#estimate_sign_date\').datetimepicker({
			format:\'Y-m-d\',
			lang:\'en\',
			timepicker:false
		});
	});		
</script>
'; ?>