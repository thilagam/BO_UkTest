<?php /* Smarty version 2.6.19, created on 2013-09-23 08:31:21
         compiled from gebo/contract/createxml-popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/contract/createxml-popup.phtml', 108, false),array('modifier', 'utf8_encode', 'gebo/contract/createxml-popup.phtml', 112, false),array('modifier', 'stripslashes', 'gebo/contract/createxml-popup.phtml', 112, false),)), $this); ?>
<?php echo '
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">	
 $(document).ready(function() {	
$(\'textarea#wysiwg_full\').tinymce({
                // Location of TinyMCE script
                script_url 							: \'http://admin-ep-test.edit-place.com/BO/theme/gebo/lib/tiny_mce/tiny_mce.js\',
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

	function GetContents()
	{
		$("#html_content").html(\'\');
		var data=tinyMCE.get(\'wysiwg_full\').getContent();				
		$("#html_content").html(data);
		convert();
		//oEditor.destroy();
		//return  data;
	}
	function convert()
	{
		var orig = document.getElementById( \'html_content\' ).value;
		var conv = document.getElementById( \'html_content\' );
		var s = orig;
		// Codes can be found here:
		// http://en.wikipedia.org/wiki/Windows-1252#Codepage_layout
		s = s.replace( /\\u2018|\\u2019|\\u201A|\\uFFFD/g, "\'" );
		s = s.replace( /\\u201c|\\u201d|\\u201e/g, \'"\' );
		s = s.replace( /\\u02C6/g, \'^\' );
		s = s.replace( /\\u2039/g, \'<\' );
		s = s.replace( /\\u203A/g, \'>\' );
		s = s.replace( /\\u2013/g, \'-\' );
		s = s.replace( /\\u2014/g, \'--\' );
		s = s.replace( /\\u2026/g, \'...\' );
		s = s.replace( /\\u00A9/g, \'(c)\' );
		s = s.replace( /\\u00AE/g, \'(r)\' );
		s = s.replace( /\\u2122/g, \'TM\' );
		s = s.replace( /\\u00BC/g, \'1/4\' );
		s = s.replace( /\\u00BD/g, \'1/2\' );
		s = s.replace( /\\u00BE/g, \'3/4\' );
		s = s.replace(/[\\u02DC|\\u00A0]/g, " ");
		conv.innerHTML = s;
		conv.focus();
		conv.select();
	} 
</script>	
<style type="text/css">
textarea
{
	text-transform: none;
}
</style>
'; ?>

<div class="row-fluid">
	<div class="span12">
		<form action="/contract/create-xml" method="post">
			<input type="hidden" name="delivery_id" value="<?php echo $this->_tpl_vars['delivery_id']; ?>
">
			<table class="table table-striped table-bordered">
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Category</th>
					<th>Summary</th>
					<th>Content</th>
					<th>Author</th>
					<th>Download</th>
				</tr>
				
				<?php if (count($this->_tpl_vars['articleDetails']) > 0): ?>
					<?php $_from = $this->_tpl_vars['articleDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['article_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['article_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['article_loop']['iteration']++;
?>
					  <tr>
						   <td><?php echo ($this->_foreach['article_loop']['iteration']-1)+1; ?>
.</td>
						   <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
						   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['category'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
							<td><textarea cols="30" rows="3" name="summary_<?php echo $this->_tpl_vars['article']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']['summary'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea></td>
							<td><textarea cols="30" rows="3" name="content_<?php echo $this->_tpl_vars['article']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']['content'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea></td>
							 <td><?php echo $this->_tpl_vars['article']['author']; ?>
</td>
							<td>
							<?php if ($this->_tpl_vars['article']['article_exist'] == 'exists'): ?>
								<a class="label label-warning" href="/contract/download-file?type=article&aid=<?php echo $this->_tpl_vars['article']['id']; ?>
">Download</a>
							<?php else: ?>	
								<span class="label">Not Exist</span> 
							<?php endif; ?>
							</td>
						   
						   
						</tr>

					<?php endforeach; endif; unset($_from); ?>
					<tr>
						
						<td colspan="7">
						   <button type="submit" class="btn btn-gebo">Create XML</button>
						</td>
					</tr>
					<tr>
						<td colspan="7">
							<textarea name="html_convert" id="wysiwg_full" cols="50" rows="10"></textarea>							
						</td> 
					</tr>
					<tr>
						<td colspan="7">
						  <button type="button" class="btn btn-info" onclick="GetContents();">Conver to HTML</button>
						</td>
					</tr>
					<tr>
						<td colspan="7">
						 <textarea class="span12" rows="7" cols="100" name="html_content" id="html_content" ></textarea>
						</td> 
					</tr>
				<?php else: ?>
					<tr>
						<td colspan="7" align="center">No Articles Exist.</td>
					</td>	
				<?php endif; ?>
						
			</table>
		</form>  
	</div>
</div>  