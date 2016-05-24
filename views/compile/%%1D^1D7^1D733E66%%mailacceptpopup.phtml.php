<?php /* Smarty version 2.6.19, created on 2013-09-30 09:20:53
         compiled from gebo/mails/mailacceptpopup.phtml */ ?>
<?php echo '
    <script type="text/javascript" >
	$(function(){
			//<![CDATA[
		// Replace the <textarea id="editor1"> with an CKEditor instance.
		var type="'; ?>
<?php echo $this->_tpl_vars['type']; ?>
";
		<?php echo '

		var div;
		if(type=="approve")
			div="mailaccept_message";
        else if(type=="contactusmailreply")
			div="contactusreplymsg";
		else if(type!="approve")
			div="mail_message";

		var editor = CKEDITOR.replace( div,
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
	//]]>

	});

	function GetContents()
	{
		// Get the editor instance that you want to interact with.
		var oEditor= CKEDITOR.instances.mailaccept_message;
	    var data=oEditor.getData();
		return  data;
	}
	function GetContents1()
	{
		// Get the editor instance that you want to interact with.
		var oEditor= CKEDITOR.instances.mail_message;
		var data=oEditor.getData();
		return  data;
	}
    function GetContents2()
	{
		// Get the editor instance that you want to interact with.
		var oEditor= CKEDITOR.instances.contactusreplymsg;
		var data=oEditor.getData();
		return  data;
	}
     function valMessageApprove()
     {
        //var message=$("#mailaccept_message").val();
		var message=GetContents();
		message = message.replace(/(<([^>]+)>)/ig,"");
		message = message.replace(/&nbsp;/gi,"");

        if($.trim(message).length <1 || message=="")
        {
            smoke.alert(\'Please Enter Message\');
            return false;
        }
        else
             return true;
     }
     function valMessage()
     {
        //var message=$("#mail_message").val();
		var message=GetContents1();
		message = message.replace(/(<([^>]+)>)/ig,"");
		message = message.replace(/&nbsp;/gi,"");
        if($.trim(message).length <1 || message=="")
        {
            smoke.alert(\'Please Enter Message\');
            return false;
        }
        else
             return true;
     }
     function valMessageContactus()
     {
        //var message=$("#mail_message").val();
		var message=GetContents2();
		message = message.replace(/(<([^>]+)>)/ig,"");
		message = message.replace(/&nbsp;/gi,"");
        if($.trim(message).length <1 || message=="")
        {
            smoke.alert(\'Please Enter Message\');
            return false;
        }
        else
             return true;
     }
	
    </script>
'; ?>


<?php if ($this->_tpl_vars['type'] == 'approve'): ?>
	<form name="" action="/mails/mailapprove?submenuId=submenuId=ML4-SL5&messageId=<?php echo $this->_tpl_vars['msgId']; ?>
&page=<?php echo $this->_tpl_vars['pageId']; ?>
" method="post">
		<table cellpadding="4" cellspacing="4" align="center">
			<tr>
				<td valign="top"> Message : </td>
				<td><textarea id="mailaccept_message" name="mailaccept_message" value="" class="span5" rows="10"><?php echo $this->_tpl_vars['msgContent']; ?>
</textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" id="mailaccept_submit" name="mailaccept_submit" value="Valider" class="btn btn-info" onclick="return valMessageApprove();"/>
					<input type="button" id="close_pop" name="close_pop" value="Close" class="btn btn-info" data-dismiss="modal"/>
				</td>
			</tr>
		</table>
	</form>	
<?php elseif ($this->_tpl_vars['type'] == 'contactusmailreply'): ?>
	<form name="" action="/mails/replymailcontactus?submenuId=submenuId=ML4-SL9" method="post">
		<table cellpadding="4" cellspacing="4" align="center">
			<tr>
				<td>To</td>
				<td><?php echo $this->_tpl_vars['recipient']; ?>
 - (<?php echo $this->_tpl_vars['email']; ?>
)</td>
			</tr>
			<tr>
				<td>Object</td>
				<td><input id="contactusmsg_object" name="contactusmsg_object" value="Re:<?php echo $this->_tpl_vars['msgSubject']; ?>
" type="text" class="span5"/></td>
			</tr>
			<tr>
				<td valign="top">Message</td>
				<td><textarea id="contactusreplymsg" name="contactusreplymsg" value="" class="span5" rows="10"></textarea></td>
			</tr>
			<tr>	
				<td></td>
				<td>
					<input type="submit" id="contactusmailreply" name="contactusmailreply" value="Reply" class="btn btn-info" onclick="return valMessageContactus();"/>
					<input type="button" id="close_pop" name="close_pop" value="Close" class="btn btn-info" data-dismiss="modal"/>
					<input type="hidden" id="replyemail" name="replyemail" value="<?php echo $this->_tpl_vars['email']; ?>
" />
					<input type="hidden" id="messageId" name="messageId" value="<?php echo $this->_tpl_vars['msgId']; ?>
" />
				</td>
			</tr>
		</table>		
	</form>	
<?php else: ?>
    <form name="" action="/mails/sendcomposemail?submenuId=submenuId=ML4-SL5&messageId=<?php echo $this->_tpl_vars['msgId']; ?>
&page=<?php echo $this->_tpl_vars['pageId']; ?>
&recipient=<?php echo $this->_tpl_vars['recipientId']; ?>
" method="post">
		<table cellpadding="4" cellspacing="4" align="center">
			<tr>
				<td>To</td>
				<td><?php echo $this->_tpl_vars['recipient']; ?>
 - (<?php echo $this->_tpl_vars['email']; ?>
)</td>
			</tr>	
			<tr>
				<td>Object</td>
				<td><input id="msg_object" name="msg_object" value="Re:<?php echo $this->_tpl_vars['msgSubject']; ?>
" class="span5"/></td>
			</tr>
			<tr>	
				<td valign="top">Message</td>
				<td><textarea id="mail_message" name="mail_message" value="" class="span5" rows="10"></textarea></td>
			</tr>	
			<tr>
				<td></td>
				<td>
					<input type="submit" id="mailreject_submit" name="mailreject_submit" value="Submit" class="btn btn-info" onclick="return valMessage();"/>
					<input type="button" id="close_pop" name="close_pop" value="Close" class="btn btn-info" data-dismiss="modal"/>
				</td>
			</tr>	
		</table>
	</form>	
<?php endif; ?>

