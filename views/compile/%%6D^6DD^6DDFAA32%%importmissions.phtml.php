<?php /* Smarty version 2.6.19, created on 2015-03-02 08:00:12
         compiled from gebo/quotecontractmission/importmissions.phtml */ ?>
<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Import Contracts and Missions</h3>
		 <div class="w-box">
            <div class="w-box-header">Contract</div>
            <div class="row-fluid">
				<form class="form-horizontal" action='/contractmission/read-contract-mission-excel' method="POST" id="upload" enctype="multipart/form-data">
					<div class="control-group topset2">
						<label class="control-label">File:</label>
						<div class="controls">
							<input type="file" name="oldmissionfile" id="oldmissionfile" />
							<span class="help-block errorchange">Upload xlsx or xls only.</span>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<span class="changehtml"><button class="btn btn-primary" type="submit">Submit</button></span>
							<a href="/mission/list-contract?submenuId=ML2-SL26"><button class="btn" type="button">Cancel</button></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php echo '
	<script>
		$(document).ready(function(){
			$("#upload").submit(function(){
			var validExts = new Array(\'.xlsx\',\'.xls\',\'.XLSX\',\'.XLS\');
			var filename = $("#oldmissionfile").val();	
			var fileExt = filename.substring(filename.lastIndexOf(\'.\'));
			if(fileExt=="" || validExts.indexOf(fileExt) < 0)
			{
				$(".errorchange").css(\'color\',\'red\');
				return false;
			}
			else
			{
				$(".errorchange").css(\'color\',\'#595959\');
				$(".changehtml").html(\'Inserting Please Wait...\');
				return true;
			}
			});
		});
	</script>
'; ?>