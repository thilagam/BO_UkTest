<?php /* Smarty version 2.6.19, created on 2015-08-31 10:02:21
         compiled from gebo/quotedelivery/delivery-prod3.phtml */ ?>
<?php echo '
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/lib/ckeditor/ckeditor.js"></script>

<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script src="/BO/theme/gebo/js/forms/jquery.counter.min.js" type="text/javascript" charset="utf-8"></script>

<style>
	.customheader
	{
		color: #666;
		font-size: 14px;
		font-weight: 700;
	}
	
	.border
	{
		border:1px solid #dadada;
		padding:15px 15px 5px;
	}
	.form-horizontal .control-label{
		font-weight:bold;
		width:50px;
	}
	.form-horizontal .controls {
		margin-left: 70px;
	}
</style>
<script>
	$(document).ready(function(){
		//validation
		$("#delivery-prod-form3").validationEngine();
		
		$("#mail_from").chosen({  allow_single_deselect:false,disable_search: true });
		$("#correctorsendfrom").chosen({  allow_single_deselect:false,disable_search: true });
		//$(\'#comments_check,#email_check,#fb_check\').toggleButtons();
		
		//comment toggle
		$(\'#comments_check\').toggleButtons({
			label:{enabled: "Yes",disabled: "No"},
			onChange: function () {			
				var checked=$("input[name=\'send_mission_comments\']:checked").val();
				if(checked=="yes")
				{
					$("#missioncomment").show();	
				}
				else
				{
					$("#missioncomment").hide();
				}		
			}		
		});
		$("#missioncomment").counter({
				goal: 160
			});
		//email toggle
		$(\'#email_check\').toggleButtons({
			label:{enabled: "Yes",disabled: "No"},
			onChange: function () {
				var checked=$("input[name=\'send_email\']:checked").val();
				if(checked=="yes")
				{
					$("#email_div").show();					
				}
				else
				{
					$("#email_div").hide();					
				}		
			}		
		});
		
		//fb comments toggle
		$(\'#fb_check\').toggleButtons({
			label:{enabled: "Yes",disabled: "No"},
			onChange: function () {
				var checked=$("input[name=\'fb_send\']:checked").val();
				if(checked=="yes")
				{
					$("#fbcomment").show();					
				}
				else
				{
					$("#fbcomment").hide();					
				}		
			}		
		});
		$("#fbcomment").counter({
				goal: 125
			});
		
		 if (CKEDITOR.instances[\'mailcontent\'])
                CKEDITOR.instances[\'mailcontent\'].destroy();
            
              
		 var editor = CKEDITOR.replace( \'mailcontent\',
			 {
				 language: \'de\',
				 uiColor: \'#D9DDDC\',
				 enterMode : CKEDITOR.ENTER_BR,
				 toolbar :
				 [
					 [\'Undo\',\'Redo\'],
					 [\'Find\',\'Replace\',\'-\',\'SelectAll\',\'RemoveFormat\'],
					 [\'Link\', \'Unlink\', \'Image\'],
					 \'/\',
					 [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
					 [\'NumberedList\',\'BulletedList\',\'-\',\'Blockquote\'],
					 [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\']
				 ]
			 }
		 );
		 
		 
		 var target_page = "/quotedelivery/getcontribmailcontent";
		 $.post(target_page, function(data){   
			var con=data.split("#");
			CKEDITOR.instances[\'mailcontent\'].setData(con[1]);
			$("#mailsubject").val($.trim(con[0]));
		 });
		 
		 
		 
		 
		if (CKEDITOR.instances[\'correctormailcontent\'])
                CKEDITOR.instances[\'correctormailcontent\'].destroy();
            
              
		 var editor = CKEDITOR.replace( \'correctormailcontent\',
			 {
				 language: \'de\',
				 uiColor: \'#D9DDDC\',
				 enterMode : CKEDITOR.ENTER_BR,
				 toolbar :
				 [
					 [\'Undo\',\'Redo\'],
					 [\'Find\',\'Replace\',\'-\',\'SelectAll\',\'RemoveFormat\'],
					 [\'Link\', \'Unlink\', \'Image\'],
					 \'/\',
					 [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
					 [\'NumberedList\',\'BulletedList\',\'-\',\'Blockquote\'],
					 [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\']
				 ]
			 }
		 ); 
		 
		 
		var ctarget_page = "/quotedelivery/getproofreadmailcontent";
		 $.post(ctarget_page, function(data){   
			var con=data.split("#");
			CKEDITOR.instances[\'correctormailcontent\'].setData(con[1]);
			$("#correctormailsubject").val($.trim(con[0]));
		 });
		 
	})
</script>
'; ?>

<div class="row-fluid">
	 <div class="span12">
		<h3 class="heading">
			Talk and Share
			<span class="pull-right">
					<img src="/BO/theme/gebo/img/path-3.png" width="120" height="35" border="0" usemap="#Map" />
					<map name="Map" id="Map">
						<area shape="circle" coords="18,18,17" href="/quotedelivery/delivery-prod1?mission_id=<?php echo $_GET['mission_id']; ?>
"/>
						<area shape="circle" coords="60,18,17" href="/quotedelivery/delivery-prod2?mission_id=<?php echo $_GET['mission_id']; ?>
"/>
					</map>
			</span> 
		</h3>
	</div> 
</div>

	<div class="row-fluid">
		<form class="form-horizontal"  action="/quotedelivery/save-prod3" method="POST" id="delivery-prod-form3" enctype="multipart/form-data">		
			<div class="span6">				
				 <div class="border">
					<div class="row-fluid customheader">
						<img src="/BO/theme/gebo/img/gCons/chat-.png" alt="" /> Comment displayed in the newsletter and the FO
						<span class="pull-right">
							 <div id="comments_check">
								<input type="checkbox" <?php if ($this->_tpl_vars['prod_step3']['send_mission_comments'] != 'no'): ?>checked="checked"<?php endif; ?> name="send_mission_comments" value="yes">
							</div>
						</span>
					</div>
					<div class="row-fluid">
						<textarea id="missioncomment" class="span12 validate[required,minSize[100]]" rows="5" cols="1" name="missioncomment" placeholder="Cette mission vous plaira" <?php if ($this->_tpl_vars['prod_step3']['send_mission_comments'] == 'no'): ?>style="display:none"<?php endif; ?>><?php echo $this->_tpl_vars['prod_step3']['missioncomment']; ?>
</textarea>
					</div>
					<!-- <div class="row-fluid">
						<button class="btn btn-primary">Preview</button>
					</div> -->
				</div>			
				<div class="border" style="margin-top:22px">
					<div class="row-fluid">
						<div class="row-fluid customheader">
							<img src="/BO/theme/gebo/img/gCons/addressbook.png" alt="" /> Comment to be posted on Facebook
							<span class="pull-right">
								 <div id="fb_check">
									<input type="checkbox" <?php if ($this->_tpl_vars['prod_step3']['fb_send'] != 'no'): ?>checked="checked"<?php endif; ?> name="fb_send" value="yes">
								</div>
							</span>
						</div>					
						<div class="row-fluid">
							<textarea id="fbcomment" class="span12 <?php if ($this->_tpl_vars['prod_step1']['AOtype'] == 'public'): ?>validate[required,minSize[100]]<?php endif; ?>" rows="5" cols="1" name="fbcomment" placeholder="Cette mission vous plaira" <?php if ($this->_tpl_vars['prod_step3']['fb_send'] == 'no'): ?>style="display:none"<?php endif; ?>><?php echo $this->_tpl_vars['prod_step3']['fbcomment']; ?>
</textarea>
						</div>
						<!-- <div class="row-fluid">
							<button class="btn btn-primary">Preview</button>
						</div> -->
					</div>
				</div>
				
			</div>
		 
			<div class="span5 border" style="">
				<div class="row-fluid customheader">
					<img src="/BO/theme/gebo/img/gCons/email.png" alt="" /> Emailing
					<span class="pull-right">
						 <div id="email_check">
							<input type="checkbox" <?php if ($this->_tpl_vars['prod_step3']['send_email'] != 'no'): ?>checked="checked"<?php endif; ?> name="send_email" value="yes" >
						</div>
					</span>
				</div>
				<div class="row-fluid" id="email_div">
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">From</label>
							<div class="controls">
								<div class="span6">
									<select name="mail_from" id="mail_from">
										<option value="service" <?php if ($this->_tpl_vars['prod_step3']['mail_from'] == 'service'): ?>selected<?php endif; ?>>Editorial team</option>
										<option value="me" <?php if ($this->_tpl_vars['prod_step3']['mail_from'] == 'me'): ?>selected<?php endif; ?>>Me</option>
									</select>
								</div>
								<div class="span6">	
									<label class="control-label" style="width:100px">To: Writers</label>
								</div>	
							</div>
							
						</div>
					</div>
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">Subject</label>
							<div class="controls">
								<input type="text" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['prod_step3']['mailsubject']; ?>
" name="mailsubject" id="mailsubject" placeholder="Edit Place: Writing premium mission">
							</div>
						</div>
					</div>	
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label">Message</label>
							<div class="controls">
								<textarea id="mailcontent" class="span12 validate[required]" rows="15" cols="1" name="mailcontent" placeholder="Dear Contirbuters"><?php echo $this->_tpl_vars['prod_step3']['mailcontent']; ?>
</textarea>
							</div>	
						</div>	
					</div>
					
									</div>
			</div>
		 </div>		 
		 <div class="clear"></div>
		 <div class="row-fluid">
			<div class="span8 topset2">
				<a class="btn btn-default" href="/quotedelivery/delivery-prod2?mission_id=<?php echo $_GET['mission_id']; ?>
"><i class="icon-chevron-left"></i> Back</a>
			</div>
			<div  class="pull-right topset2 span2">
				<button class="btn btn-primary" type="submit">Finish</button>
			</div>
		</div>	
		 <div class="clear"></div>
		 
		 </form>
	</div>