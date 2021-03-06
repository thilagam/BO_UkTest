<?php /* Smarty version 2.6.19, created on 2014-12-02 12:30:54
         compiled from gebo/user/contributors.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'gebo/user/contributors.phtml', 186, false),array('modifier', 'cat', 'gebo/user/contributors.phtml', 188, false),)), $this); ?>
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


        $("#contributorstab").addClass(\'active\');


    $(".uni_style").uniform();
    gebo_validation.reg();


    $(\'#contribsgrid\').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/user/loadcontributor",
        "fnServerParams": function ( aoData ) {
            aoData.push( { "name": ctype, "value": "yes" } );
            aoData.push({ "name": "totalcount", "value": count })

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
              <li ><a href="#contributorstab" data-toggle="tab" class="lable-danger"><strong>Contributeurs</strong></a></li>
          </ul>
          <div class="tab-content">
             <div id="contributorstab" class="tab-pane">
                  <div class="alert alert-info form-inline">
                      <div class="alpbold">
                      Total Contributors : <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab&counttype=total_contribs" class="label label-info"><?php echo $this->_tpl_vars['contribCount'][4]['total_contribs']; ?>
</a> |
                      Never Participated  : <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab&counttype=never_participated" class="label label-warning"><?php echo $this->_tpl_vars['contribCount'][0]['never_participated']; ?>
</a> |
                      Never Validated : <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab&counttype=never_validated" class="label label-gebo"><?php echo $this->_tpl_vars['contribCount'][2]['never_validated']; ?>
</a> |
                      Never Sent  : <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab&counttype=never_sent" class="label label-danger"><?php echo $this->_tpl_vars['contribCount'][1]['never_sent']; ?>
</a> |
                      Atleast 1 Validated : <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab&counttype=once_validated" class="label label-inverse"><?php echo $this->_tpl_vars['contribCount'][3]['once_validated']; ?>
</a> |
                      Published : <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab&counttype=once_published" class="label label-success"><?php echo $this->_tpl_vars['contribCount'][5]['once_published']; ?>
</a></div>
                  </div>
                  <table class="table table-striped table-bordered dTableR tdleftalign" id="contribsgrid">
                      <thead>
                      <tr>
                          <th>SL.NO</th>
                          <th>Nom</th>
                          <th>Email</th>
                          <th>Profile Type</th>
						  <th>Statut</th>
                          <th>Compte cr&eacute;&eacute; le</th>
                          <th>categories</th>
                          <th>Langue</th>
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
                      </div>
                  </div>
              </div>
          </div>
      </div>

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


