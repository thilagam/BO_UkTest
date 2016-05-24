<?php /* Smarty version 2.6.19, created on 2015-11-13 08:38:22
         compiled from gebo/correction/moderation-correction.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/correction/moderation-correction.phtml', 183, false),array('modifier', 'date_format', 'gebo/correction/moderation-correction.phtml', 221, false),array('modifier', 'stripslashes', 'gebo/correction/moderation-correction.phtml', 223, false),)), $this); ?>
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<?php echo '
<script language="javascript">
    $(document).ready(function() {

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
            height                              : 800,
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
/////// when a Ep go with corrector\'s choice////////
function getAcceptCrtChoice(artId, mode)
{
    if (tinymce.getInstanceById(\'Moderator_crtwindow\'))
    {
        //tinymce.execCommand(\'mceFocus\', true, \'acceptmailcontent\');
        tinymce.execCommand(\'mceRemoveControl\', true, \'Moderator_crtwindow\');
        //tinymce.triggerSave();
        loadEditors(\'Moderator_crtwindow\');
    }
    else if (!tinymce.getInstanceById(\'Moderator_crtwindow\'))
    {
        loadEditors(\'Moderator_crtwindow\');
    }
    var buttonmode = mode;
    if(buttonmode == \'disapproved_temp\')
    {
        var contribmailid = 57;
        var crtmailid = 58;
    }
    else
    {
        var contribmailid = 60;
        var crtmailid = 61;
    }
    var target_page = "/correction/getmoderatemailcontent?articleid="+artId+"&contribmailId="+contribmailid+"&crtmailId="+crtmailid+"&actionmode=accept&status="+buttonmode; //
        $.post(target_page, function(data){   //alert(data);
        $("#Moderator_crtwindow").html(data);
        $("#moderatemails").show();
        $("#refusearea").hide();
        $("#Moderator_comment").hide();
        $("#acceptarea").show();
        $("#acceptmailid").val(crtmailid);
    });
}
/////// when a Ep refused to go with corrector\'s choice////////
function getRefuseCrtChoice(artId, mode)
{
    if (tinymce.getInstanceById(\'Moderator_comment\'))
    {
        //tinymce.execCommand(\'mceFocus\', true, \'acceptmailcontent\');
        tinymce.execCommand(\'mceRemoveControl\', true, \'Moderator_comment\');
        //tinymce.triggerSave();
        loadEditors(\'Moderator_comment\');
    }
    else if (!tinymce.getInstanceById(\'Moderator_comment\'))
    {
        loadEditors(\'Moderator_comment\');
    }
    var buttonmode = mode;
    if(buttonmode == \'disapproved_temp\')
        var crtmailid = 54;
    else
        var crtmailid = 55;
    var target_page = "/correction/getmoderatemailcontent?articleid="+artId+"&crtmailId="+crtmailid+"&actionmode=refuse&status="+buttonmode; //
    $.post(target_page, function(data){   //alert(data);
        $("#Moderator_comment").html(data);
        $("#moderatemails").css("display","block");
        $("#refusearea").show();
        $("#acceptarea").hide();
        $("#refusemailid").val(crtmailid);
    });
}
/*function confirmAction()
{
    smoke.confirm("Confirm your choice!",function(e){
        if (e)
        {
            return true;
        }
        else
        {
            return false;
        }

    });
}
function sendToFo()
{
    smoke.confirm("Item will be back online",function(e){
        if (e)
        {
            smoke.confirm("Announcement by email",function(f){
                if (f)
                {
                $("#sendtofo").val(\'yes\');
                $("#anouncebyemail").val(\'yes\');
                return true;
                }
                $("#sendtofo").val(\'yes\');
                return true;
            });
        }
        else
        {
            $("#sendtofo").val(\'no\');
            return true;
        }
    });
}*/
function confirmAction()
{
    var r=confirm("Confirm your choice!");
    if (r==true)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function sendToFo()
{
    var r=confirm("Item will be back online");
    if (r==true)
    {
        var r1=confirm("Announcement by email");
        if (r1==true)
        {
            $("#sendtofo").val(\'yes\');
            $("#anouncebyemail").val(\'yes\');
            return true;
        }

        $("#sendtofo").val(\'yes\');
        return true;
    }
    else
    {
        $("#sendtofo").val(\'no\');
        return true;
    }
}
</script>
<style type="text/css">
.popover {
max-width:70%;
}
</style>
'; ?>

<div class="row-fluid">
    <div class="span12" >
        <h3 class="heading">Correction Moderation<a class="label label-inverse pull-right" href="/correction//correction/moderation?submenuId=ML3-SL10" id="returnback">retour</a></h3>
        <table id="grptabledetails" class="table btn-gebo tdleftalign" >
            <tr>
                <td><b>Article title : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
                <td><b>AO title: </b><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['deliveryTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
            </tr>
            <tr>
                <td><b>Person in charge of the mission : </b><?php echo $this->_tpl_vars['loginusername']; ?>
</td>
                <td><b>Brief of Delivery : </b><?php if ($this->_tpl_vars['articledetails'][0]['filepath'] != NULL): ?>
                    <a href="/proofread/downloadfile?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&spec=<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
" class="label label-important">Download</a> <?php else: ?> no spec <?php endif; ?></td>
            </tr>
        </table>
        <table id="s1crtgrid" class="table table-bordered table-striped table_vam">
            <thead>
            <tr>
                <th>Version</th>
                <th>File name</th>
                <th>writer</th>
                <th>Action</th>
                <th>Date</th>
                <th>Comments</th>
                <th>Decision EP</th>
            </tr>
            </thead>
            <tbody>
            <?php $_from = $this->_tpl_vars['versions_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['versions_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['versions_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['versions_key'] => $this->_tpl_vars['versions_item']):
        $this->_foreach['versions_loop']['iteration']++;
?>
            <tr>
                <td><?php if ($this->_tpl_vars['versions_item']['version'] != 0): ?> <?php $this->assign('i', $this->_tpl_vars['versions_item']['version']); ?> <?php echo $this->_tpl_vars['i']; ?>
 <?php endif; ?>
                    <?php if ($this->_tpl_vars['versions_item']['version'] == 0): ?> <?php echo $this->_tpl_vars['i']; ?>
   <?php endif; ?></td>
                <td><a href="/proofread/downloadfile?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&path=<?php echo $this->_tpl_vars['versions_item']['id']; ?>
"><?php echo $this->_tpl_vars['versions_item']['article_name']; ?>
</a></td>
                <td <?php if ($this->_tpl_vars['versions_item']['stage'] == 'corrector'): ?> style="background-color: #993365;color:#ffffff;" <?php else: ?> style="background-color: #FFCC00;color:#ffffff;" <?php endif; ?> >
                    <?php if ($this->_tpl_vars['versions_item']['first_name'] == ''): ?><?php echo $this->_tpl_vars['versions_item']['email']; ?>
<?php else: ?><?php echo $this->_tpl_vars['versions_item']['first_name']; ?>
<?php endif; ?></td>
                <td><?php if ($this->_tpl_vars['versions_item']['stage'] == 's1'): ?> Soumission pour correction
                    <?php elseif (( $this->_tpl_vars['versions_item']['status'] == NULL && $this->_tpl_vars['versions_item']['stage'] == 'corrector' ) || $this->_tpl_vars['versions_item']['status'] == 'approved'): ?>
						Validated
					<?php elseif ($this->_tpl_vars['versions_item']['status'] == 'disapproved' || $this->_tpl_vars['versions_item']['participationstatus'] == 'disapproved'): ?>	
						Demande de reprise
					<?php elseif ($this->_tpl_vars['versions_item']['status'] == 'closed' || $this->_tpl_vars['versions_item']['participationstatus'] == 'closed'): ?>		
						Refus Definitif
					<?php endif; ?>
                    </td>
                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['versions_item']['article_sent_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
</td>
                <td><?php if ($this->_tpl_vars['versions_item']['comments'] != ''): ?><a class="pop_over" data-placement="left" data-original-title="Commentaire" data-html="true"
                       data-content="<div><?php echo ((is_array($_tmp=$this->_tpl_vars['versions_item']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</div>" >  <i class="splashy-comments_reply"></i></a><?php endif; ?>

                </td>
                <td>
                    <?php if ($this->_tpl_vars['versions_item']['moderate_epdecision'] == 'refused'): ?>
                    <i class="splashy-error_x"></i>
                    <?php elseif ($this->_tpl_vars['versions_item']['moderate_epdecision'] == 'accepted'): ?>
                    <i class="splashy-okay"></i>
                    <?php endif; ?>
                </td>
            </tr>
            <?php if ($this->_tpl_vars['versions_item']['stage'] == 'corrector'): ?> <?php $this->assign('correctorId', $this->_tpl_vars['versions_item']['user_id']); ?>
            <?php else: ?><?php $this->assign('contributorId', $this->_tpl_vars['versions_item']['user_id']); ?>  <?php endif; ?>


            <?php endforeach; endif; unset($_from); ?>
            </tbody>
        </table>
       <div class="pull-right span7" >
           <button type="button" class="btn btn-success"  onclick="return getAcceptCrtChoice('<?php echo $_GET['articleid']; ?>
','<?php echo $_GET['status']; ?>
');" value="Valider" >Validate</button>
           <button type="button" class="btn btn-warning" onclick="return getRefuseCrtChoice('<?php echo $_GET['articleid']; ?>
','<?php echo $_GET['status']; ?>
');" value="Refuser" >Refuse</button>
       </div>
   </div>
</div>
<div id="moderatemails" style="display: none;width: 95%;float:left;">
    <form action="/correction/moderation?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleid=<?php echo $_GET['articleid']; ?>
" method="post" id="valstage2arts" name="valstage2arts" >
        <div>
            <div id="acceptarea">
                <table width="100%">
                    <tr><td></td></tr>
                    <tr><td><b>  Validation du choix du correcteur - <?php if ($_GET['status'] == 'disapproved_temp'): ?>Refuser<?php else: ?>Refuser Definite<?php endif; ?> :</b></td></tr>
                    <tr><td></td></tr>
                   <!-- <tr >
                        <td width="100%"><textarea id="Moderator_contribwindow" name="Moderator_contribwindow" cols="100" rows="5"></textarea>
                            <input type="hidden" id="Contribmailobject" name="Contribmailobject" value="<?php echo $this->_tpl_vars['Contribmailobject']; ?>
"></td>
                    </tr>-->
                    <tr><td></td></tr>
                    <tr >
                        <td width="100%"><textarea id="Moderator_crtwindow" name="Moderator_crtwindow" cols="100" rows="5"><?php echo $this->_tpl_vars['Correctormailcontent']; ?>
</textarea>
                            <input type="hidden" id="Correctormailobject" name="Correctormailobject" value="<?php echo $this->_tpl_vars['Correctormailobject']; ?>
">
                            <input type="hidden" id="acceptmailid" name="acceptmailid" value="">
                        </td>
                    </tr>
                </table>
                <?php if ($_GET['status'] == 'disapproved_temp'): ?>
                <button type="submit" class="btn btn-success"  name="moderate_approve" onclick="return confirmAction();">Validate</button>
                <?php else: ?>
                <button type="submit" class="btn btn-success" name="moderate_approve" onclick="return sendToFo();">Validate</button>
                <?php endif; ?>
                <input type="hidden" id="sendtofo" name="sendtofo" value="">
                <input type="hidden" id="anouncebyemail" name="anouncebyemail" value="">
            </div>
            <div id="refusearea">
                <table width="100%" id="magic">
                    <tr><td></td></tr>
                    <tr><td><b> Refusal choice of correction - <?php if ($_GET['status'] == 'disapproved_temp'): ?>Refuser<?php else: ?>Refuse Definite<?php endif; ?> :</b></td></tr>
                    <tr><td></td></tr>
                    <tr >
                        <td width="100%"><textarea id="Moderator_comment" name="Moderator_comment" cols="100" rows="5"></textarea>
                            <input type="hidden" id="onlycorrectorobject" name="onlycorrectorobject" value="<?php echo $this->_tpl_vars['onlycorrectorobject']; ?>
">
                            <input type="hidden" id="refusemailid" name="refusemailid" value="">
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-warning" id="moderate_disapprove" name="moderate_disapprove" onclick="return confirmAction();">Refuse</button>
            </div>
        </div>
        <div align="right" class="">
            <div class="buttontwo" >
                <input type="hidden" id="latestmarks" name="latestmarks" value="<?php  echo $latestmarks;  ?>">
                <input type="hidden" id="correctorId" name="correctorId" value="<?php echo $this->_tpl_vars['correctorId']; ?>
">
                <input type="hidden" id="contributorId" name="contributorId" value="<?php echo $this->_tpl_vars['contributorId']; ?>
">
                <input type="hidden" id="artsentdate" name="artsentdate" value="<?php  echo $artsentdate;  ?>">
                <input type="hidden" id="actionmode" name="actionmode" value="<?php  echo $_GET['actionmode'];  ?>" />
                <input type="hidden" id="status" name="status" value="<?php  echo $_GET['status'];  ?>" />
            </div>
        </div>
    </form>
</div>