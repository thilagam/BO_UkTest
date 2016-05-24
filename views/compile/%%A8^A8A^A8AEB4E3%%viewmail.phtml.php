<?php /* Smarty version 2.6.19, created on 2013-09-30 09:20:49
         compiled from gebo/mails/viewmail.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/mails/viewmail.phtml', 17, false),array('modifier', 'date_format', 'gebo/mails/viewmail.phtml', 28, false),array('modifier', 'utf8_decode', 'gebo/mails/viewmail.phtml', 59, false),array('modifier', 'stripslashes', 'gebo/mails/viewmail.phtml', 59, false),)), $this); ?>
<?php echo '
 <script type="text/javascript" >
    function getContactusMessage(msgId)
    {
        var target_page = "/mails/getcontactusmessage?messageId="+msgId;
        $.post(target_page, function(data){
          $("#replymailcontent").html(data);
        });
    }
 </script>
'; ?>


<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Mail System :: View Mail</h3>
		<div class="formbody">
			<?php if (count($this->_tpl_vars['replyMessages']) > 0): ?>
				<?php $_from = $this->_tpl_vars['replyMessages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
					<div class="msg-holder-r-read" >
						<?php if ($this->_tpl_vars['message']['userid'] == $this->_tpl_vars['Identifier']): ?>
							<div class="msg-title-r" style="cursor:pointer">
						<?php else: ?>
							<div class="msg-title-c" style="cursor:pointer">
						<?php endif; ?>
						<?php echo $this->_tpl_vars['message']['Subject']; ?>

						</div>
						<div class="msg-text-r" id="message_<?php echo $this->_tpl_vars['message']['messageId']; ?>
">
							<?php if (((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")) == ((is_array($_tmp=$this->_tpl_vars['message']['receivedDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y"))): ?>
								<b>De: <?php echo $this->_tpl_vars['message']['sendername']; ?>
 - Re&ccedil;u le :  <?php echo ((is_array($_tmp=$this->_tpl_vars['message']['receivedDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%R") : smarty_modifier_date_format($_tmp, "%R")); ?>
 </b><br/>
							<?php else: ?>		
								<b>De: <?php echo $this->_tpl_vars['message']['sendername']; ?>
 - Re&ccedil;u le :  <?php echo ((is_array($_tmp=$this->_tpl_vars['message']['receivedDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>
 </b><br/>
							<?php endif; ?>
								<?php echo $this->_tpl_vars['message']['content']; ?>

							<?php if ($this->_tpl_vars['message']['attachment_name'] != ''): ?>
								<div style="text-align:left;margin-top:20px"><strong>Pi&egrave;ce jointe : </strong></div>
									<?php $_from = $this->_tpl_vars['message']['attachment_files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['files'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['files']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['attachment_file']):
        $this->_foreach['files']['iteration']++;
?>
										<div style="text-align:left;margin-top:5px">
											<?php echo $this->_tpl_vars['attachment_file']; ?>
 		
											<a target="_blank" href="/mails/viewmail?mailaction=viewattachment&display=attachment&index=<?php echo ($this->_foreach['files']['iteration']-1); ?>
&attachment=<?php echo $this->_tpl_vars['message']['messageId']; ?>
" class="btn btn-info">T&eacute;l&eacute;charger</a>
										</div>
									<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>		
						</div>
					</div>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
			
			<?php $_from = $this->_tpl_vars['viewMessage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
				<div>
					<?php if ($_GET['mailaction'] != 'inboxview'): ?>
					<div style="background-color:rgb(235, 242, 246);line-height: 32px;padding: 0 10px;font-weight:bold"><?php echo $this->_tpl_vars['message']['Subject']; ?>
</div>
					<div style="text-transform:none;padding: 10px;">
						<?php if ($_GET['mailaction'] == 'approveview'): ?>
							<b>From: <?php echo $this->_tpl_vars['message']['sendername']; ?>
<br> To: <?php echo $this->_tpl_vars['message']['recipientname']; ?>
  -  Re&ccedil;u le : <?php echo $this->_tpl_vars['message']['receivedDate']; ?>
 </b><br/>
						<?php else: ?>
							<b>De: <?php echo $this->_tpl_vars['message']['sendername']; ?>
  -  Re&ccedil;u le : <?php echo $this->_tpl_vars['message']['receivedDate']; ?>
 - Email : <?php echo $this->_tpl_vars['message']['email']; ?>
</b><br/>
						<?php endif; ?>

						<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['message']['text_message'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>


						<?php if ($this->_tpl_vars['message']['attachment_name'] != ''): ?>

							<div style="text-align:left;margin-top:20px"><strong>Attachment : </strong></div>
							<?php $_from = $this->_tpl_vars['attachments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['files'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['files']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['attachment_file']):
        $this->_foreach['files']['iteration']++;
?>
								<div style="text-align:left;margin-top:5px">
									<?php echo $this->_tpl_vars['attachment_file']; ?>

									<a target="_blank" href="/mails/viewmail/?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&mailaction=viewattachment&display=attachment&index=<?php echo ($this->_foreach['files']['iteration']-1); ?>
&attachment=<?php echo $this->_tpl_vars['message']['id']; ?>
" class="btn btn-info">T&eacute;l&eacute;charger</a>
								</div>
							<?php endforeach; endif; unset($_from); ?>

						<?php endif; ?>

					</div>
					<?php endif; ?>
					<?php if ($_GET['mailaction'] == 'sentview'): ?>
						<div style="text-align:left">
							<a  href="/mails/sentmails?submenuId=ML4-SL3&page=<?php echo $_GET['page']; ?>
" class="btn btn-info">Retour</a>
						</div>

					<?php elseif ($_GET['mailaction'] == 'classview'): ?>
						<div style="text-align:right">
							<a  href="/mails/classifybox?submenuId=ML4-SL4&mailaction=classifybox&ticket=<?php echo $_GET['ticket']; ?>
&page=<?php echo $_GET['page']; ?>
" class="btn btn-info">Retour</a>
						</div>

					<?php elseif ($_GET['mailaction'] == 'inboxview'): ?>
						<?php if (( $this->_tpl_vars['message']['locked_user'] == NULL && $this->_tpl_vars['message']['bo_user_type'] == NULL ) || ( $this->_tpl_vars['message']['locked_user'] && $this->_tpl_vars['message']['bo_user_type'] )): ?>
						<div style="float:right">
							<a href="/mails/replymail?submenuId=ML4-SL3&mailaction=reply&reply_message=<?php echo $this->_tpl_vars['message']['id']; ?>
&ticket=<?php echo $this->_tpl_vars['message']['ticket_id']; ?>
"><img src="/BO/images/reply.png"/></a>
						</div>
						<div style="float:right;margin-right:8px">
							<a href="/mails/classifymail?submenuId=ML4-SL3&ticket=<?php echo $this->_tpl_vars['message']['ticket_id']; ?>
" onclick="return confirm('Do you want to move this message to classes?');"><img src="/BO/images/classify.png"/></a>
						</div>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['message']['locked_user'] == NULL && $this->_tpl_vars['message']['bo_user_type']): ?>
							<div style="float:right;margin-right:8px">
							<a href="/mails/message-lock?submenuId=ML4-SL2&status=lock&messageId=<?php echo $this->_tpl_vars['message']['id']; ?>
">
							 <img width="28" height="27" border="0" alt="Lock" title="Lock" src="/image/picto/unlock_blue.png" style="vertical-align:top"></a>
							 </div>
						<?php elseif ($this->_tpl_vars['message']['locked_user'] && $this->_tpl_vars['message']['bo_user_type']): ?>
							<div style="float:right;margin-right:8px">
							<a href="/mails/message-lock?submenuId=ML4-SL2&status=unlock&messageId=<?php echo $this->_tpl_vars['message']['id']; ?>
">
							 <img width="28" height="27" border="0" alt="Unlock" title="Unlock" src="/image/picto/lock_org.png" style="vertical-align:top"></a>
							 </div>
						<?php endif; ?>
						<div style="text-align:left">
							<a  href="/mails/inbox?submenuId=ML4-SL2&page=<?php echo $_GET['page']; ?>
" class="btn btn-info">Retour</a>
						</div>
					<?php elseif ($_GET['mailaction'] == 'contactusmailreply'): ?>
						<div style="text-align:left">
							<a  href="/mails/contactus?submenuId=ML4-SL9" class="btn btn-info">Retour</a>
						</div>
						<div style="text-align:right">
							<a  onclick="return getContactusMessage(<?php echo $this->_tpl_vars['message']['contactusmailId']; ?>
);" class="btn btn-info" data-target="#replymail" data-toggle="modal">Reply</a>
						</div>
					<?php else: ?>
						<div style="text-align:left">
							<a  href="/mails/approvemails?submenuId=ML4-SL5&page=<?php echo $_GET['page']; ?>
" class="btn btn-info">Retour</a>
						</div>
						<div style="text-align:right">
							<a  href="/mails/mailapprove?messageId=<?php echo $this->_tpl_vars['message']['id']; ?>
&page=<?php echo $_GET['page']; ?>
" class="btn btn-info">Approve</a>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; endif; unset($_from); ?>
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