<?php /* Smarty version 2.6.19, created on 2016-03-14 15:26:30
         compiled from gebo/quote/create-client.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/create-client.phtml', 402, false),array('modifier', 'replace', 'gebo/quote/create-client.phtml', 688, false),array('function', 'html_options', 'gebo/quote/create-client.phtml', 489, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/jQuery.fileinput.js"></script>
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/BO/theme/lbd/js/ulSelect.js"></script>
'; ?>

 <script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/jquery.eComboBoxClient.js"></script> 
<?php echo '
<style type="text/css">
.mod .error
{
	display:none !important;		
}
.error {
    color: #C62626;    
    font-size: 11px;
    font-weight: 700;
}
.mod {
    background: none repeat scroll 0 0 #FFFFFF;
    border-color: #E4E4E4 #E4E4E4 #BBBBBB;
    border-image: none;
    border-radius: 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.086);
    margin-bottom: 15px;
    overflow: hidden;
    padding: 12px;
}
.contacterror
{
	border:1px solid red !important;
}
.addmore-button button
{
	   margin-left: 10px;
    margin-top: 3px;
}
#company_name
{
	text-transform: uppercase !important; 
}
</style>
'; ?>

<?php echo '
<script>
var cexists ='; ?>
"<?php echo $this->_tpl_vars['contractexists']; ?>
"<?php echo ';
var c_codeexists ='; ?>
"<?php echo $this->_tpl_vars['ca_number']; ?>
"<?php echo ';
function checkclientcode(field, rules, i, options)
{
	var character = "C";
	//var re = /^[c|C]\\d{3}$/g; 
	var re = /(^[c|C]\\d{3}$)|(^[c|C]\\d{3}_new?$)|([p|P]\\d{3}$)/gi; 
	var scharacter = "or CXXX_new or PXXX ";
	var str = $.trim(field.val());
	var m;
	if ((m = re.exec(str)) === null) {
		return "Code should be in format "+character+"XXX "+scharacter+" where XXX are numbers";
	} 
	//return "Number should be in format PXXX or CXXX";
}
</script>
<script language="javascript">

$(document).ready(function() {
	
    $("#create").validationEngine({prettySelect : true,useSuffix: "_chzn"}); 
	
	
	//Automatic suggestion of super client agency name
	$( "#email" ).on(\'input\',function(e){
		var email=$(this).val();
		var agency=email.split("@");		
		$("#company_name").val(agency[0]);
	});	
	
	$(".uni_style").uniform();
		
	$(".sex").chosen({ allow_single_deselect: false,search_contains: true});
	$("#payment_type").chosen({ allow_single_deselect: false,search_contains: true});	
	$("#country").chosen({ allow_single_deselect: false,search_contains: true});
	
	
	//Add More client Contacts
	var contact=1;
	
	 $("[id^=job_position_]").eComboBox(); 
	
	$("[id^=contact_close_]").live(\'click\', function() {
			var DivId = $(this).attr(\'id\');
			var parentDiv=$(this).parents("div:first").attr(\'id\');
			var client_identifier=$(this).attr(\'rel\');
			var closeDiv=$("#"+parentDiv).children(".close").attr(\'id\');
			if(!client_identifier)
				$("#"+parentDiv).remove();
			else
			{	
				smoke.confirm("Do you really want to delete this contact ?",function(e){
					if (e)
					{
						if($("[id^=client_contact_]").size()>1)
						{
							$("#"+parentDiv).html(\'<center><img alt="" src="/BO/theme/gebo/img/ajax_loader.gif"> Deleting Contact... </center>\');
							ajaxProfileUpdate(\'sccontact\',client_identifier,parentDiv,\'\');
						}	
						else
						{
							$("#"+parentDiv).html(\'<center><img alt="" src="/BO/theme/gebo/img/ajax_loader.gif"> Deleting Contact... </center>\');
							ajaxProfileUpdate(\'sccontact\',client_identifier,parentDiv,\'final\');	
							
						}
					}
					else
					{
						return false;
					}
				});				
			}	
				
		});	
	contact = 1;
	$("[id^=client_contact_]" ).each(function(z) {
			contact =++z;
	});
	$("#addmore_cc_link").click(function(){
			
		var cloned =$("#addmore_cc_link");	
                
		$("#client_contact_0").clone().attr(\'id\', \'client_contact_\'+(contact) ).insertBefore( cloned );	
		$("#client_contact_"+contact).show();
		$(\'#client_contact_\'+contact+\' input[name="sex[]"]\').attr(\'id\',\'sex_\'+contact);	
		$(\'#client_contact_\'+contact+\' input[name="first_name[]"]\').attr(\'id\',\'first_name_\'+contact);
		$(\'#client_contact_\'+contact+\' input[name="cemail[]"]\').attr(\'id\',\'cemail_\'+contact);
		$(\'#client_contact_\'+contact+\' input[name="cemail[]"]\').addClass(\'cemail_\'+contact);
		$(\'#client_contact_\'+contact+\' input[name="office_phone[]"]\').attr(\'id\',\'office_phone_\'+contact);
		$(\'#client_contact_\'+contact+\' input[name="mobile_phone[]"]\').attr(\'id\',\'mobile_phone_\'+contact);
		$(\'#client_contact_\'+contact+\' #job_position_0\').attr(\'id\',\'job_position_\'+contact);
		$(\'#client_contact_\'+contact+\' #linkedin_url_0\').attr(\'id\',\'linkedin_url_\'+contact);
                
//               $.ajax({
//                    url: "/quote-test/get-jobs-positions/",
//                    data:{"index":contact},
//                    async: false,
//                    contentType: "text/html; charset=utf-8",
//                    scriptCharset:"utf-8",
//                    success:function(data)
//                    {
//                        $(".jobrepalce").html(data);
//                    }
//                  })
                
		 $(\'#job_position_\'+contact+\' option:contains({NEW ELEMENT})\').remove(); 
		$(\'#job_position_\'+contact).eComboBox(); 
		

		//$(\'#client_contact_\'+contact+\' input[name="main_contact_1"]\').attr(\'name\',\'main_contact_\'+contact);
		$(\'#client_contact_\'+contact+\' input[name="main_contact"]\').attr(\'value\',contact);
		//$(\'#client_contact_\'+contact+\' input[name="main_contact"]\').prop(\'checked\', false);

		$("#client_contact_"+contact+" #sex_0").attr(\'id\', \'sex_\'+contact);
		
		$(\'#client_contact_\'+contact+\' .close\').attr(\'id\',\'contact_close_\'+contact);
		$(\'#client_contact_\'+contact+\' .close\').show();
		$(\'#client_contact_\'+contact+\' .close\').attr(\'rel\',\'\');
		
		 $("#sex_"+contact).removeClass("sex chzn-done" ).addClass( "sex" );		 
		 $("#client_contact_"+contact+ " .chzn-container").remove(); 
		
		
		$(".sex").chosen({ allow_single_deselect: false,search_contains: true});
		
		$(".uni_style").uniform();
		
		clearChildren(document.getElementById(\'client_contact_\'+contact));
		contact++;
	});	
	
	//Add more URL\'s
	
	var url_cnt = "";
	
		$("[id^=urls_]" ).each(function(u) {
			url_cnt=++u;
		});
	
	
	$("#addmore_url_link").click(function(){
	
	
		var cloned =$("#addmore_url_link");	
		$("#urls_1").clone().attr(\'id\', \'urls_\'+(++url_cnt) ).insertBefore( cloned );	
		$(\'#urls_\'+url_cnt+\' input[name="urls[]"]\').attr(\'id\',\'url_\'+url_cnt);	
		$(\'#urls_\'+url_cnt+\' input[name="urlnames[]"]\').attr(\'id\',\'url_name_\'+url_cnt);	
		
		$(\'#urls_\'+url_cnt+\' #url_label_1\').attr(\'id\',\'url_label_\'+url_cnt);
		$(\'#urls_\'+url_cnt+\' #url_name_label_1\').attr(\'id\',\'url_name_label_\'+url_cnt);
		$(\'#url_label_\'+url_cnt).html(\'URL \'+url_cnt);	
		$(\'#url_name_label_\'+url_cnt).html(\'Site name \'+url_cnt);	
		
		$(\'#urls_\'+url_cnt+\' .close\').attr(\'id\',\'url_close_\'+url_cnt);
		$(\'#urls_\'+url_cnt+\' .close\').show();
		$(\'#urls_\'+url_cnt+\' .close\').attr(\'rel\',\'\');		
		
		clearChildren(document.getElementById(\'urls_\'+url_cnt));
		$(\'#url_\'+url_cnt).val(\'http://\');
		urlIncDec();
	});
	
	function urlIncDec()
	{
		var mid =1;
		$("[id^=url_label_]").each(function(){
			$(this).text(\'URL \'+mid++);
		})
		mid = 1;
		$("[id^=url_name_label_]").each(function(){
			$(this).text(\'Site name \'+mid++);
		})
	}
	
	$("[id^=url_close_]").live(\'click\', function() {
			var DivId = $(this).attr(\'id\');
			var parentDiv=$(this).parents("div:first").attr(\'id\');
			var client_identifier=$(this).attr(\'rel\');
			var closeDiv=$("#"+parentDiv).children(".close").attr(\'id\');
			
			if($("[id^=urls_]").size()>1)
			{
				$("#"+parentDiv).remove();
			}
			urlIncDec();	
	});			
	
	/* $("#siret_applicable").click(function(){
		if($("#siret_applicable:checked").length)
			$("#siret").removeClass(\'validate[required]\');
		else
			$("#siret").addClass(\'validate[required]\');
		
	}) */
	
	//To add new contact position
	$(document).on(\'click\',\'.addnew\',function(){
		var current_add = $(this);
		$(this).closest(".span6").find("select option").each(function() {
		if($(this).text() == "{NEW ELEMENT}") {
			$(this).attr(\'selected\', \'selected\'); 
			$(this).trigger(\'change\');
			current_add.hide();
		  }                        
		});
	})
	
	//To show add button on save of contact position
	$(document).on(\'click\',\'.savenew\',function(){
		$(this).closest(".span6").find(\'.addnew\').show();
	})
	
	// On change of element
	$(document).on(\'change\',\'[id^=job_position_]\',function(){
		if($(\'option:selected\', $(this)).text()=="{NEW ELEMENT}")
		$(this).closest(".span6").find(\'.addnew\').hide();
	})
	/*twitter search API*/	
	var selected_screen=\''; ?>
<?php echo $this->_tpl_vars['client_info']['twitter_screen_name']; ?>
<?php echo '\';
	$("#twitter-search").click(function(){
		var q=$("#twitter_screen_search").val();
		var apiURL=\'/BO/twitterOAuth/search.php?search=\'+q+\'&selected_screen=\'+selected_screen;
		if(q)
		{
			$.get(apiURL,function(data){			
				$("#twitter-screens-list").html(data);
				//$(\'#listeContact\').ulSelect();
			});
		}	
	});
	if(selected_screen)
	{
		$("#twitter-search").click();
	}
	/*changing Twitter image on select*/
	$("body").on(\'change\',\'#twitter-users\',function(){		
		var image_src = $(\'option:selected\', this).attr(\'data-img-src\');
		//alert(image_src);
		var screenName=$(this).val();
		$("#twitter_screen_search").val(screenName);		
		$(".fileupload-preview").html(\'\');
		$(".fileupload-preview").html(\'<img class="img-polaroid" id="clientlogo" src="\'+image_src+\'">\');		
		$("#twitter_screen_image").val(image_src);
		$("#upload_image").removeClass(\'validate[required,funcCall[checktype]]\');
	});
});
/** ajax function to delete super client contact data**/
function ajaxProfileUpdate(type,identifier,divid,last)
{
        var target_page = "/quote/delete-client-contact?identifier="+identifier;
//alert(target_page)		;
		$.post(target_page, function(data){					
				//alert(data);
				sleep(4000);
				$("#"+divid).remove();
				if(last==\'final\')
					location.reload();
			});
}
function sleep(ms)
{
	var dt = new Date();
	dt.setTime(dt.getTime() + ms);
	while (new Date().getTime() < dt.getTime());
}

 function checktype(field, rules, i, options)
 {
    var ext =field.val().split(\'.\').pop().toLowerCase();
    if(field.val()!="")
    {
    if($.inArray(ext, [\'gif\',\'png\',\'jpg\',\'jpeg\']) == -1) {
        alert("."+ext+" extension not allowed");
      return "."+ext+" extension not allowed";
    }
    }
	else
	$(".fileupload-preview").css(\'border\',\'1px solid red\');
 }
 
 function ClientContactValidate(field, rules, i, options)
 {
	var submit = 0;
	var submit1 = 0;
	//alert($("[id^=cemail_]").length)
	
	if(field.val()!="")
    {
		$("[id^=cemail_]").each(function(){
			if($(this).attr("id")!=\'cemail_0\' && field.attr("id") != $(this).attr("id"))
			{
				//alert(field.val() +" "+$(this).val() )
				if(field.val() == $.trim($(this).val()))
				{
				submit1 = 1;
				return \'Duplicate Contacts\';
				}
			}
		})
		var edit = 0;
		var cemail = field.val();
		var prev_email = field.attr("rel");
		if(field.hasClass(\'edit\'))
		edit = 1;
		 $.ajax({
              url: "/quote/client-contact-validate",
              data: {"edit":edit,\'cemail\':cemail,\'pemail\':prev_email},
              type: "POST",
              async: false,
              success: function(data) {
				if($.trim(data))
					submit = 1;
              }
        });
	}
	if(submit1)
	return \'Duplicate Contacts\';
	if(submit)
	return \'Contact already exists\';
 }
</script>	
'; ?>
	
<div class="row-fluid">    
	<div class="span8 offset2">
		<h1 class="heading">Create new client</h1>
		<form class="form_validation_reg" action="/quote/save-client" id="create" method="post" enctype="multipart/form-data">
		<input type="hidden" name="client_id" value="<?php echo $this->_tpl_vars['client_info']['client_id']; ?>
">
		<input type="hidden" name="from" value="<?php echo $_GET['from']; ?>
">
		<div class="mod" id="clientinfo">	
		<?php if ($this->_tpl_vars['client_info']['client_id']): ?>
			<div class="formSep">
				<div class="row-fluid">
					<label class="span2 moveright">Email client <span class="f_req">*</span></label>
						<label class="span6"><b><?php echo $this->_tpl_vars['client_info']['email']; ?>
</b></label>
						<input type="hidden" name="edit_client" id="edit_client" value="<?php echo $this->_tpl_vars['client_info']['company_name']; ?>
">
				</div>
			</div>
		<?php endif; ?>
			<div class="formSep">
				<div class="row-fluid">
					<label class="span2 moveright"> Company name <span class="f_req">*</span></label>
					<div class="span6"><input type="text" name="company_name" id="company_name" value="<?php echo $this->_tpl_vars['client_info']['company_name']; ?>
" class="validate[required,ajax[ajaxClientValidate]]"/></div>										
				</div>
			</div>		
		</div>	
			
			<div class="row-fluid">
				<div class="span8 form-inline">
					<label class="span4"> <br><b>URLs sites</b> </label>
				</div>
			</div>
			<div class="mod" id="web_urls">
				<?php if (count($this->_tpl_vars['client_info']['web_urls']) > 0): ?>
					<?php $_from = $this->_tpl_vars['client_info']['web_urls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['url'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['url']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['urlkey'] => $this->_tpl_vars['url']):
        $this->_foreach['url']['iteration']++;
?>
					<?php $this->assign('gn_index', ($this->_foreach['url']['iteration']-1)); ?>
					<?php $this->assign('url_index', ($this->_foreach['url']['iteration']-1)+1); ?>
						<div class="row-fluid" id="urls_<?php echo $this->_tpl_vars['url_index']; ?>
">
							<label class="span2 moveright" id="url_label_<?php echo $this->_tpl_vars['url_index']; ?>
"> URL <?php echo $this->_tpl_vars['url_index']; ?>
 </label>
							<div class="span3">
								<input type="text" placeholder="http://www.edit-place.fr" name="urls[]" id="url_<?php echo $this->_tpl_vars['url_index']; ?>
" class="validate[required,custom[url]]" value="<?php echo $this->_tpl_vars['url']; ?>
"/>
							</div>
							<label class="span2 moveright" id="url_name_label_<?php echo $this->_tpl_vars['url_index']; ?>
"> Site name <?php echo $this->_tpl_vars['url_index']; ?>
 </label>
							<div class="span4"><input placeholder="Site name" type="text" name="urlnames[]" id="url_name_<?php echo $this->_tpl_vars['url_index']; ?>
" class="validate[required]" value="<?php echo $this->_tpl_vars['client_info']['website_names'][$this->_tpl_vars['urlkey']]; ?>
" /></div>
							<button class="close alignleft" type="button" id="url_close_<?php echo $this->_tpl_vars['url_index']; ?>
" rel="<?php echo $this->_tpl_vars['url_index']; ?>
" <?php if (count($this->_tpl_vars['client_info']['web_urls']) < 1): ?> style="display:none"<?php endif; ?>>&times;</button>
						</div>
					<?php endforeach; endif; unset($_from); ?>				
				<?php else: ?>
					<div class="row-fluid" id="urls_1">
						<label class="span2 moveright" id="url_label_1"> URL 1 </label>
						<div class="span3"><input placeholder="http://www.edit-place.fr" value="http://" type="text" name="urls[]" id="url_1" class="validate[required,custom[url]]"/></div>
						<label class="span2 moveright" id="url_name_label_1"> Site name 1 </label>
						<div class="span4"><input placeholder="Site name" type="text" name="urlnames[]" id="url_name_1" class="validate[required]"/></div>
						<button class="close alignleft" type="button" id="url_close_1" rel="" style="display:none">&times;</button>
					</div>
				<?php endif; ?>	
				
				<div class="row-fluid">	
					<span class="addmore-button" id=""><a class="btn" id="addmore_url_link">Add</a></span> 
				</div>
			</div>
			<div class="row-fluid">
				<div class="span8 form-inline">
					<label class="span4"> <br><b>Contact List</b> </label>
				</div>
			</div>
			
			<div id="client_contacts">
			<?php if (count($this->_tpl_vars['client_info']['contacts']) > 0): ?>
				<?php $_from = $this->_tpl_vars['client_info']['contacts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contacts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contacts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contact']):
        $this->_foreach['contacts']['iteration']++;
?>
				<?php $this->assign('gn_index', ($this->_foreach['contacts']['iteration']-1)); ?>
				<?php $this->assign('sc_index', ($this->_foreach['contacts']['iteration']-1)+1); ?>
				<div class="mod" id="client_contact_<?php echo $this->_tpl_vars['sc_index']; ?>
">		
					<button  class="close" type="button" id="contact_close_<?php echo $this->_tpl_vars['sc_index']; ?>
" rel="<?php echo $this->_tpl_vars['contact']['identifier']; ?>
"  <?php if (count($this->_tpl_vars['client_info']['contacts']) < 1): ?> style="display:none"<?php endif; ?>>&times;</button>
					<input type="hidden" name="contact_id[]" value="<?php echo $this->_tpl_vars['contact']['identifier']; ?>
">
					<div class="formSep">
						<div class="row-fluid">							
							<label class="span2 moveright">Gender <span class="f_req">*</span> </label>
							<div class="span4">
								<select name="sex[]" id="sex_<?php echo $this->_tpl_vars['sc_index']; ?>
" class="sex">
									<option value="male" <?php if ($this->_tpl_vars['contact']['gender'] == 'male'): ?> selected<?php endif; ?>>Male</option>
									<option value="female" <?php if ($this->_tpl_vars['contact']['gender'] == 'female'): ?> selected<?php endif; ?>>Female</option>
								</select>	
							</div>										
						</div>
					</div>	
					<div class="formSep">
						<div class="row-fluid">							
							<label class="span2 moveright">Name <span class="f_req">*</span> </label>
							<div class="span6">
								<input placeholder="ex: Arun kumar" name="first_name[]" id="first_name_<?php echo $this->_tpl_vars['sc_index']; ?>
" class="validate[required] span12" type="text" value="<?php echo $this->_tpl_vars['contact']['first_name']; ?>
">
							</div>							
						</div>	
					</div>
					<div class="formSep">
						<div class="row-fluid">						
							<label class="span2 moveright">Phone number</label>
							<div class="span3">
								<input name="office_phone[]" placeholder="# office" id="office_phone_<?php echo $this->_tpl_vars['sc_index']; ?>
" class="span12" type="text" value="<?php echo $this->_tpl_vars['contact']['office_phone']; ?>
">
							</div>	
							<div class="span3">	
								<input name="mobile_phone[]" placeholder="# mobile" id="mobile_phone_<?php echo $this->_tpl_vars['sc_index']; ?>
" class="span12" type="text" value="<?php echo $this->_tpl_vars['contact']['mobile_phone']; ?>
">
							</div>							
						</div>
					</div>
					<div class="formSep">
						<div class="row-fluid">								
							<label class="span2 moveright">Email <span class="f_req">*</span> </label>
							<div class="span6">
								<input name="cemail[]" id="cemail_<?php echo $this->_tpl_vars['sc_index']; ?>
" class="validate[required,custom[email]] span12 edit cemail_<?php echo $this->_tpl_vars['sc_index']; ?>
" rel="<?php echo $this->_tpl_vars['contact']['email']; ?>
" type="text" value="<?php echo $this->_tpl_vars['contact']['email']; ?>
">
							</div>
						</div>
					</div>
					<div class="formSep">
						<div class="row-fluid">								
							<label class="span2 moveright">Role in company <span class="f_req">*</span> </label>
							<div class="span6">
								<!--<input name="job_position[]" id="job_position_<?php echo $this->_tpl_vars['sc_index']; ?>
" class="validate[required] span12" type="text" value="<?php echo $this->_tpl_vars['contact']['job_position']; ?>
">-->								
								<select name="job_position[]" id="job_position_<?php echo $this->_tpl_vars['sc_index']; ?>
" tabindex="-1" class="validate[required] span12" placeholder="Select Position">
									<option>Select Position</option>
									<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['contact_jobs'],'selected' => $this->_tpl_vars['contact']['job_position']), $this);?>

								</select>
								<button type="button" class="addnew pull-right btn-info btn btn-small" tabindex="-1">Add</button>
							</div>
						</div>
					</div>	
					<div class="formSep">
						<div class="row-fluid">								
							<label class="span2 moveright">Linkedin URL</label>
							<div class="span6">
								<input name="linkedin_url[]" id="linkedin_url_<?php echo $this->_tpl_vars['sc_index']; ?>
" class="span12 validate[custom[url]]" type="text"  value="<?php echo $this->_tpl_vars['contact']['linkedin_url']; ?>
">
							</div>
						</div>
					</div>					
					<div class="formSep">
						<div class="row-fluid">								
							<label class="span2 moveright"></label>
							<div class="span6">
								<label class="uni-radio">
									<div class="uni-radio">
										<span><input type="radio" value="<?php echo $this->_tpl_vars['sc_index']; ?>
" class="uni_style validate[required]" name="main_contact" style="opacity: 0;" <?php if ($this->_tpl_vars['contact']['main_contact'] == 'yes'): ?> checked<?php endif; ?>></span>
									</div>Select as main contact
								</label>								
							</div>
						</div>
					</div>
				</div>	
				<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
				<div class="mod" id="client_contact_1">		
					<button class="close" type="button" id="contact_close_1" rel="" style="display:none">&times;</button>
					<div class="formSep">
						<div class="row-fluid">							
							<label class="span2 moveright">Gender <span class="f_req">*</span> </label>
							<div class="span4">
								<select name="sex[]" id="sex_1" class="sex">
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>	
							</div>										
						</div>
					</div>	
					<div class="formSep">
						<div class="row-fluid">							
							<label class="span2 moveright">Name <span class="f_req">*</span> </label>
							<div class="span6"><input placeholder="ex: Arun kumar" name="first_name[]" id="first_name_1" class="validate[required] span12" type="text"></div>							
						</div>	
					</div>
					<div class="formSep">
						<div class="row-fluid">						
							<label class="span2 moveright">Phone number</label>
							<div class="span3">
								<input name="office_phone[]" placeholder="# office" id="office_phone_1" class="span12" type="text">
							</div>	
							<div class="span3">	
								<input name="mobile_phone[]" placeholder="# mobile" id="mobile_phone_1" class="span12" type="text">
							</div>							
						</div>
					</div>
					<div class="formSep">
						<div class="row-fluid">								
							<label class="span2 moveright">Email <span class="f_req">*</span> </label>
							<div class="span6">
								<input name="cemail[]" id="cemail_1" class="validate[required,custom[email]] span12 cemail_1" type="text">
							</div>
						</div>
					</div>
					<div class="formSep">
						<div class="row-fluid">								
							<label class="span2 moveright">Role in company <span class="f_req">*</span> </label>
							<div class="span6 jobrepalce">
								<!--<input name="job_position[]" id="job_position_1" class="validate[required] span12" type="text">-->
								<select name="job_position[]" id="job_position_1" tabindex="-1" class="validate[required] span12" placeholder="Select Position">
									<option>Select Position</option>
									<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['contact_jobs'],'selected' => $this->_tpl_vars['contact']['job_position']), $this);?>

								</select>	
								<button type="button" class="addnew pull-right btn-info btn btn-small" tabindex="-1">Add</button>
							</div>
						</div>
					</div>
					<div class="formSep">
						<div class="row-fluid">								
							<label class="span2 moveright">Linkedin URL</label>
							<div class="span6">
								<input name="linkedin_url[]" id="linkedin_url_1" class="span12 validate[custom[url]]" type="text"  value="">
							</div>
						</div>
					</div>
					<div class="formSep">
						<div class="row-fluid">								
							<label class="span2 moveright"></label>
							<div class="span6">
								<label class="uni-radio">
									<div class="uni-radio">
										<span><input type="radio" checked="checked" value="1" class="uni_style validate[required]" name="main_contact" style="opacity: 0;"></span>
									</div>Select as main contact
								</label>								
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>	
                        <div class="mod" id="client_contact_0" style="display:none">		
					<button class="close" type="button" id="contact_close_0" rel="" style="display:none">&times;</button>
					<div class="formSep">
						<div class="row-fluid">							
							<label class="span2 moveright">Gender <span class="f_req">*</span> </label>
							<div class="span4">
								<select name="sex[]" id="sex_0" class="sex">
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>	
							</div>										
						</div>
					</div>	
					<div class="formSep">
						<div class="row-fluid">							
							<label class="span2 moveright">Name <span class="f_req">*</span> </label>
							<div class="span6"><input placeholder="ex: Arun kumar" name="first_name[]" id="first_name_0" class="validate[required] span12" type="text"></div>							
						</div>	
					</div>
					<div class="formSep">
						<div class="row-fluid">						
							<label class="span2 moveright">Phone number</label>
							<div class="span3">
								<input name="office_phone[]" placeholder="# office" id="office_phone_0" class="span12" type="text">
							</div>	
							<div class="span3">	
								<input name="mobile_phone[]" placeholder="# mobile" id="mobile_phone_0" class="span12" type="text">
							</div>							
						</div>
					</div>
					<div class="formSep">
						<div class="row-fluid">								
							<label class="span2 moveright">Email <span class="f_req">*</span> </label>
							<div class="span6">
								<input name="cemail[]" id="cemail_0" class="validate[required,custom[email]] span12" type="text">
							</div>
						</div>
					</div>
					<div class="formSep">
						<div class="row-fluid">								
							<label class="span2 moveright">Role in company <span class="f_req">*</span> </label>
							<div class="span6 jobrepalce">
								<!--<input name="job_position[]" id="job_position_1" class="validate[required] span12" type="text">-->
								<select name="job_position[]" id="job_position_0" tabindex="-1" class="validate[required] span12" placeholder="Select Position">
									<option>Select Position</option>
									<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['contact_jobs'],'selected' => $this->_tpl_vars['contact']['job_position']), $this);?>

								</select>	
								<button type="button" class="addnew pull-right btn-info btn btn-small">Add</button>
							</div>
						</div>
					</div>
					<div class="formSep">
						<div class="row-fluid">								
							<label class="span2 moveright">Linkedin URL</label>
							<div class="span6">
								<input name="linkedin_url[]" id="linkedin_url_0" class="span12 validate[custom[url]]" type="text"  value="">
							</div>
						</div>
					</div>
					<div class="formSep">
						<div class="row-fluid">								
							<label class="span2 moveright"></label>
							<div class="span6">
								<label class="uni-radio">
									<div class="uni-radio">
										<span><input type="radio" value="1" class="uni_style validate[required]" name="main_contact" style="opacity: 0;"></span>
									</div>Select as main contact
								</label>								
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid formSep ">	
					<div class="addmore-button" id="addmore_cc_link"><a class="btn">Add a contact</a></div> 
				</div>	
			</div>		
			<div class="row-fluid">
				<div class="span8 form-inline">
					<label class="span4"> <br><b>Company info</b> </label>
				</div>
			</div>	
			<div class="mod" id="company_info">
				<?php if ($this->_tpl_vars['client_info']['client_id'] && ( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'facturation' )): ?>
				<div class="formSep">
					<div class="row-fluid">
						<label class="span2 moveright">Client number <span class="f_req">*</span></label>
						<div class="span6">
							<input type="text" class="validate[minSize[4],maxSize[8],funcCall[checkclientcode],ajax[ajaxClientNoValidate]]" id="client_code" value="<?php echo $this->_tpl_vars['client_info']['client_code']; ?>
" name="client_code">		
						</div>	
					<input type="hidden" value="<?php echo $this->_tpl_vars['client_info']['client_id']; ?>
" id="user_id" name="user_id"  />				
					</div>
				</div>	
				<?php endif; ?>
				<div class="formSep">
					<div class="row-fluid">								
						<label class="span2 moveright">Address <span class="f_req">*</span> </label>
						<div class="span6">
							<textarea name="address" id="address" class="validate[required] span12"><?php echo ((is_array($_tmp=$this->_tpl_vars['client_info']['address'])) ? $this->_run_mod_handler('replace', true, $_tmp, '<br />', '') : smarty_modifier_replace($_tmp, '<br />', '')); ?>
</textarea>
						</div>
					</div>
				</div>
				<div class="formSep">
					<div class="row-fluid">								
						<label class="span2 moveright">Zip code <span class="f_req">*</span> </label>
						<div class="span6">
							<input name="zipcode" id="zipcode" class="validate[required] span12" type="text" value="<?php echo $this->_tpl_vars['client_info']['zipcode']; ?>
">
						</div>
					</div>
				</div>
				<div class="formSep">
					<div class="row-fluid">								
						<label class="span2 moveright">Town <span class="f_req">*</span> </label>
						<div class="span6">
							<input name="city" id="city" class="validate[required] span12" type="text" value="<?php echo $this->_tpl_vars['client_info']['city']; ?>
">
						</div>
					</div>
				</div>
				<div class="formSep">
					<div class="row-fluid">								
						<label class="span2 moveright">Country <span class="f_req">*</span> </label>
						<div class="span6">
							<select name="country" id="country" class="validate[required] span12" data-placeholder="Select Country">
								<option></option>
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['country_array'],'selected' => $this->_tpl_vars['client_info']['country']), $this);?>

							</select>
						</div>
					</div>
				</div>
				<div class="formSep">
					<div class="row-fluid">								
						<label class="span2 moveright">SIRET #  </label>
						<div class="span4">
							<input name="siret" id="siret" class="span12 <?php if ($this->_tpl_vars['client_info']['siret_applicable'] != 'yes'): ?><?php endif; ?>" type="text" value="<?php echo $this->_tpl_vars['client_info']['siret']; ?>
">
						</div>
						<div class="span3">
							<label class="uni-checkbox">
								<div class="uni-checkbox">
									<span><input type="checkbox" value="yes" id="siret_applicable" class="uni_style" <?php if ($this->_tpl_vars['client_info']['siret_applicable'] == 'yes'): ?> checked <?php endif; ?> name="siret_applicable">Siret not applicable</span>
								</div>
							</label>
						</div>
					</div>
				</div>
				<div class="formSep">
					<div class="row-fluid">							
						<label class="span2 moveright">Payment method </label>
						<div class="span6">
							<select name="payment_type" id="payment_type" class="span12">
								<option value="factor" <?php if ($this->_tpl_vars['client_info']['payment_type'] == 'factor'): ?> selected<?php endif; ?>>Factor</option>
								<option value="daily" <?php if ($this->_tpl_vars['client_info']['payment_type'] == 'daily'): ?> selected<?php endif; ?>>Daily</option>
								<option value="direct" <?php if ($this->_tpl_vars['client_info']['payment_type'] == 'direct'): ?> selected<?php endif; ?>>Direct</option>
							</select>	
						</div>										
					</div>
				</div>
				<div class="formSep">
					<div class="row-fluid">								
						<label class="span2 moveright">Yearly turnover</label>
						<div class="span6">
							<input name="ca_number" id="ca_number" class="span12" type="text"  value="<?php echo $this->_tpl_vars['client_info']['ca_number']; ?>
">
						</div>
					</div>
				</div>
				<div class="formSep">
					<div class="row-fluid">								
						<label class="span2 moveright">Search on twitter</label>
						<div class="span6">
							<input name="twitter_screen_search" id="twitter_screen_search" class="span9" type="text"  value="<?php echo $this->_tpl_vars['client_info']['twitter_screen_name']; ?>
">
							<button class="btn btn-info" type="button" id="twitter-search" name="twitter-search">Search</button>
						</div>						
					</div>
				</div>
				<div class="formSep">
					<div class="row-fluid">		
						<label class="span2 moveright"></label>
						<div class="span6" id="twitter-screens-list">
						</div>
					</div>
				</div>	
				
				<div class="formSep">
					<div class="row-fluid">
						<label class="span2 moveright"> Upload an image <span class="f_req">*</span></label>
						<div class="span6">
                                                  <div data-provides="fileupload" class="fileupload <?php if ($this->_tpl_vars['client_info']['client_logo']): ?> fileupload-exists <?php else: ?> fileupload-new <?php endif; ?>"><input type="hidden" />
									<div style="width: 80px; height: 70px; line-height: 150px;" class="fileupload-preview thumbnail">
										<img class="img-polaroid" id="clientlogo" src="<?php echo $this->_tpl_vars['client_info']['client_logo']; ?>
">
									</div>
									<div>
										<span class="btn btn-file"><span class="fileupload-new">S&eacute;lectionner image</span>
										<span class="fileupload-exists">Change</span>
										<input class="<?php if ($this->_tpl_vars['client_info']['client_id']): ?> custom<?php else: ?>validate[required,funcCall[checktype]]<?php endif; ?>" name="logo_client" id="upload_image" accept='image/*' type="file" value="<?php echo $this->_tpl_vars['client_info']['client_logo']; ?>
" /></span>
										<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
									</div>
								</div>
							<input type="hidden" name="twitter_screen_image" id="twitter_screen_image" value="">
						</div>	
					</div>
				</div>
			</div>	
			<div class="formSep">
				<div class="row-fluid">
					<div class="span12 pull-center">
						<?php if ($this->_tpl_vars['client_info']['client_id']): ?>
							<button type="submit" name="client_create" class="btn btn-primary">Update</button>
						<?php else: ?>	
							<button type="submit" name="client_create" class="btn btn-primary">Create</button>
						<?php endif; ?>	
					</div>
				</div>
			</div>
		</form>
	</div>
</div>	