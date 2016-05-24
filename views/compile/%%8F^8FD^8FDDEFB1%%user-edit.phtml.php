<?php /* Smarty version 2.6.19, created on 2015-03-04 13:33:14
         compiled from gebo/user/user-edit.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/user/user-edit.phtml', 196, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/ajaxupload.3.5.js"></script>
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/jQuery.fileinput.js"></script>
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/jquery.Jcrop.min.js"></script>
<link rel="stylesheet" href="/BO/theme/gebo/css/jquery.Jcrop.css" />


<script language="javascript">
    $(document).ready(function() {
        $("#type").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#status").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#country").chosen({ allow_single_deselect: false,search_contains: true  });
        $(".uni_style").uniform();
        gebo_validation.reg();
    });
    /**profile pic uploading**/
    $(function(){
        var btnUpload=$(\'#filePJ\');
        var status=$(\'#file_name\');
        var userid=$(\'#userId\').val();
        new AjaxUpload(btnUpload, {
            action: \'uploadprofilepic\',
            name: \'uploadpic\',
            data:{userid:userid},
            onSubmit: function(file, ext){     //alert(userid);
                if (! (ext && /^(jpg|jpeg|gif|png)$/.test(ext))){
                    // extension is not allowed
                    status.text("Merci d\'uploaded uniquement des fichiers JPG.").css(\'color\',\'#FF0000\');
                    return false;
                }
                status.html(\'<div align="right"><img src="http://admin-test.edit-place.co.uk/FO/images/loading-b.gif" /></div>\') ;
            },
            onComplete: function(file, response){       //alert(response);
                //On completion clear the status
                status.text(\'\');
                $(\'#file_name\').html(\'\');
                //Add uploaded file to list
                var obj = $.parseJSON(response);
                var approot="http://admin-test.edit-place.co.uk/FO/";
                if(obj.status=="success"){
                    $(\'#spec_file_name\').val(file);
                  // alert(approot+obj.path+obj.identifier+"_crop."+obj.ext+ \'?\' + (new Date()).getTime());
                    $("#cropbox").attr(\'src\',\'#\');
                    $(".jcrop-holder").remove();
                    $("#cropbox").removeData(\'Jcrop\');
                    $("#cropbox").attr("src",approot+obj.path+obj.identifier+"_crop."+obj.ext+ \'?\' + (new Date()).getTime());

                    $("#cropbox").show();
                    $(\'#cropbox\').Jcrop({
                        aspectRatio: 1,
                        addClass: \'jcrop-dark\',
                        setSelect: [ 60, 110, 150, 200 ],
                        onSelect: updateCoords
                    });
                    $(\'#cropimagepopup\').modal(\'show\');
                    if(file.length>25)
                        $(\'#file_name\').html(file.substr(0,25)+".. Uploaded").css(\'color\',\'#006600\');
                    else
                        $(\'#file_name\').html(file+" Uploaded").css(\'color\',\'#006600\');
                }
                else if(obj.status=="smallfile"){
                    $(\'#file_name\').html("L\'image est trop petite, merci d\'en uploader une autre").css(\'color\',\'#FF0000\');
                }
                else{
                    $(\'#file_name\').html(\'Error in upload\').css(\'color\',\'#FF0000\');
                }
            }
        });
        jQuery(\'img\').each(function(){
            jQuery(this).attr(\'src\',jQuery(this).attr(\'src\')+ \'?\' + (new Date()).getTime());
        });
    });
    //* validation
    gebo_validation = {
        reg: function() {
            reg_validator = $(\'.form_validation_reg\').validate({
                onkeyup: false,
                errorClass: \'error\',
                validClass: \'valid\',
                highlight: function(element) {
                    $(element).closest(\'div\').addClass("f_error");
                    $(element).closest(\'div\').css("color", "black");
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
                    last_name: { required: true, minlength: 3 },
                    login: { required: true, minlength: 2 },
                    password: { required: true, minlength: 2 },
                    phone_number: { required: true },
                    address2: { required: true, minlength: 5 },
                    country: { required: true, minlength: 2 },
                    email: { required: true, minlength: 5 }
                },
                invalidHandler: function(form, validator) {
                    $.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
                }
            })
        }
    };
</script>
<!--<style>#clientlogo{width:30px;height:30px;}</style>-->
'; ?>

<div class="row-fluid">
    <a class="label label-inverse pull-right" href="/user/users-list?submenuId=ML3-SL6&tab=bouserstab">retour</a>
   <div class="span12" style="">
  <h3 class="heading">Edit user</h3>
<form class="form_validation_reg" action="" onsubmit="return validateNewUser();" method="post" id="user" name="user" enctype="multipart/form-data">
    <input type="hidden" id="userId" name="userId" value="<?php echo $this->_tpl_vars['Userdetails'][0]['identifier']; ?>
" />
	<div class="formSep">
        <div class="row-fluid">
            <div class="span5 form-inline">
                <label class="span4">Email<span class="f_req">*</span></label>
                <input type="text" name="email" id="email" value="<?php echo $this->_tpl_vars['Userdetails'][0]['email']; ?>
"  <?php if ($this->_tpl_vars['groupId'] != 1): ?> readonly <?php endif; ?>/>
            </div>
        </div>
    </div>
    <div class="formSep">
        <div class="row-fluid">
            <div class="span5 form-inline">
                <label class="span4">Initial  <span class="f_req">*</span></label>
                <label class="uni-radio">
                    <input type="radio" name="initial" id="initialmr" checked="" value="mr" <?php if ($this->_tpl_vars['Userdetails'][0]['initial'] == 'mr'): ?> checked="checked" <?php endif; ?> class="uni_style"/> mr
                </label>
                <label class="uni-radio">
                    <input type="radio" name="initial" id="initialmme" value="mme"  <?php if ($this->_tpl_vars['Userdetails'][0]['initial'] == 'mme'): ?> checked="checked" <?php endif; ?> class="uni_style"/> mrs
                </label>
                <label class="uni-radio">
                    <input type="radio" name="initial" id="initialmlle" value="mlle" <?php if ($this->_tpl_vars['Userdetails'][0]['initial'] == 'mlle'): ?> checked="checked" <?php endif; ?> class="uni_style"/> miss
                </label>
            </div>

            <div class="span5 form-inline">
                <label class="span4"> Upload picture <span class="f_req">*</span></label>
                <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
                                      <span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>
                                          <input type="file" name="file" id="filePJ" /></span>
                    <span class="fileupload-preview"></span>
                    <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
                    <div id="file_name"></div>
                </div>
            </div>
            <img alt="user pic" id="userpic" class="thumbnail1" src="http://admin-test.edit-place.co.uk<?php echo $this->_tpl_vars['profilepic']; ?>
">
        </div>
    </div>
    <div class="formSep">
        <div class="row-fluid">
            <div class="span5 form-inline">
                <label class="span4">First name <span class="f_req">*</span></label>
                <input type="text" name="first_name" id="first_name" value="<?php echo $this->_tpl_vars['Userdetails'][0]['first_name']; ?>
" />
            </div>
            <div class="span5 form-inline">
                <label class="span4">Last name <span class="f_req">*</span></label>
                <input type="text" name="last_name" id="last_name" value="<?php echo $this->_tpl_vars['Userdetails'][0]['last_name']; ?>
" />
            </div>
        </div>
    </div>

    <div class="formSep">
        <div class="row-fluid">
            <div class="span5 form-inline">
                <label class="span4"> Login Name <span class="f_req">*</span></label>
                <input type="text" name="login" id="login" value="<?php echo $this->_tpl_vars['Userdetails'][0]['login']; ?>
"/>
            </div>
            <div class="span5 form-inline">
                <label class="span4">Password<span class="f_req">*</span></label>
                <input type="password" name="password" id="password" value="<?php echo $this->_tpl_vars['Userdetails'][0]['password']; ?>
"/>
            </div>
        </div>
    </div>
    <div class="formSep">
        <div class="row-fluid">
            <div class="span5 form-inline">
                <label class="span4"> City   </label>
                <input type="text" name="city" id="city" value="<?php echo $this->_tpl_vars['Userdetails'][0]['city']; ?>
" />
            </div>
            <div class="span5 form-inline">
                <label class="span4">State </label>
                <input type="text" name="state" id="state" value="<?php echo $this->_tpl_vars['Userdetails'][0]['state']; ?>
"/>
            </div>
        </div>
    </div>
    <div class="formSep">
        <div class="row-fluid">
            <div class="span5 form-inline">
                <label class="span4"> Type </label>
                <select name="type" id="type"  placeholder="type">
                    <option value=""></option>
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['usergroups'],'selected' => $this->_tpl_vars['Userdetails'][0]['type']), $this);?>

                </select>
            </div>
            <div class="span5 form-inline">
                <label class="span4"> Active </label>
                <select name="status" id="status" class="text-field-big" placeholder="active">
                    <option value=" "></option>
                    <option value="Active" <?php if ($this->_tpl_vars['Userdetails'][0]['status'] == 'Active'): ?> selected="selected" <?php endif; ?>>Active</option>
                    <option value="Inactive" <?php if ($this->_tpl_vars['Userdetails'][0]['status'] == 'disable'): ?> selected="selected" <?php endif; ?>>Inactive</option>
                </select>
            </div>

        </div>
    </div>
    <div class="formSep">
        <div class="row-fluid">
            <div class="span5 form-inline">
                <label class="span4">Zip Code </label>
                <input type="text" name="zipcode" id="zipcode" value="<?php echo $this->_tpl_vars['Userdetails'][0]['zipcode']; ?>
"/>
            </div>
            <div class="span5 form-inline">
                <label class="span4">Phone Number  <span class="f_req">*</span></label>
                <input type="text" name="phone_number" id="phone_number" value="<?php echo $this->_tpl_vars['Userdetails'][0]['phone_number']; ?>
"/>
            </div>
        </div>
    </div>
    <div class="formSep">
        <div class="row-fluid">
            <div class="span5 form-inline">
                <label class="span4">Country</label>
                <select name="country" id="country"  placeholder="country">
                    <option value=" "></option>
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['country_array'],'selected' => $this->_tpl_vars['Userdetails'][0]['country']), $this);?>

                </select>
            </div>
            <div class="span5 form-inline">
                <label class="span4"> Address </label>
                <textarea name="address" rows="3" id="address" value="<?php echo $this->_tpl_vars['Userdetails'][0]['address']; ?>
"><?php echo $this->_tpl_vars['Userdetails'][0]['address']; ?>
</textarea>
            </div>
        </div>
    </div>
   
    <div class="formSep">
        <div class="row-fluid">
            <div class="span5 form-inline">
                <button type="submit" name="usersubmit" class="btn btn-success pull-right">Edit User</button>
            </div>
        </div>
    </div>
</form>
</div>
</div>
<!--///when republish the popup comes for edit details and mail for republish article///-->
<div class="modal hide fade" id="cropimagepopup">
    <div class="modal-header">
        <button class="close" onclick="closePopup('cropimagepopup');">&times;</button>
        <h3>Edit User</h3>
    </div>
    <div class="modal-body alignright">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo/user/profile_image_crop.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <div class="modal-footer">
    </div>
</div>


