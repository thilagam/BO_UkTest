<?php /* Smarty version 2.6.19, created on 2014-01-31 08:12:33
         compiled from translation/arrayindex.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'needle', 'translation/arrayindex.phtml', 70, false),array('modifier', 'url_decode', 'translation/arrayindex.phtml', 72, false),array('modifier', 'utf8_decode', 'translation/arrayindex.phtml', 72, false),array('modifier', 'stripslashes', 'translation/arrayindex.phtml', 72, false),array('modifier', 'replace', 'translation/arrayindex.phtml', 139, false),array('modifier', 'lower', 'translation/arrayindex.phtml', 222, false),array('modifier', 'escape', 'translation/arrayindex.phtml', 249, false),)), $this); ?>
<?php echo '
<style>
textarea
{
	width:280px;
	height:70px;
}
</style>
'; ?>


<div class="divLn"></div>
<!-- Initial Variable Declaration -->
<?php $this->assign('post', true); ?>
<?php $this->assign('indexStatus', $this->_tpl_vars['indexStatus']); ?>
<?php $this->assign('type', $this->_tpl_vars['type']); ?>
<?php $this->assign('filename', $this->_tpl_vars['filename']); ?>
<?php $this->assign('vArrayName', $this->_tpl_vars['vArrayName']); ?>
<?php $this->assign('vIndex', $this->_tpl_vars['index']); ?>
<?php $this->assign('vlfr', $this->_tpl_vars['lfr']); ?>
<?php $this->assign('vlpt', $this->_tpl_vars['lpt']); ?>
<?php $this->assign('vlen', $this->_tpl_vars['len']); ?>
<?php $this->assign('vlin', $this->_tpl_vars['lin']); ?>
<?php $this->assign('searchValue', $this->_tpl_vars['searchV']); ?>
<?php $this->assign('data', $this->_tpl_vars['arrayv']); ?>
<!-- Search Section -->
<form name="myform1" id="form1" method="POST" onsubmit="return checkform4(this);">
<center>
<h3>Array Index Management For array <?php echo $this->_tpl_vars['vArrayName']; ?>
</h3>
<table width="100%" class="fondtitre2">
	<tr>
		<td align="center" width="200">Insert Keywords to Search</td>
		<td align="left" width="200">
			<input type="text" name="find" size="35">
		</td>
		<td align="left" width="140">
			<input name="btnFind" value="Search" type="submit" onclick='checkFindText();'> 
			&nbsp;&nbsp;&nbsp;&nbsp;
			<!-- <input type='button' name='backtoDetails' value='Back To Details' onClick='goBack2details("<?php echo $this->_tpl_vars['vArrayName']; ?>
","<?php echo $this->_tpl_vars['filename']; ?>
")'> -->
		</td>
	</tr>
</table>
</center>
<div class="divLn"></div>
</form>
<!-- End Search Section -->


<!-- Body Declaration Section -->
<form action="arrayindex?arrayName=<?php echo $this->_tpl_vars['vArrayName']; ?>
&fileName=<?php echo $this->_tpl_vars['filename']; ?>
" name="myform" id="myform" method="POST">
<center>
<div class="divLn"></div>
<?php $this->assign('invisibleTable', null); ?>
<table id="myTable" align="center" class="profitTable">
	<thead>
		<tr class="fondtitre2">
			<th align="center" width='20%'>INDEX NAME</th>
			<th align="center" width='20%'>FRANCE</th>
			<th align="center" width='20%'>BRASIL</th>
			<th align="center" width='20%'>UNITED STATES</th>
			<th align="center" width='20%'>INDIA</th>
			<th align="center" width='20%'>UPDATE</th>
		</tr>
	</thead>
<?php if ($this->_tpl_vars['typefrView'] == 'Simple'): ?>
	<?php $this->assign('invisibleTable', 'invisible'); ?>
	<tr>
	<td align='left' width='20%'></td> 
	<td align='left' width='20%'>
	<?php if ($this->_tpl_vars['vlfr'] != null): ?>
		<?php if (((is_array($_tmp=$this->_tpl_vars['allLang'])) ? $this->_run_mod_handler('needle', true, $_tmp, $this->_tpl_vars['vlfr']) : smarty_modifier_needle($_tmp, $this->_tpl_vars['vlfr']))): ?>
		<?php $this->assign('tempfr', $this->_tpl_vars['resultView']['fr']); ?>
		<textarea class="inputext" name='t_fr'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tempfr'][0])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea>
		<?php else: ?>
		<textarea class="inputext" name='t_fr' class='invisible' value=''></textarea>
		<?php endif; ?>
	<?php endif; ?>
	</td>
	<td align='left' width='20%'>
	<?php if ($this->_tpl_vars['vlpt'] != null): ?>
		<?php if (((is_array($_tmp=$this->_tpl_vars['allLang'])) ? $this->_run_mod_handler('needle', true, $_tmp, $this->_tpl_vars['vlpt']) : smarty_modifier_needle($_tmp, $this->_tpl_vars['vlpt']))): ?>
		<?php $this->assign('temppt', $this->_tpl_vars['resultView']['pt']); ?>
		<textarea class="inputext" name='t_pt'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['temppt'][0])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea>
		<?php else: ?>
		<textarea class="inputext" name='t_pt' class='invisible' value=''></textarea>
		<?php endif; ?>
	<?php endif; ?>
	</td>
	<td align='left' width='20%'>
	<?php if ($this->_tpl_vars['vlen'] != null): ?>
		<?php if (((is_array($_tmp=$this->_tpl_vars['allLang'])) ? $this->_run_mod_handler('needle', true, $_tmp, $this->_tpl_vars['vlen']) : smarty_modifier_needle($_tmp, $this->_tpl_vars['vlen']))): ?>
		<?php $this->assign('tempen', $this->_tpl_vars['resultView']['en']); ?>
		<textarea class="inputext" name='t_en'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tempen'][0])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea>
		<?php else: ?>
		<textarea class="inputext" name='t_en' class='invisible' value=''></textarea>
		<?php endif; ?>
	<?php endif; ?>
	</td><td align='left' width='20%'>
	
	<?php if ($this->_tpl_vars['vlin'] != null): ?>
		<?php if (((is_array($_tmp=$this->_tpl_vars['allLang'])) ? $this->_run_mod_handler('needle', true, $_tmp, $this->_tpl_vars['vlin']) : smarty_modifier_needle($_tmp, $this->_tpl_vars['vlin']))): ?>
		<?php $this->assign('tempin', $this->_tpl_vars['resultView']['in']); ?>
		<textarea class="inputext" name='t_in'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tempin'][0])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea>
		<?php else: ?>
		<textarea class="inputext" name='t_in' class='invisible' value=''></textarea>
		<?php endif; ?>
	<?php endif; ?>
<!-- End of simple calculation -->
	</td>
	<td align='left' width='20%'>
<input type='hidden' value='simple' name='simple'>&nbsp;&nbsp;			
</td>
</tr>
<?php elseif ($this->_tpl_vars['indexFind'] == 'true'): ?>
	<?php $this->assign('j', 0); ?>
	<?php $_from = $this->_tpl_vars['resultF'][0]->children(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['grand_gen']):
?>
		<?php $_from = $this->_tpl_vars['allLang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l']):
?>
			<?php $this->assign('crap', $this->_tpl_vars['grand_gen'][0]->getName()); ?>
			<?php $this->assign('query', "/root/".($this->_tpl_vars['filename'])."/".($this->_tpl_vars['l'])."/".($this->_tpl_vars['vArrayName'])."/".($this->_tpl_vars['crap'])); ?>
			<?php $this->assign('resultChk', $this->_tpl_vars['data']->xpath($this->_tpl_vars['query'])); ?>
			<?php if ($this->_tpl_vars['l'] == 'fr'): ?>
			<?php $this->assign('resultChkfr', $this->_tpl_vars['resultChk'][0]); ?> 			<?php endif; ?>
			<?php if ($this->_tpl_vars['l'] == 'pt'): ?>
			<?php $this->assign('resultChkpt', $this->_tpl_vars['resultChk'][0]); ?>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['l'] == 'en'): ?>
			<?php $this->assign('resultChken', $this->_tpl_vars['resultChk'][0]); ?>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['l'] == 'in'): ?>
			<?php $this->assign('resultChkin', $this->_tpl_vars['resultChk'][0]); ?>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<?php if ($this->_tpl_vars['resultChkfr'] == '' && $this->_tpl_vars['resultChkpt'] == '' && $this->_tpl_vars['resultChken'] == '' && $this->_tpl_vars['resultChkin'] == ''): ?>
		<?php if (((is_array($_tmp=$this->_tpl_vars['grand_gen'][0]->getName())) ? $this->_run_mod_handler('needle', true, $_tmp, $this->_tpl_vars['find']) : smarty_modifier_needle($_tmp, $this->_tpl_vars['find']))): ?>
		<!-- when new element is entered -->
			<tr>
			<td class="txtcourant" align='left' width='20%'>
			<?php if ($this->_tpl_vars['indexStatus'] == 'No'): ?>
				<?php $this->assign('str', ((is_array($_tmp=$this->_tpl_vars['grand_gen'][0]->getName())) ? $this->_run_mod_handler('replace', true, $_tmp, 'element', '') : smarty_modifier_replace($_tmp, 'element', ''))); ?>
				<?php echo $this->_tpl_vars['str']; ?>

			<?php else: ?>
				<?php $this->assign('k1', ((is_array($_tmp=$this->_tpl_vars['grand_gen'][0]->getName())) ? $this->_run_mod_handler('replace', true, $_tmp, 'element', '') : smarty_modifier_replace($_tmp, 'element', ''))); ?>
				<?php if ($this->_tpl_vars['k1'] == ''): ?>
					<?php $this->assign('key', $this->_tpl_vars['grand_gen'][0]->getName()); ?>
				<?php else: ?>
					<?php $this->assign('key', $this->_tpl_vars['key1']); ?>
				<?php endif; ?>
				<?php echo $this->_tpl_vars['key']; ?>

			<?php endif; ?>
			</td>
			<td align='left' width='20%'>
			<input type='hidden' value='NewEntry' name='NewEntry'>
			<?php if (((is_array($_tmp=$this->_tpl_vars['langfrView'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'fr') : smarty_modifier_needle($_tmp, 'fr')) && $this->_tpl_vars['vlfr'] == 'fr'): ?>
				<?php if ($this->_tpl_vars['lang'] == 'fr'): ?>
				<?php $this->assign('crap', $this->_tpl_vars['grand_gen'][0]->getName()); ?>
				<?php $this->assign('query', "/root/".($this->_tpl_vars['filename'])."/".($this->_tpl_vars['vlfr'])."/".($this->_tpl_vars['crap'])); ?>
				<?php $this->assign('resultFr', $this->_tpl_vars['data']->xpath($this->_tpl_vars['query'])); ?>
				<?php endif; ?>
				<textarea class="inputext"  name='text_fr[<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
]'></textarea>
				<input type='hidden' name='key_fr[]'>
				<input type='hidden' value='<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
' name='find'>
			<?php else: ?>
				<input class='invisible' name='text_fr[]' value=''></input>
			<?php endif; ?>
				</td>
				<td align='left' width='20%'>			
				<?php if (((is_array($_tmp=$this->_tpl_vars['langfrView'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'pt') : smarty_modifier_needle($_tmp, 'pt')) && $this->_tpl_vars['vlpt'] == 'pt'): ?>
				<textarea class="inputext" name='text_pt[<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
]'></textarea>
				<input type='hidden' name='key_pt[]'>
				<input type='hidden' value='<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
' name='find'>
			<?php else: ?>
				<input class='invisible' name='text_pt[]' value=''></input>
			<?php endif; ?>
				</td><td align='left' width='20%'>	
				
			<?php if (((is_array($_tmp=$this->_tpl_vars['langfrView'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'en') : smarty_modifier_needle($_tmp, 'en')) && $this->_tpl_vars['vlen'] == 'en'): ?>
				<?php if ($this->_tpl_vars['lang'] == 'en'): ?>
				<?php $this->assign('crap', $this->_tpl_vars['grand_gen'][0]->getName()); ?>
				<?php $this->assign('query', "/root/".($this->_tpl_vars['filename'])."/".($this->_tpl_vars['vlen'])."/".($this->_tpl_vars['crap'])); ?>
				<?php $this->assign('resultFr', $this->_tpl_vars['data']->xpath($this->_tpl_vars['query'])); ?>
				<?php endif; ?>
				<textarea class="inputext" name='text_en[<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
]'></textarea>
				<input type='hidden' name='key_en[]'>
				<input type='hidden' value='<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
' name='find'>
			<?php else: ?>
				<input class='invisible' name='text_en[]' value=''></input>
			<?php endif; ?>
				</td><td align='left' width='20%'>
			<?php if (((is_array($_tmp=$this->_tpl_vars['langfrView'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'in') : smarty_modifier_needle($_tmp, 'in')) && $this->_tpl_vars['vlin'] == 'in'): ?>
				<textarea class="inputext"  name='text_in[<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
]'></textarea>
				<input type='hidden' name='key_in[]'>
				<input type='hidden' value='<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
' name='find'>
			<?php else: ?>
				<input class='invisible' name='text_in[]' value=''></input>
			<?php endif; ?>
				</td>
			<td align='left' width='20%'>
			<input type='hidden' value=<?php echo $this->_tpl_vars['j']; ?>
 name='trace'>
			<input type='hidden' value="<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
" name='traceIndexArr[]' >
			<a href='arrayindex?action1=delete&fileName=<?php echo $this->_tpl_vars['filename']; ?>
&arrayName=<?php echo $this->_tpl_vars['vArrayName']; ?>
&indexName=<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
&trace=<?php echo $this->_tpl_vars['j']; ?>
'> 
			<img ALT='delete row' src='/BO/images/bo/delete-icon.gif' width='20' height='20' border='0' /></a>
			<input class="button" width='20' height='20' name="indexName<?php echo $this->_tpl_vars['j']; ?>
" value="Update" type="submit">
			<input class="button" width='20' height='20' name="indx[]" value="<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
" type="hidden">
			</td>
			</tr>
		<?php endif; ?>
	<?php else: ?>
		<?php if ($this->_tpl_vars['lang'] == 'fr'): ?>
			<?php $this->assign('resultChkLang', $this->_tpl_vars['resultChkfr']); ?>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['lang'] == 'en'): ?>
			<?php $this->assign('resultChkLang', $this->_tpl_vars['resultChken']); ?>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['lang'] == 'pt'): ?>
			<?php $this->assign('resultChkLang', $this->_tpl_vars['resultChkpt']); ?>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['lang'] == 'in'): ?>
			<?php $this->assign('resultChkLang', $this->_tpl_vars['resultChkin']); ?>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['resultChkLang'] != ''): ?>
		<?php $this->assign('resultChkTemp', $this->_tpl_vars['resultChkLang']); ?>
		<?php $this->assign('find', ((is_array($_tmp=$this->_tpl_vars['find'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp))); ?>
		<?php $this->assign('getN', ((is_array($_tmp=$this->_tpl_vars['grand_gen'][0]->getName())) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp))); ?>
		<?php $this->assign('getChkTemp', ((is_array($_tmp=$this->_tpl_vars['resultChkTemp'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp))); ?>
		<?php $this->assign('getChkTemp', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['getChkTemp'])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp))); ?>
		<?php if (((is_array($_tmp=$this->_tpl_vars['getN'])) ? $this->_run_mod_handler('needle', true, $_tmp, $this->_tpl_vars['find']) : smarty_modifier_needle($_tmp, $this->_tpl_vars['find'])) || ((is_array($_tmp=$this->_tpl_vars['getChkTemp'])) ? $this->_run_mod_handler('needle', true, $_tmp, $this->_tpl_vars['find']) : smarty_modifier_needle($_tmp, $this->_tpl_vars['find']))): ?>
		<!-- when searchVarFound <?php echo $this->_tpl_vars['langfrView']; ?>
 -->
		<input type='hidden' value='search' name='searchVar'>
		<input type='hidden' value='<?php echo $this->_tpl_vars['find']; ?>
' name='find'>
		<tr>
		<td class="txtcourant" align='left' width='10%'>
			<?php if ($this->_tpl_vars['indexStatus'] == 'No'): ?>
				<?php $this->assign('str', ((is_array($_tmp=$this->_tpl_vars['resultChkTemp'][0]->getName())) ? $this->_run_mod_handler('replace', true, $_tmp, 'element', '') : smarty_modifier_replace($_tmp, 'element', ''))); ?>
				<?php echo $this->_tpl_vars['str']; ?>

			<?php else: ?>
				<?php $this->assign('k1', ((is_array($_tmp=$this->_tpl_vars['resultChkTemp'][0]->getName())) ? $this->_run_mod_handler('replace', true, $_tmp, 'element', '') : smarty_modifier_replace($_tmp, 'element', ''))); ?>
				<?php if ($this->_tpl_vars['k1'] == ''): ?>
					<?php $this->assign('key', $this->_tpl_vars['grand_gen'][0]->getName()); ?>
				<?php else: ?>
					<?php $this->assign('key', $this->_tpl_vars['k1']); ?>
				<?php endif; ?>
				<?php echo $this->_tpl_vars['key']; ?>

			<?php endif; ?>
		<?php $this->assign('ind', $this->_tpl_vars['resultChkTemp'][0]->getName()); ?>
		</td>
		<td align='left' width='20%'>
			<?php if (((is_array($_tmp=$this->_tpl_vars['langfrView'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'fr') : smarty_modifier_needle($_tmp, 'fr')) && $this->_tpl_vars['vlfr'] == 'fr'): ?>
				<?php $this->assign('resultChkTemp', $this->_tpl_vars['resultChkfr']); ?>
				<textarea class="inputext"  name='text_fr[<?php echo $this->_tpl_vars['ind']; ?>
]'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resultChkTemp'])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
				<input type='hidden' value='<?php echo $this->_tpl_vars['resultChkTemp'][0]; ?>
' name='key_fr[]'>
			<?php else: ?>
				<input class='invisible' name='text_fr[]' value=''></input>
			<?php endif; ?>
				</td><td align='left' width='20%'>
			
			<?php if (((is_array($_tmp=$this->_tpl_vars['langfrView'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'pt') : smarty_modifier_needle($_tmp, 'pt')) && $this->_tpl_vars['vlpt'] == 'pt'): ?>
				<?php $this->assign('resultChkTem', $this->_tpl_vars['resultChkpt']); ?>
				<textarea class="inputext"  name='text_pt[<?php echo $this->_tpl_vars['ind']; ?>
]'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resultChkTem'])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
				<input type='hidden' value='<?php echo $this->_tpl_vars['resultChkTemp'][0]; ?>
' name='key_pt[]'>
			<?php else: ?>
				<input name='text_pt[]' class='invisible' value=''></input>
			<?php endif; ?>
				</td><td align='left' width='20%'>
				
			<?php if (((is_array($_tmp=$this->_tpl_vars['langfrView'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'en') : smarty_modifier_needle($_tmp, 'en')) && $this->_tpl_vars['vlen'] == 'en'): ?>
				<?php $this->assign('resultChkTe', $this->_tpl_vars['resultChken']); ?>
				<textarea class="inputext"  name='text_en[<?php echo $this->_tpl_vars['ind']; ?>
]'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resultChkTe'][0])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
				<input type='hidden' value='<?php echo $this->_tpl_vars['resultChkTemp'][0]; ?>
' name='key_en[]'>
			<?php else: ?>
				<input name='text_en[]' class='invisible' value=''></input>
			<?php endif; ?>
				</td><td align='left' width='20%'>
			
			<?php if (((is_array($_tmp=$this->_tpl_vars['langfrView'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'in') : smarty_modifier_needle($_tmp, 'in')) && $this->_tpl_vars['vlin'] == 'in'): ?>
				<?php $this->assign('resultChkTemp', $this->_tpl_vars['resultChkin']); ?>
				<textarea class="inputext"  name='text_in[<?php echo $this->_tpl_vars['ind']; ?>
]'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resultChkTemp'][0])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
				<input type='hidden' value='<?php echo $this->_tpl_vars['resultChkTemp'][0]; ?>
' name='key_in[]'>
			<?php else: ?>
				<input name='text_in[]' class='invisible' value=''></input>
			<?php endif; ?>
				</td>
				<td align='left' width='20%'>
			<input type='hidden' value=<?php echo $this->_tpl_vars['j']; ?>
 name='trace'>
			<input type='hidden' value='<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
' name='traceIndexArr[]' >
			<a href='arrayindex?action1=delete&fileName=<?php echo $this->_tpl_vars['filename']; ?>
&arrayName=<?php echo $this->_tpl_vars['vArrayName']; ?>
&indexName=<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
&trace=<?php echo $this->_tpl_vars['j']; ?>
'> 
			<img ALT='delete row' src='/BO/images/bo/delete-icon.gif' width='20' height='20' border='0' /></a>
			<input class="button" width='20' height='20' name="indexName<?php echo $this->_tpl_vars['j']; ?>
" value="Update" type="submit">
			<input class="button" width='20' height='20' name="indx[]" value="<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
" type="hidden">
			</td>
			</tr>
		<?php $this->assign('j', $this->_tpl_vars['j']+1); ?>
		<?php else: ?>
		<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
	<?php $this->assign('j', 0); ?>
	<?php $_from = $this->_tpl_vars['resultF'][0]->children(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['grand_gen']):
?>
	<tr>
	<td class="txtcourant" align='left' width='20%'>
			<?php if ($this->_tpl_vars['indexStatus'] == 'No'): ?>
					<?php $this->assign('str', ((is_array($_tmp=$this->_tpl_vars['grand_gen'][0]->getName())) ? $this->_run_mod_handler('replace', true, $_tmp, 'element', '') : smarty_modifier_replace($_tmp, 'element', ''))); ?>
					<?php echo $this->_tpl_vars['str']; ?>

				<?php else: ?>
					<?php $this->assign('k1', ((is_array($_tmp=$this->_tpl_vars['grand_gen'][0]->getName())) ? $this->_run_mod_handler('replace', true, $_tmp, 'element', '') : smarty_modifier_replace($_tmp, 'element', ''))); ?>
					<?php if ($this->_tpl_vars['k1'] == null): ?>
						<?php $this->assign('key', $this->_tpl_vars['grand_gen'][0]->getName()); ?>
					<?php else: ?>
						<?php $this->assign('key', $this->_tpl_vars['k1']); ?>
						<?php echo $this->_tpl_vars['key']; ?>

					<?php endif; ?>
			<?php endif; ?>
			<?php $this->assign('ind', $this->_tpl_vars['grand_gen'][0]->getName()); ?>
			</td><td align='left' width='20%'>
			<?php if (((is_array($_tmp=$this->_tpl_vars['resultF'][0]['language'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'fr') : smarty_modifier_needle($_tmp, 'fr')) && $this->_tpl_vars['vlfr'] == 'fr'): ?>
				<?php $this->assign('query', "/root/".($this->_tpl_vars['filename'])."/".($this->_tpl_vars['vlfr'])."/".($this->_tpl_vars['vArrayName'])."/".($this->_tpl_vars['ind'])); ?>
				<?php $this->assign('resultFr', $this->_tpl_vars['data']->xpath($this->_tpl_vars['query'])); ?>
				<textarea class="inputext" name='text_fr[<?php echo $this->_tpl_vars['ind']; ?>
]'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resultFr'][0])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
				<input type='hidden' value='<?php echo $this->_tpl_vars['resultFr'][0]; ?>
' name='key_fr[]'>
			<?php else: ?>
				<input name='text_fr[]' class='invisible' visible='false' value=''></input>
			<?php endif; ?>
				</td><td align='left' width='20%'>
			
			<?php if (((is_array($_tmp=$this->_tpl_vars['resultF'][0]['language'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'pt') : smarty_modifier_needle($_tmp, 'pt')) && $this->_tpl_vars['vlpt'] == 'pt'): ?>
				<?php $this->assign('query', "/root/".($this->_tpl_vars['filename'])."/".($this->_tpl_vars['vlpt'])."/".($this->_tpl_vars['vArrayName'])."/".($this->_tpl_vars['ind'])); ?>
				<?php $this->assign('resultFr', $this->_tpl_vars['data']->xpath($this->_tpl_vars['query'])); ?>
				<textarea class="inputext"  name='text_pt[<?php echo $this->_tpl_vars['ind']; ?>
]'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resultFr'][0])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
				<input type='hidden' value='<?php echo $this->_tpl_vars['resultFr'][0]; ?>
' name='key_pt[]'>
			<?php else: ?>
				<input name='text_pt[]' class='invisible' visible='false' value=''></input>
			<?php endif; ?>
				</td><td align='left' width='20%'>

			<?php if (((is_array($_tmp=$this->_tpl_vars['resultF'][0]['language'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'en') : smarty_modifier_needle($_tmp, 'en')) && $this->_tpl_vars['vlen'] == 'en'): ?>
				<?php $this->assign('query', "/root/".($this->_tpl_vars['filename'])."/".($this->_tpl_vars['vlen'])."/".($this->_tpl_vars['vArrayName'])."/".($this->_tpl_vars['ind'])); ?>
				<?php $this->assign('resultFr', $this->_tpl_vars['data']->xpath($this->_tpl_vars['query'])); ?>
				<textarea class="inputext"  name='text_en[<?php echo $this->_tpl_vars['ind']; ?>
]'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resultFr'][0])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
				<input type='hidden' value='<?php echo $this->_tpl_vars['resultFr'][0]; ?>
' name='key_en[]'>
			<?php else: ?>
				<input name='text_en[]' class='invisible' visible='false' value=''></input>
			<?php endif; ?>
				</td><td align='left' width='20%'>

			<?php if (((is_array($_tmp=$this->_tpl_vars['resultF'][0]['language'])) ? $this->_run_mod_handler('needle', true, $_tmp, 'in') : smarty_modifier_needle($_tmp, 'in')) && $this->_tpl_vars['vlin'] == 'in'): ?>
				<?php $this->assign('query', "/root/".($this->_tpl_vars['filename'])."/".($this->_tpl_vars['vlin'])."/".($this->_tpl_vars['vArrayName'])."/".($this->_tpl_vars['ind'])); ?>
				<?php $this->assign('resultFr', $this->_tpl_vars['data']->xpath($this->_tpl_vars['query'])); ?>
				<textarea class="inputext"  name='text_in[<?php echo $this->_tpl_vars['ind']; ?>
]'><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resultFr'][0])) ? $this->_run_mod_handler('url_decode', true, $_tmp) : smarty_modifier_url_decode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
				<input type='hidden' value='<?php echo $this->_tpl_vars['resultFr'][0]; ?>
' name='key_in[]'>
			<?php else: ?>
				<input name='text_in[]' class='invisible' visible='false' value=''></input>
			<?php endif; ?>
				</td><td align='left' width='20%'>
			<input type='hidden' value='<?php echo $this->_tpl_vars['j']; ?>
' name='trace' >
			<input type='hidden' value='<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
' name='traceIndexArr[]' >
			<input type='hidden' value='<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
' name='indexName' >
			&nbsp;&nbsp;
			<a name='Delete' onclick='return disp_confirm2(name)' href='arrayindex?action1=delete&fileName=<?php echo $this->_tpl_vars['filename']; ?>
&arrayName=<?php echo $this->_tpl_vars['vArrayName']; ?>
&indexName=<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
&trace=<?php echo $this->_tpl_vars['j']; ?>
'> 
			<img ALT='delete row' src='/BO/images/bo/delete-icon.gif' width='20' height='20' border='0' /></a>
			</td>
			<td align='left' width='20%'>
				<input class="button" width='20' height='20' name="indexName<?php echo $this->_tpl_vars['j']; ?>
" value="Update" type="submit">
				<input class="button" width='20' height='20' name="indx[]" value="<?php echo $this->_tpl_vars['grand_gen'][0]->getName(); ?>
" type="hidden">
			</td>
			</tr>
		<?php $this->assign('j', $this->_tpl_vars['j']+1); ?>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</table>
<input type='hidden' value='<?php echo $this->_tpl_vars['j']; ?>
' name='j' >
<div class="divLn"></div>
<input type='button' name='backtoDetails' value='Back To Details' onClick='goBack2details("<?php echo $this->_tpl_vars['vArrayName']; ?>
","<?php echo $this->_tpl_vars['filename']; ?>
")'>
&nbsp;&nbsp;
<input type='button' name='back' value='Back' onClick='goBack3("<?php echo $this->_tpl_vars['filename']; ?>
")'>
&nbsp;&nbsp;
<input class="<?php echo $this->_tpl_vars['invisibleS']; ?>
" name="submit" value="Submit" type="submit">
<div class="divLn"></div>
</center>
<div class="divLn"></div>
<table class='<?php echo $this->_tpl_vars['invisibleTable']; ?>
' width="300" align="left" >
	<tr class="fondtitre2">
		<td align="center" colspan="2">ADD A NEW INDEX</td>
	</tr>
	<tr>
		<td align="left">
	<?php if ($this->_tpl_vars['typefrView'] != 'Simple'): ?>
		<?php if ($this->_tpl_vars['vlfr'] == 'fr'): ?>
			<input type="checkbox" name="countryLang[]" value="fr" checked="checked">fr
			<div class="divLn"></div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['vlpt'] == 'pt'): ?>
			<input type="checkbox" name="countryLang[]" value="pt" checked="checked">pt
			<div class="divLn"></div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['vlen'] == 'en'): ?>
			<input type="checkbox" name="countryLang[]" value="en" checked="checked">en
			<div class="divLn"></div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['vlin'] == 'in'): ?>
			<input type="checkbox" name="countryLang[]" value="in" checked="checked">in
			<div class="divLn"></div>
		<?php endif; ?>
		</td><td align="left">
		<?php if ($this->_tpl_vars['indexStatus'] == 'No'): ?>
			<input type="text" class="invisible" name="neword" value='element<?php echo $this->_tpl_vars['count']; ?>
'>
			<input type='hidden' name='indexNo' value='indexNo'>
		<?php else: ?>
			<input type="text" name="neword" class='<?php echo $this->_tpl_vars['indexNo']; ?>
'>&nbsp;&nbsp;
		<?php endif; ?>
			<input type='submit' name='validate' value='Insert' onclick='return checkform5(this.form);'>
	<?php endif; ?>	
</td>
</tr>
</table>
<div class="divLn"></div>
<div class="divLn"></div>
</form>