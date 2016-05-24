<?php /* Smarty version 2.6.19, created on 2016-01-13 09:33:59
         compiled from gebo/ao/automatizescjc.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/ao/automatizescjc.phtml', 112, false),)), $this); ?>
<?php echo '
    <script type="text/javascript" >
		$(document).ready(function() {
			$(".uni_style").uniform(); 
			$(\'#scjctable\').dataTable({
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"aaSorting": [[ 1, "asc" ]],
				"aoColumns": [
					{ "sType": "string" },
					{ "sType": "formatted-num" },
					{ "sType": "string" },
					{ "sType": "date-euro" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" }
				]
			});
		});
			
		function updowngrade(user,act)
		{
			var confirmtext=\'\';
			
			if(act=="up")
			{
				confirmtext="Do you really want to upgrade this Contributor?";
				typetext=\'Senior\';
			}
			else
			{
				confirmtext="Do you really want to downgrade this Contributor?";
				typetext=\'Junior\';
			}
			if(confirm(confirmtext))
			{
				$.ajax({
				  type: \'GET\',
				  url: \'/ao/updateprofiletype\',
				  data: \'contrib=\' + user + \'&action=\'+act,
				  
				  success: function(data)
				  {   
						smoke.alert("Profile updated successfully");
						$("#action_"+user).html(\'-\');
						$("#ptype_"+user).html(typetext);
						$("#check_"+user).html(\'\');
				  }
				});
			}
		}
			
		function validatemultipleupdate()
		{
			var checked = $("input[type=checkbox]:checked");
			var nbChecked = checked.size(); 
			 
			if(nbChecked==0)
			{
				smoke.alert("Please select profiles to update");
				return false;
			}
			else
			{
				if(confirm("Do you really want to update these contributors?"))
				{
					document.form1.action ="/ao/automatizescjc?submenuId=ML2-SL19";
					document.form1.submit();
					return true;
				}
				else
					return false;
			}				
		}
	</script>
'; ?>


<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Automatize JC and SC</h3>
		<form method="post" name="form1" id="form1">
			<table class="table table-bordered table-striped table_vam" id="scjctable">
				<thead>
					<tr>
					  <th></th>
					  <th>S.I</th>
					  <th>Writer</th>
					  <th>Joining Date</th>
					  <th>Categories</th>
					  <th>Profile Type</th>
					  <th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $_from = $this->_tpl_vars['contriblist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contrib_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contrib_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contrib']):
        $this->_foreach['contrib_loop']['iteration']++;
?>
					<tr>
					   <td id="check_<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
">
							<?php if ($this->_tpl_vars['contrib']['updown'] != 'NO'): ?>
								<label class="uni-checkbox">
									<input type="checkbox" name="contribtype[]" value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
_<?php echo $this->_tpl_vars['contrib']['updown']; ?>
" class="uni_style"/>
								</label>	
							<?php endif; ?>
					   </td>
					   <td><?php echo ($this->_foreach['contrib_loop']['iteration']-1)+1; ?>
</td>
					   <td>
							<?php if ($this->_tpl_vars['contrib']['first_name'] != ""): ?>
								<?php echo $this->_tpl_vars['contrib']['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['contrib']['last_name']; ?>

							<?php else: ?>
								<?php echo $this->_tpl_vars['contrib']['email']; ?>

							<?php endif; ?>
						</td>
					   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contrib']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</td>
					   <td><?php echo $this->_tpl_vars['contrib']['category']; ?>
</td>
					   <td id="ptype_<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
"><?php echo $this->_tpl_vars['contrib']['profile_type']; ?>
</td>
					   <td id="action_<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
"><b>
							<?php if ($this->_tpl_vars['contrib']['updown'] == 'up'): ?>
								<a href="javascript:void(0);" onClick="updowngrade('<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
','<?php echo $this->_tpl_vars['contrib']['updown']; ?>
');" class="hint--left hint--info" data-hint="Upgrade to SC"><i class="splashy-arrow_large_up"></i></a>
							<?php elseif ($this->_tpl_vars['contrib']['updown'] == 'down'): ?>
								<a href="javascript:void(0);" onClick="updowngrade('<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
','<?php echo $this->_tpl_vars['contrib']['updown']; ?>
');" class="hint--left hint--info" data-hint="Downgrade to JC"><i class="splashy-arrow_large_down"></i></a>
							<?php else: ?>
								-
							<?php endif; ?></b>
					   </td>
					 </tr>
				<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
			<input type="submit" name="update_all" value="Update" class="btn btn-success" onClick="return validatemultipleupdate();"/>
		</form>
	</div>
</div>