<?php /* Smarty version 2.6.19, created on 2016-05-09 10:14:39
         compiled from gebo-new/quote/create-quote-mission-realprice.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo-new/quote/create-quote-mission-realprice.phtml', 303, false),array('modifier', 'zero_cut', 'gebo-new/quote/create-quote-mission-realprice.phtml', 345, false),array('modifier', 'replace', 'gebo-new/quote/create-quote-mission-realprice.phtml', 388, false),array('modifier', 'in_array', 'gebo-new/quote/create-quote-mission-realprice.phtml', 491, false),array('modifier', 'array_search', 'gebo-new/quote/create-quote-mission-realprice.phtml', 492, false),array('modifier', 'array_pop', 'gebo-new/quote/create-quote-mission-realprice.phtml', 492, false),array('function', 'math', 'gebo-new/quote/create-quote-mission-realprice.phtml', 377, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/lbd/lib/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/lbd/lib/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/lbd/lib/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
	.
	input[type=radio] {  visibility: hidden;  position: absolute;cursor:pointer;}
	.modal-header-black {color:#fff;background-color:#404040;align:center;}

</style>

<script language="javascript">
var currency=\''; ?>
<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
<?php echo '\';

function roundnum(number)
{
	return Math.round(number*100)/100;
}
//5 decimal points
function round5num(number)
{
	return Math.round(number*100000)/100000;
}

function calculateTurnover()
{
	
	var suggested_price=0;
	var current_suggested_price=0;
	$(\'[id^=price_info_]\').each(function () {
		
			var DivId = $(this).attr(\'id\');
			var mission_ids=DivId.split("_");		
			var index_id=mission_ids[3];
			
			current_suggested_price=parseFloat($(this).text().replace(\',\',\'.\'));	
			
			if(isNaN(current_suggested_price))	
				current_suggested_price=0;
			//calculating current price and selected price and assiging to suggested price			
			suggested_price=parseFloat(current_suggested_price+suggested_price);
			//alert(suggested_price);
	});
	$("#total_suggested_price").text(roundnum(suggested_price));
	$("#total_suggested_price_hidden").val(roundnum(suggested_price));
}	


$(document).ready(function() {

'; ?>

    <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'prodmanager' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager'): ?>

   <?php else: ?>
<?php echo '
   	$(\'[id^=overview_missions_]\').radio(\'disable\');
 '; ?>

 <?php endif; ?>
 <?php echo '
 
	
	/*adding prefix for checkboxes for validations*/
	var prefix = "mission_";	
	$(".selectpicker").selectpicker();
	$(\'input[type="radio"]\').each(function() {
        $(this).parents(\'label.radio\').attr("id", prefix + this.id).removeClass("validate[required]");
    });		
	$("#mission_view").validationEngine(\'attach\',{prettySelect : true,autoHidePrompt: true,usePrefix: prefix});
	$("#changeFormValue").validationEngine(\'attach\',{prettySelect : true,autoHidePrompt: true,usePrefix: prefix});
	
	
	$(\'.icheck\').radio();
	$(\'.icheckbox\').checkbox();
	
	/* $(\'#showtheorical\').change(function(){
		var quote_id=\''; ?>
<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
<?php echo '\';
			$input = $(this);		 
			//$(\'.icheck\').prop(\'checked\', false);
			
			//$(\'.icheck\').radio(\'uncheck\');
		
			if($input.is(\':checked\')){
				showtheorical=\'yes\';
				$(".real").hide();
				$(".theorical").show();
				id=$(\'input[name^="overview_missions_"]:checked\').attr(\'id\');
				
			}
			else{
				showtheorical=\'no\';
				$(".real").show();
				$(".theorical").hide();
				id=$(\'input[name^="roverview_missions_"]:checked\').attr(\'id\');
				
			}
			if(id){
				showtheoricalupdate(id);
			}
				
			
				$.ajax({
				type: \'GET\',
				url: \'/quote-new/update-theorical-price?quote_id=\'+quote_id,
				data: \'showtheorical=\'+showtheorical,			  
				success: function(data)
				{
				
				}
				});
				
				calculateTurnover();

    }); */
	
	calculateTurnover();
	
	
//toggle all checkboxes of details and overview tabs 
	$(\'input[name^="overview_missions_"],input[name^="roverview_missions_"]\').on(\'change\',function(){		
		
		if($(this).is(\':checked\'))
		{			
			var DivId = $(this).attr(\'id\');
			showtheoricalupdate(DivId);
		}	
	}); 
	
});	


function showtheoricalupdate(DivId)
{
		var mission_ids=DivId.split("_");
			var mission_id=mission_ids[2];	
			var index_id=mission_ids[3];	
			
			var checkName=$(\'#\'+DivId).attr(\'name\');		
			var nameIndexes=checkName.split("_");
			var nameIndex=nameIndexes[2].replace("[]",\'\');	

			var selected_price=parseFloat($(\'#\'+DivId).attr(\'rel\'));	
			
			//calculating current price and selected price and assiging to suggested price
			var suggested_price=parseFloat(selected_price);
			
			//alert(selected_price+\'==\'+suggested_price);
			
			$("#price_info_"+nameIndex).text(roundnum(suggested_price));
			$("#currency_info_"+nameIndex).html(\' &\'+currency+\';\');
			
			$("#mission_ca_"+nameIndex).val(suggested_price);//mission total
			
			
			//Added w.r.t article in left side
			var mission_volume=parseFloat($("#mission_volume_"+index_id).text());

			var article_price=(suggested_price/mission_volume);
			//alert(suggested_price+\'------\'+mission_volume+\' price \'+article_price);
			article_price=roundnum(article_price);
			$("#single_article_price_"+index_id).val(article_price);
			
			$("#article_price_"+index_id).text(article_price.toString().replace(".",\',\')); //for span
			
			var margin=parseFloat($(\'#\'+DivId).attr(\'data-margin\'));
			$("#epmargin_"+index_id).text(margin+\'%\');
			
			$("#unit_price_"+index_id).val(article_price);
			$("#margin_percentage_"+index_id).val(margin);
			
			var internal_cost=roundnum((article_price*(100-margin))/100);//internal cost			
			//alert(article_price+\'--\'+margin+\'--\'+internal_cost);
			$("#internal_cost_"+index_id).val(internal_cost);
			
			/*added w.r.t HOQ popup*/
			$("#hunit_price_"+index_id).val(article_price);
			$("#hmargin_percentage_"+index_id).val(margin);
			$("#hinternal_cost_"+index_id).val(internal_cost);
			//price per word
			var price_per_word=roundnum(parseFloat($(\'#\'+DivId).attr(\'data-price-word\')));
			price_per_word=price_per_word.toString().replace(".",\',\');
			//alert(price_per_word);
			$("#price_per_word_"+index_id).text(price_per_word);
			
			calculateTurnover();
}
	
	
function loadeditarticle(index,tmission)
{
	if(tmission==\'m\')
	{
		$(\'#epmargin\').addClass(\'validate[required,minWriters[0.01],maxWriters[99.99]]\');
		
	}
	else
	{
		$(\'#epmargin\').addClass(\'validate[required,minWriters[0.00],maxWriters[99.99]]\');
	}
		var unit_price=$("#article_price_"+index).text().replace(",",".");
		var margin=$("#epmargin_"+index).text().replace("%","");	
		$("#price_per_article").val(unit_price);
		$("#epmargin").val(margin);
		var internal_cost=roundnum((unit_price*(100-margin))/100);
		//alert(unit_price+\'--\'+margin+\'--\'+internal_cost);
		$("#internal_cost_"+index).val(internal_cost);
		$("#missionindex").val(index);	

	
	
}
	
function changeOnPrice()
{
	if($("#changeFormValue").validationEngine(\'validate\'))
{
	var index=$("#missionindex").val();
	var price=$(\'#internal_cost_\'+index).val();
	var price_per_article=$("#price_per_article").val().replace(",",".");
	
	var margin=(price * 100)/(price_per_article);
	var marginval=100-margin;
	
	if(Math.floor(marginval) == marginval)
		$("#epmargin").val(marginval);
	else
		$("#epmargin").val(round5num(marginval));	
	}
	
}

function changeOnMargin()
{
	if($("#changeFormValue").validationEngine(\'validate\'))
{
	var index=$("#missionindex").val();
	var margin=$("#epmargin").val().replace(",",".");
	
	var internalcost=$(\'#internal_cost_\'+index).val();
	var price_per_article=(internalcost/(1-margin/100));
	
		//alert(marginval+\' min \'+minval+\' max \'+maxval);
	if(Math.floor(price_per_article) == price_per_article)
		$("#price_per_article").val(price_per_article);
	else
		$("#price_per_article").val(roundnum(price_per_article));
}
}

function validatearticleprice()
{
	if($("#changeFormValue").validationEngine(\'validate\'))
	{
	var index=$("#missionindex").val();
	var quote_id=\''; ?>
<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
<?php echo '\';
	
	var margin=$("#epmargin").val().replace(",",".");
	var price_per_article=roundnum(parseFloat($("#price_per_article").val().replace(",",".")));
	var internal_cost=$("#internal_cost_"+index).val();		
	var selected_mission=$(\'input[name=overview_missions_\'+index+\']:checked\').val();
	var volume=parseInt($("#mission_volume_"+index).text());
	var showtheorical=\'no\';
	if($("#showtheorical").prop(\'checked\') == true){
		showtheorical=\'yes\';
	}

	$.ajax({
		type: \'GET\',
		url: \'/quote-new/update-unit-price\',
		data: \'quote_id=\'+quote_id+\'&index=\' + index + \'&margin_percentage=\' + margin + \'&unit_price=\'+price_per_article+\'&internal_cost=\'+internal_cost+\'&selected_mission=\'+selected_mission+\'&showtheorical=\'+showtheorical,			  
		success: function(data)
		{   
			//alert(data);
			$(\'#editarticleprice\').modal(\'toggle\');			
			$("#article_price_"+index).html(price_per_article);
			$("#epmargin_"+index).html(margin+\'%\');
			
			$("#unit_price_"+index).val(price_per_article);
			$("#margin_percentage_"+index).val(margin);
			
			
			var missionCA=roundnum(parseFloat(volume*price_per_article));
			$("#price_info_"+index).text(missionCA);
			calculateTurnover();

		}
	 });		
	return false;
	}
}

/*Form submit*/
function quotesValidation()
{
	$("form#mission_view").submit();
}
</script>	 
'; ?>

				
						<h1><small><?php echo $this->_tpl_vars['create_step1']['quote_title']; ?>
</small><br> Catch prices on edit-place</h1>
				
				<form action="/quote-new/save-mission-view?quote_id=<?php echo $_GET['quote_id']; ?>
" method="POST" id="mission_view">
						
							<?php if (count($this->_tpl_vars['quote_missions']) > 0 || count($this->_tpl_vars['tech_missions']) > 0): ?>		
								<div class="table-responsive">
									<div class="card"><div class="content">
								<table class="table table-bordered" id="price-list">
									<tr>
										<th class="col-md-4">
										<h4>Mission list 
										<?php if ($this->_tpl_vars['sales_review'] != 'signed'): ?>
											<a  href="/quote-new/create-quote-mission-popup?quote_id=<?php echo $_GET['quote_id']; ?>
"    data-toggle="modal" data-target="#mission-step"  class="btn btn-default pull-right"><i class="glyphicon glyphicon-plus"></i> Add mission</a>
											<?php endif; ?>
											</h4>
										</th>
										<th colspan="4" class="col-md-6">					
													
										</th>
											<th colspan="3" class="col-md-2 text-right total-price">
											
												<h2 style="margin: 0"> <small>TOTAL SELLING PRICE</small><br><span id="total_suggested_price">0</span><span id="total_currency_info">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</span>
												<input name="total_suggested_price" id="total_suggested_price_hidden" type="hidden">
												</h2>
												
											
										</th>
									</tr>
								<?php $_from = $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmission']):
        $this->_foreach['tmission']['iteration']++;
?>
											
											<?php $this->assign('tn_index', ($this->_foreach['tmission']['iteration']-1)); ?>	
											<?php if ($this->_tpl_vars['tmission'] == 'all_prod' && $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['to_perform'] == 'Before'): ?>
											<tr id="tmid_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" class="prod-link-mission">
												<td class="mt" colspan="5">
													<a  <?php if ($this->_tpl_vars['sales_review'] != 'signed'): ?> data-toggle="modal" data-target="#viewmission" href="/quote-new/create-quote-mission-details-popup?quote_id=<?php echo $_GET['quote_id']; ?>
&t_index=<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" <?php endif; ?>>
													<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_type']; ?>

														<p class="grey-text" style="font-size:12px;"><span class="glyphicon glyphicon-align-justify"></span>  <span id="mission_volume_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" style="padding-right:20px;"> <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume']; ?>
       </span>             <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['language']; ?>
 </p>
													</a>
												
												</td>
												
												<td class="col-xs-2 text-center margin-col-calc" <?php if (( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' ) && $this->_tpl_vars['sales_review'] != 'signed'): ?> data-toggle="modal" data-target="#editarticleprice" <?php endif; ?> onClick="loadeditarticle(<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
,'')">
												<span id="article_price_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;<p class="grey-text">SELLING PRICE</p>
												<div class="epmargin label label-info" id="epmargin_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['margin_percentage']; ?>
%</div>
												<input type="hidden" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['margin_percentage']; ?>
" id="margin_percentage_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" name="margin_percentage_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
												<input type="hidden" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['unit_price']; ?>
" id="unit_price_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" name="unit_price_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
												<input type="hidden" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['internal_cost']; ?>
" id="internal_cost_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" name="internal_cost_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
												</td>
												<td class="col-xs-1 text-right brand-success">
													<span id="price_info_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
												</td>
											</tr>
											<?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>
								<?php $_from = $this->_tpl_vars['quote_missions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>
									<?php $this->assign('gn_index', ($this->_foreach['misson']['iteration']-1)); ?>
									<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>
									<?php if ($this->_tpl_vars['mission']['product_name']): ?>
										<tr id="mid_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" <?php if (count($this->_tpl_vars['mission']['missionDetails']) == 0): ?>class="history-data-null"<?php endif; ?>>
											<td class="mt">
												<a <?php if ($this->_tpl_vars['sales_review'] != 'signed'): ?> data-toggle="modal" data-target="#viewmission" href="/quote-new/create-quote-mission-details-popup?quote_id=<?php echo $_GET['quote_id']; ?>
&m_index=<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" <?php endif; ?>>
											Mission de <?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <?php if ($this->_tpl_vars['mission']['producttype_name']): ?>/ <?php echo $this->_tpl_vars['mission']['producttype_name']; ?>
 <?php endif; ?><?php if ($this->_tpl_vars['mission']['nb_words']): ?> / <?php echo $this->_tpl_vars['mission']['nb_words']; ?>
 Mots<?php endif; ?>
												<p class="grey-text"><span class="glyphicon glyphicon-align-justify"></span> <span id="mission_volume_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" style="padding-right:20px;"> <?php echo $this->_tpl_vars['mission']['volume']; ?>
  </span>
												<?php echo $this->_tpl_vars['mission']['language_name']; ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?> <span class="glyphicon glyphicon-triangle-right"></span> <?php echo $this->_tpl_vars['mission']['languagedest_name']; ?>
<?php endif; ?></p>
												</a>
											</td>

											<?php if (count($this->_tpl_vars['mission']['missionDetails']) > 0): ?>
												<?php $_from = $this->_tpl_vars['mission']['missionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['hmisson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hmisson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['history']):
        $this->_foreach['hmisson']['iteration']++;
?>
													<?php $this->assign('hgn_index', ($this->_foreach['hmisson']['iteration']-1)); ?>
													<?php $this->assign('hms_index', ($this->_foreach['hmisson']['iteration']-1)+1); ?>
													
													<td class="col-xs-2 text-center theorical" <?php if ($this->_tpl_vars['mission']['showtheorical'] != 'yes'): ?>  style="display:none" <?php endif; ?> colspan="3">
														<?php if ($this->_tpl_vars['history']['mission_id']): ?>
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
 class="icheck validate[required]" <?php if ($this->_tpl_vars['history']['mission_id'] == $this->_tpl_vars['mission']['selected_mission']): ?> checked <?php endif; ?> data-toggle="radio"/>
															</label>
															<a class="hp" href="/quote-new/history-mission-details?quote_id=<?php echo $_GET['quote_id']; ?>
&mission_id=<?php echo $this->_tpl_vars['history']['mission_id']; ?>
&show=theorical&from_site=<?php echo $this->_tpl_vars['history']['from_site']; ?>
" data-toggle="modal" data-target="#viewHistroymission"><?php echo ((is_array($_tmp=$this->_tpl_vars['history']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
&<?php echo $this->_tpl_vars['history']['currency']; ?>
;
																<p class="grey-text">
																<?php echo smarty_function_math(array('assign' => 'price_per_word','equation' => '(c/d)','c' => $this->_tpl_vars['history']['unit_price'],'d' => $this->_tpl_vars['history']['nb_words'],'format' => '%.3f'), $this);?>
 
																	<span class="label label-default"><?php echo ((is_array($_tmp=$this->_tpl_vars['price_per_word'])) ? $this->_run_mod_handler('replace', true, $_tmp, '.', ',') : smarty_modifier_replace($_tmp, '.', ',')); ?>
 &<?php echo $this->_tpl_vars['history']['currency']; ?>
; / word</span><br>
																 <?php echo $this->_tpl_vars['history']['company_name']; ?>
 
																 <span class="label label-info plt">Theorical</span>
																 <?php if ($this->_tpl_vars['history']['from_site'] == 'fr'): ?><span class="label label-info plt">FR deal</span><?php endif; ?>
																</p></a>
																<?php if ($this->_tpl_vars['sales_review'] != 'signed'): ?>
																<a  data-target="#hoq-price-modal" data-toggle="modal"  href="/quote-new/get-hoq-prices?quote_id=<?php echo $_GET['quote_id']; ?>
&mindex=<?php echo $this->_tpl_vars['gn_index']; ?>
&mission_id=<?php echo $this->_tpl_vars['mission']['identifier']; ?>
"  class="btn btn-default btn-sm btnPrice">Change selection														</a>
																<?php endif; ?>
	
														<?php else: ?>
															-
														<?php endif; ?>	
														
													</td>
													<td class="col-xs-2 text-center real" <?php if ($this->_tpl_vars['mission']['showtheorical'] == 'yes'): ?>  style="display:none"<?php endif; ?> colspan="3">
														<?php if ($this->_tpl_vars['history']['mission_id'] && $this->_tpl_vars['history']['real_cost']): ?>
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
 class="icheck validate[required]"  <?php if ($this->_tpl_vars['history']['mission_id'] == $this->_tpl_vars['mission']['selected_mission']): ?> checked <?php endif; ?> data-toggle="radio"/>
															</label>
															<a class="hp" href="/quote-new/history-mission-details?quote_id=<?php echo $_GET['quote_id']; ?>
&mission_id=<?php echo $this->_tpl_vars['history']['mission_id']; ?>
&show=real&from_site=<?php echo $this->_tpl_vars['history']['from_site']; ?>
" data-toggle="modal" data-target="#viewHistroymission"><?php echo ((is_array($_tmp=$this->_tpl_vars['history']['real_unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
&<?php echo $this->_tpl_vars['history']['currency']; ?>
;
																<p class="grey-text">
																<?php echo smarty_function_math(array('assign' => 'price_per_word','equation' => '(a/b)','a' => $this->_tpl_vars['history']['real_unit_price'],'b' => $this->_tpl_vars['history']['nb_words'],'format' => '%.3f'), $this);?>
 
																	<span class="label label-default"><?php echo ((is_array($_tmp=$this->_tpl_vars['price_per_word'])) ? $this->_run_mod_handler('replace', true, $_tmp, '.', ',') : smarty_modifier_replace($_tmp, '.', ',')); ?>
 &<?php echo $this->_tpl_vars['history']['currency']; ?>
; / word</span><br>
																	<?php echo $this->_tpl_vars['history']['company_name']; ?>
 
																	 <span class="label label-info plt">Real</span>
																	<?php if ($this->_tpl_vars['history']['from_site'] == 'fr'): ?><span class="label label-info plt">FR deal</span><?php endif; ?>
																</p></a>
																<?php if ($this->_tpl_vars['sales_review'] != 'signed'): ?>
																<a  data-target="#hoq-price-modal" data-toggle="modal"  href="/quote-new/get-hoq-prices?quote_id=<?php echo $_GET['quote_id']; ?>
&mindex=<?php echo $this->_tpl_vars['gn_index']; ?>
&mission_id=<?php echo $this->_tpl_vars['mission']['identifier']; ?>
"  class="btn btn-default btn-sm btnPrice">Change selection														</a>
																<?php endif; ?>
																
														<?php else: ?>
															-
														<?php endif; ?>	
													</td>
												<?php endforeach; endif; unset($_from); ?>
												<td class="col-xs-2 text-center margin-col-calc">
													<span id="actual_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['history_unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;<p class="grey-text">HISTORY BASIS PRICE</p>
													<div ><?php echo $this->_tpl_vars['mission']['history_margin_percentage']; ?>
%</div>
													
												</td>
												<td class="col-xs-2 text-center margin-col-calc" <?php if (( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' ) && $this->_tpl_vars['sales_review'] != 'signed'): ?> data-toggle="modal" data-target="#editarticleprice" <?php endif; ?> onClick="loadeditarticle(<?php echo $this->_tpl_vars['mission']['identifier']; ?>
,'m')">
													<span id="article_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;<p class="grey-text">SELLING PRICE/<?php if ($this->_tpl_vars['mission']['product'] == 'content_strategy'): ?>AUDIT<?php else: ?>ART<?php endif; ?></p>
													<div class="epmargin label label-info" id="epmargin_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
"><?php echo $this->_tpl_vars['mission']['margin_percentage']; ?>
%</div>
													<input type="hidden" value="<?php echo $this->_tpl_vars['mission']['margin_percentage']; ?>
" id="margin_percentage_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="margin_percentage_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
													<input type="hidden" value="<?php echo $this->_tpl_vars['mission']['unit_price']; ?>
" id="unit_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="unit_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
													<input type="hidden" value="<?php echo $this->_tpl_vars['mission']['internal_cost']; ?>
" id="internal_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="internal_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
												</td>
												<td class="col-xs-1 text-right brand-success">
													<span id="price_info_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
												</td>

											<?php else: ?>

												<?php if ($this->_tpl_vars['mission']['product_name'] == 'Content Strategy'): ?>
													<td class="col-xs-2 text-center" colspan="4"></td>
												<?php else: ?>	
													<?php if ($this->_tpl_vars['mission']['hoqPrices'] == 'yes'): ?>
														<td class="col-xs-2 text-center" colspan="3">
															<a data-target="#hoq-price-modal" data-toggle="modal" class="btn btn-default btnPrice" href="/quote-new/get-hoq-prices?quote_id=<?php echo $_GET['quote_id']; ?>
&mindex=<?php echo $this->_tpl_vars['gn_index']; ?>
&mission_id=<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="mission_select_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
																Select price
															</a>	
															<input type="hidden" value="" name="select_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="select_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" class="validate[required]">
														</td>
														<td class="col-xs-2 text-center margin-col-calc">
															<span id="actual_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['history_unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;<p class="grey-text">HISTORY BASIS PRICE</p>
															<div ><?php echo $this->_tpl_vars['mission']['history_margin_percentage']; ?>
%</div>
														</td>
													<?php else: ?>
														<td class="col-xs-2 text-center" colspan="3"> No suggested prices </td>
														<td class="col-xs-2 text-center">
															No history price
														</td>
													<?php endif; ?>	
												<?php endif; ?>	
												<!---->
												<td class="text-center margin-col-calc" <?php if ($this->_tpl_vars['mission']['product_name'] == 'Content Strategy' && ( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' ) && $this->_tpl_vars['sales_review'] != 'signed'): ?>data-toggle="modal" data-target="#editarticleprice"  onClick="loadeditarticle(<?php echo $this->_tpl_vars['mission']['identifier']; ?>
,'m')" <?php endif; ?>>
													<span id="article_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;<p class="grey-text">SELLING PRICE/<?php if ($this->_tpl_vars['mission']['product'] == 'content_strategy'): ?>AUDIT<?php else: ?>ART<?php endif; ?></p>
													<div class="epmargin label label-info" id="epmargin_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
"><?php echo $this->_tpl_vars['mission']['margin_percentage']; ?>
%</div>
													<input type="hidden" value="<?php echo $this->_tpl_vars['mission']['margin_percentage']; ?>
" id="margin_percentage_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="margin_percentage_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
													<input type="hidden" value="<?php echo $this->_tpl_vars['mission']['unit_price']; ?>
" id="unit_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="unit_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
													<input type="hidden" value="<?php echo $this->_tpl_vars['mission']['internal_cost']; ?>
" id="internal_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="internal_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
												</td>
												<td class="text-center brand-success">
													<span id="price_info_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
												</td>
																							<?php endif; ?>						
											
										</tr>

										<?php if (((is_array($_tmp=$this->_tpl_vars['mission']['identifier'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']) : in_array($_tmp, $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']))): ?>
										<?php $this->assign('keys', array_pop(array_search($this->_tpl_vars['quote_missions']['tech']['linked_to_prod']))); ?>

										<?php $_from = $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmission']):
        $this->_foreach['tmission']['iteration']++;
?>
											<?php if ($this->_tpl_vars['mission']['identifier'] == $this->_tpl_vars['tmission']): ?>
											<?php $this->assign('tn_index', ($this->_foreach['tmission']['iteration']-1)); ?>	
											<tr id="tmid_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" class="prod-link-mission">
												<td class="mt" colspan="5">
													<a <?php if ($this->_tpl_vars['sales_review'] != 'signed'): ?> data-toggle="modal" data-target="#viewmission" href="/quote-new/create-quote-mission-details-popup?quote_id=<?php echo $_GET['quote_id']; ?>
&t_index=<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" <?php endif; ?>>
													<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_type']; ?>

														<p class="grey-text" style="font-size:12px;"><span class="glyphicon glyphicon-align-justify"></span>  <span id="mission_volume_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" style="padding-right:20px;"> <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume']; ?>
       </span>             <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['language']; ?>
 </p>
													</a>
												
												</td>
											
												<td class="col-xs-2 text-center margin-col-calc" <?php if (( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' ) && $this->_tpl_vars['sales_review'] != 'signed'): ?> data-toggle="modal" data-target="#editarticleprice" <?php endif; ?> onClick="loadeditarticle(<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
,'')">
												<span id="article_price_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span><sup>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</sup><p class="grey-text">SELLING PRICE</p>
												<div class="epmargin label label-info" id="epmargin_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['margin_percentage']; ?>
%</div>
												<input type="hidden" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['margin_percentage']; ?>
" id="margin_percentage_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" name="margin_percentage_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
												<input type="hidden" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['unit_price']; ?>
" id="unit_price_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" name="unit_price_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
												<input type="hidden" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['internal_cost']; ?>
" id="internal_cost_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" name="internal_cost_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
												</td>
												<td class="col-xs-1 text-right brand-success">
													<span id="price_info_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
												</td>
											</tr>
											<?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>
											<?php endif; ?>
											<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?>	
										
										
										<?php $_from = $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmission']):
        $this->_foreach['tmission']['iteration']++;
?>
											<?php $this->assign('tn_index', ($this->_foreach['tmission']['iteration']-1)); ?>	
											<?php if ($this->_tpl_vars['quote_missions']['tech']['linked_to_prod'][$this->_tpl_vars['tn_index']] == "" && $this->_tpl_vars['quote_missions']['tech']['linked_to_prod'] != 'all_prod'): ?>
												<tr id="tmid_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
										<td class="mt" colspan="5">
											<a <?php if ($this->_tpl_vars['sales_review'] != 'signed'): ?> data-toggle="modal" data-target="#viewmission" href="/quote-new/create-quote-mission-details-popup?quote_id=<?php echo $_GET['quote_id']; ?>
&t_index=<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" <?php endif; ?>>
											<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_type']; ?>

												<p class="grey-text" style="font-size:12px;"> <span class="glyphicon glyphicon-align-justify"></span><span id="mission_volume_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" style="padding-right:20px;"> <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume']; ?>
          </span>         <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['language']; ?>
</p>
											</a>
												
											</td>
											
											<td class="text-center margin-col-calc" <?php if (( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' ) && $this->_tpl_vars['sales_review'] != 'signed'): ?> data-toggle="modal" data-target="#editarticleprice" <?php endif; ?> onClick="loadeditarticle(<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
,'')">
												<span id="article_price_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;<p class="grey-text">SELLING PRICE</p>
												<div class="epmargin label label-info" id="epmargin_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['margin_percentage']; ?>
%</div>
												<input type="hidden" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['margin_percentage']; ?>
" id="margin_percentage_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" name="margin_percentage_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
												<input type="hidden" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['unit_price']; ?>
" id="unit_price_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" name="unit_price_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
												<input type="hidden" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['internal_cost']; ?>
" id="internal_cost_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" name="internal_cost_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
												</td>
												<td class="text-center brand-success">
													<span id="price_info_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
												</td>
											</tr>
										<?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>
										<?php $_from = $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmission']):
        $this->_foreach['tmission']['iteration']++;
?>
											
											<?php $this->assign('tn_index', ($this->_foreach['tmission']['iteration']-1)); ?>	
											<?php if ($this->_tpl_vars['tmission'] == 'all_prod' && $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['to_perform'] != 'Before'): ?>
											<tr id="tmid_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" class="prod-link-mission">
												<td class="mt" colspan="5">
													<a <?php if ($this->_tpl_vars['sales_review'] != 'signed'): ?> data-toggle="modal" data-target="#viewmission" href="/quote-new/create-quote-mission-details-popup?quote_id=<?php echo $_GET['quote_id']; ?>
&t_index=<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" <?php endif; ?>>
													<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_type']; ?>

														<p class="grey-text" style="font-size:12px;"><span class="glyphicon glyphicon-align-justify"></span>  <span id="mission_volume_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" style="padding-right:20px;"> <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume']; ?>
       </span>             <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['language']; ?>
 </p>
													</a>
												
												</td>
										
												<td class="col-xs-2 text-center margin-col-calc" <?php if (( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' ) && $this->_tpl_vars['sales_review'] != 'signed'): ?> data-toggle="modal" data-target="#editarticleprice" <?php endif; ?> onClick="loadeditarticle(<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
,'')">
												<span id="article_price_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;<p class="grey-text">SELLING PRICE</p>
												<div class="epmargin label label-info" id="epmargin_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['margin_percentage']; ?>
%</div>
												<input type="hidden" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['margin_percentage']; ?>
" id="margin_percentage_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" name="margin_percentage_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
												<input type="hidden" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['unit_price']; ?>
" id="unit_price_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" name="unit_price_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
												<input type="hidden" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['internal_cost']; ?>
" id="internal_cost_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
" name="internal_cost_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
">
												</td>
												<td class="col-xs-1 text-right brand-success">
													<span id="price_info_<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
												</td>
											</tr>
											<?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>
									
								</table>
							</div></div></div>
							<?php endif; ?>				
				
				</form>