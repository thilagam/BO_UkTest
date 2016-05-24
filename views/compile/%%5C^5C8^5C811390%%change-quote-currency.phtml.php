<?php /* Smarty version 2.6.19, created on 2016-03-17 09:31:13
         compiled from gebo-new/quote/change-quote-currency.phtml */ ?>
<div class="modal-header modal-header-black">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title center-block">Select your currency</h4>
</div>
<div class="modal-body">
	<input type="hidden" id="quote_id" name="quote_id" value="<?php echo $_GET['quote_id']; ?>
"/>

		<div class="form-group">			
			<div class="controls">				
				<label class="radio">
					<span><input type="radio" value="<?php echo $this->_tpl_vars['currency_rates']['GBP']; ?>
" data-currency="pound" class="form-control currency" name="currency" data-toggle="radio">GBP</span>
				</label>
				<label class="radio">
					<span><input type="radio" value="<?php echo $this->_tpl_vars['currency_rates']['USD']; ?>
" data-currency="usd" class="form-control currency"  name="currency" data-toggle="radio">USD</span>
				</label>
			</div>
			<div class="controls" id="exchange_div" style="display:none">
				<label>Current rate</label>
				<div class="input-group  col-md-5">					
					<input type="text" class="form-control" value="" id="exchange_rate" name="exchange_rate">
					<div class="input-group-addon">&euro;</div>
				</div>
			</div>
		</div>		
		<div class="form-group">
			<div class="controls">
				<button  class="btn btn-primary" type="submit" id="download_xlsx" style="display:none">Download XLSX</button>
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
$(document).ready(function() {	
	
	$(".currency").radio();
	
	$(\'input[name="currency"]\').on(\'change\',function(){		
		
		if($(this).is(\':checked\'))
		{			
			var exchange_rate = $(this).val();
			$("#exchange_rate").val(exchange_rate);
			$("#exchange_div").show();
			$("#download_xlsx").show();
			
		}	
	}); 
	
	$("#download_xlsx").click(function(){
		
		var $radio = $(\'input[name=currency]:checked\');
		var exchange_rate = parseFloat($("#exchange_rate").val());
		var currency = $radio.attr(\'data-currency\');
		var quote_id=$("#quote_id").val();
		if(isNaN(exchange_rate))
		{
			swal(
				  \'\',
				  \'Please enter exchange rate properly\',
				  \'error\'
				);
		}
		else{
			var download_xlsx=\'/quote-new/download-quote-xls?quote_id=\'+quote_id+\'&currency=\'+currency+\'&exchange_rate=\'+exchange_rate;
			window.location=download_xlsx;
		}
		
		
	});
	

});
</script>

'; ?>