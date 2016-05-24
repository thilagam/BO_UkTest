<?php /* Smarty version 2.6.19, created on 2015-03-10 18:38:11
         compiled from gebo/user/users-list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/user/users-list.phtml', 551, false),array('modifier', 'explode', 'gebo/user/users-list.phtml', 594, false),array('modifier', 'cat', 'gebo/user/users-list.phtml', 596, false),array('modifier', 'in_array', 'gebo/user/users-list.phtml', 816, false),array('modifier', 'utf8_decode', 'gebo/user/users-list.phtml', 820, false),array('modifier', 'count', 'gebo/user/users-list.phtml', 824, false),array('modifier', 'wordwrap', 'gebo/user/users-list.phtml', 1062, false),array('function', 'html_options', 'gebo/user/users-list.phtml', 716, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf(\'?\') + 1).split(\'&\');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split(\'=\');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

var ctype = getUrlVars()["counttype"];
var count = getUrlVars()["count"];

$(document).ready(function() {

    var tab = getParameterByName(\'tab\', $(location).attr(\'href\'));
    if(tab == \'\')
        $("#contributorstab").addClass(\'active\');
    else
        $("#"+tab).addClass(\'active\');
    //////////////////////////////////////////////////////////////
    $("#sel_type").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#sel_status").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#type").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#status").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#sel_group").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#sel_user").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#category").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#nationalism").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#language").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#language2").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#contrib").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#country").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#aotitle").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#contribquiz").chosen({ allow_single_deselect: false,search_contains: true  });
    $(".uni_style").uniform();
    gebo_validation.reg();
    $( ".ui_slider1" ).each(function(j) {
        // read initial values from markup and remove that
        var value = parseInt( $( this ).text(), 10 );
        if(isNaN(value))
            value=50;
        //alert(i+\'--\'+value);
        $( this ).empty().slider({
            range: "min",
            value: value,
            min: 1,
            max: 100,
            slide: function( event, ui ) {
                $( "#slider-skill_number_1").val( ui.value +"%");
            }
        });
        $( "#slider-skill_number_1").val( $( "#slider-skill_1").slider( "value" ) +"%" );

    });

    //////////////////////////////////////////////////////////////////////

    $(\'#bousersgrid\').dataTable({
        "sPaginationType": "bootstrap",
        "iDisplayLength" : 25,
        "sDom": "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
        "aoColumns": [
            { "sType": "formatted-num" },
            { "sType": "string" },
            { "sType": "string" },
            { "sType": "formatted-num" },
            { "sType": "string" },
            { "sType": "string" },
            { "sType": "string" },
            { "sType": "string" },
            { "sType": "natural"}
        ],
        "aaSorting": [[ 0, "asc" ]],
        "oTableTools": {
            "aButtons": [
                "copy",
                "print",
                {
                    "sExtends":    "collection",
                    "sButtonText": \'Sauvegarder <span class="caret" />\',
                    "aButtons":    [ "csv", "xls", "pdf" ]
                }
            ],
            "sSwfPath": "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
        }
    });

    $(\'#contribsgrid\').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/user/loadcontributor",
        "fnServerParams": function ( aoData ) {
            aoData.push( { "name": ctype, "value": "yes" } );
            aoData.push({ "name": "totalcount", "value": count })
            aoData.push({ "name": "searchsubmit", "value": getUrlVars()["searchsubmit"] })
            aoData.push({ "name": "start_date", "value": getUrlVars()["start_date"] })
            aoData.push({ "name": "end_date", "value": getUrlVars()["end_date"] })
            aoData.push({ "name": "activity_start_date", "value": getUrlVars()["activity_start_date"] })
            aoData.push({ "name": "activity_end_date", "value": getUrlVars()["activity_end_date"] })
            aoData.push({ "name": "aoList", "value": getUrlVars()["aoList"] })
            aoData.push({ "name": "arttitle", "value": getUrlVars()["arttitle"] })
            aoData.push({ "name": "contrib", "value": getUrlVars()["contrib"] })
            aoData.push({ "name": "type", "value": getUrlVars()["type"] })
            aoData.push({ "name": "type2", "value": getUrlVars()["type2"] })
            aoData.push({ "name": "status", "value": getUrlVars()["status"] })
            aoData.push({ "name": "blacklist", "value": getUrlVars()["blacklist"] })
            aoData.push({ "name": "nationalism", "value": getUrlVars()["nationalism"] })
            aoData.push({ "name": "categ", "value": getUrlVars()["categ"] })
            aoData.push({ "name": "language", "value": getUrlVars()["language"] })
            aoData.push({ "name": "language2", "value": getUrlVars()["language2"] })
            aoData.push({ "name": "aotitle", "value": getUrlVars()["aotitle"] })
            aoData.push({ "name": "minage", "value": getUrlVars()["minage"] })
            aoData.push({ "name": "maxage", "value": getUrlVars()["maxage"] })
            aoData.push({ "name": "min_arts_validated", "value": getUrlVars()["min_arts_validated"] })
            aoData.push({ "name": "max_arts_validated", "value": getUrlVars()["max_arts_validated"] })
            aoData.push({ "name": "min_total_parts", "value": getUrlVars()["min_total_parts"] })
            aoData.push({ "name": "max_total_parts", "value": getUrlVars()["max_total_parts"] })
            aoData.push({ "name": "min_arts_sent", "value": getUrlVars()["min_arts_sent"] })
            aoData.push({ "name": "max_arts_sent", "value": getUrlVars()["max_arts_sent"] })
            aoData.push({ "name": "min_parts_refused", "value": getUrlVars()["min_parts_refused"] })
            aoData.push({ "name": "max_parts_refused", "value": getUrlVars()["max_parts_refused"] })
            aoData.push({ "name": "min_arts_refused", "value": getUrlVars()["min_arts_refused"] })
            aoData.push({ "name": "max_arts_refused", "value": getUrlVars()["max_arts_refused"] })
            aoData.push({ "name": "noof_disapproved", "value": getUrlVars()["noof_disapproved"] })
        },
        "oTableTools": {
            "aButtons": [
                "copy",
                "print",
                {
                    "sExtends":    "collection",
                    "sButtonText": \'Sauvegarder <span class="caret" />\',
                    "aButtons":    [ "csv", "xls", "pdf" ]
                }
            ],
            "sSwfPath": "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
        }
    } );
    /*$(\'#clientsgrid\').dataTable({
        "sPaginationType": "bootstrap",
        "iDisplayLength" : 25,
        "sDom": "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
        "aoColumns": [
            { "sType": "formatted-num" },
            { "sType": "string" },
            { "sType": "string" },
            { "sType": "string" },
            { "sType": "string" },
            { "sType": "natural"},
            { "sType": "natural"},
            { "sType": "natural"},
            { "sType": "natural"}
        ],
        "aaSorting": [[ 0, "asc" ]],
        "oTableTools": {
            "aButtons": [
                "copy",
                "print",
                {
                    "sExtends":    "collection",
                    "sButtonText": \'Sauvegarder <span class="caret" />\',
                    "aButtons":    [ "csv", "xls", "pdf" ]
                }
            ],
            "sSwfPath": "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
        }
    });*/
    $(\'#clientsgrid\').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/user/loadclient",
        "oTableTools": {
            "aButtons": [
                "copy",
                "print",
                {
                    "sExtends":    "collection",
                    "sButtonText": \'Sauvegarder <span class="caret" />\',
                    "aButtons":    [ "csv", "xls", "pdf" ]
                }
            ],
            "sSwfPath": "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
        }

    } );
    $(\'#permissionsgrid\').dataTable({
        "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
        "sPaginationType": "bootstrap",
        "aaSorting": [[ 0, "asc" ]],
        "aoColumns": [
            { "sType": "formatted-num" },
            { "sType": "string" },
            { "sType": "string" },
            { "sType": "formatted-num" }
        ]
    });
    /////////////save search function///////////////
    $("#savesearch").click(function(){
        $("#savesearch").hide();
        $("#subsavesearch").show();
        $("#searchname").show();
    });
    $("#subsavesearch").click(function(){
        if ($(\'#searchname\').val() == \'\') {
            smoke.alert(\'Please Enter Search Name\');
            $(\'#searchname\').focus();
            return false;
        }
        else
        {
            var target_page = "/user/savesearch?searchname="+$(\'#searchname\').val();
            $.post(target_page,  function(data){
                smoke.alert(\'Your seach criteria has been saved\');
                $("#savesearch").show();
                $("#subsavesearch").hide();
                $("#searchname").hide();
            });
        }
    });
    $("#contribsgrid_length").css("float","left");
    $("#clientsgrid_length").css("float","left");
});
function checkEmailExist()
{
    var email = $("#email").val();
    var target_page = "/user/email-exits?email="+email;
    $.post(target_page, function(data){ //alert(data);
        var data1 = data.trim();
        if(data1 == "yes")
        {
            smoke.alert("email id is already exist");
            $("#emai").val(\'\');
            return false;
        }
        else
        {

            return true;
        }
    });
}

//* validation
gebo_validation = {
    reg: function() {
        reg_validator = $(\'.form_validation_reg\').validate({
            onkeyup: false,
            errorClass: \'error\',
            validClass: \'valid\',
            highlight: function(element) {
                $(element).closest(\'div\').addClass("f_error");
            },
            unhighlight: function(element) {
                $(element).closest(\'div\').removeClass("f_error");
            },
            errorPlacement: function(error, element) {
                $(element).closest(\'div\').append(error);
                $(\'.error\').css("font-size", "10px");
                $(\'.error\').css("padding-top", "5px");
            },
            rules: {
                first_name: { required: true, minlength: 3 },
                last_name: { required: true, minlength: 2 },
                login: { required: true, minlength: 2 },
                password: { required: true, minlength: 2 },
                phone_number: { required: true },
                address2: { required: true, minlength: 5 },
                country: { required: true, minlength: 2 },
                email: { required: true, minlength: 3 },
                type: { valueNotEquals: "default" } ,
                status: { valueNotEquals: "default" }
            },
            invalidHandler: function(form, validator) {
                $.sticky("There are some errors. Please correct them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
            }
        })
    }
};
function swift(sa)
{
    if(sa==\'1\')
    {
        document.getElementById(\'sel_user\').selectedIndex=0;
        return true;
    }
    else
    {
        document.getElementById(\'sel_group\').selectedIndex=0;
        return true;
    }
}
///////////adding percentages values for categories
var selectedarray = [];
//* sliders
function categoryList()
{
    var count = $("#category :selected").length;
    if(count > 0)
    {
        $(\'#targetdiv\').show();
        var opts=$("#category :selected").text();
        var optsvalues=$("#category :selected").val();
        var oldVal=$(\'#targetdiv\').val();
        if($.inArray(opts, selectedarray) == -1)
        {
            var newdiv = \'<div><div>\' + opts + \'</div><div class="ui_slider span9" ondblclick="getIds(this.id);" id=\'+optsvalues+\' ></div><input type="text" class="span2" style="position:relative;top:-15px;left:10px;" id=percentage_\'+optsvalues+\' name=categ[\'+optsvalues+\']></input></div>\'
            $(\'#targetdiv\').append(newdiv);
            $( "#"+optsvalues ).slider({
                range: "min",
                value: 0,
                min: 1,
                max: 100,
                slide: function( event, ui ) {
                    $( "#percentage_"+optsvalues ).val( ui.value );
                }
            });
            $( "#percentage_"+optsvalues ).val($( "#"+optsvalues ).slider( "value" ) );

        }
        selectedarray.push(opts);
        $(\'#targetdiv\').show();

    }
}
///////////adding percentages values for languages 2////////
var selectedarray = [];
function language2List()
{
    var count = $("#language2 :selected").length;
    if(count > 0)
    {
        $(\'#targetdivlang\').show();
        var opts=$("#language2 :selected").text();
        var optsvalues=$("#language2 :selected").val();
        var oldVal=$(\'#targetdivlang\').val();
        if($.inArray(opts, selectedarray) == -1)
        {
            var newdiv = \'<div><div >\' + opts + \'</div><div class="ui_slider span9" ondblclick="getLang2Ids(this.id);" id=\'+optsvalues+\' ></div><input type="text"  class="span2" style="position:relative;top:-15px;left:10px;" id=perctlang_\'+optsvalues+\' name=language2[\'+optsvalues+\']></input></div>\';
            $(\'#targetdivlang\').append(newdiv);
            $( "#"+optsvalues ).slider({
                range: "min",
                value: 0,
                min: 1,
                max: 100,
                slide: function( event, ui ) {
                    $( "#perctlang_"+optsvalues ).val( ui.value );
                }
            });
            $( "#perctlang_"+optsvalues ).val($( "#"+optsvalues ).slider( "value" ) );
        }
        selectedarray.push(opts);
        $(\'#targetdivlang\').show();

    }
}
///////validating the search form/////
function valSearchContribs()
{
    if($(\'#minage\').val()!= \'\')
    {
        if ($.isNumeric($(\'#minage\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#minage\').focus();
            return false;
        }
        else if ($.isNumeric($(\'#maxage\').val()) == false || $(\'#maxage\').val()=="")
        {
            smoke.alert("please enter only numeric values");
            $(\'#maxage\').focus();
            return false;
        }
        else if ($(\'#minage\').val() >=  $(\'#maxage\').val())
        {
            smoke.alert("min value is greater than max value");
            $(\'#maxage\').focus();
            return false;
        }
    }
    if($(\'#min_arts_validated\').val()!= \'\')
    {
        if ($.isNumeric($(\'#min_arts_validated\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#min_arts_validated\').focus();
            return false;
        }
        else if ($.isNumeric($(\'#max_arts_validated\').val()) == false || $(\'#max_arts_validated\').val()=="")
        {
            smoke.alert("please enter only numeric values");
            $(\'#max_arts_validated\').focus();
            return false;
        }
    }
    if($(\'#min_total_parts\').val()!= \'\')
    {
        if ($.isNumeric($(\'#min_total_parts\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#min_total_parts\').focus();
            return false;
        }
        else if ($.isNumeric($(\'#max_total_parts\').val()) == false || $(\'#max_total_parts\').val()=="")
        {
            smoke.alert("please enter only numeric values");
            $(\'#max_total_parts\').focus();
            return false;
        }
    }
    if($(\'#min_arts_sent\').val()!= \'\')
    {
        if ($.isNumeric($(\'#min_arts_sent\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#min_arts_sent\').focus();
            return false;
        }
        else if ($.isNumeric($(\'#max_arts_sent\').val()) == false || $(\'#max_arts_sent\').val()=="")
        {
            smoke.alert("please enter only numeric values");
            $(\'#max_arts_sent\').focus();
            return false;
        }
    }
    if($(\'#min_parts_refused\').val()!= \'\')
    {
        if ($.isNumeric($(\'#min_parts_refused\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#min_parts_refused\').focus();
            return false;
        }
        else if ($.isNumeric($(\'#max_parts_refused\').val()) == false || $(\'#max_parts_refused\').val()=="")
        {
            smoke.alert("please enter only numeric values");
            $(\'#max_parts_refused\').focus();
            return false;
        }
    }
    if($(\'#min_arts_refused\').val()!= \'\')
    {
        if ($.isNumeric($(\'#min_arts_refused\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#min_arts_refused\').focus();
            return false;
        }
        else if ($.isNumeric($(\'#max_arts_refused\').val()) == false || $(\'#max_arts_refused\').val()=="")
        {
            smoke.alert("please enter only numeric values");
            $(\'#max_arts_refused\').focus();
            return false;
        }
    }
    if($(\'#noof_disapproved\').val()!= \'\')
    {
        if ($.isNumeric($(\'#noof_disapproved\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#noof_disapproved\').focus();
            return false;
        }
    }
    else
        return true;

}
//* bootstrap datepicker
gebo_datepicker = {
    init: function() {
        $(\'#dp1\').datepicker();
        $(\'#dp2\').datepicker();
        $(\'#actdp1\').datepicker();
        $(\'#actdp2\').datepicker();
    }};
function changeStatusUser(userid, status)
{
    if(status == \'Inactive\')
        var statusmsg = \'Active\';
    else
        var statusmsg = \'Inactive\';
    smoke.confirm("Do you really want to make user "+statusmsg,function(e){
        if (e)
        {
           // window.location.href="users-list?submenuId=ML2-SL7&tab="+tab+"&delete=yes&userId="+userid;
            var target_page = "/user/changeuserstatus?status="+statusmsg+"&user_id="+userid;
            $.post(target_page, function(data){ //alert(data);
                $(\'#userstatus_\'+userid).html("<a onclick=\\"changeStatusUser(\'"+userid+"\', \'"+statusmsg+"\');\\">"+statusmsg+"</a>");
                window.location.reload();
            });
        }
        else
        {
            return false;
        }
    });

}
</script>
'; ?>

<div class="row-fluid">
  <div class="span12" style="">
   <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
      <div class="tabbable">
          <ul class="nav nav-tabs">

              <li <?php if ($_GET['tab'] == 'contributorstab' || $_GET['tab'] == ''): ?> class="active" <?php endif; ?>><a href="#contributorstab" data-toggle="tab" class="lable-danger"><strong>Writers</strong></a></li>
              <li <?php if ($_GET['tab'] == 'clientstab'): ?> class="active" <?php endif; ?>><a href="#clientstab" data-toggle="tab" class="lable-info"><strong>Clients</strong></a></li>
              <?php if ($this->_tpl_vars['groupId'] == 1 || $this->_tpl_vars['groupId'] == 2): ?>
              <li <?php if ($_GET['tab'] == 'bouserstab'): ?> class="active" <?php endif; ?>><a href="#bouserstab" data-toggle="tab" class="lable-success"><strong>Bo Users</strong></a></li>
              <li <?php if ($_GET['tab'] == 'newusertab'): ?> class="active" <?php endif; ?>><a href="#newusertab" data-toggle="tab" class="lable-info"><strong>New Users</strong></a></li>
              <li <?php if ($_GET['tab'] == 'permissionstab'): ?> class="active" <?php endif; ?>><a href="#permissionstab" data-toggle="tab" class="lable-info"><strong>Permissions</strong></a></li>
              <?php endif; ?>
              <li <?php if ($_GET['tab'] == 'searchcontirbtab'): ?> class="active" <?php endif; ?>><a href="#searchcontirbtab" data-toggle="tab" class="lable-info"><strong>Search Writers</strong></a></li>
              <!--<a href="adduser?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
">new user</a>-->
          </ul>
          <div class="tab-content">
          <?php if ($this->_tpl_vars['groupId'] == 1 || $this->_tpl_vars['groupId'] == 2): ?>
              <div id="bouserstab" class="tab-pane" >

                  <table id="bousersgrid" class="table table-bordered table-striped table_vam tdleftalign">
                      <thead>
                      <tr>
                          <th>SL.NO</th>
                          <th>Name</th>
                          <th>Country</th>
                          <th>phone</th>
                          <th>Type</th>
                          <th>Status</th>
                          <th>created at</th>
                          <th>Email</th>
                          <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php if ($this->_tpl_vars['bouserdetails'] != 'No Messages Found'): ?>
                      <?php $_from = $this->_tpl_vars['bouserdetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['usergrid'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['usergrid']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['bouser']):
        $this->_foreach['usergrid']['iteration']++;
?>
                      <tr>
                          <td><?php echo ($this->_foreach['usergrid']['iteration']-1)+1; ?>
</td>
                          <td><?php echo $this->_tpl_vars['bouser']['first_name']; ?>
 <?php echo $this->_tpl_vars['bouser']['last_name']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['bouser']['country']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['bouser']['phone_number']; ?>
</td>
                          <td><label class="label label-info"><?php echo $this->_tpl_vars['bouser']['type']; ?>
</label></td>
                          <td id="userstatus_<?php echo $this->_tpl_vars['bouser']['identifier']; ?>
"><a href="#"  onclick="return changeStatusUser('<?php echo $this->_tpl_vars['bouser']['identifier']; ?>
', '<?php echo $this->_tpl_vars['bouser']['status']; ?>
')" ><?php echo $this->_tpl_vars['bouser']['status']; ?>
</a></td>
                          <td><div style="display:none;"><?php echo $this->_tpl_vars['bouser']['created_at']; ?>
</div><?php echo ((is_array($_tmp=$this->_tpl_vars['bouser']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
                          <td><?php echo $this->_tpl_vars['bouser']['email']; ?>
</td>
                          <td><a href="user-edit?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&userId=<?php echo $this->_tpl_vars['bouser']['identifier']; ?>
" class="hint--left hint--info" data-hint="edit profile"><i class="icon-pencil"></i> </a>
                              <!--<a href="#" onclick="return deleteUser('bouserstab', '<?php echo $this->_tpl_vars['bouser']['identifier']; ?>
')" class="hint--left hint--info" data-hint="delet profile"><i class="icon-trash"></i></a>-->
                          </td>
                      </tr>
                      <?php endforeach; endif; unset($_from); ?>
                      <?php endif; ?>
                      </tbody>
                  </table>
              </div>
          <?php endif; ?>
              <div id="contributorstab" class="tab-pane">
                  <div class="alert alert-info form-inline">
                      <div class="alpbold">
                      Total Contributors : <a href="/user/users-list?submenuId=ML5-SL7&tab=contributorstab&total_contribs=yes" class="label label-info"><?php echo $this->_tpl_vars['contribCount'][4]['total_contribs']; ?>
</a> |
                      Never Participated  : <a href="/user/users-list?submenuId=ML5-SL7&tab=contributorstab&never_participated=yes" class="label label-warning"><?php echo $this->_tpl_vars['contribCount'][0]['never_participated']; ?>
</a> |
                      Never Validated : <a href="/user/users-list?submenuId=ML5-SL7tab=contributorstab&&never_validated=yes" class="label label-gebo"><?php echo $this->_tpl_vars['contribCount'][2]['never_validated']; ?>
</a> |
                      Never Sent  : <a href="/user/users-list?submenuId=ML5-SL7&tab=contributorstab&never_sent=yes" class="label label-danger"><?php echo $this->_tpl_vars['contribCount'][1]['never_sent']; ?>
</a> |
                      Atleast 1 Validated : <a href="/user/users-list?submenuId=ML5-SL7&tab=contributorstab&once_validated=yes" class="label label-inverse"><?php echo $this->_tpl_vars['contribCount'][3]['once_validated']; ?>
</a> |
                      Published : <a href="/user/users-list?submenuId=ML5-SL7&tab=contributorstab&once_published=yes" class="label label-success"><?php echo $this->_tpl_vars['contribCount'][5]['once_published']; ?>
</a></div>
                  </div>
                  <table class="table table-striped table-bordered dTableR tdleftalign" id="contribsgrid">
                      <thead>
                      <tr>
                          <th>SL.NO</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Profile Type</th>
						  <th>Status</th>
                          <th>created at</th>
                          <th>categories</th>
                          <th>Language</th>
                          <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>

                      </tbody>
                  </table>
                  <div class="row-fluid">
                      <div class="span7 form-inline">
                          <?php $this->assign('urlstring', $_SERVER['REQUEST_URI']); ?>
							  <?php $this->assign('pageurl', ((is_array($_tmp=$this->_tpl_vars['urlstring'])) ? $this->_run_mod_handler('explode', true, $_tmp, "&") : smarty_modifier_explode($_tmp, "&"))); ?>
							<?php if ($_GET['searchsubmit']): ?>
								<?php $this->assign('urlstring1', ((is_array($_tmp=$this->_tpl_vars['urlstring'])) ? $this->_run_mod_handler('cat', true, $_tmp, "&download=download") : smarty_modifier_cat($_tmp, "&download=download"))); ?>
							<?php else: ?>
								<?php $this->assign('urlstring1', "/user/users-list?submenuId=ML2-SL7&download=download"); ?>
							<?php endif; ?>
                          <a href="<?php echo $this->_tpl_vars['urlstring1']; ?>
" class="btn btn-info ">Download XLs</a>
                          <?php if ($_GET['searchsubmit'] == Search): ?>
                          <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab" class="btn btn-danger ">clear</a>
                          <button type="button"  name="savesearch" id="savesearch" class="btn btn-success ">Save Search Criteria</button>
                          <input type="text" value="" name="searchname" id="searchname" class="hide" style="display: none">
                          <button type="button"  name="subsavesearch" id="subsavesearch" onclick="return valSaveSearch();" class="btn btn-success hide" >Save</button>
                          <?php endif; ?>

                      </div>
                  </div>
              </div>
              <div id="clientstab" class="tab-pane" >
                  <table id="clientsgrid" class="table table-bordered table-striped table_vam tdleftalign">
                      <thead>
                      <tr>
                          <th>SL.NO</th>
                          <th>Company Name</th>
                          <th>Email</th>
                          <th>Created at</th>
                          <th>Deliveries</th>
                          <th>articles</th>
                          <th>published articles</th>
                          <th>download</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <!--<?php if ($this->_tpl_vars['clientdetails'] != 'No Messages Found'): ?>
                      <?php $_from = $this->_tpl_vars['clientdetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['usergrid'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['usergrid']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['client']):
        $this->_foreach['usergrid']['iteration']++;
?>
                      <tr>
                          <td><?php echo ($this->_foreach['usergrid']['iteration']-1)+1; ?>
</td>  
                          <td><!--<a onClick="connect_fo('client', '<?php echo $this->_tpl_vars['client']['email']; ?>
', '<?php echo $this->_tpl_vars['client']['password']; ?>
');"  class="hint--right hint--inverse" data-hint="connect to fo" name="connectfoclient"  type="button"><i class="splashy-breadcrumb_separator_arrow_2_dots"></i> </a><?php echo $this->_tpl_vars['client']['company_name']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['client']['email']; ?>
</td>
                          <td><div style="display:none"><?php echo $this->_tpl_vars['client']['created_at']; ?>
</div><?php echo ((is_array($_tmp=$this->_tpl_vars['client']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
                          <td><?php if ($this->_tpl_vars['client']['ao_count']): ?><a href="client-edit?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&tab=aolistclient&userId=<?php echo $this->_tpl_vars['client']['identifier']; ?>
" class="num-large" target="_blank"><?php endif; ?><?php echo $this->_tpl_vars['client']['ao_count']; ?>
<?php if ($this->_tpl_vars['client']['ao_count']): ?></a><?php endif; ?></td>
                          <td><label class="label label-warning"><?php echo $this->_tpl_vars['client']['art_count']; ?>
</label></td>
                          <td><label class="label label-inverse"><?php echo $this->_tpl_vars['client']['art_pcount']; ?>
</label></td>
                          <td><?php if ($this->_tpl_vars['client']['ao_count'] != 0): ?><a href="http://mmm-new.edit-place.com/getClientArticles.php?client_id=<?php echo $this->_tpl_vars['client']['identifier']; ?>
">Download</a><?php else: ?>-<?php endif; ?></td>
                          <td nowrap>
								<a href="client-edit?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&tab=editclient&userId=<?php echo $this->_tpl_vars['client']['identifier']; ?>
" class="hint--left hint--info" data-hint="edit profile"><i class="icon-pencil"></i> </a>
								<a href="client-edit?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&tab=viewclient&userId=<?php echo $this->_tpl_vars['client']['identifier']; ?>
" class="hint--left hint--info" data-hint="view profile"><i class="icon-eye-open"></i></a>
								<!--<a href="#" onclick="return deleteUser('clientstab', '<?php echo $this->_tpl_vars['client']['identifier']; ?>
')" class="hint--left hint--info" data-hint="delet profile"><i class="icon-trash"></i></a>
								<a href="javascript:void(0);" onClick="connect_fo('client', '<?php echo $this->_tpl_vars['client']['email']; ?>
', '<?php echo $this->_tpl_vars['client']['password']; ?>
');" class="hint--left hint--info" data-hint="Connect to FO"><i class="splashy-contact_blue"></i></a>
						  </td>
                      </tr>
                      <?php endforeach; endif; unset($_from); ?>
                      <?php endif; ?>-->
                      </tbody>
                  </table>
              </div>
              <?php if ($this->_tpl_vars['groupId'] == 1 || $this->_tpl_vars['groupId'] == 2): ?>
              <div class="tab-pane " id="newusertab">
                  <div class="alert alert-warning"><b>Creation of BO user</b></div>
                  <form class="form_validation_reg" action="/user/adduser?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
"  style="padding-left: 50px;" method="post" id="user" name="user" enctype="multipart/form-data">
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span5 form-inline">
                                  <label class="span4">Initial  <span class="f_req">*</span></label>
                                  <label class="uni-radio">
                                      <input type="radio" name="initial" id="initialmr" checked="" value="mr" class="uni_style"/> mr
                                  </label>
                                  <label class="uni-radio">
                                      <input type="radio" name="initial" id="initialmme" value="mme"  class="uni_style"/> mrs
                                  </label>
                                  <label class="uni-radio">
                                      <input type="radio" name="initial" id="initialmlle" value="mlle" class="uni_style"/> miss
                                  </label>
                              </div>
                              <div class="span5 form-inline">
                                  <label class="span4">Email<span class="f_req">*</span></label>
                                  <input type="text" name="email" id="email" value=""/>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span5 form-inline">
                                  <label class="span4">First name <span class="f_req">*</span></label>
                                  <input type="text" name="first_name" id="first_name" value="" />
                              </div>
                              <div class="span5 form-inline">
                                  <label class="span4">Last name <span class="f_req">*</span></label>
                                  <input type="text" name="last_name" id="last_name" value="" />
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span5 form-inline">
                                  <label class="span4"> Login Name <span class="f_req">*</span></label>
                                  <input type="text" name="login" id="login" value=""/>
                              </div>
                              <div class="span5 form-inline">
                                  <label class="span4">Password<span class="f_req">*</span></label>
                                  <input type="password" name="password" id="password" value=""/>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span5 form-inline">
                                  <label class="span4"> City   </label>
                                  <input type="text" name="city" id="city" value="" />
                              </div>
                              <div class="span5 form-inline">
                                  <label class="span4">State </label>
                                  <input type="text" name="state" id="state" value=""/>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span5 form-inline">
                                  <label class="span4"> Type </label>
                                  <select name="type" id="type"  placeholder="type">
                                      <option value=""></option>
                                      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['usergroups'],'selected' => 'editor'), $this);?>

                                  </select>
                              </div>
                              <div class="span5 form-inline">
                                  <label class="span4"> Active </label>
                                  <select name="status" id="status" class="text-field-big" placeholder="active">
                                      <option value=" "></option>
                                      <option value="Active" selected="selected">Active</option>
                                      <option value="Inactive">Inactive</option>
                                  </select>
                              </div>

                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span5 form-inline">
                                  <label class="span4">Zip Code </label>
                                  <input type="text" name="zipcode" id="zipcode" value=""/>
                              </div>
                              <div class="span5 form-inline">
                                  <label class="span4">Phone Number  <span class="f_req">*</span></label>
                                  <input type="text" name="phone_number" id="phone_number" value=""/>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span5 form-inline">
                                  <label class="span4">Country<span class="f_req">*</span></label>
                                  <select name="country" id="country"  placeholder="country">
                                      <option value=" "></option>
                                      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['country_array']), $this);?>

                                  </select>
                              </div>
                              <div class="controls span5 form-inline">
                                  <label class="span4"> Upload picture <span class="f_req">*</span></label>
                                  <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
                                          <span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>
                                              <input type="file" name="uploadfile" id="uploadfile" /></span>
                                      <span class="fileupload-preview"></span>
                                      <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span5 form-inline">
                                  <label class="span4"> Adress </label>
                                  <textarea name="address" rows="3" id="address" value=""></textarea>
                              </div>

                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span5 form-inline">
                                  <button type="submit" name="usersubmit"  class="btn btn-success pull-right">Create New User</button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>

              <div id="permissionstab" class="tab-pane" >
                  <form action="/user/users-list?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&tab=permissionstab" method="get" id="permission" name="permission">
                  <div class="alert alert-info">
                      <div class="form-inline">
                          <select name="sel_group" id="sel_group" onchange="javascript:swift(1); this.form.submit();">
                              <option value="0" >Select Group</option>
                              <?php $_from = $this->_tpl_vars['groupList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['groups'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['groups']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['group']):
        $this->_foreach['groups']['iteration']++;
?>
                              <option value=<?php echo $this->_tpl_vars['group']->id; ?>
 <?php if ($this->_tpl_vars['group']->id == $_GET['sel_group']): ?> selected<?php endif; ?> ><?php echo $this->_tpl_vars['group']->groupName; ?>
</option>
                              <?php endforeach; endif; unset($_from); ?>
                          </select>
                          <select name="sel_user" id="sel_user" onchange="javascript:swift(2); javascript:this.form.submit();">
                              <option value="0" >Select User</option>
                              <?php $_from = $this->_tpl_vars['userList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['uk'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
                              <option value=<?php echo $this->_tpl_vars['user']->identifier; ?>
 <?php if ($this->_tpl_vars['user']->identifier == $_GET['sel_user']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['user']->login; ?>
</option>
                              <?php endforeach; endif; unset($_from); ?>
                          </select>
                          <input type="hidden" id="submenuId" name="submenuId" value=<?php echo $this->_tpl_vars['submenuId']; ?>
 />
                      </div>
                  </div>
                  <table id="permissionsgrid1" class="table table-bordered table-striped table_vam">
                      <thead>
                      <tr>
                          <th>Page Id</th>
                          <th>Select Page</th>
                          <th>Name of page</th>
                          <th>Page Description</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php if ($this->_tpl_vars['pageList'] != 'No Messages Found'): ?>
                      <?php $_from = $this->_tpl_vars['pageList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rights'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rights']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p']):
        $this->_foreach['rights']['iteration']++;
?>
                      <tr>
                          <td><?php echo $this->_tpl_vars['p']->getpageId(); ?>
</td>
                          <td >
                              <label class="uni-checkbox class="pull-left">
                                <span> <input type="checkbox" id="chk_<?php echo $this->_tpl_vars['p']->getpageId(); ?>
" name="chk_<?php echo $this->_tpl_vars['p']->getpageId(); ?>
" value="chk_<?php echo $this->_tpl_vars['p']->getpageId(); ?>
" class="uni_style" <?php if (isset ( $this->_tpl_vars['GpSel'] )): ?> <?php if (((is_array($_tmp=$this->_tpl_vars['p']->getpageId())) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['pageGpSel']) : in_array($_tmp, $this->_tpl_vars['pageGpSel']))): ?> checked <?php endif; ?> <?php endif; ?><?php if (isset ( $this->_tpl_vars['UsrSel'] )): ?> <?php if (((is_array($_tmp=$this->_tpl_vars['p']->getpageId())) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['pageUsrSel']) : in_array($_tmp, $this->_tpl_vars['pageUsrSel']))): ?> checked <?php endif; ?> <?php endif; ?> ></input></span>
                              </label>
                          </td>
                          <td ><label for="chk_<?php echo $this->_tpl_vars['p']->getpageId(); ?>
" class="pull-left" style="cursor: pointer;"><?php echo $this->_tpl_vars['p']->getNodeName(); ?>
</label></td>
                          <td><label for="chk_<?php echo $this->_tpl_vars['p']->getpageId(); ?>
" class="pull-left" style="cursor: pointer;"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']->getNodeValue())) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</label></td>

                      </tr>
                      <?php endforeach; endif; unset($_from); ?>
                      <input type="hidden" name="hid_totalrows" id="hid_totalrows" value=<?php echo count($this->_tpl_vars['pageList']); ?>
 />
                      <input type="hidden" name="tab" id="tab" value="permissionstab" />

                      <?php endif; ?>
                      </tbody>
                  </table>
                      <div style="height: 10px;"></div>
                      <?php if ($_GET['sel_group'] != 0 || $_GET['sel_user'] != 0): ?>
                        <button type="submit" value="assign" name="assign" id="assign" class="btn btn-info" style="margin-left: 50%">Assign </button>
                      <?php endif; ?>
                  </form>
              </div>
              <?php endif; ?>
        <!-- ///////////////////stats contributors search block////////////////////////////////////////////////////////////////////// -->
              <div id="searchcontirbtab" class="tab-pane" style="overflow-y: hidden">
                  <div class="alert alert-warning"><b>Search Writer</b><a href="/user/users-list?submenuId=ML3-SL6&tab=searchcontirbtab" class="label label-inverse pull-right">clear</a></div>
                  <form action="/user/users-list?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="get" id="searchstatscontribs" name="searchstatscontribs" onsubmit="return valSearchContribs();">
                  <input id="submenuId" name="submenuId" value="<?php echo $this->_tpl_vars['submenuId']; ?>
" type="hidden" />
                  <input id="tab" name="tab" value="contributorstab" type="hidden" />
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">created at</label>
                                  <input type="text"  placeholder="From" id="dp1" data-date-format="dd-mm-yyyy" name="start_date" value="<?php echo $_GET['start_date']; ?>
" class="span3 pull-left"  />
                                    <label></label>
                                  <input type="text" placeholder="To" id="dp2"  data-date-format="dd-mm-yyyy" name="end_date"  value="<?php echo $_GET['end_date']; ?>
" class="span3  pull-left" />
                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Activiity Date </label>
                                  <input class="span3" type="text" placeholder="From" id="actdp1" data-date-format="dd-mm-yyyy" name="activity_start_date" value="<?php echo $_GET['activity_start_date']; ?>
"  />
                                    <label></label>
                                  <input class="span3" type="text" placeholder="To" id="actdp2" data-date-format="dd-mm-yyyy" name="activity_end_date"  value="<?php echo $_GET['activity_end_date']; ?>
" />
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Type  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="type" id="junior" class="uni_style" value="junior" <?php if ($_GET['type'] == 'junior'): ?>  checked="checked" <?php endif; ?> /> Junior
                                  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="type" id="senior"class="uni_style"  value="senior" <?php if ($_GET['type'] == 'senior'): ?>  checked="checked" <?php endif; ?> /> Senior
                                  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="type" id="both" class="uni_style" value="0"  <?php if ($_GET['type'] == '0' || $_GET['type'] == ''): ?>  checked="checked" <?php endif; ?> /> Both
                                  </label>
                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Black List   </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="blacklist" id="yes" class="uni_style" value="yes" <?php if ($_GET['blacklist'] == 'yes'): ?>  checked="checked" <?php endif; ?> /> Yes
                                  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="blacklist" id="no" class="uni_style" value="no" <?php if ($_GET['blacklist'] == 'no'): ?>  checked="checked" <?php endif; ?> /> No
                                  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="blacklist" id="blacklist" class="uni_style" value="0" <?php if ($_GET['blacklist'] == '0' || $_GET['blacklist'] == ''): ?>  checked="checked" <?php endif; ?>  /> Ignore
                                  </label>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3"> Active </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="status" id="status_yes" class="uni_style" value="active" <?php if ($_GET['status'] == 'active'): ?>  checked="checked" <?php endif; ?> /> Active
                                  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="status" id="status_no"class="uni_style" value="inactive" <?php if ($_GET['status'] == 'inactive'): ?>  checked="checked" <?php endif; ?> /> Inactive
                                  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="status" id="status_both" class="uni_style" value="0" <?php if ($_GET['status'] == '0' || $_GET['status'] == ''): ?>  checked="checked" <?php endif; ?> /> Both
                                  </label>
                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Corrector</label>
                                  <label class="uni-radio">
                                      <input type="radio" name="type2" id="corrector" value="corrector" class="uni_style" <?php if ($_GET['type2'] == 'corrector'): ?>  checked="checked" <?php endif; ?> /> Yes
                                  </label>
                                  <label class="uni-radio">
                                      <input type="radio" name="type2" id="writer" value="writer" class="uni_style" <?php if ($_GET['type2'] == 'writer'): ?>  checked="checked" <?php endif; ?> /> No
                                  </label>
                                  <label class="uni-radio">
                                      <input type="radio" name="type2" id="all" value="0" class="uni_style" <?php if ($_GET['type2'] == '0' || $_GET['type2'] == ''): ?>  checked="checked" <?php endif; ?> /> All
                                  </label>
                              </div>

                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">articles refuse</label>
                                  <input type="text" id="noof_disapproved" name="noof_disapproved" value="<?php echo $_GET['noof_disapproved']; ?>
" />
                              </div>

                              <div class="span6 form-inline">
                                  <label class="span3">articles validated</label>
                                  <input type="text" id="min_arts_validated" name="min_arts_validated" value="<?php echo $_GET['min_arts_validated']; ?>
"  class="span3 pull-left" placeholder="min"/>
                                  <label></label>
                                  <input type="text" id="max_arts_validated" name="max_arts_validated"  value="<?php echo $_GET['max_arts_validated']; ?>
"  class="span3 pull-left" placeholder="max"/>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3"> Name/Email  </label>
                                  <select name="contrib" id="contrib" >
                                      <option value="0"></option>
                                      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['contributor_array'],'class' => 'span5','selected' => $_GET['contrib']), $this);?>

                                  </select>
                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">No. of participations</label>
                                  <input type="text" id="min_total_parts" name="min_total_parts" value="<?php echo $_GET['min_total_parts']; ?>
"  class="span3 pull-left" placeholder="min"/>
                                  <label></label>
                                  <input type="text" id="max_total_parts" name="max_total_parts"  value="<?php echo $_GET['max_total_parts']; ?>
"  class="span3 pull-left" placeholder="max"/>
                              </div>

                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Nationality</label>
                                  <select  name=nationalism id=nationalism >
                                      <option value="0"> </option>
                                      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['nationality_array'],'selected' => $_GET['nationalism']), $this);?>

                                  </select>
                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Articles Sent </label>
                                  <input type="text" id="min_arts_sent" name="min_arts_sent" value="<?php echo $_GET['min_arts_sent']; ?>
" class="span3 pull-left" placeholder="min"/>
                                  <label></label>
                                  <input type="text" id="max_arts_sent" name="max_arts_sent"  value="<?php echo $_GET['max_arts_sent']; ?>
"  class="span3 pull-left" placeholder="max"/>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Languages</label>
                                  <select  name=language  id=language>
                                      <option value="0"> </option>
                                      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['language_array'],'selected' => $_GET['language']), $this);?>

                                  </select>
                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">bidding refused</label>
                                  <input type="text" id="min_parts_refused" name="min_parts_refused" value="<?php echo $_GET['min_parts_refused']; ?>
" class="span3 pull-left" placeholder="min"/>
                                  <label></label>
                                  <input type="text" id="max_parts_refused" name="max_parts_refused"  value="<?php echo $_GET['max_parts_refused']; ?>
" class="span3 pull-left" placeholder="max"/>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Deliveries</label>
                                  <?php echo smarty_function_html_options(array('name' => 'aotitle','id' => 'aotitle','options' => $this->_tpl_vars['delivery_array'],'onChange' => "fnloadao();",'selected' => $_GET['aotitle']), $this);?>

                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Refused definite</label>
                                  <input type="text" id="min_arts_refused" name="min_arts_refused" value="<?php echo $_GET['min_arts_refused']; ?>
" class="span3 pull-left" placeholder="min" />
                                  <label></label>
                                  <input type="text" id="max_arts_refused" name="max_arts_refused"  value="<?php echo $_GET['max_arts_refused']; ?>
" class="span3 pull-left" placeholder="max"/>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Quizz</label>
                                  <span id="quiz_load"> </span>
                                    <span id="quiz_preload">
                                    <select  id="contribquiz" name="contribquiz"  >
                                        <option value="0"> </option>
                                        <?php echo smarty_function_html_options(array('id' => 'contribquiz','options' => $this->_tpl_vars['quizlist'],'selected' => $this->_tpl_vars['contribquiz']), $this);?>

                                    </select>  </span>
                              </div>

                              <div class="span6 form-inline">
                                  <label class="span3">Age</label>
                                  <input id="minage" name="minage" type="text" value="<?php echo $_GET['minage']; ?>
" class="span3 pull-left" placeholder="min" />
                                  <label></label><input id="maxage" name="maxage" type="text" value="<?php echo $_GET['maxage']; ?>
" class="span3 pull-left" placeholder="max" />
                              </div>

                          </div>
                      </div>

                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Categories</label>
                                  <select  id="category" name="category[]"  onchange="categoryList();">
                                      <option value="0"> </option>
                                      <?php echo smarty_function_html_options(array('id' => 'category','options' => $this->_tpl_vars['category_array'],'selected' => $this->_tpl_vars['category'],'onchange' => "fnloadquiz();"), $this);?>

                                  </select>

                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Language 2</label>
                                  <select  id=language2 name=language2 onchange="language2List();">
                                      <option value="0"> </option>
                                      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['language_array'],'selected' => $_GET['language2']), $this);?>

                                  </select>
                              </div>

                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <div class="alert alert-info span9 hide" id="targetdiv">  </div>
                              </div>
                              <div class="span6 form-inline">
                                  <div class="alert alert-info span9 hide" id="targetdivlang"> </div>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <button type="submit" name="searchsubmit" class="btn btn-success pull-right" value="Search" >Search</button>
                              </div>
                          </div>
                      </div>
                  </form>
                  <div class="alert alert-info">
                      <h3 class="heading">Save Search Criteria</h3>
                      <div style="padding-left: 10px;">
                          <ul class="list_d">
                          <?php if ($this->_tpl_vars['savedSearchesUrls'] != 'NO'): ?>
                          <?php $_from = $this->_tpl_vars['savedSearchesUrls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['urlslist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['urlslist']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['urls']):
        $this->_foreach['urlslist']['iteration']++;
?>
                          <li><a href="<?php echo $this->_tpl_vars['urls']['url']; ?>
" ><?php echo ((is_array($_tmp=$this->_tpl_vars['urls']['search_name'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 10) : smarty_modifier_wordwrap($_tmp, 10)); ?>
</a><a href="/user/deletesearch?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&searchId=<?php echo $this->_tpl_vars['urls']['id']; ?>
">
                              <i class="icon-trash"></i></a></li>
                          <?php endforeach; endif; unset($_from); ?>
                          <?php else: ?>
                          No Saved Searches
                          <?php endif; ?>
                          </ul>
                      </div>
                  </div>
              </div>
          <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
          </div>
      </div>

  </div>
</div>

<!--///for the edit ao detials popup///-->
<div class="modal container hide fade" id="editao">
    <div class="modal-header">
        <button class="close" onclick="closePopup('editao');">&times;</button>
        <h3>Edit AO Details</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>
<!--///for the publish ao  popup///-->
<div class="modal2 hide fade" id="publishao">
    <div class="modal-header">
        <button class="close" onclick="closePopup('publishao');">&times;</button>
        <h3>Publish AO</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>

<div style="visibility:hidden" >
    <form id="user_login_form" name="user_login_form" method="post" action="" target="_blank">
        <input type="text" id="login_name" name="login_name" value="">
        <input type="password" id="login_password" name="login_password" value="<?php echo $this->_tpl_vars['user_detail'][0]['password']; ?>
" >
        <input type="submit" value="Login" />
    </form>
</div>


<?php echo '
<script type="text/javascript" >
    function connect_fo(user,email,pwd)
    {
        document.forms["user_login_form"].action="http://ep-test.edit-place.co.uk/index/userfologin";
        $(\'#login_name\').val(email);
        $(\'#login_password\').val(pwd);
        document.forms["user_login_form"].submit();
    }
</script>
'; ?>


