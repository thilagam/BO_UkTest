<?php /* Smarty version 2.6.19, created on 2015-08-06 11:33:14
         compiled from gebo/recruitment/recruitment-prod3.phtml */ ?>
<?php echo '
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/lib/ckeditor/ckeditor.js"></script>

<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
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
		width: 80px;
	}
	.form-horizontal .controls {
		margin-left: 100px;
	}
</style>
<script>
	$(document).ready(function(){
		//validation
		$("#delivery-prod-form3").validationEngine();
		
		//$(\'#comments_check,#email_check,#fb_check\').toggleButtons();
		
		$("#mail_from").chosen({  allow_single_deselect:false,disable_search: true });
		
		//comment toggle
		$(\'#comments_check\').toggleButtons({
			label:{enabled: "Oui",disabled: "Non"},
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
			label:{enabled: "Oui",disabled: "Non"},
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
		 
		 
		 var target_page = "/recruitment/getcontribmailcontent";
		 $.post(target_page, function(data){   
			var con=data.split("#");
			CKEDITOR.instances[\'mailcontent\'].setData(con[1]);
			$("#mailsubject").val($.trim(con[0]));
		 });
		 
	})
</script>
'; ?>

<div class="row-fluid">
	 <div class="span12">
		<h3 class="heading">
			Talk and Share | <?php echo $this->_tpl_vars['prod_step1']['title']; ?>

			<!--<span class="pull-right">
					<img src="/BO/theme/gebo/img/path-3.png" width="120" height="35" border="0" usemap="#Map" />
					<map name="Map" id="Map">
						<area shape="circle" coords="18,18,17" href="/recruitment/recruitment-prod1?contract_missionid=<?php echo $_GET['contract_missionid']; ?>
"/>
						<area shape="circle" coords="60,18,17" href="/recruitment/recruitment-prod2?contract_missionid=<?php echo $_GET['contract_missionid']; ?>
"/>
					</map>
			</span>-->
		</h3>
	</div> 
</div>

	<div class="row-fluid">
		<form class="form-horizontal"  action="/recruitment/save-prod3" method="POST" id="delivery-prod-form3" enctype="multipart/form-data">		
		 		 
		 <div class="span12 border" style="">
			<div class="row-fluid customheader">
				<img src="/BO/theme/gebo/img/gCons/email.png" alt="" /> Emailing
				<span class="pull-right">
					 <div id="email_check">
						<input type="checkbox" checked="checked" name="send_email" value="yes">
					</div>
				</span>
			</div>
			<div class="row-fluid" id="email_div">
				<div class="row-fluid">
					<div class="control-group">
						<label class="control-label">From</label>
						<div class="controls">
							<select name="mail_from" id="mail_from">
								<option value="service">Editorial team</option>
								<option value="me">Me</option>
							</select>
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
		 
		 <div class="clear"></div>
		<div class="span8 topset2">
			<a class="btn btn-default" href="/recruitment/recruitment-prod2?contract_missionid=<?php echo $_GET['contract_missionid']; ?>
"><i class="icon-chevron-left"></i> Back</a>
		 </div>
		 <div  class="pull-right topset2">
			<button class="btn btn-primary" type="submit">Finish</button>
		 </div>
		 
		 </form>
	</div>