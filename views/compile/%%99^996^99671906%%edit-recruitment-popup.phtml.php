<?php /* Smarty version 2.6.19, created on 2015-09-10 14:47:57
         compiled from gebo/recruitment/edit-recruitment-popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/recruitment/edit-recruitment-popup.phtml', 121, false),array('modifier', 'utf8_encode', 'gebo/recruitment/edit-recruitment-popup.phtml', 121, false),array('modifier', 'stripslashes', 'gebo/recruitment/edit-recruitment-popup.phtml', 121, false),array('modifier', 'date_format', 'gebo/recruitment/edit-recruitment-popup.phtml', 134, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css">
.form-horizontal .control-label {
    float: left;
    padding-top: 5px;
    text-align: right;
    width: 42%;
	font-weight:bold;
	cursor:default;
}
.form-horizontal .controls {
    margin-left: 47%;
}
.popover-title{
	padding: 8px 14px;
}
.popover-content
{
    padding: 9px 14px;
}
.add-on{
    background-color: #EEEEEE;
    border: 1px solid #CCCCCC;
    display: inline-block;
    font-size: 14px;
    font-weight: normal;
    height: 20px;
    line-height: 20px;
    min-width: 16px;
    padding: 4px 5px;
    text-align: center;
    text-shadow: 0 1px 0 #FFFFFF;
    width: auto;
	border-radius: 4px 0 0 4px;
}
.append-input {
    border-radius: 0 4px 4px 0;
    margin-bottom: 0;
    margin-left: -5px !important
    margin-top: -4px !important;
    position: relative;
    vertical-align: top;
    z-index: -8;
}
.error {  display: none !important;}
.fileerrortype
{
	margin:0;
}

/* Slider */
.followup-aside {
   background: #eaecef none repeat scroll 0 0;
    border-left: 1px #eaecef;
    padding:10px;
}
.icon-time
{
	margin-right: 5px;
	position: relative;
	top: 2px;
}
.mission-details:nth-of-type(1)
{
	margin:0 0 10px;
}

.mission-details
{
	margin:10px 0;
}

.modal1
{
	margin-left:-365px;
	width:800px;
}

.modal-body1
{
	min-height:400px;
}
	

/* For Slider */

.bxslider li
{
	padding: 0 30px;
	width: 600px;
}

.offsetleft
{
	margin-left:10px;
	color:red;
}

.correct
{
	color:green;
}

.popover-content input[type="text"]
{
	width: 300px;
}
</style>
<link href="/BO/theme/gebo/css/jquery.datetimepicker.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.datetimepicker.js" type="text/javascript" charset="utf-8"></script>
'; ?>

<div class="row-fluid">
	<div class="span12">		
		<form class="form-horizontal" enctype="multipart/form-data" method="POST" name="edit_recruitment" id="edit_recruitment" action="/recruitment/update-recruitment">
		<div class="control-group formSep">
			<label class="control-label">Recruitment Title <span class="f_req">*</span></label>
			<div class="controls">
				<span><input type="text" name="rtitle" style="text-transform: none;" id="title" class="validate[required]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['recruitDetails']['recruitment_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" /></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Participation timing <span class="f_req">*</span></label>
			<div class="controls">
								<input class="span10" value="<?php if ($this->_tpl_vars['recruitDetails']['publishtime']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['recruitDetails']['publishtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M')); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['recruitDetails']['published_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M')); ?>
<?php endif; ?>" type="hidden" name="hidden_start_date" id="hidden_start_date" />
				<div class="">
					<div class="input-append date" id="">
						<input class="span10 validate[required]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['recruitDetails']['max_participation_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M')); ?>
" name="count_down_end" autocomplete="off" type="text" id="date_timepicker_end" /><span class="add-on"><i class="splashy-calendar_day_down"></i></span>
					</div>
					<span class="help-block">Daterange - date end</span>
				</div>
			</div>
		</div>
		<div class="control-group formSep">
			<label class="control-label">Recruitment Brief </label>
			<div class="controls">
				<div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" id="hiddenupload" name="">
					<span class="btn btn-file"><span class="fileupload-new" <?php if ($this->_tpl_vars['recruitDetails']['recruitment_file_name']): ?>style="display:none"<?php endif; ?>>Select</span><span class="fileupload-exists" <?php if ($this->_tpl_vars['recruitDetails']['recruitment_file_name']): ?>style="display:block"<?php endif; ?>>Change</span>
					<input type="file" name="recruitmentbrief" id="recruitmentbrief" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['recruitDetails']['recruitment_file_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"/></span>
					<span class="recruitmentbrief fileupload-preview"><?php echo ((is_array($_tmp=$this->_tpl_vars['recruitDetails']['recruitment_file_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</span>
					<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
				</div>
				<div class="alert alert-danger span3 hide recrtfileerrortype" style="margin:0">
					Invalid File Type
				</div>
			</div>
		</div>
		<div class="control-group formSep" id="quiz_block">
			<label class="control-label">Link Quiz(Optional)</label>
			<div class="controls">				
				<?php if ($this->_tpl_vars['recruitDetails']['link_quiz'] == 'yes'): ?>
				<div id="editquiz">
					<h4><?php echo $this->_tpl_vars['quizz_details']['title']; ?>
 &nbsp;&nbsp;&nbsp;<?php if ($this->_tpl_vars['quizz_details']['status']): ?><span class="label label-success">active</span><?php else: ?><span class="label label-important">not active</span><?php endif; ?></h4>
					<p>Duration: <?php echo $this->_tpl_vars['recruitDetails']['quiz_duration']; ?>
 Mins</p>
				</div>
				<a href="/recruitment/get-quiz?cmid=<?php echo $this->_tpl_vars['prequest']['cmid']; ?>
&quiz_id=<?php echo $this->_tpl_vars['quizz_details']['id']; ?>
" data-toggle="modal" role="button" data-target="#create_quiz" id="" class="btn createquiz">
					Edit
				</a> 
				<?php else: ?>
					<div id="editquiz">
					</div>
						<a href="/recruitment/get-quiz?cmid=<?php echo $_GET['contract_missionid']; ?>
" data-toggle="modal" role="button" data-target="#create_quiz" id="" class="btn btn-info createquiz">
							create or find a quiz
						</a> 
				<?php endif; ?>
			</div>	
		</div>
		<div class="control-group">
			<label class="control-label">Writer submission Time <span class="f_req">*</span></label>
			<div class="controls">
				<div class="span3">
					JCO&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['recruitDetails']['subjunior_time']; ?>
" class="span7 validate[required]" id="subjunior_time" name="subjunior_time"> 
				</div>
				<div style="margin-left:0" class="span3">
					&nbsp;JC&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['recruitDetails']['junior_time']; ?>
" class="span7 validate[required]" id="junior_time" name="junior_time"> 
				</div>
				<div style="margin-left:0" class="span3">
					SC&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['recruitDetails']['senior_time']; ?>
" class="span7 validate[required]" id="senior_time" name="senior_time"> 
				</div>
				<select name="submit_option" class="span3 customselect" id="submit_option">
						<option value="min" <?php if ($this->_tpl_vars['recruitDetails']['submit_option'] == 'min'): ?> selected<?php endif; ?>>Min(s)</option>
						<option value="hour" <?php if ($this->_tpl_vars['recruitDetails']['submit_option'] == 'hour'): ?> selected<?php endif; ?>>Hour(s)</option>
						<option value="day" <?php if ($this->_tpl_vars['recruitDetails']['submit_option'] == 'day'): ?> selected<?php endif; ?>>Day(s)</option>
				</select>
			</div>
		</div>							
		<div class="control-group">
			<label class="control-label">Writer additional time if refused <span class="f_req">*</span></label>				
			<div class="controls">
				<div class="span3">
					JCO&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['recruitDetails']['jc0_resubmission']; ?>
" class="span7 validate[required]" id="jc0_resubmission" name="jc0_resubmission"> 
				</div>
				<div style="margin-left:0" class="span3">
					&nbsp;JC&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['recruitDetails']['jc_resubmission']; ?>
" class="span7 validate[required]" id="jc_resubmission" name="jc_resubmission"> 
				</div>
				<div style="margin-left:0" class="span3">
					SC&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['recruitDetails']['sc_resubmission']; ?>
" class="span7 validate[required]" id="sc_resubmission" name="sc_resubmission"> 
				</div>
				<select name="resubmit_option" class="span3 customselect" id="resubmit_option">
						<option value="min" <?php if ($this->_tpl_vars['recruitDetails']['resubmit_option'] == 'min'): ?> selected<?php endif; ?>>Min(s)</option>
						<option value="hour" <?php if ($this->_tpl_vars['recruitDetails']['resubmit_option'] == 'hour'): ?> selected<?php endif; ?>>Hour(s)</option>
						<option value="day" <?php if ($this->_tpl_vars['recruitDetails']['resubmit_option'] == 'day'): ?> selected<?php endif; ?>>Day(s)</option>
				</select>
			</div>
		</div>
		<div class="control-group formSep">
			<label class="control-label">Brief Writer <span class="f_req">*</span></label>
			<div class="controls">
				<div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" id="hiddenupload" name="">
					<span class="btn btn-file">
					<span class="fileupload-new" <?php if ($this->_tpl_vars['recruitDetails']['file_name']): ?>style="display:none"<?php endif; ?>>Select</span>
					<span class="fileupload-exists" <?php if ($this->_tpl_vars['recruitDetails']['file_name']): ?>style="display:block"<?php endif; ?>>Change</span>
					<input type="file" name="uploadfile" id="uploadfile" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['recruitDetails']['file_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" <?php if ($this->_tpl_vars['writer_participating'] || $this->_tpl_vars['writer_selection']): ?>disabled<?php endif; ?>/></span>
					<span class="writerbrief fileupload-preview"><?php echo ((is_array($_tmp=$this->_tpl_vars['recruitDetails']['file_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</span>
					<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
				</div>
				<div class="alert alert-danger span3 hide fileerrortype" style="margin:0">
					Invalid File Type
				</div>
			</div>
		</div>
		<?php if ($this->_tpl_vars['recruitDetails']['correction'] == 'external'): ?>
		<div class="control-group formSep" >
		<label class="control-label">Brief corrector <span class="f_req">*</span></label>
		<div class="controls">
			<div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
				<span class="btn btn-file">
				<span class="fileupload-new" <?php if ($this->_tpl_vars['recruitDetails']['crtfile_name']): ?>style="display:none"<?php endif; ?>>Select</span>
				<span class="fileupload-exists" <?php if ($this->_tpl_vars['recruitDetails']['crtfile_name']): ?>style="display:block"<?php endif; ?>>Change</span>
				<input type="file" name="crtuploadfile" id="crtuploadfile" value="<?php if ($this->_tpl_vars['recruitDetails']['crtfile_name']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['recruitDetails']['crtfile_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
<?php endif; ?>" <?php if ($this->_tpl_vars['corrector_participating'] || $this->_tpl_vars['corrector_selection']): ?>disabled<?php endif; ?>/></span>
				<span class="correctorbrief fileupload-preview"><?php if ($this->_tpl_vars['recruitDetails']['crtfile_name']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['recruitDetails']['crtfile_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
<?php endif; ?></span>
				<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
				<!-- <input type="hidden" id="crtspec_file_name" name="crtspec_file_name" value="<?php echo $this->_tpl_vars['delivery']['crtfile_name']; ?>
" /> -->
			</div>
			<div class="alert alert-danger span3 hide correctorerrortype" style="margin:0">
					Invalid File Type
			</div>
		</div>
		</div>
		<?php endif; ?>
		<input type="hidden" name="correction_type" id="correction_type" value="<?php echo $this->_tpl_vars['recruitDetails']['correction']; ?>
" />
		<input type="hidden" name="client_id" id="correction_type" value="<?php echo $this->_tpl_vars['recruitDetails']['client_id']; ?>
" />
		<input type="hidden" name="cmid" value="<?php echo $this->_tpl_vars['prequest']['cmid']; ?>
" />
		<input type="hidden" name="rid" value="<?php echo $this->_tpl_vars['prequest']['ao_id']; ?>
" />
		<input type="hidden" name="cindex" value="<?php echo $this->_tpl_vars['prequest']['index']; ?>
" />
		<div class="control-group">
			<div class="controls">
				<button class="btn btn-gebo" type="submit" >Update</button>
				<button class="btn" data-dismiss="modal">Cancel</button>
			</div>
		</div>
		</form>
	</div>
</div>
<?php echo '
<script>
function get_date(input) {
	if(input == \'\') {
		return false;
	}
else {
	// Split the date, divider is \'/\'
	var parts = input.match(/(\\d+)/g);
	return parts[0]+\'-\'+parts[1]+\'-\'+parts[2];
	} 
}

/*
$(\'#date_timepicker_start\').datetimepicker({
  format:\'Y-m-d H:i\',
  onShow:function( ct ){
   this.setOptions({
    maxDate:get_date($(\'#date_timepicker_end\').val())?get_date($(\'#date_timepicker_end\').val()):false,formatDate:\'Y-m-d\',minDate:0
   })
  }
 });
 */
	 $(\'#date_timepicker_end\').datetimepicker({
   format:\'Y-m-d H:i\',
  onShow:function( ct ){
   this.setOptions({
   minDate: $("#hidden_start_date").val(),
	formatDate:\'Y-m-d\'
   })
  }
 });
 
 $("#edit_recruitment").validationEngine({prettySelect : true,useSuffix: "_chzn",onValidationComplete: function(form, status){
	if(status == true)
	{
		var submitform = true;
		
		var rext =$(".recruitmentbrief").text().split(\'.\').pop().toLowerCase();
		if($.inArray(rext, [\'xls\',\'xlsx\',\'csv\',\'docx\',\'doc\',\'zip\']) == -1) {
			$(".recrtfileerrortype").removeClass(\'hide\');
			$("#recruitmentbrief").focus();
			submitform = false;
		}
		else
		{
			$(".recrtfileerrortype").addClass(\'hide\');
		}
		
		
		var ext =$(".writerbrief").text().split(\'.\').pop().toLowerCase();
		if($.inArray(ext, [\'xls\',\'xlsx\',\'csv\',\'docx\',\'doc\',\'zip\']) == -1) {
			$(".fileerrortype").removeClass(\'hide\');
			$("#uploadfile").focus();
			submitform = false;
		}
		else
		{
			$(".fileerrortype").addClass(\'hide\');
		}
		
		if($("#correction_type").val()=="external")
		{
			var ext =$(".correctorbrief").text().split(\'.\').pop().toLowerCase();
			if($.inArray(ext, [\'xls\',\'xlsx\',\'csv\',\'docx\',\'doc\',\'zip\']) == -1) {
				$(".correctorerrortype").removeClass(\'hide\');
				$("#uploadfile").focus();
				submitform = false;
			}
			else
			{
				$(".correctorerrortype").addClass(\'hide\');
			}
		}
		if(submitform)
		return true;
	}
}}); 
 
</script>
'; ?>