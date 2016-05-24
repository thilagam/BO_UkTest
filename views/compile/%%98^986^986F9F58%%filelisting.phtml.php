<?php /* Smarty version 2.6.19, created on 2013-07-09 09:03:20
         compiled from translation/filelisting.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'url_decode', 'translation/filelisting.phtml', 37, false),array('modifier', 'utf8_decode', 'translation/filelisting.phtml', 37, false),array('modifier', 'needle', 'translation/filelisting.phtml', 41, false),array('function', 'cycle', 'translation/filelisting.phtml', 84, false),)), $this); ?>
<head>
<title>File : Translation</title>
</head>
<body>
<br/>
<div class="blockvertical">
<div class="divLn"></div>
<form action="<?php echo $this->_tpl_vars['actiontodo']; ?>
" method="post" name="find">
<input type="text" name="find" size='15'>&nbsp;
<INPUT align="left" TYPE="submit" Name="action1" VALUE="findarray">&nbsp;&nbsp;<?php echo $this->_tpl_vars['arrayfind']; ?>

</form>
<form action="<?php echo $this->_tpl_vars['actiontodo']; ?>
" method="POST" name="myform1" onsubmit="return checkform2(this);">
<center>
<div class="divLn"></div>
<div class="divLn"></div>
<div class="fondTitle">FILE MANAGEMENT</div>
<table width="100%">
	<tr class="fondtitre2">
		<td align='left' width='20%'>File Name</td>
		<td align='left' width='40%'>Description</td>
		<td align='left' width='13%'>Language</td>
		<td align='left' width='7%'>Editable</td>
		<td align='center' width='10%'>Update File</td>
	</tr>
<?php $this->assign('lang', $this->_tpl_vars['arraylangTemp']); ?>
<?php $this->assign('fr', $this->_tpl_vars['dfr']); ?>
<?php $_from = $this->_tpl_vars['arrayv']->children(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
<?php $this->assign('lang0', null); ?>
<?php $this->assign('lang1', null); ?>
<?php $this->assign('lang2', null); ?>
<?php $this->assign('lang3', null); ?>
<tr title='Click to Manage Array'>
<td align='left' width="20%"><a href='arraymangament?fileName=<?php echo $this->_tpl_vars['child']->getName(); ?>
'><?php echo $this->_tpl_vars['child']->getName(); ?>
</a></td>
<?php $_from = $this->_tpl_vars['child']->attributes(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['attrb']):
?>
<?php if ($this->_tpl_vars['key'] == 'desc'): ?>
<?php $this->assign('descr', $this->_tpl_vars['attrb']); ?>
<td align="left" width="40%"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['attrb'])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['key'] == 'language'): ?>
<td align="left" width="13%">
<?php if (((is_array($_tmp=$this->_tpl_vars['attrb'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'in') : smarty_modifier_needle($_tmp, 'in'))): ?>
<?php $this->assign('lang0', 'in'); ?>
<img width="15" height="15" src="/BO/images/bo/in.gif"/>
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['attrb'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'fr') : smarty_modifier_needle($_tmp, 'fr'))): ?>
<?php $this->assign('lang1', 'fr'); ?>
<img width="15" height="15" src="/BO/images/bo/fr.gif"/>
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['attrb'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'pt') : smarty_modifier_needle($_tmp, 'pt'))): ?>
<?php $this->assign('lang2', 'pt'); ?>
<img width="15" height="15" src="/BO/images/bo/pt.gif"/>
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['attrb'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'en') : smarty_modifier_needle($_tmp, 'en'))): ?>
<?php $this->assign('lang3', 'en'); ?>
<img width="15" height="15" src="/BO/images/bo/en.gif"/>
<?php endif; ?>
</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['key'] == 'editable'): ?>
<td align="center" width="7%"><?php echo $this->_tpl_vars['attrb']; ?>
</td>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<td align='center' width="10%">
<a title='update' style='font-family:verdana color: #0000FF; font-size: 12pt' href='filelisting?action1=update&file=<?php echo $this->_tpl_vars['child']->getName(); ?>
&descr=<?php echo $this->_tpl_vars['descr']; ?>
&countryLang=<?php echo $this->_tpl_vars['lang0']; ?>
,<?php echo $this->_tpl_vars['lang1']; ?>
,<?php echo $this->_tpl_vars['lang2']; ?>
,<?php echo $this->_tpl_vars['lang3']; ?>
' name='Update'> 
<img src='/BO/images/bo/update-icon.jpg' width='25' height='25' border='0' />
</a>
&nbsp;
<a title='delete' style='font-family:verdana color: #0000FF; font-size: 12pt' href='filelisting?action1=delete&file=<?php echo $this->_tpl_vars['child']->getName(); ?>
' id='Update' name='Delete' onclick='return disp_confirm2(name)'> 
<img src='/BO/images/bo/delete-icon.gif' width='25' height='25' border='0' /></a>
</td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<div class="divLn"></div>
<div class="divLn"></div>
<div class="divLn"></div>
<table id='shiva' width="100%">
	<tr class="fondtitre2">
		<td align="left" width="15%">File Name</td>
		<td align="left" width="15%">Language</td>
		<td align="left" width="20%">Description</td>
		<td align="left" width="10%">Editable</td>
		<td align="left" width="10%"></td>
	</tr>
	<tr class="<?php echo smarty_function_cycle(array('values' => " couleurpanier,txtcourant"), $this);?>
" height="30">
		<td>
			<input type="text" name="Filename" value="<?php echo $this->_tpl_vars['file']; ?>
" size='15'>
		</td>
		<td>
			<input type="checkbox" name="CountryLanguage1" value="fr" <?php echo $this->_tpl_vars['fr']; ?>
 />fr
		    <input type="checkbox" name="CountryLanguage2" value="pt" <?php echo $this->_tpl_vars['pt']; ?>
 />pt
		    <input type="checkbox" name="CountryLanguage3" value="en" <?php echo $this->_tpl_vars['en']; ?>
 />en
		    <input type="checkbox" name="CountryLanguage4" value="in" <?php echo $this->_tpl_vars['in']; ?>
 />in
		</td>
		<td>
			<textarea class="inputext" name="Description"><?php echo ((is_array($_tmp=$this->_tpl_vars['desc'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</textarea>
		</td>
		<td>
			<input name="Editable" type="radio" value="Yes" <?php echo $this->_tpl_vars['editableYes']; ?>
 />Yes
			<input name="Editable" type="radio" value="No" <?php echo $this->_tpl_vars['editableNo']; ?>
 />No
		</td>
		<td>
			<INPUT title='Submit' TYPE="submit" Name="Submit1" VALUE="Submit">
			<div class="divLn"></div>
		    <INPUT title='Reset' TYPE="reset" Name="Reset" VALUE="Reset">
		</td>
	</tr>
</table>
<div class="divLn"></div>
</center>
</form>
</div>
</body>