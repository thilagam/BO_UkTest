<?php /* Smarty version 2.6.19, created on 2015-03-18 08:58:22
         compiled from gebo/correction/corrector-article-profiles.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/correction/corrector-article-profiles.phtml', 445, false),array('modifier', 'stripslashes', 'gebo/correction/corrector-article-profiles.phtml', 484, false),array('modifier', 'wordwrap', 'gebo/correction/corrector-article-profiles.phtml', 484, false),array('modifier', 'explode', 'gebo/correction/corrector-article-profiles.phtml', 516, false),array('modifier', 'print_r', 'gebo/correction/corrector-article-profiles.phtml', 549, false),)), $this); ?>
<?php echo '
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>

<script type="text/javascript" >
  $(document).ready(function() {

      ////////////to show the timer in selection profile page///////
      var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
      var js_date=(new Date().getTime())/ 1000;
      var diff_date=Math.floor(js_date-cur_date);
     //////////show timer//////////
	$("[id^=time_]").each(function(i) {
		var article=$(this).attr(\'id\').split("_");
		var ts=article[2];
		$("#time_"+article[1]+"_"+article[2]).countdown({
			timestamp   : ts,
            diff_date  : diff_date,
			callback    : function(days, hours, minutes, seconds){
				var message = "";
				message += days + " jours"  +", ";
				message += hours + " h" +",";
				message += minutes + " mns"+ ", ";
				message += seconds + " s";
				$("#text_"+article[1]+"_"+article[2]).html(message);
				if(days==0 && hours==0 && minutes==0 && seconds==0)
				{
					//window.location.reload();
				}
			}
		});
	});
   //////////////////////////////////////////////////////////////////
      $(\'#artprofilesgrid\').dataTable({
          "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
          "sPaginationType": "bootstrap",
          "aaSorting": [[ 0, "asc" ]],
          "aoColumns": [
              { "sType": "formatted-num" },
              { "sType": "string" },
              { "sType": "string" },
              { "sType": "natural" },
              { "sType": "natural" },
              { "sType": "natural" },
          ]
      });
      ///////return to back page/////
      $( "#return" ).click(function() {
          history.go(-1);
      });
      $(".uni_style").uniform();

  });

////////re publish the confirmation ////////
function republishConfirm(artid)
{
    var msg = "<p style=\'color:#F50531\'>Warning : Selected writers will be refused. Are you sure to be republish ? </p>";
    smoke.confirm("The item will be back online"+msg,function(e){
        if (e){
            //smoke.alert(\'"yeah it is" pressed\', {ok:"close"});
            smoke.confirm("Announcement by email",function(e){
                if(e)
                    window.location.href = "/correction/publishcrtarticlefo?art_id="+artid+"&sendmail=yes";
                else
                    window.location.href = "/correction/publishcrtarticlefo?art_id="+artid+"&sendmail=no";
            });
        }else{
            return false;
        }
    });
}


///////////when click on TO BE CLOSED in list of profiles/////////////
function closeArtprofile(artid, closemode)
{
    var closemode = closemode;
    if(closemode == \'close\')
    {
        if(artid == \'firstvalidate\')
        {
           smoke.alert("Please first validate the profile");
        }
        else
        {
            smoke.confirm("Do you really want to close this aritcle",function(e){
                if (e)
                {
                    $.ajax({
                        url: "/processao/closeartcrtprofile?artid="+artid+"&closemode="+closemode,
                        global: false,
                        type: "GET",
                        dataType: "html",
                        async:false,
                        success: function(msg){ //alert(msg);
                            //location.reload();
                            $(\'#closeart\'+artid).html("<a onclick=\\"return closeartcrtprofile(\'"+artid+"\', \'disclose\');\\" class=\'btn btn-info\'>Closed</a>");
                        }
                    });
                }
                else
                {
                    return false;
                }
            });
        }
    }
    else
    {
        smoke.confirm("Do you really want to disclose this aritcle",function(e){
            if (e)
            {
                $.ajax({
                    url: "/processao/closeartcrtprofile?artid="+artid+"&closemode="+closemode,
                    global: false,
                    type: "GET",
                    dataType: "html",
                    async:false,
                    success: function(msg){ //alert(msg);
                        //location.reload();
                        $(\'#closeart\'+artid).html("<a onclick=\\"return closeArtprofile(\'"+artid+"\', \'close\');\\" class=\'btn btn-info\'>Close</a>");
                    }
                });
            }
            else
            {
                return false;
            }
        });
    }
}
  ///////////when click on TO BE CLOSED in list of profiles/////////////
  function closeBulkArtprofile(artid)
  {
      var $b = $(\'input[type=checkbox]\');
      var countselected = $b.filter(\':checked\').length;
      if(countselected > 1)
      {
          var selected = new Array();
          $b.filter(\':checked\').each(function() {
              selected.push($(this).attr(\'value\'));
          });
          smoke.confirm("Do you really want to close this aritcle",function(e){
              if (e)
              {
                  var target_page =  "/processao/closeartprofile?type=bulk&artid="+selected;
                  $.post(target_page, function(data){  //alert(data);
                      location.reload();
                  });
              }
              else
              {
                  return false;
              }
          });
      }
      else
      {
          alert("Please select atleast one");
          return false;
      }
  }
//////locking system/////////////
function articlProfilelockSystem(artid, mode, page, rownum)
{
    var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
    var part_time = $("#parttime"+rownum).val();

   var target_page = "/proofread/missionowner?artId="+artid;
    $.post(target_page, function(data){ // alert(data);
        var obj = data.split(",");
        var lockedsamuser = obj[0].trim();
        if(lockedsamuser == \'no\' && mode==\'lock\')
        {
            smoke.confirm("Are you sure want to make that choice instead"+obj[1],function(e){
                if (e)
                {
                    $("#grpprofile"+rownum).attr("href", "/processao/group-profiles?artId="+artid);
                    $("#grpprofile"+rownum).attr("data-toggle", "modal");
                    $("#grpprofilelink"+rownum).attr("href", "/processao/group-profiles?artId="+artid);
                    $("#grpprofilelink"+rownum).attr("data-toggle", "modal");
                    if(cur_date > part_time){
                        $("#closerepublish"+rownum).removeAttr("disabled");
                        $("#closebutton"+rownum).removeAttr("disabled");
                    }
                    lockSystemArtProfile(artid, mode, page, rownum);
                    var target_page = "/proofread/missionowner?artId="+artid+"&sendmail=yes";
                    $.post(target_page, function(data){  //alert(data);
                    });
                }
                else
                {
                    $("#grpprofile"+rownum).removeAttr("href", "/processao/group-profiles?artId="+artid);
                    $("#grpprofile"+rownum).removeAttr("data-toggle", "modal");
                    $("#grpprofilelink"+rownum).removeAttr("href", "/processao/group-profiles?artId="+artid);
                    $("#grpprofilelink"+rownum).removeAttr("data-toggle", "modal");
                    $("#closerepublish"+rownum).attr("disabled", "disabled");
                    $("#closebutton"+rownum).attr("disabled", "disabled");
                    return false;
                }
            });
        }
        else
        {
            lockSystemArtProfile(artid, mode, page, rownum);
            if(mode == \'lock\'){
                $("#grpprofile"+rownum).attr("href", "/processao/group-profiles?artId="+artid);
                $("#grpprofile"+rownum).attr("data-toggle", "modal");
                $("#grpprofilelink"+rownum).attr("href", "/processao/group-profiles?artId="+artid);
                $("#grpprofilelink"+rownum).attr("data-toggle", "modal");
                if(cur_date > part_time){
                    $("#closerepublish"+rownum).removeAttr("disabled");
                    $("#closebutton"+rownum).removeAttr("disabled");
                }
            }
            else
            {
                $("#grpprofile"+rownum).removeAttr("href", "/processao/group-profiles?artId="+artid);
                $("#grpprofile"+rownum).removeAttr("data-toggle", "modal");
                $("#grpprofilelink"+rownum).removeAttr("href", "/processao/group-profiles?artId="+artid);
                $("#grpprofilelink"+rownum).removeAttr("data-toggle", "modal");
                $("#closerepublish"+rownum).attr("disabled", "disabled");
                $("#closebutton"+rownum).attr("disabled", "disabled");
            }
        }
    });
}
  //////locking system/////////////
  function lockSystemArtProfile(artid, mode, page, rownum)
  {
      if(mode == \'lock\')
      {
          var target_page = "/proofread/locksystem?artId="+artid+"&mode=lock&stage="+page;
          $.post(target_page, function(data){  //alert(data);
              if(page == \'articleprofile\')
                  $(\'#lock\'+artid).html("<a data-toggle=\'modal\' data-target=\'#groupprofile\' href=\'/processao/group-profiles?artId="+artid+"\'>" +
                          "<i class=\'splashy-application_windows_edit\'></i>" +
                          "</a>&nbsp;&nbsp;<a onclick=\\"articlProfilelockSystem(\'"+artid+"\', \'unlock\', \'"+page+"\', \'"+rownum+"\');\\"><i class=\'splashy-lock_large_unlocked\'></i></a>");
              else
                  $(\'#lock\'+artid).html("<a href=\'/proofread/\'"+page+"\'-correction?submenuId=ML3-SL2&articleId="+artid+"\'><i class=\'splashy-application_windows_edit\'></i></a>&nbsp;&nbsp;<a onclick=\'articlProfilelockSystem(\'"+artid+"\', \'unlock\', \'"+page+"\', \'"+rownum+"\');\'><i class=\'splashy-lock_large_unlocked\'></i></a>");

          });
      }
      else{
          var target_page = "/proofread/locksystem?artId="+artid+"&mode=unlock&stage="+page;
          $.post(target_page, function(data){
              $(\'#lock\'+artid).html("<a onclick=\\"articlProfilelockSystem(\'"+artid+"\',\'lock\', \'"+page+"\', \'"+rownum+"\');\\"><i class=\'splashy-lock_large_locked\'></i></a>");
          });
      }
  }
///////////for all contributors details list in popup//////////////////
function acceptRefuseWriter(button)
{
    var userid = $(\'#userid\').val();
    var partid = $(\'#partid\').val();
    var artid = $(\'#artid\').val();

    if(button == \'refuse_pop\')
    {
        var comment = $(\'#refusemailcontent\').val();
        var sendtofo;
        //////////// is it the last participation and refusing it ////////////////////////////////////
        var target_page = "/processao/getlastarts?artid="+artid;
        $.post(target_page, function(data){   //alert(data);
            var data1 = $.trim(data);
            if(data1 == "yes")
            {
                smoke.confirm("The item will be back online",function(e){
                    if (e)
                    {
                        sendtofo = \'yes\';
                        var mailannoucement;
                        if($(mailannouncement).is(\':checked\'))
                            mailannoucement = "sendmail";
                        else
                            mailannoucement = "dontsendmail"; //alert(mailannoucement);
                        var target_page = "/processao/selectcontributor?contrib_id="+userid+"&particip_id="+partid+"&button=refuse_pop&comment="+escape(comment)+"&sendtofo="+sendtofo+"&mailannoucement="+mailannoucement+"&art_id="+artid;
                        $.post(target_page, function(data){  //alert(data);
                            //////////to reload the contirbutor list////////////
                            window.location.reload();

                        });
                    }
                    else
                    {
                         sendtofo = \'no\';
                        var target_page = "/processao/selectcontributor?contrib_id="+userid+"&particip_id="+partid+"&button=refuse_pop&comment="+escape(comment)+"&sendtofo="+sendtofo+"&art_id="+artid;
                        $.post(target_page, function(data){  //alert(data);
                           window.location.reload();
                        });
                    }
                });
            }
            else
            {
                ///////////////////////////////////////////////////////////////
                var target_page = "/processao/selectcontributor?contrib_id="+userid+"&particip_id="+partid+"&button=refuse_pop&comment="+escape(comment)+"&art_id="+artid;
                $.post(target_page, function(data){  //alert(data);
                  window.location.reload();
                });
            }
        });
    }
    else
    {
        var comment = $(\'#acceptmailcontent\').val();
        //alert(comment);
        var target_page = "/processao/selectcontributor?contrib_id="+userid+"&particip_id="+partid+"&button=submit_pop&comment="+escape(comment)+"&art_id="+artid;
        $.post(target_page, function(data){  //alert(data);
            window.location.reload();
        });
    }
}
  //////////get comment for refusal when the republish button is pressed///
function getComment(commentid, button, partid, userid, artid, status)
{
    ///passing these 3 values for the popup for next post///
    $(\'#userid\').val(userid);
    $(\'#partid\').val(partid);
    $(\'#artid\').val(artid);
    if(button==\'refuse_pop\')
    {
        if (CKEDITOR.instances[\'refusemailcontent\'])
        {
            CKEDITOR.instances[\'refusemailcontent\'].destroy();
        }
        var editor = CKEDITOR.replace( \'refusemailcontent\',
                {
                    language: \'de\', uiColor: \'#D9DDDC\', enterMode : CKEDITOR.ENTER_BR, removePlugins : \'resize\',
                    toolbar : [ [\'Undo\',\'Redo\'], [\'Find\',\'Replace\'],[\'Link\', \'Unlink\', \'Image\'], [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
                        [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\'] ]
                }
        );
        var target_page = "/processao/getcommentpopup?mailId=27&contrib_id="+userid+"&particip_id="+partid+"&button="+button+"&artid="+artid;
         $.post(target_page, function(data){   //alert(\'data\');
            CKEDITOR.instances[\'refusemailcontent\'].setData(data);
         });
        $(\'#refusemail\').modal(\'show\');
    }
    else
    {
        if (CKEDITOR.instances[\'acceptmailcontent\'])
        {
            CKEDITOR.instances[\'acceptmailcontent\'].destroy();
        }
        var editor = CKEDITOR.replace( \'acceptmailcontent\',
                {
                    language: \'de\', uiColor: \'#D9DDDC\', enterMode : CKEDITOR.ENTER_BR, removePlugins : \'resize\',
                    toolbar : [ [\'Undo\',\'Redo\'], [\'Find\',\'Replace\'],[\'Link\', \'Unlink\', \'Image\'], [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
                        [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\'] ]
                }
        );
         var target_page = "/processao/getcommentpopup?mailId=25&contrib_id="+userid+"&particip_id="+partid+"&button="+button+"&artid="+artid;
         $.post(target_page, function(data){   //alert(data);
             CKEDITOR.instances[\'acceptmailcontent\'].setData(data);
         });
        $(\'#Acceptmail\').modal(\'show\');
    }
}
  function refreshModal(artid)
  {
      var target_page = "/processao/group-profiles?artId="+artid;
      $.post(target_page, function(data){   //alert(data);
          $(\'#groupprofile\').modal(\'show\');
      });

  }
  //////to select all check boxes/////////////
  function CheckALL()
  {
      if($("#selectAll").attr(\'checked\'))
      {   alert("hiee");
          var $b = $(\'form#artprofile input[type=checkbox]\'); alert($b);
          $b.attr(\'checked\', true);
      }
      else
      {
          var $b = $(\'input[type=checkbox]\');
          $b.attr(\'checked\', false);
      }
  }
 /* $(function () {
      $("#selectAll").click(function () {
          if ($("#selectAll").is(\':checked\')) {
              $(".uni_style").prop("checked", true);  alert("nad"); $("#chk_1").attr("checked");
          } else {
              $(".uni_style").prop("checked", false);
          }
      });
  });*/
  //////to select all check boxes/////////////
  function CheckALL()
  {
      if($("#selectAll").attr(\'checked\'))
      {
          var $b = $(\'form#artprofile input[type=checkbox]\');
          $b.attr(\'checked\', true);
          postBulkRepublish();
      }
      else
      {
          var $b = $(\'input[type=checkbox]\');
          $b.attr(\'checked\', false);
      }
  }


  function postBulkRepublish()
  {
      var artarray = new Array();
      $("input:checkbox[name=artchk]:checked").each(function()
      {
          artarray.push($(this).val());
      });
      if(artarray == \'\')
      {
          smoke.alert("select atleast one article");
          return false;
      }
      else
      {
          var aoId = $("#delId").val();
          $("#bulkrepublish1").hide();
          //window.location.href = "/republish/bulkrepublishpopup?nopart=no&close=no&aoId="+aoId+"&artList="+artarray;
          $("#next").html($(\'<button type="button" data-toggle="modal" data-target="#republish" href="/correction/bulkrepublishcorrectorpopup?nopart=no&close=no&aoId=\'+aoId+\'&artlist=\'+artarray+\'" id="bulkrepublish" name="bulkrepublish" class="btn btn-info">Re publier</button>\'));
      }

  }

</script>
'; ?>


<h3 class="heading">Corrector Article profiles<a class="label label-inverse pull-right" href="/correction/corrector-profiles-list?submenuId=ML2-SL18" id="returnback">Reture</a></h3>
<div class="row-fluid">
 <div class="span12">
 <table id="grptabledetails" class="table tdleftalign btn-gebo" >
     <tr>
         <td><b>Ao Name : </b><?php echo $this->_tpl_vars['delDetails'][0]['aoName']; ?>
</td>
         <td><b>Client : </b><?php echo $this->_tpl_vars['delDetails'][0]['company_name']; ?>
</td>
         <td><b>Catagory : </b><?php echo $this->_tpl_vars['delDetails'][0]['del_category']; ?>
</td>
     </tr>
     <tr>
         <td><b>Total Articles : </b><?php echo $this->_tpl_vars['delDetails'][0]['total_article']; ?>
</td>
         <td><b>Created at : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['delDetails'][0]['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
         <td><b>Created by : </b><?php echo $this->_tpl_vars['delDetails'][0]['created_user']; ?>
</td>
     </tr>
 </table>
 <form id="artprofile" name="artprofile" method="post">
    <table id="artprofilesgrid1" class="table table-bordered table-striped table_vam">
        <thead>
        <tr>
            <th><label class="uni-checkbox" style="position: relative;top: 4px;left: 15px;">
                    <input type="checkbox" id="selectAll" name="selectAll" value="selectall" class="uni_style" onclick="CheckALL();" />
                </label></th>
            <th>Sl.no</th>
          <!--  <th><label class="uni-checkbox" style="position: relative;top: 4px;">
                <input type="checkbox" id="selectAll" name="selectAll" value="selectall" class="uni_style" onclick="CheckALL();"  />
            </label>Select All</th>-->
            <th>Titre Article</th>
            <th>Participants</th>
            <th>Status</th>
            <th>Action</th>
           <!-- <th>Lock</th>-->
        </tr>
        </thead>
        <tbody>
        <?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['artprofiles_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artprofiles_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['artprofiles_key'] => $this->_tpl_vars['artprofiles_item']):
        $this->_foreach['artprofiles_loop']['iteration']++;
?>
        <input  hidden="hidden" id="parttime<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
" name="parttime<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['artprofiles_item']['participation_expires']; ?>
"/>
        <tr>
            <td><?php if ($this->_tpl_vars['artprofiles_item']['current_stage'] != 'stage0' && $this->_tpl_vars['artprofiles_item']['current_stage'] != 'stage1' && $this->_tpl_vars['artprofiles_item']['current_stage'] != 'stage2' && $this->_tpl_vars['artprofiles_item']['part_current_stage'] != 'contributor' && $this->_tpl_vars['artprofiles_item']['status'] != 'published' && time() > $this->_tpl_vars['artprofiles_item']['correction_participationexpires']): ?>

                <input type="checkbox" id="artchk_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
" name="artchk" value="<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
" onclick="postBulkRepublish();" />

                <?php endif; ?></td>
            <td> <?php echo ($this->_foreach['artprofiles_loop']['iteration']-1)+1; ?>
 </td>
            <!--<td>
                <label class="uni-checkbox">
                    <input type="checkbox" id="chk_<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
" name="chk_<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
" class="uni_style" <?php if ($this->_tpl_vars['artprofiles_item']['selection_type'] == 'bo' || $this->_tpl_vars['artprofiles_item']['selection_type'] == 'auto'): ?> disabled=disabled <?php endif; ?>/>
                </label>
            </td>-->
            <td> <a class="pop_over" data-placement="right" data-original-title="Article Details" data-html="true"
            data-content="<table class='table table-bordered tdleftalign'>
                        <tr><td><b>Article</b></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['artprofiles_item']['artName'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 25, "<br />\n") : smarty_modifier_wordwrap($_tmp, 25, "<br />\n")); ?>
</td></tr>
                        <tr><td><b>Price demand</b></td><td><?php echo $this->_tpl_vars['artprofiles_item']['price_min']; ?>
-<?php echo $this->_tpl_vars['artprofiles_item']['price_max']; ?>
 &euro;</td></tr>
                        <tr><td><b>Created at</b></td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['artprofiles_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
</td></tr>
                        <tr><td><b>Status</b></td><td><?php if ($this->_tpl_vars['artprofiles_item']['status'] == 'bid_premium'): ?> New
                                                 <?php elseif ($this->_tpl_vars['artprofiles_item']['status'] == 'bid_refused'): ?> Refused
                                                 <?php elseif ($this->_tpl_vars['artprofiles_item']['status'] == 'published'): ?> Published
                                                 <?php elseif ($this->_tpl_vars['artprofiles_item']['status'] == ''): ?> No Participants
                                                 <?php else: ?> Ongoing <?php endif; ?></td></tr>
                        </table>"'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['artprofiles_item']['artName'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 25, "<br />\n") : smarty_modifier_wordwrap($_tmp, 25, "<br />\n")); ?>
</a></td>
            <td>
                <a data-target="#groupprofile"  class="artprofiles <?php if ($this->_tpl_vars['artprofiles_item']['cycle0UserCount'] != 1): ?> num-large <?php endif; ?>" id="grpprofile<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
"  data-refresh="true" role="button" >
                <?php if ($this->_tpl_vars['artprofiles_item']['cycle0UserCount'] == 1): ?>
                    <?php echo $this->_tpl_vars['artprofiles_item']['first_name']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['artprofiles_item']['last_name'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 10, "\n", true) : smarty_modifier_wordwrap($_tmp, 10, "\n", true)); ?>

                    <?php if ($this->_tpl_vars['artprofiles_item']['userCount'] != 0): ?>
                        <span class="label label-inverse">of <?php echo $this->_tpl_vars['artprofiles_item']['userCount']; ?>
</span>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="label label-warning"><?php echo $this->_tpl_vars['artprofiles_item']['cycle0UserCount']; ?>
</span>
                    <?php if ($this->_tpl_vars['artprofiles_item']['userCount'] != 0): ?>
                        <span class="label label-inverse">of <?php echo $this->_tpl_vars['artprofiles_item']['userCount']; ?>
</span>
                    <?php endif; ?>
                <?php endif; ?></a>
            </td>
            <td>
            <?php if ($this->_tpl_vars['artprofiles_item']['pstatus'] == ""): ?>
               <span class="label label-info">pas de participation</span>
                <?php if (time() < $this->_tpl_vars['artprofiles_item']['correction_participationexpires'] && $this->_tpl_vars['artprofiles_item']['correction_participationexpires'] != '0'): ?>
                       <span id="time_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['correction_participationexpires']; ?>
" class="alert alert-danger">
                         <i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['correction_participationexpires']; ?>
"></span>
                        </span>
                <?php endif; ?>
            <?php else: ?>
                <?php $this->assign('arrstatus', ((is_array($_tmp=$this->_tpl_vars['artprofiles_item']['pstatus'])) ? $this->_run_mod_handler('explode', true, $_tmp, ",") : smarty_modifier_explode($_tmp, ","))); ?>
                <?php if (in_array ( 'bid_corrector|senior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'bid_corrector|junior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'bid_corrector|senior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'bid_corrector|junior-corrector' , $this->_tpl_vars['arrstatus'] )): ?>
                    <?php if (time() > $this->_tpl_vars['artprofiles_item']['correction_participationexpires'] && $this->_tpl_vars['artprofiles_item']['correction_participationexpires'] != '0'): ?>
                        <span class="label label-success">To validate</span>
                        <?php if (time() < $this->_tpl_vars['artprofiles_item']['correction_participationexpires']): ?>
                            <span id="time_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['correction_participationexpires']; ?>
" class="alert alert-danger">
                            <i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['correction_participationexpires']; ?>
"></span>
                            </span>
                        <?php endif; ?>
                    <?php elseif ($this->_tpl_vars['artprofiles_item']['correction_participationexpires'] == '0'): ?>
                        <span class="label label-success">To validate</span>
                        <?php if (time() < $this->_tpl_vars['artprofiles_item']['correction_participationexpires']): ?>
                            <span id="time_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['delivery_date_timestamp']; ?>
" class="alert alert-danger">
                            <i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['delivery_date_timestamp']; ?>
"></span>
                            </span>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="label label-success">ongoing</span>
                        <?php if (time() < $this->_tpl_vars['artprofiles_item']['correction_participationexpires']): ?>
                            <span id="time_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['correction_participationexpires']; ?>
" class="alert alert-danger">
                            <i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['correction_participationexpires']; ?>
"></span>
                            </span>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php elseif (in_array ( 'bid_temp|senior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'bid_temp|junior' , $this->_tpl_vars['arrstatus'] )): ?><span class="label label-success">J-W validated</span>

                <?php elseif (in_array ( 'bid_temp|senior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'bid_temp|junior-corrector' , $this->_tpl_vars['arrstatus'] )): ?><span class="label label-success">J-C validated </span>


                <?php elseif (in_array ( 'bid|senior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'under_study|senior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'dissaproved|senior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'on_hold|senior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'time_out|senior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'published|senior' , $this->_tpl_vars['arrstatus'] )): ?>
                <span class="label label-success">S-W validated</span>
                     <?php echo ((is_array($_tmp=$this->_tpl_vars['arrstatus'])) ? $this->_run_mod_handler('print_r', true, $_tmp) : print_r($_tmp)); ?>

                <?php elseif (in_array ( 'bid|senior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'under_study|senior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'dissaproved|senior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'on_hold|senior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'time_out|senior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'published|senior-corrector' , $this->_tpl_vars['arrstatus'] )): ?>
                <span class="label label-success">S-C validated </span>

                <?php elseif (in_array ( 'bid|junior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'under_study|junior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'dissaproved|junior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'on_hold|junior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'time_out|junior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'published|junior' , $this->_tpl_vars['arrstatus'] )): ?>
                <span class="label label-success">J-W validated </span>

                <?php elseif (in_array ( 'bid|junior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'under_study|junior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'dissaproved|junior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'on_hold|junior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'time_out|junior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'published|junior-corrector' , $this->_tpl_vars['arrstatus'] )): ?>
                <span class="label label-success">J-C validated </span>

                <?php elseif (in_array ( 'bid_refused|junior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'bid_refused|senior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'closed|senior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'closed|junior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'bid_refused|junior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'bid_refused|senior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'closed|senior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'closed|junior-corrector' , $this->_tpl_vars['arrstatus'] )): ?>
                    <?php if (time() > $this->_tpl_vars['artprofiles_item']['correction_participationexpires'] && $this->_tpl_vars['artprofiles_item']['correction_participationexpires'] != '0'): ?>
                        <span class="label label-success">ongoing</span>
                        <?php if (time() < $this->_tpl_vars['artprofiles_item']['correction_participationexpires']): ?>
                            <span id="time_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['correction_participationexpires']; ?>
" class="alert alert-danger">
                            <i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['correction_participationexpires']; ?>
"></span>
                            </span>
                        <?php endif; ?>
                    <?php elseif ($this->_tpl_vars['artprofiles_item']['correction_participationexpires'] == '0'): ?>
                        <span class="label label-success">ongoing</span>
                        <?php if (time() < $this->_tpl_vars['artprofiles_item']['correction_participationexpires']): ?>
                            <span id="time_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['delivery_date_timestamp']; ?>
" class="alert alert-danger">
                            <i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['delivery_date_timestamp']; ?>
"></span>
                            </span>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="label label-important">ongoing</span>
                        <?php if (time() < $this->_tpl_vars['artprofiles_item']['correction_participationexpires']): ?>
                            <span id="time_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['correction_participationexpires']; ?>
" class="alert alert-danger">
                            <i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
_<?php echo $this->_tpl_vars['artprofiles_item']['correction_participationexpires']; ?>
"></span>
                            </span>
                        <?php endif; ?>
                    <?php endif; ?>

                <?php elseif (in_array ( 'bid_corrector|senior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'bid_corrector|junior' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'bid_corrector|senior-corrector' , $this->_tpl_vars['arrstatus'] ) || in_array ( 'bid_corrector|junior-corrector' , $this->_tpl_vars['arrstatus'] )): ?><span class="label label-success">Client validated</span>

                <?php endif; ?>

                <?php if ($this->_tpl_vars['artprofiles_item']['current_stage'] == 'stage0'): ?>
                <span class="label label-warning">plagiarism</span>
                <?php elseif ($this->_tpl_vars['artprofiles_item']['current_stage'] == 'stage1'): ?>
                <span class="label label-warning">stage 1</span>
                <?php elseif ($this->_tpl_vars['artprofiles_item']['current_stage'] == 'stage2'): ?>
                <span class="label label-warning">stage 2</span>
                <?php elseif ($this->_tpl_vars['artprofiles_item']['current_stage'] == 'client'): ?>
                <span class="label label-warning">published</span>
                <?php elseif ($this->_tpl_vars['artprofiles_item']['current_stage'] == 'corrector'): ?>
                <span class="label label-warning">correction</span>
                <?php endif; ?>
            <?php endif; ?>
            </td>
            <td><!--<span id="closeart<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
">

                <?php if ($this->_tpl_vars['artprofiles_item']['correction_closed_status'] == ''): ?>
                     <?php if ($this->_tpl_vars['artprofiles_item']['status'] != ''): ?>
                        <?php if ($this->_tpl_vars['artprofiles_item']['status'] == 'bid_corrector' || $this->_tpl_vars['artprofiles_item']['status'] == 'bid_temp' || $this->_tpl_vars['artprofiles_item']['status'] == 'bid_refused_temp'): ?>
                            <button type="button" id="closebutton<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
" <?php if (time() < $this->_tpl_vars['artprofiles_item']['correction_participationexpires']): ?> disabled="disabled" <?php endif; ?> onclick="return closeArtprofile('firstvalidate', 'close');" class="btn btn-info">Close</button>
                        <?php else: ?>
                            <button type="button" id="closebutton<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
" <?php if (time() < $this->_tpl_vars['artprofiles_item']['correction_participationexpires']): ?> disabled="disabled" <?php endif; ?> onclick="return closeArtprofile('<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
', 'close');" class="btn btn-info">Close</button>
                        <?php endif; ?>
                     <?php else: ?>
                        <button  type="button" id="closebutton<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
" <?php if (time() < $this->_tpl_vars['artprofiles_item']['correction_participationexpires']): ?> disabled="disabled" <?php endif; ?> onclick="return closeArtprofile('<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
', 'close');" class="btn btn-info">Close</button>
                     <?php endif; ?>
                <?php else: ?>
                 <button type="button" id="closebutton<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
" <?php if (time() < $this->_tpl_vars['artprofiles_item']['correction_participationexpires']): ?> disabled="disabled" <?php endif; ?> onclick="return closeArtprofile('<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
', 'disclose');" class="btn btn-info">Close</button>
                <?php endif; ?>
                </span>-->
                <?php if ($this->_tpl_vars['artprofiles_item']['current_stage'] == 'stage0' || $this->_tpl_vars['artprofiles_item']['current_stage'] == 'stage1' || $this->_tpl_vars['artprofiles_item']['current_stage'] == 'stage2' || $this->_tpl_vars['artprofiles_item']['status'] == 'published' || time() < $this->_tpl_vars['artprofiles_item']['correction_participationexpires']): ?>
                &nbsp;
                <?php elseif ($this->_tpl_vars['artprofiles_item']['lastpartcount'] == 1): ?>
                <!-- <button <?php if ($this->_tpl_vars['artprofiles_item']['lock_status'] != 'yes' || $this->_tpl_vars['artprofiles_item']['lockedUser'] != $this->_tpl_vars['userId']): ?> disabled="disabled" <?php endif; ?> type="button" onclick="return getComment('comment_refuse_<?php echo $this->_tpl_vars['artprofiles_item']['user_id']; ?>
', 'refuse_pop', <?php echo $this->_tpl_vars['artprofiles_item']['participate_id']; ?>
, <?php echo $this->_tpl_vars['artprofiles_item']['user_id']; ?>
,'<?php echo $this->_tpl_vars['artprofiles_item']['article_id']; ?>
','<?php echo $this->_tpl_vars['artprofiles_item']['repub_status']; ?>
')" id="closerepublish<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
" name="closerepublish" class="btn btn-danger">Republish</button>   -->
                <button type="button" data-toggle="modal" data-target="#republish" href="/correction/republishcorrectorpopup?close=yes&artId=<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
" id="closerepublish<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
" name="closerepublish" class="btn btn-danger">Re publish</button>
                <?php else: ?>
                <?php if ($this->_tpl_vars['artprofiles_item']['pstatus'] == ""): ?>
                <button type="button" data-toggle="modal" data-target="#republish" href="/correction/republishcorrectorpopup?nopart=no&close=no&artId=<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
" id="closerepublish<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
" name="closerepublish" class="btn btn-danger">Re publish</button>
                <?php else: ?>
                <button type="button" data-toggle="modal" data-target="#republish" href="/correction/republishcorrectorpopup?close=no&artId=<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
" id="closerepublish<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
" name="closerepublish" class="btn btn-danger">Re publish</button>
                <?php endif; ?>
                <?php endif; ?>
                <a data-toggle="modal" data-target="#groupprofile" href="/correction/corrector-group-profiles?artId=<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
"><button type="button" class="btn btn-success">Action</button></a>
            </td>
           <!-- <td>
            <div id="lock<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
">
                    <?php if ($this->_tpl_vars['artprofiles_item']['lock_status'] == 'yes'): ?>
                        <?php if ($this->_tpl_vars['artprofiles_item']['lockedUser'] == $this->_tpl_vars['userId']): ?>
                           <a data-toggle="modal" data-target="#groupprofile" href="/processao/group-profiles?artId=<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
"><i class="splashy-application_windows_edit"></i></a>&nbsp;&nbsp;
                           <a onclick="articlProfilelockSystem('<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
', 'unlock', 'articleprofile', '<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
');"><i class="splashy-lock_large_unlocked"></i></a>
                        <?php else: ?>
                           <div>Lock&eacute; par <?php echo $this->_tpl_vars['artprofiles_item']['lockedby_name'][0]['login']; ?>
</div>
                        <?php endif; ?>
                    <?php else: ?>
                           <a onclick="articlProfilelockSystem('<?php echo $this->_tpl_vars['artprofiles_item']['artId']; ?>
', 'lock', 'articleprofile', '<?php echo ($this->_foreach['artprofiles_loop']['iteration']-1); ?>
');"><i class="splashy-lock_large_locked"></i></a>
                    <?php endif; ?>
                </div>
            </td>-->
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>
    <div>
        <input type="hidden" id="delId" name="delId" value="<?php echo $_GET['aoId']; ?>
" />
        <button type="button" onclick="postBulkRepublish();" id="bulkrepublish1" name="bulkrepublish1" class="btn btn-info">Re publier</button>
        <div id="next">   </div>
        <div>
 </form>
	</div>
  </div>


<!--///for the group profiles popup///-->
<div class="modal4 hide fade" id="groupprofile">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Details of participations</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>

<!--///for mail content show up for refusing the profile for republish///-->
<div class="modal hide fade" id="refusemail">
    <div class="modal-header">
        <button class="close" onclick="closePopup('refusemail');">&times;</button>
        <h3>Refuse the Profile</h3>
    </div>
    <div class="modal-body">
        <textarea name="refusemailcontent" class="textarea" id="refusemailcontent"></textarea>
    </div>
    <div class="modal-footer">
         <input type="hidden" id="userid" name="userid" />
         <input type="hidden" id="partid" name="partid" />
         <input type="hidden" id="artid" name="artid" />
         <label class="uni-checkbox alignleft">
         <input type="checkbox" name="mailannouncement" id="mailannouncement" class="uni_style" />
          <b>announcement by email</b></label>
        <button type="button" id="ref_comment"  name="ref_comment" class="btn btn-danger" onclick="return acceptRefuseWriter('refuse_pop');" >Refuse</button>
    </div>
</div>

<!--///when republish the popup comes for edit details and mail for republish article///-->
<div class="modal4 hide fade" id="republish">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Re-publication of article</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>



