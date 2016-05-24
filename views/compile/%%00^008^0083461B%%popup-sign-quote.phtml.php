<?php /* Smarty version 2.6.19, created on 2016-03-14 15:25:01
         compiled from gebo-new/quote/popup-sign-quote.phtml */ ?>
<div class="modal-header modal-header-black">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title center-block">Signer devis</h4>
</div>
<div class="modal-body">	 
<form action="/quote-new/sign-quote/" method="post" id="sign-quote-form">
	<input type="hidden" name="quote_id" id="signquoteid" value="<?php echo $this->_tpl_vars['qid']; ?>
"/>

		<div class="form-group">
			<label>Siret</label>
			<div class="controls">
				<input type="text" class="form-control <?php if ($this->_tpl_vars['siret_applicable'] != 'yes'): ?> validate[required] <?php endif; ?>" id="siret" value="<?php echo $this->_tpl_vars['siret']; ?>
" name="siret">
				<label class="checkbox">
					<span><input type="checkbox" value="yes" id="siret_applicable" class="form-control" <?php if ($this->_tpl_vars['siret_applicable'] == 'yes'): ?> checked <?php endif; ?> name="siret_applicable" data-toggle="checkbox">Siret not applicable</span>
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Num&eacute;ro du client<span class="f_req">*</span></label>
			<div class="controls">
			<?php if ($this->_tpl_vars['ca_number']): ?>
				<input type="text" class="form-control validate[required,minSize[4],maxSize[8],funcCall[checkclientcode],ajax[ajaxClientNoValidate]]" id="ca_number" value="<?php echo $this->_tpl_vars['ca_number']; ?>
" name="client_code" >			<?php else: ?>	
				<input type="text" class="form-control validate[required,minSize[4],maxSize[4],funcCall[checkclientcode],ajax[ajaxClientNoValidate]]" id="ca_number" value="C" name="client_code">
			<?php endif; ?>				
				<input type="hidden" value="<?php echo $this->_tpl_vars['client_id']; ?>
" id="user_id" name="user_id"  />
			</div>
		</div>
		<div class="form-group">
			<div class="controls">
				<button id="valid-sign-old" class="btn btn-primary" type="submit">Valider</button>
				<button  class="btn" data-dismiss="modal" type="reset">Annuler</button>
			</div>
		</div>
	</form>
</div>

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
	//if(cexists || c_codeexists)
	if(cexists)
	{
		var character = "C";
		//var re = /^[c|C]\\d{3}$/g; 
		var re = /(^[c|C]\\d{3}$)|(^[c|C]\\d{3}_new?$)/gi; 
		var scharacter = "or CXXX_new";
	}
	else
	{
		//var character = "P";
		//var re = /^[p|P]\\d{3}$/g; 
		
		var character = "C";
		var re = /^[c|C]\\d{3}$/g; 
	}
	
	var str = $.trim(field.val());
	var m;
	 
	if ((m = re.exec(str)) === null) {
		return "Code should be in format "+character+"XXX "+scharacter+" where XXX are numbers";
	} 
	//return "Number should be in format PXXX or CXXX";
}

$(document).ready(function() {	
	
	$("#siret_applicable").checkbox();
	$("#sign-quote-form").validationEngine({
		onValidationComplete: function(form, valid){
			 if (valid===true) {
				
				var msg = "Assurez-vous que le contrat signe par le client est mis sur Workplace.";
				var alertinfo = false;
				
				swal(
					{
						title: "",
						text: msg,
						type: "warning",						
						confirmButtonText: "Oui",
						cancelButtonText: "Non",
						showCancelButton: true,
						showConfirmButton:true
					},function(isConfirm){
						if (isConfirm){
							$("#sign-quote-form").validationEngine(\'detach\');
							$("#sign-quote-form").submit();
						}
						else{
							var target_page=\'/quote/create-client?uaction=edit&client_id=\'+client_identifier+\'&submenuId=ML13-SL1&from=validated\';
							window.location.href =target_page;
							return false;
						}
								
					}
				);	

			}
        }
	});

	var client_identifier=\''; ?>
<?php echo $this->_tpl_vars['client_identifier']; ?>
<?php echo '\';

	$("#siret_applicable").click(function(){

		if($("#siret_applicable:checked").length)

			$("#siret").removeClass(\'validate[required]\');

		else

			$("#siret").addClass(\'validate[required]\');

	});

	$( "body" ).on(\'click\',"#valid-sign", function () {

		var msg = "Assurez-vous que le contrat signe par le client est mis sur Workplace.";
		//var valid=$("#sign-quote-form").validationEngine(\'validate\');
		//alert(valid);
		//if(valid==true)
		//{
			swal(
					{
						title: "",
						text: msg,
						type: "warning",						
						confirmButtonText: "Oui",
						cancelButtonText: "Non",
						showCancelButton: true,
						showConfirmButton:true
					},function(isConfirm){
						if (isConfirm){
							$(\'#sign-quote-form\').submit();
						}
						else{
							var target_page=\'/quote/create-client?uaction=edit&client_id=\'+client_identifier+\'&submenuId=ML13-SL1&from=validated\';
							window.location.href =target_page;
						}
								
					}
				);
			

		//}	

	});

});		

</script>

'; ?>