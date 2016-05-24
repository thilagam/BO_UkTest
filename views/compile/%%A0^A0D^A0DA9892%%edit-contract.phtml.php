<?php /* Smarty version 2.6.19, created on 2016-03-28 15:47:03
         compiled from gebo/quotecontractmission/edit-contract.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/quotecontractmission/edit-contract.phtml', 175, false),array('modifier', 'zero_cut_t', 'gebo/quotecontractmission/edit-contract.phtml', 291, false),array('modifier', 'count', 'gebo/quotecontractmission/edit-contract.phtml', 349, false),array('function', 'html_options', 'gebo/quotecontractmission/edit-contract.phtml', 409, false),array('function', 'math', 'gebo/quotecontractmission/edit-contract.phtml', 809, false),)), $this); ?>
<?php echo '
<script src="/BO/theme/gebo/lib/tinymce_4.2.5/js/tinymce/tinymce.min.js"></script>
<link href="/BO/theme/gebo/css/mission-followup.css" rel="stylesheet" />
<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script>
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
		} */
		
		
	.turnover {
		background: #666666 none repeat scroll 0 0;
		color: white;
		font-size: 25px;
		font-weight: bold;
		padding: 20px;
	}
	.turnover-more {
		background: #009e0f none repeat scroll 0 0;
		color: white;
		padding: 0px 8px;
		margin: 0 0 0 5px;
		float:left;
	}
		#missionTable td
		{
			font-size:13px;
		}
		
		.w-box-content.cnt_a
		{
			min-height: 0px;
		}
		
		#invoices i
		{
			margin-right:5px;
		}
		
		#invoices td
		{
			font-size:13px;
		}
		
		.cursor
		{
			cursor:pointer;
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
	<link href="/BO/theme/gebo/lib/iCheck/skins/line/blue.css" rel="stylesheet">
	<link rel="stylesheet" href="/BO/theme/gebo/lib/x-editable/bootstrap-editable/css/bootstrap-editable.css">
	<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script> 
	<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
	<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
	<script src="/BO/theme/gebo/lib/x-editable/bootstrap-editable/js/bootstrap-editable.min.js" type="text/javascript" charset="utf-8"></script>
	<script>
		var final_end_date = "";
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
		
		 function checkExtension(field, rules, i, options)
		 {
			 var file = field.val();
			 var file = field.val();
			 var exts = [\'xls\',\'xlsx\'];
			 if(file) 
			 {
				var get_ext = file.split(\'.\');
				get_ext = get_ext.reverse();
				if ($.inArray(get_ext[0].toLowerCase(),exts) > -1 ){
				
				} else {
				  return "Upload only xls or xlsx file";
				}
			 }
		 }
	
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
		  $("#editcname").click(function(e){
			e.stopPropagation();
			$(\'#contractname\').editable(\'toggle\');
		 })
		 
		 $("#marktreated").click(function(){
			var ids = $(".invoiceids:checked").map(function()
            {
				$(this).closest("tr").find(".treated").html("<i class=\'splashy-check\'></i>");
                return $(this).val();
            }).get();
			if($.trim(ids))
			{
			$.post(\'/contractmission/mark-treated\',{\'ids\':ids},function(data){});
			}
		 })
		 
		 $("#markuntreated").click(function(){
			var ids = $(".invoiceids:checked").map(function()
            {
				$(this).closest("tr").find(".treated").html("-");
                return $(this).val();
            }).get();
			if($.trim(ids))
			{
				$.post(\'/contractmission/mark-untreated\',{\'ids\':ids},function(data){});
			}
		 })
		 
		 /* start of Datepickers */
		 
		  jQuery(\'#sigdate\').datetimepicker({
			  format:\'d/m/Y\',
			  formatDate:\'d/m/Y\',
			  //minDate:'; ?>
'<?php echo ((is_array($_tmp=$this->_tpl_vars['quotedetails']['signed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
'<?php echo ',
			  minDate:\'01/01/2014\',
			  timepicker:false,
			  closeOnDateSelect:true
		  });
		 
		 jQuery(\'#launchdate\').datetimepicker({
			  format:\'d/m/Y\',
			  formatDate:\'d/m/Y\',
			  timepicker:false,
			  //minDate:$("#sigdate").val(),
			  minDate:\'01/01/2014\',
			  closeOnDateSelect:true,
			  onSelectDate:function(ct,$i){
				if($i.val() == edate)
				cid = contract_id;
				else
				cid = "";
			    loadsplitvalues($i.val(),cid,true);
			 }
		  });
			
		  $("#enddate").datetimepicker({ 
			format:\'d/m/Y\',
			formatDate:\'d/m/Y\',
		    timepicker:false,
			//mindate:$("#enddate").val(),
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
		 /* End of Datepickers */
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
		 
		});
    </script>
'; ?>

<form class="form-horizontal" action="/contractmission/save-contract" name="createContract" id="createcontract" method="POST" enctype='multipart/form-data'>
<div class="row-fluid">
	<div class="followup-header">
	<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
		<h1 class="heading" id=""><i style="margin:5px;cursor:pointer" id="editcname" class="splashy-pencil"></i><a data-original-title="" data-placeholder="Required" data-placement="right" data-pk="<?php echo $_GET['contract_id']; ?>
" data-type="text" style="margin-right:5px" id="contractname" href="#"><?php echo $this->_tpl_vars['contractDetials']['contractname']; ?>
</a><span class="headerdim"><?php echo ((is_array($_tmp=$this->_tpl_vars['contractDetials']['expected_launch_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['contractDetials']['expected_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
</span></h1>
	<?php else: ?>
		<h1 class="heading" id=""><?php echo $this->_tpl_vars['contractDetials']['contractname']; ?>

		<span class="headerdim"><?php echo ((is_array($_tmp=$this->_tpl_vars['contractDetials']['expected_launch_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['contractDetials']['expected_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
</span></h1>
	<?php endif; ?>
		<div class="row-fluid">    
			<div class="header-info">
				<div class="span3" style="padding-top:20px">
					<div class="span10" style="padding:0">
					<div class="sepH_b progress progress-success">
						<div class="bar" style="width: 0%"></div> 
					</div>
					</div>
					<div>&nbsp;&nbsp;<strong>0%</strong></div>
				</div>
				<div class="span3" style="padding-left:0">
					<span class="upper">Status</span>
					<span class="bottom"><?php if ($this->_tpl_vars['contractDetials']['status'] == 'sales'): ?>Pending<?php elseif ($this->_tpl_vars['contractDetials']['status'] == 'validated'): ?>Validated<?php endif; ?></span>
				</div>
				<div class="span3">
					<span class="upper">Production Cost</span>
					<span class="bottom">-</span>
				</div>
				<div class="span3">
					<span class="upper">Turnover</span>
					<span class="bottom"><?php echo ((is_array($_tmp=$this->_tpl_vars['contractDetials']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
;</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span3">

<h4><i class="icon-user"></i> Client Profile</h4>
<div class="media">
			
				<?php if ($this->_tpl_vars['client_info'] != 'no'): ?>
					<a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['client_info']['identifier']; ?>
&submenuId=ML13-SL1" target="_blank" class="pull-left">
						<img class="media-object" title="<?php echo $this->_tpl_vars['client_info']['company_name']; ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/clients/logos/<?php echo $this->_tpl_vars['client_info']['user_id']; ?>
/<?php echo $this->_tpl_vars['client_info']['user_id']; ?>
_global.png?12345" alt="<?php echo $this->_tpl_vars['client_info']['company_name']; ?>
" >
					</a>
					<div class="media-body">			
						<h4><a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['client_info']['identifier']; ?>
&submenuId=ML13-SL1" target="_blank"><?php echo $this->_tpl_vars['client_info']['company_name']; ?>
</a></h4>
						<ul class="unstyled">
						<li><?php echo $this->_tpl_vars['client_info']['initial']; ?>
 <?php echo $this->_tpl_vars['client_info']['first_name']; ?>
 <?php echo $this->_tpl_vars['client_info']['last_name']; ?>
</li>
						<?php if ($this->_tpl_vars['client_info']['client_code']): ?>
						<li>Client code: <?php echo $this->_tpl_vars['client_info']['client_code']; ?>
</li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['client_info']['ca_number']): ?>
						<li>Turnover: <?php echo ((is_array($_tmp=$this->_tpl_vars['client_info']['ca_number'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</li>
						<?php endif; ?>
						<!--li>Category: <?php echo $this->_tpl_vars['quotedetails']['category_name']; ?>
</li--> 
					</ul>	
					</div>
				<?php else: ?>
				<div class="media-body">
					<?php echo $this->_tpl_vars['client_info']; ?>

					</div>
				<?php endif; ?>
		 
			 
		</div>	
	</div>
	
	<div class="span3">
	<h4><i class=" icon-info-sign"></i> From the Quote</h4>
		<p>
			<br>
			<?php if ($this->_tpl_vars['quotedetails']['is_new_quote'] == '1'): ?>
				<a href="/quote-new/sales-final-validation?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['quotedetails']['identifier']; ?>
" target="_blank"><b><?php echo $this->_tpl_vars['quotedetails']['title']; ?>
</b></a>
			<?php else: ?>
				<a href="/quote/quote-followup?quote_id=<?php echo $this->_tpl_vars['quotedetails']['identifier']; ?>
&submenuId=ML13-SL2" target="_blank"><b><?php echo $this->_tpl_vars['quotedetails']['title']; ?>
</b></a>
			<?php endif; ?>	
		</p>
	</div>
	
	<div class="span2">
	<h4>Sales</h4>
		<a href="mailto:<?php echo $this->_tpl_vars['contractDetials']['mailto']; ?>
" class="hint--left" data-hint="<?php echo $this->_tpl_vars['contractDetials']['sales_owner']; ?>
"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['contractDetials']['sales_creator_id']; ?>
/logo.jpg" class="image rd_30" width="50" height="50"></a>
	</div>
    <div class="span4">
        <h4>Contacts (<a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['client_info']['identifier']; ?>
&submenuId=ML13-SL1" target="_blank">Update</a>)</h4>
        <div style="overflow: auto; max-height: 80px; margin-top: 10px;overflow-x: hidden;">
            <?php if (count($this->_tpl_vars['clientContacts']) > 0): ?>
				<?php $_from = $this->_tpl_vars['clientContacts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['clientContacts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['clientContacts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['clientContact']):
        $this->_foreach['clientContacts']['iteration']++;
?>
				 <div class="media" id="<?php echo $this->_tpl_vars['clientContact']['identifier']; ?>
">
					<div class="span2">	
						<input type="radio" style="margin-top:50%;position:relative" class="icheck validate[required]" <?php if ($this->_tpl_vars['contractDetials']['contact_client'] == $this->_tpl_vars['clientContact']['identifier']): ?> checked<?php endif; ?> name="contact_client"  value="<?php echo $this->_tpl_vars['clientContact']['identifier']; ?>
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


<div class="row-fluid">	

			 <div class="well wbg well-large clearfix">
			 <h3>PO & Mission Launch Information</h3><hr>
			 <div class="span7">
			 
								<div class="control-group">
					<label class="control-label">PO Status</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" class="uni_style" <?php if ($this->_tpl_vars['contractDetials']['contractstatus'] == 'New'): ?>checked="checked"<?php endif; ?> value="New" id="optionsRadios1" name="status" />
							New
						</label>
						<label class="radio inline">
							<input type="radio" class="uni_style" value="Renew" <?php if ($this->_tpl_vars['contractDetials']['contractstatus'] == 'Renew'): ?>checked="checked"<?php endif; ?> id="optionsRadios2" name="status" />
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
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['csarray'],'name' => 'contractsource','selected' => $this->_tpl_vars['contractDetials']['sourceofcontract'],'class' => "validate[required]",'id' => 'contractsource'), $this);?>
 
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div class="span10">
						<h4>PO,Editorial & technical documents</h4><br>
							<input type="file" name="mulitupload[]" class="multi" />
						</div>
					</div>
				</div>
				<div>
					<div class="onsuccessrep">
							<?php echo $this->_tpl_vars['related_files']; ?>

					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Signature Date</label>
					<div class="controls">
							<input class="validate[required]" id="sigdate" value='<?php echo ((is_array($_tmp=$this->_tpl_vars['contractDetials']['signaturedate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
' name="signature_date" type="text" readonly="readonly" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Expected Launch Date</label>
					<div class="controls">
						<!-- <div class="input-append date" id="expdate" data-date-format="dd/mm/yyyy" data-date='<?php echo ((is_array($_tmp=$this->_tpl_vars['contractDetials']['expected_launch_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
'> -->
							<input class="validate[required]" id="launchdate" value='<?php echo ((is_array($_tmp=$this->_tpl_vars['contractDetials']['expected_launch_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
' name="expected_launch_date" type="text" readonly="readonly" />
						<!-- </div> -->
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Expected End Date</label>
					<div class="controls">
						<input class="validate[required]" name="expected_end_date" value='<?php echo ((is_array($_tmp=$this->_tpl_vars['contractDetials']['expected_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
' id="enddate" type="text" />
						<div id="enderror" class="hide txterror">Lesser than calculated date</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Contract overview</label>
					<div class="controls">
						<textarea name="comment" id="txtarea_sp" class="span12" rows="8" placeholder="Please describe the context of the contract + invoicing specifities if needed (Upfront payment..) 
"><?php echo $this->_tpl_vars['contractDetials']['comment']; ?>
</textarea>
						<span class="help-block">
							Please describe the context of the contract + invoicing specifities if needed (Upfront payment..) 
						</span>
                    </div>
				</div>

								<?php if ($this->_tpl_vars['quotedetails']['prod_extra_info'] == 'yes' && ( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'facturation' ) && $this->_tpl_vars['contractDetials']['status'] == 'validated'): ?>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<a href="" data-toggle="modal" role="button" data-target="#new_sales" id="" class=""><i class="icon-hand-right"></i> Cr&eacute;er new sales mission</a>
					</div>
				</div>
				<?php endif; ?>
				
				</div>
				
				<div class="span3 offset1">
				<div class="well" id="showepfiles" <?php if ($this->_tpl_vars['contractDetials']['sourceofcontract'] == 'Edit Place'): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
				<h4 class="heading">Related documents</h4>
								<a href="/BO/dowload-source-contract.php?filename=CGV-Edit-Place-2016-JAN-16.pdf"><i class="icon-download"></i> CGV EditPlace 2016</a>
								<hr>
								<a href="/quote/download-quote-xls?quote_id=<?php echo $this->_tpl_vars['quotedetails']['identifier']; ?>
"><i class="icon-download"></i> Quote XLS</a>
							</div>
				</div>	
	</div>

</div>

<div class="row-fluid">
	<div class="span12">
		
				
			
			 <div class="well wbg well-large">
				<div class="row-fluid">
				<h3>
					Turnover & Payment
								</h3><hr>
				<div class="span3 offset1">	
				<h2>
					<small>Total turnover</small>
					<br>
					<div style="float:left">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['contractDetials']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
; 
					</div>
					<?php if ($this->_tpl_vars['contractDetials']['old_turnover']): ?>
												<a class="pop_over" href="#" data-content="<?php echo ((is_array($_tmp=$this->_tpl_vars['contractDetials']['old_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
;" data-original-title="Old turnover" data-html="true" data-placement="right"><i class="splashy-information" style="margin:8px 0 0 5px"></i>
						</a>
					<?php endif; ?>
				</h2>
				<div style="clear:both"></div>
				<label class="checkbox inline">
				<input type="checkbox" name="indicative_turnover" id="indicative_turnover" <?php if ($this->_tpl_vars['contractDetials']['indicative_turnover'] == 'yes'): ?>checked='checked'<?php endif; ?> value="yes">Indicative Turnover
				</label>
				<br>
				
				</div>
					<div class="span6">	
						<div class="control-group">
							<label class="control-label">Minimum turnover</label>
							<div class="controls">
							<div class="span3">
								<div id="normal-toggle-button">
                                    <input type="checkbox" value="1" <?php if ($this->_tpl_vars['contractDetials']['mini_turnover_status']): ?> checked='checked'<?php endif; ?> name="mini_turn">
                                </div>
							</div>
							<div class="span4 offset1 <?php if ($this->_tpl_vars['contractDetials']['mini_turnover_status'] == 0): ?>hide<?php endif; ?>" id="minimum_turnover">
								<input type="text" name="minimum_turnover" id="" class="span6 validate[required,custom[number],max[<?php echo $this->_tpl_vars['quotedetails']['turnover']; ?>
]]" value="<?php echo $this->_tpl_vars['contractDetials']['minimum_turnover']; ?>
" />&nbsp;&<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
;
							</div>
							</div>
						</div>
						<div class="control-group">
						<label class="control-label">Type of Payment</label>
						<div class="controls">
							<div class="span6">
							<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['typeofpayment'],'selected' => $this->_tpl_vars['contractDetials']['type_of_payment'],'name' => 'paymenttype','class' => "paymenttype validate[required]"), $this);?>
 
							<?php else: ?>
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['typeofpayment'],'selected' => $this->_tpl_vars['contractDetials']['type_of_payment'],'name' => 'paymenttype','class' => 'paymenttype'), $this);?>
 
							<?php endif; ?>
							</div>
						</div>
						
						</div>
					<!--	<div class="control-group">
						<label class="control-label">Expected End Date :</label>
						<div class="controls">							
							<div style="margin-top: 8px" id="repldate"  class="text-warning"><?php echo ((is_array($_tmp=$this->_tpl_vars['expected_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</div>
						</div>
						</div> -->
					
					</div></div>
					<br><br>
					<h4 class="text-center"> <i class="icon-th"></i>Split/Month
										</h4>
					<br>
					
					<div class="w-box">
						<div class="replace">
						<div class="w-box-content cnt_a">
													</div>
						
					</div>
				   </div>
			 </div>
		</div>
	</div>

<?php if (count($this->_tpl_vars['missiondetails']) > 0): ?>
<br>
<h2 class="heading">Invoice</h2>
<div class="row-fluid">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#invoice_types" data-toggle="tab">Invoicing Types</a></li>
		<?php if ($this->_tpl_vars['contractDetials']['status'] == 'validated'): ?>
		<li class=""><a href="#invoices" data-toggle="tab">Invoices</a></li>
		<?php endif; ?>
	</ul>
	<div class="tab-content" style="overflow:hidden">
	<div class="tab-pane active" id="invoice_types" style="padding-bottom:100px">
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
					<th>Action</th>
				</tr>
			<?php $_from = $this->_tpl_vars['missiondetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['missionDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['missionDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['missionDetails']['iteration']++;
?>

                <tr class="" <?php if ($this->_tpl_vars['mission']['cm_status'] == 'deleted' || $this->_tpl_vars['mission']['cm_status'] == 'closed'): ?>style="opacity: 0.5;"<?php endif; ?>>
					<td><a style="cursor:pointer" onclick="<?php if ($this->_tpl_vars['mission']['contractmissionid']): ?>freezeview(<?php echo $this->_tpl_vars['mission']['contractmissionid']; ?>
,<?php echo $this->_tpl_vars['mission']['identifier']; ?>
);<?php else: ?>freezeview('',<?php echo $this->_tpl_vars['mission']['identifier']; ?>
);<?php endif; ?>"><?php echo $this->_tpl_vars['mission']['product_type_converted']; ?>
</a></td>
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
							<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
								<a href="/followup/add-tempo?qmid=<?php echo $this->_tpl_vars['mission']['identifier']; ?>
&cid=<?php echo $_GET['contract_id']; ?>
" class="" data-toggle="modal" role="button" data-target="#add_tempo">Add Tempo</a>
							<?php else: ?>
							-
							<?php endif; ?>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['user_type'] == 'superadmin' && $this->_tpl_vars['mission']['oneshot'] != ""): ?>
							<br>
							<a href="/followup/add-tempo?qmid=<?php echo $this->_tpl_vars['mission']['identifier']; ?>
&cid=<?php echo $_GET['contract_id']; ?>
" class="" data-toggle="modal" role="button" data-target="#add_tempo">Edit Tempo</a>
						<?php endif; ?>
					</td>
					<?php if ($this->_tpl_vars['mission']['contractmissionid']): ?>
					<td>
						<select name="invoice_per[<?php echo $this->_tpl_vars['mission']['contractmissionid']; ?>
]" class="select span10" style="width:90px" <?php if ($this->_tpl_vars['mission']['cm_status'] == 'deleted' || $this->_tpl_vars['mission']['cm_status'] == 'closed'): ?>disabled<?php endif; ?>>
							<option value='month' <?php if ($this->_tpl_vars['mission']['cminvoiceper'] == 'month'): ?> selected="selected"<?php endif; ?>>Month</option>
							<option value='mission' <?php if ($this->_tpl_vars['mission']['cminvoiceper'] == 'mission'): ?> selected='selected' <?php endif; ?>>Mission</option>
							<option value='delivery' <?php if ($this->_tpl_vars['mission']['cminvoiceper'] == 'delivery'): ?> selected='selected'<?php endif; ?>>Delivery</option>
						</select>
					</td>
					<td>
                        <?php if ($this->_tpl_vars['mission']['free_mission'] == 'yes'): ?>Free<?php else: ?><?php if ($this->_tpl_vars['mission']['cm_turnover'] != '0.00' && $this->_tpl_vars['mission']['cm_turnover'] != '0' && $this->_tpl_vars['mission']['cm_turnover'] != ''): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['cm_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
<?php endif; ?>&nbsp;&<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
;<?php endif; ?>
                        <br />
                        <label class="checkbox inline">
                            <input type='checkbox' class=" indicative" name="inductive[<?php echo $this->_tpl_vars['mission']['contractmissionid']; ?>
]" <?php if ($this->_tpl_vars['mission']['cmindicative_turnover']): ?>checked='checked'<?php endif; ?><?php if ($this->_tpl_vars['mission']['cm_status'] == 'deleted' || $this->_tpl_vars['mission']['cm_status'] == 'closed'): ?>disabled<?php endif; ?> value='1'/>
                            <span class="checkbox_text">Indicative</span>
                        </label>
                        <input type='hidden' name="missiontable[<?php echo $this->_tpl_vars['mission']['contractmissionid']; ?>
]" value='cm'/>
                    </td>
						<td>
							<input type='checkbox' class="indicative" name="history_bo[<?php echo $this->_tpl_vars['mission']['contractmissionid']; ?>
]" <?php if ($this->_tpl_vars['mission']['cmhistory_bo'] == 'yes'): ?>checked='checked'<?php endif; ?> value='yes'/>								
						</td>
						<td>
							<input type='checkbox' class="indicative" name="history_fo[<?php echo $this->_tpl_vars['mission']['contractmissionid']; ?>
]" <?php if ($this->_tpl_vars['mission']['cmhistory_fo'] == 'yes'): ?>checked='checked'<?php endif; ?> value='yes'/>								
						</td>						
					<td>
                        <table border="0" width="100%" class="status_table">
                            <tr>
                                <td>
                                    <?php if ($this->_tpl_vars['mission']['cm_status'] == 'deleted'): ?>
                                    <strong  class="text-error">Deleted</strong>
                                    <?php elseif ($this->_tpl_vars['mission']['cm_status'] == 'closed'): ?>
                                    <strong class=" text-error">Closed</strong>
                                    <?php elseif ($this->_tpl_vars['mission']['cm_status'] == 'validated'): ?>
                                    <strong>Validated</strong>
                                    <?php elseif ($this->_tpl_vars['mission']['cm_status'] == 'ongoing' && $this->_tpl_vars['mission']['freeze'] == 'yes'): ?>
                                    <strong>Freezed till <br/><?php echo $this->_tpl_vars['mission']['freeze_end_date']; ?>
</strong>
                                    <?php elseif ($this->_tpl_vars['mission']['edited'] == 'yes'): ?>
                                    <strong>Edited by<br/><?php echo $this->_tpl_vars['mission']['edited_by_name']; ?>
</strong><br/><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['edited_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y")); ?>

                                    <?php elseif ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>
                                    <strong>Added by<br/><?php echo $this->_tpl_vars['mission']['created_by_name']; ?>
</strong><br/><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y")); ?>

                                    <?php else: ?>
                                    <strong>Ongoing</strong>
                                    <?php endif; ?>
                                </td>
                                <td align="right">
                                    <div class="btn-group">

                                        <a type="button" class="dropdown-toggle" data-toggle="dropdown" >
                                            <i class="icon-pencil"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu"  style="left:-125px;">
                                            <?php if ($this->_tpl_vars['mission']['cm_status'] != 'deleted' && $this->_tpl_vars['mission']['cm_status'] != 'closed' && $this->_tpl_vars['mission']['cm_status'] != 'validated'): ?>
                                            <li><a class="mission_action" href="javascript:void(0);" onclick="mission_action('freeze','<?php echo $this->_tpl_vars['mission']['contractmissionid']; ?>
','<?php echo $this->_tpl_vars['mission']['identifier']; ?>
');" tabindex="999" role="menuitem">Freeze Mission</a></li>
                                            <li><a class="mission_action" href="javascript:void(0);" onclick="mission_action('delete','<?php echo $this->_tpl_vars['mission']['contractmissionid']; ?>
','<?php echo $this->_tpl_vars['mission']['identifier']; ?>
');" tabindex="999" role="menuitem">Delete Mission</a></li>
                                            <?php endif; ?>
                                            <li><a class="mission_action" href="javascript:void(0);" onclick="mission_action('add','<?php echo $this->_tpl_vars['mission']['contractmissionid']; ?>
','<?php echo $this->_tpl_vars['mission']['identifier']; ?>
');" tabindex="999" role="menuitem">Duplicate Mission</a></li>
                                            <li><a class="mission_action" href="javascript:void(0);" onclick="mission_action('edit','<?php echo $this->_tpl_vars['mission']['contractmissionid']; ?>
','<?php echo $this->_tpl_vars['mission']['identifier']; ?>
');" tabindex="999" role="menuitem">Edit Mission</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>



                                
					

					</td>
					<?php else: ?>
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
                            <span class="checkbox_text">Indicative</span>
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
										<td>
                        <?php if ($this->_tpl_vars['mission']['from_contract'] == '1'): ?>
                            <strong>Added by<br/><?php echo $this->_tpl_vars['mission']['created_by_name']; ?>
</strong><br/><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y")); ?>

                        <?php else: ?>
                            Not Assigned
                        <?php endif; ?>
                    </td>
					<?php endif; ?>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			</table>

	</div>
	<?php if ($this->_tpl_vars['contractDetials']['status'] == 'validated'): ?>
	<div class="tab-pane" id="invoices">
		<?php if (count($this->_tpl_vars['invoices']) > 0): ?>
		<div class="row-fluid">
			<div class="pull-left" style="margin-top:5px"><strong>GENERATED INVOICES</strong></div>
			<div class="pull-right">
				<a href="/contractmission/download-invoice?cid=<?php echo $_GET['contract_id']; ?>
"><button class="btn btn-primary" type="button"><i class="splashy-download"></i>All</button></a>
				<button class="btn btn-inverse" id="marktreated" type="button"><i class="splashy-check"></i>Mark as Treated</button>
				<button class="btn" id="markuntreated" type="button">Untreat</button>
			</div>
		</div>
		<table class="table topset2 table-bordered">
		<?php $_from = $this->_tpl_vars['invoices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['invoiceDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['invoiceDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['invoice']):
        $this->_foreach['invoiceDetails']['iteration']++;
?>	
			<tr>
				<td><input type="checkbox" class="invoiceids" name="invoices[<?php echo $this->_tpl_vars['invoice']['invoice_id']; ?>
]" value="<?php echo $this->_tpl_vars['invoice']['invoice_id']; ?>
" /></td>
				<td class="treated"><?php if ($this->_tpl_vars['invoice']['is_treated']): ?><i class="splashy-check"></i><?php else: ?>-<?php endif; ?></td>
				<td><strong><?php echo $this->_tpl_vars['invoice']['invoice_number']; ?>
</strong></td>
				<td><strong>Invoice <?php if ($this->_tpl_vars['invoice']['invoice_type'] == 'month'): ?>Monthly<?php elseif ($this->_tpl_vars['invoice']['invoice_type'] == 'mission'): ?>Mission<?php else: ?>Delivery<?php endif; ?></strong>&nbsp;-&nbsp;<?php echo $this->_tpl_vars['invoice']['title']; ?>
</td>
				<td><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
</strong></td>
				<td><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['total_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
&nbsp;&<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
;</strong></td>
				<td><a href="/contractmission/download-invoice?fname=<?php echo $this->_tpl_vars['invoice']['file_path']; ?>
"><i class="splashy-download cursor"></i></a></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		</table>
		<?php else: ?>
			<div class="pull-center"><strong>No Invoice Found</strong></div>
		<?php endif; ?>
		
		<?php if (count($this->_tpl_vars['invoices']) > 0): ?>
		<div class="row-fluid topset2">
			<div class="pull-left" style="margin-top:5px"><strong>FINAL	INVOICES</strong></div>
			<div class="pull-right">
				<button class="btn " id="deletefinalinvoice" type="button"><i class="icon-adt_trash" style="margin:0"></i></button>
				<a href="/contractmission/download-invoice?cid=<?php echo $_GET['contract_id']; ?>
&final=yes"><button class="btn btn-primary" type="button"><i class="splashy-download"></i>All</button></a>
				<a class="" href="/contractmission/final-invoice?cid=<?php echo $_GET['contract_id']; ?>
" data-toggle="modal" role="button" data-target="#upload_final_invoice" id=""><button class="btn btn-info" id="" type="button">Upload New Invoice</button></a>
			</div>
		</div>
		<table class="table topset2 table-bordered">
		<?php if (count($this->_tpl_vars['finalinvoices']) > 0): ?>
		<?php $this->assign('total', 0); ?>
		<?php $_from = $this->_tpl_vars['finalinvoices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['invoiceDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['invoiceDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['invoice']):
        $this->_foreach['invoiceDetails']['iteration']++;
?>	
			<tr>
				<td><input type="checkbox" class="finalinvoiceids" name="invoices[<?php echo $this->_tpl_vars['invoice']['invoice_id']; ?>
]" value="<?php echo $this->_tpl_vars['invoice']['invoice_id']; ?>
" /></td>
				<td><strong><?php echo $this->_tpl_vars['invoice']['invoice_number']; ?>
</strong></td>
				<td><?php echo $this->_tpl_vars['invoice']['comment']; ?>
</td>
				<td><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
</strong></td>
				<td><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['total_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
&nbsp;&<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
;</strong></td>
				<?php echo smarty_function_math(array('equation' => "x + y",'x' => $this->_tpl_vars['total'],'y' => $this->_tpl_vars['invoice']['total_turnover'],'format' => "%.2f",'assign' => 'total'), $this);?>

			</tr>
		<?php endforeach; endif; unset($_from); ?>
		<tfoot>
			<tr>
				<td colspan="4" align="right" style="text-align:right"><strong>Total Invoice</strong></td>
				<td align="right"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
&nbsp;&<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
;</strong></td>
			</tr>
		</tfoot>
		<?php else: ?>
			<tr><td colspan="5"><strong>No Final Invoice Found</strong></td></tr>
		<?php endif; ?>
		</table>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	</div>
	</div>
<?php endif; ?>
<input type="hidden" name="contract_id" value="<?php echo $_GET['contract_id']; ?>
" />
<input type="hidden" name="quote_logs_id" value="<?php echo $this->_tpl_vars['quotedetails']['identifier']; ?>
" />

<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'facturation' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager'): ?>
<div class="row-fluid topset2"  style="margin-top:-80px">
	<div class="span12 row-centered" style="text-align:center">
		<?php if (( $this->_tpl_vars['contractDetials']['status'] == 'validated' && ( $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' ) ) || $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
	<button class="btn btn-default" onclick="return removeDisabled()" value="modify" name="modify" type="submit">Update my changes</button>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'facturation'): ?>		
		<?php if ($this->_tpl_vars['contractDetials']['status'] == 'validated' || $this->_tpl_vars['contractDetials']['status'] == 'closed' || $this->_tpl_vars['contractDetials']['status'] == 'deleted'): ?>
		<a href='/contractmission/contract-list?active=&submenuId=ML13-SL3'><button class="btn btn-primary" value="Close" name="close" type="button">Cancel</button></a>
		<input type="hidden" name="activetab" value="" />
		<?php else: ?>
		<button class="btn btn-primary" onclick="return removeDisabled()" value="validate" name="validate" type="submit"><i	style="margin-right:5px" class="icon-ok icon-white"></i>Validate Contract</button>
		<input type="hidden" name="activetab" value="validate" />
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
</div>
</form>

<!-- Popup to upload final invoice  -->
<div class="modal fullscreen hide fade" id="upload_final_invoice">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Upload Final Invoice</h3>		
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>

<!--///for the add tempo popup///-->
<div class="modal container hide fade" id="add_tempo">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Add tempo</h3>		
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>
<!--popup to show new tech mission details-->
<div class="modal hide fade" id="new_sales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Sales Mission</h3>
    </div>
    <div class="modal-body">
		<form action="/contractmission/add-new-salesmission" method="post" id="newstaff" enctype="multipart/form-data">
			<input type="hidden" name="contractid" value="<?php echo $_GET['contract_id']; ?>
" />
			<input type="hidden" name="quote_id" value="<?php echo $this->_tpl_vars['quotedetails']['identifier']; ?>
" />
			<input type="hidden" name="sales_creator_id" value="<?php echo $this->_tpl_vars['contractDetials']['sales_creator_id']; ?>
" />
			<input type="hidden" name="sales_owner" value="<?php echo $this->_tpl_vars['contractDetials']['sales_owner']; ?>
" />
			<section>
				<p>You are about to create a new sales mission, thank you confirm your choice below</p>
				<div class="control-group">
					<div class="pull-center">
						<button  class="btn" data-dismiss="modal" type="reset">Annuler</button>
						<button class="btn btn-primary" name="submit" value="no" type="submit">Validate</button>
					</div>
				</div>		
			</section>
		</form>
    </div>
    <div class="modal-footer">
    </div>
</div>

<!-- popup to show add mission -->
<div class="fullscreen modal hide fade" id="add_mission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Duplicate mission</h3>
    </div>
    <div class="modal-body">
	
    </div>
    <div class="modal-footer">
    </div>
</div>

<!-- popup to show edit mission -->
<div class="fullscreen modal hide fade" id="edit_mission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Edit mission</h3>
    </div>
    <div class="modal-body">
	
    </div>
    <div class="modal-footer">
    </div>
</div>

<!-- popup to show freeze mission -->
<div class="fullscreen modal hide fade" id="freeze_mission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Freeze mission</h3>
    </div>
    <div class="modal-body">
	
    </div>
    <div class="modal-footer">
    </div>
</div>

<?php echo '
	<script>
		var salesdtime = '; ?>
<?php echo $this->_tpl_vars['quotedetails']['final_mission_length']; ?>
<?php echo ';
		var salesdtimeo = '; ?>
"<?php echo $this->_tpl_vars['quotedetails']['final_mission_length_option']; ?>
"<?php echo ';
		var scurrency = '; ?>
"<?php echo $this->_tpl_vars['quotedetails']['sales_suggested_currency']; ?>
"<?php echo ';
		var peinfo = '; ?>
"<?php echo $this->_tpl_vars['quotedetails']['prod_extra_info']; ?>
"<?php echo ';
		var turnover = '; ?>
<?php echo $this->_tpl_vars['quotedetails']['turnover']; ?>
<?php echo ';
		var prod_extra_launch_days = '; ?>
"<?php echo $this->_tpl_vars['quotedetails']['prod_extra_launch_days']; ?>
"<?php echo ';
		var quote_id = '; ?>
"<?php echo $this->_tpl_vars['quotedetails']['identifier']; ?>
"<?php echo ';
		var utype = '; ?>
"<?php echo $this->_tpl_vars['user_type']; ?>
"<?php echo ';
		var edate = '; ?>
"<?php echo ((is_array($_tmp=$this->_tpl_vars['contractDetials']['expected_launch_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"<?php echo ';
		var contract_id = '; ?>
"<?php echo $_GET['contract_id']; ?>
"<?php echo ';
		
		utype = $.trim(utype);
		$("#contractsource").change(function(){
			if($(this).val()=="Edit Place")
				$("#showepfiles").css("display","block");
			else
				$("#showepfiles").css("display","none");
		});
		
		function loadsplitvalues(date,cid,status)
		{
			$.ajax({
			url:\'/contractmission/get-split-month\',
			type:\'POST\',
			data:{\'quote_id\':quote_id,\'expected_launch_date\':date,\'contract_id\':cid,\'turnover\':turnover,\'salesdtime\':salesdtime,\'salesdtimeo\':salesdtimeo,"scurrency":scurrency,\'pdays\':prod_extra_launch_days,\'peinfo\':peinfo,\'edit_status\':status},
			beforeSend:function()
			{
				$(".displaysplit").css("display","block");
				$(".replace").html("<b style=\'text-align:center\'>Please Wait Loading...</b>");
			},
			success:function(html){
			$(".replace").html(html);
			//$("#repldate").text($("#explaunchdate").val());
			final_end_date = setdate = $("#explaunchdate").val();
			/* $("#enddate").datetimepicker({ 
					format:\'d/m/Y\',
					formatDate:\'d/m/Y\',
					timepicker:false,
					minDate:setdate
				});
				$("#enddate").val(setdate); */
				//alert(setdate);
			}
		});
		}
		
		
	/* 	$("#expdate").datepicker().on("changeDate",function(e){
		var date = $(this).data(\'date\');
		loadsplitvalues(date);
				/* $.ajax({
				url:\'/contractmission/get-split-month\',
				type:\'POST\',
				data:{\'quote_id\':quote_id,\'expected_launch_date\':date,\'turnover\':turnover,\'salesdtime\':salesdtime,\'salesdtimeo\':salesdtimeo,"scurrency":scurrency,\'pdays\':prod_extra_launch_days,\'peinfo\':peinfo},
				beforeSend:function()
				{
					$(".replace").html("<b style=\'text-align:center\'>Please Wait Loading...</b>");
				},
				success:function(html){
				$(".replace").html(html);
				$("#repldate").text($("#explaunchdate").val());
				}
			}); */
		/* }); */
		
		$(document).ready(function(){
			$("#createcontract").validationEngine({prettySelect : true,useSuffix: "_chzn"});
			
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
			
			loadsplitvalues(edate,contract_id,0);
			
			$(\'body\').on(\'hidden\', \'#freeze_mission, #add_mission, #edit_mission\', function (){        
				$(this).removeData(\'modal\');				
				$(\'.modal-body\',this).html(\'\');		 
				$(".mission_action").val(\'\');
			});
			
		})
		
		if(utype==\'superadmin\' || utype==\'facturation\')
		{
		$(document).on("click",".delete",function(){
		var id_identifier = $(this).attr("rel");
		/*	if(confirm("Are you sure? Want to delete this File"))
			{
				$(this).closest(".topset2").remove();
				$(".onsuccessrep").html("Please Wait Deleting File.");
				$.post("/contractmission/delete-document",{"identifier":id_identifier},function(result){
						$(".onsuccessrep").html(result);
				}); 
			}	*/
			
			smoke.confirm("Are you sure? Want to delete this File",function(e)
			{
				if(e)
				{
					$(this).closest(".topset2").remove();
					$(".onsuccessrep").html("Please Wait Deleting File.");
					$.post("/contractmission/delete-document",{"identifier":id_identifier},function(result){
							$(".onsuccessrep").html(result);
					}); 
				}
			})
		});

		$("#deletefinalinvoice").click(function(){
		if($(".finalinvoiceids:checked").length)
		{
			smoke.confirm("Are you sure? Want to delete the Invoice",function(e)
			{
					if(e)
					{
						var ids = $(".finalinvoiceids:checked").map(function()
						{
							$(this).closest("tr").remove();
							return $(this).val();
						}).get();
						if($.trim(ids))
						{
						$.post(\'/contractmission/delete-invoice\',{\'ids\':ids},function(data){});
						}
					}
			})
		}
		})
		
		$(\'#contractname\').editable({
            url: \'/contractmission/update-contractname\',
            type: \'text\',
            name: \'contract_name\',
            title: \'\',
			validate: function(value) {
               if($.trim(value) == \'\') return \'This field is required\';
            }
        });	
		}
		
		//show destination if product is translation
		function fnCheckProduct(element)
		{
			var product=element.value;
			var mission_details=(element.id).split("_");
			var mission_id=mission_details[1];
			if(product==\'autre\')
			{
				$("#other_info_"+mission_id).hide();
			}
			else if(product==\'translation\')
			{
				$("#other_info_"+mission_id).show();		
				//$("#languagedest_"+mission_id).show();
				$("#languagedest_"+mission_id).chosen({ allow_single_deselect: false,search_contains: true});
				
			}
			else
			{
				$("#other_info_"+mission_id).show();
				
				$("#languagedest_"+mission_id).hide();
				$("#languagedest_"+mission_id).removeClass("chzn-done" ).addClass("");
				$("#languagedest_"+mission_id+"_chzn").remove();
				$("#other_info").hide();
			}
			$("#box_title").text(element.options[element.selectedIndex].text);
		}
		
		//show other category if product type is autre
		function fnCheckProductType(element)
		{	
			var productType=element.value;
			var mission_details=(element.id).split("_");
			var mission_id=mission_details[1];
			if(productType==\'autre\')
			{
				$("#producttypeotherdiv_"+mission_id).show();
			}
			else{
				$("#producttypeotherdiv_"+mission_id).hide();
			}
			$(".product_type").text(element.options[element.selectedIndex].text);
		}
		
		//$(".cselect").chosen({ allow_single_deselect: false,disable_search: true});
        /*added by naseer on 17-11-2015 */
        function mission_action(val,cmid,mid){
            var option = val;
            var cmid = cmid;//$(this).closest("select").attr("rel");
            var mid = mid;//$(this).closest("select").attr("id");
            if(option=="delete")
            {
                smoke.confirm("Are you sure? Want to delete this mission",function(e)
                {
                    if(e)
                    {
                        $.post("/contractmission/delete-mission",{"cmid":cmid,\'maction\':"delete"},function(result){
                            location.reload();
                        });
                    }
                });
            }
            else if(option=="freeze")
            {
                $(\'#freeze_mission\').modal(\'show\');
                $(\'#freeze_mission .modal-header h3\').html(\'Freeze Mission\');
                $(\'#freeze_mission .modal-body\').html(\'Please wait loading...\');
                $.post(\'/contractmission/freeze-mission\',{"cmid":cmid},function(data){
                    $("#freeze_mission .modal-body").html(data);
                });
            }
            else if(option=="add")
            {
                $(\'#add_mission\').modal(\'show\');
                $(\'#add_mission .modal-body\').html(\'Please wait loading...\');
                $.post(\'/contractmission/add-mission\',{"reqaction":"add","cmid":cmid,\'mid\':mid,\'contract_id\':contract_id},function(data){
                    $("#add_mission .modal-body").html(data);
                });
            }
            else if(option=="edit")
            {
                $(\'#edit_mission\').modal(\'show\');
                $(\'#edit_mission .modal-body\').html(\'Please wait loading...\');
                $.post(\'/contractmission/add-mission\',{"reqaction":"edit","cmid":cmid,\'mid\':mid,\'contract_id\':contract_id},function(data){
                    $("#edit_mission .modal-body").html(data);
                });
            }
        }
        /* end of added by naseer on 17-11-2015 */
        /* not in use */
		$(".mission_action").change(function(){
			var option = $(this).val();
			var cmid = $(this).closest("select").attr("rel");
			var mid = $(this).closest("select").attr("id");
			if(option=="delete")
			{
				smoke.confirm("Are you sure? Want to delete this mission",function(e)
				{
					if(e)
					{
						$.post("/contractmission/delete-mission",{"cmid":cmid,\'maction\':"delete"},function(result){
								location.reload();
						}); 
					}
				});
			}
			else if(option=="freeze")
			{
				$(\'#freeze_mission\').modal(\'show\');
				$(\'#freeze_mission .modal-header h3\').html(\'Freeze Mission\');
				$(\'#freeze_mission .modal-body\').html(\'Please wait loading...\');
				$.post(\'/contractmission/freeze-mission\',{"cmid":cmid},function(data){
					$("#freeze_mission .modal-body").html(data);	
					});
			}
			else if(option=="add")
			{
				$(\'#add_mission\').modal(\'show\');
				$(\'#add_mission .modal-body\').html(\'Please wait loading...\');
				$.post(\'/contractmission/add-mission\',{"reqaction":"add","cmid":cmid,\'mid\':mid,\'contract_id\':contract_id},function(data){
					$("#add_mission .modal-body").html(data);	
					});
			}
			else if(option=="edit")
			{
				$(\'#edit_mission\').modal(\'show\');
				$(\'#edit_mission .modal-body\').html(\'Please wait loading...\');
				$.post(\'/contractmission/add-mission\',{"reqaction":"edit","cmid":cmid,\'mid\':mid,\'contract_id\':contract_id},function(data){
					$("#edit_mission .modal-body").html(data);	
					});
			}
		});
		
		function updatesplitval()
		{
			/* var splitvalues  = $(\'.splitfield\').map(function() {
				return this.value;
			}).get(); */
			smoke.confirm("Are you sure? Want to Update Split values",function(e)
			{
				if(e)
				{
					$("#createcontract").submit();
				}
			});
		}
		
	//calculate total internal cost and total delivery
	function fnCalTotalCosts()
	{
		var total_price_contract = '; ?>
<?php echo $this->_tpl_vars['contractDetials']['turnover']; ?>
<?php echo ';
		var total_internalcost=0;
		var total_unitprice=0;
		var total_price = parseFloat(total_price_contract);
		var actual_turnover = parseFloat($("#actual_mission_turnover").val());
		var volume= parseFloat($("#volume").val().replace(",","."));
		var internalcost=parseFloat($("#writer_cost").val().replace(",","."))+parseFloat($("#corrector_cost").val().replace(",","."));
		margin_percentage = parseFloat($("#margin_percentage").val().replace(",","."));
		var unit_price=(internalcost/(1-margin_percentage/100));
		unit_price=unit_price.toFixed(2);
		var packageval = $("#package").val();
		if(packageval=="team")
		{
			$(".fpack").hide();
			$(".fpackteam").show();
			var team_ca = parseFloat($("#team_packs").val())*parseFloat($("#team_fee").val());
			var turnover =(volume*unit_price+team_ca).toFixed(2);
		}
		else if(packageval=="user")
		{
			$(".fpack").hide();
			$(".fpackuser").show();
			var turnover =(parseFloat($("#user_fee").val())).toFixed(2);
		}
		else
		{
			$(".fpack").hide();
			var turnover =(volume*unit_price).toFixed(2);
		}
		
		//added w.r.t price diminish
		/* $("#cost_diminish_"+mission_id).attr(\'data-price\',unit_price);
		$("#cost_diminish_"+mission_id).val(0); */
		
		
		if($("[name=\'free_mission\']:checked").val()=="yes")
		{
			actual_turnover = turnover = 0;
			var turnover_text= 0;
		}
		else
		{
			var turnover_text=turnover.replace(".",",");
		}
		var unit_price_text=unit_price.replace(".",",");
		//alert(internalcost+\'--\'+volume+\'--\'+margin_percentage+\'--\'+unit_price);
		$("#mission_turnover").val(turnover);
		$("#mission_turnover_text").html("<b>"+turnover_text+"</b>");
		
		$("#unit_price").val(unit_price);
		$("#internalcost").val(internalcost);
		$("#unit_price_text").html("<b>"+unit_price_text+"</b>");
		if($("#reqaction").val()=="add")
		{
			total_price += parseFloat(turnover);
		}
		else
		{
			//console.log(total_price);
			//console.log(actual_turnover);
			//console.log(turnover);
			total_price = total_price - actual_turnover;
			total_price += parseFloat(turnover); 
		}
		//console.log(total_price);
		var total_price_text=total_price.toFixed(2);	
		total_price_text=total_price_text.replace(".",",");
		$("#total_turnover").val(total_price);
		$("#total_turnover_text").html("<b>"+total_price_text+"</b>");
	}
		
	function freezeview(cmid,mid)
	{
		//if(cmid)
		{
			$(\'#freeze_mission\').modal(\'show\');
			$(\'#freeze_mission .modal-header h3\').html(\'Mission Details\');
			$(\'#freeze_mission .modal-body\').html(\'Please wait loading...\');
			$.post(\'/contractmission/freeze-mission\',{"cmid":cmid,"freeze_action":"view","mid":mid},function(data){
				$("#freeze_mission .modal-body").html(data);	
			});
		}
	}
	</script>
    <!--added by naseer on 17-11-2015-->
    <style>
        input[type="checkbox"] {
            border-radius: 2px;;
            cursor:pointer;
        }
        .checkbox_text{
            display: inline;
            color:#919B9C;
        }
        .status_table td{
            border: none;
            border-left: 0px;
        }
    </style>
'; ?>