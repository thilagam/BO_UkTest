<?php /* Smarty version 2.6.19, created on 2014-11-17 14:14:10
         compiled from skeleton/gebo_login.phtml */ ?>
<!DOCTYPE html>
<html lang="en" class="login_page">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
"/>
<meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
"/>
<meta name="rating" content="general"/>
<title>Edit-Place Admin : Login</title>
<link href="image/favicon/favicon.ico" rel="shortcut icon" />
<?php $_from = $this->_tpl_vars['cssList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['css']):
?>
<link href="/BO/<?php echo $this->_tpl_vars['css']; ?>
" type="text/css" rel="stylesheet" />
<?php endforeach; endif; unset($_from); ?>
 <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<?php $_from = $this->_tpl_vars['javascriptList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['javascript']):
?>
<script language="JavaScript" type="text/javascript" src="/BO/<?php echo $this->_tpl_vars['javascript']; ?>
"></script>
<?php endforeach; endif; unset($_from); ?>

</head>
<body>
	<?php $_from = $this->_tpl_vars['rightList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endforeach; endif; unset($_from); ?>

</body>
</html>




