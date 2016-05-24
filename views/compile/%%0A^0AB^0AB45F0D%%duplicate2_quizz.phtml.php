<?php /* Smarty version 2.6.19, created on 2013-11-11 07:53:39
         compiled from gebo/quizz/duplicate2_quizz.phtml */ ?>
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

    <?php if ($this->_tpl_vars['quest_count_step1'] > 0): ?>
                <?php $this->assign('i', 0); ?>
        <?php while ($this->_tpl_vars['i'] < $this->_tpl_vars['quest_count_step1']) { ?>
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
                $("#qn'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo '").css("border-color","red")				
                errcount++;
            }
            else
            {
                 $("#qn'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo '").css("border-color","")
            }
            if( (quizzan0.trim()==\'\') || (quizzan1.trim()==\'\') || (quizzan2.trim()==\'\') || (quizzan3.trim()==\'\') || !quizzr_an )
            {
                $("#an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo '_span").html(\'<img src="/FO/images/RedX.gif" />\');                    
                errcount++;
            }
            else
            {
                $("#an'; ?>
<?php echo $this->_tpl_vars['i']; ?>
<?php echo '_span").html(\'<img src="/FO/images/Green_Check_Mark.png" />\');
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
        window.location=\'/quizz/duplicatequizz?submenuId=ML2-SL22&mod=1'; ?>
<?php echo '&id='.$_REQUEST['id']; ?><?php echo '\';
        return false;
    }
    
    function clearText()
    {
'; ?>

    <?php if ($this->_tpl_vars['quest_count_step1'] > 0): ?>
                <?php $this->assign('i', 0); ?>
        <?php while ($this->_tpl_vars['i'] < $this->_tpl_vars['quest_count_step1']) { ?>
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
    function delquest(id)
    {
        var quest_count =   '; ?>
<?php echo $this->_tpl_vars['quest_count']; ?>
<?php echo ' ;
        var qns =   $(\'.qn\').length ;
        //alert(\'quest_count=\'+quest_count+\'qns=\'+qns);
        if( quest_count >= qns )
        {
            alert(\'Sorry, Question count entered in step1 is \'+quest_count) ;
        }   else    {
            var con = confirm(\'Do you really want to delete this question?\') ;
            if(con)
            {
                $.post("/quizz/delquestion?id="+id,function(data,status){
                    alert("Deleted the question!!!");
                    $(\'#tr1\'+id).html(\'\') ;
                    $(\'#tr2\'+id).html(\'\') ;
                    $(\'#tr3\'+id).html(\'\') ;
                    $(\'#tr1\'+id).hide() ;
                    $(\'#tr2\'+id).hide() ;
                    $(\'#tr3\'+id).hide() ;
                  });
              }
        }
    }

    </script>
	<style>
		input {text-transform:none !important;} 
	</style>
'; ?>


<form action="/quizz/duplicate2quizz?submenuId=ML2-SL22<?php echo '&id='.$_REQUEST['id']; ?>" name="bo_quizzstep2_form" method="post" enctype="multipart/form-data"  onSubmit="return validate_bo_quizzstep2();" >
  <div class="row-fluid">
	<div class="span12">
    	<h3 class="heading">Titre du Quizz : <?php echo $this->_tpl_vars['questtitle']; ?>
</h3>
		<table align="center" cellpadding="4" cellspacing="4" width="78%">
			<tr><td colspan="2">Merci de cliquer sur la "bonne r&#233;ponse" pour chaque question ci-dessous</td></tr>
							<?php if ($this->_tpl_vars['quest_count_step1'] > 0): ?>
									<?php $this->assign('i', 0); ?>
			<?php while ($this->_tpl_vars['i'] < $this->_tpl_vars['quest_count_step1']) { ?>
					<?php $this->assign('qns', "qn".($this->_tpl_vars['i'])); ?>
					<?php $this->assign('qnid', "qnid".($this->_tpl_vars['i'])); ?>
					<?php $this->assign('ans1', "an0".($this->_tpl_vars['i'])); ?>
					<?php $this->assign('ans2', "an1".($this->_tpl_vars['i'])); ?>
					<?php $this->assign('ans3', "an2".($this->_tpl_vars['i'])); ?>
					<?php $this->assign('ans4', "an3".($this->_tpl_vars['i'])); ?>
					<?php $this->assign('rans', "r_an".($this->_tpl_vars['i'])); ?>
					<?php $this->assign('ansid1', "ansid0".($this->_tpl_vars['i'])); ?>
					<?php $this->assign('ansid2', "ansid1".($this->_tpl_vars['i'])); ?>
					<?php $this->assign('ansid3', "ansid2".($this->_tpl_vars['i'])); ?>
					<?php $this->assign('ansid4', "ansid3".($this->_tpl_vars['i'])); ?>
			<tr id="tr1<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['qnid']]; ?>
">
				<td valign="top">Q<?php echo $this->_tpl_vars['i']+1; ?>
:</td>
				<td><input type="text" name="qn<?php echo $this->_tpl_vars['i']; ?>
" id="qn<?php echo $this->_tpl_vars['i']; ?>
" class="span9" value="<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['qns']]; ?>
"/><input type="hidden" name="qstid<?php echo $this->_tpl_vars['i']; ?>
" value="<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['qnid']]; ?>
" />
				</td>
			</tr>
			<tr id="tr2<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['qnid']]; ?>
">
				<td></td>
				<td>&nbsp;
					<span class="quizzAns">
						<span style="float:left">A1:&nbsp;&nbsp;
							<input type="text" name="an<?php echo $this->_tpl_vars['i']; ?>
0" id="an<?php echo $this->_tpl_vars['i']; ?>
0" class="<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['ans1']]; ?>
" value="<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['ans1']]; ?>
" />
						</span>
						<label class="uni-radio">
							<div <?php if ($this->_tpl_vars['quizz'][$this->_tpl_vars['rans']] == $this->_tpl_vars['quizz'][$this->_tpl_vars['ansid1']]): ?> class="uni-checked"<?php endif; ?>>
								<input type="radio" name="r_an<?php echo $this->_tpl_vars['i']; ?>
" value="1" class="uni_style" <?php if ($this->_tpl_vars['quizz'][$this->_tpl_vars['rans']] == $this->_tpl_vars['quizz'][$this->_tpl_vars['ansid1']]): ?> checked<?php endif; ?>/>
							</div>
						</label>
						<span id="an<?php echo $this->_tpl_vars['i']; ?>
_span" style="padding:5px;"></span>
					</span><br />
					<span class="quizzAns">
						<span style="float:left">A2:&nbsp;&nbsp;
							<input type="text" name="an<?php echo $this->_tpl_vars['i']; ?>
1" id="an<?php echo $this->_tpl_vars['i']; ?>
1" value="<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['ans2']]; ?>
"/>
						</span>
						<label class="uni-radio">
							<div <?php if ($this->_tpl_vars['quizz'][$this->_tpl_vars['rans']] == $this->_tpl_vars['quizz'][$this->_tpl_vars['ansid2']]): ?> class="uni-checked"<?php endif; ?>>
								<input type="radio" name="r_an<?php echo $this->_tpl_vars['i']; ?>
" value="2" class="uni_style" <?php if ($this->_tpl_vars['quizz'][$this->_tpl_vars['rans']] == $this->_tpl_vars['quizz'][$this->_tpl_vars['ansid2']]): ?> checked<?php endif; ?>/>
							</div>	
						</label>	
					</span><br />
					<span class="quizzAns">
						<span style="float:left">A3:&nbsp;&nbsp;
							<input type="text" name="an<?php echo $this->_tpl_vars['i']; ?>
2" id="an<?php echo $this->_tpl_vars['i']; ?>
2" value="<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['ans3']]; ?>
"/>
						</span>
						<label class="uni-radio">
							<div <?php if ($this->_tpl_vars['quizz'][$this->_tpl_vars['rans']] == $this->_tpl_vars['quizz'][$this->_tpl_vars['ansid3']]): ?> class="uni-checked"<?php endif; ?>>
								<input type="radio" name="r_an<?php echo $this->_tpl_vars['i']; ?>
" value="3" class="uni_style" <?php if ($this->_tpl_vars['quizz'][$this->_tpl_vars['rans']] == $this->_tpl_vars['quizz'][$this->_tpl_vars['ansid3']]): ?> checked<?php endif; ?>/>
							</div>	
						</label>
					</span><br />
					<span class="quizzAns">
						<span style="float:left">A4:&nbsp;&nbsp;
							<input type="text" name="an<?php echo $this->_tpl_vars['i']; ?>
3" id="an<?php echo $this->_tpl_vars['i']; ?>
3" value="<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['ans4']]; ?>
" />
						</span>
						<label class="uni-radio">
							<div <?php if ($this->_tpl_vars['quizz'][$this->_tpl_vars['rans']] == $this->_tpl_vars['quizz'][$this->_tpl_vars['ansid4']]): ?> class="uni-checked"<?php endif; ?>>
								<input type="radio" name="r_an<?php echo $this->_tpl_vars['i']; ?>
" value="4" class="uni_style" <?php if ($this->_tpl_vars['quizz'][$this->_tpl_vars['rans']] == $this->_tpl_vars['quizz'][$this->_tpl_vars['ansid4']]): ?> checked<?php endif; ?>/>
							</div>
						</label>
					</span>
					<?php if (( ( $this->_tpl_vars['questinfoCount'] > $this->_tpl_vars['quest_count'] ) && ( $this->_tpl_vars['quizz'][$this->_tpl_vars['qnid']] != '' ) )): ?>
						<a href="javascript:void(0);" onclick="delquest('<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['qnid']]; ?>
');" style="float:right;"><img src="/FO/images/reject-icon.png" /></a>
					<?php endif; ?>
				</td>
			</tr>
			<tr id="tr3<?php echo $this->_tpl_vars['quizz'][$this->_tpl_vars['qnid']]; ?>
"><td colspan="2"><hr></td></tr>
									<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
			<?php } ?>
							 <?php endif; ?>
		</table>
		<div align="right" style="padding-right:150px;padding-top:50px">
			<input type="button" value="ANNULER" class="btn btn-info" onClick="return clearText()" />
			<input type="button" value="RETOUR" class="btn btn-info" onclick="return quizz_step1();" />
			<input type="submit" value="CR&Eacute;ER QUIZZ" class="btn btn-info" />
		</div>
	</div>
 </div>		
</form>