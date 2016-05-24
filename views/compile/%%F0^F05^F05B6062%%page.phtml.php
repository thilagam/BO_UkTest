<?php /* Smarty version 2.6.19, created on 2014-12-04 11:26:25
         compiled from process/page.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'process/page.phtml', 108, false),array('function', 'cycle', 'process/page.phtml', 135, false),array('modifier', 'utf8_decode', 'process/page.phtml', 142, false),array('modifier', 'strpos', 'process/page.phtml', 151, false),array('modifier', 'explode', 'process/page.phtml', 156, false),)), $this); ?>
<?php echo '
<script language="JavaScript">
function getHTTPObject() {
  var xmlHttp;
  try{
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e){
    // Internet Explorer
    try{
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e){
        try{
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e){
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
    return xmlHttp;
  }

var commentload = getHTTPObject();
var site = document.domain;

function searchpage(formname,pagename)
{      
    var param = \'formname=\'+formname+\'&pagename=\'+pagename;
    
    if(pagename == \'\')
    {
        alert("Please enter page name");
        return false;
    }
    
    if(formname == \'process\')    
    commentload.open("POST",\'https://\'+site+\'/process/searchpage\', true);
    
    if(formname == \'processdaco\')    
    commentload.open("POST",\'https://\'+site+\'/processdaco/searchpage\', true);
    
    if(formname == \'processmanage\')    
    commentload.open("POST",\'https://\'+site+\'/processmanage/searchpage\', true);

    if(formname == \'processeditplace\')    
    commentload.open("POST",\'https://\'+site+\'/processeditplace/searchpage\', true);
        
    commentload.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    commentload.setRequestHeader("Content-length", param.length);
    commentload.setRequestHeader("Connection", "close");
    commentload.onreadystatechange = function()
    {
        if (commentload.readyState == 4)
        {
            results = commentload.responseText;
            document.getElementById(\'cpage\').innerHTML=\'SegmentName => \'+results;
        }
        else if(commentload.readyState == 1)
        {
            document.getElementById(\'cpage\').innerHTML="<img src=\'/image/toggle/datloader.gif\'>";
        }
    };
    commentload.send(param);
}

function changeprocss(elementRef,site)
{
	var selectedIndex = elementRef.selectedIndex;
	if(selectedIndex == 1)
		document.location.href="https://"+site+"/process/page?domainSel=1";
	else if(selectedIndex == 2)
		document.location.href="https://"+site+"/processdaco/page?domainSel=2";
	else if(selectedIndex == 3)
		document.location.href="https://"+site+"/processmanage/page?domainSel=3";
	else if(selectedIndex == 4)
		document.location.href="https://"+site+"/processeditplace/page?domainSel=4";
}
</script>
'; ?>

<center><font color="red"><h2><?php echo $this->_tpl_vars['fail_update']; ?>
</h2></font></center>
<form method="get" name="sitechange">
<input type="hidden" name="domainSel" value="<?php echo $this->_tpl_vars['domainSel']; ?>
" />
<input type="text" size="25" name="pagecheckit" id="pagecheckit"/>&nbsp;&nbsp;<input type="button" class="button" size="25" onclick="javascript:searchpage('<?php echo $this->_tpl_vars['controllerName']; ?>
',document.getElementById('pagecheckit').value);" value="%Search% Page" name="btnPagecheckit"/>&nbsp;<span id="cpage" style="font: bold italic 14px/1.2 Georgia, sans-serif;"></span>
<div class="divLn"></div>
<div class="tAlignCenter">
<input type="hidden" id="procss" name="procss" value="indexDoc" />
<div align="center" class="nbredocs">
<span class="txtcourant">Select Site :</span>
<select name="domain" id="domain" class="button" onChange="javascript:changeprocss(this,'<?php echo $this->_tpl_vars['siteName']; ?>
');">
<option>None</option>
<option value="1" <?php if ($this->_tpl_vars['domainSel'] == '1'): ?> selected<?php endif; ?>>Process Oboulo</option>
<option value="2" <?php if ($this->_tpl_vars['domainSel'] == '2'): ?> selected<?php endif; ?>>Process Dacodoc</option>
<option value="3" <?php if ($this->_tpl_vars['domainSel'] == '3'): ?> selected<?php endif; ?>>Process Management</option>
<option value="4" <?php if ($this->_tpl_vars['domainSel'] == '4'): ?> selected<?php endif; ?>>Edit-Place</option>
</select>
</div>
</form>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<form action="page" method="get" name="doFilter">
<input type="hidden" name="domainSel" value="<?php echo $this->_tpl_vars['domainSel']; ?>
" />
<input type="hidden" name="action" value="indexDoc" />
<div align="center" class="nbredocs">
<span class="txtcourant">Select Segment :</span>
<select name="segment" class="button" onChange="doFilter.submit()">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['segmentList'],'selected' => $this->_tpl_vars['segment']), $this);?>

</select>
&nbsp;&nbsp;&nbsp;<span class="txtcourant"><a target="_blank" href="https://<?php echo $this->_tpl_vars['siteName']; ?>
/process/arrayindex?arrayName=<?php echo $this->_tpl_vars['segmentArrayName']; ?>
&fileName=process.php">Create Segment</a></span>
</div>
</form>
</div>
<div class="divLn"></div>
<div class="divLn"></div>
<div class="fondTitle">PAGE MANAGMENT</div>
<table width="100%">
<tr class="fondtitre2">
<td width=10></td>
<td class="txtcourant" align="center">Name</td>
<td width=10></td>
<td class="txtcourant" align="center">Description</a></td>
<td width=10></td>
<td class="txtcourant" align="center">Pattern</a></td>
<td width=10></td>
<td class="txtcourant" align="center">Meta Details</a></td>
<td width=10></td>
<td class="txtcourant" align="center">ProcessCode</a></td>
<td width=10></td>
<td class="txtcourant" align="center">Section</a></td>
<td width=10></td>
<td class="txtcourant" align="right">Edit</a></td>
</tr>
<?php $_from = $this->_tpl_vars['pageList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
	<tr class="<?php echo smarty_function_cycle(array('values' => "couleurpanier,txtcourant"), $this);?>
"  height="30">
		<td width="10"></td>
		<td>
			<span class="txtcourant"><a href="module?mod=<?php echo $this->_tpl_vars['p']->getNodeName(); ?>
" class="nbredocs"><?php echo $this->_tpl_vars['p']->getNodeName(); ?>
</a></span>
		</td>
		<td width="10"></td>
		<td>
			<span class="txtcourant"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']->getNodeValue())) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</span>
		</td>
		<td width="10"></td>
		<td>
		<!-- 	<span class="txtcourant">
			<a href="pattern?pat=<?php echo $this->_tpl_vars['p']->getPatterns(); ?>
" class="nbredocs"><?php echo $this->_tpl_vars['p']->getPatterns(); ?>
</a>
			</span>
		 -->
		 	<?php $this->assign('pageList2', $this->_tpl_vars['p']->getPatterns()); ?>
		 	<?php if (((is_array($_tmp=$this->_tpl_vars['pageList2'])) ? $this->_run_mod_handler('strpos', true, $_tmp) : smarty_modifier_strpos($_tmp)) == 'false'): ?>
		 	<span class="txtcourant">
			<a href="pattern?pat=<?php echo $this->_tpl_vars['p']->getPatterns(); ?>
" class="nbredocs"><?php echo $this->_tpl_vars['p']->getPatterns(); ?>
</a>
			</span>
			<?php else: ?>
			<?php $this->assign('pageListArr', ((is_array($_tmp="|")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['pageList2']) : smarty_modifier_explode($_tmp, $this->_tpl_vars['pageList2']))); ?> 
		 	<?php $_from = $this->_tpl_vars['pageListArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p3']):
?>
		 	<span class="txtcourant">
			<a href="pattern?pat=<?php echo $this->_tpl_vars['p']->getPatterns(); ?>
" class="nbredocs"><?php echo $this->_tpl_vars['p']->getPatterns(); ?>
</a><div style="height:5px;line-height:5px;" class="divLn"></div>
			</span>
			<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
		</td>
		</td>
		<td width="10"></td>
		<td>
			<span class="txtcourant"><a href="javascript:xpopen('metadetail?metaDescr=<?php echo $this->_tpl_vars['p']->getmetaDescription(); ?>
&metaKeywords=<?php echo $this->_tpl_vars['p']->getmetaKeywords(); ?>
&metaTitle=<?php echo $this->_tpl_vars['p']->getmetaTitle(); ?>
',900,400)" class="nbredocs">Meta Details</a></span>
		</td>
		<td width="10"></td>
		<td  align="center">
			<span class="txtcourant"><?php echo $this->_tpl_vars['p']->getprocessCode(); ?>
 <font style="color:red;">|</font> <?php echo $this->_tpl_vars['p']->getaccessCode(); ?>
</span>
		</td>
		<td width="10"></td>
		<td>
			<span class="txtcourant"><?php $this->assign('j', $this->_tpl_vars['p']->getsection()); ?><?php echo $this->_tpl_vars['sectionList'][$this->_tpl_vars['j']]; ?>
</span>
		</td>
		<td width="10"></td>
		<td align="right" height="19" width="50">
			<a href="?page=<?php echo $this->_tpl_vars['p']->getNodeName(); ?>
&do=update&segment=<?php echo $this->_tpl_vars['segment']; ?>
#page" ><img height="19" width="20" src="/image/picto/edit.png" border="0" title="%Edit_array%" alt="%Edit_array%"/></a>
			<a href="?page=<?php echo $this->_tpl_vars['p']->getNodeName(); ?>
&do=delete&segment=<?php echo $this->_tpl_vars['segment']; ?>
" ><img height="16" width="16" src="/image/delete.gif" border="0" title="%Delete_array%" alt="%Delete_array%"/></a>
		</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<div class="divLn"></div>
<div class="divLn"></div>
<form action="page" method="get" id="page" onSubmit="return checkformmodulesite();">
<input type="hidden" name="domainSel" value="<?php echo $this->_tpl_vars['domainSel']; ?>
" />
<input type="hidden" name="do" value="add"/>
<input type="hidden" name="update_check" value="<?php echo $this->_tpl_vars['update_check']; ?>
"/>
<input type="hidden" name="segment" value="<?php echo $this->_tpl_vars['selectedPage']->getSegment(); ?>
"/>
<table class="profitTable" align="center" width="100%">
<tr><td align="center" colspan="20" class="fondtitre2">ADD PAGE</td></tr>
<tr class="couleurpanier" height="38">
<td width="10"></td>
<td class="txtcourant" align="center">Name</td>
<td width="10"></td>
<td class="txtcourant" align="center">Description</td>
<td width="10"></td>
<td class="txtcourant" align="center">Segment</td>
<td width="10"></td>
<td class="txtcourant" align="center">Pattern</td>
<td width="10"></td>
<td class="txtcourant" align="center">Code</td>
<td width="10"></td>
<td class="txtcourant" align="center">Section(Admin only)</td>
<td width="10"></td>
<td align="center"></td>
</tr>
<tr class="couleurpanier" height="38">
<td width="10"></td>
<td class="txtcourant" align="center"><input type="text" size="20" name="page" id="page" value="<?php echo $this->_tpl_vars['selectedPage']->getNodeName(); ?>
" onblur="checkpageexistence(this.value,'<?php echo $this->_tpl_vars['siteName']; ?>
/<?php echo $this->_tpl_vars['controller']; ?>
')" class="required"><div id="code1" class="validation-advice"><span class="form-row"></span></div></td>
<td width="10"></td>
<td class="txtcourant" align="center" ><input type="text" size="20" name="description" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['selectedPage']->getNodeValue())) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
" /></td>
<td width="10"></td>
<td><select name="segment" class="button">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['segmentList'],'selected' => $this->_tpl_vars['selectedPage']->getSegment()), $this);?>

</select></td>
<td width="10"></td>
<td>
<select name="selectPattern[]" id="selectPattern" multiple="multiple" class="buttonMultiple" style="height:75px;width:200px;">
 <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['patternList'],'selected' => $this->_tpl_vars['selectedPage']->getPatternsasarray(),'output' => $this->_tpl_vars['patternList']), $this);?>

<!--<?php $_from = $this->_tpl_vars['patternList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
				<option value="<?php echo $this->_tpl_vars['page']; ?>
"><?php echo $this->_tpl_vars['page']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?> -->
</select></td>
<td width="10"></td>
<td class="txtcourant" align="center"><input type="text" size="02" name="processCode" value="<?php echo $this->_tpl_vars['selectedPage']->getprocessCode(); ?>
" title="Enter Number like 0,1,2 etc"/> <input type="text" size="02" name="accessCode" value="<?php echo $this->_tpl_vars['selectedPage']->getaccessCode(); ?>
" title="Enter Number like 0,1,2 etc"/></td>
<td width="10"></td>
<td><select name="section" class="button" title="For Admin only">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['sectionList'],'selected' => $this->_tpl_vars['selectedPage']->getsection()), $this);?>

		</select></td>
<td width="10"></td>		
</tr>
</table>
<table class="profitTable" align="center" width="100%">
<tr class="couleurpanier" height="38">
<td class="txtcourant" align="center">MetaTitle </td>
<td class="txtcourant" align="center" ><input type="text" size="135" name="metaTitle" value="<?php echo $this->_tpl_vars['selectedPage']->getmetaTitle(); ?>
" /></td>
</tr>
<tr class="couleurpanier" height="38">
<td class="txtcourant" align="center">MetaKeyword </td>
<td class="txtcourant" align="center" ><input type="text" size="135" name="metaKeywords" value="<?php echo $this->_tpl_vars['selectedPage']->getmetaKeywords(); ?>
" /></td>
</tr>
<tr class="couleurpanier" height="38">
<td class="txtcourant" align="center">MetaDescription </td>
<td class="txtcourant" align="center" ><input type="text" size="135" name="metaDescription" value="<?php echo $this->_tpl_vars['selectedPage']->getmetaDescription(); ?>
" /></td>
</tr>
</table>
<div class="divLn"></div>
<center>
<input type="submit" name="ajouter" value="Submit" class="button"></center>
</form>
<?php echo '
<script type="text/javascript">
	function formCallback(result, form)
	{
		window.status = "valiation callback for form \'" + form.id + "\': result = " + result;
	}
	var valid = new Validation(\'page\', {immediate : true, onFormValidate : formCallback});
</script>
'; ?>

<div class="divLn"></div>