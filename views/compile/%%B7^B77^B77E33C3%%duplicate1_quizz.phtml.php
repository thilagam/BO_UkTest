<?php /* Smarty version 2.6.19, created on 2013-09-24 16:01:12
         compiled from gebo/quizz/duplicate1_quizz.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/quizz/duplicate1_quizz.phtml', 33, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="ISO-8859-1" src="/BO/theme/gebo/js/custom/validation_quizz.js"></script>
<script>
	$(document).ready(function() {
		$("#category").chosen({ disable_search: true });	
		$("#status").chosen({ disable_search: true });	
	});
    function clearText()
    {
        $(\'#quizztitle\').val(\'\');
        $(\'#quest_count\').val(\'\');
        $(\'#correct_ans_count\').val(\'\');
        $(\'#setuptime\').val(\'\');
        return false ;
    }
</script>
<style>
	input {text-transform:none !important;}
</style>
'; ?>


<form action="/quizz/duplicate1quizz?submenuId=ML2-SL22<?php echo '&id='.$_REQUEST['id']; ?>" name="bo_quizzstep1_form" method="post" enctype="multipart/form-data"  onSubmit="return validate_bo_quizzstep1();" >
  <div class="row-fluid">
	<div class="span12">
    	<h3 class="heading">QUIZZ UPDATE PAGE</h3>
		<table align="center" cellpadding="4" cellspacing="4" width="78%">
			<tr>
				<td>Titre du quizz</td>
				<td><input type="text" name="quizztitle" id="quizztitle" value="<?php echo $this->_tpl_vars['quizztitle']; ?>
" /></td>
			</tr>
			<tr>
				<td>Cat&eacute;gorie</td>
				<td><?php echo smarty_function_html_options(array('name' => 'category','id' => 'category','options' => $this->_tpl_vars['categories'],'selected' => $this->_tpl_vars['category']), $this);?>
</td>
			</tr>   
			<tr>
				<td>Statut du quizz</td>
				<td>
					<select name="status" id="status">
						<option value="1">Active</option>
						<option value="2" <?php if ($this->_tpl_vars['status'] == '2'): ?>selected<?php endif; ?>>Not Active</option>
					</select>
				</td>
			</tr>   
			<tr>
				<td>Nombre de questions</td>
				<td>
					<input type="text" name="quest_count" id="quest_count" value="<?php echo $this->_tpl_vars['quest_count']; ?>
" class="span2"/></td>
			</tr>   
			<tr>
				<td>Nombre de r&eacute;ponses correctes min</td>
				<td><input type="text" name="correct_ans_count" id="correct_ans_count" value="<?php echo $this->_tpl_vars['correct_ans_count']; ?>
" class="span2"/></td>
			</tr>   
			<tr>
				<td>Dur&eacute;e du quizz</td>
				<td><input type="text" name="setuptime" id="setuptime" value="<?php echo $this->_tpl_vars['setuptime']; ?>
" class="span2"/> minutes</td>
			</tr>
		</table>
		<div align="right" style="padding-right:150px;padding-top:50px">  
			<input type="button" value="ANNULER" class="btn btn-info" onClick="return clearText()" />
			<input type="submit" value="ETAPE SUIVANTE" class="btn btn-info" />
		</div>
	</div>
 </div>		
</form>