<?php /* Smarty version 2.6.19, created on 2015-05-05 10:27:39
         compiled from gebo/user/whitebookdownload.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/user/whitebookdownload.phtml', 155, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/datempicker.js"></script>
<script type="text/javascript" >
$(document).ready(function() {
		$(".uni_style").uniform(); 
		
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
		
		if($(\'#wtable\').length) {
			$(\'#wtable\').dataTable({
				"sPaginationType": "bootstrap",
				"iDisplayLength" : 25,
				 "sDom": "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"aoColumns": [
					{ "sType": "string" },
					{ "sType": "formatted-num" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" }
					
				],
				"aaSorting": [[ 1, "asc" ]],
				"oTableTools": {
					"aButtons": [
						"copy",
						"print",
						{
							"sExtends":    "collection",
							"sButtonText": \'Sauvegarder <span class="caret" />\',  
							"aButtons":    [ "csv", "xls", "pdf" ]
						}
					],
					"sSwfPath": "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
				}
			});
		}
		
		function clearAll()
        {
			$(\'#start_date\').attr(\'value\', \'\');
            $(\'#end_date\').attr(\'value\', \'\'); 
		}
 });
 
	function deleteWBdownl()
	{
		 var $b = $(\'input[type=checkbox]\');
		 var countselected = $b.filter(\':checked\').length;
		
		   if(countselected == 0)
		   {
				smoke.alert("Please select atleast one");
			   return false;
		   }
		   else
		   {
				if(confirm("Do you really want to delete these records?"))
				{
					return true;
				}
				else
				  return false;
		   }	
	}
 </script>
'; ?>


<div class="row-fluid">	
	<div class="span12">
		<h3 class="heading">WHITE BOOK DOWNLOADS<a class="btn btn-gebo1 alignright" data-toggle="modal" data-target="#uploadWB" href="/user/upload-whitebook">Upload White book</a><a onclick="$('#searchblock').toggle();"  class="btn btn-gebo1" style="float:right">Search</a></h3>
		<form action="/user/whitebook-download?submenuId=ML10-SL9" method="GET" name="formsearchpoll">
			<div class="hide well clearfix" id="searchblock">
				<input type="hidden" name="submenuId" id="submenuId" value="<?php echo $_GET['submenuId']; ?>
" />
				<table width="100%">
					<tr>
						<td valign="top">Date de création</td>
						<td nowrap>
							<input type="text" id="start_date" name="start_date" value="<?php echo $this->_tpl_vars['start_date']; ?>
" placeholder="From" data-date-format="dd/mm/yyyy" />
							<input type="text" id="end_date" name="end_date"  value="<?php echo $this->_tpl_vars['end_date']; ?>
" placeholder="To" data-date-format="dd/mm/yyyy" />
						</td>
						<td colspan="" align="right">
							<input type="submit" value="Search" name="search_submit" id="search_submit" class="btn btn-success"/>
							<input type="reset" value="Clear" name="clearall" id="clearall" class="btn btn-danger" onclick="clearAll();"/>
						</td>
					</tr>
				</table>
			</div>
		</form>
		
		<form action="/user/whitebook-download?submenuId=ML10-SL9" method="post" >
			<table class="table table-bordered table-striped table_vam" id="wtable">
				<thead>
					<tr>
						<th></th>
						<th>ID N°</th>
						<th>Name</th>
						<th>Surname</th>
						<th>Email</th>
						<th>Status</th>
						<th>Created</th>
						<th>Updated at</th>
						<th>Contact</th>
					</tr>
				</thead>
				<tbody>
					<?php $_from = $this->_tpl_vars['wlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['wb_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['wb_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['wb_item']):
        $this->_foreach['wb_loop']['iteration']++;
?>
						<tr>
							<td>
								<label class="uni-checkbox">
									<input type="checkbox" name="deletecheck[]" id="deletecheck_<?php echo $this->_tpl_vars['wb_item']['id']; ?>
" value="<?php echo $this->_tpl_vars['wb_item']['id']; ?>
" class="uni_style"/>
								</label>	
							</td>
							<td><?php echo ($this->_foreach['wb_loop']['iteration']-1)+1; ?>
</td>
							<td><?php echo $this->_tpl_vars['wb_item']['name']; ?>
</td>
							<td><?php echo $this->_tpl_vars['wb_item']['surname']; ?>
</td>
							<td><?php echo $this->_tpl_vars['wb_item']['email']; ?>
</td>
							<td><?php echo $this->_tpl_vars['wb_item']['status']; ?>
</td>
							<td><div style="display:none;"><?php echo $this->_tpl_vars['wb_item']['created_at']; ?>
</div><?php echo ((is_array($_tmp=$this->_tpl_vars['wb_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</td>
							<td><div style="display:none;"><?php echo $this->_tpl_vars['wb_item']['updated_at']; ?>
</div><?php echo ((is_array($_tmp=$this->_tpl_vars['wb_item']['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</td>
							<td><?php echo $this->_tpl_vars['wb_item']['contactbo']; ?>
</td>
						</tr>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table> 
			<div style="float:left;padding:20px 0px 10px 20px;">
				<input type="submit" class="btn btn-info" name="deletewb" id="deletewb"  onClick="return deleteWBdownl();" value="Delete" />
			 </div>
		</form>
	</div>	
</div>

<div class="modal hide fade" id="uploadWB">
    <div class="modal-header">
        <button  class="close" onclick="closePopup('uploadWB');">&times;</button>
        <h3>Upload White Book</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>