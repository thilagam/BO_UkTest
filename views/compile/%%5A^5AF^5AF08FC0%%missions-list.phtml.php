<?php /* Smarty version 2.6.19, created on 2015-12-14 14:56:12
         compiled from gebo/quotecontractmission/missions-list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quotecontractmission/missions-list.phtml', 254, false),array('modifier', 'date_format', 'gebo/quotecontractmission/missions-list.phtml', 291, false),array('modifier', 'strtotime', 'gebo/quotecontractmission/missions-list.phtml', 300, false),array('modifier', 'zero_cut_t', 'gebo/quotecontractmission/missions-list.phtml', 451, false),)), $this); ?>
<?php echo '
<link href="/BO/theme/gebo/css/mission-followup.css" rel="stylesheet" />
<style>
.otherdetails .image
{
	margin:0;
	height:32px;
	width:32px;
}
</style>
<script type="text/javascript">	
var usertype='; ?>
"<?php echo $this->_tpl_vars['user_type']; ?>
"<?php echo ';
$(document).ready(function() {
	
	if(usertype=="superadmin" || usertype=="prodmanager")
	{
		/*$(\'#openedList\').dataTable({
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
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "eu_date" },
					{ "sType": "eu_date" },
					{ "sType": "string" },
					{ "sType": "string","bSortable": false  }
				]
			});
			$(\'#validateList\').dataTable({
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
                { "sType": "string" },
                { "sType": "eu_date" },
                { "sType": "eu_date" },
                { "sType": "string" },
                { "sType": "string","bSortable": false  }
            ]
        });*/
	}
	else
	{
		/*$(\'#openedList\').dataTable({
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
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "eu_date" },
					{ "sType": "eu_date" },
					{ "sType": "string" }
				]
		});
		$(\'#validateList\').dataTable({
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
                { "sType": "string" },
                { "sType": "eu_date" },
                { "sType": "eu_date" },
                { "sType": "string" }
            ]
        });*/
	}
				
	
	
	/*$(\'#closedList, #deletedList\').dataTable({
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
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "eu_date" },
                { "sType": "eu_date" },
                { "sType": "string" }
            ]
        });*/
		$(document).on("click","[name=closemission\\\\[\\\\]]",function(){
			if($("[name=closemission\\\\[\\\\]]:checked").length)
				$("#showcmclose").show();
			else
				$("#showcmclose").hide();
		})
		$(document).on("click",".closevalidatemissions",function(){
			if($(".closevalidatemissions:checked").length)
				$("#showcmclose1").show();
			else
				$("#showcmclose1").hide();
		})
});	
	function closemissions(txt)
	{
		return smoke.confirm("Are you sure? Want to "+txt+" this mission",function(e)
		{
			if(e)
			{
				if(txt==\'close\')
					$(".bulkstatus").val(\'closed\');
				else
					$(".bulkstatus").val(\'deleted\');
				$("#closemission").submit();
			}
			else
			return false;
		});
	}
	function closebulkmissions(txt)
	{
		return smoke.confirm("Are you sure? Want to "+txt+" this mission",function(e)
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
</script>
'; ?>


<div class="row-fluid">
	<div class="span12">
    	<h1 class="heading pull-left">Missions List
    		<select data-placeholder="All Client" id="allclient" class="cselect">
				<option value="">All Client</option>
				<?php $_from = $this->_tpl_vars['clientlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractclint'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractclint']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cltkey'] => $this->_tpl_vars['contractclint']):
        $this->_foreach['contractclint']['iteration']++;
?>
				<option value="<?php echo $this->_tpl_vars['cltkey']; ?>
" <?php if ($_GET['client_id'] == $this->_tpl_vars['cltkey']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['contractclint']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select>
			<select data-placeholder="All Contracts" id="allcontract" class="cselect">
				<option value="">All Contracts</option>
				<?php $_from = $this->_tpl_vars['contractlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contrkey'] => $this->_tpl_vars['contract']):
        $this->_foreach['contracts']['iteration']++;
?>
				<option value="<?php echo $this->_tpl_vars['contrkey']; ?>
" <?php if ($_GET['contract_id'] == $this->_tpl_vars['contrkey']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['contract']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select>
			<select data-placeholder="All Sales" id="pm" class="cselect">
						<option value="">All User</option>
						<?php $_from = $this->_tpl_vars['alluserlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
							   <option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($_GET['pmid'] == $this->_tpl_vars['key']): ?> selected<?php endif; ?> ><?php echo $this->_tpl_vars['user']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
					</select>
					<select data-placeholder="All Language" id="langauges" class="cselect">
						<option value="">All Language</option>
						<?php $_from = $this->_tpl_vars['alllanguagelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
						   <option value="<?php echo $this->_tpl_vars['k']; ?>
" ><?php echo $this->_tpl_vars['v']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
		</h1>
		<div class="clearfix"></div>
		<div class="row-fluid otherdetails">
			<ul class="nav nav-tabs">
				<li class="<?php if ($_GET['active'] == ''): ?> active <?php endif; ?> assignopened"><a href="#opened" data-toggle="tab">Ongoing</a></li>
				<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'techmanager' || $this->_tpl_vars['user_type'] == 'seomanager' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?>
				<li class="<?php if ($_GET['active'] == 'validate'): ?> active <?php endif; ?> assigntab"><a href="#validate" data-toggle="tab">To assign&nbsp;<span class="badge badge-warning" id="assigncount"></span></a></li>
				<?php endif; ?>
				<li class="<?php if ($_GET['active'] == 'finished'): ?> active <?php endif; ?>"><a href="#finished" data-toggle="tab">Validated / Closed</a></li>
				<li class="<?php if ($_GET['active'] == 'deleted'): ?> active <?php endif; ?>"><a href="#deletedtab" data-toggle="tab">Deleted</a></li>
			</ul>	
			<div class="tab-content allmissions">
				<!-- Opened Starts -->
				<div class="tab-pane <?php if ($_GET['active'] == ''): ?> active <?php endif; ?>" id="opened"  style="min-height:400px">
					<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'techmanager' || $this->_tpl_vars['user_type'] == 'seomanager' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?>
					<div class="row-fluid">
										</div>
					<?php endif; ?>
					<form class="" action="/contractmission/close-bulk-mission" name="" id="closemission" method="POST" enctype='multipart/form-data'>
					<div class="missionsopenreplace">
					<table class="table table-bordered table-hover table_vam" id="openedList" >
						<thead>
							<tr>
							   <th style="display:none"></th>
							   <!--<th>Company Name</th>-->
							   <th></th>
							   <th>Mission</th>
							   <th>Nb words</th>
							   <th>Source Language</th>
							   <th>Destination Language</th>
							   <th>% Done</th>
							   
							   <th>Expected Launch</th>
							   <th>Expected End</th>
							   <th>Action</th>
							   <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?>
							   <th class="no-sort">
								<input type="checkbox" id="checkopened" />
							   </th>
							   <?php endif; ?>
							</tr>
						</thead>
						<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'techmanager' || $this->_tpl_vars['user_type'] == 'seomanager' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?>
						<tbody>
							<?php if (count($this->_tpl_vars['contractmissionsopened']) > 0): ?>
							<?php $_from = $this->_tpl_vars['contractmissionsopened']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractclients'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractclients']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['clients']):
        $this->_foreach['contractclients']['iteration']++;
?>
							<?php if ($this->_tpl_vars['clients']['company_name'] != ""): ?>
							<tr>
								<td colspan="10" ><h3><span class="pull-left"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['key']; ?>
/<?php echo $this->_tpl_vars['key']; ?>
_global.png?12345"  alt="<?php echo $this->_tpl_vars['clients']['company_name']; ?>
" width="60"> <?php echo $this->_tpl_vars['clients']['company_name']; ?>
</span></h3></td>
							</tr>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['clients']['contract_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractids'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractids']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contractid'] => $this->_tpl_vars['missions']):
        $this->_foreach['contractids']['iteration']++;
?>
							<?php if ($this->_tpl_vars['clients'][$this->_tpl_vars['contractid']]['contractname'] != ""): ?>
							<tr>
								<th colspan="10"><span class="pull-left"><?php echo $this->_tpl_vars['clients'][$this->_tpl_vars['contractid']]['contractname']; ?>
</span></th>
							</tr>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['missions']['mission_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['contracts']['iteration']++;
?>
							<tr>
								<td  style="display:none"></td>
								<!--<td>
								<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['mission']['client_name']; ?>
" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['mission']['client_id']; ?>
&submenuId=ML13-SL1">
									<?php echo $this->_tpl_vars['mission']['company_name']; ?>

								</a>
								</td>-->
								<td>
								<?php if ($this->_tpl_vars['mission']['pmid']): ?>
								<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['mission']['pmnew']; ?>
">
								<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['pmid']; ?>
/logo.jpg?123" class="image rd_30" alt="<?php echo $this->_tpl_vars['mission']['pmnew']; ?>
">
								</a>
								<?php else: ?>
								-
								<?php endif; ?>
								</td>
								<td>
								<a href="/followup/<?php echo $this->_tpl_vars['mission']['type']; ?>
?submenuId=ML13-SL4&cmid=<?php echo $this->_tpl_vars['mission']['cmid']; ?>
&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
" class="pull-left" class="pull-left"><?php echo $this->_tpl_vars['mission']['title']; ?>
</a>
								</td>
								<td><?php echo $this->_tpl_vars['mission']['nb_words']; ?>
</td>
								<td><?php echo $this->_tpl_vars['mission']['source_language']; ?>
</td>
								<td><?php echo $this->_tpl_vars['mission']['destination_language']; ?>
</td>
								<td><?php if ($this->_tpl_vars['mission']['percentage'] == "%"): ?>-<?php else: ?><?php echo $this->_tpl_vars['mission']['percentage']; ?>
<?php endif; ?></td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['ldate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['edate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
								<td>
								<?php if ($this->_tpl_vars['mission']['type'] != 'sales'): ?>
								<div class="btn-group">
									<a href="/followup/<?php echo $this->_tpl_vars['mission']['type']; ?>
?submenuId=ML13-SL4&cmid=<?php echo $this->_tpl_vars['mission']['cmid']; ?>
&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
" class="btn">View mission</a>
									<a href="" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-plus" style="opacity:0.5"></i></a>
									<ul class="dropdown-menu">
									  <li><a href="/contractmission/assign-mission?submenuId=ML13-SL3&type=<?php echo $this->_tpl_vars['mission']['type']; ?>
&contract_id=<?php echo $this->_tpl_vars['mission']['cid']; ?>
&cmid=&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
"><i class="icon-user"></i> Reassign</a></li>
										  <?php if (((is_array($_tmp=$this->_tpl_vars['mission']['edate'])) ? $this->_run_mod_handler('strtotime', true, $_tmp) : strtotime($_tmp)) < time()): ?>
									<li>	 <a href="/contractmission/close-mission?submenuId=ML13-SL3&type=<?php echo $this->_tpl_vars['mission']['type']; ?>
&contract_id=<?php echo $this->_tpl_vars['mission']['cid']; ?>
&cmid=<?php echo $this->_tpl_vars['mission']['cmid']; ?>
" class="closemission"><i class="icon-remove"></i> Close Mission</a>  </li>
										  <?php endif; ?>
									</ul>
								</div>
								<?php else: ?>
									<a href="/followup/<?php echo $this->_tpl_vars['mission']['type']; ?>
?submenuId=ML13-SL4&cmid=<?php echo $this->_tpl_vars['mission']['cmid']; ?>
&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
" class="btn">View mission</a>
								<?php endif; ?>
								</td>
								<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?>
									<td>
																			<input type="checkbox" name="closemission[]" value="<?php echo $this->_tpl_vars['mission']['cmid']; ?>
" />
																				</td>
								<?php endif; ?>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
							<tr>
							<td colspan="10">No matching records found</td>
							</tr>
							<?php endif; ?>
						</tbody>
						<?php else: ?>
						<tbody>
							<?php if (count($this->_tpl_vars['contractmissionsopened']) > 0): ?>
							<?php $_from = $this->_tpl_vars['contractmissionsopened']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractclients'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractclients']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['clients']):
        $this->_foreach['contractclients']['iteration']++;
?>
							<?php if ($this->_tpl_vars['clients']['company_name'] != ""): ?>
							<tr>
								<th colspan="9" ><h3><span class="pull-left"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['key']; ?>
/<?php echo $this->_tpl_vars['key']; ?>
_global.png?12345"  alt="<?php echo $this->_tpl_vars['clients']['company_name']; ?>
" width="60"> <?php echo $this->_tpl_vars['clients']['company_name']; ?>
</span></h3></th>
							</tr>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['clients']['contract_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractids'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractids']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contractid'] => $this->_tpl_vars['missions']):
        $this->_foreach['contractids']['iteration']++;
?>
							<?php if ($this->_tpl_vars['clients'][$this->_tpl_vars['contractid']]['contractname'] != ""): ?>
							<tr>
								<th colspan="9"><span class="pull-left"><?php echo $this->_tpl_vars['clients'][$this->_tpl_vars['contractid']]['contractname']; ?>
</span></th>
							</tr>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['missions']['mission_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['contracts']['iteration']++;
?>
							<tr>
								<td  style="display:none"></td>
								<!--<td>
								<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['mission']['client_name']; ?>
" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['mission']['client_id']; ?>
&submenuId=ML13-SL1">
									<?php echo $this->_tpl_vars['mission']['company_name']; ?>

								</a>
								</td>-->
								<td>
									<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['mission']['pmnew']; ?>
">
										<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['pmid']; ?>
/logo.jpg?123" class="image rd_30" alt="<?php echo $this->_tpl_vars['mission']['pmnew']; ?>
">
									</a>
								</td>
								<td>
								<a href="/followup/<?php echo $this->_tpl_vars['mission']['type']; ?>
?submenuId=ML13-SL4&cmid=<?php echo $this->_tpl_vars['mission']['cmid']; ?>
&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
" target="_blank" class="pull-left">
									<span  class="" style="cursor:pointer"><?php echo $this->_tpl_vars['mission']['title']; ?>

								</a>
								</td>
								<td><?php echo $this->_tpl_vars['mission']['source_language']; ?>
</td>
								<td><?php echo $this->_tpl_vars['mission']['destination_language']; ?>
</td>
								<td><?php if ($this->_tpl_vars['mission']['percentage'] == "%"): ?>-<?php else: ?><?php echo $this->_tpl_vars['mission']['percentage']; ?>
<?php endif; ?></td>
								<td><?php echo $this->_tpl_vars['mission']['nb_words']; ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['ldate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['edate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
								<td><a href="/followup/<?php echo $this->_tpl_vars['mission']['type']; ?>
?submenuId=ML13-SL4&cmid=<?php echo $this->_tpl_vars['mission']['cmid']; ?>
" class="btn">View mission</a></td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
							<tr>
							<td colspan="9">No matching records found</td>
							</tr>
							<?php endif; ?>
						</tbody>
						<?php endif; ?>
					</table>
					</div>
					<div style="position:fixed;top:35%;right:0;display:none" id="showcmclose">
						<input type="button" name="cmclose1" id="cmclose" onclick="return closemissions('close')" value="Close" class="btn btn-danger" />
						<input type="button" name="cmclose2" id="" onclick="return closemissions('delete')" value="Delete" class="btn btn-danger" />
						<input type="hidden" name="cmclose" value="1">
						<input type="hidden" name="bulkstatus" class="bulkstatus" value="" />
					</div> 
					</form>
				</div>
				
				<!-- Toassign Starts -->
				<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'techmanager' || $this->_tpl_vars['user_type'] == 'seomanager' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?>
				<div class="tab-pane <?php if ($_GET['active'] == 'validate'): ?> active <?php endif; ?>" id="validate"  style="min-height:400px">
										<form class="" action="/contractmission/close-bulk-mission" name="" id="cmclosebulk" method="POST" enctype='multipart/form-data'>
					<div class="missionsassignreplace">
					<table class="table table-bordered table-hover table_vam" id="validateList" >
						<thead>
							<tr>
								<th style="display:none"></th>
							   <!--<th>Company Name</th>-->
							   <th>Mission</th>
							   <th>Nb words</th>
							   <th>Turnover</th>
							   <th>Source Language</th>
							   <th>Destination Language</th>    
							   <th>Expected Launch</th>
							   <th>Expected End</th>                                     
							   <th>Action</th>                   
							   <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?>
								<th>	
								<input type="checkbox" id="checktoassign" />
								</th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php if (count($this->_tpl_vars['contractmissionstoassign']) > 0): ?>
							<?php $this->assign('toassigncount', 0); ?>
							<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
							<?php $_from = $this->_tpl_vars['contractmissionstoassign']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractclients'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractclients']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['clients']):
        $this->_foreach['contractclients']['iteration']++;
?>
							<?php if ($this->_tpl_vars['clients']['company_name'] != ""): ?>
							<tr>
								<th colspan="9" ><h3><span class="pull-left"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['key']; ?>
/<?php echo $this->_tpl_vars['key']; ?>
_global.png?12345"  alt="<?php echo $this->_tpl_vars['clients']['company_name']; ?>
" width="60"> <?php echo $this->_tpl_vars['clients']['company_name']; ?>
</span></h3></th>
							</tr>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['clients']['contract_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractids'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractids']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contractid'] => $this->_tpl_vars['missions']):
        $this->_foreach['contractids']['iteration']++;
?>
							<?php if ($this->_tpl_vars['clients'][$this->_tpl_vars['contractid']]['contractname'] != ""): ?>
							<tr>
								<th colspan="9"><span class="pull-left"><?php echo $this->_tpl_vars['clients'][$this->_tpl_vars['contractid']]['contractname']; ?>
</span></th>
							</tr>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['missions']['mission_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['contracts']['iteration']++;
?>		
							<tr>
								<td  style="display:none"></td>
								<!--<td>
									<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['mission']['client_name']; ?>
" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['mission']['client_id']; ?>
&submenuId=ML13-SL1">
										<?php echo $this->_tpl_vars['mission']['company_name']; ?>

									</a>
								</td>-->
								<td>
								<a href="/contractmission/assign-mission?submenuId=ML13-SL4&contract_id=<?php echo $this->_tpl_vars['mission']['cid']; ?>
&type=<?php echo $this->_tpl_vars['mission']['type']; ?>
&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
" class="pull-left">
								<?php echo $this->_tpl_vars['mission']['title']; ?>

								 </a> 
								</td>
								<td><?php echo $this->_tpl_vars['mission']['nb_words']; ?>
</td>
								<td><?php if ($this->_tpl_vars['mission']['turnover'] == 'Free'): ?>Free<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['mission']['currency']; ?>
;<?php endif; ?></td>
								<td><?php echo $this->_tpl_vars['mission']['source_language']; ?>
</td>
								<td><?php echo $this->_tpl_vars['mission']['destination_language']; ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['ldate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['edate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
								<td>
								<div class="btn-group">
								<a href="/contractmission/assign-mission?submenuId=ML13-SL4&contract_id=<?php echo $this->_tpl_vars['mission']['cid']; ?>
&type=<?php echo $this->_tpl_vars['mission']['type']; ?>
&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
"  class="btn">Assign mission</a>
								<a href="" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-plus" style="opacity:0.5"></i></a>
									<ul class="dropdown-menu">
									  <li>
									  <a href="/contractmission/close-mission?submenuId=ML13-SL3&type=<?php echo $this->_tpl_vars['mission']['type']; ?>
&contract_id=<?php echo $this->_tpl_vars['mission']['cid']; ?>
&cmid=&qmid=<?php echo $this->_tpl_vars['mission']['qmid']; ?>
&tid=<?php echo $this->_tpl_vars['mission']['tech_id']; ?>
&sid=<?php echo $this->_tpl_vars['mission']['sid']; ?>
" class="closemission"><i class="icon-remove"></i> Close Mission</a>
									  </li>
									</ul>
								</div>
								</td>
								<td>
								<?php if ($this->_tpl_vars['mission']['qmid']): ?>
									<input type="checkbox" class="closevalidatemissions" name="closemission[<?php echo $this->_tpl_vars['mission']['qmid']; ?>
]" value="<?php echo $this->_tpl_vars['mission']['type']; ?>
_<?php echo $this->_tpl_vars['mission']['cid']; ?>
" />
								<?php elseif ($this->_tpl_vars['mission']['tech_id']): ?>
									<input type="checkbox" class="closevalidatemissions" name="closemission[<?php echo $this->_tpl_vars['mission']['tech_id']; ?>
]" value="<?php echo $this->_tpl_vars['mission']['type']; ?>
_<?php echo $this->_tpl_vars['mission']['cid']; ?>
" />
								<?php elseif ($this->_tpl_vars['mission']['sid']): ?>
									<input type="checkbox" class="closevalidatemissions" name="closemission[<?php echo $this->_tpl_vars['mission']['sid']; ?>
]" value="<?php echo $this->_tpl_vars['mission']['type']; ?>
_<?php echo $this->_tpl_vars['mission']['cid']; ?>
" />
								<?php endif; ?>
								</td>
							</tr>
							<?php $this->assign('toassigncount', $this->_tpl_vars['toassigncount']+1); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
							<?php $_from = $this->_tpl_vars['contractmissionstoassign']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractclients'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractclients']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['clients']):
        $this->_foreach['contractclients']['iteration']++;
?>
							<?php if ($this->_tpl_vars['clients']['company_name'] != ""): ?>
							<tr>
								<th colspan="8" ><h3><span class="pull-left"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['key']; ?>
/<?php echo $this->_tpl_vars['key']; ?>
_global.png?12345"  alt="<?php echo $this->_tpl_vars['clients']['company_name']; ?>
" width="60"> <?php echo $this->_tpl_vars['clients']['company_name']; ?>
</span></h3></th>
							</tr>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['clients']['contract_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractids'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractids']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contractid'] => $this->_tpl_vars['missions']):
        $this->_foreach['contractids']['iteration']++;
?>
							<?php if ($this->_tpl_vars['clients'][$this->_tpl_vars['contractid']]['contractname'] != ""): ?>
							<tr>
								<th colspan="9"><span class="pull-left"><?php echo $this->_tpl_vars['clients'][$this->_tpl_vars['contractid']]['contractname']; ?>
</span></th>
							</tr>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['missions']['mission_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['contracts']['iteration']++;
?>			
							<tr>
								<td  style="display:none"></td>
								<!--<td>
									<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['mission']['client_name']; ?>
" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['mission']['client_id']; ?>
&submenuId=ML13-SL1">
										<?php echo $this->_tpl_vars['mission']['company_name']; ?>

									</a>
								</td>-->
								<td>
								<a href="/contractmission/assign-mission?submenuId=ML13-SL4&contract_id=<?php echo $this->_tpl_vars['mission']['cid']; ?>
&type=<?php echo $this->_tpl_vars['mission']['type']; ?>
&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
" class="pull-left" >
								<?php echo $this->_tpl_vars['mission']['title']; ?>

								 </a> 
								</td>
								<td><?php if ($this->_tpl_vars['mission']['turnover'] == 'Gratuit'): ?>Gratuit<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['mission']['currency']; ?>
;<?php endif; ?></td>
								<td><?php echo $this->_tpl_vars['mission']['source_language']; ?>
</td>
								<td><?php echo $this->_tpl_vars['mission']['destination_language']; ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['ldate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['edate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
								<td>
								<a href="/contractmission/assign-mission?submenuId=ML13-SL4&contract_id=<?php echo $this->_tpl_vars['mission']['cid']; ?>
&type=<?php echo $this->_tpl_vars['mission']['type']; ?>
&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
"  class="btn">Assign mission</a>
								</td>
								<?php if ($this->_tpl_vars['user_type'] == 'prodmanager'): ?>
								<td>
								<?php if ($this->_tpl_vars['mission']['qmid']): ?>
									<input type="checkbox" class="closevalidatemissions" name="closemission[<?php echo $this->_tpl_vars['mission']['qmid']; ?>
]" value="<?php echo $this->_tpl_vars['mission']['type']; ?>
_<?php echo $this->_tpl_vars['mission']['cid']; ?>
" />
								<?php elseif ($this->_tpl_vars['mission']['tech_id']): ?>
									<input type="checkbox" class="closevalidatemissions" name="closemission[<?php echo $this->_tpl_vars['mission']['tech_id']; ?>
]" value="<?php echo $this->_tpl_vars['mission']['type']; ?>
_<?php echo $this->_tpl_vars['mission']['cid']; ?>
" />
								<?php elseif ($this->_tpl_vars['mission']['sid']): ?>
									<input type="checkbox" class="closevalidatemissions" name="closemission[<?php echo $this->_tpl_vars['mission']['sid']; ?>
]" value="<?php echo $this->_tpl_vars['mission']['type']; ?>
_<?php echo $this->_tpl_vars['mission']['cid']; ?>
" />
								<?php endif; ?>
								</td>
								<?php endif; ?>
							</tr>
							<?php $this->assign('toassigncount', $this->_tpl_vars['toassigncount']+1); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>
							<?php else: ?>
							<tr>
							<td colspan="9">No matching records found</td>
							</tr>
							<?php endif; ?>
						</tbody>
					</table>
					</div>
					<div style="position:fixed;top:35%;right:0;display:none" id="showcmclose1">
						<input type="button" name="cmclosebulk1" id="" onclick="return closebulkmissions('close')" value="Close" class="btn btn-danger" />
						<input type="button" name="cmclosebulk2" id="" onclick="return closebulkmissions('delete')" value="Delete" class="btn btn-danger" />
						<input type="hidden" name="cmclosebulk" value="1" />
						<input type="hidden" name="bulkstatus" class="bulkstatus" value="" />
					</div>
					</form>
				</div>
				<?php endif; ?>
				<!-- Closed Starts -->
				<div class="tab-pane <?php if ($_GET['active'] == 'finished'): ?> active <?php endif; ?>" id="finished"  style="min-height:400px">
					<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'techmanager' || $this->_tpl_vars['user_type'] == 'seomanager' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?>
					<div class="row-fluid">
											</div>
				    <?php endif; ?>
					<div class="missionsfinished">
					<table class="table table-bordered table-hover table_vam" id="closedList" >
						<thead>
							<tr>
							<th style="display:none"></th>
							   <!--<th>Company Name</th>-->
							   <th></th>
							   <th>Mission</th>
							   <th>Nb words</th>
							   <th>Source Language</th>
							   <th>Destination Language</th>  
							   <th>% Done</th>                          
							   <th>Expected Launch</th>
							   <th>Expected End</th>                   
							   <th>Action</th>                   
							</tr>
						</thead>
						<tbody>
							<?php if (count($this->_tpl_vars['contractmissionsfinished']) > 0): ?>
							<?php $_from = $this->_tpl_vars['contractmissionsfinished']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractclients'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractclients']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['clients']):
        $this->_foreach['contractclients']['iteration']++;
?>
							<?php if ($this->_tpl_vars['clients']['company_name'] != ""): ?>
							<tr>
								<th colspan="9" ><h3><span class="pull-left"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['key']; ?>
/<?php echo $this->_tpl_vars['key']; ?>
_global.png?12345"  alt="<?php echo $this->_tpl_vars['clients']['company_name']; ?>
" width="60"> <?php echo $this->_tpl_vars['clients']['company_name']; ?>
</span></h3></th>
							</tr>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['clients']['contract_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractids'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractids']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contractid'] => $this->_tpl_vars['missions']):
        $this->_foreach['contractids']['iteration']++;
?>
							<?php if ($this->_tpl_vars['clients'][$this->_tpl_vars['contractid']]['contractname'] != ""): ?>
							<tr>
								<th colspan="9"><span class="pull-left"><?php echo $this->_tpl_vars['clients'][$this->_tpl_vars['contractid']]['contractname']; ?>
</span></th>
							</tr>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['missions']['mission_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['contracts']['iteration']++;
?>	
							<tr>
								<td  style="display:none"></td>
								<!--	<td><a class="hint--right" data-hint="<?php echo $this->_tpl_vars['mission']['client_name']; ?>
" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['mission']['client_id']; ?>
&submenuId=ML13-SL1">
									<?php echo $this->_tpl_vars['mission']['company_name']; ?>

								</a></td>-->
								<td>
								<?php if ($this->_tpl_vars['mission']['pmid']): ?>
								<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['mission']['pmnew']; ?>
">
								<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['pmid']; ?>
/logo.jpg?123" class="image rd_30" height="50" alt="<?php echo $this->_tpl_vars['mission']['pmnew']; ?>
">
								</a>
								<?php else: ?>
								-
								<?php endif; ?>
								</td>
								<td>
								<a href="/followup/<?php echo $this->_tpl_vars['mission']['type']; ?>
?submenuId=ML13-SL4&cmid=<?php echo $this->_tpl_vars['mission']['cmid']; ?>
&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
" target="_blank" class="pull-left">
								<?php echo $this->_tpl_vars['mission']['title']; ?>

								</a>
								</td>
								<td><?php echo $this->_tpl_vars['mission']['nb_words']; ?>
</td>
								<td><?php echo $this->_tpl_vars['mission']['source_language']; ?>
</td>
								<td><?php echo $this->_tpl_vars['mission']['destination_language']; ?>
</td>
								<td><?php if ($this->_tpl_vars['mission']['percentage'] == "%"): ?>-<?php else: ?><?php echo $this->_tpl_vars['mission']['percentage']; ?>
<?php endif; ?></td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['ldate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['edate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
								<td><a href="/followup/<?php echo $this->_tpl_vars['mission']['type']; ?>
?submenuId=ML13-SL4&cmid=<?php echo $this->_tpl_vars['mission']['cmid']; ?>
&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
" class="btn">View mission</a></td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
							<tr>
							<td colspan="9">No matching records found</td>
							</tr>
							<?php endif; ?>
						</tbody>
					</table>
					</div>
				</div>
				<!-- Deleted Starts -->
				<div class="tab-pane <?php if ($_GET['active'] == 'deleted'): ?> active <?php endif; ?>" id="deletedtab"  style="min-height:400px">
					<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'techmanager' || $this->_tpl_vars['user_type'] == 'seomanager' || $this->_tpl_vars['user_type'] == 'prodmanager'): ?>
					<div class="row-fluid">
											</div>
				    <?php endif; ?>
					<div class="missionsdeleted">
					<table class="table table-bordered table-hover table_vam" id="deletedList" >
						<thead>
							<tr>
							<th style="display:none"></th>
							   <!--<th>Company Name</th>-->
							   <th></th>                          
							   <th>Mission</th>
							   <th>Nb words</th>
							   <th>Source Language</th>
							   <th>Destination Language</th>  
							   <th>% Done</th>                          
							   <th>Expected Launch</th>
							   <th>Expected End</th>                   
							   <th>Action</th>                   
							</tr>
						</thead>
						<tbody>
							<?php if (count($this->_tpl_vars['contractmissionsdeleted']) > 0): ?>
							<?php $_from = $this->_tpl_vars['contractmissionsdeleted']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractclients'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractclients']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['clients']):
        $this->_foreach['contractclients']['iteration']++;
?>
							<?php if ($this->_tpl_vars['clients']['company_name'] != ""): ?>
							<tr>
								<th colspan="10" ><h3><span class="pull-left"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['key']; ?>
/<?php echo $this->_tpl_vars['key']; ?>
_global.png?12345"  alt="<?php echo $this->_tpl_vars['clients']['company_name']; ?>
" width="60"> <?php echo $this->_tpl_vars['clients']['company_name']; ?>
</span></h3></th>
							</tr>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['clients']['contract_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contractids'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contractids']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contractid'] => $this->_tpl_vars['missions']):
        $this->_foreach['contractids']['iteration']++;
?>
							<?php if ($this->_tpl_vars['clients'][$this->_tpl_vars['contractid']]['contractname'] != ""): ?>
							<tr>
								<th colspan="10"><span class="pull-left"><?php echo $this->_tpl_vars['clients'][$this->_tpl_vars['contractid']]['contractname']; ?>
</span></th>
							</tr>
							<?php endif; ?>
							<?php $_from = $this->_tpl_vars['missions']['mission_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['contracts']['iteration']++;
?>
							<tr>
								<td  style="display:none"></td>
								<!--<td><a class="hint--right" data-hint="<?php echo $this->_tpl_vars['mission']['client_name']; ?>
" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['mission']['client_id']; ?>
&submenuId=ML13-SL1">
									<?php echo $this->_tpl_vars['mission']['company_name']; ?>

								</a></td>-->
								<td>
								<?php if ($this->_tpl_vars['mission']['pmid']): ?>
								<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['mission']['pmnew']; ?>
">
								<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['pmid']; ?>
/logo.jpg?123" class="image rd_30" height="50" alt="<?php echo $this->_tpl_vars['mission']['pmnew']; ?>
">
								</a>
								<?php else: ?>
								-
								<?php endif; ?>
								</td>
								<td>
								<a href="/followup/<?php echo $this->_tpl_vars['mission']['type']; ?>
?submenuId=ML13-SL4&cmid=<?php echo $this->_tpl_vars['mission']['cmid']; ?>
&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
" target="_blank" class="pull-left">
								<?php echo $this->_tpl_vars['mission']['title']; ?>

								</a>
								</td>
								<td><?php echo $this->_tpl_vars['mission']['nb_words']; ?>
</td>
								<td><?php echo $this->_tpl_vars['mission']['source_language']; ?>
</td>
								<td><?php echo $this->_tpl_vars['mission']['destination_language']; ?>
</td>
								<td><?php if ($this->_tpl_vars['mission']['percentage'] == "%"): ?>-<?php else: ?><?php echo $this->_tpl_vars['mission']['percentage']; ?>
<?php endif; ?></td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['ldate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['edate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td>
								<td><a href="/followup/<?php echo $this->_tpl_vars['mission']['type']; ?>
?submenuId=ML13-SL4&cmid=<?php echo $this->_tpl_vars['mission']['cmid']; ?>
&index=<?php echo $this->_tpl_vars['mission']['index']; ?>
" class="btn">View mission</a></td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
							<tr>
							<td colspan="10">No matching records found</td>
							</tr>
							<?php endif; ?>
						</tbody>
					</table>
					</div>
				</div>
				<!-- Deleted End -->
			</div>
		</div>
	</div>
</div>
<?php echo '
<script>
var id1 = "week1";
var id2 = "week2";
var assigncount =  '; ?>
"<?php echo $this->_tpl_vars['toassigncount']; ?>
"<?php echo ';
var user_type = '; ?>
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
	$(".uni_style").uniform();
	$(".uni_style2").uniform();
	/* $(\'.tooltips\').tooltipster(
	 {
		contentAsHTML: true,
		theme: \'tooltipster-noir\',
		position: \'bottom\',
		positionTracker:true,
		interactive: true,
	 });  */
		
	$(".cselect").chosen({allow_single_deselect:false,search_contains: true});
	
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
	
	$(document).on("click",".uni_style",function(){
		 $(".uni_style").uniform();
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
	  })
	  
	
});

	  $(\'#pm\').on(\'change\', function(evt, params) {
		$(".missionsopenreplace").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pm").val(),\'table\':1,\'opened\':1,\'lang\':$("#langauges").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsopenreplace").html(data)})
		$(".missionsfinished").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pm").val(),\'table\':1,\'opened\':2,\'lang\':$("#langauges").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsfinished").html(data)})
		$(".missionsdeleted").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pm").val(),\'table\':1,\'opened\':4,\'lang\':$("#langauges").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsdeleted").html(data)})
		$(".missionsassignreplace").html(\'<center><b>Please wait Loading...</b></center>\');
			$.post(\'/contractmission/loadmissions/\',{\'pmid\':\'\',\'table\':1,\'opened\':0,\'lang\':$("#langauges").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsassignreplace").html(data)})
	  });

	  /*$(\'#pm1\').on(\'change\', function(evt, params) {
		$(".missionsfinished").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pm1").val(),\'table\':1,\'opened\':2,\'lang\':$("#langauges").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsfinished").html(data)})
	  });
	  
	  $(\'#pmdeleted\').on(\'change\', function(evt, params) {
		$(".missionsdeleted").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pmdeleted").val(),\'table\':1,\'opened\':4,\'lang\':$("#langaugesdeleted").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsdeleted").html(data)})
	  });
	   $(\'#langaugesdeleted\').on(\'change\', function(evt, params) {
		$(".missionsdeleted").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pmdeleted").val(),\'table\':1,\'opened\':4,\'lang\':$("#langaugesdeleted").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsdeleted").html(data)})
	  });*/
	  $(\'#langauges\').on(\'change\', function(evt, params) {
	  $(".missionsopenreplace").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pm").val(),\'table\':1,\'opened\':1,\'lang\':$("#langauges").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsopenreplace").html(data)})
		$(".missionsfinished").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pm").val(),\'table\':1,\'opened\':2,\'lang\':$("#langauges").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsfinished").html(data)})
		$(".missionsassignreplace").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':\'\',\'table\':1,\'opened\':0,\'lang\':$("#langauges").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsassignreplace").html(data)})
		$(".missionsdeleted").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pm").val(),\'table\':1,\'opened\':4,\'lang\':$("#langauges").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsdeleted").html(data)})
	  });
	  
	  /* $(\'#langauges1\').on(\'change\', function(evt, params) {
	  $(".missionsfinished").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pm1").val(),\'table\':1,\'opened\':2,\'lang\':$("#langauges1").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsfinished").html(data)})
	  });
	  
	  $(\'#assign_lang\').on(\'change\', function(evt, params) {
	  $(".missionsassignreplace").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':\'\',\'table\':1,\'opened\':0,\'lang\':$("#assign_lang").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsassignreplace").html(data)})
	  });
	  
	  $(\'#assigncontracts\').on(\'change\', function(evt, params) {
	  $(".missionsassignreplace").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pm").val(),\'table\':1,\'opened\':0,\'lang\':$("#assign_lang").val(),\'cid\':$("#assigncontracts").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsassignreplace").html(data)})
	  });
	  
	  $(\'#openedcontracts\').on(\'change\', function(evt, params) {
	  $(".missionsopenreplace").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pm").val(),\'table\':1,\'opened\':1,\'lang\':$("#langauges").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsopenreplace").html(data)})
	  });
	  
	  $(\'#openedcontracts1\').on(\'change\', function(evt, params) {
	  $(".missionsfinished").html(\'<center><b>Please wait Loading...</b></center>\');
		$.post(\'/contractmission/loadmissions/\',{\'pmid\':$("#pm1").val(),\'table\':1,\'opened\':2,\'lang\':$("#langauges1").val(),\'cid\':$("#allcontract").val(),\'client_id\':$("#allclient").val()},function(data){$(".missionsfinished").html(data)})
	  });*/
	  
	  $(document).on("click",".uni_style2",function(){
		$(".uni_style2").uniform();
	  })
	  
	  $(document).on("click",".uni_style",function(){
		$(".uni_style").uniform();
	  })
	  
	  $("#allcontract").on(\'change\',function(evt, params){
/* 		  $(".allmissions").html(\'<center><b>Please wait Loading...</b></center>\');
	  $(".nav-tabs li").removeClass(\'active\');
	  $(".assignopened").addClass(\'active\');
	  $.post(\'/contractmission/loadmissions/\',{\'pmid\':\'\',\'opened\':3,\'table\':1,\'lang\':\'\',\'cid\':$("#allcontract").val()},function(data){$(".allmissions").html(data)})

 */	  	clientval=$("#allclient").val();
 		if(clientval)
 		{
 			url="&client_id="+$(\'#allclient\').val()+"&submenuId=ML13-SL4";
 		}
 		else{
 			url="&submenuId=ML13-SL4";
 		}
		location.href= \'/contractmission/missions-list?contract_id=\'+$("#allcontract").val()+url;
	})
	  $("#allclient").on(\'change\',function(evt, params){
		location.href= \'/contractmission/missions-list?client_id=\'+$("#allclient").val()+\'&submenuId=ML13-SL4\';
	  })
	  $("ul.nav-tabs li a").on(\'click\',function(evt, params){
		if($(this).attr(\'href\')==\'#validate\'){
			$(\'#pm_chzn\').hide();
		}
		else
		{
			$(\'#pm_chzn\').show();
		}
	})
	  $(document).on("click",".closemission",function(e){
		  e.preventDefault();
		  var thisref = $(this);
		  smoke.confirm("Are you sure? Want to close this mission",function(e)
			{
				if(e)
				{
					var href = thisref.attr("href");
					$.post(href,function(success){if(success){location.reload();}});
				}
			});
	  });
	$(document).on("click","#checkopened",function(e){
		  if($("#checkopened:checked").length)
		  {
			  $("[name=closemission\\\\[\\\\]]").prop("checked",true);
			  if($("[name=closemission\\\\[\\\\]]:checked").length)
			  $("#showcmclose").show();
		  }
		  else
		  {
			  $("[name=closemission\\\\[\\\\]]").removeAttr("checked");
			  $("#showcmclose").hide();
		  }
	  });
	$(document).on("click","#checktoassign",function(e){
		  if($("#checktoassign:checked").length)
		  {
			 $(".closevalidatemissions").prop("checked",true);  
			 if($(".closevalidatemissions:checked").length)
			 $("#showcmclose1").show();
		  }
		  else
		  {
			 $(".closevalidatemissions").removeAttr("checked"); 
			 $("#showcmclose1").hide();
		  }
	  });
</script>
'; ?>