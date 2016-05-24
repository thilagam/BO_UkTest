<?php /* Smarty version 2.6.19, created on 2014-11-18 08:17:05
         compiled from gebo/ao/premiumoptions.phtml */ ?>
<?php echo '
     <script type="text/javascript" >
		$(document).ready(function() {
			$(\'#premiumtable\').dataTable({
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"aaSorting": [[ 0, "asc" ]],
				"aoColumns": [
					{ "sType": "formatted-num" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" } 
				]
			});
		} );

        function confrimDelete()
        {
            var c = confirm(\'Do you really want to delete the option ?\');
            if(c == true)
            {
               return true;
            }
            else
            {
                return false;
            }

        }
 </script>
'; ?>

	
<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Premium Options :: List of Options</h3>
		<div align="right" style="padding-bottom:10px;"><a href="/ao/addpremoption?submenuId=ML2-SL8" class="btn btn-info">New Option</a></div>
		<table class="table table-bordered table-striped table_vam" id="premiumtable">
			<thead>
				<tr>
				  <th>SL NO.</th>
				  <th>options</th>
				  <th>Fo Price</th>
				  <th>Bo Price</th>
				  <th>Description</th>
				  <th>Status</th>
				  <th>Actions</th>
				</tr>
			</thead>
		   <tbody>
			<?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['optionsgrid'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['optionsgrid']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['premoptions_key'] => $this->_tpl_vars['premoptions']):
        $this->_foreach['optionsgrid']['iteration']++;
?>
			<tr>
			   <td><?php echo ($this->_foreach['optionsgrid']['iteration']-1)+1; ?>
</td>
			   <td><?php echo $this->_tpl_vars['premoptions']['option_name']; ?>
</td>
			   <td><?php echo $this->_tpl_vars['premoptions']['option_price']; ?>
</td>
			   <td><?php echo $this->_tpl_vars['premoptions']['option_price_bo']; ?>
</td>
			   <td><?php echo $this->_tpl_vars['premoptions']['description']; ?>
</td>
			   <td><?php echo $this->_tpl_vars['premoptions']['status']; ?>
</td>
			   <td>
					<a href="editpremoption?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&optionId=<?php echo $this->_tpl_vars['premoptions']['id']; ?>
" class="hint--left hint--info" data-hint="Edit Option">
						<i class="splashy-application_windows_edit"></i>
					</a>&nbsp;
					<a href="deletepremoption?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&optionId=<?php echo $this->_tpl_vars['premoptions']['id']; ?>
" onclick="return confrimDelete();" class="hint--left hint--info" data-hint="Delete Option">
						<i class="splashy-remove"></i>
					</a>
			   </td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
			</tbody>
		</table>
	</div>
</div>	
      
		




