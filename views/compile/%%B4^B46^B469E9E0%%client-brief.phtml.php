<?php /* Smarty version 2.6.19, created on 2016-05-09 10:02:52
         compiled from gebo-new/quote/client-brief.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', 'gebo-new/quote/client-brief.phtml', 50, false),array('modifier', 'count', 'gebo-new/quote/client-brief.phtml', 73, false),array('modifier', 'replace', 'gebo-new/quote/client-brief.phtml', 77, false),array('modifier', 'stripslashes', 'gebo-new/quote/client-brief.phtml', 101, false),array('function', 'html_options', 'gebo-new/quote/client-brief.phtml', 238, false),)), $this); ?>
<?php echo '
<!--custom css-->
<link rel="stylesheet" href="/BO/theme/lbd/css/custom_quote.css" type="text/css"/>
<script src="/BO/theme/lbd/lib/tinymce_4.2.5/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/BO/theme/lbd/lib/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/lbd/lib/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/lbd/lib/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

'; ?>

<?php if ($this->_tpl_vars['custom']['quote_id']): ?>
	<?php echo '
		<!-- Multi select with images-->
		<link rel="stylesheet" href="/BO/theme/lbd/lib/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css"/>
		<script src="/BO/theme/lbd/lib/bootstrap-multiselect/bootstrap-multiselect-img.js" type="text/javascript" charset="utf-8"></script>
	'; ?>

<?php endif; ?>
<?php echo '
<!-- Drag and drop File uploading-->
<link href="/BO/theme/lbd/lib/drag-drop-file/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="/BO/theme/lbd/lib/drag-drop-file/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/BO/theme/lbd/lib/drag-drop-file/js/jquery.filer.js?v=1.0.5"></script>

<script type="text/javascript" src="/BO/theme/lbd/js/jquery.bootstrap.wizard.js"></script>
<script type="text/javascript" src="/BO/theme/lbd/js/jquery.validate.min.js"></script>

<style>			
		
	#agency_details ,#internal_team_details
	{
		display: none;
	}		
	
	</style>
'; ?>
	

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo-new/quote/header.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container-fluid">
<div class="row" id="brief-header">
	<div class="col-md-8">
	<h1><small> Quote <?php echo $this->_tpl_vars['create_step1']['quote_title']; ?>
</small><br>Customer pitch</h1>
	</div>
	<div class="col-md-4">
		<?php if ($this->_tpl_vars['custom']['quote_id']): ?>
	<div id="send-brief" class="pull-right">
									<form role="form" class="form-inline" name="email-notify" id="email-notify">  
										<div class="form-group" id="manager_html">
											<select id="manager_list" class="col-md-12 form-control validate[required] pull-right" multiple="multiple" data-placeholder="Select Managers" name="manager_list[]" >
											 <?php $_from = $this->_tpl_vars['managersDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['manager_item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['manager_item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['manager_item']):
        $this->_foreach['manager_item']['iteration']++;
?>
											 <?php if (((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['brief_mail']) : in_array($_tmp, $this->_tpl_vars['brief_mail']))): ?>
											 <option value="<?php echo $this->_tpl_vars['key']; ?>
" selected> <?php echo $this->_tpl_vars['manager_item']; ?>
</option>
											 <?php else: ?>
											 <option value="<?php echo $this->_tpl_vars['key']; ?>
" > <?php echo $this->_tpl_vars['manager_item']; ?>
</option>
											 <?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>							    		
											</select>
										</div>
									</form>									
								</div>	
							<?php endif; ?>		
	</div>
</div>

<div class="row">
	<?php if ($this->_tpl_vars['custom']['quote_id']): ?>
		<div class="col-md-8">
	<?php else: ?>
		<div class="col-md-12">
	<?php endif; ?>	
		<div class="card">
			 <div class="content">
			  <div class="header">Overview</div>	
			  <?php if (((is_array($_tmp=$this->_tpl_vars['create_step1']['client_websites'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp)) > 0): ?>
							<div class="col-md-12  form-group">
							<?php $_from = $this->_tpl_vars['create_step1']['client_websites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['webitem'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['webitem']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['webitem']):
        $this->_foreach['webitem']['iteration']++;
?>
							<?php $this->assign('index', ($this->_foreach['webitem']['iteration']-1)); ?>
							<?php $this->assign('urlhttp', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['webitem'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'http://www.', '') : smarty_modifier_replace($_tmp, 'http://www.', '')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'http://', '') : smarty_modifier_replace($_tmp, 'http://', ''))); ?>
							<?php if ($this->_tpl_vars['index'] == 0): ?>
								<span>
									<span class="glyphicon glyphicon-link"></span>
									<a href="<?php echo $this->_tpl_vars['webitem']; ?>
" target="_blank" class="link_font" ><?php echo $this->_tpl_vars['urlhttp']; ?>
</a>
								</span>
							<?php else: ?>
								<br><span>
									<span class="glyphicon glyphicon-link"></span>
									<a href="<?php echo $this->_tpl_vars['webitem']; ?>
" target="_blank" class="link_font" ><?php echo $this->_tpl_vars['urlhttp']; ?>
</a>
								</span>
							<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
							</span>
							</div>
							<?php endif; ?>				
				
					<form class="MultiFile-intercepted" enctype="multipart/form-data" id="send-quote" method="POST" action="/quote-new/save-client-brief">
					<div class="content">			
						<div class="row">
							<div class="content">
							<div class="form-group">
								<label class="text-uppercase">Client profile</label>
								<?php if ($this->_tpl_vars['send_quote']['client_overview']): ?>
									<div class="client_modify"><?php echo ((is_array($_tmp=$this->_tpl_vars['send_quote']['client_overview'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>

										<div><a class="client_overview_modify" style="cursor:pointer;">Modify</a></div>
									</div>
									<textarea class="form-control hidden validate[required] validate[minSize[150]] mceEditor" name="client_overview" id="client_overview" placeholder="" rows="5" ><?php echo $this->_tpl_vars['send_quote']['client_overview']; ?>
</textarea>
								<?php else: ?>
									<textarea class="form-control input-medium validate[required] validate[minSize[150]] mceEditor" name="client_overview" id="client_overview" rows="5" placeholder="" minlength="150" ></textarea>
								<?php endif; ?>
							</div>
						
							<div class="form-group">
							<hr>	
								 <label class="text-uppercase">Prospect or customer story of the discussed project</label>
								<?php if ($this->_tpl_vars['send_quote']['client_email_text']): ?>
									<div class="brief_modify"><?php echo ((is_array($_tmp=$this->_tpl_vars['send_quote']['client_email_text'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>

										<div><a class="client_brief_modify" style="cursor:pointer;">Modify</a></div>
									</div>
									<textarea class="form-control hidden validate[required] mceEditor" id="client_email" name="client_email" placeholder="Help sales" rows="5"><?php echo $this->_tpl_vars['send_quote']['client_email_text']; ?>
</textarea>
								<?php else: ?>
									<textarea class="form-control input-medium validate[required] mceEditor " id="client_email" name="client_email" placeholder="Help sales" rows="5"></textarea>
								<?php endif; ?>
									
							</div>

<!-- radio -->
							<div class="form-group " id="brief_client_aims">
								<hr>
							<label class="text-uppercase">Please select the customer goal of this project</label>								
								<div class="radio">
									
										<label class="checkbox">
											<input type="checkbox" class="validate[minCheckbox[1]] icheck-set"  name="client_aims[]" data-toggle="checkbox"  value="seo" <?php if (((is_array($_tmp='seo')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['send_quote']['client_aims']) : in_array($_tmp, $this->_tpl_vars['send_quote']['client_aims']))): ?> checked<?php endif; ?> id="client_aims"> SEO
										</label>	
									
								</div>									
								<div class="radio">
										<label class="checkbox">
											<input type="checkbox" class="validate[minCheckbox[1]] icheck-set"  name="client_aims[]" data-toggle="checkbox"  value="social" <?php if (((is_array($_tmp='social')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['send_quote']['client_aims']) : in_array($_tmp, $this->_tpl_vars['send_quote']['client_aims']))): ?> checked<?php endif; ?> id="client_aims"> Social
										</label>
										</div>		
																	
								<div class="radio">
										<label class="checkbox">
											<input type="checkbox" class="validate[minCheckbox[1]] icheck-set"  name="client_aims[]" data-toggle="checkbox" value="conversion" <?php if (((is_array($_tmp='conversion')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['send_quote']['client_aims']) : in_array($_tmp, $this->_tpl_vars['send_quote']['client_aims']))): ?> checked<?php endif; ?> id="client_aims"> Conversion
										</label>		
								</div>									
								<div class="radio">
										<label class="checkbox">
											<input type="checkbox" class="validate[minCheckbox[1]] icheck-set"  name="client_aims[]" data-toggle="checkbox"  value="autre"<?php if (( ((is_array($_tmp='autre')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['send_quote']['client_aims']) : in_array($_tmp, $this->_tpl_vars['send_quote']['client_aims'])) )): ?> checked<?php elseif (count($this->_tpl_vars['send_quote']['client_aims']) > 0): ?> disabled <?php endif; ?> id="client_aims"> Autre
										</label>		
											
								</div>
							</div>
						<!-- radio -->

<div class="form-group">
								<div class="header text-center">Documents &amp; Specifications</div>	
								<input type="file" name="quote_documents[]" id="filer_input2" multiple="multiple" data-jfiler-extensions="doc,docx,xls,xlsx,zip,dot,html,pdf,jpg,png,xml,rar,pptx" data-jfiler-files=<?php echo $this->_tpl_vars['send_quote']['documents_files']; ?>
>
							</div>					
						</div>
		
						


						</div>

<div class="row">
						<div class="header">Sales Feedback</div>
						<div class="content">

						<div class="form-group ">
							<label>Are we in competition with another agency ?</label>
							<div class="pull-right">						
								<input type="checkbox" name="content_ordered"  id='content_ordered' <?php if ($this->_tpl_vars['send_quote']['content_ordered_agency'] == 'yes'): ?>checked<?php else: ?>""<?php endif; ?> data-toggle="switch" />
								<input type="hidden" name="content_ordered_agency"  id='content_ordered_agency' value="<?php if ($this->_tpl_vars['send_quote']['content_ordered_agency'] == 'yes'): ?>yes<?php else: ?>no<?php endif; ?>" >
							</div>
						</div>					
						<div class="form-group" id="agency_name_div" <?php if ($this->_tpl_vars['send_quote']['content_ordered_agency'] != 'yes'): ?> style="display:none"<?php endif; ?>>
							<input type="text" class="validate[required] form-control" id="agency_name" value="<?php echo $this->_tpl_vars['send_quote']['agency_name']; ?>
" placeholder="Enter at least 1 agency" name="agency_name">
						</div>

					<div class="form-group">
						<hr>
							<label>Contract signature percentage</label>

						<div class="row">	
							<!--estim&eacute; de signature-->
							<div class="form-inline col-md-2">	
								<select name="estimate_sign_percentage" id="estimate_sign_percentage" class="btn-lg validate[required] selectpicker">					
									<option value="20" <?php if ($this->_tpl_vars['send_quote']['estimate_sign_percentage'] == '20'): ?> selected <?php endif; ?>>20</option>
									<option value="40" <?php if ($this->_tpl_vars['send_quote']['estimate_sign_percentage'] == '40'): ?> selected <?php endif; ?>>40</option>
									<option value="60" <?php if ($this->_tpl_vars['send_quote']['estimate_sign_percentage'] == '60'): ?> selected <?php endif; ?>>60</option>
									<option value="80" <?php if ($this->_tpl_vars['send_quote']['estimate_sign_percentage'] == '80'): ?> selected <?php endif; ?>>80</option>
									<option value="100" <?php if ($this->_tpl_vars['send_quote']['estimate_sign_percentage'] == '100'): ?> selected <?php endif; ?>>100</option>
									
								</select>
							</div>
							<div class="form-group col-md-10">						
							<textarea name="estimate_sign_comments" id="estimate_sign_comments" class="validate[required] form-control" placeholder="s'agit-il d'une demande de tarif&nbsp;? d'un projet d&eacute;j&agrave; identifi&eacute;&nbsp;? Pr&eacute;cisez (si projet identifi&eacute; indiquer la date par ex.)"><?php echo $this->_tpl_vars['send_quote']['estimate_sign_comments']; ?>
</textarea>
							</div>
						</div>

					</div>	

					<div class="form-group ">
						<hr>
							<label>What is the key factor to sign this contract?</label>
						</div>
						<div class="form-group">
							<input type="text" class="validate[required] form-control" name="do_signer" value="<?php echo $this->_tpl_vars['send_quote']['do_signer']; ?>
">
						</div>


		
						<div class="form-group">
							<label>Original contact?</label>
							<select name="origin_contact" id="origin_contact" class="validate[required] selectpicker">
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['origin_contact'],'selected' => $this->_tpl_vars['send_quote']['origin_contact']), $this);?>

							</select>
						</div>

					<div class="form-group ">
						<hr>
							<label>Have you met this customer by a customer meeting?</label>
							<div class="pull-right">							
								<input type="checkbox" name="client_app"  id='client_app' <?php if ($this->_tpl_vars['send_quote']['client_appoinment'] != ''): ?>checked<?php endif; ?> data-toggle="switch">
							</div>
						</div>
						<div class="form-group " id="appointment_client" <?php if ($this->_tpl_vars['send_quote']['client_appoinment'] == ''): ?> style="display:none"<?php endif; ?>>
							<input type="text" class="validate[required] form-control" name="client_appoinment" value="<?php echo $this->_tpl_vars['send_quote']['client_appoinment']; ?>
">
						</div>

								<div class="form-group ">
									<hr>
							<label>Have you got an idea of the customer budget?</label>
							<div class="pull-right">							
								<input type="checkbox" name="budget_app"  id='budget_app' <?php if ($this->_tpl_vars['send_quote']['budget'] != ''): ?>checked<?php endif; ?> data-toggle="switch">
							</div>
						</div>
						<div class="form-group">							
							<div class="form-inline col-md-6" id="budget_div"  <?php if ($this->_tpl_vars['send_quote']['budget'] == ""): ?>style="display:none"<?php endif; ?>>							
								<input type="text" class="validate[required] form-control" value="<?php echo $this->_tpl_vars['send_quote']['budget']; ?>
" name="budget">							
								<select name="budget_currency" class="selectpicker" id="budget_currency">
									<option value="euros"  <?php if ($this->_tpl_vars['send_quote']['budget_currency'] == 'euros'): ?> selected <?php endif; ?>>&euro;</option>
									<option value="pounds" <?php if ($this->_tpl_vars['send_quote']['budget_currency'] == 'pounds'): ?> selected <?php endif; ?>>&pound;</option>
									<option value="dollars"<?php if ($this->_tpl_vars['send_quote']['budget_currency'] == 'dollars'): ?> selected <?php endif; ?>>&dollar;</option>
								</select>
							</div>
						</div>
<hr>
					</div>	
					</div>

						
					
				</div>
				<!--Session/quote id for multiple sessions to be added with in form-->
				<?php if ($this->_tpl_vars['custom']['quote_id']): ?>
					<input type="hidden" id="session_id" name="session_id" value="<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
">
				<?php else: ?>	
					<input type="hidden" id="session_id" name="session_id" value="<?php echo $this->_tpl_vars['session_id']; ?>
">
				<?php endif; ?>
				<!--end-->
			</form>
				<div class="row">
					<div class="content">
					<div class="col-md-12 form-group text-center">
					<?php if (( $this->_tpl_vars['user_type'] != 'seouser' && $this->_tpl_vars['user_type'] != 'seomanager' && $this->_tpl_vars['user_type'] != 'techuser' && $this->_tpl_vars['user_type'] != 'techmanager' ) && $this->_tpl_vars['sales_review'] != 'signed'): ?>							
							<button type="button" id="send_quote_subimt" class="btn btn-success btn-fill ">Save</button>
						
					<?php endif; ?>
					<?php if ($this->_tpl_vars['custom']['quote_id'] && ( $this->_tpl_vars['sales_review'] != 'signed' )): ?>
						<a href="/quote-new/create-step1?qaction=edit&quote_id=<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
" class="btn btn-default pull-left"><i class="glyphicon glyphicon-chevron-left"></i> Edit step 1</a>
						<?php if ($this->_tpl_vars['missions_exists'] == 'yes'): ?>
						<a href="/quote-new/create-quote-mission-view?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
" class="btn btn-primary  btn-fill btn-wd">View mission</a>	
						<?php elseif ($this->_tpl_vars['sales_review'] != 'signed'): ?>
						<a href="/quote-new/create-quote-mission-popup?quote_id=<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
" class="btn btn-primary btn-fill btn-wd"  data-toggle="modal" data-target="#mission-step">Add  Mission</a>
						<?php endif; ?>

					<?php elseif ($this->_tpl_vars['sales_review'] != 'signed'): ?>
						<a href="/quote-new/create-step1?session_id=<?php echo $this->_tpl_vars['session_id']; ?>
" class="btn btn-default pull-left"><i class="glyphicon glyphicon-chevron-left"></i>Edit step 1</a>

					<?php endif; ?>
					<?php if ($this->_tpl_vars['sales_review'] == 'signed'): ?>
						<a href="/quote-new/sales-final-validation?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
" class="btn btn-fill btn-primary pull-right">Final quote <i class="glyphicon glyphicon-chevron-right"></i></a>
					<?php endif; ?>
					</div>
				</div>
			</div>	
			</div>	
		</div>
	</div>	
	<?php if ($this->_tpl_vars['custom']['quote_id']): ?>
		<div class="col-md-4">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo-new/quote/create-quote-forum-comments.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
	<?php endif; ?>	
</div>
</div>
		
	
	
<?php echo '
<script type="text/javascript">
	function showValidateshare ()
	{
		var quote_id=\''; ?>
<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
<?php echo '\';
		swal(
			{
				title: "Brief saved!",
				text: "",
				type: "success",
				showCancelButton: true,
				confirmButtonText: "Add mission",
				cancelButtonText: "Share",
				closeOnConfirm: true,
				closeOnCancel: false

			},function(isConfirm){
				if (isConfirm){

					$(\'#mission-step\').modal({
						show:true,
						remote:"/quote-new/create-quote-mission-popup?quote_id="+quote_id
					});
						
				}
				else
				{
					$(\'.sweet-alert\').css(\'height\',\'510px\');
					$(\'.sweet-alert\').css(\'width\',\'550px\');
					$(\'.sweet-alert\').css(\'top\',\'40%\');
					
					
					brief=$(\'#manager_html\').find(\'#manager_list\').html();
					brief=\'<div style="margin-right:5px;display:inline-block" id="send-brief-pop"><form id="email-notify-pop"><div class="form-group" id="manager_html"><select name="manager_list[]" data-placeholder="Select Managers" multiple="multiple" class="col-md-6 form-control validate[required]" id="manager_list">\'+brief+\'</select></div></form></div>\';
					
					$(\'.sweet-alert\').find(\'button.cancel\').hide();
					$(\'.sweet-alert\').find(\'button.cancel\').after(brief);
					$(\'.sweet-alert\').find("#manager_list").multiselect({
								includeSelectAllOption: true,
								autoOpen: true,
								nonSelectedText:"Share <span class=\'glyphicon glyphicon-share-alt\'>",
								numberDisplayed: 10,
								buttonWidth:\'300px\',
								maxHeight: 200,
								enableCaseInsensitiveFiltering: true,

							});	

					$(\'.sweet-alert\').find("#manager_list_chzn").addClass(\'btn-danger\');
					if($(\'.sweet-alert\').find(".manager-submit-pop").length==0){
			 				$(\'.sweet-alert\').find(".multiselect-container").append("<li class=\'divide\'>&nbsp;</li><li><div class=\'text-center\'><a class=\'btn btn-success text-center manager-submit-pop\' >Validate</a></div></li><li>&nbsp;</li>");
							}
					$(\'.sweet-alert\').find(\'.btn-group\').addClass(\'open\');
					$(\'.sweet-alert\').find("#manager_list_chzn").on("click",function(){
						
			 		});

			 		$("body").on(\'click\',".manager-submit-pop",function()
			 		{			 			
						$(\'.sweet-alert\').find(\'button.cancel\').hide();
									
						$(\'#send-brief-pop\').hide();

			 			briefcommentEmail(\'yes\');

		 			});

		 			
											
				}
		});	
	}



	function briefcommentEmail(alertpop)
	{
		//if($(\'.sweet-alert\').find("#manager_list").val()!=null || $("#manager_list").val()!=null )
		//{
			/*save notify manager*/
			if(alertpop==\'no\')
				notifyform=$(\'#email-notify\').serialize();
			else
				notifyform=$(\'.sweet-alert\').find("#email-notify-pop").serialize();

			//alert(notifyform); 			
			
			var quote_id=\''; ?>
<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
<?php echo '\';
			if(quote_id)
			{
				
				
				$.ajax({
					url:\'/quote-new/manager-notify?quote_id=\'+quote_id,
					type:\'POST\',
					data:notifyform,
					success:function(html){
						if(alertpop==\'yes\')
						{
							briefpage=html;
						
						
							briefpage=\'<form id="email-notify" class="pull-right"><div class="form-group" id="manager_html"><select name="manager_list[]" data-placeholder="Select Managers" multiple="multiple" class="col-md-6 form-control validate[required]" id="manager_list">\'+briefpage+\'</select></div></form>\';		
							$(\'#send-brief\').replaceWith(briefpage);
							$("#manager_list").multiselect({
								includeSelectAllOption: true,
								nonSelectedText:"Share <span class=\'glyphicon glyphicon-share-alt\'>",
								numberDisplayed: 10,
								buttonWidth:\'300px\',
								maxHeight: 200,
								enableCaseInsensitiveFiltering: true,
								onChange:function(element, checked) {
						        var brands = $(\'#manager_list option:selected\');
						        var selected = [];
						        $(brands).each(function(index, brand){
						            selected.push([$(this).val()]);
						        });
						    	}
							});	
							$("#manager_list_chzn").addClass(\'btn-success\');
						
							$("#manager_list_chzn").on("click",function(){
								if($(\'#email-notify\').find(".manager-submit").length==0){
				 				$(\'#email-notify\').find(".multiselect-container").append("<li class=\'divide\'>&nbsp;</li><li><div class=\'text-center\'><a  class=\'btn btn-success text-center manager-submit\' >Validate</a></div></li><li>&nbsp;</li>");
								}
				 			});
				 		}
				 		
				 		if($(\'.sweet-alert\').find("#manager_list").val()!=null || $("#manager_list").val()!=null)
				 		{
							setTimeout(function(){
								$("#quote_forum").show();
							});						
							$(\'.sweet-alert\').find("#send-brief").remove();						
							
							swal(
									{
										title: "Let a comment",
										text: "",
										type: "success",
										html: "<div><textarea class=\'form-control\' placeholder=\'Your question or comments\' name=\'briefcomment\' id=\'briefcomment\'></textarea></div>",
										confirmButtonText: "Submit",
										showCancelButton: false,
										showConfirmButton:true
									},function(isConfirm){
										if (isConfirm){
											if($(\'#briefcomment\').val()!=null)
													briefEmailsubmit($(\'#briefcomment\').val(),quote_id);
										}								
									}
								);
						}
						else
						{
							
						if($(\'.phenom\').length==0)
								$("#quote_forum").hide();
						}
					}

				});
				
				
			}
					
		/*}
		else
		{
			swal("","Please select a user to notify","error");
		}*/
	}
	function briefEmailsubmit(comment,quote_id)
	{
		
			user_id=\''; ?>
<?php if ($this->_tpl_vars['userId']): ?><?php echo $this->_tpl_vars['userId']; ?>
<?php endif; ?><?php echo '\';
			quote_id=quote_id;
			if(comment!=\'\')
			{
				$.post("/quote-new/save-quote-comments?brief=shared&user_id="+user_id+"&quote_id="+quote_id+"&quotes_forum_comments="+comment,\'\',				
				function(data) {
					//alert(data);
					var obj = $.parseJSON(data);
					$("#comments_list").html(obj.comments);
					$("#comment_count").text(obj.count);
					$("#comment_count_1").html(\'<i class="icon-comment"></i> \'+obj.count);
					$("#quotes_forum_comments").val(\'\'); 
					swal(
						{
							title: "Brief shared",
							html: "<a href=\\"/quote-new/sales-quotes-list\\" target=\\"_list\\">see all quotes</a>",
							type: "success",
							showCancelButton: true,
							confirmButtonText: "Add mission",
							cancelButtonText: "Back to brief",
							closeOnConfirm: true,
							closeOnCancel: true
						},function(isConfirm){
							if (isConfirm){

								$(\'#mission-step\').modal({
									show:true,
									remote:"/quote-new/create-quote-mission-popup?quote_id="+quote_id
								});
									
							}								
						}	

					);	
					
				}
			);
			}
			else
			{
				swal("","Please Enter the comment","error");
			}
	}

	$(document).ready(function()
	{

		tinymce.init({
				selector: ".mceEditor",
				invalid_elements : \'h1,h2,h3\',
				setup : function(ed)
				{
					ed.on(\'init\', function() 
					{
						this.getDoc().body.style.fontSize = \'14px\';
						this.getDoc().body.style.fontFamily = \'arial\';
						'; ?>
<?php if ($this->_tpl_vars['custom']['quote_id']): ?> <?php echo '
						this.hide();
						'; ?>

						<?php endif; ?>
						<?php echo '
					});
				},
				theme: "modern",
				statusbar:false,
				menubar: false,
				plugins: [
					 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					 "save table contextmenu directionality emoticons template paste textcolor"
			   ],
			   //content_css: "css/content.css",
			   toolbar: " bullist | link", 
			  
			});
		//var sharebrief="'; ?>
<?php if ($_GET['brief'] && count ( $this->_tpl_vars['brief_mail'] ) == 0): ?><?php echo $_GET['brief']; ?>
<?php else: ?>''<?php endif; ?><?php echo '";
		var sharebrief="'; ?>
<?php if ($_GET['brief']): ?><?php echo $_GET['brief']; ?>
<?php else: ?>''<?php endif; ?><?php echo '";
		//alert(sharebrief);
		if(sharebrief=="share") 
			showValidateshare();		
		
		<!-- Bootstrap Select Picker -->
		var prefix = "brief_";
		$(".selectpicker").selectpicker();
		$(\'select\').each(function() {
			$(this).next(\'div.select\').attr("id", prefix + this.id).removeClass("validate[required]");
		});	
		
		'; ?>

		<?php if ($this->_tpl_vars['custom']['quote_id']): ?> <?php echo '
		
			$("#manager_list").multiselect({
								includeSelectAllOption: true,
								nonSelectedText:"<i class=\'material-icons\' style=\'font-size:48px\'>share</i>",
								numberDisplayed: 10,
								buttonWidth:\'auto\',
								maxHeight: 200,
								enableCaseInsensitiveFiltering: true
							});		
			
			//$("#manager_list_chzn").addClass(\'btn-success\');
			 $("#manager_list_chzn").on("click",function(){
				if($(".manager-submit").length==0){
					$(".multiselect-container").append("<li class=\'divide\'>&nbsp;</li><li><div class=\'text-center\'><a class=\'btn btn-success btn-fill text-center manager-submit\'>Validate</a></div</li><li>&nbsp;</li>");
				}
			 });

			'; ?>

				<?php endif; ?>
			<?php echo '

		$("body").on(\'click\',".manager-submit",function(){
			briefcommentEmail(\'no\');
			//briefEmailsubmit();
			
		});

		$("#send-quote").validationEngine({promptPosition: "topLeft",prettySelect : true,autoHidePrompt: true,usePrefix: prefix});

		$(\'input .icheck-set\').checkbox();


				$(\'#content_ordered\').change(function(){	
					$input = $(this); 				
					if($input.is(\':checked\'))
					{
						$("#agency_details").show();
						$("#content_ordered_agency").val(\'yes\');
						$("#internal_team_details").hide();
							$("#agency_name_div").show();	
					}
					else 
					{
						$("#content_ordered_agency").val(\'no\');
						$("#agency_details").hide();
						$("#internal_team_details").show();
							$("#agency_name_div").hide();	
					}
					
				});		

				$(\'#client_app\').change(function(){	
					$input = $(this); 				
					if($input.is(\':checked\'))
					{
						$("#appointment_client").show();	
					}
					else 
					{
						$("#appointment_client").hide();	
					}
				
				});	

				$(\'#budget_app\').change(function(){
					$input = $(this); 				
					if($input.is(\':checked\'))
					{
						$("#budget_div").show();	
					}
					else
					{
						$("#budget_div").hide();	
					}
				
				});		


				$(\'#budget_marketing\').on(\'ifClicked\', function(event){		
					$("#budget_div").toggle();				
				});			

		
	
				$(\'input[name="client_aims[]"]\').on(\'change\', function(event){
					
						var value = "";
						var check_length=$(\'input[name="client_aims[]"]:checked\').length;
						//alert(check_length)
						var checkd_value=$(this).val();
						$("#div_priority_"+checkd_value).toggle();
						if(check_length==0)
						{				
							$(\'#aim_4\').checkbox(\'enable\');
							$(\'#client_aims_comments_div\').hide();
						}
						else{
							$(\'#client_aims_comments_div\').show();
						}
						
						
						$(\'input[name="client_aims[]"]:checked\').each(function(){
							value = $(this).val();				
							if(value!=\'autre\')
							{
								$(\'#aim_4\').checkbox(\'uncheck\');
								$(\'#aim_4\').checkbox(\'disable\');
							}
							
						});
				});	


	$("body").on(\'click\',"#send_quote_subimt",function(){
		// Get the HTML contents of the currently active editor
		tinyMCE.activeEditor.getContent({format : \'raw\'});
		var client_email=tinyMCE.get(\'client_email\').getContent();
		var client_overview=tinyMCE.get(\'client_overview\').getContent();
		$(\'#client_email\').text(client_email);
		$(\'#client_overview\').text(client_overview);
		var quote_send_team=$(\'input[name="quote_send_team"]:checked\').val();
		if($("#send-quote").validationEngine(\'validate\'))
		{	
			$("#send-quote").submit();					
		}			
	});
	
	/*client over view toggle*/
	$("body").on(\'click\',".client_overview_modify",function(){	

		$(\'#brief_client_overview\').css(\'display\',\'block\');	
		$(".client_modify").addClass("hidden");
	});		
	/*client brief toggle*/
	$("body").on(\'click\',".client_brief_modify",function(){	

		$(\'#brief_client_email\').css(\'display\',\'block\');
		$(".brief_modify").addClass("hidden");
	});		



		$("#comment_submit").click(function(){
				var $b = $(\'input[name=user_val]\');
			var countselected = $b.filter(\':checked\').length;
			var selected = \'\';
			if(countselected >= 1)
			{				
				$(\'input[name=user_val]:checked\').each(function() {
					if(selected)
						selected =   selected + \'|\' + ($(this).val());
					else			
						selected =   $(this).val();
				});
			}	
						
			$.post("/quote-new/save-quote-comments", $("#comment_form").serialize(),
				function(data) {
					
					var obj = $.parseJSON(data);
					$("#comments_list").html(obj.comments);
					$("#comment_count").text(obj.count);
					$("#comment_count_1").html(\'<i class="icon-comment"></i> \'+obj.count);
					$("#quotes_forum_comments").val(\'\'); 
					
				}
			);
		});	


		$(document).on("click",".delete",function(e){
				e.preventDefault();
				var id_identifier = $(this).attr("rel");
				msg="Are you sure? Want to delete this File";
				smoke.confirm(msg,function(e)
				{
					if(e){
					$(\'#document_value\').html("Please Wait Deleting File.");
					$.post("/quote-new/delete-document",{"identifier":id_identifier},function(result){
						$(\'#document_value\').html(result);
					}); 
					}
					
				},{"ok":"Oui","cancel":"Non"});	
	});
	/*drag and Drop initialization*/
	var quote_id=\''; ?>
<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
<?php echo '\';
	$("#filer_input2").filer({
        limit: null,
        maxSize: null,
        extensions:["doc","xls","zip","docx","xlsx","rar","pdf","dot","jpg","png","xml","pptx"],
        changeInput: \'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3></div></div></div>\',
        showThumbs: true,
        theme: "dragdropbox",
        templates: {
            box: \'<ul class="jFiler-items-list jFiler-items-grid"></ul>\',
            item: \'<li class="jFiler-item">\\
                        <div class="jFiler-item-container">\\
                            <div class="jFiler-item-inner">\\
                                <div class="jFiler-item-thumb">\\
                                    <div class="jFiler-item-status"></div>\\
                                    <div class="jFiler-item-info">\\
                                        <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\\
                                        <span class="jFiler-item-others">{{fi-size2}}</span>\\
                                    </div>\\
                                    {{fi-image}}\\
                                </div>\\
                                <div class="jFiler-item-assets jFiler-row">\\
                                    <ul class="list-inline pull-left">\\
                                        <li>{{fi-progressBar}}</li>\\
                                    </ul>\\
                                    <ul class="list-inline pull-right">\\
                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\\
                                    </ul>\\
                                </div>\\
                            </div>\\
                        </div>\\
                    </li>\',
            itemAppend: \'<li class="jFiler-item">\\
                            <div class="jFiler-item-container">\\
                                <div class="jFiler-item-inner">\\
                                    <div class="jFiler-item-thumb">\\
                                        <div class="jFiler-item-status"></div>\\
                                        <div class="jFiler-item-info">\\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\\
                                            <span class="jFiler-item-others">{{fi-size2}}</span>\\
                                        </div>\\
                                        {{fi-image}}\\
                                    </div>\\
                                    <div class="jFiler-item-assets jFiler-row">\\
                                        <ul class="list-inline pull-left">\\
                                            <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\\
                                        </ul>\\
                                        <ul class="list-inline pull-right">\\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\\
                                        </ul>\\
                                    </div>\\
                                </div>\\
                            </div>\\
                        </li>\',
            progressBar: \'<div class="bar"></div>\',
            itemAppendToEnd: false,
            removeConfirmation: true,
            _selectors: {
                list: \'.jFiler-items-list\',
                item: \'.jFiler-item\',
                progressBar: \'.bar\',
                remove: \'.jFiler-item-trash-action\'
            }
        },
        dragDrop: {
            dragEnter: null,
            dragLeave: null,
            drop: null,
        },
		addMore: true,		
        files: null,       
        clipBoardPaste: true,
        excludeName: null,
        beforeRender: null,
        afterRender: null,
        beforeShow: null,
        beforeSelect: null,
        onSelect: null,
        afterShow: null,
        onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){
            //alert(id+\'_\'+quote_id);
			var id_identifier = id+\'_\'+quote_id;
			$.post("/quote-new/delete-document",{"identifier":id_identifier});
            //$.post(\'./php/remove_file.php\', {file: file});
        },
        onEmpty: null,
        options: null,
        captions: {
            button: "Choose Files",
            feedback: "Choose files To Upload",
            feedback2: "files were chosen",
            drop: "Drop file here to Upload",
            removeConfirmation: "Are you sure you want to remove this file?",
            errors: {
                filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
                filesType: "Only doc, xls, zip, docx, xlsx, dot, pdf, png, jpg, xml, rar , pptx are allowed to be uploaded.",
                filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
                filesSizeAll: "Files you\'ve choosed are too large! Please upload files up to {{fi-maxSize}} MB."
            }
        }
    });   
	$(window).load(function() { 
		$(\'textarea\').each(function() {
			//alert($(this).prev().attr("class"));
			$(this).prev(\'div.mce-tinymce\').attr("id", prefix + this.id).removeClass("validate[required]");
		});
	});

});
</script>
'; ?>

<div class="row form-bottom">
		<div class="col-md-12 text-center">
			<div class="modal fade" id="mission-step" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content mission-step">
					
					</div>
				</div>
			</div>
		</div>
</div>