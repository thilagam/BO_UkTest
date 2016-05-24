<?php /* Smarty version 2.6.19, created on 2016-03-28 14:31:41
         compiled from gebo/userlist/userlist-details.phtml */ ?>
<?php echo '
<script type="text/javascript">
	$(document).ready(function(){
		$("#edit_user_submit").bind("click",function(){
			smoke.confirm("Do you want to save?",function(e){
				if(e){
					$.ajax({
						url:"/userlist/save-details",
						data:{
							id:$("#identifier").val(),
							//status:$("#status :selected").text()
							status:$("#status").val()
						},
						type:"POST",
						success:function(data){
							console.log(data);
							alert(\'Saved\');
							//window.location="/userlist/get-list";
						}

					})
				}
				else
				{
					alert("No");
				}
			});
		});
	});

</script>
'; ?>

<div class="row-fluid">
	<form>
		<div class="formSep">
			<label>Id</label>
			<input type="text" class="form-control" name="identifier" id="identifier" value="<?php echo $this->_tpl_vars['userDetails']['identifier']; ?>
" readonly >
		</div>
		<div class="formSep">
			<label>Email Id</label>
			<input type="text" class="form-control" name="email"  value="<?php echo $this->_tpl_vars['userDetails']['email']; ?>
" readonly >
		</div>
		<div class="formSep">
			<label>First Name</label>
			<input type="text" class="form-control" name="first_name"  value="<?php echo $this->_tpl_vars['userDetails']['first_name']; ?>
" readonly >
		</div>
		<div class="formSep">
			<label>Last Name</label>
			<input type="text" class="form-control" name="last_name"  value="<?php echo $this->_tpl_vars['userDetails']['last_name']; ?>
" readonly >
		</div>
		<div class="formSep">
			<label>Email Id</label>
			<input type="text" class="form-control" name="email"  value="<?php echo $this->_tpl_vars['userDetails']['email']; ?>
" readonly >
		</div>
		<div class="formSep">
			<label>Status</label>
			<select name="status" id="status">
				<option value="Active" <?php if ($this->_tpl_vars['userDetails']['status'] == 'Active'): ?>selected<?php endif; ?>>Active</option>
				<option value="Inactive" <?php if ($this->_tpl_vars['userDetails']['status'] == 'Inactive'): ?>selected<?php endif; ?>>Inactive</option>
			</select>
		</div>
		<div class="formSep">
            <button onclick="javascript:void(0);" class="btn btn-info" type="button" id="edit_user_submit" name="edit_user_submit">Submit</button>
        </div>
	</form>
</div>