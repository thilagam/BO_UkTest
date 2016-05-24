<?php /* Smarty version 2.6.19, created on 2016-04-27 10:34:29
         compiled from skeleton/lbd-pattern.phtml */ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="ISO-8859-1" />
	<link rel="icon" type="image/png" href="/BO/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Edit-place :: WORK PLACE</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="/BO/theme/lbd/css/bootstrap.min.css" rel="stylesheet" />    
	<!--Custom css by seb-->
	<link href="/BO/theme/lbd/css/bootstrap-horizon.css" rel="stylesheet"/>	
    <!--  Light Bootstrap Dashboard core CSS    -->
    <link href="/BO/theme/lbd/css/light-bootstrap-dashboard.css" rel="stylesheet"/>	
	 <!--  Chosen Plugin -->
	<link href="/BO/theme/lbd/lib/chosen/chosen.css" type="text/css" rel="stylesheet" />
    <!--     Fonts and icons     -->    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
	
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="/BO/theme/lbd/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
	
	 <!--   Core JS Files   -->
    <script src="/BO/theme/lbd/js/jquery.min.js" type="text/javascript"></script>
    <script src="/BO/theme/lbd/js/jquery-ui.min.js" type="text/javascript"></script> 
	<script src="/BO/theme/lbd/js/bootstrap.min.js" type="text/javascript"></script> 
	
	<!-- Light Bootstrap Dashboard Core javascript and methods -->
	<script src="/BO/theme/lbd/js/light-bootstrap-dashboard.js" type="text/javascript"></script> 
	
	<!--  Checkbox, Radio, Switch and Tags Input Plugins -->
	<script src="/BO/theme/lbd/js/bootstrap-checkbox-radio-switch-tags.js" type="text/javascript"></script> 
	
	 <!-- Sweet Alert 2 plugin -->
	<script src="/BO/theme/lbd/js/sweetalert2.js"></script>
	
	 <!--  Select Picker Plugin -->
	<script src="/BO/theme/lbd/js/bootstrap-selectpicker.js" type="text/javascript" charset="utf-8"></script>
	<!--  Chosen Plugin -->
	<script language="JavaScript" type="text/javascript" src="/BO/theme/lbd/lib/chosen/chosen.jquery.js"></script>
	<!--<link href="/BO/theme/lbd/lib/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
	<script src="/BO/theme/lbd/lib/bootstrap-select/js/bootstrap-select.js" type="text/javascript" charset="utf-8"></script>-->
	
   
</head>
<body> 

	<div class="wrapper">    
		<!--Side bar-->
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo-new/common/left-menu.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		<div class="main-panel">
			<nav class="navbar navbar-default">
				<?php $_from = $this->_tpl_vars['headerList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endforeach; endif; unset($_from); ?>
			</nav>       
			<div class="content">
				<div class="container-fluid">    
				   <?php $_from = $this->_tpl_vars['mainList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
					  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php endforeach; endif; unset($_from); ?>
				</div>
			</div>			
		</div>   
	</div>	

	<!----- view mission-------->
	<div class="modal fade" id="viewmission" tabindex="-1" role="dialog"   >
	  <div class="modal-dialog" style="width:650px !important">
		<div class="modal-content">
		  
		</div>
	  </div>
	</div>

	<!----- view mission-------->
	<div class="modal fade" id="viewHistroymission" tabindex="-1" role="dialog"   >
	  <div class="modal-dialog" style="width:650px !important">
		<div class="modal-content">
		  
		</div>
	  </div>
	</div>	

	<!----- Edit Price per article -------->
	<div class="modal fade" id="editarticleprice" tabindex="-1" role="dialog" align="center">
	  <div class="modal-dialog  modal-sm">
		<div class="modal-content">
		  <div class="modal-header modal-header-black">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title .center-block">EDIT</h4>
		  </div>
		  <div class="modal-body" align="center">
			<form  id="changeFormValue">
			
				<div class="form-group">
					<label for="">Price per article</label>
					<input type="text" class="form-control" name="price_per_article" id="price_per_article" placeholder="" onKeyup="changeOnPrice();">
				</div>
				<div class="form-group">
					<label for="">Margin</label>
					<input type="text" class="form-control" name="epmargin" id="epmargin" placeholder="" onKeyup="changeOnMargin();">
				</div>
			   <button type="button" class="btn btn-primary" onclick="validatearticleprice();">VALIDATE</button>
			   <input type="hidden" name="missionindex" id="missionindex" value="" />
			</form>
			
		  </div>
		</div>
	  </div>
	</div>
	
	<!----- Edit mission in sales final validation-------->
	<div class="modal fade" id="editmission" tabindex="-1" role="dialog"   >
	  <div class="modal-dialog" style="width:650px !important">
		<div class="modal-content">
		  
		</div>
	  </div>
	</div>
	
	<!----- Close Quote-------->
	<div class="modal fade" id="close_quote" tabindex="-1" role="dialog">
	  <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-header-black">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title center-block">Fermer devis</h4>
			</div>
			<div class="modal-body" align="center">
			 
			</div>		  
		</div>
	  </div>
	</div>


	<!-- sign the quotes-->
	<div class="modal fade" id="sign_quote" tabindex="-1" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
			    
	    	</div>
		 </div>
	</div>

	<!--Edit Quote files/comments-->
<div class="modal container  fade" id="edit_quote_files" tabindex="-1" role="dialog" >
<div class="modal-dialog">
			<div class="modal-content">
		    
			
	    
    </div>
	 </div>
</div>


<!--Relance Quote files/comments-->
<div class="modal fade" id="programmer-relance" tabindex="-1" role="dialog" >
<div class="modal-dialog">
			<div class="modal-content">
		    
				
		   
		</div>
 	</div>
 </div>	
	 <!--Currency change -->
	<div class="modal fade" id="change-currency" tabindex="-1" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
			</div>
		</div>
	</div>	
	
	 <!--HOQ Price Modal -->
	<div class="modal fade" id="hoq-price-modal" tabindex="-1" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
			</div>
		</div>
	</div>
</body>   
</html>