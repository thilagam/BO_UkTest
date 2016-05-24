<?php /* Smarty version 2.6.19, created on 2015-08-11 14:04:54
         compiled from gebo/recruitment/recruitment-create-quiz-step1.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/recruitment/recruitment-create-quiz-step1.phtml', 47, false),)), $this); ?>
<?php echo '
<script>
    $(document).ready(function() {

    	$("#recruitment_quiz_step1").validationEngine({prettySelect : true,useSuffix: "_chzn"});

		$("#category_quiz").chosen({ disable_search: true });	
		$("#status_quiz").chosen({ disable_search: true });	


		$("#quiz-create-step1").live(\'click\',function(){

			if($("#recruitment_quiz_step1").validationEngine(\'validate\'))
			{
				var cmid=\''; ?>
<?php echo $this->_tpl_vars['qz_step1']['cmid']; ?>
<?php echo '\';

				$.post("/recruitment/save-quiz-step1?cmid="+cmid,$("#recruitment_quiz_step1").serialize(),function(data){            
					
					var href = \'/recruitment/create-quiz-step2\';
					$("#recruitment_create_quiz").removeData(\'modal\');
					$(\'#recruitment_create_quiz .modal-body\').load(href);
					$("#recruitment_create_quiz").modal();
					$(".modal-backdrop:gt(0)").remove();
		        });	
			}

		});
	});	
</script>
<style>
	input {text-transform:none !important;}
</style>
'; ?>


<form id="recruitment_quiz_step1">
<input type="hidden" name="cmid" value="<?php echo $this->_tpl_vars['qz_step1']['cmid']; ?>
">
 <div class="row-fluid">
	<div class="span12">
    	<h3 class="heading">QUIZ CREATION PAGE</h3>
		<table align="center" cellpadding="4" cellspacing="4" width="50%">
			<tr>
				<td>Quiz title</td>
				<td><input type="text" class="validate[required]" name="quizztitle" id="quizztitle" value="<?php echo $this->_tpl_vars['qz_step1']['quizztitle']; ?>
"/></td>
			</tr>   
			<tr>
				<td>Catagory</td>
				<td><?php echo smarty_function_html_options(array('name' => 'category','class' => "validate[required]",'id' => 'category_quiz','options' => $this->_tpl_vars['categories'],'selected' => $this->_tpl_vars['qz_step1']['category']), $this);?>
</td>
			</tr>   
			<tr>
				<td>Quiz status</td>
				<td>
					<select name="status" id="status_quiz" class="validate[required]">
						<option value="1">Active</option>
						<option value="2" <?php if ($this->_tpl_vars['qz_step1']['status'] == '2'): ?>selected<?php endif; ?>>Inactive</option>
					</select>
				</td>
			</tr>   
			<tr>
				<td>Number of questions</td>
				<td><input type="text" name="quest_count" id="quest_count" value="<?php echo $this->_tpl_vars['qz_step1']['quest_count']; ?>
" class="span4 validate[required,custom[integer]]"/></td>
			</tr>   
			<tr>
				<td>Number of correct answers min</td>
				<td><input type="text" name="correct_ans_count" id="correct_ans_count" value="<?php echo $this->_tpl_vars['qz_step1']['correct_ans_count']; ?>
" class="span4 validate[required,custom[integer]]"/></td>
			</tr>   
			<tr>
				<td>Duration of quiz</td>
				<td><input type="text" name="setuptime" id="setuptime" value="<?php echo $this->_tpl_vars['qz_step1']['setuptime']; ?>
" class="span4 validate[required,custom[integer]]"/> minutes</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button class="btn" data-dismiss="modal">CANCEL</button>
					<button class="btn btn-primary" id="quiz-create-step1" type="button">NEXT STEP</button>				
				</td>
			</tr>
		</table>		
	</div>
  </div>	
</form>