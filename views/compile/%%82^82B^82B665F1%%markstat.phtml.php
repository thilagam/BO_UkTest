<?php /* Smarty version 2.6.19, created on 2014-12-08 13:22:10
         compiled from gebo/ao/markstat.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut', 'gebo/ao/markstat.phtml', 86, false),)), $this); ?>
<?php echo '

    <script type="text/javascript" >
		$(document).ready(function() {
			 $(\'#marktable\').dataTable({
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"aaSorting": [[ 1, "asc" ]],
				"aoColumns": [
					{ "sType": "formatted-num" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" }
				]
			});
		} );
		
		

		function updowngrade(user,act,ptype)
		{
			var confirmtext=\'Do you really want to upgrade/downgrade this Contributor?\';
			
			if(confirm(confirmtext))
			{
				$.ajax({
				  type: \'GET\',
				  url: \'/ao/updateprofiletypemarks\',
				  data: \'contrib=\' + user + \'&action=\'+act+\'&ptype=\'+ptype,
				  
				  success: function(data)
				  {   
						smoke.alert("Profile updated successfully");
						window.location.reload();
				  }
				});
			}
		}
		
		function markdetail(id)
		{
			var target_page = "/ao/marksdetail?participate="+id;

			$.post(target_page, function(data){  // alert(data);
				$("#markdetailcontent").html(data);
			});
		}
		
	</script>

	'; ?>


<div class="row-fluid">
  <div class="span12">
	 <h3 class="heading">Mission test Statistics</h3>
	
	<form action="/ao/poll?submenuId=ML2-SL17" method="post" name="formmark">
	<table class="table table-bordered table-striped table_vam" id="marktable">
		<thead>
			<tr>
				<th>ID N°</th>
				<th>Name</th>
				<th>Mission name</th>
				<th>Writer</th>
				<th>Type</th>
				<th>Note/10</th>
				<th>Avg Mark</th>
				<th>Action</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
	 	<?php $_from = $this->_tpl_vars['testmissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mark_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mark_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission_item']):
        $this->_foreach['mark_loop']['iteration']++;
?>
	        <tr>
				<td><?php echo ($this->_foreach['mark_loop']['iteration']-1)+1; ?>
</td>
			    <td><?php echo $this->_tpl_vars['mission_item']['atitle']; ?>
</td>
				<td><?php echo $this->_tpl_vars['mission_item']['title']; ?>
</td> 
				<td><?php echo $this->_tpl_vars['mission_item']['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['mission_item']['last_name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['mission_item']['profile_type']; ?>
</td>
				<td><?php echo $this->_tpl_vars['mission_item']['min_mark']; ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['mission_item']['marks'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</td>
				<td>
					<span style="float:left">
						<a href="javascript:void(0);" data-toggle="modal" data-target="#markdetail" OnClick="return markdetail('<?php echo $this->_tpl_vars['mission_item']['participate_id']; ?>
')" class="hint--left hint--info" data-hint="View Detail"><i class="icon-eye-open"></i></a>
					</span>
					<?php if ($this->_tpl_vars['mission_item']['marks'] >= $this->_tpl_vars['mission_item']['min_mark']): ?> 
						<?php if ($this->_tpl_vars['mission_item']['profile_type'] != 'senior'): ?>
							<?php if ($this->_tpl_vars['mission_item']['profile_type'] == 'sub-junior'): ?>
								<a href="javascript:void(0);" onClick="updowngrade('<?php echo $this->_tpl_vars['mission_item']['user_id']; ?>
','junior','<?php echo $this->_tpl_vars['mission_item']['profile_type']; ?>
');" class="hint--left hint--info" data-hint="Upgrade to Junior"><img src="/BO/theme/gebo/img/up_blue.png"/></a>
								&nbsp;
							<?php endif; ?>
							<a href="javascript:void(0);" onClick="updowngrade('<?php echo $this->_tpl_vars['mission_item']['user_id']; ?>
','senior','<?php echo $this->_tpl_vars['mission_item']['profile_type']; ?>
');" class="hint--left hint--info" data-hint="Upgrade to Senior"><img src="/BO/theme/gebo/img/up_green.png"/></a>
						<?php endif; ?>
					<?php else: ?>
						<?php if ($this->_tpl_vars['mission_item']['profile_type'] != 'sub-junior'): ?>
							<?php if ($this->_tpl_vars['mission_item']['profile_type'] == 'senior'): ?>
								<a href="javascript:void(0);" onClick="updowngrade('<?php echo $this->_tpl_vars['mission_item']['user_id']; ?>
','junior','<?php echo $this->_tpl_vars['mission_item']['profile_type']; ?>
');" class="hint--left hint--info" data-hint="Downgrade to Junior"><img src="/BO/theme/gebo/img/down_orange.png"/></a>
								&nbsp;
							<?php endif; ?>
							<a href="javascript:void(0);" onClick="updowngrade('<?php echo $this->_tpl_vars['mission_item']['user_id']; ?>
','sub-junior','<?php echo $this->_tpl_vars['mission_item']['profile_type']; ?>
');" class="hint--left hint--info" data-hint="Downgrade to Sub-junior"><img src="/BO/theme/gebo/img/down_red.png"/></a>
						<?php endif; ?>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($this->_tpl_vars['mission_item']['status'] == 'published'): ?>
						Validated
					<?php else: ?>
						-
					<?php endif; ?>	
				</td>
			</tr>
        <?php endforeach; endif; unset($_from); ?>
    	</tbody>
	</table>

	</form>
  </div>
</div>

	
	<!--Marks detail-->
	<div class="modal hide fade" id="markdetail">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">&times;</button>
			<h3>Mission test Detail</h3>
		</div>
		<div class="modal-body" id="markdetailcontent">
		</div>
		<div class="modal-footer">
		</div>
	</div>

	 