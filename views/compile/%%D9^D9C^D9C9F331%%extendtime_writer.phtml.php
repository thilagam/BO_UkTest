<?php /* Smarty version 2.6.19, created on 2015-08-25 11:37:29
         compiled from gebo/deliveryongoing/extendtime_writer.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/deliveryongoing/extendtime_writer.phtml', 160, false),)), $this); ?>
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
			  digits: true,
			  min:1
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
function fngetmailcontent(extend_time,participateId,usertype)
        {            		
            if(participateId!=\'\')
            {               
                 var target_page = "/ao/getextendmail?extend_time="+extend_time+"&usertype="+usertype;
				// alert(target_page);
                 $.post(target_page, function(data){   
					
                     $(\'#extend_comment_\'+participateId).html(data);
                 });
                
            }
	}
function allToSeconds(days, hours, minutes, seconds)
    {
       // alert(days); alert(hours);alert(minutes);alert(seconds);
        var tatalseconds = 0;
        if(days != 0 && days != \'\')
             tatalseconds += parseInt(days*24*60*60) ;
        if(hours != 0 && hours != \'\')
             tatalseconds  += parseInt(hours*60*60);
        if(minutes != 0 && minutes != \'\')
             tatalseconds += parseInt(minutes*60) ;
        if(seconds != 0 && seconds != \'\')
             tatalseconds += parseInt(seconds) ;

        return tatalseconds;
    }
    function validateEditAssignTime(type, prevdays, prevhrs, prevmins, prevsecs)
    {
        var ndays = $("#editftvspentdays").val();
        var nhours = $("#editftvspenthours").val();
        var nminutes = $("#editftvspentminutes").val();
        var nseconds = $("#editftvspentseconds").val();
        if(ndays == \'\' &&  nhours == \'\' && nminutes == \'\' && nseconds == \'\'){
            smoke.alert("please enter the values");
            return false;
        }
        else if(type == \'sub\'){
            var new_seconds = allToSeconds(ndays, nhours, nminutes, nseconds);
            var prev_seconds = allToSeconds(prevdays, prevhrs, prevmins, prevsecs);
           // alert(new_seconds); alert(prev_seconds);
            if(new_seconds > prev_seconds){
                smoke.alert("your exceeding the time range");
                return false;
            }else
                return true; //$("#edit_assign_time").submit();
        }else{
            return true; //$("#edit_assign_time").submit();
        }

    }

 </script>
'; ?>

<?php if ($this->_tpl_vars['nores'] != 'true'): ?>
<div class="row-fluid">
	<div class="span12">		
		<form class="form-horizontal form_validation_ttip" enctype="multipart/form-data" method="POST" name="extend_time" id="extend_form" action="/deliveryongoing/extend-article-submit">
<?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MainMenu_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MainMenu_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['MainMenu_key'] => $this->_tpl_vars['Article_item']):
        $this->_foreach['MainMenu_loop']['iteration']++;
?>
			<fieldset>
				<div class="control-group formSep">
					<label class="control-label">Titre de l'article</label>
					<div class="controls">
						<span><?php echo $this->_tpl_vars['Article_item']['title']; ?>
</span>
					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">Titre de la mission</label>
					<div class="controls">
						<?php echo $this->_tpl_vars['Article_item']['deliveryTitle']; ?>

					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">R&eacute;dacteur</label>
					<div class="controls">
						 <?php echo ((is_array($_tmp=$this->_tpl_vars['Article_item']['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo $this->_tpl_vars['Article_item']['last_name']; ?>

					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">Date et heure d'expiration actuelle</label>
					<div class="controls">
						<?php echo $this->_tpl_vars['Article_item']['submit_expires']; ?>

					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">Donner</label>
					<div class="controls">
					<span><input type="text" name="extend_date" style="text-transform: none;" id="extend_date" class="input-small"  onkeyup="fngetmailcontent(this.value,'<?php echo $this->_tpl_vars['Article_item']['id']; ?>
','<?php echo $this->_tpl_vars['user_type']; ?>
');" />  heure(s) de plus</span>
					</div>
				</div>
				<div class="control-group formSep">
					<label class="control-label">commentaire</label>
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
							<button class="btn btn-gebo" type="submit" >Mettre &agrave; jour</button>
							<button class="btn" data-dismiss="modal">Annuler</button>
						</div>
					</div>
			</fieldset>	
<?php endforeach; endif; unset($_from); ?>
		</form>
	</div>
</div>
<?php elseif ($this->_tpl_vars['editftvassigntime'] == 'yes'): ?>
<div class="row-fluid">
    <div class="span12">
        <form class="form-horizontal form_validation_ttip" enctype="multipart/form-data" method="POST" name="edit_assign_time" id="edit_assign_time" action="/ftvchaine/editassigntime">
            <fieldset>
                <!--<div class="control-group formSep">
                    <label class="control-label">Date (france server date)</label>
                    <div class="controls">
                        <input type="text" placeholder="Edit date" id="editftvassigndate" name="editftvassigndate" data-date-format="dd-mm-yyyy" value="<?php echo $this->_tpl_vars['reqasgndate']; ?>
" />
                    </div>
                </div>
                <div class="control-group formSep">
                    <label class="control-label">Time (france server time)</label>
                    <div class="controls">
                        <td><input id="editftvassigntime" name="editftvassigntime" type="text" placeholder="From time" value="<?php echo $this->_tpl_vars['reqasgntime']; ?>
"/>
                    </div>
                </div>-->
                <div class="control-group formSep form-inline">
                    <div class="alert alert-info">
                        <label ><b>Request object : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['requestobject'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</label><br>
                        <label ><b>Time spent : </b><?php echo $this->_tpl_vars['current_duration']; ?>
</label>
                    </div>
                    <label class="control-label">Days</label>
                    <div class="controls">
                        <input type="text" placeholder="days" id="editftvspentdays" name="editftvspentdays" value="<?php echo $this->_tpl_vars['days']; ?>
" />
                    </div>
                    <label class="control-label">Hours</label>
                    <div class="controls">
                        <input type="text" placeholder="hours" id="editftvspenthours" name="editftvspenthours" value="<?php echo $this->_tpl_vars['hours']; ?>
" />
                    </div>
                    <label class="control-label">Minutes</label>
                    <div class="controls">
                        <input type="text" placeholder="minutes" id="editftvspentminutes" name="editftvspentminutes" value="<?php echo $this->_tpl_vars['minutes']; ?>
" />
                    </div>
                    <label class="control-label">Seconds</label>
                    <div class="controls">
                        <input type="text" placeholder="seconds" id="editftvspentseconds" name="editftvspentseconds" value="<?php echo $this->_tpl_vars['seconds']; ?>
" />
                    </div>
                </div>
                <input type="hidden" name="requestId" value="<?php echo $this->_tpl_vars['requestId']; ?>
">

                <div class="control-group">
                    <div class="controls span9 pull-right">
                        <button class="btn btn-gebo" name="editftvassignsubmit" value="editftvassignsubmit" type="submit" >Edit Time</button>
                        <!--<button class="btn btn-gebo" name="addasigntime" value="addasigntime" type="submit" onClick="return validateEditAssignTime('add', '<?php echo $this->_tpl_vars['days']; ?>
', '<?php echo $this->_tpl_vars['hours']; ?>
', '<?php echo $this->_tpl_vars['minutes']; ?>
', '<?php echo $this->_tpl_vars['seconds']; ?>
');">Add Time</button>
                        <button class="btn btn-info" name="subasigntime" value="subasigntime" type="submit" onClick="return validateEditAssignTime('sub', '<?php echo $this->_tpl_vars['days']; ?>
', '<?php echo $this->_tpl_vars['hours']; ?>
', '<?php echo $this->_tpl_vars['minutes']; ?>
', '<?php echo $this->_tpl_vars['seconds']; ?>
');" >Substract Time</button>-->
                        <button class="btn" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<?php endif; ?>