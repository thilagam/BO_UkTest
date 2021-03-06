<?php /* Smarty version 2.6.19, created on 2016-04-11 15:37:54
         compiled from gebo/searchtest/profile_edit.phtml */ ?>
<?php echo '
	<script type="text/javascript">
	$(document).ready(function(){
		
	//$(\'#udob\').datepicker();
	
   $(\'#udob\').datepicker()
   .on(\'changeDate\', function(ev){
	
   });
	
		
		jQuery.validator.addMethod("checkfname",function(value,element){
			return this.optional(element) || /^[a-zA-z]+$/i.test(value);
		},\'First name shoud contain only alphabets\');
		
		jQuery.validator.addMethod("checkph",function(value,element){
			return this.optional(element) || /^\\(?[1-9]\\d{2}[\\)\\-]\\s?\\d{3}\\-\\d{4}$/i.test(value);
		},\'Enter valid mobile number\');
		
		$("#profile_editform").validate({
			rules:{
				fname:{
					required:true,
					maxlength:32,
					checkfname:true
				},
				lname:{
					required:true,
					maxlength:32,
				},
				address:{
					required:true,
					maxlength:32
				},
				ph:{
					required:true,
					checkph:true
				},
				udob:{
					required:true
				}
				
			},
			messages:{
				fname:{
					required:"Required",
					maxlength:"First name should not have more than 32 characters"
				},
				lname:{
					required:"Required",
					maxlength:"First name should not have more than 32 characters"
				},
				address:{
					required:"Required",
					maxlength:"Address should not have more than 32 characters"
				},
				ph:{
					required:"Required"
				},
				udob:{
					required:"Required"
				}
			},
			submitHandler:function(form){
				smoke.confirm("Do you want to save",function(e){
				if(e){
					$.ajax({
                        url: "/searchtest/profileedit",
			      data:{
				        user_id:$("#uid").val(),
						user_email:$("#uemail").val(),
						user_password:$("#upassword").val(),
						fname:$("#fname").val(),
						user_lname:$("#lname").val(),
						user_address:$("#address").val(),
						user_city:$("#city").val(),
						user_state:$("#state").val(),
						user_zipcode:$("#zipcode").val(),
						user_ph:$("#ph").val(),
						dateofbirth:$("#udob").val(),
						twiter:$("#utid").val(),
						facebook:$("#utfb").val(),
						website:$("#uwebsite").val(),
					   },
			    type: \'POST\',
                success:function(data){
				//console.log(data);
                //$("#userprofile .modal-body").html(data);
				smoke.alert("Data Edited Sucessfully", function(e){
					//window.location="/searchtest/check";
                   }, {
	                     ok: "Yep",
	                     cancel: "Nope",
	                     classname: "custom-class"
                 });//end smoke
              }
          });
			  }
		  });
			return false;}
	});
		
});
	</script>
'; ?>

<div class="row-fluid">
	 <form id="profile_editform">
            <div><input type="hidden" id="uid" name="uid" value="<?php echo $this->_tpl_vars['profile_details']['identifier']; ?>
" /></div>
            <div><label>Email Address</label></div><div><input type="text" id="uemail" name="uemail" value="<?php echo $this->_tpl_vars['profile_details']['email']; ?>
" readonly="readonly" /></div>
            <div><label>Password</label></div><div><input type="password" id="upassword" name="upassword" value="<?php echo $this->_tpl_vars['profile_details']['password']; ?>
" readonly="readonly"/></div>
            <div><label>First Name</label></div><div><input type="text" id="fname" name="fname" value="<?php echo $this->_tpl_vars['profile_details']['first_name']; ?>
"/></div>
            <div><label>Last Name</label></div><div><input type="text" id="lname" name="lname" value="<?php echo $this->_tpl_vars['profile_details']['last_name']; ?>
"/></div>
            <div><label>Address</label></div><div><input type="text" id="address" name="address" value="<?php echo $this->_tpl_vars['profile_details']['address']; ?>
"/></div>
            <div><label>City</label></div><div><input type="text" id="city" name="city" value="<?php echo $this->_tpl_vars['profile_details']['city']; ?>
"/></div>
            <div><label>State</label></div><div><input type="text" id="state" name="state" value="<?php echo $this->_tpl_vars['profile_details']['state']; ?>
"/></div>
            <div><label>Zipcode</label></div><div><input type="text" id="zipcode" name="zipcode" value="<?php echo $this->_tpl_vars['profile_details']['zipcode']; ?>
"/></div>
            <div><label>Phone Number</label></div><div><input type="text" id="ph" name="ph" value="<?php echo $this->_tpl_vars['profile_details']['phone_number']; ?>
"/></div>
            <div><label>DOB</label></div><div><input type="text" class="datepicker" id="udob" name="udob" value="<?php echo $this->_tpl_vars['dob_edit']; ?>
" /></div>
           <!-- <div><label>DOB</label></div><div><input type="text" class="datepicker" id="udob" name="udob" value="" /></div>-->
          
            <div><label>Twitter Id</label></div><div><input type="text" id="utid" name="utid" value="<?php echo $this->_tpl_vars['profile_details']['twitter_id']; ?>
" /></div>
            <div><label>Facebook Id</label></div><div><input type="text" id="utfb" name="utfb" value="<?php echo $this->_tpl_vars['profile_details']['facebook_id']; ?>
" /></div>
            <div><label>Website</label></div><div><input type="text" id="uwebsite" name="uwebsite" value="<?php echo $this->_tpl_vars['profile_details']['website']; ?>
" /></div>
            <div><input type="submit" class="btn btn-info" value="Submit" id="edit_submit"/></div>
	</form>
</div>			