<?php /* Smarty version 2.6.19, created on 2016-04-25 17:17:45
         compiled from gebo/quotecontractmission/assign-missions.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quotecontractmission/assign-missions.phtml', 529, false),array('modifier', 'stripslashes', 'gebo/quotecontractmission/assign-missions.phtml', 584, false),array('modifier', 'strip_tags', 'gebo/quotecontractmission/assign-missions.phtml', 584, false),array('modifier', 'nl2br', 'gebo/quotecontractmission/assign-missions.phtml', 584, false),array('modifier', 'zero_cut', 'gebo/quotecontractmission/assign-missions.phtml', 642, false),array('modifier', 'zero_cut_t', 'gebo/quotecontractmission/assign-missions.phtml', 644, false),array('modifier', 'capitalize', 'gebo/quotecontractmission/assign-missions.phtml', 1721, false),array('function', 'math', 'gebo/quotecontractmission/assign-missions.phtml', 755, false),array('function', 'html_options', 'gebo/quotecontractmission/assign-missions.phtml', 1636, false),)), $this); ?>
<?php echo '
<style>
	.btn1
	{
		padding:0px 12px;
	}
	
	.mission-details
	{
		margin:0 0 15px;
	}
	
	.delete
	{
		cursor:pointer;
	}
	
	.headercolor tr th
	{
		background-color:#f1f1f1;
	}
	
	.btnmargin
	{
		margin-top: 5px;
	}
	
	.capitalise
	{
		text-transform: capitalize;
	}	
	
	#correction
	{
		width: 183px;
	}
	
	
	td .alert-info
	{
		padding:2px;
	}
	
	.assignuser
	{
		padding: 15px 15px 20px 18px;
		margin: 0 25px 0 0;
		text-align:center;
	}
	
	.assignuser:hover {background-color: #fff;border-radius: 3px;}
	#addshot .showshot
	{
		display:block !important;
		margin-top:10px;
	}
	.errortempo
	{
		border: 1px solid #d90501 !important;
		box-shadow: none !important;
	}
	.free-mission
	{
		font-weight: bold;
	}
	
	.free-mission input[type="radio"] 
	{
		margin-top: -2px;
	}
</style>
<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script>
var prodsubmit= true;
var private_mission ='; ?>
<?php if ($this->_tpl_vars['launch_recuritement'] == 'yes' || $this->_tpl_vars['launch_survey'] == 'yes'): ?>false<?php else: ?>true<?php endif; ?><?php echo ';
var nbarticles ='; ?>
"<?php echo $this->_tpl_vars['prod_mission_details']['volume']; ?>
"<?php echo ';
var mtype ='; ?>
"<?php echo $_GET['type']; ?>
"<?php echo ';
var writing_cost_glob ='; ?>
"<?php echo $this->_tpl_vars['writing']; ?>
"<?php echo ';
var correction_cost_glob ='; ?>
"<?php echo $this->_tpl_vars['proofreading']; ?>
"<?php echo ';
var other_cost_glob ='; ?>
"<?php echo $this->_tpl_vars['autre']; ?>
"<?php echo ';
var cmcurrency ='; ?>
"<?php echo $this->_tpl_vars['cmcurrency']; ?>
"<?php echo ';
var conversion ='; ?>
<?php echo $this->_tpl_vars['quote_details']['conversion']; ?>
<?php echo ';
var salescurrency ='; ?>
"<?php echo $this->_tpl_vars['quote_details']['sales_suggested_currency']; ?>
"<?php echo ';
var techfiles = 0;var quote_files = 0;var seo_files = 0;
var change_prices = false;
if(salescurrency!=cmcurrency)
	change_prices = true;
 $(document).on("click",".delete",function(){
	var id_identifier = $(this).attr("rel");
	/* if(confirm("Are you sure? Want to delete this File"))
		{
			$(this).closest("tr").remove();
			$(".onsuccessrep").html("<tr><td>Please Wait Deleting File.</td></tr>");
			$.post("/quote/delete-document",{"identifier":id_identifier,"assignmission":true},function(result){
					$(".onsuccessrep").html(result);
			}); 
		}	*/
		
		smoke.confirm("Are you sure? Want to delete this File",function(e)
			{
				if(e)
				{
					$(this).closest("tr").remove();
					$(".onsuccessrep").html("<tr><td>Please Wait Deleting File.</td></tr>");
					$.post("/quote/delete-document",{"identifier":id_identifier,"assignmission":true,"zip_req":true},function(result){
							$(".onsuccessrep").html(result);
							seo_files--;
							if(quote_files==0 && seo_files==0)
							{
								$(".zipdownload").hide();
							}
					}); 
				}
			})
	}) 

	$(document).on("click",".deletequote",function(){
	var id_identifier = $(this).attr("rel");
	
		smoke.confirm("Are you sure? Want to delete this File",function(e)
			{
				if(e)
				{
					$(this).closest("tr").remove();
					$(".onsuccessrepquote").html("<tr><td>Please Wait Deleting File.</td></tr>");
					$.post("/quote/delete-document-quote",{"identifier":id_identifier,"assignmission":true,"zip_req":true},function(result){
							$(".onsuccessrepquote").html(result);
							quote_files--;
							if(mtype=="tech")
								var reqfiles = techfiles;
							else if(mtype=="staff")
								var reqfiles = stafffiles;
							else
								var reqfiles = seo_files;
							if(quote_files==0 && reqfiles==0)
							{
								$(".zipdownload").hide();
							}
					}); 
				}
			})
	}) 
	
	$(document).on("click",".deletetech",function(){
	var id_identifier = $(this).attr("rel");
	
		smoke.confirm("Are you sure? Want to delete this File",function(e)
			{
				if(e)
				{
					$(this).closest("tr").remove();
					$(".onsuccessrep").html("<tr><td>Please Wait Deleting File.</td></tr>");
					$.post("/quote/delete-document-tech",{"identifier":id_identifier,"zip_req":true},function(result){
							$(".onsuccessrep").html(result);
							techfiles--;
							if(quote_files==0 && techfiles==0)
									$(".zipdownload").hide();
					}); 
				}
			})
	}) 
	$(document).on("click",".deletestaff",function(){
	var id_identifier = $(this).attr("rel");
		smoke.confirm("Are you sure? Want to delete this File",function(e)
			{
				if(e)
				{
					$(this).closest("tr").remove();
					$(".onsuccessrep").html("<tr><td>Please Wait Deleting File.</td></tr>");
					$.post("/contractmission/delete-document-staff",{"identifier":id_identifier,"zip_req":true},function(result){
							$(".onsuccessrep").html(result);
							stafffiles--;
							if(quote_files==0 && stafffiles==0)
									$(".zipdownload").hide();
					}); 
				}
			})
	}) 
	/* Used to remove disabled from after calling validation engine */
function removeDisabled(){	setTimeout(function(){$(".MultiFile-applied").removeAttr("disabled");}, 1000);	}
	$(document).ready(function(){

		$(".freelance").on(\'ifChecked\',function(){
			$(\'.freelance-section\').removeClass(\'hidden\');
		});
		$(".freelance").on(\'ifUnchecked\',function(){
			$(\'.freelance-section\').addClass(\'hidden\');
		});
		$("input[name=\'freelance_mission\']").on(\'ifChecked ifUnchecked\',function(){

			if($(this).val()==\'yes\')
			{
				$(\'.freelance-yes\').removeClass(\'hidden\');
			}
			else
			{
				$(\'.freelance-yes\').addClass(\'hidden\');
			}
		});
		
		/* $("input[name=\'assignuser\']").each(function(){
		var self = $(this),
		  label = self.next(),
		  label_text = label.text();

		label.remove();
		self.iCheck({
		  radioClass: \'iradio_line-blue\',
		  insert: \'<div class="icheck_line-icon"></div><div class="change">\' + label_text +\'</div>\',
		});
	  }); */
	   $("input[name=\'assignuser\'], input[name=\'freelance_mission\']").iCheck({
   radioClass: \'iradio_square-blue\',
   increaseArea: \'50%\' 
  });
	  $("#correction").chosen({  allow_single_deselect:false,disable_search: true });
	  $("#currency").chosen({  allow_single_deselect:false,disable_search: true });
	  $(".uni_style").uniform();
$("#assignmission").validationEngine({prettySelect : true,useSuffix: "_chzn",onValidationComplete: function(form, status){
			if(status == true)
			{
				if($("#missiontype").val()=="prod" && $("#tempooption").val()=="yes")
				{
					checkMax();
					if(prodsubmit)
						return true;
				}
				else
					return true;
			}
	}});  
$("#closequote").validationEngine();	  
$("#newstaff").validationEngine();	  
jQuery(\'#newcomment\').attr(\'data-prompt-position\',\'topLeft\');
jQuery(\'#newcomment\').data(\'promptPosition\',\'topLeft\');
jQuery(\'#staffcomment\').attr(\'data-prompt-position\',\'topLeft\');
jQuery(\'#staffcomment\').data(\'promptPosition\',\'topLeft\');

		/* To check for Recruitment and Survey */
		
		$(".launch").click(function(){
			if($(".launch:checked").val()=="recruitment")
			{
				$(".privatedelivery").attr(\'checked\',\'checked\');
				private_mission = false;
			}
			else if($(".launch:checked").val()=="survey")
			{
				$(".privatedelivery").removeAttr(\'checked\');
				private_mission = false;
			}
			else
				private_mission = true; 
		})
		
		$(".privatedelivery").click(function(){
			return private_mission;
		});
		
		quote_files = parseInt($(".onsuccessrepquote tr").length);
		if(mtype=="tech")
		techfiles = $(".onsuccessrep tr").length;
		else if(mtype=="seo")
		seo_files = $(".onsuccessrep tr").length;
		else
		stafffiles = $(".onsuccessrep tr").length;
	});
	/* Calculating writer and proffreading cost */
	$(document).on(\'keyup\',\'.keyup\',function(){
		var writing_cost = $("#writing").val();
		var correction_cost = $("#proofreading").val();
		var othercost = $("#othercost").val();
		if(writing_cost!="")
		writing_cost = parseFloat(writing_cost.replace(",","."));
		else
		writing_cost = 0;
		if(correction_cost!="")
		correction_cost = parseFloat(correction_cost.replace(",","."));
		else
		correction_cost = 0;
		
		if(othercost!="")
		othercost = parseFloat(othercost.replace(",","."));
		else
		othercost = 0;
		
		if($("#merge_writing_cost:checked").length || $("#merge_proofreading_cost:checked").length)
		{
			//correction_cost = 0;
			othercost = 0;
		}
		
		/* if($("#merge_proofreading_cost:checked").length)
		{
			othercost = 0;
		} */
		
		var value = writing_cost+correction_cost+othercost;
		$("#cost_max").val(value.toFixed(2));
		
		if(change_prices)
		showPrices();
	});

	$(document).on(\'click\',\'.merge\',function(){
		var writing_cost = $("#writing").val();
		var correction_cost = $("#proofreading").val();
		var othercost = $("#othercost").val();
		
		if(othercost!="")
		othercost = parseFloat(othercost.replace(",","."));
		else
		othercost = 0;
		
		if(writing_cost!="")
		writing_cost = parseFloat(writing_cost.replace(",","."));
		else
		writing_cost = 0;
		
		if(correction_cost!="")
		correction_cost = parseFloat(correction_cost.replace(",","."));
		else
		correction_cost = 0;
		
		othercost_add = othercost;
		
		/* if($("#merge_writing_cost:checked").length && $(this).attr(\'id\')=="merge_writing_cost")
		{
			writing_cost += othercost;	
		}
		else if($(this).attr(\'id\')=="merge_writing_cost")
		{
			writing_cost -= othercost;
		}
		
		if($("#merge_proofreading_cost:checked").length && $(this).attr(\'id\')=="merge_proofreading_cost")
		{
			correction_cost += othercost;
		}
		else if($(this).attr(\'id\')=="merge_proofreading_cost")
			correction_cost -= othercost;*/
		
		if($("#merge_writing_cost:checked").length || $("#merge_proofreading_cost:checked").length)
			othercost_add = 0; 
		
		if($("#merge_writing_cost:checked").length)
		{
			writing_cost =  parseFloat(writing_cost_glob)+parseFloat(other_cost_glob);	
		}
		else
		writing_cost =  parseFloat(writing_cost_glob);
		
		if($("#merge_proofreading_cost:checked").length)
		{
			correction_cost =  parseFloat(correction_cost_glob)+parseFloat(other_cost_glob);
		}
		else
		correction_cost = parseFloat(correction_cost_glob);
		$("#writing").val(writing_cost.toFixed(2));
		$("#proofreading").val(correction_cost.toFixed(2));
		//alert(othercost_add);
		var value = writing_cost+correction_cost+othercost_add;
		$("#cost_max").val(value.toFixed(2));
		
		if(change_prices)
		showPrices();
	});
	
	function insertPrice()
	{
		var othercost  = $("#othercost").val();
		$("#price").val(nbarticles*parseFloat(othercost.replace(",",".")));
		//$("#before_prod").css(\'display\',\'none\');
		$(".addmargin").css(\'margin-bottom\',\'10px\');
	}

	function removePrice()
	{
		$("#price").val(\'new\');
		//$("#before_prod").css(\'display\',\'block\');
	}
	
	function writingmax(field, rules, i, options){
		var length = $("#merge_writing_cost:checked").length;
		if(length)
		{
			var max_val = parseFloat(writing_cost_glob)+parseFloat(other_cost_glob);
			if((parseFloat(field.val())) > max_val)
			return \' La valeur maximale possible est de \'+max_val.toFixed(2)+\' \';
		}
		else
		{
			if(parseFloat(field.val()) > parseFloat(writing_cost_glob))
			return \' La valeur maximale possible est de \'+writing_cost_glob.toFixed(2)+\' \';
		}
	}
	
	function proofreadingmax(field, rules, i, options){
		var length = $("#merge_proofreading_cost:checked").length;
		if(length)
		{
			var max_val = parseFloat(correction_cost_glob)+parseFloat(other_cost_glob);
			if((parseFloat(field.val())) > max_val)
			return \' La valeur maximale possible est de \'+max_val.toFixed(2)+\' \';
		}
		else
		{
			if(parseFloat(field.val()) > parseFloat(correction_cost_glob))
			return \' La valeur maximale possible est de \'+correction_cost_glob.toFixed(2)+\' \';
		}
	}
	
	function changePrice(current)
	{
		cmcurrency = current.value
		if(cmcurrency!=salescurrency)
		{
			change_prices = true;
			showPrices();
		}
		else
		{
			change_prices = false;
			hidePrices();
		}
			
	}
	
	function showPrices()
	{
		var writing_cost = $("#writing").val();
		var correction_cost = $("#proofreading").val();
		var othercost = $("#othercost").val();
		var costmax = $("#cost_max").val();
		var cmtext;
		var conversion = parseFloat($("#conversionprod").val());
		cmtext = " ("+(writing_cost*conversion).toFixed(2)+" &"+cmcurrency+";)" ;
		$("#cmWriting").html(cmtext);
		
		cmtext = " ("+(correction_cost*conversion).toFixed(2)+" &"+cmcurrency+";)" ;
		$("#cmCorrection").html(cmtext);
		
		cmtext = " ("+(othercost*conversion).toFixed(2)+" &"+cmcurrency+";)" ;
		$("#cmOther").html(cmtext);
		
		cmtext = " ("+(costmax*conversion).toFixed(2)+" &"+cmcurrency+";)" ;
		$("#cmCostmax").html(cmtext);
	}
	
	function hidePrices()
	{
		$("#cmWriting").html(\'\');
		$("#cmCorrection").html(\'\');
		$("#cmOther").html(\'\');
		$("#cmCostmax").html(\'\');
	}
	
	
</script>
'; ?>


<h2 class="heading"><a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['client_info']['identifier']; ?>
&submenuId=ML13-SL1" target="_blank"><?php if ($this->_tpl_vars['client_info']['company_name']): ?><?php echo $this->_tpl_vars['client_info']['company_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['client_info']['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['client_info']['last_name']; ?>
<?php endif; ?></a> > <a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract_id']; ?>
&action=view" target="_blank"><?php echo $this->_tpl_vars['contract_details']['contractname']; ?>
 </a> > <a href="/contractmission/missions-list?submenuId=ML13-SL4&contract_id=<?php echo $this->_tpl_vars['contract_id']; ?>
" target="_blank">All missions</a> > Mission assignment</h2>

<div class="row-fluid">
<div class="span3">

<div class="alert">
  <img class="rd_30" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['loginuserId']; ?>
/logo.jpg" style="margin-bottom: 15px">
	<h4>Welcome !<br> <?php echo $this->_tpl_vars['count_text']; ?>
</h4><br>
</div>
</div>


<!--div id="" class="breadCrumb module">

		<div>
		<ul>
			<li class="first"><i class="icon-home"></i></li>
			<li style=""><a href="/contractmission/contract-list?submenuId=ML13-SL3" title="Contract List">Contract List</a></li>
			<li style=""><?php echo $this->_tpl_vars['contract_details']['contractname']; ?>
</li>
			<li style=""><a href="/contractmission/missions-list?submenuId=ML13-SL4&contract_id=<?php echo $this->_tpl_vars['contract_details']['quotecontractid']; ?>
" title="Missions List">Missions List</a></li>
			
		</ul>
		</div>

</div-->

				
<div class="row-fluid">
	<div class="span8 offset1">
	<form class="form-horizontal"  action="/contractmission/assign-user" method="POST" id="assignmission" enctype="multipart/form-data">
	<input type="hidden" name="missiontype" id="missiontype" value="<?php echo $this->_tpl_vars['type']; ?>
">
	<input type="hidden" name="quoteid" value="<?php echo $this->_tpl_vars['quote_details']['identifier']; ?>
" />
	<input type="hidden" name="seotechprodid" value="<?php echo $this->_tpl_vars['seotechprodid']; ?>
">
	<input type="hidden" name="contractid" value="<?php echo $this->_tpl_vars['contract_id']; ?>
">
	<input type="hidden" name="currentindex" value="<?php echo $this->_tpl_vars['current_index']; ?>
">
	<input type="hidden" name="maxindex" value="<?php echo $this->_tpl_vars['max_count']; ?>
">
	<input type="hidden" name="sales_suggested_currency" value="<?php echo $this->_tpl_vars['quote_details']['sales_suggested_currency']; ?>
">
	<input type="hidden" name="conversion" value="<?php echo $this->_tpl_vars['quote_details']['conversion']; ?>
">
	<?php if ($this->_tpl_vars['type'] == 'tech'): ?>
		<?php if ($this->_tpl_vars['contractDetails']): ?>
			<input type="hidden" name="contractmissionid" value="<?php echo $this->_tpl_vars['contractMissionDetails']['contractmissionid']; ?>
" />
			<input type="hidden" name="assigned_user" value="<?php echo $this->_tpl_vars['contractMissionDetails']['assigned_to']; ?>
" />
		<?php else: ?>
		<div class="alert <?php if ($this->_tpl_vars['techmissiondetails']['before_prod'] != 'yes'): ?> alert-info <?php endif; ?>">
			<a class="close" data-dismiss="alert">&times;</a>
			A <strong>Tech Mission <?php if ($this->_tpl_vars['techmissiondetails']['before_prod'] == 'yes'): ?> Blocker <?php endif; ?></strong>
			is expected now, please assign it to someone in your team
		</div>
		<?php endif; ?>
		
		<div class="w-box" style="margin-bottom:15px">
			<div class="w-box-header">
			<?php if ($this->_tpl_vars['current_index'] != 0): ?>
								<?php endif; ?>
			Missions list
			<?php if ($this->_tpl_vars['current_index'] < ( $this->_tpl_vars['total_tech_mission_count']-1 )): ?>
								<?php endif; ?>
			</div>
			<div class="w-box-content  cnt_a">
			<?php if (count($this->_tpl_vars['mission_details']) > 0): ?>
			<?php $_from = $this->_tpl_vars['mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>
				<?php $this->assign('gn_index', ($this->_foreach['misson']['iteration']-1)); ?>
				<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>	
				<div class="row-fluid">	
					<div class="mission-details">
						<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
							<div class="new-mission-product">Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_type_converted']; ?>
 <label class="label label-warning">Mission added</label></div>
						<?php else: ?>
							<div class="prod-mission-product"> Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_type_converted']; ?>
</div>
						<?php endif; ?>
						<table class="table mission-table">
							<tr>
								<th style="width:30%">Language</th>
								<th style="width:30%">Product</th>
								<th style="width:20%">Volume</th>
								<th style="width:20%">Nb of words</th>
							</tr>
							<tr class="misson-details-text">
								<td>
								<?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>															
										<?php echo $this->_tpl_vars['mission']['language_source_name']; ?>
 > 	<?php echo $this->_tpl_vars['mission']['language_dest_name']; ?>
 
									<?php else: ?>
										<?php echo $this->_tpl_vars['mission']['language_source_name']; ?>

									<?php endif; ?>
								<?php if ($this->_tpl_vars['mission']['language_difference'] == 'yes'): ?>
									</span>
								<?php endif; ?>	
								</td>
							<td>
								<?php if ($this->_tpl_vars['mission']['product_type_name']): ?> 
										<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>

									<?php else: ?>
										<?php echo $this->_tpl_vars['mission']['product_name']; ?>

								<?php endif; ?>
							</td>
							<td>
								<?php echo $this->_tpl_vars['mission']['volume']; ?>

							</td>										
							<td>
								<?php echo $this->_tpl_vars['mission']['nb_words']; ?>

							</td>
							</tr>	
						</table>
						<!--Tempo details-->
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo/quote/tempo-details.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						<?php if ($this->_tpl_vars['mission']['comments']): ?>
						<div class="media mission-comment">
							<a class="pull-left imgframe">
								<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['created_by']; ?>
/logo.jpg" class="media-object">
							</a>
							<div class="media-body">
								<h4 class="media-heading">								
									<a><?php echo $this->_tpl_vars['mission']['quote_user_name']; ?>
</a> <?php echo $this->_tpl_vars['mission']['comment_time']; ?>

								</h4>								
								<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
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
		
		<div class="mission-details">
			<div class="mission-tech-product">
					
					<?php if ($this->_tpl_vars['techmissiondetails']['title'] == "" && $this->_tpl_vars['techmissiondetails']['from_contract'] == 1): ?>
					New Tech Mission
					<input type="hidden" name="update_tech" value="1" />
					<?php else: ?>
					<input type="hidden" name="update_tech" value="0" />
					<?php endif; ?>
					<?php echo $this->_tpl_vars['techmissiondetails']['title']; ?>

					
			</div>
			<table class="table mission-table" width="100%" style="margin-bottom:0">
			<tbody>
			<tr>
				<th width="40%">Mission</th>
				<th width="30%">Delivery</th>
				<th width="30%">Cost (&<?php echo $this->_tpl_vars['techmissiondetails']['currency']; ?>
;)</th>
			</tr>
			<tr class="misson-details-text">
				<td>
				<?php $this->assign('cost_tech', false); ?><?php echo $this->_tpl_vars['cost_tech']; ?>

									<?php if ($this->_tpl_vars['techmissiondetails']['title'] == "" && $this->_tpl_vars['techmissiondetails']['from_contract'] == 1): ?>
				<?php $this->assign('cost_tech', true); ?>
				<input id="" class="span10 validate[required]" type="text" placeholder="enter a mission" value="" name="tech_title">
				<?php else: ?><?php echo $this->_tpl_vars['techmissiondetails']['title']; ?>
<?php endif; ?></td>
				<td>
				<?php if ($this->_tpl_vars['techmissiondetails']['delivery_time'] == "" && $this->_tpl_vars['techmissiondetails']['from_contract'] == 1): ?>
					<div class="span2"></div>
					<div class="span4">
						<input type="text" id="spinner" name="delivery_time" class="span12 validate[required]" value=""/>
					</div>
					<div class="span4">
						<select name="delivery_option" class="span12" id="">					
							<option value="days">Days</option>
							<option value="hours">Hours</option>									
						</select>
					</div>	
				<?php else: ?>
				<?php echo $this->_tpl_vars['techmissiondetails']['delivery_time']; ?>
<?php echo $this->_tpl_vars['techmissiondetails']['delivery_option']; ?>

				<?php endif; ?>
				</td>
				<td>
				<?php if ($this->_tpl_vars['techmissiondetails']['from_contract'] == 1 && $this->_tpl_vars['cost_tech']): ?>
				<input id="" class="span4 validate[required]" type="text" onkeyup="" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['techmissiondetails']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" name="tech_cost">
				<?php else: ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['techmissiondetails']['cost'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

				<?php endif; ?>
				</td>
			</tr>
			</tbody>
			</table>
			<div class="row-fluid" style="margin:0 0 10px 15px;">
			<div class="span12">
								
				<?php if ($this->_tpl_vars['techmissiondetails']['before_prod'] == 'yes'): ?>
				<div class="uni-checker" id="">
					<span class="uni-checked"><input type="checkbox" checked="checked" id="" name="before_prod" class="uni_style" style="opacity: 0;" disabled></span>
				</div> Doit &ecirc;tre r&eacute;alis&eacute; avant de lancer la mission
				<?php endif; ?>
				
			</div>
			</div>
		</div>
		<div class="w-box">
		<div class="w-box-header"> Brief and Comments from Quote</div>
			<div class="w-box-content cnt_a">
				<div class="row-fluid">
					<?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['comments'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['comments']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['commentst']):
        $this->_foreach['comments']['iteration']++;
?>
						<div class="media mission-comment">
							<a class="pull-left imgframe">
								<img class="media-object rd_30" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['commentst']['created_by']; ?>
/logo.jpg">
							</a>
							<div class="media-body">
								<?php if ($this->_tpl_vars['commentst']['created_name']): ?>
									<a><?php echo $this->_tpl_vars['commentst']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['commentst']['created_time']; ?>
<br>
								<?php endif; ?>
								<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['commentst']['comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

							</div>
						</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php if ($this->_tpl_vars['contractDetails']): ?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['contractMissionDetails']['updated_by']; ?>
/logo.jpg">
						</a>
						<div class="media-body">
							<a><?php echo $this->_tpl_vars['contractMissionDetails']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['contractMissionDetails']['created_time']; ?>
<br>
							<textarea name="comment" class="span12"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['contractMissionDetails']['comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</textarea>
						</div>
					</div>
					<?php else: ?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['loginuserId']; ?>
/logo.jpg">
						</a>
						<div class="media-body">
							<a><?php echo $this->_tpl_vars['flname']; ?>
</a><br>
							<textarea name="comment" class="span12"></textarea>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<br>
				<div>
				<?php if ($this->_tpl_vars['quotefiles'] || $this->_tpl_vars['files']): ?>
					<p><strong>Related Files</strong></p>
					<div class="pull-right" style="margin-bottom:5px">
						<a href="/quote/download-document?type=cm_tech&index=-1&quote_id=<?php echo $this->_tpl_vars['contract_details']['quoteid']; ?>
&mission_id=<?php echo $this->_tpl_vars['seotechprodid']; ?>
" class="btn btn-small zipdownload">Download Zip</a>
					</div>
					<table class="onsuccessrepquote table">
					<?php echo $this->_tpl_vars['quotefiles']; ?>

					</table>
					<table class="onsuccessrep table">
					<?php echo $this->_tpl_vars['files']; ?>

					</table>
				<?php endif; ?>
					<br>
					<input type="file" name="seo_documents[]" accept="doc|xls|zip|docx|xlsx" class="multi" id=""/>
				</div>
			</div>
		</div>
		
		<div class="well wbg well-large">
			<h3>Assignment</h3><p>Which folk is going to be the Owner?</p>

				<div class="row-fluid">
					<div class="span8">
					<?php if ($this->_tpl_vars['contractDetails']): ?>
						<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
						<div class="assignuser pull-left">
							<img class="media-object rd_30" height="50" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['row']['identifier']; ?>
/logo.jpg">
							<?php if ($this->_tpl_vars['row']['first_name'] || $this->_tpl_vars['row']['last_name']): ?><p><?php echo $this->_tpl_vars['row']['first_name']; ?>
&nbsp;</p><?php else: ?><br/><?php endif; ?>
							<input type="radio" class="validate[required] <?php if ($this->_tpl_vars['techmissiondetails']['techfreeMission'] == '1'): ?>freelance <?php endif; ?>" name="assignuser" <?php if ($this->_tpl_vars['contractMissionDetails']['assigned_to'] == $this->_tpl_vars['row']['identifier']): ?> checked="checked" <?php endif; ?> value="<?php echo $this->_tpl_vars['row']['identifier']; ?>
" />
													</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
					<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
					<div class="assignuser pull-left">
						<img class="media-object rd_30" height="50px" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['row']['identifier']; ?>
/logo.jpg">
						<?php if ($this->_tpl_vars['row']['first_name'] || $this->_tpl_vars['row']['last_name']): ?><p><?php echo $this->_tpl_vars['row']['first_name']; ?>
&nbsp;</p><?php else: ?><br/><?php endif; ?>
						 <input type="radio" class="validate[required] <?php if ($this->_tpl_vars['techmissiondetails']['techfreeMission'] == '1'): ?>freelance <?php endif; ?>" name="assignuser" value="<?php echo $this->_tpl_vars['row']['identifier']; ?>
" />
											</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
				</div>
						<?php echo smarty_function_math(array('equation' => '(x*y)','assign' => 'mission_totalcost','x' => $this->_tpl_vars['techmissiondetails']['cost'],'y' => $this->_tpl_vars['techmissiondetails']['volume']), $this);?>

						<div class="span4">
							<div class="<?php if ($this->_tpl_vars['contractMissionDetails']['assigned_to']): ?><?php else: ?> hidden<?php endif; ?> freelance-section well">
							
								<legend>External Mission</legend>
								<label class="radio inline">
									<input type="radio" name="freelance_mission" value="yes" <?php if ($this->_tpl_vars['contractMissionDetails']['external_mission'] == 'yes'): ?>checked="checked"<?php endif; ?>> Oui&nbsp;</input>
								</label>
								<label class="radio inline">
									<input type="radio" name="freelance_mission"  value="no" <?php if ($this->_tpl_vars['contractMissionDetails']['external_mission'] != 'yes'): ?>checked="checked" <?php endif; ?>> Non</input>
								</label>


								<div class="freelance-yes <?php if ($this->_tpl_vars['contractMissionDetails']['external_mission'] != 'yes'): ?>hidden <?php endif; ?>">
									
									<label><br>Name</label>
								 
										<input type="text" name="freelacename" class="span8" value="<?php echo $this->_tpl_vars['contractMissionDetails']['freelance_name']; ?>
" />
								
								</div>
								<div class="freelance-yes <?php if ($this->_tpl_vars['contractMissionDetails']['external_mission'] != 'yes'): ?>hidden <?php endif; ?>">

									
									<label><br>Cost</label>
									
									<div class="input-append" style="white-space:normal!important;">
										<input type="text" name="freelacecost" class="validate[required] <?php if ($this->_tpl_vars['mission_totalcost']): ?>,maxWriters[<?php echo $this->_tpl_vars['mission_totalcost']; ?>
]<?php endif; ?> span10 " value="<?php if ($this->_tpl_vars['contractMissionDetails']['freelance_cost']): ?><?php echo $this->_tpl_vars['contractMissionDetails']['freelance_cost']; ?>
<?php else: ?><?php echo $this->_tpl_vars['mission_totalcost']; ?>
<?php endif; ?>" /> <span class="add-on">&<?php echo $this->_tpl_vars['techmissiondetails']['currency']; ?>
; </span>
									</div>
								</div>
							</div>
						</div>
				</div>
</div>

		
	<?php endif; ?>
	
		<?php if ($this->_tpl_vars['type'] == 'staff'): ?>
	<?php if ($this->_tpl_vars['contractDetails']): ?>
		<input type="hidden" name="contractmissionid" value="<?php echo $this->_tpl_vars['contractMissionDetails']['contractmissionid']; ?>
" />
		<input type="hidden" name="assigned_user" value="<?php echo $this->_tpl_vars['contractMissionDetails']['assigned_to']; ?>
" />
	<?php else: ?>
	<div class="alert <?php if ($this->_tpl_vars['staffMissionDetails']['before_prod'] != 'yes'): ?> alert-info <?php endif; ?>">
		<a class="close" data-dismiss="alert">&times;</a>
		A <strong>Staff Mission <?php if ($this->_tpl_vars['staffMissionDetails']['before_prod'] == 'yes'): ?> Blocker <?php endif; ?></strong>
		is expected now, please assign it to someone in your team
	</div>
	<?php endif; ?>
	<div class="w-box" style="margin-bottom:15px">
		<div class="w-box-header">
		<?php if ($this->_tpl_vars['current_index'] != 0): ?>
						<?php endif; ?>
		Missions list
		<?php if ($this->_tpl_vars['current_index'] < ( $this->_tpl_vars['total_tech_mission_count']-1 )): ?>
						<?php endif; ?>
		</div>
		<div class="w-box-content  cnt_a">
		<?php if (count($this->_tpl_vars['mission_details']) > 0): ?>
		<?php $_from = $this->_tpl_vars['mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>
			<?php $this->assign('gn_index', ($this->_foreach['misson']['iteration']-1)); ?>
			<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>	
			<div class="row-fluid">	
				<div class="mission-details">
					<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
						<div class="new-mission-product">Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_type_converted']; ?>
 <label class="label label-warning">Mission added</label></div>
					<?php else: ?>
						<div class="prod-mission-product"> Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_type_converted']; ?>
</div>
					<?php endif; ?>
					<table class="table mission-table">
						<tr>
							<th style="width:30%">Language</th>
							<th style="width:30%">Product</th>
							<th style="width:20%">Volume</th>
							<th style="width:20%">Nb of Words</th>
						</tr>
						<tr class="misson-details-text">
							<td>
							<?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>															
									<?php echo $this->_tpl_vars['mission']['language_source_name']; ?>
 > 	<?php echo $this->_tpl_vars['mission']['language_dest_name']; ?>
 
								<?php else: ?>
									<?php echo $this->_tpl_vars['mission']['language_source_name']; ?>

								<?php endif; ?>
							<?php if ($this->_tpl_vars['mission']['language_difference'] == 'yes'): ?>
								</span>
							<?php endif; ?>	
							</td>
						<td>
							<?php if ($this->_tpl_vars['mission']['product_type_name']): ?> 
									<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>

								<?php else: ?>
									<?php echo $this->_tpl_vars['mission']['product_name']; ?>

							<?php endif; ?>
						</td>
						<td>
							<?php echo $this->_tpl_vars['mission']['volume']; ?>

						</td>										
						<td>
							<?php echo $this->_tpl_vars['mission']['nb_words']; ?>

						</td>
						</tr>	
					</table>
					<?php if ($this->_tpl_vars['mission']['comments']): ?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['created_by']; ?>
/logo.jpg" class="media-object">
						</a>
						<div class="media-body">
							<h4 class="media-heading">								
								<a><?php echo $this->_tpl_vars['mission']['quote_user_name']; ?>
</a> <?php echo $this->_tpl_vars['mission']['comment_time']; ?>

							</h4>								
							<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
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
	<div class="mission-details">
		<div class="mission-tech-product">
				<?php if ($this->_tpl_vars['staffMissionDetails']['title'] == ""): ?>
				New Staff Mission
				<input type="hidden" name="update_staff" value="1" />
				<?php else: ?>
				<input type="hidden" name="update_staff" value="0" />
				<?php endif; ?>
				<?php echo $this->_tpl_vars['staffMissionDetails']['title']; ?>

		</div>
		<table class="table mission-table" width="100%" style="margin-bottom:0">
		<tbody>
		<tr>
			<th width="40%">Mission</th>
			<th width="30%">Delivery</th>
			<th width="30%">Cost (&<?php echo $this->_tpl_vars['staffMissionDetails']['currency']; ?>
;)</th>
		</tr>
		<tr class="misson-details-text">
			<td>
			<?php $this->assign('cost_tech', false); ?><?php echo $this->_tpl_vars['cost_tech']; ?>

			<?php if ($this->_tpl_vars['staffMissionDetails']['title'] == ""): ?>
			<?php $this->assign('cost_tech', true); ?>
			<input id="" class="span10 validate[required]" type="text" placeholder="enter a mission" value="" name="staff_title">
			<?php else: ?><?php echo $this->_tpl_vars['staffMissionDetails']['title']; ?>
<?php endif; ?></td>
			<td>
			<?php if ($this->_tpl_vars['cost_tech']): ?>
				<div class="span2"></div>
				<div class="span4">
					<input type="text" id="spinner" name="delivery_time" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['staffMissionDetails']['delivery_time']; ?>
"/>
				</div>
				<div class="span4">
					<select name="delivery_option" class="span12" id="">					
						<option value="days" <?php if ($this->_tpl_vars['staffMissionDetails']['delivery_option'] == 'days'): ?> selected<?php endif; ?>>Days</option>
						<option value="hours" <?php if ($this->_tpl_vars['staffMissionDetails']['delivery_option'] == 'hours'): ?> selected<?php endif; ?>>Hours</option>									
					</select>
				</div>	
			<?php else: ?>
			<?php echo $this->_tpl_vars['staffMissionDetails']['delivery_time']; ?>
<?php echo $this->_tpl_vars['staffMissionDetails']['delivery_option']; ?>

			<?php endif; ?>
			</td>
			<td>
			<?php if ($this->_tpl_vars['cost_tech']): ?>
			<input id="" class="span4 validate[required]" type="text" onkeyup="" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['staffMissionDetails']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" name="staff_cost">
			<?php else: ?>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['staffMissionDetails']['cost'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

			<?php endif; ?>
			</td>
		</tr>
		</tbody>
		</table>
		<div class="row-fluid" style="margin:0 0 10px 15px;">
		<div class="span12">
						<?php if ($this->_tpl_vars['staffMissionDetails']['before_prod'] == 'yes'): ?>
			<div class="uni-checker" id="">
				<span class="uni-checked"><input type="checkbox" checked="checked" id="" name="before_prod" class="uni_style" style="opacity: 0;" disabled></span>
			</div> Should be performed before starting the mission
			<?php endif; ?>
		</div>
		</div>
	</div>
	<div class="w-box">
	<div class="w-box-header"> Brief and Comments from Quote</div>
		<div class="w-box-content cnt_a">
			<div class="row-fluid">
								<?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['comments'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['comments']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['commentst']):
        $this->_foreach['comments']['iteration']++;
?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['commentst']['created_by']; ?>
/logo.jpg">
						</a>
						<div class="media-body">
							<?php if ($this->_tpl_vars['commentst']['created_name']): ?>
								<a><?php echo $this->_tpl_vars['commentst']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['commentst']['created_time']; ?>
<br>
							<?php endif; ?>
							<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['commentst']['comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

						</div>
					</div>
				<?php endforeach; endif; unset($_from); ?>
				<?php if ($this->_tpl_vars['contractDetails']): ?>
				<div class="media mission-comment">
					<a class="pull-left imgframe">
						<img class="media-object rd_30" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['contractMissionDetails']['updated_by']; ?>
/logo.jpg">
					</a>
					<div class="media-body">
						<a><?php echo $this->_tpl_vars['contractMissionDetails']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['contractMissionDetails']['created_time']; ?>
<br>
						<textarea name="comment" class="span12"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['contractMissionDetails']['comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</textarea>
					</div>
				</div>
				<?php else: ?>
				<div class="media mission-comment">
					<a class="pull-left imgframe">
						<img class="media-object rd_30" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['loginuserId']; ?>
/logo.jpg">
					</a>
					<div class="media-body">
						<a><?php echo $this->_tpl_vars['flname']; ?>
</a><br>
						<textarea name="comment" class="span12"></textarea>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<br>
			<div>
			<?php if ($this->_tpl_vars['quotefiles'] || $this->_tpl_vars['files']): ?>
				<p><strong>Related Files</strong></p>
				<div class="pull-right" style="margin-bottom:5px">
					<a href="/quote/download-document?type=cm_staff&index=-1&quote_id=<?php echo $this->_tpl_vars['contract_details']['quoteid']; ?>
&mission_id=<?php echo $this->_tpl_vars['seotechprodid']; ?>
" class="btn btn-small zipdownload">Download Zip</a>
				</div>
				<table class="onsuccessrepquote table">
				<?php echo $this->_tpl_vars['quotefiles']; ?>

				</table>
				<table class="onsuccessrep table">
				<?php echo $this->_tpl_vars['files']; ?>

				</table>
			<?php endif; ?>
				<br>
				<input type="file" name="seo_documents[]" accept="doc|xls|zip|docx|xlsx" class="multi" id=""/>
			</div>
		</div>
	</div>
	<div class="well wbg well-large">
		<h3>Assignment</h3><p>Which folk is going to be the Owner?</p>
			<div class="row-fluid">
				<?php if ($this->_tpl_vars['contractDetails']): ?>
					<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
					<div class="assignuser pull-left">
						<img class="media-object rd_30" height="50" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['row']['identifier']; ?>
/logo.jpg">
						<?php if ($this->_tpl_vars['row']['first_name'] || $this->_tpl_vars['row']['last_name']): ?><p><?php echo $this->_tpl_vars['row']['first_name']; ?>
&nbsp;</p><?php else: ?><br/><?php endif; ?>
						<input type="radio" class="validate[required]" name="assignuser" <?php if ($this->_tpl_vars['contractMissionDetails']['assigned_to'] == $this->_tpl_vars['row']['identifier']): ?> checked="checked" <?php endif; ?> value="<?php echo $this->_tpl_vars['row']['identifier']; ?>
" />
											</div>
				<?php endforeach; endif; unset($_from); ?>
				<?php else: ?>
				<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
				<div class="assignuser pull-left">
					<img class="media-object rd_30" height="50px" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['row']['identifier']; ?>
/logo.jpg">
					<?php if ($this->_tpl_vars['row']['first_name'] || $this->_tpl_vars['row']['last_name']): ?><p><?php echo $this->_tpl_vars['row']['first_name']; ?>
&nbsp;</p><?php else: ?><br/><?php endif; ?>
					 <input type="radio" class="validate[required]" name="assignuser" value="<?php echo $this->_tpl_vars['row']['identifier']; ?>
" />
									</div>
				<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
			</div>
	</div>
	<?php endif; ?>
		
		<?php if ($this->_tpl_vars['type'] == 'seo'): ?>
		<?php if ($this->_tpl_vars['contractDetails']): ?>
			<input type="hidden" name="contractmissionid" value="<?php echo $this->_tpl_vars['contractMissionDetails']['contractmissionid']; ?>
" />
			<input type="hidden" name="assigned_user" value="<?php echo $this->_tpl_vars['contractMissionDetails']['assigned_to']; ?>
" />
		<?php else: ?>
		<div class="alert <?php if ($this->_tpl_vars['seoMissionDetails']['before_prod'] != 'yes'): ?> alert-info <?php endif; ?>">
			<a class="close" data-dismiss="alert">&times;</a>
			A <strong>SEO Mission <?php if ($this->_tpl_vars['seoMissionDetails']['before_prod'] == 'yes'): ?> Blocker <?php endif; ?></strong>
			is expected now, please assign it to someone in the team
		</div>
		<?php endif; ?>
		
		<div class="w-box" style="margin-bottom:15px">
			<div class="w-box-header">
			<?php if ($this->_tpl_vars['current_index'] != 0): ?>
							<?php endif; ?>
			Missions list
			<?php if ($this->_tpl_vars['current_index'] < ( $this->_tpl_vars['total_seo_mission_count']-1 )): ?>
							<?php endif; ?>
			</div>
			<div class="w-box-content  cnt_a">
			<?php if (count($this->_tpl_vars['mission_details']) > 0): ?>
			<?php $_from = $this->_tpl_vars['mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>
				<?php $this->assign('gn_index', ($this->_foreach['misson']['iteration']-1)); ?>
				<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>	
				<div class="row-fluid">	
					<div class="mission-details">
						<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
							<div class="new-mission-product">Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_type_converted']; ?>
 <label class="label label-warning">Mission added</label></div>
						<?php else: ?>
							<div class="prod-mission-product"> Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_type_converted']; ?>
</div>
						<?php endif; ?>
						<table class="table mission-table">
							<tr>
								<th style="width:30%">Language</th>
								<th style="width:30%">Product</th>
								<th style="width:20%">Volume</th>
								<th style="width:20%">Nb of words</th>
							</tr>
							<tr class="misson-details-text">
								<td>
								<?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>															
										<?php echo $this->_tpl_vars['mission']['language_source_name']; ?>
 > 	<?php echo $this->_tpl_vars['mission']['language_dest_name']; ?>
 
									<?php else: ?>
										<?php echo $this->_tpl_vars['mission']['language_source_name']; ?>

									<?php endif; ?>
								<?php if ($this->_tpl_vars['mission']['language_difference'] == 'yes'): ?>
									</span>
								<?php endif; ?>	
								</td>
							<td>
								<?php if ($this->_tpl_vars['mission']['product_type_name']): ?> 
										<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>

									<?php else: ?>
										<?php echo $this->_tpl_vars['mission']['product_name']; ?>

								<?php endif; ?>
							</td>
							<td>
								<?php echo $this->_tpl_vars['mission']['volume']; ?>

							</td>										
							<td>
								<?php echo $this->_tpl_vars['mission']['nb_words']; ?>

							</td>
							</tr>	
						</table>
						<!--Tempo details-->
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo/quote/tempo-details.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						<?php if ($this->_tpl_vars['mission']['comments']): ?>
						<div class="media mission-comment">
							<a class="pull-left imgframe">
								<img width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['created_by']; ?>
/logo.jpg" class="media-object rd_30">
							</a>
							<div class="media-body">
								<h4 class="media-heading">								
									<a><?php echo $this->_tpl_vars['mission']['quote_user_name']; ?>
</a> <?php echo $this->_tpl_vars['mission']['comment_time']; ?>

								</h4>								
								<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
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
		
		
		<div class="mission-details">
			<div class="mission-seo-product">
					SEO proposal<?php echo $this->_tpl_vars['current_index']+1; ?>

			</div>
			<table class="table mission-table" width="100%" style="margin-bottom:0">
			<tbody>
			<tr>
				<th style="width:25%">Type</th>
				<th style="width:25%">Language</th>
				<th <?php if ($this->_tpl_vars['seoMissionDetails']['product'] == 'seo_audit' || $this->_tpl_vars['seoMissionDetails']['product'] == 'smo_audit' || $this->_tpl_vars['seoMissionDetails']['product'] == 'content_strategy'): ?> style="width:30%" <?php else: ?> style="display:none;width:30%"<?php endif; ?>>Delivery timing</th>														
				<th <?php if ($this->_tpl_vars['seoMissionDetails']['product'] == 'seo_audit' || $this->_tpl_vars['seoMissionDetails']['product'] == 'smo_audit' || $this->_tpl_vars['seoMissionDetails']['product'] == 'content_strategy'): ?> style="width:20%" <?php else: ?> style="display:none;width:20%"<?php endif; ?>>Co&ucirc;t (&<?php echo $this->_tpl_vars['quote_details']['sales_suggested_currency']; ?>
;)</th>
				<th <?php if ($this->_tpl_vars['seoMissionDetails']['product'] == 'seo_audit' || $this->_tpl_vars['seoMissionDetails']['product'] == 'smo_audit' || $this->_tpl_vars['seoMissionDetails']['product'] == 'content_strategy'): ?> style="display:none;width:35%"<?php else: ?> style="width:35%" <?php endif; ?>>Product type</th>
				<th <?php if ($this->_tpl_vars['seoMissionDetails']['product'] == 'seo_audit' || $this->_tpl_vars['seoMissionDetails']['product'] == 'smo_audit' || $this->_tpl_vars['seoMissionDetails']['product'] == 'content_strategy'): ?> style="display:none;width:15%"<?php else: ?> style="width:15%" <?php endif; ?>>Nb of words</th>
			</tr>
			<tr class="misson-details-text">
				<td><?php echo $this->_tpl_vars['seoMissionDetails']['productc']; ?>
</td>
				<td><?php if ($this->_tpl_vars['seoMissionDetails']['product'] == 'translation'): ?><?php echo $this->_tpl_vars['seoMissionDetails']['language_source_converted']; ?>
&nbsp;>&nbsp;<?php echo $this->_tpl_vars['seoMissionDetails']['language_dest_converted']; ?>
<?php else: ?><?php echo $this->_tpl_vars['seoMissionDetails']['language_source_converted']; ?>
<?php endif; ?></td>
				<td><?php if ($this->_tpl_vars['seoMissionDetails']['product'] == 'seo_audit' || $this->_tpl_vars['seoMissionDetails']['product'] == 'smo_audit' || $this->_tpl_vars['seoMissionDetails']['product'] == 'content_strategy'): ?><?php echo $this->_tpl_vars['seoMissionDetails']['mission_length']; ?>
<?php echo $this->_tpl_vars['seoMissionDetails']['mission_length_option']; ?>
<?php else: ?><?php echo $this->_tpl_vars['seoMissionDetails']['typec']; ?>
<?php endif; ?></td>
				<td><?php if ($this->_tpl_vars['seoMissionDetails']['product'] == 'seo_audit' || $this->_tpl_vars['seoMissionDetails']['product'] == 'smo_audit' || $this->_tpl_vars['seoMissionDetails']['product'] == 'content_strategy'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['seoMissionDetails']['cost'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
<?php else: ?><?php echo $this->_tpl_vars['seoMissionDetails']['nb_words']; ?>
<?php endif; ?></td>
			</tr>
			</tbody>
			</table>
			<div class="row-fluid" style="margin:0 0 10px 15px;">
			<div class="span12">
			<?php if ($this->_tpl_vars['seoMissionDetails']['before_prod'] == 'yes'): ?>
				<div class="uni-checker" id="">
				<span class="uni-checked"><input type="checkbox" checked="checked" id="" name="before_prod" class="uni_style" style="opacity: 0;" disabled></span>
				</div> Doit &ecirc;tre r&eacute;alis&eacute; avant de lancer la mission
			<?php endif; ?>
					
			</div>
			</div>
		</div>
		
		<div class="w-box">
		<div class="w-box-header"> Brief and Comments from Quote</div>
			<div class="w-box-content cnt_a">
				<div class="row-fluid">
					
				
					<?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['comments'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['comments']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['commentst']):
        $this->_foreach['comments']['iteration']++;
?>
						<div class="media mission-comment">
							<a class="pull-left imgframe">
								<img class="media-object rd_30" width="50"  src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['commentst']['created_by']; ?>
/logo.jpg">
							</a>
							<div class="media-body">
								<?php if ($this->_tpl_vars['commentst']['created_name']): ?>
									<a><?php echo $this->_tpl_vars['commentst']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['commentst']['created_time']; ?>
<br>
								<?php endif; ?>
								<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['commentst']['comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

							</div>
						</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php if ($this->_tpl_vars['contractDetails']): ?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50"  src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['contractMissionDetails']['updated_by']; ?>
/logo.jpg">
						</a>
						<div class="media-body">
							<a><?php echo $this->_tpl_vars['contractMissionDetails']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['contractMissionDetails']['created_time']; ?>
<br>
							<textarea name="comment" class="span12"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['contractMissionDetails']['comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</textarea>
						</div>
					</div>
					<?php else: ?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50"  src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['loginuserId']; ?>
/logo.jpg">
						</a>
						<div class="media-body">
							<a><?php echo $this->_tpl_vars['flname']; ?>
</a><br>
							<textarea name="comment" class="span12"></textarea>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<br>
				
				<div>
				<?php if ($this->_tpl_vars['quotefiles'] || $this->_tpl_vars['files']): ?>
					<h4>Related Files</h4>
					<div class="pull-right" style="margin-bottom:5px">
						<a href="/quote/download-document?type=cm_seo&index=-1&quote_id=<?php echo $this->_tpl_vars['contract_details']['quoteid']; ?>
&mission_id=<?php echo $this->_tpl_vars['seotechprodid']; ?>
" class="btn btn-small zipdownload">Download Zip</a>
					</div>
					<table class="onsuccessrepquote table">
					<?php echo $this->_tpl_vars['quotefiles']; ?>

					</table>
					<table width="100%" class="onsuccessrep table">
					<?php echo $this->_tpl_vars['files']; ?>

					</table>
				<?php endif; ?>
					<br>
					<input type="file" name="seo_documents[]" accept="doc|xls|zip|docx|xlsx" class="multi" id=""/>
				</div>
				
			</div>
		</div>
		<div class="w-box">
			<div class="well wbg well-large">
			<h2>Assignment</h2><p>Which folk is going to be the Owner?</p>

				<div class="row-fluid">
					<div class="span8">
					<?php if ($this->_tpl_vars['contractDetails']): ?>
						<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
						<div class="assignuser pull-left">
							<img class="media-object rd_30" height="50" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['row']['identifier']; ?>
/logo.jpg">
							<?php if ($this->_tpl_vars['row']['first_name'] || $this->_tpl_vars['row']['last_name']): ?><p><?php echo $this->_tpl_vars['row']['first_name']; ?>
&nbsp;</p><?php else: ?><br/><?php endif; ?>
							<input type="radio" class="validate[required] freelance" name="assignuser" <?php if ($this->_tpl_vars['contractMissionDetails']['assigned_to'] == $this->_tpl_vars['row']['identifier']): ?> checked="checked" <?php endif; ?> value="<?php echo $this->_tpl_vars['row']['identifier']; ?>
" />
													</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
					<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
					<div class="assignuser pull-left">
						<img class="media-object rd_30" height="50" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['row']['identifier']; ?>
/logo.jpg">
						<?php if ($this->_tpl_vars['row']['first_name'] || $this->_tpl_vars['row']['last_name']): ?><p><?php echo $this->_tpl_vars['row']['first_name']; ?>
&nbsp;</p><?php else: ?><br/><?php endif; ?>
						<input type="radio" class="freelance validate[required]" name="assignuser" value="<?php echo $this->_tpl_vars['row']['identifier']; ?>
" />
											</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					</div>
					<div class="span4">
						<div class="<?php if ($this->_tpl_vars['contractMissionDetails']['assigned_to']): ?><?php else: ?> hidden<?php endif; ?> freelance-section well">
						<legend>External Mission</legend>
						<label class="radio inline">
							<input type="radio" name="freelance_mission" value="yes" <?php if ($this->_tpl_vars['contractMissionDetails']['external_mission'] == 'yes'): ?>checked="checked"<?php endif; ?>> Oui&nbsp;</input>
						</label>
						<label class="radio inline">
							<input type="radio" name="freelance_mission"  value="no" <?php if ($this->_tpl_vars['contractMissionDetails']['external_mission'] != 'yes'): ?>checked="checked" <?php endif; ?>> Non</input>
						</label>

							<div class="freelance-yes <?php if ($this->_tpl_vars['contractMissionDetails']['external_mission'] != 'yes'): ?>hidden <?php endif; ?>">
								
								<label><br>Name</label>
							 
								<input type="text" name="freelacename" class="span8" value="<?php echo $this->_tpl_vars['contractMissionDetails']['freelance_name']; ?>
" />
							
							</div>
							<div class="freelance-yes <?php if ($this->_tpl_vars['contractMissionDetails']['external_mission'] != 'yes'): ?>hidden <?php endif; ?>">

							
							<label><br>Cost</label>
							
							<div class="input-append" style="white-space:normal!important;">
							<input type="text" name="freelacecost" class="validate[required] <?php if ($this->_tpl_vars['seoMissionDetails']['internal_cost']): ?>,maxWriters[<?php echo $this->_tpl_vars['seoMissionDetails']['internal_cost']; ?>
]<?php endif; ?> span10 " value="<?php if ($this->_tpl_vars['contractMissionDetails']['freelance_cost'] && $this->_tpl_vars['contractMissionDetails']['freelance_cost'] != '0.00'): ?><?php echo $this->_tpl_vars['contractMissionDetails']['freelance_cost']; ?>
<?php else: ?><?php echo $this->_tpl_vars['seoMissionDetails']['internal_cost']; ?>
<?php endif; ?>" /> <span class="add-on">&<?php echo $this->_tpl_vars['seoMissionDetails']['sales_suggested_currency']; ?>
;</span>
							</div>
						</div>

					</div>
				</div>	

					
				</div>
			</div>
		</div>
	<?php endif; ?>
			<?php if ($this->_tpl_vars['type'] == 'prod'): ?>
		<?php if ($this->_tpl_vars['contractDetails']): ?>
		
			<input type="hidden" name="contractmissionid" value="<?php echo $this->_tpl_vars['contractMissionDetails']['contractmissionid']; ?>
" />
			<input type="hidden" name="assigned_user" value="<?php echo $this->_tpl_vars['contractMissionDetails']['assigned_to']; ?>
" />
		<?php else: ?>
		<div class="alert alert-info">
			<a class="close" data-dismiss="alert">&times;</a>
			A <strong>Prod Mission</strong> is expected now, please assign it to someone in your team
		</div>
		<?php endif; ?>	
		
		<div class="mission-details">
				
				<div class="prod-mission-product">
				<?php if ($this->_tpl_vars['current_index'] != 0): ?>
								<?php endif; ?>
				<?php echo $this->_tpl_vars['prod_mission_details']['mission_title']; ?>
 <?php echo $this->_tpl_vars['prod_mission_details']['product_type_other']; ?>

				<?php if ($this->_tpl_vars['current_index'] < ( $this->_tpl_vars['total_prod_mission_count']-1 )): ?>
								<?php endif; ?>
				</div>
				<table class="table mission-table">
					<tr>
						<th style="width:30%">Language</th>
						<th style="width:30%">Product</th>
						<th style="width:20%">Volume</th>
						<th style="width:20%">Nb of words</th>
					</tr>
					<tr class="misson-details-text">
						<td><?php echo $this->_tpl_vars['prod_mission_details']['language_source_name']; ?>
 <?php if ($this->_tpl_vars['prod_mission_details']['product'] == 'translation'): ?>><?php echo $this->_tpl_vars['prod_mission_details']['language_dest_name']; ?>
<?php endif; ?></td>
						<td><?php echo $this->_tpl_vars['prod_mission_details']['product_type_name']; ?>
</td>
						<td><?php echo $this->_tpl_vars['prod_mission_details']['volume']; ?>
</td>
						<td><?php echo $this->_tpl_vars['prod_mission_details']['nb_words']; ?>
</td>
					</tr>	
				</table>
				<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['prod_mission_details']['identifier']; ?>
">
										<?php if ($this->_tpl_vars['prod_mission_details']['oneshot'] == 'yes' || $this->_tpl_vars['prod_mission_details']['oneshot'] == 'no'): ?>
					<div class="row-fluid" >
					<?php $this->assign('_tempo_value', $this->_tpl_vars['prod_mission_details']['tempo']); ?>
					<?php $this->assign('_delivery_volume_option', $this->_tpl_vars['prod_mission_details']['delivery_volume_option']); ?>
					<?php $this->assign('_tempo_length_option', $this->_tpl_vars['prod_mission_details']['tempo_length_option']); ?>
					<div class="mission-details" style="margin:5px">
						<div class="mission-prod-product">
							<span>Tempo Details</span>
						</div>
						<div class="row-fluid">								
							<label class="span3 moveright">Staffing set up</label>
							<div class="span3">
								<div class="span4">
									<h4>
									<?php if ($this->_tpl_vars['prod_mission_details']['staff_time']): ?>
										<?php echo $this->_tpl_vars['prod_mission_details']['staff_time']; ?>

										<?php if ($this->_tpl_vars['prod_mission_details']['staff_time_option'] == 'days'): ?> Days <?php else: ?> Hours <?php endif; ?>
									<?php else: ?>
										/
									<?php endif; ?> 
									</h4>
								</div>
							</div>	
						</div>	
						<?php if ($this->_tpl_vars['prod_mission_details']['oneshot']): ?>
							<div class="row-fluid">								
								<label class="span3 moveright">One shot</label>
								<div class="span3">
									<h4>
									<?php if ($this->_tpl_vars['prod_mission_details']['oneshot'] == 'yes'): ?>
										Yes
									<?php else: ?>
										No
									<?php endif; ?>
									</h4>
								</div>
							</div>
						<?php endif; ?>
						<div class="row-fluid">								
							<label class="span3 moveright">Mission Duration</label>
						
							<?php if ($this->_tpl_vars['prod_mission_details']['duration_dont_know'] == 'yes' && $this->_tpl_vars['prod_mission_details']['mission_length'] == '0'): ?> 															
								<div class="span8">
									<h4>* Duration not specified by sales</h4>																
								</div>
								<?php else: ?>
							<div class="span3">
								<div class="span6">
									<h4><?php echo $this->_tpl_vars['prod_mission_details']['mission_length']; ?>
 <?php if ($this->_tpl_vars['prod_mission_details']['mission_length_option'] == 'days'): ?> Days <?php else: ?> Hours <?php endif; ?></h4>
								</div>													
							</div>
							<?php if ($this->_tpl_vars['prod_mission_details']['duration_dont_know'] == 'yes'): ?> 															
									<div class="span4" style="margin-left: 0px">
										* Duration not specified by sales																
									</div>
								<?php endif; ?>
							<?php endif; ?>
						</div>
						<?php if ($this->_tpl_vars['prod_mission_details']['oneshot'] == 'no'): ?>
							<div class="row-fluid">								
								<label class="span3 moveright">Volume</label>														
								<div class="span9" id="tempo_details_<?php echo $this->_tpl_vars['prod_mission_details']['identifier']; ?>
" <?php if ($this->_tpl_vars['prod_mission_details']['oneshot'] == 'yes'): ?> style="display:none" <?php endif; ?>>
									<div class="span4">		
										<h4>
											<?php echo $this->_tpl_vars['prod_mission_details']['volume_max']; ?>
 <?php echo $this->_tpl_vars['tempo_array'][$this->_tpl_vars['_tempo_value']]; ?>
 <?php echo $this->_tpl_vars['volume_option_array'][$this->_tpl_vars['_delivery_volume_option']]; ?>
 <?php echo $this->_tpl_vars['prod_mission_details']['tempo_length']; ?>
 <?php echo $this->_tpl_vars['tempo_duration_array'][$this->_tpl_vars['_tempo_length_option']]; ?>

										</h4>	
									</div>														
								</div>
							</div>
						<?php endif; ?>	
					</div>
					</div>
					<?php endif; ?>
									
					<?php if (count($this->_tpl_vars['prod_mission_details']['prod_missions']) > 0): ?>
						<?php $_from = $this->_tpl_vars['prod_mission_details']['prod_missions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['prod_mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prod_mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['prod_misson']):
        $this->_foreach['prod_mission']['iteration']++;
?>
							<?php $this->assign('pr_index', ($this->_foreach['prod_mission']['iteration']-1)+1); ?>
							<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">
								<div class="mission-details" style="margin:5px">
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
									<table class="table mission-table">
										<tr>
											<th style="width:12%">Nb of writers</th>					
																						<th style="width:19%">Cost/product</th>
																					</tr>				
										<tr class="misson-details-text">
											<td><?php echo $this->_tpl_vars['prod_misson']['staff']; ?>
</td>
																						
											<td><?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['cost'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['prod_misson']['currency']; ?>
;</td>											
																					</tr>
																			</table>
									<?php if ($this->_tpl_vars['prod_misson']['comments']): ?>
									<div class="media mission-comment">
										<a class="pull-left imgframe">
											<img height="50px" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['prod_misson']['created_by']; ?>
/logo.jpg" class="media-object rd_30">
										</a>
										<div class="media-body">
											<h4 class="media-heading">								
												<a><?php echo $this->_tpl_vars['prod_misson']['prod_user_name']; ?>
</a> <?php echo $this->_tpl_vars['prod_misson']['comment_time']; ?>

											</h4>
											<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod_misson']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
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
		
		<div class="well wbg well-large">
		<h3> Brief and Comments from Quote</h3>
			
				<div class="row-fluid">
					
				
					<?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['comments'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['comments']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['commentst']):
        $this->_foreach['comments']['iteration']++;
?>
						<div class="media mission-comment">
							<a class="pull-left imgframe">
								<img class="media-object rd_30" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['commentst']['created_by']; ?>
/logo.jpg">
							</a>
							<div class="media-body">
								<?php if ($this->_tpl_vars['commentst']['created_name']): ?>
									<a><?php echo $this->_tpl_vars['commentst']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['commentst']['created_time']; ?>
<br>
								<?php endif; ?>
								<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['commentst']['comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

							</div>
						</div>
					<?php endforeach; endif; unset($_from); ?>
				
					<?php if ($this->_tpl_vars['contractDetails']): ?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['contractMissionDetails']['updated_by']; ?>
/logo.jpg">
						</a>
						<div class="media-body">
							<a><?php echo $this->_tpl_vars['contractMissionDetails']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['contractMissionDetails']['created_time']; ?>
<br>
							<textarea name="comment" class="span12"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['contractMissionDetails']['comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</textarea>
						</div>
					</div>
					<?php else: ?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['loginuserId']; ?>
/logo.jpg">
						</a>
						<div class="media-body">
							<a><?php echo $this->_tpl_vars['flname']; ?>
</a><br>
							<textarea name="comment" class="span12"></textarea>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<?php if ($this->_tpl_vars['quotefiles']): ?>
				<div class="row-fluid">
					<h4>Related Files</h4>
					<div class="pull-right" style="margin-bottom:5px">
						<a href="/quote/download-document?type=cm_prod&index=-1&quote_id=<?php echo $this->_tpl_vars['contract_details']['quoteid']; ?>
&mission_id=<?php echo $this->_tpl_vars['contractMissionDetails']['contractmissionid']; ?>
" class="btn btn-small zipdownload">Download Zip</a>
					</div>
					<table class="onsuccessrepquote table">
					<?php echo $this->_tpl_vars['quotefiles']; ?>

					</table>
					<br>
					<input type="file" name="seo_documents[]" accept="doc|xls|zip|docx|xlsx" class="multi" id=""/>
				</div>
				<?php endif; ?>
		</div>
		<br>
		<div class="well wbg well-large">
		<h3>Bidding Rules</h3><hr>

				<div class="row-fluid">
				<div class="span12">
					
					<div class="control-group">
						<label class="control-label">Writing Cost (&<?php echo $this->_tpl_vars['quote_details']['sales_suggested_currency']; ?>
;)<span id="cmWriting"></span></label>
						<div class="controls">
							<div class="span4">
								<input type="text" class="span12 validate[required,custom[number],funcCall[writingmax]] keyup" id="writing" value="<?php echo $this->_tpl_vars['writing']; ?>
" name="writing">
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Correction Cost (&<?php echo $this->_tpl_vars['quote_details']['sales_suggested_currency']; ?>
;)<span id="cmCorrection"></span></label>
						<div class="controls">
							<div class="span4">
								<input type="text" class="span12 validate[required,custom[number],funcCall[proofreadingmax]] keyup" id="proofreading" value="<?php echo $this->_tpl_vars['proofreading']; ?>
" name="proofreading">
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Other Cost (&<?php echo $this->_tpl_vars['quote_details']['sales_suggested_currency']; ?>
;)<span id="cmOther"></span></label>
						<div class="controls">
							<div class="span4">
								<input type="text" class="span12 validate[required,custom[number],max[<?php echo $this->_tpl_vars['autre']; ?>
]] keyup" id="othercost" value="<?php echo $this->_tpl_vars['autre']; ?>
" name="autre">
							</div>
							<div class="span5">
							<label class="radio">
								<input type="radio" name="merge" id="merge_writing_cost" <?php if ($this->_tpl_vars['merge'] == 'writing_cost'): ?> checked="checked" 
								<?php endif; ?> value="writing_cost" class="merge" /> 
								Merge with Writing Cost
							</label>
							<label class="radio">
								<input type="radio" name="merge" id="merge_proofreading_cost" <?php if ($this->_tpl_vars['merge'] == 'proofreading_cost'): ?> checked="checked" 
								<?php endif; ?> value="proofreading_cost"  class="merge" /> 
								Merge with Proofreading Cost
							</label>
							</div>
						</div>
					</div>
										<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<div class="span8">
								<a name="save" id="newrequest" onclick="return insertPrice()" class=""><i class="icon-hand-right"></i> Create a tech mission linked to this cost?</a>
							</div>
							<div class="span8" style="margin-left:0">
								<a href="" data-toggle="modal" role="button" data-target="#new_staffing" id="" class=""><i class="icon-hand-right"></i>Create a staff mission</a>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Cost Max (&<?php echo $this->_tpl_vars['quote_details']['sales_suggested_currency']; ?>
;)<span id="cmCostmax"></span></label>
						<div class="controls">
						<!--	<div style="margin-right:10px" class="span4">
									Min (&<?php echo $this->_tpl_vars['quote_details']['sales_suggested_currency']; ?>
;) <br>
								<input type="text" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['min_cost']; ?>
" name="min_cost">
							</div> -->
							<div class="span4">
								<input type="text" class="span12 validate[required,custom[number],max[<?php echo $this->_tpl_vars['writing']+$this->_tpl_vars['proofreading']+$this->_tpl_vars['autre']; ?>
]]" id="cost_max" value="<?php echo $this->_tpl_vars['max_cost']; ?>
" name="max_cost">
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Correction</label>
						<div class="controls">
							<div class="span6">
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['correction'],'name' => 'correction','selected' => $this->_tpl_vars['pcorrection'],'class' => "validate[required]",'id' => 'correction'), $this);?>
 
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">#Files / Pack</label>
						<div class="controls">
							<input type="text" name="files_pack" value="<?php echo $this->_tpl_vars['files_pack']; ?>
" class="span3 inline validate[required]" /> 
						</div>
					</div>
					<?php if ($this->_tpl_vars['ebookerid'] == $this->_tpl_vars['client_info']['identifier']): ?>
					<div class="control-group">
						<label class="control-label" style="padding:0">Stencils</label>
						<div class="controls">
								<input type="radio" name="stencils" class="alertemail" <?php if ($this->_tpl_vars['stencils'] == 'yes'): ?> checked <?php endif; ?> value="yes">Oui&nbsp;
								<input type="radio" name="stencils" class="alertemail" <?php if ($this->_tpl_vars['stencils'] == 'no'): ?> checked <?php endif; ?> value="no">Non
						</div>
					</div>
                    <?php elseif ($this->_tpl_vars['client_info']['identifier'] == '131205130842526'): ?>
                    <div class="control-group">
                        <label class="control-label" style="padding:0">BNP Mission</label>
                        <div class="controls">
                            <input type="radio" name="bnp_mission" class="alertemail"  value="yes">Oui&nbsp;
                            <input type="radio" name="bnp_mission" class="alertemail"  value="no" checked >Non
                        </div>
                    </div>
					<?php endif; ?>
					<input type="hidden" value="<?php echo $this->_tpl_vars['prod_mission_details']['oneshot']; ?>
" name="tempooption" id="tempooption" />
					<?php if ($this->_tpl_vars['prod_mission_details']['oneshot'] == 'yes' || $this->_tpl_vars['prod_mission_details']['oneshot'] == 'no'): ?>
					<div class="control-group">
						<label class="control-label"><h4>Tempo</h4></label>
					</div>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['prod_mission_details']['oneshot'] == 'yes'): ?>
					<div class="control-group">
						<label class="control-label">One shot mission</label>
						<div class="controls" style="margin-top:7px">
						<strong><?php echo $this->_tpl_vars['prod_mission_details']['mission_length']; ?>
 <?php echo $this->_tpl_vars['prod_mission_details']['mission_length_option_convert']; ?>
</strong>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
						<div class="span12">
							<div id="addshot">
							<?php if ($this->_tpl_vars['oneshots']): ?>
								<?php $_from = $this->_tpl_vars['oneshots']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oneshots'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oneshots']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['oneshots']['iteration']++;
?>
								<div class="showshot">
								Deliver 
								<input type="text" style="width:10%" id="" name="articles[]" class="validate[required,custom[integer]]" value="<?php echo $this->_tpl_vars['row']['articles']; ?>
" /> 
								articles after
								<input type="text" id="" name="oneshot_length[]" style="width:10%" class="validate[required,custom[integer]] check" value="<?php echo $this->_tpl_vars['row']['oneshot_length']; ?>
" /> 
								<select name="oneshot_option[]" id="" class="span2">
									<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_duration_array'],'selected' => $this->_tpl_vars['row']['oneshot_option']), $this);?>

								</select>
								<?php if (! ($this->_foreach['oneshots']['iteration'] <= 1)): ?>
								<a class="btn btn-mini closeshot">
									<i class="icon-remove"></i>
								</a>
								<?php endif; ?>
								</div>
								<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
								<div class="showshot">
									Deliver 
									<input type="text" style="width:10%" id="" name="articles[]" class="validate[required,custom[integer]]" value="" /> 
									articles after
									<input type="text" id="" name="oneshot_length[]" style="width:10%" class="validate[required,custom[integer]] check" value="" /> 
									<select name="oneshot_option[]" id="" class="span2">
										<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_duration_array']), $this);?>

									</select>
								</div>
							<?php endif; ?>
							</div>
							<div class="span7">
								<a class="btn btn-small topset2 cloneshot pull-right"><i class="icon-plus"></i> Add</a>
							</div>
						</div>
						</div>
					</div>
					<?php elseif ($this->_tpl_vars['prod_mission_details']['oneshot'] == 'no'): ?>
					<div class="control-group">
						<label class="control-label">Recurring</label>
						<div class="controls" style="margin-top:7px">
						<strong>
							<?php echo $this->_tpl_vars['prod_mission_details']['volume_max']; ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['tempo_array'][$this->_tpl_vars['_tempo_value']])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
) <?php echo $this->_tpl_vars['prod_mission_details']['product_type_name']; ?>
 <?php echo $this->_tpl_vars['volume_option_array'][$this->_tpl_vars['_delivery_volume_option']]; ?>
 <?php echo $this->_tpl_vars['prod_mission_details']['tempo_length']; ?>
 <?php echo $this->_tpl_vars['tempo_duration_array'][$this->_tpl_vars['_tempo_length_option']]; ?>

						</strong>
						</div>
					</div>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['prod_mission_details']['oneshot'] == 'yes' || $this->_tpl_vars['prod_mission_details']['oneshot'] == 'no'): ?>
					<div class="control-group">
						<label class="control-label">Receive an alert by email<br>If tempo not respected</label>
						<div class="controls">
							<div class="span4">
								<input type="radio" name="alert_email" class="alertemail" <?php if ($this->_tpl_vars['alertemail'] == 'yes' || $this->_tpl_vars['alertemail'] == ''): ?> checked <?php endif; ?> value="yes">Yes&nbsp;
								<input type="radio" name="alert_email" class="alertemail" <?php if ($this->_tpl_vars['alertemail'] == 'no'): ?> checked <?php endif; ?> value="no">No
							</div>	
						</div>
					</div>
					<?php endif; ?>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<label class="radio">
								<input type="radio" name="launch" <?php if ($this->_tpl_vars['launch_survey'] == 'yes'): ?> checked="checked" <?php endif; ?> value="survey" class="launch" /> 
								Launch a Survey
							</label>
							<label class="radio">
								<input type="radio" name="launch" <?php if ($this->_tpl_vars['launch_recuritement'] == 'yes'): ?> checked="checked" <?php endif; ?> value="recruitment"  class="launch" /> 
								Launch a Recruitment
							</label>
							<label class="radio" style="margin-left:15px">
								<span class="help-block">All Missions in the Queue will be performed after the recruitment</span>
							</label>
							<label class="radio">
								<input type="radio" name="launch" <?php if ($this->_tpl_vars['launch_recuritement'] == 'no' && $this->_tpl_vars['launch_survey'] == 'no'): ?> checked="checked" <?php endif; ?> value="none"  class="launch" /> 
								None
							</label>
							<label class="checkbox">
								<input type="checkbox" name="privatedelivery" value="yes" <?php if ($this->_tpl_vars['privatedelivery'] == 'yes' || $this->_tpl_vars['launch_recuritement'] == 'yes'): ?> checked="checked" <?php endif; ?> class="privatedelivery" /> 
								Private Mission
							</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Currency</label>
						<div class="controls">
							<div class="span4">
															<?php if ($this->_tpl_vars['contractDetails']): ?>
								<select name="currency" disabled id="currency">		
									<option value="pound" <?php if ($this->_tpl_vars['cmcurrency'] == 'pound'): ?> selected<?php endif; ?> >Pound</option>
									<option value="euro" <?php if ($this->_tpl_vars['cmcurrency'] == 'euro'): ?> selected<?php endif; ?>>Euro</option>
								</select>
								<?php else: ?>
								<select name="currency" id="currency" class="validate[required]" onchange="changePrice(this)">		
									<option value="pound" <?php if ($this->_tpl_vars['cmcurrency'] == 'pound'): ?> selected<?php endif; ?> >Pound</option>
									<option value="euro" <?php if ($this->_tpl_vars['cmcurrency'] == 'euro'): ?> selected<?php endif; ?>>Euro</option>
								</select>
								<?php endif; ?>
								</select>	
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Exchange rate</label>
						<div class="controls">
							<input type="text" name="conversionprod" id="conversionprod" <?php if ($this->_tpl_vars['contractDetails']): ?> disabled="disabled" value="<?php echo $this->_tpl_vars['cmconversion']; ?>
" <?php else: ?> value="<?php echo $this->_tpl_vars['quote_details']['conversion']; ?>
"  <?php endif; ?> class="span3 keyup inline validate[required,custom[number],min[0.1]]" /><span class="help-block">Ex: Use "." for floating decimal number</span>
						</div>
					</div>
				</div>
				</div>
			
		</div>	
		
		<br><br>
		<h3>Tech & SEO Missions</h3><br>
	
				<div class="row-fluid">
					<table class="table headercolor table-bordered">
						<tr>
							<th>Expected Mission</th>
							<th>Mission Title</th>
							<th>Delivery Time</th>
							<th>Assigned</th>
							<th>Prior to Prod</th>
							<th>Status</th>
							<th></th>
						</tr>
					<?php if (count($this->_tpl_vars['expected_techmissions']) > 0): ?>
						<?php $_from = $this->_tpl_vars['expected_techmissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tech_mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tech_mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['tech_mission']['iteration']++;
?>
						<tr>
							<td>Tech Mission</td>
							<td><?php echo $this->_tpl_vars['row']['title']; ?>
</td>
							<td><?php echo $this->_tpl_vars['row']['delivery_time']; ?>
&nbsp;<?php echo $this->_tpl_vars['row']['delivery_option']; ?>
</td>
							
							<td><?php echo $this->_tpl_vars['row']['assigned']; ?>
</td>
							<td class="capitalise"><?php echo $this->_tpl_vars['row']['before_prod']; ?>
</td>
							<td class="capitalise"><?php echo $this->_tpl_vars['row']['cmstatus']; ?>
</td>
							<td>
							<?php if ($this->_tpl_vars['row']['assigned'] == 'Yes'): ?>
							<a href="/followup/tech?cmid=<?php echo $this->_tpl_vars['row']['cmid']; ?>
&submenuId=ML13-SL4" id="" target="_blank" class="btn btn-mini btn-default">See</a>
							<?php else: ?>
							<a href="/contractmission/mission-seo-tech?type=tech&id=<?php echo $this->_tpl_vars['row']['identifier']; ?>
" data-toggle="modal" role="button" data-target="#mission_modal" id="" class="btn btn-mini btn-default">See</a>
							<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					<?php if (count($this->_tpl_vars['seoMissionDetails']) > 0): ?>
						<?php $_from = $this->_tpl_vars['seoMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tech_mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tech_mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['tech_mission']['iteration']++;
?>
						<tr>
							<td>SEO Mission</td>
							<td><?php echo $this->_tpl_vars['row']['title']; ?>
</td>
							<td><?php echo $this->_tpl_vars['row']['mission_length']; ?>
&nbsp;<?php echo $this->_tpl_vars['row']['mission_length_option']; ?>
</td>
							
							<td><?php echo $this->_tpl_vars['row']['assigned']; ?>
</td>
							<td class="capitalise"><?php echo $this->_tpl_vars['row']['before_prod']; ?>
</td>
							<td class="capitalise"><?php echo $this->_tpl_vars['row']['cmstatus']; ?>
</td>
							<td>
							<?php if ($this->_tpl_vars['row']['assigned'] == 'Yes'): ?>
							<a href="/followup/seo?cmid=<?php echo $this->_tpl_vars['row']['cmid']; ?>
&submenuId=ML13-SL4" target="_blank" id="" class="btn btn-mini btn-default">See</a>
							<?php else: ?>
							<a href="/contractmission/mission-seo-tech?type=seo&id=<?php echo $this->_tpl_vars['row']['identifier']; ?>
" data-toggle="modal" role="button" data-target="#seo_modal" id="" class="btn btn-mini btn-default">See</a>
							<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
						
					<?php endif; ?>
					<?php if (count($this->_tpl_vars['expected_techmissions']) == 0 && count($this->_tpl_vars['seoMissionDetails']) == 0): ?>
					<tr>
						<td colspan="6">Expected Missions not Found.</td>
					</tr>
					<?php endif; ?>
					</table>
					<br/>
					<table class="table headercolor table-bordered">
						<tr>
							<th>Extra Mission</th>
							<th>Mission Title</th>
							<th>Delivery Time</th>
							<th>Assigned</th>
							<th>Prior to Prod</th>
							<th>Status</th>
							<th></th>
						</tr>
					<?php if (count($this->_tpl_vars['extra_techmissions']) > 0 || count($this->_tpl_vars['extra_staff']) > 0): ?>
						<?php $_from = $this->_tpl_vars['extra_techmissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tech_mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tech_mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['tech_mission']['iteration']++;
?>
						<tr>
							<td>Tech Mission <?php if ($this->_tpl_vars['row']['title'] == ""): ?><span class="label label-info">Pending</span><?php endif; ?></td>
							<td><?php if ($this->_tpl_vars['row']['title']): ?><?php echo $this->_tpl_vars['row']['title']; ?>
<?php else: ?>-<?php endif; ?></td>
							<td><?php if ($this->_tpl_vars['row']['delivery_time']): ?><?php echo $this->_tpl_vars['row']['delivery_time']; ?>
&nbsp;<?php echo $this->_tpl_vars['row']['delivery_option']; ?>
<?php else: ?>-<?php endif; ?></td>
							
							<td><?php echo $this->_tpl_vars['row']['assigned']; ?>
</td>
							<td class="capitalise"><?php echo $this->_tpl_vars['row']['before_prod']; ?>
</td>
							<td class="capitalise"><?php echo $this->_tpl_vars['row']['cmstatus']; ?>
</td>
							<td><?php if ($this->_tpl_vars['row']['title']): ?>
							<?php if ($this->_tpl_vars['row']['assigned'] == 'Yes'): ?>
							<a href="/followup/tech?cmid=<?php echo $this->_tpl_vars['row']['cmid']; ?>
&submenuId=ML13-SL4" id="" target="_blank" class="btn btn-mini btn-default">See</a>
							<?php else: ?>
							<a href="/contractmission/mission-seo-tech?type=tech&id=<?php echo $this->_tpl_vars['row']['identifier']; ?>
" data-toggle="modal" role="button" data-target="#mission_modal" id="" class="btn btn-mini btn-default">See</a>
							<?php endif; ?>
							<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
						<?php $_from = $this->_tpl_vars['extra_staff']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['staff_mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['staff_mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['staff_mission']['iteration']++;
?>
						<tr>
							<td>Staff Mission <?php if ($this->_tpl_vars['row']['title'] == ""): ?><span class="label label-info">Pending</span><?php endif; ?></td>
							<td><?php if ($this->_tpl_vars['row']['title']): ?><?php echo $this->_tpl_vars['row']['title']; ?>
<?php else: ?>-<?php endif; ?></td>
							<td><?php if ($this->_tpl_vars['row']['delivery_time']): ?><?php echo $this->_tpl_vars['row']['delivery_time']; ?>
&nbsp;<?php echo $this->_tpl_vars['row']['delivery_option']; ?>
<?php else: ?>-<?php endif; ?></td>
							<td><?php echo $this->_tpl_vars['row']['assigned']; ?>
</td>
							<td class="capitalise"><?php echo $this->_tpl_vars['row']['before_prod']; ?>
</td>
							<td class="capitalise"><?php echo $this->_tpl_vars['row']['cmstatus']; ?>
</td>
							<td><?php if ($this->_tpl_vars['row']['title']): ?>
							<?php if ($this->_tpl_vars['row']['assigned'] == 'Yes'): ?>
							<a href="/followup/staff?cmid=<?php echo $this->_tpl_vars['row']['cmid']; ?>
&submenuId=ML13-SL4" id="" target="_blank" class="btn btn-mini btn-default">See</a>
							<?php else: ?>
							<a href="/contractmission/mission-seo-tech?type=staff&id=<?php echo $this->_tpl_vars['row']['identifier']; ?>
" data-toggle="modal" role="button" data-target="#mission_modal" id="" class="btn btn-mini btn-default">See</a>
							<?php endif; ?>
							<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
						<tr>
							<td colspan="6">Extra Missions not Found.</td>
						</tr>
					<?php endif; ?>
					</table>
				</div>
								<div class="row-fluid">
					<a name="save" id="newrequest" onclick="return removePrice()" class="btn btn-default">Request a new Tech Mission</a>
				</div>
			
			
		
		<br><br>
		<div class="well well-large clearfix">
			<h3>Assignment</h3>
			
					<p>Which folk is going to be the Owner?</p><br>
					<?php if ($this->_tpl_vars['contractDetails']): ?>
						<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
						<div class="assignuser pull-left">
							<img class="media-object rd_30" height="50" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['row']['identifier']; ?>
/logo.jpg">
							<?php if ($this->_tpl_vars['row']['first_name'] || $this->_tpl_vars['row']['last_name']): ?><p><?php echo $this->_tpl_vars['row']['first_name']; ?>
&nbsp;</p><?php else: ?><br/><br/><?php endif; ?>
							<input type="radio" class="validate[required]" name="assignuser" <?php if ($this->_tpl_vars['contractMissionDetails']['assigned_to'] == $this->_tpl_vars['row']['identifier']): ?> checked="checked" <?php endif; ?> value="<?php echo $this->_tpl_vars['row']['identifier']; ?>
" />
													</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
					<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
					<div class="assignuser pull-left">
						<img class="media-object rd_30" height="50" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['row']['identifier']; ?>
/logo.jpg">
						<?php if ($this->_tpl_vars['row']['first_name'] || $this->_tpl_vars['row']['last_name']): ?><p><?php echo $this->_tpl_vars['row']['first_name']; ?>
&nbsp;</p><?php else: ?><br/><br><?php endif; ?>
						<input type="radio" class="validate[required]" name="assignuser" value="<?php echo $this->_tpl_vars['row']['identifier']; ?>
" />
											</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
		
	</div>
		
	<?php endif; ?>	
	
	<div class="row-fluid topset2" style="text-align:center">
		<?php if ($this->_tpl_vars['submit']): ?>
		<button type="submit" name="save" onclick="removeDisabled()" class="btn btn-primary">Submit</button>
	<?php else: ?>
		<div class="alert alert-warning"><h4>SEO or Tech Missions Prior to Prod are required. You can't assign someone for the moment.</h4></div> 
	<?php endif; ?>
	</div>
		</form>
	</div>
	
</div>
<!--popup to show tech mission details-->
<div class="modal container hide fade" id="mission_modal">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Tech Mission</h3>
    </div>
    <div class="modal-body">
		
	</div>
    <div class="modal-footer">
    </div>
</div>	
<!--popup to show Seo mission details-->
<div class="modal container hide fade" id="seo_modal">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>SEO Mission</h3>
    </div>
    <div class="modal-body">
		
	</div>
    <div class="modal-footer">
    </div>
</div>	
<!--popup to show new tech mission details-->
<div class="modal hide fade" id="close_quote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Tech Mission Request</h3>
    </div>
    <div class="modal-body">
		<form action="/contractmission/add-new-techmission" method="post" id="closequote" enctype="multipart/form-data">
			<input type="hidden" name="contractid" value="<?php echo $_GET['contract_id']; ?>
" />
			<input type="hidden" name="quoteid" value="<?php echo $this->_tpl_vars['quote_details']['identifier']; ?>
" />
			<input type="hidden" name="index" value="<?php echo $this->_tpl_vars['current_index']; ?>
" />
			<input type="hidden" name="price" id="price" value="new" />
			<section>
				<div class="row-fluid topset2">
					<div class="media mission-comment addmargin">
							<a class="pull-left imgframe">
								<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['loginuserId']; ?>
/logo.jpg" class="media-object">
							</a>
							<div class="media-body">
								<textarea name="comment" id="newcomment" class="validate[required] span12" placeholder="Explain what do you need here"></textarea>
							</div>
							<input type="file" name="seo_documents[]" accept="doc|xls|zip|docx|xlsx" class="multi" id=""/>
					</div>
					<?php if ($this->_tpl_vars['contractDetails'] == false): ?>
					<div class="control-group"  id="before_prod" >
						<label class="control-label"></label>
						<div class="controls">
							<label class="checkbox span3">
								<input type="checkbox" name="before_prod" value="yes" class="" /> 
								Set as Blocker
							</label>
						</div>
					</div>
					<?php else: ?>
						<br/>
					<?php endif; ?>
					<div class="control-group span12">
						<div class="span4"></div>
						<div class="span8">
							<button  class="btn" data-dismiss="modal" type="reset">Cancel</button>
							<button class="btn btn-primary" name="submit" value="no" type="submit">Request</button>
						</div>
					</div>
				</div>
			</section>
		</form>
    </div>
    <div class="modal-footer">
    </div>
</div>

<!--popup to show new tech mission details-->
<div class="modal hide fade" id="new_staffing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Staff Mission</h3>
    </div>
    <div class="modal-body">
		<form action="/contractmission/add-new-staffmission" method="post" id="newstaff" enctype="multipart/form-data">
			<input type="hidden" name="contractid" value="<?php echo $_GET['contract_id']; ?>
" />
			<input type="hidden" name="quoteid" value="<?php echo $this->_tpl_vars['quote_details']['identifier']; ?>
" />
			<input type="hidden" name="missionid" value="<?php echo $this->_tpl_vars['seotechprodid']; ?>
" />
			<input type="hidden" name="index" value="<?php echo $this->_tpl_vars['current_index']; ?>
" />
			<input type="hidden" name="price" id="price" value="new" />
			<input type="hidden" name="staff_time" id="staff_time" value="<?php echo $this->_tpl_vars['prod_mission_details']['staff_time']; ?>
" />
			<input type="hidden" name="staff_time_option" id="staff_time_option" value="<?php echo $this->_tpl_vars['prod_mission_details']['staff_time_option']; ?>
" />
			<section>
				<p>You are about to create a mission staffing, thank you confirm your choice below</p>
			 <div class="row-fluid topset2">
									<div class="control-group span12">
						<div class="span4"></div>
						<div class="span8">
							<button  class="btn" data-dismiss="modal" type="reset">Annuler</button>
							<button class="btn btn-primary" name="submit" value="no" type="submit">Validate</button>
						</div>
					</div>
				</div>
			</section>
		</form>
    </div>
    <!-- <div class="modal-footer">
    </div> -->
</div>
<div id="cloneshots" class="showshot" style="display:none">
	Deliver 
	<input type="text" style="width:10%" id="" name="articles[]" class="validate[required,custom[integer]]]" value="<?php echo $this->_tpl_vars['mission']['tempo_length']; ?>
" /> 
	articles after
	<input type="text" id="" name="oneshot_length[]" style="width:10%" class="validate[required,custom[integer]] check" value="<?php echo $this->_tpl_vars['mission']['tempo_length']; ?>
" /> 
	<select name="oneshot_option[]" id="" class="span2">
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_duration_array'],'selected' => $this->_tpl_vars['mission']['tempo_length_option']), $this);?>

	</select>
	<a class="btn btn-mini closeshot">
		<i class="icon-remove"></i>
	</a>
</div>
<?php echo '
	<script>
		$(document).ready(function(){
			 $(\'input[type=radio]\').on(\'ifChecked\', function(event){
			  //$(this).closest("div").find(".change").text(\'Assigned\');
			});
		
			 $(\'input[type=radio]\').on(\'ifUnchecked\', function(event){
			  $(this).closest("div").find(".change").text(\'Assign\');
			});
			
			$(document).on("click","#newrequest",function(){
				
						$("#close_quote").modal(\'show\');
						$("#close_quote").removeClass( "hide" ).addClass("in");
					
			})
			
			$("#spinner").spinner({min:1});
				$(\'.alertemail\').iCheck({
				checkboxClass: \'icheckbox_square-blue\',
				radioClass: \'iradio_square-blue\'		
			});
			$(".cloneshot").click(function(){
				$("#cloneshots").clone().appendTo("#addshot");
				$("#addshot").find("#cloneshots").removeAttr("id");
			})
			$(document).on("click",".closeshot",function(){
				$(this).closest("div").remove();
			});
			
			if(change_prices)
				showPrices();
		})
		/* To check one shot articles option in Ascending order */
		function checkMax(){
			var current_value = prev_value = "";
			$("#addshot [name=articles\\\\[\\\\]]").each(function(index,value){
				current_value = parseInt($(this).val());
				if(prev_value !="" && current_value < prev_value)
				{
					$(this).addClass("errortempo");
					//$(this).css("border","1px solid #d90501");
					prodsubmit = false;
					$(\'html, body\').animate({ scrollTop: $(\'#addshot\').offset().top }, \'slow\');
					return false;
				}
				else
				{
					//$(this).css("border","none");
					$(this).removeClass("errortempo");
					prodsubmit = true;
				}
				prev_value = current_value;
			})
			if(prodsubmit == false)
				return false;
			current_value = prev_value = "";
			$("#addshot [name=oneshot_length\\\\[\\\\]]").each(function(index,value){
				current_value = parseInt($(this).val());
				if(prev_value !="" && current_value < prev_value)
				{
					$(this).addClass("errortempo");
					//$(this).css("border","1px solid #d90501");
					prodsubmit = false;
					$(\'html, body\').animate({ scrollTop: $(\'#addshot\').offset().top }, \'slow\');
					return false;
				}
				else
				{
					//$(this).css("border","none");
					$(this).removeClass("errortempo");
					prodsubmit = true;
				}
				prev_value = current_value;
			})
			return prodsubmit;
		}
	</script>
'; ?>
