<?php /* Smarty version 2.6.19, created on 2015-07-03 14:38:59
         compiled from gebo/quote/popup-edit-finalstep-details.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/quote/popup-edit-finalstep-details.phtml', 9, false),)), $this); ?>
<div class="row-fluid">
	<div class="span8">
		<form id="send_quote" class="form-horizontal" method="POST" action="/quote/save-edit-quote-final-step" enctype="multipart/form-data">
		<input type="hidden" value="<?php echo $_GET['quote_id']; ?>
" name="quote_id">
			<fieldset>					
				<div class="formSep control-group">
					<label for="bo_comments" class="control-label">Overall comment on this quote</label>
					<div class="controls">
						<textarea name="bo_comments" id="bo_comments" rows="8" class="validate[required] span12"><?php echo ((is_array($_tmp=$this->_tpl_vars['send_quote']['sales_comment'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</textarea>
					</div>
				</div>
								<div class="formSep control-group">
					<label for="quote_documents" class="control-label">Documents to download <span class="help-block">doc,xls,zip,docx,xlsx,dot,html,<br>pdf,jpg,png,xml,rar,ppt,pptx,csv</span></label>		
				<div class="controls">	
					<?php if ($this->_tpl_vars['send_quote']['documents']): ?>
						<input type="file" name="quote_documents[]"  id="upload" class="multi-file span5" accept="doc|xls|zip|docx|xlsx|dot|html|pdf|jpg|png|xml" />
						<div class="onsuccessrep">
							<?php echo $this->_tpl_vars['send_quote']['documents']; ?>

					<?php else: ?>
					<input type="file" name="quote_documents[]"  id="upload" class="multi-file span5" accept="doc|xls|zip|docx|xlsx" />
						<div class="onsuccessrep">
						<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button class="btn btn-gebo" name="update_quote" type="submit">Validate</button>
						<button class="btn" data-dismiss="modal" id="cancel">Cancel</button>
					</div>
				</div>
			</fieldset>	
		</form>	
	</div>
</div>
<?php echo '
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script>
 <style>
	.delete
	{
		color:#000;
		margin: 0 5px;
		cursor: pointer;
	}
 </style>
<script language="javascript">
	$(document).ready(function(){
		$("#send_quote").validationEngine();
		 $("input[type=file].multi-file").MultiFile();
		
		$(document).on("click",".delete",function(){
		var id_identifier = $(this).attr("rel");
			if(confirm("Are you sure? Want to delete this File"))
			{
				$(this).closest(".topset2").remove();
				$(".onsuccessrep").html("Please Wait Deleting File.");
				$.post("/quote/delete-document-quote",{"identifier":id_identifier,"type":"quote","from":"popup"},function(result){
					
					$(".onsuccessrep").html(result);
					if($.trim(result)=="")
					{
						$(".MultiFile-applied").addClass("validate[required]");
					}
				}); 
			}	
		});
	});
	
</script>
'; ?>