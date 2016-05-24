<?php /* Smarty version 2.6.19, created on 2015-12-17 12:57:18
         compiled from gebo/deliveryongoing/edit-ao-details.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/deliveryongoing/edit-ao-details.phtml', 254, false),array('modifier', 'utf8_encode', 'gebo/deliveryongoing/edit-ao-details.phtml', 254, false),array('modifier', 'stripslashes', 'gebo/deliveryongoing/edit-ao-details.phtml', 254, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/jquery.validate.min.js"></script>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script>
<!--/BO/theme/gebo/lib/validation/jquery.validate.min.js-->
<script type="text/javascript" >
var maxval='; ?>
"<?php echo $this->_tpl_vars['aoDetails'][0]['correction_pricemax']; ?>
"<?php echo ';
    $(document).ready(function() {
		$(".uni_style").uniform();
		
		//icheck radio/checkbox
		$(".icheck").iCheck({
			checkboxClass: \'icheckbox_square-blue\',
			radioClass: \'iradio_square-blue\'
		});
		
        $("#publish_language").chosen();
		$(\'.toggle-check\').toggleButtons({
			label:{enabled: "Yes",disabled: "No"}
		});		
		$(".pop_over").popover({trigger: \'hover\'});
		
		$("#submit_option1").chosen({disable_search: true });
		$("#resubmit_option1").chosen({disable_search: true });	
		
		//plag excel toggle
		$(\'input[name="plag_excel_file"]\').on(\'ifClicked\', function (event) {
			var value=this.value;
			if(value==\'yes\')
			{
				$("#plag_excel_div").show();				
			}	
			else
			{
				$("#plag_excel_div").hide();				
			}	
			
		});
		
		if(maxval=="")
			maxval = 0;
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
                    /*if($(".crtfileupload-preview").text() == \'\')
                       alert("please upload file in correction");*/
                },
				rules: {
						title: {
								required: true,
								minlength: 6
								},
						correction_pricemin: {
								required: true,
								max:maxval
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
                        correction_pricemax:"required",
                        crtspec_file_name:"required",
                        selection_time:"required",
                        correction_selection_time:"required"
                        //crtuploadfile:"required"
					},
					submitHandler: function(form) {
						//var writerbrief = $(".writerbrief").text();
						var submitform = true;
						var ext =$(".writerbrief").text().split(\'.\').pop().toLowerCase();
						if($.inArray(ext, [\'xls\',\'xlsx\',\'csv\',\'docx\',\'doc\',\'zip\']) == -1) {
							$(".fileerrortype").removeClass(\'hide\');
							$("#uploadfile").focus();
							submitform = false;
						}
						else
						{
							$(".fileerrortype").addClass(\'hide\');
						}
						
						if($("#correction1:checked").length)
						{
							var ext =$(".correctorbrief").text().split(\'.\').pop().toLowerCase();
							if($.inArray(ext, [\'xls\',\'xlsx\',\'csv\',\'docx\',\'doc\',\'zip\']) == -1) {
								$(".correctorerrortype").removeClass(\'hide\');
								$("#uploadfile").focus();
								submitform = false;
							}
							else
							{
								$(".correctorerrortype").addClass(\'hide\');
							}
						}
						
						if(submitform)
							 form.submit();
					}
		});
		
		$(\'#correction_pricemax\').blur(function() {
		   var mx = parseInt($(this).val());
		   $("#correction_pricemin").rules("add", {
			   max: mx
		   });  
		});
		
        $("#crtsubmit_option").chosen({ allow_single_deselect: true,search_contains: true});
        $("#plag_xls").chosen({ allow_single_deselect: true,search_contains: false});
        $("#crtresubmit_option").chosen({ allow_single_deselect: true,search_contains: true});

	});
	function setCorrection()
    {
        if($("#correction1").is(\':checked\')){

                $("#crttype").show();
        }
        else{
            smoke.confirm("Please modify proofreading preferences in articles for internal proofreading",function(e){  // alert(e);
                if (e)
                {
                    $("#correction1").prop(\'checked\',false);
                    $("#crttype").hide();
                }
                else
                {
                    $("#correction1").prop(\'checked\',true);
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
.fileerrortype
{
	margin:0;
}
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
			<form class="form-horizontal form_validation_ttip" enctype="multipart/form-data" method="POST" name="edit_aoform" id="edit_aoform" action="/deliveryongoing/save-delivery">
				<fieldset>
					<div class="control-group formSep">
						<label class="control-label">Name this Delivery <span class="f_req">*</span></label>
						<div class="controls">
							<span><input type="text" name="title" style="text-transform: none;" id="title" class="input-xlarge" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['delivery']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" /></span>
						</div>
					</div>

					                    <!--<?php if ($this->_tpl_vars['groupId'] == 1): ?>
                    <div class="control-group formSep">
                        <label class="control-label"> Cacher l'AO aux chefs de projet <span class="f_req">*</span></label>
                        <div class="controls form-inline">
                            <label class="uni-radio">
                                <input type="checkbox" name="ao_visibility" class="uni_style" <?php if ($this->_tpl_vars['delivery']['ao_visibility'] == 'show'): ?>checked<?php endif; ?> />
                            </label>
                        </div>
                    </div>
                    <?php endif; ?>-->
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
						<label class="control-label">Brief<span class="f_req">*</span></label>
						<div class="controls">
							<div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" id="hiddenupload" name="">
								<span class="btn btn-file"><span class="fileupload-new">Select</span><span class="fileupload-exists">Change</span>
																<input type="file" name="uploadfile" id="uploadfile" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['file_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" <?php if ($this->_tpl_vars['writer_participating'] || $this->_tpl_vars['writer_selection']): ?>disabled<?php endif; ?>/></span>
								<span class="writerbrief fileupload-preview"><?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['file_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</span>
								<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
							</div>
							 <div class="alert alert-danger span3 hide fileerrortype" style="margin:0">
								Invalid File Type
							</div>
							<?php if ($this->_tpl_vars['writer_participating'] || $this->_tpl_vars['writer_selection']): ?>
							<div class="alert alert-danger span8" style="margin:0">
							<?php echo $this->_tpl_vars['upload_writer_error']; ?>

							</div>
							<?php endif; ?>
						</div>
					</div>
										<div class="control-group">
							<label class="control-label">URLs that should not be included in plagiarism check
										<div style="color:red">(Comma separted)</div>
							</label>
							<div class="controls">
								<div>							
								<textarea placeholder="Example:edit-place.com, www.edit-place.com" id="urlsexcluded" name="urlsexcluded" <?php if ($this->_tpl_vars['plag_error']): ?>readonly<?php endif; ?>><?php echo $this->_tpl_vars['delivery']['urlsexcluded']; ?>
</textarea>
								</div>
								<?php if ($this->_tpl_vars['plag_error']): ?>
								<div class="alert alert-danger span8" style="margin:10px 0">
								<?php echo $this->_tpl_vars['plag_error']; ?>

								</div>
								<?php endif; ?>
							</div>
							
					</div>
                    <div class="control-group formSep">
                        <label class="control-label">Correction<span class="f_req">*</span></label>
                        <div class="controls">
                            <input type="checkbox" name="correction" id="correction1" value="external" <?php if ($this->_tpl_vars['delivery']['correction'] == 'external'): ?>checked<?php endif; ?> <?php if ($this->_tpl_vars['ebookerid'] == $this->_tpl_vars['delivery']['user_id']): ?> onclick="return false"<?php else: ?> onclick="setCorrection();" <?php endif; ?>  >
                        </div>
                    </div>
					<div id="crttype" <?php if ($this->_tpl_vars['delivery']['correction'] != 'external'): ?> style="display:none"<?php endif; ?>>
					<div class="control-group formSep">
                    <label class="control-label">Correction Private <span class="f_req">*</span></label>
                    <div class="controls">
                        <div class="toggle-check">
                            <input type="checkbox" name="correction_type" <?php if ($this->_tpl_vars['delivery']['correction_type'] == 'private'): ?>checked<?php endif; ?>>
                        </div>
                    </div>
                    </div>
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">Plagiarism Excel</label>
							<div class="controls">
								<div class="span4">
									<div class="" id="">
										<label class="radio inline">
										<input type="radio" name="plag_excel_file" class="icheck" value="yes" <?php if ($this->_tpl_vars['delivery']['plag_xls'] != ""): ?> checked<?php endif; ?>/> 
											YES&nbsp;&nbsp;&nbsp;
										</label>
										<label class="radio inline">
										<input type="radio" name="plag_excel_file" class="icheck" value="no" <?php if ($this->_tpl_vars['delivery']['plag_xls'] == ''): ?> checked<?php endif; ?>/> 
											NO
										</label>
									</div>
								</div>
							</div>
							<div class="controls" id="plag_excel_div" <?php if ($this->_tpl_vars['delivery']['plag_xls'] == ""): ?> style="display:none"<?php endif; ?>>
								<div class="span2" >
									<select name="plag_xls" class="span12 customselect" id="plag_xls">
										<option value="xls" <?php if ($this->_tpl_vars['delivery']['plag_xls'] == 'xls'): ?> selected <?php endif; ?>>XLS</option>
										<option value="xlsx" <?php if ($this->_tpl_vars['delivery']['plag_xls'] == 'xlsx'): ?> selected <?php endif; ?>>XLSX</option>
									</select>
								</div>
								<div class="span3">
									<input type="text" class="span12 required" id="xls_columns" value="<?php echo $this->_tpl_vars['delivery']['column_xls']; ?>
" placeholder="# columns" name="xls_columns">
								</div>
							</div>
						</div>
					</div>
					<div class="control-group formSep" >
                    <label class="control-label">Brief de correction<span class="f_req">*</span></label>
                    <div class="controls">
                        <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
                            <span class="btn btn-file"><span class="fileupload-new">Select</span><span class="fileupload-exists">Change</span><input type="file" name="crtuploadfile" id="crtuploadfile" value="<?php if ($this->_tpl_vars['delivery']['crtfile_name']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['crtfile_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
<?php endif; ?>" <?php if ($this->_tpl_vars['corrector_participating'] || $this->_tpl_vars['corrector_selection']): ?>disabled<?php endif; ?>/></span>
                            <span class="correctorbrief fileupload-preview"><?php if ($this->_tpl_vars['delivery']['crtfile_name']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['crtfile_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
<?php endif; ?></span>
                            <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
                            <!-- <input type="hidden" id="crtspec_file_name" name="crtspec_file_name" value="<?php echo $this->_tpl_vars['delivery']['crtfile_name']; ?>
" /> -->
                        </div>
						<div class="alert alert-danger span3 hide correctorerrortype" style="margin:0">
								Invalid File Type
						</div>
						<?php if ($this->_tpl_vars['corrector_participating'] || $this->_tpl_vars['corrector_selection']): ?>
						<div class="alert alert-danger span8" style="margin:0">
						<?php echo $this->_tpl_vars['upload_corrector_error']; ?>

						</div>
						<?php endif; ?>
                    </div>
                    </div>
															</div>

        <input type="hidden" name="ao_id" value="<?php echo $this->_tpl_vars['delivery']['id']; ?>
">
					<input type="hidden" name="client_id" value="<?php echo $this->_tpl_vars['delivery']['user_id']; ?>
">
					<input type="hidden" name="view" value="<?php echo $this->_tpl_vars['prod']; ?>
">
					<input type="hidden" name="cmid" value="<?php echo $this->_tpl_vars['cmid']; ?>
">
					<input type="hidden" name="artid" value="<?php echo $this->_tpl_vars['artid']; ?>
">
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-gebo" type="submit" >Update</button>
							<button class="btn" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>