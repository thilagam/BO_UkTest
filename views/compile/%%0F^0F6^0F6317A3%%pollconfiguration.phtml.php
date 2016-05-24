<?php /* Smarty version 2.6.19, created on 2015-03-24 13:50:55
         compiled from gebo/ao/pollconfiguration.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'gebo/ao/pollconfiguration.phtml', 64, false),array('modifier', 'stripslashes', 'gebo/ao/pollconfiguration.phtml', 65, false),array('modifier', 'wordwrap', 'gebo/ao/pollconfiguration.phtml', 65, false),)), $this); ?>
<?php echo '
<script>
	$(document).ready(function() {
		$(\'#pollconfiguration\').dataTable({
			"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
			"sPaginationType": "bootstrap",
			"aaSorting": [[ 0, "asc" ]],
			"aoColumns": [
				{ "sType": "formatted-num" },
				{ "sType": "string" },
				{ "sType": "string" },
				{ "sType": "natural" }
			]

		});
	});	
	
	function editquestion(ques)
	{
		var target_page = "/ao/questionedit?quesid="+ques;

		$.post(target_page, function(data){ 
			$("#editquestioncontent").html(data);
		});
	}		
		
	function deletequestion(ques)
	{
		if(confirm("Do you really want to delete the question?"))
		{
			var target_page = "/ao/questiondelete?quesid="+ques;

			$.post(target_page, function(data){ 
				smoke.alert("Deleted successfully !!");
				window.location="/ao/pollconfiguration?submenuId=ML2-SL23";
			});
		}
	}	
		
</script>

'; ?>

	<div class="row-fluid">
  		<div class="span12">
			<h3 class="heading">Quote Configuration</h3>
			<div align="right" style="padding-bottom:10px;">
				<input type="button" class="btn btn-info" onClick="window.location='/ao/smicconfigure?submenuId=ML2-SL23';" value="SMIC / COUNTRY" />
				<input type="button" class="btn btn-info" onClick="window.location='/ao/categorydifficulty?submenuId=ML2-SL23';" value="% of difficulty / category" />
				<input type="button" class="btn btn-info" data-toggle="modal" data-target="#editquestion" name="add_question" id="add_question"  onClick="editquestion();" value="Add a question" />
			</div>	
			
			<table id="pollconfiguration" class="table table-bordered table-striped table_vam" style="text-align:left">
				<thead>
					<tr>
					  <th>SI</th>
					  <th>Question</th>
					  <th>Type of response expected</th>
					  <th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $_from = $this->_tpl_vars['pquestionlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quesloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quesloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ques']):
        $this->_foreach['quesloop']['iteration']++;
?>
					<tr>
					   <td><?php echo smarty_function_math(array('assign' => 'loopindex','equation' => 'x+1','x' => ($this->_foreach['quesloop']['iteration']-1)), $this);?>
 <?php echo ($this->_foreach['quesloop']['iteration']-1)+1; ?>
</td>
					   <td style="text-align:left"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['ques']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 15, "\n", true) : smarty_modifier_wordwrap($_tmp, 15, "\n", true)); ?>
</td>
					   <td><?php echo $this->_tpl_vars['ques']['type']; ?>
</td>
					   <td>
							<a data-toggle="modal" data-target="#editquestion" href="javascript:void(0);" onclick="editquestion('<?php echo $this->_tpl_vars['ques']['id']; ?>
');"><i class="splashy-application_windows_edit"></i></a>
							<a href="javascript:void(0);" onclick="deletequestion('<?php echo $this->_tpl_vars['ques']['id']; ?>
');"><i class="splashy-remove"></i></a>
						</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
		</div>
	</div>
	
	<!--Edit question-->
	<div class="modal hide fade" id="editquestion">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">&times;</button>
			<h3>Add Question</h3>
		</div>
		<div class="modal-body" id="editquestioncontent">
		</div>
		<div class="modal-footer">
		</div>
	</div>