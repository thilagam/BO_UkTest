<?php /* Smarty version 2.6.19, created on 2015-07-03 14:56:34
         compiled from gebo/quote/select-quote-mission.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/select-quote-mission.phtml', 234, false),array('modifier', 'zero_cut', 'gebo/quote/select-quote-mission.phtml', 295, false),array('modifier', 'date_format', 'gebo/quote/select-quote-mission.phtml', 365, false),array('function', 'math', 'gebo/quote/select-quote-mission.phtml', 275, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script> 

<script language="javascript">

$(document).ready(function() {

	$("#mission_selection").validationEngine();
	
	$(\'[id^=overview_missions_]\').each(function () {
		if(this.checked)
		{
			var DivId = $(this).attr(\'id\');
			var mission_ids=DivId.split("_");
			var mission_id=mission_ids[2];
			var index_id=mission_ids[3];
			
			var checkName=$(this).attr(\'name\');		
			var nameIndexes=checkName.split("_");
			var nameIndex=nameIndexes[2].replace("[]",\'\');
			
			var current_suggested_price=parseFloat($("#price_info_"+nameIndex).text());	
			if(isNaN(current_suggested_price))	
				current_suggested_price=0;
			var selected_price=parseFloat($(this).attr(\'rel\'));
			var currency=$("#currency_type_"+nameIndex).val();	
					
			//calculating current price and selected price and assiging to suggested price
			var suggested_price=parseFloat(current_suggested_price+selected_price);
			$("#price_info_"+nameIndex).text(suggested_price);
			
			$("#currency_info_"+nameIndex).html(\' &\'+currency+\';\');
			
			$("#mission_ca_"+nameIndex).val(suggested_price);//mission total
			
			//total suggested price
			var total_suggested_price=parseFloat($("#total_suggested_price").text());	
			if(isNaN(total_suggested_price))	
				total_suggested_price=0;
			else
				total_suggested_price=parseFloat(total_suggested_price);
		
			total_suggested_price=parseFloat(total_suggested_price+selected_price);			
			total_suggested_price=total_suggested_price.toFixed(2);				
			
			$("#total_suggested_price").text(total_suggested_price);
			$("#total_suggested_price_hidden").val(total_suggested_price);			
			$("#total_currency_info").html(\' &\'+currency+\';\');	
			
			//Added w.r.t article in left side
			var mission_volume=parseFloat($("#mission_volume_"+index_id).text());
			var article_price=(suggested_price/mission_volume);
			article_price=article_price.toFixed(2);			
			$("#single_article_price_"+index_id).val(article_price);
			article_price=article_price.replace(".",\',\');
			$("#article_price_"+index_id).text(article_price);
			
			//price per word
			var price_per_word=parseFloat($(this).attr(\'data-price-word\')).toFixed(2);
			price_per_word=price_per_word.replace(".",\',\');
			//alert(price_per_word);
			$("#price_per_word_"+index_id).text(price_per_word);
			
		}	
	 
	 }); 
	
	/** activate icheck plugin **/
	  $(\'input\').iCheck({
		checkboxClass: \'icheckbox_square-blue\',
		radioClass: \'iradio_square-blue\',
		//increaseArea: \'20%\' // optional
	 });  
	 
	 
	 
	
	//toggle all checkboxes of details and overview tabs 
	$(\'input\').on(\'ifChecked\', function(event){
		var DivId = $(this).attr(\'id\');
		var mission_ids=DivId.split("_");
		var mission_id=mission_ids[2];	
		var index_id=mission_ids[3];	
		
		var checkName=$(this).attr(\'name\');		
		var nameIndexes=checkName.split("_");
		var nameIndex=nameIndexes[2].replace("[]",\'\');
		
		var current_suggested_price=parseFloat($("#price_info_"+nameIndex).text());	
		if(isNaN(current_suggested_price))	
			current_suggested_price=0;
		var selected_price=parseFloat($(this).attr(\'rel\'));
		var currency=$("#currency_type_"+nameIndex).val();	
		
		//calculating current price and selected price and assiging to suggested price
		var suggested_price=parseFloat(current_suggested_price+selected_price);
		
		$("#price_info_"+nameIndex).text(suggested_price);
		$("#currency_info_"+nameIndex).html(\' &\'+currency+\';\');
		
		$("#mission_ca_"+nameIndex).val(suggested_price);//mission total
		
		//total suggested price
		var total_suggested_price=parseFloat($("#total_suggested_price").text());			
		if(isNaN(total_suggested_price))	
			total_suggested_price=0;
		else
		total_suggested_price=parseFloat(total_suggested_price);
		
		total_suggested_price=parseFloat(total_suggested_price+selected_price);
		
		total_suggested_price=total_suggested_price.toFixed(2);
		
		$("#total_suggested_price").text(total_suggested_price);
		$("#total_suggested_price_hidden").val(total_suggested_price);	
		$("#total_currency_info").html(\' &\'+currency+\';\');		
		
		
		//Added w.r.t article in left side
			var mission_volume=parseFloat($("#mission_volume_"+index_id).text());
			var article_price=(suggested_price/mission_volume);
			article_price=article_price.toFixed(2);
			$("#single_article_price_"+index_id).val(article_price);
			article_price=article_price.replace(".",\',\');
			$("#article_price_"+index_id).text(article_price); //for span
			
		//price per word
			var price_per_word=parseFloat($(this).attr(\'data-price-word\')).toFixed(2);
			price_per_word=price_per_word.replace(".",\',\');
			//alert(price_per_word);
			$("#price_per_word_"+index_id).text(price_per_word);
			
		
		if(mission_ids[0]==\'overview\')
		{			
			$(\'#detail_missions_\'+mission_id+\'_\'+index_id).prop(\'checked\', true);
			$(\'#detail_missions_\'+mission_id+\'_\'+index_id).iCheck(\'update\');
		}	
		else	
		{
			$(\'#overview_missions_\'+mission_id+\'_\'+index_id).prop(\'checked\', true);
			$(\'#overview_missions_\'+mission_id+\'_\'+index_id).iCheck(\'update\');
		}	
		
	});
	$(\'input\').on(\'ifUnchecked\', function(event){
		var DivId = $(this).attr(\'id\');
		var mission_ids=DivId.split("_");
		var mission_id=mission_ids[2];
		var index_id=mission_ids[3];
		
		var checkName=$(this).attr(\'name\');		
		var nameIndexes=checkName.split("_");
		var nameIndex=nameIndexes[2].replace("[]",\'\');
		
		var current_suggested_price=parseFloat($("#price_info_"+nameIndex).text());			
		var selected_price=parseFloat($(this).attr(\'rel\'));
		var currency=$("#currency_type_"+nameIndex).val();	
				
		//calculating current price and selected price and assiging to suggested price
		var suggested_price=parseFloat(current_suggested_price-selected_price);
		$("#price_info_"+nameIndex).text(suggested_price);
		$("#currency_info_"+nameIndex).html(\' &\'+currency+\';\');
		
		//total suggested price
		var total_suggested_price=parseFloat($("#total_suggested_price").text());
		if(isNaN(total_suggested_price))	
			total_suggested_price=0;
		else
		total_suggested_price=parseFloat(total_suggested_price);
				
		total_suggested_price=parseFloat(total_suggested_price-selected_price);
		
		total_suggested_price=total_suggested_price.toFixed(2);
		
		$("#total_suggested_price").text(total_suggested_price);
		$("#total_suggested_price_hidden").val(total_suggested_price);	
		$("#total_currency_info").html(\' &\'+currency+\';\');		
		
		if(mission_ids[0]==\'overview\')
		{
			$(\'#detail_missions_\'+mission_id+\'_\'+index_id).prop(\'checked\', false);
			$(\'#detail_missions_\'+mission_id+\'_\'+index_id).iCheck(\'update\');
		}	
		else	
		{
			$(\'#overview_missions_\'+mission_id+\'_\'+index_id).prop(\'checked\', false);
			$(\'#overview_missions_\'+mission_id+\'_\'+index_id).iCheck(\'update\');
		}		
	});
	  
});
</script>

<style type="text/css">
.nav-tabs > li {
width:150px;
text-align:center;
}
.w-box-content .nav-tabs > li > a {
    font-size: 13px;
	opacity:0.5;
	color: #000;
}	
.w-box-content .nav-tabs > li.active > a{
opacity:1;
color: #000;
}
</style>

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
		<form action="/quote/save-selected-mission" method="POST" id="mission_selection">
		<div class="row-fluid">	
			<div class="span12">
				<div class="span12" id="quote_missions">
				<?php if (count($this->_tpl_vars['quote_missions']) > 0): ?>
					<?php $_from = $this->_tpl_vars['quote_missions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>
					<?php $this->assign('gn_index', ($this->_foreach['misson']['iteration']-1)); ?>
					<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>					
					<div class="w-box" id="quote_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
">
						<div class="w-box-header">
							<span id="box_title_<?php echo $this->_tpl_vars['ms_index']; ?>
">Quote - <?php echo $this->_tpl_vars['create_mission']['company_name']; ?>
 - Mission <?php echo $this->_tpl_vars['ms_index']; ?>
</span>
						</div>						
						<div class="w-box-content">
							<div class="tabbable clearfix">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a class="overview-tab" href="#tab1_<?php echo $this->_tpl_vars['ms_index']; ?>
" data-toggle="tab">Overview</a></li>
                                    <li class=""><a class="details-tab" href="#tab2_<?php echo $this->_tpl_vars['ms_index']; ?>
" data-toggle="tab">Details</a></li>                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active  mission-overview" id="tab1_<?php echo $this->_tpl_vars['ms_index']; ?>
">
										<div class="row-fluid">	
											<div class="span4">
											<div class="well">
												<h3><?php echo $this->_tpl_vars['mission']['product_name']; ?>
</h3>
												<div class="mission-info-ov">
												<ul>
													<li><b><?php echo $this->_tpl_vars['mission']['language_name']; ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?> to <?php echo $this->_tpl_vars['mission']['languagedest_name']; ?>
 <?php endif; ?> </b></li>
													<li><b><?php echo $this->_tpl_vars['mission']['producttype_name']; ?>
 <?php if ($this->_tpl_vars['mission']['producttype'] == 'autre'): ?>(<?php echo $this->_tpl_vars['mission']['producttypeother']; ?>
)<?php endif; ?> </b></li>
													<li>Nb of words : <?php echo $this->_tpl_vars['mission']['nb_words']; ?>
 <br/>
													<li>Volume : <span id ="mission_volume_<?php echo $this->_tpl_vars['ms_index']; ?>
"><?php echo $this->_tpl_vars['mission']['volume']; ?>
</span> </li>
													<li>Simulated selling price/<?php echo $this->_tpl_vars['mission']['producttype_name']; ?>
 : <span id ="article_price_<?php echo $this->_tpl_vars['ms_index']; ?>
">0</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</li>
													<li>Price per word(simulated) : <span id ="price_per_word_<?php echo $this->_tpl_vars['ms_index']; ?>
">0</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
													</ul>
												</div>
												</div>
											</div>
											<div class="span8">
												<h2 class="heading">Tariff history</h2> 
												<p class="alert alert-info">Select a mission</p>
												<?php if (count($this->_tpl_vars['mission']['missionDetails']) > 0): ?>
													<?php $_from = $this->_tpl_vars['mission']['missionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['old_misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['old_misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['old_mission']):
        $this->_foreach['old_misson']['iteration']++;
?>														
														<div class="row-fluid">
															<div class="check-mission-block span12">										
																<label>
																	<div class="span2">
																		<input name="overview_missions_<?php echo $this->_tpl_vars['ms_index']; ?>
[]" id="overview_missions_<?php echo $this->_tpl_vars['old_mission']['id']; ?>
_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo $this->_tpl_vars['old_mission']['id']; ?>
" data-price-word="<?php echo smarty_function_math(array('equation' => '(v/y)','v' => $this->_tpl_vars['old_mission']['unit_price'],'y' => $this->_tpl_vars['old_mission']['article_length'],'format' => '%.2f'), $this);?>
" rel="<?php echo smarty_function_math(array('equation' => '(v*(x/y)*z)','v' => $this->_tpl_vars['old_mission']['unit_price'],'x' => $this->_tpl_vars['mission']['nb_words'],'y' => $this->_tpl_vars['old_mission']['article_length'],'z' => $this->_tpl_vars['mission']['volume'],'format' => '%.2f'), $this);?>
" type="radio" class="validate[required]"<?php if ($this->_tpl_vars['old_mission']['id'] == $this->_tpl_vars['select_missions']['missions_selected'][$this->_tpl_vars['gn_index']]): ?> checked <?php endif; ?>>
																		
																	</div>	
																	<div class="span9 mission-info-block">
																		<h3><?php echo $this->_tpl_vars['old_mission']['title']; ?>

																			<?php if ($this->_tpl_vars['old_mission']['simulation'] == 'yes'): ?>
																			<span class="label label-info ">Mission simulated</span><br>
																		<?php endif; ?>
																		</h3>

																		<table class="table mission-table table-bordered table-condensed">
																			<tr>
																				<th>VOLUME</th>
																																								<th>Selling Price</th>
																				<th>Nb of words</th>
																			</tr>
																			<tr class="misson-details-text">
																				<td><?php echo $this->_tpl_vars['old_mission']['num_of_articles']; ?>
</td>
																																								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</td>
																				<td><?php echo $this->_tpl_vars['old_mission']['article_length']; ?>
</td>
																			</tr>	
																		</table>
																	</div>
																</label>										
															</div>
														</div>
													<?php endforeach; endif; unset($_from); ?>	
												<?php else: ?>
													<h3>No matched missions found</h3>
												<?php endif; ?>		
											</div>
										</div>										 
									</div>
									<div class="tab-pane mission-details" id="tab2_<?php echo $this->_tpl_vars['ms_index']; ?>
">
										<div class="row-fluid">	
											<div class="span9">												
												<div class="mission-info-ov">
													Type : <?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <br/>
													Language : <?php echo $this->_tpl_vars['mission']['language_name']; ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?> to <?php echo $this->_tpl_vars['mission']['languagedest_name']; ?>
 <?php endif; ?> <br/>
													Product : <?php echo $this->_tpl_vars['mission']['producttype_name']; ?>
 <br/>
													Nb of words : <?php echo $this->_tpl_vars['mission']['nb_words']; ?>
 <br/>
													Volume : <?php echo $this->_tpl_vars['mission']['volume']; ?>
<br/>
													
													
												</div>
											</div>
											<div class="span3">	
												<div class="w-box" id="suggested_price_<?php echo $this->_tpl_vars['ms_index']; ?>
">
													<div class="w-box-header">
														<span>Total turnover - mission <?php echo $this->_tpl_vars['ms_index']; ?>
</span>
													</div>						
													<div class="w-box-content cnt_a">
														<div class="row-fluid">
															<div class="span2"></div>
															<div class="suggested-price"><span id="price_info_<?php echo $this->_tpl_vars['ms_index']; ?>
">0</span><span id="currency_info_<?php echo $this->_tpl_vars['ms_index']; ?>
"> </span></div>
														</div>	
													</div>
												</div>	
											</div>
										</div>	
										<div class="row-fluid">
											<p class="alert alert-info">Select a mission</p>
										</div>
										<div class="row-fluid">
											<table class="table table-bordered table-hover">
													<tr>
														<th>Selection</th>
														<th>Client</th>
														<th>Date</th>
														<th>Category</th>
														<th>Type</th>
														<th>Language</th>
														<th>Product</th>
														<th>Nb of words</th>
														<th>Volume</th>
														<th>Price</th>
														<th>Launch date</th>
														<th>Length</th>
														<th>Prod cost</th>
														<th>Margin %</th>
														<th>Turnover mission</th>
														<th>Turnover contract</th>
													</tr>
													<?php if (count($this->_tpl_vars['mission']['missionDetails']) > 0): ?>
														<?php $_from = $this->_tpl_vars['mission']['missionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['old_misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['old_misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['old_mission']):
        $this->_foreach['old_misson']['iteration']++;
?>												
														<tr>
															<td><input name="detail_missions_<?php echo $this->_tpl_vars['ms_index']; ?>
[]" id="detail_missions_<?php echo $this->_tpl_vars['old_mission']['id']; ?>
_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo $this->_tpl_vars['old_mission']['id']; ?>
" data-price-word="<?php echo smarty_function_math(array('equation' => '(v/y)','v' => $this->_tpl_vars['old_mission']['unit_price'],'y' => $this->_tpl_vars['old_mission']['article_length'],'format' => '%.2f'), $this);?>
" rel="<?php echo smarty_function_math(array('equation' => '(v*(x/y)*z)','v' => $this->_tpl_vars['old_mission']['unit_price'],'x' => $this->_tpl_vars['mission']['nb_words'],'y' => $this->_tpl_vars['old_mission']['article_length'],'z' => $this->_tpl_vars['mission']['volume'],'format' => '%.2f'), $this);?>
" type="radio" class="validate[required]" <?php if ($this->_tpl_vars['old_mission']['id'] == $this->_tpl_vars['select_missions']['missions_selected'][$this->_tpl_vars['gn_index']]): ?> checked <?php endif; ?>></td>
															<td><?php echo $this->_tpl_vars['old_mission']['company_name']; ?>
</td>
															<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['starting_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B %Y") : smarty_modifier_date_format($_tmp, "%B %Y")); ?>
</td>															
															<td><?php echo $this->_tpl_vars['old_mission']['category_name']; ?>
</td>
															<td><?php echo $this->_tpl_vars['old_mission']['product']; ?>
</td>
															<td><?php echo $this->_tpl_vars['old_mission']['language1_name']; ?>
</td>
															<td><?php echo $this->_tpl_vars['old_mission']['producttype']; ?>
</td>
															<td><?php echo $this->_tpl_vars['old_mission']['article_length']; ?>
</td>
															<td><?php echo $this->_tpl_vars['old_mission']['num_of_articles']; ?>
</td>
															<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</td>
															<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['starting_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>															
															<td><?php echo $this->_tpl_vars['old_mission']['mission_length']; ?>
 Days</td>															
															<td>
																Writing : <?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['writing_cost_before_signature'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
; <br/>
																Correction : <?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['correction_cost_before_signature'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
; <br/>
																Other :<?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['other_cost_before_signature'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
; <br/>
															</td>
															<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['margin_before_signature'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 %</td>
															<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['mission_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 k&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</td>
															<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['contract_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</td>
														</tr>		
														<input type="hidden" id="currency_type_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="currency_type_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
">														
													<?php endforeach; endif; unset($_from); ?>	
													<input type="hidden" id="single_article_price_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="single_article_price_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="">
														<input type="hidden" id="mission_ca_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="mission_ca_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="">
												<?php else: ?>
													<p class="alert alert-danger">No matched missions found</p>
												<?php endif; ?>
											</table>	
										</div>
									</div>																			
								</div>	
							</div>	
						</div>
					</div>
					<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>	
				</div>
			</div>	
			<div class="row-fluid">
				<div class="pull-right">
					<div class="suggested-price"><br><h1><small>Total turnover(simulation)</small><br> <span id="total_suggested_price">0</span><span id="total_currency_info"> </span></h1></div>
					<input name="total_suggested_price" id="total_suggested_price_hidden" type="hidden">
				</div>	
			</div>
			<div class="row-fluid">
			<br><br><br><hr>
				<div class="span5 topset2">
					<a class="btn btn-default" href="/quote/create-quote-mission?submenuId=ML13-SL2"><i class="icon-chevron-left"></i> Back</a>							
				</div>
				<div class="pull-right topset2">
					<button type="submit" name="select_mission" class="finish btn btn-primary">Validate my selection</button>							
				</div>
			</div>
			
		</div>
	</form>	
	</div>
</div>