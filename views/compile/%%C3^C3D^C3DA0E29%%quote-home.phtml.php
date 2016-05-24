<?php /* Smarty version 2.6.19, created on 2015-10-29 09:02:05
         compiled from gebo/quote/quote-home.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/quote/quote-home.phtml', 17, false),array('modifier', 'count', 'gebo/quote/quote-home.phtml', 19, false),array('modifier', 'zero_cut_t', 'gebo/quote/quote-home.phtml', 20, false),array('modifier', 'ucfirst', 'gebo/quote/quote-home.phtml', 50, false),)), $this); ?>
<?php echo '
'; ?>


<section id="workflow">
	<div id="logo-workflow"><img src="/BO/theme/gebo/css/images/workplace.png"></div>
	<div class="row-fluid">
		<div class="span3">
			<ul class="nav nav-tabs nav-stacked">
			<li><a href="/quote/create-client?submenuId=ML13-SL1">New Client</a></li>
			<li><a href="/quote/sales-quotes-list?submenuId=ML13-SL2">Quote</a></li>
			<li><a href="/contractmission/contract-list?submenuId=ML13-SL3">Contract</a></li>
			<li><a href="/contractmission/missions-list?submenuId=ML13-SL4">Mission</a></li>
			</ul>
		</div>
		<div class="span5 offset1">
		
		<span class="data">Turnover of signed quotes in <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B") : smarty_modifier_date_format($_tmp, "%B")); ?>

		<a href="#">
		 <?php if (count($this->_tpl_vars['monthlyCASignedQuotes']) > 0): ?>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['monthlyCASignedQuotes'][0]['ca_month'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 0) : smarty_modifier_zero_cut_t($_tmp, 0)); ?>
 &<?php echo $this->_tpl_vars['monthlyCASignedQuotes'][0]['sales_suggested_currency']; ?>
;
						<?php if ($this->_tpl_vars['monthlyCASignedQuotes'][1]['ca_month']): ?>						
							<small> All quotes in pounds : <?php echo ((is_array($_tmp=$this->_tpl_vars['monthlyCASignedQuotes'][1]['ca_month'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 0) : smarty_modifier_zero_cut_t($_tmp, 0)); ?>
 &<?php echo $this->_tpl_vars['monthlyCASignedQuotes'][1]['sales_suggested_currency']; ?>
;</small>
						<?php endif; ?>
					<?php else: ?>
						0
					<?php endif; ?>
		</a>
		</span>
		<br><br><br>
		<span class="data">Turnover of ongoing contract this year
		<a href="#"><?php if (count($this->_tpl_vars['caOpendContractOfYear']) > 0): ?>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['caOpendContractOfYear'][0]['ca_year'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 0) : smarty_modifier_zero_cut_t($_tmp, 0)); ?>
 &<?php echo $this->_tpl_vars['caOpendContractOfYear'][0]['sales_suggested_currency']; ?>
;
						<?php if ($this->_tpl_vars['caOpendContractOfYear'][1]['ca_year']): ?>
							<small> All contracts in pounds : <?php echo ((is_array($_tmp=$this->_tpl_vars['caOpendContractOfYear'][1]['ca_year'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 0) : smarty_modifier_zero_cut_t($_tmp, 0)); ?>
 &<?php echo $this->_tpl_vars['caOpendContractOfYear'][1]['sales_suggested_currency']; ?>
;</small>
						<?php endif; ?>
					<?php else: ?>
						0
					<?php endif; ?></a>
		
		</span>
		</div>

		<div class="span3">
		<div class="data-list"><span class="data">Total client <a href="/user/clients?submenuId=ML10-SL2"><?php echo $this->_tpl_vars['clientsCount']; ?>
</a></span></div>
		<div class="data-list"><span class="data">Ongoing contract <a href="/contractmission/contract-list?submenuId=ML13-SL3"><?php echo $this->_tpl_vars['ongContractsCount']; ?>
</a></span></div>
		<div class="data-list">
			<span class="data hint--left" data-hint="
				<?php if (count($this->_tpl_vars['ongContractMissionsCount']) > 0): ?>						
						( <?php $_from = $this->_tpl_vars['ongContractMissionsCount']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cmission']):
        $this->_foreach['cmission']['iteration']++;
?>							
							<?php echo ((is_array($_tmp=$this->_tpl_vars['cmission']['type'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
 - <?php echo $this->_tpl_vars['cmission']['missions']; ?>
 <?php if (! ($this->_foreach['cmission']['iteration'] == $this->_foreach['cmission']['total'])): ?>/<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?> )
					
					<?php endif; ?>">
				Ongoing missions <a href="/contractmission/missions-list?submenuId=ML13-SL4"><?php echo $this->_tpl_vars['totalOngContractMissions']; ?>
</a>
			</span>
		</div>
		
		</div>

	</div>	
</section>

<section id="homestat">
<div class="row-fluid">
	<div class="span4">
		<div class="well wbg well-large">
			<h3>Recent signed quotes</h3><br>
			
				<?php if (count($this->_tpl_vars['recentSignedQuotes']) > 0): ?>
					<table class="table table-hover">
       
						<tbody>
						<?php $_from = $this->_tpl_vars['recentSignedQuotes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oquote_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oquote_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quote_item']):
        $this->_foreach['oquote_loop']['iteration']++;
?>
							<tr>								
								<td>
									<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['quote_item']['company_name']; ?>
">
										<img class="" width="70" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/client/<?php echo $this->_tpl_vars['quote_item']['client_id']; ?>
/<?php echo $this->_tpl_vars['quote_item']['client_id']; ?>
_global.png">
									</a>
								</td>
								<td>
									<a href="/quote/quote-followup?quote_id=<?php echo $this->_tpl_vars['quote_item']['identifier']; ?>
&submenuId=ML13-SL2" target="_followup"><?php echo $this->_tpl_vars['quote_item']['title']; ?>
</a>
									<br><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_item']['signed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

								</td>									
								<td class="ar">
									<?php if ($this->_tpl_vars['quote_item']['final_turnover'] > 0): ?>
										<h4><?php echo ((is_array($_tmp=$this->_tpl_vars['quote_item']['final_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote_item']['sales_suggested_currency']; ?>
;</h4>
									<?php else: ?>
										-
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
				<?php else: ?>
					<h5>No quotes found.</h5>
				<?php endif; ?>
			</div>			
		</div>

	<div class="span4">
		<div class="well wbg well-large">
			
				<?php if (count($this->_tpl_vars['monthlyContracts']) > 0): ?>
				<h3>Contracts ended soon</h3>
				<br>
					<div class="accordion" id="accordion">
						<?php $_from = $this->_tpl_vars['monthlyContracts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['month']):
        $this->_foreach['contracts']['iteration']++;
?>
							<?php $this->assign('index', ($this->_foreach['contracts']['iteration']-1)+1); ?>
							<div class="accordion-group">
								<div class="accordion-heading">
								  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $this->_tpl_vars['index']; ?>
">
									<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B %Y") : smarty_modifier_date_format($_tmp, "%B %Y")); ?>

								  </a>
								</div>
								<div id="collapse<?php echo $this->_tpl_vars['index']; ?>
" class="accordion-body collapse <?php if ($this->_tpl_vars['index'] == 1): ?> in<?php endif; ?>">
									<div class="accordion-inner">
										<?php $_from = $this->_tpl_vars['month']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contract']):
?>
											<table class="table table-hover">       
												<tbody>
													<tr>
														<td><a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&action=view" target="_contract"><?php echo $this->_tpl_vars['contract']['contractname']; ?>
</a>
														<br><?php echo $this->_tpl_vars['contract']['company_name']; ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['expected_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>									
														<td class="ar">
															<?php if ($this->_tpl_vars['contract']['final_turnover'] > 0): ?>
																<h4><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['final_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract']['sales_suggested_currency']; ?>
;</h4>
															<?php else: ?>
																-	
															<?php endif; ?>
														</td>
													</tr>
												</tbody>
											</table>
										<?php endforeach; endif; unset($_from); ?>
									</div>
								</div>		
							</div>
						<?php endforeach; endif; unset($_from); ?>
					</div>
				<?php else: ?>
					<p class="text-center"><br><img src="/BO/theme/gebo/css/images/contract.png"><br><br>There's no existing contract yet ! <br><a href="/quote/sales-quotes-list?submenuId=ML13-SL2">Create a New contract</a></p>
				<?php endif; ?>	
			</div>			
		</div>
	
	<div class="span4">
		<div class="">
			<h3>Busy guys !</h3><br>
			
				<?php if (count($this->_tpl_vars['assignedTeamMembers']) > 0): ?>
					<ul class="profile unstyled clearfix">
					<?php $_from = $this->_tpl_vars['assignedTeamMembers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['team_user']):
?>
						<li class="pull-left">		
								<a class="hint--left" href="/contractmission/missions-list?pmid=<?php echo $this->_tpl_vars['team_user']['identifier']; ?>
&submenuId=ML13-SL4" data-hint="<?php echo $this->_tpl_vars['team_user']['first_name']; ?>
 <?php echo $this->_tpl_vars['team_user']['last_name']; ?>
">
								<span class="badge badge-info"><?php echo $this->_tpl_vars['team_user']['num_missions']; ?>
</span>
									<img class="rd_30" width="50" height="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['team_user']['identifier']; ?>
/logo.jpg" >
								</a>	
							</li>
					<?php endforeach; endif; unset($_from); ?>
						</ul>
				<?php endif; ?>
			</div>			
		</div>
	</div>
</section>