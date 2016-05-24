<?php /* Smarty version 2.6.19, created on 2015-04-14 16:08:08
         compiled from gebo/proofread/stage0-correction.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/proofread/stage0-correction.phtml', 249, false),array('modifier', 'stripslashes', 'gebo/proofread/stage0-correction.phtml', 251, false),array('modifier', 'date_format', 'gebo/proofread/stage0-correction.phtml', 303, false),array('modifier', 'string_format', 'gebo/proofread/stage0-correction.phtml', 311, false),)), $this); ?>
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<?php echo '

<script type="text/javascript">
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
});
////to send the email when editor correct the corrector version and want to disapporve ////////
function getRefuseComment(partid, mode)
{
    var buttonmode = mode;
    if(buttonmode == \'permanent\')
    {
        var mailid = 74;
        if (tinymce.getInstanceById(\'commentsRefusePerm_\'+partid))
        {
            tinymce.execCommand(\'mceRemoveControl\', true, \'commentsRefusePerm_\'+partid);
            loadEditors(\'commentsRefusePerm_\'+partid);
        }
        else if (!tinymce.getInstanceById(\'commentsRefusePerm_\'+partid))
        {
            loadEditors(\'commentsRefusePerm_\'+partid);
        }
        var target_page = "/processao/getcommentpopup?mailId="+mailid+"&particip_id="+partid; //
        $.post(target_page, function(data){   //alert(data);
            $(\'#commentsRefusePerm_\'+partid).html(data);
            $("#pop_s0art_permdisapprove").show();
            $("#pop_s0art_disapprove").hide();
            $("#mailcontent").css("display", "none");
            $("#mailcontentpermanent").css("display", "block");
        });
    }
    else if(buttonmode == \'temporary\')
    {
        var mailid = 73;
        if (tinymce.getInstanceById(\'commentsRefuse_\'+partid))
        {
            tinymce.execCommand(\'mceRemoveControl\', true, \'commentsRefuse_\'+partid);
            loadEditors(\'commentsRefuse_\'+partid);
        }
        else if (!tinymce.getInstanceById(\'commentsRefuse_\'+partid))
        {
            loadEditors(\'commentsRefuse_\'+partid);
        }
        var target_page = "/processao/getcommentpopup?mailId="+mailid+"&particip_id="+partid; //
        $.post(target_page, function(data){  // alert(data);
            $(\'#commentsRefuse_\'+partid).html(data);
            $("#pop_s0art_disapprove").show();
            $("#s0art_permdisapprove").hide();
            $("#mailcontent").css("display", "block");
            $("#mailcontentpermanent").css("display", "none");
        });
    }
    $(".alert").show();
}

function sendToFo()
{
    smoke.confirm("Item will be back online",function(e){
        if (e)
        {
            smoke.confirm("Announce by Email",function(e2){
                if (e2)
                {
                    $("#sendtofo").val(\'yes\');
                    $("#anouncebyemail").val(\'yes\');
                    $("#s0correction").submit();
                    return true;
                }
                else
                {
                    $("#sendtofo").val(\'yes\');
                    $("#s0correction").submit();
                    return true;
                }
            });
        }
        else
        {
           $("#sendtofo").val(\'no\');
            $("#s0correction").submit();
            return true;
        }
    });
}

function getRefuseTemp(valtempId)
{
   $("#comment_s1").text(\'\')
      var $b = $(\'input[type=checkbox]\');
      var countselected = $b.filter(\':checked\').length;
      ////////////////////////////////////
      var selected = new Array();
      $b.filter(\':checked\').each(function() {
          selected.push($(this).attr(\'value\'));
           $("#hide_total1").val(selected);////for posting the value which are checked
      });
     ////////////////////////////////////
   for(var i=1; i<=countselected; i++)
   {
        var target_page = "/template/getrefusevalidtemp?valtempId="+selected[i-1];
        $.post(target_page, function(data){  //alert(data);
        var obj = $.parseJSON(data);
         $("#comment_s1").append(obj[0].content+\'\\n\\n\');
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
function showUploadFile(mode)
{
   if(mode == \'close\')
      $("#alert").hide();
   else
   {
      $("#alert").show();
      $("#pop-s0comments").hide();
   }
}
///////////for all contributors details list in popup////////////////
function s0CorrectionPlagarism(partId)
{
    $("#loading").modal(\'show\');
    var target_page = "/correction/s0correctionplagarism?participateId="+partId;
    $.post(target_page, function(data){  //alert(data);

       // var data1 = data.trim();
       // if(data1 == \'Please Wait\')$maxpercentage
        if(data <= 20)
        {
            $(\'#loading\').modal(\'hide\');
            window.location.href = \'/proofread/stage-deliveries?submenuId=ML3-SL11\';
        }
        else  if(data > 20)
        {
           window.location.reload();
        }
        else if(data == \'Fail\')
        {
            $("#loading").html(\'process failed\');
        }
        else
            $("#loading").html(data);
    });

}
 ////click on plag result should take u to acutaly page////
function plagres(val)   {
    var resFile = $(\'#resultFile\').html() ;
    window.open("https://admin-test.edit-place.co.uk/seotool/plagcontents?s0plagfile="+resFile+"&idx="+val);
}
</script>
<style>
    .bgplain{background-color:#ffffff;}
    .filetitle{font-size:18px;font-weight: bold;}
    .contentwrap{ padding-left:5px; padding-right:10px;
        box-sizing:border-box;
        -moz-box-sizing:border-box;
        webkit-box-sizing:border-box;
        display:block;
        white-space: pre-wrap;
        white-space: -moz-pre-wrap;
        white-space: -pre-wrap;
        white-space: -o-pre-wrap;
        word-wrap: normal;
        width:100%; overflow-x:auto;}
    .yellowlink{background-color:yellow; display: inline-block;}
    .bluelink{color:blue;}
</style>
'; ?>

<!-- Div on Load Starts here -->

<!-- Div on Load Ends here -->

<h3 class="heading">Stage 0 Correction<a class="label label-inverse pull-right"  id="return">retour</a></h3>

<table id="grptabledetails" class="table btn-gebo tdleftalign" >
  <tr>
      <td><b>Article : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
      <td><b>Ao name : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['deliveryTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
      <td><b>Article Type : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['type'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
  </tr>
  <tr>
      <td><b>Counting mode : </b><?php if ($this->_tpl_vars['articledetails'][0]['signtype'] == 'words'): ?>Words
          <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'chars'): ?>Characters
          <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'sheets'): ?>Sheets <?php endif; ?></td>
      <td><b>Min <?php if ($this->_tpl_vars['articledetails'][0]['signtype'] == 'words'): ?>Words / article
          <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'chars'): ?>Characters / article
          <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'sheets'): ?>Sheets / article <?php endif; ?>: </b><?php echo $this->_tpl_vars['articledetails'][0]['num_min']; ?>
</td>
      <td><b>Max <?php if ($this->_tpl_vars['articledetails'][0]['signtype'] == 'words'): ?>Words / article
            <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'chars'): ?>Characters / article
            <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'sheets'): ?>Sheets / article <?php endif; ?>: </b><?php echo $this->_tpl_vars['articledetails'][0]['num_max']; ?>
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
<form action="/proofread/stage0-correction?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleId=<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
" method="post" id="s0correction" name="s0correction" enctype="multipart/form-data">
    <table id="s1crtgrid" class="table table-bordered table-striped table_vam">
        <thead>
        <tr>
            <th>Version</th>
            <th>File name</th>
            <th>writer</th>
            <th>step</th>
            <th>Status</th>
            <th>Date</th>
            <th>Article</th>
            <th>Density</th>
            <th>plagiarism internal</th>
            <th>plagiarism external</th>
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
            <td><?php echo $this->_tpl_vars['versions_item']['article_name']; ?>
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
            <td><a href="/download_article.php?path=<?php echo $this->_tpl_vars['versions_item']['id']; ?>
">Download</a></td>
            <td><a href=""  data-target="#density" data-toggle="modal" onclick="return getDensity('<?php echo $this->_tpl_vars['versions_item']['id']; ?>
');">Density</a></td>
            <td><a data-target="#plagiarism" data-toggle="modal" href="/proofread/contentplagiarism?artprocessId=<?php echo $this->_tpl_vars['versions_item']['id']; ?>
" class="label label-success">Internal</a></td>
            <td><!--<a data-target="#plagexternalresults" data-toggle="modal" href="/correction/plagdetails?part_id=<?php echo $this->_tpl_vars['versions_item']['participate_id']; ?>
&art_id=<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
&version=<?php echo $this->_tpl_vars['versions_item']['version']; ?>
"> External</a>(<?php echo $this->_tpl_vars['versions_item']['plag_percent']; ?>
)-->
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
            <td><?php if ($this->_tpl_vars['versions_item']['article_words_count'] > $this->_tpl_vars['articledetails'][0]['num_max'] || $this->_tpl_vars['versions_item']['article_words_count'] < $this->_tpl_vars['articledetails'][0]['num_min']): ?>
                    <span class="label label-important"><?php echo $this->_tpl_vars['versions_item']['article_words_count']; ?>
 </span>
                <?php else: ?>
                    <span class="label label-success"><?php echo $this->_tpl_vars['versions_item']['article_words_count']; ?>
</span>
                <?php endif; ?>
            </td>
            <td><div id="text-toggle-button<?php echo ($this->_foreach['versions_loop']['iteration']-1); ?>
" name="text-toggle-button<?php echo $this->_tpl_vars['versions_item']['user_id']; ?>
" class="toggle-button">
                <input name="blackstatus<?php echo $this->_tpl_vars['versions_item']['user_id']; ?>
" id="blackstatus<?php echo ($this->_foreach['versions_loop']['iteration']-1); ?>
" type="checkbox" value="<?php echo $this->_tpl_vars['versions_item']['user_id']; ?>
" <?php if ($this->_tpl_vars['versions_item']['blackstatus'] == 'yes'): ?> checked="checked" <?php endif; ?> >
            </div></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>
    <div class="alignright" class="span6"><button type="submit" name="s0art_approve" id="s0art_approve" class="btn btn-success">Validate</button>
    <?php if ($this->_tpl_vars['refused_count']['refused_count'] < 3): ?>
        <button type="button" id="s0art_disapprove" name="s0art_disapprove" class="btn btn-danger"  onclick="return getRefuseComment('<?php echo $this->_tpl_vars['partId']; ?>
', 'temporary');">Refuse</button>
    <?php endif; ?>
    <button type="button" id="s0art_disapprove_permanent" name="s0art_disapprove_permanent" class="btn btn-danger"  onclick="return getRefuseComment('<?php echo $this->_tpl_vars['partId']; ?>
', 'permanent');">Refuse Definite</button>
    <input type="hidden" name="participateId" id="participateId"  />
    </div>
    <div id="alert" class="alert alert-block alert-warning fade in hide" style="height: auto;position:relative;top:50px;">
        <div id="mailcontent">
            <textarea  name="commentsRefuse_<?php echo $this->_tpl_vars['partId']; ?>
" id="commentsRefuse_<?php echo $this->_tpl_vars['partId']; ?>
"  class="textarea" rows="10"></textarea>

            <button type="submit" class="btn btn-inverse" name="pop_s0art_disapprove" id="pop_s0art_disapprove" >Refuse</button>

            &nbsp;&nbsp;<a onclick="return showUploadFile('close');" class="btn"><i class="splashy-error_small"></i> Close</a>
        </div>
        <div id="mailcontentpermanent">

            <textarea  name="commentsRefusePerm_<?php echo $this->_tpl_vars['partId']; ?>
" id="commentsRefusePerm_<?php echo $this->_tpl_vars['partId']; ?>
" class="textarea"   rows="10"></textarea>

            <button type="button" class="btn btn-inverse hide" name="pop_s0art_permdisapprove" id="pop_s0art_permdisapprove" data-toggle="modal" data-target="#republish" href="/processao/republishpopup?close=no&stage=0&artId=<?php echo $_GET['articleId']; ?>
" >Refuse Definite</button>
            &nbsp;&nbsp;<a onclick="return showUploadFile('close');" class="btn"><i class="splashy-error_small"></i> Close</a>
            <input type="hidden" id="sendtofo" name="sendtofo" value="">
            <input type="hidden" id="anouncebyemail" name="anouncebyemail" value="">
            <input type="hidden" id="pop_s0art_permdisapprove_jq" name="pop_s0art_permdisapprove" value="yes">
        </div>
    </div>

</form>
  </div>
</div>

<?php if ($this->_tpl_vars['xmlplagfile'] != ""): ?>
<div id="plagresults" class="alert alert-block alert-info" style="height: auto; position: relative;top:20px;" >

    <h3>Plagiarism Results</h3></div>
    <?php echo $this->_tpl_vars['xmlplagfile']; ?>


<?php endif; ?>

<?php if ($this->_tpl_vars['plagdetails'] == 'no'): ?>
<div id="alertplag" class="alert alert-block alert-info" style="height: auto; position: relative;top:20px;" >
<b>No plagiarism check has been made on this file !</b>
<button type="button" class="btn btn-warning" value="" id="s0art_pagiarism" name="s0art_pagiarism" onclick="return s0CorrectionPlagarism('<?php echo $_GET['participateId']; ?>
');" >Plagiarism Checker</button>

</div>
<?php endif; ?>

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
        <button  class="close" onclick="closePopup('plagiarism');">&times;</button>
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
        <h3>Detail of plagarism</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">

    </div>
</div>
<!--///show loading time for fetching the plagiarism details ///-->
<div class="modal fade hide" id="loading">
       <h3>Plagiarism Results are Loading. Please wait..<img src="/BO/theme/gebo/img/ajax_loader.gif"></h3>
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
