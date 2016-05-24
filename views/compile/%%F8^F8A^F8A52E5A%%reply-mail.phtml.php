<?php /* Smarty version 2.6.19, created on 2013-12-11 08:02:13
         compiled from gebo/master-mails/reply-mail.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/master-mails/reply-mail.phtml', 184, false),array('modifier', 'date_format', 'gebo/master-mails/reply-mail.phtml', 214, false),)), $this); ?>
<?php echo '
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/jquery.validate.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/jquery.MultiFile.js"></script>
<style type="text/css">
.control-label {    
    padding-top: 5px;    
	font-weight:bold;	
}
label {    
    padding-top: 5px;
}
.MultiFile-label
{
	padding-top:3px;
}
#msg_object
{
	text-transform:none;
}
.error {  display: none !important;}
.doc_view .doc_view_content,.dl-horizontal dt,.doc_view .doc_view_header dd, .doc_view .doc_view_header dt
{
	text-transform:none;
}
</style>
 <script type="text/javascript" >
$(document).ready(function() {			
	
	//Multiple files selector
	$(\'#attachments\').MultiFile();
	
	$(".uni_style").uniform();	

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
	
	jQuery.validator.addMethod("checkMessage", function(value,element) {
		var content = tinyMCE.activeEditor.getContent();
		alert(content);
		$("#mail_message").val(content);
				if(content)
					return false;
				else
					return true;
	}, "Thank you to enter a correct phone number");

	
	 $("#reply_message_form").validate({		
		  message:false,
		  errorClass: \'error\',
		  validClass: \'valid\',
		  highlight: function(element) {
					$(element).closest(\'span\').addClass("f_error");
			},
		 unhighlight: function(element) {
				$(element).closest(\'span\').removeClass("f_error");
			},
	     errorPlacement: function(error, element) {
				if($.inArray(element.attr("id"), [\'mail_message\'])> -1) {						
							$("#message_error").html(error);
				}	
				else
					$(element).closest(\'div\').append(error);
            },
		  rules: {			
			mail_message:{required:true,checkMessage:true}
		  }
		});
		
	$(\'textarea\').tinymce({
                // Location of TinyMCE script
                script_url 							: \'/BO/theme/gebo/lib/tiny_mce/tiny_mce.js\',
                // General options
                theme 								: "advanced",
                plugins 							: "autoresize,style,table,advhr,advimage,advlink,emotions,inlinepopups,preview,media,contextmenu,paste,fullscreen,noneditable,xhtmlxtras,template,advlist",
                // Theme options
                theme_advanced_buttons1 			: "undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect",
                theme_advanced_buttons2 			: "forecolor,backcolor,|,cut,copy,paste,pastetext,|,bullist,numlist,link,image,media,|,code,preview,fullscreen",
                theme_advanced_buttons3 			: "",
                theme_advanced_toolbar_location 	: "top",
                theme_advanced_toolbar_align 		: "left",
                theme_advanced_statusbar_location 	: "bottom",
                theme_advanced_resizing 			: false,
                font_size_style_values 				: "8pt,10pt,12pt,14pt,18pt,24pt,36pt",
                init_instance_callback				: function(){
                    function resizeWidth() {
                        document.getElementById(tinyMCE.activeEditor.id+\'_tbl\').style.width=\'100%\';
                    }
                    resizeWidth();
                    $(window).resize(function() {
                        resizeWidth();
                    })
                }
            });	
		
	});
	
 </script>
'; ?>

<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">
			System Messages :: Post Reply
			
			<div style="display:inline;float:right"><a name="back" class="btn btn-success" href="/mastermails/inbox-ep?submenuId=ML6-SL2">Return</a></div>  
			
		</h3>
		
		<div class="tab-pane" id="mbox_new">
			<form id="reply_message_form" method="POST" class="form-horizontal" name="reply_message" action="/mastermails/sendreplymail" enctype="multipart/form-data">
				
				<input type="hidden" name="ticket_id" value="<?php echo $this->_tpl_vars['ticketid']; ?>
"/>
				<input type="hidden" name="recipientid" value="<?php echo $_GET['recipientid']; ?>
"/>
				<input type="hidden" name="reply_message" value="<?php echo $_GET['reply_message']; ?>
"/>
			
				<fieldset>
					<div class="control-group">
						<label class="control-label">Transmitter :</label>
						<div class="controls">
							<label><?php echo $this->_tpl_vars['from_contact_name']; ?>
</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">receiver :</label>
						<div class="controls">
							<label>
								<?php if ($this->_tpl_vars['to_user_type'] == 'contributor'): ?>
									<a href="/user/contributor-edit?submenuId=ML2-SL7&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['to_contact_id']; ?>
"><?php echo $this->_tpl_vars['to_contact_name']; ?>
</a>
								<?php elseif ($this->_tpl_vars['to_user_type'] == 'client'): ?>
									<a href="/user/client-edit?submenuId=ML2-SL7&tab=viewclient&userId=<?php echo $this->_tpl_vars['to_contact_id']; ?>
"><?php echo $this->_tpl_vars['to_contact_name']; ?>
</a>
								<?php else: ?>
									<?php echo $this->_tpl_vars['to_contact_name']; ?>

								<?php endif; ?>		
									
								</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Subject :</label>
						<div class="controls">
							<label>Re :<?php echo $this->_tpl_vars['object']; ?>
</label>
						</div>
					</div>					
					<div class="control-group">
						<label class="control-label">Piece(s) Attached(s) :</label>					
						<div class="controls">
							<input type="file" name="attachment[]" id="attachments" class="multi">
						</div>
						
						
					</div>
					<div class="control-group">
						<label class="control-label" for="mail_message">Message :</label>
						<div class="controls">
							<span><textarea class="span8 auto_expand" rows="5" cols="10" id="mail_message" name="mail_message"></textarea></span>
							<span id="message_error"></span>
						</div>	
					</div>
					
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-gebo" type="submit" id="reply_message">forward</button>
						</div>	
					</div>
				<fieldset>	
			</form>
		</div>
		
		
		
		<?php if (count($this->_tpl_vars['replyMessages']) > 0): ?>
		<?php $_from = $this->_tpl_vars['replyMessages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
			<div class="tab-pane">
				<div class="doc_view">
					<div class="doc_view_header">
						<dl class="dl-horizontal">
							<dt>Subject</dt>
								<dd><?php echo $this->_tpl_vars['message']['Subject']; ?>
</dd>
							<dt>Sender</dt>
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
							<dt>Recipient</dt>
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
							<dt>received</dt>
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
	</div>
</div>	