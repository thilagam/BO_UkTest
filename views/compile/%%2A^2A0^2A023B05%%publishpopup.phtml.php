<?php /* Smarty version 2.6.19, created on 2014-03-20 11:33:21
         compiled from gebo/processao/publishpopup.phtml */ ?>
<?php echo '
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<link rel="stylesheet" href="/BO/theme/gebo/css/bootstrap-datetimepicker.min.css" />
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".pop_over").popover({trigger: \'hover\'});
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
            height                              : 300,
            content_css                         : "/BO/theme/gebo/css/tinymce_styles.css?" + new Date().getTime(),
            theme_advanced_font_sizes           : "8px,10px,12px,13px,14px,16px,18px,20px",
            font_size_style_values              : "8px,10px,12px,13px,14px,16px,18px,20px",
            init_instance_callback				: function(){

                function resizeWidth() {
                    document.getElementById(tinyMCE.activeEditor.id+\'_tbl\').style.width=\'100%\';
                    //font-family: Courier;font-size:medium;font-weight: 300
                }
                resizeWidth();
                $(window).resize(function() {
                    resizeWidth();
                })
            }
        });


    });

function setpublishnow(mode)
{

    var pnow=$(\'input[name=publishnow]:checked\').val();
    var ao_id = $("#ao_id").val();
    if(mode == \'1\')
    {
        var datem = $("#publishtime").val();
        var target_page = "/processao/publishmaildynamic?ao_id="+ao_id+"&publish="+datem;
        $.post(target_page, function(data){    //alert(data);
           // tinyMCE.activeEditor.setContent(data);
	   $("#mailcontent").html(data);
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
               // tinyMCE.activeEditor.setContent(data);
	       $("#mailcontent").html(data);
            });
        }
        else
        {
            $("#publishtime").removeAttr(\'disabled\');
            var datem=dateFormat("DD/MM/YYYY HH:mm");
            $("#publishtime").val(datem);
            var target_page = "/processao/publishmaildynamic?publish=late&ao_id="+ao_id;
            $.post(target_page, function(data){   // alert(data);
               // tinyMCE.activeEditor.setContent(data);
	       $("#mailcontent").html(data);
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
    if($("#title_pub").text() != "" && $("#pub_specs").text() != "NA" && $("#participatetime").text() != "" && $("#sc_time").text() != ""  && $("#publishtime").val() != "select again"
            && $("#minsign").text() != "" && $("#maxsign").text() != "" && $("#signtypepub").text() != "" && $("#client_type").text() != "NA" && $("#noofarts").text() != "")
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
            format: \'dd/MM/yyyy HH:mm\',
            autoclose: true,
            pick12HourFormat: false,
            startDate: \'04/09/2013\',
            endDate: \'04/09/2013\',
           pickSeconds: false
        });

        var target_page = "/processao/publishmaildynamic?ao_id="+ao_id+"&publish="+times;
        $.post(target_page, function(data){   // alert(data);
           // CKEDITOR.instances[\'mailcontent\'].setData(data);
	   $("#mailcontent").html(data);
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

    var time = day+\'/\'+month+\'/\'+year+\'  \'+hour+\':\'+min ;
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
        $("#objblock").show();
        $("#publishmailblock").show();
        $("#refuseobjblock").hide();
        $("#refusemailblock").hide();
        $("#publishbutton").show();
        $("#refusebutton").hide();
    }
    else
    {
        $("#refuseobjblock").show();
        $("#refusemailblock").show();
        $("#objblock").hide();
        $("#publishmailblock").hide();
        $("#refusebutton").show();
        $("#publishbutton").hide();
    }
}
</script>
'; ?>

<!--  //////////pop up "a" div for publish//////////////////////////////////////////////////////////////////////////////////-->
<div class="row-fluid">
  <div class="span12" >
      <form name="publishpopup" action="/processao/publishao?submenuId=ML2-SL1" method="POST">
         <table class="table table-bordered tdleftalign table-striped table-condensed">
              <tr>
                  <td><b>Title:</td>
                  <td id="title_pub"><?php echo $this->_tpl_vars['aoDetails'][0]['title']; ?>
</td>
              </tr>
              <tr>
                  <td> <b>Client Type :</td>
                  <td id="client_type"><?php echo $this->_tpl_vars['aoDetails'][0]['client_type']; ?>
</td>
              </tr>
              <tr>
                  <td><b>NO of Articles :</td>
                  <td id="noofarts"><?php echo $this->_tpl_vars['aoDetails'][0]['total_article']; ?>
</td>
              </tr>
              <tr>
                  <td><b>Timing sending quote :</td>
                  <td id="participatetime"><?php echo $this->_tpl_vars['aoDetails'][0]['participation_time']; ?>
 minutes</td>
              <tr>
                  <td><b>Timing sending items :</td>
                  <td id="sc_time"><?php echo $this->_tpl_vars['aoDetails'][0]['senior_time']; ?>
 minutes</td>
              </tr>
              <tr>
                  <td><b>Length type :</td>
                  <td id="signtypepub"><?php if ($this->_tpl_vars['aoDetails'][0]['signtype'] == 'words'): ?> words / article  <?php endif; ?>
                      <?php if ($this->_tpl_vars['aoDetails'][0]['signtype'] == 'chars'): ?> Characters / article  <?php endif; ?>
                      <?php if ($this->_tpl_vars['aoDetails'][0]['signtype'] == 'sheets'): ?> sheets / article  <?php endif; ?>
                  </td>
              </tr>
              <tr>
                  <td><b>Min. length :</td>
                  <td id="minsign"><?php echo $this->_tpl_vars['aoDetails'][0]['min_sign']; ?>
</td>
              </tr>
              <tr>
                  <td><b>Max. length :</td>
                  <td id="maxsign"><?php echo $this->_tpl_vars['aoDetails'][0]['max_sign']; ?>
</td>
              </tr>
              <tr id="publishtimeblock">
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
           <?php if ($this->_tpl_vars['aoDetails'][0]['AOtype'] == 'private'): ?>
              <tr>
                  <td><b>Min. Price :</td>
                  <td id="minprice"><?php echo $this->_tpl_vars['aoDetails'][0]['price_min']; ?>
</td>
              </tr>
              <tr>
                  <td><b>Max. Price :</td>
                  <td id="maxprice"><?php echo $this->_tpl_vars['aoDetails'][0]['price_max']; ?>
</td>
              </tr>
              <tr id="pubcontribs">
                  <td><b>Writers :</td>
                  <td><a class="pop_over" data-content="<?php echo $this->_tpl_vars['aoDetails'][0]['contribsNames']; ?>
" data-placement="right" data-original-title="Contributors List" data-html="true"><?php echo $this->_tpl_vars['aoDetails'][0]['contribCount']; ?>
 Contributors</a> </td>
              </tr>
           <?php endif; ?>
              <tr>
                  <td><b>Specifications :</td>
                  <td id="pub_specs" ><?php if ($this->_tpl_vars['aoDetails'][0]['file_name'] != ''): ?><?php echo $this->_tpl_vars['aoDetails'][0]['file_name']; ?>
<?php else: ?>NA<?php endif; ?></td>
              </tr>


              <tr>
                  <th colspan="2" align="center">
                      <button type="button" id="publish" name="publish"  class="btn btn-success" onclick="getMailContent(1);" >Publish </button>&nbsp;&nbsp;&nbsp;
                       <button type="button" id="refuse" name="refuse" class="btn btn-warning" onclick="getMailContent(2);" >Refuse</button>&nbsp;&nbsp;&nbsp;
                  </th>
              </tr>
             <tr id="objblock" style="display: none">
                 <td><b>Object :</td>
                 <td><input id="object" name="object" type="text" class="span12" value="<?php echo $this->_tpl_vars['aoDetails'][0]['object']; ?>
" /> </td>
             </tr>
             <tr id="refuseobjblock" style="display: none">
                 <td><b>Object :</td>
                 <td><input id="refuseobject" name="refuseobject" type="text" class="span12" value="<?php echo $this->_tpl_vars['aoDetails'][0]['refuse_object']; ?>
" /> </td>
             </tr>
             <tr id="publishmailblock" style="display: none">
                 <td colspan="2"> <textarea rows="4" cols="30" name="mailcontent" id="mailcontent"><?php echo $this->_tpl_vars['aoDetails'][0]['mailcontent']; ?>
</textarea> </td>
             </tr>
             <tr id="refusemailblock" style="display: none; ">
                 <td colspan="2"> <textarea rows="4" cols="30" name="refusemailcontent" id="refusemailcontent"><?php echo $this->_tpl_vars['aoDetails'][0]['refuse_mailcontent']; ?>
</textarea> </td>
             </tr>
             <tr id="publishbutton" class="hide">
                 <th colspan="2" align="center"><button type="submit" id="submit_pop" name="submit_pop"  class="btn btn-success " onclick="return validePublish();" >Publish </button>&nbsp;&nbsp;&nbsp; </th>
             </tr>
             <tr id="refusebutton" class="hide">
                 <th colspan="2" align="center"><button type="submit" id="refuse_pop" name="refuse_pop" class="btn btn-warning "  >Refuse</button>&nbsp;&nbsp;&nbsp; </th>
             </tr>
         </table>
           <input type="hidden" id="ao_id" name="ao_id" value="<?php echo $this->_tpl_vars['aoDetails'][0]['aoid']; ?>
">
      </form>

  </div>
</div>





