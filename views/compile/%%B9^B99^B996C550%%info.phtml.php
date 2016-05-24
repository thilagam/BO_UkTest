<?php /* Smarty version 2.6.19, created on 2015-07-03 11:38:27
         compiled from gebo/survey/info.phtml */ ?>
<aside>
	<div class="aside-bg">							
		<div class="aside-block" id="selected-client">
			<div class="editor-container">
				<h2 class="heading">Info client</h2>
				<img title="<?php echo $this->_tpl_vars['quoteMission']['company_name']; ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['quoteMission']['client_id']; ?>
/<?php echo $this->_tpl_vars['quoteMission']['client_id']; ?>
_global.png?12345">
				<p class="editor-name"><?php echo $this->_tpl_vars['quoteMission']['company_name']; ?>
</p>
				<p class="editor-info">
				Turnover : <?php echo $this->_tpl_vars['quoteMission']['ca_number']; ?>
<br>
				Category : <?php echo $this->_tpl_vars['quoteMission']['quote_category']; ?>
<br><br>				
				</p>
			</div>
		</div>	
		<div class="aside-block" id="selected-bouser">
			<div class="editor-container">
				<h2 class="heading">Sales Owner</h2>
				<img title="<?php echo $this->_tpl_vars['quote_details']['sales_owner']; ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['quoteMission']['quote_by']; ?>
/logo.jpg">
				<p class="editor-name"><a><?php echo $this->_tpl_vars['quoteMission']['sales_owner']; ?>
</a></p>
				<p class="editor-info">
				<?php if ($this->_tpl_vars['quoteMission']['sales_phone_number']): ?>
				Phone number: <?php echo $this->_tpl_vars['quoteMission']['sales_phone_number']; ?>
<br/>
				<?php endif; ?>
				<?php echo $this->_tpl_vars['quoteMission']['sales_city']; ?>

				</p>
			</div>
		</div>	
		<div class="aside-block" id="selected-bouser">
			<div class="editor-container">
				<h2 class="heading">Related Contract</h2>
				<p class="editor-name"><a><?php echo $this->_tpl_vars['quoteMission']['contractname']; ?>
</a></p>
			</div>
		</div>	
	</div>
</aside>