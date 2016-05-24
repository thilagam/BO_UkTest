<?php /* Smarty version 2.6.19, created on 2015-11-04 09:31:43
         compiled from gebo/quote/prod-quote-review.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/prod-quote-review.phtml', 416, false),array('modifier', 'escape', 'gebo/quote/prod-quote-review.phtml', 491, false),array('modifier', 'stripslashes', 'gebo/quote/prod-quote-review.phtml', 491, false),array('modifier', 'explode', 'gebo/quote/prod-quote-review.phtml', 592, false),array('modifier', 'zero_cut', 'gebo/quote/prod-quote-review.phtml', 699, false),array('modifier', 'htmlentities', 'gebo/quote/prod-quote-review.phtml', 712, false),array('modifier', 'nl2br', 'gebo/quote/prod-quote-review.phtml', 712, false),array('modifier', 'upper', 'gebo/quote/prod-quote-review.phtml', 1222, false),array('modifier', 'zero_cut_t', 'gebo/quote/prod-quote-review.phtml', 1369, false),array('modifier', 'ucfirst', 'gebo/quote/prod-quote-review.phtml', 1369, false),array('modifier', 'domain_url', 'gebo/quote/prod-quote-review.phtml', 1717, false),array('modifier', 'date_format', 'gebo/quote/prod-quote-review.phtml', 1799, false),array('function', 'html_options', 'gebo/quote/prod-quote-review.phtml', 507, false),array('function', 'math', 'gebo/quote/prod-quote-review.phtml', 806, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<script src="/BO/theme/gebo/lib/datepicker/bootstrap-timepicker.min.js"></script>
<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script><script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css">
.table th, .table-bordered th, .table thead th,.table td {
    text-align: left;    
}
span.product-text{
	font-size:14px;
	font-weight:normal;
	}
</style>
<script language="javascript">

//calculating tempo respect
function fnCalculateTempoRespect(current_mission)
{
	
	var total_volume= $(\'#total_volume_\'+current_mission).val();
	var volume_max= $(\'#volume_max_\'+current_mission).val();
	var tempo_length= $(\'#tempo_length_\'+current_mission).val();
	var tempo_length_option= $(\'#tempo_length_option_\'+current_mission).val();
	var tempo_length_option_label= $(\'#tempo_length_option_\'+current_mission+\' option:selected\').text();
	
	/*convering tempo length options in to days*/
	if(tempo_length_option==\'week\'){
		duration_length=tempo_length*7;
		lenth_t=7;
	}else if(tempo_length_option==\'month\'){
		duration_length=tempo_length*30;
		lenth_t=30;
	}else if(tempo_length_option==\'year\'){
		duration_length=tempo_length*365;
		lenth_t=365;
	}else{
		duration_length=tempo_length;
		lenth_t=1;
	}
	
	var tempo_type= $(\'#tempo_type_\'+current_mission+\' option:selected\').text();
	var default_mission_length= $(\'#mission_length_\'+current_mission).val();
	var calculated_mission=Math.round(default_mission_length/duration_length)*volume_max;
	$(\'.mission-details\').find(".newmission_"+current_mission).remove();
	$(\'#volume_max_\'+current_mission).closest(".row-fluid").find(".alert_duratioerror").remove();
	
	
	
	if(total_volume!=calculated_mission && tempo_type==\'Fix\')
	{			
		newduration_mission= Math.round(Math.round(duration_length*total_volume)/volume_max);
		if(newduration_mission<1)
		{
			newduration_mission=1;
		}			
		
		$(\'#mission_length_\'+current_mission).closest(\'.row-fluid\').after("<div class=\'row-fluid newmission_"+current_mission+"\'><label class=\'span3 moveright\'>New Mission Duration</label><div class=\'span3\'><div class=\'span4\'><input type=\'text\' readonly=\'\' class=\'validate[required,custom[number]] span12\' value="+newduration_mission+" id=\'new_missiondur_"+current_mission+"\' name=\'new_missiondur_"+current_mission+"[]\'></div><div class=\'span7\'><select readonly=\'\' class=\'span11\' id=\'new_tempolength_"+current_mission+"\' name=\'new_tempolength_"+current_mission+"[]\'><option selected=\'selected\' value=\'days\'>Days</option></select></div></div></div>");
		
		$(\'#volume_max_\'+current_mission).closest(\'.row-fluid\').append("<div class=\'row-fluid span12 alert_duratioerror\' style=\'padding:0 5px;\'><label class=\'span3 moveright\'></label><div class=\'span6 alert-danger\'>Your fixed tempo does not correspond to the total volume of the mission</div></div>");
	}
}
$(document).ready(function() {
	
	$(\'.icheck\').iCheck({
		checkboxClass: \'icheckbox_square-blue\',
		radioClass: \'iradio_square-blue\',
		//increaseArea: \'20%\' // optional
	 });
	$("#quote_save,#quote_validate").click(function(){
		$("#quote_updated_pop").modal(\'show\');
		$("#quote_updated_pop").removeClass( "hide" ).addClass("in");
	});
	
	//more info popup
	$("#quote_more_info").click(function(){
		$("#quote_more_info_pop").modal(\'show\');
		$("#quote_more_info_pop").removeClass( "hide" ).addClass("in");
	});
	
	//validation
	$("#challenge_quote").validationEngine();	
	$(\'#quote_updated_comments\').attr(\'data-prompt-position\',\'topLeft\');
	$(\'#quote_updated_comments\').data(\'promptPosition\',\'topLeft\');
	
	//tech missions
	$("[id^=delivery_time_]").spinner({ disabled: true });
	$("[id^=delivery_option_]").prop(\'disabled\', true).trigger("liszt:updated");
	
	//SEO missions
	$("[id^=sdelivery_time_]").spinner({ disabled: true });
	$("[id^=sdelivery_option_]").prop(\'disabled\', true).trigger("liszt:updated");
	$("[id^=product_]").prop(\'disabled\', true).trigger("liszt:updated");
	$("[id^=language_]").prop(\'disabled\', true).trigger("liszt:updated");
	$("[id^=producttype_]" ).prop(\'disabled\', true).trigger("liszt:updated");
	$("[id^=related_mission_]").prop(\'disabled\', true).trigger("liszt:updated");
	
	
	//close mission
	$("[id^=pmission_close_]").live(\'click\', function() {
		var DivId = $(this).attr(\'id\');			
		var parentDiv=$(this).parents("div:eq(3)").attr(\'id\');
		//alert(parentDiv);
		$(this).closest(".displayOther").find(".showeditother").show();
		if(parentDiv)
		{
			//if($("[id^=seo_mission_]").size()>1)	
				if($(this).hasClass("edit"))
				{
					var id = $(this).attr("rel");
					$(this).closest(".mission-details").find("[name^=prod_mission_id_]").remove();
					$.post("/quote/delete-other",{\'id\':id},function(txt){
					});
				}				
				$("#"+parentDiv).toggle();
				
				
				fnCalculateProdTotal();
		}
	});	
	
	//mission tempo respect checking on page load
	
	$("[id^=volume_max_]" ).each(function(u) {
		var tempoid = $(this).attr(\'id\');		
		var DivId = tempoid.split(\'_\');			
		var current_mission=DivId[2];
		fnCalculateTempoRespect(current_mission);
	});		
	//calculating tempo respect on change of voleme.tempo,tempo length	
	$("[id^=volume_max_],[id^=tempo_type_],[id^=tempo_length_]").on(\'change keyup keypress\', function() {
		
		var tempoid = $(this).attr(\'id\');		
		var DivId = tempoid.split(\'_\');			
		var current_mission=DivId[2];
		fnCalculateTempoRespect(current_mission);
		
		
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
	});
	
	$("#auto_match_missions").on(\'hidden\', function() {
		//alert(\'test\');
		$(this).removeData("modal");
		$("#auto_match_missions .modal-body").html(\'\');
	});
	
	
	
	
	
	fnCalculateProdTotal();
	
	
	$("#challenge_btn").click(function(){
		$("#prod_challenge").modal(\'show\');
		$("#prod_challenge").removeClass( "hide" ).addClass("in");
	});	
	
	$(\'input[name="prod_extra_info"]\').on(\'ifClicked\', function (event) {
		var value=this.value;
		if(value==\'yes\')
			$(".extra_comments").show();	
		else	
			$(".extra_comments").hide();	
		
	});	
});

// To remove other elements
function removeOther()
{
	$(".showother").each(function(){
	if($(this).css("display")=="none")
		$(this).closest(".displayOther").remove();
	})
	//return false;
}

//calculate mission time
function fncalculateTotalDelivertimeMissionType()
{
	$("[id^=pdelivery_time_]" ).each(function(z) {
		var deliveryTime=parseFloat($(this).val());
		
		var time_id = $(this).attr(\'id\');
		var time_split=time_id.split("_");
		var time_option=\'pdelivery_option_\'+time_split[2]+\'_\'+time_split[3];
		var delivery_option=$("#"+time_option).val();
		if(isNaN(deliveryTime))
			deliveryTime=0;
		if(delivery_option==\'hours\')
		{
			deliveryTime=deliveryTime/24;
			deliveryTime=deliveryTime.toFixed(2);
		}

		var staff_time=$(\'#staff_time_\'+time_split[2]+\'_\'+time_split[3]).val();
		var staff_time_option=$(\'#staff_time_option_\'+time_split[2]+\'_\'+time_split[3]).val();
		if(isNaN(staff_time))
			staff_time=0;
		if(staff_time_option==\'hours\')
		{
			staff_time=staff_time/24;
			staff_time=staff_time.toFixed(2);
		}
		
		var totalMissionTime=(parseFloat(deliveryTime)+parseFloat(staff_time));
		if(isNaN(totalMissionTime))
			totalMissionTime=0;
		
		$(\'#total_delivery_time_\'+time_split[2]+\'_\'+time_split[3]).text(totalMissionTime);
	});
}


//calculate total staff,total internal cost and total delivery
function fnCalculateProdTotal()
{
	
	var total_staff=0;
	var total_delivery_time=0;
	var total_staff_time=0;
	var total_cost=0;
	
	//calculating total cost
	$("[id^=pmission_cost_]" ).each(function(z) {
		var missionPrice=parseFloat($(this).val());
		if(isNaN(missionPrice))
			missionPrice=0;
		total_cost=total_cost+missionPrice;
	});
	//calculating total delivery time	
	total_delivery_time_writer=0;
	total_delivery_time_proofreader=0;
	$("[id^=pdelivery_time_]" ).each(function(z) {
		var deliveryTime=parseFloat($(this).val());
		
		var time_id = $(this).attr(\'id\');
		var time_split=time_id.split("_");
		var time_option=\'pdelivery_option_\'+time_split[2]+\'_\'+time_split[3];
		var delivery_option=$("#"+time_option).val();
		if(isNaN(deliveryTime))
			deliveryTime=0;
		if(delivery_option==\'hours\')
		{
			deliveryTime=deliveryTime/24;
			deliveryTime=deliveryTime.toFixed(2);
		}	
		
		if(time_split[3]==1)
		{
			if(deliveryTime>total_delivery_time_writer)	
				total_delivery_time_writer=deliveryTime;
		}
		if(time_split[3]==2)
		{
			if(deliveryTime>total_delivery_time_proofreader)	
				total_delivery_time_proofreader=deliveryTime;
		}	
		
	});
	total_delivery_time=(total_delivery_time_writer+total_delivery_time_proofreader);
	
	
	
	//calculating total staff time
	total_staff_time_write=0;
	total_staff_time_proofread=0;
	$("[id^=staff_]" ).each(function(z) {
		var div_id = $(this).attr(\'id\');
		var div_numbers=div_id.split("_");
		if(div_numbers[1]!=\'time\')
		{
			var staff=parseFloat($(this).val());
			if(isNaN(staff))
				staff=0;
			total_staff=total_staff+staff;
		}
		
		if(div_numbers[1]==\'time\' && div_numbers[2]!=\'option\')
		{
			var staffTime=parseFloat($(this).val());
			var stime_option=\'staff_time_option_\'+div_numbers[2]+\'_\'+div_numbers[3];
			var sdelivery_option=$("#"+stime_option).val();
			if(isNaN(staffTime))
				staffTime=0;
			if(sdelivery_option==\'hours\')
			{
				staffTime=staffTime/24;
				staffTime=staffTime.toFixed(2);
			}	
			
			if(div_numbers[3]==1)
			{
				if(staffTime>total_staff_time_write)	
					total_staff_time_write=staffTime;
			}
			if(div_numbers[3]==2)
			{
				if(staffTime>total_staff_time_proofread)	
					total_staff_time_proofread=staffTime;
			}			
		}
	});
	//alert(total_staff_time_write+\'--\'+total_staff_time_proofread);
	
	//adding staff time to total time
	total_delivery_time=(total_delivery_time+total_staff_time_write+total_staff_time_proofread);
	
	$("#total_staff").val(total_staff);
	$("#total_delivery_time").val(total_delivery_time);
	$("#total_mission_cost").val(total_cost);
	
	
	fncalculateTotalDelivertimeMissionType();
	
}
//calculate mission delivery time based on prod volume given per every/within days
function fnCalculateMissionDeliveryTime(volume,mission_id,index)
{
	var total_delivery_time=$(\'#pdelivery_time_\'+mission_id+\'_\'+index).val();
	var missionVolume=volume;	
	var delivery_volume=$(\'#pdelivery_volume_\'+mission_id+\'_\'+index).val();
	var delivery_volume_option=$(\'#pdelivery_volume_option_\'+mission_id+\'_\'+index).val();
	var delivery_volume_time=$(\'#pdelivery_volume_time_\'+mission_id+\'_\'+index).val();
	//var delivery_volume_time_option=$(\'#pdelivery_volume_time_option_\'+mission_id+\'_\'+index).val();
	
	//alert(delivery_volume+\'--\'+delivery_volume_option+\'--\'+delivery_volume_time+\'--\'+delivery_volume_time_option);	
	if(!delivery_volume_time || delivery_volume_time==0)
		delivery_volume_time=total_delivery_time;
	if(!delivery_volume || delivery_volume==0 )	
		delivery_volume=volume;
		
	var repeat_volume=Math.ceil(volume/delivery_volume);		
	total_delivery_time=(delivery_volume_time*repeat_volume);
	$(\'#pdelivery_time_\'+mission_id+\'_\'+index).val(total_delivery_time);
	if(total_delivery_time>0)
		fnCalculateProdTotal()
}

//recalculate the delivery time based on writers
function fnCalculateDeliveryTime(mission_id,mission_type,nbwriters)
{
	var target_page=\'/quote/ajax-calculate-delivery-time?mission_id=\'+mission_id+\'&mission_type=\'+mission_type+\'&nbwriters=\'+nbwriters;
	//alert(target_page);
	$.post(target_page,function(response){
		//alert(response);
			var obj = $.parseJSON(response);
			var staff_length=obj.staff_length;
			var mission_length=obj.mission_length;
			var time_option=obj.time_option;
			
			if(mission_type==\'proofreading\')
			{
				$(\'#staff_time_\'+mission_id+\'_2\').val(staff_length);
				$(\'#pdelivery_time_\'+mission_id+\'_2\').val(mission_length);
			}
			else
			{
				$(\'#staff_time_\'+mission_id+\'_1\').val(staff_length);
				$(\'#pdelivery_time_\'+mission_id+\'_1\').val(mission_length);
			}	
			
		fnCalculateProdTotal();			
	});
}

//change produit type of a missions
function fnchangeproducttype(mission_id,type)
{
	$.post(\'/quote/change-mission-product\',{\'mission_id\':mission_id,\'product_type\':type},function(data){$.sticky(\'Updated product successfully\', {autoclose : 2000, position: "top-center", type: \'st-success\'});});
}

</script>
'; ?>

<div class="row-fluid">    
	<div class="span12">
		<div class="row-fluid">
			<ul id="validate_wizard-titles" class="stepy-titles clearfix">
				<li id="validate_wizard-title-0"><div>Creation</div><span class="stepNb">1</span></li>
				<li id="validate_wizard-title-1"><div>TECH review</div><span class="stepNb">2</span></li>
				<li id="validate_wizard-title-2"><div>SEO review</div><span class="stepNb">3</span></li>
				<li id="validate_wizard-title-3" class="current-step"><div>Prod review</div><span class="stepNb">4</span></li>
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

				
				<?php if ($this->_tpl_vars['quote']['prod_review'] == 'challenged' || $this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
					<?php if ($this->_tpl_vars['quote']['prod_timeline'] < time()): ?><label class="pull-right label label-warning"> Delay</label><?php endif; ?>
					<span id="time_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['prod_timeline']; ?>
" class="alert alert-danger pull-right quote-timer">
						<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['prod_timeline']; ?>
"></span>
					</span>
					
				<?php endif; ?>
				<span class="pull-right" style="margin-right:10px">
					<button type="button" id="challenge_btn" name="challenge" class="btn btn-primary">Challenge</button>
									</span>
			</h1>
			<?php if ($this->_tpl_vars['quote']['prod_review'] == 'challenged'): ?>
				<div class="alert alert-success">
					<a data-dismiss="alert" class="close">&times;</a>
					<b><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
 has sent a quote. Please enter the production costs for each mission below. <br>
					Max. delivery timing is <?php echo $this->_tpl_vars['quote']['sales_delivery_time']; ?>
 <?php if ($this->_tpl_vars['quote']['sales_delivery_time_option'] == 'days'): ?> days <?php else: ?><?php echo $this->_tpl_vars['quote']['sales_delivery_time_option']; ?>
<?php endif; ?>.</b>
				</div>	
			<?php else: ?>
				<div class="alert alert-info">
					<a data-dismiss="alert" class="close">&times;</a>
					<b>Sales man requested a brand new quote. As prod owner, please estimate the production cost for every mission below. <br>
					Delivery timing requested by sales is <?php echo $this->_tpl_vars['quote']['sales_delivery_time']; ?>
 <?php echo $this->_tpl_vars['quote']['sales_delivery_time_option']; ?>
</b>
				</div>	
			<?php endif; ?>
			
			<div class="row-fluid">
			<form action="/quote/save-prod-review" method="POST" id="challenge_quote" enctype="multipart/form-data">			
				<div class="span9">
				<?php if ($this->_tpl_vars['quote']['prod_review'] == 'challenged' || $this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
					<div class="w-box">
						<div class="w-box-header">Production cost</div>
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
 <label class="label label-warning">Mission added</label>
									<?php else: ?>
										<div class="prod-mission-product"> Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_name']; ?>

									<?php endif; ?>
										<div class="span6 pull-right">
											<div class="span9">
												<select style="margin-top: -5px;" name="package_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="package_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" class="span12 validate[required]">
													<option value="">Choose your pack</option>
													<option value="lead" <?php if ($this->_tpl_vars['mission']['package'] == 'lead'): ?> selected<?php endif; ?> >Lead</option>
													<option value="team" <?php if ($this->_tpl_vars['mission']['package'] == 'team'): ?> selected<?php endif; ?>>Team</option>
													<option value="link" <?php if ($this->_tpl_vars['mission']['package'] == 'link'): ?> selected<?php endif; ?>>Link</option>
													<option value="user" <?php if ($this->_tpl_vars['mission']['package'] == 'user'): ?> selected<?php endif; ?>>User</option>
												</select>
											</div>	
											<div class="span3">
												<a data-target="#auto_match_missions" role="button" data-toggle="modal"   href="/quote/automatch-mission-popup?quote_id=<?php echo $this->_tpl_vars['mission']['quote_id']; ?>
&mission_id=<?php echo $this->_tpl_vars['mission']['identifier']; ?>
&suggested_mission=<?php echo $this->_tpl_vars['mission']['sales_suggested_missions']; ?>
" class="btn" style="margin-top: -5px;">Modify</a>
											</div>	
											
										</div>
									</div>
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
												<select name="product_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" onchange="fnchangeproducttype('<?php echo $this->_tpl_vars['mission']['identifier']; ?>
',this.value);">
													<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['producttype_array'],'selected' => $this->_tpl_vars['mission']['product_type']), $this);?>

												</select>
											<?php if ($this->_tpl_vars['mission']['product_type'] == 'autre' && $this->_tpl_vars['mission']['product_type_other'] != ''): ?>
												<span class="moveright product-text"><?php echo $this->_tpl_vars['mission']['product_type_other']; ?>
</span>
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
									<div class="row-fluid">
										<div class="mission-details">
											<div class="mission-prod-product">
												<span>Tempo Details</span>
											</div>
											<div class="row-fluid">								
												<label class="span3 moveright">Staffing set up</label>
												<div class="span3">
													<div class="span4">
														<input type="text" id="staff_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1" name="staff_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['mission']['staff_time']; ?>
" onkeyup="fnCalculateProdTotal();"/>
													</div>
													<div class="span7">
														<select name="staff_time_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="staff_time_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1" class="span11" onkeyup="fnCalculateProdTotal();">					
															<option value="days" <?php if ($this->_tpl_vars['mission']['staff_time_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
															<option value="hours" <?php if ($this->_tpl_vars['mission']['staff_time_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>									
														</select>
													</div>
												</div>	
											</div>
											<?php if ($this->_tpl_vars['mission']['oneshot']): ?>
												<div class="row-fluid">								
													<label class="span3 moveright">One shot</label>
													<div class="span3">
														<strong>
														<?php if ($this->_tpl_vars['mission']['oneshot'] == 'yes'): ?>
															Yes
														<?php else: ?>
															No
														<?php endif; ?>
														</strong>
													</div>
												</div>
											<?php endif; ?>
											<div class="row-fluid">								
												<label class="span3 moveright">Mission Duration</label>
												<div class="span3">
													<div class="span4">
														<input name="mission_length_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="mission_length_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
" class="validate[required,custom[number]] span12" type="text" <?php if ($this->_tpl_vars['mission']['oneshot'] == 'no'): ?>readonly<?php endif; ?>>
													</div>
													<div class="span7">											
														<select name="mission_length_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="mission_length_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" class="span11" <?php if ($this->_tpl_vars['mission']['oneshot'] == 'no'): ?>readonly<?php endif; ?>>
															<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['duration_array'],'selected' => $this->_tpl_vars['mission']['mission_length_option']), $this);?>

														</select>											
													</div>
												</div>
												<?php if ($this->_tpl_vars['mission']['duration_dont_know'] == 'yes'): ?> 															
													<div class="span4" style="margin-left: 0px">
														* Duration not specified by sales																
													</div>
												<?php endif; ?>
											</div>
											<?php if ($this->_tpl_vars['mission']['oneshot'] == 'no'): ?>
											<?php if ($this->_tpl_vars['mission']['mission_length_new']): ?>
												<div class="row-fluid newmission_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">								
												<label class="span3 moveright">New mission duration</label>
												<?php $this->assign('mission_new', ((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_new'])) ? $this->_run_mod_handler('explode', true, $_tmp, ',') : smarty_modifier_explode($_tmp, ','))); ?>
												
												<div class="span3">
													<div class="span4">
														<input name="new_missiondur_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="new_missiondur_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" value="<?php echo $this->_tpl_vars['mission_new'][0]; ?>
" class="validate[required,custom[number]] span12" type="text" <?php if ($this->_tpl_vars['mission']['oneshot'] == 'no'): ?>readonly<?php endif; ?>>
													</div>
													<div class="span7">											
														<select name="new_tempolength_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="new_tempolength_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" class="span11" <?php if ($this->_tpl_vars['mission']['oneshot'] == 'no'): ?>readonly<?php endif; ?>>
															<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['duration_array'],'selected' => $this->_tpl_vars['mission_new'][1]), $this);?>

														</select>											
													</div>
												</div>
												</div>
												<?php endif; ?>
												<div class="row-fluid">								
													<label class="span3 moveright">Volume</label>														
													<div class="span9" id="tempo_details_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" <?php if ($this->_tpl_vars['mission']['oneshot'] == 'yes'): ?> style="display:none" <?php endif; ?>>
														<div class="span2">																
																<input name="volume_max_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="volume_max_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" class="validate[custom[number]] span12" type="text" placeholder="Volume" value="<?php echo $this->_tpl_vars['mission']['volume_max']; ?>
">
																<input name="total_volume_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="total_volume_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" type="hidden"  value="<?php echo $this->_tpl_vars['mission']['volume']; ?>
">
														</div>
														<div class="span2">
															<select name="tempo_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="tempo_type_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" class="span12">
																<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_array'],'selected' => $this->_tpl_vars['mission']['tempo']), $this);?>

															</select>
														</div>																
														<div class="span2">
															<select name="delivery_volume_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="delivery_volume_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" class="span12">
																<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['volume_option_array'],'selected' => $this->_tpl_vars['mission']['delivery_volume_option']), $this);?>

															</select>
														</div>
														<div class="span2">
															<input type="text" id="tempo_length_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" name="tempo_length_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="validate[required] span12" value="<?php echo $this->_tpl_vars['mission']['tempo_length']; ?>
" />
														</div>
														<div class="span3">
															<select name="tempo_length_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" id="tempo_length_option_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" class="span12" onchange="fnCalculateTempoRespect('<?php echo $this->_tpl_vars['mission']['identifier']; ?>
');">
																<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_duration_array'],'selected' => $this->_tpl_vars['mission']['tempo_length_option']), $this);?>

															</select>
														</div>
													</div>
													<?php if ($this->_tpl_vars['mission']['mission_length_new']): ?>
												<div style="padding:0 5px;" class="row-fluid span12 alert_duratioerror">
													<label class="span3 moveright"></label>
													<div class="span6 alert-danger">Your fixed tempo does not correspond to the total volume of the mission</div>
													</div>
											<?php endif; ?>	
												</div>
											<?php endif; ?>	
										</div>
									</div>
									<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
										<?php if (count($this->_tpl_vars['mission']['prod_mission_details']) > 0): ?>
										<?php $this->assign('other', 'true'); ?>
											<?php $_from = $this->_tpl_vars['mission']['prod_mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['prod_mission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prod_mission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['prod_misson']):
        $this->_foreach['prod_mission']['iteration']++;
?>
												<?php $this->assign('pr_index', ($this->_foreach['prod_mission']['iteration']-1)+1); ?>
												<?php if ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
												<div class="displayOther">
												<div class="row-fluid showother" id="prod_missions_<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">
												<?php else: ?>
												<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">
												<?php endif; ?>
												
													<div class="mission-details">
														<div class="mission-prod-product">
														<span id="box_title_<?php echo $this->_tpl_vars['pr_index']; ?>
">
														<?php if ($this->_tpl_vars['prod_misson']['product'] == 'redaction'): ?>
															Writing
														<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'translation'): ?>
															Translating 	
														<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'proofreading'): ?>
															Correction 	
														<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
															Other 		
															<?php $this->assign('other', 'false'); ?>
														<?php endif; ?>		
														<?php if (count($this->_tpl_vars['prod_misson']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?><label class="label label-warning">New</label> <?php endif; ?></span>														
														</span>
															<?php if ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
																<div class="pull-right">												
																	<a class="btn close-seo edit" rel="<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
" id="pmission_close_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">&times;</a>
																</div>
															<?php endif; ?>
														</div>
														<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['prod_misson']['product']; ?>
">
														<input type="hidden" name="prod_mission_id_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
">
														<table class="table mission-table">															
															<tr>
																<th style="width:15%">Nb of writers</th>					
																
																<th style="width:19%">Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
																
																				
															</tr>
															<tr>
																<td>
																	<?php if ($this->_tpl_vars['prod_misson']['staff_difference'] == 'yes'): ?>
																		<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" 	data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod_misson']['staff_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> </span>
																	<?php endif; ?>
																	<input type="text" id="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
" name="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span9 validate[required]"  value="<?php echo $this->_tpl_vars['prod_misson']['staff']; ?>
" onkeyup="fnCalculateProdTotal();"/>
																																	</td>
																<td>
																	<?php if ($this->_tpl_vars['prod_misson']['cost_difference'] == 'yes'): ?>
																		<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" 	data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod_misson']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> </span>
																	<?php endif; ?>
																	<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
" name="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span9 validate[required]"  value="<?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fnCalculateProdTotal();"/>
																</td>
															</tr>
														</table>
														<?php if ($this->_tpl_vars['mission']['comments']): ?>
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['created_by']; ?>
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
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['prod_misson']['created_by']; ?>
/logo.jpg" class="media-object">
															</a>
															<div class="media-body">														
																<textarea name="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" placeholder="Insert comment" id="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
" class="span12"><?php echo $this->_tpl_vars['prod_misson']['comments']; ?>
</textarea>
															</div>												
														</div>
													</div>	
												</div>	
												<?php if ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
											
													<div style="padding:10px 8px;display:none" class="showeditother">
														<a class="addOther">Add an "other" cost</a>
													</div>
													</div>
												<?php endif; ?>
												<?php if (($this->_foreach['prod_mission']['iteration'] == $this->_foreach['prod_mission']['total']) && $this->_tpl_vars['other'] == 'true'): ?>
													<div class="displayOther">
													<div class="row-fluid showother" id="prod_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" style="display:none">
													 <div class="mission-details">
														<div class="mission-prod-product"><span id="box_title_3">Other</span>
															<div class="pull-right">												
																<a class="btn close-seo" rel="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="pmission_close_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3">&times;</a>
															</div>
														
														</div>
														<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" value="autre">
														<table class="table mission-table">
															<tr>
																<th style="width:12%">Nb of writers</th>					
															
																<th style="width:19%">Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
																	
															</tr>				
															<tr>
																<td>
																	<input type="text" id="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" name="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="" onkeyup="fnCalculateProdTotal();"/>
																</td>
																<td>
																	<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" name="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span3 validate[required]"  value="" onkeyup="fnCalculateProdTotal();"/>
																</td>
															
															</tr>
															<tr>
																<th colspan="5">Total delivery timing : <span id="total_delivery_time_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3"></span> Days</th>
															</tr>
														</table>
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
															</a>
															<div class="media-body">														
																<textarea name="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" placeholder="Insert comment" id="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" class="span12"></textarea>
															</div>												
														</div>
													</div>	
												</div> 
												<div style="padding:10px 8px" class="showeditother">
													<a class="addOther">Ajouter un co&ucirc;t autre</a>
												</div>
											</div>
												<?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>
										<?php else: ?>
											<?php if ($this->_tpl_vars['mission']['suggested_mission_details'][0]['writing_cost_before_signature']): ?>
												<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1">
													<div class="mission-details">
														<div class="mission-prod-product">
															<span id="box_title_1">
														<?php if ($this->_tpl_vars['mission']['product'] == 'redaction'): ?>
															Writing
														<?php else: ?>
															Translating
														<?php endif; ?>												
														</span></div>
														<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['mission']['product']; ?>
">
														<table class="table mission-table">
															<tr>
																<th style="width:15%">Nb of writers</th>					
																
																<th style="width:19%">Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
																	
															</tr>				
															<tr>
																<td>
																	<input type="text" id="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1" name="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span9 validate[required]"  value="<?php echo $this->_tpl_vars['mission']['suggested_mission_details'][0]['writing_staff']; ?>
" onkeyup="fnCalculateProdTotal();"/>
																																	</td>
																<td>
																	<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1" name="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span3 validate[required]"  value="<?php echo smarty_function_math(array('equation' => '((x/y)*z)','x' => $this->_tpl_vars['mission']['nb_words'],'y' => $this->_tpl_vars['mission']['suggested_mission_details'][0]['article_length'],'z' => $this->_tpl_vars['mission']['suggested_mission_details'][0]['writing_cost_before_signature'],'format' => '%.2f'), $this);?>
" onkeyup="fnCalculateProdTotal();"/>
																</td>
															</tr>
														</table>
														<?php if ($this->_tpl_vars['mission']['comments']): ?>
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['created_by']; ?>
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
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
															</a>
															<div class="media-body">														
																<textarea name="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" placeholder="Insert comment" id="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_1" class="span12"></textarea>
															</div>												
														</div>
													</div>	
												</div>
											<?php endif; ?>	
											<?php if ($this->_tpl_vars['mission']['suggested_mission_details'][0]['correction_cost_before_signature']): ?>
												<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_2">
													<div class="mission-details">
														<div class="mission-prod-product"><span id="box_title_2">Correction</span></div>
														<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" value="proofreading">
														<table class="table mission-table">
															<tr>
																<th style="width:15%">Nb of writers</th>					
															
																<th>Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
															
															</tr>				
															<tr>
																<td>
																	<input type="text" id="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_2" name="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span9 validate[required]"  value="<?php echo $this->_tpl_vars['mission']['suggested_mission_details'][0]['proofreading_staff']; ?>
" onkeyup="fnCalculateProdTotal();"/>
																																	</td>
																<td>
																	<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_2" name="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span3 validate[required]"  value="<?php echo smarty_function_math(array('equation' => '((x/y)*z)','x' => $this->_tpl_vars['mission']['nb_words'],'y' => $this->_tpl_vars['mission']['suggested_mission_details'][0]['article_length'],'z' => $this->_tpl_vars['mission']['suggested_mission_details'][0]['correction_cost_before_signature'],'format' => '%.2f'), $this);?>
" onkeyup="fnCalculateProdTotal();"/>
																</td>
															</tr>
														</table>												
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
															</a>
															<div class="media-body">														
																<textarea name="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" placeholder="Insert comment" id="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_2" class="span12"></textarea>
															</div>												
														</div>
													</div>	
												</div>
											<?php endif; ?>	
											<?php if ($this->_tpl_vars['mission']['suggested_mission_details'][0]['other_cost_before_signature'] == 0 || $this->_tpl_vars['mission']['suggested_mission_details'][0]['other_cost_before_signature'] > 0): ?>
												<div class="displayOther">
												 <div class="row-fluid showother" id="prod_missions_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" <?php if ($this->_tpl_vars['mission']['suggested_mission_details'][0]['other_cost_before_signature'] == 0): ?>style="display:none"<?php endif; ?>>
													 <div class="mission-details">
														<div class="mission-prod-product"><span id="box_title_3">Other</span>
															<div class="pull-right">												
																<a class="btn close-seo" rel="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" id="pmission_close_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3">&times;</a>
															</div>
														
														</div>
														<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" value="autre">
														<table class="table mission-table">
															<tr>
																<th style="width:12%">Nb of writers</th>					
															
																<th>Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
															
															</tr>				
															<tr>
																<td>
																	<input type="text" id="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" name="staff_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="" onkeyup="fnCalculateProdTotal();"/>
																</td>
																<td>
																	<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" name="pmission_cost_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" class="span3 validate[required]"  value="<?php echo smarty_function_math(array('equation' => '((x/y)*z)','x' => $this->_tpl_vars['mission']['nb_words'],'y' => $this->_tpl_vars['mission']['suggested_mission_details'][0]['article_length'],'z' => $this->_tpl_vars['mission']['suggested_mission_details'][0]['other_cost_before_signature'],'format' => '%.2f'), $this);?>
" onkeyup="fnCalculateProdTotal();"/>
																</td>
															</tr>
														</table>
														<div class="media mission-comment">
															<a class="pull-left imgframe">
																<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
															</a>
															<div class="media-body">														
																<textarea name="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]<?php echo $this->_tpl_vars['mission']['identifier']; ?>
[]" placeholder="Insert comment" id="prodcomments_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_3" class="span12"></textarea>
															</div>												
														</div>
													</div>	
												</div> 
												<div <?php if ($this->_tpl_vars['mission']['suggested_mission_details'][0]['other_cost_before_signature'] > 0): ?>style="padding:10px 8px;display:none"<?php endif; ?> class="showeditother" >
													<a class="addOther">Add an "other" cost</a>
												</div>
											</div>
											<?php endif; ?>	
										<?php endif; ?>	
									</div>		
								</div>
							</div>
							<!-- SEO proposals for a mission-->
								<?php if (count($this->_tpl_vars['mission']['seoMissions']) > 0): ?>
								<?php $_from = $this->_tpl_vars['mission']['seoMissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['seo_misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['seo_misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['seo_mission']):
        $this->_foreach['seo_misson']['iteration']++;
?>	
									<?php $this->assign('sms_index', $this->_foreach['misson']['total']+($this->_foreach['seo_misson']['iteration']-1)+1); ?>		
									<div class="row-fluid">	
										<div class="mission-details">
											<div class="prod-mission-product">Mission <?php echo $this->_tpl_vars['sms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <label class="label label-warning">Proposition seo</label>	
												<div class="span6 pull-right">
													<div class="span9">
														<select style="margin-top: -5px;" name="package_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
" id="package_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" class="span12 validate[required]">
															<option value="">Choose your pack</option>
															<option value="lead" <?php if ($this->_tpl_vars['seo_mission']['package'] == 'lead'): ?> selected<?php endif; ?> >Lead</option>
															<option value="team" <?php if ($this->_tpl_vars['seo_mission']['package'] == 'team'): ?> selected<?php endif; ?>>Team</option>
															<option value="link" <?php if ($this->_tpl_vars['seo_mission']['package'] == 'link'): ?> selected<?php endif; ?>>Link</option>
															<option value="user" <?php if ($this->_tpl_vars['seo_mission']['package'] == 'user'): ?> selected<?php endif; ?>>User</option>
														</select>
													</div>	
													<div class="span3">
														<?php if ($this->_tpl_vars['seo_mission']['sales_suggested_missions']): ?>
															<a data-target="#auto_match_missions" role="button" data-toggle="modal"   href="/quote/automatch-mission-popup?quote_id=<?php echo $this->_tpl_vars['seo_mission']['quote_id']; ?>
&mission_id=<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
&suggested_mission=<?php echo $this->_tpl_vars['seo_mission']['sales_suggested_missions']; ?>
&related_to=<?php echo $this->_tpl_vars['seo_mission']['related_to']; ?>
" class="btn" style="margin-top: -5px;">Modifier</a>
														<?php else: ?>
															<a data-target="#auto_match_missions" role="button" data-toggle="modal"   href="/quote/automatch-mission-popup?quote_id=<?php echo $this->_tpl_vars['seo_mission']['quote_id']; ?>
&mission_id=<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
&suggested_mission=<?php echo $this->_tpl_vars['seo_mission']['sales_suggested_missions']; ?>
&related_to=<?php echo $this->_tpl_vars['seo_mission']['related_to']; ?>
" class="btn" style="margin-top: -5px;">Selected auto matched quote</a>
														<?php endif; ?>
													</div>
												
												</div>											
											</div>
											<table class="table mission-table">
												<tr>
													<th style="width:30%">Language</th>
													<th style="width:30%">Product</th>
													<th style="width:20%">Volume</th>
													<th style="width:20%">Nb of words</th>
												</tr>
												<tr class="misson-details-text">
													<td><?php echo $this->_tpl_vars['mission']['language_source_name']; ?>
 <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>><?php echo $this->_tpl_vars['mission']['language_dest_name']; ?>
<?php endif; ?></td>
													<td>
														<select name="product_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" onchange="fnchangeproducttype('<?php echo $this->_tpl_vars['mission']['identifier']; ?>
',this.value);">
															<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['producttype_array'],'selected' => $this->_tpl_vars['mission']['product_type']), $this);?>

														</select>
													</td>
													<td><?php echo $this->_tpl_vars['seo_mission']['volume']; ?>
</td>
													<td><?php echo $this->_tpl_vars['seo_mission']['nb_words']; ?>
</td>
												</tr>	
											</table>
											<div class="row-fluid">
												<div class="mission-details">
													<div class="mission-prod-product">
														<span>Tempo Details</span>
													</div>
													<div class="row-fluid">								
														<label class="span3 moveright">Staffing set up</label>
														<div class="span3">
															<div class="span4">
																<input type="text" id="staff_time_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_1" name="staff_time_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['seo_mission']['staff_time']; ?>
" onkeyup="fnCalculateProdTotal();"/>
															</div>
															<div class="span7">
																<select name="staff_time_option_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" id="staff_time_option_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_1" class="span11" onkeyup="fnCalculateProdTotal();">					
																	<option value="days" <?php if ($this->_tpl_vars['seo_mission']['staff_time_option'] == 'days'): ?> selected <?php endif; ?>>Days</option>
																	<option value="hours" <?php if ($this->_tpl_vars['seo_mission']['staff_time_option'] == 'hours'): ?> selected <?php endif; ?>>Hours</option>
																</select>
															</div>
														</div>	
													</div>
													<?php if ($this->_tpl_vars['seo_mission']['oneshot']): ?>
														<div class="row-fluid">								
															<label class="span3 moveright">One shot</label>
															<div class="span3">
																<strong>
																<?php if ($this->_tpl_vars['seo_mission']['oneshot'] == 'yes'): ?>
																	OUI
																<?php else: ?>
																	NON
																<?php endif; ?>
																</strong>
															</div>
														</div>
													<?php endif; ?>
													<div class="row-fluid">								
														<label class="span3 moveright">Mission Duration</label>
														<div class="span3">
															<div class="span4">
																<input name="mission_length_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" id="mission_length_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
" value="<?php echo $this->_tpl_vars['seo_mission']['mission_length']; ?>
" class="validate[required,custom[number]] span12" type="text">
															</div>
															<div class="span7">											
																<select name="mission_length_option_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" id="mission_length_option_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
" class="span11">
																	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['duration_array'],'selected' => $this->_tpl_vars['seo_mission']['mission_length_option']), $this);?>

																</select>											
															</div>
														</div>
														<?php if ($this->_tpl_vars['seo_mission']['duration_dont_know'] == 'yes'): ?> 															
															<div class="span4" style="margin-left: 0px">
																* Duration not specified by sales																
															</div>
														<?php endif; ?>
													</div>
													<?php if ($this->_tpl_vars['seo_mission']['oneshot'] == 'no'): ?>
														<div class="row-fluid">								
															<label class="span3 moveright">Volume</label><div class="span7" id="tempo_details_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
" <?php if ($this->_tpl_vars['seo_mission']['oneshot'] == 'yes'): ?> style="display:none" <?php endif; ?>>
																<div class="span2">																
																		<input name="volume_max_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" id="volume_max_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
" class="validate[custom[number]] span12" type="text" placeholder="Volume" value="<?php echo $this->_tpl_vars['seo_mission']['volume_max']; ?>
">
																</div>
																<div class="span2">
																	<select name="tempo_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" id="tempo_type_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
" class="span12">
																		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_array'],'selected' => $this->_tpl_vars['seo_mission']['tempo']), $this);?>

																	</select>
																</div>
																<div class="span3">
																	<select name="delivery_volume_option_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" id="delivery_volume_option_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
" class="span12">
																		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['volume_option_array'],'selected' => $this->_tpl_vars['seo_mission']['delivery_volume_option']), $this);?>

																	</select>
																</div>
																<div class="span2">
																	<input type="text" id="tempo_length_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
" name="tempo_length_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" class="validate[required] span12" value="<?php echo $this->_tpl_vars['seo_mission']['tempo_length']; ?>
" />
																</div>
																<div class="span3">
																	<select name="tempo_length_option_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" id="tempo_length_option_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
" class="span12" onchange="fnCalculateTempoRespect('<?php echo $this->_tpl_vars['mission']['identifier']; ?>
');">
																		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_duration_array'],'selected' => $this->_tpl_vars['seo_mission']['tempo_length_option']), $this);?>

																	</select>
																</div>
															</div>
														</div>
													<?php endif; ?>	
												</div>
											</div>
											<?php if (count($this->_tpl_vars['seo_mission']['prod_mission_details']) > 0): ?>
											<?php $this->assign('other', 'true'); ?>
												<?php $_from = $this->_tpl_vars['seo_mission']['prod_mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['prod_misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prod_misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['prod_misson']):
        $this->_foreach['prod_misson']['iteration']++;
?>
													<?php $this->assign('pr_index', ($this->_foreach['prod_misson']['iteration']-1)+1); ?>
													
													<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
">
													<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">
												
														
															<div class="mission-details">
																<div class="mission-prod-product"><span id="box_title_<?php echo $this->_tpl_vars['pr_index']; ?>
">
																<?php if ($this->_tpl_vars['prod_misson']['product'] == 'redaction'): ?>
																	Writing
																<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'translation'): ?>
																	Translating
																<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'proofreading'): ?>
																	Correction 	
																<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
																	Other 		
																	
																<?php endif; ?>
																</span>
																<?php if ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
																<div class="pull-right">												
																	<a class="btn close-seo edit" rel="<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
" id="pmission_close_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">&times;</a>
																</div>
															<?php endif; ?>
																
																</div>
																<input type="hidden" name="prod_mission_id_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['prod_misson']['identifier']; ?>
">
																<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['seo_mission']['product']; ?>
">
																<table class="table mission-table">
																	<tr>
																		<th style="width:12%">Nb of writers</th>					
																	
																		<th>Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
																	
																	</tr>
																	<tr>
																		<td>
																			<input type="text" id="staff_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
" name="staff_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" class="span11 validate[required]"  value="<?php echo $this->_tpl_vars['prod_misson']['staff']; ?>
" onkeyup="fnCalculateProdTotal();"/>
																		</td>
																		<td>
																			<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
" name="pmission_cost_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" class="span3 validate[required]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" onkeyup="fnCalculateProdTotal();"/>
																		</td>
																	</tr>
																</table>
																<?php if ($this->_tpl_vars['seo_mission']['comments']): ?>
																<div class="media mission-comment">
																	<a class="pull-left imgframe">
																		<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['seo_mission']['created_by']; ?>
/logo.jpg" class="media-object">
																	</a>
																	<div class="media-body">
																		<h4 class="media-heading">								
																			<a><?php echo $this->_tpl_vars['seo_mission']['seo_user_name']; ?>
</a> <?php echo $this->_tpl_vars['seo_mission']['comment_time']; ?>

																		</h4>
																		<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['seo_mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
																	</div>
																</div>
																<?php endif; ?>
																<div class="media mission-comment">
																	<a class="pull-left imgframe">
																		<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['prod_misson']['created_by']; ?>
/logo.jpg" class="media-object">
																	</a>
																	<div class="media-body">														
																		<textarea name="prodcomments_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" placeholder="Insert comment" id="prodcomments_<?php echo $this->_tpl_vars['pr_index']; ?>
" class="span12"><?php echo $this->_tpl_vars['prod_misson']['comments']; ?>
</textarea>
																	</div>												
																</div>
																<div class="row-fluid topset2" style="padding:0 10px">	
											
												<?php echo $this->_tpl_vars['mission']['files']; ?>

											
										</div>
															</div>	
														</div>
													</div>	
													
													
												<?php endforeach; endif; unset($_from); ?>	
											<?php else: ?>	
												<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
">
													<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_1">
														<div class="mission-details">
															<div class="mission-prod-product"><span id="box_title_1"><?php echo $this->_tpl_vars['mission']['product_name']; ?>
</span></div>
															<input type="hidden" name="prod_product_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" value="<?php echo $this->_tpl_vars['seo_mission']['product']; ?>
">
															<table class="table mission-table">
																<tr>
																	<th style="width:12%">Nb of writers</th>					
																
																	<th>Cost/<?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
																
																</tr>				
																<tr>
																	<td>
																		<input type="text" id="staff_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_1" name="staff_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" class="span9 validate[required]"  value="<?php echo $this->_tpl_vars['seo_mission']['suggested_mission_details'][0]['writing_staff']; ?>
" onkeyup="fnCalculateProdTotal();"/>
																	</td>
																	<td>
																		<input type="text" id="pmission_cost_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
_1" name="pmission_cost_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" class="span3 validate[required]" <?php if ($this->_tpl_vars['seo_mission']['sales_suggested_missions']): ?>  value="<?php echo smarty_function_math(array('equation' => '((x/y)*z)','x' => $this->_tpl_vars['seo_mission']['nb_words'],'y' => $this->_tpl_vars['seo_mission']['suggested_mission_details'][0]['article_length'],'z' => $this->_tpl_vars['seo_mission']['suggested_mission_details'][0]['writing_cost_before_signature'],'format' => '%.2f'), $this);?>
" <?php endif; ?> onkeyup="fnCalculateProdTotal();"/>
																	</td>
																</tr>
															</table>
															<div class="media mission-comment">
																<a class="pull-left imgframe">
																	<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['seo_mission']['created_by']; ?>
/logo.jpg" class="media-object">
																</a>
																<div class="media-body">
																	<h4 class="media-heading">								
																		<a><?php echo $this->_tpl_vars['seo_mission']['seo_user_name']; ?>
</a> <?php echo $this->_tpl_vars['seo_mission']['comment_time']; ?>

																	</h4>
																	<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['seo_mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
																</div>
															</div>
															<div class="media mission-comment">
																<a class="pull-left imgframe">
																	<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
																</a>
																<div class="media-body">														
																	<textarea name="prodcomments_<?php echo $this->_tpl_vars['seo_mission']['identifier']; ?>
[]" placeholder="Insert comment" id="prodcomments_1" class="span12"></textarea>
																</div>												
															</div>
														</div>	
													</div>
												</div>	
											<?php endif; ?>	
										</div>
									</div>
								<?php endforeach; endif; unset($_from); ?>
								<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>		
						<!--Deleted Missions-->
						<?php if (count($this->_tpl_vars['quote']['deletedMissionVersions']) > 0): ?>
							<?php $_from = $this->_tpl_vars['quote']['deletedMissionVersions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['dmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['dmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['dmission']):
        $this->_foreach['dmission']['iteration']++;
?>	
								<?php $this->assign('sms_index', $this->_foreach['misson']['total']+($this->_foreach['dmission']['iteration']-1)+1); ?>		
								<div class="row-fluid">	
									<div class="mission-details">
										<div class="delete-mission-product"><?php echo $this->_tpl_vars['dmission']['product_name']; ?>
 <label class="label">Mission added</label></div>
										<table class="table mission-table">
											<tr>
												<th style="width:30%">Language</th>
												<th style="width:30%">Product</th>
												<th style="width:20%">Volume</th>
												<th style="width:20%">Nb of words</th>
											</tr>
											<tr class="misson-details-text">
												<td><?php echo $this->_tpl_vars['dmission']['language_source_name']; ?>
 <?php if ($this->_tpl_vars['dmission']['product'] == 'translation'): ?>><?php echo $this->_tpl_vars['dmission']['language_dest_name']; ?>
<?php endif; ?></td>
												<td><?php echo $this->_tpl_vars['dmission']['product_type_name']; ?>
</td>
												<td><?php echo $this->_tpl_vars['dmission']['volume']; ?>
</td>
												<td><?php echo $this->_tpl_vars['dmission']['nb_words']; ?>
</td>
											</tr>	
										</table>
										<?php if (count($this->_tpl_vars['dmission']['prod_mission_details']) > 0): ?>
										<?php $this->assign('other', 'true'); ?>
											<?php $_from = $this->_tpl_vars['dmission']['prod_mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['prod_misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['prod_misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['prod_misson']):
        $this->_foreach['prod_misson']['iteration']++;
?>
												<?php $this->assign('pr_index', ($this->_foreach['prod_misson']['iteration']-1)+1); ?>
												
											<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['dmission']['identifier']; ?>
">
											<div class="row-fluid" id="prod_missions_<?php echo $this->_tpl_vars['dmission']['identifier']; ?>
_<?php echo $this->_tpl_vars['pr_index']; ?>
">
											
													
														<div class="mission-details">
															<div class="mission-prod-product"><span id="box_title_<?php echo $this->_tpl_vars['pr_index']; ?>
">
															<?php if ($this->_tpl_vars['prod_misson']['product'] == 'redaction'): ?>
																Writing
															<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'translation'): ?>
																Translating
															<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'proofreading'): ?>
																Correction 	
															<?php elseif ($this->_tpl_vars['prod_misson']['product'] == 'autre'): ?>
																Other 		
																
															<?php endif; ?>
															</span>															
															
															</div>																
															<table class="table mission-table">
																<tr>
																	<th style="width:15%">Nb of writers</th>					
																	<th style="width:33%">Staff timing</th>														
																	<th style="width:30%">Delivery timing</th>						
																	<th style="width:21%">Cost/<?php echo $this->_tpl_vars['dmission']['product_type_name']; ?>
 (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>														
																</tr>				
																<tr class="misson-details-text">
																	<td><?php echo $this->_tpl_vars['prod_misson']['staff']; ?>
</td>
																	<td><?php echo $this->_tpl_vars['prod_misson']['staff_time']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['staff_time_option'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</td>
																	<td><?php echo $this->_tpl_vars['prod_misson']['delivery_time']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['delivery_option'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</td>
																	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['prod_misson']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</td>
																	
																</tr>
															</table>
															<?php if ($this->_tpl_vars['dmission']['comments']): ?>
															<div class="media mission-comment">
																<a class="pull-left imgframe">
																	<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['dmission']['created_by']; ?>
/logo.jpg" class="media-object">
																</a>
																<div class="media-body">
																	<h4 class="media-heading">								
																		<a><?php echo $this->_tpl_vars['dmission']['seo_user_name']; ?>
</a> <?php echo $this->_tpl_vars['dmission']['comment_time']; ?>

																	</h4>
																	<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['dmission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
																</div>
															</div>
															<?php endif; ?>
															<?php if ($this->_tpl_vars['prod_misson']['comments']): ?>
															<div class="media mission-comment">
																<a class="pull-left imgframe">
																	<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['prod_misson']['created_by']; ?>
/logo.jpg" class="media-object">
																</a>
																<div class="media-body"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prod_misson']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>												
															</div>
															<?php endif; ?>
														</div>	
													</div>
												</div>	
											<?php endforeach; endif; unset($_from); ?>
										<?php endif; ?>	
									</div>
								</div>	
							<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
						</div>						
					</div>
				<?php endif; ?>	
				<?php if ($this->_tpl_vars['quote']['prod_review'] == 'challenged' || $this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
									<?php endif; ?>	
				
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
								<span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote']['sales_comment'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
							</div>
						</div>
						<h2 class="heading">Emails you sent to the client and his answers</h2>
						<textarea rows="10" disabled class="span12"><?php echo $this->_tpl_vars['quote']['client_email_text']; ?>
</textarea>
						<?php if ($this->_tpl_vars['quote']['related_files']): ?>
							<div class="row-fluid">
								<div class="span3">Documents to download:</div>
							</div>
							<div class="row-fluid">
								<div class=""><?php echo $this->_tpl_vars['quote']['related_files']; ?>
</div>
							</div>
						<?php endif; ?>	
						<?php if ($this->_tpl_vars['quote']['client_aims_text']): ?>
							<div class="row-fluid">
								<br>
								<h4>Client needs :</h4>
								<?php echo $this->_tpl_vars['quote']['client_aims_text']; ?>

								<?php if ($this->_tpl_vars['quote']['client_aims_comments']): ?>
									<b>Comments :</b> <?php echo $this->_tpl_vars['quote']['client_aims_comments']; ?>
 <br><br>
								<?php endif; ?>
								<b>Urgent project :</b> 
								<?php if ($this->_tpl_vars['quote']['urgent'] == 'yes'): ?>	
										Yes
									<?php else: ?>
										No
									<?php endif; ?>
								<br>
								<?php if ($this->_tpl_vars['quote']['content_ordered_agency']): ?>
									<b>Has the client ordered content with an other agency ?</b>
									<?php if ($this->_tpl_vars['quote']['content_ordered_agency'] == 'yes'): ?>	
										Yes
									<?php else: ?>
										No
									<?php endif; ?>	
									<br>	
									<?php if ($this->_tpl_vars['quote']['content_ordered_agency'] == 'yes'): ?>
										<b>Agency name </b>
										<?php if ($this->_tpl_vars['quote']['agency_name']): ?>
											<?php echo $this->_tpl_vars['quote']['agency_name']; ?>

										<?php else: ?>
											I don't know
										<?php endif; ?>
										<br><br>
									<?php endif; ?>
								<?php endif; ?>							
								<b>Does the client want to know the writers/translators he's going to work with ?</b> 
									<?php if ($this->_tpl_vars['quote']['client_know_writers'] == 'yes'): ?>	
										Yes
									<?php else: ?>
										No
									<?php endif; ?>
								<br><br>
																
								<b>What is the client's budget this year? :</b>
								<?php if (! $this->_tpl_vars['quote']['budget_marketing']): ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['budget'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['budget_currency'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>

								<?php else: ?>
									I don't know
								<?php endif; ?><br>
							</div>
						<?php endif; ?>	
					</div>	
				</div>	
						
				
				
					<?php if ($this->_tpl_vars['quote']['prod_review'] == 'challenged' || $this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
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
										<div class="mission-tech-product"><?php echo $this->_tpl_vars['mission']['title']; ?>
 <?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?><label class="label label-warning">New</label> <?php endif; ?></span>
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
													<?php if ($this->_tpl_vars['mission']['title_difference'] == 'yes'): ?>
														<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['title_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
													<?php endif; ?>
													<input type="text" name="mission_title[]" id="mission_title_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo $this->_tpl_vars['mission']['title']; ?>
" class="span10 validate[required]" placeholder="enter a mission" disabled>
												</td>
												<td>													
													<div class="span1">																
														<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents" style="top:5px"></i> </span>
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
										<?php if ($this->_tpl_vars['mission']['comments']): ?>
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
										<?php endif; ?>	
										<div class="row-fluid topset2" style="padding:0 10px">	
											
												<?php echo $this->_tpl_vars['mission']['files']; ?>

											
										</div>
									</div>
								</div>
								
							<?php endforeach; endif; unset($_from); ?>
							</div>						
						</div>
						<?php endif; ?>	
					<?php endif; ?>
					<?php if ($this->_tpl_vars['quote']['prod_review'] == 'challenged' || $this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
						<?php if (count($this->_tpl_vars['seoMissionDetails']) > 0): ?>	
						<div class="w-box">
							<div class="w-box-header">SEO mission setup</div>
							<div class="w-box-content  cnt_a">
								<div class="row-fluid" id="seo_missions">
									
									<?php $_from = $this->_tpl_vars['seoMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmisson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmisson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['tmisson']['iteration']++;
?>
									<?php $this->assign('gn_index', ($this->_foreach['tmisson']['iteration']-1)); ?>
									<?php $this->assign('ms_index', ($this->_foreach['tmisson']['iteration']-1)+1); ?>		
									<div class="row-fluid" id="seo_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
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
											</div>
											<table class="table mission-table">
												<tr>
													<th style="width:25%">Type</th>
													<th style="width:25%">Language</th>
													<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="width:30%" <?php else: ?> style="display:none;width:30%"<?php endif; ?>  id="thead_dtime_<?php echo $this->_tpl_vars['ms_index']; ?>
">Delivery time</th>														
													<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="width:20%" <?php else: ?> style="display:none;width:20%"<?php endif; ?> id="thead_cost_<?php echo $this->_tpl_vars['ms_index']; ?>
">Cost (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
													<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;width:35%"<?php else: ?> style="width:35%" <?php endif; ?> id="thead_ptype_<?php echo $this->_tpl_vars['ms_index']; ?>
">Product</th>
													<th <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;width:15%"<?php else: ?> style="width:15%" <?php endif; ?> id="thead_nwords_<?php echo $this->_tpl_vars['ms_index']; ?>
">Nb de mots</th>
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
															<option value="redaction" <?php if ($this->_tpl_vars['mission']['product'] == 'redaction'): ?> selected<?php endif; ?>>Writing</option>
															<option value="translation" <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?> selected<?php endif; ?>>Translating</option>
															<option value="autre" <?php if ($this->_tpl_vars['mission']['product'] == 'autre'): ?> selected<?php endif; ?>>Other</option>
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
" data-html="true"> <i class="splashy-documents" style="top:8px"></i></span>
														<?php endif; ?>
														<div class="span4">
															<input type="text" id="sdelivery_time_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="sdelivery_time[]" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
"/>
														</div>
														<div class="span5">
															<select name="sdelivery_option[]" id="sdelivery_option_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12">					
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
" name="smission_cost[]" class="span10 validate[required]" onkeyup="fnCalculateProdTotal();" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
" disabled />
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
														<?php if ($this->_tpl_vars['mission']['product_type'] == 'autre' && $this->_tpl_vars['mission']['product_type_other'] != ''): ?>
														<span class="moveright product-text"><?php echo $this->_tpl_vars['mission']['product_type_other']; ?>
</span>
														<?php endif; ?>
													</td>
													<td <?php if ($this->_tpl_vars['mission']['product'] == 'seo_audit' || $this->_tpl_vars['mission']['product'] == 'smo_audit'): ?> style="display:none;"<?php endif; ?> id="td_nwords_<?php echo $this->_tpl_vars['ms_index']; ?>
">
														<?php if ($this->_tpl_vars['mission']['nb_words_difference'] == 'yes'): ?>
															<span class="version-change pop_over" data-placement="top" data-original-title="Quote history" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['nb_words_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span> 
														<?php endif; ?>
														
														<input type="text" name="nb_words[]" id="nb_words_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span10 validate[required,custom[number]]" value="<?php echo $this->_tpl_vars['mission']['nb_words']; ?>
" disabled >
													</td>
																											
												</tr>	
											</table>
											<?php if ($this->_tpl_vars['mission']['product'] != 'redaction'): ?>
												<div class="row-fluid" style="margin-left: 15px;">
													<div class="span12">
														<input type="checkbox" class="uni_style"<?php if ($this->_tpl_vars['mission']['before_prod'] == 'yes'): ?> checked <?php endif; ?> disabled
														> To be done before launching prod mission
													</div>	
												</div>
											<?php endif; ?>	
											<?php if ($this->_tpl_vars['mission']['comments']): ?>
											<div class="media mission-comment">
												<a class="pull-left imgframe">
													<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['mission']['created_by']; ?>
/logo.jpg" class="media-object">
												</a>
												<div class="media-body">														
													<h4 class="media-heading">								
													<a><?php echo $this->_tpl_vars['mission']['seo_user_name']; ?>
</a> <?php echo $this->_tpl_vars['mission']['comment_time']; ?>

												</h4>
												<span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
												</div>												
											</div>
											<?php endif; ?>
											
											<div class="row-fluid topset2" style="padding:0 10px">	
												<?php if ($this->_tpl_vars['mission']['product'] == 'redaction' || $this->_tpl_vars['mission']['product'] == 'translation'): ?>
												<div class="span7 pull-right form-inline">
													<span class="span5"><label style="padding-top: 5px;"><b>Lier cette proposition &agrave; : </b></label></span>
													<select name="related_mission[]" id="related_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span7 validate[required]">
															<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['quote']['missions_list'],'selected' => $this->_tpl_vars['mission']['related_to']), $this);?>

													</select>
												</div>
												<?php endif; ?>
											</div>
											<div class="row-fluid">												
													<?php echo $this->_tpl_vars['mission']['files']; ?>
																									
											</div>
										</div>	
									</div>									
									<?php endforeach; endif; unset($_from); ?>									
								</div>								
							</div>
						</div>
						<?php endif; ?>	
					<?php endif; ?>	
					
					<div class="w-box">
					<div class="w-box-header">Editorial information form the client</div>
					<div class="w-box-content  cnt_a">
					<div class="row-fluid">
						<div class="span12">
						<div class="span6">
							<label>
								<span class="error_placement">Do you need to receive elements from the client to launch the mission?</span>
							</label>
						</div>
						<div class="span6">
							<label class="radio inline">
								<input type="radio" class="icheck" name="prod_extra_info" <?php if ($this->_tpl_vars['quote']['prod_extra_info'] == 'yes'): ?>checked='checked'<?php endif; ?> value="yes">
								Yes 
							</label>
							<label class="radio inline">
								<input type="radio" class="icheck" name="prod_extra_info" <?php if ($this->_tpl_vars['quote']['prod_extra_info'] == 'no'): ?>checked='checked'<?php endif; ?> value="no">
								No
							</label>
						</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="control-group extra_comments" style="<?php if ($this->_tpl_vars['quote']['prod_extra_info'] == 'no'): ?>display:none<?php endif; ?>">
							<div class="span12">
								<div class="span2">
								<label for="" class="control-label">Comment:</label>
								</div>
								<div class="span10">
									<textarea name="prod_extra_comments" placeholder="Insert comment" id="" class="span12"><?php echo $this->_tpl_vars['quote']['prod_extra_comments']; ?>
</textarea>
								</div>	
							</div>
						</div>
						</div>
					</div>	
				</div>	
					
						<input type="hidden" name="quote_id" id="quote_id" value="<?php echo $this->_tpl_vars['quote']['identifier']; ?>
">
						<input type="hidden" name="currency" value="<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
">
						<div class="topset2">						
							<div class="row-fluid">
								<div class="span4"></div>
								<div class="span6">
									<?php if ($this->_tpl_vars['quote']['prod_review'] == 'not_done'): ?>
										<button type="submit" name="review_skip" class="btn">Skip</button>							
										<button type="submit" name="review_challenge" class="btn btn-primary">Challenge</button>		
									<?php elseif ($this->_tpl_vars['quote']['prod_review'] == 'challenged' || $this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
										
										<?php if ($this->_tpl_vars['quote']['prod_review'] == 'challenged'): ?>
											<button type="submit" name="review_save" onclick="return removeOther()" class="btn btn-success">Save</button>							
											<button type="submit" name="review_validate" onclick="return removeOther()" class="btn btn-primary">Validate</button>
										<?php elseif ($this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
											<button type="button" id="quote_save" name="review_save" class="btn btn-success">Save</button>
											<button type="button" id="quote_validate" name="review_validate" class="btn btn-primary">Validate</button>
										<?php endif; ?>	
									<?php endif; ?>
								</div>
							</div>
						</div>						
						<!--popup to show quote updated in edit mode-->
						<?php if ($this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
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
											<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
											<button type="submit" name="review_save" onclick="return removeOther()" class="btn btn-success">Save</button>							
											<button type="submit" name="review_validate" onclick="return removeOther()" class="btn btn-primary">Validate</button>
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
									Phone number : <?php echo $this->_tpl_vars['quote']['phone_number']; ?>
<br>
									Email :<a href="mailto:<?php echo $this->_tpl_vars['quote']['email']; ?>
"><?php echo $this->_tpl_vars['quote']['email']; ?>
</a><br><br>
									</p>									
								</div>
							</div>
							<div class="aside-block" id="selected-bouser">
							<input type="hidden" id="sales_suggested_price" name="sales_suggested_price" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['sales_suggested_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
">
								<div class="editor-container">
									<h2 class="heading">Total quote </h2>
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

<!--popup to show after quote created-->
<div class="modal container hide fade" id="auto_match_missions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3><?php echo $this->_tpl_vars['quote']['title']; ?>
</h3>
    </div>
    <div class="modal-body">
	
    </div>
    <div class="modal-footer">
    </div>
</div>

<div class="modal hide fade" id="prod_challenge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Prod - Please precise your deadline</h3>
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
						$("#prod_challenge_form").validationEngine();
						
					});		
					</script>	
					'; ?>

					<form id="prod_challenge_form"  method="POST" action="/quote/save-prod-challenge" >					
						<input type="hidden" name="quote_id" value="<?php echo $_GET['quote_id']; ?>
">
						<div class="formSep control-group">
							<label for="prod_timeline" class="control-label"><b>Due date:</b></label>
							<div class="row-fluid controls">
								<div class="span5">
									<div class="input-append date" id="dp2" data-date-format="dd/mm/yyyy">
										<input class="span10 validate[required]"  name="prod_timeline" id="prod_timeline" type="text" readonly="readonly"  /><span class="add-on"><i class="splashy-calendar_day"></i></span>
									</div>
								</div>	
								<div class="span3">
									<input type="text" name="prod_time" id="tp_2" class="span8" value='<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%H:%M") : smarty_modifier_date_format($_tmp, "%H:%M")); ?>
' >
								</div>	
							</div>
						</div>
						<div class="formSep control-group">
							<label for="prod_comments" class="control-label"><b>Comment:</b></label>
							<div class="row-fluid controls">
								<div class="span2">
									<img width="60px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="media-object">
								</div>	
								<div class="span10">
									<textarea name="prod_comments" placeholder="Insert comment" id="prod_comments" class="span12"></textarea>
								</div>	
							</div>
						</div>
						<div class="formSep control-group">
							<div class="row-fluid controls">
								<div class="span4"></div>
								<div class="span6">
									<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>					
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

<!-- Need more info comments-->
<div class="modal hide fade" id="quote_more_info_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button class="close" data-dismiss="modal" >&times;</button>
		<h3>Need precision</h3>
	</div>
	<div class="modal-body">		
		<form  method="POST" id="more_info_comment_form" action="/quote/need-more-info" enctype="mulitpart/form-data">
		<input type="hidden" name="quote_id" value="<?php echo $_GET['quote_id']; ?>
">
		<input type="hidden" name="team_review" value="prod">
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
								<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
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

<?php echo '
	<script>
		$(".addOther").click(function(){
			$(this).closest(".displayOther").find(".showother").toggle();
			$(this).closest(".showeditother").toggle();
		})
	</script>
'; ?>
