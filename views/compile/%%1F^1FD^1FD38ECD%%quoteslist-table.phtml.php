<?php /* Smarty version 2.6.19, created on 2016-04-28 08:53:27
         compiled from gebo/userlist/quoteslist-table.phtml */ ?>
<?php echo '
	<script type="text/javascript">
	$(document).ready(function(){
		$("#loadmore").bind("click",function(){
			loadTable();
		});
		function loadTable()
		{
			$.ajax({
				url:"/userlist/load-quotes",
				data:{
					count:$("#quotes_list tbody tr").length,
					cname:$("#clientname").val(),
					cstatus:$("#clientstatus").val()
				},
				type:"POST",
				success:function(data){
					$("#records").html(data);
				}
			});
		}
	});
	</script>
'; ?>

<table class="table table-bordered table-striped datatable" id="quotes_list">
<thead>
	<tr>
		<th>Client</th>
		<th>Category</th>
		<th>Quote Title</th>
		<th>Date of creation</th>
		<th>Created By</th>
		<th>Status</th>
		<th>Turn over</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
	<?php $_from = $this->_tpl_vars['quotesList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['list']['client']; ?>
</td>
			<td><?php echo $this->_tpl_vars['list']['category']; ?>
</td>
			<td><?php echo $this->_tpl_vars['list']['title']; ?>
</td>
			<td><?php echo $this->_tpl_vars['list']['created_at']; ?>
</td>
			<td><?php echo $this->_tpl_vars['list']['created_by']; ?>
</td>
			<td><?php echo $this->_tpl_vars['list']['status']; ?>
</td>
			
			<?php if ($this->_tpl_vars['list']['curency'] == 'euro'): ?>
				<td><?php echo $this->_tpl_vars['list']['turn_over']; ?>
 &euro;</td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['list']['curency'] == 'pound'): ?>
				<td><?php echo $this->_tpl_vars['list']['turn_over']; ?>
 &pound;</td>
			<?php endif; ?>
			<td><?php echo $this->_tpl_vars['list']['action']; ?>
</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</tbody>
</table>

<button id="loadmore" class="btn btn-primary">Load more..</button>