<?php /* Smarty version 2.6.19, created on 2015-09-02 17:31:00
         compiled from gebo/followup/convert-stencils.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/followup/convert-stencils.phtml', 378, false),array('modifier', 'htmlentities', 'gebo/followup/convert-stencils.phtml', 387, false),)), $this); ?>
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
	
	#ao_details td
	{
		vertical-align: middle;
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
		
		
		
//onload getting deliveries linked to client
			var client_id=$("#clients").val();
			
       if($(\'#ao_details\').length) {
               $(\'#ao_details\').dataTable({
					"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
					"sPaginationType": "bootstrap",
					"aaSorting": [[ 0, "asc" ]],
					"iDisplayLength":10,
					"aoColumns": [
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
			<h2 class="heading" style="margin-bottom:0"> View Stencils </h2>
			<h3><?php echo $this->_tpl_vars['delivery']['mission_title']; ?>
 > <?php echo $this->_tpl_vars['delivery']['title']; ?>
 <span class="headerdim"><?php echo $this->_tpl_vars['delivery']['publishdate']; ?>
 - <?php echo $this->_tpl_vars['delivery']['delivery_end']; ?>
</span>
			</h3>
			<div class="row-fluid">    
																			</div>
		</div>
		
		<div style="clear:both"></div>
		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	
		<div class="row-fluid topset2">		
			<table class="table table-striped table-bordered dTableR" id="ao_details">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Titre de l'article</th>
						<th>Token Theme</th>
						<th>Token Category</th>
						<th>Tokens</th>
						<th>R&eacute;dacteur Content</th>
						<th>Token Replacement</th>
						<th>Token code Replacement</th>						
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
					<?php $_from = $this->_tpl_vars['article']['texts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['text'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['text']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['texts']):
        $this->_foreach['text']['iteration']++;
?>
					<tr>
					<?php if (($this->_foreach['text']['iteration'] <= 1)): ?>
						<td rowspan=<?php echo $this->_foreach['text']['total']; ?>
><?php echo ($this->_foreach['text']['iteration']-1)+1; ?>
</td>
						<td rowspan=<?php echo $this->_foreach['text']['total']; ?>
><a class="editable editable-click"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></td>
						<td rowspan=<?php echo $this->_foreach['text']['total']; ?>
><?php echo $this->_tpl_vars['article']['token_theme']; ?>
</td>
						<td rowspan=<?php echo $this->_foreach['text']['total']; ?>
><?php echo $this->_tpl_vars['article']['token_category']; ?>
</td>
						<td rowspan=<?php echo $this->_foreach['text']['total']; ?>
><?php echo $this->_tpl_vars['article']['token_names']; ?>
</td>
					<?php endif; ?>
						<td>
							<?php echo $this->_tpl_vars['texts']['text']; ?>

						</td>
						<td>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['texts']['token_replacement'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>

						</td>
						<td>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['texts']['hidden_replacement'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>

						</td> 
					</tr> 
					<?php endforeach; endif; unset($_from); ?>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>	
							
				</tbody>
			</table>                        
	  </div>
	</div>
</div>
    <input type="hidden" id="hide_total" name="hide_total"  />







