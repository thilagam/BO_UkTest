<?php /* Smarty version 2.6.19, created on 2015-02-05 11:11:11
         compiled from gebo/master-mails/archieve-tickets.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/master-mails/archieve-tickets.phtml', 1, false),array('modifier', 'count', 'gebo/master-mails/archieve-tickets.phtml', 1, false),array('modifier', 'date_format', 'gebo/master-mails/archieve-tickets.phtml', 1, false),)), $this); ?>
<?php echo '<script type="text/javascript">$(document).ready(function() {	$("#ep_users").chosen({ allow_single_deselect: true,search_contains: true });});	</script>'; ?>
<div class="row-fluid">	<div class="span12">		<h3 class="heading">			System messages :: Archived Posts		</h3>		<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>		<div  id="search_block">			<form action=<?php echo $_SERVER['REQUEST_URI']; ?>
 method="get" id="searchform" name="searchform" >								 <input type="hidden" id="submenuId" name="submenuId"  value="<?php echo $this->_tpl_vars['submenuId']; ?>
"/>				  				 <table id="searchtable" cellspacing="5" cellpadding="5">					<tr>						<td>Select EP :</td>						<td>							<select name="ep_user_id" id="ep_users" onChange="this.form.submit();"  data-placeholder="Select EP">								<option value=''></option>								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['EP_contacts'],'selected' => $this->_tpl_vars['ep_user_id']), $this);?>
								</select>						</td>																</tr>				</table>			</form>		</div>		<?php endif; ?>		<div class="mbox">												<div class="tab-pane active" id="mbox_archieve">				<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_archieve">					<thead>						<tr>							<th>S.No.</th>							<th>Post classified by</th>							<th>Subject</th>															<th>Date</th>													</tr>					</thead>					<tbody>						<?php if (count($this->_tpl_vars['archieve_ticket']) > 0): ?>							<?php $_from = $this->_tpl_vars['archieve_ticket']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MainMenu_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MainMenu_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['MainMenu_key'] => $this->_tpl_vars['message']):
        $this->_foreach['MainMenu_loop']['iteration']++;
?>																<tr>																	<td><?php echo ($this->_foreach['MainMenu_loop']['iteration']-1)+1; ?>
</td>									<td><?php echo $this->_tpl_vars['message']['classify_user_name']; ?>
</td>									<td>										<a href="/mastermails/archieve-mails?submenuId=ML6-SL4&page=<?php echo $_REQUEST['page']; ?>
&ticket=<?php echo $this->_tpl_vars['message']['ticket_id']; ?>
"><span><?php echo $this->_tpl_vars['message']['Subject']; ?>
</span></a>									</td>									<td><?php echo ((is_array($_tmp=$this->_tpl_vars['message']['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>
</td>								</tr>														<?php endforeach; endif; unset($_from); ?>						<?php endif; ?>											</tbody>				</table>    			</div>							</div>	</div>			</div>