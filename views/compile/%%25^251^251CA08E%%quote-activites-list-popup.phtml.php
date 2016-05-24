<?php /* Smarty version 2.6.19, created on 2016-03-14 13:30:42
         compiled from gebo-new/quote/quote-activites-list-popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo-new/quote/quote-activites-list-popup.phtml', 1, false),array('modifier', 'utf8_encode', 'gebo-new/quote/quote-activites-list-popup.phtml', 8, false),)), $this); ?>
<?php if (count($this->_tpl_vars['log_details']) > 0): ?>		
	<?php $_from = $this->_tpl_vars['log_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['log'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['log']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['log']):
        $this->_foreach['log']['iteration']++;
?>
		<li>
			<div class="containerActivitiesPP">
				<img class="img-responsive" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['log']['user_id']; ?>
/logo.jpg" alt="Profil Picture">
			</div>
			<div class="containerActivitiesText">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['log']['action_sentence'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

				<?php if ($this->_tpl_vars['log']['comments']): ?>
					<p class="comment"><?php echo ((is_array($_tmp=$this->_tpl_vars['log']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</p>
				<?php endif; ?>	
				<span class="containerActivitiesTime">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['log']['time_ago'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

				</span>
			</div>
		</li>
	<?php endforeach; endif; unset($_from); ?>	
	<div id="load_more_<?php echo $this->_tpl_vars['next']; ?>
" class="containerActivitiesReadMore more_tab">
		<a class="btn btn-primary more_button" id="<?php echo $this->_tpl_vars['next']; ?>
">Read more <i class="material-icons">keyboard_arrow_right</i></a>
	</div>
<?php else: ?>	
	<div class="containerActivitiesReadMore has-error"><label class="control-label">No More Activities to Load</label></span>
<?php endif; ?>	