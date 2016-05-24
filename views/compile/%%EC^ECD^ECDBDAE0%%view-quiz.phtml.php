<?php /* Smarty version 2.6.19, created on 2015-08-06 11:17:56
         compiled from gebo/recruitment/view-quiz.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/recruitment/view-quiz.phtml', 20, false),)), $this); ?>
<?php echo '
<script>
	$(document).ready(function()
	{
		$(\'.bxslider\').bxSlider({
			infiniteLoop: false,
			hideControlOnEnd: true,
			pager:false
		});
	})
</script>
<style>

</style>
'; ?>

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
<input type="hidden" name="quiz_status" id="quiz_status" value="<?php echo $this->_tpl_vars['quiz_status']; ?>
" />