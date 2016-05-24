<?php /* Smarty version 2.6.19, created on 2015-08-10 14:23:04
         compiled from gebo/quote/prod-quote-view-details.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/prod-quote-view-details.phtml', 183, false),array('modifier', 'escape', 'gebo/quote/prod-quote-view-details.phtml', 213, false),array('modifier', 'stripslashes', 'gebo/quote/prod-quote-view-details.phtml', 213, false),array('modifier', 'zero_cut', 'gebo/quote/prod-quote-view-details.phtml', 311, false),array('modifier', 'htmlentities', 'gebo/quote/prod-quote-view-details.phtml', 324, false),array('modifier', 'nl2br', 'gebo/quote/prod-quote-view-details.phtml', 324, false),array('modifier', 'upper', 'gebo/quote/prod-quote-view-details.phtml', 890, false),array('modifier', 'zero_cut_t', 'gebo/quote/prod-quote-view-details.phtml', 1005, false),array('modifier', 'ucfirst', 'gebo/quote/prod-quote-view-details.phtml', 1005, false),array('function', 'math', 'gebo/quote/prod-quote-view-details.phtml', 452, false),array('function', 'html_options', 'gebo/quote/prod-quote-view-details.phtml', 1146, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<style type="text/css">
.table th, .table-bordered th, .table thead th,.table td {
    text-align: left;    
}.mission-prod-product .misson-details-text td, th{	text-align: left !important;}
</style>
<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script>
<script language="javascript">
$(document).ready(function() {
	
	$(".uni_style").uniform();	
	
	$(\'.icheck\').iCheck({
		checkboxClass: \'icheckbox_square-blue\',
		radioClass: \'iradio_square-blue\',
		//increaseArea: \'20%\' // optional
	 });
	
	//tech missions
	//$("[id^=delivery_time_]").spinner({ disabled: true });
	$("[id^=delivery_option_]").prop(\'disabled\', true).trigger("liszt:updated");
	
	//SEO missions
	//$("[id^=sdelivery_time_]").spinner({ disabled: true });
	$("[id^=sdelivery_option_]").prop(\'disabled\', true).trigger("liszt:updated");
	$("[id^=product_]").prop(\'disabled\', true).trigger("liszt:updated");
	$("[id^=language_]").prop(\'disabled\', true).trigger("liszt:updated");
	$("[id^=producttype_]" ).prop(\'disabled\', true).trigger("liszt:updated");
	$("[id^=related_mission_]").prop(\'disabled\', true).trigger("liszt:updated");
		
	$("#auto_match_missions").on(\'hidden\', function() {
		//alert(\'test\');
		$(this).removeData("modal");
		$("#auto_match_missions .modal-body").html(\'\');
	});	
	
	fnCalculateProdTotal();
});

// To remove other elements
function removeOther()
{
	$(".showother").each(function(){
	if($(this).css("display")=="none")
		$(this).closest(".displayOther").remove();
	})
	//return false;
}

//calculate total staff,total internal cost and total delivery
function fnCalculateProdTotal()
{
	
	var total_staff=0;
	var total_delivery_time=0;
	var total_staff_time=0;
	var total_cost=0;
	
	//calculating total cost
	$("[id^=pmission_cost_]" ).each(function(z) {
		var missionPrice=parseFloat($(this).val());
		if(isNaN(missionPrice))
			missionPrice=0;
		total_cost=total_cost+missionPrice;
	});
	//calculating total delivery time	
	total_delivery_time_writer=0;
	total_delivery_time_proofreader=0;
	$("[id^=pdelivery_time_]" ).each(function(z) {
		var deliveryTime=parseFloat($(this).val());
		
		var time_id = $(this).attr(\'id\');
		var time_split=time_id.split("_");
		var time_option=\'pdelivery_option_\'+time_split[2]+\'_\'+time_split[3];
		var delivery_option=$("#"+time_option).val();
		if(isNaN(deliveryTime))
			deliveryTime=0;
		if(delivery_option==\'hours\')
		{
			deliveryTime=deliveryTime/24;
			deliveryTime=deliveryTime.toFixed(2);
		}	
		
		if(time_split[3]==1)
		{
			if(deliveryTime>total_delivery_time_writer)	
				total_delivery_time_writer=deliveryTime;
		}
		if(time_split[3]==2)
		{
			if(deliveryTime>total_delivery_time_proofreader)	
				total_delivery_time_proofreader=deliveryTime;
		}	
		
	});
	total_delivery_time=(total_delivery_time_writer+total_delivery_time_proofreader);
	
	
	
	//calculating total staff time
	total_staff_time_write=0;
	total_staff_time_proofread=0;
	$("[id^=staff_]" ).each(function(z) {
		var div_id = $(this).attr(\'id\');
		var div_numbers=div_id.split("_");
		if(div_numbers[1]!=\'time\')
		{
			var staff=parseFloat($(this).val());
			if(isNaN(staff))
				staff=0;
			total_staff=total_staff+staff;
		}
		
		if(div_numbers[1]==\'time\' && div_numbers[2]!=\'option\')
		{
			var staffTime=parseFloat($(this).val());
			var stime_option=\'staff_time_option_\'+div_numbers[2]+\'_\'+div_numbers[3];
			var sdelivery_option=$("#"+stime_option).val();
			if(isNaN(staffTime))
				staffTime=0;
			if(sdelivery_option==\'hours\')
			{
				staffTime=staffTime/24;
				staffTime=staffTime.toFixed(2);
			}	
			
			if(div_numbers[3]==1)
			{
				if(staffTime>total_staff_time_write)	
					total_staff_time_write=staffTime;
			}
			if(div_numbers[3]==2)
			{
				if(staffTime>total_staff_time_proofread)	
					total_staff_time_proofread=staffTime;
			}			
		}
	});
	//alert(total_staff_time_write+\'--\'+total_staff_time_proofread);
	
	//adding staff time to total time
	total_delivery_time=(total_delivery_time+total_staff_time_write+total_staff_time_proofread);
	
	$("#total_staff").val(total_staff);
	$("#total_delivery_time").val(total_delivery_time);
	$("#total_mission_cost").val(total_cost);
	
}

//recalculate the delivery time based on writers
function fnCalculateDeliveryTime(mission_id,mission_type,nbwriters)
{
	var target_page=\'/quote/ajax-calculate-delivery-time?mission_id=\'+mission_id+\'&mission_type=\'+mission_type+\'&nbwriters=\'+nbwriters;
	//alert(target_page);
	$.post(target_page,function(response){
		//alert(response);
			var obj = $.parseJSON(response);
			var staff_length=obj.staff_length;
			var mission_length=obj.mission_length;
			var time_option=obj.time_option;
			
			if(mission_type==\'proofreading\')
			{
				$(\'#staff_time_\'+mission_id+\'_2\').val(staff_length);
				$(\'#pdelivery_time_\'+mission_id+\'_2\').val(mission_length);
			}
			else
			{
				$(\'#staff_time_\'+mission_id+\'_1\').val(staff_length);
				$(\'#pdelivery_time_\'+mission_id+\'_1\').val(mission_length);
			}	
			
		fnCalculateProdTotal();			
	});
}

</script>
'; ?>

<div class="row-fluid" style="overflow:hidden">    
	<div class="span12">		
		<?php if (count($this->_tpl_vars['quoteDetails']) > 0): ?>
		<?php $_from = $this->_tpl_vars['quoteDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quote'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quote']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quote']):
        $this->_foreach['quote']['iteration']++;
?>			
			<div class="row-fluid">
							<?php if ($this->_tpl_vars['quote']['prod_review'] == 'challenged' || $this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
					<div class="w-box">
						<div class="w-box-header">Production cost</div>
						<div class="w-box-content  cnt_a">
						<?php if (count($this->_tpl_vars['quote']['mission_details']) > 0): ?>
						<?php $_from = $this->_tpl_vars['quote']['mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>
							<?php $this->assign('gn_index', ($this->_foreach['misson']['iteration']-1)); ?>
							<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>	
							<div class="row-fluid">	
								<div class="mission-details">
									<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
										<div class="new-mission-product">Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <label class="label label-warning">Mission added</label></div>
									<?php else: ?>
										<div class="prod-mission-product"> Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_name']; ?>
</div>
									<?php endif; ?>									
									
									<table class="table mission-table">
										<tr>
											<th style="width:30%">Language</th>
											<th style="width:30%">Product</th>
											<th style="width:20%">Volume</th>
											<th style="width:20%">Nb of words</th>
										</tr>
										<tr class="misson-details-text">
											<td>
											<?php if ($this->_tpl_vars['mission']['language_difference'] == 'yes'): ?>
												<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['language_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
											<?php endif; ?>	
												<?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>															
													<?php echo $this->_tpl_vars['mission']['language_source_name']; ?>
 > 	<?php echo $this->_tpl_vars['mission']['language_dest_name']; ?>
 
												<?php else: ?>
													<?php echo $this->_tpl_vars['mission']['language_source_name']; ?>

												<?php endif; ?>
											<?php if ($this->_tpl_vars['mission']['language_difference'] == 'yes'): ?>
												</span>
											<?php endif; ?>	
											</td>
										<td>
											<?php if ($this->_tpl_vars['mission']['product_type_difference'] == 'yes'): ?>
												<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['product_type_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
											<?php endif; ?>														
												<?php if ($this->_tpl_vars['mission']['product_type_name']): ?> 
													<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>

												<?php else: ?>
													<?php echo $this->_tpl_vars['mission']['product_name']; ?>

												<?php endif; ?>
											<?php if ($this->_tpl_vars['mission']['product_type_difference'] == 'yes'): ?>
												</span>
											<?php endif; ?>	
										</td>
										<td>
											<?php if ($this->_tpl_vars['mission']['volume_difference'] == 'yes'): ?>
												<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['volume_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i>
											<?php endif; ?>
												<?php echo $this->_tpl_vars['mission']['volume']; ?>

											<?php if ($this->_tpl_vars['mission']['volume_difference'] == 'yes'): ?>
												</span>
											<?php endif; ?>	
												
										</td>										
										<td>
											<?php if ($this->_tpl_vars['mission']['nb_words_difference'] == 'yes'): ?>
												<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['nb_words_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
											<?php endif; ?>
												<?php echo $this->_tpl_vars['mission']['nb_words']; ?>

											<?php if ($this->_tpl_vars['mission']['nb_words_difference'] == 'yes'): ?>
												</span>
											<?php endif; ?>
										</td>
										</tr>	
									</table>
									<!--Tempo details-->
									<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo/quote/tempo-details.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
									<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
										<?php if (count($this->_tpl_vars['mission']['prod_mission_details']) > 0): ?>
										<?php $this->assign('other', 'true'); ?>
											<?php $_from = $this->_tpl_vars['mission']['prod_mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['prod_mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prod_mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['prod_misson']):
        $this->_foreach['prod_mission']['iteration']++;
?>
												<?php $this->assign('pr_index', ($this->_foreach['prod_mission']['iteration']-1)+1); ?>
												<?php if ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
												<div class="displayOther">
													<div class="row-fluid showother" id="prod_missions_<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">
													<?php else: ?>
													<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">
													<?php endif; ?>
												
													<div class="mission-details">
														<div class="mission-prod-product">
														<span id="box_title_<?php echo $this->_tpl_vars['pr_index']; ?>
">
														<?php if ($this->_tpl_vars['prod_misson']['product'] == 'redaction'): ?>
															Writing
														<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'translation'): ?>
															Translating 	
														<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'proofreading'): ?>
															Correction 	
														<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
															Other 		
															<?php $this->assign('other', 'false'); ?>
														<?php endif; ?>		
														<?php if (count($this->_tpl_vars['prod_misson']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?><label class="label label-warning">New</label> <?php endif; ?></span>														
														</span>															
														</div>
														<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['prod_misson']['product']; ?>
">
														<input type="hidden" name="prod_mission_id_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
">
														<table class="table mission-table">
															<tr>
																<th style="width:12%">Nb of writers</th>					
															
																<th>Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
															
															</tr>				
															<tr>
																<td>
																	<?php if ($this->_tpl_vars['prod_misson']['staff_difference'] == 'yes'): ?>
																		<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" 	data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod_misson']['staff_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> </span>
																	<?php endif; ?>
																	<input type="text" id="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
" name="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span9 validate[required]"  value="<?php echo $this->_tpl_vars['prod_misson']['staff']; ?>
" onkeyup="fnCalculateProdTotal();" disabled/>
																																	</td>
																<td>
																	<?php if ($this->_tpl_vars['prod_misson']['cost_difference'] == 'yes'): ?>
																		<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" 	data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod_misson']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> </span>
																	<?php endif; ?>
																	<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
" name="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span9 validate[required]"  value="<?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fnCalculateProdTotal();" disabled/>
																</td>
															</tr>
														</table>
														<?php if ($this->_tpl_vars['mission']['comments']): ?>
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['created_by']; ?>
/logo.jpg" class="media-object">
															</a>
															<div class="media-body">
																<h4 class="media-heading">								
																	<a><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
</a> <?php echo $this->_tpl_vars['mission']['comment_time']; ?>

																</h4>
																<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
															</div>
														</div>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['prod_misson']['comments']): ?>
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['prod_misson']['created_by']; ?>
/logo.jpg" class="media-object">
															</a>
															<div class="media-body">														
																<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod_misson']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

															</div>												
														</div>
														<?php endif; ?>
													</div>
													<?php if ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>													
														</div>
													<?php endif; ?>	
												</div>												
												<?php if (($this->_foreach['prod_mission']['iteration'] == $this->_foreach['prod_mission']['total']) && $this->_tpl_vars['other'] == 'true'): ?>
												<div class="displayOther">
													<div class="row-fluid showother" id="prod_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" style="display:none">
													 <div class="mission-details">
														<div class="mission-prod-product"><span id="box_title_3">Other</span>
															<div class="pull-right">												
																<a class="btn close-seo" rel="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="pmission_close_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3">&times;</a>
															</div>
														
														</div>
														<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" value="autre">
														<table class="table mission-table">
															<tr>
																<th style="width:15%">Nb of writers</th>					
																<th style="width:33%">Staffing timing</th>														
																<th style="width:30%">Delivery timing</th>						
																<th style="width:21%">Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>														
															</tr>				
															<tr>
																<td>
																	<input type="text" id="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" name="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="" onkeyup="fnCalculateProdTotal();" disabled/>
																</td>
																<td>															
																	<div class="span4">
																		<input type="text" id="staff_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" name="staff_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span12 validate[required]" value="" disabled/>
																	</div>
																	<div class="span5">
																		<select name="staff_time_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="staff_time_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" class="span12" disabled>					
																			<option value="days" <?php if ($this->_tpl_vars['mission']['staff_time_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																			<option value="hours" <?php if ($this->_tpl_vars['mission']['staff_time_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>								
																		</select>
																	</div>	
																</td>
																<td>															
																	<div class="span4">
																		<input type="text" id="pdelivery_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" name="pdelivery_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span12 validate[required]" value="" onkeyup="fnCalculateProdTotal();" disabled/>
																	</div>
																	<div class="span5">
																		<select name="pdelivery_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="pdelivery_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" class="span12" onchange="fnCalculateProdTotal();" disabled>					
																			<option value="days" <?php if ($this->_tpl_vars['mission']['pdelivery_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																			<option value="hours" <?php if ($this->_tpl_vars['mission']['pdelivery_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>									
																		</select>
																	</div>	
																</td>
																<td>
																	<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" name="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="" onkeyup="fnCalculateProdTotal();" disabled/>
																</td>
															</tr>
														</table>
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
															</a>
															<div class="media-body">														
																<textarea name="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" placeholder="insert a comment" id="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" class="span12"></textarea>
															</div>												
														</div>
													</div>	
												</div>											
											</div>
												<?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>
										<?php else: ?>
											<?php if ($this->_tpl_vars['mission']['suggested_mission_details'][0]['writing_cost_before_signature']): ?>
												<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1">
													<div class="mission-details">
														<div class="mission-prod-product"><span id="box_title_1">
														<?php if ($this->_tpl_vars['mission']['product'] == 'redaction'): ?>
															Writing
														<?php else: ?>
															Translating 
														<?php endif; ?>												
														</span></div>
														<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['mission']['product']; ?>
">
														<table class="table mission-table">
															<tr>
																<th style="width:15%">Nb of writers</th>					
																<th style="width:33%">Staffing timing</th>														
																<th style="width:30%">Delivery timing</th>						
																<th style="width:21%">Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>														
															</tr>				
															<tr>
																<td>
																	<input type="text" id="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1" name="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="<?php echo $this->_tpl_vars['mission']['suggested_mission_details'][0]['writing_staff']; ?>
" onkeyup="fnCalculateProdTotal();" disabled/>
																																	</td>
																<td>															
																	<div class="span4">
																		<input type="text" id="staff_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1" name="staff_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['mission']['suggested_mission_details'][0]['staff_setup_length']; ?>
" disabled/>
																	</div>
																	<div class="span5">
																		<select name="staff_time_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="staff_time_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1" class="span12" disabled>					
																			<option value="days" <?php if ($this->_tpl_vars['mission']['staff_time_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																			<option value="hours" <?php if ($this->_tpl_vars['mission']['staff_time_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>									
																		</select>
																	</div>	
																</td>
																<td>															
																	<div class="span4">
																		<input type="text" id="pdelivery_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1" name="pdelivery_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['mission']['suggested_mission_details'][0]['mission_length']; ?>
" onkeyup="fnCalculateProdTotal();" disabled/>
																	</div>
																	<div class="span5">
																		<select name="pdelivery_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="pdelivery_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1" class="span12" onchange="fnCalculateProdTotal();" disabled>					
																			<option value="days" <?php if ($this->_tpl_vars['mission']['pdelivery_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																			<option value="hours" <?php if ($this->_tpl_vars['mission']['pdelivery_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>									
																		</select>
																	</div>	
																</td>
																<td>
																	<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1" name="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="<?php echo smarty_function_math(array('equation' => '((x/y)*z)','x' => $this->_tpl_vars['mission']['nb_words'],'y' => $this->_tpl_vars['mission']['suggested_mission_details'][0]['article_length'],'z' => $this->_tpl_vars['mission']['suggested_mission_details'][0]['writing_cost_before_signature'],'format' => '%.2f'), $this);?>
" onkeyup="fnCalculateProdTotal();" disabled/>
																</td>
																
															</tr>
														</table>
														<?php if ($this->_tpl_vars['mission']['comments']): ?>
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['created_by']; ?>
/logo.jpg" class="media-object">
															</a>
															<div class="media-body">
																<h4 class="media-heading">								
																	<a><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
</a> <?php echo $this->_tpl_vars['mission']['comment_time']; ?>

																</h4>
																<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
															</div>
														</div>
														<?php endif; ?>
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
															</a>
															<div class="media-body">														
																<textarea name="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" placeholder="insert a comment" id="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1" class="span12"></textarea>
															</div>												
														</div>
													</div>	
												</div>
											<?php endif; ?>	
											<?php if ($this->_tpl_vars['mission']['suggested_mission_details'][0]['correction_cost_before_signature']): ?>
												<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_2">
													<div class="mission-details">
														<div class="mission-prod-product"><span id="box_title_2">Correction</span></div>
														<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" value="proofreading">
														<table class="table mission-table">
															<tr>
																<th style="width:15%">Nb of writers</th>					
																<th style="width:33%">Staffing timing</th>														
																<th style="width:30%">Delivery timing</th>						
																<th style="width:21%">Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>														
															</tr>				
															<tr>
																<td>
																	<input type="text" id="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_2" name="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="<?php echo $this->_tpl_vars['mission']['suggested_mission_details'][0]['proofreading_staff']; ?>
" onkeyup="fnCalculateProdTotal();" disabled/>
																																	</td>
																<td>															
																	<div class="span4">
																		<input type="text" id="staff_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_2" name="staff_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['mission']['suggested_mission_details'][0]['staff_setup_length']; ?>
" disabled/>
																	</div>
																	<div class="span5">
																		<select name="staff_time_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="staff_time_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_2" class="span12" disabled>					
																			<option value="days" <?php if ($this->_tpl_vars['mission']['staff_time_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																			<option value="hours" <?php if ($this->_tpl_vars['mission']['staff_time_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>									
																		</select>
																	</div>	
																</td>
																<td>															
																	<div class="span4">
																		<input type="text" id="pdelivery_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_2" name="pdelivery_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['mission']['suggested_mission_details'][0]['mission_length']; ?>
" onkeyup="fnCalculateProdTotal();" disabled/>
																	</div>
																	<div class="span5">
																		<select name="pdelivery_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="pdelivery_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_2" class="span12" onchange="fnCalculateProdTotal();" disabled>					
																			<option value="days" <?php if ($this->_tpl_vars['mission']['pdelivery_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																			<option value="hours" <?php if ($this->_tpl_vars['mission']['pdelivery_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>									
																		</select>
																	</div>	
																</td>
																<td>
																	<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_2" name="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="<?php echo smarty_function_math(array('equation' => '((x/y)*z)','x' => $this->_tpl_vars['mission']['nb_words'],'y' => $this->_tpl_vars['mission']['suggested_mission_details'][0]['article_length'],'z' => $this->_tpl_vars['mission']['suggested_mission_details'][0]['correction_cost_before_signature'],'format' => '%.2f'), $this);?>
" onkeyup="fnCalculateProdTotal();" disabled/>
																</td>
																
															</tr>
														</table>												
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
															</a>
															<div class="media-body">														
																<textarea name="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" placeholder="insert a comment" id="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_2" class="span12"></textarea>
															</div>												
														</div>
													</div>	
												</div>
											<?php endif; ?>	
											<?php if ($this->_tpl_vars['mission']['suggested_mission_details'][0]['other_cost_before_signature'] == 0 || $this->_tpl_vars['mission']['suggested_mission_details'][0]['other_cost_before_signature'] > 0): ?>
												<div class="displayOther">
												 <div class="row-fluid showother" id="prod_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" <?php if ($this->_tpl_vars['mission']['suggested_mission_details'][0]['other_cost_before_signature'] == 0): ?>style="display:none"<?php endif; ?>>
													 <div class="mission-details">
														<div class="mission-prod-product"><span id="box_title_3">Other</span>
															<div class="pull-right">												
																<a class="btn close-seo" rel="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="pmission_close_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3">&times;</a>
															</div>
														
														</div>
														<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" value="autre">
														<table class="table mission-table">
															<tr>
																<th style="width:15%">Nb of writers</th>					
																<th style="width:33%">Staffing timing</th>														
																<th style="width:30%">Delivery timing</th>						
																<th style="width:21%">Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>														
															</tr>				
															<tr>
																<td>
																	<input type="text" id="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" name="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="" onkeyup="fnCalculateProdTotal();" disabled/>
																</td>
																<td>															
																	<div class="span4">
																		<input type="text" id="staff_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" name="staff_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['mission']['suggested_mission_details'][0]['staff_setup_length']; ?>
" disabled/>
																	</div>
																	<div class="span5">
																		<select name="staff_time_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="staff_time_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" class="span12" disabled>					
																			<option value="days" <?php if ($this->_tpl_vars['mission']['staff_time_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																			<option value="hours" <?php if ($this->_tpl_vars['mission']['staff_time_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>									
																		</select>
																	</div>	
																</td>
																<td>															
																	<div class="span4">
																		<input type="text" id="pdelivery_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" name="pdelivery_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['mission']['suggested_mission_details'][0]['mission_length']; ?>
" onkeyup="fnCalculateProdTotal();" disabled/>
																	</div>
																	<div class="span5">
																		<select name="pdelivery_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="pdelivery_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" class="span12" onchange="fnCalculateProdTotal();" disabled>					
																			<option value="days" <?php if ($this->_tpl_vars['mission']['pdelivery_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																			<option value="hours" <?php if ($this->_tpl_vars['mission']['pdelivery_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>									
																		</select>
																	</div>	
																</td>
																<td>
																	<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" name="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="<?php echo smarty_function_math(array('equation' => '((x/y)*z)','x' => $this->_tpl_vars['mission']['nb_words'],'y' => $this->_tpl_vars['mission']['suggested_mission_details'][0]['article_length'],'z' => $this->_tpl_vars['mission']['suggested_mission_details'][0]['other_cost_before_signature'],'format' => '%.2f'), $this);?>
" onkeyup="fnCalculateProdTotal();" disabled/>
																</td>
																
															</tr>
														</table>
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
															</a>
															<div class="media-body">														
																<textarea name="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" placeholder="insert a comment" id="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" class="span12"></textarea>
															</div>												
														</div>
													</div>	
												</div>
											</div>
											<?php endif; ?>	
										<?php endif; ?>	
									</div>		
								</div>
							</div>
							<!-- SEO proposals for a mission-->
								<?php if (count($this->_tpl_vars['mission']['seoMissions']) > 0): ?>
								<?php $_from = $this->_tpl_vars['mission']['seoMissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['seo_misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['seo_misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['seo_mission']):
        $this->_foreach['seo_misson']['iteration']++;
?>	
									<?php $this->assign('sms_index', $this->_foreach['misson']['total']+($this->_foreach['seo_misson']['iteration']-1)+1); ?>		
									<div class="row-fluid">	
										<div class="mission-details">
											<div class="prod-mission-product">Mission <?php echo $this->_tpl_vars['sms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <label class="label label-warning">Proposition seo</label></div>
											<table class="table mission-table">
												<tr>
													<th style="width:30%">Language</th>
													<th style="width:30%">Product</th>
													<th style="width:20%">Volume</th>
													<th style="width:20%">Nb of words</th>
												</tr>
												<tr class="misson-details-text">
													<td><?php echo $this->_tpl_vars['mission']['language_source_name']; ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>><?php echo $this->_tpl_vars['mission']['language_dest_name']; ?>
<?php endif; ?></td>
													<td><?php echo $this->_tpl_vars['seo_mission']['product_type_name']; ?>
</td>
													<td><?php echo $this->_tpl_vars['seo_mission']['volume']; ?>
</td>
													<td><?php echo $this->_tpl_vars['seo_mission']['nb_words']; ?>
</td>
												</tr>	
											</table>
											<div class="row-fluid">
												<?php $this->assign('_tempo_value', $this->_tpl_vars['seo_mission']['tempo']); ?>
												<?php $this->assign('_delivery_volume_option', $this->_tpl_vars['seo_mission']['delivery_volume_option']); ?>
												<?php $this->assign('_tempo_length_option', $this->_tpl_vars['seo_mission']['tempo_length_option']); ?>
												<div class="mission-details">
													<div class="mission-prod-product">
														<span>Tempo Details</span>
													</div>
													<div class="row-fluid">								
														<label class="span3 moveright">Staffing set up</label>
														<div class="span3">
															<div class="span4">
																<h4> <?php echo $this->_tpl_vars['seo_mission']['staff_time']; ?>
 <?php if ($this->_tpl_vars['seo_mission']['staff_time_option'] == 'days'): ?> Days <?php else: ?> Hours <?php endif; ?></h4>
															</div>
														</div>	
													</div>	
													<?php if ($this->_tpl_vars['seo_mission']['oneshot']): ?>
														<div class="row-fluid">								
															<label class="span3 moveright">One shot</label>
															<div class="span3">
																<h4>
																<?php if ($this->_tpl_vars['seo_mission']['oneshot'] == 'yes'): ?>
																	Yes
																<?php else: ?>
																	No
																<?php endif; ?>
																</h4>
															</div>
														</div>
													<?php endif; ?>
													<div class="row-fluid">								
														<label class="span3 moveright">Mission Duration</label>
														<?php if ($this->_tpl_vars['seo_mission']['duration_dont_know'] == 'yes'): ?> 															
															<div class="span8" >
																* Duration not specified by sales														
															</div>
															<?php else: ?>
														<div class="span3">
															<div class="span4">
																<h4><?php echo $this->_tpl_vars['seo_mission']['mission_length']; ?>
 <?php if ($this->_tpl_vars['seo_mission']['mission_length_option'] == 'days'): ?> Days <?php else: ?> Hours <?php endif; ?></h4>
															</div>													
														</div>
														<?php endif; ?>
													</div>
													<?php if ($this->_tpl_vars['seo_mission']['oneshot'] == 'no'): ?>
														<div class="row-fluid">								
															<label class="span3 moveright">Volume</label>														
															<div class="span9" id="tempo_details_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
" <?php if ($this->_tpl_vars['seo_mission']['oneshot'] == 'yes'): ?> style="display:none" <?php endif; ?>>
																<div class="span4">		
																	<h4>
																		<?php echo $this->_tpl_vars['seo_mission']['volume_max']; ?>
 <?php echo $this->_tpl_vars['tempo_array'][$this->_tpl_vars['_tempo_value']]; ?>
 <?php echo $this->_tpl_vars['volume_option_array'][$this->_tpl_vars['_delivery_volume_option']]; ?>
 <?php echo $this->_tpl_vars['seo_mission']['tempo_length']; ?>
 <?php echo $this->_tpl_vars['tempo_duration_array'][$this->_tpl_vars['_tempo_length_option']]; ?>

																	</h4>	
																</div>														
															</div>
														</div>
													<?php endif; ?>	
												</div>
											</div>
											<?php if (count($this->_tpl_vars['seo_mission']['prod_mission_details']) > 0): ?>
											<?php $this->assign('other', 'true'); ?>
												<?php $_from = $this->_tpl_vars['seo_mission']['prod_mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['prod_misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prod_misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['prod_misson']):
        $this->_foreach['prod_misson']['iteration']++;
?>
													<?php $this->assign('pr_index', ($this->_foreach['prod_misson']['iteration']-1)+1); ?>
													
												<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
">
												<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">
												
														
															<div class="mission-details">
																<div class="mission-prod-product"><span id="box_title_<?php echo $this->_tpl_vars['pr_index']; ?>
">
																<?php if ($this->_tpl_vars['prod_misson']['product'] == 'redaction'): ?>
																	Writing
																<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'translation'): ?>
																	Translating 
																<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'proofreading'): ?>
																	Correction 	
																<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
																	Other 		
																	
																<?php endif; ?>
																</span>
																<?php if ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
																<div class="pull-right">												
																	<a class="btn close-seo edit" rel="<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
" id="pmission_close_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">&times;</a>
																</div>
															<?php endif; ?>
																
																</div>
																<input type="hidden" name="prod_mission_id_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
">
																<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['seo_mission']['product']; ?>
">
																<table class="table mission-table">
																	<tr>
																		<th style="width:12%">Nb of writers</th>					
																		<th style="width:15%">Staffing timing</th>
																		<th style="width:37%">Volume & tempo / intermediary delivery</th>
																		<th style="width:19%">Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
																		<th style="width:16%">Delivery timing</th>
																	</tr>				
																	<tr>
																		<td>
																			<input type="text" id="staff_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
" name="staff_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="<?php echo $this->_tpl_vars['prod_misson']['staff']; ?>
" onkeyup="fnCalculateProdTotal();" disabled />
																		</td>
																		<td>															
																			<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
" name="pmission_cost_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" class="span3 validate[required]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fnCalculateProdTotal();"disabled />
																		</td>
																	</tr>
																</table>
																<?php if ($this->_tpl_vars['seo_mission']['comments']): ?>
																<div class="media mission-comment">
																	<a class="pull-left imgframe">
																		<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['seo_mission']['created_by']; ?>
/logo.jpg" class="media-object">
																	</a>
																	<div class="media-body">
																		<h4 class="media-heading">								
																			<a><?php echo $this->_tpl_vars['seo_mission']['seo_user_name']; ?>
</a> <?php echo $this->_tpl_vars['seo_mission']['comment_time']; ?>

																		</h4>
																		<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['seo_mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
																	</div>
																</div>
																<?php endif; ?>
																<?php if ($this->_tpl_vars['prod_misson']['comments']): ?>
																<div class="media mission-comment">
																	<a class="pull-left imgframe">
																		<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['prod_misson']['created_by']; ?>
/logo.jpg" class="media-object">
																	</a>
																	<div class="media-body">														
																		<textarea name="prodcomments_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" placeholder="insert a comment" id="prodcomments_<?php echo $this->_tpl_vars['pr_index']; ?>
" class="span12"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod_misson']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>
</textarea>
																	</div>												
																</div>
																<?php endif; ?>
																<div class="row-fluid topset2" style="padding:0 10px">
																		<?php echo $this->_tpl_vars['mission']['files']; ?>

																</div>
															</div>	
														</div>
													</div>	
													
													
												<?php endforeach; endif; unset($_from); ?>	
											<?php else: ?>	
												<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
">
													<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_1">
														<div class="mission-details">
															<div class="mission-prod-product"><span id="box_title_1"><?php echo $this->_tpl_vars['mission']['product_name']; ?>
</span></div>
															<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['seo_mission']['product']; ?>
">
															<table class="table mission-table">
																<tr>
																	<th style="width:15%">Nb of writers</th>					
																	<th style="width:33%">Staffing timing</th>														
																	<th style="width:30%">Delivery timing</th>						
																	<th style="width:21%">Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>														
																</tr>				
																<tr>
																	<td>
																		<input type="text" id="staff_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="staff_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="<?php echo $this->_tpl_vars['seo_mission']['suggested_mission_details'][0]['writing_staff']; ?>
" onkeyup="fnCalculateProdTotal();" disabled/>
																	</td>
																	<td>															
																		<div class="span4">
																			<input type="text" id="staff_time_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="staff_time_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['seo_mission']['suggested_mission_details'][0]['staff_setup_length']; ?>
"disabled/>
																		</div>
																		<div class="span5">
																			<select name="staff_time_option_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" id="staff_time_option_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12" disabled>					
																				<option value="days" <?php if ($this->_tpl_vars['seo_mission']['staff_time_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																				<option value="hours" <?php if ($this->_tpl_vars['seo_mission']['staff_time_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>									
																			</select>
																		</div>	
																	</td>
																	<td>															
																		<div class="span4">
																			<input type="text" id="pdelivery_time_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="pdelivery_time_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['seo_mission']['suggested_mission_details'][0]['mission_length']; ?>
" onkeyup="fnCalculateProdTotal();" disabled/>
																		</div>
																		<div class="span5">
																			<select name="pdelivery_option_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" id="pdelivery_option_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12" onchange="fnCalculateProdTotal();" disabled>					
																				<option value="days" <?php if ($this->_tpl_vars['seo_mission']['pdelivery_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																				<option value="hours" <?php if ($this->_tpl_vars['seo_mission']['pdelivery_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>									
																			</select>
																		</div>	
																	</td>
																	<td>
																		<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="pmission_cost_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" class="span11 validate[required]" <?php if ($this->_tpl_vars['seo_mission']['sales_suggested_missions']): ?>  value="<?php echo smarty_function_math(array('equation' => '((x/y)*z)','x' => $this->_tpl_vars['seo_mission']['nb_words'],'y' => $this->_tpl_vars['seo_mission']['suggested_mission_details'][0]['article_length'],'z' => $this->_tpl_vars['seo_mission']['suggested_mission_details'][0]['correction_cost_before_signature'],'format' => '%.2f'), $this);?>
" <?php endif; ?> onkeyup="fnCalculateProdTotal();" disabled/>
																	</td>
																	
																</tr>
															</table>
															<div class="media mission-comment">
																<a class="pull-left imgframe">
																	<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['seo_mission']['created_by']; ?>
/logo.jpg" class="media-object">
																</a>
																<div class="media-body">
																	<h4 class="media-heading">								
																		<a><?php echo $this->_tpl_vars['seo_mission']['seo_user_name']; ?>
</a> <?php echo $this->_tpl_vars['seo_mission']['comment_time']; ?>

																	</h4>
																	<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['seo_mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
																</div>
															</div>
															<div class="media mission-comment">
																<a class="pull-left imgframe">
																	<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
																</a>
																<div class="media-body">														
																	<textarea name="prodcomments_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" placeholder="insert a comment" id="prodcomments_1" class="span12"></textarea>
																</div>												
															</div>
														</div>	
													</div>
												</div>	
											<?php endif; ?>	
										</div>
									</div>
								<?php endforeach; endif; unset($_from); ?>
								<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>		
						<!--Deleted Missions-->
						<?php if (count($this->_tpl_vars['quote']['deletedMissionVersions']) > 0): ?>
							<?php $_from = $this->_tpl_vars['quote']['deletedMissionVersions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['dmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['dmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dmission']):
        $this->_foreach['dmission']['iteration']++;
?>	
								<?php $this->assign('sms_index', $this->_foreach['misson']['total']+($this->_foreach['dmission']['iteration']-1)+1); ?>		
								<div class="row-fluid">	
									<div class="mission-details">
										<div class="delete-mission-product"><?php echo $this->_tpl_vars['dmission']['product_name']; ?>
 <label class="label">Mission deleted</label></div>
										<table class="table mission-table">
											<tr>
												<th style="width:30%">Language</th>
												<th style="width:30%">Product</th>
												<th style="width:20%">Volume</th>
												<th style="width:20%">Nb of words</th>
											</tr>
											<tr class="misson-details-text">
												<td><?php echo $this->_tpl_vars['dmission']['language_source_name']; ?>
 <?php if ($this->_tpl_vars['dmission']['product'] == 'translation'): ?>><?php echo $this->_tpl_vars['dmission']['language_dest_name']; ?>
<?php endif; ?></td>
												<td><?php echo $this->_tpl_vars['dmission']['product_type_name']; ?>
</td>
												<td><?php echo $this->_tpl_vars['dmission']['volume']; ?>
</td>
												<td><?php echo $this->_tpl_vars['dmission']['nb_words']; ?>
</td>
											</tr>	
										</table>
										<?php if (count($this->_tpl_vars['dmission']['prod_mission_details']) > 0): ?>
										<?php $this->assign('other', 'true'); ?>
											<?php $_from = $this->_tpl_vars['dmission']['prod_mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['prod_misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prod_misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['prod_misson']):
        $this->_foreach['prod_misson']['iteration']++;
?>
												<?php $this->assign('pr_index', ($this->_foreach['prod_misson']['iteration']-1)+1); ?>
												
											<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['dmission']['identifier']; ?>
">
											<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['dmission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">
											
													
														<div class="mission-details">
															<div class="mission-prod-product"><span id="box_title_<?php echo $this->_tpl_vars['pr_index']; ?>
">
															<?php if ($this->_tpl_vars['prod_misson']['product'] == 'redaction'): ?>
																Writing
															<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'translation'): ?>
																Translating 
															<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'proofreading'): ?>
																Correction 	
															<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
																Other 		
																
															<?php endif; ?>
															</span>															
															
															</div>																
															<table class="table mission-table">
																<tr>
																	<th style="width:15%">Nb of writers</th>					
																	<th style="width:33%">Staffing timing</th>														
																	<th style="width:30%">Delivery timing</th>						
																	<th style="width:21%">Cost/<?php echo $this->_tpl_vars['dmission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>														
																</tr>				
																<tr class="misson-details-text">
																	<td><?php echo $this->_tpl_vars['prod_misson']['staff']; ?>
</td>
																	<td><?php echo $this->_tpl_vars['prod_misson']['staff_time']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['staff_time_option'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</td>
																	<td><?php echo $this->_tpl_vars['prod_misson']['delivery_time']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['delivery_option'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</td>
																	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</td>
																	
																</tr>
															</table>
															<?php if ($this->_tpl_vars['dmission']['comments']): ?>
															<div class="media mission-comment">
																<a class="pull-left imgframe">
																	<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['dmission']['created_by']; ?>
/logo.jpg" class="media-object">
																</a>
																<div class="media-body">
																	<h4 class="media-heading">								
																		<a><?php echo $this->_tpl_vars['dmission']['seo_user_name']; ?>
</a> <?php echo $this->_tpl_vars['dmission']['comment_time']; ?>

																	</h4>
																	<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['dmission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
																</div>
															</div>
															<?php endif; ?>
															<?php if ($this->_tpl_vars['prod_misson']['comments']): ?>
															<div class="media mission-comment">
																<a class="pull-left imgframe">
																	<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['prod_misson']['created_by']; ?>
/logo.jpg" class="media-object">
																</a>
																<div class="media-body"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod_misson']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>												
															</div>
															<?php endif; ?>
														</div>	
													</div>
												</div>	
											<?php endforeach; endif; unset($_from); ?>
										<?php endif; ?>	
									</div>
								</div>	
							<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
						</div>						
					</div>
				<?php endif; ?>	
							
				
				<div class="w-box">
					<div class="w-box-header">General comment</div>
					<div class="w-box-content  cnt_a">
						<div class="media">
							<a class="pull-left imgframe">
								<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['quote']['quote_by']; ?>
/logo.jpg" class="media-object">
							</a>
							<div class="media-body">
								<h4 class="media-heading">								
									<a><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
</a> <?php echo $this->_tpl_vars['quote']['comment_time']; ?>

								</h4>								
								<span><?php echo $this->_tpl_vars['quote']['sales_comment']; ?>
</span>
							</div>
						</div>
						<h2 class="heading">Emails you sent to the client and his answers</h2>
						<textarea rows="10" disabled class="span12"><?php echo $this->_tpl_vars['quote']['client_email_text']; ?>
</textarea>
						<?php if ($this->_tpl_vars['quote']['related_files']): ?>
							<div class="row-fluid">
								<div class="span3">Documents to download :</div>
								<div class=""><?php echo $this->_tpl_vars['quote']['related_files']; ?>
</div>
							</div>
						<?php endif; ?>	
						<?php if ($this->_tpl_vars['quote']['client_aims_text']): ?>
							<div class="row-fluid">
								<br>
								<h4>Client needs :</h4>
								<?php echo $this->_tpl_vars['quote']['client_aims_text']; ?>

								<?php if ($this->_tpl_vars['quote']['client_aims_comments']): ?>
									<b>Comment :</b> <?php echo $this->_tpl_vars['quote']['client_aims_comments']; ?>
 <br><br>
								<?php endif; ?>
								<b>Urgent project :</b> 
								<?php if ($this->_tpl_vars['quote']['urgent'] == 'yes'): ?>	
										Yes
									<?php else: ?>
										No
									<?php endif; ?>
								<br>
									<?php if ($this->_tpl_vars['quote']['content_ordered_agency']): ?>
									<b>Has the client ordered content with an other agency ?</b>
									<?php if ($this->_tpl_vars['quote']['content_ordered_agency'] == 'yes'): ?>	
										Yes
									<?php else: ?>
										No
									<?php endif; ?>	
									<br>	
									<?php if ($this->_tpl_vars['quote']['content_ordered_agency'] == 'yes'): ?>
										<b>Agency name </b>
										<?php if ($this->_tpl_vars['quote']['agency_name']): ?>
											<?php echo $this->_tpl_vars['quote']['agency_name']; ?>

										<?php else: ?>
											I don't know
										<?php endif; ?>
										<br><br>
									<?php endif; ?>
								<?php endif; ?>							
								<b>Does the client want to know the writers/translators he's going to work with ?</b> 
									<?php if ($this->_tpl_vars['quote']['client_know_writers'] == 'yes'): ?>	
										Yes
									<?php else: ?>
										No
									<?php endif; ?>
								<br><br>
																<b>What is the client's budget this year? :</b>
								<?php if (! $this->_tpl_vars['quote']['budget_marketing']): ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['budget'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['budget_currency'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>

								<?php else: ?>
									I don't know
								<?php endif; ?><br>
							</div>
						<?php endif; ?>
					</div>	
				</div>	
											
					<?php if ($this->_tpl_vars['quote']['prod_review'] == 'challenged' || $this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
						<?php if (count($this->_tpl_vars['techMissionDetails']) > 0): ?>						
						<div class="w-box">
							<div class="w-box-header">Tech Mission</div>
							<div class="w-box-content  cnt_a">
							<?php $_from = $this->_tpl_vars['techMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['mission']['iteration']++;
?>
							<?php $this->assign('gn_index', ($this->_foreach['mission']['iteration']-1)); ?>
							<?php $this->assign('ms_index', ($this->_foreach['mission']['iteration']-1)+1); ?>								
								<div class="row-fluid">	
									<div class="mission-details">
										<div class="mission-tech-product"><?php echo $this->_tpl_vars['mission']['title']; ?>
 <?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?><label class="label label-warning">New</label> <?php endif; ?></span>
										</div>
										<table class="table mission-table">
											<tr>
												<th style="width:33%">Mission</th>
												<th style="width:33%">Delivery timing</th>
												<th style="width:33">Cost (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
											</tr>
											<tr class="misson-details-text">
												<td>
													<?php if ($this->_tpl_vars['mission']['title_difference'] == 'yes'): ?>
														<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['title_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
													<?php endif; ?>
													<input type="text" name="mission_title[]" id="mission_title_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo $this->_tpl_vars['mission']['title']; ?>
" class="span10 validate[required]" placeholder="enter a mission" disabled>
												</td>
												<td>													
													<div class="span1">																
														<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents" style="top:5px"></i> </span>
														<?php endif; ?>
													</div>
													<div class="span4">
														<input type="text" id="delivery_time_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="delivery_time[]" class="span12 validate[required]" disabled value="<?php echo $this->_tpl_vars['mission']['delivery_time']; ?>
"/>
													</div>
													<div class="span6">
														<select name="delivery_option[]" id="delivery_option_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12">					
															<option value="days" <?php if ($this->_tpl_vars['mission']['delivery_option'] == 'days'): ?> selected<?php endif; ?> >Days</option>
															<option value="hours" <?php if ($this->_tpl_vars['mission']['delivery_option'] == 'hours'): ?> selected<?php endif; ?>>Hours</option>									
														</select>
													</div>	
												</td>
												<td>
													<?php if ($this->_tpl_vars['mission']['cost_difference'] == 'yes'): ?>
														<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
													<?php endif; ?>
													<input type="text" id="mission_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="mission_cost[]" class="span4 validate[required]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" disabled />
												</td>														
											</tr>	
										</table>
										<div class="row-fluid" style="margin-left: 15px;">
											<div class="span12">
												<input type="checkbox" class="uni_style"<?php if ($this->_tpl_vars['mission']['before_prod'] == 'yes'): ?> checked <?php endif; ?> disabled
												> To be done before launching prod mission
											</div>	
										</div>
										<?php if ($this->_tpl_vars['mission']['comments']): ?>
										<div class="media mission-comment">
											<a class="pull-left imgframe">
												<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['created_by']; ?>
/logo.jpg" class="media-object">
											</a>
											<div class="media-body">
												<h4 class="media-heading">								
													<a><?php echo $this->_tpl_vars['mission']['tech_user_name']; ?>
</a> <?php echo $this->_tpl_vars['mission']['comment_time']; ?>

												</h4>
												<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
											</div>
										</div>
										<?php endif; ?>	
										<div class="row-fluid topset2" style="padding:0 10px">	
											
												<?php echo $this->_tpl_vars['mission']['files']; ?>

											
										</div>
									</div>
								</div>
								
							<?php endforeach; endif; unset($_from); ?>
							</div>						
						</div>
						<?php endif; ?>	
					<?php endif; ?>
					<?php if ($this->_tpl_vars['quote']['prod_review'] == 'challenged' || $this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
						<?php if (count($this->_tpl_vars['seoMissionDetails']) > 0): ?>	
						<div class="w-box">
							<div class="w-box-header">SEO mission setup</div>
							<div class="w-box-content  cnt_a">
								<div class="row-fluid" id="seo_missions">
									
									<?php $_from = $this->_tpl_vars['seoMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmisson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmisson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['tmisson']['iteration']++;
?>
									<?php $this->assign('gn_index', ($this->_foreach['tmisson']['iteration']-1)); ?>
									<?php $this->assign('ms_index', ($this->_foreach['tmisson']['iteration']-1)+1); ?>		
									<div class="row-fluid" id="seo_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
">									
										<div class="mission-details">
											<div class="mission-seo-product">
												<span id="box_title_<?php echo $this->_tpl_vars['ms_index']; ?>
">
												<?php if ($this->_tpl_vars['mission']['product'] == 'redaction' || $this->_tpl_vars['mission']['product'] == 'translation'): ?>
													<?php echo $this->_tpl_vars['mission']['product_name']; ?>
 Mission
												<?php else: ?>	
													Proposition seo <?php echo $this->_tpl_vars['ms_index']; ?>
													
												<?php endif; ?>	
												<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?><label class="label label-warning">New</label> <?php endif; ?></span>												
											</div>
											<table class="table mission-table">
												<tr>
													<th style="width:25%">Type</th>
													<th style="width:25%">Language</th>
													<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="width:30%" <?php else: ?> style="display:none;width:30%"<?php endif; ?>  id="thead_dtime_<?php echo $this->_tpl_vars['ms_index']; ?>
">Delivery timing</th>												
													<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="width:20%" <?php else: ?> style="display:none;width:20%"<?php endif; ?> id="thead_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
">Cost (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
													<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;width:35%"<?php else: ?> style="width:35%" <?php endif; ?> id="thead_ptype_<?php echo $this->_tpl_vars['ms_index']; ?>
">Product</th>
													<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;width:15%"<?php else: ?> style="width:15%" <?php endif; ?> id="thead_nwords_<?php echo $this->_tpl_vars['ms_index']; ?>
">Nb of words</th>
												</tr>
												<tr class="misson-details-text">
													<td>
														<?php if ($this->_tpl_vars['mission']['product_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['product_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
														<?php endif; ?>
														<select name="product[]" id="product_<?php echo $this->_tpl_vars['ms_index']; ?>
" onchange="fnCheckProduct(this);" class="span10 validate[required]" data-placeholder="Select product">
															<option value="seo_audit" <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit'): ?> selected<?php endif; ?>>SEO audit</option>
															<option value="smo_audit" <?php if ($this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> selected<?php endif; ?>>SMO audit</option>
															<option value="redaction" <?php if ($this->_tpl_vars['mission']['product'] == 'redaction'): ?> selected<?php endif; ?>>Writing</option>
															<option value="translation" <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?> selected<?php endif; ?>>Translating</option>
															<option value="autre" <?php if ($this->_tpl_vars['mission']['product'] == 'autre'): ?> selected<?php endif; ?>>Other</option>
														</select>
														
													
													</td>
													<td>
														<?php if ($this->_tpl_vars['mission']['language_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['language_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
														<?php endif; ?>
														<select name="language[]" id="language_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span10 validate[required]" data-placeholder="Select language">
															<option></option>
															<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['mission']['language_source']), $this);?>

														</select>
														<select name="languagedest[]" id="languagedest_<?php echo $this->_tpl_vars['ms_index']; ?>
" style="display:none" class="span10 validate[required]" data-placeholder="Select language">
															<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['mission']['language_dest']), $this);?>

														</select>	
													
													</td>
													<td id="td_dtime_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['product'] != 'seo_audit' && $this->_tpl_vars['mission']['product'] != 'smo_audit'): ?> style="display:none;"<?php endif; ?>>
														<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>					
															<span style="float:left" class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents" style="top:8px"></i></span>
														<?php endif; ?>
														<div class="span4">
															<input type="text" id="sdelivery_time_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="sdelivery_time[]" class="span12 validate[required]" disabled value="<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
"/>
														</div>
														<div class="span5">
															<select name="sdelivery_option[]" id="sdelivery_option_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12">					
																<option value="days" <?php if ($this->_tpl_vars['mission']['mission_length_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																<option value="hours" <?php if ($this->_tpl_vars['mission']['mission_length_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>									
															</select>
														</div>	
													</td>
													<td id="td_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['product'] != 'seo_audit' && $this->_tpl_vars['mission']['product'] != 'smo_audit'): ?> style="display:none;"<?php endif; ?>>
														<?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" 	data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> </span>
														<?php endif; ?>
														<input type="text" id="smission_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="smission_cost[]" class="span10 validate[required]" onkeyup="fnCalculateProdTotal();" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" disabled />
													</td>
													<td <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;"<?php endif; ?> id="td_ptype_<?php echo $this->_tpl_vars['ms_index']; ?>
">
														<?php if ($this->_tpl_vars['mission']['product_type_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['product_type_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span> 
														<?php endif; ?>
														<select name="producttype[]" id="producttype_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="validate[required]" data-placeholder="Select product type">
															<option></option>
															<option value="article_de_blog" <?php if ($this->_tpl_vars['mission']['product_type'] == 'article_de_blog'): ?> selected<?php endif; ?>>Brand content</option>
															<option value="descriptif_produit" <?php if ($this->_tpl_vars['mission']['product_type'] == 'descriptif_produit'): ?> selected<?php endif; ?>>Product description</option>
															<option value="article_seo" <?php if ($this->_tpl_vars['mission']['product_type'] == 'article_seo'): ?> selected<?php endif; ?>>SEO articles</option>
															<option value="guide" <?php if ($this->_tpl_vars['mission']['product_type'] == 'guide'): ?> selected<?php endif; ?>>Guides</option>
															<option value="news" <?php if ($this->_tpl_vars['mission']['product_type'] == 'news'): ?> selected<?php endif; ?>>News</option>
														</select>
													</td>
													<td <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;"<?php endif; ?> id="td_nwords_<?php echo $this->_tpl_vars['ms_index']; ?>
">
														<?php if ($this->_tpl_vars['mission']['nb_words_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['nb_words_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span> 
														<?php endif; ?>
														
														<input type="text" name="nb_words[]" id="nb_words_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span10 validate[required,custom[number]]" value="<?php echo $this->_tpl_vars['mission']['nb_words']; ?>
" disabled >
													</td>
																											
												</tr>	
											</table>
											<?php if ($this->_tpl_vars['mission']['product'] != 'redaction'): ?>
												<div class="row-fluid" style="margin-left: 15px;">
													<div class="span12">
														<input type="checkbox" class="uni_style"<?php if ($this->_tpl_vars['mission']['before_prod'] == 'yes'): ?> checked <?php endif; ?> disabled
														> To be done before launching prod mission
													</div>	
												</div>
											<?php endif; ?>	
											<?php if ($this->_tpl_vars['mission']['comments']): ?>
											<div class="media mission-comment">
												<a class="pull-left imgframe">
													<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['created_by']; ?>
/logo.jpg" class="media-object">
												</a>
												<div class="media-body">														
													<h4 class="media-heading">								
													<a><?php echo $this->_tpl_vars['mission']['seo_user_name']; ?>
</a> <?php echo $this->_tpl_vars['mission']['comment_time']; ?>

												</h4>
												<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
												</div>												
											</div>
											<?php endif; ?>
											
											<div class="row-fluid topset2" style="padding:0 10px">	
												<?php if ($this->_tpl_vars['mission']['product'] == 'redaction' || $this->_tpl_vars['mission']['product'] == 'translation'): ?>
												<div class="span7 pull-right form-inline">
													<span class="span5"><label style="padding-top: 5px;"><b>Lier cette proposition &agrave; : </b></label></span>
													<select name="related_mission[]" id="related_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span7 validate[required]">
															<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['quote']['missions_list'],'selected' => $this->_tpl_vars['mission']['related_to']), $this);?>

													</select>
												</div>
												<?php endif; ?>
											</div>
											<div class="row-fluid">
												<div class="">													
													<?php echo $this->_tpl_vars['mission']['files']; ?>
																									
												</div>
											</div>
										</div>	
									</div>									
									<?php endforeach; endif; unset($_from); ?>									
								</div>								
							</div>
						</div>
						<?php endif; ?>	
					<?php endif; ?>	
					
					<div class="w-box">
					<div class="w-box-header">Editorial information form the client</div>
					<div class="w-box-content  cnt_a">
					<div class="row-fluid">
						<div class="span12">
						<div class="span6">
							<label>
								<span class="error_placement">Do you need to receive elements from the client to launch the mission ?</span>
							</label>
						</div>
						<div class="span6">
							<label class="radio inline">
								<input type="radio" class="icheck" disabled='disabled' name="prod_extra_info" <?php if ($this->_tpl_vars['quote']['prod_extra_info'] == 'yes'): ?>checked='checked'<?php endif; ?> value="yes">
								Yes 
							</label>
							<label class="radio inline">
								<input type="radio" class="icheck" disabled='disabled' name="prod_extra_info" <?php if ($this->_tpl_vars['quote']['prod_extra_info'] == 'no'): ?>checked='checked'<?php endif; ?> value="no">
								No
							</label>
						</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="control-group extra_comments" style="<?php if ($this->_tpl_vars['quote']['prod_extra_info'] == 'no'): ?>display:none<?php endif; ?>">
							<div class="span12">
								<div class="span2">
								<label for="" class="control-label">Comment:</label>
								</div>
								<div class="span10">
									<textarea name="prod_extra_comments" disabled placeholder="insert a comment" id="" class="span12"><?php echo $this->_tpl_vars['quote']['prod_extra_comments']; ?>
</textarea>
								</div>	
							</div>
						</div>
						</div>
					</div>	
				</div>	
					
															</div>				
			</div>
		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
</div>