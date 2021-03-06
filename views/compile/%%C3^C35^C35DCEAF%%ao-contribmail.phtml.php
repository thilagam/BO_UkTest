<?php /* Smarty version 2.6.19, created on 2015-02-16 09:38:54
         compiled from gebo/ongoing/ao-contribmail.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/ongoing/ao-contribmail.phtml', 90, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".uni_style").uniform();
		$("#contributor_list").chosen();
		
		 $("#contribmail_form").validationEngine(); 
	});
	
		$(\'textarea\').tinymce({
			// Location of TinyMCE script
			script_url : \'/BO/theme/gebo/lib/tiny_mce/tiny_mce.js\',
			// General options
			theme : "advanced",
			plugins : "autoresize,style,table,advhr,advimage,advlink,emotions,inlinepopups,preview,media,contextmenu,paste,fullscreen,noneditable,xhtmlxtras,template,advlist",
			// Theme options
			theme_advanced_buttons1 : "undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "forecolor,backcolor,|,cut,copy,paste,pastetext,|,bullist,numlist,link,image,media,|,code,preview,fullscreen",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : false,
			font_size_style_values : "8pt,10pt,12pt,14pt,18pt,24pt,36pt",
			init_instance_callback : function() {
				function resizeWidth() {
					document.getElementById(tinyMCE.activeEditor.id + \'_tbl\').style.width = \'100%\';
				}

				resizeWidth();
				$(window).resize(function() {
					resizeWidth();
				})
			}
		});
	
	function loadcontribs()
	{
		var ctype=$("input[name=\'contrib_type[]\']:checked").map(function () {return this.value;}).get().join("|");
		var aoid=$("#deliveryid").val();
		
			var target_page="/ongoing/get-aowriters?delivery="+aoid+"&ctype="+ctype;
			
			$.get(target_page,function(data){
				data=$.trim(data);
				$("#contributor_names").html(data);
				$("#contributor_list").chosen();
			});
		
	}
</script>

<style type="text/css">
	.form-horizontal .control-label { float: left; padding-top: 5px; text-align: right; width: 42%; font-weight:bold; cursor:default; }
	.form-horizontal .controls { margin-left: 47%; }
	.popover-title { padding: 8px 14px; }
	.popover-content { padding: 9px 14px; }
	.add-on{ background-color: #EEEEEE; border: 1px solid #CCCCCC; display: inline-block; font-size: 14px; font-weight: normal; height: 20px; line-height: 20px; min-width: 16px; padding: 4px 5px; text-align: center; text-shadow: 0 1px 0 #FFFFFF; width: auto;	border-radius: 4px 0 0 4px; }
	.append-input { border-radius: 0 4px 4px 0; margin-bottom: 0; margin-left: -5px !important margin-top: -4px !important; position: relative; vertical-align: top; z-index: -8; }
	.error {  display: none !important;}
</style>
'; ?>

 
<div class="row-fluid">
	<div class="span11">
		<form class="form-horizontal form_validation_ttip form_validation_reg"  action="" method="POST" id="contribmail_form">
			<fieldset>
				<div class="control-group formSep" style="margin-top:10px;">
				</div>
				<div class="control-group formSep">
					<label class="control-label">Contributor Type</label>
					<div class="controls form-inline">
						<label class="uni-radio">
							<input type="checkbox" value="writer"  name="contrib_type[]" class="uni_style validate[minCheckbox[1]]" checked onClick="loadcontribs()" />Writer
						</label>
						<label class="uni-radio">
							<input type="checkbox" value="corrector" name="contrib_type[]" class="uni_style validate[minCheckbox[1]]" checked onClick="loadcontribs()" />Corrector
						</label>						
					</div>
				</div>
				<div class="control-group formSep">
					<label for="fileinput" class="control-label">Contributors</label>
					<div class="controls" id="contributor_names">
						<select name="contributor_list[]" id="contributor_list" multiple="multiple" data-placeholder="Select contributor..." style="width:400px" class="validate[required]">
							<?php $_from = $this->_tpl_vars['allconributors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contrib']):
?>
								<option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
" selected><?php echo $this->_tpl_vars['contrib']['email']; ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['contrib']['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 , <?php echo ((is_array($_tmp=$this->_tpl_vars['contrib']['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
)</option>
							<?php endforeach; endif; unset($_from); ?>
						</select>						
					</div>
				</div>
				<div class="control-group formSep">
					<label for="fileinput" class="control-label">Object of email</label>
					<div class="controls">
						<input type="text" name="email_subject" id="email_subject" placeholder="Subject..." class="span10 validate[required]"/>					
					</div>
				</div>
				<div class="control-group formSep">
					<label for="fileinput" class="control-label">Content of email</label>
					<div class="controls">
						<textarea type="text" name="email_content" id="email_content" placeholder="Content..." class="span10 validate[required]"></textarea>					
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<input type="hidden" name="deliveryid" id="deliveryid" value="<?php echo $this->_tpl_vars['deliveryid']; ?>
"/>
						<button class="btn btn-gebo" type="submit" name="sendcontrib_mail" id="sendcontrib_mail" value="send">Send</button>
						<button class="btn" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>		
</div>