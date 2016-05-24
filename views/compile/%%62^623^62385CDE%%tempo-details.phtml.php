<?php /* Smarty version 2.6.19, created on 2015-08-27 10:46:07
         compiled from gebo/quote/tempo-details.phtml */ ?>
<div class="row-fluid">
	<?php $this->assign('_tempo_value', $this->_tpl_vars['mission']['tempo']); ?>
	<?php $this->assign('_delivery_volume_option', $this->_tpl_vars['mission']['delivery_volume_option']); ?>
	<?php $this->assign('_tempo_length_option', $this->_tpl_vars['mission']['tempo_length_option']); ?>
	<div class="mission-details">
		<div class="mission-prod-product">
			<span>Tempo Details</span>
		</div>
		<div class="row-fluid">								
			<label class="span3 moveright">Staffing set up</label>
			<div class="span3">
				<div class="span4">
				<h4>
					<?php if ($this->_tpl_vars['mission']['staff_time']): ?>
						<?php echo $this->_tpl_vars['mission']['staff_time']; ?>
 <?php if ($this->_tpl_vars['mission']['staff_time_option'] == 'days'): ?> Days <?php else: ?> Hours <?php endif; ?>
					<?php else: ?>
						/
					<?php endif; ?>
				</h4>
				</div>
			</div>	
		</div>	
		<?php if ($this->_tpl_vars['mission']['oneshot']): ?>
			<div class="row-fluid">								
				<label class="span3 moveright">One shot</label>
				<div class="span3">
					<h4>
					<?php if ($this->_tpl_vars['mission']['oneshot'] == 'yes'): ?>
						Yes
					<?php else: ?>
						No
					<?php endif; ?>
					</h4>
				</div>
			</div>
		<?php endif; ?>
		<div class="row-fluid">								
			<label class="span3 moveright">Mission Duration</label>
			<div class="span6">
				<?php if ($this->_tpl_vars['mission']['duration_dont_know'] == 'yes' && $this->_tpl_vars['mission']['mission_length'] == '0'): ?> 															
				<div class="span8">
					<h4>* Duration not specified by sales</h4>																
				</div>
				<?php else: ?>
					<div class="span3">
						<h4><?php echo $this->_tpl_vars['mission']['mission_length']; ?>
 <?php if ($this->_tpl_vars['mission']['mission_length_option'] == 'days'): ?> Days <?php else: ?> Hours <?php endif; ?></h4>
					</div>		
					<?php if ($this->_tpl_vars['mission']['duration_dont_know'] == 'yes'): ?> 															
					<div class="span8" style="margin-left: 0px">
						* Duration not specified by sales																
					</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php if ($this->_tpl_vars['mission']['oneshot'] == 'no'): ?>
			<div class="row-fluid">								
				<label class="span3 moveright">Volume</label>														
				<div class="span9" id="tempo_details_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" <?php if ($this->_tpl_vars['mission']['oneshot'] == 'yes'): ?> style="display:none" <?php endif; ?>>
					<div class="span4">		
						<h4>
							<?php echo $this->_tpl_vars['mission']['volume_max']; ?>
 <?php echo $this->_tpl_vars['tempo_array'][$this->_tpl_vars['_tempo_value']]; ?>
 <?php echo $this->_tpl_vars['volume_option_array'][$this->_tpl_vars['_delivery_volume_option']]; ?>
 <?php echo $this->_tpl_vars['mission']['tempo_length']; ?>
 <?php echo $this->_tpl_vars['tempo_duration_array'][$this->_tpl_vars['_tempo_length_option']]; ?>

						</h4>	
					</div>														
				</div>
			</div>
		<?php endif; ?>	
	</div>
</div>