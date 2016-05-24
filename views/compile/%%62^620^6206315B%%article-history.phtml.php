<?php /* Smarty version 2.6.19, created on 2015-05-13 09:03:51
         compiled from gebo/proofread/article-history.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gebo/proofread/article-history.phtml', 26, false),array('modifier', 'date_format', 'gebo/proofread/article-history.phtml', 47, false),)), $this); ?>
<?php echo '
<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
$(document).ready(function() {
	$(\'#arthistorygrid\').dataTable({
		"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
		"sPaginationType": "bootstrap",
		"aaSorting": [[ 0, "asc" ]],
		"aoColumns": [
			{ "sType": "formatted-num" },
			{ "sType": "string" },
			{ "sType": "string" },
			{ "sType": "string" },
			{ "sType": "string" },
            { "sType": "string" },
            { "sType": "string" }
		]
	});

});

</script>
'; ?>

<form action="/proofread/validatestagearts?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post" id="valstagearts" name="valstagearts" >
<div class="row-fluid">
  <div class="span12">
    <h3 class="heading">History of <b><?php echo ((is_array($_tmp=$this->_tpl_vars['articledetails'][0]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</b><button type="button" class="btn btn-inverse pull-right"  id="return">return</button></h3>

        <table id="arthistorygrid" class="table table-bordered table-striped table_vam">
            <thead>
            <tr>
                <th>Sl.no</th>
                <th>Editor</th>
                <th>Stage</th>
                <th>Action</th>
                <th>Action at</th>
                <th>Reasons</th>
                <th>sentence</th>
            </tr>
            </thead>
            <tbody>
            <?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['arthistory_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['arthistory_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['arthistory_key'] => $this->_tpl_vars['arthistory_item']):
        $this->_foreach['arthistory_loop']['iteration']++;
?>
            <tr>
                <td><?php echo ($this->_foreach['arthistory_loop']['iteration']-1)+1; ?>
</td>
                <td><?php echo $this->_tpl_vars['arthistory_item']['first_name']; ?>
</td>
                <td><?php echo $this->_tpl_vars['arthistory_item']['stage']; ?>
</td>
                <td><?php if ($this->_tpl_vars['arthistory_item']['action'] == ''): ?>-<?php else: ?><?php echo $this->_tpl_vars['arthistory_item']['action']; ?>
<?php endif; ?></td>
                <td><?php if ($this->_tpl_vars['arthistory_item']['action_at'] == ''): ?>-<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['arthistory_item']['action_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
<?php endif; ?></td>
                <td><!--<?php echo $this->_tpl_vars['arthistory_item']['reasons']; ?>
-->---</td>
                <td><!--<?php echo $this->_tpl_vars['arthistory_item']['action_sentence']; ?>
-->---</td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
            </tbody>
        </table>
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



