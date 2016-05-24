<?php /* Smarty version 2.6.19, created on 2015-12-18 11:45:50
         compiled from gebo/quizz/listallquizz.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/quizz/listallquizz.phtml', 169, false),array('modifier', 'count', 'gebo/quizz/listallquizz.phtml', 215, false),array('modifier', 'stripslashes', 'gebo/quizz/listallquizz.phtml', 219, false),array('modifier', 'replace', 'gebo/quizz/listallquizz.phtml', 223, false),array('modifier', 'date_format', 'gebo/quizz/listallquizz.phtml', 224, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/datempicker.js"></script>
<script type="text/javascript" >
	$(document).ready(function() {
		$(\'#quizztable\').dataTable({
			"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
			"sPaginationType": "bootstrap",
			"aaSorting": [[ 6, "desc" ]],
			"aoColumns": [
				{ "sType": "formatted-num" },
				{ "sType": "string" },
				{ "sType": "string" },
				{ "sType": "string" },
				{ "sType": "string" },
				{ "sType": "string" },
				{ "sType": "eu_date" },
				{ "sType": "string" },
				{ "sType": "string" },
				{ "sType": "string" },
				{ "sType": "string" }
			]
		});
		$("#category").chosen({ disable_search: true });	
		$("#status").chosen({ disable_search: true });	
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
			
	});

	function participants(id){
		window.location="/quizz/listparticipants?submenuId=ML2-SL22&id="+id;
	}
	
    function clearAll()
    {
        $(\'#creation_date\').val(null);
        $(\'#quizztitle\').attr(\'value\',null);
		$("#status option").removeAttr("selected");
		$("#status").val(\'\').trigger("liszt:updated");
		$("#category option").removeAttr("selected");
		$("#category").val(\'all\').trigger("liszt:updated");   
    }
	
	function permanentdeleteQuizz(quizzid)
	{
		if(confirm("Do you really want to delete this Quizz Permanently?"))
		{
			$.ajax({
			type : \'post\', 
			url : \'/quizz/deletequizz\', 
			data :  \'quiz=\'+quizzid, 
			   
			success : function(response)
		   {
				smoke.alert("Quizz deleted successfully !!"); 	
				window.location.reload();
		   }
		});
		}
		else
			return false;
	}
	
	function deleteQuizz(quizzid)
	{
		smoke.confirm("Do you really want to delete this Quizz ",function(e){
			if (e)
			{
			   // window.location.href="users-list?submenuId=ML2-SL7&tab="+tab+"&delete=yes&userId="+userid;
				var target_page = "/quizz/changequizzstatus?status=2&quizz_id="+quizzid;
				$.post(target_page, function(data){ //alert(data);
					window.location.reload();
				});
			}
			else
			{
				return false;
			}
		});	
	}
	
	function changeStatusQuizz(quizzid, quizzstatus)
	{
		if(quizzstatus == 2)
		{
			var statusmsg = \'Active\';
			var param =1;
		}
		else
		{
			var statusmsg = \'Inactive\';
			var param =2;
		}
		smoke.confirm("Do you really want to make this Quizz "+statusmsg,function(e){
			if (e)
			{
			   // window.location.href="users-list?submenuId=ML2-SL7&tab="+tab+"&delete=yes&userId="+userid;
				var target_page = "/quizz/changequizzstatus?status="+param+"&quizz_id="+quizzid;
				$.post(target_page, function(data){ //alert(data);
					$(\'#quizzstatus_\'+quizzid).html("<a onclick=\\"changeStatusQuizz(\'"+quizzid+"\', \'"+param+"\');\\">"+statusmsg+"</a>");
					window.location.reload();
				});
			}
			else
			{
				return false;
			}
		});

	}
	
	function linkedao(quizz)
	{
		var target_page = "/quizz/quizzlinkedao?quizz="+quizz;

		$.post(target_page, function(data){   
			$("#linkedaocontent").html(data);
		});
	}
		
     </script>
'; ?>


<div class="row-fluid">
	<div class="span12">
    	<h3 class="heading">Quiz List<a onclick="$('#searchblock').toggle();"  class="btn btn-gebo1" style="float:right">Search</a></h3>
		 <form action="/quizz/listallquizz?submenuId=ML2-SL22" method="GET" id="searchform" name="searchform">
			<div class="hide well clearfix" id="searchblock">
				<input type="hidden" name="submenuId" id="submenuId" value="<?php echo $_GET['submenuId']; ?>
" />
				<table width="100%">
					<tr>
						<td valign="top">Title of Quiz</td>
						<td><input type="text" name="quizztitle" id="quizztitle" value="<?php echo $this->_tpl_vars['quizztitle']; ?>
" size="31"/></td>
						<td valign="top">Category</td>
						<td>
							<select name="category" id="category">
								<option value="all">All</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['categories'],'selected' => $this->_tpl_vars['category']), $this);?>

							</select>
						</td>
					</tr>
					<tr>
						<td valign="top">Status of Quiz</td>
						<td>
							 <select name="status" id="status">
								<option value="">ALL</option>
								<option value="1" <?php if ($this->_tpl_vars['status'] == '1'): ?>selected<?php endif; ?>>Active</option>
								<option value="2" <?php if ($this->_tpl_vars['status'] == '2'): ?>selected<?php endif; ?>>Inactive</option>
							</select>
						</td>
						<td valign="top">Date of creation</td> 
						<td>
							<input type="text" id="start_date" name="start_date" readonly="readonly" value="<?php echo $this->_tpl_vars['start_date']; ?>
" placeholder="From" data-date-format="dd-mm-yyyy" style="width:120px;"/>
							<input type="text" id="end_date" name="end_date" readonly="readonly" value="<?php echo $this->_tpl_vars['end_date']; ?>
" placeholder="To" data-date-format="dd-mm-yyyy" style="width:120px;"/>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="5" align="right">
							<input type="submit" value="Search" name="search_button" id="search_button" class="btn btn-success"/>
							<input type="button" value="Clear" name="clearall" id="clearall" class="btn btn-danger" onclick="clearAll();" />
						</td>
					</tr>
				</table>
			</div>
		</form>
		<table class="table table-bordered table-striped table_vam" id="quizztable" >
            <thead>
                <tr>
                   <th>S.NO</th>
                   <th>Quiz title</th>
                   <th>Category</th>
                   <th>Nb question</th>
                   <th>Nb min. correct responses</th>
                   <th>Duration</th>
                   <th>Date of creation</th>
                   <th>Status</th>
                   <th>Created By</th>
                   <th>Number od participants</th>  
                   <th>Action</th>
                </tr>
            </thead>
			<tbody>
			<?php if (count($this->_tpl_vars['quizzlist']) > 0): ?>
				<?php $_from = $this->_tpl_vars['quizzlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quizz_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quizz_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quizz_item']):
        $this->_foreach['quizz_loop']['iteration']++;
?>
					<tr id="tr<?php echo $this->_tpl_vars['quizz_item']['id']; ?>
">
						<td><?php echo ($this->_foreach['quizz_loop']['iteration']-1)+1; ?>
</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['quizz_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
						<td><?php echo $this->_tpl_vars['quizz_item']['category']; ?>
</td>
						<td><?php echo $this->_tpl_vars['quizz_item']['quest_count']; ?>
</td>
						<td><?php echo $this->_tpl_vars['quizz_item']['correct_ans_count']; ?>
</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['quizz_item']['setuptime'])) ? $this->_run_mod_handler('replace', true, $_tmp, '|', ' ') : smarty_modifier_replace($_tmp, '|', ' ')); ?>
&nbsp;minutes</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['quizz_item']['creation_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%e/%m/%Y") : smarty_modifier_date_format($_tmp, "%e/%m/%Y")); ?>
</td>
						<td id="quizzstatus_<?php echo $this->_tpl_vars['quizz_item']['id']; ?>
">
							<?php if ($this->_tpl_vars['usertype'] == 'superadmin'): ?>
							<a href="javascript:void(0);"  onclick="return changeStatusQuizz('<?php echo $this->_tpl_vars['quizz_item']['id']; ?>
', '<?php echo $this->_tpl_vars['quizz_item']['status']; ?>
')" >
								<?php if ($this->_tpl_vars['quizz_item']['status'] == '1'): ?>Active<?php else: ?>Inactive<?php endif; ?>
							</a>
							<?php else: ?>
								<?php if ($this->_tpl_vars['quizz_item']['status'] == '1'): ?>Active<?php else: ?>Inactive<?php endif; ?>
							<?php endif; ?>
						</td>
						<td><?php echo $this->_tpl_vars['quizz_item']['login']; ?>
</td>
						<td><a href="javascript:void(0);" <?php if ($this->_tpl_vars['quizz_item']['participants'] > 0): ?> onclick="participants(<?php echo $this->_tpl_vars['quizz_item']['id']; ?>
);"<?php endif; ?>><?php echo $this->_tpl_vars['quizz_item']['participants']; ?>
</a></td>
						<td style="float:left">
							<!---------------------------------------EDIT --------------------------------------->
							<a href="/quizz/modifyquizz?submenuId=ML2-SL22&id=<?php echo $this->_tpl_vars['quizz_item']['id']; ?>
" class="hint--left hint--info" data-hint="Edit Quizz"><img class="splashy-application_windows_edit"></a>&nbsp;
							
							<!---------------------------------------VIEW --------------------------------------->
							<a href="/quizz/viewquizz?submenuId=ML2-SL22&id=<?php echo $this->_tpl_vars['quizz_item']['id']; ?>
" class="hint--left hint--info" data-hint="View Quizz" target="_blank"><i class="icon-eye-open"></i></a>
							
							<!---------------------------------------DUPLICATE --------------------------------------->							
							<a href="/quizz/duplicatequizz?submenuId=ML2-SL22&id=<?php echo $this->_tpl_vars['quizz_item']['id']; ?>
" class="hint--left hint--info" data-hint="Create Duplicate Quizz"><img class="splashy-document_copy" src="/BO/theme/gebo/img/copy.png"></a>&nbsp;
							
							<!---------------------------------------AO VIEW --------------------------------------->
							<?php if ($this->_tpl_vars['quizz_item']['linkcount'] != 0): ?>
							<a data-toggle="modal" data-target="#linkedao" OnClick="return linkedao('<?php echo $this->_tpl_vars['quizz_item']['id']; ?>
')" class="hint--left hint--info" data-hint="View AO Links"><i class="icon-list-alt"></i></a>
							<?php endif; ?>
							
							
							<!---------------------------------------DELETE --------------------------------------->
							<?php if ($this->_tpl_vars['quizz_item']['linkcount'] == 0): ?>
								<a href="javascript:void(0);" onClick="deleteQuizz('<?php echo $this->_tpl_vars['quizz_item']['id']; ?>
');" class="hint--left hint--info" data-hint="Delete Quizz"><i class="splashy-remove"></i></a>
							<?php endif; ?>
							
							<!---------------------------------------PERMANAENT DELETE --------------------------------------->
							<?php if ($this->_tpl_vars['usertype'] == 'superadmin'): ?>
								<a href="javascript:void(0);" onClick="permanentdeleteQuizz('<?php echo $this->_tpl_vars['quizz_item']['id']; ?>
');" class="hint--left hint--info" data-hint="Permanent Delete Quizz"><img src="/BO/theme/gebo/img/red_trash.png"/></a>
							<?php endif; ?>
							
						</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
			</tbody>
		</table>
    </div>
</div>	


<!--View linked AOs -->
	<div class="modal4 hide fade" id="linkedao">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">&times;</button>
			<h3>Linked AOs / Recruitments </h3>
		</div>
		<div class="modal-body" id="linkedaocontent">
		</div>
		<div class="modal-footer">
		</div>
	</div>