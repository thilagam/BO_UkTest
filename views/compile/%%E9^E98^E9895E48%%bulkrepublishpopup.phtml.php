<?php /* Smarty version 2.6.19, created on 2015-03-03 18:37:23
         compiled from gebo/republish/bulkrepublishpopup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/republish/bulkrepublishpopup.phtml', 366, false),array('modifier', 'utf8_encode', 'gebo/republish/bulkrepublishpopup.phtml', 366, false),array('function', 'html_options', 'gebo/republish/bulkrepublishpopup.phtml', 407, false),)), $this); ?>
<?php echo '

<script type="text/javascript" >
$(document).ready(function() {
   $("#parttime_option").chosen({ allow_single_deselect: false,search_contains: true  });
   $("#sub_opt_time").chosen({ allow_single_deselect: false,search_contains: true  });
   $("#sub_opt_resub").chosen({ allow_single_deselect: false,search_contains: true  });
    $(".uni_style").uniform();
    $("#favcontribcheck").chosen();
    $("#contrib_cat").chosen();
    $("#contrib_lang").chosen();
    updatedBulkContribList($("#aoId").val());
});
function changeAoType(aotype, aoId, artlist) ///when directly republish
{
    smoke.confirm("Do you really want to change type of AO",function(e){
        if (e)
        {
            var target_page = "/republish/changeaotype?&aoId="+aoId+"&aotype="+aotype;
            $.post(target_page, function(data){  //alert(data);
                var href="/republish/bulkrepublishpopup?nopart=no&close=no&aoId="+aoId+"&artlist="+artlist;
                $("#republish").removeData(\'modal\');
                $(\'#republish .modal-body\').load(href);
                $("#republish").modal();
                $(".modal-backdrop:gt(0)").remove();
            });
        }
        else
        {
            var href="/republish/bulkrepublishpopup?nopart=no&close=no&aoId="+aoId+"&artlist="+artlist;
            $("#republish").removeData(\'modal\');
            $(\'#republish .modal-body\').load(href);
            $("#republish").modal();
            $(".modal-backdrop:gt(0)").remove();
        }
    });

}
function refreshModel()
{
    var aoId = $("#aoId").val();
    var href="/republish/bulkrepublishpopup?nopart=no&close=no&aoId="+aoId;
    $("#republish").removeData(\'modal\');
    $(\'#republish .modal-body\').load(href);
    $("#republish").modal();
    $(".modal-backdrop:gt(0)").remove();
}
///when republish popup will come to upate values
function saveRepublishPop() ///when directly republish
{
    var artlist = $("#artlist").val();
    var aoId = $("#aoId").val();
    var aotype = $("#aotype").val();
    var selectedcontribs = $("#favcontribcheck").val();
    var sendmailtoonlysc = $(\'#sendmailtoonlysc\').is(":checked") ;
    var fbpost = $("#fbpost").val();
  
    var price_min = $("input[id=\'price_min\']").map(function(){ return $(this).attr(\'class\')+"_"+$(this).val(); }).get();// alert(price_min);
    var price_max = $("input[id=\'price_max\']").map(function(){ return $(this).attr(\'class\')+"_"+$(this).val(); }).get(); //alert(price_max);
  
    var checked = [];
    $("input[name=\'contribtype[]\']:checked").each(function ()
    {
        checked.push($(this).val());
    });
    var stage = $("#stage").val();
    var parttime_option = $("#parttime_option").val();
    var parttime = $("#participation_time").val();
    var price_min = $("#price_min").val();
    var price_max = $("#price_max").val();
    var fbcomments = $("#fbcomments").val();
    var scobject = $("#scobject").val();
    var pubselectedlang = $("#contrib_lang").val();
    if(aotype == "private"){
        var allobject = $("#allobject").val();
        var allmessage = tinyMCE.get(\'allmailbody\').getContent();   }
    var scmessage = tinyMCE.get(\'scmailbody\').getContent();
    var anouncebymail = $(\'#anouncebymail\').is(":checked") ;
    if($("#refusemail2").val() == \'yes\')
    {
        var refusalmessage = tinyMCE.get(\'refusemessage\').getContent();
        var sendrefusalmail = "yes";
    }
    ///validation////
    if(aotype == "private")
    {
        if(($("#maillimit").val()>20)||(parttime == \'\')||(selectedcontribs == null)||(price_min == \'\')||(price_max == \'\'))
        {
            smoke.alert("please check limit of 20 exceed OR other inputs");
            return false;
        }
    }
    else
    {
        if((parttime == \'\')||(price_min == \'\')||(price_max == \'\')||(checked == \'\'))
        {
            smoke.alert("please check inputs given");
            return false;
        }
    }

    var target_page = "/republish/bulkrepublishpopup?artlist="+artlist+"&aoId="+aoId+"&save=save&aotype="+aotype+"&view_to="+checked+"&price_min="+price_min+"&price_max="+price_max+"&selectedcontribs="+selectedcontribs+"&fbcomments="+fbcomments+"&parttime="+parttime+"&parttime_option="+parttime_option+
            "&sendmailtoonlysc="+sendmailtoonlysc+"&scobject="+scobject+"&allobject="+allobject+"&scmessage="+escape(scmessage)+"&scmessage="+escape(allmessage);
    $.post(target_page, function(data){  //alert(data);
        if($("#nopartsforrepublish").val() == \'yes\')
        {
            alert("Nobody can participate.");
        }
        if(stage != \'\')   /////////when republish pop up generated in any of stages
        {
            smoke.confirm("The item will be back online",function(e){
                if(e)
                {
                    /* smoke.confirm("PREVENTION BY EMAIL",function(e2){
                        if(e2)
                        {
                            $("#sendtofo").val(\'yes\');
                            $("#crtsendtofo").val(\'yes\');
                            $("#anouncebyemail").val(\'yes\');
                            $("#anouncebyemail2").val(\'yes\');
                            $("#disapprove"+stage+"form").submit();
                            return true;
                        }
                        else
                        { */
                            $("#sendtofo").val(\'yes\');
                            $("#crtsendtofo").val(\'yes\');
                            $("#disapprove"+stage+"form").submit();
                            return true;
                        /* }

                    }); */
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
            smoke.confirm("The item will be back online",function(e){
                if (e)
                {
                    window.location.href = "/republish/bulkpublisharticlefo?aoId="+aoId+"&artlist="+artlist+"&aoType="+aotype+"&sendtofo=yes&sendrefusalmail="+sendrefusalmail+"&scobject="+scobject+"" +
                            "&fbpost="+fbpost+"&pubselectedlang="+pubselectedlang+"&sendmailtousertype="+checked+"&sendmailtoonlysc="+sendmailtoonlysc+"&selectedcontribs="+selectedcontribs+"&allobject="+allobject+"&anouncebymail="+anouncebymail+"&scmessage="+escape(scmessage)+"&allmessage="+escape(allmessage)+"&refusalmailcontent="+escape(refusalmessage);
                }
                else
                {
                    window.location.href = "/republish/bulkpublisharticlefo?aoId="+aoId+"artlist="+artlist+"&aoType="+aotype+"&sendtofo=no&sendrefusalmail="+sendrefusalmail+"&refusalmailcontent="+escape(refusalmessage);
                }
            });
        }
    });
}
////////intialising editors
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
////////////////////////////////
function changeMailByContribType()
{
    $(\'#scmailbody\').html();
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
    $.get(target_page, function(data){  //alert(data);
        var mailcontent = data.split("*");

        $(\'#scmailbody\').html(mailcontent[0]);
        $("#scobject").val(mailcontent[1]);

    });
    //  commentBox1.show();
}

function fngetbulkmailcontent()
{
    var aoId = $("#aoId").val();
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
    if(tinymce.getInstanceById(\'scmailbody\'))
    {
        tinymce.execCommand(\'mceRemoveControl\', true, \'scmailbody\');
        loadEditors(\'scmailbody\');
    }
    else  if(!tinymce.getInstanceById(\'scmailbody\'))
        loadEditors(\'scmailbody\');
    var checkedcontribs = [];
    $("input[name=\'contribtype[]\']:checked").each(function ()
    {
        checkedcontribs.push($(this).val());
    });
    var selectedcontribs = $("#favcontribcheck").val();
    var parttime_option = $("#parttime_option").val();
    var extend_time = $("#participation_time").val();
    var target_page = "/republish/getbulkdynamicselectedcontribs?part_time="+extend_time+"&parttime_option="+parttime_option+"&scCount="+scCount+"&selectedcontribs="+selectedcontribs+"&aoId="+aoId+"&onlyscmail="+onlyscmail+"&checkedcontribs="+checkedcontribs;
    $.post(target_page, function(data){ // alert(data);
        if(aotype == "private"){
            var mailcontent = data.split("*");
            $(\'#scmailbody\').html(mailcontent[0]);
            $(\'#allmailbody\').html(mailcontent[1]);
            $(\'#mailsenduserscount\').html("("+mailcontent[2]+" contributors can participate)");
            $(\'#maillimit\').val(selectedcontribs.length);
        }
        else
        {
            $(\'#scmailbody\').html(data);
        }
    });
    //  commentBox1.show();
}


function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds){
            break;
        }
    }
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
    // var lang=$("select#contrib_lang").val();
    var lang="";
    lang= $.trim(lang);
    $.ajax({
        type: \'GET\',
        url: \'/republish/loadpublicaouserslist\',
        data: \'type=\' + contribtype+\'&category=\'+cat+\'&language=\'+lang+"&artId="+artId,
        success: function(data)
        {         //alert(data);
            var content = data.split("*");
            if($("#aotype").val() == "private" && content[1] > 20)
                smoke.alert("The limit of 20 is exceeded");
            $(\'#pubcontribslist\').val(content[0]);
            $(\'#mailsenduserscount\').html("("+content[1]+" contributors can participate)");
            $(\'#maillimit\').val(content[1]);
        }
    });
}
//get all contributor based on the type, lang, cat//////

function privateAoContribList()
{
    var selectedcontribs = $("#favcontribcheck").val();
    //var selectedcontribs = $("select.favcontribcheck option:selected").val();    
    if(selectedcontribs)
    {
        $(\'#mailsenduserscount\').html("("+selectedcontribs.length+" contributors can participate)");
        $(\'#maillimit\').val(selectedcontribs.length);
    }
    else
    {
        $(\'#mailsenduserscount\').html("(0 contributors can participate)");
        $(\'#maillimit\').val(0);
    }

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
<input type="hidden" id="nopartsforrepublish" name="nopartsforrepublish" value="<?php echo $this->_tpl_vars['nopartsforrepublish']; ?>
" >
<!--<input type="hidden" id="refusemailcontent" name="refusemailcontent" value="<?php echo $this->_tpl_vars['refusemessage']; ?>
" >-->
<input id="closerepublish" name="closerepublish" value="<?php echo $this->_tpl_vars['close']; ?>
" type="hidden">
<input id="stage" name="stage" value="<?php echo $this->_tpl_vars['stage']; ?>
" type="hidden"><div class="alert alert-success"><strong>Return the item for people who have participated without being selected</strong> <span id="mailsenduserscount"> (<?php echo $this->_tpl_vars['createmailtobesentcount']; ?>
 contributors can participate)</span> </div>
<form class="form-horizontal form_validation_ttip" >
<fieldset>
    <div class="control-group formSep">
        <label class="control-label">Temps de bidding :</label>
        <div class="controls form-inline">
            <span style="vertical-align:top;"><input id="participation_time" name="participation_time" type="text" value="<?php echo $this->_tpl_vars['artdeldetails'][0]['participation_time']; ?>
" onkeyup="fngetbulkmailcontent();"/></span>
            <select name="parttime_option" id="parttime_option" onchange="fngetbulkmailcontent();">
                <option value="min" selected="">Minute(s)</option>
                <option value="hour">Hour(s)</option>
                <option value="day">day(s)</option>
            </select>
        </div>
    </div>
    <div class="control-group formSep">
       <!-- <label class="control-label"> Price Range :</label>
        <div class="controls form-inline">
           min : <input id="price_min" name="price_min" type="text"  value="<?php echo $this->_tpl_vars['artdeldetails'][0]['price_min']; ?>
"/>
           max : <input id="price_max" name="price_max" type="text"  value="<?php echo $this->_tpl_vars['artdeldetails'][0]['price_max']; ?>
"/>
        </div>-->
        <?php $_from = $this->_tpl_vars['pricedetials']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['price_key'] => $this->_tpl_vars['price_item']):
?>
        <label class="control-label"> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['price_item']['arttitle'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
:</label>
        <div class="controls form-inline">
           min : <input id="price_min" name="pricemin" class="pricemin_<?php echo $this->_tpl_vars['price_item']['artid']; ?>
" type="text"  value="<?php echo $this->_tpl_vars['price_item']['artprice_min']; ?>
"/>
           max : <input id="price_max" name="pricemax" class="pricemax_<?php echo $this->_tpl_vars['price_item']['artid']; ?>
" type="text"  value="<?php echo $this->_tpl_vars['price_item']['artprice_max']; ?>
"/>
        </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <div class="control-group formSep">
        <label class="control-label"> Ao type :</label>
        <div class="controls form-inline">
            <label class="uni-radio">
                <input type="radio" name="aotype" id="privateao" class="uni_style" value="privateao" onclick="changeAoType('private', '<?php echo $this->_tpl_vars['aoId']; ?>
', '<?php echo $this->_tpl_vars['artlist']; ?>
');" <?php if ($this->_tpl_vars['aotype'] == 'private'): ?> checked <?php endif; ?> /> Private
            </label>
            <label class="uni-radio">
                <input type="radio" name="aotype" id="publicao" class="uni_style"  value="publicao" onclick="changeAoType('public', '<?php echo $this->_tpl_vars['aoId']; ?>
', '<?php echo $this->_tpl_vars['artlist']; ?>
');" <?php if ($this->_tpl_vars['aotype'] == 'public'): ?> checked <?php endif; ?>  /> Public
            </label>
        </div>
    </div>

    <?php if ($this->_tpl_vars['aotype'] == 'private'): ?>
    <input id="sc_count" name="sc_count" value="<?php echo $this->_tpl_vars['sc_count']; ?>
" type="hidden"/>
    <div class="control-group formSep" id="privateaoset">
        <label class="control-label">contributor selection for create mail send :</label>
        <div class="controls form-inline">
            <label class="uni-checkbox">
                <input type="checkbox" id="contribtype1" name="contribtype[]"  value="senior" <?php if ($this->_tpl_vars['sc'] == 'yes'): ?> checked <?php endif; ?> class="uni_style" onClick="updatedBulkContribList('<?php echo $this->_tpl_vars['aoId']; ?>
');" />SC <b>(<?php echo $this->_tpl_vars['sc_count']; ?>
)</b> </label>
            <label class="uni-checkbox">
                <input type="checkbox" id="contribtype2" name="contribtype[]"  value="junior" <?php if ($this->_tpl_vars['jc'] == 'yes'): ?> checked <?php endif; ?> class="uni_style" onClick="updatedBulkContribList('<?php echo $this->_tpl_vars['aoId']; ?>
');" />JC  <b>(<?php echo $this->_tpl_vars['jc_count']; ?>
)</b></label>
            <label class="uni-checkbox">
                <input type="checkbox"  id="contribtype3" name="contribtype[]"  value="sub-junior" <?php if ($this->_tpl_vars['jc0'] == 'yes'): ?> checked <?php endif; ?> class="uni_style" onClick="updatedBulkContribList('<?php echo $this->_tpl_vars['aoId']; ?>
');" />SUB JUNIOR <b>(<?php echo $this->_tpl_vars['jc0_count']; ?>
)</b></label>
        </div>
        <div class="controls form-inline">
            <select name="contrib_lang[]" id="contrib_lang" onChange="updatedBulkContribList('<?php echo $this->_tpl_vars['aoId']; ?>
');" data-placeholder="select language" multiple="multiple" style="width:250px;">
                <?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
                <?php if (in_array ( $this->_tpl_vars['langkey'] , $this->_tpl_vars['contrib_langarray'] )): ?>
                <option value="<?php echo $this->_tpl_vars['langkey']; ?>
" selected><?php echo ((is_array($_tmp=$this->_tpl_vars['langitem'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
                <?php else: ?>
                <option value="<?php echo $this->_tpl_vars['langkey']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['langitem'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </select>
            <?php echo smarty_function_html_options(array('name' => 'contrib_cat','id' => 'contrib_cat','options' => ((is_array($_tmp=$this->_tpl_vars['Contrib_cats'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)),'selected' => $this->_tpl_vars['contrib_cat'],'style' => "width:250px;",'onChange' => "updatedBulkContribList(".($this->_tpl_vars['aoId']).")"), $this);?>

        </div>
        <div class="controls form-inline" id="contribs">

            <select name="favcontribcheck[]" id="favcontribcheck" multiple="multiple" onchange="fngetbulkmailcontent();">
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
        <label class="control-label">contributor selection to send mail for public ao:</label>
        <div class="controls form-inline">
            <label class="uni-checkbox">
                <input type="checkbox" id="contribtype1" name="contribtype[]" onclick="publicAoContribList('<?php echo $this->_tpl_vars['artdeldetails'][0]['artId']; ?>
');" value="senior" <?php if ($this->_tpl_vars['sc'] == 'yes'): ?> checked <?php endif; ?> class="uni_style"   />SC <b>(<?php echo $this->_tpl_vars['sc_count']; ?>
)</b> </label>
            <label class="uni-checkbox">
                <input type="checkbox" id="contribtype2" name="contribtype[]" onclick="publicAoContribList('<?php echo $this->_tpl_vars['artdeldetails'][0]['artId']; ?>
');" value="junior" <?php if ($this->_tpl_vars['jc'] == 'yes'): ?> checked <?php endif; ?> class="uni_style"  />JC  <b>(<?php echo $this->_tpl_vars['jc_count']; ?>
)</b></label>
            <label class="uni-checkbox">
                <input type="checkbox"  id="contribtype3" name="contribtype[]" onclick="publicAoContribList('<?php echo $this->_tpl_vars['artdeldetails'][0]['artId']; ?>
');" value="sub-junior" <?php if ($this->_tpl_vars['jc0'] == 'yes'): ?> checked <?php endif; ?> class="uni_style"  />SUB JUNIOR <b>(<?php echo $this->_tpl_vars['jc0_count']; ?>
)</b></label>
            <div >  <select name="contrib_lang[]" id="contrib_lang" data-placeholder="select language" multiple="multiple" style="width:250px;padding-left: 50px;top:50px;position: relative;">
                <?php $_from = $this->_tpl_vars['language_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
                   <?php if ($this->_tpl_vars['langkey'] == $this->_tpl_vars['language']): ?>
                     <option value="<?php echo $this->_tpl_vars['langkey']; ?>
" selected="selected"><?php echo ((is_array($_tmp=$this->_tpl_vars['langitem'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
                   <?php else: ?>
                     <option value="<?php echo $this->_tpl_vars['langkey']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['langitem'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
                   <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </select>  </div>
        </div>
    </div>
    <?php endif; ?>
</fieldset>
</form>
<table class="table table-bordered">
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
            <div class="alert alert-danger"><label class="uni-checkbox"><input id="sendmailtoonlysc" name="sendmailtoonlysc" onclick="fngetbulkmailcontent();" type="checkbox" class="uni_style" value=""/></label>sc mail</div>
            <?php endif; ?>
            <div class="alert alert-success">Object of email : <input id="scobject" name="scobject" type="text" class="span5" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['scobject'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"/></div>
            <textarea rows="4" cols="50" name="scmailbody" id="scmailbody"><?php echo $this->_tpl_vars['scmessage']; ?>
</textarea></td>
        <?php if ($this->_tpl_vars['aotype'] == 'private'): ?>
        <td colspan=2><div class="alert alert-danger">all contributor mail</div><div class="alert alert-success">Object of email : <input id="allobject" name="allobject" type="text" class="span5" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['allobject'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"/></div><textarea rows="4" cols="50" name="allmailbody" id="allmailbody"><?php echo $this->_tpl_vars['allmessage']; ?>
</textarea></td>
        <?php endif; ?>
    </tr>
    <tr>
        <input id="artlist" name="artlist" value="<?php echo $this->_tpl_vars['artlist']; ?>
" type="hidden"/>
        <input id="aoId" name="aoId" value="<?php echo $this->_tpl_vars['aoId']; ?>
" type="hidden"/>
        <input id="aotype" name="aotype" value="<?php echo $this->_tpl_vars['aotype']; ?>
" type="hidden"/>
        <input id="refusemail2" name="refusemail2" value="<?php echo $this->_tpl_vars['refusemail']; ?>
" type="hidden"/>
        <input id="pubcontribslist" name="pubcontribslist" value="" type="hidden"/>
        <input id="maillimit" name="maillimit" value="<?php echo $this->_tpl_vars['createmailtobesentcount']; ?>
" type="hidden"/>
        <td colspan="5" class="alert alert-danger"><label class="uni-checkbox span2" style="float: left;"><input id="anouncebymail" name="anouncebymail" type="checkbox" class="uni_style"  checked="checked"/>anouncement by mail</label>
            <?php if ($this->_tpl_vars['aotype'] == 'public'): ?>
            <label class="uni-checkbox" style="float: left;"><input id="fbpost" name="fbpost" type="checkbox" class="uni_style" value="yes" onclick="showFbPost();"/>FB and Twitter Post
            </label>
            <?php endif; ?>
            <button type="button" id="republish" name="republish" class="btn btn-danger pull-right" onclick="saveRepublishPop();" >Re-publish</button></td>
    </tr>
    <tr id="fbpostcomments" style="display: none"><td colspan="5" class="alert alert-success">  <strong>Enter commemts for FB and Twiter Posts</strong>
        <textarea rows="4" cols="150" name="fbcomments" id="fbcomments" style="width: 1000px;"> </textarea></td></tr>  
</table>
