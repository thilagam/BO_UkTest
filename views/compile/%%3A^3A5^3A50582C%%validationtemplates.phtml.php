<?php /* Smarty version 2.6.19, created on 2013-09-27 09:48:38
         compiled from gebo/ao/validationtemplates.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/ao/validationtemplates.phtml', 59, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
	$(document).ready(function() {
		$(\'#template_table\').dataTable({
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"aaSorting": [[ 0, "asc" ]],
				"aoColumns": [
					{ "sType": "formatted-num" },
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
            var target_page = "/template/validtemplatedetails?valtempId="+valtempId;
            $.post(target_page, function(data){ 
               $("#edittemplatecontent").html(data);
               $("#valtemp_submit").val(\'Update\');
            });
        }
        else
        {
            var target_page = "/template/validtemplatedetails?valtempId="+valtempId;
            $.post(target_page, function(data){ 
				$("#edittemplatecontent").html(data);
				$("#valtemp_submit").val(\'Add\');
            });
        }
    } 
</script>
'; ?>

<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Template Syst&egrave;me :: Templates de validation</h3>
	    <div align="right" style="padding:10px;">
			<a href="javascript:void(0);" data-toggle="modal" data-target="#edittemplate" class="btn btn-info" onclick="return getTemplateDetails('new');">
				Nouveau template
			</a>
		</div>
		<table class="table table-bordered table-striped table_vam" id="template_table">
			<thead>
				<tr>
					<th>ID N&deg;</th>
					<th>EMAIL TITLE</th>
					<th>STATUS</th>
					<th>ACTIONS</th>
				</tr>
			</thead>
			<tbody>
				<?php $_from = $this->_tpl_vars['validationtemplates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['validtemplates_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['validtemplates_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['validtemplates_item']):
        $this->_foreach['validtemplates_loop']['iteration']++;
?>
				  <tr>
					   <td><?php echo ($this->_foreach['validtemplates_loop']['iteration']-1)+1; ?>
</td>
					   <td style="text-align:left"><?php echo ((is_array($_tmp=$this->_tpl_vars['validtemplates_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
					   <td><?php if ($this->_tpl_vars['validtemplates_item']['active'] == 'yes'): ?>Active<?php else: ?>Inactive<?php endif; ?></td>
					   <td>
							<a href="javascript:void(0);" data-toggle="modal" data-target="#edittemplate" onclick="return getTemplateDetails(<?php echo $this->_tpl_vars['validtemplates_item']['identifier']; ?>
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

	<!--Add/Edit template-->
	<div class="modal hide fade" id="edittemplate">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">&times;</button>
			<h3>Validation templates</h3>
		</div>
		<div class="modal-body" id="edittemplatecontent">
		</div>
		<div class="modal-footer">
		</div>
	</div>