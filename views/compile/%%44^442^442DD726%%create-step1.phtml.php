<?php /* Smarty version 2.6.19, created on 2016-04-26 17:34:28
         compiled from gebo-new/quote/create-step1.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo-new/quote/create-step1.phtml', 230, false),array('modifier', 'utf8_encode', 'gebo-new/quote/create-step1.phtml', 230, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/lbd/lib/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/lbd/lib/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/lbd/lib/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script language="javascript">

$(document).ready(function() {

	$(".icheck").checkbox();
	
	var prefix = "client_";
	/*<!-- Bootstrap Select Picker -->
	$(".selectpicker").selectpicker();
	*/   
    $("#company_name").chosen({ allow_single_deselect: false,search_contains: true});
	$("#category").chosen({ allow_single_deselect: false,search_contains: true});
	$(\'select\').each(function() {
        $(this).next(\'div.chosen-container\').attr("id", prefix + this.id).removeClass("validate[required]");
    });	
		
		 
	$("#create_quote").validationEngine(\'attach\',{prettySelect : true,autoHidePrompt: true,usePrefix: prefix, onValidationComplete: function(form, status){			
			if(status==true)
			{
				if($(\'input[name="client_websites[]"]:checked\').length==0 && $(\'input[name="urls[]"]\').length==0)
					smoke.alert("Vous devez ins&eacute;rer au moins un site internet pour ce client");
				else
				return true;
			}
	}}); 
	
	
	

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
	$(\'input[name="client_type[]"]\').on(\'change\', function(event){
	
		var value = "";
		$(\'input[name="client_type[]"]:checked\').each(function(){
			value += $(this).val()+",";			
		});		
		$.get("/quote-new/get-client-type-list",{"client_type":value},function(result){
			
			$("#company_name").html(result);			
			//$("#company_name").chosen();
			$("#company_name").val(\'\').trigger("chosen:updated");			
		});
		
	});
	
	
});

var client_session='; ?>
'<?php echo $this->_tpl_vars['create_step1']['client_id']; ?>
'<?php echo ';
var session_id=\''; ?>
<?php echo $this->_tpl_vars['session_id']; ?>
<?php echo '\';
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
		var target_page=\'/quote-new/get-client-websites?client_id=\'+client_identifier+\'&session_id=\'+session_id;
		//alert(target_page);		 		
		var add_website=\'<div class="checkbox"><a id="addmore_url_link" style="cursor:pointer;">Add a new website \'+company+\'</a></div>\';			
		
		$.get(target_page, function(data){
			$("#web_url").show();
			if(data){			
					$("#client_websites").html(data+add_website);
					$(".icheck").checkbox();
			}
			else{
				$("#client_websites").html(\'No Websites found for this Client\'+add_website);
			}
			
			
			//Close URL text boxes when click on close 
			$("body").on(\'click\',\'[id^=url_close_]\',function() {
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
					$(".icheck").each(function(){
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
					var div = jQuery(\'<div class="form-group" id="urls_1"></div>\').html(\'<div class="col-md-11"><input type="text" name="urls[]" id="url_1" class="form-control validate[required,custom[url]]"/></div><button class="close pull-left" type="button" id="url_close_1" rel="1">&times;</button>\');
					div.insertBefore(cloned.parent());
					
				}	
				else
				{
					$("#urls_1").clone().attr(\'id\', \'urls_\'+(++url_cnt) ).insertBefore(cloned.parent());	
					$(\'#urls_\'+url_cnt+\' input[name="urls[]"]\').attr(\'id\',\'url_\'+url_cnt);											
					
					$(\'#urls_\'+url_cnt+\' .close\').attr(\'id\',\'url_close_\'+url_cnt);
					$(\'#urls_\'+url_cnt+\' .close\').show();
					$(\'#url_\'+url_cnt).val(\'\');
					$(\'#urls_\'+url_cnt+\' .close\').attr(\'rel\',\'\');
				}
			
			});	
			

			
		});
		
		//check mandatory client details exists or not
		var check_client_target_page=\'/quote-new/check-client-mandatory-details?client_id=\'+client_identifier;
		//alert(check_client_target_page);
		$.get(check_client_target_page, function(data){
			var obj = $.parseJSON(data);
			if(obj.status==\'NotExists\')
			{
				var msg="Le profil de votre client n\'est pas complet, vous allez &ecirc;tre redirig&eacute; sur la page d\'&eacute;dition du client";
				
				swal({
						title: "",
						html: msg,
						type: "error",					
						confirmButtonText: "Ok" 
					},
					function(){
						window.location=\'/quote/create-client?uaction=edit&client_id=\'+client_identifier+\'&submenuId=ML13-SL1&from=quote-new\';
					}
				);
			}
			
		});	
		
	}	
}

function removeCheckboxValidation()
{
	$(".icheck").each(function(){
		$(this).removeClass(\'validate[required]\');
	})
}
</script>
'; ?>




		<div class="row">			
			<div class="col-md-6 col-md-offset-3">

				<h2 class="text-center"><i class="material-icons" style="font-size: 48px">monetization_on</i> <br>
				<?php if ($this->_tpl_vars['create_step1']['quote_title']): ?>
					<?php echo $this->_tpl_vars['create_step1']['quote_title']; ?>

				<?php else: ?>
					New Quote
				<?php endif; ?>	
					
				</h2>
				<div class="card">	
					<div class="content">	
				<form id="create_quote" class="form-horizontal" method="POST" action="/quote-new/save-quote-step1">
					<input type="hidden" name="session_id" value="<?php echo $this->_tpl_vars['session_id']; ?>
">
					<fieldset>				
						<?php if ($this->_tpl_vars['custom']['action'] != 'edit' && $this->_tpl_vars['user_type'] == 'superadmin'): ?>
							<div class="form-group">
								<label class="col-md-4  control-label"></label>
								<div class="col-md-6">
									<label class="checkbox checkbox-inline" >
										<input type="checkbox" class="icheck" name="client_type[]"  value="new" <?php if (in_array ( 'new' , $this->_tpl_vars['create_step1']['client_type'] )): ?> checked <?php endif; ?> data-toggle="checkbox"> Client Premium
									</label>
									<label class="checkbox checkbox-inline" >
										<input type="checkbox" class="icheck" name="client_type[]"  value="other" <?php if (in_array ( 'other' , $this->_tpl_vars['create_step1']['client_type'] )): ?> checked <?php endif; ?> data-toggle="checkbox"> OLD
									</label>
									<label class="checkbox checkbox-inline" >
										<input type="checkbox" class="icheck" name="client_type[]"  value="liberte" <?php if (in_array ( 'liberte' , $this->_tpl_vars['create_step1']['client_type'] )): ?> checked <?php endif; ?> data-toggle="checkbox"> LINK
									</label>
								
								</div>
							</div>
						<?php endif; ?>	
						<div class="form-group">
							<label for="company_name" class="col-md-4  control-label">Client</label>
							<div class="col-md-6">
								<select name="client_id" id="company_name" class="col-md-12 validate[required]" data-placeholder="Select company" onchange="loadWebsites(this.value);" <?php if ($this->_tpl_vars['custom']['action'] == 'edit'): ?> disabled<?php endif; ?> >	
									<option></option>
									<?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['company_list'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)),'selected' => $this->_tpl_vars['create_step1']['client_id']), $this);?>

								</select>
								<?php if ($this->_tpl_vars['custom']['action'] != 'edit'): ?> 
									<div style="margin-top: 10px">Not in this list ? <a href="/quote/create-client?submenuId=ML13-SL1">Create a new client profile</a></div>
								<?php endif; ?>	
							</div>
						</div>
						<div class="form-group">
							<label for="title" class="col-md-4  control-label">Quote name</label>
							<div class="col-md-6">
								<input type="text" name="title" value="<?php echo $this->_tpl_vars['create_step1']['title']; ?>
" class="form-control validate[required]" placeholder="Ex: 2000 articles seo in furniture">
							</div>
						</div>
						<div class="form-group">
							<label for="category" class="col-md-4  control-label">Category:</label>
							<div class="col-md-6">
								<select name="category" id="category" class="col-md-12 validate[required]" data-placeholder="Select Category">
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
								<input type="text" <?php if ($this->_tpl_vars['create_step1']['category'] == 'other'): ?>style="display: inline;margin-top:10px"<?php else: ?> style="display: none;margin-top:10px"<?php endif; ?> class="col-md-5 validation[required] form-control" value="<?php echo $this->_tpl_vars['create_step1']['category_other']; ?>
" id="category_other" name="category_other"> 
							</div>
						</div>
						<div id="web_url" style="display:none">
							<div class="form-group">
								<label class="col-md-4  control-label">Website(s)</label>
								<div class="col-md-6" id="client_websites">									
																		
								</div>								
							</div>	
						</div>
						<!--								</select>								
							</div>
						</div>
						<div class="form-group" id="tax_conversion" <?php if ($this->_tpl_vars['create_step1']['currency'] == 'euro' || ! $this->_tpl_vars['create_step1']['currency']): ?> style="display:none" <?php else: ?>style="display:block"<?php endif; ?>>
							<label for="conversion" class="col-md-4  control-label">Exchange rate</label>
							<div class="col-md-6">
								<div class="input-group">
									<div  class="input-group-addon">1 &euro; =</div >
									<input type="text"  class="col-md-3 validate[required,custom[number]] form-control" value="<?php if ($this->_tpl_vars['create_step1']['conversion']): ?><?php echo $this->_tpl_vars['create_step1']['conversion']; ?>
<?php else: ?>1<?php endif; ?>" name="conversion" id="conversion">
									<div  class="input-group-addon">&pound;</div >
								</div>
							</div>	
						</div>*}-->							
						
						<div class="form-group">	
						<label class="col-md-4"></label>	
							<div class="col-md-6">
								<button type="submit" class="btn btn-primary btn-wd btn-fill"><i class="icon-ok icon-white"></i>
								<?php if ($this->_tpl_vars['custom']['quote_id']): ?>
									Suivant
								<?php else: ?>
									Valider
								<?php endif; ?>	
								</button>
							</div>	
						</div>	
					</fieldset>	
				</form>
			</div>
			</div>	
		</div>		
	</div>



<!--Add websites to client-->
<div class="modal container hide fade" id="add_website">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Add a new client website</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>