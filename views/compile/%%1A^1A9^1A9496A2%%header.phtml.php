<?php /* Smarty version 2.6.19, created on 2016-03-14 13:24:50
         compiled from gebo-new/common/header.phtml */ ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){
    
  $("#toggle-notofication").click(function(){
    $("#activities").addClass(\'show\');
  });

  $("#clearActivities").click(function(){
    $("#activities").removeClass(\'show\');
  });
  
});
</script>

'; ?>


<div class="container-fluid">  

	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		
	</div>
	<a class="brand" href="#"><img src="/BO/theme/lbd/img/workplace-logo.svg" width="130"></a>
	<div class="collapse navbar-collapse">       
		
		<!--<a id="menu-toggle" class="btn btn-default" href="#menu-toggle">Toggle Menu</a>-->
		  
		<ul class="nav navbar-nav navbar-right">
		<li>
				<!-- toggle to show activation -->
				<a id="toggle-notofication"><i class="material-icons" >notifications_active</i></a>
			</li>
				
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					 <img src="<?php echo $this->_tpl_vars['fo_path']; ?>
profiles/bo/<?php echo $this->_tpl_vars['userId']; ?>
/logo.jpg?123" alet="<?php echo $this->_tpl_vars['loginName']; ?>
" width="32" height="32"/> <b class="caret"></b>
					</a>
	
				<ul class="dropdown-menu">
					<li><a href="/user/profile-edit?tab=profileedit">Modify Profile</a></li>
						<li><a href="/index/logout">Log Out</a></li>
					
				</ul>
			</li>

			
		</ul>
	</div>
</div>