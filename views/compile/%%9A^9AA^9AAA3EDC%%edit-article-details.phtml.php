<?php /* Smarty version 2.6.19, created on 2016-03-16 08:53:40
         compiled from gebo/deliveryongoing/edit-article-details.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/deliveryongoing/edit-article-details.phtml', 352, false),array('modifier', 'utf8_encode', 'gebo/deliveryongoing/edit-article-details.phtml', 352, false),array('modifier', 'stripslashes', 'gebo/deliveryongoing/edit-article-details.phtml', 352, false),)), $this); ?>
<?php echo '
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/jquery.validate.min.js"></script>
<!--/BO/theme/gebo/lib/validation/jquery.validate.min.js-->
<script type="text/javascript" >
var upload_spec=true;
var maxval = '; ?>
"<?php echo $this->_tpl_vars['ArticleDetails'][0]['price_max']; ?>
"<?php echo ';
var max2val = '; ?>
"<?php echo $this->_tpl_vars['ArticleDetails'][0]['correction_pricemax']; ?>
"<?php echo ';
var ao_type = '; ?>
"<?php echo $this->_tpl_vars['ArticleDetails'][0]['AOtype']; ?>
"<?php echo ';
var artid = '; ?>
"<?php echo $this->_tpl_vars['ArticleDetails'][0]['id']; ?>
"<?php echo ';
var ctype = '; ?>
"<?php echo $this->_tpl_vars['ArticleDetails'][0]['correction_type']; ?>
"<?php echo ';
var writing_cost = '; ?>
"<?php echo $this->_tpl_vars['ArticleDetails'][0]['writing']; ?>
"<?php echo ';
var files_pack = '; ?>
"<?php echo $this->_tpl_vars['ArticleDetails'][0]['files_pack']; ?>
"<?php echo ';
var correction_cost = '; ?>
"<?php echo $this->_tpl_vars['ArticleDetails'][0]['proofreading']; ?>
"<?php echo ';
var conversion='; ?>
"<?php echo $this->_tpl_vars['ArticleDetails'][0]['conversion']; ?>
"<?php echo ';
/*edited by naseer on 04.12.2015 */
var product = '; ?>
"<?php echo $this->_tpl_vars['ArticleDetails'][0]['product']; ?>
"<?php echo ';

   $(document).ready(function() {
	   
		if(ao_type=="private")
		{
			var viewtovalue = "";
			$(\'input[name="view_to[]"]:checked\').each(function(){
				viewtovalue += $(this).val()+",";			
			});	
			if(product==\'translation\')
				var sourcecheck=$("input[name=\'sourcelang_nocheck\']:checked").val();
			else
				var sourcecheck=\'\';
				
			$.ajax({
				url:\'/deliveryongoing/loadusers\',
				data:{\'artid\':artid,\'type\':"contributors",\'product\':product,\'profiletype\':viewtovalue,\'sourcecheck\':sourcecheck},
				 beforeSend: function() {
					$("#writers_filter").html(\'Please wait loading ...\');
				},
				success:function(data)
				{
					$("#writers_filter").html(data);
					$("#favcontribcheck").chosen({ allow_single_deselect: true,search_contains: true });
					/* $("#favcontribcheck").multiselect({
						includeSelectAllOption: true,
						nonSelectedText:\'Select contributors\',
						numberDisplayed: 1,
						buttonWidth:\'360px\',
						maxHeight: 200,
						enableCaseInsensitiveFiltering: true
					});*/
				}
			})
		}
		
		if(ctype=="private")
		{
			var correctorviewto = "";
			$(\'input[name="corrector_list[]"]:checked\').each(function(){
				correctorviewto += $(this).val()+",";			
			});		
			
			if(product==\'translation\')
				var sourcecorrectioncheck=$("input[name=\'sourcelang_nocheck_correction\']:checked").val();
			else
				var sourcecorrectioncheck=\'\';
				
				
			$.ajax({
				url:\'/deliveryongoing/loadusers\',
				data:{\'artid\':artid,\'type\':"correctors",\'product\':product,\'profiletype\':correctorviewto,\'sourcecorrectioncheck\':sourcecorrectioncheck},
				beforeSend: function() {
					$("#correctors_filter").html(\'Please wait loading ...\');
				},
				success:function(data)
				{
					$("#correctors_filter").html(data);
					$("#favcorrectorcheck").chosen({ allow_single_deselect: true,search_contains: true });
					/* $("#favcorrectorcheck").multiselect({
						includeSelectAllOption: true,
						nonSelectedText:\'Select correctors\',
						numberDisplayed: 1,
						buttonWidth:\'360px\',
						maxHeight: 200,
						enableCaseInsensitiveFiltering: true
					}); */
				}
			})
		}
   
		$("#language").chosen({ allow_single_deselect: true,search_contains: true });
		$("#language_filter").chosen();
		$("#clanguage_filter").chosen();
		
		$("#category").chosen({ allow_single_deselect: true,search_contains: true });
		$("#type").chosen({disable_search: true });
		$("#signtype").chosen({disable_search: true });
		//$("#favcontribcheck").chosen();
		//$("#favcorrectorcheck").chosen();
		
		$(\'#nomoderation_check\').toggleButtons({label:{enabled: "Oui",disabled: "Non"}}); 
		
		$(".uni_style").uniform();	
		$(".cselect").chosen({ allow_single_deselect: true,search_contains: true });
		
		$(\'#correctioncheck\').toggleButtons({
			label:{enabled: "Oui",disabled: "Non"},
			onChange: function () {
				var type=$("input[name=\'correction\']:checked").val();
				if(type=="on")
				{
					$("#correction_details").show();
					if(!$("#correction_file").val())
					{
						upload_spec = false;
						$("#editao").removeClass("hide");
					}						
				}
				else
				{
					$("#correction_details").hide();
					$("#editao").addClass("hide");
				}
			}
		}); 
		if(maxval=="")
			maxval = 0;
		if(max2val=="")
			max2val = 0;
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
						price_min:{
								required: true,
								max: maxval
								},	
						price_max:{
								required: true,
								max: (parseFloat(files_pack)*parseFloat(writing_cost)*parseFloat(conversion)).toFixed(2)
								},
                        correction_pricemin:{
								required: true,
								max: max2val
								},	
                        correction_pricemax:{
								required: true,
								max: (parseFloat(files_pack)*parseFloat(correction_cost)*parseFloat(conversion)).toFixed(2)
								},
						participation_time:"required",
						correction_jc_submission:{
							min:0.1
						},
						correction_sc_submission:{
							min:0.1
						},
						correction_sc_resubmission:{
							min:0.1
						},
						correction_jc_resubmission:{
							min:0.1
						},
						subjunior_time:{
							min:0.1
						},junior_time:{
							min:0.1
						},senior_time:{
							min:0.1
						},jc0_resubmission:{
							min:0.1
						},
						jc_resubmission:{
							min:0.1
						},
						sc_resubmission:{
							min:0.1
						},
						selection_time:"required",
						correction_selection_time:"required",
						files_pack:"required",
						contrib_percentage:"required"
					},
				submitHandler: function(form) {
					if($("input[name=\'correction\']:checked").val()=="on")
					{
						if(upload_spec)
						form.submit();
					}
					else
						form.submit();
				}
		});
		
		$(\'#correction_pricemax\').blur(function() {
		   var mx = parseInt($(this).val());
		   $("#correction_pricemin").rules("add", {
			   max: mx
		   });  
		});
		
		$(\'#price_max\').blur(function() {
		   var mx = parseInt($(this).val());
		   $("#price_min").rules("add", {
			   max: mx
		   });  
		});
		
		$("#files_pack").keyup(function(){
			var files_pack = $(this).val();
			var max_writer_price = files_pack*parseFloat(writing_cost);	
			max_writer_price = max_writer_price.toFixed(2);	
			$("#price_max").val(max_writer_price);
			if(parseFloat($("#price_min").val())>max_writer_price)
				$("#price_min").val(\'0\');
			$("#price_min").rules("add", {
			   max: max_writer_price
		   });
		   $("#price_max").rules("add", {
			   max: max_writer_price
		   });  
			var max_corrector_price = files_pack*parseFloat(correction_cost);	
			max_corrector_price = max_corrector_price.toFixed(2);	
			$("#correction_pricemax").val(max_corrector_price);
			 $("#correction_pricemin").rules("add", {
			   max: max_corrector_price
		   });  
		   if(parseFloat($("#correction_pricemin").val())>max_corrector_price)
				$("#correction_pricemin").val(\'0\');
		   $("#correction_pricemax").rules("add", {
			   max: max_corrector_price
		   });  
		});
		
		if($("#correction_pricemax").val()==0)
			$("#correction_pricemax").val(files_pack*parseFloat(correction_cost));

		$(\'#sourcelang_nocheckbox\').toggleButtons({
	 	label:{enabled: "Oui",disabled: "Non"},
		onChange: function () {
			clickviewto();
		}
		});
      // $(\'#sourcelang_nocheckbox\').toggleButtons({label:{enabled: "Oui",disabled: "Non"}});
	  $(\'#sourcelang_nocheckbox_correction\').toggleButtons({
	 	label:{enabled: "Oui",disabled: "Non"},
		onChange: function () {
			clickcorrectorlist();
		}
		});
      // $(\'#sourcelang_nocheckbox_correction\').toggleButtons({label:{enabled: "Oui",disabled: "Non"}});
	   
	   
		
   });
   
   function clickviewto()
   {
			var value = "";
			$(\'input[name="view_to[]"]:checked\').each(function(){
				value += $(this).val()+",";			
			});		
			
			if(product==\'translation\')
				var sourcecheck=$("input[name=\'sourcelang_nocheck\']:checked").val();
			else
				var sourcecheck=\'\';
				
			$.ajax({
				url:\'/deliveryongoing/loadusers\',
				data:{\'artid\':artid,\'type\':"contributors",\'product\':product,\'profiletype\':value,\'sourcecheck\':sourcecheck},
				 beforeSend: function() {
					$("#writers_filter").html(\'Please wait loading ...\');
				},
				success:function(data)
				{
					$("#writers_filter").html(data);
					$("#favcontribcheck").chosen({ allow_single_deselect: true,search_contains: true });
				}
			});
   }
   
   function clickcorrectorlist()
   {
			var corrvalue = "";
			$(\'input[name="corrector_list[]"]:checked\').each(function(){
				corrvalue += $(this).val()+",";			
			});		
			
			if(product==\'translation\')
				var sourcecorrectioncheck=$("input[name=\'sourcelang_nocheck_correction\']:checked").val();
			else
				var sourcecorrectioncheck=\'\';
				//alert(corrvalue);
			$.ajax({
				url:\'/deliveryongoing/loadusers\',
				data:{\'artid\':artid,\'type\':"correctors",\'product\':product,\'profiletype\':corrvalue,\'sourcecorrectioncheck\':sourcecorrectioncheck},
				beforeSend: function() {
					$("#correctors_filter").html(\'Please wait loading ...\');
				},
				success:function(data)
				{
					$("#correctors_filter").html(data);
					$("#favcorrectorcheck").chosen({ allow_single_deselect: true,search_contains: true });
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
			<form class="form-horizontal form_validation_ttip" enctype="multipart/form-data" method="POST" name="edit_articleform" id="edit_articleform" action="/deliveryongoing/save-article">
				<fieldset>
					<div class="control-group formSep">
						<label class="control-label">Titre de l&rsquo;article<span class="f_req">*</span></label>
						<div class="controls">
							<span><input type="text" name="title" style="text-transform: none;" id="title" class="input-xlarge" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" /></span>
						</div>
					</div>
					<div class="control-group formSep">
											<label class="control-label">Type de contributeurs <span class="f_req">*</span></label>
						<div class="controls form-inline">
							<label class="uni-radio">
								<input type="checkbox" value="sc"  name="view_to[]" class="uni_style" <?php if (in_array ( 'sc' , $this->_tpl_vars['article']['view_to'] )): ?>checked<?php endif; ?> <?php if ($this->_tpl_vars['article']['participation_expires'] > time() || $this->_tpl_vars['article']['writer_selection']): ?>disabled<?php else: ?>onclick="clickviewto();"<?php endif; ?> />
								Senior 
							</label>
							<label class="uni-radio">
								<input type="checkbox" value="jc" name="view_to[]" class="uni_style" <?php if (in_array ( 'jc' , $this->_tpl_vars['article']['view_to'] )): ?>checked<?php endif; ?> <?php if ($this->_tpl_vars['article']['participation_expires'] > time() || $this->_tpl_vars['article']['writer_selection']): ?>disabled<?php else: ?>onclick="clickviewto();"<?php endif; ?>  />
								Junior 
							</label>						
							
							<?php if ($this->_tpl_vars['article']['product'] != 'translation'): ?>
							<label class="uni-checkbox">
								<input type="checkbox" value="jc0" name="view_to[]" class="uni_style" <?php if (in_array ( 'jc0' , $this->_tpl_vars['article']['view_to'] )): ?>checked<?php endif; ?> <?php if ($this->_tpl_vars['article']['participation_expires'] > time() || $this->_tpl_vars['article']['writer_selection']): ?>disabled<?php else: ?>onclick="clickviewto();"<?php endif; ?> />
								Debutants 
							</label>		
							<?php endif; ?>	
						</div>
					</div> 
										<?php if ($this->_tpl_vars['article']['AOtype'] == 'private'): ?>
											<div class="control-group formSep">
						<label class="control-label">R&eacute;dacteur(s) / traducteur(s)<span class="f_req">*</span></label>
						<div class="controls" id="writers_filter">
						</div>
					</div>
					<?php endif; ?>	
										<div class="control-group formSep">
						<label class="control-label">Fourchette de prix pour la r&eacute;daction
						<span class="f_req">*</span></label>
						<div class="controls">
							<span style="vertical-align:top"><input type="text" placeholder="Min" value="<?php echo $this->_tpl_vars['article']['price_min']; ?>
" id="price_min" name="price_min" class="span2 number" 
							<?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> disabled <?php endif; ?> 
							/></span>
							<span style="vertical-align:middle"><input type="text" placeholder="Max" value="<?php echo $this->_tpl_vars['article']['price_max']; ?>
" <?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> disabled <?php endif; ?> id="price_max" name="price_max" class="span2 number"/></span>
							<span style="vertical-align:middle">&<?php echo $this->_tpl_vars['article']['currency']; ?>
;</span>
						</div>
					</div>
					<div class="control-group formSep">
						<label  class="control-label">D&eacute;lai du timing de participation <span class="f_req">*</span></label>
						<div class="controls">
						<?php if ($this->_tpl_vars['article']['correction_type'] == 'extern'): ?>
						<?php if (( $this->_tpl_vars['article']['correction_participationexpires'] > time() && $this->_tpl_vars['article']['totalcorrectpart'] ) || $this->_tpl_vars['corrector_selection']): ?>
							<?php $this->assign('correction', false); ?>
						<?php endif; ?>
					<?php else: ?>
						<?php if ($this->_tpl_vars['article']['correction_participationexpires'] > time()): ?><?php $this->assign('correction', false); ?><?php endif; ?>
					<?php endif; ?>
							<span><input type="text" name="participation_time" id="participation_time" class="span2" value="<?php echo $this->_tpl_vars['article']['participation_time']; ?>
" 
							<?php if (( $this->_tpl_vars['article']['participation_expires'] > time() || $this->_tpl_vars['article']['writer_selection'] ) || $this->_tpl_vars['correction']): ?>disabled<?php endif; ?> /></span> mins 					
						</div>
					</div>
					<div class="control-group formSep">
						<label  class="control-label">D&eacute;lai du timing de s&eacute;lection<span class="f_req">*</span></label>
						<div class="controls">
							<span><input type="text" name="selection_time" id="selection_time" class="span2" value="<?php echo $this->_tpl_vars['article']['selection_time']; ?>
" <?php if ($this->_tpl_vars['article']['participation_expires'] > time() || $this->_tpl_vars['article']['writer_selection']): ?>disabled<?php endif; ?>  /></span> mins 					
						</div>
					</div>
										<div class="row-fluid">
						<div class="control-group formSep">		
							<label class="control-label">D&eacute;lai d'envoi de l&rsquo;article<span class="f_req">*</span></label>
							<div class="controls">
								<div class="span3">
									JC0&nbsp;&nbsp;<input type="text" name="subjunior_time" id="subjunior_time" class="span7 validate[required]" value="<?php echo $this->_tpl_vars['article']['subjunior_time']; ?>
"
									<?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> disabled <?php endif; ?> 
									> 
								</div>
								<div class="span3" style="margin-left:0">
									&nbsp;JC&nbsp;&nbsp;&nbsp;<input type="text" name="junior_time" id="junior_time" class="span7 validate[required]" value="<?php echo $this->_tpl_vars['article']['junior_time']; ?>
" <?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> disabled <?php endif; ?> > 
								</div>
								<div class="span3" style="margin-left:0">
									SC&nbsp;&nbsp;<input type="text" name="senior_time" id="senior_time" class="span7 validate[required]" value="<?php echo $this->_tpl_vars['article']['senior_time']; ?>
" <?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> disabled <?php endif; ?> > 
								</div>
								<select id="submit_option" class="span3 cselect" style="width:90px" name="submit_option" <?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> disabled <?php endif; ?> >
									<option value="min" <?php if ($this->_tpl_vars['article']['submit_option'] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['article']['submit_option'] == 'hour' || $this->_tpl_vars['article']['submit_option'] == ""): ?>selected<?php endif; ?>>Heure(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['article']['submit_option'] == 'day'): ?>selected<?php endif; ?>>Jour(s)</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="control-group formSep">		
							<label class="control-label">D&eacute;lai de renvoi de l&rsquo;article<span class="f_req">*</span></label>
							<div class="controls">
								<div class="span3">
									JC0&nbsp;&nbsp;<input type="text" name="jc0_resubmission" id="jc0_resubmission" class="span7 validate[required]" value="<?php echo $this->_tpl_vars['article']['jc0_resubmission']; ?>
" <?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> disabled <?php endif; ?>> 
								</div>
								<div class="span3" style="margin-left:0">
									&nbsp;JC&nbsp;&nbsp;&nbsp;<input type="text" name="jc_resubmission" id="jc_resubmission" class="span7 validate[required]" value="<?php echo $this->_tpl_vars['article']['jc_resubmission']; ?>
" <?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> disabled <?php endif; ?>> 
								</div>
								<div class="span3" style="margin-left:0">
									SC&nbsp;&nbsp;<input type="text" name="sc_resubmission" id="sc_resubmission" class="span7 validate[required]" value="<?php echo $this->_tpl_vars['article']['sc_resubmission']; ?>
" <?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> disabled <?php endif; ?>> 
								</div>
								<select id="resubmit_option" class="span3 cselect" style="width:90px" name="resubmit_option" <?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> disabled <?php endif; ?>>
									<option value="min" <?php if ($this->_tpl_vars['article']['resubmit_option'] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['article']['resubmit_option'] == 'hour' || $this->_tpl_vars['article']['resubmit_option'] == ""): ?>selected<?php endif; ?>>Heure(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['article']['resubmit_option'] == 'day'): ?>selected<?php endif; ?>>Jour(s)</option>
								</select>
							</div>
						</div>
					</div>
					<div class="control-group formSep">		
						<label class="control-label">#Fichiers / Pack<span class="f_req">*</span></label>
						<div class="controls">
							<input type="text" name="files_pack" id="files_pack" class="span2 integer" value="<?php echo $this->_tpl_vars['article']['files_pack']; ?>
" <?php if (( $this->_tpl_vars['article']['totalpart'] > 0 && $this->_tpl_vars['article']['participation_expires'] > time() ) || $this->_tpl_vars['article']['writer_selection']): ?> readonly <?php endif; ?>  />
						</div>
					</div>
					<?php if ($this->_tpl_vars['artuserprice'] != 'NO'): ?>
                    <div class="control-group formSep">
                        <label class="control-label">Prix du r&eacute;dacteur s&eacute;lectionn&eacute; <span class="f_req">*</span></label>
                        <div class="controls">
                            
							<?php if ($this->_tpl_vars['artuserprice'][0]['status'] == 'published'): ?>
								<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
									<div class="input-append span2">
										<input type="text" placeholder="Writer price" value="<?php echo $this->_tpl_vars['artuserprice'][0]['price_user']; ?>
" id="price_writer" name="price_writer" class="span6"/>
										<span class="add-on">&<?php echo $this->_tpl_vars['article']['currency']; ?>
;</span> 
									</div>
								<?php else: ?>
									<div class="span1" style="margin-top:5px">   
										<?php echo $this->_tpl_vars['artuserprice'][0]['price_user']; ?>
 &<?php echo $this->_tpl_vars['article']['currency']; ?>
;
									</div>
								<?php endif; ?>
							<?php else: ?>
							<div class="input-append span2">
								<input type="text" placeholder="Writer price" value="<?php echo $this->_tpl_vars['artuserprice'][0]['price_user']; ?>
" id="price_writer" name="price_writer" class="span6"/>
								<span class="add-on">&<?php echo $this->_tpl_vars['article']['currency']; ?>
;</span> 
							</div>
							<?php endif; ?>
							
							<span style="display: block; height: 30px; float: left; margin-top: 5px;">( <?php echo ((is_array($_tmp=$this->_tpl_vars['artuserprice'][0]['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['artuserprice'][0]['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 )</span>
                            <input type="hidden" value="<?php echo $this->_tpl_vars['artuserprice'][0]['id']; ?>
" id="part_id" name="part_id" />
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['article']['product'] == 'translation'): ?>
					<div class="control-group formSep" style="margin-bottom:0">
                        <label class="control-label">Do not consider Source language</label>
                        <div class="controls">
                            <div id="sourcelang_nocheckbox">
                                <input type="checkbox" <?php if ($this->_tpl_vars['article']['sourcelang_nocheck'] == 'yes'): ?>checked<?php endif; ?> name="sourcelang_nocheck" value="yes" >
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
					<div class="control-group formSep" style="margin-bottom:0">
						<label class="control-label">Correction<span class="f_req">*</span></label>
						<div class="controls">
							<div class="toggle-check1" id="correctioncheck">
								<input type="checkbox" id="correction" name="correction" <?php if ($this->_tpl_vars['stage2'] == 'yes'): ?> disabled <?php endif; ?> <?php if ($this->_tpl_vars['article']['correction'] == 'yes'): ?>checked<?php endif; ?>>
							</div>
						</div>
						<input type="hidden" name="" id="correction_file" value="<?php echo $this->_tpl_vars['article']['correction_file']; ?>
" />
                        <?php if ($this->_tpl_vars['stage2'] == 'yes'): ?>
                            <input type="hidden"  value="<?php echo $this->_tpl_vars['article']['correction']; ?>
" id="correctiontype" name="correctiontype" />
                        <?php endif; ?>
					</div> 
					<div class="control-group formsep">
						<div class="controls">
							<div class="hide alert alert-error" id="editao">Aucun brief de correction trouv&eacute;, <a class="editable editable-click" href="/deliveryongoing/edit-ao?ao_id=<?php echo $this->_tpl_vars['article']['did']; ?>
&client_id=<?php echo $this->_tpl_vars['article']['clientid']; ?>
&art_id=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-toggle="modal" role="button" data-target="#edit_ao_modal" id="edit_ao">Cliquez-ici</a> pour l&rsquo;uploader.</div>
						</div>
					</div>
					<div id="correction_details" <?php if ($this->_tpl_vars['article']['correction'] != 'yes'): ?> style="display:none" <?php endif; ?>> 
						<div class="control-group formSep">
							<label class="control-label">Type de correcteurs<span class="f_req">*</span></label>
							<div class="controls form-inline">
								<label class="uni-radio">
									<input type="checkbox" value="sc"  name="corrector_list[]" class="uni_style" <?php if ($this->_tpl_vars['article']['corrector_list'] == 'CB' || $this->_tpl_vars['article']['corrector_list'] == 'CSC'): ?>checked<?php endif; ?> <?php if ($this->_tpl_vars['article']['correction_participationexpires'] > time() || $this->_tpl_vars['article']['corrector_selection']): ?>disabled<?php else: ?>onclick="clickcorrectorlist();"<?php endif; ?> />
									Senior 
								</label>
								<label class="uni-radio">
									<input type="checkbox" value="jc" name="corrector_list[]" class="uni_style" <?php if ($this->_tpl_vars['article']['corrector_list'] == 'CB' || $this->_tpl_vars['article']['corrector_list'] == 'CJC'): ?>checked<?php endif; ?> <?php if ($this->_tpl_vars['article']['correction_participationexpires'] > time() || $this->_tpl_vars['article']['corrector_selection']): ?>disabled<?php else: ?>onclick="clickcorrectorlist();"<?php endif; ?> />
									Junior 
								</label>											
							</div>
						</div> 
						<div class="control-group formSep">
							<label class="control-label">Fourchette de prix pour la correction<span class="f_req">*</span></label>
							<div class="controls">
								<span style="vertical-align:top"><input type="text" placeholder="Min"  
								<?php if ($this->_tpl_vars['article']['correction_type'] == 'extern'): ?>
									<?php if (( $this->_tpl_vars['article']['correction_participationexpires'] > time() && $this->_tpl_vars['article']['totalcorrectpart'] ) || $this->_tpl_vars['corrector_selection']): ?><?php $this->assign('corrector_price_status', 'disabled'); ?><?php echo $this->_tpl_vars['corrector_price_status']; ?>
<?php endif; ?>
								<?php else: ?>
									<?php if ($this->_tpl_vars['article']['correction_participationexpires'] > time()): ?><?php $this->assign('corrector_price_status', 'disabled'); ?><?php echo $this->_tpl_vars['corrector_price_status']; ?>
<?php endif; ?>
								<?php endif; ?>
									value="<?php echo $this->_tpl_vars['article']['correction_pricemin']; ?>
" id="correction_pricemin" name="correction_pricemin" class="span2"/></span>
								<span style="vertical-align:middle"><input type="text" placeholder="Max" <?php if ($this->_tpl_vars['article']['correction_pricemax']): ?>value="<?php echo $this->_tpl_vars['article']['correction_pricemax']; ?>
"<?php else: ?>value="0"<?php endif; ?> id="correction_pricemax" name="correction_pricemax" <?php echo $this->_tpl_vars['corrector_price_status']; ?>
 class="span2"/></span>
								<span style="vertical-align:middle">&<?php echo $this->_tpl_vars['article']['currency']; ?>
;</span>
							</div>
						</div>
						<div class="control-group formSep">
							<label  class="control-label">D&eacute;lai du timing de participation pour la correction<span class="f_req">*</span></label>
							<div class="controls">
								<span><input type="text" name="correction_participation" id="correction_participation" class="span2 digits required" value="<?php echo $this->_tpl_vars['article']['correction_participation']; ?>
" <?php if ($this->_tpl_vars['article']['correction_participationexpires'] > time() || $this->_tpl_vars['article']['corrector_selection']): ?>disabled<?php endif; ?> /></span> mins 					
							</div>
						</div>
						<div class="control-group formSep">
							<label  class="control-label">D&eacute;lai du timing de s&eacute;lection du correcteur<span class="f_req">*</span></label>
							<div class="controls">
								<span><input type="text" name="correction_selection_time" id="correction_selection_time" <?php if ($this->_tpl_vars['article']['correction_participationexpires'] > time() || $this->_tpl_vars['article']['corrector_selection']): ?>disabled<?php endif; ?> class="span2" value="<?php if ($this->_tpl_vars['article']['correction_selection_time']): ?><?php echo $this->_tpl_vars['article']['correction_selection_time']; ?>
<?php else: ?>60<?php endif; ?>"  /></span> mins 					
							</div>
						</div>
						<div class="control-group formSep">		
							<label class="control-label">D&eacute;lai d'envoi de l&rsquo;article pour le correcteur<span class="f_req">*</span></label>
							<div class="controls">
								<div class="span3" style="margin-left:0">
									&nbsp;JC&nbsp;&nbsp;&nbsp;<input type="text" name="correction_jc_submission" id="correction_jc_submission" class="span7 required" value="<?php echo $this->_tpl_vars['article']['correction_jc_submission']; ?>
" 
									<?php if (( $this->_tpl_vars['article']['correction_participationexpires'] > time() && $this->_tpl_vars['article']['totalcorrectpart'] ) || $this->_tpl_vars['corrector_selection']): ?>disabled<?php endif; ?>
									> 
								</div>
								<div class="span3" style="margin-left:0">
									SC&nbsp;&nbsp;<input type="text" name="correction_sc_submission" id="correction_sc_submission" class="span7 required" value="<?php echo $this->_tpl_vars['article']['correction_sc_submission']; ?>
" 
									<?php if (( $this->_tpl_vars['article']['correction_participationexpires'] > time() && $this->_tpl_vars['article']['totalcorrectpart'] ) || $this->_tpl_vars['corrector_selection']): ?>disabled<?php endif; ?>
									> 
								</div>
								<select id="correction_submit_option" class="span3 cselect" style="width:90px" name="correction_submit_option" <?php if (( $this->_tpl_vars['article']['correction_participationexpires'] > time() && $this->_tpl_vars['article']['totalcorrectpart'] ) || $this->_tpl_vars['corrector_selection']): ?>disabled<?php endif; ?>
								>
									<option value="min" <?php if ($this->_tpl_vars['article']['correction_submit_option'] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['article']['correction_submit_option'] == 'hour'): ?>selected<?php endif; ?>>Heure(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['article']['correction_submit_option'] == 'day'): ?>selected<?php endif; ?>>Jour(s)</option>
								</select>
							</div>
						</div>
						<div class="control-group formSep">		
							<label class="control-label">D&eacute;lai de renvoi de l&rsquo;article pour le correcteur<span class="f_req">*</span></label>
							<div class="controls">
								<div class="span3" style="margin-left:0">
									&nbsp;JC&nbsp;&nbsp;&nbsp;<input type="text" name="correction_jc_resubmission" id="correction_jc_resubmission" class="span7 required" value="<?php echo $this->_tpl_vars['article']['correction_jc_resubmission']; ?>
" 
									<?php if (( $this->_tpl_vars['article']['correction_participationexpires'] > time() && $this->_tpl_vars['article']['totalcorrectpart'] ) || $this->_tpl_vars['corrector_selection']): ?>disabled<?php endif; ?>
									> 
								</div>
								<div class="span3" style="margin-left:0">
									SC&nbsp;&nbsp;<input type="text" name="correction_sc_resubmission" id="correction_sc_resubmission" class="span7 required" value="<?php echo $this->_tpl_vars['article']['correction_sc_resubmission']; ?>
" 
									<?php if (( $this->_tpl_vars['article']['correction_participationexpires'] > time() && $this->_tpl_vars['article']['totalcorrectpart'] ) || $this->_tpl_vars['corrector_selection']): ?>disabled<?php endif; ?>
									> 
								</div>
								<select id="correction_resubmit_option" class="span3 cselect" style="width:90px" name="correction_resubmit_option" <?php if (( $this->_tpl_vars['article']['correction_participationexpires'] > time() && $this->_tpl_vars['article']['totalcorrectpart'] ) || $this->_tpl_vars['corrector_selection']): ?>disabled<?php endif; ?> >
									<option value="min" <?php if ($this->_tpl_vars['article']['correction_resubmit_option'] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>
									<option value="hour" <?php if ($this->_tpl_vars['article']['correction_resubmit_option'] == 'hour'): ?>selected<?php endif; ?>>Heure(s)</option>
									<option value="day" <?php if ($this->_tpl_vars['article']['correction_resubmit_option'] == 'day'): ?>selected<?php endif; ?>>Jour(s)</option>
								</select>
							</div>
						</div>
						<div class="control-group formSep">
							<label class="control-label">Mod&eacute;ration de la correction</label>
							<div class="controls">
								<div class="toggle-check1" id="nomoderation_check">
									<input type="checkbox" id="nomoderation" name="nomoderation" <?php if ($this->_tpl_vars['article']['nomoderation'] == 'no'): ?> checked<?php endif; ?>>
								</div>
							</div>							
						</div>
						<?php if ($this->_tpl_vars['article']['correction_type'] == 'private'): ?>
						<div class="control-group formSep">
							<label class="control-label">Correcteur(s)<span class="f_req">*</span></label>
							<div class="controls" id="correctors_filter">
															</div>
						</div>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['artcrtprice'] != 'NO'): ?>
                        <div class="control-group formSep">
                            <label class="control-label">Prix du correcteur s&eacute;lectionn&eacute;<span class="f_req">*</span></label>
                            <div class="controls">
								
								<?php if ($this->_tpl_vars['artuserprice'][0]['status'] == 'published'): ?>
									<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
										<div class="input-append span2">
											<input type="text" placeholder="Corrector price" value="<?php echo $this->_tpl_vars['artcrtprice'][0]['price_corrector']; ?>
" id="price_corrector" name="price_corrector" class="span6"/>
											<span class="add-on">&<?php echo $this->_tpl_vars['article']['currency']; ?>
;</span>
										</div>
									<?php else: ?>
										<div class="span1" style="margin-top:5px">   
											<?php echo $this->_tpl_vars['artcrtprice'][0]['price_corrector']; ?>
&nbsp; &<?php echo $this->_tpl_vars['article']['currency']; ?>
;
										</div>
									<?php endif; ?>
								<?php else: ?>
								<div class="input-append span2">
									<input type="text" placeholder="Corrector price" value="<?php echo $this->_tpl_vars['artcrtprice'][0]['price_corrector']; ?>
" id="price_corrector" name="price_corrector" class="span6"/>
									<span class="add-on">&<?php echo $this->_tpl_vars['article']['currency']; ?>
;</span>
								</div>		
								<?php endif; ?>
								
							<span style="display: block; height: 30px; float: left; margin-top: 5px;">( <?php echo ((is_array($_tmp=$this->_tpl_vars['artcrtprice'][0]['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['artcrtprice'][0]['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 )</span>
							<input type="hidden" value="<?php echo $this->_tpl_vars['artcrtprice'][0]['id']; ?>
" id="crtpart_id" name="crtpart_id" />	
							</div>	
                        </div>
                        <?php endif; ?>
						
						<?php if ($this->_tpl_vars['article']['product'] == 'translation'): ?>
                        <div class="control-group formSep" style="margin-bottom:0">
                            <label class="control-label">Do not consider Source language </label>
                            <div class="controls">
                                <div class="span6">
                                    <div id="sourcelang_nocheckbox_correction">
                                        <input type="checkbox" <?php if ($this->_tpl_vars['article']['sourcelang_nocheck_correction'] == 'yes'): ?>checked<?php endif; ?> name="sourcelang_nocheck_correction" value="yes">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
					</div>
					<input type="hidden" name="ao_id" value="<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
">
					<input type="hidden" name="article_id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
">
					<input type="hidden" name="client_id" value="<?php echo $this->_tpl_vars['article']['user_id']; ?>
">
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-gebo" type="submit">Update</button>
							<button class="btn" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>