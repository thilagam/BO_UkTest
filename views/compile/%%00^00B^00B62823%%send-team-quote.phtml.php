<?php /* Smarty version 2.6.19, created on 2015-10-09 15:28:02
         compiled from gebo/quote/send-team-quote.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut_t', 'gebo/quote/send-team-quote.phtml', 484, false),array('modifier', 'domain_url', 'gebo/quote/send-team-quote.phtml', 488, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script><script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>

<link href="/BO/theme/gebo/css/jquery.datetimepicker.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.datetimepicker.js" type="text/javascript" charset="utf-8"></script>

 <style>
	.delete
	{
		color:#000;
		margin: 0 5px;
		cursor: pointer;
	}
 </style>
<script language="javascript">
$(document).ready(function() {

	//validation
	$("#send_quote").validationEngine();
	$(\'#quote_updated_comments\').attr(\'data-prompt-position\',\'topLeft\');
	$(\'#quote_updated_comments\').data(\'promptPosition\',\'topLeft\');	
	
	$("#delivery_time").spinner({min:1});	
	$("#delivery_option").chosen({ allow_single_deselect: false,search_contains: true});
	
	$("#send_quote select").chosen({ allow_single_deselect: false,search_contains: true});
	
	
	/** activate icheck plugin **/
	  $(\'input\').iCheck({
		checkboxClass: \'icheckbox_square-blue\',
		radioClass: \'iradio_square-blue\',
		//increaseArea: \'20%\' // optional
	 }); 
	 
	 $(\'#urgent\').on(\'ifClicked\', function(event){
		
		$("#urgent_details").toggle();
		$("#prod_button").toggle();
		
	});	
	
	//disable if click on client does n\'t know checkbox
	$(\'#client_know\').on(\'ifChecked\', function(event){
		$("#delivery_time").spinner({ disabled: true });	
		$("#delivery_option").prop(\'disabled\', true).trigger("liszt:updated");
		$("#delivery_time_disable").val($("#delivery_time").val());
		$("#delivery_time_disable_option").val($("#delivery_time_disable_option").val());
		
	});	
	$(\'#client_know\').on(\'ifUnchecked\', function(event){
		$("#delivery_time").spinner({ disabled: false });		
		$("#delivery_option").prop(\'disabled\', false).trigger("liszt:updated");
	});	
		
	/* $(\'input[name="quote_send_team"]\').on(\'ifClicked\', function (event) {
		var value=this.value;
		if(value==\'send_sales_team\')
			$("#skip_details").show();	
		else	
			$("#skip_details").hide();	
		
	});	 */
	
	$(\'input[name="market_team_sent"]\').on(\'ifClicked\', function (event) {
		var value=this.value;
		if(value==\'yes\')
			$("#from_platform_details").show();
		else	
			$("#from_platform_details").hide();
	});	
	
	
	
	$(document).on("click",".delete",function(){
	var id_identifier = $(this).attr("rel");
		if(confirm("Are you sure? Want to delete this File"))
		{
			$(this).closest(".topset2").remove();
			$(".onsuccessrep").html("Please Wait Deleting File.");
			$.post("/quote/delete-document-quote",{"identifier":id_identifier,"type":"quote"},function(result){
				
				$(".onsuccessrep").html(result);
				if($.trim(result)=="")
				{
					$(".MultiFile-applied").addClass("validate[required]");
				}
			}); 
		}	
	});
	
	//new questions in send quote	
	$(\'.priority\').chosen();
	
	$(\'input[name="client_aims[]"]\').on(\'ifChanged\', function(event){
		
			var value = "";
			var check_length=$(\'input[name="client_aims[]"]:checked\').length;
			
			var checkd_value=$(this).val();
			$("#div_priority_"+checkd_value).toggle();
			if(check_length==0)
			{				
				$(\'#aim_4\').iCheck(\'enable\');
				$(\'#client_aims_comments_div\').hide();
			}
			else{
				$(\'#client_aims_comments_div\').show();
			}
			
			
			$(\'input[name="client_aims[]"]:checked\').each(function(){
				value = $(this).val();				
				if(value!=\'autre\')
				{
					$(\'#aim_4\').iCheck(\'uncheck\');
					$(\'#aim_4\').iCheck(\'disable\');
				}
				
			});
	});	


	$(\'input[name="content_ordered_agency"]\').on(\'ifChanged\', function(event){		
		var checkd_value=$(this).val();
		if(checkd_value==\'yes\')
		{
			$("#agency_details").show();
			$("#internal_team_details").hide();
		}
		else if(checkd_value==\'no\')
		{
			$("#agency_details").hide();
			$("#internal_team_details").show();
		}
		
		
	});	
	//volume option  radio changed
	$(\'input[name="volume_option"]\').on(\'ifChanged\', function(event){		
		$(\'input[name="volume_option"]:checked\').each(function(){
			value = $(this).val();
			if(value==\'one\')
			{
				$(\'#volume_option_multi_div\').hide();
				$(\'#volume_option_multi_every_div\').hide();
			}
			else if(value==\'per\')
			{
				$(\'#volume_option_multi_div\').show();
				$(\'#volume_option_multi_every_div\').hide();
			}
			else if(value==\'every\')
			{
				$(\'#volume_option_multi_div\').hide();
				$(\'#volume_option_multi_every_div\').show();
			}
				
		});
		
	});	
	
	
	//agency name toggle
	 $(\'#agency\').on(\'ifClicked\', function(event){		
		$("#agency_name_div").toggle();	
	
	});
	
	$(\'#budget_marketing\').on(\'ifClicked\', function(event){		
		$("#budget_div").toggle();	
	
	});
	
	//estimate sign date 
		$(\'#estimate_sign_date\').datetimepicker({
			format:\'Y-m-d\',
			lang:\'fr\',
			timepicker:false
		});
	
	
	
});
</script>	
'; ?>


<div class="row-fluid">    
	<div class="span12">
		<div class="row-fluid">
			<ul id="validate_wizard-titles" class="stepy-titles clearfix">
				<li id="validate_wizard-title-0" class="current-step"><div>Creation</div><span class="stepNb">1</span></li>
				<li id="validate_wizard-title-1"><div>TECH review</div><span class="stepNb">2</span></li>
				<li id="validate_wizard-title-2"><div>SEO review</div><span class="stepNb">3</span></li>
				<li id="validate_wizard-title-3"><div>Prod review</div><span class="stepNb">4</span></li>
				<li id="validate_wizard-title-4"><div>Validation</div><span class="stepNb">5</span></li>
			</ul>
		</div>
		<h1 class="heading topset2"><?php echo $this->_tpl_vars['create_mission']['quote_title']; ?>
</h1>		
		<div class="row-fluid">
			<div class="span8">
				<form id="send_quote" class="step form-horizontal" method="POST" action="/quote/save-send-team-quote" enctype="multipart/form-data">
					<fieldset>
						<legend>El&eacute;ments de pr&eacute;cision</legend>
						<div class="formSep control-group">
							<label for="bo_comments" class="control-label">Global comments on the quote</label>
							<div class="controls">
								<textarea name="bo_comments" id="bo_comments" class="validate[required] span12"><?php echo $this->_tpl_vars['send_quote']['sales_comment']; ?>
</textarea>
							</div>
						</div>
						<div class="formSep control-group">
							<label for="client_email" class="control-label">Copy&paste the emails you sent to client and his answers</label>
							<div class="controls">
								<textarea name="client_email" id="client_email" class="validate[required] span12"><?php echo $this->_tpl_vars['send_quote']['client_email_text']; ?>
</textarea>
							</div>
						</div>
						<div class="formSep control-group">
							<label for="quote_documents" class="control-label">Attachment <span class="help-block">doc,xls,zip,.dot, .html .pdf  .jpg .png, .xml</span></label>
							<div class="controls">	
							<?php if ($this->_tpl_vars['send_quote']['documents']): ?>
								<input type="file" name="quote_documents[]"  id="upload" class="multi span5" accept="doc|xls|zip|docx|xlsx|dot|html|pdf|jpg|png|xml" />
								<div class="onsuccessrep">
									<?php echo $this->_tpl_vars['send_quote']['documents']; ?>

							<?php else: ?>
							<input type="file" name="quote_documents[]"  id="upload" class="multi span5" accept="doc|xls|zip|docx|xlsx" />
								<div class="onsuccessrep">
								<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="formSep control-group">
							<label class="control-label">Client needs</label>
							<div class="controls">
								<span class="row-fluid">
									<span class="span3"><input type="checkbox" class="validate[minCheckbox[1]]" id="aim_1" name="client_aims[]" <?php if (in_array ( 'seo' , $this->_tpl_vars['send_quote']['client_aims'] )): ?>checked <?php endif; ?>  value="seo"> SEO</span>										
									<span id="div_priority_seo" <?php if (! in_array ( 'seo' , $this->_tpl_vars['send_quote']['client_aims'] )): ?> style="display:none" <?php endif; ?>>
										<label  class="control-label">Prio :</label>
										<select name="priority_seo" id="priority_seo" class="priority">					
												<option value="1" <?php if ($this->_tpl_vars['send_quote']['priority_seo'] == '1'): ?> selected<?php endif; ?> >1</option>
												<option value="2" <?php if ($this->_tpl_vars['send_quote']['priority_seo'] == '2'): ?> selected<?php endif; ?> >2</option>
												<option value="3" <?php if ($this->_tpl_vars['send_quote']['priority_seo'] == '3'): ?> selected<?php endif; ?> >3</option>
										</select>
									</span>
								</span>									
								<span class="row-fluid">
									<span class="span3"><input type="checkbox" class="validate[minCheckbox[1]]" id="aim_2" name="client_aims[]" <?php if (in_array ( 'social' , $this->_tpl_vars['send_quote']['client_aims'] )): ?>checked <?php endif; ?>  value="social"> Social</span>									
									<span id="div_priority_social" <?php if (! in_array ( 'social' , $this->_tpl_vars['send_quote']['client_aims'] )): ?> style="display:none" <?php endif; ?>>
										<label  class="control-label">Prio :</label>
										<select name="priority_social" id="priority_social" class="priority">					
												<option value="1" <?php if ($this->_tpl_vars['send_quote']['priority_social'] == '1'): ?> selected<?php endif; ?> >1</option>
												<option value="2" <?php if ($this->_tpl_vars['send_quote']['priority_social'] == '2'): ?> selected<?php endif; ?> >2</option>
												<option value="3" <?php if ($this->_tpl_vars['send_quote']['priority_social'] == '3'): ?> selected<?php endif; ?> >3</option>
										</select>
									</span>
								</span>									
								<span class="row-fluid">
									<span class="span3"><input type="checkbox" class="validate[minCheckbox[1]]" id="aim_3" name="client_aims[]" <?php if (in_array ( 'conversion' , $this->_tpl_vars['send_quote']['client_aims'] )): ?>checked <?php endif; ?>  value="conversion"> Conversion</span>
									<span id="div_priority_conversion" <?php if (! in_array ( 'conversion' , $this->_tpl_vars['send_quote']['client_aims'] )): ?> style="display:none" <?php endif; ?>>
										<label  class="control-label">Prio :</label>
										<select name="priority_conversion" id="priority_conversion" class="priority">					
												<option value="1" <?php if ($this->_tpl_vars['send_quote']['priority_conversion'] == '1'): ?> selected<?php endif; ?> >1</option>
												<option value="2" <?php if ($this->_tpl_vars['send_quote']['priority_conversion'] == '2'): ?> selected<?php endif; ?> >2</option>
												<option value="3" <?php if ($this->_tpl_vars['send_quote']['priority_conversion'] == '3'): ?> selected<?php endif; ?> >3</option>
										</select>
									</span>	
								</span>									
								<span class="row-fluid">
									<span class="span3"><input type="checkbox" class="validate[minCheckbox[1]]" id="aim_4" name="client_aims[]"  value="autre"> Other</span>
								</span>
							</div>
						</div>
						
						<div class="formSep control-group" id="client_aims_comments_div" <?php if (! $this->_tpl_vars['send_quote']['client_aims_comments']): ?> style="display:none"<?php endif; ?>>
								<div class="controls">
									<textarea placeholder="comments..." name="client_aims_comments" id="client_aims_comments" class="span12"><?php echo $this->_tpl_vars['send_quote']['client_aims_comments']; ?>
</textarea>
								</div>
						</div>
						<div class="formSep control-group">
							<label class="control-label">Urgent project ?</label>
							<div class="controls">
								<input type="radio" class="validate[required]" <?php if ($this->_tpl_vars['send_quote']['urgent'] == 'yes'): ?> checked<?php endif; ?> name="urgent"  value="yes">Yes&nbsp;
								<input type="radio" class="validate[required]" <?php if ($this->_tpl_vars['send_quote']['urgent'] == 'no'): ?> checked<?php endif; ?> name="urgent"  value="no">No
							</div>
						</div>
						<div class="formSep control-group">
							<label class="control-label">Has the client ordered content with an other agency ?</label>
							<div class="controls">
								<input type="radio" class="validate[required]" <?php if ($this->_tpl_vars['send_quote']['content_ordered_agency'] == 'yes'): ?> checked<?php endif; ?> name="content_ordered_agency"  value="yes">Yes&nbsp;
								<input type="radio" class="validate[required]" <?php if ($this->_tpl_vars['send_quote']['content_ordered_agency'] == 'no'): ?> checked<?php endif; ?> name="content_ordered_agency"  value="no">No
							</div>
						</div>
						<div class="formSep control-group" id="agency_details" <?php if ($this->_tpl_vars['send_quote']['content_ordered_agency'] != 'yes'): ?> style="display:none"<?php endif; ?>>
							<label class="control-label">Agency name ?</label>
							<div class="controls">								
								<div class="span4">
									<label class="checkbox inline">
										<input type="checkbox" <?php if ($this->_tpl_vars['send_quote']['agency'] == 'dont_know'): ?> checked<?php endif; ?> id="agency" name="agency"  value="dont_know">i don't know 
									</label>
								</div>	
								<div class="span8" id="agency_name_div" <?php if ($this->_tpl_vars['send_quote']['agency'] == 'dont_know'): ?> style="display:none"<?php endif; ?> >
									<input type="text" class="span8 validate[required]" id="agency_name" value="<?php echo $this->_tpl_vars['send_quote']['agency_name']; ?>
" name="agency_name">
								</div>
							</div>
							
						</div>
						<div class="formSep control-group" id="internal_team_details" <?php if ($this->_tpl_vars['send_quote']['content_ordered_agency'] != 'no'): ?> style="display:none"<?php endif; ?>>
							<label class="control-label">Does client has an internal team to write content?</label>
							<div class="controls">
								<input type="radio" class="validate[required]" <?php if ($this->_tpl_vars['send_quote']['client_internal_team'] == 'yes'): ?> checked<?php endif; ?> name="client_internal_team"  value="yes">Yes&nbsp;
								<input type="radio" class="validate[required]" <?php if ($this->_tpl_vars['send_quote']['client_internal_team'] == 'no'): ?> checked<?php endif; ?> name="client_internal_team" class="validate[required]"  value="no">No
								<input type="radio" <?php if ($this->_tpl_vars['send_quote']['client_internal_team'] == 'dont_know'): ?> checked<?php endif; ?> name="client_internal_team"  value="dont_know">i don't know 
							</div>
						</div>
						<div class="formSep control-group">
							<label class="control-label">Does the client want to know the writers/translators he's going to work with ?</label>
							<div class="controls">
								<input type="radio" class="validate[required]" <?php if ($this->_tpl_vars['send_quote']['client_know_writers'] == 'yes'): ?> checked<?php endif; ?> name="client_know_writers"  value="yes">Yes&nbsp;
								<input type="radio" class="validate[required]" <?php if ($this->_tpl_vars['send_quote']['client_know_writers'] == 'no'): ?> checked<?php endif; ?> name="client_know_writers"  value="no">No
							</div>
						</div>
												<div class="formSep control-group">
							<label class="control-label">What is the client's budget this year ?</label>
							<div class="controls">
								<div class="span4">
									<label class="checkbox inline">
										<input type="checkbox" <?php if ($this->_tpl_vars['send_quote']['budget_marketing'] == 'dont_know'): ?> checked<?php endif; ?> id="budget_marketing" name="budget_marketing"  value="dont_know">i don't know 
									</label>
								</div>	
								<div class="span6" id="budget_div" <?php if ($this->_tpl_vars['send_quote']['budget_marketing'] == 'dont_know'): ?> style="display:none"<?php endif; ?> >
									<span class="span3">
										<input type="text" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['send_quote']['budget']; ?>
" name="budget">
									</span>
									<span class="span6">	
										<select name="budget_currency" class="span8">
											<option value="euros"   <?php if ($this->_tpl_vars['send_quote']['budget_currency'] == 'euros'): ?> selected<?php endif; ?>>Euros</option>
											<option value="pounds"  <?php if ($this->_tpl_vars['send_quote']['budget_currency'] == 'pounds'): ?> selected<?php endif; ?>>Pounds</option>
											<option value="dollars" <?php if ($this->_tpl_vars['send_quote']['budget_currency'] == 'dollars'): ?> selected<?php endif; ?>>Dollars</option>
										</select>
									</span>	
								</div>
							</div>
						</div>
						<div class="formSep control-group">
							<label class="control-label">% estimated to sign</label>
							<div class="controls">
								<div class="span9">														
									<select name="estimate_sign_percentage" id="estimate_sign_percentage" class="span5" style="margin-top: -10px;">					
										<option value="20" <?php if ($this->_tpl_vars['send_quote']['estimate_sign_percentage'] == '20'): ?> selected <?php endif; ?>>20</option>
										<option value="40" <?php if ($this->_tpl_vars['send_quote']['estimate_sign_percentage'] == '40'): ?> selected <?php endif; ?>>40</option>
										<option value="60" <?php if ($this->_tpl_vars['send_quote']['estimate_sign_percentage'] == '60'): ?> selected <?php endif; ?>>60</option>
										<option value="80" <?php if ($this->_tpl_vars['send_quote']['estimate_sign_percentage'] == '80'): ?> selected <?php endif; ?>>80</option>
										
									</select>
								</div>
							</div>
						</div>
						<div class="formSep control-group">
							<label class="control-label">Estimated date of signature</label>
							<div class="controls">
								<div class="span9">														
									<div class="input-append date">
										<input class="span12 validate[required]" value="<?php echo $this->_tpl_vars['send_quote']['estimate_sign_date']; ?>
" type="text" name="estimate_sign_date" id="estimate_sign_date"/><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
									</div>
								</div>
							</div>
						</div>
						<div class="formSep control-group">
							<label class="control-label">Comment(s)</label>
							<div class="controls">
								<div class="span12">														
									<textarea name="estimate_sign_comments" id="estimate_sign_comments" class="span12"><?php echo $this->_tpl_vars['send_quote']['estimate_sign_comments']; ?>
</textarea>
								</div>
							</div>
						</div>
						
						
												<div class="formSep control-group">
							<label class="control-label">This quote has been sent by marketing team ?</label>
							<div class="controls">
								<input type="radio" <?php if ($this->_tpl_vars['send_quote']['market_team_sent'] == 'yes'): ?> checked<?php endif; ?> name="market_team_sent"  value="yes">Yes&nbsp;
								<input type="radio" <?php if ($this->_tpl_vars['send_quote']['market_team_sent'] != 'yes'): ?> checked<?php endif; ?> name="market_team_sent"  value="no">No
							</div>
						</div>
						<div class="formSep control-group" id="from_platform_details" <?php if ($this->_tpl_vars['send_quote']['market_team_sent'] != 'yes'): ?>style="display:none"<?php endif; ?>>
							<label class="control-label">From the platform ?</label>
							<div class="controls">
								<input type="radio" <?php if ($this->_tpl_vars['send_quote']['from_platform'] == 'yes'): ?> checked<?php endif; ?> name="from_platform"  value="yes">Yes&nbsp;
								<input type="radio" <?php if ($this->_tpl_vars['send_quote']['from_platform'] != 'yes'): ?> checked<?php endif; ?> name="from_platform"  value="no">No
							</div>
						</div>
						<?php if ($this->_tpl_vars['custom']['action'] == 'edit'): ?>
							<div class="formSep control-group">
								<div class="controls">
									<?php if ($this->_tpl_vars['create_step1']['quote_type'] == 'only_tech'): ?>
										<label><input type="radio" class="validate[required]" <?php if ($this->_tpl_vars['send_quote']['quote_send_team'] == 'send_tech_team'): ?> checked<?php endif; ?> name="quote_send_team"  value="send_tech_team"> Envoi devis &agrave; tech</label>
									<?php elseif ($this->_tpl_vars['create_step1']['quote_type'] == 'only_seo'): ?>	
										<label><input type="radio" <?php if ($this->_tpl_vars['send_quote']['quote_send_team'] == 'send_seo_team'): ?> checked<?php endif; ?> name="quote_send_team"  value="send_seo_team"> Envoi devis &agrave; seo</label>
									<?php endif; ?>
									<label><input type="radio" class="validate[required]" <?php if ($this->_tpl_vars['send_quote']['quote_send_team'] == 'send_sales_team'): ?> checked<?php endif; ?> name="quote_send_team"  value="send_sales_team"> Finaliser le devis seul</label>
								</div>
							</div>
						<?php endif; ?>
						<div class="control-group">
							<div class="controls">																
								<button type="submit" id="send_team_quote" name="send_team_quote" class="finish btn btn-primary"><i class="icon-ok icon-white"></i> Validate/button>
							</div>	
						</div>
					</fieldset>
				</form>
				<div class="row-fluid">
					<div class="span5 topset2">
						<a class="btn btn-primary" href="/quote/create-quote-step1?submenuId=ML13-SL2">Back</a>							
					</div>					
				</div>
			</div>
			<div class="span4">
				<aside>
					<div class="aside-bg">						
						<div class="aside-block" id="selected-client">
							<div class="editor-container">
								<h2 class="heading">Info client</h2>
								<img title="<?php echo $this->_tpl_vars['create_mission']['company_name']; ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/clients/logos/<?php echo $this->_tpl_vars['create_mission']['client_id']; ?>
/<?php echo $this->_tpl_vars['create_mission']['client_id']; ?>
_global.png?12345">
								<p class="editor-name"><a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['create_mission']['client_id']; ?>
&submenuId=ML13-SL1" target="_blank"><?php echo $this->_tpl_vars['create_mission']['company_name']; ?>
</a></p>
								<p class="editor-info">
								Turnover : <?php echo ((is_array($_tmp=$this->_tpl_vars['create_mission']['ca_number'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 euros<br>
								Category : <?php echo $this->_tpl_vars['create_mission']['category_name']; ?>
<br><br>
								<label class="label label-info">Sites internet</label><br>
									<?php $_from = $this->_tpl_vars['create_step1']['client_websites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['site']):
?>
										<a href="<?php echo $this->_tpl_vars['site']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['site'])) ? $this->_run_mod_handler('domain_url', true, $_tmp) : smarty_modifier_domain_url($_tmp)); ?>
</a> <br/>
									<?php endforeach; endif; unset($_from); ?>
								</p>
							</div>
						</div>
						<div class="aside-block" id="selected-bouser">
							<div class="editor-container">
								<h2 class="heading">Quote handled by</h2>
								<img title="<?php echo $this->_tpl_vars['create_mission']['quote_user_name']; ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['create_step1']['quote_by']; ?>
/<?php echo $this->_tpl_vars['create_step1']['quote_by']; ?>
_p.jpg">
								<p class="editor-name"><?php echo $this->_tpl_vars['create_mission']['quote_user_name']; ?>
</p>
								<p class="editor-info">
								Phone Number : <?php echo $this->_tpl_vars['create_mission']['phone_number']; ?>
<br>
								Email :<a href="mailto:<?php echo $this->_tpl_vars['create_mission']['email']; ?>
"> <?php echo $this->_tpl_vars['create_mission']['email']; ?>
</a><br><br>
								</p>								
							</div>
						</div>
					</div>	
				</aside>
			</div>
		</div>
	</div>
</div>