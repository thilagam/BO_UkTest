<?php /* Smarty version 2.6.19, created on 2013-12-11 08:02:06
         compiled from gebo/master-mails/view-mail.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/master-mails/view-mail.phtml', 67, false),array('modifier', 'date_format', 'gebo/master-mails/view-mail.phtml', 97, false),)), $this); ?>
<?php echo '
<style type="text/css">
.doc_view .doc_view_content,.dl-horizontal dt,.doc_view .doc_view_header dd, .doc_view .doc_view_header dt
{
	text-transform:none;
}
</style>
<script type="text/javascript">

$(document).ready(function() {
//prevent link redirection and ask for confirmation
		$( "a" ).click(function( event ) {
				event.preventDefault();
				var href=$(this).attr("href");
				var msg = "Remember to close your discussion before leaving this page";
				smoke.confirm(msg,function(e){
					if (e){
							window.location.href =href;
						}
					else{
						return false;
					}
				});
		});		
				
	});			

//archieve ticket
	function archieveMsg(ticket_id){
	
		var msg = "Do you want to archive this message?";
		smoke.confirm(msg,function(e){
			if (e){
					window.location.href = "/mastermails/classifymail?&ticket="+ticket_id;           
				}
			else{
				return false;
			}
		});
	
	}

//reply ticket
function fnrespondmessage()
{
	var reply_message=\''; ?>
<?php echo $_GET['message']; ?>
<?php echo '\';
	var ticket=\''; ?>
<?php echo $_GET['ticket']; ?>
<?php echo '\';
	var recipientid=\''; ?>
<?php echo $_GET['recipientid']; ?>
<?php echo '\';
	var submenuId=\''; ?>
<?php echo $this->_tpl_vars['submenuId']; ?>
<?php echo '\';
	var href=\'/mastermails/reply-mail?submenuId=\'+submenuId+\'&mailaction=reply&reply_message=\'+reply_message+\'&ticket=\'+ticket+\'&recipientid=\'+recipientid;
	window.location.href=href;
}
	
</script>	
'; ?>


<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">
			System Messages :: Consultation Post
			<?php if ($_GET['mailaction'] == 'sentboxview'): ?>
				<div style="display:inline;float:right"><a  class="btn btn-success" href="/mastermails/sent-mails?submenuId=ML6-SL3">Return</a></div>  
			<?php else: ?>
				<div style="display:inline;float:right"><a  class="btn btn-success" href="/mastermails/inbox-ep?submenuId=ML6-SL2">Return</a></div>  
			<?php endif; ?>	
		</h3>
		<?php if (count($this->_tpl_vars['replyMessages']) > 0): ?>
		<?php $_from = $this->_tpl_vars['replyMessages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
			<div  class="tab-pane">
				<div class="doc_view">
					<div class="doc_view_header">
						<dl class="dl-horizontal">
							<dt>Objet</dt>
								<dd><?php echo $this->_tpl_vars['message']['Subject']; ?>
</dd>
							<dt>Transmitter</dt>
								<dd><span>
									<?php if ($this->_tpl_vars['message']['sender_type'] == 'contributor'): ?>
										<a href="/user/contributor-edit?submenuId=ML2-SL7&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['message']['userid']; ?>
"><?php echo $this->_tpl_vars['message']['sendername']; ?>
</a>
									<?php elseif ($this->_tpl_vars['message']['sender_type'] == 'client'): ?>
										<a href="/user/client-edit?submenuId=ML2-SL7&tab=viewclient&userId=<?php echo $this->_tpl_vars['message']['userid']; ?>
"><?php echo $this->_tpl_vars['message']['sendername']; ?>
</a>
									<?php else: ?>
										<?php echo $this->_tpl_vars['message']['sendername']; ?>

									<?php endif; ?>										
								</span></dd>							
							<dt>Reciepient</dt>
								<dd><span>
									<?php if ($this->_tpl_vars['message']['recipient_type'] == 'contributor'): ?>
										<a href="/user/contributor-edit?submenuId=ML2-SL7&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['message']['receiverId']; ?>
"><?php echo $this->_tpl_vars['message']['recipient']; ?>
</a>
									<?php elseif ($this->_tpl_vars['message']['recipient_type'] == 'client'): ?>
										<a href="/user/client-edit?submenuId=ML2-SL7&tab=viewclient&userId=<?php echo $this->_tpl_vars['message']['receiverId']; ?>
"><?php echo $this->_tpl_vars['message']['recipient']; ?>
</a>
									<?php else: ?>
										<?php echo $this->_tpl_vars['message']['recipient']; ?>

									<?php endif; ?>									
								</span></dd>	
							<dt>Received at</dt>
								<dd>
									<?php if (((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")) == ((is_array($_tmp=$this->_tpl_vars['message']['receivedDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y"))): ?>
										<?php echo ((is_array($_tmp=$this->_tpl_vars['message']['receivedDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%R") : smarty_modifier_date_format($_tmp, "%R")); ?>

									<?php else: ?>		
										<?php echo ((is_array($_tmp=$this->_tpl_vars['message']['receivedDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>

									<?php endif; ?>
								
								</dd>							
							<?php if ($this->_tpl_vars['message']['attachment_name'] != ''): ?>								
								<dt><i class="icon-adt_atach"></i></dt>
								<dd>
								<?php $_from = $this->_tpl_vars['message']['attachment_files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['files'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['files']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['attachment_file']):
        $this->_foreach['files']['iteration']++;
?>										
										<a target="_blank" href="/mastermails/view-mail?mailaction=viewattachment&display=attachment&index=<?php echo ($this->_foreach['files']['iteration']-1); ?>
&attachment=<?php echo $this->_tpl_vars['message']['messageId']; ?>
"><?php echo $this->_tpl_vars['attachment_file']; ?>
</a>, 									
								<?php endforeach; endif; unset($_from); ?>
								</dd>
							<?php endif; ?>
						</dl>
					</div>
					<div class="doc_view_content">
						<?php echo $this->_tpl_vars['message']['content']; ?>

					</div>
					<!--<div class="doc_view_footer clearfix">
						<div class="btn-group pull-left">
							<a class="btn" href="javascript:void(0)"><i class="icon-pencil"></i> Answer</a>
							<a class="btn" href="javascript:void(0)"><i class="icon-share-alt"></i> Forward</a>
							<a class="btn" href="#"><i class="icon-trash"></i> Delete</a>
						</div>
						<div class="pull-right">
							
						</div>
					</div>-->
				</div>				
			</div>
			<?php endforeach; endif; unset($_from); ?>							
		<?php endif; ?>	
	<?php if ($_GET['mailaction'] == 'inboxview'): ?>	
		<!--<a class="btn btn-info" href="/mastermails/reply-mail?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&mailaction=reply&reply_message=<?php echo $_GET['message']; ?>
&ticket=<?php echo $_GET['ticket']; ?>
&recipientid=<?php echo $_GET['recipientid']; ?>
"><i class="icon-pencil"></i> answer</a>-->
		<button class="btn btn-info" onclick="fnrespondmessage();"><i class="icon-pencil"></i> answer</button>
		<button class="btn" onclick="archieveMsg('<?php echo $_GET['ticket']; ?>
');"><i class="splashy-folder_classic_down" ></i> Close the discussion</button>
	<?php endif; ?>	
	</div>
</div>	