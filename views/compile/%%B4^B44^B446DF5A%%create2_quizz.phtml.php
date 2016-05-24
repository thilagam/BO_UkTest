<?php /* Smarty version 2.6.19, created on 2016-03-18 08:03:01
         compiled from gebo/quizz/create2_quizz.phtml */ ?>
<?php echo '
<style>.quizzAns{ float: left; padding: 5px 0; text-align: left; width: 100%;}</style>
    <script>
    $(document).ready(function() {  
	 $(".uni_style").uniform(); 
	});
	
	function validate_bo_quizzstep2()
    {
        var errcount=0;
'; ?>

    <?php if ($this->_tpl_vars['quest_count'] > 0): ?>
                <?php $this->assign('i', 0); ?>
        <?php while ($this->_tpl_vars['i'] < $this->_tpl_vars['quest_count']) { ?>
<?php echo '
            var quizzqn=$("#qn'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo '").val();
            var quizzan0=$("#an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
0<?php echo '").val();
            var quizzan1=$("#an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
1<?php echo '").val();
            var quizzan2=$("#an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
2<?php echo '").val();
            var quizzan3=$("#an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
3<?php echo '").val();
            var quizzr_an=$(\'input:radio[name=r_an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo ']:checked\').val();
            if(quizzqn.trim()==\'\')
            {
                //$("#qn'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo '_span").html(\'<img src="/BO/theme/gebo/img/RedX.gif" />\');
                $("#qn'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo '").css("border-color","red")
                errcount++;
            }
            else
            {
               // $("#qn'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo '_span").html(\'<img src="/BO/theme/gebo/img/Green_Check_Mark.png" />\');
                $("#qn'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo '").css("border-color","")
            }
            if( (quizzan0.trim()==\'\') || (quizzan1.trim()==\'\') || (quizzan2.trim()==\'\') || (quizzan3.trim()==\'\') || !quizzr_an )
            {
                $("#an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo '_span").html(\'<img src="/BO/theme/gebo/img/RedX.gif" />\');                    
                errcount++;
            }
            else
            {
                $("#an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo '_span").html(\'<img src="/BO/theme/gebo/img/Green_Check_Mark.png" />\');
            }
'; ?>

                <?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
        <?php } ?>
    <?php endif; ?>
<?php echo '
            if(errcount>0)
            {
                return false;
            }
    }

    function quizz_step1()
    {
        window.location=\'/quizz/createquizz?submenuId=ML2-SL21\';
        return false;
    }
    
    function clearText()
    {

'; ?>

    <?php if ($this->_tpl_vars['quest_count'] > 0): ?>
                <?php $this->assign('i', 0); ?>
        <?php while ($this->_tpl_vars['i'] < $this->_tpl_vars['quest_count']) { ?>
<?php echo '
            $("#qn'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo '").val(\'\');
            $("#an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
0<?php echo '").val(\'\');
            $("#an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
1<?php echo '").val(\'\');
            $("#an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
2<?php echo '").val(\'\');
            $("#an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
3<?php echo '").val(\'\');
            $(\'input:radio[name=r_an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo ']:checked\').removeAttr("checked");
'; ?>

                <?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
        <?php } ?>
    <?php endif; ?>
<?php echo '
        return false ;
    }
    
    </script>
	
	<style>
		input {text-transform:none !important;} 
	</style>
'; ?>


<form action="/quizz/create2quizz?submenuId=ML2-SL21" name="bo_quizzstep2_form" method="post" enctype="multipart/form-data"  onSubmit="return validate_bo_quizzstep2();" >
  <div class="row-fluid">
	<div class="span12">
    	<h3 class="heading">Title of Quiz : <?php echo $this->_tpl_vars['questtitle']; ?>
</h3>
		<table align="center" cellpadding="4" cellspacing="4" width="78%">
			<tr><td colspan="2">Thank you! click on the "right answer" for each question below</td></tr>
                    <?php if ($this->_tpl_vars['quest_count'] > 0): ?>
                            <?php $this->assign('i', 0); ?>
				<?php while ($this->_tpl_vars['i'] < $this->_tpl_vars['quest_count']) { ?>
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
" class="span9" value="<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['qns']]; ?>
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
" value="" />
						</span>
						<label class="uni-radio">
							<input type="radio" name="r_an<?php echo $this->_tpl_vars['i']; ?>
" value="1" class="uni_style"/>
						</label>
						<span id="an<?php echo $this->_tpl_vars['i']; ?>
_span" style="padding:5px;"></span>
					</span><br />
					<span class="quizzAns">
						<span style="float:left">A2:&nbsp;&nbsp;
							<input type="text" name="an<?php echo $this->_tpl_vars['i']; ?>
1" id="an<?php echo $this->_tpl_vars['i']; ?>
1" value=""/>
						</span>
						<label class="uni-radio">
							<input type="radio" name="r_an<?php echo $this->_tpl_vars['i']; ?>
" value="2"  class="uni_style"/>
						</label>	
					</span><br />
					<span class="quizzAns">
						<span style="float:left">A3:&nbsp;&nbsp;
							<input type="text" name="an<?php echo $this->_tpl_vars['i']; ?>
2" id="an<?php echo $this->_tpl_vars['i']; ?>
2" value=""/>
						</span>
						<label class="uni-radio">
							<input type="radio" name="r_an<?php echo $this->_tpl_vars['i']; ?>
" value="3" class="uni_style"/>
						</label>
					</span><br />
					<span class="quizzAns">
						<span style="float:left">A4:&nbsp;&nbsp;
							<input type="text" name="an<?php echo $this->_tpl_vars['i']; ?>
3" id="an<?php echo $this->_tpl_vars['i']; ?>
3" value="" />
						</span>
						<label class="uni-radio">
							<input type="radio" name="r_an<?php echo $this->_tpl_vars['i']; ?>
" value="4" class="uni_style"/>
						</label>
					</span>
				</td>
			</tr>
			<tr id="tr3<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['qnid']]; ?>
"><td colspan="2"><hr></td></tr>
                            <?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
				<?php } ?>
            <?php endif; ?>
		</table>
		<div align="right" style="padding-right:150px;padding-top:50px">
			<input type="button" value="CANCEL" class="btn btn-info" onClick="return clearText()" />
			<input type="button" value="BACK" class="btn btn-info" onclick="return quizz_step1();" />
			<input type="submit" value="CREATE QUIZZ" class="btn btn-info" />
		</div>
	</div>
</div>
</form>