<?php /* Smarty version 2.6.19, created on 2014-11-20 14:55:36
         compiled from gebo/ao/clientprofileupdate.phtml */ ?>
<?php echo '
	<script>		 
		$(function(){		 
			var clientid=$("#client").val();		
			$("#clientlogo").attr("src","http://ep-test.edit-place.co.uk/FO/profiles/clients/logos/"+clientid+"/"+clientid+"_global.png?" + (new Date()).getTime()); 
			var btnUpload=$(\'#fileupload\');   
			var status=$(\'#pic_err\');   
				new AjaxUpload(btnUpload, {  
					action: \'uploadclientgloballogo\', 
					name: \'uploadfile\', 
					data:{clientid:clientid},
						onSubmit: function(file, ext){ 
							if (! (ext && /^(jpg|jpeg|png|gif)$/.test(ext))){    
							// extension is not allowed   
							status.text(\'Only JPG, GIF or PNG files are allowed\').css(\'color\',\'#FF0000\');   
							return false;    
							}               
							status.html(\'<div align="center"><img src="/FO/images/loading-b.gif" /></div>\') ;
						},       
						onComplete: function(file, response){ //alert(file);
						//On completion clear the status 
							status.text(\'\');    
							$(\'#pic_err\').html(\'\');
							//Add uploaded file to list  
							var obj = $.parseJSON(response);
							var approot="http://ep-test.edit-place.co.uk/FO/";   
							if(obj.status=="success"){             
							var profilepic=approot+obj.path+obj.identifier+"_global."+obj.ext+ \'?\' + (new Date()).getTime();                           
								$("#clientlogo").attr("src",profilepic);			
								alert("Logo has been uploaded");                
							}              
							else if(obj.status=="smallfile"){      
								$(\'#pic_err\').html("Error in upload, image too small. L\\\'image est trop petite, merci d\\\'en uploader une autre.").css(\'color\',\'#FF0000\');   
							}                
							else{               
								$(\'#pic_err\').html(\'Error in upload\').css(\'color\',\'#FF0000\');           
							}           
						}       
				});		
			jQuery(\'img\').each(function(){		
				jQuery(this).attr(\'src\',jQuery(this).attr(\'src\')+ \'?\' + (new Date()).getTime());	
			});	   
		}) ;      
				
		function validateprofilepop()		
		{			
			var clientid=$("#client").val();	
			var cname=$("#company_name1").val();		
			if(cname=="")		
			{				
				$(\'#cname_err\').html(\'<nobr>Please enter company name</nobr>\');		
				return false;			
			}			
			else			
			{				
				$.ajax({				
					url: "/ao/checkclientprofile",			
					global: false,				
					type: "POST",			
					data: ({client : clientid}),			
					dataType: "html",				
					async:false,				
					success: function(msg){				
						if ($.trim(msg) == "yes") {					
							document.profileform.submit();				
							return true;				
						}					
						else if ($.trim(msg) == "no")				
						{						
							$(\'#pic_err\').html(\'<nobr>Please add profile pic</nobr>\');	
							return false;					
						}					
						else						
							return false;				
					}				
				});			
			}		
		}				
				function closeModal()       
				{          
					$(\'#profileupdate\').hide();      
					$(\'#fadeblock\').hide();       
				}		
	</script>
'; ?>


<form action="/ao/ao-create1?submenuId=ML2-SL3&profilesave=1" name="profileform" method="POST" >	
	<table cellpadding="4" cellspacing="2" align="center">		
		<tr>			
			<td valign="top">Logo</td>		
			<td>			
				<div id="fileupload">					
					<span class="btn btn-file">					
						<span class="fileupload-new">Select image</span>		
						<input type="file" name="picfile" id="picfile"/>				
					</span>	              
					<img src="http://ep-test.edit-place.co.uk/FO/profiles/clients/logos/<?php echo $this->_tpl_vars['clientdetail'][0]['identifier']; ?>
/<?php echo $this->_tpl_vars['clientdetail'][0]['identifier']; ?>
_global.png" border="0" id="clientlogo" style="float:right;"/>				<div id="pic_err" style="color:red;">&nbsp;</div>			
				</div>			
			</td>		
		</tr>		
	<tr>		
		<td valign="top">Name client</td>			
		<td>				
			<input type="text" id="company_name1" name="company_name" value="<?php echo $this->_tpl_vars['clientdetail'][0]['company_name']; ?>
" size="42" />			
			<div id="cname_err" style="color:red;">&nbsp;</div>		
		</td>		
	</tr>		
	<tr>		
		<td></td>		
		<td>				
			<button type="button" id="submit_pop_edit" name="submit_pop_edit" value="Update" class="btn btn-success" onClick="return validateprofilepop();">Update</button>			
		</td>		
	</tr>
	</table>		
	<input type="hidden" name="client" id="client" value="<?php echo $this->_tpl_vars['clientdetail'][0]['identifier']; ?>
" />
</form>