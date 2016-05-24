<?php /* Smarty version 2.6.19, created on 2016-04-06 14:25:33
         compiled from gebo/userlist/writerslist-details.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'gebo/userlist/writerslist-details.phtml', 21, false),array('modifier', 'upper', 'gebo/userlist/writerslist-details.phtml', 39, false),)), $this); ?>
<?php echo '
	<script type="text/javascript">
	$(document).ready(function(){
		$("#back").bind("click",function(){
			window.location="/userlist/get-writers";
		});
	});
	</script>
'; ?>

<div class="row-fluid">
	<div class="formSep">
		First Name: <?php echo $this->_tpl_vars['writerDetails']['fname']; ?>
 
	</div>
	<div class="formSep">
		Last Name: <?php echo $this->_tpl_vars['writerDetails']['lname']; ?>
 
	</div>
	<div class="formSep">
		Email Id: <?php echo $this->_tpl_vars['writerDetails']['email']; ?>
 
	</div>
	<div class="formSep">
		Type: <?php echo ((is_array($_tmp=$this->_tpl_vars['writerDetails']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 
	</div>
	<div class="formSep">
		Address: <?php echo $this->_tpl_vars['writerDetails']['address']; ?>
 
	</div>
	<div class="formSep">
		City: <?php echo $this->_tpl_vars['writerDetails']['city']; ?>
 
	</div>
	 <div class="formSep">
		Zipcode: <?php echo $this->_tpl_vars['writerDetails']['zipcode']; ?>
 
	</div>
	<div class="formSep">
		Phone: <?php echo $this->_tpl_vars['writerDetails']['phone']; ?>
 
	</div>
	<div class="formSep">
		DOB: <?php echo $this->_tpl_vars['writerDetails']['dob']; ?>
 
	</div>
	<div class="formSep">
		Language:<?php echo ((is_array($_tmp=$this->_tpl_vars['writerDetails']['language'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
 
	</div>
	<div class="formSep">
		Status:<?php echo $this->_tpl_vars['writerDetails']['status']; ?>
 
	</div>
</div>