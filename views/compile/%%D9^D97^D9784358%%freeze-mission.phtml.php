<?php /* Smarty version 2.6.19, created on 2015-11-25 14:48:28
         compiled from gebo/quotecontractmission/freeze-mission.phtml */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo/quote/mission-followup-details.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['freezeaction'] == 'view'): ?>
	<div class="row-fluid form-horizontal">
	<div class="mission-details">
		<div class="prod-mission-product">Freeze details</div>
		<?php if ($this->_tpl_vars['cmdetails']['freeze_subject']): ?>
		<div class="">		
			<div class="control-group topset2">
				<label class="control-label">Freeze Dates: </label>
				<div class="controls">
					<div class="span8">
						Start
						<input id="date_timepicker_start" type="text" name="freeze_start" value="<?php echo $this->_tpl_vars['cmdetails']['freeze_start_date']; ?>
" class="" disabled >
						End
						<input id="date_timepicker_end" type="text" name="freeze_end" value="<?php echo $this->_tpl_vars['cmdetails']['freeze_end_date']; ?>
" class="" disabled>
					</div>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Date to send email:</label>
				<div class="controls">
					<div class="span4">
						<input id="emaildate" type="text" value="<?php echo $this->_tpl_vars['cmdetails']['freeze_email_date']; ?>
" class="validate[required]" name="freeze_email_date" disabled>
					</div>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Subject:</label>
				<div class="controls">
					<div class="span12">
						<input id="subject" type="text" name="freeze_subject" class="span10 validate[required]" value="<?php echo $this->_tpl_vars['cmdetails']['freeze_subject']; ?>
" disabled>
					</div>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Email Content:</label>
				<div class="controls">
					<div class="span12">
						<textarea class="span11 validate[required]" name="freeze_email_content" disabled style="height:200px"><?php echo $this->_tpl_vars['cmdetails']['freeze_email_content']; ?>
</textarea>
					</div>
				</div>
			</div>
		</div>
		<?php else: ?>
			<h3 class="pull-center topset2">Mission is not Freezed</h3>
		<?php endif; ?>
	</div>
	</div>
<?php else: ?>
<form class="form-horizontal"  action="/contractmission/freeze-save" method="POST" id="freezemission" enctype="multipart/form-data">
<div class="row-fluid">	
	<div class="mission-details">
		<div class="prod-mission-product">Freeze details</div>
		<div class="">
						
			<div class="control-group topset2">
				<label class="control-label">Freeze Dates: </label>
				<div class="controls">
					<div class="span8">
						Start
						<input id="date_timepicker_start" type="text" name="freeze_start" value="<?php echo $this->_tpl_vars['cmdetails']['freeze_start_date']; ?>
" class="validate[required]" >
						End
						<input id="date_timepicker_end" type="text" name="freeze_end" value="<?php echo $this->_tpl_vars['cmdetails']['freeze_end_date']; ?>
" class="validate[required]">
					</div>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Date to send email:</label>
				<div class="controls">
					<div class="span4">
						<input id="emaildate" type="text" value="<?php echo $this->_tpl_vars['cmdetails']['freeze_email_date']; ?>
" class="validate[required]" name="freeze_email_date">
					</div>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Subject:</label>
				<div class="controls">
					<div class="span12">
						<input id="subject" type="text" name="freeze_subject" class="span10 validate[required]" value="<?php echo $this->_tpl_vars['cmdetails']['freeze_subject']; ?>
">
					</div>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Email Content:</label>
				<div class="controls">
					<div class="span12">
						<textarea class="span11 validate[required]" name="freeze_email_content" style="height:200px"><?php echo $this->_tpl_vars['cmdetails']['freeze_email_content']; ?>
</textarea>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="row-fluid topset2">
	<div class="span12 row-centered" style="text-align:center">
		<button class="btn btn-primary" value="validate" name="validate" type="submit"><i	style="margin-right:5px" class="icon-ok icon-white"></i>Validate</button>
		<button  class="btn" data-dismiss="modal" type="reset">Annuler</button>
	</div>
	<input type="hidden" name="cmid" value="<?php echo $this->_tpl_vars['cmdetails']['contractmissionid']; ?>
" />
	<input type="hidden" name="cid" value="<?php echo $this->_tpl_vars['cmdetails']['contract_id']; ?>
" />
	</div>
</form>
<?php endif; ?>
<?php echo '
<script type="text/javascript">
function get_date(input) {
	if(input == \'\') {
		return false;
	}
else {
	// Split the date, divider is \'/\'
	var parts = input.match(/(\\d+)/g);
	return parts[0]+\'/\'+parts[1]+\'/\'+parts[2];
	} 
}

	jQuery(function(){
	jQuery(\'#emaildate\').datetimepicker({
		format:\'d/m/Y H:i:s\',
		onShow:function( ct ){
			   this.setOptions({
			    maxDate:get_date($(\'#date_timepicker_end\').val())?get_date($(\'#date_timepicker_end\').val()):false,formatDate:\'d/m/Y\',minDate:get_date($(\'#date_timepicker_start\').val())?get_date($(\'#date_timepicker_start\').val()):false
			   })
			  }
	});
		
 $(\'#date_timepicker_start\').datetimepicker({
			  format:\'d/m/Y\',
			  formatDate:\'d/m/Y\',
			  timepicker: false,
			  onShow:function( ct ){
			   this.setOptions({
			    maxDate:get_date($(\'#date_timepicker_end\').val())?get_date($(\'#date_timepicker_end\').val()):false,formatDate:\'d/m/Y\',minDate:0
			   })
			  }
	 });
	 var alert_shown = false;
	 $(\'#date_timepicker_end\').datetimepicker({
		  format:\'d/m/Y\',
		  formatDate:\'d/m/Y\',
		  timepicker: false,
		  closeOnDateSelect:true,
		  onShow:function( ct ){
		   this.setOptions({
		    minDate:get_date($(\'#date_timepicker_start\').val())?get_date($(\'#date_timepicker_start\').val()):false,formatDate:\'d/m/Y\'
		   });
		  },
		  onSelectDate:function(dp,$input){
			 var contract_end_date = $("#enddate").val().split("/");
			 var date1 = contract_end_date[2]+"-"+contract_end_date[1]+"-"+contract_end_date[0];
			 var current_date = $input.val().split("/");
			 var date2 = current_date[2]+"-"+current_date[1]+"-"+current_date[0];
			
			  if(date2>date1)
			  {
				  smoke.alert("The end date of a freezed mission extends the contract end date"); 
			  }		 
		  }
	 });
	 $("#freezemission").validationEngine();
	 $(\'#freezemission textarea, #freezemission input\').attr(\'data-prompt-position\',\'topLeft\');
});
</script>
'; ?>
