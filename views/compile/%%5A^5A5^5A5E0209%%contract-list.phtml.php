<?php /* Smarty version 2.6.19, created on 2015-10-20 14:06:17
         compiled from gebo/quotecontractmission/contract-list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut_t', 'gebo/quotecontractmission/contract-list.phtml', 315, false),array('modifier', 'date_format', 'gebo/quotecontractmission/contract-list.phtml', 323, false),)), $this); ?>
<?php echo '
<script type="text/javascript">	
var assigncount =  0;
var usertype='; ?>
"<?php echo $this->_tpl_vars['user_type']; ?>
"<?php echo ';
$(document).ready(function() {
	if(assigncount>0)
	{
		$("#assigncount").text(assigncount);
		$("#assigncount").removeClass(\'hide\');
	}
	else
	$("#assigncount").addClass(\'hide\');
	
	$(".tooltips").popover({ trigger: "manual" ,placement: \'top\', html: true, animation:false})
	.on("mouseenter", function () {
		var _this = this;
		$(this).popover("show");
		$(".popover").on("mouseleave", function () {
			$(_this).popover(\'hide\');
		});
	}).on("mouseleave", function () {
		var _this = this;
		setTimeout(function () {
			if (!$(".popover:hover").length) {
				$(_this).popover("hide");
			}
		}, 300);
	});
	
	$("#salesuseropen, #contractsopen").chosen({allow_single_deselect:false,search_contains: true});
	  $("#salesusertovalid, #salesuser_contracts, #salesuserclosed, #contractsclosed, #deletedclients, #deletedsalesuser").chosen({allow_single_deselect:false,search_contains: true});
	  
	  $(\'#salesuseropen, #contractsopen\').on(\'change\', function(evt, params) {
		$(".openreplace").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadcontracts/\',{\'sid\':$("#salesuseropen").val(),\'table\':1,\'opened\':1,\'client_id\':$("#contractsopen").val()},function(data){$(".openreplace").html(data)})
	  });

	  $(\'#salesuserclosed, #contractsclosed\').on(\'change\', function(evt, params) {
		$(".closedreplace").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadcontracts/\',{\'sid\':$("#salesuserclosed").val(),\'table\':1,\'opened\':2,\'client_id\':$("#contractsclosed").val()},function(data){$(".closedreplace").html(data)})
	  });
	  
	   $(\'#salesusertovalid, #salesuser_contracts\').on(\'change\', function(evt, params) {
		$(".tovalidreplace").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadcontracts/\',{\'sid\':$("#salesusertovalid").val(),\'table\':1,\'opened\':0,\'client_id\':$("#salesuser_contracts").val()},function(data){$(".tovalidreplace").html(data)})
	  });
	
	    $(\'#deletedclients, #deletedsalesuser\').on(\'change\', function(evt, params) {
		$(".deletedreplace").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadcontracts/\',{\'sid\':$("#deletedsalesuser").val(),\'table\':1,\'opened\':3,\'client_id\':$("#deletedclients").val()},function(data){$(".deletedreplace").html(data)});
	  });
	if(usertype=="superadmin")
	{
		$(\'#openedList\').dataTable({
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"aaSorting": [[ 0, "asc" ]],
				"iDisplayLength":50,
				"aoColumns": [
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "numeric" },
					{ "sType": "string" },
					{ "sType": "eu_date" },
					{ "sType": "eu_date" },
					{ "sType": "string" },
					{ "sType": "string","bSortable": false  }
				]
			});
			$(\'#validatelist\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "aaSorting": [[ 0, "asc" ]],
			"iDisplayLength":50,
            "aoColumns": [
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
				{ "sType": "string" },
                { "sType": "eu_date" },
                { "sType": "eu_date" },
				{ "sType": "string" },
				{ "sType": "string","bSortable": false  }
            ]
        });
	}
	else
	{
	$(\'#openedList\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "aaSorting": [[ 0, "asc" ]],
			"iDisplayLength":50,
            "aoColumns": [
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "numeric" },
                { "sType": "string" },
                { "sType": "eu_date" },
                { "sType": "eu_date" },
				{ "sType": "string" }
            ]
        });
		
	$(\'#validatelist\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "aaSorting": [[ 0, "asc" ]],
			"iDisplayLength":50,
            "aoColumns": [
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
				{ "sType": "string" },
                { "sType": "eu_date" },
                { "sType": "eu_date" },
				{ "sType": "string" }
            ]
        });
	}
		
	$(\'#closedlist\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "aaSorting": [[ 0, "asc" ]],
			"iDisplayLength":50,
            "aoColumns": [
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "numeric" },
                { "sType": "string" },
                { "sType": "eu_date" },
                { "sType": "eu_date" },
				{ "sType": "string" },
				{ "sType": "string" }
            ]
        });
	$(\'#deletedlist\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "aaSorting": [[ 0, "asc" ]],
			"iDisplayLength":50,
            "aoColumns": [
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "numeric" },
                { "sType": "string" },
                { "sType": "eu_date" },
                { "sType": "eu_date" },
				{ "sType": "string" }
            ]
        });
		
	$(document).on("click",".closecontract",function(){
		if($(".closecontract:checked").length)
			$("#showcmclose").show();
		else
			$("#showcmclose").hide();
	});
	$(document).on("click",".closecontract2",function(){
		if($(".closecontract2:checked").length)
			$("#showcmclose2").show();
		else
			$("#showcmclose2").hide();
	});
	$(document).on("click","#checktoassign",function(e){
		  if($("#checktoassign:checked").length)
		  {
			 $(".closecontract").prop("checked",true);  
			 if($(".closecontract:checked").length)
			 $("#showcmclose").show();
		  }
		  else
		  {
			 $(".closecontract").removeAttr("checked"); 
			 $("#showcmclose").hide();
		  }
	});
	$(document).on("click","#checktoassign2",function(e){
		  if($("#checktoassign2:checked").length)
		  {
			 $(".closecontract2").prop("checked",true);  
			 if($(".closecontract2:checked").length)
			 $("#showcmclose2").show();
		  }
		  else
		  {
			 $(".closecontract2").removeAttr("checked"); 
			 $("#showcmclose2").hide();
		  }
	});
	});
	function closebulkmissions(txt)
	{
		if(txt=="close" && $(".closecontract:checked").length==1)
		{
			$(\'#closesinglecontract\').modal(\'show\');
			$(".bulkstatus").val(\'closed\');
		}
		else
		{
			smoke.confirm("Are you sure? Want to "+txt+" this contracts",function(e)
			{
				if(e)
				{
					if(txt==\'close\')
						$(".bulkstatus").val(\'closed\');
					else
						$(".bulkstatus").val(\'deleted\');
					$("#cmclosebulk").submit();
				}
				else
				return false;
			});
		}
		return false;
	}
	function closebulkmissions2(txt)
	{
		if(txt=="close" && $(".closecontract2:checked").length==1)
		{
			$(\'#closesinglecontract2\').modal(\'show\');
			$(".bulkstatus").val(\'closed\');
		}
		else
		{
			smoke.confirm("Are you sure? Want to "+txt+" this contracts",function(e)
			{
				if(e)
				{
					if(txt==\'close\')
						$(".bulkstatus").val(\'closed\');
					else
						$(".bulkstatus").val(\'deleted\');
					$("#cmclosebulk2").submit();
				}
				else
				return false;
			});
		}
		return false;
	}
</script>
'; ?>

<div class="row-fluid">
	<div class="span12">
    	<h1 class="heading pull-left">Contract Follow Up</h1>
		<div class="clearfix"></div>
		<div class="row-fluid">
			<ul class="nav nav-tabs">
				<li class="<?php if ($_GET['active'] == ''): ?> active <?php endif; ?>"><a href="#openedup" data-toggle="tab">Opened</a></li>
				<li class="<?php if ($_GET['active'] == 'validate'): ?> active <?php endif; ?>"><a href="#validateup" data-toggle="tab" class="">To Validate&nbsp;<span class="badge badge-warning" id="assigncount"></span></a></li>
				<li class="<?php if ($_GET['active'] == 'finished'): ?> active <?php endif; ?>"><a href="#finishedup" data-toggle="tab">Finished / Closed</a></li>
				<li class="<?php if ($_GET['active'] == 'deleted'): ?> active <?php endif; ?>">
					<a href="#deletedtab" data-toggle="tab">Deleted</a>
				</li>
			</ul>	
			<div class="tab-content" style="overflow:hidden;min-height:400px">
			<div class="tab-pane <?php if ($_GET['active'] == ''): ?> active <?php endif; ?>" id="openedup">
				<div class="row-fluid">
					<div class="">
					<select data-placeholder="All Sales" id="salesuseropen" class='cselect'>
						<option value="">All User</option>
						<?php $_from = $this->_tpl_vars['contracts_opened_sales_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
						   <option value="<?php echo $this->_tpl_vars['key']; ?>
" ><?php echo $this->_tpl_vars['user']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
					<select data-placeholder="All Clients" id="contractsopen" class='cselect'>
						<option value="">All Clients</option>
						<?php $_from = $this->_tpl_vars['contracts_opened_clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
						   <option value="<?php echo $this->_tpl_vars['key']; ?>
" ><?php echo $this->_tpl_vars['user']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
					</div>
				</div>
				<form class="" action="/contractmission/close-bulk-contract" name="" id="cmclosebulk" method="POST" enctype='multipart/form-data'>
				<div class="row-fluid">
					<div class="openreplace">
					<table class="table table-bordered table-hover table_vam" id="openedList" >
						<thead>
							<tr>
							   <th style="display:none"></th>
							   <th>Contract Name</th>
							   <th>Turnover</th>
							   <th>% Done</th>
							   <th>Duration</th>
							   <th>Company Name</th>
							   <th>Expected Launch</th>
							   <th>Expected End</th>
							   <th>Action</th>
							   <?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
							   <th>
								<input type="checkbox" id="checktoassign" />
							   </th>
							   <?php endif; ?>
							</tr>
						</thead>
						<tbody>
						<?php $_from = $this->_tpl_vars['contracts_opened']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contract']):
        $this->_foreach['contracts']['iteration']++;
?>
							<tr>
							   <td style="display:none"></td>
							   <td>
							  <a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&action=view"><?php echo $this->_tpl_vars['contract']['contractname']; ?>
</a>
							   </td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract']['sales_suggested_currency']; ?>
;</td>
							   <td><?php echo $this->_tpl_vars['contract']['percentage']; ?>
</td>
							   <td><?php echo $this->_tpl_vars['contract']['duration']; ?>
</td>
							   <td>
							   <a class="hint--left" data-hint="<?php if ($this->_tpl_vars['contract']['clfname'] || $this->_tpl_vars['contract']['cllname']): ?><?php echo $this->_tpl_vars['contract']['clfname']; ?>
 <?php echo $this->_tpl_vars['contract']['cllname']; ?>
<?php else: ?><?php echo $this->_tpl_vars['contract']['clemail']; ?>
<?php endif; ?>" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['contract']['client_id']; ?>
&submenuId=ML13-SL1">
							   <?php echo $this->_tpl_vars['contract']['company_name']; ?>

							   </a>
							   </td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['expected_launch_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['expected_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
							   <td>
								<div class="btn-group">
									<a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&action=view" class="btn">View contract</a>
									<a href="" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-plus" style="opacity:0.5"></i></a>
									<ul class="dropdown-menu">
									  <li><a href="/contractmission/missions-list?submenuId=ML13-SL4&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
"><i class="icon-list-alt"></i> View Missions</a></li>
									</ul>
								</div>
								</td>
								<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
									<td>
										<input type="checkbox" class="closecontract" name="closecontract[<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
]" value="<?php echo $this->_tpl_vars['contract']['quoteid']; ?>
" />
									</td>
								<?php endif; ?>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
					</div>
					<div style="position:fixed;top:35%;right:0;display:none" id="showcmclose">
						<input type="button" name="cmclose1" value="Close" onclick="return closebulkmissions('close')" class="btn btn-danger" />
						<input type="button" name="delete" value="Delete" onclick="return closebulkmissions('delete')" class="btn btn-danger" />
						<input type="hidden" name="cmclose" value="1" />
						<input type="hidden" name="bulkstatus" class="bulkstatus" value="" />
					</div>
					<div class="modal hide fade" id="closesinglecontract" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header">
							<button class="close" data-dismiss="modal" >&times;</button>
							<h3>Close contract</h3>
						</div>
						<div class="modal-body">
							<div class="row-fluid">
								<div class="control-group">
									<label class="control-label">Commentaire</label>
									<div class="controls">
										<textarea cols="30" id="comments" name="comment" rows="5" class="span12"></textarea>
									</div>
								</div>
							</div>
							<div class="control-group">
								<div class="controls pull-center">
									<button id="valid-sign-old" class="btn btn-primary" type="submit">Valider</button>
									<button  class="btn" data-dismiss="modal" type="reset">Annuler</button>
								</div>
							</div>
						</div>
						<div class="modal-footer">
						</div>
					</div>
				</div>
				</form>
			</div>
			<div class="tab-pane <?php if ($_GET['active'] == 'validate'): ?> active <?php endif; ?>" id="validateup">
					<div class="row-fluid">
					<select data-placeholder="All Sales" id="salesusertovalid" class='cselect'>
						<option value="">All User</option>
						<?php $_from = $this->_tpl_vars['tovalidate_sales_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
						   <option value="<?php echo $this->_tpl_vars['key']; ?>
" ><?php echo $this->_tpl_vars['user']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
					<select data-placeholder="All Sales" id="salesuser_contracts" class='cselect'>
						<option value="">All Clients</option>
						<?php $_from = $this->_tpl_vars['tovalidate_clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
						   <option value="<?php echo $this->_tpl_vars['key']; ?>
" ><?php echo $this->_tpl_vars['user']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
					</div>
					<form class="" action="/contractmission/close-bulk-contract" name="" id="cmclosebulk2" method="POST" enctype='multipart/form-data'>
					<div class="row-fluid">
					<div class="tovalidreplace">
					<table class="table table-bordered table-hover table_vam" id="validatelist" >
						<thead>
							<tr>
							   <th style="display:none"></th>
							   <th>Contract Name</th>
							   <th>Turnover</th>
							   <th>Duration</th>
							   <th>Company Name</th>
							   <th>Expected Launch</th>
							   <th>Expected End</th>
							   <th>Action</th>
							   <?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
							   <th>
								<input type="checkbox" id="checktoassign2" />
							   </th>
							   <?php endif; ?>
							</tr>
						</thead>
						<tbody>
						<?php $this->assign('toassigncount', 0); ?>
						<?php $_from = $this->_tpl_vars['contracts_to_validate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contract']):
        $this->_foreach['contracts']['iteration']++;
?>
							<tr>
							   <td style="display:none"></td>
							   <td>
							   <a href='/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
'> <?php echo $this->_tpl_vars['contract']['contractname']; ?>
</a>
							   </td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract']['sales_suggested_currency']; ?>
;</td>
							   <td><?php echo $this->_tpl_vars['contract']['duration']; ?>
</td>
							   <td>
							   <a class="hint--left" data-hint="<?php if ($this->_tpl_vars['contract']['clfname'] || $this->_tpl_vars['contract']['cllname']): ?><?php echo $this->_tpl_vars['contract']['clfname']; ?>
 <?php echo $this->_tpl_vars['contract']['cllname']; ?>
<?php else: ?><?php echo $this->_tpl_vars['contract']['clemail']; ?>
<?php endif; ?>" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['contract']['client_id']; ?>
&submenuId=ML13-SL1">
							   <?php echo $this->_tpl_vars['contract']['company_name']; ?>

							   </a>
							   </td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['expected_launch_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['expected_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
							   <td> <a href='/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
' class="btn">Validate Contract</a></td>
							   <?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
									<td>
										<input type="checkbox" class="closecontract2" name="closecontract[<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
]" value="<?php echo $this->_tpl_vars['contract']['quoteid']; ?>
" />
									</td>
								<?php endif; ?>
							</tr>
							<?php $this->assign('toassigncount', $this->_tpl_vars['toassigncount']+1); ?>
						<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
					</div>
					<div style="position:fixed;top:35%;right:0;display:none" id="showcmclose2">
						<input type="button" name="cmclose1" value="Close" onclick="return closebulkmissions2('close')" class="btn btn-danger" />
						<input type="button" name="delete" value="Delete" onclick="return closebulkmissions2('delete')" class="btn btn-danger" />
						<input type="hidden" name="cmclose" value="1" />
						<input type="hidden" name="bulkstatus" class="bulkstatus" value="" />
					</div>
					<div class="modal hide fade" id="closesinglecontract2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header">
							<button class="close" data-dismiss="modal" >&times;</button>
							<h3>Close contract</h3>
						</div>
						<div class="modal-body">
							<div class="row-fluid">
								<div class="control-group">
									<label class="control-label">Commentaire</label>
									<div class="controls">
										<textarea cols="30" id="comments" name="comment" rows="5" class="span12"></textarea>
									</div>
								</div>
							</div>
							<div class="control-group">
								<div class="controls pull-center">
									<button id="valid-sign-old" class="btn btn-primary" type="submit">Valider</button>
									<button  class="btn" data-dismiss="modal" type="reset">Annuler</button>
								</div>
							</div>
						</div>
						<div class="modal-footer">
						</div>
					</div>
					</div>
					</form>
			</div>
			<div class="tab-pane <?php if ($_GET['active'] == 'finished'): ?> active <?php endif; ?>" id="finishedup">
				<div class="row-fluid">
					<div class="">
					<select data-placeholder="All Sales" id="salesuserclosed" class='cselect'>
						<option value="">All User</option>
						<?php $_from = $this->_tpl_vars['contracts_finished_sales_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
						   <option value="<?php echo $this->_tpl_vars['key']; ?>
" ><?php echo $this->_tpl_vars['user']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
					<select data-placeholder="All Sales" id="contractsclosed" class='cselect'>
						<option value="">All Clients</option>
						<?php $_from = $this->_tpl_vars['contracts_finished_clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
						   <option value="<?php echo $this->_tpl_vars['key']; ?>
" ><?php echo $this->_tpl_vars['user']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
					</div>
				</div>
				<div class="row-fluid">
					<div class="closedreplace">
					<table class="table table-bordered table-hover table_vam" id="closedlist" >
						<thead>
							<tr>
							   <th style="display:none"></th>
							   <th>Contract Name</th>
							   <th>Turnover</th>
							   <th>% Done</th>
							   <th>Duration</th>
							   <th>Company Name</th>
							   <th>Expected Launch</th>
							   <th>Expected End</th>
							   <th>Action</th>
							   <th>Status</th>
							</tr>
						</thead>
						<tbody>
						<?php $_from = $this->_tpl_vars['contracts_finished']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contract']):
        $this->_foreach['contracts']['iteration']++;
?>
							<tr>
							   <td style="display:none"></td>
							   <td>
							  <a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&action=view"><?php echo $this->_tpl_vars['contract']['contractname']; ?>
</a>
							   </td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract']['sales_suggested_currency']; ?>
;</td>
							   <td><?php echo $this->_tpl_vars['contract']['percentage']; ?>
</td>
							   <td><?php echo $this->_tpl_vars['contract']['duration']; ?>
</td>
							   <td>
							   <a class="hint--left" data-hint="<?php if ($this->_tpl_vars['contract']['clfname'] || $this->_tpl_vars['contract']['cllname']): ?><?php echo $this->_tpl_vars['contract']['clfname']; ?>
 <?php echo $this->_tpl_vars['contract']['cllname']; ?>
<?php else: ?><?php echo $this->_tpl_vars['contract']['clemail']; ?>
<?php endif; ?>" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['contract']['client_id']; ?>
&submenuId=ML13-SL1">
							   <?php echo $this->_tpl_vars['contract']['company_name']; ?>

							   </a>
							   </td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['expected_launch_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['expected_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
							   <td>
								<div class="btn-group">
									<a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&action=view" class="btn">View contract</a>
									<a href="" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-plus" style="opacity:0.5"></i></a>
									<ul class="dropdown-menu">
									  <li><a href="/contractmission/missions-list?submenuId=ML13-SL4&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
"><i class="icon-list-alt"></i> View Missions</a></li>
									</ul>
								</div>
								</td>
								<td><label class="label label-info">Finished</label></td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
						<?php $_from = $this->_tpl_vars['contracts_closed']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contract']):
        $this->_foreach['contracts']['iteration']++;
?>
							<tr>
							   <td style="display:none"></td>
							   <td>
							  <a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&action=view"><?php echo $this->_tpl_vars['contract']['contractname']; ?>
</a>
								  <?php $this->assign('closedc_status', 0); ?>
							  <?php if ($this->_tpl_vars['contract']['closed_comment']): ?>
									<a href="/contractmission/add-comments?submenuId=ML13-SL4&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&comment=<?php echo $this->_tpl_vars['closedc_status']; ?>
&quote_id=<?php echo $this->_tpl_vars['contract']['quoteid']; ?>
&cstatus=view" data-toggle="modal" tabindex="-1" data-target="#closed_comment">
										<i class="splashy-comments"></i>
									</a>
									 <?php $this->assign('closedc_status', 1); ?>
							  <?php endif; ?>
							   </td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract']['sales_suggested_currency']; ?>
;</td>
							   <td><?php echo $this->_tpl_vars['contract']['percentage']; ?>
</td>
							   <td><?php echo $this->_tpl_vars['contract']['duration']; ?>
</td>
							   <td>
							   <a class="hint--left" data-hint="<?php if ($this->_tpl_vars['contract']['clfname'] || $this->_tpl_vars['contract']['cllname']): ?><?php echo $this->_tpl_vars['contract']['clfname']; ?>
 <?php echo $this->_tpl_vars['contract']['cllname']; ?>
<?php else: ?><?php echo $this->_tpl_vars['contract']['clemail']; ?>
<?php endif; ?>" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['contract']['client_id']; ?>
&submenuId=ML13-SL1">
							   <?php echo $this->_tpl_vars['contract']['company_name']; ?>

							   </a>
							   </td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['expected_launch_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['expected_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
							   <td>
								<div class="btn-group">
									<a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&action=view" class="btn">View contract</a>
									<a href="" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-plus" style="opacity:0.5"></i></a>
									<ul class="dropdown-menu">
									  <li><a href="/contractmission/missions-list?submenuId=ML13-SL4&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
"><i class="icon-list-alt"></i> View Missions</a></li>
									<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
									  <li><a href="/contractmission/add-comments?submenuId=ML13-SL4&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&comment=<?php echo $this->_tpl_vars['closedc_status']; ?>
&quote_id=<?php echo $this->_tpl_vars['contract']['quoteid']; ?>
&cstatus=add" data-toggle="modal" tabindex="-1" data-target="#closed_comment"><i class="splashy-comments"></i></i> Add comment</a></li>
									<?php endif; ?>
									</ul>
								</div>
								</td>
								<td>
								<label class="label label-important">Closed</label>
								</td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
			<!-- Start of Deleted Contracts -->
			<div class="tab-pane <?php if ($_GET['active'] == 'deleted'): ?> active <?php endif; ?>" id="deletedtab">
				<div class="row-fluid">
					<div class="">
					<select data-placeholder="All Sales" id="deletedsalesuser" class='cselect'>
						<option value="">All User</option>
						<?php $_from = $this->_tpl_vars['contracts_deleted_sales_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
						   <option value="<?php echo $this->_tpl_vars['key']; ?>
" ><?php echo $this->_tpl_vars['user']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
					<select data-placeholder="All Sales" id="deletedclients" class='cselect'>
						<option value="">All Clients</option>
						<?php $_from = $this->_tpl_vars['contracts_deleted_clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
						   <option value="<?php echo $this->_tpl_vars['key']; ?>
" ><?php echo $this->_tpl_vars['user']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
					</div>
				</div>
				<div class="row-fluid">
					<div class="deletedreplace">
					<table class="table table-bordered table-hover table_vam" id="deletedlist" >
						<thead>
							<tr>
							   <th style="display:none"></th>
							   <th>Contract Name</th>
							   <th>Turnover</th>
							   <th>% Done</th>
							   <th>Duration</th>
							   <th>Company Name</th>
							   <th>Expected Launch</th>
							   <th>Expected End</th>
							   <th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $_from = $this->_tpl_vars['contracts_deleted']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contract']):
        $this->_foreach['contracts']['iteration']++;
?>
							<tr>
							   <td style="display:none"></td>
							   <td>
							  <a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&action=view"><?php echo $this->_tpl_vars['contract']['contractname']; ?>
</a>
							   </td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract']['sales_suggested_currency']; ?>
;</td>
							   <td><?php echo $this->_tpl_vars['contract']['percentage']; ?>
</td>
							   <td><?php echo $this->_tpl_vars['contract']['duration']; ?>
</td>
							   <td>
							   <a class="hint--left" data-hint="<?php if ($this->_tpl_vars['contract']['clfname'] || $this->_tpl_vars['contract']['cllname']): ?><?php echo $this->_tpl_vars['contract']['clfname']; ?>
 <?php echo $this->_tpl_vars['contract']['cllname']; ?>
<?php else: ?><?php echo $this->_tpl_vars['contract']['clemail']; ?>
<?php endif; ?>" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['contract']['client_id']; ?>
&submenuId=ML13-SL1">
							   <?php echo $this->_tpl_vars['contract']['company_name']; ?>

							   </a>
							   </td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['expected_launch_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
							   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['expected_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
							   <td>
								<div class="btn-group">
									<a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&action=view" class="btn">View contract</a>
									<a href="" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-plus" style="opacity:0.5"></i></a>
									<ul class="dropdown-menu">
									  <li><a href="/contractmission/missions-list?submenuId=ML13-SL4&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
"><i class="icon-list-alt"></i> View Missions</a></li>
									</ul>
								</div>
								</td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
			<!-- End of Deleted Contracts -->
		</div>
		</div>
	</div>
</div>
<!-- Add or view comments-->
<div class="modal container hide fade" id="closed_comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Closed comment</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>
<?php echo '
<script>
	assigncount =  '; ?>
"<?php echo $this->_tpl_vars['toassigncount']; ?>
"<?php echo ';
</script>
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
'; ?>