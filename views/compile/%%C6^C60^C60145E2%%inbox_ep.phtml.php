<?php /* Smarty version 2.6.19, created on 2015-02-05 11:11:18
         compiled from gebo/master-mails/inbox_ep.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/master-mails/inbox_ep.phtml', 72, false),array('modifier', 'count', 'gebo/master-mails/inbox_ep.phtml', 95, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function() {
	$("#ep_users").chosen({ allow_single_deselect: true,search_contains: true });
	$(".assign_pop_over").popover({trigger: \'click\'});	 
});	
//archieve ticket
	function archieveMsg(ticket_id){
	
		var msg = "Do you want to archive this message ?";
		smoke.confirm(msg,function(e){
			if (e){
					window.location.href = "/mastermails/classifymail?&ticket="+ticket_id;           
				}
			else{
				return false;
			}
		});
	
	}

	function fnassignTicket(ticket_id,ep_user_id)
	{				
		var msg = "Do you want to assign this ticket to some other user ?";
		smoke.confirm(msg,function(e){
			if (e){
					var target="/mastermails/assign-ticket?ticket_id="+ticket_id+"&ep_user_id="+ep_user_id;
					$.post(target,function(response){
						var obj = $.parseJSON(response);
						//alert(response);
						
						if(obj.status==\'same_user\')
						{
							smoke.alert("Please assign ticket to some other user it is currently assigned to same user");
						}
						else if(obj.status==\'success\')
						{
							location.reload(); 
						}
					});      
				}
			else{
				return false;
			}
		});	
	
	}
	
</script>
<style type="text/css">
#contentwrapper
{
	text-transform:none;
}
</style>
'; ?>

<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">
			System messages :: List of messages
		</h3>
		<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['loginName'] == 'akeslassy' || $this->_tpl_vars['loginName'] == 'mfouris' || $this->_tpl_vars['loginName'] == 'julien'): ?>
		<div  id="search_block">
			<form action=<?php echo $_SERVER['REQUEST_URI']; ?>
 method="get" id="searchform" name="searchform" >				
				 <input type="hidden" id="submenuId" name="submenuId"  value="<?php echo $this->_tpl_vars['submenuId']; ?>
"/>				  
				 <table id="searchtable" cellspacing="5" cellpadding="5">
					<tr>
						<td>Select EP :</td>
						<td>
							<select name="ep_user_id" id="ep_users" onChange="this.form.submit();"  data-placeholder="Select EP">
								<option value=''></option>
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['EP_contacts'],'selected' => $this->_tpl_vars['ep_user_id']), $this);?>
	
							</select>
						</td>											
					</tr>
				</table>
			</form>
		</div>
		<?php endif; ?>
		<div class="mbox">									
			<div class="tab-pane active" id="mbox_inbox">
				<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
					<thead>
						<tr>
							<th class="table_checkbox"><input type="checkbox" data-tableid="dt_inbox" class="select_msgs" name="select_msgs"></th>							
							<th><i class="splashy-mail_light"></i></th>
							<th>Subject</th>
							<th>Transmitter</th>
							<th>receiver</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if (count($this->_tpl_vars['paginator']) > 0): ?>
							<?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MainMenu_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MainMenu_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['MainMenu_key'] => $this->_tpl_vars['message']):
        $this->_foreach['MainMenu_loop']['iteration']++;
?>
								<?php if ($this->_tpl_vars['message']['status'] == 0): ?>
									<tr class="unread">
								<?php else: ?>
									<tr>
								<?php endif; ?>	
									<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel" value="<?php echo $this->_tpl_vars['message']['messageId']; ?>
"></td>									
									<td><?php if ($this->_tpl_vars['message']['status'] == 0): ?><i class="splashy-mail_light"></i><?php else: ?><i class="splashy-mail_light_stuffed"></i><?php endif; ?></td>
									<td><a href="/mastermails/view-mail/?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&mailaction=inboxview&page=<?php echo $_REQUEST['page']; ?>
&message=<?php echo $this->_tpl_vars['message']['messageId']; ?>
&ticket=<?php echo $this->_tpl_vars['message']['ticket_id']; ?>
&recipientid=<?php echo $this->_tpl_vars['message']['recipientid']; ?>
"><?php echo $this->_tpl_vars['message']['Subject']; ?>
</a></td>
									<td><span><?php echo $this->_tpl_vars['message']['sendername']; ?>
</span></td>
									<td><span><?php echo $this->_tpl_vars['message']['recipient']; ?>
</span></td>
									<td><?php echo $this->_tpl_vars['message']['receivedDate']; ?>
</td>
									<td>
										
										<a class="hint--left  hint--info" data-hint="answer" href="/mastermails/reply-mail?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&mailaction=reply&reply_message=<?php echo $this->_tpl_vars['message']['messageId']; ?>
&ticket=<?php echo $this->_tpl_vars['message']['ticket_id']; ?>
&recipientid=<?php echo $this->_tpl_vars['message']['recipientid']; ?>
"><i class="icon-pencil"></i></a>
										<a class="hint--left  hint--warning" data-hint="View" href="/mastermails/view-mail/?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&mailaction=inboxview&page=<?php echo $_REQUEST['page']; ?>
&message=<?php echo $this->_tpl_vars['message']['messageId']; ?>
&ticket=<?php echo $this->_tpl_vars['message']['ticket_id']; ?>
&recipientid=<?php echo $this->_tpl_vars['message']['recipientid']; ?>
"><i class="icon-eye-open"></i></a>
										<a class="hint--left  hint" data-hint="Clore la discussion" onclick="archieveMsg('<?php echo $this->_tpl_vars['message']['ticket_id']; ?>
');"><i class="splashy-folder_classic_down" ></i></a>											
										<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['loginName'] == 'akeslassy' || $this->_tpl_vars['loginName'] == 'mfouris' || $this->_tpl_vars['loginName'] == 'julien'): ?>								
											<?php if ($this->_tpl_vars['message']['receiverId'] == $this->_tpl_vars['admin_user_id'] || $this->_tpl_vars['message']['assigned_before']): ?>
												<a class="btn btn-danger assign_pop_over" data-content='<select name="assign_<?php echo $this->_tpl_vars['message']['ticket_id']; ?>
" id="assign_ticket_<?php echo $this->_tpl_vars['message']['ticket_id']; ?>
" onChange="fnassignTicket(<?php echo $this->_tpl_vars['message']['ticket_id']; ?>
,this.value);">	
	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['assign_contacts'],'selected' => $this->_tpl_vars['message']['receiverId']), $this);?>
	
</select>' data-html="true" data-original-title="Assign Ticket" data-placement="left">Assign</a>
											<?php endif; ?>
										<?php endif; ?>
										
									</td>
								</tr>
							
							<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
						
					</tbody>
				</table>    
			</div>					
		</div>
	</div>		
	</div>


<!-- hide elements -->
<div class="hide">
	<!-- actions for inbox -->
	<!--<div class="dt_inbox_actions">
		<div class="btn-group">
			<a href="javascript:void(0)" class="btn" title="Answer"><i class="icon-pencil"></i></a>
			<a href="javascript:void(0)" class="btn" title="Forward"><i class="icon-share-alt"></i></a>
			<a href="#" class="delete_msg btn" title="Delete" data-tableid="dt_inbox"><i class="icon-trash"></i></a>
		</div>
	</div>-->	
	<!-- confirmation box -->
	<div id="confirm_dialog">
		<div class="cbox_content">
			<div class="sepH_c tac"><strong>Are you sure you want to delete this message(s)?</strong></div>
			<div class="tac">
				<a href="#" class="btn btn-gebo confirm_yes">Yes</a>
				<a href="#" class="btn confirm_no">No</a>
			</div>
		</div>
	</div>
</div>
			
	