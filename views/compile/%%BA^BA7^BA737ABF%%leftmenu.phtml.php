<?php /* Smarty version 2.6.19, created on 2015-12-10 14:21:23
         compiled from common/leftmenu.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'common/leftmenu.phtml', 16, false),array('modifier', 'stripslashes', 'common/leftmenu.phtml', 16, false),)), $this); ?>
<!-- sidebar -->
<div class="antiScroll">
<div class="antiscroll-inner">
	<div class="antiscroll-content">
		<div class="sidebar_inner">
			<form action="search_page.html" class="input-append" method="post" >
				<!--<input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="button" class="btn" ><i class="icon-search"></i></button>-->
			</form>
			<div id="leftlinks">
				<div id="side_accordion" class="accordion">
                    <?php $_from = $this->_tpl_vars['SubMenusLeftPanel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['count'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['count']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['myId'] => $this->_tpl_vars['i']):
        $this->_foreach['count']['iteration']++;
?>
					    <?php if ($this->_tpl_vars['myId'] != 'ML3-SL4'): ?><!-- ///to hide some links in left panel//-->
							<div class="accordion-group" >
								<?php if ($this->_tpl_vars['myId'] != $this->_tpl_vars['submenuId']): ?>
									<div class="accordion-heading">
										<a href="/<?php echo $this->_tpl_vars['EP_BO_MenuUrls'][$this->_tpl_vars['myId']]; ?>
?submenuId=<?php echo $this->_tpl_vars['myId']; ?>
" class="accordion-toggle1"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['i'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a>
									</div>
								<?php else: ?>
								<div class="accordion-heading sdb_h_active">
									<a href="/<?php echo $this->_tpl_vars['EP_BO_MenuUrls'][$this->_tpl_vars['myId']]; ?>
?submenuId=<?php echo $this->_tpl_vars['myId']; ?>
" class="accordion-toggle1"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['i'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a>
								</div>
								<?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
            </div>

            <?php if ($_GET['action'] != 'index'): ?>
				<!--Calculator Wiget-->
				<div class="accordion-group" style="display:none">
					<div class="accordion-heading">
						<a href="#collapse7" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
						   <i class="icon-th"></i> Calculator
						</a>
					</div>
					<div class="accordion-body collapse in" id="collapse7">
						<div class="accordion-inner">
							<form name="Calc" id="calc">
								<div class="formSep control-group input-append">
									<input type="text" style="width:130px" name="Input" /><button type="button" class="btn" name="clear" value="c" onClick="Calc.Input.value = ''"><i class="icon-remove"></i></button>
								</div>
								<div class="control-group">
									<input type="button" class="btn btn-large" name="seven" value="7" onClick="Calc.Input.value += '7'" />
									<input type="button" class="btn btn-large" name="eight" value="8" onClick="Calc.Input.value += '8'" />
									<input type="button" class="btn btn-large" name="nine" value="9" onClick="Calc.Input.value += '9'" />
									<input type="button" class="btn btn-large" name="div" value="/" onClick="Calc.Input.value += ' / '">
								</div>
								<div class="control-group">
									<input type="button" class="btn btn-large" name="four" value="4" onClick="Calc.Input.value += '4'" />
									<input type="button" class="btn btn-large" name="five" value="5" onClick="Calc.Input.value += '5'" />
									<input type="button" class="btn btn-large" name="six" value="6" onClick="Calc.Input.value += '6'" />
									<input type="button" class="btn btn-large" name="times" value="x" onClick="Calc.Input.value += ' * '" />
								</div>
								<div class="control-group">
									<input type="button" class="btn btn-large" name="one" value="1" onClick="Calc.Input.value += '1'" />
									<input type="button" class="btn btn-large" name="two" value="2" onClick="Calc.Input.value += '2'" />
									<input type="button" class="btn btn-large" name="three" value="3" onClick="Calc.Input.value += '3'" />
									<input type="button" class="btn btn-large" name="minus" value="-" onClick="Calc.Input.value += ' - '" />
								</div>
								<div class="formSep control-group">
									<input type="button" class="btn btn-large" name="dot" value="." onClick="Calc.Input.value += '.'" />
									<input type="button" class="btn btn-large" name="zero" value="0" onClick="Calc.Input.value += '0'" />
									<input type="button" class="btn btn-large" name="DoIt" value="=" onClick="Calc.Input.value = Math.round( eval(Calc.Input.value) * 1000)/1000" />
									<input type="button" class="btn btn-large" name="plus" value="+" onClick="Calc.Input.value += ' + '" />
								</div>
							</form>
						</div>
					 </div>
					</div>
				</div>
			<?php endif; ?>
			<div class="push"></div>
		</div>

	</div>
</div>

