<?php /* Smarty version 2.6.19, created on 2015-06-25 14:09:00
         compiled from gebo/template/validationtemplates.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/template/validationtemplates.phtml', 96, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
	$(document).ready(function() {
		$(\'#template_writing\').dataTable({
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"bPaginate": false,
				"aaSorting": [[ 0, "asc" ]],
				"aoColumns": [
					{ "sType": "formatted-num" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" }
				]
		});
		
		$(\'#template_translation\').dataTable({
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"bPaginate": false,
				"aaSorting": [[ 0, "asc" ]],
				"aoColumns": [
					{ "sType": "formatted-num" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" }
				]
		});
	} );

    function getTemplateDetails(valtempId)
    {
        if(valtempId != \'new\')
        {
            var target_page = "/template/addvalidationtemplate?valtempId="+valtempId;
            $.post(target_page, function(data){ 
               $("#edittemplatecontent").html(data);
               $("#template_submit").val(\'Mettre à jour\');    
            });
        }
        else
        {
            var target_page = "/template/addvalidationtemplate?valtempId="+valtempId;
            $.post(target_page, function(data){ 
				$("#edittemplatecontent").html(data);
				$("#template_submit").val(\'Ajouter\');
            });
        }
    } 
	
	function defaultchecked(tempId)
	{
		var checkedval=$("input[name=\'selected_"+tempId+"\']:checked").val();
		if(checkedval=="yes")
			checked="yes";
		else
			checked="no";
			
		$.ajax({
			type: \'GET\',
			url: \'/template/defaultchecktemplate\',
			data: \'templateid=\' + tempId+\'&checked=\'+checked,
			success: function(data)
			{ 
				smoke.alert("Updated Successfully !!");
			}
		});
	}
</script>
'; ?>

<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Templates</h3>
	    <div align="right" style="padding:10px;">
			<a href="javascript:void(0);" data-toggle="modal" data-target="#edittemplate" class="btn btn-info" onclick="return getTemplateDetails('new');">
				Nouveau template
			</a>
		</div>
		
		<div class="span6" style="margin-left:2px">
			<h4>Crit&egrave;res pour la r&eacute;daction</h4><br/>
			<table class="table table-bordered table-striped table_vam" id="template_writing" >
				<thead>
					<tr>
						<th>ID N&deg;</th>
						<th>Titre du mail de refus</th>
						<th>PR&Eacute;SELECTION</th>
						<th>Status</th>
						<th>ACTIONS</th>
					</tr>
				</thead>
				<tbody>
					<?php $_from = $this->_tpl_vars['writingtemplates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['writing_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['writing_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['writing_item']):
        $this->_foreach['writing_loop']['iteration']++;
?>
					  <tr>
						   <td><?php echo ($this->_foreach['writing_loop']['iteration']-1)+1; ?>
</td>
						   <td style="text-align:left"><?php echo ((is_array($_tmp=$this->_tpl_vars['writing_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
						   <td>
								<input type="checkbox" name="selected_<?php echo $this->_tpl_vars['writing_item']['identifier']; ?>
" id="selected_<?php echo $this->_tpl_vars['writing_item']['identifier']; ?>
" value="yes" <?php if ($this->_tpl_vars['writing_item']['selected'] == 'yes'): ?>checked<?php endif; ?> <?php if ($this->_tpl_vars['writing_item']['active'] == 'no'): ?>disabled<?php endif; ?> onClick="defaultchecked('<?php echo $this->_tpl_vars['writing_item']['identifier']; ?>
');"/>
						   </td>
						   <td><?php if ($this->_tpl_vars['writing_item']['active'] == 'yes'): ?>Active<?php else: ?>Inactive<?php endif; ?></td>
						   <td>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#edittemplate" onclick="return getTemplateDetails(<?php echo $this->_tpl_vars['writing_item']['identifier']; ?>
);">
									<i class="splashy-application_windows_edit"></i>
								</a>
						   </td>
					  </tr>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
		</div>
		
		<div class="span6" style="float:right;margin-left:5px">
			<h4>Crit&egrave;res pour la traduction</h4><br/>
			<table class="table table-bordered table-striped table_vam" id="template_translation" >
				<thead>
					<tr>
						<th>ID N&deg;</th>
						<th>Titre du mail de refus</th>
						<th>PR&Eacute;SELECTION</th>
						<th>Status</th>
						<th>ACTIONS</th>
					</tr>
				</thead>
				<tbody>
					<?php $_from = $this->_tpl_vars['translationtemplates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['translation_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['translation_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['translation_item']):
        $this->_foreach['translation_loop']['iteration']++;
?>
					  <tr>
						   <td><?php echo ($this->_foreach['translation_loop']['iteration']-1)+1; ?>
</td>
						   <td style="text-align:left"><?php echo ((is_array($_tmp=$this->_tpl_vars['translation_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
						   <td>
								<input type="checkbox" name="selected_<?php echo $this->_tpl_vars['translation_item']['identifier']; ?>
" id="selected_<?php echo $this->_tpl_vars['translation_item']['identifier']; ?>
"  value="yes" <?php if ($this->_tpl_vars['translation_item']['selected'] == 'yes'): ?>checked<?php endif; ?> <?php if ($this->_tpl_vars['translation_item']['active'] == 'no'): ?>disabled<?php endif; ?> onClick="defaultchecked('<?php echo $this->_tpl_vars['translation_item']['identifier']; ?>
');"/>
						   </td>
						   <td><?php if ($this->_tpl_vars['translation_item']['active'] == 'yes'): ?>Active<?php else: ?>Inactive<?php endif; ?></td>
						   <td>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#edittemplate" onclick="return getTemplateDetails(<?php echo $this->_tpl_vars['translation_item']['identifier']; ?>
);">
									<i class="splashy-application_windows_edit"></i>
								</a>
						   </td>
					  </tr>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>	

	<!--Add/Edit template-->
	<div class="modal hide fade" id="edittemplate" style="width:710px !important">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">&times;</button>
			<h3>Validation templates</h3>
		</div>
		<div class="modal-body" id="edittemplatecontent" style="max-height:500px !important">
		</div>
		<div class="modal-footer">
		</div>
	</div>