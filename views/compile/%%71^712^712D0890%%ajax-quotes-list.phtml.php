<?php /* Smarty version 2.6.19, created on 2016-03-21 09:07:48
         compiled from gebo-new/quote/ajax-quotes-list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo-new/quote/ajax-quotes-list.phtml', 1, false),array('modifier', 'utf8_encode', 'gebo-new/quote/ajax-quotes-list.phtml', 26, false),array('modifier', 'date_format', 'gebo-new/quote/ajax-quotes-list.phtml', 29, false),array('modifier', 'zero_cut_t', 'gebo-new/quote/ajax-quotes-list.phtml', 111, false),)), $this); ?>
			<?php if (count($this->_tpl_vars['quote_list']) > 0 && $_GET['sales_review'] == 'briefing'): ?>
			
				<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bquote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bquote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['bquote_item']):
        $this->_foreach['bquote_loop']['iteration']++;
?>
					<?php if ($this->_tpl_vars['bquote_item']['sales_review'] == 'briefing'): ?>
						<!-- card, start -->
						<div class="card" id="quote-<?php echo $this->_tpl_vars['bquote_item']['identifier']; ?>
">
							<div class="content">
								<div class="card-header">  
									<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['bquote_item']['client_id']; ?>
/<?php echo $this->_tpl_vars['bquote_item']['client_id']; ?>
_global.png?f=12345" class="brand_l">
									<span class="ps" data-toggle="tooltip" data-placement="bottom" title="Estimation of signature"><?php echo $this->_tpl_vars['bquote_item']['estimate_sign_percentage']; ?>
%</span>
									<div class="dropdown clearfix">
										<a href="#" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
											<b class="caret"></b>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="/quote-new/client-brief?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['bquote_item']['identifier']; ?>
">Editer</a></li>
											<li class="divider"></li>
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
												<li>
													<a href="javascript:void(0);"class="delete-quote" data-id="<?php echo $this->_tpl_vars['bquote_item']['identifier']; ?>
">Delete</a>
												</li>
											<?php endif; ?>
										</ul>
									</div> 
								</div>
								<a href="/quote-new/client-brief?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['bquote_item']['identifier']; ?>
" class="qt"><?php echo ((is_array($_tmp=$this->_tpl_vars['bquote_item']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</a>
								<div class="qf clearfix">
									<ul class="list-inline text-muted">
										<li><?php echo ((is_array($_tmp=$this->_tpl_vars['bquote_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</li>
										<li>v<?php echo $this->_tpl_vars['bquote_item']['version']; ?>
</li>
									</ul>
									<div class="owner"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['bquote_item']['quote_by']; ?>
/logo.jpg?123"  data-toggle="tooltip" data-placement="left" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['bquote_item']['owner'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"></div>
								</div>
							</div>                    
						</div>
						<!-- card, stop -->				
					<?php endif; ?>			
				<?php endforeach; endif; unset($_from); ?>
				
			<?php endif; ?>			
			



<?php if (count($this->_tpl_vars['quote_list']) > 0 && $_GET['sales_review'] == 'ongoing'): ?>		
						
				<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oquote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oquote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quote_item']):
        $this->_foreach['oquote_loop']['iteration']++;
?>
					<?php if ($this->_tpl_vars['quote_item']['sales_review'] == 'not_done' || $this->_tpl_vars['quote_item']['sales_review'] == 'challenged' || $this->_tpl_vars['quote_item']['sales_review'] == 'to_be_approve'): ?>						<!-- card, start ($user_type == 'superadmin' || $user_type =='salesuser' || $user_type =='salesmanager' || $user_type =='ceouser' || $user_type =='facturation')) -->
						<div class="card" id="quote-<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
">
							<div class="content">
								 <div class="card-header"> 
									<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['quote_item']['client_id']; ?>
/<?php echo $this->_tpl_vars['quote_item']['client_id']; ?>
_global.png?f=12345" class="brand_l">
									<span class="ps" data-toggle="tooltip" data-placement="bottom" title="Estimation of signature"><?php echo $this->_tpl_vars['quote_item']['estimate_sign_percentage']; ?>
%</span>
									<div class="dropdown clearfix">
										<a href="#" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
											<b class="caret"></b>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
												<?php if ($this->_tpl_vars['quote_item']['sales_review'] == 'to_be_approve'): ?>
													<?php if ($this->_tpl_vars['user_type'] == 'salesuser'): ?>
																												<li>En attente de validation -Head of sales</li>
													<?php else: ?>
														<li><a href="/quote-new/create-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-okay"></i> Accepter</a></li>
													<?php endif; ?>
												<?php else: ?>		
													<li>
														<a class="check_quote_edit" href="/quote-new/create-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
">Editer</a>
													</li>
													<li>
														<a href="/quote-new/create-step1?qaction=duplicate&quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
" tabindex="-1" role="menuitem"><i class="splashy-document_copy"></i> Dupliquer</a>
													</li>
													<?php if ($this->_tpl_vars['quote_item']['prod_review'] == 'auto_skipped' || $this->_tpl_vars['quote_item']['prod_review'] == 'skipped' || $this->_tpl_vars['quote_item']['prod_review'] == 'validated'): ?>
														<li>
															<a href="/quote-new/sales-final-validation?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
">Valider</a>
														</li>								
													<?php endif; ?>
													<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
														<li class="divider"></li>
														<li>
															<a href="javascript:void(0);"class="delete-quote" data-id="<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
">Delete</a>
														</li>	
													<?php endif; ?>	
												<?php endif; ?>	
											<?php elseif ($this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager'): ?>
												<li>
													<a class="check_quote_edit" href="/quote-new/create-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
">Edit</a>
												</li>
												
											<?php elseif ($this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?>
												<li>
													<a class="check_quote_edit" href="/quote-new/create-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
">Edit</a>
												</li>	
											<?php elseif ($this->_tpl_vars['user_type'] == 'produser' || $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?>
												<li>
													<a class="check_quote_edit" href="/quote-new/create-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
">Edit</a>
												</li>
											<?php endif; ?>
										</ul>
									</div>
								</div>
								<?php if ($this->_tpl_vars['quote_item']['prod_review'] == 'auto_skipped' || $this->_tpl_vars['quote_item']['prod_review'] == 'skipped' || $this->_tpl_vars['quote_item']['prod_review'] == 'validated'): ?>
									<a href="/quote-new/sales-final-validation?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
">
								<?php else: ?>	
									<a href="/quote-new/client-brief?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
">
								<?php endif; ?>
								
									<div class="qp">
										<?php if ($this->_tpl_vars['quote_item']['turnover'] > 0): ?>
											<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_item']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote_item']['sales_suggested_currency']; ?>
;
										<?php else: ?>
											-
										<?php endif; ?>
									</div>		
									<div class="qt"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_item']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</div>
								</a>
								<div class="qf clearfix">
									<ul class="list-inline text-muted">
										
										<?php if (( $this->_tpl_vars['quote_item']['prod_review'] == 'auto_skipped' || $this->_tpl_vars['quote_item']['prod_review'] == 'skipped' || $this->_tpl_vars['quote_item']['prod_review'] == 'validated' ) && ( $this->_tpl_vars['quote_item']['sales_review'] != 'validated' && $this->_tpl_vars['quote_item']['sales_review'] != 'closed' && $this->_tpl_vars['quote_item']['sales_review'] != 'briefing' )): ?>
											<li>
												<?php if (time() < $this->_tpl_vars['quote_item']['sales_validation_expires']): ?>
													<span class="label label-success" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Quote is ready to be validated by sales <span id='time_<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['sales_validation_expires']; ?>
'>
																	 <span id='text_<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['sales_validation_expires']; ?>
'></span>
																</span>">Ready
													</span>
												<?php else: ?>
													<span class="label label-warning" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Quote is ready to be validated by sales <br> En retard : <span id='time_<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['sales_validation_expires']; ?>
' class='enretard'>
																 <span id='text_<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote_item']['sales_validation_expires']; ?>
'></span>
															</span>">Ready
													</span>
												<?php endif; ?>
											</li>
										
										<?php endif; ?>										
										<li><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</li>
										<li>v<?php echo $this->_tpl_vars['quote_item']['version']; ?>
</li>
									</ul>
								   <div class="owner"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['quote_item']['quote_by']; ?>
/logo.jpg?123"  data-toggle="tooltip" data-placement="left" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_item']['owner'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"></div>
								</div>
							</div>                    
						</div>
					<!-- card, stop -->
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>	
			<?php endif; ?>		





<?php if (count($this->_tpl_vars['quote_list']) > 0 && $_GET['sales_review'] == 'validated'): ?>
				<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['vquote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['vquote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['vquote_item']):
        $this->_foreach['vquote_loop']['iteration']++;
?>
					<?php if ($this->_tpl_vars['vquote_item']['validated_status'] == '1'): ?>
						<!-- card, start -->
						<div class="card" id="quote-<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
">
							<div class="content">
								<div class="card-header">  
									<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['vquote_item']['client_id']; ?>
/<?php echo $this->_tpl_vars['vquote_item']['client_id']; ?>
_global.png?f=12345" class="brand_l">
									<span class="ps" data-toggle="tooltip" data-placement="bottom" title="Estimation of signature"><?php echo $this->_tpl_vars['vquote_item']['estimate_sign_percentage']; ?>
%</span>
									<div class="dropdown clearfix">
										<a href="#" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
											<b class="caret"></b>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
												<li>
													<a class="newversion" href="/quote-new/create-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
">  Modifier mission</a>
												</li>
												<li>
													<a href="/quote-new/sales-final-validation?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
"> Modifier la marge</a>
												</li>
												<li class="divider"></li>
												<li>
													<a href="/quote-new/close-quote-view?qid=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
" data-toggle="modal" data-target="#close_quote" class="closequote">Close</a>
												</li>
												<li>
													<a data-toggle="modal"  data-target="#sign_quote" href="/quote-new/sign-quote-view?qid=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
"  class="signquote">Sign</a>
												</li>
												<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
													<li>
														<a href="javascript:void(0);"class="delete-quote" data-id="<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
">Delete</a>
													</li>
												<?php endif; ?>	
												<li>
													<a href="/quote-new/download-quote-xls?currency=<?php echo $this->_tpl_vars['vquote_item']['sales_suggested_currency']; ?>
&quote_id=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
" >Download XLSX</a>
												</li>
											<?php else: ?>	
												<li>
													<a href="/quote-new/download-quote-xls?currency=<?php echo $this->_tpl_vars['vquote_item']['sales_suggested_currency']; ?>
&quote_id=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
" >Download XLSX</a>
												</li>
											<?php endif; ?>	
										</ul>
									</div> 
								</div>
								<a data-toggle="modal"  data-target="#sign_quote" href="/quote-new/sign-quote-view?qid=<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
"  class="signquote">
									<div class="qp">
										<?php if ($this->_tpl_vars['vquote_item']['turnover'] > 0): ?>
											<?php echo ((is_array($_tmp=$this->_tpl_vars['vquote_item']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['vquote_item']['sales_suggested_currency']; ?>
;
										<?php else: ?>
											-
										<?php endif; ?>
									</div>		
									<div class="qt"><?php echo ((is_array($_tmp=$this->_tpl_vars['vquote_item']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</div>
								</a>
								<div class="qf clearfix">
									<ul class="list-inline text-muted">
										<li>
											<span class="label label-info" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="top" data-content=" Quote will be considered as relance in : <span id='time_<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['vquote_item']['sign_expire_timeline']; ?>
' >
											<span id='text_<?php echo $this->_tpl_vars['vquote_item']['identifier']; ?>
_<?php echo $this->_tpl_vars['vquote_item']['sign_expire_timeline']; ?>
'></span>
										</span>">Relance
											</span>
										</li>
										
										<li><?php echo ((is_array($_tmp=$this->_tpl_vars['vquote_item']['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</li>
										<li>v<?php echo $this->_tpl_vars['vquote_item']['version']; ?>
</li>
									</ul>
									<div class="owner"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['vquote_item']['quote_by']; ?>
/logo.jpg?123"  data-toggle="tooltip" data-placement="left" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['vquote_item']['owner'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"></div>
								</div>
							</div>                    
						</div>
						<!-- card, stop -->				
					<?php endif; ?>			
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>


<?php if (count($this->_tpl_vars['quote_list']) > 0 && $_GET['sales_review'] == 'signed'): ?>
				<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['squote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['squote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['squote_item']):
        $this->_foreach['squote_loop']['iteration']++;
?>
					<?php if ($this->_tpl_vars['squote_item']['sales_review'] == 'signed'): ?>
						<!-- card, start-->
						<div class="card">
							<div class="content">
								<div class="card-header"> 
									<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['squote_item']['client_id']; ?>
/<?php echo $this->_tpl_vars['squote_item']['client_id']; ?>
_global.png?f=12345" class="brand_l">
									<span class="ps" data-toggle="tooltip" data-placement="bottom" title="Estimation of signature"><?php echo $this->_tpl_vars['squote_item']['estimate_sign_percentage']; ?>
%</span>									
									<div class="dropdown clearfix">
										<a href="#" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
												<b class="caret"></b>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
												<li>
													<?php if ($this->_tpl_vars['squote_item']['signed_exist'] == '1'): ?>
														<a href="/contractmission/contract-edit?contract_id=<?php echo $this->_tpl_vars['squote_item']['signed_contractid']; ?>
">View contract</a>
													<?php else: ?>
														<a href="/contractmission/create-contract?quote_id=<?php echo $this->_tpl_vars['squote_item']['identifier']; ?>
">Create the contract</a>												
													<?php endif; ?>
												</li>
											<?php endif; ?>
											<li>
												<a href="/quote-new/download-quote-xls?currency=<?php echo $this->_tpl_vars['squote_item']['sales_suggested_currency']; ?>
&quote_id=<?php echo $this->_tpl_vars['squote_item']['identifier']; ?>
">Download XLSX</a>
											</li>
											<li class="divider"></li>
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
												<li>
													<a href="javascript:void(0);"class="delete-quote" data-id="<?php echo $this->_tpl_vars['squote_item']['identifier']; ?>
">Delete</a>
												</li>
											<?php endif; ?>
										</ul>
									</div>
								</div>
						
								<a href="/quote-new/sales-final-validation?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['squote_item']['identifier']; ?>
">									
									<div class="qp">
										<?php if ($this->_tpl_vars['squote_item']['turnover'] > 0): ?>
											<?php echo ((is_array($_tmp=$this->_tpl_vars['squote_item']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['squote_item']['sales_suggested_currency']; ?>
;
										<?php endif; ?>
									</div>		
									<div class="qt"><?php echo ((is_array($_tmp=$this->_tpl_vars['squote_item']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</div>
								</a>

								<div class="qf clearfix">
									<ul class="list-inline text-muted">
										<li>
											<?php if ($this->_tpl_vars['squote_item']['signed_exist'] == '1'): ?>
												<span class="label label-info" data-html="true" data-trigger="hover"  data-toggle="popover" data-placement="top" data-content="<?php echo $this->_tpl_vars['squote_item']['signed_contract']; ?>
">Contract created</span>
											<?php else: ?>	
												<span class="label label-danger" data-html="true" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Pending contract creation">Contract to create</span>
											<?php endif; ?>
										</li>
										<li><?php echo ((is_array($_tmp=$this->_tpl_vars['squote_item']['signed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</li><li>v<?php echo $this->_tpl_vars['squote_item']['version']; ?>
</li>
									</ul>
								  <div class="owner"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['squote_item']['quote_by']; ?>
/logo.jpg?123"  data-toggle="tooltip" data-placement="left" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['squote_item']['owner'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"></div>
								</div>
							</div>                    
						</div>
					<!-- card, stop -->	
					
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>	
			<?php endif; ?>


<?php if (count($this->_tpl_vars['quote_list']) > 0 && $_GET['sales_review'] == 'closed'): ?>
				<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cquote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cquote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cquote_item']):
        $this->_foreach['cquote_loop']['iteration']++;
?>
					<?php if ($this->_tpl_vars['cquote_item']['closed_status'] == '1'): ?>
						<!-- card, start-->
						<div class="card">
							<div class="content">
								<div class="card-header"> 
									<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['cquote_item']['client_id']; ?>
/<?php echo $this->_tpl_vars['cquote_item']['client_id']; ?>
_global.png?f=12345" class="brand_l">	
									<span class="ps" data-toggle="tooltip" data-placement="bottom" title="Estimation of signature"><?php echo $this->_tpl_vars['cquote_item']['estimate_sign_percentage']; ?>
%</span>										
									<div class="dropdown clearfix">
										<a href="#" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
												<b class="caret"></b>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">											
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
												<li>
													<a href="/quote-new/relance-quote-popup?qid=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
"data-toggle="modal" data-target="#programmer-relance">Schedule reminder</a>
												</li>
												<li>
													<a href="/quote-new/close-relance-view?qid=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
" data-content="<?php echo $this->_tpl_vars['cquote_item']['closed_comments']; ?>
" data-toggle="modal"  data-target="#close_quote" class="closequote" >Select reason</a>
												</li>
												<li>
													<a class="newversion" href="/quote-new/create-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
">Reactivate Quote</a>
												</li>
												<li>
													<a href="/quote-new/edit-quote-final-step?quote_id=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
"  data-toggle="modal" data-target="#edit_quote_files"> Add informations</a>
												</li>
												<li class="divider"></li>												
											<?php endif; ?>
											
											<li>
												<a href="/quote-new/download-quote-xls?currency=<?php echo $this->_tpl_vars['cquote_item']['sales_suggested_currency']; ?>
&quote_id=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
">Download XLSX</a>
											</li>											
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
												<li>
													<a href="javascript:void(0);"class="delete-quote" data-id="<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
">Delete</a>
												</li>
											<?php endif; ?>
										</ul>
									</div>
								</div>
						
								<a class="newversion" href="/quote-new/create-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['cquote_item']['identifier']; ?>
">
									<div class="qp">
										<?php if ($this->_tpl_vars['cquote_item']['turnover'] > 0): ?>
											<?php echo ((is_array($_tmp=$this->_tpl_vars['cquote_item']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['cquote_item']['sales_suggested_currency']; ?>
;
										<?php endif; ?>
									</div>		
									<div class="qt"><?php echo ((is_array($_tmp=$this->_tpl_vars['cquote_item']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</div>
								</a>

								<div class="qf clearfix">
									<ul class="list-inline text-muted">
										<?php if ($this->_tpl_vars['cquote_item']['closed_comments']): ?>
										<li>
											<span class="label label-info" data-content="<?php if ($this->_tpl_vars['cquote_item']['boot_customer']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cquote_item']['boot_customer'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
 - <?php endif; ?> <?php echo $this->_tpl_vars['closedreasons'][$this->_tpl_vars['cquote_item']['closed_reason']]; ?>
 - <?php echo $this->_tpl_vars['cquote_item']['closed_comments']; ?>
"  data-html="true" data-trigger="hover" data-placement="top" data-toggle="popover">
												<?php echo $this->_tpl_vars['closedreasons'][$this->_tpl_vars['cquote_item']['closed_reason']]; ?>

											</span>
										</li>
										<?php endif; ?>
										<li><?php echo ((is_array($_tmp=$this->_tpl_vars['cquote_item']['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</li><li>v<?php echo $this->_tpl_vars['cquote_item']['version']; ?>
</li>
									</ul>
								  <div class="owner"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['cquote_item']['quote_by']; ?>
/logo.jpg?123"  data-toggle="tooltip" data-placement="left" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['cquote_item']['owner'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"></div>
								</div>
							</div>                    
						</div>
					<!-- card, stop -->	
					
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>	
			<?php endif; ?>


<?php if (count($this->_tpl_vars['quote_list']) > 0 && $_GET['sales_review'] == 'relance'): ?>
				<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rquote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rquote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rquote_item']):
        $this->_foreach['rquote_loop']['iteration']++;
?>
					<?php if ($this->_tpl_vars['rquote_item']['relancer_status'] == '1'): ?>
						<!-- card, start-->
						<div class="card">
							<div class="content">
								<div class="card-header"> 
									<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['rquote_item']['client_id']; ?>
/<?php echo $this->_tpl_vars['rquote_item']['client_id']; ?>
_global.png?f=12345" class="brand_l">	
									<span class="ps" data-toggle="tooltip" data-placement="bottom" title="Estimation of signature"><?php echo $this->_tpl_vars['rquote_item']['estimate_sign_percentage']; ?>
%</span>										
									<div class="dropdown clearfix">
										<a href="#" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
												<b class="caret"></b>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">											
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
												<li>
													<a href="/quote-new/relance-quote-popup?qid=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
"data-toggle="modal" data-target="#programmer-relance">Schedule reminder</a>
												</li>
												<li>
													<a href="/quote-new/close-relance-view?qid=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
" data-content="<?php echo $this->_tpl_vars['rquote_item']['closed_comments']; ?>
" data-toggle="modal"  data-target="#close_quote" class="closequote" >Select reason</a>
												</li>
												<li>
													<a class="newversion" href="/quote-new/create-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
">Reactivate Quote</a>
												</li>
												<li>
													<a href="/quote-new/edit-quote-final-step?quote_id=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
"  data-toggle="modal" data-target="#edit_quote_files"> Add informations</a>
												</li>
												<li class="divider"></li>
												<li>
													<a href="/quote-new/close-relance-view?qid=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
&closed_type=perdu" data-toggle="modal" data-target="#close_quote" class="closequote"> Close</a>
												</li>
											<?php endif; ?>
											
											<li>
												<a href="/quote-new/download-quote-xls?currency=<?php echo $this->_tpl_vars['rquote_item']['sales_suggested_currency']; ?>
&quote_id=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
">Download XLSX</a>
											</li>											
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
												<li>
													<a href="javascript:void(0);"class="delete-quote" data-id="<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
">Delete</a>
												</li>
											<?php endif; ?>
										</ul>
									</div>
								</div>
						
								<a class="newversion" href="/quote-new/create-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['rquote_item']['identifier']; ?>
">								
									<div class="qp">
										<?php if ($this->_tpl_vars['rquote_item']['turnover'] > 0): ?>
											<?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['rquote_item']['sales_suggested_currency']; ?>
;
										<?php endif; ?>
									</div>		
									<div class="qt"><?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</div>
								</a>

								<div class="qf clearfix">
									<ul class="list-inline text-muted">
										<li>
											<?php if ($this->_tpl_vars['rquote_item']['boot_customer'] && $this->_tpl_vars['rquote_item']['relancer_commet'] != ""): ?>
											<span class="hidden"><?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['boot_customer'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</span>
											<span class="label label-info" data-content="<?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['boot_customer'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
 - <?php if ($this->_tpl_vars['rquote_item']['closed_reason']): ?><?php echo $this->_tpl_vars['closedreasons'][$this->_tpl_vars['rquote_item']['closed_reason']]; ?>
 - <?php endif; ?><?php echo $this->_tpl_vars['rquote_item']['relancer_commet']; ?>
"  data-html="true" data-trigger="hover" data-placement="top" data-toggle="popover">
												<?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['boot_customer'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 relance
											</span>
										 <?php else: ?>
											<span class="label label-danger"data-html="true" data-trigger="hover" data-placement="top" data-content="Please, contact the client again" data-toggle="popover">To update</span>
										 <?php endif; ?>
											
										</li>
										<li><?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</li><li>v<?php echo $this->_tpl_vars['rquote_item']['version']; ?>
</li>
									</ul>
								  <div class="owner"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['rquote_item']['quote_by']; ?>
/logo.jpg?123"  data-toggle="tooltip" data-placement="left" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['rquote_item']['owner'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"></div>
								</div>
							</div>                    
						</div>
					<!-- card, stop -->	
					
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>	
			<?php endif; ?>


				<?php if (count($this->_tpl_vars['quote_list']) > 0 && $_GET['sales_review'] == 'deleted' && $this->_tpl_vars['user_type'] == 'superadmin'): ?>
					<?php $_from = $this->_tpl_vars['quote_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['dquote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['dquote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dquote_item']):
        $this->_foreach['dquote_loop']['iteration']++;
?>
						<?php if ($this->_tpl_vars['dquote_item']['sales_review'] == 'deleted'): ?>
							<!-- card, start -->
							<div class="card" id="quote-<?php echo $this->_tpl_vars['dquote_item']['identifier']; ?>
">
								<div class="content">
									<div class="card-header">  
										<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['dquote_item']['client_id']; ?>
/<?php echo $this->_tpl_vars['dquote_item']['client_id']; ?>
_global.png?f=12345" class="brand_l">
										<span class="ps" data-toggle="tooltip" data-placement="bottom" title="Estimation of signature"><?php echo $this->_tpl_vars['dquote_item']['estimate_sign_percentage']; ?>
%</span>
										<div class="dropdown clearfix">
											<a href="#" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
												<b class="caret"></b>
											</a>
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
												<ul class="dropdown-menu dropdown-menu-right">
												
													<li>
														<a href="javascript:void(0);"class="delete-quote-permenent" data-id="<?php echo $this->_tpl_vars['dquote_item']['identifier']; ?>
">Delete</a>
													</li>											
												</ul>
											<?php endif; ?>	
										</div> 
									</div>
									<a href="javascript:void(0);"class="delete-quote-permenent" data-id="<?php echo $this->_tpl_vars['dquote_item']['identifier']; ?>
">									
										<div class="qp">
											<?php if ($this->_tpl_vars['dquote_item']['turnover'] > 0): ?>
												<?php echo ((is_array($_tmp=$this->_tpl_vars['dquote_item']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['dquote_item']['sales_suggested_currency']; ?>
;
											<?php endif; ?>
										</div>		
										<div class="qt"><?php echo ((is_array($_tmp=$this->_tpl_vars['dquote_item']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</div>
									</a>
									<div class="qf clearfix">
										<ul class="list-inline text-muted">
											<li><?php echo ((is_array($_tmp=$this->_tpl_vars['dquote_item']['deleted_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</li>
											<li>v<?php echo $this->_tpl_vars['dquote_item']['version']; ?>
</li>
										</ul>
										<div class="owner"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['dquote_item']['quote_by']; ?>
/logo.jpg?123"  data-toggle="tooltip" data-placement="left" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['dquote_item']['owner'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"></div>
									</div>
								</div>                    
							</div>
							<!-- card, stop -->				
						<?php endif; ?>			
					<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
