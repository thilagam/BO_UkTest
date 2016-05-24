<?php /* Smarty version 2.6.19, created on 2016-04-28 12:23:37
         compiled from gebo/userlist/writerslist-list.phtml */ ?>
<?php echo '
	<script type="text/javascript">
		
		function viewWriter(id)
		{
			$.ajax({
					url:"/userlist/view-writer?&id="+id,
					type:"POST",
					//async:true,
					success:function(data){
						//$("#page").html(data);
						$("#editModal .modal-body").html(data);
					}
			});
		}

		function editWriter(id)
		{
			$.ajax({
					url:"/userlist/edit-writer?&id="+id,
					type:"POST",
					//async:true,
					success:function(data){
						console.log(data);
						//$("#page").html(data);
						
						$("#editModal .modal-body").html(data);
					}
				});
		}

		function clientWriter(id)
		{
			$.ajax({
				url:"/userlist/client-writer?&id="+id,
				type:"POST",
				success:function(data){
					console.log(data);
					$("#clientModal .modal-body").html(data);
					//$("#writerarticles").html(data);
				}
			});
		}


		function downloadArticles(cid,id)
		{
			$.ajax({
				url:"/userlist/client-download/",
				type:"POST",
				data:{
					cid:cid,
					id:id
				},
				success:function(data){
					console.log(data);
				}
			});
		}

	</script>
	<script type="text/javascript">
	var oTable;
		$(document).ready(function(){
			initialTable();
			$("#filter_writer_submit").bind("click",function(){
				filterTable();
			});
			function initialTable(){
				$.ajax({
			        type: "POST",
			        url: "/userlist/load-table",
			        contentType: "application/json; charset=utf-8",
			        data: \'{ }\',
			        dataType: "json",
			        success:function(data){
			        	if(data != \'[ ]\')
			        	{
					        oTable = $(\'#writers_list\').dataTable({
					            "bProcessing": true,
					            "aaData": data,
					            "aoColumns": [{ "mDataProp": "email" }, { "mDataProp": "fname" },{ "mDataProp": "lname" },{ "mDataProp": "profile" },{ "mDataProp": "action" }],
					            "aaSorting": [[0, "asc"]],
					            //"bJQueryUI": true,

					        });
			        	}
			        }
	    		});
			}
			function filterTable(){
				var usertype = arraySelect($(\'#usertype\'));
				var seniority = arraySelect($(\'#seniority\'));
				var lang = arraySelect($(\'#lang\'));
				var status = arraySelect($(\'#status\'));
				$.ajax({
					url:"/userlist/load-table",
					data:{
						usertype:usertype,
						seniority:seniority,
						lang:lang,
						status:status
					},
					type:"POST",
					dataType: "json",
					success:function(data){
						oTable.fnClearTable();
	        			oTable.fnAddData(data);
					}
				});
			}

			function arraySelect(select)
			{
				var array = [];
				select.each(function(){ array.push($(this).val()) });
				return array;
			}
		});
	</script>
'; ?>

<div class="container" id="page">
	<form >
	<div class="row">
		<div class="span3">
			<div class="control-group">
				<label class="control-label" for="usertype">User Type</label>
				<div class="controls">
					<select name="usertype" id="usertype" multiple>
						<?php $_from = $this->_tpl_vars['userType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
							<option value="<?php echo $this->_tpl_vars['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</div>
			</div>
		</div>
		<div class="span3">
			<div class="control-group">
				<label class="control-label" for="seniority">Seniority</label>
				<div class="controls">
					<select name="seniority" id="seniority" multiple>
						<?php $_from = $this->_tpl_vars['seniority']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
							<option value="<?php echo $this->_tpl_vars['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</div>
			</div>
		</div>
		<div class="span3">
			<div class="control-group">
				<label class="control-label" for="lang">Language</label>
				<div class="controls">
					<select name="lang" id="lang" multiple>
						<?php $_from = $this->_tpl_vars['langList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
							<option value="<?php echo $this->_tpl_vars['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</div>
			</div>
		</div>
		<div class="span3">
			<div class="control-group">
				<label class="control-label" for="status">Status</label>
				<div class="controls">
					<select name="status" id="status" multiple>
						<?php $_from = $this->_tpl_vars['status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
							<option value="<?php echo $this->_tpl_vars['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select> 
				</div>
			</div>
		</div>
	</div>
		<div class="formSep">
            <button onclick="javascript:void(0);" class="btn btn-info" type="button" id="filter_writer_submit" name="filter_writer_submit">Submit</button> 
            <!-- <input type="submit" class="btn btn-info" value="Submit" id="filter_writer_submit" name="filter_writer_submit"> -->
        </div>
	</form>
	<div class="tab-pane active" id="initial_table">
		<table class="table table-bordered table-striped" id="writers_list">
		<thead>
			<tr>
				<th>Email ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Profile Percentage</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
		
		</tbody>
		</table>
	</div>
	
	<div class="modal fade" id="editModal" role="dialog" style="left: 40%;width: 800px;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
    </div>

    <div class="modal fade" id="clientModal" role="dialog" style="left: 40%;width: 800px;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">List of clients</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
	</div>

	<div id="writerarticles"></div>
</div>

