{literal}
<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
function stripslashes(str)
{
    str=str.replace(/\\'/g,'\'');
    str=str.replace(/\\"/g,'"');
    str=str.replace(/\\0/g,'\0');
    str=str.replace(/\\\\/g,'\\');
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
    var partId = popPartId;
    var crtpartId = crtPartId;
    var newDate = $("#aodeldate").val()+" 23:59:10";
    var d = new Date();
    var  nowtime = d.getFullYear()+'/'+(d.getMonth()+1)+'/'+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
    //alert(newDate);alert(partId);alert(nowtime);
    var target_page = "/proofread/refusealert?aodeldate="+newDate+"&partId="+partId+"&currenttime="+nowtime;
    $.post(target_page, function(data){ //alert(data);
        var obj = $.parseJSON(data);
        if(obj.message != 0)
        {
            //alert(obj.message);
        }
        var  resubtime = obj.resub;
        var footer  = "Vous avez " + resubtime + " pour nous faire parvenir votre article modifié. Nous vous rappelons que si les consignes ne sont pas respectées, nous pouvons vous demander de modifier votre article de nouveau."
        /* "\nNous faisons jusqu'à deux A/R. Au troisième refus, l'article sera automatiquement remis en appel d'offres et l'article ne pourra être rétribué."+
        "\nL'équipe d'Edit Place.com vous remercie d'avoir fait confiance à ses services. "*/;
        $("#content_footer").text(decode_utf8(footer));
    });
    //////////////////////////////////////////////////////////////////////////////////
    $("#pop_partId").val(popPartId);
    $("#pop_crtpartId").val(crtpartId);
    var popBox=$("#pop-s2comments");
    popBox.show();
    $(".boxcol2 :checkbox").attr("checked", false);
    $("#comment_s2").text('')
    $("#pop_disapproves2_permanent").hide();
    $("#pop_disapproves2").show();
    $("#content_footerPermanent").hide();
    $("#content_footer").show();
    $("#comment_validate_"+popPartId).hide();
    $("#s2art_approve").hide();
    $("#commentsdiv2").show();
    $("#commentsdiv").hide();
}
function writeS2CommentsPermanent(popPartId, crtPartId)
{
    /////////////alert the left over time of contributor to corrector///
    var partId = popPartId;
    var crtpartId = crtPartId;
    var newDate = $("#aodeldate").val()+" 23:59:10";
    var d = new Date();
    var  nowtime = d.getFullYear()+'/'+(d.getMonth()+1)+'/'+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
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
    $("#comment_s2").text('')
    // var $b = $('input[type=checkbox]');
    var countselected = $b.filter(':checked').length;
    ////////////////////////////////////
    var selected = new Array();
    $b.filter(':checked').each(function() {
        selected.push($(this).attr('value'));
        $("#hide_total1").val(selected);////for posting the value which are checked
    });
    ////////////////////////////////////
    for(var i=1; i<=countselected; i++)
    {
        var target_page = "/template/getrefusevalidtemp?valtempId="+selected[i-1];
        $.post(target_page, function(data){
            var obj = $.parseJSON(data);
            $("#comment_s2").append(stripslashes(obj[0].content)+'\n\n');
        });
    }
    $("#pop_disapproves2_permanent").show();
    $("#pop_disapproves2").hide();
    $("#content_footerPermanent").show();
    $("#content_footer").hide();
    $("#comment_validate_"+popPartId).hide();
    $("#s2art_approve").hide();
    $("#commentsdiv2").show();
    $("#commentsdiv2").show();
    $("#commentsdiv").hide();
}
function sendToFo()
{
    var r=confirm("L'article sera remis en ligne");
    if (r==true)
    {
        var r1=confirm("Announcement by email");
        if (r1==true)
        {
            $("#sendtofo").val('yes');
            $("#crtsendtofo").val('yes');
            $("#anouncebyemail").val('yes');
            $("#anouncebyemail2").val('yes');
            return true;
        }

        $("#sendtofo").val('yes');
        $("#crtsendtofo").val('yes');
        return true;
    }
    else
    {
        $("#sendtofo").val('no');
        $("#crtsendtofo").val('no');
        return true;
    }
}
function closePop()
{
    $("#pop-s2comments").hide();
    $("#pop-box4").hide();
    $("#pop-box3").hide();
    $("#light1").hide();
    $(".over-b").hide();
    var overLay=$("#fade");
    overLay.hide();
}
function checkServices(id,crtid)
{
    $("#participateId").val(id);
    $("#partsIds").val(id+"_"+crtid); ///this carries regural partId and corrector part id///.
    var optionscount = $('#hid_options').val();
    var $b = $('#optionsdiv input[type=checkbox]');
    var $c = $('#checksdiv input[type=checkbox]');
    var blen = $b.length;
    var clen = $c.length;
    var countselected = $b.filter(':checked').length;
    var countcheckselected = $c.filter(':checked').length;
    if(blen != countselected || countcheckselected != 3)
    {
        alert('Merci de cocher les options SEO et la check list');
        return false;
    }
    else if((blen == countselected || blen==0) && countcheckselected == 3)
    {
        var c = confirm('Toutes les autres participations seront refus\u00e9es, voulez-vous continuer ?');
        if(c == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
function passParticipateId(id)
{
    $("#participateId").val(id);
    //document.forms["s1correction"].submit();
}
function getRefuseTemp(valtempId)
{
    //alert(valtempId);
    $("#comment_s2").text('');
    var $b = $('input[type=checkbox]');
    var countselected = $b.filter(':checked').length;
    ////////////////////////////////////
    var selected = new Array();
    $b.filter(':checked').each(function() {
        selected.push($(this).attr('value'));
        $("#hide_total2").val(selected);////for posting the value which are checked
    });
    ////////////////////////////////////
    for(var i=1; i<=countselected; i++)
    {
        var target_page = "/template/getrefusevalidtemp?valtempId="+selected[i-1];
        $.post(target_page, function(data){
            var obj = $.parseJSON(data);
            $("#comment_s2").append(stripslashes(obj[0].content)+'\n\n');
        });

    }
}
$(document).ready(function(){
    $("input:text").focus(function () {
        $(this).blur();
    });
    $('.service_tooltip').qtip({
        position: {
            corner: {
                target: 'top',
                tooltip: 'bottomLeft'
            }
        },
        style: {
            name: 'cream',
            padding: '-70px -13px',
            width: {
                max: 200,
                min: 0
            },
            tip: true
        }
    });
});
function getParticipateUserInfo(userid, partid)
{
    var popBox=$("#pop-box4");
    var overLay=$("#fade");
    var top=$(this).scrollTop();
    var box_top=popBox.css('top', (parseInt(110) + top) + 'px');
    var overlay_top=overLay.css('height', (parseInt(1200) + top) + 'px');

    var target_page = "/processao/showcontribprofile?userid="+userid+"&partid="+partid;

    $.post(target_page, function(data){
        var obj = $.parseJSON(data);
        popBox.show();
        overLay.show();
        if(obj[0].first_name == '')
        {
            $("#name").text(obj[0].email);
        }
        else
        {
            $("#name").text(obj[0].first_name+" "+obj[0].last_name);
        }
        $("#profession").text(obj[0].profession);
        $("#degree").text(obj[0].degree);
        $("#language").text(obj[0].language);
        $("#favcat").text(obj[0].favourite_category);
        $("#participations").text(obj[0].no_paritcipations);
        $("#approved").text(obj[1].no_approved);
        $("#disapproved").text(obj[2].no_disapproved);
        $("#price").text(obj[0].price_user);
        //$("#prartinfo").html(data);
    });
    $("#particip_id").val(partid);
    $("#contrib_id").val(userid);
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
    var popBox=$("#light1");
    var overLay=$("#fade");
    var top=$(this).scrollTop();
    var box_top=popBox.css('top', (parseInt(110) + top) + 'px');
    var overlay_top=overLay.css('height', (parseInt(1200) + top) + 'px');

    var target_page = "/proofread/showkeyworddensity?artprocessId="+artproid+"&density="+densval;

    $.post(target_page, function(data){ //alert(data);
        // var obj = $.parseJSON(data);
        popBox.show();
        overLay.show();
        popBox.html(data);

    });

}

function checkplagiarism(artpro)
{
    var popBox=$("#light1");
    var overLay=$("#fade");
    var top=$(this).scrollTop();
    var box_top=popBox.css('top', (parseInt(70) + top) + 'px');
    var overlay_top=overLay.css('height', (parseInt(1200) + top) + 'px');

    var target_page = "/proofread/contentplagiarism?artprocessId="+artpro;

    $.post(target_page, function(data){
        popBox.show();
        overLay.show();
        popBox.html(data);
    });
}

// onmouseover Tool tip common content
$(function()
{
    var hideDelay = 50;
    var currentID;
    var hideTimer = null;

    // One instance that's reused to show info for the current user
    var container = $('#PlagcontentContainer');
    $('body').append(container);

    //User mouseover
    $('.PlagcontentTrigger').live('mouseover', function()
    {
        // format of 'rel' content
        var content = $(this).attr('rel');


        if (hideTimer)
            clearTimeout(hideTimer);

        var pos = $(this).offset();
        var width = $(this).width();
        container.css({
            left: (pos.left + width) + 'px',
            top: pos.top - 80 + 'px'
        });

        $('#PlagcontentContent').html('');
        $('#PlagcontentContent').html('<img src="http://www.h2obazaar.com/h2obazaarlogin/images/loading.gif" />');
        $('#PlagcontentContent').html(content);

        /* $.ajax({
             type: 'GET',
             url: '/ao/pollpopup',
             data: 'user=' + userid + '&tooltype=' + type,
             //data: 'tooltipuserid=' + userID,
             success: function(data)
             {   //alert(data);
                     var text = $(data).find('.PlagcontentResult').html();
                     $('#PlagcontentContent').html(data);

             }
         });*/

        container.css('display', 'block');
    });

    $('.PlagcontentTrigger').live('mouseout', function()
    {
        if (hideTimer)
            clearTimeout(hideTimer);
        hideTimer = setTimeout(function()
        {
            container.css('display', 'none');
        }, hideDelay);
    });

    // Allow mouse over of details without hiding details
    $('#PlagcontentContainer').mouseover(function()
    {
        if (hideTimer)
            clearTimeout(hideTimer);
    });

    // Hide after mouseout
    $('#PlagcontentContainer').mouseout(function()
    {
        if (hideTimer)
            clearTimeout(hideTimer);
        hideTimer = setTimeout(function()
        {
            container.css('display', 'none');
        }, hideDelay);
    });
});

function refuseAlert()
{
    alert('do you really want to refuse it permanently');
    return true;
}
/*function getSendComments(partId, artId)
{
    var popBox=$("#pop-box");
    var overLay=$(".over-b");
    var top=$(this).scrollTop();
    var box_top=popBox.css('top', (parseInt(110) + top) + 'px');
    var overlay_top=overLay.css('height', (parseInt(1200) + top) + 'px');

    var target_page = "/proofread/getcorrectorcomments?partId="+partId+"&artId="+artId;
    $.post(target_page, function(data){ //alert(data);
       popBox.html(data);
       popBox.show();

    });
}*/
/////////get the pop up from which correctro will get and send the his comments///////////
function getSendComments(partId, artId, userId)
{
    var popBox=$("#pop-box3");
    var overLay=$("#fade");
    var top=$(this).scrollTop();
    var box_top=popBox.css('top', (parseInt(110) + top) + 'px');
    var overlay_top=overLay.css('height', (parseInt(800) + top) + 'px');
    if(userId == 0)
    {
        var target_page = "/proofread/getcorrectorcomments?partId="+partId+"&stage=s2&artId="+artId;
    }
    else if(partId == 0)
    {
        var target_page = "/proofread/getallbousercomments?userId="+userId+"&artid="+artId;
    }
    $.post(target_page, function(data){ //alert(data);
        popBox.html(data);
        overLay.show();
        popBox.show();

    });
}
////to send the email when validate the user with edited option ////////
function getComment(parttype, crtpartid, partid)
{
    if(parttype == 'regural')
    {
        var commentBox=$("#comment_validate_"+partid);
        var editor = CKEDITOR.instances['commentsValidate_'+partid];
        if (editor) { editor.destroy(true); }
        var editor = CKEDITOR.replace('commentsValidate_'+partid,
                {
                    language: 'de',
                    uiColor: '#D9DDDC',
                    enterMode : CKEDITOR.ENTER_BR,
                    removePlugins : 'resize',
                    toolbar :
                            [
                                ['Undo','Redo'],
                                ['Find','Replace','-','SelectAll','RemoveFormat'],
                                ['Link', 'Unlink', 'Image'],
                                '/',
                                ['FontSize', 'Bold', 'Italic','Underline'],
                                ['NumberedList','BulletedList','-','Blockquote'],
                                ['TextColor', '-', 'Smiley','SpecialChar', '-', 'Maximize']
                            ]
                }
        );
        //////////////////////////////////////
        var target_page = "/processao/getcommentpopup?mailId=53&particip_id="+partid;  //
        $.post(target_page, function(data){  // alert(data);
            //$("#commentsRefuse_"+userid).val(data);
            CKEDITOR.instances['commentsValidate_'+partid].setData(data);
            //$("#s2art_approve_"+partid).hide();
            $("#s2art_approve").show();
        });
        $("#commentsdiv2").hide();
        commentBox.show();
    }
    else
    {
        var commentBox=$("#comment_crtvalidate_"+crtpartid);
        var editor = CKEDITOR.instances['commentsCrtValidate_'+crtpartid];
        if (editor) { editor.destroy(true); }
        var editor = CKEDITOR.replace('commentsCrtValidate_'+crtpartid,
                {
                    language: 'de',
                    uiColor: '#D9DDDC',
                    enterMode : CKEDITOR.ENTER_BR,
                    removePlugins : 'resize',
                    toolbar :
                            [
                                ['Undo','Redo'],
                                ['Find','Replace','-','SelectAll','RemoveFormat'],
                                ['Link', 'Unlink', 'Image'],
                                '/',
                                ['FontSize', 'Bold', 'Italic','Underline'],
                                ['NumberedList','BulletedList','-','Blockquote'],
                                ['TextColor', '-', 'Smiley','SpecialChar', '-', 'Maximize']
                            ]
                }
        );
        //////////////////////////////////////
        var target_page = "/processao/getcommentpopup?mailId=53&crt_particip_id="+crtpartid+"&particip_id="+partid;//
        $.post(target_page, function(data){   //alert(data);
            //$("#commentsRefuse_"+userid).val(data);
            CKEDITOR.instances['commentsCrtValidate_'+crtpartid].setData(data);
            //  $("#s2art_approve_"+partid).hide();
            $("#s2art_approve").show();
        });
        $("#commentsdiv2").hide();
        $("#comment_crtrefuse_"+crtpartid).hide();
        $("#s2art_corrector_permdisapprove").hide();
        $("#s2art_corrector_disapprove").hide();
        $("#commentsdiv").show();
        commentBox.show();
    }
}
////to send the email when editor correct the corrector version and want to disapporve ////////
function getCorrectorRefuseComment(crtpartid, partid, mode)
{
    var commentBox=$("#comment_crtrefuse_"+crtpartid);
    // commentBox1.hide();
    /////////////////////////////////
    var editor = CKEDITOR.instances['commentsCrtRefuse_'+crtpartid];
    if (editor) { editor.destroy(true); }
    var editor = CKEDITOR.replace('commentsCrtRefuse_'+crtpartid,
            {
                language: 'de',
                uiColor: '#D9DDDC',
                enterMode : CKEDITOR.ENTER_BR,
                removePlugins : 'resize',
                toolbar :
                        [
                            ['Undo','Redo'],
                            ['Find','Replace','-','SelectAll','RemoveFormat'],
                            ['Link', 'Unlink', 'Image'],
                            '/',
                            ['FontSize', 'Bold', 'Italic','Underline'],
                            ['NumberedList','BulletedList','-','Blockquote'],
                            ['TextColor', '-', 'Smiley','SpecialChar', '-', 'Maximize']
                        ],
            }
    );
    //////////////////////////////////////
    var buttonmode = mode;
    if(buttonmode == 'permanent')
        var mailid = 56;
    else if(buttonmode == 'temporary')
        var mailid = 56;
    var target_page = "/processao/getcommentpopup?mailId="+mailid+"&crt_particip_id="+crtpartid+"&particip_id="+partid; //
    $.post(target_page, function(data){   //alert(data);
        //$("#commentsRefuse_"+userid).val(data);
        CKEDITOR.instances['commentsCrtRefuse_'+crtpartid].setData(data);
        var buttonmode = mode;
        if(buttonmode == 'permanent')
        {
            // $("#s2art_corrector_permdisapprove_"+partid).hide();
            $("#s2art_corrector_permdisapprove").show();
            $("#s2art_corrector_disapprove").hide();
        }
        else if(buttonmode == 'temporary')
        {
            // $("#s2art_corrector_disapprove_"+partid).hide();
            $("#s2art_corrector_disapprove").show();
            $("#s2art_corrector_permdisapprove").hide();
        }
    });
    $("#comment_crtvalidate_"+crtpartid).hide();
    $("#s2art_approve").hide();
    $("#commentsdiv").show();
    $("#commentsdiv2").hide();
    commentBox.show();
}
function blackcontributor(stat,user)
{
    $.ajax({
        url: "/proofread/blackcontributor",
        global: false,
        type: "POST",
        data: ({status:stat,user_id:user}),
        dataType: "html",
        async:false,
        success: function(msg){
            alert("Blacklist status updated");
        }
    });
}
////////////for all contributors details list in popup////////////////
function plagDetails(partId, artId, version)
{
    var popBox=$("#pop-box3");
    var overLay=$("#fade");
    var top=$(this).scrollTop();
    var box_top=popBox.css('top', (parseInt(110) + top) + 'px');
    var overlay_top=overLay.css('height', ($(document).height())  + 'px');

    var target_page = "/correction/plagdetails?part_id="+partId+"&art_id="+artId+"&version="+version;

    $.post(target_page, function(data){   //alert(data);
        overLay.show();
        popBox.show();
        popBox.html(data);
    });
}
</script>
<style>
    .highlight{cursor: pointer;}
    tr.highlight:hover{background-color: #bbbbbb;cursor: pointer;}
    .green {color: green !important;font-weight: bold;}
</style>
{/literal}

<div class="topbox">
    <div class="pagehead"><samp id="369">{$nodes[369]}</samp></div>
    <div class="buttonone1">
        <samp id="350"><input type="button" value="{$nodes[350]}" name="s1art_retour" class="buttonbg" style="float:right" onclick=" window.history.back()"></samp></div>
</div>
<div class="message">{$actionmessages[0]|escape:'htmlall'}</div>
<div class="dotted-line2"></div>
<div class="formbody">
<form action="/proofread/s2correction?submenuId={$submenuId}&articleId={$articledetails[0].id}" method="post" id="s2correction" name="s2correction"  enctype="multipart/form-data">
<input type="hidden" id="aodeldate" name="aodeldate" value="{$deldetails[0].delivery_date}" />
<div class="formfourcols">
    <div class="firstcol"><samp id="370">{$nodes[370]}</samp> : </div>
    <div class="secondcol"><input type="text" name="article_title" id="article_title" value="{$articledetails[0].title|escape:'htmlall'}"  class="text-field"/></div>
    <div class="thirdcol"> <samp id="371">{$nodes[371]}</samp> : </div>
    <div class="fourthcol"> <input type="text" name="delivery_title" id="delivery_title" value="{$articledetails[0].deliveryTitle|escape:'htmlall'}"  class="text-field"/></div>
</div>

<div class="formfourcols">
    <div class="firstcol"> <samp id="372">{$nodes[372]}</samp> : </div>
    <div class="secondcol"> <input type="text" name="type" id="type" value="{$articledetails[0].type}"  class="text-field"/></div>
    <div class="thirdcol"> <samp id="373">{$nodes[373]}</samp> : </div>
    <div class="fourthcol"> <input type="text" name="sign_type" id="sign_type" value="{$articledetails[0].sign_type}"  class="text-field"/></div>
</div>

<div class="formfourcols">
    <div class="firstcol">Min {if $articledetails[0].signtype == 'words'}Mots / article
        {elseif $articledetails[0].signtype == 'chars'}Caractères / article
        {elseif $articledetails[0].signtype == 'sheets'}Feuillets / article {/if} : </div>
    <div class="secondcol"> <input type="text" name="nbwords" id="nbwords" value="{$articledetails[0].num_min}"  class="text-field"/></div>
    <div class="thirdcol">Max {if $articledetails[0].signtype == 'words'}Mots / article
        {elseif $articledetails[0].signtype == 'chars'}Caractères / article
        {elseif $articledetails[0].signtype == 'sheets'}Feuillets / article {/if} : </div>
    <div class="fourthcol"> <input type="text" name="submitdate_bo" id="submitdate_bo" value="{$articledetails[0].num_max}"  class="text-field"/></div>
</div>
<div class="formfourcols">
    <div class="firstcol"> <samp id="376">{$nodes[376]}</samp></div>
    {if $articledetails[0].filepath neq NULL}
    <div class="secondcol"> <a href="/proofread/s2correction?submenuId={$submenuId}&spec={$articledetails[0].id}" ><samp id="377">{$nodes[377]}</samp></a></div>
    {else}
    <div class="secondcol"> <samp id="378">{$nodes[378]}</samp> </div>
    {/if}
</div>
<input type="hidden" name="participateId" id="participateId"  />
<input type="hidden" name="partsIds" id="partsIds"  />
<div class="deliveryoptions" id="optionsdiv">
    <div class="colhead"><samp id="379">{$nodes[379]}</samp></div>
    {foreach from=$options key=options_key item=options_item name=options_loop}
    {if $options_item.id|in_array:$res_seltdopts}
    <div class="col1row"> <input type="checkbox" name="option_{$options_item.id}" id="option_{$options_item.id}" {$options_item.id}/></div>
    <div class="col2row"> {$options_item.option_name|escape:'htmlall'}</div>
    <div class="col3row"> <img class="service_tooltip" width="14" height="14" border="0"  title="{$options_item.description|escape:'htmlall'}" src="/image/picto/icon-info.gif"></div>
    {/if}
    {/foreach}
    <input type="hidden" name="hid_options" id="hid_options" value={if $res_seltdopts|@count neq 0}{$res_seltdopts|@count}{else}{0}{/if} />
</div>
<div class="deliveryoptions" id="checksdiv">
    <div class="colhead"><samp id="380">{$nodes[380]}</samp></div>
    <div class="col1row"> <input type="checkbox" name="scheck" id="scheck" /></div>
    <div class="col2row"><label for="scheck" style="cursor: pointer;"><samp id="381">{$nodes[381]}</samp></div></label>
    <div class="col3row"> <img width="14" height="14" border="0" class="service_tooltip" title="checking for specllings of content" src="/image/picto/icon-info.gif"></div>

    <div class="col1row"> <input type="checkbox" name="gcheck" id="gcheck" /></div>
    <div class="col2row"> <label for="gcheck" style="cursor: pointer;"><samp id="382">{$nodes[382]}</samp></div></label>
    <div class="col3row"> <img width="14" height="14" border="0" class="service_tooltip" title="checking for grammer of content" src="/image/picto/icon-info.gif"></div>

    <div class="col1row"> <input type="checkbox" name="ccheck" id="ccheck" /></div>
    <div class="col2row"> <label for="ccheck" style="cursor: pointer;"><samp id="383">{$nodes[383]}</samp></div></label>
    <div class="col3row"> <img width="14" height="14" border="0" class="service_tooltip" title="checking for unfavourable data of content" src="/image/picto/icon-info.gif"></div>
</div>

{if $wlkwdata neq ''}
<div class="deliveryoptions" id="optionsdiv">
    <div class="colhead"><samp id="329">White list keywords</samp></div>
    <table border="0" cellpadding="5" cellspacing="5" width="100%">{$wlkwdata}</table>
</div>
{/if}
{if $blkwdata neq ''}
<div class="deliveryoptions" id="optionsdiv">
    <div class="colhead"><samp id="329">Black list keywords</samp></div>
    <table border="0" cellpadding="5" cellspacing="5" width="100%">{$blkwdata}</table>
</div>
{/if}

{php}
$participate_obj = new EP_Ao_Participation();
$crtparticipate_obj = new EP_Ao_CorrectorParticipation();
$partsOfArt= $participate_obj->getAllParticipationsStage2($_GET['articleId']);
$crtpartsOfArt= $crtparticipate_obj->getAllCrtParticipationsStage2($_GET['articleId']);
if($partsOfArt != 'NO')
{
for($i=0; $i<count($partsOfArt); $i++)
{
{/php}
<div class="artdetails">
    <div class="col1h"><samp id="384">{$nodes[384]}</samp> </div>
    <div class="col2h"><samp id="385">{$nodes[385]}</samp></div>
    <div class="col1h"><samp id="386">{$nodes[386]}</samp></div>
    <!-- <div class="col1h"><samp id="387">{$nodes[387]}</samp></div>

     <div class="col1h"><samp id="388">{$nodes[388]}</samp></div>-->
    <div class="col1h"><samp id="389">{$nodes[389]}</samp></div>
    <div class="col1h"><samp id="390">{$nodes[390]}</samp></div>
    <div class="col1h"><samp id="391">{$nodes[391]}</samp></div>
    <div class="col1h"><samp id="779">{$nodes[779]}</samp></div>
    <div class="col1h"><samp id="392">{$nodes[392]}</samp></div>
    <div class="col1h">Comments</div>
    <div class="col1h"><nobr>Note du correcteur au r&eacute;dacteur</nobr></div>
    {php}
    $artProcess_obj = new EP_Ao_ArticleProcess();
    $versions_details= $artProcess_obj->getVersionDetails($partsOfArt[$i]['id']);
    for($j=0; $j<count($versions_details); $j++)
    {
    {/php}
    <div class="col1">{php} echo $versions_details[$j]['version'];{/php}</div>
    <div class="col2">{php} $text= $versions_details[$j]['article_name'];
        echo $text = wordwrap($text, 20, "\n", 1);
        $articleId = explode("/", $versions_details[$j]['article_path']); $articleId = $articleId[0];
        {/php}</div>
    <div class="col1">{php} if($versions_details[$j]['type'] == 'contributor')
        { {/php}<a href="javascript:void(0);" onclick="return getParticipateUserInfo({php} echo $versions_details[$j]['user_id']; {/php}, {php} echo $versions_details[$j]['participate_id']; {/php});">{php}
            if($versions_details[$j]['first_name'] == '')
            {
            echo $versions_details[$j]['email'];
            $contributor = $versions_details[$j]['user_id'];
            } else {
            echo $versions_details[$j]['first_name'];
            $contributor = $versions_details[$j]['user_id'];
            }
            {/php}</a>{php}
        }
        else
        echo $versions_details[$j]['login'];
        {/php}</div>

    <!--<div class="col1">{php} if($versions_details[$j]['stage'] == 's1') echo "stage 1"; else echo "stage 2"; {/php}</div>
    <div class="col1">{php} if($versions_details[$j]['status'] == '') echo "new"; elseif($versions_details[$j]['status'] == 'process') echo "revised"; else echo $versions_details[$j]['status']; {/php} </div>-->
    <div class="col1">{php}  echo date('d/m/Y H:i', strtotime($versions_details[$j]['article_sent_at'])); {/php} </div>
    <div class="col1"><a href="/proofread/s2correction?submenuId={$submenuId}&path={php} echo $versions_details[$j]['id'];{/php}" >download</a> </div>
    <div class="col1"><a href="javascript:void(0);" onclick="return getDensity({php} echo $versions_details[$j]['id']; {/php},.5);">Density</a></div>
    <div class="col1"><a href="javascript:void(0);" onClick="return checkplagiarism({php} echo $versions_details[$j]['id']; {/php});">Internal</a> /

        <a href="javascript:void(0);" onclick="return plagDetails({php} echo $versions_details[$j]['participate_id'];{/php}, {php} echo $articleId;{/php}, {php} echo $versions_details[$j]['version'];{/php});" >External</a>({php} echo $versions_details[$j]['plag_percent'];{/php})</div>

    <div class="col1">{php} echo $contents = $versions_details[$j]['article_words_count'];{/php} </div>
    <div class="col1  service_tooltip" title="{php} echo $versions_details[$j]['comments']{/php}">{php} echo substr($versions_details[$j]['comments'],0,40)."...";  {/php}</div>
    <div class="col1">{php} echo $versions_details[$j]['marks'];{/php} </div>
    {php}
    }
    {/php}
    {if $articledetails[0].correction eq 'no'}


    <div class="buttontwo">
        <input id="participId" name="participId" type="hidden" value="{php} echo $partsOfArt[$i]['id'];{/php}" />
        <input id="participateType" name="participateType" type="hidden" value="normalParticipation" />
        <input type="file" name="art_doc_{php} echo $partsOfArt[$i]['id'];{/php}" id="art_doc_{php} echo $partsOfArt[$i]['id'];{/php}" value="" />
        <samp id="397"><input type="submit" value="{$nodes[397]}" name="uploadArticle2" class="buttonbg" onclick="passParticipateId({php} echo $partsOfArt[$i]['id'];{/php});" /></samp>
        {if $articledetails[0].correction eq 'yes'}
        <samp id="398"><input type="button" class="buttonbg" value="{$nodes[398]}" name="s2art_comment"  onclick="getSendComments({php} echo $partsOfArt[$i]['id'];{/php}, {$smarty.get.articleId}, 0);"></samp>
        {/if}
        <span style="color:#333333;"><samp id="399">{$nodes[399]}</samp> :</span>
        <select name="blackstatus" id="blackstatus" onchange="blackcontributor(this.value,{php}echo $versions_details[0]['user_id'];{/php})">
            {php}if($versions_details[0]['blackstatus']=='no')
            {{/php}
            <option value="yes">Yes</option>
            <option value="no" selected>No</option>
            {php}}
            else if($versions_details[0]['blackstatus']=='yes')
            {{/php}
            <option value="yes" selected>Yes</option>
            <option value="no">No</option>
            {php}}
            {/php}
        </select>
        <samp id="400"><input type="button" name="send_comment" id="send_comment" value="{$nodes[400]}" class="buttonbg" onclick="return getSendComments(0, {$smarty.get.articleId}, {php} echo $contributor;{/php})" /> </samp>
        <br>
        <div style="padding-top:10px;padding-right:500px;">
            <samp id="393"> <input style="display: '';" type="button" value="{$nodes[393]}" class="buttonbg" name="s2art_approve_{php} echo $partsOfArt[$i]['id'];{/php}" id="s2art_approve_{php} echo $partsOfArt[$i]['id'];{/php}" onclick="return getComment('regural', null, {php} echo $partsOfArt[$i]['id'];{/php});"></samp>
            {php}
            $refused_count= $participate_obj->getRefusedCount($partsOfArt[$i]['id']);
            if($refused_count[0]['refused_count'] < 3)  {  {/php}
            <samp id="395"> <input type="button" value="{$nodes[395]}" class="buttonbg" id="s2art_disapprove" name="s2art_disapprove"  onclick="writeS2Comments('{php} echo $partsOfArt[$i]['id'];{/php}', null);"></samp>
            {php} } {/php}
            <samp id="396"><input type="button" value="{$nodes[396]}" class="buttonbg" id="s2art_disapprove_permanent" name="s2art_disapprove_permanent"  onclick="writeS2CommentsPermanent('{php} echo $partsOfArt[$i]['id'];{/php}', null);"></samp>
        </div>
    </div>
    <div id="comment_validate_{php} echo $partsOfArt[$i]['id'];{/php}" style="display: none;width: 95%;float:left;">
        <textarea rows="40" cols="60" name="commentsValidate_{php} echo $partsOfArt[$i]['id'];{/php}" id="commentsValidate_{php} echo $partsOfArt[$i]['id'];{/php}"></textarea>
        <samp id="394"> <input style="display: none;" type="submit" class="buttonbg2" class="buttonbg2" value="{$nodes[394]}" name="s2art_approve"  id="s2art_approve" onclick="return checkServices({php} echo $partsOfArt[$i]['id'];{/php}, null);"></samp>
    </div>
    {else}

    <div class="buttontwo">

        <!--{php}
        $refused_count= $crtparticipate_obj->getRefusedCount($crtpartsOfArt[$i]['id']);
        if($refused_count[0]['refused_count'] < 3)  {  {/php}
        <samp id="395"> <input type="button" value="{$nodes[395]}" class="buttonbg" id="s2art_disapprove" name="s2art_disapprove"  onclick="writeS2Comments({php} echo $crtpartsOfArt[$i]['id'];{/php});"></samp>
        {php} } {/php}
        <samp id="396"><input type="button" value="{$nodes[396]}" class="buttonbg" id="s2art_disapprove_permanent" name="s2art_disapprove_permanent"  onclick="writeS2CommentsPermanent({php} echo $crtpartsOfArt[$i]['id'];{/php});"></samp>-->

        <input type="file" name="art_doc_{php} echo $partsOfArt[$i]['id'];{/php}" id="art_doc_{php} echo $partsOfArt[$i]['id'];{/php}" value="" />
        <samp id="397"><input type="submit" value="{$nodes[397]}" name="uploadArticle2" class="buttonbg" onclick="passParticipateId({php} echo $partsOfArt[$i]['id'];{/php});" /></samp>
        <samp id="398"><input type="button" class="buttonbg" value="{$nodes[398]}" name="s2art_comment"  onclick="getSendComments({php} echo $partsOfArt[$i]['id'];{/php}, {$smarty.get.articleId}, 0);"></samp>

        <span style="color:#333333;"><samp id="399">{$nodes[399]}</samp> :</span>
        <select name="blackstatus" id="blackstatus" onchange="blackcontributor(this.value,{php}echo $versions_details[0]['user_id'];{/php})">
            {php}if($versions_details[0]['blackstatus']=='no')
            {{/php}
            <option value="yes">Yes</option>
            <option value="no" selected>No</option>
            {php}}
            else if($versions_details[0]['blackstatus']=='yes')
            {{/php}
            <option value="yes" selected>Yes</option>
            <option value="no">No</option>
            {php}}
            {/php}
        </select>
        <samp id="400"><input type="button" name="send_comment" id="send_comment" value="{$nodes[400]}" class="buttonbg" onclick="return getSendComments(0, {$smarty.get.articleId}, {php} echo $contributor;{/php})" />
            <br>
            <div style="padding-top:10px;">
                <samp id="393"> <input style="display: ''" type="button" value="{$nodes[393]}" class="buttonbg" name="s2art_approve_{php} echo $crtpartsOfArt[$i]['id'];{/php}" id="s2art_approve_{php} echo $crtpartsOfArt[$i]['id'];{/php}" onclick="return getComment('corrector', {php} echo $crtpartsOfArt[$i]['id'];{/php}, {php} echo $partsOfArt[$i]['id'];{/php});"></samp>

                <!-- {php}
                 $refused_count= $participate_obj->getRefusedCount($partsOfArt[$i]['id']);
                 if($refused_count[0]['refused_count'] < 3)  {  {/php}
                 <samp id="395"> <input type="button" value="{$nodes[395]}" class="buttonbg" id="s2art_disapprove" name="s2art_disapprove"  onclick="writeS2Comments({php} echo $partsOfArt[$i]['id'];{/php}, {php} echo $crtpartsOfArt[$i]['id'];{/php});"></samp>
                 {php} } {/php}
                 <samp id="396"><input type="button" value="{$nodes[396]}" class="buttonbg" id="s2art_disapprove_permanent" name="s2art_disapprove_permanent"  onclick="writeS2CommentsPermanent({php} echo $partsOfArt[$i]['id'];{/php}, {php} echo $crtpartsOfArt[$i]['id'];{/php});"></samp>-->
                <input id="crtparticipId" name="crtparticipId" type="hidden" value="{php} echo $crtpartsOfArt[$i]['id'];{/php}" />
                <input id="s2art_corrector_disapprove_{php} echo $crtpartsOfArt[$i]['id'];{/php}" name="s2art_corrector_disapprove_{php} echo $crtpartsOfArt[$i]['id'];{/php}" type="button" value="Refus resoumission au correcteur" onclick="return getCorrectorRefuseComment({php} echo $crtpartsOfArt[$i]['id'];{/php}, {php} echo $partsOfArt[$i]['id'];{/php}, 'temporary');" class="buttonbg"/>
                <input id="s2art_corrector_permdisapprove_{php} echo $crtpartsOfArt[$i]['id'];{/php}" name="s2art_corrector_permdisapprove_{php} echo $crtpartsOfArt[$i]['id'];{/php}" type="button" value="Refus d&eacute;finitif au correcteur" onclick="return getCorrectorRefuseComment({php} echo $crtpartsOfArt[$i]['id'];{/php}, {php} echo $partsOfArt[$i]['id'];{/php}, 'permanent');" class="buttonbg"/>

        </samp>
    </div>
</div>
<div id="commentsdiv" style="display: none;width: 95%;float:left;">
    <div id="comment_crtvalidate_{php} echo $crtpartsOfArt[$i]['id'];{/php}" style="display: none;width: 95%;float:left;">
        <input id="participateType" name="participateType" type="hidden" value="correctorParticipation" />
        <textarea rows="40" cols="60" name="commentsCrtValidate_{php} echo $crtpartsOfArt[$i]['id'];{/php}" id="commentsCrtValidate_{php} echo $crtpartsOfArt[$i]['id'];{/php}"></textarea>
    </div>
    <div id="comment_crtrefuse_{php} echo $crtpartsOfArt[$i]['id'];{/php}" style="display: none;width: 95%;float:left;">
        <textarea rows="40" cols="60" name="commentsCrtRefuse_{php} echo $crtpartsOfArt[$i]['id'];{/php}" id="commentsCrtRefuse_{php} echo $crtpartsOfArt[$i]['id'];{/php}"></textarea>
    </div>
    <samp id="394"> <input style="display: none" type="submit" class="buttonbg2" class="buttonbg2" value="{$nodes[394]}" name="s2art_approve"  id="s2art_approve" onclick="return checkServices({php} echo $partsOfArt[$i]['id'];{/php}, {php} echo $crtpartsOfArt[$i]['id'];{/php});"></samp>
    <input style="display: none" type="submit"  class="buttonbg2" value="Correcteur Refuser" name="s2art_corrector_disapprove"  id="s2art_corrector_disapprove" >
    <input style="display: none" type="submit"  class="buttonbg2" value="Correcteur Refuser Definit" name="s2art_corrector_permdisapprove"  id="s2art_corrector_permdisapprove" onclick="return sendToFo(); refuseAlert();">
    <input type="hidden" id="crtsendtofo" name="sendtofo" value="">
    <input type="hidden" id="anouncebyemail2" name="anouncebyemail" value="">
</div>
{/if}
</div>

{php}
}
}
{/php}

<div class="buttonarea" style="padding-bottom:10px;">     </div>
</form>
</div>
<div id="commentsdiv2" style="display: none;width: 95%;float:left;">
    <!--  //////////pop up "c" div///////////-->
    {assign var="head1" value="Cher r&eacute;dacteur,\n\n"}


    {assign var="footpermanent" value="L'équipe d'Edit Place.com vous remercie d'avoir fait confiance à ses services. Malheureusement, la nouvelle version de cet article ne s'est toujours pas révélée satisfaisante.
    \n L'article est remis en appel d'offres. La présente production ne vous sera donc pas rémunérée \n
    L'équipe d'Edit Place.com vous remercie d'avoir fait confiance à ses services.\n"}
    {assign var="sign" value="Toute l'équipe d'Edit-place"}
    <div class="over-b" style="height: 800px;display:none"></div>
    <div id="pop-s2comments" class="box_c">
        <form name="" action="/proofread/disapprove?submenuId={$submenuId}" method="post"  >
            <div class="boxone" align="">
                {foreach from=$refusevalidtemps key=refusevalidtemps_key item=refusevalidtemps_item name=refusevalidtemps_loop}
                <div class="boxcol1" ><label for="chktemp_{$refusevalidtemps_item.identifier}" style="cursor: pointer;">{$refusevalidtemps_item.title|stripslashes}</label></div>
                <div class="boxcol2" ><input name="{$refusevalidtemps_item.identifier}" id="chktemp_{$refusevalidtemps_item.identifier}" type="checkbox" value="{$refusevalidtemps_item.identifier}" onclick="return getRefuseTemp({$refusevalidtemps_item.identifier});" />  </div>
                {/foreach}
                <div class="boxcol1 closepop">
                    <samp id="402"><input type="submit" id="pop_disapproves2" name="pop_disapproves2" value="{$nodes[402]}"> </input></samp>
                    &nbsp;<samp id="403"><input type="submit" id="pop_disapproves2_permanent" name="pop_disapproves2_permanent" value="{$nodes[403]}" onclick="return sendToFo(); refuseAlert();"> </input></samp>
                    &nbsp;<samp id="404"><input type="button" id="close_pop" name="close_pop" value="{$nodes[404]}" onclick="closePop();"></input></samp> </div>
                <input type="hidden" id="sendtofo" name="sendtofo" value="">
                <input type="hidden" id="anouncebyemail" name="anouncebyemail" value="">
            </div>
            <div class="boxtwo" align="">
                <div class="boxcol3" ><textarea rows="5" cols="62" id="content_head" name="content_head" >{$head1}{$head}</textarea> </div>
                <div class="boxcol3" ><textarea rows="18" cols="62" id="comment_s2" name="comment_s2" ></textarea></div>
                <div class="boxcol3" ><textarea rows="5" cols="62" id="content_footer" name="content_footer" spellcheck="false" >
                    Cordialement,

                    {$sign|utf8_decode}</textarea> </div>

                <div class="boxcol3" ><textarea rows="5" cols="62" id="content_footerPermanent" name="content_footerPermanent" spellcheck="false" >{$footpermanent|utf8_decode}
                    Cordialement,

                    {$sign|utf8_decode}</textarea>   </div>
                <div style="padding-left: 20px;padding-top: 200px;font-weight: bold;">
                    {if $articledetails[0].correction neq 'no'}
                    <input type="checkbox" id="commentstocorrector" name="commentstocorrector" value="yes" /> <label for="commentstocorrector" style="cursor: pointer;"> Add Above Comments to Corrector Mail</label>
                    <input type="hidden" name="pop_crtpartId" id="pop_crtpartId" value="{php} echo $crtpartsOfArt[$i]['id'];{/php}"  />
                    {/if} <input type="hidden" id="art_id" name="art_id" value="{php} echo $_GET['articleId'];{/php}">
                </div>
            </div>
            <input type="hidden" name="pop_partId" id="pop_partId"  />

    </div>
    <input type="hidden" id="hide_total2" name="hide_total2" value="" />
    </form>
</div> <input type="hidden" id="article_id" name="article_id" value="">
</div>
<!--  //////////pop up "a" div for userdetails popup///////////-->
<form name="" action="/processao/selectcontributor?submenuId={$submenuId}" method="post">
    <div id="fade" class="black_overlay" style="height: 800px;display:none"></div>
    <div id="pop-box4" class="box" style="display: none; position:absolute">
        <div class="boxlefta"> Nom complet : </div>
        <div class="boxrighta" id="name">  </div>
        <div class="boxlefta"> Profession : </div>
        <div class="boxrighta" ID="profession">  </div>
        <div class="boxlefta"> Etudes : </div>
        <div class="boxrighta" ID="degree">  </div>
        <div class="boxlefta"> Langage  : </div>
        <div class="boxrighta" ID="language">  </div>
        <div class="boxlefta"> Cat&eacute;gories pr&eacute;f&eacute;r&eacute;es : </div>
        <div class="boxrighta" ID="favcat">  </div>
        <div class="boxlefta"> Total Participations : </div>
        <div class="boxrighta" ID="participations">  </div>
        <div class="boxlefta"> Total Articles publi&eacute;s : </div>
        <div class="boxrighta" ID="approved">  </div>
        <div class="boxlefta"> Total Articles refus&eacute;s : </div>
        <div class="boxrighta" ID="disapproved">  </div>
        <div class="boxlefta"> Prix ​​propos&eacute; : </div>
        <div class="boxrighta" ID="price">  </div>

        <div class="boxlefta"> </div>
        <div class="boxrighta closepop" style="text-align:center; padding:0px;">
            <input type="button" id="close_pop" name="close_pop" value="Fermer" onclick="closePop();" class="buttonbg2"></input> </div>
    </div>

</form>
<!--  //////////pop up "e" div for commmentpopup///////////-->

<div id="pop-box3" class="box_e" style="display: none; position:absolute; height: 400px; overflow-y: auto; border-radius:6px; border:#333333 2px solid">
</div>
<!--  //////////pop up "e" div for densitypopup///////////-->
<div id="light1"></div>

<!-- common content tool tip -->
<div id="PlagcontentContainer">
    <table width="" border="0" cellspacing="0" cellpadding="0" align="center" class="PlagcontentPopup" width="auto">
        <tr>
            <td class="corner topLeft"></td>
            <td class="toptool"></td>
            <td class="corner topRight"></td>
        </tr>
        <tr>
            <td class="left">&nbsp;</td>
            <td><div id="PlagcontentContent"></div></td>
            <td class="right">&nbsp;</td>
        </tr>
        <tr>
            <td class="corner bottomLeft">&nbsp;</td>
            <td class="bottomtool">&nbsp;</td>
            <td class="corner bottomRight"></td>
        </tr>
    </table>
</div>
    <?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 7/24/13
 * Time: 5:46 PM
 * To change this template use File | Settings | File Templates.
 */
