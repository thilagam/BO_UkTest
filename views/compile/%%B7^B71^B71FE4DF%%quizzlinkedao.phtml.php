<?php /* Smarty version 2.6.19, created on 2015-12-18 11:45:57
         compiled from gebo/quizz/quizzlinkedao.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quizz/quizzlinkedao.phtml', 1, false),array('modifier', 'utf8_encode', 'gebo/quizz/quizzlinkedao.phtml', 18, false),array('modifier', 'ucfirst', 'gebo/quizz/quizzlinkedao.phtml', 19, false),array('modifier', 'date_format', 'gebo/quizz/quizzlinkedao.phtml', 20, false),)), $this); ?>
<?php if (count($this->_tpl_vars['AOarray']) > 0): ?>

<h3>Linked AOs</h3>
<table class="table table-bordered table-striped table_vam">
	<thead>
		<tr>
			<th>SI</th>
			<th>Title</th>
			<th>Type</th>
			<th>Create at</th>
			<th>Participants</th>
		</tr>
	</thead>
	<tbody>
		<?php $_from = $this->_tpl_vars['AOarray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ao_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ao_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ao_item']):
        $this->_foreach['ao_loop']['iteration']++;
?>
			<tr class="success">
				<td><?php echo ($this->_foreach['ao_loop']['iteration']-1)+1; ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['ao_item']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['ao_item']['type'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['ao_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</td>
				<td>
					<?php if ($this->_tpl_vars['ao_item']['participants'] > 0): ?>
						<a href="/quizz/listparticipants?submenuId=ML2-SL22&id=<?php echo $this->_tpl_vars['ao_item']['quizz']; ?>
&ao=<?php echo $this->_tpl_vars['ao_item']['id']; ?>
" target="_blank"><?php echo $this->_tpl_vars['ao_item']['participants']; ?>
</a>
					<?php else: ?>
						<?php echo $this->_tpl_vars['ao_item']['participants']; ?>

					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>	
<?php endif; ?>


<?php if (count($this->_tpl_vars['RecruitArray']) > 0): ?>

<h3>Linked Recruitments</h3>
<table class="table table-bordered table-striped table_vam">
	<thead>
		<tr>
			<th>SI</th>
			<th>Title</th>
			<th>Type</th>
			<th>Create at</th>
			<th>Participants</th>
		</tr>
	</thead>
	<tbody>
		<?php $_from = $this->_tpl_vars['RecruitArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['recruit_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['recruit_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['recruit_item']):
        $this->_foreach['recruit_loop']['iteration']++;
?>
			<tr class="warning">
				<td><?php echo ($this->_foreach['recruit_loop']['iteration']-1)+1; ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_item']['title'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_item']['type'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['recruit_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</td>
				<td>
					<?php if ($this->_tpl_vars['recruit_item']['participants'] > 0): ?>
						<a href="/quizz/listparticipants?submenuId=ML2-SL22&id=<?php echo $this->_tpl_vars['recruit_item']['quizz']; ?>
&ao=<?php echo $this->_tpl_vars['recruit_item']['id']; ?>
" target="_blank"><?php echo $this->_tpl_vars['recruit_item']['participants']; ?>
</a>
					<?php else: ?>
						<?php echo $this->_tpl_vars['recruit_item']['participants']; ?>

					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>	
<?php endif; ?>