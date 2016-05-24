<?php /* Smarty version 2.6.19, created on 2016-03-14 15:42:18
         compiled from gebo-new/quote/history-mission-details-popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo-new/quote/history-mission-details-popup.phtml', 33, false),array('modifier', 'zero_cut', 'gebo-new/quote/history-mission-details-popup.phtml', 37, false),array('modifier', 'replace', 'gebo-new/quote/history-mission-details-popup.phtml', 44, false),array('modifier', 'date_format', 'gebo-new/quote/history-mission-details-popup.phtml', 54, false),array('function', 'math', 'gebo-new/quote/history-mission-details-popup.phtml', 40, false),)), $this); ?>
<?php echo '
<style>
.hm-titles{
	color: #959595;    
    font-size: 12px;
    font-weight: 700;
    left: 15px;
    letter-spacing: 1px;    
    text-transform: uppercase;    
}

.hm-text{
	color: #5B5B5C;    
    font-size: 11px;
    font-weight: 700;
    left: 15px;
    letter-spacing: 1px;    
    text-transform: uppercase;
    top: 15px;
}

.separator{
	border-bottom: 1px solid #d6d7d9;	
	padding-bottom: 5px;
}

</style>
'; ?>



<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	 <h4 class="modal-title">Mission de <?php echo ((is_array($_tmp=$this->_tpl_vars['historyMission']['product_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 / <?php echo $this->_tpl_vars['historyMission']['product_type_name']; ?>
 / <?php echo $this->_tpl_vars['historyMission']['nb_words']; ?>
 Mots</h4>
	 <p class="grey-text text-uppercase"><?php echo ((is_array($_tmp=$this->_tpl_vars['historyMission']['language_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php if ($this->_tpl_vars['historyMission']['product'] == 'translation'): ?> <i class="glyphicon glyphicon-chevron-right"></i> <?php echo ((is_array($_tmp=$this->_tpl_vars['historyMission']['languagedest_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php endif; ?></p>	
	 <p class="text-uppercase row"> <span class="col-md-6"><?php echo $this->_tpl_vars['historyMission']['company_name']; ?>
</span><span class="col-md-6">Total : 
	 <?php if ($_GET['show'] == 'theorical'): ?>	
	 <?php echo ((is_array($_tmp=$this->_tpl_vars['historyMission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 <?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['historyMission']['real_unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
<?php endif; ?>  &<?php echo $this->_tpl_vars['historyMission']['currency']; ?>
;</span>
	 <br>
	 <?php if ($_GET['show'] == 'theorical'): ?>	
	 	<?php echo smarty_function_math(array('assign' => 'price_per_word','equation' => '(v/y)','v' => $this->_tpl_vars['historyMission']['unit_price'],'y' => $this->_tpl_vars['historyMission']['nb_words'],'format' => '%.3f'), $this);?>
 
	 <?php else: ?>
	 	<?php echo smarty_function_math(array('assign' => 'price_per_word','equation' => '(a/b)','a' => $this->_tpl_vars['historyMission']['real_unit_price'],'b' => $this->_tpl_vars['historyMission']['nb_words'],'format' => '%.3f'), $this);?>
 
	 <?php endif; ?>
	 <span class="col-md-6 pull-right">Price per word : <?php if ($this->_tpl_vars['price_per_word']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['price_per_word'])) ? $this->_run_mod_handler('replace', true, $_tmp, '.', ',') : smarty_modifier_replace($_tmp, '.', ',')); ?>
 <?php else: ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['price_per_word'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 <?php endif; ?> &<?php echo $this->_tpl_vars['historyMission']['currency']; ?>
;</span>
	 </p>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-8">
		
		<?php if ($this->_tpl_vars['historyMission']['quotecontractid']): ?>
		<span><?php echo $this->_tpl_vars['historyMission']['contractname']; ?>
</span>
			<?php if ($this->_tpl_vars['from_site'] == 'fr'): ?>
				<a href="<?php echo $this->_tpl_vars['crossDomain']; ?>
/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['historyMission']['quotecontractid']; ?>
&action=view" target="_blank">Signed contract</a> <strong>(<?php echo ((is_array($_tmp=$this->_tpl_vars['historyMission']['signaturedate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
)</strong>
			<?php else: ?>
				<a href="/contractmission/contract-edit?submenuId=ML13-SL3&contract_id=<?php echo $this->_tpl_vars['historyMission']['quotecontractid']; ?>
&action=view" target="_blank">Signed contract</a> <strong>(<?php echo ((is_array($_tmp=$this->_tpl_vars['historyMission']['signaturedate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
)</strong>
			<?php endif; ?>	
		<?php else: ?>
		<span><?php echo ((is_array($_tmp=$this->_tpl_vars['historyMission']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</span>
			<?php if ($this->_tpl_vars['from_site'] == 'fr'): ?>
				<a href="<?php echo $this->_tpl_vars['crossDomain']; ?>
/quote/quote-followup?quote_id=<?php echo $this->_tpl_vars['historyMission']['quote_id']; ?>
&submenuId=ML13-SL2" target="_blank">Signed quote</a> <strong>(<?php echo ((is_array($_tmp=$this->_tpl_vars['historyMission']['signed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
)</strong>
			<?php else: ?>
				<a href="/quote/quote-followup?quote_id=<?php echo $this->_tpl_vars['historyMission']['quote_id']; ?>
&submenuId=ML13-SL2" target="_blank">Signed quote</a> <strong>(<?php echo ((is_array($_tmp=$this->_tpl_vars['historyMission']['signed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
)</strong>
			<?php endif; ?>	
		<?php endif; ?>

			
		
			<h4 class="hm-titles">SCHEDULE</h4>
			<div class="col-md-12">
				<span class="hm-text">
				<?php if ($this->_tpl_vars['historyMission']['oneshot'] == 'no'): ?>
					<?php echo $this->_tpl_vars['historyMission']['volume_max']; ?>
 <?php echo $this->_tpl_vars['historyMission']['tempo_text']; ?>
 <?php echo $this->_tpl_vars['historyMission']['delivery_volume_option_text']; ?>
 <?php echo $this->_tpl_vars['historyMission']['tempo_length']; ?>
 <?php echo $this->_tpl_vars['historyMission']['tempo_length_option_text']; ?>

				<?php else: ?>
					One shot : <?php echo $this->_tpl_vars['historyMission']['volume']; ?>

				<?php endif; ?>
				</span>
			</div>
			<div class="row col-md-12">
				<h4 class="hm-titles">Total Delivery : <?php echo $this->_tpl_vars['historyMission']['published_articles']; ?>
 art. | <?php echo $this->_tpl_vars['historyMission']['mission_length']; ?>
 <?php echo $this->_tpl_vars['historyMission']['mission_length_option_text']; ?>
</h4>
			</div>
		</div>
		<div class="col-md-4">
			<h4 class="hm-titles separator">STAFFING</h4>
			<div class="col-md-12 separator">
				<i class="glyphicon glyphicon-hourglass"></i> <span class="hm-text"><?php echo $this->_tpl_vars['historyMission']['staff_time']; ?>
 <?php echo $this->_tpl_vars['historyMission']['staff_time_option_text']; ?>
</span>
			</div>
			<div class="col-md-12 separator">				
				<i class="glyphicon glyphicon-user"></i> <span class="hm-text"><?php echo $this->_tpl_vars['historyMission']['writer_staff']; ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['historyMission']['writing_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['historyMission']['currency']; ?>
;</span>
			</div>
			<div class="col-md-12 separator">
				<i class="glyphicon glyphicon-education"></i> <span class="hm-text"><?php echo $this->_tpl_vars['historyMission']['corrector_staff']; ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['historyMission']['correcting_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['historyMission']['currency']; ?>
;</span>
			</div>
		</div>
	</div>
 </div>