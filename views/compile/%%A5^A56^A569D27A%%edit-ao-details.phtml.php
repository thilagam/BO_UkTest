<?php /* Smarty version 2.6.19, created on 2015-12-16 08:23:25
         compiled from gebo/ongoing/edit-ao-details.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/ongoing/edit-ao-details.phtml', 248, false),array('modifier', 'strip_tags', 'gebo/ongoing/edit-ao-details.phtml', 349, false),array('function', 'html_options', 'gebo/ongoing/edit-ao-details.phtml', 459, false),)), $this); ?>
<?php echo '
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/jquery.validate.min.js"></script>
<!--/BO/theme/gebo/lib/validation/jquery.validate.min.js-->
<script type="text/javascript" >
    $(document).ready(function() {
		$(".uni_style").uniform();
        $("#publish_language").chosen();
		$(\'.toggle-check\').toggleButtons({
			label:{enabled: "Oui",disabled: "Non"},
			onChange: function () {
				var type=$("input[name=\'correction_type\']:checked").val();
				if(type=="private")
				{
					$("#corrlangblock").show();
					$("#corrblock").show();
				}
				else
				{
					$("#corrlangblock").hide();
					$("#corrblock").hide();
				}
			}
		});		
		
		$(".pop_over").popover({trigger: \'hover\'});
		$("#clanguage_filterao").chosen();
		$("#favcorrectorcheckao").chosen();
		
		$("#submit_option").chosen({disable_search: true });
		$("#resubmit_option").chosen({disable_search: true });	
		
		$("#edit_aoform").validate({
				onkeyup: false,				
				errorClass: \'error\',
				validClass: \'valid\',
				highlight: function(element) {
					$(element).closest(\'span\').addClass("f_error");
				},
				unhighlight: function(element) {
					$(element).closest(\'span\').removeClass("f_error");
				},				
                errorPlacement: function(error, element) {
                    $(element).closest(\'div\').append(error);
                },
				rules: {
						title: {
								required: true,
								minlength: 6
								},
						subjunior_time:"required",	
						junior_time:"required",	
						senior_time:"required",	
						jc0_resubmission:"required",	
						jc_resubmission:"required",	
						sc_resubmission:"required",
						participation_time:"required",
                        crtjunior_time:"required",
                        crtsenior_time:"required",
                        crtjc_resubmission:"required",
                        crtsc_resubmission:"required",
                        crtparticipation_time:"required",
                        correction_pricemin:"required",
                        correction_pricemax:"required",
					},
					submitHandler: function(form) { 
						var errorcnt=0;
						var max_limit=$(\'#refusal_reasons_max\').val();
						if($("#correction").is(\':checked\'))
						{
							if($("input[name=\'correction_type\']:checked").val()=="private")
							{
								var favcheck1=$("select#favcorrectorcheckao").val();
								if (favcheck1<1)
								{
									alert(\'Please select private proofreaders\');
									errorcnt++;
								}
							}
					   }
					   
						if($(\'input:radio[name=product]:checked\').val()=="redaction")
						{
							var contenttype = $(\'input:checkbox:checked.redactionrefusal\').map(function () {return this.value;}).get(); 
							if(contenttype.length==0 || contenttype.length>max_limit)
							{
								$("#refusal_err").html("Merci de s&eacute;lectionner de 1 &agrave; "+max_limit+" crit&egrave;res");
								errorcnt++;
							}
							else
								$("#refusal_err").html("");
						}
						else
						{
							var contenttype = $(\'input:checkbox:checked.translationrefusal\').map(function () {return this.value;}).get(); 
							if(contenttype.length==0 || contenttype.length>max_limit)
							{
								$("#refusal_err").html("Merci de s&eacute;lectionner de 1 &agrave; "+max_limit+" crit&egrave;res");
								errorcnt++;
							}
							else
								$("#refusal_err").html("");
						}
					   
						if(errorcnt==0)
							form.submit();
						else
							return false;
					}
		});
        $("#crtsubmit_option").chosen({ allow_single_deselect: true,search_contains: true});
        $("#crtresubmit_option").chosen({ allow_single_deselect: true,search_contains: true});

	});
	function setCorrection()
    {
        if($("#correction").is(\':checked\')){

                $("#crttype").show();
        }
        else{
            smoke.confirm("Please set corrector profile preferences in article level",function(e){  // alert(e);
                if (e)
                {
                    $("#correction").prop(\'checked\',false);
                    $("#crttype").hide();
                }
                else
                {
                    $("#correction").prop(\'checked\',true);
                    $("#crttype").show();
                }
            });

        }


    }
var total_premium_services_value=0;
function services_update_popup(node,index,value,flag,id)
{   
		if(node==\'parent\')
		{ 
			if(index==0)
			{
				$(\'#prem input[type=checkbox]\').removeAttr(\'checked\');
				$(\'#TotPrem\').val("0");
				total_premium_services_value=0;			
				$(\'#prem input[type=checkbox]\').attr(\'disabled\',\'true\');
				$(\'#prem span\').removeClass(\'uni-checked\');
				$(\'#premium_\'+index+\' input[type=checkbox]\').removeAttr(\'disabled\');
			}	
			else
			{
				$(\'#TotPrem\').val("0");
				total_premium_services_value=0;	
				$(\'#premium_service_\'+index+\' input[type=checkbox]\').removeAttr(\'disabled\');
			}
				
				
		}
	
		var myArray = value.split(\'_\'); 
		var val=myArray[1];
		if(flag.checked == true)
		{ 
			total_premium_services_value=$(\'#TotPrem\').val();
			total_premium_services_value=parseFloat(total_premium_services_value)+parseFloat(val);
		}	
		else
		{ 
			total_premium_services_value=$(\'#TotPrem\').val();
			total_premium_services_value=parseFloat(total_premium_services_value)-parseFloat(val);
		}
		 
	$(\'#TotPrem\').val(total_premium_services_value);
	
}

function loadvalidationtemplate(vtype,mode)
{ 
	$.ajax({
		type: \'GET\',
		url: \'/ao/loadvalidationtemplates\',
		data: \'validationtype=\' + vtype+\'&mode=\'+mode,
		success: function(data)
		{ 
			$("#validationtemplateblock").html(data);
		}
	});
}
</script>	
<style type="text/css">
.form-horizontal .control-label {
    float: left;
    padding-top: 5px;
    text-align: right;
    width: 42%;
	font-weight:bold;
	cursor:default;
}
.form-horizontal .controls {
    margin-left: 47%;
}
.popover-title{
	padding: 8px 14px;
}
.popover-content
{
    padding: 9px 14px;
}
.add-on{
    background-color: #EEEEEE;
    border: 1px solid #CCCCCC;
    display: inline-block;
    font-size: 14px;
    font-weight: normal;
    height: 20px;
    line-height: 20px;
    min-width: 16px;
    padding: 4px 5px;
    text-align: center;
    text-shadow: 0 1px 0 #FFFFFF;
    width: auto;
	border-radius: 4px 0 0 4px;
}
.append-input {
    border-radius: 0 4px 4px 0;
    margin-bottom: 0;
    margin-left: -5px !important
    margin-top: -4px !important;
    position: relative;
    vertical-align: top;
    z-index: -8;
}
.error {  display: none !important;}
</style>
'; ?>


<?php if ($this->_tpl_vars['aoDetails'] | @ count > 0): ?>
<?php $_from = $this->_tpl_vars['aoDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['aoDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['aoDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['delivery']):
        $this->_foreach['aoDetails']['iteration']++;
?>
	<div class="row-fluid">
		<div class="span12">		
			<form autocomplete="off" class="form-horizontal form_validation_ttip" enctype="multipart/form-data" method="POST" name="edit_aoform" id="edit_aoform" action="/ongoing/save-delivery">
				<fieldset>
					<div class="control-group formSep">
						<label class="control-label">Name this Delivery <span class="f_req">*</span></label>
						<div class="controls">
							<span><input type="text" name="title" style="text-transform: none;" id="title" class="input-xlarge" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" /></span>
						</div>
					</div>
					<div class="control-group formSep">
						<label for="fileinput" class="control-label">Plagiarism <span class="f_req">*</span></label>
						<div class="controls">
							<div class="toggle-check">
								<input type="checkbox" disabled name="plagiarism_check" <?php if ($this->_tpl_vars['delivery']['plagiarism_check'] == 'yes'): ?>checked<?php endif; ?>>
							</div>						
						</div>
					</div>
					<div class="control-group formSep" >
						<label class="control-label">URLs excluded for plagiarism <p style="color:red">(Comma seperated)</p></label>
						<div class="controls">
							<textarea name="urlsexcluded" id="urlsexcluded" placeholder="Example:edit-place.com, www.edit-place.com"><?php echo $this->_tpl_vars['delivery']['urlsexcluded']; ?>
</textarea>
						</div>
					</div>
					
					<div class="control-group formSep">
						<label for="fileinput" class="control-label">Type de mission / Crit&egrave;res de notation vs refus <span class="f_req">*</span></label>
						<div class="controls">
							<input type="radio" name="product" id="product" value="redaction" onClick="loadvalidationtemplate('redaction',0);" <?php if ($this->_tpl_vars['delivery']['product'] == 'redaction'): ?>checked<?php endif; ?>/> R&eacute;daction&nbsp;
							<input type="radio" name="product" id="product" value="translation" onClick="loadvalidationtemplate('translation',0);" <?php if ($this->_tpl_vars['delivery']['product'] == 'translation'): ?>checked<?php endif; ?>/> Traduction					
						
							<div id="validationtemplateblock" style="border: 1px solid;padding:15px;">
								<table cellpadding="5" cellspacing="5" >
									<tr><td colspan="2">Merci de s&eacute;lectionner entre 1 et <?php echo $this->_tpl_vars['refusal_reasons_max']; ?>
 crit&egrave;res de notation parmi les suivants : </td></tr>
									<?php $_from = $this->_tpl_vars['templatelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['templatesloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['templatesloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['templatesloop']['iteration']++;
?>
										<?php if (($this->_foreach['templatesloop']['iteration']-1)%2 == 0): ?>
											<tr>
										<?php endif; ?>
											<td width="50%">
												<input type="checkbox" name="<?php echo $this->_tpl_vars['variable']; ?>
[]" value="<?php echo $this->_tpl_vars['template']['identifier']; ?>
"  class="<?php echo $this->_tpl_vars['variable']; ?>
" <?php if (in_array ( $this->_tpl_vars['template']['identifier'] , $this->_tpl_vars['templatearray'] )): ?> checked <?php endif; ?>/> <?php echo ((is_array($_tmp=$this->_tpl_vars['template']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

											</td>
										<?php if (($this->_foreach['templatesloop']['iteration']-1)%2 != 0): ?>
											</tr>
										<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?>
								</table>	
							</div> 
							<div id="refusal_err" style="color:red;"></div>	
						</div>
					</div>
					
					<?php if ($this->_tpl_vars['delivery']['AOtype'] != 'private'): ?>
                    <div class="control-group formSep">
                        <label for="fileinput" class="control-label">Langue des contributeurs qui verront l'AO et recevront une alerte par email <span class="f_req">*</span></label>
                        <div class="controls" style="overflow-y: visible">
                            <select name="publish_language[]" id="publish_language" data-placeholder="select language" multiple="multiple" style="width:250px;">
                                <?php $_from = $this->_tpl_vars['language_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
                                <?php if (in_array ( $this->_tpl_vars['langkey'] , $this->_tpl_vars['delivery']['publish_language'] )): ?>
                                <option value="<?php echo $this->_tpl_vars['langkey']; ?>
" selected><?php echo ((is_array($_tmp=$this->_tpl_vars['langitem'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
                                <?php else: ?>
                                <option value="<?php echo $this->_tpl_vars['langkey']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['langitem'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
                                <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                            </select>
                        </div>
                    </div>
					<?php endif; ?>
                    <!--<?php if ($this->_tpl_vars['groupId'] == 1): ?>
                    <div class="control-group formSep">
                        <label class="control-label">Delivery Visibility <span class="f_req">*</span></label>
                        <div class="controls form-inline">
                            <label class="uni-radio">
                                <input type="checkbox" name="ao_visibility" class="uni_style" <?php if ($this->_tpl_vars['delivery']['ao_visibility'] == 'show'): ?>checked<?php endif; ?> />
                            </label>
                        </div>
                    </div>
                    <?php endif; ?>-->
					<div class="control-group formSep">
						<label class="control-label">Type of writer<span class="f_req">*</span></label>
						<div class="controls form-inline">
							<label class="uni-radio">
								<input type="checkbox" value="sc"  name="view_to[]" class="uni_style" <?php if (in_array ( 'sc' , $this->_tpl_vars['delivery']['view_to'] )): ?>checked<?php endif; ?> />
								Senior <b>(<?php echo $this->_tpl_vars['delivery']['sc_count']; ?>
)</b>
							</label>
							<label class="uni-radio">
								<input type="checkbox" value="jc" name="view_to[]" class="uni_style" <?php if (in_array ( 'jc' , $this->_tpl_vars['delivery']['view_to'] )): ?>checked<?php endif; ?> />
								Junior <b>(<?php echo $this->_tpl_vars['delivery']['jc_count']; ?>
)</b>
							</label>						
							<label class="uni-checkbox">
								<input type="checkbox" value="jc0" name="view_to[]" class="uni_style" <?php if (in_array ( 'jc0' , $this->_tpl_vars['delivery']['view_to'] )): ?>checked<?php endif; ?> />
								Debutants <b>(<?php echo $this->_tpl_vars['delivery']['jc0_count']; ?>
)</b>
							</label>						
						</div>
					</div>
					<?php if ($this->_tpl_vars['delivery']['premium_option']): ?>
					<div class="control-group formSep">
						<label class="control-label">Your Premium options<span class="f_req">*</span></label>
						<div class="controls" id="prem">
							<?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['option_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['option_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['option']):
        $this->_foreach['option_loop']['iteration']++;
?>  
								<label class="uni-radio">
									<div id="uniform-premium_option_<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
" class="uni-radio"> 
									 <?php if ($this->_tpl_vars['delivery']['premium_option'] == $this->_tpl_vars['option']['value'] || $this->_tpl_vars['delivery']['premium_option'] == $this->_tpl_vars['option']['id']): ?>
										<input type="radio" class="uni_style" value="<?php echo $this->_tpl_vars['option']['value']; ?>
" name="premium_option" checked id="premium_option_<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
"  onClick="services_update_popup('parent',<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
,this.value,this)"/>
									 <?php else: ?>
										<input type="radio" class="uni_style" value="<?php echo $this->_tpl_vars['option']['value']; ?>
" name="premium_option"  id="premium_option_<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
"  onClick="services_update_popup('parent',<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
,this.value,this)"/>
									 <?php endif; ?>
									</div>   
									<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

									<a class="pop_over" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" data-placement="right" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['option']['description1'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"><i class="splashy-information"></i></a>
								</label>
								
								<div style="padding-left:30px;" id="premium_service_<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
">
									<?php $_from = $this->_tpl_vars['option']['childlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
										<?php if ($this->_tpl_vars['child']['id'] != ""): ?>
										<label class="uni-checkbox">									
										  <?php if (in_array ( $this->_tpl_vars['child']['value'] , $this->_tpl_vars['delivery']['child_options'] ) || in_array ( $this->_tpl_vars['child']['id'] , $this->_tpl_vars['delivery']['child_options'] )): ?>
											 <input type="checkbox" class="uni_style" id="premium_service_<?php echo $this->_tpl_vars['child']['id']; ?>
" name="premium_service[]" value="<?php echo $this->_tpl_vars['child']['value']; ?>
" onClick="services_update_popup('child',<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
,this.value,this,<?php echo $this->_tpl_vars['child']['id']; ?>
)" checked />
										  <?php else: ?>
											 <input type="checkbox" class="uni_style" id="premium_service_<?php echo $this->_tpl_vars['child']['id']; ?>
" name="premium_service[]" value="<?php echo $this->_tpl_vars['child']['value']; ?>
" onClick="services_update_popup('child',<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
,this.value,this,<?php echo $this->_tpl_vars['child']['id']; ?>
)" />
										  <?php endif; ?>
										  <?php echo ((is_array($_tmp=$this->_tpl_vars['child']['option_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

										  <a class="pop_over" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['option']['option_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" data-placement="right" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['child']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"><i class="splashy-information"></i></a>									
										</label>	
										<?php endif; ?>  
								   <?php endforeach; endif; unset($_from); ?>  
							   </div>
							   <?php endforeach; endif; unset($_from); ?>
							</label>
						</div>
					</div>
					<div class="control-group formSep">
						<label class="control-label">Total premium services selected<span class="f_req">*</span></label>
						<div class="controls">
							<input type="text" name="TotPrem" id="TotPrem" class="input-small" value="<?php echo $this->_tpl_vars['delivery']['premium_total']; ?>
" readonly />
						</div>
					</div>
					<?php endif; ?>
					<div class="control-group formSep">
						<label class="control-label">Delivery Anonymous <span class="f_req">*</span></label>
						<div class="controls">
							<div class="toggle-check">
								<input type="checkbox" name="deli_anonymous" <?php if ($this->_tpl_vars['delivery']['deli_anonymous']): ?>checked<?php endif; ?>>
							</div>						
						</div>
					</div>
					<div class="control-group formSep">
						<label class="control-label">Private <span class="f_req">*</span></label>
						<div class="controls">						
							<div class="toggle-check">
								<input type="checkbox" name="ao_type" <?php if ($this->_tpl_vars['delivery']['AOtype'] == 'private'): ?>checked<?php endif; ?>>
							</div>
						</div>
					</div>
					
					<div class="control-group formSep">
						<label class="control-label">Brief <span class="f_req">*</span></label>
						<div class="controls">
							<div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
								<span class="btn btn-file"><span class="fileupload-new">S&eacute;lectionner</span><span class="fileupload-exists">Change</span><input type="file" name="uploadfile" id="uploadfile"/></span>
								<span class="fileupload-preview"><?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['file_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</span>
								<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
							</div>
						</div>
					</div>
					<div class="control-group formSep">
						<label class="control-label">Delay in rendering Article <span class="f_req">*</span></label>
						<div class="controls form-inline">						
							<span style="vertical-align:top;">JC0 <input type="text" name="subjunior_time" id="subjunior_time" class="span2" value="<?php echo $this->_tpl_vars['delivery']['subjunior_time']; ?>
" maxlength="2" /></span>
							<span style="vertical-align:top;">JC <input type="text" name="junior_time" id="junior_time" class="span2" value="<?php echo $this->_tpl_vars['delivery']['junior_time']; ?>
" maxlength="2" /></span>&nbsp;
							<span style="vertical-align:top;">SC <input type="text" name="senior_time" id="senior_time" class="span2" value="<?php echo $this->_tpl_vars['delivery']['senior_time']; ?>
"  maxlength="2"/></span>&nbsp; 
							<select name="submit_option" id="submit_option" style="width:90px">
								<option value="min" <?php if ($this->_tpl_vars['delivery']['submit_option'] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>
								<option value="hour" <?php if ($this->_tpl_vars['delivery']['submit_option'] == 'hour'): ?>selected<?php endif; ?>>Hour(s)</option>
								<option value="day" <?php if ($this->_tpl_vars['delivery']['submit_option'] == 'day'): ?>selected<?php endif; ?>>day(s)</option>
							</select>
								
						</div>
					</div>
					<div class="control-group formSep">
						<label  class="control-label">Period of resubmission of Article<span class="f_req">*</span></label>
						<div class="controls form-inline">
							<span style="vertical-align:top;">JC0 <input type="text" name="jc0_resubmission" id="jc0_resubmission" class="span2" value="<?php echo $this->_tpl_vars['delivery']['jc0_resubmission']; ?>
"  maxlength="2"/></span>
							<span style="vertical-align:top;">JC <input type="text" name="jc_resubmission" id="jc_resubmission" class="span2" value="<?php echo $this->_tpl_vars['delivery']['jc_resubmission']; ?>
"  maxlength="2" /></span>&nbsp;
							<span style="vertical-align:top;">SC <input type="text" name="sc_resubmission" id="sc_resubmission" class="span2" value="<?php echo $this->_tpl_vars['delivery']['sc_resubmission']; ?>
"  maxlength="2"/></span>&nbsp;
							<select name="resubmit_option" id="resubmit_option" style="width:90px">
								<option value="min" <?php if ($this->_tpl_vars['delivery']['resubmit_option'] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>
								<option value="hour" <?php if ($this->_tpl_vars['delivery']['resubmit_option'] == 'hour'): ?>selected<?php endif; ?>>Hour(s)</option>
								<option value="day" <?php if ($this->_tpl_vars['delivery']['resubmit_option'] == 'day'): ?>selected<?php endif; ?>>Day(s)</option>
							</select>
						</div>
					</div>
					<div class="control-group formSep">
						<label  class="control-label">Delay the timing of participation <span class="f_req">*</span></label>
						<div class="controls">
							<span><input type="text" name="participation_time" id="participation_time" class="span2" value="<?php echo $this->_tpl_vars['delivery']['participation_time']; ?>
"  /></span> mins 					
						</div>
					</div>
                    <div class="control-group formSep">
                        <label class="control-label">Correction<span class="f_req">*</span></label>
                        <div class="controls">

                                <input type="checkbox" name="correction" id="correction" value="external" <?php if ($this->_tpl_vars['delivery']['correction'] == 'external'): ?>checked<?php endif; ?> onclick="setCorrection();">

                        </div>
                    </div>
                    <div <?php if ($this->_tpl_vars['delivery']['correction'] != 'external'): ?> style="display: none" <?php endif; ?>  id="crttype">
                    <div class="control-group formSep" >
						<label class="control-label">Correction Priv&eacute;e <span class="f_req">*</span></label>
						<div class="controls">
							<div class="toggle-check">
								<input type="checkbox" name="correction_type" value="private" <?php if ($this->_tpl_vars['delivery']['correction_type'] == 'private'): ?>checked<?php endif; ?>>
							</div>
						</div>
					</div>
					<div class="control-group formSep" id="corrlangblock" <?php if ($this->_tpl_vars['delivery']['correction_type'] != 'private'): ?> style="display: none" <?php endif; ?>>
						<label class="control-label">Corrector Language(s)</label>
						<div class="controls">
							<select multiple="multiple" <?php if ($this->_tpl_vars['stage2'] == 'yes'): ?> disabled <?php endif; ?> name="clanguage_filter[]" data-placeholder="Select Language..." id="clanguage_filterao" style="width:400px" onchange="loadPrivatecorrectorsao('<?php echo $this->_tpl_vars['delivery']['id']; ?>
')">
								<?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['language_array'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp))), $this);?>

							</select>
						</div>
					</div>
					<div class="control-group formSep" id="corrblock"<?php if ($this->_tpl_vars['delivery']['correction_type'] != 'private'): ?> style="display: none" <?php endif; ?>>
						<label class="control-label">Corrector(s)<span class="f_req">*</span></label>
						<div class="controls" id="correctors_filterselect">
							<select multiple="multiple" <?php if ($this->_tpl_vars['stage2'] == 'yes'): ?> disabled <?php endif; ?> name="favcorrectorcheck[]" data-placeholder="Select corrector..." id="favcorrectorcheckao" style="width:400px">
							<?php $_from = $this->_tpl_vars['correctorlistall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contrib']):
?>
								<?php if (in_array ( $this->_tpl_vars['contrib']['identifier'] , $this->_tpl_vars['delivery']['correctorsao_array'] )): ?>
								<option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
" selected><?php echo ((is_array($_tmp=$this->_tpl_vars['contrib']['name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
								<?php else: ?>
								<option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['contrib']['name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</option>
								<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
							</select>
							
						</div>
					</div>
					<div class="control-group formSep">	
						<label class="control-label">Brief de correction<span class="f_req">*</span></label>
						<div class="controls">
							<div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
								<span class="btn btn-file"><span class="fileupload-new">S&eacute;lectionner</span><span class="fileupload-exists">Change</span><input type="file" name="crtuploadfile" id="crtuploadfile"/></span>
								<span class="fileupload-preview"><?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['crtfile_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</span>
								<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
							</div>
						</div>
					</div>
					<div class="control-group formSep">
						<label  class="control-label">Delay the timing of participation correction<span class="f_req">*</span></label>
						<div class="controls">
							<span><input type="text" name="crtparticipation_time" id="crtparticipation_time" class="span2" value="<?php echo $this->_tpl_vars['delivery']['correction_participation']; ?>
"  /></span> mins
						</div>
                    </div>
					
					<div class="control-group formSep">
						<label class="control-label">Delay in rendering Article correction<span class="f_req">*</span></label>
						<div class="controls form-inline">
							<span style="vertical-align:top;">JC <input type="text" name="crtjunior_time" id="crtjunior_time" class="span2" value="<?php echo $this->_tpl_vars['delivery']['crtjunior_time']; ?>
" maxlength="2" /></span>&nbsp;
							<span style="vertical-align:top;">SC <input type="text" name="crtsenior_time" id="crtsenior_time" class="span2" value="<?php echo $this->_tpl_vars['delivery']['crtsenior_time']; ?>
"  maxlength="2"/></span>&nbsp;
							<select name="crtsubmit_option" id="crtsubmit_option" style="width:90px">
								<option value="min" <?php if ($this->_tpl_vars['delivery']['crtsubmit_option'] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>
								<option value="hour" <?php if ($this->_tpl_vars['delivery']['crtsubmit_option'] == 'hour'): ?>selected<?php endif; ?>>Heure(s)</option>
								<option value="day" <?php if ($this->_tpl_vars['delivery']['crtsubmit_option'] == 'day'): ?>selected<?php endif; ?>>Jour(s)</option>
							</select>
						</div>
					</div>
					<div class="control-group formSep">
						<label  class="control-label">Period of resubmission of Article correction<span class="f_req">*</span></label>
						<div class="controls form-inline">
							<span style="vertical-align:top;">JC <input type="text" name="crtjc_resubmission" id="crtjc_resubmission" class="span2" value="<?php echo $this->_tpl_vars['delivery']['crtjc_resubmission']; ?>
"  maxlength="2" /></span>&nbsp;
							<span style="vertical-align:top;">SC <input type="text" name="crtsc_resubmission" id="crtsc_resubmission" class="span2" value="<?php echo $this->_tpl_vars['delivery']['crtsc_resubmission']; ?>
"  maxlength="2"/></span>&nbsp;
							<select name="crtresubmit_option" id="crtresubmit_option" style="width:90px">
								<option value="min" <?php if ($this->_tpl_vars['delivery']['crtresubmit_option'] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>
								<option value="hour" <?php if ($this->_tpl_vars['delivery']['crtresubmit_option'] == 'hour'): ?>selected<?php endif; ?>>Heure(s)</option>
								<option value="day" <?php if ($this->_tpl_vars['delivery']['crtresubmit_option'] == 'day'): ?>selected<?php endif; ?>>Jour(s)</option>
							</select>
						</div>
					</div>
					
					<div class="control-group formSep">
						<label class="control-label">Fourchette de prix pour la correction<span class="f_req">*</span></label>
						<div class="controls">
							<span style="vertical-align:top"><input type="text" placeholder="Min" value="<?php echo $this->_tpl_vars['delivery']['correction_pricemin']; ?>
" id="correction_pricemin" name="correction_pricemin" class="span2"/></span>
							<span style="vertical-align:top"><input type="text" placeholder="Max" value="<?php echo $this->_tpl_vars['delivery']['correction_pricemax']; ?>
" id="correction_pricemax" name="correction_pricemax" class="span2"/></span>
						</div>
					</div>

        </div>

        <input type="hidden" name="ao_id" value="<?php echo $this->_tpl_vars['delivery']['id']; ?>
">
		<input type="hidden" name="refusal_reasons_max" id="refusal_reasons_max" value="<?php echo $this->_tpl_vars['refusal_reasons_max']; ?>
"/>
					<input type="hidden" name="client_id" value="<?php echo $this->_tpl_vars['delivery']['user_id']; ?>
">
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-gebo" type="submit" >Update</button>
							<button class="btn" data-dismiss="modal">Close</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>