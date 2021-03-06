<?php /* Smarty version 2.6.19, created on 2015-03-24 12:01:59
         compiled from gebo/seo/googlenews.phtml */ ?>

<form class="form_validation_reg" method="POST" action="/seotool/gnewsssh2_upload" name="importcsv" id="seo" ENCTYPE="multipart/form-data">
        <div class="span10">

            <h3 class="heading">Google News Suggestion Tool</h3>
                        
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
                        <label class="uni-radio"><input type="radio" name="word_type" class="uni_style"  value="1" <?php if ($this->_tpl_vars['word_type'] != '2'): ?> checked <?php endif; ?> id="csvxls">CSV / XLS</label>
                            <label class="uni-radio"><input type="radio" name="word_type" class="uni_style"  value="2" <?php if ($this->_tpl_vars['word_type'] == '2'): ?> checked <?php endif; ?> id="opt_text">Text</label>
                    </div>
                </div>
            </div>
            <div class="control-group formSep" id="csv" <?php if ($this->_tpl_vars['word_type'] == '2'): ?> style="display:none" <?php endif; ?>>
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">Keywords<span class="f_req">*</span></label>
                        
                        <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" />
                            <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" />
                                <div class="input-append">
                                    <div class="uneditable-input span2"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input name="keyword_file" id="keyword_file" type="file" /></span><a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep" id="text_words" <?php if ($this->_tpl_vars['word_type'] != '2'): ?> style="display:none"<?php endif; ?> >
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="span3 control-label">Keywords<span class="f_req">*</span></label>
                        <div class="span8 controls">
                            <textarea name="kw" id="txtarea_sp" cols="1" rows="4" class="span10"><?php echo $this->_tpl_vars['kw']; ?>
</textarea>
                            <span class="help-block">Enter Multiple keywords in separate line</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3"><span class="error_placement">Site</label>
                        <select name="site" id="chosen_a" class="chzn_a span3">
                            <option value="1">google.fr</option>
                            <option value="2">google.com</option>
                            <option value="3">google.pt</option>
                            <option value="4">google.co.in</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">key word suggestions  limit</label>
                         <select name="limit" id="chosen_b" class="chzn_b span3">
                            <option value="1">1</option>
                            <option value="3">3</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                         </select>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">Output</label>
                        <label class="uni-radio"><input type="radio" name="op_type" class="uni_style"  value="1" checked>csv</label>
                        <label class="uni-radio"><input type="radio" name="op_type" class="uni_style"  value="2">xls</label>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <button class="btn btn-gebo" name="submit" type="submit">Upload</button>
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
            //* validation with tooltips
            //gebo_validation.ttip();
            //* regular validation
            gebo_validation.reg();
            gebo_chosen.init();
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
        gebo_chosen = {
            init: function(){
                $(".chzn_a").chosen({
                    allow_single_deselect: true,
                    disable_search: true
                });
                $(".chzn_b").chosen({
                    allow_single_deselect: true,
                    disable_search: true
                });
            }
        };
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
                               kw: {required: function(element) {
                                  return $(\'input:radio[name=word_type]:checked\').val()==2;
                                 }
                              },
                     keyword_file: {required: function(element) {
                                  return $(\'input:radio[name=word_type]:checked\').val()==1;
                                 },
				 csvextension: "xls|csv"
                              }
                    },
                    messages: {
                              kw: "Please enter keyword(s).",
                    keyword_file: {required: "Please selects csv/xls file.", accept: "Accept only xls or csv."}
                    },
                    invalidHandler: function(form, validator) {
                        $.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
                    }
                })
            }
        };
        function modalwindow(url)
        {
            $.get( "http://admin-test.edit-place.co.uk/seotool/"+url, function( data ) {
              $( ".modal-body" ).html( data );
            });
            $("#seoresults").modal(\'show\');
        }
    </script>
'; ?>
