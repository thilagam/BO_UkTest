<?php /* Smarty version 2.6.19, created on 2015-12-08 13:27:19
         compiled from gebo/quote/sign-quote.phtml */ ?>
<form action="/quote/sign-quote/" class="form-horizontal" method="post" id="sign-quote-form">

	<input type="hidden" name="quote_id" id="signquoteid" value="<?php echo $this->_tpl_vars['qid']; ?>
" />

	<section>

		<div class="row-fluid topset2">

			<div class="control-group">

				<label class="control-label">Siret</label>

				<div class="controls">

					<input type="text" class="<?php if ($this->_tpl_vars['siret_applicable'] != 'yes'): ?> validate[required] <?php endif; ?>" id="siret" value="<?php echo $this->_tpl_vars['siret']; ?>
" name="siret">

					<label class="checkbox">

						<span><input type="checkbox" value="yes" id="siret_applicable" class="" <?php if ($this->_tpl_vars['siret_applicable'] == 'yes'): ?> checked <?php endif; ?> name="siret_applicable">Siret not applicable</span>

					</label>

				</div>

			</div>

			<div class="control-group">

				<label class="control-label">Client number<span class="f_req">*</span></label>

				<div class="controls">

				<?php if ($this->_tpl_vars['ca_number']): ?>
					<input type="text" class="validate[required,minSize[4],maxSize[8],funcCall[checkclientcode],ajax[ajaxClientNoValidate]]" id="ca_number" value="<?php echo $this->_tpl_vars['ca_number']; ?>
" name="client_code" >
				<?php else: ?>	
					<input type="text" class="validate[required,minSize[4],maxSize[4],funcCall[checkclientcode],ajax[ajaxClientNoValidate]]" id="ca_number" value="C" name="client_code">
				<?php endif; ?>
					
					<input type="hidden" value="<?php echo $this->_tpl_vars['client_id']; ?>
" id="user_id" name="user_id"  />

				</div>

			</div>

			<div class="control-group">

				<div class="controls">

					<button id="valid-sign-old" class="btn btn-primary" type="submit">Validate</button>

					<button  class="btn" data-dismiss="modal" type="reset">Cancel</button>

				</div>

			</div>

		</div>

	</section>

</form>

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
		return "Code should be in format "+character+"XXX where XXX are numbers";
	} 
	//return "Number should be in format PXXX or CXXX";
}

$(document).ready(function() {

	$("#sign-quote-form").validationEngine({
		onValidationComplete: function(form, valid){
			 if (valid===true) {
				
               var msg = "Can you confirm the client\'s information before signing the quote ? Click on no to edit before signing";
			   var alertinfo = false;
				smoke.confirm(msg,function(e){
					if (e)
					{
						$("#sign-quote-form").validationEngine(\'detach\');
						$("#sign-quote-form").submit();
					}
					else
					{
						var target_page=\'/quote/create-client?uaction=edit&client_id=\'+client_identifier+\'&submenuId=ML13-SL1&from=validated\';
						window.location.href =target_page;
						return false;
					}

					},{"ok":"Oui","cancel":"Non"});

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

	$( "#valid-sign" ).live(\'click\', function () {

		var msg = "Can you confirm the client\'s information before signing the quote ? Click on no to edit before signing";
		//var valid=$("#sign-quote-form").validationEngine(\'validate\');
		//alert(valid);
		//if(valid==true)
		//{
			smoke.confirm(msg,function(e){

				if (e)
				{

					$(\'#sign-quote-form\').submit();

				}
				else
				{

					var target_page=\'/quote/create-client?uaction=edit&client_id=\'+client_identifier+\'&submenuId=ML13-SL1&from=validated\';

					window.location.href =target_page;

				}

			},{"ok":"Oui","cancel":"Non"});

		//}	

	});

});		

</script>

'; ?>