<?php /* Smarty version 2.6.19, created on 2015-12-11 15:30:42
         compiled from gebo/quote/sales-quotes-list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut_t', 'gebo/quote/sales-quotes-list.phtml', 9, false),array('modifier', 'count', 'gebo/quote/sales-quotes-list.phtml', 46, false),array('modifier', 'date_format', 'gebo/quote/sales-quotes-list.phtml', 56, false),)), $this); ?>
<div class="row-fluid">
	<div class="span2">
    	<h1 class="heading">All quotes</h1>
    	<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>	
				<div style="margin-top: -15px"><a href="/quote/create-quote-step1?qaction=new&submenuId=ML13-SL2" class="btn btn-warning">Create a new quote</a></div>
			<?php endif; ?>	
			</div>
			
		<div class="span2">Ongoing <h1 class="muted"><?php echo ((is_array($_tmp=$this->_tpl_vars['total_ongoing_turnover_euro'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &euro;</h1>
		<h2 class="muted"><?php echo ((is_array($_tmp=$this->_tpl_vars['total_ongoing_turnover_pound'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &pound;</h2>
		</div>
		<div class="span2">Validated <h1><?php echo ((is_array($_tmp=$this->_tpl_vars['validated_turnover_euro'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &euro;</h1><h2 class=""><?php echo ((is_array($_tmp=$this->_tpl_vars['validated_turnover_pound'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &pound;</h2></div>
		<div class="span2">A relancer <h1><?php echo ((is_array($_tmp=$this->_tpl_vars['relancer_turnover_euro'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &euro;</h1><h2 class=""><?php echo ((is_array($_tmp=$this->_tpl_vars['relancer_turnover_pound'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &pound;</h2></div>
		<div class="span2">Signed <h1><?php echo ((is_array($_tmp=$this->_tpl_vars['signed_turnover_euro'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &euro;</h1><h2 class=""><?php echo ((is_array($_tmp=$this->_tpl_vars['signed_turnover_pound'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &pound;</h2></div>
		<div class="span2">Average signature <h2><?php echo ((is_array($_tmp=$this->_tpl_vars['day_difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 days</h2></div>
		</div>
		
		<div class="row-fluid">
			<div class="span12">
				<ul class="nav nav-tabs">
					<li class="<?php if ($_GET['active'] == ''): ?> active <?php endif; ?>"><a href="#ongoing" data-toggle="tab">Ongoing</a></li>
					<li class="<?php if ($_GET['active'] == 'validated'): ?> active <?php endif; ?>"><a href="#validated" data-toggle="tab">Sent</a></li>
					<li class="<?php if ($_GET['active'] == 'signed'): ?> active <?php endif; ?>"><a href="#signed" data-toggle="tab">Signed</a></li>
					<li class="<?php if ($_GET['active'] == 'closedrelancer'): ?> active <?php endif; ?>"><a href="#relancer" data-toggle="tab">Relance</a></li>
					<li class="<?php if ($_GET['active'] == 'closed'): ?> active <?php endif; ?>"><a href="#closedQuotes" data-toggle="tab">Closed</a></li>
					<li class="<?php if ($_GET['active'] == 'deleted'): ?> active <?php endif; ?>"><a href="#deleted" data-toggle="tab">Deleted</a></li>					
				</ul>	
				<div class="tab-content">
					<div class="tab-pane fade <?php if ($_GET['active'] == ''): ?> in active <?php endif; ?>" id="ongoing">
						 <table class="table table-bordered table-hover table_vam" id="ong_quotesList" >
							<thead>
								<tr>								  
								   <th>Client</th>
								   <th>Category</th>
								   <th>Quote name</th>
								   <th>Creation date</th>
								   <th>Created by</th>
								   <th>Team</th>
								   <th>Status</th>
								   <th>Turnover</th>                   
								   <th>Estimation</th>                   
								   <th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php if (count($this->_tpl_vars['quote_list']) > 0): ?>
								<?php $this->assign('ongoing_quotes', 0); ?>
								<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oquote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oquote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quote_item']):
        $this->_foreach['oquote_loop']['iteration']++;
?>
									<?php if ($this->_tpl_vars['quote_item']['sales_review'] == 'not_done' || $this->_tpl_vars['quote_item']['sales_review'] == 'challenged' || ( $this->_tpl_vars['quote_item']['sales_review'] == 'to_be_approve' && ( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation' ) )): ?>
										<?php $this->assign('ongoing_quotes', $this->_tpl_vars['ongoing_quotes']+1); ?>
									<tr>										
										<td><?php echo $this->_tpl_vars['quote_item']['company_name']; ?>
</td>
										<td><?php echo $this->_tpl_vars['quote_item']['category_name']; ?>
</td>						
										<td><a href="/quote/quote-followup?quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
&submenuId=ML13-SL2" target="_followup"><?php echo $this->_tpl_vars['quote_item']['title']; ?>
</a></td>									
										<td>
										<span <?php if ($this->_tpl_vars['quote_item']['version_dates']): ?> data-original-title='Historique devis' data-html="true" class="version-change	pop_over" data-placement="right" data-content="<?php echo $this->_tpl_vars['quote_item']['version_dates']; ?>
"<?php endif; ?>>				<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

										</span>
										</td>
										<td><?php echo $this->_tpl_vars['quote_item']['owner']; ?>
</td>
										<td><?php echo $this->_tpl_vars['quote_item']['team']; ?>
</td>
										<td>							
													
												<?php if ($this->_tpl_vars['quote_item']['sales_review'] == 'to_be_approve'): ?>
																											Waiting for validation -Head of sales
												<?php elseif ($this->_tpl_vars['quote_item']['tec_review'] == 'challenged' || $this->_tpl_vars['quote_item']['seo_review'] == 'challenged'): ?>
													
														Seo or tech challenge v<?php echo $this->_tpl_vars['quote_item']['version']; ?>
 - <br>
														<?php if ($this->_tpl_vars['quote_item']['tech_challenge_time'] && $this->_tpl_vars['quote_item']['tec_review'] == 'challenged'): ?>
														 <span id="time_techchallenge<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['tech_challenge_time']; ?>
" class="challenge">
																<i class="icon-time"></i> <span id="text_techchallenge<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['tech_challenge_time']; ?>
"></span>
															</span>
															<?php if ($this->_tpl_vars['quote_item']['tech_challenge_time'] < time()): ?><label class="label label-warning">Delay </label><?php endif; ?> tech <br> <br>
														<?php endif; ?>													
														<?php if ($this->_tpl_vars['quote_item']['seo_challenge_time'] && $this->_tpl_vars['quote_item']['seo_review'] == 'challenged'): ?>
															<span id="time_seochallenge<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['seo_challenge_time']; ?>
" class="challenge">
																<i class="icon-time"></i> <span id="text_seochallenge<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['seo_challenge_time']; ?>
"></span>
															</span>
															<?php if ($this->_tpl_vars['quote_item']['seo_challenge_time'] < time()): ?><label class="label label-warning"> Delay SEO</label><?php endif; ?> seo
														<?php endif; ?>	
														<?php if ($this->_tpl_vars['quote_item']['prod_review'] == 'challenged'): ?>
															<br>Prod is working on the quote v<?php echo $this->_tpl_vars['quote_item']['version']; ?>
 <br>
															<span id="time_prodchallenge<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['prod_timeline']; ?>
">
																<i class="icon-time"></i> <span id="text_prodchallenge<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['prod_timeline']; ?>
"></span>
															</span>
															<?php if ($this->_tpl_vars['quote_item']['prod_timeline'] < time()): ?><label class="label label-warning">Deley</label><?php endif; ?>
														<?php endif; ?>
												<?php elseif ($this->_tpl_vars['quote_item']['tec_review'] == 'not_done' || $this->_tpl_vars['quote_item']['seo_review'] == 'not_done'): ?>
													
														Quote v<?php echo $this->_tpl_vars['quote_item']['version']; ?>
 - Waiting for answer <?php if ($this->_tpl_vars['quote_item']['tec_review'] == 'not_done'): ?>tech<?php endif; ?>
														<?php if ($this->_tpl_vars['quote_item']['tec_review'] == 'not_done' && $this->_tpl_vars['quote_item']['seo_review'] == 'not_done'): ?>
														and 
														<?php endif; ?>
														<?php if ($this->_tpl_vars['quote_item']['seo_review'] == 'not_done'): ?> seo<?php endif; ?> answer <br>
														<?php if ($this->_tpl_vars['quote_item']['response_time'] > time()): ?>
															<span id="time_<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['response_time']; ?>
">
																<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['response_time']; ?>
"></span>
															</span>
														<?php endif; ?>			
														
														<?php if ($this->_tpl_vars['quote_item']['prod_review'] == 'challenged'): ?>
															<br>Prod is working on the quote v<?php echo $this->_tpl_vars['quote_item']['version']; ?>
 <br>
															<span id="time_prodchallenge<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['prod_timeline']; ?>
">
																<i class="icon-time"></i> <span id="text_prodchallenge<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['prod_timeline']; ?>
"></span>
															</span>
															<?php if ($this->_tpl_vars['quote_item']['prod_timeline'] < time()): ?><label class="label label-warning">Retard</label><?php endif; ?>
														<?php endif; ?>	
												<?php elseif (( $this->_tpl_vars['quote_item']['seo_review'] == 'skipped' || $this->_tpl_vars['quote_item']['seo_review'] == 'auto_skipped' || $this->_tpl_vars['quote_item']['seo_review'] == 'validated' ) && ( $this->_tpl_vars['quote_item']['tec_review'] == 'skipped' || $this->_tpl_vars['quote_item']['tec_review'] == 'auto_skipped' || $this->_tpl_vars['quote_item']['tec_review'] == 'validated' ) && ( $this->_tpl_vars['quote_item']['prod_review'] == 'challenged' )): ?>
														
													Prod is working on the quote v<?php echo $this->_tpl_vars['quote_item']['version']; ?>
 <br>
														
															<span id="time_<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['prod_timeline']; ?>
">
																<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['prod_timeline']; ?>
"></span>
															</span>
															<?php if ($this->_tpl_vars['quote_item']['prod_timeline'] < time()): ?><label class="label label-warning">Delay</label><?php endif; ?>
														
													
												<?php elseif (( $this->_tpl_vars['quote_item']['prod_review'] == 'auto_skipped' || $this->_tpl_vars['quote_item']['prod_review'] == 'skipped' || $this->_tpl_vars['quote_item']['prod_review'] == 'validated' ) && ( $this->_tpl_vars['quote_item']['sales_review'] != 'validated' && $this->_tpl_vars['quote_item']['sales_review'] != 'closed' )): ?>
													 Quote is ready to be validated by sales 
													<?php if (time() < $this->_tpl_vars['quote_item']['sales_validation_expires']): ?>
														<p>
															<span id="time_<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['sales_validation_expires']; ?>
">
																<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['sales_validation_expires']; ?>
"></span>
															</span>
														</p>
													<?php else: ?>
														<p>Delay : 
														<span id="time_<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['sales_validation_expires']; ?>
" class="enretard">
																<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['sales_validation_expires']; ?>
"></span>
															</span>
														</p>
													<?php endif; ?>
													<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>	
													<div>												
															<a class="btn btn-small btn-primary" href="/quote/sales-final-validation?quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
&submenuId=ML13-SL2">
															See final quote
															</a>
													</div>		
													<?php endif; ?>	
												<?php elseif ($this->_tpl_vars['quote_item']['sales_review'] == 'validated'): ?>
													<i class="icon-ok icon-black"></i> Devis valid&eacute; par le commercial
												<?php elseif ($this->_tpl_vars['quote_item']['sales_review'] == 'closed'): ?>
													<i class="icon-ok icon-black"></i> Quote has closed by sales
												<?php endif; ?>
											
											
																						
										</td>
										<td style="text-align: right">
											<?php if ($this->_tpl_vars['quote_item']['turnover'] > 0): ?>
												<b><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_item']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote_item']['sales_suggested_currency']; ?>
;</b>
											<?php else: ?>
												-
											<?php endif; ?>	
										</td>
										<td>
											<?php if ($this->_tpl_vars['quote_item']['estimate_sign_percentage']): ?>
												<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['userId'] == $this->_tpl_vars['quote_item']['quote_by']): ?>
													<a href="/quote/estimate-sign-details-popup?quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#estimate_sign">
														<?php echo $this->_tpl_vars['quote_item']['estimate_sign_percentage']; ?>
% / <?php echo ((is_array($_tmp=$this->_tpl_vars['quote_item']['estimate_sign_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

													</a>	
												<?php else: ?>
													<a <?php if ($this->_tpl_vars['quote_item']['estimate_sign_comments']): ?> data-original-title='Comment(s)' data-html="true" class="pop_over" data-placement="left" data-content="<?php echo $this->_tpl_vars['quote_item']['estimate_sign_comments']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['quote_item']['estimate_sign_percentage']; ?>
% / <?php echo ((is_array($_tmp=$this->_tpl_vars['quote_item']['estimate_sign_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

													</a>
												<?php endif; ?>
											<?php else: ?>
												<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['userId'] == $this->_tpl_vars['quote_item']['quote_by']): ?>
													<a href="/quote/estimate-sign-details-popup?quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#estimate_sign">
														- %
													</a>	
												<?php else: ?>
													-
												<?php endif; ?>
											<?php endif; ?>	
										</td>
										<td>
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
												<?php if ($this->_tpl_vars['quote_item']['sales_review'] == 'to_be_approve'): ?>
													<?php if ($this->_tpl_vars['user_type'] == 'salesuser'): ?>
														To be validated by the sales
													<?php else: ?>
														<a href="/quote/create-quote-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
&submenuId=ML13-SL2" tabindex="-1" role="menuitem"><i class="splashy-okay"></i> Accept</a>
													<?php endif; ?>
												<?php else: ?>
													<!-- Single button -->
													<div class="btn-group">
														  <button type="button" class="btn btn-small dropdown-toggle" data-toggle="dropdown">More 
															<span class="caret"></span>
														</button>
													  <ul class="dropdown-menu" role="menu">
														<li><a class="check_quote_edit" href="/quote/create-quote-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
&submenuId=ML13-SL2" tabindex="-1" role="menuitem"><i class="splashy-pencil"></i> Edit</a></li>
														<?php if ($this->_tpl_vars['quote_item']['prod_review'] == 'auto_skipped' || $this->_tpl_vars['quote_item']['prod_review'] == 'skipped' || $this->_tpl_vars['quote_item']['prod_review'] == 'validated'): ?>
														<li><a href="/quote/sales-final-validation?quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
&submenuId=ML13-SL2" tabindex="-1" role="menuitem"><i class="splashy-check"></i> Validate</a></li>
														<?php endif; ?>
														<li><a href="/quote/create-quote-step1?qaction=duplicate&quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
&submenuId=ML13-SL2" tabindex="-1" role="menuitem"><i class="splashy-document_copy"></i> Duplicate</a></li>	
														<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
															<li><a class="delete-quote" href="/quote/delete-quote?quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-remove_outline"></i> Delete</a></li>
														<?php endif; ?>	
													  </ul>
													</div>
												<?php endif; ?>	
											<?php elseif ($this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager'): ?>
												<a href="/quote/seo-quote-review?quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
&submenuId=ML13-SL2">
													<?php if ($this->_tpl_vars['quote_item']['seo_review'] == 'not_done'): ?>
														<i class="splashy-thumb_up"></i>Skip/Challenge
													<?php elseif ($this->_tpl_vars['quote_item']['seo_review'] == 'validated'): ?>	
														Validated
													<?php elseif ($this->_tpl_vars['seoManager_holiday'] == 'no' && $this->_tpl_vars['user_type'] == 'seouser'): ?>
														<i class="splashy-check"></i> Edit
													<?php else: ?>
														<i class="splashy-check"></i> Edit/Validate
													<?php endif; ?>	
												</a>
											<?php elseif ($this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?>
												<a href="/quote/tech-quote-review?quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
&submenuId=ML13-SL2">
													<?php if ($this->_tpl_vars['quote_item']['tec_review'] == 'not_done'): ?>
														<i class="splashy-thumb_up"></i>Skip/Challenge
													<?php elseif ($this->_tpl_vars['quote_item']['tec_review'] == 'validated'): ?>	
														Validated
													<?php elseif ($this->_tpl_vars['techManager_holiday'] == 'no' && $this->_tpl_vars['user_type'] == 'techuser'): ?>
														<i class="splashy-check"></i> Edit	
													<?php else: ?>
														<i class="splashy-check"></i> Edit/Validate
													<?php endif; ?>
												</a>	
											<?php elseif ($this->_tpl_vars['user_type'] == 'produser' || $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?>
												<?php if (( $this->_tpl_vars['quote_item']['prod_review'] == 'validated' || $this->_tpl_vars['quote_item']['prod_review'] == 'challenged' )): ?>
												<a href="/quote/prod-quote-review?quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
&submenuId=ML13-SL2">
													<?php if ($this->_tpl_vars['quote_item']['prod_review'] == 'challenged'): ?>
														<i class="splashy-check"></i> Edit/Validate
													<?php elseif ($this->_tpl_vars['quote_item']['prod_review'] == 'validated'): ?>	
														Validated
													<?php endif; ?>
													
												</a>
												<?php else: ?>
													-
												<?php endif; ?>
											<?php endif; ?>	
										</td>									                       
									</tr>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>						
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade <?php if ($_GET['active'] == 'closedrelancer'): ?> in active <?php endif; ?>" id="relancer">
						 <table class="table table-bordered table-hover table_vam" id="cls_quotesrelacerList" >
							<thead>
								<tr>								   
								   <th>Client</th>
								   <th>Category</th>
								   <th>Quote name</th>
								   <th>Creation date</th>
								   <th>Created by</th>
								   <th>Team</th>
								   <th>Relancer client</th>
								   <th>Raison</th>
								   <th>Turnover</th>
								   <th>Estimation</th>
								   <th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php if (count($this->_tpl_vars['quote_list']) > 0): ?>
								<?php $this->assign('closed_quotes', 0); ?>
								<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rquote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rquote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rquote_item']):
        $this->_foreach['rquote_loop']['iteration']++;
?>
									<?php if ($this->_tpl_vars['rquote_item']['relancer_status'] == '1'): ?>				
										<?php $this->assign('closed_quotes', $this->_tpl_vars['closed_quotes']+1); ?>
									<tr>										
										<td><?php echo $this->_tpl_vars['rquote_item']['company_name']; ?>
</td>
										<td><?php echo $this->_tpl_vars['rquote_item']['category_name']; ?>
</td>						
										<td>
										<a href="/quote/quote-followup?quote_id=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
&submenuId=ML13-SL2" target="_followup">
										<?php echo $this->_tpl_vars['rquote_item']['title']; ?>

										</a>
										</td>
										<td>
										<span <?php if ($this->_tpl_vars['rquote_item']['version_dates']): ?> data-original-title='Historique devis' data-html="true" class="version-change pop_over" data-placement="right" data-content="<?php echo $this->_tpl_vars['rquote_item']['version_dates']; ?>
"<?php endif; ?>>				<?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

										</span>
										</td>
										<td><?php echo $this->_tpl_vars['rquote_item']['owner']; ?>
</td>
										<td><?php echo $this->_tpl_vars['rquote_item']['team']; ?>
</td>
										<td><?php if ($this->_tpl_vars['rquote_item']['boot_customer'] && $this->_tpl_vars['rquote_item']['relancer_commet'] != ""): ?>
										<span class="hidden"><?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['boot_customer'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</span>
										<a data-content="<?php echo $this->_tpl_vars['rquote_item']['relancer_commet']; ?>
" data-placement="left" class="pop_over" data-html="true" data-original-title="Relanc&eacute; Commentaire(s)">Relanc&eacute; le <?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['boot_customer'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</a>	</td>
										 <?php else: ?>
											<a href="/quote/relance-quote-popup?qid=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
" class="relance-qu btn btn-small btn-primary" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#programmer-relance">Programmer relance</a>	</td>
											<?php endif; ?>
										<td>
                                        <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['userId'] == $this->_tpl_vars['cquote_item']['quote_by']): ?>																			
										<?php if ($this->_tpl_vars['rquote_item']['closed_reason'] == ''): ?>
										<a href="/quote/close-relance-view?qid=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
" data-content="<?php echo $this->_tpl_vars['rquote_item']['closed_comments']; ?>
" data-placement="right" class="pop_over" data-html="true" data-original-title="Commentaire(s)" data-toggle="modal" tabindex="-1" role="menuitem"  data-target="#close_quote" class="closequote" >Select Reason</a>
										<?php elseif ($this->_tpl_vars['rquote_item']['closed_reason'] == 'refusal_to_answer_EP'): ?>
										<a href="/quote/close-relance-view?qid=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
" data-content="<?php echo $this->_tpl_vars['rquote_item']['closed_comments']; ?>
" data-placement="right" class="pop_over" data-html="true" data-original-title="Commentaire(s)" data-toggle="modal" tabindex="-1" role="menuitem"  data-target="#close_quote" class="closequote" >refus de r&#233;pondre EP</a>
										<?php else: ?>
										<a href="/quote/close-relance-view?qid=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
" data-content="<?php echo $this->_tpl_vars['rquote_item']['closed_comments']; ?>
" data-placement="right" class="pop_over" data-html="true" data-original-title="Commentaire(s)" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#close_quote" class="closequote" ><?php echo $this->_tpl_vars['closedreasons'][$this->_tpl_vars['rquote_item']['closed_reason']]; ?>
</a>
										<?php endif; ?>
										<?php else: ?>
											<?php echo $this->_tpl_vars['rquote_item']['closed_reason_txt']; ?>

										<?php endif; ?>
										</td>
										<td style="text-align: right">
											<b><?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['rquote_item']['sales_suggested_currency']; ?>
;</b>
										</td>
										<td>
											<?php if ($this->_tpl_vars['rquote_item']['estimate_sign_percentage']): ?>
												<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['userId'] == $this->_tpl_vars['rquote_item']['quote_by']): ?>
													<a href="/quote/estimate-sign-details-popup?quote_id=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#estimate_sign">
														<?php echo $this->_tpl_vars['rquote_item']['estimate_sign_percentage']; ?>
% / <?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['estimate_sign_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

													</a>	
												<?php else: ?>
													<a <?php if ($this->_tpl_vars['rquote_item']['estimate_sign_comments']): ?> data-original-title='Commentaire(s)' data-html="true" class="pop_over" data-placement="left" data-content="<?php echo $this->_tpl_vars['rquote_item']['estimate_sign_comments']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['rquote_item']['estimate_sign_percentage']; ?>
% / <?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['estimate_sign_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

													</a>
												<?php endif; ?>
											<?php else: ?>
												<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['userId'] == $this->_tpl_vars['rquote_item']['quote_by']): ?>
													<a href="/quote/estimate-sign-details-popup?quote_id=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#estimate_sign">
														- %
													</a>	
												<?php else: ?>
													-
												<?php endif; ?>
											<?php endif; ?>	
										</td>
										<td>
										<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
												<div class="btn-group">
													<button type="button" class="btn btn-small dropdown-toggle" data-toggle="dropdown">More
														<span class="caret"></span>
													</button>
													 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
													 <li><a class="newversion" href="/quote/create-quote-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
&submenuId=ML13-SL2" tabindex="-1" role="menuitem"><i class="splashy-pencil"></i>Reactivate Quote</li>
													 <li><a href="/quote/edit-quote-final-step?quote_id=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
"  data-toggle="modal" tabindex="-1" role="menuitem" data-target="#edit_quote_files" ><i class="splashy-pencil"></i> Add informations</a></li>
													 <li><a href="/quote/download-quote-xls?quote_id=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-arrow_large_down_outline"></i> Download xls</a></li>
													<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
														<li><a class="delete-quote" href="/quote/delete-quote?quote_id=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-remove_outline"></i> Delete</a></li>
													 <?php endif; ?>
													 <li><a href="/quote/close-relance-view?qid=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
&closed_type=perdu" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#close_quote" class="closequote"><i class="splashy-remove_outline"></i> Close</a></li>
													 </ul>
												</div>
										<?php else: ?>
											<a href="/quote/download-quote-xls?quote_id=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-arrow_large_down_outline"></i> Download xls</a>
										<?php endif; ?>
										</td>	
									</tr>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>						
							</tbody>
						</table>
					</div>
					
					
					
					
					
					
					<div class="tab-pane fade <?php if ($_GET['active'] == 'closed'): ?> in active <?php endif; ?>" id="closedQuotes">
						 <table class="table table-bordered table-hover table_vam" id="cls_quotesList" >
							<thead>
								<tr>								   
								   <th>Client</th>
								   <th>Category</th>
								   <th>Quote name</th>
								   <th>Creation date</th>
								   <th>Created by</th>
								   <th>Team</th>
								   <th>Contact client again</th>
								   <th>Reason</th>
								   <th>Turnover</th>
								   <th>Estimation</th>
								   <th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php if (count($this->_tpl_vars['quote_list']) > 0): ?>
								<?php $this->assign('closed_quotes', 0); ?>
								<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cquote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cquote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cquote_item']):
        $this->_foreach['cquote_loop']['iteration']++;
?>
									<?php if ($this->_tpl_vars['cquote_item']['closed_status'] == '1'): ?>				
										<?php $this->assign('closed_quotes', $this->_tpl_vars['closed_quotes']+1); ?>
									<tr>										
										<td><?php echo $this->_tpl_vars['cquote_item']['company_name']; ?>
</td>
										<td><?php echo $this->_tpl_vars['cquote_item']['category_name']; ?>
</td>						
										<td>
										<a href="/quote/quote-followup?quote_id=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
&submenuId=ML13-SL2" target="_followup">
										<?php echo $this->_tpl_vars['cquote_item']['title']; ?>

										</a>
										</td>
										<td>
										<span <?php if ($this->_tpl_vars['cquote_item']['version_dates']): ?> data-original-title='Historique devis' data-html="true" class="version-change pop_over" data-placement="right" data-content="<?php echo $this->_tpl_vars['cquote_item']['version_dates']; ?>
"<?php endif; ?>>				<?php echo ((is_array($_tmp=$this->_tpl_vars['cquote_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

										</span>
										</td>
										<td><?php echo $this->_tpl_vars['cquote_item']['owner']; ?>
</td>
										<td><?php echo $this->_tpl_vars['cquote_item']['team']; ?>
</td>
										<td>
										<?php if ($this->_tpl_vars['cquote_item']['boot_customer']): ?>
											<a data-content="<?php echo $this->_tpl_vars['cquote_item']['relancer_commet']; ?>
" data-placement="left" class="pop_over" data-html="true" data-original-title="Relanc&eacute; Commentaire(s)">Relanc&eacute; le <?php echo ((is_array($_tmp=$this->_tpl_vars['cquote_item']['boot_customer'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</a>	
											<?php elseif ($this->_tpl_vars['cquote_item']['closed_reason'] == 'quote_permanently_lost'): ?>
											 <a href="/quote/relance-quote-popup?qid=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
&active=closequote" class="relance-qu btn btn-small btn-primary" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#programmer-relance">Programmer relance</a>	
											 <?php else: ?>
											 <a href="/quote/relance-quote-popup?qid=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
" class="relance-qu btn btn-small btn-primary" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#programmer-relance">Programmer relance</a>	
											 <!--	<button class="btn btn-primary btn-mini bootcustomer" rel="<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
">Relancer client</button>  -->
											<?php endif; ?>
											</td> 
										<td>
										<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['userId'] == $this->_tpl_vars['cquote_item']['quote_by']): ?>
											<?php if ($this->_tpl_vars['cquote_item']['closed_reason'] == ''): ?>
												<a data-content="<?php echo $this->_tpl_vars['cquote_item']['closed_comments']; ?>
" data-placement="right" class="pop_over" data-html="true" data-original-title="Commentaire(s)" >Select Reason</a>
											<?php elseif ($this->_tpl_vars['cquote_item']['closed_reason'] == 'quote_permanently_lost'): ?>
												<a  data-content="<?php echo $this->_tpl_vars['cquote_item']['closed_comments']; ?>
" data-placement="right" class="pop_over" data-html="true" data-original-title="Commentaire(s)"  >Permanently lost</a>
											<?php elseif ($this->_tpl_vars['cquote_item']['closed_reason'] == 'refusal_to_answer_EP'): ?>
												<a  data-content="<?php echo $this->_tpl_vars['cquote_item']['closed_comments']; ?>
" data-placement="right" class="pop_over" data-html="true" data-original-title="Commentaire(s)"  >Refusal to answer EP</a>
											<?php else: ?>
												<a data-content="<?php echo $this->_tpl_vars['cquote_item']['closed_comments']; ?>
" data-placement="right" class="pop_over" data-html="true" data-original-title="Commentaire(s)"><?php echo $this->_tpl_vars['closedreasons'][$this->_tpl_vars['cquote_item']['closed_reason']]; ?>
</a>
											<?php endif; ?>
																				<?php else: ?>
											<?php echo $this->_tpl_vars['cquote_item']['closed_reason_txt']; ?>

										<?php endif; ?>

										</td>
										<td style="text-align: right">
											<b><?php echo ((is_array($_tmp=$this->_tpl_vars['cquote_item']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['cquote_item']['sales_suggested_currency']; ?>
;</b>
										</td>
										<td>
											<?php if ($this->_tpl_vars['cquote_item']['estimate_sign_percentage']): ?>
												<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['userId'] == $this->_tpl_vars['cquote_item']['quote_by']): ?>
													<a href="/quote/estimate-sign-details-popup?quote_id=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#estimate_sign">
														<?php echo $this->_tpl_vars['cquote_item']['estimate_sign_percentage']; ?>
% / <?php echo ((is_array($_tmp=$this->_tpl_vars['cquote_item']['estimate_sign_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

													</a>	
												<?php else: ?>
													<a <?php if ($this->_tpl_vars['cquote_item']['estimate_sign_comments']): ?> data-original-title='Commentaire(s)' data-html="true" class="pop_over" data-placement="left" data-content="<?php echo $this->_tpl_vars['cquote_item']['estimate_sign_comments']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['cquote_item']['estimate_sign_percentage']; ?>
% / <?php echo ((is_array($_tmp=$this->_tpl_vars['cquote_item']['estimate_sign_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

													</a>
												<?php endif; ?>
											<?php else: ?>
												<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['userId'] == $this->_tpl_vars['cquote_item']['quote_by']): ?>
													<a href="/quote/estimate-sign-details-popup?quote_id=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#estimate_sign">
														- %
													</a>	
												<?php else: ?>
													-
												<?php endif; ?>
											<?php endif; ?>	
										</td>
										<td>
										<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
												<div class="btn-group">
													<button type="button" class="btn btn-small dropdown-toggle" data-toggle="dropdown">More
														<span class="caret"></span>
													</button>
													 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
													 <li><a class="newversion" href="/quote/create-quote-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
&submenuId=ML13-SL2" tabindex="-1" role="menuitem"><i class="splashy-pencil"></i>Reactivate Quote</li>
													 <li><a href="/quote/edit-quote-final-step?quote_id=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
"  data-toggle="modal" tabindex="-1" role="menuitem" data-target="#edit_quote_files" ><i class="splashy-pencil"></i> Add informations</a></li>
													 <li><a href="/quote/download-quote-xls?quote_id=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-arrow_large_down_outline"></i> Download XLS</a></li>
													<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
														<li><a class="delete-quote" href="/quote/delete-quote?quote_id=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-remove_outline"></i> Delete</a></li>
													 <?php endif; ?>
													 </ul>
												</div>
										<?php else: ?>
											<a href="/quote/download-quote-xls?quote_id=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-arrow_large_down_outline"></i> Download XLS</a>
										<?php endif; ?>
										</td>	
									</tr>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>						
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade <?php if ($_GET['active'] == 'validated'): ?> in active <?php endif; ?>" id="validated">
						 <table class="table table-bordered table-hover table_vam" id="val_quotesList" >
							<thead>
								<tr>
								   								   <th>Client</th>
								   <th>Category</th>
								   <th>Quote name</th>
								   <th>Creation date</th>
								   <th>Created by</th>
								   <th>Team</th>
								   <th>Status</th>
								   <th>Turnover</th>                   
								   <th>Estimation</th>                   
								   <th>Action</th>
								   
								</tr>
							</thead>
							<tbody>
							<?php if (count($this->_tpl_vars['quote_list']) > 0): ?>
								<?php $this->assign('validated_quotes', 0); ?>
								<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['vquote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['vquote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['vquote_item']):
        $this->_foreach['vquote_loop']['iteration']++;
?>
									<?php if ($this->_tpl_vars['vquote_item']['validated_status'] == '1'): ?>
									<?php $this->assign('validated_quotes', $this->_tpl_vars['validated_quotes']+1); ?>
									<tr>
										 										<td><?php echo $this->_tpl_vars['vquote_item']['company_name']; ?>
</td>
										<td><?php echo $this->_tpl_vars['vquote_item']['category_name']; ?>
</td>						
										<td><a href="/quote/quote-followup?quote_id=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
&submenuId=ML13-SL2" target="_followup"><?php echo $this->_tpl_vars['vquote_item']['title']; ?>
</a></td>
										<td><span <?php if ($this->_tpl_vars['vquote_item']['version_dates']): ?> data-original-title='Historique devis' data-html="true" class="version-change pop_over" data-placement="right" data-content="<?php echo $this->_tpl_vars['vquote_item']['version_dates']; ?>
"<?php endif; ?>>				<?php echo ((is_array($_tmp=$this->_tpl_vars['vquote_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

										</span></td>
										<td><?php echo $this->_tpl_vars['vquote_item']['owner']; ?>
</td>
										<td><?php echo $this->_tpl_vars['vquote_item']['team']; ?>
</td>
										<td>
										 Quote will be considered as closed in
										<div>
										<span id="time_<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['vquote_item']['sign_expire_timeline']; ?>
">
											<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['vquote_item']['sign_expire_timeline']; ?>
"></span>
										</span>
										</div>
										</td>
										<td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['vquote_item']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['vquote_item']['sales_suggested_currency']; ?>
;</td>
										<td>
											<?php if ($this->_tpl_vars['vquote_item']['estimate_sign_percentage']): ?>
												<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['userId'] == $this->_tpl_vars['vquote_item']['quote_by']): ?>
													<a href="/quote/estimate-sign-details-popup?quote_id=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#estimate_sign">
														<?php echo $this->_tpl_vars['vquote_item']['estimate_sign_percentage']; ?>
% / <?php echo ((is_array($_tmp=$this->_tpl_vars['vquote_item']['estimate_sign_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

													</a>	
												<?php else: ?>
													<a <?php if ($this->_tpl_vars['vquote_item']['estimate_sign_comments']): ?> data-original-title='Commentaire(s)' data-html="true" class="pop_over" data-placement="left" data-content="<?php echo $this->_tpl_vars['vquote_item']['estimate_sign_comments']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['vquote_item']['estimate_sign_percentage']; ?>
% / <?php echo ((is_array($_tmp=$this->_tpl_vars['vquote_item']['estimate_sign_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

													</a>
												<?php endif; ?>
											<?php else: ?>
												<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['userId'] == $this->_tpl_vars['vquote_item']['quote_by']): ?>
													<a href="/quote/estimate-sign-details-popup?quote_id=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#estimate_sign">
															- %
													</a>	
												<?php else: ?>
													-
												<?php endif; ?>
											<?php endif; ?>
										</td>
										<td>
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
												<div class="btn-group">
														
														  <button type="button" class="btn btn-small dropdown-toggle" data-toggle="dropdown">More 
															<span class="caret"></span>
														</button>
													 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
														<li><a class="newversion" href="/quote/create-quote-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
&submenuId=ML13-SL2" tabindex="-1" role="menuitem"><i class="splashy-pencil"></i> Modify mission</a></li>
														<li><a  tabindex="-1" href="/quote/sales-final-validation?quote_id=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
&submenuId=ML13-SL2" role="menuitem"><i class="splashy-pencil"></i>Modify margin</a></li>
														<li><a href="/quote/edit-quote-final-step?quote_id=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
"  data-toggle="modal" tabindex="-1" role="menuitem" data-target="#edit_quote_files" ><i class="splashy-pencil"></i> Add informations</a></li>
														<li class="divider"></li>
														<li>
														<a href="/quote/close-quote-view?qid=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#close_quote" class="closequote"><i class="splashy-remove_outline"></i> Close</a>
														</li>
														<li>
														<a href="/quote/sign-quote-view?qid=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#sign_quote" class="signquote"><i class="splashy-document_a4_edit"></i> Sign</a></li>
														<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
															<li><a class="delete-quote" href="/quote/delete-quote?quote_id=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-remove_outline"></i> Delete</a></li>
														<?php endif; ?>	
														<li><a href="/quote/download-quote-xls?quote_id=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-arrow_large_down_outline"></i> Download XLS</a></li>
													</ul>
													</div>
											<?php else: ?>
												-
											<?php endif; ?>
										</td>									                       
									</tr>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>						
							</tbody>
						</table>
						
					</div>
					<div class="tab-pane fade <?php if ($_GET['active'] == 'signed'): ?> in active <?php endif; ?>" id="signed">
					
					<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
					<div class="row-fluid">
						    <div class="alert alert-info">
   Please select a quote to be able to create a contract
    </div><br>
						</div>
						<?php endif; ?>
						 <table class="table table-bordered table-hover table_vam" id="sign_quotesList" >
							<thead>
								<tr>
								   <th>&nbsp;
																		   </th>
								   <th>Client</th>
								   <th>Category</th>
								   <th>Quote name</th>
								   <th>Creation date</th>
								   <th>Created by</th>
								   <th>Team</th>
																   <th>Turnover</th>								   
								   <th>Action</th>
								   
								</tr>
							</thead>
							<tbody>
							<?php if (count($this->_tpl_vars['quote_list']) > 0): ?>
								<?php $this->assign('signed_quotes', 0); ?>
								<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['squote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['squote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['squote_item']):
        $this->_foreach['squote_loop']['iteration']++;
?>
									<?php if ($this->_tpl_vars['squote_item']['sales_review'] == 'signed'): ?>				
										<?php $this->assign('signed_quotes', $this->_tpl_vars['signed_quotes']+1); ?>
									<tr>
										<td><?php if ($this->_tpl_vars['squote_item']['signed_exist'] == '1'): ?>
										<a class="pop_clickover" data-toggle="popover" data-html="true" data-placement="right" data-content="<a href='/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['squote_item']['signed_contractid']; ?>
'><?php echo $this->_tpl_vars['squote_item']['signed_contract']; ?>
<a>" data-original-title="Related contract"><i class="splashy-check"></i></span></a>
										<?php else: ?>
										<input name="squote_select[]" class="changewarning <?php echo $this->_tpl_vars['squote_item']['signed_exist']; ?>
" value="<?php echo $this->_tpl_vars['squote_item']['identifier']; ?>
" type="radio" >
										<?php endif; ?></td></td>
										<td><?php echo $this->_tpl_vars['squote_item']['company_name']; ?>
</td>
										<td><?php echo $this->_tpl_vars['squote_item']['category_name']; ?>
</td>						
										<td><a href="/quote/quote-followup?quote_id=<?php echo $this->_tpl_vars['squote_item']['identifier']; ?>
&submenuId=ML13-SL2" target="_followup"><?php echo $this->_tpl_vars['squote_item']['title']; ?>
</a></td>
										<td><span <?php if ($this->_tpl_vars['squote_item']['version_dates']): ?> data-original-title='Quote History' data-html="true" class="version-change pop_over" data-placement="right" data-content="<?php echo $this->_tpl_vars['squote_item']['version_dates']; ?>
"<?php endif; ?>>				<?php echo ((is_array($_tmp=$this->_tpl_vars['squote_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

										</span></td>
										<td><?php echo $this->_tpl_vars['squote_item']['owner']; ?>
</td>
										<td><?php echo $this->_tpl_vars['squote_item']['team']; ?>
</td>
																				<td style="text-align: right">
											<b><?php echo ((is_array($_tmp=$this->_tpl_vars['squote_item']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['squote_item']['sales_suggested_currency']; ?>
;</b>
										</td>										
										<td>
											<div class="btn-group">
												<a class="btn" href="/quote/download-quote-xls?quote_id=<?php echo $this->_tpl_vars['squote_item']['identifier']; ?>
"><i class="icon-download"></i> Quote xls</a>
												<a href="" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-plus" style="opacity:0.5"></i></a>
												<ul class="dropdown-menu">
												 <?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
													<li><a class="delete-quote" href="/quote/delete-quote?quote_id=<?php echo $this->_tpl_vars['squote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-remove_outline"></i> Delete</a></li>
												<?php endif; ?>	
												</ul>
											</div>
										</td>	
									</tr>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>						
							</tbody>
						</table>
						<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
					<div class="row-fluid">
						<hr><a class="btn btn-primary" href="" id="generateQuoteId" onclick="return generateQuoteId()">Create contract</a>
						</div>
						<?php endif; ?>
					</div>					
					<div class="tab-pane <?php if ($_GET['active'] == 'deleted'): ?> active <?php endif; ?>" id="deleted">
						 <table class="table table-bordered table-hover table_vam" id="deleted_quotesList" >
							<thead>
								<tr>
								   <th>Client</th>
								   <th>Category</th>
								   <th>Quote name</th>
								   <th>Creation date</th>
								   <th>Created by</th>
								   <th>Team</th>
								   <th>Turnover</th>                   
								   <th>Deleted at</th>                   
								   <th>Deleted by</th>                   
								   <th>Action</th> 								</tr>
							</thead>
							<tbody>
							<?php if (count($this->_tpl_vars['quote_list']) > 0): ?>
								<?php $this->assign('signed_quotes', 0); ?>
								<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['dquote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['dquote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dquote_item']):
        $this->_foreach['dquote_loop']['iteration']++;
?>
									<?php if ($this->_tpl_vars['dquote_item']['sales_review'] == 'deleted'): ?>				
										<?php $this->assign('signed_quotes', $this->_tpl_vars['signed_quotes']+1); ?>
									<tr>
										<td><?php echo $this->_tpl_vars['dquote_item']['company_name']; ?>
</td>
										<td><?php echo $this->_tpl_vars['dquote_item']['category_name']; ?>
</td>						
										<td><a href="/quote/quote-followup?quote_id=<?php echo $this->_tpl_vars['dquote_item']['identifier']; ?>
&submenuId=ML13-SL2" target="_followup"><?php echo $this->_tpl_vars['dquote_item']['title']; ?>
</a></td>
										<td><span <?php if ($this->_tpl_vars['dquote_item']['version_dates']): ?> data-original-title='Historique devis' data-html="true" class="version-change pop_over" data-placement="right" data-content="<?php echo $this->_tpl_vars['dquote_item']['version_dates']; ?>
"<?php endif; ?>>				<?php echo ((is_array($_tmp=$this->_tpl_vars['dquote_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

										</span></td>
										<td><?php echo $this->_tpl_vars['dquote_item']['owner']; ?>
</td>
										<td><?php echo $this->_tpl_vars['dquote_item']['team']; ?>
</td>
										<td style="text-align: right"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['dquote_item']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['dquote_item']['sales_suggested_currency']; ?>
;</b></td>
										<td><?php echo ((is_array($_tmp=$this->_tpl_vars['dquote_item']['deleted_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
										<td><?php echo $this->_tpl_vars['dquote_item']['deleted_user']; ?>
</td>
										<td>
											<div class="btn-group">
												 <button type="button" class="btn btn-small dropdown-toggle" data-toggle="dropdown">More 
													<span class="caret"></span></button>
												 <ul class="dropdown-menu">
													<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?> 
												<li><a class="delete-quote-permenent" href="/quote/delete-quote-permenent?quote_id=<?php echo $this->_tpl_vars['dquote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-remove_outline"></i> Delete</a></li>
												<?php endif; ?>
												</ul>
											</div>
										</td>
									</tr>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>						
							</tbody>
						</table>
					</div>
				</div>	
				<p></p>
			</div>
		</div>
	</div>
</div>	



<!--popup to show after quote created-->
<div class="modal hide fade" id="quote_created" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        
    </div>
    <div class="modal-body">
		<section>
			<div class="row-fluid">
				<div class="pull-center span10 offset1">
					<div><img src="/BO/theme/gebo/img/gCons/email.png" alt="" /></div>
					<p class="help-block">Quote sent<br/><br/></p>
					
					<?php if ($this->_tpl_vars['actionmessages'][1] == 'Onlyprod'): ?>
						<p>Thanks You'll recieve an answer from  Prod team within <?php echo $this->_tpl_vars['prod_timeline']; ?>
 hrd</p>
					<?php elseif ($this->_tpl_vars['actionmessages'][1] == 'Onlytech'): ?>
						<p>Thanks You'll recieve an answer from  Tech team within <?php echo $this->_tpl_vars['quote_sent_timeline']; ?>
 hrs</p>	
					<?php elseif ($this->_tpl_vars['actionmessages'][1] == 'Onlyseo'): ?>
						<p>Thanks You'll recieve an answer from  SEO team within <?php echo $this->_tpl_vars['quote_sent_timeline']; ?>
 hrs</p>						
					<?php else: ?>
						<p>Thanks You'll recieve an answer from  Tech,SEO and Prod team within <?php echo $this->_tpl_vars['quote_sent_timeline']; ?>
 hrs</p>
					<?php endif; ?>	
					
				</div>
			</div>
		</section>
    </div>
    <div class="modal-footer">
    </div>
</div>

<div class="modal hide fade" id="close_quote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Close quote</h3>
    </div>
    <div class="modal-body">
		
    </div>
    <div class="modal-footer">
    </div>
</div>

<div class="modal hide fade" id="sign_quote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Sign quote</h3>
    </div>
    <div class="modal-body">
		
    </div>
    <div class="modal-footer">
    </div>
</div>


<!--Estimated sign details -->
<div class="modal hide fade" id="estimate_sign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Estimation</h3>
    </div>
    <div class="modal-body">
		
    </div>
    <div class="modal-footer">
    </div>
</div>

<!--Edit Quote files/comments-->
<div class="modal container  hide fade" id="edit_quote_files" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Estimation</h3>
    </div>
    <div class="modal-body">
		
    </div>
    <div class="modal-footer">
    </div>
</div>

<!--Relance Quote files/comments-->
<div class="modal hide fade" id="programmer-relance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Relance</h3>
    </div>
    <div class="modal-body">
		
    </div>
    <div class="modal-footer">
    </div>
</div>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">	
$(document).ready(function() {
	
	
		function upTime(countTo,identy,statetime) {
			var message = "";
			currnttime=(new Date).getTime();
			  difference = (currnttime-countTo);

			  days=Math.floor(difference/(60*60*1000*24)*1);
			  hours=Math.floor((difference%(60*60*1000*24))/(60*60*1000)*1);
			  mins=Math.floor(((difference%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
			  secs=Math.floor((((difference%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
				if(days >0 )message += days + " days "  +"  ";
				if(hours >0 )message += hours + " h ";
				if(mins >0 )message += mins + " min ";
				message += secs + " sec ";
				alert(message);
              $("#text_"+identy+"_"+statetime).html(message);		
              		 
			 
}
	////////////to show the timer of tech time line///////
      var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
      var js_date=(new Date().getTime())/ 1000;
      var diff_date=Math.floor(js_date-cur_date);
     //////////show timer//////////
	$("[id^=time_]").each(function(i) {
		var article=$(this).attr(\'id\').split("_");
		var ts=article[2];
		if($(this).attr(\'class\') !== undefined && $(this).attr(\'class\')==\'enretard\'){
		
			$("#text_"+article[1]+"_"+article[2]).countup({
				timestamp   : ts,
				diff_date  : diff_date,
				callback    : function(days, hours, minutes, seconds){
					var message = "";
					if(days >0 )message += days + " days"  +"  ";
					if(hours >0 )message += hours + " h ";
					if(minutes >0 )message += minutes + " min ";
					message += seconds+" sec ";
					$("#text_"+article[1]+"_"+article[2]).html(message);
					if(days==0 && hours==0 && minutes==0 && seconds==0)
					{
						//window.location.reload();
					}
				}	
			});			  
        
		}else{
		$("#time_"+article[1]+"_"+article[2]).countdown({
			timestamp   : ts,
            diff_date  : diff_date,
			callback    : function(days, hours, minutes, seconds){
				var message = "";
				if(days >1 )message += days + " days"  +"  ";
				if(hours >0 )message += hours + ":";
				if(minutes >0 )message += minutes + ":";
				message += seconds;
				$("#text_"+article[1]+"_"+article[2]).html(message);
				if(days==0 && hours==0 && minutes==0 && seconds==0)
				{
					//window.location.reload();
				}
			}
		});
		}	
	});

	$(".reason").chosen({ allow_single_deselect: false,disable_search: true});
	
	$(\'#ong_quotesList\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
			"iDisplayLength" : 50,
            "aaSorting": [[ 3, "desc" ]],
            "aoColumns": [               
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
				{ "sType": "eu_date" },
				{ "sType": "string" },
				{ "sType": "string" },
				{ "sType": "string" },
                { "sType": "natural" },
				{ "sType": "string" },				
				{ "sType": "string" }
				
            ]
        });
		
	$(\'#val_quotesList\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
			"iDisplayLength" : 50,
            "aaSorting": [[ 3, "desc" ]],
            "aoColumns": [               
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
				{ "sType": "eu_date" },
				{ "sType": "string" },
				{ "sType": "string" },
				{ "sType": "string" },
                { "sType": "natural" },
				{ "sType": "string" },
				{ "sType": "string" }
				
            ]
        });
	
	$(\'#sign_quotesList\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
			"iDisplayLength" : 50,
            "aaSorting": [[ 4, "desc" ]],
            "aoColumns": [
                { "sType": "html","bSortable":false},
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
				{ "sType": "eu_date" },
				{ "sType": "string" },
				{ "sType": "string" },
                { "sType": "natural" },								
				{ "sType": "string" }
				
            ]
        });
	
	$(\'#cls_quotesList\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
			"iDisplayLength" : 50,
            "aaSorting": [[ 3, "desc" ]],
            "aoColumns": [               
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
				{ "sType": "eu_date" },
				{ "sType": "string" },
				{ "sType": "string" },
				{ "sType": "string" },
				{ "sType": "string" },
                { "sType": "natural" },	
				{ "sType": "string" },				
				{ "sType": "string" }
				
            ]
        });
        
	$(\'#cls_quotesrelacerList\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
			"iDisplayLength" : 50,
            "aaSorting": [[ 6, "desc" ]],
            "aoColumns": [               
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
				{ "sType": "eu_date" },
				{ "sType": "string" },
				{ "sType": "string" },
				{ "sType": "natural" },
				{ "sType": "string" },
                { "sType": "natural" },	
				{ "sType": "string" },				
				{ "sType": "string" }
				
            ]
        });

	$(\'#deleted_quotesList\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
			"iDisplayLength" : 50,
            "aaSorting": [[ 3, "desc" ]],
            "aoColumns": [
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
				{ "sType": "eu_date" },
				{ "sType": "string" },
				{ "sType": "string" },
                { "sType": "natural" },				
				{ "sType": "eu_date" },
				{ "sType": "string" },
				{ "sType": "string" }
            ]
        });

	/* Pop click funciton*/
		$(\'.pop_clickover\').popover({trigger:\'click\'});
		
	var flash_message="'; ?>
<?php echo $this->_tpl_vars['actionmessages'][0]; ?>
<?php echo '";	
	var flash_message1="'; ?>
<?php echo $this->_tpl_vars['actionmessages'][1]; ?>
<?php echo '";
	
	if(flash_message==\'Devis cr&eacute;e avec succ&egrave;s\' && flash_message1!=\'Onlysales\')
	{	
		$("#quote_created").modal(\'show\');
		$("#quote_created").removeClass( "hide" ).addClass("in");
	}
	
	$(\'.oselect_rows\').click(function () {
		var tableid = $(this).data(\'tableid\');
		//alert(tableid)
		$(\'#\'+tableid).find(\'input[name="oquote_select[]"]\').attr(\'checked\', this.checked);
	});
	$(\'.oselect_rows\').click(function () {
		var tableid = $(this).data(\'tableid\');		
		$(\'#\'+tableid).find(\'input[name="oquote_select[]"]\').attr(\'checked\', this.checked);
	});
	$(\'.cselect_rows\').click(function () {
		var tableid = $(this).data(\'tableid\');		
		$(\'#\'+tableid).find(\'input[name="cquote_select[]"]\').attr(\'checked\', this.checked);
	});
	$(\'.vselect_rows\').click(function () {
		var tableid = $(this).data(\'tableid\');		
		$(\'#\'+tableid).find(\'input[name="vquote_select[]"]\').attr(\'checked\', this.checked);
	});
	$(\'.sselect_rows\').click(function () {
		var tableid = $(this).data(\'tableid\');		
		$(\'#\'+tableid).find(\'input[name="squote_select[]"]\').attr(\'checked\', this.checked);
	});
	
	$( ".newversion" ).click(function( event ) {
				event.preventDefault();
				var href=$(this).attr("href");
				var msg = "Do you really want to create a new version of this quote?";
				
				smoke.confirm(msg,function(e){
					if (e){
							window.location.href =href;
						}					
				},{"ok":"Yes","cancel":"No"});
	});
	
	
	
	$(".bootcustomer").click(function(){
		var quote_id = $(this).attr(\'rel\');
		var thisvar = $(this);
		thisvar.html(\'<img alt="" src="/BO/theme/gebo/img/ajax_loader.gif">\');
		$.post(\'/quote/boot-customer\',{"qid":quote_id},function(data){
			thisvar.closest("td").html(data);
		})
	})
	
	$(".check_quote_edit").click(function(e){
		e.preventDefault();
		var quote_id = $(this).closest("tr").find("input").val();
		var href=$(this).attr("href");

		 $.ajax({
              url: "/quote/check-edit-quote",
              data: {"qid":quote_id},
              type: "POST",
              async: false,
              success: function(data) {
				var msg = "Already another Quote is Opened and not submitted still want to proceed?";
				
				if($.trim(data))
				{
					smoke.confirm(msg,function(e){
					if (e){
							window.location.href =href;
						}
					},{"ok":"Yes","cancel":"No"});
				}
				else
				window.location.href =href;
              }
        });
			
	});
	
	/* To delete Quote */
	$(".delete-quote").click(function(e){
		e.preventDefault();
		var href=$(this).attr("href");
		var msg = "Are you sure want to delete this Quote?";
		
		smoke.confirm(msg,function(e){
			if (e){
					window.location.href =href;
				}					
		},{"ok":"Yes","cancel":"No"});
	})
	
	//$(".date_pop_over").popover({trigger:\'mouseover\'})
	$(function ()  {	
			$(\'a[rel=popover]\').popover({ html: true, trigger: \'hover\',placement:\'right\'});
	});
	$(".changewarning").click(function(){
		$(".changewarning").closest("tr").removeClass("warning");
		$(this).closest("tr").addClass("warning");
	});

	/*popover click hide*/
	$(\'body\').on(\'click\', function (e) 
	{
		$(\'a[data-toggle=popover]\').each(function () {
        // hide any open popovers when the anywhere else in the body is clicked
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $(\'.popover\').has(e.target).length === 0) {
            $(this).popover(\'hide\');
        }
    	});
	 });
	
	$(".delete-quote-permenent").click(function(e){
		
		e.preventDefault();
		var href=$(this).attr("href");
		var msg = "Souhaitez-vous vraiment supprimer cet Quote?";
		
		smoke.confirm(msg,function(e){
			if (e){
					window.location.href =href;
				}					
		},{"ok":"Yes","cancel":"No"});
	})
});	

function changestatus(current,quote_id)
{
	$.post(\'/quote/change-reason\',{\'quote_id\':quote_id,\'reason\':current.value},function(data){$.sticky(\'Updated reason successfully\', {autoclose : 2000, position: "top-center", type: \'st-success\'});});
}

/* //edit QUote in validated quotes
function fneditQuote(quote_id,version)
{
	smoke.confirm("Vous souhaitez &eacute;diter le devis",function(e){
					if (e)
					{						
						window.location=\'/quote/sales-final-validation?quote_id=\'+quote_id+\'&submenuId=ML13-SL2\';
					}
					else
					{
						var msg = "Souhaitez-vous cr&eacute;er une nouvelle version de devis?";
						smoke.confirm(msg,function(e){
							if (e){
									window.location=\'/quote/create-quote-step1?qaction=edit&quote_id=\'+quote_id+\'&submenuId=ML13-SL2\';
								}					
						},{"ok":"Yes","cancel":"No"});						
						//return false;
					}
				}, {ok:"En phase finale", cancel:"En &eacute;tape 1"});


} */

	/* Pop up to Close Quote */

$(document).on("click",".closequote",function(){
/* 		$("#closequote").validationEngine();
		$(\'textarea\').attr(\'data-prompt-position\',\'topLeft\');
		$(\'textarea\').data(\'promptPosition\',\'topLeft\');
		
		$(\'#closetxt\').val(\'\');
		var quote_id = $(this).closest("tr").find("input").val();
		$("#closequoteid").val(quote_id); */
		$("#close_quote").modal(\'show\');
		$("#close_quote").removeClass( "hide" ).addClass("in");
	})
	
	$(document).on("click",".relance-qu",function(){

		$("#programmer-relance").modal(\'show\');
		$("#programmer-relance").removeClass( "hide" ).addClass("in");
	})
	/* Pop up to Sign Quote */
	
	$(document).on("click",".signquote",function(){
		/* $("#signquote").validationEngine();
		$(\'textarea\').attr(\'data-prompt-position\',\'topLeft\');
		$(\'textarea\').data(\'promptPosition\',\'topLeft\');
		
		$(\'#signtxt\').val(\'\');
		var quote_id = $(this).closest("tr").find("input").val();
		$("#signquoteid").val(quote_id); */
		$("#sign_quote").modal(\'show\');
		$("#sign_quote").removeClass( "hide" ).addClass("in");
	})
	
	function generateQuoteId()
	{
		if($("input[name=\'squote_select[]\']:checked").length==1)
		{
			var url = \'/contractmission/create-contract?quote_id=\';
			var quote_id = $("input[name=\'squote_select[]\']:checked").val();
			$("#generateQuoteId").attr("href",url+quote_id+\'&submenuId=ML13-SL3\');
			return true;
		}
		else
			smoke.alert("Please select one Quote");
		
		return false;
	}
	

	
	
</script>
<style type="text/css">
.main_content  .dropdown-menu
{
right:0;
left: auto;
}
.turnover
{
font-size:18px;
font-weight: 500;
}
.dataTables_wrapper
{
	/*padding-bottom:195px;*/
	position:inherit;
}
.icon-time
{
top:0px;
}
.alert{
margin:3px;
padding:3px;
}

.btn-group
{
	position:static;
}

.dropdown-menu
{
	top:auto;
}

.version-change
{
	cursor: pointer;
}

.dataTables_wrapper .top, .dataTables_wrapper .bottom
{
	padding:0;
	background:#fff;
}

.popover-content td
{
	border-left:none;
}

#cls_quotesList_wrapper
{
	padding-bottom:140px;
}
</style>
'; ?>
