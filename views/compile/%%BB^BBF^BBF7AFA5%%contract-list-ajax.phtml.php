<?php /* Smarty version 2.6.19, created on 2015-10-20 14:48:26
         compiled from gebo/quotecontractmission/contract-list-ajax.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/quotecontractmission/contract-list-ajax.phtml', 27, false),array('modifier', 'zero_cut_t', 'gebo/quotecontractmission/contract-list-ajax.phtml', 29, false),array('modifier', 'date_format', 'gebo/quotecontractmission/contract-list-ajax.phtml', 36, false),)), $this); ?>
<?php if ($this->_tpl_vars['opened'] == '1'): ?>
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
		   <th>Close
		   <br>
			<input type="checkbox" id="checktoassign" />
		   </th>
		   <?php endif; ?>
		</tr>
	</thead>
	<tbody>
	<?php $_from = $this->_tpl_vars['contracts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contract']):
        $this->_foreach['contracts']['iteration']++;
?>
		<tr>
		   <td style="display:none"></td>
		   <td>
		   <a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&action=view"><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['contractname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</a>
		   </td>
		   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract']['sales_suggested_currency']; ?>
;</td>
		   <td><?php echo $this->_tpl_vars['contract']['percentage']; ?>
</td>
		   <td><?php echo $this->_tpl_vars['contract']['duration']; ?>
</td>
		   <td> <a class="hint--left" data-hint="<?php if ($this->_tpl_vars['contract']['clfname'] || $this->_tpl_vars['contract']['cllname']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['clfname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['cllname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
<?php else: ?><?php echo $this->_tpl_vars['contract']['clemail']; ?>
<?php endif; ?>" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['contract']['client_id']; ?>
&submenuId=ML13-SL1">
		   <?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['company_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

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
<?php echo '
<script>
	/* $(".tooltips").popover({ trigger: "manual" ,placement: \'top\', html: true, animation:false})
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
		}); */
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
	}
</script>
'; ?>

<?php elseif ($this->_tpl_vars['opened'] == '2'): ?>
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
	<?php $_from = $this->_tpl_vars['contracts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contract']):
        $this->_foreach['contracts']['iteration']++;
?>
		<tr>
		   <td style="display:none"></td>
		   <td>
		    <a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
&action=view"><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['contractname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</a>
		   </td>
		   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract']['sales_suggested_currency']; ?>
;</td>
		   <td><?php echo $this->_tpl_vars['contract']['percentage']; ?>
</td>
		   <td><?php echo $this->_tpl_vars['contract']['duration']; ?>
</td>
		   <td> <a class="hint--left" data-hint="<?php if ($this->_tpl_vars['contract']['clfname'] || $this->_tpl_vars['contract']['cllname']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['clfname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['cllname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
<?php else: ?><?php echo $this->_tpl_vars['contract']['clemail']; ?>
<?php endif; ?>" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['contract']['client_id']; ?>
&submenuId=ML13-SL1">
		   <?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['company_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

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
&action=view"><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['contractname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
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
		   <td> <a class="hint--left" data-hint="<?php if ($this->_tpl_vars['contract']['clfname'] || $this->_tpl_vars['contract']['cllname']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['clfname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['cllname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
<?php else: ?><?php echo $this->_tpl_vars['contract']['clemail']; ?>
<?php endif; ?>" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['contract']['client_id']; ?>
&submenuId=ML13-SL1">
		   <?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['company_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

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
			<td><label class="label label-important">Closed</label>
			</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<?php echo '
<script>
	/* $(".tooltips").popover({ trigger: "manual" ,placement: \'top\', html: true, animation:false})
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
		}); */
		
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
</script>
'; ?>

<?php elseif ($this->_tpl_vars['opened'] == '3'): ?>
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
&action=view"><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['contractname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
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
		   <?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['company_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

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
<?php echo '
<script>
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
</script>
'; ?>

<?php else: ?>
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
	<?php $_from = $this->_tpl_vars['contracts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contracts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contracts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contract']):
        $this->_foreach['contracts']['iteration']++;
?>
		<tr>
		   <td style="display:none"></td>
		   <td>
		   <a href='/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['contract']['quotecontractid']; ?>
'> <?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['contractname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</a></td>
		   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['contract']['sales_suggested_currency']; ?>
;</td>
		   <td><?php echo $this->_tpl_vars['contract']['duration']; ?>
</td>
		   <td> 
			   <a class="hint--left" data-hint="<?php if ($this->_tpl_vars['contract']['clfname'] || $this->_tpl_vars['contract']['cllname']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['clfname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['cllname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
<?php else: ?><?php echo $this->_tpl_vars['contract']['clemail']; ?>
<?php endif; ?>" target="_blank" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['contract']['client_id']; ?>
&submenuId=ML13-SL1">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['company_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

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
<?php echo '
<script>		
var assigncount =  '; ?>
"<?php echo $this->_tpl_vars['toassigncount']; ?>
"<?php echo ';
	if(usertype=="superadmin")
	{
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
				{ "sType": "string","bSortable": false }
            ]
        });
	}
	else
	{
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
if(assigncount>0)
	{
		$("#assigncount").text(assigncount);
		$("#assigncount").removeClass(\'hide\');
	}
	else
	$("#assigncount").addClass(\'hide\');
</script>
'; ?>

<?php endif; ?>
<?php echo '
<script>
$("#showcmclose2").hide();
$("#showcmclose").hide();
</script>
'; ?>