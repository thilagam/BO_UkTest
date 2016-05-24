<?php /* Smarty version 2.6.19, created on 2013-09-23 13:28:30
         compiled from gebo/contract/view-delivery.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/contract/view-delivery.phtml', 62, false),array('modifier', 'stripslashes', 'gebo/contract/view-delivery.phtml', 66, false),array('modifier', 'date_format', 'gebo/contract/view-delivery.phtml', 104, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
function fnvalidatedelivery(deliveryId)
{
	if(deliveryId!=\'\')
	{	
		   var target_page = "/contract/update-status?deliveryId="+deliveryId;
				//alert(target_page);
				$.post(target_page, function(data){
						
						$("#status").html(data);
					
					});
				
			
	}
}
</script>
'; ?>

<!--Bread Crumbs-->
<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li>
				<a href="/index"><i class="icon-home"></i></a>
			</li>
			<li>
				<a>Boursorama</a>
			</li>
			<li>
				<a href="/contract/delivery-list?submenuId=ML7-SL2">Delivery list</a>
			</li>			
			<li>
				View Delivery :: <?php echo $this->_tpl_vars['delivery_name']; ?>

			</li>
		</ul>
	</div>
</nav>

<div class="row-fluid">
	<div class="w-box">
		<div class="w-box-header">
			Informations sur l'appel d'offre
		</div>
		<div class="w-box-content cnt_a">
		<table class="table table-striped table-bordered">
			<tr>
				<th colspan="2" style="width:40%">AO INFO</th>
				<th colspan="2" style="width:60%">MISSIONS INFO</th>
			</tr>
			<tr>
				<th>Client</th>
				<td><?php echo $this->_tpl_vars['client']; ?>
</td>	
				<td colspan="2" rowspan="5">
					<table class="table table-striped table-bordered">          
						<tr>
							<th>S.No.</th>
							<th>Mission Title</th>
							<th>Category</th>
							<th>Action</th>
						</tr>
						<?php if (count($this->_tpl_vars['articleDetails']) > 0): ?>
						  <?php $_from = $this->_tpl_vars['articleDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['article_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['article_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['article_loop']['iteration']++;
?>
							  <tr>
								<td><?php echo ($this->_foreach['article_loop']['iteration']-1)+1; ?>
.</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
								<td><?php echo $this->_tpl_vars['article']['category']; ?>
</td>
								<td>
									<?php if ($this->_tpl_vars['article']['article_exist'] == 'exists'): ?> 
										<a class="label label-warning" href="/contract/download-file?type=article&aid=<?php echo $this->_tpl_vars['article']['id']; ?>
">
											Download
										</a>
									<?php else: ?>
										<span class="label">Not Exist</span> 
									<?php endif; ?>									
									<?php if ($this->_tpl_vars['article']['xml_exist'] == 'exists'): ?> <a class="label label-info" href="/contract/parse-xml?aid=<?php echo $this->_tpl_vars['article']['id']; ?>
" target="_blank">Parse XML</a> <?php endif; ?>
								</td>
							  </tr>
						  <?php endforeach; endif; unset($_from); ?>
						<?php else: ?>
						  <tr>
							<td colspan="4"><b>No Articles Exist</b></td>
						  </tr>
						<?php endif; ?>
						</table>
				
				
				</td>	
			</tr>
			<tr>
				<th>Titre du contrat</th>
				<td><?php echo $this->_tpl_vars['contract_name']; ?>
</td>				
			</tr>
			<tr>
				<th>Chief Editor </th>
				<td><?php echo $this->_tpl_vars['chiefEditor']; ?>
</td>
			</tr>
			<tr>
				<th>Titre de la livraison</th>
				<td><?php echo $this->_tpl_vars['delivery_name']; ?>
</td>				
			</tr>						
			<tr>						
				<th>Date de livraison</th>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['delivery_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>				
			</tr>			
			<tr>
				<td colspan="4">
					 <?php if (count($this->_tpl_vars['articleDetails']) > 0): ?><a class="btn btn-gebo" href="/contract/xml-creation-popup?deliveryId=<?php echo $this->_tpl_vars['delivery_id']; ?>
" data-toggle="modal" role="button" data-target="#create_xml_modal" id="create_xml">Create XML</a><?php endif; ?>
					 <span id="status">
					 <?php if ($this->_tpl_vars['status'] == 'validated'): ?> <span class="label label-success">Validated</span> <?php else: ?> <button class="btn btn-inverse" type="button" onclick="fnvalidatedelivery(<?php echo $this->_tpl_vars['delivery_id']; ?>
)"><i class="splashy-check"></i> Validate</button><?php endif; ?>
					 </span>
					 
					<?php if ($this->_tpl_vars['spec1']): ?><a class="btn btn-warning" href="/contract/download-file?type=spec&did=<?php echo $this->_tpl_vars['delivery_id']; ?>
&index=1">Spec1 Download</a><?php endif; ?> 					 
					<?php if ($this->_tpl_vars['spec2']): ?><a class="btn btn-warning" href="/contract/download-file?type=spec&did=<?php echo $this->_tpl_vars['delivery_id']; ?>
&index=2">Spec2 Download</a><?php endif; ?>
					<?php if (! $this->_tpl_vars['spec1'] && ! $this->_tpl_vars['spec2']): ?>	<span class="label label-danger">No Brief</span><?php endif; ?>
					<?php if ($this->_tpl_vars['zip_xml']): ?> <a class="btn btn-success" href="/contract/download-file?type=zip&did=<?php echo $this->_tpl_vars['delivery_id']; ?>
">Download XML</a> <?php endif; ?> 
					 
				</td>				
			</tr>
		</table>
		</div>
	</div>					
</div>

<!--///for the article edit popup///-->
<div class="modal container hide fade" id="create_xml_modal">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Create XML</h3>		
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>