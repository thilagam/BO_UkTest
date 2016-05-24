<?php /* Smarty version 2.6.19, created on 2015-10-07 15:50:40
         compiled from gebo/quote/weekly-quotes.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/weekly-quotes.phtml', 19, false),array('modifier', 'ceil', 'gebo/quote/weekly-quotes.phtml', 37, false),)), $this); ?>


<div class="row-fluid">
			<div class="span12">
				<h1 class="heading">Quotes Weekly Report (<?php echo $this->_tpl_vars['weely_table_details']['startdate']; ?>
 to <?php echo $this->_tpl_vars['weely_table_details']['enddate']; ?>
)</h1>
				<a href="/quote/weekly-quotes?submenuId=ML13-SL4&download=report" class="btn btn-primary pull-right">Download</a>
				<ul class="nav nav-tabs">
					<li class="<?php if ($_GET['active'] == ''): ?> active <?php endif; ?>"><a href="#weekly" data-toggle="tab">Total Quote List</a></li>
					<li class="<?php if ($_GET['active'] == 'weekly-list'): ?> active <?php endif; ?>"><a href="#weekly-list" data-toggle="tab">Quotes Details</a></li>				
				</ul>	
				
				
				<div class="tab-content">
					<div id="weekly" class="tab-pane fade <?php if ($_GET['active'] == ''): ?> in active <?php endif; ?>">
							<table class="table table-bordered table-hover table_vam" id="weekly_quotesList" >
							
							<tbody>
								
						<?php if (count($this->_tpl_vars['weely_table_details']) > 0): ?>
						
							<thead>
								<tr>								  
								   <th>Total <?php echo $this->_tpl_vars['weely_table_details']['quotetotal']; ?>
 in FR</th>
								   <th><?php echo $this->_tpl_vars['weely_table_details']['turnover']; ?>
  Euros</th>
								   <th><?php echo $this->_tpl_vars['weely_table_details']['quotetotal']; ?>
</th>
								   <th>Average <?php echo $this->_tpl_vars['weely_table_details']['signature']; ?>
 % of signature</th>
								   
								</tr>
							</thead>
						
							   <?php if (count($this->_tpl_vars['user_check_array']) > 0): ?>
									<?php $_from = $this->_tpl_vars['user_check_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user_check_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['user_check_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user_check_item']):
        $this->_foreach['user_check_loop']['iteration']++;
?>
									  <tr>
									  <td><?php echo $this->_tpl_vars['user_check_item']['saleinchange']; ?>
</td>
									  <td><?php echo $this->_tpl_vars['user_check_item']['trunover']; ?>
</td>
									  <td><?php echo $this->_tpl_vars['user_check_item']['count']; ?>
</td>
									  <td><?php echo ((is_array($_tmp=$this->_tpl_vars['user_check_item']['signature']/$this->_tpl_vars['user_check_item']['count'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
</td>
									  </tr>
									<?php endforeach; endif; unset($_from); ?>
								<?php endif; ?>				
				<?php endif; ?>
				</table>
					</div>
					
					<div id="weekly-list" class="tab-pane fade <?php if ($_GET['active'] == 'weekly-list'): ?> in active <?php endif; ?>">
						
						<table class="table table-bordered table-hover table_vam" id="weekly_details" >
							<thead>
								<tr>								  
								  
								   <th>Client Name</th>
								   <th>Nom devis</th>
								   <th>Sales in charge</th>
								   <th>Creation date</th>
								   <th>% of signature</th>
								   <th>Turnover</th>
								   <th>Status</th>
								   <th>Status 2</th>
								   <th>Notions of timings</th>
								   <th>Comment</th>
								  	</tr>
								  	</thead>
								  
								<?php if (count($this->_tpl_vars['weely_table_quote']) > 0): ?>
								<?php echo $this->_tpl_vars['quoteloophtml']; ?>

							<?php endif; ?>	
						
						</table>
						</div>
					
					
					
				</div>

			</div>
</div>

<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
<script>
	$(\'#weekly_details\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
			"iDisplayLength" : 50,
            "aaSorting": [[ 3, "desc" ]],
            "aoColumns": [               
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
				{ "sType": "eu_date" },
				{ "sType": "string" },
			    { "sType": "string" },
				{ "sType": "string" },
                { "sType": "natural" },	
				{ "sType": "string" },				
				{ "sType": "string" }
				
            ]
        });
	</script>


<style type="text/css">
.dropdown-menu
{
right:0;
left: auto;
}
.turnover
{
font-size:18px;
font-weight: 500;
}
.dataTables_wrapper
{
	/*padding-bottom:195px;*/
	position:inherit;
}
.icon-time
{
top:0px;
}
.alert{
margin:3px;
padding:3px;
}

.btn-group
{
	position:static;
}

.dropdown-menu
{
	top:auto;
}

.version-change
{
	cursor: pointer;
}

.dataTables_wrapper .top, .dataTables_wrapper .bottom
{
	padding:0;
	background:#fff;
}

.popover-content td
{
	border-left:none;
}

#cls_quotesList_wrapper
{
	padding-bottom:140px;
}
#weekly-list{
	margin-top:25px;
	}
</style>
'; ?>

