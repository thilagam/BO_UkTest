<?php /* Smarty version 2.6.19, created on 2015-04-22 12:02:23
         compiled from gebo/ao/premiumquotes.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/ao/premiumquotes.phtml', 40, false),)), $this); ?>
<?php echo '
    <script type="text/javascript" >
		$(document).ready(function() {
			 $(\'#premiumtable\').dataTable({
				"sDom": "<\'row\'<\'span5\'<\'dt_actions\'>l><\'span5\'f>r>t<\'row\'<\'span5\'i><\'span5\'p>>",
				"sPaginationType": "bootstrap",
				"aaSorting": [[ 0, "asc" ]],
				"aoColumns": [
					{ "sType": "formatted-num" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" }
				]
			});
		} );
    </script>
'; ?>


<div class="row-fluid">
  <div class="span12">
	 <h3 class="heading">Premium Quotes</h3>
	<table class="table table-bordered table-striped table_vam" id="premiumtable">
		<thead>
			<tr>
				<th>ID N°</th>
				<th>Name of Client</th>
				<th>Date</th>
				<th>Category</th>
				<th>AO type</th>
				<th>Download form</th>
			</tr>
		</thead>
		<tbody>
	 	<?php $_from = $this->_tpl_vars['quoteslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quotes_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quotes_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quote']):
        $this->_foreach['quotes_loop']['iteration']++;
?>
	        <tr>
				<td><?php echo ($this->_foreach['quotes_loop']['iteration']-1)+1; ?>
</td>
				<td><?php echo $this->_tpl_vars['quote']['company_name']; ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</td>
				<td><?php echo $this->_tpl_vars['category_array'][$this->_tpl_vars['quote']['category']]; ?>
</td>
				<td><?php echo $this->_tpl_vars['quote']['aotype']; ?>
</td>
				<td>
					<a href="/BO/downloadpremiumquote.php?id=<?php echo $this->_tpl_vars['quote']['id']; ?>
" class="hint--left hint--info" data-hint="Download Quote"><i class="splashy-download"></i></a>
				</td>
			</tr>
        <?php endforeach; endif; unset($_from); ?>
    	</tbody>
	</table>
  </div>
</div>
