<?php /* Smarty version 2.6.19, created on 2015-02-03 10:33:50
         compiled from gebo/ongoing/extendtime_writer.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/ongoing/extendtime_writer.phtml', 122, false),)), $this); ?>
<?php echo '
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/jquery.validate.min.js"></script>

<style type="text/css">
.form-horizontal .control-label {
    float: left;
    padding-top: 5px;
    text-align: right;
    width: 42%;
	font-weight:bold;
	cursor:default;
}
.form-horizontal .controls {
    margin-left: 47%;
}
</style>
 <script type="text/javascript" >
$(document).ready(function() {			
	$(".uni_style").uniform();
	
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
                font_size_style_values 				: "8pt,10px,12pt,14pt,18pt,24pt,36pt",
                init_instance_callback				: function(){
                    function resizeWidth() {
                        document.getElementById(tinyMCE.activeEditor.id+\'_tbl\').style.width=\'100%\';
                    }
                    resizeWidth();
                    $(window).resize(function() {
                        resizeWidth();
                    })
                },
                // file browser
                file_browser_callback: function openKCFinder(field_name, url, type, win) {
                    tinyMCE.activeEditor.windowManager.open({
                        file: \'file-manager/browse.php?opener=tinymce&type=\' + type + \'&dir=image/themeforest_assets\',
                        title: \'KCFinder\',
                        width: 700,
                        height: 500,
                        resizable: "yes",
                        inline: true,
                        close_previous: "no",
                        popup_css: false
                    }, {
                        window: win,
                        input: field_name
                    });
                    return false;
                }
            });	
		
	});
function fngetmailcontent(extend_time,participateId)
        {            		
            var user_type=\''; ?>
<?php echo $this->_tpl_vars['user_type']; ?>
<?php echo '\';
			if(participateId!=\'\')
            {               
                 var target_page = "/ao/getextendmail?extend_time="+extend_time+"&participation_id="+participateId+"&utype="+user_type;
				 //alert(target_page);
                 $.post(target_page, function(data){   
					
                     $(\'#extend_comment_\'+participateId).html(data);
                 });
                
            }
	}


 </script>
'; ?>

<?php if ($this->_tpl_vars['nores'] != 'true'): ?>
<div class="row-fluid">
	<div class="span12">		
		<form class="form-horizontal form_validation_ttip" enctype="multipart/form-data" method="POST" name="extend_time" id="extend_form" action="/ongoing/extend-article-submit">
<?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MainMenu_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MainMenu_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['MainMenu_key'] => $this->_tpl_vars['Article_item']):
        $this->_foreach['MainMenu_loop']['iteration']++;
?>
			<fieldset>
				<div class="control-group formSep">
					<label class="control-label">Article Title</label>
					<div class="controls">
						<span><?php echo $this->_tpl_vars['Article_item']['title']; ?>
</span>
					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">Mission Title</label>
					<div class="controls">
						<?php echo $this->_tpl_vars['Article_item']['deliveryTitle']; ?>

					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">Author</label>
					<div class="controls">
						 <?php echo ((is_array($_tmp=$this->_tpl_vars['Article_item']['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo $this->_tpl_vars['Article_item']['last_name']; ?>

					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">Expired Date</label>
					<div class="controls">
						<?php echo $this->_tpl_vars['Article_item']['submit_expires']; ?>

					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">Give More time</label>
					<div class="controls">
					<span><input type="text" name="extend_date" style="text-transform: none;" id="extend_date" class="input-small"  onkeyup="fngetmailcontent(this.value,'<?php echo $this->_tpl_vars['Article_item']['id']; ?>
');" />  hours more</span>
					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">Comments</label>
					<div class="controls">
						<span><textarea rows="4" cols="35" name="extend_comment" id="extend_comment_<?php echo $this->_tpl_vars['Article_item']['id']; ?>
"><?php echo $this->_tpl_vars['mail_content']; ?>
</textarea></span>
					</div>
				</div>
				<input type="hidden" name="participation_id" value="<?php echo $this->_tpl_vars['Article_item']['id']; ?>
">
				<input type="hidden" name="user_type" value="<?php echo $this->_tpl_vars['user_type']; ?>
">
				<input type="hidden" name="pagefrom" id="pagefrom" value="<?php echo $this->_tpl_vars['pagefrom']; ?>
">
				<div class="control-group">
						<div class="controls">
							<button class="btn btn-gebo" type="submit" >Update</button>
							<button class="btn" data-dismiss="modal">Cancle</button>
						</div>
					</div>
			</fieldset>	
<?php endforeach; endif; unset($_from); ?>
		</form>
	</div>
</div>
<?php else: ?>
<?php endif; ?>