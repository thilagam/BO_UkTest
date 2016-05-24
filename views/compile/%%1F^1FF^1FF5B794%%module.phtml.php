<?php /* Smarty version 2.6.19, created on 2014-12-04 11:27:06
         compiled from process/module.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', 'process/module.phtml', 1, false),array('modifier', 'utf8_decode', 'process/module.phtml', 40, false),array('modifier', 'replace', 'process/module.phtml', 64, false),array('modifier', 'needle', 'process/module.phtml', 171, false),array('function', 'cycle', 'process/module.phtml', 34, false),array('function', 'html_options', 'process/module.phtml', 56, false),)), $this); ?>
<div class="fondTitle">MODULE MANAGMENT : <?php echo ((is_array($_tmp=$this->_tpl_vars['pageName'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div>
<form action="module" method="get" name="module1">
<table width="100%">
	<tr class="fondtitre2">
		<td width=10></td>
		<td class="txtcourant" align="center">Name</td>
		<td width=10></td>
		<td class="txtcourant" align="center">Description</a></td>
		<td width=10></td>
		<td class="txtcourant" align="center">Template file</a></td>
		<td width=10></td>
		<td class="txtcourant" align="right">Site</a></td>
		<td width=10></td>
		<td class="txtcourant" align="right">Rank</a></td>
		<td width=10></td>
		<td class="txtcourant" align="right">Online</a></td>
		<td width=15></td>
		<td class="txtcourant" align="center">Language</a></td>
		<td width=10></td>
		<td class="txtcourant" align="right">Position</a></td>
		<td width=10></td>
		<td class="txtcourant" align="right">Access</a></td>
		<td width=10></td>
		<td class="txtcourant" align="right">Order</a></td>
		<td width=10></td>
		<td class="txtcourant" align="right">LastModified</td>
		<td width=10></td>
		<td class="txtcourant" align="left">Edit</td>
	</tr>
	<?php $this->assign('s', 0); ?> 
	<?php $_from = $this->_tpl_vars['mList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?> 
	<?php $this->assign('position', $this->_tpl_vars['m']->getPosition()); ?> 
	<?php $this->assign('access', $this->_tpl_vars['m']->getAccess()); ?>
	<tr class="<?php echo smarty_function_cycle(array('values' => " couleurpanier,txtcourant"), $this);?>
"  height="30">
		<td width="10"></td>
		<td><span class="txtcourant">
		<a href="javascript:xpopen('version?moduleName=<?php echo $this->_tpl_vars['m']->getNodeName(); ?>
',900,700)"><?php echo $this->_tpl_vars['m']->getNodeName(); ?>
</a></span>
		</td>
		<td width="10"></td>
		<td><span class="txtcourant"><?php echo ((is_array($_tmp=$this->_tpl_vars['m']->getNodeValue())) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</span></td>
		<td width="10"></td>
		<td><span class="txtcourant">
		<a href="javascript:xpopen('popwin?action1=load&fileName=<?php echo $this->_tpl_vars['m']->getFile(); ?>
',900,700)"><?php echo $this->_tpl_vars['m']->getFile(); ?>
</a></span>
		&nbsp;&nbsp; 
			<a href="scriptversion?fileName=<?php echo $this->_tpl_vars['m']->getFile(); ?>
&moduleName=<?php echo $this->_tpl_vars['pageName']; ?>
">
			<img height="16" width="16" src="/image/check.gif" border="0" title="script version details" name="version" />
			</a>
		</td>
		<td width="10"></td>
		<td>
		<!-- <?php $this->assign('site', $this->_tpl_vars['m']->getSite()); ?>
		<?php if ($this->_tpl_vars['site'] != ''): ?>
		 <span class="txtcourant"><?php echo $this->_tpl_vars['site']; ?>
</span>
		<?php endif; ?> -->
		<select disabled class="buttonMultiple" style="height:40px;width:55px;" multiple>
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['m']->getSiteasarray()), $this);?>

		</select>
		</td>
		<td width="10"></td>
		<td><span class="txtcourant"><?php echo $this->_tpl_vars['m']->getRank(); ?>
</span></td>
		<td width="10"></td>
		<td><span class="txtcourant"><?php echo $this->_tpl_vars['m']->getOnline(); ?>
</span></td>
		<td width="10"></td>
		<td><span class="txtcourant"><?php echo ((is_array($_tmp=$this->_tpl_vars['m']->getLanguage())) ? $this->_run_mod_handler('replace', true, $_tmp, '|', '-') : smarty_modifier_replace($_tmp, '|', '-')); ?>
</span></td>
		<td width="10"></td>
		<td><span class="txtcourant"><?php echo $this->_tpl_vars['arrayPosition'][$this->_tpl_vars['position']]; ?>
</span></td>
		<td width="10"></td>
		<td><span class="txtcourant"><?php echo $this->_tpl_vars['accessList'][$this->_tpl_vars['access']]; ?>
</span></td>
		<td width="10"></td>
		<td><span class="txtcourant"><?php echo $this->_tpl_vars['m']->getOrder(); ?>
</span></td>
		<td width="10"></td>
		<td><span class="txtcourant"><?php echo $this->_tpl_vars['m']->getmodDate(); ?>
</span></td>
		<td width="10"></td>
		<td align="right" height="19" width="80">
		<a href="?page=<?php echo $this->_tpl_vars['m']->getNodeName(); ?>
&do=update&mod=<?php echo $_GET['mod']; ?>
" onclick="javascript:showupdate();">
		<img height="19" width="20" src="/image/picto/edit.png" border="0" title="Edit_array" alt="Edit_array" />
		</a> 
		<a	href="?page=<?php echo $this->_tpl_vars['m']->getNodeName(); ?>
&do=delete&mod=<?php echo $_GET['mod']; ?>
">
		<img height="16" width="16" src="/image/delete.gif" border="0" title="Delete_array" alt="Delete_array" name="Delete" onclick="return disp_confirm(this.name)" /></a>
		</td>
		<?php $this->assign('s', $this->_tpl_vars['s']+1); ?> 
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<div class="divLn"></div>
<div class="divLn"></div>
<center><span class="txtcourant">Enter Module Name : </span>
<input	type="text" size="20" name="moduleName" />&nbsp;&nbsp;&nbsp;
<input	type="submit" name="search" value="ModuleCheck" class="button">
&nbsp;&nbsp;&nbsp;
<!--<input type="button" name="check" value="ClientCheck" class="button" onclick="loadXML(moduleName.value);">  --></center>
<input type="hidden" name="do" value="check" /> 
<input type="hidden" name="mod" value="<?php echo $_GET['mod']; ?>
" /></form>

<!-- Search or Add section -->
<form action="module" method="get" name="test" id="test" onsubmit="return checkform(this);">
<div class="divLn"></div>
<center>
<div id="message" style="color: #A0C544">
<h3><?php echo $this->_tpl_vars['message']; ?>
</h3>
</div>
</center>
<div class="divLn"></div>
<input type="hidden" name="mod" value="<?php echo $_GET['mod']; ?>
"/> 
<input	type="hidden" name="do" value="add" />
<div id="add" style="<?php echo $this->_tpl_vars['addDisplay']; ?>
">
<table class="profitTable" align="center" width="100%">
	<tr>
		<td align="center" colspan="22" class="fondtitre2">ADD MODULE</td>
	</tr>
	<tr class="couleurpanier" height="38">
		<td width=10></td>
		<td class="txtcourant" align="center">Name</td>
		<td width=10></td>
		<td class="txtcourant" align="center">Description</a></td>
		<td width=10></td>
		<td class="txtcourant" align="center">Template file</a></td>
		<td width=10></td>
		<td class="txtcourant" align="center">Site</a></td>
		<td width=10></td>
		<td class="txtcourant" align="right">Rank</a></td>
		<td width=10></td>
		<td class="txtcourant" align="right">Online</a></td>
		<td width=10></td>
		<td class="txtcourant" align="center">Language</a></td>
		<td width=10></td>
		<td class="txtcourant" align="right">Position</a></td>
		<td width=10></td>
		<td class="txtcourant" align="right">Access</a></td>
		<td width=10></td>
		<td class="txtcourant" align="right">Order</a></td>
	</tr>
	<tr class="couleurpanier" height="38">
		<td width="10"></td>
		<td class="txtcourant" align="center"><?php if ($this->_tpl_vars['newENTRY'] == 'No'): ?> <input
			type="text" size="20" name="page"
			value="<?php echo $this->_tpl_vars['selectedModule']->getNodeName(); ?>
" /> 
			<?php else: ?> 
			<input type="text" size="20" name="page" value="<?php echo $this->_tpl_vars['enteredModule']; ?>
" /> 
			<?php endif; ?> <input
			type="hidden" name="hpage" value="<?php echo $this->_tpl_vars['selectedModule']->getNodeName(); ?>
" /></td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
			<input type="text" size="20" name="description" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['selectedModule']->getNodeValue())) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
" /> 
			<input type="hidden" name="hdescription" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['selectedModule']->getNodeValue())) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
" />
		</td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
		<input type="text" size="20" name="file" id="file" value="<?php echo $this->_tpl_vars['selectedModule']->getFile(); ?>
"	class="required validate-filename" /> 
		<input type="hidden" name="hfile" value="<?php echo $this->_tpl_vars['selectedModule']->getFile(); ?>
" /></td>
		<div class="divLn"></div>
		<td width="10"></td>
		<td>
			<select name="site[]" class="buttonMultiple" style="height:250px;width:150px;" multiple>
				<option value="">ALL Site</option>
				<?php echo smarty_function_html_options(array('selected' => $this->_tpl_vars['selectedModule']->getSiteasarray(),'options' => $this->_tpl_vars['siteList']), $this);?>

			</select>
		</td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
		<input type="text" size="3"	name="rank" value="<?php echo $this->_tpl_vars['selectedModule']->getRank(); ?>
" onBlur="notNumRank(this.value);" /> 
		<input type="hidden" size="3" name="hrank" value="<?php echo $this->_tpl_vars['selectedModule']->getRank(); ?>
" />
		</td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
		<input type="text" size="3"	name="online" value="<?php echo $this->_tpl_vars['selectedModule']->getOnline(); ?>
" onBlur="notNumOnline(this.value);" /> 
		<input type="hidden" size="3" name="honline" value="<?php echo $this->_tpl_vars['selectedModule']->getOnline(); ?>
" /></td>
		<td width="10"></td>
		<td>
			<?php $this->assign('ss', $this->_tpl_vars['selectedModule']->getLanguage()); ?>
			<?php if (((is_array($_tmp=$this->_tpl_vars['ss'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'fr') : smarty_modifier_needle($_tmp, 'fr'))): ?>
			<?php $this->assign('dfr', 'selected'); ?>
			<?php else: ?>
			<?php $this->assign('dfr', ''); ?>
			<?php endif; ?>
			<?php if (((is_array($_tmp=$this->_tpl_vars['ss'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'en') : smarty_modifier_needle($_tmp, 'en'))): ?>
			<?php $this->assign('chken', 'selected'); ?>
			<?php endif; ?>
			<?php if (((is_array($_tmp=$this->_tpl_vars['ss'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'pt') : smarty_modifier_needle($_tmp, 'pt'))): ?>
			<?php $this->assign('chkpt', 'selected'); ?>
			<?php endif; ?>
			<?php if (((is_array($_tmp=$this->_tpl_vars['ss'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'in') : smarty_modifier_needle($_tmp, 'in'))): ?>
			<?php $this->assign('chkin', 'selected'); ?>
			<?php endif; ?>
			<select name="countryLang[]" size="4" multiple>
				<option <?php echo $this->_tpl_vars['dfr']; ?>
>fr</option>
				<option <?php echo $this->_tpl_vars['chken']; ?>
>en</option>
				<option <?php echo $this->_tpl_vars['chkpt']; ?>
>pt</option>
				<option <?php echo $this->_tpl_vars['chkin']; ?>
>in</option>
		    </select>
			<input type="hidden" name="hlanguage" value="<?php echo $this->_tpl_vars['selectedModule']->getLanguage(); ?>
" />
			<input type="hidden" name="hlanguage"
			value="<?php echo $this->_tpl_vars['selectedModule']->getLanguage(); ?>
" /></td>
		<td width="10"></td>
		<td>
			<select name="position" class="button">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrayPosition'],'selected' => $this->_tpl_vars['selectedModule']->getPosition()), $this);?>

			</select>
		<td width="10">
			<input type="hidden" name="hposition" value="<?php echo $this->_tpl_vars['selectedModule']->getPosition(); ?>
" />
		</td>
		<td><select name="access" class="button">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['accessList'],'selected' => $this->_tpl_vars['selectedModule']->getAccess()), $this);?>

		</select> 
			<input type="hidden" name="haccess"	value="<?php echo $this->_tpl_vars['selectedModule']->getAccess(); ?>
" /> 
			<input type="hidden" name="hmodDate" value="<?php echo $this->_tpl_vars['selectedModule']->getmodDate(); ?>
" />
		</td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
			<input type="text" size="3"	name="order" value="<?php echo $this->_tpl_vars['selectedModule']->getOrder(); ?>
" onBlur="notNumOrder(this.value);" /> 
			<input type="hidden" name="horder" value="<?php echo $this->_tpl_vars['selectedModule']->getOrder(); ?>
" />
		</td>
		<td width="10"></td>
	</tr>
	<tr>
		<td colspan="20" align="center">
			<input type="submit" name="ajouter" value="Submit"	class="button">
		</td>
	<td width="10"></td>
	</tr>
</table>
</div>
</form>
<?php echo '
<script type="text/javascript">
	function formCallback(result, form) 
	{
		window.status = "valiation callback for form \'" + form.id + "\': result = " + result;
	}					
	var valid = new Validation(\'test\', {immediate : true, onFormValidate : formCallback});
</script>
'; ?>

<form action="module" method="get" name="module2">
<input type="hidden" name="mod" value="<?php echo $_GET['mod']; ?>
" /> 
<input type="hidden" name="do" value="AddToPage" /> 
<input type="hidden" name="enteredModule" value="<?php echo $this->_tpl_vars['enteredModule']; ?>
" />
<div id="search" style="<?php echo $this->_tpl_vars['searchDisplay']; ?>
">
<table class="profitTable" align="center" width="100%">
	<tr>
		<td align="center" colspan="22" class="couleurpanier">
		<h3>
		<div id="smodule"></div>
		</h3>
		</td>
	</tr>
	<tr></tr>
	<tr class="fondtitre2" height="38">
		<td width=10></td>
		<td class="txtcourant" align="center">Page_Name</td>
		<td width=10></td>
		<td class="txtcourant" align="center">Module_Description</td>
		<td width=10></td>
		<td class="txtcourant" align="center">Template File</td>
		<td width=10></td>
		<td class="txtcourant" align="right">Rank</td>
		<td width=10></td>
		<td class="txtcourant" align="right">Online</td>
		<td width=10></td>
		<td class="txtcourant" align="center">Language</td>
		<td width=10></td>
		<td class="txtcourant" align="right">Position</td>
		<td width=10></td>
		<td class="txtcourant" align="right">Access</td>
		<td width=10></td>
		<td class="txtcourant" align="right">Order</td>
	</tr>
	<?php $_from = $this->_tpl_vars['spage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
	<tr class="couleurpanier" height="38">
		<td width="10"></td>
		<td class="txtcourant" align="center">
		<div id="spage"><?php echo $this->_tpl_vars['m']; ?>
</div>
		</td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
		<div id="sdescription"><?php echo $this->_tpl_vars['sdescription']; ?>
</div>
		</td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
		<div id="sfile"><a
			href="javascript:xpopen('popwin?action1=load&fileName=<?php echo $this->_tpl_vars['sfile']; ?>
',900,700)"><?php echo $this->_tpl_vars['sfile']; ?>
</a></div>
		</td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
		<div id="srank"><?php echo $this->_tpl_vars['srank']; ?>
</div>
		</td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
		<div id="sonline"><?php echo $this->_tpl_vars['sonline']; ?>
</div>
		</td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
		<div id="slanguage"><?php echo $this->_tpl_vars['slanguage']; ?>
</div>
		</td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
		<div id="sposition"><?php echo $this->_tpl_vars['sposition']; ?>
</div>
		</td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
		<div id="saccess"><?php echo $this->_tpl_vars['saccess']; ?>
</div>
		</td>
		<td width="10"></td>
		<td class="txtcourant" align="center">
		<div id="sorder"><?php echo $this->_tpl_vars['sorder']; ?>
</div>
		</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<tr>
		<input type="submit" name="add"	value="ClickToAddBelowModuleToAbovePage" class="button">
	</tr>
</table>
</div>
</form>
<div class="divLn"></div>
<div class="divLn"></div>
<div class="divLn"></div>
<div class="tAlignCenter">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" name="ajouter" value="Return" class="button" onClick="goTo('page');">
</div>
<div class="divLn"></div>
<div class="divLn"></div>