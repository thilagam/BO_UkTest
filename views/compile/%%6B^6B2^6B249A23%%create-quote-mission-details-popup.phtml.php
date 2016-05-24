<?php /* Smarty version 2.6.19, created on 2016-04-13 07:53:28
         compiled from gebo-new/quote/create-quote-mission-details-popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo-new/quote/create-quote-mission-details-popup.phtml', 74, false),)), $this); ?>

 <?php if ($this->_tpl_vars['missions_details'] && $_GET['m_index']): ?>
 <div class="modal-header" style="background-color:#588b58;color:#FFF;">
		   <div class="col-md-11 text-center" >
				<h3 class="text-uppercase">Mission de <?php echo $this->_tpl_vars['missions_details']['product_name']; ?>
 <?php if ($this->_tpl_vars['missions_details']['producttype_name']): ?>/ <?php echo $this->_tpl_vars['missions_details']['producttype_name']; ?>
 <?php endif; ?></h3>
				<p class="grey-text text-uppercase"><?php echo $this->_tpl_vars['missions_details']['language_name']; ?>
 <?php if ($this->_tpl_vars['missions_details']['languagedest_name'] != ""): ?>  >  <?php echo $this->_tpl_vars['missions_details']['languagedest_name']; ?>
 <?php endif; ?></p>
		  </div>
		  <div align="right" style="margin-bottom: 10px;min-height: 120px;">
		  <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || ( ( $this->_tpl_vars['missions_details']['product'] == 'translation' || $this->_tpl_vars['missions_details']['product'] == 'redaction' ) && ( $this->_tpl_vars['user_type'] == 'produser' || $this->_tpl_vars['user_type'] == 'prodmanager' ) ) || ( $this->_tpl_vars['missions_details']['product'] == 'content_strategy' && ( $this->_tpl_vars['user_type'] == 'seouser' || $this->_tpl_vars['user_type'] == 'seomanager' ) )): ?>
		   <a href="/quote-new/create-quote-mission-popup?quote_id=<?php echo $_GET['quote_id']; ?>
&mission=edit&mid=<?php echo $_GET['m_index']; ?>
" data-dismiss="modal" class="btn btn-simple"  data-toggle="modal" data-target="#mission-step" style="color: #fff"><span class="glyphicon glyphicon-pencil"></span></a>
		   <a href="/quote-new/duplicate-quote-mission-popup?quote_id=<?php echo $_GET['quote_id']; ?>
&mission=duplicate&mid=<?php echo $_GET['m_index']; ?>
" data-dismiss="modal" class="btn btn-simple"  data-toggle="modal" data-target="#mission-step" style="color: #fff"><span class="glyphicon glyphicon-duplicate"></span></a>
		   <a  class="btn btn-simple delete-mission" style="color: #fff" rel="<?php echo $_GET['m_index']; ?>
" data-id='mid' <?php if ($this->_tpl_vars['missions_details']['linked_product']): ?>data-link="<?php echo $this->_tpl_vars['missions_details']['linked_product']; ?>
"<?php endif; ?>><span class="glyphicon glyphicon-remove"></span></a>
		   <?php endif; ?>
			<a class="close btn btn-simple" data-dismiss="modal" aria-label="Close" style="color: #fff"><span class="glyphicon glyphicon-minus"></span></a>
		   </div>
		   
	  </div>
	  <div class="modal-body">
		<!--<span class="label label-info">INFOS</span>
		<span class="label label-success">COMMENTS</span>-->
		
		<h4>Mission Informations</h4>
		
		<div align="center">	
			<p>MISSION TYPE : <strong><?php echo $this->_tpl_vars['missions_details']['product_name']; ?>
</strong></p>
			<p>LANGUAGE : <strong><?php echo $this->_tpl_vars['missions_details']['language_name']; ?>
</strong></p>
			<?php if ($this->_tpl_vars['missions_details']['languagedest_name'] != ""): ?>
			<p>LANGUAGE DESTINATION: <strong><?php echo $this->_tpl_vars['missions_details']['languagedest_name']; ?>
</strong></p>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['missions_details']['product_name'] != 'Content Strategy'): ?>
					<p>PRODUCT TYPE : <strong><?php echo $this->_tpl_vars['missions_details']['producttype_name']; ?>
</strong></p>
					<p>WORDS : <strong><?php echo $this->_tpl_vars['missions_details']['nb_words']; ?>
</strong></p>
					<p>VOLUME : <strong><?php echo $this->_tpl_vars['missions_details']['volume']; ?>
</strong></p>
					<?php if ($this->_tpl_vars['missions_details']['oneshot'] == 'yes'): ?>
					<p>TEMPO :  <strong>One Shot</strong></p>
					<?php else: ?>
					<p>TEMPO :  <strong>Recurring</strong></p>
					<p>TEMPO DETAILS :  <strong><?php echo $this->_tpl_vars['missions_details']['volume_max']; ?>
 <?php echo $this->_tpl_vars['tempo_array'][$this->_tpl_vars['missions_details']['tempo_type']]; ?>
 <?php echo $this->_tpl_vars['volume_option_array'][$this->_tpl_vars['missions_details']['delivery_volume_option']]; ?>
 <?php echo $this->_tpl_vars['missions_details']['tempo_length']; ?>
 <?php echo $this->_tpl_vars['tempo_duration_array'][$this->_tpl_vars['missions_details']['tempo_length_option']]; ?>
</strong></p>
					<?php endif; ?>
			<?php else: ?>
					<?php if ($this->_tpl_vars['missions_details']['mission_length']): ?>
					<p>MISSION DURATION : <strong><?php echo $this->_tpl_vars['missions_details']['mission_length']; ?>
 <?php if ($this->_tpl_vars['missions_details']['mission_length_option'] == 'days'): ?>JOURS<?php else: ?><?php echo $this->_tpl_vars['missions_details']['mission_length_option']; ?>
<?php endif; ?></strong></p>
					<?php else: ?>
					<p>MISSION DURATION : <strong>Je ne sais pas</strong></p>
					<?php endif; ?>
			<?php endif; ?>
		</div>
	  </div>
<?php endif; ?>
<?php if ($this->_tpl_vars['techmission_details'] && $_GET['t_index']): ?>
<div class="modal-header" style="background-color:#588b58;color:#FFF;">
		   <div class="col-md-11 text-center" >
				<h3 class="text-uppercase">Mission de  <?php echo $this->_tpl_vars['techmission_details']['product']; ?>
 / <?php echo $this->_tpl_vars['techmission_details']['tech_type']; ?>
</h3>
				<p class="grey-text text-uppercase"><?php echo $this->_tpl_vars['techmission_details']['product']; ?>
</p>
		  </div>
		  <div align="right" style="margin-bottom: 10px;min-height: 120px;">
		  <?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'techmanager' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'techuser'): ?>
		   <a href="/quote-new/create-quote-mission-popup?quote_id=<?php echo $_GET['quote_id']; ?>
&techmission=edit&tid=<?php echo $_GET['t_index']; ?>
" data-dismiss="modal" class="btn btn-simple"  data-toggle="modal" data-target="#mission-step" style="color: #fff"><span class="glyphicon glyphicon-pencil"></span></a>
		   <a href="/quote-new/duplicate-quote-mission-popup?quote_id=<?php echo $_GET['quote_id']; ?>
&techmission=duplicate&tid=<?php echo $_GET['t_index']; ?>
" data-dismiss="modal" class="btn btn-simple"  data-toggle="modal" data-target="#mission-step" style="color: #fff"><span class="glyphicon glyphicon-duplicate"></span></a>
		   <a  class="btn btn-simple delete-mission" style="color: #fff" rel="<?php echo $_GET['t_index']; ?>
" data-id='tid'><span class="glyphicon glyphicon-remove"></span></a>
		   <?php endif; ?>
			<a class="close btn btn-simple" data-dismiss="modal" aria-label="Close" style="color: #fff"><span class="glyphicon glyphicon-minus"></span></a>
		   </div>
		   
	  </div>
	  <div class="modal-body">
		<!--<span class="label label-info">INFOS</span>
		<span class="label label-success">COMMENTS</span>-->
		
		<h4>Mission Informations</h4>
		
		<div align="center">	
			<p>MISSION TYPE : <strong class="text-uppercase"><?php echo $this->_tpl_vars['techmission_details']['product']; ?>
</strong></p>
			<p>TECH TITLE : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['techmission_details']['tech_type'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</strong></p>
			<p>TECH LANGUAGE : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['techmission_details']['language'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</strong></p>
			<p>VOLUME : <strong><?php echo $this->_tpl_vars['techmission_details']['volume']; ?>
</strong></p>
			<?php if ($this->_tpl_vars['techmission_details']['tech_oneshot'] == 'yes'): ?>
			<p>TEMPO :  <strong>One Shot</strong></p>
			<?php else: ?>
			<p>TEMPO :  <strong>Recurring</strong></p>
			<p>TEMPO DETAILS :  <strong><?php echo $this->_tpl_vars['techmission_details']['volume_max']; ?>
 <?php echo $this->_tpl_vars['tempo_array'][$this->_tpl_vars['techmission_details']['tempo_type']]; ?>
 <?php echo $this->_tpl_vars['volume_option_array'][$this->_tpl_vars['techmission_details']['delivery_volume_option']]; ?>
 <?php echo $this->_tpl_vars['techmission_details']['tempo_length']; ?>
 <?php echo $this->_tpl_vars['tempo_duration_array'][$this->_tpl_vars['techmission_details']['tempo_length_option']]; ?>
</strong></p>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['techmission_details']['tech_mission_length']): ?>
			<p>MISSION DURATION : <strong><?php echo $this->_tpl_vars['techmission_details']['tech_mission_length']; ?>
 <?php if ($this->_tpl_vars['techmission_details']['tech_mission_length_option'] == 'days'): ?>JOURS<?php else: ?><?php echo $this->_tpl_vars['techmission_details']['tech_mission_length_option']; ?>
<?php endif; ?></strong></p>
			<?php else: ?>
			<p>MISSION DURATION : <strong>Je ne sais pas</strong></p>
			<?php endif; ?>
		</div>
	  </div>
<?php endif; ?>
<?php echo '

<script type="text/javascript">
	$(document).ready(function(){
		var quote_id=\''; ?>
<?php echo $_GET['quote_id']; ?>
<?php echo '\';
		$(".delete-mission").on(\'click\',function(){
			$("#viewmission").modal(\'hide\');
			var m_id=$(this).attr(\'rel\');
			var id=$(this).attr(\'data-id\');
			if($(this).attr(\'data-link\'))
				var pid=$(this).attr(\'data-link\');

			utl=\'/quote-new/delete-quote-mission?quote_id=\'+quote_id+\'&\'+id+\'=\'+m_id;
			swal(
			{
				title: "Are you sure?",
            	    text: "You will not be able to recover this mission!",
            	    type: "warning",
            	    showCancelButton: true,
            	    confirmButtonText: "Yes, delete it!",
            	    cancelButtonText: "No, cancel plx!",
            	    closeOnConfirm: false,
            	    closeOnCancel: false
                },function(isConfirm)
                {
                    if (isConfirm)
					{
						$.ajax
						({
							url:utl,
							success:function(html)
							{
								//alert(html);
								if(id==\'tid\')
								{
									$("table tr#tmid_"+m_id).remove();
								}
								else
								{
									$("table tr#"+id+\'_\'+m_id).remove();
									if(pid)
									{
										techid=pid.split(",");
											
										if(techid ){
											for(var i=0; i<techid.length; i++){
											   $("table tr#tmid_"+techid[i]).remove(); //This gets its place
											}
										}
									}
								}
								if($(\'#price-list tr\').length==1)
								{
									location.reload();	
								}
								swal("Deleted!", "Your mission has been deleted.", "success");
								calculateTurnover();
								
							}
						});
					}
					else
					{
						swal("Cancelled", "Your mission not deleted", "error");
					}
				});
			

		});
	});
</script>
'; ?>