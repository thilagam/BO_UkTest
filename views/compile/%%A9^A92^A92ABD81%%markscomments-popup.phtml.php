<?php /* Smarty version 2.6.19, created on 2015-03-24 12:41:44
         compiled from gebo/proofread/markscomments-popup.phtml */ ?>
<?php echo '
<script type="text/javascript" >
    $(document).ready(function() {
        loadEditors(\'marks_comments\');
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
        $("#marks").chosen({ allow_single_deselect: false,search_contains: true  });
    });

    ///////////write the comment in popup//////////////////
    function saveMarksComments(artid, partid)
    {
        // var $comment = $("#editor_comment").val();
        var $comment = $("#marks_comments").val();
        var $marks  = $("#marks").val();
        if($marks == 0)
        {
            alert("select marks");
            return false;
        }
        else
        {
            var target_page = "/proofread/markscomments?save_marks_comments=yes&artId="+artid+"&partId="+partid+"&marks="+$marks+"&comments="+escape($comment);
            $.post(target_page, function(data){ //alert(data);
                   window.location.reload();
            });
        }
    }


</script>
'; ?>

<div class="row-fluid">
    <div class="span12" >
        <div class="formSep">
            <div class="row-fluid">
                <div class="span8 form-inline">
                    <label class="span4">Marks <span class="f_req">*</span></label>
                    <select name="marks" id="marks" class="span4">
                        <option value="0">select marks</option>
                        <?php unset($this->_sections['val']);
$this->_sections['val']['name'] = 'val';
$this->_sections['val']['start'] = (int)1;
$this->_sections['val']['loop'] = is_array($_loop=11) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['val']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['val']['show'] = true;
$this->_sections['val']['max'] = $this->_sections['val']['loop'];
if ($this->_sections['val']['start'] < 0)
    $this->_sections['val']['start'] = max($this->_sections['val']['step'] > 0 ? 0 : -1, $this->_sections['val']['loop'] + $this->_sections['val']['start']);
else
    $this->_sections['val']['start'] = min($this->_sections['val']['start'], $this->_sections['val']['step'] > 0 ? $this->_sections['val']['loop'] : $this->_sections['val']['loop']-1);
if ($this->_sections['val']['show']) {
    $this->_sections['val']['total'] = min(ceil(($this->_sections['val']['step'] > 0 ? $this->_sections['val']['loop'] - $this->_sections['val']['start'] : $this->_sections['val']['start']+1)/abs($this->_sections['val']['step'])), $this->_sections['val']['max']);
    if ($this->_sections['val']['total'] == 0)
        $this->_sections['val']['show'] = false;
} else
    $this->_sections['val']['total'] = 0;
if ($this->_sections['val']['show']):

            for ($this->_sections['val']['index'] = $this->_sections['val']['start'], $this->_sections['val']['iteration'] = 1;
                 $this->_sections['val']['iteration'] <= $this->_sections['val']['total'];
                 $this->_sections['val']['index'] += $this->_sections['val']['step'], $this->_sections['val']['iteration']++):
$this->_sections['val']['rownum'] = $this->_sections['val']['iteration'];
$this->_sections['val']['index_prev'] = $this->_sections['val']['index'] - $this->_sections['val']['step'];
$this->_sections['val']['index_next'] = $this->_sections['val']['index'] + $this->_sections['val']['step'];
$this->_sections['val']['first']      = ($this->_sections['val']['iteration'] == 1);
$this->_sections['val']['last']       = ($this->_sections['val']['iteration'] == $this->_sections['val']['total']);
?>

                        <option value="<?php echo $this->_sections['val']['index']; ?>
"><?php echo $this->_sections['val']['index']; ?>
</option>
                        <?php endfor; endif; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="formSep">
            <div class="row-fluid">
                <div class="span10 form-inline">
                    <label class="span3">Comments <span class="f_req">*</span></label>
                    <textarea cols="20" rows="4" id="marks_comments" name="marks_comments" class="span8"></textarea>
                </div>
            </div>
        </div>
        <div class="formSep">
            <div class="row-fluid">
                <div class="span10 form-inline">
                    <button type="button" class="btn btn-success" onclick="saveMarksComments('<?php echo $this->_tpl_vars['articleId']; ?>
','<?php echo $this->_tpl_vars['partId']; ?>
');" >valider</button>
                </div>
            </div>
        </div>
    </div>
</div>
