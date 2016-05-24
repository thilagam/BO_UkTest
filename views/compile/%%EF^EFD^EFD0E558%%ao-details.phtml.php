<?php /* Smarty version 2.6.19, created on 2015-06-25 15:00:40
         compiled from gebo/ongoing/ao-details.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/ongoing/ao-details.phtml', 262, false),array('function', 'math', 'gebo/ongoing/ao-details.phtml', 334, false),array('modifier', 'stripslashes', 'gebo/ongoing/ao-details.phtml', 289, false),array('modifier', 'date_format', 'gebo/ongoing/ao-details.phtml', 293, false),array('modifier', 'replace', 'gebo/ongoing/ao-details.phtml', 296, false),array('modifier', 'zero_cut', 'gebo/ongoing/ao-details.phtml', 296, false),array('modifier', 'count', 'gebo/ongoing/ao-details.phtml', 546, false),)), $this); ?>
<?php echo '
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/countdown.js"></script>
<!--<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/lib/ckeditor/ckeditor.js"></script>-->
<script type="text/javascript" >
    $(document).ready(function() {	
		
		//Tiny Editor
		$(\'textarea\').tinymce({
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
				if(days >0 )message += days + " days"  +", ";
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
	
	var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
      var js_date=(new Date().getTime())/ 1000;
      var diff_date=Math.floor(js_date-cur_date);
     //////////show timer//////////
	$("[id^=corrtime_]").each(function(i) {
		var article=$(this).attr(\'id\').split("_");
		var ts=article[2];
		$("#corrtime_"+article[1]+"_"+article[2]).countdown({
			timestamp   : ts,
            diff_date  : diff_date,
			callback    : function(days, hours, minutes, seconds){
				var message = "";
				if(days >0 )message += days + " jours"  +", ";
				if(hours >0 )message += hours + " h" +",";
				if(minutes >0 )message += minutes + " mns"+ ", ";
				message += seconds + " s";
				$("#corrtext_"+article[1]+"_"+article[2]).html(message);
				if(days==0 && hours==0 && minutes==0 && seconds==0)
				{
					//window.location.reload();
				}
			}
		});
	});	
		
//onload getting deliveries linked to client
			var client_id=$("#clients").val();
			fnloaddeliveries(client_id,\'ao_details\');
       if($(\'#ao_details\').length) {
                $(\'#ao_details\').dataTable({
                    "sPaginationType": "bootstrap",
					"iDisplayLength" : 25,
                     "sDom": "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
					"aoColumns": [
						{ "sType": "formatted-num" },
						{ "sType": "natural" },
						{ "sType": "string" },
						{ "sType": "eu_date" },
						{ "sType": "formatted-num" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "formatted-num" },
						{ "sType": "html" }
					],
					"aaSorting": [[ 0, "asc" ]],
                    "oTableTools": {
                        "aButtons": [
                            "copy",
                            "print",
                            {
                                "sExtends":    "collection",
                                "sButtonText": \'Save  <span class="caret" />\',
                                "aButtons":    [ "csv", "xls", "pdf" ]
                            }
                        ],
                        "sSwfPath": "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                    },
					"aoColumnDefs": [
						  { \'bSortable\': false, \'aTargets\': [ 4,5,6,7,8 ] }
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
function getCloseComment(artid, partscount)
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
  }
  ///////////when click on TO BE CLOSED in list of profiles/////////////
  function closeArtprofile(artid, participants)
  {
        var comment = CKEDITOR.instances[\'closemailcontent\'].getData();
        var target_page = "/republish/closeartprofile?comment="+escape(comment)+"&art_id="+artid+"&participants="+participants;
        $.post(target_page, function(data){  //alert(data);
            window.location.reload();
        });
  }
  //get all contributor based on the type, lang, cat//////
function updatedContribList(artId)
{
	var contribtype = $("input[name=\'contribtype[]\']:checked").map(function () {return this.value;}).get().join("\',\'");
	var cat=$("#contrib_cat").val();
	var lang=$("select#contrib_lang").val();
	lang= $.trim(lang);
	$.ajax({
		type: \'GET\',
		//url: \'/ao/updatecontriblist\',
		url: \'/republish/loaduserslist\',
		// data: \'type=\' + contribtype+\'&category=\'+cat+\'&language=\'+lang+\'&parameter=\'+param,
		data: \'type=\' + contribtype+\'&category=\'+cat+\'&language=\'+lang+"&artId="+artId,
		success: function(data)
		{ // alert(data);
			$(\'#contribs\').html(data);
			 $("#favcontribcheck").chosen();
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


<!--Bread Crumbs-->
<!--<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li>
				<a href="/index"><i class="icon-home"></i></a>
			</li>
			<li>
				<a>Ongoing AO</a>
			</li>			
		</ul>
	</div>
</nav>-->
<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">
			MONITORING THE DELIVERY
			<div style="display:inline;float:right"><button name="back" class="btn btn-success" onClick="window.location='/ongoing/list?submenuId=ML2-SL4'">Return</button></div>  
		</h3>
		   
		<div  id="search_block">
			<form action=<?php echo $_SERVER['REQUEST_URI']; ?>
 method="get" id="searchform" name="searchform" >				
				 <input type="hidden" id="submenuId" name="submenuId"  value="<?php echo $this->_tpl_vars['submenuId']; ?>
"/>				  
				 <table id="searchtable" cellspacing="5" cellpadding="5">
					<tr>
						<td>Select client :</td>
						<td>
							<select name="client_id" id="clients" onChange="fnloaddeliveries(this.value,'ao_details');">
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['client_array'],'selected' => $_GET['client_id']), $this);?>
	
							</select>
						</td>
						<td>Select Delivery :</td>
						<td id="aolistall">
							<select name="ao_id" id="deliveries" onChange="this.form.submit();"  data-placeholder="Deliveries">
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['delivery_array'],'selected' => $_GET['ao_id']), $this);?>
				  
							</select>
						</td>					
					</tr>
				</table>
			</form>
		</div>
		
		<?php if ($this->_tpl_vars['aoDetails'] | @ count > 0): ?>
		<?php $_from = $this->_tpl_vars['aoDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['aoDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['aoDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['delivery']):
        $this->_foreach['aoDetails']['iteration']++;
?> 		
		<div class="row-fluid">
			<div class="w-box">
				<div class="w-box-header">
					Information on the Delivery
                </div>
				<div class="w-box-content cnt_a">
				<table class="table table-striped table-bordered">
					<tr>
						<th>Client</th>
						<td><?php echo $this->_tpl_vars['delivery']['client']; ?>
</td>
						<th>Delivery Title</th>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
					</tr>
					<tr>
						<th>Date of creation</th>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
</td>
						<th>Price total Delivery</th>
						<td>
							<span class="label label-inverse hint--left  hint" data-hint="Writing"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['delivery']['totalAmount'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', '') : smarty_modifier_replace($_tmp, ',', '')))) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['delivery']['currency']; ?>
;</span>
							<?php if ($this->_tpl_vars['delivery']['totalCorrectorAmount']): ?>
								 + <span class="label label-inverse hint--left  hint" data-hint="Proofreading"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['delivery']['totalCorrectorAmount'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', '') : smarty_modifier_replace($_tmp, ',', '')))) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['delivery']['currency']; ?>
;</span>
							<?php endif; ?>
							</span></td>
					</tr>
					<tr>
						<th>Created by</th>
						<td><?php echo $this->_tpl_vars['delivery']['incharge']; ?>
</td>
						<th>Amount already paid</th>
						<td>
							<?php if ($this->_tpl_vars['delivery']['amount_paid'] == NULL): ?>
								/
							<?php else: ?>
								<span class="label label-success  hint--left  hint--success" data-hint="Writing"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['delivery']['amount_paid'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', '') : smarty_modifier_replace($_tmp, ',', '')))) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['delivery']['currency']; ?>
;</span>
									<?php if ($this->_tpl_vars['delivery']['corrector_amount_paid']): ?>
									 + <span class="label label-success hint--left  hint--success" data-hint="Proofreading"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['delivery']['corrector_amount_paid'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', '') : smarty_modifier_replace($_tmp, ',', '')))) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['delivery']['currency']; ?>
;</span>
									<?php endif; ?>
							<?php endif; ?>	
						</td>
						
					</tr>
					<tr>
						<th>Delivery</th>
						<td><?php echo $this->_tpl_vars['delivery']['AOtype']; ?>
</td>
						<th>Articles total</th>
						<td><span class="label label-inverse"><?php echo $this->_tpl_vars['delivery']['totalArticle']; ?>
</span></td>
					</tr>						
					<tr>						
						<th>Anonymous</th>
						<td><?php if ($this->_tpl_vars['delivery']['deli_anonymous']): ?>Oui<?php else: ?>Non<?php endif; ?></td>
						<th>Treated articles</th>
						<td><span class="label label-success"><?php echo $this->_tpl_vars['delivery']['published_articles']; ?>
</span></td>						
					</tr>
					<tr>
						<th>Brief</th>
						<td><a class="label label-warning" href="/BO/download_brief.php?ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
">Download</a></td>
						<th>Pending items</th>
						 <?php echo smarty_function_math(array('equation' => "a - b",'a' => $this->_tpl_vars['delivery']['totalArticle'],'b' => $this->_tpl_vars['delivery']['published_articles'],'assign' => 'pending_article'), $this);?>

						<td><span class="label label-important"><?php echo $this->_tpl_vars['pending_article']; ?>
</span></td>
						
						
					</tr>
					<tr>
						<td colspan="2"></td>
						<th>Note moyenne mission</th>
						<td><span class="label label-inverse"><?php echo ((is_array($_tmp=$this->_tpl_vars['delivery']['avg_marks'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span> <b>( <?php echo $this->_tpl_vars['delivery']['article_count_marks']; ?>
 / <?php echo $this->_tpl_vars['delivery']['total_article']; ?>
 )</b></td>
					</tr>
					<input type="hidden" id="ao_id" name="ao_id" value="<?php echo $this->_tpl_vars['delivery']['id']; ?>
">
					<tr>
						<td colspan="2" rowspan="2">
							<a href="/ongoing/ao-history?ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
" role="button" data-toggle="modal" data-target="#ao_history" class="label label-warning">View the history of actions performed on this AO</a><br>
							<a href="/ongoing/ao-contribmail?ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
" role="button" data-toggle="modal" data-target="#ao_contribmail" class="label label-warning"><i class="splashy-mail_light"></i> Send an email to all this AO contributors</a>
						</td>					
						<td colspan="2">							
							<a class="btn btn-info" href="/ongoing/edit-ao?ao_id=<?php echo $this->_tpl_vars['delivery']['id']; ?>
&client_id=<?php echo $this->_tpl_vars['delivery']['user_id']; ?>
" data-toggle="modal" role="button" data-target="#edit_ao_modal" id="edit_ao"><i class="splashy-application_windows_edit"></i><span style="vertical-align: text-bottom;"> Edit AO</span></a>
							<!--<button class="btn btn-danger" id="delete_ao" name="delete_ao" type="button"><i class="icon-adt_trash"></i><span>  Delete AO</span></button>-->
						</td>
					</tr>
				</table>
				</div>
			</div>					
		</div>
		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
		<div class="row-fluid">		
		   
			<table class="table table-striped table-bordered dTableR" id="ao_details">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Article Title</th>
						<th>Writer</th>
						<th>Corrector</th>
						<th>billing</th>
						<th>Writing Status</th>						
						<th>Correction Status</th>						
						<th>Action</th>
						<th>Note</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
			<?php if ($this->_tpl_vars['articleDetails'] | @ count > 0): ?>
				<?php $_from = $this->_tpl_vars['articleDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['articleDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['articleDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['articleDetails']['iteration']++;
?> 
					<tr>
						<td><?php echo ($this->_foreach['articleDetails']['iteration']-1)+1; ?>
</td>
						<td><div style="display:none;"><?php echo $this->_tpl_vars['article']['title']; ?>
</div><a class="editable editable-click" href="/ongoing/edit-article?article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-toggle="modal" role="button" data-target="#edit_article_modal" id="edit_article"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></td>
						<td><div style="display:none;"><?php echo $this->_tpl_vars['article']['writerName']; ?>
</div>
							<?php if ($this->_tpl_vars['article']['bo_closed_status'] == 'closed' && ! $this->_tpl_vars['article']['writerParticipation']): ?>
								<label class="label label-warning">Article closed</label>								
							<?php elseif ($this->_tpl_vars['article']['totalParticipations'] == '0'): ?>
								<span class="label label-important">No participant</span>
							<?php elseif ($this->_tpl_vars['article']['writerParticipation']): ?>
								<a target="_writer" href="/user/contributor-edit?submenuId=ML2-SL7&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['user_id']; ?>
"><?php echo $this->_tpl_vars['article']['writerName']; ?>
</a>
								<br> <a class="label label-success" data-hint="download contract" href="/ongoing/download-contract?article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
&user_id=<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['user_id']; ?>
" ><i class="splashy-download"></i></a>
								<a class="label label-warning" data-hint="T&eacute;l&eacute;charger l'article" href="/BO/download_article.php?article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
&type=writer"><i class="splashy-download"></i></a>
								<!--<?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'published'): ?>
								<?php endif; ?>-->
							<?php else: ?>
									<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning">Pending selection</span></a>
							<?php endif; ?>
						</td> 
						<td><div style="display:none;"><?php echo $this->_tpl_vars['article']['correctorName']; ?>
</div>
							<?php if ($this->_tpl_vars['article']['correction'] == 'yes'): ?>  
								<?php if ($this->_tpl_vars['article']['totalCorrectionParticipations'] == '0'): ?>
									<span class="label label-important">No participant</span> 
								<?php elseif ($this->_tpl_vars['article']['correctorParticipation']): ?>
									<a target="_writer" href="/user/contributor-edit?submenuId=ML2-SL7&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_id']; ?>
"><?php echo $this->_tpl_vars['article']['correctorName']; ?>
</a>
									<?php if ($this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'published'): ?>
										<br> <a class="label label-success" href="/ongoing/download-contract?article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
&user_id=<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_id']; ?>
" >Download Contract</a>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['article']['corrector_artproc_details'] != 'NO'): ?>
                            <a class="label label-warning" data-hint="download article" href="/BO/download_article.php?article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
&type=corrector"><i class="splashy-download"></i></a>
                            						<?php endif; ?>	
								<?php else: ?>
									<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning">Pending selection</span></a>
								<?php endif; ?>
							<?php else: ?>
								<span class="label">Correction BO</span>
							<?php endif; ?>
						</td>					  
						<!--<td><?php if ($this->_tpl_vars['article']['paid_status'] == 'paid'): ?><span class="label label-success">pay&eacute;e</span><?php else: ?><span class="label label-important">Non pay&eacute;e</span><?php endif; ?></td>-->
						<td>
							<?php if ($this->_tpl_vars['article']['writer_facturation_details'] | @ count > 0 || $this->_tpl_vars['article']['corrector_facturation_details'] | @ count > 0): ?>
								
								
								<span <?php if ($this->_tpl_vars['article']['writer_facturation_details'][0]['price_user'] && $this->_tpl_vars['article']['corrector_facturation_details'][0]['price_corrector']): ?>data-hint="Writing + Proof reading" <?php elseif ($this->_tpl_vars['article']['writer_facturation_details'][0]['price_user']): ?> data-hint="Writing" <?php elseif ($this->_tpl_vars['article']['corrector_facturation_details'][0]['price_corrector']): ?>data-hint="Proof reading"<?php endif; ?>  class="label label-inverse hint--left  hint">
									<?php echo $this->_tpl_vars['article']['writer_facturation_details'][0]['price_user']+$this->_tpl_vars['article']['corrector_facturation_details'][0]['price_corrector']; ?>
&<?php echo $this->_tpl_vars['article']['writer_facturation_details'][0]['currency']; ?>
;
								</span>	
								&nbsp;
								<?php if ($this->_tpl_vars['article']['correctorParticipation']): ?>
									<span id="ficon_article_<?php echo $this->_tpl_vars['article']['correctorParticipation']; ?>
" style="cursor:pointer"><i class="splashy-add_outline"></i></span> 
								<?php else: ?>
									<span id="ficon_article_<?php echo $this->_tpl_vars['article']['id']; ?>
" style="cursor:pointer"><i class="splashy-add_outline"></i></span> 
								<?php endif; ?>	
							<?php else: ?>
								N/A
							<?php endif; ?>	
							<?php if ($this->_tpl_vars['article']['correctorParticipation']): ?>
								<div id="fslide_span_<?php echo $this->_tpl_vars['article']['correctorParticipation']; ?>
" style="display:none">
							<?php else: ?>
								<div id="fslide_span_<?php echo $this->_tpl_vars['article']['id']; ?>
" style="display:none">	
							<?php endif; ?>	
								<?php if ($this->_tpl_vars['article']['writer_facturation_details'] | @ count > 0): ?>
								<table class='table table-bordered'>
									<?php $this->assign('price_total', $this->_tpl_vars['article']['writer_facturation_details'][0]['price_user']); ?>
									<tr>
										<th>Price writer selected</th>
										<td><?php echo $this->_tpl_vars['article']['writer_facturation_details'][0]['price_user']; ?>
&<?php echo $this->_tpl_vars['article']['writer_facturation_details'][0]['currency']; ?>
;</td>
									</tr>
									<tr>
										<th>Average price participants</th>
										<td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writer_facturation_details'][0]['avg_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
&<?php echo $this->_tpl_vars['article']['writer_facturation_details'][0]['currency']; ?>
;</td>
									</tr>
									<?php if ($this->_tpl_vars['article']['corrector_facturation_details'] | @ count > 0): ?>								
									<?php $this->assign('price_total', $this->_tpl_vars['price_total']+$this->_tpl_vars['article']['corrector_facturation_details'][0]['price_corrector']); ?>
									<tr>
										<th>Price Proof reader</th>
										<td><?php echo $this->_tpl_vars['article']['corrector_facturation_details'][0]['price_corrector']; ?>
&<?php echo $this->_tpl_vars['article']['writer_facturation_details'][0]['currency']; ?>
;</td>
									</tr>
									<tr>
										<th>Price total (Proof reader + writer)</th>
										<td><?php echo $this->_tpl_vars['price_total']; ?>
&<?php echo $this->_tpl_vars['article']['writer_facturation_details'][0]['currency']; ?>
;</td>
									</tr>									
									<?php endif; ?>									
									<tr>
										<th>Payment status</th>
										<td>
											<?php if ($this->_tpl_vars['article']['writer_facturation_details'][0]['status'] == 'Not paid'): ?>
												invoice created
											<?php elseif ($this->_tpl_vars['article']['writer_facturation_details'][0]['status'] == 'paid'): ?>
												paid
											<?php elseif ($this->_tpl_vars['article']['writer_facturation_details'][0]['royalty']): ?>	
												waiting
											<?php else: ?>
												N/A
											<?php endif; ?>	
												
											
										</td>
									</tr>
								</table>
								<?php endif; ?>
								
							</div>	
						</td>
						
						<!------------------------------------------- Writing status ------------------------------------------>
						<td>
                        <?php if ($this->_tpl_vars['article']['status'] == 'refused'): ?> <label class="label label-important">closed</label>
                        <?php elseif ($this->_tpl_vars['article']['writer_bid_details'] | @ count > 0 || $this->_tpl_vars['article']['corrector_bid_details'] | @ count > 0): ?>
                            <?php if ($this->_tpl_vars['article']['writer_bid_details'] | @ count > 0): ?>
								<?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out'): ?>

									<?php if (( ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved' ) && $this->_tpl_vars['article']['writer_bid_details'][0]['article_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out' )): ?>
										<label class="label label-important">Not Sent</label>
									<?php else: ?>
										<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">
											   
												<?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved'): ?>    
													WHILE WRITING <?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['latest_cycle'] > 1): ?>(<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['latest_cycle']; ?>
) <?php endif; ?>
												<?php else: ?>
													recovery in progress
												<?php endif; ?>
											</label></a><br>
															<span id="time_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['article_submit_expires']; ?>
" class="alert alert-danger">
																<i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['article_submit_expires']; ?>
"></span>
															</span>
									<?php endif; ?>
							<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'plag_exec' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage0'): ?>
								<a href="/proofread/stage-articles?submenuId=ML3-SL11&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">PLAGIARISM PHASE</label></a>
							<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage1'): ?>
								<a href="/proofread/stage-deliveries?submenuId=ML3-SL2"><label class="label label-info">UNDER PHASE 1</label></a>
								<br>
							   
							<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'client'): ?>
								<label class="label label-info">IN REPLAY Client</label>
								<br>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['writer_bid_details'][0]['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %R") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %R")); ?>

							<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage2' && $this->_tpl_vars['article']['corrector_bid_details'][0]['current_stage'] != 'stage2'): ?>
								<a href="/proofread/stage-deliveries?submenuId=ML3-SL3"><label class="label label-info">UNDER PHASE 2</label></a>
								<br>
							  
							<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'published' && $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] != 'published'): ?>
								<label class="label label-warning">VALIDATED</label>
							<?php elseif (( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved_temp' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'closed_temp' ) && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'corrector'): ?>	
										<?php if (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] != 'disapproved_temp' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] != 'closed_temp' )): ?>
											<?php if (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' && $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'time_out' )): ?>
											<label class="label label-important">NOT SENT</label>
											<?php else: ?>
											<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">
													<?php if ($this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved'): ?> 
													 CURRENT CORRECTION <?php if ($this->_tpl_vars['article']['corrector_bid_details'][0]['latest_cycle'] > 1): ?>(<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['latest_cycle']; ?>
) <?php endif; ?>
													<?php else: ?>
													recovery in progress
													<?php endif; ?>
												</label></a><br>
																
											<?php endif; ?>
										<?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved_temp' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'closed_temp' )): ?>
										<a href="/correction/moderation?submenuId=ML3-SL10"><label class="label label-info">UNDER MODERATION</label></a>
										<br>
									   <?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'under_study' && $this->_tpl_vars['article']['corrector_bid_details'][0]['current_stage'] == 'mission_test' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'mission_test' )): ?>
										<a href="/ao/markstat?submenuId=ML2-SL3"><label class="label label-info">Mission Test stats</label></a>
										<br>
									   
										
										<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'closed' || $this->_tpl_vars['article']['bo_closed_status'] == 'closed'): ?>
										<label class="label label-warning">article closed</label>
										<?php elseif (count($this->_tpl_vars['article']['corrector_bid_details']) == 0): ?>
											<label class="label label-warning">Waiting for corrector selection</label>
									<?php endif; ?>
							<?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'under_study' && $this->_tpl_vars['article']['corrector_bid_details'][0]['current_stage'] == 'stage2' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage2' )): ?>
									<a href="/proofread/stage-deliveries?submenuId=ML3-SL3"><label class="label label-info">UNDER PHASE 2</label></a>
										<br>
							<?php elseif ($this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'published' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'published'): ?>
										<label class="label label-warning">VALIDATED</label>
							<?php endif; ?>
							<?php endif; ?>  
							<?php endif; ?>
							
                            <?php if ($this->_tpl_vars['article']['bo_closed_status'] == 'closed' && ! $this->_tpl_vars['article']['writerParticipation']): ?>
                            <label class="label label-warning">article closed</label>
                            <?php elseif ($this->_tpl_vars['article']['participation_expires'] > time()): ?>
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
											<a data-hint="click here to extend time" data-toggle="modal" data-target="#extendpartime" href="/processao/extend-part-expire-time?artId=<?php echo $this->_tpl_vars['article']['id']; ?>
&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><i class="icon-time"></i> <span id="text_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['participation_expires']; ?>
"></span></a>
										</span>
								<?php endif; ?>
                            <?php elseif ($this->_tpl_vars['article']['participation_expires'] < time() && $this->_tpl_vars['article']['totalParticipations'] > 0 && ! $this->_tpl_vars['article']['writerParticipation']): ?>
								<?php if ($this->_tpl_vars['article']['totalParticipations'] == $this->_tpl_vars['article']['totalRefusedParticipations']): ?>
									<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="R&eacute;dacteur">PARTICIPATION(S) REFUSED</span></a>
								<?php else: ?>
									<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="R&eacute;dacteur">IN Profile Selection</span></a>
								<?php endif; ?>
							<!-- new status-->
							<?php elseif ($this->_tpl_vars['article']['participation_expires'] < time() && $this->_tpl_vars['article']['totalParticipations'] == 0 && ! $this->_tpl_vars['article']['writerParticipation']): ?>
								<label class="label label-warning">No participation</label>
                           					   
						    <?php endif; ?>
							
							 <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
" aria-valuemin="0" aria-valuemax="100"

                                <?php if ($this->_tpl_vars['article']['progressbar_percent'] == 0): ?> style="width: 100%;  background:#E3E5F4;"
                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 15): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#ff7200;"
                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 30): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#ffa200;"
                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 45): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#ffd21d;"
                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 65): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; background:#f2f43c;"
                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 85): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; background:#cbf43c;"
                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 100): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%;  background:#3fe805;"

                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 12): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#ff7200;"
                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 25): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#ffa200;"
                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 37): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#ffc600;"
                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 50): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; background:#ffd21d;"
                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 62): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; background:#f2f43c;"
                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 85): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%; color:#FFFFFF; background:#f2f43c;"
                                <?php elseif ($this->_tpl_vars['article']['progressbar_percent'] == 97): ?> style="width: <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%;  background:#cbf43c;"
                                <?php endif; ?> >
                                <?php echo $this->_tpl_vars['article']['progressbar_percent']; ?>
%
                                </div>
                            </div>
						</td>
							<!------------------------------------------- Correction status ------------------------------------------>
						<td>
                        <?php if ($this->_tpl_vars['article']['correction'] == 'yes'): ?>  
							<?php if ($this->_tpl_vars['article']['status'] == 'refused'): ?> <label class="label label-important">closed</label>
							<?php elseif ($this->_tpl_vars['article']['bo_closed_status'] == 'closed'): ?>
								<label class="label label-warning">article closed</label>
							<?php elseif ($this->_tpl_vars['article']['correction_participationexpires'] > time()): ?>
								<?php if ($this->_tpl_vars['article']['correction_participationexpires'] > time() && ! $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] && ! $this->_tpl_vars['article']['correctorParticipation']): ?>
								<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info hint--left  hint" data-hint="Correcteur">PARTICIPATIONS IN PROGRESS</label></a><br>
										<span id="corrtime_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['correction_participationexpires']; ?>
" class="alert alert-danger">
											<a  data-hint="click here to extend time" data-toggle="modal" data-target="#extendpartime" href="/correction/extend-Crt-part-expire-time?artId=<?php echo $this->_tpl_vars['article']['id']; ?>
&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><i class="icon-time"></i> <span id="corrtext_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['correction_participationexpires']; ?>
"></span></a>
										</span>
								<?php endif; ?>
							<?php elseif ($this->_tpl_vars['article']['correction_participationexpires'] < time() && $this->_tpl_vars['article']['totalCorrectionParticipations'] > 0 && ! $this->_tpl_vars['article']['correctorParticipation']): ?>
								<?php if ($this->_tpl_vars['article']['totalCorrectionParticipations'] == $this->_tpl_vars['article']['totalRefusedCorrectionParticipations']): ?>
									<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="Correcteur">PARTICIPATION(S) REFUSED</span></a>
								<?php else: ?>
									<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="Correcteur">IN Profile Selection</span></a>
								<?php endif; ?>	
							<?php elseif ($this->_tpl_vars['article']['correction_participationexpires'] < time() && $this->_tpl_vars['article']['totalCorrectionParticipations'] == 0): ?>
								<label class="label label-warning">No participation</label> 
							<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out'): ?>

									<?php if (( ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved' ) && $this->_tpl_vars['article']['writer_bid_details'][0]['article_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'time_out' )): ?>
										<label class="label label-important"><!--Non envoy&eacute; par le r&eacute;dacteur-->
										<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="Correcteur">Corrector waiting for article</a></label>
									<?php else: ?>
										<!--<a href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">-->
											   
												<?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'bid' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved'): ?>    
													<!--EN COURS DE REDACTION <?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['latest_cycle'] > 1): ?>(<?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['latest_cycle']; ?>
) <?php endif; ?>-->
													<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="Correcteur">Corrector waiting for article</a>
												<?php else: ?>
													<!--Non envoy&eacute; par le r&eacute;dacteur-->
													<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><span  style="cursor:pointer" class="label label-warning hint--left  hint" data-hint="Correcteur">Corrector waiting for article</a>
												<?php endif; ?>
											<!--</label></a>--><br>
															
									<?php endif; ?>
							<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'plag_exec' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage0'): ?>
								<a href="/proofread/stage-articles?submenuId=ML3-SL11&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">PLAGIARISM PHASE</label></a>
							<?php elseif ($this->_tpl_vars['article']['corrector_bid_details'] | @ count > 0): ?>
							
									<?php if (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'corrector' )): ?>

										<?php if (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' && $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_submit_expires'] < time() ) || ( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'time_out' )): ?>
										<label class="label label-important">NOT SENT</label>
										<?php else: ?>
										<a href="/correction/corrector-article-profiles?submenuId=ML2-SL18&aoId=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
"><label class="label label-info">
												<?php if ($this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved'): ?> 
												CURRENT CORRECTION <?php if ($this->_tpl_vars['article']['corrector_bid_details'][0]['latest_cycle'] > 1): ?>(<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['latest_cycle']; ?>
) <?php endif; ?>
												<?php else: ?>
												recovery in progress
												<?php endif; ?>
											</label></a><br>
															<span id="corrtime_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_submit_expires']; ?>
" class="alert alert-danger">
																<i class="icon-time"></i> <span id="corrtext_<?php echo $this->_tpl_vars['article']['id']; ?>
_<?php echo $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_submit_expires']; ?>
"></span>
															</span>
										<?php endif; ?>
									<?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'bid' || $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'disapproved' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'disapproved_temp' || $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'closed_temp' )): ?>
									<a href="/correction/moderation?submenuId=ML3-SL10"><label class="label label-info">UNDER MODERATION</label></a>
									<br>
								   
									<?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'under_study' && $this->_tpl_vars['article']['corrector_bid_details'][0]['current_stage'] == 'stage2' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'stage2' )): ?>
									<a href="/proofread/stage-deliveries?submenuId=ML3-SL3"><label class="label label-info">UNDER PHASE 2</label></a>
									<br>
								   
									<?php elseif (( $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'under_study' && $this->_tpl_vars['article']['corrector_bid_details'][0]['current_stage'] == 'mission_test' ) && ( $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'under_study' || $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] == 'mission_test' )): ?>
									<a href="/ao/markstat?submenuId=ML2-SL3"><label class="label label-info">Mission Test stats</label></a>
									<br>
								   
									<?php elseif ($this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] == 'published' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'published'): ?>
									<label class="label label-warning">VALIDATED</label>
									<?php elseif ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] == 'closed' || $this->_tpl_vars['article']['bo_closed_status'] == 'closed'): ?>
									<label class="label label-warning">article closed</label>
									<?php elseif (count($this->_tpl_vars['article']['writer_bid_details']) == 0): ?>
										<label class="label label-warning">Waiting for writer selection</label>
									<?php endif; ?>
							<?php endif; ?>
						<?php else: ?>
							<span class="label">Correction BO</span>
						<?php endif; ?>
						</td>
						<td>
							<?php if ($this->_tpl_vars['article']['totalParticipations'] == '0' && $this->_tpl_vars['article']['participation_expires'] < time() && $this->_tpl_vars['article']['missiontest'] != 'yes'): ?>
								<button class="btn btn-danger btn hint--left  hint" name="closerepublish" href="/republish/republishpopup?artId=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-target="#republish" data-toggle="modal" type="button"  data-hint="Re publish writer"><i class="icon-repeat"></i></button>
							<?php elseif ($this->_tpl_vars['article']['totalParticipations'] > 0 && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] != 'published' && $this->_tpl_vars['article']['participation_expires'] < time() && $this->_tpl_vars['article']['missiontest'] != 'yes'): ?>
								<button class="btn btn-danger btn hint--left  hint" name="closerepublish" href="/republish/republishpopup?artId=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-target="#republish" data-toggle="modal" type="button"  data-hint="Re publish Writer"><i class="icon-repeat"></i></button>	
							<?php endif; ?>
							<?php if ($this->_tpl_vars['article']['totalCorrectionParticipations'] == '0' && $this->_tpl_vars['article']['correction'] == 'yes' && $this->_tpl_vars['article']['correction_participationexpires'] < time() && $this->_tpl_vars['article']['correction_participationexpires'] != 0 && $this->_tpl_vars['article']['missiontest'] != 'yes'): ?>
								<button class="btn btn-danger btn hint--left  hint" name="closerepublish" id="closerepublish0" href="/correction/republishcorrectorpopup?nopart=no&amp;close=no&amp;artId=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-target="#republish" data-toggle="modal" type="button" data-hint="Re publish Corrector"><i class="icon-repeat"></i></button>
							<?php elseif ($this->_tpl_vars['article']['totalCorrectionParticipations'] > 0 && $this->_tpl_vars['article']['correction'] == 'yes' && $this->_tpl_vars['article']['corrector_bid_details'][0]['corrector_status'] != 'published' && $this->_tpl_vars['article']['correction_participationexpires'] < time() && $this->_tpl_vars['article']['correction_participationexpires'] != 0 && $this->_tpl_vars['article']['missiontest'] != 'yes'): ?>
								<button class="btn btn-danger btn hint--left  hint" name="closerepublish" id="closerepublish0" href="/correction/republishcorrectorpopup?close=yes&amp;artId=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-target="#republish" data-toggle="modal" type="button" data-hint="Re publish Corrector"><i class="icon-repeat"></i></button>	
							<?php endif; ?>
							
							<?php if ($this->_tpl_vars['article']['writerParticipation']): ?>
								<?php if ($this->_tpl_vars['article']['expiredWriterParticipation']): ?>
									<a href="/ongoing/extend-time?utype=writer&participation_id=<?php echo $this->_tpl_vars['article']['expiredWriterParticipation']; ?>
" role="button" data-toggle="modal" data-target="#extend_time" class="btn hint--left  hint" data-hint="Add Time for writer"><i class="icon-time"></i><sup>+</sup></a>								
								<?php endif; ?>
								<?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] != 'published' && $this->_tpl_vars['article']['writer_bid_details'][0]['writer_status'] != 'closed' && $this->_tpl_vars['article']['writer_bid_details'][0]['current_stage'] != 'stage2'): ?>
									<a data-toggle="modal" class="btn btn-inverse" onclick="return getCloseComment('<?php echo $this->_tpl_vars['article']['id']; ?>
',0)">Close</a>
								<?php endif; ?>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['article']['correctorParticipation']): ?>
								<?php if ($this->_tpl_vars['article']['expiredcorrectorParticipation']): ?>
									<a href="/ongoing/extend-time?utype=corrector&participation_id=<?php echo $this->_tpl_vars['article']['expiredcorrectorParticipation']; ?>
" role="button" data-toggle="modal" data-target="#extend_time" class="btn hint--left  hint" data-hint="Add Time for Corrector"><i class="icon-time"></i><sup>+</sup></a>								
								<?php endif; ?>								
							<?php endif; ?>
							<br/>
							<a href="/ongoing/ao-history?ao_id=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
&article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
" role="button" data-toggle="modal" data-target="#ao_history" class="label label-warning">View history</a>
						</td>
						<td>
								<?php if ($this->_tpl_vars['article']['writer_bid_details'][0]['marks']): ?>
									<span class="label"><span class="label label-important"><?php echo $this->_tpl_vars['article']['writer_bid_details'][0]['marks']; ?>
</span> / <span class="label label-inverse">10</span></span>
								<?php else: ?>
									-NA-
								<?php endif; ?>
						</td>
						<td>
							<?php if ($this->_tpl_vars['article']['comment_count'] > 0): ?>
								<a href="/ongoing/article-comments?ao_id=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
&article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-toggle="modal" data-target="#comments_article" data-hint="Comments" class="btn btn-info hint--left hint--info"><i class="splashy-comments_reply"></i></a>
							<?php else: ?>
								<a href="/ongoing/article-comments?ao_id=<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
&article_id=<?php echo $this->_tpl_vars['article']['id']; ?>
" data-toggle="modal" data-target="#comments_article" data-hint="Comments" class="btn hint--left hint--info"><i class="splashy-comments_reply"></i></a>
							<?php endif; ?>	
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

<!--///for the ao edit popup///-->
<div class="modal container hide fade" id="edit_ao_modal">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Edit Delivery</h3>		
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>


<!--///for the article edit popup///-->
<div class="modal container hide fade" id="edit_article_modal">
    <div class="modal-header">        
		<button class="close" data-dismiss="modal">&times;</button>
        <h3>Edit Article</h3>		
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>
<!--///when republish the popup comes for edit details and mail for republish article///-->
<div class="modal container hide fade" id="republish">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Re-publication of article</h3>
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
        <h3>Give more time</h3>
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
        <h3>History of actions on the AO</h3>
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
        <h3>Comments</h3>
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
        <h3>CLOSE ARTICLE</h3>
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
        <h3>Send an email to all this AO contributors</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>