<?php /* Smarty version 2.6.19, created on 2015-12-17 15:51:03
         compiled from gebo/quote/sales-final-validation.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/sales-final-validation.phtml', 724, false),array('modifier', 'htmlentities', 'gebo/quote/sales-final-validation.phtml', 811, false),array('modifier', 'escape', 'gebo/quote/sales-final-validation.phtml', 857, false),array('modifier', 'stripslashes', 'gebo/quote/sales-final-validation.phtml', 857, false),array('modifier', 'explode', 'gebo/quote/sales-final-validation.phtml', 881, false),array('modifier', 'upper', 'gebo/quote/sales-final-validation.phtml', 889, false),array('modifier', 'zero_cut', 'gebo/quote/sales-final-validation.phtml', 901, false),)), $this); ?>
<?php echo '
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>

<link href="/BO/theme/gebo/css/jquery.datetimepicker.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.datetimepicker.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>


<style type="text/css">
.editor-container{
	padding:0px;
}
.editor-container img{
margin:6px;
}
.highQuote
{
    border: 0 none;
    box-shadow: none;
    display: inline-block;    
    font-size: 18px;
    text-align: right;
	color: #000;
	margin-top: -5px;
}
.splashy-documents
{
top:3px;
}

.misson-details-text td, th{
	text-align:center !important;
}
.tempo-details{
	font-weight:normal;
	font-size:11px;
}
.free-mission{
	font-size:13px;
	font-weight:bold;
	margin-top:3px;
}
input[type="radio"]{
	margin-top:-2px;
}
#sales-document{
	font-size:13px;
	margin-top:5px;
	}
.deletesales{
 margin: 0 5px;
 cursor: pointer;
}
</style>
<script language="javascript">
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
function updatepackage(mission_id,package_name)
{
	var margin_percentage=0;
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
	
	
	margin_percentage=margin_percentage.toFixed(2);
	
	$("#margin_percentage_"+mission_id).val(margin_percentage);
	
	fncalculateAutoTotal();//calculate cost automatically
	
	if(package_name==\'team\')
	{
		var mission_turnover=parseFloat($("#turnover_"+mission_id).val().replace(",","."));
		var team_fee=parseFloat($("#team_fee_"+mission_id).val().replace(",","."));
		var team_ca=(mission_turnover+team_fee).toFixed(2);		
		$("#team_ca_"+mission_id).val(team_ca);
		
		fncalculateAutoTotal();//calculate cost automatically
	}	
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
		updatepackage(mission_id,package_name);		
		
	});
}

$(document).ready(function(){
	
	$("#save_final_validation").validationEngine();
	
	
	//select chosen
	$("#quote_package").chosen({ allow_single_deselect: false,search_contains: true});
	//$("[id^=package_]").chosen({ allow_single_deselect: false,search_contains: true});
	
	
	$("#sale_documents").MultiFile();
	fncalculateAutoTotal();//calculate cost automatically
	
	//exclude seo missions from the final margin
	$("[id^=smission_close_]").live(\'click\', function() {
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
	
	$("[id^=tmission_close_]").live(\'click\', function() {
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
      var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
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
					if(days >0 )message += days + " days"  +"  ";
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
				if(days >0 )message += days + " days"  +", ";
				if(hours >0 )message += hours + " h" +",";
				if(minutes >0 )message += minutes + " mns"+ ", ";
				message += seconds + " s";
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
		$(\'#estimate_sign_date\').datetimepicker({
			format:\'Y-m-d\',
			lang:\'fr\',
			timepicker:false
		});
		
		
	//free mission cost reduced
	
	$("[id^=free_mission_]").on(\'change\',function(){
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
			
		},{"ok":"Yes","cancel":"No"});	
	});


function removeDisabled(){	setTimeout(function(){$(".MultiFile-applied").removeAttr("disabled");}, 1000);	}
});

//calculate total staff,total internal cost and total delivery
function fnCalculateMissionTime()
{
		
	var total_delivery_time=0;		
	
	//calculating total delivery time
	total_delivery_time=0;
	$("[id^=mission_length_]" ).each(function(z) {
		var deliveryTime=parseFloat($(this).val());
		
		var time_id = $(this).attr(\'id\');
		var time_split=time_id.split("_");
		var time_option=\'mission_length_option_\'+time_split[2];
		var delivery_option=$("#"+time_option).val();
		if(isNaN(deliveryTime))
			deliveryTime=0;
		if(delivery_option==\'hours\')
		{
			deliveryTime=deliveryTime/24;
			deliveryTime=deliveryTime.toFixed(2);
		}	
		if(deliveryTime>total_delivery_time)	
		total_delivery_time=deliveryTime;
	});	
	//$("#total_mission_length").val(total_delivery_time);
	
	
}

//calculate unit price and margin with diminish percentage
function fnCalUnitPriceAndMargin(mission_id,percentage)
{
	var unit_price=parseFloat($("#cost_diminish_"+mission_id).attr(\'data-price\').replace(",","."));	
	//alert(unit_price);
	var FreeMissionval= $("#free_mission_"+mission_id+":checked").val();		
	var internalcost=parseFloat($("#internal_cost_"+mission_id).val().replace(",","."));
	var margin=parseFloat($("#margin_percentage_"+mission_id).val().replace(",","."));
	
	var new_unit_price= (unit_price*(1-(percentage/100))).toFixed(2);
	if(new_unit_price>0 && new_unit_price > internalcost)
	{
		var new_margin=(100*(1-internalcost/new_unit_price)).toFixed(2);	
		var new_unit_price_text=new_unit_price.replace(".",",");
		$("#unit_price_"+mission_id).val(new_unit_price_text);
		$("#margin_percentage_"+mission_id).val(new_margin);
		
		var volume=parseFloat($("#volume_"+mission_id).text().replace(",","."));
		if(FreeMissionval==\'yes\')
		{
		var turnover=(0).toFixed(2);
		}
		else
		{
		var turnover=(volume*new_unit_price).toFixed(2);
		}
		var turnover_text=turnover.replace(".",",");
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
			var missionPrice=parseFloat($("#user_ca_"+tmission_id).val(user_total).replace(",","."));	
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
			$("#team_fee_ca_"+tmission_id).val(team_turnover.toFixed(2));//total team fee
			if(FreeMissiontoval==\'yes\')
				{
				var missionPrice=0;
				}
				else
				{
				var missionPrice=(mission_turnover+team_turnover);
				}
			$("#team_ca_"+tmission_id).val(missionPrice.toFixed(2));
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
	
	var total_price_text=total_price.toFixed(2);	
	total_price_text=total_price_text.replace(".",",");
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
			var total_margin=(100-(total_internalcost/total_unitprice)*100).toFixed(2);
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
	var unit_price=(internalcost/(1-margin_percentage/100));
	//alert(internalcost+\'--\'+(1-margin_percentage/100)+\'---\'+unit_price);	
	unit_price=unit_price.toFixed(2);
	
	//added w.r.t price diminish
	$("#cost_diminish_"+mission_id).attr(\'data-price\',unit_price);
	$("#cost_diminish_"+mission_id).val(0);
	
	
		if(FreeMissionval==\'yes\')
		{
		var turnover=(0).toFixed(2);
		}
		else
		{
		var turnover=(volume*unit_price).toFixed(2);
		}
		
	var turnover_text=turnover.replace(".",",");
	var unit_price_text=unit_price.replace(".",",");
	
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
			var missionPrice=parseFloat($("#user_ca_"+tmission_id).val(user_total).replace(",","."));	
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
			
			$("#team_fee_ca_"+tmission_id).val(team_turnover.toFixed(2));//total team fee
			
			if(FreeMissiontoval==\'yes\')
				{
				var missionPrice=0;
				}
				else
				{
				var missionPrice=(mission_turnover+team_turnover);
				}
			$("#team_ca_"+tmission_id).val(missionPrice.toFixed(2));
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
	var total_price_text=total_price.toFixed(2);	
	total_price_text=total_price_text.replace(".",",");
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
	var total_margin=(100-(total_internalcost/total_unitprice)*100).toFixed(2);
	if(isNaN(total_margin))
		total_margin=0;
	$("#total_margin").val(total_margin);

}

function fnChangeAllMargins(margin_percentage)
{	
	margin_percentage=margin_percentage.replace(",",".");
	if(isNaN(margin_percentage))
			margin_percentage=0;
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
	$("#total_margin").val(margin_percentage);

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



</script>
<style>
.MultiFile-title{
	width:100% !important;
	font-size:13px !important;
	}
</style>
'; ?>


<div class="row-fluid sales-final-validation">    
	<div class="span12">
		<div class="row-fluid">
			<ul id="validate_wizard-titles" class="stepy-titles clearfix">
				<li id="validate_wizard-title-0"><div>Creation</div><span class="stepNb">1</span></li>
				<li id="validate_wizard-title-1"><div>TECH review</div><span class="stepNb">2</span></li>
				<li id="validate_wizard-title-2"><div>SEO review</div><span class="stepNb">3</span></li>
				<li id="validate_wizard-title-3"><div>Prod review</div><span class="stepNb">4</span></li>
				<li id="validate_wizard-title-4" class="current-step"><div>Validation</div><span class="stepNb">5</span></li>
			</ul>
		</div>
		<?php if (count($this->_tpl_vars['quoteDetails']) > 0): ?>
			<?php $_from = $this->_tpl_vars['quoteDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quote'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quote']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quote']):
        $this->_foreach['quote']['iteration']++;
?>
				<h1 class="heading topset2"><?php echo $this->_tpl_vars['quote']['title']; ?>

				<?php if (time() < $this->_tpl_vars['quote']['sales_validation_expires']): ?>
				<span id="time_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['sales_validation_expires']; ?>
" class="alert alert-warning pull-right quote-timer">
					<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['sales_validation_expires']; ?>
"></span>
				</span>
				<?php else: ?>
				<span id="time_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['sales_validation_expires']; ?>
" class="enretard alert alert-warning pull-right quote-timer">
					Delay : <i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['sales_validation_expires']; ?>
"></span>
															</span>
				<?php endif; ?>
									</h1>
				<div class="row-fluid">
					<div class="span5">					
							<div class="well">
							<h4 class="heading">Client</h4>
							<div class="row-fluid">
								<div class="span2">
									<img title="<?php echo $this->_tpl_vars['quote']['company_name']; ?>
" style="max-height: 54px;" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/clients/logos/<?php echo $this->_tpl_vars['quote']['client_id']; ?>
/<?php echo $this->_tpl_vars['quote']['client_id']; ?>
_global.png?12345">
								</div>
								<div class="span10" style="text-align:left">
									<p class="editor-name"><a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['quote']['client_id']; ?>
&submenuId=ML13-SL1" target="_blank"><b><?php echo $this->_tpl_vars['quote']['company_name']; ?>
</b></a></p>
									<?php if ($this->_tpl_vars['quote']['client_contact_name']): ?>
										<p class="editor-info">
											<?php echo $this->_tpl_vars['quote']['client_contact_name']; ?>
 - <?php echo $this->_tpl_vars['quote']['job_title']; ?>
<br>
											Phone Number : <?php echo $this->_tpl_vars['quote']['client_contact_phone']; ?>
<br>
											Email : <a href="mailto:<?php echo $this->_tpl_vars['quote']['client_contact_email']; ?>
"><?php echo $this->_tpl_vars['quote']['client_contact_email']; ?>
</a>
										</p>
									<?php endif; ?>	
								</div>
							</div>
																					
							</div>
					</div>	
					<div class="span5 offset2">
								<div class="well">
									<h4 class="heading">Devis r&eacute;alis&eacute; par</h4>
										<div class="row-fluid">
											<div class="span2">
												<img title="<?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['quote']['quote_by']; ?>
/<?php echo $this->_tpl_vars['quote']['quote_by']; ?>
_p.jpg" style="height: 54px;">
											</div>
											<div class="span10" style="text-align:left">
												<p class="editor-name"><b><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
</b></p>
												<p class="editor-info">
												Phone Number : <?php echo $this->_tpl_vars['quote']['phone_number']; ?>
<br>
												Email : <a href="mailto:<?php echo $this->_tpl_vars['quote']['email']; ?>
"><?php echo $this->_tpl_vars['quote']['email']; ?>
</a>
												</p>									
											</div>
										</div>	
									</div>
								</div>							
				</div>	
				<?php if ($this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
				<div class="row-fluid">
					<div class="span12">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#overview" data-toggle="tab">Final Quote</a></li>
							<li><a href="#details" data-toggle="tab">Details</a></li>							
						</ul>
					</div>
				</div>
				<?php endif; ?>
				<div class="row-fluid">
					<div class="tab-content">
						<div class="tab-pane fade in active" id="overview">
							<form action="/quote/save-final-validation" method="POST" name="save_final_validation" id="save_final_validation" enctype="multipart/form-data">	
								<input type="hidden" id="quote_id" name="quote_id" value="<?php echo $this->_tpl_vars['quote']['identifier']; ?>
">
							<div class="row-fluid">
								<?php if (count($this->_tpl_vars['quote']['mission_details']) > 0): ?>
									<?php $_from = $this->_tpl_vars['quote']['mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>							
										<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>	
										<div class="row-fluid" id="mission_details_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">	
											<div class="mission-details">								
												<?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>
													<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
														<div class="new-mission-product">
													<?php else: ?>
														<div class="prod-mission-product">										
													<?php endif; ?>
													<?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 <?php echo $this->_tpl_vars['mission']['language_source_name']; ?>
 vers <?php echo $this->_tpl_vars['mission']['language_dest_name']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['product_type_other'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>

													<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
														<label class="label label-warning">Mission added</label>	
													<?php endif; ?>	
														<?php if ($this->_tpl_vars['mission']['misson_user_type'] == 'seo'): ?>
															<label class="label label-warning">SEO proposal</label>
														<?php endif; ?>														
														<div class="pull-right">												
															<a class="btn close-seo" rel="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="smission_close_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['ms_index']; ?>
">&times;</a>
														</div>
														
													</div>	
												<?php else: ?>
													<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
														<div class="new-mission-product">
													<?php else: ?>	
														<div class="prod-mission-product">
													<?php endif; ?>	
													<?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
  in
													<?php echo $this->_tpl_vars['mission']['language_source_name']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['product_type_other'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>
 
													<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
														<label class="label label-warning">Mission added</label>	
													<?php endif; ?>
														<?php if ($this->_tpl_vars['mission']['misson_user_type'] == 'seo'): ?>
															<label class="label label-warning">SEO proposal</label>
														<?php endif; ?>
														<div class="pull-right">												
															<a class="btn close-seo" rel="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="smission_close_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['ms_index']; ?>
">&times;</a>
														</div>
														
													</div>	
												<?php endif; ?>
												<input name="mission_type_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" type="hidden" value="<?php echo $this->_tpl_vars['mission']['product']; ?>
">
												<table class="table table-bordered table-striped">										
													<tr>
														<th style="width:7%">Volume</th>
														<th style="width:12%">Delivery timing</th>
														<th style="width:21%">Selling price / article</th>
														<th style="width:22%">Turnover <span <?php if ($this->_tpl_vars['mission']['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="ca_thead_user_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">th&eacute;orique</span></th>
														<th style="width:15%">Internal Cost</th>
														<th style="width:15%">Margin</th>
														<th style="width:11%">Pack</th>											
													</tr>
													<tr class="misson-details-text">
														<td>
															<?php if ($this->_tpl_vars['mission']['volume_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['volume_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i>
															<?php endif; ?>
																<span id="volume_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
"><?php echo $this->_tpl_vars['mission']['volume']; ?>
</span>
																<?php if ($this->_tpl_vars['mission']['oneshot'] == 'no'): ?>
																	<br>
																	<span class="tempo-details">
																	<?php $this->assign('_tempo_value', $this->_tpl_vars['mission']['tempo']); ?>
																	<?php $this->assign('_delivery_volume_option', $this->_tpl_vars['mission']['delivery_volume_option']); ?>
																	<?php $this->assign('_tempo_length_option', $this->_tpl_vars['mission']['tempo_length_option']); ?>
																	<?php echo $this->_tpl_vars['mission']['volume_max']; ?>
 <?php echo $this->_tpl_vars['tempo_array'][$this->_tpl_vars['_tempo_value']]; ?>
 <?php echo $this->_tpl_vars['volume_option_array'][$this->_tpl_vars['_delivery_volume_option']]; ?>
 <?php echo $this->_tpl_vars['mission']['tempo_length']; ?>
 <?php echo $this->_tpl_vars['tempo_duration_array'][$this->_tpl_vars['_tempo_length_option']]; ?>

																	</span>		
																<?php endif; ?>
															<?php if ($this->_tpl_vars['mission']['volume_difference'] == 'yes'): ?>
																</span>
															<?php endif; ?>	
														</td>
														<td>
																														<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>
																	<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i>
																<?php endif; ?>
																<?php if ($this->_tpl_vars['mission']['mission_length_new'] != 0 && $this->_tpl_vars['mission']['mission_length_new'] != "" && $this->_tpl_vars['mission']['oneshot'] == 'no'): ?>
																<?php $this->assign('newduration', ((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_new'])) ? $this->_run_mod_handler('explode', true, $_tmp, ',') : smarty_modifier_explode($_tmp, ','))); ?>
																
																<?php endif; ?>
																	<?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?>
																		<input id="mission_length_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="mission_length_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php if ($this->_tpl_vars['newduration'][0]): ?><?php echo $this->_tpl_vars['newduration'][0]; ?>
<?php else: ?><?php echo $this->_tpl_vars['mission']['mission_length']; ?>
<?php endif; ?>" class="span4 <?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>version-change<?php endif; ?> highQuote <?php if ($this->_tpl_vars['mission']['mission_length_new'] != 0 && $this->_tpl_vars['mission']['mission_length_new'] != "" && $this->_tpl_vars['mission']['oneshot'] == 'no'): ?>minWriters[<?php echo $this->_tpl_vars['newduration'][0]; ?>
] <?php endif; ?>"  style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>">
																	<?php else: ?>
																		<input type="text"  id="mission_length_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="mission_length_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
" class="span4 <?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>version-change<?php endif; ?> validate[required <?php if ($this->_tpl_vars['mission']['oneshot'] == 'yes'): ?>  ,minWriters[<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
]<?php endif; ?>  <?php if ($this->_tpl_vars['mission']['mission_length_new'] != 0 && $this->_tpl_vars['mission']['mission_length_new'] != "" && $this->_tpl_vars['mission']['oneshot'] == 'no'): ?> , minWriters[<?php echo $this->_tpl_vars['newduration'][0]; ?>
] <?php endif; ?>]"  style="<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>">
																	<?php endif; ?>	
																<?php if ($this->_tpl_vars['mission']['mission_length_option'] == 'days'): ?> DAYS<?php else: ?>  <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_option'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
 <?php endif; ?>
																<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>
																	</span>
																<?php endif; ?>
																		
														</td>
														<td>
															<?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
															<?php endif; ?>	
																<input  id="unit_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="unit_price_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span4 <?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>version-change<?php endif; ?> highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
															<?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>
																</span>
															<?php endif; ?>
															<br>
															<div class="span3  offset1"></div>
															<div class="span4">
																<div class="input-prepend input-append">
																	<span class="add-on">-</span><input data-price="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span7" type="text" id="cost_diminish_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="cost_diminish_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" onkeyup="fnCalUnitPriceAndMargin('<?php echo $this->_tpl_vars['mission']['identifier']; ?>
',this.value);" value="0"><span class="add-on">%</span>
																</div>
															</div>
															
															<div class="span6">
																<span class="free-mission">Offer this mission</span>
															</div> 
															<div class="span5">
																<div class="row-fluid free-mission">
																	<input type="radio" name="free_mission_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="yes" id="free_mission_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" <?php if ($this->_tpl_vars['mission']['free_mission'] == 'yes'): ?>checked="checked"<?php endif; ?>> Yes</input>
																	<input type="radio" name="free_mission_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="free_mission_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="no" <?php if ($this->_tpl_vars['mission']['free_mission'] == 'no'): ?>checked="checked" <?php endif; ?>> No</input>
																</div>
															</div>
															
														</td>
														<td>
															<?php if ($this->_tpl_vars['mission']['turnover_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['turnover_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
															<?php endif; ?>
																<input  id="turnover_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="turnover_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span5 <?php if ($this->_tpl_vars['mission']['turnover_difference'] == 'yes'): ?>version-change<?php endif; ?> highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['mission']['turnover_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?><?php if ($this->_tpl_vars['mission']['package'] == 'user'): ?>text-decoration: line-through;<?php endif; ?>"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
															<?php if ($this->_tpl_vars['mission']['turnover_difference'] == 'yes'): ?>
																</span>
															<?php endif; ?>
														</td>
														<td>
															<?php if ($this->_tpl_vars['mission']['internal_cost_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['internal_cost_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
															<?php endif; ?>
															<input  id="internal_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="internal_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['internal_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span4 <?php if ($this->_tpl_vars['mission']['internal_cost_difference'] == 'yes'): ?>version-change<?php endif; ?>  highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['mission']['internal_cost_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <br>												
															<?php if ($this->_tpl_vars['mission']['internal_cost_difference'] == 'yes'): ?>
																</span>
															<?php endif; ?>
															<small><a data-placement="top" data-html="true" data-original-title="Co&ucirc;t interne" data-content="<?php echo $this->_tpl_vars['mission']['internalcost_details']; ?>
" class="pop_over" href="#">D&eacute;tails</a></small>
														</td>
														<td>
															<?php if ($this->_tpl_vars['mission']['margin_difference'] == 'yes'): ?>
																<div class="span2">
																	<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['margin_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
																</div>	
															<?php endif; ?>
															<div <?php if ($this->_tpl_vars['mission']['margin_difference'] == 'yes'): ?>class="span10"<?php else: ?>class="span12"<?php endif; ?>>
																<div class="input-append" <?php if ($this->_tpl_vars['mission']['margin_difference'] == 'yes'): ?> style="color:#b45f00;"<?php endif; ?>>
																	<input type="text" class="span5" size="16" id="margin_percentage_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="margin_percentage_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" onkeyup="fnCalTotalCosts('<?php echo $this->_tpl_vars['mission']['identifier']; ?>
',this.value);" value="<?php echo $this->_tpl_vars['mission']['margin_percentage']; ?>
" <?php if ($this->_tpl_vars['mission']['margin_difference'] == 'yes'): ?> style="color:#b45f00;"<?php endif; ?>><span class="add-on">%</span>
																</div>													
															</div>
														</td>
														<td>
															<select name="package_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="package_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" class="span12 validate[required]" onchange="updatepackage('<?php echo $this->_tpl_vars['mission']['identifier']; ?>
',this.value);">
																<option value="lead" <?php if ($this->_tpl_vars['mission']['package'] == 'lead'): ?> selected<?php endif; ?> >Lead</option>
																<option value="team" <?php if ($this->_tpl_vars['mission']['package'] == 'team'): ?> selected<?php endif; ?>>Team</option>
																<option value="link" <?php if ($this->_tpl_vars['mission']['package'] == 'link'): ?> selected<?php endif; ?>>Link</option>
																<option value="user" <?php if ($this->_tpl_vars['mission']['package'] == 'user'): ?> selected<?php endif; ?>>User</option>
															</select>
														</td>
													</tr>
													<tr class="misson-details-text" <?php if ($this->_tpl_vars['mission']['package'] != 'team'): ?>style="display:none"<?php endif; ?> id="other_details_team_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
														<td colspan="2">
															<span style=" display: block;padding-top: 0px;">Nb of profiles : <?php echo $this->_tpl_vars['mission']['required_writes']; ?>
</span>
														</td>
														<td colspan="2">
															<input type="text" class="span2" id="team_packs_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="team_packs_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo $this->_tpl_vars['mission']['team_packs']; ?>
" onkeyup="fncalculateAutoTotal();"> x 		
															<div class="input-append" style="margin-left:-40px">
																<input type="text" class="span5" id="team_fee_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="team_fee_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['team_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fncalculateAutoTotal();"><span class="add-on">&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;/pack</span>
															</div> =
															<input  id="team_fee_ca_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="team_fee_ca_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="" class="span2  highQuote" style="background:#f9f9f9;cursor:text;" readonly="readonly"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
														</td>
														<td colspan="3">
															<span style=" display: block;padding-top: 0px;">
																Total turnover : 
																<input  id="team_ca_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="team_ca_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['team_package_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span5  highQuote" style="background:#f9f9f9;cursor:text;" readonly="readonly"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
															</span>	
														</td>
													</tr>
													<tr class="misson-details-text" <?php if ($this->_tpl_vars['mission']['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="other_details_user_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
														<td colspan="2">
															<span style=" display: block;padding-top: 0px;">Nb of profiles : <?php echo $this->_tpl_vars['mission']['required_writes']; ?>
</span>
														</td>
														<td colspan="2">Fees offre user : 
															<div class="input-append">
																<input type="text" class="span5" id="user_fee_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="user_fee_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
"  onkeyup="fnCalUserTurnover('<?php echo $this->_tpl_vars['mission']['identifier']; ?>
',this.value,<?php echo $this->_tpl_vars['mission']['required_writes']; ?>
);"><span class="add-on">&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</span>
															</div>	
														</td>
														<td colspan="3">
															<span style=" display: block;padding-top: 0px;">
																Turnover : 
																<input  id="user_ca_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="user_ca_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['user_package_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span5  highQuote" style="background:#f9f9f9;cursor:text;" readonly="readonly"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
															</span>	
														</td>											
													</tr>
												</table>
											</div>	
										</div>	
									<?php endforeach; endif; unset($_from); ?>							
								<?php endif; ?>
								<!--Tech mission Details-->
								<?php if (count($this->_tpl_vars['quote']['tech_mission_details']) > 0): ?>
									<?php $_from = $this->_tpl_vars['quote']['tech_mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmission']):
        $this->_foreach['tmission']['iteration']++;
?>							
										<?php $this->assign('ms_index', ($this->_foreach['tmission']['iteration']-1)+1); ?>	
										<div class="row-fluid" id="mission_details_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
">	
											<input type="hidden" name="tech_mission_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="1">
											<div class="mission-details">
													<?php if (count($this->_tpl_vars['tmission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
														<div class="new-mission-product">
													<?php else: ?>	
														<div class="prod-mission-product">
													<?php endif; ?>	
													<?php echo $this->_tpl_vars['tmission']['title']; ?>

													<?php if (count($this->_tpl_vars['tmission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
														<label class="label label-warning">Mission added</label>	
													<?php endif; ?>
													
													<label class="label label-warning">Tech proposal</label>
													<div class="pull-right">												
														<a class="btn close-tech" rel="<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" id="tmission_close_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
_<?php echo $this->_tpl_vars['ms_index']; ?>
">&times;</a>
													</div>
													
													</div>	
																						
												<table class="table table-bordered table-striped">										
													<tr>
														<th style="width:7%">Volume</th>
														<th style="width:12%">Delivery timing</th>
														<th style="width:21%">Selling price / article</th>
														<th style="width:22%">Turnover <span <?php if ($this->_tpl_vars['mission']['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="ca_thead_user_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">th&eacute;orique</span></th>
														<th style="width:15%">Internal Cost</th>
														<th style="width:15%">Margin</th>
														<th style="width:11%">Pack</th>											
													</tr>
													<tr class="misson-details-text">
														<td>
															<?php if ($this->_tpl_vars['tmission']['volume_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['volume_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i>
															<?php endif; ?>
																<span id="volume_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
"><?php echo $this->_tpl_vars['tmission']['volume']; ?>
</span>
															<?php if ($this->_tpl_vars['tmission']['volume_difference'] == 'yes'): ?>
																</span>
															<?php endif; ?>	
														</td>
														<td>
															<?php if ($this->_tpl_vars['tmission']['mission_length_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i>
															<?php endif; ?>
															<?php echo $this->_tpl_vars['tmission']['delivery_time']; ?>
 <?php if ($this->_tpl_vars['tmission']['delivery_option'] == 'days'): ?>DAYS<?php else: ?>  <?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['delivery_option'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
 <?php endif; ?>
															<?php if ($this->_tpl_vars['tmission']['mission_length_difference'] == 'yes'): ?>
																</span>
															<?php endif; ?>
														</td>
														<td>
															<?php if ($this->_tpl_vars['tmission']['unit_price_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
															<?php endif; ?>	
																<input  id="unit_price_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="unit_price_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span4 <?php if ($this->_tpl_vars['tmission']['unit_price_difference'] == 'yes'): ?>version-change<?php endif; ?> highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['tmission']['unit_price_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
															<?php if ($this->_tpl_vars['tmission']['unit_price_difference'] == 'yes'): ?>
																</span>
															<?php endif; ?>
															<br>
														<div class="span3 offset1"></div>
														<div class="span4">
															<div class="input-prepend input-append">
																<span class="add-on">-</span><input data-price="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span7" type="text" id="cost_diminish_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="cost_diminish_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" onkeyup="fnCalUnitPriceAndMargin('<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
',this.value);" value="0"><span class="add-on">%</span>
															</div>
														</div>
														<div class="span6">
															<span class="free-mission">Offer this mission</span>
														</div> 
														<div class="span5 ">
															<div class="row-fluid free-mission">
																<input type="radio" name="free_mission_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="yes" id="free_mission_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
"> Yes</input>
																<input type="radio" name="free_mission_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" id="free_mission_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="no" checked="checked"> No</input>
																</div>
															</div> 
														</td>
														<td>
															<?php if ($this->_tpl_vars['tmission']['turnover_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['turnover_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
															<?php endif; ?>
																<input  id="turnover_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="turnover_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span5 <?php if ($this->_tpl_vars['tmission']['turnover_difference'] == 'yes'): ?>version-change<?php endif; ?> highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['tmission']['turnover_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?><?php if ($this->_tpl_vars['tmission']['package'] == 'user'): ?>text-decoration: line-through;<?php endif; ?>"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
															<?php if ($this->_tpl_vars['tmission']['turnover_difference'] == 'yes'): ?>
																</span>
															<?php endif; ?>
														</td>
														<td>
															<?php if ($this->_tpl_vars['tmission']['cost_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
															<?php endif; ?>
															<input  id="internal_cost_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="internal_cost_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['internal_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span4 <?php if ($this->_tpl_vars['tmission']['cost_difference'] == 'yes'): ?>version-change<?php endif; ?>  highQuote" readonly="readonly" style="background:#fff;cursor:text;<?php if ($this->_tpl_vars['tmission']['cost_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; <br>												
															<?php if ($this->_tpl_vars['tmission']['cost_difference'] == 'yes'): ?>
																</span>
															<?php endif; ?>
														</td>
														<td>
															<?php if ($this->_tpl_vars['tmission']['margin_difference'] == 'yes'): ?>
																<div class="span2">
																	<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['margin_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
																</div>	
															<?php endif; ?>
															<div <?php if ($this->_tpl_vars['tmission']['margin_difference'] == 'yes'): ?>class="span10"<?php else: ?>class="span12"<?php endif; ?>>
																<div class="input-append" <?php if ($this->_tpl_vars['tmission']['margin_difference'] == 'yes'): ?> style="color:#b45f00;"<?php endif; ?>>
																	<input type="text" class="span5" size="16" id="margin_percentage_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="margin_percentage_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" onkeyup="fnCalTotalCosts('<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
',this.value);" value="<?php echo $this->_tpl_vars['tmission']['margin_percentage']; ?>
" <?php if ($this->_tpl_vars['tmission']['margin_difference'] == 'yes'): ?> style="color:#b45f00;"<?php endif; ?>><span class="add-on">%</span>
																</div>													
															</div>
														</td>
														<td>
															<select name="package_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" id="package_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" class="span12 validate[required]" onchange="updatepackage('<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
',this.value);">
																<option value="lead" <?php if ($this->_tpl_vars['tmission']['package'] == 'lead'): ?> selected<?php endif; ?> >Lead</option>
																<option value="team" <?php if ($this->_tpl_vars['tmission']['package'] == 'team'): ?> selected<?php endif; ?>>Team</option>
																<option value="link" <?php if ($this->_tpl_vars['tmission']['package'] == 'link'): ?> selected<?php endif; ?>>Link</option>
																<option value="user" <?php if ($this->_tpl_vars['tmission']['package'] == 'user'): ?> selected<?php endif; ?>>User</option>
															</select>
														</td>
													</tr>
													<tr class="misson-details-text" <?php if ($this->_tpl_vars['tmission']['package'] != 'team'): ?>style="display:none"<?php endif; ?> id="other_details_team_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
">
														<td colspan="2">
															<span style=" display: block;padding-top: 0px;">Nb of profiles : <?php echo $this->_tpl_vars['tmission']['required_writes']; ?>
</span>
														</td>
														<td colspan="2">
															<input type="text" class="span2" id="team_packs_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="team_packs_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo $this->_tpl_vars['tmission']['team_packs']; ?>
" onkeyup="fncalculateAutoTotal();"> x 
															<div class="input-append" style="margin-left:-40px">
																<input type="text" class="span5" id="team_fee_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="team_fee_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['team_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fncalculateAutoTotal();"><span class="add-on">&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;/pack</span>
															</div> =
															<input  id="team_fee_ca_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="team_fee_ca_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="" class="span2  highQuote" style="background:#f9f9f9;cursor:text;" readonly="readonly"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
														</td>
														<td colspan="3">
															<span style=" display: block;padding-top: 0px;">
																Total turnover : 
																<input  id="team_ca_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="team_ca_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['team_package_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span5  highQuote" style="background:#f9f9f9;cursor:text;" readonly="readonly"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
															</span>	
														</td>
													</tr>
													<tr class="misson-details-text" <?php if ($this->_tpl_vars['tmission']['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="other_details_user_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
">
														<td colspan="2">
															<span style=" display: block;padding-top: 0px;">Nb of profiles : <?php echo $this->_tpl_vars['tmission']['required_writes']; ?>
</span>
														</td>
														<td colspan="2">Fees offre user : 
															<div class="input-append">
																<input type="text" class="span5" id="user_fee_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="user_fee_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
"  onkeyup="fnCalUserTurnover('<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
',this.value,<?php echo $this->_tpl_vars['tmission']['required_writes']; ?>
);"><span class="add-on">&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</span>
															</div>	
														</td>
														<td colspan="3">
															<span style=" display: block;padding-top: 0px;">
																Turnover : 
																<input  id="user_ca_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" name="user_ca_<?php echo $this->_tpl_vars['tmission']['identifier']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['user_package_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" class="span5  highQuote" style="background:#f9f9f9;cursor:text;" readonly="readonly"> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
															</span>	
														</td>											
													</tr>
												</table>
											</div>	
										</div>	
									<?php endforeach; endif; unset($_from); ?>
								<?php endif; ?>
								<!--Deleted Missions-->
								<?php if (count($this->_tpl_vars['quote']['deletedMissionVersions']) > 0): ?>						
									<?php $_from = $this->_tpl_vars['quote']['deletedMissionVersions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['dmisson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['dmisson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dmission']):
        $this->_foreach['dmisson']['iteration']++;
?>							
										<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>	
										<div class="row-fluid" id="mission_details_<?php echo $this->_tpl_vars['dmission']['identifier']; ?>
">	
											<div class="mission-details">								
												<?php if ($this->_tpl_vars['dmission']['product'] == 'translation'): ?>
													<div class="delete-mission-product">
													<?php echo $this->_tpl_vars['dmission']['product_name']; ?>
 <?php echo $this->_tpl_vars['dmission']['product_type_name']; ?>
 					<?php echo $this->_tpl_vars['dmission']['language_source_name']; ?>
 to <?php echo $this->_tpl_vars['dmission']['language_dest_name']; ?>

													 
													 <label class="label">Mission deleted</label>	
													 
													<?php if ($this->_tpl_vars['dmission']['misson_user_type'] == 'seo'): ?>
														<label class="label label-warning">SEO proposal</label>
													<?php endif; ?>
													</div>	
												<?php else: ?>
													<div class="delete-mission-product">	
													<?php echo $this->_tpl_vars['dmission']['product_name']; ?>
 <?php echo $this->_tpl_vars['dmission']['product_type_name']; ?>
  in
													<?php echo $this->_tpl_vars['dmission']['language_source_name']; ?>

													 
													<label class="label">Mission deleted</label>
													
													<?php if ($this->_tpl_vars['dmission']['misson_user_type'] == 'seo'): ?>
														<label class="label label-warning">SEO proposal</label><?php endif; ?>
													</div>	
												<?php endif; ?>									
												<table class="table table-bordered table-striped">
													<tr>
														<th style="width:7%">Volume</th>
														<th style="width:12%">Delivery timing</th>
														<th style="width:21%">Selling price / article</th>
														<th style="width:22%">Turnover <span <?php if ($this->_tpl_vars['dmission']['package'] != 'user'): ?>style="display:none"<?php endif; ?> id="ca_thead_user_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">th&eacute;orique</span></th>
														<th style="width:15%">Internal Cost</th>
														<th style="width:15%">Margin</th>
														<th style="width:11%">Pack</th>
													</tr>
													<tr class="misson-details-text">
														<td><?php echo $this->_tpl_vars['dmission']['Volume']; ?>
</td>
														<td><?php echo $this->_tpl_vars['dmission']['mission_length']; ?>
 <?php if ($this->_tpl_vars['dmission']['mission_length_option'] == 'days'): ?> DAYS<?php else: ?>  <?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['mission_length_option'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
 <?php endif; ?></td>
														<td><?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['unit_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</td>
														<td><?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</td>
														<td><?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['internal_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;<br>
															<small><a data-placement="top" data-html="true" data-original-title="Co&ucirc;t interne" data-content="<?php echo $this->_tpl_vars['dmission']['internalcost_details']; ?>
" class="pop_over" href="#">d&eacute;tails</a></small>
														</td>
														<td><?php echo $this->_tpl_vars['dmission']['margin_percentage']; ?>
 %</td>
														<td><?php echo $this->_tpl_vars['dmission']['package']; ?>
</td>
													</tr>
												</table>
											</div>
										</div>
									<?php endforeach; endif; unset($_from); ?>
								<?php endif; ?>
								<div class="row-fluid">										
									<div class="span12 pull-right">
										<table cellpadding="10" class="misson-details-text" style="width:100%">
											<tr>
												<td class="alignright">Total turnover</td>
												<td style="width:25%;text-align:left !important;">
													<?php if ($this->_tpl_vars['quote']['final_turnover_difference'] == 'yes'): ?>
														<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote']['final_turnover_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
													<?php endif; ?>
														<b><span id="total_price"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['total_turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span> &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</b>
													<?php if ($this->_tpl_vars['quote']['final_turnover_difference'] == 'yes'): ?>
														</span>
													<?php endif; ?>	
												</td>
											</tr>									
											<tr>
												<td class="alignright" style="margin-top: 6px;">Margin</td>
												<td style="width:25%;text-align:left !important;">
													<!--<span id="total_margin"><?php echo $this->_tpl_vars['quote']['over_all_margin']; ?>
</span>%-->
													<?php if ($this->_tpl_vars['quote']['final_margin_difference'] == 'yes'): ?>
														<div class="span1">
															<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote']['final_margin_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
														</div>	
													<?php endif; ?>
													<div <?php if ($this->_tpl_vars['quote']['final_margin_difference'] == 'yes'): ?>class="span11"<?php else: ?>class="span12"<?php endif; ?>>
															<div class="input-append" <?php if ($this->_tpl_vars['quote']['final_margin_difference'] == 'yes'): ?> style="color:#b45f00;"<?php endif; ?>>
															<input type="text" id="total_margin" name="total_margin" class="span5" size="16" onkeyup="fnChangeAllMargins(this.value);" value="<?php echo $this->_tpl_vars['quote']['over_all_margin']; ?>
"<?php if ($this->_tpl_vars['quote']['final_margin_difference'] == 'yes'): ?> style="color:#b45f00;"<?php endif; ?>><span class="add-on">%</span>
														</div>
													</div>
													
												</td>
											</tr>									
											<tr>
												<td class="alignright" style="margin-top: -6px;">Timing</td>
												<td style="width:25%;text-align:left !important;">
													<?php if ($this->_tpl_vars['quote']['final_mission_length_difference'] == 'yes'): ?>
													<div class="span1">
														<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote']['final_mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
													</div>	
													<?php endif; ?>
													<div class="span9">
														<input type="text" id="total_mission_length" value="<?php echo $this->_tpl_vars['quote']['total_mission_length']; ?>
" name="total_mission_length" class="span5 validate[required]" style="margin-top: -10px;<?php if ($this->_tpl_vars['quote']['final_mission_length_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>">
														<input type="hidden" name="total_time_option" id="total_time_option" value="<?php echo $this->_tpl_vars['quote']['final_mission_length_option']; ?>
">
														<select name="total_time_option" id="total_time_option" class="span5" style="margin-top: -10px;;<?php if ($this->_tpl_vars['quote']['final_mission_length_difference'] == 'yes'): ?>color:#b45f00;<?php endif; ?>">					
															<option value="days" <?php if ($this->_tpl_vars['quote']['final_mission_length_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																														</select>
													</div>	
												</td>
											</tr>
											<?php if ($this->_tpl_vars['quote']['prod_extra_info'] == 'yes'): ?>
												<tr>
													<td class="alignright" style="margin-top: -6px;">Maximum days to launch the mission</td>
													<td style="width:25%;text-align:left !important;">
														<div class="span4">
															<input type="text" id="prod_extra_launch_days" value="<?php echo $this->_tpl_vars['quote']['prod_extra_launch_days']; ?>
" name="prod_extra_launch_days" class="span12 validate[required]" style="margin-top: -10px;">
														</div>	
														 <div class="span4" style="margin-top: -5px;"> Days</div>
													</td>
												</tr>
											<?php endif; ?>
											<tr>
												<td class="alignright" style="margin-top: -6px;">Estimated % to sign</td>
												<td style="width:25%;text-align:left !important;">													
													<div class="span9">														
														<select name="estimate_sign_percentage" id="estimate_sign_percentage" class="span5" style="margin-top: -10px;">					
															<option value="20" <?php if ($this->_tpl_vars['quote']['estimate_sign_percentage'] == '20'): ?> selected <?php endif; ?>>20</option>
															<option value="40" <?php if ($this->_tpl_vars['quote']['estimate_sign_percentage'] == '40'): ?> selected <?php endif; ?>>40</option>
															<option value="60" <?php if ($this->_tpl_vars['quote']['estimate_sign_percentage'] == '60'): ?> selected <?php endif; ?>>60</option>
															<option value="80" <?php if ($this->_tpl_vars['quote']['estimate_sign_percentage'] == '80'): ?> selected <?php endif; ?>>80</option>
															
														</select>
													</div>	
												</td>
											</tr>
											<tr>
												<td class="alignright">Estimated date of signature</td>
												<td style="width:25%;text-align:left !important;">													
													<div class="span9">														
														<div class="input-append date">
															<input class="span12 validate[required]" value="<?php echo $this->_tpl_vars['quote']['estimate_sign_date']; ?>
" type="text" name="estimate_sign_date" id="estimate_sign_date"/><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
														</div>
													</div>	
												</td>
											</tr>
																						<tr>	<td class="alignright">Comments</td>
												<td style="width:25%;text-align:left !important;">													
													<div class="span12">														
														<textarea name="estimate_sign_comments" id="estimate_sign_comments" class="span12 validate[required]"><?php echo $this->_tpl_vars['quote']['estimate_sign_comments']; ?>
</textarea>
													</div>	
													
												</td>
											</tr>
											<tr>
												<td class="alignright"></td>
												<td style="width:25%;text-align:left !important;">	
												<div class="span12">
												<input type="file" name="sale_documents[]" accept="doc|xls|zip|docx|xlsx" class="multi" id="sale_documents"/>
												</div>
												<div class="span12" id="sales-document">
													<?php echo $this->_tpl_vars['quote']['sales_file']; ?>

												</div>
												
												</td>
											</tr>
												
										</table>
									</div>	
								</div>
								<div class="formSep topset2">						
									<div class="row-fluid">
										<div class="span4"></div>
										<div class="span6">							
											<button type="submit" name="review_save" class="btn btn-default">Validate</button>
											<button type="submit" name="review_download" class="btn btn-primary"><i class="icon-download icon-white"></i> Validate & download xls</button>
										</div>
									</div>
								</div>											
							</div>
							</form>
						</div>
						<?php if ($this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
							<div class="tab-pane" id="details">
								<?php echo $this->_tpl_vars['prod_view_details']; ?>

							</div>
						<?php endif; ?>	
					</div>	
				</div>		
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>	
	</div>
</div>	

<div class="modal hide fade" id="delivery_time_calc_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Tool to calculate delivery timings</h3>
    </div>
    <div class="modal-body">		
    </div>
    <div class="modal-footer">
    </div>
</div>