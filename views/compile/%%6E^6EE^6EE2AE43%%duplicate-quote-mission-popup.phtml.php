<?php /* Smarty version 2.6.19, created on 2016-04-04 15:29:19
         compiled from gebo-new/quote/duplicate-quote-mission-popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo-new/quote/duplicate-quote-mission-popup.phtml', 43, false),array('modifier', 'utf8_encode', 'gebo-new/quote/duplicate-quote-mission-popup.phtml', 76, false),)), $this); ?>
		<div class="col-md-12 center-block" style="background: #fff;">
							<p class="form-label text-center" >Duplicate Mission</p>
							<?php if ($_GET['mid'] != "" || $_GET['tid'] != ""): ?>	
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<?php endif; ?>										
						
							<form class="form-inline" id="duplicate_mission" >
							<?php if ($_GET['tid'] == ""): ?>	
							<div class="mission_element <?php if ($_GET['mid'] != ''): ?> <?php else: ?>hidden<?php endif; ?>">
							<input type="hidden" name="mid" id="mid" value="<?php echo $_GET['mid']; ?>
">
								<div class="col-md-12 text-center form-group">
									<lable class="form-group" >Please select the duplicate parameter
									</lable>								
								</div>
								<div class="col-md-7 pull-right">
								<select class="" id="dup_parameter">
											<option value="all_language">Language</option>
											<!--<option value="words">words</option>
											<option value="product_form">product</option>
											<option value="volume_form">volume</option>-->
										</select>
								</div>
								<div class="col-md-12 duplicate-form" id="all_language">
										<?php $_from = $this->_tpl_vars['ep_language_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['all_language'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['all_language']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lang_key'] => $this->_tpl_vars['all_language']):
        $this->_foreach['all_language']['iteration']++;
?>
										<div class="check-duplicate col-md-2 pull-left">
										<label class="text-uppercase checkbox checkbox-inline">
											<input type="checkbox" name="duplicatelang[]" id="duplicatelang[<?php echo $this->_tpl_vars['lang_key']; ?>
]" class="icheck-input-checkbox quote-miss" value="<?php echo $this->_tpl_vars['lang_key']; ?>
"><?php echo $this->_tpl_vars['all_language']; ?>

										</label>	
										</div>
										<?php endforeach; endif; unset($_from); ?>
									</div>
									<div class="col-md-12 duplicate-form hidden" id="words">
									<p class="form-label2" >nb words</p>
										<div class="form-group">
											<input type="text" name="duplicate_words" id="duplicate_words" class="validate[required,custom[number]] input-small" value="">
										</div>
									</div>
									<div class="col-md-12 duplicate-form hidden" id="product_form">
										<p class="form-label2" >select product</p>
										<div class="form-group">
											<select name="duplicate_producttype" id="duplicate_producttype" class="" data-placeholder="Select Produit">
											<option></option>
											<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['producttype_array']), $this);?>

											</select>
											<div id="producttypeotherdiv"  style="display: none;">
												<input type="text" class="span12 validate[required]" value="" id="duplicate_producttypeother" name="duplicate_producttypeother">
											</div>
										</div>
									</div>
									<div class="col-md-12 duplicate-form hidden" id="volume_form">
										<p class="form-label2" >Enter Volume</p>
										<div class="form-group">
											<input name="duplicate_volume" id="duplicate_volume" class=" validate[required,custom[number]] input-small" type="text" value="">
										</div>
									</div>
									</div>
								<?php endif; ?>	
								<?php if ($_GET['tid'] != "" || $_GET['mid'] == ""): ?>
								<div class="tech_element <?php if ($_GET['tid'] != ''): ?> <?php else: ?>hidden<?php endif; ?>">
								<input type="hidden" name="tid" id="tid" value="<?php echo $_GET['tid']; ?>
">
								<input type="hidden" name="techduplicate" id="techduplicate" value="duplicate">
								<?php if ($this->_tpl_vars['prodmissionDetails']): ?>
								<input type="hidden" name="prod_mission_selected_val" id="prod_mission_selected_val" value="<?php echo $this->_tpl_vars['prodmissionDetails']; ?>
">
								<?php endif; ?>
								<div class="col-md-12 text-center form-group">
									<lable class="form-group" >Please select the duplicate parameter</lable>
										<select class="" id="dup_parameter">
										<option value="all_title">Title</option>
										</select>
									
								</div>
								<div class="col-md-12 duplicate-form" id="all_title">
									<?php $_from = $this->_tpl_vars['tech_mission_title']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['title_array'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['title_array']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['title_array']):
        $this->_foreach['title_array']['iteration']++;
?>
									<div class="form-group check-duplicate col-md-3 pull-left">
									<label class="text-uppercase  checkbox checkbox-inline">
										<input type="checkbox" name="duplicatetitle[]" id="duplicatetitle[<?php echo $this->_tpl_vars['title_array']['tid']; ?>
]" class=" icheck-input-checkbox" value="<?php echo $this->_tpl_vars['title_array']['tid']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['title_array']['tech_title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

									</label>
									</div>
									<?php endforeach; endif; unset($_from); ?>
									</div>
								</div>
								</form>
							
							

							<?php endif; ?>
							<div class="col-md-12 text-center" id="submit">
										<a class='btn btn-fill text-uppercase' id="validate_duplicate" type='button' name='Validate' title='Validate'>Validate</a>
									</div>
		</div>
			

<?php echo '
<script type="">
/* $(\'input.icheck-input-radio\').iCheck({
		checkboxClass: \'icheckbox_square-blue\',
		radioClass: \'iradio_square-blue\'		
	}); */
	$(\'input.icheck-input-checkbox\').checkbox();
$(document).ready(function(){

	var quote_id=\''; ?>
<?php echo $_GET['quote_id']; ?>
<?php echo '\';
	$(\'#dup_parameter\').selectpicker();
	$(\'#duplicate_producttype\').selectpicker();
		$("#dup_parameter").on("change",function(){
			selectedval=$(this).val();
			$(".duplicate-form").addClass(\'hidden\');
			$("#"+selectedval).removeClass(\'hidden\');

		});
		var mid=$("#mid").val(); 
		var tid=$("#tid").val();
		var techduplicate=$(\'#techduplicate\').val();
		//alert($(\'.tech_element\').is(\'.hidden\'));
		if(mid!=\'\' && mid!=undefined)
		{
			$(\'.icheck-input-checkbox\').checkbox();
		$("body").on(\'click\',"#validate_duplicate",function(){
			//alert(\'test1\');
		$(this).attr(\'disabled\',\'disabled\');
			$.ajax({
				url:\'/quote-new/save-quote-mission?parameter=duplicate&misssion=create&quote_id=\'+quote_id,
				type:\'POST\',
				data:$(\'#duplicate_mission\').serialize(),
				success:function(html){
				//alert(html);
				location.reload(); 
				//$(location).attr(\'href\',\'/quote-new/create-quote-mission-view\');
				}
			});
		});
		}
		else if(tid!=\'\' && tid!=undefined && techduplicate==\'duplicate\')
		{
			//alert(\'test2\');
			$(\'.icheck-input-checkbox\').checkbox();
			techtitlerestrict();
		$("body").on(\'click\',"#validate_duplicate",function(){
			$(this).attr(\'disabled\',\'disabled\');
			$.ajax({
				url:\'/quote-new/save-quote-mission?quote_id=\'+quote_id,
				type:\'POST\',
				data:$(\'#duplicate_mission\').serialize(),
				success:function(html){
				//	alert(html);
				location.reload();
				//$(location).attr(\'href\',\'/quote-new/create-quote-mission-view\');
				}
			});
		});
		}	
		else if((mid==\'\' || mid==undefined) && techduplicate==\'duplicate\')
		{

			
		$("body").on(\'click\',"#validate_duplicate",function(){
			$(this).attr(\'disabled\',\'disabled\');
			if($(\'input.quote-miss:checked\').length==0)
			{
				$(\'.icheck-input-checkbox\').checkbox();
				techtitlerestrict();
				path=\'/quote-new/save-quote-mission?parameter=techduplicatenew&quote_id=\'+quote_id;
			}
			else
			{
				path=\'/quote-new/save-quote-mission?parameter=duplicatenew&quote_id=\'+quote_id;
			}
			
			$.ajax({
				url:path,
				type:\'POST\',
				data:$(\'#create_quote_mission, #duplicate_mission\').serialize(),
				success:function(html){
					//alert(html);
					location.reload();
				//$(location).attr(\'href\',\'/quote-new/create-quote-mission-view\');
				}
			});
		});
		}	
		
			
		
		
});

function techtitlerestrict()
{

 prod_mission_val=$(\'#prod_mission_selected_val\').val();

 	if(prod_mission_val==undefined)
 		$(\'#create_quote_mission > #prod_mission_selected\').val();
	
				if(prod_mission_val)
				{
					techtitleval=$(\'#tech_type\').val();
					if(techtitleval !="")
					{
					techtypeid="&typeid="+$(\'#tech_type\').attr(\'rel\');	
					}
					else
					{
					techtypeid="";
					}
					 	
					/*var target_page = "/quote-new/tech-title-select?prod_mission_val="+prod_mission_val+techtypeid+"&duplicatenew=yes";
					$.post(target_page, function(data){	
						var select = $(\'#all_title\');
						select.empty().html(data);
						$(\'input.icheck-input-radio\').iCheck({
								checkboxClass: \'icheckbox_square-blue\',
								radioClass: \'iradio_square-blue\'		
							});
						$(\'input.icheck-input-radio\').iCheck(\'update\');
						});	 */
				}
}
</script>
<style type="text/css">
.check-duplicate
{
	font-weight: bold;
	text-align: left;
	height: 43px;
}
.form-label2{
	color: #fff;
}
input{
	color:#555;
}
#mission-step{
	overflow: auto;
}
#mission-step > .modal-dialog{
width:100%;
height:100%
}
</style>
'; ?>

