<?php /* Smarty version 2.6.19, created on 2014-12-08 13:20:12
         compiled from gebo/ao/createpoll_step1.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/ao/createpoll_step1.phtml', 199, false),array('modifier', 'stripslashes', 'gebo/ao/createpoll_step1.phtml', 199, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/custom/validations_poll.js"></script>
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/datempicker.js"></script>

<script type="text/javascript">
	var today = new Date(); 
	$(document).ready(function() { 
		$("#client_list").chosen({ allow_single_deselect: true });	
		$(\'#poll_date\').datetimepicker({
			showSecond: true,
			timeFormat: \'hh:mm:ss\',
			minDate: new Date(),
			stepHour: 1,
			stepMinute: 1,
			stepSecond: 10,
			timeOnlyTitle: \'Choose hour\',
			timeText: \'Hour\',
			hourText: \'Hours\',
			minuteText: \'Minutes\',
			secondText: \'Seconds\',
			currentText: \'Done\',
			closeText: \'Close\',
		});
		
		 $(\'#publish_time\').datetimepicker({
			showSecond: true,
			timeFormat: \'hh:mm:ss\',
			numberOfMonths: 1,
			minDate: 1,
			maxDate: new Date(today.getTime() + (24 * 60 * 60 * 1000)),   
			ampm: false,
			stepHour: 1,
			hourMin:10,
			hourMax:today.getHours(),
			hour:today.getHours(),
			minute:today.getMinutes(),
			second:today.getSeconds(),
			timeOnlyTitle: \'Choose hour\',
			timeText: \'Hour\',
			hourText: \'Hours\',
			minuteText: \'Minutes\',
			secondText: \'Seconds\',
			currentText: \'Done\',
			closeText: \'Close\',
		});
		
		$(\'#poll_anonymouscheck\').toggleButtons({
			label:{enabled: "Oui",disabled: "Non"}
		});
		$("#type").chosen({ disable_search: true });
		$("#language").chosen({	disable_search: true });
		$("#category").chosen({ disable_search: true });
		$("#signtype").chosen({ disable_search: true });
		$("#currency").chosen({ disable_search: true });
		$(".uni_style").uniform(); 
		$(\'#min_sign\').blur(function() {
		if($(\'#min_sign\').val() ==\'\')
				this.value = "Min.";
		});
		$(\'#max_sign\').blur(function() {
			if($(\'#max_sign\').val() ==\'\')
				this.value = "Max.";
		});
		$(\'#min_sign\').focus(function() {
			if($(\'#min_sign\').val() ==String("Min.")) 
			  this.value = "";
		});
		$(\'#max_sign\').focus(function() {
			if($(\'#max_sign\').val() ==String("Max."))
				  this.value = "";
		}); 
	});
	
	$(function(){
		var btnUpload=$(\'#uploadspec\');
		var status=$(\'#fname\');

		new AjaxUpload(btnUpload, {
			action: \'uploadpollspecdoc\',
			name: \'uploadfile\',

			onSubmit: function(file, ext){
			 if (! (ext && /^(doc|docx|rtf|zip|xls|xlsx|pdf)$/.test(ext))){
					status.html(\'Uniquement doc, docx, zip, xls, xlsx, pdf et rtf\').css(\'color\',\'#FF0000\');
					return false;
				}
				status.html(\'<img src="/FO/images/loading.gif" />\');
			},

			onComplete: function(file, response){ //alert(response);
				if(response!="error"){
					status.html(\'\').css(\'color\',\'#000000\');
					var fname=response.split("#"); 
					$(\'#poll_spec_name\').val(fname[1]);
					$(\'#fname\').html(fname[1]);
				} 
			}
		 });
	});
</script>

<style>
.error {  color:red;}
input {text-transform:none !important;}
.usererror {  color:red}
/* css for timepicker */
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
.ui-timepicker-div td { font-size: 90%; } 
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
</style>

'; ?>


<form action="/ao/createpoll1?submenuId=ML2-SL15" name="poll_step1" method="post" enctype="multipart/form-data" >
<div class="row-fluid">
  	<div class="span12">
		<h3 class="heading">Creating a Quote
			<span align="right">
				<img src="/BO/theme/gebo/img/path-1.png" width="120" height="35" border="0" usemap="#Map" style="float:right;" />
				<map name="Map" id="Map">
				<?php if ($this->_tpl_vars['nav_2'] == 1): ?>	
					<area shape="circle" coords="60,18,17" href="/ao/createpoll1?submenuId=ML2-SL15" />
				<?php endif; ?>
				<?php if ($this->_tpl_vars['nav_3'] == 1): ?>	
					<area shape="circle" coords="102,17,18" href="/ao/createpoll2?submenuId=ML2-SL15"/>
				<?php endif; ?>
				</map>
			</span> 
		</h3>	
		
		<table align="center" cellpadding="4" cellspacing="4" width="78%">
			<tr>
				<td valign="top" width="50%">Client</td>
				<td>
					<select name="client_list" id="client_list" class="chzn_a span12">
					<?php $_from = $this->_tpl_vars['client_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['clientkey'] => $this->_tpl_vars['client']):
?>
						<?php if ($this->_tpl_vars['clientkey'] == $this->_tpl_vars['def_user']): ?>
							<option value="<?php echo $this->_tpl_vars['clientkey']; ?>
" selected><?php echo $this->_tpl_vars['client']; ?>
</option>
						<?php else: ?>
							<option value="<?php echo $this->_tpl_vars['clientkey']; ?>
"><?php echo $this->_tpl_vars['client']; ?>
</option>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					</select>
					<br>
					<a href="javascript:void(0);" data-toggle="modal" data-target="#newuser">
						Add a new client
					</a>
					<br>
					<span id="client_div" class="error"></span>
				</td>
			</tr>
			<tr>
				<td valign="top">POLL Name</td>
				<td><input type="text" name="title" id="title" value="<?php echo $this->_tpl_vars['title']; ?>
" /></td>
			</tr>
			<tr>
				<td valign="top">Date of completion of POLL</td>
				<td><input type="text" id="poll_date" name="poll_date" readonly="readonly" value="<?php echo $this->_tpl_vars['poll_date']; ?>
"/>
					<span id="date_err" class="error"></span>
				</td>
			</tr>
			<tr>
				<td valign="top">Priority period provided participants</td>
				<td><input type="text" id="priority_hours" name="priority_hours" class="span2" value="<?php echo $this->_tpl_vars['priority_hours']; ?>
"/> heure(s)</td>
			</tr>
			<tr>
				<td valign="top">Tender Anonymous</td>
				<td>
					<div id="poll_anonymouscheck">
						<input type="checkbox" name="poll_anonymous" id="poll_anonymous" <?php if ($this->_tpl_vars['poll_anonymous'] == 'on'): ?>checked="checked"<?php endif; ?>/>
					</div>
				</td>
			</tr>
			<tr>
				<td valign="top">Brief</td>
				<td>
				  <div id="uploadspec">
						<span class="btn btn-file">
							<span class="fileupload-new">Select poll brief</span>
							<input type="file" name="file" id="file" />
						</span>	
						<span id="file_err" class="error"></span>
						<div id="fname"><?php echo $this->_tpl_vars['poll_file']; ?>
</div>
				   </div>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
		</table>
		
		<div class="w-box">
			<div class="w-box-header">Create your model item</div>
			<div class='w-box-content'>
				<table align="center" cellpadding="4" cellspacing="4" width="78%">
				   <tr>
						<td width="50%" valign="top">Type</td>
						<td><?php echo smarty_function_html_options(array('name' => 'type','id' => 'type','options' => ((is_array($_tmp=$this->_tpl_vars['type_array'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)),'selected' => $this->_tpl_vars['type'],'class' => 'span8'), $this);?>
</td>
					</tr>
					<tr>
						<td valign="top">Language</td>
						<td><?php echo smarty_function_html_options(array('name' => 'language','id' => 'language','options' => $this->_tpl_vars['language_array'],'selected' => $this->_tpl_vars['language'],'class' => 'span8'), $this);?>
 </td>
					</tr>
					<tr>
						<td valign="top">Category</td>
						<td><?php echo smarty_function_html_options(array('name' => 'category','id' => 'category','options' => $this->_tpl_vars['category_array'],'selected' => $this->_tpl_vars['category'],'class' => 'span8'), $this);?>
 </td>
					</tr>
					<tr>
						<td valign="top">Nomber of signs</td>
						<td><?php echo smarty_function_html_options(array('name' => 'signtype','id' => 'signtype','selected' => $this->_tpl_vars['signtype'],'options' => $this->_tpl_vars['signtype_array'],'class' => 'span8'), $this);?>

							<span><input type="text" id="min_sign" name="min_sign" value="<?php echo $this->_tpl_vars['min_sign']; ?>
" class="span2" style="margin-top:-12px"/></span>
							<span><input type="text" id="max_sign" name="max_sign" value="<?php echo $this->_tpl_vars['max_sign']; ?>
" class="span2" style="margin-top:-12px"/></span>
						</td>
					</tr>
					<tr>
						<td valign="top">Share on contributor</td>
						<td><input type="text" id="contrib_percentage" name="contrib_percentage"  value="<?php echo $this->_tpl_vars['contrib_percentage']; ?>
" class="span2" />&nbsp;%</td>
					</tr>
					<tr>
						<td valign="top">Nb quote Max to receive</td>
						<td><input type="text" id="poll_max" name="poll_max" value="<?php echo $this->_tpl_vars['poll_max']; ?>
" class="span2"/></td>
					</tr>
					<tr>
						<td valign="top">Date/Hour of publication</td>
						<td>
							<label class="uni-checkbox">
								<span style="float:left;padding-right:10px;">
									<input type="text" id="publish_time" name="publish_time" readonly="readonly" value="<?php echo $this->_tpl_vars['publish_time']; ?>
" <?php if ($this->_tpl_vars['publishnow'] == 'checked'): ?>disabled="disabled"<?php endif; ?> />
								</span>
								<input type="checkbox" name="publishnow" id="publishnow" class="uni_style" onclick="disablepublishtime()" value="checked" <?php if ($this->_tpl_vars['publishnow'] == 'checked'): ?>checked<?php endif; ?>/>&nbsp;now
								<span id="publishtime_err" class="error"></span>
							</label>
						</td>
					</tr>
					<tr>
						<td>Currency</td>
						<td>
							<select name="currency" id="currency" class="span3">
								<option value="pound" <?php if ($this->_tpl_vars['currency'] == 'pound'): ?>selected<?php endif; ?>>Pound</option>
								<option value="euro" <?php if ($this->_tpl_vars['currency'] == 'euro'): ?>selected<?php endif; ?>>Euro</option>
							</select>
						</td>
					</tr>
				</table>
				<input type="hidden" id="poll_spec_name" name="poll_spec_name" value="<?php echo $this->_tpl_vars['poll_file']; ?>
" />
				<input type="hidden" id="modify" name="modify" value="<?php echo $this->_tpl_vars['get_modify']; ?>
" />
			</div>
		</div>
		<div style="float:right;padding:30px">
			 <input type="submit" value="GO TO STEP 2" class="btn btn-info" onClick="return validate_poll_step1();"/>
		</div>
	</div>
</div>	
</form>

<!--   Add new user   -->
<div class="modal hide fade" id="newuser">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>ADDING A NEW CLIENT</h3>
    </div>
    <div class="modal-body">
		<form action="/ao/adduser?type=poll" id="newuserform" id="newuserform" method="post" >
			<table cellpadding="2" cellspacing="2" align="center">
				<tr>
					<td valign="top">Email</td>
					<td><span><input type="text" id="newemail" name="newemail"/></span></td>
				</tr>
				<tr>
					<td valign="top">Password</td>
					<td><span><input type="password" id="newpwd" name="newpwd"/></span></td>
				</tr>
				<tr>
					<td valign="top">Confirm password</td>
					<td><span><input type="password" id="newcpwd" name="newcpwd" value=""/></span></td>
				</tr>
				<tr>
					<td valign="top">Customer Name</td>
					<td><span><input type="text" id="company_name" name="company_name" value=""/></span></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<button type="submit" id="submit_pop_edit" name="submit_pop_edit" value="ADD" class="btn btn-success" onClick="validate_newuser();">Add client</button>&nbsp;&nbsp;
					</td>
				</tr>
			</table>	
		</form>
    </div>
    <div class="modal-footer">
    </div>
</div>
