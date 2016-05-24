<?php /* Smarty version 2.6.19, created on 2015-12-14 09:14:11
         compiled from gebo/quote/quote-followup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/quote-followup.phtml', 201, false),array('modifier', 'zero_cut_t', 'gebo/quote/quote-followup.phtml', 233, false),array('modifier', 'htmlentities', 'gebo/quote/quote-followup.phtml', 444, false),array('modifier', 'stripslashes', 'gebo/quote/quote-followup.phtml', 447, false),array('modifier', 'escape', 'gebo/quote/quote-followup.phtml', 507, false),array('modifier', 'upper', 'gebo/quote/quote-followup.phtml', 546, false),array('modifier', 'nl2br', 'gebo/quote/quote-followup.phtml', 667, false),array('modifier', 'ucfirst', 'gebo/quote/quote-followup.phtml', 751, false),array('modifier', 'domain_url', 'gebo/quote/quote-followup.phtml', 826, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/css/timeline.css" type="text/css"/>
<script src="/BO/theme/gebo/js/timeline.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script language="JavaScript" type="text/javascript">
$(document).ready(function() {
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
				if(days >1 )message += days + " days"  +"  ";
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
	

	$("#getturndetails").click(function(){
		$("#turnover-details").toggle();
	});
	
	$("#closequote").validationEngine();
	$("#signquote").validationEngine();
		$(\'textarea\').attr(\'data-prompt-position\',\'topLeft\');
		$(\'textarea\').data(\'promptPosition\',\'topLeft\');
	$(\'#few-details\').on(\'click\',function(){
			
	var sales_final_details=\''; ?>
<?php echo $this->_tpl_vars['sales_final_details']; ?>
<?php echo '\'	;
	var quote_id=\''; ?>
<?php echo $_GET['quote_id']; ?>
<?php echo '\'	;
	if(sales_final_details==\'yes\')
	{
		var target_page=\'/quote/sales-final-validation?ajax=yes&quote_id=\'+quote_id;
		$(\'#sales_final_validate-details\').html("");
		//alert(target_page);
		$.get(target_page,function(data){
			//alert(data);
			$(\'#sales_final_validate-details\').html(data);
		});
	}
	
	});	
});	
</script>
<style type="text/css">
.turnover {
    background: none repeat scroll 0 0 #666666;
    font-size: 25px;
    font-weight: bold;
    padding: 20px;
	color: white;
}
.turnover-more {
    background: none repeat scroll 0 0 #009E0F;
    font-size: 25px;
    font-weight: bold;
    padding: 19px 35px 9px 19px;
	color: white;
}
.turnover-arrow-right {
    border-bottom: 28px solid transparent;
    border-left: 29px solid #009e0f;
    border-top: 30px solid transparent;    
    height: 0;
    width: 0;
}
.margin-percentage {
    color: white;
    float: right;
    font-size: 20px;
    text-align: right;
	font-weight: 100;
}

.timeline-status {
	background-color: #eaecef;
    border-radius: 10px;
    padding: 15px 5px;
    position: relative;
    top: 0;
    z-index: 10;
}

.btn-seo {    
    background-image: linear-gradient(to bottom, #2e6aa2, #073763);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    color: #fff;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.btn-seo:hover, .btn-seo:focus, .btn-seo:active, .btn-seo.active, .btn-seo.disabled, .btn-seo[disabled] {
    background-color: #073763;
    color: #fff;
}


.btn-tech {   
    background-image: linear-gradient(to bottom, #7e64b9, #351c75);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    color: #fff;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.btn-tech:hover, .btn-tech:focus, .btn-tech:active, .btn-tech.active, .btn-tech.disabled, .btn-tech[disabled] {
    background-color: #351c75;
    color: #fff;
}

.btn-prod {   
    background-image: linear-gradient(to bottom, #e09d39, #e09b31);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    color: #fff;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.btn-prod:hover, .btn-prod:focus, .btn-prod:active, .btn-prod.active, .btn-prod.disabled, .btn-prod[disabled] {
    background-color: #e09b31;
    color: #fff;
}
.splashy-documents
{
top:3px;
}


.quote-timer {
    font-size: 20px;
    padding: 10px;
}
.quote-timer .icon-time {    
    position: relative;
    top: 6px;
}
.enretard {
    font-size: 14px;
    font-weight:bold;    
}
.enretard .icon-time {    
    position: relative;
    top: 3px;
}
.challenge
{
   font-size: 15px;    
}
.challenge .icon-time {    
    position: relative;
    top: 2px;
}
.timeline-status .icon-time
{
	top: 3px;
}
.need-more-info{
background:#F2DEDE;
}
</style>
'; ?>

<div class="row-fluid">    
	<div class="span12">	
	<?php if (count($this->_tpl_vars['quoteDetailsFinal']) > 0): ?>
		<?php $_from = $this->_tpl_vars['quoteDetailsFinal']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quote'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quote']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['quote']):
        $this->_foreach['quote']['iteration']++;
?>
			<h1 class="heading topset2"><?php echo $this->_tpl_vars['quote']['title']; ?>
 	
			<span class="pull-right">
				<?php if ($this->_tpl_vars['quote']['sales_review'] == 'validated'): ?>
				<a href="/quote/close-quote-view?qid=<?php echo $this->_tpl_vars['quote']['identifier']; ?>
" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#close_quote" class="closequote"><button  class="btn btn-danger" type="button">Close</button></a>
				<a href="/quote/sign-quote-view?qid=<?php echo $this->_tpl_vars['quote']['identifier']; ?>
" data-toggle="modal" tabindex="-1" role="menuitem" data-target="#sign_quote" class="signquote"><button  class="btn btn-primary" type="button">Sign</button></a>
				<a  class="btn btn-primary" href="/quote/download-quote-xls?quote_id=<?php echo $this->_tpl_vars['quote']['identifier']; ?>
">Download xls</a>
				<?php endif; ?>
				<?php if (( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser' ) && $this->_tpl_vars['quote']['sales_review'] == 'signed' && $this->_tpl_vars['quote']['signed_exist'] == '0'): ?>
				<a class="btn btn-primary" href="/contractmission/create-contract?quote_id=<?php echo $_GET['quote_id']; ?>
">Create contract</a>
				<?php endif; ?>
			</span>
			
			</h1>
			<div class="row-fluid">
				<div class="span12">
					<ul class="nav nav-tabs">
						<li class="active"><a class="" href="#overview" data-toggle="tab">General View</a></li>
						<li><a class="" href="#details" data-toggle="tab"  id="few-details">Details</a></li>						
					</ul>
				</div>
			</div>
			
			<div class="row-fluid">
				<div class="span9">	
					<div class="tab-content">
						<div class="tab-pane fade in active" id="overview">
							<div  class="w-box">
								<div class="w-box-header">Total turnover</div>
								<div class="w-box-content   cnt_a">
									<div class="row-fluid">
										<div class="span4 turnover"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['sales_suggested_price'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</div>
										<div class="span5 turnover-more" style="margin-left:0px">
											<span class="span9"><?php echo ((is_array($_tmp=$this->_tpl_vars['total_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</span>
											<span class="span3 margin-percentage">(<?php echo ((is_array($_tmp=$this->_tpl_vars['precentage_change'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
%)</span>
										</div>
										<div class="span1 turnover-arrow-right" style="margin-left:0px"></div>
									</div>
									<div class="row-fluid">
										<div class="sapn12"><a class="btn btn-small" id="getturndetails">Details</a></div>
									</div>
									<div class="row-fluid" id="turnover-details" style="display:none">
										<div class="span10">
											<table class="table table-striped">
												<tr>
													<td><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
  challanged the quote :</td>
													<td><?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['sales_suggested_price'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; (<?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['sales_margin_percentage'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
% de marge)</td>
												</tr>
												<?php if ($this->_tpl_vars['seo_user']): ?>
												<tr>
													<td><?php echo $this->_tpl_vars['seo_user']; ?>
 challanged the quote :</td>
													<td><?php echo ((is_array($_tmp=$this->_tpl_vars['seo_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; (60% de marge)</td>
												</tr>
												<?php endif; ?>
												<?php if ($this->_tpl_vars['tech_user']): ?>
												<tr>
													<td><?php echo $this->_tpl_vars['tech_user']; ?>
 challanged the quote :</td>
													<td><?php echo ((is_array($_tmp=$this->_tpl_vars['tech_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; (60% de marge)</td>
												</tr>
												<?php endif; ?>
												<?php if ($this->_tpl_vars['prod_user']): ?>
												<tr>
													<td><?php echo $this->_tpl_vars['prod_user']; ?>
 challanged the quote :</td>
													<td><?php echo ((is_array($_tmp=$this->_tpl_vars['prod_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; (<?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['sales_margin_percentage'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
% de marge)</td>
												</tr>
												<?php endif; ?>
												<?php if ($this->_tpl_vars['quote']['sales_review'] == 'validated'): ?>
												<tr>
													<td><?php echo $this->_tpl_vars['quote']['quote_user_name']; ?>
 a validated quote :</td>
													<td><?php echo ((is_array($_tmp=$this->_tpl_vars['total_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
; (<?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['final_margin'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
% de marge)</td>
												</tr>
												<?php endif; ?>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div  class="w-box">
								<div class="w-box-header">Timeline</div>
								<div class="w-box-content   cnt_a">
									<div class="row-fluid">
										<div class="span12 alert">
										<?php if ($this->_tpl_vars['quote']['sales_review'] == 'to_be_approve'): ?>	
											<div class="span12">
												<h3>To be validated by the sales</h3>
											</div>
										
										<?php elseif ($this->_tpl_vars['quote']['tec_review'] == 'challenged' || $this->_tpl_vars['quote']['seo_review'] == 'challenged'): ?>
											<div class="span12">
												<h3>Seo or tech challenge v<?php echo $this->_tpl_vars['quote']['version']; ?>
 –
												<?php if ($this->_tpl_vars['quote']['tech_challenge_time'] && $this->_tpl_vars['quote']['tec_review'] == 'challenged'): ?>
												 <span id="time_techchallenge_<?php echo $this->_tpl_vars['quote']['tech_challenge_time']; ?>
" class="quote-timer challenge">
														<i class="icon-time"></i> <span id="text_techchallenge_<?php echo $this->_tpl_vars['quote']['tech_challenge_time']; ?>
"></span>
													</span>
													<?php if ($this->_tpl_vars['quote']['tech_challenge_time'] < time()): ?><label class="label label-important">Delay</label><?php endif; ?> tech
												<?php endif; ?>
												<?php if ($this->_tpl_vars['quote']['tech_challenge_time'] && $this->_tpl_vars['quote']['tec_review'] == 'challenged' && $this->_tpl_vars['quote']['seo_challenge_time'] && $this->_tpl_vars['quote']['seo_review'] == 'challenged'): ?>+ <?php endif; ?>
												<?php if ($this->_tpl_vars['quote']['seo_challenge_time'] && $this->_tpl_vars['quote']['seo_review'] == 'challenged'): ?>
													<span id="time_seochallenge_<?php echo $this->_tpl_vars['quote']['seo_challenge_time']; ?>
" class="quote-timer challenge">
														<i class="icon-time"></i> <span id="text_seochallenge_<?php echo $this->_tpl_vars['quote']['seo_challenge_time']; ?>
"></span>
													</span>
													<?php if ($this->_tpl_vars['quote']['seo_challenge_time'] < time()): ?><label class="label label-warning">Delay</label><?php endif; ?> seo
												<?php endif; ?>
												</h3>
											</div>	
											<?php if ($this->_tpl_vars['quote']['prod_review'] == 'challenged'): ?>
												<div class="row-fluid">	
													<div class="span8">
														<h3>Prod is working on the quote v<?php echo $this->_tpl_vars['quote']['version']; ?>
</h3>
													</div>
													<div class="span4">	
														<?php if ($this->_tpl_vars['quote']['prod_timeline'] > time()): ?>
															<span id="time_prodchallenge<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['prod_timeline']; ?>
" class="quote-timer">
																<i class="icon-time"></i> <span id="text_prodchallenge<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['prod_timeline']; ?>
"></span>
															</span>
														<?php endif; ?>
													</div>
												</div>	
											<?php endif; ?>
										<?php elseif ($this->_tpl_vars['quote']['tec_review'] == 'not_done' || $this->_tpl_vars['quote']['seo_review'] == 'not_done'): ?>
											<div class="span8">
												<h3>Quote v<?php echo $this->_tpl_vars['quote']['version']; ?>
 - Waiting for answer <?php if ($this->_tpl_vars['quote']['tec_review'] == 'not_done'): ?>tech<?php endif; ?>
												<?php if ($this->_tpl_vars['quote']['tec_review'] == 'not_done' && $this->_tpl_vars['quote']['seo_review'] == 'not_done'): ?>
												and 
												<?php endif; ?>
												<?php if ($this->_tpl_vars['quote']['seo_review'] == 'not_done'): ?> seo<?php endif; ?> answer </h3>
											</div>
											<div class="span4">	
												<?php if ($this->_tpl_vars['quote']['response_time'] > time()): ?>
													<span id="time_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['response_time']; ?>
" class="quote-timer">
														<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['response_time']; ?>
"></span>
													</span>
												<?php endif; ?>
											</div>	
											<?php if ($this->_tpl_vars['quote']['prod_review'] == 'challenged'): ?>
												<div class="row-fluid">	
													<div class="span8">
														<h3>Prod is working on the quote v<?php echo $this->_tpl_vars['quote']['version']; ?>
</h3>
													</div>
													<div class="span4">	
														<?php if ($this->_tpl_vars['quote']['prod_timeline'] > time()): ?>
															<span id="time_prodchallenge<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['prod_timeline']; ?>
" class="quote-timer">
																<i class="icon-time"></i> <span id="text_prodchallenge<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['prod_timeline']; ?>
"></span>
															</span>
														<?php endif; ?>
													</div>
												</div>	
											<?php endif; ?>
										<?php elseif (( $this->_tpl_vars['quote']['seo_review'] == 'skipped' || $this->_tpl_vars['quote']['seo_review'] == 'auto_skipped' || $this->_tpl_vars['quote']['seo_review'] == 'validated' ) && ( $this->_tpl_vars['quote']['tec_review'] == 'skipped' || $this->_tpl_vars['quote']['tec_review'] == 'auto_skipped' || $this->_tpl_vars['quote']['tec_review'] == 'validated' ) && ( $this->_tpl_vars['quote']['prod_review'] == 'not_done' || $this->_tpl_vars['quote']['prod_review'] == 'challenged' )): ?>
											<div class="span8">
												<h3>Prod is working on the quote v<?php echo $this->_tpl_vars['quote']['version']; ?>
</h3>
											</div>
											<div class="span4">	
												<?php if ($this->_tpl_vars['quote']['prod_timeline'] > time()): ?>
													<span id="time_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['prod_timeline']; ?>
" class="quote-timer">
														<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['prod_timeline']; ?>
"></span>
													</span>
												<?php endif; ?>
											</div>											
										<?php elseif (( $this->_tpl_vars['quote']['prod_review'] == 'auto_skipped' || $this->_tpl_vars['quote']['prod_review'] == 'skipped' || $this->_tpl_vars['quote']['prod_review'] == 'validated' ) && ( $this->_tpl_vars['quote']['sales_review'] != 'validated' && $this->_tpl_vars['quote']['sales_review'] != 'closed' && $this->_tpl_vars['quote']['sales_review'] != 'signed' )): ?>
											<div class="span5">
												<h3>Quote is ready to be validated by sales</h3>
												
											</div>
											<div class="span4">
												<?php if (time() < $this->_tpl_vars['quote']['sales_validation_expires']): ?>
												<span id="time_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['sales_validation_expires']; ?>
" class="quote-timer">
													<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['sales_validation_expires']; ?>
"></span>
												</span>
												<?php else: ?>
												
														<span id="time_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['sales_validation_expires']; ?>
" class="enretard">
															En retard : <i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['sales_validation_expires']; ?>
"></span>
															</span>
												
												<?php endif; ?>
											</div>
											<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'ceouser'): ?>
												<div class="span3">
													<a class="finish btn btn-primary" href="/quote/sales-final-validation?quote_id=<?php echo $this->_tpl_vars['quote']['identifier']; ?>
">
													Voir le devis final
													</a>
												</div>
											<?php endif; ?>	
										<?php elseif ($this->_tpl_vars['quote']['sales_review'] == 'validated'): ?>
											<div class="row-fluid">
												<div class="span8">
													<h3> <i class="icon-ok icon-black"></i> Quote validate by sales</h3>
												</div>
												<div class="span4">
													<a class="btn btn-primary pull-right" id="sales_followup" data-target="#sales_final_modal" role="button" data-toggle="modal" href="/quote/sales-final-validation?ajax=yes&quote_id=<?php echo $this->_tpl_vars['quote']['identifier']; ?>
">View details</a>
												</div>	
											</div>	
											<div class="row-fluid">	
												<div class="span6">
													<h3>Quote will be considered as closed in</h3>
												</div>	
												<div class="span4">
													<span id="time_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['sign_expire_timeline']; ?>
" class="quote-timer">
														<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['quote']['sign_expire_timeline']; ?>
"></span>
													</span>
												</div>
											</div>	
										<?php elseif ($this->_tpl_vars['quote']['sales_review'] == 'closed'): ?>
											<div class="span12">	
												<h3> <i class="icon-ok icon-black"></i> Quote closed by sales</h3>
											</div>	
										<?php elseif ($this->_tpl_vars['quote']['sales_review'] == 'signed'): ?>
											<div class="span12">	
												<h3> <i class="icon-ok icon-black"></i> Quote signed by sales</h3>
											</div>	
										<?php endif; ?>
										</div>
									</div>
									<div class="row-fluid">
										<?php if (count($this->_tpl_vars['log_details']) > 0): ?>										
										<div class="timeline animated">
										<?php $_from = $this->_tpl_vars['log_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['log'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['log']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['log']):
        $this->_foreach['log']['iteration']++;
?>
										<div class="timeline-row">											
											<div class="timeline-icon">
											  <div class="bg-primary">
												<i class="fa fa-pencil"></i>
											  </div>
											</div>
											<div class="panel timeline-content">
												<div class="panel-body <?php if ($this->_tpl_vars['log']['action'] == 'tech_need_more_info' || $this->_tpl_vars['log']['action'] == 'seo_need_more_info' || $this->_tpl_vars['log']['action'] == 'prod_need_more_info'): ?> need-more-info<?php endif; ?>" >
													<?php if ($this->_tpl_vars['log']['action'] == 'seo_validated_delay' || $this->_tpl_vars['log']['action'] == 'tech_validated_delay' || $this->_tpl_vars['log']['action'] == 'prod_validated_delay'): ?>
														<label class="timeline-delay label label-warning">Delay</label>
													<?php endif; ?>	
													<div class="row-fluid">														
														<div class="span2">															
																<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['log']['user_id']; ?>
/logo.jpg" style="width:60px">
														</div>
														<div class="span10">	
															<h2><?php echo $this->_tpl_vars['log']['action_sentence']; ?>
</h2>
															<small><?php echo $this->_tpl_vars['log']['time_ago']; ?>
</small>
														</div>															
													</div>													
													<div class="row-fluid">
														<p>
															<?php if ($this->_tpl_vars['log']['action'] == 'sales_closed' || $this->_tpl_vars['log']['action'] == 'sales_cron_closed'): ?>
																<?php if ($this->_tpl_vars['closedreason']): ?>
																<a  <?php if ($this->_tpl_vars['log']['comments']): ?> class="pop_over" data-placement="right" data-content="<?php echo ((is_array($_tmp=$this->_tpl_vars['log']['comments'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>
"
																<?php endif; ?>> <?php echo $this->_tpl_vars['closedreason']; ?>
 </a>
																<?php elseif ($this->_tpl_vars['log']['comments']): ?>
																	<i class="splashy-comment"></i> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['log']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>
 <br>
																<?php endif; ?>
															<?php elseif ($this->_tpl_vars['log']['comments']): ?>
																<i class="splashy-comment"></i> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['log']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>
 <br>
																  <?php echo $this->_tpl_vars['log']['sales_file']; ?>

															<?php endif; ?>
															<?php if (( $this->_tpl_vars['log']['action'] == 'seo_validated_delay' || $this->_tpl_vars['log']['action'] == 'seo_validated_ontime' ) && ( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'seomanager' )): ?>
																<a class="btn btn-default pull-right" id="seo_followup" data-target="#seo_followup_modal" role="button" data-toggle="modal" href="/quote/mission-followup-details?type=seo&version=<?php echo $this->_tpl_vars['log']['version']; ?>
&quote_id=<?php echo $this->_tpl_vars['log']['quote_id']; ?>
">View details</a>
															<?php elseif (( $this->_tpl_vars['log']['action'] == 'tech_validated_delay' || $this->_tpl_vars['log']['action'] == 'tech_validated_ontime' ) && ( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'techuser' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'techmanager' )): ?>
																<a class="btn btn-default pull-right" id="tech_followup" data-target="#tech_followup_modal" role="button" data-toggle="modal" href="/quote/mission-followup-details?type=tech&version=<?php echo $this->_tpl_vars['log']['version']; ?>
&quote_id=<?php echo $this->_tpl_vars['log']['quote_id']; ?>
">View details</a>	
															<?php elseif (( $this->_tpl_vars['log']['action'] == 'prod_validated_delay' || $this->_tpl_vars['log']['action'] == 'prod_validated_ontime' ) && ( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'produser' || $this->_tpl_vars['user_type'] == 'ceouser' || $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' )): ?>
																<a class="btn btn-default pull-right" id="prod_followup" data-target="#prod_followup_modal" role="button" data-toggle="modal" href="/quote/mission-followup-details?type=prod&version=<?php echo $this->_tpl_vars['log']['version']; ?>
&quote_id=<?php echo $this->_tpl_vars['log']['quote_id']; ?>
">View details</a>
															<?php endif; ?>	
														</p>
													</div>
													
												</div>
											</div>
										 </div>										
										<?php endforeach; endif; unset($_from); ?>										
										</div>
										<?php endif; ?>
									</div>
								</div>
							</div>	
						</div>
						<div class="tab-pane fade" id="details">
							<?php if ($this->_tpl_vars['quote']['sales_review'] == 'validated' || $this->_tpl_vars['quote']['sales_review'] == 'signed'): ?>
								<div class="row-fluid" id="sales_final_validate-details"></div>
								
							<?php elseif ($this->_tpl_vars['quote']['prod_review'] == 'validated'): ?>
								<?php echo $this->_tpl_vars['prod_view_details']; ?>

							<?php else: ?>
								<?php if ($this->_tpl_vars['quote']['quote_type'] == 'normal' || $this->_tpl_vars['quote']['quote_type'] == 'only_seo'): ?>
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
													<?php if (count($this->_tpl_vars['mission']['previousMissionDetails']) == 0 && $this->_tpl_vars['quote']['version'] > 1): ?>
														<div class="new-mission-product">Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <label class="label label-warning">Mission added</label></div>
													<?php else: ?>
														<div class="prod-mission-product"> Mission <?php echo $this->_tpl_vars['ms_index']; ?>
 : <?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <?php if ($this->_tpl_vars['mission']['misson_user_type'] == 'seo'): ?><label class="label label-warning">SEO proposal</label><?php endif; ?></div>
													<?php endif; ?>	
													
													<input name="mission_type_<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" type="hidden" value="<?php echo $this->_tpl_vars['mission']['product']; ?>
">
													<table class="table">
														<tr>
															<th>Language</th>
															<th>Product</th>
															<th>Volume</th>
															<th>Delivery timing</th>
															<th>Selling price</th>
															<?php if ($this->_tpl_vars['quote']['quote_type'] == 'normal'): ?>
																<th>Nb of words</th>
															<?php endif; ?>
														</tr>
														<tr class="misson-details-text">
															<td>
																<?php if ($this->_tpl_vars['mission']['language_difference'] == 'yes'): ?>
																	<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['language_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
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
																	<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['product_type_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
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
																	<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['volume_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i>
																<?php endif; ?>
																	<?php echo $this->_tpl_vars['mission']['volume']; ?>

																<?php if ($this->_tpl_vars['mission']['volume_difference'] == 'yes'): ?>
																	</span>
																<?php endif; ?>	
																	
															</td>
															<td>
															
																<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>
																	<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
																<?php endif; ?>
																	<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['mission_length_option'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>

																<?php if ($this->_tpl_vars['mission']['mission_length_difference'] == 'yes'): ?>
																	</span>
																<?php endif; ?>
															</td>
															<td>
																<?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>
																	<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
																<?php endif; ?>
																	<?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['unit_price'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;
																<?php if ($this->_tpl_vars['mission']['unit_price_difference'] == 'yes'): ?>
																	</span>
																<?php endif; ?>	
															</td>
															<?php if ($this->_tpl_vars['quote']['quote_type'] == 'normal'): ?>
																<td>
																	<?php if ($this->_tpl_vars['mission']['nb_words_difference'] == 'yes'): ?>
																		<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['mission']['nb_words_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> 
																	<?php endif; ?>
																		<?php echo $this->_tpl_vars['mission']['nb_words']; ?>

																	<?php if ($this->_tpl_vars['mission']['nb_words_difference'] == 'yes'): ?>
																		</span>
																	<?php endif; ?>
																</td>
															<?php endif; ?>
														</tr>	
													</table>
												</div>	
											</div>
										<?php endforeach; endif; unset($_from); ?>
									<?php endif; ?>
								<?php elseif ($this->_tpl_vars['quote']['quote_type'] == 'only_tech'): ?>
									<?php if (count($this->_tpl_vars['quote']['techMissionDetails']) > 0): ?>
										<?php $_from = $this->_tpl_vars['quote']['techMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmission'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmission']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmission']):
        $this->_foreach['tmission']['iteration']++;
?>
											<div class="row-fluid">	
												<div class="mission-details">										
													<div class="mission-tech-product">
														<span><?php echo $this->_tpl_vars['tmission']['title']; ?>
</span>
													</div>
													<table class="table mission-table">
														<tr>
															<th style="width:33%">Mission</th>
															<th style="width:33%">Delviery timing</th>
															<th style="width:33">Cost (&<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;)</th>
														</tr>
														<tr class="misson-details-text">
															<td>
																<?php if ($this->_tpl_vars['tmission']['title_difference'] == 'yes'): ?>
																	<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['title_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
																<?php endif; ?>
																<?php echo $this->_tpl_vars['tmission']['title']; ?>

															</td>
															<td>
																<?php if ($this->_tpl_vars['tmission']['mission_length_difference'] == 'yes'): ?>
																	<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['mission_length_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i> </span>
																<?php endif; ?>
																<?php echo $this->_tpl_vars['tmission']['delivery_time']; ?>

																<?php if ($this->_tpl_vars['tmission']['delivery_option'] == 'days'): ?>Days<?php endif; ?>
																<?php if ($this->_tpl_vars['tmission']['delivery_option'] == 'hours'): ?>Hours<?php endif; ?>
															</td>
															<td>
																<?php if ($this->_tpl_vars['tmission']['cost_difference'] == 'yes'): ?>
																	<span class="version-change pop_over" data-placement="top" data-original-title="Historique devis" data-content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tmission']['price_versions'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" data-html="true"> <i class="splashy-documents"></i></span>
																<?php endif; ?>
																<?php echo ((is_array($_tmp=$this->_tpl_vars['tmission']['cost'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>

															</td>
														</tr>	
													</table>			
												</div>
											</div>
										<?php endforeach; endif; unset($_from); ?>
									<?php endif; ?>
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
											
											<table class="table">
												<tr>
													<th>Language</th>
													<th>Product</th>
													<th>Volume</th>
													<th>Delivery timing</th>
													<th>Selling price</th>
													<th>Nb of words</th>
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
 <?php if ($this->_tpl_vars['dmission']['product_type'] == 'autre'): ?><br/>(<?php echo $this->_tpl_vars['dmission']['product_type_other']; ?>
)<?php endif; ?>
													<?php else: ?>
														<?php echo $this->_tpl_vars['dmission']['product_name']; ?>

													<?php endif; ?>												
												</td>
												<td><?php echo $this->_tpl_vars['dmission']['volume']; ?>
</td>		
												<td><?php echo $this->_tpl_vars['dmission']['mission_length']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['mission_length_option'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</td>
												<td><?php echo ((is_array($_tmp=$this->_tpl_vars['dmission']['unit_price'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['quote']['sales_suggested_currency']; ?>
;</td>
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
								<div class="row-fluid">
									<div class="w-box">
										<div class="w-box-header">General comments</div>
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
											<hr>
											<h3 class="heading">The emails you sent to client and his answers</h3>
											<textarea rows="10" disabled class="span12"><?php echo $this->_tpl_vars['quote']['client_email_text']; ?>
</textarea>
											<div class="row-fluid">
												<div class="span3">Documents to download :</div>
											</div>
											<div class="row-fluid">
												<div class=""><?php echo $this->_tpl_vars['quote']['related_files']; ?>
</div>
											</div>
											<?php if ($this->_tpl_vars['quote']['client_aims_text']): ?>
												<div class="row-fluid">
													<br>
													<h4>Client needs :</h4>
													<?php echo $this->_tpl_vars['quote']['client_aims_text']; ?>

													<?php if ($this->_tpl_vars['quote']['client_aims_comments']): ?>
														<b>Comment :</b> <?php echo $this->_tpl_vars['quote']['client_aims_comments']; ?>
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
															<b>Agency name ? </b>
															<?php if ($this->_tpl_vars['quote']['agency_name']): ?>
																<?php echo $this->_tpl_vars['quote']['agency_name']; ?>

															<?php else: ?>
																I don't know
															<?php endif; ?>
															<br><br>
														<?php endif; ?>
													<?php endif; ?>							
													<b>Does the client want to know the writers/translators he's going to work with?</b> 
														<?php if ($this->_tpl_vars['quote']['client_know_writers'] == 'yes'): ?>	
															Yes
														<?php else: ?>
															No
														<?php endif; ?>
													<br><br>
													
																										
													<b>What is the client's budget this year :</b>
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
								</div>	
							<?php endif; ?>
						</div>
					</div>	
				</div>
				<div class="span3">
					<aside>
						<div class="aside-bg">	
							<div class="aside-block" id="selected-missions">
								<div class="editor-container">
									<h2 class="heading">Quote end date</h2>
									<div class="row-fluid">
										<span id="time_delivery<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['delivery_count_down']; ?>
" class="quote-timer">
											<i class="icon-time"></i> <span id="text_delivery<?php echo $this->_tpl_vars['quote']['identifier']; ?>
_<?php echo $this->_tpl_vars['delivery_count_down']; ?>
"></span>
										</span>
									</div>
								</div>	
							</div>		
							<div class="aside-block" id="selected-missions">
								<div class="editor-container">
									<h2 class="heading">Quote elements</h2>
									<?php if ($this->_tpl_vars['quote']['quote_type'] == 'normal' || $this->_tpl_vars['quote']['quote_type'] == 'only_seo'): ?>
										<?php if (count($this->_tpl_vars['quote']['mission_details']) > 0): ?>
											<?php $_from = $this->_tpl_vars['quote']['mission_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>
											<?php $this->assign('gn_index', ($this->_foreach['misson']['iteration']-1)); ?>
											<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>	
												<div class="row-fluid">
													<div class="span3"><i class="splashy-document_letter"></i></div>
													<div class="span8">
														<p class="editor-info" style="text-align:left;margin-top:0px">
															MISSION <?php echo $this->_tpl_vars['ms_index']; ?>
 <?php if ($this->_tpl_vars['mission']['misson_user_type'] == 'seo'): ?><label class="label label-warning">SEO</label><?php endif; ?> <br>
															<?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?>
																<?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 <?php echo $this->_tpl_vars['mission']['language_source_name']; ?>
 > <?php echo $this->_tpl_vars['mission']['language_dest_name']; ?>

															<?php else: ?>
																<?php echo $this->_tpl_vars['mission']['product_name']; ?>
 <?php echo $this->_tpl_vars['mission']['product_type_name']; ?>
 en <?php echo $this->_tpl_vars['mission']['language_source_name']; ?>

															<?php endif; ?>
														</p>
													</div>
												</div>
											<?php endforeach; endif; unset($_from); ?>
										<?php endif; ?>
									<?php elseif ($this->_tpl_vars['quote']['quote_type'] == 'only_tech'): ?>
										<?php if (count($this->_tpl_vars['quote']['techMissionDetails']) > 0): ?>
											<?php $_from = $this->_tpl_vars['quote']['techMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tmisson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tmisson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tmission']):
        $this->_foreach['tmisson']['iteration']++;
?>
												<div class="row-fluid">
													<div class="span3"><i class="splashy-document_letter"></i></div>
													<div class="span8">
														<p class="editor-info" style="text-align:left;margin-top:0px">
															<?php echo $this->_tpl_vars['tmission']['title']; ?>
 <label class="label label-warning">TECH</label>
														</p>	
													</div>
												</div>	
											<?php endforeach; endif; unset($_from); ?>
										<?php endif; ?>
									<?php endif; ?>	
								</div>
							</div>
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
									Email : <a href="mailto:<?php echo $this->_tpl_vars['quote']['email']; ?>
"><?php echo $this->_tpl_vars['quote']['email']; ?>
</a><br><br>
									</p>									
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

<!--popup to show seo mission details-->
<div class="modal fullscreen hide fade" id="seo_followup_modal">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Challenge seo</h3>
    </div>
    <div class="modal-body">
	
	</div>
    <div class="modal-footer">
    </div>
</div>
<!--popup to show tech mission details-->
<div class="modal fullscreen hide fade" id="tech_followup_modal">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Challenge tech</h3>
    </div>
    <div class="modal-body">
	
	</div>
    <div class="modal-footer">
    </div>
</div>

<!--popup to show prod mission details-->
<div class="modal fullscreen hide fade" id="prod_followup_modal">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Challenge &eacute;dito</h3>
    </div>
    <div class="modal-body">
	
	</div>
    <div class="modal-footer">
    </div>
</div>	

<!--popup to show sales final mission details-->
<div class="modal fullscreen hide fade" id="sales_final_modal">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Final quote</h3>
    </div>
    <div class="modal-body">
	
	</div>
    <div class="modal-footer">
    </div>
</div>


<?php echo '
<script>
	$(document).on("click",".closequote",function(){
	
		$("#close_quote").modal(\'show\');
		$("#close_quote").removeClass( "hide" ).addClass("in");
	})
	
	$(document).on("click",".signquote",function(){
		$("#sign_quote").modal(\'show\');
		$("#sign_quote").removeClass( "hide" ).addClass("in");
	})
</script>
'; ?>

<div class="modal hide fade" id="close_quote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Close quote</h3>
    </div>
    <div class="modal-body">
		
    </div>
    <div class="modal-footer">
    </div>
</div>

<!-- To Sign Quote -->
<div class="modal hide fade" id="sign_quote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Sign quote</h3>
    </div>
    <div class="modal-body">
		
    </div>
    <div class="modal-footer">
    </div>
</div>