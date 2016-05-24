<?php /* Smarty version 2.6.19, created on 2016-04-07 09:47:21
         compiled from gebo/followup/tech-task.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/followup/tech-task.phtml', 2, false),array('modifier', 'zero_cut_t', 'gebo/followup/tech-task.phtml', 18, false),array('modifier', 'stripslashes', 'gebo/followup/tech-task.phtml', 118, false),array('modifier', 'htmlentities', 'gebo/followup/tech-task.phtml', 118, false),array('modifier', 'nl2br', 'gebo/followup/tech-task.phtml', 118, false),)), $this); ?>
		<div class="followup-header">
			<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <span class="headerdim"><?php echo $this->_tpl_vars['viewarray']['from_date']; ?>
 - <?php echo $this->_tpl_vars['viewarray']['to_date']; ?>
</span></h3>
			<?php if ($this->_tpl_vars['viewarray']['tempo_text']): ?>
				<?php echo $this->_tpl_vars['viewarray']['tempo_text']; ?>

			<?php endif; ?>
			 <div class="row-fluid">    
				<div class="header-info">
					<div class="span3">
						<span class="upper">Priority</span>
						<span class="bottom"><?php echo $this->_tpl_vars['viewarray']['priority']; ?>
</span>
					</div>
					<div class="span3">
						<span class="upper">Volume</span>
						<span class="bottom"><?php echo $this->_tpl_vars['viewarray']['volume']; ?>
</span>
					</div>
					<div class="span3">
						<span class="upper">Production Cost</span>
						<span class="bottom"><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['production_cost'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['viewarray']['currency']; ?>
;</span>
					</div>
					<div class="span3">
						<span class="upper">Turnover</span>
						<span class="bottom"><?php if ($this->_tpl_vars['viewarray']['turnover'] == 'Free'): ?>Free<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['viewarray']['currency']; ?>
;<?php endif; ?></span>
					</div>
				</div>
			</div> 
		</div>
		
		<?php if ($this->_tpl_vars['viewarray']['tech_action'] == 'new' || $this->_tpl_vars['viewarray']['tech_action'] == 'edit'): ?>
		<div class="row-fluid topset2">
			<form class="form-horizontal" enctype="multipart/form-data" action="/followup/submit-techtask" id="taskadd" method="POST">
			
				<div class="media mission-comment">
					<div class="control-group">
						<label class="control-label">Title of the Task<span class="f_req">*</span></label>
						<div class="controls">
							<input type="text" name="title" class="span10 validate[required]" id="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['task_title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" />
						</div>
					</div>
				</div>
				<div class="media mission-comment">
					<div class="control-group">
						<label class="control-label">Volume of the Task<span class="f_req">*</span></label>
						<div class="controls">
							<input type="text" name="volume" class="span1 validate[required,custom[number],maxVol[<?php echo $this->_tpl_vars['viewarray']['calculateVol']; ?>
]]" value="<?php echo $this->_tpl_vars['viewarray']['task_volume']; ?>
" />
						</div>
					</div>
				</div>
				<div class="media mission-comment">
					<div class="control-group">
						<label class="control-label">Add a Comment<span class="f_req">*</span></label>
						<div class="controls" style="margin-top:0">
							<div class="media mission-comment span10">
							<a class="pull-left imgframe">
							<img class="media-object" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['viewarray']['updated_by']; ?>
/logo.jpg">
							</a>
							<div class="media-body">
								<textarea name="comment" class="span12 validate[required]"><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</textarea>
							</div>
							</div>
						</div>
					</div>
				</div>
				<div class="media mission-comment">
					<div class="control-group">
						<label class="control-label">Attach a file</label>
						<div class="controls">
							<input type="file" name="mulitupload[]" accept="doc|xls|zip|docx|xlsx" class="multi" id=""/>
						<div class="onsuccessrep">
							<?php echo ((is_array($_tmp=$this->_tpl_vars['task_files'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

						</div>
						</div>
					</div>
				</div>
					<div class="control-group">
						<div class="controls topset2 pull-center" style="margin-left:0">
							<button  class="btn" data-dismiss="modal" type="reset">Cancel</button>
							<button class="btn btn-primary" type="button" id="tasksubmit">Submit</button>
						</div>
					</div>
					<?php if ($this->_tpl_vars['viewarray']['tech_action'] == 'new' && $_GET['tcount']): ?>
					<input type="hidden" name="taskcount" value="<?php echo $_GET['tcount']; ?>
" />
					<input type="hidden" name="tempo_length" value="<?php echo $_GET['tempo_length']; ?>
" />
					<?php endif; ?>
					<input type="hidden" name="cmid" value="<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
" />
					<input type="hidden" name="contract_id" value="<?php echo $this->_tpl_vars['viewarray']['contract_id']; ?>
" />
					<input type="hidden" name="mission_id" value="<?php echo $this->_tpl_vars['viewarray']['mission_id']; ?>
" />
					<input type="hidden" name="task_id" value="<?php echo $this->_tpl_vars['viewarray']['task_id']; ?>
" />
					<input type="hidden" name="quote_id" value="<?php echo $this->_tpl_vars['viewarray']['quote_id']; ?>
" />
			</form>
		</div>
		<?php else: ?>
		<div class="row-fluid topset2">
				<div class="media mission-comment">
					<div class="control-group">
						<label class="control-label"><strong>Title of the Task</strong></label>
						<div class="controls">
							<?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['task_title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

						</div>
					</div>
				</div>
				<div class="media mission-comment">
					<div class="control-group">
						<label class="control-label"><strong>Volume of the Task</strong></label>
						<div class="controls">
							<?php echo $this->_tpl_vars['viewarray']['task_volume']; ?>

						</div>
					</div>
				</div>
				<div class="media mission-comment">
					<div class="control-group">
						<label class="control-label"><strong>Comment</strong></label>
						<div class="controls" style="margin-top:0">
							<div class="media mission-comment span10">
							<a class="pull-left imgframe">
							<img class="media-object" width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['viewarray']['updated_by']; ?>
/logo.jpg">
							</a>
							<div class="media-body">
								<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['viewarray']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

							</div>
							</div>
						</div>
					</div>
				</div>
				<div class="media mission-comment">
					<div class="control-group">
						<label class="control-label"><strong>Files</strong>
						<?php if ($this->_tpl_vars['task_files']): ?>
						<div class="pull-right" style="margin-bottom:5px">
							<a href="/followup/download-document?type=task&index=-1&task_id=<?php echo $this->_tpl_vars['viewarray']['task_id']; ?>
" class="btn btn-small">Download Zip</a>
						</div>
						<?php endif; ?>
						</label>
						
						<div class="controls">
						<table class="onsuccessrep table">
						<?php if ($this->_tpl_vars['task_files']): ?>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['task_files'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

						<?php else: ?>
							<tr><td align="center">No files found</td></tr>
						<?php endif; ?>
						</table>
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls topset2 pull-center" style="margin-left:0">
					<a href="/followup/techtask?tid=<?php echo $this->_tpl_vars['viewarray']['task_id']; ?>
&tech_action=edit" data-toggle="modal" role="button" data-target="#edit_task">
					<button  class="btn btn-primary btn-large" id="trig_edit" type="button">Edit</button>	</a>
						<?php if ($this->_tpl_vars['viewarray']['m_status'] != 'validated'): ?><!-- && $smarty.get.state neq 'incoming'-->
							<button class="btn btn-large btn-success <?php echo $this->_tpl_vars['viewarray']['m_status']; ?>
" type="button" id="validatedtask" style="margin-left:10px;">Done</button>
							<input type="hidden" name="task_id" id='task_id' value="<?php echo $this->_tpl_vars['viewarray']['task_id']; ?>
" />
						<?php endif; ?>

					</div>
				</div>		
		</div>
		<?php endif; ?>
		<?php echo '
		<script type="text/javascript">
			 $("input[type=file].multi").MultiFile();
			  $(\'textarea\').data(\'promptPosition\',\'topLeft\');
			 $("#taskadd").validationEngine();
			
			$(document).ready(function(){
				$(\'#validatedtask\').on(\'click\',function(event){
					event.preventDefault();
					var msg = "Are you sure this task is definitely over ?";
					smoke.confirm(msg,function(e){
						if (e){
								taskid=$(\'#task_id\').val();
								if(taskid)
								{
								$.ajax(
								{
									type: \'get\',
									url: \'/followup/submit-tech-done?task_id=\'+taskid,
									success: function(data)
									{
										location.reload();
									}
								});
								}
							}					
					},{"ok":"Yes it\'s done","cancel":"Not completely done"});
				$("[id^=confirm-cancel-]").addClass(\'btn-danger\');
				$("[id^=confirm-ok-]").removeClass(\'btn-primary\').addClass(\'btn-success\');
				});
				$(\'#tasksubmit\').on(\'click\',function(){
					$(\'#m_status\').remove();
					$(\'#taskadd\').submit();
				});
			});
		</script>
		'; ?>