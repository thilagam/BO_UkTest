<?php /* Smarty version 2.6.19, created on 2015-08-06 11:26:44
         compiled from gebo/recruitment/recruitment-test-article.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/recruitment/recruitment-test-article.phtml', 230, false),array('modifier', 'zero_cut', 'gebo/recruitment/recruitment-test-article.phtml', 416, false),array('function', 'html_options', 'gebo/recruitment/recruitment-test-article.phtml', 278, false),)), $this); ?>
<?php echo '
<style>
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
</style>
<link href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" rel="stylesheet">
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script> 

<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/ajaxupload.3.5.js"></script>


<link rel="stylesheet" href="/BO/theme/gebo/lib/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/bootstrap-multiselect/bootstrap-multiselect.js" type="text/javascript" charset="utf-8"></script>


<script>
$(document).ready(function(){
		
		//validation
		$("#recruitment-test-article").validationEngine({prettySelect : true,useSuffix: "_chzn"});
		
		var total_articles='; ?>
<?php echo $this->_tpl_vars['prod_step1']['total_article']; ?>
<?php echo ';
		
		$("#contribs_list").multiselect({
			includeSelectAllOption: true,
			nonSelectedText:\'Select contributors\',
			numberDisplayed: 1,
			buttonWidth:\'360px\',
			maxHeight: 200,
			enableCaseInsensitiveFiltering: true,
			onChange: function(option, checked) {
                // Get selected options.
                var selectedOptions = $(\'#contribs_list option:selected\');
 
                if (selectedOptions.length >= total_articles) {
                    // Disable all other checkboxes.
                    var nonSelectedOptions = $(\'#contribs_list option\').filter(function() {
                        return !$(this).is(\':selected\');
                    });
 
                    var dropdown = $(\'#contribs_list\').siblings(\'.multiselect-container\');
                    nonSelectedOptions.each(function() {
                        var input = $(\'input[value="\' + $(this).val() + \'"]\');
                        input.prop(\'disabled\', true);
                        input.parent(\'li\').addClass(\'disabled\');
                    });
                }
                else {
                    // Enable all checkboxes.
                    var dropdown = $(\'#contribs_list\').siblings(\'.multiselect-container\');
                    $(\'#contribs_list option\').each(function() {
                        var input = $(\'input[value="\' + $(this).val() + \'"]\');
                        input.prop(\'disabled\', false);
                        input.parent(\'li\').addClass(\'disabled\');
                    });
                }
            }
        
		});
		
		
		//icheck radio/checkbox
		$(".icheck").iCheck({
			checkboxClass: \'icheckbox_square-blue\',
			radioClass: \'iradio_square-blue\'
		});
		
		$(\'input[name="correction"]\').on(\'ifClicked\', function (event) {
			var value=this.value;
			if(value==\'external\')
			{
				$("#external").show();	
				$("#correction_selection").show();				
			}	
			else if(value==\'multi_external\')
			{
				$("#external").show();
				$("#correction_selection").hide();				
			}	
			else{
				$("#external").hide();
				$("#correction_selection").hide();				
			}	
		});
		
		//plag excel toggle
		$(\'input[name="plag_excel_file"]\').on(\'ifClicked\', function (event) {
			var value=this.value;
			if(value==\'yes\')
			{
				$("#plag_excel_div").show();				
			}	
			else
			{
				$("#plag_excel_div").hide();				
			}	
			
		});
		
		//article price toggle
		/* $(\'#free_article\').on(\'ifClicked\', function(event){		
			$("#article_price_div").toggle();		
		});	 */
		
		$("#resubmit_option").chosen({ allow_single_deselect:false,disable_search: true });
		$("#submit_option").chosen({ allow_single_deselect:false,disable_search: true });
});
//writing brief upload		
$(function(){		
		var btnUpload=$(\'#uploadspec_chzn\');
		var status=$(\'#writing_spec_file_name\');
		
		new AjaxUpload(btnUpload, {

			action: \'upload-writing-spec\',
			name: \'uploadfile\',

			onSubmit: function(file, ext){
				if (! (ext && /^(doc|docx|xls|xlsx|pdf|csv|xml|rtf|zip)$/.test(ext))){
					$(\'#fileerr\').html(\'Uniquement doc, docx, xls, xlsx, pdf, csv, xml, zip et rtf\').css(\'color\',\'#FF0000\');
					return false;
				}				
				status.html(\'<img src="/BO/theme/gebo/img/ajax_loader.gif" />\');
			},
			onComplete: function(file, response){//alert(response);
				if(response!="error"){
				status.html(\'\').css(\'color\',\'#000000\');
					var fname=response.split("#");					
					status.html(fname[1]);
					$("#uploadspec").val(fname[1]);
					
				}
			}
		 });
	
		 
	});


		//correctiom brief upload		
$(function(){		
		var btnUpload=$(\'#upload-correction-spec_chzn\');
		var status=$(\'#correction_spec_file_name\');
		
		new AjaxUpload(btnUpload, {

			action: \'upload-correction-spec\',
			name: \'uploadfile\',

			onSubmit: function(file, ext){
				if (! (ext && /^(doc|docx|xls|xlsx|pdf|csv|xml|rtf|zip)$/.test(ext))){
					$(\'#fileerr\').html(\'Uniquement doc, docx, xls, xlsx, pdf, csv, xml, zip et rtf\').css(\'color\',\'#FF0000\');
					return false;
				}		
				
				
				status.html(\'<img src="/BO/theme/gebo/img/ajax_loader.gif" />\');
			},
			onComplete: function(file, response){//alert(response);
				if(response!="error"){
				status.html(\'\').css(\'color\',\'#000000\');
					var fname=response.split("#");					
					status.html(fname[1]);	
					$("#upload-correction-spec").val(fname[1]);
				}
			}
		 });
	
		 
});
	
</script>
<style>
	.xdsoft_today_button
	{
		//visibility: hidden !important;
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
				Test article setup | <?php echo $this->_tpl_vars['prod_step1']['title']; ?>

			</h3>
		</div>	
	</div>
	<div class="row-fluid">
			<div class="span9">
		<form class="form-horizontal"  action="/recruitment/save-test-article?contract_missionid=<?php echo $_GET['contract_missionid']; ?>
" method="POST" id="recruitment-test-article" enctype="multipart/form-data">			
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo/survey/mission_overview.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div class="mission-details">			
				<div class="prod-mission-product">Test Article Set Up</div>
			</div>
			<div class="w-box">
				<div class="w-box-header">Writing Rules</div>
					<div class="w-box-content cnt_a">
						<div class="row-fluid">									
							<div class="control-group">
								<label class="control-label"># of articles to create</label>
								<div class="controls">
									<div class="span4">
										<input type="text" disabled class="span5 validate[required,custom[integer],maxWriters[<?php echo $this->_tpl_vars['prod_step1']['total_article']; ?>
]" id="total_article" value="<?php echo $this->_tpl_vars['prod_step1']['total_article']; ?>
" name="total_article">
									</div>									
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">price of test article</label>
								<div class="controls">
									<div class="span2">
										<label class="checkbox inline">
											<input type="checkbox" name="free_article" id="free_article" value="yes" <?php if ($this->_tpl_vars['test_article']['free_article'] == 'yes'): ?> checked<?php endif; ?> class="icheck" /> 
											Free
										</label>
									</div>	
																	</div>
							</div>
							<?php if ($this->_tpl_vars['prod_step1']['AOtype'] == 'private'): ?>
							<div class="control-group">
								<label class="control-label">Contributeurs</label>
								<div class="span8">									
									<select id="contribs_list" multiple class="span8 validate[required]" data-placeholder="Select contributors" name="contribs_list[]">										
										<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['writersList'],'selected' => $this->_tpl_vars['test_article']['contribs_list']), $this);?>
	
									</select>
								</div>
							</div>
							<?php endif; ?>							
							<div class="control-group">
								<label class="control-label">Cost (&<?php echo $this->_tpl_vars['prod_step1']['currency']; ?>
;)</label>
								<div class="controls">
									<div class="span3">
										Min&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['prod_step1']['price_min']; ?>
" class="span7 " name="price_min_writer" disabled> 
									</div>
									<div style="margin-left:0" class="span3">
										Max&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['prod_step1']['price_max']; ?>
" class="span7 " name="price_max_writer" disabled> 
									</div>
								</div>
							</div>	
							<div class="control-group">
								<label class="control-label">Submission Time</label>
								<div class="controls">
									<div class="span3">
										JCO&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['test_article']['subjunior_time']; ?>
" class="span7 validate[required]" id="subjunior_time" name="subjunior_time"> 
									</div>
									<div style="margin-left:0" class="span3">
										&nbsp;JC&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['test_article']['junior_time']; ?>
" class="span7 validate[required]" id="junior_time" name="junior_time"> 
									</div>
									<div style="margin-left:0" class="span3">
										SC&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['test_article']['senior_time']; ?>
" class="span7 validate[required]" id="senior_time" name="senior_time"> 
									</div>
									<select name="submit_option" class="span3 customselect" id="submit_option">
											<option value="min" <?php if ($this->_tpl_vars['test_article']['submit_option'] == 'min'): ?> selected<?php endif; ?>>Min(s)</option>
											<option value="hour" <?php if ($this->_tpl_vars['test_article']['submit_option'] == 'hour'): ?> selected<?php endif; ?>>Hour(s)</option>
											<option value="day" <?php if ($this->_tpl_vars['test_article']['submit_option'] == 'day'): ?> selected<?php endif; ?>>Day(s)</option>
									</select>
								</div>
							</div>							
							<div class="control-group">
								<label class="control-label">Additional time if refused</label>							
								<div class="controls">
									<div class="span3">
										JCO&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['test_article']['jc0_resubmission']; ?>
" class="span7 validate[required]" id="jc0_resubmission" name="jc0_resubmission"> 
									</div>
									<div style="margin-left:0" class="span3">
										&nbsp;JC&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['test_article']['jc_resubmission']; ?>
" class="span7 validate[required]" id="jc_resubmission" name="jc_resubmission"> 
									</div>
									<div style="margin-left:0" class="span3">
										SC&nbsp;&nbsp;<input type="text" value="<?php echo $this->_tpl_vars['test_article']['sc_resubmission']; ?>
" class="span7 validate[required]" id="sc_resubmission" name="sc_resubmission"> 
									</div>
									<select name="resubmit_option" class="span3 customselect" id="resubmit_option">
											<option value="min" <?php if ($this->_tpl_vars['test_article']['resubmit_option'] == 'min'): ?> selected<?php endif; ?>>Min(s)</option>
											<option value="hour" <?php if ($this->_tpl_vars['test_article']['resubmit_option'] == 'hour'): ?> selected<?php endif; ?>>Hour(s)</option>
											<option value="day" <?php if ($this->_tpl_vars['test_article']['resubmit_option'] == 'day'): ?> selected<?php endif; ?>>Day(s)</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Brief writer</label>
								<div class="controls">
									<div id="uploadspec_chzn" class="span3">
										<span class="btn btn-file">
											<span class="fileupload-new"><i class="icon-adt_atach"></i>Add Brief</span>
											<input style="display:none" type="file" class="" name="file" value="<?php echo $this->_tpl_vars['test_article']['writing_spec_file_name']; ?>
">
										</span>
										<input type="hidden"class="validate[required]" id="uploadspec" value="<?php echo $this->_tpl_vars['test_article']['writing_spec_file_name']; ?>
">
										<div id="writing_spec_file_name"><?php echo $this->_tpl_vars['test_article']['writing_spec_file_name']; ?>
</div>
									</div>
								</div>
							</div>
							
						</div>	
					</div>
			</div>
			<!-- Proofreading Rules -->
						<div class="mission-details2">			
				<div class="prod-mission-product">Proofreading Rules</div>
			</div>			
			<div class="w-box">
				<div class="w-box-content cnt_a">
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">Team in charge</label>
							<div class="controls">
								<div class="span8">
									<div class="" id="">
											<label class="radio inline">
											<input type="radio"   name="correction" id="correction" value="internal" <?php if ($this->_tpl_vars['test_article']['correction'] == 'internal'): ?> checked<?php endif; ?> class="icheck" /> 
												Internal
											</label>
											<label class="radio inline">
											<input type="radio"   class="icheck" name="correction" id="correction" value="external" <?php if ($this->_tpl_vars['test_article']['correction'] == 'external'): ?> checked<?php endif; ?> /> 
												External
											</label>
											<label class="radio inline">
												<input type="radio" class="icheck" name="correction" id="correction" value="multi_external" <?php if ($this->_tpl_vars['test_article']['correction'] == 'multi_external'): ?> checked<?php endif; ?> /> 
												Stakeholders
											</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">Plagiarism Excel</label>
							<div class="controls">
								<div class="span4">									
									<label class="radio inline">
										<input type="radio" name="plag_excel_file" class="icheck" value="yes" <?php if ($this->_tpl_vars['test_article']['plag_excel_file'] == 'yes'): ?> checked<?php endif; ?>/> 
										YES&nbsp;&nbsp;&nbsp;
									</label>
									<label class="radio inline">
										<input type="radio" name="plag_excel_file" class="icheck" value="no" <?php if ($this->_tpl_vars['test_article']['plag_excel_file'] != 'yes'): ?> checked<?php endif; ?>/> 
										NO
									</label>
									
								</div>
							</div>
							<div class="controls" id="plag_excel_div" <?php if ($this->_tpl_vars['test_article']['plag_excel_file'] != 'yes'): ?> style="display:none"<?php endif; ?>>
								<div class="span2" style="margin-left:-45px">
									<select name="plag_xls" class="span12 customselect" id="plag_xls">
										<option value="xls" <?php if ($this->_tpl_vars['test_article']['plag_xls'] == 'xls'): ?> selected <?php endif; ?>>XLS</option>
										<option value="xlsx" <?php if ($this->_tpl_vars['test_article']['plag_xls'] == 'xlsx'): ?> selected <?php endif; ?>>XLSX</option>
									</select>
								</div>
								<div class="span3">
									<input type="text" class="span12" id="xls_columns" value="<?php echo $this->_tpl_vars['test_article']['xls_columns']; ?>
" placeholder="# columns" name="xls_columns">
								</div>
							</div>
						</div>
					</div>
					<div id="external" <?php if ($this->_tpl_vars['test_article']['correction'] == 'internal'): ?> class="hide" <?php endif; ?>>						
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label" style="padding-top:5px">Cost (&<?php echo $this->_tpl_vars['prod_step1']['currency']; ?>
;)</label>
								<div class="controls">
									<div class="span3">
										<!-- <div class="pull-center">Min</div> -->
										<div class="" id="">
											<input class="span12  validate[required,max[<?php echo $this->_tpl_vars['test_article']['correction_pricemax_valid']; ?>
],priceRange[#correction_pricemax]]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['test_article']['correction_pricemin'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" type="text" name="correction_pricemin" id="correction_pricemin" placeholder="Min" />
										</div>
									</div>
									<div class="span3">
										<!-- <div class="pull-center">Max</div> -->
										<div class="" id="">
											<input class="span12 validate[required,max[<?php echo $this->_tpl_vars['test_article']['correction_pricemax_valid']; ?>
]]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['test_article']['correction_pricemax'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" type="text" name="correction_pricemax" id="correction_pricemax" placeholder="Max" />
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label"><i class="icon-time"></i>Participation</label>
								<div class="controls">
									<div class="span3" >
										<input type="text" name="correction_participation_hour" id="correction_participation_hour" class="span8  validate[required]" value="<?php echo $this->_tpl_vars['test_article']['correction_participation_hour']; ?>
" /> Hour(s)
									</div>
									<div class="span3">
										<input type="text" name="correction_participation_min" id="correction_participation_min" class="span8 validate[required]" value="<?php echo $this->_tpl_vars['test_article']['correction_participation_min']; ?>
" /> Min(s)
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid <?php if ($this->_tpl_vars['test_article']['correction'] != 'external'): ?> hide<?php endif; ?>" id="correction_selection">
							<div class="control-group">
								<label class="control-label"><i class="icon-time"></i>Selection</label>
								<div class="controls">
									<div class="span3" >
									<input type="text" name="correction_selection_hour" id="correction_selection_hour" class="span8  validate[required]" value="<?php echo $this->_tpl_vars['test_article']['correction_selection_hour']; ?>
" /> Hour(s)
									</div>
									<div class="span3">
									<input type="text" name="correction_selection_min" id="correction_selection_min" class="span8 validate[required]" value="<?php echo $this->_tpl_vars['test_article']['correction_selection_min']; ?>
" /> Min(s)
									</div>
								</div>
							</div>
						</div>						
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label">Min score to pass the test</label>
								<div class="controls">						
									<div class="span3">
										<input type="text" class="span12 validate[required,custom[number]]" id="min_mark" value="<?php echo $this->_tpl_vars['test_article']['min_mark']; ?>
" name="min_mark">
									</div>
								</div>
							</div>
						</div>						
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label">Brief corrector</label>
								<div class="controls">
									<div id="upload-correction-spec_chzn" class="span3">
										<span class="btn btn-file">
											<span class="fileupload-new"><i class="icon-adt_atach"></i>Add Brief</span>
											<input type="file" class="" name="correction_file">
										</span>
										<input type="hidden"class="validate[required]" id="upload-correction-spec" value="<?php echo $this->_tpl_vars['test_article']['correction_spec_file_name']; ?>
">
										<div id="correction_spec_file_name"><?php echo $this->_tpl_vars['test_article']['correction_spec_file_name']; ?>
</div>								
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
						<div class="control-group topset2">
				<div class="pull-center">
					<a class="btn btn-default" href="/recruitment/recruitment-prod1?contract_missionid=<?php echo $_GET['contract_missionid']; ?>
"><i class="icon-chevron-left"></i> Back</a>
					<button class="btn btn-primary" type="submit">Save and schedule</button>
				</div>
			</div>
			<input type="hidden" name="contract_mission_id" value="<?php echo $_GET['contract_missionid']; ?>
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
	