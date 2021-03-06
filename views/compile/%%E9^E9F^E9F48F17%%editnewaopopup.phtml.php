<?php /* Smarty version 2.6.19, created on 2015-10-21 13:16:21
         compiled from gebo/processao/editnewaopopup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/processao/editnewaopopup.phtml', 366, false),array('modifier', 'utf8_encode', 'gebo/processao/editnewaopopup.phtml', 366, false),)), $this); ?>
<?php echo '
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js" xmlns="http://www.w3.org/1999/html"></script>
<link rel="stylesheet" href="/BO/theme/gebo/css/bootstrap-datetimepicker.min.css" />
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/bootstrap-datetimepicker.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".uni_style").uniform();
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
			entity_encoding : "raw",
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
    $("#parttime").chosen({ allow_single_deselect: true,search_contains: false  });
    $("#submitoption").chosen({ allow_single_deselect: true,search_contains: false  });
    $("#contribnames").chosen({ allow_single_deselect: true,search_contains: true  });
    $("#language").chosen({ allow_single_deselect: true,search_contains: true  });
    $("#signtype").chosen({ allow_single_deselect: true,search_contains: false  });
    $("#category").chosen({ allow_single_deselect: true,search_contains: true  });
    //* uniform

    $("#contribnames").chosen();
    $(".uni_style").uniform();
    //* enhanced select elements
    gebo_chosen = {
        init: function(){
            $(".chzn_a").chosen({
                allow_single_deselect: true
            });
            $(".chzn_b").chosen();
        }
    };

    function checknum()
    {
        var minnumval =$("#min_sign").val();
        var maxnumval =$("#max_sign").val();
        if(!isNaN(minnumval) && !isNaN(maxnumval))
        {
            if(parseInt(minnumval) <= parseInt(maxnumval))
            {
                if($("#title_edit").val()!="" && $("#participation_time").val()!="" && $("#senior_time").val()!="")
                {
                    if($("#specs").text()!="NA" || $("#fname").text()!="")
                    {
                        var $b = $(\'input[type=checkbox]\');
                        var countselected = $b.filter(\':checked\').length;
                        if(countselected >= 1)
                        {
                            var selected = new Array();
                            $b.filter(\':checked\').each(function() {
                                selected.push($(this).attr(\'value\'));
                            });
                            $("#contribs_list").val(selected);
                        }
                        return true;
                    }
                    else
                    {
                        smoke.alert("Please uplaod the file");
                        return false;
                    }
                }
                else
                {
                    smoke.alert("please fill all the fields");
                    return false;
                }
            }
            else
            {
                smoke.alert("please max sign should be greater than min sign");
                return false;
            }
        }
        else
        {
            smoke.alert("please enter only numbers");
            return false;
        }
    }
    function setpublishnow(mode)
    {
        var pnow=$(\'input[name=publishnow]:checked\').val();
        var ao_id = $("#ao_id").val();
        if(mode == \'1\')
        {
            var datem = $("#publishtime").val();
            var target_page = "/processao/publishmaildynamic?ao_id="+ao_id+"&publish="+datem;
            $.post(target_page, function(data){    //alert(data);
                var content = data.split("*@#");
                $("#mailcontent").html(content[0]);
                $("#clientmailcontent").html(content[2]);
            });
        }
        else
        {
            if(pnow=="yes")
            {
                $("#publishtime").attr(\'disabled\',\'true\');
                $("#publishtime").val(\'\');
                var target_page = "/processao/publishmaildynamic?publish=now&ao_id="+ao_id;
                $.post(target_page, function(data){  //alert(data);
                    var content = data.split("*@#");
                    //tinyMCE.activeEditor.setContent(content[0]);
                    $("#mailcontent").html(content[0]);
                    $("#clientmailcontent").html(content[2]);
                });
            }
            else
            {
                $("#publishtime").removeAttr(\'disabled\');
                var datem=dateFormat("DD/MM/YYYY HH:mm");
                $("#publishtime").val(datem);
                var target_page = "/processao/publishmaildynamic?publish=late&ao_id="+ao_id;
                $.post(target_page, function(data){   // alert(data);
                    var content = data.split("*@#");
                    $("#mailcontent").html(content[0]);
                    $("#clientmailcontent").html(content[2]);
                });
            }
        }
    }
    function dateFormat(format)
    {
        // Calculate date parts and replace instances in format string accordingly
        var days = 1;
        var date = new Date();
        var res = date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));

        date = new Date(res);
        format = format.replace("DD", (date.getDate() < 10 ? \'0\' : \'\') + (date.getDate())); // Pad with \'0\' if needed
        format = format.replace("MM", (date.getMonth() < 9 ? \'0\' : \'\') + (date.getMonth() + 1)); // Months are zero-based
        format = format.replace("YYYY", date.getFullYear());
        format = format.replace("HH", date.getHours());
        format = format.replace("mm", (date.getMinutes() < 9 ? \'0\' : \'\') + (date.getMinutes()));
        return format;
    }
    function validePublish()
    {
        if($("#max_sign").val() != "" && $("#min_sign").val() != "" )
        {
            return true;
        }
        else
        {
            smoke.alert("Tous les champs doivent \\352tre compl\\350t\\350s");
            return false;
        }
    }
    $(function() {
        $(\'#publishtime1\').datetimepicker({
            language: \'pt-BR\',
            pickDate: false,
            format: \'dd/MM/yyyy HH:mm\',
            pickSeconds: false,
            pick12HourFormat: false
        });

        $(\'#publishtime1\').on(\'changeDate\', function(ev){
            var times = timeConverter(ev.localDate.toString());
            var ao_id = $("#ao_id").val();
            $("#publishtime").val(times);

            var datimepicker =  $(\'#publishtime1\').datetimepicker({
                language: \'pt-BR\',
                pickDate: false,
                format: \'dd/mm/yyyy HH:mm\',
                autoclose: true,
                pick12HourFormat: false,
                startDate: \'04/09/2013\',
                endDate: \'04/09/2013\',
                pickSeconds: false
            });
            var datem = $("#publishtime").val();
            var target_page = "/processao/publishmaildynamic?ao_id="+ao_id+"&publish="+datem;
            $.post(target_page, function(data){    //alert(data);
                //CKEDITOR.instances[\'mailcontent\'].setData(data);
                var content = data.split("*@#");
                $("#mailcontent").html(content[0]);
                $("#clientmailcontent").html(content[2]);
                $(\'.bootstrap-datetimepicker-widget\').css("display", "none");
            });
        });
    });
    function timeConverter(times){
        var a = new Date(times);
        var b = new Date();
        var day = a.getDate()+1;
        //var month = a.getMonth()+1;
        var month = ("0" + (a.getMonth() + 1)).slice(-2) ;
        var year = a.getFullYear();
        var hour = a.getHours();

        var min = a.getMinutes();

        var time = day+\'/\'+month+\'/\'+year+\' \'+hour+\':\'+min ;
        if(hour < \'10\')
        {
            smoke.alert("minimun time is 10:00");
            return "select again";
            $("#publishtime1").val("select again");
        }
        else if(hour > b.getHours())
        {
            smoke.alert("Should not exceed current hour");
            return "select again";
            $("#publishtime1").val("select again");
        }
        else
            return time;
    }
    function getMailContent(mode)
    {
        if(mode == 1)
        {

            $("#publishtimeblock").show();
            $("#objblock").show();
            $("#publishmailblock").show();
            $("#clientobjblock").show();
            $("#publishclientmailblock").show();
            $("#refuseobjblock").hide();
            $("#refusemailblock").hide();
            $("#publishbutton").show();
            $("#refusebutton").hide();
            $("#cancelbutton").hide();
            $("#cancelobjblock").hide();
            $("#cancelmailblock").hide();
        }
        else if(mode == 2)
        {
            $("#publishtimeblock").hide();
            $("#refuseobjblock").show();
            $("#refusemailblock").show();
            $("#objblock").hide();
            $("#clientobjblock").hide();
            $("#publishmailblock").hide();
            $("#publishclientmailblock").hide();
            $("#refusebutton").show();
            $("#publishbutton").hide();
            $("#cancelbutton").hide();
            $("#cancelobjblock").hide();
            $("#cancelmailblock").hide();
        }
        else if(mode == 3)
        {
            $("#publishtimeblock").hide();
            $("#refuseobjblock").hide();
            $("#refusemailblock").hide();
            $("#objblock").hide();
            $("#clientobjblock").hide();
            $("#publishmailblock").hide();
            $("#publishclientmailblock").hide();
            $("#refusebutton").hide();
            $("#publishbutton").hide();
            $("#cancelobjblock").show();
            $("#cancelmailblock").show();
            $("#cancelbutton").show();

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

<!--  //////////pop up "a" div for edit///////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="row-fluid" id="editao">
  <div class="span12">
      <form class="form-horizontal form_validation_ttip" action="/processao/publishao?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post" enctype="multipart/form-data">
      <fieldset>
          <div class="control-group formSep">
              <label class="control-label">Titre :</label>
              <div class="controls form-inline">
                 <input type="text" id="title_edit" name="title_edit" value="<?php echo $this->_tpl_vars['aoDetails'][0]['title']; ?>
" />
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Client Type :</label>
              <div class="controls form-inline">
                  <div class="span3">
                      <label class="uni-radio">
                          <input type="radio" id="client_typeyes_edit" name="client_type_edit" value="1" class="uni_style" <?php if ($this->_tpl_vars['aoDetails'][0]['client_type'] == 'professional'): ?> checked='checked' <?php endif; ?>/>
                          Professional
                      </label>
                  </div>
                  <div class="span3">
                      <label class="uni-radio">
                          <input type="radio" id="client_typeno_edit" name="client_type_edit" value="0" class="uni_style" <?php if ($this->_tpl_vars['aoDetails'][0]['client_type'] == 'personal'): ?> checked='checked' <?php endif; ?>/>
                          Personal
                      </label>
                  </div>
              </div>
          </div>
        <!--  <div class="control-group formSep">
              <label class="control-label">No of Articles :</label>
              <div class="controls form-inline">
                  <input type="text" id="noofarts_edit" name="noofarts_edit" value="<?php echo $this->_tpl_vars['aoDetails'][0]['total_article']; ?>
" />
              </div>
          </div>-->
          <div class="control-group formSep">
              <label class="control-label">Timing sending quote :</label>
              <div class="controls form-inline">
                  <span style="vertical-align:top;"><input type="text" id="participation_time" class="span1" name="participation_time" value="<?php echo $this->_tpl_vars['aoDetails'][0]['participation_time']; ?>
" /></span>
                  <select name="parttime" id="parttime" class="span2" >
                      <option value="min"  selected="" >Minute</option>
                      <option value="hour" >Hour(s)</option>
                      <option value="day" >day(s)</option>
                  </select>
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Timing sending items :</label>
              <div class="controls form-inline">
                  <span style="vertical-align:top;"><input type="text" class="span1" id="senior_time" name="senior_time" value="<?php echo $this->_tpl_vars['aoDetails'][0]['senior_time']; ?>
" /></span>
                  <select name="submitoption" id="submitoption" class="span2" >
                      <option value="min" <?php if ($this->_tpl_vars['aoDetails'][0]['submit_option'] == 'min'): ?> selected="" <?php endif; ?>>Minute</option>
                      <option value="hour" <?php if ($this->_tpl_vars['aoDetails'][0]['submit_option'] == 'hour'): ?> selected="" <?php endif; ?>>Hour(s)</option>
                      <option value="day" <?php if ($this->_tpl_vars['aoDetails'][0]['submit_option'] == 'day'): ?> selected="" <?php endif; ?>>day(s)</option>
                  </select>
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Category :</label>
              <div class="controls form-inline">
                  <select id="category" name="category" >
                      <?php echo smarty_function_html_options(array('id' => 'category','options' => ((is_array($_tmp=$this->_tpl_vars['category_array'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)),'selected' => $this->_tpl_vars['aoDetails'][0]['category']), $this);?>
 </td>
                  </select>
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Language :</label>
              <div class="controls form-inline">
                  <select id="language" name="language">
                      <?php echo smarty_function_html_options(array('id' => 'language','options' => ((is_array($_tmp=$this->_tpl_vars['language_array'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)),'selected' => $this->_tpl_vars['aoDetails'][0]['language']), $this);?>

                  </select>
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Length type :</label>
              <div class="controls form-inline">
                  <select id="signtype" name="signtype" >
                      <option value="words" label="Mots / article" <?php if ($this->_tpl_vars['aoDetails'][0]['signtype'] == 'words'): ?> selected='selected'<?php endif; ?> >words / article</option>
                      <option value="chars" label="Caractres / article" <?php if ($this->_tpl_vars['aoDetails'][0]['signtype'] == 'chars'): ?> selected='selected'<?php endif; ?>>Charactres / article</option>
                      <option value="sheets" label="Feuillets / article" <?php if ($this->_tpl_vars['aoDetails'][0]['signtype'] == 'sheets'): ?> selected='selected'<?php endif; ?>>sheets / article</option>
                  </select>
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Type :</label>
              <div class="controls form-inline">
                  <input type="text" class="text-field" id="type" name="type" value="<?php echo $this->_tpl_vars['aoDetails'][0]['type']; ?>
" />
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Content Type :</label>
              <div class="controls form-inline">
                  <input type="text" class="text-field" id="content_type" name="content_type" value="<?php echo $this->_tpl_vars['aoDetails'][0]['content_type']; ?>
" />
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Min. length :</label>
              <div class="controls form-inline">
                  <input type="text" class="text-field" id="min_sign" name="min_sign"  value="<?php echo $this->_tpl_vars['aoDetails'][0]['min_sign']; ?>
" />
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Max Length :</label>
              <div class="controls form-inline">
                  <input type="text" class="text-field" id="max_sign" name="max_sign" value="<?php echo $this->_tpl_vars['aoDetails'][0]['max_sign']; ?>
" />
              </div>
          </div>
      <?php if ($this->_tpl_vars['aoDetails'][0]['AOtype'] == 'private'): ?>
          <div class="control-group formSep">
              <label class="control-label">Min. Price :</label>
              <div class="controls form-inline">
                  <input type="text" class="text-field" id="price_min" name="price_min" value="<?php echo $this->_tpl_vars['aoDetails'][0]['price_min']; ?>
" />
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Max Price :</label>
              <div class="controls form-inline">
                  <input type="text" class="text-field" id="price_max" name="price_max" value="<?php echo $this->_tpl_vars['aoDetails'][0]['price_max']; ?>
" />
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Writer :</label>
              <div class="controls form-inline">
                  <select name="contribnames[]" id="contribnames" multiple data-placeholder="select contributor" class="chzn_b span9">
                      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['contributor_array'],'selected' => $this->_tpl_vars['aoDetails'][0]['contribsIds']), $this);?>

                  </select>
              </div>
          </div>
      <?php endif; ?>
          <div class="control-group formSep">
              <label class="control-label">Contributor Percentage :</label>
              <div class="controls form-inline">
                  <input type="text" class="text-field" id="contrib_percentage" name="contrib_percentage" value="<?php echo $this->_tpl_vars['aoDetails'][0]['contrib_percentage']; ?>
" />
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Brief :</label>
              <div class="controls form-inline">
                  <?php if ($this->_tpl_vars['aoDetails'][0]['file_name'] != ''): ?><?php echo $this->_tpl_vars['aoDetails'][0]['file_name']; ?>
<?php else: ?>NA<?php endif; ?>
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label">Upload new brief :</label>
              <div class="controls form-inline">
                  <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
                      <span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>
                          <input type="file" name="specupload" id="specupload" /></span>
                      <span class="fileupload-preview"></span>
                      <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
                  </div>
              </div>
          </div>
          <div class="control-group formSep">
              <label class="control-label"></label>
              <div class="controls form-inline">
                  <button  type="submit" id="submit_pop_edit" name="submit_pop_edit" class="btn btn-success" onclick="return checknum();">Edit</button>
                  <button type="button" id="publish" name="publish"  class="btn btn-success" onclick="getMailContent(1);" >Publish </button>&nbsp;&nbsp;&nbsp;
                  <button type="button" id="refuse" name="refuse" class="btn btn-warning" onclick="getMailContent(2);" >Refuse</button>&nbsp;&nbsp;&nbsp;
                  <button  type="button" id="cancel_pop" name="cancel_pop" class="btn btn-success" onclick="getMailContent(3);">Cancel</button>
                  <input type="hidden" id="ao_edit_id" name="ao_edit_id" value="<?php echo $this->_tpl_vars['aoDetails'][0]['aoid']; ?>
">
                  <input type="hidden" id="client_id" name="client_id" value="<?php echo $this->_tpl_vars['aoDetails'][0]['user_id']; ?>
" />
              </div>
          </div>
      </fieldset>
      <!--</form>
      <form name="" action="/processao/publishao?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post">-->
              <table id="publishtable" class="control-label" style="width: 95%;margin-top:15px; ">
                  <tr id="publishtimeblock" style="display: none">
                      <td><b>Publish time :</td>
                      <td>
                          <!--<input type="text" name="publishtime" id="publishtime" value="<?php echo $this->_tpl_vars['tommorow']; ?>
" readonly="readonly" onChange="setpublishnow('1');" data-date-format="dd-mm-yyyy" />-->

                          <div  id="publishtime1" class="input-append date" >
                              <input data-format="dd/MM/YYYY HH:mm:ss" id="publishtime" name="publishtime" type="text" value="<?php echo $this->_tpl_vars['tommorow']; ?>
"   class="input-append date" />
                            <span class="add-on">
                              <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                              </i>
                            </span>
                          </div>

                          <span id="publishnowdiv"><input type="checkbox" name="publishnow" id="publishnow" value="yes" onClick="setpublishnow('2');" checked /> Now</span>
                      </td>
                  </tr>
                  <tr>
                      <th colspan="2" align="center">

                      </th>
                  </tr>
                  <tr id="objblock" style="display: none">
                      <td><b>Contributeur Object :</td>
                      <td><input id="object" name="object" type="text" class="span12" value="<?php echo $this->_tpl_vars['aoDetails'][0]['object']; ?>
" /> </td>
                  </tr>
                  <tr id="refuseobjblock" style="display: none">
                      <td><b>Object :</td>
                      <td><input id="refuseobject" name="refuseobject" type="text" class="span12" value="<?php echo $this->_tpl_vars['aoDetails'][0]['refuse_object']; ?>
" /> </td>
                  </tr>
                  <tr id="cancelobjblock" style="display: none">
                      <td><b>Object :</td>
                      <td><input id="cancelobject" name="cancelobject" type="text" class="span12" value="" /> </td>
                  </tr>
                  <tr id="publishmailblock" style="display: none">
                      <td colspan="2"> <textarea rows="4" cols="30" name="mailcontent" id="mailcontent"><?php echo $this->_tpl_vars['aoDetails'][0]['mailcontent']; ?>
</textarea> </td>
                  </tr>
                  <tr id="clientobjblock" style="display: none">
                      <td><b>Client Object :</td>
                      <td><input id="clientobject" name="clientobject" type="text" class="span12" value="<?php echo $this->_tpl_vars['aoDetails'][0]['clientobject']; ?>
" /> </td>
                  </tr>
                  <tr id="publishclientmailblock" style="display: none">
                      <td colspan="2"> <textarea rows="4" cols="30" name="clientmailcontent" id="clientmailcontent"><?php echo $this->_tpl_vars['aoDetails'][0]['clientmailcontent']; ?>
</textarea> </td>
                  </tr>
                  <tr id="refusemailblock" style="display: none; ">
                      <td colspan="2"> <textarea rows="4" cols="30" name="refusemailcontent" id="refusemailcontent"><?php echo $this->_tpl_vars['aoDetails'][0]['refuse_mailcontent']; ?>
</textarea> </td>
                  </tr>
                  <tr id="cancelmailblock" style="display: none; ">
                      <td colspan="2"> <textarea rows="4" cols="30" name="cancelmailcontent" id="cancelmailcontent"></textarea> </td>
                  </tr>
                  <tr id="publishbutton" class="hide">
                      <th colspan="2" align="center"><button type="submit" id="submit_pop" name="submit_pop"  class="btn btn-success " onclick="return validePublish();" >Publier </button>&nbsp;&nbsp;&nbsp; </th>
                  </tr>
                  <tr id="refusebutton" class="hide" >
                      <td colspan="2"  align="right" class="alert alert-danger">
                          <table cellpadding="10" cellspacing="10">
                              <tr>
                                  <td>
                                      <label class="uni-checkbox" > <input id="anouncebymail" name="anouncebymail" type="checkbox" class="uni_style" > Pr&eacute;venir par email</label>
                                  </td>
                                  <td>
                                      <button type="submit" id="refuse_pop" name="refuse_pop" class="btn btn-danger"  >Refuser</button>&nbsp;&nbsp;&nbsp;
                                  </td>
                              </tr>
                          </table>
                      </td>
                  </tr>
                  <tr id="cancelbutton" class="hide">
                      <th colspan="2" align="center"><button type="submit" id="cancel_pop" name="cancel_pop" class="btn btn-warning "  >Annuler</button>&nbsp;&nbsp;&nbsp; </th>
                  </tr>
              </table>
            <input type="hidden" id="ao_id" name="ao_id" value="<?php echo $this->_tpl_vars['aoDetails'][0]['aoid']; ?>
">
      </form>
  </div>
</div>