<?php /* Smarty version 2.6.19, created on 2016-05-09 10:22:39
         compiled from gebo-new/quote/sales-final-validation-list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo-new/quote/sales-final-validation-list.phtml', 930, false),array('modifier', 'stripslashes', 'gebo-new/quote/sales-final-validation-list.phtml', 930, false),array('modifier', 'count', 'gebo-new/quote/sales-final-validation-list.phtml', 1011, false),array('modifier', 'zero_cut', 'gebo-new/quote/sales-final-validation-list.phtml', 1085, false),array('modifier', 'in_array', 'gebo-new/quote/sales-final-validation-list.phtml', 1361, false),array('modifier', 'array_search', 'gebo-new/quote/sales-final-validation-list.phtml', 1362, false),array('modifier', 'array_pop', 'gebo-new/quote/sales-final-validation-list.phtml', 1362, false),)), $this); ?>
<?php echo '
<script type="text/javascript" src="/BO/theme/lbd/js/countdown.js"></script>

<link rel="stylesheet" href="/BO/theme/lbd/lib/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/lbd/lib/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/lbd/lib/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/lbd/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>


<script src="/BO/theme/lbd/js/moment.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/lbd/js/bootstrap-datetimepicker.js" type="text/javascript" charset="utf-8"></script>


<style type="text/css">
.modal-backdrop{position: relative;}
</style>
<script language="javascript">
function roundnum(number)
{
	return Math.round(number*100)/100;
}
//5 decimal points
function round5num(number)
{
	return Math.round(number*100000)/100000;
}
//user turnover for a mission
function fnCalUserTurnover(mission_id,offer_price,number_writers)
{
	offer_price=offer_price.replace(",",".");
	var userOffer=offer_price*number_writers;
	
	var FreeMissionuserval= $("#free_mission_"+mission_id+":checked").val();
    if(FreeMissionuserval==\'yes\')
    {
	$("#user_ca_"+mission_id).val(0);	
	}else{
	$("#user_ca_"+mission_id).val(userOffer);	
	}	
	
	
	fncalculateAutoTotal(); //calculate cost automatically
}


//package selection for a mission
function updatepackage(mission_id,package_name,index)
{
	var margin_percentage=0;
	var quote_id=\''; ?>
<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
<?php echo '\';
	if(package_name==\'lead\')
			margin_percentage=60;
	else if(package_name==\'link\')
			margin_percentage=30;
	else if(package_name==\'team\')
			margin_percentage=50;	
			
	if(package_name==\'team\')
	{
		$("#other_details_team_"+mission_id).show();
		$("#other_details_user_"+mission_id).hide();
		$("#ca_thead_user_"+mission_id).hide();		
		$("#turnover_"+mission_id).css("text-decoration","none");
		$("#margin_percentage_"+mission_id).prop("readonly",false);	
	}
	else if(package_name==\'user\')
	{
		$("#other_details_team_"+mission_id).hide();
		$("#other_details_user_"+mission_id).show();
		$("#ca_thead_user_"+mission_id).show();
		$("#turnover_"+mission_id).css("text-decoration","line-through");
		$("#margin_percentage_"+mission_id).prop("readonly",true);
	}
	else
	{
		$("#other_details_team_"+mission_id).hide();
		$("#other_details_user_"+mission_id).hide();
		$("#ca_thead_user_"+mission_id).hide();
		$("#turnover_"+mission_id).css("text-decoration","none");
		$("#margin_percentage_"+mission_id).prop("readonly",false);	
	}
	
	
	margin_percentage=roundnum(margin_percentage);
	
	$("#margin_percentage_"+mission_id).val(margin_percentage);

	if(package_name==\'team\')
	{
		var mission_turnover=parseFloat($("#turnover_"+mission_id).val().replace(",","."));
		var team_fee=parseFloat($("#team_fee_"+mission_id).val().replace(",","."));
		var team_ca=roundnum(mission_turnover+team_fee);		
		$("#team_ca_"+mission_id).val(team_ca);
		
		fncalculateAutoTotal();//calculate cost automatically
	}
	var mindex=parseInt(index)+1;
	if(mission_id!=\'t\'+mindex)
	{
		/*staffing calculations*/
		var staff_target=\'/quote-new/get-staff-time-config?quote_id=\'+quote_id+\'&index=\'+index+\'&package_name=\'+package_name+"&margin_percentage="+margin_percentage;
		$.get(staff_target,function(data){
			//alert(mindex);
			if($.trim(data))
			{
				$("#missionlengthval_"+mindex).text(data);
				fnCalculateMissionTime();
			}
		});

	}
	
	fncalculateAutoTotal();//calculate cost automatically
	
	
	

}

//Apply global package to a quote
function quoteupdatepackage(package_name)
{
	$("[id^=package_]" ).each(function(z) {
		var divDetails=$(this).attr(\'id\');
		divDetails=divDetails.split("_");
		var mission_id=divDetails[1];
		$("#package_"+mission_id).val(package_name);
		
		//Updating all mission packages
		updatepackage(mission_id,package_name,z);		
		
	});
}

$(document).ready(function(){

	var quote_id=\''; ?>
<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
<?php echo '\';
	$(\'body\').on(\'hidden.bs.modal\', \'.modal\', function () {
	 $(this).removeData(\'bs.modal\');
	 $(\'.modal-backdrop\').remove();
		});

	
	var prefix = "final_";	
	
	//select picker and validation for selector
	$("#quote_package").selectpicker();
	$("[id^=package_]").selectpicker();
	
	$(\'select\').each(function() {
        $(this).next(\'div.select\').attr("id", prefix + this.id).removeClass("validate[required]");
    });		
	$("#save_final_validation").validationEngine(\'attach\',{prettySelect : true,autoHidePrompt: true,usePrefix: prefix});
	$("#changeFormValue").validationEngine(\'attach\',{prettySelect : true,autoHidePrompt: true,usePrefix: prefix});
	
	
	
	$("#prod_validation").validationEngine();
	$("#tech_validation").validationEngine();
	$("#seo_validation").validationEngine();

	$("#popupshow").on(\'click\',function(){
		if($("#save_final_validation").validationEngine(\'validate\'))
		{
			target=$(this).data(\'target\');
				$(target).modal(\'show\');
				$(target).removeClass( "hide" ).addClass("in");
				$(\'#prod_review\').find(\'.review_validate\').removeClass(\'hidden\');
				
		}
	});

	$(\'.icheck\').checkbox();
	
	/*form submit by asking team*/

	$(".send_team").on("change",function(){

		if($(\'.send_team:checked\').length==0)
		{
       		$("#saveFinal").removeAttr(\'disabled\');
       		$(".review_validate").removeClass(\'hidden\');
    		$("#popupshow").addClass(\'hidden\');
    	}
    	else
    	{
    		$("#saveFinal").attr(\'disabled\',\'disable\');
    		$("#popupshow").removeClass(\'hidden\');
    		$(".review_validate").addClass(\'hidden\');

    	}
			
	});
	$(".review_validate").on("click",function(){

		
		if($(this).hasClass(\'validate\'))
		{
			$(\'#save_final_validation\').attr(\'action\',\'/quote-new/save-final-validation?validate=save&quote_id=\'+quote_id);
			$("#save_final_validation").submit();
		}
	});

	$(\'#saveFinal\').on(\'click\',function(){
		if($("#save_final_validation").validationEngine(\'validate\'))
		{
			$("#save_final_validation").submit();
		}
	});
	
	//$("#estimate_sign_percentage").selectpicker();
	
	//file upload
	$("#sale_documents").MultiFile();
	
	fncalculateAutoTotal();//calculate cost automatically

	/*popover*/
	$(".pop_over").popover({trigger: \'hover\'});
	
	//exclude seo missions from the final margin
	$("document").on(\'click\',"[id^=smission_close_]", function() {
		var DivId = $(this).attr(\'id\');			
		var parentDiv=$(this).parents("div:eq(3)").attr(\'id\');
		//alert(parentDiv);
		var mission_identifier=$(this).attr(\'rel\');		
		var	quote_id=$("#quote_id").val();		
		
		if(!mission_identifier)
		{
			//if($("[id^=seo_mission_]").size()>1)					
				$("#"+parentDiv).remove();
				fncalculateAutoTotal();//calculate cost automatically
		}	
		else
		{	
			smoke.confirm("Souhaitez-vous vraiment supprimer cette mission du devis?",function(e){
				if (e)
				{
					$("#"+parentDiv).html(\'<center><img alt="" src="/BO/theme/gebo/img/ajax_loader.gif"> Suppression de cette mission devis... </center>\');
					ajaxSEOMissionUpdate(quote_id,mission_identifier,parentDiv,\'\');
					fncalculateAutoTotal();//calculate cost automatically
				}
				else
				{
					return false;
				}
			});				
		}	
			
	});	
	
	//exclude Tech missions from the final margin
	
	$("document").on(\'click\',"[id^=tmission_close_]", function() {
		var DivId = $(this).attr(\'id\');			
		var parentDiv=$(this).parents("div:eq(3)").attr(\'id\');
		//alert(parentDiv);
		var mission_identifier=$(this).attr(\'rel\');		
		var	quote_id=$("#quote_id").val();				
		if(!mission_identifier)
		{
			//if($("[id^=seo_mission_]").size()>1)					
				$("#"+parentDiv).remove();
				fncalculateAutoTotal();//calculate cost automatically
		}	
		else
		{	
			smoke.confirm("Souhaitez-vous vraiment supprimer cette mission tech du devis?",function(e){
				if (e)
				{
					$("#"+parentDiv).html(\'<center><img alt="" src="/BO/theme/gebo/img/ajax_loader.gif"> Suppression de cette mission tech devis... </center>\');
					ajaxTECHMissionUpdate(quote_id,mission_identifier,parentDiv,\'\');
					fncalculateAutoTotal();//calculate cost automatically
				}
				else
				{
					return false;
				}
			});				
		}	
			
	});
	
	$("#delivery_time_calc_modal").on(\'hidden\', function() {
		//alert(\'test\');
		$(this).removeData("modal");
		$("#delivery_time_calc_modal .modal-body").html(\'\');
	});
	
	////////////to show the timer of tech time line///////
      /*var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';*/
      var cur_date=\'\';
      var js_date=(new Date().getTime())/ 1000;
      var diff_date=Math.floor(js_date-cur_date);
     //////////show timer//////////
	$("[id^=time_]").each(function(i) {
		var article=$(this).attr(\'id\').split("_");
		var ts=article[2];
		
		if($(this).attr(\'class\') !== undefined && $(this).attr(\'class\')==\'enretard alert alert-warning pull-right quote-timer\'){
		
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
				if(days >0 )message += days + " jours"  +"  ";
				if(hours >0 )message += hours + " h " ;
				if(minutes >0 )message += minutes + " min ";
				message += seconds + " sec ";
				$("#text_"+article[1]+"_"+article[2]).html(message);
				if(days==0 && hours==0 && minutes==0 && seconds==0)
				{
					//window.location.reload();
				}
			}
		});
	}
	});
	
	
	//estimate sign date 
		/* $(\'#estimate_sign_date\').datetimepicker({
			format:\'Y-m-d\',
			lang:\'fr\',
			timepicker:false
		}); */
		$(\'#estimate_sign_date\').datetimepicker({
			format:\'YYYY-M-D\',			
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: \'fa fa-chevron-left\',
                next: \'fa fa-chevron-right\',
                today: \'fa fa-screenshot\',
                clear: \'fa fa-trash\',
                close: \'fa fa-remove\'
            }
         });
		
		
	//free mission cost reduced
	
	$("[id^=free_mission_]").change(function(){
		$input = $(this);
		var checkname = $(this).attr("name");
		if($input.is(\':checked\'))
		{
			$("input:checkbox[name=\'" + checkname + "\']").val("yes");			
		}
		else{
			 $("input:checkbox[name=\'" + checkname + "\']").val("no");
		}			
		fncalculateAutoTotal();	
			
	});

   $(document).on("click",".deletetech",function(){
	var id_identifier = $(this).attr("rel");
		if(confirm("Are you sure? Want to delete this File"))
		{
			//$(this).closest(".topset2").remove();
			var thisvar =$(this).closest(\'.onsuccessrep\');
			thisvar.html("Please Wait Deleting File.");
			$.post("/quote/delete-document-sale",{"identifier":id_identifier},function(result){
					thisvar.html(result);
			}); 
		}	
	});
	
	$(document).on("click",".deletesales",function(e){
		e.preventDefault();
		var id_identifier = $(this).attr("rel");
		msg="Are you sure? Want to delete this File";
		smoke.confirm(msg,function(e)
		{
			if(e){
			$(\'#sales-document\').html("Please Wait Deleting File.");
			$.post("/quote/delete-sales-document",{"identifier":id_identifier},function(result){
				$(\'#sales-document\').html(result);
			}); 
			}
			
		},{"ok":"Oui","cancel":"Non"});	
	});


function removeDisabled(){	setTimeout(function(){$(".MultiFile-applied").removeAttr("disabled");}, 1000);	}

});

//calculate total staff,total internal cost and total delivery
function fnCalculateMissionTime()
{
		
	var total_delivery_time=0;		
	
	//calculating total delivery time
	total_delivery_time=0;
	total_tech_time=0;
	$("[id^=missionlengthval_]" ).each(function(z) {
		var deliveryTime=parseFloat($(this).text());
		
		if(deliveryTime>total_delivery_time)	
		total_delivery_time=deliveryTime;
	});	
	$("[id^=missionlengtht_]" ).each(function(z) {
		var tdeliveryTime=parseFloat($(this).text());
		
		if(tdeliveryTime>total_tech_time)	
		total_tech_time=tdeliveryTime;
	});

	$("#total_mission_length").val(total_delivery_time+total_tech_time);
	
	
}

//calculate unit price and margin with diminish percentage
function fnCalUnitPriceAndMargin(mission_id,percentage)
{
	var unit_price=parseFloat($("#cost_diminish_"+mission_id).attr(\'data-price\').replace(",","."));	
	var FreeMissionval= $("#free_mission_"+mission_id+":checked").val();	
	
	var internalcost=parseFloat($("#internal_cost_"+mission_id).val().replace(",","."));
	var margin=parseFloat($("#margin_percentage_"+mission_id).val().replace(",","."));
	
	var new_unit_price= roundnum(unit_price*(1-(percentage/100)));
	//alert(new_unit_price);
	
	if(new_unit_price>0 && new_unit_price > internalcost)
	{
		var new_margin=roundnum(100*(1-internalcost/new_unit_price));	
		var new_unit_price_text=new_unit_price.replace(".",".");
		$("#unit_price_"+mission_id).val(new_unit_price_text);
		$("#margin_percentage_"+mission_id).val(new_margin);
		
		var volume=parseFloat($("#volume_"+mission_id).text().replace(",","."));
		if(FreeMissionval==\'yes\')
		{
		var turnover=(0).toFixed(2);
		}
		else
		{
		var turnover=roundnum(volume*new_unit_price);
		}
		
		var turnover_text=turnover.replace(".",".");
		
		$("#turnover_"+mission_id).val(turnover_text);
	}
	
	//total price
	var total_price=0;
	var total_internalcost=0;
	var total_unitprice=0;
	$("[id^=turnover_]" ).each(function(z) {
		//Added w.r.t package
		var tid = $(this).attr(\'id\');
		var tids=tid.split("_");
		
		var tmission_id=tids[1];
		var FreeMissiontoval= $("#free_mission_"+tmission_id+":checked").val();
		var tpackage=$("#package_"+tmission_id).val();
		if(tpackage==\'user\') 
		{
			var user_fee=$("#user_fee_"+tmission_id).val();
			var number_profiles=$("#profiles_"+tmission_id).val();
			
			if(FreeMissiontoval==\'yes\')
			{
			user_total=0;
			var missionPrice=parseFloat($("#user_ca_"+tmission_id).val(user_total));	
			}
			else
			{
			user_total=user_fee*number_profiles;
			var missionPrice=parseFloat($("#user_ca_"+tmission_id).val(user_total));	
			}
			//alert(missionPrice);
		}
		else if(tpackage==\'team\') 
		{
			var mission_turnover=parseFloat($("#turnover_"+tmission_id).val().replace(",","."));
			var team_fee=parseFloat($("#team_fee_"+tmission_id).val().replace(",","."));
			var team_pack=parseFloat($("#team_packs_"+tmission_id).val().replace(",","."));
			if(isNaN(team_pack))
				team_pack=0;
			var team_turnover=parseFloat(team_fee*team_pack);			
			$("#team_fee_ca_"+tmission_id).val(roundnum(team_turnover));//total team fee
			if(FreeMissiontoval==\'yes\')
				{
				var missionPrice=0;
				}
				else
				{
				var missionPrice=(mission_turnover+team_turnover);
				}
			
			$("#team_ca_"+tmission_id).val(roundnum(missionPrice));
		}
		else
		{//END
			var missionPrice=parseFloat($(this).val().replace(",","."));
		}
		
		
		if(isNaN(missionPrice))
			missionPrice=0;
			
			//free mission calculate
		
		if(FreeMissiontoval==\'yes\')
		{
			missionPrice=0;
			total_price=total_price+missionPrice;
		}
		else 
		{
			total_price=total_price+missionPrice;	
		}
		
		
	});
	
	var total_price_text=roundnum(total_price);	
	total_price_text=total_price_text.replace(".",".");
	$("#total_price").text(total_price_text);
	//over all margin calculations
	
	$("[id^=unit_price_]" ).each(function(z) {     //unit price total
		var unitPrice=parseFloat($(this).val().replace(",","."));
		if(isNaN(unitPrice))
			unitPrice=0;
		total_unitprice=total_unitprice+unitPrice;
		
	});
	
	$("[id^=internal_cost_]" ).each(function(z) { //internal cost total
		var internalPrice=parseFloat($(this).val().replace(",","."));
		if(isNaN(internalPrice))
			internalPrice=0;
		total_internalcost=total_internalcost+internalPrice;
		
	});
	//alert(total_internalcost+\'--\'+total_unitprice);
	
	var FreeMissionvaltot= $("#free_mission_"+mission_id+":checked").val();	
		if(FreeMissionvaltot==\'yes\')
		{
			$("#total_margin").val();
		}
		else 
		{
			var total_margin=roundnum(100-(total_internalcost/total_unitprice)*100);
			$("#total_margin").val(total_margin);
		}
	

}

//calculate total internal cost and total delivery
function fnCalTotalCosts(mission_id,margin_percentage)
{

	var total_price=0;
	var total_internalcost=0;
	var total_unitprice=0;
	
	var volume=parseFloat($("#volume_"+mission_id).text().replace(",","."));
	var internalcost=parseFloat($("#internal_cost_"+mission_id).val().replace(",","."));
	
	var FreeMissionval= $("#free_mission_"+mission_id+":checked").val();
	
	//var unit_price=parseFloat($("#unit_price_"+mission_id).val().replace(",","."));
	
	/*commended based on the cost*/
	//alert(margin_percentage+\' margin \'+internalcost);
	var unit_price=(internalcost/(1-margin_percentage/100));
	//alert(unit_price);
	//unit_price=unit_price.toFixed(2);
	unit_price=roundnum(unit_price);
	
	//added w.r.t price diminish
	$("#cost_diminish_"+mission_id).attr(\'data-price\',unit_price);
	$("#cost_diminish_"+mission_id).val(0);
	
	
		if(FreeMissionval==\'yes\')
		{
		var turnover=(0).toFixed(2);
		}
		else
		{

		var turnover=roundnum(volume*unit_price);
		}
	
			
	var turnover_text=turnover.toString().replace(".",".");
	var unit_price_text=unit_price.toString().replace(".",".");
	
	//alert(internalcost+\'--\'+volume+\'--\'+margin_percentage+\'--\'+unit_price);
	$("#unit_price_"+mission_id).val(unit_price_text);
	$("#turnover_"+mission_id).val(turnover_text);
	
	//total price
	$("[id^=turnover_]" ).each(function(z) {
		//Added w.r.t package
		var tid = $(this).attr(\'id\');
		var tids=tid.split("_");
		
		var tmission_id=tids[1];
		
		var FreeMissiontoval= $("#free_mission_"+tmission_id+":checked").val();
		
		var tpackage=$("#package_"+tmission_id).val();

		if(tpackage==\'user\') 
		{
			var user_fee=$("#user_fee_"+tmission_id).val();
			var number_profiles=$("#profiles_"+tmission_id).val();
			
			if(FreeMissiontoval==\'yes\')
			{
			user_total=0;
			var missionPrice=parseFloat($("#user_ca_"+tmission_id).val(user_total));	
			}
			else
			{
			user_total=user_fee*number_profiles;
			$("#user_ca_"+tmission_id).val(user_total);
			var missionPrice=parseFloat(user_total);
			//alert(missionPrice);
			}

		}
		else if(tpackage==\'team\') 
		{
			var mission_turnover=parseFloat($("#turnover_"+tmission_id).val().replace(",","."));
			var team_fee=parseFloat($("#team_fee_"+tmission_id).val().replace(",","."));
			var team_pack=parseFloat($("#team_packs_"+tmission_id).val().replace(",","."));
			if(isNaN(team_pack))
				team_pack=0;
			var team_turnover=parseFloat(team_fee*team_pack);			
			
			$("#team_fee_ca_"+tmission_id).val(roundnum(team_turnover));//total team fee
			
			if(FreeMissiontoval==\'yes\')
				{
				var missionPrice=0;
				}
				else
				{
				var missionPrice=(mission_turnover+team_turnover);
				}
			
			$("#team_ca_"+tmission_id).val(roundnum(missionPrice));
		}
		else
		{//END
			var missionPrice=parseFloat($(this).val().replace(",","."));
		}
		
		
		if(isNaN(missionPrice))
			missionPrice=0;
			
		
		
		if(FreeMissiontoval==\'yes\')
		{
			missionPrice=0;
			total_price=total_price+missionPrice;
		
		}
		else 
		{
			total_price=total_price+missionPrice;	
		
		}
		
	});
	//Calculate For Free Mission
	//alert(total_price);
	var total_price_text=roundnum(total_price);	
	total_price_text=total_price_text.toString().replace(".",".");
	$("#total_price").text(total_price_text);
		
	//over all margin calculations
	
	$("[id^=unit_price_]" ).each(function(z) {     //unit price total
		var unitPrice=parseFloat($(this).val().replace(",","."));
		if(isNaN(unitPrice))
			unitPrice=0;
		
		var divDetails=$(this).attr(\'id\');
		divDetails=divDetails.split("_");
		var mission_id=divDetails[2];
		var FreeMissionval= $("#free_mission_"+mission_id+":checked").val();
		if(FreeMissionval==\'yes\'){
			total_unitprice=total_unitprice+0;
		}
		else{
			total_unitprice=total_unitprice+unitPrice;
		}
		
	});
	
	$("[id^=internal_cost_]" ).each(function(z) { //internal cost total
		var internalPrice=parseFloat($(this).val().replace(",","."));
		if(isNaN(internalPrice))
			internalPrice=0;
		
		var divDetails=$(this).attr(\'id\');
		divDetails=divDetails.split("_");
		var mission_id=divDetails[2];
		
		var FreeMissionval= $("#free_mission_"+mission_id+":checked").val();	
		if(FreeMissionval==\'yes\'){
			total_internalcost=total_internalcost+0;
		}
		else
		{
			total_internalcost=total_internalcost+internalPrice;
		}	
		
	});
	//alert(total_internalcost+\'--\'+total_unitprice);
	
	var total_margin=(100-(total_internalcost/total_unitprice)*100).toFixed(5);
	if(isNaN(total_margin))
		total_margin=0;
	$("#total_margin").val(total_margin);
	

}

function fnChangeAllMargins(margin_percentage)
{	
	margin_percentage=margin_percentage.replace(",",".");
	var NanValue=false;
	if(isNaN(margin_percentage) || margin_percentage==\'\')
	{
			margin_percentage=0;
		NanValue=true;
	}
	//chage prices of all missions w.r.t total margin
	$("[id^=margin_percentage_]" ).each(function(z) {
		var divDetails=$(this).attr(\'id\');
		divDetails=divDetails.split("_");
		var mission_id=divDetails[2];			
		var percentage=margin_percentage;
		percentage=parseFloat(percentage);
		$(this).val(percentage);
		fnCalTotalCosts(mission_id,percentage);		
	});
	if(!NanValue)
	$("#total_margin").val(margin_percentage);
	else
		$("#total_margin").val(\'\');

}

function fncalculateAutoTotal()
{
	$("[id^=margin_percentage_]" ).each(function(z) {
		var divDetails=$(this).attr(\'id\');
		divDetails=divDetails.split("_");
		var mission_id=divDetails[2];			
		var percentage=parseFloat($(this).val().replace(",","."));
		fnCalTotalCosts(mission_id,percentage);		
	});
}

/** ajax function to update seo mission include_final status**/
function ajaxSEOMissionUpdate(quote_id,mission_identifier,divid,last)
{
        var target_page = "/quote/delete-quote-mission?type=includes_update&quote_id="+quote_id+"&mission_identifier="+mission_identifier;
		//alert(target_page);	
		$.post(target_page, function(data){					
				//alert(data);
				sleep(2000);
				$("#"+divid).remove();
				if(last==\'final\')
					location.reload();
			});
}


/** ajax function to update tech mission include_final status**/
function ajaxTECHMissionUpdate(quote_id,mission_identifier,divid,last)
{
        var target_page = "/quote/delete-quote-mission?mission_type=tech&type=includes_update&quote_id="+quote_id+"&mission_identifier="+mission_identifier;
		//alert(target_page);	
		$.post(target_page, function(data){					
				//alert(data);
				sleep(2000);
				$("#"+divid).remove();
				if(last==\'final\')
					location.reload();
			});
}


function loadeditarticle(index,tmission)
{
	if(tmission==\'m\')
	{
		$(\'#epmargin\').addClass(\'validate[required,minWriters[0.01],maxWriters[99.99]]\');
	}
	else
	{
		$(\'#epmargin\').addClass(\'validate[required,minWriters[0.00],maxWriters[99.99]]\');
	}
		var unit_price=$("#unit_price_"+index).val().replace(",",".");
		var margin=$("#margin_percentage_"+index).val().replace("%","");	
		$("#price_per_article").val(unit_price);
		$("#epmargin").val(margin);
		var internal_cost=roundnum((unit_price*(100-margin))/100);
		//alert(unit_price+\'--\'+margin+\'--\'+internal_cost);
		$("#internal_cost_"+index).val(internal_cost);
		$("#missionindex").val(index);	
		
}
function changeOnPrice()
{
	if($("#changeFormValue").validationEngine(\'validate\'))
	{
	var index=$("#missionindex").val();
	var price=$(\'#internal_cost_\'+index).val();
	var price_per_article=$("#price_per_article").val().replace(",",".");
	var margin=(price * 100)/(price_per_article);
	//if(margin<100)
	var marginval=100-margin;
	if(Math.floor(marginval) == marginval)
		$("#epmargin").val(marginval);
	else
		$("#epmargin").val(round5num(marginval));
	}

}
function changeOnMargin()
{
	if($("#changeFormValue").validationEngine(\'validate\'))
{
	var index=$("#missionindex").val();
	var margin=$("#epmargin").val().replace(",",".");
	var internalcost=$(\'#internal_cost_\'+index).val();
	var price_per_article=(internalcost/(1-margin/100));
	if(Math.floor(price_per_article) == price_per_article)
		$("#price_per_article").val(price_per_article);
	else
		$("#price_per_article").val(roundnum(price_per_article));
}
}
function validatearticleprice()
{
	if($("#changeFormValue").validationEngine(\'validate\'))
{
	var index=$("#missionindex").val();
	var quote_id=\''; ?>
<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
<?php echo '\';
	var margin=$("#epmargin").val().replace(",",".");
	var price_per_article=roundnum(parseFloat($("#price_per_article").val().replace(",",".")));
	var internal_cost=$("#internal_cost_"+index).val();		
	$.ajax({
		type: \'GET\',
		url: \'/quote-new/update-unit-price\',
		data: \'quote_id=\'+quote_id+\'&index=\'+index +\'&margin_percentage=\'+margin+ \'&unit_price=\'+price_per_article+\'&internal_cost=\'+internal_cost+\'&updateby=sales\',			  
		success: function(data)
		{   
			//alert(data);
			$(\'#editarticleprice\').modal(\'toggle\');			
			$("#unit_price_"+index).val(price_per_article);
			$("#margin_percentage_"+index).val(margin);
			fncalculateAutoTotal();
		}
	 });		
	return false;
	}
}

</script>
<style>
.MultiFile-title{
	width:100% !important;
	font-size:13px !important;
	}
</style>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo-new/quote/header.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


		<div id="quote-final" class="container-fluid">
			<div class="content">	
			<h1><small><?php echo $this->_tpl_vars['create_step1']['quote_title']; ?>
</small><br> Final Quote</h1>

			<div class="">
				<div class="tab-content">
					<div role="tabpanel"  class="tab-pane fade in active " id="overview">
						<form action="/quote-new/save-final-validation?quote_id=<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
" method="POST" name="save_final_validation" id="save_final_validation" enctype="multipart/form-data" class="form-inline">	
							<input type="hidden" id="quote_id" name="quote_id" value="<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
">
							
								<table class="misson-details-text table table-condensed" id="mission-head">
									<tr>
										<th class="col-xs-2">
										<label><?php if ($this->_tpl_vars['quotes']['final_mission_length_difference'] == 'yes'): ?>
														<span class="version-change pop_over" data-placement="right" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quotes']['final_mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="fa fa-bar-chart-o"></i></span>
												<?php endif; ?>
												Contract duration</label>													
											<div class="form-group">
												
												<div class="input-group">
													<input type="text" id="total_mission_length" value="<?php if ($this->_tpl_vars['quotes']['final_mission_length']): ?><?php echo $this->_tpl_vars['quotes']['final_mission_length']; ?>
<?php endif; ?>" name="total_mission_length" class="validate[required] input-small form-control" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser'): ?> <?php else: ?>disabled="disable"<?php endif; ?>>											
													<div class="input-group-addon">Day(s)</div>
												</div>
												<input type="hidden" name="total_time_option" id="total_time_option" value="days">
													<!--final_mission_length_option-->
											</div>
										</th>
										<!--th class="col-xs-2 text-center">
										<label>Exptected launch date</label>
											<div class="form-group">
											<input type="text" id="prod_extra_launch_days" value="<?php if ($this->_tpl_vars['quotes']['prod_extra_launch_days']): ?><?php echo $this->_tpl_vars['quotes']['prod_extra_launch_days']; ?>
 <?php endif; ?>" name="prod_extra_launch_days" class="form-control input-small" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser'): ?> <?php else: ?>disabled="disable"<?php endif; ?>>
												<label class="text-uppercase" for="text"> Jours</label>
											</div>
										</th-->
									
										
										<th class="col-xs-3">
											<label>Estimation / Date of signature</label><br>
										<div class="form-inline">	
										<div class="form-group" >
																	
													<select name="estimate_sign_percentage" id="estimate_sign_percentage" class="form-control" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser'): ?> <?php else: ?>disabled="disable"<?php endif; ?>>			
														<option <?php if ($this->_tpl_vars['quotes']['estimate_sign_percentage'] == '20'): ?> selected <?php endif; ?> value="20" >20%</option>
														<option value="40" <?php if ($this->_tpl_vars['quotes']['estimate_sign_percentage'] == '40'): ?> selected <?php endif; ?> >40%</option>
														<option value="60" <?php if ($this->_tpl_vars['quotes']['estimate_sign_percentage'] == '60'): ?> selected <?php endif; ?> >60%</option>
														<option value="80" <?php if ($this->_tpl_vars['quotes']['estimate_sign_percentage'] == '80'): ?> selected <?php endif; ?>>80%</option>
													</select>
													
												</div>	
													
											<div class="form-group">
												
												<input class="validate[required] form-control" placeholder="Enter a date" value="<?php echo $this->_tpl_vars['quotes']['estimate_sign_date']; ?>
" type="text" name="estimate_sign_date" id="estimate_sign_date" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser'): ?> <?php else: ?>disabled="disable"<?php endif; ?>/>
											</div>
										</div>
										</th>
										<th class="col-xs-2">
											<div class="form-group">
											<label><?php if ($this->_tpl_vars['quotes']['final_margin_difference'] == 'yes'): ?>
												<span class="version-change pop_over" data-placement="left" data-original-title="Previous versions" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quotes']['final_margin_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true">  <i class="fa fa-bar-chart-o"></i>
											<?php endif; ?> Margin</label><br>
												<div class="input-group">
											
													<input type="text" id="total_margin" name="total_margin" class="form-control" onkeyup="fnChangeAllMargins(this.value);" value="<?php echo $this->_tpl_vars['quotes']['total_margin']; ?>
" size="10" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser'): ?> <?php else: ?>disabled="disable"<?php endif; ?> >
													<span class="input-group-addon">%</span>
												</div>
												</div>

										</th>
										<th class="col-xs-3 text-right total-price">
											
											
											<h2>
												<small><?php if ($this->_tpl_vars['quotes']['final_turnover_difference'] == 'yes'): ?>
											<span class="version-change pop_over" data-placement="left" data-original-title="<font style='color:#34495e'>Historique devis</font>" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quotes']['final_turnover_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="fa fa-bar-chart-o"></i> 
										<?php endif; ?> Total </small><br>
										<span id="total_price" ></span>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
; </h2>
												
											
										</th>

										<!--<th class="submit-color text-center">
											<div  style="vertical-align: bottom;">
																						<!--<button type="submit" class="btn btn-lg btn-simple" style="background-color:#3598db;padding:5px;margin: 20px 0 0;color:#fff;"><span class="glyphicon glyphicon-ok"></span></button>-->
																							<!--<button type="submit" class="btn btn-lg btn-simple" style="background-color:#3598db;padding:5px;margin: 20px 0 0;color:#fff;"><span class="glyphicon glyphicon-ok"></span> </button></div>
																							
										</th>-->
									</tr>
																												
								</table>
												
							
							<?php if (count($this->_tpl_vars['quote_missions']['tech']['linked_to_prod']) > 0): ?>
																													
													
								<?php $_from = $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmission']):
        $this->_foreach['tmission']['iteration']++;
?>
								
								
									<?php $this->assign('tn_index', ($this->_foreach['tmission']['iteration']-1)); ?>
									<?php $this->assign('tms_index', ($this->_foreach['tmission']['iteration']-1)+1); ?>					<?php if ($this->_tpl_vars['tmission'] == 'all_prod' && $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['to_perform'] == 'Before'): ?>
										<!--<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>-->
										<div  id="mission_details_t<?php echo $this->_tpl_vars['tms_index']; ?>
" class="prod_mission">	
											<div class="mission-details">								
												
												<table class="table table-bordered tech_list">		
													<tr>
													  <td class="col-md-3">
													  <div class="pull-left mission-title">
													  <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['title_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['title_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="fa fa-bar-chart-o"></i> 
														<?php endif; ?>
														<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_type']; ?>
</div>
													  <div class="pull-left grey-text" style="clear:both"> <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['language_name']; ?>
 </div>
													  </td>
													  
													  <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_oneshot'] == 'no'): ?>
													  <td class="col-md-2" colspan="2">

													  <div class="text-center pull-left" style="width:50%">
													  <span class="p" id="missionlengtht_<?php echo $this->_tpl_vars['tms_index']; ?>
">
													  <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['mission_length_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="fa fa-bar-chart-o"></i> 
														<?php endif; ?><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_mission_length']; ?>
</span>

														<input type="hidden"  id="mission_length_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="mission_length_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_mission_length']; ?>
" class="input-small form-control validate[required"  style="background:#fff;">
													 
															 <div class="text-uppercase grey-text">Days</div>
														 </div>	 
														<div class="text-center pull-right " style="width:50%">
															<span class="p" id="volume_t<?php echo $this->_tpl_vars['tms_index']; ?>
"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume']; ?>
</span>
															
															<div class="text-uppercase grey-text">Volume</div>
															</div>
															
															<span class="col-md-12" style="border-top:1px solid #ddd;"></span>
															<div  class="text-center text-uppercase" >
															<span class="col-md-12" style="padding:5px;">
																<strong><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume_max']; ?>
</strong>  <span class="grey-text"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['delivery_volume_option']; ?>
</span> <strong><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tempo_length']; ?>
</strong> <span class="grey-text"><?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tempo_length_option'] == 'days'): ?>JOURS<?php else: ?><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tempo_length_option']; ?>
<?php endif; ?></span>
															</span>
															</div>
															
															
															</div>
														</td>
														<?php else: ?>
													  <td class="col-md-1">
													  <div class="text-center">
													 <span class="p" id="missionlengtht_<?php echo $this->_tpl_vars['tms_index']; ?>
">
													  <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_mission_length']; ?>
</span>
														<input type="hidden"  id="mission_length_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="mission_length_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_mission_length']; ?>
" class="input-small form-control validate[required"  style="background:#fff;">
													  </div>
															 <span class="text-uppercase grey-text">Days</span>
															 
														</td>

														<td>
														<div class="text-center">
															<span class="p" id="volume_t<?php echo $this->_tpl_vars['tms_index']; ?>
"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume']; ?>
</span>
															</div>
															<span class="text-uppercase grey-text">	VOLUME</span>
														</td>
														<?php endif; ?>
														<td class="col-md-1 text-center">
														
															<div class="">
															
															<input  id="unit_price_t<?php echo $this->_tpl_vars['tms_index']; ?>
" size="5" name="unit_price_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="highQuote <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['cost_difference'] == 'yes'): ?> new-version<?php endif; ?>" readonly="readonly">
															<sup>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</sup>
															</div>
															<div class="text-uppercase grey-text">Selling P/ART</div>
															<input  id="internal_cost_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="internal_cost_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['internal_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="form-control highQuote" type="hidden"> 
															<?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['cost_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="fa fa-bar-chart-o"></i> </span>
															<?php endif; ?>
															<!--<div class="col-md-12 text-center">
																<div class="input-group">
																	<span class="input-group-addon">-</span>
																<input data-price="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="form-control validate[required]" type="text" id="cost_diminish_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="cost_diminish_<?php echo $this->_tpl_vars['ms_index']; ?>
" onkeyup="fnCalUnitPriceAndMargin('<?php echo $this->_tpl_vars['ms_index']; ?>
',this.value);" value="0"><span class="input-group-addon">%</span>
																</div>
															</div>-->

														
														
													</td>
														<td class="col-md-1 text-center">
													<a <?php if ($this->_tpl_vars['quotes']['sales_review'] != 'signed'): ?>data-toggle="modal" href="" data-target="#editarticleprice" onClick="loadeditarticle(t<?php echo $this->_tpl_vars['tms_index']; ?>
,'')" <?php endif; ?>>
															<div class="input-group" >
																	<input type="text" readonly="readonly"  class="form-control validate[required]" id="margin_percentage_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="margin_percentage_t<?php echo $this->_tpl_vars['tms_index']; ?>
" onkeyup="fnCalTotalCosts('t<?php echo $this->_tpl_vars['tms_index']; ?>
',this.value);" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['margin_percentage']; ?>
" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?> style="cursor:pointer;"><span class="input-group-addon">%</span>
															</div>											
															<span class="text-uppercase grey-text">Margin</span>		
															</a>	
															
														</td>
														
														<td class="mission-pakage col-md-3">
														<div style="display:none;">
															<select name="package_t<?php echo $this->_tpl_vars['tms_index']; ?>
" id="package_t<?php echo $this->_tpl_vars['tms_index']; ?>
" class="validate[required] pakage-select" onchange="updatepackage('t<?php echo $this->_tpl_vars['tms_index']; ?>
',this.value,'<?php echo $this->_tpl_vars['tn_index']; ?>
');" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?>>
																	<option value="lead" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] == 'lead'): ?> selected<?php endif; ?> >Lead</option>
																	<option value="team" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] == 'team'): ?> selected<?php endif; ?>>Team</option>
																	<option value="link" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] == 'link'): ?> selected<?php endif; ?>>Link</option>
																																	</select>
														</div>
														<table>
																<tr class="misson-details-text" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] != 'team'): ?>style="display:none"<?php endif; ?> id="other_details_team_t<?php echo $this->_tpl_vars['tms_index']; ?>
">
																<td>
																<div class="form-group col-md-12">
																	<!--<span style=" display: block;padding-top: 0px;">Nombre de profils : <?php echo $this->_tpl_vars['mission']['required_writes']; ?>
</span>-->
																	<input type='hidden' name="profiles_t<?php echo $this->_tpl_vars['tms_index']; ?>
" id="profiles_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['required_writer']; ?>
" >
																
																	<input type="text" class="form-control validate[required]" id="team_packs_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="team_packs_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['required_writer']; ?>
" onkeyup="fncalculateAutoTotal();" size="2" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?>> x 		
																	
																		<span class="input-group"><input type="text" class="form-control validate[required]" id="team_fee_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="team_fee_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['team_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fncalculateAutoTotal();" size="2"><span class="input-group-addon" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?>>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;/Pack</span></span>
																	 =
																	<input  id="team_fee_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="team_fee_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="" class="color-normal" style="cursor:text;" readonly="readonly" size="2">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
																</div>
																	<span style=" display: block;padding-top: 0px;">
																		CA Total : 
																		<input  id="team_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="team_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['team_package_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class=" highQuote color-normal" style="cursor:text;" readonly="readonly" size="5"> &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
																	</span>	
																</td>
															</tr>
															<tr class="misson-details-text" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="other_details_user_t<?php echo $this->_tpl_vars['tms_index']; ?>
">
																<td >
																<div class="form-group col-md-12">
																	<span style=" display: block;padding-top: 0px;">Nb of profile: <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['required_writes']; ?>
</span>
																	<input type='hidden' name="profiles_t<?php echo $this->_tpl_vars['tms_index']; ?>
" id="profiles_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['required_writer']; ?>
">
																	Fees offre user : 
																	<div class="input-group">
																	<input type="text" class="form-control validate[required]" id="user_fee_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="user_fee_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
"  onkeyup="fnCalUserTurnover('t<?php echo $this->_tpl_vars['tms_index']; ?>
',<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
,1);" size="4" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?> ><span class="input-group-addon">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</span>
																	</div>
																
																	<span style=" display: block;padding-top: 0px;">
																		CA Total :  
																		<input  id="user_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="user_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="" class="remove-border highQuote" style="cursor:text;" readonly="readonly" size="5">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
																	</span>	

																	</div>
																</td>											
																</tr>
														</table>
														</td>

														<td class="mission-turnover col-md-2 text-right" >
															<div class="input-group">
																<input  id="turnover_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="turnover_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="remove-border" readonly="readonly"> &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
																
															</div>
															 
															<div class="free-mission">
																<label class="checkbox">
																	<input type="checkbox" name="free_mission_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['free_mission'] == 'yes'): ?>yes<?php else: ?>no<?php endif; ?>" id="free_mission_t<?php echo $this->_tpl_vars['tms_index']; ?>
" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['free_mission'] == 'yes'): ?>checked="checked"<?php endif; ?> <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?> class="icheck"/>
																	<span class="free-label">Free</span>
																</label>
															</div>
															
														</td>
														
													</tr>

												</table>
											</div>
										</div>	
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>				
							<?php endif; ?>
								<?php if (count($this->_tpl_vars['quote_missions']) > 0): ?>						
								<?php $_from = $this->_tpl_vars['quote_missions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>
									<?php $this->assign('gn_index', ($this->_foreach['misson']['iteration']-1)); ?>
									<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>
									<?php if ($this->_tpl_vars['mission']['product_name']): ?>
										<!--<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>-->
										<div  id="mission_details_<?php echo $this->_tpl_vars['gn_index']; ?>
">	
											<div class="mission-details">								
												
												<table class="table table-bordered prod_seo_list">		
													<tr>
													  <td class="col-md-3">
													  <div class="pull-left mission-title">
													  <?php if ($this->_tpl_vars['mission']['product_name'] == 'Content Strategy'): ?>
													  Mission De <?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <?php if ($this->_tpl_vars['mission']['producttype_name']): ?>/ <?php echo $this->_tpl_vars['mission']['producttype_name']; ?>
 <?php endif; ?> 
													  <?php else: ?>
													   <a  data-toggle="modal" data-target="#editmission" href="/quote-new/prod-mission-edit-popup?quote_id=<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
&id=<?php echo $this->_tpl_vars['mission']['identifier']; ?>
&offset=<?php echo $this->_tpl_vars['ms_index']; ?>
">Mission De <?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <?php if ($this->_tpl_vars['mission']['producttype_name']): ?>/ <?php echo $this->_tpl_vars['mission']['producttype_name']; ?>
 <?php endif; ?> <?php if ($this->_tpl_vars['mission']['nb_words']): ?>/ <?php echo $this->_tpl_vars['mission']['nb_words']; ?>
 <?php endif; ?> </a>
													   <?php endif; ?></div>
													  <div class="pull-left grey-text" style="clear:both"> <?php echo $this->_tpl_vars['mission']['language_name']; ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?> > <?php echo $this->_tpl_vars['mission']['languagedest_name']; ?>
<?php endif; ?> </div>
													  </td>
													  
													  <?php if ($this->_tpl_vars['mission']['oneshot'] == 'no'): ?>
													  <td class="col-md-2" colspan="2">

													  <div class="text-center pull-left" style="width:50%">
													  <span class="p" id="missionlengthval_<?php echo $this->_tpl_vars['ms_index']; ?>
"><?php echo $this->_tpl_vars['mission']['mission_staff']; ?>
</span>

														<input type="hidden"  id="mission_length_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="mission_length_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
" class="input-small form-control validate[required <?php if ($this->_tpl_vars['mission']['oneshot'] == 'yes'): ?>,minWriters[<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
]<?php endif; ?>] <?php if ($this->_tpl_vars['mission']['mission_length_new'] != 0 && $this->_tpl_vars['mission']['mission_length_new'] != "" && $this->_tpl_vars['mission']['oneshot'] == 'no'): ?>minWriters[<?php echo $this->_tpl_vars['newduration'][0]; ?>
] <?php endif; ?>"  style="background:#fff;">
													 
															 <div class="text-uppercase grey-text">Days</div>
														 </div>	 
														<div class="text-center pull-right " style="width:50%">
															<span class="p" id="volume_<?php echo $this->_tpl_vars['ms_index']; ?>
"><?php echo $this->_tpl_vars['mission']['volume']; ?>
</span>
															
															<div class="text-uppercase grey-text">VOLUME</div>
															</div>
															
															<span class="col-md-12" style="border-top:1px solid #ddd;"></span>
															<div id="tempo_details_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="text-center text-uppercase">
															<span class="col-md-12" style="padding:5px;">
																<strong><?php echo $this->_tpl_vars['mission']['volume_max']; ?>
</strong> <span class="grey-text"> <?php echo $this->_tpl_vars['mission']['tempo_type_text']; ?>
 <?php echo $this->_tpl_vars['mission']['delivery_volume_option_text']; ?>
</span>  <strong><?php echo $this->_tpl_vars['mission']['tempo_length']; ?>
</strong> <span class="grey-text"><?php echo $this->_tpl_vars['mission']['tempo_length_option_text']; ?>
</span>
																</span>
															</div>
															
															
															</div>
														</td>
													  <?php else: ?>
													  <td class="col-md-1 text-center">
													  <div class="text-center">
														  <span class="p" id="missionlengthval_<?php echo $this->_tpl_vars['ms_index']; ?>
"><?php echo $this->_tpl_vars['mission']['mission_staff']; ?>
</span>

													<input type="hidden"  id="mission_length_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="mission_length_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
" class="input-small form-control validate[required <?php if ($this->_tpl_vars['mission']['oneshot'] == 'yes'): ?>,minWriters[<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
]<?php endif; ?>] <?php if ($this->_tpl_vars['mission']['mission_length_new'] != 0 && $this->_tpl_vars['mission']['mission_length_new'] != "" && $this->_tpl_vars['mission']['oneshot'] == 'no'): ?>minWriters[<?php echo $this->_tpl_vars['newduration'][0]; ?>
] <?php endif; ?>"  style="background:#fff;">
													  </div>
															 <span class="text-uppercase grey-text">Days</span>
															 
										
														</td>

														<td class="col-md-1 text-center">
														<div class="text-center">
															<span class="p" id="volume_<?php echo $this->_tpl_vars['ms_index']; ?>
"><?php echo $this->_tpl_vars['mission']['volume']; ?>
</span>
															</div>
															<span class="text-uppercase grey-text">VOLUME</span>
														</td>
														<?php endif; ?>
														<td class="col-md-1 text-center">
															<?php if ($this->_tpl_vars['mission']['product_name'] != 'Content Strategy'): ?>
																<a  data-toggle="modal" data-target="#editmission" href="/quote-new/prod-mission-edit-popup?quote_id=<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
&id=<?php echo $this->_tpl_vars['mission']['identifier']; ?>
&offset=<?php echo $this->_tpl_vars['ms_index']; ?>
">
															<?php endif; ?>	
																<div class="">
																	
																	<input  id="unit_price_<?php echo $this->_tpl_vars['ms_index']; ?>
" size="5" name="unit_price_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="highQuote <?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>new-version<?php endif; ?>" readonly="readonly">
																	<sup>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</sup>
																</div>
																	
																<div class="text-uppercase grey-text">Selling P/art</div>
																<input  id="internal_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="internal_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['internal_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="form-control highQuote"  type="hidden"> 
															<!--<div class="col-md-12 text-center">
																<div class="input-group">
																	<span class="input-group-addon">-</span>
																<input data-price="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="form-control validate[required]" type="text" id="cost_diminish_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="cost_diminish_<?php echo $this->_tpl_vars['ms_index']; ?>
" onkeyup="fnCalUnitPriceAndMargin('<?php echo $this->_tpl_vars['ms_index']; ?>
',this.value);" value="0"><span class="input-group-addon">%</span>
																</div>
															</div>-->
															<?php if ($this->_tpl_vars['mission']['product_name'] != 'Content Strategy'): ?>
																</a>
															<?php endif; ?>

															<?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>
																		<span class="version-change pop_over" data-placement="top" data-original-title="Previous versions" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="fa fa-bar-chart-o"></i> </span>
																	<?php endif; ?>
	
													</td>
														<td class="col-md-1 text-center">
														<?php if ($this->_tpl_vars['mission']['margin_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['margin_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="fa fa-bar-chart-o"></i></span>
															</div>	
														<?php endif; ?>
														<a <?php if ($this->_tpl_vars['quotes']['sales_review'] != 'signed'): ?> data-toggle="modal" href="" data-target="#editarticleprice" onClick="loadeditarticle(<?php echo $this->_tpl_vars['ms_index']; ?>
,'m') " <?php endif; ?>>
														
															<div class="input-group" >
																	<input type="text" readonly="readonly"  class="form-control validate[required]" id="margin_percentage_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="margin_percentage_<?php echo $this->_tpl_vars['ms_index']; ?>
" onkeyup="fnCalTotalCosts('<?php echo $this->_tpl_vars['ms_index']; ?>
',this.value);" value="<?php echo $this->_tpl_vars['mission']['margin_percentage']; ?>
" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || ( ( $this->_tpl_vars['mission']['product'] == 'translation' || $this->_tpl_vars['mission']['product'] == 'redaction' ) && ( $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' || $this->_tpl_vars['user_type'] == 'prodmanager' ) ) || ( $this->_tpl_vars['mission']['product_name'] == 'Content Strategy' && ( $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager' ) )): ?> <?php else: ?>disabled="disable"<?php endif; ?> style="cursor:pointer;"><span class="input-group-addon">%</span>
															</div>											
															<span class="text-uppercase grey-text">Margin</span>
															</a>
															
														</td>
														
														<td class="mission-pakage col-md-3">
														<div <?php if ($this->_tpl_vars['mission']['product_name'] == 'Content Strategy'): ?> style="display:none;" <?php endif; ?>>
															<select name="package_<?php echo $this->_tpl_vars['ms_index']; ?>
" id="package_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="validate[required] pakage-select" onchange="updatepackage('<?php echo $this->_tpl_vars['ms_index']; ?>
',this.value,'<?php echo $this->_tpl_vars['gn_index']; ?>
');" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || ( ( $this->_tpl_vars['mission']['product'] == 'translation' || $this->_tpl_vars['mission']['product'] == 'redaction' ) && ( $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' || $this->_tpl_vars['user_type'] == 'prodmanager' ) ) || ( $this->_tpl_vars['mission']['product_name'] == 'Content Strategy' && ( $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager' ) )): ?> <?php else: ?>disabled="disable"<?php endif; ?>>
																	<option value="lead" <?php if ($this->_tpl_vars['mission']['package'] == 'lead'): ?> selected<?php endif; ?> >Lead</option>
																	<option value="team" <?php if ($this->_tpl_vars['mission']['package'] == 'team'): ?> selected<?php endif; ?>>Team</option>
																	<option value="link" <?php if ($this->_tpl_vars['mission']['package'] == 'link'): ?> selected<?php endif; ?>>Link</option>
																																</select>
														</div>
														<table>
																<tr class="misson-details-text" <?php if ($this->_tpl_vars['mission']['package'] != 'team'): ?>style="display:none"<?php endif; ?> id="other_details_team_<?php echo $this->_tpl_vars['ms_index']; ?>
">
																<td>
																<div class="form-group col-md-12">
																	<!--<span style=" display: block;padding-top: 0px;">Nombre de profils : <?php echo $this->_tpl_vars['mission']['required_writes']; ?>
</span>-->
																	<input type='hidden' name="profiles_<?php echo $this->_tpl_vars['ms_index']; ?>
" id="profiles_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="1" >
																
																	<input type="text" class="form-control validate[required]" id="team_packs_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="team_packs_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo $this->_tpl_vars['mission']['team_packs']; ?>
" onkeyup="fncalculateAutoTotal();" size="2" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || ( ( $this->_tpl_vars['mission']['product'] == 'translation' || $this->_tpl_vars['mission']['product'] == 'redaction' ) && ( $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' || $this->_tpl_vars['user_type'] == 'prodmanager' ) ) || ( $this->_tpl_vars['mission']['product_name'] == 'Content Strategy' && ( $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager' ) )): ?> <?php else: ?>disabled="disable"<?php endif; ?>> x 		
																	
																		<span class="input-group"><input type="text" class="form-control validate[required]" id="team_fee_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="team_fee_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['team_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fncalculateAutoTotal();" size="2"><span class="input-group-addon">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;/Pack</span></span>
																	 =
																	<input  id="team_fee_ca_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="team_fee_ca_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="" class="color-normal" style="cursor:text;" readonly="readonly" size="2">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
																</div>
																	<span style=" display: block;padding-top: 0px;">
																		CA Total : 
																		<input  id="team_ca_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="team_ca_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['team_package_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class=" highQuote color-normal" style="cursor:text;" readonly="readonly" size="5"> &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
																	</span>	
																</td>
															</tr>
															<tr class="misson-details-text" <?php if ($this->_tpl_vars['mission']['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="other_details_user_<?php echo $this->_tpl_vars['ms_index']; ?>
">
																<td >
																<div class="form-group col-md-12">
																	<span style=" display: block;padding-top: 0px;">Nombre de profils : 1<?php echo $this->_tpl_vars['mission']['required_writes']; ?>
</span>
																	<input type='hidden' name="profiles_<?php echo $this->_tpl_vars['ms_index']; ?>
" id="profiles_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="1">
																	Fees offre user : 
																	<div class="input-group">
																	<input type="text" class="form-control validate[required]" id="user_fee_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="user_fee_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
"  onkeyup="fnCalUserTurnover('<?php echo $this->_tpl_vars['ms_index']; ?>
',<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
,1);" size="4" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || ( ( $this->_tpl_vars['mission']['product'] == 'translation' || $this->_tpl_vars['mission']['product'] == 'redaction' ) && ( $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' || $this->_tpl_vars['user_type'] == 'prodmanager' ) ) || ( $this->_tpl_vars['mission']['product_name'] == 'Content Strategy' && ( $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager' ) )): ?> <?php else: ?>disabled="disable"<?php endif; ?>><span class="input-group-addon">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</span>
																	</div>
																
																	<span style=" display: block;padding-top: 0px;">
																		CA Total :  
																		<input  id="user_ca_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="user_ca_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="" class="color-normal  highQuote" style="cursor:text;" readonly="readonly" size="5" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || ( ( $this->_tpl_vars['mission']['product'] == 'translation' || $this->_tpl_vars['mission']['product'] == 'redaction' ) && ( $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' || $this->_tpl_vars['user_type'] == 'prodmanager' ) ) || ( $this->_tpl_vars['mission']['product_name'] == 'Content Strategy' && ( $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager' ) )): ?> <?php else: ?>disabled="disable"<?php endif; ?>><sup>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</sup>
																	</span>	

																	</div>
																</td>											
																</tr>
														</table>
														</td>

														<td class="mission-turnover col-md-2 text-right">
															<div class="input-group">
																<input id="turnover_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="turnover_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="remove-border mission-price" readonly="readonly">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
																
															</div>
																<div class="free-mission">
																	<label class="checkbox">
																		<input type="checkbox" name="free_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php if ($this->_tpl_vars['mission']['free_mission'] == 'yes'): ?>yes<?php else: ?>no<?php endif; ?>" id="free_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['free_mission'] == 'yes'): ?>checked="checked"<?php else: ?><?php endif; ?>  <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || ( ( $this->_tpl_vars['mission']['product'] == 'translation' || $this->_tpl_vars['mission']['product'] == 'redaction' ) && ( $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' || $this->_tpl_vars['user_type'] == 'prodmanager' ) ) || ( $this->_tpl_vars['mission']['product_name'] == 'Content Strategy' && ( $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager' ) )): ?> <?php else: ?>disabled="disable"<?php endif; ?> class="icheck"> </input>
																		<span class="free-label">Free</span>
																	</label>	
																</div>
																
														</td>
														
													</tr>
													</table>
										</div>
									</div>	
																						
								<?php if (((is_array($_tmp=$this->_tpl_vars['mission']['identifier'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']) : in_array($_tmp, $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']))): ?>
								<?php $this->assign('keys', array_pop(array_search($this->_tpl_vars['quote_missions']['tech']['linked_to_prod']))); ?>
								
								<?php if (count($this->_tpl_vars['quote_missions']['tech']['linked_to_prod']) > 0): ?>
								
													
								<?php $_from = $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmission']):
        $this->_foreach['tmission']['iteration']++;
?>
								<?php $this->assign('tn_index', ($this->_foreach['tmission']['iteration']-1)); ?>
									<?php $this->assign('tms_index', ($this->_foreach['tmission']['iteration']-1)+1); ?>
								<?php if ($this->_tpl_vars['mission']['identifier'] == $this->_tpl_vars['tmission']): ?>
															
										<!--<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>-->
																		
											<div  id="mission_details_t<?php echo $this->_tpl_vars['tms_index']; ?>
" class="prod_mission">	
											<div class="mission-details">		
												<table class="table table-bordered tech_list <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['to_perform'] == 'Before'): ?> before-prod <?php elseif ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['to_perform'] == 'After'): ?> after-prod <?php else: ?>  during-prod<?php endif; ?>">		
													<tr>
													  <td class="col-md-3">
													  <div class="pull-left mission-title">
													  <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['title_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['title_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="fa fa-bar-chart-o"></i> 
														<?php endif; ?>
														<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_type']; ?>
</div>
													  <div class="pull-left grey-text" style="clear:both"> <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['language_name']; ?>
 </div>
													  </td>
													  
													  <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_oneshot'] == 'no'): ?>
													  <td class="col-md-2" colspan="2" style="padding:0px;margin:0px">

													  <div class="text-center pull-left" style="width:50%">
													  <span class="p" id="missionlengtht_<?php echo $this->_tpl_vars['tms_index']; ?>
">
													  <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['mission_length_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Previous versions" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="fa fa-bar-chart-o"></i> 
														<?php endif; ?><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_mission_length']; ?>
</span>

														<input type="hidden"  id="mission_length_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="mission_length_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_mission_length']; ?>
" class="input-small form-control validate[required">
													 
															 <div class="text-uppercase grey-text">Days</div>
														 </div>	 
														<div class="text-center pull-right " style="width:50%">
															<span class="p" id="volume_t<?php echo $this->_tpl_vars['tms_index']; ?>
"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume']; ?>
</span>
															
															<div class="text-uppercase grey-text">VOLUME</div>
															</div>
															
															<span class="col-md-12" style="border-top:1px solid #ddd;"></span>
															<div  class="text-center text-uppercase" >
															<span class="col-md-12" style="padding:5px;">
																<strong><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume_max']; ?>
</strong>  <span class="grey-text"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['delivery_volume_option']; ?>
</span> <strong><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tempo_length']; ?>
</strong> <span class="grey-text"><?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tempo_length_option'] == 'days'): ?>JOURS<?php else: ?><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tempo_length_option']; ?>
<?php endif; ?></span>
															</span>
															</div>
															
															
															</div>
														</td>
														<?php else: ?>
													  <td class="col-md-1 text-center">
													  <div class="text-center">
													  <span class="p" id="missionlengtht_<?php echo $this->_tpl_vars['tms_index']; ?>
">
													  <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_mission_length']; ?>
</span>
														<input type="hidden"  id="mission_length_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="mission_length_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_mission_length']; ?>
" class="input-small form-control validate[required"  style="background:#fff;">
													  </div>
															 <span class="text-uppercase grey-text">Days</span>
															 
														</td>

														<td class="col-md-1 text-center">
														<div class="text-center">
															<span class="p" id="volume_t<?php echo $this->_tpl_vars['tms_index']; ?>
"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume']; ?>
</span>
															</div>
															<span class="text-uppercase grey-text">VOLUME</span>
														</td>
														<?php endif; ?>
														<td class="col-md-1 text-center">
														
															<div class="">
															<input  id="unit_price_t<?php echo $this->_tpl_vars['tms_index']; ?>
" size="5" name="unit_price_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="highQuote <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['cost_difference'] == 'yes'): ?>new-version<?php endif; ?>" readonly="readonly">
															<sup>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</sup>
															</div>
															<div class="text-uppercase grey-text">Selling P/ART</div>
															<input  id="internal_cost_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="internal_cost_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['internal_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="form-control highQuote"  type="hidden">
															<?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['cost_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="fa fa-bar-chart-o"></i> </span>
															<?php endif; ?>
															<!--<div class="col-md-12 text-center">
																<div class="input-group">
																	<span class="input-group-addon">-</span>
																<input data-price="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="form-control validate[required]" type="text" id="cost_diminish_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="cost_diminish_<?php echo $this->_tpl_vars['ms_index']; ?>
" onkeyup="fnCalUnitPriceAndMargin('<?php echo $this->_tpl_vars['ms_index']; ?>
',this.value);" value="0"><span class="input-group-addon">%</span>
																</div>
															</div>-->

														
														
													</td>
														<td class="col-md-1 text-center">
													
															<a <?php if ($this->_tpl_vars['quotes']['sales_review'] != 'signed'): ?> data-toggle="modal" href="" data-target="#editarticleprice" onClick="loadeditarticle('t<?php echo $this->_tpl_vars['tms_index']; ?>
','')" <?php endif; ?>>
															<div class="input-group" >
																	<input type="text" readonly="readonly"  class="form-control validate[required]" id="margin_percentage_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="margin_percentage_t<?php echo $this->_tpl_vars['tms_index']; ?>
" onkeyup="fnCalTotalCosts('t<?php echo $this->_tpl_vars['tms_index']; ?>
',this.value);" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['margin_percentage']; ?>
" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?> style="cursor:pointer;"><span class="input-group-addon">%</span>
															</div>											
															<span class="text-uppercase grey-text">Margin</span>		</a>
															
														</td>
														
														<td class="mission-pakage col-md-3">
														<div style="display:none;">
															<select name="package_t<?php echo $this->_tpl_vars['tms_index']; ?>
" id="package_t<?php echo $this->_tpl_vars['tms_index']; ?>
" class="validate[required] pakage-select" onchange="updatepackage('t<?php echo $this->_tpl_vars['tms_index']; ?>
',this.value,'<?php echo $this->_tpl_vars['tn_index']; ?>
');" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?>>
																	<option value="lead" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] == 'lead'): ?> selected<?php endif; ?> >Lead</option>
																	<option value="team" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] == 'team'): ?> selected<?php endif; ?>>Team</option>
																	<option value="link" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] == 'link'): ?> selected<?php endif; ?>>Link</option>
																																</select>
														</div>
														<table>
																<tr class="misson-details-text" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] != 'team'): ?>style="display:none"<?php endif; ?> id="other_details_team_t<?php echo $this->_tpl_vars['tms_index']; ?>
">
																<td>
																<div class="form-group col-md-12">
																	<!--<span style=" display: block;padding-top: 0px;">Nombre de profils : <?php echo $this->_tpl_vars['mission']['required_writes']; ?>
</span>-->
																	<input type='hidden' name="profiles_t<?php echo $this->_tpl_vars['tms_index']; ?>
" id="profiles_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['required_writer']; ?>
" >
																
																	<input type="text" class="form-control validate[required]" id="team_packs_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="team_packs_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['required_writer']; ?>
" onkeyup="fncalculateAutoTotal();" size="2" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?>> x 		
																	
																		<span class="input-group"><input type="text" class="form-control validate[required]" id="team_fee_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="team_fee_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['team_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fncalculateAutoTotal();" size="2"><span class="input-group-addon" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?>>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;/Pack</span></span>
																	 =
																	<input  id="team_fee_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="team_fee_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="" class="color-normal" style="cursor:text;" readonly="readonly" size="2">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
																</div>
																	<span style=" display: block;padding-top: 0px;">
																		CA Total : 
																		<input  id="team_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="team_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['team_package_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class=" highQuote color-normal" style="cursor:text;" readonly="readonly" size="5"> &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
																	</span>	
																</td>
															</tr>
															<tr class="misson-details-text" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="other_details_user_t<?php echo $this->_tpl_vars['tms_index']; ?>
">
																<td >
																<div class="form-group col-md-12">
																	<span style=" display: block;padding-top: 0px;">Nombre de profils : <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['required_writes']; ?>
</span>
																	<input type='hidden' name="profiles_t<?php echo $this->_tpl_vars['tms_index']; ?>
" id="profiles_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['required_writer']; ?>
">
																	Fees offre user : 
																	<div class="input-group">
																	<input type="text" class="form-control validate[required]" id="user_fee_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="user_fee_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
"  onkeyup="fnCalUserTurnover('t<?php echo $this->_tpl_vars['tms_index']; ?>
',<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
,1);" size="4" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?> ><span class="input-group-addon">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</span>
																	</div>
																
																	<span style=" display: block;padding-top: 0px;">
																		CA Total :  
																		<input  id="user_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="user_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="" class="color-normal  highQuote" style="cursor:text;" readonly="readonly" size="5"><sup>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</sup>
																	</span>	

																	</div>
																</td>											
																</tr>
														</table>
														</td>

														<td class="mission-turnover col-md-2 text-right">
															<div class="input-group"  >
																<input  id="turnover_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="turnover_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="remove-border" readonly="readonly">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
																
															</div>
															 
															<div class="free-mission">
																<label class="checkbox">
																	<input type="checkbox" name="free_mission_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['free_mission'] == 'yes'): ?>yes<?php else: ?>no<?php endif; ?>" id="free_mission_t<?php echo $this->_tpl_vars['tms_index']; ?>
" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['free_mission'] == 'yes'): ?>checked="checked"<?php endif; ?> <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?> class="icheck"/>
																	<span class="free-label">Free</span>
																</label>
															</div>
														</td>
														
													</tr>

												</table>
										</div>
										</div>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>	
												
							<?php endif; ?>
									<?php endif; ?>
											
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>							
							<?php endif; ?>
							


							

				<?php if (((is_array($_tmp="")) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']) : in_array($_tmp, $this->_tpl_vars['quote_missions']['tech']['linked_to_prod'])) || ((is_array($_tmp='all_prod')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']) : in_array($_tmp, $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']))): ?>
				<?php $this->assign('keys', array_pop(array_search($this->_tpl_vars['quote_missions']['tech']['linked_to_prod']))); ?>
						
							<?php if (count($this->_tpl_vars['quote_missions']['tech']['linked_to_prod']) > 0): ?>

							<?php $_from = $this->_tpl_vars['quote_missions']['tech']['linked_to_prod']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmission']):
        $this->_foreach['tmission']['iteration']++;
?>

								<?php $this->assign('tn_index', ($this->_foreach['tmission']['iteration']-1)); ?>
									<?php $this->assign('tms_index', ($this->_foreach['tmission']['iteration']-1)+1); ?>				
								<?php if (( $this->_tpl_vars['tmission'] == '' ) || ( $this->_tpl_vars['tmission'] == 'all_prod' && $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['to_perform'] != 'Before' )): ?>
										
									<!--<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>-->
									<div  id="mission_details_t<?php echo $this->_tpl_vars['tms_index']; ?>
" class="<?php if ($this->_tpl_vars['tmission'] == ''): ?> <?php else: ?>prod_mission<?php endif; ?>">	
										<div class="mission-details">								
											
											<table class="table table-bordered tech_list">		
												<tr>
												  <td class="col-md-3">
												  <div class="pull-left mission-title">
												  <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['title_difference'] == 'yes'): ?>
														<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['title_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="fa fa-bar-chart-o"></i> 
													<?php endif; ?>
													<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_type']; ?>
</div>
												  <div class="pull-left grey-text" style="clear:both"> <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['language_name']; ?>
 </div>
												  </td>
												  <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_oneshot'] == 'no'): ?>
												  <td class="col-md-2" colspan="2">

												  <div class="text-center pull-left" style="width:50%">
												  <span class="p" id="missionlengtht_<?php echo $this->_tpl_vars['tms_index']; ?>
"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_mission_length']; ?>
</span>

													<input type="hidden"  id="mission_length_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="mission_length_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_mission_length']; ?>
" class="input-small form-control validate[required"  style="background:#fff;">
												 
														 <div class="text-uppercase grey-text">Days</div>
													 </div>	 
													<div class="text-center pull-right " style="width:50%">
														<span class="p" id="volume_t<?php echo $this->_tpl_vars['tms_index']; ?>
"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume']; ?>
</span>
														
														<div class="text-uppercase grey-text">VOLUME</div>
														</div>
														
														<span class="col-md-12" style="border-top:1px solid #ddd;"></span>
														<div class="text-center text-uppercase" >
															<span class="col-md-12" style="padding:5px;">
															<strong><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume_max']; ?>
</strong>  <span class="grey-text"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['delivery_volume_option']; ?>
</span> <strong><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tempo_length']; ?>
</strong> <span class="grey-text"><?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tempo_length_option'] == 'days'): ?>JOURS<?php else: ?><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tempo_length_option']; ?>
<?php endif; ?>
															</span>
														</span>
														</div>
														
														
														</div>
													</td>
												  <?php else: ?>
												  <td class="col-md-1 text-center">
												  <div class="text-center">
												  <span class="p" id="missionlengtht_<?php echo $this->_tpl_vars['tms_index']; ?>
"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_mission_length']; ?>
</span>
													<input type="hidden"  id="mission_length_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="mission_length_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['tech_mission_length']; ?>
" class="input-small form-control validate[required"  style="background:#fff;">
												  </div>
														 <span class="text-uppercase grey-text">Days</span>
														 
													</td>

													<td class="col-md-1 text-center">
													<div class="text-center">
														<span class="p" id="volume_t<?php echo $this->_tpl_vars['tms_index']; ?>
"><?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['volume']; ?>
</span>
														</div>
														<span class="text-uppercase grey-text">VOLUME</span>
													</td>
													<?php endif; ?>
													<td class="col-md-1 text-center">
													
														<div class="">
														
														<input  id="unit_price_t<?php echo $this->_tpl_vars['tms_index']; ?>
" size="5" name="unit_price_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="highQuote <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['cost_difference'] == 'yes'): ?>new-version<?php endif; ?>" readonly="readonly">
														<sup>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</sup>
														</div>
														<div class="text-uppercase grey-text">Selling P/art</div>
														<input  id="internal_cost_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="internal_cost_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['internal_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="form-control highQuote"  type="hidden">
														<?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['cost_difference'] == 'yes'): ?>
														<span class="version-change pop_over" data-placement="top" data-original-title="Previous versions" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <span class="glyphicon glyphicon-th-list" ></span> 
														<?php endif; ?>
														<!--<div class="col-md-12 text-center">
															<div class="input-group">
																<span class="input-group-addon">-</span>
															<input data-price="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="form-control validate[required]" type="text" id="cost_diminish_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="cost_diminish_<?php echo $this->_tpl_vars['ms_index']; ?>
" onkeyup="fnCalUnitPriceAndMargin('<?php echo $this->_tpl_vars['ms_index']; ?>
',this.value);" value="0"><span class="input-group-addon">%</span>
															</div>
														</div>-->

													
													
												</td>
													<td class="col-md-1 text-center">
												<a <?php if ($this->_tpl_vars['quotes']['sales_review'] != 'signed'): ?> data-toggle="modal" href="" data-target="#editarticleprice" onClick="loadeditarticle('t<?php echo $this->_tpl_vars['tms_index']; ?>
','')" <?php endif; ?>>
														<div class="input-group" >
																<input type="text" readonly="readonly"  class="form-control validate[required]" id="margin_percentage_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="margin_percentage_t<?php echo $this->_tpl_vars['tms_index']; ?>
" onkeyup="fnCalTotalCosts('t<?php echo $this->_tpl_vars['tms_index']; ?>
',this.value);" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['margin_percentage']; ?>
" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?> style="cursor:pointer;"><span class="input-group-addon">%</span>
														</div>											
														<span class="text-uppercase grey-text">Margin</span>		
														</a>
													</td>
													
													<td class="mission-pakage col-md-3">
													<div style="display:none;">
														<select name="package_t<?php echo $this->_tpl_vars['tms_index']; ?>
" id="package_t<?php echo $this->_tpl_vars['tms_index']; ?>
" class="validate[required] pakage-select" onchange="updatepackage('t<?php echo $this->_tpl_vars['tms_index']; ?>
',this.value,'<?php echo $this->_tpl_vars['tn_index']; ?>
');" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?> >
																<option value="lead" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] == 'lead'): ?> selected<?php endif; ?> >Lead</option>
																<option value="team" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] == 'team'): ?> selected<?php endif; ?>>Team</option>
																<option value="link" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] == 'link'): ?> selected<?php endif; ?>>Link</option>
																														</select>
													</div>
													<table>
															<tr class="misson-details-text" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] != 'team'): ?>style="display:none"<?php endif; ?> id="other_details_team_t<?php echo $this->_tpl_vars['tms_index']; ?>
">
															<td>
															<div class="form-group col-md-12">
																<!--<span style=" display: block;padding-top: 0px;">Nombre de profils : <?php echo $this->_tpl_vars['mission']['required_writes']; ?>
</span>-->
																<input type='hidden' name="profiles_t<?php echo $this->_tpl_vars['tms_index']; ?>
" id="profiles_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['required_writer']; ?>
">
															
																<input type="text" class="form-control validate[required]" id="team_packs_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="team_packs_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['required_writer']; ?>
" onkeyup="fncalculateAutoTotal();" size="2" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?>> x 		
																
																	<span class="input-group"><input type="text" class="form-control validate[required]" id="team_fee_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="team_fee_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['team_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fncalculateAutoTotal();" size="2"><span class="input-group-addon" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?>>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;/Pack</span></span>
																 =
																<input  id="team_fee_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="team_fee_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="" class="color-normal" style="cursor:text;" readonly="readonly" size="2">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
															</div>
																<span style=" display: block;padding-top: 0px;">
																	CA Total : 
																	<input  id="team_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="team_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['team_package_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class=" highQuote color-normal" style="cursor:text;" readonly="readonly" size="5"> &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
																</span>	
															</td>
														</tr>
														<tr class="misson-details-text" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="other_details_user_t<?php echo $this->_tpl_vars['tms_index']; ?>
">
															<td >
															<div class="form-group col-md-12">
																<span style=" display: block;padding-top: 0px;">Nombre de profils : <?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['required_writes']; ?>
</span>
																<input type='hidden' name="profiles_t<?php echo $this->_tpl_vars['tms_index']; ?>
" id="profiles_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo $this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['required_writer']; ?>
">
																Fees offre user : 
																<div class="input-group">
																<input type="text" class="form-control validate[required]" id="user_fee_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="user_fee_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
"  onkeyup="fnCalUserTurnover('t<?php echo $this->_tpl_vars['tms_index']; ?>
',<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
,1);" size="4"><span class="input-group-addon" <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?>>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</span>
																</div>
															
																<span style=" display: block;padding-top: 0px;">
																	CA Total :  
																	<input  id="user_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="user_ca_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="" class="color-normal  highQuote" style="cursor:text;" readonly="readonly" size="5"><sup>&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</sup>
																</span>	

																</div>
															</td>											
															</tr>
													</table>
													</td>

													<td class="mission-turnover col-md-2 text-right">
														<div class="input-group">
															<input  id="turnover_t<?php echo $this->_tpl_vars['tms_index']; ?>
" name="turnover_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="remove-border" readonly="readonly">&<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;
															
														</div>
														<div class="free-mission">
															<label class="checkbox">
																<input type="checkbox" name="free_mission_t<?php echo $this->_tpl_vars['tms_index']; ?>
" value="<?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['free_mission'] == 'yes'): ?>yes<?php else: ?>no<?php endif; ?>"  id="free_mission_t<?php echo $this->_tpl_vars['tms_index']; ?>
" <?php if ($this->_tpl_vars['quote_missions']['tech'][$this->_tpl_vars['tn_index']]['free_mission'] == 'yes'): ?>checked="checked"<?php endif; ?> <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'techmanager'): ?><?php else: ?>disabled="disable"<?php endif; ?> class="icheck"/>
																<span class="free-label">Free</span>
															</label>	
														</div>
														
													</td>
													
												</tr>

											</table>
										</div>
									</div>	
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>							
							<?php endif; ?>
							<?php endif; ?>		
				

			<div class="modal hide fade" id="prod_review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			   <div class="modal-dialog " style="width:650px !important">
				<div class="modal-content">
						<div class="modal-header">
							<button class="close" data-dismiss="modal" >&times;</button>
							<h3>Challenge team</h3>
						</div>
						<div class="modal-body">
						
						<br>
							
								<div class="row">
									<div class="col-md-2">
							<input type="hidden" value="<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
" name="quote_id" />	
							<input type="hidden" value="<?php echo $this->_tpl_vars['quotes']['currency']; ?>
" name="currency" />		
									
											<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg">
										</div>
										
										<div class="col-md-10">														
											<textarea rows="3" name="quote_updated_comments" placeholder="Please detail your need" id="quote_updated_comments" class="col-md-12 form-control validate[required]" style="width:100%"></textarea>

										</div>												
									</div>			
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="button" name="review_validate" class="btn btn-primary btn-fill review_validate validate" style="margin:10px;"><i class="fa fa-paper-plane"></i> Send</button>
						</div>
					</div>
				</div>
			</div>
			
		
			<div role="tabpanel" class="tab-pane hidden" id="details">
				<div class="col-md-12">
				<?php if (count($this->_tpl_vars['quote_missions']) > 0): ?>
					<?php $_from = $this->_tpl_vars['quote_missions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['missiondetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['missiondetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['missiondetails']):
        $this->_foreach['missiondetails']['iteration']++;
?>
						<?php $this->assign('gn_index', ($this->_foreach['missiondetails']['iteration']-1)); ?>
						<?php $this->assign('ms_index', ($this->_foreach['missiondetails']['iteration']-1)+1); ?>
						<?php if ($this->_tpl_vars['missiondetails']['product_name']): ?> 	
						<div class="row">
							 <div class="col-md-12 pull-left miss_title">
								Mission <?php echo $this->_tpl_vars['ms_index']; ?>
: <?php echo $this->_tpl_vars['missiondetails']['product_name']; ?>
 
							 </div>
							<table class="table table-bordered">
							<tr>
							<th class="text-uppercase">langage <?php if ($this->_tpl_vars['missiondetails']['product'] == 'translation'): ?> > language destination<?php endif; ?></th>
							<th class="text-uppercase">PRODUIT</th>
							<th class="text-uppercase">D&Eacute;LAI LIVRAISON</th>
							<th class="text-uppercase">Volume</th>
							<th class="text-uppercase">nb mots</th>
							</tr>
							<tr>
							<td><?php echo $this->_tpl_vars['missiondetails']['language_name']; ?>
 <?php if ($this->_tpl_vars['missiondetails']['product'] == 'translation'): ?> > <?php echo $this->_tpl_vars['missiondetails']['languagedest_name']; ?>
<?php endif; ?></td>
							<td><?php echo $this->_tpl_vars['missiondetails']['producttype_name']; ?>
 </td>
							<td><?php echo $this->_tpl_vars['missiondetails']['mission_length']; ?>
 JOURS</td>
							<td><?php echo $this->_tpl_vars['missiondetails']['volume']; ?>

							<?php if ($this->_tpl_vars['missiondetails']['oneshot'] == 'no'): ?>
							<p><?php echo $this->_tpl_vars['missiondetails']['volume_max']; ?>
 volume <?php echo $this->_tpl_vars['missiondetails']['tempo_type']; ?>
 <?php echo $this->_tpl_vars['missiondetails']['delivery_volume_option']; ?>
 <?php echo $this->_tpl_vars['missiondetails']['tempo_length']; ?>
 <?php echo $this->_tpl_vars['missiondetails']['tempo_length_option']; ?>
</p>
							<?php endif; ?></td>
							<td><?php echo $this->_tpl_vars['missiondetails']['nb_words']; ?>
 </td>
							</tr>
							</table>		
						</div>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>							
				<?php endif; ?>
				<?php if (count($this->_tpl_vars['quote_missions']['tech']) > 0): ?>
					<?php $_from = $this->_tpl_vars['quote_missions']['tech']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmissiondetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmissiondetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmissiondetails']):
        $this->_foreach['tmissiondetails']['iteration']++;
?>
						<?php $this->assign('gn_index', ($this->_foreach['tmissiondetails']['iteration']-1)); ?>
						<?php $this->assign('ms_index', ($this->_foreach['tmissiondetails']['iteration']-1)+1); ?>	
						<?php if ($this->_tpl_vars['tmissiondetails']['tech_type']): ?>
							<div class="row">
							 <div class="col-md-12 pull-left miss_title">
								<?php echo $this->_tpl_vars['tmissiondetails']['tech_type']; ?>
 
							 </div>
							<table class="table table-bordered">
							<tr>
							<th class="text-uppercase">language </th>
							<th class="text-uppercase">PRODUIT</th>
							<th class="text-uppercase">D&Eacute;LAI LIVRAISON</th>
							<th class="text-uppercase">Volume</th>
							<th class="text-uppercase">Turnover</th>
							</tr>
							<tr>
							<td><?php echo $this->_tpl_vars['tmissiondetails']['language_name']; ?>
</td>
							<td><?php echo $this->_tpl_vars['tmissiondetails']['product']; ?>
 </td>
							<td><?php echo $this->_tpl_vars['tmissiondetails']['tech_mission_length']; ?>
 <?php if ($this->_tpl_vars['tmissiondetails']['tech_mission_length_option'] == 'days'): ?>JOURS<?php else: ?>$tmissiondetails.tech_mission_length_option<?php endif; ?></td>
							<td><?php echo $this->_tpl_vars['tmissiondetails']['volume']; ?>

							<?php if ($this->_tpl_vars['tmissiondetails']['tech_oneshot'] == 'no'): ?>
							<p><?php echo $this->_tpl_vars['tmissiondetails']['volume_max']; ?>
 volume <?php echo $this->_tpl_vars['tmissiondetails']['tempo_type']; ?>
 <?php echo $this->_tpl_vars['tmissiondetails']['delivery_volume_option']; ?>
 <?php echo $this->_tpl_vars['tmissiondetails']['tempo_length']; ?>
 <?php echo $this->_tpl_vars['tmissiondetails']['tempo_length_option']; ?>
</p>
							<?php endif; ?></td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['tmissiondetails']['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 </td>
							</tr>
							</table>		
						</div>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>							
				<?php endif; ?>
				</div>	
			</div>							
							</div>	
						</div>		
					
			

			
					<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser'): ?>
					<div class="card">
						<div class="content">
					
						<div class="row">
<div class="col-md-2 text-center">
	<br><br><br><i style="font-size: 72px" class="material-icons">group_add</i>
</div>
							<div class="col-md-10">
								<h4>Challenge a team<br><small>Didn't get any prices for 1 or several missions ? Please select the right team to challenge and <strong>save your quote</strong></small></h4>
							<label class="checkbox"><input type="checkbox" class="icheck send_team"  value="prod" name="send_team_prod"></i> Editorial team</label>				
							<label class="checkbox"><input type="checkbox" class="icheck send_team"   value="tech" name="send_team_tech"><i class="glyphicon glyphicon-hand-paper-o"></i> Technical team</label>	
							
							
							<label class="checkbox"><input type="checkbox" class="icheck send_team"  value="seo" name="send_team_seo"><i class="glyphicon glyphicon-hand-paper-o"></i> Content strategist</label>		
						</div>
					</div></div></div>
						<!--<a  data-target="#prod_review" class="btn btn-default submit-sales"><i class="glyphicon glyphicon-hand-paper-o"></i> Save quote</a>			

						<a  data-target="#tech_review" class="btn btn-default submit-sales"><i class="glyphicon glyphicon-hand-paper-o"></i> Technical team</a>	
					
						<a  data-target="#seo_review" class="btn btn-default submit-sales"><i class="glyphicon glyphicon-hand-paper-o"></i> Content strategist</a>-->
					<?php endif; ?>
					</form>
					<hr>

					<div class="text-center">
					<?php if ($this->_tpl_vars['quotes']['sales_review'] != 'signed'): ?>
					<a href="/quote-new/create-quote-mission-view?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
" class="btn btn-default btn-lg pull-left"><i class="glyphicon glyphicon-chevron-left"></i> Catch prices</a>		
						<?php else: ?>		
						<a href="/quote-new/client-brief?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
" class="btn btn-default btn-lg pull-left"><i class="glyphicon glyphicon-chevron-left"></i> Customer pitch</a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser'): ?>
						<?php if ($this->_tpl_vars['quotes']['sales_review'] != 'signed' && $this->_tpl_vars['quotes']['sales_review'] != 'validated'): ?>
						<button class="btn btn-success btn-lg btn-fill review_validate validate" type="button">Save quote</button>
						<a  data-target="#prod_review" id="popupshow" class="btn btn-success btn-lg btn-fill hidden" type="button"> Save quote</a>
						<?php endif; ?>
						<div class="btn-group <?php if ($this->_tpl_vars['quotes']['estimate_sign_date'] == ""): ?> hidden<?php else: ?> <?php endif; ?>">
							<a href="/quote-new/download-quote-xls?quote_id=<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-download"></i> Download xlsx (&euro;)</a>
							<a data-toggle="dropdown" class="btn btn-default btn-lg dropdown-toggle" href=""><i class="glyphicon glyphicon-chevron-down"></i></a>
							<ul class="dropdown-menu">
									<li><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#change-currency" href="/quote-new/change-quote-currency?quote_id=<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
">Change the currency</a></li>
							</ul>
						</div>						
						<?php if ($this->_tpl_vars['quotes']['sales_review'] != 'signed'): ?>
						<button class="btn btn-fill btn-primary btn-lg pull-right <?php if ($this->_tpl_vars['sent_button'] == 'hide' || $this->_tpl_vars['quotes']['sales_review'] == 'validated'): ?> hidden<?php else: ?> <?php endif; ?>" id="saveFinal" type="submit">Move to sent</a>
						<?php endif; ?>
					<?php else: ?>
						<?php if ($this->_tpl_vars['quotes']['sales_review'] != 'signed' && $this->_tpl_vars['quotes']['sales_review'] != 'validated'): ?>
						<button class="btn btn-success btn-fill btn-lg <?php if ($this->_tpl_vars['quotes']['sales_review'] == 'signed'): ?> hidden<?php endif; ?>" type="submit" onclick="$('#save_final_validation').submit(); return false;">Save quote</button>
						<?php endif; ?>
						<a class="btn btn-default btn-lg <?php if ($this->_tpl_vars['quotes']['prod_extra_launch_days'] == "" || $this->_tpl_vars['quotes']['estimate_sign_date'] == ""): ?> hidden<?php else: ?> <?php endif; ?>" href="/quote-new/download-quote-xls?quote_id=<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
"><i class="fa fa-file-excel-o"></i> Download quote</a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['quotes']['sales_review'] == 'signed'): ?>
							<?php if ($this->_tpl_vars['quotes']['signed_exist'] == '1'): ?>
								<a href="/contractmission/contract-edit?contract_id=<?php echo $this->_tpl_vars['quotes']['signed_contractid']; ?>
" class="btn btn-fill btn-primary btn-lg pull-right">See contract</a>
							<?php else: ?>
								<a href="/contractmission/create-contract?quote_id=<?php echo $this->_tpl_vars['quotes']['quote_id']; ?>
" class="btn btn-fill btn-success btn-lg pull-right">Create contract</a>	
							<?php endif; ?>													
					<?php endif; ?>

				</div>

		</div>	


<!-- end of the list -->



		<div class="modal hide fade" id="delivery_time_calc_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" >&times;</button>
				<h3>Outil  de calcul de d&eacute;lai de livraison</h3>
			</div>
			<div class="modal-body">		
			</div>
			<div class="modal-footer">
			</div>
		</div>		
		</div>
	</div>
</div>

<div class="popover-markup"> 
				<div id="popover-head" class="hide head"><h3 class="popover-title">Add a sub mission</h3></div>
				<div id="popover-content" class="hide"><form name="autureForm" id="autureForm"><label>nb of writers</label>
				          <div class="text-center">
				          <input type="text" name="autrewriter" id="autrewriter" class="validate[required]" value="" />
				          <input type="hidden" name="autrecurrency" id="autrecurrency"  value="<?php echo $this->_tpl_vars['quotes']['currency']; ?>
" />
				          </div>
				           <label>Cost</label>
				          <div>
				          <input type="text"  name="sub_mission_cost" id="sub_mission_cost" size="5" value=""  class="validate[required]" />
				          <strong>&<?php echo $this->_tpl_vars['quotes']['currency']; ?>
;</strong>
				          </div>
				          <div class="text-center">
				          <button type="button" class="btn btn-primary btn-fill btn-xs text-uppercase" id="add_costoversubmit">Validate</button>
				          </div></form>
				  </div>
			</div>
	





 