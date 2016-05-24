<?php /* Smarty version 2.6.19, created on 2013-11-27 08:32:10
         compiled from skeleton/contract_pages.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substr', 'skeleton/contract_pages.phtml', 16, false),)), $this); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
"/>
<meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
"/>
<meta name="rating" content="general"/>
<meta name="language" content="<?php echo $this->_tpl_vars['lang']; ?>
" />
<link href="image/favicon/favicon.ico" rel="shortcut icon" />
<?php $this->assign('cssfiles', ''); ?>
<?php $_from = $this->_tpl_vars['cssList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['css']):
?>
<?php $this->assign('cssfiles', ($this->_tpl_vars['cssfiles']).($this->_tpl_vars['css']).","); ?>
<link href="/BO/<?php echo $this->_tpl_vars['css']; ?>
" type="text/css" rel="stylesheet" />
<?php endforeach; endif; unset($_from); ?>
<!--<link type="text/css" rel="stylesheet" href="/min/b=BO&f=<?php echo ((is_array($_tmp=$this->_tpl_vars['cssfiles'])) ? $this->_run_mod_handler('substr', true, $_tmp, -1) : smarty_modifier_substr($_tmp, -1)); ?>
"/>-->
<!--<link href="/BO/<?php echo $this->_tpl_vars['css']; ?>
" type="text/css" rel="stylesheet" />-->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans" />
<?php $_from = $this->_tpl_vars['javascriptList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['javascript']):
?>
<script language="JavaScript" type="text/javascript" src="/BO/<?php echo $this->_tpl_vars['javascript']; ?>
"></script>
<?php endforeach; endif; unset($_from); ?>
</head>
<body  class="menu_hover">
<div id="loading_layer" style="display:none"><img src="/BO/theme/gebo/img/ajax_loader.gif" alt="" /></div>		
<!-- header -->
<div id="maincontainer" class="clearfix">
	<header>
	<?php $_from = $this->_tpl_vars['headerList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endforeach; endif; unset($_from); ?>
	</header>

	<!-- sidebar -- left panel -->
	<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
	<div class="sidebar">
	<?php $_from = $this->_tpl_vars['mainList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endforeach; endif; unset($_from); ?>
	</div>

	<!-- main content -->
	<div id="contentwrapper">
		<div class="main_content">
			<?php $_from = $this->_tpl_vars['rightList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endforeach; endif; unset($_from); ?>
	   </div>
	</div>
	<?php echo '
	<script type="text/javascript">
	$(document).ready(function() {
		/* show all elements & remove preloader*/
		setTimeout(\'$("html").removeClass("js")\',1000);
		var flash_message="'; ?>
<?php echo $this->_tpl_vars['actionmessages'][0]; ?>
<?php echo '";
		var flash_type="'; ?>
<?php echo $this->_tpl_vars['actionmessages'][1]; ?>
<?php echo '";
		if(flash_message)
		{
			if(flash_type==\'error\')ftype=\'st-error\';else ftype=\'st-success\';
			$.sticky(flash_message, {autoclose : 5000, position: "top-center", type: ftype });
		}
	});	

	</script>
	'; ?>

</div>
</body>
</html>