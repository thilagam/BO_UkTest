<?php /* Smarty version 2.6.19, created on 2016-03-28 13:55:15
         compiled from gebo/userlist/userlist-list.phtml */ ?>
<?php echo '
	<script type="text/javascript">
	$(document).ready(function(){
		$(".userdetailId").bind(\'click\',function(){
			var id = $(this).attr(\'rel\');
			//alert(id);
			//var id = getURLParameters(url, \'id\');
			getUserDetails(id);
		});

		function getURLParameters(url, id){
			return (RegExp(name + \'=\' + \'(.+?)(&|$)\').exec(url)||[,null])[1];
		}

		function getUserDetails(id)
		{
			//alert(id);
			var url="/userlist/get-details?&id="+id;
			$.ajax({
				url:url,
				type:"POST",
				success:function(data){
					//console.log(data);
					$("#userDetails").html(data);
				}
			});
		}
		
	});
	</script>
'; ?>


<div class="row-fluid">
	<div class="span12">
    <table class="table table-bordered table-striped">
		<tr>
			<th>Sl No</th>
			<th>Details</th>
			<th>Options</th>
		</tr>
		
		<?php $this->assign('i', 0); ?>
		<?php while ($this->_tpl_vars['i'] < $this->_tpl_vars['listCount']) { ?>
		<tr>
			<td><?php echo $this->_tpl_vars['i']+1; ?>
</td>
			<td>
				<?php $_from = $this->_tpl_vars['list'][$this->_tpl_vars['i']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
					<?php echo $this->_tpl_vars['name']; ?>
:<?php echo $this->_tpl_vars['value']; ?>
<br />
				<?php endforeach; endif; unset($_from); ?>
			</td>
			<td>
				<a href="javscript:void(0);" rel="<?php echo $this->_tpl_vars['list'][$this->_tpl_vars['i']]['ID']; ?>
"  class="userdetailId">Edit</a>
			</td>
		</tr>
		<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
		<?php } ?>
	</table>
	<div id="userDetails">
		<h5>userdetail</h5>
	</div>
  	</div>
</div> 