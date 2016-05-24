<?php /* Smarty version 2.6.19, created on 2014-12-01 12:51:49
         compiled from gebo/ongoing/list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/ongoing/list.phtml', 78, false),array('function', 'math', 'gebo/ongoing/list.phtml', 145, false),array('modifier', 'stripslashes', 'gebo/ongoing/list.phtml', 142, false),array('modifier', 'wordwrap', 'gebo/ongoing/list.phtml', 142, false),array('modifier', 'date_format', 'gebo/ongoing/list.phtml', 144, false),array('modifier', 'zero_cut', 'gebo/ongoing/list.phtml', 156, false),)), $this); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<?php echo '
<script type="text/javascript" >

    $(document).ready(function() {
	$("#manager_id").chosen({allow_single_deselect: true});
	//onload getting deliveries linked to client
			var client_id=$("#clients").val();
			fnloaddeliveries(client_id,\'\');
	
       if($(\'#ongoing_list\').length) {
                $(\'#ongoing_list\').dataTable({
                    "sPaginationType": "bootstrap",
					"iDisplayLength" : 25,
                     "sDom": "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
					"aoColumns": [
						{ "sType": "formatted-num" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "eu_date" },
						{ "sType": "string" },
						{ "sType": "string" },
						/*{ "sType": "natural" },
						{ "sType": "natural" },*/
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
<!--<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li>
				<a href="/index"><i class="icon-home"></i></a>
			</li>
			<li>
				<a>Ongoing AO</a>
			</li>			
		</ul>
	</div>
</nav>-->

<div class="row-fluid">
  <div class="span12">
    <h3 class="heading">ONGOING / EDIT OF TENDER		
			<a class="btn btn-gebo1" id="ong_search">Search</a>
	</h3>
	<div class="<?php if (! $_GET['search']): ?>hide<?php endif; ?> well clearfix" id="search_block">
		<div class="row-fluid">
			<form action=<?php echo $_SERVER['REQUEST_URI']; ?>
 method="get" id="searchform" name="searchform" >				
				 <input type="hidden" id="submenuId" name="submenuId"  value="<?php echo $this->_tpl_vars['submenuId']; ?>
"/>
				<!--<div class="row-fluid">-->
					<span class="sepV_c">
						<input type="text" placeholder="From" id="dp_start" name="startdate" readonly data-date-format="dd-mm-yyyy" value="<?php echo $_GET['startdate']; ?>
"/>
					</span>
					<span class="sepV_c">
						<input type="text"  placeholder="To" id="dp_end" name="enddate" readonly data-date-format="dd-mm-yyyy" value="<?php echo $_GET['enddate']; ?>
"/>
					</span>
					<span class="sepV_c">
						<select name="client_id" id="clients" data-placeholder="Clients" onChange="fnloaddeliveries(this.value);">
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['client_array'],'selected' => $_GET['client_id']), $this);?>
	
						</select>	
					</span>									
					<span class="sepV_c"  id="aolistall">
						<select name="ao_id" id="deliveries" data-placeholder="Deliveries">
							<option value=""></option>
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['delivery_array'],'selected' => $_GET['ao_id']), $this);?>
				  
						</select>	
						  
					</span>
					<span class="sepV_c" style="float:left;clear:both;">
						<select name="manager_id" id="manager_id" data-placeholder="Project manager">
							<option value="0"></option>
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['projectm_array'],'selected' => $this->_tpl_vars['manager_id']), $this);?>
	
						</select>	
					</span>	
					<span class="sepV_c">
						<select id="sorttype" name="sorttype" data-placeholder="Trier par">
							<option value=""></option>
							<option value="all" <?php if ($_GET['sorttype'] == 'all' || $_GET['sorttype'] == ''): ?>selected<?php endif; ?>>ALL</option>
							<option value="onging" <?php if ($_GET['sorttype'] == 'onging'): ?>selected<?php endif; ?>>Ongoing</option>
							<option value="close" <?php if ($_GET['sorttype'] == 'close'): ?>selected<?php endif; ?>>Closed</option>
							<option value="new" <?php if ($_GET['sorttype'] == 'new'): ?>selected<?php endif; ?>>New</option>
						</select>	
					</span>
					<span class="sepV_c">
						<select id="pay_status" name="pay_status" data-placeholder="Payment Status">
							<option value=""></option>
							<option value="all" <?php if ($_GET['pay_status'] == 'all'): ?>selected<?php endif; ?>>ALL</option>
							<option value="paid" <?php if ($_GET['pay_status'] == 'paid'): ?>selected<?php endif; ?>>Paid</option>
							<option value="notpaid" <?php if ($_GET['pay_status'] == 'notpaid'): ?>selected<?php endif; ?>>Pending</option>							
						</select>	
					</span>					
				<!--</div>	
				<div class="row-fluid">-->		
					<span class="sepV_c">
						<button class="btn btn-danger pull-center" id="search" name="search" type="submit" value="search" >Search</button>
						<button class="btn btn-info pull-center" id="clear" name="clear" type="button" value="clear" onclick="clearAll();" >Clear</button>	
					</span>
				<!--</div>-->
			</form>	
		  
		</div>
	</div>     
       
	<table class="table table-striped table-bordered dTableR" id="ongoing_list">
		<thead>
			<tr>
				<th>S.No.</th>
				<th>AO Title</th>
				<th>Client</th>
				<th>Date of creation</th>
				<th>Project manager</th>
				<th>Progression</th>
				<!--<th>Pay&eacute; (&euro;)</th>
				<th>Total (&euro;)</th>-->
				<th>Type</th>
			</tr>
		</thead>
		<tbody>
	<?php if ($this->_tpl_vars['ongoingAO'] | @ count > 0): ?>
		<?php $_from = $this->_tpl_vars['ongoingAO']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['aoDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['aoDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['delivery']):
        $this->_foreach['aoDetails']['iteration']++;
?> 
			<tr>
			  <td><?php echo ($this->_foreach['aoDetails']['iteration']-1)+1; ?>
</td>
              <td><div style="display:none;"><?php echo $this->_tpl_vars['delivery']['title']; ?>
</div><a href="/ongoing/ao-details?client_id=<?php echo $this->_tpl_vars['delivery']['user_id']; ?>
&ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
&submenuId=<?php echo $_GET['submenuId']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['delivery']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 40, "<br>", true) : smarty_modifier_wordwrap($_tmp, 40, "<br>", true)); ?>
</a></td>
			  <td><?php echo $this->_tpl_vars['delivery']['client']; ?>
</td>
			  <td><?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
			  <?php echo smarty_function_math(array('equation' => "a - b",'a' => $this->_tpl_vars['delivery']['totalArticle'],'b' => $this->_tpl_vars['delivery']['published_articles'],'assign' => 'pending_article'), $this);?>

			  <td><?php echo $this->_tpl_vars['delivery']['projectmanager']; ?>
</td>
			  <td>
			      <div style="display: none;"><?php echo $this->_tpl_vars['delivery']['progressbar']; ?>
</div>
                  <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $this->_tpl_vars['delivery']['progressbar']; ?>
" aria-valuemin="0" aria-valuemax="100"
                      <?php if ($this->_tpl_vars['delivery']['progressbar'] == 0): ?> style="width: 100%;  background:#E3E5F4;"
                      <?php else: ?> style="width: <?php echo $this->_tpl_vars['delivery']['progressbar']; ?>
%; color:#000000; background:<?php echo $this->_tpl_vars['delivery']['progresscolorcode']; ?>
;"<?php endif; ?>>
                      <?php echo $this->_tpl_vars['delivery']['progressbar']; ?>
%  </div>
                  </div>
			  </td>
			  <!--<td><span class="label label-success"><?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['amount_paid'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span></td>
			  <td><span class="label label-inverse"><?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['totalAmount'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span></td>-->
			  <td>
					<?php if ($this->_tpl_vars['delivery']['missiontest'] == 'yes'): ?>
						<i class="splashy-star_boxed_half hint--left  hint--info" data-hint="Test Mission"></i>
					<?php elseif ($this->_tpl_vars['delivery']['premium_option'] != '0' && $this->_tpl_vars['delivery']['premium_option'] != ''): ?>
						<i class="splashy-star_boxed_full hint--left  hint--warning" data-hint="Premium Mission"></i>
					<?php else: ?>
						<i class="splashy-star_boxed_empty hint--left  hint--info" data-hint="Freedom Mission" ></i>
					<?php endif; ?>					
			 </td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>	
					
		</tbody>
	</table>
                        
  </div>
</div>
    <input type="hidden" id="hide_total" name="hide_total"  />

<!--///for the article profiles popup///-->
<div class="modal4 hide fade" id="artprofile">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h3>Article Profiles</h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>




