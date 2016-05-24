<?php /* Smarty version 2.6.19, created on 2015-08-19 08:33:03
         compiled from gebo/recruitment/recruitment-create-quiz-step2.phtml */ ?>
<?php echo '
<style>.quizzAns{ float: left; padding: 5px 0; text-align: left; width: 100%;}</style>
    <script>
    $(document).ready(function() {  
		//icheck radio/checkbox
		$(".icheck").iCheck({
			checkboxClass: \'icheckbox_square-blue\',
			radioClass: \'iradio_square-blue\'
		});

		$("#recruitment_quiz_step2").validationEngine({prettySelect : true,useSuffix: "_chzn"});

		$("#quiz-create-step2").live(\'click\',function(){

			if($("#recruitment_quiz_step2").validationEngine(\'validate\'))
			{
				$.post("/recruitment/save-quiz-step2",$("#recruitment_quiz_step2").serialize(),function(data){		
					//alert(data);						
					$(\'#recruitment_create_quiz .modal-body\').html(\'\');
					$("#recruitment_create_quiz").modal(\'hide\');
					$(".modal-backdrop").remove();	

					var cmid=\''; ?>
<?php echo $this->_tpl_vars['qz_step1']['cmid']; ?>
<?php echo '\';
					var href = \'/recruitment/get-quiz?cmid=\'+cmid;
					//alert(href);
					$("#create_quiz").removeData(\'modal\');
					$(\'#create_quiz .modal-body\').load(href);
					$("#create_quiz").modal();	
					$(".createquiz").text(\'Update Quiz\');		
		        });
			}

		});


	});

    function quizz_step1()
    {        
		var href = \'/recruitment/create-quiz-step1\';
		$("#recruitment_create_quiz").removeData(\'modal\');
		$(\'#recruitment_create_quiz .modal-body\').load(href);
		$("#recruitment_create_quiz").modal();
		$(".modal-backdrop:gt(0)").remove();
    }

    </script>
	
	<style>
		input {text-transform:none !important;} 
	</style>
'; ?>


<form id="recruitment_quiz_step2">
  <div class="row-fluid">
	<div class="span12">
    	<h3 class="heading">Title of Quizz : <?php echo $this->_tpl_vars['qz_step1']['quizztitle']; ?>
</h3>
		<table align="center" cellpadding="4" cellspacing="4" width="70%">
			<tr>
				<td colspan="2">Please click on the right answer for each question below</td></tr>
	            <?php if ($this->_tpl_vars['qz_step1']['quest_count'] > 0): ?>
	                <?php $this->assign('i', 0); ?>
					<?php while ($this->_tpl_vars['i'] < $this->_tpl_vars['qz_step1']['quest_count']) { ?>
						<?php $this->assign('qns', "qn".($this->_tpl_vars['i'])); ?>
						<?php $this->assign('qnid', "qnid".($this->_tpl_vars['i'])); ?>
						<?php $this->assign('ans1', "an0".($this->_tpl_vars['i'])); ?>
						<?php $this->assign('ans2', "an1".($this->_tpl_vars['i'])); ?>
						<?php $this->assign('ans3', "an2".($this->_tpl_vars['i'])); ?>
						<?php $this->assign('ans4', "an3".($this->_tpl_vars['i'])); ?>
						<?php $this->assign('rans', "r_an".($this->_tpl_vars['i'])); ?>
						<tr id="tr1<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['qnid']]; ?>
">
							<td valign="top">Q<?php echo $this->_tpl_vars['i']+1; ?>
:</td>
							<td><input type="text" name="qn<?php echo $this->_tpl_vars['i']; ?>
" id="qn<?php echo $this->_tpl_vars['i']; ?>
" class="span9 validate[required]" value="<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['qns']]; ?>
"/>
							</td>
						</tr>
						<tr id="tr2<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['qnid']]; ?>
">
							<td></td>
							<td valign="top">&nbsp;
								<span class="quizzAns">
									<span style="float:left">A1:&nbsp;&nbsp;
										<input type="text" name="an<?php echo $this->_tpl_vars['i']; ?>
0" id="an<?php echo $this->_tpl_vars['i']; ?>
0" class="<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['ans1']]; ?>
 validate[required]"/>
									</span>
									<label class="radio inline">
										<input type="radio" name="r_an<?php echo $this->_tpl_vars['i']; ?>
" value="1" class="icheck validate[required]"/>
									</label>
									<span id="an<?php echo $this->_tpl_vars['i']; ?>
_span" style="padding:5px;"></span>
								</span><br />
								<span class="quizzAns">
									<span style="float:left">A2:&nbsp;&nbsp;
										<input type="text" name="an<?php echo $this->_tpl_vars['i']; ?>
1" id="an<?php echo $this->_tpl_vars['i']; ?>
1" class="validate[required]"/>
									</span>
									<label class="radio inline">
										<input type="radio" name="r_an<?php echo $this->_tpl_vars['i']; ?>
" value="2"  class="icheck validate[required]"/>
									</label>	
								</span><br />
								<span class="quizzAns">
									<span style="float:left">A3:&nbsp;&nbsp;
										<input type="text" name="an<?php echo $this->_tpl_vars['i']; ?>
2" id="an<?php echo $this->_tpl_vars['i']; ?>
2" class="validate[required]"/>
									</span>
									<label class="radio inline">
										<input type="radio" name="r_an<?php echo $this->_tpl_vars['i']; ?>
" value="3" class="icheck validate[required]"/>
									</label>
								</span><br />
								<span class="quizzAns">
									<span style="float:left">A4:&nbsp;&nbsp;
										<input type="text" name="an<?php echo $this->_tpl_vars['i']; ?>
3" id="an<?php echo $this->_tpl_vars['i']; ?>
3" class="validate[required]" />
									</span>
									<label class="radio inline">
										<input type="radio" name="r_an<?php echo $this->_tpl_vars['i']; ?>
" value="4" class="icheck validate[required]"/>
									</label>
								</span>
							</td>
						</tr>
						<tr id="tr3<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['qnid']]; ?>
"><td colspan="2"><hr></td></tr>
		                <?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
					<?php } ?>
          	 	<?php endif; ?>
          	 	<tr>
          	 		<td colspan="2">
          	 			<button type="button" class="btn btn-primary" onclick="return quizz_step1();">BACK</button>
						<button class="btn" data-dismiss="modal">CANCEL</button>			
						<button type="button" id="quiz-create-step2" class="btn btn-primary">CREATE QUIZ</button>
          	 		</td>
          	 	</tr>
		</table>		
	</div>
</div>
</form>