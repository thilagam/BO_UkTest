<?php /* Smarty version 2.6.19, created on 2016-02-12 09:40:07
         compiled from gebo/proofread/stage-articles.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/proofread/stage-articles.phtml', 212, false),array('modifier', 'stripslashes', 'gebo/proofread/stage-articles.phtml', 247, false),array('modifier', 'wordwrap', 'gebo/proofread/stage-articles.phtml', 247, false),)), $this); ?>
 <?php if ($this->_tpl_vars['submenuId'] == 'ML3-SL2'): ?>
    <?php $this->assign('currentstage', '1'); ?>
 <?php elseif ($this->_tpl_vars['submenuId'] == 'ML3-SL3'): ?>
    <?php $this->assign('currentstage', '2'); ?>
 <?php else: ?><?php $this->assign('currentstage', '0'); ?><?php endif; ?>
<?php echo '
 <script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        //$(".uni_style").uniform();
        $(\'#marks_comments\').tinymce({
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
            height                              : 200,
            content_css                         : "/BO/theme/gebo/css/tinymce_styles.css?" + new Date().getTime(),
            theme_advanced_font_sizes           : "8px,10px,12px,13px,14px,16px,18px,20px",
            font_size_style_values              : "8px,10px,12px,13px,14px,16px,18px,20px",
            init_instance_callback				: function(){

                function resizeWidth() {
                    document.getElementById(tinyMCE.activeEditor.id+\'_tbl\').style.width=\'98%\';
                }
                resizeWidth();
                $(window).resize(function() {
                    resizeWidth();
                })
            }
        });
        $(\'#stageartsgrid\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "aaSorting": [[ 3, "desc" ]],
            "aoColumns": [

                { "bSortable": false },
                { "sType": "formatted-num" },
                { "sType": "string" },
                { "sType": "string" },
                '; ?>
<?php if ($this->_tpl_vars['currentstage'] == 2): ?><?php echo '
                    { "sType": "formatted-num" },
                '; ?>
<?php endif; ?><?php echo '
                { "sType": "formatted-num" },
                '; ?>
<?php if ($this->_tpl_vars['currentstage'] == 2 || $this->_tpl_vars['currentstage'] == 1): ?><?php echo '
                    { "sType": "string" },
                '; ?>
<?php endif; ?><?php echo '
                { "sType": "formatted-num" }
        ]
    });

    //* select all rows    
    $(\'#select_rows\').click(function () {
        var tableid = $(this).data(\'stageartsgrid\');
        $(\'#stageartsgrid\').find(\'input[name=artval]\').attr(\'checked\', this.checked);
    });

});
'; ?>

<?php if (( $this->_tpl_vars['submenuId'] == 'ML3-SL2' && ( $this->_tpl_vars['type'] == 'superadmin' || $this->_tpl_vars['type'] == 'multilingue' ) ) || ( $this->_tpl_vars['submenuId'] == 'ML3-SL3' )): ?>
<?php echo '
    /////////validate atleast one articles is been selected/////////
    function validatearticles()
    {
       var $b = $(\'input[name=artval]\');
       var countselected = $b.filter(\':checked\').length;
        var $c = $(\'input[name=marks]\');
        var markscountselected = $c.filter(\':checked\').length;
        if(countselected == markscountselected && countselected != 0 && markscountselected != 0)
        {
            smoke.confirm("Tu n\\\'as pas donn\\351 de notes \\u00e0 ce contributeur pourtant il le m\\351rite, non ? Allez \\347a prend 2 secondes et ensuite tu auras un suivi au top et tu pourras dire \\u00e0 ta m\\u00e8re : regarde maman ce suivi comment il est top !",function(e){
                if (e)
                {
                    var count = 1;
                }
                else
                {
                    return false;
                }
            },{"ok":"M\'en fiche de ton truc mais c\'est bien pens\\351 quand m\\352me","cancel":"Ah bah dans ce cas, je veux bien le noter !Merci de m\'avoir ouvert les yeux"});
        }
       if(countselected >= 1)
       {
           var selected = \'\';
		   $(\'input[name=artval]:checked\').each(function() {
				if(selected)
					selected =   selected + \'|\' + ($(this).val());
				else
					selected =   $(this).val();
		   });
           var c = smoke.confirm(\'&#202;tes-vous s&#251;r(e) de vouloir valider ces articles ?\', function(e){

               if (e){
                   $("#validatearticles_btn").prop(\'disabled\', true);
                   /*var target_page = "/proofread/bulkvalidatestage?aoid;
                   $.post(target_page, function(data){ //alert(data);
                       window.location.reload();
                   });
                   if()*/
                    var url = "http://admin-test.edit-place.co.uk/proofread/bulkvalidatestage'; ?>
<?php echo $this->_tpl_vars['currentstage']; ?>
<?php echo 'arts?validate_art="+selected;
                    window.location=url;
               }
               else{
                    return false;
               }
           },
           {});
       }
       else
       {
           smoke.alert("S\\u00e9lectionner au moins un.");
           return false;
       }
        $(\'[id^=confirm-ok]\').removeClass("btn-primary");
        $(\'[id^=confirm-cancel]\').addClass("btn-primary");
    }
 function selectMarksCheckbox(rownum)
    {
        $(\'#marks\'+rownum).attr(\'checked\', \'checked\');
    }
	
	function deliveredarticles()
	{
		var $b = $(\'input[name=artval]\');
        var countselected = $b.filter(\':checked\').length;
       
      
	   if(countselected >= 1)
        {
            var selected = \'\';
            $(\'input[name=artval]:checked\').each(function() {
                if(selected)
                    selected =   selected + \'|\' + ($(this).val());
                else
                    selected =   $(this).val();
            });
			
			   var c = smoke.confirm(\'I confirm as PM  that I have controled this delivery\', function(e){
                    if (e){
                        var target_page = "/proofread/deliveryupdate?validate_art="+selected+"&stage='; ?>
<?php echo $this->_tpl_vars['currentstage']; ?>
<?php echo '";
                         $.post(target_page, function(data){
                            var response = $.parseJSON(data);
                            console.log(response.status);
                            console.log(response.bulkvalidatestage);

                            if( response.bulkvalidatestage === \'yes\'){
                                var c = smoke.confirm(\'&#202;tes-vous s&#251;r(e) de vouloir valider ces articles ?\', function(e){
                                    if (e) {
                                        var selected = \'\';
                                        $(\'input[name=artval]:checked\').each(function () {
                                            if (selected)
                                                selected = selected + \'|\' + ($(this).val());
                                            else
                                                selected = $(this).val();
                                        });
                                        var url = "/proofread/bulkvalidatestage'; ?>
<?php echo $this->_tpl_vars['currentstage']; ?>
<?php echo 'arts?validate_art=" + selected;
                                        window.location = url;
                                    }
                                },
                                {});
                            }
                            else if(response.status === \'success\'){
                                window.location.reload();
                            }
                            else{
                                 smoke.alert(\'Already Delivered,cannot be updated\');
                             }

                         });
					}
                    else{
                        return false;
                    }
                });
            $("#delivered_btn").attr(\'disabled\',true);
            $("#delivered_btn").removeClass("btn-primary");
            $("#delivered_btn").addClass("btn-basic");
        }
        else
        {
            smoke.alert("S\\u00e9lectionner au moins un.");
            return false;
        }
    }
    '; ?>

    <?php endif; ?>
        <?php echo '
</script>
'; ?>

<form action="/proofread/validatestagearts?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post" id="valstagearts" name="valstagearts" >
<div class="row-fluid">
  <div class="span12">
    <h3 class="heading">Stage <?php echo $this->_tpl_vars['currentstage']; ?>
 Articles<a class="label label-inverse pull-right"  id="return">Return</a></h3>
	 <table id="tabledetails" class="table btn-gebo tdleftalign" >
        <tr>
            <td><b>AO Name : </b><?php echo $this->_tpl_vars['delDetails'][0]['aoName']; ?>
</td>
            <td><b>Client : </b><?php echo $this->_tpl_vars['delDetails'][0]['company_name']; ?>
</td>
            <td><b>Category : </b><?php echo $this->_tpl_vars['delDetails'][0]['del_category']; ?>
</td>
        </tr>
        <tr>
            <td><b>Total Articles : </b><?php echo $this->_tpl_vars['delDetails'][0]['total_article']; ?>
</td>
            <td><b>Create at : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['delDetails'][0]['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
            <td><b>Create by : </b><?php echo $this->_tpl_vars['delDetails'][0]['created_user']; ?>
</td>
        </tr>
     </table>

        <table id="stageartsgrid" class="table table-bordered table-striped table_vam">
            <thead>
            <tr><?php if (( $this->_tpl_vars['submenuId'] == 'ML3-SL2' && ( $this->_tpl_vars['type'] == 'superadmin' || $this->_tpl_vars['type'] == 'multilingue' ) ) || ( $this->_tpl_vars['submenuId'] == 'ML3-SL3' )): ?>
                <th class="table_checkbox"><input type="checkbox" name="select_rows" id="select_rows" class="uni_style" data-tableid="stageartsgrid"/></th><?php endif; ?>
                <th>Sl.no</th>
                <th>Article Title</th>
                <th>Writer</th>
                <th>Date of dispatch</th>
                <?php if ($this->_tpl_vars['currentstage'] == 2): ?>
                <th>Marks</th>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['currentstage'] == 2 || $this->_tpl_vars['currentstage'] == 1): ?>
                        <th>Delivered</th>
                <?php endif; ?>
                <th>Lock / unlock</th>
                <?php if ($this->_tpl_vars['currentstage'] == 0): ?>
                    <th>Details</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>

            <?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['stagearts_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['stagearts_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['stagearts_key'] => $this->_tpl_vars['stagearts_item']):
        $this->_foreach['stagearts_loop']['iteration']++;
?>
           <tr><?php if (( $this->_tpl_vars['submenuId'] == 'ML3-SL2' && ( $this->_tpl_vars['type'] == 'superadmin' || $this->_tpl_vars['type'] == 'multilingue' ) ) || ( $this->_tpl_vars['submenuId'] == 'ML3-SL3' )): ?>
                <td>
                     <input type="checkbox" name="artval" id="artval<?php echo ($this->_foreach['stagearts_loop']['iteration']-1)+1; ?>
" value="<?php echo $this->_tpl_vars['stagearts_item']['artId']; ?>
_<?php echo $this->_tpl_vars['stagearts_item']['partId']; ?>
" onclick="selectMarksCheckbox('<?php echo ($this->_foreach['stagearts_loop']['iteration']-1)+1; ?>
');">
                </td><?php endif; ?>
                <td><?php echo ($this->_foreach['stagearts_loop']['iteration']-1)+1; ?>

                </td>
                <td>
                    <a href="/proofread/article-history?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleId=<?php echo $this->_tpl_vars['stagearts_item']['artId']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['stagearts_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</a>
                </td>
                <td><a class="pop_over" data-placement="right" data-original-title="DETAILS REDACTEUR" data-html="true"
                       data-content="<table class='table table-bordered tdleftalign'>
                        <tr><td><b>Email</b></td><td><?php echo $this->_tpl_vars['stagearts_item']['email']; ?>
</td></tr>
                        <tr><td><b>Profil</b></td><td><?php echo $this->_tpl_vars['stagearts_item']['profile_type']; ?>
</td></tr>
                        <tr><td><b>Success Rate</b></td><td><?php echo $this->_tpl_vars['stagearts_item']['successrate']; ?>
</td></tr></table>" href="#">
                            <?php if ($this->_tpl_vars['stagearts_item']['first_name'] != ''): ?><?php echo $this->_tpl_vars['stagearts_item']['first_name']; ?>
 <?php echo $this->_tpl_vars['stagearts_item']['last_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['stagearts_item']['email']; ?>
<?php endif; ?></a></td>
                    <td><?php if ($this->_tpl_vars['stagearts_item']['article_date'][0]['article_date'] == 'NO'): ?>Not submited<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['stagearts_item']['article_date'][0]['article_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
<?php endif; ?></td>
                    <?php if ($this->_tpl_vars['currentstage'] == 2): ?>
                    <td><b><?php if ($this->_tpl_vars['stagearts_item']['marks'] != ''): ?><?php echo $this->_tpl_vars['stagearts_item']['marks']; ?>
 <?php else: ?> 0 <?php endif; ?> / 10</b></td>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['currentstage'] == 2 || $this->_tpl_vars['currentstage'] == 1): ?>
                    <td><?php if ($this->_tpl_vars['stagearts_item']['delivered'] == 'yes'): ?>yes<?php else: ?>no<?php endif; ?></td>
                    <?php endif; ?>
                    <td><div id="lock<?php echo $this->_tpl_vars['stagearts_item']['artId']; ?>
">
                            <?php if ($this->_tpl_vars['stagearts_item']['lock_status'] == 'yes'): ?>
                                <?php if ($this->_tpl_vars['stagearts_item']['lockedUser'] == $this->_tpl_vars['userId']): ?>
                                    <?php if ($this->_tpl_vars['checkstencils'] == 'yes' && $this->_tpl_vars['currentstage'] == '2' && $this->_tpl_vars['stagearts_item']['product'] == 'redaction'): ?>
                                        <a href="/proofread/stage<?php echo $this->_tpl_vars['currentstage']; ?>
-ebookers-correction?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleId=<?php echo $this->_tpl_vars['stagearts_item']['artId']; ?>
&participateId=<?php echo $this->_tpl_vars['stagearts_item']['partId']; ?>
" ><i class="splashy-application_windows_edit"></i></a>&nbsp;&nbsp;
                                    <?php elseif ($this->_tpl_vars['checkstencils'] == 'yes' && $this->_tpl_vars['currentstage'] == '2' && $this->_tpl_vars['stagearts_item']['product'] == 'translation'): ?>
                                        <a href="/proofread/stage<?php echo $this->_tpl_vars['currentstage']; ?>
-ebookers-translation-correction?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleId=<?php echo $this->_tpl_vars['stagearts_item']['artId']; ?>
&participateId=<?php echo $this->_tpl_vars['stagearts_item']['partId']; ?>
" ><i class="splashy-application_windows_edit"></i></a>&nbsp;&nbsp;
                                    <?php else: ?>
                                        <a href="/proofread/stage<?php echo $this->_tpl_vars['currentstage']; ?>
-correction?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleId=<?php echo $this->_tpl_vars['stagearts_item']['artId']; ?>
&participateId=<?php echo $this->_tpl_vars['stagearts_item']['partId']; ?>
" ><i class="splashy-application_windows_edit"></i></a>&nbsp;&nbsp;
                                    <?php endif; ?>
                                    <a onclick="stagesLinklockSystem('<?php echo $this->_tpl_vars['stagearts_item']['artId']; ?>
','<?php echo $this->_tpl_vars['stagearts_item']['partId']; ?>
', 'unlock', 'stage<?php echo $this->_tpl_vars['currentstage']; ?>
', '<?php echo ($this->_foreach['stagearts_loop']['iteration']-1); ?>
', '<?php echo $_GET['submenuId']; ?>
', '<?php echo $this->_tpl_vars['checkstencils']; ?>
','<?php echo $this->_tpl_vars['stagearts_item']['product']; ?>
');"><i class="splashy-lock_large_unlocked"></i></a>
                                <?php else: ?>
                                    <div>Lock&eacute; par <?php echo $this->_tpl_vars['stagearts_item']['locked_by'][0]['login']; ?>
</div>
                                <?php endif; ?>
                            <?php else: ?>
                                <a onclick="stagesLinklockSystem('<?php echo $this->_tpl_vars['stagearts_item']['artId']; ?>
', '<?php echo $this->_tpl_vars['stagearts_item']['partId']; ?>
', 'lock', 'stage<?php echo $this->_tpl_vars['currentstage']; ?>
', '<?php echo ($this->_foreach['stagearts_loop']['iteration']-1); ?>
', '<?php echo $_GET['submenuId']; ?>
', '<?php echo $this->_tpl_vars['checkstencils']; ?>
','<?php echo $this->_tpl_vars['stagearts_item']['product']; ?>
');"><i class="splashy-lock_large_locked"></i></a>
                            <?php endif; ?>
                        </div>
                    </td>
                    <?php if ($this->_tpl_vars['currentstage'] == 0): ?>
                    <td>
                        <a class="pop_over" data-placement="right" data-original-title="Article stats" data-html="true" data-content="<?php echo $this->_tpl_vars['stagearts_item']['details']; ?>
"><i class="splashy-marker_rounded_grey_5"></i></a>
                        <?php if ($this->_tpl_vars['stagearts_item']['plag_percent'][0]['plag_percent'] >= 20 || $this->_tpl_vars['stagearts_item']['plag_percent'][0]['plag_percent'] == 'NA'): ?>
                        <span style="color: #550000;font-weight: bold;"> Plagarised (<?php echo $this->_tpl_vars['stagearts_item']['plag_percent'][0]['plag_percent']; ?>
%)  </span>  <?php endif; ?>
                        <?php if ($this->_tpl_vars['stagearts_item']['plag_percent'][0]['plag_percent'] < 20 && $this->_tpl_vars['stagearts_item']['plag_percent'][0]['plag_percent'] != NULL && $this->_tpl_vars['stagearts_item']['plag_percent'][0]['plag_percent'] != 'NA'): ?>
                        <span style="color: #008200;font-weight: bold;">Not Plagarised (<?php echo $this->_tpl_vars['stagearts_item']['plag_percent'][0]['plag_percent']; ?>
%) </span>  <?php endif; ?>
                        <?php if ($this->_tpl_vars['stagearts_item']['plag_percent'][0]['plag_percent'] == NULL): ?>
                        <span style="color: #0033CC;font-weight: bold;">Not Processed </span>
                        <?php endif; ?>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
            <?php if (( $this->_tpl_vars['submenuId'] == 'ML3-SL2' && ( $this->_tpl_vars['type'] == 'superadmin' || $this->_tpl_vars['type'] == 'multilingue' ) ) || ( $this->_tpl_vars['submenuId'] == 'ML3-SL3' )): ?>
            <div class="span6">
                <button type="button" name="s1art_approve" class="btn btn-success"  onclick="return validatearticles();" id="validatearticles_btn">Valider</button>&nbsp;
				<?php if ($this->_tpl_vars['delivery_flag'] == 'no'): ?><button type="button" name="s1art_delivery" class="btn btn-primary" id="delivered_btn"  onclick="return deliveredarticles();">Delivered</button><?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <input type="hidden" id="hide_total" name="hide_total"  />
</form>
<!--///for the article profiles popup///-->
<div class="modal4 hide fade" id="artprofile">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h3>Article Profiles</h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>

 <!--///BO user send comments to for the participant ///-->
 <div class="modal hide fade" id="comments">
     <div class="modal-header">
         <button class="close" onclick="closePopup('comments');">&times;</button>
         <h3>Ajouter Un Commentaire</h3>
     </div>
     <div class="modal-body">
     </div>
     <div class="modal-footer">

     </div>
 </div>
