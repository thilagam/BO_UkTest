<?php /* Smarty version 2.6.19, created on 2013-07-19 14:59:28
         compiled from gebo/proofread/stage1-articles.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'gebo/proofread/stage1-articles.phtml', 34, false),array('modifier', 'stripslashes', 'gebo/proofread/stage1-articles.phtml', 55, false),array('modifier', 'wordwrap', 'gebo/proofread/stage1-articles.phtml', 55, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
$(document).ready(function() {
	$(\'#s1artsgrid\').dataTable({
		"sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
		"sPaginationType": "bootstrap",
		"aaSorting": [[ 1, "asc" ]],
		"aoColumns": [

			{ "sType": "formatted-num" },
			{ "sType": "string" },
			{ "sType": "string" },
			{ "sType": "formatted-num" },
			{ "sType": "formatted-num" },
		]
	});
});

</script>
'; ?>

<form action="/proofread/validatestage1arts?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post" id="valstage1arts" name="valstage1arts" >

<div class="row-fluid">
  <div class="span12">
    <h3 class="heading">Stage 1 Articles<a data-toggle="modal"  href="#searchpopup" ></a></h3>
	 <table id="tabledetails" class="table" >
        <tr>
            <td><b>Delivery : </b><?php echo $this->_tpl_vars['delDetails'][0]['title']; ?>
</td>
            <td><b>Client : </b><?php echo $this->_tpl_vars['delDetails'][0]['company_name']; ?>
</td>
            <td><b>Category : </b><?php echo $this->_tpl_vars['delDetails'][0]['fav_category']; ?>
</td>
        </tr>
        <tr>
            <td><b>Total Articles : </b><?php echo $this->_tpl_vars['delDetails'][0]['noofarts']; ?>
</td>
            <td><b>Created At : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['delDetails'][0]['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
            <td><b>Created By : </b><?php echo $this->_tpl_vars['delDetails'][0]['created_user']; ?>
</td>
        </tr>
     </table>

        <table id="s1artsgrid" class="table table-bordered table-striped table_vam">
            <thead>
            <tr>
                <th>Sl.no</th>
                <th>Article Titre</th>
                <th>Contributeur</th>
                <th>Date d'envoi</th>
                <th>Lock / unlock</th>
            </tr>
            </thead>
            <tbody>
            <?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['s1arts_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['s1arts_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['s1arts_key'] => $this->_tpl_vars['s1arts_item']):
        $this->_foreach['s1arts_loop']['iteration']++;
?>
            <tr>
                <td><?php echo ($this->_foreach['s1arts_loop']['iteration']-1)+1; ?>
</td>
                <td><?php if ($this->_tpl_vars['s1arts_item']['lock_status'] == 'yes'): ?>
                       <?php if ($this->_tpl_vars['s1arts_item']['lockedUser'] == $this->_tpl_vars['userId']): ?>
                          <a href="/proofread/stage1-correction?submenuId=ML3-SL2&articleId=<?php echo $this->_tpl_vars['s1arts_item']['artId']; ?>
" id="stagelink<?php echo ($this->_foreach['s1arts_loop']['iteration']-1); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['s1arts_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</a>
                       <?php else: ?>
                          <a id="stagelink<?php echo ($this->_foreach['s1arts_loop']['iteration']-1); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['s1arts_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</a>
                       <?php endif; ?>
                    <?php else: ?>
                        <a id="stagelink<?php echo ($this->_foreach['s1arts_loop']['iteration']-1); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['s1arts_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</a>
                    <?php endif; ?>
                </td>
                <td><?php if ($this->_tpl_vars['s1arts_item']['first_name'] != ''): ?><?php echo $this->_tpl_vars['s1arts_item']['first_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['s1arts_item']['email']; ?>
<?php endif; ?></td>
                <td><?php if ($this->_tpl_vars['s1arts_item']['article_sent_at'] == 'NO'): ?>Not submited<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['s1arts_item']['article_sent_at'][0]['article_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
<?php endif; ?></td>
                <td><div id="lock<?php echo $this->_tpl_vars['s1arts_item']['artId']; ?>
">
					<?php if ($this->_tpl_vars['s1arts_item']['lock_status'] == 'yes'): ?>
						<?php if ($this->_tpl_vars['s1arts_item']['lockedUser'] == $this->_tpl_vars['userId']): ?>
						   <a href="/proofread/stage1-correction?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleId=<?php echo $this->_tpl_vars['s1arts_item']['artId']; ?>
" ><i class="splashy-application_windows_edit"></i></a>&nbsp;&nbsp;
						   <a onclick="stagesLinklockSystem('<?php echo $this->_tpl_vars['s1arts_item']['artId']; ?>
', 'unlock', 'stage1', '<?php echo ($this->_foreach['s1arts_loop']['iteration']-1); ?>
', '<?php echo $_GET['submenuId']; ?>
');"><i class="splashy-lock_large_unlocked"></i></a>
						<?php else: ?>
						   <div>Lock&eacute; par <?php echo $this->_tpl_vars['s1arts_item']['locked_by'][0]['login']; ?>
</div>
						<?php endif; ?>
					<?php else: ?>
						 <a onclick="stagesLinklockSystem('<?php echo $this->_tpl_vars['s1arts_item']['artId']; ?>
', 'lock', 'stage1', '<?php echo ($this->_foreach['s1arts_loop']['iteration']-1); ?>
', '<?php echo $_GET['submenuId']; ?>
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



