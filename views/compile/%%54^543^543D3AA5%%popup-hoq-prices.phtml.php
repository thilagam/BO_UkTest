<?php /* Smarty version 2.6.19, created on 2016-04-26 17:36:26
         compiled from gebo-new/quote/popup-hoq-prices.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo-new/quote/popup-hoq-prices.phtml', 9, false),array('modifier', 'zero_cut', 'gebo-new/quote/popup-hoq-prices.phtml', 35, false),array('modifier', 'replace', 'gebo-new/quote/popup-hoq-prices.phtml', 38, false),array('modifier', 'utf8_encode', 'gebo-new/quote/popup-hoq-prices.phtml', 39, false),array('function', 'math', 'gebo-new/quote/popup-hoq-prices.phtml', 27, false),)), $this); ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title center-block">Select a price</h4>
</div>
<form action="/quote-new/save-hoq-mission?quote_id=<?php echo $_GET['quote_id']; ?>
" method="post" id="hoq-price-form">
<div class="modal-body" id="hoq-price-body">
	<input type="hidden" name="mission_id" value="<?php echo $_GET['mission_id']; ?>
">
	<input type="hidden" name="mindex" value="<?php echo $_GET['mindex']; ?>
">
		<?php if (count($this->_tpl_vars['hoqmissionDetails']) > 0): ?>		
			<p class="text-info"><i class="glyphicon glyphicon-info-sign"></i> Click on prices for more details
				<label class="checkbox" style="padding-left: 35px; width: auto; text-align: left">
					<input id="hshowtheorical" name="showtheorical" type="checkbox" <?php if ($this->_tpl_vars['hoqmissionDetails'][$_GET['mindex']]['showtheorical'] == 'yes' || ! $this->_tpl_vars['hoqmissionDetails'][$_GET['mindex']]['selected_mission']): ?> checked <?php endif; ?> <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?><?php else: ?> disabled="disable" <?php endif; ?> class="icheckbox" data-toggle="checkbox">
					<small>Show theorical prices</small>
				</label>
			</p>
			<table class="table table-bordered" id="price-list">
				<?php $_from = $this->_tpl_vars['hoqmissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>
					<?php $this->assign('gn_index', ($this->_foreach['misson']['iteration']-1)); ?>
					<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>
					<?php if ($this->_tpl_vars['mission']['product_name']): ?>						
							<?php if (count($this->_tpl_vars['mission']['missionDetails']) > 0): ?>
								<?php $_from = $this->_tpl_vars['mission']['missionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['chistory']):
?>
									<tr>
									<?php $_from = $this->_tpl_vars['chistory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['hmisson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hmisson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['history']):
        $this->_foreach['hmisson']['iteration']++;
?>
										<?php if ($this->_tpl_vars['history']['mission_id']): ?>
											<td class="col-xs-2 text-center htheorical">		
												<?php echo smarty_function_math(array('equation' => '(v/y)','assign' => 'price_word','v' => $this->_tpl_vars['history']['unit_price'],'y' => $this->_tpl_vars['history']['nb_words'],'format' => '%.3f'), $this);?>

												<?php echo smarty_function_math(array('equation' => '(x*y)','assign' => 'price_per_art','x' => $this->_tpl_vars['mission']['nb_words'],'y' => $this->_tpl_vars['price_word'],'format' => '%.2f'), $this);?>

												<?php echo smarty_function_math(array('equation' => '(p*v)','assign' => 'mturnover','p' => $this->_tpl_vars['price_per_art'],'v' => $this->_tpl_vars['mission']['volume'],'format' => '%.2f'), $this);?>

												<?php echo smarty_function_math(array('equation' => '((mw*hi)/hw)','assign' => 'minternal_cost','mw' => $this->_tpl_vars['mission']['nb_words'],'hw' => $this->_tpl_vars['history']['nb_words'],'hi' => $this->_tpl_vars['history']['internal_cost'],'format' => '%.2f'), $this);?>

												<?php echo smarty_function_math(array('equation' => '(100-((inc/ppa)*100))','assign' => 'margin_percentage','inc' => $this->_tpl_vars['minternal_cost'],'ppa' => $this->_tpl_vars['price_per_art'],'format' => '%.5f'), $this);?>

													<label class="radio">
													<input type="radio" name="overview_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="overview_missions_<?php echo $this->_tpl_vars['history']['mission_id']; ?>
_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo $this->_tpl_vars['history']['mission_id']; ?>
" data-price-word="<?php echo $this->_tpl_vars['price_word']; ?>
" rel="<?php echo $this->_tpl_vars['mturnover']; ?>
" data-margin="<?php echo $this->_tpl_vars['margin_percentage']; ?>
" data-price-per-art="<?php echo $this->_tpl_vars['price_per_art']; ?>
" data-internal-cost=<?php echo $this->_tpl_vars['minternal_cost']; ?>
 class="hicheck validate[required]" <?php if ($this->_tpl_vars['history']['mission_id'] == $this->_tpl_vars['mission']['selected_mission']): ?> checked <?php endif; ?> data-toggle="radio"/>
												</label>
												<a class="hp" href="/quote-new/history-mission-details?mission_id=<?php echo $this->_tpl_vars['history']['mission_id']; ?>
&show=theorical&from_site=<?php echo $this->_tpl_vars['history']['from_site']; ?>
" data-toggle="modal" data-target="#viewHistroymission"><?php echo ((is_array($_tmp=$this->_tpl_vars['history']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
&<?php echo $this->_tpl_vars['history']['currency']; ?>
;
													<p class="grey-text">
													<?php echo smarty_function_math(array('assign' => 'price_per_word','equation' => '(c/d)','c' => $this->_tpl_vars['history']['unit_price'],'d' => $this->_tpl_vars['history']['nb_words'],'format' => '%.3f'), $this);?>
 
														<span class="label label-default"><?php echo ((is_array($_tmp=$this->_tpl_vars['price_per_word'])) ? $this->_run_mod_handler('replace', true, $_tmp, '.', ',') : smarty_modifier_replace($_tmp, '.', ',')); ?>
 &<?php echo $this->_tpl_vars['history']['currency']; ?>
; / word</span><br>
													 <?php echo ((is_array($_tmp=$this->_tpl_vars['history']['company_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 
													 <?php if ($this->_tpl_vars['history']['from_site'] == 'fr'): ?><span class="label label-info plt">FR deal</span><?php endif; ?>
													</p></a>								
											</td>
										<?php endif; ?>
										<?php if ($this->_tpl_vars['history']['mission_id'] && $this->_tpl_vars['history']['real_cost']): ?>
											<td class="col-xs-2 text-center hreal">
												<?php echo smarty_function_math(array('equation' => '((x/y)*v)','assign' => 'price_per_art','x' => $this->_tpl_vars['mission']['nb_words'],'y' => $this->_tpl_vars['history']['nb_words'],'v' => $this->_tpl_vars['history']['real_unit_price'],'format' => '%.2f'), $this);?>

												<?php echo smarty_function_math(array('equation' => '(v/y)','assign' => 'price_word','v' => $this->_tpl_vars['history']['real_unit_price'],'y' => $this->_tpl_vars['history']['nb_words'],'format' => '%.3f'), $this);?>

												<?php echo smarty_function_math(array('equation' => '(p*v)','assign' => 'mturnover','p' => $this->_tpl_vars['price_per_art'],'v' => $this->_tpl_vars['mission']['volume'],'format' => '%.2f'), $this);?>

												<?php echo smarty_function_math(array('equation' => '((mw*hi)/hw)','assign' => 'minternal_cost','mw' => $this->_tpl_vars['mission']['nb_words'],'hw' => $this->_tpl_vars['history']['nb_words'],'hi' => $this->_tpl_vars['history']['real_cost'],'format' => '%.2f'), $this);?>

												<?php echo smarty_function_math(array('equation' => '(100-((inc/ppa)*100))','assign' => 'margin_percentage','inc' => $this->_tpl_vars['minternal_cost'],'ppa' => $this->_tpl_vars['price_per_art'],'format' => '%.5f'), $this);?>

												<label class="radio">
													<input type="radio" name="roverview_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="roverview_missions_<?php echo $this->_tpl_vars['history']['mission_id']; ?>
_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo $this->_tpl_vars['history']['mission_id']; ?>
" data-price-word="<?php echo $this->_tpl_vars['price_word']; ?>
" rel="<?php echo $this->_tpl_vars['mturnover']; ?>
" data-margin="<?php echo $this->_tpl_vars['margin_percentage']; ?>
" data-price-per-art="<?php echo $this->_tpl_vars['price_per_art']; ?>
" data-internal-cost=<?php echo $this->_tpl_vars['minternal_cost']; ?>
 class="hicheck validate[required]"  <?php if ($this->_tpl_vars['history']['mission_id'] == $this->_tpl_vars['mission']['selected_mission']): ?> checked <?php endif; ?> data-toggle="radio"/>
												</label>
												<a class="hp" href="/quote-new/history-mission-details?mission_id=<?php echo $this->_tpl_vars['history']['mission_id']; ?>
&show=real&from_site=<?php echo $this->_tpl_vars['history']['from_site']; ?>
" data-toggle="modal" data-target="#viewHistroymission"><?php echo ((is_array($_tmp=$this->_tpl_vars['history']['real_unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
&<?php echo $this->_tpl_vars['history']['currency']; ?>
;
													<p class="grey-text">
													<?php echo smarty_function_math(array('assign' => 'price_per_word','equation' => '(a/b)','a' => $this->_tpl_vars['history']['real_unit_price'],'b' => $this->_tpl_vars['history']['nb_words'],'format' => '%.3f'), $this);?>
 
														<span class="label label-default"><?php echo ((is_array($_tmp=$this->_tpl_vars['price_per_word'])) ? $this->_run_mod_handler('replace', true, $_tmp, '.', ',') : smarty_modifier_replace($_tmp, '.', ',')); ?>
 &<?php echo $this->_tpl_vars['history']['currency']; ?>
; / word</span><br>
														<?php echo ((is_array($_tmp=$this->_tpl_vars['history']['company_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 
														<?php if ($this->_tpl_vars['history']['from_site'] == 'fr'): ?><span class="label label-info plt">FR deal</span><?php endif; ?>
													</p></a>
											</td>
										<?php endif; ?>																			
									<?php endforeach; endif; unset($_from); ?>
									</tr>
								<?php endforeach; endif; unset($_from); ?>
								<input type="hidden" value="<?php echo $this->_tpl_vars['mission']['margin_percentage']; ?>
" id="hmargin_percentage_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="margin_percentage_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
								<input type="hidden" value="<?php echo $this->_tpl_vars['mission']['unit_price']; ?>
" id="hunit_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="unit_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
								<input type="hidden" value="<?php echo $this->_tpl_vars['mission']['internal_cost']; ?>
" id="hinternal_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="internal_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">								
							<?php endif; ?>
					<?php endif; ?>	
				<?php endforeach; endif; unset($_from); ?>
			</table>
			</div>	
			<div class="modal-footer">
		
					
					<button  class="btn" data-dismiss="modal" type="reset">Annuler</button>
					<button class="btn btn-fill btn-primary" type="button" id="price_validate">Valider</button>
				
			</div>	
		<?php endif; ?>
	</form>
</div>	
<?php echo '
<script>
$(document).ready(function() {	
	$(\'body\').on(\'click\',\'#price_validate\',function(){
		if($("#hshowtheorical").is(\':checked\')!=true && ($(\'#hoq-price-form input[name^="roverview_missions_"]\').length)==0)
		{
			$(\'#hshowtheorical\').prop(\'checked\', \'checked\');
			$("#hshowtheorical").trigger("click");
			$(\'#hoq-price-form\').submit();
		}
		else
		{
			$(\'#hoq-price-form\').submit();
		}
	});
	
	$(\'body\').on(\'hide.bs.modal\', \'#hoq-price-modal\', function () {		
		$(\'#hoq-price-body\').html(\'<div class="text-center"><img src="/BO/theme/gebo/img/ajax_loader.gif"></div>\');
		$(\'.modal-backdrop\').remove();
	});
	
	//toggle all checkboxes of details and overview tabs 
	$(\'input[name^="overview_missions_"],input[name^="roverview_missions_"]\').on(\'change\',function(){		
		
		if($(this).is(\':checked\'))
		{			
			var DivId = $(this).attr(\'id\');
			var mission_ids=DivId.split("_");		
			var missionIdentifier=mission_ids[2]+"_"+mission_ids[3];				
			$("#overview_missions_"+missionIdentifier).radio(\'check\');			
			$("#roverview_missions_"+missionIdentifier).radio(\'check\');
			showtheoricalupdate(DivId);
		}	
	}); 
	
	
	/*adding prefix for checkboxes for validations*/
	var prefix = "mission_";	
	$(".selectpicker").selectpicker();
	$(\'input[type="radio"]\').each(function() {
        $(this).parents(\'label.radio\').attr("id", prefix + this.id).removeClass("validate[required]");
    });		
	$("#hoq-price-form").validationEngine(\'attach\',{prettySelect : true,autoHidePrompt: true,usePrefix: prefix});	
	$(\'.hicheck\').radio();
	$(\'.icheckbox\').checkbox();
	
	$(\'#hshowtheorical\').change(function(){
		var quote_id=\''; ?>
<?php echo $_GET['quote_id']; ?>
<?php echo '\';
			$input = $(this);		 
			//$(\'.icheck\').prop(\'checked\', false);
			//$(\'.icheck\').radio(\'uncheck\');
			if($input.is(\':checked\')){
				showtheorical=\'yes\';
				$(".hreal").hide();
				$(".htheorical").show();
				id=$(\'input[name^="overview_missions_"]:checked\').attr(\'id\');
			}
			else{
				showtheorical=\'no\';
				$(".hreal").show();
				$(".htheorical").hide();
				id=$(\'input[name^="roverview_missions_"]:checked\').attr(\'id\');
			}
			 if(id){
				showtheoricalupdate(id);
			}
			calculateTurnover();
    });
	if($("#hshowtheorical").is(\':checked\'))
	{
		//alert(\'yes\');
		$(\'.htheorical\').show();
		$(\'.hreal\').hide();
	}
	else{
		$(\'.htheorical\').hide();
		$(\'.hreal\').show();
	}	
});	
	
</script>
'; ?>
