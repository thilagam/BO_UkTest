<?php /* Smarty version 2.6.19, created on 2016-03-24 08:06:38
         compiled from gebo/quote/create-quote-step1.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/quote/create-quote-step1.phtml', 219, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<link href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" rel="stylesheet">
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script> 

<script language="javascript">

$(document).ready(function() {

	//icheck radio/checkbox
		$(".icheck").iCheck({
			checkboxClass: \'icheckbox_square-blue\',
			radioClass: \'iradio_square-blue\'
		});
	
	$("#create_quote").validationEngine({prettySelect : true,autoHidePrompt: true,useSuffix: "_chzn", onValidationComplete: function(form, status){
			if(status==true)
			{
				if($(\'input[name="client_websites[]"]:checked\').length==0 && $(\'input[name="urls[]"]\').length==0)
					smoke.alert("Vous devez ins&eacute;rer au moins un site internet pour ce client");
				else
				return true;
			}
	}}); 
	
	$("#company_name").chosen({ allow_single_deselect: false,search_contains: true});
	$("#category").chosen({ allow_single_deselect: false,search_contains: true});
	$("#currency").chosen({ allow_single_deselect: false});
	
	$(".uni_style").uniform();

	//show other category text box when other selected
	$( "#category" ).change(function() {
		var category = $("#category").val();
		if(category == \'other\')
		{
			$("#category_other").show();
			$("#category_other").addClass("validate[required]");
		}
		else
		{
			$("#category_other").hide();
			$("#category_other").removeClass("validate[required]");
		}
	});	
	
	$( "#currency" ).change(function() {
		$("#tax_conversion").toggle();
	});
	
	
	//client filters
	$(\'input[name="client_type[]"]\').on(\'ifChanged\', function(event){
	
		var value = "";
		$(\'input[name="client_type[]"]:checked\').each(function(){
			value += $(this).val()+",";			
		});		
		$.get("/quote/get-client-type-list",{"client_type":value},function(result){
			
			$("#company_name").html(result);
			$("#company_name").chosen();
			$("#company_name").val(\'\').trigger("liszt:updated");
		});
		
	});
	
	
});

var client_session='; ?>
'<?php echo $this->_tpl_vars['create_step1']['client_id']; ?>
'<?php echo ';

if(client_session)
	loadWebsites(client_session);
	
function loadWebsites(client_identifier)
{	
	//var client_identifier=element.value;
	var url_cnt=0;
	var company= $("#company_name  option:selected").text();
	//var company=element.options[element.selectedIndex].text;
	if(client_identifier)
	{
		var target_page=\'/quote/get-client-websites?client_id=\'+client_identifier;
		//alert(target_page);		 
		//var add_website=\''; ?>
<?php if ($this->_tpl_vars['custom']['action'] != 'edit' || $this->_tpl_vars['custom']['create_new_version'] == 'yes'): ?><div><a id="addmore_url_link">Ajouter un site internet '+company+'</a></div><?php endif; ?><?php echo '\';
		var add_website=\'<div><a id="addmore_url_link">Add a website \'+company+\'</a></div>\';			
		
		$.get(target_page, function(data){
			$("#web_url").show();
			if(data){			
				$("#client_websites").html(data+add_website);
				$(".uni_style").uniform();				
			}
			else{
				$("#client_websites").html(\'No Websites found for this Client\'+add_website);
			}
			
			
			//Close URL text boxes when click on close 
			$("[id^=url_close_]").live(\'click\', function() {
				var DivId = $(this).attr(\'id\');
				var parentDiv=$(this).parents("div:first").attr(\'id\');
				var client_identifier=$(this).attr(\'rel\');
				var closeDiv=$("#"+parentDiv).children(".close").attr(\'id\');
				
				//if($("[id^=urls_]").size()>1)
				//{
					$("#"+parentDiv).remove();
					url_cnt=url_cnt-1;
				//}
				if($("[id^=urls_]").length==0)
				{
					$(".uni_style").each(function(){
						$(this).addClass(\'validate[required]\');
					})
				}
			});			
			
			
			//Add more URLs
			$("#addmore_url_link").click(function(){		
				$("[id^=urls_]" ).each(function(u) {
					url_cnt=++u;
				});
				//alert(url_cnt);
				removeCheckboxValidation();
				var cloned =$("#addmore_url_link");	
				if(url_cnt==0)
				{
					var div = jQuery(\'<div class="row-fluid" id="urls_1"></div>\').html(\'<div class="span6"><input type="text" name="urls[]" id="url_1" class="validate[required,custom[url]]"/></div><button class="close alignleft" type="button" id="url_close_1" rel="1">&times;</button>\'); 
					div.insertBefore(cloned);
					
				}	
				else
				{
					$("#urls_1").clone().attr(\'id\', \'urls_\'+(++url_cnt) ).insertBefore( cloned );	
					$(\'#urls_\'+url_cnt+\' input[name="urls[]"]\').attr(\'id\',\'url_\'+url_cnt);											
					
					$(\'#urls_\'+url_cnt+\' .close\').attr(\'id\',\'url_close_\'+url_cnt);
					$(\'#urls_\'+url_cnt+\' .close\').show();
					$(\'#url_\'+url_cnt).val(\'\');
					$(\'#urls_\'+url_cnt+\' .close\').attr(\'rel\',\'\');
				}
			
			});	
			

			
		});
		
		//check mandatory client details exists or not
		var check_client_target_page=\'/quote/check-client-mandatory-details?client_id=\'+client_identifier;
		//alert(check_client_target_page);
		$.get(check_client_target_page, function(data){
			var obj = $.parseJSON(data);
			if(obj.status==\'NotExists\')
			{
				window.location=\'/quote/create-client?uaction=edit&client_id=\'+client_identifier+\'&submenuId=ML13-SL1&from=quote\';
			}
			
		});	
		
	}	
}

function removeCheckboxValidation()
{
	$(".uni_style").each(function(){
		$(this).removeClass(\'validate[required]\');
	})
}
</script>
'; ?>



<div class="row-fluid">    
	<div class="span12">
		<div class="row-fluid">
			<ul id="validate_wizard-titles" class="stepy-titles clearfix">
				<li id="validate_wizard-title-0" class="current-step"><div>Creation</div><span class="stepNb">1</span></li>
				<li id="validate_wizard-title-1"><div>TECH review</div><span class="stepNb">2</span></li>
				<li id="validate_wizard-title-2"><div>SEO review</div><span class="stepNb">3</span></li>
				<li id="validate_wizard-title-3"><div>Prod review</div><span class="stepNb">4</span></li>
				<li id="validate_wizard-title-4"><div>Validation</div><span class="stepNb">5</span></li>
			</ul>
		</div>	
		<div class="row-fluid">
			<div class="span2"></div>
			<div class="span8">
				<form id="create_quote" class="step form-horizontal" method="POST" action="/quote/save-quote-step1">
					<fieldset>				
						<legend>Create a new quote</legend>
						<?php if ($this->_tpl_vars['custom']['action'] != 'edit' && $this->_tpl_vars['user_type'] == 'superadmin'): ?>
							<div class="formSep control-group">
								<label class="control-label"></label>
								<div class="controls form-inline">							
									<label>
										<input type="checkbox" class="icheck" name="client_type[]"  value="new" <?php if (in_array ( 'new' , $this->_tpl_vars['create_step1']['client_type'] )): ?> checked <?php endif; ?>> NEW
									</label>
									<label>
										<input type="checkbox" class="icheck" name="client_type[]"  value="other" <?php if (in_array ( 'other' , $this->_tpl_vars['create_step1']['client_type'] )): ?> checked <?php endif; ?>> OLD
									</label>
									<label>
										<input type="checkbox" class="icheck" name="client_type[]"  value="liberte" <?php if (in_array ( 'liberte' , $this->_tpl_vars['create_step1']['client_type'] )): ?> checked <?php endif; ?>> LINK
									</label>
								
								</div>
							</div>
						<?php endif; ?>	
						<div class="formSep control-group">
							<label for="company_name" class="control-label">Company Name:</label>
							<div class="controls">
								<select name="client_id" id="company_name" class="validate[required]" data-placeholder="Select company" onchange="loadWebsites(this.value);" <?php if ($this->_tpl_vars['custom']['action'] == 'edit'): ?> disabled<?php endif; ?> >					
									<option></option>
									<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['company_list'],'selected' => $this->_tpl_vars['create_step1']['client_id']), $this);?>

								</select>
								<?php if ($this->_tpl_vars['custom']['action'] != 'edit'): ?> 
									<div><a href="/quote/create-client?submenuId=ML13-SL1">Create a new client</a></div>
								<?php endif; ?>	
							</div>
						</div>
						<div class="formSep control-group">
							<label for="category" class="control-label">Category:</label>
							<div class="controls">
								<select name="category" id="category" class="validate[required]" data-placeholder="Select category">
									<option></option>
									<!--<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_categories_list'],'selected' => $this->_tpl_vars['create_step1']['category']), $this);?>
-->
									<?php $_from = $this->_tpl_vars['ep_categories_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['catloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['catloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat_key'] => $this->_tpl_vars['cat']):
        $this->_foreach['catloop']['iteration']++;
?>
										<?php if (($this->_foreach['catloop']['iteration']-1) < 14): ?>
											<option value="<?php echo $this->_tpl_vars['cat_key']; ?>
" <?php if ($this->_tpl_vars['create_step1']['category'] == $this->_tpl_vars['cat_key']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['cat']; ?>
</option>
										<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?>
								</select>
								<input type="text" <?php if ($this->_tpl_vars['create_step1']['category'] == 'other'): ?>style="display: inline;margin-top:-22px"<?php else: ?> style="display: none;margin-top:-22px"<?php endif; ?> class="span5 validation[required]" value="<?php echo $this->_tpl_vars['create_step1']['category_other']; ?>
" id="category_other" name="category_other"> 
							</div>
						</div>
						<div id="web_url" style="display:none">
							<div class="formSep control-group">
								<label class="control-label">Select an url:</label>
								<div class="controls" id="client_websites">									
																		
								</div>								
							</div>	
						</div>
						<div class="formSep control-group">
							<label for="currency" class="control-label">Currency:</label>
							<div class="controls">
								<select name="currency" id="currency" class="validate[required]">					
									<option value="pound" <?php if ($this->_tpl_vars['create_step1']['currency'] == 'pound' || ! $this->_tpl_vars['create_step1']['currency']): ?> selected<?php endif; ?> >Pound</option>
									<option value="euro" <?php if ($this->_tpl_vars['create_step1']['currency'] == 'euro'): ?> selected<?php endif; ?>>Euro</option>
								</select>								
							</div>
						</div>
						<div class="formSep control-group" id="tax_conversion" <?php if ($this->_tpl_vars['create_step1']['currency'] == 'pound' || ! $this->_tpl_vars['create_step1']['currency']): ?> style="display:none" <?php else: ?>style="display:block"<?php endif; ?>>
							<label for="conversion" class="control-label">Exchange rate:</label>
							<div class="controls">
																<div class="span4">
									<div class="input-prepend input-append">
										<span class="add-on">1 Pound =</span><input type="text"  class="span5 validate[required,custom[number]]" value="<?php if ($this->_tpl_vars['create_step1']['conversion']): ?><?php echo $this->_tpl_vars['create_step1']['conversion']; ?>
<?php else: ?>1<?php endif; ?>" name="conversion" id="conversion"><span class="add-on">Euro</span>
									</div>
								</div>
							</div>
						</div>
						<div class="formSep control-group">
							<label for="currency" class="control-label">Do you want to create <br>a quote:</label>
							<div class="controls">
								<label><input type="radio" class="icheck validate[required]" <?php if ($this->_tpl_vars['create_step1']['quote_type'] == 'only_tech'): ?> checked<?php endif; ?> name="quote_type"  value="only_tech" <?php if ($this->_tpl_vars['custom']['action'] == 'edit'): ?> disabled<?php endif; ?>>Tech only</label>
								<label><input type="radio" class="icheck validate[required]" <?php if ($this->_tpl_vars['create_step1']['quote_type'] == 'only_seo'): ?> checked<?php endif; ?> name="quote_type"  value="only_seo" <?php if ($this->_tpl_vars['custom']['action'] == 'edit'): ?> disabled<?php endif; ?>>Seo only</label>
								<label><input type="radio" class="icheck validate[required]" <?php if ($this->_tpl_vars['create_step1']['quote_type'] == 'normal' || ! $this->_tpl_vars['create_step1']['quote_type']): ?> checked<?php endif; ?> name="quote_type"  value="normal" <?php if ($this->_tpl_vars['custom']['action'] == 'edit'): ?> disabled<?php endif; ?>>Normal</label>
							</div>
						</div>	
						
						<div class="control-group">		
							<div class="controls">
								<button type="submit" class="finish btn btn-primary"><i class="icon-ok icon-white"></i> Validate</button>
							</div>	
						</div>	
					</fieldset>	
				</form>
			</div>
			<div class="span2"></div>
		</div>		
	</div>
</div>


<!--Add websites to client-->
<div class="modal container hide fade" id="add_website">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Ajouter un site internet</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>