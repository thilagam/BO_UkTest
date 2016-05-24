<?php /* Smarty version 2.6.19, created on 2015-07-14 15:48:46
         compiled from gebo/mails/newsletter.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/mails/newsletter.phtml', 119, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/datempicker.js"></script>
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/jquery.MultiFile.js"></script>
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#selectgroup").chosen({ allow_single_deselect: false });	
		  
		$(\'#mail_time\').datetimepicker({
            showSecond: true,
            timeFormat: \'hh:mm:ss\',
            minDate: new Date(),
            stepHour: 1,
            stepMinute: 1,
            stepSecond: 10,
            timeOnlyTitle: \'Choisir une heure\',
            timeText: \'Heure\',
            hourText: \'Heures\',
            minuteText: \'Minutes\',
            secondText: \'Secondes\',
            currentText: \'Maintenant\',
            closeText: \'Termin&eacute;\',
        });
    $("#usercontacts").multiselect();
	$("#usercontacts").multiselectfilter();
	$(".uni_style").uniform(); 
	$(\'#filePJ1\').MultiFile();
        $(\'textarea\').tinymce({
            // Location of TinyMCE script
            script_url 							: \'/BO/theme/gebo/lib/tiny_mce/tiny_mce.js?\' + new Date().getTime(),
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
            height                              : 300,
            content_css                         : "/BO/theme/gebo/css/tinymce_styles.css?" + new Date().getTime(),
            theme_advanced_font_sizes           : "8px,10px,12px,13px,14px,16px,18px,20px",
            font_size_style_values              : "8px,10px,12px,13px,14px,16px,18px,20px",
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
    
	function disablemailtime()
    {
        var chk=$("input[name=\'mailnow\']:checked").val();

        if(chk=="checked")
            $("#mail_time").attr(\'disabled\',\'true\');
         // $("#mail_time_at").val($.now());
        else
		{
            $("#mail_time").removeAttr(\'disabled\');
			$("#mail_time_at").val(\'\');
		}	
    }
   function fnloaduser()
	{
		var utype=$(\'#selectgroup\').val();
		window.location="/mails/newsletter?submenuId=ML4-SL10&selectgroup="+utype;
	}

</script>

<style>
	input,textarea{text-transform:none;}
</style>
'; ?>


<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Envoi d'une newsletter</h3>
		<form action="/mails/sendnewsletter" method="post" id="user" name="user" enctype="multipart/form-data" >
			<table cellpadding="4" cellspacing="4" align="center" width="80%">
				<tr>
					<td>De</td>
					<td><input type="text" id="newsletter_from" name="newsletter_from" value="<?php echo $this->_tpl_vars['from_contact']; ?>
" /></td>
				</tr>
				<tr>
					<td>Groupe</td>
					<td>
						<select id="selectgroup" name="selectgroup" onchange="fnloaduser();" >
							<option value="all" <?php if ($_GET['selectgroup'] == 'all'): ?> selected<?php endif; ?>>All</option>
							<option value="client" <?php if ($_GET['selectgroup'] == 'client'): ?> selected<?php endif; ?>>Clients</option>
							<option value="contributor" <?php if ($_GET['selectgroup'] == 'contributor'): ?> selected<?php endif; ?>>Writer</option>
							<option value="superadmin" <?php if ($_GET['selectgroup'] == 'superadmin'): ?> selected<?php endif; ?>>Super Admin</option>
							<option value="ceouser" <?php if ($_GET['selectgroup'] == 'ceouser'): ?> selected<?php endif; ?>>Ceo Users</option>
							<option value="salesuser" <?php if ($_GET['selectgroup'] == 'salesuser'): ?> selected<?php endif; ?>>Sales</option>
							<option value="chiefeditor" <?php if ($_GET['selectgroup'] == 'chiefeditor'): ?> selected<?php endif; ?>>Chief Editors</option>
							<option value="editor" <?php if ($_GET['selectgroup'] == 'editor'): ?> selected<?php endif; ?>>Editors</option>
							<option value="seo" <?php if ($_GET['selectgroup'] == 'seo'): ?> selected<?php endif; ?>>Seo Users</option>
							<option value="custormercare" <?php if ($_GET['selectgroup'] == 'custormercare'): ?> selected<?php endif; ?>>Customer Care</option>
							<option value="partners" <?php if ($_GET['selectgroup'] == 'partners'): ?> selected<?php endif; ?>>Partners</option>
							<option value="facturation" <?php if ($_GET['selectgroup'] == 'facturation'): ?> selected<?php endif; ?>>Facturation</option>
						</select>
					</td>
				</tr>
				<tr>
					<td valign="top">user(s)</td>
					<td>
						<select multiple="multiple" id="usercontacts" name="usercontacts[]" class="span6">    
							<?php echo smarty_function_html_options(array('id' => 'usercontacts','options' => $this->_tpl_vars['user_contacts'],'selected' => $_GET['usercontacts']), $this);?>

						</select>
					</td>
				</tr>
				<tr>
					<td valign="top">Date of dispatch</td>
					<td>
						<input type="text" id="mail_time" name="mail_time" readonly="readonly" value="<?php echo $this->_tpl_vars['mail_time']; ?>
" <?php if ($this->_tpl_vars['publishnow'] == 'checked'): ?>disabled="disabled"<?php endif; ?> style="float:left;"/>
						<label class="uni-checkbox" >
							<input type="checkbox" name="mailnow" id="mailnow" onclick="disablemailtime()" class="uni_style" value="checked" <?php if ($this->_tpl_vars['mailnow'] == 'checked'): ?>checked<?php endif; ?>/>now
						</label>	
					</td>
				</tr>
				<tr>
					<td valign="top">Subject</td>
					<td><input type="text" name="msg_object" id="msg_object" class="span10" /></td>
				</tr>
				<tr>
					<td valign="top">Message</td>
					<td><textarea rows="8" class="span5" name="mail_message" id="mail_message"></textarea></td>
				</tr>
				<tr>
					<td valign="top">attachment</td>
					<td>
						<input type="file" class="btn btn-file multi" name="attachment[]" id="attachment">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-info" value="forward" name="usersubmit"/></td>
				</tr>
			</table>	
		</form>
	</div>
</div>