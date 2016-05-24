<?php /* Smarty version 2.6.19, created on 2016-01-14 08:53:05
         compiled from gebo/turnover/contract-monthly.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/turnover/contract-monthly.phtml', 64, false),array('modifier', 'zero_cut_t', 'gebo/turnover/contract-monthly.phtml', 149, false),array('modifier', 'is_array', 'gebo/turnover/contract-monthly.phtml', 178, false),array('modifier', 'cat', 'gebo/turnover/contract-monthly.phtml', 190, false),)), $this); ?>
<?php echo '
<style>
	.cost_detail{
		width:40px;
		text-align: center;
		color:#ff6464 !important;
		}
	.margin_detail{
			width:40px;
			color:#1fbba6 !important;
			text-align: center;
			}
	.split_details{
			width:40px;
			text-align: center;
			
		}
	.contract_val, .contract_name{
	   vertical-align: middle !important;
		}
	.contract_val b{
	   padding-left: 8px !important;
		}
		.subhead{
	border-top: 1px solid #ddd;
		}
		.subhead label{
		font-size: .65rem;
		color: #222;
		line-height: 50%;
		}
		
		div.displayInfos{
			width:20% !important;
			}
			.monthView .displayDatas{
				width: 79.9% !important;
				}
	</style>
	<script>
		$(document).ready(function(){
		
		$(\'.fa-angle-right\').on(\'click\',function(){
			
			var target = $(this).attr("href");
			$("#contractmonthly .modal-body").load(target, function() { 
				 
				$("#contractmonthly").modal("show"); 
			});
				});
				
			$(\'.fa-angle-left\').on(\'click\',function(){
				
			var target = $(this).attr("href");
			$("#contractmonthly .modal-body").load(target, function() { 
				
				$("#contractmonthly").modal("show"); 
			});
			
				});
		});
		</script>
'; ?>

	<?php if (((is_array($_tmp=$this->_tpl_vars['contract_details'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp)) > 0): ?>

			<div class="container-fluid">
					<div class="monthView">
						<header>
							<i href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_details']['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year_val']; ?>
-<?php echo $this->_tpl_vars['prev_month']; ?>
"  role="button" data-toggle="modal" class="fa fa-angle-left"></i>
							<span class="selectedMonth"><?php echo $this->_tpl_vars['month_val']; ?>
 - <?php echo $this->_tpl_vars['year_val']; ?>
</span>
							<i href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_details']['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year_val']; ?>
-<?php echo $this->_tpl_vars['next_month']; ?>
"  role="button"  data-toggle="modal"  class="fa fa-angle-right"></i>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="fa fa-times-circle"></i></button>
						</header>
						<div class="displayInfos">
							<div class="clientName">
								<h4><?php echo $this->_tpl_vars['client_details']['client_name']; ?>
</h4>
								
							</div>

							<table>
								<tbody>
									<tr>
										<td class="salesName" colspan="2">
										<!--	<a class="hint--right"  data-hint="<?php echo $this->_tpl_vars['sales_details']['sales_owner']; ?>
">
								<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['sales_details']['sales_creator_id']; ?>
/logo.jpg?123" class="image rd_30" alt="<?php echo $this->_tpl_vars['sales_details']['sales_owner']; ?>
"></a> -->
								</td>
									</tr>
									<tr>
										<td>Client ID</td>
										<td><?php echo $this->_tpl_vars['client_details']['client_code']; ?>
</td>
									</tr>
									<!--<tr>
										<td>launch date</td>
										<td>15/09/2015</td>
									</tr>
									<tr>
										<td>end date</td>
										<td>15/09/2015</td>
									</tr>  -->
									<tr>
										<td>Show Costs</td>
										<td>
											<input type="checkbox" name="my-checkbox" id="cost_display" checked>
										</div>
									</td>
								</tr>	
								<tr>
									<td>Show margin</td>
									<td>
										<input type="checkbox" name="my-checkbox" id="margin_display" checked>
									</div>
								</td>
							</tr>																					
						</tbody>
					</table>
				</div>
				<div class="displayDatas">
					<table class="mainTable">
						<thead>
							<tr>
								<th  style="width:35%">Mission Name</th>
								<th colspan="3" class="missionhead">Real</th>
								<th colspan="3" class="missionhead">theorical</th>
								<th  colspan="3" class="missionhead">Difference</th>
							</tr>
							
							<tr>
								<th></th>
								<th class="subhead split_details"><label for="">normal</label></th>
								<th class="subhead cost_detail" ><label for="">Cost</label></th>
								<th class="subhead margin_detail"><label for="">Margin</label></th>
								<th class="subhead split_details"><label for="">normal</label></th>
								<th class="subhead cost_detail"><label for="">Cost</label></th>
								<th class="subhead margin_detail" ><label for="">Margin</label></th>
								<th class="subhead split_details"><label for="">normal</label></th>
								<th class="subhead cost_detail"><label for="">Cost</label></th>
								<th class="subhead margin_detail"><label for="">Margin</label></th>
									
							</tr>
						</thead>
						<tbody>
					<?php $_from = $this->_tpl_vars['contract_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contract_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contract_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contract_item']):
        $this->_foreach['contract_loop']['iteration']++;
?>
						<?php $this->assign('quotecontract_id', $this->_tpl_vars['contract_item']['quotecontractid']); ?>
						<?php $this->assign('month_year', $_GET['month']); ?>
					<?php if ($this->_tpl_vars['quotecontract_id'] != ""): ?>
							<tr class="contractRow active">
								<td style="width:35%;"><span class="contractName"><?php echo $this->_tpl_vars['contract_item']['contractname']; ?>
</span> </td>
								
								<td  class="split_details"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['realturnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span></td>
								<td class="cost_detail"><span ><?php echo ((is_array($_tmp=$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['realcostturnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span></td>
								<?php $this->assign('marginreal', $this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['realturnover']-$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['realcostturnover']); ?>
								<?php $this->assign('marginper_det', $this->_tpl_vars['marginreal']/$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['realturnover']); ?>
								<?php $this->assign('marginper_tag', $this->_tpl_vars['marginper_det']*100); ?>
								<td class="margin_detail"><span ><?php echo ((is_array($_tmp=$this->_tpl_vars['marginper_tag'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 %</span></td>
								
								
								<td class="split_details"><span ><?php echo ((is_array($_tmp=$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span></td>
								<td class="cost_detail"><span ><?php echo ((is_array($_tmp=$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['costtotal'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span></td>
								<?php $this->assign('margincontract', $this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']][$this->_tpl_vars['month_year']]-$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['costtotal']); ?>
								<?php $this->assign('margincostper', $this->_tpl_vars['margincontract']/$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']][$this->_tpl_vars['month_year']]); ?>
								<?php $this->assign('marginpercentage', $this->_tpl_vars['margincostper']*100); ?>
								<td class="margin_detail"><span ><?php echo ((is_array($_tmp=$this->_tpl_vars['marginpercentage'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 %</span></td>
								
								<?php $this->assign('diff_cont_normal', $this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['realturnover']-$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']][$this->_tpl_vars['month_year']]); ?>
								<td  class="split_details"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['diff_cont_normal'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span></td>
								<?php $this->assign('diff_cont_real', $this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['realcostturnover']-$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['costtotal']); ?>
								<td class="cost_detail"><span ><?php echo ((is_array($_tmp=$this->_tpl_vars['diff_cont_real'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span></td>
																<?php $this->assign('diff_cont_mar', $this->_tpl_vars['marginper_tag']-$this->_tpl_vars['marginpercentage']); ?>
								<td class="margin_detail"><span ><?php echo ((is_array($_tmp=$this->_tpl_vars['diff_cont_mar'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 %</span></td>
							</tr>
							<!-- END CONTRACT ROW -->
									<?php $this->assign('mission_array', ""); ?>
												<?php $this->assign('mission_array', $this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]); ?>
												<?php $_from = $this->_tpl_vars['mission_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mission_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mission_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission_item']):
        $this->_foreach['mission_loop']['iteration']++;
?>
												<?php $this->assign('mission_id', $this->_tpl_vars['mission_item']); ?>
													<?php if ($this->_tpl_vars['mission_id'] != "" && $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['mission_type'] && ((is_array($_tmp=$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?>
											<tr class="<?php echo $this->_tpl_vars['mission_id']; ?>
">
												<td style="width:35%;"><span class="missionName">
													<?php if ($this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['assigned_to']): ?>
															<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['assigned_name']; ?>
">
																<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['assigned_to']; ?>
/logo.jpg?123" class="image rd_30" alt="<?php echo $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['assigned_name']; ?>
"  >
															</a>
														<?php else: ?>
															-
														<?php endif; ?><?php echo $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['mission_type']; ?>
 <?php echo $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['mission_type_other']; ?>
</span> </td>
											<!---- Real-->
												<td class="split_details"><span>
												<?php $this->assign('real_month_year', ((is_array($_tmp='real_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
												<?php echo ((is_array($_tmp=$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['real_month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span></td>
												<td class="cost_detail"><span ><?php $this->assign('realcost_month_year', ((is_array($_tmp='realcost_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
												<?php echo ((is_array($_tmp=$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['realcost_month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span></td>
												<?php $this->assign('margin_mission_real', $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['real_month_year']]-$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['realcost_month_year']]); ?>
												<?php $this->assign('margin_mission_per', $this->_tpl_vars['margin_mission_real']/$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['real_month_year']]); ?>
												<?php $this->assign('margin_missiontage', $this->_tpl_vars['margin_mission_per']*100); ?>
												<td class="margin_detail"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['margin_missiontage'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 %</span></td>
											<!---- Theoritical-->	
												
												<td class="split_details"><span ><?php echo ((is_array($_tmp=$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span></td>
												<td class="cost_detail"><span ><?php echo ((is_array($_tmp=$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['cost'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span></td>
													<?php $this->assign('marginmission', $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['cost'][$this->_tpl_vars['month_year']]); ?>
													<?php $this->assign('marginmissionper', $this->_tpl_vars['marginmission']/$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['month_year']]); ?>
													<?php $this->assign('marginmissiontage', $this->_tpl_vars['marginmissionper']*100); ?>
												<td class="margin_detail"><span ><?php echo ((is_array($_tmp=$this->_tpl_vars['marginmissiontage'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 %</span></td>
											
												<!---- Difference-->
												<?php $this->assign('normal_diff', $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['real_month_year']]-$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['month_year']]); ?>
												<td class="split_details"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['normal_diff'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span></td>
												<?php $this->assign('real_diff', $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['realcost_month_year']]-$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['cost'][$this->_tpl_vars['month_year']]); ?>
												<td class="cost_detail"><span ><?php echo ((is_array($_tmp=$this->_tpl_vars['real_diff'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</span></td>
																								<?php $this->assign('diff_difftage', $this->_tpl_vars['margin_missiontage']-$this->_tpl_vars['marginmissiontage']); ?>
												<td class="margin_detail"><span ><?php echo ((is_array($_tmp=$this->_tpl_vars['diff_difftage'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 %</span></td>
											</tr>
										
							<!-- END MISSION ROW -->
                          <?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
						</tbody>
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
					</table>
				</div>				
			<?php endif; ?>
			