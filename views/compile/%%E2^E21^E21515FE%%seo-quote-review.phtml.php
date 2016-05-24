<?php /* Smarty version 2.6.19, created on 2015-10-08 10:34:11
         compiled from gebo/quote/seo-quote-review.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/seo-quote-review.phtml', 460, false),array('modifier', 'escape', 'gebo/quote/seo-quote-review.phtml', 527, false),array('modifier', 'stripslashes', 'gebo/quote/seo-quote-review.phtml', 527, false),array('modifier', 'htmlentities', 'gebo/quote/seo-quote-review.phtml', 583, false),array('modifier', 'nl2br', 'gebo/quote/seo-quote-review.phtml', 583, false),array('modifier', 'zero_cut', 'gebo/quote/seo-quote-review.phtml', 699, false),array('modifier', 'zero_cut_t', 'gebo/quote/seo-quote-review.phtml', 1053, false),array('modifier', 'domain_url', 'gebo/quote/seo-quote-review.phtml', 1057, false),array('modifier', 'date_format', 'gebo/quote/seo-quote-review.phtml', 1223, false),array('function', 'html_options', 'gebo/quote/seo-quote-review.phtml', 792, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script><script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<script src="/BO/theme/gebo/lib/datepicker/bootstrap-timepicker.min.js"></script>
<style type="text/css">
.table th, .table-bordered th, .table thead th,.table td {
    text-align: left;    
}
.delete
{
	color:#000;
	margin: 0 5px;
	cursor: pointer;
}
</style>

<script language="javascript">
	function removeDisabled(){	setTimeout(function(){$(".MultiFile-applied").removeAttr("disabled");}, 1000);	}

	function changeNames()
	{
		var i = 1;
		$("#seo_missions").find(\'.MultiFile-wrap\').each(function(){
			$(this).find(":file").each(function(){
				$(this).attr("name","seo_documents_"+i+"[]");
			})
			
			$(this).find(":text").each(function(){
				$(this).attr("name","document_name"+i+"[]");
			})
			i++;
		})
	}
	
	$(document).on("click",".delete",function(){
	var id_identifier = $(this).attr("rel");
		if(confirm("Are you sure? Want to delete this File"))
		{
			//$(this).closest(".topset2").remove();
			var thisvar = $(this).closest(".onsuccessrep");
			thisvar.html("Please Wait Deleting File.");
			$.post("/quote-test/delete-document",{"identifier":id_identifier,\'assignmission\':true},function(result){
					thisvar.html(result);
			}); 
		}	
	})

$(document).ready(function() {

	$("#challenge_btn").click(function(){
		$("#seo_challenge").modal(\'show\');
		$("#seo_challenge").removeClass( "hide" ).addClass("in");
	});	
	
	$(".uni_style").uniform();
	
	//more info popup
	$("#quote_more_info").click(function(){
		$("#quote_more_info_pop").modal(\'show\');
		$("#quote_more_info_pop").removeClass( "hide" ).addClass("in");
	});
	
	$(\'#seo_missions textarea\').css(\'height\',\'60px\');
	$(\'#seo_missions textarea\').autosize();
	
	
	
	$("#quote_save,#quote_validate").click(function(){
		if($("#challenge_quote").validationEngine(\'validate\'))
		{
			$("#quote_updated_pop").modal(\'show\');
			$("#quote_updated_pop").removeClass( "hide" ).addClass("in");
		}	
	});
	
	$("#skip_btn").click(function(){
		$("#quote_skip_pop").modal(\'show\');
		$("#quote_skip_pop").removeClass( "hide" ).addClass("in");
	});
	
	
	//scroll to tech misson
	$( \'.searchbyid\' ).on(\'click\', function(event) {
		event.preventDefault();
		var target = "#" + $(this).data(\'target\');
		$(\'html, body\').animate({
			scrollTop: $(target).offset().top
		}, 2000);
	});
	
	//tech missions
	$("[id^=delivery_time_]").spinner({ disabled: true });
	$("[id^=delivery_option_]").prop(\'disabled\', true).trigger("liszt:updated");
	
	//SEO missions
	$("[id^=sdelivery_time_]").spinner({min:1});
	$("[id^=sdelivery_option_]").chosen({ allow_single_deselect: false,search_contains: true});	

	//chosen
	$("[id^=product_]").chosen({ allow_single_deselect: false,search_contains: true});
	$("[id^=language_]").chosen({ allow_single_deselect: false,search_contains: true});	
	
	$("[id^=producttype_]" ).each(function(u) {
		if ( $(this).is(":visible") ) {
			$(this).chosen({ allow_single_deselect: false,search_contains: true});
		}
	});
	$("[id^=related_mission_]").chosen({ allow_single_deselect: false,search_contains: true});	
	
	
	//validation
	$("#challenge_quote").validationEngine({prettySelect : true,useSuffix: "_chzn"});	
	$(\'#quote_updated_comments\').attr(\'data-prompt-position\',\'topLeft\');
	$(\'#quote_updated_comments\').data(\'promptPosition\',\'topLeft\');
	
	//calculate changed in quote price percentage
	fnCalculateQuote();
	
	//close mission
	$("[id^=smission_close_]").live(\'click\', function() {
			var DivId = $(this).attr(\'id\');			
			var parentDiv=$(this).parents("div:eq(3)").attr(\'id\');
			//alert(parentDiv);
			var mission_identifier=$(this).attr(\'rel\');		
			var	quote_id=$("#quote_id").val();		
			if(!mission_identifier)
			{
				if($("[id^=seo_mission_]").size()>1)
				{
					$("#"+parentDiv).remove();
					if($("[id^=seo_mission_]").size()==1)
					{	
						$("#addmore_mission_link").click();
					}
				}	
					fnCalculateQuote();
			}	
			else
			{	
				smoke.confirm("Souhaitez-vous vraiment supprimer cette mission seo du devis?",function(e){
					if (e)
					{
						if($("[id^=seo_mission_]").size()>2)
						{
							$("#"+parentDiv).html(\'<center><img alt="" src="/BO/theme/gebo/img/ajax_loader.gif"> Suppression de cette mission seo devis... </center>\');
							ajaxSEOMissionUpdate(quote_id,mission_identifier,parentDiv,\'\');
							fnCalculateQuote();
						}	
						else
						{
							$("#"+parentDiv).html(\'<center><img alt="" src="/BO/theme/gebo/img/ajax_loader.gif"> Suppression de cette mission seo devis... </center>\');
							ajaxSEOMissionUpdate(quote_id,mission_identifier,parentDiv,\'final\');	
							
						}
					}
					else
					{
						return false;
					}
				});				
			}	
			seoIncDec();	
		});	

	//Adding SEO missions
	var mission_cnt=1;
	$("[id^=seo_mission_]" ).each(function(z) {
			mission_cnt=z++;
	});
	//Add more mission
	$("#addmore_mission_link").click(function() {
		
		var cloned =$("#seo_missions");	
		var duplicate_id;
		
		$("[id^=seo_mission_]" ).each(function(m) {
			var div_id = $(this).attr(\'id\');
			var div_numbers=div_id.split("_");
			duplicate_id=div_numbers[2];
			duplicate_id=0;
			//alert(duplicate_id);
			if(duplicate_id)
			return false;
			//break;
		});		
		//alert(mission_cnt+duplicate_id);
		$(\'#sdelivery_time_\'+duplicate_id).spinner( "destroy" );
		
		$("#seo_mission_"+duplicate_id).clone().attr(\'id\', \'seo_mission_\'+(++mission_cnt) ).appendTo( cloned );	
		$(\'#seo_mission_\'+mission_cnt).show();
		$(\'#seo_mission_\'+mission_cnt+\' #box_title_\'+duplicate_id).attr(\'id\',\'box_title_\'+mission_cnt); //changing mission tilte id
		$(\'#box_title_\'+mission_cnt).text(\'Proposition seo \'+mission_cnt); //changing mission tilte		
		$(\'#seo_mission_\'+mission_cnt+\' #smission_close_\'+duplicate_id).attr(\'id\',\'smission_close_\'+mission_cnt); //chaning id of close button
		$(\'#smission_close_\'+mission_cnt).show();
		$(\'#smission_close_\'+mission_cnt).attr(\'rel\',\'\');	
		
		//thead and td ids
		$(\'#seo_mission_\'+mission_cnt+\' #thead_dtime_\'+duplicate_id).attr(\'id\',\'thead_dtime_\'+mission_cnt);
		$(\'#seo_mission_\'+mission_cnt+\' #thead_cost_\'+duplicate_id).attr(\'id\',\'thead_cost_\'+mission_cnt);
		$(\'#seo_mission_\'+mission_cnt+\' #td_dtime_\'+duplicate_id).attr(\'id\',\'td_dtime_\'+mission_cnt);
		$(\'#seo_mission_\'+mission_cnt+\' #td_cost_\'+duplicate_id).attr(\'id\',\'td_cost_\'+mission_cnt);
		
		$(\'#seo_mission_\'+mission_cnt+\' #thead_ptype_\'+duplicate_id).attr(\'id\',\'thead_ptype_\'+mission_cnt);
		$(\'#seo_mission_\'+mission_cnt+\' #thead_nwords_\'+duplicate_id).attr(\'id\',\'thead_nwords_\'+mission_cnt);
		$(\'#seo_mission_\'+mission_cnt+\' #td_ptype_\'+duplicate_id).attr(\'id\',\'td_ptype_\'+mission_cnt);
		$(\'#seo_mission_\'+mission_cnt+\' #td_nwords_\'+duplicate_id).attr(\'id\',\'td_nwords_\'+mission_cnt);
		
		
		$(\'#seo_mission_\'+mission_cnt+\' #div_before_prod_\'+duplicate_id).attr(\'id\',\'div_before_prod_\'+mission_cnt);
		
		
		$("#thead_dtime_"+mission_cnt).show();
		$("#thead_cost_"+mission_cnt).show();
		$("#td_dtime_"+mission_cnt).show();
		$("#td_cost_"+mission_cnt).show();

		$("#thead_ptype_"+mission_cnt).hide();
		$("#thead_nwords_"+mission_cnt).hide();
		$("#td_ptype_"+mission_cnt).hide();
		$("#td_nwords_"+mission_cnt).hide();
		

		//delivery options	
		
		$(\'#seo_mission_\'+mission_cnt+\' #sdelivery_option_\'+duplicate_id).attr(\'id\',\'sdelivery_option_\'+mission_cnt); //changing product id			
		
		//Product select box
		$(\'#seo_mission_\'+mission_cnt+\' #product_\'+duplicate_id).attr(\'id\',\'product_\'+mission_cnt); //changing product id		
		//Language select box
		$(\'#seo_mission_\'+mission_cnt+\' #language_\'+duplicate_id).attr(\'id\',\'language_\'+mission_cnt); //changing Language id
		//Language dest select box
		$(\'#seo_mission_\'+mission_cnt+\' #languagedest_\'+duplicate_id).attr(\'id\',\'languagedest_\'+mission_cnt); //changing Language id
		//Producttype select box
		$(\'#seo_mission_\'+mission_cnt+\' #producttype_\'+duplicate_id).attr(\'id\',\'producttype_\'+mission_cnt); //changing producttype id
		//realted mission		
		$(\'#seo_mission_\'+mission_cnt+\' #related_mission_\'+duplicate_id).attr(\'id\',\'related_mission_\'+mission_cnt); //changing related mission select id	
		$(\'#seo_mission_\'+mission_cnt+\' #relatedto_\'+duplicate_id).attr(\'id\',\'relatedto_\'+mission_cnt); //changing realted to div id	
		
		
		//before prod checkbox
		$(\'#seo_mission_\'+mission_cnt+\' #before_prod_\'+duplicate_id).attr(\'id\',\'before_prod_\'+mission_cnt); 
		$(\'#seo_mission_\'+mission_cnt+\' input[name="before_prod_\'+duplicate_id+\'"]\').attr(\'name\',\'before_prod_\'+mission_cnt);
		$(".uni_style").uniform();
		
		//removing previous chosen
		$("#product_"+mission_cnt).removeClass("chzn-done" ).addClass("");		 
		$("#language_"+mission_cnt).removeClass("chzn-done" ).addClass("");		
		$("#languagedest_"+mission_cnt).removeClass("chzn-done" ).addClass("");
		$("#producttype_"+mission_cnt).removeClass("chzn-done" ).addClass("");		
		$("#sdelivery_option_"+mission_cnt).removeClass("chzn-done" ).addClass("");	
		$("#related_mission_"+mission_cnt).removeClass("chzn-done" ).addClass("");	
		$("#seo_mission_"+mission_cnt+ " .chzn-container").remove(); 	

		$("#product_"+mission_cnt).show();
		$("#language_"+mission_cnt).show();
		$("#related_mission_"+mission_cnt).show();
		
		$("#product_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});	//updating selected value
		$("#product_"+mission_cnt).val(\'\');
		$("#product_"+mission_cnt).trigger("liszt:updated");
		
		$("#language_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});//updating selected value
		$("#language_"+mission_cnt).val(\'\');
		$("#language_"+mission_cnt).trigger("liszt:updated");
		
		$("#producttype_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});//updating selected value
		$("#producttype_"+mission_cnt).val(\'\');
		$("#producttype_"+mission_cnt).trigger("liszt:updated");
		
		$("#related_mission_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});//updating selected value
		$("#related_mission_"+mission_cnt).val(\'\');
		$("#related_mission_"+mission_cnt).trigger("liszt:updated");
		
		$("#sdelivery_option_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});	//updating selected value
		$("#sdelivery_option_"+mission_cnt).val(\'\');
		$("#sdelivery_option_"+mission_cnt).trigger("liszt:updated");		
		
		//input elements
		$(\'#seo_mission_\'+mission_cnt+\' input[name="smission_title[]"]\').attr(\'id\',\'smission_title_\'+mission_cnt);
		$(\'#seo_mission_\'+mission_cnt+\' input[name="smission_cost[]"]\').attr(\'id\',\'smission_cost_\'+mission_cnt);
		$(\'#seo_mission_\'+mission_cnt+\' input[name="nb_words[]"]\').attr(\'id\',\'nb_words_\'+mission_cnt);
		$(\'#seo_mission_\'+mission_cnt+\' input[name="sdelivery_time[]"]\').attr(\'id\',\'sdelivery_time_\'+mission_cnt);		
		$(\'#seo_mission_\'+mission_cnt+\' #scomments_\'+duplicate_id).attr(\'id\',\'scomments_\'+mission_cnt);		
		$(\'#seo_mission_\'+mission_cnt+\' input[name="seo_documents_\'+duplicate_id+\'"]\').attr(\'id\',\'seo_documents_\'+mission_cnt);
		$(\'#seo_mission_\'+mission_cnt+\' input[name="seo_documents_\'+duplicate_id+\'"]\').attr(\'name\',\'seo_documents_\'+mission_cnt+\'[]\');						$(\'#seo_mission_\'+mission_cnt+\' input[name="seo_documents_\'+duplicate_id+\'"]\').removeClass(\'multi\');				
		
		clearChildren(document.getElementById(\'seo_mission_\'+mission_cnt));
		
		
		$(\'#sdelivery_time_\'+mission_cnt).val(3);
		$("[id^=sdelivery_time_]").spinner({min:1});
		$("#seo_documents_"+mission_cnt).MultiFile();
		
		$(\'#seo_mission_\'+mission_cnt+\' textarea\').css(\'height\',\'60px\');
		$(\'#seo_mission_\'+mission_cnt+\' textarea\').autosize();
		
		seoIncDec();
	});		
	
	function seoIncDec()
	{
		var mid =1;
		$("[id^=box_title_]").each(function(){
			$(this).text(\'Proposition seo \'+mid++);
		})
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
		$("#time_"+article[1]+"_"+article[2]).countdown({
			timestamp   : ts,
            diff_date  : diff_date,
			callback    : function(days, hours, minutes, seconds){
				var message = "";
				if(days >0 )message += days + " jours"  +", ";
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
	});
});
/** ajax function to delete super client contact data**/
function ajaxSEOMissionUpdate(quote_id,mission_identifier,divid,last)
{
        var target_page = "/quote/delete-quote-mission?quote_id="+quote_id+"&mission_identifier="+mission_identifier;
		//alert(target_page);	
		$.post(target_page, function(data){					
				//alert(data);
				sleep(4000);
				$("#"+divid).remove();
				if(last==\'final\')
					location.reload();
			});
}

//calculate Quote price changes
function fnCalculateQuote()
{
	var quotePrice=parseFloat($("#sales_suggested_price").val());
	var added_price=0;
	$("[id^=smission_cost_]" ).each(function(z) {
		var missionPrice=parseFloat($(this).val());
		if(isNaN(missionPrice))
			missionPrice=0;
		added_price=added_price+missionPrice;
	});
	
	var changedPercentage=parseFloat((added_price/quotePrice)*100);
	changedPercentage = new Number(changedPercentage);
	changedPercentage=changedPercentage.toPrecision(2);
	var change_text= \'+\'+changedPercentage+\'%\';
	if(changedPercentage>0 && quotePrice>0)
	{
		$("#percentage_change").text(change_text);	
		$("#percentage_change").show();
	}
	else	
		$("#percentage_change").hide();
	
}
function fnCheckProduct(element)
{
	var product=element.value;
	var mission_details=(element.id).split("_");
	var mission_id=mission_details[1];
	if(product==\'seo_audit\' || product==\'smo_audit\')
	{
		$("#thead_dtime_"+mission_id).show();
		$("#thead_cost_"+mission_id).show();
		$("#td_dtime_"+mission_id).show();
		$("#td_cost_"+mission_id).show();
		$("#div_before_prod_"+mission_id).show();
		

		$("#thead_ptype_"+mission_id).hide();
		$("#thead_nwords_"+mission_id).hide();
		$("#td_ptype_"+mission_id).hide();
		$("#td_nwords_"+mission_id).hide();
		
		$("#languagedest_"+mission_id).hide();
		$("#languagedest_"+mission_id).removeClass("chzn-done" ).addClass("");
		$("#languagedest_"+mission_id+"_chzn").remove();

		$("#relatedto_"+mission_id).hide();	
		
		//Title change
		$("#box_title_"+mission_id).html("Proposition seo "+mission_id);	
		
		
	}
	
	else
	{
		if(product==\'translation\')
		{
			$("#languagedest_"+mission_id).show();
			$("#languagedest_"+mission_id).chosen({ allow_single_deselect: false,search_contains: true});
			//Title change
			$("#box_title_"+mission_id).html("Traduction Mission");
		}
		else
		{
			$("#languagedest_"+mission_id).hide();
			$("#languagedest_"+mission_id).removeClass("chzn-done" ).addClass("");
			$("#languagedest_"+mission_id+"_chzn").remove();
			
			//Title change
			$("#box_title_"+mission_id).html("R&eacute;daction Mission");
		}
		
		$("#thead_dtime_"+mission_id).hide();
		$("#thead_cost_"+mission_id).hide();
		$("#td_dtime_"+mission_id).hide();
		$("#td_cost_"+mission_id).hide();
		$("#div_before_prod_"+mission_id).hide();

		$("#thead_ptype_"+mission_id).show();
		$("#thead_nwords_"+mission_id).show();
		$("#td_ptype_"+mission_id).show();
		$("#td_nwords_"+mission_id).show();
		
		if(product==\'autre\')
			$("#relatedto_"+mission_id).hide();	
		else
			$("#relatedto_"+mission_id).show();	
		
		
		
		$("#producttype_"+mission_id).chosen({ allow_single_deselect: false,search_contains: true});		
	}
	
}
</script>
'; ?>

<div class="row-fluid">    
	<div class="span12">
		<div class="row-fluid">
			<ul id="validate_wizard-titles" class="stepy-titles clearfix">
				<li id="validate_wizard-title-0"><div>Creation</div><span class="stepNb">1</span></li>
				<li id="validate_wizard-title-1"><div>TECH review</div><span class="stepNb">2</span></li>
				<li id="validate_wizard-title-2" class="current-step"><div>SEO review</div><span class="stepNb">3</span></li>
				<li id="validate_wizard-title-3"><div>Prod review</div><span class="stepNb">4</span></li>
				<li id="validate_wizard-title-4"><div>Validation</div><span class="stepNb">5</span></li>
			</ul>
		</div>
		<?php if (count($this->_tpl_vars['quoteDetails']) > 0): ?>
		<?php $_from = $this->_tpl_vars['quoteDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quote'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quote']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quote']):
        $this->_foreach['quote']['iteration']++;
?>
			<h1 class="heading topset2"><?php echo $this->_tpl_vars['quote']['title']; ?>

			
			<?php if ($this->_tpl_vars['quote']['seo_review'] == 'challenged' || $this->_tpl_vars['quote']['seo_review'] == 'validated'): ?>
				<?php if ($this->_tpl_vars['quote']['seo_timeline_stamp'] < time()): ?><label class="pull-right label label-warning"> Retard</label><?php endif; ?>
				<span id="time_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['seo_timeline_stamp']; ?>
" class="alert alert-danger pull-right quote-timer">
					<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['seo_timeline_stamp']; ?>
"></span>
				</span>
			<?php endif; ?>
			
			
			</h1>
			<?php if ($this->_tpl_vars['quote']['seo_review'] == 'challenged' || $this->_tpl_vars['quote']['seo_review'] == 'validated'): ?>
				<div class="alert alert-success">
					<a data-dismiss="alert" class="close">&times;</a>
					<b>The seo challenge has been taken into account! Please finalize it in time</b>
				</div>	
			<?php else: ?>
				<div class="alert alert-info">
					<a data-dismiss="alert" class="close">&times;</a>
					<b><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
 have sent you a quote.You can challenge it or skip it (<a class="searchbyid"data-target="challenge_quote">click below</a></b>)
				</div>	
			<?php endif; ?>
			
			<div class="row-fluid">			
				<div class="span9">
					<div class="w-box">
						<div class="w-box-header">General Comment</div>
						<div class="w-box-content  cnt_a">
							<div class="media">
								<a class="pull-left imgframe">
									<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['quote']['quote_by']; ?>
/logo.jpg" class="media-object">
								</a>
								<div class="media-body">
									<h4 class="media-heading">								
										<a><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
</a> <?php echo $this->_tpl_vars['quote']['comment_time']; ?>

									</h4>								
									<span><?php echo $this->_tpl_vars['quote']['sales_comment']; ?>
</span>
								</div>
							</div>
						</div>	
					</div>	
					<div class="w-box">
						<div class="w-box-header">Missions list</div>
						<div class="w-box-content  cnt_a">
						<?php if (count($this->_tpl_vars['quote']['mission_details']) > 0): ?>
						<?php $_from = $this->_tpl_vars['quote']['mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>
							<?php $this->assign('gn_index', ($this->_foreach['misson']['iteration']-1)); ?>
							<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>	
							<div class="row-fluid">	
								<div class="mission-details">
									<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
										<div class="new-mission-product">Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <label class="label label-warning">Mission added</label></div>
									<?php else: ?>
										<div class="prod-mission-product"> Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_name']; ?>
</div>
									<?php endif; ?>
									<table class="table mission-table">
										<tr>
											<th style="width:30%">Language</th>
											<th style="width:30%">Product</th>
											<th style="width:20%">Volume</th>
											<th style="width:20%">Nb of words</th>
										</tr>
										<tr class="misson-details-text">
											<td>
											<?php if ($this->_tpl_vars['mission']['language_difference'] == 'yes'): ?>
												<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['language_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
											<?php endif; ?>	
												<?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>															
													<?php echo $this->_tpl_vars['mission']['language_source_name']; ?>
 > 	<?php echo $this->_tpl_vars['mission']['language_dest_name']; ?>
 
												<?php else: ?>
													<?php echo $this->_tpl_vars['mission']['language_source_name']; ?>

												<?php endif; ?>
											<?php if ($this->_tpl_vars['mission']['language_difference'] == 'yes'): ?>
												</span>
											<?php endif; ?>	
											</td>
										<td>
											<?php if ($this->_tpl_vars['mission']['product_type_difference'] == 'yes'): ?>
												<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['product_type_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
											<?php endif; ?>														
												<?php if ($this->_tpl_vars['mission']['product_type_name']): ?> 
													<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 <?php if ($this->_tpl_vars['mission']['product_type'] == 'autre'): ?><br/>(<?php echo $this->_tpl_vars['mission']['product_type_other']; ?>
)<?php endif; ?>
												<?php else: ?>
													<?php echo $this->_tpl_vars['mission']['product_name']; ?>

												<?php endif; ?>
											<?php if ($this->_tpl_vars['mission']['product_type_difference'] == 'yes'): ?>
												</span>
											<?php endif; ?>	
										</td>
										<td>
											<?php if ($this->_tpl_vars['mission']['volume_difference'] == 'yes'): ?>
												<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['volume_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i>
											<?php endif; ?>
												<?php echo $this->_tpl_vars['mission']['volume']; ?>

											<?php if ($this->_tpl_vars['mission']['volume_difference'] == 'yes'): ?>
												</span>
											<?php endif; ?>	
												
										</td>										
										<td>
											<?php if ($this->_tpl_vars['mission']['nb_words_difference'] == 'yes'): ?>
												<span class="version-change pop_over" data-placement="top" data-original-title="Quote History" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['nb_words_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
											<?php endif; ?>
												<?php echo $this->_tpl_vars['mission']['nb_words']; ?>

											<?php if ($this->_tpl_vars['mission']['nb_words_difference'] == 'yes'): ?>
												</span>
											<?php endif; ?>
										</td>
										</tr>	
									</table>
									<!--Tempo details-->
									<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo/quote/tempo-details.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
									<?php if ($this->_tpl_vars['mission']['comments']): ?>
									<div class="media mission-comment">
										<a class="pull-left imgframe">
											<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['quote']['quote_by']; ?>
/logo.jpg" class="media-object">
										</a>
										<div class="media-body">
											<h4 class="media-heading">								
												<a><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
</a> <?php echo $this->_tpl_vars['mission']['comment_time']; ?>

											</h4>								
											<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
										</div>
									</div>
									<?php endif; ?>
								</div>
							</div>	
						<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
						<!--Deleted Quote missions-->
						<?php if (count($this->_tpl_vars['quote']['deletedMissionVersions']) > 0): ?>
						<?php $_from = $this->_tpl_vars['quote']['deletedMissionVersions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['dmisson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['dmisson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dmission']):
        $this->_foreach['dmisson']['iteration']++;
?>
							<?php $this->assign('gn_index', ($this->_foreach['dmission']['iteration']-1)); ?>
							<?php $this->assign('ms_index', ($this->_foreach['dmission']['iteration']-1)+1); ?>	
							<div class="row-fluid">	
								<div class="mission-details">
									<div class="delete-mission-product"><?php echo $this->_tpl_vars['dmission']['product_name']; ?>
 <label class="label">Mission deleted</label></div>
									
									<table class="table mission-table">
										<tr>
											<th style="width:30%">Language</th>
											<th style="width:30%">Product</th>
											<th style="width:20%">Volume</th>
											<th style="width:20%">Nb of words</th>
										</tr>
										<tr class="misson-details-text">
											<td>
												<?php if ($this->_tpl_vars['dmission']['product'] == 'translation'): ?>
													<?php echo $this->_tpl_vars['dmission']['language_source_name']; ?>
 > 	<?php echo $this->_tpl_vars['dmission']['language_dest_name']; ?>
 
												<?php else: ?>
													<?php echo $this->_tpl_vars['dmission']['language_source_name']; ?>

												<?php endif; ?>											
											</td>
										<td>
											<?php if ($this->_tpl_vars['dmission']['product_type_name']): ?> 
												<?php echo $this->_tpl_vars['dmission']['product_type_name']; ?>

											<?php else: ?>
												<?php echo $this->_tpl_vars['dmission']['product_name']; ?>

											<?php endif; ?>												
										</td>
										<td><?php echo $this->_tpl_vars['dmission']['volume']; ?>
</td>										
										<td><?php echo $this->_tpl_vars['dmission']['nb_words']; ?>
</td>
										</tr>	
									</table>
									<?php if ($this->_tpl_vars['dmission']['comments']): ?>
									<div class="media mission-comment">
										<a class="pull-left imgframe">
											<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['quote']['quote_by']; ?>
/logo.jpg" class="media-object">
										</a>
										<div class="media-body">
											<h4 class="media-heading">								
												<a><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
</a> <?php echo $this->_tpl_vars['dmission']['comment_time']; ?>

											</h4>								
											<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['dmission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
										</div>
									</div>
									<?php endif; ?>
								</div>
							</div>	
						<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
						<h2 class="heading">Emails you sent to the client and his answers</h2>
							<textarea rows="10" disabled class="span12"><?php echo $this->_tpl_vars['quote']['client_email_text']; ?>
</textarea>
							<div class="row-fluid">
								<div class="span3">Documents to download :</div>
							</div>
							<div class="row-fluid">
								<?php echo $this->_tpl_vars['quote']['related_files']; ?>

							</div>
						</div>						
					</div>						
					<?php if ($this->_tpl_vars['quote']['seo_review'] == 'challenged' || $this->_tpl_vars['quote']['seo_review'] == 'validated'): ?>
						<?php if (count($this->_tpl_vars['techMissionDetails']) > 0): ?>						
						<div class="w-box">
							<div class="w-box-header">Tech Mission</div>
							<div class="w-box-content  cnt_a">
							<?php $_from = $this->_tpl_vars['techMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['mission']['iteration']++;
?>
							<?php $this->assign('gn_index', ($this->_foreach['mission']['iteration']-1)); ?>
							<?php $this->assign('ms_index', ($this->_foreach['mission']['iteration']-1)+1); ?>								
								<div class="row-fluid">	
									<div class="mission-details">										
										<div class="mission-tech-product">
											<span><?php echo $this->_tpl_vars['mission']['title']; ?>
 <?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?><label class="label label-warning">New</label> <?php endif; ?></span>
										</div>
										<table class="table mission-table">
											<tr>
												<th style="width:33%">Mission</th>
												<th style="width:33%">Delivery time</th>
												<th style="width:33">Cost (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
											</tr>
											<tr class="misson-details-text">
												<td>
													<?php if ($this->_tpl_vars['mission']['title_difference'] == 'yes'): ?>
														<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['title_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
													<?php endif; ?>
													<input type="text" name="mission_title[]" id="mission_title_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo $this->_tpl_vars['mission']['title']; ?>
" class="span10 validate[required]" placeholder="enter a mission" disabled>
												</td>
												<td>
													<div class="span2">																
														<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> </span>
														<?php endif; ?>
													</div>
													<div class="span4">
														<input type="text" id="delivery_time_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="delivery_time[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['mission']['delivery_time']; ?>
"/>
													</div>
													<div class="span6">
														<select name="delivery_option[]" id="delivery_option_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12">					
															<option value="days" <?php if ($this->_tpl_vars['mission']['delivery_option'] == 'days'): ?> selected<?php endif; ?> >Days</option>
															<option value="hours" <?php if ($this->_tpl_vars['mission']['delivery_option'] == 'hours'): ?> selected<?php endif; ?>>Hours</option>									
														</select>
													</div>	
												</td>
												<td>
													<?php if ($this->_tpl_vars['mission']['cost_difference'] == 'yes'): ?>
														<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
													<?php endif; ?>
													<input type="text" id="mission_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="mission_cost[]" class="span4 validate[required]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" disabled />
												</td>														
											</tr>	
										</table>
										<div class="row-fluid" style="margin-left: 15px;">
											<div class="span12">
												<input type="checkbox" class="uni_style"<?php if ($this->_tpl_vars['mission']['before_prod'] == 'yes'): ?> checked <?php endif; ?> disabled
												> To be done before launching prod mission
											</div>	
										</div>
										<div class="media mission-comment">
											<a class="pull-left imgframe">
												<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['created_by']; ?>
/logo.jpg" class="media-object">
											</a>
											<div class="media-body">
												<h4 class="media-heading">								
													<a><?php echo $this->_tpl_vars['mission']['tech_user_name']; ?>
</a> <?php echo $this->_tpl_vars['mission']['comment_time']; ?>

												</h4>
												<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
											</div>
										</div>	
										<div class="row-fluid topset2">	
												<?php echo $this->_tpl_vars['mission']['files']; ?>

										</div>
									</div>
								</div>
								
							<?php endforeach; endif; unset($_from); ?>
							</div>						
						</div>
						<?php endif; ?>	
					<?php endif; ?>
					<form action="/quote/save-seo-review" method="POST" id="challenge_quote" enctype="multipart/form-data">
						<input type="hidden" name="quote_id" id="quote_id" value="<?php echo $this->_tpl_vars['quote']['identifier']; ?>
">
						<input type="hidden" name="currency" value="<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
">
						<div class="formSep topset2">
						<?php if ($this->_tpl_vars['quote']['seo_review'] == 'challenged' || $this->_tpl_vars['quote']['seo_review'] == 'validated'): ?>
							<div class="w-box">
								<div class="w-box-header">SEO mission setup</div>
								<div class="w-box-content  cnt_a">
									<div class="row-fluid" id="seo_missions">
										<?php if (count($this->_tpl_vars['seoMissionDetails']) > 0): ?>
										<?php $_from = $this->_tpl_vars['seoMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmisson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmisson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['tmisson']['iteration']++;
?>
										<?php $this->assign('gn_index', ($this->_foreach['tmisson']['iteration']-1)); ?>
										<?php $this->assign('ms_index', ($this->_foreach['tmisson']['iteration']-1)+1); ?>		
										<div class="row-fluid" id="seo_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
">
										<input type="hidden" name="seo_mission_id[]" value="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
											<div class="mission-details">
												<div class="mission-seo-product">
													<span id="box_title_<?php echo $this->_tpl_vars['ms_index']; ?>
">
														<?php if ($this->_tpl_vars['mission']['product'] == 'redaction' || $this->_tpl_vars['mission']['product'] == 'translation'): ?>
															<?php echo $this->_tpl_vars['mission']['product_name']; ?>
 Mission
														<?php else: ?>
															Proposition seo <?php echo $this->_tpl_vars['ms_index']; ?>
 
														<?php endif; ?>	
														
														<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?><label class="label label-warning">New</label> <?php endif; ?></span>				
													<div class="pull-right">												
														<a class="btn close-seo" rel="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="smission_close_<?php echo $this->_tpl_vars['ms_index']; ?>
">&times;</a>
													</div>											
												</div>
												<table class="table mission-table">
													<tr>
														<th style="width:25%">Type</th>
														<th style="width:25%">Language</th>
														<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="width:30%" <?php else: ?> style="display:none;width:30%"<?php endif; ?>  id="thead_dtime_<?php echo $this->_tpl_vars['ms_index']; ?>
">Delivery timing</th>														
														<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="width:20%" <?php else: ?> style="display:none;width:20%"<?php endif; ?> id="thead_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
">Co&ucirc;t (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
														<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;width:35%"<?php else: ?> style="width:35%" <?php endif; ?> id="thead_ptype_<?php echo $this->_tpl_vars['ms_index']; ?>
">Product</th>
														<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;width:15%"<?php else: ?> style="width:15%" <?php endif; ?> id="thead_nwords_<?php echo $this->_tpl_vars['ms_index']; ?>
">Nb of words</th>
													</tr>
													<tr class="misson-details-text">
														<td>															
															<?php if ($this->_tpl_vars['mission']['product_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['product_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
															<?php endif; ?>
															<select name="product[]" id="product_<?php echo $this->_tpl_vars['ms_index']; ?>
" onchange="fnCheckProduct(this);" class="span10 validate[required]" data-placeholder="Select product">
																<option value="seo_audit" <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit'): ?> selected<?php endif; ?>>SEO audit</option>
																<option value="smo_audit" <?php if ($this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> selected<?php endif; ?>>SMO audit</option>
																<?php if ($this->_tpl_vars['quote']['quote_type'] == 'normal'): ?>
																	<option value="redaction" <?php if ($this->_tpl_vars['mission']['product'] == 'redaction'): ?> selected<?php endif; ?>>Writing</option>
																	<option value="translation" <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?> selected<?php endif; ?>>Translating</option>
																	<option value="autre" <?php if ($this->_tpl_vars['mission']['product'] == 'autre'): ?> selected<?php endif; ?>>Other</option>
																<?php endif; ?>	
															</select>
															
														
														</td>
														<td>	
															<?php if ($this->_tpl_vars['mission']['language_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['language_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
															<?php endif; ?>
															<select name="language[]" id="language_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span10 validate[required]" data-placeholder="Select language">
																<option></option>
																<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['mission']['language_source']), $this);?>

															</select>
															<select name="languagedest[]" id="languagedest_<?php echo $this->_tpl_vars['ms_index']; ?>
" style="display:none" class="span10 validate[required]" data-placeholder="Select language">
																<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['mission']['language_dest']), $this);?>

															</select>	
														
														</td>
														<td id="td_dtime_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['product'] != 'seo_audit' && $this->_tpl_vars['mission']['product'] != 'smo_audit'): ?> style="display:none;"<?php endif; ?>>
															<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>					
																<span style="float:left" class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
															<?php endif; ?>															
															<div class="span4">
																<input type="text" id="sdelivery_time_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="sdelivery_time[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
"/>
															</div>
															<div class="span4">
																<select name="sdelivery_option[]" id="sdelivery_option_<?php echo $this->_tpl_vars['ms_index']; ?>
">					
																	<option value="days" <?php if ($this->_tpl_vars['mission']['mission_length_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																	<option value="hours" <?php if ($this->_tpl_vars['mission']['mission_length_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>									
																</select>
															</div>	
														</td>
														<td id="td_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['product'] != 'seo_audit' && $this->_tpl_vars['mission']['product'] != 'smo_audit'): ?> style="display:none;"<?php endif; ?>>
															<?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" 	data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> </span>
															<?php endif; ?>
															<input type="text" id="smission_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="smission_cost[]" class="span9 validate[required,custom[number]]" onkeyup="fnCalculateQuote();" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
"/>
														</td>
														<td <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;"<?php endif; ?> id="td_ptype_<?php echo $this->_tpl_vars['ms_index']; ?>
">
															<?php if ($this->_tpl_vars['mission']['product_type_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['product_type_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span> 
															<?php endif; ?>
															<select name="producttype[]" id="producttype_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="validate[required]" data-placeholder="Select product type">
																<option></option>
																<option value="article_de_blog" <?php if ($this->_tpl_vars['mission']['product_type'] == 'article_de_blog'): ?> selected<?php endif; ?>>Brand content</option>
																<option value="descriptif_produit" <?php if ($this->_tpl_vars['mission']['product_type'] == 'descriptif_produit'): ?> selected<?php endif; ?>>Product description</option>
																<option value="article_seo" <?php if ($this->_tpl_vars['mission']['product_type'] == 'article_seo'): ?> selected<?php endif; ?>>SEO articles</option>
																<option value="guide" <?php if ($this->_tpl_vars['mission']['product_type'] == 'guide'): ?> selected<?php endif; ?>>Guides</option>
																<option value="news" <?php if ($this->_tpl_vars['mission']['product_type'] == 'news'): ?> selected<?php endif; ?>>News</option>
															</select>
														</td>
														<td <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;"<?php endif; ?> id="td_nwords_<?php echo $this->_tpl_vars['ms_index']; ?>
">
															<?php if ($this->_tpl_vars['mission']['nb_words_difference'] == 'yes'): ?>
																<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['nb_words_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span> 
															<?php endif; ?>
															<input type="text" name="nb_words[]" id="nb_words_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span9 validate[required,custom[number]]" value="<?php echo $this->_tpl_vars['mission']['nb_words']; ?>
">
														</td>
																												
													</tr>	
												</table>
												<div class="row-fluid" style="margin-left: 15px;<?php if ($this->_tpl_vars['mission']['product'] != 'seo_audit' && $this->_tpl_vars['mission']['product'] != 'smo_audit'): ?>display:none;<?php endif; ?>" id="div_before_prod_<?php echo $this->_tpl_vars['ms_index']; ?>
">
													<div class="span12">
														<input type="checkbox" class="uni_style" name="before_prod_<?php echo $this->_tpl_vars['ms_index']; ?>
" id="before_prod_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['before_prod'] == 'yes'): ?> checked <?php endif; ?> 
														> To be done before launching prod mission
													</div>	
												</div>
												<div class="media mission-comment">
													<a class="pull-left imgframe">
														<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['created_by']; ?>
/logo.jpg" class="media-object">														
													</a>
													<div class="media-body">														
														<textarea name="scomments[]" placeholder="insert a comment" id="scomments_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12"><?php echo $this->_tpl_vars['mission']['comments']; ?>
</textarea>
													</div>												
												</div>
												<div class="row-fluid topset2" style="padding:0 10px">	
													<div class="span7 form-inline" id="relatedto_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit' || $this->_tpl_vars['mission']['product'] == 'autre'): ?>style="display:none"<?php else: ?>style="display:block"<?php endif; ?>
													>
														<span class="span5"><label style="padding-top: 5px;"><b>Link this proposal : </b></label></span>
														<select name="related_mission[]" id="related_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="validate[required]">
																<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['quote']['missions_list'],'selected' => $this->_tpl_vars['mission']['related_to']), $this);?>

														</select>
													</div>
												</div>
												<div class="row-fluid topset2">
													<div class="">
														<input type="file" name="seo_documents_<?php echo $this->_tpl_vars['ms_index']; ?>
[]" accept="doc|xls|zip|docx|xlsx" class="multi" id="seo_documents_<?php echo $this->_tpl_vars['ms_index']; ?>
"/>
														<div class="onsuccessrep">
																  <?php echo $this->_tpl_vars['mission']['files']; ?>

														</div>
													</div>
												</div>
											</div>	
										</div>									
										<?php endforeach; endif; unset($_from); ?>	
										<?php else: ?>	
										<div class="row-fluid addedbyjs" id="seo_mission_1">
											<div class="mission-details">
												<div class="mission-seo-product"><span id="box_title_1">Proposition seo 1</span>
													<div class="pull-right">												
														<a class="btn close-seo" rel="" id="smission_close_1">&times;</a>
													</div>											
												</div>
												<table class="table mission-table">
													<tr>
														<th style="width:25%">Type</th>
														<th style="width:25%">Language</th>
														<th style="width:30%"  id="thead_dtime_1">Delivery time</th>														
														<th style="width:20%" id="thead_cost_1">Cost (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
														<th style="display:none;width:35%" id="thead_ptype_1">Product</th>
														<th style="display:none;width:15%" id="thead_nwords_1">Nb of words</th>
													</tr>
													<tr class="misson-details-text">
														<td>															
															<select name="product[]" id="product_1" onchange="fnCheckProduct(this);" class="span12 validate[required]" data-placeholder="Select product">
																<option value="seo_audit">SEO audit</option>
																<option value="smo_audit">SMO audit</option>
																<?php if ($this->_tpl_vars['quote']['quote_type'] == 'normal'): ?>
																	<option value="redaction">Writing</option>
																	 <option value="translation">Translating</option>
																	 <option value="autre" <?php if ($this->_tpl_vars['mission']['product'] == 'autre'): ?> selected<?php endif; ?>>Other</option>
																<?php endif; ?>	 
															</select>
															
														
														</td>
														<td>															
															<select name="language[]" id="language_1" class="span12 validate[required]" data-placeholder="Select language">
																<option></option>
																<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['mission']['language']), $this);?>

															</select>
															<select name="languagedest[]" id="languagedest_1" style="display:none" class="span12 validate[required]" data-placeholder="Select language">
																<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list']), $this);?>

															</select>	
														
														</td>
														<td id="td_dtime_1">															
															<div class="span4">
																<input type="text" id="sdelivery_time_1" name="sdelivery_time[]" class="span12 validate[required]" value="3"/>
															</div>
															<div class="span5">
																<select name="sdelivery_option[]" id="sdelivery_option_1">					
																	<option value="days">Days</option>
																	<option value="hours">Hours</option>									
																</select>
															</div>	
														</td>
														<td id="td_cost_1">
															<input type="text" id="smission_cost_1" name="smission_cost[]" class="span11 validate[required,custom[number]]" onkeyup="fnCalculateQuote();"/>
														</td>
														<td style="display:none" id="td_ptype_1">
															<select name="producttype[]" id="producttype_1" class="validate[required]" data-placeholder="Select product type">
																<option></option>
																<option value="article_de_blog" <?php if ($this->_tpl_vars['mission']['producttype'] == 'article_de_blog'): ?> selected<?php endif; ?>>Brand content</option>
																<option value="descriptif_produit" <?php if ($this->_tpl_vars['mission']['producttype'] == 'descriptif_produit'): ?> selected<?php endif; ?>>Product description</option>
																<option value="article_seo" <?php if ($this->_tpl_vars['mission']['producttype'] == 'article_seo'): ?> selected<?php endif; ?>>SEO articles</option>
																<option value="guide" <?php if ($this->_tpl_vars['mission']['producttype'] == 'guide'): ?> selected<?php endif; ?>>Guides</option>
																<option value="news" <?php if ($this->_tpl_vars['mission']['producttype'] == 'news'): ?> selected<?php endif; ?>>News</option>
															</select>
														</td>
														<td style="display:none" id="td_nwords_1">
															<input type="text" name="nb_words[]" id="nb_words_1" class="span11 validate[required,custom[number]]" value="<?php echo $this->_tpl_vars['mission']['nb_words']; ?>
">
														</td>
																												
													</tr>	
												</table>
												<div class="row-fluid" style="margin-left: 15px;" id="div_before_prod_1">
													<div class="span12">
														<input type="checkbox" class="uni_style" name="before_prod_1" id="before_prod_1"> To be done before launching prod mission
													</div>	
												</div>
												<div class="media mission-comment">
													<a class="pull-left imgframe">
														<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
													</a>
													<div class="media-body">														
														<textarea name="scomments[]" placeholder="insert a comment" id="scomments_1" class="span12"></textarea>
													</div>												
												</div>
												<div class="row-fluid topset2" style="padding:0 10px;">	
													<div class="span7 form-inline" style="display:none" id="relatedto_1">
														<span class="span5"><label style="padding-top: 5px;"><b>Link this proposal : </b></label></span>
														<select name="related_mission[]" id="related_mission_1" class="validate[required]">
																<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['quote']['missions_list']), $this);?>

														</select>
													</div>
												</div>
												<div class="row-fluid topset2">	
													<div class="">
														<input type="file" name="seo_documents_1" accept="doc|xls|zip|docx|xlsx" class="multi" id="seo_documents_1"/>
													</div>
												</div>
											</div>	
										</div>	
										<?php endif; ?>	
									</div>								
								</div>	
								<div class="row-fluid formSep ">	
									<div id="addmore_mission_link"><a class="btn topset2"><i class="icon-plus"></i>Add a mission</a></div> 
								</div>
							</div>
							<?php endif; ?>
							<div class="row-fluid">
								<div class="span4"></div>
								<div class="span6">
									<?php if ($this->_tpl_vars['quote']['seo_review'] == 'not_done'): ?>
										<?php if ($this->_tpl_vars['quote']['quote_type'] == 'normal'): ?>
											<button type="button" id="skip_btn" name="review_skip" class="btn">Skip</button>
										<?php endif; ?>	
										<button type="button" id="challenge_btn" name="challenge" class="btn btn-primary">Challenge</button>		
									<?php elseif ($this->_tpl_vars['quote']['seo_review'] == 'challenged' || $this->_tpl_vars['quote']['seo_review'] == 'validated'): ?>
										
										<?php if ($this->_tpl_vars['quote']['seo_challenge'] == 'yes'): ?><button type="button" id="challenge_btn" name="challenge" class="btn btn-primary">Challenge</button><?php endif; ?>
										<?php if ($this->_tpl_vars['quote']['seo_review'] == 'challenged'): ?>
											<button type="submit" name="review_save" onclick="changeNames(); removeDisabled()" class="btn btn-success">Save</button>
											<?php if ($this->_tpl_vars['show_validate'] == 'yes'): ?>
												<button type="submit" name="review_validate" onclick="changeNames(); removeDisabled()" class="btn btn-primary">Validate</button>	
											<?php endif; ?>	
										<?php elseif ($this->_tpl_vars['quote']['seo_review'] == 'validated'): ?>
											<button type="button" id="quote_save" name="review_save" class="btn btn-success">Save</button>
											<?php if ($this->_tpl_vars['show_validate'] == 'yes'): ?>
												<button type="button" id="quote_validate" name="review_validate" class="btn btn-primary">Validate</button>
											<?php endif; ?>	
										<?php endif; ?>
									<?php endif; ?>
								<!--	<button type="button" id="quote_more_info" name="quote_more_info" class="btn btn-info">Need precisions </button> -->
								</div>
							</div>
						</div>
						<!--popup to show quote updated in edit mode-->
						<?php if ($this->_tpl_vars['quote']['seo_review'] == 'validated'): ?>
						<div class="modal hide fade" id="quote_updated_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
								<button class="close" data-dismiss="modal" >&times;</button>
								<h3>Update</h3>
							</div>
							<div class="modal-body">
								<section>
									<div class="row-fluid">
										<div class="media">
											<br>											
											<br>
											<a class="pull-left imgframe">
												<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
											</a>
											<div class="media-body">														
												<textarea name="quote_updated_comments" placeholder="Tell team what you have changed and SEND" id="quote_updated_comments" class="span12 validate[required]"></textarea>
											</div>												
										</div>
									</div>	
									<div class="row-fluid">
										<div class="span12">
											<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
											<button type="submit" name="review_validate" onclick="changeNames(); removeDisabled()" class="btn btn-primary">Validate</button>
										</div>
									</div>										
								</section>
							</div>
							<div class="modal-footer">
							</div>
						</div>
						<?php endif; ?>
					</form>	
				</div>
				<div class="span3">
					<aside>
						<div class="aside-bg">							
							<div class="aside-block" id="selected-client">
								<div class="editor-container">
									<h2 class="heading">Info client</h2>
									<img title="<?php echo $this->_tpl_vars['quote']['company_name']; ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/clients/logos/<?php echo $this->_tpl_vars['quote']['client_id']; ?>
/<?php echo $this->_tpl_vars['quote']['client_id']; ?>
_global.png?12345">
									<p class="editor-name"><a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['quote']['client_id']; ?>
&submenuId=ML13-SL1" target="_blank"><?php echo $this->_tpl_vars['quote']['company_name']; ?>
</a></p>
									<p class="editor-info">
									Turnover : <?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['ca_number'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 euros<br>
									Category : <?php echo $this->_tpl_vars['quote']['category_name']; ?>
<br><br>
									<label class="label label-info">Websites</label><br>
									<?php $_from = $this->_tpl_vars['quote']['websites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['site']):
?>
										<a href="<?php echo $this->_tpl_vars['site']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['site'])) ? $this->_run_mod_handler('domain_url', true, $_tmp) : smarty_modifier_domain_url($_tmp)); ?>
</a> <br/>
									<?php endforeach; endif; unset($_from); ?>
									</p>
								</div>
							</div>
							<div class="aside-block" id="selected-bouser">
								<div class="editor-container">
									<h2 class="heading">Quote handled by</h2>
									<img title="<?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['quote']['quote_by']; ?>
/<?php echo $this->_tpl_vars['quote']['quote_by']; ?>
_p.jpg">
									<p class="editor-name"><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
</p>
									<p class="editor-info">
									Phone Number : <?php echo $this->_tpl_vars['quote']['phone_number']; ?>
<br>
									Email :<a href="mailto:<?php echo $this->_tpl_vars['quote']['email']; ?>
"> <?php echo $this->_tpl_vars['quote']['email']; ?>
</a><br><br>
									</p>									
								</div>
							</div>
							<div class="aside-block" id="selected-bouser">
							<input type="hidden" id="sales_suggested_price" name="sales_suggested_price" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['sales_suggested_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
">
								<div class="editor-container">
									<h2 class="heading">Total quote</h2>
									<p class="editor-name"><?php echo $this->_tpl_vars['quote']['sales_suggested_price_format']; ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</p>
									<label id="percentage_change" style="display:none" class="label label-success"></label>
								</div>
							</div>	
						</div>	
					</aside>
				</div>
			</div>	
		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	</div>
</div>
<div class="row-fluid addedbyjs" id="seo_mission_0" style="display:none">
	<div class="mission-details">
		<div class="mission-seo-product"><span id="box_title_0">Proposition seo 0</span>
			<div class="pull-right">												
				<a class="btn close-seo" rel="" id="smission_close_0">&times;</a>
			</div>											
		</div>
		<table class="table mission-table">
			<tr>
				<th style="width:25%">Type</th>
				<th style="width:25%">Language</th>
				<th style="width:30%"  id="thead_dtime_0">Delivery time</th>														
				<th style="width:20%" id="thead_cost_0">Cost (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
				<th style="display:none;width:35%" id="thead_ptype_0">Product</th>
				<th style="display:none;width:15%" id="thead_nwords_0">Nb of words</th>
			</tr>
			<tr class="misson-details-text">
				<td>					
					<select name="product[]" id="product_0" onchange="fnCheckProduct(this);" class="span12 validate[required]" data-placeholder="Select product">
						<option value="seo_audit">SEO audit</option>
						<option value="smo_audit">SMO audit</option>
						<?php if ($this->_tpl_vars['quote']['quote_type'] == 'normal'): ?>
							<option value="redaction">Writing</option>
							<option value="translation">Translating</option>
							<option value="autre">Other</option>
						<?php endif; ?>	
					</select>					
				
				</td>
				<td>
					<select name="language[]" id="language_0" class="span12 validate[required]" data-placeholder="Select language">
						<option></option>
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['mission']['language']), $this);?>

					</select>
					<select name="languagedest[]" id="languagedest_0" style="display:none" class="span12 validate[required]" data-placeholder="Select language">
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list']), $this);?>

					</select>					
				
				</td>
				<td id="td_dtime_0">															
					<div class="span4">
						<input type="text" id="sdelivery_time_0" name="sdelivery_time[]" class="span12 validate[required]" value="3"/>
					</div>
					<div class="span5">
						<select name="sdelivery_option[]" id="sdelivery_option_0">					
							<option value="days">Days</option>
							<option value="hours">Hours</option>									
						</select>
					</div>	
				</td>
				<td id="td_cost_0">
					<input type="text" id="smission_cost_0" name="smission_cost[]" class="span11 validate[required,custom[number]]" onkeyup="fnCalculateQuote();"/>
				</td>
				<td style="display:none" id="td_ptype_0">
					<select name="producttype[]" id="producttype_0" class="validate[required]" data-placeholder="Select product type">
						<option></option>
						<option value="article_de_blog" <?php if ($this->_tpl_vars['mission']['producttype'] == 'article_de_blog'): ?> selected<?php endif; ?>>Brand content</option>
						<option value="descriptif_produit" <?php if ($this->_tpl_vars['mission']['producttype'] == 'descriptif_produit'): ?> selected<?php endif; ?>>Product description</option>
						<option value="article_seo" <?php if ($this->_tpl_vars['mission']['producttype'] == 'article_seo'): ?> selected<?php endif; ?>>SEO articles</option>
						<option value="guide" <?php if ($this->_tpl_vars['mission']['producttype'] == 'guide'): ?> selected<?php endif; ?>>Guides</option>
						<option value="news" <?php if ($this->_tpl_vars['mission']['producttype'] == 'news'): ?> selected<?php endif; ?>>News</option>
					</select>
				</td>
				<td style="display:none" id="td_nwords_0">
					<input type="text" name="nb_words[]" id="nb_words_0" class="span11 validate[required,custom[number]]" value="<?php echo $this->_tpl_vars['mission']['nb_words']; ?>
">
				</td>
																		
			</tr>	
		</table>
		<div class="row-fluid" style="margin-left: 15px;" id="div_before_prod_0">
			<div class="span12">
				<input type="checkbox" class="uni_style" name="before_prod_0" id="before_prod_0"> To be done before launching prod mission
			</div>	
		</div>
		<div class="media mission-comment">
			<a class="pull-left imgframe">
				<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
			</a>
			<div class="media-body">														
				<textarea name="scomments[]" placeholder="insert a comment" id="scomments_0" class="span12"></textarea>
			</div>												
		</div>
		<div class="row-fluid topset2" style="padding:0 10px;">	
			<div class="span7 form-inline" style="display:none" id="relatedto_0">
				<span class="span5"><label style="padding-top: 5px;"><b>Link this proposal : </b></label></span>
				<select name="related_mission[]" id="related_mission_0" class="validate[required]">
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['quote']['missions_list']), $this);?>

				</select>
			</div>
		</div>
		<div class="row-fluid">
			<div class="">
				<input type="file" name="seo_documents_0" accept="doc|xls|zip|docx|xlsx" class="" id="seo_documents_0"/>
			</div>
		</div>
	</div>	
</div>	

<!--popup to show after quote created-->
<div class="modal hide fade" id="seo_challenge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>SEO - Please precise your deadline</h3>
    </div>
    <div class="modal-body">
		<section>
			<div class="row-fluid">
				<div class="span9">
					<?php echo '
					<script language="javascript">
					$(document).ready(function() {		
						$(\'#tp_2\').timepicker({							
							defaultTime: \'value\',
							minuteStep: 1,
							disableFocus: true,
							showMeridian: false,
							template: \'dropdown\'
						});
						//validation
						$("#seo_challenge_form").validationEngine();
					});		
					</script>	
					'; ?>

					<form id="seo_challenge_form"  method="POST" action="/quote/save-seo-review" >					
						<input type="hidden" name="quote_id" value="<?php echo $_GET['quote_id']; ?>
">
					<!--	<div class="formSep control-group">
							<label for="seo_timeline" class="control-label"><b>Due date:</b></label>
							<div class="row-fluid controls">
								<div class="span5">
									<div class="input-append date" id="dp2" data-date-format="dd/mm/yyyy">
										<input class="span10 validate[required]"  name="seo_timeline" id="seo_timeline" type="text" readonly="readonly" <?php if ($this->_tpl_vars['quote']['seo_timeline_date']): ?> value="<?php echo $this->_tpl_vars['quote']['seo_timeline_date']; ?>
" <?php endif; ?> /><span class="add-on"><i class="splashy-calendar_day"></i></span>
									</div>
								</div>	
								<div class="span3">
									<input type="text" name="seo_time" id="tp_2" class="span8" <?php if ($this->_tpl_vars['quote']['seo_timeline_time']): ?> value="<?php echo $this->_tpl_vars['quote']['seo_timeline_time']; ?>
"<?php else: ?> value='<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%H:%M") : smarty_modifier_date_format($_tmp, "%H:%M")); ?>
'<?php endif; ?>>
								</div>	
							</div>
						</div> -->
						<div class="formSep control-group">
							<label for="seo_comments" class="control-label"><b>Comment:</b></label>
							<div class="row-fluid controls">
								<div class="span2">
									<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
								</div>	
								<div class="span10">
									<textarea name="seo_comments" placeholder="insert a comment" id="seo_comments" class="span12"><?php echo $this->_tpl_vars['quote']['seo_comments']; ?>
</textarea>
								</div>	
							</div>
						</div>
						<div class="formSep control-group">
							<div class="row-fluid controls">
								<div class="span4"></div>
								<div class="span6">
									<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>					
									<button type="submit" name="review_challenge" class="btn btn-primary">Challenge</button>	
								</div>	
							</div>
						</div>	
					</form>
				</div>
			</div>
		</section>
    </div>
    <div class="modal-footer">
    </div>
</div>

<!-- SKip Quote popup-->
<div class="modal hide fade" id="quote_skip_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button class="close" data-dismiss="modal" >&times;</button>
		<h3>Skip quote</h3>
	</div>
	<div class="modal-body">
		<?php echo '
		<script language="javascript">
		$(document).ready(function() {
			//validation
			$("#skip_comment_form").validationEngine();
		});		
		</script>	
		'; ?>

		<form  method="POST" id="skip_comment_form" action="/quote/save-seo-review" enctype="mulitpart/form-data">
		<input type="hidden" name="quote_id" value="<?php echo $_GET['quote_id']; ?>
">
			<section>
				<div class="row-fluid">
					<div class="span9">
						<div class="row-fluid">
							<div class="media">
								<br>											
								<br>
								<a class="pull-left imgframe">
									<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
								</a>
								<div class="media-body">														
									<textarea name="skip_comments" placeholder="skip commentaires" class="span12 validate[required]"></textarea>
								</div>												
							</div>
						</div>	
						<div class="row-fluid">
							<div class="span12">
								<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								<button type="submit" name="review_skip" class="btn btn-primary">Skip</button>
							</div>
						</div>	
					</div>
				</div>	
			</section>
		</form>	
	</div>
	<div class="modal-footer">
	</div>
</div>

<!-- Need more info comments-->
<div class="modal hide fade" id="quote_more_info_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button class="close" data-dismiss="modal" >&times;</button>
		<h3>Need precisions </h3>
	</div>
	<div class="modal-body">		
		<form  method="POST" id="more_info_comment_form" action="/quote/need-more-info" enctype="mulitpart/form-data">
		<input type="hidden" name="quote_id" value="<?php echo $_GET['quote_id']; ?>
">
		<input type="hidden" name="team_review" value="seo">
			<section>
				<div class="row-fluid">
					<div class="span12">
						<div class="row-fluid">
							<div class="media">
								<br>								
								<div class="media-body">														
									<textarea name="more_info_comments" id="more_info_comments" rows="10" placeholder="commentaires" class="span9 validate[required]"></textarea>
								</div>	
								<label id="error_comment" class="error" style="display:none">This filed is required</label>
							</div>
						</div>	
						<div class="row-fluid">
							<div class="span12">
								<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
								<button id="more_info_btn"class="btn btn-primary" type="button">Ok</button>								
							</div>
						</div>	
					</div>
				</div>	
			</section>
		</form>	
		<?php echo '
		<script language="javascript">
		$(document).ready(function() {			
			$(\'#more_info_btn\').click(function(){
				var more_info_comments=$("#more_info_comments").val();
				var comments = more_info_comments.replace(/\\n/g, "");
				if (comments)
				{
					$("#error_comment").parent().removeClass(\'f_error\');
					$("#error_comment").hide();
					$(\'#more_info_comment_form\').submit();
				}
				else
				{
					$("#error_comment").parent().addClass(\'f_error\');
					$("#error_comment").show();
				}			
			});	
		});		
		</script>	
		'; ?>

	</div>
	<div class="modal-footer">
	</div>
</div>