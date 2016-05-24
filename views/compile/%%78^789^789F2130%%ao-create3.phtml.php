<?php /* Smarty version 2.6.19, created on 2015-06-25 14:23:58
         compiled from gebo/ao/ao-create3.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/ao/ao-create3.phtml', 116, false),array('modifier', 'stripslashes', 'gebo/ao/ao-create3.phtml', 244, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/datempicker.js"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript"> 
(function($) {
		$.fn.extend( {
			limiter: function(limit, elem) {
				$(this).on("keyup focus", function() {
					setCount(this, elem);
				});
				function setCount(src, elem) {
					var chars = src.value.length;
					if (chars > limit) {
						src.value = src.value.substr(0, limit);
						chars = limit;
					}
					elem.html( chars+\'/\'+(limit - chars) );
				}
				setCount($(this)[0], elem);
			}
		});
	})(jQuery);
	
$(document).ready(function() {
		
		// Timepicker
		 var today = new Date();
		
            $(\'#publishtime\').datetimepicker({
				showSecond:false,
				//defaultValue: new Date(),
				numberOfMonths: 1,
				minDate: 1,
				maxDate: new Date(today.getTime() + (24 * 60 * 60 * 1000)), 
				timeFormat: \'hh:mm\',
				ampm: false,
				stepHour: 1,
				hourMin:10,
				hourMax:today.getHours(),
				hour:today.getHours(),
				minute:today.getMinutes(),
				timeOnlyTitle: \'Choose hour\',
				timeText: \'Hour\',
				hourText: \'Hours\',
				currentText: \'Done\',
				closeText: \'Close\',
            });
	
	
	
	$(".uni_style").uniform();  
	$(\'#mail_sendcheck\').toggleButtons({
	 	label:{enabled: "Oui",disabled: "Non"}
    });
	$("#paytype").chosen({ disable_search: true });
	setpublishnow();
	
	var aotype=$("#aotype").val();
	
	if(aotype!="private")
	{
		var elem = $("#missioncomment_count");
		$("#missioncomment").limiter(160, elem);
	}
	
	var elem = $("#fbcomment_count");
	$("#fbcomment").limiter(125, elem);
	
	/*mailcontriblist(1);
	$("#mailcontrib_lang").multiselect();
    $("#mailcontrib_lang").multiselectfilter();
	
	$("#mailcontribcheck").multiselect();  
    $("#mailcontribcheck").multiselectfilter();
	
	$(".ui-multiselect-all").click(function() 
	{
		mailcontriblist(1);
	});*/
});
</script>
<style>
	input,textarea {text-transform:none !important;}
</style>
'; ?>


<form action="/ao/ao-create4?submenuId=ML2-SL3" name="creation_step3" id="creation_step3" method="POST" enctype="multipart/form-data" >
	<div class="row-fluid">
  		<div class="span12">
    		<h3 class="heading">
				<span align="right"> 
					<img src="/BO/theme/gebo/img/path-3.png" width="120" height="35" border="0" usemap="#Map" style="float:right;" />
					<map name="Map" id="Map">
					<?php if ($this->_tpl_vars['nav_1'] == 1): ?>
						<area shape="circle" coords="18,18,17" href="/ao/ao-create1?submenuId=ML2-SL3"/>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['nav_2'] == 1): ?>
						<?php if ($this->_tpl_vars['missiontest'] == 'on'): ?>
							<area shape="circle" coords="60,18,17" href="/ao/ao-create2test?submenuId=ML2-SL3"/>
						<?php else: ?>
							<?php if ($this->_tpl_vars['articletype'] == 'lot'): ?>
								<area shape="circle" coords="60,18,17" href="/ao/ao-create2lot?submenuId=ML2-SL3"/>
							<?php else: ?>
								<area shape="circle" coords="60,18,17" href="/ao/ao-create2?submenuId=ML2-SL3"/>
							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
					</map>
				</span>
			</h3>
			<table align="center" cellpadding="2" cellspacing="2" width="80%" >
				<tr <?php if ($this->_tpl_vars['ao_type'] == 'private'): ?>style="display:none;"<?php endif; ?>>
					<td>Date and time of publication</td>
					<td>
						<input type="text" name="publishtime" id="publishtime" value="<?php echo $this->_tpl_vars['tommorow']; ?>
" readonly class="span5" onChange="setpublishnow('1');"/>
						<?php if ($this->_tpl_vars['ao_type'] == 'private' || $this->_tpl_vars['usertype'] == 'superadmin' || ( in_array ( 'senior' , $this->_tpl_vars['contribtype'] ) && count($this->_tpl_vars['contribtype']) == 1 )): ?>
							<span style="vertical-align:top;"><input type="checkbox" name="publishnow" id="publishnow" value="yes" onClick="setpublishnow('0');" checked /> Maintenant</span>
						<?php endif; ?>
					</td>
				</tr>	
				<tr><td>&nbsp;</td></tr> 
				<tr style="font-family:Arial;font-size:16px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC6600;text-align:center;padding-bottom:20px;"><td colspan="2"  <?php if ($this->_tpl_vars['ao_type'] == 'private' || ( in_array ( 'senior' , $this->_tpl_vars['contribtype'] ) && count($this->_tpl_vars['contribtype']) == 1 )): ?>style="display:none;"<?php endif; ?> id="mailhighlight">L'AO sera mise en avant dans la Newsletter de demain, 10h.</td></tr>
				<tr id="nltitle_block" <?php if ($this->_tpl_vars['ao_type'] == 'private' || ( in_array ( 'senior' , $this->_tpl_vars['contribtype'] ) && count($this->_tpl_vars['contribtype']) == 1 )): ?>style="display:none;"<?php endif; ?>>
					<td>Name for the newsletter</td>
					<td>
						<input type="text" name="nltitle" id="nltitle" value="<?php echo $this->_tpl_vars['nltitle']; ?>
" size="50"/>
					</td>
				</tr>
				<tr><td colspan="2" style="font-weight:bold;padding-bottom:15px;padding-bottom:15px;" id="mailtext"><?php if ($this->_tpl_vars['ao_type'] == 'private' || ( in_array ( 'senior' , $this->_tpl_vars['contribtype'] ) && count($this->_tpl_vars['contribtype']) == 1 )): ?>Cet email sera envoy&eacute; &agrave; tous les r&eacute;dacteurs s&eacute;lectionn&eacute;s en &eacute;tape 1<?php else: ?>Cet email sera envoy&eacute; &agrave; tous les r&eacute;dacteurs qui ont souscrit &agrave; l'alerte <?php endif; ?></td></tr>	
				
				<!--send from edit-place.com -->
				<tr>	
					<td valign="top">From</td> 
					<td>
						<select name="sendfrom" id="sendfrom">
							<option value="editorial">Editorial</option>
							<option value="me">Me</option>
						</select>
					</td>
				</tr>
				
				<tr>	
					<td valign="top">Email Subject</td> 
					<td>
						<div id="mailcontent" <?php if ($this->_tpl_vars['mail_send_contrib'] == 'no'): ?>style="display:none;"<?php endif; ?>>
							<input type="text" size="70" name="mailsubject" id="mailsubject" style="width:440px"/> 
							<div style="height:10px;"></div>
							<textarea rows="4" cols="50" name="mailcontrib" id="mailcontrib" ></textarea>  
						</div>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				
				<!-----------------------------------------------Corrector mail ----------------------------->
				<?php if ($this->_tpl_vars['correction'] == 'on'): ?>
					<tr><td colspan="2" style="font-weight:bold;padding-bottom:15px;padding-bottom:15px;">Cet email sera envoy&eacute; &agrave; tous les correcteurs s&eacute;lectionn&eacute;s en &eacute;tape 1</td></tr>	
					
					<!--send from edit-place.com -->
					<tr>	
						<td valign="top">From</td> 
						<td>
							<select name="correctorsendfrom" id="correctorsendfrom">
								<option value="editorial">Editorial</option>
								<option value="me">Me</option>
							</select>
						</td>
					</tr>
					
					<tr>	
						<td valign="top">Objet de l'email</td> 
						<td>
							<div id="correctormail">
								<input type="text" size="70" name="correctormailsubject" id="correctormailsubject" style="width:440px"/> 
								<div style="height:10px;"></div>
								<textarea rows="4" cols="50" name="correctormailcontent" id="correctormailcontent" ></textarea>  
							</div>
						</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
				<?php endif; ?>
				<!-- Contributor mail -->
				<!-- 
				<?php if ($this->_tpl_vars['ao_type'] != 'private'): ?>
				<tr id="mailcontribblock" align="center">
					<td colspan="2">
						<div class="well" style="width:600px">  
							<table align="center" cellpadding="4" cellspacing="4" width="90%">  
								<tr><td colspan="2"><b>Select the contributors who send email</b></td></tr>
								<tr>
									<td>Language</td>
									<td> 
										<select name="mailcontrib_lang[]" id="mailcontrib_lang" onChange="mailcontriblist(0);" multiple="multiple" style="width:250px;">
											<?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
												<?php if (in_array ( $this->_tpl_vars['langkey'] , $this->_tpl_vars['contrib_langarray'] )): ?>
													<option value="<?php echo $this->_tpl_vars['langkey']; ?>
" selected><?php echo $this->_tpl_vars['langitem']; ?>
</option>
												<?php else: ?>
													<option value="<?php echo $this->_tpl_vars['langkey']; ?>
"><?php echo $this->_tpl_vars['langitem']; ?>
</option>
												<?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>
										</select>
									</td>
								</tr>
								<tr>
									<td valign="top">Writers</td>
									<td valign="top" id="contribsmail">
										<select name="mailcontribcheck[]" id="mailcontribcheck" multiple="multiple"> 
										<?php $_from = $this->_tpl_vars['mailcontriblist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contrib']):
?>
											<option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
" selected><?php echo $this->_tpl_vars['contrib']['name']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
										</select>
										<div id="mailcontrib_err" style="color:red;"></div>
									</td>
								</tr>
							</table>
						</div>		
					</td>
				</tr>
				<?php endif; ?>
				-->
				<tr>	
					<td>Send an email to Client</td>
					<td>
						<div id="mail_sendcheck">
							<input type="checkbox" name="mail_send" id="mail_send" />
						</div>
					</td>
				</tr>
				<tr>	
					<td>Amount payable on the site</td>
					<td>
						<select name="paytype" id="paytype" onChange="fncontribpay();" style="width:80px">
							<option value="1" <?php if ($this->_tpl_vars['paytype'] == '1'): ?>selected<?php endif; ?>>%</option>
							<option value="2" <?php if ($this->_tpl_vars['paytype'] == '2'): ?>selected<?php endif; ?>>Valeur</option>
						</select>
						<input type="text" name="paypercent" id="paypercent" value="<?php echo $this->_tpl_vars['paypercent']; ?>
" class="span2" style="width:80px;margin-top:-12px"/>
						<input type="text" name="payvalue" id="payvalue" value="<?php echo $this->_tpl_vars['payvalue']; ?>
" style="display: none;width:80px;margin-top:-12px" class="span2"/>
						<span style="vertical-align:top;">(0 or 100% of the value)</span>
						<div id="payerror" style="color:red;"></div>  
					</td>				
				</tr>	
				<tr>
					<td valign="top">Comment displayed on <?php if ($this->_tpl_vars['ao_type'] != 'private'): ?>the Newsletter and <?php endif; ?> the platform <?php if ($this->_tpl_vars['ao_type'] != 'private'): ?>(Mandatory - 100 car. minimum - 160 car. maximum)<?php endif; ?></td>
					<td valign="top">
						<textarea name="missioncomment" id="missioncomment" style="width:390px;" <?php if ($this->_tpl_vars['ao_type'] != 'private'): ?>maxlength="160"<?php endif; ?> cols="100"><?php echo ((is_array($_tmp=$this->_tpl_vars['missioncomment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea>
						<span id="missioncomment_count" style="vertical-align:top"></span>
						<div id="missioncomment_error" style="color:red;"></div> 						 
					</td>
				</tr>
				<tr>
					<td valign="top">Comments to be posted on Facebook and Twitter (Required - 100 as minimum - 125 as maximum)</td>
					<td valign="top">
						<textarea name="fbcomment" id="fbcomment" style="width:390px;" maxlength="125" cols="100" <?php if ($this->_tpl_vars['ao_type'] == 'private' || $this->_tpl_vars['premium_option'] == 'liberte'): ?>disabled<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['fbcomment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea>
						<span id="fbcomment_count" style="vertical-align:top"></span>
						<div id="fbcomment_error" style="color:red;"></div>						 
					</td>
				</tr>
				<tr>
					<td>Duplicate this mission</td>
					<td>
						<input type="checkbox" name="duplicateao" id="duplicateao" value="yes" />
					</td>
				</tr>
				<tr <?php if ($this->_tpl_vars['missiontest'] == 'on'): ?>style="display:none;"<?php endif; ?>>
					<td valign="top">Save as template</td>
					<td valign="top">
						<input type="checkbox" name="saveao" id="saveao" value="yes" onClick="fnsaveao();" style="vertical-align:top" />
						<span id="selectsave" style="display:none;"><input type="text" name="templatename" id="templatename"/></span>
						<span id="save_err"></span>
					</td>
				</tr>
			</table>
		</div>
		<div style="float:right;padding:30px">
			<button type="submit" value="Aller en Etape 4" class="btn btn-info" id="aoSubmit" onClick="return validate_aocreation_step3();">Go to Step 4</button>
		</div>
		<input type="hidden" id="premium" name="premium" value="<?php echo $this->_tpl_vars['premium_option']; ?>
" />
		<input type="hidden" name="totcost" id="totcost" value="<?php echo $this->_tpl_vars['total_price']; ?>
"/>
		<input type="hidden" id="aotype" name="aotype" value="<?php echo $this->_tpl_vars['ao_type']; ?>
" />
		<input type="hidden" id="sconly" name="sconly" value="<?php echo $this->_tpl_vars['sconly']; ?>
" />
		<input type="hidden" id="correction" name="correction" value="<?php echo $this->_tpl_vars['correction']; ?>
" />
	</div>
</form>	