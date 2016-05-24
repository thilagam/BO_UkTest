<?php /* Smarty version 2.6.19, created on 2015-06-26 09:52:59
         compiled from skeleton/quote_pages.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'skeleton/quote_pages.phtml', 10, false),array('modifier', 'stripslashes', 'skeleton/quote_pages.phtml', 10, false),array('modifier', 'substr', 'skeleton/quote_pages.phtml', 21, false),)), $this); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
"/>
<meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
"/>
<?php $_from = $this->_tpl_vars['SubMenusLeftPanel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['count'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['count']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['myId'] => $this->_tpl_vars['i']):
        $this->_foreach['count']['iteration']++;
?>
    <?php if ($this->_tpl_vars['myId'] == $this->_tpl_vars['submenuId']): ?>
        <title>Edit-Place Admin : <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['i'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</title>
    <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
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
<?php if ($this->_tpl_vars['left_menu'] == 'no'): ?>
<body  class="menu_hover sidebar_hidden">
<?php else: ?>
<body  class="menu_hover sidebar_hidden">
<?php endif; ?>
<div id="loading_layer" style="display:none"><img src="/BO/theme/gebo/img/ajax_loader.gif" alt="" /></div>
		<div class="style_switcher">
			<div class="sepH_c">
				<p>Colors:</p>
				<div class="clearfix">
					<a href="javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
					<a href="javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
					<a href="javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
					<a href="javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
					<a href="javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
					<a href="javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
				</div>
			</div>
			<div class="sepH_c">
				<p>Backgrounds:</p>
				<div class="clearfix">
					<span class="style_item jQptrn style_active ptrn_def" title=""></span>
					<span class="ssw_ptrn_a style_item jQptrn" title="ptrn_a"></span>
					<span class="ssw_ptrn_b style_item jQptrn" title="ptrn_b"></span>
					<span class="ssw_ptrn_c style_item jQptrn" title="ptrn_c"></span>
					<span class="ssw_ptrn_d style_item jQptrn" title="ptrn_d"></span>
					<span class="ssw_ptrn_e style_item jQptrn" title="ptrn_e"></span>
				</div>
			</div>
			<div class="sepH_c">
				<p>Layout:</p>
				<div class="clearfix">
					<label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fluid" value="" checked /> Fluid</label>
					<label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fixed" value="gebo-fixed" /> Fixed</label>
				</div>
			</div>
			<div class="sepH_c">
				<p>Sidebar position:</p>
				<div class="clearfix">
					<label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_left" value="" checked /> Left</label>
					<label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_right" value="sidebar_right" /> Right</label>
				</div>
			</div>
			<div class="sepH_c">
				<p>Show top menu on:</p>
				<div class="clearfix">
					<label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_click" value="" checked /> Click</label>
					<label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_hover" value="menu_hover" /> Hover</label>
				</div>
			</div>

			<div class="gh_button-group">
				<a href="#" id="showCss" class="btn btn-primary btn-mini">Show CSS</a>
				<a href="#" id="resetDefault" class="btn btn-mini">Reset</a>
			</div>
			<div class="hide">
				<ul id="ssw_styles">
					<li class="small ssw_mbColor sepH_a" style="display:none">body <span class="ssw_mColor sepH_a" style="display:none"> color: #<span></span>;</span> <span class="ssw_bColor" style="display:none">background-color: #<span></span> </span></li>
					<li class="small ssw_lColor sepH_a" style="display:none">a  color: #<span></span> </li>
				</ul>
			</div>
		</div>
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
	<?php if ($this->_tpl_vars['left_menu'] != 'no'): ?>
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
	<?php endif; ?>	

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
		/* show all elements & remove preloader*/
		setTimeout(\'$("html").removeClass("js")\',1000);
        /////to display success or error messages after a operation in all pages/////////
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
	</script>
	'; ?>

</div>
</body>
</html>