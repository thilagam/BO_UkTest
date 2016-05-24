<?php /* Smarty version 2.6.19, created on 2016-01-14 09:02:10
         compiled from gebo/turnover/real-month-clientfocus.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'gebo/turnover/real-month-clientfocus.phtml', 314, false),array('modifier', 'zero_cut_t', 'gebo/turnover/real-month-clientfocus.phtml', 315, false),array('modifier', 'string_format', 'gebo/turnover/real-month-clientfocus.phtml', 319, false),array('modifier', 'htmlentities', 'gebo/turnover/real-month-clientfocus.phtml', 686, false),)), $this); ?>
<?php echo '
<style>
.clientFocusHeader h3
{
	line-height: 60px;
}

.image {
    height: 30px;
    text-align: center;
    width: 30px;
}
</style>
<style>
	#contract-invoice tr th{
		background-color:#1E90FF !important;
		color:#FFF;
		}
	#contract-invoice tr th.total-row{
		background-color:#20B2AA !important;
	}
	#contract-invoice tr:hover {
    background-color: #CDE6F7 !important;
	}
	#contract-invoice tr td {
    font-size:12px !important;
	}
	#client_details_view tr td {
    font-size:12px !important;
	}
	
	#client_details_view tr th.clirnt_contract {
	max-width:300px !important;
	text-align:center !important;
	}
	#client_details_view tr th.months {
    width:75px !important;
    text-align:center !important;
	}
	#client_details_view tr th.total {
    width:80px !important;
    text-align:center !important;
	}
	#client_details_view tr td.sales_name {
    text-align:center;
    padding:5px;
	}
	
	#client_details_view tr:hover {
    background-color: #CDE6F7 !important;
	}
	#client_details_view tr td.contract_name {
		vertical-align:middle !important;
		}
	#client_details_view tr td.contract_val {
		vertical-align:middle !important;
		}
	#client_details_view tr td.mission-val {
		vertical-align:middle !important;
		}
	.image {
     height: 30px;
    text-align: center;
    width: 30px;
}
  #search-filter,input#start_date,input#end_date,#back-button{
	  margin-bottom: 23px;
  }
  
  input.turnover{
	  margin-bottom: 23px;
  }
  
 #canvas{
	padding: 0px 0px 8px 7px;
	max-width:1284px !important;
		 }
.btn-gebo1 {
    background-color: #006d8d;
    background-image: none;
    border-color: rgba(0, 0, 0, 0.25) rgba(0, 0, 0, 0.35) rgba(0, 0, 0, 0.35) rgba(0, 0, 0, 0.25);
    border-width: 0;
    color: #ffffff;
    text-shadow: 0 -1px 0 #004f6f;
}
.btn-gebo1:hover {
    color: #FFFFFF;
    text-shadow: 0 -1px 0 #003151;
	background-color: #004F6F;
}
.fullscreen {
    left: 0 !important;
    margin-left: 0 !important;
    top: 0 !important;
    width: 99%;
}
img.image{
	margin:5px;
	}
.modal-backdrop.fade.in{
	opacity: 0.8 !important;
	}
 p.entered_val{
	color:#FF0000 !important;
	}

</style>
'; ?>

<section id="">
<ul class="breadcrumb">
  <li><a href="/turnover/real-month">Real turnover</a> <span class="divider">/</span></li>
  <li><?php echo $this->_tpl_vars['client_details']['company_name']; ?>
</li>
</ul>
		<h1><?php echo $this->_tpl_vars['client_details']['company_name']; ?>
 > real turnover <?php echo $this->_tpl_vars['year']; ?>
</h1>
		
		<div style="margin-top:20px">
			<form name="search_form" id="search_form" method="get" action="">
			<select data-placeholder="Years" id="yearlist" class='yearselect' name="year" >
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
			<input type="hidden" value="<?php echo $_GET['client']; ?>
" name="client">	
			<select data-placeholder="All Sales" id="all_sales" class='saleselect' name="sales_id" >
				<option></option>
				<?php $_from = $this->_tpl_vars['salesusers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user_key'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
					<?php if ($this->_tpl_vars['user_key'] == $_GET['sales_id']): ?>
						<option value="<?php echo $this->_tpl_vars['user_key']; ?>
" selected="selected"><?php echo $this->_tpl_vars['user']; ?>
</option>
					<?php else: ?>
						<option value="<?php echo $this->_tpl_vars['user_key']; ?>
" ><?php echo $this->_tpl_vars['user']; ?>
</option>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</select>	
			<select data-placeholder="All Mission Type" id="product_type" class='producttypeselect' name="p_type" >
				<option></option>
				<?php $_from = $this->_tpl_vars['product_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['product_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['product_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product_type_key'] => $this->_tpl_vars['type_item']):
        $this->_foreach['product_loop']['iteration']++;
?>
						<?php if ($this->_tpl_vars['product_type_key'] == $_GET['p_type']): ?>
						<option value="<?php echo $this->_tpl_vars['product_type_key']; ?>
" selected="selected"><?php echo $this->_tpl_vars['type_item']; ?>
</option>
						<?php else: ?>
						<option value="<?php echo $this->_tpl_vars['product_type_key']; ?>
" ><?php echo $this->_tpl_vars['type_item']; ?>
</option>
						<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</select>
			<select data-placeholder="All Mission Product" id="product_name" class='productselect' name="product">
					<option></option>
					<?php $_from = $this->_tpl_vars['product_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['product_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['product_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product_key'] => $this->_tpl_vars['type_item']):
        $this->_foreach['product_loop']['iteration']++;
?>
						<?php if ($this->_tpl_vars['product_key'] == $_GET['product']): ?>
						<option value="<?php echo $this->_tpl_vars['product_key']; ?>
" selected="selected"><?php echo $this->_tpl_vars['type_item']; ?>
</option>
						<?php else: ?>
						<option value="<?php echo $this->_tpl_vars['product_key']; ?>
" ><?php echo $this->_tpl_vars['type_item']; ?>
</option>
						<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</select>
			<button class="btn btn-default pull-center" id="search-filter">Refine</button>
			</form>
		</div>

<div id="clientFocus" class="row-fluid">
	<div class="clientFocusHeader">					
		<h3 id="myModalLabel"><?php echo $this->_tpl_vars['client_details']['company_name']; ?>
 - <?php echo $this->_tpl_vars['year']; ?>
</h3>
		<div class="yearSelection">
				
		</div>				
	</div>
	
	<canvas id="focuschart" height="240px" width="940px"></canvas> 

	<table class="focusTable" id="client-turnover">
		<thead>
			<tr>
				<th>Sales</th>
				<th><span class="pull-left">Client/contracts</span></th>
				<th> 	<?php echo $this->_tpl_vars['month_array_val']['01']; ?>

					<span class="monthViewCta">
						<i class="fa fa-plus" id="monthActions"></i>
						<div class="monthActionList">
							<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year']; ?>
-01" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly" ><i class="fa fa-eye"></i></a>	
						</div>
					</span>		
				</th>
				<th> 	<?php echo $this->_tpl_vars['month_array_val']['02']; ?>

					<span class="monthViewCta">
						<i class="fa fa-plus" id="monthActions"></i>
						<div class="monthActionList">
							<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year']; ?>
-02" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly" ><i class="fa fa-eye"></i></a>	
						</div>
					</span>		
				</th>
				<th> 	<?php echo $this->_tpl_vars['month_array_val']['03']; ?>

					<span class="monthViewCta">
						<i class="fa fa-plus" id="monthActions"></i>
						<div class="monthActionList">
							<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year']; ?>
-03" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly" ><i class="fa fa-eye"></i></a>			
						</div>
					</span>		
				</th>	
				<th> 	<?php echo $this->_tpl_vars['month_array_val']['04']; ?>

					<span class="monthViewCta">
						<i class="fa fa-plus" id="monthActions"></i>
						<div class="monthActionList">
							<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year']; ?>
-04" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly" ><i class="fa fa-eye"></i></a>	
						</div>
					</span>		
				</th>
				<th> 	<?php echo $this->_tpl_vars['month_array_val']['05']; ?>

					<span class="monthViewCta">
						<i class="fa fa-plus" id="monthActions"></i>
						<div class="monthActionList">
							<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year']; ?>
-05" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly" ><i class="fa fa-eye"></i></a>							
						</div>
					</span>		
				</th>
				<th> 	<?php echo $this->_tpl_vars['month_array_val']['06']; ?>

					<span class="monthViewCta">
						<i class="fa fa-plus" id="monthActions"></i>
						<div class="monthActionList">
							<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year']; ?>
-06" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly" ><i class="fa fa-eye"></i></a>						
						</div>
					</span>		
				</th>	
				<th> 	<?php echo $this->_tpl_vars['month_array_val']['07']; ?>

					<span class="monthViewCta">
						<i class="fa fa-plus" id="monthActions"></i>
						<div class="monthActionList">
							<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year']; ?>
-07" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly" ><i class="fa fa-eye"></i></a>							
						</div>
					</span>		
				</th>
				<th> 	<?php echo $this->_tpl_vars['month_array_val']['08']; ?>

					<span class="monthViewCta">
						<i class="fa fa-plus" id="monthActions"></i>
						<div class="monthActionList">
							<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year']; ?>
-08" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly" ><i class="fa fa-eye"></i></a>							
						</div>
					</span>		
				</th>
				<th> 	<?php echo $this->_tpl_vars['month_array_val']['09']; ?>

					<span class="monthViewCta">
						<i class="fa fa-plus" id="monthActions"></i>
						<div class="monthActionList">
							<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year']; ?>
-09" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly" ><i class="fa fa-eye"></i></a>				
						</div>
					</span>		
				</th>	
				<th> 	<?php echo $this->_tpl_vars['month_array_val']['10']; ?>

					<span class="monthViewCta">
						<i class="fa fa-plus" id="monthActions"></i>
						<div class="monthActionList">
							<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year']; ?>
-10" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly" ><i class="fa fa-eye"></i></a>								
						</div>
					</span>		
				</th>
				<th> 	<?php echo $this->_tpl_vars['month_array_val']['11']; ?>

					<span class="monthViewCta">
						<i class="fa fa-plus" id="monthActions"></i>
						<div class="monthActionList">
							<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year']; ?>
-11" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly" ><i class="fa fa-eye"></i></a>				
						</div>
					</span>		
				</th>
				<th> 	<?php echo $this->_tpl_vars['month_array_val']['12']; ?>

					<span class="monthViewCta">
						<i class="fa fa-plus" id="monthActions"></i>
						<div class="monthActionList">
							<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_id']; ?>
&month=<?php echo $this->_tpl_vars['year']; ?>
-12" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly" ><i class="fa fa-eye"></i></a>				
						</div>
					</span>		
				</th>	
				<th> 	
					TOTAL
				</th>
			</thead>
			<tbody>
				<tr class="contractRow">
					
					<td></td>
					<td><span class="contractName pull-left"><?php echo $this->_tpl_vars['client_details']['company_name']; ?>
</span></td>
					<?php $this->assign('client_total', 0); ?>
					<?php $_from = $this->_tpl_vars['canvas_real']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['real']):
?>
					<?php $this->assign('client_total', $this->_tpl_vars['real']+$this->_tpl_vars['client_total']); ?>				
					<td><?php echo $this->_tpl_vars['real']; ?>
</td>
					<?php endforeach; endif; unset($_from); ?>
					<td><?php echo $this->_tpl_vars['client_total']; ?>
 &euro;</td>
					</tr>	
			<?php $_from = $this->_tpl_vars['contractturnover']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contract'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contract']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contractkey'] => $this->_tpl_vars['contract']):
        $this->_foreach['contract']['iteration']++;
?>
			<?php $_from = $this->_tpl_vars['contract']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['missionkey'] => $this->_tpl_vars['mission']):
        $this->_foreach['mission']['iteration']++;
?>
				<?php if ($this->_tpl_vars['missionkey'] == 'contract_details'): ?>
				<tr class="contractRow active">
					<td>
						<a class="hint--right sales_details" data-hint="<?php echo $this->_tpl_vars['mission']['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['mission']['last_name']; ?>
" data-target="#salesProfileView" tabindex="-1" data-toggle="modal" role="button" href="/turnover/sales-details?sales_id=<?php echo $this->_tpl_vars['mission']['sales_creator_id']; ?>
">
							<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['sales_creator_id']; ?>
/logo.jpg?123" class="image rd_30" alt="<?php echo $this->_tpl_vars['mission']['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['mission']['last_name']; ?>
"></a>
						</a>
					</td>
					<td>
						<span class="contractName pull-left"><?php echo $this->_tpl_vars['mission']['contractname']; ?>
</span>
												</td>
					<td >
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '01') : smarty_modifier_cat($_tmp, '01'))); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
								<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '01') : smarty_modifier_cat($_tmp, '01'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">							
									<span><?php echo $this->_tpl_vars['month_array_val']['01']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos" >
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<td>
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '02') : smarty_modifier_cat($_tmp, '02'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '02') : smarty_modifier_cat($_tmp, '02'))); ?>
									<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['02']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<td>
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '03') : smarty_modifier_cat($_tmp, '03'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '03') : smarty_modifier_cat($_tmp, '03'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['03']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<td>
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '04') : smarty_modifier_cat($_tmp, '04'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '04') : smarty_modifier_cat($_tmp, '04'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['04']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<td>
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '05') : smarty_modifier_cat($_tmp, '05'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '05') : smarty_modifier_cat($_tmp, '05'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['05']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>			
					<td>
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '06') : smarty_modifier_cat($_tmp, '06'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '06') : smarty_modifier_cat($_tmp, '06'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['06']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData">
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData">
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>	
					<td>
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '07') : smarty_modifier_cat($_tmp, '07'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
								<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '07') : smarty_modifier_cat($_tmp, '07'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['07']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData">
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData">
								
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<td>
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '08') : smarty_modifier_cat($_tmp, '08'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '08') : smarty_modifier_cat($_tmp, '08'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['08']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData">
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData">
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>												
					<td>
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '09') : smarty_modifier_cat($_tmp, '09'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '09') : smarty_modifier_cat($_tmp, '09'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['09']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData">
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData">
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<td>
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '10') : smarty_modifier_cat($_tmp, '10'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '10') : smarty_modifier_cat($_tmp, '10'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['10']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>	
					<td>
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '11') : smarty_modifier_cat($_tmp, '11'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '11') : smarty_modifier_cat($_tmp, '11'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['11']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData">
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<td>
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '12') : smarty_modifier_cat($_tmp, '12'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '12') : smarty_modifier_cat($_tmp, '12'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['12']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData">
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<td>
						<div class="dataFocus">
							<span class="singleData">
							<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['realturnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['mission']['sales_suggested_currency']; ?>
;
							</span>								
							<ul>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission']['realturnover'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission']['expected_turnover'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span>total <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['realturnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['expected_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos" >
									<?php $this->assign('difference', $this->_tpl_vars['mission']['realturnover']-$this->_tpl_vars['mission']['expected_turnover']); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>												
				</tr>
				<?php else: ?>
				<tr class="missionRow active" >
					<td>
						
					</td>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?>" style="text-align: left">
					<?php if ($this->_tpl_vars['mission']['assigned_to']): ?>
							<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['mission']['assigned_name']; ?>
">
								<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['mission']['assigned_to']; ?>
/logo.jpg?123" class="image rd_30" alt="<?php echo $this->_tpl_vars['mission']['assigned_name']; ?>
"  >
							</a>
						<?php else: ?>
							-
						<?php endif; ?>
						<span class="contractName">
						<?php echo $this->_tpl_vars['mission']['title']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['title_other'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>

						</span>
					</td>
					<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '01') : smarty_modifier_cat($_tmp, '01'))); ?>
					<?php $this->assign('edited_at', ((is_array($_tmp='edited_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('deleted_at', ((is_array($_tmp='deleted_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('freezed_at', ((is_array($_tmp='freezed_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?> <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['edited_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['deleted_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['freezed_at']]; ?>
">
						<div class="dataFocus">
							<span class="singleData">
							
							<?php $this->assign('total', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]); ?>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '01') : smarty_modifier_cat($_tmp, '01'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['01']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '01') : smarty_modifier_cat($_tmp, '01'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
								
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '02') : smarty_modifier_cat($_tmp, '02'))); ?>
					<?php $this->assign('edited_at', ((is_array($_tmp='edited_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('deleted_at', ((is_array($_tmp='deleted_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('freezed_at', ((is_array($_tmp='freezed_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?> <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['edited_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['deleted_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['freezed_at']]; ?>
">
						<div class="dataFocus">
							<span class="singleData">
								
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '02') : smarty_modifier_cat($_tmp, '02'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['02']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '02') : smarty_modifier_cat($_tmp, '02'))); ?>
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '03') : smarty_modifier_cat($_tmp, '03'))); ?>
					<?php $this->assign('edited_at', ((is_array($_tmp='edited_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('deleted_at', ((is_array($_tmp='deleted_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('freezed_at', ((is_array($_tmp='freezed_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?> <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['edited_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['deleted_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['freezed_at']]; ?>
">
						<div class="dataFocus">
							<span class="singleData">
								
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '03') : smarty_modifier_cat($_tmp, '03'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['03']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '03') : smarty_modifier_cat($_tmp, '03'))); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos" >
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '04') : smarty_modifier_cat($_tmp, '04'))); ?>
					<?php $this->assign('edited_at', ((is_array($_tmp='edited_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('deleted_at', ((is_array($_tmp='deleted_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('freezed_at', ((is_array($_tmp='freezed_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?> <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['edited_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['deleted_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['freezed_at']]; ?>
">
						<div class="dataFocus">
							<span class="singleData">
								
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '04') : smarty_modifier_cat($_tmp, '04'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['04']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '04') : smarty_modifier_cat($_tmp, '04'))); ?>
									
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
										
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos" >
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '05') : smarty_modifier_cat($_tmp, '05'))); ?>
					<?php $this->assign('edited_at', ((is_array($_tmp='edited_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('deleted_at', ((is_array($_tmp='deleted_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('freezed_at', ((is_array($_tmp='freezed_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?> <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['edited_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['deleted_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['freezed_at']]; ?>
">
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '05') : smarty_modifier_cat($_tmp, '05'))); ?>
							
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['05']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '05') : smarty_modifier_cat($_tmp, '05'))); ?>
								
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
										
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos" >
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>			
					<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '06') : smarty_modifier_cat($_tmp, '06'))); ?>
					<?php $this->assign('edited_at', ((is_array($_tmp='edited_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('deleted_at', ((is_array($_tmp='deleted_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('freezed_at', ((is_array($_tmp='freezed_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?> <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['edited_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['deleted_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['freezed_at']]; ?>
">
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '06') : smarty_modifier_cat($_tmp, '06'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['06']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '06') : smarty_modifier_cat($_tmp, '06'))); ?>
								
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
										
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos" >
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>	
					<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '07') : smarty_modifier_cat($_tmp, '07'))); ?>
					<?php $this->assign('edited_at', ((is_array($_tmp='edited_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('deleted_at', ((is_array($_tmp='deleted_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('freezed_at', ((is_array($_tmp='freezed_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?> <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['edited_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['deleted_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['freezed_at']]; ?>
">
						<div class="dataFocus">
							<span class="singleData">
								
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '07') : smarty_modifier_cat($_tmp, '07'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['07']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '07') : smarty_modifier_cat($_tmp, '07'))); ?>
								
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
										
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos" >
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '08') : smarty_modifier_cat($_tmp, '08'))); ?>
					<?php $this->assign('edited_at', ((is_array($_tmp='edited_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('deleted_at', ((is_array($_tmp='deleted_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('freezed_at', ((is_array($_tmp='freezed_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?> <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['edited_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['deleted_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['freezed_at']]; ?>
">
						<div class="dataFocus">
							<span class="singleData">
								
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '08') : smarty_modifier_cat($_tmp, '08'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['08']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '08') : smarty_modifier_cat($_tmp, '08'))); ?>
								
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
										
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos" >
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>								
					<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '09') : smarty_modifier_cat($_tmp, '09'))); ?>
					<?php $this->assign('edited_at', ((is_array($_tmp='edited_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('deleted_at', ((is_array($_tmp='deleted_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('freezed_at', ((is_array($_tmp='freezed_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?> <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['edited_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['deleted_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['freezed_at']]; ?>
">
						<div class="dataFocus">
							<span class="singleData">
								
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '09') : smarty_modifier_cat($_tmp, '09'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['09']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>									
								<li class="realData" >
									<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '09') : smarty_modifier_cat($_tmp, '09'))); ?>
								
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
										
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '10') : smarty_modifier_cat($_tmp, '10'))); ?>
					<?php $this->assign('edited_at', ((is_array($_tmp='edited_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('deleted_at', ((is_array($_tmp='deleted_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('freezed_at', ((is_array($_tmp='freezed_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?> <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['edited_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['deleted_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['freezed_at']]; ?>
">
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '10') : smarty_modifier_cat($_tmp, '10'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['10']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >	
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos">
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>	
					<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '11') : smarty_modifier_cat($_tmp, '11'))); ?>
					<?php $this->assign('edited_at', ((is_array($_tmp='edited_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('deleted_at', ((is_array($_tmp='deleted_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('freezed_at', ((is_array($_tmp='freezed_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?> <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['edited_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['deleted_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['freezed_at']]; ?>
">
						<div class="dataFocus">
							<span class="singleData">
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '11') : smarty_modifier_cat($_tmp, '11'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['11']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
									<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '11') : smarty_modifier_cat($_tmp, '11'))); ?>
								
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
										
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos" >
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '12') : smarty_modifier_cat($_tmp, '12'))); ?>
					<?php $this->assign('edited_at', ((is_array($_tmp='edited_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('deleted_at', ((is_array($_tmp='deleted_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<?php $this->assign('freezed_at', ((is_array($_tmp='freezed_at')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_year']))); ?>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?> <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['edited_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['deleted_at']]; ?>
 <?php echo $this->_tpl_vars['mission'][$this->_tpl_vars['freezed_at']]; ?>
">
						<div class="dataFocus">
							<span class="singleData">
								
								<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
							<?php $this->assign('month_year_exp', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='expected_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['year']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['year'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '12') : smarty_modifier_cat($_tmp, '12'))); ?>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span><?php echo $this->_tpl_vars['month_array_val']['12']; ?>
 <?php echo $this->_tpl_vars['two_year']; ?>
</span>
								</li>
								<li class="realData" >
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, '12') : smarty_modifier_cat($_tmp, '12'))); ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
										
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos" >
									<?php $this->assign('difference', $this->_tpl_vars['mission'][$this->_tpl_vars['month_year']]-$this->_tpl_vars['mission'][$this->_tpl_vars['month_year_exp']]); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>
					<td class="<?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>missionAdded<?php endif; ?>">
						<div class="dataFocus">
							<span class="singleData">
								<?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

							</span>								
							<ul>
								<li class="dataDate <?php if (((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")) >= ((is_array($_tmp=$this->_tpl_vars['mission']['expected_turnover'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f"))): ?>up<?php else: ?>down<?php endif; ?>">
									<span>Total </span>
								</li>
								<li class="realData" >
									<?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Real</span>
								</li>
								<li class="splitData" >
									<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['expected_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Expected</span>
								</li>
								<li class="differenceData pos" >
									<?php $this->assign('difference', $this->_tpl_vars['total']-$this->_tpl_vars['mission']['expected_turnover']); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['difference'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									<span>Difference</span>
								</li>
							</ul>	
						</div>
					</td>												
				</tr>		
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<?php endforeach; endif; unset($_from); ?>
			</tbody>
		</table>
		 <a class="btn btn-primary" style="margin-top: 10px;" href="/turnover/real-turnover-report?download=pdf<?php if ($_GET['client']): ?>&client=<?php echo $_GET['client']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['year']): ?>&year=<?php echo $this->_tpl_vars['year']; ?>
<?php endif; ?><?php if ($_GET['sales_id']): ?>&sales_id=<?php echo $_GET['sales_id']; ?>
<?php endif; ?><?php if ($_GET['clientid']): ?>&client_id=<?php echo $_GET['clientid']; ?>
<?php endif; ?><?php if ($_GET['product']): ?>&product=<?php echo $_GET['product']; ?>
<?php endif; ?><?php if ($_GET['p_type']): ?>&p_type=<?php echo $_GET['p_type']; ?>
<?php endif; ?>">Export PDF</a>
			<a class="btn btn-primary" style="margin-top: 10px;" href="/turnover/real-turnover-report<?php if ($this->_tpl_vars['year']): ?>?year=<?php echo $this->_tpl_vars['year']; ?>
<?php endif; ?><?php if ($_GET['client']): ?>&client=<?php echo $_GET['client']; ?>
<?php endif; ?><?php if ($_GET['sales_id']): ?>&sales_id=<?php echo $_GET['sales_id']; ?>
<?php endif; ?><?php if ($_GET['clientid']): ?>&client_id=<?php echo $_GET['clientid']; ?>
<?php endif; ?><?php if ($_GET['product']): ?>&product=<?php echo $_GET['product']; ?>
<?php endif; ?><?php if ($_GET['p_type']): ?>&p_type=<?php echo $_GET['p_type']; ?>
<?php endif; ?>" >Export XLS</a>	 
</div>

 <!-- MOdel Popup for sales details -->
	<div class="row-fluid">
		<div class="modal hide fade" id="salesProfileView"  aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
			<div class="modal-body">
				
			</div>
		</div>		
	</div>
	
	<div class="row-fluid">
		<div class="modal hide fade fullscreen" id="contractmonthly"  aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
			<div class="modal-body">
				<div style="text-align:center"><b>Please Wait Loading ...</b></div>
			</div>
		</div>
	</div>
</section>
<?php echo '
	<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : ['; ?>

	<?php $_from = $this->_tpl_vars['month_array_val']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['month']):
?>				
		"<?php echo $this->_tpl_vars['month']; ?>
",
	<?php endforeach; endif; unset($_from); ?>
<?php echo '],
			datasets : [
			{
				label: "Turnover",
				fillColor : "rgba(240,240,240,0)",
				strokeColor : "rgba(240,240,240,1)",
				pointColor : "rgba(240,240,240,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(240,240,240,1)",
				data : [
'; ?>

	<?php $_from = $this->_tpl_vars['canvas_real']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['real']):
?>				
		<?php echo $this->_tpl_vars['real']; ?>
,
	<?php endforeach; endif; unset($_from); ?>
<?php echo '
			]
			},
			{
				label: "Expected",
				fillColor : "rgba(29,155,138,0)",
				strokeColor : "rgba(29,155,138,1)",
				pointColor : "rgba(29,155,138,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(29,155,138,1)",
				data : [
		'; ?>

			<?php $_from = $this->_tpl_vars['canvas_expected']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['expected']):
?>				
				<?php echo $this->_tpl_vars['expected']; ?>
,
			<?php endforeach; endif; unset($_from); ?>
		<?php echo '		
				]
			}
			]

		}

		window.onload = function(){
			var ctx = document.getElementById("focuschart").getContext("2d");
			window.myLine = new Chart(ctx).Line(lineChartData, {
				responsive: true
			});
		}
		
		$("#cost_display").on(\'change\',function(){
			if($("#cost_display").is(\':checked\')){
			$(\'.cost_detail\').css("display","block");
			}
			else
			{
				$(\'.cost_detail\').css("display","none");
			}
		});
		
	$(document).on(\'change\',"#cost_display",function(){
		
		
		 if($("#cost_display").is(":checked") &&  $("#margin_display").prop("checked")==false){
			 $(\'th.missionhead\').attr("colspan","2");
			 $(\'.cost_detail\').show();
			
			}
			else if(($("#margin_display").is(":checked")) && ($("#cost_display").is(":checked")))
			{
				$(\'th.missionhead\').attr("colspan","3");
				$(\'.margin_detail\').show();
				$(\'.cost_detail\').show();
				
					}
			else{
				if($("#margin_display").is(":checked")){
						$(\'.cost_detail\').hide();
						$(\'th.missionhead\').attr("colspan","2");
					}else{
					$(\'.cost_detail\').hide();
					$(\'.margin_detail\').hide();
					$(\'th.missionhead\').attr("colspan","1");
						}
			
			}
		
		});
		
	$(document).on(\'change\',"#margin_display",function(){
		
	 if($("#margin_display").is(":checked") && $("#cost_display").prop("checked")==false)
	 {
			$(\'th.missionhead\').attr("colspan","2");
			 $(\'.margin_detail\').show();
			
			
	 }
	else if($("#margin_display").is(":checked") && $("#cost_display").is(":checked"))
	{
			
			$(\'.cost_detail\').show();
			$(\'.margin_detail\').show();
			$(\'th.missionhead\').attr("colspan","3");
			
			
			
	}
	else
	{
		if($("#cost_display").is(":checked"))
		{
			$(\'.margin_detail\').hide();
			$(\'th.missionhead\').attr("colspan","2");
		}
		else
		{
			$(\'.cost_detail\').hide();
			$(\'.margin_detail\').hide();
			$(\'th.missionhead\').attr("colspan","1");
		}
	}
		
	});
	
	$("#yearlist").chosen({allow_single_deselect:false,search_contains: true,disable_search: true});	  
	$("#all_sales").chosen({allow_single_deselect:true,search_contains: true});
	$("#product_type").chosen({allow_single_deselect:true,search_contains: true,disable_search: true});
	$("#product_name").chosen({allow_single_deselect:true,search_contains: true,disable_search: true});
	
	$(document).ready(function(){
		
		$(\'body\').on(\'hidden\', \'#contractmonthly\', function (){        
			$(this).removeData(\'modal\');				
			$(\'.modal-body\',this).html(\'<div style="text-align:center"><b>Please Wait Loading ...</b></div>\');		
			$("body").css("overflow", "auto");    
		});
		
	});
	
	</script>
'; ?>
