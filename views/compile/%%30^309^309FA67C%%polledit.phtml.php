<?php /* Smarty version 2.6.19, created on 2016-04-20 10:16:11
         compiled from gebo/ao/polledit.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/ao/polledit.phtml', 92, false),array('modifier', 'utf8_encode', 'gebo/ao/polledit.phtml', 98, false),array('modifier', 'stripslashes', 'gebo/ao/polledit.phtml', 98, false),array('modifier', 'date_format', 'gebo/ao/polledit.phtml', 104, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="ISO-8859-1" src="/BO/theme/gebo/js/custom/validations_poll.js"></script>
<script type="text/javascript">

	$(function(){
	var today = new Date(); 
       $(\'#poll_date\').datetimepicker({
			showSecond: true,
			timeFormat: \'hh:mm:ss\',
			//minDate: new Date(),
			stepHour: 1,
			stepMinute: 1,
			stepSecond: 10,
			timeOnlyTitle: \'Choisir une heure\',
			timeText: \'Heure\',
			hourText: \'Heures\',
			minuteText: \'Minutes\',
			secondText: \'Secondes\',
			currentText: \'Maintenant\',
			closeText: \'Termin&eacute;\',

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
			timeOnlyTitle: \'Choisir une heure\',
			timeText: \'Heure\',
			hourText: \'Heures\',
			minuteText: \'Minutes\',
			secondText: \'Secondes\',
			currentText: \'Maintenant\',
			closeText: \'Termin&eacute;\',

		});
	});
	
	$(document).ready(function(){
		$("#client_list").chosen({ allow_single_deselect: true });	
		$("#categoryedit").chosen({ allow_single_deselect: true });	
		$(\'#send_mailcheck\').toggleButtons({
			label:{enabled: "Oui",disabled: "Non"}
		});
	});	  
	
	//Spec re upload
	$(function(){
			var btnUpload=$(\'#uploadspec\');
			var status=$(\'#fname\');

			new AjaxUpload(btnUpload, {
				action: \'uploadpollspecdoc\',
				name: \'uploadfile\',

				onSubmit: function(file, ext){
				 if (! (ext && /^(doc|docx|rtf|zip)$/.test(ext))){
						status.html(\'Uniquement doc, docx, zip et rtf\').css(\'color\',\'#FF0000\');
						return false;
					}
					status.html(\'<img src="/FO/images/loading.gif" />\');
				},

				onComplete: function(file, response){ 
					if(response!="error"){
					status.html(\'\').css(\'color\',\'#000000\');
						var fname=response.split("#"); 
						$(\'#poll_spec_file\').val(fname[1]);
						$(\'#fname\').html(fname[1]);
					}
				}
			 });
	});
	
</script>

'; ?>
	

<form name="pollform" method="post">
	<table cellpadding="4" cellspacing="2" width="85%" align="center">
		<tr>
			<td valign="top">Client</td>
			<td><?php echo smarty_function_html_options(array('name' => 'client_list','id' => 'client_list','options' => $this->_tpl_vars['client_list'],'selected' => $this->_tpl_vars['poll_detail'][0]['client']), $this);?>

			</td>
		</tr>
		<tr>
			<td>Name this tender</td>
			<td>
				<input type="text" name="title" id="title1" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['poll_detail'][0]['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
"/>
				<span id="title_err"></span>
			</td>
		</tr>
		<tr>
			<td>End date survey</td>
			<td><input type="text" id="poll_date" name="poll_date" readonly="readonly" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['poll_detail'][0]['poll_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y %H:%M:%S') : smarty_modifier_date_format($_tmp, '%d/%m/%Y %H:%M:%S')); ?>
"/></td>
		</tr>
		<tr>
			<td>Category </td>
			<td><?php echo smarty_function_html_options(array('name' => 'categoryedit','id' => 'categoryedit','options' => $this->_tpl_vars['EP_ARTICLE_CATEGORY'],'selected' => $this->_tpl_vars['poll_detail'][0]['category']), $this);?>
 </td>
		</tr>
		<tr>
			<td valign="top">Brief survey</td>
			<td valign="top">
				<div id="uploadspec">
					<span class="btn btn-file">
							<span class="fileupload-new">Change poll brief</span>
							<input type="file" name="file" id="file" />
					</span>	
					<br><div id="fname"><?php echo ((is_array($_tmp=$this->_tpl_vars['poll_detail'][0]['file_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</div>
			   </div>
			</td>
		</tr>
		<?php if ($this->_tpl_vars['poll_detail'][0]['created_by'] != 'client'): ?>
		<tr>
			<td>Total Answer max</td>
			<td> 
				<input type="text" id="poll_max" name="poll_max" value="<?php echo $this->_tpl_vars['poll_detail'][0]['poll_max']; ?>
" class="span1"/>
			</td>
		</tr>
		<tr>
			<td>Date publication</td>
			<td> <input type="text" id="publish_time" name="publish_time" readonly="readonly" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['poll_detail'][0]['publish_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y %H:%M:%S') : smarty_modifier_date_format($_tmp, '%d/%m/%Y %H:%M:%S')); ?>
"/>
				<span id="publishtime_err"></span>
			</td>
		</tr>
		<tr>
			<td>Notify me by email</td>
			<td>
				<div id="send_mailcheck">
					<input type="checkbox" name="send_mail" id="send_mail" value="yes" <?php if ($this->_tpl_vars['send_mail'] == 'on'): ?>checked="checked"<?php endif; ?>/>
				</div>
			</td>
		</tr>
		<?php endif; ?>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="submit_poll" value="Update" class="btn btn-info" onClick="return editsubmit();"></input>
				<input type="button" name="cancel" value="Cancel" data-dismiss="modal" class="btn btn-info"></input>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
	</table>
<input type="hidden" name="poll" id="poll" value="<?php echo $this->_tpl_vars['poll_detail'][0]['id']; ?>
" />
<input type="hidden" id="poll_spec_file" name="poll_spec_file" value="" />
</form>