<?php /* Smarty version 2.6.19, created on 2016-03-08 15:06:09
         compiled from gebo/bnpquotedelivery/delivery-prod1.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/bnpquotedelivery/delivery-prod1.phtml', 304, false),array('modifier', 'zero_cut', 'gebo/bnpquotedelivery/delivery-prod1.phtml', 530, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="/BO/theme/gebo/lib/x-editable/bootstrap-editable/css/bootstrap-editable.css">
<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/ajaxupload.3.5.js"></script>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/lib/x-editable/bootstrap-editable/js/bootstrap-editable.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="/BO/theme/gebo/lib/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/bootstrap-multiselect/bootstrap-multiselect.js" type="text/javascript" charset="utf-8"></script>
<style>
	.mission-details:nth-of-type(1)
	{
		margin:0 0 10px;
	}
	
	.mission-details2
	{
		margin:10px 0 0;
	}
	
	.icon-time
	{
		margin-right: 5px;
		position: relative;
		top: 2px;
	}	
	
	.underline
	{
		padding: 10px;
	}
	
	.circle
	{
		padding: 5px 8px;
		border: 1px solid rgb(38,124,255);
		background-color: rgb(38,124,255);
		color: #fff;
		border-radius: 50px;
	}
	
	#sampletext_table td
	{
		font-size: 14px;
	}
	
	#atokens .btn{
		margin-top: 5px;
	}

	#atokens .well
	{
		padding: 10px;
	}
    #city_details{max-height: 200px;overflow: auto;}
    .danger{color:#FF0000;}
    #city_details_err{padding: 10px;}
</style>
<script>
var theme = '; ?>
"<?php echo $this->_tpl_vars['prod_step1']['theme']; ?>
"<?php echo ';
var ebooker_delivery = '; ?>
"<?php echo $this->_tpl_vars['ebooker_delivery']; ?>
"<?php echo ';
var product=\''; ?>
<?php echo $this->_tpl_vars['prod_step1']['product']; ?>
<?php echo '\';
var mandatory_token=\''; ?>
<?php echo $this->_tpl_vars['prod_step1']['mandatory_token']; ?>
<?php echo '\';

//stencils available to translte for an token based on language
function getTranslateStencilsCount()
{
	var language=\''; ?>
<?php echo $this->_tpl_vars['prod_step1']['language_dest']; ?>
<?php echo '\';
	var token_id=$("#mand_tokens").val();
	
	if(typeof token_id === "undefined")
		token_id=mandatory_token;	
	
	var target_page=\'/bnp-quotedelivery/get-available-stencils-translate?language=\'+language+\'&token_id=\'+token_id;
	$.get(target_page,function(data){		
		$("#translationCount").val(data.stencil_count);
	},\'json\');
	//alert(translationCount);
}


	$(document).ready(function(){
		
		// Load tokens 
		if(theme)
			loadtokens(false);
		
		if(product==\'translation\')
			getTranslateStencilsCount();
		
		//validation
		$("#delivery-prod-form1").validationEngine({prettySelect : true,useSuffix: "_chzn",onValidationComplete: function(form, status){
			if(status == true)
			{
				if(ebooker_delivery && product!=\'translation\')
				{
					if($("#sampletext").val())
						return true;
					else
					{	
						$("#seeall").focus();
						$("#sampletxt_text").html("<span style=\'color:red\'>Please select sample text</span>");
					}
				}
				else if(ebooker_delivery && product==\'translation\')
				{
					var translationCount=$("#translationCount").val();
					var files_pack=$("#files_pack").val();
					var total_article=$("#total_article").val();
					
					var totalStencils=files_pack*total_article;
					if(translationCount>=totalStencils)
					{
						return true;
					}
					else{
						var error_message=\'Only \'+translationCount+ \' stencils available to translate\';
						smoke.alert(error_message);
					}
					//alert(totalStencils);
				}
				else
					return true;
			}
	}});
		
		//icheck radio/checkbox
		$(".icheck").iCheck({
			checkboxClass: \'icheckbox_square-blue\',
			radioClass: \'iradio_square-blue\'
		});
		
		
		 $(".customselect").chosen({  allow_single_deselect:false,disable_search: true });
		  $("#category, #mand_tokens").chosen({  allow_single_deselect:false,search_contains: true});
		 
		 
		 $(\'input[name="correction"]\').on(\'ifClicked\', function (event) {
			var value=this.value;
			if(value==\'external\')
			{
				$("#external").show();
				$("#internal").hide();
			}	
			else
			{
				$("#external").hide();
				$("#internal").show();
			}	
			
		});
		
		//toggle writer price display
		$(\'#pricedisplaycheck\').toggleButtons({label:{enabled: "Yes",disabled: "No"}});
		
		$(\'input[name="AOtype"]\').on(\'ifClicked\', function (event) {
			var value=this.value;
			if(value==\'public\'){
				//$(\'#pricedisplaycheck\').toggleButtons(\'setState\', false); 
				//$("#pricedisplay").attr(\'disabled\',"true");
				//$("#pricedisplaycheck").addClass(\'deactivate\');
			}
			else{
				//$("#pricedisplay").removeAttr(\'disabled\');
				//$("#pricedisplaycheck").removeClass(\'deactivate\');
				//$(\'#pricedisplaycheck\').toggleButtons(\'setState\', true); 
			}				
			
		});
		
		//toggle correction price display
		$(\'#corrector_pricedisplaycheck\').toggleButtons({label:{enabled: "Oui",disabled: "Non"}});
		
		$(\'input[name="correction_type"]\').on(\'ifClicked\', function (event) {
			var value=this.value;
			if(value==\'public\'){
				//$(\'#corrector_pricedisplaycheck\').toggleButtons(\'setState\', false); 
				//$("#corrector_pricedisplay").attr(\'disabled\',"true");
				//$("#corrector_pricedisplaycheck").addClass(\'deactivate\');
			}
			else{
				//$("#corrector_pricedisplay").removeAttr(\'disabled\');
				//$("#corrector_pricedisplaycheck").removeClass(\'deactivate\');
				//$(\'#corrector_pricedisplaycheck\').toggleButtons(\'setState\', true); 
			}				
			
		});
		
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
		
		//delivery name edit		
		$("#edit_dname").click(function(e){
			e.stopPropagation();
			$(\'#delivery_name\').editable(\'toggle\');
		});
		 
		$(\'#delivery_name\').editable({
            url: \'/bnp-quotedelivery/update-deliveryname\',
            type: \'text\',
            name: \'delivery_name\',
            title: \'\',
			validate: function(value) {
               if($.trim(value) == \'\') return \'This field is required\';
            }
        });	
		
		
		fncalculateRemainingArticles();
		
		$(\'body\').on(\'hidden\', \'#sampletexts\', function (){        
				
			});
		$(\'#sourcelang_nocheckbox\').toggleButtons({label:{enabled: "Oui",disabled: "Non"}});	
		$(\'#sourcelang_nocheckbox_correction\').toggleButtons({label:{enabled: "Oui",disabled: "Non"}});
        enable_textbox(0);//to check if submit button should be enabled or disbaled//
		
});		
//writing brief upload		
$(function(){		
		var btnUpload=$(\'#uploadspec_chzn\');
		var status=$(\'#writing_spec_file_name\');
		
		new AjaxUpload(btnUpload, {
			action: \'upload-writing-spec\',
			name: \'uploadfile\',
			onSubmit: function(file, ext){
				if (! (ext && /^(doc|docx|xls|xlsx|pdf|csv|xml|rtf|zip)$/.test(ext))){
					$(\'#fileerr\').html(\'Uniquement doc, docx, xls, xlsx, pdf, csv, xml, zip et rtf\').css(\'color\',\'#FF0000\');
					return false;
				}				
				status.html(\'<img src="/BO/theme/gebo/img/ajax_loader.gif" />\');
			},
			onComplete: function(file, response){//alert(response);
				if(response!="error"){
				status.html(\'\').css(\'color\',\'#000000\');
					var fname=response.split("#");					
					status.html(fname[1]);
					$("#uploadspec").val(fname[1]);
					
				}
			}
		 });
	
		 
	});
		//correctiom brief upload		
$(function(){		
		var btnUpload=$(\'#upload-correction-spec_chzn\');
		var status=$(\'#correction_spec_file_name\');
		
		new AjaxUpload(btnUpload, {
			action: \'upload-correction-spec\',
			name: \'uploadfile\',
			onSubmit: function(file, ext){
				if (! (ext && /^(doc|docx|xls|xlsx|pdf|csv|xml|rtf|zip)$/.test(ext))){
					$(\'#fileerr\').html(\'Uniquement doc, docx, xls, xlsx, pdf, csv, xml, zip et rtf\').css(\'color\',\'#FF0000\');
					return false;
				}		
				
				
				status.html(\'<img src="/BO/theme/gebo/img/ajax_loader.gif" />\');
			},
			onComplete: function(file, response){//alert(response);
				if(response!="error"){
				status.html(\'\').css(\'color\',\'#000000\');
					var fname=response.split("#");					
					status.html(fname[1]);
					$("#upload-correction-spec").val(fname[1]);					
				}
			}
		 });
	
		 
	});	
//calculating remaining articles by changing the packs and files	
function fncalculateRemainingArticles()
{
	var volume=\''; ?>
<?php echo $this->_tpl_vars['prod_step1']['volume']; ?>
<?php echo '\';
	var files_pack=$("#files_pack").val();
	var total_article=$("#total_article").val();
	
	var remaining_articles=(volume-(files_pack*total_article));
	
	remaining_articles=remaining_articles >0 ? remaining_articles : 0;
	
	$("#remaining_articles").text(remaining_articles);
}
</script>
'; ?>

<?php if (count($this->_tpl_vars['misssionQuoteDetails']) > 0): ?>
	<?php $_from = $this->_tpl_vars['misssionQuoteDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quote'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quote']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quoteMission']):
        $this->_foreach['quote']['iteration']++;
?>	
	
	<input type="hidden" id="mvolume"	value="<?php echo $this->_tpl_vars['quoteMission']['volume']; ?>
">
	<input type="hidden" id="mvolume_max"	value="<?php echo $this->_tpl_vars['quoteMission']['volume_max']; ?>
">
	<div class="row-fluid">
		 <div class="span12">
			<h3 class="heading">
			<a href="/followup/prod?submenuId=ML13-SL4&cmid=<?php echo $_GET['mission_id']; ?>
">
				<?php if ($this->_tpl_vars['quoteMission']['product'] == 'translation'): ?>
					<b><?php echo $this->_tpl_vars['quoteMission']['product_name']; ?>
 <?php echo $this->_tpl_vars['quoteMission']['product_type_name']; ?>
 <?php echo $this->_tpl_vars['quoteMission']['language_source_name']; ?>
 vers <?php echo $this->_tpl_vars['quoteMission']['language_dest_name']; ?>
 <?php echo $this->_tpl_vars['quoteMission']['product_type_other']; ?>
 </b>
				<?php elseif ($this->_tpl_vars['quoteMission']['product'] == 'redaction'): ?>
					<b><?php echo $this->_tpl_vars['quoteMission']['product_name']; ?>
 <?php echo $this->_tpl_vars['quoteMission']['product_type_name']; ?>
 in <?php echo $this->_tpl_vars['quoteMission']['language_source_name']; ?>
 <?php echo $this->_tpl_vars['quoteMission']['product_type_other']; ?>
</b>
				<?php endif; ?>
			</a>
				> Create New Delivery
				<span class="pull-right">
						<img src="/BO/theme/gebo/img/path-1.png" width="120" height="35" border="0" usemap="#Map" />
						<map name="Map" id="Map">
						</map>
				</span> 
			</h3>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span9">
		<form class="form-horizontal"  action="/bnp-quotedelivery/save-prod1?mission_id=<?php echo $_GET['mission_id']; ?>
" method="POST" id="delivery-prod-form1" enctype="multipart/form-data">
		
			<input type="hidden" name="mission_id" value="<?php echo $_GET['mission_id']; ?>
">
			
			<h2 class="heading">
				<i style="margin:5px;cursor:pointer" id="edit_dname" class="splashy-pencil"></i><a data-original-title="" data-placeholder="Required" data-placement="right" data-pk="1" data-type="text" style="margin-right:5px" id="delivery_name" href="#"><?php echo $this->_tpl_vars['prod_step1']['title']; ?>
</a>
			</h2>
			
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo/survey/mission_overview.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			
						
			<?php if ($this->_tpl_vars['quoteMission']['client_id'] == $this->_tpl_vars['ebookerid'] && $this->_tpl_vars['quoteMission']['stencils_ebooker'] == 'yes'): ?>
			<div class="mission-details2">			
				<div class="prod-mission-product">Stencils Setup</div>
			</div>
			<div class="w-box">
				<div class="w-box-content cnt_a">
				<div class="row-fluid">
					<div class="span3">
					<p><strong><span class="circle">1</span> &nbsp;&nbsp;Category</strong></p>
					<select name="theme" id="theme" class="customselect themes validate[required]" placeholder="Select theme" onchange="loadcategory()">
					   <option></option>
					   					   <?php $_from = $this->_tpl_vars['sthemes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sthemes'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sthemes']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Id'] => $this->_tpl_vars['theme']):
        $this->_foreach['sthemes']['iteration']++;
?>
					   <option value=<?php echo $this->_tpl_vars['Id']; ?>
 <?php if ($this->_tpl_vars['prod_step1']['theme'] == $this->_tpl_vars['Id']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['theme']; ?>
</option>
					   <?php endforeach; endif; unset($_from); ?>
					</select>
					</div>
					<div class="span3">
					<p><strong><span class="circle">2</span> &nbsp;&nbsp;Category variation</strong></p>
					<select name="category" id="category" class="category validate[required]" placeholder="Select Category"  onchange="loadtokens(true)">
					  <option></option>
					  					   <?php $_from = $this->_tpl_vars['scat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sthemes'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sthemes']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Id'] => $this->_tpl_vars['theme']):
        $this->_foreach['sthemes']['iteration']++;
?>
					   <option value=<?php echo $this->_tpl_vars['Id']; ?>
 <?php if ($this->_tpl_vars['prod_step1']['ebooker_cat_id'] == $this->_tpl_vars['Id']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['theme']; ?>
</option>
					   <?php endforeach; endif; unset($_from); ?>
					</select>
					</div>
					<div class="span6 pull-center">
						<p><strong><span class="circle">3</span> &nbsp;&nbsp;Select a Tokens and Sample</strong></p>
						<div id="atokens" style="margin-top:10px">
							
						</div>
						<?php if ($this->_tpl_vars['prod_step1']['product'] != 'translation'): ?>
							<div class="sampletextblock" style="<?php if ($this->_tpl_vars['prod_step1']['sampletext']): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
								<div id="sampletxt_text"><?php echo $this->_tpl_vars['sampletexts']; ?>
</div>
								<button type="button" class="btn btn-warning" <?php if (! $this->_tpl_vars['sampletexts']): ?>disabled="disabled"<?php endif; ?> id="seeall" onclick="getsampletexts()" name="seeall" value=""><?php if (! $this->_tpl_vars['sampletexts']): ?>See all<?php else: ?>Change Selection<?php endif; ?></button>
							
								<input type="hidden" name="sampletext" id="sampletext" value="<?php echo $this->_tpl_vars['prod_step1']['sampletext']; ?>
" class="" />
							</div>
						<?php else: ?>	
							<input type="hidden" name="translationCount" id="translationCount" value="0">
						<?php endif; ?>	
					</div>
				</div>
				</div>
			</div>
			<?php endif; ?>
			
            <!--- *** added on 24.02.2016 *** --->
                        <?php if ($this->_tpl_vars['quoteMission']['bnp_mission'] == 'yes'): ?>            <div class="mission-details2">
                <div class="prod-mission-product">BNP Setup</div>
            </div>
            <div class="w-box">
                <div class="w-box-content cnt_a">
                    <div class="row-fluid" id="city_details">
                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    &nbsp;
                                </th>
                                <th>
                                    City Name
                                </th>
                                <th>
                                    View
                                </th>
                                <th>
                                    Nb of Articles
                                </th>
                            </tr>
                            <?php $_from = $this->_tpl_vars['scitys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['scitys'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['scitys']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Id'] => $this->_tpl_vars['city']):
        $this->_foreach['scitys']['iteration']++;
?>

                                <?php if (in_array ( $this->_tpl_vars['Id'] , $this->_tpl_vars['prod_step1']['sample_text_id'] )): ?>
                                    <tr>
                                        <td>
                                                <input type="checkbox" value="<?php echo $this->_tpl_vars['Id']; ?>
" id="city_<?php echo $this->_tpl_vars['Id']; ?>
" onclick="enable_textbox(<?php echo $this->_tpl_vars['Id']; ?>
);" checked="checked" name="city[]/><!-- "-->

                                        </td>
                                        <td>
                                            <?php echo $this->_tpl_vars['city']; ?>

                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="javascript:getbnpsampletexts(<?php echo $this->_tpl_vars['Id']; ?>
);">view</a>
                                            <input type="hidden" value="<?php echo $this->_tpl_vars['sample_text'][$this->_tpl_vars['Id']]; ?>
" id="sample_text_id_<?php echo $this->_tpl_vars['Id']; ?>
"><!-- name="sample_text_id"--->
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $this->_tpl_vars['sCityArticleCounts'][$this->_tpl_vars['Id']]; ?>
" id="no_of_articles_<?php echo $this->_tpl_vars['Id']; ?>
" onkeyup="calculate_files_pack();" name="no_of_articles[]/><!--"-->
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" value="<?php echo $this->_tpl_vars['Id']; ?>
" id="city_<?php echo $this->_tpl_vars['Id']; ?>
" onclick="enable_textbox(<?php echo $this->_tpl_vars['Id']; ?>
);" /><!-- name="city[]"-->
                                        </td>
                                        <td>
                                            <?php echo $this->_tpl_vars['city']; ?>

                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="javascript:getbnpsampletexts(<?php echo $this->_tpl_vars['Id']; ?>
);">view</a>
                                            <input type="hidden" value="<?php echo $this->_tpl_vars['sample_text'][$this->_tpl_vars['Id']]; ?>
" id="sample_text_id_<?php echo $this->_tpl_vars['Id']; ?>
"><!-- name="sample_text_id"--->
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $this->_tpl_vars['sCityArticleCounts'][$this->_tpl_vars['Id']]; ?>
" readonly id="no_of_articles_<?php echo $this->_tpl_vars['Id']; ?>
" onkeyup="calculate_files_pack();"/><!--name="no_of_articles[]"-->
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                        </table>
                                           </div>
                    <div id="city_details_err" class="danger hide"><p>Please select  1 to  5 cities only(min:1/max:5 cities)</p></div>
                </div>
            </div>
            <?php endif; ?>

            			
			<!-- Writing Rules -->			
			<div class="mission-details2">			
				<div class="prod-mission-product">Writing Rules</div>
			</div>
			
			<div class="w-box">
				<div class="w-box-content cnt_a">
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">Delivery Status</label>
							<div class="controls">
								<div class="span6">
									<div class="" id="">
											<label class="radio inline">
											<input type="radio" name="AOtype" class="icheck" checked="checked" value="public" <?php if ($this->_tpl_vars['prod_step1']['AOtype'] == 'public'): ?> checked<?php endif; ?>/> 
												Public
											</label>
											<label class="radio inline">
											<input type="radio" name="AOtype" class="icheck" value="private" <?php if ($this->_tpl_vars['prod_step1']['AOtype'] == 'private'): ?> checked<?php endif; ?>/> 
												Private
											</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<?php if ($this->_tpl_vars['quoteMission']['product'] == 'translation'): ?>
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">Do not consider Source language</label>
							<div class="controls">
								<div id="sourcelang_nocheckbox">
									<input type="checkbox" <?php if ($this->_tpl_vars['prod_step1']['sourcelang_nocheck'] == 'yes'): ?>checked<?php endif; ?> name="sourcelang_nocheck" value="yes">
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
					
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label" style="padding-top:5px">Cost (&euro;)</label>
							<div class="controls">
								<div class="span3">
									<!-- <div class="pull-center">Min</div> -->
									<div class="" id="">
										<input class="span12 validate[required,max[<?php echo $this->_tpl_vars['prod_step1']['price_max_valid']; ?>
],priceRange[#price_max]]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['prod_step1']['price_min'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" type="text" name="price_min" id="price_min" placeholder="Min" />
									</div>
								</div>
								<div class="span3">
									<!-- <div class="pull-center">Max</div> -->
									<div class="" id="">
										<input class="span12 validate[required,max[<?php echo $this->_tpl_vars['prod_step1']['price_max_valid']; ?>
]]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['prod_step1']['price_max'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" type="text" name="price_max" id="price_max"  placeholder="Max" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label"><i class="icon-time"></i>Participation</label>
							<div class="controls">
								<div class="span5" >
								<input type="text" name="participation_time_hour" id="participation_time_hour" class="span7 validate[required]" value="<?php echo $this->_tpl_vars['prod_step1']['participation_time_hour']; ?>
" /> Hour(s)
								</div>
								<div class="span6" style="margin-left:0" >
								<input type="text" name="participation_time_min" id="participation_time_min" class="span6 validate[required]" value="<?php echo $this->_tpl_vars['prod_step1']['participation_time_min']; ?>
" /> Min(s)
								</div>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label"><i class="icon-time"></i>Selection</label>
							<div class="controls">
								<div class="span5" >
								<input type="text" name="selection_hour" id="selection_hour" class="span7 validate[required]" value="<?php echo $this->_tpl_vars['prod_step1']['selection_hour']; ?>
" /> Hour(s)
								</div>
								<div class="span6" style="margin-left:0" >
								<input type="text" name="selection_min" id="selection_min" class="span6 validate[required]" value="<?php echo $this->_tpl_vars['prod_step1']['selection_min']; ?>
" /> Min(s)
								</div>
							</div>
						</div>
					</div>
					<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">Display price range</label>
							<div class="controls">
								<div id="pricedisplaycheck">
									<input type="checkbox" <?php if ($this->_tpl_vars['prod_step1']['pricedisplay'] == 'yes'): ?>checked<?php endif; ?> name="pricedisplay" value="yes">
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">URLs that should not be included in plagiarism check
										<div style="color:red">(Comma separated)</div>
							</label>
							<div class="controls">	
								<textarea placeholder="Example:edit-place.com, www.edit-place.com" id="urlsexcluded" name="urlsexcluded"><?php echo $this->_tpl_vars['prod_step1']['urlsexcluded']; ?>
</textarea>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">Editorial brief</label>
							<div class="controls">
								<div id="uploadspec_chzn" class="span3">
									<span class="btn btn-file">
										<span class="fileupload-new"><i class="icon-adt_atach"></i>Add Brief</span>
										<input style="display:none" type="file" class="" name="file" value="<?php echo $this->_tpl_vars['prod_step1']['writing_spec_file_name']; ?>
">
									</span>
									<input type="hidden"class="validate[required]" id="uploadspec" value="<?php echo $this->_tpl_vars['prod_step1']['writing_spec_file_name']; ?>
">
									<div id="writing_spec_file_name"><?php echo $this->_tpl_vars['prod_step1']['writing_spec_file_name']; ?>
</div>				
								</div>
							</div>
						</div>
					</div>		
				</div>
			</div>
			
			<!-- Proofreading Rules -->
			<?php if ($this->_tpl_vars['prod_step1']['correction'] != 'no'): ?>
			<div class="mission-details2">			
				<div class="prod-mission-product">Proofreading Rules</div>
			</div>
			
			<div class="w-box">
				<div class="w-box-content cnt_a">
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">Team in charge</label>
							<div class="controls">
								<div class="span6">
									<div class="" id="">
											<label class="radio inline">
											<input type="radio" disabled  name="correction" id="correction" value="internal" <?php if ($this->_tpl_vars['prod_step1']['correction'] == 'internal'): ?> checked<?php endif; ?> class="icheck" /> 
												Internal
											</label>
											<label class="radio inline">
											<input type="radio" disabled  class="icheck" name="correction" id="correction" value="external" <?php if ($this->_tpl_vars['prod_step1']['correction'] == 'external'): ?> checked<?php endif; ?> /> 
												External
											</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="external" <?php if ($this->_tpl_vars['prod_step1']['correction'] == 'internal'): ?> class="hide" <?php endif; ?>>
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label">Correction Status</label>
								<div class="controls">
									<div class="span6">
										<div class="" id="">
												<label class="radio inline">
												<input type="radio" name="correction_type" class="icheck" checked="checked" value="public" <?php if ($this->_tpl_vars['prod_step1']['correction_type'] == 'public'): ?> checked<?php endif; ?>/> 
													Public&nbsp;&nbsp;&nbsp;
												</label>
												<label class="radio inline">
												<input type="radio" name="correction_type" class="icheck" value="private" <?php if ($this->_tpl_vars['prod_step1']['correction_type'] == 'private'): ?> checked<?php endif; ?>/> 
													Private
												</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label">Correction moderation</label>
								<div class="controls">
									<div class="span6">
										<div class="" id="">
												<label class="radio inline">
												<input type="radio" name="nomoderation" class="icheck" checked="checked" value="no" <?php if ($this->_tpl_vars['prod_step1']['nomoderation'] == 'no'): ?> checked<?php endif; ?>/> 
													YES
												</label>
												<label class="radio inline">
												<input type="radio" name="nomoderation" class="icheck" value="yes" <?php if ($this->_tpl_vars['prod_step1']['nomoderation'] == 'yes'): ?> checked<?php endif; ?>/> 
													NO
												</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<?php if ($this->_tpl_vars['quoteMission']['product'] == 'translation'): ?>
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label">Do not consider Source language </label>
								<div class="controls">
									<div class="span6">
										<div id="sourcelang_nocheckbox_correction">
											<input type="checkbox" <?php if ($this->_tpl_vars['prod_step1']['sourcelang_nocheck_correction'] == 'yes'): ?>checked<?php endif; ?> name="sourcelang_nocheck_correction" value="yes">
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
							
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label" style="padding-top:5px">Cost (&euro;)</label>
								<div class="controls">
									<div class="span3">
										<!-- <div class="pull-center">Min</div> -->
										<div class="" id="">
											<input class="span12  validate[required,max[<?php echo $this->_tpl_vars['prod_step1']['correction_pricemax_valid']; ?>
],priceRange[#correction_pricemax]]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['prod_step1']['correction_pricemin'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" type="text" name="correction_pricemin" id="correction_pricemin" placeholder="Min" />
										</div>
									</div>
									<div class="span3">
										<!-- <div class="pull-center">Max</div> -->
										<div class="" id="">
											<input class="span12 validate[required,max[<?php echo $this->_tpl_vars['prod_step1']['correction_pricemax_valid']; ?>
]]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['prod_step1']['correction_pricemax'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" type="text" name="correction_pricemax" id="correction_pricemax" placeholder="Max" />
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label"><i class="icon-time"></i>Participation</label>
								<div class="controls">
									<div class="span5" >
									<input type="text" name="correction_participation_hour" id="correction_participation_hour" class="span7  validate[required]" value="<?php echo $this->_tpl_vars['prod_step1']['correction_participation_hour']; ?>
" /> Hour(s)
									</div>
									<div class="span6" style="margin-left:0" >
									<input type="text" name="correction_participation_min" id="correction_participation_min" class="span6 validate[required]" value="<?php echo $this->_tpl_vars['prod_step1']['correction_participation_min']; ?>
" /> Min(s)
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label"><i class="icon-time"></i>Selection</label>
								<div class="controls">
									<div class="span5" >
									<input type="text" name="correction_selection_hour" id="correction_selection_hour" class="span7  validate[required]" value="<?php echo $this->_tpl_vars['prod_step1']['correction_selection_hour']; ?>
" /> Hour(s)
									</div>
									<div class="span6" style="margin-left:0" >
									<input type="text" name="correction_selection_min" id="correction_selection_min" class="span6 validate[required]" value="<?php echo $this->_tpl_vars['prod_step1']['correction_selection_min']; ?>
" /> Min(s)
									</div>
								</div>
							</div>
						</div>	
						<?php if ($this->_tpl_vars['prod_step1']['correction'] == 'external'): ?>						
							<div class="row-fluid">
								<div class="control-group">
									<label class="control-label">Plagiarism Excel</label>
									<div class="controls">
										<div class="span4">
											<div class="" id="">
												<label class="radio inline">
												<input type="radio" name="plag_excel_file" class="icheck" value="yes" <?php if ($this->_tpl_vars['prod_step1']['plag_excel_file'] == 'yes'): ?> checked<?php endif; ?>/> 
													YES&nbsp;&nbsp;&nbsp;
												</label>
												<label class="radio inline">
												<input type="radio" name="plag_excel_file" class="icheck" value="no" <?php if ($this->_tpl_vars['prod_step1']['plag_excel_file'] != 'yes'): ?> checked<?php endif; ?>/> 
													NO
												</label>
											</div>
										</div>
									</div>
									<div class="controls" id="plag_excel_div" <?php if ($this->_tpl_vars['prod_step1']['plag_excel_file'] != 'yes'): ?> style="display:none"<?php endif; ?>>
										<div class="span2" >
											<select name="plag_xls" class="span12 customselect" id="plag_xls">
												<option value="xls" <?php if ($this->_tpl_vars['prod_step1']['plag_xls'] == 'xls'): ?> selected <?php endif; ?>>XLS</option>
												<option value="xlsx" <?php if ($this->_tpl_vars['prod_step1']['plag_xls'] == 'xlsx'): ?> selected <?php endif; ?>>XLSX</option>
											</select>
										</div>
										<div class="span3">
											<input type="text" class="span12" id="xls_columns" value="<?php echo $this->_tpl_vars['prod_step1']['xls_columns']; ?>
" placeholder="# columns" name="xls_columns">
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>	
												<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label">Display price range</label>
								<div class="controls">
									<div id="corrector_pricedisplaycheck">
										<input type="checkbox" <?php if ($this->_tpl_vars['prod_step1']['corrector_pricedisplay'] == 'yes'): ?>checked<?php endif; ?> name="corrector_pricedisplay" value="yes">
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label">Brief correcteur</label>
								<div class="controls">
									<div id="upload-correction-spec_chzn" class="span3">
										<span class="btn btn-file">
											<span class="fileupload-new"><i class="icon-adt_atach"></i>Add Brief</span>
											<input type="file" class="" name="correction_file">
										</span>
										<input type="hidden" class="validate[required]" id="upload-correction-spec" value="<?php echo $this->_tpl_vars['prod_step1']['correction_spec_file_name']; ?>
">
										<div id="correction_spec_file_name"><?php echo $this->_tpl_vars['prod_step1']['correction_spec_file_name']; ?>
</div>								
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php if ($this->_tpl_vars['prod_step1']['correction'] == 'internal'): ?>					
					<div id="internal">
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label">Plagiarism Excel</label>
								<div class="controls">
									<div class="span4">
										<div class="" id="">
												<label class="radio inline">
												<input type="radio" name="plag_excel_file" class="icheck" value="yes" <?php if ($this->_tpl_vars['prod_step1']['plag_excel_file'] == 'yes'): ?> checked<?php endif; ?>/> 
													YES&nbsp;&nbsp;&nbsp;
												</label>
												<label class="radio inline">
												<input type="radio" name="plag_excel_file" class="icheck" value="no" <?php if ($this->_tpl_vars['prod_step1']['plag_excel_file'] != 'yes'): ?> checked<?php endif; ?>/> 
													NO
												</label>
										</div>
									</div>
								</div>
								<div class="controls" id="plag_excel_div" <?php if ($this->_tpl_vars['prod_step1']['plag_excel_file'] != 'yes'): ?> style="display:none"<?php endif; ?>>
									<div class="span2" >
										<select name="plag_xls" class="span12 customselect" id="plag_xls">
											<option value="xls" <?php if ($this->_tpl_vars['prod_step1']['plag_xls'] == 'xls'): ?> selected <?php endif; ?>>XLS</option>
											<option value="xlsx" <?php if ($this->_tpl_vars['prod_step1']['plag_xls'] == 'xlsx'): ?> selected <?php endif; ?>>XLSX</option>
										</select>
									</div>
									<div class="span3">
										<input type="text" class="span12" id="xls_columns" value="<?php echo $this->_tpl_vars['prod_step1']['xls_columns']; ?>
" placeholder="# columns" name="xls_columns">
									</div>
								</div>
							</div>
						</div>
					</div>	
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
			<!-- Files Rules -->
			
			<div class="mission-details2">			
				<div class="prod-mission-product">Files Rules</div>
			</div>
			
			<div class="w-box">
				<div class="w-box-content cnt_a">
				<div class="row-fluid">
					<div class="span6">
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">#Files / Pack</label>
							<div class="controls">
								<input type="text" onkeyup="fncalculateRemainingArticles();" onchange="fncalculateRemainingArticles();" name="files_pack" id="files_pack" class="span4 validate[required]" value="<?php echo $this->_tpl_vars['prod_step1']['files_pack']; ?>
" readonly />
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">#Pack to create</label>
							<div class="controls">
								<input type="text" onkeyup="fncalculateRemainingArticles();" name="total_article" id="total_article" class="span4 validate[required]" value="<?php echo $this->_tpl_vars['prod_step1']['total_article']; ?>
" />
							</div>
						</div>
					</div>
					</div>
					<div class="span6 pull-center">
						<div class="row-fluid ">
							Remaining articles for this mission
							<h3>
								<span id="remaining_articles"><?php echo $this->_tpl_vars['prod_step1']['remaining_articles']; ?>
</span> / <?php echo $this->_tpl_vars['prod_step1']['volume']; ?>

							</h3>
						</div>
						<hr style="width:150px;margin:10px auto;"/>
						<div class="row-fluid">
							Remaining Days
							<h3>
								<?php echo $this->_tpl_vars['prod_step1']['mission_end_days']; ?>

							</h3>
						</div>
					</div>
				</div>
				</div>
			</div>
			<div class="control-group topset2">
				<div class="pull-center">
					<button class="btn btn-primary" id="step1_submit" type="button" >Save and schedule</button>
				</div>
			</div>
		</form>	
		</div>
		<div class="span3">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'gebo/survey/info.phtml', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
	</div>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>	
<!-- popup to show sample texts -->
<div class="container modal hide fade" id="sampletexts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Sample texts</h3>
    </div>
    <div class="modal-body">
	
    </div>
    <div class="modal-footer">
    </div>
</div>
<?php echo '
<script type="text/javascript">
function loadcategory()
{
	var theme_id = $(".themes").val();
	$.post(\'/bnp-quotedelivery/get-category/\',{"theme_id":theme_id},function(json){
		$(".category").html("");
		$(".category").append($("<option></option>").val(\'\').text(""));
		for(var key in json) 
		{
			 $(".category").append($("<option></option>").val(json[key].cat_id).html(json[key].category_name));
		}
		$("#category").trigger("liszt:updated");
		
		//if(!json.length)
			$("#seeall").prop("disabled",true);
			$(".sampletextblock").hide();
			$("#atokens, #sampletxt_text").html(\'\');
			$("#seeall").text("See all");
			$("#sampletext, #seeall").val(\'\');
	},\'json\');
}

function loadtokens(status)
{
	var cat_id = $("#category").val();
	if(cat_id)
	{		
		var matokens = "";
		var oatokens = "";
		var hatokens = "";
		var selected = false;
		$.post(\'/bnp-quotedelivery/get-tokens\',{"cat_id":$("#category").val()},function(json){
			if(status)
			{
				$("#seeall").text("See all");
				$("#atokens, #sampletxt_text").html(\'\');
				$("#sampletext, #seeall").val(\'\');
				$(".sampletextblock").hide();
			}
				
				if(Object.keys(json.mtokens).length)
				{
					matokens = \'<div class="well"><h5>Mandatory Tokens</h5>\';
					if(product==\'translation\')
					{
						matokens += "<select name=\'mandatory\' class=\'validate[required]\' placeholder=\'Select Mandatory Token\' id=\'mand_tokens\' onchange=\'getTranslateStencilsCount()\'><option></option>";
					}
					else{
						matokens += "<select name=\'mandatory\' class=\'validate[required]\' placeholder=\'Select Mandatory Token\' id=\'mand_tokens\' onchange=\'showsample()\'><option></option>";
					}
				}
				
				for(var key in json.mtokens) 
				{
					//matokens += \'<label class="label label-info">\'+json.mtokens[key]+\'</label><br>\';
					if(jQuery.inArray( key, json.selected_ids)!=-1)
						selected = "selected";
					else
						selected = "";
					matokens += "<option value=\'"+key+"\' "+selected+">"+json.mtokens[key]+"</option>";
				}
				if(matokens)
				{
					matokens += "</select>";
					matokens += \'</div>\';
				}
				if(Object.keys(json.otokens).length)
				{
					oatokens = \'<div class="well"><h5>Optional Tokens</h5>\';
					oatokens += "<select name=\'optional[]\' multiple class=\'\' id=\'optionaltok\'>";
				}
				
				for(var key in json.otokens) 
				{
					//oatokens += \'<label class="label label-info">\'+json.otokens[key]+\'</label><br>\';
					if(jQuery.inArray( key, json.selected_ids)!=-1)
					{
						selected = "selected=\'selected\'";
					}	
					else
						selected = "";
					
					oatokens += "<option value=\'"+key+"\' "+selected+">"+json.otokens[key]+"</option>";
				}
					
				if(oatokens)
				{
					oatokens += "</select>";
					oatokens += \'</div>\';
				}
				
			
				/* if(json.htokens.length)
				hatokens = \'<div class="well"><h5>Hidden Tokens</h5>\';
				for(var key in json.otokens) 
					hatokens += \'<label class="label label-info">\'+json.htokens[key]+\'</label><br>\';
				if(hatokens)
				hatokens += \'</div>\'; */
			
				$("#atokens").html(matokens+oatokens);
				$("#mand_tokens").chosen({  allow_single_deselect:false,search_contains: true});
				$("#optionaltok").multiselect({
					includeSelectAllOption: true,
					nonSelectedText:\'Select Optional Tokens\',
					numberDisplayed: 1,
					buttonWidth:\'200px\',
					maxHeight: 200,
					enableCaseInsensitiveFiltering: true
				});
				
					},\'json\');
				
				
				
	}
	else
		$("#seeall").prop("disabled",true);
}

function getsampletexts()
{
	var language=\''; ?>
<?php echo $this->_tpl_vars['prod_step1']['language']; ?>
<?php echo '\';
	var language_dest=\''; ?>
<?php echo $this->_tpl_vars['prod_step1']['language_dest']; ?>
<?php echo '\';
	var product=\''; ?>
<?php echo $this->_tpl_vars['prod_step1']['product']; ?>
<?php echo '\';
	var checkLang=\'\';
	if(product==\'translation\')
		checkLang=language_dest;
	else
		checkLang=language;
	
	$(\'#sampletexts\').modal(\'show\');
	$(\'#sampletexts .modal-body\').html(\'Please wait loading...\');
	$.post(\'/bnp-quotedelivery/sample-texts\',{"token_id":$("#mand_tokens").val(),"sample_id":$("#sampletext").val(),"language":checkLang},function(data)
	{
		$("#sampletexts .modal-body").html(data);	
	});
}

function showsample()
{
	$(".sampletextblock").show();
	$("#seeall").prop("disabled",false);
}
function getbnpsampletexts(city_id){
    $(\'#sampletexts\').modal(\'show\');
    $(\'#sampletexts .modal-body\').html(\'Please wait loading...\');
    $.post(\'/bnp-quotedelivery/sample-bnp-texts?city_id=\'+city_id,function(data){
        $("#sampletexts .modal-body").html(data);
    });
}
    function enable_textbox(Id){
        if($("#city_" + Id).is(":checked")) {
            $("#city_" + Id).attr(\'name\',\'city[]\');
            $("#no_of_articles_" + Id).attr(\'name\',\'no_of_articles[]\');
            $("#sample_text_id_" + Id).attr(\'name\',\'sample_text_id[]\');
            $("#no_of_articles_" + Id).removeAttr(\'readonly\');
        }
        else{
            $("#city_" + Id).attr(\'name\');
            $("#no_of_articles_" + Id).removeAttr(\'name\');
            $("#sample_text_id_" + Id).removeAttr(\'name\');
            $("#no_of_articles_" + Id).attr(\'readonly\',\'readonly\');
        }
        var count = calculate_files_pack();//count how many cities are selcted and calculate files packs.
        if(count < 1 || count > 5){
            $("#city_details_err").show();
            $(\'html,body\').animate({
                    scrollTop: $("#city_details").offset().top},
                \'slow\');
            $("#step1_submit").attr(\'type\',\'button\');
        }
        else{
            $("#city_details_err").hide();
            $("#step1_submit").attr(\'type\',\'submit\');
        }
    }
    //jquery function to check if the city has been selected and the form has submit button//
    $("#step1_submit").on(\'click\',function(e){
        if($("#step1_submit").attr(\'type\') === \'button\'){
            console.log(\'button\');
            $("#city_details_err").show();
            $(\'html,body\').animate({
                    scrollTop: $("#city_details").offset().top},
                \'slow\');
        }
        else{
            console.log(\'submit\');
            $("#city_details_err").hide();
        }
    });
    function calculate_files_pack(){
        var total = parseInt(0);
        var counter = 0;
        $("input[id^=\'no_of_articles_\']").each(function() {
            if($(this).attr(\'value\') != \'\' && !$(this).is(\'[readonly]\') ) {
                total = parseInt($(this).attr(\'value\')) + parseInt(total);
                counter++;
                console.log(counter);
            }
            $("#files_pack").val(total);
        });
        fncalculateRemainingArticles();
        return counter;
    }
    function validate_fields(){

    }
</script>
'; ?>

