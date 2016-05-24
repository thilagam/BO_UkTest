<?php /* Smarty version 2.6.19, created on 2016-03-30 15:46:38
         compiled from gebo/quote/tech-mission-type.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ucfirst', 'gebo/quote/tech-mission-type.phtml', 66, false),array('modifier', 'date_format', 'gebo/quote/tech-mission-type.phtml', 67, false),)), $this); ?>
<?php echo '
<script type="text/javascript">	
$(document).ready(function() {
		$(\'#techmList\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "aaSorting": [[ 0, "asc" ]],
			"iDisplayLength":50,
            "aoColumns": [
		        { "sType": "formatted-num" },
                { "sType": "string" },
                { "sType": "eu_date" },
                { "sType": "string" },
                { "sType": "string" },
		        { "sType": "string" }
            ]
        });
});

function deleteTechmission(tid)
{
	smoke.confirm("Do you really want to delete this type? ",function(e){
			if (e)
			{
			   var target_page = "/quote/deletetechmissiontype?tid="+tid;
				$.post(target_page, function(data){ 
					//smoke.alert("Deleted successfully !!"); 
					window.location.reload();
				});
			}
			else
			{
				return false;
			}
		});		
}
</script>
'; ?>

<div class="row-fluid">
	<div class="span12">
    	<h1 class="heading pull-left">Tech Mission Types</h1>
		<div class="pull-right">
		<a class="btn btn-primary" data-toggle="modal" data-target="#addtechmissiontype" href="/quote/add-techmissiontype">Add Tech mission type</a>
		</div>
	</div>
</div>	

<div class="row-fluid">
	<table class="table table-bordered table-hover table_vam" id="techmList" >
		<thead>
			<tr>
			   <th>S No</th>
			   <th>Title</th>
			   <th>Type</th>
			   <th>Created at</th>
			   <th>Cost</th>
			   <th>Delivery time</th>
			   <th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php $_from = $this->_tpl_vars['techmissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['techmissionloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['techmissionloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tech']):
        $this->_foreach['techmissionloop']['iteration']++;
?>
			<tr>
				<td><?php echo ($this->_foreach['techmissionloop']['iteration']-1)+1; ?>
</td>
				<td><?php echo $this->_tpl_vars['tech']['tech_title']; ?>
</td>
				<td><?php if ($this->_tpl_vars['tech']['tech_type_assign'] == 'superadmin'): ?>Tech(superadmin)<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tech']['tech_type_assign'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
<?php endif; ?></td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['tech']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
				<td><?php echo $this->_tpl_vars['tech']['cost']; ?>
</td>
				<td><?php echo $this->_tpl_vars['tech']['delivery_time']; ?>
&nbsp;<?php if ($this->_tpl_vars['tech']['delivery_option'] == 'days'): ?>Jour(s)<?php else: ?>Heure(s)<?php endif; ?></td>
				<td>
					<a data-toggle="modal" data-target="#addtechmissiontype" href="/quote/add-techmissiontype?tid=<?php echo $this->_tpl_vars['tech']['tid']; ?>
"><img class="splashy-application_windows_edit"></a>
					<a href="javascript:void(0);" onClick="deleteTechmission('<?php echo $this->_tpl_vars['tech']['tid']; ?>
');"><img src="/BO/theme/gebo/img/red_trash.png"></a>	
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		</tbody>
	</table>
</div>

<div class="modal hide fade" id="addtechmissiontype">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h3>Add Tech mission type</h3>
    </div>
    <div class="modal-body" id="techmissionform">
	</div>
    <div class="modal-footer">
    </div>
</div>