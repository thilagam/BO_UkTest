<?php /* Smarty version 2.6.19, created on 2015-03-24 13:45:58
         compiled from gebo/ao/overdue_articles.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/ao/overdue_articles.phtml', 75, false),array('modifier', 'wordwrap', 'gebo/ao/overdue_articles.phtml', 75, false),)), $this); ?>
<?php echo '
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/lib/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" >
			$(document).ready(function() {
				$(\'#overduetable\').dataTable({
					"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
					"sPaginationType": "bootstrap",
					"aaSorting": [[ 0, "asc" ]],
					"aoColumns": [
						{ "sType": "formatted-num" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "string" }
					]
				});
			} );

			function getExtendform(participationId)
        	{
				var ts = Math.round((new Date()).getTime() / 1000);
				if(participationId != \'undefined\')
				{
					var target_page = "/ao/over-due?action_from=popup&from=overdue&timestamp="+ts+"&participationId="+participationId;
					$.post(target_page, function(data){ 
					   $("#overdueform").html(data);
					   if (CKEDITOR.instances[\'extend_comment_\'+participationId])
						{
							CKEDITOR.instances[\'extend_comment_\'+participationId].destroy();
						}
					   /////////////////////////////////
						 var editor = CKEDITOR.replace( \'extend_comment_\'+participationId,
							 {
								 language: \'de\',
								 uiColor: \'#D9DDDC\',
								 enterMode : CKEDITOR.ENTER_BR,
								 removePlugins : \'resize\',
								 toolbar :
								 [
									 [\'Undo\',\'Redo\'],
									 [\'Find\',\'Replace\',\'-\',\'SelectAll\',\'RemoveFormat\'],
									 [\'Link\', \'Unlink\', \'Image\'],
									 \'/\',
									 [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
									 [\'NumberedList\',\'BulletedList\',\'-\',\'Blockquote\'],
									 [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\']
								 ],
							 }
						 );
					});
				}
			}
	</script>
'; ?>


<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">List of Overdue Articles</h3>
		<form action="/ao/over-due?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post" id="selectallprofile" name="selectallprofile" onsubmit="return validate3NewUser(1);">
			<table class="table table-bordered table-striped table_vam" id="overduetable">
				<thead>	
					<tr>
					  <th>ARTICLE TITLE</th>
					  <th>AO TITLE</th>
					  <th>Writer</th>
					  <th>Project manager</th>
					  <th>Expired Date</th>
					  <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $_from = $this->_tpl_vars['overDueArticles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Article_item']):
?>
					<tr>
					   <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['Article_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 22, "\n", true) : smarty_modifier_wordwrap($_tmp, 22, "\n", true)); ?>
</td>
					   <td><a href="/ongoing/ao-details?client_id=<?php echo $this->_tpl_vars['Article_item']['user_id']; ?>
&ao_id=<?php echo $this->_tpl_vars['Article_item']['did']; ?>
&submenuId=ML2-SL4"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['Article_item']['deliveryTitle'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</a></td>
					   <td><?php echo $this->_tpl_vars['Article_item']['first_name']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['Article_item']['last_name'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 10, "\n", true) : smarty_modifier_wordwrap($_tmp, 10, "\n", true)); ?>
</td>
					   <td><?php echo $this->_tpl_vars['Article_item']['bouser']; ?>
</td>
					   <td><div style="display:none;"><?php echo $this->_tpl_vars['Article_item']['submit_expires_sort']; ?>
</div><?php echo $this->_tpl_vars['Article_item']['submit_expires']; ?>
</td>
					   <td><a data-toggle="modal" data-target="#overdue"  href="javascript:void(0);" onclick="return getExtendform('<?php echo $this->_tpl_vars['Article_item']['id']; ?>
');">Add time</a></td>
					</tr>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
		</form>
	</div>
</div>	

<div class="modal hide fade" id="overdue">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h3>Add time</h3>
    </div>
    <div class="modal-body" id="overdueform">
	</div>
    <div class="modal-footer">
    </div>
</div>

