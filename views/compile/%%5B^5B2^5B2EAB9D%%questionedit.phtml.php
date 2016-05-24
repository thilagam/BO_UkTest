<?php /* Smarty version 2.6.19, created on 2016-03-18 07:56:38
         compiled from gebo/ao/questionedit.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/ao/questionedit.phtml', 97, false),array('modifier', 'utf8_encode', 'gebo/ao/questionedit.phtml', 97, false),array('modifier', 'count', 'gebo/ao/questionedit.phtml', 125, false),array('function', 'math', 'gebo/ao/questionedit.phtml', 127, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="utf-8" src="/BO/script/datempicker.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		optiontext();
	});
	var counter = $("#editcounter").val();
	
	if(counter=="")
		counter = 1;
		
	function optiontext()
	{
		var opt = $("#type").val();
		
		if(opt==\'price\')
			$("#typeinfo").html("The expected response is an amount (in euros).");
		else if(opt==\'bulk_price\')
			$("#typeinfo").html(\'The expected response is an amount (in euros) after reduction to give a wholesale price \\ \'s there are several items. This type of question should be related to a matter of "price" type when creating the quote.\');
		else if(opt==\'range_price\')
			$("#typeinfo").html(\'The expected response will be an amount (in euros) between two amounts defined when creating the quote.\');
		else if(opt==\'timing\')
			$("#typeinfo").html(\'The expected response is a time in days, hours or minutes, parameter set when creating the quote. This type of question should be related to a matter of "price" or "wholesale price" when creating the quote.\');
		else if(opt==\'radio\')
			$("#typeinfo").html(\'The expected answer is to select from the list of answers you need to define below (only one choice is possible for the contributor).\');
		else if(opt==\'checkbox\')
			$("#typeinfo").html(\'The/the expected response (s) will check from a list of answers you need to define below (multiple choices are possible for the contributor).\');
	}
	
	function showoptions()
	{ 
		var opt = $("#type").val();
		
		optiontext();
			
		if(opt == \'radio\' || opt == \'checkbox\')
		{
			$("#TextBoxesGroup").show();
			
			var fldtext = \'<div id="TextBoxDiv2"><input type="text" name="option[]"/></div>\';
			$("#option_block").show();
			$("#TextBoxesGroup").html(fldtext);
		}
		else
		{
			$("#TextBoxesGroup").hide();
		}
	}
	
	function loadoptions()
	{
		//var cnt = $("#noofoptions").val();
		
		var fldtext = \'\';
		
		/*for(var i=1; i<=cnt; i++)
		{*/
			fldtext+=\'<div id="TextBoxDiv2"><input type="text" name="option[]"/></div>\';
		//}
		$("#option_block").show();
		$("#TextBoxesGroup").html(fldtext);
	}
	
	function addfield()
	{
		if (counter > 10) {
                alert("Only 10 textboxes allowed");
                return false;
            }
            $(\'<div/>\',{\'id\':\'TextBoxDiv\' + counter})
            .append( $(\'<input type="text" name="option[]">\') )
            .appendTo( \'#TextBoxesGroup\' )       
            counter++;
	}
	
	function removefield()
	{
			if (counter == 1) {
                alert("No more textbox to remove");
                return false;
            }
            
            $("#TextBoxDiv" + counter).remove();
			counter--;
	}
</script>

'; ?>
	

	<form action="/ao/pollconfiguration?submenuId=ML2-SL23" name="pollconfig_form_step<?php echo ($this->_foreach['quesloop']['iteration']-1)+1; ?>
" method="post"  >
		<table align="center" width="100%" cellpadding="4" cellspacing="4" style="padding:10px">
		<tr>
			<td valign="top" width="15%" colspan="2">Title of the question</td>
		</tr>
		<tr>	
			<td colspan="2">
				<textarea name="title" rows="3" class="span5" placeholder="Entrer your question..."><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quesdetail'][0]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
</textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">Type of reponse expected</td>
		</tr>
		<tr>		
			<td colspan="2">
				<select name="type" id="type" onChange="showoptions();" >
					<option value="price" <?php if ($this->_tpl_vars['quesdetail'][0]['type'] == 'price'): ?>selected<?php endif; ?>>Price</option>
					<option value="bulk_price" <?php if ($this->_tpl_vars['quesdetail'][0]['type'] == 'bulk_price'): ?>selected<?php endif; ?>>Wholesale price</option>
					<option value="range_price" <?php if ($this->_tpl_vars['quesdetail'][0]['type'] == 'range_price'): ?>selected<?php endif; ?>>Price Range</option>
					<option value="timing" <?php if ($this->_tpl_vars['quesdetail'][0]['type'] == 'timing'): ?>selected<?php endif; ?>>Duration</option>
					<option value="radio" <?php if ($this->_tpl_vars['quesdetail'][0]['type'] == 'radio'): ?>selected<?php endif; ?>>Radio buttons</option>
					<option value="checkbox" <?php if ($this->_tpl_vars['quesdetail'][0]['type'] == 'checkbox'): ?>selected<?php endif; ?>>Checkboxes</option>
					<!--<option value="calendar" <?php if ($this->_tpl_vars['quesdetail'][0]['type'] == 'calendar'): ?>selected<?php endif; ?>>Calendar</option>-->
				</select>
			</td>
		</tr>
		<tr>
			<td id="typeinfo" colspan="2">
				The expected response is an amount (in euros).
			</td>
		</tr>
		<tr id="option_block" <?php if ($this->_tpl_vars['quesdetail'][0]['type'] != 'radio' && $this->_tpl_vars['quesdetail'][0]['type'] != 'checkbox'): ?>style="display:none;"<?php endif; ?>>	
			<td valign="top">Options</td>
			<td>
				<div id="TextBoxesGroup">
					<?php if (count($this->_tpl_vars['quesdetail'][0]['optionlist']) > 0): ?>
						<?php $_from = $this->_tpl_vars['quesdetail'][0]['optionlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['optloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['optloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['opt']):
        $this->_foreach['optloop']['iteration']++;
?>
						<?php echo smarty_function_math(array('assign' => 'loopindex','equation' => 'x+1','x' => ($this->_foreach['optloop']['iteration']-1)), $this);?>
 
							<div id="TextBoxDiv<?php echo $this->_tpl_vars['loopindex']; ?>
">
								<input type="text" name="option[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['opt'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
" />
							</div>
						<?php endforeach; endif; unset($_from); ?>
						<input type="hidden" name="editcounter" id="editcounter" value="<?php echo count($this->_tpl_vars['quesdetail'][0]['optionlist']); ?>
" />
					<?php endif; ?>
				</div>
				<a href="javascript:void(0);" class="hint--bottom hint--info" data-hint="Add Option" onClick="addfield();"><i class="splashy-add"></i></a>&nbsp;
				<a href="javascript:void(0);" class="hint--bottom hint--info" data-hint="Remove Option" onClick="removefield();"><i class="splashy-remove"></i></a>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td style="float:right">&nbsp; <samp id="222"><input type="submit" name="submit_config" id="submit_config" value="Add"  class="btn btn-info" /></samp> </td>
		</tr>
		</table>
		<input type="hidden" name="quesid" id="quesid" value="<?php echo $this->_tpl_vars['quesdetail'][0]['id']; ?>
"/>
	</form>