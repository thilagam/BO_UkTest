<?php /* Smarty version 2.6.19, created on 2016-04-20 13:51:49
         compiled from gebo/recruitment/recruitment-follow-up.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/recruitment/recruitment-follow-up.phtml', 1, false),array('modifier', 'zero_cut', 'gebo/recruitment/recruitment-follow-up.phtml', 476, false),)), $this); ?>
<?php if (count($this->_tpl_vars['recruitmentQuoteDetails']) > 0): ?>
	<?php $_from = $this->_tpl_vars['recruitmentQuoteDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quote'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quote']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['recruitment']):
        $this->_foreach['quote']['iteration']++;
?>
		
<?php echo '
<style>
	.mission-details:nth-of-type(1)
	{
		margin:0 0 10px;
	}
	
	.mission-details
	{
		margin:10px 0;
	}
	
	.mission-table
	{
		margin-bottom:0;
	}
	
	/* span[id^="time_"] */
	.time1
	{
		padding-bottom:0px;
		padding-top:0px;
	}
	td .icon-time
	{
		top:3px;
	}
	
	.alert
	{
		padding-right:14px;
	}
	
	.smiley
	{
		transform:rotate(90deg);
		font-size:18px;
		margin-left:8px;
	}
	
	.changebackground
	{
		background-color:#dadada;
	}
	
	.under_marks{
		text-decoration:line-through;
	}
	.time
	{
		font-size: 26px;
		font-weight: 300;
		height:30px;
	}
	
	.btn-default:hover {background-color:rgb(245, 245, 245) !important; color:rgb(179, 179, 179); border-color:rgb(179, 179, 179) !important;}
</style>
<link href="/BO/theme/gebo/lib/iCheck/skins/line/grey.css" rel="stylesheet">
<link href="/BO/theme/gebo/lib/iCheck/skins/line/green.css" rel="stylesheet">
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script> 
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<script>
var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
var js_date=(new Date().getTime())/ 1000;
var diff_date=Math.floor(js_date-cur_date);
var rid = '; ?>
<?php echo $_GET['recruitment_id']; ?>
<?php echo ';
 $(document).ready(function() {
	
	startCountDown();
		
	var currency =  "'; ?>
<?php echo $this->_tpl_vars['recruitment']['sales_suggested_currency']; ?>
<?php echo '";
	$(document).ready(function(){
	
	$(".disable_hire").closest("tr").addClass(\'changebackground\');
	
  
    //////////show timer//////////
    $("[id^=time_]").each(function(i) {
        var article=$(this).attr(\'id\').split("_");
        var ts=article[1];
        var ts2 =article[2];
        $("#time_"+article[1]).countdown({
            timestamp   : ts,
            diff_date  : diff_date,
            callback    : function(days, hours, minutes, seconds){
                var message = "";
                message += days + "j"  +" ";
                message += hours + "h" +" ";
                message += minutes + "mns"+ " ";
				if(minutes<1)	
			    message += seconds + "s";
                $("#time_"+article[2]).html(message);
                if(days==0 && hours==0 && minutes==0 && seconds==0)
                {
                    //window.location.reload();
                }
            }
        });
    });
    //////////////////////////////////////////////////////////////////
		
		
		
		 /*$(\'input[name="hire[]"]\').each(function(){
			var self = $(this),
			  label = self.next(),
			  label_text = label.text();
			label.remove();
			
			if($(self).is(":checked"))
			{
				self.iCheck({
				  checkboxClass: \'icheckbox_line-green\',
				  radioClass: \'iradio_line-green\',
				  insert: \'<div class="icheck_line-icon"></div>\' + label_text
				});
			
			}
			else
			{	self.iCheck({
				  checkboxClass: \'icheckbox_line-grey\',
				  radioClass: \'iradio_line-grey\',
				  insert: \'<div class="icheck_line-icon"></div>\' + label_text
				});
			}	
		  });
		var participants = '; ?>
<?php echo $this->_tpl_vars['recruitment']['total_article']; ?>
<?php echo '
		$("#participent_save").validationEngine({onValidationComplete: function(form, status){
			if(status==true)
			{
				if($("input[name=\'hire[]\']:checked").length >= participants)
				return true;
				else
				{
					smoke.confirm("Sure to Close this Challenge, Since only "+ $("input[name=\'hire[]\']:checked").length+" Partcipants are selected less then required "+participants+" Participants",function(e)
					{
						if(e)
						{
							$("#status").val(\'closed\');
							$(\'#participent_save\').validationEngine(\'detach\');
							$("#participent_save").submit();
						}
					});	
				}
			}
		}});*/
	
		$(".lessdetails").hide();
		$(document).on(\'click\',\'.moredetails\',function(){
			$(this).hide();
			$(".lessdetails").show();
			$(".slide").slideDown();
		});
		
		$(document).on(\'click\',\'.lessdetails\',function(){
			$(this).hide();
			$(".moredetails").show();
			$(".slide").slideUp();
		});
		
		$(\'#selecttable\').dataTable({
             "bPaginate":   false,
             "bSort":   false,
            "aoColumns": [
                null,
                null,
                null,                
                '; ?>
<?php if ($this->_tpl_vars['show_quiz'] == 'yes'): ?><?php echo '
                null,
				'; ?>

				<?php endif; ?>				
				<?php echo '
				null,
                null,
            ]
        });
				
	});
	
	$(document).on(\'click\',\'.load\',function(){
			var value = "";
			if($(this).val()!="all")
			$(".all").removeAttr(\'checked\');
			$(".load:checked").each(function(){
			if($(this).val()=="all")
			{
				value = "";
				$(".load").removeAttr(\'checked\');
				$(this).attr(\'checked\',\'checked\');
				return false;
			}
			else
				value += ","+$(this).val();
			});
			$(".loadtable").html("Please Wait Loading...");
			$.post("/recruitment/loadparticipation",{"value":value,"rid":rid,\'currency\':currency},function(result){
				//alert(result);
				$(".loadtable").html(result);
			});
		})
		
		//toggle green and grey buttons
		/*$(\'input[name="hire[]"]\').on(\'ifChecked\', function(event){			
			$(this).parent().removeClass(\'icheckbox_line-grey\');
			$(this).parent().toggleClass(\'icheckbox_line-green checked\');			
		});
		$(\'input[name="hire[]"]\').on(\'ifUnchecked\', function(event){			
			$(this).parent().removeClass(\'icheckbox_line-green\');
			$(this).parent().toggleClass(\'icheckbox_line-grey\');			
		});*/
});		
		
	function save()
	{
		  $(\'#participent_save\').validationEngine(\'hideAll\');
          $(\'#participent_save\').validationEngine(\'detach\');
		  $("#participent_save").submit();
	}
	
	function startCountDown()
	{
	 //////////show timer//////////
		$("[id^=time1_]").each(function(i) {
			var article=$(this).attr(\'id\').split("_");
			var ts=article[1];
			var ts2 =article[2];
			$("#time1_"+article[1]).countdown({
				timestamp   : ts,
				diff_date  : diff_date,
				callback    : function(days, hours, minutes, seconds){
					var message = "";
					if(days>0)
						message += days + " day(s)"  +" ";
					if(hours>0)		
						message += hours + " :" +" ";
					if(minutes > 0)	
						message += minutes + " :"+ " ";
					//if(minutes<1)	
					message +=seconds ;
					$("#time1_"+article[2]).html(message);
					if(days==0 && hours==0 && minutes==0 && seconds==0)
					{
						//window.location.reload();
					}
				}
			});
		});

	}
	
	function StopRecruitment(param)
	{
		if(param=="stop")
			var paramtext=\'Sure to Stop this Challenge ?\';
		else if(param=="resume")
			var paramtext=\'Sure to Resume this Challenge ?\';
			
		smoke.confirm(paramtext,function(e)
		{
			if(e)
			{
				$.post("/recruitment/stoprecruitment",{"recruitment":rid,"action":param},function(result){
					//alert(result);
					if($.trim(result)==\'stopped\')
					{
						if(param==\'stop\')
							$("#stoprecruitblock").html(\'<a href="javascript:void(0);" class="btn btn-warning" onclick="return StopRecruitment(\\\'resume\\\')">Resume</a>\');
						else if(param=="resume")
							$("#stoprecruitblock").html(\'<a href="javascript:void(0);" class="btn btn-danger" onclick="return StopRecruitment(\\\'stop\\\')">Stop</a>\');
						//window.location.reload();
					}
				});
			}
			else
				return false;
		});
		
	}
	
	function hireparticipant(flag,rpid,user)
	{
		var rid=$("#recruitment_id").val(); 
		$(\'#loadingmessage_\'+rpid).show(); 
		$("#hireaction_"+rpid).html(\'\');
		$.post("/recruitment/hireparticipation",{"rid":rid,"rpid":rpid,"hire":flag,"user":user},function(result){
			sleep(1000);
			if(flag==\'yes\')
			{
				$("#hireaction_"+rpid).html(\'<span class="label label-success">Hired</span>\');
				
				var hirecount=$("#hired_count").val();
				hirecount=parseInt(hirecount) + 1;
				$("#hired_count").val(hirecount);
				$("#hiredcounttext").html(hirecount);
				//$("#hire_yes_"+rpid).attr("class","btn btn-success");
				//$("#hire_yes_"+rpid).attr("disabled","disabled");
				//$("#hire_no_"+rpid).attr("disabled","disabled");
			}
			else if(flag==\'no\')
			{
				$("#hireaction_"+rpid).html(\'<span class="label label-inverse">Not Hired</span>\');
				//$("#hire_no_"+rpid).attr("class","btn btn-inverse");
				//$("#hire_no_"+rpid).attr("disabled","disabled");
				//$("#hire_yes_"+rpid).attr("disabled","disabled");
			}
			$(\'#loadingmessage_\'+rpid).hide(); 
		});
	}
	
	function CloseRecruitment()
	{
		var rid=$("#recruitment_id").val(); 
		
		smoke.confirm("Sure to Close this Challenge ?",function(e)
		{
			if(e)
			{
				$.post("/recruitment/closerecruitment",{"rid":rid},function(result){//alert(result);
					window.location.reload();
				});
			}
		});
	}
	
</script>
'; ?>

<?php echo '
<link href="/BO/theme/gebo/css/mission-followup.css" rel="stylesheet" />
'; ?>

	<div class="row-fluid">    
		<div class="span12">
			<div class="followup-header">
				<h3><a href="/followup/prod?submenuId=ML13-SL4&cmid=<?php echo $_GET['cmid']; ?>
">
				<b><?php echo $this->_tpl_vars['recruitment']['product_name']; ?>
 <?php echo $this->_tpl_vars['recruitment']['product_type_name']; ?>
  in													<?php echo $this->_tpl_vars['recruitment']['language_source_name']; ?>
</b></a> > <?php echo $this->_tpl_vars['recruitment']['recruitment_title']; ?>
 <span class="headerdim"><?php echo $this->_tpl_vars['recruitment']['launch']; ?>
 - <?php echo $this->_tpl_vars['recruitment']['enddate']; ?>
</span></h3>
				<div class="row-fluid">    
					<div class="header-info">
						<div class="span4">
							 
							<?php if ($this->_tpl_vars['recruitment']['recruitment_status'] == 'closed'): ?>
								<span class="upper">
									Recruitment closed
								</span>	
							<?php elseif ($this->_tpl_vars['recruitment']['global_recruitment_time'] > time()): ?>
								<span class="upper">Participation</span>
								<span id="time1_<?php echo $this->_tpl_vars['recruitment']['global_recruitment_time']; ?>
_<?php echo $_GET['recruitment_id']; ?>
" class="bottom">
									<span id="time1_<?php echo $_GET['recruitment_id']; ?>
"></span>
								</span>
							<?php else: ?>
								<span class="upper">
									Participation closed
								</span>
							<?php endif; ?>	
							<!--<div style="padding:0" class="span10">
								<div class="sepH_b progress progress-success">
									<div style="width: <?php echo $this->_tpl_vars['recruitment']['percentage']; ?>
%;background-image:linear-gradient(<?php echo $this->_tpl_vars['recruitment']['color']; ?>
, <?php echo $this->_tpl_vars['recruitment']['color']; ?>
)" class="bar"></div> 
								</div>
							</div>
							<div><strong>&nbsp;&nbsp;<?php echo $this->_tpl_vars['recruitment']['percentage']; ?>
%</strong></div>-->
						</div>
						<div class="span2">
							<span class="upper">JOB FOR</span>
							<span class="bottom"><?php echo $this->_tpl_vars['recruitment']['num_hire_writers']; ?>
</span>
						</div>
						<div class="span2">
							<span class="upper">STAKE HOLDERS</span>
							<span class="bottom"><?php echo count($this->_tpl_vars['recruitment']['participation_details']); ?>
</span>
						</div>
						<?php if ($this->_tpl_vars['show_quiz'] == 'yes'): ?>
							<div class="span2">
								<span class="upper">QUIZ OK</span>
								<span class="bottom"><?php echo $this->_tpl_vars['recruitment']['quiz_qualified']; ?>
/<?php echo count($this->_tpl_vars['recruitment']['participation_details']); ?>
</span>
							</div>
						<?php endif; ?>	
						<div class="span2">
							<span class="upper">IN PROOF READING</span>
							<span class="bottom">								
							<?php if ($this->_tpl_vars['recruitment']['proofread_cnt'] > 0): ?>
								<?php if ($this->_tpl_vars['recruitment']['correction'] == 'multi_external'): ?>
									<a href="/ao/markstat?submenuId=ML2-SL3&recruitment_id=<?php echo $_GET['recruitment_id']; ?>
" target="_rstat" class="label label-info">View</a>									
								<?php elseif ($this->_tpl_vars['recruitment']['correction'] == 'external' || $this->_tpl_vars['recruitment']['correction'] == 'internal'): ?>	
									<a href="/proofread/stage-deliveries?submenuId=ML3-SL3" target="_rstat" class="label label-info">View</a>
								<?php endif; ?>
							<?php else: ?>
								-
							<?php endif; ?>	
							</span>
						</div>
						
						<!------ stop recruitment ---->
						<div id="stoprecruitblock" class="span1">
						<?php if ($this->_tpl_vars['recruitmentparticipationexpired'] == 'YES' && $this->_tpl_vars['recruitment']['recruitment_status'] != 'closed'): ?>
							<?php if ($this->_tpl_vars['recruitment']['stoprecruitment'] == 'stop'): ?>
								<a href="javascript:void(0);" class="btn btn-warning" onclick="return StopRecruitment('resume')">Resume</a>
							<?php else: ?>
								<a href="javascript:void(0);" class="btn btn-danger" onclick="return StopRecruitment('stop')">Stop</a>
							<?php endif; ?>
						<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<h3 class="heading">Hired Participants: <span id="hiredcounttext"><?php echo $this->_tpl_vars['recruitment']['hired_count']; ?>
</span> / <?php echo $this->_tpl_vars['recruitment']['num_hire_writers']; ?>

						<input type="hidden" name="hired_count" id="hired_count" value="<?php echo $this->_tpl_vars['recruitment']['hired_count']; ?>
" />
						<div class="span9 pull-right">
							<div class="span6"></div>
							<label class="control-label span2" style="text-align:left;width:100px"><strong>View Profile</strong></label>
							<div style="margin-top:-7px" class="controls span4">
								<label class="checkbox inline">
								<input type="checkbox" class="load all" value="all" name="contrib_type[]"> 
									All
								</label>
								<label class="checkbox inline">
								<input type="checkbox" class="load" value="sc" name="contrib_type[]"> 
									SC
								</label>
								<label class="checkbox inline">
									<input type="checkbox" class="load" value="jc" name="contrib_type[]">  
									JC
								</label>
								<label class="checkbox inline">
									<input type="checkbox" class="load" value="jco" name="contrib_type[]"> 
									JCO
								</label>
							</div>
						</div>				
					</h3>
				</div>	
			</div>		
			<form class="form-horizontal" action="/recruitment/hire-user/" name="participent_save" id="participent_save" method="POST" enctype='multipart/form-data'>
				<input type="hidden" name="recruitment_id" id="recruitment_id" value="<?php echo $_GET['recruitment_id']; ?>
" />
				<input type="hidden" name="cmid" value="<?php echo $_GET['cmid']; ?>
" />
				<div class="row-fluid">				
					<div class="row-fluid loadtable">
						<table class="table selecttable" id="selecttable">
						<thead>
							<tr>
								<th>Writers</th>
								<th>Max delivery</th>
								<th>Price per art.</th>
								<?php if ($this->_tpl_vars['show_quiz'] == 'yes'): ?>
								<th>Quiz winners</th>
								<?php endif; ?>
								<th>Article with marks</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
							<?php if (count($this->_tpl_vars['recruitment']['participation_details']) > 0): ?>
								<?php $_from = $this->_tpl_vars['recruitment']['participation_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pd'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pd']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['pd']['iteration']++;
?>
									<?php $this->assign('hire', true); ?>
									<tr>
										<td style="width:20%">
											<div class="imageHolder">
												<a href="/user/contributor-edit?submenuId=ML10-SL6&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['row']['user_id']; ?>
" target="_blank" ><img class="media-object  img-circle" width="50px" height="50px"  src="<?php echo $this->_tpl_vars['fo_path']; ?>
/<?php echo $this->_tpl_vars['row']['image']; ?>
" ></a>
												<span class="caption label label-level">
													<i class="icon-bookmark"></i>
													<?php echo $this->_tpl_vars['row']['profiletype']; ?>

												</span>
											</div>
											<div class="nameHolder">
											<?php if ($this->_tpl_vars['row']['first_name'] != ""): ?>
												<b><?php echo $this->_tpl_vars['row']['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['row']['last_name']; ?>
</b>
											<?php else: ?>
												<b><?php echo $this->_tpl_vars['row']['email']; ?>
</b>
											<?php endif; ?>
											</div>
										</td>									
										<td><img src="/BO/theme/gebo/img/gCons/copy-item.png" alt="" /><div class="text"><?php echo $this->_tpl_vars['row']['articles_per_week']; ?>
/week</div></td>
										<td><img src="/BO/theme/gebo/img/gCons/dollar.png" alt="" /><div class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['price_user'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['recruitment']['sales_suggested_currency']; ?>
; / art	</div></td>
										<?php if ($this->_tpl_vars['row']['link_quiz'] && $this->_tpl_vars['row']['quiz']): ?>
											
											<?php if ($this->_tpl_vars['row']['qualified'] == 'yes' && $this->_tpl_vars['row']['percent'] == '100'): ?>
											<td>
												<img src="/BO/theme/gebo/img/gCons/button_ok.png" alt="" />
												<div class="text">Quizz <?php echo $this->_tpl_vars['row']['num_correct']; ?>
 / <?php echo $this->_tpl_vars['row']['num_total']; ?>
</div>
											<?php elseif ($this->_tpl_vars['row']['qualified'] == 'yes'): ?>
											<td>
												<img src="/BO/theme/gebo/img/gCons/button_ok_orange.png" alt="" />
												<div class="text">Quiz <?php echo $this->_tpl_vars['row']['num_correct']; ?>
 / <?php echo $this->_tpl_vars['row']['num_total']; ?>
</div>
											<?php else: ?>
												<td class="disable_hire">
												<?php $this->assign('hire', false); ?>
												<div class="smiley">:(</div>
												<div class="text">Lost</div>
											<?php endif; ?>
											</td>
										<?php endif; ?>
										
										<td>
											<?php if ($this->_tpl_vars['row']['status'] == 'under_study' || $this->_tpl_vars['row']['status'] == 'plag_exec' || $this->_tpl_vars['row']['status'] == 'published' || $this->_tpl_vars['row']['status'] == 'disapproved'): ?>											
											<a class="btn btn-small <?php if ($this->_tpl_vars['row']['marks'] && $this->_tpl_vars['row']['marks'] < $this->_tpl_vars['row']['min_mark']): ?>under_marks<?php endif; ?>"  href="/BO/download_article_latestversion.php?article_id=<?php echo $this->_tpl_vars['row']['article_id']; ?>
&type=writer"><i class="icon-download"></i> <?php if ($this->_tpl_vars['row']['marks']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['marks'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
/10<?php endif; ?></a>
											<?php elseif ($this->_tpl_vars['row']['article_submit_expires'] == 0): ?>
												-
											<?php elseif (time() > $this->_tpl_vars['row']['article_submit_expires']): ?>
												<strong>Article Test Time Out</strong>											
											<?php else: ?>
											<span id="time_<?php echo $this->_tpl_vars['row']['article_submit_expires']; ?>
_<?php echo $this->_tpl_vars['row']['rpid']; ?>
" class="alert alert-danger">
												<i class="icon-time"></i>
												<span id="time_<?php echo $this->_tpl_vars['row']['rpid']; ?>
"></span>
											</span>
											<?php endif; ?>
										</td>										
										<td >
											<!--<input type="checkbox" name="hire[]" value="<?php echo $this->_tpl_vars['row']['rpid']; ?>
" data-prompt-position="topLeft:-120" <?php if ($this->_tpl_vars['row']['is_hired'] == 'yes'): ?> checked="checked" <?php endif; ?>  class="validate[minCheckbox[1]]" <?php if (! $this->_tpl_vars['hire']): ?>disabled="disabled"<?php endif; ?> /> 
											<label><?php if ($this->_tpl_vars['row']['is_hired'] == 'yes'): ?> Hired <?php else: ?> Hire <?php endif; ?></label>-->
											<!-- class="validate[minCheckbox[<?php echo $this->_tpl_vars['row']['no_contrib']; ?>
],maxCheckbox[<?php echo $this->_tpl_vars['row']['no_contrib']; ?>
]]" -->
											<div id="hireaction_<?php echo $this->_tpl_vars['row']['rpid']; ?>
">
												<?php if ($this->_tpl_vars['row']['is_hired'] == 'yes'): ?>
													<span class="label label-success">Hired</span>
												<?php elseif ($this->_tpl_vars['row']['is_hired'] == 'no'): ?>
													<span class="label label-inverse">Not Hired</span>
												<?php else: ?>
													<button type="button" name="hire_yes_<?php echo $this->_tpl_vars['row']['rpid']; ?>
" id="hire_yes_<?php echo $this->_tpl_vars['row']['rpid']; ?>
" data-loading-text="Loading..." value="yes"  class="btn btn-default" onClick="hireparticipant('yes','<?php echo $this->_tpl_vars['row']['rpid']; ?>
','<?php echo $this->_tpl_vars['row']['user_id']; ?>
')">YES</button>
													<button type="button" name="hire_no_<?php echo $this->_tpl_vars['row']['rpid']; ?>
" id="hire_no_<?php echo $this->_tpl_vars['row']['rpid']; ?>
" data-loading-text="Loading..."  value="no"  class="btn btn-default" onClick="hireparticipant('no','<?php echo $this->_tpl_vars['row']['rpid']; ?>
','<?php echo $this->_tpl_vars['row']['user_id']; ?>
')">NO</button>
												<?php endif; ?>
											</div>
											<div id="loadingmessage_<?php echo $this->_tpl_vars['row']['rpid']; ?>
" style="display:none;"<i class="icon-refresh"></i></div>
										</td>
									</tr>
								<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>
						</table>
					</div>
				</div>
				<div class="control-group topset2">
				<?php if ($this->_tpl_vars['recruitment']['recruitment_status'] != 'closed'): ?>
					<?php if (count($this->_tpl_vars['recruitment']['participation_details']) > 0): ?>
						<div class="pull-center">
						<?php if (time() >= $this->_tpl_vars['recruitment']['expires']): ?>
							<button class="btn" value="close" name="close" type="button" Onclick="CloseRecruitment();"><i style="margin-right:5px" class="icon-remove"></i>Close this Challenge</button>
						<?php endif; ?>
							<!--<button class="btn btn-primary" onclick="return save()"  value="save" type="submit">Sauvegarder</button>-->
						</div>
						<input type="hidden" value="<?php echo $this->_tpl_vars['recruitment']['status']; ?>
" name="status" id="status"/> 
					<?php endif; ?>					
				<?php endif; ?>	
				</div>
			</form>
		</div>
	</div>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>	