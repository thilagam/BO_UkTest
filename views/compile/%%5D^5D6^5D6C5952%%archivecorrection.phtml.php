<?php /* Smarty version 2.6.19, created on 2016-04-14 10:49:23
         compiled from gebo/proofread/archivecorrection.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/proofread/archivecorrection.phtml', 60, false),array('modifier', 'count', 'gebo/proofread/archivecorrection.phtml', 91, false),array('modifier', 'in_array', 'gebo/proofread/archivecorrection.phtml', 93, false),array('modifier', 'date_format', 'gebo/proofread/archivecorrection.phtml', 151, false),)), $this); ?>
<?php echo '
     <script type="text/javascript" >
		
        $(document).ready(function(){
			$("input:text").focus(function () {
				$(this).blur();
			});
           $(\'#archieve_table\').dataTable({
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
					{ "sType": "string" }
				]
			});
		});
        
        function getSendComments(partId, artId, userId)
        {
            if(userId == 0)
            {
                var target_page = "/proofread/getcorrectorcomments?partId="+partId+"&stage=s2&artId="+artId;
            }
            else if(partId == 0)
            {
                var target_page = "/proofread/getallbousercomments?userId="+userId+"&artid="+artId;
            }
            $.post(target_page, function(data){ 
                $("#comment").addClass("in")
				$("#comment").css("display","block");
				$("#fadeblock").addClass("modal-backdrop fade in");
				$("#fadeblock").show();
				$("#commentlist").html(data);  
            });
        }
		
		function closeModal()
		{
			$("#comment").hide();
			$("#fadeblock").hide();
		}
    </script>
 '; ?>


<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Article Process :: Archive Details </h3>
		<div align="right" style="padding:10px">
			<input type="submit" class="btn btn-info" value="Retour" name="archive_retour" onClick="window.location='/proofread/validrefusedarts?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleId=<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
';">
		</div>
		<table class="table table-bordered table-striped">
			<tr>
				<td><b>Arile Title</b></td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
				<td><b>Delivery Title</b></td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['deliveryTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
			</tr>
			<tr>
				<td><b>Article Type</b></td>
				<td><?php echo $this->_tpl_vars['articledetails'][0]['type']; ?>
</td>
				<td><b>Sign Type</b></td>
				<td><?php echo $this->_tpl_vars['articledetails'][0]['sign_type']; ?>
</td>
			</tr>	
			<tr>
				<td><b>Min <?php echo $this->_tpl_vars['articledetails'][0]['sign_type']; ?>
</b></td>
				<td><?php echo $this->_tpl_vars['articledetails'][0]['num_min']; ?>
</td>
				<td><b>Max <?php echo $this->_tpl_vars['articledetails'][0]['sign_type']; ?>
</b></td>
				<td><?php echo $this->_tpl_vars['articledetails'][0]['num_max']; ?>
</td>
			</tr>
			<tr>
				<td><b>Spec File</b></td>
				<?php if ($this->_tpl_vars['articledetails'][0]['filepath'] != NULL): ?>
					<td><a href="/proofread/downloadarticle?spec=<?php echo $this->_tpl_vars['articledetails'][0]['id']; ?>
" >Download</a></td>
				<?php else: ?>
				  <td>No files available</td>
				<?php endif; ?>
				<td></td>
				<td></td>
			</tr>
	   </table>
	   
	   <div class="w-box" style="padding: 20px 0px; box-shadow: none;">
			<div class="w-box-header">Options selected by the client</div>
			<div class='w-box-content'>
			   <?php if (count($this->_tpl_vars['res_seltdopts']) != 0): ?>
				   <?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['options_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['options_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['options_key'] => $this->_tpl_vars['options_item']):
        $this->_foreach['options_loop']['iteration']++;
?>
					    <?php if (((is_array($_tmp=$this->_tpl_vars['options_item']['id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['res_seltdopts']) : in_array($_tmp, $this->_tpl_vars['res_seltdopts']))): ?>
							<div>
								<input type="checkbox" name="option_<?php echo $this->_tpl_vars['options_item']['id']; ?>
" id="option_<?php echo $this->_tpl_vars['options_item']['id']; ?>
" <?php echo $this->_tpl_vars['options_item']['id']; ?>
/>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['options_item']['option_name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>

						   </div>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				<?php else: ?>
					* No Options are choosen<br>
				<?php endif; ?>	
			<input type="hidden" name="hid_options" id="hid_options" value=<?php if (count($this->_tpl_vars['res_seltdopts']) != 0): ?><?php echo count($this->_tpl_vars['res_seltdopts']); ?>
<?php else: ?><?php echo 0; ?>
<?php endif; ?> />
			</div>
		</div>
		<br>
		<table class="table table-bordered table-striped" id="archieve_table">
			<thead>
				<tr>
					<th>Version</th>
					<th>file name</th>
					<th>User Name</th>
					<th>Stage</th>
					<th>Status</th>
					<th>Date & Time</th>
					<th>Article</th>
				</tr>
			</thead>
			<tbody>
			<?php $_from = $this->_tpl_vars['partsOfArt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['archieve_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['archieve_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article_item']):
        $this->_foreach['archieve_loop']['iteration']++;
?>
				<tr>
					<td><?php echo $this->_tpl_vars['article_item']['version']; ?>
</td>
					<td><?php echo $this->_tpl_vars['article_item']['article_name']; ?>
</td>
					<td>
						<?php if ($this->_tpl_vars['article_item']['type'] == 'contributor'): ?>
							<?php if ($this->_tpl_vars['article_item']['first_name'] != ""): ?>
								<?php echo $this->_tpl_vars['article_item']['first_name']; ?>

							<?php else: ?>
								<?php echo $this->_tpl_vars['article_item']['email']; ?>

							<?php endif; ?>
						<?php else: ?>
							<?php echo $this->_tpl_vars['article_item']['login']; ?>

						<?php endif; ?>	
					</td>
					<td>
						<?php if ($this->_tpl_vars['article_item']['stage'] == 's1'): ?>
							Stage 1
						<?php else: ?>
							Stage 2
						<?php endif; ?>	
					</td>
					<td>
						<?php if ($this->_tpl_vars['article_item']['status'] == ""): ?>
							New
						<?php elseif ($this->_tpl_vars['article_item']['status'] == 'process'): ?>	
							Revised
						<?php else: ?>
							<?php echo $this->_tpl_vars['article_item']['status']; ?>

						<?php endif; ?>
					</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['article_item']['article_sent_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
</td>
					<td>
						<a class="hint--left hint--info" data-hint="Download Article" href="/proofread/downloadarticle?path=<?php echo $this->_tpl_vars['article_item']['id']; ?>
" ><i class="splashy-document_small_download"></i></a>
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			</tbody>
		</table>
		<div>
            <?php if ($this->_tpl_vars['articledetails'][0]['correction'] == 'yes'): ?>
				<input type="button" class="btn btn-info" value="Commentaire correcteur" name="s2art_comment"  onclick="getSendComments('<?php echo $this->_tpl_vars['partsOfArt'][0]['participate_id']; ?>
', '<?php echo $_GET['articleId']; ?>
', 0);">
            <?php endif; ?>
			<input type="button" class="btn btn-info" name="send_comment" id="send_comment" value="Comment" onclick="getSendComments(0, '<?php echo $_GET['articleId']; ?>
', '<?php echo $this->_tpl_vars['partsOfArt'][0]['user_id']; ?>
')" />
        </div>
	</div>
</div>	  

<!--- Comment ---->
<div class="modal hide fade" id="comment">  
		<div class="modal-header">
			<button class="close" data-dismiss="modal" onClick="closeModal();">&times;</button>
			<h3>Comments</h3>
		</div>
		<div class="modal-body" id="commentlist">
		</div>
		<div class="modal-footer">
		</div>
	</div>
<div id="fadeblock"></div>