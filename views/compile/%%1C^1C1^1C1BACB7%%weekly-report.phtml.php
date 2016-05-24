<?php /* Smarty version 2.6.19, created on 2015-09-28 14:46:13
         compiled from gebo/ebookers/weekly-report.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/ebookers/weekly-report.phtml', 20, false),array('modifier', 'count', 'gebo/ebookers/weekly-report.phtml', 147, false),)), $this); ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Ebookers - Weekly report</title>
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/BO/theme/ebooker-report/stylesheets/app.css" />
</head>
<body>
	<!--///////////////////////////// THIS IS THE HEADER \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
	<header>
		<div class="row">
			<img class="hide-for-print"  src="<?php echo $this->_tpl_vars['baseurl']; ?>
/BO/theme/ebooker-report/images/eb-logo-header.png" alt="">
			<img class="print-only"  src="<?php echo $this->_tpl_vars['baseurl']; ?>
/BO/theme/ebooker-report/images/eb-logo-header-print.png" alt="">
			<h1>Weekly report</h1>			
			
			<?php if ($this->_tpl_vars['type'] != 'html'): ?>
				<form name="language_report" method="GET">
					<select name="language" style="height: 30px; margin-left: 30px; margin-top: 14px; width: 250px;" onchange="this.form.submit();">						
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['languages'],'selected' => $this->_tpl_vars['language_selected']), $this);?>

					</select>
				</form>	
			<?php endif; ?>	
				
			
			<?php if ($this->_tpl_vars['type'] == 'html'): ?>				
				<a href="http://clients.edit-place.com/excel-devs/ebookers/weekly-report.php?download=xlsx&language=<?php echo $this->_tpl_vars['language_selected']; ?>
" style="float:right;color:#FFF"><span>Download XLSX</span></a>
			<?php endif; ?>	
			
			
		</div>
	</header>
	<!--////////////////////////////////// HEADER END \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

	<!--///////////////////////////// MAIN STAT CONTENT \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
	<div class="row" >
		<div class="projectWrapper">
			<div class="projectComplete">
				<h4>Project achievement</h4>
				<div class="chartDisplay">
					<span class="chart" data-percent="<?php echo $this->_tpl_vars['completion_percentage']; ?>
">
						<span class="percent"></span>
					</span>
					<span>
					<?php echo $this->_tpl_vars['total_intergrated_count']; ?>
 stencils are integrated over <?php echo $this->_tpl_vars['total_stencils_count']; ?>

					</span>
				</div>
			</div>
		</div>

		<div class="dataWrapper">
			<ul class="statsDisplay">
				<li class="stat1">
					<div class="statWrapper">
						<div class="small-4 columns">
							<i class="fa fa-pencil"></i>
						</div>
						<div class="small-8 columns">
							<span class="stencilsCount">
							<?php echo $this->_tpl_vars['total_written_count']; ?>

								<span class="stencilType">
									written stencils
								</span>	
							</span>
						</div>
					</div>
					<div class="wordCount">
						<?php echo $this->_tpl_vars['total_written_words']; ?>
 words
					</div>									
				</li>
				<li class="stat2">
					<div class="statWrapper">
						<div class="small-4 columns">
							<i class="fa fa-eye"></i>
						</div>
						<div class="small-8 columns">
							<span class="stencilsCount">
								<?php echo $this->_tpl_vars['total_proofreaded_count']; ?>

								<span class="stencilType">
									Proofreaded stencils
								</span>	
							</span>
						</div>
					</div>
					<div class="wordCount">
						<?php echo $this->_tpl_vars['total_proofreaded_words']; ?>
 words
					</div>									
				</li>				
				<li class="stat3">
					<div class="statWrapper">
						<div class="small-4 columns">
							<i class="fa fa-check"></i>
						</div>
						<div class="small-8 columns">
							<span class="stencilsCount">
							<?php echo $this->_tpl_vars['total_validated_count']; ?>

								<span class="stencilType">
									Validated stencils
								</span>	
							</span>
						</div>
					</div>
					<div class="wordCount">
						<?php echo $this->_tpl_vars['total_validated_words']; ?>
 words
					</div>									
				</li>				
				<li class="stat4">
					<div class="statWrapper">
						<div class="small-4 columns">
							<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/BO/theme/ebooker-report/images/eb-logo-small.png" alt="">
						</div>
						<div class="small-8 columns">
							<span class="stencilsCount">
								<?php echo $this->_tpl_vars['total_intergrated_count']; ?>

								<span class="stencilType">
									Integrated stencils
								</span>	
							</span>
						</div>
					</div>
					<div class="wordCount">
						<?php echo $this->_tpl_vars['total_integrated_words']; ?>
 words
					</div>									
				</li>
			</ul>
		</div>
	</div>

	<!--/////////////////////////// STATS TABLE STARTS HERE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

	<div class="row tableStats">
		<table cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th colspan="6" >Split per category</th>
				</tr>
			</thead>
			<tbody>
				<tr class="tableSummary">
					<td>Category</td>
					<td>Stencils</td>
					<td>Written</td>
					<td>Proof readed</td>
					<td>Validated</td>
					<td>Integrated</td>
				</tr>
				<?php if (count($this->_tpl_vars['themeStencilsDetails']) > 0): ?>
					<?php $_from = $this->_tpl_vars['themeStencilsDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['theme']):
?>
						<tr>
							<td><?php echo $this->_tpl_vars['theme']['theme_name']; ?>
</td>				
							<td><?php if ($this->_tpl_vars['theme']['stencils_count']): ?><?php echo $this->_tpl_vars['theme']['stencils_count']; ?>
<?php else: ?>-<?php endif; ?></td>
							<td><?php if ($this->_tpl_vars['theme']['written_stencils_count']): ?><?php echo $this->_tpl_vars['theme']['written_stencils_count']; ?>
<?php else: ?>-<?php endif; ?></td>
							<td><?php if ($this->_tpl_vars['theme']['proofread_stencils_count']): ?><?php echo $this->_tpl_vars['theme']['proofread_stencils_count']; ?>
<?php else: ?>-<?php endif; ?></td>
							<td><?php if ($this->_tpl_vars['theme']['validated_stencils_count']): ?><?php echo $this->_tpl_vars['theme']['validated_stencils_count']; ?>
<?php else: ?>-<?php endif; ?></td>	
							<td><?php if ($this->_tpl_vars['theme']['integrated_count']): ?><?php echo $this->_tpl_vars['theme']['integrated_count']; ?>
<?php else: ?>-<?php endif; ?></td>				
						</tr>
					<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>															
			</tbody>
		</table>
	</div>

	<!--////////////////////////////// END STATS DISPLAY \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->



	<!--//////////////////////// FOOTER AREA WITH DOWNLOAD BTN\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
	<footer>
		<div class="row">
			<a href="#" data-reveal-id="dlModal" class="dlCta"><i class="fa fa-download"></i><span>Download datas</span></a>
		</div>
		<div class="row">			
			<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/BO/theme/ebooker-report/images/ep-logo.png" alt="">
		</div>
	</footer>
	<!--/////////////////////////////  END FOOTER AREA \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->


	<!--/////////////////////////////  FILE EXPORT MODAL \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
	<div id="dlModal" class="reveal-modal full" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

	<!--//////////////////////////  1ST STEP FILE TYPE EXPORT \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

		<div class="columns fileSelection">
			<h2 id="modalTitle">Download your datas</h2>
			<h3>Please select your outpout format</h3>
			<ul class="outputFileList">
				<li>
					<a href="/ebookers/download-report?type=pdf&language=<?php echo $this->_tpl_vars['language_selected']; ?>
">
						<i class="fa fa-file-pdf-o"></i>
						<span>pdf</span>
					</a>
				</li>
				<li>
					<a href="/ebookers/download-report?type=xlsx&language=<?php echo $this->_tpl_vars['language_selected']; ?>
">
						<i class="fa fa-file-excel-o"></i>
						<span>excel</span>
					</a>
				</li>
				<!--<li>
					<a href="">
						<i class="fa fa-file-text-o"></i>
						<span>csv</span>
					</a>
				</li>-->
			</ul>				
		</div>

	<!--//////////////////////////  2ND STEP FILE EXPORT LOADING \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

		<!-- <div class="columns fileCurrentDl">
			<svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
				<circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
			</svg>
			<span>Processing Download</span>
		</div> -->

	<!--//////////////////////////  3RD STEP FILE DL SUCCESS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

		<!-- <div class="columns dlSuccess">
			<i class="fa fa-thumbs-o-up"></i>
			<h3>Your file has successfully been exported !</h3> 
		</div> -->

	<!--//////////////////////////  3RD STEP FILE DL ERROR \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
		<!-- <div class="columns dlError">
			<i class="fa fa-times"></i>
			<h3>Oops sorry, something went wrong...<br>Please try again or contact our <a href="mailto:support@edit-place.com">support team</a></h3> 
		</div> -->
		<a class="close-reveal-modal" aria-label="Close">&#215;</a>
	</div>
	<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
/BO/theme/ebooker-report/js/jquery.min.js"></script>
	<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
/BO/theme/ebooker-report/js/foundation.min.js"></script>
	<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
/BO/theme/ebooker-report/js/app.js"></script>	
	<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
/BO/theme/ebooker-report/js/jquery.easing.min.js"></script>
	<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
/BO/theme/ebooker-report/js/jquery.easypiechart.min.js"></script>
	<?php echo '	
	<script>
		$(function() {
			$(\'.chart\').easyPieChart({
				easing: \'easeOutBounce\',
				onStep: function(from, to, percent) {
					$(this.el).find(\'.percent\').text(Math.round(percent));
				}
			});
			var chart = window.chart = $(\'.chart\').data(\'easyPieChart\');
			$(\'.js_update\').on(\'click\', function() {
				chart.update(Math.random()*200-100);
			});
		});
	</script>
	'; ?>


</body>
</html>