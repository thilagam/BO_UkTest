<?php /* Smarty version 2.6.19, created on 2016-03-18 07:55:54
         compiled from gebo/ao/createpoll_step2.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'gebo/ao/createpoll_step2.phtml', 33, false),array('modifier', 'stripslashes', 'gebo/ao/createpoll_step2.phtml', 47, false),array('modifier', 'count', 'gebo/ao/createpoll_step2.phtml', 141, false),)), $this); ?>
<?php echo '
<script type="text/javascript" charset="ISO-8859-1" src="/BO/theme/gebo/js/custom/validations_poll.js"></script>
<script>
	$(document).ready(function() { 
		$(".uni_style").uniform(); 
		loadlinks();
	}); 
</script>
<style>
	.con-title { font-weight:bold; 	background:none repeat scroll 0 0 #999999; 	text-align:center; 	color:#FFFFFF; 	font-size: 15px; 	border-radius: 10px; 	cursor:pointer; }
	input {text-transform:none !important;}
</style>

'; ?>


<form action="/ao/createpoll2?submenuId=ML2-SL15" method="post" id="poll_step2_form" name="poll_step2_form">
<div class="row-fluid">
  	<div class="span12">
		<h3 class="heading">Questions Quote
			<span align="right">
				<img src="/BO/theme/gebo/img/path-2.png" width="120" height="35" border="0" usemap="#Map" style="float:right;" />
				<map name="Map" id="Map">
				<?php if ($this->_tpl_vars['nav_1'] == 1): ?>	
					<area shape="circle" coords="18,18,17" href="/ao/createpoll?submenuId=ML2-SL15" />
				<?php endif; ?>
				<?php if ($this->_tpl_vars['nav_3'] == 1): ?>	
					<area shape="circle" coords="102,17,18" href="/ao/createpoll2?submenuId=ML2-SL15"/>
				<?php endif; ?>
				</map>
			</span> 
		</h3>
		<?php $_from = $this->_tpl_vars['pquestionlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quesloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quesloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ques']):
        $this->_foreach['quesloop']['iteration']++;
?>
			<?php echo smarty_function_math(array('assign' => 'loopindex','equation' => 'x+1','x' => ($this->_foreach['quesloop']['iteration']-1)), $this);?>
 
			<div class="w-box">
				<div class="w-box-header">Question <?php echo $this->_tpl_vars['loopindex']; ?>
</div>
				<div class='w-box-content'>
					<table align="center" cellpadding="4" cellspacing="4" width="98%">
					<tr>
						<td width="5%">
							<span align="left">
								<label class="uni-checkbox">  
									<input type="checkbox" name="selques[]" id="check_<?php echo $this->_tpl_vars['loopindex']; ?>
"  class="uni_style" value="<?php echo $this->_tpl_vars['ques']['id']; ?>
" onClick="showorder(<?php echo $this->_tpl_vars['loopindex']; ?>
);" <?php if (in_array ( $this->_tpl_vars['ques']['id'] , $this->_tpl_vars['selectedq'] )): ?>checked<?php endif; ?>/>
								</label>
							</span>
						</td>
						<td width="20%">Title</td>
						<td><input type="text" name="title_<?php echo $this->_tpl_vars['loopindex']; ?>
" id="title_<?php echo $this->_tpl_vars['loopindex']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ques']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
" style="width:550px"/></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>Type</td>
						<td>
							<select name="type" id="type" disabled class="span3">
								<option value="price" <?php if ($this->_tpl_vars['ques']['type'] == 'price'): ?>selected<?php endif; ?>>Price</option>
								<option value="bulk_price" <?php if ($this->_tpl_vars['ques']['type'] == 'bulk_price'): ?>selected<?php endif; ?>>Wholesale price</option>
								<option value="range_price" <?php if ($this->_tpl_vars['ques']['type'] == 'range_price'): ?>selected<?php endif; ?>>Price Range</option>
								<option value="timing" <?php if ($this->_tpl_vars['ques']['type'] == 'timing'): ?>selected<?php endif; ?>>Duration</option>
								<option value="radio" <?php if ($this->_tpl_vars['ques']['type'] == 'radio'): ?>selected<?php endif; ?>>Radio buttons</option>
								<option value="checkbox" <?php if ($this->_tpl_vars['ques']['type'] == 'checkbox'): ?>selected<?php endif; ?>>Checkboxes</option>
							</select>
						</td>
						<input type="hidden" name="type_<?php echo $this->_tpl_vars['loopindex']; ?>
" id="type_<?php echo $this->_tpl_vars['loopindex']; ?>
" value="<?php echo $this->_tpl_vars['ques']['type']; ?>
" />
					</tr>
					<tr <?php if ($this->_tpl_vars['ques']['type'] != 'timing'): ?>style="display:none;"<?php endif; ?>>
						<td>&nbsp;</td>
						<td>Options</td>
						<td>
							<select name="timingoption_<?php echo $this->_tpl_vars['loopindex']; ?>
" id="timingoption_<?php echo $this->_tpl_vars['loopindex']; ?>
" class="span2">
								<option value="min" <?php if ($this->_tpl_vars['ques']['option'] == 'min'): ?>selected<?php endif; ?>>Minute(s)</option>
								<option value="hour" <?php if ($this->_tpl_vars['ques']['option'] == 'hour'): ?>selected<?php endif; ?>>Hour(s)</option>
								<option value="day" <?php if ($this->_tpl_vars['ques']['option'] == 'day'): ?>selected<?php endif; ?>>Day(s)</option>
							</select>
						</td> 
					</tr>
					<tr <?php if ($this->_tpl_vars['ques']['type'] != 'range_price' && $this->_tpl_vars['ques']['type'] != 'timing'): ?>style="display:none"<?php endif; ?>>
						<td>&nbsp;</td>
						<td>Minimum</td>
						<td>
							<input type="text" name="minimum_<?php echo $this->_tpl_vars['loopindex']; ?>
" id="minimum_<?php echo $this->_tpl_vars['loopindex']; ?>
" value="<?php echo $this->_tpl_vars['ques']['minimum']; ?>
" class="span2"/>
						</td>
					</tr>
					<tr <?php if ($this->_tpl_vars['ques']['type'] != 'price' && $this->_tpl_vars['ques']['type'] != 'range_price' && $this->_tpl_vars['ques']['type'] != 'timing'): ?>style="display:none"<?php endif; ?>>
						<td>&nbsp;</td>
						<td valign="top">Maximum</td>
						<td>
							<input type="text" name="maximum_<?php echo $this->_tpl_vars['loopindex']; ?>
" id="maximum_<?php echo $this->_tpl_vars['loopindex']; ?>
" value="<?php echo $this->_tpl_vars['ques']['maximum']; ?>
" class="span2" <?php if ($this->_tpl_vars['ques']['type'] == 'price'): ?>onfocus="$('#pricemsg').show();"; onBlur="$('#pricemsg').hide();";<?php endif; ?> />
							<div id="pricemsg" style="display:none;color:red;">Please enter a number or leave it blank to the maximum price</div>
						</td>
					</tr>
					<tr <?php if ($this->_tpl_vars['ques']['type'] != 'radio' && $this->_tpl_vars['ques']['type'] != 'checkbox'): ?>style="display:none"<?php endif; ?>>
						<td>&nbsp;</td>
						<td valign="top">Options</td>
						<td><b><?php echo $this->_tpl_vars['ques']['optionlist']; ?>
</b></td>
						<input type="hidden" name="option_<?php echo $this->_tpl_vars['loopindex']; ?>
" id="option_<?php echo $this->_tpl_vars['loopindex']; ?>
" value="<?php echo $this->_tpl_vars['ques']['option']; ?>
" />  
					</tr>
					<tr id="linkprice_<?php echo $this->_tpl_vars['loopindex']; ?>
">
						<td>&nbsp;</td>
						<td valign="top">Relationship</td>
						<td id="pricelist_<?php echo $this->_tpl_vars['loopindex']; ?>
" >
							<select name="link_<?php echo $this->_tpl_vars['loopindex']; ?>
" id="link_<?php echo $this->_tpl_vars['loopindex']; ?>
" class="pricelist"> 
								<option value="">Choose</option>
							</select>
							<input type="hidden" id="linkedit_<?php echo $this->_tpl_vars['loopindex']; ?>
" name="linkedit_<?php echo $this->_tpl_vars['loopindex']; ?>
" value="<?php echo $this->_tpl_vars['ques']['linkedit']; ?>
" /> 
						</td>
					</tr>   
					<tr id="orderblock_<?php echo $this->_tpl_vars['loopindex']; ?>
" <?php if (! in_array ( $this->_tpl_vars['ques']['id'] , $this->_tpl_vars['selectedq'] )): ?>style="display:none;"<?php endif; ?>>
						<td>&nbsp;</td>
						<td valign="top">Order of appearance</td>
						<td><input type="text" name="order_<?php echo $this->_tpl_vars['loopindex']; ?>
" id="order_<?php echo $this->_tpl_vars['loopindex']; ?>
" value="<?php echo $this->_tpl_vars['ques']['order']; ?>
" class="span2"/></td>
					</tr>
					<tr> 
						<td>&nbsp;</td>
						<td colspan="2" style="text-align:left;font-family:Arial;font-size:13px;font-weight:normal;font-style:normal;text-decoration:none;color:#66CCFF;">
							<?php if ($this->_tpl_vars['ques']['type'] == 'price'): ?>
								The expected response is an amount (in euros)
							<?php elseif ($this->_tpl_vars['ques']['type'] == 'bulk_price'): ?>
								The expected response is an amount (in euros) after reduction to give a wholesale price if there are several items. This type of question should be linked to a question such as "Price" when creating the quote.
							<?php elseif ($this->_tpl_vars['ques']['type'] == 'range_price'): ?>	
								The expected response will be an amount (in euros) between two amounts defined when creating the quote.
							<?php elseif ($this->_tpl_vars['ques']['type'] == 'timing'): ?>	
								The expected response is a time in days, hours or minutes, parameter set when creating the quote. This type of question should be related to a matter of "price" or "wholesale price" when creating the quote.
							<?php elseif ($this->_tpl_vars['ques']['type'] == 'radio'): ?>	
								The expected answer is to select from the list of answers you need to define below (only one choice is possible for the contributor).
							<?php elseif ($this->_tpl_vars['ques']['type'] == 'checkbox'): ?>
								The expected response (s) will check from a list of answers you need to define below (multiple choices are possible for the contributor).
							<?php endif; ?>	
						</td>
					</tr>
					<input type="hidden" name="quesid_<?php echo $this->_tpl_vars['loopindex']; ?>
" id="quesid_<?php echo $this->_tpl_vars['loopindex']; ?>
" value="<?php echo $this->_tpl_vars['ques']['id']; ?>
" />
					<input type="hidden" name="questype_<?php echo $this->_tpl_vars['loopindex']; ?>
" id="questype_<?php echo $this->_tpl_vars['loopindex']; ?>
" value="<?php echo $this->_tpl_vars['ques']['type']; ?>
" />
					<tr><td>&nbsp;</td></tr>
				</table>
			</div>
		</div>
		<?php endforeach; endif; unset($_from); ?>	
			
		<div style="float:right;padding:30px">
			<input type="submit" value="GO TO STEP 3" class="btn btn-info" onClick="return validate_poll_step2();"/>
		</div>	
	<input type="hidden" name="smic" id="smic" value="<?php echo $this->_tpl_vars['smicrate']; ?>
" />
	<input type="hidden" name="quescount" id="quescount" value="<?php echo count($this->_tpl_vars['pquestionlist']); ?>
" />
	</div>
</div>
</form>