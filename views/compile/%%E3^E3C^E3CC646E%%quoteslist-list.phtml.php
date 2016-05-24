<?php /* Smarty version 2.6.19, created on 2016-04-26 13:43:42
         compiled from gebo/userlist/quoteslist-list.phtml */ ?>
<?php echo '
	<script type="text/javascript">
	$(document).ready(function(){
		//To load the table with initail records
		loadTable();
		//For loading more records
		$("#loadmore").bind("click",function(){
			loadTable();
		});
		//On search of the client name
		$("#cname").keyup(function(){
			var cname = $(this).val();
			$("#clientname").val(cname);
			loadFilterTable();
		});
		//On selecting the status
		$(".status").change(function(){
			statusCheck = [];
			$.each($("input[name=status]:checked"),function(){
				statusCheck.push($(this).val());
			});
			$("#clientstatus").val(statusCheck);
			loadFilterTable();
		});
		function loadTable()
		{
			$.ajax({
				url:"/userlist/load-quotes",
				data:{
					count:$("#quotes_list tbody tr").length,
					cname:$("#clientname").val(),
					cstatus:$("#clientstatus").val()
				},
				type:"POST",
				success:function(data){
					$("#records").html(data);
				}
			});
		}
		function loadFilterTable()
		{
			$.ajax({
				url:"/userlist/quote-filter",
				data:{
					cname:$("#clientname").val(),
					cstatus:$("#clientstatus").val()
				},
				type:"POST",
				success:function(data){
					$("#records").html(data);
				}
			});
		}
		/*$("#loadmore").bind("click",function(){
			var count = $("#quotes_list tr").length - 1;
			$.ajax({
				url:"/userlist/load-quotes",
				data:{
					count:count,
					cname:$("#clientname").val(),
					cstatus:$("#clientstatus").val()
				},
				type:"POST",
				success:function(data){
					if(data != " "){
						$("#quotes_list tbody").append(data);
					}
				}
			});
		});

		$("#cname").keyup(function(){
			var cname = $(this).val();
			var cstatus = $("#clientstatus").val();
			$("#clientname").val(cname);
			loadFilterList(cname,cstatus);
		});

		
		$(".status").change(function(){
			statusCheck = [];
			$.each($("input[name:status]:checked"),function(){
				if($(this).val() != " ")
				{
					statusCheck.push($(this).val());
				}
			});
			$("#clientstatus").val(statusCheck);
			var cname = $("#clientname").val();
			loadFilterList(cname,statusCheck);
		});
		

		function loadFilterList(cname,cstatus)
		{
			$.ajax({
				url:"/userlist/quote-filter",
				data:{
					cname:cname,
					cstatus:cstatus
				},
				type:"POST",
				success:function(data){
					if(data != " ")
					{
						$("#quotes_list tbody").html(" ");
						$("#quotes_list tbody").html(data);
					}
				}
			});
		}*/
	});
	</script>
'; ?>

<div class="container">
<div class="tab-pane active" >
	<input type="text" placeholder="Client Name/Quote Title" id="cname"/>
	<label class="checkbox inline">
		<input type="checkbox" class="status" name="status" value="briefing" />Briefing
	</label>
	<label class="checkbox inline">
		<input type="checkbox" class="status" name="status" value="not_done" />Ongoing
	</label>
	<label class="checkbox inline">
		<input type="checkbox" class="status" name="status" value="validated" />Sent
	</label>
	<label class="checkbox inline">
		<input type="checkbox" class="status" name="status" value="closed" />Lost
	</label>
	<label class="checkbox inline">
		<input type="checkbox" class="status" name="status" value="signed" />Signed
	</label>
	<label class="checkbox inline">
		<input type="checkbox" class="status" name="status" value="to_be_approve" />To be approved
	</label>
	<label class="checkbox inline">
		<input type="checkbox" class="status" name="status" value="deleted" />Deleted
	</label>
	
	<input type="hidden" id="clientname" />
	<input type="hidden" id="clientstatus" />
	<div id="records">
		
	</div>
	
	
</div>
</div>