<?php /* Smarty version 2.6.19, created on 2014-12-02 10:47:35
         compiled from gebo/user/bo-users.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/user/bo-users.phtml', 126, false),)), $this); ?>
<?php echo '
<script type="text/javascript">


$(document).ready(function() {
    $("#bouserstab").addClass(\'active\');
    $(".uni_style").uniform();

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
             <li><a href="#bouserstab" data-toggle="tab" class="lable-success"><strong>Utilisateurs Bo</strong></a></li>
          </ul>
          <div class="tab-content">
              <div id="bouserstab" class="tab-pane" >

                  <table id="bousersgrid" class="table table-bordered table-striped table_vam tdleftalign">
                      <thead>
                      <tr>
                          <th>SL.NO</th>
                          <th>Nom</th>
                          <th>Pays</th>
                          <th>T&eacute;l&eacute;phone</th>
                          <th>Type</th>
                          <th>Statut</th>
                          <th>cr&eacute;&eacute; le</th>
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


