<?php /* Smarty version 2.6.19, created on 2013-09-27 12:16:44
         compiled from gebo/ao/contactus.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/ao/contactus.phtml', 58, false),array('modifier', 'wordwrap', 'gebo/ao/contactus.phtml', 58, false),)), $this); ?>
<?php echo '
 <script type="text/javascript" >
	$(document).ready(function() {
	   $(\'#contact_table\').dataTable({
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

   function getContactusMessage(msgId)
    {
        var target_page = "/mails/getcontactusmessage?messageId="+msgId;
        $.post(target_page, function(data){
			$("#replymailcontent").html(data);
        });
    }
    
    function valDelete()
    {
       var c = confirm("Do You Really Want to Delete This Message");
        if(c)
        return true;
        else
        return false;
    }
 </script>
'; ?>


<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Mail Syst&egrave;me :: Mail De Visiteurs Contact&egrave;s</h3>
        <table class="table table-bordered table-striped table_vam" id="contact_table">
	  		<thead>
				<tr>
				  <th>ID N&deg;</th>
				  <th>From</th>
				  <th>subject</th>
				  <th>Email</th>
				  <th>Reçu à</th>
				  <th>ACTIONS</th>
				</tr>
			</thead>
			<tbody>
			<?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MainMenu_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MainMenu_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['message']):
        $this->_foreach['MainMenu_loop']['iteration']++;
?>
				<tr>
				   <td><?php echo ($this->_foreach['MainMenu_loop']['iteration']-1)+1; ?>
</td>
				   <td><?php echo $this->_tpl_vars['message']['name']; ?>
</td>
				   <td style="text-align:left;"><a href="/mails/viewmail/?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&mailaction=contactusmailreply&page=<?php echo $_REQUEST['page']; ?>
&contactusmsgId=<?php echo $this->_tpl_vars['message']['identifier']; ?>
" >
					   <?php if ($this->_tpl_vars['message']['status'] == 0): ?><b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['message']['msg_object'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 23, "\n", true) : smarty_modifier_wordwrap($_tmp, 23, "\n", true)); ?>
</b><?php else: ?>
					   <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['message']['msg_object'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 23, "\n", true) : smarty_modifier_wordwrap($_tmp, 23, "\n", true)); ?>

					   <?php endif; ?></a></div>
				   <td><?php echo $this->_tpl_vars['message']['email']; ?>
</td>
				   <td><?php echo $this->_tpl_vars['message']['created_at']; ?>
</td>
				   <td>
						<a href="contactus?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&contactusmsgId=<?php echo $this->_tpl_vars['message']['identifier']; ?>
" onclick="return valDelete();">
							<i class="splashy-remove"></i>
						</a>&nbsp; 
						<a onclick="return getContactusMessage('<?php echo $this->_tpl_vars['message']['identifier']; ?>
');" style="cursor: pointer" data-target="#replymail" data-toggle="modal">
							<img width="16" height="16" border="0" alt="%reply%" title="%reply%" src="/image/reply.png">
						</a>
				   </td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</tbody>
		</table>
	</div>
</div>	

	<!--Add/Edit template-->
	<div class="modal hide fade" id="replymail">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">&times;</button>
			<h3>Accepter/ Refuse mail</h3>
		</div>
		<div class="modal-body" id="replymailcontent">
		</div>
		<div class="modal-footer">
		</div>
	</div>