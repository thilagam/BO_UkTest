<?php /* Smarty version 2.6.19, created on 2015-03-24 12:52:31
         compiled from gebo/ao/poll.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/ao/poll.phtml', 247, false),array('modifier', 'date_format', 'gebo/ao/poll.phtml', 307, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/datempicker.js"></script>
<script type="text/javascript" charset="ISO-8859-1" src="/BO/theme/gebo/js/custom/validations_poll.js"></script>
    <script type="text/javascript" >
		$(document).ready(function() {
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
			
			$(\'#start_datepublish\').datepicker({language: \'fr\'}).on(\'changeDate\', function(ev){
				var dateText = $(this).val();//data(\'date\');
				
				var endDateTextBox = $(\'#end_datepublish\');
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
				$(\'#end_datepublish\').datepicker(\'setStartDate\', dateText);
				$(\'#start_datepublish\').datepicker(\'hide\');
			});
			
			$(\'#end_datepublish\').datepicker({language: \'fr\'}).on(\'changeDate\', function(ev){
				var dateText = $(this).val();//data(\'date\');
				var startDateTextBox = $(\'#start_datepublish\');				
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
				$(\'#start_datepublish\').datepicker(\'setEndDate\', dateText);
				$(\'#end_datepublish\').datepicker(\'hide\');
			});
			
			$("#client").chosen({ allow_single_deselect: true });	
			$("#category").chosen({ allow_single_deselect: true });	
			$("#sorttype").chosen({ allow_single_deselect: true });	
			$(".uni_style").uniform(); 
			
		
			 $(\'#polltable\').dataTable({
				"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"aaSorting": [[ 1, "asc" ]],
				"aoColumns": [
					{ "sType": "string" },
					{ "sType": "formatted-num" },
					{ "sType": "string" },
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
		} );
    		
		$(function()
		{
		  var hideDelay = 50;
		  var hideTimer = null;

		  // One instance that\'s reused to show info for the current poll
		  var container = $(\'#pollPopupContainer\');
		  $(\'body\').append(container);

		  //Poll mouseover
		  $(\'.pollPopupTrigger\').live(\'click\', function()
		  {
			  var settng=$(this).attr(\'rel\').split(",");
			  var polllid = settng[0];
			  var contype = settng[1];
			  var tooltype = \'poll\';
             
			  if (hideTimer)
				  clearTimeout(hideTimer);

			  var pos = $(this).offset();
			  var width = $(this).width();
			  container.css({
				  left: (pos.left + width) + \'px\',
				  top: pos.top - 80 + \'px\'
			  });

			  $(\'#pollPopupContent\').html(\'<img src="http://www.h2obazaar.com/h2obazaarlogin/images/loading.gif" />\');

			  $.ajax({
				  type: \'GET\',
				  url: \'/ao/pollpopup\',
				  data: \'poll=\' + polllid + \'&tooltype=\' + tooltype + \'&contribtype=\' +contype, 
				  success: function(data)
				  {   
					$(\'#pollPopupContent\').html(data);
				  }	
			  });

			  container.css(\'display\', \'block\');
		  });
		  
		  // Allow mouse over of details without hiding details
		  $(\'#pollPopupContainer\').mouseover(function()
		  {
			  if (hideTimer)
				  clearTimeout(hideTimer);
		  });

		  // Hide after mouseout
		  $(\'#pollPopupContainer\').mouseout(function()
		  {
			  if (hideTimer)
				  clearTimeout(hideTimer);
			  hideTimer = setTimeout(function()
			  {
				  container.css(\'display\', \'none\');
			  }, hideDelay);
		  });
		});

		
		
		function selectALL()
		{
		   if($("#select_all").attr(\'checked\'))
		   {
			  var $b = $(\'input[type=checkbox]\');
			  $b.attr(\'checked\', true);
		   }
		   else
		   {
			   var $b = $(\'input[type=checkbox]\');
			   $b.attr(\'checked\', false);
		   }
		}
		
		function clearAll()
        {
			$(\'#start_date\').attr(\'value\', \'\');
            $(\'#end_date\').attr(\'value\', \'\'); 
			$(\'#start_datepublish\').attr(\'value\', \'\');
            $(\'#end_datepublish\').attr(\'value\', \'\'); 
			$("#client option").removeAttr("selected");
			$("#client").val(\'all\').trigger("liszt:updated");
			$("#category option").removeAttr("selected");
			$("#category").val(\'all\').trigger("liszt:updated");
			$("#sorttype option").removeAttr("selected");
			$("#sorttype").val(\'notclosed\').trigger("liszt:updated");
        }
    </script>
	
<style>
	#pollPopupContainer{ position:absolute; left:0; top:0; display:none; z-index: 1000; }
	#pollPopupContent { background-color: #FFF; min-width: 250px; min-height: 150px; z-index: 1000; }
	.pollPopupPopup .personPopupImage { margin: 0px; margin-right: 5px; }
	.pollPopupPopup .corner { width: 19px; height: 15px; }
	.pollPopupPopup .topLeft { background: url(/BO/theme/gebo/img/balloon_topLeft.png) no-repeat; }
	.pollPopupPopup .bottomLeft { background: url(/BO/theme/gebo/img/balloon_bottomLeft.png) no-repeat; }
	.pollPopupPopup .left { background: url(/BO/theme/gebo/img/balloon_left.png) repeat-y; }
	.pollPopupPopup .right { background: url(/BO/theme/gebo/img/balloon_right.png) repeat-y; }
	.pollPopupPopup .topRight { background: url(/BO/theme/gebo/img/balloon_topRight.png) no-repeat; }
	.pollPopupPopup .bottomRight { background: url(/BO/theme/gebo/img/balloon_bottomRight.png) no-repeat; }
	.pollPopupPopup .toptool { background: url(/BO/theme/gebo/img/balloon_top.png) repeat-x; }
	.pollPopupPopup .bottomtool { background: url(/BO/theme/gebo/img/balloon_bottom.png) repeat-x; text-align: center; }
</style>
	'; ?>


<div class="row-fluid">
  <div class="span12">
	 <h3 class="heading">Poll<a onclick="$('#searchblock').toggle();"  class="btn btn-gebo1" style="float:right">Search</a></h3>
		<form action="/ao/poll?submenuId=ML2-SL17" method="GET" name="formsearchpoll">
			<div class="hide well clearfix" id="searchblock">
				<input type="hidden" name="submenuId" id="submenuId" value="<?php echo $_GET['submenuId']; ?>
" />
				<table width="100%">
					<tr>
						<td valign="top">Date of creation</td>
						<td nowrap>
							<input type="text" id="start_date" name="start_date" value="<?php echo $this->_tpl_vars['start_date']; ?>
" placeholder="From" data-date-format="dd-mm-yyyy" style="width:120px;"/>
							<input type="text" id="end_date" name="end_date"  value="<?php echo $this->_tpl_vars['end_date']; ?>
" placeholder="To" data-date-format="dd-mm-yyyy" style="width:120px;"/>
						</td>
						<td valign="top">Date of finish</td>
						<td nowrap>
							<input type="text" id="start_datepublish" name="start_datepublish" value="<?php echo $this->_tpl_vars['start_datepublish']; ?>
" placeholder="From" data-date-format="dd-mm-yyyy" style="width:120px;" />
							<input type="text" id="end_datepublish" name="end_datepublish"  value="<?php echo $this->_tpl_vars['end_datepublish']; ?>
" placeholder="To" data-date-format="dd-mm-yyyy" style="width:120px;"/>
						</td>
					</tr>
					<tr>
						<td valign="top">Client</td>
						<td> 
							<select name="client" id="client"> 
								<option value="all">All</option>
								<?php $_from = $this->_tpl_vars['client_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['clientl']):
?>
									<?php if ($this->_tpl_vars['clientl']['identifier'] == $this->_tpl_vars['client']): ?>
									<option value="<?php echo $this->_tpl_vars['clientl']['identifier']; ?>
" selected><?php echo $this->_tpl_vars['clientl']['name']; ?>
</option>
									<?php else: ?>
									<option value="<?php echo $this->_tpl_vars['clientl']['identifier']; ?>
"><?php echo $this->_tpl_vars['clientl']['name']; ?>
</option>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							</select>
						</td>
						<td valign="top">Category</td>
						<td>
							<select name="category" id="category">
								<option value="all">All</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_art_cat_type'],'selected' => $this->_tpl_vars['category']), $this);?>

							</select>
						</td>
					</tr>
					<tr>
						<td valign="top">Sort by</td>
						<td>
							<select name="sorttype" id="sorttype" >
								<option value="all" <?php if ($this->_tpl_vars['sorttype'] == 'all'): ?>SELECTED<?php endif; ?>>All</option>
								<option value="notclosed" <?php if ($this->_tpl_vars['sorttype'] == 'notclosed' || $this->_tpl_vars['sorttype'] == ''): ?>SELECTED<?php endif; ?>>Not closed</option>
								<option value="closed" <?php if ($this->_tpl_vars['sorttype'] == 'closed'): ?>SELECTED<?php endif; ?>>closed</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
						<td colspan="" align="right">
							<input type="submit" value="Search" name="search_submit" id="search_submit" class="btn btn-success"/>
							<input type="reset" value="Clear" name="clearall" id="clearall" class="btn btn-danger" onclick="clearAll();"/>
						</td>
					</tr>
				</table>
			</div>
		</form>
	
	<form action="/ao/poll?submenuId=ML2-SL17" method="post" name="formpoll">
	<table class="table table-bordered table-striped table_vam" id="polltable">
		<thead>
			<tr>
				<th></th>
				<th>ID NO</th>
				<th>Survey title</th>
				<th>Client</th>
				<th>Category</th>
				<th>Date of creation</th>
				<th>Date of finish</th>
				<th>Number of participations</th>
				<th>Status</th>
				<th>Close</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
	 	<?php $_from = $this->_tpl_vars['polllist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['poll_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['poll_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['poll_item']):
        $this->_foreach['poll_loop']['iteration']++;
?>
	        <tr>
               <td>
					<?php if ($this->_tpl_vars['now'] > $this->_tpl_vars['poll_item']['expire'] && $this->_tpl_vars['poll_item']['status'] == 'notclosed'): ?>
						<label class="uni-checkbox">
							<input type="checkbox" name="closecheck[]" id="closecheck_<?php echo $this->_tpl_vars['poll_item']['id']; ?>
" value="<?php echo $this->_tpl_vars['poll_item']['id']; ?>
" class="uni_style"/>
						</label>	
					<?php endif; ?>
			   </td>
			   <td>
					<?php echo ($this->_foreach['poll_loop']['iteration']-1)+1; ?>

				</td>
			    <td>
					<a data-toggle="modal" data-target="#editpoll" OnClick="return editPoll(<?php echo $this->_tpl_vars['poll_item']['id']; ?>
)"><?php echo $this->_tpl_vars['poll_item']['title']; ?>
</a>
				</td>
			   <td><?php echo $this->_tpl_vars['poll_item']['clientname']; ?>
</td>
			   <td><?php echo $this->_tpl_vars['ep_art_cat_type'][$this->_tpl_vars['poll_item']['category']]; ?>
</td>
               <td><div style="display:none;"><?php echo $this->_tpl_vars['poll_item']['created_at']; ?>
</div><?php echo ((is_array($_tmp=$this->_tpl_vars['poll_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</td>
			   <td><div style="display:none;"><?php echo $this->_tpl_vars['poll_item']['poll_date']; ?>
</div><?php echo ((is_array($_tmp=$this->_tpl_vars['poll_item']['poll_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</td>
			   <td>
					<?php if ($this->_tpl_vars['poll_item']['participation'] > 0): ?>
						<a class="pollPopupTrigger" style="cursor: pointer;text-decoration: underline" rel="<?php echo $this->_tpl_vars['poll_item']['id']; ?>
,all"><?php echo $this->_tpl_vars['poll_item']['participation']; ?>
</a>
						<!--<a href="/ao/downloadpollxls?id=<?php echo $this->_tpl_vars['poll_item']['id']; ?>
" style="cursor:pointer;"><img src="/BO/theme/gebo/img/excel.png"/></a>-->
						<a href="/BO/download_pollxls.php?id=<?php echo $this->_tpl_vars['poll_item']['id']; ?>
" style="cursor:pointer;"><img src="/BO/theme/gebo/img/excel.png"/></a>
					<?php else: ?>
						0
					<?php endif; ?>
				</td>
				<td>
					<?php if ($this->_tpl_vars['now'] > $this->_tpl_vars['poll_item']['expire']): ?>
						closed
					<?php else: ?>
						ongoing
					<?php endif; ?>
				</td>
				<td>
					<?php if ($this->_tpl_vars['poll_item']['status'] == 'notclosed'): ?> 
						<?php if ($this->_tpl_vars['now'] > $this->_tpl_vars['poll_item']['expire']): ?> 
							<a style="cursor:pointer;" onClick="closepoll(<?php echo $this->_tpl_vars['poll_item']['id']; ?>
,'0');">NOT CLOSED</a>
						<?php else: ?>
							<a style="cursor:pointer;" onClick="closepoll(<?php echo $this->_tpl_vars['poll_item']['id']; ?>
,'1');">NOT CLOSED</a>
						<?php endif; ?>
					<?php else: ?>
							<a style="cursor:pointer;" onClick="closepoll(<?php echo $this->_tpl_vars['poll_item']['id']; ?>
,'2');">CLOSED</a>
					<?php endif; ?>	
				</td>
				<td>
					<?php if ($this->_tpl_vars['poll_item']['participation'] > 0): ?>
						<a href="/ao/pollmoderateusers?submenuId=ML2-SL17&poll=<?php echo $this->_tpl_vars['poll_item']['id']; ?>
&smic=1" target="_blank" class="hint--left hint--info" data-hint="Participation details"><i class="splashy-view_list"></i></a>
					<?php else: ?>
						-
					<?php endif; ?>	
				</td>
			</tr>
        <?php endforeach; endif; unset($_from); ?>
    	</tbody>
	</table>

	 <div style="float:left;padding:20px 0px 10px 20px;">
		<input type="submit" class="btn btn-info" name="closepll" id="closepll"  onClick="return closepolls();" value="Close all" />
	 </div>
	</form>
  </div>
</div>

	<!--Edit question-->
	<div class="modal hide fade" id="editpoll">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">&times;</button>
			<h3>Poll Edit </h3>
		</div>
		<div class="modal-body" id="editpollcontent">
		</div>
		<div class="modal-footer">
		</div>
	</div>
	
<!-- Poll tool tip -->
	<div id="pollPopupContainer">
		<table width="" border="0" cellspacing="0" cellpadding="0" align="center" class="pollPopupPopup" width="auto">
			<tr>
				<td class="corner topLeft"></td>
				<td class="toptool"></td>
				<td class="corner topRight"></td>
			</tr>
			<tr>
				<td class="left">&nbsp;</td>
				<td><div id="pollPopupContent"></div></td>
				<td class="right">&nbsp;</td>
			</tr>
			<tr>
				<td class="corner bottomLeft">&nbsp;</td>
				<td class="bottomtool">&nbsp;</td>
				<td class="corner bottomRight"></td>
			</tr>
		</table>
     </div>
	 
	 