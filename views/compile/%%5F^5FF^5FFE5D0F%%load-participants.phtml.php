<?php /* Smarty version 2.6.19, created on 2016-04-21 10:07:48
         compiled from gebo/recruitment/load-participants.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/recruitment/load-participants.phtml', 14, false),array('modifier', 'zero_cut', 'gebo/recruitment/load-participants.phtml', 37, false),)), $this); ?>
<table class="table selecttable" id="selecttable">
	<thead>
		<tr>
			<th>Writers</th>
			<th>Max delivery</th>
			<th>Price per art.</th>
			<?php if ($this->_tpl_vars['show_quiz'] == 'yes'): ?>
			<th>Quiz winners</th>
			<?php endif; ?>
			<th>Article with marks</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
		<?php if (count($this->_tpl_vars['participation_details']) > 0): ?>
			<?php $_from = $this->_tpl_vars['participation_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pd'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pd']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['pd']['iteration']++;
?>
				<?php $this->assign('hire', true); ?>
				<tr>
					<td style="width:20%">
						<div class="imageHolder">
							<a href="/user/contributor-edit-new?submenuId=ML10-SL6&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['row']['user_id']; ?>
" target="_blank">
								<img class="media-object  img-circle" width="50px" height="50px"  src="<?php echo $this->_tpl_vars['fo_path']; ?>
/<?php echo $this->_tpl_vars['row']['image']; ?>
" >
							</a>
							<span class="caption label label-level">
								<i class="icon-bookmark"></i>
								<?php echo $this->_tpl_vars['row']['profiletype']; ?>

							</span>
						</div>
						<div class="nameHolder">
							<?php if ($this->_tpl_vars['row']['first_name'] != ""): ?>
								<b><?php echo $this->_tpl_vars['row']['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['row']['last_name']; ?>
</b>
							<?php else: ?>
								<b><?php echo $this->_tpl_vars['row']['email']; ?>
</b>
							<?php endif; ?>
						</div>
					</td>									
					<td><img src="/BO/theme/gebo/img/gCons/copy-item.png" alt="" /><div class="text"><?php echo $this->_tpl_vars['row']['articles_per_week']; ?>
/week</div></td>
					<td><img src="/BO/theme/gebo/img/gCons/dollar.png" alt="" /><div class="text"><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['price_user'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['currency']; ?>
; / art	</div></td>
					<?php if ($this->_tpl_vars['row']['link_quiz'] && $this->_tpl_vars['row']['quiz']): ?>
						
						<?php if ($this->_tpl_vars['row']['qualified'] == 'yes' && $this->_tpl_vars['row']['percent'] == '100'): ?>
						<td>
							<img src="/BO/theme/gebo/img/gCons/button_ok.png" alt="" />
							<div class="text">Quizz <?php echo $this->_tpl_vars['row']['num_correct']; ?>
 / <?php echo $this->_tpl_vars['row']['num_total']; ?>
</div>
						<?php elseif ($this->_tpl_vars['row']['qualified'] == 'yes'): ?>
						<td>
							<img src="/BO/theme/gebo/img/gCons/button_ok_orange.png" alt="" />
							<div class="text">Quizz <?php echo $this->_tpl_vars['row']['num_correct']; ?>
 / <?php echo $this->_tpl_vars['row']['num_total']; ?>
</div>
						<?php else: ?>
							<td class="disable_hire">
							<?php $this->assign('hire', false); ?>
							<div class="smiley">:(</div>
							<div class="text">Lost</div>
						<?php endif; ?>
						</td>
					<?php endif; ?>
					
					<td>
						<?php if ($this->_tpl_vars['row']['status'] == 'under_study' || $this->_tpl_vars['row']['status'] == 'plag_exec' || $this->_tpl_vars['row']['status'] == 'published' || $this->_tpl_vars['row']['status'] == 'disapproved'): ?>
						<a class="btn btn-small <?php if ($this->_tpl_vars['row']['marks'] && $this->_tpl_vars['row']['marks'] < $this->_tpl_vars['row']['min_mark']): ?>under_marks<?php endif; ?>" href="/BO/download_article.php?article_id=<?php echo $this->_tpl_vars['row']['article_id']; ?>
&type=writer"><i class="icon-download"></i> <?php if ($this->_tpl_vars['row']['marks']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['marks'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
/10<?php endif; ?></a>
						<?php elseif ($this->_tpl_vars['row']['article_submit_expires'] == 0): ?>
							-
						<?php elseif (time() > $this->_tpl_vars['row']['article_submit_expires']): ?>
							<strong>Article Test Time Out</strong>											
						<?php else: ?>
						<span id="time_<?php echo $this->_tpl_vars['row']['article_submit_expires']; ?>
_<?php echo $this->_tpl_vars['row']['rpid']; ?>
" class="alert alert-danger">
							<i class="icon-time"></i>
							<span id="time_<?php echo $this->_tpl_vars['row']['rpid']; ?>
"></span>
						</span>
						<?php endif; ?>
					</td>										
					<td>
						<!--<input type="checkbox" name="hire[]" value="<?php echo $this->_tpl_vars['row']['rpid']; ?>
" data-prompt-position="topLeft:-120" <?php if ($this->_tpl_vars['row']['is_hired'] == 'yes'): ?> checked="checked" <?php endif; ?>  class="validate[minCheckbox[1]]" <?php if (! $this->_tpl_vars['hire']): ?>disabled="disabled"<?php endif; ?> /> <!-- class="validate[minCheckbox[<?php echo $this->_tpl_vars['row']['no_contrib']; ?>
],maxCheckbox[<?php echo $this->_tpl_vars['row']['no_contrib']; ?>
]]" -->
						<!--<label><?php if ($this->_tpl_vars['row']['is_hired'] == 'yes'): ?> Hired <?php else: ?> Hire <?php endif; ?></label>-->
						<div id="hireaction_<?php echo $this->_tpl_vars['row']['rpid']; ?>
">
							<?php if ($this->_tpl_vars['row']['is_hired'] == 'yes'): ?>
								<span class="label label-success">Hired</span>
							<?php elseif ($this->_tpl_vars['row']['is_hired'] == 'no'): ?>
								<span class="label label-inverse">Not Hired</span>
							<?php else: ?>
								<button type="button" name="hire_yes_<?php echo $this->_tpl_vars['row']['rpid']; ?>
" id="hire_yes_<?php echo $this->_tpl_vars['row']['rpid']; ?>
" data-loading-text="Loading..." value="yes"  class="btn btn-default" onClick="hireparticipant('yes','<?php echo $this->_tpl_vars['row']['rpid']; ?>
','<?php echo $this->_tpl_vars['row']['user_id']; ?>
')">YES</button>
								<button type="button" name="hire_no_<?php echo $this->_tpl_vars['row']['rpid']; ?>
" id="hire_no_<?php echo $this->_tpl_vars['row']['rpid']; ?>
" data-loading-text="Loading..."  value="no"  class="btn btn-default" onClick="hireparticipant('no','<?php echo $this->_tpl_vars['row']['rpid']; ?>
','<?php echo $this->_tpl_vars['row']['user_id']; ?>
')">NO</button>
							<?php endif; ?>
						</div>
						<div id="loadingmessage_<?php echo $this->_tpl_vars['row']['rpid']; ?>
" style="display:none;"<i class="icon-refresh"></i></div>
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	</table>
	<?php echo '
<script type="text/javascript">

	$(".disable_hire").closest("tr").addClass(\'changebackground\');
	

$(\'input[name="hire[]"]\').each(function(){
			var self = $(this),
			  label = self.next(),
			  label_text = label.text();

			label.remove();
			self.iCheck({
			  checkboxClass: \'icheckbox_line-grey\',
			  radioClass: \'iradio_line-grey\',
			  insert: \'<div class="icheck_line-icon"></div>\' + label_text
			});
		  });

	
		  
'; ?>

<?php if (count($this->_tpl_vars['participation_details']) > 0): ?>
<?php echo '
	  //data table
	$(\'#selecttable\').dataTable({
             "bPaginate":   false,
             "bSort":   false,
            "aoColumns": [
                null,
                null,
                null,                
                '; ?>
<?php if ($this->_tpl_vars['show_quiz'] == 'yes'): ?><?php echo '
                null,
				'; ?>

				<?php endif; ?>				
				<?php echo '
				null,
                null,
            ]
        });
'; ?>

<?php endif; ?>
<?php echo '
</script>
'; ?>