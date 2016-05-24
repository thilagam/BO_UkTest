<?php /* Smarty version 2.6.19, created on 2014-12-02 12:31:33
         compiled from gebo/proofread/validrefusedarts.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/proofread/validrefusedarts.phtml', 82, false),array('modifier', 'escape', 'gebo/proofread/validrefusedarts.phtml', 82, false),array('modifier', 'wordwrap', 'gebo/proofread/validrefusedarts.phtml', 82, false),array('modifier', 'date_format', 'gebo/proofread/validrefusedarts.phtml', 87, false),)), $this); ?>
<?php echo '
<script language="javascript">
	$(document).ready(function(){
		$("#artname").chosen({ allow_single_deselect: true });	

		$(\'#start_date\').datepicker({language: \'fr\'}).on(\'changeDate\', function(ev){
			var dateText = $(this).val();//data(\'date\');
			
			var endDateTextBox = $(\'#end_date\');
			if (endDateTextBox.val() != \'\') {
				var testStartDate = new Date(dateText);
				var testEndDate = new Date(endDateTextBox.val());
				if (testStartDate > testEndDate) {
					endDateTextBox.val(dateText);
				}
			}
			else {
				endDateTextBox.val(dateText);
			};
			$(\'#end_date\').datepicker(\'setStartDate\', dateText);
			$(\'#start_date\').datepicker(\'hide\');
		});
		
		$(\'#end_date\').datepicker({language: \'fr\'}).on(\'changeDate\', function(ev){
			var dateText = $(this).val();//data(\'date\');
			var startDateTextBox = $(\'#start_date\');				
			if (startDateTextBox.val() != \'\') {
				var testStartDate = new Date(startDateTextBox.val());
				var testEndDate = new Date(dateText);
				if (testStartDate > testEndDate) {
					startDateTextBox.val(dateText);
				}
			}
			else {
				startDateTextBox.val(dateText);
			};
			$(\'#start_date\').datepicker(\'setEndDate\', dateText);
			$(\'#end_date\').datepicker(\'hide\');
		});
		$(\'#mission_table\').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/proofread/loadvalidrefusedarts"  ,
            "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 5,6 ] }]
        });
        $("#mission_table_length").css("float","left");
	});

	function clearAll()
    {
        $(\'#start_date\').attr(\'value\', \'\');
        $(\'#end_date\').attr(\'value\', \'\');
		$("#artname option").removeAttr("selected");
        $(\'#artname\').val(\'\').trigger("liszt:updated");
    }
</script>

'; ?>


<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Published Articles</h3>


		<table class="table table-bordered table-striped table_vam" id="mission_table">
			<thead>
				<tr>
					  <th>S no.</th>
					  <th>ARTICLE Title</th>
					  <th>Delivery Title</th>
					  <th>Writer</th>

					  <th>AO Dispatch</th>
					  <th>Details</th>
					  <th>Download</th>
				</tr>
			</thead>
			<tbody>
			<!--<?php $_from = $this->_tpl_vars['publishedmissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pubmission_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pubmission_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pubmission']):
        $this->_foreach['pubmission_loop']['iteration']++;
?>
				<tr>
				   <td><?php echo ($this->_foreach['pubmission_loop']['iteration']-1)+1; ?>
</td>
				   <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pubmission']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</td>
				   <td>
						<a href="/ongoing/ao-details?submenuId=ML2-SL4&client_id=<?php echo $this->_tpl_vars['pubmission']['owner']; ?>
&ao_id=<?php echo $this->_tpl_vars['pubmission']['delivery_id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pubmission']['deliveryTitle'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</a>
				   </td>
				   <td><?php echo $this->_tpl_vars['pubmission']['first_name']; ?>
 <?php echo $this->_tpl_vars['pubmission']['last_name']; ?>
</td>
				   <td><?php if ($this->_tpl_vars['pubmission']['delivery_date'] != "0000-00-00"): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['pubmission']['delivery_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
<?php else: ?>-<?php endif; ?></td>
				   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['pubmission']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
				   <td align="center">
						<a href="/proofread/archivecorrection?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleId=<?php echo $this->_tpl_vars['pubmission']['artId']; ?>
" class="hint--left hint--info" data-hint="Archive Details">
						<i class="splashy-information"></i></a>
					</td> 
				   <td><a class="hint--left hint--info" data-hint="Download Article" href="/proofread/downloadarticle?path=<?php echo $this->_tpl_vars['pubmission']['downloadpath'][0]['id']; ?>
" ><i class="splashy-document_small_download"></i></a></td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>-->
			</tbody>
		</table>
	</div>
</div>




