<?php /* Smarty version 2.6.19, created on 2015-05-05 10:34:49
         compiled from gebo/user/uploadwhitebook.phtml */ ?>
<div class="row-fluid">
		<div class="span12">	
			<form action="/user/whitebook-download?submenuId=ML10-SL9" name="uploadform" method="POST" enctype="multipart/form-data" class="form-horizontal form_validation_ttip">	
				<fieldset>		
					<div class="control-group formSep">
						<label class="control-label"><strong>Upload pdf</strong></label>
						<div class="controls">
							<div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
								<span class="btn btn-file"><span class="fileupload-new">Upload</span><span class="fileupload-exists">Change</span>
								<input type="file" name="uploadwb" id="uploadwb"/></span>
								<span class="fileupload-preview"></span>
								<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>
							</div>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-gebo" type="submit" name="submitwb" value="submitwb" >Submit</button>
						</div>
					</div>
				</fieldset>	
		</form>
	</div>
</div>