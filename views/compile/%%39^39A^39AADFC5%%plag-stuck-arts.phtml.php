<?php /* Smarty version 2.6.19, created on 2015-04-14 16:27:23
         compiled from gebo/proofread/plag-stuck-arts.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/proofread/plag-stuck-arts.phtml', 45, false),array('modifier', 'wordwrap', 'gebo/proofread/plag-stuck-arts.phtml', 45, false),array('modifier', 'date_format', 'gebo/proofread/plag-stuck-arts.phtml', 49, false),)), $this); ?>
<?php echo '
<script language="javascript">
$(document).ready(function() {
    $(\'#plagstuckartsgrid\').dataTable({
        "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
        "sPaginationType": "bootstrap",
        "aaSorting": [[ 0, "asc" ]],
        "aoColumns": [
            { "sType": "formatted-num" },
            { "sType": "string" },
            { "sType": "string" },
            { "sType": "natural" },
            { "sType": "natural" },
            { "sType": "natural" },
            { "sType": "natural" },
            { "sType": "natural" },
            { "sType": "natural" }
        ]
    });
});

</script>
'; ?>

<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">List of stuck up aritcle versions in plagiarism</h3>
        <table id="plagstuckartsgrid" class="table table-bordered table-striped table_vam">
            <thead>
            <tr>
                <th>Titre Article</th>
                <th>Version</th>
                <th>article path</th>
                <th>Contributeur</th>
                <th>DATE</th>
                <th>download</th>
                <th>PHP</th>
                <th>Ruby</th>
                <th>Comments</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($this->_tpl_vars['stuckartversions'] != 'NO'): ?>
            <?php $_from = $this->_tpl_vars['stuckartversions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['stuckarts_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['stuckarts_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['stuckarts_key'] => $this->_tpl_vars['stuckarts_item']):
        $this->_foreach['stuckarts_loop']['iteration']++;
?>
            <tr>
                <td><a href="/proofread/stage-articles?submenuId=ML3-SL11&aoId=<?php echo $this->_tpl_vars['stuckarts_item']['aoid']; ?>
" ><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['stuckarts_item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</a></td>
                <td><?php echo $this->_tpl_vars['stuckarts_item']['version']; ?>
</td>
                <td><?php echo $this->_tpl_vars['stuckarts_item']['article_path']; ?>
</td>
                <td><?php if ($this->_tpl_vars['stuckarts_item']['first_name'] != ''): ?><?php echo $this->_tpl_vars['stuckarts_item']['first_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['stuckarts_item']['email']; ?>
<?php endif; ?></td>
                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['stuckarts_item']['article_sent_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
                <td><a class="label label-warning" data-hint="download article"  href="/proofread/downloadfile?submenuId=ML3-SL11&path=<?php echo $this->_tpl_vars['stuckarts_item']['id']; ?>
" ><i class="splashy-download"></i></a></td>
                <td><?php echo $this->_tpl_vars['stuckarts_item']['php']; ?>
</td>
                <td><?php echo $this->_tpl_vars['stuckarts_item']['ruby']; ?>
</td>
                <td><a class="btn hint--bottom hint--info" data-hint="Commenter"  data-target="#comments" data-toggle="modal"  name="send_comment"  href="/proofread/plagstuckcomments?userId=<?php echo $this->_tpl_vars['loginuserId']; ?>
&artprocid=<?php echo $this->_tpl_vars['stuckarts_item']['id']; ?>
" ><i class="splashy-comments_reply"></i></a></td>

            </tr>
            <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<!--///BO user send comments to for the participant ///-->
<div class="modal4 hide fade" id="comments">
    <div class="modal-header">
        <button class="close" onclick="closePopup('comments');">&times;</button>
        <h3>Ajouter Un Commentaires</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">

    </div>
</div>
