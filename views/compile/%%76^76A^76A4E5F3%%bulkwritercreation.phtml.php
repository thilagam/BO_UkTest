<?php /* Smarty version 2.6.19, created on 2015-07-14 14:29:49
         compiled from gebo/user/bulkwritercreation.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/user/bulkwritercreation.phtml', 164, false),)), $this); ?>
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<?php echo '
<script type="text/javascript">

$(document).ready(function() {

    $("#newusertab").addClass(\'active\');

    //////////////////////////////////////////////////////////////
    $("#sel_type").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#sel_status").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#type").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#status").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#user_permissions").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#manager_incharge").chosen({ allow_single_deselect: false,search_contains: true  });
    $(".uni_style").uniform();
   // gebo_validation.reg();
    $("#user").validationEngine({prettySelect : true,useSuffix: "_chzn"});


    //Automatic suggestion of super client agency name
    $( "#email" ).on(\'input\',function(e){
        var email=$(this).val();
        var agency=email.split("@");
        $("#company_name").val(agency[0]);
    });


});
function checkEmailExist(emailslist)
{
    var target_page = "/user/email-list-exists?email="+emailslist;
    $.post(target_page, function(data){ 
        var data2 = data.trim();
        if(data2 != "no")
        {
            smoke.alert(data2+" already exists");
            return "no";
        }
        else
            return "yes";
        
    });
}

function validatebulkuser()
{
    $(\'.bulk_user_form\').validate({
            onkeyup: false,
            errorClass: \'error\',
            validClass: \'valid\',
			message:false,
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
                email_list: { required: true},
                writerpassword: { required: true }, 
                mailsubject: { 
							required: function(element){
								return $("input[name=\'intimatecheck\']:checked").val()=="yes";
							}
				},
                mailobject: { 
							required: function(element){
								return $("input[name=\'intimatecheck\']:checked").val()=="yes";
							} 
				}
            },
            invalidHandler: function(form, validator) {   
                $.sticky("There are some errors. Please correct them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
            },
			submitHandler: function(form) { 
					var errcount=0;
					var emails = $("#email_list").val();
					
					var target_page = "/user/email-list-exists?email="+emails;
							$.post(target_page, function(data){ 
								var data2 = data.trim();
								if(data2 != "no")
								{
									smoke.alert(data2+" already exists");
									return false;
								}
								else
								{
									form.submit();
									
								}
								
							});
			}	
					
		});
}

function intimatewriters()
{
	if($("input[name=\'intimatecheck\']:checked").val()=="yes")
	{
		$("#mailblock").show();
		if (CKEDITOR.instances[\'mailobject\'])
                CKEDITOR.instances[\'mailobject\'].destroy();
            
              
		 var editor = CKEDITOR.replace( \'mailobject\',
			 {
				 language: \'de\',
				 uiColor: \'#D9DDDC\',
				 enterMode : CKEDITOR.ENTER_BR,
				 removePlugins : \'resize\',
				 toolbar :
				 [
					 [\'Undo\',\'Redo\'],
					 [\'Find\',\'Replace\',\'-\',\'SelectAll\',\'RemoveFormat\'],
					 [\'Link\', \'Unlink\', \'Image\'],
					 \'/\',
					 [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
					 [\'NumberedList\',\'BulletedList\',\'-\',\'Blockquote\'],
					 [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\']
				 ]
			 }
		 );
	}
	else
		$("#mailblock").hide();
}	

</script>

<style>
	.error {  display: none !important;}
</style>	
'; ?>

<div class="row-fluid">
  <div class="span12" >
      <div class="tabbable">
          <div class="tab-content" style="overflow:hidden;">
              <div class="tab-pane " id="newusertab">
                  <div class="alert alert-warning"><b>BULK WRITERS CREATION</b></div>
                  <form class="bulk_user_form" autocomplete="off"  action="/user/bulkwritercreation?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
"  style="padding-left: 50px;" method="post" id="user" name="user" >
                     <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span4">Emails (comma seperated)</label>
                                  <textarea name="email_list" rows="3" id="email_list" class="span8" ></textarea>
                              </div>
						  </div>
                      </div>
					  <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span4">Language</label>
                                  <?php echo smarty_function_html_options(array('name' => 'writerlanguage','id' => 'writerlanguage','options' => $this->_tpl_vars['language']), $this);?>
 
                              </div>
						  </div>
                      </div>
					  <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span4">Password</label>
                                   <div><input type="password" name="writerpassword" id="writerpassword" /> </div>
                              </div>
						  </div>
                      </div>
					  <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span4">Intimate writers</label>
                                   <input type="checkbox" name="intimatecheck" id="intimatecheck" value="yes" onClick="intimatewriters();"/>
                              </div>
						  </div>
                      </div>
					  <div id="mailblock" style="display:none;">
						  <div class="formSep">
							  <div class="row-fluid">
								  <div class="span6 form-inline">
									  <label class="span4">Subject</label>
									    <div><input type="text" name="mailsubject" id="mailsubject" class="span8"/> </div>
								  </div>
							  </div>
						  </div>
						  <div class="formSep">
							  <div class="row-fluid">
								  <div class="span6 form-inline">
									  <label class="span4">Object</label>
									   <div style="float:left"><textarea name="mailobject" id="mailobject" rows="8" cols="50"></textarea></div>
								  </div>
								  <div style="vertical-align:top">(You can use variables $email and $password in your mail)</div>
							  </div>
						  </div>
					  </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span4 form-inline">
                                  <button type="submit" name="addwriters" id="addwriters" value="addwriters" class="btn btn-success pull-right" onClick="return validatebulkuser();">Create Writers</button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>


