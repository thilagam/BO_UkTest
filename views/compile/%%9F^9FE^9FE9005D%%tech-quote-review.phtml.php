<?php /* Smarty version 2.6.19, created on 2015-10-08 10:36:15
         compiled from gebo/quote/tech-quote-review.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/tech-quote-review.phtml', 308, false),array('modifier', 'escape', 'gebo/quote/tech-quote-review.phtml', 374, false),array('modifier', 'stripslashes', 'gebo/quote/tech-quote-review.phtml', 374, false),array('modifier', 'htmlentities', 'gebo/quote/tech-quote-review.phtml', 430, false),array('modifier', 'nl2br', 'gebo/quote/tech-quote-review.phtml', 430, false),array('modifier', 'zero_cut', 'gebo/quote/tech-quote-review.phtml', 557, false),array('modifier', 'zero_cut_t', 'gebo/quote/tech-quote-review.phtml', 720, false),array('modifier', 'domain_url', 'gebo/quote/tech-quote-review.phtml', 724, false),array('modifier', 'date_format', 'gebo/quote/tech-quote-review.phtml', 847, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<script src="/BO/theme/gebo/lib/datepicker/bootstrap-timepicker.min.js"></script>
<script language="javascript">
$(document).ready(function() {

	
	$(".uni_style").uniform();
	$(\'#tech_missions textarea\').css(\'height\',\'60px\');
	$(\'#tech_missions textarea\').autosize();
	
	//more info popup
	$("#quote_more_info").click(function(){
		$("#quote_more_info_pop").modal(\'show\');
		$("#quote_more_info_pop").removeClass( "hide" ).addClass("in");
	});
	
	
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
	
	
	$("#challenge_btn").click(function(){
		$("#tech_challenge").modal(\'show\');
		$("#tech_challenge").removeClass( "hide" ).addClass("in");
	});	
	
	
	//validation
	$("#challenge_quote").validationEngine();	
	$(\'#quote_updated_comments\').attr(\'data-prompt-position\',\'topLeft\');
	$(\'#quote_updated_comments\').data(\'promptPosition\',\'topLeft\');
	
	$("[id^=delivery_time_]").spinner({min:1});
	$("[id^=delivery_option_]").chosen({ allow_single_deselect: false,search_contains: true});	
	
	//calculate changed in quote price percentage
	fnCalculateQuote();
	
	//scroll to tech misson
	$( \'.searchbyid\' ).on(\'click\', function(event) {
		event.preventDefault();
		var target = "#" + $(this).data(\'target\');
		$(\'html, body\').animate({
			scrollTop: $(target).offset().top
		}, 2000);
	});
	
	//close mission
	$("[id^=mission_close_]").live(\'click\', function() {
			var DivId = $(this).attr(\'id\');			
			var parentDiv=$(this).parents("div:eq(3)").attr(\'id\');
			
			var mission_identifier=$(this).attr(\'rel\');		
			var	quote_id=$("#quote_id").val();		
			if(!mission_identifier)
			{
				//alert($("[id^=tech_mission_]").size());
				if($("[id^=tech_mission_]").size()>1)
				{
					$("#"+parentDiv).remove();
					if($("[id^=tech_mission_]").size()==1)
					{	
						$("#addmore_mission_link").click();
					}
				}					
					fnCalculateQuote();
			}	
			else
			{	
				smoke.confirm("Do you want to remove this tech mission quote?",function(e){
					if (e)
					{
						if($("[id^=tech_mission_]").size()>2)
						{
							$("#"+parentDiv).html(\'<center><img alt="" src="/BO/theme/gebo/img/ajax_loader.gif"> Suppression de cette mission tech... </center>\');
							ajaxTechMissionUpdate(quote_id,mission_identifier,parentDiv,\'\');
							fnCalculateQuote();
						}	
						else
						{
							$("#"+parentDiv).html(\'<center><img alt="" src="/BO/theme/gebo/img/ajax_loader.gif"> Suppression de cette mission tech... </center>\');
							ajaxTechMissionUpdate(quote_id,mission_identifier,parentDiv,\'final\');	
							
						}
					}
					else
					{
						return false;
					}
				});				
			}	
			techIncDec();	
		});	

	function techIncDec()
	{
		var mid =1;
		$("[id^=box_title_]").each(function(){
			$(this).text(\'Tech Mission \'+mid++);
		})
	}
		
	//Adding tech missions
	var mission_cnt=1;
	$("[id^=tech_mission_]" ).each(function(z) {
			mission_cnt=z++;
	});
	//Add more mission
	$("#addmore_mission_link").click(function() {
		
		var cloned =$("#tech_missions");	
		var duplicate_id;		
		
		$("[id^=tech_mission_]" ).each(function(m) {
			var div_id = $(this).attr(\'id\');
			var div_numbers=div_id.split("_");
			duplicate_id=div_numbers[2];
			duplicate_id=0;
			if(duplicate_id)
			return false;
			//break;
		});		
		//alert(mission_cnt+duplicate_id);
		$(\'#delivery_time_\'+duplicate_id).spinner( "destroy" );
		
		$("#tech_mission_"+duplicate_id).clone().attr(\'id\', \'tech_mission_\'+(++mission_cnt) ).appendTo( cloned );	
		$(\'#tech_mission_\'+mission_cnt).show();
		$(\'#tech_mission_\'+mission_cnt+\' #box_title_\'+duplicate_id).attr(\'id\',\'box_title_\'+mission_cnt); //changing mission tilte id
		$(\'#box_title_\'+mission_cnt).text(\'Tech Mission \'+mission_cnt); //changing mission tilte		
		$(\'#tech_mission_\'+mission_cnt+\' #mission_close_\'+duplicate_id).attr(\'id\',\'mission_close_\'+mission_cnt); //chaning id of close button
		$(\'#mission_close_\'+mission_cnt).show();
		$(\'#mission_close_\'+mission_cnt).attr(\'rel\',\'\');
				
			
		//Product select box
		$(\'#tech_mission_\'+mission_cnt+\' #delivery_option_\'+duplicate_id).attr(\'id\',\'delivery_option_\'+mission_cnt); //changing product id		
		
		//before prod checkbox
		$(\'#tech_mission_\'+mission_cnt+\' #before_prod_\'+duplicate_id).attr(\'id\',\'before_prod_\'+mission_cnt); 
		$(\'#tech_mission_\'+mission_cnt+\' input[name="before_prod_\'+duplicate_id+\'"]\').attr(\'name\',\'before_prod_\'+mission_cnt);
		$(".uni_style").uniform();
		
		$("#delivery_option_"+mission_cnt).removeClass("chzn-done" ).addClass("");	
		$("#tech_mission_"+mission_cnt+ " .chzn-container").remove(); 		
		
		$("#delivery_option_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});	//updating selected value
		$("#delivery_option_"+mission_cnt).val(\'\');
		$("#delivery_option_"+mission_cnt).trigger("liszt:updated");		
		
		
		$(\'#tech_mission_\'+mission_cnt+\' input[name="mission_title[]"]\').attr(\'id\',\'mission_title_\'+mission_cnt);
		$(\'#tech_mission_\'+mission_cnt+\' input[name="mission_cost[]"]\').attr(\'id\',\'mission_cost_\'+mission_cnt);
		$(\'#tech_mission_\'+mission_cnt+\' input[name="delivery_time[]"]\').attr(\'id\',\'delivery_time_\'+mission_cnt);		
		$(\'#tech_mission_\'+mission_cnt+\' #comments_\'+duplicate_id).attr(\'id\',\'comments_\'+mission_cnt);		
		$(\'#tech_mission_\'+mission_cnt+\' input[name="tech_documents_\'+duplicate_id+\'"]\').attr(\'id\',\'tech_documents_\'+mission_cnt);
		$(\'#tech_mission_\'+mission_cnt+\' input[name="tech_documents_\'+duplicate_id+\'"]\').attr(\'name\',\'tech_documents_\'+mission_cnt+\'[]\');						
		clearChildren(document.getElementById(\'tech_mission_\'+mission_cnt));
		
		$(\'#delivery_time_\'+mission_cnt).val(3);
		$("[id^=delivery_time_]").spinner({min:1});
		$("#tech_documents_"+mission_cnt).MultiFile();
				
		$(\'#tech_mission_\'+mission_cnt+\' textarea\').css(\'height\',\'60px\');
		$(\'#tech_mission_\'+mission_cnt+\' textarea\').autosize();
		
		techIncDec();
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
function ajaxTechMissionUpdate(quote_id,mission_identifier,divid,last)
{
        var target_page = "/quote/update-quote-techmission?quote_id="+quote_id+"&mission_identifier="+mission_identifier;
//alert(target_page)		;
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
	$("[id^=mission_cost_]" ).each(function(z) {
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

function changeNames()
{
	var i = 1;
	$("#tech_missions").find(\'.MultiFile-wrap\').each(function(){
		$(this).find(":file").each(function(){
			$(this).attr("name","tech_documents_"+i+"[]");
		})
		
		$(this).find(":text").each(function(){
			$(this).attr("name","document_name"+i+"[]");
		})
		i++;
	})
}

$(document).on("click",".deletetech",function(){
	var id_identifier = $(this).attr("rel");
		if(confirm("Are you sure? Want to delete this File"))
		{
			//$(this).closest(".topset2").remove();
			var thisvar =$(this).closest(\'.onsuccessrep\');
			thisvar.html("Please Wait Deleting File.");
			$.post("/quote-test/delete-document-tech",{"identifier":id_identifier},function(result){
					thisvar.html(result);
			}); 
		}	
	});


function removeDisabled(){	setTimeout(function(){$(".MultiFile-applied").removeAttr("disabled");}, 1000);	}


</script>
<style type="text/css">
.splashy-documents
{
top:3px;
}
.deletetech
{
	color:#000;
	margin: 0 5px;
	cursor: pointer;
}
</style>
'; ?>

<div class="row-fluid">    
	<div class="span12">
		<div class="row-fluid">
			<ul id="validate_wizard-titles" class="stepy-titles clearfix">
				<li id="validate_wizard-title-0"><div>Creation</div><span class="stepNb">1</span></li>
				<li id="validate_wizard-title-1" class="current-step"><div>TECH review</div><span class="stepNb">2</span></li>
				<li id="validate_wizard-title-2"><div>SEO review</div><span class="stepNb">3</span></li>
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

			
			<?php if ($this->_tpl_vars['quote']['tec_review'] == 'challenged' || $this->_tpl_vars['quote']['tec_review'] == 'validated'): ?>
				<?php if ($this->_tpl_vars['quote']['tech_timeline_stamp'] < time()): ?><label class="pull-right label label-warning"> Delay</label><?php endif; ?>
				<span id="time_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['tech_timeline_stamp']; ?>
" class="alert alert-danger pull-right quote-timer">
					<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['tech_timeline_stamp']; ?>
"></span>
				</span>
			<?php endif; ?>	
				
			</h1>			
				<?php if ($this->_tpl_vars['quote']['tec_review'] == 'challenged' || $this->_tpl_vars['quote']['tec_review'] == 'validated'): ?>
					<div class="alert alert-success">
						<a data-dismiss="alert" class="close">&times;</a>
						<b>The tech challenge has been taken into account! Please finalize it in time</b>
					</div>	
				<?php else: ?>
					<div class="alert alert-info">
						<a data-dismiss="alert" class="close">&times;</a>
						<b><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
 have sent you a quote.You can challenge it or skip it <a class="searchbyid"data-target="challenge_quote">click below</a></b>
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
												<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['nb_words_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
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
					<form action="/quote/save-tech-review" method="POST" id="challenge_quote" enctype="multipart/form-data">
						<input type="hidden" name="quote_id" id="quote_id" value="<?php echo $this->_tpl_vars['quote']['identifier']; ?>
">
						<input type="hidden" name="currency" value="<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
">
						<div class="formSep topset2">
						<?php if ($this->_tpl_vars['quote']['tec_review'] == 'challenged' || $this->_tpl_vars['quote']['tec_review'] == 'validated'): ?>
							<div class="w-box">
								<div class="w-box-header">Tech Mission</div>
								<div class="w-box-content  cnt_a">
									<div class="row-fluid" id="tech_missions">
										<?php if (count($this->_tpl_vars['techMissionDetails']) > 0): ?>
										<?php $_from = $this->_tpl_vars['techMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmisson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmisson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['tmisson']['iteration']++;
?>
										<?php $this->assign('gn_index', ($this->_foreach['tmisson']['iteration']-1)); ?>
										<?php $this->assign('ms_index', ($this->_foreach['tmisson']['iteration']-1)+1); ?>		
										<div class="row-fluid" id="tech_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
">	
										<input type="hidden" name="tech_mission_id[]" value="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
											<div class="mission-details">												
												<div class="mission-tech-product">
													<span id="box_title_<?php echo $this->_tpl_vars['ms_index']; ?>
"><?php echo $this->_tpl_vars['mission']['title']; ?>
 <?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?><label class="label label-warning">New</label> <?php endif; ?></span>
													
													<div class="pull-right">												
													<a class="btn close-tech" rel="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="mission_close_<?php echo $this->_tpl_vars['ms_index']; ?>
">&times;</a>
														 												
													</div>											
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
" class="span10 validate[required]" placeholder="enter a mission">
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
															<div class="span4">
																<select name="delivery_option[]" id="delivery_option_<?php echo $this->_tpl_vars['ms_index']; ?>
">					
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
" name="mission_cost[]" class="span4 validate[required,custom[number]]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fnCalculateQuote();"/>
														</td>														
													</tr>														
												</table>
												<div class="row-fluid" style="margin-left: 15px;">
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
														<textarea name="comments[]" rows="2" placeholder="ins&eacute;rer un commentaire" id="comments_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12"><?php echo $this->_tpl_vars['mission']['comments']; ?>
</textarea>
													</div>
												</div>	
												<div class="row-fluid topset2">	
													<div class="span12" style="padding:0 10px;">
														<input type="file" name="tech_documents_<?php echo $this->_tpl_vars['ms_index']; ?>
[]" accept="doc|xls|zip|docx|xlsx" class="multi" id="tech_documents_<?php echo $this->_tpl_vars['ms_index']; ?>
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
										<div class="row-fluid" id="tech_mission_1">
											<div class="mission-details">
												<div class="mission-tech-product"><span id="box_title_1">Tech mission 1</span>
													<div class="pull-right">												
														<a class="btn close-tech" rel="" id="mission_close_1">&times;</a>
													</div>											
												</div>
												<table class="table mission-table">
													<tr>
														<th style="width:33%">Mission</th>
														<th style="width:33%">Delivery timing</th>
														<th style="width:33">Cost (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
													</tr>
													<tr class="misson-details-text">
														<td>
															<input type="text" name="mission_title[]" id="mission_title_1" class="span11 validate[required]" placeholder="enter a mission">
														</td>
														<td>
															<div class="span2"></div>
															<div class="span4">
																<input type="text" id="delivery_time_1" name="delivery_time[]" class="span12 validate[required]" value="3"/>
															</div>
															<div class="span4">
																<select name="delivery_option[]" id="delivery_option_1">					
																	<option value="days">Days</option>
																	<option value="hours">Hours</option>									
																</select>
															</div>	
														</td>
														<td>
															<input type="text" id="mission_cost_1" name="mission_cost[]" class="span4 validate[required,custom[number]]" onkeyup="fnCalculateQuote();"/>
														</td>														
													</tr>														
												</table>
												<div class="row-fluid" style="margin-left: 15px;">
													<div class="span12">
														<input type="checkbox" class="uni_style" name="before_prod_1" id="before_prod_1">To be done before launching prod mission
													</div>	
												</div>
												<div class="media mission-comment">
													<a class="pull-left imgframe">
														<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
													</a>
													<div class="media-body">														
														<textarea name="comments[]" rows="2" placeholder="insert a comment" id="comments_1" class=" span12"></textarea>
													</div>												
												</div>
												<div class="row-fluid topset2">	
													<div class="span12" style="padding:0 10px;">
														<input type="file" name="tech_documents_1[]" accept="doc|xls|zip|docx|xlsx" class="multi" id="tech_documents_1"/>
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
									<?php if ($this->_tpl_vars['quote']['tec_review'] == 'not_done'): ?>
										<?php if ($this->_tpl_vars['quote']['quote_type'] == 'normal'): ?>
											<button type="button" id="skip_btn" name="review_skip" class="btn">Skip</button>
										<?php endif; ?>
										<button type="button" id="challenge_btn" name="challenge" class="btn btn-primary">Challenge</button>
									<?php elseif ($this->_tpl_vars['quote']['tec_review'] == 'challenged' || $this->_tpl_vars['quote']['tec_review'] == 'validated'): ?>
										<?php if ($this->_tpl_vars['quote']['tech_challenge'] == 'yes'): ?><button type="button" id="challenge_btn" name="challenge" class="btn btn-primary">Challenge</button><?php endif; ?>
										<?php if ($this->_tpl_vars['quote']['tec_review'] == 'challenged'): ?>
											<button type="submit" name="review_save" onclick="changeNames(); removeDisabled()" class="btn btn-success">Save</button>
											<?php if ($this->_tpl_vars['show_validate'] == 'yes'): ?>
												<button type="submit" name="review_validate" onclick="changeNames(); removeDisabled()" class="btn btn-primary">Validate</button>
											<?php endif; ?>	
										<?php elseif ($this->_tpl_vars['quote']['tec_review'] == 'validated'): ?>
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
						<?php if ($this->_tpl_vars['quote']['tec_review'] == 'validated'): ?>
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
									Turonver : <?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['ca_number'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
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
									Email : <a href="mailto:<?php echo $this->_tpl_vars['quote']['email']; ?>
"><?php echo $this->_tpl_vars['quote']['email']; ?>
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
<div class="row-fluid" id="tech_mission_0" style="display:none">	
	<div class="mission-details">
		<div class="mission-tech-product"><span id="box_title_0">Tech mission 0</span>
			<div class="pull-right">												
				<a class="btn close-tech" rel="" id="mission_close_0">&times;</a>
			</div>											
		</div>
		<table class="table mission-table">
			<tr>
				<th style="width:33%">Mission</th>
				<th style="width:33%">Delivery timing</th>
				<th style="width:33">Cost (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
			</tr>
			<tr class="misson-details-text">
				<td>
					<input type="text" name="mission_title[]" id="mission_title_0" class="span11 validate[required]" placeholder="enter a mission">
				</td>
				<td>
					<div class="span2"></div>
					<div class="span4">
						<input type="text" id="delivery_time_0" name="delivery_time[]" class="span12 validate[required]" value="3"/>
					</div>
					<div class="span4">
						<select name="delivery_option[]" id="delivery_option_0">					
							<option value="days">Days</option>
							<option value="hours">Hours</option>									
						</select>
					</div>	
				</td>
				<td>
					<input type="text" id="mission_cost_0" name="mission_cost[]" class="span4 validate[required,custom[number]]" onkeyup="fnCalculateQuote();"/>
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
				<textarea name="comments[]" rows="2" placeholder="insert a comment" id="comments_0" class="span12"></textarea>
			</div>												
		</div>
		<div class="row-fluid topset2">	
			<div class="span12"  style="padding:0 10px;">
				<input type="file" name="tech_documents_0" accept="doc|xls|zip|docx|xlsx" class="" id="tech_documents_0"/>
			</div>
			
		</div>
	</div>	
</div>
<!--popup to show after quote created-->
<div class="modal hide fade" id="tech_challenge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>TECH - Thank you to give a response time</h3>
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
						$("#tech_challenge_form").validationEngine();
					});		
					</script>	
					'; ?>

					<form id="tech_challenge_form"  method="POST" action="/quote/save-tech-review" enctype="mulitpart/form-data">					
						<input type="hidden" name="quote_id" value="<?php echo $_GET['quote_id']; ?>
">
					<!--	<div class="formSep control-group">
							<label for="tech_timeline" class="control-label"><b>Due date:</b></label>
							<div class="row-fluid controls">
								<div class="span5">
									<div class="input-append date" id="dp2" data-date-format="dd/mm/yyyy">
										<input class="span10 validate[required]"  name="tech_timeline" id="tech_timeline" type="text" readonly="readonly" <?php if ($this->_tpl_vars['quote']['tech_timeline_date']): ?> value="<?php echo $this->_tpl_vars['quote']['tech_timeline_date']; ?>
" <?php endif; ?> /><span class="add-on"><i class="splashy-calendar_day"></i></span>
									</div>
								</div>	
								<div class="span3">
									<input type="text" name="tech_time" id="tp_2" class="span8" <?php if ($this->_tpl_vars['quote']['tech_timeline_time']): ?> value="<?php echo $this->_tpl_vars['quote']['tech_timeline_time']; ?>
" <?php else: ?> value='<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%H:%M") : smarty_modifier_date_format($_tmp, "%H:%M")); ?>
'<?php endif; ?>>
								</div>	
							</div>
						</div>  -->
						<div class="formSep control-group">
							<label for="tech_challenge_comments" class="control-label"><b>Comment:</b></label>
							<div class="row-fluid controls">
								<div class="span2">
									<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
								</div>	
								<div class="span10">
									<textarea name="tech_challenge_comments" placeholder="ins&eacute;rer un commentaire" id="tech_challenge_comments" class="validate[required] span12"><?php echo $this->_tpl_vars['quote']['tech_challenge_comments']; ?>
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

		<form  method="POST" id="skip_comment_form" action="/quote/save-tech-review" enctype="mulitpart/form-data">
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
								<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
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
		<input type="hidden" name="team_review" value="tech">
			<section>
				<div class="row-fluid">
					<div class="span12">
						<div class="row-fluid">
							<div class="media">
								<br>								
								<div class="media-body">														
									<textarea name="more_info_comments" id="more_info_comments" rows="10" placeholder="commentaires" class="span9 validate[required]"></textarea>
								</div>	
								<label id="error_comment" class="error" style="display:none">This field is required</label>
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