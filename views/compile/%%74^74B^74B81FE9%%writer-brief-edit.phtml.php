<?php /* Smarty version 2.6.19, created on 2015-02-17 09:42:10
         compiled from gebo/user/writer-brief-edit.phtml */ ?>
<?php echo '
<script type="text/javascript">
    $(document).ready(function() {
        $(".uni_style").uniform();
        gebo_validation.reg();
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
                    $(\'.error\').hide();
                },
                rules: {
                    email: { required: true, minlength: 5 },
                    first_name: { required: true, minlength: 2 },
                    last_name: { required: true, minlength: 2},
                    password: { required: true, minlength: 6 }
                },
                invalidHandler: function(form, validator) {
                    $.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
                }
            });
        }
    };
</script>
'; ?>

<h3 class="heading">Credentials<a class="label label-inverse pull-right" href="/user/contributor-list?submenuId=ML2-SL2" id="returnback">retour</a></h3>

<div class="row-fluid">
  <div class="span12" style="">
  <div id="briefeditcontrib" class="tab-pane">
     <h3 class="heading alert alert-info">
         <?php if ($this->_tpl_vars['user_detail'][0]['first_name'] != ''): ?>
         <?php echo $this->_tpl_vars['user_detail'][0]['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['user_detail'][0]['last_name']; ?>

         <?php else: ?>
         <?php echo $this->_tpl_vars['user_detail'][0]['email']; ?>

         <?php endif; ?>
     </h3>
     <form name="" class="form_validation_reg"  autocomplete="off"  action="/user/brief-contributor-edit?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&mode=edit&userId=<?php echo $_GET['userId']; ?>
" method="post">
         <div class="formSep">
             <div class="row-fluid">
                 <div class="span6 form-inline">
                     <label class="span4">Email <span class="f_req">*</span></label>
                     <input type="text" name="email" id="email" value="<?php echo $this->_tpl_vars['user_detail'][0]['email']; ?>
" <?php if ($this->_tpl_vars['groupId'] != 1): ?> readonly <?php endif; ?>/>
                 </div>
                 <div class="span6 form-inline">
                     <label class="span4">Password <span class="f_req">*</span></label>
                     <input type="password" name="password" id="password" value="<?php echo $this->_tpl_vars['user_detail'][0]['password']; ?>
" />
                 </div>
             </div>
         </div>
         <div class="formSep">
             <div class="row-fluid">
                 <div class="span6 form-inline">
                     <label class="span4">Pr&eacute;nom <span class="f_req">*</span></label>
                     <input type="text" name="first_name" id="first_name" value="<?php echo $this->_tpl_vars['user_detail'][0]['first_name']; ?>
" />
                 </div>
                 <div class="span6 form-inline">
                     <label class="span4">Nom <span class="f_req">*</span></label>
                     <input type="text" name="last_name" id="last_name" value="<?php echo $this->_tpl_vars['user_detail'][0]['last_name']; ?>
" />
                 </div>
             </div>
         </div>
         <div class="formSep">
             <div class="row-fluid">
                 <div class="span6 form-inline">
                     <input type="submit" name="submit_contrib" value="Submit" class="btn btn-info pull-right"> </input>
                     <input type="hidden" name="userId" id="userId" value="<?php echo $_GET['userId']; ?>
" />
                 </div>
             </div>
         </div>
     </form>
  </div>
 </div>
</div>




