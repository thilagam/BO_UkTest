<?php /* Smarty version 2.6.19, created on 2014-12-08 13:20:40
         compiled from gebo/ao/listallmissions.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/ao/listallmissions.phtml', 187, false),array('modifier', 'stripslashes', 'gebo/ao/listallmissions.phtml', 240, false),array('modifier', 'truncate', 'gebo/ao/listallmissions.phtml', 242, false),array('modifier', 'date_format', 'gebo/ao/listallmissions.phtml', 245, false),array('modifier', 'zero_cut', 'gebo/ao/listallmissions.phtml', 288, false),array('modifier', 'explode', 'gebo/ao/listallmissions.phtml', 297, false),array('modifier', 'replace', 'gebo/ao/listallmissions.phtml', 299, false),)), $this); ?>
<?php echo '
    <script type="text/javascript" >
        $(document).ready(function() {
			$("#client_list").chosen({ allow_single_deselect: true });	
			$("#pay_status").chosen({ allow_single_deselect: true,search_contains: true });	
			$("#sorttype").chosen({ disable_search: true });	
			$("#mission_list").chosen({ allow_single_deselect: true });	
			
			$(\'#start_date\').datepicker({language: \'fr\'}).on(\'changeDate\', function(ev){
				var dateText = $(this).val();//data(\'date\');
				
				var endDateTextBox = $(\'#end_date\');
				if (endDateTextBox.val() != \'\') {
					var testStartDate = new Date(dateText);
					var testEndDate = new Date(endDateTextBox.val());
					if (testStartDate > testEndDate) {
						endDateTextBox.val(dateText);
					}
				}
				else {
					endDateTextBox.val(dateText);
				};
				$(\'#end_date\').datepicker(\'setStartDate\', dateText);
				$(\'#start_date\').datepicker(\'hide\');
			});
			
			$(\'#end_date\').datepicker({language: \'fr\'}).on(\'changeDate\', function(ev){
				var dateText = $(this).val();//data(\'date\');
				var startDateTextBox = $(\'#start_date\');				
				if (startDateTextBox.val() != \'\') {
					var testStartDate = new Date(startDateTextBox.val());
					var testEndDate = new Date(dateText);
					if (testStartDate > testEndDate) {
						startDateTextBox.val(dateText);
					}
				}
				else {
					startDateTextBox.val(dateText);
				};
				$(\'#start_date\').datepicker(\'setEndDate\', dateText);
				$(\'#end_date\').datepicker(\'hide\');
			});
			
			
			$(\'#mission_table\').dataTable({
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"aaSorting": [[ 0, "asc" ]],
				"aoColumns": [
					{ "sType": "formatted-num" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" },
					{ "sType": "string" }
				]
			});
		});

         function getExtendform(participationId)
         {
             var ts = Math.round((new Date()).getTime() / 1000);
             if(participationId != \'undefined\')
             {
                 var target_page = "/ao/over-due?action_from=popup&from=listm&timestamp="+ts+"&participationId="+participationId;
                 $.post(target_page, function(data){ 

                    $("#extendtimecontent").html(data);
					
					if (CKEDITOR.instances[\'extend_comment_\'+participationId])
                     {
                         CKEDITOR.instances[\'extend_comment_\'+participationId].destroy();
                     }
                     /////////////////////////////////
                     var editor = CKEDITOR.replace( \'extend_comment_\'+participationId,
                             {
                                 language: \'de\',
                                 uiColor: \'#D9DDDC\',
                                 enterMode : CKEDITOR.ENTER_BR,
                                 removePlugins : \'resize\',
                                 toolbar :
                                         [
                                             [\'Undo\',\'Redo\'],
                                             [\'Find\',\'Replace\',\'-\',\'SelectAll\',\'RemoveFormat\'],
                                             [\'Link\', \'Unlink\', \'Image\'],
                                             \'/\',
                                             [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
                                             [\'NumberedList\',\'BulletedList\',\'-\',\'Blockquote\'],
                                             [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\']
                                         ],
                             }
                     );
                 });

             }

         }
         
		function fnloadmission()
		{
            var cclient=$(\'#client_list\').val();
            var ccmission=$(\'#def_mission\').val();
            $.ajax({
            url: "/ao/listaoload?client="+cclient+"&mission="+ccmission,
            global: false,
            type: "POST",
            dataType: "html",
            async:false,
            success: function(msg){ //alert(msg);
				
                $(\'#mission_load\').html(msg);
				$("#mission_list").chosen({ allow_single_deselect: true });	
			}
           });
		}
		
		function clearAll()
        {
            $(\'#start_date\').attr(\'value\', \'\');
            $(\'#end_date\').attr(\'value\', \'\');
			$("#pay_status option").removeAttr("selected");
            $("#pay_status").val(\'\').trigger("liszt:updated");
			//$("#pay_status option[value=all]").attr("selected", "");
			$("#mission_list option").removeAttr("selected");
			$("#mission_list").val(\'\').trigger("liszt:updated");
			$("#client_list option").removeAttr("selected");
			$("#client_list").val(\'\').trigger("liszt:updated");
			$("#sorttype option").removeAttr("selected");
			$("#sorttype").val(\'all\').trigger("liszt:updated");
		}
        
		function closeMission(artid)
        {
             var confirmation = confirm("Do you really want to close this mission")
             if(confirmation)
             {
                 $.ajax({
                     url: "/ao/closemission?artid="+artid,
                     global: false,
                     type: "GET",
                     dataType: "html",
                     async:false,
                     success: function(msg){ //alert(msg);
                         location.reload();
                         $(\'#\'+artid).html(\'CLOSED\');
                     }
                 });
             }
             else
                 return false;
        }
		
     </script>

'; ?>


<div class="row-fluid">
  <div class="span12">
		<h3 class="heading">List of Missions Freedom<a onclick="$('#searchblock').toggle();"  class="btn btn-gebo1" style="float:right">Search</a></h3>
			<form action="/ao/listallmissions?submenuId=ML2-SL20" method="GET" id="searchform" name="searchform">
				<input type="hidden" name="submenuId" value="ML2-SL4"/>
				<div class="hide well clearfix" id="searchblock">
					<table width="100%">
						<tr>
							<td valign="top">Date of creation</td>
							<td nowrap>
								<input type="text" id="start_date" name="start_date" value="<?php echo $_GET['start_date']; ?>
" readonly placeholder="From" data-date-format="dd/mm/yyyy" />
								<input type="text" id="end_date" name="end_date"  value="<?php echo $_GET['end_date']; ?>
"  readonly placeholder="To" data-date-format="dd/mm/yyyy"/>
							</td>
							<td valign="top">Payment Status</td>
							<td>
								<select name="pay_status" id="pay_status">
									<option value=""></option>
									<option value="all" <?php if ($_GET['pay_status'] == 'all'): ?> selected<?php endif; ?>>All</option>
									<option value="paid" <?php if ($_GET['pay_status'] == 'paid'): ?> selected<?php endif; ?>>Paid</option>
									<option value="notpaid" <?php if ($_GET['pay_status'] == 'notpaid'): ?> selected<?php endif; ?>>Pending</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top">Client</td> 
							<td>
								 <form method="post">
									<?php echo smarty_function_html_options(array('name' => 'client_list','id' => 'client_list','options' => $this->_tpl_vars['client_array'],'selected' => $this->_tpl_vars['clientList'],'onChange' => "fnloadmission();"), $this);?>

									<input type="hidden" name="def_mission" id="def_mission" value="<?php echo $this->_tpl_vars['def_mission']; ?>
"/>
								 </form>
							</td>
							<td id="missionlist">Delivery</td>
							<td valign="top">
								<span id="mission_load">
									 <select id="mission_list" name="mission_list" data-placeholder="SELECT OPTION" >
										<?php echo smarty_function_html_options(array('id' => 'mission_list','options' => $this->_tpl_vars['delivery_array'],'selected' => $this->_tpl_vars['missionList']), $this);?>
  
									</select>
								</span>
							</td>
						</tr>
						<tr>	
							<td valign="top">Trier par</td>
							<td>
								<select name="sorttype" id="sorttype">
									<option value="all" <?php if ($this->_tpl_vars['sorttype'] == 'all' || $this->_tpl_vars['sorttype'] == ''): ?>SELECTED<?php endif; ?>>All</option>
									<option value="upcoming" <?php if ($this->_tpl_vars['sorttype'] == 'upcoming'): ?>SELECTED<?php endif; ?>>Pending BO</option>
									<option value="new" <?php if ($this->_tpl_vars['sorttype'] == 'new'): ?>SELECTED<?php endif; ?>>New</option>
									<option value="ongoing" <?php if ($this->_tpl_vars['sorttype'] == 'ongoing'): ?>SELECTED<?php endif; ?>>Ongoing</option>
									<option value="published" <?php if ($this->_tpl_vars['sorttype'] == 'published'): ?>SELECTED<?php endif; ?>>Pay</option>
								</select>
							</td>		
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td colspan="5" align="right">
								<input type="submit" value="Search" name="search_button" id="search_button" class="btn btn-success"/>
								<input type="reset" value="Clear" name="clearall" id="clearall" class="btn btn-danger" onclick="clearAll();"/>
							</td>
						</tr>
					</table>
				</div>
			</form>
        <table class="table table-bordered table-striped table_vam" id="mission_table">
	  		<thead>
				<tr>
                    <th>S no.</th>
                    <th>Delivery</th>
                    <th>Client</th>
                    <th>Participants</th>
                    <th>Created at</th>
                    <th>Status</th>
                    <th>Billing</th>
                    <th>Payment type</th>
                    <th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mission_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mission_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission_item']):
        $this->_foreach['mission_loop']['iteration']++;
?>
				<tr>
					<td><?php echo ($this->_foreach['mission_loop']['iteration']-1)+1; ?>
</td>
					<td style="text-align:left"><?php echo ((is_array($_tmp=$this->_tpl_vars['mission_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
					<td align="left" style="text-align:left">
						<a href="javascript:void(0);" class="hint--right hint--info" data-hint="Connect to FO" onClick="connect_fo('client', '<?php echo $this->_tpl_vars['mission_item']['email']; ?>
', '<?php echo $this->_tpl_vars['mission_item']['password']; ?>
');"><i class="splashy-contact_blue"></i></a>&nbsp;<?php if ($this->_tpl_vars['mission_item']['company_name'] != ''): ?><?php echo $this->_tpl_vars['mission_item']['company_name']; ?>
 <?php else: ?> <a href="javascript:void(0);" title="<?php echo $this->_tpl_vars['mission_item']['email']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['mission_item']['email'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 16, "...", true) : smarty_modifier_truncate($_tmp, 16, "...", true)); ?>
</a><?php endif; ?>&nbsp;(<?php echo $this->_tpl_vars['mission_item']['email']; ?>
)
					</td>
					<td><?php if ($this->_tpl_vars['mission_item']['userCount'] != ''): ?> <?php echo $this->_tpl_vars['mission_item']['userCount']; ?>
 <?php else: ?> 0 <?php endif; ?></td>
					<td><div style="display:none;"><?php echo $this->_tpl_vars['mission_item']['created_at']; ?>
</div><?php echo ((is_array($_tmp=$this->_tpl_vars['mission_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</td>
					<td>
						<?php if ($this->_tpl_vars['mission_item']['status'] == ''): ?> 
							<?php if ($this->_tpl_vars['mission_item']['status_bo'] != 'active' || ( $this->_tpl_vars['mission_item']['publishtime'] != "" && $this->_tpl_vars['mission_item']['publishtime'] > $this->_tpl_vars['now'] )): ?>
								Waiting BO
							<?php else: ?>
								New
							<?php endif; ?>		
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mission_item']['status'] == 'disapprove_client'): ?> Refusal resoum <?php endif; ?>
						<?php if ($this->_tpl_vars['mission_item']['status'] == 'bid_nonpremium'): ?>Select writer  <?php endif; ?>
						<?php if ($this->_tpl_vars['mission_item']['status'] == 'bid_nonpremium_timeout'): ?>  time out <?php endif; ?>
						<?php if ($this->_tpl_vars['mission_item']['status'] == 'under_study'): ?>Article sent<?php endif; ?>
						<?php if ($this->_tpl_vars['mission_item']['status'] == 'closed_client'): ?>Mission closed <?php endif; ?>
						<?php if ($this->_tpl_vars['mission_item']['status'] == 'published'): ?>Pay <?php endif; ?>
						<?php if ($this->_tpl_vars['mission_item']['status'] == 'closed_client_temp'): ?> Temp Closed <?php endif; ?>
						<?php if ($this->_tpl_vars['mission_item']['status'] == 'time_out'): ?><a href="javascript:void(0);" data-toggle="modal" data-target="#extendtime" onclick="return getExtendform('<?php echo $this->_tpl_vars['mission_item']['partId']; ?>
');">Extend Delivery time</a><?php endif; ?>
						<?php if ($this->_tpl_vars['mission_item']['status'] == 'bid'): ?> <a href="javascript:void(0);" data-toggle="modal" data-target="#extendtime" onclick="return getExtendform('<?php echo $this->_tpl_vars['mission_item']['partId']; ?>
');">Ongoing </a><?php endif; ?>
					</td>
					<td>
						<?php if ($this->_tpl_vars['mission_item']['paid_status'] == 'paid'): ?>
							Paid
						<?php else: ?>
							Not paid
						<?php endif; ?>
					</td>
					<td>
						<?php if ($this->_tpl_vars['mission_item']['artpayment']['pay_type'] != ""): ?>
							<?php echo $this->_tpl_vars['mission_item']['artpayment']['pay_type']; ?>

						<?php else: ?>
							Client
						<?php endif; ?>
					</td>
					<td>
						<a onclick="return closeMission('<?php echo $this->_tpl_vars['mission_item']['art_id']; ?>
');" style="cursor: pointer">Close</a>
						<!--<a class="hint--left hint--info" data-hint="Connect to FO" href="javascript:void(0);" onClick="connect_fo('client', '<?php echo $this->_tpl_vars['mission_item']['email']; ?>
', '<?php echo $this->_tpl_vars['mission_item']['password']; ?>
');"><img width="16" height="16" border="0" src="/image/picto/redirect.gif" ></a>-->
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			</tbody>
		</table>
		<?php if ($_GET['pay_status'] == 'paid'): ?>
			<div align="center" style="padding-top:20px;">
				<b>Turnover: <span class="label label-important"><?php echo ((is_array($_tmp=$this->_tpl_vars['turnover'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
&nbsp;&euro;</span></b></br></br>
				<b>Margin: <span class="label label-important"><?php echo ((is_array($_tmp=$this->_tpl_vars['margin'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
&nbsp;&euro;</span></b>
			</div>
		<?php endif; ?>
	</div>	
</div>
	
<div style="text-align: center;padding-top: 50px;margin-top: 50px;">
  <?php $this->assign('urlstring', $_SERVER['REQUEST_URI']); ?>
        <?php $this->assign('pageurl', ((is_array($_tmp=$this->_tpl_vars['urlstring'])) ? $this->_run_mod_handler('explode', true, $_tmp, "&") : smarty_modifier_explode($_tmp, "&"))); ?>
    <?php if ($_GET['search_button']): ?>
        <?php $this->assign('urlstring1', ((is_array($_tmp=$this->_tpl_vars['urlstring'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['pageurl'][13], "download=download") : smarty_modifier_replace($_tmp, $this->_tpl_vars['pageurl'][13], "download=download"))); ?>
    <?php else: ?>
        <?php $this->assign('urlstring1', "/ao/listallmissions?submenuId=ML2-SL4&download=download"); ?>
    <?php endif; ?>
</div>

<!--Extend time-->
	<div class="modal hide fade" id="extendtime">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">&times;</button>
			<h3>Extend Time </h3>
		</div>
		<div class="modal-body" id="extendtimecontent">
		</div>
		<div class="modal-footer">
		</div>
	</div>
<div id="fadeblock"></div>
	
<div style="visibility:hidden" >
    <form id="user_login_form" name="user_login_form" method="post" action="" target="_blank">
        <input type="text" id="login_name" name="login_name" value="">
        <input type="password" id="login_password" name="login_password" value="<?php echo $this->_tpl_vars['user_detail'][0]['password']; ?>
" >
        <input type="text" id="redirect_value" name="redirect_value" value="billing" >
        <input type="submit" value="Login" />
    </form>
</div>

<?php echo '
<script type="text/javascript" >
    function connect_fo(user,email,pwd)
    {
        document.forms["user_login_form"].action="http://ep-test.edit-place.co.uk/index/userfologin";
        $(\'#login_name\').val(email);
        $(\'#login_password\').val(pwd);
        document.forms["user_login_form"].submit();
    }
</script>
'; ?>

