<?php /* Smarty version 2.6.19, created on 2015-09-08 11:25:57
         compiled from gebo/survey/create-survey.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/survey/create-survey.phtml', 166, false),array('modifier', 'date_format', 'gebo/survey/create-survey.phtml', 203, false),array('modifier', 'stripslashes', 'gebo/survey/create-survey.phtml', 225, false),)), $this); ?>
<?php echo '
<style>
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
	
	.question
	{
		background-color:#eeeeee;
	}

	.qcontent
	{
		padding:10px;
	}
</style>
<link href="/BO/theme/gebo/css/jquery.datetimepicker.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.datetimepicker.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/jquery.MultiFile.js" type="text/javascript" charset="utf-8"></script>
<script>
jQuery(function(){
 jQuery(\'#date_timepicker_start\').datetimepicker({
  format:\'d-m-Y H:i\',
  onShow:function( ct ){
   this.setOptions({
    maxDate:get_date($(\'#date_timepicker_end\').val())?get_date($(\'#date_timepicker_end\').val()):false,formatDate:\'d-m-Y\',minDate:0
   })
  }
 });
 jQuery(\'#date_timepicker_end\').datetimepicker({
   format:\'d-m-Y H:i\',
  onShow:function( ct ){
   this.setOptions({
    minDate:get_date($(\'#date_timepicker_start\').val())?get_date($(\'#date_timepicker_start\').val()):false,formatDate:\'d-m-Y\'
   })
  }
 });
});

function get_date(input) {
if(input == \'\') {
return false;
}	else {
// Split the date, divider is \'/\'
var parts = input.match(/(\\d+)/g);
return parts[0]+\'-\'+parts[1]+\'-\'+parts[2];
} 
}


$(document).ready(function(){
		
		$(".timingoption").chosen({ disable_search: true });
		$(".select").chosen({ disable_search: true });
		
	  $("#submit_option").chosen({  allow_single_deselect:false,disable_search: true });
	 
		
		// HTML Editor
		
		/* if (CKEDITOR.instances[\'mailcontrib\'])
                CKEDITOR.instances[\'mailcontrib\'].destroy();
            
              
		 var editor = CKEDITOR.replace( \'mailcontrib\',
			 {
				 language: \'de\',
				 uiColor: \'#D9DDDC\',
				 enterMode : CKEDITOR.ENTER_BR,
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
		*/
		 if (CKEDITOR.instances[\'cmailcontrib\'])
                CKEDITOR.instances[\'cmailcontrib\'].destroy();
            
              
		 var editor = CKEDITOR.replace( \'cmailcontrib\',
			 {
				 language: \'de\',
				 uiColor: \'#D9DDDC\',
				 enterMode : CKEDITOR.ENTER_BR,
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
		
		
		$("#insertrecruitment").validationEngine({onValidationComplete: function(form, status){
		if($(".addbrief").length<2)
		$(\'.addbrief\').prop("disabled", false);
			if(status==true)
			{
				return true;
			}
		}});
		
		var editor = CKEDITOR.instances.cmailcontrib; 
		var eorgdata = editor.getData();
		
		$("#title").blur(function(){
			var etitle = eorgdata.replace("$poll_title",\'<strong>\'+$(this).val()+\'</strong>\');
			
			if($.trim($("#date_timepicker_end").val()))
			etitle = etitle.replace("$poll_enddate",\'<strong>\'+$("#date_timepicker_end").val()+\'</strong>\'); 
			
			editor.setData(etitle);
		});
		
		$("#date_timepicker_end").blur(function(){
			var etitle = eorgdata.replace("$poll_enddate",\'<strong>\'+$(this).val()+\'</strong>\'); 
			 if($.trim($("#title").val()))
			 etitle = etitle.replace("$poll_title",\'<strong>\'+$("#title").val()+\'</strong>\'); 
			editor.setData(etitle);
		});
		
	});

</script>
<style>
	.xdsoft_today_button
	{
		visibility: hidden !important;
	}
</style>
'; ?>


<?php if (count($this->_tpl_vars['misssionQuoteDetails']) > 0): ?>
	<?php $_from = $this->_tpl_vars['misssionQuoteDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quote'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quote']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quoteMission']):
        $this->_foreach['quote']['iteration']++;
?>	
<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">
			Create Survey
		</h3>
	</div>	
</div>
<div class="row-fluid">
<div class="span9">
<form class="form-horizontal"  action="/survey/insert-survey" method="POST" id="insertrecruitment" enctype="multipart/form-data">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo/survey/mission_overview.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="mission-details">			
	<div class="prod-mission-product">Survey Set Up</div>
	</div>
	<div class="w-box">
		<div class="w-box-header">General Rules</div>
			<div class="w-box-content cnt_a">
				<div class="row-fluid">
				<div class="control-group">
					<label class="control-label">Nom de ce Devis</label>
					<div class="controls">
						<div class="span6">
							<div class="" id="">
								<input class="span10 validate[required]" value="" type="text" name="title" id="title" />
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="row-fluid">
					<div class="control-group">
						<label class="control-label">Count Down</label>
						<div class="controls">
							<div class="span6">
								<div class="" id="">
									<input class="span10 validate[required]" autocomplete="off" value="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d-%m-%Y %H:%M') : smarty_modifier_date_format($_tmp, '%d-%m-%Y %H:%M')); ?>
" type="text" name="count_down_start" id="date_timepicker_start" /><!--<span class="add-on"><i class="splashy-calendar_day_up"></i></span> -->
								</div>
								<span class="help-block">Daterange - date start</span>
							</div>
							<div class="span6">
								<div class="" id="">
									<input class="span10 validate[required]" name="count_down_end" autocomplete="off" type="text" id="date_timepicker_end" value="" /><!-- <span class="add-on"><i class="splashy-calendar_day_down"></i></span> -->
								</div>
								<span class="help-block">Daterange - date end</span>
							</div>
						</div>
					</div>
				</div>
				<?php if (count($this->_tpl_vars['question_list']) > 0): ?>
				<?php $_from = $this->_tpl_vars['question_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['question'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['question']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['questions']):
        $this->_foreach['question']['iteration']++;
?>
				<div class="row-fluid question">
					<div class="qcontent">
					<?php if ($this->_tpl_vars['questions']['type'] == 'price'): ?>
						<strong>About the pricing per article</strong>
						<div class="control-group topset2">
							<label class="control-label">Question <?php echo $this->_foreach['question']['iteration']; ?>
</label>
							<div class="controls">
								<input type="text" name="question_title[]" id="" class="span12 validate[required]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['questions']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" style=""/>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Maximum</label>
							<div class="controls">
								<input type="text" name="maximum_<?php echo ($this->_foreach['question']['iteration']-1); ?>
" id="maximum_<?php echo ($this->_foreach['question']['iteration']-1); ?>
" value="" class="span2 validate[custom[number]]" onfocus="$(this).next().show();" onBlur="$(this).next().hide();"; /> 
								<div id="pricemsg" style="display:none;color:red;">Merci d'entrer un chiffre ou de laisser le champ vide pour le prix maximum</div>
							</div>
						</div>
					<?php elseif ($this->_tpl_vars['questions']['type'] == 'bulk_price'): ?>
						<strong>About the pricing for a pack of article</strong>
						<div class="control-group topset2">
							<label class="control-label">Question <?php echo $this->_foreach['question']['iteration']; ?>
</label>
							<div class="controls">
								<input type="text" name="question_title[]" id="" class="span12 validate[required]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['questions']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" style=""/>
							</div>
						</div>
						<!--<div class="control-group">
							<label class="control-label">Type</label>
							<div class="controls">
								Prix de gros
							</div>
						</div> -->
					<?php elseif ($this->_tpl_vars['questions']['type'] == 'timing'): ?>
						<strong>About the time needed to write 1 item</strong>
						<div class="control-group topset2">
							<label class="control-label">Question <?php echo $this->_foreach['question']['iteration']; ?>
</label>
							<div class="controls">
								<input type="text" name="question_title[]" id="title_<?php echo $this->_tpl_vars['loopindex']; ?>
" class="span12 validate[required]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['questions']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" style=""/>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Options</label>
							<div class="controls">
								<select name="timingoption_<?php echo ($this->_foreach['question']['iteration']-1); ?>
" id="timingoption_<?php echo ($this->_foreach['question']['iteration']-1); ?>
" class="span3 timingoption validate[required]">
									<option value="min">Minute(s)</option>
									<option value="hour">Hour(s)</option>
									<option value="day">Day(s)</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Minimum</label>
							<div class="controls">
								<input type="text" name="minimum_<?php echo ($this->_foreach['question']['iteration']-1); ?>
" id="minimum_<?php echo ($this->_foreach['question']['iteration']-1); ?>
" value="" class="span2 validate[custom[number]]" /> 
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Maximum</label>
							<div class="controls">
								<input type="text" name="maximum_<?php echo ($this->_foreach['question']['iteration']-1); ?>
" id="maximum_<?php echo ($this->_foreach['question']['iteration']-1); ?>
" value="" class="span2 validate[custom[number]]" /> 
							</div>
						</div>
					<?php endif; ?>
					</div>
					<input type="hidden" name="quesid_<?php echo ($this->_foreach['question']['iteration']-1); ?>
" id="" value="<?php echo $this->_tpl_vars['questions']['id']; ?>
" />
					<input type="hidden" name="questype_<?php echo ($this->_foreach['question']['iteration']-1); ?>
" id="" value="<?php echo $this->_tpl_vars['questions']['type']; ?>
" />
				</div>
				
				<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
	<div class="w-box row-fluid">
		<div class="w-box-header">The Brief</div>
			<div class="w-box-content cnt_a">
				<div class="row-fluid">
					<div class="span12">
						  <div id="uploadspec">
							<input type="file" accept="doc|docx|zip|xls|xlsx|pdf|et|rtf" name="uploadfile" class="validate[required] multi" maxlength="1">
						</div>
						<span class="help-block">Uniquement doc, docx, zip, xls, xlsx, pdf et rtf</span>
					</div>
				</div>
			</div>
				</div>
	
	<div class="w-box">
		<div class="w-box-header">Review of Editorial Chief</div>
		<div class="w-box-content cnt_a">
			<div class="row-fluid">
				<div class="control-group">
					<div class="media mission-comment">
					<a class="pull-left imgframe">
						<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
					</a>
					<div class="media-body">														
						<textarea name="editorial_chief_review" placeholder="Write a cool review to promote this challenge" class="span12" id=""></textarea>
					</div>												
				</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="w-box">
		<div class="w-box-header">Promotion</div>
			<div class="w-box-content cnt_a">
								
				<div class="row-fluid">
					<div class="control-group">
						<label class="control-label" style="text-align:left;">From</label>
						<div class="controls">
							<div class="pull-left">
							<select name='cemail_from' class='validate[required] select' style='width:140px'>
								<option value='service'>Editorial team</option>
								<option value='me'>Me</option>
							</select>
							</div>
							<div style="padding-top:6px"> <strong style="margin-left:10px">To: Writers</strong></div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" style="text-align:left;">Subject</label>
						<div class="controls">
							<input type="text" name="cemail_subject" id="cemail_subject" value="<?php echo $this->_tpl_vars['cemail_subject']; ?>
" class="span8 validate[required]" /> 
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" style="text-align:left;">Message</label>
						<div class="controls">
							<textarea rows="4" class="validate[required]" cols="80" name="cemail_content" id="cmailcontrib" ><?php echo $this->_tpl_vars['cemail_content']; ?>
</textarea>  
						</div>
					</div>
				</div>
				
			</div>
	</div>
	</div>
	</div>
	<div class="control-group topset2">
		<div class="pull-center">
			<button class="btn btn-primary" type="submit" onclick="return removeDisabled()">Validate</button>
		</div>
	</div>
	<input type="hidden" name="contract_mission_id" value="<?php echo $_GET['contract_missionid']; ?>
" />	
	<input type="hidden" name="client_id" value="<?php echo $this->_tpl_vars['quoteMission']['client_id']; ?>
" />	
	<?php if ($this->_tpl_vars['quoteMission']['language_dest']): ?>
	<input type="hidden" name="language" value="<?php echo $this->_tpl_vars['quoteMission']['language_dest']; ?>
" />	
	<?php else: ?>
	<input type="hidden" name="language" value="<?php echo $this->_tpl_vars['quoteMission']['language_source']; ?>
" />	
	<?php endif; ?>
	<input type="hidden" name="type" value="<?php echo $this->_tpl_vars['quoteMission']['product_type']; ?>
" />	
	<input type="hidden" name="category" value="<?php echo $this->_tpl_vars['quoteMission']['category']; ?>
" />	
	<input type="hidden" name="cid" value="<?php echo $_GET['cid']; ?>
" />	
	<input type="hidden" name="mid" value="<?php echo $_GET['mid']; ?>
" />	
	<input type="hidden" name="qid" value="<?php echo $_GET['qid']; ?>
" />	
	<input type="hidden" name="nb_words" value="<?php echo $this->_tpl_vars['quoteMission']['nb_words']; ?>
" />	
	</form>
</div>

<div class="span3">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'gebo/survey/info.phtml', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</div>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>