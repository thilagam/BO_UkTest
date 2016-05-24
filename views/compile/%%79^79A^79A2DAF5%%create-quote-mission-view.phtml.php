<?php /* Smarty version 2.6.19, created on 2016-04-19 10:32:18
         compiled from gebo-new/quote/create-quote-mission-view.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo-new/quote/create-quote-mission-view.phtml', 18, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/lbd/css/custom_quote.css" type="text/css"/>
<script type="text/javascript" src="/BO/theme/lbd/js/jquery.bootstrap.wizard.js"></script>
<script type="text/javascript" src="/BO/theme/lbd/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/BO/theme/lbd/js/custom_quote.js"></script>

'; ?>

<div class="modal fade" id="mission-step" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content mission-step">
					
					</div>
				</div>
			</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo-new/quote/header.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div class="content">
			 <div class="container-fluid">
				<?php if ($this->_tpl_vars['missionCount'] > 0 || count($this->_tpl_vars['tech_missions']) > 0): ?>

					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo-new/quote/create-quote-mission-realprice.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

				<?php else: ?>
					<div class="col-md-12 mission-start">
						<div class="text-center">
							<p>Please create mission to display infos</p>
							 <a href="/quote-new/create-quote-mission-popup?quote_id=<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
" class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#mission-step">Create New Mission</a>						
						</div>
					</div>	
				<?php endif; ?>

						<p class="text-center">		
						<a href="/quote-new/client-brief?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['custom']['quote_id']; ?>
" class="btn btn-default"> View customer pitch</a>
						<?php if (( $this->_tpl_vars['missionCount'] > 0 || count($this->_tpl_vars['tech_missions']) > 0 )): ?>
							<button class="btn btn-primary btn-fill" onclick="quotesValidation();" type="button"> Validate</button>
						<?php endif; ?>	
					</p>
				
			</div>	
		</div>