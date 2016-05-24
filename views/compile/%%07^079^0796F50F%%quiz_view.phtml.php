<?php /* Smarty version 2.6.19, created on 2015-09-10 09:51:18
         compiled from gebo/recruitment/quiz_view.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/recruitment/quiz_view.phtml', 7, false),array('modifier', 'utf8_encode', 'gebo/recruitment/quiz_view.phtml', 7, false),)), $this); ?>
<form class=""  action="#" method="POST" id="quizvalidate" enctype="multipart/form-data">
		<section>
			<div class="control-group">
				<div class="row-fluid">
				<div class="span3">
					<label>Category</label>
						<?php echo smarty_function_html_options(array('name' => 'quiz_cat','id' => 'quiz_cat','options' => ((is_array($_tmp=$this->_tpl_vars['Contrib_cats'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)),'selected' => $this->_tpl_vars['quiz_cat'],'class' => "validate[required]",'onChange' => "updatequizlist(0);"), $this);?>

				</div>
				<div class="span3">
					<label>Quiz Name</label>
					<div class="quizlist">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['quiz_list'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

					</div>
				</div>
				<div class="span3">
					<label>Minimum good answer</label>
					<input type="text" class="validate[required] span8" id="min_good_answer" value="<?php echo $this->_tpl_vars['mini_good_answer']; ?>
" name="min_good_answer">	
				</div>
				<div class="span3" style="margin-left:0px">
					<label>Quiz Duration</label>
					<input type="text" class="validate[required] span8" id="quiz_duration" value="<?php echo $this->_tpl_vars['quiz_duration']; ?>
" name="quiz_duration">	Mins	
				</div>
				</div>
			</div>
			
			<div class="w-box">
				<div class="w-box-header">Quiz Questions</div>
				<div class="w-box-content cnt_a">
					<div class="row-fluid loadtemplate">
						<?php if ($this->_tpl_vars['quiz_id']): ?>
												<ul class="bxslider">
						  <?php $_from = $this->_tpl_vars['qns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['questions'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['questions']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['qn_id'] => $this->_tpl_vars['qns']):
        $this->_foreach['questions']['iteration']++;
?>  
							  <li>
								<p><strong><?php echo $this->_foreach['questions']['iteration']; ?>
. <?php echo ((is_array($_tmp=$this->_tpl_vars['qns'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</strong><span class="pull-right">Question <?php echo $this->_foreach['questions']['iteration']; ?>
/<?php echo $this->_foreach['questions']['total']; ?>
</span></p>
								<?php $_from = $this->_tpl_vars['ans'][$this->_tpl_vars['qn_id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['question_options'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['question_options']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['qn_optn'] => $this->_tpl_vars['question_optn']):
        $this->_foreach['question_options']['iteration']++;
?>
									<p class="offsetleft <?php if ($this->_tpl_vars['question_optn']['ans_id'] == $this->_tpl_vars['question_optn']['r_ans_id']): ?> correct <?php endif; ?>"><?php echo $this->_tpl_vars['nums'][($this->_foreach['question_options']['iteration']-1)]; ?>
.&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['question_optn']['option'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</p>			
								<?php endforeach; endif; unset($_from); ?>
							  </li>
						  <?php endforeach; endif; unset($_from); ?>
						</ul>
						<?php else: ?>
						<p style="text-align:center;font-weight:bold">Quiz Not Found</p>
					<?php endif; ?>
					</div>
				</div>
			</div>
			<input type="hidden" name="quiz_status" id="quiz_status" value="<?php echo $this->_tpl_vars['quiz_status']; ?>
" />
			<div class="control-group topset2">
				<div class="controls pull-center">
					<button class="btn" data-dismiss="modal" onclick="return removeQuiz()">Cancel</button>
					<button class="btn btn-primary" type="submit">Validate</button>
					<?php if ($this->_tpl_vars['unlink']): ?>
					<button class="btn btn-primary" id="unlinkquiz" type="button">Unlink Quiz</button>
					<?php endif; ?>
				</div>
			</div>
		</section>
</form>	
<?php echo '
<script>
	$("#quiz_cat").chosen({ allow_single_deselect:false,disable_search: true });
	$("#quiz").chosen({ allow_single_deselect:false,disable_search: true });
	$(\'.bxslider\').bxSlider({
			infiniteLoop: false,
			hideControlOnEnd: true,
			pager:false
		});
	
$(document).ready(function(){	
		var cat = "", quiz = "", min_good = "", quiz_dur = "";
		// Quiz Validation
		$(\'#min_good_answer,#quiz_duration,.quiz_chznformError\').attr(\'data-prompt-position\',\'topLeft\');
		$(\'#min_good_answer,#quiz_duration,.quiz_chznformError\').data(\'promptPosition\',\'topLeft\');
		$("#quizvalidate").validationEngine({prettySelect : true,useSuffix: "_chzn",onValidationComplete: function(form, status){
			if(status==true)
			{
				quiz = $(\'#quiz\').val();
				cat = $("#quiz_cat").val();
				quiz_dur = $("#quiz_duration").val();
				min_good = $("#min_good_answer").val();
				var formdata = new FormData();
				var other_data = $(\'#quizvalidate\').serializeArray();
				$.each(other_data,function(key,input){
					formdata.append(input.name,input.value);
				});
				
				$.ajax({
					url:\'/recruitment/set-quiz-data/\',
					data: formdata,
					async:false,
					type:\'POST\',
					contentType: false,
					processData: false,
					success:function(data)
					{
						
					}
				});
				$(".createquiz").text(\'Edit\');
				if($("#quiz_status").val())
					status = \'<span class="label label-success">active</span>\';
				else
					status = \'<span class="label label-important">not active</span>\';
				var editquiz = \'<h4>\'+$(\'#quiz_chzn .chzn-single\').text()+\' &nbsp;&nbsp;&nbsp;\'+status+\'</h4><p>Duration: \'+$("#quiz_duration").val()+\' Mins</p>\';
				$("#create_quiz").modal(\'hide\');
				$("#editquiz").html(editquiz);
				$("#editquiz").css("display","block");
				$(".createquiz").removeClass(\'btn-info\');
			}
		}});
	});

	function removeQuiz()
	{
		$("#hidden_quiz").val(0);
	}
	
	function loadquiz()
	{
		var quiz_id = $("#quiz").val();
		$(".loadtemplate").html(\'<p style="text-align:center;font-weight:bold">Please wait loading quiz ... </p>\');
		if(quiz_id)
		{
			$.post(\'/recruitment/loadquiz/\',{"quiz_id":quiz_id},function(html){
			$(".loadtemplate").html(html);
			});
		}
		else
		{
			$(".loadtemplate").html(\'<p style="text-align:center;font-weight:bold">Quiz Not Found</p>\');
		}
	}
	
	function updatequizlist(parameter)
	{
		var qcat=$("#quiz_cat").val();
		if(qcat)
		{
			$.post(\'/recruitment/getquizlist/\',{"category":qcat},function(html){
				$(".quizlist").html(html);
				$("#quiz").chosen({ disable_search: true });
				$(".loadtemplate").html(\'<p style="text-align:center;font-weight:bold">Quiz Not Found</p>\');
			});
		}
	}
		
	/* To Unlink Quiz */
	$(document).on(\'click\',"#unlinkquiz",function(){
		$.post(\'/recruitment/unlink-quiz\',{"rid":\'\'},function(result){
			$("#create_quiz").modal(\'hide\');
			$("#quizvalidate")[0].reset();
			$("#quiz").val(\'\');
			$("#quiz").trigger("liszt:updated");
			//$("#quiz_chzn .chzn-single span").text(\'Select\');
			$(".loadtemplate").html(\'<p style="text-align:center;font-weight:bold">Quiz Not Found</p>\');
			$("#unlinkquiz, #editquiz").css(\'display\',\'none\');
			$(".createquiz").text(\'Create Quiz\');
			$(".createquiz").addClass(\'btn-info\');
			$.sticky("Unlinked Quiz Successfully", {autoclose : 10000, position: "top-center", type: \'st-success\' });
		});
	});		
	
</script>
'; ?>