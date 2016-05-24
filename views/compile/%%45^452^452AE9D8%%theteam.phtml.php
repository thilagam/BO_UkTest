<?php /* Smarty version 2.6.19, created on 2015-09-28 12:56:43
         compiled from gebo/template/theteam.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/template/theteam.phtml', 79, false),array('modifier', 'date_format', 'gebo/template/theteam.phtml', 81, false),array('modifier', 'ucfirst', 'gebo/template/theteam.phtml', 82, false),)), $this); ?>
<?php echo '
<script src="/BO/theme/gebo/lib/tinymce_4.2.5/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" >
$(document).ready(function() {
	  $(document).ready(function() {
        $("#status").chosen({ allow_single_deselect: false,search_contains: true  });
		});
	
	  $("#teamform").validationEngine({prettySelect : true,useSuffix: "_chzn"});
      $(\'#the_team\').dataTable({
                "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"aaSorting": [[ 1, "asc" ]],
					"aoColumns": [
						{ "sType": "formatted-num" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "eu_date" },
						{ "sType": "string" },
						{ "sType": "html" }
					],
					"aaSorting": [[ 0, "asc" ]],
                });
					
		tinymce.init({
			selector: "textarea#description",
			theme: "modern",
			plugins: [
				 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				 "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   content_css: "css/content.css",
		   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
		   style_formats: [
				{title: \'Bold text\', inline: \'b\'},
				{title: \'Red text\', inline: \'span\', styles: {color: \'#ff0000\'}},
				{title: \'Red header\', block: \'h1\', styles: {color: \'#ff0000\'}},
				{title: \'Example 1\', inline: \'span\', classes: \'example1\'},
				{title: \'Example 2\', inline: \'span\', classes: \'example2\'},
				{title: \'Table styles\'},
				{title: \'Table row 1\', selector: \'tr\', classes: \'tablerow1\'}
			]
		 }); 
} );

	function clearform()
	{
		$("#name").val("");
		$("#designation").val("");
		$("#description").val("");
		$("#status").val("");
	}	
</script>
'; ?>

<div class="row-fluid">
	<div class="span13">
		<div class="alert alert-warning" align="center"><b>THE TEAM</b></div>
		<br/>
		<div class="span5">
			<table class="table table-bordered table-striped table_vam" id="the_team" >
				<thead>
					<tr>
						<th>ID N&deg;</th>
						<th>Name</th>
						<th>Designation</th>
						<th>Created at</th>
						<th>Status</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php $_from = $this->_tpl_vars['teamlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['team_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['team_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['team_item']):
        $this->_foreach['team_loop']['iteration']++;
?>
					  <tr>
						   <td><?php echo ($this->_foreach['team_loop']['iteration']-1)+1; ?>
</td>
						   <td style="text-align:left"><?php echo ((is_array($_tmp=$this->_tpl_vars['team_item']['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
						   <td style="text-align:left"><?php echo ((is_array($_tmp=$this->_tpl_vars['team_item']['designation'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
						   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['team_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</td>
						   <td style="text-align:left"><?php echo ((is_array($_tmp=$this->_tpl_vars['team_item']['status'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</td>
						   <td>
								<a href="/template/theteam?submenuId=ML4-SL11&act=edit&id=<?php echo $this->_tpl_vars['team_item']['id']; ?>
"><i class="splashy-application_windows_edit"></i></a>
								<!--<a href="/template/theteam?submenuId=ML4-SL11&act=delete&id=<?php echo $this->_tpl_vars['team_item']['id']; ?>
" onclick='return confirm("Do you really want to delete this?")'><i class="icon-adt_trash"></i></a>-->
						   </td>
					  </tr>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
		</div>
		
		<div class="span6">
			<form  action="/template/theteam?submenuId=ML4-SL11" method="post" id="teamform" name="teamform">	
				<a href="/template/theteam?submenuId=ML4-SL11" class="btn btn-warning" style="float:right">Add New</a> 
				<h4 align="center">Add Team</h4>
				<table cellpadding="4" cellspacing="4" align="center" width=100%>
					<tr ><td>&nbsp;</td></tr>
					<tr valign="top">
						<td width="20%"><b>Name :</b></td>
						<td><span><input type="text" id="name" name="name" value="<?php echo $this->_tpl_vars['editteam'][0]['name']; ?>
" class="span9 validate[required]"/></span></td>
					</tr>
					<tr valign="top">
						<td><b>Designation :</b></td>
						<td><span><input type="text" id="designation" name="designation" value="<?php echo $this->_tpl_vars['editteam'][0]['designation']; ?>
" class="span9 validate[required]"/></span></td>
					</tr>
					<tr valign="top">
						<td><b>Description :</b></td>
						<td><span><textarea name="description" id="description" class="span6 auto_expand"><?php echo $this->_tpl_vars['editteam'][0]['description']; ?>
</textarea></span></td>
					</tr>
					<tr valign="top">
						<td><b>Status :</b></td>
						<td>
							<select name="status" id="status">
								<option value="active" <?php if ($this->_tpl_vars['editteam'][0]['status'] == 'active'): ?>selected<?php endif; ?>>Active</option>
								<option value="inactive" <?php if ($this->_tpl_vars['editteam'][0]['status'] == 'inactive'): ?>selected<?php endif; ?>>Inactive</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>	
							<input type="hidden" id="teamid" name="teamid" value="<?php echo $this->_tpl_vars['editteam'][0]['id']; ?>
">
							<input type="submit" id="team_submit" name="team_submit" value="Save" class="btn btn-info"/>
							<a href="javascript:void(0);" class="btn btn-danger" onclick="clearform();";>Clear</a> 
						</td>
					</tr>
				</table>		
			</form>
		</div>
	</div>
</div>