<?php /* Smarty version 2.6.19, created on 2016-03-22 11:36:56
         compiled from gebo/followup/delivery-followup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'gebo/followup/delivery-followup.phtml', 411, false),array('modifier', 'zero_cut_t', 'gebo/followup/delivery-followup.phtml', 411, false),array('modifier', 'stripslashes', 'gebo/followup/delivery-followup.phtml', 480, false),array('modifier', 'date_format', 'gebo/followup/delivery-followup.phtml', 490, false),array('modifier', 'count', 'gebo/followup/delivery-followup.phtml', 689, false),)), $this); ?>
<?php echo '
<!-- custom scrollbar plugin -->
<link rel="stylesheet" href="/BO/theme/gebo/lib/scrollbar/jquery.mCustomScrollbar.css">
<script src="/BO/theme/gebo/lib/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<link href="/BO/theme/gebo/css/mission-followup.css" rel="stylesheet" />
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<style>
	.clear
	{
		clear:both;
	}
	
	.viewart label
	{
		margin: 5px 5px 0;
	}
	
	.viewarttable td
	{
		font-size: 13px;
		text-align:left;
	}
	
	.activity
	{
		box-shadow: none !important;
		border-top: none !important;
		border-left: none !important;
		border-right: none !important;
		border-bottom: 1px solid #e4e4e4 !imortant;
		border-radius: 0 !important;
		padding: 3px !important;
	}
	
	.progress-bar
	{
		display:list-item;
	}
	
	.icon-time
	{
		top:0;
	}
	
	#bodymsg label, .pointer  label, #bodymsg .label, .pointer .label
	{
		text-transform: uppercase;
	}
</style>
<!--<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/lib/ckeditor/ckeditor.js"></script>-->
<script type="text/javascript" >
    $(document).ready(function() {	
		$(\'body\').on(\'hidden\', \'#republish ,#bulkrepublish ,#edit_article_modal ,#edit_ao_modal ,#view_article_modal\', function (){        
			$(this).removeData(\'modal\');				
			$(\'.modal-body\',this).html(\'\');		
			$("body").css("overflow", "auto");    
		});
		
		var article_id=\''; ?>
<?php echo $_GET['article_id']; ?>
<?php echo '\';	

		if(article_id)
		{
			/* $.get(\'/deliveryongoing/view-article?article_id=\'+article_id+\'&currency=euro\', function(data) {
				$("#view_article_modal .modal-body").html(data);
				$("#view_article_modal").modal(\'show\');
			}); */
			$.get(\'/deliveryongoing/edit-article?article_id=\'+article_id, function(data) {
				$("#edit_article_modal .modal-body").html(data);
				$("#edit_article_modal").modal(\'show\');
				$("#edit_article_modal").css(\'display\',\'block\');
			});
		}	
		
		//Tiny Editor
		$(\'#textarea\').tinymce({
        // Location of TinyMCE script
        script_url 							: \'/BO/theme/gebo/lib/tiny_mce/tiny_mce.js?\' + new Date().getTime(),
        // General options
        theme 								: "advanced",
        plugins 							: "autoresize,style,table,advhr,advimage,advlink,emotions,inlinepopups,preview,media,contextmenu,paste,fullscreen,noneditable,xhtmlxtras,template,advlist",
        // Theme options
        theme_advanced_buttons1 			: "undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect",
        theme_advanced_buttons2 			: "forecolor,backcolor,|,cut,copy,paste,pastetext,|,bullist,numlist,link,image,media,|,code,preview,fullscreen",
        theme_advanced_buttons3 			: "",
        theme_advanced_toolbar_location 	: "top",
        theme_advanced_toolbar_align 		: "left",
        theme_advanced_statusbar_location 	: "bottom",
        theme_advanced_resizing 			: false,
        content_css                         : "/BO/theme/gebo/css/tinymce_styles.css?" + new Date().getTime(),
        theme_advanced_font_sizes           : "8px,10px,12px,13px,14px,16px,18px,20px",
        font_size_style_values              : "8px,10px,12px,13px,14px,16px,18px,20px",
        init_instance_callback				: function(){

            function resizeWidth() {
                document.getElementById(tinyMCE.activeEditor.id+\'_tbl\').style.width=\'100%\';
            }
            resizeWidth();
            $(window).resize(function() {
                resizeWidth();
            })
        }
    });
		
////////////to show the timer in selection profile page///////
      var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
      var js_date=(new Date().getTime())/ 1000;
      var diff_date=Math.floor(js_date-cur_date);
     //////////show timer//////////
	$("[id^=time_]").each(function(i) {
		var article=$(this).attr(\'id\').split("_");
		var ts=article[2];
		$("#time_"+article[1]+"_"+article[2]).countdown({
			timestamp   : ts,
            diff_date  : diff_date,
			callback    : function(days, hours, minutes, seconds){
				var message = "";
				if(days >0 )message += days + " jours"  +", ";
				if(hours >0 )message += hours + " h" +",";
				if(minutes >0 )message += minutes + " mns"+ ", ";
				message += seconds + " s";
				$("#text_"+article[1]+"_"+article[2]).html(message);
				if(days==0 && hours==0 && minutes==0 && seconds==0)
				{
					//window.location.reload();
				}
			}
		});
	});	
		
//onload getting deliveries linked to client
			var client_id=$("#clients").val();
			
       if($(\'#ao_details\').length) {
               $(\'#ao_details\').dataTable({
					"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
					"sPaginationType": "bootstrap",
					"aaSorting": [[ 0, "asc" ]],
					"iDisplayLength":10,
					"aoColumns": [
						{ "sType": "html" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "numeric" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "string" }
					]
					});	
            }		
			
    });
function loadEditors(id)
{
    $(\'#\'+id).tinymce({
        // Location of TinyMCE script
        script_url 							: \'/BO/theme/gebo/lib/tiny_mce/tiny_mce.js?\' + new Date().getTime(),
        // General options
        theme 								: "advanced",
        plugins 							: "autoresize,style,table,advhr,advimage,advlink,emotions,inlinepopups,preview,media,contextmenu,paste,fullscreen,noneditable,xhtmlxtras,template,advlist",
        // Theme options
        theme_advanced_buttons1 			: "undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect",
        theme_advanced_buttons2 			: "forecolor,backcolor,|,cut,copy,paste,pastetext,|,bullist,numlist,link,image,media,|,code,preview,fullscreen",
        theme_advanced_buttons3 			: "",
        theme_advanced_toolbar_location 	: "top",
        theme_advanced_toolbar_align 		: "left",
        theme_advanced_statusbar_location 	: "bottom",
        theme_advanced_resizing 			: false,
        content_css                         : "/BO/theme/gebo/css/tinymce_styles.css?" + new Date().getTime(),
        theme_advanced_font_sizes           : "8px,10px,12px,13px,14px,16px,18px,20px",
        font_size_style_values              : "8px,10px,12px,13px,14px,16px,18px,20px",
        init_instance_callback				: function(){

            function resizeWidth() {
                document.getElementById(tinyMCE.activeEditor.id+\'_tbl\').style.width=\'100%\';
            }
            resizeWidth();
            $(window).resize(function() {
                resizeWidth();
            })
        }
    });
    // Creates a new editor instance
    var ed = new tinymce.Editor(id, {
        some_setting : 1
    });

}	
	//////////get comment for refusal when the close button is pressed///
/* function getCloseComment(artid, partscount)
  {
		if (tinymce.getInstanceById(\'closemailcontent\'))
		{
			tinymce.execCommand(\'mceRemoveControl\', true, \'closemailcontent\');
			loadEditors(\'closemailcontent\');
		}
		else if (!tinymce.getInstanceById(\'closemailcontent\'))
			loadEditors(\'closemailcontent\');
		
		var target_page = "/republish/getclosemailpopup?artid="+artid+"&usercount="+partscount;
		
		$.post(target_page, function(data){   //alert(data);
			 data1 = data.split("*");
			$("#closemailcontent").html(data1[0]);
			$(\'#bodymsg\').html(data1[1]);
		});
	  
	  //valid button
	  var button=\'<button type="button" id="closeart"  name="closeart" class="btn btn-danger" onclick="closeArtprofile(\\\'\'+artid+\'\\\', \\\'yes\\\');">Valider</button>\';
	  $("#valid_button").html(button);
	  
	  
	  
      $(\'#closemail\').modal(\'show\');
  } */
function getCloseComment(artid, partscount)
{
    $(\'#artid\').val(artid);
    if (CKEDITOR.instances[\'closemailcontent\'])
    {
        CKEDITOR.instances[\'closemailcontent\'].destroy();
    }
    var editor = CKEDITOR.replace( \'closemailcontent\',
            {
                language: \'de\', uiColor: \'#D9DDDC\', enterMode : CKEDITOR.ENTER_BR, removePlugins : \'resize\',
                toolbar : [ [\'Undo\',\'Redo\'], [\'Find\',\'Replace\'],[\'Link\', \'Unlink\', \'Image\'], [\'FontSize\', \'Bold\', \'Italic\',\'Underline\'],
                    [\'TextColor\', \'-\', \'Smiley\',\'SpecialChar\', \'-\', \'Maximize\'] ]
            }
    );
    var target_page = "/article-republish/getclosemailpopup?artid="+artid+"&usercount="+partscount;
    $.post(target_page, function(data){   //alert(data);
         data1 = data.split("*");
        CKEDITOR.instances[\'closemailcontent\'].setData(data1[0]);
        $(\'#bodymsg\').html(data1[1]);
    });
    $(\'#closemail\').modal(\'show\');
}
  ///////////when click on TO BE CLOSED in list of profiles/////////////
  /* function closeArtprofile(artid, participants)
  {
        var comment = CKEDITOR.instances[\'closemailcontent\'].getData();
        var target_page = "/republish/closeartprofile?comment="+escape(comment)+"&art_id="+artid+"&participants="+participants;
        $.post(target_page, function(data){  //alert(data);
            window.location.reload();
        });
  } */
  function closeArtprofile(artid, participants)
{
    var participants = participants;
    if(participants == \'no\')
    {
        smoke.confirm("Voulez-vous r\\351ellement fermer cet article? Aucun contributeur n\'a particip\\351, aucun email ne sera donc envoy\\351",function(e){
            if (e)
            {
                $.ajax({
                    url: "/article-republish/closeartprofile?art_id="+artid+"&participants="+participants,
                    global: false,
                    type: "GET",
                    dataType: "html",
                    async:false,
                    success: function(msg){ //alert(msg);
                        location.reload();
                        // $(\'#closeart\'+artid).html("<a onclick=\\"return closeArtprofile(\'"+artid+"\', \'disclose\');\\" class=\'btn btn-info\'>Closed</a>");
                    }
                });
            }
            else
            {
                return false;
            }
        });
    }
    else
    {
        var artid = $(\'#artid\').val();
        var comment = CKEDITOR.instances[\'closemailcontent\'].getData();
        var target_page = "/article-republish/closeartprofile?comment="+escape(comment)+"&art_id="+artid+"&participants="+participants;
        $.post(target_page, function(data){  //alert(data);
            window.location.reload();
        });
    }
}
  //get all contributor based on the type, lang, cat//////
function updatedContribList(artId)
{
	var contribtype = $("input[name=\'contribtype[]\']:checked").map(function () {return this.value;}).get().join("\',\'");
	var cat=$("#contrib_cat").val();
	var lang=$("select#contrib_lang").val();
	//alert(artId)
	lang= $.trim(lang);
	$.ajax({
		type: \'GET\',
		//url: \'/ao/updatecontriblist\',
		url: \'/article-republish/loaduserslist\',
		// data: \'type=\' + contribtype+\'&category=\'+cat+\'&language=\'+lang+\'&parameter=\'+param,
		data: \'type=\' + contribtype+\'&category=\'+cat+\'&language=\'+lang+"&artId="+artId,
		success: function(data)
		{ // alert(data);
			$(\'#contribs\').html(data);
			$("#favcontribcheck").chosen();
		}
	});
} 

//get all contributor based on the type, lang, cat//////
function updatedBulkContribList2(aoId)
{
	var contribtype = $("input[name=\'contribtype[]\']:checked").map(function () {return this.value;}).get().join("\',\'");
    var cat=$("#contrib_cat").val();
    var lang=$("select#contrib_lang").val();    
    var artlist = $("#artlist").val();
    lang= $.trim(lang);
    $.ajax({
        type: \'GET\',
        //url: \'/ao/updatecontriblist\',
        url: \'/article-republish/loadbulkuserslist\',
        // data: \'type=\' + contribtype+\'&category=\'+cat+\'&language=\'+lang+\'&parameter=\'+param,
        data: \'type=\' + contribtype+\'&category=\'+cat+\'&language=\'+lang+"&artlist="+artlist+"&aoId="+aoId,
        success: function(data)
        {                      // alert(data);
            $(\'#contribs\').html(data);
            $("#favcontribcheck").chosen();
            fngetbulkmailcontent();
        }

    });
}

//stop participation 
function stopparticipation(art,type)
{
	   smoke.confirm("Do you really want to stop this participation ? ",function(e){
            if (e)
            {
               $.ajax({
					type: \'GET\',
					url: \'/deliveryongoing/stop-participation\',
					data: \'type=\' + type+\'&article=\'+art,
					success: function(data)
					{   
						window.location.reload();
					}

				});
            }
            else
            {
                return false;
            }
        });
}
</script>
<style type="text/css">
.alert,.label-warning
{
	padding:3px;
	margin:3px;
}
#ao_details_wrapper a label
{
cursor:pointer;
}
</style>
'; ?>


<div class="row-fluid">
	<div class="span12">
	<?php if ($this->_tpl_vars['aoDetails'] | @ count > 0): ?>
	<?php $this->assign('end_date', ''); ?>
		<?php $_from = $this->_tpl_vars['aoDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['aoDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['aoDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['delivery']):
        $this->_foreach['aoDetails']['iteration']++;
?> 
		<?php $this->assign('end_date', $this->_tpl_vars['delivery']['delivery_end']); ?>
		<?php $this->assign('missiontest', $this->_tpl_vars['delivery']['missiontest']); ?>
		<?php $this->assign('aocurrency', $this->_tpl_vars['delivery']['sales_suggested_currency']); ?>
		<div class="followup-header">
			<h3><?php echo $this->_tpl_vars['delivery']['mission_title']; ?>
 > <?php echo $this->_tpl_vars['delivery']['title']; ?>
 <span class="headerdim"><?php echo $this->_tpl_vars['delivery']['publishdate']; ?>
 - <?php echo $this->_tpl_vars['delivery']['delivery_end']; ?>
</span>
			<a href="/followup/prod?cmid=<?php echo $this->_tpl_vars['delivery']['contract_mission_id']; ?>
&index=<?php echo $_GET['index']; ?>
&active=delivery&submenuId=ML13-SL4#deliveries">
			<span class="pull-right">
				<button class="btn btn-success" name="back">Back</button>
			</span>
			</a>
			</h3>
			<div class="row-fluid">    
				<div class="header-info">
				
					<div class="span3" style="padding-top:20px">
						<div class="span10" style="padding:0">
						<div class="sepH_b progress progress-success">
							<div class="bar" style="width: <?php echo $this->_tpl_vars['delivery']['progresspercentage']; ?>
%;background-image:linear-gradient(<?php echo $this->_tpl_vars['delivery']['colorcode']; ?>
, <?php echo $this->_tpl_vars['delivery']['colorcode']; ?>
)"></div> 
						</div>
												</div>
						<div><strong>&nbsp;<?php echo $this->_tpl_vars['delivery']['progresspercentage']; ?>
%</strong></div>
					</div>
					<div class="span2" style="padding-left:0">
						<span class="upper">Delivered</span>
						<span class="bottom"><?php echo $this->_tpl_vars['delivery']['published_articles']; ?>
 / <?php echo $this->_tpl_vars['delivery']['totalArticle']; ?>
</span>
					</div>
					<div class="span2">
						<span class="upper">Bidding Failure</span>
						<span class="bottom" id="bfailure">-</span>
					</div>
					<div class="span3">
						<span class="upper">Writer Cost</span>
						<span class="bottom">
						<?php if ($this->_tpl_vars['delivery']['totalAmount']): ?>
							<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['delivery']['totalAmount'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', '') : smarty_modifier_replace($_tmp, ',', '')))) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['delivery']['currency']; ?>
;
						<?php else: ?>
							-
						<?php endif; ?>
						</span>
					</div>
					<div class="span2">
						<span class="upper">Proofreader Cost</span>
						<span class="bottom">
						<?php if ($this->_tpl_vars['delivery']['totalCorrectorAmount']): ?>
								<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['delivery']['totalCorrectorAmount'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', '') : smarty_modifier_replace($_tmp, ',', '')))) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['delivery']['currency']; ?>
;
						<?php else: ?>
								-
						<?php endif; ?>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="pull-left loadactions">
			
		</div>
		<div class="pull-right bottomset">
			<?php if ($this->_tpl_vars['repeat_delivery'] == 'yes'): ?>
				<a class="btn btn-primary" href="/followup/edit-repeat-delivery?delivery_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
" data-target="#repeat_delivery" role="button" data-toggle="modal"><i class="splashy-refresh"></i> Repeat scheduler</a>
			<?php endif; ?>	
			<?php if ($this->_tpl_vars['ebookerid'] == $_GET['client_id']): ?>
			<a href="/followup/convert-stencils?ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
&client_id=<?php echo $_GET['client_id']; ?>
&submenuId=ML13-SL4" role="button" target="_blank" class="">
				<button class="btn btn-primary" name="">View Stencils</button>
			</a>
			<?php endif; ?>
			<a href="/deliveryongoing/ao-contribmail?ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
" role="button" data-toggle="modal" data-target="#ao_contribmail" class="">
				<button class="btn btn-primary" name=""><i class="splashy-mail_light_stuffed"></i> Contact</button>
			</a>
			<a class="" href="/BO/download-brief.php?ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
">
				<button class="btn btn-primary" name=""><i class="splashy-arrow_large_down"></i> Brief</button>
			</a>
		</div>
		<div style="clear:both"></div>
		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	
		<div class="row-fluid">		
		   
			<table class="table table-striped table-bordered dTableR" id="ao_details">
				<thead>
					<tr>
						<th></th>
						<th>S.No.</th>
						<th>Article Title</th>
						<th>Price</th>
						<th>End of Production</th>
						<th>Writer</th>
						<th>Corrector</th>
						<th>Progress</th>						
						<th>Writing Status</th>
						<th>Correction Status</th>
						<th>Delivered</th>
											</tr>
				</thead>
				<tbody>
			<?php if ($this->_tpl_vars['articleDetails'] | @ count > 0): ?>
				<?php $this->assign('bfailure', 0); ?>
				<?php $_from = $this->_tpl_vars['articleDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['articleDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['articleDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['articleDetails']['iteration']++;
?> 
					<tr>
						<td><input type="checkbox" name="articleid[]" class="artload" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" /></td>
						<td><?php echo ($this->_foreach['articleDetails']['iteration']-1)+1; ?>
</td>
						<td><a class="editable editable-click" href="/deliveryongoing/view-article?article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
&currency=<?php echo $this->_tpl_vars['aocurrency']; ?>
" data-toggle="modal" role="button" data-target="#view_article_modal" id="view_article"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></td>
						<td>
							<?php if ($this->_tpl_vars['article']['writer_facturation_details'] | @ count > 0 || $this->_tpl_vars['article']['corrector_facturation_details'] | @ count > 0): ?>
							<span <?php if ($this->_tpl_vars['article']['writer_facturation_details'][0]['price_user'] && $this->_tpl_vars['article']['corrector_facturation_details'][0]['price_corrector']): ?>data-hint="Writing + Proof reading" <?php elseif ($this->_tpl_vars['article']['writer_facturation_details'][0]['price_user']): ?> data-hint="Writing" <?php elseif ($this->_tpl_vars['article']['corrector_facturation_details'][0]['price_corrector']): ?>data-hint="Proof reading"<?php endif; ?>  class="label label-inverse hint--left  hint">	<?php echo $this->_tpl_vars['article']['writer_facturation_details'][0]['price_user']+$this->_tpl_vars['article']['corrector_facturation_details'][0]['price_corrector']; ?>
&nbsp;&<?php echo $this->_tpl_vars['article']['currency']; ?>
;
							</span>
							<?php else: ?>
							-
							<?php endif; ?>
						</td>
						<td>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['end_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

						</td>
						<td>
							<?php if ($this->_tpl_vars['article']['bo_closed_status'] == 'closed' && ! $this->_tpl_vars['article']['writerParticipation']): ?>
								<label class="label label-warning">article closed</label>								
							<?php elseif ($this->_tpl_vars['article']['totalParticipations'] == '0'): ?>
								<?php if ($this->_tpl_vars['article']['republish_count'] > 0 || $this->_tpl_vars['article']['participation_expires'] < time()): ?>
									<?php $this->assign('bfailure', $this->_tpl_vars['bfailure']+1); ?>
								<?php endif; ?>
								<span class="label label-important">No participant</span>
							<?php elseif ($this->_tpl_vars['article']['writerParticipation']): ?>
						
								<?php if ($this->_tpl_vars['article']['writer_comment_count']): ?>
									<a href="/deliveryongoing/article-comments?ao_id=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
&article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-toggle="modal" data-target="#comments_article"><sup class="pull-right"><img alt="" src="/BO/theme/gebo/img/gCons/comment.png"></sup></a>
								<?php endif; ?>
								<a target="_writer" href="/user/contributor-edit?submenuId=ML2-SL7&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['user_id']; ?>
"><?php echo $this->_tpl_vars['article']['writerName']; ?>
</a>
								
							<?php if ($this->_tpl_vars['article']['writer_bid_details'] | @ count > 0): ?>
							
                            <?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out'): ?>
							
								<?php if (( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' && $this->_tpl_vars['article']['writer_bid_details'][0]['article_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out' )): ?>
								
                                <?php else: ?>
								<br/>
									<span id="time_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['article_submit_expires']; ?>
" class="alert alert-danger">
										<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['article_submit_expires']; ?>
"></span>
									</span>
								<?php endif; ?>
                            <?php endif; ?>
                            <?php endif; ?>	
							<?php elseif ($this->_tpl_vars['article']['totalParticipations'] || $this->_tpl_vars['article']['totalcycleParticipations']): ?>
							<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span class="label label-warning"><?php echo $this->_tpl_vars['article']['totalParticipations']; ?>
</span><span class="label label-inverse">of <?php echo $this->_tpl_vars['article']['totalcycleParticipations']; ?>
</span></a>
							<?php else: ?>
								-
							<?php endif; ?>
						</td> 
						<td>		
						<?php if ($this->_tpl_vars['article']['correction'] == 'yes'): ?>  
							<?php if ($this->_tpl_vars['article']['totalCorrectionParticipations'] == '0'): ?>
									<span class="label label-important">No participant</span> 
							<?php elseif ($this->_tpl_vars['article']['correctorParticipation']): ?>
								<?php if ($this->_tpl_vars['article']['corrector_comment_count']): ?>
									<a href="/deliveryongoing/article-comments?ao_id=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
&article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-toggle="modal" data-target="#comments_article"><sup class="pull-right"><img alt="" src="/BO/theme/gebo/img/gCons/comment.png"></sup></a>
								<?php endif; ?>
									<a target="_writer" href="/user/contributor-edit?submenuId=ML2-SL7&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_id']; ?>
"><?php echo $this->_tpl_vars['article']['correctorName']; ?>
</a>
								 <?php if ($this->_tpl_vars['article']['corrector_bid_details'] | @ count > 0): ?>
									<?php if (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' )): ?>

										<?php if (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' && $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'time_out' )): ?>
										
										<?php else: ?>
										<br>
										<span id="time_<?php echo $this->_tpl_vars['article']['id']; ?>
-correction_<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_submit_expires']; ?>
" class="alert alert-danger">
											<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['article']['id']; ?>
-correction_<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_submit_expires']; ?>
"></span>
										</span>
										<?php endif; ?>
									
									<?php endif; ?>
								<?php endif; ?>	
							<?php else: ?>
							<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning">PARTICIPATIONS IN PROGRESS</span></a>
							<?php endif; ?>
						<?php else: ?>
							Internal
						<?php endif; ?>
						</td>					  
						<td>
							  <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%
						</td>
						<td>
							<?php if ($this->_tpl_vars['article']['status'] == 'refused'): ?> <label class="label label-important">closed</label>
							<?php elseif ($this->_tpl_vars['article']['participation_expires'] < time() && $this->_tpl_vars['article']['totalParticipations'] == 0): ?>
										<label class="label label-important">No participant</label> 
							<?php elseif ($this->_tpl_vars['article']['writer_bid_details'] | @ count > 0): ?>
								<?php if ($this->_tpl_vars['article']['writer_bid_details'] | @ count > 0): ?>
									<?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out'): ?>

										<?php if (( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' && $this->_tpl_vars['article']['writer_bid_details'][0]['article_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out' )): ?>
											<label class="label label-important">Not Sent</label>
										<?php else: ?>
											<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">
													<?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out'): ?>
													WHILE WRITING <?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['latest_cycle'] > 1): ?>(<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['latest_cycle']; ?>
) <?php endif; ?>
													<?php else: ?>
													recovery in progress
													<?php endif; ?>
												</label></a>
										<?php endif; ?>
									<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'plag_exec' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage0'): ?>
									<a href="/proofread/stage-articles?submenuId=ML3-SL11&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">PLAGIARISM PHASE</label></a>
									<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage1'): ?>
									<a href="/proofread/stage-articles?submenuId=ML3-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">UNDER PHASE 1</label></a>
									<br>
									<!--<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writer_bid_details'][0]['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>
-->
									<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'client'): ?>
									<label class="label label-info">IN REPLAY Client</label>
									<br>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writer_bid_details'][0]['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>

									<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage2'): ?>
									<a href="/proofread/stage-articles?submenuId=ML3-SL3&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">UNDER PHASE 2</label></a>
									<br>
									<!--<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writer_bid_details'][0]['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>
-->

									<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'published' && $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] != 'published'): ?>
									<label class="label label-warning">VALIDATED</label>
									<?php else: ?>
										-
									<?php endif; ?>
								<?php endif; ?>                           
							<?php endif; ?>

							<?php if ($this->_tpl_vars['article']['bo_closed_status'] == 'closed' && ! $this->_tpl_vars['article']['writerParticipation']): ?>
							<label class="label label-warning">article closed</label>
							<?php elseif ($this->_tpl_vars['article']['participation_expires'] > time() || $this->_tpl_vars['article']['correction_participationexpires'] > time()): ?>
							<?php if ($this->_tpl_vars['article']['participation_expires'] > time() && ! $this->_tpl_vars['article']['writerParticipation'] && $this->_tpl_vars['article']['publishtime'] > time()): ?>
							<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info hint--left  hint" data-hint="R&eacute;dacteur">PROGRAMMED</label></a><br>
									<span id="time_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['publishtime']; ?>
" class="alert alert-danger">
										<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['publishtime']; ?>
"></span>
									</span>
							<?php elseif ($this->_tpl_vars['article']['participation_expires'] > time() && ! $this->_tpl_vars['article']['writerParticipation']): ?>
							<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info hint--left  hint" data-hint="R&eacute;dacteur">PARTICIPATIONS IN PROGRESS</label></a><br>
									<span id="time_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['participation_expires']; ?>
" class="alert alert-danger">
										<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['participation_expires']; ?>
"></span>
									</span>
														<?php endif; ?>
							<?php elseif ($this->_tpl_vars['article']['participation_expires'] < time() && $this->_tpl_vars['article']['totalParticipations'] > 0 && ! $this->_tpl_vars['article']['writerParticipation']): ?>
							<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="R&eacute;dacteur">IN Profile Selection</span></a>                            
							<?php endif; ?>
						</td>
						<!--correction details-->
						<td>
							<?php if ($this->_tpl_vars['article']['correction'] == 'yes'): ?>  
								<?php if ($this->_tpl_vars['article']['status'] == 'refused'): ?> <label class="label label-important">closed</label>
								<?php elseif ($this->_tpl_vars['article']['bo_closed_status'] == 'closed'): ?>
									<label class="label label-warning">article closed</label>
								<?php elseif ($this->_tpl_vars['article']['correction_participationexpires'] > time()): ?>
									<?php if ($this->_tpl_vars['article']['correction_participationexpires'] > time() && ! $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] && ! $this->_tpl_vars['article']['correctorParticipation']): ?>
									<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info hint--left  hint" data-hint="Correcteur">PARTICIPATIONS IN PROGRESS</label></a><br>
											<span id="time_<?php echo $this->_tpl_vars['article']['id']; ?>
-correction_<?php echo $this->_tpl_vars['article']['correction_participationexpires']; ?>
" class="alert alert-danger">
												<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['article']['id']; ?>
-correction_<?php echo $this->_tpl_vars['article']['correction_participationexpires']; ?>
"></span>
											</span>
									<?php endif; ?>
								<?php elseif ($this->_tpl_vars['article']['correction_participationexpires'] < time() && $this->_tpl_vars['article']['totalCorrectionParticipations'] > 0 && ! $this->_tpl_vars['article']['correctorParticipation']): ?>
								<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="Correcteur">IN Profile Selection</span></a>
								<?php elseif ($this->_tpl_vars['article']['correction_participationexpires'] < time() && $this->_tpl_vars['article']['totalCorrectionParticipations'] == 0): ?>
									<label class="label label-important">No participant</label> 
								<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out'): ?>

										<?php if (( ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved' ) && $this->_tpl_vars['article']['writer_bid_details'][0]['article_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out' )): ?>
											<label class="label label-important">Corrector waiting for article</label>
										<?php else: ?>
											<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">
												   
													<?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved'): ?>    
														While writing <?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['latest_cycle'] > 1): ?>(<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['latest_cycle']; ?>
) <?php endif; ?>
													<?php else: ?>
														Corrector waiting for article
													<?php endif; ?>
												</label></a><br>		
										<?php endif; ?>
								<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'plag_exec' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage0'): ?>
									<a href="/proofread/stage-articles?submenuId=ML3-SL11&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">EN PHASE PLAGIAT</label></a>
								<?php elseif ($this->_tpl_vars['article']['corrector_bid_details'] | @ count > 0): ?>
								
										<?php if (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'corrector' )): ?>

											<?php if (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' && $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'time_out' )): ?>
											<label class="label label-important">Not sent</label>
											<?php else: ?>
											<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">
													<?php if ($this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved'): ?> 
													CURRENT CORRECTION <?php if ($this->_tpl_vars['article']['corrector_bid_details'][0]['latest_cycle'] > 1): ?>(<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['latest_cycle']; ?>
) <?php endif; ?>
													<?php else: ?>
													recovery in progress
													<?php endif; ?>
												</label></a>																
											<?php endif; ?>
										<?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved_temp' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'closed_temp' )): ?>
										<a href="/correction/moderation?submenuId=ML3-SL10"><label class="label label-info">UNDER MODERATION</label></a>
										<br>
									   
										<?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'under_study' && $this->_tpl_vars['article']['corrector_bid_details'][0]['current_stage'] == 'stage2' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage2' )): ?>
										<a href="/proofread/stage-articles?submenuId=ML3-SL3&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">UNDER PHASE 2</label></a>
										<br>
									   
										<?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'under_study' && $this->_tpl_vars['article']['corrector_bid_details'][0]['current_stage'] == 'mission_test' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'mission_test' )): ?>
										<a href="/ao/markstat?submenuId=ML2-SL3"><label class="label label-info">Mission Test stats</label></a>
										<br>
									   
										<?php elseif ($this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'published' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'published'): ?>
										<label class="label label-warning">VALIDATED</label>
										<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'closed' || $this->_tpl_vars['article']['bo_closed_status'] == 'closed'): ?>
										<label class="label label-warning">article closed</label>
										<?php elseif (count($this->_tpl_vars['article']['writer_bid_details']) == 0): ?>
											<label class="label label-warning">Waiting for Writer selection	</label>
										<?php endif; ?>
								<?php endif; ?>
							<?php else: ?>
								<span class="label">Correction BO</span>
							<?php endif; ?>
						</td>
                        <td>
                            <?php if ($this->_tpl_vars['article']['delivered'] == 'yes'): ?>Yes<?php else: ?>No<?php endif; ?>
                        </td>
											</tr> 
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>	
							
				</tbody>
			</table>                        
	  </div>
	</div>
</div>
    <input type="hidden" id="hide_total" name="hide_total"  />

<!--///for the article view popup///-->
<div class="modal fullscreen hide fade" id="view_article_modal">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>View Article</h3>		
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>

<!--///for the article edit popup///-->
<div class="modal fullscreen hide fade" id="edit_article_modal">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Edit Article</h3>		
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>
<!--///when republish the popup comes for edit details and mail for republish article///-->
<div class="modal fullscreen hide fade" id="republish">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Article republish</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>


<!--Extend time of writer/corrector ///-->
<div class="modal container hide fade" id="extend_time">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Donner plus de temps</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>

<!--History of AO-->
<div class="modal container hide fade" id="ao_history">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Historique des actions men&eacute;es sur l'AO</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>
<!--Comments of AO-->
<div class="modal container hide fade" id="comments_article">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Commentaires</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>
<!--///for mail content show up for close the profile for close popup///-->
<div class="modal hide fade" id="closemail">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>FERMETURE DE L'ARTICLE</h3>
    </div>
    <div class="modal-body">
		<h3 id="bodymsg"></h3>
        <textarea name="closemailcontent" class="textarea" id="closemailcontent"></textarea>
    </div>
    <div class="modal-footer">
        <input type="hidden" id="userid" name="userid" />
        <input type="hidden" id="partid" name="partid" />
        <input type="hidden" id="artid" name="artid" />

        <span id="valid_button">
			<button type="button" id="closeart"  name="closeart" class="btn btn-danger" onclick="closeArtprofile('', 'yes');" >Valider</button>
		</span>	
		
    </div>
</div>
<div class="modal hide fade" id="refusal_reasons">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Les raisons du refus</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>

<!--COntributor emails-->
<div class="modal container hide fade" id="ao_contribmail">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Envoyer un email &agrave; tous les contributeurs de l'AO</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>
<div class="modal fullscreen hide fade" id="bulkrepublish">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Bulk article republish</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>

<div class="modal hide fade" id="repeat_delivery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
		<h3>Repeat</h3>
    </div>
    <div class="modal-body">
	
	</div>    
</div>	
<!--///for the ao edit popup///-->
<div class="modal fullscreen hide fade" id="edit_ao_modal">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Edit AO</h3>		
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>
<?php echo '
<script>
	$(".artload").click(function(){
		var ids = $(".artload:checked").map(function()
            {
                return $(this).val();
            }).get();
		if($.trim(ids))
		{
			$(".loadactions").html(\'<strong>Please Wait Loading</strong>\');
			$.post(\'/deliveryongoing/load-art-actions\',{\'ids\':ids,\'missiontest\':'; ?>
"<?php echo $this->_tpl_vars['missiontest']; ?>
"<?php echo ',\'ao_id\':'; ?>
"<?php echo $_GET['ao_id']; ?>
"<?php echo ',\'client_id\':'; ?>
"<?php echo $_GET['client_id']; ?>
"<?php echo '},function(data){$(".loadactions").html(data)});
		}
		else
			$(".loadactions").html(\'\');
	})
	
	var bfailure = '; ?>
"<?php echo $this->_tpl_vars['bfailure']; ?>
"<?php echo '
	if(bfailure!=0)
	$("#bfailure").text(bfailure);
</script>
'; ?>

<link rel="stylesheet" href="/BO/theme/gebo/lib/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/bootstrap-multiselect/bootstrap-multiselect.js" type="text/javascript" charset="utf-8"></script>