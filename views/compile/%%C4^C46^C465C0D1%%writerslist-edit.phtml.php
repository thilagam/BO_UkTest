<?php /* Smarty version 2.6.19, created on 2016-04-18 10:00:25
         compiled from gebo/userlist/writerslist-edit.phtml */ ?>
<?php echo '
	<script type="text/javascript">
	$(document).ready(function(){
		$(\'#dob\').datepicker();
		jQuery.validator.addMethod("checkfname",function(value,element){
			return this.optional(element) || /^[a-zA-z]+$/i.test(value);
		},\'First name shoud contain only the alphabets\');
		jQuery.validator.addMethod("checkphone",function(value,element){
			return this.optional(element) || /^[789][0-9]{9}$/i.test(value);
		},\'Enter a valid mobile number\');
		$("#edit").validate({
			rules:{
				fname:{
					required:true,
					maxlength:32,
					checkfname:true
				},
				address:{
					required:true,
					minlength:5,
					maxlength:32
				},
				phone:{
					required:true,
					checkphone:true
				},
				dob:{
					required:true
				}
				
			},
			messages:{
				fname:{
					required:"First name is required",
					maxlength:"First name should not be more than 32 characters"
				},
				address:{
					required:"Address is required",
					minlength:"Address should be atleast 5 characters",
					maxlength:"Address should not be more than 32 characters"
				},
				phone:{
					required:"Phone number is required"
				},
				dob:{
					required:"Date of birth is required"
				}
			},
			submitHandler:function(form){
				smoke.confirm("Do you want to save the details",function(e){
				if(e){
					$.ajax({
						url:"/userlist/save-writer",
						data:{
							id:$("#identifier").val(),
							fname:$("#fname").val(),
							lname:$("#lname").val(),
							address:$("#address").val(),
							city:$("#city").val(),
							state:$("#state").val(),
							zipcode:$("#zipcode").val(),
							phone:$("#phone").val(),
							dob:$("#dob").val(),
							usertype:$("#usertype").val(),
							seniority:$("#seniority").val(),
							lang:$("#lang").val(),
							status:$("#status").val()
						},
						success:function(data){
							//console.log(data);
							smoke.alert("Saved");
							window.location="/userlist/get-writers";
						}
					});
				}
			});
			return false;

			}
		});

		
	});
	</script>
'; ?>

<div class="row-fluid">
	<form id="edit">
		<div class="formSep">
			<label>ID</label>
			<input type="text" class="form-control" name="identifier" id="identifier" value="<?php echo $this->_tpl_vars['writerEdit']['id']; ?>
" readonly >
		</div>
		<div class="formSep">
			<label>Email Id</label>
			<input type="text" class="form-control" name="email" id="email" value="<?php echo $this->_tpl_vars['writerEdit']['email']; ?>
" readonly />
		</div>
		<div class="formSep">
			<label>First Name</label>
			<input type="text" class="form-control" name="fname" id="fname" value="<?php echo $this->_tpl_vars['writerEdit']['fname']; ?>
" />
		</div>
		<div class="formSep">
			<label>Last Name</label>
			<input type="text" class="form-control" name="lname" id="lname" value="<?php echo $this->_tpl_vars['writerEdit']['lname']; ?>
" />
		</div>
		<div class="formSep">
			<label>Address</label>
			<input type="text" class="form-control" name="address" id="address" value="<?php echo $this->_tpl_vars['writerEdit']['address']; ?>
" />
		</div>
		<div class="formSep">
			<label>City</label>
			<input type="text" class="form-control" name="city" id="city" value="<?php echo $this->_tpl_vars['writerEdit']['city']; ?>
" />
		</div>
		<div class="formSep">
			<label>State</label>
			<input type="text" class="form-control" name="state" id="state" value="<?php echo $this->_tpl_vars['writerEdit']['state']; ?>
" />
		</div>
		<div class="formSep">
			<label>Zipcode</label>
			<input type="text" class="form-control" name="zipcode" id="zipcode" value="<?php echo $this->_tpl_vars['writerEdit']['zipcode']; ?>
" />
		</div>
		<div class="formSep">
			<label>Phone</label>
			<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $this->_tpl_vars['writerEdit']['phone']; ?>
" />
		</div>
		<div class="formSep">
			<label>DOB</label>
			<input type="text" class="form-control" name="dob" id="dob" <?php if ($this->_tpl_vars['writerEdit']['dob'] != "00/00/0000"): ?>value="<?php echo $this->_tpl_vars['writerEdit']['dob']; ?>
" <?php endif; ?>/>
		</div>
		<div class="formSep">
			<label>User Type</label>
			<select name="usertype" id="usertype" >
				<?php $_from = $this->_tpl_vars['userType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
					<option value="<?php echo $this->_tpl_vars['name']; ?>
" <?php if ($this->_tpl_vars['writerEdit']['type'] == $this->_tpl_vars['name']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['value']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select>
		</div>
		<div class="formSep">
			<label>Seniority</label>
			<select name="seniority" id="seniority" >
				<?php $_from = $this->_tpl_vars['seniority']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
					<option value="<?php echo $this->_tpl_vars['name']; ?>
" <?php if ($this->_tpl_vars['writerEdit']['level'] == $this->_tpl_vars['name']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['value']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select>
		</div>
		<div class="formSep">
			<label>Language</label>
			<select name="lang" id="lang" >
				<?php $_from = $this->_tpl_vars['langList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
					<option value="<?php echo $this->_tpl_vars['name']; ?>
" <?php if ($this->_tpl_vars['writerEdit']['language'] == $this->_tpl_vars['name']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['value']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select>
		</div>
		<div class="formSep">
			<label>Status</label>
			<select name="status" id="status" >
				<?php $_from = $this->_tpl_vars['status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
					<option value="<?php echo $this->_tpl_vars['name']; ?>
" <?php if ($this->_tpl_vars['writerEdit']['status'] == $this->_tpl_vars['name']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['value']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
			</select> 
		</div>
		<div class="formSep">
            <!-- <button onclick="javascript:void(0);" class="btn btn-info" type="button" id="edit_writter_submit" name="edit_writter_submit">Submit</button> -->
            <input type="submit" class="btn btn-info" value="Submit" id="edit_writter_submit"/>
        </div>
	</form>
</div>