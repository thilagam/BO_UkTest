<?php /* Smarty version 2.6.19, created on 2015-07-14 13:15:48
         compiled from gebo/proofread/comment-popup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/proofread/comment-popup.phtml', 36, false),array('modifier', 'date_format', 'gebo/proofread/comment-popup.phtml', 54, false),array('modifier', 'replace', 'gebo/proofread/comment-popup.phtml', 62, false),array('modifier', 'strip_tags', 'gebo/proofread/comment-popup.phtml', 62, false),array('modifier', 'escape', 'gebo/proofread/comment-popup.phtml', 62, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
    loadEditors(\'editor_comment\');
    ///////////write the comment in popup//////////////////
    function writeCorrectorComment(userid, partid, artid, stage)
    {
        // var $comment = $("#editor_comment").val();
        var $comment = tinyMCE.get(\'editor_comment\').getContent();
        var target_page = "/proofread/getwritecomments?userId="+userid+"&partId="+partid+"&stage="+stage+"&comment="+escape($comment);
        $.post(target_page, function(data){
            $("#ajaxdata").html(data);
            $("#loaddata").hide();
            // $("#editor_comment").data("wysihtml5").editor.clear();
            $(\'#editor_comment\').html(\'\');
        });
    }
    ///////////write the comment in popup//////////////////
    function writeBoUserComment(userOn, userBy, artId)
    {
        var $comment = tinyMCE.get(\'editor_comment\').getContent();
        var target_page = "/proofread/getwritecomments?commented_on_userid="+userOn+"&commented_by_userid="+userBy+"&comment="+escape($comment);
        $.post(target_page, function(data){  // alert(data);
            $("#ajaxdata").html(data);
            $("#loaddata").hide();
            // $("#editor_comment").data("wysihtml5").editor.clear();
            $(\'#editor_comment\').html(\'\');
        });
    }

</script>
'; ?>


<?php if ($this->_tpl_vars['writerName'] != 'NO' && $this->_tpl_vars['writerName'] != ''): ?>
<div class="alert alert-error pull-center">
    Commentaire pour <b><?php if ($this->_tpl_vars['writerName'][0]['first_name'] != '' || $this->_tpl_vars['writerName'][0]['last_name'] != ''): ?>
        <?php echo ((is_array($_tmp=$this->_tpl_vars['writerName'][0]['first_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['writerName'][0]['last_name'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
 <?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['writerName'][0]['email'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
<?php endif; ?></b>
</div>
<?php endif; ?>

	<textarea id="editor_comment" name="editor_comment" class="textarea"></textarea>
    <?php if ($this->_tpl_vars['bouserscomments'] == 'yes'): ?>
        <button type="button" id="sub_usercomment" name="sub_usercomment"  class="btn btn-danger" onClick="writeBoUserComment('<?php echo $this->_tpl_vars['commented_on_userid']; ?>
','<?php echo $this->_tpl_vars['commented_by_userid']; ?>
', '<?php echo $this->_tpl_vars['articleId']; ?>
');" >Add</button>
    <?php else: ?>
        <input type="button" id="sub_comment" name="sub_comment" value="Submit" class="btn btn-danger" onClick="writeCorrectorComment('<?php echo $this->_tpl_vars['userId']; ?>
','<?php echo $this->_tpl_vars['partId']; ?>
','<?php echo $this->_tpl_vars['articleId']; ?>
','<?php echo $this->_tpl_vars['stage']; ?>
');" ></input>
    <?php endif; ?>
    <div></div>
   	<div class="alert pull-center" ><h4>Previous Comment(s)</h4></div>

<div id="loaddata">
    <?php if ($this->_tpl_vars['comments'] != 'NO'): ?>
    <?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['comments_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['comments_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['comments_key'] => $this->_tpl_vars['comments_item']):
        $this->_foreach['comments_loop']['iteration']++;
?>
    <div class="alignleft"><?php if ($this->_tpl_vars['comments_item']['first_name'] != '' || $this->_tpl_vars['comments_item']['last_name'] != ''): ?>
        <?php echo $this->_tpl_vars['comments_item']['first_name']; ?>
 <?php echo $this->_tpl_vars['comments_item']['last_name']; ?>
 <?php else: ?><?php echo $this->_tpl_vars['comments_item']['email']; ?>
<?php endif; ?>
        <label class="label label-info">at <?php echo ((is_array($_tmp=$this->_tpl_vars['comments_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%I") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%I")); ?>
</label>
        <?php if ($this->_tpl_vars['bouserscomments'] != 'yes'): ?>
        at <strong><?php if ($this->_tpl_vars['comments_item']['stage'] == 's1'): ?> stage 1<?php else: ?> stage 2<?php endif; ?>:</strong>
        <?php endif; ?>
    </div><br>
    <table class="table table-bordered">
        <?php if ($this->_tpl_vars['bouserscomments'] != 'yes'): ?>
        <tr>
            <td class="alert alert-success"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['comments_item']['edited_content'])) ? $this->_run_mod_handler('replace', true, $_tmp, "<br />", "###") : smarty_modifier_replace($_tmp, "<br />", "###")))) ? $this->_run_mod_handler('strip_tags', true, $_tmp, true) : smarty_modifier_strip_tags($_tmp, true)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')))) ? $this->_run_mod_handler('replace', true, $_tmp, "###", "") : smarty_modifier_replace($_tmp, "###", "")); ?>
</td>
        </tr>
        <?php else: ?>
        <tr>
            <td class="alert alert-success"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['comments_item']['comments'])) ? $this->_run_mod_handler('replace', true, $_tmp, "<br />", "###") : smarty_modifier_replace($_tmp, "<br />", "###")))) ? $this->_run_mod_handler('strip_tags', true, $_tmp, true) : smarty_modifier_strip_tags($_tmp, true)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')))) ? $this->_run_mod_handler('replace', true, $_tmp, "###", "") : smarty_modifier_replace($_tmp, "###", "")); ?>
</td>
        </tr>
        <?php endif; ?>
    </table>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    Aucun Commentaire
    <?php endif; ?>
</div>
<div id="ajaxdata"></div>