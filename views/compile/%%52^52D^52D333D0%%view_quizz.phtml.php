<?php /* Smarty version 2.6.19, created on 2015-03-24 13:59:52
         compiled from gebo/quizz/view_quizz.phtml */ ?>
<?php echo '
<style>
    tr#qnSep{border-bottom:2px solid #ccc;}
    h3.qn{display:inline;float:left;padding:10px 0 0;}
    table td.c{color:green;font-size:15px;font-weight:bold;padding-left:25px;}
    table td.w{color:red;font-size:15px;font-weight:bold;padding-left:25px;}
</style>
    <script>

    </script>
'; ?>


  <div class="row-fluid">
	<div class="span12">
    	<h3 class="heading">Titre du Quizz : <?php echo $this->_tpl_vars['quizz_title']; ?>
</h3>
		<table align="left" cellpadding="4" cellspacing="4" width="100%">
		    <?php $this->assign('qn_count', '1'); ?>
		    <?php $_from = $this->_tpl_vars['qns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['val']):
?>
		         <?php $this->assign('an_count', '1'); ?> 
                 <tr><td><h3 class="qn"><?php echo $this->_tpl_vars['qn_count']; ?>
. <?php echo $this->_tpl_vars['val']; ?>
</h3</td></tr>
                <?php $_from = $this->_tpl_vars['ans'][$this->_tpl_vars['id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id1'] => $this->_tpl_vars['val1']):
?>
                    <tr><td class="<?php if ($this->_tpl_vars['val1']['ans_id'] == $this->_tpl_vars['val1']['r_ans_id']): ?>c<?php else: ?>w<?php endif; ?>"><?php echo $this->_tpl_vars['nums'][$this->_tpl_vars['an_count']]; ?>
. <?php echo $this->_tpl_vars['val1']['option']; ?>
</td></tr>
                    <?php $this->assign('an_count', $this->_tpl_vars['an_count']+1); ?> 
                <?php endforeach; endif; unset($_from); ?>
                <tr id="qnSep"><td></td></tr>
                <?php $this->assign('qn_count', $this->_tpl_vars['qn_count']+1); ?>
            <?php endforeach; endif; unset($_from); ?>
			
		</table>
		<div align="right" style="padding-right:150px;padding-top:50px">
		    
		</div>
	</div>
</div>