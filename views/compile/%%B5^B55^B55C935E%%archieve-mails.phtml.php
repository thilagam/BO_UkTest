<?php /* Smarty version 2.6.19, created on 2013-11-08 08:47:33
         compiled from gebo/master-mails/archieve-mails.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/master-mails/archieve-mails.phtml', 1, false),array('modifier', 'date_format', 'gebo/master-mails/archieve-mails.phtml', 1, false),)), $this); ?>
<?php echo '<style type="text/css">.doc_view .doc_view_content,.dl-horizontal dt,.doc_view .doc_view_header dd, .doc_view .doc_view_header dt{	text-transform:none;}</style>'; ?>
	<div class="row-fluid">	<div class="span12">		<h3 class="heading">			Syst&egrave;me de messages :: Messages archiv&egrave;s			<div style="display:inline;float:right"><a  class="btn btn-success" href="/mastermails/archieve-tickets?submenuId=ML6-SL4">Retour</a></div>  					</h3>		<?php if (count($this->_tpl_vars['archieve_messages']) > 0): ?>		<?php $_from = $this->_tpl_vars['archieve_messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>			<div  class="tab-pane">				<div class="doc_view">					<div class="doc_view_header">						<dl class="dl-horizontal">							<dt>Objet</dt>								<dd><?php echo $this->_tpl_vars['message']['Subject']; ?>
</dd>							<dt>Emetteur</dt>								<dd><span><?php echo $this->_tpl_vars['message']['sendername']; ?>
</span></dd>														<dt>Destinataire</dt>								<dd><span><?php echo $this->_tpl_vars['message']['recipient']; ?>
</span></dd>								<dt>Re&ccedil;u le</dt>								<dd>									<?php if (((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")) == ((is_array($_tmp=$this->_tpl_vars['message']['receivedDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y"))): ?>										<?php echo ((is_array($_tmp=$this->_tpl_vars['message']['receivedDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%R") : smarty_modifier_date_format($_tmp, "%R")); ?>
									<?php else: ?>												<?php echo ((is_array($_tmp=$this->_tpl_vars['message']['receivedDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>
									<?php endif; ?>																</dd>														<?php if ($this->_tpl_vars['message']['attachment_name'] != ''): ?>																<dt><i class="icon-adt_atach"></i></dt>								<dd>								<?php $_from = $this->_tpl_vars['message']['attachment_files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['files'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['files']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['attachment_file']):
        $this->_foreach['files']['iteration']++;
?>																				<a target="_blank" href="/mastermails/view-mail?mailaction=viewattachment&display=attachment&index=<?php echo ($this->_foreach['files']['iteration']-1); ?>
&attachment=<?php echo $this->_tpl_vars['message']['messageId']; ?>
"><?php echo $this->_tpl_vars['attachment_file']; ?>
</a>, 																	<?php endforeach; endif; unset($_from); ?>								</dd>							<?php endif; ?>						</dl>					</div>					<div class="doc_view_content">						<?php echo $this->_tpl_vars['message']['content']; ?>
					</div>									</div>							</div>			<?php endforeach; endif; unset($_from); ?>									<?php endif; ?>				</div></div>	