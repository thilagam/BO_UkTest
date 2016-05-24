<?php /* Smarty version 2.6.19, created on 2016-01-14 08:38:52
         compiled from gebo/turnover/split-month-turnover.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut_t', 'gebo/turnover/split-month-turnover.phtml', 452, false),array('modifier', 'count', 'gebo/turnover/split-month-turnover.phtml', 470, false),array('modifier', 'asort', 'gebo/turnover/split-month-turnover.phtml', 474, false),array('modifier', 'cat', 'gebo/turnover/split-month-turnover.phtml', 567, false),array('modifier', 'is_array', 'gebo/turnover/split-month-turnover.phtml', 680, false),array('modifier', 'htmlentities', 'gebo/turnover/split-month-turnover.phtml', 691, false),)), $this); ?>
<?php echo '
<!-- custom scrollbar plugin -->

<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link href="/BO/theme/gebo/css/jquery.datetimepicker.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.datetimepicker.js" type="text/javascript" charset="utf-8"></script>
<script>
	var editor=false;
	$(document).ready(function() 
	{	
		
		$("#splitturnoverform").validationEngine(\'attach\');	
		
		$(\'.filter-list\').hide();
		 
		var client_id='; ?>
<?php if ($_GET['clientid']): ?><?php echo $_GET['clientid']; ?>
 <?php else: ?><?php echo '""'; ?>
<?php endif; ?><?php echo ';
		
		$("#yearlist").chosen({allow_single_deselect:false,search_contains: true});
	  	  
		$("#all_clients").chosen({allow_single_deselect:true,search_contains: true });
			  
		$("#all_sales").chosen({allow_single_deselect:true,search_contains: true});
		
		$("#product_type").chosen({allow_single_deselect:true,search_contains: true,disable_search: true});
		
		$("#product_name").chosen({allow_single_deselect:true,search_contains: true,disable_search: true});
			  
			  
		 //search form submit
		$(\'#search-filter\').live(\'click\', function(evt, params) {
				$("#search_form").submit();
		});
	
	  if(client_id)
	  {
		 	 //validation
			
		var product=\''; ?>
<?php if ($_GET['product']): ?><?php echo $_GET['product']; ?>
 <?php else: ?><?php echo ''; ?>
<?php endif; ?><?php echo '\';
		var p_type=\''; ?>
<?php if ($_GET['p_type']): ?><?php echo $_GET['p_type']; ?>
 <?php else: ?><?php echo ''; ?>
<?php endif; ?><?php echo '\';
			  // Edit if the td value Empty
			  $("[id^=splitturnover_]").live(\'keypress\', function(event)
			  {
				  
				  	$("#splitturnoverform").validationEngine(\'validate\');	
					if(event.which==13) 
					{
						
						 var floatRegex = /^[0-9.,]+$/;
						 var monthid = $(this).attr(\'id\');		
						 var split_id = monthid.split(\'_\');
						 var spitval=$(this).val();
						
							if (spitval.match(floatRegex)!=null) 
							 {     
								 $("#splitturnover_"+split_id[1]+\'_\'+split_id[2]+\'_\'+split_id[3]).closest(\'td\').html(\'<img style="text-align:center;" src="/BO/theme/gebo/img/ajax_loader.gif">\');
								missionsplitmonth(split_id[1],split_id[2],split_id[3],spitval,client_id,product,p_type);    
								editor=false;                   
							 }
							else
							{ 
								editor=true;
								
							}
							
					}
							
			  });
		
		
			$("#back-button").show();
			$(\'.filter-list\').show();
			/*$(\'#client_details_view\').dataTable({
						"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
						"iDisplayLength" : 50,
						 "aaSorting": [],
						"bSortCellsTop": true,
						"aoColumns": [
							{  "sType": "string" ,"bSortable": false},
							{ "sType": "string","bSortable": false},
							{ "sType": "natural","bSortable": false },
							{ "sType": "natural" ,"bSortable": false},
							{ "sType": "natural" ,"bSortable": false},
							{ "sType": "natural" ,"bSortable": false},
							{ "sType": "natural" ,"bSortable": false},
							{ "sType": "natural" ,"bSortable": false},
							{ "sType": "natural" ,"bSortable": false},
							{ "sType": "natural" ,"bSortable": false},
							{ "sType": "natural" ,"bSortable": false},
							{ "sType": "natural" ,"bSortable": false},
							{ "sType": "natural" ,"bSortable": false},
							{ "sType": "natural" ,"bSortable": false},
							{ "sType": "natural" ,"bSortable": false}
						]
						   
						});*/
					
										
		
				//chart Integration
			
				var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		
						var lineChartData = {
							
							labels : ["JAN","FEB","MAR","APR","MAY","JUN","JUIL","AUG","SEP","OCT","NOV", "DEC"],
							datasets : [
							{
								label: "turnover",
								fillColor : "rgba(240,240,240,0)",
								strokeColor : "rgba(240,240,240,1)",
								pointColor : "rgba(240,240,240,1)",
								pointStrokeColor : "#fff",
								pointHighlightFill : "#fff",
								pointHighlightStroke : "rgba(240,240,240,1)",
								data : [parseFloat($("#month_01").val().replace(\',\',\'.\')),parseFloat($("#month_02").val().replace(\',\',\'.\')),parseFloat($("#month_03").val().replace(\',\',\'.\')),
								parseFloat($("#month_04").val().replace(\',\',\'.\')),parseFloat($("#month_05").val().replace(\',\',\'.\')),parseFloat($("#month_06").val().replace(\',\',\'.\')),parseFloat($("#month_07").val().replace(\',\',\'.\')),
								parseFloat($("#month_08").val().replace(\',\',\'.\')),parseFloat($("#month_09").val().replace(\',\',\'.\')),parseFloat($("#month_10").val().replace(\',\',\'.\')),
								parseFloat($("#month_11").val().replace(\',\',\'.\')),parseFloat($("#month_12").val().replace(\',\',\'.\'))]
							}
							]

						};
						options = {
						responsive: true,
						maintainAspectRatio: true
						};

					
						window.onload = function()
						{
							var ctx = document.getElementById("canvas").getContext("2d");
							ctx.width = window.innerWidth-6;
							
								window.myLine = new Chart(ctx).Line(lineChartData, options);
							
						}	
					
				
			
		}
		else
		{
		
				$("#client_details_view").hide();
				$("#back-button").hide();
				$("#date-search").show();
				$(\'#contract-invoice\').show();
				$(\'.filter-list\').show();
				$(\'#contract-invoice\').dataTable({
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
					
		}
	
	var user_type=\''; ?>
<?php echo $this->_tpl_vars['user_type']; ?>
<?php echo '\';
	
	if(user_type==\'superadmin\' || user_type==\'facturation\'){
		
		
		
		$(\'#client_details_view td.mission-val\').on(\'click\',function(e)
		{
			$(".formError").css("display","none");
			 					
			if(editor==false)
			{
				var tdwidth= $(this).width();
				
						$("#client_details_view td.mission-val").find(\'input\').css("display","none");
						$("#client_details_view td.mission-val").find(\'p\').show();	
										
						if($(this).find(\'input\').val()!="")
						{
						$(this).find(\'p\').hide();
						$(this).find(\'input\').css("display","block");
						}
						else
						{
						$(this).find(\'p\').hide();
						$(this).find(\'input\').css("display","block");
						}
						$(this).find(".formError").css("display","block");
						if(tdwidth)
						{
						$(this).css("width",tdwidth);
						$(this).find(\'input\').css("width",tdwidth-22);
						
						}
						
			}
			
		});
		
		$(document).mouseup(function (e) {
			
		if ($(e.target).has("#client_details_view").length > 0) {
			$(\'#client_details_view td.mission-val\').find(".formError").css("display","none");
			$("#client_details_view td.mission-val").find(\'input\').css("display","none");
			$("#client_details_view td.mission-val").find(\'p\').show();	
			}
			});
		$("#client_details_view td").on(\'click\',function (e) {
			if(!$(this).hasClass(\'mission-val\'))
			{
			$(\'#client_details_view td.mission-val\').find(".formError").css("display","none");
			$("#client_details_view td.mission-val").find(\'input\').css("display","none");
			$("#client_details_view td.mission-val").find(\'p\').show();	
			}
		
			});
			
	}
	
	
	
		var dateNow = new Date();
	$(\'#start_date\').datetimepicker({
		   	format:\'Y-m-d\',
			lang:\'fr\',
			defaultDate: dateNow,
			timepicker:false		
		});
	$(\'#end_date\').datetimepicker({
		   	format:\'Y-m-d\',
			lang:\'fr\',
			defaultDate: dateNow,
			timepicker:false		
		});
		
		
		$("#cost_display").on(\'change\',function(){
			if($("#cost_display").is(\':checked\')){
			$(\'.cost_detail\').css("display","block");
			}else{
			$(\'.cost_detail\').css("display","none");
				}
			
			});

		
});


	function missionsplitmonth(mission_id,month_year,contract_id,spitval,client_id,product,p_type){
			var val=spitval.replace(\',\',\'.\');
		if(val!=0){
			
			$.post(\'/turnover/update-followp-turnover/\',{
					\'mission_id\':mission_id,
					\'month_year\':month_year,
					\'contract_id\': contract_id,
					\'turnover\': val,
					\'fil-product\': product,
					\'fil-p_type\': p_type,
					\'clientid\':client_id
					},function(data){
						if(data)
						{
						$("#client_contract_details").html(data);
							
						}	 
					})
			
			}
		
		}	
		
		$(document).on("click",".sales_details",function(){

			$("#salesProfileView").modal(\'show\');
			$("#salesProfileView").removeClass( "hide" ).addClass("in");
			
	});
		$(document).on("click",".monthActionList a",function(){
			$("#contractmonthly").modal(\'show\');
			$("#contractmonthly").removeClass( "hide" ).addClass("in");
			
	});
		$(document).on("click",".close",function(){

			$(".modal-backdrop").modal(\'hide\');
					
	});
		$(document).on("click",".modal-backdrop",function(){

			$(".modal-backdrop").modal(\'hide\');
					
	});
	 $(\'body\').on(\'hidden\', \'.modal\', function () {
        $(this).removeData(\'modal\');
		//$(\'.modal-body\').html(\'\');
		$("body").css("overflow", "auto");
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
		else{
			if($("#cost_display").is(":checked")){
					$(\'.margin_detail\').hide();
					$(\'th.missionhead\').attr("colspan","2");
				}
				else{
					$(\'.cost_detail\').hide();
					$(\'.margin_detail\').hide();
					$(\'th.missionhead\').attr("colspan","1");
					}
			}
		
		});
		
		
				
</script>
<style>
	.wrapper .table thead th {
    background-color: inherit !important;
	}
	.image {
     height: 50px;
    text-align: center;
    width: 50px;
	}
  #search-filter,input#start_date,input#end_date,#back-button{
	  margin-bottom: 23px;
  }
  
  input.turnover{
	  margin-bottom: 23px;
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
.wrapper table {
   width: 100% !important;
   border-collapse: separate !important;
  }
 
td.mission-val{ 
white-space: nowrap;
text-align:center;
}
.wrapper table thead th:last-child {
    background-color: #1fbba6 !important;
}
.wrapper table tr td{
white-space: nowrap;
	}
.wrapper table th, table td{
	padding: 8px ;
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

<section id="WrapSection">

	
		<div class="span12">
					<div class='span9'><h1>Annual turnover <?php echo $this->_tpl_vars['invoce']; ?>
<?php if ($this->_tpl_vars['client_details']['client_name']): ?>: <?php echo $this->_tpl_vars['client_details']['client_name']; ?>
<?php endif; ?></h1></div>
					<?php if ($this->_tpl_vars['totalturnoverexpeuro']): ?>
					<div class="pull-right  realtotal span2">
					 Split Turnover in <?php echo $this->_tpl_vars['default_year']; ?>
 <br><a href="/user/clients?submenuId=ML10-SL2"><?php echo ((is_array($_tmp=$this->_tpl_vars['totalturnoverexpeuro'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &euro;</a>
					 <br><a href="/user/clients?submenuId=ML10-SL2"><?php echo ((is_array($_tmp=$this->_tpl_vars['totalturnoverexppound'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &pound;</a>
					 </div>
					 <div style='clear:both'></div>
					 <?php endif; ?>
				</div>
		<div style="margin-top:20px">
			<form name="search_form" id="search_form" method="get" action="">
				<select data-placeholder="Years" id="yearlist" class='yearselect' name="year" >
									<option></option>
										<?php $_from = $this->_tpl_vars['year_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['year_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['year_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['year']):
        $this->_foreach['year_loop']['iteration']++;
?>
										<?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['default_year']): ?>
										   <option value="<?php echo $this->_tpl_vars['year']; ?>
" selected="selected" ><?php echo $this->_tpl_vars['year']; ?>
</option>
										   <?php else: ?>
										   <option value="<?php echo $this->_tpl_vars['year']; ?>
" ><?php echo $this->_tpl_vars['year']; ?>
</option>
										   <?php endif; ?>
										<?php endforeach; endif; unset($_from); ?>
									</select>
				<?php if (((is_array($_tmp=$this->_tpl_vars['client_details'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp)) > 0): ?>
							
								<input type="hidden" value="<?php echo $_GET['clientid']; ?>
" name="clientid">	
								
									<span style="display:none"><?php echo asort($this->_tpl_vars['salesownerdetail']['sales_details']); ?>
</span>
									
									<select data-placeholder="All Sales" id="all_sales" class='saleselect' name="sales_id" >
										<option></option>
										<?php $_from = $this->_tpl_vars['salesownerdetail']['sales_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
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
									
									<select data-placeholder="All Mission Type" id="product_type" class='producttypeselect' name="p_type" >
										<option></option>
									<?php $_from = $this->_tpl_vars['procuct_type_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['product_loop'] = array('total' => count($_from), 'iteration' => 0);
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
										<?php $_from = $this->_tpl_vars['product_total_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['product_loop'] = array('total' => count($_from), 'iteration' => 0);
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
					<?php else: ?>
							
							<select data-placeholder="All Clients" id="all_clients" class='clientselect' name="client_id" >
								<option></option>
										<?php $_from = $this->_tpl_vars['client_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['userkey'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
										<?php if ($this->_tpl_vars['userkey'] == $_GET['client_id']): ?>
										<option value="<?php echo $this->_tpl_vars['userkey']; ?>
" selected="selected"><?php echo $this->_tpl_vars['user']; ?>
</option>
										<?php else: ?>
										<option value="<?php echo $this->_tpl_vars['userkey']; ?>
" ><?php echo $this->_tpl_vars['user']; ?>
</option>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							</select>
							<span style="display:none"><?php echo asort($this->_tpl_vars['salesownerdetail']['sales_details']); ?>
</span>
							
							<select data-placeholder="All Sales" id="all_sales" class='saleselect' name="sales_id" >
								<option></option>
									<?php $_from = $this->_tpl_vars['salesownerdetail']['sales_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
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
							<!--    -->
					<?php endif; ?>
					<a class="btn btn-gebo pull-center" id="search-filter" >Search</a>
					<a class="btn btn-info pull-right" href="/turnover/split-month-turnover?submenuId=ML13-SL3" style="display:none;"  id="back-button" >Back</a>
					</form>
				</div>
	<div class="row-fluid wrapper">	
			<table class="table table-hover table-striped table-condensed" id="contract-invoice" style="display:none;">
						<thead>
							<tr class="displayDatas">
							    <th>Code</th>
							    <th style="width:250px">Client Name</th>
							   <?php $_from = $this->_tpl_vars['month_array_val']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['monthloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['monthloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['monthhead']):
        $this->_foreach['monthloop']['iteration']++;
?>
							    <th><?php echo $this->_tpl_vars['monthhead']; ?>
</th>
							   <?php endforeach; endif; unset($_from); ?>
							   <th class="total-row">TOTAL <span class="yearTotal"><?php echo $this->_tpl_vars['default_year']; ?>
</span></th>
							  
							</tr>
						</thead>
						
					<?php if (count($this->_tpl_vars['quotecontractlist']) > 0): ?>
					<tbody>	
					<?php $this->assign('toconcount', 1); ?>
				<?php $_from = $this->_tpl_vars['quotecontractlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contract_item']):
        $this->_foreach['contracts_loop']['iteration']++;
?>
				<?php $this->assign('conclient_id', $this->_tpl_vars['contract_item']['client_id']); ?>
							
							<tr>
								<td><?php echo $this->_tpl_vars['contract_item']['client_code']; ?>
</td>
								<td><span class="hidden"><?php echo $this->_tpl_vars['contract_item']['client_name']; ?>
</span><a href="/turnover/split-month-turnover?submenuId=ML13-SL3&clientid=<?php echo $this->_tpl_vars['contract_item']['client_id']; ?>
&year=<?php echo $this->_tpl_vars['default_year']; ?>
&sales_id=<?php echo $_GET['sales_id']; ?>
"><?php echo $this->_tpl_vars['contract_item']['client_name']; ?>
</a></td>
														
								<?php $_from = $this->_tpl_vars['contract_item']['monthlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['split_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['split_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['split_month_item']):
        $this->_foreach['split_loop']['iteration']++;
?>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['default_year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['split_month_item']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['split_month_item']))); ?>
										<td><span class="hidden"><?php echo $this->_tpl_vars['contract_item']['splitmonth'][$this->_tpl_vars['conclient_id']][$this->_tpl_vars['month_year']]; ?>
</span><?php if ($this->_tpl_vars['contract_item']['splitmonth'][$this->_tpl_vars['conclient_id']][$this->_tpl_vars['month_year']] == 0): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['contract_item']['splitmonth'][$this->_tpl_vars['conclient_id']][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['contract_item']['splitmonth'][$this->_tpl_vars['conclient_id']][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
<?php endif; ?></td>
									<?php endforeach; endif; unset($_from); ?>							
							   <td><span class="hidden"><?php echo $this->_tpl_vars['contract_item']['splitmonth'][$this->_tpl_vars['conclient_id']]['turnover']; ?>
</span><?php if ($this->_tpl_vars['contract_item']['splitmonth'][$this->_tpl_vars['conclient_id']]['turnover'] == 0): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['contract_item']['splitmonth'][$this->_tpl_vars['conclient_id']]['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['contract_item']['splitmonth'][$this->_tpl_vars['conclient_id']]['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract_item']['splitmonth'][$this->_tpl_vars['conclient_id']]['sales_suggested_currency']; ?>
;<?php endif; ?></td>
								<?php $this->assign('toconcount', $this->_tpl_vars['toconcount']+1); ?>
								</tr>
							
				<?php endforeach; endif; unset($_from); ?>
				<tbody>
				<?php endif; ?>
				
					</table>
				</div>
				
				<?php if (count($this->_tpl_vars['client_details']) > 0): ?>
				
				<div id="clientFocus" class="row-fluid" >
					
						<div class="clientFocusHeader">					
							<h3 id="myModalLabel" ><strong><?php echo $this->_tpl_vars['client_details']['client_name']; ?>
-<?php echo $this->_tpl_vars['default_year']; ?>
</strong></h3>
							</div>
						<canvas id="canvas" width="1291px" height="309px;"  class='img-responsive' ></canvas>
												
				
				<div id="client_contract_details">
					
					<form method="POST" name="splitturnoverform" id="splitturnoverform" enctype="multipart/form-data" class="form-horizontal">
				<table class="focusTable" id="client_details_view">
					<thead>
						<tr>
						    <th >SALES</th>
							<th ><span class="pull-left">CLIENT/CONTRACTS</span></th>
							<?php $_from = $this->_tpl_vars['month_array_val']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['monthloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['monthloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mkey'] => $this->_tpl_vars['monthhead']):
        $this->_foreach['monthloop']['iteration']++;
?>
							<th class="months"><?php echo $this->_tpl_vars['monthhead']; ?>
<span class="monthViewCta">
								<i class="fa fa-plus" id="monthActions"></i>
								<div class="monthActionList">
									<a role="button" href="/turnover/contract-monthly-details?client_id=<?php echo $this->_tpl_vars['client_details']['client_id']; ?>
&month=<?php echo $this->_tpl_vars['default_year']; ?>
-<?php echo $this->_tpl_vars['mkey']; ?>
" tabindex="-1" data-toggle="modal"  data-target="#contractmonthly"  data-hint="<?php echo $this->_tpl_vars['salesownerdetail'][$this->_tpl_vars['quotecontract_id']]['sales_owner']; ?>
"><i class="fa fa-eye"></i></a>						
								</div>
							</span>	</th>
							<?php endforeach; endif; unset($_from); ?>
						    <th class="months">TOTAL </th>
						</tr>
					</thead>
					<tbody>
					<tr class="contractRow">
					<?php $this->assign('client_identifier', $this->_tpl_vars['client_details']['client_id']); ?>	
					<td></td>
					<td><span class="contractName pull-left"><?php echo $this->_tpl_vars['client_details']['client_name']; ?>
</span></td>
						<?php $_from = $this->_tpl_vars['monthlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['month_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['month_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['month_item']):
        $this->_foreach['month_loop']['iteration']++;
?>
						<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['default_year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_item']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_item']))); ?>
						<td class="months"><div class="dataFocus">
								<span class="singleData"><?php if ($this->_tpl_vars['contract_details']['totalclient'][$this->_tpl_vars['client_identifier']][$this->_tpl_vars['month_year']] == 0): ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['contract_details']['totalclient'][$this->_tpl_vars['client_identifier']][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

								<input type="hidden" id="month_<?php echo $this->_tpl_vars['month_item']; ?>
"  value="0">
								<?php else: ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['contract_details']['totalclient'][$this->_tpl_vars['client_identifier']][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

								<input type="hidden" id="month_<?php echo $this->_tpl_vars['month_item']; ?>
"  value="<?php echo $this->_tpl_vars['contract_details']['totalclient'][$this->_tpl_vars['client_identifier']][$this->_tpl_vars['month_year']]; ?>
">
							<?php endif; ?></span>	
							</div>
						</td>
						
					<?php endforeach; endif; unset($_from); ?>
					 <td class="months"><div class="dataFocus">
								<span class="singleData"><?php if ($this->_tpl_vars['contract_details']['totalclient'][$this->_tpl_vars['client_identifier']]['turnover'] == 0): ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['contract_details']['totalclient'][$this->_tpl_vars['client_identifier']]['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

								<?php else: ?>
							    <?php echo ((is_array($_tmp=$this->_tpl_vars['contract_details']['totalclient'][$this->_tpl_vars['client_identifier']]['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract_details']['totalclient'][$this->_tpl_vars['client_identifier']]['sales_suggested_currency']; ?>
;
						<?php endif; ?></span>	
							</div>
					</td>	
					</tr>	
					
					
					<?php $_from = $this->_tpl_vars['contract_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contract_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contract_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contract_item']):
        $this->_foreach['contract_loop']['iteration']++;
?>
						<?php $this->assign('quotecontract_id', $this->_tpl_vars['contract_item']['quotecontractid']); ?>
					<?php if ($this->_tpl_vars['quotecontract_id'] != ""): ?>
					<tr class="contractRow active <?php echo $this->_tpl_vars['quotecontract_id']; ?>
">					
							<td>
							<a class="hint--right sales_details" href="/turnover/sales-details?sales_id=<?php echo $this->_tpl_vars['salesownerdetail'][$this->_tpl_vars['quotecontract_id']]['sales_creator_id']; ?>
" role="button" data-toggle="modal"  data-target="#salesProfileView"  data-hint="<?php echo $this->_tpl_vars['salesownerdetail'][$this->_tpl_vars['quotecontract_id']]['sales_owner']; ?>
">
								<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['salesownerdetail'][$this->_tpl_vars['quotecontract_id']]['sales_creator_id']; ?>
/logo.jpg?123" class="image rd_30" alt="<?php echo $this->_tpl_vars['salesownerdetail'][$this->_tpl_vars['quotecontract_id']]['sales_owner']; ?>
"></a>
							</td>
							<td>
								<span class="contractName pull-left ">							
									<a href="/contractmission/contract-edit?contract_id=<?php echo $this->_tpl_vars['quotecontract_id']; ?>
&submenuId=ML13-SL3"><?php echo $this->_tpl_vars['contract_item']['contractname']; ?>
</a>
								</span>
							</td>
							
								<?php $_from = $this->_tpl_vars['monthlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['month_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['month_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['month_item']):
        $this->_foreach['month_loop']['iteration']++;
?>
								<?php $this->assign('month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['default_year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['month_item']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['month_item']))); ?>
								<td><div class="dataFocus">
								<span class="singleData"><?php if ($this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']][$this->_tpl_vars['month_year']] == 0): ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
<?php else: ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']][$this->_tpl_vars['month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

								<?php endif; ?></span>	
							</div>
								</td>
								
							<?php endforeach; endif; unset($_from); ?>
							 <td ><div class="dataFocus">
								<span class="singleData">
								 <?php if ($this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['turnover'] == 0): ?>
									   <?php echo ((is_array($_tmp=$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

									   <?php else: ?>
										<?php echo ((is_array($_tmp=$this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['sales_suggested_currency']; ?>
;
								<?php endif; ?></span>	
							</div>
							</td>		
							</tr>
								<?php $this->assign('missioncount', 0); ?>
								<?php $this->assign('mission_array', ""); ?>
								<?php $this->assign('mission_array', $this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]); ?>
								<?php $_from = $this->_tpl_vars['mission_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mission_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mission_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission_item']):
        $this->_foreach['mission_loop']['iteration']++;
?>
								<?php $this->assign('mission_id', $this->_tpl_vars['mission_item']); ?>
								<?php if ($this->_tpl_vars['mission_id'] != "" && $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['mission_type'] && ((is_array($_tmp=$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?>
							<tr class="missionRow active <?php echo $this->_tpl_vars['mission_id']; ?>
">
									<td>
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
									<?php endif; ?>
									</td>
								<td ><span class="contractName pull-left"><?php echo $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['mission_type']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['mission_type_other'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>
</span></td>
													<?php $_from = $this->_tpl_vars['monthlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mission_month_item_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mission_month_item_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission_month_item']):
        $this->_foreach['mission_month_item_loop']['iteration']++;
?>
															<?php $this->assign('mission_month_year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['default_year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-') : smarty_modifier_cat($_tmp, '-')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['mission_month_item']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['mission_month_item']))); ?>
															<?php if ($this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['mission_month_year']] == 0): ?>
																<td class="mission-val"><div class="dataFocus">
														<span class="singleData"><p ><?php echo ((is_array($_tmp=$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['mission_month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</p>
														<input type="text" class="validate[required, custom[onlyCommaSp]]" id="splitturnover_<?php echo $this->_tpl_vars['mission_id']; ?>
_<?php echo $this->_tpl_vars['mission_month_year']; ?>
_<?php echo $this->_tpl_vars['quotecontract_id']; ?>
" style="display:none;" /></td>
															</span></div><?php else: ?>
																<td class="mission-val" ><div class="dataFocus">
															<span class="singleData">
																	<?php $this->assign('followup', ((is_array($_tmp=$this->_tpl_vars['mission_month_year'])) ? $this->_run_mod_handler('cat', true, $_tmp, '-from_followup') : smarty_modifier_cat($_tmp, '-from_followup'))); ?>
																<?php if ($this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['followup']] == 1): ?>
																<p class="entered_val"><?php echo ((is_array($_tmp=$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['mission_month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</p>
																<input type="text"  class="validate[required, custom[onlyCommaSp]]" id="splitturnover_<?php echo $this->_tpl_vars['mission_id']; ?>
_<?php echo $this->_tpl_vars['mission_month_year']; ?>
_<?php echo $this->_tpl_vars['quotecontract_id']; ?>
" value="<?php echo $this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['mission_month_year']]+0; ?>
" style="display:none;"/>
																<?php else: ?>
																<?php echo ((is_array($_tmp=$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']][$this->_tpl_vars['mission_month_year']])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

																<?php endif; ?>
																</span></div></td>
																<?php endif; ?>
															
													<?php endforeach; endif; unset($_from); ?>
												<td><div class="dataFocus">
															<span class="singleData">
													 <?php if ($this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['turnover'] == 0): ?>
														   <?php echo ((is_array($_tmp=$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

														   <?php else: ?>
															<?php echo ((is_array($_tmp=$this->_tpl_vars['mission_array'][$this->_tpl_vars['mission_id']]['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract_details']['contract_Contrat_details'][$this->_tpl_vars['quotecontract_id']]['sales_suggested_currency']; ?>
;
													<?php endif; ?></span></div>
												</td>	
													
											
										</tr>
										<?php endif; ?>
										<?php $this->assign('missioncount', $this->_tpl_vars['missioncount']+1); ?>
							<?php endforeach; endif; unset($_from); ?>
							
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
				    </tbody>
				</table>
				
				<!-- MOdel Popup for sales details -->
				
				</form>
				</div>
				</div>
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
		<a class="btn btn-primary" href="/turnover/split-month-report?download=pdf<?php if ($_GET['client_id']): ?>&client_id=<?php echo $_GET['client_id']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['default_year']): ?>&year=<?php echo $this->_tpl_vars['default_year']; ?>
<?php endif; ?><?php if ($_GET['sales_id']): ?>&sales_id=<?php echo $_GET['sales_id']; ?>
<?php endif; ?><?php if ($_GET['clientid']): ?>&client_id=<?php echo $_GET['clientid']; ?>
<?php endif; ?><?php if ($_GET['product']): ?>&product=<?php echo $_GET['product']; ?>
<?php endif; ?><?php if ($_GET['p_type']): ?>&p_type=<?php echo $_GET['p_type']; ?>
<?php endif; ?>">Export PDF</a>
			<a class="btn btn-primary" href="/turnover/split-month-report<?php if ($this->_tpl_vars['default_year']): ?>?year=<?php echo $this->_tpl_vars['default_year']; ?>
<?php endif; ?><?php if ($_GET['client_id']): ?>&client_id=<?php echo $_GET['client_id']; ?>
<?php endif; ?><?php if ($_GET['sales_id']): ?>&sales_id=<?php echo $_GET['sales_id']; ?>
<?php endif; ?><?php if ($_GET['clientid']): ?>&client_id=<?php echo $_GET['clientid']; ?>
<?php endif; ?><?php if ($_GET['product']): ?>&product=<?php echo $_GET['product']; ?>
<?php endif; ?><?php if ($_GET['p_type']): ?>&p_type=<?php echo $_GET['p_type']; ?>
<?php endif; ?>">Export XLS</a> 
				<?php endif; ?>
		
	</section>
<?php echo '
	<script>
		$(document).ready(function(){
				
				$(\'body\').on(\'hidden\', \'#contractmonthly\', function (){        
					$(this).removeData(\'modal\');				
					$(\'.modal-body\',this).html(\'<div style="text-align:center"><b>Please Wait Loading ...</b></div>\');		
					$("body").css("overflow", "auto");    
				});
				
		});
	
	</script>
'; ?>