<?php /* Smarty version 2.6.19, created on 2016-03-31 08:55:47
         compiled from gebo/template/cgu.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_decode', 'gebo/template/cgu.phtml', 39, false),)), $this); ?>
<?php echo '
<script src="/BO/theme/gebo/lib/tinymce_4.2.5/js/tinymce/tinymce.min.js"></script>

<script type="text/javascript" >
$(document).ready(function() {
tinymce.init({
			selector: "textarea#content",
			theme: "modern",
			plugins: [
				 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				 "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   content_css: "css/content.css",
		   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
		   style_formats: [
				{title: \'Bold text\', inline: \'b\'},
				{title: \'Red text\', inline: \'span\', styles: {color: \'#ff0000\'}},
				{title: \'Red header\', block: \'h1\', styles: {color: \'#ff0000\'}},
				{title: \'Example 1\', inline: \'span\', classes: \'example1\'},
				{title: \'Example 2\', inline: \'span\', classes: \'example2\'},
				{title: \'Table styles\'},
				{title: \'Table row 1\', selector: \'tr\', classes: \'tablerow1\'}
			]
		 }); 
} );
</script>
'; ?>



<div class="row-fluid" align="center">
	<div class="span7" align="center" style="float:none !important;">
		<div class="alert alert-warning" align="center"><b>CGU</b></div>
		<form  action="/template/cgu?submenuId=ML4-SL14" method="post" id="cguform" name="cguform">	
				<table cellpadding="4" cellspacing="4" align="center" width=100%>
					<tr ><td>&nbsp;</td></tr>
					<tr valign="top">
						<td width="12%"><b>Title :</b></td>
						<td><span><input type="text" id="title" name="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cgutitle'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
" class="span9 validate[required]"/></span></td>
					</tr>
					<tr valign="top">
						<td><b>Content :</b></td>
						<td><span><textarea name="content" id="content" class="span6 auto_expand" rows="35"><?php echo $this->_tpl_vars['cgucontent']; ?>
</textarea></span></td>
					</tr>
					<tr>
						<td></td>
						<td>	
							<input type="submit" id="cgu_submit" name="cgu_submit" value="Save" class="btn btn-info"/>
							<!--<a href="/template/cgu?submenuId=ML4-SL14" class="btn btn-danger">Clear</a>--> 
						</td>
					</tr>
				</table>		
		</form>
	</div>
</div>