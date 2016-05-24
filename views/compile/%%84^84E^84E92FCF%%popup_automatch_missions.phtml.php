<?php /* Smarty version 2.6.19, created on 2015-03-03 14:40:48
         compiled from gebo/quote/popup_automatch_missions.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/popup_automatch_missions.phtml', 197, false),array('modifier', 'utf8_encode', 'gebo/quote/popup_automatch_missions.phtml', 219, false),array('modifier', 'zero_cut', 'gebo/quote/popup_automatch_missions.phtml', 260, false),array('modifier', 'date_format', 'gebo/quote/popup_automatch_missions.phtml', 328, false),array('function', 'math', 'gebo/quote/popup_automatch_missions.phtml', 237, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script> 

<script language="javascript">

$(document).ready(function() {	

	//submit the changes when click on apply changes button	
	$("#automatch_select").click(function() {
        $.post("/quote/save-selected-mission", $("#mission_selection").serialize()) //Serialize looks good name=textInNameInput&&telefon=textInPhoneInput---etc
        .done(function(data) {
            //window.location.reload(true);
			//alert(data)	;
			var obj = $.parseJSON(data);
			$("#pmission_cost_"+obj.mission_id+"_1").val(obj.writing_cost);
			$("#pmission_cost_"+obj.mission_id+"_2").val(obj.correction_cost);
			$("#pmission_cost_"+obj.mission_id+"_3").val(obj.other_cost);
			//alert(obj.mission_id+"=="+"#pmission_cost_"+obj.mission_id+"_1");
			$("#auto_match_missions").modal("hide");
			
			var flash_message=\'Changement pris en compte\';
			$.sticky(flash_message, {autoclose : 5000, position: "top-center", type: \'st-success\' });
        });
        return false;
    });
	
	
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
			total_suggested_price=parseFloat(total_suggested_price+selected_price);
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
		total_suggested_price=parseFloat(total_suggested_price+selected_price);
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
		
		if(mission_ids[0]==\'overview\')
		{
			$(\'#detail_missions_\'+mission_id).prop(\'checked\', true);
			$(\'#detail_missions_\'+mission_id).iCheck(\'update\');
		}	
		else	
		{
			$(\'#overview_missions_\'+mission_id).prop(\'checked\', true);
			$(\'#overview_missions_\'+mission_id).iCheck(\'update\');
		}			
		
	});
	$(\'input\').on(\'ifUnchecked\', function(event){
		var DivId = $(this).attr(\'id\');
		var mission_ids=DivId.split("_");
		var mission_id=mission_ids[2];
		
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
		total_suggested_price=parseFloat(total_suggested_price-selected_price);
		$("#total_suggested_price").text(total_suggested_price);
		$("#total_suggested_price_hidden").val(total_suggested_price);	
		$("#total_currency_info").html(\' &\'+currency+\';\');		
		
		if(mission_ids[0]==\'overview\')
		{
			$(\'#detail_missions_\'+mission_id).prop(\'checked\', false);
			$(\'#detail_missions_\'+mission_id).iCheck(\'update\');
		}	
		else	
		{
			$(\'#overview_missions_\'+mission_id).prop(\'checked\', false);
			$(\'#overview_missions_\'+mission_id).iCheck(\'update\');
		}		
	});
	  
});
</script>
'; ?>

<form method="POST" id="mission_selection">
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
					
					<input type="hidden" name="mission_id" value="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
					
					<div class="w-box" id="quote_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
">
						<div class="w-box-header">							
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
												<div class="mission-product"><?php echo $this->_tpl_vars['mission']['product_name']; ?>
</div>
												<div class="mission-info-ov">
													Langue : <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?> to <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['languagedest_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php endif; ?> <br/>
													Produit : <?php echo $this->_tpl_vars['mission']['producttype_name']; ?>
 <br/>
													Nb mots : <?php echo $this->_tpl_vars['mission']['nb_words']; ?>
 <br/>
													Volume : <span id ="mission_volume_<?php echo $this->_tpl_vars['ms_index']; ?>
"><?php echo $this->_tpl_vars['mission']['volume']; ?>
</span> <br/>
													Prix de vente th&eacute;orique/<?php echo $this->_tpl_vars['mission']['producttype_name']; ?>
 : <span id ="article_price_<?php echo $this->_tpl_vars['ms_index']; ?>
">0</span>&<?php echo $this->_tpl_vars['suggested_currency']; ?>
;<br/>
													Ajouter le prix au mot : <span id ="price_per_word_<?php echo $this->_tpl_vars['ms_index']; ?>
">0</span>&<?php echo $this->_tpl_vars['suggested_currency']; ?>
;
													
												</div>
											</div>
											<div class="span8">
												<h2 class="heading">Historique tarifs</h2> 
												<p><h4>S&eacute;lectionner la mission la plus pertinente</h4></p>
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
" rel="<?php echo smarty_function_math(array('equation' => '(v*(x/y)*z)','v' => $this->_tpl_vars['old_mission']['unit_price'],'x' => $this->_tpl_vars['mission']['nb_words'],'y' => $this->_tpl_vars['old_mission']['article_length'],'z' => $this->_tpl_vars['mission']['volume']), $this);?>
" type="radio" class="validate[required]" type="radio" class="validate[required]"<?php if ($this->_tpl_vars['old_mission']['id'] == $this->_tpl_vars['suggested_mission']): ?> checked <?php endif; ?>>
																		
																	</div>	
																	<div class="span10 mission-info-block">
																		<?php if ($this->_tpl_vars['old_mission']['id'] == $this->_tpl_vars['suggested_mission']): ?>
																			<h3 class="span9"><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</h3>
																			<span class="span3"><label class="label ">S&eacute;lectionn&eacute;e par <br><?php echo $this->_tpl_vars['mission']['sales_user_name']; ?>
</label></span>
																		<?php else: ?>
																			<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</h3>
																		<?php endif; ?>
																		<?php if ($this->_tpl_vars['old_mission']['simulation'] == 'yes'): ?>
																			<span class="span3"><label class="label label-info ">MISSION SIMULEE</label></span>
																		<?php endif; ?>
																		<table class="table mission-table">
																			<tr>
																				<th>VOLUME</th>
																																								<th>P VENTE</th>
																				<th>NB MOTS</th>
																			</tr>
																			<tr class="misson-details-text">
																				<td><?php echo $this->_tpl_vars['old_mission']['num_of_articles']; ?>
</td>
																																								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['suggested_currency']; ?>
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
													Langue : <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?> to <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['languagedest_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php endif; ?> <br/>
													Produit : <?php echo $this->_tpl_vars['mission']['producttype_name']; ?>
 <br/>
													Nb mots : <?php echo $this->_tpl_vars['mission']['nb_words']; ?>
 <br/>
													Volume : <?php echo $this->_tpl_vars['mission']['volume']; ?>
 <br/>
												</div>
											</div>
											<div class="span3">	
												<div class="w-box" id="suggested_price_<?php echo $this->_tpl_vars['ms_index']; ?>
">
													<div class="w-box-header">
														<span>Suggested price for mission <?php echo $this->_tpl_vars['ms_index']; ?>
</span>
													</div>						
													<div class="w-box-content cnt_a">
														<div class="row-fluid">
															<div class="span4"></div>
															<div class="suggested-price"><span id="price_info_<?php echo $this->_tpl_vars['ms_index']; ?>
">0</span><span id="currency_info_<?php echo $this->_tpl_vars['ms_index']; ?>
"> </span></div>
														</div>	
													</div>
												</div>	
											</div>
										</div>	
										<div class="row-fluid">
											<p><h4>S&eacute;lectionner la mission la plus pertinente</h4></p>
										</div>
										<div class="row-fluid">
											<table class="table table-bordered table-striped">
													<tr>
														<th>S&eacute;lection</th>
														<th>Client</th>
														<th>Date</th>
														<th>Cat&eacute;gorie</th>
														<th>Type</th>
														<th>Langue</th>
														<th>Produit</th>
														<th>Nb mots</th>
														<th>Volume</th>
														<th>Prix</th>
														<th>Date lancement</th>
														<th>Dur&eacute;e</th>
														<th>Cout de prod</th>
														<th>Marge en %</th>
														<th>CA mission</th>
														<th>CA contract</th>
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
" value="<?php echo $this->_tpl_vars['old_mission']['id']; ?>
" data-price-word="<?php echo smarty_function_math(array('equation' => '(v/y)','v' => $this->_tpl_vars['old_mission']['unit_price'],'y' => $this->_tpl_vars['old_mission']['article_length'],'format' => '%.2f'), $this);?>
" rel="<?php echo smarty_function_math(array('equation' => '(v*(x/y)*z)','v' => $this->_tpl_vars['old_mission']['unit_price'],'x' => $this->_tpl_vars['mission']['nb_words'],'y' => $this->_tpl_vars['old_mission']['article_length'],'z' => $this->_tpl_vars['mission']['volume']), $this);?>
" type="radio" class="validate[required]" type="radio" class="validate[required]" <?php if ($this->_tpl_vars['old_mission']['id'] == $this->_tpl_vars['suggested_mission']): ?> checked <?php endif; ?>></td>
															<td><?php echo $this->_tpl_vars['old_mission']['company_name']; ?>
</td>
															<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['starting_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B %Y") : smarty_modifier_date_format($_tmp, "%B %Y")); ?>
</td>															
															<td><?php echo $this->_tpl_vars['old_mission']['category_name']; ?>
</td>
															<td><?php echo $this->_tpl_vars['old_mission']['product']; ?>
</td>
															<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['language1_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
															<td><?php echo $this->_tpl_vars['old_mission']['producttype']; ?>
</td>
															<td><?php echo $this->_tpl_vars['old_mission']['article_length']; ?>
</td>
															<td><?php echo $this->_tpl_vars['old_mission']['num_of_articles']; ?>
</td>
															<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['suggested_currency']; ?>
;</td>
															<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['starting_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>															
															<td><?php echo $this->_tpl_vars['old_mission']['mission_length']; ?>
 JOURS</td>															
															<td>
																R&eacute;daction : <?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['writing_cost_before_signature'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['suggested_currency']; ?>
; <br/>
																Correction : <?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['correction_cost_before_signature'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['old_mission']['correction_cost_before_signature_currency']; ?>
; <br/>
																Autre :<?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['other_cost_before_signature'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['old_mission']['other_cost_before_signature_currency']; ?>
; <br/>
															</td>
															<td><?php echo ((is_array($_tmp=$this->_tpl_vars['old_mission']['margin_before_signature'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 %</td>
															<td><?php echo $this->_tpl_vars['old_mission']['mission_turnover']; ?>
 k&<?php echo $this->_tpl_vars['suggested_currency']; ?>
;</td>
															<td><?php echo $this->_tpl_vars['old_mission']['contract_turnover']; ?>
 &<?php echo $this->_tpl_vars['suggested_currency']; ?>
;</td>
														</tr>		
														<input type="hidden" id="currency_type_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="currency_type_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo $this->_tpl_vars['suggested_currency']; ?>
">
														<input type="hidden" id="single_article_price_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="single_article_price_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="">
														<input type="hidden" id="mission_ca_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="mission_ca_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="">
													<?php endforeach; endif; unset($_from); ?>	
												<?php else: ?>
													<h3>No matched missions found</h3>
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
			<div class="row-fluid" style="display:none">
				<div class="pull-right">
					<div class="suggested-price"><h2>Suggeseted total price : <span id="total_suggested_price">0</span><span id="total_currency_info"> </span></h2></div>
					<input name="total_suggested_price" id="total_suggested_price_hidden" type="hidden">
				</div>	
				
			</div>
			<div class="row-fluid"></div>
			<div class="row-fluid">
				<div class="span5"></div>
				<div class="form-inline">
					<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>	
					<button type="button" name="automatch_select" id="automatch_select" class="btn btn-primary">Valider changement</button>
				</div>
			</div>
			
		</div>
	</form>