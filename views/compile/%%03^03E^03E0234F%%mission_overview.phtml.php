<?php /* Smarty version 2.6.19, created on 2015-08-06 11:24:55
         compiled from gebo/survey/mission_overview.phtml */ ?>
<?php echo '
<script language="javascript">
$(document).ready(function() {
	$(".lessdetails").hide();
		$(document).on(\'click\',\'.moredetails\',function(){
			$(this).hide();
			$(".lessdetails").show();
			$(".slide").slideDown();
		});
		
		$(document).on(\'click\',\'.lessdetails\',function(){
			$(this).hide();
			$(".moredetails").show();
			$(".slide").slideUp();
		});
});
</script>
'; ?>

<div class="mission-details">
	<div class="prod-mission-product">Mission Overview</div>
	
	<table class="table mission-table">
		<tr>
			<th>Type</th>
			<th style="width:30%">Language</th>
			<th style="width:30%">Product</th>
			<th style="width:20%">Volume</th>
			<th style="width:20%">Nb of words</th>
		</tr>
		<tr class="misson-details-text">
			<td><?php echo $this->_tpl_vars['quoteMission']['product_name']; ?>
</td>
			<td>
				
				<?php if ($this->_tpl_vars['quoteMission']['product'] == 'translation'): ?>															
					<?php echo $this->_tpl_vars['quoteMission']['language_source_name']; ?>
 > 	<?php echo $this->_tpl_vars['quoteMission']['language_dest_name']; ?>
 
				<?php else: ?>
					<?php echo $this->_tpl_vars['quoteMission']['language_source_name']; ?>

				<?php endif; ?>								
			</td>
			<td>
					<?php if ($this->_tpl_vars['quoteMission']['product_type_name']): ?> 
						<?php echo $this->_tpl_vars['quoteMission']['product_type_name']; ?>

					<?php else: ?>
						<?php echo $this->_tpl_vars['quoteMission']['product_name']; ?>

					<?php endif; ?>
				
			</td>
			<td><?php echo $this->_tpl_vars['quoteMission']['volume']; ?>
</td>										
			<td><?php echo $this->_tpl_vars['quoteMission']['nb_words']; ?>
</td>
		</tr>	
	</table>
	<div class="row-fluid">
		<?php $this->assign('_tempo_value', $this->_tpl_vars['quoteMission']['tempo']); ?>
		<?php $this->assign('_delivery_volume_option', $this->_tpl_vars['quoteMission']['delivery_volume_option']); ?>
		<?php $this->assign('_tempo_length_option', $this->_tpl_vars['quoteMission']['tempo_length_option']); ?>
		<div class="mission-details">
			<div class="mission-prod-product">
				<span>Tempo Details</span>
			</div>
			<div class="row-fluid">								
				<label class="span3 moveright">Staffing set up</label>
				<div class="span3">
					<div class="span4">
					<h4>
						<?php if ($this->_tpl_vars['quoteMission']['staff_time']): ?>
							<?php echo $this->_tpl_vars['quoteMission']['staff_time']; ?>
 <?php if ($this->_tpl_vars['quoteMission']['staff_time_option'] == 'days'): ?> Days <?php else: ?> Hours <?php endif; ?>
						<?php else: ?>
							/
						<?php endif; ?>
					</h4>
					</div>
				</div>	
			</div>	
			<?php if ($this->_tpl_vars['quoteMission']['oneshot']): ?>
				<div class="row-fluid">								
					<label class="span3 moveright">One shot</label>
					<div class="span3">
						<h4>
						<?php if ($this->_tpl_vars['quoteMission']['oneshot'] == 'yes'): ?>
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
					<div class="span3">
						<h4><?php echo $this->_tpl_vars['quoteMission']['mission_length']; ?>
 <?php if ($this->_tpl_vars['quoteMission']['mission_length_option'] == 'days'): ?> Days <?php else: ?> Hours <?php endif; ?></h4>
					</div>		
					<?php if ($this->_tpl_vars['quoteMission']['duration_dont_know'] == 'yes'): ?> 															
					<div class="span8" style="margin-left: 0px">
						* Duration not specified by sales																
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php if ($this->_tpl_vars['quoteMission']['oneshot'] == 'no'): ?>
				<div class="row-fluid">								
					<label class="span3 moveright">Volume</label>														
					<div class="span9" id="tempo_details_<?php echo $this->_tpl_vars['quoteMission']['identifier']; ?>
" <?php if ($this->_tpl_vars['quoteMission']['oneshot'] == 'yes'): ?> style="display:none" <?php endif; ?>>
						<div class="span4">		
							<h4>
								<?php echo $this->_tpl_vars['quoteMission']['volume_max']; ?>
 <?php echo $this->_tpl_vars['tempo_array'][$this->_tpl_vars['_tempo_value']]; ?>
 <?php echo $this->_tpl_vars['volume_option_array'][$this->_tpl_vars['_delivery_volume_option']]; ?>
 <?php echo $this->_tpl_vars['quoteMission']['tempo_length']; ?>
 <?php echo $this->_tpl_vars['tempo_duration_array'][$this->_tpl_vars['_tempo_length_option']]; ?>

							</h4>	
						</div>														
					</div>
				</div>
			<?php endif; ?>	
		</div>
	</div>	
</div>
<div class="w-box <?php if ($this->_tpl_vars['details']): ?> slide <?php endif; ?>">
	<div class="w-box-header"> Brief and Comments from Quote</div>
	<div class="w-box-content cnt_a">
		<div class="row-fluid">
			<div class="media mission-comment">
				<a class="pull-left imgframe">
					<img class="media-object" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['quoteMission']['quote_by']; ?>
/logo.jpg">
				</a>
				<div class="media-body">
					<?php if ($this->_tpl_vars['quoteMission']['sales_owner']): ?>
						<a><?php echo $this->_tpl_vars['quoteMission']['sales_owner']; ?>
</a> <?php echo $this->_tpl_vars['quoteMission']['sales_comment_time']; ?>
<br>
					<?php endif; ?>
					<?php echo $this->_tpl_vars['quoteMission']['sales_comment']; ?>

				</div>
			</div>
			<!--Quote mission comments-->
			<?php if ($this->_tpl_vars['quoteMission']['quoteMissionComments']): ?>
				<div class="media mission-comment">
					<a class="pull-left imgframe">
						<img class="media-object" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['quoteMission']['missionCreated_by']; ?>
/logo.jpg">
					</a>
					<div class="media-body">
						<a><?php echo $this->_tpl_vars['quoteMission']['mission_created_name']; ?>
</a> <?php echo $this->_tpl_vars['quoteMission']['qm_comment_time']; ?>
<br>
						<?php echo $this->_tpl_vars['quoteMission']['quoteMissionComments']; ?>

					</div>
				</div>	
			<?php endif; ?>								
			
			<!--Contract mission comments-->
			<?php if ($this->_tpl_vars['quoteMission']['contractMissionComments']): ?>
				<div class="media mission-comment">
					<a class="pull-left imgframe">
						<img class="media-object" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['quoteMission']['updated_by']; ?>
/logo.jpg">
					</a>
					<div class="media-body">
						<a><?php echo $this->_tpl_vars['quoteMission']['cm_assigned_name']; ?>
</a> <?php echo $this->_tpl_vars['quoteMission']['cm_comment_time']; ?>
<br>
						<?php echo $this->_tpl_vars['quoteMission']['contractMissionComments']; ?>

					</div>
				</div>	
			<?php endif; ?>
		
	</div>
	<?php if ($this->_tpl_vars['quotefiles']): ?>
		<div class="row-fluid">
			<p><strong>Related Files</strong></p>
			<table class="onsuccessrepquote table">
			<?php echo $this->_tpl_vars['quotefiles']; ?>

			</table>
		</div>
	<?php endif; ?>	
	</div>	
</div>