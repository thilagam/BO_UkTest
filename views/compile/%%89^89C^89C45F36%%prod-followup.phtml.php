<?php /* Smarty version 2.6.19, created on 2016-04-13 09:50:49
         compiled from gebo/followup/prod-followup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut_t', 'gebo/followup/prod-followup.phtml', 258, false),array('modifier', 'count', 'gebo/followup/prod-followup.phtml', 338, false),array('modifier', 'time_ago', 'gebo/followup/prod-followup.phtml', 370, false),array('modifier', 'stripslashes', 'gebo/followup/prod-followup.phtml', 373, false),array('modifier', 'strip_tags', 'gebo/followup/prod-followup.phtml', 373, false),array('modifier', 'nl2br', 'gebo/followup/prod-followup.phtml', 373, false),array('modifier', 'date_format', 'gebo/followup/prod-followup.phtml', 424, false),array('function', 'math', 'gebo/followup/prod-followup.phtml', 625, false),)), $this); ?>
<?php echo '
<link href="/BO/theme/gebo/css/mission-followup.css" rel="stylesheet" />
<script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>

<link href="/BO/theme/gebo/css/jquery.bxslider.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.bxslider.min.js" type="text/javascript" charset="utf-8"></script>

<style>
	.time1
	{
		padding-bottom:0px;
		padding-top:0px;
	}
	
	td .icon-time
	{
		top:1px;
	}

	.alert
	{
		padding:5px 10px;
	}
	
	.pointer
	{
		cursor: pointer;
		display:none;
	}
	
	.mouseover
	{
		background-color:#f5f5f5;
		padding:15px;
	}
	
	.rightcontent
	{
		background-color:#114dbd;
		padding:0 6px;
		border-radius: 5px;
		color:#fff;
	}
	
	.deletetask
	{
		cursor:pointer;
	}
	
	.otherdetails .image
	{
		margin: 0 5px ;
	}
	h3 .content
	{
		font-weight: normal;
		font-size: 12px;
	}
</style>
<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script>
<!-- custom scrollbar plugin -->
<link rel="stylesheet" href="/BO/theme/gebo/lib/scrollbar/jquery.mCustomScrollbar.css">
<script src="/BO/theme/gebo/lib/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<script>
var cmid='; ?>
"<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
"<?php echo ';
var cid='; ?>
"<?php echo $this->_tpl_vars['viewarray']['cid']; ?>
"<?php echo ';
var qmid='; ?>
"<?php echo $this->_tpl_vars['viewarray']['qmid']; ?>
"<?php echo ';
var assigned_to='; ?>
"<?php echo $this->_tpl_vars['viewarray']['assigned']; ?>
"<?php echo ';
var to_date='; ?>
"<?php echo $this->_tpl_vars['viewarray']['to_date']; ?>
"<?php echo ';
var title='; ?>
"<?php echo $this->_tpl_vars['viewarray']['title']; ?>
"<?php echo ';
var quote_id='; ?>
"<?php echo $this->_tpl_vars['quote_details']['identifier']; ?>
"<?php echo ';
var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
$(document).ready(function(){
	$("#deliverysort").chosen({ allow_single_deselect:false,disable_search: true });
	////////////to show the timer in selection profile page///////
    var js_date=(new Date().getTime())/ 1000;
    var diff_date=Math.floor(js_date-cur_date);
    //////////show timer//////////
	$("[id^=time_]").each(function(i) {
        var article=$(this).attr(\'id\').split("_");
        var ts=article[1];
        var ts2 =article[2];
        $("#time_"+article[1]).countdown({
            timestamp   : ts,
            diff_date  : diff_date,
            callback    : function(days, hours, minutes, seconds){
                var message = "";
                message += days + "j"  +" ";
                message += hours + "h" +" ";
                message += minutes + "mns"+ " ";
				if(minutes<1)	
			    message += seconds + "s";
                $("#time_"+article[2]).html(message);
                if(days==0 && hours==0 && minutes==0 && seconds==0)
                {
                    //window.location.reload();
                }
            }
        });
    });
	
	$(".deliveryhover,.recruitmenthover").mouseover(function(){
		$(this).addClass(\'mouseover\');
		$(this).find(\'.pointer\').css(\'display\',\'block\');
	})
	
	$(".deliveryhover,.recruitmenthover").mouseleave(function(){
		$(this).removeClass(\'mouseover\');
		$(this).find(\'.pointer\').css(\'display\',\'none\');
	})
	
	$(".scroll1").mCustomScrollbar({
									scrollButtons:{enable:true,scrollType:"stepless"},
									keyboard:{scrollType:"stepless"},
									mouseWheel:{scrollAmount:100},
									theme:"rounded-dark",
									autoHideScrollbar:true
									});
								
	$("#asideheight").css("max-height",$(".leftcontent").height()+\'px\');
	$("#asideheight").mCustomScrollbar({
									scrollButtons:{enable:true,scrollType:"stepless"},
									keyboard:{scrollType:"stepless"},
									mouseWheel:{scrollAmount:100},
									theme:"rounded-dark",
									autoHideScrollbar:true
									});
	
	
	
	$(\'#surveyList\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "aaSorting": [[ 0, "asc" ]],
			"iDisplayLength":10,
            "aoColumns": [
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" }
            ]
        });
		
	$(\'#deliveryList\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "aaSorting": [[ 1, "desc" ]],
			"iDisplayLength":10,
            "aoColumns": [
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" }
            ]
        });	
	
	$(\'#recruitmentList\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "aaSorting": [[ 1, "desc" ]],
			"iDisplayLength":10,
            "aoColumns": [
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" }
            ]
        });	
	
	$("#validate").click(function(){
		$(this).text(\'Validated\');
		$.post(\'/followup/validate-mission/\',{"cmid":cmid,\'to_date\':to_date,\'title\':title,\'type\':\'prod\',\'mission_id\':qmid,\'contract_id\':cid,\'quote_id\':quote_id,\'assigned_to\':assigned_to},function(data){location.reload();}); 
	})
	
	$(".tooltips").popover({ trigger: "manual" ,placement: \'top\', html: true, animation:false})
	.on("mouseenter", function () {
		var _this = this;
		$(this).popover("show");
		$(".popover").on("mouseleave", function () {
			$(_this).popover(\'hide\');
		});
	}).on("mouseleave", function () {
		var _this = this;
		setTimeout(function () {
			if (!$(".popover:hover").length) {
				$(_this).popover("hide");
			}
		}, 300);
	});
	
	
	/* Modal Quiz */
	$(\'body\').on(\'show\', \'#recruitment_create_quiz\', function (){        
			$("#create_quiz").modal(\'hide\'); 
	});

	$(\'body\').on(\'hidden\', \'#recruitment_create_quiz\', function (){
			$("#create_quiz").modal(\'hide\'); 
			var cmid=\''; ?>
<?php echo $_GET['contract_missionid']; ?>
<?php echo '\';
			var href = \'/recruitment/get-quiz?cmid=\'+cmid;
			$("#create_quiz").removeData(\'modal\');
			$(\'#create_quiz .modal-body\').load(href);
			$("#create_quiz").modal();
		});

	
	
});

function loadhistory(val){

		$("#historycontent").html("<span>Please wait loading ...</span>");
		$.post(\'/followup/loadhistory\',{\'did\':val,\'cmid\':cmid,\'cid\':cid,\'qmid\':qmid},function(data){
			$("#historycontent").html(data);
		})
}

</script>
'; ?>


<div class="row-fluid">    
	<div class="span9 leftcontent shownavright">
		<div class="followup-header">
			<h2 class="heading"><?php echo $this->_tpl_vars['viewarray']['title']; ?>
 <span class="headerdim"> &middot; <?php echo $this->_tpl_vars['viewarray']['from_date']; ?>
 - <?php echo $this->_tpl_vars['viewarray']['to_date']; ?>
</span>		
			</h2>
			<?php if ($this->_tpl_vars['viewarray']['tempo_text']): ?>
				<?php echo $this->_tpl_vars['viewarray']['tempo_text']; ?>

			<?php else: ?>
				<?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
				<a href="/followup/add-tempo?qmid=<?php echo $this->_tpl_vars['viewarray']['qmid']; ?>
&cmid=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
&cid=<?php echo $this->_tpl_vars['viewarray']['cid']; ?>
" class="btn btn-primary bottomset" data-toggle="modal" role="button" data-target="#add_tempo">Add Tempo</a> 
				<?php endif; ?>
			<?php endif; ?>
			<div class="row-fluid">    
				<div class="header-info">
					<div class="span3" style="padding-top:20px">
						<div class="span9" style="padding:0">
						<div class="sepH_b progress progress-success">
							<div class="bar" style="width: <?php echo $this->_tpl_vars['viewarray']['percentage']; ?>
%;background-image:linear-gradient(<?php echo $this->_tpl_vars['viewarray']['colorcode']; ?>
, <?php echo $this->_tpl_vars['viewarray']['colorcode']; ?>
)"></div> 
						</div>
						</div>
						<div><strong>&nbsp;&nbsp;<?php echo $this->_tpl_vars['viewarray']['percentage']; ?>
%</strong></div>
					</div>
					<div class="span2" style="padding-left:0">
						<span class="upper">Delivered</span>
						<span class="bottom"><?php echo $this->_tpl_vars['viewarray']['published_articles']; ?>
 / <?php echo $this->_tpl_vars['viewarray']['volume']; ?>
</span>
					</div>
					<div class="span2">
						<span class="upper">Type</span>
						<span class="bottom"><?php echo $this->_tpl_vars['viewarray']['mission_type']; ?>
</span>
					</div>
					<div class="span3">
						<span class="upper">Production Cost</span>
						<span class="bottom"><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['published_price'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['viewarray']['currency']; ?>
; / <?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['total_price'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
  &<?php echo $this->_tpl_vars['viewarray']['currency']; ?>
;</span>
					</div>
					<div class="span2">
						<span class="upper">Turnover</span>
						<span class="bottom"><?php if ($this->_tpl_vars['viewarray']['turnover'] == 'Free'): ?>Free<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['cm_turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['viewarray']['currency']; ?>
;<?php endif; ?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="otherdetails">
			<div class="span4">
				<h4>Client</h4>
				
					<div class="image">
						<img alt="<?php echo $this->_tpl_vars['viewarray']['cname']; ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['viewarray']['client_id']; ?>
/<?php echo $this->_tpl_vars['viewarray']['client_id']; ?>
_global.png?12345" title="<?php echo $this->_tpl_vars['viewarray']['cname']; ?>
">
					</div>
					<p>
					<a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['viewarray']['client_id']; ?>
&submenuId=ML13-SL1" target="_blank"><?php echo $this->_tpl_vars['viewarray']['cname']; ?>
</a>
					</p>
					<?php if ($this->_tpl_vars['viewarray']['client_code']): ?>
						<p>Client code: <?php echo $this->_tpl_vars['viewarray']['client_code']; ?>
</p>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['viewarray']['cano']): ?>
					<p>CA info: <?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['cano'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
</p>
					<?php endif; ?>
					<!--p>Category: <?php echo $this->_tpl_vars['viewarray']['category_name']; ?>
</p--> 
				</div>	
		
		
			<div class="span5">
				<h4>Related Contract / Quote</h4>

				<?php if ($this->_tpl_vars['viewarray']['contract_files']): ?>
					<a href='/followup/download-po?cid=<?php echo $this->_tpl_vars['viewarray']['cid']; ?>
'><?php echo $this->_tpl_vars['viewarray']['contract_name']; ?>
</a>
				<?php else: ?>
					<?php echo $this->_tpl_vars['viewarray']['contract_name']; ?>

				<?php endif; ?>
					<p>
						<?php echo $this->_tpl_vars['viewarray']['contract_date']; ?>

					</p>
					<p style="margin-top:10px">
					<?php if ($this->_tpl_vars['quote_details']['is_new_quote'] == '1'): ?>
					<a href="/quote-new/sales-final-validation?qaction=briefing&quote_id=<?php echo $this->_tpl_vars['quote_details']['identifier']; ?>
" target="_followup"><?php echo $this->_tpl_vars['quote_details']['title']; ?>
</a>
					<?php else: ?>
					<a href="/quote/quote-followup?quote_id=<?php echo $this->_tpl_vars['quote_details']['identifier']; ?>
&submenuId=ML13-SL2" target="_followup"><?php echo $this->_tpl_vars['quote_details']['title']; ?>
</a>
					<?php endif; ?>
					</p>
					<p><?php echo $this->_tpl_vars['viewarray']['quote_signed_at']; ?>
</p>
			</div>	
			<div class="span3">
				<h4>Team</h4><br>
					<a href="mailto:<?php echo $this->_tpl_vars['viewarray']['mailto']; ?>
" class="hint--left" data-hint="<?php echo $this->_tpl_vars['viewarray']['sales_owner']; ?>
"><img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['viewarray']['sales_id']; ?>
/logo.jpg" class="image rd_30" ></a>
					<?php if (( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'prodmanager' ) && $this->_tpl_vars['viewarray']['cm_status'] != 'closed' && $this->_tpl_vars['viewarray']['assigned']): ?>
					<a class="tooltips hint--right" data-content="&lt;a href=&quot;/contractmission/assign-mission?submenuId=ML13-SL3&type=prod&contract_id=<?php echo $this->_tpl_vars['viewarray']['cid']; ?>
&cmid=&index=<?php echo $_GET['index']; ?>
 &quot; target=&quot;_blank &quot; &gt; Modify &lt;/a&gt;" data-hint="<?php echo $this->_tpl_vars['viewarray']['prod_name']; ?>
">
					<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['viewarray']['assigned']; ?>
/logo.jpg" class="image rd_30" alt="<?php echo $this->_tpl_vars['viewarray']['prod_name']; ?>
">
					</a>
					<?php elseif ($this->_tpl_vars['viewarray']['assigned']): ?>
					<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['viewarray']['prod_name']; ?>
">
					<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['viewarray']['assigned']; ?>
/logo.jpg" class="image rd_30" alt="<?php echo $this->_tpl_vars['viewarray']['prod_name']; ?>
">
					</a>
					<?php endif; ?>
			</div>	
		</div>
		<div style="clear:both"></div>
		<div class="row-fluid">
			<div class="act-task">
			<ul class="nav nav-tabs" style="background-color:#fff">
				<li class="<?php if ($_GET['active'] == 'delivery' || $_GET['active'] == ''): ?>active<?php endif; ?>"><a href="#deliveries" data-toggle="tab">My deliveries</a></li>
				<?php if ($this->_tpl_vars['viewarray']['survey'] == 'yes'): ?>
				<li class="<?php if ($_GET['active'] == 'survey'): ?>active<?php endif; ?>"><a href="#survey" data-toggle="tab">My survey</a></li>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['viewarray']['recruitment'] == 'yes'): ?>
				<li class="<?php if ($_GET['active'] == 'recruitment'): ?>active<?php endif; ?>"><a href="#recruitment" data-toggle="tab">My recruitment</a></li>
				<?php endif; ?>
				<li class=""><a href="#activity1" data-toggle="tab">Activities</a></li>
			</ul>	
		
			<div class="tab-content">
				<div class="tab-pane" id="activity1">
					<div class="row-fluid">
					<?php if (count($this->_tpl_vars['deliveries']) > 0 || count($this->_tpl_vars['recruitments']) > 0): ?>
								<select name="" id="deliverysort" onchange="loadhistory(this.value)">
									<option value="">Most Recent</option>
									<?php $_from = $this->_tpl_vars['deliveries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['delivery']):
?>
										<option value="<?php echo $this->_tpl_vars['delivery']['id']; ?>
"><?php echo $this->_tpl_vars['delivery']['title']; ?>
</option>	
									<?php endforeach; endif; unset($_from); ?>
									<?php $_from = $this->_tpl_vars['recruitments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['delivery']):
?>
										<option value="<?php echo $this->_tpl_vars['delivery']['id']; ?>
"><?php echo $this->_tpl_vars['delivery']['title']; ?>
</option>	
									<?php endforeach; endif; unset($_from); ?>
										<option value='delay'>Delay</option>
								</select>
								<?php endif; ?>
					<div class="media mission-comment " id="" style="min-height:100px">
						
						<div class="row-fluid" id="historycontent" style="margin-top:0">
						<div class="scroll1">
							<?php if (count($this->_tpl_vars['logs']) > 0): ?>
							<?php $_from = $this->_tpl_vars['logs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['history']):
?>
							<div class="media act-comment">
								<a class="pull-left imgframe">
									<?php if ($this->_tpl_vars['history']['type'] == 'superclient'): ?>
										<img class="media-object rd_30" width="50px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/superclients/logos/<?php echo $this->_tpl_vars['history']['user_id']; ?>
/<?php echo $this->_tpl_vars['history']['user_id']; ?>
.png">
									<?php elseif ($this->_tpl_vars['history']['type'] == 'contributor'): ?>
										<img class="media-object rd_30" width="50px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/contrib/pictures/<?php echo $this->_tpl_vars['history']['user_id']; ?>
/<?php echo $this->_tpl_vars['history']['user_id']; ?>
_h.jpg">
									<?php elseif ($this->_tpl_vars['history']['type'] == 'client'): ?>
										<img class="media-object rd_30" width="50px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['history']['user_id']; ?>
/<?php echo $this->_tpl_vars['history']['user_id']; ?>
.png">
									<?php else: ?>
										<img class="media-object rd_30" width="50px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['history']['user_id']; ?>
/logo.jpg">
									<?php endif; ?>
								</a>
								<div class="media-body">
									<?php if ($this->_tpl_vars['history']['first_name']): ?>
										<a><?php echo $this->_tpl_vars['history']['first_name']; ?>
 <?php echo $this->_tpl_vars['history']['last_name']; ?>
</a> <?php echo ((is_array($_tmp=$this->_tpl_vars['history']['action_at'])) ? $this->_run_mod_handler('time_ago', true, $_tmp) : smarty_modifier_time_ago($_tmp)); ?>
<?php echo $this->_tpl_vars['history']['time']; ?>
<br>
									<?php endif; ?>
									<?php echo $this->_tpl_vars['history']['action_sentence']; ?>

									<div><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['history']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
								</div>
							</div>
							<?php endforeach; endif; unset($_from); ?> 
														<?php endif; ?>
						</div>
						</div>
					</div>
					</div>
				</div>
				<div class="tab-pane <?php if ($_GET['active'] == 'delivery' || $_GET['active'] == ''): ?>active<?php endif; ?>" id="deliveries">
					<div class="row-fluid">
						<div class="media mission-comment">
						<?php if (count($this->_tpl_vars['deliveries']) > 0): ?>
							<table class="table table-bordered table-striped table_vam" id="deliverylist">
							<thead>
								<tr>
									<th>Name</th>
									<th>Date of Launch</th>
									<th>End of Proofreading</th>
									<th>Delivery date<!--Delivery date validated with client--></th>
									<th>Final date of approval of articles</th>
								</tr>
							</thead>
							<tbody>
								<?php $_from = $this->_tpl_vars['deliveries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['delivery']):
?>
									<tr>
										<td>
										<a href='/followup/delivery?ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
&client_id=<?php echo $this->_tpl_vars['viewarray']['client_id']; ?>
&submenuId=ML13-SL4'>
											<?php echo $this->_tpl_vars['delivery']['title']; ?>

										</a>
										</td>
										<td><?php echo $this->_tpl_vars['delivery']['publishdate']; ?>
</td>
										<td>
											<?php if ($this->_tpl_vars['delivery']['correction'] == 'internal'): ?>
												Internal
											<?php elseif ($this->_tpl_vars['delivery']['proofread_end']): ?>
												<?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['proofread_end'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>

											<?php else: ?>
												-
											<?php endif; ?>
										</td>
										<td><?php echo $this->_tpl_vars['delivery']['max_delivered_updated_at']; ?>
</td>
										<td><?php echo $this->_tpl_vars['delivery']['max_date']; ?>
</td>
									</tr>
								<?php endforeach; endif; unset($_from); ?>
							</tbody>
							</table>
                                                        <?php if ($this->_tpl_vars['bnpXlsx'] == 'yes'): ?>
                            <div class="row-fluid" style="padding-top: 10px;">
                                <a href="/followup/donwload-bnp-xlsx?cmid=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
" class="btn btn-success" >"BNP - fichier client xlsx </a>
                            </div>
                            <?php endif; ?>
						<?php else: ?>
							<div class="pull-center">No Delivery Found</div>
						<?php endif; ?>
						</div>
					</div>
				</div>
				<?php if ($this->_tpl_vars['viewarray']['survey'] == 'yes'): ?>
				<div class="tab-pane <?php if ($_GET['active'] == 'survey'): ?>active<?php endif; ?>" id="survey">
					<div class="row-fluid">
						<div class="media mission-comment">
							<table class="table table-bordered table-striped table_vam" id="surveyList" >
						<thead>
							<tr>
							   <th>Poll Name</th>
							   <th>Date of Launch</th>
							   <th>End Date</th>
							   <th>Count Down</th>                                                   
							   <th>Closed Date</th>                         
							</tr>
						</thead>
						<tbody>
							<?php if (count($this->_tpl_vars['surveys']) > 0): ?>
							<?php $_from = $this->_tpl_vars['surveys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['surveys'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['surveys']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['survey']):
        $this->_foreach['surveys']['iteration']++;
?>
							<tr>
								<td><a href="/survey/followup?survey_id=<?php echo $this->_tpl_vars['survey']['pollid']; ?>
&cmid=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
&submenuId=ML13-SL4"><?php echo $this->_tpl_vars['survey']['ptitle']; ?>
</a></td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['survey']['startdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['survey']['enddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
</td>
								<td>
									<span id="time_<?php echo $this->_tpl_vars['survey']['expires']; ?>
_<?php echo $this->_tpl_vars['survey']['pollid']; ?>
" class="alert alert-danger">
										<i class="icon-time"></i>
										<span id="time_<?php echo $this->_tpl_vars['survey']['pollid']; ?>
"></span>
									</span>
								</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['survey']['closed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>
						</tbody>
					</table>
						</div>
					</div>
				</div>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['viewarray']['recruitment'] == 'yes'): ?>
				<div class="tab-pane <?php if ($_GET['active'] == 'recruitment'): ?>active<?php endif; ?>" id="recruitment">
					<div class="row-fluid">
						<div class="media mission-comment">
						<?php if (count($this->_tpl_vars['recruitments']) > 0): ?>
							<table class="table table-bordered table-striped table_vam" id="recruitmentList" >
							<thead>
								<tr>
									<th>Name</th>
									<th>Date of Launch</th>
									<th>End of Proofreading</th>
									<th>Delivery date validated with client</th>
									<th>Closed</th>
								</tr>
							</thead>
							<tbody>
								<?php $_from = $this->_tpl_vars['recruitments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['recruitment']):
?>
									<tr>
										<td>
										<a href='/recruitment/follow-up?recruitment_id=<?php echo $this->_tpl_vars['recruitment']['id']; ?>
&cmid=<?php echo $_GET['cmid']; ?>
&submenuId=ML13-SL4'>
										<?php echo $this->_tpl_vars['recruitment']['title']; ?>

										</a>
										</td>
										<td><?php echo $this->_tpl_vars['recruitment']['publishdate']; ?>
</td>
										<td>
											<?php if ($this->_tpl_vars['recruitment']['correction'] == 'internal'): ?>
												Internal
											<?php elseif ($this->_tpl_vars['recruitment']['proofread_end']): ?>
												<?php echo ((is_array($_tmp=$this->_tpl_vars['recruitment']['proofread_end'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>

											<?php else: ?>
												-
											<?php endif; ?>
										</td>
										<td><?php echo $this->_tpl_vars['viewarray']['to_date']; ?>
</td>
										<td><?php echo ((is_array($_tmp=$this->_tpl_vars['recruitment']['recruitment_closed_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
</td>
									</tr>
								<?php endforeach; endif; unset($_from); ?>
								
							</tbody>
							</table>
							<?php else: ?>
							<div class="pull-center">No Recruitments Found</div>
						<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
				
			</div>
			</div>
		</div>
		
		<h3> Brief and Comments from Quote</h3>
			
				<div class="row-fluid">
				<?php if ($this->_tpl_vars['quote_details']['sales_comment']): ?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['quote_details']['created_by']; ?>
/logo.jpg">
						</a>
						<div class="media-body">
							<?php if ($this->_tpl_vars['quote_details']['created_name']): ?>
								<a><?php echo $this->_tpl_vars['quote_details']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['quote_details']['created_time']; ?>
<br>
							<?php endif; ?>
							<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quote_details']['sales_comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

						</div>
					</div>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['prodcomments']['comments']): ?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['prodcomments']['created_by']; ?>
/logo.jpg">
						</a>
						<div class="media-body">
							<?php if ($this->_tpl_vars['prodcomments']['created_name']): ?>
								<a><?php echo $this->_tpl_vars['prodcomments']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['prodcomments']['created_time']; ?>
<br>
							<?php endif; ?>
							<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['prodcomments']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

						</div>
					</div>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['contractcomments']['comment']): ?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['contractcomments']['created_by']; ?>
/logo.jpg">
						</a>
						<div class="media-body">
							<?php if ($this->_tpl_vars['contractcomments']['created_name']): ?>
								<a><?php echo $this->_tpl_vars['contractcomments']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['contractcomments']['created_time']; ?>
<br>
							<?php endif; ?>
							<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['contractcomments']['comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

						</div>
					</div>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['contractmissioncomments']['comment']): ?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['contractmissioncomments']['created_by']; ?>
/logo.jpg">
						</a>
						<div class="media-body">
							<?php if ($this->_tpl_vars['contractmissioncomments']['created_name']): ?>
								<a><?php echo $this->_tpl_vars['contractmissioncomments']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['contractmissioncomments']['created_time']; ?>
<br>
							<?php endif; ?>
							<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['contractmissioncomments']['comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

						</div>
					</div>
				<?php endif; ?>
				</div>
				<form action="/followup/prodfilesupload" name="" method="post" enctype="multipart/form-data">
				<?php if ($this->_tpl_vars['files']): ?>
					<div class="row-fluid">
						<h4>Related Files</h4>
						<div class="pull-right" style="margin-bottom:5px">
							<a href="/quote/download-document?type=cm_prod&index=-1&quote_id=<?php echo $this->_tpl_vars['quote_details']['identifier']; ?>
&mission_id=<?php echo $_GET['cmid']; ?>
" class="btn btn-small">Download Zip</a>
						</div>
						<table class="onsuccessrep table">
						<?php echo $this->_tpl_vars['files']; ?>

						</table>
					</div>
				<?php endif; ?>
				<input type="file" name="seo_documents[]" accept="doc|xls|zip|docx|xlsx" class="multi" id=""/>
				<div class="row-fluid topset2" style="text-align:center">
					<button type="submit" name="save" onclick="removeDisabled()" class="btn btn-primary">Submit</button>
				</div>
				<input type="hidden" name="cmid" value="<?php echo $_GET['cmid']; ?>
" />
				</form>
	</div>
	
	<div class="span3">
		<aside>
			<div class="followup-aside" id="asideheight">

					<?php if ($this->_tpl_vars['viewarray']['cm_status'] == 'validated'): ?>
					<button class="btn btn-primary disabled btn-block" id=""><i class="icon-ok icon-white"></i> Validated</button>
					<?php elseif ($this->_tpl_vars['viewarray']['published_articles'] >= $this->_tpl_vars['viewarray']['volume']): ?>
					<button class="btn btn-primary btn-block" id="validate">Validate</button>
					<?php endif; ?>
					
					<h3 class="heading">
					<?php if (count($this->_tpl_vars['deliveries']) > 0 || count($this->_tpl_vars['recruitments']) > 0 || count($this->_tpl_vars['surveys']) > 0): ?> 
					<?php echo smarty_function_math(array('equation' => "x + y + z",'x' => count($this->_tpl_vars['deliveries']),'y' => count($this->_tpl_vars['recruitments']),'z' => count($this->_tpl_vars['surveys'])), $this);?>

					<?php endif; ?> TASK(S)
					</h3>
										<?php if (( $this->_tpl_vars['viewarray']['create_delivery'] != 0 && $this->_tpl_vars['viewarray']['cm_status'] != 'closed' && ! $this->_tpl_vars['viewarray']['freeze_delivery'] && $this->_tpl_vars['viewarray']['cm_status'] != 'deleted' )): ?>
                		<a class="btn btn-warning btn-block" href="<?php if ($this->_tpl_vars['viewarray']['client_id'] == '131205130842526'): ?>/bnp-quotedelivery<?php else: ?>/quotedelivery<?php endif; ?>/delivery-prod1?mission_id=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
&submenuId=ML13-SL4&daction=new" target="_blank" title="New Delivery">
                            <i class="icon-plus icon-white"></i> New Delivery
						</a>
					<?php elseif ($this->_tpl_vars['viewarray']['freeze_delivery']): ?>
						<h3>Mission is freezed till <?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['freeze_end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
</h3>
					<?php endif; ?>
					<?php if (count($this->_tpl_vars['deliveries']) > 0): ?>
					<?php $_from = $this->_tpl_vars['deliveries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['delivery']):
?>
						<div class="deliveryhover tasks">
						<span style="margin-left:5px; border-left: 1px solid #dadada;padding-left: 5px" class="pointer pull-right">
							<a class="" href="/quotedelivery/delivery-prod1?mission_id=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
&ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
&daction=duplicat&submenuId=ML13-SL4" target="_blank">
								<i class="splashy-document_copy"></i></a></span>
						<span class="pointer pull-right"><a href="/deliveryongoing/edit-ao?ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
&client_id=<?php echo $this->_tpl_vars['delivery']['user_id']; ?>
&view=prod&cmid=<?php echo $_GET['cmid']; ?>
" data-toggle="modal" role="button" data-target="#edit_ao_modal" id="edit_ao" data-toggle="tooltip" title="Edit delivery">
								<i class="icon-pencil"></i></a></span>
							
							<h4><a href="/followup/delivery?ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
&client_id=<?php echo $this->_tpl_vars['viewarray']['client_id']; ?>
&index=<?php echo $_GET['index']; ?>
&submenuId=ML13-SL4"><?php echo $this->_tpl_vars['delivery']['title']; ?>
</a></h4>
							<p class="headerdim"><?php echo $this->_tpl_vars['delivery']['publishdate']; ?>
 - <?php echo $this->_tpl_vars['delivery']['enddate']; ?>
</p>
							<a href='/followup/delivery?ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
&client_id=<?php echo $this->_tpl_vars['viewarray']['client_id']; ?>
&submenuId=ML13-SL4' class="btn btn-block btn-default">View Taskboard</button></a>
						</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>	
					
					<?php if ($this->_tpl_vars['viewarray']['recruitment'] == 'yes'): ?>
						<p class="pull-center topset2"><i class="splashy-group_grey"></i></p>
						<p class="pull-center">
						<a href="/recruitment/recruitment-prod1?contract_missionid=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
&submenuId=ML13-SL4&raction=new" title="New Recruitment">
							<button class="btn btn-mini"><i class="splashy-add_small"></i> New Recruitment</button>
						</a>
						</p>
						<?php if (count($this->_tpl_vars['recruitments']) > 0): ?>
							<?php $_from = $this->_tpl_vars['recruitments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['delivery']):
?>
							<div class="recruitmenthover tasks">
								<span style="margin-left:5px; border-left: 1px solid #dadada;padding-left: 5px" class="pointer pull-right">
									<a class="" href="/recruitment/recruitment-prod1?contract_missionid=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
&recruitment_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
&raction=duplicate&submenuId=ML13-SL4" target="_blank">
										<i class="splashy-document_copy"></i></a>
								</span>
								<span class="pointer pull-right">
									<a href="/recruitment/edit-recruitment?ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
&client_id=<?php echo $this->_tpl_vars['delivery']['user_id']; ?>
&cmid=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
&index=<?php echo $_GET['index']; ?>
" data-toggle="modal" role="button" data-target="#edit_recrut_modal" id="" data-toggle="tooltip" title="Edit Recruitment">
										<i class="icon-pencil"></i>
									</a>
								</span>
								<h4><a href="/recruitment/follow-up?recruitment_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
&cmid=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
&submenuId=ML13-SL4"><?php echo $this->_tpl_vars['delivery']['title']; ?>
</a></h4>
								<p class="headerdim"><?php echo $this->_tpl_vars['delivery']['publishdate']; ?>
 - <?php echo $this->_tpl_vars['delivery']['enddate']; ?>
</p>
								<a href="/recruitment/follow-up?recruitment_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
&cmid=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
&submenuId=ML13-SL4" class="btn btn-block btn-default">View Taskboard</a></p>
							</div>
							<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['viewarray']['survey'] == 'yes'): ?>
					<p class="pull-center topset2"><i class="splashy-group_grey"></i></p>
					<p class="pull-center">
					<a href='/survey/create-survey?contract_missionid=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
&cid=<?php echo $this->_tpl_vars['viewarray']['cid']; ?>
&mid=<?php echo $this->_tpl_vars['viewarray']['qmid']; ?>
&qid=<?php echo $this->_tpl_vars['quote_details']['identifier']; ?>
&submenuId=ML13-SL4' target='_blank'>
						<button class="btn btn-mini"><i class="splashy-add_small"></i> Create Survey</button>
					</a>
					</p>
					<?php if (count($this->_tpl_vars['surveys']) > 0): ?>
					<?php $_from = $this->_tpl_vars['surveys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['survey']):
?>
					<div class="tasks">
						<p><?php echo $this->_tpl_vars['survey']['ptitle']; ?>
</p>
						<p class="headerdim"><?php echo ((is_array($_tmp=$this->_tpl_vars['survey']['startdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['survey']['enddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %b %Y") : smarty_modifier_date_format($_tmp, "%d %b %Y")); ?>
</p>
						<p class="pull-center"><a href="/survey/followup?survey_id=<?php echo $this->_tpl_vars['survey']['pollid']; ?>
&cmid=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
&submenuId=ML13-SL4"><button class="btn btn-mini btn-primary" name="">View Taskboard</button></a></p>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					<?php endif; ?>
					
					<?php if (count($this->_tpl_vars['techmissions']) > 0 || count($this->_tpl_vars['seoMissionDetails']) > 0): ?>
					<h3 class="heading">TECH & SEO MISSION</h3>
					<?php endif; ?>
					<?php if (count($this->_tpl_vars['techmissions']) > 0): ?>
					<?php $_from = $this->_tpl_vars['techmissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tmission']):
?>
					<div class="tasks">
						<h4><?php if ($this->_tpl_vars['tmission']['title']): ?><?php echo $this->_tpl_vars['tmission']['title']; ?>
<?php else: ?>New Tech Mission<?php endif; ?></h4>
						<p class="headerdim"><?php echo $this->_tpl_vars['tmission']['to_date']; ?>
 - <?php echo $this->_tpl_vars['tmission']['from_date']; ?>
</p>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					<?php if (count($this->_tpl_vars['seoMissionDetails']) > 0): ?>
					<?php $_from = $this->_tpl_vars['seoMissionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['smission']):
?>
					<div class="tasks">
						<h4><?php echo $this->_tpl_vars['smission']['title']; ?>
</h4>
						<p class="headerdim"><?php echo $this->_tpl_vars['smission']['to_date']; ?>
 - <?php echo $this->_tpl_vars['smission']['from_date']; ?>
</p>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
			</div>
			</div>	
		</aside>
	</div>
	
</div>

<!--///for the ao edit popup///-->
<div class="modal fullscreen hide fade" id="edit_ao_modal">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>&Eacute;diter L'AO</h3>		
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>
<!--///for the add tempo popup///-->
<div class="modal container hide fade" id="add_tempo">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Add tempo</h3>		
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>
<script>
// tooltip activation
    $("[rel=tooltip]").tooltip();
</script>

<div class="modal fullscreen hide fade" id="edit_recrut_modal">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Edit Recruitment</h3>		
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>

<div class="modal container hide fade" id="create_quiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button class="close" data-dismiss="modal" >&times;</button>
		<h3>Link Quiz
			<a href="/recruitment/create-quiz-step1?cmid=<?php echo $_GET['contract_missionid']; ?>
" data-toggle="modal" role="button" data-target="#recruitment_create_quiz" class="btn btn-info">Create Quiz</a>
		 </h3>
	</div>
	<div class="modal-body modal-body1">
		
	</div>
	<div class="modal-footer">
	</div>
</div>

<div class="modal container hide fade" id="recruitment_create_quiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button class="close" data-dismiss="modal" >&times;</button>
		<h3>Create Quiz</h3>
	</div>
	<div class="modal-body  modal-body1">
		
	</div>
	
	<div class="modal-footer">
	
	</div>
</div>
