<?php /* Smarty version 2.6.19, created on 2016-04-20 13:43:56
         compiled from gebo-new/quote/create-quote-mission-popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo-new/quote/create-quote-mission-popup.phtml', 90, false),array('modifier', 'is_array', 'gebo-new/quote/create-quote-mission-popup.phtml', 173, false),array('modifier', 'utf8_encode', 'gebo-new/quote/create-quote-mission-popup.phtml', 308, false),)), $this); ?>
<?php echo '
<script type="text/javascript" src="/BO/theme/lbd/js/custom_quote.js"></script>
<script type="text/javascript" src="/BO/theme/lbd/js/wizard.js"></script>
<style>

.modal-backdrop{
	z-index:1;
}
</style>
<script type="text/javascript">
	$(\'input.icheck-input-radio\').radio();
	$(\'input.icheck-input-checkbox\').checkbox();
	
	
</script>
'; ?>

        
<div class="wizard-container"> 
 <div class="modal-header" style="border-bottom:0px !important">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  </div>	
	<div class=" wizard-card ct-wizard-orange" id="wizardProfile">
		<form role="form" action="/quote-new/save-quote-mission?quote_id=<?php echo $_GET['quote_id']; ?>
"  id="create_quote_mission" name="create_quote_mission" class="create_quote_mission form-inline" method="post">
		<input type="hidden" name="edit" value="<?php echo $_GET['mission']; ?>
">
		<input type="hidden" name="mid" value="<?php echo $_GET['mid']; ?>
">
		<input type="hidden" name="tid" value="<?php echo $_GET['tid']; ?>
">
		<input type="hidden" name="techedit" value="<?php echo $_GET['techmission']; ?>
">
			<ul class="hidden">
				<li><a href="#mission-step1" data-toggle="tab"></a></li>
				<li><a href="#mission-step2" data-toggle="tab"></a></li>
				<li><a href="#mission-step3" data-toggle="tab"></a></li>
				<li><a href="#mission-step4" data-toggle="tab" class="last"></a></li>
			</ul>
			<div class="tab-content center-block">
				<div class="row tab-pane" id="mission-step1"> <!-- step 1 mission -->
					 <div class="col-md-12 text-center">
							<p class="form-label" >Type </p>
							<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager'): ?>
							  <label class="text-uppercase radio radio-inline <?php if ($_GET['tid'] || $this->_tpl_vars['mission']['product'] == 'translation' || $this->_tpl_vars['mission']['product'] == 'redaction'): ?> hidden<?php endif; ?>" >
								<input type="radio" class="icheck-input-radio" name="product" id="product" value="content_strategy" <?php if ($this->_tpl_vars['mission']['product'] == 'content_strategy' || $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager'): ?> checked='checked'<?php endif; ?> data-toggle="radio">
								Content Strategy
							  </label>							
							<?php endif; ?>
							<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?>
							
							  <label class="text-uppercase radio radio-inline <?php if ($_GET['mid']): ?> hidden<?php endif; ?>" >
								<input type="radio" name="product" class="icheck-input-radio" id="product" value="tech" <?php if ($this->_tpl_vars['techmission']['product'] == 'tech' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?>checked="checked"<?php endif; ?> data-toggle="radio">
								Tech & Misc
							  </label>							
							<?php endif; ?>
							
							<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?>
							
							  <label class="text-uppercase radio radio-inline <?php if ($_GET['tid'] || $this->_tpl_vars['mission']['product'] == 'content_strategy'): ?> hidden<?php endif; ?>">
								<input type="radio" data-toggle="radio" class="icheck-input-radio" name="product" id="product" value="translation" <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?> checked='checked'<?php endif; ?>>
								Translation
							  </label>							
							
							  <label class="text-uppercase radio radio-inline  <?php if ($_GET['tid'] || $this->_tpl_vars['mission']['product'] == 'content_strategy'): ?> hidden<?php endif; ?>">
							  	<?php if ($this->_tpl_vars['mission']['product']): ?>
								<input type="radio" name="product" data-toggle="radio" class="icheck-input-radio" id="product" value="redaction" <?php if ($this->_tpl_vars['mission']['product'] == 'redaction'): ?>checked='checked'<?php endif; ?> >
								Writing
								<?php elseif ($this->_tpl_vars['techmission']['product'] != 'tech'): ?>
								<input type="radio" name="product" data-toggle="radio" class="icheck-input-radio" id="product" value="redaction" checked>
								Writing
								<?php endif; ?>
							  </label>
							
							<?php endif; ?>
							
							
						</div>

						<div class="col-md-12 text-center content_strategist <?php if ($this->_tpl_vars['mission']['product'] == 'content_strategy' || $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager'): ?><?php else: ?>hidden<?php endif; ?>">
							<p class="form-label">Select Product</p>
							<div class="form-group">
								  <select class="col-md-12" required="required" id="seo_product" name='seo_product' data-title="Select Product"  >
									 <option value="analyse_content_seo">Analyse SEO</option>
								</select>
								</div>
						</div>

							<div class="col-md-12 text-center all_languages">
								 <p class="form-label">Language</p>
								<div class="form-group">
								 
								  <select class="col-md-12" required="required" id="language" name='language' data-title="Select language" data-placeholder="Select language"  >
									  <option></option>
									  <?php if ($this->_tpl_vars['techmission']['language']): ?>
									  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['techmission']['language']), $this);?>

									  <?php else: ?>
										<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['mission']['language']), $this);?>

										<?php endif; ?>
									</select>
									</div>
								<div class="form-group">
								  <select class="<?php if ($this->_tpl_vars['mission']['languagedest'] && $this->_tpl_vars['mission']['product'] == 'translation'): ?> <?php else: ?>hidden<?php endif; ?> checklanguage" required="required" id="languagedest" name='languagedest' data-title="Select language" data-placeholder="Select language"  >
									 <option></option>
									<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['mission']['languagedest']), $this);?>

									</select>
								</div>
							</div>

							<!-- seo mission-->
						<div class="col-md-12 text-center content_strategist <?php if ($this->_tpl_vars['mission']['product'] == 'content_strategy' || $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager'): ?><?php else: ?>hidden<?php endif; ?>">
								<p class="form-label">Mission duration</p>
											 <div class="form-group">
												<input name="strategy_mission_length" id="strategy_mission_length" class="form-control" type="text" value="<?php if ($this->_tpl_vars['mission']['mission_length']): ?><?php echo $this->_tpl_vars['mission']['mission_length']; ?>
<?php else: ?><?php echo $this->_tpl_vars['seo_mission_length']; ?>
<?php endif; ?>">
											</div>
											<div class="form-group">				
												<select name="strategy_mission_length_option" id="strategy_mission_length_option" class="pull-left">
													<option value="days">Jours</option>
												</select>	
											</div>
						</div>
						<!--<div class="col-md-12 text-center content_strategist <?php if ($this->_tpl_vars['mission']['product'] == 'content_strategy' || $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager'): ?><?php else: ?>hidden<?php endif; ?>">
								<p class="form-label">Mission cost</p>
											 <div class="form-group">
												<input name="strategy_mission_cost" id="strategy_mission_cost" class="form-control" type="text" value="<?php if ($this->_tpl_vars['mission']['internal_cost']): ?><?php echo $this->_tpl_vars['mission']['internal_cost']; ?>
<?php endif; ?>">
											</div>
											
						</div>-->
											
				
				</div> <!-- Step1 End -->
				<div class="row tab-pane" id='mission-step2'> <!-- Step2 start -->
					<div class="col-md-12 text-center language-label <?php if ($this->_tpl_vars['techmission']['product']): ?>hidden<?php endif; ?>" >
						 <p class="form-label" >Produit </p>
						<div class="form-group">
							<select name="producttype" id="producttype" class="" data-title="Select Produit" onchange="fnCheckProductType(this);">
							<option></option>
							<?php $_from = $this->_tpl_vars['producttype_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['productloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['productloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['productloop']):
        $this->_foreach['productloop']['iteration']++;
?>
								<?php if ($this->_tpl_vars['mission']['producttype'] == $this->_tpl_vars['key']): ?>
								<option value="<?php echo $this->_tpl_vars['key']; ?>
" selected="selected" configwords="<?php echo $this->_tpl_vars['oneshot_product'][$this->_tpl_vars['key']]; ?>
"><?php echo $this->_tpl_vars['productloop']; ?>
</option>
								<?php else: ?>
								<option value="<?php echo $this->_tpl_vars['key']; ?>
"  configwords="<?php echo $this->_tpl_vars['oneshot_product'][$this->_tpl_vars['key']]; ?>
"><?php echo $this->_tpl_vars['productloop']; ?>
</option>
								<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
							</select>
							<div id="producttypeotherdiv"  style="display: none;">
								<input type="text" class="validate[required] form-control" value="<?php echo $this->_tpl_vars['mission']['producttypeother']; ?>
" id="producttypeother" name="producttypeother">
							</div>
						</div>
					</div>	
						<div class="col-md-12 text-center language-label <?php if ($this->_tpl_vars['techmission']['product']): ?>hidden<?php endif; ?>">
							 <p class="form-label" >nb mots </p>
							<div class="form-group">
								<input type="text" name="nb_words" id="nb_words" class="form-control validate[required,custom[number]] input-small" value="<?php echo $this->_tpl_vars['mission']['nb_words']; ?>
" rel="<?php echo $this->_tpl_vars['oneshot_max_writers']; ?>
">
							</div>
						</div>
						<!--Tech Mission step 1-->
						<div class="col-md-12 text-center <?php if ($this->_tpl_vars['techmission']['product']): ?> <?php else: ?> hidden<?php endif; ?> tech-miss">
								<div class="col-md-12 text-center" style="margin-bottom:10px;">
									 <p class="form-label">Link to prod mission</p>
										<div class="form-group ">
										  <input name="prod_mission_selected" type='hidden' value="<?php if ($this->_tpl_vars['techmission']['prod_mission_selected']): ?><?php echo $this->_tpl_vars['techmission']['prod_mission_selected']; ?>
<?php else: ?>No<?php endif; ?>" id="prod_mission_selected"/>
										     <div class="btn-group" data-toggle="buttons">
											    <button class="btn btn-sm btn-default <?php if ($this->_tpl_vars['techmission']['prod_mission_selected'] == 'Yes'): ?>btn-primary active<?php endif; ?>" <?php if ($this->_tpl_vars['prod_mission_count'] != 0): ?><?php else: ?> disabled="disabled"<?php endif; ?> data-radio-name="prod_mission_selected" onclick="selectProdMission();">Yes</button>
											    <button class="btn btn-sm  btn-default <?php if ($this->_tpl_vars['techmission']['prod_mission_selected'] == 'No' || $this->_tpl_vars['techmission']['prod_mission_selected'] == ""): ?> btn-primary active<?php else: ?><?php endif; ?>" data-radio-name="prod_mission_selected" onclick="deselectProdMission();">No</button>
											  </div>
										</div>
										
								</div>
								
								<div class="form-group mission_perform" >
								<?php if ($_GET['tid']): ?>
								<?php $this->assign('tid', $_GET['tid']); ?>
								<?php endif; ?>
									   <select class="<?php if ($this->_tpl_vars['techmission']['prod_mission_selected'] == 'Yes'): ?><?php else: ?>hidden<?php endif; ?>" required="required" id="prodmissionslist" name='prodmissionslist' data-title="SELECT A PROD MISSION" onchange="fnprodvolume(this); return false;" >
									   <option></option>
										
										 <?php $_from = $this->_tpl_vars['prod_missions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['prod_title_array'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prod_title_array']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['prod_title_array']):
        $this->_foreach['prod_title_array']['iteration']++;
?>
										 <?php if (((is_array($_tmp=$this->_tpl_vars['prod_title_array'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?>

										 <?php else: ?>
										<option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['techmission']['linked_to_prod'] == $this->_tpl_vars['key'] && $this->_tpl_vars['techmission']['linked_to_prod'] != ""): ?> selected='selected'<?php endif; ?> rel="<?php echo $this->_tpl_vars['prod_missions']['volume'][$this->_tpl_vars['key']]; ?>
" ><?php echo $this->_tpl_vars['prod_title_array']; ?>
</option>
										<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?>
										</select>
			
								</div>
								<div class="col-md-12 text-center">
									 <p class="form-label text-uppercase">To Perform</p>
										
										   <label class="text-uppercase radio radio-inline mission_perform <?php if ($this->_tpl_vars['techmission']['prod_mission_selected'] == 'Yes'): ?><?php else: ?>hidden<?php endif; ?>">
											<input type="radio" class="icheck-input-radio" name="to_perform" id="to_perform" value="Before" <?php if ($this->_tpl_vars['techmission']['to_perform'] == 'Before'): ?> checked='checked'<?php elseif ($this->_tpl_vars['techmission']['to_perform'] == "" && $this->_tpl_vars['techmission']['prod_mission_selected'] == 'Yes'): ?> checked='checked' <?php else: ?> <?php endif; ?>>
											Before
										  </label>
										
										
										   <label class="text-uppercase radio radio-inline">
										  	
											<input type="radio" name="to_perform" class="icheck-input-radio" id="to_perform" value="During" <?php if ($this->_tpl_vars['techmission']['to_perform'] == 'During' || $this->_tpl_vars['techmission']['to_perform'] == ""): ?> checked='checked'<?php endif; ?>>
											During
											
										  </label>
										
										
										  <label class="text-uppercase radio radio-inline mission_perform <?php if ($this->_tpl_vars['techmission']['prod_mission_selected'] == 'Yes'): ?><?php else: ?>hidden<?php endif; ?>">
											<input type="radio" name="to_perform" class="icheck-input-radio" id="to_perform" value="After" <?php if ($this->_tpl_vars['techmission']['to_perform'] == 'After'): ?>checked="checked"<?php endif; ?>>
											After
										  </label>
										
								</div>
						</div>						
				</div><!-- Step2 End -->
				
				<div class="row tab-pane" id='mission-step3'><!-- Step3 start -->

					<div class="col-md-12 text-center language-label oneshot-no hidden <?php if ($this->_tpl_vars['techmission']['product']): ?>hidden<?php endif; ?>">
						<p class="form-label" >Volume</p>
						<div class="form-group">
							<input name="volume_no" id="volume-no" class="form-control validate[required,custom[number]] input-small" type="text" placeholder="Volume" value="<?php echo $this->_tpl_vars['mission']['volume']; ?>
">
						</div>
					</div>
					<div class="col-md-12 text-center oneshot-yes language-label <?php if ($this->_tpl_vars['techmission']['product']): ?>hidden<?php endif; ?>">
						<p class="form-label" >Volume</p>
						<div class="form-group">
							<input name="volume_yes" id="volume-yes" class="form-control validate[required,custom[number]] input-small" type="text" placeholder="Volume" value="<?php echo $this->_tpl_vars['mission']['volume']; ?>
">
						</div>
					</div>
					<div class="col-md-12 text-center language-label <?php if ($this->_tpl_vars['techmission']['product']): ?>hidden<?php endif; ?>">
						<p class="form-label" >One shot </p>
						<div class="form-group">
							
							  <label class="text-uppercase radio radio-inline">
								<input type="radio" name="oneshot" class="icheck-input-radio" id="oneshot" value="yes" <?php if ($this->_tpl_vars['mission']['oneshot'] == 'yes'): ?>checked <?php elseif ($this->_tpl_vars['mission']['oneshot'] != 'no'): ?> checked <?php endif; ?>>
								Oneshot
							  </label>
							
							  <label class="text-uppercase radio radio-inline">
								<input type="radio" name="oneshot" class="icheck-input-radio" id="oneshot" value="no" <?php if ($this->_tpl_vars['mission']['oneshot'] == 'no'): ?>checked <?php endif; ?>>
								Schedule
							  </label>
							
						</div>
					</div>
					

					<div class="col-md-12 text-center language-label <?php if ($this->_tpl_vars['techmission']['product']): ?>hidden<?php endif; ?>">
						<div class="oneshotVolume"  id="tempo_details" <?php if ($this->_tpl_vars['mission']['oneshot'] != 'no'): ?>style="display:none"<?php endif; ?>>
							<div class="col-md-12 text-center">
								<div class="form-group">
									<input name="volume_max" id="volume_max" class="form-control validate[required,custom[number]] input-small" type="text" placeholder="Volume" value="<?php echo $this->_tpl_vars['mission']['volume_max']; ?>
">
								</div>
								<div class="form-group">
									<select name="tempo_type" id="tempo_type" class="">
										<option <?php if ($this->_tpl_vars['mission']['tempo_type'] == 'fix'): ?> selected='selected' <?php endif; ?> value='fix' tempoconfig="<?php echo $this->_tpl_vars['tempo_fix']; ?>
-<?php echo $this->_tpl_vars['tempo_fix_days']; ?>
">Fixe</option>
										<option <?php if ($this->_tpl_vars['mission']['tempo_type'] == 'max'): ?> selected='selected' <?php endif; ?> value="max"  tempoconfig="<?php echo $this->_tpl_vars['tempo_max']; ?>
-<?php echo $this->_tpl_vars['tempo_max_days']; ?>
">Max</option>
									</select>
									</div>
								<div class="form-group">
									<select name="delivery_volume_option" id="delivery_volume_option" class="">
										<option <?php if ($this->_tpl_vars['mission']['delivery_volume_option'] == 'every'): ?> selected='selected' <?php endif; ?> value="every" >Tous les</option>
										<option <?php if ($this->_tpl_vars['mission']['delivery_volume_option'] == 'within'): ?> selected='selected' <?php endif; ?> value="within">Sous</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" id="tempo_length" name="tempo_length" class="form-control validate[required] input-small" value="<?php echo $this->_tpl_vars['mission']['tempo_length']; ?>
" />
									</div>
								<div class="form-group">
									<select name="tempo_length_option" id="tempo_length_option" class="">
									<option <?php if ($this->_tpl_vars['mission']['tempo_length_option'] == 'days'): ?> selected='selected' <?php endif; ?> value="days">Jours</option>
									<option <?php if ($this->_tpl_vars['mission']['tempo_length_option'] == 'week'): ?> selected='selected' <?php endif; ?> value="week" >Semaine</option>
									<option <?php if ($this->_tpl_vars['mission']['tempo_length_option'] == 'month'): ?> selected='selected' <?php endif; ?> value="month" >Mois</option>
									<option <?php if ($this->_tpl_vars['mission']['tempo_length_option'] == 'year'): ?> selected='selected' <?php endif; ?> value="year">An</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					

					<div class="col-md-12 text-center language-label <?php if ($this->_tpl_vars['techmission']['product']): ?>hidden<?php endif; ?>">
						<p class="form-label" >Mission duration  </p>
						<div class="row">
							<div class="col-md-6">
								<div class=" pull-right <?php if ($this->_tpl_vars['mission']['mission_length'] == "" && $this->_tpl_vars['mission']): ?>hidden<?php endif; ?>" id="mission_duration_details">
									<div class="form-group">
									<input name="mission_length" id="mission_length" class="form-control validate[required,custom[number]] input-small" type="text" value="<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
">
									</div>
									<div class="form-group">						
										<select name="mission_length_option" id="mission_length_option" class="">
										<option <?php if ($this->_tpl_vars['mission']['mission_length_option'] == 'days'): ?> selected="selected" <?php endif; ?> value="days">Jours</option>
										</select>	
									</div>
								</div>
							</div>
							<div class="col-md-6">
									<label class="checkbox checkbox checkbox-inline pull-left">
									<input type="checkbox" class="dont_know icheck-input-checkbox" id="duration_dont_know"  name="duration_dont_know" <?php if ($this->_tpl_vars['mission']['mission_length'] == "" && $this->_tpl_vars['mission']): ?>checked<?php endif; ?>>Je ne sais pas
									</label>			
							</div>							
							<div class="clearfix"></div>
						</div>
						<input name="volume" id="volume" type="hidden" placeholder="Volume" value="<?php echo $this->_tpl_vars['mission']['volume']; ?>
">
					</div>
					
						
					<!--Tech Mission step 2-->
					<div class="col-md-12 text-center <?php if ($this->_tpl_vars['techmission']['product'] == 'tech'): ?> <?php else: ?> hidden<?php endif; ?> tech-miss">
								<div class="col-md-12 text-center">
								 <p class="form-label">Tech & Misc Title</p>
								<div class="form-group">
								   <select class="" required="required " id="tech_title" name='tech_title' data-title="Please select a title" onchange="techtitleDetails(this.value); return false;">
									  <option></option>
									<?php $_from = $this->_tpl_vars['tech_mission_title']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['title_array'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['title_array']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['title_array']):
        $this->_foreach['title_array']['iteration']++;
?>
										<option value="<?php echo $this->_tpl_vars['title_array']['tid']; ?>
" <?php if ($this->_tpl_vars['techmission']['tech_title_id'] == $this->_tpl_vars['title_array']['tid']): ?>selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['title_array']['tech_title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
									<?php endforeach; endif; unset($_from); ?>
									</select>
									<input type="hidden" value="<?php echo $this->_tpl_vars['techmission']['tech_type']; ?>
" name="tech_type" id="tech_type" rel="<?php echo $this->_tpl_vars['techmission']['tech_title_id']; ?>
">
									</div>
									</div>
									
									<div class="col-md-12 text-center">
											 <p class="form-label">Please select a tempo</p>
										 		<div class="form-group">
												
												  <label class="text-uppercase radio radio-inline">
													<input type="radio" name="tech_oneshot" class="icheck-input-radio" id="tech_oneshot" value="yes" <?php if ($this->_tpl_vars['techmission']['tech_oneshot'] == 'yes'): ?>checked <?php elseif ($this->_tpl_vars['techmission']['tech_oneshot'] != 'no'): ?> checked <?php endif; ?>>
													Oneshot
												  </label>
												
												  <label class="text-uppercase radio radio-inline">
													<input type="radio" name="tech_oneshot" class="icheck-input-radio" id="tech_oneshot" value="no" <?php if ($this->_tpl_vars['techmission']['tech_oneshot'] == 'no'): ?>checked <?php endif; ?>>
													Schedule
												  </label>
												
											</div>
										</div>
										<div class="col-md-12 text-center tech_shecdule ">
											<div class="techoneshotVolume"  id="tempo_details" <?php if ($this->_tpl_vars['techmission']['tech_oneshot'] != 'no'): ?>style="display:none"<?php endif; ?>>
											<div class="col-md-12 text-center">
												<div class="form-group">
													<input name="tech_volume_max" id="tech_volume_max" class="form-control validate[required,custom[number]] input-small" type="text" placeholder="Volume" value="<?php echo $this->_tpl_vars['techmission']['volume_max']; ?>
">
												</div>
												<div class="form-group">
													<select name="tech_tempo_type" id="tech_tempo_type" class="">
														<option <?php if ($this->_tpl_vars['techmission']['tempo_type'] == 'fix'): ?> selected='selected' <?php endif; ?> value='fix'>Fixe</option>
													</select>
													</div>
												<div class="form-group">
													<select name="tech_delivery_volume_option" id="tech_delivery_volume_option" class="">
														<option <?php if ($this->_tpl_vars['techmission']['delivery_volume_option'] == 'every'): ?> selected='selected' <?php endif; ?> value="every" >Tous les</option>
														<option <?php if ($this->_tpl_vars['techmission']['delivery_volume_option'] == 'within'): ?> selected='selected' <?php endif; ?> value="within">Sous</option>
													</select>
												</div>
												<div class="form-group">
													<input type="text" id="tech_tempo_length" name="tech_tempo_length" class="form-control validate[required] input-small" value="<?php echo $this->_tpl_vars['techmission']['tempo_length']; ?>
" />
													</div>
												<div class="form-group">
													<select name="tech_tempo_length_option" id="tech_tempo_length_option" class="">
													<option <?php if ($this->_tpl_vars['techmission']['tempo_length_option'] == 'days'): ?> selected='selected' <?php endif; ?> value="days">Jours</option>
													<option <?php if ($this->_tpl_vars['techmission']['tempo_length_option'] == 'week'): ?> selected='selected' <?php endif; ?> value="week" >Semaine</option>
													<option <?php if ($this->_tpl_vars['techmission']['tempo_length_option'] == 'month'): ?> selected='selected' <?php endif; ?> value="month" >Mois</option>
													<option <?php if ($this->_tpl_vars['techmission']['tempo_length_option'] == 'year'): ?> selected='selected' <?php endif; ?> value="year">An</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 text-center hidden tech_mission_length_div">
									 <p class="form-label">Mission duration</p>
									 	<div class="form-group" >
											 <div class="form-group">
												<input name="tech_mission_length" id="tech_mission_length" class="form-control pull-right <?php if ($this->_tpl_vars['techmission']['tech_mission_length']): ?> <?php else: ?>hidden<?php endif; ?>" type="text" value="<?php echo $this->_tpl_vars['techmission']['tech_mission_length']; ?>
">
											</div>	
											<div class="form-group">				
												<select name="tech_mission_length_option" id="tech_mission_length_option" class="pull-left">
													<option value="days" <?php if ($this->_tpl_vars['techmission']['tech_mission_length_option'] == 'days'): ?>selected="selected"<?php endif; ?>>Jours</option>
												</select>	
											</div>
										</div>
										
									</div>
									<div class="col-md-12 text-center tech_volume_div">
									 <p class="form-label">Volume</p>
									 	<div class="form-group " >
											 <div class="form-group">
												<input name="tech_volume" id="tech_volume" class="form-control pull-right" type="text" value="<?php if ($this->_tpl_vars['techmission']['volume']): ?><?php echo $this->_tpl_vars['techmission']['volume']; ?>
<?php else: ?>1<?php endif; ?>">
											</div>	
										</div>
										
									</div>
									
			
							</div>
				</div>	<!-- Step3 End -->			
					<div class="row tab-pane" id='mission-step4'> <!-- Step4 start -->
					<div class="col-md-12">
						<p class="form-label text-center" >Mission Summary</p>								 
						<div class="row">
							<div class="col-md-6"><label class="text-uppercase pull-right">
								Mission Type:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="mission-type"> </p></div>
							<div class="clearfix"></div>
						</div>
						<div class="row mission-default tech-mission">
							<div class="col-md-6"><label class="text-uppercase pull-right">
								Mission Language:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="mission-language1"> </p></div>
							<div class="clearfix"></div>
						  </div>
						<div class="row mission-default tran-language">
							<div class="col-md-6"><label class="text-uppercase pull-right">
								Mission Language2:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="mission-language2"> </p></div>
							<div class="clearfix"></div>
						</div>
						<div class="row tech-mission hidden">
							<div class="col-md-6"><label class="text-uppercase pull-right">
								Mission Title:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="mission-title"> </p></div>
							<div class="clearfix"></div>
						</div>
						<div class="row tech-mission hidden">
							<div class="col-md-6"><label class="text-uppercase pull-right">
								Linked To:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="linkedto"> </p></div>
							<div class="clearfix"></div>
						</div>
						<div class="row tech-mission hidden">
							<div class="col-md-6"><label class="text-uppercase pull-right">
								To Perform:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="mission-perform"> </p></div>
							<div class="clearfix"></div>
						</div>
						<div class="row mission-default">
							<div class="col-md-6"><label class="text-uppercase pull-right" >
								Product Type:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="product-lang"></p></div>
							<div class="clearfix"></div>
						</div>
						<div class="row content-strategy hidden">
							<div class="col-md-6"><label class="text-uppercase pull-right" >
								mission product:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="seo-mission-cost"> </p></div>
							<div class="clearfix"></div>
						</div>

						<div class="row mission-default">
							<div class="col-md-6"><label class="text-uppercase pull-right">
								Word:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="pro-words"></p></div>
							<div class="clearfix"></div>
						</div>
						<div class="row mission-default tech-mission">
							<div class="col-md-6"><label class="text-uppercase pull-right">
								Tempo:</label>
								</div>
							<div class="col-md-6"> <p class="text-left" id="oneshot-tempo"> </p></div>
							<div class="clearfix"></div>
						</div>
						<div class="row mission-default tech-mission">
							<div class="col-md-6"><label class="text-uppercase pull-right" >
								Mission duration:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="duration-val"> </p></div>
							<div class="clearfix"></div>
						</div>
						
						<div class="row content-strategy hidden">
							<div class="col-md-6"><label class="text-uppercase pull-right" >
								mission language:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="content-language1"> </p></div>
							<div class="clearfix"></div>
						</div>
						<div class="row content-strategy hidden">
							<div class="col-md-6"><label class="text-uppercase pull-right" >
								Mission duration:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="content-duration"> </p></div>
							<div class="clearfix"></div>
						</div>
					
						<div class="row mission-default tech-mission">
							<div class="col-md-6"><label class="text-uppercase pull-right" >
								Total Volume:</label>
								</div>
							<div class="col-md-6"> <p class="pull-left" id="total-vol"> </p></div>
							<div class="clearfix"></div>
						</div>										 
					</div>
				</div> <!-- Step4 End -->
			</div>
			<div class="row" > <!-- Button Start -->
				<div class="col-md-12 text-center">
					<div class="wizard-footer center-block ">
						<div class="loading_img hidden">
						<img src="/BO/theme/lbd/img/ajax_loader.gif" />
						</div>
						<button type='button' class='btn btn-previous btn-fill btn-default text-uppercase' name='previous' value='Back'><span class="glyphicon glyphicon-menu-left" ></span>Back
						</button> 
						
						<button type='button' class='btn btn-next btn-fill text-uppercase' name='next' value=''> Next <span class="glyphicon glyphicon-menu-right"></span></button>
						
						<button  class='btn btn-finish btn-fill text-uppercase button-submit' name='quote_mission'><?php if ($this->_tpl_vars['mission']['product'] || $this->_tpl_vars['techmission']['product']): ?>Edit a Mission<?php else: ?>Create a Mission<?php endif; ?></button>

						<div class="col-md-12">
						<button type='button' class='btn btn-finish btn-lg btn-fill text-uppercase' id="duplicate-button" title='Duplicate Mission'>Duplicate Mission</button>
						</div>
					</div>	
				</div>	
			</div>	<!-- Button End-->
		</form>
	</div>


<!-- Duplicate Mission start-->

	<div id="duplicate-mission-form" class="hidden row">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo-new/quote/duplicate-quote-mission-popup.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
</div>
<?php echo '
<script type="">
$(document).ready(function(){

	$(\'.button-submit\').on(\'click\',function(){
		$(\'#create_quote_mission\').submit();
		$(\'.loading_img\').removeClass(\'hidden\');
		$(\'.button-submit\').attr(\'disabled\',\'disabled\');
		

	});


prodval=$(\'#product:checked\').val();

		$("#duplicate-button").on("click",function(){
			//alert(\'test\');
			ajaxFormsubmit();			
			$("#wizardProfile").addClass(\'hidden\');
			$("#duplicate-mission-form").removeClass(\'hidden\');
			val=$(\'#product:checked\').val()
			if(val==\'tech\'){
				$(\'.tech_element\').removeClass(\'hidden\');
			}
			else{
				$(\'.mission_element\').removeClass(\'hidden\');
			}
		});

		
		
		if(prodval==\'translation\')
		{
			//$("#languagedest").addClass(\'hidden\');
			//$("#languagedest").selectpicker();
			$("#languagedest").chosen({ allow_single_deselect: false,search_contains: true});
			
		}
		else if(prodval==\'tech\')
		{						
			$(".mission-default").addClass(\'hidden\');	
			$(".tech-mission").removeClass(\'hidden\');
			$("#tech_mission_length_option").selectpicker();
			prod_mission_val=$(\'#prod_mission_selected\').val();
			
			if(prod_mission_val==\'Yes\')
			{
				$("#prodmissionslist").selectpicker();
				$("#prodmissionslist").addClass(\'hidden\');
			}
			techtitleupdate();

		}
		if(prodval==\'content_strategy\')
		{
			$(\'#seo_product\').selectpicker()
			$("#strategy_mission_length_option").selectpicker();
		}

		$("#tech_title").on(\'change\',function(){
			var titleval=$(this).find(\'option:selected\');
			$(\'#tech_type\').val(titleval.text());
			$(\'#tech_type\').attr(\'rel\',titleval.val());
		});
		$("body").on(\'change\',"#tech_oneshot", function (event) {
			var value=this.value;
		
			if(value==\'no\'){

					$(".tech_shecdule").show();
					$(".techoneshotVolume").show();
					$(".tech_mission_length_div").removeClass(\'hidden\');
					$(".tech_volume_div").addClass(\'hidden\');
					techoneshotVolume(\'change\');
				}
			else{

					$(".tech_shecdule").hide();
					$(".tech_volume_div").removeClass(\'hidden\');
					$(".tech_mission_length_div").addClass(\'hidden\');
					
					var tech_title=$("#tech_title").val();					
					if(tech_title)
						techtitleDetails(tech_title);
				}
		});

		if(prodval!=\'tech\')
		{
			productType=$("#producttype").val();
						if(productType==\'autre\')
						{
							$("#nb_words").removeAttr("min").removeAttr("max");
							$("#producttypeotherdiv").show();
							
						}
						else if(productType==\'article_de_blog\')
						{
							$("#nb_words").attr("min",\'250\');
							$("#nb_words").attr("max",\'500\');
						}
					   else if(productType==\'news\')
						{
							$("#nb_words").attr("min",\'50\');
							$("#nb_words").attr("max",\'200\');
					  	}
					   else if(productType==\'descriptif_produit\')
					   {
							$("#nb_words").attr("min",\'30\');
							$("#nb_words").attr("max",\'150\');
					   	}
					   else if(productType==\'guide\')
					   {
							$("#nb_words").attr("min",\'500\');
							$("#nb_words").attr("max",\'1500\');
						}
						else if(productType==\'wordings\')
						{
						$("#nb_words").attr("min",\'1\');
						$("#nb_words").attr("max",\'1\');
						}
						else
						{
						$("#nb_words").removeAttr("min").removeAttr("max");
						}
		}


		$(\'.btn[data-radio-name]\').click(function() {
		    $(\'.btn[data-radio-name="\'+$(this).data(\'radioName\')+\'"]\').removeClass(\'active\');
		    $(\'.btn[data-radio-name="\'+$(this).data(\'radioName\')+\'"]\').removeClass(\'btn-primary\');

		    $(this).addClass(\'btn-primary\');
		    $(\'input[name="\'+$(this).data(\'radioName\')+\'"]\').val(
		        $(this).text()
		    );
		    	techtitleupdate();

		});
		
});
function ajaxFormsubmit(){
		$.ajax({
				url:\'/quote-new/save-quote-mission\',
				type:\'POST\',
				data:$(\'#create_quote_mission\').serialize(),
				success:function(html){
				//alert(html);
				}
			});
	}

function selectProdMission()
{
	$(\'#prodmissionslist\').removeClass(\'hidden\');
	$("#prodmissionslist").selectpicker();
	$(\'.mission_perform\').removeClass(\'hidden\');
	
}
function deselectProdMission()
{
	$(\'#prodmissionslist\').addClass(\'hidden\');
	$(\'.mission_perform\').addClass(\'hidden\');
	//$(\'input[name="to_perform"]\').iCheck(\'uncheck\');

	var previousValue = $(\'input[name="to_perform"]:checked\').val();
  var name = $(\'input[name="to_perform"]:checked\').attr(\'name\');


  if (previousValue != \'During\')
  {
    $(\'input[name="to_perform"][value=\'+previousValue+\']\').removeAttr(\'checked\');
    $(\'input[name="to_perform"][value=\'+previousValue+\']\').closest(\'label\').removeClass(\'checked\');
     $(\'input[name="to_perform"][value="During"]\').attr(\'checked\', true);
     $(\'input[name="to_perform"][value="During"]\').closest(\'label\').addClass(\'checked\');
  }
 
	
}
function techtitleDetails(title_id){
	techval=title_id;
	
	 var target_page = "/quote-new/tech-delivery-mission?title_id="+techval;	
		$.post(target_page, function(data){					
				var missionlen=data.split(\'-\');				
				$("#tech_mission_length").val(missionlen[0].trim());
					$("#tech_mission_length_option").val(missionlen[1].trim());
				techoneshotVolume(\'change\');
			});
		

}

function fnprodvolume(prod)
{		
			prod_volume=$(prod).find(\'option:selected\').attr(\'rel\');
			//$("#tech_volume").val(prod_volume);
}

function techtitleupdate()
{

 prod_mission_val=$(\'#prod_mission_selected\').val();
			
				if(prod_mission_val)
				{
					techtitleval=$(\'#tech_type\').val();
					if(techtitleval !="")
					{
					techtypeid="&typeid="+$(\'#tech_type\').attr(\'rel\');	
					}
					else
					{
					techtypeid="";
					}
					 $("#tech_title").selectpicker();
					/*var target_page = "/quote-new/tech-title-select?prod_mission_val="+prod_mission_val+techtypeid;
					$.post(target_page, function(data){					
					var select = $(\'#tech_title\');
						select.empty().html(data);
							$(\'#tech_title\').attr("data-title","Please select a title")
							$("#tech_title").selectpicker();	
							$(\'#tech_title\').trigger("chosen:updated");
							$("#tech_title").addClass(\'hidden\');
						});	*/
				}
}
</script>
'; ?>