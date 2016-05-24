<?php /* Smarty version 2.6.19, created on 2015-03-04 13:33:14
         compiled from gebo/user/profile_image_crop.phtml */ ?>
<?php echo '
	<script language="Javascript">
		$(function(){
			$("#saveimage,#original,#cancel").click(function(){
					var id_name=$(this).attr("id");
					$("#function").val(id_name);
					if(id_name=="cancel")
					{
                        $(\'#cropimagepopup\').modal(\'hide\');
                        return false;
					}
					else if((checkCoords() && id_name=="saveimage") || id_name=="original"  )
					{
						$.post("/user/cropprofilepic", $("#crop_form").serialize(),
							function(data) {
								//alert(data);
								var obj = $.parseJSON(data);
								var approot="http://admin-test.edit-place.co.uk/FO/";
								var profilepic=approot+obj.path+"logo."+obj.ext+ \'?\' + (new Date()).getTime();
								$("#profilepic").attr("src",profilepic);
                                $("#userpic").attr("src",profilepic);
                                $("#cropbox").attr(\'src\',\'#\');
								$(".jcrop-holder").remove();
								$("#cropbox").show();
								$("#cropbox").removeData(\'Jcrop\');
                                $(\'#cropimagepopup\').modal(\'hide\');
					   });
					}
					$(\'html, body\').animate( { scrollTop: 100 }, \'slow\' );
			});
		});	
			function updateCoords(c)
			{
				$(\'#x\').val(c.x);
				$(\'#y\').val(c.y);
				$(\'#w\').val(c.w);
				$(\'#h\').val(c.h);
			};
			function checkCoords()
			{
				if (parseInt($(\'#w\').val())) return true;
				alert(\'Please select a crop region then press submit.\');
				return false;
			};
		</script>
'; ?>

	<!-- Overlay brief client  -->
		<p>
			Vous pouvez redimensionner votre  photo/logo/image. La taille de l'image qui apparaitra sur votre profil se  trouve dans le carr&eacute; &eacute;clair&eacute; que nous vous proposons par d&eacute;faut. Appuyez sur &quot;enregistrer&quot;  une fois que vous avez redimensionn&eacute; votre image.
		</p>	
		<!--<hr>-->
		<div class="alert alert-error" ><div style="padding-left: 50px;"><img src="#" id="cropbox"></div></div>

		<!-- This is the form that our event handler fills -->
		<form action="" method="post" id="crop_form">
            <input type="hidden" id="userId" name="userId" value="<?php echo $_GET['userId']; ?>
" />
			<input type="hidden" id="function" name="function" value="saveimage"/>
			<input type="hidden" id="x" name="x" value="50"/>
			<input type="hidden" id="y" name="y" value="100"/>
			<input type="hidden" id="w" name="w" value="100"/>
			<input type="hidden" id="h" name="h" value="100"/>
            <div style="float:left;text-align:center; margin-left:170px;padding:15px;">
                <button type="button" class="btn btn-success" name="Enregistrer" id="saveimage" >ENREGISTRER</button>
                <button class="btn btn-danger"  name="cancel" id="cancel">Annuler</button>
            </div>
		</form>