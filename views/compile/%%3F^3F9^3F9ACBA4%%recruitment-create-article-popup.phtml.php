<?php /* Smarty version 2.6.19, created on 2015-09-03 15:53:57
         compiled from gebo/recruitment/recruitment-create-article-popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/recruitment/recruitment-create-article-popup.phtml', 294, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<link href="/BO/theme/gebo/css/jquery.datetimepicker.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.datetimepicker.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="/BO/theme/gebo/lib/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/bootstrap-multiselect/bootstrap-multiselect.js" type="text/javascript" charset="utf-8"></script>

<style type="text/css">
.input-group {
    margin: 10px;
    width: 80%;
}
</style>


<script>
$(function(){

	//form validation
	$("#article_create_form").validationEngine({autoHidePrompt: true,promptPosition: "topLeft",prettySelect : true,useSuffix: "_chzn"}); 
	//$("#article_create_form").validationEngine(\'attach\', {promptPosition:"topLeft"});
	
	//icheck radio/checkbox
		$(".icheck").iCheck({
			checkboxClass: \'icheckbox_square-blue\',
			radioClass: \'iradio_square-blue\'
		});
	
	$("#resubmit_option").chosen({ allow_single_deselect:false,disable_search: true });
	$("#submit_option").chosen({ allow_single_deselect:false,disable_search: true });
	$("#correction_submit_option").chosen({ allow_single_deselect:false,disable_search: true });
	$("#correction_resubmit_option").chosen({ allow_single_deselect:false,disable_search: true });
	
	
	$("#contribs_list").multiselect({
		includeSelectAllOption: true,
		nonSelectedText:\'Select contributors\',
		numberDisplayed: 1,
		buttonWidth:\'360px\',
		maxHeight: 200,
		enableCaseInsensitiveFiltering: true
	});
	
	$("#corrector_privatelist").multiselect({
		includeSelectAllOption: true,
		nonSelectedText:\'Select proof readers\',
		numberDisplayed: 1,
		buttonWidth:\'360px\',
		maxHeight: 200,
		enableCaseInsensitiveFiltering: true
	});
    
	
	
	$(\'#proofread_start\').datetimepicker({
		format:\'Y-m-d H:i\'
	});	
	$(\'#writing_end\').datetimepicker({
		format:\'Y-m-d H:i\'
	});	
	$(\'#proofread_end\').datetimepicker({
		format:\'Y-m-d H:i\'
	});	
	
	//save article info into session
		$("#save_article,#save_all_articles").click(function(){
			var click_id=$(this).attr(\'id\');			
			
			$("#articles_save_action").val(click_id);
			if ($("#article_create_form").validationEngine(\'validate\')) {
				
				if(click_id==\'save_all_articles\')//change text of left side when all save button is clicked
				{
					$("#drag-events").html(\'<div class="no-items">No items to schedule</div>\');
				}	
				
					var post_data = $("#article_create_form").serialize();	
					//alert(post_data);
					var url=\'/recruitment/ajax-save-article\'
					$.ajax({
						url:url,
						data:post_data,
						//dataType :"json",
						type : "POST",
						success:function(result){
							//alert(result);
							result=$.trim(result);
							if(result==\'success\')
							{
								destroyCalendar();
								displayArticleEventCalendar();
								$("#create_article").modal(\'hide\');
							}	
							
					  }});
			}
			else {
					// The form didn\'t validate
			}
			return false;
		
		});
});

//remove session article and update packages and calendar
function removeArticle(article_id)
{

	smoke.confirm("Souhaitez-vous vraiment supprimer cette article?",function(e){
		if (e)
		{
			var target_page="/recruitment/remove-session-article?article_id="+article_id;
			//alert(target_page);
			$.post(target_page,function(result){
				//alert(result);
				destroyCalendar();
				displayArticleEventCalendar();
				$("#create_article").modal(\'hide\');
			});
		}
		else
		{
			return false;
		}
	});
	

}	 
</script>
'; ?>

<form  id="article_create_form">
	<input name="article_id" type="hidden" value="<?php echo $_GET['article_id']; ?>
">
	<div class="row-fluid" style="margin-top:0px;">
		<div class="span12">
			<div class="row-fluid">
				<input type="text" class="span12 validate[required]" name="article_title" id="article_title" value="<?php echo $this->_tpl_vars['article_details']['title']; ?>
">	
			</div>
		</div>
	</div>	
	<div class="row-fluid">
				<?php if ($this->_tpl_vars['test_article']['correction'] == 'external' || $this->_tpl_vars['test_article']['correction'] == 'multi_external'): ?>
		<div class="span12">
			<div class="row-fluid">
				<div class="span8">
					<label><h4>EXTERNAL PROOFREADING</h4></label>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<label><h4>Min</h4></label>
				</div>
				<div class="span4">
					<label><h4>Max</h4></label>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">					
					<input type="text" class="span12 validate[required]" placeholder="Price min" name="correction_pricemin" id="correction_pricemin"  value="<?php echo $this->_tpl_vars['article_details']['correction_pricemin']; ?>
">
				</div>
				<div class="span4">					
					<input type="text" class="span12 validate[required]" placeholder="Price max" name="correction_pricemax" id="correction_pricemax" value="<?php echo $this->_tpl_vars['article_details']['correction_pricemax']; ?>
">
				</div>
			</div>
			<?php if ($this->_tpl_vars['prod_step1']['AOtype'] == 'public'): ?>
			<div class="row-fluid">
				<div class="span8">
					<label><h4>Correcteurs type</h4></label>
				</div>
			</div>
			<?php else: ?>
				<div class="row-fluid">
				<div class="span8">
					<label><h4>Correcteurs</h4></label>
				</div>
			</div>
			<?php endif; ?>
			<div class="row-fluid">
				<div class="span8">
					<?php if ($this->_tpl_vars['prod_step1']['AOtype'] == 'private'): ?>
						<select id="corrector_privatelist" multiple class="span12 validate[required]" data-placeholder="Select proofreaders" name="corrector_privatelist[]">
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['correctorsList'],'selected' => $this->_tpl_vars['article_details']['corrector_privatelist']), $this);?>

						</select>
					<?php else: ?>					
						<label class="checkbox inline">
							<input id="corrector_check_1" type="checkbox" <?php if (in_array ( 'sc' , $this->_tpl_vars['article_details']['corrector_list'] )): ?>checked <?php endif; ?> name="corrector_list[]" value="sc" class="icheck validate[minCheckbox[1]]" />SC
						</label>
						<label class="checkbox inline">
							<input id="corrector_check_2" type="checkbox" <?php if (in_array ( 'jc' , $this->_tpl_vars['article_details']['corrector_list'] )): ?>checked <?php endif; ?> name="corrector_list[]" value="jc" class="icheck validate[minCheckbox[1]]" />JC
						</label>						
					<?php endif; ?>	
				</div>
			</div>
			<?php if ($this->_tpl_vars['test_article']['correction'] == 'external'): ?>
				<div class="row-fluid">
					<div class="span4">
						<label><h4>Start date</h4></label>
					</div>
					<div class="span4">
						<label><h4>End date</h4></label>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">				
						<div class="input-append date">
							<input class="span10 validate[required]" value="<?php echo $this->_tpl_vars['article_details']['proofread_start']; ?>
" type="text" name="proofread_start" id="proofread_start" placeholder="start date" /><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
						</div>
					</div>	
					<div class="span4">			
						<div class="input-append date">
							<input class="span10 validate[required]" disabled value="<?php echo $this->_tpl_vars['article_details']['proofread_end']; ?>
" type="text" name="proofread_end" id="proofread_end" placeholder="End date" /><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
						</div>
					</div>				
				</div>
			<?php endif; ?>	
			<div class="row-fluid">
				<div class="span4">
					<label><h4>Submission Time</h4></label>
				</div>
			</div>
			<div class="row-fluid">
				<div class="control-group">					
					<div class="controls">								
						<div style="margin-left:0" class="span3">
							&nbsp;JC&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['article_details']['correction_jc_submission']; ?>
" class="span7 validate[required]" id="correction_jc_submission" name="correction_jc_submission"> 
						</div>
						<div style="margin-left:0" class="span3">
							SC&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['article_details']['correction_sc_submission']; ?>
" class="span7 validate[required]" id="correction_sc_submission" name="correction_sc_submission"> 
						</div>
						
						<select name="correction_submit_option" class="span3 customselect" id="correction_submit_option">
								<option value="min" <?php if ($this->_tpl_vars['article_details']['correction_submit_option'] == 'min'): ?> selected<?php endif; ?>>Min(s)</option>
								<option value="hour" <?php if ($this->_tpl_vars['article_details']['correction_submit_option'] == 'hour'): ?> selected<?php endif; ?>>Hour(s)</option>
								<option value="day" <?php if ($this->_tpl_vars['article_details']['correction_submit_option'] == 'day'): ?> selected<?php endif; ?>>Day(s)</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span8">
					<label><h4>Additional time if refused</h4></label>
				</div>
			</div>
			<div class="row-fluid">
				<div class="control-group">					
					<div class="controls">						
						<div style="margin-left:0" class="span3">
							&nbsp;JC&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['article_details']['correction_jc_resubmission']; ?>
" class="span7 validate[required]" id="correction_jc_resubmission" name="correction_jc_resubmission"> 
						</div>
						<div style="margin-left:0" class="span3">
							SC&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['article_details']['correction_sc_resubmission']; ?>
" class="span7 validate[required]" id="correction_sc_resubmission" name="correction_sc_resubmission"> 
						</div>
						<select name="correction_resubmit_option" class="span3 customselect" id="correction_resubmit_option">
								<option value="min" <?php if ($this->_tpl_vars['article_details']['correction_resubmit_option'] == 'min'): ?> selected<?php endif; ?>>Min(s)</option>
								<option value="hour" <?php if ($this->_tpl_vars['article_details']['correction_resubmit_option'] == 'hour'): ?> selected<?php endif; ?>>Hour(s)</option>
								<option value="day" <?php if ($this->_tpl_vars['article_details']['correction_resubmit_option'] == 'day'): ?> selected<?php endif; ?>>Day(s)</option>
						</select>
					</div>
				</div>
			</div>						
		</div>
		<?php endif; ?>
	</div>
	<div class="row-fluid">
		<div class="span4" style="margin-top:30px">
			<a onclick="removeArticle('<?php echo $_GET['article_id']; ?>
');"><i class="icon-adt_trash"></i> Remove</a>
		</div>
		<div class="span8" style="margin-top:30px">
			<input type="hidden" id="articles_save_action" name="articles_save_action" value="">
			<?php if ($this->_tpl_vars['prod_step1']['total_article'] > 1 && $this->_tpl_vars['test_article']['correction'] != 'internal'): ?>
				<input type="button" class="btn btn-primary" id="save_all_articles" name="save_repeat" value="Save and apply to all packs">
			<?php endif; ?>			
			<input type="button" class="btn btn-primary" id="save_article" name="save" value="Save">
		</div>
	</div>
</form>