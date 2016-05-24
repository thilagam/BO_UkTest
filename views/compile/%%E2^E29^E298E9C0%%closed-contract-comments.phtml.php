<?php /* Smarty version 2.6.19, created on 2015-10-20 14:34:36
         compiled from gebo/quotecontractmission/closed-contract-comments.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/quotecontractmission/closed-contract-comments.phtml', 44, false),array('modifier', 'htmlentities', 'gebo/quotecontractmission/closed-contract-comments.phtml', 44, false),array('modifier', 'nl2br', 'gebo/quotecontractmission/closed-contract-comments.phtml', 44, false),array('modifier', 'utf8_encode', 'gebo/quotecontractmission/closed-contract-comments.phtml', 44, false),)), $this); ?>
<?php if ($this->_tpl_vars['request']['cstatus'] == 'add'): ?>
<form action="/contractmission/save-closed-comments/" class="form-horizontal" method="post" id="closed-comments">
	<input type="hidden" name="contract_id" id="" value="<?php echo $this->_tpl_vars['request']['contract_id']; ?>
" />
	<input type="hidden" name="quote_id" id="" value="<?php echo $this->_tpl_vars['request']['quote_id']; ?>
" />
	<input type="hidden" name="ccomment" id="" value="<?php echo $this->_tpl_vars['request']['comment']; ?>
" />
	<section>
		<div class="row-fluid topset2">
			<div class="control-group">
				<div class="row-fluid">
					<div class="control-group">
						<label class="control-label">Commentaire <span class="f_req">*</span></label>
						<div class="controls">
							<textarea cols="30" id="comments" name="comments" rows="5" class="span12 validate[required]"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="control-group pull-center">
				<div class="controls">
					<button id="valid-sign-old" class="btn btn-primary" type="submit">Add</button>
					<button  class="btn" data-dismiss="modal" type="reset">Annuler</button>
				</div>
			</div>
		</div>
	</section>
</form>
<?php echo '
<script>
	$("#closed-comments").validationEngine({prettySelect : true,useSuffix: "_chzn"});
	$(\'textarea\').attr(\'data-prompt-position\',\'topLeft\');
</script>
'; ?>

<?php else: ?>
	
	<?php $_from = $this->_tpl_vars['closed_comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['closedcomment']):
?>
		<div class="media mission-comment">
			<a class="pull-left imgframe">
				<img class="media-object rd_30" width="50" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['closedcomment']['user_id']; ?>
/logo.jpg">
			</a>
			<div class="media-body">
				<?php if ($this->_tpl_vars['closedcomment']['first_name'] || $this->_tpl_vars['closedcomment']['last_name']): ?>
					<a><?php echo $this->_tpl_vars['closedcomment']['first_name']; ?>
 <?php echo $this->_tpl_vars['closedcomment']['last_name']; ?>
</a> <?php echo $this->_tpl_vars['closedcomment']['created_time']; ?>
<br>
				<?php endif; ?>
				<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['closedcomment']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>

			</div>
		</div>
		<hr>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>