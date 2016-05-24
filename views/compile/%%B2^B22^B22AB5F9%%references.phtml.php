<?php /* Smarty version 2.6.19, created on 2016-03-31 08:54:22
         compiled from gebo/template/references.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/template/references.phtml', 116, false),array('modifier', 'ucfirst', 'gebo/template/references.phtml', 118, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-fr.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/ajaxupload.3.5.js"></script>
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/jQuery.fileinput.js"></script>
<script type="text/javascript" charset="utf-8" src="/BO/theme/gebo/js/jquery.Jcrop.min.js"></script>
<link rel="stylesheet" href="/BO/theme/gebo/css/jquery.Jcrop.css" />
<script type="text/javascript" >
$(document).ready(function() {
		$("#referenceform").validationEngine({prettySelect : true,useSuffix: "_chzn"});
      $(\'#our_references\').dataTable({
                "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"sPaginationType": "bootstrap",
				"aaSorting": [[ 1, "asc" ]],
					"aoColumns": [
						{ "sType": "formatted-num" },
						{ "sType": "string" },
						{ "sType": "string" },
						{ "sType": "eu_date" },
						{ "sType": "string" },
						{ "sType": "html" }
					],
					"aaSorting": [[ 0, "asc" ]],
                });
});

$(function(){
        var btnUpload=$(\'#referencelogo\');
        new AjaxUpload(btnUpload, {
            action: \'uploadpartnerpic\',
            name: \'uploadpic\',
            data:{from:\'reference\'},
            onSubmit: function(file, ext){   //  alert(userid);
                if (! (ext && /^(jpg|jpeg|gif|png)$/.test(ext))){
                    // extension is not allowed
                    $(\'#file_nameprofile\').text("Merci d\'uploaded uniquement des fichiers JPG.").css(\'color\',\'#FF0000\');
                    return false;
                }

                $(\'#file_nameprofile\').html(\'<div align="right"><img src="http://ep-test.edit-place.co.uk/FO/images/loading-b.gif" /></div>\') ;
            },
            onComplete: function(file, response){ 
                //On completion clear the status
                $(\'#file_nameprofile\').text(\'\');
                $(\'#file_nameprofile\').html(\'\');
                //Add uploaded file to list
                var obj = $.parseJSON(response);
                var approot="http://ep-test.edit-place.co.uk/FO/";
                if(obj.status=="success"){
                    $("#cropbox").attr(\'src\',\'#\');
                    $(".jcrop-holder").remove();
                    $("#cropbox").removeData(\'Jcrop\');
                    $("#cropbox").attr("src",approot+obj.path+ \'?\' + (new Date()).getTime());

                    $("#cropbox").show();
                    $(\'#cropbox\').Jcrop({
                        aspectRatio: 2,
                        addClass: \'jcrop-dark\',
                        setSelect: [ 60, 110, 150, 200 ],
						minSize:[245,35],
                        onSelect: updateCoords
                    });
                    $("#identy").val(obj.identifier); 
					$("#from").val(\'reference\'); 
						var logo="ReferenceLogo_"+obj.identifier+".jpg";
                    $("#logoname").val(logo);  
                    $(\'#cropimagepopup\').modal(\'show\');
                    /*if(file.length>25)
                        $(\'#file_name\'+type).html(file.substr(0,25)+".. Uploaded").css(\'color\',\'#006600\');
                    else
                        $(\'#file_name\'+type).html(file+" Uploaded").css(\'color\',\'#006600\');*/
                }
                else if(obj.status=="smallfile"){
                    $(\'#file_nameprofile\').html("L\'image est trop petite, merci d\'en uploader une autre").css(\'color\',\'#FF0000\');
                }
                else{
                    $(\'#file_nameprofile\').html(\'Error in upload\').css(\'color\',\'#FF0000\');
                }
            }
        });
        jQuery(\'img\').each(function(){
            jQuery(this).attr(\'src\',jQuery(this).attr(\'src\')+ \'?\' + (new Date()).getTime());
        });
    });
	
function clearform()
	{
		$("#name").val("");
		$("#website").val("");
		$("#description").val("");
		$("#status").val("");
	}		
	   
</script>
'; ?>

<div class="row-fluid">
	<div class="span13">
		<div class="alert alert-warning" align="center"><b>OUR REFERENCES</b></div>
		<br/>
		<div class="span5">
			<table class="table table-bordered table-striped table_vam" id="our_references" >
				<thead>
					<tr>
						<th>ID N&deg;</th>
						<th>Name</th>
						<th>Logo</th>
						<th>Status</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php $_from = $this->_tpl_vars['referencelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['refer_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['refer_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['refer_item']):
        $this->_foreach['refer_loop']['iteration']++;
?>
					  <tr>
						   <td><?php echo ($this->_foreach['refer_loop']['iteration']-1)+1; ?>
</td>
						   <td style="text-align:left"><?php echo ((is_array($_tmp=$this->_tpl_vars['refer_item']['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
						   <td style="text-align:left"><img src="http://ep-test.edit-place.co.uk/FO/images/logos/references/<?php echo $this->_tpl_vars['refer_item']['logoname']; ?>
" width="30" height="20" /></td>
						   <td style="text-align:left"><?php echo ((is_array($_tmp=$this->_tpl_vars['refer_item']['status'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</td>
						   <td>
								<a href="/template/references?submenuId=ML4-SL13&act=edit&id=<?php echo $this->_tpl_vars['refer_item']['id']; ?>
"><i class="splashy-application_windows_edit"></i></a>
						   </td>
					  </tr>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>
			</table>
		</div>
		
		<div class="span6">
			<form  action="/template/references?submenuId=ML4-SL13" method="post" id="referenceform" name="referenceform" enctype="multipart/form-data">	
				<a href="/template/references?submenuId=ML4-SL13" class="btn btn-warning" style="float:right">Add New</a> 
				<h4 align="center">Add Reference</h4>
				<table cellpadding="4" cellspacing="4" align="center" width=100%>
					<tr ><td>&nbsp;</td></tr>
					<tr valign="top">
						<td><b>Name :</b></td>
						<td><span><input type="text" id="name" name="name" value="<?php echo $this->_tpl_vars['editreference'][0]['name']; ?>
" class="span9 validate[required]"/></span></td>
					</tr>
					
					<tr valign="top">
						<td><b>Logo :</b></td>
						<td>
							<div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
								<span class="btn btn-file"><span class="fileupload-new">Select file</span>
								<span class="fileupload-exists">Change</span>
									<input type="file" name="referencelogo" id="referencelogo" value="clogo"/>
								</span>
								<span class="fileupload-preview"></span>
									<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
								<div id="file_nameprofile"></div>
								<label style="color:red">( Upload logo with minimum dimension 150 x 30 for better display )</label>
							</div>
							
								<img <?php if ($_GET['act'] == 'edit'): ?>src="http://ep-test.edit-place.co.uk/FO/images/logos/references/<?php echo $this->_tpl_vars['editreference'][0]['logoname']; ?>
"  <?php else: ?>style="display:none;"<?php endif; ?> id="plogo" width="30" height="20" />
						
						</td>
					</tr>
					<tr valign="top">
						<td><b>Website :</b></td>
						<td><span><input type="text" id="website" name="website" value="<?php echo $this->_tpl_vars['editreference'][0]['website']; ?>
" class="span9 validate[required]" placeholder="www.example.com"/></span></td>
					</tr>
					<tr valign="top">
						<td><b>Description :</b></td>
						<td><span><textarea name="description" id="description" class="span9 auto_expand validate[required]"><?php echo $this->_tpl_vars['editreference'][0]['description']; ?>
</textarea></span></td>
					</tr>
					<tr valign="top">
						<td><b>Status :</b></td>
						<td>
							<select name="status" id="status">
								<option value="active" <?php if ($this->_tpl_vars['editreference'][0]['status'] == 'active'): ?>selected<?php endif; ?>>Active</option>
								<option value="inactive" <?php if ($this->_tpl_vars['editreference'][0]['status'] == 'inactive'): ?>selected<?php endif; ?>>Inactive</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>	
							<input type="hidden" id="logoname" name="logoname" value="<?php echo $this->_tpl_vars['editpartner'][0]['logoname']; ?>
">
							<input type="hidden" id="referenceid" name="referenceid" value="<?php echo $this->_tpl_vars['editreference'][0]['id']; ?>
">
							<input type="submit" id="reference_submit" name="reference_submit" value="Save" class="btn btn-info"/>
							<a href="javascript:void(0);" class="btn btn-danger" onclick="clearform();";>Clear</a> 
						</td>
					</tr>
				</table>		
			</form>
		</div>
	</div>
</div>

<!--///when republish the popup comes for edit details and mail for republish article///-->
<div class="modal hide fade" id="cropimagepopup">
    <div class="modal-header">
        <button class="close" onclick="closePopup('cropimagepopup');">&times;</button>
        <h3>Crop logo</h3>
    </div>
    <div class="modal-body alignright">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gebo/template/logo_crop.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <div class="modal-footer">
    </div>
</div>