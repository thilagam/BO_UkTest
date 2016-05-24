<?php /* Smarty version 2.6.19, created on 2015-12-10 14:21:23
         compiled from common/header.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'common/header.phtml', 34, false),array('modifier', 'explode', 'common/header.phtml', 42, false),array('modifier', 'escape', 'common/header.phtml', 45, false),)), $this); ?>
<!-- header -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand" href="/index"><i class="icon-home icon-white"></i> edit-place</a>
				<ul class="nav user_menu pull-right">
					<?php if ($this->_tpl_vars['unreadcount'] > 0): ?>
					<li class="hidden-phone hidden-tablet">
						<div class="nb_boxes clearfix">
						<!--<a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>-->
						<a href="/mastermails/inbox-ep?submenuId=ML6-SL2" class="label ttip_b" style="background:#C62626" title="New messages"><?php echo $this->_tpl_vars['unreadcount']; ?>
 <i class="splashy-mail_light"></i></a>
						</div>
					</li>
					<?php endif; ?>
                    <li class="divider-vertical hidden-phone hidden-tablet"></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle nav_condensed" data-toggle="dropdown"><i class="flag-gb"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu">                            
							<li><a href="http://admin-test.edit-place.com" target="_blank"><i class="flag-fr"></i> Fran&ccedil;ais</a></li>
                        </ul>
                    </li>					
					<li class="divider-vertical hidden-phone hidden-tablet"></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="/BO/theme/gebo/img/user_avatar.png" alt="" class="user_avatar" /> <?php echo $this->_tpl_vars['loginName']; ?>
 <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/index/logout">Log Out</a></li>						
						</ul>
					</li>
				</ul>
				 <ul class="nav" id="mobile-nav">
					<?php $_from = $this->_tpl_vars['MainMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MainMenu_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MainMenu_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['MainMenukey'] => $this->_tpl_vars['i']):
        $this->_foreach['MainMenu_loop']['iteration']++;
?>
					<?php if ($this->_tpl_vars['MainMenukey'] != 'ML1' && $this->_tpl_vars['MainMenukey'] != 'ML7'): ?><!--///to hide dash board from list//-->
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="/index/test?menuId=<?php echo $this->_tpl_vars['MainMenukey']; ?>
"> <?php echo ((is_array($_tmp=$this->_tpl_vars['i'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
 <b class="caret"></b></a>
						  <ul class="dropdown-menu">
							<?php $_from = $this->_tpl_vars['SubMenus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['count'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['count']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['submenukey'] => $this->_tpl_vars['i']):
        $this->_foreach['count']['iteration']++;
?>

							<?php $_from = $this->_tpl_vars['i']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ids'] => $this->_tpl_vars['ii']):
?>

							<?php if ($this->_tpl_vars['EP_BO_MenuUrls'][$this->_tpl_vars['ids']] != null): ?>

                            <?php $this->assign('mainmenuid', ((is_array($_tmp=$this->_tpl_vars['ids'])) ? $this->_run_mod_handler('explode', true, $_tmp, "-") : smarty_modifier_explode($_tmp, "-"))); ?>
                            <?php if ($this->_tpl_vars['mainmenuid'][0] == $this->_tpl_vars['MainMenukey']): ?>

								<li><a href="/<?php echo $this->_tpl_vars['EP_BO_MenuUrls'][$this->_tpl_vars['ids']]; ?>
?submenuId=<?php echo $this->_tpl_vars['ids']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['ii'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</a></li>

							<?php endif; ?>

							<?php endif; ?>

							<?php endforeach; endif; unset($_from); ?>

							<?php endforeach; endif; unset($_from); ?>

						   </ul>
						</li>
					 <?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					</ul> 
			</div>
		</div>
	</div>
	<div class="modal hide fade" id="myMail">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">×</button>
			<h3>New messages</h3>
		</div>
		<div class="modal-body">
			<div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
			<table class="table table-condensed table-striped" data-provides="rowlink">
				<thead>
					<tr>
						<th>Sender</th>
						<th>Subject</th>
						<th>Date</th>
						<th>Size</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Declan Pamphlett</td>
						<td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
						<td>23/05/2012</td>
						<td>25KB</td>
					</tr>
					<tr>
						<td>Erin Church</td>
						<td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
						<td>24/05/2012</td>
						<td>15KB</td>
					</tr>
					<tr>
						<td>Koby Auld</td>
						<td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
						<td>25/05/2012</td>
						<td>28KB</td>
					</tr>
					<tr>
						<td>Anthony Pound</td>
						<td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
						<td>25/05/2012</td>
						<td>33KB</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<a href="javascript:void(0)" class="btn">Go to mailbox</a>
		</div>
	</div>
	