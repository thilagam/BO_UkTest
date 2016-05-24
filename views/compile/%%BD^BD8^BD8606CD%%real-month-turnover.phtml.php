<?php /* Smarty version 2.6.19, created on 2016-01-14 09:02:02
         compiled from gebo/turnover/real-month-turnover.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut_t', 'gebo/turnover/real-month-turnover.phtml', 31, false),array('modifier', 'count', 'gebo/turnover/real-month-turnover.phtml', 93, false),array('modifier', 'cat', 'gebo/turnover/real-month-turnover.phtml', 103, false),)), $this); ?>
<?php echo '
<style>
.wrapper table
{
	width: 100%;
}

.wrapper .table thead th
{
	background-color: inherit !important;
}

.wrapper table thead th:last-child
{
	background-color: #1fbba6 !important;
}
.realtotal{
    color: #89c0f7;
    font-weight: bold;
    text-transform: uppercase;
}
.realtotal a{
font-size: 26px;
 }
</style>
'; ?>


		<section id="">
		
				<div class="row-fluid">
					<h1> Real Turnover <?php echo $this->_tpl_vars['year']; ?>
:<span class="realtotal"> <?php echo ((is_array($_tmp=$this->_tpl_vars['totalturnovereuro'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &euro; - <?php echo ((is_array($_tmp=$this->_tpl_vars['totalturnoverpound'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &pound;</span></h1>
				</div>
			<div class="row-fluid">	
			<div class="" style="margin-top:-20px">
			<form id="filter_rturn">
					<select data-placeholder="Years" id="yearlist" name="year" class='yearselect submit'>
					<option></option>
						<?php $_from = $this->_tpl_vars['year_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['year_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['year_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['years']):
        $this->_foreach['year_loop']['iteration']++;
?>
							<?php if ($this->_tpl_vars['years'] == $this->_tpl_vars['year']): ?>
							   <option value="<?php echo $this->_tpl_vars['years']; ?>
" selected="selected" ><?php echo $this->_tpl_vars['years']; ?>
</option>
							<?php else: ?>
							   <option value="<?php echo $this->_tpl_vars['years']; ?>
" ><?php echo $this->_tpl_vars['years']; ?>
</option>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
					</select>
					<select data-placeholder="All Clients" id="all_clients" name="client" class='clientselect' >
						<option value="">All Clients</option>
						<?php $_from = $this->_tpl_vars['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['userkey'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
						<?php if ($this->_tpl_vars['userkey'] == $this->_tpl_vars['client']): ?>
							<option value="<?php echo $this->_tpl_vars['userkey']; ?>
" selected><?php echo $this->_tpl_vars['user']; ?>
</option>
						<?php else: ?>
							<option value="<?php echo $this->_tpl_vars['userkey']; ?>
" ><?php echo $this->_tpl_vars['user']; ?>
</option>
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
					</select>
					<select data-placeholder="All Sales" id="all_sales" class='saleselect' name="sales_id" >
										<option></option>
									
											<?php $_from = $this->_tpl_vars['salesusers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['usrkey'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
											<?php if ($this->_tpl_vars['usrkey'] == $_GET['sales_id']): ?>
										<option value="<?php echo $this->_tpl_vars['usrkey']; ?>
" selected="selected"><?php echo $this->_tpl_vars['user']; ?>
</option>
												<?php else: ?>
											<option value="<?php echo $this->_tpl_vars['usrkey']; ?>
" ><?php echo $this->_tpl_vars['user']; ?>
</option>
											<?php endif; ?>
									
										<?php endforeach; endif; unset($_from); ?>
					</select>
					<a class="btn submit" id="search-filter" style="margin-top:-23px">Refine</a>
			</form>
			</div>
			<div class="wrapper" id="">
				<table class="table table-hover" id="client-turnover">
					<thead>
						<tr class="displayDatas">
							<th>Code</th>
							<th style="width:250px">Client Name</th>
							<th><?php echo $this->_tpl_vars['month_array_val']['01']; ?>
</th>
							<th><?php echo $this->_tpl_vars['month_array_val']['02']; ?>
</th> 
							<th><?php echo $this->_tpl_vars['month_array_val']['03']; ?>
</th>
							<th><?php echo $this->_tpl_vars['month_array_val']['04']; ?>
</th>
							<th><?php echo $this->_tpl_vars['month_array_val']['05']; ?>
</th>
							<th><?php echo $this->_tpl_vars['month_array_val']['06']; ?>
</th>
							<th><?php echo $this->_tpl_vars['month_array_val']['07']; ?>
</th>
							<th><?php echo $this->_tpl_vars['month_array_val']['08']; ?>
</th>
							<th><?php echo $this->_tpl_vars['month_array_val']['09']; ?>
</th>
							<th><?php echo $this->_tpl_vars['month_array_val']['10']; ?>
</th>
							<th><?php echo $this->_tpl_vars['month_array_val']['11']; ?>
</th>
							<th><?php echo $this->_tpl_vars['month_array_val']['12']; ?>
</th>
							<th>total <span class="yearTotal"><?php echo $this->_tpl_vars['year']; ?>
</span></th>
						</tr>					
					</thead>
					<tbody>		
					<?php if (count($this->_tpl_vars['monthturnovers']) > 0): ?>
					<?php $_from = $this->_tpl_vars['monthturnovers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['monthturnover'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['monthturnover']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['monthturnover']):
        $this->_foreach['monthturnover']['iteration']++;
?>
						<tr>
							<td><?php echo $this->_tpl_vars['monthturnover']['other_info']['client_code']; ?>
</td>
							<td>
								<a href="/turnover/real-month-client-focus?client=<?php echo $this->_tpl_vars['monthturnover']['other_info']['user_id']; ?>
&year=<?php echo $this->_tpl_vars['year']; ?>
&sales_id=<?php echo $_GET['sales_id']; ?>
">
								<?php echo $this->_tpl_vars['monthturnover']['other_info']['company_name']; ?>

								</a>
							</td>
							<td>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '01') : smarty_modifier_cat($_tmp, '01'))); ?>
								<?php $this->assign('total', $this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</td>
							<td>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '02') : smarty_modifier_cat($_tmp, '02'))); ?>
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</td>
							<td>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '03') : smarty_modifier_cat($_tmp, '03'))); ?>
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</td>
							<td>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '04') : smarty_modifier_cat($_tmp, '04'))); ?>
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</td>
							<td>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '05') : smarty_modifier_cat($_tmp, '05'))); ?>
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</td>
							<td>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '06') : smarty_modifier_cat($_tmp, '06'))); ?>
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</td>
							<td>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '07') : smarty_modifier_cat($_tmp, '07'))); ?>
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</td>
							<td>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '08') : smarty_modifier_cat($_tmp, '08'))); ?>
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</td>
							<td>
							<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '09') : smarty_modifier_cat($_tmp, '09'))); ?>
							<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']]); ?>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</td>
							<td>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '10') : smarty_modifier_cat($_tmp, '10'))); ?>
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</td>
							<td>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '11') : smarty_modifier_cat($_tmp, '11'))); ?>
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</td>
							<td>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '12') : smarty_modifier_cat($_tmp, '12'))); ?>
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['monthturnover'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</td>
							<td style="text-align:right"><?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['monthturnover']['other_info']['currency']; ?>
;</td>						
						</tr>	
					<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
						<tr>
							<th colspan="14" style="text-align:center">No record found!</th>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
					</section>
					
	<?php echo '

	<script>
		$(document).ready(function(){
			$("#yearlist").chosen({allow_single_deselect:false,search_contains: true});
	  	    $("#all_clients").chosen({allow_single_deselect:false,search_contains: true});
			$("#all_sales").chosen({allow_single_deselect:true,search_contains: true});
			$(".submit").on(\'click\',function(){
				$("#filter_rturn").submit();
			})
			
			$(\'#client-turnover\').dataTable({
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"iDisplayLength" : 50,
				 "aaSorting": [[ 0, "asc" ]],
				"aoColumns": [
					{ "sType": "string"  },
					{ "sType": "string"  },
					{ "sType": "natural" },
					{ "sType": "natural" },
					{ "sType": "natural" },
					{ "sType": "natural" },
					{ "sType": "natural" },
					{ "sType": "natural" },
					{ "sType": "natural" },
					{ "sType": "natural" },
					{ "sType": "natural" },
					{ "sType": "natural" },
					{ "sType": "natural" },
					{ "sType": "natural" },
					{ "sType": "natural" }
				]
			});

		});

	</script>
	'; ?>
