<?php /* Smarty version 2.6.19, created on 2014-12-04 11:26:25
         compiled from skeleton/simple.phtml */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['meta_title']; ?>
</title>
<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
"/>
<meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
"/>
<meta name="rating" content="general"/>
<meta name="language" content="<?php echo $this->_tpl_vars['lang']; ?>
" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['make_iso']; ?>
" />
<link href="image/favicon/favicon.ico" rel="shortcut icon" />
<?php $_from = $this->_tpl_vars['cssList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['css']):
?>
<link href="<?php echo $this->_tpl_vars['css']; ?>
" type="text/css" rel="stylesheet" />
<?php endforeach; endif; unset($_from); ?>
<?php $_from = $this->_tpl_vars['javascriptList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['javascript']):
?>
<script language="JavaScript" type="text/javascript" src="<?php echo $this->_tpl_vars['javascript']; ?>
"></script>
<?php endforeach; endif; unset($_from); ?>
<link rel="alternate" type="application/rss+xml" title="%rss_news%" href="<?php echo $this->_tpl_vars['livesite']; ?>
/html/rss/<?php echo $this->_tpl_vars['lang']; ?>
/rss.xml" />
</head>

<body class="body">

	<div class="main">
	
		<div class="mainFrameAdmin">

			<div class="centerFrame2">
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
			
			<div class="footerFrame">
			<?php $_from = $this->_tpl_vars['footerList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endforeach; endif; unset($_from); ?>
			</div>
	
			<div class="headerFrame">
			<?php $_from = $this->_tpl_vars['headerList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
	</div>

<!--START WREPORT Oboulo-->
<script language="javascript">
var WRP_ID= '<?php echo $this->_tpl_vars['webo_id']; ?>
'
var WRP_SECTION= '<?php echo $this->_tpl_vars['webo_section']; ?>
';
var WRP_SUBSECTION= '<?php echo $this->_tpl_vars['webo_subsection']; ?>
';
var WRP_SECTION_GRP= WRP_ID;
var WRP_SUBSECTION_GRP= WRP_SECTION;
var WRP_CONTENT= '<?php echo $this->_tpl_vars['webo_content']; ?>
';
var WRP_CHANNEL= '<?php echo $this->_tpl_vars['webo_channel']; ?>
';

/* Profondeur Frame */
var WRP_ACC = 0;
</script>

<script language="javascript" src="/script/wreport.js"></script>
<script>
var w_counter = new wreport_counter(WRP_SECTION, WRP_SUBSECTION, WRP_ID, WRP_ACC, WRP_CHANNEL, WRP_SECTION_GRP, WRP_SUBSECTION_GRP);
w_counter.add_content(WRP_CONTENT);
w_counter.count();
</script>
<!-- END WREPORT COPYRIGHT WEBORAMA--> 
	
</body>
</html>