<?php /* Smarty version 2.6.19, created on 2013-12-03 15:13:12
         compiled from gebo/ao/overdue_popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/ao/overdue_popup.phtml', 86, false),array('modifier', 'wordwrap', 'gebo/ao/overdue_popup.phtml', 86, false),)), $this); ?>
<?php echo '
<link href="/BO/theme/gebo/lib/wysihtml5/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/lib/wysihtml5/wysihtml5-0.3.0.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/lib/wysihtml5/bootstrap-wysihtml5.js"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/lib/wysihtml5/locales/bootstrap-wysihtml5.fr-FR.js"></script>

<script type="text/javascript" >
	$(document).ready(function() { 			
		 $("#extend_form").validate({
		  message:false,
		  errorClass: \'error\',
		  highlight: function(element) {
					$(element).closest(\'span\').addClass("f_error");
			},
		 unhighlight: function(element) {
				$(element).closest(\'span\').removeClass("f_error");
			},
		  rules: {
			extend_date: {
			  required: true,
			  digits: true
			}
		  }
		});
	});
		
	function fngetmailcontent(extend_time,participateId)
	{
		
		var ts = Math.round((new Date()).getTime() / 1000);
		if(participateId!=\'\')
		{
			var commentBox1=$("#extend_comment_"+participateId);
			  commentBox1.hide();
			if (CKEDITOR.instances[\'extend_comment_\'+participateId])
			{
				CKEDITOR.instances[\'extend_comment_\'+participateId].destroy();
			}
		   /////////////////////////////////
			 var editor = CKEDITOR.replace( \'extend_comment_\'+participateId,
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
			
			 var target_page = "/ao/getextendmail?extend_time="+extend_time;
			 $.post(target_page, function(data){   
				CKEDITOR.instances[\'extend_comment_\'+participateId].setData(data);
			 });
			commentBox.show();
			//alert(\'done\');
		}
	}
 </script>
<style>
	.error {  display: none !important;}
</style>
'; ?>


<?php if ($this->_tpl_vars['nores'] != 'true'): ?>
<form name="extend_time" action="/ao/extend-article-submit" method="post" id="extend_form">
	<table cellpadding="4" cellspacing="4">
		<tr> 
			<td>Title</td>
			<td><?php echo $this->_tpl_vars['overDueArticles'][0]['title']; ?>
</td>
		</tr>
		<tr>
			<td>Delivery Title</td>
			<td><?php echo $this->_tpl_vars['overDueArticles'][0]['deliveryTitle']; ?>
</td>
		</tr>
		<tr>	
			<td>Writer</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['overDueArticles'][0]['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['overDueArticles'][0]['last_name'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 10, "\n", true) : smarty_modifier_wordwrap($_tmp, 10, "\n", true)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
		</tr>
		<tr>	
			<td>Rendering time max</td>
			<td><?php echo $this->_tpl_vars['overDueArticles'][0]['submit_expires']; ?>
</td>
		</tr>
		<tr>	
			<td>Add hours</td>
			<td>
				<span><input type="text" id="extend_date" class="span1" name="extend_date" onkeyup="fngetmailcontent(this.value,'<?php echo $this->_tpl_vars['overDueArticles'][0]['id']; ?>
');" /></span>
			</td>
		</tr>
		<tr>	
			<td valign="top">Email sent</td>
			<td id="extend_<?php echo $this->_tpl_vars['overDueArticles'][0]['id']; ?>
" style="float:right;">
				<textarea rows="4" cols="35" name="extend_comment_<?php echo $this->_tpl_vars['overDueArticles'][0]['id']; ?>
" id="extend_comment_<?php echo $this->_tpl_vars['overDueArticles'][0]['id']; ?>
"><?php echo $this->_tpl_vars['mail_content']; ?>
</textarea>
			</td>
		</tr>
		<tr>	
			<td>&nbsp;</td>
			<td style="float:right">
				<input type="hidden" name="participationId" value="<?php echo $this->_tpl_vars['overDueArticles'][0]['id']; ?>
">
				<input type="hidden" name="pagefrom" id="pagefrom" value="<?php echo $this->_tpl_vars['pagefrom']; ?>
">
				<input type="submit" id="submit_pop_edit" name="submit_pop_edit" value="Update" class="btn btn-info"> </input>&nbsp;&nbsp;
				<input type="button" id="close_pop_edit" name="close_pop_edit" value="Fermer" class="btn btn-info" data-dismiss="modal" ></input>
			</td>
		</tr>
	</table>	
</form>	
<?php else: ?>
<?php endif; ?>