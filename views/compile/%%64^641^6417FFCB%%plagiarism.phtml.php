<?php /* Smarty version 2.6.19, created on 2013-07-31 15:18:30
         compiled from gebo/proofread/plagiarism.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'gebo/proofread/plagiarism.phtml', 60, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function() {
    $("#refusemail").removeData(\'modal\');
    $(".pop_over").popover({trigger: \'hover\'});
});
function palgiarismCutoff()
{
    var artpro=$("#apid").val();
    var cutoff=$("#percent").val();
    var words=$("#words").val();

    var popBox=$("#light1");
    var overLay=$("#fade");
    var target_page = "/proofread/contentplagiarism?artprocessId="+artpro+"&cutoff="+cutoff+"&words="+words;

    $.post(target_page, function(data){
        popBox.html(data);
    });
}
</script>
'; ?>


<table id="grptabledetails" class="table btn-gebo">
	<tr>
		<td><b>Article :</b></td>
		<td><?php echo $this->_tpl_vars['ArtPro_detail'][0]['title']; ?>
</td>
		<td><b>Words Grouping :</b></td>
		<td><input type="text" name="words" id="words" size="4" value="<?php echo $this->_tpl_vars['words_value']; ?>
" /></td>
	</tr>
	<tr>
		<td><b>Document name :</b></td>
		<td><?php echo $this->_tpl_vars['ArtPro_detail'][0]['article_name']; ?>
</td>
		<td><b>Percent cut-off :</b></td>
		<td><input type="text" name="percent" id="percent" size="4" value="<?php echo $this->_tpl_vars['percent_value']; ?>
" /></td>
	</tr>
	<tr>
		<td><b>Writer :</b></td>
		<td><?php echo $this->_tpl_vars['ArtPro_detail'][0]['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['ArtPro_detail'][0]['last_name']; ?>
</td>
        <td></td>
        <td><button type="button" name="show" class="btn btn-info" onClick="return palgiarismCutoff();">Show</button></td>
	</tr>
</table>
<table class="table">
  <thead>
    <th>Document</th>
    <th>Article Title</th>
    <th>Writer</th>
    <th>Status</th>
    <th>Percent</th>
  </thead>
<?php $_from = $this->_tpl_vars['plag_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plag']):
?>
<tr>
    <td><?php echo $this->_tpl_vars['plag']['article_name']; ?>
</td>
    <td><?php echo $this->_tpl_vars['plag']['title']; ?>
</td>
    <td><?php echo $this->_tpl_vars['plag']['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['plag']['last_name']; ?>
</td>
    <td><?php echo $this->_tpl_vars['plag']['status']; ?>
</td>
    <td>
        <?php if ($this->_tpl_vars['plag']['percent'] > 0): ?>
            <a class="pop_over" data-placement="top" data-original-title="Plagiarism Details" data-content="<?php echo ((is_array($_tmp=$this->_tpl_vars['plag']['common_content'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"><?php echo $this->_tpl_vars['plag']['percent']; ?>
</a>
        <?php else: ?>
            <?php echo $this->_tpl_vars['plag']['percent']; ?>

        <?php endif; ?>
    </td>
</tr>
<tr><td colspan="5"><hr></td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<input type="hidden" name="apid" id="apid" value="<?php echo $this->_tpl_vars['apid']; ?>
" />