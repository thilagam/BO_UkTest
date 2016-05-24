<?php /* Smarty version 2.6.19, created on 2015-06-26 13:59:50
         compiled from gebo/followup/seo-task.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/followup/seo-task.phtml', 2, false),array('modifier', 'zero_cut_t', 'gebo/followup/seo-task.phtml', 11, false),)), $this); ?>
		<div class="followup-header">
			<h3 class="heading"><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <span class="headerdim"> · <?php echo $this->_tpl_vars['viewarray']['from_date']; ?>
 - <?php echo $this->_tpl_vars['viewarray']['to_date']; ?>
</span></h3>
			 <div class="row-fluid">    
				<div class="header-info">
					<div class="span4">
						<span class="upper">Priority</span>
						<span class="bottom"><?php echo $this->_tpl_vars['viewarray']['priority']; ?>
</span>
					</div>
					<div class="span4">
						<span class="upper">Production Cost</span>
						<span class="bottom"><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['production_cost'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['viewarray']['currency']; ?>
;</span>
					</div>
					<div class="span4">
						<span class="upper">Turnover</span>
						<span class="bottom"><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['viewarray']['currency']; ?>
;</span>
					</div>
				</div>
			</div> 
		</div>
		
		<?php if ($this->_tpl_vars['viewarray']['seo_action'] == 'new' || $this->_tpl_vars['viewarray']['seo_action'] == 'edit'): ?>
		<div class="row-fluid topset2">
			<form class="form-horizontal" enctype="multipart/form-data" action="/followup/submit-seotask" id="taskadd" method="POST">		
				<div class="media mission-comment">
					<div class="control-group">
						<label class="control-label">Title of the Task<span class="f_req">*</span></label>
						<div class="controls">
						<input type="text" placeholder="Title of the Task" name="title" class="span8 validate[required]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['task_title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" />
						</div>
					</div>
				</div>
				<?php if ($this->_tpl_vars['seofiles']): ?>
				<div class="media mission-comment">
					<div class="control-group">
						<label class="control-label">Link to</label>
						<div class="controls">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['seofiles'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

						</div>
					</div>
				</div>
				<?php endif; ?>
				
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
								<textarea name="comment" Placeholder="Enter a comment *" class="span8 validate[required]"><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
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
	<hr>
					
						<div class="pull-center">
							<button  class="btn btn-default" data-dismiss="modal" type="reset">Cancel</button>
							<button class="btn btn-primary" type="submit">Done</button>
						</div>
				
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
		<div class="row-fluid">
				
						<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['task_title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</h3>

				<?php if ($this->_tpl_vars['seofiles']): ?>
				<p>Link To : <?php echo ((is_array($_tmp=$this->_tpl_vars['seofiles'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</p>
				<?php endif; ?>
			<div class="media">
							<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['viewarray']['updated_by']; ?>
/logo.jpg">
							</a>
							<div class="media-body">
								<?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['comments'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

							</div>
							</div>
				<br><h4>File</h4>
				<?php if ($this->_tpl_vars['task_files']): ?>
						<div class="pull-right" style="margin-bottom:5px">
							<a href="/followup/download-document?type=task&index=-1&task_id=<?php echo $this->_tpl_vars['viewarray']['task_id']; ?>
" class="btn btn-small">Download Zip</a>
						</div>
						<?php endif; ?>
						<table class="onsuccessrep table">
						<?php if ($this->_tpl_vars['task_files']): ?>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['task_files'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

						<?php else: ?>
							<tr><td align="center">No attached files</td></tr>
						<?php endif; ?>
						</table>
			
				<div class="control-group">
					<div class="controls topset2 pull-center" style="margin-left:0">
					<a href="/followup/seotask?tid=<?php echo $this->_tpl_vars['viewarray']['task_id']; ?>
&seo_action=edit" data-toggle="modal" role="button" data-target="#edit_task">
						<button  class="btn btn-primary" id="trig_edit" type="button">Edit</button>
					</a>
					</div>
				</div>		
		</div>
		<?php endif; ?>
		<?php echo '
		<script type="text/javascript">
			 $("input[type=file].multi").MultiFile();
			  $(".uni_style").uniform();
			  $(\'textarea\').data(\'promptPosition\',\'topLeft\');
			 $("#taskadd").validationEngine();
			
		</script>
		'; ?>