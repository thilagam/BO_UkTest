<?php /* Smarty version 2.6.19, created on 2014-12-01 12:54:29
         compiled from gebo/ao/ao-create4.phtml */ ?>
<div style="padding-left:6px;padding-top:52px;padding-bottom:30px;">
	<b>The mission was successfully created. It is online www.edit-place.com and accessible now.</b>
</div>

<br>

<?php if ($this->_tpl_vars['duplicate'] == 'yes'): ?> 
	<button type="submit" value="Dupliquer cette mission" class="btn btn-info" onClick="window.location='/ao/ao-create1?submenuId=ML2-SL3'" >Duplicate this mission</button>&nbsp;&nbsp;
	<button type="submit" value="New AO" class="btn btn-info" onClick="window.location='/ao/ao-create1?submenuId=ML2-SL3&delsession=1'" >New AO</button>
<?php endif; ?>