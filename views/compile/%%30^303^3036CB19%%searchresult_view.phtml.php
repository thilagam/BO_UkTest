<?php /* Smarty version 2.6.19, created on 2016-04-14 10:35:52
         compiled from gebo/searchtest/searchresult_view.phtml */ ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function() {
	$("#userhead").addClass(\'active\');
	$("#viewpage").hide();
	
	$(\'#user_list\').dataTable().fnDestroy();
	$(\'#user_list\').DataTable();
	  //$(\'#user_list\').dataTable({
      //"sAjaxSource": "/ebookers/load-datatable?datatable=themes",
	 //});
});

function user_profile(user_id){
	
        $.ajax({
             url: "/searchtest/profiledetails?id="+user_id,
			 type: \'POST\',
             success:function(data){
				console.log(data);
                $("#userprofile .modal-body").html(data);
            }
        });
}

function user_profileview(user_id){
	
	$("#userhead").hide();
	$("#viewpage").show();
        $.ajax({
             url: "/searchtest/profileview?id="+user_id,
			 type: \'POST\',
             success:function(data){
				$("#viewpage").html(data);
            }
        });
}

function fileZip(writerid,clientid){
	
        $.ajax({
			 url: "/searchtest/articledownload",
			 data:{
				        wid:writerid,
						cid:clientid,

					   },
			 type: \'POST\',
             success:function(data){
				  alert(data);
				
            }
        });
}

</script>
'; ?>


<div class="row-fluid" >
  <div class="span12" style="">
  
      <div class="tabbable">
          <ul class="nav nav-tabs">
            <li ><a href="#userhead" data-toggle="tab" class="lable-info"><strong>Users</strong></a></li> 
          </ul>
          <div class="tab-content">
              <div id="userhead" class="tab-pane" >
                  <table class="table table-bordered table-striped table_vam tdleftalign" id="user_list">
                      <thead>
                      <tr>
                          <th>SL.NO</th>
                          <th>Name</th>
                          <th>Email Address</th>
						  <th>Writer</th>
                          <th>Corrector</th>
                          <th>Translator</th>
                          <th>Status</th>
                          <th>Active/Inactive</th>
                          <th>Action</th>               
                      </tr>
                      </thead>
                       <tbody>
                      <?php $this->assign('i', 0); ?>
                      <?php while ($this->_tpl_vars['i'] < $this->_tpl_vars['searchResult_count']) { ?>
                      <tr>
                          <td><?php echo $this->_tpl_vars['i']+1; ?>
</td>
                         <td><?php echo $this->_tpl_vars['searchResult'][$this->_tpl_vars['i']]['first_name']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['searchResult'][$this->_tpl_vars['i']]['email']; ?>
</td>
						  <td><?php echo $this->_tpl_vars['searchResult'][$this->_tpl_vars['i']]['type']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['searchResult'][$this->_tpl_vars['i']]['type2']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['searchResult'][$this->_tpl_vars['i']]['translator']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['searchResult'][$this->_tpl_vars['i']]['profile_type']; ?>
</td>
                          <td><?php echo $this->_tpl_vars['searchResult'][$this->_tpl_vars['i']]['status']; ?>
</td>
                          <td><button type="button" class="btn btn-info btn-lg"  onClick="user_profileview(<?php echo $this->_tpl_vars['searchResult'][$this->_tpl_vars['i']]['identifier']; ?>
);">View</button>
                             <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#userprofile" onClick="user_profile(<?php echo $this->_tpl_vars['searchResult'][$this->_tpl_vars['i']]['identifier']; ?>
);">Edit</button></td>
                      </tr>
                      <?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
                      <?php } ?>
                     </tbody>

                  </table>
              </div>
          </div>
      </div>

  </div>
</div>

<div id="viewpage"></div>

<div class="modal fade" id="userprofile" role="dialog" style="left: 40%;width: 800px;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">User Profile</h4>
            </div>
            <div class="modal-body">
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
           
        </div>

    </div>
</div>