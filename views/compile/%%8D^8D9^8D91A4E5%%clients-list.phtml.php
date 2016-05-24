<?php /* Smarty version 2.6.19, created on 2016-03-14 14:01:39
         compiled from gebo/quote/clients-list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/quote/clients-list.phtml', 102, false),array('modifier', 'date_format', 'gebo/quote/clients-list.phtml', 188, false),)), $this); ?>
<?php echo '
<link href="/BO/theme/gebo/css/jquery.datetimepicker.css" rel="stylesheet">
<script src="/BO/theme/gebo/js/jquery.datetimepicker.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">	
$(document).ready(function() {
		$(\'#clientList\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "aaSorting": [[ 3, "desc" ]],
			"iDisplayLength":50,
            "aoColumns": [
				{ "sType": "string" },
                { "sType": "html" },
                { "sType": "string" },
                { "sType": "eu_date" },
                { "sType": "string" },				
                { "sType": "string" }
            ]
        });
		
		$("#ong_search").click(function () {
				$("#search_block").toggle();
		});
		
		/*search form elements*/
		
		$("#created_user").chosen({ allow_single_deselect: true,search_contains: true});
		$("#premium").chosen({ allow_single_deselect: true,search_contains: true,disable_search: true});
		$("#online").chosen({ allow_single_deselect: true,search_contains: true,disable_search: true});		
		$("#ctype").chosen({ allow_single_deselect: true,search_contains: true,disable_search: true});		
		
		$(\'#startdate\').datetimepicker({
			format:\'Y-m-d\',
			lang:\'en\',
			timepicker:false
			/* onShow:function( ct ){
				this.setOptions({
					maxDate:get_date($(\'#enddate\').val())?get_date($(\'#enddate\').val()):false,formatDate:\'Y-m-d\',minDate:0
				})
			} */
		});

		$(\'#enddate\').datetimepicker({
			format:\'Y-m-d\',
			lang:\'en\',
			timepicker:false,
			onShow:function( ct ){
				this.setOptions({
					minDate:get_date($(\'#startdate\').val())?get_date($(\'#startdate\').val()):false,formatDate:\'Y-m-d\'
				})
			}
		});

});

function get_date(input) {
	if(input == \'\') {
		return false;
	}
	else {
		// Split the date, divider is \'/\'
		var parts = input.match(/(\\d+)/g);
		return parts[0]+\'-\'+parts[1]+\'-\'+parts[2];
	}
}
</script>
<style>
	#clientList .image {
    margin: 0;
}
#clientList .image {
    float: left;
    height: 50px;
    margin: 0;
    text-align: center;
    width: 50px;
}
.imgtxtpos
{
	float:left;
	margin:15px 10px;
}
</style>
'; ?>

<div class="row-fluid">
	<div class="span12">
    	<h1 class="heading pull-left">Premium Client List <a class="btn btn-gebo1" id="ong_search">Filtrer</a></h1>
		<div class="pull-right">
		<a class="btn btn-primary" href="/quote/create-client?submenuId=ML13-SL1">Create Client</a>
		</div>
	</div>
</div>	
<div class="row-fluid">	
	<div class="<?php if (! $_GET['search']): ?>hide<?php endif; ?> well clearfix" id="search_block">
		<div class="row-fluid">
			<form action=<?php echo $_SERVER['REQUEST_URI']; ?>
 method="get" id="searchform" name="searchform" >				
				 <input type="hidden" id="submenuId" name="submenuId"  value="<?php echo $this->_tpl_vars['submenuId']; ?>
"/>
				<div class="row-fluid">
					<span class="span2">
						<select name="created_user"  class="span12" id="created_user" data-placeholder="Creator ">
							<option value=""></option>
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['client_creators'],'selected' => $_GET['created_user']), $this);?>
	
						</select>	
					</span>
					<span class="span2">
						<div class="input-append date">
							<input class="span10 validate[required]" value="<?php echo $_GET['startdate']; ?>
" type="text" name="startdate" id="startdate" placeholder="From"/><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
						</div>
					</span>
					<span class="span2">
						<div class="input-append date">
							<input class="span10 validate[required]" value="<?php echo $_GET['enddate']; ?>
" type="text" name="enddate" id="enddate" placeholder="To"/><span class="add-on"><i class="splashy-calendar_day_up"></i></span>
						</div>	
					</span>
					<!--<span class="span2">
						<select id="premium" class="span12" name="premium" data-placeholder="Premium">
							<option value=""></option>
							<option value="yes" <?php if ($_GET['premium'] == 'yes'): ?>selected<?php endif; ?>>Yes </option>
                            <option value="no" <?php if ($_GET['premium'] == 'no'): ?>selected<?php endif; ?>>No</option>
						</select>	
					</span>
					<span class="span1">
						<select id="online" class="span12" name="online" data-placeholder="Online">
							<option value=""></option>
							<option value="yes" <?php if ($_GET['online'] == 'yes'): ?>selected<?php endif; ?>>Yes </option>
                            <option value="no" <?php if ($_GET['online'] == 'no'): ?>selected<?php endif; ?>>No</option>						
						</select>	
					</span>-->
					<span class="span2">
						<select id="ctype" class="span12" name="ctype" data-placeholder="Type de client">
							<option value=""></option>
							<option value="p" <?php if ($_GET['ctype'] == 'p'): ?>selected<?php endif; ?>>Prospect</option>
                            <option value="c" <?php if ($_GET['ctype'] == 'c'): ?>selected<?php endif; ?>>Client</option>						
						</select>	
					</span>
					<span class="span1">
						<button class="btn btn-danger pull-center" id="search" name="search" type="submit" value="search" >Search</button>
					</span>
				</div>
			</form>		  
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row-fluid">
		<table class="table table-bordered table-hover table_vam" id="clientList" >
			<thead>
				<tr>
				   <th>Code client</th>
				    <th>Company name</th>
				   <th>Created by</th>
				   <th>Created at</th>
				   <th>First contact</th>
				   <!--<th>ONLINE</th>
				   <th>PREMIUM</th> -->
				   <th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php $_from = $this->_tpl_vars['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['client']):
?>
				<tr>
					<td>
					<?php echo $this->_tpl_vars['client']['client_code']; ?>

					</td>
					<td>
					<?php if ($this->_tpl_vars['client']['created_by'] != 'FO' && $this->_tpl_vars['client']['contactname']): ?>
						<a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['client']['identifier']; ?>
&submenuId=ML13-SL1">
					<?php else: ?>
						<a href="/user/client-edit?submenuId=ML10-SL2&tab=viewclient&userId=<?php echo $this->_tpl_vars['client']['identifier']; ?>
">		
					<?php endif; ?>			
					<?php if ($this->_tpl_vars['client']['company_name']): ?>
						<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['client']['identifier']; ?>
/<?php echo $this->_tpl_vars['client']['identifier']; ?>
_global.png?12345" class="image rd_30" alt="<?php echo $this->_tpl_vars['client']['company_name']; ?>
">
						<span class="imgtxtpos"><?php echo $this->_tpl_vars['client']['company_name']; ?>
</span>	
					<?php elseif ($this->_tpl_vars['client']['first_name']): ?>	
						<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['client']['identifier']; ?>
/logo.jpg?123" class="image rd_30" alt="<?php echo $this->_tpl_vars['client']['first_name']; ?>
">
						<span class="imgtxtpos"><?php echo $this->_tpl_vars['client']['first_name']; ?>
</span>
					<?php else: ?>			
						<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/clients/logos/<?php echo $this->_tpl_vars['client']['identifier']; ?>
/logo.jpg?123" class="image rd_30" alt="<?php echo $this->_tpl_vars['client']['email']; ?>
">
						<span class="imgtxtpos"><?php echo $this->_tpl_vars['client']['email']; ?>
</span>		
					<?php endif; ?>			
						</a>			
					</td>
					<td>
						<a class="hint--right" data-hint="<?php echo $this->_tpl_vars['client']['created_by']; ?>
">
							<img src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['client']['created_user']; ?>
/logo.jpg?123" class="image rd_30" alt="<?php echo $this->_tpl_vars['client']['created_by']; ?>
">
						</a>
											</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['client']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
					<td>
						<?php if ($this->_tpl_vars['client']['contactname']): ?>
							<?php echo $this->_tpl_vars['client']['contactname']; ?>

						<?php else: ?>		
							-			
						<?php endif; ?>		
					</td>		
					<!--<td>		
						<?php if ($this->_tpl_vars['client']['online_count'] > 0): ?>	
							Yes			
						<?php else: ?>			
							No			
						<?php endif; ?>		
					</td>	
					<td>	
						<?php if ($this->_tpl_vars['client']['premium_count'] > 0): ?>		
							Yes				
						<?php else: ?>		
							No		
						<?php endif; ?>		
					</td>-->
					<td>
					<?php if ($this->_tpl_vars['client']['created_by'] != 'FO' && $this->_tpl_vars['client']['contactname']): ?>						
						<a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['client']['identifier']; ?>
&submenuId=ML13-SL1" class="btn">View</a>
						<a href="/quote/create-client?uaction=edit&client_id=<?php echo $this->_tpl_vars['client']['identifier']; ?>
&submenuId=ML13-SL1" class="btn btn-primary">Edit</a>	
					<?php else: ?>						
						<a href="/user/client-edit?submenuId=ML10-SL2&tab=viewclient&userId=<?php echo $this->_tpl_vars['client']['identifier']; ?>
" class="btn">View</a>						
						<a href="/user/client-edit?submenuId=ML10-SL2&tab=editclient&userId=<?php echo $this->_tpl_vars['client']['identifier']; ?>
" class="btn btn-primary">Edit</a>					
					<?php endif; ?>	
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			</tbody>
		</table>
	</div>
</div>