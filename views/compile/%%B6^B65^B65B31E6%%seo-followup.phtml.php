<?php /* Smarty version 2.6.19, created on 2016-04-13 09:55:37
         compiled from gebo/followup/seo-followup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut_t', 'gebo/followup/seo-followup.phtml', 96, false),array('modifier', 'count', 'gebo/followup/seo-followup.phtml', 165, false),array('modifier', 'time_ago', 'gebo/followup/seo-followup.phtml', 173, false),array('modifier', 'stripslashes', 'gebo/followup/seo-followup.phtml', 176, false),array('modifier', 'strip_tags', 'gebo/followup/seo-followup.phtml', 176, false),array('modifier', 'nl2br', 'gebo/followup/seo-followup.phtml', 176, false),array('modifier', 'date_format', 'gebo/followup/seo-followup.phtml', 291, false),)), $this); ?>
<?php echo '
<link href="/BO/theme/gebo/css/mission-followup.css" rel="stylesheet" />
<script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
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
</style>
<!-- custom scrollbar plugin -->
<link rel="stylesheet" href="/BO/theme/gebo/lib/scrollbar/jquery.mCustomScrollbar.css">
<script src="/BO/theme/gebo/lib/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	
<script style="text/javascript">
$(document).ready(function(){
var cmid='; ?>
"<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
"<?php echo ';
var to_date='; ?>
"<?php echo $this->_tpl_vars['viewarray']['to_date']; ?>
"<?php echo ';
var title='; ?>
"<?php echo $this->_tpl_vars['viewarray']['title']; ?>
"<?php echo ';
var contract_id='; ?>
"<?php echo $this->_tpl_vars['viewarray']['contract_id']; ?>
"<?php echo ';
var mission_id='; ?>
"<?php echo $this->_tpl_vars['viewarray']['mission_id']; ?>
"<?php echo ';
var assigned_to='; ?>
"<?php echo $this->_tpl_vars['viewarray']['assigned']; ?>
"<?php echo ';
var quote_id='; ?>
"<?php echo $this->_tpl_vars['quote_details']['identifier']; ?>
"<?php echo ';

	$("#validate").click(function(){
		$(this).text(\'Validated\');
		$.post(\'/followup/validate-mission/\',{"cmid":cmid,\'to_date\':to_date,\'title\':title,\'type\':\'seo\',\'mission_id\':mission_id,\'contract_id\':contract_id,\'quote_id\':quote_id,\'assigned_to\':assigned_to},function(data){location.reload();}); 
	})
	
	$(document).on("click",".deletetask",function(){
	var id_identifier = $(this).attr("rel");
	
		smoke.confirm("Are you sure? Want to delete this File",function(e)
			{
				if(e)
				{
					$(this).closest("tr").remove();
					$(".onsuccessrep").html("<tr><td>Please Wait Deleting File.</td></tr>");
					$.post("/followup/delete-document",{"identifier":id_identifier,\'edit\':$(this).hasClass(\'edit\')},function(result){
							$(".onsuccessrep").html(result);
					}); 
				}
			})
	}) 
	
	$(document).on(\'click\',\'#trig_edit\',function(){
		$("#view_task").modal(\'hide\');
	});
	
	$("#activity").mCustomScrollbar({
									scrollButtons:{enable:true,scrollType:"stepped"},
									keyboard:{scrollType:"stepped"},
									mouseWheel:{scrollAmount:188},
									theme:"rounded-dark",
									snapAmount:188,
									snapOffset:65,
									autoHideScrollbar:true
									})
	$("#asideheight").css("max-height",$(".leftcontent").height()+\'px\');
	$("#asideheight").mCustomScrollbar({
									scrollButtons:{enable:true,scrollType:"stepped"},
									keyboard:{scrollType:"stepped"},
									theme:"rounded-dark",
									autoHideScrollbar:true
									})
})
</script>
'; ?>


<div class="row-fluid">    
	<div class="span9 leftcontent shownavright">
		<div class="followup-header">
			<h2 class="heading"><?php echo $this->_tpl_vars['viewarray']['title']; ?>
<span class="headerdim"> &middot; <?php echo $this->_tpl_vars['viewarray']['from_date']; ?>
 - <?php echo $this->_tpl_vars['viewarray']['to_date']; ?>
</span></h2>
			<div class="row-fluid">    
				<div class="header-info">
					<div class="span4">
						<span class="upper">Priority</span>
						<span class="bottom"><?php echo $this->_tpl_vars['viewarray']['priority']; ?>
</span>
					</div>
					<div class="span4">
						<span class="upper">Production Cost</span>
						<span class="bottom"><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['production_cost'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['viewarray']['currency']; ?>
;</span>
					</div>
					<div class="span4">
						<span class="upper">Turnover</span>
						<span class="bottom"><?php if ($this->_tpl_vars['viewarray']['turnover'] == 'Free'): ?>Free<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['viewarray']['turnover'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
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
					<a href='/followup/download-po?cid=<?php echo $this->_tpl_vars['viewarray']['contract_id']; ?>
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
/logo.jpg" title="<?php echo $this->_tpl_vars['viewarray']['sales_owner']; ?>
"  alt="<?php echo $this->_tpl_vars['viewarray']['sales_owner']; ?>
" class="image rd_30"></a>
					<?php if ($this->_tpl_vars['viewarray']['assigned']): ?>
					<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['viewarray']['seo_name']; ?>
">
						<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['viewarray']['assigned']; ?>
/logo.jpg" class="image rd_30" alt="<?php echo $this->_tpl_vars['viewarray']['seo_name']; ?>
">
					</a>
					<?php endif; ?>
			</div>	
		</div>
		<div style="clear:both"></div>
		<div class="row-fluid">
			<div class="act-task">
			<ul class="nav nav-tabs" style="background-color:#fff">
				<li class="active"><a href="#activity" data-toggle="tab">Activities</a></li>
			</ul>	
		
			<div class="tab-content">
				<div class="tab-pane active media mission-comment scroll1" id="activity" >
					<div class="row-fluid">
					<?php if (count($this->_tpl_vars['logs']) > 0): ?>
					<?php $_from = $this->_tpl_vars['logs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['log']):
?>
						<div class="media act-comment">
							<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['log']['user_id']; ?>
/logo.jpg">
							</a>
							<div class="media-body">
								<?php if ($this->_tpl_vars['log']['first_name']): ?>
									<a><?php echo $this->_tpl_vars['log']['first_name']; ?>
 <?php echo $this->_tpl_vars['log']['last_name']; ?>
</a> <?php echo ((is_array($_tmp=$this->_tpl_vars['log']['action_at'])) ? $this->_run_mod_handler('time_ago', true, $_tmp) : smarty_modifier_time_ago($_tmp)); ?>
<?php echo $this->_tpl_vars['log']['time']; ?>
<br>
								<?php endif; ?>
								<?php echo $this->_tpl_vars['log']['action_sentence']; ?>

								<div><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['log']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
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
		
		<h3> Brief and Comments from Quote</h3>
			
				<div class="row-fluid">
								<?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['comments'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['comments']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['commentst']):
        $this->_foreach['comments']['iteration']++;
?>
					<div class="media mission-comment">
						<a class="pull-left imgframe">
							<img class="media-object rd_30" width="50px" src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['commentst']['created_by']; ?>
/logo.jpg">
						</a>
						<div class="media-body">
							<?php if ($this->_tpl_vars['commentst']['created_name']): ?>
								<a><?php echo $this->_tpl_vars['commentst']['created_name']; ?>
</a> <?php echo $this->_tpl_vars['commentst']['created_time']; ?>
<br>
							<?php endif; ?>
							<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['commentst']['comment'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

						</div>
					</div>
				<?php endforeach; endif; unset($_from); ?>
				</div>
			<?php if ($this->_tpl_vars['quotefiles'] || $this->_tpl_vars['files']): ?>
			<div class="row-fluid">
				<h4>Related Files</h4>
				<div class="pull-right" style="margin-bottom:5px">
					<a href="/quote/download-document?type=cm_seo&index=-1&quote_id=<?php echo $this->_tpl_vars['quote_details']['identifier']; ?>
&mission_id=<?php echo $this->_tpl_vars['viewarray']['mission_id']; ?>
" class="btn btn-small">Download Zip</a>
				</div>
				<table class="onsuccessrepquote table">
				<?php echo $this->_tpl_vars['quotefiles']; ?>

				</table>
				<table class="onsuccessrep table">
				<?php echo $this->_tpl_vars['files']; ?>

				</table>
			</div>
			<?php endif; ?>
			</div>

	
	<div class="span3">
		<aside>
			<div class="followup-aside asideheight">	
					
					<?php if ($this->_tpl_vars['viewarray']['cm_status'] == 'validated'): ?>
					<button class="btn btn-primary btn-block disabled" id=""><i class="icon-ok icon-white"></i> Validated</button>
					<hr>
					<?php else: ?>
					<button class="btn btn-primary btn-block" id="validate">Validate Mission</button>
					<hr>
					<?php endif; ?>
					
					<h3 class="heading"><?php if (count($this->_tpl_vars['tasks']) > 0): ?> <?php echo count($this->_tpl_vars['tasks']); ?>
 <?php endif; ?>TASK<?php if (count($this->_tpl_vars['tasks']) > 1): ?>S<?php endif; ?></h3>
					<?php if (count($this->_tpl_vars['tasks']) > 0): ?>
					<?php $_from = $this->_tpl_vars['tasks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['task']):
?>
					<div class="deliveryhover tasks">
						<h4><a href="/followup/seotask?tid=<?php echo $this->_tpl_vars['task']['task_id']; ?>
&seo_action=view" data-toggle="modal" role="button" data-target="#view_task"><?php echo $this->_tpl_vars['task']['task_title']; ?>
</h4>
						<p class="headerdim"><?php echo ((is_array($_tmp=$this->_tpl_vars['task']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d %b %Y') : smarty_modifier_date_format($_tmp, '%d %b %Y')); ?>
</p>
						<a href="/followup/seotask?tid=<?php echo $this->_tpl_vars['task']['task_id']; ?>
&seo_action=view" data-toggle="modal" role="button" data-target="#view_task" class="btn btn-block btn-default">View Taskboard</a>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					<hr>
					<a href="/followup/seotask?cmid=<?php echo $this->_tpl_vars['viewarray']['cmid']; ?>
" data-toggle="modal" role="button" data-target="#new_task" id="newtask" class="btn btn-block btn-warning">New Task</a>
				</div>
			</div>	
		</aside>
	</div>
	
</div>


	
<!-- New task follow up-->
<div class="modal fullscreen hide fade" style="top:0%" id="new_task">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>New task for</h3>		
    </div>
    <div class="modal-body" style="min-height:480px">
	
	</div>
	 <div class="modal-footer"></div>
</div>

<!-- View task follow up-->
<div class="modal fullscreen hide fade" style="top:0%" id="view_task">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Task view of</h3>		
    </div>
    <div class="modal-body" style="min-height:480px">
	
	</div>
	 <div class="modal-footer"></div>
</div>

<!-- View task follow up-->
<div class="modal fullscreen hide fade" style="top:0%" id="edit_task">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Edit task</h3>		
    </div>
    <div class="modal-body" style="min-height:480px">
	
	</div>
	 <div class="modal-footer"></div>
</div>