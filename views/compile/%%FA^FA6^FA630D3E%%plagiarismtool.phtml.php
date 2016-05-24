<?php /* Smarty version 2.6.19, created on 2015-03-24 12:01:48
         compiled from gebo/seo/plagiarismtool.phtml */ ?>
<form class="form_validation_reg" method="POST" action="/seotool/plagssh2_upload" name="importcsv" id="seo" ENCTYPE="multipart/form-data">
    <div class="span10">

        <h3 class="heading">Plagiarism Tool</h3>

        <div class="control-group formSep" id="seotool-notify" style="display: none;">
            <div class="row-fluid">
                <div class="span12 form-inline">
                    <div id="seo-message">
                        <?php echo $this->_tpl_vars['msg']; ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="control-group formSep">
            <div class="row-fluid">
                <div class="span12 form-inline">
                    <label class="span3">Type </label>
                    <label class="uni-radio">
                        <input type="radio" name="word_type" class="uni_style"  value="1" <?php if ($this->_tpl_vars['word_type'] != '2'): ?> checked <?php endif; ?>>
                        File</label>
                    <label class="uni-radio">
                        <input type="radio" name="word_type" class="uni_style"  value="2" <?php if ($this->_tpl_vars['word_type'] == '2'): ?> checked <?php endif; ?>>
                        Text</label>
                </div>
            </div>
        </div>
        <div class="control-group formSep" id="csv">
            <div class="row-fluid">
                <div class="span12 form-inline">
                    <label class="span3">File (doc,docx,xls,xlsx,txt)<span class="f_req">*</span></label>

                    <div data-provides="fileupload" class="fileupload fileupload-new">
                        <input type="hidden" />
                        <div data-provides="fileupload" class="fileupload fileupload-new">
                            <input type="hidden" />
                            <div class="input-append">
                                <div class="uneditable-input span2">
                                    <i class="icon-file fileupload-exists"></i><span class="fileupload-preview"></span>
                                </div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>
                                    <input name="keyword_file" id="keyword_file" type="file" />
                                </span><a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="control-group formSep" id="text_words" style="display:none">
            <div class="row-fluid">
                <div class="control-group">
                    <label class="span3 control-label">Enter Text<span class="f_req">*</span></label>
                    <div class="span8 controls no-margin-first">
                        <textarea name="kw" id="txtarea_sp" cols="1" rows="4" class="span10"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="row-fluid">
                <div class="span12 form-inline">
                    <button class="btn btn-gebo" name="submit" type="submit">
                        Upload
                    </button>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="row-fluid" id="data">
            </div>
        </div>
    </div>
</form>

<?php echo '
<script type="text/javascript">
	$.validator.addMethod("csvextension", function(value, element, param) {
		param = typeof param === "string" ? param.replace(/,/g, \'|\') : "doc|docx|xls|xlsx|zip|rar|txt";
		return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
	}, $.format("Only doc,docx,xls,xlsx,zip,rar and txt files are accepted."));

	$(document).ready(function() {
		$(".uni_style").uniform();
		gebo_validation.reg();
	});

	$("input[name=\'word_type\']").change(function() {

		var type = $(\'input[name=word_type]:checked\').val();

		if (type == 1) {

			$("#text_lable").hide();

			$("#text_words").hide();

			$("#csv").show();

		} else {

			$("#text_lable").show();

			$("#text_words").show();

			$("#csv").hide();

		}

	});
	function plagres(val){
            var resFile = $(\'#resultFile\').html() ;
            window.open("https://admin-test.edit-place.co.uk/seotool/plagcontents?file="+resFile+"&idx="+val);
        }

	gebo_validation = {
		reg : function() {
			reg_validator = $(\'.form_validation_reg\').validate({
				onkeyup : false,
				errorClass : \'error\',
				validClass : \'valid\',
				highlight : function(element) {
					$(element).closest(\'div\').addClass("f_error");
					$(element).closest(\'div\').css("color", "black");
				},
				unhighlight : function(element) {
					$(element).closest(\'div\').removeClass("f_error");
				},
				submitHandler : function(element) {
					$(\'#seotool-notify\').show();
				},
				errorPlacement : function(error, element) {
					$(\'#seotool-notify\').hide();
					$(element).closest(\'div\').append(error);
					$(\'.error\').css("font-size", "10px");
					$(\'.error\').css("padding-top", "5px");
				},
				rules : {
					kw : {
						required : function(element) {
							return $(\'input:radio[name=word_type]:checked\').val() == 2;
						}
					},
					keyword_file : {
						required : function(element) {
							return $(\'input:radio[name=word_type]:checked\').val() == 1;
						},
				 		csvextension: "doc|docx|xls|xlsx|zip|rar|txt"
					}
				},
				messages : {
					kw : "Please enter text.",
					keyword_file : {required: "Please select (doc,docx,xls,xlsx,txt) file.", accept: "Only doc,docx,xls,xlsx,zip,rar and txt files are accepted."}
				},
				invalidHandler : function(form, validator) {
					$.sticky("There are some errors. Please corect them and submit again.", {
						autoclose : 5000,
						position : "top-center",
						type : "st-error"
					});
				}
			})
		}
	}; 
</script>
'; ?>
