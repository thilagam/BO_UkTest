<?php /* Smarty version 2.6.19, created on 2015-07-02 12:56:04
         compiled from gebo/quotedelivery/popup_repeat_delivery.phtml */ ?>
<div class="row-fluid">
	<div class="span12">		
		<form class="form-horizontal form_validation_ttip" id="repeat_delivery_form">
			<input type="hidden" id="step2_repeat" name="step2_repeat" value="<?php echo $this->_tpl_vars['prod_step2']['repeat']; ?>
">
			<fieldset>
				<div class="control-group formSep">
					<label class="control-label">Repeats :</label>
					<div class="controls">
						<select name="repeat_option" id="repeat_option" class="span8" onchange="fncheckrepeat(this.value)">
							<option value="daily" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_option'] == 'daily'): ?> selected<?php endif; ?>>Daily</option>
							<option value="week" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_option'] == 'week'): ?> selected<?php endif; ?>>Weekly (7 days)</option>
							<option value="week_b" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_option'] == 'week_b'): ?> selected<?php endif; ?>>Weekly (Business days)</option>
							<option value="month" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_option'] == 'month'): ?> selected<?php endif; ?>>Monthly</option>
						</select>						
					</div>
				</div>
				<div class="control-group formSep" id="repeat_every_div" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_option'] == 'daily'): ?> style="display:none"<?php endif; ?>>
					<label class="control-label">Repeat every :</label>
					<div class="controls">
						<input type="text" class="span2" name="repeat_every" id="repeat_every" value="<?php echo $this->_tpl_vars['repeat_delivery']['repeat_every']; ?>
"/>
						<?php if ($this->_tpl_vars['repeat_delivery']['repeat_option'] == 'week'): ?>
							<span id="repeat_option_text">Week(s)</span>
						<?php elseif ($this->_tpl_vars['repeat_delivery']['repeat_option'] == 'month'): ?>
							<span id="repeat_option_text">Month(s)</span>
						<?php endif; ?>							
					</div>
				</div>
				<div class="control-group formSep" id="repeat_on_div" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_option'] == 'month' || $this->_tpl_vars['repeat_delivery']['repeat_option'] == 'daily'): ?> style="display:none"<?php endif; ?>>
					<label class="control-label">Repeat on :</label>
					<div class="controls">						
						<input type="checkbox" id="check2"  class="validate[required]"  name="repeat_on[]" <?php if (In_array ( 1 , $this->_tpl_vars['repeat_delivery']['repeat_on'] )): ?> checked<?php endif; ?>  value="1">M 
						<input type="checkbox" id="check3"  class="validate[required]"  name="repeat_on[]" <?php if (In_array ( 2 , $this->_tpl_vars['repeat_delivery']['repeat_on'] )): ?> checked<?php endif; ?>  value="2">T 
						<input type="checkbox" id="check4"  class="validate[required]"  name="repeat_on[]" <?php if (In_array ( 3 , $this->_tpl_vars['repeat_delivery']['repeat_on'] )): ?> checked<?php endif; ?>  value="3">W 
						<input type="checkbox" id="check5"  class="validate[required]"  name="repeat_on[]" <?php if (In_array ( 4 , $this->_tpl_vars['repeat_delivery']['repeat_on'] )): ?> checked<?php endif; ?>  value="4">T 
						<input type="checkbox" id="check6"  class="validate[required]"  name="repeat_on[]" <?php if (In_array ( 5 , $this->_tpl_vars['repeat_delivery']['repeat_on'] )): ?> checked<?php endif; ?>  value="5">F 
						<input type="checkbox" id="check7"  class="validate[required]"  name="repeat_on[]" <?php if (In_array ( 6 , $this->_tpl_vars['repeat_delivery']['repeat_on'] )): ?> checked<?php endif; ?>  value="6" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_option'] == 'week_b'): ?> disabled <?php endif; ?>>S
						<input type="checkbox" id="check1" class="validate[required]"  name="repeat_on[]"  <?php if (In_array ( 7 , $this->_tpl_vars['repeat_delivery']['repeat_on'] )): ?> checked<?php endif; ?> value="7" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_option'] == 'week_b'): ?> disabled <?php endif; ?>>S 						
					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">Starts on :</label>
					<div class="controls">
						<div class="input-append date">
							<input class="span12 validate[required]" value="<?php echo $this->_tpl_vars['repeat_delivery']['repeat_start']; ?>
" disabled type="text" name="repeat_start" id="repeat_start"/><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
						</div>	
					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">End :</label>
					<div class="controls">
						<label>
							<input type="radio" id="repeat_end" class="validate[required]"  name="repeat_end"  value="never" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_end'] == 'never'): ?> checked<?php endif; ?> >Never
						</label>
						<label>
							<input type="radio" id="repeat_end" class="validate[required]"  name="repeat_end"  value="after" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_end'] == 'after'): ?> checked<?php endif; ?>>After 
							<span id="occurance_div" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_end'] != 'after'): ?>style="display:none"<?php endif; ?>>
								<input type="text" name="after_occurance" id="after_occurance" class="span2 validate[required,custom[integer]]" value="<?php echo $this->_tpl_vars['repeat_delivery']['after_occurance']; ?>
"> Occurances
							</span>	
						</label>
						<label>
							<input type="radio" id="repeat_end" class="validate[required]"  name="repeat_end"  value="on" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_end'] == 'on'): ?> checked<?php endif; ?>>On 
							<div class="input-append date" id="repeat_end_div" <?php if ($this->_tpl_vars['repeat_delivery']['repeat_end'] != 'on'): ?>style="display:none"<?php endif; ?>>
								<input class="span12 validate[required]" value="<?php echo $this->_tpl_vars['repeat_delivery']['end_on']; ?>
" type="text" name="end_on" id="end_on"/><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
							</div>
						</label>
					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">Summary :</label>
					<div class="controls">
					<span id="summary_text" style="font-weight:bold;"></span>
					<input type="hidden" name="summary_text_input" id="summary_text_input" value="">
					</div>
				</div>	
				<div class="control-group">
					<div class="controls">
						<button class="btn btn-gebo" name="repeat_done" id="repeat_done" type="button">Valider</button>
						<button class="btn" data-dismiss="modal" id="cancel">Annuler</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>	
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script><script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" >
   $(document).ready(function() {
		
		var weekday=new Array(7);		
		weekday[1]="Monday";
		weekday[2]="Tuesday";
		weekday[3]="Wednesday";
		weekday[4]="Thursday";
		weekday[5]="Friday";
		weekday[6]="Saturday";
		weekday[7]="Sunday";
		
		//get summary text on loading modal
		summaryText();
		
		//form validation
		$("#repeat_delivery_form").validationEngine({autoHidePrompt: true,promptPosition: "topLeft",prettySelect : true,useSuffix: "_chzn"}); 
		
		$("#repeat_option").chosen({disable_search: true });
		
		$("#repeat_every").spinner({ min: 1});
		
		/** activate icheck plugin **/
		  $(\'#repeat_delivery_form input\').iCheck({
			checkboxClass: \'icheckbox_square-blue\',
			radioClass: \'iradio_square-blue\',
			//increaseArea: \'20%\' // optional
		 }); 	
		
		//repeat start date 
		$(\'#repeat_start\').datetimepicker({
			format:\'Y-m-d\',
			lang:\'fr\',
			timepicker:false,
			minDate:$(\'#publish_time\').val()
		});
		
		//end date if on radio selected
		$(\'#end_on\').datetimepicker({
			format:\'Y-m-d\',
			lang:\'fr\',
			timepicker:false,
			onShow:function( ct ){
			   this.setOptions({
				minDate:get_date($(\'#repeat_start\').val())?get_date($(\'#repeat_start\').val()):false,formatDate:\'Y-m-d\'
			})
			},
		});
		
		get_date=function(input) {
			if(input == \'\') {
			return false;
			}	else {
			// Split the date, divider is \'/\'
			var parts = input.match(/(\\d+)/g);
			return parts[0]+\'-\'+parts[1]+\'-\'+parts[2];
			} 
		}
		
		//repeat end radio click changes
		$(\'input[name="repeat_end"]\').on(\'ifClicked\', function (event) {
			var value=this.value;			
			if(value==\'after\')
			{
				$("#occurance_div").show();	
				$("#repeat_end_div").hide();
			}
			else if(value==\'on\')
			{
				$("#repeat_end_div").show();
				$("#occurance_div").hide();						
			}			
			else{
				$("#occurance_div").hide();	
				$("#repeat_end_div").hide();
			}	
		
		});	
		
		//get summary text on click of weekdays
		$(\'input[name="repeat_on[]"]\').on(\'ifToggled\', function (event) {
			summaryText();
		});	


		//actions w.r.t repeat drop down select
		fncheckrepeat=function(value)
		{		
			var repeat_option=value;
			if(repeat_option==\'month\')
			{
				$("#repeat_option_text").text(\'Month(s)\');
				$("#repeat_every_div").show();
				$("#repeat_on_div").hide();
			}
			else if(repeat_option==\'week\')
			{
				$("#repeat_option_text").text(\'Week(s)\');
				$("#repeat_every_div").show();
				$("#repeat_on_div").show();
				$(\'#check1, #check7\').iCheck(\'enable\');
			}
			else if(repeat_option==\'week_b\')
			{
				$("#repeat_option_text").text(\'Week(s)\');
				$("#repeat_every_div").show();
				$("#repeat_on_div").show();
				$(\'#check1, #check7\').iCheck(\'uncheck\');
				$(\'#check1, #check7\').iCheck(\'disable\');
			}
			else if(repeat_option==\'daily\')
			{
				$("#repeat_every_div").hide();
				$("#repeat_on_div").hide();
			}
			summaryText();
		
		}
		
		function summaryText()
		{
			var repeat_option=$("#repeat_option").val();
			var summary_text=\'\';
			if(repeat_option==\'week\' || repeat_option==\'week_b\')
			{
				var checkedValues = $(\'#repeat_delivery_form input:checkbox:checked\').map(function() {
					return weekday[this.value];
				}).get().join( ", ");
				
				if(checkedValues)
					summary_text=\'Weekly on \'+checkedValues; 
			}
			else if(repeat_option==\'month\')
				summary_text=\'Monthly\';
			else if(repeat_option==\'daily\')
				summary_text=\'Daily\';	
				
			$("#summary_text").text(summary_text);
			$("#summary_text_input").val(summary_text);			
		}
		
		
		//Repeat form validation
		$("#repeat_done").click(function(){
			if($("#repeat_delivery_form").validationEngine(\'validate\'))
			{
				var target_page=\'/quoteDelivery/save-repeat-delivery\';
				var post_data = $("#repeat_delivery_form").serialize();	
				
				$.post(target_page,post_data,function(data){				
					//alert(data);
					$("#summary_text_step2").html($("#summary_text_input").val()+\' <a href="/quotedelivery/repeat-delivery" data-target="#repeat_delivery" role="button" data-toggle="modal">Edit</a>\');
					//re generate the events
					destroyCalendar();
					displayArticleEventCalendar();
					$("#repeat_delivery").modal(\'hide\');
				});
			}
		});	
		
		//uncheck repeat in step2 if first time click on annuler
		$("#cancel").click(function(){			
			var step2_repeat=$("#step2_repeat").val();			
			if(step2_repeat!=\'yes\')
				$(\'#repeat\').attr(\'checked\', false);
		});
		
   });
 

</script>
<style type="text/css">
.form-horizontal .control-label{
	font-weight:bold;
}
#repeat_delivery .modal-body {
    min-height: 470px;
}
.icheckbox_square-blue, .iradio_square-blue, .mission-overview .icheckbox_square-blue {
margin:0 7px;
}
</style>
'; ?>