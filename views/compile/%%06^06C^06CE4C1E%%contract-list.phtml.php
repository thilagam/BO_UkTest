<?php /* Smarty version 2.6.19, created on 2013-11-27 08:32:10
         compiled from gebo/contract/contract-list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/contract/contract-list.phtml', 74, false),array('modifier', 'stripslashes', 'gebo/contract/contract-list.phtml', 78, false),array('modifier', 'truncate', 'gebo/contract/contract-list.phtml', 79, false),array('modifier', 'date_format', 'gebo/contract/contract-list.phtml', 80, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >

    $(document).ready(function() {	
	
       if($(\'#contract_list_form\').length) {
                $(\'#contract_list_form\').dataTable({
                    "sPaginationType": "bootstrap",
					"iDisplayLength" : '; ?>
<?php echo $this->_tpl_vars['paginationlimit']; ?>
<?php echo ',
                     "sDom": "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
					"aoColumns": [
						{ "sType": "formatted-num" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "eu_date" },
						{ "sType": "string" }
					],
					"aaSorting": [[ 0, "asc" ]],
                    "oTableTools": {
                        "aButtons": [
                            "copy",
                            "print",
                            {
                                "sExtends":    "collection",
                                "sButtonText": \'Save <span class="caret" />\',
                                "aButtons":    [ "csv", "xls", "pdf" ]
                            }
                        ],
                        "sSwfPath": "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                    }
                });
            }
    });
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
				Contract list
			</li>			
		</ul>
	</div>
</nav>

<div class="row-fluid">
  <div class="span12">
    <h3 class="heading">Contract Management
		<a class="btn btn-gebo1 pull-right" href="/contract/create-contract?submenuId=ML7-SL1">
			<i class="splashy-application_windows_add"></i>
			<span style="vertical-align: text-bottom;"> Create new</span>
		</a>
	</h3>	    
       
	<table class="table table-striped table-bordered dTableR" id="contract_list_form">
		<thead>
			<tr>
				<th>S.No.</th>
				<th>contract title</th>
				<th>Client</th>
				<th>Date of signature</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php if (count($this->_tpl_vars['paginator']) > 0): ?>
			<?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contract_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contract_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contract']):
        $this->_foreach['contract_loop']['iteration']++;
?>
				<tr>
				   <td><?php echo ($this->_foreach['contract_loop']['iteration']-1)+1; ?>
 </td>
				   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
				   <td id="email"><?php if ($this->_tpl_vars['contract']['company_name'] != ''): ?><?php echo $this->_tpl_vars['contract']['company_name']; ?>
 <?php else: ?> <a href="javascript:void(0);" title="<?php echo $this->_tpl_vars['contract']['email']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['email'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 16, "...", true) : smarty_modifier_truncate($_tmp, 16, "...", true)); ?>
</a><?php endif; ?></td>
				   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['contract']['contract_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateformat'])); ?>
</td>
				   <td><a href="/contract/create-contract?submenuId=ML7-SL1&action=edit&cid=<?php echo $this->_tpl_vars['contract']['id']; ?>
"><i class="icon-pencil hint--left  hint--info" data-hint="Edit"></i></a></td>			   
				</tr>
			<?php endforeach; endif; unset($_from); ?>		 
		<?php endif; ?>	
					
		</tbody>
	</table>
                        
  </div>
</div>    