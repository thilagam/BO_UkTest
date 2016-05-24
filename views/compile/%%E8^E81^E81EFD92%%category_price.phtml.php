<?php /* Smarty version 2.6.19, created on 2015-03-24 12:52:44
         compiled from gebo/ao/category_price.phtml */ ?>
<?php echo '
    <script type="text/javascript" >
		$(document).ready(function(){
			$(\'#categorytable\').dataTable({
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
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
		});

		function UpdatePricecatrgory(cat)
		{
			target_page = "/ao/categorypricepopup?cat="+cat;

			query = $("#myForm").serialize();

			 $.get(target_page, query, function(data){
				$("#categoryform").html(data);
			});
		}
	</script>

 '; ?>


<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Price statistics by category</h3>
		<table class="table table-bordered table-striped table_vam" id="categorytable">
			<thead>
				<tr>
				   <th>ID </th>
				   <th>Category</th>
				   <th>Price per character</th>
				   <th>Price per word</th>
				   <th>Price per sheet</th>
				   <th>Action</th>
				</tr>
            </thead>
		<tbody>
			<?php $_from = $this->_tpl_vars['PriceList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cat_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['price_item']):
        $this->_foreach['cat_loop']['iteration']++;
?>
				<tr>
				   <td><?php echo ($this->_foreach['cat_loop']['iteration']-1)+1; ?>
 </td>
				   <td><?php echo $this->_tpl_vars['categories_array'][$this->_tpl_vars['price_item']['category_id']]; ?>
</a></td>
				   <td><?php echo $this->_tpl_vars['price_item']['charprice']; ?>
</td>
				   <td><?php echo $this->_tpl_vars['price_item']['wordprice']; ?>
</td>
				   <td><?php echo $this->_tpl_vars['price_item']['sheetprice']; ?>
</td>
				   <td><a data-toggle="modal" data-target="#categoryupdate" OnClick="UpdatePricecatrgory('<?php echo $this->_tpl_vars['price_item']['category_id']; ?>
');"><i class="splashy-application_windows_edit"></i></a></td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</tbody>
		 </table>
    </div>
</div>	
		
<div class="modal hide fade" id="categoryupdate">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h3>Update Category Price </h3>
    </div>
    <div class="modal-body" id="categoryform">
	</div>
    <div class="modal-footer">
    </div>
</div>