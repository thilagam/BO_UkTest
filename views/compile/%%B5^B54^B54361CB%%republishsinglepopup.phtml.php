<?php /* Smarty version 2.6.19, created on 2016-01-12 08:41:23
         compiled from gebo/deliveryongoing/republishsinglepopup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/deliveryongoing/republishsinglepopup.phtml', 465, false),array('modifier', 'utf8_encode', 'gebo/deliveryongoing/republishsinglepopup.phtml', 465, false),array('modifier', 'stripslashes', 'gebo/deliveryongoing/republishsinglepopup.phtml', 465, false),array('function', 'html_options', 'gebo/deliveryongoing/republishsinglepopup.phtml', 554, false),)), $this); ?>
<?php echo '
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript" >
var lang = '; ?>
"<?php echo $this->_tpl_vars['article']['language']; ?>
"<?php echo ';
var writing_cost = '; ?>
"<?php echo $this->_tpl_vars['article']['writing']; ?>
"<?php echo ';
$(document).ready(function() {
    $("#parttime_option").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#sub_opt_time").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#sub_opt_resub").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#privcontrib").chosen();
    $(".uni_style").uniform();
    $("#favcontribcheck").chosen();
    //$("#contrib_cat").chosen();
   // $("#contrib_lang").chosen();
    $(\'.table textarea\').tinymce({
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
    updatedContribList($("#artId").val());
	
	if($("#aotype").val()==\'private\')
	{
		var checked = "";
		$("input[name=\'contribtype[]\']:checked").each(function ()
		{
			if(checked)
			checked += ","+$(this).val();
			else
			checked = $(this).val();
		});
		
		//$.post(\'/article-republish/loaduserslist\',{\'artId\':$("#artId").val(),\'type\':checked,\'language\':lang,\'category\':\'\'},function(data){alert(data);$("#contribs").html(data);});
	}
	
	// Change Price based on Files per pack
	$("#files_pack").keyup(function(){
		var files_pack = $(this).val();
		var max_writer_price = files_pack*parseFloat(writing_cost);	
		$("#price_max").val(max_writer_price.toFixed(2));
		if(parseFloat($("#price_min").val())>max_writer_price)
			$("#price_min").val(\'0\');
	})
	
});
///when republish popup will come to upate values
function saveRepublishPop() ///when directly republish
{
    var artId = $("#artId").val();
    var aotype = $("#aotype").val();
    var selectedcontribs = $("#favcontribcheck").val();
    var sendmailtoonlysc = $(\'#sendmailtoonlysc\').is(":checked") ;
    var fbpost = $("#fbpost").val();
    var price_min = $("#price_min").val();
    var price_max = $("#price_max").val();
    var checked = [];
    var checked2 = "";
    $("input[name=\'contribtype[]\']:checked").each(function ()
    {
        checked.push($(this).val());
		if(checked2)
			checked2 += ","+$(this).val();
		else
			checked2 = $(this).val();
    });
    var stage = $("#stage").val();
    var parttime_option = $("#parttime_option").val();
    var parttime = $("#participation_time").val();
    var suboptparttime = $("#sub_opt_parttime").val();
    var jc0time = $("#subjunior_time").val();
    var jctime =  $("#junior_time").val();
    var sctime = $("#senior_time").val();
    var subopttime = $("#sub_opt_time").val();
    var jc0resub = $("#jc0_resubmission").val();
    var jcresub = $("#jc_resubmission").val();
    var scresub = $("#sc_resubmission").val();
    var suboptresub = $("#sub_opt_resub").val();
    var fbcomments = $("#fbcomments").val();
    var scobject = $("#scobject").val();
    var pubselectedlang = $("#contrib_lang").val();
    if(aotype == "private"){
        var allobject = $("#allobject").val();
        var allmessage = tinyMCE.get(\'allmailbody\').getContent();  }
    var scmessage = tinyMCE.get(\'scmailbody\').getContent();
    var anouncebymail = $(\'#anouncebymail\').is(":checked") ;
    var sendfrom = $(\'#sendfrom\').val();
    var contrib_lang = $(\'#contrib_lang\').val();
	
    if($("#refusemail2").val() == \'yes\')
    {
        var refusalmessage = tinyMCE.get(\'refusemessage\').getContent();
        var sendrefusalmail = "yes";
    }
    ///validation////
    if(aotype == "private")
    {
        if(($("#maillimit").val()>6000)||(parttime == \'\')||(selectedcontribs == null)||(jc0time == \'\')||(jctime == \'\')||(sctime == \'\')||(jc0resub == \'\')||(jcresub == \'\')||(scresub == \'\'))
        {
            smoke.alert("please check limit of 60 exceed OR other inputs");
            return false;
        }
    }
    else
    {
        if((parttime == \'\')||(jc0time == \'\')||(jctime == \'\')||(sctime == \'\')||(jc0resub == \'\')||(jcresub == \'\')||(scresub == \'\') || (contrib_lang==null))
        {
            smoke.alert("please check inputs given");
            return false;
        }
    }
    //alert(checked);
    var params = {artId:artId, save:\'save\',parttime_option:parttime_option,aotype:aotype,view_to:checked,viewto:checked2,pubselectedlang:pubselectedlang,selectedcontribs:selectedcontribs,price_min:price_min,price_max:price_max,fbcomments:fbcomments, parttime:parttime, suboptparttime:suboptparttime, jc0time:jc0time, sendmailtoonlysc:sendmailtoonlysc,jctime:jctime,sctime:sctime, subopttime:subopttime,jc0resub:jc0resub,jcresub:jcresub, scresub:scresub, suboptresub:suboptresub,scobject:scobject, allobject:allobject, scmessage:scmessage,allmessage:allmessage,\'selection_time\':$("#selection_time").val(),\'title\':$("#title").val(),\'files_pack\':$("#files_pack").val()}
    $.post(\'/article-republish/republishpopup\',params, function(data){ 
        if($("#nopartsforrepublish").val() == \'yes\')
        {
            alert("Plus personne ne peut participer.");
        }
        if(stage != \'\')   /////////when republish pop up generated in any of stages
        {
            smoke.confirm("L\\\'article sera remis en ligne",function(e){
                if(e)
                {
                    $("#sendtofo").val(\'yes\');
                    $("#crtsendtofo").val(\'yes\');
                    $("#disapprove"+stage+"form").submit();
                    return true;
                }
                else
                {
                    $("#sendtofo").val(\'no\');
                    $("#crtsendtofo").val(\'no\');
                    $("#disapprove"+stage+"form").submit();
                    return true;
                }
            });
        }
        else      /////////when republish pop up generated in selection profile related pages
        {
            smoke.confirm("L\\\'article sera remis en ligne",function(e){
                if (e)
                {
                    var params2 = {artId:artId,aoType:aotype,sendtofo:\'yes\',sendrefusalmail:sendrefusalmail,scobject:scobject,
                                 fbpost:fbpost,pubselectedlang:pubselectedlang,sendmailtousertype:checked,sendmailtoonlysc:sendmailtoonlysc,
                                 selectedcontribs:selectedcontribs,allobject:allobject,anouncebymail:anouncebymail,scmessage:scmessage,
                                 allmessage:allmessage,refusalmailcontent:refusalmessage,sendfrom:sendfrom}
                    $.post(\'/article-republish/publisharticlefo\',params2, function(data){ 
                        data1 = $.trim(data);
                        if(data1 == \'ok\')
                            window.location.reload();
                    });
                }
                else
                {
                    window.location.href = "/article-republish/publisharticlefo?artId="+artId+"&aoType="+aotype+"&sendtofo=no&sendrefusalmail="+sendrefusalmail+"&refusalmailcontent="+escape(refusalmessage);
                }
            });
        }
    });
}

if (tinymce.getInstanceById(\'scmailbody\'))
{
    tinymce.execCommand(\'mceRemoveControl\', true, \'scmailbody\');
    loadEditors(\'scmailbody\');
}
else  if (!tinymce.getInstanceById(\'scmailbody\'))
    loadEditors(\'scmailbody\');


if(tinymce.getInstanceById(\'allmailbody\'))
{
    tinymce.execCommand(\'mceRemoveControl\', true, \'allmailbody\');
    loadEditors(\'allmailbody\');
}
else  if(!tinymce.getInstanceById(\'allmailbody\'))
    loadEditors(\'allmailbody\');

if(tinymce.getInstanceById(\'refusemessage\'))
{
    tinymce.execCommand(\'mceRemoveControl\', true, \'refusemessage\');
    loadEditors(\'refusemessage\');
}
else  if(!tinymce.getInstanceById(\'refusemessage\'))
    loadEditors(\'refusemessage\');

function changeMailByContribType()
{
    $(\'#scmailbody\').html(data);
    var artid = $("#artId").val();
    var checkedcontribs = [];
    $("input[name=\'contribtype[]\']:checked").each(function ()
    {
        checkedcontribs.push($(this).val());
    });
    var res = $.trim(checkedcontribs);
    if(res == "senior")
        var result =  "onlysc";
    else
        var result =  "all";
    if (tinymce.getInstanceById(\'scmailbody\'))
    {
        tinymce.execCommand(\'mceRemoveControl\', true, \'scmailbody\');
        loadEditors(\'scmailbody\');
    }
    else  if (!tinymce.getInstanceById(\'scmailbody\'))
        loadEditors(\'scmailbody\');
    var parttime_option = $("#parttime_option").val();
    var extend_time = $("#participation_time").val();
    var target_page = "/republish/changepublicmail?part_time="+extend_time+"&parttime_option="+parttime_option+"&artId="+artid+"&contribtype="+result;
    $.get(target_page, function(data){  
        var mailcontent = data.split("*");
        $("#scmailbody").html(mailcontent[0]);
        $("#scobject").val(mailcontent[1]);
    });
}
function fngetmailcontent()
{
    var artname = $("#artId").val();
    var aotype = $("#aotype").val();
    var onlyscmail = $(\'#sendmailtoonlysc\').is(":checked") ;
    var scCount = $("#sc_count").val();
    if(aotype == \'private\')
    {
        if(tinymce.getInstanceById(\'allmailbody\'))
        {
            tinymce.execCommand(\'mceRemoveControl\', true, \'allmailbody\');
            loadEditors(\'allmailbody\');
        }
        else  if(!tinymce.getInstanceById(\'allmailbody\'))
            loadEditors(\'allmailbody\');
    }
    if (tinymce.getInstanceById(\'scmailbody\'))
    {
        tinymce.execCommand(\'mceRemoveControl\', true, \'scmailbody\');
        loadEditors(\'scmailbody\');
    }
    else  if (!tinymce.getInstanceById(\'scmailbody\'))
        loadEditors(\'scmailbody\');
    var checkedcontribs = [];
    $("input[name=\'contribtype[]\']:checked").each(function ()
    {
        checkedcontribs.push($(this).val());
    });
    var selectedcontribs = $("#favcontribcheck").val();
    var parttime_option = $("#parttime_option").val();
    var extend_time = $("#participation_time").val();
    var target_page = "/article-republish/getdynamicselectedcontribs?part_time="+extend_time+"&parttime_option="+parttime_option+"&selectedcontribs="+selectedcontribs+"&artname="+artname+"&onlyscmail="+onlyscmail+"&checkedcontribs="+checkedcontribs+"&scCount="+scCount;
    $.post(target_page, function(data){  
        if(aotype == "private"){
            var mailcontent = data.split("*");
            $(\'#scmailbody\').html(mailcontent[0]);
			$(\'#allmailbody\').html(mailcontent[1]);
            $(\'#mailsenduserscount\').html("("+mailcontent[2]+" contributeurs pourront participer)");
        }
        else
        {
            $(\'#scmailbody\').html(data);
        }
    });
}
function showFbPost()
{
    if($(\'#fbpost\').is(\':checked\'))  {
        $(\'#fbpostcomments\').show();   }
    else {
        $(\'#fbpostcomments\').hide();   }
}
//get all contributor based on the type, lang, cat//////
function publicAoContribList(artId)
{
    var contribtype = $("input[name=\'contribtype[]\']:checked").map(function () {return this.value;}).get().join("\',\'");
    var cat="";
    var lang="";
    lang= $.trim(lang);
    $.ajax({
        type: \'GET\',
        url: \'/republish/loadpublicaouserslist\',
        data: \'type=\' + contribtype+\'&category=\'+cat+\'&language=\'+lang+"&artId="+artId,
        success: function(data)
        {         //alert(data);
            var content = data.split("*");
            if($("#aotype").val() == "private" && content[1] > 6000)
                smoke.alert("The limit of 60 is exceeded");
            $(\'#pubcontribslist\').val(content[0]);
            $(\'#mailsenduserscount\').html("("+content[1]+" contributeurs pourront participer)");
            $(\'#maillimit\').val(content[1]);
        }
    });
}

function privateAoContribList()
{
    var selectedcontribs = $("#favcontribcheck").val();
    if(selectedcontribs)
    {
        $(\'#mailsenduserscount\').html("("+selectedcontribs.length+" contributeurs pourront participer)");
        $(\'#maillimit\').val(selectedcontribs.length);
    }
    else
    {
        $(\'#mailsenduserscount\').html("(0 contributeurs pourront participer)");
        $(\'#maillimit\').val(0);
    }

}
//get all contributor based on the type, lang, cat//////
function changeContribCount($artid)
{
    var langselected = [];
    $(\'#contrib_lang option:selected\').each(function(){
        langselected.push($(this).val());
    });
    var target_page = "/republish/changecontribcount?langs="+langselected+"&artId="+$artid;
    $.post(target_page, function(data){ //alert(data);
        var obj = $.parseJSON(data);
        if(obj[0] == 0) $("#contribtype1").prop(\'checked\',false); else $("#contribtype1").prop(\'checked\',true);
        if(obj[1] == 0) $("#contribtype2").prop(\'checked\',false); else $("#contribtype2").prop(\'checked\',true);
        if(obj[2] == 0) $("#contribtype3").prop(\'checked\',false); else $("#contribtype3").prop(\'checked\',true);

        $("#sclcount").text(obj[0]);
        $("#jclcount").text(obj[1]);
        $("#jc0lcount").text(obj[2]);
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

	.pointer a label
	{
		cursor:pointer;
	}

</style>
'; ?>


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
<form class="form-horizontal form_validation_ttip topset2" method="post" action="/article-republish/saverepublish" >
	<input type="hidden" id="nopartsforrepublish" name="nopartsforrepublish" value="<?php echo $this->_tpl_vars['nopartsforrepublish']; ?>
" >
	<input id="stage" name="stage" value="<?php echo $this->_tpl_vars['stage']; ?>
" type="hidden">
    <fieldset>
		<div class="control-group formSep">
			<label class="control-label">Article title<span class="f_req">*</span></label>
			<div class="controls">
				<span><input type="text" name="title" style="text-transform: none;" id="title" class="input-xlarge" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" /></span>
			</div>
		</div>
		<div class="control-group formSep">
			<label class="control-label">Price range
			<span class="f_req">*</span></label>
			<div class="controls">
				<span style="vertical-align:top"><input type="text" placeholder="Min" value="<?php echo $this->_tpl_vars['article']['price_min']; ?>
" id="price_min" name="price_min" class="span2 number" 
				<?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> disabled <?php endif; ?> 
				/></span>
				<span style="vertical-align:middle"><input type="text" placeholder="Max" value="<?php echo $this->_tpl_vars['article']['price_max']; ?>
" <?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> disabled <?php endif; ?> id="price_max" name="price_max" class="span2 number"/></span>
				<span style="vertical-align:middle">&<?php echo $this->_tpl_vars['article']['currency']; ?>
;</span>
			</div>
		</div>
		<div class="control-group formSep">
            <label class="control-label">Bidding time :</label>
            <div class="controls form-inline">
                <span style="vertical-align:top;"><input id="participation_time" name="participation_time" type="text" value="<?php echo $this->_tpl_vars['artdeldetails'][0]['participation_time']; ?>
" onkeyup="fngetmailcontent();"/></span>
                <select name="parttime_option" id="parttime_option" onchange="fngetmailcontent();">
                    <option value="min" selected="">Minute(s)</option>
                    <option value="hour">Hour(s)</option>
                    <option value="day">Day(s)</option>
                </select>
            </div>
        </div>
		<div class="control-group formSep">
			<label  class="control-label">Time to select the participants<span class="f_req">*</span></label>
			<div class="controls">
				<span><input type="text" name="selection_time" id="selection_time" class="span2" value="<?php echo $this->_tpl_vars['article']['selection_time']; ?>
" <?php if ($this->_tpl_vars['article']['participation_expires'] > time() || $this->_tpl_vars['article']['writer_selection']): ?>disabled<?php endif; ?>  /></span> mins 					
			</div>
		</div>
		<div class="control-group formSep">		
			<label class="control-label">#Files / Pack<span class="f_req">*</span></label>
			<div class="controls">
				<input type="text" name="files_pack" id="files_pack" class="span2 integer" value="<?php echo $this->_tpl_vars['article']['files_pack']; ?>
" <?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> readonly <?php endif; ?>  />
			</div>
		</div>
        <div class="control-group formSep">
            <label class="control-label">Writing timing :</label>
            <div class="controls form-inline">
                <?php if ($this->_tpl_vars['article']['product'] != 'translation'): ?>
				<span style="vertical-align:top;">JC0 <input id="subjunior_time" name="subjunior_time" type="text" value="<?php echo $this->_tpl_vars['artdeldetails'][0]['subjunior_time']; ?>
" class="span1"/></span>
				<?php endif; ?>
                <span style="vertical-align:top;">JC <input id="junior_time" name="junior_time" type="text" value="<?php echo $this->_tpl_vars['artdeldetails'][0]['junior_time']; ?>
" class="span1"/></span>&nbsp;
                <span style="vertical-align:top;">SC <input id="senior_time" name="senior_time" type="text"  value="<?php echo $this->_tpl_vars['artdeldetails'][0]['senior_time']; ?>
" class="span1"/></span>&nbsp;
                <select name="sub_opt_time" id="sub_opt_time" class="span2">
                    <option value="min" <?php if ($this->_tpl_vars['artdeldetails'][0]['submit_option'] == 'mim'): ?>selected="selected"<?php endif; ?>>Minute(s)</option>
                    <option value="hour" <?php if ($this->_tpl_vars['artdeldetails'][0]['submit_option'] == 'hour'): ?>selected="selected"<?php endif; ?>>Hour(s)</option>
                    <option value="day" <?php if ($this->_tpl_vars['artdeldetails'][0]['submit_option'] == 'day'): ?>selected="selected"<?php endif; ?>>Day(s)</option>
                </select>
            </div>
        </div>
        <div class="control-group formSep">
            <label class="control-label">Resubmit after refusal timing :</label>
            <div class="controls form-inline">
				<?php if ($this->_tpl_vars['article']['product'] != 'translation'): ?>
                <span style="vertical-align:top;">JC0 <input id="jc0_resubmission" name="jc0_resubmission" type="text" class="span1" value="<?php echo $this->_tpl_vars['artdeldetails'][0]['jc0_resubmission']; ?>
"/></span>
				<?php endif; ?>
                <span style="vertical-align:top;">JC <input id="jc_resubmission" name="jc_resubmission" type="text" class="span1" value="<?php echo $this->_tpl_vars['artdeldetails'][0]['jc_resubmission']; ?>
"/></span>&nbsp;
                <span style="vertical-align:top;">SC <input id="sc_resubmission" name="sc_resubmission" type="text" class="span1" value="<?php echo $this->_tpl_vars['artdeldetails'][0]['sc_resubmission']; ?>
"/></span>&nbsp;
                <select name="sub_opt_resub" id="sub_opt_resub" class="span2">
                    <option value="min" <?php if ($this->_tpl_vars['artdeldetails'][0]['resubmit_option'] == 'mim'): ?>selected="selected"<?php endif; ?>>Minute(s)</option>
                    <option value="hour" <?php if ($this->_tpl_vars['artdeldetails'][0]['resubmit_option'] == 'hour'): ?>selected="selected"<?php endif; ?>>Hour(s)</option>
                    <option value="day" <?php if ($this->_tpl_vars['artdeldetails'][0]['resubmit_option'] == 'day'): ?>selected="selected"<?php endif; ?>>Day(s)</option>
                </select>
            </div>
        </div>
        <?php if ($this->_tpl_vars['aotype'] == 'private'): ?>
        <input id="sc_count" name="sc_count" value="<?php echo $this->_tpl_vars['sc_count']; ?>
" type="hidden"/>
        <div class="control-group formSep" id="privateaoset">
           <label class="control-label">Contributor type:</label>
            <div class="controls form-inline">
                <label class="uni-checkbox">
                    <input type="checkbox" id="contribtype1" name="contribtype[]"  value="senior" <?php if ($this->_tpl_vars['sc'] == 'yes'): ?> checked <?php endif; ?> class="uni_style" onClick="updatedContribList('<?php echo $this->_tpl_vars['article']['id']; ?>
');" />SC <b>(<?php echo $this->_tpl_vars['sc_count']; ?>
)</b> </label>
                <label class="uni-checkbox">
                    <input type="checkbox" id="contribtype2" name="contribtype[]"  value="junior" <?php if ($this->_tpl_vars['jc'] == 'yes'): ?> checked <?php endif; ?> class="uni_style" onClick="updatedContribList('<?php echo $this->_tpl_vars['article']['id']; ?>
');" />JC  <b>(<?php echo $this->_tpl_vars['jc_count']; ?>
)</b></label>
                <?php if ($this->_tpl_vars['article']['product'] != 'translation'): ?>
				<label class="uni-checkbox">
                    <input type="checkbox"  id="contribtype3" name="contribtype[]"  value="sub-junior" <?php if ($this->_tpl_vars['jc0'] == 'yes'): ?> checked <?php endif; ?> class="uni_style" onClick="updatedContribList('<?php echo $this->_tpl_vars['article']['id']; ?>
');" />SUB JUNIOR <b>(<?php echo $this->_tpl_vars['jc0_count']; ?>
)</b>
				</label>
				<?php endif; ?>
            </div>
			<div class="controls form-inline">
                <select name="contrib_lang[]" id="contrib_lang" style="display:none" onChange="updatedContribList('<?php echo $this->_tpl_vars['article']['id']; ?>
');" data-placeholder="select language" multiple="multiple" style="width:250px;">
                    <?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
                    <option value="<?php echo $this->_tpl_vars['langkey']; ?>
" <?php if ($this->_tpl_vars['langkey'] == $this->_tpl_vars['article']['language']): ?> selected <?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['langitem'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
                <select name="contrib_cat" id="contrib_cat" style="width:250px;display:none" onChange="updatedContribList('<?php echo $this->_tpl_vars['article']['id']; ?>
')">
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['Contrib_cats'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)),'selected' => $this->_tpl_vars['contrib_cat']), $this);?>

                </select>
            </div> 
            <div class="controls form-inline" id="contribs">
                <select name="favcontribcheck[]" id="favcontribcheck" multiple="multiple" onchange="fngetmailcontent();">
                    <?php $_from = $this->_tpl_vars['contriblistall1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contrib']):
?>
                    <?php if (in_array ( $this->_tpl_vars['contrib']['identifier'] , $this->_tpl_vars['contrib_array'] )): ?>
                    <option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
" selected><?php echo $this->_tpl_vars['contrib']['name']; ?>
</option>
                    <?php else: ?>
                    <option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
"><?php echo $this->_tpl_vars['contrib']['name']; ?>
</option>
                    <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
                <div id="favcontrib_err" style="color:red;"></div>
            </div>
        </div>
        <?php else: ?>
        <div class="control-group formSep" id="publicaoset">
            <label class="control-label">Contributor type:</label>
            <div class="controls form-inline">
                <label class="uni-checkbox2">
                    <input type="checkbox" id="contribtype1" name="contribtype[]" onclick="changeMailByContribType();publicAoContribList('<?php echo $this->_tpl_vars['artdeldetails'][0]['artId']; ?>
');" value="senior" <?php if ($this->_tpl_vars['sc'] == 'yes'): ?> checked <?php endif; ?> class="uni_style"   />SC 				</label>
                <label class="uni-checkbox2">
                    <input type="checkbox" id="contribtype2" name="contribtype[]" onclick="changeMailByContribType();publicAoContribList('<?php echo $this->_tpl_vars['artdeldetails'][0]['artId']; ?>
');" value="junior" <?php if ($this->_tpl_vars['jc'] == 'yes'): ?> checked <?php endif; ?> class="uni_style"  />JC 				</label>
				<?php if ($this->_tpl_vars['article']['product'] != 'translation'): ?>
                <label class="uni-checkbox2">
                    <input type="checkbox"  id="contribtype3" name="contribtype[]" onclick="changeMailByContribType();publicAoContribList('<?php echo $this->_tpl_vars['artdeldetails'][0]['artId']; ?>
');" value="sub-junior" <?php if ($this->_tpl_vars['jc0'] == 'yes'): ?> checked <?php endif; ?> class="uni_style"  />SUB JUNIOR 				</label>
				<?php endif; ?>
				<div>  
				<select name="contrib_lang[]" id="contrib_lang" data-placeholder="select language"  onchange="changeContribCount('<?php echo $this->_tpl_vars['artdeldetails'][0]['artId']; ?>
');" multiple="multiple" style="width:250px;padding-left: 50px;top:50px;position: relative;display:none">
                    <?php $_from = $this->_tpl_vars['language_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
						  <option value="<?php echo $this->_tpl_vars['langkey']; ?>
" <?php if ($this->_tpl_vars['langkey'] == $this->_tpl_vars['article']['language']): ?> selected <?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['langitem'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>  
				</div> 
            </div>
        </div>
        <?php endif; ?>
    </fieldset>
<table class="table table-bordered">
    <tr>
		<td><b>From</b></td>
		<td style="float:left;">
			<select name="sendfrom" id="sendfrom">
				<option value="editorial">Editorial</option>
				<option value="me">Me</option>
			</select>
		</td>
	</tr>
	<tr>
        <?php if ($this->_tpl_vars['refusemail'] == 'yes'): ?>
        <td colspan=3><div class="alert alert-danger">Email refusal sent to the participants of this auction<strong>(<?php echo $this->_tpl_vars['toberefusedcontribs']; ?>
)</strong></div><textarea rows="4" cols="50" name="refusemessage" id="refusemessage"><?php echo $this->_tpl_vars['refusemessage']; ?>
</textarea></td>
        <?php endif; ?>
    </tr>
    <tr>
        <td colspan=2>
            <?php if ($this->_tpl_vars['aotype'] == 'private'): ?>
            <div class="alert alert-danger"><label class="uni-checkbox"><input id="sendmailtoonlysc" name="sendmailtoonlysc" type="checkbox" class="uni_style" value="yes" onclick="fngetmailcontent();"/></label>sc mail</div>
            <?php endif; ?>
            <div class="alert alert-success">Email subject : <input id="scobject" name="scobject" type="text" class="span5" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['scobject'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"/></div>
            <textarea rows="4" cols="50" name="scmailbody" id="scmailbody"><?php echo $this->_tpl_vars['scmessage']; ?>
</textarea></td>
        <?php if ($this->_tpl_vars['aotype'] == 'private'): ?>
        <td colspan=2><div class="alert alert-danger">all contributor mail</div><div class="alert alert-success">Email subject : <input id="allobject" name="allobject" type="text" class="span5" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['allobject'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"/></div><textarea rows="4" cols="50" name="allmailbody" id="allmailbody"><?php echo $this->_tpl_vars['allmessage']; ?>
</textarea></td>
        <?php endif; ?>
    </tr>
    <tr>
        <input id="artId" name="artId" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" type="hidden"/>
        <input id="aoId" name="aoId" value="<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
" type="hidden"/>
        <input id="" name="clientid" value="<?php echo $this->_tpl_vars['article']['clientid']; ?>
" type="hidden"/>
        <input id="aotype" name="aotype" value="<?php echo $this->_tpl_vars['aotype']; ?>
" type="hidden"/>
        <input id="refusemail2" name="refusemail2" value="<?php echo $this->_tpl_vars['refusemail']; ?>
" type="hidden"/>
        <input id="pubcontribslist" name="pubcontribslist" value="" type="hidden"/>
        <input id="maillimit" name="maillimit" value="<?php echo $this->_tpl_vars['createmailtobesentcount']; ?>
" type="hidden"/>
        <td colspan="5" class="alert alert-danger">
            <div class="span4 pull-right">
			<table align="right">
			<tr><td>
                <label class="uni-checkbox" style="float: left;"><input id="anouncebymail" name="anouncebymail" type="checkbox" class="uni_style " />Warn by email</label><br/>
                <?php if ($this->_tpl_vars['aotype'] == 'public'): ?>
                <label class="uni-checkbox" style="float: left;"><input id="fbpost" name="fbpost" type="checkbox" class="uni_style " value="yes" onclick="showFbPost();"/>Post on FB & twitter
                </label>
                <?php endif; ?>
				</td>
				<td>
                <button type="button" id="republish" name="republish" class="btn btn-danger" onclick="saveRepublishPop()" >Re-publish</button>
				</td></tr></table>
            </div>
        </td>
    </tr>
    <tr id="fbpostcomments" style="display: none"><td colspan="5" class="alert alert-success">  <strong>Enter commemts for FB and Twitter Posts</strong>
        <textarea rows="4" cols="150" name="fbcomments" id="fbcomments" style="width: 1000px;"> </textarea></td></tr>
</table>
</form>