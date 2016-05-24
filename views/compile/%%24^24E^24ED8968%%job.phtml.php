<?php /* Smarty version 2.6.19, created on 2015-09-24 08:57:56
         compiled from gebo/template/job.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/template/job.phtml', 44, false),array('modifier', 'date_format', 'gebo/template/job.phtml', 45, false),array('modifier', 'ucfirst', 'gebo/template/job.phtml', 46, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
$(document).ready(function() {
      $(\'#jobs\').dataTable({
                "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"aaSorting": [[ 1, "asc" ]],
					"aoColumns": [
						{ "sType": "formatted-num" },
						{ "sType": "string" },
						{ "sType": "eu_date" },
						{ "sType": "string" },
						{ "sType": "html" }
					],
					"aaSorting": [[ 0, "asc" ]],
                });
} );
</script>
'; ?>

				
<div class="row-fluid">
	<div class="span12">
		<div class="alert alert-warning" align="center"><b>JOBS</b></div>
	    <div align="right" style="padding:10px;">
			<a href="/template/addjob?submenuId=ML4-SL8&act=add" class="btn btn-info"> 
				New Job
			</a>
		</div>
		
			<table class="table table-bordered table-striped table_vam" id="jobs" >
				<thead>
					<tr>
						<th>ID N&deg;</th>
						<th>Job Title</th>
						<th>Created at</th>
						<th>Status</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php $_from = $this->_tpl_vars['joblist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['job_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['job_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['job_item']):
        $this->_foreach['job_loop']['iteration']++;
?>
					  <tr>
						   <td><?php echo ($this->_foreach['job_loop']['iteration']-1)+1; ?>
</td>
						   <td style="text-align:left"><?php echo ((is_array($_tmp=$this->_tpl_vars['job_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
						   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['job_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</td>
						   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['job_item']['status'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</td>
						   <td>
								<a href="/template/addjob?submenuId=ML4-SL8&act=edit&id=<?php echo $this->_tpl_vars['job_item']['id']; ?>
"><i class="splashy-application_windows_edit"></i></a>
								<!--<a href="/template/Jobs?submenuId=ML4-SL10&act=delete&id=<?php echo $this->_tpl_vars['job_item']['id']; ?>
" onclick='return confirm("Do you really want to delete this job?")'><i class="icon-adt_trash"></i></a>-->
						   </td>
					  </tr>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
		
	</div>
</div>