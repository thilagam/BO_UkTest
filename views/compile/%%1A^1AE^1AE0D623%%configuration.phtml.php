<?php /* Smarty version 2.6.19, created on 2016-04-06 09:54:29
         compiled from gebo/ao/configuration.phtml */ ?>
<?php echo '
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/datempicker.js"></script>
<script>
	$(function(){
		
		$("#currency").chosen({ disable_search: true });
		$("#timeformat_fo").chosen({ disable_search: true });
		$("#timeformat_bo").chosen({ disable_search: true });
		$("#poll_contributors_fo").chosen({ disable_search: true });
		$(".optionDrop").chosen({ disable_search: true });
		
		$(\'#maintenance_date\').datetimepicker({
			showSecond: true,
			timeFormat: \'hh:mm:ss\',
			minDate: new Date(),
			//hour: 23,
			//minute: 50,
			//second: 50,
			stepHour: 1,
			stepMinute: 1,
			stepSecond: 10,
			timeOnlyTitle: \'Choose hour\',
			timeText: \'Hour\',
			hourText: \'Hours\',
			minuteText: \'Minutes\',
			secondText: \'Seconds\',
			currentText: \'Done\',
			closeText: \'Close\',
		});
		
	});

	function toggleonclick(ind)
	{
	  if($("#img"+ind).attr(\'src\')=="/BO/theme/gebo/img/plus16.png")
		{
			$("#img"+ind).attr(\'src\',"/BO/theme/gebo/img/minus16.png")
			$("#ConfigContent"+ind).show();
		}
		else if($("#img"+ind).attr(\'src\')=="/BO/theme/gebo/img/minus16.png")
		{
			$("#img"+ind).attr(\'src\',"/BO/theme/gebo/img/plus16.png")
			$("#ConfigContent"+ind).hide();
		}
	}

	function switchActive(indx)
	{
		if(confirm("Do you really want to update FO site maintenance?"))
		{
			if(indx==\'yes\')
				$("#period").show();
			else
			{	
				$("#period").hide();
				$("#maintenance_date").val(\'\');
				
			}
		}
		else
		{ 
			if(indx==\'yes\')
				$(\'input[name="site_maintenance"]\')[1].checked = true;
			else	
				$(\'input[name="site_maintenance"]\')[0].checked = true;
		}		
	}
	
	function switchfixedperiod(perd)
	{
			if(perd==\'fixed\')
				$("#autoperiod").show();
			else if(perd==\'whole\')
			{	
				$("#autoperiod").hide();
				$("#auto_period_month").val(\'\');
				
			}
	}


</script>

<style>
	input[type="text"][readonly] { background-color: #EFF2F5;}
	input[type="password"][readonly] { background-color: #EFF2F5;}
	.w-box-header{background: none repeat scroll 0 0 rgb(233, 243, 248) !important;text-align:center;cursor:pointer} 
	.w-box{background: none repeat scroll 0 0 rgb(245, 245, 245) !important;} 
	td {vertical-align:top}
	.optionDrop {width:100px;}
</style>

'; ?>

<div class="row-fluid">
  	<div class="span12">	
		<h3 class="heading">Default standards</h3>
	
		<!-------------------------------------------- MODE OF PAYMENTS  ---------------------------------------->
		<div class="w-box">
			<div class="w-box-header" onClick="toggleonclick(1);">Mode of payment<div  style="float:left;"><img id="img1" src="<?php echo $this->_tpl_vars['ImgBlock1']; ?>
" /></div></div>
			<div class='w-box-content' id="ConfigContent1" style="<?php echo $this->_tpl_vars['ConfigBlock1']; ?>
">
				<form action="/ao/configuration?submenuId=ML2-SL13" name="config_form_step1" method="post"  >
					<table cellspacing="4" cellpadding="4" align="center" width="70%">
						<tr>
							<td width="50%">Name Paypal account</td>
							<td>
								<input type="text" name="paypalid" id="paypalid" value="<?php echo $this->_tpl_vars['ConfigList']['paypalid']; ?>
" readonly />
								<img width="20" border="0" id="paypalimg" class="splashy-application_windows_edit" style="cursor:pointer;" onClick="$('#paypalid').removeAttr('readonly');$('#paypalimg').hide();"/>
							</td>
						</tr>
						<tr>
							<td>Redirection Paypal</td>
							<td>
								<input type="radio" name="paypalpath" id="paypalpath" value="PP" <?php if ($this->_tpl_vars['ConfigList']['paypalpath'] == 'PP'): ?>checked<?php endif; ?>> PP
								<input type="radio" name="paypalpath" id="paypalpath" value="CC" <?php if ($this->_tpl_vars['ConfigList']['paypalpath'] == 'CC'): ?>checked<?php endif; ?>> CC
							</td>
						</tr>
					   <tr>
							<td>Redirection Realex</td>
							<td>
								<input type="radio" name="creditpath" id="creditpath" value="PP" <?php if ($this->_tpl_vars['ConfigList']['creditpath'] == 'PP'): ?>checked<?php endif; ?>> PP
								<input type="radio" name="creditpath" id="creditpath" value="CC" <?php if ($this->_tpl_vars['ConfigList']['creditpath'] == 'CC'): ?>checked<?php endif; ?>> CC
							</td>
						</tr>
						<tr>
							<td>Name Realex account</td>
							<td>
								<input type="text" name="creditid" id="creditid" value="<?php echo $this->_tpl_vars['ConfigList']['creditid']; ?>
" readonly />
								<img width="20" border="0" id="creditimg" class="splashy-application_windows_edit" style="cursor:pointer;" onClick="$('#creditid').removeAttr('readonly');$('#creditimg').hide();"/>
							</td>
						</tr>
						<tr>
							<td>Currency</td>
							<td>
								<select name="currency" id="currency" style="width:120px;">
									<option value="pound" <?php if ($this->_tpl_vars['ConfigList']['currency'] == 'pound'): ?>selected<?php endif; ?>>Pound</option>
									<option value="euro" <?php if ($this->_tpl_vars['ConfigList']['currency'] == 'euro'): ?>selected<?php endif; ?>>Euro</option>
								</select>
							</td>
					    </tr>
						<tr>
							<td>&nbsp;</td>
							<td style="float:right"><input type="submit" name="submit_config" id="submit_config" value="Save" onClick="submitconfig(1);" class="btn btn-info" /></td>
						</tr>
					</table>
					<input type="hidden" name="blocknum" id="blocknum" value="1"/>
				</form>
			</div>
		</div>
		
		<!-------------------------------------------- CONTRIBUTEURS PARTICIPATION ---------------------------------------->
		<div class="w-box">
			<div class="w-box-header" onClick="toggleonclick(2);">Participation du Contributeur<div style="float:left;"><img id="img2" src="<?php echo $this->_tpl_vars['ImgBlock2']; ?>
" /></div></div>
			<div class="w-box-content" id="ConfigContent2" style="<?php echo $this->_tpl_vars['ConfigBlock2']; ?>
">
				<form action="/ao/configuration?submenuId=ML2-SL13" name="config_form_step2" method="post"  >
					<table cellspacing="4" cellpadding="4" align="center" width="70%">
						<tr>
							<td width="50%">Minimum amount for Billing</td>
							<td><input type="text" name="contrib_minamount" id="contrib_minamount" value="<?php echo $this->_tpl_vars['ConfigList']['contrib_minamount']; ?>
" class="span2"/></td>
						</tr>
						<tr>
							<td>Limit participation to a Junior</td>
							<td><input type="text" name="jc_limit" id="jc_limit" value="<?php echo $this->_tpl_vars['ConfigList']['jc_limit']; ?>
" class="span2"/></td>
						</tr>
						<tr>
							<td>Limit participation of a Senior</td>
							<td><input type="text" name="sc_limit" id="sc_limit" value="<?php echo $this->_tpl_vars['ConfigList']['sc_limit']; ?>
" class="span2"/></td>
						</tr>
						<tr>
							<td>Validation requested for a new AO</td>
							<td>
								<input type="radio" name="ep_aovalidation" id="ep_aovalidation" value="yes" <?php if ($this->_tpl_vars['ConfigList']['ep_aovalidation'] == 'yes'): ?>checked<?php endif; ?>> Yes
								<input type="radio" name="ep_aovalidation" id="ep_aovalidation" value="no" <?php if ($this->_tpl_vars['ConfigList']['ep_aovalidation'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>Duration of challenge after the first participation</td>
							<td><input type="text" name="participation_time" id="participation_time" class="span2" value="<?php echo $this->_tpl_vars['ConfigList']['participation_time']; ?>
" /> mins</td>
						</tr>
						<tr>
							<td>Time default rendering for a Junior Sub</td>
							<td> 
								<span style="vertical-align:top;"><input type="text" name="jc0_time" id="jc0_time" value="<?php echo $this->_tpl_vars['ConfigList']['jc0_timevalue']; ?>
" class="span2"/></span> 
								<select name="jc0_time_option" id="jc0_time_option" class="optionDrop" class="span5">
									<option value="min" <?php if ($this->_tpl_vars['ConfigList']['jc0_time'] < 60): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['ConfigList']['jc0_time'] < 1440 && $this->_tpl_vars['ConfigList']['jc0_time'] >= 60): ?>selected<?php endif; ?>>Hour(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['ConfigList']['jc0_time'] >= 1440): ?>selected<?php endif; ?>>Day(s)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Time default rendering for Junior</td>
							<td> 
								<span style="vertical-align:top;"><input type="text" name="jc_time" id="jc_time" value="<?php echo $this->_tpl_vars['ConfigList']['jc_timevalue']; ?>
" class="span2"/></span> 
								<select name="jc_time_option" id="jc_time_option" class="optionDrop" class="span5">
									<option value="min" <?php if ($this->_tpl_vars['ConfigList']['jc_time'] < 60): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['ConfigList']['jc_time'] < 1440 && $this->_tpl_vars['ConfigList']['jc_time'] >= 60): ?>selected<?php endif; ?>>Hour(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['ConfigList']['jc_time'] >= 1440): ?>selected<?php endif; ?>>Day(s)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Time default rendering for Junior</td>
							<td> 
								<span style="vertical-align:top;"><input type="text" name="sc_time" id="sc_time" value="<?php echo $this->_tpl_vars['ConfigList']['sc_timevalue']; ?>
" class="span2"/></span> 
								<select name="sc_time_option" id="sc_time_option" class="optionDrop" class="span5">
									<option value="min" <?php if ($this->_tpl_vars['ConfigList']['sc_time'] < 60): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['ConfigList']['sc_time'] < 1440 && $this->_tpl_vars['ConfigList']['sc_time'] >= 60): ?>selected<?php endif; ?>>Hour(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['ConfigList']['sc_time'] >= 1440): ?>selected<?php endif; ?>>Day(s)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Overtime for Seniors</td>
							<td> 
								<span style="vertical-align:top;"><input type="text" name="sc_bonus" id="sc_bonus" value="<?php echo $this->_tpl_vars['ConfigList']['sc_bonusvalue']; ?>
" class="span2"/></span> 
								<select name="sc_bonus_option" id="sc_bonus_option" class="optionDrop" class="span5">
									<option value="min" <?php if ($this->_tpl_vars['ConfigList']['sc_bonus'] < 60): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['ConfigList']['sc_bonus'] < 1440 && $this->_tpl_vars['ConfigList']['sc_bonus'] >= 60): ?>selected<?php endif; ?>>Hour(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['ConfigList']['sc_bonus'] >= 1440): ?>selected<?php endif; ?>>Day(s)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Rendering time after Refusal (Sub Junior)</td>
							<td> 
								<span style="vertical-align:top;"><input type="text" name="jc0_resubmission" id="jc0_resubmission" value="<?php echo $this->_tpl_vars['ConfigList']['jc0_resubmissionvalue']; ?>
" class="span2"/></span> 
								<select name="jc0_resubmission_option" id="jc0_resubmission_option" class="optionDrop" class="span5">
									<option value="min" <?php if ($this->_tpl_vars['ConfigList']['jc0_resubmission'] < 60): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['ConfigList']['jc0_resubmission'] < 1440 && $this->_tpl_vars['ConfigList']['jc0_resubmission'] >= 60): ?>selected<?php endif; ?>>Hour(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['ConfigList']['jc0_resubmission'] >= 1440): ?>selected<?php endif; ?>>Day(s)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Rendering time after Refusal (Junior)</td>
							<td> 
								<span style="vertical-align:top;"><input type="text" name="jc_resubmission" id="jc_resubmission" value="<?php echo $this->_tpl_vars['ConfigList']['jc_resubmissionvalue']; ?>
" class="span2"/></span> 
								<select name="jc_resubmission_option" id="jc_resubmission_option" class="optionDrop" class="span5">
									<option value="min" <?php if ($this->_tpl_vars['ConfigList']['jc_resubmission'] < 60): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['ConfigList']['jc_resubmission'] < 1440 && $this->_tpl_vars['ConfigList']['jc_resubmission'] >= 60): ?>selected<?php endif; ?>>Hour(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['ConfigList']['jc_resubmission'] >= 1440): ?>selected<?php endif; ?>>Day(s)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Rendering time after Refusal (Senior)</td>
							<td> 
								<span style="vertical-align:top;"><input type="text" name="sc_resubmission" id="sc_resubmission" value="<?php echo $this->_tpl_vars['ConfigList']['sc_resubmissionvalue']; ?>
" class="span2"/></span> 
								<select name="sc_resubmission_option" id="sc_resubmission_option" class="optionDrop" class="span5">
									<option value="min" <?php if ($this->_tpl_vars['ConfigList']['sc_resubmission'] < 60): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['ConfigList']['sc_resubmission'] < 1440 && $this->_tpl_vars['ConfigList']['sc_resubmission'] >= 60): ?>selected<?php endif; ?>>Hour(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['ConfigList']['sc_resubmission'] >= 1440): ?>selected<?php endif; ?>>Day(s)</option>
								</select>
							</td>
						</tr>
						
						<tr>
							<td>Correction Submission time (Junior)</td>
							<td>
								<span style="vertical-align:top;"><input type="text" name="correction_jc_submission" id="correction_jc_submission" value="<?php echo $this->_tpl_vars['ConfigList']['correction_jc_submissionvalue']; ?>
" class="span2"/></span> 
								<select name="correction_jc_submission_option" id="correction_jc_submission_option" class="optionDrop" class="span5">
									<option value="min" <?php if ($this->_tpl_vars['ConfigList']['correction_jc_submission'] < 60): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['ConfigList']['correction_jc_submission'] < 1440 && $this->_tpl_vars['ConfigList']['correction_jc_submission'] >= 60): ?>selected<?php endif; ?>>Hour(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['ConfigList']['correction_jc_submission'] >= 1440): ?>selected<?php endif; ?>>Day(s)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Correction Submission time (Senior)</td>
							<td>
								<span style="vertical-align:top;"><input type="text" name="correction_sc_submission" id="correction_sc_submission" value="<?php echo $this->_tpl_vars['ConfigList']['correction_sc_submissionvalue']; ?>
" class="span2"/></span>
								<select name="correction_sc_submission_option" id="correction_sc_submission_option" class="optionDrop" class="span5">
									<option value="min" <?php if ($this->_tpl_vars['ConfigList']['correction_sc_submission'] < 60): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['ConfigList']['correction_sc_submission'] < 1440 && $this->_tpl_vars['ConfigList']['correction_sc_submission'] >= 60): ?>selected<?php endif; ?>>Hour(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['ConfigList']['correction_sc_submission'] >= 1440): ?>selected<?php endif; ?>>Day(s)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Correction Resubmission time (Junior)</td>
							<td> 
								<span style="vertical-align:top;"><input type="text" name="correction_jc_resubmission" id="correction_jc_resubmission" value="<?php echo $this->_tpl_vars['ConfigList']['correction_jc_resubmissionvalue']; ?>
" class="span2"/></span> 
								<select name="correction_jc_resubmission_option" id="correction_jc_resubmission_option" class="optionDrop" class="span5">
									<option value="min" <?php if ($this->_tpl_vars['ConfigList']['correction_jc_resubmission'] < 60): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['ConfigList']['correction_jc_resubmission'] < 1440 && $this->_tpl_vars['ConfigList']['correction_jc_resubmission'] >= 60): ?>selected<?php endif; ?>>Hour(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['ConfigList']['correction_jc_resubmission'] >= 1440): ?>selected<?php endif; ?>>Day(s)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Correction Resubmission time (Senior)</td>
							<td> 
								<span style="vertical-align:top;"><input type="text" name="correction_sc_resubmission" id="correction_sc_resubmission" value="<?php echo $this->_tpl_vars['ConfigList']['correction_sc_resubmissionvalue']; ?>
" class="span2"/></span> 
								<select name="correction_sc_resubmission_option" id="correction_sc_resubmission_option" class="optionDrop" class="span5">
									<option value="min" <?php if ($this->_tpl_vars['ConfigList']['correction_sc_resubmission'] < 60): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['ConfigList']['correction_sc_resubmission'] < 1440 && $this->_tpl_vars['ConfigList']['correction_sc_resubmission'] >= 60): ?>selected<?php endif; ?>>Hour(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['ConfigList']['correction_sc_resubmission'] >= 1440): ?>selected<?php endif; ?>>Day(s)</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Correction Participation time</td>
							<td><input type="text" name="correction_participation" id="correction_participation" value="<?php echo $this->_tpl_vars['ConfigList']['correction_participation']; ?>
" class="span2"/> mins</td>
						</tr>
						<tr>
							<td>Direct validation (phase 1)</td>
							<td>
								<input type="radio" name="direct_validate" id="direct_validate" value="yes" <?php if ($this->_tpl_vars['ConfigList']['direct_validate'] == 'yes'): ?>checked<?php endif; ?>> Yes
								<input type="radio" name="direct_validate" id="direct_validate" value="no" <?php if ($this->_tpl_vars['ConfigList']['direct_validate'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>Direct final approval (Phase 1)</td>
							<td>
								<input type="radio" name="direct_validatefinal1" id="direct_validatefinal1" value="yes" <?php if ($this->_tpl_vars['ConfigList']['direct_validatefinal1'] == 'yes'): ?>checked<?php endif; ?>> Yes
								<input type="radio" name="direct_validatefinal1" id="direct_validatefinal1" value="no" <?php if ($this->_tpl_vars['ConfigList']['direct_validatefinal1'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>Direct validation Finale (final phase)</td>
							<td>
								<input type="radio" name="direct_validatefinal2" id="direct_validatefinal2" value="yes" <?php if ($this->_tpl_vars['ConfigList']['direct_validatefinal2'] == 'yes'): ?>checked<?php endif; ?>> Yes
								<input type="radio" name="direct_validatefinal2" id="direct_validatefinal2" value="no" <?php if ($this->_tpl_vars['ConfigList']['direct_validatefinal2'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="float:right"><input type="submit" name="submit_config" id="submit_config" value="Save" class="btn btn-info" /></td>
						</tr>
					</table>
					<input type="hidden" name="blocknum" id="blocknum" value="2"/>
				</form>
			</div>
		</div>

		<!-------------------------------------------- PAGINATION ---------------------------------------->
		<div class="w-box">
			<div class="w-box-header" onClick="toggleonclick(3);">Pagination<div style="float:left;"><img id="img3" src="<?php echo $this->_tpl_vars['ImgBlock3']; ?>
" /></div></div>
			<div class="w-box-content" id="ConfigContent3" style="<?php echo $this->_tpl_vars['ConfigBlock3']; ?>
">
				<form action="/ao/configuration?submenuId=ML2-SL13" name="config_form_step3" method="post"  >
					<table cellspacing="4" cellpadding="4" align="center" width="70%">
						<tr>
							<td width="50%">Pagination limit on FO</td>
							<td><input type="text" name="pagination_fo" id="pagination_fo" value="<?php echo $this->_tpl_vars['ConfigList']['pagination_fo']; ?>
" /></td>
						</tr>
						<tr>
							<td>Pagination limit on BO</td>
							<td><input type="text" name="pagination_bo" id="pagination_bo" value="<?php echo $this->_tpl_vars['ConfigList']['pagination_bo']; ?>
" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="float:right"><input type="submit" name="submit_config" id="submit_config" value="Save" class="btn btn-info" /></td>
						</tr>
					</table>
					<input type="hidden" name="blocknum" id="blocknum" value="3"/>
				</form>
			</div>
		</div>

		<!-------------------------------------------- EMAIL CONTACT ---------------------------------------->
		<div class="w-box">
			<div class="w-box-header" onClick="toggleonclick(4);">Email<div style="float:left;"><img id="img4" src="<?php echo $this->_tpl_vars['ImgBlock4']; ?>
" /></div></div>
			<div class="w-box-content" id="ConfigContent4" style="<?php echo $this->_tpl_vars['ConfigBlock4']; ?>
">
				<form action="/ao/configuration?submenuId=ML2-SL13" name="config_form_step4" method="post"  >
					<table cellspacing="4" cellpadding="4" align="center" width="70%">
						<tr>
							<td width="50%">BO validate email</td>
							<td>
								<input type="radio" name="email_valider" id="email_valider" value="yes" <?php if ($this->_tpl_vars['ConfigList']['email_valider'] == 'yes'): ?>checked<?php endif; ?>> Yes
								<input type="radio" name="email_valider" id="email_valider" value="no" <?php if ($this->_tpl_vars['ConfigList']['email_valider'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>Alert mail after Ao creation</td>
							<td><input type="text" name="aoemail_alert" id="aoemail_alert" value="<?php echo $this->_tpl_vars['ConfigList']['aoemail_alert']; ?>
" /></td>
						</tr>
						<tr>
							<td>Contact Mail</td>
							<td><input type="text" name="contactus_mail" id="contactus_mail" value="<?php echo $this->_tpl_vars['ConfigList']['contactus_mail']; ?>
" /></td>
						</tr>
						<tr>
							<td>Default from Mail</td>
							<td><input type="text" name="mail_from" id="mail_from" value="<?php echo $this->_tpl_vars['ConfigList']['mail_from']; ?>
" /></td>
						</tr>
						<tr>
							<td>FO mails attachment limit</td>
							<td><input type="text" name="mail_attachment_limit" id="mail_attachment_limit" value="<?php echo $this->_tpl_vars['ConfigList']['mail_attachment_limit']; ?>
" /></td>
						</tr>
						<tr>
							<td>Max mails on FO</td>
							<td><input type="text" name="mail_attachment_size" id="mail_attachment_size" value="<?php echo $this->_tpl_vars['ConfigList']['mail_attachment_size']; ?>
" /></td>
						</tr>
						<tr>
							<td>Mail after validation of AO</td>
							<td>
								<input type="radio" name="mail_display" id="mail_display" value="all" <?php if ($this->_tpl_vars['ConfigList']['mail_display'] == 'all'): ?>checked<?php endif; ?>> All
								<input type="radio" name="mail_display" id="mail_display" value="50" <?php if ($this->_tpl_vars['ConfigList']['mail_display'] == '50'): ?>checked<?php endif; ?>> Last 50
								<input type="radio" name="mail_display" id="mail_display" value="100" <?php if ($this->_tpl_vars['ConfigList']['mail_display'] == '100'): ?>checked<?php endif; ?>> Last 100
							</td>
						</tr>
						<tr>
							<td valign="top">Notify Emails</td>
							<td>
								<span style="vertical-align:top"></span>
								 <textarea name="notify_emails" id="notify_emails" rows="5" cols="30"><?php echo $this->_tpl_vars['ConfigList']['notify_emails']; ?>
</textarea>
								 <br>[Enter mutiple emails with comma seperated]
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="float:right"><input type="submit" name="submit_config" id="submit_config" value="Save" class="btn btn-info" /></td>
						</tr>
					</table>
					<input type="hidden" name="blocknum" id="blocknum" value="4"/>
				</form>
			</div>
		</div>

		<!-------------------------------------------- AO ---------------------------------------->
		<div class="w-box">
			<div class="w-box-header" onClick="toggleonclick(5);">AO<div style="float:left;"><img id="img5" src="<?php echo $this->_tpl_vars['ImgBlock5']; ?>
" /></div></div>
			<div class="w-box-content" id="ConfigContent5" style="<?php echo $this->_tpl_vars['ConfigBlock5']; ?>
">
				<form action="/ao/configuration?submenuId=ML2-SL13" name="config_form_step5" method="post"  >
					<table cellspacing="4" cellpadding="4" align="center" width="70%">
						<tr>
							<td width="50%">Advance payment for AO creation</td>
							<td>
								<input type="text" name="ao_advance" id="ao_advance" value="<?php echo $this->_tpl_vars['ConfigList']['ao_advance']; ?>
" size="42" readonly />
								<img width="20" border="0" id="advanceimg" class="splashy-application_windows_edit" style="cursor:pointer;" onClick="$('#ao_advance').removeAttr('readonly');$('#advanceimg').hide();"/>
							</td>
						</tr>
						<tr>
							<td>Show writers blacklisted for private AO</td>
							<td>
								<input type="radio" name="blacked_writers" id="blacked_writers" value="yes" <?php if ($this->_tpl_vars['ConfigList']['blacked_writers'] == 'yes'): ?>checked<?php endif; ?>> Yes
								<input type="radio" name="blacked_writers" id="blacked_writers" value="no" <?php if ($this->_tpl_vars['ConfigList']['blacked_writers'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>Download the document on FO</td>
							<td>
								<input type="radio" name="spec_file_upload_fo" id="spec_file_upload_fo" value="yes" <?php if ($this->_tpl_vars['ConfigList']['spec_file_upload_fo'] == 'yes'): ?>checked<?php endif; ?>> Yes
								<input type="radio" name="spec_file_upload_fo" id="spec_file_upload_fo" value="no" <?php if ($this->_tpl_vars['ConfigList']['spec_file_upload_fo'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>Download the document on the BO</td>
							<td>
								<input type="radio" name="spec_file_upload_bo" id="spec_file_upload_bo" value="yes" <?php if ($this->_tpl_vars['ConfigList']['spec_file_upload_bo'] == 'yes'): ?>checked<?php endif; ?>> Yes
								<input type="radio" name="spec_file_upload_bo" id="spec_file_upload_bo" value="no" <?php if ($this->_tpl_vars['ConfigList']['spec_file_upload_bo'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>BO pre delivery date</td>
							<td>
								<input type="text" name="date_before" id="date_before" value="<?php echo $this->_tpl_vars['ConfigList']['date_before']; ?>
" size="2"/>days before when
								<input type="text" name="date_difference" id="date_difference" value="<?php echo $this->_tpl_vars['ConfigList']['date_difference']; ?>
" />days difference
							</td>
						</tr>
						<tr>
							<td>Spec file alert mail</td>
							<td><input type="text" name="specfile_alert" id="specfile_alert" value="<?php echo $this->_tpl_vars['ConfigList']['specfile_alert']; ?>
" /></td>
						</tr>
						<tr>
							<td>No Premium contrib %</td>
							<td><input type="text" name="nopremium_contribpercent" id=" nopremium_contribpercent" value="<?php echo $this->_tpl_vars['ConfigList']['nopremium_contribpercent']; ?>
" /></td>
						</tr>
						<tr>
							<td>Plagiarism cutoff %</td>
							<td><input type="text" name="plag_cutoff_percentage" id=" plag_cutoff_percentage" value="<?php echo $this->_tpl_vars['ConfigList']['plag_cutoff_percentage']; ?>
" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="float:right"><input type="submit" name="submit_config" id="submit_config" value="Save" class="btn btn-info" /></td>
						</tr>
					</table>
					<input type="hidden" name="blocknum" id="blocknum" value="5"/>
				</form>
			</div>
		</div>

		<!-------------------------------------------- SITE ---------------------------------------->
		<div class="w-box">
			<div class="w-box-header" onClick="toggleonclick(6);">Site<div style="float:left;"><img id="img6" src="<?php echo $this->_tpl_vars['ImgBlock6']; ?>
" /></div></div>
			<div class="w-box-content" id="ConfigContent6" style="<?php echo $this->_tpl_vars['ConfigBlock6']; ?>
">
				<form action="/ao/configuration?submenuId=ML2-SL13" name="config_form_step6" method="post" enctype="multipart/form-data" >
					<table cellspacing="4" cellpadding="4" align="center" width="70%">
						<tr>
							<td width="50%">Site Active</td>
							<td>
								<input type="radio" name="site_maintenance" id="site_maintenance" value="yes" <?php if ($this->_tpl_vars['ConfigList']['site_maintenance'] == 'yes'): ?>checked<?php endif; ?> onClick="switchActive('yes');"> Yes
								<input type="radio" name="site_maintenance" id="site_maintenance" value="no" <?php if ($this->_tpl_vars['ConfigList']['site_maintenance'] == 'no'): ?>checked<?php endif; ?> onClick="switchActive('no');"> NO
								
								<span id="period" <?php if ($this->_tpl_vars['ConfigList']['site_maintenance'] == 'no'): ?>style="display:none;"<?php endif; ?>>	
									<input type="text" name="maintenance_date" id="maintenance_date" value="<?php echo $this->_tpl_vars['ConfigList']['maintenance_date']; ?>
" />
								</span>
								
							</td>
								
						</tr>
						<tr>
							<td>Keywords</td>
							<td><input type="text" name="meta_keywords" id="meta_keywords" value="<?php echo $this->_tpl_vars['ConfigList']['meta_keywords']; ?>
" /></td>
						</tr>
						<tr>
							<td>Meta description</td>
							<td><input type="text" name="meta_description" id="meta_description" value="<?php echo $this->_tpl_vars['ConfigList']['meta_description']; ?>
" /></td>
						</tr>
						<tr>
							<td>Email confirmation required</td>
							<td>
								<input type="radio" name="confirm_newaccount_mail" id="confirm_newaccount_mail" value="yes" <?php if ($this->_tpl_vars['ConfigList']['confirm_newaccount_mail'] == 'yes'): ?>checked<?php endif; ?>> Yes
								<input type="radio" name="confirm_newaccount_mail" id="confirm_newaccount_mail" value="no" <?php if ($this->_tpl_vars['ConfigList']['confirm_newaccount_mail'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>Contact number in Edit-place</td>
							<td><input type="text" name="ep_contact" id="ep_contact" value="<?php echo $this->_tpl_vars['ConfigList']['ep_contact']; ?>
" /></td>
						</tr>
						<tr>
							<td>Default Date format on FO</td>
							<td>
								<select name="timeformat_fo" id="timeformat_fo" >
									<option value="%d/%m/%Y" <?php if ($this->_tpl_vars['ConfigList']['timeformat_fo'] == "%d/%m/%Y"): ?>selected<?php endif; ?>>DD/MM/YYYY</option>
									<option value="%d-%m-%Y" <?php if ($this->_tpl_vars['ConfigList']['timeformat_fo'] == "%d-%m-%Y"): ?>selected<?php endif; ?>>DD-MM-YYYY</option>
									<option value="%m/%d/%Y" <?php if ($this->_tpl_vars['ConfigList']['timeformat_fo'] == "%m/%d/%Y"): ?>selected<?php endif; ?>>MM/DD/YYYY</option>
									<option value="%m-%d-%Y" <?php if ($this->_tpl_vars['ConfigList']['timeformat_fo'] == "%m-%d-%Y"): ?>selected<?php endif; ?>>MM-DD-YYYY</option>
								</select>
							</td>	
						</tr>
						<tr>
							<td>Default Date format on the BO</td>
							<td>
								<select name="timeformat_bo" id="timeformat_bo">
									<option value="%d/%m/%Y" <?php if ($this->_tpl_vars['ConfigList']['timeformat_bo'] == "%d/%m/%Y"): ?>selected<?php endif; ?>>DD/MM/YYYY</option>
									<option value="%d-%m-%Y" <?php if ($this->_tpl_vars['ConfigList']['timeformat_bo'] == "%d-%m-%Y"): ?>selected<?php endif; ?>>DD-MM-YYYY</option>
									<option value="%m/%d/%Y" <?php if ($this->_tpl_vars['ConfigList']['timeformat_bo'] == "%m/%d/%Y"): ?>selected<?php endif; ?>>MM/DD/YYYY</option>
									<option value="%m-%d-%Y" <?php if ($this->_tpl_vars['ConfigList']['timeformat_bo'] == "%m-%d-%Y"): ?>selected<?php endif; ?>>MM-DD-YYYY</option>
								</select>
							</td>	
						</tr>
						<tr>
							<td>Site Visibility</td>
							<td>
								<input type="radio" name="site_visibility" id="site_visibility" value="yes" <?php if ($this->_tpl_vars['ConfigList']['site_visibility'] == 'yes'): ?>checked<?php endif; ?>> Yes
								<input type="radio" name="site_visibility" id="site_visibility" value="no" <?php if ($this->_tpl_vars['ConfigList']['site_visibility'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>Stats Display</td>
							<td><input type="text" name="stats_display" id="stats_display" value="<?php echo $this->_tpl_vars['ConfigList']['stats_display']; ?>
" /></td>
						</tr>
						<tr>
							<td>Stats Day value</td>
							<td><input type="text" name="stats_days_value" id="stats_days_value" value="<?php echo $this->_tpl_vars['ConfigList']['stats_days_value']; ?>
" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="float:right"><input type="submit" name="submit_config" id="submit_config" value="Save" class="btn btn-info" /></td>
						</tr>
					</table>
					<input type="hidden" name="blocknum" id="blocknum" value="6"/>
				</form>
			</div>
		</div>

		<!-------------------------------------------- HOME ---------------------------------------->
		<div class="w-box">
			<div class="w-box-header" onClick="toggleonclick(7);">Home<div style="float:left;"><img id="img7" src="<?php echo $this->_tpl_vars['ImgBlock7']; ?>
" /></div></div>
			<div class="w-box-content" id="ConfigContent7" style="<?php echo $this->_tpl_vars['ConfigBlock7']; ?>
">
				<form action="/ao/configuration?submenuId=ML2-SL13" name="config_form_step7" method="post"  >
					<table cellspacing="4" cellpadding="4" align="center" width="70%">
						<tr>
							<td width="50%">What you see on the Home page client side</td>
							<td>
								<input type="radio" name="client_view" id="client_view" value="random" <?php if ($this->_tpl_vars['ConfigList']['client_view'] == 'random'): ?>checked<?php endif; ?>> Random
								<input type="radio" name="client_view" id="client_view" value="top" <?php if ($this->_tpl_vars['ConfigList']['client_view'] == 'top'): ?>checked<?php endif; ?>> Top
							</td>
						</tr>
						<tr>
							<td>What you see on the Home page writer side</td>
							<td>
								<input type="radio" name="contrib_view" id="contrib_view" value="random" <?php if ($this->_tpl_vars['ConfigList']['contrib_view'] == 'random'): ?>checked<?php endif; ?>> Random
								<input type="radio" name="contrib_view" id="contrib_view" value="top" <?php if ($this->_tpl_vars['ConfigList']['contrib_view'] == 'top'): ?>checked<?php endif; ?>> Top
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="float:right"><input type="submit" name="submit_config" id="submit_config" value="Save" class="btn btn-info" /></td>
						</tr>
					</table>
					<input type="hidden" name="blocknum" id="blocknum" value="7"/>
				</form>
			</div>
		</div>

		<!-------------------------------------------- Poll ---------------------------------------->
		<div class="w-box">
			<div class="w-box-header" onClick="toggleonclick(8);">Poll<div style="float:left;"><img id="img8" src="<?php echo $this->_tpl_vars['ImgBlock8']; ?>
" /></div></div>
			<div class="w-box-content" id="ConfigContent8" style="<?php echo $this->_tpl_vars['ConfigBlock8']; ?>
">
				<form action="/ao/configuration?submenuId=ML2-SL13" name="config_form_step8" method="post"  >
					<table cellspacing="4" cellpadding="4" align="center" width="70%">
						<tr>
							<td width="50%">Poll : Default priority hours</td>
							<td><input type="text" name="priority_hours" id="priority_hours" value="<?php echo $this->_tpl_vars['ConfigList']['priority_hours']; ?>
" /> hrs</td>
						</tr>
						<tr>
							<td>Black contributors FO</td>
							<td>
								<input type="radio" name="poll_blackcontrib_fo" id="poll_blackcontrib_fo" value="yes" <?php if ($this->_tpl_vars['ConfigList']['poll_sendmail_fo'] == 'yes'): ?>checked<?php endif; ?>> Yes
								<input type="radio" name="poll_blackcontrib_fo" id="poll_blackcontrib_fo" value="no" <?php if ($this->_tpl_vars['ConfigList']['poll_sendmail_fo'] == 'no'): ?>checked<?php endif; ?>> No
							</td>
						</tr>
						<tr>
							<td>Contributors FO</td>
							<td>
								<select name="poll_contributors_fo" id="poll_contributors_fo">
									<option value="0" <?php if ($this->_tpl_vars['ConfigList']['poll_contributors_fo'] == '0'): ?>selected<?php endif; ?>>Senior Contributors</option>
									<option value="1" <?php if ($this->_tpl_vars['ConfigList']['poll_contributors_fo'] == '1'): ?>selected<?php endif; ?>>Junior Contributors</option>
									<option value="2" <?php if ($this->_tpl_vars['ConfigList']['poll_contributors_fo'] == '2'): ?>selected<?php endif; ?>>Both Senior and Junior</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Send mail FO</td>
							<td>
								<input type="radio" name="poll_sendmail_fo" id="poll_sendmail_fo" value="yes" <?php if ($this->_tpl_vars['ConfigList']['poll_sendmail_fo'] == 'yes'): ?>checked<?php endif; ?>> Yes
								<input type="radio" name="poll_sendmail_fo" id="poll_sendmail_fo" value="no" <?php if ($this->_tpl_vars['ConfigList']['poll_sendmail_fo'] == 'no'): ?>checked<?php endif; ?>> No
							</td>
						</tr>
						<tr>
							<td>Poll creation Alert</td>
							<td><input type="text" name="pollfo_alert" id="pollfo_alert" value="<?php echo $this->_tpl_vars['ConfigList']['pollfo_alert']; ?>
"/></td>
						</tr>
						<tr>
							<td>Contributor %</td>
							<td><input type="text" name="pollfo_contribpercent" id="pollfo_contribpercent" value="<?php echo $this->_tpl_vars['ConfigList']['pollfo_contribpercent']; ?>
" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="float:right"><input type="submit" name="submit_config" id="submit_config" value="Save" class="btn btn-info" /></td>
						</tr>
					</table>
					<input type="hidden" name="blocknum" id="blocknum" value="8"/>
				</form>
			</div>
		</div>
		
		<!-------------------------------------------- Automatize Contributors ---------------------------------------->
		<div class="w-box">
			<div class="w-box-header" onClick="toggleonclick(9);">Automatize Contributors<div style="float:left;"><img id="img9" src="<?php echo $this->_tpl_vars['ImgBlock9']; ?>
" /></div></div>
			<div class="w-box-content" id="ConfigContent9" style="<?php echo $this->_tpl_vars['ConfigBlock9']; ?>
">
				<form action="/ao/configuration?submenuId=ML2-SL13" name="config_form_step9" method="post"  >
					<table cellspacing="4" cellpadding="4" align="center" width="70%">
						<tr>
							<td width="50%">Nb of Articles validated</td>
							<td><input type="text" name="auto_articles_validated" id="auto_articles_validated" value="<?php echo $this->_tpl_vars['ConfigList']['auto_articles_validated']; ?>
" /> Minimum</td>
						</tr>
						<tr>
							<td>Nb of Refusals</td>
							<td><input type="text" name="auto_articles_refusal" id="auto_articles_refusal" value="<?php echo $this->_tpl_vars['ConfigList']['auto_articles_refusal']; ?>
" /> Maximum</td>
						</tr>
						<tr>
							<td>Minimum Participation</td>
							<td>
								<input type="text" name="auto_participation_count" id="auto_participation_count" value="<?php echo $this->_tpl_vars['ConfigList']['auto_participation_count']; ?>
" /> in last
								<input type="text" name="auto_participation_duration" id="auto_participation_duration" value="<?php echo $this->_tpl_vars['ConfigList']['auto_participation_duration']; ?>
" /> months
							</td>
						</tr>
						<tr>
							<td>Period ($$)</td>
							<td>
								<input type="radio" name="auto_period" id="auto_period" value="whole" <?php if ($this->_tpl_vars['ConfigList']['auto_period'] == 'whole'): ?>checked<?php endif; ?> onClick="switchfixedperiod('whole');"> Whole
								<input type="radio" name="auto_period" id="auto_period" value="fixed" <?php if ($this->_tpl_vars['ConfigList']['auto_period'] == 'fixed'): ?>checked<?php endif; ?> onClick="switchfixedperiod('fixed');"> Fixed
								
								<span id="autoperiod" <?php if ($this->_tpl_vars['ConfigList']['auto_period'] == 'whole'): ?>style="display:none;"<?php endif; ?>>	
									<input type="text" name="auto_period_month" id="auto_period_month" value="<?php echo $this->_tpl_vars['ConfigList']['auto_period_month']; ?>
" size="10"/>
								</span>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="float:right"><input type="submit" name="submit_config" id="submit_config" value="Save" class="btn btn-info" /></td>
						</tr>
					</table>
				<input type="hidden" name="blocknum" id="blocknum" value="9"/>
				</form>
			</div>
		</div>
		
		<!-------------------------------------------- Automatize Contributors ---------------------------------------->
		<div class="w-box">
			<div class="w-box-header" onClick="toggleonclick(10);">Differed AO<div style="float:left;"><img id="img10" src="<?php echo $this->_tpl_vars['ImgBlock10']; ?>
" /></div></div>
			<div class="w-box-content" id="ConfigContent10" style="<?php echo $this->_tpl_vars['ConfigBlock10']; ?>
">
				<form action="/ao/configuration?submenuId=ML2-SL13" name="config_form_step10" method="post"  >
					<table cellspacing="4" cellpadding="4" align="center" width="70%">
						<tr>
							<td width="50%">FB App ID</td>
							<td><input type="text" name="fb_app_id" id="fb_app_id" value="<?php echo $this->_tpl_vars['ConfigList']['fb_app_id']; ?>
" size="62"/></td>
						</tr>
						<tr>
							<td>FB Secret</td>
							<td><input type="text" name="fb_secret" id="fb_secret" value="<?php echo $this->_tpl_vars['ConfigList']['fb_secret']; ?>
" style="width:400px;"/></td>
						</tr>
						<tr>
							<td>FB Access token</td>
							<td><textarea type="text" name="fb_access_token" id="fb_access_token" rows="5" style="width:400px;"/><?php echo $this->_tpl_vars['ConfigList']['fb_access_token']; ?>
</textarea></td>
						</tr>
						
						<tr>
							<td>TWT consumer key</td>
							<td><input type="text" name="twt_consumer_key" id="twt_consumer_key" value="<?php echo $this->_tpl_vars['ConfigList']['twt_consumer_key']; ?>
" style="width:400px;"/></td>
						</tr>
						<tr>
							<td>TWT consumer secret</td>
							<td><input type="text" name="twt_consumer_secret" id="twt_consumer_secret" value="<?php echo $this->_tpl_vars['ConfigList']['twt_consumer_secret']; ?>
" style="width:400px;"/></td>
						</tr>
						<tr>
							<td>TWT Token</td>
							<td><input type="text" name="twt_token" id="twt_token" value="<?php echo $this->_tpl_vars['ConfigList']['twt_token']; ?>
" style="width:400px;"/></td>
						</tr>
						<tr>
							<td>TWT Secret</td>
							<td><input type="text" name="twt_secret" id="twt_secret" value="<?php echo $this->_tpl_vars['ConfigList']['twt_secret']; ?>
" style="width:400px;"/></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="float:right"><input type="submit" name="submit_config" id="submit_config" value="Save" class="btn btn-info" /></td>
						</tr>
					</table>
					<input type="hidden" name="blocknum" id="blocknum" value="10"/>
				</form>
			</div>
		</div>
		
		<!-------------------------------------------- Automatize Quotes ---------------------------------------->
		<div class="w-box">
			<div class="w-box-header" onClick="toggleonclick(11);">Quotes<div style="float:left;"><img id="img11" src="<?php echo $this->_tpl_vars['ImgBlock11']; ?>
" /></div></div>
			<div class="w-box-content" id="ConfigContent11" style="<?php echo $this->_tpl_vars['ConfigBlock11']; ?>
">
				<form action="/ao/configuration?submenuId=ML2-SL13" name="config_form_step11" method="post"  >
					<table cellspacing="4" cellpadding="4" align="center" width="70%">
						<tr>
							<td width="50%">TECH/SEO Answer time</td>
							<td><input type="text" name="quote_sent_timeline" id="quote_sent_timeline" value="<?php echo $this->_tpl_vars['ConfigList']['quote_sent_timeline']; ?>
" size="62"/> Hours</td>
						</tr>
						<tr>
							<td>Prod Timeline</td>
							<td><input type="text" name="prod_timeline" id="prod_timeline" value="<?php echo $this->_tpl_vars['ConfigList']['quote_sent_timeline']; ?>
" size="62"/> Hours</td>
						</tr>						
						<tr>
							<td>Quote End time</td>
							<td><input type="text" name="quote_end_time" id="quote_end_time" value="<?php echo $this->_tpl_vars['ConfigList']['quote_end_time']; ?>
" size="62"/> Hours</td>
						</tr>
						<tr>
							<td>Product desc : no.of sheets max per writer per week(250 words per sheet)</td>
							<td><input type="text" name="max_writer_descriptif_produit" id="max_writer_descriptif_produit" value="<?php echo $this->_tpl_vars['ConfigList']['max_writer_descriptif_produit']; ?>
" size="62"/> </td>
						</tr>
						<tr>
							<td>Blog article : no.of sheets max per writer per week(250 words per sheet)</td>
							<td><input type="text" name="max_writer_article_de_blog" id="max_writer_article_de_blog" value="<?php echo $this->_tpl_vars['ConfigList']['max_writer_article_de_blog']; ?>
" size="62"/></td>
						</tr>
						<tr>
							<td>Guide : no.of sheets max per writer per week(250 words per sheet)</td>
							<td><input type="text" name="max_writer_guide" id="max_writer_guide" value="<?php echo $this->_tpl_vars['ConfigList']['max_writer_guide']; ?>
" size="62"/></td>
						</tr>
						<tr>
							<td>News : no.of sheets max per writer per week(250 words per sheet)</td>
							<td><input type="text" name="max_writer_news" id="max_writer_news" value="<?php echo $this->_tpl_vars['ConfigList']['max_writer_news']; ?>
" size="62"/></td>
						</tr>
						<tr>
							<td>SEO article : no.of sheets max per writer per week(250 words per sheet)</td>
							<td><input type="text" name="max_writer_article_seo" id="max_writer_article_seo" value="<?php echo $this->_tpl_vars['ConfigList']['max_writer_article_seo']; ?>
" size="62"/></td>
						</tr>
						<tr>
							<td>Quote Sign Timeline</td>
							<td><input type="text" name="quote_sign_timeline" id="quote_sign_timeline" value="<?php echo $this->_tpl_vars['ConfigList']['quote_sign_timeline']; ?>
" size="62"/>&nbsp;Hours</td>
						</tr>
						<tr>
							<td>Sales Validation Timeline</td>
							<td><input type="text" name="sales_validation_timeline" id="sales_validation_timeline" value="<?php echo $this->_tpl_vars['ConfigList']['sales_validation_timeline']; ?>
" size="62"/>&nbsp;Hours</td>
						</tr>
						<tr>
							<td>Client new filter date since</td>
							<td><input type="text" name="client_new_filter_date" id="client_new_filter_date" value="<?php echo $this->_tpl_vars['ConfigList']['client_new_filter_date']; ?>
" /></td>
						</tr>					
						<tr>
							<td>Sales manager is on holiday?</td>
							<td>
								<input type="radio" name="sales_manager_holiday" id="sales_manager_holiday" value="yes" <?php if ($this->_tpl_vars['ConfigList']['sales_manager_holiday'] == 'yes'): ?>checked<?php endif; ?>> YES
								<input type="radio" name="sales_manager_holiday" id="sales_manager_holiday" value="no" <?php if ($this->_tpl_vars['ConfigList']['sales_manager_holiday'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>Tech manager is on holiday?</td>
							<td>
								<input type="radio" name="tech_manager_holiday" id="tech_manager_holiday" value="yes" <?php if ($this->_tpl_vars['ConfigList']['tech_manager_holiday'] == 'yes'): ?>checked<?php endif; ?>> YES
								<input type="radio" name="tech_manager_holiday" id="tech_manager_holiday" value="no" <?php if ($this->_tpl_vars['ConfigList']['tech_manager_holiday'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>SEO manager is on holiday?</td>
							<td>
								<input type="radio" name="seo_manager_holiday" id="seo_manager_holiday" value="yes" <?php if ($this->_tpl_vars['ConfigList']['seo_manager_holiday'] == 'yes'): ?>checked<?php endif; ?>> YES
								<input type="radio" name="seo_manager_holiday" id="seo_manager_holiday" value="no" <?php if ($this->_tpl_vars['ConfigList']['seo_manager_holiday'] == 'no'): ?>checked<?php endif; ?>> NO
							</td>
						</tr>
						<tr>
							<td>Ebooker Id</td>
							<td><input type="text" name="ebooker_id" id="ebooker_id" value="<?php echo $this->_tpl_vars['ConfigList']['ebooker_id']; ?>
" /></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center;font-weight:bold;font-size:24px">Recurring</td>
						</tr>
						<tr>
							<td>Tempo Fix</td>
							<td><input type="text" name="tempo_fix" id="tempo_fix" value="<?php echo $this->_tpl_vars['ConfigList']['tempo_fix']; ?>
" size="62"/> words / <input type="text" name="tempo_fix_days" id="tempo_fix_days" value="<?php echo $this->_tpl_vars['ConfigList']['tempo_fix_days']; ?>
" class="span2" />days</td>
						</tr>
						<tr>
							<td>Tempo Max</td>
							<td><input type="text" name="tempo_max" id="tempo_max" value="<?php echo $this->_tpl_vars['ConfigList']['tempo_max']; ?>
" size="62"/> words / <input type="text" name="tempo_max_days" id="tempo_max_days" value="<?php echo $this->_tpl_vars['ConfigList']['tempo_max_days']; ?>
" class="span2"/>days</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center;font-weight:bold;font-size:24px">Oneshot</td>
						</tr>
						<tr>
							<td>Max writers</td>
							<td><input type="text" name="oneshot_max_writers" id="oneshot_max_writers" value="<?php echo $this->_tpl_vars['ConfigList']['oneshot_max_writers']; ?>
" size="62"/></td>
						</tr>
						<tr>
							<td>Product desc : no.of words max per writer per day</td>
							<td><input type="text" name="oneshot_max_words_descriptif_produit" id="oneshot_max_words_descriptif_produit" value="<?php echo $this->_tpl_vars['ConfigList']['oneshot_max_words_descriptif_produit']; ?>
" size="62"/> </td>
						</tr>
						<tr>
							<td>Blog article : no.of words max per writer per day</td>
							<td><input type="text" name="oneshot_max_words_article_de_blog" id="oneshot_max_words_article_de_blog" value="<?php echo $this->_tpl_vars['ConfigList']['oneshot_max_words_article_de_blog']; ?>
" size="62"/></td>
						</tr>
						<tr>
							<td>Guide : no.of words max per writer per day</td>
							<td><input type="text" name="oneshot_max_words_guide" id="oneshot_max_words_guide" value="<?php echo $this->_tpl_vars['ConfigList']['oneshot_max_words_guide']; ?>
" size="62"/></td>
						</tr>
						<tr>
							<td>News : no.of words max per writer per day</td>
							<td><input type="text" name="oneshot_max_words_news" id="oneshot_max_words_news" value="<?php echo $this->_tpl_vars['ConfigList']['oneshot_max_words_news']; ?>
" size="62"/></td>
						</tr>
						<tr>
							<td>SEO article : no.of words max per writer per day</td>
							<td><input type="text" name="oneshot_max_words_article_seo" id="oneshot_max_words_article_seo" value="<?php echo $this->_tpl_vars['ConfigList']['oneshot_max_words_article_seo']; ?>
" size="62"/></td>
						</tr>
						<tr>
							<td>Wordings article : no.of words max per writer per day</td>
							<td><input type="text" name="oneshot_max_words_wordings" id="oneshot_max_words_wordings" value="<?php echo $this->_tpl_vars['ConfigList']['oneshot_max_words_wordings']; ?>
" size="62"/></td>
						</tr>
						<tr>
							<td>Analyse seo mission cost</td>
							<td><input type="text" name="analyse_content_seo" id="analyse_content_seo" value="<?php echo $this->_tpl_vars['ConfigList']['analyse_content_seo']; ?>
" size="62"/> /<input type="text" name="analyse_content_seo_days" id="analyse_content_seo_days" value="<?php echo $this->_tpl_vars['ConfigList']['analyse_content_seo_days']; ?>
" class="span2"/>days</td>
						</tr>
						<tr>
							<td>Analyse seo mission duration</td>
							<td><input type="text" name="seo_mission_length" id="seo_mission_length" value="<?php echo $this->_tpl_vars['ConfigList']['seo_mission_length']; ?>
"  class="span2" />days</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center;font-weight:bold;font-size:24px">Contract</td>
						</tr>
						<tr>
							<td>Mission date : configure expected mission date</td>
							<td><input type="text" name="configure_expected_date" id="configure_expected_date" value="<?php echo $this->_tpl_vars['ConfigList']['configure_expected_date']; ?>
" size="62"/></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td style="float:right"><input type="submit" name="submit_config" id="submit_config" value="Save" class="btn btn-info"  /></td>
						</tr>
					</table>
				<input type="hidden" name="blocknum" id="blocknum" value="11"/>
				</form>
			</div>
		</div>
		
	</div>
</div>	