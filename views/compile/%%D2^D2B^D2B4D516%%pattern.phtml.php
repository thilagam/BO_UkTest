<?php /* Smarty version 2.6.19, created on 2015-02-23 15:50:37
         compiled from process/pattern.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', 'process/pattern.phtml', 1, false),array('modifier', 'escape', 'process/pattern.phtml', 54, false),array('function', 'html_options', 'process/pattern.phtml', 30, false),)), $this); ?>
<div class="fondTitle">PATTERN MANAGMENT : <?php echo ((is_array($_tmp=$_GET['pat'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>

<form action="pattern" method="get">
<input type="hidden" name="do" value="add"/>
<input type="hidden" name="pat" value="<?php echo $_GET['pat']; ?>
"/>

<table width="100%">
<tr><td colspan="4" height="15"></td></tr>
<tr class="couleurpanier">
<td width="10"></td>
<td class="txtcourant" align="center">%Name%</td>
<td width="10"></td>
<td class="txtcourant" align="center"><input type="text" size="50" name="page" value="<?php echo $this->_tpl_vars['selectedPattern']->getNodeName(); ?>
"  onblur="checkpatternexistence(this.value)" class="required"><div id="code1" class="validation-advice"><span class="form-row"></span></div></td>
</tr>
<tr><td colspan="4" height="15"></td></tr>
<tr class="couleurpanier">
<td width=10></td>
<td class="txtcourant" align="center">%Description%</td>
<td width="10"></td>
<td class="txtcourant" align="center" ><input type="text" size="50" name="description" value="<?php echo $this->_tpl_vars['selectedPattern']->getNodeValue(); ?>
" /></td>
</tr>
<tr><td colspan="4" height="15"></td></tr>
<tr class="couleurpanier">
<td width=10></td>
<td class="txtcourant" align="center">Site</td>
<td width="10"></td>
<td class="txtcourant" align="center">
<select name="site[]" class="buttonMultiple" style="height:50px;width:200px;" multiple>
	<option value="">ALL Site</option>
	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['siteList'],'selected' => $this->_tpl_vars['selectedPattern']->getSiteasarray()), $this);?>

</select>
<!-- <input type="text" size="40" name="site" value="<?php echo $this->_tpl_vars['selectedPattern']->getSite(); ?>
" /> -->
</td>
</tr>
<tr><td colspan="4" height="15"></td></tr>
<tr class="couleurpanier">
<td width=10></td>
<td class="txtcourant" align="center">Skeleton</td>
<td width="10"></td>
<td class="txtcourant" align="center" ><input type="text" size="50" name="skeleton" value="<?php echo $this->_tpl_vars['selectedPattern']->getSkeleton(); ?>
" /></td>
</tr>
<tr><td colspan="4" height="15"></td></tr>
<tr class="couleurpanier">
<td width=10></td>
<td class="txtcourant" align="center">Common Module</td>
<td width="10"></td>
<td class="txtcourant" align="center" ><textarea class="textAreaTitle" name="modul"><?php echo $this->_tpl_vars['selectedPattern']->getModule(); ?>
</textarea></td>
</tr>
<tr><td colspan="4" height="15"></td></tr>
<tr class="couleurpanier">
<td width=10></td>
<td class="txtcourant" align="center">Javascript</td>
<td width="10"></td>
<td class="txtcourant" align="center" ><textarea class="textAreaTitle" name="javascript"><?php echo ((is_array($_tmp=$this->_tpl_vars['selectedPattern']->getJavascript())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
</tr>
<tr><td colspan="4" height="15"></td></tr>
<tr class="couleurpanier">
<td width=10></td>
<td class="txtcourant" align="center">Css</td>
<td width="10"></td>
<td class="txtcourant" align="center" ><textarea class="textAreaTitle" name="css"><?php echo ((is_array($_tmp=$this->_tpl_vars['selectedPattern']->getCss())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
</tr>
</table>
<form>
<div class="divLn"></div>
<div class="divLn"></div>
<div class="tAlignCenter">
&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="ajouter" value="%Submit%" class="button">
&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="ajouter" value="%Return%" class="button" onClick="goTo('page');">
</div>
<div class="divLn"></div>
<div class="divLn"></div>