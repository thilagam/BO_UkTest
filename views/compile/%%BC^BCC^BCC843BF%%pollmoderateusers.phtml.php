<?php /* Smarty version 2.6.19, created on 2013-12-06 11:47:03
         compiled from gebo/ao/pollmoderateusers.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/ao/pollmoderateusers.phtml', 124, false),array('modifier', 'stripslashes', 'gebo/ao/pollmoderateusers.phtml', 138, false),array('modifier', 'zero_cut', 'gebo/ao/pollmoderateusers.phtml', 144, false),array('modifier', 'date_format', 'gebo/ao/pollmoderateusers.phtml', 236, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="ISO-8859-1" src="/BO/theme/gebo/js/custom/validations_poll.js"></script>
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/datempicker.js"></script> 
<script>  
	$(document).ready(function() {
		$(".uni_style").uniform(); 
		$(\'#contribtable\').dataTable({
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
					{ "sType": "string" }
				]
		});
	});
			
	$(function()
		{
			var hideDelay = 50;
			var hideTimer = null;
			
			//User mouseover
		   var container1 = $(\'#contribPopupContainer\');
		  $(\'body\').append(container1);

		  $(\'.contribPopupTrigger\').live(\'click\', function()
		  {
			  // format of \'rel\' tag: userid
			  var userid = $(this).attr(\'rel\');
			  var tooltype = \'user\';

			  if (hideTimer)
				  clearTimeout(hideTimer);

			  var pos = $(this).offset();
			  var width = $(this).width();
			  container1.css({
				  left: (pos.left + width) + \'px\',
				  top: pos.top - 80 + \'px\'
			  });

			  $(\'#contribPopupContent\').html(\'\');
			  $(\'#contribPopupContent\').html(\'<img src="http://www.h2obazaar.com/h2obazaarlogin/images/loading.gif" />\');

			  $.ajax({
				  type: \'GET\',
				   url: \'/ao/pollpopup\',
				  data: \'user=\' + userid + \'&tooltype=\' + tooltype,
				  
				  success: function(data)
				  {  
						  var text = $(data).find(\'.contribPopupResult\').html();
						  $(\'#contribPopupContent\').html(data);

				  }
			  });

			  container1.css(\'display\', \'block\');
		  });

		  $(\'.contribPopupTrigger\').live(\'mouseout\', function()
		  {
			  if (hideTimer)
				  clearTimeout(hideTimer);
			  hideTimer = setTimeout(function()
			  {
				  container1.css(\'display\', \'none\');
			  }, hideDelay);
		  });

		  // Allow mouse over of details without hiding details
		  $(\'#contribPopupContainer\').mouseover(function()
		  {
			  if (hideTimer)
				  clearTimeout(hideTimer);
		  });

		  // Hide after mouseout
		  $(\'#contribPopupContainer\').mouseout(function()
		  {
			  if (hideTimer)
				  clearTimeout(hideTimer);
			  hideTimer = setTimeout(function()
			  {
				  container1.css(\'display\', \'none\');
			  }, hideDelay);
		  });
		  
		});		
	
</script>

<style>
	#contribPopupContainer{ position:absolute; left:0; top:0; display:none; z-index: 2000;text-align:left; }
	#contribPopupContent { background-color: #FFF; min-width: 250px; min-height: 150px; z-index: 1000; }
	.contribPopupPopup .personPopupImage { margin: 0px; margin-right: 5px; }
	.contribPopupPopup .corner { width: 19px; height: 15px; }
	.contribPopupPopup .topLeft { background: url(/BO/theme/gebo/img/balloon_topLeft.png) no-repeat; }
	.contribPopupPopup .bottomLeft { background: url(/BO/theme/gebo/img/balloon_bottomLeft.png) no-repeat; }
	.contribPopupPopup .left { background: url(/BO/theme/gebo/img/balloon_left.png) repeat-y; }
	.contribPopupPopup .right { background: url(/BO/theme/gebo/img/balloon_right.png) repeat-y; }
	.contribPopupPopup .topRight { background: url(/BO/theme/gebo/img/balloon_topRight.png) no-repeat; }
	.contribPopupPopup .bottomRight { background: url(/BO/theme/gebo/img/balloon_bottomRight.png) no-repeat; }
	.contribPopupPopup .toptool { background: url(/BO/theme/gebo/img/balloon_top.png) repeat-x; }
	.contribPopupPopup .bottomtool { background: url(/BO/theme/gebo/img/balloon_bottom.png) repeat-x; text-align: center; }
</style>
'; ?>


<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Participation(s) &agrave; votre devis - <?php echo $this->_tpl_vars['PollParticipationDetails'][0]['title']; ?>
</h3>
	<div align="right" style="padding-right:120px">
		<input type="button" class="btn btn-info" onClick="window.location='/ao/poll?submenuId=ML2-SL17';" value="RETOUR" />
	</div>
	<div>
		Statistics questionnaire responses
	</div>	
	<?php if (count($this->_tpl_vars['pollstats']) > 0): ?>
		<div>
			<br>
			<label class="uni-checkbox">
				<input type="checkbox" name="checksmic" id="checksmic" <?php if ($_GET['smic'] == 1): ?>checked<?php endif; ?> onClick="smicresponse();" class="uni_style" />&nbsp; 
				I want to exclude participants with SMIC calculated is less than the minimum wage in force in the country of each participant
			</label>
			<br><br>
		</div>
	<?php endif; ?>
	<div id="responsestats" style="clear:both;"> 
		<table width="55%" align="center" cellpadding="2" style="" class="w-box-content">
			<?php if (count($this->_tpl_vars['pollstats']) > 0): ?>
				<?php $_from = $this->_tpl_vars['pollstats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['stat']):
?>
					<tr class="w-box-header"><th colspan="4"><?php echo ((is_array($_tmp=$this->_tpl_vars['stat']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</th></tr>
					<?php if ($this->_tpl_vars['stat']['type'] != 'radio' && $this->_tpl_vars['stat']['type'] != 'checkbox' && $this->_tpl_vars['stat']['type'] != 'calendar' && $this->_tpl_vars['stat']['type'] != 'timing'): ?>
						<tr>
							<td width="30%">Number of replies : </td>
							<td align="left"><?php echo $this->_tpl_vars['stat']['partcount']; ?>
</td>
							<td align="right">Minimum : </td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['stat']['min'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
							
						</tr>
						<tr>
							<td colspan="2"></td>
							<td align="right">Maximum : </td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['stat']['max'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td style="font-weight:bold;" align="right">average : </td>
							<td style="font-weight:bold;"><?php echo ((is_array($_tmp=$this->_tpl_vars['stat']['avg'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
						</tr>
					<?php elseif ($this->_tpl_vars['stat']['type'] == 'timing'): ?>	
						<tr>
							<td width="30%">Number of replies : </td>
							<td align="left"><?php echo $this->_tpl_vars['stat']['partcount']; ?>
</td>
							<td align="right">Minimum : </td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['stat']['min'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 <?php echo $this->_tpl_vars['stat']['optionname']; ?>
</td>
							
						</tr>
						<tr>
							<td colspan="2"></td>
							<td align="right">Maximum : </td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['stat']['max'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 <?php echo $this->_tpl_vars['stat']['optionname']; ?>
</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td style="font-weight:bold;" align="right">average : </td>
							<td style="font-weight:bold;"><?php echo ((is_array($_tmp=$this->_tpl_vars['stat']['avg'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 <?php echo $this->_tpl_vars['stat']['optionname']; ?>
</td>
						</tr>
					<?php elseif ($this->_tpl_vars['stat']['type'] == 'calendar'): ?>
						<tr>
							<td>Number of replies : </td>
							<td valign="top"><?php echo $this->_tpl_vars['stat']['partcount']; ?>
</td>
						</tr>
					<?php else: ?>
						<tr>
							<td width="30%">Number of replies : </td>
							<td><?php echo $this->_tpl_vars['stat']['partcount']; ?>
</td>
							<td align="right" valign="top">Options :</td> 
							<td nowrap>
							<?php $_from = $this->_tpl_vars['stat']['optionlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['optionkey'] => $this->_tpl_vars['optionval']):
?>
								<?php echo $this->_tpl_vars['optionkey']; ?>
 - <?php echo $this->_tpl_vars['optionval']; ?>
 <br>
							<?php endforeach; endif; unset($_from); ?>	
							</td>
						</tr>
					<?php endif; ?>
					<tr><td>&nbsp;</td></tr>
				<?php endforeach; endif; unset($_from); ?>
			<?php else: ?> 
				<?php $_from = $this->_tpl_vars['pollquestions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ques']):
?>
					<tr class="w-box-header"><th colspan="4"><?php echo ((is_array($_tmp=$this->_tpl_vars['ques']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</th></tr>
					
					<tr><td>&nbsp;</td></tr>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
		</table>
	</div>
	
	<div style="padding-top:20px">
		<form method="POST" name="pollform">
			<table class="table table-bordered table-striped table_vam" id="contribtable">
				<thead>
					<tr>
					  <th></th>
					  <th>ID</th>
					  <th>Writer</th>
					  <th>Tarif (&euro;)</th>
					  <th>Date of dispatch of quote</th>
					  <th>Filtrer</th>
					  <th>download</th>
					</tr>
				</thead>
				<tbody>
				<?php $_from = $this->_tpl_vars['PollParticipationDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contrib_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contrib_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['condetail_item']):
        $this->_foreach['contrib_loop']['iteration']++;
?>
					<tr>
					   <td>
							<label class="uni-checkbox">
								<input type="checkbox" name="contribtype[]" value="<?php echo $this->_tpl_vars['condetail_item']['id']; ?>
" class="uni_style"/>
							</label>
					   </td>
					   <td><?php echo ($this->_foreach['contrib_loop']['iteration']-1)+1; ?>
</td>
					   <td><a class="contribPopupTrigger" style="cursor: pointer;text-decoration: underline" rel="<?php echo $this->_tpl_vars['condetail_item']['user_id']; ?>
">
							<?php if ($this->_tpl_vars['condetail_item']['first_name'] == ""): ?>
								<?php echo $this->_tpl_vars['condetail_item']['email']; ?>

							<?php else: ?>	
								<?php echo $this->_tpl_vars['condetail_item']['first_name']; ?>

							<?php endif; ?>
							</a>
						</td>
					   <td><div style="display:none;"><?php echo $this->_tpl_vars['condetail_item']['price_user']; ?>
</div><?php echo ((is_array($_tmp=$this->_tpl_vars['condetail_item']['price_user'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</td>
					   <td><div style="display:none;"><?php echo $this->_tpl_vars['condetail_item']['created_at']; ?>
</div><?php echo ((is_array($_tmp=$this->_tpl_vars['condetail_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</td>
					   <td id="partstatus_<?php echo $this->_tpl_vars['condetail_item']['id']; ?>
"><b>
							<?php if ($this->_tpl_vars['condetail_item']['status'] == 'active'): ?>
								<a href="javascript:void(0);" onClick="pollparticipationactive(<?php echo $this->_tpl_vars['condetail_item']['id']; ?>
,'<?php echo $this->_tpl_vars['condetail_item']['status']; ?>
');" style="cursor:pointer;">Exclure</a>
							<?php elseif ($this->_tpl_vars['condetail_item']['status'] == 'inactive'): ?>
								<a href="javascript:void(0);" onClick="pollparticipationactive(<?php echo $this->_tpl_vars['condetail_item']['id']; ?>
,'<?php echo $this->_tpl_vars['condetail_item']['status']; ?>
');" style="cursor:pointer;">Inclure</a>
							<?php else: ?>
								-
							<?php endif; ?></b>
					   </td>
					   <td>
							<!--a href="/ao/questiondetail?poll=<?php echo $_GET['poll']; ?>
&contrib=<?php echo $this->_tpl_vars['condetail_item']['user_id']; ?>
"><img src="/BO/theme/gebo/img/excel.png" /></a>-->
							<a href="/BO/download_questioncontrib.php?poll=<?php echo $_GET['poll']; ?>
&contrib=<?php echo $this->_tpl_vars['condetail_item']['user_id']; ?>
"><img src="/BO/theme/gebo/img/excel.png" /></a>
						</td>
					 </tr>
				<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
			
		 <input type="submit" name="activate_all" id="activate_all" value="Inclure tous" class="btn btn-info" onClick="return updateParticipationall('active');"  />	
		 <input type="submit" name="inactivate_all" id="inactivate_all" value="Exclure tous" class="btn btn-info" onClick="return updateParticipationall('inactive');" />	
		<?php if ($this->_tpl_vars['usertype'] == 'superadmin' || $this->_tpl_vars['usertype'] == 'ceouser'): ?>
			<input type="button" name="brief" id="brief" value="Compl&eacute;ter brief pour la production" class="btn btn-info" data-toggle="modal" data-target="#pollbrief2" onClick="return brief2form();" />	
		<?php endif; ?> 
		<?php if ($this->_tpl_vars['brief'] == 'yes'): ?> 
			<!--<input type="button" name="briefdownload" id="briefdownload" value="Download Brief2" class="btn btn-info" onClick="window.location='/ao/downloadbrief2?poll=<?php echo $_GET['poll']; ?>
'" />-->
			<input type="button" name="briefdownload" id="briefdownload" value="T&eacute;l&eacute;charger brief" class="btn btn-info" onClick="window.location='/BO/download_brief2.php?poll=<?php echo $_GET['poll']; ?>
'" />
		<?php endif; ?> 
		 <input type="hidden" id="pagelimit" name="pagelimit" value="<?php echo $this->_tpl_vars['paginationlimit']; ?>
" />
		 <input type="hidden" id="poll" name="poll" value="<?php echo $_GET['poll']; ?>
" />
		</form>	
	</div>
	</div>
</div>	
	
	<!--Brief2-->
	<div class="modal2 hide fade" id="pollbrief2">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">&times;</button>
			<h3>Compl&eacute;ter brief pour la production </h3>
		</div>
		<div class="modal-body" id="pollbrief2content">
		</div>
		<div class="modal-footer">
		</div>
	</div>
	
	<!-- Participation tool tip -->
	<div id="contribPopupContainer">
		<table width="" border="0" cellspacing="0" cellpadding="0" align="center" class="contribPopupPopup" width="auto">
			<tr>
				<td class="corner topLeft"></td>
				<td class="toptool"></td>
				<td class="corner topRight"></td>

			</tr>
			<tr>
				<td class="left">&nbsp;</td>
				<td><div id="contribPopupContent"></div></td>
				<td class="right">&nbsp;</td>
			</tr>
			<tr>
				<td class="corner bottomLeft">&nbsp;</td>
				<td class="bottomtool">&nbsp;</td>
				<td class="corner bottomRight"></td>
			</tr>
		</table>
     </div> 
