<?php /* Smarty version 2.6.19, created on 2016-04-04 09:24:32
         compiled from gebo-new/quote/header.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut_t', 'gebo-new/quote/header.phtml', 69, false),array('modifier', 'count', 'gebo-new/quote/header.phtml', 78, false),)), $this); ?>
<?php echo '
<script type="text/javascript" src="/BO/theme/lbd/js/ulSelect.js"></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script language="javascript">
/*client turnover calculation*/
var quote_id=\''; ?>
<?php echo $_GET['quote_id']; ?>
<?php echo '\';
function clientturnovercal(year,client_id)
{
	$.ajax({
		type: \'GET\',
		url: \'/quote-new/client-turnover\',
		data: \'quote_id=\'+quote_id+\'&year=\' + year + \'&client_id=\' +client_id,			  
		success: function(data)
		{
		$(\'#ca_turnover\').html(data);
		}
	});  
}
$(document).ready(function(){
	
		$(\'#listeContact\').ulSelect();
		
		$(\'#listeContact li\').click(function(e) 
		{ 
			var contact_client=$(this).attr(\'data-id\');
			var target="/quote-new/update-contact-client?contact_client="+contact_client+\'&quote_id=\'+quote_id;
			$.post(target);
		});	
});

</script>
'; ?>

<div class="row" id="quote-header">

			<div class="col-md-3 border-header">			
				<div class="wrapListContact">
					<div class="quoteHeaderClient">
						<img width="72" class="img-client-logo" alt="" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['create_step1']['client_id']; ?>
/<?php echo $this->_tpl_vars['create_step1']['client_id']; ?>
_global.png?f=12345">
						<p class="quoteHeaderName"><?php echo $this->_tpl_vars['create_step1']['company_name']; ?>
</p>
						<p class="quoteHeaderCode">Client code: <?php echo $this->_tpl_vars['create_step1']['client_code']; ?>
</p>
						<p class="quoteHeaderURL"><a target="_client" href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['create_step1']['client_id']; ?>
&submenuId=ML13-SL1">Show profile</a></p>
				</div>	
			</div>
		</div>

			<div class="col-md-3 border-header">
				<div class="wrapListContact tweets">
					<div class="quoteHeaderTitle"><i class="fa fa-twitter"></i>Recent tweets</div>
				<?php if ($this->_tpl_vars['create_step1']['twitter_screen_name']): ?>
					<a class="twitter-timeline"  href="https://twitter.com/<?php echo $this->_tpl_vars['create_step1']['twitter_screen_name']; ?>
"  height="180" data-tweet-limit="3" data-chrome="nofooter noheader transparent"  data-screen-name="<?php echo $this->_tpl_vars['create_step1']['twitter_screen_name']; ?>
" data-widget-id="699969857945604096">Tweets by @<?php echo $this->_tpl_vars['create_step1']['twitter_screen_name']; ?>
</a>
				<?php endif; ?>	
			
				</div>
			</div>


			<div class="col-md-3 border-header" >
				<div class="wrapListContact turnover">
					<div class="form-inline">
						
						<select name="year" id="year" class="btn btn-default btn-xs" onchange="clientturnovercal(this.value,'<?php echo $this->_tpl_vars['create_step1']['client_id']; ?>
')">				
							<option value="">TURNOVER</option>	
							<option value="2014">TURNOVER 2014</option>	
							<option value="2015">TURNOVER 2015</option>
							<option value="2016" selected>TURNOVER 2016</option>
						</select>
						<br>				
					</div>				
					<p id="ca_turnover"><?php echo ((is_array($_tmp=$this->_tpl_vars['create_step1']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp) : smarty_modifier_zero_cut_t($_tmp)); ?>
.<?php echo $this->_tpl_vars['create_step1']['turnover1']; ?>
 &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</p>										
					<div class="quoteHeaderURL"><a href="/quote-new/sales-quotes-list?client_id=<?php echo $this->_tpl_vars['create_step1']['client_id']; ?>
&submenuId=ML13-SL2" target="_clientQuotes">All quotes of the client</a></div>
				</div>
			</div>


			<div class="col-md-3">
				<div class="wrapListContact">
					<div class="quoteHeaderTitle">Contacts(<a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['create_step1']['client_id']; ?>
&submenuId=ML13-SL1" target="_blank">Update</a>)</div>
				<?php if (count($this->_tpl_vars['create_step1']['clientContacts']) > 0): ?>
					<ul id="listeContact">
					<?php $_from = $this->_tpl_vars['create_step1']['clientContacts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['clientContacts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['clientContacts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['clientContact']):
        $this->_foreach['clientContacts']['iteration']++;
?>						
						<li data-id="<?php echo $this->_tpl_vars['clientContact']['identifier']; ?>
" <?php if ($this->_tpl_vars['create_step1']['contact_client'] == $this->_tpl_vars['clientContact']['identifier']): ?> class="active" <?php endif; ?> >
							<div class="listeContactTitle">
								<?php echo $this->_tpl_vars['clientContact']['first_name']; ?>

							</div>
							<div class="listeContactInfo">
								<?php echo $this->_tpl_vars['clientContact']['job_title']; ?>
 <br>
								<?php echo $this->_tpl_vars['clientContact']['email']; ?>

							</div>
						</li>
					<?php endforeach; endif; unset($_from); ?>
					</ul>
				<?php else: ?>
					<strong>No Contacts Available</strong>
				<?php endif; ?>
				</div>
			</div>
		</div>		
	</div>