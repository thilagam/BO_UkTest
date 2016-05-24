<?php /* Smarty version 2.6.19, created on 2015-11-10 11:47:13
         compiled from gebo/user/client-edit.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/user/client-edit.phtml', 322, false),array('modifier', 'date_format', 'gebo/user/client-edit.phtml', 591, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/ajaxupload.3.5.js"></script>
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/jQuery.fileinput.js"></script>
<script src="/BO/theme/gebo/lib/validation/jquery.validate.min.js"></script>
<script language="javascript">
    $(document).ready(function() {
        $(\'#aolisttable\').dataTable({
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
                { "sType": "natural" },
                { "sType": "natural" }
            ]
        });
        var tab = getParameterByName(\'tab\', $(location).attr(\'href\'));
        $("#"+tab).addClass(\'active\');
        $("#favcontribs").chosen({ allow_single_deselect: false,search_contains: true});
        $("#country").chosen({ allow_single_deselect: false,search_contains: true});
        $(".uni_style").uniform();
        gebo_validation.reg();
    });
 $(function(){
        var btnUpload=$(\'#fileupload\');
        var status=$(\'#file_name\');
        var clientid='; ?>
<?php echo $_GET['userId']; ?>
<?php echo ';

        new AjaxUpload(btnUpload, {
            action: \'uploadclientgloballogo\',
            name: \'uploadfile\',
            data:{clientid:clientid},
            onSubmit: function(file, ext){
                 if (! (ext && /^(jpg|jpeg|png|gif)$/.test(ext))){
                    // extension is not allowed
                    status.text(\'Only JPG, GIF or PNG files are allowed\').css(\'color\',\'#FF0000\');
                    return false;
                }
                status.html(\'<div align="center"><img src="http://ep-test.edit-place.co.uk/FO/images/loading-b.gif" /></div>\') ;
            },
            onComplete: function(file, response){       //alert(response);

            //On completion clear the status
                status.text(\'\');
                $(\'#file_name\').html(\'\');

                //Add uploaded file to list
                var obj = $.parseJSON(response);
                var approot="http://ep-test.edit-place.co.uk/FO/";

                if(obj.status=="success"){

                    var user=obj.identifier;
                    var path=obj.path;
                    var ext=obj.ext;

                   /* $(\'#uUser\').val(user);
                    $(\'#uPath\').val(path);
                    $(\'#uFile\').val(file);
                    $(\'#uExt\').val(ext);

                    $(\'#spec_file_name\').val(file);

                    $("#fade").show();
                    $("#cropprofile").show();
                    $("#cropbox").attr("src","");

                    $("#cropbox").attr("src",approot+obj.path+obj.identifier+"_crop."+obj.ext+ \'?\' + (new Date()).getTime());
                    $("#cropbox").hide();
                    $(\'#cropbox\').Jcrop({
                        aspectRatio: 0,
                        setSelect: [ 60, 110, 150, 200 ],
                        onSelect: updateCoords
                    });*/

                    var profilepic=approot+obj.path+obj.identifier+"_global."+obj.ext+ \'?\' + (new Date()).getTime();

                   // closePop();
                   // $("#fade").show();
                   // $("#cropprofile").show();
                    $("#clientlogo").attr("src",profilepic);
					//alert("Logo has been uploaded");

                }
                else if(obj.status=="smallfile"){

                    $(\'#file_name\').html("Error in upload, image too small. L\\\'image est trop petite, merci d\\\'en uploader une autre.").css(\'color\',\'#FF0000\');
                }
                else{
                    $(\'#file_name\').html(\'Error in upload\').css(\'color\',\'#FF0000\');
                }
            }
        });
 }) ;

    function updateCoords(c)
    {
        $(\'#x\').val(c.x);
        $(\'#y\').val(c.y);
        $(\'#w\').val(c.w);
        $(\'#h\').val(c.h);
    };

    function validate_client()
    {
        var company_name    =   ($(\'#company_name\').val()).trim() ;
        if( company_name == \'\')
        {
            $(\'#company_name\').css(\'border\',\'1px solid red\') ;
            return false ;
        }
        else
        {
            var clnt = '; ?>
<?php echo $_GET['userId']; ?>
<?php echo ';
            var targeturl = \'/ao/clientprofilepic?client=\'+clnt ;
            $.post(targeturl, function(clientprof){
               if(clientprof != \'yes\')
                {
                    $(\'#file\').css(\'border\',\'1px solid red\') ;
                    return false ;
                }
                else
                    return true ;
            }) ;
        }

    };

    function checkClientPicExist()  {

        var clnt = '; ?>
<?php echo $_GET['userId']; ?>
<?php echo ';
        var targeturl = \'/ao/clientprofilepic?client=\'+clnt ;
        $.post(targeturl, function(clientprof){
           // alert(clientprof) ;
            if(clientprof != \'yes\')
                return false ;
            else
                return true ;
        }) ;
    }

    function checkCoords()
    {
        if (parseInt($(\'#w\').val())) return true;
        alert(\'Please select a crop region then press submit.\');
        return false;
    }
    function clientprofilepiccrop(user,path,ext,file)
    {
        var target_page = "/ao/cropclientimagepopup?user="+user+"&path="+path+"&ext="+ext+\'&file=\'+file ;
        var query = "" ;
         $.get(target_page, query, function(data){
                $("#fade").show();
                $("#cropprofile").show();
                $("#cropprofile").html(data);

        });
    }
    function EditClientInfo(userid)
    {
        window.open(
                "/user/client-edit?submenuId=ML3-SL6&mode=edit&userId="+userid,
                \'_self\'
        );
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
					email: { required: true, minlength: 5 },
                    company_name: { required: true, minlength: 3 },
                    first_name: { required: true, minlength: 3 },
                    password: { required: true, minlength: 6 },
                    last_name: { required: true, minlength: 3 },
                    rcs: { required: true, minlength: 2 },
                    vat: { required: true, minlength: 2 },
                    zipcode: { required: true, minlength: 5 },
                    fax_number: { required: true, minlength: 5 },
                    address: { required: true, minlength: 5 },
                    phone_number: { required: true, minlength: 5 },
                    city: { required: true, minlength: 3 },
                    contrib_percentage: { required: false, range:[0, 100]}
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

<div class="span12" style="">
  <div class="tabbable">
      <ul class="nav nav-tabs">
          <li <?php if ($_GET['tab'] == 'editclient'): ?> class="active" <?php endif; ?>><a href="#editclient" data-toggle="tab" class="lable-success"><strong><i class="icon-pencil"></i>&nbsp;Edit</strong></a></li>
          <li <?php if ($_GET['tab'] == 'viewclient'): ?> class="active" <?php endif; ?>><a href="#viewclient" data-toggle="tab" class="lable-danger"><strong><i class="icon-eye-open"></i>&nbsp;View</strong></a></li>
          <li <?php if ($_GET['tab'] == 'aolistclient'): ?> class="active" <?php endif; ?>><a href="#aolistclient" data-toggle="tab" class="lable-danger"><strong><i class="splashy-view_thumbnail"></i>&nbsp;AO list</strong></a></li>
          <a class="label label-inverse pull-right" href="/user/users-list?submenuId=ML3-SL6&tab=clientstab">retour</a>
      </ul>
  <div class="tab-content" style="overflow-y: hidden;">
      <div id="editclient" class="tab-pane">
        <form class="form_validation_reg" name="" action="/user/client-edit?submenuId=ML3-SL6&userId=<?php echo $this->_tpl_vars['user_detail'][0]['identifier']; ?>
" method="post" onsubmit="return validate_client();">
          <div class="alert alert-info span11"><b> edit client details</b><img alt="user pic" id="clientlogo" class="fileupload-new thumbnail1 pull-right" src="http://ep-test.edit-place.co.uk/FO/profiles/clients/logos/<?php echo $this->_tpl_vars['user_detail'][0]['identifier']; ?>
/<?php echo $this->_tpl_vars['user_detail'][0]['identifier']; ?>
_global.png"> </div>
          <div class="formSep">
                <div class="row-fluid">
                    <div class="span6 form-inline">
                        <label class="span4">Email <span class="f_req">*</span></label>
                        <input type="text" name="email" id="email" value="<?php echo $this->_tpl_vars['user_detail'][0]['email']; ?>
" <?php if ($this->_tpl_vars['groupId'] != 1): ?> readonly <?php endif; ?>/>
                    </div>
                </div>
            </div>
		  <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">Name of Company<span class="f_req">*</span></label>
                      <input type="text" name="company_name" id="company_name" value="<?php echo $this->_tpl_vars['user_detail'][0]['company_name']; ?>
"/>
                  </div>
                  <div class="span6 form-inline">
                      <label class="span4">Logo</label>
                       <div id="fileupload" data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
                          <span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>
                          <input type="file" class="span9" name="file" id="file" size="11"> </span>
                        <span class="fileupload-preview"></span>
                        <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
                           <div id="file_name"></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">First Name <span class="f_req">*</span></label>
                      <input type="text" name="first_name" id="first_name" value="<?php echo $this->_tpl_vars['user_detail'][0]['first_name']; ?>
" />
                  </div>
                  <div class="span6 form-inline">
                      <label class="span4">Last Name <span class="f_req">*</span></label>
                      <input type="text" name="last_name" id="last_name" value="<?php echo $this->_tpl_vars['user_detail'][0]['last_name']; ?>
" />
                  </div>
              </div>
          </div>
          <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">Status </label>
                      <label class="uni-radio"><input type="radio" name="status" value="Active" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['status'] == 'Active'): ?>checked<?php endif; ?>/>Active&nbsp;</label>
                      <label class="uni-radio"><input type="radio" name="status" value="Inactive" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['status'] == 'Inactive'): ?>checked<?php endif; ?>/>Inactive</label>
                  </div>
                  <div class="span6 form-inline">
                      <label class="span4">Password<span class="f_req">*</span></label>
                      <input type="password" name="password" id="password" value="<?php echo $this->_tpl_vars['user_detail'][0]['password']; ?>
"/>
                  </div>
              </div>
          </div>

          <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">RCS <span class="f_req">*</span></label>
                      <input type="text" name="rcs" id="rcs" value="<?php echo $this->_tpl_vars['user_detail'][0]['rcs']; ?>
"/>
                  </div>
                  <div class="span6 form-inline">
                      <label class="span4">TVA Intracommunautaire<span class="f_req">*</span></label>
                      <input type="text" name="vat" id="vat" value="<?php echo $this->_tpl_vars['user_detail'][0]['vat']; ?>
"/>
                  </div>
              </div>
          </div>

          <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">Writer percentage</label>
                      <input type="text" name="contrib_percentage" id="contrib_percentage" value="<?php echo $this->_tpl_vars['user_detail'][0]['contrib_percentage']; ?>
" />
                  </div>
                  <div class="span6 form-inline">
                      <label class="span4">phone<span class="f_req">*</span> </label>
                      <input type="text" name="phone_number" id="phone_number" value="<?php echo $this->_tpl_vars['user_detail'][0]['phone_number']; ?>
" style="width:220px;"/>
                  </div>
              </div>
          </div>
          <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">Address<span class="f_req">*</span></label>
                      <input type="text" name="address" id="address" value="<?php echo $this->_tpl_vars['user_detail'][0]['address']; ?>
" />
                  </div>
                  <div class="span6 form-inline">
                      <label class="span4">City<span class="f_req">*</span></label>
                      <input type="text" name="city" id="city" value="<?php echo $this->_tpl_vars['user_detail'][0]['city']; ?>
" />
                  </div>
              </div>
          </div>
          <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">Country</label>
                      <select size="1" name="country" id="country"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['country_array'],'selected' => $this->_tpl_vars['user_detail'][0]['country']), $this);?>
</select>
                  </div>
                  <div class="span6 form-inline">
                      <label class="span4">Zip Code <span class="f_req">*</span></label>
                      <input type="text" name="zipcode" id="zipcode" value="<?php echo $this->_tpl_vars['user_detail'][0]['zipcode']; ?>
" />
                  </div>
              </div>
          </div>
          <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">Fax<span class="f_req">*</span></label>
                      <input type="text" name="fax_number" id="fax_number" value="<?php echo $this->_tpl_vars['user_detail'][0]['fax_number']; ?>
" style="width:220px;"/>
                  </div>
                  <div class="span6 form-inline">
                      <label class="span4">Delivery premium display</label>
                      <label class="uni-radio"><input type="radio" name="premiumdisplay" value="Show" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['premiumdisplay'] == 'Show'): ?>checked<?php endif; ?>/>Show&nbsp; </label>
                      <label class="uni-radio"><input type="radio" name="premiumdisplay" value="Hide" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['premiumdisplay'] == 'Hide'): ?>checked<?php endif; ?>/>Hide </label>
                  </div>
              </div>
          </div>
          <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">Delivery Non premium display</label>
                      <label class="uni-radio"><input type="radio" name="nopremiumdisplay" value="Show" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['nopremiumdisplay'] == 'Show'): ?>checked<?php endif; ?>/>Show&nbsp; </label>
                      <label class="uni-radio"><input type="radio" name="nopremiumdisplay" value="Hide" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['nopremiumdisplay'] == 'Hide'): ?>checked<?php endif; ?>/>Hide  </label>
                  </div>
                  <div class="span6 form-inline">
                      <label class="span4">Amount to be paid on site</label>
                      <label class="uni-radio"><input type="radio" name="paypercent" value="0" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['paypercent'] == '0'): ?>checked<?php endif; ?>/>0%&nbsp;  </label>
                      <label class="uni-radio"><input type="radio" name="paypercent" value="100" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['paypercent'] == '100'): ?>checked<?php endif; ?>/>100%   </label>
                  </div>
              </div>
          </div>
          <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">Favourite Writer</label>
                      <select multiple="multiple" name="favcontribs[]" id="favcontribs">
                          <?php $_from = $this->_tpl_vars['contribslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contribkey'] => $this->_tpl_vars['contribitem']):
?>
                          <?php if (in_array ( $this->_tpl_vars['contribkey'] , $this->_tpl_vars['favcontribslist'] )): ?>
                          <option value="<?php echo $this->_tpl_vars['contribkey']; ?>
" selected><?php echo $this->_tpl_vars['contribitem']; ?>
</option>
                          <?php else: ?>
                          <option value="<?php echo $this->_tpl_vars['contribkey']; ?>
"><?php echo $this->_tpl_vars['contribitem']; ?>
</option>
                          <?php endif; ?>
                          <?php endforeach; endif; unset($_from); ?>
                      </select>
                  </div>
				  <div class="span6 form-inline">
                      <label class="span4">Mission liberte publish</label>
                      <label class="uni-radio"><input type="radio" name="privatepublish" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['privatepublish'] == 'yes'): ?>checked<?php endif; ?>/>Yes&nbsp; </label>
                      <label class="uni-radio"><input type="radio" name="privatepublish" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['privatepublish'] == 'no'): ?>checked<?php endif; ?>/>No  </label>
                  </div>
              </div>
          </div>
		   <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">Subscription (alert)</label>
                      <label class="uni-radio"><input type="radio" name="alert_subscribe" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['alert_subscribe'] == 'yes'): ?>checked<?php endif; ?>/>Yes&nbsp; </label>
                      <label class="uni-radio"><input type="radio" name="alert_subscribe" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['alert_subscribe'] == 'no'): ?>checked<?php endif; ?>/>No  </label>
                  </div>

              </div>
          </div>
		  <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">This client requests that contributors have been previously tested</label>
                      <label class="uni-radio"><input type="radio" name="contributortestrequired" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['contributortestrequired'] == 'yes'): ?>checked<?php endif; ?>/>Yes&nbsp; </label>
                      <label class="uni-radio"><input type="radio" name="contributortestrequired" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['contributortestrequired'] == 'no'): ?>checked<?php endif; ?>/>No  </label>
                  </div>
				  <div class="span6 form-inline">
                      <label class="span4">URLs excluded for plagiarism <p style="color:red">(Comma seperated)</p></label>
                      <textarea name="urlsexcluded" id="urlsexcluded" placeholder="Example:edit-place.com, www.edit-place.com"><?php echo $this->_tpl_vars['user_detail'][0]['urlsexcluded']; ?>
</textarea>  
                  </div> 
              </div>
          </div>
		  <div class="formSep">
              <div class="row-fluid">
                  <div class="span6 form-inline">
                      <label class="span4">Product description</label>
                      <label class="uni-radio"><input type="radio" name="prod_desc" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['prod_desc'] == 'yes'): ?>checked<?php endif; ?>/>Oui&nbsp; </label>
                      <label class="uni-radio"><input type="radio" name="prod_desc" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['prod_desc'] == 'no'): ?>checked<?php endif; ?>/>Non  </label>
                  </div>
			   </div>
		  </div>	
          <div class="formSep">
              <div class="row-fluid ">
                  <div class="span6 form-inline">
                      <button type="submit" id="submit_client" name="submit_client" value="submit" class="btn btn-success pull-right">Submit</button>&nbsp;
                  </div>
              </div>
          </div>
      </form>
      </div>


 <!------------ Client view ---------------------->
      <div id="viewclient" class="tab-pane">
         <table class="table table-striped table-bordered table-condensed span9">
          <tr>
              <td colspan="2">
                  <div class="pull-left">
                      <h3 class="pull-left">
                          <?php if ($this->_tpl_vars['user_detail'][0]['first_name'] != ''): ?>
                          <?php echo $this->_tpl_vars['user_detail'][0]['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['user_detail'][0]['last_name']; ?>

                          <?php else: ?>
                          <?php echo $this->_tpl_vars['user_detail'][0]['company_name']; ?>

                          <?php endif; ?>
                      </h3>
                      <div style="height:50px;"></div>
                      <div class="pull-left">
                          <a type="button" value="" name="viewao" class="btn btn-success" href="/ongoing/list?submenuId=ML2-SL4&amp;client_id=111201155001418">view aos </a>
                          <button type="button" name="connectfoclient" class="btn btn-danger" onclick="connect_fo('client');"> Connect to fo </button>
                      </div>
                  </div>
                  <div class="span2 pull-right">
                      <img alt="client pic" src="<?php echo $this->_tpl_vars['user_pic']; ?>
" class="fileupload-new thumbnail1 pull-right">
                  </div>
              </td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Email</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['email']; ?>
</span></td>
          </tr>
          <?php if ($this->_tpl_vars['groupId'] == 1): ?>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Passowrd</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['password']; ?>
</span></td>
          </tr>
          <?php endif; ?>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Status</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['status']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Name of Company</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['company_name']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">RCS</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['rcs']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Passowrd</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['password']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">TVA Intracommunautaire</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['vat']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">phone</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['phone_number']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Address</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['address']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">City</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['city']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Country</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['country_name']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Zip Code</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['zipcode']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Fax</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['fax_number']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Favourite Writer</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['favcontributors']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Delivery premium display</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['premiumdisplay']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Delivery non premium display</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['nopremiumdisplay']; ?>
</span></td>
          </tr>
          <tr>
              <td class="span5"><span class="pull-right alpbold">Amount to be paid on site</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['paypercent']; ?>
%</span></td>
          </tr>
          <tr>
            <td class="span5"><span class="pull-right alpbold">Writer percentage</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['contrib_percentage']; ?>
</span></td>
          </tr>
	   <tr>
              <td class="span5"><span class="pull-right alpbold"> Mission liberte publish</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['privatepublish']; ?>
</span></td>
          </tr> 
		  <tr>
              <td class="span5"><span class="pull-right alpbold"> Subscription (alert)</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['alert_subscribe']; ?>
</span></td>
          </tr>
		  <tr>
              <td class="span5"><span class="pull-right alpbold">This client requests that contributors have been previously tested</span></td><td class="span9"><span class="pull-left "><?php if ($this->_tpl_vars['user_detail'][0]['contributortestrequired'] == 'yes'): ?>Yes<?php else: ?>No<?php endif; ?></span></td>
          </tr>
		  <tr>
              <td class="span5"><span class="pull-right alpbold">URLs excluded for plagiarism</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['urlsexcluded']; ?>
</span></td>
          </tr>
		  <tr>
              <td class="span5"><span class="pull-right alpbold">Product description</span></td><td class="span9"><span class="pull-left "><?php if ($this->_tpl_vars['user_detail'][0]['prod_desc'] == 'yes'): ?>Yes<?php else: ?>No<?php endif; ?></span></td>
          </tr>
          </table>
      </div>

      <!------------ ao list of client ---------------------->
      <div id="aolistclient" class="tab-pane">
          <h3 class="heading alert alert-info">
              <?php if ($this->_tpl_vars['user_detail'][0]['first_name'] != ''): ?>
              <?php echo $this->_tpl_vars['user_detail'][0]['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['user_detail'][0]['last_name']; ?>
&nbsp; (<?php echo $this->_tpl_vars['user_detail'][0]['company_name']; ?>
)
              <?php else: ?>
              <?php echo $this->_tpl_vars['user_detail'][0]['company_name']; ?>

              <?php endif; ?>
          </h3>
          <table class="table table-bordered table-striped table_vam" id="aolisttable">
              <thead>
              <tr>
                  <th>S.I</th>
                  <th>AO TITLE</th>
                  <th>NO OF ARTICLES</th>
                  <th>CREATED DATE</th>
                  <th>STATUS</th>
                  <th>PREM/NO-PREM</th>
                  <th>PUBLIC/PRIVATE</th>
                  <th>ACTIONS</th>
              </tr>
              </thead>
              <tbody>
              <?php $_from = $this->_tpl_vars['ao']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ao_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ao_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ao']):
        $this->_foreach['ao_loop']['iteration']++;
?>
              <tr>
                  <td><?php echo ($this->_foreach['ao_loop']['iteration']-1)+1; ?>
</td>
                  <td><a href="/ongoing/ao-details?submenuId=ML2-SL4&client_id=<?php echo $this->_tpl_vars['ao']['user_id']; ?>
&ao_id=<?php echo $this->_tpl_vars['ao']['id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['ao']['title']; ?>
"><?php echo $this->_tpl_vars['ao']['title']; ?>
</a></td>
                  <td><?php echo $this->_tpl_vars['ao']['total_article']; ?>
</td>
                  <td><?php echo $this->_tpl_vars['ao']['created_at']; ?>
</td>
                  <td><?php echo $this->_tpl_vars['ao']['status_bo']; ?>
</td>
                  <td><?php if ($this->_tpl_vars['ao']['premium_option'] == 'non-premium'): ?><label class="label label-info">Delivery non premium</label><?php else: ?><label class="label label-warning">Delivery premium</label><?php endif; ?></td>
                  <td><?php if ($this->_tpl_vars['ao']['AOtype'] == 'private'): ?><label class="label label-warning">Private</label><?php else: ?><label class="label label-success">public</label><?php endif; ?></td>
                  <td><a href="/ongoing/ao-details?submenuId=ML2-SL4&client_id=<?php echo $this->_tpl_vars['ao']['user_id']; ?>
&ao_id=<?php echo $this->_tpl_vars['ao']['id']; ?>
" target="_blank" ><i class="icon-pencil"></i></a><?php if ($this->_tpl_vars['ao']['inv'] == '1'): ?>&nbsp; / &nbsp;<a onclick="return downloadInvoices('<?php echo $this->_tpl_vars['ao']['id']; ?>
');" href="javascript:void(0);">Download Invoices</a><?php endif; ?>
                  </td>
              </tr>
              <?php endforeach; endif; unset($_from); ?>
              </tbody>
          </table>
      </div>
	  
	  <!-------------------------- Client Invoices---------------------------------->
		
		<div id="invoiceclient" class="tab-pane">
			<h3 class="heading alert alert-info">
			  <?php echo $this->_tpl_vars['user_detail'][0]['company_name']; ?>
&nbsp;Invoices
			</h3>
			<div>   
				<!----- Monthly basis ------------>
				<div style="width:500px;float:left">
					<h4>Download invoices on Monthly basis</h4><br>
					<?php $this->assign('i', 1); ?>
						<div style="padding-left:25px;text-transform:none;">
						<?php while ($this->_tpl_vars['i'] <= $this->_tpl_vars['month']) { ?>
							<?php if ($this->_tpl_vars['invarray'][$this->_tpl_vars['i']] > 0): ?> 
								<a href="/user/downloadliberteinvoice?client=<?php echo $_GET['userId']; ?>
&month=<?php echo $this->_tpl_vars['i']; ?>
&year=<?php echo $this->_tpl_vars['year']; ?>
" style="text-transform:none;text-decoration:underline"><?php echo $this->_tpl_vars['montharray'][$this->_tpl_vars['i']]; ?>
 - <?php echo $this->_tpl_vars['year']; ?>
</a>
							<?php else: ?>
								<?php echo $this->_tpl_vars['montharray'][$this->_tpl_vars['i']]; ?>
 - <?php echo $this->_tpl_vars['year']; ?>

							<?php endif; ?>
							<br>
							<?php $this->assign('i', $this->_tpl_vars['i']+1); ?> 
						<?php } ?>
						</div>	
				</div>
				
				<!----- Article basis ------------>
				<div style="width:500px;float:left">
					<h4>Download invoices article wise</h4>
					<div style="padding-left:25px;">
						<table cellpadding="2" cellspacing="2">
							<?php $_from = $this->_tpl_vars['paymentarticlelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['payart']):
?>
									<tr>
										<td><a href="/user/downloadinvoice?article=<?php echo $this->_tpl_vars['payart']['article']; ?>
&client=<?php echo $this->_tpl_vars['payart']['user_id']; ?>
" style="text-transform:none;text-decoration:underline"><?php echo $this->_tpl_vars['payart']['title']; ?>
</a></td>
										<td><?php echo ((is_array($_tmp=$this->_tpl_vars['payart']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
									</tr>
							<?php endforeach; endif; unset($_from); ?> 
						</table>
					</div>
				</div>
			</div>
		</div>

   </div>
</div>
</div>
<div style="visibility:hidden" >
    <form id="user_login_form" name="user_login_form" method="post" action="" target="_blank">
        <input type="text" id="login_name" name="login_name" value="<?php echo $this->_tpl_vars['user_detail'][0]['email']; ?>
">
        <input type="password" id="login_password" name="login_password" value="<?php echo $this->_tpl_vars['user_detail'][0]['password']; ?>
" >
        <input type="submit" value="Login" />
    </form>
</div>

<?php echo '
<script type="text/javascript" >
    function connect_fo(user)
    {
        document.forms["user_login_form"].action="http://mmm-ep.edit-place.co.uk/index/userfologin";
        document.forms["user_login_form"].submit();
    }
</script>
'; ?>