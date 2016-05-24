<?php /* Smarty version 2.6.19, created on 2015-02-16 11:24:03
         compiled from gebo/ongoing/article-comments.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/ongoing/article-comments.phtml', 137, false),array('modifier', 'stripslashes', 'gebo/ongoing/article-comments.phtml', 139, false),)), $this); ?>
<?php echo '
<style type="text/css">
.media {
    background: none repeat scroll 0 0 #FFFFFF;
    border-color: #E4E4E4 #E4E4E4 #BBBBBB;
    border-image: none;
    border-radius: 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.086);
    margin-bottom: 15px;
    overflow: hidden;
    padding: 12px;
}
.close
{
   padding: 3px;
}
</style>
<script type="text/javascript">
//Comments submission
$(document).ready(function() {
		$("#comment_submit").click(function(){
				
			$.post("/ongoing/save-comments", $("#comment_form").serialize(),
				function(data) {
					//alert(data);
					var obj = $.parseJSON(data);
					$("#comments_list").html(obj.comments);
					$("#comment_count").text(obj.count);
					$("#comment_count_1").html(\'<i class="icon-comment"></i> \'+obj.count);
					$("#article_comments").val(\'\');
				}
			);	
		});
		
		//refreshing comments
		
		var comment_type=$("#comment_type").val();
		var identifier=$("#identifier").val();
		 /* setInterval(function() {
			//$(\'#comments_list\').load(\'/ongoing/save-comments?comment_type=\'+comment_type+\'&identifier=\'+identifier);
			$.getJSON(\'/ongoing/save-comments?comment_type=\'+comment_type+\'&identifier=\'+identifier,
				{
					format: "json"
				},
				function(data) {
					$("#comments_list").html(data.comments);
					$("#comment_count").text(data.count);
					$("#comment_count_1").html(\'<i class="icon-comment"></i> \'+data.count);
					$("#article_comments").val(\'\');
				});
		}, 60000); */ 
		
		//changing active status of a comment
		$("[id^=delete_comment_]").live(\'click\', function() {
			
			var parentLi=$(this).parents("li:first").attr(\'id\');
			var deleteButton=$(this).attr(\'id\').split("_");
			var comment_id=deleteButton[2];
			var msg = "Etes-vous s&ucirc;r(e) de vouloir cacher ce  commentaire sur la plateforme ?";
			smoke.confirm(msg,function(e){
				if (e){
					deleteComments(comment_id,comment_type,identifier);
				}
				else{
					return false;
				}
			}); 			
				
		});
		
		//edit textarea toggle
		$("[id^=edit_comment_]").live(\'click\', function() {
			
			var editButton=$(this).attr(\'id\').split("_");
			var comment_id=editButton[2];		
			var comment_box=$(\'#user_comment_\'+comment_id).toggle();
			var comment_new=$(\'#edit_user_comment_\'+comment_id).toggle();
				
		});
		
		//update comments
		$("[id^=update_submit_]").live(\'click\', function() {
			
			var updateButton=$(this).attr(\'id\').split("_");
			var comment_id=updateButton[2];		
			var comments=$("#article_comments_"+comment_id).val();				
			
			var target_page = \'/ongoing/save-comments?comment_action=update&article_comments=\'+comments+\'&comment_id=\'+comment_id+\'&comment_type=article&identifier=\'+identifier;			
			$.post(target_page, function(data){					
					//alert(data);
					var obj = $.parseJSON(data);
					$("#comments_list").html(obj.comments);
					$("#comment_count").text(obj.count);
					$("#comment_count_1").html(\'<i class="icon-comment"></i> \'+obj.count);
					$("#article_comments").val(\'\');
				}
			);
		});
		
	});	
/** ajax function to delete/inactive comment data**/
function deleteComments(comment_id,comment_type,identifier)
{
        var target_page = \'/ongoing/save-comments?comment_action=delete&comment_id=\'+comment_id+\'&comment_type=\'+comment_type+\'&identifier=\'+identifier;
		
		$.post(target_page, function(data){									
				
				var obj = $.parseJSON(data);
				$("#comments_list").html(obj.comments);
				$("#comment_count").text(obj.count);
				$("#comment_count_1").html(\'<i class="icon-comment"></i> \'+obj.count);
				$("#article_comments").val(\'\');							
			});
}
	
</script>
'; ?>

<div class="mod">	 
	 <ul class="media-list" id="comments_list">
	 <?php if ($this->_tpl_vars['commentDetails'] | @ count > 0): ?>
		 	<?php $_from = $this->_tpl_vars['commentDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comment']):
?>
				<li class="media" id="comment_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
">					
					<?php if ($this->_tpl_vars['comment']['edit'] == 'yes'): ?>
						<a  class="close hint--left" type="button" id="edit_comment_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
" data-hint="Edit Comment"><i class="icon-pencil"></i></a>
					<?php endif; ?>
					
					<a  class="close hint--left" data-hint="Hide Comment" type="button" id="delete_comment_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
">&times;</a>
					
					<a class="pull-left imgframe" href="#" role="button" data-toggle="modal" data-target="#viewProfile-ajax">
						<img alt="Topito" class="media-object" width="60px" src="<?php echo $this->_tpl_vars['comment']['profile_pic']; ?>
">
					</a>
					<div class="media-body">
						<h4 class="media-heading">
							
							<a  role="button" data-toggle="modal" data-target="#viewProfile-ajax"><?php echo ((is_array($_tmp=$this->_tpl_vars['comment']['profile_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</a></h4>
							
							<span id="user_comment_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['comment']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</span>
							
							<span id="edit_user_comment_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
" style="display:none">
								<textarea class="span10" name="article_comments_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
" id="article_comments_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['comment']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea>
								<button type="button" id="update_submit_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
" name="update_submit_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
" class="btn">Update</button>
							</span>								
							<p class="muted"><?php echo $this->_tpl_vars['comment']['time']; ?>
</p>
					</div>
				</li>		
			<?php endforeach; endif; unset($_from); ?>	
		
	<?php endif; ?>	
	</ul>
	<div class="row-fluid">
		<div class=" well">
			<form action="" method="POST" id="comment_form">
				<h4>Comment/Ask a Question</h4>
				<fieldset>
					<textarea class="span12" placeholder="Enter comment" name="article_comments" id="article_comments"></textarea>
					<button type="button" id="comment_submit" name="comment_submit" class="btn">Send</button>
					<input type="hidden" name="comment_type" value="<?php echo $this->_tpl_vars['comment_type']; ?>
" id="comment_type">
					<input type="hidden" name="identifier" value="<?php echo $this->_tpl_vars['identifier']; ?>
" id="identifier">
				</fieldset>
			</form>
		</div>
	</div>
</div>