<?php /* Smarty version 2.6.19, created on 2015-06-26 15:47:32
         compiled from gebo/survey/survey-follow-up.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/survey/survey-follow-up.phtml', 148, false),array('modifier', 'zero_cut', 'gebo/survey/survey-follow-up.phtml', 255, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/yellow.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script> 
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<style type="text/css">
	.surveyselect tr
	{
		padding:5px 0;
	}
	.surveyselect td
	{
		font-size: 13px;
		vertical-align:middle;		
		border-width:0px;
	}	
	#surveyselect_info
	{
		display:none;
	}
	.mission-details
	{
		margin:10px 0;
	}
	.under_smic{
		text-decoration:line-through;
	}
	.smic{
		color:#5EB533;
		font-weight:bold;
	}
	
	.avgprice_row td {
		background: none repeat scroll 0 0 #666;
		color: #fff;
		font-size: 14px;
		font-weight: bold;
	}
	.avgprice{
		font-size:25px;
	}
</style>	

<script language="javascript">
var sid = '; ?>
<?php echo $_GET['survey_id']; ?>
<?php echo '
$(document).ready(function() {

	$("#survey_followup").validationEngine();//form validation
	
	$(\'input[name="contrib_type[]"]\').each(function(){		
		$(this).iCheck({
			checkboxClass: \'icheckbox_square-blue\',
			radioClass: \'iradio_square-blue\'
		});
	  });
	  
	 $(\'input[name="status[]"]\').each(function(){		
		$(this).iCheck({
			checkboxClass: \'icheckbox_square-yellow\',
			radioClass: \'iradio_square-yellow\'
		});
	  }); 
	  
	  //data table
	  $(\'#surveyselect\').dataTable({
			 "bPaginate":   false,
			 "bSort":   false,
			"aoColumns": [
				null,
				null,
				null,
				null,
				null,
				null
			]
		});
		
		
		$(document).on(\'ifClicked\',\'.load\',function(event){
		
			if(this.value==\'all\')
			{
				var checked=!(this.checked);				
				$(\'form\').find(\'input[name="contrib_type[]"]\').attr(\'checked\',checked);
				$(\'input[name="contrib_type[]"]\').each(function(){		
					$(this).iCheck({
						checkboxClass: \'icheckbox_square-blue\',
						radioClass: \'iradio_square-blue\'
					});
				  });
			}
			
			var current_value = $(this).val();
			var checked_types = "";
			if(!this.checked)
			checked_types = current_value;
			$(".load:checked").each(function(){
				if(current_value != $(this).val())
				checked_types += ","+$(this).val();
			});
			$(".loadtable").html("Please Wait Loading...");
			$.post("/survey/loadparticipation",{"checked_types":checked_types,"sid":sid,\'currency\':currency},function(result){
				$(".loadtable").html(result);
			});
		});
		
		
		////////////to show the timer of survey time line///////
      var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
      var js_date=(new Date().getTime())/ 1000;
      var diff_date=Math.floor(js_date-cur_date);
     //////////show timer//////////
	$("[id^=time_]").each(function(i) {
		var article=$(this).attr(\'id\').split("_");
		var ts=article[2];
		$("#time_"+article[1]+"_"+article[2]).countdown({
			timestamp   : ts,
            diff_date  : diff_date,
			callback    : function(days, hours, minutes, seconds){
				var message = "";
				if(days >0 )message += days + " jours"  +", ";
				if(hours >0 )message += hours + " h" +",";
				if(minutes >0 )message += minutes + " mns"+ ", ";
				message += seconds + " s";
				$("#text_"+article[1]+"_"+article[2]).html(message);
				if(days==0 && hours==0 && minutes==0 && seconds==0)
				{
					//window.location.reload();
				}
			}
		});
	});	
	
});
function save()
{
	$(\'#survey_followup\').validationEngine(\'hideAll\');
	$(\'#survey_followup\').validationEngine(\'detach\');
	$("#survey_followup").submit();
}
</script>	 
	 
'; ?>


<?php if (count($this->_tpl_vars['pollMisssionQuoteDetails']) > 0): ?>
	<?php $_from = $this->_tpl_vars['pollMisssionQuoteDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quote'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quote']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quoteMission']):
        $this->_foreach['quote']['iteration']++;
?>	
		<div class="row-fluid">
			<div class="span12">
				<h3 class="heading">Survey follow up
					<span id="time_<?php echo $this->_tpl_vars['quoteMission']['poll_id']; ?>
_<?php echo $this->_tpl_vars['quoteMission']['poll_date_timestamp']; ?>
" class="alert alert-danger pull-right quote-timer">
						<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quoteMission']['poll_id']; ?>
_<?php echo $this->_tpl_vars['quoteMission']['poll_date_timestamp']; ?>
"></span>
					</span>
					<a href="/followup/prod?cmid=<?php echo $_GET['cmid']; ?>
&active=survey&submenuId=ML13-SL4#survey">
					<span class="pull-right" style="padding-right:5px">
						<button class="btn btn-success" name="back">Retour</button>
					</span>
					</a>
				</h3>
			</div>	
		</div>
		<div class="row-fluid">
			<div class="span9">		
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo/survey/mission_overview.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				
				<form class="form-horizontal" action="/survey/save-survey/" name="" id="survey_followup" method="POST">
					<input type="hidden" name="survey_id" value="<?php echo $_GET['survey_id']; ?>
" />
					<input type="hidden" name="cmid" value="<?php echo $this->_tpl_vars['quoteMission']['contract_mission_id']; ?>
" />
					<div class="mission-details">			
						<div class="prod-mission-product">Participants</div>				
					</div>
					<div class="heading">
						<label class="control-label" style="text-align:left;width:100px"><strong>View Profile</strong></label>
						<div class="controls" style="margin-left:20px">
							<label class="checkbox inline">
														<label class="checkbox inline">
							<input type="checkbox" name="contrib_type[]" value="sc" class="load"> 
								SC
							</label>
							<label class="checkbox inline">
								<input type="checkbox" name="contrib_type[]" value="jc" class="load">  
								JC
							</label>
							<label class="checkbox inline">
								<input type="checkbox" name="contrib_type[]" value="jco" class="load"> 
								JCO
							</label>							
						</div>
					</div>	
					<div class="row-fluid">					
						<div class="row-fluid loadtable">
							<table class="table surveyselect" style="border-width:0px" id="surveyselect">	
								<thead>
									<tr style="display:none">
										<th></th><th></th><th></th><th></th><th></th><th></th>
									</tr>
								</thead>
								<tbody>
								<?php if (count($this->_tpl_vars['quoteMission']['surveyParticipants']) > 0): ?>
									<?php $_from = $this->_tpl_vars['quoteMission']['surveyParticipants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['survey'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['survey']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['survey']):
        $this->_foreach['survey']['iteration']++;
?>
										<tr>
											<td style="width:15%">
												<div class="imageHolder">									
													<img class="media-object  img-circle" width="50px" height="50px"  src="<?php echo $this->_tpl_vars['fo_path']; ?>
/<?php echo $this->_tpl_vars['survey']['image']; ?>
" >
													<span class="caption label label-level">
														<i class="icon-bookmark"></i>
														<?php echo $this->_tpl_vars['survey']['profile_type']; ?>

													</span>
												</div>
											</td>
											<td style="width:18%">
												<b><?php echo $this->_tpl_vars['survey']['first_name']; ?>
</b>
											</td>
											<td <?php if ($this->_tpl_vars['survey']['under_smic'] == 'yes'): ?> class="under_smic" <?php else: ?> class="smic" <?php endif; ?>>
												<?php if ($this->_tpl_vars['survey']['under_smic'] == 'yes'): ?>
													<img src="/BO/theme/gebo/img/gCons/dollar.png" alt="" />
												<?php else: ?>	
													<img src="/BO/theme/gebo/img/gCons/green-dollar.png" alt="" />	
												<?php endif; ?>	
												<div class="text"><?php echo $this->_tpl_vars['survey']['price_user']; ?>
 &<?php echo $this->_tpl_vars['quoteMission']['sales_suggested_currency']; ?>
; / art</div>
											</td>
											<td>
												<?php $_from = $this->_tpl_vars['survey']['response_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['surveyresponse'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['surveyresponse']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['response']):
        $this->_foreach['surveyresponse']['iteration']++;
?>
													<?php if ($this->_tpl_vars['response']['type'] == 'timing'): ?>
														<b><?php echo $this->_tpl_vars['response']['response']; ?>
&nbsp;Minute(s) <b>
														<?php break; ?>
													<?php endif; ?>
												<?php endforeach; endif; unset($_from); ?>
											</td>
											<td <?php if ($this->_tpl_vars['survey']['under_smic'] == 'yes'): ?> class="under_smic" <?php else: ?> class="smic" <?php endif; ?>>
												<?php if ($this->_tpl_vars['survey']['under_smic'] == 'yes'): ?>
													<img src="/BO/theme/gebo/img/gCons/copy-item.png" alt="" />
												<?php else: ?>
													<img src="/BO/theme/gebo/img/gCons/green-copy-item.png" alt="" />
												<?php endif; ?>50 <div class="text">
															<?php echo $this->_tpl_vars['survey']['response_details'][1]['response']; ?>
 &<?php echo $this->_tpl_vars['quoteMission']['sales_suggested_currency']; ?>
; / art
														</div>
											</td>
											<td>
												<input type="checkbox" name="status[]" <?php if ($this->_tpl_vars['survey']['status'] == 'active'): ?> checked <?php endif; ?> value="<?php echo $this->_tpl_vars['survey']['participate_id']; ?>
" class="validate[minCheckbox[1]]"/>
											</td>
										</tr>
									<?php endforeach; endif; unset($_from); ?>	
										<tr class="avgprice_row">
											<td></td>
											<td>
												Average price/art
											</td>
											<td>
												<span class="avgprice"><?php echo ((is_array($_tmp=$this->_tpl_vars['quoteMission']['avg_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quoteMission']['sales_suggested_currency']; ?>
;</span>
											</td>
											<td></td>
											<td>
												Average price/art <br> for 50 articles
											</td>
											<td>
												<span class="avgprice"><?php echo ((is_array($_tmp=$this->_tpl_vars['quoteMission']['avg_bulk_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quoteMission']['sales_suggested_currency']; ?>
;</span>
											</td>
										</tr>
								<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>					
					<div class="control-group topset2">
						<div class="pull-center">
							<?php if ($this->_tpl_vars['quoteMission']['poll_date_timestamp'] < time()): ?>
								<button class="btn" value="closed" name="close" type="submit"><i style="margin-right:5px" class="icon-remove"></i>Close this survey</button>
							<?php endif; ?>	
							<button class="btn btn-primary" type="button" onclick="return save()">Save</button>
						</div>
					</div>
				</form>
			</div>
			<div class="span3">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'gebo/survey/info.phtml', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>		
			</div>
		</div>
	<?php echo '
	<script>
		var currency = '; ?>
"<?php echo $this->_tpl_vars['quoteMission']['sales_suggested_currency']; ?>
"<?php echo '
	</script>
	'; ?>

	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>	