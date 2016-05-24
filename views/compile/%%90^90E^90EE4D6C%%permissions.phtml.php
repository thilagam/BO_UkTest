<?php /* Smarty version 2.6.19, created on 2015-06-24 15:21:43
         compiled from gebo/user/permissions.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', 'gebo/user/permissions.phtml', 171, false),array('modifier', 'utf8_decode', 'gebo/user/permissions.phtml', 175, false),array('modifier', 'count', 'gebo/user/permissions.phtml', 179, false),)), $this); ?>
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
    $("#permissionstab").addClass(\'active\');
    $(".uni_style").uniform();
   // gebo_validation.reg();
    //////////////////////////////////////////////////////////////////////
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
	
	if($("input[name=\'chk[]\']").length == $("input[name=\'chk[]\']:checked").length)
			$("#select_rows").attr(\'checked\',true);
		else
			$("#select_rows").removeAttr(\'checked\');
	
	 //* select all rows
    $(\'#select_rows\').click(function () {
        var tableid = $(this).data(\'permissionsgrid1\');
        $(\'#permissionsgrid1\').find(\'input[type="checkbox"]\').attr(\'checked\', this.checked);
		//$(".uni_style").uniform();
        var selectedVal = new Array();
        $("#permissionsgrid1 input:checkbox:checked").each(function()
        {
            selectedVal.push($(this).val());
        });

        $("#selectedpages").val(selectedVal);
    });
	
	$("input[name=\'chk[]\']").click(function(){
		if($("input[name=\'chk[]\']").length == $("input[name=\'chk[]\']:checked").length)
			$("#select_rows").attr(\'checked\',true);
		else
			$("#select_rows").removeAttr(\'checked\');
	})
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
</script>
'; ?>

<div class="row-fluid">
  <div class="span12" style="">
   <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
      <div class="tabbable">
          <ul class="nav nav-tabs">
              <li ><a href="#permissionstab" data-toggle="tab" class="lable-info"><strong>Permissions</strong></a></li>
          </ul>
          <div class="tab-content">
             <div id="permissionstab" class="tab-pane" >
                  <form action="/user/permissions?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&tab=permissionstab" method="post" id="permission" name="permission">
                  <div class="alert alert-info">
                      <div class="form-inline">
                          <select name="sel_group" id="sel_group" onchange="javascript:swift(1); this.form.submit();">
                              <option value="0" >S&eacute;lectionnez un groupe</option>
                              <?php $_from = $this->_tpl_vars['groupList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['groups'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['groups']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['group']):
        $this->_foreach['groups']['iteration']++;
?>
                              <option value=<?php echo $this->_tpl_vars['group']->id; ?>
 <?php if ($this->_tpl_vars['group']->id == $this->_tpl_vars['sel_group']): ?> selected<?php endif; ?> ><?php echo $this->_tpl_vars['group']->groupName; ?>
</option>
                              <?php endforeach; endif; unset($_from); ?>
                          </select>
                          <select name="sel_user" id="sel_user" onchange="javascript:swift(2); javascript:this.form.submit();">
                              <option value="0" >S&eacute;lectionnez un user</option>
                              <?php $_from = $this->_tpl_vars['userList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['uk'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
                              <option value=<?php echo $this->_tpl_vars['user']->identifier; ?>
 <?php if ($this->_tpl_vars['user']->identifier == $this->_tpl_vars['sel_user']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['user']->login; ?>
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
                          <th class="table_checkbox"><input type="checkbox" name="select_rows" id="select_rows" class="" data-tableid="permissionsgrid1"/></th>
                          <th>Nom de la page</th>
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
                              <label class="pull-left">
                                <span> <input type="checkbox" id="chk_<?php echo $this->_tpl_vars['p']->getpageId(); ?>
" name="chk[]" value="<?php echo $this->_tpl_vars['p']->getpageId(); ?>
" class="" <?php if (isset ( $this->_tpl_vars['GpSel'] )): ?> <?php if (((is_array($_tmp=$this->_tpl_vars['p']->getpageId())) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['pageGpSel']) : in_array($_tmp, $this->_tpl_vars['pageGpSel']))): ?> checked <?php endif; ?> <?php endif; ?><?php if (isset ( $this->_tpl_vars['UsrSel'] )): ?> <?php if (((is_array($_tmp=$this->_tpl_vars['p']->getpageId())) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['pageUsrSel']) : in_array($_tmp, $this->_tpl_vars['pageUsrSel']))): ?> checked <?php endif; ?> <?php endif; ?> ></input></span>
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
					  <input type="hidden" name="selectedpages"  id="selectedpages" value="" />
                      <?php endif; ?>
                      </tbody>
                  </table>
                      <div style="height: 10px;"></div>
                      <?php if ($this->_tpl_vars['sel_group'] || $this->_tpl_vars['sel_user'] != 0): ?>
                        <button type="submit" value="assign" name="assign" id="assign" class="btn btn-info" style="margin-left: 50%">Assign </button>
                      <?php endif; ?>
                  </form>
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


