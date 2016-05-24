<?php /* Smarty version 2.6.19, created on 2015-10-08 09:51:24
         compiled from gebo/quote/mission-followup-details.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/mission-followup-details.phtml', 2, false),array('modifier', 'utf8_encode', 'gebo/quote/mission-followup-details.phtml', 21, false),array('modifier', 'zero_cut', 'gebo/quote/mission-followup-details.phtml', 30, false),array('modifier', 'htmlentities', 'gebo/quote/mission-followup-details.phtml', 56, false),array('modifier', 'nl2br', 'gebo/quote/mission-followup-details.phtml', 56, false),)), $this); ?>
<?php if ($this->_tpl_vars['mission_type'] == 'seo'): ?>
	<?php if (count($this->_tpl_vars['seoMissionDetails']) > 0): ?>
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
				<div class="mission-seo-product"><span id="box_title_<?php echo $this->_tpl_vars['ms_index']; ?>
">Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 <?php echo $this->_tpl_vars['mission']['product_name']; ?>
</span></div>
				<table class="table mission-table">
					<tr>
						<th style="width:25%">Type</th>
						<th style="width:25%">Language</th>
						<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="width:30%" <?php else: ?> style="display:none;width:30%"<?php endif; ?>  id="thead_dtime_<?php echo $this->_tpl_vars['ms_index']; ?>
">Delivery timing</th>														
						<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="width:20%" <?php else: ?> style="display:none;width:20%"<?php endif; ?> id="thead_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
">Cost (&euro;)</th>
						<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;width:35%"<?php else: ?> style="width:35%" <?php endif; ?> id="thead_ptype_<?php echo $this->_tpl_vars['ms_index']; ?>
">Product</th>
						<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;width:15%"<?php else: ?> style="width:15%" <?php endif; ?> id="thead_nwords_<?php echo $this->_tpl_vars['ms_index']; ?>
">Nb of words</th>
					</tr>
					<tr class="misson-details-text">
						<td><?php echo $this->_tpl_vars['mission']['product_name']; ?>
</td>
						<td>															
							<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_source_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 
							<?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>
								> <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_dest_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

							<?php endif; ?>
						</td>
						<td id="td_dtime_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['product'] != 'seo_audit' && $this->_tpl_vars['mission']['product'] != 'smo_audit'): ?> style="display:none;"<?php endif; ?>>															
							<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
 <?php if ($this->_tpl_vars['mission']['mission_length_option'] == 'days'): ?> Days <?php elseif ($this->_tpl_vars['mission']['mission_length_option'] == 'hours'): ?> Hours<?php endif; ?>
						</td>
						<td id="td_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['product'] != 'seo_audit' && $this->_tpl_vars['mission']['product'] != 'smo_audit'): ?> style="display:none;"<?php endif; ?>>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>

						</td>
						<td <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;"<?php endif; ?> id="td_ptype_<?php echo $this->_tpl_vars['ms_index']; ?>
">
							<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>

						</td>
						<td <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;"<?php endif; ?> id="td_nwords_<?php echo $this->_tpl_vars['ms_index']; ?>
">
							<?php echo $this->_tpl_vars['mission']['nb_words']; ?>

						</td>
					</tr>	
				</table>
				<?php if ($this->_tpl_vars['mission']['before_prod'] == 'yes'): ?>
				<div class="row-fluid" style="margin-left: 15px;">
					<div class="span12">					
						<b>To be done before launching prod mission</b>					
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
						<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
					</div>
				</div>
				<?php endif; ?>
										<?php if ($this->_tpl_vars['mission']['files']): ?>
					<div class="row-fluid topset2" >	
						<b style="padding:0 10px;">Related Files</b> <br/>
						<div style="padding:0 10px;">
							<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['files'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

						</div>
					</div>
					<?php endif; ?>
			</div>	
		</div>									
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
<?php elseif ($this->_tpl_vars['mission_type'] == 'tech'): ?>
	<?php if (count($this->_tpl_vars['techMissionDetails']) > 0): ?>
		<?php $_from = $this->_tpl_vars['techMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['mission']['iteration']++;
?>
		<?php $this->assign('gn_index', ($this->_foreach['mission']['iteration']-1)); ?>
		<?php $this->assign('ms_index', ($this->_foreach['mission']['iteration']-1)+1); ?>								
			<div class="row-fluid">	
				<div class="mission-details">
					<div class="mission-tech-product"><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</div>
					<table class="table mission-table">
						<tr>
							<th style="width:33%">Mission</th>
							<th style="width:33%">Delivery timing</th>
							<th style="width:33">Cost (&euro;)</th>
						</tr>
						<tr class="misson-details-text">
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
							<td>
								<?php echo $this->_tpl_vars['mission']['delivery_time']; ?>
<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
 <?php if ($this->_tpl_vars['mission']['delivery_option'] == 'days'): ?> Jours <?php elseif ($this->_tpl_vars['mission']['delivery_option'] == 'hours'): ?> Hours<?php endif; ?>									
							</td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</td>														
						</tr>	
					</table>
					<?php if ($this->_tpl_vars['mission']['before_prod'] == 'yes'): ?>
					<div class="row-fluid" style="margin-left: 15px;">
						<div class="span12">					
							<b>To be done before launching prod mission</b>					
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
								<a><?php echo $this->_tpl_vars['mission']['tech_user_name']; ?>
</a> <?php echo $this->_tpl_vars['mission']['comment_time']; ?>

							</h4>
							<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
						</div>
					</div>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['mission']['files']): ?>
					<div class="row-fluid topset2" >	
						<b style="padding:0 10px;">Related Files</b> <br/>
						<div style="padding:0 10px;">
							<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['files'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>	
<?php elseif ($this->_tpl_vars['mission_type'] == 'prod'): ?>	

	<?php if (count($this->_tpl_vars['prodMissionDetails']) > 0): ?>
	<?php $_from = $this->_tpl_vars['prodMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>
		<?php $this->assign('gn_index', ($this->_foreach['misson']['iteration']-1)); ?>
		<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>	
		<div class="row-fluid">	
			<div class="mission-details">
				
				<div class="prod-mission-product">Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_name']; ?>
</div>
				<table class="table mission-table">
					<tr>
						<th style="width:30%">Language</th>
						<th style="width:30%">Product</th>
						<th style="width:20%">Volume</th>
						<th style="width:20%">Nb of words</th>
					</tr>
					<tr class="misson-details-text">
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_source_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_dest_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
<?php endif; ?></td>
						<td><?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
</td>
						<td><?php echo $this->_tpl_vars['mission']['volume']; ?>
</td>
						<td><?php echo $this->_tpl_vars['mission']['nb_words']; ?>
</td>
					</tr>	
				</table>
				<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
					<?php if (count($this->_tpl_vars['mission']['prod_mission_details']) > 0): ?>
						<?php $_from = $this->_tpl_vars['mission']['prod_mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['prod_mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prod_mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['prod_misson']):
        $this->_foreach['prod_mission']['iteration']++;
?>
							<?php $this->assign('pr_index', ($this->_foreach['prod_mission']['iteration']-1)+1); ?>
							<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">
								<div class="mission-details">
									<div class="mission-prod-product"><span id="box_title_<?php echo $this->_tpl_vars['pr_index']; ?>
">
									<?php if ($this->_tpl_vars['prod_misson']['product'] == 'redaction'): ?>
										Writing
									<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'translation'): ?>
										Translation 
									<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'proofreading'): ?>
										Correction 	
									<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
										Other 		
									<?php endif; ?>												
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
											<th style="width:15%">Set up time</th>
											<th style="width:37%">Volume et tempo / livraison interm&eacute;diaire</th>
											<th style="width:19%">Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['mission']['sales_suggested_currency']; ?>
;)</th>
											<th style="width:16%">Delivery timing</th>
										</tr>				
										<tr class="misson-details-text">
											<td><?php echo $this->_tpl_vars['prod_misson']['staff']; ?>
</td>
											<td><?php echo $this->_tpl_vars['prod_misson']['staff_time']; ?>
 <?php if ($this->_tpl_vars['prod_misson']['staff_time_option'] == 'days'): ?>Jours<?php elseif ($this->_tpl_vars['prod_misson']['staff_time_option'] == 'hours'): ?>Hours<?php endif; ?>												
											</td>
											<td><?php echo $this->_tpl_vars['prod_misson']['delivery_volume']; ?>
 <?php echo $this->_tpl_vars['prod_misson']['delivery_volume_option']; ?>
 <?php echo $this->_tpl_vars['prod_misson']['delivery_volume_time']; ?>
 Jours</td>
											<td><?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</td>
											<td><?php echo $this->_tpl_vars['prod_misson']['delivery_time']; ?>
 <?php if ($this->_tpl_vars['prod_misson']['delivery_option'] == 'days'): ?>Jours<?php elseif ($this->_tpl_vars['prod_misson']['delivery_option'] == 'hours'): ?>Hours<?php endif; ?>
											</td>
											
										</tr>
									</table>
									<?php if ($this->_tpl_vars['prod_misson']['comments']): ?>
									<div class="media mission-comment">
										<a class="pull-left imgframe">
											<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['prod_misson']['created_by']; ?>
/logo.jpg" class="media-object">
										</a>
										<div class="media-body">
											<h4 class="media-heading">								
												<a><?php echo $this->_tpl_vars['prod_misson']['prod_user_name']; ?>
</a> <?php echo $this->_tpl_vars['prod_misson']['comment_time']; ?>

											</h4>
											<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod_misson']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
										</div>												
									</div>
									<?php endif; ?>
								</div>	
							</div>	
						<?php endforeach; endif; unset($_from); ?>							
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
 <label class="label label-warning">SEO proposal</label>						
						</div>
						<table class="table mission-table">
							<tr>
								<th style="width:30%">Language</th>
								<th style="width:30%">Product</th>
								<th style="width:20%">Volume</th>
								<th style="width:20%">Nb of words</th>
							</tr>
							<tr class="misson-details-text">
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_source_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_dest_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
<?php endif; ?></td>
								<td><?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
</td>
								<td><?php echo $this->_tpl_vars['seo_mission']['volume']; ?>
</td>
								<td><?php echo $this->_tpl_vars['seo_mission']['nb_words']; ?>
</td>
							</tr>	
						</table>
						<?php if (count($this->_tpl_vars['seo_mission']['prod_mission_details']) > 0): ?>
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
												Translation 
											<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'proofreading'): ?>
												Correction 	
											<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
												Other 		
											<?php endif; ?>
											</span></div>
											<input type="hidden" name="prod_mission_id_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
">
											<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['seo_mission']['product']; ?>
">
											<table class="table mission-table">
												<tr>
													<th style="width:15%">Nb of writers</th>					
													<th style="width:35%">Set up time</th>														
													<th style="width:35%">Delivery timing</th>						
													<th style="width:15%">Cost/product</th>														
												</tr>				
												<tr class="misson-details-text">													
													<td><?php echo $this->_tpl_vars['prod_misson']['staff']; ?>
</td>
													<td><?php echo $this->_tpl_vars['prod_misson']['staff_time']; ?>
 <?php if ($this->_tpl_vars['prod_misson']['staff_time_option'] == 'days'): ?>Jours<?php elseif ($this->_tpl_vars['prod_misson']['staff_time_option'] == 'hours'): ?>Hours<?php endif; ?>												
													</td>
													<td><?php echo $this->_tpl_vars['prod_misson']['delivery_time']; ?>
 <?php if ($this->_tpl_vars['prod_misson']['delivery_option'] == 'days'): ?>Jours<?php elseif ($this->_tpl_vars['prod_misson']['delivery_option'] == 'hours'): ?>Hours<?php endif; ?>
													</td>
													<td><?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</td>
												</tr>
											</table>
											<div class="media mission-comment">
												<a class="pull-left imgframe">
													<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['prod_misson']['created_by']; ?>
/logo.jpg" class="media-object">
												</a>
												<div class="media-body">
													<h4 class="media-heading">								
														<a><?php echo $this->_tpl_vars['prod_misson']['prod_user_name']; ?>
</a> <?php echo $this->_tpl_vars['prod_misson']['comment_time']; ?>

													</h4>
													<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod_misson']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
												</div>												
											</div>
										</div>	
									</div>
								</div>	
							<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>	
					</div>
				</div>
			<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>		
<?php endif; ?>	