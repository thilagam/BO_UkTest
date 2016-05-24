<?php /* Smarty version 2.6.19, created on 2014-07-02 14:20:54
         compiled from gebo/ao/pollbrief2.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/ao/pollbrief2.phtml', 151, false),array('modifier', 'utf8_encode', 'gebo/ao/pollbrief2.phtml', 151, false),array('modifier', 'stripslashes', 'gebo/ao/pollbrief2.phtml', 151, false),array('modifier', 'date_format', 'gebo/ao/pollbrief2.phtml', 194, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="utf-8" src="/BO/script/datempicker.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#articletype").chosen({ disable_search: true });	
		$("#missionmange").chosen({ disable_search: true });	
		$("#clientype").chosen({ disable_search: true });	
	
       $(\'#start_date\').datetimepicker({
			showSecond: true,
			timeFormat: \'hh:mm:ss\',
			minDate: new Date(),
			stepHour: 1,
			stepMinute: 1,
			stepSecond: 10,
			timeOnlyTitle: \'Choisir une heure\',
			timeText: \'Heure\',
			hourText: \'Heures\',
			minuteText: \'Minutes\',
			secondText: \'Secondes\',
			currentText: \'Maintenant\',
			closeText: \'Termin&eacute;\',

		});
		
		$(\'#workcheck\').toggleButtons({
	 	label:{enabled: "Oui",disabled: "Non"},
		onChange: function () {
			var type=$("input[name=\'work\']:checked").val();
			if(type=="yes")
				$("#hasworked").show();
			else
				$("#hasworked").hide();
		}
		});
	});	
		
	function validate_brief()
	{
		var err=0;
		var type=$("input[name=\'work\']:checked").val();
		var price=$("#price").val();
		var potential=$("#potential").val();
		var daylimit=$("#daylimit").val();
		
		if(type=="yes")
		{
			var year=$("#year").val();
			var volume=$("#volume").val();
			if(isNaN(year) || year=="")
			{
				$("#year").css("border-color","red");
				if(isNaN(volume))
					$("#yearerr").html("Merci d\'ins&eacute;rer un chiffre");
				$("#year").focus();
				err++;
			}
			else
			{
				$("#year").css("border-color","");				
				$("#yearerr").html("");
			}	
			if(isNaN(volume) || volume=="")
			{
				$("#volume").css("border-color","red");
				if(isNaN(volume))
					$("#volumeerr").html("Merci d\'ins&eacute;rer un chiffre");
				$("#volume").focus();
				err++;
			}
			else
			{
				$("#volume").css("border-color","");
				$("#volumeerr").html("");
			}	
		}
		
		if(isNaN(price))
		{
			$("#price").css("border-color","red");
			$("#priceerr").html("Merci d\'ins&eacute;rer un chiffre");
			$("#price").focus();
			err++;
		}
		else
		{
			$("#price").css("border-color","");
			$("#priceerr").html("");
		}	
		if(isNaN(potential))
		{
			$("#potential").css("border-color","red");
			$("#potentialerr").html("Merci d\'ins&eacute;rer un chiffre");
			$("#potential").focus();
			err++;
		}
		else
		{
			$("#potential").css("border-color","");
			$("#potentialerr").html("");
		}
		if(isNaN(daylimit))
		{
			$("#daylimit").css("border-color","red");
			$("#daylimiterr").html("Merci d\'ins&eacute;rer un chiffre");
			$("#daylimit").focus();
			err++;
		}
		else
		{
			$("#daylimit").css("border-color","");
			$("#daylimiterr").html("");
		}
		if(err==0)
		{
			document.pollbriefform.submit();
			return true;
		}
		else
			return false;
	}
</script>

'; ?>
	

<form name="pollbriefform" id="pollbriefform" method="post" action="/ao/pollmoderateusers?submenuId=ML2-SL17&poll=<?php echo $this->_tpl_vars['poll']; ?>
&addbrief=1">
	<table cellpadding="4" cellspacing="2" width="85%" align="center">
		<tr>
			<td valign="top">A-t-on d&eacute;j&agrave; travaill&eacute; avec le client </td>
			<td>
				<div id="workcheck">
					<input type="checkbox" name="work" id="work" value="yes" <?php if ($this->_tpl_vars['briefdetail'][0]['work'] == 'yes' || $this->_tpl_vars['briefdetail'][0]['work'] == ""): ?>checked="checked"<?php endif; ?>/>
				</div>
			</td>
		</tr>
		<tr id="hasworked" <?php if ($this->_tpl_vars['briefdetail'][0]['work'] == 'no'): ?>style="display:none;"<?php endif; ?>>
			<td colspan="2">
				<div class="well">
				<table cellpadding="4" cellspacing="2" width="90%" align="center" >
					<tr>
						<td valign="top">En quelle ann&eacute;e ?</td>
						<td><input type="text" name="year" id="year" maxlength="4" value="<?php echo $this->_tpl_vars['briefdetail'][0]['year']; ?>
"/><div style="color:red;" id="yearerr"></div></td>
					</tr>
					<tr>
						<td valign="top">Volum&eacute;trie de l'ancien contrat ?</td>
						<td><input type="text" name="volume" id="volume" value="<?php echo $this->_tpl_vars['briefdetail'][0]['volume']; ?>
"/><div style="color:red;" id="volumeerr"></div></td>
					</tr>
					<tr>
						<td valign="top">Type d'articles de l'ancien contrat ?</td>
						<td><?php echo smarty_function_html_options(array('name' => 'articletype','id' => 'articletype','selected' => $this->_tpl_vars['briefdetail'][0]['articletype'],'options' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['ep_art_type'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp))), $this);?>
</td>
					</tr>
					<tr>
						<td valign="top">Tarif de vente moyen par article ?</td>
						<td><input type="text" name="price" id="price" value="<?php echo $this->_tpl_vars['briefdetail'][0]['price']; ?>
"/><div style="color:red;" id="priceerr"></div></td>
					</tr>
					<tr>
						<td valign="top">Quel &eacute;tait le niveau d'exigence du client ?</td>
						<td><input type="text" name="level" id="level" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['briefdetail'][0]['level'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" /></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
				</table>
				</div>
			</td>
		</tr>
		<tr>
			<td>Volum&eacute;trie potentielle d'articles sur l'ann&eacute;e</td>
			<td><input type="text" name="potential" id="potential" value="<?php echo $this->_tpl_vars['briefdetail'][0]['potential']; ?>
" /><div style="color:red;" id="potentialerr"></div></td>
		</tr>
		<tr>
			<td>Y a-t-il un potentiel annexe &agrave; cette mission</td>
			<td><input type="text" name="potentialannexe" id="potentialannexe" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['briefdetail'][0]['potentialannexe'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" /></td>
		</tr>
		<tr>
			<td>Type de clients ?</td>
			<td> 
				<select name="clientype" id="clientype">
					<option value="seo" <?php if ($this->_tpl_vars['briefdetail'][0]['clientype'] == 'seo'): ?>selected<?php endif; ?>>SEO</option>
					<option value="edit" <?php if ($this->_tpl_vars['briefdetail'][0]['clientype'] == 'edit'): ?>selected<?php endif; ?>>Edito</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Qui va g&eacute;rer la mission chez le client ? </td>
			<td>
				<select name="missionmange" id="missionmange">
					<option value="contract" <?php if ($this->_tpl_vars['briefdetail'][0]['missionmange'] == 'contract'): ?>selected<?php endif; ?>>Signataire du contrat</option>
					<option value="editorial" <?php if ($this->_tpl_vars['briefdetail'][0]['missionmange'] == 'editorial'): ?>selected<?php endif; ?>>&eacute;quipe de r&eacute;daction interne</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Date de d&eacute;marrage souhait&eacute;e </td>
			<td><input type="text" id="start_date" name="start_date" readonly="readonly" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['briefdetail'][0]['start_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y %H:%M:%S') : smarty_modifier_date_format($_tmp, '%d/%m/%Y %H:%M:%S')); ?>
" /></td>
		</tr>
		
		<tr>
			<td>Temps imparti pour la mission (en nombre de jours) </td>
			<td><input type="text" id="daylimit" name="daylimit" value="<?php echo $this->_tpl_vars['briefdetail'][0]['daylimit']; ?>
" /><div style="color:red;" id="daylimiterr"></div></td>
		</tr>
		
		<tr>
			<td valign="top">Commentaire libre</td>
			<td> 
				<textarea name="comment" id="comment" cols="22" rows="6" ><?php echo ((is_array($_tmp=$this->_tpl_vars['briefdetail'][0]['comment'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</textarea>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="2" align="center">
				<input type="button" name="cancel" value="Annuler" class="btn btn-info" data-dismiss="modal"></input>
				<input type="button" name="submit_pollbrief" value="Terminer" class="btn btn-info" onClick="return validate_brief();"></input>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
	</table>
	<input type="hidden" name="poll" id="poll" value="<?php echo $this->_tpl_vars['poll']; ?>
" />
</form>