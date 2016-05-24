<?php /* Smarty version 2.6.19, created on 2016-04-21 10:20:40
         compiled from gebo/quizz/listparticipants.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/quizz/listparticipants.phtml', 40, false),)), $this); ?>
<?php echo '
    <script type="text/javascript" >
        $(\'#participationtable\').dataTable({
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
     </script>
'; ?>

<div class="row-fluid">
	<div class="span12">
    	<h3 class="heading">Participation list</h3>
        <table class="table table-bordered table-striped table_vam"  id="participationtable" >
	  		<thead>
				<tr>
				   <th>S.NO</th>
				   <th>Participant</th>
				   <th>Number of questions</th>
				   <th>Number of correct answers</th>
                   <th>Percentage</th>
                   <th>Date</th>
				</tr>
			</thead>
			<tbody>
			<?php $_from = $this->_tpl_vars['participantslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['participants_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['participants_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['participants_item']):
        $this->_foreach['participants_loop']['iteration']++;
?>
				<tr>
					<td align="center"><?php echo ($this->_foreach['participants_loop']['iteration']-1)+1; ?>
</td>
					<td><a href="/user/contributor-edit-new?submenuId=ML2-SL7&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['participants_item']['user_id']; ?>
"><?php echo $this->_tpl_vars['participants_item']['last_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['participants_item']['first_name']; ?>
</a></td>
					<td align="center"><?php echo $this->_tpl_vars['participants_item']['num_total']; ?>
</td>
					<td align="center"><?php echo $this->_tpl_vars['participants_item']['num_correct']; ?>
</td>
					<td align="center"><?php echo $this->_tpl_vars['participants_item']['percent']; ?>
</td>
					<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['participants_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%e/%m/%Y") : smarty_modifier_date_format($_tmp, "%e/%m/%Y")); ?>
</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			</tbody>
        </table>
	</div>
</div>	



