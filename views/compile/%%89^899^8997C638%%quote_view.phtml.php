<?php /* Smarty version 2.6.19, created on 2016-04-26 12:21:14
         compiled from gebo/searchtest/quote_view.phtml */ ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function() {
	
loadtable();	

function loadtable(){
		
			 $.ajax({
                url: "/searchtest/loadquote",
				data:{
				    count:$("#quote_list tbody tr").length,
					name:$("#ctname").val(),
					status:$("#ctstatus").val()
					 },
			    type: \'POST\',
                success:function(data){
				 $("#quote_list").html(data);
				}
            });
}
	
//$(\'#search_submit\').click(function(){
$(".status").change(function(){		    
		//var statuschecked = []
        $("input[name=\'status\']:checked").each(function ()
        {
            statuschecked.push($(this).val());
        });
         
			$("#ctstatus").val(statuschecked);
			var ctname = $("#ctname").val();
			 $.ajax({
                url: "/searchtest/loadquote",
				data:{
				        status:statuschecked,
						name:ctname,
					 },
			    type: \'POST\',
                success:function(data){
				 $("#quote_list").html(data);
				}
            });
 });
	 
$("#client_name").keyup(function(){
		 
		 var clientName = $(this).val();
		// var ctstatus = []
		 var ctstatus = $("#ctstatus").val();
		 
		 $("#ctname").val(clientName);
			$.ajax({
                url: "/searchtest/loadquote",
				data:{
				        name:clientName,
						status:ctstatus,
					 },
			    type: \'POST\',
                success:function(data){
					
				 $("#quote_list").html(data);
				}
            });
});
	 
 $(\'#loadmore\').click(function(){
	
			var count = $("#quote_list tbody tr").length;
			var ctstatus = $("#ctstatus").val();
			var ctname = $("#ctname").val();
			
			 $.ajax({
                url: "/searchtest/loadquote",
				data:{
				        count:count,
						status:ctstatus,
						name:ctname,
					 },
			    type: \'POST\',
                success:function(data){
			     $("#quote_list").html(data);
				}
            });
});
		
});
</script>
'; ?>


<div class="row-fluid">

 <div class="row">
      <div class="span12">
      <input type="text" placeholder="Client Name" id="client_name"/>
      <input type="hidden" id="ctname" />
	  <input type="hidden" id="ctstatus" />
      
      <!--<form id="search_quote" action="searchquote" method="post" role="form">-->
            <?php $_from = $this->_tpl_vars['quoteType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
            <input type="checkbox" class="status" id="status" name="status" value="<?php echo $this->_tpl_vars['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>

            <?php endforeach; endif; unset($_from); ?>
          <!--  <button type="button"  class="btn btn-danger btn-lg" name="search_submit" id="search_submit">Search</button>           
      </form>-->	  
 </div>  
</div>  
   
<div class="row-fluid">
    
   <div class="row">
     
         <div class="span12" id="quote_list">
 
                  <table class="table table-bordered table-striped table_vam tdleftalign">
                     <thead>
                     <tr>
                          <th>SlNo</th>
                          <th>Client</th>
                          <th>Category</th>
					      <th>QuoteTitle</th>
                          <th>DateOfCreation</th>
                          <th>CreatedBy</th>
                          <th>Status</th>
                          <th>Turnover</th>
                          <th>Action</th>               
                      </tr>
                      </thead>
                      <tbody></tbody> 
                    </table>
  
          </div>
   
 <button class="btn btn-info btn-lg" id="loadmore">Load</button>
  
  </div>
     
</div>