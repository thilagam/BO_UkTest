<?php /* Smarty version 2.6.19, created on 2015-03-23 13:58:37
         compiled from gebo/ongoing/ao-history.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/ongoing/ao-history.phtml', 51, false),array('modifier', 'count', 'gebo/ongoing/ao-history.phtml', 70, false),array('modifier', 'stripslashes', 'gebo/ongoing/ao-history.phtml', 78, false),array('modifier', 'utf8_encode', 'gebo/ongoing/ao-history.phtml', 80, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
    $(document).ready(function() {	
 $("#articles").chosen({ allow_single_deselect: true,search_contains: true });	
		//refreshing the modal /////
		$("#linkidrefresh").live(\'click\',function(e) {
			e.preventDefault();
			var href = $(this).attr(\'href\');
			$("#ao_history").removeData(\'modal\');
			$(\'#ao_history .modal-body\').load(href);
			$("#ao_history").modal();
			$(".modal-backdrop:gt(0)").remove();
		}); 
	});	
	
//load article history	
function fnloadhistory(ao_id,article_id)
{	
	if(article_id==\'all\')
		article_id=\'\';
	var href=\'/ongoing/ao-history?ao_id=\'+ao_id+\'&article_id=\'+article_id;
	$("#ao_history").removeData(\'modal\');
	$(\'#ao_history .modal-body\').load(href);
	$("#ao_history").modal();
	$(".modal-backdrop:gt(0)").remove();
}
//load AO history	
function fnloadsuperclientAOhistory(client_id,ao_id)
{		
	var href=\'/ongoing/ao-history?ao_id=\'+ao_id+\'&client_id=\'+client_id;
	$("#ao_history").removeData(\'modal\');
	$(\'#ao_history .modal-body\').load(href);
	$("#ao_history").modal();
	$(".modal-backdrop:gt(0)").remove();
}
	
</script>
'; ?>


<div class="row-fluid">
	<div class="span12">
		<div  id="search_block" class="span10">
			<form action="" id="searchform" name="searchform" >				
				 <input type="hidden" id="submenuId" name="submenuId"  value="<?php echo $this->_tpl_vars['submenuId']; ?>
"/>				  
				 <table id="searchtable" cellspacing="5" cellpadding="5">
					<tr>
						<?php if ($_GET['client_id']): ?>								
						<td>Select AO :</td>
						<td id="aolistall">
							<select name="delivery_id" id="articles" onchange="fnloadsuperclientAOhistory('<?php echo $_GET['client_id']; ?>
',this.value);"  data-placeholder="Articles">
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['article_array'],'selected' => $_GET['ao_id']), $this);?>
				  
							</select>
						</td>	
						<?php else: ?>
						<td>Select Article :</td>
						<td id="aolistall">
							<select name="article_id" id="articles" onchange="fnloadhistory('<?php echo $_GET['ao_id']; ?>
',this.value);"  data-placeholder="Articles">
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['article_array'],'selected' => $_GET['article_id']), $this);?>
				  
							</select>
						</td>					
						<?php endif; ?>							
					</tr>
				</table>				
			</form>			
		</div>
		<div class="span2">
			<a href="/ongoing/ao-history?ao_id=<?php echo $_GET['ao_id']; ?>
&article_id=<?php echo $_GET['article_id']; ?>
" id="linkidrefresh" data-hint="Reload Historique" class="alignright btn hint--left hint"><img alt="" src="/BO/theme/gebo/img/gCons/reload.png"></a>
		</div>	
		
		<?php if (count($this->_tpl_vars['aoHistory']) > 0): ?>
			<table class="table table-hover">
				<tbody>
					<?php $_from = $this->_tpl_vars['aoHistory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['historyDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['historyDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['details']):
        $this->_foreach['historyDetails']['iteration']++;
?> 	
						<tr>
							<td><?php echo $this->_tpl_vars['details']['action_at']; ?>
</td>
							
								<?php if ($this->_tpl_vars['details']['action'] == 'Corrector Validation'): ?>
									<td style="text-align:left"><?php echo ((is_array($_tmp=$this->_tpl_vars['details']['action_sentence'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
								<?php else: ?>
									<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['details']['action_sentence'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
								<?php endif; ?>	
							
						</tr>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>	
			</table>
		<?php endif; ?>
	</div>
</div>