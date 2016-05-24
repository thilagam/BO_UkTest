<?php /* Smarty version 2.6.19, created on 2015-06-25 14:09:26
         compiled from gebo/template/validtemppopup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/template/validtemppopup.phtml', 45, false),)), $this); ?>
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<?php echo '
<script type="text/javascript" >
	$(document).ready(function() {
		$("#templatetype").chosen({disable_search:true});
		$("#type").chosen({disable_search:true});
		$("#active").chosen({disable_search:true});
		
		$("#templateform").validationEngine({prettySelect : true,useSuffix: "_chzn"});

	});
</script>
<style>
	input,textarea {text-transform:none;}
</style>
'; ?>


<form  action="/template/savevalidationtemplate?submenuId=ML4-SL6" method="post" id="templateform" name="templateform">	
	<table cellpadding="4" cellspacing="4" align="center">
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td>Template Type</td>
			<td><span>
				<select name="templatetype" id="templatetype" data-placeholder="Select" class="validate[required]">
					 <option value=""></option>
					<option value="redaction"<?php if ($this->_tpl_vars['valTempDetails'][0]['templatetype'] == 'redaction'): ?> selected <?php endif; ?>>R&eacute;daction</option>
					<option value="translation"<?php if ($this->_tpl_vars['valTempDetails'][0]['templatetype'] == 'translation'): ?> selected<?php endif; ?>>Traduction</option>
				</select></span>
			</td>
		</tr>
		<tr>
			<td>Type</td>
			<td><span>
				<select name="type" id="type" data-placeholder="Select" class="validate[required]" >
					 <option value=""></option>
					<option value="refuse"<?php if ($this->_tpl_vars['valTempDetails'][0]['type'] == 'refuse'): ?> selected<?php endif; ?>>Refus</option>
					<option value="information"<?php if ($this->_tpl_vars['valTempDetails'][0]['type'] == 'information'): ?> selected <?php endif; ?>>Information</option>
				</select></span>
			</td>
		</tr>
		<tr>
			<td>Titre</td>
			<td><span><input type="text" id="title" name="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['valTempDetails'][0]['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" class="span4 validate[required]"/></span></td>
		</tr>
		<tr>
			<td valign="top">Texte</td>
			<td><textarea id="content" name="content" value="" class="span4" rows="8"><?php echo ((is_array($_tmp=$this->_tpl_vars['valTempDetails'][0]['content'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</textarea></td>
		</tr>	
		<tr>
			<td>Statut</td>
			<td>
				<select name="active" id="active">
					<option value="yes"<?php if ($this->_tpl_vars['valTempDetails'][0]['active'] == 'yes'): ?> selected=selected <?php endif; ?>>Actif</option>
					<option value="no"<?php if ($this->_tpl_vars['valTempDetails'][0]['active'] == 'no'): ?> selected=selected <?php endif; ?>>Inactif</option>
                </select>  
			</td>
		</tr>
		<tr>
			<td></td>
			<td>	
				<input type="hidden" id="templateid" name="templateid" value="<?php echo $this->_tpl_vars['valTempDetails'][0]['identifier']; ?>
">
				<input type="submit" id="template_submit" name="template_submit" value="Ajouter" class="btn btn-info"/>
				<input type="button" id="close_pop" name="close_pop" value="Fermer" class="btn btn-info" data-dismiss="modal" />
			</td>
		</tr>
	</table>		
</form>
