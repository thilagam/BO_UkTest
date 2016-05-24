<?php /* Smarty version 2.6.19, created on 2015-09-03 12:40:20
         compiled from gebo/recruitment/recruitment-prod1.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/recruitment/recruitment-prod1.phtml', 164, false),array('modifier', 'count', 'gebo/recruitment/recruitment-prod1.phtml', 252, false),array('modifier', 'stripslashes', 'gebo/recruitment/recruitment-prod1.phtml', 379, false),array('modifier', 'zero_cut', 'gebo/recruitment/recruitment-prod1.phtml', 416, false),)), $this); ?>
<?php echo '
<style>
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
<link href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" rel="stylesheet">
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script> 

<link href="/BO/theme/gebo/css/jquery.datetimepicker.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.datetimepicker.js" type="text/javascript" charset="utf-8"></script>

<link href="/BO/theme/gebo/css/jquery.bxslider.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.bxslider.min.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/ajaxupload.3.5.js"></script><link rel="stylesheet" href="/BO/theme/gebo/lib/x-editable/bootstrap-editable/css/bootstrap-editable.css"><script src="/BO/theme/gebo/lib/x-editable/bootstrap-editable/js/bootstrap-editable.min.js" type="text/javascript" charset="utf-8"></script>

<script>
var recruiment_ajax_upload = "";
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
$(document).ready(function(){
	$(\'#date_timepicker_start\').datetimepicker({
  format:\'Y-m-d H:i\',
  onShow:function( ct ){
   this.setOptions({
    maxDate:get_date($(\'#date_timepicker_end\').val())?get_date($(\'#date_timepicker_end\').val()):false,formatDate:\'Y-m-d\',minDate:0
   })
  }
 });
	 $(\'#date_timepicker_end\').datetimepicker({
   format:\'Y-m-d H:i\',
  onShow:function( ct ){
   this.setOptions({
    minDate:get_date($(\'#date_timepicker_start\').val())?get_date($(\'#date_timepicker_start\').val()):false,formatDate:\'Y-m-d\'
   })
  }
 });
		//validation
		$("#recruitment-prod-form1").validationEngine({prettySelect : true,useSuffix: "_chzn"});
		 $(\'body\').on(\'show\', \'#recruitment_create_quiz\', function (){        
			$("#create_quiz").modal(\'hide\'); 
			//$(\'#create_quiz .modal-body\').html(\'\');
});

		 $(\'body\').on(\'hidden\', \'#recruitment_create_quiz\', function (){
			//$(\'.modal-body\',this).html(\'\');	
		});	 

		$(\'body\').on(\'hidden\', \'#create_quiz\', function (){			
		/* 	$(\'html, body\').animate({
		        scrollTop: $("#quiz_block").offset().top
		    }, 2000);	 */		
			//console.log("Create Quiz");
			recruiment_ajax_upload.destroy();
		});


		

		$(\'body\').on(\'hidden\', \'#recruitment_create_quiz\', function (){
			$("#create_quiz").modal(\'hide\'); 
			var cmid=\''; ?>
<?php echo $_GET['contract_missionid']; ?>
<?php echo '\';
			var href = \'/recruitment/get-quiz?cmid=\'+cmid;
			$("#create_quiz").removeData(\'modal\');
			$(\'#create_quiz .modal-body\').load(href);
			$("#create_quiz").modal();
			//console.log("Create Quiz");
			recruiment_ajax_upload.destroy();
		});


		/*recruitment name edit*/
		$("#edit_dname").click(function(e){			
			e.stopPropagation();			
			$(\'#recruitment_name\').editable(\'toggle\');		
		});		 		
		$(\'#recruitment_name\').editable({            
			url: \'/recruitment/update-recruitmentname\',            
			type: \'text\',            
			name: \'recruitment_name\',            
			title: \'\',			
			validate: function(value) {               
				if($.trim(value) == \'\')
					 return \'This field is required\';
}
		});

		
		
		
		//icheck radio/checkbox
		$(".icheck").iCheck({
			checkboxClass: \'icheckbox_square-blue\',
			radioClass: \'iradio_square-blue\'
		});
		
		$(\'input[name="publish_now"]\').on(\'ifChecked\', function (event) {		
			
				var now=\''; ?>
<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M")); ?>
<?php echo '\';
				$.get(\'/recruitment/get-current-datetime\',function(data){
					var dates = JSON.parse(data);
					$("#date_timepicker_start").val(dates.start_date);
					$("#date_timepicker_end").val(dates.end_date);
				});
				//$("#date_timepicker_start").val(now);
				$("#date_timepicker_start").prop(\'disabled\', true);
				//$("#date_timepicker_start").prop(\'disabled\', false);
		});	
		$(\'input[name="publish_now"]\').on(\'ifUnchecked\', function (event) {		
			$("#date_timepicker_start").prop(\'disabled\', false);
		});
		
		
		$(".loadtemplate").html(\'<p style="text-align:center;font-weight:bold">Quiz Not Found</p>\');		
	  
	  
	  $("#delivery_period").chosen({ allow_single_deselect:false,disable_search: true });	  
	  $("#volume_option_multi").chosen({  allow_single_deselect:false,disable_search: true });
	  
	  
		$(\'input[name="quiz"]\').on(\'ifChecked\', function(event){
			$("#create_quiz").modal(\'show\');
			$("#create_quiz").removeClass( "hide" ).addClass("in");
		});
	});

//recruiment brief upload		

$(function(){		

		var btnUpload=$(\'#uploadrecruitspec_chzn\');

		var status=$(\'#recruitment_spec_file_name\');		

	recruiment_ajax_upload = 	new AjaxUpload(btnUpload, {

			action: \'upload-recruitment-spec\',

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
					$("#uploadrecruitspec").val(fname[1]);
	}	
			},
			 debug: true
		 });
	});

//calculating remaining articles by changing the packs and files	
function fncalculateTotalRoyalties()
	{
	var volume=$("#volume").val().replace(",",".");
	var price_max=$("#price_max").val().replace(",",".");

	var num_hire_writers=$("#num_hire_writers").val();

	var total_royalties=(volume*price_max).toFixed(2);
	
	$(\'#total_royalty\').text(total_royalties);
	$(\'#total_hire_users\').text(num_hire_writers);
	
}	
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
				Create Recruitment | <?php echo $this->_tpl_vars['prod_step1']['title']; ?>

			</h3>
		</div>	
	</div>
	<div class="row-fluid">
		<div class="span9">
		<form class="form-horizontal"  action="/recruitment/save-prod1?contract_missionid=<?php echo $_GET['contract_missionid']; ?>
" method="POST" id="recruitment-prod-form1" enctype="multipart/form-data">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo/survey/mission_overview.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div class="mission-details">			
				<div class="prod-mission-product">Recruitment Set Up</div>
			</div>
			<div class="w-box">
				<div class="w-box-header">General Rules</div>
					<div class="w-box-content cnt_a">
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label">Recruitment type</label>
								<div class="controls">
									<div class="span6">										
										<label class="radio inline">
											<input type="radio" name="AOtype" class="icheck" checked="checked" value="public" <?php if ($this->_tpl_vars['prod_step1']['AOtype'] == 'public'): ?> checked<?php endif; ?>/> 
											Public
										</label>
										<label class="radio inline">
											<input type="radio" name="AOtype" class="icheck" value="private" <?php if ($this->_tpl_vars['prod_step1']['AOtype'] == 'private'): ?> checked<?php endif; ?>/> 
											Private
										</label>
									</div>
								</div>
							</div>							
							<div class="control-group">
								<label class="control-label">Contributor type</label>
								<div class="controls">
									<div class="controls span5">
											<label class="checkbox inline">
												<input id="writer_type_1" type="checkbox" <?php if (in_array ( 'sc' , $this->_tpl_vars['prod_step1']['view_to'] )): ?>checked <?php endif; ?> name="view_to[]" value="sc" class="icheck validate[minCheckbox[1]]" />SC
											</label>
											<label class="checkbox inline">
												<input id="writer_type_2" type="checkbox" <?php if (in_array ( 'jc' , $this->_tpl_vars['prod_step1']['view_to'] )): ?>checked <?php endif; ?> name="view_to[]" value="jc" class="icheck validate[minCheckbox[1]]" />JC
											</label>
											<label class="checkbox inline">
												<input id="writer_type_3" type="checkbox" <?php if (in_array ( 'jc0' , $this->_tpl_vars['prod_step1']['view_to'] )): ?>checked <?php endif; ?> name="view_to[]" value="jc0" class="icheck validate[minCheckbox[1]]" />JC0
											</label>
									</div>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Volume</label>
								<div class="controls">
									<div class="span4">
										<input type="text" class="span12 validate[required,custom[number]]" id="volume" value="<?php echo $this->_tpl_vars['prod_step1']['volume']; ?>
" name="volume" onkeyup="fncalculateTotalRoyalties();">
									</div>									
								</div>
							</div>							
														
							<div class="control-group">
								<label class="control-label"># of contributeurs needed</label>
								<div class="controls">
									<div class="span4">
										<input type="text" class="span12 validate[required,custom[integer],minWriters[1]]" id="num_hire_writers" value="<?php echo $this->_tpl_vars['prod_step1']['num_hire_writers']; ?>
" name="num_hire_writers" onkeyup="fncalculateTotalRoyalties();">
									</div>
								</div>
							</div>		
							<div class="control-group">
								<label class="control-label"># of max participants</label>
								<div class="controls">
									<div class="span4">
										<input type="text" class="span12 validate[required,custom[integer],minWriters[1]]" id="total_article" value="<?php echo $this->_tpl_vars['prod_step1']['total_article']; ?>
" name="total_article" <?php if ($this->_tpl_vars['user_type'] != 'superadmin'): ?> readonly<?php endif; ?>>
									</div>
								</div>
						</div>	
						</div>	
					</div>
			</div>
			<div class="w-box">
				<div class="w-box-header">Setup the front page</div>
				<div class="w-box-content cnt_a">
					<div class="row-fluid">
						<div class="span8">
							<div class="control-group">								
								<h3 class="heading">									
								<i style="margin:5px;cursor:pointer" id="edit_dname" class="splashy-pencil"></i><a data-original-title="" data-placeholder="Required" data-placement="right" data-pk="1" data-type="text" style="margin-right:5px" id="recruitment_name" href="#"><?php echo $this->_tpl_vars['prod_step1']['title']; ?>
</a>								
								</h3>							
							</div>
							<div class="control-group">
								<label class="control-label">Participation timing</label>
								<div class="controls">
									<div class="span5">
										<div class="input-append date" id="">
											<input class="span10 validate[required]" value="<?php echo $this->_tpl_vars['prod_step1']['count_down_start']; ?>
" type="text" name="count_down_start" <?php if ($this->_tpl_vars['prod_step1']['publish_now'] == 'yes'): ?> disabled <?php endif; ?> id="date_timepicker_start" /><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
										</div>										
										<span class="help-block">Daterange - date start</span>
									</div>
									<div class="span1" style="margin-left: -4%">
										<label class="checkbox inline">
											<input class="icheck" type="checkbox" value="yes" name="publish_now" <?php if ($this->_tpl_vars['prod_step1']['publish_now'] == 'yes'): ?>checked<?php endif; ?> id="publish_now">NOW
										</label>
									</div>
									<div class="span5 controls" style="margin-left:60px;">
										<div class="input-append date" id="">
											<input class="span10 validate[required]" value="<?php echo $this->_tpl_vars['prod_step1']['count_down_end']; ?>
" name="count_down_end" autocomplete="off" type="text" id="date_timepicker_end" /><span class="add-on"><i class="splashy-calendar_day_down"></i></span>
										</div>
										<span class="help-block">Daterange - date end</span>
									</div>
								</div>
							</div>																				
						<div class="control-group">
							<div class="media mission-comment">
							<a class="pull-left imgframe">
								<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
							</a>
							<div class="media-body">														
								<textarea name="editorial_chief_review" placeholder="Merci de d&eacute;tailler ici  tout &eacute;l&eacute;ment de pr&eacute;cision sur la mission&nbsp;" class="span12 pop_over" id="editorial_chief_review" data-placement="right" data-content="Examples: The writing hours for news articles, the number of product descriptions received each week, the photo shooting seasonality, spent time to write down an article for blog or seo contents…etc "><?php echo ((is_array($_tmp=$this->_tpl_vars['prod_step1']['editorial_chief_review'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea>
							</div>												
						</div>
						</div>
						<div class="row-fluid">
							<div class="control-group">
								<div id="uploadrecruitspec_chzn" class="span4">
									<span class="btn btn-file">
										<span class="fileupload-new"><i class="icon-upload"></i> Upload the brief</span>
										<input style="display:none" type="file" class="" name="file" value="<?php echo $this->_tpl_vars['prod_step1']['recruitment_spec_file_name']; ?>
">
									</span>
									<input type="hidden" class="" id="uploadrecruitspec" value="<?php echo $this->_tpl_vars['prod_step1']['recruitment_spec_file_name']; ?>
">
									<div id="recruitment_spec_file_name"><?php echo $this->_tpl_vars['prod_step1']['recruitment_spec_file_name']; ?>
</div>
								</div>
							</div>
						</div>
							<div class="row-fluid">
								<div class="span8">
									<h5>ABOUT THE ROYALTIES</h5><br>									
									<b><span id="total_royalty"><?php echo $this->_tpl_vars['prod_step1']['total_royalties']; ?>
</span> &<?php echo $this->_tpl_vars['quoteMission']['currency']; ?>
;</b> of royalties to be shared between <b><span id="total_hire_users"><?php echo $this->_tpl_vars['prod_step1']['num_hire_writers']; ?>
</span></b> writers.
								</div>
								<div class="span4">
									<h5>DURATION</h5><br>
									<b><?php echo $this->_tpl_vars['prod_step1']['delivery_time_frame']; ?>
 <?php if ($this->_tpl_vars['prod_step1']['delivery_period'] == 'days'): ?> Days <?php else: ?> <?php echo $this->_tpl_vars['prod_step1']['delivery_period']; ?>
 <?php endif; ?></b>
								</div>
							</div>						
						</div>
						<div class="span4 followup-aside">
							<aside>
								<div class="control-group">
									<h3>Costs and volume</h3>
								</div>	
								<div class="control-group">	
									<label>Cost per article (&<?php echo $this->_tpl_vars['quoteMission']['currency']; ?>
;) </lable>
								</div>
								<div class="control-group">
									<div class="span5">
										<input type="text" class="span12  validate[required,priceRange[#price_max],max[<?php echo $this->_tpl_vars['prod_step1']['price_max_valid']; ?>
]]" id="price_min" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['prod_step1']['price_min'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" name="price_min">
									</div>
									<div class="span5">
										<input type="text" class="span12  validate[required,max[<?php echo $this->_tpl_vars['prod_step1']['price_max_valid']; ?>
]]" id="price_max" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['prod_step1']['price_max'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" name="price_max" onkeyup="fncalculateTotalRoyalties();">
									</div>									
								</div>
								<div class="control-group">	
									<label>Max articles per writer per week</lable>
								</div>
								<div class="control-group">																		
									<div class="span5">
										<input type="text" class="span12 validate[required,custom[integer],maxWriters[<?php echo $this->_tpl_vars['prod_step1']['max_articles_per_contrib_valid']; ?>
]]" id="max_articles_per_contrib" value="<?php echo $this->_tpl_vars['prod_step1']['max_articles_per_contrib']; ?>
" name="max_articles_per_contrib">
									</div>
								</div>							
							</aside>	
						</div>
					</div>
				</div>
			</div>
			<div class="w-box" id="quiz_block">
				<div class="w-box-header">Let's Play (OPTIONAL)</div>
					<div class="w-box-content cnt_a">
						<div class="row-fluid">				
										
																<?php if ($this->_tpl_vars['update_quiz'] == 'yes'): ?>
								<div id="editquiz">
									<h4><?php echo $this->_tpl_vars['quiz_title']; ?>
 &nbsp;&nbsp;&nbsp;<?php if ($this->_tpl_vars['quiz_status']): ?><span class="label label-success">active</span><?php else: ?><span class="label label-important">not active</span><?php endif; ?></h4>
									<p>Duration: <?php echo $this->_tpl_vars['quiz_duration']; ?>
 Mins</p>
							</div>
									<a href="/recruitment/get-quiz?cmid=<?php echo $_GET['contract_missionid']; ?>
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
			</div>
			<div class="w-box">
				<div class="w-box-header">Test Article</div>
					<div class="w-box-content cnt_a">
						<div class="row-fluid">				
							<div class="control-group">
								<label class="control-label">Create a test article </label>
								<div class="controls">
									<div class="span6">										
										<label class="radio inline">
											<input type="radio" disabled name="test_article" class="icheck" checked="checked" value="yes" <?php if ($this->_tpl_vars['prod_step1']['test_article'] == 'yes'): ?> checked<?php endif; ?>/> 
											Yes
										</label>
										<label class="radio inline">
											<input type="radio" disabled name="test_article" class="icheck" value="no" <?php if ($this->_tpl_vars['prod_step1']['test_article'] == 'no'): ?> checked<?php endif; ?>/> 
											No
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="control-group topset2">
				<div class="pull-center">
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
	<div class="modal container hide fade" id="create_quiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button class="close" data-dismiss="modal" >&times;</button>
			<h3>Link Quiz
			 	<a href="/recruitment/create-quiz-step1?cmid=<?php echo $_GET['contract_missionid']; ?>
" data-toggle="modal" role="button" data-target="#recruitment_create_quiz" class="btn btn-info">Create Quiz</a>
			 </h3>
		</div>
		<div class="modal-body modal-body1">
			
		</div>
		<div class="modal-footer">
		</div>
	</div>


	<div class="modal container hide fade" id="recruitment_create_quiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button class="close" data-dismiss="modal" >&times;</button>
			<h3>Create Quiz</h3>
		</div>
		<div class="modal-body  modal-body1">
			
		</div>
		
		<div class="modal-footer">
		
		</div>
	</div>