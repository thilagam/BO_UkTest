<?php /* Smarty version 2.6.19, created on 2013-10-03 13:04:02
         compiled from gebo/contract/article-list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/contract/article-list.phtml', 76, false),array('modifier', 'stripslashes', 'gebo/contract/article-list.phtml', 80, false),array('modifier', 'truncate', 'gebo/contract/article-list.phtml', 81, false),array('modifier', 'date_format', 'gebo/contract/article-list.phtml', 83, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >

    $(document).ready(function() {	
	
       if($(\'#article_list\').length) {
                $(\'#article_list\').dataTable({
                    "sPaginationType": "bootstrap",
					"iDisplayLength" : '; ?>
<?php echo $this->_tpl_vars['paginationlimit']; ?>
<?php echo ',
                     "sDom": "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
					"aoColumns": [
						{ "sType": "formatted-num" },
						{ "sType": "string" },
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
				Articles
			</li>			
		</ul>
	</div>
</nav>

<div class="row-fluid">
  <div class="span12">
    <h3 class="heading">Articles
		<a class="btn btn-gebo1 pull-right" href="/contract/create-article?submenuId=ML7-SL3">
			<i class="splashy-application_windows_add"></i>
			<span style="vertical-align: text-bottom;"> Cr&eacute;er un nouveau</span>
		</a>
	</h3>	    
       
	<table class="table table-striped table-bordered dTableR" id="article_list">
		<thead>
			<tr>
				<th>S.No.</th>
				<th>Titre de l'article</th>
				<th>Client</th>
				<th>Titre de la livraison</th>
				<th>Date de livraison</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php if (count($this->_tpl_vars['paginator']) > 0): ?>
			<?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['article_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['article_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['article_loop']['iteration']++;
?>
				<tr>
				   <td><?php echo ($this->_foreach['article_loop']['iteration']-1)+1; ?>
 </td>
				   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
				   <td id="email"><?php if ($this->_tpl_vars['article']['company_name'] != ''): ?><?php echo $this->_tpl_vars['article']['company_name']; ?>
 <?php else: ?> <a href="javascript:void(0);" title="<?php echo $this->_tpl_vars['article']['email']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['email'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 16, "...", true) : smarty_modifier_truncate($_tmp, 16, "...", true)); ?>
</a><?php endif; ?></td>
				   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['delivery'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
				   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['delivery_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateformat']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateformat'])); ?>
</td>
				   <td>
					<a class="sepV_a" href="/contract/create-article?submenuId=ML7-SL3&action=edit&aid=<?php echo $this->_tpl_vars['article']['id']; ?>
"><i class="icon-pencil  hint--left  hint--info" data-hint="Edit"></i></a>
					<a class="sepV_a" href="/contract/create-article?submenuId=ML7-SL3&action=clone&aid=<?php echo $this->_tpl_vars['article']['id']; ?>
"><i class="splashy-document_copy  hint--left  hint--info" data-hint="Clone"></i></a>
				   </td>
				   
				</tr>

		<?php endforeach; endif; unset($_from); ?>		 
		<?php endif; ?>	
					
		</tbody>
	</table>
                        
  </div>
</div>    