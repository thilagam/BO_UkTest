<?php /* Smarty version 2.6.19, created on 2015-07-01 13:04:40
         compiled from gebo/correction/corrector-group-profiles.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/correction/corrector-group-profiles.phtml', 302, false),array('modifier', 'utf8_encode', 'gebo/correction/corrector-group-profiles.phtml', 302, false),array('modifier', 'date_format', 'gebo/correction/corrector-group-profiles.phtml', 310, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
$(document).ready(function() {
     $("#refusemail").removeData(\'modal\');
     $(".pop_over").popover({trigger: \'hover\'});
    loadEditors(\'commentsRefuse\');
    loadEditors(\'commentsAccept\');
});
///black list the user/////////
function blackListUser(userid, mode, username, artid)
{
    if(mode == \'yes\')
    {
        var target_page = "/processao/blackcontributor?status=no&user_id="+userid;
        $.post(target_page, function(data){ //alert(data);
            var href="/correction/corrector-group-profiles?artId="+artid;
            $("#groupprofile").removeData(\'modal\');
            $(\'#groupprofile .modal-body\').load(href);
            $("#groupprofile").modal();
            $(".modal-backdrop:gt(0)").remove();
            smoke.alert(username+" Unblacklisted");
        });
    }
    else
    {
        var target_page = "/processao/blackcontributor?status=yes&user_id="+userid;
        $.post(target_page, function(data){ //alert(data);
           var href="/correction/corrector-group-profiles?artId="+artid;
            $("#groupprofile").removeData(\'modal\');
            $(\'#groupprofile .modal-body\').load(href);
            $("#groupprofile").modal();
            $(".modal-backdrop:gt(0)").remove();
            smoke.alert(username+" Blacklisted");
        });
    }

}

///////////for all contributors details list in popup//////////////////
function acceptRefuseWriter(button)
{
    var userid = $(\'#userid\').val();
    var partid = $(\'#partid\').val();
    var artid = $(\'#artid\').val();
   // alert(userid); alert(partid);alert(escape(comment));alert(artid);
    if(button == \'refuse_pop\')
    {
        var comment = tinyMCE.get(\'commentsRefuse\').getContent();
        var sendtofo;
        /////////There are no correctors to participate if the article is republished/////////////
        var target_page1 = "/correction/checklastcorrector?artid="+artid;
        $.post(target_page1, function(data1){  // alert(data1);
            var data2 = $.trim(data1);
            if(data2 == \'yes\')
            {
                smoke.confirm("No more correction can not participate, you are about to close this AO/article. Do you confirm your choice ?",function(i){
                    if (i)
                    {
                        var target_page = "/correction/selectcorrector?contrib_id="+userid+"&particip_id="+partid+"&button="+button+"&comment="+escape(comment)+"&nocrtclose=yes&art_id="+artid;
                        $.post(target_page, function(data){  //alert(data);
                            window.location.reload();

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
                                var target_page = "/correction/selectcorrector?contrib_id="+userid+"&particip_id="+partid+"&button=refuse_pop&comment="+escape(comment)+"&sendtofo="+sendtofo+"&mailannoucement="+mailannoucement+"&art_id="+artid;
                                $.post(target_page, function(data){  //alert(data);
                                    //////////to reload the contirbutor list////////////
                                    //window.location.reload();
                                    refreshModel(artid);
                                });
                            }
                            else
                            {
                                 sendtofo = \'no\';
                                var target_page = "/correction/selectcorrector?contrib_id="+userid+"&particip_id="+partid+"&button=refuse_pop&comment="+escape(comment)+"&sendtofo="+sendtofo+"&art_id="+artid;
                                $.post(target_page, function(data){  //alert(data);
                                    refreshModel(artid);
                                });
                            }
                        });
                    }
                    else
                    {
                        ///////////////////////////////////////////////////////////////
                        var target_page = "/correction/selectcorrector?contrib_id="+userid+"&particip_id="+partid+"&button=refuse_pop&comment="+escape(comment)+"&art_id="+artid;
                        $.post(target_page, function(data){  //alert(data);
                            refreshModel(artid);
                        });
                    }
                });
            }
        });
    }
    else
    {    //alert(userid); alert(partid);alert(escape(comment));alert(artid);
        var comment = tinyMCE.get(\'commentsAccept\').getContent();
        var target_page = "/correction/selectcorrector?contrib_id="+userid+"&particip_id="+partid+"&button=submit_pop&comment="+escape(comment)+"&art_id="+artid;
        $.post(target_page, function(data){  
            if($.trim(data)==\'selectedwriter\')
				smoke.alert(\'Ce contributeur a déjà été sélectionné pour la rédaction de cet article\');
			
			if($.trim(data)==\'selectedcorr\')
				smoke.alert(\'Ce correcteur a déjà été sélectionné pour la correction de cet article\');
				
			refreshModel(artid);
        });
    }
}

function refreshModel(artid)
{
    var href="/correction/corrector-group-profiles?artId="+artid;
    $("#groupprofile").removeData(\'modal\');
    $(\'#groupprofile .modal-body\').load(href);
    $("#groupprofile").modal();
    $(".modal-backdrop:gt(0)").remove();
}
function getComment(button, partid, userid, artid, status)
{
    $(\'#refusemail\').removeData(\'modal\');
    ///passing these 3 values for the popup for next post///
    $(\'#userid\').val(userid);
    $(\'#partid\').val(partid);
    $(\'#artid\').val(artid);
    var showcom=0;
    if(button==\'refuse_pop\')
    {
        if(status==\'published\')
        {
            $.ajax({
                url: "/ao/checkpaidinvoice",
                global: false,
                type: "POST",
                data: ({art_id:artid,part_id:partid}),
                dataType: "html",
                async:false,
                success: function(msg){
                    if(msg=="alert")
                    {
                        alert("Article is payed, You cannot refuse.");
                        showcom=1;
                    }
                }
            });
        }
        if (tinymce.getInstanceById(\'commentsRefuse\'))
        {
            tinymce.execCommand(\'mceRemoveControl\', true, \'commentsRefuse\');
            loadEditors(\'commentsRefuse\');
        }
        else  if (!tinymce.getInstanceById(\'commentsRefuse\'))
        {
            loadEditors(\'commentsRefuse\');
        }
        var mailid=\'29\';
        var target_page = "/correction/getcommentpopup?mailId="+mailid+"&contrib_id="+userid+"&particip_id="+partid+"&button="+button+"&artid="+artid;
        $.post(target_page, function(data){   //alert(\'data\');
            $(\'#commentsRefuse\').html(data);
        });
        $(\'#refusemail\').modal(\'show\');
    }
    else
    {
        //check same participation in writing & correction
		var target_page = "/correction/checkparticipation?contrib_id="+userid+"&artid="+artid;
         $.post(target_page, function(datacorr){    // alert(datacorr);
             if($.trim(datacorr)=="yes")
			 {
			  smoke.confirm("Ce contributeur a également participé pour la rédaction de cet article. Souhaitez-vous tout de même le sélectionner pour la correction ?",function(e){
                   if (e)
                    {
        if (tinymce.getInstanceById(\'commentsAccept\'))
        {
            tinymce.execCommand(\'mceRemoveControl\', true, \'commentsAccept\');
            loadEditors(\'commentsAccept\');
        }
        else  if (!tinymce.getInstanceById(\'commentsAccept\'))
        {
            loadEditors(\'commentsAccept\');
        }
        var target_page = "/correction/getcommentpopup?mailId=28&contrib_id="+userid+"&particip_id="+partid+"&button="+button+"&artid="+artid;
        $.post(target_page, function(data){   //alert(data);
            $(\'#commentsAccept\').html(data);
        });
        $(\'#Acceptmail\').modal(\'show\');
									}
				});
			 }
			 else
			 {
				if (tinymce.getInstanceById(\'commentsAccept\'))
				{
					tinymce.execCommand(\'mceRemoveControl\', true, \'commentsAccept\');
					loadEditors(\'commentsAccept\');
				}
				else  if (!tinymce.getInstanceById(\'commentsAccept\')) 
				{
					loadEditors(\'commentsAccept\');
				}
				
				var writerstatus=$("#writerstatus").val();
				if(writerstatus==\'under_study\') 
					var mail=28;
				else
					var mail=182;
				
				
				var target_page = "/correction/getcommentpopup?mailId="+mail+"&contrib_id="+userid+"&particip_id="+partid+"&button="+button+"&artid="+artid;
				$.post(target_page, function(data){   //alert(data);
					$(\'#commentsAccept\').html(data);
				});
				$(\'#Acceptmail\').modal(\'show\');
			 }
         });
    }
}

////get all attributes of the close and republish button to the abve the repulish butto/////
function shareAttributes()
{
    var userId = $("#userId").val();
    var artId = $("#articleId").val();
    var partId = $("#partId").val();
    var status = $("#status").val();
    getComment(\'comment_refuse_\'+userId, \'refuse_pop\', partId, userId, artId, status);
}
////show user details/////
function showUserAddDetails(loop)
{
    $(\'#collapsedetails\'+loop).toggle();
    $(\'#collapseOne\'+loop).height(\'auto\');
    if ($(\'#plusimg\'+loop).is(\'.splashy-add_small\')) {
        //$(\'#collapsedetails\'+loop).show();
        $(\'#plusimg\'+loop).removeClass(\'splashy-add_small\');
        $(\'#plusimg\'+loop).addClass(\'splashy-remove_minus_sign_small\');
    } else {
        //$(\'#collapsedetails\'+loop).hide();
        $(\'#plusimg\'+loop).removeClass(\'splashy-remove_minus_sign_small\');
        $(\'#plusimg\'+loop).addClass(\'splashy-add_small\');
    }
}

function showLastCycle(artid, mode)
{
    if(mode == \'show\') {
        jQuery(\'tr\').each(function(obj){
            $("#lastcycles"+obj).show();
        });
        $("#lastcyclelablehide").show();
        $("#lastcyclelableshow").hide();

    }else{
        jQuery(\'tr\').each(function(obj){
            $("#lastcycles"+obj).hide();
        });
        $("#lastcyclelablehide").hide();
        $("#lastcyclelableshow").show();
        var href="/correction/corrector-group-profiles?artId="+artid;
        $("#groupprofile").removeData(\'modal\');
        $(\'#groupprofile .modal-body\').load(href);
        $("#groupprofile").modal();
        $(".modal-backdrop:gt(0)").remove();
    }


}


</script>
'; ?>


<form action="/correction/selectallprofiles?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post" id="selectallprofile" name="selectallprofile" onsubmit="return validate3NewUser(1);">
<div class="row-fluid">
  <div class="span12">
      <a class="alignright btn btn-info hint--bottom hint--info" id="linkidrefresh" data-hint="Reload"  href="/correction/corrector-group-profiles?artId=<?php echo $this->_tpl_vars['delDetails'][0]['articleid']; ?>
"><img src="/BO/theme/gebo/img/gCons/reload.png" alt="" /></a>
      <table id="grptabledetails" class="table btn-gebo" >

        <tr>
            <td><b>Article : </b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['delDetails'][0]['artname'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
            <td><b>Nom Ao : </b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['delDetails'][0]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
            <td><b>Fourchette Prix : </b><?php echo $this->_tpl_vars['delDetails'][0]['correction_pricemin']; ?>
-<?php echo $this->_tpl_vars['delDetails'][0]['correction_pricemax']; ?>
&nbsp;&euro;</td>
            <td><b>Client : </b><?php echo $this->_tpl_vars['delDetails'][0]['company_name']; ?>
</td>
            <td><b>Cat&Eacute;gorie : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['delDetails'][0]['art_category'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
        </tr>
        <tr>
            <td><b>Total Participants : </b><?php if ($this->_tpl_vars['totalusers'] == ''): ?>0<?php else: ?><?php echo $this->_tpl_vars['totalusers']; ?>
<?php endif; ?></td>
            <td><b>Ao Cr&Eacute;e le : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['delDetails'][0]['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
            <td><b>Statut : </b><?php if ($this->_tpl_vars['delDetails'][0]['status'] == 'bid_corrector'): ?> New
                                 <?php elseif ($this->_tpl_vars['delDetails'][0]['status'] == 'bid_refused'): ?> Refused
                                 <?php elseif ($this->_tpl_vars['delDetails'][0]['status'] == 'published'): ?> Published
                                 <?php elseif ($this->_tpl_vars['delDetails'][0]['status'] == ''): ?> No Participants
                                 <?php else: ?> Ongoing <?php endif; ?>
            </td>
            <td><b>Refus : </b><?php if ($this->_tpl_vars['refused_arts'] == ''): ?>0<?php else: ?><?php echo $this->_tpl_vars['refused_arts']; ?>
<?php endif; ?></td>
            <td><?php if ($this->_tpl_vars['partStatus'][0]['current_stage'] == 'stage0' || $this->_tpl_vars['partStatus'][0]['current_stage'] == 'stage2' || $this->_tpl_vars['partStatus'][0]['status'] == 'published' || time() < $this->_tpl_vars['delDetails'][0]['correction_participationexpires']): ?>
                &nbsp;
                <?php elseif ($this->_tpl_vars['lastparticipant'] == 1): ?>
                <button type="button" data-toggle="modal" data-target="#republish" href="/correction/republishcorrectorpopup?close=yes&artId=<?php echo $this->_tpl_vars['delDetails'][0]['articleid']; ?>
" id="closerepublish" name="closerepublish" class="btn btn-danger">Re publier</button>
                <?php else: ?>
                <button type="button" data-toggle="modal" data-target="#republish" href="/correction/republishcorrectorpopup?close=no&artId=<?php echo $this->_tpl_vars['delDetails'][0]['articleid']; ?>
" id="closerepublish" name="closerepublish" class="btn btn-danger">Re publier</button><?php endif; ?>
            </td>
        </tr>
    </table>


    <table id="dt_gal" class="table table-bordered table-striped table_vam">
        <thead>
        <tr>
            <th>Sl.no</th>
            <th>Name</th>
            <th>Price Proposed</th>
            <th>Round</th>
            <th>date Participation</th>
            <th>Profile</th>
            <!-- <th>Language</th>
            <th>Profession</th> -->
            <th>Status</th>
            <th>Participations</th>
           <!--  <th>Refused</th>
            <th>Validated</th>
            <th>Disapproved</th
            <th>Closed</th>
            <th>Published</th> -->
            <th>Action</th>
            <th>Black list</th>
            <th>Comments</th>
        </tr>
        </thead>
        <tbody>

         <?php $_from = $this->_tpl_vars['contribDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['grpprofiles_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['grpprofiles_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['grpprofiles_key'] => $this->_tpl_vars['grpprofiles_item']):
        $this->_foreach['grpprofiles_loop']['iteration']++;
?>
        <tr <?php if ($this->_tpl_vars['grpprofiles_item'][0]['cyclecount'] != 0): ?> id="lastcycles<?php echo ($this->_foreach['grpprofiles_loop']['iteration']-1)+1; ?>
" style="color:#F20A58;display:none;" <?php endif; ?>>
            <td><a id="elaborate<?php echo ($this->_foreach['grpprofiles_loop']['iteration']-1)+1; ?>
" onclick="showUserAddDetails('<?php echo ($this->_foreach['grpprofiles_loop']['iteration']-1)+1; ?>
');" class="accordion-toggle collapsed" data-toggle="collapse"
                   data-parent="#accordion<?php echo ($this->_foreach['grpprofiles_loop']['iteration']-1)+1; ?>
" href="#collapseOne<?php echo ($this->_foreach['grpprofiles_loop']['iteration']-1)+1; ?>
">
                <i id="plusimg<?php echo ($this->_foreach['grpprofiles_loop']['iteration']-1)+1; ?>
" class="splashy-add_small"></i></a><?php echo ($this->_foreach['grpprofiles_loop']['iteration']-1)+1; ?>
</td>

            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
            <td><?php echo $this->_tpl_vars['grpprofiles_item'][0]['price_corrector']; ?>
</td>
            <td><?php if ($this->_tpl_vars['grpprofiles_item'][0]['cyclecount'] == '0'): ?>
                <?php $this->assign('iSum', $this->_tpl_vars['grpprofiles_item'][0]['cyclecount']+$this->_tpl_vars['maxcycle']+1); ?>enchère <?php echo $this->_tpl_vars['iSum']; ?>

                <?php else: ?>enchère <?php echo $this->_tpl_vars['grpprofiles_item'][0]['cyclecount']; ?>
 <?php endif; ?></td>
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
</td>
            <td><?php if ($this->_tpl_vars['grpprofiles_item'][0]['type2'] == 'corrector'): ?>
                    <?php if ($this->_tpl_vars['grpprofiles_item'][0]['profile_type2'] == 'junior'): ?><span class="label label-info">JUNIOR</span>
                    <?php elseif ($this->_tpl_vars['grpprofiles_item'][0]['profile_type2'] == 'senior'): ?> <span class="label label-info">SENIOR</span>
                    <?php elseif ($this->_tpl_vars['grpprofiles_item'][0]['profile_type2'] == 'sub-junior'): ?> <span class="label label-info">sub junior</span><?php endif; ?>
                <?php else: ?>
                    <?php if ($this->_tpl_vars['grpprofiles_item'][0]['profile_type'] == 'junior'): ?><span class="label label-info">JUNIOR</span>
                    <?php elseif ($this->_tpl_vars['grpprofiles_item'][0]['profile_type'] == 'senior'): ?> <span class="label label-info">SENIOR</span>
                    <?php elseif ($this->_tpl_vars['grpprofiles_item'][0]['profile_type'] == 'sub-junior'): ?> <span class="label label-info">sub junior</span><?php endif; ?>
                <?php endif; ?>
            </td>
            <!-- <td><?php echo $this->_tpl_vars['grpprofiles_item'][0]['language']; ?>
</td>
            <td><?php echo $this->_tpl_vars['grpprofiles_item'][0]['profession']; ?>
</td> -->
            <td>
                <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid'): ?>
                   <span class="label label-warning">Valid</span>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid_refused'): ?>
                   <span class="label label-important">Refuse</span>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid_corrector' || $this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid_nonpremium'): ?>
                    <span class="label label-warning">waiting</span>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'under_study'): ?>
                    <span class="label label-warning"><?php if ($this->_tpl_vars['grpprofiles_item'][0]['current_stage'] == 'stage1'): ?>Validated - in Phase 1 study <?php else: ?>Validated - study in finals<?php endif; ?></span>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'closed'): ?>
                    <span class="label label-important"><?php if ($this->_tpl_vars['grpprofiles_item'][0]['current_stage']): ?>refuse definite<?php else: ?>refuse definite<?php endif; ?></span>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'published'): ?>
                    <span class="label label-warning">Published</span>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid_temp'): ?>
                    <span class="label label-warning">Validation - waiting</span>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid_refused_temp'): ?>
                    <span class="label label-important">Refusal - waiting</span>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'on_hold'): ?>
                    <span class="label label-warning"><?php if ($this->_tpl_vars['grpprofiles_item'][0]['current_stage'] == 'stage1'): ?>Lock s1<?php else: ?>lock phase final<?php endif; ?></span>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'disapproved'): ?>
                    <span class="label label-important">Refusal for resubmission</span>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'time_out'): ?>
                    <span class="label label-warning">Time out</span>
                <?php endif; ?>
            </td>
            <td><?php echo $this->_tpl_vars['grpprofiles_item'][3]['no_paritcipations']; ?>
</td>
           <!--  <td><?php echo $this->_tpl_vars['grpprofiles_item'][2]['no_disapproved']; ?>
</td>
            <td><?php echo $this->_tpl_vars['grpprofiles_item'][5]['validated']; ?>
</td>
            <td><?php echo $this->_tpl_vars['grpprofiles_item'][2]['no_disapproved']; ?>
</td>
            <td><?php echo $this->_tpl_vars['grpprofiles_item'][9]['closed']; ?>
</td>
            <td><?php echo $this->_tpl_vars['grpprofiles_item'][1]['no_approved']; ?>
</td> -->
            <td style="width: 185px;"><?php if ($this->_tpl_vars['grpprofiles_item'][0]['cyclecount'] != 0): ?> &nbsp;
                <?php elseif (time() > $this->_tpl_vars['grpprofiles_item'][0]['correction_participationexpires'] && $this->_tpl_vars['grpprofiles_item'][0]['correction_participationexpires'] != '0'): ?>
                    <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid_corrector' || $this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid' || $this->_tpl_vars['grpprofiles_item'][0]['status'] == 'under_study' || $this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid_temp' || $this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid_refused_temp' || $this->_tpl_vars['grpprofiles_item'][0]['status'] == 'disapproved'): ?>
                    <?php if ($this->_tpl_vars['grpprofiles_item'][0]['blackstatus'] != 'yes'): ?>
                    <?php if ($this->_tpl_vars['lastparticipant'] == 1): ?>
                    <!--<button class="btn hint--bottom hint--info" data-hint="Refuser et re-publier" type="button" name="refuse_pop"  id="Refuser_<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
" data-toggle="modal" data-target="#republish" onclick="return testfunc();" href="/processao/republishpopup?close=yes&artId=<?php echo $this->_tpl_vars['grpprofiles_item'][0]['id']; ?>
" style="background:#F5AA1A"><i class="splashy-thumb_down"></i></button> -->
                   <button class="btn hint--bottom hint--info" data-hint="Refuser" type="button" name="refuse_pop" id="Refuser_<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
"  onclick="return getComment('refuse_pop', '<?php echo $this->_tpl_vars['grpprofiles_item'][0]['partId']; ?>
', '<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
','<?php echo $this->_tpl_vars['grpprofiles_item'][0]['id']; ?>
','<?php echo $this->_tpl_vars['grpprofiles_item'][0]['status']; ?>
')" style="background:#F5AA1A"><i class="splashy-thumb_down"></i> </button>

                    <input type="hidden" id="userId" name="userId" value="<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
">
                    <input type="hidden" id="partId" name="partId" value="<?php echo $this->_tpl_vars['grpprofiles_item'][0]['partId']; ?>
">
                    <input type="hidden" id="articleId" name="articleId" value="<?php echo $this->_tpl_vars['delDetails'][0]['articleid']; ?>
">
                    <input type="hidden" id="status" name="status" value="<?php echo $this->_tpl_vars['grpprofiles_item'][0]['status']; ?>
">
                    <?php else: ?>
                    <button class="btn hint--bottom hint--info" data-hint="Refuser" type="button" name="refuse_pop" id="Refuser_<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
"  onclick="return getComment('refuse_pop', '<?php echo $this->_tpl_vars['grpprofiles_item'][0]['partId']; ?>
', '<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
','<?php echo $this->_tpl_vars['grpprofiles_item'][0]['id']; ?>
','<?php echo $this->_tpl_vars['grpprofiles_item'][0]['status']; ?>
')"><i class="splashy-thumb_down"></i> </button>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'published' && $this->_tpl_vars['grpprofiles_item'][0]['premium_option'] == '0'): ?>
                    <button class="btn hint--bottom hint--info" data-hint="Refuser" type="button" name="refuse_pop" id="Refuser_<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
"  onclick="return getComment('refuse_pop', '<?php echo $this->_tpl_vars['grpprofiles_item'][0]['partId']; ?>
', '<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
','<?php echo $this->_tpl_vars['grpprofiles_item'][0]['id']; ?>
','<?php echo $this->_tpl_vars['grpprofiles_item'][0]['status']; ?>
')"> <i class="splashy-thumb_down"></i></button>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid_corrector' || $this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid_temp' || $this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid_refused_temp'): ?>
                    <?php if ($this->_tpl_vars['anyvalidatedCorrector'] == 'NO' && $this->_tpl_vars['grpprofiles_item'][0]['blackstatus'] != 'yes' && $this->_tpl_vars['grpprofiles_item'][0]['identifier'] != $this->_tpl_vars['selectedwriter']): ?>
                    <button class="btn hint--bottom hint--info" data-hint="Valider" type="button" name="submit_pop" id="Accept_<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
" onclick="return getComment('submit_pop', '<?php echo $this->_tpl_vars['grpprofiles_item'][0]['partId']; ?>
', '<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
','<?php echo $this->_tpl_vars['grpprofiles_item'][0]['id']; ?>
','<?php echo $this->_tpl_vars['grpprofiles_item'][0]['status']; ?>
')"><i class="splashy-thumb_up"></i></button>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['grpprofiles_item'][0]['status'] == 'bid_refused'): ?>
                    <?php if ($this->_tpl_vars['anyvalidatedCorrector'] == 'NO' && $this->_tpl_vars['grpprofiles_item'][0]['identifier'] != $this->_tpl_vars['selectedwriter']): ?>
                    <button class="btn hint--bottom hint--info" data-hint="Valider" type="button" name="submit_pop_refused" id="Accepter_<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
" onclick="return getComment('submit_pop', '<?php echo $this->_tpl_vars['grpprofiles_item'][0]['partId']; ?>
', '<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
','<?php echo $this->_tpl_vars['grpprofiles_item'][0]['id']; ?>
','<?php echo $this->_tpl_vars['grpprofiles_item'][0]['status']; ?>
')"><i class="splashy-thumb_up"></i> </button>
                    <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <button class="btn hint--bottom hint--info" data-hint="Contacter" type="button" name="send_mail"  onclick="window.open('/mails/composemail?submenuId=ML4-SL1&user_id=<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
')"> <i class="splashy-mail_light"></i></button>
                <a class="btn hint--bottom hint--info" data-hint="Commenter"  data-target="#comments" data-toggle="modal"  name="send_comment"  href="/proofread/getallbousercomments?userId=<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
&artid=<?php echo $this->_tpl_vars['grpprofiles_item'][0]['id']; ?>
" ><i class="splashy-comments_reply"></i></a>
            </td>
            <td><!--<div id="text-toggle-button<?php echo ($this->_foreach['grpprofiles_loop']['iteration']-1); ?>
" class="toggle-button">
                    <input name="blackstatus<?php echo ($this->_foreach['grpprofiles_loop']['iteration']-1); ?>
" id="blackstatus<?php echo ($this->_foreach['grpprofiles_loop']['iteration']-1); ?>
" type="checkbox" value="<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
" <?php if ($this->_tpl_vars['grpprofiles_item'][0]['blackstatus'] == 'yes'): ?> checked="checked" <?php endif; ?> >
                </div>-->
                <?php if ($this->_tpl_vars['grpprofiles_item'][0]['blackstatus'] == 'yes'): ?>
                <button type="button"  id="blackstatusyes<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
" onclick="blackListUser('<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
', 'yes', '<?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
', '<?php echo $this->_tpl_vars['delDetails'][0]['articleid']; ?>
') " class="btn btn-danger hint--bottom hint--info" data-hint="click to unblacklist">Yes</button>
                <?php else: ?>
                <button type="button"  id="blackstatusno<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
" onclick="blackListUser('<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
', 'no', '<?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
', '<?php echo $this->_tpl_vars['delDetails'][0]['articleid']; ?>
') " class="btn btn-info hint--bottom hint--info" data-hint="click to blacklist">No</button>
                <?php endif; ?>
            </td>
            <td><div id="fl_a">
            <?php if ($this->_tpl_vars['grpprofiles_item'][0]['contrib_parts_inao'] != 0): ?>
                </div>Already selected profile<span class="label label-important"><?php echo $this->_tpl_vars['grpprofiles_item'][0]['contrib_parts_inao']; ?>
</span><br> articles on this mission
            <?php endif; ?>
            </td>

        </tr>
        <tr id="collapsedetails<?php echo ($this->_foreach['grpprofiles_loop']['iteration']-1)+1; ?>
" class="collapse" style="display: none;" >
        <td colspan="11">
            <div  id="collapseOne<?php echo ($this->_foreach['grpprofiles_loop']['iteration']-1)+1; ?>
" class="accordion-body collapse" >
                 <table class='table table-bordered tdleftalign'>
                    <tr><td><b>Name</b></td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
                        <td><b>Email</b></td>
						<td><a href="/user/contributor-edit?submenuId=ML3-SL6&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['grpprofiles_item'][0]['identifier']; ?>
"><?php echo $this->_tpl_vars['grpprofiles_item'][0]['email']; ?>
</a></td>
                        <td><b>Articles Refuses</b></td>
						<td><?php echo $this->_tpl_vars['grpprofiles_item'][2]['no_disapproved']; ?>
</td></tr>
                    <tr><td><b>language</b></td>
                        <td><b><?php echo $this->_tpl_vars['grpprofiles_item'][0]['language']; ?>
</b>&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['language_more'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
                        <td><b>registered since</b></td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['doj'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
                        <td><b>Articles Valid</b></td>
						<td><?php echo $this->_tpl_vars['grpprofiles_item'][5]['validated']; ?>
</td></tr>

                    <tr><td colspan="1"><b>Formation</b></td>
						<td colspan="3">
                            <b>Formation - </b><?php echo $this->_tpl_vars['grpprofiles_item'][0]['educationDetails'][0]['title']; ?>

                            <b>School, university -</b> <?php echo $this->_tpl_vars['grpprofiles_item'][0]['educationDetails'][0]['institute']; ?>

                            <!--<b>Duration -</b>
                            <?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['educationDetails'][0]['from_month'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B") : smarty_modifier_date_format($_tmp, "%B")); ?>
/<?php echo $this->_tpl_vars['grpprofiles_item'][0]['educationDetails'][0]['from_year']; ?>

                            to
                            <?php if ($this->_tpl_vars['grpprofiles_item'][0]['educationDetails'][0]['still_working'] != 'yes'): ?>
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['educationDetails'][0]['to_month'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B") : smarty_modifier_date_format($_tmp, "%B")); ?>
/<?php echo $this->_tpl_vars['grpprofiles_item'][0]['educationDetails'][0]['to_year']; ?>

                            <?php else: ?>
                            current
                            <?php endif; ?>-->
                        </td>
                        <td colspan=""><b>Articles Published</b></td>
                        <td><!--<?php echo $this->_tpl_vars['grpprofiles_item'][1]['no_approved']; ?>
--><?php echo $this->_tpl_vars['grpprofiles_item'][0]['successrate']; ?>
</td></tr>
                    <tr><td><b>Experiences<br> professionals</b></td>
                        <td colspan="3">
                             <b>work - </b><?php echo $this->_tpl_vars['grpprofiles_item'][0]['workDetails'][0]['title']; ?>

                             <b>enterprise -</b> <?php echo $this->_tpl_vars['grpprofiles_item'][0]['workDetails'][0]['institute']; ?>

                             <!--<b>Duration -</b>
                             <?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['workDetails'][0]['from_month'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B") : smarty_modifier_date_format($_tmp, "%B")); ?>
/<?php echo $this->_tpl_vars['grpprofiles_item'][0]['workDetails'][0]['from_year']; ?>

                             to
                            <?php if ($this->_tpl_vars['grpprofiles_item'][0]['workDetails'][0]['still_working'] != 'yes'): ?>
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['workDetails'][0]['to_month'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B") : smarty_modifier_date_format($_tmp, "%B")); ?>
/<?php echo $this->_tpl_vars['grpprofiles_item'][0]['workDetails'][0]['to_year']; ?>

                            <?php else: ?>
                                current
                            <?php endif; ?>-->

                        </td>
                        <td><b>Closed</b></td>
                        <td><?php echo $this->_tpl_vars['grpprofiles_item'][9]['closed']; ?>
</td>
                    </tr>
                    <tr><td colspan="1"><b>Catagories</b></td>
                        <td colspan="5"><?php echo ((is_array($_tmp=$this->_tpl_vars['grpprofiles_item'][0]['categories'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
                    </tr>
                </table>
            </div></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>
      <?php if ($this->_tpl_vars['contribDetails'] == ''): ?><div class="span5"></div>No Participants<?php endif; ?>
      <?php if ($this->_tpl_vars['grpprofiles_item'][0]['cyclecount'] != 0): ?>
        <span class="label label-info" id="lastcyclelableshow" onclick="showLastCycle('<?php echo $this->_tpl_vars['delDetails'][0]['articleid']; ?>
', 'show');">Show previous auction(s)</span>
      <span class="label label-info hide" id="lastcyclelablehide" onclick="showLastCycle('<?php echo $this->_tpl_vars['delDetails'][0]['articleid']; ?>
', 'hide');">Hide previous auction(s)</span>
      <?php endif; ?>
	   <input type="hidden" name="writerstatus" id="writerstatus" value="<?php echo $this->_tpl_vars['writerstatus']; ?>
" />
  </div>
</div>
</form>
<!--///for mail content show up for accecpting the profile///-->
<div class="modal hide fade" id="Acceptmail">
    <div class="modal-header">
        <button class="close" onclick="closePopup('Acceptmail');">×</button>
        <h3>SELECT PARTICIPANT</h3>
    </div>
    <div class="modal-body">
        <textarea name="commentsAccept" class="textarea" id="commentsAccept"></textarea>
    </div>
    <div class="modal-footer">
         <input type="hidden" id="userid" name="userid" />
         <input type="hidden" id="partid" name="partid" />
         <input type="hidden" id="artid" name="artid" />
        <button type="button" id="accp_comment"  name="accp_comment" class="btn btn-success"  onclick="return acceptRefuseWriter('submit_pop');" >Valider</button>
    </div>
</div>
<!--///for mail content show up for refusing the profile///-->
<div class="modal hide fade" id="refusemail">
    <div class="modal-header">
        <button class="close" onclick="closePopup('refusemail');">×</button>
        <h3>Refuse Participant</h3>
    </div>
    <div class="modal-body">
        <textarea name="commentsRefuse" class="textarea" id="commentsRefuse"></textarea>
    </div>
    <div class="modal-footer">
         <input type="hidden" id="userid" name="userid" />
         <input type="hidden" id="partid" name="partid" />
         <input type="hidden" id="artid" name="artid" />
         <label class="uni-checkbox alignleft">
         <?php if ($this->_tpl_vars['lastparticipant'] == 1): ?>
         <input type="checkbox" name="mailannouncement" id="mailannouncement" class="uni_style" />
          <b>PREVENIR PAR EMAIL</b></label><?php endif; ?>
        <button type="button" id="ref_comment"  name="ref_comment" class="btn btn-danger" onclick="return acceptRefuseWriter('refuse_pop');" >Refuse</button>
    </div>
</div>
<!--///BO user send comments to for the participant ///-->
<div class="modal hide fade" id="comments">
    <div class="modal-header">
        <button class="close" onclick="closePopup('comments');">&times;</button>
        <h3>Add A Comment</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">

    </div>
</div>
<!--///for the group profiles popup///-->
<div class="modal4 hide fade" id="groupprofile">
    <div class="modal-header">
        <button  class="close" onclick="closePopup('groupprofile');">&times;</button>
        <h3>Details of participations</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>