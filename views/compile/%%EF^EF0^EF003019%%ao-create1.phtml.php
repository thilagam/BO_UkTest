<?php /* Smarty version 2.6.19, created on 2015-06-25 14:24:51
         compiled from gebo/ao/ao-create1.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/ao/ao-create1.phtml', 850, false),array('modifier', 'count', 'gebo/ao/ao-create1.phtml', 1511, false),array('function', 'html_options', 'gebo/ao/ao-create1.phtml', 1139, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
var filearray = new Array();

$(document).ready(function() { 
	$.validator.addMethod("pricecompare",
        function(value, element) {
		    if($(\'#price_min\').val()!="")	
				return (parseFloat($(\'#price_max\').val()) >= parseFloat($(\'#price_min\').val()));
			else
				return true;
        }	
    );

    $.validator.addMethod("corrpricecompare",
        function(value, element) {
			if($(\'#correction_pricemin\').val()!="")	
				return (parseFloat($(\'#correction_pricemax\').val()) >= parseFloat($(\'#correction_pricemin\').val())); 
			else
				return true;	
        }
    ); 

	$("#favcontribcheck").multiselect();  
    $("#favcontribcheck").multiselectfilter();
	$("#contrib_lang").multiselect({
		checkAll: function(){
				updatecontriblist(0);
			},
		uncheckAll: function(){
				updatecontriblist(0);
			}
	});
    $("#contrib_lang").multiselectfilter();
	$("#corrector_lang").multiselect({
		checkAll: function(){
				updatecorrectorlist(0);
			},
		uncheckAll: function(){
				updatecorrectorlist(0);
			}
	});
	$("#corrector_lang").multiselectfilter();
	$("#correctorcheck").multiselect();  
    $("#correctorcheck").multiselectfilter();
	
	$("#publish_language").multiselect();
        $("#publish_language").multiselectfilter();
				
	$("#client_list").chosen({ allow_single_deselect: true });
	$("#testmarks").chosen({ disable_search: true, allow_single_deselect: true });
	$("#templateid").chosen({ allow_single_deselect: true }); 
	$("#type").chosen({ disable_search: true });
	$("#language").chosen({	disable_search: true });
	$("#category").chosen({ disable_search: true });
	$("#signtype").chosen({ disable_search: true });
	$("#currency").chosen({ disable_search: true }); 
	//$("#contrib_lang").chosen({ disable_search: true });
	$("#contrib_cat").chosen({ disable_search: true	});
	$("#quiz_cat").chosen({ disable_search: true });
	$("#pollao").chosen({ disable_search: true	});
	$("#quiz").chosen({	disable_search: true });
	$("#submit_option").chosen({disable_search: true });
	$("#resubmit_option").chosen({disable_search: true });
	$("#correction_submit_option").chosen({disable_search: true });
	$("#correction_resubmit_option").chosen({disable_search: true });

	$(\'#deli_anonymouscheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"}
    });
	
	$(\'#testrequiredcheck\').toggleButtons({
	 	label:{enabled: "Oui",disabled: "Non"},
		onChange: function () {
			var type=$("input[name=\'testrequired\']:checked").val();
			if(type=="yes")
				$("#testmarksblock").show();
			else
				$("#testmarksblock").hide();
		}
    });
	
	/************************** Test mission **************************/
	$(\'#missiontestcheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"},
		onChange: function () {
			var type=$("input[name=\'missiontest\']:checked").val();
			if(type=="on")
			{
				$("#total_article").attr("disabled","true");
				$(\'#correctioncheck\').toggleButtons(\'setState\', true); 
				$(\'#mission_typecheck\').toggleButtons(\'setState\', false); 
				$("#invoiceblock").show();
				$("#writerinvoiceblock").show();
				$("#marksblock").show();
				//$(\'#invoicecheck\').toggleButtons(\'setState\', true); 
				$(\'#writerinvoicecheck\').toggleButtons(\'setState\', true); 
				$(\'#AOtypecheck\').toggleButtons(\'setState\', true); 
				$(\'#correction_typecheck\').toggleButtons(\'setState\', true); 
				$(\'#creation_step1\').attr(\'action\', \'/ao/ao-create2test?submenuId=ML2-SL3\');
				$("#liberteblock").hide();
				$("#premiumlist").hide();
			}
			else 
			{   
				//$(\'#AOtypecheck\').toggleButtons(\'setState\', false); 
				$("#total_article").removeAttr("disabled"); 
				//$(\'#invoicecheck\').toggleButtons(\'setState\', false); 
				$(\'#writerinvoicecheck\').toggleButtons(\'setState\', false); 
				$("#invoiceblock").hide();
				$("#writerinvoiceblock").hide();
				$("#marksblock").hide();
				//$(\'#correctioncheck\').toggleButtons(\'setState\', false); 
				
					if($("input[name=\'articletype\']:checked").val()=="lot")
						$(\'#creation_step1\').attr(\'action\', \'/ao/ao-create2lot?submenuId=ML2-SL3\');
					else 
						$(\'#creation_step1\').attr(\'action\', \'/ao/ao-create2?submenuId=ML2-SL3\');
				$("#liberteblock").show();				
				$("#premiumlist").show();				
			}
		}
    });
	
	$(\'#correctioncheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"},
		onChange: function () {
			var type=$("input[name=\'correction\']:checked").val();
			if(type=="on")
			{
				$("#correctionblock").show();
				$(\'#mission_typecheck\').toggleButtons(\'setState\', false); 
				$("#correctornotifyblock").show();
			}
			else
			{
				$("#correctionblock").hide();
				$(\'#missiontestcheck\').toggleButtons(\'setState\', false); 
				$("#correctornotifyblock").hide();
				$(\'#correctornotifycheck\').toggleButtons(\'setState\', false); 
			}
		}
    });

	$(\'#invoicecheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"},
		onChange: function () {
			var itype=$("input[name=\'invoice\']:checked").val();
			if(itype=="on")
			{
				$("#correction_pricemin").val(\'0\');
				$("#correction_pricemax").val(\'0\');
				$("#correction_pricemin").attr("readonly","true");
				$("#correction_pricemax").attr("readonly","true");
			}
			else
			{
				$("#correction_pricemin").val(\'\');
				$("#correction_pricemax").val(\'\');
				$("#correction_pricemin").removeAttr("readonly");
				$("#correction_pricemax").removeAttr("readonly");
			}
		}
    });
	
	$(\'#writerinvoicecheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"},
		onChange: function () {
			var itype=$("input[name=\'writerinvoice\']:checked").val();
			if(itype=="on")
			{
				$("#price_min").val(\'0\');
				$("#price_max").val(\'0\');
				$("#price_min").attr("readonly","true");
				$("#price_max").attr("readonly","true");
			}
			else
			{
				$("#price_min").val(\'\');
				$("#price_max").val(\'\');
				$("#price_min").removeAttr("readonly");
				$("#price_max").removeAttr("readonly");
			}
		}
    });
	
	$(\'#correction_typecheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"},
		onChange: function () {
			var type=$("input[name=\'correction_type\']:checked").val();
			if(type=="private")
			{
				$("#selcorrectors").show();
			}
			else
			{
				$("#selcorrectors").hide();
			}
		}	
    });

	$(\'#corrector_mailcheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"}
    });
	$(\'#nomoderationcheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"}
    });
	$(\'#white_listcheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"}
    });
	$(\'#black_listcheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"}
    });
	$(\'#blwllist_check\').toggleButtons({
        	label:{enabled: "Oui",disabled: "Non"}
    });
	$(\'#pricedisplaycheck\').toggleButtons({
	 	label:{enabled: "Oui",disabled: "Non"}
    });
    $(\'#link_quizcheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"},
		onChange: function () {
			var type=$("input[name=\'link_quiz\']:checked").val();
			if(type=="on")
			{
				$("#quizblock").show();
				updatequizlist(1);
			}
			else
			{
				$("#quizblock").hide();
			}
		}	
    });

	//AO type
	$(\'#AOtypecheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"},
		onChange: function () {
			var type=$("input[name=\'AOtype\']:checked").val();
			if(type=="private")
			{
				$("#contribbysel").show();
				$("#contrib_lang").multiselect();
                $("#contrib_lang").multiselectfilter();
				$("#price_min").removeAttr("disabled");
				$("#price_max").removeAttr("disabled");
				$("#publish_languagelist").hide();
			}
			else
			{
				$("#contribbysel").hide();
				if($("input[name=\'mission_type\']:checked").val()=="liberte")
				{
					$("#price_min").attr("disabled","true");
					$("#price_max").attr("disabled","true");
					$("#price_min").val(\'\');
					$("#price_max").val(\'\');
				}
				else
				{
					$("#price_min").removeAttr("disabled");
					$("#price_max").removeAttr("disabled");
				}
				$(\'#missiontestcheck\').toggleButtons(\'setState\', false); 
				$("#publish_languagelist").show();
				$("#publish_language").multiselect();
                                $("#publish_language").multiselectfilter();
				updatecontribtype();
			}
			updatecontriblist(1);
		}		
    });

	//Mission type
	$(\'#mission_typecheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"},
		onChange: function () {
			var type=$("input[name=\'mission_type\']:checked").val();
			if(type=="liberte")
			{
				$(\'#TotPrem\').val("0");
				if($("input[name=\'AOtype\']:checked").val()!="private")
				{
					$("#price_min").val(\'\');
					$("#price_max").val(\'\');
					$("#price_min").attr("disabled","true");
					$("#price_max").attr("disabled","true");
					
					$(\'#correctioncheck\').toggleButtons(\'setState\', false); 
				}
				else
				{
					$("#price_min").removeAttr("disabled");
					$("#price_max").removeAttr("disabled");
				}
				$(\'#missiontestcheck\').toggleButtons(\'setState\', false); 
				$("#premiumlist").hide();
				var client = $("#client_list").val();
				
				if(client==\'110726133627903\' || client==\'111201131205299\')
				{
					$("#price_min").removeAttr("disabled"); 
					$("#price_max").removeAttr("disabled"); 
					$("#price_min").attr("readonly","true"); 
					$("#price_max").attr("readonly","true"); 
					$(\'#pricetotal\').show(); 
				}
				else
					$(\'#pricetotal\').hide(); 
			}
			else
			{
				$("#premiumlist").show();
				$(\'#TotPrem\').val("1"); 
				$(\'#prem input[type=checkbox]\').closest(\'span\').removeClass("uni-checked"); 
				$(\'#prem input[type=radio]\').closest(\'span\').removeClass("uni-checked"); 
				$(\'#premium_option_0\').attr(\'checked\',\'true\'); 
				$(\'#premium_option_0\').closest(\'span\').addClass("uni-checked"); 
				$("#price_min").removeAttr("disabled");
				$("#price_max").removeAttr("disabled");
				$("#price_min").removeAttr("readonly");
				$("#price_max").removeAttr("readonly");
				$(\'#pricetotal\').hide();  
				
			}
			$(\'#prem input[type=checkbox]\').attr(\'disabled\',\'true\');
		}
    });

    $(\'#linkpollcheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"},
		onChange: function () {
			var type = $("input[name=\'linkpoll\']:checked").val();
			var client = $("#client_list").val();//alert(client);
			if(type=="on")
			{
				if(client=="0")
				{
					smoke.alert("Please select client");
					$("#linkpoll").removeAttr(\'checked\');
				}
				else
				{
					showpoll();
				}
			}
			else
				$("#pollcontent").hide();
		}
    });
    $(".uni_style").uniform(); 

	updatequizlist(1);
	updatecontriblist(1);
	updatecorrectorlist(1);
	clientvariable(1);
	updatecontribtype();
	if($("input[name=\'linkpoll\']:checked").val()==\'on\')
	{
		showpoll();
		loadpollcontent();
	}
	
	var spec = $("#spec_file_name").val();
	if(spec!="")
	{
		var speclist = spec.split(","); 
		if(speclist.length>0)
		{
			for(var s=0;s<speclist.length;s++)
				filearray.push(speclist[s]);
		}
	}
	
	var premm=$("input[name=\'premium_option\']:checked").val();
	if(premm=="13_1")
		$(\'#prem input[type=checkbox]\').attr(\'disabled\',\'true\');

	$(\'#correction_pricemin\').blur(function() {
		if($(\'#correction_pricemin\').val() ==\'\')
			this.placeholder = "Min.";
	});

	$(\'#correction_pricemax\').blur(function() {
		if($(\'#correction_pricemax\').val() ==\'\')
			this.placeholder = "Max.";
	});

	$(\'#correction_pricemin\').focus(function() {
		if($(\'#correction_pricemin\').val() ==String("Min.")) 
		  this.placeholder = "";
	});

	$(\'#correction_pricemax\').focus(function() {
		if($(\'#correction_pricemax\').val() ==String("Max."))
			  this.placeholder = "";
	}); 
	
	$(\'#min_sign\').blur(function() {
		if($(\'#min_sign\').val() ==\'\')
			this.placeholder = "Min.";
	});

	$(\'#max_sign\').blur(function() {
		if($(\'#max_sign\').val() ==\'\')
			this.placeholder = "Max.";
	});

	$(\'#min_sign\').focus(function() {
		if($(\'#min_sign\').val() ==String("Min.")) 
		  this.placeholder = "";
	});

	$(\'#max_sign\').focus(function() {
		if($(\'#max_sign\').val() ==String("Max."))
			  this.placeholder = "";
	}); 

	$(\'#price_min\').blur(function() {
		if($(\'#price_min\').val() ==\'\')
			this.placeholder = "Min.";
	});

	$(\'#price_max\').blur(function() {
		if($(\'#price_max\').val() ==\'\')
			this.placeholder = "Max.";
	});

	$(\'#price_min\').focus(function() {
		if($(\'#price_min\').val() ==String("Min.")) 
		  this.placeholder = "";
	});

	$(\'#price_max\').focus(function() {
		if($(\'#price_max\').val() ==String("Max."))
			  this.placeholder = "";
	}); 
	
	$(\'#articletypecheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"},
		onChange: function () {
			var type=$("input[name=\'articletype\']:checked").val();
			if(type=="lot")
			{
				$("#lotarticle").show();
				$("#totalarticle_text").html(\'DE COMBIEN DE LOTS AVEZ-VOUS BESOIN?\');
				$(\'#creation_step1\').attr(\'action\', \'/ao/ao-create2lot?submenuId=ML2-SL3\');
			}
			else 
			{
				$("#lotarticle").hide();
				$("#totalarticle_text").html(\'De combien d\\\'articles ou de lots avez-vous besoin?\');
				if($("input[name=\'missiontest\']:checked").val()=="on")
					$(\'#creation_step1\').attr(\'action\', \'/ao/ao-create2test?submenuId=ML2-SL3\');
				else
					$(\'#creation_step1\').attr(\'action\', \'/ao/ao-create2?submenuId=ML2-SL3\');
				
			}
		}	
    });
	
	$(\'#writernotifycheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"},
	});
	
	$(\'#correctornotifycheck\').toggleButtons({
	 	label:{enabled: "Yes",disabled: "No"},
	});
	//validation templates
	var product=$("input[name=\'product\']:checked").val();
	if(product=="redaction" || product=="translation") 
		loadvalidationtemplate(product,1);  
	
});

	$(function(){
			var btnUpload=$(\'#uploadspec\');
			var status=$(\'#fname\');
			
			new AjaxUpload(btnUpload, {

				action: \'uploadaospec\',
				name: \'uploadfile\',

				onSubmit: function(file, ext){
					if (! (ext && /^(doc|docx|xls|xlsx|pdf|csv|xml|rtf|zip)$/.test(ext))){
						$(\'#fileerr\').html(\'Uniquement doc, docx, xls, xlsx, pdf, csv, xml, zip et rtf\').css(\'color\',\'#FF0000\');
						return false;
					}
					
					var client=$("#client_list").val();
					
					if(client==0) 
					{
						$(\'#fileerr\').html(\'Please select client\').css(\'color\',\'#FF0000\');
						return false;
					}
					
					status.html(\'<img src="/FO/images/loading.gif" />\');
				},
				onComplete: function(file, response){//alert(response);
					if(response!="error"){
					status.html(\'\').css(\'color\',\'#000000\');
						var fname=response.split("#");
						$(\'#spec_file_name\').val(fname[1]);
						$(\'#fname\').html(fname[1]);
						$(\'#fileerr\').html(\'\');
					}
				}
			 });
	});


	$(function(){

		var btnUpload=$(\'#corrspec\');

		var status=$(\'#corrfname\');

		

		new AjaxUpload(btnUpload, {



			action: \'uploadcorrspec\',

			name: \'corrfile\',



			onSubmit: function(file, ext){

				if (! (ext && /^(doc|docx|xls|xlsx|pdf|csv|xml|rtf|zip)$/.test(ext))){
						status.html(\'Uniquement doc, docx, xls, xlsx, pdf, csv, xml, zip et rtf\').css(\'color\',\'#FF0000\');
						return false;
					}

				var client=$("#client_list").val();

				

				if(client==0) 

				{

					status.html(\'Please select client\').css(\'color\',\'#FF0000\');

					return false;

				}

				

				status.html(\'<img src="/FO/images/loading.gif" />\');

			},

			onComplete: function(file, response){

				if(response!="error"){

				status.html(\'\').css(\'color\',\'#000000\');

					var fname=response.split("#");

					$(\'#correction_spec_file\').val(fname[1]);

					$(\'#corrfname\').html(fname[1]);

					$(\'#correction_spec_file_err\').html(\'\');

				} 

			}

		 });

	});

	

	function CuteWebUI_AjaxUploader_OnTaskComplete(task)

	{
	alert(task);
		filearray.push(task.FileName);

		$(\'#spec_file_name\').val(filearray);

		

	}

	

	 function CuteWebUI_AjaxUploader_OnStart()

    {

      var hidden=this;

       hidden.internalobject.cancelBtn.style.visibility="hidden";

       hidden.internalobject.cancelBtn.style.display="none";

	   $("#fileerr").hide();

    }
	
	function updatecontribtype() 
	{
		var ao_type=$("input[name=\'AOtype\']:checked").val();
		if(ao_type!="private")
		{
			var lang=$("select#publish_language").val();
			$.ajax({
				type: \'GET\',
				url: \'/ao/updatecontribtype\',
				data: \'language=\'+lang,
				  
				success: function(result)
				{
					var resnt=result.split("#");
					$(\'#seniorcount\').html(resnt[0]);
					$(\'#juniorcount\').html(resnt[1]);
					$(\'#sjuniorcount\').html(resnt[2]);
				}
			});
		}
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



<style>

	.error {  display: none !important;}

	.usererror {  color:red}

	.AjaxUploaderCancelAllButton { display: none !important;}

	input {text-transform:none !important;}
	
	.popover-title { padding: 8px 14px;}
	.popover-content {  padding: 9px 14px;}
	#multiselect_corrector_lang .ui-multiselect-all{display: none !important;}
	#multiselect_corrector_lang .ui-multiselect-none{display: none !important;}

</style>

'; ?>




<form <?php if ($this->_tpl_vars['missiontest'] == 'on'): ?>action="/ao/ao-create2test?submenuId=ML2-SL3"<?php else: ?><?php if ($this->_tpl_vars['articletype'] == 'lot'): ?>action="/ao/ao-create2lot?submenuId=ML2-SL3"<?php else: ?>action="/ao/ao-create2?submenuId=ML2-SL3"<?php endif; ?><?php endif; ?> name="creation_step1" id="creation_step1" method="post" enctype="multipart/form-data" >

	<div class="row-fluid">

  		<div class="span12">

    		<h3 class="heading">Creating a Delivery

				<span align="right">

					<img src="/BO/theme/gebo/img/path-1.png" width="120" height="35" border="0" usemap="#Map" style="float:right;" />

					<map name="Map" id="Map">

					<?php if ($this->_tpl_vars['nav_2'] == 1): ?>

						<?php if ($this->_tpl_vars['missiontest'] == 'on'): ?>
							<area shape="circle" coords="60,18,17" id="area1" href="/ao/ao-create2test?submenuId=ML2-SL3"/>
						<?php else: ?>
							<?php if ($this->_tpl_vars['articletype'] == 'lot'): ?>
								<area shape="circle" coords="60,18,17" id="area1" href="/ao/ao-create2lot?submenuId=ML2-SL3"/>
							<?php else: ?>
								<area shape="circle" coords="60,18,17" id="area1" href="/ao/ao-create2?submenuId=ML2-SL3"/>
							<?php endif; ?>	
						<?php endif; ?>

					<?php endif; ?>

					<?php if ($this->_tpl_vars['nav_3'] == 1): ?>

						<area shape="circle" coords="102,17,18" id="area2" href="/ao/ao-create3?submenuId=ML2-SL3"/>

					<?php endif; ?>

					</map>

				</span> 

			</h3>	

				<div class="w-box">

					<div class="w-box-header">CLIENT</div>

					<div class='w-box-content'>

						<table align="center" cellpadding="4" cellspacing="4" width="78%">

							<tr>

								<td valign="top" width="50%">Client</td>

								<td>

									<span>

									<select name="client_list" id="client_list" class="chzn_a span12" onChange="clientvariable(0);">
									<option value="0">Select Client</option>
									<?php $_from = $this->_tpl_vars['client_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['clientkey'] => $this->_tpl_vars['client']):
?>

										<?php if ($this->_tpl_vars['clientkey'] == $this->_tpl_vars['def_user']): ?>

											<option value="<?php echo $this->_tpl_vars['clientkey']; ?>
" selected><?php echo $this->_tpl_vars['client']; ?>
</option>

										<?php else: ?>

											<option value="<?php echo $this->_tpl_vars['clientkey']; ?>
"><?php echo $this->_tpl_vars['client']; ?>
</option>

										<?php endif; ?>

									<?php endforeach; endif; unset($_from); ?>

									</select>

									</span>

									<br />

									<a data-toggle="modal" data-target="#newuser" href="javascript:void(0);">

										Add a new client

									</a><br>

									<span id="profileMsg" style="color:red;"></span>

								</td>

						    </tr>

							<tr id="template_block" style="display:none;">

								<td>Templates</td>

								<td id="templatelist"></td>

						    </tr>
							<tr id="contribtest_block">

								<td>This client requests that contributors have been previously tested</td>
								<td>
									<div id="testrequiredcheck">
								  		<input type="checkbox" name="testrequired" id="testrequired" value="yes" <?php if ($this->_tpl_vars['testrequired'] == 'yes'): ?>checked="checked"<?php endif; ?> />
								  	</div>
								</td>

						    </tr>
							<tr id="testmarksblock" <?php if ($this->_tpl_vars['testrequired'] != 'yes'): ?>style="display:none;"<?php endif; ?>>
								<td>What is the minimum test mark required to be able to participate to the mission ?</td>  
								<td>
									<?php $this->assign('foo', '1'); ?>
									<select name="testmarks" id="testmarks" style="width:80px;" class="chzn_a span12">
										<option value="">Mark</option>
										<?php while ($this->_tpl_vars['foo'] < 21) { ?>
											<option value="<?php echo $this->_tpl_vars['foo']; ?>
" <?php if ($this->_tpl_vars['testmarks'] == $this->_tpl_vars['foo']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['foo']; ?>
</option>
											<?php echo $this->_tpl_vars['foo']++; ?>

										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>

								<td>Delivery Anonymous</td>

								<td>

								  	<div id="deli_anonymouscheck">

								  		<input type="checkbox" name="deli_anonymous" id="deli_anonymous" <?php if ($this->_tpl_vars['deli_anonymous'] == 'on'): ?>checked="checked"<?php endif; ?> />

								  	</div>	

								</td>

						    </tr>
							<tr>

								<td>URLs to be excluded for plagiarism <div style="color:red">(Comma seperated)</div></td>

								<td>

								  	<textarea name="urlsexcluded" id="urlsexcluded" placeholder="Example:edit-place.com, www.edit-place.com" ><?php echo $this->_tpl_vars['urlsexcluded']; ?>
</textarea>

								</td>

						    </tr>

						</table>

					</div>

				</div>

				

				<div class="w-box">

					<div class="w-box-header">AO TYPE</div>

					<div class='w-box-content'>

						<table align="center" cellpadding="4" cellspacing="4" width="78%">

						    <tr id="templateblock" style="display:none;">

								<td>Templates of missions</td>

								<td id="templatelist">:

									

								</td>

							</tr>

						    <tr>

								<td width="50%">Name this Delivery</td>

								<td><span><input type="text" name="title" id="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" size="42"/></span></td>

						    </tr>

							<!----- validation templates--->
						    <tr>
								<td valign="top">Type de mission / Critères de notation vs refus</td>
								<td>
									<div style="padding-bottom:10px;">
										<input type="radio" name="product" id="product" value="redaction" onClick="loadvalidationtemplate('redaction',0);" <?php if ($this->_tpl_vars['product'] == 'redaction'): ?>checked<?php endif; ?>/> Rédaction&nbsp;
										<input type="radio" name="product" id="product" value="translation" onClick="loadvalidationtemplate('translation',0);" <?php if ($this->_tpl_vars['product'] == 'translation'): ?>checked<?php endif; ?>/> Traduction
									</div>
									<div id="content_type_err" style="color:red;"></div>	  
									<div id="validationtemplateblock" style="border: 1px solid;min-width:400px;min-height:200px;padding:15px;">
										<div style="text-align:center;padding-top:85px">
										Choisissez un type de mission ci-dessus<br/>
										pour sélectionner les critères de notation du rédacteur
										</div>
									</div>
									<div id="refusal_err" style="color:red;"></div>	  
								</td>
						    </tr>
							<tr>
								<td>Mission Test</td>
								<td>
									<div id="missiontestcheck">
								  		<input type="checkbox" name="missiontest" id="missiontest" <?php if ($this->_tpl_vars['missiontest'] == 'on'): ?>checked="checked"<?php endif; ?>/>
								  	</div>
								</td>
						    </tr>	

							<!-------------------------------------------- Correction ---------------------------------------------->

							<tr id="correction_tr">

								<td>Proofreading</td>   

								<td>

									<div id="correctioncheck">

								  		<input type="checkbox" name="correction" id="correction" <?php if ($this->_tpl_vars['correction'] == 'on'): ?>checked="checked"<?php endif; ?>/>

								  	</div>

								</td>

							</tr>

							<tr id="correctionblock" <?php if ($this->_tpl_vars['correction'] != 'on'): ?>style="display:none;"<?php endif; ?>>

								<td colspan="2" align="center">

									<div class="well" style="width:700px">

										<p style="text-align: left; border: 1px solid #FAAC58;background-color:#F9FCCC;color:#FB8925;padding:5px;width:700px">Les participations pour la correction seront ouvertes en m&ecirc;me temps pour la r&eacute;daction et pour la correction,<br/> le correcteur, une fois s&eacute;lectionn&eacute;, devra attendre que le r&eacute;dacteur soumette son fichier pour d&eacute;marrer la correction</p>
										<table align="center" cellpadding="4" cellspacing="4" width="100%" >

											<tr <?php if ($this->_tpl_vars['missiontest'] != 'on'): ?>style="display:none;"<?php endif; ?> id="invoiceblock">
												<td>No invoice generation</td>  
												<td>
													<div id="invoicecheck">
														<input type="checkbox" name="invoice" id="invoice" <?php if ($this->_tpl_vars['invoice'] == 'on'): ?>checked="checked"<?php endif; ?>/>
													</div>
												</td>
											</tr>
											<tr <?php if ($this->_tpl_vars['missiontest'] != 'on'): ?>style="display:none;"<?php endif; ?> id="marksblock">
												<td>Note /10</td>  
												<td>
													<span><input type="text" name="min_mark" id="min_mark" value="<?php echo $this->_tpl_vars['min_mark']; ?>
" placeholder="Min." class="span3"/></span>
												</td>
											</tr>
											<tr>

												<td width="30%" valign="top">Price range (min - max)</td>  

												<td>

													<span><input type="text" name="correction_pricemin" id="correction_pricemin" value="<?php echo $this->_tpl_vars['correction_pricemin']; ?>
" placeholder="Min." class="span3" <?php if ($this->_tpl_vars['invoice'] == 'on'): ?>readonly<?php endif; ?>/></span>

													<span><input type="text" name="correction_pricemax" id="correction_pricemax" value="<?php echo $this->_tpl_vars['correction_pricemax']; ?>
" placeholder="Max." class="span3" <?php if ($this->_tpl_vars['invoice'] == 'on'): ?>readonly<?php endif; ?>/></span>

												</td>

											</tr>

											<tr>

												<td valign="top">Brief corrector</td>

												<td id="corrspec">

													<span class="btn btn-file">

														<span class="fileupload-new">Select Correction Spec file</span>

														<input type="file" name="correction_file" id="correction_file"/>    

													</span>	

													<div id="correction_spec_file_err" style="color:red;"></div>

													<div id="corrfname"><?php echo $this->_tpl_vars['correction_spec_file']; ?>
</div>

													<input type="hidden" id="correction_spec_file" name="correction_spec_file" value="<?php echo $this->_tpl_vars['correction_spec_file']; ?>
" />

												</td>

											</tr>

											<!-------------------- Private correction ------------------------>

											<tr>

												<td valign="top">Correction private</td>

												<td>

													<div id="correction_typecheck">

														<input type="checkbox" name="correction_type" id="correction_type" value="private" <?php if ($this->_tpl_vars['correction_type'] == 'private'): ?>checked="checked"<?php endif; ?>/>

													</div>

												</td>

											</tr>

											<tr id="selcorrectors" <?php if ($this->_tpl_vars['correction_type'] != 'private'): ?>style="display:none;"<?php endif; ?>>
												<td colspan="2">
													<table align="center" cellpadding="4" cellspacing="4" width="100%" >
														<tr>
															<td width="30%">Sort by language</td>
															<td> 
																<select name="corrector_lang[]" id="corrector_lang" onChange="updatecorrectorlist(0);" multiple="multiple" style="width:250px;">
																	<?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
																		<?php if (in_array ( $this->_tpl_vars['langkey'] , $this->_tpl_vars['corrector_langarray'] )): ?>
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
															<td valign="top">Proofreaders</td>
															<td valign="top" id="correctors">
																<select multiple="multiple" name="correctorcheck[]" id="correctorcheck" style="width:370px">
																<?php $_from = $this->_tpl_vars['correctorlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['corr']):
?>
																	<?php if (in_array ( $this->_tpl_vars['corr']['identifier'] , $this->_tpl_vars['corrector_array'] )): ?>
																		<option value="<?php echo $this->_tpl_vars['corr']['identifier']; ?>
" selected><?php echo $this->_tpl_vars['corr']['name']; ?>
</option>
																	<?php else: ?>
																		<option value="<?php echo $this->_tpl_vars['corr']['identifier']; ?>
"><?php echo $this->_tpl_vars['corr']['name']; ?>
</option>
																	<?php endif; ?>
																<?php endforeach; endif; unset($_from); ?>
																</select>
																<div id="corrcontrib_err" style="color:red;"></div>
															</td>
														</tr>
													</table>
												</td>

											</tr>

											<tr>

												<td valign="top">Period of participation</td>

												<td>

													<span><input type="text" name="correction_participation" id="correction_participation" value="<?php echo $this->_tpl_vars['correction_participation']; ?>
" class="span2"/></span> mins

												</td>

											</tr>

											<tr>

												<td valign="top">Correction time</td>

												<td>

													<span style="vertical-align:top;">JC <input type="text" name="correction_jc_submission" id="correction_jc_submission" class="span2" value="<?php echo $this->_tpl_vars['correction_jc_submission']; ?>
"/></span>

													<span style="vertical-align:top;">SC <input type="text" name="correction_sc_submission" id="correction_sc_submission" class="span2" value="<?php echo $this->_tpl_vars['correction_sc_submission']; ?>
"/></span> 

													<select name="correction_submit_option" id="correction_submit_option" style="width:90px">

														<option value="min" <?php if ($this->_tpl_vars['correction_submit_option'] == 'min'): ?>selected<?php endif; ?>>Minutes(s)</option>

														<option value="hour" <?php if ($this->_tpl_vars['correction_submit_option'] == 'hour' || $this->_tpl_vars['correction_submit_option'] == ""): ?>selected<?php endif; ?>>Hour(s)</option>

														<option value="day" <?php if ($this->_tpl_vars['correction_submit_option'] == 'day'): ?>selected<?php endif; ?>>Day(s)</option>

													</select>

												</td>

											</tr>

											<tr>

												<td valign="top">Correction time after a refusal</td> 

												<td> 

													<span style="vertical-align:top;">JC <input type="text" name="correction_jc_resubmission" id="correction_jc_resubmission" class="span2" value="<?php echo $this->_tpl_vars['correction_jc_resubmission']; ?>
"/></span> 

													<span style="vertical-align:top;">SC <input type="text" name="correction_sc_resubmission" id="correction_sc_resubmission" class="span2" value="<?php echo $this->_tpl_vars['correction_sc_resubmission']; ?>
"/></span> 

													<select name="correction_resubmit_option" id="correction_resubmit_option" style="width:90px">

														<option value="min" <?php if ($this->_tpl_vars['correction_resubmit_option'] == 'min'): ?>selected<?php endif; ?>>Minutes(s)</option>

														<option value="hour" <?php if ($this->_tpl_vars['correction_resubmit_option'] == 'hour' || $this->_tpl_vars['correction_resubmit_option'] == ""): ?>selected<?php endif; ?>>Hour(s)</option>

														<option value="day" <?php if ($this->_tpl_vars['correction_resubmit_option'] == 'day'): ?>selected<?php endif; ?>>Day(s)</option>

													</select>

												</td>

											</tr>

											<tr>

												<td>Send an email to corrective</td>

												<td>

													<div id="corrector_mailcheck">

														<input type="checkbox" name="corrector_mail" id="corrector_mail" <?php if ($this->_tpl_vars['corrector_mail'] == 'on'): ?>checked="checked"<?php endif; ?>/>

													</div>

												</td>

											</tr>
											<tr>
												<td>Dont moderate the decisions of the correction</td>
												<td>
													<div id="nomoderationcheck">
														<input type="checkbox" name="nomoderation" id="nomoderation" value="yes"<?php if ($this->_tpl_vars['nomoderation'] == 'yes'): ?>checked="checked"<?php endif; ?>/>
													</div>
												</td>
											</tr>

										</table>

									</div>

								</td>

							</tr>

							

							<!-------------------------------------------- Quiz ---------------------------------------------->

							<tr>

						        <td>Delivery with quiz</td>

						        <td>  

						           <div id="link_quizcheck">

								  		<input type="checkbox" name="link_quiz" id="link_quiz" <?php if ($this->_tpl_vars['link_quiz'] == 'on'): ?>checked="checked"<?php endif; ?>/>

								  	</div>

						        </td>

						    </tr>

							<tr id="quizblock" <?php if ($this->_tpl_vars['link_quiz'] != 'on'): ?>style="display:none;"<?php endif; ?>>

								<td colspan="2" align="center">

									<div class="well" style="width:600px">

										<table align="center" cellpadding="4" cellspacing="4" width="100%" >

											<tr>

												<td width="50%">Catagory</td> 

												<td> <?php echo smarty_function_html_options(array('name' => 'quiz_cat','id' => 'quiz_cat','options' => $this->_tpl_vars['Contrib_cats'],'selected' => $this->_tpl_vars['quiz_cat'],'onChange' => "updatequizlist(0);"), $this);?>
 </td>

											</tr>

											<tr>

												<td>Quiz</td>

												<td id="quizlist"><?php echo $this->_tpl_vars['quiz']; ?>


													<select name="quiz" id="quiz"  onchange="loadquizvals();">

													<option value="">S&eacute;lectionner</option>

													<?php $_from = $this->_tpl_vars['quiz_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quizitem']):
?>

														<?php if ($this->_tpl_vars['quiz'] == $this->_tpl_vars['quizitem']['id']): ?>

															<option value="<?php echo $this->_tpl_vars['quizitem']['id']; ?>
" selected><?php echo $this->_tpl_vars['quizitem']['title']; ?>
</option>

														<?php else: ?>

															<option value="<?php echo $this->_tpl_vars['quizitem']['id']; ?>
"><?php echo $this->_tpl_vars['quizitem']['title']; ?>
</option>

														<?php endif; ?>	

													<?php endforeach; endif; unset($_from); ?>

													</select>

												</td>

											</tr>

											<tr>

												<td>Nb min. correct answers</td> 

												<td><input type="text" name="quiz_marks" id="quiz_marks" value="<?php echo $this->_tpl_vars['quiz_marks']; ?>
" class="span2"/></td>

											</tr>

											<tr>

												<td>Duration of the quiz</td>

												<td>

													<input type="text" name="quiz_duration" id="quiz_duration" value="<?php echo $this->_tpl_vars['quiz_duration']; ?>
" class="span2"/>&nbsp;Mins

												</td>

											</tr>

										</table>

									</div>

								</td>

							</tr>  

							<tr id="liberteblock" <?php if ($this->_tpl_vars['missiontest'] == 'on'): ?>style="display:none;"<?php endif; ?>>

								<td>Mission freedom</td>

								<td>

									<div id="mission_typecheck">

								  		<input type="checkbox" name="mission_type" id="mission_type" value="liberte" <?php if ($this->_tpl_vars['mission_type'] == 'liberte'): ?>checked="checked"<?php endif; ?>/>

								  	</div>

								</td>

							</tr>

							<tr id="premiumlist" <?php if ($this->_tpl_vars['mission_type'] == 'liberte' || $this->_tpl_vars['missiontest'] == 'on'): ?>style="display:none;"<?php endif; ?>>

								<td valign="top">&nbsp;</td>

								<td valign="top">  

									<div id="prem">

										<span>

										<?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['option_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['option_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['option']):
        $this->_foreach['option_loop']['iteration']++;
?>  

											<label class="uni-radio">

											<div id="uniform-premium_option_<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
" class="uni-radio"> 

											 <?php if ($this->_tpl_vars['premium_option'] == $this->_tpl_vars['option']['value'] || $this->_tpl_vars['premium_option'] == $this->_tpl_vars['option']['id']): ?>

												<input type="radio" class="uni_style" value="<?php echo $this->_tpl_vars['option']['value']; ?>
" name="premium_option" checked id="premium_option_<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
"  onClick="services_update('parent',<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
,this.value,this)"/>

											 <?php else: ?>

												<input type="radio" class="uni_style" value="<?php echo $this->_tpl_vars['option']['value']; ?>
" name="premium_option"  id="premium_option_<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
"  onClick="services_update('parent',<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
,this.value,this)"/>

											 <?php endif; ?>

											</div>   

											<span style="vertical-align:middle;font-weight:normal; cursor:pointer"><?php echo $this->_tpl_vars['option']['option_name']; ?>
</span>

											<a class="pop_over" data-placement="right" data-content="<?php echo $this->_tpl_vars['option']['description1']; ?>
" data-html="true" ><i class="splashy-information"></i></a>
											 

											</label>

										

										<div style="padding-left:30px;" id="premium_<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
">

											<?php $_from = $this->_tpl_vars['option']['childlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>

												<?php if ($this->_tpl_vars['child']['id'] != ""): ?>

												<label class="uni-checkbox">

												<div class="rowS" >

												  <?php if (in_array ( $this->_tpl_vars['child']['value'] , $this->_tpl_vars['prem_ser'] ) || in_array ( $this->_tpl_vars['child']['id'] , $this->_tpl_vars['prem_ser'] )): ?>

													 <input type="checkbox" class="uni_style" id="premium_service_<?php echo $this->_tpl_vars['child']['id']; ?>
" name="premium_service[]" value="<?php echo $this->_tpl_vars['child']['value']; ?>
" onClick="services_update('child',<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
,this.value,this,<?php echo $this->_tpl_vars['child']['id']; ?>
)" checked />

												  <?php else: ?>

													 <input type="checkbox" class="uni_style" id="premium_service_<?php echo $this->_tpl_vars['child']['id']; ?>
" name="premium_service[]" value="<?php echo $this->_tpl_vars['child']['value']; ?>
" onClick="services_update('child',<?php echo ($this->_foreach['option_loop']['iteration']-1); ?>
,this.value,this,<?php echo $this->_tpl_vars['child']['id']; ?>
)" />

												  <?php endif; ?>

												  <?php echo $this->_tpl_vars['child']['option_name']; ?>


												  <a class="pop_over" data-placement="right" data-content="<?php echo $this->_tpl_vars['child']['description']; ?>
" data-html="true"><i class="splashy-information"></i></a>

												</div>

												</label>	

												<?php endif; ?>  

										   <?php endforeach; endif; unset($_from); ?>  

									   </div>

									   <?php endforeach; endif; unset($_from); ?>

									   </span>

									</div>

									<input type="hidden" id="TotPrem" name="TotPrem" value="<?php echo $this->_tpl_vars['TotPrem']; ?>
" />

								</td>

						    </tr>

							<tr id="spec_block" <?php if ($this->_tpl_vars['client_list'] == '0'): ?>style="display:none;"<?php endif; ?>>
								<td valign="top">Editorial Brief</td>
								<td valign="top"> 
									<div id="uploadspec">
										<span class="btn btn-file">
											<span class="fileupload-new">Select Spec file</span>
											<input type="file" name="file" id="file"  class="" />
										</span>
										<span id="fileerr" style="color:red;"></span>
										<br><div id="fname"><?php echo $this->_tpl_vars['sp_file']; ?>
</div>
									</div>
									<input type="hidden" id="spec_file_name" name="spec_file_name" value="<?php echo $this->_tpl_vars['sp_file']; ?>
" />
								</td>
						    </tr>
						</table>
					</div>
				</div>

				<div class="w-box">

					<div class="w-box-header">SEO</div>

					<div class='w-box-content'>

						<table align="center" cellpadding="4" cellspacing="4" width="78%">    

						    <tr>

						        <td width="50%">White list</td>

						        <td>

						            <div id="white_listcheck">

								  		<input type="checkbox" name="white_list" id="white_list" <?php if ($this->_tpl_vars['white_list'] == 'on'): ?>checked="checked"<?php endif; ?>/>

								  	</div>

						        </td>

						    </tr>

						    <tr>

						        <td>Black list</td>

						        <td>

						            <div id="black_listcheck">

								  		<input type="checkbox" name="black_list" id="black_list" <?php if ($this->_tpl_vars['black_list'] == 'on'): ?>checked="checked"<?php endif; ?>/>

								  	</div>

						        </td>

						    </tr>
						   <tr>
						        <td width="50%">White list and Black list check</td>
						        <td>
						            <div id="blwllist_check">
						                <input type="checkbox" name="blwl_check" id="blwl_check" <?php if ($this->_tpl_vars['blwl_check'] == 'on'): ?>checked="checked"<?php endif; ?>/>
						            </div>
						        </td>
						    </tr>	

						</table>

					</div>

				</div>

					

				<div class="w-box">

					<div class="w-box-header">CONTRIBUTOR</div>

					<div class='w-box-content'>

						<table align="center" cellpadding="4" cellspacing="4" width="78%">    

							<tr>

						        <td width="50%">Mission private</td>

						        <td>

						            <div id="AOtypecheck">

								  		<input type="checkbox" name="AOtype" id="AOtype" value="private" <?php if ($this->_tpl_vars['AOtype'] == 'private'): ?>checked="checked"<?php endif; ?>/>

								  	</div>

						        </td>

						    </tr>

							<tr id="contribbysel" <?php if ($this->_tpl_vars['AOtype'] != 'private'): ?>style="display:none;"<?php endif; ?>>

								<td colspan="2" align="center">

									<div class="well" style="width:600px">

										<table align="center" cellpadding="4" cellspacing="4" width="100%" >

											<tr>

												<td width="50%">Sort by language</td>

												<td> 

													<select name="contrib_lang[]" id="contrib_lang" onChange="updatecontriblist(0);" multiple="multiple" style="width:250px;">

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

												<td>Sort by type</td>

												<td> <?php echo smarty_function_html_options(array('name' => 'contrib_cat','id' => 'contrib_cat','options' => $this->_tpl_vars['Contrib_cats'],'selected' => $this->_tpl_vars['contrib_cat'],'style' => "width:250px;",'onChange' => "updatecontriblist(0);"), $this);?>
 </td>

											</tr>

											<tr>

												<td valign="top">Contributor</td>

												<td valign="top" id="contribs">

													<select name="favcontribcheck[]" id="favcontribcheck" multiple="multiple"> 

													<?php $_from = $this->_tpl_vars['contriblistall1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contrib']):
?>

																<?php if (in_array ( $this->_tpl_vars['contrib']['identifier'] , $this->_tpl_vars['contrib_array'] )): ?>

																<option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
" selected><?php echo $this->_tpl_vars['contrib']['name']; ?>
</option>

																<?php else: ?>

																<option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
"><?php echo $this->_tpl_vars['contrib']['name']; ?>
</option>

																<?php endif; ?>

													<?php endforeach; endif; unset($_from); ?>

													</select>

													<div id="favcontrib_err" style="color:red;"></div>

												</td>

											</tr>

										</table>

									</div>

								</td>

							</tr>		

						    <tr>

						        <td valign="top">Contributor type</td>

						        <td>

						            <label class="uni-checkbox">

										<input type="checkbox" value="senior" name="contribtype[]" id="contribtype1" class="uni_style" <?php if (in_array ( 'senior' , $this->_tpl_vars['contribtype'] )): ?>checked<?php endif; ?>  onClick="updatecontriblist(0);"/>
										SC<b>(<div id="seniorcount" style="display:inline"><?php echo $this->_tpl_vars['sc_count']; ?>
</div>)</b>
									</label>

									<label class="uni-checkbox">

										<input type="checkbox" value="junior" name="contribtype[]" id="contribtype2" class="uni_style" <?php if (in_array ( 'junior' , $this->_tpl_vars['contribtype'] )): ?>checked<?php endif; ?> onClick="updatecontriblist(0);"/>
										JC<b>(<div id="juniorcount" style="display:inline"><?php echo $this->_tpl_vars['jc_count']; ?>
</div>)</b>
									</label>

									<label class="uni-checkbox">

										<input type="checkbox" value="sub-junior" name="contribtype[]" id="contribtype2" class="uni_style" <?php if (in_array ( 'sub-junior' , $this->_tpl_vars['contribtype'] )): ?>checked<?php endif; ?> onClick="updatecontriblist(0);"/>
										JC0<b>(<div id="sjuniorcount" style="display:inline"><?php echo $this->_tpl_vars['jc0_count']; ?>
</div>)</b> 
									</label>

						        </td>	

						    </tr>
							<tr id="publish_languagelist" <?php if ($this->_tpl_vars['AOtype'] == 'private'): ?>style="display:none;"<?php endif; ?>>
								<td>Language of contributors who will see the AO and receive an alert by email</td>
								<td> 
									<select name="publish_language[]" id="publish_language" multiple="multiple" style="width:250px;" Onchange="updatecontribtype();">
										<?php if (count($this->_tpl_vars['publish_langarray']) > 0): ?>
											<?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
												<?php if (in_array ( $this->_tpl_vars['langkey'] , $this->_tpl_vars['publish_langarray'] )): ?>
													<option value="<?php echo $this->_tpl_vars['langkey']; ?>
" selected><?php echo $this->_tpl_vars['langitem']; ?>
</option>
												<?php else: ?>
													<option value="<?php echo $this->_tpl_vars['langkey']; ?>
"><?php echo $this->_tpl_vars['langitem']; ?>
</option>
												<?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>
										<?php else: ?>
											<?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
												<option value="<?php echo $this->_tpl_vars['langkey']; ?>
" selected><?php echo $this->_tpl_vars['langitem']; ?>
</option>
											<?php endforeach; endif; unset($_from); ?>
										<?php endif; ?>	
									</select>
									<div id="publishlang_err" style="color:red;"></div>
								</td>
							</tr>
							<tr id="poll_block" <?php if ($this->_tpl_vars['client_list'] == '0'): ?>style="display:none;"<?php endif; ?>>

								<td>To link with a quote</td>

								<td>

									<div id="linkpollcheck">

								  		<input type="checkbox" name="linkpoll" id="linkpoll" <?php if ($this->_tpl_vars['linkpoll'] == 'on'): ?>checked="checked"<?php endif; ?>/>

								  	</div>

								</td>

							</tr>

							<tr <?php if ($this->_tpl_vars['linkpoll'] != 'on'): ?>style="display:none;"<?php endif; ?> id="pollcontent">

								<td colspan="2" align="center">

									<div class="well" style="width:600px">

										<table align="center" cellpadding="4" cellspacing="4" width="100%" >

												<tr>

													<td width="50%">Name of the quote</td>

													<td id="polldiv">

														<select name="pollao" id="pollao" disabled>

														</select>

													</td>

												</tr>

												<tr>

													<td valign="top">Writers who participated</td>

													<td id="pcontribs">

														 Select Poll

													</td>

												</tr>

												<tr>

													<td>Time these contributors will be given priority</td>

													<td >

														<input type="text" name="priority_hours" id="priority_hours" value="<?php echo $this->_tpl_vars['priority_hours']; ?>
" class="span2" disabled />

													</td>

												</tr>

										</table>

									</div>

								</td>

							</tr>

							<tr>

								<td>Time rendering Article</td>

								<td>

									<span style="vertical-align:top;">JC0 <input type="text" name="subjunior_time" id="subjunior_time" class="span2" value="<?php echo $this->_tpl_vars['subjunior_time']; ?>
" maxlength="3" /></span>

									<span style="vertical-align:top;">JC <input type="text" name="junior_time" id="junior_time" class="span2" value="<?php echo $this->_tpl_vars['junior_time']; ?>
" maxlength="3" /></span>&nbsp;

									<span style="vertical-align:top;">SC <input type="text" name="senior_time" id="senior_time" class="span2" value="<?php echo $this->_tpl_vars['senior_time']; ?>
"  maxlength="3"/></span>&nbsp; 

									<select name="submit_option" id="submit_option" style="width:90px">

										<option value="min" <?php if ($this->_tpl_vars['submit_option'] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>

										<option value="hour" <?php if ($this->_tpl_vars['submit_option'] == 'hour' || $this->_tpl_vars['submit_option'] == ""): ?>selected<?php endif; ?>>Hour(s)</option>

										<option value="day" <?php if ($this->_tpl_vars['submit_option'] == 'day'): ?>selected<?php endif; ?>>Day(s)</option>

									</select>

							  </td>

							</tr>

							<tr>

								<td>Time after rejection is</td> 

								<td>

									<span style="vertical-align:top;">JC0 <input type="text" name="jc0_resubmission" id="jc0_resubmission" class="span2" value="<?php echo $this->_tpl_vars['jc0_resubmission']; ?>
"  maxlength="3"/></span>

									<span style="vertical-align:top;">JC <input type="text" name="jc_resubmission" id="jc_resubmission" class="span2" value="<?php echo $this->_tpl_vars['jc_resubmission']; ?>
"  maxlength="3" /></span>&nbsp;

									<span style="vertical-align:top;">SC <input type="text" name="sc_resubmission" id="sc_resubmission" class="span2" value="<?php echo $this->_tpl_vars['sc_resubmission']; ?>
"  maxlength="3"/></span>&nbsp;

									<select name="resubmit_option" id="resubmit_option" style="width:90px">

										<option value="min" <?php if ($this->_tpl_vars['resubmit_option'] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>

										<option value="hour" <?php if ($this->_tpl_vars['resubmit_option'] == 'hour' || $this->_tpl_vars['resubmit_option'] == ""): ?>selected<?php endif; ?>>Hour(s)</option>

										<option value="day" <?php if ($this->_tpl_vars['resubmit_option'] == 'day'): ?>selected<?php endif; ?>>Day(s)</option>

									</select>

							  </td>

							</tr>

							<tr>

								<td>Participation time given to the writer</td>

								<td>

									<span><input type="text" name="participation_time" id="participation_time" class="span2" value="<?php echo $this->_tpl_vars['participation_time']; ?>
"  /></span> mins 

								</td>

							</tr>

							<tr>

								<td>Part to the contributor (100% normally)</td>

								<td>

									<span><input type="text" name="contrib_percentage" id="contrib_percentage" value="<?php echo $this->_tpl_vars['contrib_percentage']; ?>
" class="span2"/><span>

									%

								</td>

							</tr>

						</table>

					</div>

				</div>	

				

				<div class="w-box">

					<div class="w-box-header">ARTICLE</div>

					<div class='w-box-content'>

						<table align="center" cellpadding="4" cellspacing="4" width="78%">    	
							<tr>
								<td width="50%">Does this mission contain packages?</td>
								<td>
									 <div id="articletypecheck">
								  		<input type="checkbox" name="articletype" id="articletype" value="lot" <?php if ($this->_tpl_vars['articletype'] == 'lot'): ?>checked="checked"<?php endif; ?>/>
								  	</div>
								</td>
						    </tr>
							<tr>
								<td id="totalarticle_text">Packages/Articles?</td>
								<td>
									<span><input type="text" name="total_article" id="total_article" value="<?php echo $this->_tpl_vars['total_article']; ?>
" class="span2" <?php if ($this->_tpl_vars['missiontest'] == 'on'): ?>disabled<?php endif; ?>/></span>
								</td>

						    </tr>
							<tr id="lotarticle" <?php if ($this->_tpl_vars['articletype'] != 'lot'): ?>style="display:none;"<?php endif; ?>>
								<td>Indicate number of articles per package</td>
								<td>
									<span><input type="text" name="sub_article" id="sub_article" value="<?php echo $this->_tpl_vars['sub_article']; ?>
" class="span2"/></span>
								</td>
						    </tr>
							<tr>

								<td>Type</td>

								<td><?php echo smarty_function_html_options(array('name' => 'type','id' => 'type','options' => ((is_array($_tmp=$this->_tpl_vars['type_array'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)),'selected' => $this->_tpl_vars['type'],'class' => 'span8'), $this);?>
 </td>

						    </tr>

						    <tr>

								<td>Language</td>

								<td><?php echo smarty_function_html_options(array('name' => 'language','id' => 'language','options' => $this->_tpl_vars['language_array'],'selected' => $this->_tpl_vars['language'],'class' => 'span8'), $this);?>
 </td>

						    </tr>

						    <tr>

								<td>Category</td>

								<td><?php echo smarty_function_html_options(array('name' => 'category','id' => 'category','options' => $this->_tpl_vars['category_array'],'selected' => $this->_tpl_vars['art_cat_sel'],'class' => 'span8'), $this);?>
 </td>

						    </tr>

						    <tr>

								<td>Nomber of signs</td>

								<td><?php echo smarty_function_html_options(array('name' => 'signtype','id' => 'signtype','selected' => $this->_tpl_vars['art_sign_type_sel'],'options' => $this->_tpl_vars['signtype_array'],'class' => 'span8'), $this);?>


								  <span><input type="text" id="min_sign" name="min_sign" value="<?php echo $this->_tpl_vars['min_sign']; ?>
" class="span2" placeholder="Min." style="margin-top:-12px"/></span>

								  <span><input type="text" id="max_sign" name="max_sign" value="<?php echo $this->_tpl_vars['max_sign']; ?>
" class="span2" placeholder="Max." style="margin-top:-12px"/></span>

								 </td> 

						    </tr>
							
							<tr <?php if ($this->_tpl_vars['missiontest'] != 'on'): ?>style="display:none;"<?php endif; ?> id="writerinvoiceblock">
								<td>No invoice generation</td>  
								<td>
									<div id="writerinvoicecheck">
										<input type="checkbox" name="writerinvoice" id="writerinvoice" <?php if ($this->_tpl_vars['writerinvoice'] == 'on'): ?>checked="checked"<?php endif; ?>/>
									</div>
								</td>
							</tr>
							<tr <?php if ($this->_tpl_vars['mission_type'] != 'liberte'): ?>style="display:none;"<?php endif; ?> id="pricetotal">
								<td>Prix total</td>
								<td> 
									<span><input type="text" name="price_min_total" id="price_min_total" value="<?php echo $this->_tpl_vars['price_min_total']; ?>
"  placeholder="Min." class="span2" onKeyup="addprice('min');" /></span>
									<span><input type="text" name="price_max_total" id="price_max_total" value="<?php echo $this->_tpl_vars['price_max_total']; ?>
"  placeholder="Max." class="span2" onKeyup="addprice('max');" /></span>
								</td>
						    </tr>
							
							<tr>

								<td>Your price range</td>

								<td> 
									<span><input type="text" name="price_min" id="price_min" value="<?php echo $this->_tpl_vars['price_min']; ?>
"  placeholder="Min." class="span2" <?php if ($this->_tpl_vars['writerinvoice'] == 'on'): ?>readonly<?php endif; ?> <?php if ($this->_tpl_vars['mission_type'] == 'liberte' && $this->_tpl_vars['AOtype'] != 'private'): ?>disabled<?php endif; ?> /></span>
									<span><input type="text" name="price_max" id="price_max" value="<?php echo $this->_tpl_vars['price_max']; ?>
"  placeholder="Max." class="span2" <?php if ($this->_tpl_vars['writerinvoice'] == 'on'): ?>readonly<?php endif; ?> <?php if ($this->_tpl_vars['mission_type'] == 'liberte' && $this->_tpl_vars['AOtype'] != 'private'): ?>disabled<?php endif; ?> /></span>
								</td>
						    </tr>
						    	<?php if ($this->_tpl_vars['usertype'] == 'superadmin'): ?>	
							<tr id="pricedisplayblock">
								<td>Price range Display</td>  
								<td>
									<div id="pricedisplaycheck">
										<input type="checkbox" name="pricedisplay" id="pricedisplay" value="yes" <?php if ($this->_tpl_vars['pricedisplay'] == 'yes'): ?>checked="checked"<?php endif; ?>/>
									</div>
								</td>
							</tr>
							<?php else: ?>
								<input type="hidden" name="pricedisplay" id="pricedisplay" value="yes"/>
							<?php endif; ?>	
							<tr>

								<td>Currency</td>

								<td>
									<select name="currency" id="currency" class="span3">
										<option value="pound" <?php if ($this->_tpl_vars['currency'] == 'pound'): ?>selected<?php endif; ?>>Pound</option>
										<option value="euro" <?php if ($this->_tpl_vars['currency'] == 'euro'): ?>selected<?php endif; ?>>Euro</option>
										<option value="euro" <?php if ($this->_tpl_vars['currency'] == 'rupee'): ?>selected<?php endif; ?>>Rupee</option>
									</select>
								</td>

						    </tr>
							<!-- column for xls/xlsx article --->
							<tr>  
								<td style="vertical-align:top">Columns for XLS/XLSX Article (add comma(,) <br>seperated for multiple)</td>
								<td>
								  <textarea name="column_xls" id="column_xls"><?php echo $this->_tpl_vars['column_xls']; ?>
</textarea>
								</td>
							</tr>
						</table>
					</div>
				</div> 
				
				<div class="w-box">
					<div class="w-box-header">NOTIFICATIONS</div>
					<div class='w-box-content'>
						<table align="center" cellpadding="4" cellspacing="4" width="78%">  
							<tr>
								<td colspan="2"><strong>Do you want to be warned when:</strong></td>
							</tr>
							<tr>
								<td width="50%">A writer sends an article on the platform ?</td>
								<td>
									 <div id="writernotifycheck">
								  		<input type="checkbox" name="writer_notify" id="writer_notify" value="yes" <?php if ($this->_tpl_vars['writer_notify'] == 'yes'): ?>checked="checked"<?php endif; ?>/>
								  	</div>
								</td>
						    </tr>
							<tr id="correctornotifyblock" <?php if ($this->_tpl_vars['correction'] != 'on'): ?>style="display:none"<?php endif; ?>>
								<td>A corrector sends an article on the platform ?</td>
								<td>
									 <div id="correctornotifycheck">
								  		<input type="checkbox" name="corrector_notify" id="corrector_notify" value="yes" <?php if ($this->_tpl_vars['corrector_notify'] == 'yes'): ?>checked="checked"<?php endif; ?>/>
								  	</div>
								</td>

						    </tr>
						    

						</table>

					</div>

				</div> 

	   			<div style="float:right;padding:30px">

	           		<button type="button" value="clear form" class="btn btn-info" onClick="window.location='/ao/ao-create1?submenuId=ML2-SL3&delsession=1'">Cancel</button>

					<button type="submit" value="Aller en Etape 2" class="btn btn-info" id="aoSubmit" onClick="return validate_aocreation_step1();">Go to Step 2</button>

	           	</div>

		</div>

	</div>
	<input type="hidden" name="eppercent" id="eppercent" value="<?php echo $this->_tpl_vars['eppercent']; ?>
"/>
	<input type="hidden" name="refusal_reasons_max" id="refusal_reasons_max" value="<?php echo $this->_tpl_vars['refusal_reasons_max']; ?>
"/>
</form>	



<!--   Add new user   -->

<div class="modal hide fade" id="newuser">

    <div class="modal-header">

        <button class="close" data-dismiss="modal" >&times;</button>

        <h3>ADDING A NEW CLIENT</h3>

    </div>

    <div class="modal-body">

		<form action="/ao/adduser?type=ao" id="newuserform" id="newuserform" method="post" >

			<table cellpadding="2" cellspacing="2" align="center">

				<tr>

					<td valign="top">Email</td>

					<td><span><input type="text" id="newemail" name="newemail"/></span></td>

				</tr>

				<tr>

					<td valign="top">Password</td>

					<td><span><input type="password" id="newpwd" name="newpwd"/></span></td>

				</tr>

				<tr>

					<td valign="top">Confirm Password</td>

					<td><span><input type="password" id="newcpwd" name="newcpwd" value=""/></span></td>

				</tr>

				<tr>

					<td valign="top">Name of client</td>

					<td><span><input type="text" id="company_name" name="company_name" value=""/></span></td>

				</tr>

				<tr>

					<td>&nbsp;</td>

					<td>

						<button type="submit" id="submit_pop_edit" name="submit_pop_edit" value="Add" class="btn btn-info" onClick="validate_newuser();">Add client</button>&nbsp;&nbsp;

					</td>

				</tr>

			</table>	

		</form>

    </div>

    <div class="modal-footer">

    </div>

</div>



<div class="modal hide fade" id="profileupdate">

    <div class="modal-header">

        <button class="close" data-dismiss="modal" onClick="closeModal();">&times;</button>

        <h3>UPDATE CLIENT PROFILE </h3>

    </div>

    <div class="modal-body" id="profileform">

	</div>

    <div class="modal-footer">

    </div>

</div>



<div id="fadeblock"></div>


