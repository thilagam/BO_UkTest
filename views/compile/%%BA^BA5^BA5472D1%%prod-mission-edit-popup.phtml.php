<?php /* Smarty version 2.6.19, created on 2016-04-19 10:33:04
         compiled from gebo-new/quote/prod-mission-edit-popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut', 'gebo-new/quote/prod-mission-edit-popup.phtml', 141, false),)), $this); ?>
<?php echo '
<script src="/BO/theme/lbd/lib/JsEditable/jquery.jeditable.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/lbd/lib/JsEditable/jquery.jeditable.mini.js" type="text/javascript" charset="utf-8"></script>
<style>
.hm-titles{
	color: #959595;    
    font-size: 12px;
    font-weight: 700;
    left: 15px;
    letter-spacing: 1px;    
    text-transform: uppercase;    
}

.hm-text{
	color: #5B5B5C;    
    font-size: 11px;
    font-weight: 700;
    left: 15px;
    letter-spacing: 1px;    
    text-transform: uppercase;
    top: 15px;
}

.separator{
	border-bottom: 1px solid #d6d7d9;	
	padding-bottom: 5px;
}
.tempoEdit{
	padding:8px;
	background-color:#FFF;
}
#tempo_adjust{
	font-size: 9px !important;
}
select.eventEdit{
	background-color: #fff !important;
}
.popover
{
	z-index: 9999 !important;
}
.xdsoft_datetimepicker
{
z-index: 8888 !important;	
}
</style>
'; ?>



<div class="modal-header" style="background-color:#F2F3F7">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	 <h4 class="modal-title">Mission de <?php echo $this->_tpl_vars['quoteMission']['product_name']; ?>
 / <?php echo $this->_tpl_vars['quoteMission']['product_type_name']; ?>
 / <?php echo $this->_tpl_vars['quoteMission']['nb_words']; ?>
 Mots</h4>
	 <p class="grey-text text-uppercase"><?php echo $this->_tpl_vars['quoteMission']['language_name']; ?>
 <?php if ($this->_tpl_vars['quoteMission']['product'] == 'translation'): ?> <i class="glyphicon glyphicon-chevron-right"></i> <?php echo $this->_tpl_vars['quoteMission']['languagedest_name']; ?>
 <?php endif; ?></p>	
</div>
<div class="modal-body" style="background-color:#F2F3F7">
	<div class="row">
		<div class="col-md-8">
			<h4 class="hm-titles">SCHEDULE</h4>
			<div class="col-md-12 mission_details" id="<?php echo $this->_tpl_vars['quoteMission']['identifier']; ?>
">
				<span class="hm-text">
				<span id="offset" class="hidden"><?php echo $this->_tpl_vars['offsetid']; ?>
</span>
				<?php if ($this->_tpl_vars['quoteMission']['oneshot'] == 'no'): ?>
					<p class="tempotext">
					<?php echo $this->_tpl_vars['quoteMission']['volume_max']; ?>
 <?php echo $this->_tpl_vars['quoteMission']['tempo_text']; ?>
 <?php echo $this->_tpl_vars['quoteMission']['delivery_volume_option_text']; ?>
 <?php echo $this->_tpl_vars['quoteMission']['tempo_length']; ?>
 <?php echo $this->_tpl_vars['quoteMission']['tempo_length_option_text']; ?>

					</p>
					<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'prodmanager' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager'): ?>
					<form name="tempo_adjust" id="tempo_adjust">
						<p class="tempoEdit hidden">
						
						<input type="text" size="3" id="volume_option" name="volume_option" value="<?php echo $this->_tpl_vars['quoteMission']['volume_max']; ?>
" class="eventEdit"> 
						<select name="tempo_option" class="eventEdit" id="tempo_option">
							<option value="fix" tempoconfig="<?php echo $this->_tpl_vars['tempo_fix']; ?>
-<?php echo $this->_tpl_vars['tempo_fix_days']; ?>
" <?php if ($this->_tpl_vars['quoteMission']['tempo_text'] == 'Fixe'): ?>selected="selected"<?php endif; ?>>Fixe</option>
							<option value="max" tempoconfig="<?php echo $this->_tpl_vars['tempo_max']; ?>
-<?php echo $this->_tpl_vars['tempo_max_days']; ?>
" <?php if ($this->_tpl_vars['quoteMission']['tempo_text'] == 'Max'): ?>selected="selected"<?php endif; ?> >Max</option>
						</select>

						<select name="tempo_volume_option" class="eventEdit" id="tempo_volume_option">
						<?php $_from = $this->_tpl_vars['volume_option_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['voloploop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['voloploop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['voloploop']):
        $this->_foreach['voloploop']['iteration']++;
?>
							<?php if ($this->_tpl_vars['voloploop'] == $this->_tpl_vars['quoteMission']['delivery_volume_option_text']): ?>
							<option value="<?php echo $this->_tpl_vars['key']; ?>
" selected="selected"><?php echo $this->_tpl_vars['voloploop']; ?>
</option>
							<?php else: ?>
							<option value="<?php echo $this->_tpl_vars['key']; ?>
" ><?php echo $this->_tpl_vars['voloploop']; ?>
</option>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
						</select>
						<input type="text" size="3" name="tempo_length"  value="<?php echo $this->_tpl_vars['quoteMission']['tempo_length']; ?>
" class="eventEdit" id="tempo_length"> 
						<select name="tempo_duration_option" id="tempo_duration_option" class="eventEdit">
						<?php $_from = $this->_tpl_vars['tempo_duration_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['temoploop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['temoploop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['temoploop']):
        $this->_foreach['temoploop']['iteration']++;
?>
							<?php if ($this->_tpl_vars['temoploop'] == $this->_tpl_vars['quoteMission']['tempo_length_option_text']): ?>
							<option value="<?php echo $this->_tpl_vars['key']; ?>
" selected="selected" ><?php echo $this->_tpl_vars['temoploop']; ?>
</option>
							<?php else: ?>
							<option value="<?php echo $this->_tpl_vars['key']; ?>
" ><?php echo $this->_tpl_vars['temoploop']; ?>
</option>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
						</select>
						<a class="btn btn-success btn-xs text-center eventEdit" onclick="tempoAdjustSubmit('<?php echo $this->_tpl_vars['quoteMission']['identifier']; ?>
');" style="font-size:10px">Validate</a>
						<span class="error"></span>
						</p>
					</form>
					<?php endif; ?>
				<?php else: ?>
					One shot : <span id="<?php if ($this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'prodmanager' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager'): ?>volume<?php endif; ?>"><?php echo $this->_tpl_vars['quoteMission']['volume']; ?>
</span>
				<?php endif; ?>
				</span>
			</div>
			<div class="row col-md-12">
				<h4 class="hm-titles">Total Delivery :<span id="popvolume"> <?php echo $this->_tpl_vars['quoteMission']['volume']; ?>
</span/> art. | <span id="popmission"><?php echo $this->_tpl_vars['quoteMission']['mission_length']; ?>
</span> <span id="popmissionoption"><?php echo $this->_tpl_vars['quoteMission']['mission_length_option_text']; ?>
</span> </h4>
				<span id="popnb_words" class="hidden" ><?php echo $this->_tpl_vars['quoteMission']['nb_words']; ?>
</span>
			</div>
			<div class="row col-md-12">
				<h4 class="hm-titles">Add comments </h4>
				
				<form name="mission_comment_form" id="mission_comment_form">
				<div class="member member-no-menu col-md-1">
				<img width="30" height="30" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg" class="member-avatar">		
				</div>
				<div class="col-md-11">
					<textarea name="sales_mission_comment" placeholder="Write a comment" id="sales_mission_comment" class="col-md-12 form-control validate[required]"></textarea>
					<br/>
				</div>
					<div class="col-md-2 pull-right" style="margin-top:5px">
					<?php if ($this->_tpl_vars['sales_review'] != 'signed'): ?>	
					<a class="btn btn-success btn-xs text-uppercase" id="command_submit">save</a>
					<?php endif; ?>
					</div>
				</form>
			</div>
			<div class="row col-md-12">
				<h4 class="hm-titles">Activity</h4>
				<div id="comments_list">
					<?php echo $this->_tpl_vars['quoteMission']['logcomments']; ?>

				</div>
				
			</div>
		</div>
		<div class="col-md-4">
			<h4 class="hm-titles separator">STAFFING</h4>
			<div class="col-md-12 separator">
				<i class="glyphicon glyphicon-hourglass"></i> <span class="hm-text"><span id="mission_writers"><?php echo $this->_tpl_vars['quoteMission']['staff_time']; ?>
</span> <?php echo $this->_tpl_vars['quoteMission']['staff_time_option_text']; ?>
</span>
			</div>
			<div class="col-md-12 separator writer" id="<?php echo $this->_tpl_vars['quoteMission']['writer_staff_identifier']; ?>
">				
				<i class="glyphicon glyphicon-user"></i> <span class="hm-text"><span id="staff_writer"><?php if ($this->_tpl_vars['quoteMission']['writer_staff'] == ''): ?>0<?php else: ?><?php echo $this->_tpl_vars['quoteMission']['writer_staff']; ?>
<?php endif; ?></span> - <span id="cost_writer"><?php echo ((is_array($_tmp=$this->_tpl_vars['quoteMission']['writing_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span> &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</span>
			</div>
			<div class="col-md-12 separator corrector" id="<?php echo $this->_tpl_vars['quoteMission']['corrector_staff_identifier']; ?>
">
				<i class="glyphicon glyphicon-education"></i> <span class="hm-text"><span id="correcter_staff"><?php if ($this->_tpl_vars['quoteMission']['corrector_staff'] == ''): ?>0<?php else: ?><?php echo $this->_tpl_vars['quoteMission']['corrector_staff']; ?>
<?php endif; ?></span> - <span id="correcter_cost"><?php echo ((is_array($_tmp=$this->_tpl_vars['quoteMission']['correcting_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span> &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</span>
			</div>
			<?php if ($this->_tpl_vars['quoteMission']['other_cost'] || $this->_tpl_vars['quoteMission']['other_staff']): ?>
			<div class="col-md-12 separator autre" id="<?php echo $this->_tpl_vars['quoteMission']['other_cost_identifier']; ?>
">
				<i class="glyphicon glyphicon-user"></i> <span class="hm-text"> <span id="other_staff"><?php if ($this->_tpl_vars['quoteMission']['other_staff'] == ''): ?>0<?php else: ?><?php echo $this->_tpl_vars['quoteMission']['other_staff']; ?>
<?php endif; ?></span> -<span id="other_cost"><?php echo ((is_array($_tmp=$this->_tpl_vars['quoteMission']['other_cost'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span> &<?php echo $this->_tpl_vars['create_step1']['currency']; ?>
;</span>
			</div>
			<?php endif; ?>
			<div class="col-md-6 submission" >
			<br>
			<?php if ($this->_tpl_vars['quoteMission']['other_cost']): ?>

			<?php elseif ($this->_tpl_vars['sales_review'] != 'signed'): ?>
			
				<a id="addovercost" data-placement="bottom" data-toggle="popover" data-html="true"  data-container="#editmission .modal-content" data-content=''  class="btn btn-default btn-xs text-center text-uppercase"  >Add overcost</a>
				 
			<?php endif; ?>
				
			</div>
			
		</div>
	</div>
 </div>

 

 <?php echo '
	<script language="javascript">
		$(document).ready(function() 
		{
			$("#mission_comment_form").validationEngine();
			
			var loaded = false;
			offset=$("#offset").text();

			/*$(\'#addovercost\').popover({ 
					    html : true,
					    title: function() {
					      return $("#popover-head").html();
					    },
					    content: function() {
					      return $("#popover-content").html();
					    }
					});*/
				
						

			qmid='; ?>
<?php if ($_GET['id']): ?><?php echo $_GET['id']; ?>
<?php endif; ?><?php echo ';
			wid=$(\'.writer\').attr(\'id\');
			cid=$(\'.corrector\').attr(\'id\');
			aid=$(\'.autre\').attr(\'id\');



			
			$(\'.eventEdit\').on(\'click\',function(event)
			{
				event.stopPropagation();
			});
			    
			$(\'body\').on(\'click\',function()
			{
				$(\'.tempotext\').removeClass(\'hidden\');
				$(\'.tempoEdit\').addClass(\'hidden\');

			});
			'; ?>
<?php if (( $this->_tpl_vars['user_type'] == 'superadmin' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' || $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' || $this->_tpl_vars['user_type'] == 'prodmanager' ) && $this->_tpl_vars['sales_review'] != 'signed'): ?><?php echo '
			$(\'.tempotext\').on(\'click\',function(event)
			{
				event.stopPropagation();
				$(\'.tempotext\').addClass(\'hidden\');
				$(\'.tempoEdit\').removeClass(\'hidden\');
				$(\'#volume_option\').focus();

			});

			autoEditTextBox(\'#volume\',\'/quote-new/tempo-adjust-update?taction=volume&mission_id=\'+qmid,\'volume\');
			

				'; ?>
<?php if (( ( $this->_tpl_vars['quoteMission']['sales_suggested_missions'] == "" && $this->_tpl_vars['sales_review'] != 'signed' ) && ( $this->_tpl_vars['user_type'] == 'multilingue' || $this->_tpl_vars['user_type'] == 'prodsubmanager' || $this->_tpl_vars['user_type'] == 'prodmanager' || $this->_tpl_vars['user_type'] == 'salesmanager' || $this->_tpl_vars['user_type'] == 'salesuser' ) ) || $this->_tpl_vars['user_type'] == 'superadmin'): ?> <?php echo '
				autoEditTextBox(\'#staff_writer\',\'/quote-new/tempo-adjust-update?taction=writ_staff&mission_id=\'+qmid+\'&pmid=\'+wid,\'stwriter\');
				autoEditTextBox(\'#cost_writer\',\'/quote-new/tempo-adjust-update?taction=writ_cost&mission_id=\'+qmid+\'&pmid=\'+wid,\'stwritercost\');
				autoEditTextBox(\'#correcter_staff\',\'/quote-new/tempo-adjust-update?taction=cor_staff&mission_id=\'+qmid+\'&pmid=\'+cid,\'corrector\');
				autoEditTextBox(\'#correcter_cost\',\'/quote-new/tempo-adjust-update?taction=cor_cost&mission_id=\'+qmid+\'&pmid=\'+cid,\'correctorcost\');
				autoEditTextBox(\'#other_staff\',\'/quote-new/tempo-adjust-update?taction=other_staff&mission_id=\'+qmid+\'&pmid=\'+aid,\'otherwriter\');
				autoEditTextBox(\'#other_cost\',\'/quote-new/tempo-adjust-update?taction=other_cost&mission_id=\'+qmid+\'&pmid=\'+aid,\'othercost\');
				autoEditTextBox(\'#mission_writers\',\'/quote-new/tempo-adjust-update?taction=mission_writ&mission_id=\'+qmid,\'writer\');
				'; ?>
<?php endif; ?><?php echo '

			$(\'#addovercost\').popover({ 
					    html : true,
					    title: function() {
					      return $("#popover-head").html();
					    },
					    content: function() {
					      return $("#popover-content").html();
					    }
					});
			'; ?>
<?php endif; ?><?php echo '

			$(\'#command_submit\').on(\'click\',function(){
			
				if($(\'#mission_comment_form\').validationEngine(\'validate\'))
				{
					var quote_id =\''; ?>
<?php echo $this->_tpl_vars['quoteMission']['quote_id']; ?>
<?php echo '\';
					var target_page = "/quote-new/tempo-adjust-update?taction=comment&mission_id="+qmid+"&quote_id="+quote_id;
					$.ajax(
					{
						type: \'post\',
						url: target_page,
						data: $(\'#mission_comment_form\').serialize(),			  
						success: function(data)
						{
							$(\'#sales_mission_comment\').val(\'\');
							$(\'#comments_list\').html(data);
						}
					});
				}
			});


			/*validation check for oneshot no*/	
			$("body").on(\'change keyup keypress\',\'[id^=volume_option],[id^=tempo_option],[id^=tempo_volume_option],[id^=tempo_length],[id^=tempo_duration_option]\', function() {
   				oneshotno();
		
			});

			/*hide popover*/
			$(\'body\').on(\'click\', function (e) {
       
		        if ($(e.target).data(\'toggle\') !== \'popover\'
		            && $(e.target).parents(\'[data-toggle="popover"]\').length === 0
		            && $(e.target).parents(\'.popover.in\').length === 0) { 
		            $(\'[data-toggle="popover"]\').popover(\'hide\');
		        }
		    });

			$(\'body\').on(\'change keyup keypress\',\'#sub_mission_cost\',function()
			{
				$("#sub_mission_cost").val($(this).val());
			});
			$(\'body\').on(\'change keyup keypress\',\'#autrewriter\',function()
			{
				$("#autrewriter").val($(this).val());
			});

			/*auture popover submit*/

		    $(\'body\').on(\'click\',\'#add_costoversubmit\',function(e)
		    {
		    	//alert(\'test\');
		    	offset=parseInt($("#offset").text());	
		    	var cost=$(\'#sub_mission_cost\').val();
		    	var writerstaff=$(\'#autrewriter\').val();
		    	var autrecurrency=$(\'#autrecurrency\').val();
		    		
		    	if(writerstaff && cost && loaded!=true)
		    	{
		    		var target_page = "/quote-new/tempo-adjust-update?taction=autre&mission_id="+qmid;
		    		
					ajaxAuture(target_page,writerstaff,cost,offset,qmid,autrecurrency);
					 loaded = true;
		    	}
		    });

		});
		

		function ajaxAuture(target_page,writerstaff,cost,offset,qmid,autrecurrency)
		{
			$.ajax(
					{
					type: \'post\',
					url: target_page,
					data: \'&autrewriter=\'+writerstaff+\'&sub_mission_cost=\'+cost+\'&currency=\'+autrecurrency,	  
					success: function(data)
					{
						//alert(data);
						$(\'[data-toggle="popover"]\').popover(\'hide\');
						$(\'.modal-content\').find(\'.submission\').hide();
						$(\'.modal-content\').find(".col-md-4").append(data);

						
							
     				 		var internal=(parseInt($("#cost_writer").text())+parseInt(cost)+parseInt($("#correcter_cost").text()));
     				 		$("div#overview").find(\'#internal_cost_\'+offset).val(internal);
     				 		fncalculateAutoTotal();	
     				 		/*aid=$(data).find(\'.autre\').attr(\'id\');
     				 		autoEditTextBox(\'#other_staff\',\'/quote-new/tempo-adjust-update?taction=other_staff&mission_id=\'+qmid+\'&pmid=\'+aid,\'otherwriter\');
							autoEditTextBox(\'#other_cost\',\'/quote-new/tempo-adjust-update?taction=other_cost&mission_id=\'+qmid+\'&pmid=\'+aid,\'othercost\');*/
					}
					});
		}

		function tempoAdjustSubmit(missionid)
		{

			if(volume_false==true)
			{
				offset=$("#offset").text();
				var target_page = "/quote-new/tempo-adjust-update?taction=tempo&mission_id="+missionid;
				$.ajax(
				{
					type: \'post\',
					url: target_page,
					data: $(\'#tempo_adjust\').serialize(),			  
					success: function(data)
					{
						
						$(\'.tempotext\').html(data);
						$(\'.tempotext\').removeClass(\'hidden\');
						$(\'.tempoEdit\').addClass(\'hidden\');

						valdurasale=data.split(\' \');
						$("div#overview").find(\'#tempo_details_\'+offset).html(\'<span style="padding:5px;" class="col-md-12"><strong>\'+valdurasale[1]+\'</strong> <span class="grey-text"> \'+valdurasale[0]+\' \'+valdurasale[2]+\' \'+valdurasale[3]+\' \'+valdurasale[4]+\'</span>  <strong>\'+valdurasale[5]+\'</strong> <span class="grey-text">\'+valdurasale[6]+\'</span></span>\');
						fncalculateAutoTotal();
						//alert(data);
						
					}
				});
			}

		}
		function autoEditTextBox(identifier,url,type)
		{

			//alert(url);
			offset=parseInt($("#offset").text());
			if(type==\'volume\')
			{
			    $(identifier).editable(url,{
			    	 submit    : \'<button type="submit" class="btn btn-success btn-xs text-center">VALIDATE</button>\',
			         style   : \'display: inline\',
			         onblur : \'cancel\',
			     	 height: 20,
			     	 width: 30,
			     	 callback : function(value, settings) {

			     	 	
			     	 	writers=parseInt($(\'#mission_writers\').text());
			     	 	valdura=value.split(\'-\');
	         			$(\'#volume\').text(valdura[0].trim());
	         			$(\'#popmission\').text(valdura[1].trim());
	         			$(\'#popvolume\').text(valdura[0].trim());
	         			
	         			$("div#overview").find(\'#volume_\'+offset).text(valdura[0].trim());
	         			missval=parseInt(valdura[1].trim())+writers;
	         			$("div#overview").find(\'#missionlengthval_\'+offset).text(missval);
	         			$("div#overview").find(\'#mission_length_\'+offset).val(valdura[1].trim());
	         			fncalculateAutoTotal();
	   			 		}
			    });
		    }
		    else if(type==\'writer\')
		    {
		    	$(identifier).editable(url,{
			    	 submit    : \'<button type="submit" class="btn btn-success btn-xs text-center">VALIDATE</button>\',
			         style   : \'display: inline\',
			         placeholder: \'\',
			     	 height: 20,
			     	 width: 25,
			     	 onblur : \'cancel\',
			     	 callback: function(value, settings)
			     	 {
			     	 	
			     	 	missionval=parseInt($("#popmission").text());
			     	 	total=parseInt(value)+parseInt(missionval);
			     	 	$("div#overview").find(\'#missionlengthval_\'+offset).text(total);
			     	 }
			     	 
			    });

		    }
		    else if(type==\'stwriter\' || type==\'corrector\')
		    {
		    	
		    	$(identifier).editable(url,{
			    	 submit    : \'<button type="submit" class="btn btn-success btn-xs text-center">VALIDATE</button>\',
			         style   : \'display: inline\',
			         placeholder: \'\',
			     	 height: 20,
			     	 width: 25,
			     	 onblur : \'cancel\',
			     	 callback: function(value, settings)
			     	 {
			     	 	
						
			     	 	if (value.indexOf("-") >= 0) 
						{
							$(\'#editmission\').modal(\'hide\');
				     	 	$(\'#editmission\').on(\'hidden.bs.modal\', function() {
				     	 		   $(this).removeData(\'bs.modal\');
							});
							valueid=value.split(\'-\');

							if(type==\'stwriter\')
						 	{
						  		$(\'#staff_writer\').text(valueid[1].trim());
						 		$(\'#staff_writer\').closest(\'div.writer\').attr(\'id\',valueid[0].trim());
						 		
						 	}
						 	else
						 	{
						 		
						 		$(\'#correcter_staff\').text(valueid[1].trim());
						 		$(\'#correcter_staff\').closest(\'div.corrector\').attr(\'id\',valueid[0].trim());
						 		
						 	}
						 	targeturl="/quote-new/prod-mission-edit-popup?id="+qmid+"&offset="+offset;
							 	 $(\'#editmission\' + " .modal-dialog").load(targeturl);
     				 			$(\'#editmission\').modal(\'show\');
						 
						}
						else
						{
							
							if (value.indexOf("_") >= 0) 
							{
								valueid=value.split(\'_\');
								if(type==\'stwriter\')
						 		{
						 		
						 		$(\'#staff_writer\').text(valueid[0].trim());	
								//$("div#overview").find(\'#internal_cost_\'+offset).val(valueid[1].trim());
								}
								else
						 		{
						 		
						 		$(\'#correcter_staff\').text(valueid[0].trim());	
						 		//$("div#overview").find(\'#internal_cost_\'+offset).val(valueid[1].trim());
						 		
						 		}
							}
							

						}
							fncalculateAutoTotal();
							
							
								
							   
						
			     	 }
			     	 
			    });

		    }
		    else if(type==\'othercost\' || type==\'otherwriter\')
		    {
		    	$(identifier).editable(url,{
			    	 submit    : \'<button type="submit" class="btn btn-success btn-xs text-center">VALIDATE</button>\',
			         style   : \'display: inline\',
			         placeholder: \'\',
			     	 height: 20,
			     	 width: 25,
			     	 onblur : \'cancel\',
			     	 callback: function(value, settings)
			     	 {
			     	 	offset1=offset+1;
			     	 	if (value.indexOf("_") >= 0) 
							{
								valueid=value.split(\'_\');
								if(type==\'othercost\')
						 		{
						 			$(\'#other_cost\').text(valueid[0].trim());	
						 			$("div#overview").find(\'#internal_cost_\'+offset).val(valueid[1].trim());
								}
								else
						 		{
						 		$(\'#other_staff\').text(valueid[0].trim());
						 		}
							}
							fncalculateAutoTotal();

						}
							
				});
						

		    }
		    else
		    {
		    	$(identifier).editable(url,{
			    	 submit    : \'<button type="submit" class="btn btn-success btn-xs text-center">VALIDATE</button>\',
			         style   : \'display: inline\',
			         placeholder: \'\',
			     	 height: 20,
			     	 width: 25,
			     	 onblur : \'cancel\',
			     	 callback: function(value, settings)
			     	 {
			     	 	
						if (value.indexOf("-") >= 0) 
						{
							$(\'#editmission\').modal(\'hide\');
				     	 	$(\'#editmission\').on(\'hidden.bs.modal\', function() {
				     	 		   $(this).removeData(\'bs.modal\');
							});
						
							valueid=value.split(\'-\');
							if(type==\'stwritercost\')
						 	{
						 		
						 		$(\'#cost_writer\').text(valueid[1].trim());	
						 		$("div#overview").find(\'#internal_cost_\'+offset).val(valueid[2].trim());	

						 		$(\'#staff_writer\').closest(\'div.writer\').attr(\'id\',valueid[0].trim());
											 		
						 	}
						 	else
						 	{
						 		
						 		$(\'#correcter_cost\').text(valueid[1].trim());	
						 		$("div#overview").find(\'#internal_cost_\'+offset).val(valueid[2].trim());
						 		$(\'#correcter_staff\').closest(\'div.corrector\').attr(\'id\',valueid[0].trim());

						 	}
						 	targeturl="/quote-new/prod-mission-edit-popup?id="+qmid+"&offset="+offset;
							 $(\'#editmission\' + " .modal-dialog").load(targeturl);
     				 			$(\'#editmission\').modal(\'show\');
							
						}
						else
						{
								
							if (value.indexOf("_") >= 0) 
							{
								valueid=value.split(\'_\');
								//alert(valueid);
								if(type==\'stwritercost\')
						 		{
						 		
						 		$(\'#cost_writer\').text(valueid[0].trim());	
								$("div#overview").find(\'#internal_cost_\'+offset).val(valueid[1].trim());
								}
								else
						 		{
						 		
						 		$(\'#correcter_cost\').text(valueid[0].trim());	
						 		$("div#overview").find(\'#internal_cost_\'+offset).val(valueid[1].trim());
						 		
						 		}

						 		if(valueid[2]=="")
						 		{
						 			$("#saveFinal").removeClass(\'hidden\');
						 		}
							}
							
						}

						fncalculateAutoTotal();
												
						
						
							 
						
						 	
			     	 }
			    });
		    }

		}

		
		function oneshotno()
		{
			volume_false=true;
			nb_words=parseInt($("#popnb_words").text());
			duration_missionval=parseInt($(\'#popmission\').text());
			totalvolumeval=parseInt($(\'#popvolume\').text());
			volumeMax=parseInt($(\'#volume_option\').val());
			tempotype=parseInt($(\'#tempo_option\').val());
			tempotypeconfig=$(\'#tempo_option option:selected\').attr(\'tempoconfig\');
			configval=tempotypeconfig.split(\'-\');
			
			$(\'.tempoEdit\').find(".alert-danger").remove();
			deleveryvolumeoption=$(\'#tempo_volume_option\').val();
			tempoLength=parseInt($(\'#tempo_length\').val());
			tempoLengthoption=$(\'#tempo_duration_option\').val();

				if(tempoLengthoption==\'days\'){
					 tempo_callenth=tempoLength;
				}else if(tempoLengthoption==\'week\')	{
					tempo_callenth=tempoLength*7;
				}
				else if(tempoLengthoption==\'month\')	{
					tempo_callenth=tempoLength*30;
					}
				else if(tempoLengthoption==\'year\')	{
					tempo_callenth=tempoLength*365;
					}

			configcal=(parseInt(configval[0])*parseInt(configval[1]))*tempo_callenth;
			tempocalculated=(nb_words*volumeMax)*tempo_callenth;
			//alert(configcal+\' config val \'+ tempocalculated);
			caltotval=Math.round((duration_missionval/tempo_callenth)*volumeMax);
			//alert(totalvolumeval+\' calculate volume \'+caltotval);
			if(caltotval!=totalvolumeval)
			{
				$(\'.error\').append("<span class=\'alert-danger col-md-12\' style=\'padding:0 5px;\'>Le tempo indiqu&#233; ne correspond pas au volume et &#224; la  dur&#233;e de la mission</span>");
				volume_false=false;
			}
			else if(configcal<tempocalculated)
			{
				$(\'.error\').append("<span class=\'alert-danger col-md-12\' style=\'padding:0 5px;\'>The volume should below the corresponded configure volume ("+configval[0]+" words "+configval[1]+" days) </span>");
				$("#volume_option").focus();
				volume_false=false;
			}


		} 


	</script>
 '; ?>