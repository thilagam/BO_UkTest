<?php /* Smarty version 2.6.19, created on 2016-04-06 12:45:58
         compiled from gebo/quote/add-techmissiontype-popup.phtml */ ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" >

$(document).ready(function() {
	$("#techmissiontypeform").validationEngine({prettySelect : true,useSuffix: "_chzn"});
	$("#delivery_option").chosen({ allow_single_deselect: false,disable_search: true});
});

</script>
'; ?>


<form name="techmissiontypeform" id="techmissiontypeform" action="/quote/tech-mission-type?submenuId=ML2-SL12" method="POST" > 
	<div class="row-fluid">
		<div class="row-fluid">
			<div class="span8">
				<label><h4>Type</h4></label>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span8">
				<select name="tech_type_assign" id="tech_type_assign" class="validate[required]">
					 <option value="superadmin" <?php if ($this->_tpl_vars['techmissiondetail'][0]['tech_type_assign'] == 'superadmin'): ?> selected<?php endif; ?>>Tech(superadmin)</option>
					 <option value="sales" <?php if ($this->_tpl_vars['techmissiondetail'][0]['tech_type_assign'] == 'sales'): ?> selected<?php endif; ?>>Sales</option>
					<option value="edito" <?php if ($this->_tpl_vars['techmissiondetail'][0]['tech_type_assign'] == 'edito'): ?> selected<?php endif; ?>>Edito</option>
					<option value="integration" <?php if ($this->_tpl_vars['techmissiondetail'][0]['tech_type_assign'] == 'integration'): ?> selected<?php endif; ?>>Integration</option>
				</select>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span8">
				<label><h4>Title</h4></label>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span8">
				<input type="text" class="span12 validate[required]" name="tech_title" id="tech_title" value="<?php echo $this->_tpl_vars['techmissiondetail'][0]['tech_title']; ?>
"/>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="span8">
				<label><h4>Cost</h4></label>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span4">
				<input type="text" class="span12 validate[required]" name="cost" id="cost" value="<?php echo $this->_tpl_vars['techmissiondetail'][0]['cost']; ?>
"/>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="span8">
				<label><h4>Delivery time</h4></label>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span4">
				<input type="text" class="span12 validate[required]" name="delivery_time" id="delivery_time" value="<?php echo $this->_tpl_vars['techmissiondetail'][0]['delivery_time']; ?>
"/>
			</div>
			<div class="span3">
				<select name="delivery_option" id="delivery_option">    
					<option value="hours" <?php if ($this->_tpl_vars['techmissiondetail'][0]['delivery_option'] == 'hours'): ?> selected<?php endif; ?>>Heure(s)</option>
					<option value="days" <?php if ($this->_tpl_vars['techmissiondetail'][0]['delivery_option'] == 'days'): ?> selected<?php endif; ?>>Jour(s)</option>
				</select>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="span4">
				<input type="submit" id="submit_techmission" name="submit_techmission" value="Submit" class="btn btn-info"/>
				<input type="button" name="cancel" value="Fermer" data-dismiss="modal" class="btn btn-danger"/>
			</div>
		</div>		
		<input type="hidden" name="tid" id="tid" value="<?php echo $this->_tpl_vars['techmissiondetail'][0]['tid']; ?>
"/>
	</div>
</form>
