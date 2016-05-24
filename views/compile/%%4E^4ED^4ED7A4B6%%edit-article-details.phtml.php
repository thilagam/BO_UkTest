<?php /* Smarty version 2.6.19, created on 2015-10-01 15:47:09
         compiled from gebo/ongoing/edit-article-details.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/ongoing/edit-article-details.phtml', 139, false),array('function', 'html_options', 'gebo/ongoing/edit-article-details.phtml', 146, false),)), $this); ?>
<?php echo '
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/jquery.validate.min.js"></script>


<!--/BO/theme/gebo/lib/validation/jquery.validate.min.js-->
<script type="text/javascript" >
   $(document).ready(function() { 
		$("#language").chosen({ allow_single_deselect: true,search_contains: true });
		$("#language_filter").chosen();
		$("#clanguage_filter").chosen();
		
		$("#category").chosen({ allow_single_deselect: true,search_contains: true });
		$("#type").chosen({disable_search: true });
		$("#signtype").chosen({disable_search: true });
		$("#favcontribcheck").chosen();
		$("#favcorrectorcheck").chosen();
		
		$(".uni_style").uniform();	
		
		$(\'#correctioncheck\').toggleButtons({
			label:{enabled: "Yes",disabled: "No"},
			onChange: function () {
				var type=$("input[name=\'correction\']:checked").val();
				if(type=="on")
				{
					$("#correction_details").show();					
				}
				else
				{
					$("#correction_details").hide();					
				}
			}
		}); 
		
		$("#edit_articleform").validate({
				onkeyup: false,
				message:false,
				errorClass: \'error\',
				validClass: \'valid\',
				highlight: function(element) {
					$(element).closest(\'span\').addClass("f_error");
				},
				unhighlight: function(element) {
					$(element).closest(\'span\').removeClass("f_error");
				},
				rules: {
						title: {
								required: true,
								minlength: 6
								},
						num_min:"required",	
						num_max:"required",	
						price_min:"required",	
						price_max:"required",
                        correction_pricemin:"required",
                        correction_pricemax:"required",
						participation_time:"required",
						contrib_percentage:"required"
				},
				submitHandler: function(form) { 
						var errorcnt=0;
						var max_limit=$(\'#refusal_reasons_max\').val();
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
	});

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
.error {  display: none !important;}
</style>
'; ?>


<?php if ($this->_tpl_vars['ArticleDetails'] | @ count > 0): ?>
<?php $_from = $this->_tpl_vars['ArticleDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ArticleDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ArticleDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['ArticleDetails']['iteration']++;
?>
	<div class="row-fluid">
		<div class="span12">		
			<form autocomplete="off" class="form-horizontal form_validation_ttip" enctype="multipart/form-data" method="POST" name="edit_articleform" id="edit_articleform" action="/ongoing/save-article">
				<fieldset>
					<div class="control-group formSep">
						<label class="control-label">Title<span class="f_req">*</span></label>
						<div class="controls">
							<span><input type="text" name="title" style="text-transform: none;" id="title" class="input-xlarge" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" /></span>
						</div>
					</div>
					
					<div class="control-group formSep">
						<label class="control-label">Langue<span class="f_req">*</span></label>
						<div class="controls">
							<?php echo smarty_function_html_options(array('name' => 'language','id' => 'language','options' => ((is_array($_tmp=$this->_tpl_vars['language_array'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)),'selected' => $this->_tpl_vars['article']['language']), $this);?>

						</div>
					</div>
					<div class="control-group formSep">
						<label class="control-label">Type<span class="f_req">*</span></label>
						<div class="controls">
							<?php echo smarty_function_html_options(array('name' => 'type','id' => 'type','options' => ((is_array($_tmp=$this->_tpl_vars['type_array'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)),'selected' => $this->_tpl_vars['article']['type']), $this);?>

						</div>
					</div>
					<div class="control-group formSep">
						<label class="control-label">Catagory<span class="f_req">*</span></label>
						<div class="controls">
							<?php echo smarty_function_html_options(array('name' => 'category','id' => 'category','options' => ((is_array($_tmp=$this->_tpl_vars['category_array'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)),'selected' => $this->_tpl_vars['article']['category']), $this);?>

						</div>
					</div>
					<div class="control-group formSep">
						<label class="control-label">NO of signs<span class="f_req">*</span></label>
						<div class="controls">
							<?php echo smarty_function_html_options(array('name' => 'signtype','id' => 'signtype','selected' => $this->_tpl_vars['article']['sign_type'],'options' => ((is_array($_tmp=$this->_tpl_vars['signtype_array'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp))), $this);?>

							<span style="vertical-align:top"><input type="text" value="<?php echo $this->_tpl_vars['article']['num_min']; ?>
" id="num_min" name="num_min" class="span1"/></span>
							<span style="vertical-align:top"><input type="text" value="<?php echo $this->_tpl_vars['article']['num_max']; ?>
" id="num_max" name="num_max" class="span1"/></span>
						</div>
					</div>
					<div class="control-group formSep">
						<label for="fileinput" class="control-label">Type de mission / Crit&egrave;res de notation vs refus <span class="f_req">*</span></label>
						<div class="controls">
							<input type="radio" name="product" id="product" value="redaction" onClick="loadvalidationtemplate('redaction',0);" <?php if ($this->_tpl_vars['article']['product'] == 'redaction'): ?>checked<?php endif; ?>/> R&eacute;daction&nbsp;
							<input type="radio" name="product" id="product" value="translation" onClick="loadvalidationtemplate('translation',0);" <?php if ($this->_tpl_vars['article']['product'] == 'translation'): ?>checked<?php endif; ?>/> Traduction					
						
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
					<?php if ($this->_tpl_vars['article']['AOtype'] == 'private'): ?>
					<div class="control-group formSep">
						<label class="control-label">Languages(s)<span class="f_req">*</span></label>
						<div class="controls">
							<select multiple="multiple" name="language_filter[]" data-placeholder="Select Language..." id="language_filter" style="width:400px" onchange="loadPrivateWriters('<?php echo $this->_tpl_vars['article']['id']; ?>
')">
								<?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['language_array'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp))), $this);?>

							</select>
						</div>
					</div>
					<div class="control-group formSep">
						<label class="control-label">writers<span class="f_req">*</span></label>
						<div class="controls" id="writers_filter">
							<select multiple="multiple" name="favcontribcheck[]" data-placeholder="Select Writer..." id="favcontribcheck" style="width:400px">
							<?php $_from = $this->_tpl_vars['contriblistall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contrib']):
?>
								<?php if (in_array ( $this->_tpl_vars['contrib']['identifier'] , $this->_tpl_vars['contrib_array'] )): ?>
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
					<?php endif; ?>	
					<div class="control-group formSep">
						<label class="control-label">Writing Price Range
<span class="f_req">*</span></label>
						<div class="controls">
							<span style="vertical-align:top"><input type="text" placeholder="Min" value="<?php echo $this->_tpl_vars['article']['price_min']; ?>
" id="price_min" name="price_min" class="span2"/></span>
							<span style="vertical-align:top"><input type="text" placeholder="Max" value="<?php echo $this->_tpl_vars['article']['price_max']; ?>
" id="price_max" name="price_max" class="span2"/></span>
						</div>
					</div>
                    <?php if ($this->_tpl_vars['artuserprice'] != 'NO' && $this->_tpl_vars['groupId'] == 1): ?>
                    <div class="control-group formSep">
                        <label class="control-label">Selected Writer price <span class="f_req">*</span></label>
                        <div class="controls">
                            <div class="input-append span2">
								<input type="text" placeholder="Writer price" value="<?php echo $this->_tpl_vars['artuserprice'][0]['price_user']; ?>
" id="price_writer" name="price_writer" class="span6"/>
								<span class="add-on">&<?php echo $this->_tpl_vars['article']['currency']; ?>
;</span> 
							</div>
							<span style="display: block; height: 30px; float: left; margin-top: 5px;">( <?php echo ((is_array($_tmp=$this->_tpl_vars['artuserprice'][0]['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['artuserprice'][0]['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 )</span>
                            <input type="hidden" value="<?php echo $this->_tpl_vars['artuserprice'][0]['id']; ?>
" id="part_id" name="part_id" />
                        </div>
                    </div>
                    <?php endif; ?>

					<div class="control-group formSep">
						<label  class="control-label">Delay the timing of participation <span class="f_req">*</span></label>
						<div class="controls">
							<span><input type="text" name="participation_time" id="participation_time" class="span2" value="<?php echo $this->_tpl_vars['article']['participation_time']; ?>
"  /></span> mins 					
						</div>
					</div>
					<div class="control-group formSep">
						<label class="control-label">writer payouts per item <span class="f_req">*</span></label>
						<div class="controls">
							
							<div class="input-append">
								<input type="text" value="<?php echo $this->_tpl_vars['article']['contrib_percentage']; ?>
" id="contrib_percentage" name="contrib_percentage" class="span3"/>
								<span class="add-on">%</span>
							</div>
						</div>
					</div>
					<?php if ($this->_tpl_vars['article']['correctionao'] == 'external'): ?>
					
					<div class="control-group formSep">
						<label class="control-label">Proofreading <span class="f_req">*</span></label>
						<div class="controls">
							<div class="toggle-check" id="correctioncheck">
								<input type="checkbox" id="correction" name="correction" <?php if ($this->_tpl_vars['stage2'] == 'yes'): ?> disabled <?php endif; ?> <?php if ($this->_tpl_vars['article']['correction'] == 'yes'): ?>checked<?php endif; ?> readonly>
							</div>						
						</div>
                        <?php if ($this->_tpl_vars['stage2'] == 'yes'): ?>
                            <input type="hidden"  value="<?php echo $this->_tpl_vars['article']['correction']; ?>
" id="correctiontype" name="correctiontype" />
                        <?php endif; ?>
					</div>
					
					
					<div id="correction_details" <?php if ($this->_tpl_vars['article']['correction'] != 'yes'): ?> style="display:none" <?php endif; ?>>
                        
					<?php if ($this->_tpl_vars['article']['correction_type'] == 'private'): ?>
						<div class="control-group formSep">
							<label class="control-label">Corrector Language(s)</label>
							<div class="controls">
								<select multiple="multiple" <?php if ($this->_tpl_vars['stage2'] == 'yes'): ?> disabled <?php endif; ?> name="clanguage_filter[]" data-placeholder="Select Language..." id="clanguage_filter" style="width:400px" onchange="loadPrivatecorrectors('<?php echo $this->_tpl_vars['article']['id']; ?>
')">
									<?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['language_array'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp))), $this);?>

								</select>
							</div>
						</div>
						<div class="control-group formSep">
							<label class="control-label">Corrector(s)<span class="f_req">*</span></label>
							<div class="controls" id="correctors_filter">
								<select multiple="multiple" <?php if ($this->_tpl_vars['stage2'] == 'yes'): ?> disabled <?php endif; ?> name="favcorrectorcheck[]" data-placeholder="Select corrector..." id="favcorrectorcheck" style="width:400px">
								<?php $_from = $this->_tpl_vars['correctorlistall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contrib']):
?>
									<?php if (in_array ( $this->_tpl_vars['contrib']['identifier'] , $this->_tpl_vars['correctors_array'] )): ?>
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
						<?php endif; ?>
						<div class="control-group formSep">
							<label class="control-label">Proofreading Price Range<span class="f_req">*</span></label>
							<div class="controls">
								<span style="vertical-align:top"><input type="text" placeholder="Min" value="<?php echo $this->_tpl_vars['article']['correction_pricemin']; ?>
" id="correction_pricemin" name="correction_pricemin" class="span2"/></span>
								<span style="vertical-align:top"><input type="text" placeholder="Max" value="<?php echo $this->_tpl_vars['article']['correction_pricemax']; ?>
" id="correction_pricemax" name="correction_pricemax" class="span2"/></span>
							</div>
						</div>
						<?php if ($this->_tpl_vars['artcrtprice'] != 'NO' && $this->_tpl_vars['groupId'] == 1): ?>
                        <div class="control-group formSep">
                            <label class="control-label">Selected Corrector Price<span class="f_req">*</span></label>
                            <div class="controls">
								<div class="input-append span2">
									<input type="text" placeholder="Corrector price" value="<?php echo $this->_tpl_vars['artcrtprice'][0]['price_corrector']; ?>
" id="price_corrector" name="price_corrector" class="span6"/>
									<span class="add-on">&<?php echo $this->_tpl_vars['article']['currency']; ?>
;</span>									
								</div>
							<span style="display: block; height: 30px; float: left; margin-top: 5px;">( <?php echo ((is_array($_tmp=$this->_tpl_vars['artcrtprice'][0]['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['artcrtprice'][0]['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 )</span>
							<input type="hidden" value="<?php echo $this->_tpl_vars['artcrtprice'][0]['id']; ?>
" id="crtpart_id" name="crtpart_id" />	
							</div>	
                        </div>
                        <?php endif; ?>
					</div>
					
					<?php endif; ?>
					<input type="hidden" name="ao_id" value="<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
">
					<input type="hidden" name="article_id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
">
					<input type="hidden" name="client_id" value="<?php echo $this->_tpl_vars['article']['user_id']; ?>
">
					<input type="hidden" name="refusal_reasons_max" id="refusal_reasons_max" value="<?php echo $this->_tpl_vars['refusal_reasons_max']; ?>
"/>
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-gebo" type="submit">Update</button>
							<button class="btn" data-dismiss="modal">Close</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>