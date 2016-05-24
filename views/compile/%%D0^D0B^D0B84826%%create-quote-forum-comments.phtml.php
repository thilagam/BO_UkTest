<?php /* Smarty version 2.6.19, created on 2016-04-04 09:24:32
         compiled from gebo-new/quote/create-quote-forum-comments.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo-new/quote/create-quote-forum-comments.phtml', 1, false),array('modifier', 'utf8_encode', 'gebo-new/quote/create-quote-forum-comments.phtml', 31, false),array('modifier', 'stripslashes', 'gebo-new/quote/create-quote-forum-comments.phtml', 46, false),)), $this); ?>
<div class="quotes-forum" id="quote_forum" <?php if (( ((is_array($_tmp=$this->_tpl_vars['brief_mail'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp)) == 0 && count($this->_tpl_vars['commentDetails']) == 0 )): ?>style="display:none;"<?php endif; ?> >

<h2 class="text-center"><i class="material-icons">question_answer</i><br> Discussion</h2>
	<div class="row quotes-forum-body">
		<div class="new-comment js-new-comment">
			<div class="member member-no-menu">
				<img width="30" height="30" title="" alt="" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="member-avatar">		
			</div>
			<form action="" method="POST" id="comment_form">
				<div class="comment-frame">
					<div class="comment-box">
						<textarea tabindex="1" placeholder="Ecrire un commentaire" name="quotes_forum_comments" id="quotes_forum_comments" class="form-control comment-box-input js-new-comment-input" style="overflow: hidden; word-wrap: break-word; height: 75px;"></textarea>
												<input type="hidden" name="user_id" value="<?php echo $this->_tpl_vars['user_id']; ?>
" id="user_id">
						<input type="hidden" name="quote_id" value="<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
" id="quote_id">
					</div>
				</div>
				<div class="add-controls u-clearfix">
					<button type="button" id="comment_submit" name="comment_submit" class="btn btn-fill">Send</button>
				</div>
			</form>	
		</div>
		<div class="col-md-12" id="comments_list">
			<?php if ($this->_tpl_vars['commentDetails'] | @ count > 0): ?>
				<?php $_from = $this->_tpl_vars['commentDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['commentDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['commentDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['comment']):
        $this->_foreach['commentDetails']['iteration']++;
?>
					<div class="phenom phenom-action u-clearfix phenom-comment">
						<div class="creator member js-show-mem-menu">
							<img width="30" height="30" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['comment']['profile_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['comment']['profile_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" src="<?php echo $this->_tpl_vars['comment']['profile_pic']; ?>
" class="member-avatar">		
						</div>
						<div class="phenom-desc">
							<span idmember="<?php echo $this->_tpl_vars['comment']['user_id']; ?>
" class="inline-member js-show-mem-menu">
								<span class="u-font-weight-bold"><?php echo $this->_tpl_vars['comment']['profile_name']; ?>
</span>
							</span> 
							<span>						
								<?php if ($this->_tpl_vars['comment']['edit'] == 'yes'): ?>
									<a  class="close hint--left" type="button" id="edit_comment_<?php echo $this->_tpl_vars['comment']['id']; ?>
" data-hint="Edit Comment" rel="<?php echo $this->_tpl_vars['comment']['quote_id']; ?>
"><i class="material-icons" style="font-size: 14px">mode_edit</i></a>
									<a  class="close hint--left" rel="<?php echo $this->_tpl_vars['comment']['quote_id']; ?>
" data-hint="Hide Comment" type="button" id="delete_comment_<?php echo $this->_tpl_vars['comment']['id']; ?>
">&times;</a>		
								<?php endif; ?>						
													
							</span>
							<div class="action-comment markeddown js-comment">
								<div class="current-comment js-friendly-links" id="user_comment_<?php echo $this->_tpl_vars['comment']['id']; ?>
">
									<?php echo ((is_array($_tmp=$this->_tpl_vars['comment']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>

								</div>
								<div class="comment-box" id="edit_user_comment_<?php echo $this->_tpl_vars['comment']['id']; ?>
" style="display:none">
									<textarea tabindex="1" class="form-control comment-box-input js-text" name="quotes_forum_comments_<?php echo $this->_tpl_vars['comment']['id']; ?>
" id="quotes_forum_comments_<?php echo $this->_tpl_vars['comment']['id']; ?>
" rel="<?php echo $this->_tpl_vars['comment']['quote_id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['comment']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea>
																		</div>
							</div>
							<div class="hide embedly js-embedly"></div>
						</div>
						<div class="edit-controls u-clearfix" id="control_comment_<?php echo $this->_tpl_vars['comment']['id']; ?>
" style="display:none">
							<button type="button" id="update_submit_<?php echo $this->_tpl_vars['comment']['id']; ?>
" name="update_submit_<?php echo $this->_tpl_vars['comment']['id']; ?>
" class="btn">Mettre &agrave; jour</button>
						</div>
						<p class="phenom-meta quiet">
							<span><?php echo $this->_tpl_vars['comment']['time']; ?>
</span>
						</p>
					</div>			
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>	
		</div>
	</div>
</div>
<!--<div class="row">
	<div class="col-md-12 form-group text-center">
		<a href="/quote-new/create-step1" class="btn btn-default pull-left"><i class="glyphicon glyphicon-chevron-left"></i> Retour</a>
	</div>
</div>-->

<?php echo '
<script type="text/javascript">
$(document).ready(function() {
//edit textarea toggle
		$("body").on(\'click\',"[id^=edit_comment_]", function(event) {
			
			event.preventDefault();
			
			var editButton=$(this).attr(\'id\').split("_");
			var comment_id=editButton[2];		
			var comment_box=$(\'#user_comment_\'+comment_id).toggle();
			var comment_new=$(\'#edit_user_comment_\'+comment_id).toggle();
			$(\'#control_comment_\'+comment_id).toggle();
			
				
		});


//update textare
$("body").on(\'click\',"[id^=update_submit_]", function() {
			
			var updateButton=$(this).attr(\'id\').split("_");
			var comment_id=updateButton[2];		
			var comments=$("#quotes_forum_comments_"+comment_id).val();	
			var quote_id=$("#quotes_forum_comments_"+comment_id).attr(\'rel\');				
			if(comments)
			{
				var target_page = \'/quote-new/save-quote-comments?comment_action=update&quotes_forum_comments=\'+comments+\'&comment_id=\'+comment_id+\'&quote_id=\'+quote_id;			
				$.post(target_page, function(data){					
						
						var obj = $.parseJSON(data);
						$("#comments_list").html(obj.comments);
						$("#comment_count").text(obj.count);
						$("#comment_count_1").html(\'<i class="icon-comment"></i> \'+obj.count);
						$("#quotes_forum_comments").val(\'\');
					}
				);

			}
		});

$("body").on(\'click\',"[id^=delete_comment_]", function() {			
			
			var quote_id=$(this).attr(\'rel\');

			var deleteButton=$(this).attr(\'id\').split("_");
			var comment_id=deleteButton[2];
			var msg = "Are you sure you want to delete the comment?";
			swal({
				  title: "",
				  text: msg,
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#DD6B55",
				  confirmButtonText: "Yes, delete it!",
				  closeOnConfirm: false
				},
				function(){
				  deleteComments(comment_id,quote_id);
				  swal("Deleted!", "Your comment has been deleted.", "success");
				}
			);
			/* smoke.confirm(msg,function(e){
				if (e){
					
					deleteComments(comment_id,quote_id);
				}
				else{
					return false;
				}
			}); */ 			
				
		});
});

function deleteComments(comment_id,quote_id)
{
	
        var target_page = \'/quote-new/save-quote-comments?comment_action=delete&comment_id=\'+comment_id+\'&quote_id=\'+quote_id;
		
		$.post(target_page, function(data){									
				
				var obj = $.parseJSON(data);
				$("#comments_list").html(obj.comments);
				$("#comment_count").text(obj.count);
				$("#comment_count_1").html(\'<i class="icon-comment"></i> \'+obj.count);
				$("#quotes_forum_comments").val(\'\');
				var brief="'; ?>
<?php echo count($this->_tpl_vars['brief_mail']); ?>
<?php echo '";
				if($(\'.phenom\').length==0 && brief==0)
					$("#quote_forum").hide();

			});
}
</script>
'; ?>