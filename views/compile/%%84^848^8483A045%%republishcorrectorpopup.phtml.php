<?php /* Smarty version 2.6.19, created on 2015-07-01 11:44:31
         compiled from gebo/correction/republishcorrectorpopup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/correction/republishcorrectorpopup.phtml', 239, false),)), $this); ?>
<?php echo '
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript" >
$(document).ready(function() {
   $("#parttime_option").chosen({ allow_single_deselect: false,search_contains: true  });
   $("#sub_opt_time").chosen({ allow_single_deselect: false,search_contains: true  });
   $("#sub_opt_resub").chosen({ allow_single_deselect: false,search_contains: true  });
    $(".alert").hide();

});
if (CKEDITOR.instances[\'mailbody\'])
{
    CKEDITOR.instances[\'mailbody\'].destroy();
}
var editor = CKEDITOR.replace( \'mailbody\',
        {
            language: \'de\', uiColor: \'#D9DDDC\', enterMode : CKEDITOR.ENTER_BR, removePlugins : \'resize\',
            toolbar : [ [\'Undo\',\'Redo\'], [\'Find\',\'Replace\'],[\'Link\', \'Unlink\', \'Image\'], [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
                [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\'] ]
        }
);

var closelmode = "'; ?>
<?php echo $this->_tpl_vars['close']; ?>
<?php echo '";
if(closelmode == \'yes\')
{
    //CKEDITOR.instances[\'mailbody\'].setData(mail);
    if (CKEDITOR.instances[\'refusemessage\'])
    {
        CKEDITOR.instances[\'refusemessage\'].destroy();
    }
    var editor = CKEDITOR.replace( \'refusemessage\',
            {
                language: \'de\', uiColor: \'#D9DDDC\', enterMode : CKEDITOR.ENTER_BR, removePlugins : \'resize\',
                toolbar : [ [\'Undo\',\'Redo\'], [\'Find\',\'Replace\'],[\'Link\', \'Unlink\', \'Image\'], [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
                    [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\'] ]
            }
    );
}

function fngetmailcontent(artname)
{
     var commentBox1=$("#mailbody");
     commentBox1.hide();
     if (CKEDITOR.instances[\'mailbody\'])
     {
         CKEDITOR.instances[\'mailbody\'].destroy();
     }
     var editor = CKEDITOR.replace( \'mailbody\',
         {
             language: \'de\', uiColor: \'#D9DDDC\', enterMode : CKEDITOR.ENTER_BR, removePlugins : \'resize\',
             toolbar : [ [\'Undo\',\'Redo\'], [\'Find\',\'Replace\'],[\'Link\', \'Unlink\', \'Image\'], [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
                 [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\'] ]
         }
     );
     var parttime_option = $("#parttime_option").val();
     var extend_time = $("#participation_time").val();
     var target_page = "/correction/getextendcrtparticipationtime?part_time="+extend_time+"&parttime_option="+parttime_option+"&artname="+artname;
     $.post(target_page, function(data){
         CKEDITOR.instances[\'mailbody\'].setData(data);
     });
     commentBox.show();
}
///when republish popup will come to upate values
function saveCorrectorRepublishPop() ///when directly republish
{
    var artId = $("#artId").val();
    var closerepublish = $("#closerepublish").val();
    var stage = $("#stage").val();
    var parttime_option = $("#parttime_option").val();
    var parttime = $("#participation_time").val();
    var suboptparttime = $("#sub_opt_parttime").val();
    var jc0time = $("#subjunior_time").val();
    var jctime =  $("#junior_time").val();
    var sctime = $("#senior_time").val();
    var subopttime = $("#sub_opt_time").val();
    var jcresub = $("#jc_resubmission").val();
    var scresub = $("#sc_resubmission").val();
    var suboptresub = $("#sub_opt_resub").val();
    var object = $("#object").val();
    var message =  $("#mailbody").val();
    var refusalmessage =  $("#refusemessage").val();
    var price_min = $("#price_min").val();
    var price_max = $("#price_max").val();
    var emailyes =  $("#emailyes").val();
    var target_page = "/correction/republishcorrectorpopup?artId="+artId+"&save=save&parttime_option="+parttime_option+"&price_min="+price_min+"&price_max="+price_max+"&parttime="+parttime+"&suboptparttime="+suboptparttime+
            "&jctime="+jctime+"&sctime="+sctime+"&subopttime="+subopttime+"&jcresub="+jcresub+"&scresub="+scresub+"&suboptresub="+suboptresub;
    $.post(target_page, function(data){   //alert(data);
        if($("#nopartsforrepublish").val() == \'yes\')
        {
            alert("No one can participate.");
        }
        if(stage != \'\')   /////////when republish pop up generated in any of stages
        {
            smoke.confirm("Item will be back online",function(e){
                if(e)
                {
                    //$("#commentsCrtRefuseObject").val(object);
                    $("#commentsCrtRefuse").val(refusalmessage);
                    smoke.confirm("ANNOUNCE BY EMAIL",function(e2){
                        if(e2)
                        {
                            $("#sendtofo").val(\'yes\');
                            $("#crtsendtofo").val(\'yes\');
                            $("#anouncebyemail").val(\'yes\');
                            $("#anouncebyemail2").val(\'yes\');
                            $("#s2art_approve").val(\'no\');
                            //$("#disapprove"+stage+"form").submit();
                            $("#s2art_corrector_permdisapprove").val(\'yes\');
                            $("#s2correction").submit();
                            return true;
                        }
                        else
                        {
                            $("#sendtofo").val(\'yes\');
                            $("#crtsendtofo").val(\'yes\');
                            $("#s2art_approve").val(\'no\');
                            //$("#disapprove"+stage+"form").submit();
                            $("#s2art_corrector_permdisapprove").val(\'yes\');
                            $("#s2correction").submit();
                            return true;
                        }
                    });
                }
                else
                {
                    $("#sendtofo").val(\'no\');
                    $("#crtsendtofo").val(\'no\');
                    $("#s2art_approve").val(\'no\');
                    //$("#disapprove"+stage+"form").submit();
                    $("#s2art_corrector_permdisapprove").val(\'yes\');
                    $("#s2correction").submit();
                    return true;
                }
            });
        }
        else      /////////when republish pop up generated in corrector selection profile related pages
        {
            smoke.confirm("Item will be back online",function(e){
                if (e)
                {
                    smoke.confirm("ANNOUNCE BY EMAIL",function(e){
                        if (e)
                        {
                            if(closerepublish == \'yes\')
                                window.location.href = "/correction/publishcrtarticlefo?art_id="+artId+"&sendmail=yes&sendrefusalmail=yes&refusalmailcontent="+refusalmessage;
                            else
                                window.location.href = "/correction/publishcrtarticlefo?art_id="+artId+"&sendmail=yes";
                        }
                        else
                        {
                            if(closerepublish == \'yes\')
                                window.location.href = "/correction/publishcrtarticlefo?art_id="+artId+"&sendmail=yes&sendrefusalmail=yes&refusalmailcontent="+refusalmessage;
                            else
                                window.location.href = "/correction/publishcrtarticlefo?art_id="+artId+"&sendmail=no";
                        }
                    });
                }
                else
                {
                    return false;
                }
            });

        }


    });
}
</script>
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
'; ?>


<div class="alert alert-warning" ><strong>Configuration de republication - <?php echo $this->_tpl_vars['missiontitle']; ?>
</strong></div>
<input id="nopartsforrepublish" name="nopartsforrepublish" value="<?php echo $this->_tpl_vars['nopartsforrepublish']; ?>
" type="hidden">
<!--<input id="mailcontent" name="mailcontent" value="<?php echo $this->_tpl_vars['message']; ?>
" type="hidden">
<input id="refusemailcontent" name="refusemailcontent" value="<?php echo $this->_tpl_vars['refusemessage']; ?>
" type="hidden">
--><input id="closerepublish" name="closerepublish" value="<?php echo $this->_tpl_vars['close']; ?>
" type="hidden">
<input id="stage" name="stage" value="<?php echo $this->_tpl_vars['stage']; ?>
" type="hidden">
<div class="alert alert-success"><strong>Return the item for people who have participated without being selected</strong> (<?php echo $this->_tpl_vars['refusedcontributors']; ?>
)</div>
<form class="form-horizontal form_validation_ttip" >
<fieldset>
    <div class="control-group formSep">
        <label class="control-label">Time bidding :</label>
        <div class="controls form-inline">
            <span style="vertical-align:top;"><input id="participation_time" name="participation_time" type="text" value="<?php echo $this->_tpl_vars['artdeldetails'][0]['correction_participation']; ?>
" onkeyup="fngetmailcontent('<?php echo $this->_tpl_vars['artdeldetails'][0]['artId']; ?>
');"/></span>
            <select name="parttime_option" id="parttime_option" onchange="fngetmailcontent('<?php echo $this->_tpl_vars['artdeldetails'][0]['artId']; ?>
');">
                <option value="min" selected="">Minute(s)</option>
                <option value="hour">Hour(s)</option>
                <option value="day">day(s)</option>
            </select>
        </div>
    </div>
    <div class="control-group formSep">
        <label class="control-label">  Price range :</label>
        <div class="controls form-inline">
            min : <input id="price_min" name="price_min" type="text"  value="<?php echo $this->_tpl_vars['artdeldetails'][0]['correction_pricemin']; ?>
"/>
            max : <input id="price_max" name="price_max" type="text"  value="<?php echo $this->_tpl_vars['artdeldetails'][0]['correction_pricemax']; ?>
"/>
        </div>
    </div>
    <div class="control-group formSep">
        <label class="control-label">Writing time :</label>
        <div class="controls form-inline">
            <span style="vertical-align:top;">JC <input id="junior_time" name="junior_time" type="text" value="<?php echo $this->_tpl_vars['artdeldetails'][0]['correction_jc_submission']; ?>
" class="span1"/></span>&nbsp;
            <span style="vertical-align:top;">SC <input id="senior_time" name="senior_time" type="text"  value="<?php echo $this->_tpl_vars['artdeldetails'][0]['correction_sc_submission']; ?>
" class="span1"/></span>&nbsp;
            <select name="sub_opt_time" id="sub_opt_time" class="span2">
                <option value="min" <?php if ($this->_tpl_vars['artdeldetails'][0]['correction_submit_option'] == 'mim'): ?>selected="selected"<?php endif; ?>>Minute(s)</option>
                <option value="hour" <?php if ($this->_tpl_vars['artdeldetails'][0]['correction_submit_option'] == 'hour'): ?>selected="selected"<?php endif; ?>>Hour(s)</option>
                <option value="day" <?php if ($this->_tpl_vars['artdeldetails'][0]['correction_submit_option'] == 'day'): ?>selected="selected"<?php endif; ?>>Day(s)</option>
            </select>
        </div>
    </div>
    <div class="control-group formSep">
        <label class="control-label">Writing time after rejection is :</label>
        <div class="controls form-inline">
            <span style="vertical-align:top;">JC <input id="jc_resubmission" name="jc_resubmission" type="text" class="span1" value="<?php echo $this->_tpl_vars['artdeldetails'][0]['correction_jc_resubmission']; ?>
"/></span>&nbsp;
            <span style="vertical-align:top;">SC <input id="sc_resubmission" name="sc_resubmission" type="text" class="span1" value="<?php echo $this->_tpl_vars['artdeldetails'][0]['correction_sc_resubmission']; ?>
"/></span>&nbsp;
            <select name="sub_opt_resub" id="sub_opt_resub" class="span2">
                <option value="min" <?php if ($this->_tpl_vars['artdeldetails'][0]['correction_resubmit_option'] == 'mim'): ?>selected="selected"<?php endif; ?>>Minute(s)</option>
                <option value="hour" <?php if ($this->_tpl_vars['artdeldetails'][0]['correction_resubmit_option'] == 'hour'): ?>selected="selected"<?php endif; ?>>Heure(s)</option>
                <option value="day" <?php if ($this->_tpl_vars['artdeldetails'][0]['correction_resubmit_option'] == 'day'): ?>selected="selected"<?php endif; ?>>Jour(s)</option>
            </select>
        </div>
    </div>
    <div class="control-group formSep">
        <label class="control-label">Subject :</label>
        <div class="controls form-inline">
            <input id="object" name="object" type="text" class="span5" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['object'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"/>
        </div>
    </div>
</fieldset>
</form>
<table class="table table-bordered">
     <tr>
		<td><b>From</b></td>
		<td style="float:left;">
			<select name="correctorsendfrom" id="correctorsendfrom">
				<option value="editorial">Editorial</option>
				<option value="me">Me</option>
			</select>
		</td>
	</tr>
	<tr>
        <?php if ($this->_tpl_vars['close'] == 'yes'): ?>
            <td colspan=2><div class="alert alert-danger">article create message to Correctors</div><textarea rows="4" cols="50" name="mailbody" id="mailbody"><?php echo $this->_tpl_vars['message']; ?>
</textarea></td>
            <td colspan=3><div class="alert alert-danger">Refusal message to participants</div><textarea rows="4" cols="50" name="refusemessage" id="refusemessage"><?php echo $this->_tpl_vars['refusemessage']; ?>
</textarea></td>
        <?php else: ?>
            <td colspan=5><textarea rows="4" cols="50" name="mailbody" id="mailbody"><?php echo $this->_tpl_vars['message']; ?>
</textarea></td>
        <?php endif; ?>
    </tr>
    <tr>
        <input id="artId" name="artId" value="<?php echo $this->_tpl_vars['artdeldetails'][0]['artId']; ?>
" type="hidden"/>

        <td colspan="5"><button type="button" id="republish" name="republish" class="btn btn-danger" onclick="saveCorrectorRepublishPop();" >Re-publish</button></td>
    </tr>
</table>
