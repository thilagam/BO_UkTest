<?php /* Smarty version 2.6.19, created on 2016-03-17 09:33:23
         compiled from gebo-new/quote/sales-quotes-list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut_t', 'gebo-new/quote/sales-quotes-list.phtml', 305, false),)), $this); ?>
<?php echo '
<link href="/BO/theme/lbd/css/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>	
 <!--  Datatable Plugin    -->
 <script src="/BO/theme/lbd/js/bootstrap-table.js" type="text/javascript" charset="utf-8"></script>
 <script src="/BO/theme/lbd/js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript" charset="utf-8"></script>
  
<script src="/BO/theme/lbd/js/jquery.sieve.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
$(document).ready(function() {
	
	loading=false;
	loadmorecards(\'briefing\',1,\'\');
	loadmorecards(\'ongoing\',1,\'\');
	loadmorecards(\'validated\',1,\'\');
	loadmorecards(\'signed\',1,\'\');
	loadmorecards(\'closed\',1,\'\');
	loadmorecards(\'relance\',1,\'\');
	loadmorecards(\'deleted\',1,\'\');

	

	/*  var searchTemplate = "<div class=\'row form-inline\'><label style=\'float: right;\'>Find a Quote: <input type=\'text\' placeholder=\'Search\'></label></div>"
    $("#quote-card").sieve({ searchTemplate: searchTemplate, itemSelector: ".card" }); */
	
	$(\'body\').on(\'hidden.bs.modal\', \'.modal\', function () {
	 $(this).removeData(\'bs.modal\');
	 $(\'.modal-backdrop\').remove();
		});
	 
	getQuoteActivities(1);
	$(\'body\').on("click",\'.more_button\',function() 
	{
		var getId = $(this).attr("id");
		if(getId)
		{
			$("#load_more_"+getId).html(\'<img src="/BO/theme/gebo/img/ajax_loader.gif" style="padding:10px 0 0 100px;"/>\'); 
			getQuoteActivities(getId);
			$("#load_more_"+getId).remove();
		}
		else
		{
			$(".more_tab").html(\'The End\');
		}
		return false;
	});

	$(document).on(\'click\',\'.search-feature\',function(){

		var searchval=$("#quote_search").val();
		searchval.trim();
		searchload=true;
		if($(this).hasClass(\'search-cancel\'))
		{
			
			$("#quote_search").val(\'\');
			searchval=\'\';
			$(\'.search-cancel\').addClass(\'hidden\');
		}
		else
		{			
			if(searchval==\'\')
			{
				searchload=false;
				$(\'.search-cancel\').addClass(\'hidden\');	
			}
			else
			{
				$(\'.search-cancel\').removeClass(\'hidden\');
			}
			
		}
		//alert(searchload);
		if(searchload==true)
		{
			//alert(searchval+\' val\');
			loadmorecards(\'briefing\',1,searchval);
			loadmorecards(\'ongoing\',1,searchval);
			loadmorecards(\'validated\',1,searchval);
			loadmorecards(\'signed\',1,searchval);
			loadmorecards(\'closed\',1,searchval);
			loadmorecards(\'relance\',1,searchval);
			loadmorecards(\'deleted\',1,searchval);
		}
	});
	
	

	
});

		function onscrollcall(loading,status,offset,search)
		{
			
			var defaultlimit='; ?>
<?php echo $this->_tpl_vars['salesquotelistlimitvar']; ?>
<?php echo ';
			var brieftotal="'; ?>
<?php if ($this->_tpl_vars['brief_quotes_count']): ?><?php echo $this->_tpl_vars['brief_quotes_count']; ?>
<?php else: ?> <?php endif; ?><?php echo '";
			var deletedtotal="'; ?>
<?php if ($this->_tpl_vars['deletedcount']): ?><?php echo $this->_tpl_vars['deletedcount']; ?>
<?php else: ?> <?php endif; ?><?php echo '";
			var validatecount="'; ?>
<?php if ($this->_tpl_vars['validatecount']): ?><?php echo $this->_tpl_vars['validatecount']; ?>
<?php else: ?> <?php endif; ?><?php echo '";
			var closedcount="'; ?>
<?php if ($this->_tpl_vars['closedcount']): ?><?php echo $this->_tpl_vars['closedcount']; ?>
<?php else: ?> <?php endif; ?><?php echo '";
			var relancecount="'; ?>
<?php if ($this->_tpl_vars['relancecount']): ?><?php echo $this->_tpl_vars['relancecount']; ?>
<?php else: ?> <?php endif; ?><?php echo '";
			var signcount="'; ?>
<?php if ($this->_tpl_vars['signcount']): ?><?php echo $this->_tpl_vars['signcount']; ?>
<?php else: ?> <?php endif; ?><?php echo '";
			var ongoingcount="'; ?>
<?php if ($this->_tpl_vars['ongoingcount']): ?><?php echo $this->_tpl_vars['ongoingcount']; ?>
<?php else: ?> <?php endif; ?><?php echo '";

			if(loading==false)
			    	{
			    		
				    	if( status==\'briefing\' && (brieftotal >=(defaultlimit)*(offset-1) && brieftotal>defaultlimit) )
				    	{
					    	//bref++; 
					    	loadmorecards(status,offset,search);
				    	} 
				    	else if(status==\'ongoing\' && (ongoingcount >=(defaultlimit)*(offset-1) && ongoingcount>defaultlimit) )
				    	{
					    	//ongoing++; 
					    	loadmorecards(status,offset,search);
				    	}
				    	else if(status==\'validated\' && (validatecount >=(defaultlimit)*(offset-1) && validatecount>defaultlimit))
				    	{
					    	//send++; 
					    	loadmorecards(status,offset,search);
				    	}
				    	else if(status==\'signed\' && (signcount >=(defaultlimit)*(offset-1) && signcount>defaultlimit))
				    	{
					    	//signed++; 
					    	loadmorecards(status,offset,search);
				    	}
				    	else if(status==\'relance\' && (relancecount >=(defaultlimit)*(offset-1) && relancecount>defaultlimit))
				    	{
					    	//relance++; 
					    	loadmorecards(status,offset,search);
				    	}
				    	else if(status==\'closed\' && (closedcount >=(defaultlimit)*(offset-1) && closedcount>defaultlimit))
				    	{
					    	//closed++; 
					    	loadmorecards(status,offset,search);
				    	}
				    	else if(status==\'deleted\' && (deletedtotal >=(defaultlimit)*(offset-1) && deletedtotal>defaultlimit))
				    	{
					    	//deleted++; 
					    	loadmorecards(status,offset,search);
				    	}

			    	}    
		}


	function getQuoteActivities(page)
	{
		var targetPage="/quote-new/quote-activities-list?page="+page;
		$.get(targetPage,function(data){
		
			$("ul#quote-activities-list").append(data);
			 $(\'[data-toggle="popover"]\').popover();
		});
	}
	
	


	function loadmorecards(status,offset,search)
	{

		if(offset!=1)
		{		
		  
		   var slectTop= $("#"+status).find(".mCSB_container").position().top+\'px\';
		   $("#"+status).append(\'<div class="loader"><img src="/BO/theme/gebo/img/ajax_loader.gif" style="padding:10px 0 0 100px;"/></div>\');
		   
	    	
	    }
	    else
	    {
	    	slectTop= 0+\'px\';
	    	
	    }
	    
	    	$("#"+status).find(\'.mCustomScrollBox\').hide();
	    	$("#"+status).find(\'.mCSB_draggerContainer\').hide();
	    	
		   	 setTimeout(function() {
			  		$("#"+status).mCustomScrollbar(\'destroy\');
			 	 },  500);
			
		 page =\'&page=\'+offset;

		 if(search!=\'\')
		 {
		 	searchval=\'&search=\'+search;
		 	
		 }
		 else
		 {
		 	searchval=\'\';
		 	
		 }
		
		targetPage="/quote-new/ajax-quotes-list?sales_review="+status+page+searchval;
		//alert(targetPage);
		$.ajax({
       	url: targetPage,
       	beforeSend: function() {
       		loading=true;
       		$("#"+status).find(\'.loader\').remove();
       		$("#"+status).append(\'<div class="loader"><img src="/BO/theme/gebo/img/ajax_loader.gif" style="padding:10px 0 0 100px;"/></div>\');
       	},
        success: function(html)
        {
        	//	alert(html);
		
        	if(html)
        	{
	        	
	        	if(offset==1)
	        	{   

	        		$("#"+status).html(html);

	        	}
	        	else
	        	{
	        		$("#"+status).append(html);
	        	}
	           
	      	   
				
				$(\'[data-toggle="tooltip"]\').tooltip();
				
				$(\'[data-toggle="popover"]\').popover();
				if(html==\'\')
					loading=true;
				else
					loading=false;
				
				//alert(loading);
					$("#"+status).mCustomScrollbar({
						setTop: slectTop,
						theme:"minimal-dark",
						scrollButtons:{enable:true},
						advanced:{ updateOnContentResize: true },
						callbacks:{
							    onTotalScroll:function(){
							    	offset++;
							    	onscrollcall(loading,status,offset,search);
							    },
							   
						},

					});
				$("#"+status).find(\'.loader\').remove();
				$("#"+status).find(\'.mCustomScrollBox\').show();
	        	$("#"+status).find(\'.mCSB_draggerContainer\').show();
					
			}	
        }
        });
		
	}  




</script>
'; ?>


<div class="row">
	<div class="col-md-8">
		<h1>All Quotes 
	<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'facturation'): ?>
		<a href="/quote-new/create-step1?qaction=new" class="btn btn-primary btn-fill">Create</a>
	<?php endif; ?>
</h1> 
	</div>

	<div class="col-md-4">
		<div class="form-inline" style="margin-top:30px; text-align:right">
		<label>
		<input class="form-control" type="text" id="quote_search" placeholder="Search">
		<button class="btn btn-default btn-fill search-feature"><i class="fa fa-search"></i></button>
		<a class="btn btn-default search-cancel search-feature hidden"><i class="fa fa-close"></i></a>
	</label>
</div>
	</div>

	
</div>

	
<div id="quote-card" class="row row-horizon">

	<!-- Brief, start --> 
	<div class="col-xs-6 col-sm-4 col-md-3" >
		<div class="w">
			<h4><small>Customer pitch</small><?php echo $this->_tpl_vars['brief_quotes_count']; ?>
 quotes</h4>
		</div>
		<div id="briefing" class="scrollnow " >
			
		</div>

	</div>
	<!-- Brief, end -->
	
	<!-- Ongoing, start -->
   <div class="col-xs-6 col-sm-4 col-md-3" >
		<div class="w">
			<h4><small>Ongoing</small><?php echo ((is_array($_tmp=$this->_tpl_vars['total_ongoing_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &euro;</h4>
		</div>

		<div  id="ongoing" class="scrollnow " >
		
			
		</div>
	</div>
	<!-- Ongoing, end -->
	
	<!-- SENT, start -->
	<div class="col-xs-6 col-sm-4 col-md-3 " >
		<div class="w">
			<h4><small>Sent</small><?php echo ((is_array($_tmp=$this->_tpl_vars['validated_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &euro;</h4>
		</div>
		<div  id="validated" class="scrollnow ">
			
		</div>
	</div>
	<!-- SENT, end -->
	<!-- SIGNED, start -->
   <div class="col-xs-6 col-sm-4 col-md-3" >
		<div class="w">
			<h4 class="text-success"><small>Won deal / Signed</small><?php echo ((is_array($_tmp=$this->_tpl_vars['signed_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &euro;</h4>
		</div>
		<div id="signed" class="scrollnow ">
			
		</div> 
    </div>
 <!-- SIGNED, end -->  
<!-- Relaunched, start -->
   <div class="col-xs-6 col-sm-4 col-md-3 " >
		<div class="w">
			<h4><small>Pending feedback</small><?php echo ((is_array($_tmp=$this->_tpl_vars['relancer_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &euro;</h4>
		</div>
		<div  id="relance" class="scrollnow " >
			
		</div> 
    </div>
 <!-- Relaunched, end -->

<!-- LOST, start -->
   <div class="col-xs-6 col-sm-4 col-md-3" >
		<div class="w">
			<h4><small>Lost</small><?php echo ((is_array($_tmp=$this->_tpl_vars['closed_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &euro;</h4>
		</div>
		<div id="closed" class="scrollnow ">
			
		</div> 
    </div>
 <!-- CLOSED, end --> 
	 <?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
	 <!-- DELETE, start --> 
		<div class="col-xs-6 col-sm-4 col-md-3" >
			<div class="w">
				<h4><small>Deleted</small><?php echo ((is_array($_tmp=$this->_tpl_vars['deleted_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &euro;</h4>
			</div>
			<div  id="deleted" class="scrollnow ">
				
			</div>

		</div>
		<!-- DELETE, end -->
	<?php endif; ?>	
</div>
<!--Activities , Start-->

<div id="activities" style="display:none">
	<div class="headerActivities">
		<div class="pictoActivities">
			<i class="material-icons" >notifications_active</i>
		</div>
		<div>
			Activities
		</div>
		<div id="clearActivities" class="pull-right">
			<i class="material-icons">clear</i>
		</div>
	</div>

	<div class="containerActivities">			
		<ul class="list-group activity-list" id="quote-activities-list">
		</ul>				
	</div>	
</div>
<!--Activities , end-->



<!--Estimated sign details -->
<div class="modal hide fade" id="estimate_sign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Estimation</h3>
    </div>
    <div class="modal-body">
		
    </div>
    <div class="modal-footer">
    </div>
</div>



<?php echo '
<link rel="stylesheet" href="/BO/theme/lbd/lib/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/lbd/lib/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/lbd/lib/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/lbd/js/countdown.js"></script>

<script type="text/javascript">	
$(document).ready(function() {
	
		function upTime(countTo,identy,statetime) {
			var message = "";
			currnttime=(new Date).getTime();
			  difference = (currnttime-countTo);

			  days=Math.floor(difference/(60*60*1000*24)*1);
			  hours=Math.floor((difference%(60*60*1000*24))/(60*60*1000)*1);
			  mins=Math.floor(((difference%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
			  secs=Math.floor((((difference%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
				if(days >0 )message += days + " jours "  +"  ";
				if(hours >0 )message += hours + " h ";
				if(mins >0 )message += mins + " min ";
				message += secs + " sec ";
				alert(message);
              $("#text_"+identy+"_"+statetime).html(message);		
              		 
			 
}
	////////////to show the timer of tech time line///////
      var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
      var js_date=(new Date().getTime())/ 1000;
      var diff_date=Math.floor(js_date-cur_date);
      
     //////////show timer//////////
	$("[id^=time_]").each(function(i) {
		var article=$(this).attr(\'id\').split("_");
		var ts=article[2];
		if($(this).attr(\'class\') !== undefined && $(this).attr(\'class\')==\'enretard\'){
		
			$("#text_"+article[1]+"_"+article[2]).countup({
				timestamp   : ts,
				diff_date  : diff_date,
				callback    : function(days, hours, minutes, seconds){
					var message = "";
					if(days >0 )message += days + " jours"  +"  ";
					if(hours >0 )message += hours + " h ";
					if(minutes >0 )message += minutes + " min ";
					message += seconds+" sec ";
					$("#text_"+article[1]+"_"+article[2]).html(message);
					if(days==0 && hours==0 && minutes==0 && seconds==0)
					{
						//window.location.reload();
					}
				}	
			});			  
        
		}else{
		$("#time_"+article[1]+"_"+article[2]).countdown({
			timestamp   : ts,
            diff_date  : diff_date,
			callback    : function(days, hours, minutes, seconds){
				var message = "";
				if(days >0 )message += days + " jours"+"  ";
				if(hours >0 )message += hours + ":";
				if(minutes >0 )message += minutes + ":";
				message += seconds;
				$("#text_"+article[1]+"_"+article[2]).html(message);
				if(days==0 && hours==0 && minutes==0 && seconds==0)
				{
					//window.location.reload();
				}
			}
		});
		}
	});
	//$(".reason").chosen({ allow_single_deselect: false,disable_search: true});
	
		
/* Pop click funciton*/
		$(\'.pop_clickover\').popover({trigger:\'click\'});

	var flash_message="'; ?>
<?php echo $this->_tpl_vars['actionmessages'][0]; ?>
<?php echo '";	
	var flash_message1="'; ?>
<?php echo $this->_tpl_vars['actionmessages'][1]; ?>
<?php echo '";
	
	if(flash_message==\'Devis cr&eacute;e avec succ&egrave;s\' && flash_message1!=\'Onlysales\')
	{	
		$("#quote_created").modal(\'show\');
		$("#quote_created").removeClass( "hide" ).addClass("in");
	}
	
	$(\'.oselect_rows\').click(function () {
		var tableid = $(this).data(\'tableid\');
		//alert(tableid)
		$(\'#\'+tableid).find(\'input[name="oquote_select[]"]\').attr(\'checked\', this.checked);
	});
	$(\'.oselect_rows\').click(function () {
		var tableid = $(this).data(\'tableid\');		
		$(\'#\'+tableid).find(\'input[name="oquote_select[]"]\').attr(\'checked\', this.checked);
	});
	$(\'.cselect_rows\').click(function () {
		var tableid = $(this).data(\'tableid\');		
		$(\'#\'+tableid).find(\'input[name="cquote_select[]"]\').attr(\'checked\', this.checked);
	});
	$(\'.vselect_rows\').click(function () {
		var tableid = $(this).data(\'tableid\');		
		$(\'#\'+tableid).find(\'input[name="vquote_select[]"]\').attr(\'checked\', this.checked);
	});
	$(\'.sselect_rows\').click(function () {
		var tableid = $(this).data(\'tableid\');		
		$(\'#\'+tableid).find(\'input[name="squote_select[]"]\').attr(\'checked\', this.checked);
	});
	
	
		/* To delete Quote */
			$(document).on("click",".delete-quote",function(e){

				e.preventDefault();
				var quote_id=$(this).attr("data-id");
				
				var msg = "Are you sure want to delete this Quote?";
				swal(
							{
								title: "",
			            	    text: msg,
			            	    type: "warning",
			            	    showCancelButton: true,
			            	    confirmButtonText: "Yes",
			            	    cancelButtonText: "No",
			            	    closeOnConfirm: false,
			            	    closeOnCancel: true
		               		 	},function(isConfirm)
		                		{
				                	if(isConfirm)
				                	{
										if(quote_id)
										{
											var target_page=\'/quote-new/delete-quote?quote_id=\'+quote_id;
											$.post(target_page,function(){
												$("#quote-"+quote_id).remove();
												swal({
													title:"Deleted!",
													text: "Quote has been deleted.",
													type: "success" 
												},function () {
						                        location.reload();
						                        });

											});
											 
										}
										
									}
								}
							);
				
			});

		$(document).on("click",".changewarning",function(){
				$(".changewarning").closest("tr").removeClass("warning");
				$(this).closest("tr").addClass("warning");
			});
	
	
			$(document).on("click",".delete-quote-permenent",function(e){
				
				e.preventDefault();
				//var href=$(this).attr("href");
				var quote_id=$(this).attr("data-id");
				var msg = "Souhaitez-vous vraiment supprimer cet Quote?";
				
				swal(
						{
						title: "",
						text: msg,
						type: "warning",
						showCancelButton: true,
						confirmButtonText: "Yes",
						cancelButtonText: "No",
						closeOnConfirm: false,
						closeOnCancel: true
						},function(isConfirm)
						{
							if(isConfirm)
				            {
								if(quote_id)
								{
									var target_page=\'/quote-new/delete-quote-permenent?quote_id=\'+quote_id;
									$.post(target_page,function(){
										$("#quote-"+quote_id).remove();
										swal("Deleted!", "Quote has been deleted from DB.", "success");
									});
									 
								}
							}	
						}
					);
			});


		$(document).on("click",".newversion" ,function( event ) {
						event.preventDefault();
						var href=$(this).attr("href");
						//var msg = "Souhaitez-vous cr&eacute;er une nouvelle version de devis?";
						
					swal(
						{
							title: "nouvelle version de devis",
		            	    text: "Souhaitez-vous créer une nouvelle version de devis?",
		            	    type: "success",
		            	    showCancelButton: true,
		            	    confirmButtonText: "Yes",
		            	    cancelButtonText: "No",
		            	    closeOnConfirm: false,
		            	    closeOnCancel: true
		                },function(isConfirm)
		                {
		                	if(isConfirm)
		                	{
								window.location.href =href;
							}
						}
						);
			});
	
	
	
		$(document).on("click",".bootcustomer",function(){
			var quote_id = $(this).attr(\'rel\');
			var thisvar = $(this);
			thisvar.html(\'<img alt="" src="/BO/theme/gebo/img/ajax_loader.gif">\');
			$.post(\'/quote/boot-customer\',{"qid":quote_id},function(data){
				thisvar.closest("td").html(data);
			})
		});
	
		$(document).on("click",".check_quote_edit",function(e){
			e.preventDefault();
			var quote_id = $(this).closest("tr").find("input").val();
			var href=$(this).attr("href");

			 $.ajax({
	              url: "/quote/check-edit-quote",
	              data: {"qid":quote_id},
	              type: "POST",
	              async: false,
	              success: function(data) {
					
					if($.trim(data))
					{
						swal(
						{
							title: "Edit the Quote",
		            	    text: "Already another Quote is Opened and not submitted still want to proceed?",
		            	    type: "success",
		            	    showCancelButton: true,
		            	    confirmButtonText: "Yes",
		            	    cancelButtonText: "No",
		            	    closeOnConfirm: false,
		            	    closeOnCancel: true
	               		 	},function(isConfirm)
	                		{
			                	if(isConfirm)
			                	{
									window.location.href =href;
								}
							}
						);
						
					}
					else
					window.location.href =href;
	              }
        		});
		});	
		
	$(document).find(\'a[rel=popover]\').popover({ html: true, trigger: \'hover\',placement:\'right\'});
	
	
	
});	

function changestatus(current,quote_id)
{
	$.post(\'/quote/change-reason\',{\'quote_id\':quote_id,\'reason\':current.value},function(data){$.sticky(\'Updated reason successfully\', {autoclose : 2000, position: "top-center", type: \'st-success\'});});
}

/* //edit QUote in validated quotes
function fneditQuote(quote_id,version)
{
	smoke.confirm("Vous souhaitez &eacute;diter le devis",function(e){
					if (e)
					{						
						window.location=\'/quote/sales-final-validation?quote_id=\'+quote_id+\'&submenuId=ML13-SL2\';
					}
					else
					{
						var msg = "Souhaitez-vous cr&eacute;er une nouvelle version de devis?";
						smoke.confirm(msg,function(e){
							if (e){
									window.location=\'/quote/create-quote-step1?qaction=edit&quote_id=\'+quote_id+\'&submenuId=ML13-SL2\';
								}					
						},{"ok":"Oui","cancel":"Non"});						
						//return false;
					}
				}, {ok:"En phase finale", cancel:"En &eacute;tape 1"});


} */

	/* Pop up to Close Quote */

$(document).on("click",".closequote",function(){
/* 		$("#closequote").validationEngine();
		$(\'textarea\').attr(\'data-prompt-position\',\'topLeft\');
		$(\'textarea\').data(\'promptPosition\',\'topLeft\');
		
		$(\'#closetxt\').val(\'\');
		var quote_id = $(this).closest("tr").find("input").val();
		$("#closequoteid").val(quote_id); */
		$("#close_quote").modal(\'show\');
		$("#close_quote").removeClass( "hide" ).addClass("in");
	});
	
	$(document).on("click",".relance-qu",function(){
/* 		$("#closequote").validationEngine();
		$(\'textarea\').attr(\'data-prompt-position\',\'topLeft\');
		$(\'textarea\').data(\'promptPosition\',\'topLeft\');
		
		$(\'#closetxt\').val(\'\');
		var quote_id = $(this).closest("tr").find("input").val();
		$("#closequoteid").val(quote_id); */
		$("#programmer-relance").modal(\'show\');
		$("#programmer-relance").removeClass( "hide" ).addClass("in");
	})
	/*popover click hide*/
	$(\'body\').on(\'click\', function (e) 
	{
		$(\'a[data-toggle=popover]\').each(function () {
        // hide any open popovers when the anywhere else in the body is clicked
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $(\'.popover\').has(e.target).length === 0) {
            $(this).popover(\'hide\');
        }
    	});
	 });
	/* Pop up to Sign Quote */
	
	$(document).on("click",".signquote",function(){
		/* $("#signquote").validationEngine();
		$(\'textarea\').attr(\'data-prompt-position\',\'topLeft\');
		$(\'textarea\').data(\'promptPosition\',\'topLeft\');
		
		$(\'#signtxt\').val(\'\');
		var quote_id = $(this).closest("tr").find("input").val();
		$("#signquoteid").val(quote_id); */
		$("#sign_quote").modal(\'show\');
		$("#sign_quote").removeClass( "hide" ).addClass("in");
	});
	
</script>
'; ?>

