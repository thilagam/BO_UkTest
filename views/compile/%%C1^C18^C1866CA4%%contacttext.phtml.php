<?php /* Smarty version 2.6.19, created on 2015-09-24 09:52:57
         compiled from gebo/template/contacttext.phtml */ ?>
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
		<div class="alert alert-warning" align="center"><b>Contact text</b></div>
		<form  action="/template/contacttext?submenuId=ML4-SL16" method="post" id="contform" name="contform">	
				<table cellpadding="4" cellspacing="4" align="center" width=100%>
					<tr ><td>&nbsp;</td></tr>
					<tr valign="top">
						<td width="10%"><b>Text :</b></td>
						<td><span><textarea name="content" id="content" class="span6 auto_expand" rows="5"><?php echo $this->_tpl_vars['contacttext']; ?>
</textarea></span></td>
					</tr>
					<tr>
						<td></td>
						<td>	
							<input type="submit" id="contact_submit" name="contact_submit" value="Save" class="btn btn-info"/>
							<!--<a href="/template/cgu?submenuId=ML4-SL14" class="btn btn-danger">Clear</a>--> 
						</td>
					</tr>
				</table>		
		</form>
	</div>
</div>