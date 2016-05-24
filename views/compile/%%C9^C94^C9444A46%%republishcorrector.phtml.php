<?php /* Smarty version 2.6.19, created on 2015-08-24 14:02:14
         compiled from gebo/deliveryongoing/republishcorrector.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/deliveryongoing/republishcorrector.phtml', 348, false),array('modifier', 'utf8_encode', 'gebo/deliveryongoing/republishcorrector.phtml', 348, false),array('modifier', 'stripslashes', 'gebo/deliveryongoing/republishcorrector.phtml', 348, false),)), $this); ?>
<?php echo '
<!--<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/lib/ckeditor/ckeditor.js"></script>-->
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript" >
$(document).ready(function() {
   $("#parttime_option_crt").chosen({ allow_single_deselect: false,search_contains: true  });
   $("#sub_opt_time").chosen({ allow_single_deselect: false,search_contains: true  });
   $("#sub_opt_resub").chosen({ allow_single_deselect: false,search_contains: true  });
  // $("#corrector_lang").chosen({ allow_single_deselect: false,search_contains: true  });
   $(".uni_style").uniform();
    //$(".alert").hide();
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
	var correction_cost = '; ?>
"<?php echo $this->_tpl_vars['article']['proofreading']; ?>
"<?php echo ';
	// Change Price based on Files per pack
	$("#files_pack").keyup(function(){
		var files_pack = $(this).val();
		var max_corrector_price = files_pack*parseFloat(correction_cost);
		$("#price_max").val(max_corrector_price.toFixed(2));
		if(parseFloat($("#price_min").val())>max_corrector_price)
			$("#price_min").val(\'0\');
	})
	
	
});
if (tinymce.getInstanceById(\'mailbody\'))
{
    tinymce.execCommand(\'mceRemoveControl\', true, \'mailbody\');
    loadEditors(\'mailbody\');
}
else  if (!tinymce.getInstanceById(\'mailbody\'))
    loadEditors(\'mailbody\');

var closelmode = "'; ?>
<?php echo $this->_tpl_vars['close']; ?>
<?php echo '";
if(closelmode == \'yes\')
{
    if(tinymce.getInstanceById(\'refusemessage\'))
    {
        tinymce.execCommand(\'mceRemoveControl\', true, \'refusemessage\');
        loadEditors(\'refusemessage\');
    }
    else  if(!tinymce.getInstanceById(\'refusemessage\'))
        loadEditors(\'refusemessage\');

}

function fngetmailcontent(artid)
{
     var commentBox1=$("#mailbody");
     commentBox1.hide();
        if (tinymce.getInstanceById(\'mailbody\'))
        {
            tinymce.execCommand(\'mceRemoveControl\', true, \'mailbody\');
            loadEditors(\'mailbody\');
        }
        else  if (!tinymce.getInstanceById(\'mailbody\'))
            loadEditors(\'mailbody\');

     var parttime_option = $("#parttime_option_crt").val();
     var extend_time = $("#participation_time_crt").val();
     var target_page = "/article-republish/getextendcrtparticipationtime?part_time="+extend_time+"&parttime_option="+parttime_option+"&artid="+artid;
     $.post(target_page, function(data){
         $("#mailbody").html(data);
     });
    // commentBox1.show();
}
///when republish popup will come to upate values
function saveCorrectorRepublishPop() ///when directly republish
{
    var artId = $("#artId").val();
    var title = $("#title").val();
    var correction_selection_time = $("#correction_selection_time").val();
    var files_pack = $("#files_pack").val();
    var crtaotype = $("#crtaotype").val();
    var closerepublish = $("#closerepublish").val();
	var checked = [];
    var checked2 = "";
    $("input[name=\'corrector_list[]\']:checked").each(function ()
    {
        checked.push($(this).val());
		if(checked2)
			checked2 += ","+$(this).val();
		else
			checked2 = $(this).val();
    });
    var stage = $("#stage").val();
    var parttime_option = $("#parttime_option_crt").val();
    var parttime = $("#participation_time_crt").val();
    var suboptparttime = $("#sub_opt_parttime").val();
    var jc0time = $("#subjunior_time").val();
    var jctime =  $("#junior_time").val();
    var sctime = $("#senior_time").val();
    var subopttime = $("#sub_opt_time").val();
    var jcresub = $("#jc_resubmission").val();
    var scresub = $("#sc_resubmission").val();
    var suboptresub = $("#sub_opt_resub").val();
    var object = $("#object").val();
    var message = $("#mailbody").val();
    var refusalmessage =  $("#refusemessage").val();
    var price_min = $("#price_min").val();
    var price_max = $("#price_max").val();
    var crtselectedlang = [];
	$("input[name=\'corrector_lang[]\']").each(function ()
    {
			crtselectedlang.push($(this).val());
	});
    var emailyes =  $("#emailyes").val();
	var sendfrom = $(\'#correctorsendfrom\').val();
    ///validation////
    if(crtaotype == "private")
    {
        if((parttime == \'\')||(price_min == \'\')||(price_min == \'\')||(jctime == \'\')||(sctime == \'\')||(jcresub == \'\')||(scresub == \'\'))
        {
            smoke.alert("please check inputs given");
            return false;
        }
    }
    else
    {
        if((crtselectedlang == null) || (parttime == \'\')||(price_min == \'\')||(price_min == \'\')||(jctime == \'\')||(sctime == \'\')||(jcresub == \'\')||(scresub == \'\'))
        {
            smoke.alert("please check inputs given");
            return false;
        }
    }
    var target_page = "/article-republish/republishcorrectorpopup?artId="+artId+"&save=save&parttime_option="+parttime_option+"&price_min="+price_min+"&price_max="+price_max+"&parttime="+parttime+"&suboptparttime="+suboptparttime+
            "&jctime="+jctime+"&sctime="+sctime+"&subopttime="+subopttime+"&jcresub="+jcresub+"&scresub="+scresub+"&suboptresub="+suboptresub+"&crtselectedlang="+crtselectedlang;
    $.post(target_page,{\'title\':title,\'files_pack\':files_pack,\'correction_selection_time\':correction_selection_time,\'corrector_list\':checked,\'corrector_list_comma\':checked2}, function(data){   //alert(data);
        if($("#nopartsforrepublish").val() == \'yes\')
        {
            alert("Plus personne ne peut participer.");
        }
        if(stage != \'\')   /////////when republish pop up generated in any of stages
        {
            smoke.confirm("L\\\'article sera remis en ligne",function(e){
                if(e)
                {
                    //$("#commentsCrtRefuseObject").val(object);
                    $("#commentsCrtRefuse").val(refusalmessage);
                    smoke.confirm("PREVENIR PAR EMAIL",function(e2){
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
            smoke.confirm("L\\\'article sera remis en ligne",function(e){
                if (e)
                {
                    smoke.confirm("PREVENIR PAR EMAIL",function(e){
                        if (e)
                        {
                            if(closerepublish == \'yes\')
                                window.location.href = "/article-republish/publishcrtarticlefo?art_id="+artId+"&crtselectedlang="+crtselectedlang+"&sendmail=yes&sendrefusalmail=yes&refusalmailcontent="+escape(refusalmessage)+"&republishmail="+escape(message)+"&republishsubject="+object+"&sendfrom="+sendfrom;
                            else
                                window.location.href = "/article-republish/publishcrtarticlefo?art_id="+artId+"&crtselectedlang="+crtselectedlang+"&sendmail=yes&republishmail="+escape(message)+"&republishsubject="+object+"&sendfrom="+sendfrom;
                        }
                        else
                        {
                            if(closerepublish == \'yes\')
                                window.location.href = "/article-republish/publishcrtarticlefo?art_id="+artId+"&crtselectedlang="+crtselectedlang+"&sendmail=yes&sendrefusalmail=yes&refusalmailcontent="+escape(refusalmessage)+"&republishmail="+escape(message)+"&republishsubject="+object+"&sendfrom="+sendfrom;
                            else
                                window.location.href = "/article-republish/publishcrtarticlefo?art_id="+artId+"&sendmail=no";
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


	<input id="nopartsforrepublish" name="nopartsforrepublish" value="<?php echo $this->_tpl_vars['nopartsforrepublish']; ?>
" type="hidden">
<!--<input id="mailcontent" name="mailcontent" value="<?php echo $this->_tpl_vars['message']; ?>
" type="hidden">
<input id="refusemailcontent" name="refusemailcontent" value="<?php echo $this->_tpl_vars['refusemessage']; ?>
" type="hidden">
--><input id="closerepublish" name="closerepublish" value="<?php echo $this->_tpl_vars['close']; ?>
" type="hidden">
<input id="crtaotype" name="crtaotype" value="<?php echo $this->_tpl_vars['article']['dcorrection_type']; ?>
" type="hidden">
<input id="stage" name="stage" value="<?php echo $this->_tpl_vars['stage']; ?>
" type="hidden">

<h3 class="pull-center pointer topset2">
<?php if ($this->_tpl_vars['article']['writer_bid_details'] | @ count > 0 || $this->_tpl_vars['article']['corrector_bid_details'] | @ count > 0): ?>
	<?php if ($this->_tpl_vars['article']['writer_bid_details'] | @ count > 0): ?>
	<?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out'): ?>
		<?php if (( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' && $this->_tpl_vars['article']['writer_bid_details'][0]['article_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out' )): ?>
			<label class="label label-important">Cet article n&rsquo;a pas &eacute;t&eacute; envoy&eacute; par le r&eacute;dacteur s&eacute;lectionn&eacute;</label>
		<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved'): ?>
		Cet article est actuellement en <a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
">
			<label class="label label-info">reprise r&eacute;dacteur</label>
			</a>
		<?php else: ?>
		Cet article est actuellement en 
			<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
">
			<label class="label label-info">
					<?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out'): ?>
					r&eacute;daction <?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['latest_cycle'] > 1): ?>(<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['latest_cycle']; ?>
) <?php endif; ?>
											<?php endif; ?>
			</label>
			</a>
		<?php endif; ?>
	<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'plag_exec' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage0'): ?>
	Cet article est actuellement en 
	<a href="/proofread/stage-articles?submenuId=ML3-SL11&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">phase plagiat</label></a>
	<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage1'): ?>
	Cet article est actuellement en
	<a href="/proofread/stage-deliveries?submenuId=ML3-SL2"><label class="label label-info">correction interne (S1)</label></a>
	<br>
	<?php elseif ($this->_tpl_vars['article']['correction'] == 'yes' && $this->_tpl_vars['article']['correction_type'] == 'extern' && $this->_tpl_vars['article']['totalCorrectionParticipations']): ?>
		Cet article est actuellement en <a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="Correcteur">phase de s&eacute;lection</span></a>
	<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage2' && $this->_tpl_vars['article']['corrector_bid_details'][0]['current_stage'] != 'stage2'): ?>
	Cet article est actuellement en
	<a href="/proofread/stage-deliveries?submenuId=ML3-SL3"><label class="label label-info">phase finale (S2)</label></a>
	<br>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['article']['corrector_bid_details'] | @ count > 0): ?>
	<?php if (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' )): ?>

	<?php if (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' && $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'time_out' )): ?>
			<?php else: ?>
	Cet article est actuellement en
		<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
">
			<label class="label label-info">
				<?php if ($this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid'): ?>
				cours de Correction externe <?php if ($this->_tpl_vars['article']['corrector_bid_details'][0]['latest_cycle'] > 1): ?>(<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['latest_cycle']; ?>
) <?php endif; ?>
				<?php else: ?>
				non envoy&eacute;
				<?php endif; ?>
			</label>
		</a>
		<br>
	<?php endif; ?>
	<?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved_temp' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'closed_temp' )): ?>
	Cet article est actuellement en
	<a href="/correction/moderation?submenuId=ML3-SL10"><label class="label label-info">cours de reprise de correction externe</label></a>
	<br>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['article']['participation_expires'] < time() && $this->_tpl_vars['article']['totalParticipations'] > 0 && ! $this->_tpl_vars['article']['writerParticipation']): ?>
	Cet article est actuellement en<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="R&eacute;dacteur">phase de s&eacute;lection</span></a>
<?php elseif ($this->_tpl_vars['article']['correction_participationexpires'] < time() && $this->_tpl_vars['article']['totalCorrectionParticipations'] > 0 && ! $this->_tpl_vars['article']['correctorParticipation']): ?>
	Cet article est actuellement en <a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="Correcteur">phase de s&eacute;lection</span></a>
<?php endif; ?>
</h3>	
<br>
<form class="form-horizontal form_validation_ttip" >
<fieldset>
	<div class="control-group formSep">
		<label class="control-label">Titre de l&rsquo;article<span class="f_req">*</span></label>
		<div class="controls">
			<span><input type="text" name="title" style="text-transform: none;" id="title" class="input-xlarge" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" /></span>
		</div>
	</div>
	<div class="control-group formSep">
        <label class="control-label">  Fourchette de prix pour la correction :</label>
        <div class="controls form-inline">
            min : <input id="price_min" name="price_min" type="text"  value="<?php echo $this->_tpl_vars['article']['correction_pricemin']; ?>
"/>
            max : <input id="price_max" name="price_max" type="text"  value="<?php echo $this->_tpl_vars['article']['correction_pricemax']; ?>
"/>
        </div>
    </div>
    <div class="control-group formSep">
        <label class="control-label">D&eacute;lai du timing de participation pour la correction :</label>
        <div class="controls form-inline">
            <span style="vertical-align:top;"><input id="participation_time_crt" name="participation_time_crt" type="text" value="<?php echo $this->_tpl_vars['article']['correction_participation']; ?>
" onkeyup="fngetmailcontent('<?php echo $this->_tpl_vars['article']['id']; ?>
');"/></span>
            <select name="parttime_option_crt" id="parttime_option_crt" onchange="fngetmailcontent('<?php echo $this->_tpl_vars['article']['id']; ?>
');">
                <option value="min" selected="">Minute(s)</option>
                <option value="hour">Heure(s)</option>
                <option value="day">Jour(s)</option>
            </select>
        </div>
    </div>
	<div class="control-group formSep">
		<label  class="control-label">D&eacute;lai du timing de s&eacute;lection du correcteur<span class="f_req">*</span></label>
		<div class="controls">
			<span><input type="text" name="correction_selection_time" id="correction_selection_time" <?php if ($this->_tpl_vars['article']['correction_participationexpires'] > time() || $this->_tpl_vars['article']['corrector_selection']): ?>disabled<?php endif; ?> class="span2" value="<?php if ($this->_tpl_vars['article']['correction_selection_time']): ?><?php echo $this->_tpl_vars['article']['correction_selection_time']; ?>
<?php else: ?>60<?php endif; ?>"  /></span> mins 					
		</div>
	</div>
	<div class="control-group formSep">		
		<label class="control-label">#Fichiers / Pack<span class="f_req">*</span></label>
		<div class="controls">
			<input type="text" name="files_pack" id="files_pack" class="span2 integer" value="<?php echo $this->_tpl_vars['article']['files_pack']; ?>
" <?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> readonly <?php endif; ?>  />
		</div>
	</div>
    <div class="control-group formSep">
        <label class="control-label">D&eacute;lai d'envoi de l&rsquo;article pour le correcteur :</label>
        <div class="controls form-inline">
            <span style="vertical-align:top;">JC <input id="junior_time" name="junior_time" type="text" value="<?php echo $this->_tpl_vars['article']['correction_jc_submission']; ?>
" class="span1"/></span>&nbsp;
            <span style="vertical-align:top;">SC <input id="senior_time" name="senior_time" type="text"  value="<?php echo $this->_tpl_vars['article']['correction_sc_submission']; ?>
" class="span1"/></span>&nbsp;
            <select name="sub_opt_time" id="sub_opt_time" class="span2">
                <option value="min" <?php if ($this->_tpl_vars['article']['correction_submit_option'] == 'min'): ?>selected="selected"<?php endif; ?>>Minute(s)</option>
                <option value="hour" <?php if ($this->_tpl_vars['article']['correction_submit_option'] == 'hour'): ?>selected="selected"<?php endif; ?>>Heure(s)</option>
                <option value="day" <?php if ($this->_tpl_vars['article']['correction_submit_option'] == 'day'): ?>selected="selected"<?php endif; ?>>Jour(s)</option>
            </select>
        </div>
    </div>
    <div class="control-group formSep">
        <label class="control-label">D&eacute;lai de renvoi de l&rsquo;article pour le correcteur :</label>
        <div class="controls form-inline">
            <span style="vertical-align:top;">JC <input id="jc_resubmission" name="jc_resubmission" type="text" class="span1 uni_style" value="<?php echo $this->_tpl_vars['article']['correction_jc_resubmission']; ?>
"/></span>&nbsp;
            <span style="vertical-align:top;">SC <input id="sc_resubmission" name="sc_resubmission" type="text" class="span1 uni_style" value="<?php echo $this->_tpl_vars['article']['correction_sc_resubmission']; ?>
"/></span>&nbsp;
            <select name="sub_opt_resub" id="sub_opt_resub" class="span2">
                <option value="min" <?php if ($this->_tpl_vars['article']['correction_resubmit_option'] == 'min'): ?>selected="selected"<?php endif; ?>>Minute(s)</option>
                <option value="hour" <?php if ($this->_tpl_vars['article']['correction_resubmit_option'] == 'hour'): ?>selected="selected"<?php endif; ?>>Heure(s)</option>
                <option value="day" <?php if ($this->_tpl_vars['article']['correction_resubmit_option'] == 'day'): ?>selected="selected"<?php endif; ?>>Jour(s)</option>
            </select>
        </div>
    </div>
	<div class="control-group formSep">
		<label class="control-label">Type de correcteurs<span class="f_req">*</span></label>
		<div class="controls form-inline">
			<label class="uni-radio">
				<input type="checkbox" value="sc"  name="corrector_list[]" class="uni_style" <?php if ($this->_tpl_vars['article']['corrector_list'] == 'CB' || $this->_tpl_vars['article']['corrector_list'] == 'CSC'): ?>checked<?php endif; ?> <?php if ($this->_tpl_vars['article']['correction_participationexpires'] > time() || $this->_tpl_vars['article']['corrector_selection']): ?>disabled<?php endif; ?> />
				Senior 
			</label>
			<label class="uni-radio">
				<input type="checkbox" value="jc" name="corrector_list[]" class="uni_style" <?php if ($this->_tpl_vars['article']['corrector_list'] == 'CB' || $this->_tpl_vars['article']['corrector_list'] == 'CJC'): ?>checked<?php endif; ?> <?php if ($this->_tpl_vars['article']['correction_participationexpires'] > time() || $this->_tpl_vars['article']['corrector_selection']): ?>disabled<?php endif; ?> />
				Junior 
			</label>											
		</div>
		<?php if ($this->_tpl_vars['article']['dcorrection_type'] == 'private'): ?>
		<div class="controls form-inline" id="contribs">
			
		</div>
		<?php endif; ?>
	</div> 
		<input type="hidden" id="corrector_lang" name="corrector_lang[]" value="<?php echo $this->_tpl_vars['article']['language']; ?>
" />
    <div class="control-group formSep">
        <label class="control-label">Objet de l'email :</label>
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
        <input id="artId" name="artId" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" type="hidden"/>
        <td colspan="5"><button type="button" id="republish" name="republish" class="btn btn-danger" onclick="saveCorrectorRepublishPop();" >Re-publier</button></td>
    </tr>
</table>
