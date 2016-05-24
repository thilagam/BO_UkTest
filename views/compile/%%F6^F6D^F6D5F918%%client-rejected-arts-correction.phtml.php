<?php /* Smarty version 2.6.19, created on 2013-09-30 12:35:32
         compiled from gebo/proofread/client-rejected-arts-correction.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/proofread/client-rejected-arts-correction.phtml', 170, false),array('modifier', 'stripslashes', 'gebo/proofread/client-rejected-arts-correction.phtml', 172, false),array('modifier', 'in_array', 'gebo/proofread/client-rejected-arts-correction.phtml', 197, false),array('modifier', 'count', 'gebo/proofread/client-rejected-arts-correction.phtml', 207, false),array('modifier', 'date_format', 'gebo/proofread/client-rejected-arts-correction.phtml', 250, false),array('modifier', 'wordwrap', 'gebo/proofread/client-rejected-arts-correction.phtml', 252, false),)), $this); ?>
<?php echo '

<script type="text/javascript">
$(document).ready(function() {

    $(".uni_style").uniform();
    gebo_validation.reg();
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
    if (CKEDITOR.instances[\'clientmail\'])
    {
        CKEDITOR.instances[\'clientmail\'].destroy();
    }
    var editor = CKEDITOR.replace( \'clientmail\',
        {
            language: \'de\', uiColor: \'#D9DDDC\', enterMode : CKEDITOR.ENTER_BR, removePlugins : \'resize\',
            toolbar : [ [\'Undo\',\'Redo\'], [\'Find\',\'Replace\'],[\'Link\', \'Unlink\', \'Image\'], [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
                [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\'] ]
        }
    );
});
function sendToFo()
{
    smoke.confirm("L\\\'article sera remis en ligne",function(e){
        if (e)
        {
            smoke.confirm("PREVENIR PAR EMAIL",function(e2){
                if (e2)
                {
                    $("#sendtofo").val(\'yes\');
                    $("#anouncebyemail").val(\'yes\');
                    $("#disapprove1form").submit();
                    return true;
                }
                else
                {
                    $("#sendtofo").val(\'yes\');
                    $("#disapprove1form").submit();
                    return true;
                }
            });
        }
        else
        {
            $("#sendtofo").val(\'no\');
            $("#disapprove1form").submit();
            return true;
        }
    });
}

function checkServices(id)
{
    $("#participateId").val(id);
    var optionscount = $(\'#hid_options\').val();
    var $b = $(\'#optionsdiv input[type=checkbox]\');
    var $c = $(\'#checksdiv input[type=checkbox]\');
    var blen = $b.length;
    var clen = $c.length;
    var countselected = $b.filter(\':checked\').length;
    var countcheckselected = $c.filter(\':checked\').length;
    if(blen != countselected || countcheckselected != 3)
    {
       smoke.alert("Merci de cocher les options SEO et la check list");
       return false;
    }
    else if($("#art_doc_"+id).val()== \'\')
    {
        smoke.alert("please select a file to upload");
        return false;
    }
    else if((blen == countselected || blen==0) && countcheckselected == 3)
    {
       return true;
    }
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

function showUploadFile(mode)
{
   if(mode == \'close\')
      $(".alert").hide();
   else
   {
      $(".alert").show();
      $("#pop-s1comments").hide();
   }

}
////close the article and re create//////
function showCloseRecreate(artid)
{
    $("#alert").hide();
    smoke.confirm("close article and create new ao",function(e){
        if (e)
        {
            window.location.href = "/proofread/client-rejected-arts-correction?close=yes&closedrecreate=yes&articleId="+artid;
        }
        else
        {
            return false;
        }
    });
}
////close the article and re create//////
function showClosePayment(artid)
{
    $("#alert").hide();
    smoke.confirm("close article and payments",function(e){
        if (e)
        {
            window.location.href = "proofread/clientRejectedArtsCorrection?close=yes&closedpayment=yes&articleId="+artid;
        }
        else
        {
           return false;
        }
    });
}

</script>
'; ?>

<h3 class="heading">client rejected article Correction<a class="label label-inverse pull-right"  id="return">retour</a></h3>

<table id="grptabledetails" class="table btn-gebo tdleftalign" >
  <tr>
      <td><b>Article : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
      <td><b>Nom AO : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['deliveryTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
      <td><b>Type d'article : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['type'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
  </tr>
  <tr>
      <td><b>Mode de comptage : </b><?php if ($this->_tpl_vars['articledetails'][0]['signtype'] == 'words'): ?>Mots
          <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'chars'): ?>Caract&eacute;res
          <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'sheets'): ?>Feuillets<?php endif; ?></td>
      <td><b>Min <?php if ($this->_tpl_vars['articledetails'][0]['signtype'] == 'words'): ?>Mots / article
          <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'chars'): ?>Caract&eacute;res / article
          <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'sheets'): ?>Feuillets / article <?php endif; ?>: </b><?php echo $this->_tpl_vars['articledetails'][0]['num_min']; ?>
</td>
      <td><b>Max <?php if ($this->_tpl_vars['articledetails'][0]['signtype'] == 'words'): ?>Mots / article
            <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'chars'): ?>Caract&eacute;res / article
            <?php elseif ($this->_tpl_vars['articledetails'][0]['signtype'] == 'sheets'): ?>Feuillets / article <?php endif; ?>: </b><?php echo $this->_tpl_vars['articledetails'][0]['num_max']; ?>
</td>
  </tr>
  <tr>
    <td><b>Brief &eacute;ditorial : </b><?php if ($this->_tpl_vars['articledetails'][0]['filepath'] != NULL): ?>
        <a href="/proofread/downloadfile?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&spec=<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
" class="label label-warning">Download</a><?php else: ?>No file<?php endif; ?></td>
    <td></td>
     <td></td>
  </tr>
</table>
<div class="span5 ui-sortable"  id="optionsdiv">
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
</div>

<div class="span5 ui-sortable" id="checksdiv">
    <div class="w-box-header">Check List</div>
    <div class="w-box-content cnt_a" >
        <label class="uni-checkbox">
            <span> <input type="checkbox" name="scheck" id="scheck" class="uni_style" /></span>
            <span class="hint--top hint--error " data-hint="checking for specllings of content">Check Antidote</span>
        </label>
        <label class="uni-checkbox">
            <span><input type="checkbox" name="gcheck" id="gcheck" class="uni_style" /></span>
            <span class="hint--top hint--error" data-hint="checking for grammer of content">Check plagiat</span>
        </label>
        <label class="uni-checkbox">
            <span><input type="checkbox" name="ccheck" id="ccheck" class="uni_style" /></span>
            <span class="hint--top hint--error" data-hint="checking for unfavourable data of content">Relecture du contenu</span>
        </label>
    </div>
</div>

<div class="row-fluid">
  <div class="span12">
<form action="/proofread/client-rejected-arts-correction?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleId=<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
" method="post" id="clienrejectart" name="clienrejectart" enctype="multipart/form-data">
    <table id="rejectedclientgrid" class="table table-bordered table-striped table_vam">
        <thead>
        <tr>
            <th>Version</th>
            <th>Nom du fichier</th>
            <th>Uploaded by</th>
            <th>Date</th>
            <th>Article</th>
            <th>Comments</th>
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
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['versions_item']['article_sent_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
</td>
            <td><a href="/proofread/downloadfile?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&path=<?php echo $this->_tpl_vars['versions_item']['id']; ?>
">Download</a></td>
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['versions_item']['client_comments'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 30) : smarty_modifier_wordwrap($_tmp, 30)); ?>
</td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>
    <div class="span10 form-inline">
        <label class="uni-radio alpbold"><input type="radio" id="uploadnew" name="rejectclient" class="uni_style" onclick="return  showUploadFile('open');"/>upload new</label>
        <label class="uni-radio alpbold"><input type="radio" id="closerecreate" name="rejectclient" class="uni_style" onclick="return  showCloseRecreate(<?php echo $_GET['articleId']; ?>
);"/>closed & recreate an ao</label>
        <label class="uni-radio alpbold"><input type="radio" id="closepayment" name="rejectclient" class="uni_style" onclick="return  showClosePayment(<?php echo $_GET['articleId']; ?>
);" />closed & return payment</label>
    </div>
    <!--<div class="alignright" class="span6"><button type="button" name="s1art_approve" class="btn btn-success" onclick="return showUploadFile('open');">Valider</button>
    <?php if ($this->_tpl_vars['refused_count']['refused_count'] < 3): ?>
    <button type="button" id="s1art_disapprove" name="s1art_disapprove" class="btn btn-danger"  onclick="return writeS1Comments('<?php echo $this->_tpl_vars['partId']; ?>
');">Refuser</button>
    <?php endif; ?>
    <button type="button" id="s1art_disapprove_permanent" name="s1art_disapprove_permanent" class="btn btn-danger"  onclick="return writeS1CommentsPermanent('<?php echo $this->_tpl_vars['partId']; ?>
');">Refuser Definitivement</button>
    <input type="hidden" name="participateId" id="participateId"  />
    </div>
-->
    <input type="hidden" name="participateId" id="participateId" value="<?php echo $this->_tpl_vars['partId']; ?>
" />
    <div id="alert" class="alert alert-info fade in hide span10" style="height: auto;">
        <textarea  name="clientmail" id="clientmail"  class="textarea pull-left"></textarea>
            <div class="alpbold">Uplaod your version</div>
            <div id="uniform-uni_file" class="uni-uploader">
                <input id="art_doc_<?php echo $this->_tpl_vars['partId']; ?>
" class="uni_style" type="file" name="art_doc_<?php echo $this->_tpl_vars['partId']; ?>
" size="19">
                <span class="uni-filename" >No file selected</span>
                <span class="uni-action" >Choose File</span>
            </div>
            <button type="submit" class="btn btn-inverse" name="clientrejectart_approve"  onclick="return checkServices(<?php echo $this->_tpl_vars['partId']; ?>
);" >Confirm</button>
                <a onclick="return showUploadFile('close');" class="btn"><i class="splashy-error_small"></i> ANNULER</a>
    </div>
</form>
  </div>
</div>

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

<!--///when republish the popup comes for edit details and mail for republish article///-->
<div class="modal4 hide fade" id="republish">
    <div class="modal-header">
        <button class="close" onclick="closePopup('republish');">&times;</button>
        <h3>Editer les Details de la re-publication</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>