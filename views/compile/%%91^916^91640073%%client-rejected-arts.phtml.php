<?php /* Smarty version 2.6.19, created on 2015-03-24 12:40:40
         compiled from gebo/proofread/client-rejected-arts.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/proofread/client-rejected-arts.phtml', 58, false),array('modifier', 'wordwrap', 'gebo/proofread/client-rejected-arts.phtml', 58, false),array('modifier', 'date_format', 'gebo/proofread/client-rejected-arts.phtml', 63, false),)), $this); ?>
<?php echo '
<script language="javascript">
$(document).ready(function() {
    $(\'#clientrejectedartsgrid\').dataTable({
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
        ]
    });
});
//////locking system/////////////
function lockSystemClientRejectedArts(artid, mode, page, rownum)
{
    if(mode == \'lock\')
    {
        var target_page = "/proofread/locksystem?artId="+artid+"&mode=lock&stage="+page;
        $.post(target_page, function(data){  //alert(data);
                $(\'#lock\'+artid).html("<a href=\'/proofread/client-rejected-arts-correction?submenuId=ML3-SL5&articleId="+artid+"\'>" +
                    "<i class=\'splashy-application_windows_edit\'></i>" +
                    "</a>&nbsp;&nbsp;<a onclick=\\"lockSystemClientRejectedArts(\'"+artid+"\', \'unlock\', \'"+page+"\', \'"+rownum+"\');\\"><i class=\'splashy-lock_large_unlocked\'></i></a>");
        });
    }
    else{
        var target_page = "/proofread/locksystem?artId="+artid+"&mode=unlock&stage="+page;
        $.post(target_page, function(data){
            $(\'#lock\'+artid).html("<a onclick=\\"lockSystemClientRejectedArts(\'"+artid+"\',\'lock\', \'"+page+"\', \'"+rownum+"\');\\"><i class=\'splashy-lock_large_locked\'></i></a>");
        });
    }
}

</script>
'; ?>

<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">List of items rejected by the customer</h3>
        <table id="clientrejectedartsgrid" class="table table-bordered table-striped table_vam">
            <thead>
            <tr>
                <th>Article Id</th>
                <th>Ao Title</th>
                <th>Client</th>
                <th>Writer</th>
               <!-- <th>DATE DE FIN AO</th>-->
                <th>Date of dispatch</th>
                <th>Lock/Unlock</th>
            </tr>
            </thead>
            <tbody>
            <?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rejectedarts_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rejectedarts_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rejectedarts_key'] => $this->_tpl_vars['rejectedarts_item']):
        $this->_foreach['rejectedarts_loop']['iteration']++;
?>
            <tr>
                <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['rejectedarts_item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</td>
                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['rejectedarts_item']['deliveryTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</td>
                <td><?php echo $this->_tpl_vars['rejectedarts_item']['company_name']; ?>
</td>
                <td><?php if ($this->_tpl_vars['rejectedarts_item']['first_name'] != ''): ?><?php echo $this->_tpl_vars['rejectedarts_item']['first_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['rejectedarts_item']['email']; ?>
<?php endif; ?></td>
                <!--<div class="col-two">CAT&Eacute;GORIE</div>
                <td><div style="display:none;"><?php echo $this->_tpl_vars['rejectedarts_item']['delivery_date']; ?>
</div><?php echo ((is_array($_tmp=$this->_tpl_vars['rejectedarts_item']['delivery_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>-->
                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['rejectedarts_item']['article_sent_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
                <td><div id="lock<?php echo $this->_tpl_vars['rejectedarts_item']['artId']; ?>
">
                        <?php if ($this->_tpl_vars['rejectedarts_item']['lock_status'] == 'yes'): ?>
                        <?php if ($this->_tpl_vars['rejectedarts_item']['lockedUser'] == $this->_tpl_vars['userId']): ?>
                        <a href="/proofread/client-rejected-arts-correction?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleId=<?php echo $this->_tpl_vars['rejectedarts_item']['artId']; ?>
" ><i class="splashy-application_windows_edit"></i></a>&nbsp;&nbsp;
                        <a onclick="lockSystemClientRejectedArts('<?php echo $this->_tpl_vars['rejectedarts_item']['artId']; ?>
', 'unlock', 'clientrejectart', '<?php echo ($this->_foreach['rejectedarts_loop']['iteration']-1); ?>
');"><i class="splashy-lock_large_unlocked"></i></a>
                        <?php else: ?>
                        <div>Lock by <?php echo $this->_tpl_vars['rejectedarts_item']['locked_by'][0]['login']; ?>
</div>
                        <?php endif; ?>
                        <?php else: ?>
                        <a onclick="lockSystemClientRejectedArts('<?php echo $this->_tpl_vars['rejectedarts_item']['artId']; ?>
', 'lock', 'clientrejectart', '<?php echo ($this->_foreach['rejectedarts_loop']['iteration']-1); ?>
');"><i class="splashy-lock_large_locked"></i></a>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
            </tbody>
        </table>
    </div>
</div>
