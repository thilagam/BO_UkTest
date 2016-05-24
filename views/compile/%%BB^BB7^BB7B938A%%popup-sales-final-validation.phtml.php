<?php /* Smarty version 2.6.19, created on 2015-07-08 10:07:12
         compiled from gebo/quote/popup-sales-final-validation.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/popup-sales-final-validation.phtml', 375, false),array('modifier', 'utf8_encode', 'gebo/quote/popup-sales-final-validation.phtml', 390, false),array('modifier', 'escape', 'gebo/quote/popup-sales-final-validation.phtml', 438, false),array('modifier', 'stripslashes', 'gebo/quote/popup-sales-final-validation.phtml', 438, false),array('modifier', 'upper', 'gebo/quote/popup-sales-final-validation.phtml', 450, false),array('modifier', 'zero_cut', 'gebo/quote/popup-sales-final-validation.phtml', 460, false),)), $this); ?>
<?php echo '
<style type="text/css">
.editor-container{
	padding:0px;
}
.editor-container img{
margin:6px;
}
.highQuote
{
    border: 0 none;
    box-shadow: none;
    display: inline-block;    
	font-family: pt sans;
    font-size: 18px;
    text-align: right;
	color: #000;
	margin-top: -5px;
}
.splashy-documents
{
top:3px;
}
a.overview-tab {
    background: none repeat scroll 0 0 #95bcf2 !important;
    font-weight: 600;
}
a.details-tab {
    background: none repeat scroll 0 0 #d9a6a6 !important;
    font-weight: 600;
}
</style>
<script language="javascript">
//user turnover for a mission
function fnCalUserTurnover(mission_id,offer_price,number_writers)
{
	offer_price=offer_price.replace(",",".");
	var userOffer=offer_price*number_writers;
	
	$("#user_ca_"+mission_id).val(userOffer);	
	
	fncalculateAutoTotal(); //calculate cost automatically
}

//package selection for a mission
function updatepackage(mission_id,package_name)
{
	var margin_percentage=0;
	if(package_name==\'lead\')
			margin_percentage=60;
	else if(package_name==\'link\')
			margin_percentage=30;
	else if(package_name==\'team\')
			margin_percentage=50;	
			
	if(package_name==\'team\')
	{
		$("#other_details_team_"+mission_id).show();
		$("#other_details_user_"+mission_id).hide();
		$("#ca_thead_user_"+mission_id).hide();		
		$("#turnover_"+mission_id).css("text-decoration","none");
		$("#margin_percentage_"+mission_id).prop("readonly",false);	
	}
	else if(package_name==\'user\')
	{
		$("#other_details_team_"+mission_id).hide();
		$("#other_details_user_"+mission_id).show();
		$("#ca_thead_user_"+mission_id).show();
		$("#turnover_"+mission_id).css("text-decoration","line-through");
		$("#margin_percentage_"+mission_id).prop("readonly",true);
	}
	else
	{
		$("#other_details_team_"+mission_id).hide();
		$("#other_details_user_"+mission_id).hide();
		$("#ca_thead_user_"+mission_id).hide();
		$("#turnover_"+mission_id).css("text-decoration","none");
		$("#margin_percentage_"+mission_id).prop("readonly",false);	
	}
	
	
	margin_percentage=margin_percentage.toFixed(2);
	
	$("#margin_percentage_"+mission_id).val(margin_percentage);
	
	fncalculateAutoTotal();//calculate cost automatically
	
	if(package_name==\'team\')
	{
		var mission_turnover=parseFloat($("#turnover_"+mission_id).val().replace(",","."));
		var team_fee=parseFloat($("#team_fee_"+mission_id).val().replace(",","."));
		var team_ca=(mission_turnover+team_fee).toFixed(2);		
		$("#team_ca_"+mission_id).val(team_ca);
		
		fncalculateAutoTotal();//calculate cost automatically
	}	
}

//Apply global package to a quote
function quoteupdatepackage(package_name)
{
	$("[id^=package_]" ).each(function(z) {
		var divDetails=$(this).attr(\'id\');
		divDetails=divDetails.split("_");
		var mission_id=divDetails[1];
		$("#package_"+mission_id).val(package_name);
		
		//Updating all mission packages
		updatepackage(mission_id,package_name);		
		
	});
}

$(document).ready(function(){
	
	//added to show popover in popup
	$(".pop_over").popover({trigger: \'hover\'});
	
	//select chosen
	$("#quote_package").chosen({ allow_single_deselect: false,search_contains: true});
	//$("[id^=package_]").chosen({ allow_single_deselect: false,search_contains: true});
	
	
	fncalculateAutoTotal();//calculate cost automatically
	
	//exclude seo missions from the final margin
	$("[id^=smission_close_]").live(\'click\', function() {
		var DivId = $(this).attr(\'id\');			
		var parentDiv=$(this).parents("div:eq(3)").attr(\'id\');
		//alert(parentDiv);
		var mission_identifier=$(this).attr(\'rel\');		
		var	quote_id=$("#quote_id").val();		
		
		if(!mission_identifier)
		{
			//if($("[id^=seo_mission_]").size()>1)					
				$("#"+parentDiv).remove();
				fncalculateAutoTotal();//calculate cost automatically
		}	
		else
		{	
			smoke.confirm("Souhaitez-vous vraiment supprimer cette mission seo du devis?",function(e){
				if (e)
				{
					$("#"+parentDiv).html(\'<center><img alt="" src="/BO/theme/gebo/img/ajax_loader.gif"> Suppression de cette mission seo devis... </center>\');
					ajaxSEOMissionUpdate(quote_id,mission_identifier,parentDiv,\'\');
					fncalculateAutoTotal();//calculate cost automatically
				}
				else
				{
					return false;
				}
			});				
		}	
			
	});	
	
	//exclude Tech missions from the final margin
	
	$("[id^=tmission_close_]").live(\'click\', function() {
		var DivId = $(this).attr(\'id\');			
		var parentDiv=$(this).parents("div:eq(3)").attr(\'id\');
		//alert(parentDiv);
		var mission_identifier=$(this).attr(\'rel\');		
		var	quote_id=$("#quote_id").val();				
		if(!mission_identifier)
		{
			//if($("[id^=seo_mission_]").size()>1)					
				$("#"+parentDiv).remove();
				fncalculateAutoTotal();//calculate cost automatically
		}	
		else
		{	
			smoke.confirm("Do you want to remove this tech mission quote?",function(e){
				if (e)
				{
					$("#"+parentDiv).html(\'<center><img alt="" src="/BO/theme/gebo/img/ajax_loader.gif"> Suppression de cette mission tech devis... </center>\');
					ajaxTECHMissionUpdate(quote_id,mission_identifier,parentDiv,\'\');
					fncalculateAutoTotal();//calculate cost automatically
				}
				else
				{
					return false;
				}
			});				
		}	
			
	});
	
	$("#delivery_time_calc_modal").on(\'hidden\', function() {
		//alert(\'test\');
		$(this).removeData("modal");
		$("#delivery_time_calc_modal .modal-body").html(\'\');
	});


});

//calculate total staff,total internal cost and total delivery
function fnCalculateMissionTime()
{
		
	var total_delivery_time=0;		
	
	//calculating total delivery time
	total_delivery_time=0;
	$("[id^=mission_length_]" ).each(function(z) {
		var deliveryTime=parseFloat($(this).val());
		
		var time_id = $(this).attr(\'id\');
		var time_split=time_id.split("_");
		var time_option=\'mission_length_option_\'+time_split[2];
		var delivery_option=$("#"+time_option).val();
		if(isNaN(deliveryTime))
			deliveryTime=0;
		if(delivery_option==\'hours\')
		{
			deliveryTime=deliveryTime/24;
			deliveryTime=deliveryTime.toFixed(2);
		}	
		if(deliveryTime>total_delivery_time)	
		total_delivery_time=deliveryTime;
	});	
	$("#total_mission_length").val(total_delivery_time);
	
	
}

//calculate total internal cost and total delivery
function fnCalTotalCosts(mission_id,margin_percentage)
{
	var total_price=0;
	var total_internalcost=0;
	var total_unitprice=0;
	
	var volume=parseFloat($("#volume_"+mission_id).text().replace(",","."));
	var internalcost=parseFloat($("#internal_cost_"+mission_id).val().replace(",","."));
	
	var unit_price=(internalcost/(1-margin_percentage/100));
	unit_price=unit_price.toFixed(2);	
	
	var turnover=(volume*unit_price).toFixed(2);
		
	var turnover_text=turnover.replace(".",",");
	var unit_price_text=unit_price.replace(".",",");
	
	//alert(internalcost+\'--\'+volume+\'--\'+margin_percentage+\'--\'+unit_price);
	$("#unit_price_"+mission_id).val(unit_price_text);
	$("#turnover_"+mission_id).val(turnover_text);
	
	//total price
	$("[id^=turnover_]" ).each(function(z) {
		//Added w.r.t package
		var tid = $(this).attr(\'id\');
		var tids=tid.split("_");
		
		var tmission_id=tids[1];
		var tpackage=$("#package_"+tmission_id).val();
		if(tpackage==\'user\') 
		{
			var missionPrice=parseFloat($("#user_ca_"+tmission_id).val().replace(",","."));
		}
		else if(tpackage==\'team\') 
		{
			var mission_turnover=parseFloat($("#turnover_"+tmission_id).val().replace(",","."));
			var team_fee=parseFloat($("#team_fee_"+tmission_id).val().replace(",","."));
			var missionPrice=(mission_turnover+team_fee);
			$("#team_ca_"+tmission_id).val(missionPrice.toFixed(2));
		}
		else
		{//END
			var missionPrice=parseFloat($(this).val().replace(",","."));
		}
		
		
		if(isNaN(missionPrice))
			missionPrice=0;
		total_price=total_price+missionPrice;
		
	});
	var total_price_text=total_price.toFixed(2);	
	total_price_text=total_price_text.replace(".",",");
	$("#total_price").text(total_price_text);
	
	//over all margin calculations
	
	$("[id^=unit_price_]" ).each(function(z) {     //unit price total
		var unitPrice=parseFloat($(this).val().replace(",","."));
		if(isNaN(unitPrice))
			unitPrice=0;
		total_unitprice=total_unitprice+unitPrice;
		
	});
	
	$("[id^=internal_cost_]" ).each(function(z) { //internal cost total
		var internalPrice=parseFloat($(this).val().replace(",","."));
		if(isNaN(internalPrice))
			internalPrice=0;
		total_internalcost=total_internalcost+internalPrice;
		
	});
	//alert(total_internalcost+\'--\'+total_unitprice);
	var total_margin=(100-(total_internalcost/total_unitprice)*100).toFixed(2);
	$("#total_margin").val(total_margin);

}

function fnChangeAllMargins(margin_percentage)
{	
	margin_percentage=margin_percentage.replace(",",".");
	if(isNaN(margin_percentage))
			margin_percentage=0;
	//chage prices of all missions w.r.t total margin
	$("[id^=margin_percentage_]" ).each(function(z) {
		var divDetails=$(this).attr(\'id\');
		divDetails=divDetails.split("_");
		var mission_id=divDetails[2];			
		var percentage=margin_percentage;
		percentage=parseFloat(percentage);
		$(this).val(percentage);
		fnCalTotalCosts(mission_id,percentage);		
	});
	$("#total_margin").val(margin_percentage);

}

function fncalculateAutoTotal()
{
	$("[id^=margin_percentage_]" ).each(function(z) {
		var divDetails=$(this).attr(\'id\');
		divDetails=divDetails.split("_");
		var mission_id=divDetails[2];			
		var percentage=parseFloat($(this).val().replace(",","."));
		fnCalTotalCosts(mission_id,percentage);		
	});
}

/** ajax function to update seo mission include_final status**/
function ajaxSEOMissionUpdate(quote_id,mission_identifier,divid,last)
{
        var target_page = "/quote/delete-quote-mission?type=includes_update&quote_id="+quote_id+"&mission_identifier="+mission_identifier;
		//alert(target_page);	
		$.post(target_page, function(data){					
				//alert(data);
				sleep(2000);
				$("#"+divid).remove();
				if(last==\'final\')
					location.reload();
			});
}


/** ajax function to update tech mission include_final status**/
function ajaxTECHMissionUpdate(quote_id,mission_identifier,divid,last)
{
        var target_page = "/quote/delete-quote-mission?mission_type=tech&type=includes_update&quote_id="+quote_id+"&mission_identifier="+mission_identifier;
		//alert(target_page);	
		$.post(target_page, function(data){					
				//alert(data);
				sleep(2000);
				$("#"+divid).remove();
				if(last==\'final\')
					location.reload();
			});
}



</script>

'; ?>


<div class="row-fluid">    
	<div class="span12">		
		<?php if (count($this->_tpl_vars['quoteDetails']) > 0): ?>
			<?php $_from = $this->_tpl_vars['quoteDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quote'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quote']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quote']):
        $this->_foreach['quote']['iteration']++;
?>								
				<input type="hidden" id="quote_id" name="quote_id" value="<?php echo $this->_tpl_vars['quote']['identifier']; ?>
">
				<div class="row-fluid">
					<?php if (count($this->_tpl_vars['quote']['mission_details']) > 0): ?>
						<?php $_from = $this->_tpl_vars['quote']['mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>							
							<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>	
							<div class="row-fluid" id="mission_details_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">	
								<div class="mission-details">								
									<?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>
										<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
											<div class="new-mission-product">
										<?php else: ?>
											<div class="prod-mission-product">										
										<?php endif; ?>
										<?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 					<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_source_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 in <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_dest_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

										<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
											<label class="label label-warning">Mission added</label>	
										<?php endif; ?>	
											<?php if ($this->_tpl_vars['mission']['misson_user_type'] == 'seo'): ?>
												<label class="label label-warning">Seo Proposal</label>
											<?php endif; ?>	
											<?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit' || $this->_tpl_vars['quote']['version'] > 1): ?>
												<div class="pull-right">												
																									</div>
											<?php endif; ?>										
										</div>	
									<?php else: ?>
										<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
											<div class="new-mission-product">
										<?php else: ?>	
											<div class="prod-mission-product">
										<?php endif; ?>	
										<?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
  in
										<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_source_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

										<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
											<label class="label label-warning">Mission added</label>	
										<?php endif; ?>
											<?php if ($this->_tpl_vars['mission']['misson_user_type'] == 'seo'): ?>
												<label class="label label-warning">Seo Proposal</label>
											<?php endif; ?>	
											<?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit' || $this->_tpl_vars['quote']['version'] > 1): ?>
												<div class="pull-right">												
																									</div>
											<?php endif; ?>
										</div>	
									<?php endif; ?>
									<input name="mission_type_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" type="hidden" value="<?php echo $this->_tpl_vars['mission']['product']; ?>
">
									<table class="table">										
										<tr>
											<th style="width:7%">Volume</th>
											<th style="width:12%">Delivery timing</th>
											<th style="width:21%">Selling price/article</th>
											<th style="width:22%">Turnover <span <?php if ($this->_tpl_vars['mission']['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="ca_thead_user_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">th&eacute;orique</span></th>
											<th style="width:15%">Internal cost</th>
											<th style="width:15%">Margin</th>
											<th style="width:11%">Pack</th>											
										</tr>
										<tr class="misson-details-text">
											<td>
												<?php if ($this->_tpl_vars['mission']['volume_difference'] == 'yes'): ?>
													<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['volume_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i>
												<?php endif; ?>
													<span id="volume_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
"><?php echo $this->_tpl_vars['mission']['volume']; ?>
</span>
												<?php if ($this->_tpl_vars['mission']['volume_difference'] == 'yes'): ?>
													</span>
												<?php endif; ?>	
											</td>
											<td>
												<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>
													<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i>
												<?php endif; ?>
												<input  id="mission_length_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="mission_length_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
" class="span4 <?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>version-change<?php endif; ?> highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>">
												<?php if ($this->_tpl_vars['mission']['mission_length_option'] == 'days'): ?> JOURS<?php else: ?>  <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_option'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
 <?php endif; ?>
												<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>
													</span>
												<?php endif; ?>
													
											</td>
											<td>
												<?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>
													<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
												<?php endif; ?>	
													<input  id="unit_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="unit_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span4 <?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>version-change<?php endif; ?> highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
												<?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>
													</span>
												<?php endif; ?>
											</td>
											<td>
												<?php if ($this->_tpl_vars['mission']['turnover_difference'] == 'yes'): ?>
													<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['turnover_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
												<?php endif; ?>
													<input  id="turnover_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="turnover_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span5 <?php if ($this->_tpl_vars['mission']['turnover_difference'] == 'yes'): ?>version-change<?php endif; ?> highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['mission']['turnover_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?><?php if ($this->_tpl_vars['mission']['package'] == 'user'): ?>text-decoration: line-through;<?php endif; ?>"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
												<?php if ($this->_tpl_vars['mission']['turnover_difference'] == 'yes'): ?>
													</span>
												<?php endif; ?>
											</td>
											<td>
												<?php if ($this->_tpl_vars['mission']['internal_cost_difference'] == 'yes'): ?>
													<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['internal_cost_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
												<?php endif; ?>
												<input  id="internal_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="internal_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['internal_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span4 <?php if ($this->_tpl_vars['mission']['internal_cost_difference'] == 'yes'): ?>version-change<?php endif; ?>  highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['mission']['internal_cost_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <br>												
												<?php if ($this->_tpl_vars['mission']['internal_cost_difference'] == 'yes'): ?>
													</span>
												<?php endif; ?>
												<a data-placement="top" data-html="true" data-original-title="Co&ucirc;t interne" data-content="<?php echo $this->_tpl_vars['mission']['internalcost_details']; ?>
" class="pop_over" href="#">Details</a>
											</td>
											<td>
												<?php if ($this->_tpl_vars['mission']['margin_difference'] == 'yes'): ?>
													<div class="span2">
														<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['margin_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
													</div>	
												<?php endif; ?>
												<div <?php if ($this->_tpl_vars['mission']['margin_difference'] == 'yes'): ?>class="span10"<?php else: ?>class="span12"<?php endif; ?>>
													<div class="input-append" <?php if ($this->_tpl_vars['mission']['margin_difference'] == 'yes'): ?> style="color:#b45f00;"<?php endif; ?>>
														<input type="text" class="span5" size="16" id="margin_percentage_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="margin_percentage_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" onkeyup="fnCalTotalCosts('<?php echo $this->_tpl_vars['mission']['identifier']; ?>
',this.value);" value="<?php echo $this->_tpl_vars['mission']['margin_percentage']; ?>
" <?php if ($this->_tpl_vars['mission']['margin_difference'] == 'yes'): ?> style="color:#b45f00;"<?php endif; ?> disabled><span class="add-on">%</span>
													</div>													
												</div>
											</td>
											<td>
												<select name="package_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="package_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" class="span12 validate[required]" onchange="updatepackage('<?php echo $this->_tpl_vars['mission']['identifier']; ?>
',this.value);" disabled>
													<option value="lead" <?php if ($this->_tpl_vars['mission']['package'] == 'lead'): ?> selected<?php endif; ?> >Lead</option>
													<option value="team" <?php if ($this->_tpl_vars['mission']['package'] == 'team'): ?> selected<?php endif; ?>>Team</option>
													<option value="link" <?php if ($this->_tpl_vars['mission']['package'] == 'link'): ?> selected<?php endif; ?>>Link</option>
													<option value="user" <?php if ($this->_tpl_vars['mission']['package'] == 'user'): ?> selected<?php endif; ?>>User</option>
												</select>
											</td>
										</tr>
										<tr class="misson-details-text" <?php if ($this->_tpl_vars['mission']['package'] != 'team'): ?>style="display:none"<?php endif; ?> id="other_details_team_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
											<td colspan="2">
												<span style=" display: block;padding-top: 0px;">Nb of profiles : <?php echo $this->_tpl_vars['mission']['required_writes']; ?>
</span>
											</td>
											<td colspan="2">
												soit <input type="text" class="span2" id="team_packs_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="team_packs_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo $this->_tpl_vars['mission']['team_packs']; ?>
" disabled> packs :		
												<div class="input-append">
													<input type="text" class="span5" id="team_fee_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="team_fee_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['team_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fncalculateAutoTotal();" disabled><span class="add-on">&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</span>
												</div>
											</td>
											<td colspan="3">
												<span style=" display: block;padding-top: 0px;">
													Total turnover : 
													<input  id="team_ca_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="team_ca_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['team_package_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span5  highQuote" style="background:#fff;cursor:text;"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
												</span>	
											</td>
										</tr>
										<tr class="misson-details-text" <?php if ($this->_tpl_vars['mission']['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="other_details_user_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
											<td colspan="2">
												<span style=" display: block;padding-top: 0px;">Nb of profiles : <?php echo $this->_tpl_vars['mission']['required_writes']; ?>
</span>
											</td>
											<td colspan="2">Fees offre user : 
												<div class="input-append">
													<input type="text" class="span5" id="user_fee_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="user_fee_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
"  onkeyup="fnCalUserTurnover('<?php echo $this->_tpl_vars['mission']['identifier']; ?>
',this.value,<?php echo $this->_tpl_vars['mission']['required_writes']; ?>
);"disabled><span class="add-on">&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</span>
												</div>	
											</td>
											<td colspan="3">
												<span style=" display: block;padding-top: 0px;">
													Turnover : 
													<input  id="user_ca_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="user_ca_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['user_package_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span5  highQuote" style="background:#fff;cursor:text;"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
												</span>	
											</td>											
										</tr>
									</table>
								</div>	
							</div>	
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>						
					<!--Tech mission Details-->
					<?php if (count($this->_tpl_vars['quote']['tech_mission_details']) > 0): ?>
						<?php $_from = $this->_tpl_vars['quote']['tech_mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmission']):
        $this->_foreach['tmission']['iteration']++;
?>							
							<?php $this->assign('ms_index', ($this->_foreach['tmission']['iteration']-1)+1); ?>	
							<div class="row-fluid" id="mission_details_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
">	
								<input type="hidden" name="tech_mission_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="1">
								<div class="mission-details">
										<?php if (count($this->_tpl_vars['tmission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
											<div class="new-mission-product">
										<?php else: ?>	
											<div class="prod-mission-product">
										<?php endif; ?>	
										<?php echo $this->_tpl_vars['tmission']['title']; ?>

										<?php if (count($this->_tpl_vars['tmission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
											<label class="label label-warning">Mission added</label>	
										<?php endif; ?>
										
										<label class="label label-warning">Proposition tech</label>
										<div class="pull-right">												
																					</div>
										
										</div>	
																			
									<table class="table">										
										<tr>
											<th style="width:7%">Volume</th>
											<th style="width:12%">Delivery timing</th>
											<th style="width:21%">Selling price / article</th>
											<th style="width:22%">Turonver <span <?php if ($this->_tpl_vars['mission']['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="ca_thead_user_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">th&eacute;orique</span></th>
											<th style="width:15%">Internal cost</th>
											<th style="width:15%">Margin</th>
											<th style="width:11%">Pack</th>											
										</tr>
										<tr class="misson-details-text">
											<td>
												<?php if ($this->_tpl_vars['tmission']['volume_difference'] == 'yes'): ?>
													<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['volume_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i>
												<?php endif; ?>
													<span id="volume_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
"><?php echo $this->_tpl_vars['tmission']['volume']; ?>
</span>
												<?php if ($this->_tpl_vars['tmission']['volume_difference'] == 'yes'): ?>
													</span>
												<?php endif; ?>	
											</td>
											<td>
												<?php if ($this->_tpl_vars['tmission']['mission_length_difference'] == 'yes'): ?>
													<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i>
												<?php endif; ?>
												<?php echo $this->_tpl_vars['tmission']['delivery_time']; ?>
 <?php if ($this->_tpl_vars['tmission']['delivery_option'] == 'days'): ?>JOURS<?php else: ?>  <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['delivery_option'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
 <?php endif; ?>
												<?php if ($this->_tpl_vars['tmission']['mission_length_difference'] == 'yes'): ?>
													</span>
												<?php endif; ?>
											</td>
											<td>
												<?php if ($this->_tpl_vars['tmission']['unit_price_difference'] == 'yes'): ?>
													<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
												<?php endif; ?>	
													<input  id="unit_price_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="unit_price_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span4 <?php if ($this->_tpl_vars['tmission']['unit_price_difference'] == 'yes'): ?>version-change<?php endif; ?> highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['tmission']['unit_price_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
												<?php if ($this->_tpl_vars['tmission']['unit_price_difference'] == 'yes'): ?>
													</span>
												<?php endif; ?>
											</td>
											<td>
												<?php if ($this->_tpl_vars['tmission']['turnover_difference'] == 'yes'): ?>
													<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['turnover_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
												<?php endif; ?>
													<input  id="turnover_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="turnover_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span5 <?php if ($this->_tpl_vars['tmission']['turnover_difference'] == 'yes'): ?>version-change<?php endif; ?> highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['tmission']['turnover_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?><?php if ($this->_tpl_vars['tmission']['package'] == 'user'): ?>text-decoration: line-through;<?php endif; ?>"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
												<?php if ($this->_tpl_vars['tmission']['turnover_difference'] == 'yes'): ?>
													</span>
												<?php endif; ?>
											</td>
											<td>
												<?php if ($this->_tpl_vars['tmission']['internal_cost_difference'] == 'yes'): ?>
													<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['internal_cost_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
												<?php endif; ?>
												<input  id="internal_cost_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="internal_cost_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['internal_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span4 <?php if ($this->_tpl_vars['tmission']['internal_cost_difference'] == 'yes'): ?>version-change<?php endif; ?>  highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['tmission']['internal_cost_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <br>												
												<?php if ($this->_tpl_vars['tmission']['internal_cost_difference'] == 'yes'): ?>
													</span>
												<?php endif; ?>
											</td>
											<td>
												<?php if ($this->_tpl_vars['tmission']['margin_difference'] == 'yes'): ?>
													<div class="span2">
														<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['margin_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
													</div>	
												<?php endif; ?>
												<div <?php if ($this->_tpl_vars['tmission']['margin_difference'] == 'yes'): ?>class="span10"<?php else: ?>class="span12"<?php endif; ?>>
													<div class="input-append" <?php if ($this->_tpl_vars['tmission']['margin_difference'] == 'yes'): ?> style="color:#b45f00;"<?php endif; ?>>
														<input type="text" class="span5" size="16" id="margin_percentage_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="margin_percentage_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" onkeyup="fnCalTotalCosts('<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
',this.value);" value="<?php echo $this->_tpl_vars['tmission']['margin_percentage']; ?>
" <?php if ($this->_tpl_vars['tmission']['margin_difference'] == 'yes'): ?> style="color:#b45f00;"<?php endif; ?> disabled><span class="add-on">%</span>
													</div>													
												</div>
											</td>
											<td>
												<select name="package_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" id="package_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" class="span12 validate[required]" onchange="updatepackage('<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
',this.value);" disabled>
													<option value="lead" <?php if ($this->_tpl_vars['tmission']['package'] == 'lead'): ?> selected<?php endif; ?> >Lead</option>
													<option value="team" <?php if ($this->_tpl_vars['tmission']['package'] == 'team'): ?> selected<?php endif; ?>>Team</option>
													<option value="link" <?php if ($this->_tpl_vars['tmission']['package'] == 'link'): ?> selected<?php endif; ?>>Link</option>
													<option value="user" <?php if ($this->_tpl_vars['tmission']['package'] == 'user'): ?> selected<?php endif; ?>>User</option>
												</select>
											</td>
										</tr>
										<tr class="misson-details-text" <?php if ($this->_tpl_vars['tmission']['package'] != 'team'): ?>style="display:none"<?php endif; ?> id="other_details_team_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
">
											<td colspan="2">
												<span style=" display: block;padding-top: 0px;">Nb of profiles : <?php echo $this->_tpl_vars['tmission']['required_writes']; ?>
</span>
											</td>
											<td colspan="2">
												soit <input type="text" class="span2" id="team_packs_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="team_packs_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo $this->_tpl_vars['tmission']['team_packs']; ?>
" disabled> packs:
												<div class="input-append">
													<input type="text" class="span5" id="team_fee_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="team_fee_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['team_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fncalculateAutoTotal();" disabled><span class="add-on">&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</span>
												</div>
											</td>
											<td colspan="3">
												<span style=" display: block;padding-top: 0px;">
													Total turnover : 
													<input  id="team_ca_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="team_ca_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['team_package_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span5  highQuote" style="background:#fff;cursor:text;"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
												</span>	
											</td>
										</tr>
										<tr class="misson-details-text" <?php if ($this->_tpl_vars['tmission']['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="other_details_user_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
">
											<td colspan="2">
												<span style=" display: block;padding-top: 0px;">Nb of profiles : <?php echo $this->_tpl_vars['tmission']['required_writes']; ?>
</span>
											</td>
											<td colspan="2">Fees offre user : 
												<div class="input-append">
													<input type="text" class="span5" id="user_fee_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="user_fee_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
"  onkeyup="fnCalUserTurnover('<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
',this.value,<?php echo $this->_tpl_vars['tmission']['required_writes']; ?>
);"disabled><span class="add-on">&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</span>
												</div>	
											</td>
											<td colspan="3">
												<span style=" display: block;padding-top: 0px;">
													Turnover : 
													<input  id="user_ca_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="user_ca_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['user_package_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span5  highQuote" style="background:#fff;cursor:text;"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
												</span>	
											</td>											
										</tr>
									</table>
								</div>	
							</div>	
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					<!--Deleted Missions-->
					<?php if (count($this->_tpl_vars['quote']['deletedMissionVersions']) > 0): ?>						
						<?php $_from = $this->_tpl_vars['quote']['deletedMissionVersions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['dmisson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['dmisson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dmission']):
        $this->_foreach['dmisson']['iteration']++;
?>							
							<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>	
							<div class="row-fluid" id="mission_details_<?php echo $this->_tpl_vars['dmission']['identifier']; ?>
">	
								<div class="mission-details">								
									<?php if ($this->_tpl_vars['dmission']['product'] == 'translation'): ?>
										<div class="delete-mission-product">
										<?php echo $this->_tpl_vars['dmission']['product_name']; ?>
 <?php echo $this->_tpl_vars['dmission']['product_type_name']; ?>
 					<?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['language_source_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 to <?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['language_dest_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

										 
										 <label class="label">Mission deleted</label>	
										 
										<?php if ($this->_tpl_vars['dmission']['misson_user_type'] == 'seo'): ?>
											<label class="label label-warning">SEO proposal</label>
										<?php endif; ?>
										</div>	
									<?php else: ?>
										<div class="delete-mission-product">	
										<?php echo $this->_tpl_vars['dmission']['product_name']; ?>
 <?php echo $this->_tpl_vars['dmission']['product_type_name']; ?>
  in
										<?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['language_source_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

										 
										<label class="label">Mission deleted</label>
										
										<?php if ($this->_tpl_vars['dmission']['misson_user_type'] == 'seo'): ?>
											<label class="label label-warning">SEO proposal</label><?php endif; ?>
										</div>	
									<?php endif; ?>									
									<table class="table">
										<tr>
											<th style="width:7%">Volume</th>
											<th style="width:12%">Delivery timing</th>
											<th style="width:21%">Selling price / article</th>
											<th style="width:22%">CA <span <?php if ($this->_tpl_vars['dmission']['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="ca_thead_user_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">th&eacute;orique</span></th>
											<th style="width:15%">Internal cost</th>
											<th style="width:15%">Margin</th>
											<th style="width:11%">Pack</th>
										</tr>
										<tr class="misson-details-text">
											<td><?php echo $this->_tpl_vars['dmission']['volume']; ?>
</td>
											<td><?php echo $this->_tpl_vars['dmission']['mission_length']; ?>
 <?php if ($this->_tpl_vars['dmission']['mission_length_option'] == 'days'): ?> JOURS<?php else: ?>  <?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['mission_length_option'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
 <?php endif; ?></td>
											<td><?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</td>
											<td><?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</td>
											<td><?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['internal_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<br>
												<a data-placement="top" data-html="true" data-original-title="Co&ucirc;t interne" data-content="<?php echo $this->_tpl_vars['dmission']['internalcost_details']; ?>
" class="pop_over" href="#">details</a>
											</td>
											<td><?php echo $this->_tpl_vars['dmission']['margin_percentage']; ?>
 %</td>
											<td><?php echo $this->_tpl_vars['dmission']['package']; ?>
</td>
										</tr>
									</table>
								</div>
							</div>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					<div class="row-fluid">
						<div class="span12 pull-right">
							<table cellpadding="10" class="misson-details-text" style="width:100%">
								<tr>
									<td class="alignright">Total Turnover</td>
									<td style="width:25%">
										<?php if ($this->_tpl_vars['quote']['final_turnover_difference'] == 'yes'): ?>
											<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote']['final_turnover_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
										<?php endif; ?>
											<b><span id="total_price"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['total_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</b>
										<?php if ($this->_tpl_vars['quote']['final_turnover_difference'] == 'yes'): ?>
											</span>
										<?php endif; ?>	
									</td>
								</tr>
								<tr>
									<td class="alignright" style="margin-top: 6px;">Margin</td>
									<td>
										<!--<span id="total_margin"><?php echo $this->_tpl_vars['quote']['over_all_margin']; ?>
</span>%-->
										<?php if ($this->_tpl_vars['quote']['final_margin_difference'] == 'yes'): ?>
											<div class="span1">
												<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote']['final_margin_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
											</div>	
										<?php endif; ?>
										<div <?php if ($this->_tpl_vars['quote']['final_margin_difference'] == 'yes'): ?>class="span11"<?php else: ?>class="span12"<?php endif; ?>>
												<div class="input-append" <?php if ($this->_tpl_vars['quote']['final_margin_difference'] == 'yes'): ?> style="color:#b45f00;"<?php endif; ?>>
												<input type="text" id="total_margin" name="total_margin" class="span5" size="16" onkeyup="fnChangeAllMargins(this.value);" value="<?php echo $this->_tpl_vars['quote']['over_all_margin']; ?>
"<?php if ($this->_tpl_vars['quote']['final_margin_difference'] == 'yes'): ?> style="color:#b45f00;"<?php endif; ?> disabled><span class="add-on">%</span>
											</div>
										</div>
										
									</td>
								</tr>									
								<tr>
									<td class="alignright" style="margin-top: -6px;">Delay</td>
									<td>
										<?php if ($this->_tpl_vars['quote']['final_mission_length_difference'] == 'yes'): ?>
										<div class="span1">
											<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote']['final_mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
										</div>	
										<?php endif; ?>
										<div class="span9">
											<input type="text" id="total_mission_length" value="<?php echo $this->_tpl_vars['quote']['total_mission_length']; ?>
" name="total_mission_length" class="span5" style="margin-top: -10px;<?php if ($this->_tpl_vars['quote']['final_mission_length_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>" readonly>
											<input type="hidden" name="total_time_option" id="total_time_option" value="<?php echo $this->_tpl_vars['quote']['final_mission_length_option']; ?>
">
											<select disabled name="total_time_option" id="total_time_option" class="span5" style="margin-top: -10px;;<?php if ($this->_tpl_vars['quote']['final_mission_length_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>">					
												<option value="days" <?php if ($this->_tpl_vars['quote']['final_mission_length_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
												<option value="hours" <?php if ($this->_tpl_vars['quote']['final_mission_length_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>
											</select>
										</div>	
									</td>
								</tr>
								<?php if ($this->_tpl_vars['quote']['prod_extra_info'] == 'yes'): ?>
									<tr>
										<td class="alignright" style="margin-top: -6px;">Maximum days to launch the mission</td>
										<td>
											<div class="span4">
												<input type="text" id="prod_extra_launch_days" value="<?php echo $this->_tpl_vars['quote']['prod_extra_launch_days']; ?>
" name="prod_extra_launch_days" class="span12" style="margin-top: -10px;">
											</div>	
											 <div class="span4" style="margin-top: -5px;"> Days</div>
										</td>
									</tr>
								<?php endif; ?>
							</table>
						</div>	
					</div>					
				</div>		
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>	
	</div>
</div>