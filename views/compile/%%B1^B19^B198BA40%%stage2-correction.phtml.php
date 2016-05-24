<?php /* Smarty version 2.6.19, created on 2016-03-17 09:13:19
         compiled from gebo/proofread/stage2-correction.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/proofread/stage2-correction.phtml', 613, false),array('modifier', 'stripslashes', 'gebo/proofread/stage2-correction.phtml', 615, false),array('modifier', 'wordwrap', 'gebo/proofread/stage2-correction.phtml', 660, false),array('modifier', 'date_format', 'gebo/proofread/stage2-correction.phtml', 664, false),array('modifier', 'string_format', 'gebo/proofread/stage2-correction.phtml', 674, false),array('modifier', 'in_array', 'gebo/proofread/stage2-correction.phtml', 787, false),array('modifier', 'count', 'gebo/proofread/stage2-correction.phtml', 796, false),array('modifier', 'utf8_decode', 'gebo/proofread/stage2-correction.phtml', 934, false),)), $this); ?>
<?php echo '
<script src="/BO/theme/gebo/js/jquery.raty.min.js"></script>
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<script type="text/javascript" ><!--xmlns="http://www.w3.org/1999/html"-->

$(document).ready(function() {
    $(\'#comment_s2, #marks_comments, #dismarks_comments\').tinymce({
        // Location of TinyMCE script
        script_url 							: \'/BO/theme/gebo/lib/tiny_mce/tiny_mce.js?\' + new Date().getTime(),
        // General options
        theme 								: "advanced",
        readonly                            : '; ?>
<?php echo $this->_tpl_vars['versionfromCorrector']; ?>
 <?php echo ',
        plugins 							: "autoresize,style,table,advhr,advimage,advlink,emotions,inlinepopups,preview,media,contextmenu,paste,fullscreen,noneditable,xhtmlxtras,template,advlist",
        // Theme options
        theme_advanced_buttons1 			: "undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect",
        theme_advanced_buttons2 			: "forecolor,backcolor,|,cut,copy,paste,pastetext,|,bullist,numlist,link,image,media,|,code,preview,fullscreen",
        theme_advanced_buttons3 			: "",
        theme_advanced_toolbar_location 	: "top",
        theme_advanced_toolbar_align 		: "left",
        theme_advanced_statusbar_location 	: "bottom",
        theme_advanced_resizing 			: false,
        height                              : 200,
        content_css                         : "/BO/theme/gebo/css/tinymce_styles.css?" + new Date().getTime(),
        theme_advanced_font_sizes           : "8px,10px,12px,13px,14px,16px,18px,20px",
        font_size_style_values              : "8px,10px,12px,13px,14px,16px,18px,20px",
        init_instance_callback				: function(){

            function resizeWidth() {
                document.getElementById(tinyMCE.activeEditor.id+\'_tbl\').style.width=\'98%\';
            }
            resizeWidth();
            $(window).resize(function() {
                resizeWidth();
            })
        }
    });
//tinyMCE.get(\'comment_s2\').setContent(\''; ?>
<?php echo $this->_tpl_vars['refualreasonContent']; ?>
<?php echo '\');
// tinyMCE.activeEditor.setContent(\''; ?>
<?php echo $this->_tpl_vars['refualreasonContent']; ?>
<?php echo '\', {format : \'bbcode\'});
    $(".uni_style").uniform();
    $(".toggle-button").each(function(obj){
        $(\'#text-toggle-button\'+obj).toggleButtons({
            width:75,
            label: {
                enabled: "Yes",
                disabled: "NO"
            },
            onChange: function (data) {
                var user = $(\'#blackstatus\'+obj).val();
                if($("#blackstatus"+obj).is(":checked")){
                    var target_page = "/processao/blackcontributor?status=yes&user_id="+user;
                    $.post(target_page, function(data){ //alert(data);
                        smoke.alert("Contributor Blacklisted");
                    });
                }
                else{
                    var target_page = "/processao/blackcontributor?status=no&user_id="+user;
                    $.post(target_page, function(data){
                        smoke.alert("Contributor Unblacklisted");
                    });
                }

            }
        });
    });
var reasonslist=$("#reasonslist").val().split(",");
for (i = 1; i <=reasonslist.length; i++) {
    $(\'#star\'+i).raty({
        scoreName : \'entity_score\',
        readOnly  :  '; ?>
<?php echo $this->_tpl_vars['versionfromCorrector']; ?>
<?php echo ',
    number    : 5,
        path: \'/BO/theme/gebo/img\',
        score     : reasonslist[i-1],
        target     : \'#precision-target\'+i,
        targetKeep : true,
        targetType : \'number\'
});
$(\'#disstar\'+i).raty({
    scoreName : \'entity_score\',
    readOnly  :  '; ?>
<?php echo $this->_tpl_vars['versionfromCorrector']; ?>
<?php echo ',
number    : 5,
    path: \'/BO/theme/gebo/img\',
    score     : reasonslist[i-1],
    target     : \'#disprecision-target\'+i,
    targetKeep : true,
    targetType : \'number\'
});
}
/*$(\'#star1\').raty({
 scoreName : \'entity_score\',
 readOnly  :  '; ?>
<?php echo $this->_tpl_vars['versionfromCorrector']; ?>
<?php echo ',
 number    : 5,
 path      : \'/BO/theme/gebo/img\',
 score     : '; ?>
<?php echo $this->_tpl_vars['s1marks'][0]; ?>
<?php echo ',
 target     : \'#precision-target1\',
 targetKeep : true,
 targetType : \'number\'
 });
 $(\'#disstar1\').raty({
 scoreName : \'entity_score\',
 readOnly  :  '; ?>
<?php echo $this->_tpl_vars['versionfromCorrector']; ?>
<?php echo ',
 number    : 5,
 path: \'/BO/theme/gebo/img\',
 score     : '; ?>
<?php echo $this->_tpl_vars['s1marks'][0]; ?>
<?php echo ',
 target     : \'#disprecision-target1\',
 targetKeep : true,
 targetType : \'number\'
 });*/
/*
 <!-------- delivered timer ---------->*/
      var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
      var js_date=(new Date().getTime())/ 1000;
      var diff_date=Math.floor(js_date-cur_date);

		var ts=$("#delivered_at").val();
		ts=parseInt(ts)+(15*24*60*60);
		$("#deliveredtimer").countdown({
			timestamp   : ts,
            diff_date  : diff_date,
			callback    : function(days, hours, minutes, seconds){
				var message = "";
				if(days >0 )message += days + " jours"  +", ";
				if(hours >0 )message += hours + " h" +",";
				if(minutes >0 )message += minutes + " mns"+ ", ";
				message += seconds + " s";
				$("#deliveredtimertext").html(message);
				if(days==0 && hours==0 && minutes==0 && seconds==0)
				{
					//window.location.reload();
				}
			}
		});
		
});
function stripslashes(str)
{
    str=str.replace(/\\\\\'/g,\'\\\'\');
    str=str.replace(/\\\\"/g,\'"\');
    str=str.replace(/\\\\0/g,\'\\0\');
    str=str.replace(/\\\\\\\\/g,\'\\\\\');
    return str;
}
function decode_utf8( s )
{
    return decodeURIComponent( escape( s ) );
}
function writeS2Comments(popPartId, crtPartId)
{
    $("#commentsdiv2").show();
    /////////////alert the left over time of contributor to corrector///
    $(\'input:checkbox\').prop("checked", false);  $.uniform.update();

    var partId = popPartId;
    var crtpartId = crtPartId;
    var newDate = $("#aodeldate").val()+" 23:59:10";
    var d = new Date();
    var  nowtime = d.getFullYear()+\'/\'+(d.getMonth()+1)+\'/\'+d.getDate()+\' \'+d.getHours()+\':\'+d.getMinutes()+\':\'+d.getSeconds();
    //alert(newDate);alert(partId);alert(nowtime);
    var target_page = "/proofread/refusealert?aodeldate="+newDate+"&partId="+partId+"&currenttime="+nowtime;
    $.post(target_page, function(data){ //alert(data);
        var obj = $.parseJSON(data);
        if(obj.message != 0)
        {
            //alert(obj.message);
        }
        var  resubtime = obj.resub;
        var footer  = "You have " + resubtime + " to send us your amended article. We remind you that if the instructions are not followed, we may ask you to change your item back."
        /* "\\nNous faisons jusqu\'à deux A/R. Au troisième refus, l\'article sera automatiquement remis en appel d\'offres et l\'article ne pourra être rétribué."+
        "\\nL\'équipe d\'Edit Place.com vous remercie d\'avoir fait confiance à ses services. "*/;
        $("#content_footer").text(decode_utf8(footer));
    });
    //////////////////////////////////////////////////////////////////////////////////
    $("#pop_partId").val(popPartId);
    $("#pop_crtpartId").val(crtpartId);
    var popBox=$("#pop-s2comments");
    popBox.show();
    $(".boxcol2 :checkbox").attr("checked", false);
    // $("#comment_s2").text(\'\')
    $("#pop_disapproves2_permanent").hide();
    $("#pop_disapproves2").show();
    $("#buttonids").html(\'<input type="hidden"  value="yes" name="pop_disapproves2"/> <input type="hidden" value="" name="pop_disapproves2_permanent"/>\');
    $("#content_footerPermanent").hide();
    $("#content_footer").show();
    $("#comment_validate_"+popPartId).hide();
    $("#s2art_approve").hide();
    $("#s2art_approve").val(\'no\');
    $("#commentsdiv2").show();
    $("#commentsdiv").hide();
    $("#alert").hide();
    $("#refusemarksdiv").hide();
    $("#refusetitle").show();
    $("#closetitle").hide();
}
function writeS2CommentsPermanent(popPartId, crtPartId)
{
    /////////////alert the left over time of contributor to corrector///
    // $(\'input:checkbox\').prop("checked", false);  $.uniform.update();

    var partId = popPartId;
    var crtpartId = crtPartId;
    var newDate = $("#aodeldate").val()+" 23:59:10";
    var d = new Date();
    var  nowtime = d.getFullYear()+\'/\'+(d.getMonth()+1)+\'/\'+d.getDate()+\' \'+d.getHours()+\':\'+d.getMinutes()+\':\'+d.getSeconds();
    //alert(newDate);alert(partId);alert(nowtime);
    var target_page = "/proofread/refusealert?aodeldate="+newDate+"&partId="+partId+"&currenttime="+nowtime;
    $.post(target_page, function(data){
        var obj = $.parseJSON(data);
        if(obj.message != 0)
        {
            // alert(obj.message);
        }
    });
    //////////////////////////////////////////////////////////////////////////////////
    $("#pop_partId").val(popPartId);
    $("#pop_crtpartId").val(crtpartId);
    var popBox=$("#pop-s2comments");
    popBox.show();
    var $b =  $(".boxcol2 :checkbox").attr("checked", false);
    //$("#comment_s2").text(\'\')
    // var $b = $(\'input[type=checkbox]\');
    var countselected = $b.filter(\':checked\').length;
    ////////////////////////////////////
    var selected = new Array();
    $b.filter(\':checked\').each(function() {
        selected.push($(this).attr(\'value\'));
        $("#hide_total2").val(selected);////for posting the value which are checked
    });
    ////////////////////////////////////
    for(var i=1; i<=countselected; i++)
    {
        var target_page = "/template/getrefusevalidtemp?valtempId="+selected[i-1];
        $.post(target_page, function(data){
            var obj = $.parseJSON(data);
            $("#comment_s2").append(stripslashes(obj[0].content)+\'\\n\\n\');
        });
    }
    $("#pop_disapproves2_permanent").show();
    $("#pop_disapproves2").hide();
    $("#buttonids").html(\'<input type="hidden"  value="" name="pop_disapproves2"/> <input type="hidden" value="yes" name="pop_disapproves2_permanent"/>\');
    $("#content_footerPermanent").show();
    $("#content_footer").hide();
    $("#comment_validate_"+popPartId).hide();
    $("#s2art_approve").hide();
    $("#s2art_approve").val(\'no\');
    $("#commentsdiv2").show();
    $("#commentsdiv2").show();
    $("#commentsdiv").hide();
    $("#alert").hide();
    $("#refusemarksdiv").show();
    $("#closetitle").show();
    $("#refusetitle").hide();
}
function sendToFo(artid)
{
    var target_page = "/correction/checklastcorrector?artid="+artid;
    $.get(target_page, function(data){   //alert(data);
        var data1 = $.trim(data);
        if(data1 == \'yes\')
        {
            var r=confirm("No more correction can not participate, you are about to close this AO / Article. Do you confirm your choice ?");
            if (r==true)
            {
                //alert(r);
                $("#nocrtclose").val(\'yes\');
                $("#s2art_corrector_permdisapprove").val(\'yes\');
                $("#s2correction").submit();
                return true;
            }
            else
            {
                //window.location.reload();
                return false;
            }
        }
        else
        {
            var r=confirm("The item will be back online");
            if (r==true)
            {
                var r1=confirm("Announcement by email");
                if (r1==true)
                {
                    $("#sendtofo").val(\'yes\');
                    $("#crtsendtofo").val(\'yes\');
                    $("#anouncebyemail").val(\'yes\');
                    $("#anouncebyemail2").val(\'yes\');
                    $("#s2art_corrector_permdisapprove").val(\'yes\');
                    $("#s2correction").submit();
                    return true;
                }

                $("#sendtofo").val(\'yes\');
                $("#crtsendtofo").val(\'yes\');
                $("#s2art_corrector_permdisapprove").val(\'yes\');
                $("#s2correction").submit();
                return true;
            }
            else
            {
                $("#sendtofo").val(\'no\');
                $("#crtsendtofo").val(\'no\');
                $("#s2art_corrector_permdisapprove").val(\'yes\');
                $("#s2correction").submit();
                return true;
            }
        }
    });


}
///when validate button is clicked///////////
function showUploadFile(mode)
{
    if(mode == \'close\')
        $("#alert").hide();
    else
    {
        $("#alert").show();
        $("#pop-s2comments").css(\'display\', \'none\');
        $(".box_c").hide();
    }
}
function checkServices(id)
{
    $("#participateId").val(id);
    var marks = [];
    $(".precision").each(function(i){
        if($(this).text() != \'\')
            marks.push($(this).text());
        else{
            smoke.alert("N\'oubliez pas de renseigner toutes les notes que vous souhaitez donner au r\\351dacteur");
            return false;
        }
    });
                var $c = $(\'#checksdiv input[type=checkbox]\');
                var clen = $c.length;
                var countcheckselected = $c.filter(\':checked\').length;
    if(countcheckselected != 2)
                {
        smoke.alert(\'Merci de cocher les options SEO et la check list\');
                    return false;
                }
    else if($("#marks_comments").val()== \'\')
            {
        smoke.alert(\'Veuillez entrer un commentaire\');
            return false;
        }
    else if(countcheckselected == 2 && $("#marks_comments").val()!= \'\')
        {
        //return true;
            $("#s2correction").submit();

    }

}

function getRefuseTemp(valtempId)
{
    //alert(valtempId);
    $("#comment_s2").text(\'\');
    var $b = $(\'input[type=checkbox]\');
    var countselected = $b.filter(\':checked\').length;
    ////////////////////////////////////
    var selected = new Array();
    $b.filter(\':checked\').each(function() {
        selected.push($(this).attr(\'value\'));
        $("#hide_total2").val(selected);////for posting the value which are checked
    });
    ////////////////////////////////////
    for(var i=1; i<=countselected; i++)
    {
        var target_page = "/template/getrefusevalidtemp?valtempId="+selected[i-1];
        $.post(target_page, function(data){
           // var obj = $.parseJSON(data);
            $("#comment_s2").append(stripslashes(data)+\'\\n\\n\');
        });

    }
}
function getDensity(artproid, density)
{
    if(density == .5)
    {
        var  densval = density;
    }
    else
    {
        densval = $("#denval").val();
    }
    var target_page = "/proofread/showkeyworddensity?artprocessId="+artproid+"&density="+densval;

    $.post(target_page, function(data){ //alert(data);
        // var obj = $.parseJSON(data);
        $(\'#density\').modal(\'show\');
        $(\'#density_body\').html(data);
    });
}

function refuseAlert()
{
    alert(\'do you really want to refuse it permanently\');
    return true;
}

////to send the email when validate the user with edited option ////////
function getComment(parttype, crtpartid, partid)
{
    if(parttype == \'regural\')
    {
        if (tinymce.getInstanceById(\'commentsValidate_\'+partid))
        {
            tinymce.execCommand(\'mceRemoveControl\', true, \'commentsValidate_\'+partid);
            loadEditors(\'commentsValidate_\'+partid);
        }
        else if (!tinymce.getInstanceById(\'commentsValidate_\'+partid))
        {
            loadEditors(\'commentsValidate_\'+partid);
        }

        var target_page = "/processao/getcommentpopup?mailId=53&particip_id="+partid;  //
        $.post(target_page, function(data){  // alert(data);
           $(\'#commentsValidate_\'+partid).html(data);
        });
    }
    else
    {
        if (tinymce.getInstanceById(\'commentsCrtValidate_\'+crtpartid))
        {
            tinymce.execCommand(\'mceRemoveControl\', true, \'commentsCrtValidate_\'+crtpartid);
            loadEditors(\'commentsCrtValidate_\'+crtpartid);
        }
        else if (!tinymce.getInstanceById(\'commentsCrtValidate_\'+crtpartid))
        {
            loadEditors(\'commentsCrtValidate_\'+crtpartid);
        }

        var target_page = "/processao/getcommentpopup?mailId=53&crt_particip_id="+crtpartid+"&particip_id="+partid;//
        $.post(target_page, function(data){   //alert(data);
            $(\'#commentsCrtValidate_\'+crtpartid).html(data);
        });
    }
    $("#alert").show();
    $("#correctorvalidmailcontent").show();
    $("#pop-s2comments").hide();
    $("#correctorrefusemailcontent").hide();
    $("#optionsdiv").show();
    $("#checksdiv").show();
    $("#s2art_approve").val(\'yes\');
    $("#refuseCorrector").hide();
    $("#validCorrector").show();
}
////to send the email when editor correct the corrector version and want to disapporve ////////
function getCorrectorRefuseComment(crtpartid, partid, mode)
{
    if (tinymce.getInstanceById(\'commentsCrtRefuse\'))
    {
        tinymce.execCommand(\'mceRemoveControl\', true, \'commentsCrtRefuse\');
        loadEditors(\'commentsCrtRefuse\');
    }
    else if (!tinymce.getInstanceById(\'commentsCrtRefuse\'))
    {
        loadEditors(\'commentsCrtRefuse\');
    }

    //////////////////////////////////////
    var buttonmode = mode;
    if(buttonmode == \'permanent\')
        var mailid = 91;
    else if(buttonmode == \'temporary\')
        var mailid = 56;
    var target_page = "/processao/getcommentpopup?mailId="+mailid+"&crt_particip_id="+crtpartid+"&particip_id="+partid; //
    $.post(target_page, function(data){   //alert(data);
        //$("#commentsRefuse_"+userid).val(data);
        $(\'#commentsCrtRefuse\').html(data);
        var buttonmode = mode;
        if(buttonmode == \'permanent\')
        {
            // $("#s2art_corrector_permdisapprove_"+partid).hide();
            $("#s2art_corrector_permdisapprove").show();
            $("#s2art_corrector_disapprove").hide();
            $("#refusemarksdiv").show();
            $("#closetitle").show();
        }
        else if(buttonmode == \'temporary\')
        {
            // $("#s2art_corrector_disapprove_"+partid).hide();
            $("#s2art_corrector_disapprove").show();
            $("#s2art_corrector_permdisapprove").hide();
            $("#refusemarksdiv").hide();
            $("#refuseCorrector").show();
            $("#validCorrector").hide();
        }
    });
    $("#alert").show();
    $("#correctorrefusemailcontent").show();
    $("#pop-s2comments").hide();
    $("#correctorvalidmailcontent").hide();
    $("#optionsdiv").hide();
    $("#checksdiv").hide();
    $("#s2art_approve").val(\'no\');
}
count = \'\';
function validateRefuse(artId)
{
    if($("#dismarks_comments").val()== \'\' &&  $("#dismarks").val()==\'0\')
    {
        smoke.confirm("You did not give a mark to that contributor.",function(e){
            if (e)
            {
                $("[id^=chktemp_]").each(function(i) {
                    var selectedtemp=$(this).attr(\'id\');
                    if($("#"+selectedtemp).is(":checked"))
                        count = selectedtemp;
                });
                if(count == \'\')
                {
                    smoke.alert("You have to choose 1 or more reason(s) for your refusal");
                    return false;
                }
                else{
                    var href="/republish/republishpopup?stage=2&artId="+artId;
                    //var href="/processao/group-profiles?artId="+artid;
                    $("#republish").removeData(\'modal\');
                    $(\'#republish .modal-body\').load(href);
                    $("#republish").modal();
                    $(".modal-backdrop:gt(0)").remove();
//                    $("#disapprove2form").submit();
                }
            }
            else
                return false;
         },{"ok":"I skip the mark step","cancel":"I give a mark to the contributor"});
    }
    else
    {
        $("[id^=chktemp_]").each(function(i) {
            var selectedtemp=$(this).attr(\'id\');
            if($("#"+selectedtemp).is(":checked"))
                count = selectedtemp;
        });
        if(count == \'\')
        {
            smoke.alert("You have to choose 1 or more reason(s) for your refusal");
            return false;
        }
        else{
            var href="/republish/republishpopup?stage=2&artId="+artId;
            //var href="/processao/group-profiles?artId="+artid;
            $("#republish").removeData(\'modal\');
            $(\'#republish .modal-body\').load(href);
            $("#republish").modal();
            $(".modal-backdrop:gt(0)").remove();
//            $("#disapprove2form").submit();
        }
    }
    $(\'[id^=confirm-ok]\').removeClass("btn-primary");
    $(\'[id^=confirm-cancel]\').addClass("btn-primary");
}
function mailToAlix()
{
    $(".smoke-alert").css( "z-index" , 10 );
    $(".smokebg").css( "z-index" , 10 );
    $(".smoke").hide();
    $(".smoke-alert").hide();
    var href="/proofread/no-template";
    //var href="/processao/group-profiles?artId="+artid;
    $("#notemplate").removeData(\'modal\');
    $(\'#notemplate .modal-body\').load(href);
    $("#notemplate").modal();
    $(".modal-backdrop:gt(0)").remove();
}


function deliveredarticle(article)
{
	("#delivered_btn").attr(\'disabled\',true);
    $("#delivered_btn").removeClass("btn-primary");
    $("#delivered_btn").addClass("btn-basic");
   var c = smoke.confirm(\'I confirm as PM  that I have controled this delivery\', function(e){
		if (e){
			var target_page = "/proofread/deliveryupdate?article="+article+"&stage=2";
			 $.post(target_page, function(data){
                     var response = $.parseJSON(data);
                     console.log(response.status);
                     console.log(response.validatestage);

                     if( response.validatestage === \'yes\'){
                         var c = smoke.confirm("Etes-vous s\\373r de vouloir valider S2 en m\\352me temps? (Validation d\\351finitive de l\'article)", function(e){
                             if (e) {
                                 $("#s2correction").submit();
                        }
                     },
                     {});
                }
                /*else{
                    //window.location.reload();
                }*/
			 });
		}
		else{
			return false;
		}
	});
}
</script>
'; ?>

<h3 class="heading">Stage 2 Correction<a class="label label-inverse pull-right"  id="return">Back</a></h3>
<?php if ($this->_tpl_vars['articledetails'][0]['delivered'] == 'yes'): ?>
	<div class="label label-warning pull-right" style="margin-right:200px;" id="deliveredtimer"> DELIVERED TIMER : <span id="deliveredtimertext"></span></div>
<?php endif; ?>
<table id="grptabledetails" class="table btn-gebo tdleftalign" >
    <tr>
        <td><b>Article : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
        <td><b>NAME AO : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['deliveryTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
        <td><b>Article type : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['type'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
    </tr>
    <tr>
        <td><b>Counting mode : </b><?php echo $this->_tpl_vars['articledetails'][0]['sign_type']; ?>
</td>
        <td><b>Min <?php if ($this->_tpl_vars['articledetails'][0]['signtype'] == 'words'): ?>words / article
            <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'chars'): ?>Characters / article
            <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'sheets'): ?>sheets / article <?php endif; ?>: </b><?php echo $this->_tpl_vars['articledetails'][0]['num_min']; ?>
</td>
        <td><b>Max <?php if ($this->_tpl_vars['articledetails'][0]['signtype'] == 'words'): ?>words / article
            <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'chars'): ?>Characters / article
            <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'sheets'): ?>sheets / article <?php endif; ?>: </b><?php echo $this->_tpl_vars['articledetails'][0]['num_max']; ?>
</td>
    </tr>
    <tr>
        <td><b>Editorial Brief : </b><?php if ($this->_tpl_vars['articledetails'][0]['filepath'] != NULL): ?>
            <a href="/proofread/downloadfile?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&spec=<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
" class="label label-warning">Download</a><?php else: ?>No file<?php endif; ?></td>
        <td></td>
        <td></td>
    </tr>
</table>
<div class="row-fluid">
    <div class="span12">
    <form action="/proofread/stage2-correction?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleId=<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
" method="post" id="s2correction" name="s2correction" enctype="multipart/form-data">
            <table id="s2crtgrid" class="table table-bordered table-striped table_vam">
                <thead>
                <tr>
                    <th>Version</th>
                    <th>File name<</th>
                    <th>Writer</th>
                    <th>step</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Article</th>
                    <!--<th>Density</th>-->
                    <th>Plagiarism internal</th>
                    <th>Plagiarism external</th>
                    <th><?php if ($this->_tpl_vars['articledetails'][0]['signtype'] == 'words' || $this->_tpl_vars['articledetails'][0]['signtype'] == ''): ?>words
                        <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'chars'): ?>Characters
                        <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'sheets'): ?>sheets <?php endif; ?>
                    </th>
                    <th>Black List</th>
                </tr>
                </thead>
                <tbody>
                <?php $_from = $this->_tpl_vars['versions_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['versions_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['versions_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['versions_key'] => $this->_tpl_vars['versions_item']):
        $this->_foreach['versions_loop']['iteration']++;
?>
                <tr>
                    <td><?php echo $this->_tpl_vars['versions_item']['version']; ?>
</td>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['versions_item']['article_name'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 10, "\n", true) : smarty_modifier_wordwrap($_tmp, 10, "\n", true)); ?>
</td>
                    <td><?php if ($this->_tpl_vars['versions_item']['first_name'] == ''): ?><?php echo $this->_tpl_vars['versions_item']['email']; ?>
<?php else: ?><?php echo $this->_tpl_vars['versions_item']['first_name']; ?>
<?php endif; ?></td>
                    <td><?php if ($this->_tpl_vars['versions_item']['stage'] == 's1'): ?>stage 1<?php else: ?>stage 2<?php endif; ?></td>
                    <td><?php if ($this->_tpl_vars['versions_item']['status'] == ''): ?>new <?php elseif ($this->_tpl_vars['versions_item']['status'] == 'process'): ?>revised <?php else: ?><?php echo $this->_tpl_vars['versions_item']['status']; ?>
 <?php endif; ?> </td>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['versions_item']['article_sent_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
</td>
                    <!--<td><a href="/proofread/downloadfile?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&path=<?php echo $this->_tpl_vars['versions_item']['id']; ?>
">Download</a></td>-->
<!--                    <td><a href="/BO/download_article_process_file.php?article_process_id=<?php echo $this->_tpl_vars['versions_item']['id']; ?>
">Download</a></td>-->
                    <td><a href="/BO/download-files.php?function=downloadArticleProcessFile&article_process_id=<?php echo $this->_tpl_vars['versions_item']['id']; ?>
">Download</a></td>
                    <!--<td><a href=""  data-target="#density" data-toggle="modal" onclick="return getDensity('<?php echo $this->_tpl_vars['versions_item']['id']; ?>
');">Density</a></td>-->
                    <td><a data-target="#plagiarism" data-toggle="modal" href="/proofread/contentplagiarism?artprocessId=<?php echo $this->_tpl_vars['versions_item']['id']; ?>
" class="label label-success">Internal</a></td>

                    <td><!--<a href="javascript:void(0);" >External</a>-->
                        <?php if ($this->_tpl_vars['versions_item']['plag_percent'] != ''): ?>
                        <?php if ($this->_tpl_vars['versions_item']['plag_percent'] > 20): ?>
                        <a data-target="#plagexternalresults" data-toggle="modal" href="/correction/plagdetails?part_id=<?php echo $this->_tpl_vars['versions_item']['participate_id']; ?>
&art_id=<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
&version=<?php echo $this->_tpl_vars['versions_item']['version']; ?>
" class="label label-important" > <?php echo ((is_array($_tmp=$this->_tpl_vars['versions_item']['plag_percent'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
 %</a>
                        <?php else: ?>
                        <a data-target="#plagexternalresults" data-toggle="modal" href="/correction/plagdetails?part_id=<?php echo $this->_tpl_vars['versions_item']['participate_id']; ?>
&art_id=<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
&version=<?php echo $this->_tpl_vars['versions_item']['version']; ?>
" class="label label-success" > <?php echo ((is_array($_tmp=$this->_tpl_vars['versions_item']['plag_percent'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
 %</a>
                        <?php endif; ?>
                        <?php else: ?>
                        <span class="label label-inverse">N/A</span>
                        <?php endif; ?>
                    </td>
        </td>
        <td><?php if ($this->_tpl_vars['versions_item']['article_words_count'] > $this->_tpl_vars['articledetails'][0]['num_max'] || $this->_tpl_vars['versions_item']['article_words_count'] < $this->_tpl_vars['articledetails'][0]['num_min']): ?>
            <span class="label label-important"><?php echo $this->_tpl_vars['versions_item']['article_words_count']; ?>
 </span>
            <?php else: ?>
            <span class="label label-success"><?php echo $this->_tpl_vars['versions_item']['article_words_count']; ?>
</span>
            <?php endif; ?>
        </td>
        <td><div id="text-toggle-button<?php echo ($this->_foreach['versions_loop']['iteration']-1); ?>
" class="toggle-button">
            <input name="blackstatus<?php echo ($this->_foreach['versions_loop']['iteration']-1); ?>
" id="blackstatus<?php echo ($this->_foreach['versions_loop']['iteration']-1); ?>
" type="checkbox" value="<?php echo $this->_tpl_vars['versions_item']['user_id']; ?>
" <?php if ($this->_tpl_vars['versions_item']['blackstatus'] == 'yes'): ?> checked="checked" <?php endif; ?> >
        </div></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
    <input type="hidden" name="reasonslist" id="reasonslist"  value="<?php echo $this->_tpl_vars['reasonslist']; ?>
"/>
	<input type="hidden" name="delivered_at" id="delivered_at"  value="<?php echo $this->_tpl_vars['articledetails'][0]['delivered_updated_at']; ?>
"/>
        </tbody>
       </table>
        <?php if ($this->_tpl_vars['articledetails'][0]['correction'] == 'no'): ?>
            <div class="alignright" class="span6">
    <?php if ($this->_tpl_vars['articledetails'][0]['delivered'] != 'yes'): ?>
		<button type="button" name="s1art_delivery" class="btn btn-primary" id="delivered_btn" onclick="return deliveredarticle('<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
');">Delivered</button>
	<?php endif; ?>
                <button type="button" name="s2art_approve_<?php echo $this->_tpl_vars['partId']; ?>
" id="s2art_approve_<?php echo $this->_tpl_vars['partId']; ?>
" class="btn btn-success"  onclick="return getComment('regural', null, '<?php echo $this->_tpl_vars['partId']; ?>
'); showUploadFile('open');">Validate</button>
                <?php if ($this->_tpl_vars['refused_count']['refused_count'] < 3): ?>
                <button type="button" id="s2art_disapprove" name="s2art_disapprove" class="btn btn-danger"  onclick="return writeS2Comments('<?php echo $this->_tpl_vars['partId']; ?>
');">Refuse</button>
                <?php endif; ?>
                <button type="button" id="s2art_disapprove_permanent" name="s2art_disapprove_permanent" class="btn btn-danger"  onclick="return writeS2CommentsPermanent('<?php echo $this->_tpl_vars['partId']; ?>
');">Refuser Definite</button>
                <input type="hidden" name="participateId" id="participateId" value="<?php echo $this->_tpl_vars['partId']; ?>
"  />
                <input id="participateType" name="participateType" type="hidden" value="normalParticipation" />
            </div>
        <?php else: ?>
            <div class="alignright" class="span6">
    <?php if ($this->_tpl_vars['articledetails'][0]['delivered'] != 'yes'): ?>
		<button type="button" name="s1art_delivery" class="btn btn-primary"  onclick="return deliveredarticle('<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
');">Delivered</button>
	<?php endif; ?>
                <button type="button" name="s2art_approve_<?php echo $this->_tpl_vars['crtpartId']; ?>
" id="s2art_approve_<?php echo $this->_tpl_vars['crtpartId']; ?>
" class="btn btn-success"  onclick="return getComment('correction', '<?php echo $this->_tpl_vars['crtpartId']; ?>
', '<?php echo $this->_tpl_vars['partId']; ?>
'); showUploadFile('open');">Validate</button>
                <button type="button" id="s2crtart_disapprove" name="s2crtart_disapprove" class="btn btn-danger"  onclick="return getCorrectorRefuseComment('<?php echo $this->_tpl_vars['crtpartId']; ?>
', '<?php echo $this->_tpl_vars['partId']; ?>
', 'temporary');">Refusal resubmission corrector</button>
                <!--<button type="button" id="s2crtart_disapprove_permanent" name="s2crtart_disapprove_permanent" class="btn btn-danger"  onclick="return getCorrectorRefuseComment('<?php echo $this->_tpl_vars['crtpartId']; ?>
', '<?php echo $this->_tpl_vars['partId']; ?>
', 'permanent');">Refus d&eacute;finitif au correcteur</button>-->
                <button type="button" id="s2crtart_disapprove_permanent" name="s2crtart_disapprove_permanent" class="btn btn-danger"  data-toggle="modal" data-target="#republish" href="/correction/republishcorrectorpopup?close=yes&stage=2&artId=<?php echo $_GET['articleId']; ?>
">Final refusal corrector</button>
                <input type="hidden" name="participateId" id="participateId" value="<?php echo $this->_tpl_vars['partId']; ?>
"  />
                <input type="hidden" name="crtparticipateId" id="crtparticipateId" value="<?php echo $this->_tpl_vars['crtpartId']; ?>
"  />
                <input id="participateType" name="participateType" type="hidden" value="correctorParticipation" />
            </div>
        <?php endif; ?>
    <!--///vlidate button is clicked this box arrives//////////-->

    <div id="alert"  style="height: auto;position:relative;top:20px;display: none;">
    <div class="span12">
        <h3 id="validCorrector">Validation de l'article et de sa correction</h3>
        <div class="ui-sortable"  id="optionsdiv">
            <div class="w-box-header">Notes du r&eacute;dacteur <?php echo $this->_tpl_vars['versions_contributor_details'][0]['first_name']; ?>
 <?php echo $this->_tpl_vars['versions_contributor_details'][0]['last_name']; ?>
<?php if ($this->_tpl_vars['articledetails'][0]['correction'] != 'no'): ?> (Notes donn&eacute;es par le correcteur <?php echo $this->_tpl_vars['versions_user_details'][0]['first_name']; ?>
 <?php echo $this->_tpl_vars['versions_user_details'][0]['last_name']; ?>
)<?php endif; ?></div>
            <div class="w-box-content cnt_a" >
                <div class="row-fluid">
                    <div class="span5 form-inline">
                        <div><b>Note donn&eacute;e pour chaque crit&eacute;re :</b></div>
                        <?php $_from = $this->_tpl_vars['s1reasons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['reasons_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['reasons_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['reasons_key'] => $this->_tpl_vars['reasons_item']):
        $this->_foreach['reasons_loop']['iteration']++;
?>
                        <div class="span11 form-inline"><span class="span6 pull-left"><h6><?php if ($this->_tpl_vars['reasons_item'] != 'N'): ?><?php echo $this->_tpl_vars['reasons_item']; ?>
<?php else: ?>Note globale<?php endif; ?></h6></span>
                            <div class="span7 starmarks" id="star<?php echo ($this->_foreach['reasons_loop']['iteration']-1)+1; ?>
" ></div>
                            <input type="hidden" id="reasonId<?php echo ($this->_foreach['reasons_loop']['iteration']-1)+1; ?>
" value="<?php echo $this->_tpl_vars['reasons_key']; ?>
" />
                            <span class="badge"><span class="precision" id="precision-target<?php echo ($this->_foreach['reasons_loop']['iteration']-1)+1; ?>
" ></span>/5</span>
                        </div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                    <div class="span2"> <div><b>Note globale :</b></div><label style="font-size:25px;" class="alert alert-info span8"><span id='givenmarks'><?php echo $this->_tpl_vars['s1markscount']; ?>
</span><span id='totalmarks'>/10<!--<?php echo $this->_tpl_vars['rreasonscount']; ?>
--></span></label></div>
                    <div class="span5 form-inline">
                        <div><b>Commentaire global :</b></div>
                        <textarea cols="30" rows="6" id="marks_comments" name="marks_comments" class="span12" <?php if ($this->_tpl_vars['versionfromCorrector'] == 'true'): ?>readonly<?php endif; ?>><?php echo $this->_tpl_vars['versions_user_details'][0]['comments']; ?>
</textarea>
                    </div>
                    <input type="hidden" id="markstotal" name="markstotal" value="<?php echo $this->_tpl_vars['avgs1marks']; ?>
" />
                    <input type="hidden" id="markswithreason" name="markswithreason" value="<?php echo $this->_tpl_vars['previousdetails']; ?>
" />
                </div>
            </div>
        </div>
    </div>
    <!--<div class="span11 pull-right">
            <div class="span9 ui-sortable"  id="optionsdiv">
                <div class="w-box-header">Marks and Comments</div>
                <div class="w-box-content cnt_a" >
                    <div class="row-fluid">
                        <div class="span11 form-inline">
                            <label class="span2">Marks </label>
                            <select name="marks" id="marks" class="span12">
                                <option value="0">select marks</option>
                                <?php unset($this->_sections['val']);
$this->_sections['val']['name'] = 'val';
$this->_sections['val']['start'] = (int)1;
$this->_sections['val']['loop'] = is_array($_loop=11) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['val']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['val']['show'] = true;
$this->_sections['val']['max'] = $this->_sections['val']['loop'];
if ($this->_sections['val']['start'] < 0)
    $this->_sections['val']['start'] = max($this->_sections['val']['step'] > 0 ? 0 : -1, $this->_sections['val']['loop'] + $this->_sections['val']['start']);
else
    $this->_sections['val']['start'] = min($this->_sections['val']['start'], $this->_sections['val']['step'] > 0 ? $this->_sections['val']['loop'] : $this->_sections['val']['loop']-1);
if ($this->_sections['val']['show']) {
    $this->_sections['val']['total'] = min(ceil(($this->_sections['val']['step'] > 0 ? $this->_sections['val']['loop'] - $this->_sections['val']['start'] : $this->_sections['val']['start']+1)/abs($this->_sections['val']['step'])), $this->_sections['val']['max']);
    if ($this->_sections['val']['total'] == 0)
        $this->_sections['val']['show'] = false;
} else
    $this->_sections['val']['total'] = 0;
if ($this->_sections['val']['show']):

            for ($this->_sections['val']['index'] = $this->_sections['val']['start'], $this->_sections['val']['iteration'] = 1;
                 $this->_sections['val']['iteration'] <= $this->_sections['val']['total'];
                 $this->_sections['val']['index'] += $this->_sections['val']['step'], $this->_sections['val']['iteration']++):
$this->_sections['val']['rownum'] = $this->_sections['val']['iteration'];
$this->_sections['val']['index_prev'] = $this->_sections['val']['index'] - $this->_sections['val']['step'];
$this->_sections['val']['index_next'] = $this->_sections['val']['index'] + $this->_sections['val']['step'];
$this->_sections['val']['first']      = ($this->_sections['val']['iteration'] == 1);
$this->_sections['val']['last']       = ($this->_sections['val']['iteration'] == $this->_sections['val']['total']);
?>
                                <option value="<?php echo $this->_sections['val']['index']; ?>
"><?php echo $this->_sections['val']['index']; ?>
</option>
                                <?php endfor; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span11 form-inline">
                            <label class="span2">Comments </label>
                            <textarea cols="20" rows="4" id="marks_comments" name="marks_comments" class="span8"></textarea>
                        </div>
                    </div>

                </div>
            </div>
    </div>-->
    <div class="span12" style="margin-left:0px">
        <!--<div class="span6 ui-sortable"  id="optionsdiv">
            <div class="w-box-header">Options choisies par le client</div>
                <div class="w-box-content cnt_a" >
                    <ul class="unstyled">

                        <?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['options_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['options_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['options_key'] => $this->_tpl_vars['options_item']):
        $this->_foreach['options_loop']['iteration']++;
?>
                        <?php if (((is_array($_tmp=$this->_tpl_vars['options_item']['id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['res_seltdopts']) : in_array($_tmp, $this->_tpl_vars['res_seltdopts']))): ?>
                        <li>
                            <label class="uni-checkbox">
                                <span><input type="checkbox" name="option_<?php echo $this->_tpl_vars['options_item']['id']; ?>
" id="option_<?php echo $this->_tpl_vars['options_item']['id']; ?>
" <?php echo $this->_tpl_vars['options_item']['id']; ?>
 class="uni_style" /> </span>
                                <span class="pop_over" data-placement="right" data-original-title="Option Details" data-html="true" data-content="<?php echo ((is_array($_tmp=$this->_tpl_vars['options_item']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['options_item']['option_name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</span>
                            </label>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                        <input type="hidden" name="hid_options" id="hid_options" value=<?php if (count($this->_tpl_vars['res_seltdopts']) != 0): ?><?php echo count($this->_tpl_vars['res_seltdopts']); ?>
<?php else: ?><?php echo 0; ?>
<?php endif; ?> />
                    </ul>
                </div>
        </div>-->

        <div class="span5 ui-sortable" id="checksdiv" style="padding-top:5px;">
                <div class="w-box-header">Check List</div>
                <div class="w-box-content cnt_a" >
                    <label class="uni-checkbox">
                        <span> <input type="checkbox" name="scheck" id="scheck" class="uni_style" /></span>
                        <span class="hint--top hint--error " data-hint="checking for specllings of content">Check Antidote</span>
                    </label>
                    <!--<label class="uni-checkbox">
                        <span><input type="checkbox" name="gcheck" id="gcheck" class="uni_style" /></span>
                        <span class="hint--top hint--error" data-hint="checking for grammer of content">Check plagiarism</span>
                    </label>-->
                    <label class="uni-checkbox">
                        <span><input type="checkbox" name="ccheck" id="ccheck" class="uni_style" /></span>
                        <span class="hint--top hint--error" data-hint="checking for unfavourable data of content">Proofreading content</span>
                    </label>
                </div>
            </div>
        </div>
        <?php if ($this->_tpl_vars['articledetails'][0]['correction'] == 'no'): ?>
    <div id="mailcontent" class="span11 pull-left" style="position: relative; top: 20px;margin-left:0px">
                <div class="pull-left num-large" style="position: relative; top: 5px;">upload article : &nbsp; </div>&nbsp;
                <div id="uniform-uni_file" class="uni-uploader">
                    <input id="art_doc_<?php echo $this->_tpl_vars['partId']; ?>
" class="uni_style" type="file" name="art_doc_<?php echo $this->_tpl_vars['partId']; ?>
" size="19">
            <span class="uni-filename" >No file selected</span>
                    <span class="uni-action" >Choose File</span>
                </div>&nbsp;&nbsp;
                <input type="hidden" value="yes" name="s2art_approve" id="s2art_approve"/>
        <button type="button" class="btn btn-success" name="s2art_approve"  onclick="return checkServices('<?php echo $this->_tpl_vars['partId']; ?>
');" >Valider</button>
        &nbsp;&nbsp;<a onclick="return showUploadFile('close');" class="btn"><i class="splashy-error_small"></i> ANNULER</a>
        <div class="span11" style="margin-left:0px"><textarea  name="commentsValidate_<?php echo $this->_tpl_vars['partId']; ?>
" id="commentsValidate_<?php echo $this->_tpl_vars['partId']; ?>
" class="textarea" rows="10"></textarea></div>
            </div>
        <?php else: ?>
    <div id="correctorvalidmailcontent" class="span11 pull-left" style="position: relative; top: 20px;margin-left:0px">
                <div class="pull-left num-large" style="position: relative; top: 5px;">uploade article : &nbsp; </div>&nbsp;
                <div id="uniform-uni_file" class="uni-uploader">
                    <input id="art_doc_<?php echo $this->_tpl_vars['crtpartId']; ?>
" class="uni_style" type="file" name="art_doc_<?php echo $this->_tpl_vars['crtpartId']; ?>
" size="19">
                    <span class="uni-filename" >No file selected</span>
                    <span class="uni-action" >Choose File</span>
                </div>&nbsp;&nbsp;
                <input type="hidden" value="yes" name="s2art_approve" id="s2art_approve" />
        <button type="button" class="btn btn-success" name="s2art_approve"  onclick="return checkServices('<?php echo $this->_tpl_vars['partId']; ?>
');" >Valider</button>
        &nbsp;&nbsp;<a onclick="return showUploadFile('close');" class="btn"><i class="splashy-error_small"></i> ANNULER</a>
        <div class="span11" style="margin-left:0px"><textarea  name="commentsCrtValidate_<?php echo $this->_tpl_vars['crtpartId']; ?>
" id="commentsCrtValidate_<?php echo $this->_tpl_vars['crtpartId']; ?>
" class="textarea" rows="10"></textarea></div>
            </div>
           <!-- //////////////////////for corrector refussal ///////////////////-->
    <h3 id="refuseCorrector" class="hide">Refus / Resoumission de l'article au correcteur</h3>
    <div class="span11" >
        <div class="ui-sortable span"  id="correctorrefusemailcontent">
            <div class="w-box-header span12"><p style="padding-left:10px">Email qui sera envoy&eacute; au correcteur</p></div>
            <div class="w-box-content cnt_a span12" >
                <div  class="span11" style="margin-left:10px">
                <!--<textarea rows="40" cols="60" name="commentsCrtRefuse_<?php echo $this->_tpl_vars['crtpartId']; ?>
" id="commentsCrtRefuse_<?php echo $this->_tpl_vars['crtpartId']; ?>
"></textarea>-->
                <input name="commentsCrtRefuseObject" id="commentsCrtRefuseObject" type="hidden"/>
                <textarea rows="40" cols="60" name="commentsCrtRefuse" id="commentsCrtRefuse"></textarea>
                    <button  type="submit" class="btn btn-warning hide pull-right" value="Correcteur Refuser" name="s2art_corrector_disapprove"  id="s2art_corrector_disapprove" >Refuser la d&eacute;cision du correcteur  </button>
<!--                <button  type="button" class="btn btn-warning hide" value="Correcteur Refuser Definit" name="s2art_corrector_permdisapprove"  id="s2art_corrector_permdisapprove" onclick="return sendToFo('<?php echo $_GET['articleId']; ?>
'); refuseAlert();"> Correcteur Refuser Definit</button>
                    -->             <button  type="button" class="btn btn-warning hide" value="Correcteur Refuser Definit" name="s2art_corrector_permdisapprove"  id="s2art_corrector_permdisapprove" data-toggle="modal" data-target="#republish" href="/correction/republishcorrectorpopup?close=yes&stage=2&artId=<?php echo $_GET['articleId']; ?>
"> Correcteur Refuser Definit</button>
                <input type="hidden" id="crtsendtofo" name="sendtofo" value="">
                <input type="hidden" id="nocrtclose" name="nocrtclose" value="">
                <input type="hidden" id="s2art_corrector_permdisapprove" name="s2art_corrector_permdisapprove" value="">
                <input type="hidden" id="anouncebyemail2" name="anouncebyemail" value="">
                </div>
            </div>
        </div>
    </div>
        <?php endif; ?>

    </div>

    </form>
</div>
</div>

<!--  //////////extended page///////////-->
<?php $this->assign('head1', "Dear writer,\n\n"); ?>
<?php $this->assign('footpermanent', "Unfortunately, the new version of this article has still not proved satisfactory.
\n The article is delivered in tender. There fore for this production you will  not be paid \n
 Thank you for trusted services.\n"); ?>
<?php $this->assign('sign', "The Edit-place team"); ?>

<!--<div id="pop-s2comments" class="box_c" style="position:relative;top: 10px;">-->
<div id="pop-s2comments" class="ui-sortable" style="display:none;padding:5px;">
    <?php if ($this->_tpl_vars['articledetails'][0]['correction'] == 'no'): ?>
    <h3 class="span5 pull-left hide" id="refusetitle">Refus / Resoumission de l'article au r&eacute;dacteur</h3>
    <h3 class="span5 pull-left hide" id="closetitle">Refus d&eacute;finitif de l'article du r&eacute;dacteur</h3>
    <?php else: ?>
    <h3 class="span5 pull-left hide" id="refusetitle">Refus / Resoumission de l'article au correcteur</h3>
    <h3 class="span5 pull-left hide" id="closetitle">Refus d&eacute;finitif de l'article du correcteur</h3>
    <?php endif; ?>
    <form name="disapprove2form" action="/proofread/disapprove?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post" id="disapprove2form"  >
        <div class="span12" id="refusemarksdiv">
            <div class="ui-sortable"  id="optionsdiv1">
                <div class="w-box-header">Notes du r&eacute;dacteur</div>
                <div class="w-box-content cnt_a" >
                        <div class="row-fluid">
                        <div class="span5 form-inline">
                            <div><b>Note donn&eacute;e pour chaque crit&eacute;re :</b></div>
                            <?php $_from = $this->_tpl_vars['s1reasons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['reasons_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['reasons_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['reasons_key'] => $this->_tpl_vars['reasons_item']):
        $this->_foreach['reasons_loop']['iteration']++;
?>
                            <div class="span9 form-inline"><span class="span6 pull-left"><h6><?php if ($this->_tpl_vars['reasons_item'] != 'N'): ?><?php echo $this->_tpl_vars['reasons_item']; ?>
<?php else: ?>Note globale<?php endif; ?></h6></span>
                                <div class="span7 disstarmarks" id="disstar<?php echo ($this->_foreach['reasons_loop']['iteration']-1)+1; ?>
" ></div>
                                <input type="hidden" id="reasonId<?php echo ($this->_foreach['reasons_loop']['iteration']-1)+1; ?>
" value="<?php echo $this->_tpl_vars['reasons_key']; ?>
" />
                                <span class="badge"><span class="precision" id="disprecision-target<?php echo ($this->_foreach['reasons_loop']['iteration']-1)+1; ?>
" ></span>/5</span>
                            </div>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                        <div class="span2"> <div><b>Note globale :</b></div><label style="font-size:25px;" class="alert alert-info span8"><span id='disgivenmarks'><?php echo $this->_tpl_vars['s1markscount']; ?>
</span><span id='distotalmarks'>/10<!--<?php echo $this->_tpl_vars['rreasonscount']; ?>
--></span></label></div>
                        <div class="span5 form-inline">
                            <div><b>Commentaire global :</b></div>
                            <textarea cols="20" rows="6" id="dismarks_comments" name="dismarks_comments" class="span8"><?php echo $this->_tpl_vars['versions_user_details'][0]['comments']; ?>
</textarea>
                            </div>
                        <input type="hidden" id="dismarkstotal" name="dismarkstotal" value="<?php echo $this->_tpl_vars['avgs1marks']; ?>
" />
                        <input type="hidden" id="dismarkswithreason" name="dismarkswithreason" value="<?php echo $this->_tpl_vars['previousdetails']; ?>
" />
                        </div>

                    </div>
                </div>
            </div>
        <div class="w-box-header span12"><p style="padding-left:10px">Email &egrave; envoyer au r&eacute;dacteur</p> </div>
        <div class="w-box-content cnt_a span12 " >
            <div class="span5" style="margin-left:10px">Cocher les raisons du refus pour compl&eacute;ter automatiquement l'email qui se trouve sur la droite :</br>
            <?php $_from = $this->_tpl_vars['refusevalidtemps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['refusevalidtemps_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['refusevalidtemps_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['refusevalidtemps_key'] => $this->_tpl_vars['refusevalidtemps_item']):
        $this->_foreach['refusevalidtemps_loop']['iteration']++;
?>
                <label class="uni-checkbox span11"  style="margin-left:0px;padding-top:5px;">
                    <span><input name="chktemp_<?php echo $this->_tpl_vars['refusevalidtemps_item']['identifier']; ?>
" id="chktemp_<?php echo $this->_tpl_vars['refusevalidtemps_item']['identifier']; ?>
" type="checkbox" value="<?php echo $this->_tpl_vars['refusevalidtemps_item']['identifier']; ?>
" onclick="return getRefuseTemp('<?php echo $this->_tpl_vars['refusevalidtemps_item']['identifier']; ?>
');" class="uni_style" <?php if (in_array ( $this->_tpl_vars['refusevalidtemps_item']['identifier'] , $this->_tpl_vars['selectedrefusalreasons'] )): ?> checked='checked' <?php endif; ?> /></span>
                    <label for="chktemp_<?php echo $this->_tpl_vars['refusevalidtemps_item']['identifier']; ?>
" style="cursor: pointer;"><?php echo ((is_array($_tmp=$this->_tpl_vars['refusevalidtemps_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</label>
                </label>
                <?php endforeach; endif; unset($_from); ?>
            </div>
            <div class="span5" >
                <div class="span6" ><textarea rows="3" cols="80" id="content_head" name="content_head" style="text-transform:none;width:96%"><?php echo $this->_tpl_vars['head1']; ?>
<?php echo $this->_tpl_vars['head']; ?>
</textarea> </div>
                <div class="span6" ><textarea rows="8" cols="62" id="comment_s2" name="comment_s2" style="text-transform:none;"><?php echo $this->_tpl_vars['refualreasonContent']; ?>
</textarea></div>
                <div class="span6" ><textarea rows="5" cols="80" id="content_footer" name="content_footer" style="text-transform:none;width:96%;margin-top:10px">
                        Cordialement,

                        <?php echo ((is_array($_tmp=$this->_tpl_vars['sign'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</textarea> </div>
                <div class="span6" ><textarea rows="8" cols="90" id="content_footerPermanent" name="content_footerPermanent" style="text-transform:none;width:96%;margin-top:10px"><?php echo ((is_array($_tmp=$this->_tpl_vars['footpermanent'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>

                    </textarea> </div>
                <div class="boxcol1 closepop" style="float:right">
                    <!--<input type="hidden" value="yes" name="pop_disapproves2"/>
                    <input type="hidden" value="yes" name="pop_disapproves2_permanent"/>-->
                    <button type="submit" id="pop_disapproves2" name="pop_disapproves2" class="btn btn-danger" >Refuser</button>
                <!--&nbsp;<button type="button" id="pop_disapproves2_permanent" name="pop_disapproves2_permanent"  data-toggle="modal" data-target="#republish" href="/processao/republishpopup?close=no&stage=2&artId=<?php echo $_GET['articleId']; ?>
" class="btn btn-danger">Refuser Definite</button>-->
                &nbsp;<button type="button" id="pop_disapproves2_permanent" name="pop_disapproves2_permanent"  onclick="return validateRefuse('<?php echo $_GET['articleId']; ?>
');" class="btn btn-danger">Refuse Definite</button>
                &nbsp;<button type="button" id="close_pop" name="close_pop" onclick="closeDisapproveBlock();" class="btn btn-info">Close</button> </div>
            <input type="hidden" id="sendtofo" name="sendtofo" value="">
            <input type="hidden" id="anouncebyemail" name="anouncebyemail" value="">
                <!--<input type="hidden" id="pop_disapproves2_permanent_jq" name="pop_disapproves2_permanent" value="yes">-->
                <div id="buttonids"></div>
        </div>
        <input type="hidden" name="pop_partId" id="pop_partId"  />
            <input type="hidden" id="art_id" name="art_id" value="<?php  echo $_GET['articleId']; ?>">
            <input type="hidden" id="hide_total2" name="hide_total2" value="" />
        </div>
</form>
</div> <input type="hidden" id="article_id" name="article_id" value="">
<!--///show the density details ///-->
<div class="modal4 hide fade" id="density">
    <div class="modal-header">
        <button class="close" onclick="closePopup('density');">&times;</button>
        <h3>Density Details</h3>
    </div>
    <div class="modal-body" id="density_body">
    </div>
    <div class="modal-footer">

    </div>
</div>
<!--///show the plagiarism details ///-->
<div class="modal4 hide fade" id="plagiarism">
    <div class="modal-header">
        <button class="close" onclick="closePopup('plagiarism');">&times;</button>
        <h3>Plagiarism Details</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">

    </div>
</div>

<!--///show the plagiarism external results details ///-->
<div class="modal4 hide fade" id="plagexternalresults">
    <div class="modal-header">
        <button  class="close" onclick="closePopup('plagexternalresults');">&times;</button>
        <h3>Details of Plagarism</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">

    </div>
</div>
<!--///when republish the popup comes for edit details and mail for republish article///-->
<div class="modal4 hide fade" id="republish">
    <div class="modal-header">
        <button class="close" onclick="closePopup('republish');">&times;</button>
        <h3>Edit details for republish</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>
<!--///when no template is select for the  refusal the ///-->
<div class="modal4 hide fade" id="notemplate">
    <div class="modal-header">
        <button class="close" onclick="closePopup('notemplate');">&times;</button>
        <h3>No options are selected and send mail to alix</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>
<?php echo '
<script type="text/javascript">

    $(".starmarks").click(function(){
        // var marks = [];
        var marks = 0;
        var marksparreason = [];
        var total = 0;
        $(".starmarks").each(function(i) {
            i = i+1;
            // marks.push($("#precision-target"+i).text());
            var selmarks = Number($("#precision-target"+i).text());
            marks += selmarks;
            marksparreason.push($("#reasonId"+i).val() + "|" +selmarks);

            //marksparreason = $("#reasonId"+i).val() + "|" +selmarks + "," + marksparreason;
            total = i ;
        });
        var avgmarks = ((marks/total)*2);
        $("#givenmarks").html(avgmarks);
        $("#totalmarks").html("/"+(total*2));
        $("#markstotal").val(avgmarks);
        $("#markswithreason").val(marksparreason.join(\',\'));
    });
    $(".disstarmarks").click(function(){
        // var marks = [];
        var marks = 0;
        var marksparreason = [];
        var total = 0;
        $(".disstarmarks").each(function(i) {
            i = i+1;
            // marks.push($("#precision-target"+i).text());
            var selmarks = Number($("#disprecision-target"+i).text());
            marks += selmarks;
            marksparreason.push($("#reasonId"+i).val() + "|" +selmarks);

            //marksparreason = $("#reasonId"+i).val() + "|" +selmarks + "," + marksparreason;
            total = i ;
        });
        var avgmarks = ((marks/total)*2);
        $("#disgivenmarks").html(avgmarks);
        $("#distotalmarks").html("/"+(total*2));
        $("#dismarkstotal").val(avgmarks);
        $("#dismarkswithreason").val(marksparreason.join(\',\'));
    });
</script>
'; ?>

