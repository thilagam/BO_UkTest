<?php /* Smarty version 2.6.19, created on 2016-04-12 13:50:35
         compiled from gebo/quotecontractmission/create-contract.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/quotecontractmission/create-contract.phtml', 81, false),array('modifier', 'zero_cut_t', 'gebo/quotecontractmission/create-contract.phtml', 213, false),array('modifier', 'count', 'gebo/quotecontractmission/create-contract.phtml', 250, false),array('function', 'html_options', 'gebo/quotecontractmission/create-contract.phtml', 311, false),)), $this); ?>
<?php echo '
<script src="/BO/theme/gebo/lib/tinymce_4.2.5/js/tinymce/tinymce.min.js"></script>
	<style>
	/*	#missionTable tr:nth-child(even)
		{
			background-color:#F5F5F5;
			border-bottom:1px solid #ddd;
			text-align:center;
			font-weight:bold;
		}
		.padd td
		{
			padding:15px 5px;
		}
		
		#missionTable tr:nth-child(odd)
		{
			text-align:center;
		}
	*/	
		#missionTable td
		{
			font-size: 13px;
		} 
		
		.xdsoft_today_button
		{
			display:none !important;
		}
				
				
		input[readonly]
		{
			background-color:#fff !important;
			border: 1px solid #ccc !important;
			box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset !important;
			cursor:initial !important;
		}
		
		.txterror
		{
			color: #b94a48;
			margin-top: 4px;
		}
	</style>
	<link href="/BO/theme/gebo/css/jquery.datetimepicker.css" rel="stylesheet">
	<script src="/BO/theme/gebo/js/jquery.datetimepicker.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
	<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script> 
	<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
	<script>
		var final_end_date ="";
		function changefield()
		{
			$(".splitvaltxt").toggleClass(\'hide\');
			$(".splitfield").toggleClass(\'hide\');
			if($(".splitfield").css(\'display\')=="none")
			$(".splitfield").attr(\'disabled\',true);
			else
			{
				$(".splitfield").each(function(){
					$(this).val(function() {
					return this.defaultValue;
				});
				});
				$(".splitfield").attr(\'disabled\',false);
			}
			return false;
		}
		
		var salesdtime = '; ?>
<?php echo $this->_tpl_vars['quotedetails']['final_mission_length']; ?>
<?php echo ';
		var salesdtimeo = '; ?>
"<?php echo $this->_tpl_vars['quotedetails']['final_mission_length_option']; ?>
"<?php echo ';
		var scurrency = '; ?>
"<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
"<?php echo ';
		var prod_extra_launch_days = '; ?>
"<?php echo $this->_tpl_vars['quotedetails']['prod_extra_launch_days']; ?>
"<?php echo ';
		var peinfo = '; ?>
"<?php echo $this->_tpl_vars['quotedetails']['prod_extra_info']; ?>
"<?php echo ';
		var turnover = '; ?>
<?php echo $this->_tpl_vars['quotedetails']['turnover']; ?>
<?php echo ';
		var exp_end_date = '; ?>
"<?php echo $this->_tpl_vars['quotedetails']['exp_end_date']; ?>
"<?php echo ';
		var signed_at = '; ?>
'<?php echo ((is_array($_tmp=$this->_tpl_vars['quotedetails']['signed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
'<?php echo ';
		var quote_id = '; ?>
"<?php echo $this->_tpl_vars['quotedetails']['identifier']; ?>
"<?php echo ';
		var setexpdate = peinfo;
		var enddate = "";
		var setdate = "";
		var mindate = '; ?>
'<?php echo ((is_array($_tmp=$this->_tpl_vars['quotedetails']['signed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
'<?php echo ';
		function removeDisabled(){	setTimeout(function(){$(".MultiFile-applied").removeAttr("disabled");}, 1000);	}
		$(document).ready(function(){
			$(\'.icheck\').iCheck({
				radioClass: \'iradio_square-blue\'
			}); 
		  $("#contractsource").chosen({  allow_single_deselect:false,disable_search: true });
		  $(".select").chosen({  allow_single_deselect:false,disable_search: true });
		  $(".paymenttype").chosen({  allow_single_deselect:false,disable_search: true });
		  $(".uni_style").uniform();
		  $("#qlinked").css(\'height\',$("#cprofile").height());
		  
		  jQuery(\'#sigdate\').datetimepicker({
		  format:\'d/m/Y\',
		  formatDate:\'d/m/Y\',
		  //minDate:mindate,
		  minDate:\'01/01/2014\',
		  timepicker:false,
		  closeOnDateSelect:true,
		  onSelectDate:function(ct,$i){
		  if(setexpdate==\'yes\')
		  {
			var newdate =$i.val();
			splitval = newdate.split(\'/\');
			reqdate = splitval[1]+"/"+splitval[0]+"/"+splitval[2];
			var startdate = new Date(Date.parse(reqdate));
			var expDate = startdate;
			expDate.setDate(startdate.getDate() + parseInt(prod_extra_launch_days));
			var month = expDate.getMonth()+1;
			if(month<10)
			month = \'0\'+month;
			var setdate = expDate.getDate()+"/"+month+"/"+expDate.getFullYear();
			loadsplitvalues(setdate);
			$("#launchdate").datetimepicker({ format:\'d/m/Y\',
			formatDate:\'d/m/Y\',
			//minDate:setdate,
			minDate:\'01/01/2014\',
		   timepicker:false
		  });
		   $("#launchdate").val(setdate);
		  }
		  }
		});
		  
		if(setexpdate==\'yes\')
		{
			var expmindate = '; ?>
"<?php echo ((is_array($_tmp=$this->_tpl_vars['quotedetails']['exp_end_stddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"<?php echo ';
		}
		else
		{
			var expmindate = mindate;
		}
		
		$("#launchdate").datetimepicker({ 
			format:\'d/m/Y\',
			formatDate:\'d/m/Y\',
			//minDate:expmindate,
			minDate:\'01/01/2014\',
		    timepicker:false,
		    closeOnDateSelect:true,
			onSelectDate:function(ct,$i){
			 loadsplitvalues($i.val());
			 }
		  });
		
		$("#enddate").datetimepicker({ 
			format:\'d/m/Y\',
			formatDate:\'d/m/Y\',
			minDate:expmindate,
		    timepicker:false,
		    closeOnDateSelect:true,
			onSelectDate:function(ct,$i){
			// loadsplitvalues($i.val());
			 var split_final_date = final_end_date.split("/");
			  var date1 = split_final_date[2]+"-"+split_final_date[1]+"-"+split_final_date[0];
			  var current_date = $i.val().split("/");
			  var date2 = current_date[2]+"-"+current_date[1]+"-"+current_date[0];
			  if(date2<date1)
				$("#enderror").show();
			  else
				$("#enderror").hide();
			 }
		  });
			
		  $("#enddate").blur(function(){
			  var split_final_date = final_end_date.split("/");
			  var date1 = split_final_date[2]+"-"+split_final_date[1]+"-"+split_final_date[0];
			  var current_date = $(this).val().split("/");
			  var date2 = current_date[2]+"-"+current_date[1]+"-"+current_date[0];
			  if(date2<date1)
				$("#enderror").show();
			  else
				$("#enderror").hide();
		  })
		  
		})
	</script>
	
'; ?>

<form class="form-horizontal" action="/contractmission/save-contract" name="createContract" id="createcontract" method="POST" enctype='multipart/form-data'>
<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">
			New Purchase Order
		</h3>
		<!-- <h4><?php echo $this->_tpl_vars['quote_res']['title']; ?>
</h4> -->
	</div>	
</div>
<div class="row-fluid">
	<div class="span4">
		<div class="w-box">
			<div class="w-box-header">
				Client Profile
			</div>
			 <div class="w-box-content cnt_a" id="cprofile">
				<div class="row-fluid">
				<?php if ($this->_tpl_vars['client_info'] != 'no'): ?>
					<div class="pull-left">
						<img title="<?php echo $this->_tpl_vars['client_info']['company_name']; ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/clients/logos/<?php echo $this->_tpl_vars['client_info']['user_id']; ?>
/<?php echo $this->_tpl_vars['client_info']['user_id']; ?>
_global.png?12345" alt="<?php echo $this->_tpl_vars['client_info']['company_name']; ?>
" >
					</div>
					<div class="span8">
						<div><a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['client_info']['identifier']; ?>
&submenuId=ML13-SL1" target="_blank"><?php echo $this->_tpl_vars['client_info']['company_name']; ?>
</a></div>
						<div><?php echo $this->_tpl_vars['client_info']['initial']; ?>
 <?php echo $this->_tpl_vars['client_info']['first_name']; ?>
 <?php echo $this->_tpl_vars['client_info']['last_name']; ?>
</div>
						<?php if ($this->_tpl_vars['client_info']['client_code']): ?>
						<div>Client code: <?php echo $this->_tpl_vars['client_info']['client_code']; ?>
</div>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['client_info']['ca_number']): ?>
						<div>Turnover: <?php echo ((is_array($_tmp=$this->_tpl_vars['client_info']['ca_number'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</div>
						<?php endif; ?>
						<div>Category: <?php echo $this->_tpl_vars['quotedetails']['category_name']; ?>
</div> 
					</div>	
				<?php else: ?>
					<?php echo $this->_tpl_vars['client_info']; ?>

				<?php endif; ?>
				</div>
			 </div>
		</div>
	</div>
	<div class="span4">
		<div class="w-box">
			<div class="w-box-header">
				From Signed Quote
			</div>
			 <div class="w-box-content cnt_a" id="qlinked">
				<div class="row-fluid">
					<div class="span12">                        				
						<?php if ($this->_tpl_vars['quotedetails']['is_new_quote'] == '1'): ?>
							<a href="/quote-new/sales-final-validation?qaction=briefing&quote_id=<?php echo $_GET['quote_id']; ?>
" target="_blank"><b><?php echo $this->_tpl_vars['quotedetails']['title']; ?>
</b></a>
						<?php else: ?>
							<a href="/quote/quote-followup?quote_id=<?php echo $_GET['quote_id']; ?>
}&submenuId=ML13-SL2" target="_blank"><b><?php echo $this->_tpl_vars['quotedetails']['title']; ?>
</b></a>
						<?php endif; ?>
                    </div>
				</div>
			 </div>
		</div>
	</div>
	<div class="span4">
		<div class="w-box">
			<div class="w-box-header">
				Contacts (<a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['client_info']['identifier']; ?>
&submenuId=ML13-SL1" target="_blank">Update</a>)
			</div>
			 <div class="w-box-content cnt_a" id="qlinked">

                 <div style="overflow: auto; max-height: 80px; overflow-x: hidden;">
                     <?php if (count($this->_tpl_vars['clientContacts']) > 0): ?>
						 <?php $_from = $this->_tpl_vars['clientContacts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['clientContacts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['clientContacts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['clientContact']):
        $this->_foreach['clientContacts']['iteration']++;
?>
							 <div class="media">
								<div class="span2">	
									<input type="radio" style="margin-top:50%;position:relative" class="icheck validate[required]" <?php if ($this->_tpl_vars['clientContact']['main_contact'] == 'yes'): ?> checked<?php endif; ?> name="contact_client"  value="<?php echo $this->_tpl_vars['clientContact']['identifier']; ?>
">
								</div>
								 <div class="media-body">						
									 <p><strong><?php echo $this->_tpl_vars['clientContact']['first_name']; ?>
</strong><br />
										 <?php echo $this->_tpl_vars['clientContact']['job_title']; ?>
<br />
										<?php if ($this->_tpl_vars['clientContact']['office_phone']): ?><?php echo $this->_tpl_vars['clientContact']['office_phone']; ?>
<br /><?php endif; ?>
										<?php if ($this->_tpl_vars['clientContact']['email']): ?><a href="mailto:<?php echo $this->_tpl_vars['clientContact']['email']; ?>
"><?php echo $this->_tpl_vars['clientContact']['email']; ?>
</a><?php endif; ?>
									 </p>
								 </div>
							 </div>
							 <hr>
						 <?php endforeach; endif; unset($_from); ?>
                     <?php else: ?>
						<strong>No Contacts Available</strong>
                     <?php endif; ?>
                 </div>
			 </div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="w-box">
			<div class="w-box-header">
                PO & Mission Launch Information
							</div>
			 <div class="w-box-content cnt_a">
				<div class="control-group">
					<label class="control-label">PO Name</label>
					<div class="controls">
						<input type="text" name="contract_name" class="span4 validate[required]" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">PO Status</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" checked value="New" class="status uni_style" id="optionsRadios1" name="status"  />
							New
						</label>
						<label class="radio inline">
							<input type="radio" value="Renew" id="optionsRadios2" class="status uni_style" name="status" />
							Renew
						</label>
					</div>
				</div>
				<div class="control-group">
                     <label class="control-label">Signed PO</label>
                     <div class="controls">
                         <input type="checkbox" id="signed_PO" name="signed_PO" <?php if ($this->_tpl_vars['contractDetials']['signed_PO'] == 'yes'): ?>checked="checked"<?php endif; ?>/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">PO Source</label>
					<div class="controls">
						<div class="span6">
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['csarray'],'name' => 'contractsource','class' => "validate[required]",'id' => 'contractsource'), $this);?>
 
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div class="span10">
							<div id="showepfiles" style="display:none">
								<a href="/BO/dowload-source-contract.php?filename=CGV-Edit-Place-2016-JAN-16.pdf">CGV EditPlace 2016</a>
								<br/>
								<a href="/quote/download-quote-xls?quote_id=<?php echo $this->_tpl_vars['quotedetails']['identifier']; ?>
">Quote XLS</a>
							</div>
							<input type="file" name="mulitupload[]" class="multi validate[required]" />
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Signature Date</label>
					<div class="controls">
						<input class="validate[required]" id="sigdate" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quotedetails']['signed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" name="signature_date" type="text" readonly="readonly" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Expected Launch Date</label>
					<div class="controls">
					<?php if ($this->_tpl_vars['quotedetails']['exp_end_date']): ?>
						<input class="validate[required]" id="launchdate" value='<?php echo ((is_array($_tmp=$this->_tpl_vars['quotedetails']['exp_end_stddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
' name="expected_launch_date" type="text" readonly="readonly" />
					<?php else: ?>
							<input class="validate[required]" name="expected_launch_date" id="launchdate" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quotedetails']['signed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" type="text" readonly="readonly" />
					<?php endif; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Expected End Date</label>
					<div class="controls">
						<input class="validate[required]" name="expected_end_date" id="enddate" type="text" />
						<div id="enderror" class="hide txterror">Lesser than calculated date</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Contract overview</label>
					<div class="controls">
						<textarea name="comment" id="txtarea_sp" class="span6" rows="8" placeholder="Please describe the context of the contract + invoicing specifities if needed (Upfront payment..) 
						"></textarea>		
						<span class="help-block">
							Please describe the context of the contract + invoicing specifities if needed (Upfront payment..) 
						</span>
                     </div>
                 </div>
			</div>	
		</div>	
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="w-box">
			<div class="w-box-header">
				Turnover & Payment
			</div>
			 <div class="w-box-content cnt_a">
				<div class="row-fluid">
					<div class="span8">	
						<div class="control-group">
							<label class="control-label">Total turnover</label>
							<div class="controls">
							<div class="span4">
								<input type="text" name="turnover" readonly class="span12" value="<?php echo $this->_tpl_vars['quotedetails']['turnover']; ?>
 &<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
;" />
							</div>
							<div class="span4">
								<label class="checkbox inline">
									<input type="checkbox" name="indicative_turnover" id="indicative_turnover" value="yes">Indicative Turnover
								</label>
							</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Minimum turnover</label>
							<div class="controls">
							<div class="span4">
								<div id="normal-toggle-button">
                                    <input type="checkbox" value="1" name="mini_turn">
                                </div>
							</div>
							<div class="span4 hide" id="minimum_turnover">
								<input type="text" name="minimum_turnover" id="" class="span11 validate[required,custom[number],max[<?php echo $this->_tpl_vars['quotedetails']['turnover']; ?>
]]" value="" />&nbsp;&<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
;
							</div>
							</div>
						</div>
						<div class="control-group">
						<label class="control-label">Type of Payment</label>
						<div class="controls">
							<div class="span6">
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['typeofpayment'],'selected' => $this->_tpl_vars['client_info']['payment_type'],'name' => 'paymenttype','class' => 'paymenttype'), $this);?>
 
							</div>
						</div>
						</div>
					</div>
					<!-- <div class="pull-right">
						<div class="well span12 pull-center" style="padding-top:10px">
							<i class="icon-time"></i>
							<div>Expected End Date</div>
							<div style="font-weight:bold;text-align:center" id="repldate"></div>
						</div>
					</div> -->
					<div class="clearfix"></div>
					<div class="w-box">
						<div class="w-box-header displaysplit" style="display:none">
							Split per month
													</div>
						<div class="replace">
						
						</div>
					</div>
				</div>
			 </div>
		</div>
	</div>
</div>
<?php if (count($this->_tpl_vars['missiondetails']) > 0): ?>
<div class="row-fluid">
	<div class="span12">
		<div class="w-box">
			<div class="w-box-header">
				Type of invoice
			</div>
			<div class="w-box-content cnt_a">
				<div class="row-fluid">
					<div class="span12">
						<table width="" class="table table-striped table-bordered" id="missionTable">
							<tr>
								<th>Mission</th>
								<th>Type</th>
								<th>Language</th>
								<th>Words</th>
								<th>Price/art</th>
								<th>Volume</th>
								<th>Tempo</th>
								<th>Invoice per</th>
								<th>Turnover</th>
								<th>History Quote BO</th>
								<th>History Quote FO</th>
							</tr>
						<?php $_from = $this->_tpl_vars['missiondetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['missionDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['missionDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['missionDetails']['iteration']++;
?>		
							<tr class="">
								<td><?php echo $this->_tpl_vars['mission']['product_type_converted']; ?>
</td>
								<td><?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 <?php echo $this->_tpl_vars['mission']['product_type_other']; ?>
</td>
								<td>
									<?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?><?php echo $this->_tpl_vars['mission']['language_source_converted']; ?>
&nbsp;>&nbsp;<?php echo $this->_tpl_vars['mission']['language_dest_converted']; ?>
<?php else: ?><?php echo $this->_tpl_vars['mission']['language_source_converted']; ?>

									<?php endif; ?>
								</td>
								<td><?php echo $this->_tpl_vars['mission']['nb_words']; ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
&nbsp;&<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
;</td>
								<td><?php echo $this->_tpl_vars['mission']['volume']; ?>
</td>
								<td>
								<?php if ($this->_tpl_vars['mission']['oneshot'] == 'yes'): ?> 
									One shot 
								<?php elseif ($this->_tpl_vars['mission']['oneshot'] == 'no'): ?> 
								<?php $this->assign('_tempo_value', $this->_tpl_vars['mission']['tempo']); ?>
								<?php $this->assign('_delivery_volume_option', $this->_tpl_vars['mission']['delivery_volume_option']); ?>
								<?php $this->assign('_tempo_length_option', $this->_tpl_vars['mission']['tempo_length_option']); ?>
									<span class="version-change pop_over" data-placement="top" data-original-title="Recurring" data-content="<?php echo $this->_tpl_vars['mission']['volume_max']; ?>
 ( <?php echo $this->_tpl_vars['tempo_array'][$this->_tpl_vars['_tempo_value']]; ?>
) articles <?php echo $this->_tpl_vars['volume_option_array'][$this->_tpl_vars['_delivery_volume_option']]; ?>
  <?php echo $this->_tpl_vars['mission']['tempo_length']; ?>
  <?php echo $this->_tpl_vars['tempo_duration_array'][$this->_tpl_vars['_tempo_length_option']]; ?>
" data-html="true">Recurring</span> 
								<?php else: ?>
									-
								<?php endif; ?>
								</td>
								<td>
									<select name="invoice_per[<?php echo $this->_tpl_vars['mission']['identifier']; ?>
]" class="select span10" style="width:90px">
										<option value='month' <?php if ($this->_tpl_vars['mission']['invoice_per'] == 'month'): ?> selected="selected"<?php endif; ?>>Month</option>
										<option value='mission' <?php if ($this->_tpl_vars['mission']['invoice_per'] == 'mission'): ?> selected='selected' <?php endif; ?>>Mission</option>
										<option value='delivery' <?php if ($this->_tpl_vars['mission']['invoice_per'] == 'delivery'): ?> selected='selected'<?php endif; ?>>Delivery</option>
									</select>
								</td>
								<td>
                                    <?php if ($this->_tpl_vars['mission']['free_mission'] == 'yes'): ?>Free<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
&nbsp;&<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
;<?php endif; ?>
                                    <br />
                                    <label class="checkbox inline">
                                        <input type='checkbox' class="indicative" name="inductive[<?php echo $this->_tpl_vars['mission']['identifier']; ?>
]" <?php if ($this->_tpl_vars['mission']['indicative_turnover']): ?>checked='checked'<?php endif; ?> value='1'/>
                                        Indicative
                                    </label>
                                    <input type='hidden' name="missiontable[<?php echo $this->_tpl_vars['mission']['identifier']; ?>
]" value='qm'/>

                                </td>
								<td>
									<input type='checkbox' class="indicative" name="history_bo[<?php echo $this->_tpl_vars['mission']['identifier']; ?>
]" <?php if ($this->_tpl_vars['mission']['history_bo'] == 'yes'): ?>checked='checked'<?php endif; ?> value='yes'/>								
								</td>
								<td>
									<input type='checkbox' class="indicative" name="history_fo[<?php echo $this->_tpl_vars['mission']['identifier']; ?>
]" <?php if ($this->_tpl_vars['mission']['history_fo'] == 'yes'): ?>checked='checked'<?php endif; ?> value='yes'/>								
								</td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<input type="hidden" name="quote_id" value="<?php echo $_GET['quote_id']; ?>
" />
<input type="hidden" name="activetab" value="validate" />
<div class="row-fluid topset2">
	<div class="span12 pull-center">
		<div> You're about to request a legal and financial Validation </div>
		<button class="btn btn-primary topset2" onclick="return removeDisabled()" type="submit">Submit</button>
	</div>
</div>
</div>
</form>

<!-- View Info -->
<div class="modal container hide fade" style="top:0%" id="view_info">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Info</h3>		
    </div>
    <div class="modal-body" style="min-height:480px">
		<button type="button" name="" class="btn btn-primary pull-right" data-toggle="modal" role="button" data-target="#edit_info">Edit(If superadmin)</button>
		<h2>Heading of Info</h2>
		<br/>
		<p style="font-size:15px">Brief Description of the info</p>
	</div>
	 <div class="modal-footer"></div>
</div>

<!-- Edit Info -->
<div class="modal container hide fade" style="top:0%" id="edit_info">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Edit Info</h3>		
    </div>
    <div class="modal-body" style="min-height:480px">
		<form class="form-horizontal" action="" id="" method="POST">
			<div class="media mission-comment">
				<div class="control-group">
					<label class="control-label">Info Heading<span class="f_req">*</span></label>
					<div class="controls">
						<input type="text" name="title" class="span9 validate[required]" value="" />
					</div>
				</div>
			</div>
			<div class="media mission-comment">
				<div class="control-group">
					<label class="control-label">Description<span class="f_req">*</span></label>
					<div class="controls">
						<div class="media-body">
							<textarea name="comment" class="span9 validate[required]"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="control-group">
					<div class="controls topset2 pull-center" style="margin-left:0">
						<button  class="btn" data-dismiss="modal" type="reset">Cancel</button>
						<button class="btn btn-primary" type="submit">Done</button>
					</div>
			</div>
		</form>
	</div>
	 <div class="modal-footer"></div>
</div>

<?php echo '
  <script src="/BO/theme/gebo/lib/toggle_buttons/jquery.toggle.buttons.js"></script>
	<script>
		peinfo = "no";
		$("#contractsource").change(function(){
			if($(this).val()=="Edit Place")
				$("#showepfiles").css("display","block");
			else
				$("#showepfiles").css("display","none");
		});
			
		
		function loadsplitvalues(date)
		{
				$.ajax({
				url:\'/contractmission/get-split-month\',
				type:\'POST\',
				data:{\'quote_id\':quote_id,\'expected_launch_date\':date,\'turnover\':turnover,\'salesdtime\':salesdtime,\'salesdtimeo\':salesdtimeo,"scurrency":scurrency,\'pdays\':prod_extra_launch_days,\'peinfo\':peinfo},
				beforeSend:function()
				{
					$(".displaysplit").css("display","block");
					$(".replace").html("<b style=\'text-align:center\'>Please Wait Loading...</b>");
				},
				success:function(html){
					$(".replace").html(html);
					//$("#repldate").text($("#explaunchdate").val());
					final_end_date = $("#explaunchdate").val();
					if($("#enddate").val()=="")
					$("#enddate").val(final_end_date);
					/* $("#enddate").datetimepicker({ 
						format:\'d/m/Y\',
						formatDate:\'d/m/Y\',
						minDate:setdate
					});
					$("#enddate").val(setdate); */
				}
			});
		}

		if(setexpdate==\'yes\')
		{
			/*$("#expdate").datepicker({startDate:'; ?>
"<?php echo ((is_array($_tmp=$this->_tpl_vars['quotedetails']['exp_end_stddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"<?php echo '}).on("changeDate",function(e){
				var date = $(this).data(\'date\');
				loadsplitvalues(date);
				
			/*});*/
		
		}
		else
		{
			/* $("#expdate").datepicker({format: \'dd/mm/yyyy\',startDate:'; ?>
"<?php echo ((is_array($_tmp=$this->_tpl_vars['quotedetails']['signed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"<?php echo '}).on("changeDate",function(e){
				var date = $(this).data(\'date\');
				loadsplitvalues(date);
			}); */
		}
		
		/* $(".expenddate").datepicker({format: \'dd/mm/yyyy\'}).on("changeDate",function(e){
				/* var date = $(this).data(\'date\');
				loadsplitvalues(date); 
		}); */
			
		/* $("#sigdate").datepicker({format: \'dd/mm/yyyy\',startDate:'; ?>
"<?php echo ((is_array($_tmp=$this->_tpl_vars['quotedetails']['signed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"<?php echo '}).on("changeDate",function(e){
			
			if(setexpdate==\'yes\')
			{
				var newdate = $(this).data(\'date\');
				splitval = newdate.split(\'/\');
				reqdate = splitval[1]+"/"+splitval[0]+"/"+splitval[2];
				var startdate = new Date(Date.parse(reqdate));
				var expDate = startdate;
				expDate.setDate(startdate.getDate() + parseInt(prod_extra_launch_days));
				var month = expDate.getMonth()+1;
				if(month<10)
				month = \'0\'+month;
				var setdate = expDate.getDate()+"/"+month+"/"+expDate.getFullYear();
				$(\'#expdate\').datepicker(\'setStartDate\',setdate);
				loadsplitvalues(setdate);
				//$(\'#expdate\').datepicker("setValue", new Date(2015,9,03));
				$("#launchdate").val(setdate);
			}
			else
			$(\'#expdate\').datepicker(\'setStartDate\',$(this).data(\'date\'));
		});
		*/
		
		$(document).ready(function(){
			$("#createcontract").validationEngine({prettySelect : true,useSuffix: "_chzn"});
			if(exp_end_date)
			{
			loadsplitvalues(exp_end_date);
			//alert($(\'#expdate\').val())
			//$(\'#expdate\').datepicker(\'setStartDate\',$(\'#expdate\').data(\'date\'));
			//$(\'#expdate\').datepicker(\'setDate\',new Date(2015,02,14));
			}
			else
				loadsplitvalues(signed_at);
			$(\'#normal-toggle-button\').toggleButtons(
			{
			label:{enabled: "Yes",disabled: "No"},
			onChange: function () {
				if($("input[name=\'mini_turn\']:checked").val()=="1")
					$("#minimum_turnover").show();
				else
					$("#minimum_turnover").hide();		
			}
			});
			
			$("#indicative_turnover").click(function(){
				if($("#indicative_turnover:checked").length)
				$(".indicative").addClass(\'validate[minCheckbox[1]]\');
				else
				$(".indicative").removeClass(\'validate[minCheckbox[1]]\');
			});

            /*tinymce initialization*/
			tinymce.init({
				selector: "#txtarea_sp",
				setup : function(ed)
				{
					ed.on(\'init\', function() 
					{
						this.getDoc().body.style.fontSize = \'14px\';
						this.getDoc().body.style.fontFamily = \'arial\';
					});
				},
				theme: "modern",
				statusbar:false,
				menubar: false,
				plugins: [
					 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					 "save table contextmenu directionality emoticons template paste textcolor"
			   ],
			   content_css: "css/content.css",
			   toolbar: "bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link emoticons", 
			   style_formats: [
					{title: \'Bold text\', inline: \'b\'},
					{title: \'Red text\', inline: \'span\', styles: {color: \'#ff0000\'}},
					{title: \'Red header\', block: \'h1\', styles: {color: \'#ff0000\'}},
					{title: \'Example 1\', inline: \'span\', classes: \'example1\'},
					{title: \'Example 2\', inline: \'span\', classes: \'example2\'},
					{title: \'Table styles\'},
					{title: \'Table row 1\', selector: \'tr\', classes: \'tablerow1\'}
				]
			});
		})
			
	</script>
'; ?>