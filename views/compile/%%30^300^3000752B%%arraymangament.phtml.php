<?php /* Smarty version 2.6.19, created on 2014-01-31 08:12:11
         compiled from translation/arraymangament.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', 'translation/arraymangament.phtml', 22, false),array('modifier', 'url_decode', 'translation/arraymangament.phtml', 47, false),array('modifier', 'utf8_decode', 'translation/arraymangament.phtml', 47, false),array('modifier', 'stripslashes', 'translation/arraymangament.phtml', 47, false),array('modifier', 'transarraycount', 'translation/arraymangament.phtml', 60, false),array('modifier', 'needle', 'translation/arraymangament.phtml', 66, false),array('function', 'cycle', 'translation/arraymangament.phtml', 39, false),)), $this); ?>
<?php echo '
<style>
textarea
{
	width:380px;
	height:90px;
}
</style>
'; ?>



<html>
<head>
<title>Array Mangament</title>
</head>
<body>
</script>
<div class="divLn"></div>
<form id="" method="post" name="myform"	onsubmit="return checkformArr(this);">
<center>
<div class="divLn"></div>
<div class="fondTitle"><h2> ARRAY MANAGEMENT for a file : <?php echo ((is_array($_tmp=$this->_tpl_vars['filename'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</h2></div>

<!-- Table for Showing Data -->
<table id='myTable'>
	<tr class="fondtitre2">
		<td align='left' width='30%'>Array Name</td>
		<td align='left' width='40%'>Comment</td>
		<td align='left' width='6%'>Nb</td>
		<td align='left' width='6%'>Index</td>
		<td align='left' width='6%'>Type</td>
		<td align='center' width='20%'>Language</td>
		<td align='left' width='13%'>Modify</td>
	</tr>
<?php $this->assign('fr', $this->_tpl_vars['dfr']); ?>	
<?php $this->assign('fileName', $this->_tpl_vars['fileName']); ?>
<?php $this->assign('cntry', $this->_tpl_vars['cntry']); ?>
<?php $_from = $this->_tpl_vars['arrayv'][0]->children(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrayNode']):
?>
<tr class="<?php echo smarty_function_cycle(array('values' => "couleurpanier,txtcourant"), $this);?>
" height="30">
<td class="txtcourant" align='left' width='30%'>
<a title='Click to Manage Array Indexs' href='arrayindex?arrayName=<?php echo $this->_tpl_vars['arrayNode'][0]->getName(); ?>
&fileName=<?php echo $this->_tpl_vars['filename']; ?>
'>
<?php echo $this->_tpl_vars['arrayNode'][0]->getName(); ?>

<?php if ($this->_tpl_vars['arrayNode'][0]['type'] == 'Array'): ?>
</a>&nbsp;&nbsp;<a title='search word(s) and then update it' href='arrayindex3?arrayName=<?php echo $this->_tpl_vars['arrayNode'][0]->getName(); ?>
&fileName=<?php echo $this->_tpl_vars['filename']; ?>
' target="_blank"><font style="color:green;">New UI</font></a>&nbsp;&nbsp;<a title='search exact index and then update it' href='arrayindex2?arrayName=<?php echo $this->_tpl_vars['arrayNode'][0]->getName(); ?>
&fileName=<?php echo $this->_tpl_vars['filename']; ?>
' target="_blank"><font style="color:#F88500;">UI 2</font></a>
<?php endif; ?>
</td>
<td class="txtcourant" align='left' width='30%'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrayNode'][0]['desc'])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
<td class="txtcourant" align='center' width='6%'>
<?php $this->assign('count', ((is_array($_tmp=$this->_tpl_vars['filename'])) ? $this->_run_mod_handler('transarraycount', true, $_tmp, $this->_tpl_vars['arrayNode'][0]->getName(), $this->_tpl_vars['lang']) : smarty_modifier_transarraycount($_tmp, $this->_tpl_vars['arrayNode'][0]->getName(), $this->_tpl_vars['lang']))); ?>
<?php echo $this->_tpl_vars['count']; ?>

</td>
<td class="txtcourant" align='left' width='6%'><?php echo $this->_tpl_vars['arrayNode'][0]['index']; ?>
</td>
<td class="txtcourant" align='left' width='6%'><?php echo $this->_tpl_vars['arrayNode'][0]['type']; ?>
</td>
<td align='center' width='20%'>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrayNode'][0]['language'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'in') : smarty_modifier_needle($_tmp, 'in'))): ?>
<img width="15" height="15" src="/BO/images/bo/in.gif"/>&nbsp;
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrayNode'][0]['language'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'fr') : smarty_modifier_needle($_tmp, 'fr'))): ?>
<img width="15" height="15" src="/BO/images/bo/fr.gif"/>&nbsp;
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrayNode'][0]['language'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'pt') : smarty_modifier_needle($_tmp, 'pt'))): ?>
<img width="15" height="15" src="/BO/images/bo/pt.gif"/>&nbsp;
<?php endif; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['arrayNode'][0]['language'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'en') : smarty_modifier_needle($_tmp, 'en'))): ?>
<img width="15" height="15" src="/BO/images/bo/en.gif"/>&nbsp;
<?php endif; ?>
</td>
<td align='left' width='13%'>
<a name='Update' title='update' style='font-family:verdana color: #0000FF; font-size: 12pt' href='arraymangament?action1=update&fileName=<?php echo $this->_tpl_vars['filename']; ?>
&arrayname=<?php echo $this->_tpl_vars['arrayNode'][0]->getName(); ?>
&comment=<?php echo $this->_tpl_vars['arrayNode'][0]; ?>
'> 
<img ALT='update row' src='/BO/images/bo/update-icon.jpg' width='20' height='20' border='0' /></a>
<a name='Delete' onclick='return disp_confirm2(name)' title='delete' style='font-family:verdana color: #0000FF; font-size: 12pt' href='arraymangament?action1=delete&fileName=<?php echo $this->_tpl_vars['filename']; ?>
&arrayname=<?php echo $this->_tpl_vars['arrayNode'][0]->getName(); ?>
&type=<?php echo $this->_tpl_vars['arrayNode'][0]['type']; ?>
'> 
<img ALT='deletes row' src='/BO/images/bo/delete-icon.gif' width='15' height='15' border='0' /></a>
</td>
<?php endforeach; endif; unset($_from); ?>
</table>
<div class="divLn"></div>
<div class="divLn"></div>
<div class="divLn"></div>

<!-- Table for Entering Data -->
<table width="100%">
	<tr class="fondtitre2">
		<td align="center" width="20%">Array Name</td>
		<td align="center" width="30%">Comment</td>
		<td align="center" width="20%">Language</td>
		<td align="center" width="10%">Type</td>
		<td align="center" width="10%">Index</td>
		<td align="center" width="10%">Editable</td>
	</tr>
	<tr class="<?php echo smarty_function_cycle(array('values' => "couleurpanier,txtcourant"), $this);?>
" height="16">
		<td align="center" width="20%">
			<input type="text" name="Arrayname" value="<?php echo $this->_tpl_vars['arrayName']; ?>
" size='20'>
		</td>
		<td align="center" width="30%">
			<textarea name="Comment" class="inputext"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['comment'])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea>
		</td>
		<td align="center" width="20%">
			<input type="checkbox" name="CountryLanguage1" value="fr" <?php echo $this->_tpl_vars['fr']; ?>
>fr&nbsp;
			<input type="checkbox" name="CountryLanguage2" value="pt" <?php echo $this->_tpl_vars['pt']; ?>
>pt&nbsp;
			<input type="checkbox" name="CountryLanguage3" value="en" <?php echo $this->_tpl_vars['en']; ?>
>en&nbsp;
			<input type="checkbox" name="CountryLanguage4" value="in" <?php echo $this->_tpl_vars['in']; ?>
>in
		</td>
		<td align="center" width="10%">
			<input name="Type" type="radio" value="Array" <?php echo $this->_tpl_vars['typeArray']; ?>
/>Array&nbsp;
			<div class="divLn"></div>
			<input name="Type" type="radio"	value="Simple" <?php echo $this->_tpl_vars['typeSimple']; ?>
/>Simple
		</td>
		<td align="center" width="10%">
			<input name="Index" type="radio" value="Yes" <?php echo $this->_tpl_vars['indexYes']; ?>
 />Yes&nbsp;
			<input name="Index" type="radio" value="No" <?php echo $this->_tpl_vars['indexNo']; ?>
/>No
		</td>
		<td align="center" width="10%">
			<input name="Editable" type="radio" value="Yes" <?php echo $this->_tpl_vars['editableYes']; ?>
 />Yes&nbsp;
			<input name="Editable" type="radio" value="No" <?php echo $this->_tpl_vars['editableNo']; ?>
 />No
		</td>
	</tr>
</table> 
<div class="divLn"></div>
<!-- <INPUT TYPE="button" Name="Back" VALUE="Back" onclick="javascript:goBackArr()">&nbsp;&nbsp;&nbsp;&nbsp; -->
<a href="filelisting">Back </a>&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT title='Submit' TYPE="Submit" Name="Submit1" VALUE="Submit">&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT TYPE="reset" Name="Submit" VALUE="Reset" onclick="reset()">
<div class="divLn"></div>
</center>
</form>
</body>
</html>