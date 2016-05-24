<?php /* Smarty version 2.6.19, created on 2015-06-26 09:41:42
         compiled from gebo/followup/art-del-histories.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/followup/art-del-histories.phtml', 2, false),array('modifier', 'utf8_encode', 'gebo/followup/art-del-histories.phtml', 18, false),array('modifier', 'time_ago', 'gebo/followup/art-del-histories.phtml', 18, false),)), $this); ?>
<div class="scroll1">
<?php if (count($this->_tpl_vars['histories']) > 0 || count($this->_tpl_vars['logs']) > 0): ?>
	<?php $_from = $this->_tpl_vars['histories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['history']):
?>
	<div class="media act-comment">
		<a class="pull-left imgframe">
		<?php if ($this->_tpl_vars['history']['type'] == 'superclient'): ?>
			<img class="media-object" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/superclients/logos/<?php echo $this->_tpl_vars['history']['user_id']; ?>
/<?php echo $this->_tpl_vars['history']['user_id']; ?>
.png">
		<?php elseif ($this->_tpl_vars['history']['type'] == 'contributor'): ?>
			<img class="media-object" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/contrib/pictures/<?php echo $this->_tpl_vars['history']['user_id']; ?>
/<?php echo $this->_tpl_vars['history']['user_id']; ?>
_h.jpg">
		<?php elseif ($this->_tpl_vars['history']['type'] == 'client'): ?>
			<img class="media-object" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['history']['user_id']; ?>
/<?php echo $this->_tpl_vars['history']['user_id']; ?>
.png">
		<?php else: ?>
			<img class="media-object" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['history']['user_id']; ?>
/logo.jpg">
		<?php endif; ?>
		</a>
		<div class="media-body">
			<?php if ($this->_tpl_vars['history']['first_name']): ?>
				<a><?php echo ((is_array($_tmp=$this->_tpl_vars['history']['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['history']['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</a> <?php echo ((is_array($_tmp=$this->_tpl_vars['history']['action_at'])) ? $this->_run_mod_handler('time_ago', true, $_tmp) : smarty_modifier_time_ago($_tmp)); ?>
<?php echo $this->_tpl_vars['history']['time']; ?>
<br>
			<?php endif; ?>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['history']['action_sentence'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

			<div><?php echo ((is_array($_tmp=$this->_tpl_vars['history']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</div>
		</div>
	</div>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
	<div class="media act-comment">
		<strong>No history found</strong>
	</div>
<?php endif; ?>
</div>
<?php echo '
	<script type="text/javascript">
	$(document).ready(function(){
	$(".scroll1").mCustomScrollbar({
				scrollButtons:{enable:true,scrollType:"stepless"},
				keyboard:{scrollType:"stepless"},
				mouseWheel:{ scrollAmount:100 },
				theme:"rounded-dark",
				autoHideScrollbar:true
				});
			});
	</script>
'; ?>

