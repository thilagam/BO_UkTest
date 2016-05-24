<?php /* Smarty version 2.6.19, created on 2016-03-17 11:40:34
         compiled from gebo/quote/quote-download-xls.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/quote-download-xls.phtml', 1, false),array('modifier', 'strip_tags', 'gebo/quote/quote-download-xls.phtml', 28, false),array('modifier', 'lower', 'gebo/quote/quote-download-xls.phtml', 33, false),array('modifier', 'ucfirst', 'gebo/quote/quote-download-xls.phtml', 33, false),array('modifier', 'utf8_decode', 'gebo/quote/quote-download-xls.phtml', 106, false),array('modifier', 'num_format', 'gebo/quote/quote-download-xls.phtml', 119, false),array('modifier', 'date_format', 'gebo/quote/quote-download-xls.phtml', 270, false),)), $this); ?>
<?php if (count($this->_tpl_vars['quoteDetails']) > 0): ?>
	<?php $_from = $this->_tpl_vars['quoteDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quote'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quote']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quote']):
        $this->_foreach['quote']['iteration']++;
?>
		<table>
			<tr>
				<td align="left" colspan="9"><img src="/BO/theme/gebo/img/edit-place.png"></td>
			</tr>
		</table>	
		<table>
			<tr><td colspan="9"></td></tr>
		</table>	
		<table border="1" width="100%">
			<tr>
				<td colspan="2"><?php echo $this->_tpl_vars['quote']['client_code']; ?>
</td>
				<td align="center" colspan="5"  style="font-size:22px;"><b>Quote / Purchase Order</b></td>
				<td colspan="2"></td>
			</tr>
			<tr>
				<td style="font-size:14px;" colspan="2"><b>EDIT-PLACE UK</b></td>				
				<td colspan="5" align="center"></td>				
				<td style="font-size:16px;" colspan="2"><b><?php echo $this->_tpl_vars['quote']['company_name']; ?>
<b></td>
			</tr>
			
			<tr><td colspan="9"></td></tr>
			
			<tr>
				<td colspan="2">67-70 Charlotte Road </td>
				<td colspan="5"></td>
				<td colspan="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['address'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
			</tr>
			<tr>
				<td>London</td><td>EC2A 3PE</td>
				<td colspan="5"></td>
				<td><?php echo $this->_tpl_vars['quote']['zipcode']; ?>
</td>  <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote']['city'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</td>
			</tr>
			<tr>
				<td colspan="2">UK</td>
				<td colspan="5"></td>
				<td colspan="2"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote']['country_name'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</td>
			</tr>			
			<tr><td colspan="9"></td></tr>
			
			<tr>
				<td colspan="2"><u>Commercial Contact</u></td>
				<td colspan="5"></td>
				<td colspan="2"><u>Commercial Contact</u></td>
			</tr>
			<tr>
				<td colspan="2"><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
</td>
				<td colspan="5"></td>
				<td colspan="2"><?php echo $this->_tpl_vars['quote']['client_contact_name']; ?>
</td>
			</tr>
			<tr>
				<td colspan="2"><a href="mailto:mgaude@edit-place.com"><?php echo $this->_tpl_vars['quote']['email']; ?>
</a></td>
				<td colspan="5"></td>
				<td colspan="2"><a href="mailto:<?php echo $this->_tpl_vars['quote']['client_contact_email']; ?>
"><?php echo $this->_tpl_vars['quote']['client_contact_email']; ?>
</a></td>
			</tr>	
			<tr>
				<td colspan="2">&nbsp;<?php echo $this->_tpl_vars['quote']['phone_number']; ?>
</td>
				<td colspan="5"></td>
				<td colspan="2">&nbsp;<?php echo $this->_tpl_vars['quote']['client_contact_phone']; ?>
</td>
			</tr>
			<tr><td colspan="9"></td></tr>
			<tr>
				<td colspan="2"><u>Financial Contact</u></td>
				<td colspan="5"></td>
				<td>Start date</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2"><a href="mailto:comptabilite@edit-place.com">comptabilite@edit-place.com</a></td>
				<td colspan="5"></td>
				<td>End date</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2">44 20 3302 7440</td>
				<td colspan="5"></td>
				<td>Duration</td>
				<td><?php echo $this->_tpl_vars['quote']['total_duration']; ?>
 working <?php echo $this->_tpl_vars['quote']['final_mission_length_option']; ?>
</td>
			</tr>		
		</table>
		<table>
			<tr><td colspan="9"></td></tr>
			<tr><td colspan="9"></td></tr>
		</table>
		<table border="1" width="100%">
			<tr>
				<td bgcolor="#F2F2F2"><b>Ref</b></td>
				<td bgcolor="#F2F2F2" colspan="3"><b>Project type</b></td>
				<td bgcolor="#F2F2F2"><b>Product</b></td>
				<td bgcolor="#F2F2F2"><b>No. or words</b></td>
				<td bgcolor="#F2F2F2"><b>Quantity</b></td>
				<td bgcolor="#F2F2F2"><b>Price</b></td>
				<td bgcolor="#F2F2F2"><b>TOTAL</b></td>
			</tr>	
			<?php if (count($this->_tpl_vars['quote']['mission_details']) > 0): ?>
				<?php $this->assign('ref_number', 0); ?>
				<?php $_from = $this->_tpl_vars['quote']['mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>							
					<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>	
					<?php if ($this->_tpl_vars['mission']['before_prod'] == 'yes'): ?><?php $this->assign('before_prod', true); ?><?php endif; ?>					
					<?php if ($this->_tpl_vars['mission']['package'] != 'user'): ?>						
						<?php $this->assign('ref_number', $this->_tpl_vars['ref_number']+1); ?>
						<tr>	
							<td align="left"><?php echo $this->_tpl_vars['ref_number']; ?>
</td>							
								<?php if ($this->_tpl_vars['mission']['product'] == 'smo_audit' || $this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'content_strategy'): ?>
									<td colspan="3"><?php echo $this->_tpl_vars['mission']['product_name']; ?>
 in <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_source_name'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
 <?php if ($this->_tpl_vars['mission']['before_prod'] == 'yes'): ?>*<?php endif; ?></td>
								<?php else: ?>
									<td colspan="3"><?php echo $this->_tpl_vars['mission']['product_name']; ?>
 in <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_source_name'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?> - <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_dest_name'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
<?php endif; ?> <?php echo $this->_tpl_vars['mission']['product_type_other']; ?>
 <?php if ($this->_tpl_vars['mission']['before_prod'] == 'yes'): ?>*<?php endif; ?></td>
								<?php endif; ?>							
							
								<?php if ($this->_tpl_vars['mission']['product'] == 'smo_audit' || $this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'content_strategy'): ?>
									<td><?php echo $this->_tpl_vars['mission']['product_name']; ?>
</td>
								<?php else: ?>
									<td><?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
</td>
								<?php endif; ?>
							
							<td align="right"><?php if ($this->_tpl_vars['mission']['product'] == 'smo_audit' || $this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'content_strategy'): ?>-<?php else: ?><?php echo $this->_tpl_vars['mission']['nb_words']; ?>
<?php endif; ?></td>
							<td align="right"><?php echo $this->_tpl_vars['mission']['volume']; ?>
</td>
							<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?><?php if ($this->_tpl_vars['mission']['free_mission'] == 'yes'): ?>FREE in &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 <?php else: ?> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 <?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['mission']['free_mission'] == 'yes'): ?>FREE in <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?><?php endif; ?></td>
							<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?>&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?></td>
						</tr>
						<?php if ($this->_tpl_vars['mission']['package'] == 'team'): ?>
							<?php $this->assign('ref_number', $this->_tpl_vars['ref_number']+1); ?>
							<tr>
								<td align="left"><?php echo $this->_tpl_vars['ref_number']; ?>
</td>								
									<?php if ($this->_tpl_vars['mission']['product'] == 'smo_audit' || $this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'content_strategy'): ?>
										<?php $this->assign('missionType', $this->_tpl_vars['mission']['product_name']); ?>
										<td colspan="3"><?php echo $this->_tpl_vars['mission']['product_name']; ?>
 in <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_source_name'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
 - Staffing - Pack of <?php echo $this->_tpl_vars['mission']['team_packs']; ?>
 CVs</td>
									<?php else: ?>
										<?php $this->assign('missionType', $this->_tpl_vars['mission']['product_type_name']); ?>
										<td colspan="3"><?php echo $this->_tpl_vars['mission']['product_name']; ?>
 in <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_source_name'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>- <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_dest_name'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
<?php endif; ?> <?php echo $this->_tpl_vars['mission']['product_type_other']; ?>
 - Staffing - Pack of <?php echo $this->_tpl_vars['mission']['team_packs']; ?>
 CVs</td>
									<?php endif; ?>								
								<td><?php echo $this->_tpl_vars['missionType']; ?>
</td>
								<td align="right"><?php if ($this->_tpl_vars['mission']['product'] == 'smo_audit' || $this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'content_strategy'): ?>-<?php else: ?><?php echo $this->_tpl_vars['mission']['nb_words']; ?>
<?php endif; ?></td>
								<td align="right"><?php echo $this->_tpl_vars['mission']['team_packs']; ?>
</td>
								<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?><?php if ($this->_tpl_vars['mission']['free_mission'] == 'yes'): ?>FREE in &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['team_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 <?php else: ?> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['team_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['mission']['free_mission'] == 'yes'): ?>FREE in <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['team_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['team_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?><?php endif; ?></td>
								<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?>&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['team_package_turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['team_package_turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?></td>
							</tr>
						<?php endif; ?>
					<?php elseif ($this->_tpl_vars['mission']['package'] == 'user'): ?>
						<?php $this->assign('ref_number', $this->_tpl_vars['ref_number']+1); ?>
						<tr>
							<td align="left"><?php echo $this->_tpl_vars['ref_number']; ?>
</td>
							
								<?php if ($this->_tpl_vars['mission']['product'] == 'smo_audit' || $this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'content_strategy'): ?>
									<?php $this->assign('missionType', $this->_tpl_vars['mission']['product_name']); ?>
									<td colspan="3"><?php echo $this->_tpl_vars['mission']['product_name']; ?>
 in <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_source_name'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
 - Number of profiles <?php echo $this->_tpl_vars['mission']['required_writes']; ?>
</td>
								<?php else: ?>
									<?php $this->assign('missionType', $this->_tpl_vars['mission']['product_type_name']); ?>
									<td colspan="3"><?php echo $this->_tpl_vars['mission']['product_name']; ?>
 in <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_source_name'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>- <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['language_dest_name'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
<?php endif; ?> <?php echo $this->_tpl_vars['mission']['product_type_other']; ?>
 - Number of profiles <?php echo $this->_tpl_vars['mission']['required_writes']; ?>
</td>
									
								<?php endif; ?>							
							<td><?php echo $this->_tpl_vars['missionType']; ?>
</td>
							<td align="right"><?php if ($this->_tpl_vars['mission']['product'] == 'smo_audit' || $this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'content_strategy'): ?>-<?php else: ?><?php echo $this->_tpl_vars['mission']['nb_words']; ?>
<?php endif; ?></td>
							<td align="right"><?php echo $this->_tpl_vars['mission']['required_writes']; ?>
</td>
							<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?><?php if ($this->_tpl_vars['mission']['free_mission'] == 'yes'): ?>FREE in  &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;  <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['user_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
<?php else: ?> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['user_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 <?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['mission']['free_mission'] == 'yes'): ?>FREE in <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['user_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['user_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?><?php endif; ?></td>
							<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?>&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['user_package_turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['user_package_turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
			<?php if (count($this->_tpl_vars['quote']['tech_mission_details']) > 0): ?>
				<?php $_from = $this->_tpl_vars['quote']['tech_mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmission']):
        $this->_foreach['tmission']['iteration']++;
?>					
				<?php if ($this->_tpl_vars['tmission']['before_prod'] == 'yes'): ?><?php $this->assign('before_prod', true); ?><?php endif; ?>					
					<?php if ($this->_tpl_vars['tmission']['package'] != 'user'): ?>						
						<?php $this->assign('ref_number', $this->_tpl_vars['ref_number']+1); ?>
						<tr>	
							<td align="left"><?php echo $this->_tpl_vars['ref_number']; ?>
</td>
							<td colspan="3"><?php echo $this->_tpl_vars['tmission']['title']; ?>
<?php if ($this->_tpl_vars['tmission']['before_prod'] == 'yes'): ?>*<?php endif; ?></td>
							<td>Technical mission</td>
							<td align="right">-</td>
							<td align="right"><?php echo $this->_tpl_vars['tmission']['volume']; ?>
</td>
							<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?><?php if ($this->_tpl_vars['tmission']['free_mission'] == 'yes'): ?>FREE in &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;  <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['unit_price'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 <?php else: ?>&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['unit_price'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['tmission']['free_mission'] == 'yes'): ?>FREE in <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['unit_price'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['unit_price'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?><?php endif; ?></td>
							<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?>&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 <?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?></td>
						</tr>						
						<?php if ($this->_tpl_vars['tmission']['package'] == 'team'): ?>
							<?php $this->assign('ref_number', $this->_tpl_vars['ref_number']+1); ?>							
							<tr>
								<td align="left"><?php echo $this->_tpl_vars['ref_number']; ?>
</td>
								<td colspan="3"><?php echo $this->_tpl_vars['tmission']['title']; ?>
 - Pack of <?php echo $this->_tpl_vars['tmission']['team_packs']; ?>
 CVs</td>
								<td>Technical mission</td>
								<td align="right">-</td>
								<td align="right"><?php echo $this->_tpl_vars['tmission']['team_packs']; ?>
</td>
								<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?><?php if ($this->_tpl_vars['tmission']['free_mission'] == 'yes'): ?>FREE in &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['team_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 <?php else: ?>&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['team_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 <?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['tmission']['free_mission'] == 'yes'): ?>FREE in <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['team_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['team_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?><?php endif; ?></td>
								<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?>&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['team_package_turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['team_package_turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?></td>									
							</tr>
						<?php endif; ?>
					<?php elseif ($this->_tpl_vars['tmission']['package'] == 'user'): ?>
						<?php $this->assign('ref_number', $this->_tpl_vars['ref_number']+1); ?>	
						<tr>
							<td align="left"><?php echo $this->_tpl_vars['ref_number']; ?>
</td>
							<td colspan="3"><?php echo $this->_tpl_vars['tmission']['title']; ?>
 - Number of profiles <?php echo $this->_tpl_vars['tmission']['required_writes']; ?>
</td>
							<td>Technical mission</td>
							<td align="right">-</td>
							<td align="right"><?php echo $this->_tpl_vars['tmission']['required_writes']; ?>
</td>
							<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?><?php if ($this->_tpl_vars['tmission']['free_mission'] == 'yes'): ?>FREE in &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['user_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 <?php else: ?> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['user_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['tmission']['free_mission'] == 'yes'): ?>FREE in <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['user_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['user_fee'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?><?php endif; ?></td>
							<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?>&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['user_package_turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
<?php else: ?>	<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['user_package_turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
			<tr><td colspan="9"></td></tr>
			
			<tr>
				<td colspan="2">Advance payment 30%</td>
				<td colspan="2">no</td>
				<td>Time to launch project</td>
				<td><?php echo $this->_tpl_vars['quote']['total_staff_setup_time']; ?>
 working <?php echo $this->_tpl_vars['quote']['final_mission_length_option']; ?>
</td>
				<td></td>
				<td><b>TOTAL EXCL. VAT</td></td>
				<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?>&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['final_turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['final_turnover'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?></td>
			</tr>
			<tr>
				<td colspan="2">Payment term</td>
				<td colspan="2">30 days from invoice date</td>
				<td>Delivery time</td>
				<td><?php echo $this->_tpl_vars['quote']['total_delivery_time']; ?>
 working <?php echo $this->_tpl_vars['quote']['final_mission_length_option']; ?>
</td>
				<td></td>
				<td><b>VAT</td></td>
				<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?>&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['tva'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['tva'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?></td>
			</tr>
			<tr>
				<td colspan="7"></td>
				<td><b>TOTAL INC. VAT</td></td>
				<td align="right"><?php if ($this->_tpl_vars['currency'] == 'usd'): ?>&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['total_htc'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['total_htc'])) ? $this->_run_mod_handler('num_format', true, $_tmp, 2) : smarty_modifier_num_format($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<?php endif; ?></td>
			</tr>
		</table>			
		<?php if ($this->_tpl_vars['before_prod'] == 'yes'): ?>
			<table>
				<tr>
					<td colspan="9">*This mission must be completed in order to start production</td>
				</tr>
			</table>
		<?php endif; ?>
		<table>
			<tr>
				<td align="center" bgcolor="#F2F2F2" colspan="9">Comments</td>
			</tr>
			<tr><td colspan="9"></td></tr>
			<tr><td colspan="9" align="center" rowspan="3" height="50px">Insert your comments here</td></tr>
			<tr><td colspan="9"></td></tr>
			<tr><td colspan="9"></td></tr>
			<tr><td colspan="9"></td></tr>
		</table>
		<table><tr><td colspan="9"></td></tr></table>
		<table><tr><td colspan="9"></td></tr></table>
		<table><tr><td colspan="9"></td></tr></table>
		<table>
			<tr>
				<td align="center" colspan="9">The prices quoted in this document are valid for 21 days, once the PO has been signed the prices are fixed</td>
			</tr>
			<tr>
				<td align="center" colspan="9">Before starting the project you must sign and date both the T&S and the purchase order.</td>
			</tr>
		</table>
		<table><tr><td colspan="9"></td></tr></table>
		<table><tr><td colspan="9"></td></tr></table>
		<table>
			<tr>
				<td colspan="2"><b>Edit-Place signature and stamp</b></td>
				<td colspan="5"></td>
				<td colspan="2"><b>Customer signature and date</b></td>
			</tr>
			<tr>
				<td colspan="2">Read and approved</td>
				<td colspan="5"></td>
				<td colspan="2">Read and approved</td>
			</tr>
			<tr>
				<td colspan="2"><b><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</b></td>
				<td colspan="5"></td>
				<td colspan="2"></td>
			</tr>				
		</table>
		<table><tr><td colspan="9"></td></tr></table>
		<table><tr><td colspan="9"></td></tr></table>
		<table><tr><td colspan="9"></td></tr></table>
		<table><tr><td colspan="9"></td></tr></table>
		<table>
				
				<tr><td colspan="9" align="center" style="font-size:10px;">EDIT-PLACE UK Ltd - 67-70 Charlotte Road, London EC2A 3PE - Tel. +44 (0) 20 3302 4494</td></tr>
				<tr><td colspan="9" align="center" style="font-size:10px;">Registered under the laws of England and Wales: #8610398 - VAT NUMBER : 182 0572 18</td></tr>						
		</table>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>