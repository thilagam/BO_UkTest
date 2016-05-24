<?php /* Smarty version 2.6.19, created on 2015-03-24 12:02:22
         compiled from gebo/seo/scraper_linode.phtml */ ?>
<form class="form_validation_reg" method="POST" action="/seotool/keywordscraper" name="importcsv" id="seo" ENCTYPE="multipart/form-data">
        <div class="span10">

            <h3 class="heading">WEBSITE SCRAPER TOOL</h3>
                        
            <div class="control-group formSep" id="seotool-notify" style="display: none;">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                            <div id="seo-message"><?php echo $this->_tpl_vars['msg']; ?>
</div>
                    </div>
                </div>
            </div>    
            
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">Type </label>
                        <label class="uni-radio"><input type="radio" name="word_type" class="uni_style"  value="1" <?php if ($this->_tpl_vars['word_type'] != '2'): ?> checked <?php endif; ?> id="csvxls">File</label>
                        <label class="uni-radio"><input type="radio" name="word_type" class="uni_style"  value="2" <?php if ($this->_tpl_vars['word_type'] == '2'): ?> checked <?php endif; ?> id="opt_text">Text</label>
                    </div>
                </div>
            </div>
            <div class="control-group formSep" id="csv" <?php if ($this->_tpl_vars['word_type'] == '2'): ?> style="display:none" <?php endif; ?>>
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">Url(s)<span class="f_req">*</span></label>
                        
                        <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" />
                            <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" />
                                <div class="input-append">
                                    <div class="uneditable-input span2"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input name="url_file" id="url_file" type="file" /></span><a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep" id="text_words" <?php if ($this->_tpl_vars['word_type'] != '2'): ?> style="display:none"<?php endif; ?> >
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="span3 control-label">Url(s)<span class="f_req">*</span></label>
                        <div class="span8 controls">
                            <textarea name="url" id="txtarea_sp" cols="1" rows="4" class="span10"><?php echo $this->_tpl_vars['url']; ?>
</textarea>
                            <span class="help-block">Enter Multiple urls in separate line</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3"><span class="error_placement">SELECT OPTIONS 1</label>
                        <label class="uni-radio"><input type="radio" name="crawl_type" class="uni_style"  value="2" <?php if ($this->_tpl_vars['crawl_type'] == '2'): ?> checked <?php endif; ?>>Check all pages linked to given URL</label>
                        <label class="uni-radio"><input type="radio" name="crawl_type" class="uni_style"  value="3" <?php if ($this->_tpl_vars['crawl_type'] == '3'): ?> checked <?php endif; ?>>Check all pages of given site</label>
                        <label class="uni-radio"><input type="radio" name="crawl_type" class="uni_style"  value="1" <?php if ($this->_tpl_vars['crawl_type'] == '1'): ?> checked <?php endif; ?>>Only in given URL</label>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">SELECT OPTIONS 2</label>
                        <label class="uni-checkbox">
                            <input type="checkbox" name="content_type[]" class="uni_style" value="title">
                            Title of each page
                        </label>
                        <label class="uni-checkbox">
                            <input type="checkbox" name="content_type[]" class="uni_style" value="suggestion">
                            Content of each page
                        </label>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">MAX EXEC TIME</label>
                        <div class="span8 form-inline no-margin-first">
                            <input type="text" name="exectime" class="span5" value="0" />
                            <span class="help-inline">Mins</span>
                            <label class="uni-radio"><input type="radio" name="exectimelimit" class="uni_style" value="url">On each Primary URL</label>
                            <label class="uni-radio"><input type="radio" name="exectimelimit" class="uni_style" value="site" checked>On entire request</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">MAX PAGES TO BE CRAWLED</label>
                        <div class="span8 form-inline no-margin-first">
                            <input type="text" name="crawlcount" class="span5" value="0" />
                            <span class="help-inline">Pages</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">Output</label>
                        <label class="uni-radio"><input type="radio" name="op_type" class="uni_style"  value="2" checked>xls</label>
                        <label class="uni-radio"><input type="radio" name="op_type" class="uni_style"  value="1">csv</label>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <button class="btn btn-gebo" name="submit" type="submit">Process</button>
                    </div>
                </div>
            </div>
        </div>
</form>

<div id="data">
    
</div>

<?php echo ' 
    <script type="text/javascript">
	$.validator.addMethod("csvextension", function(value, element, param) {
		param = typeof param === "string" ? param.replace(/,/g, \'|\') : "xls|csv";
		return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
	}, $.format("Please use only csv/xls file."));

        $(document).ready(function() {
            $(".uni_style").uniform();
            gebo_validation.reg();
        });
        $("input[name=\'word_type\']").change(function() {
            var type=$(\'input[name=word_type]:checked\').val();
            if(type==1)
            {
                $("#text_words").hide();
                $("#csv").show();
            }
            else
            {
                $("#text_words").show();
                $("#csv").hide();
            }
        });
        
        //* validation
        gebo_validation = {
            reg: function() {
                reg_validator = $(\'.form_validation_reg\').validate({
                    onkeyup: false,
                    errorClass: \'error\',
                    validClass: \'valid\',
                    highlight: function(element) {
                        $(element).closest(\'div\').addClass("f_error");
                        $(element).closest(\'div\').css("color", "black");
                    },
                    unhighlight: function(element) {
                        $(element).closest(\'div\').removeClass("f_error");
                    },
                    submitHandler: function(element) {
                        $(\'#seotool-notify\').show();
                    },
                    errorPlacement: function(error, element) {
                        $(\'#seotool-notify\').hide();
                        $(element).closest(\'div\').append(error);
                        $(\'.error\').css("font-size", "10px");
                        $(\'.error\').css("padding-top", "5px");
                    },
                    rules: {
                               url: {required: function(element) {
                                  return $(\'input:radio[name=word_type]:checked\').val()==2;
                                 }
                              },
                          url_file: {required: function(element) {
                                  return $(\'input:radio[name=word_type]:checked\').val()==1;
                                 },
				 csvextension: "xls|csv"
                          },
                        crawl_type: { required: true },
                  \'content_type[]\': { required: true }
                    },
                    messages: {
                               url: "Please enter url(s).",
                          url_file: {required: "Please select csv/xls file.", accept: "Accept only xls or csv."},
                        crawl_type: "Please select option1.",
                  \'content_type[]\': "Please select option2."
                    },
                    invalidHandler: function(form, validator) {
                        $.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
                    }
                })
            }
        };
    </script>
'; ?>
