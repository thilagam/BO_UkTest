<?php /* Smarty version 2.6.19, created on 2015-03-24 12:04:11
         compiled from gebo/seo/seocomparetool.phtml */ ?>

<form class="form_validation_reg" method="POST" action="/seotool/seo-compare-process" name="importcsv" id="seo" ENCTYPE="multipart/form-data">
        <div class="span10">

            <h3 class="heading">Seo compare tool</h3>
                        
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
                    <div class="control-group">
                        <label class="span3 control-label">Input<span class="f_req">*</span></label>
                        <div class="span8 controls">
                            <textarea name="urls" id="txtarea_sp" cols="1" rows="4" class="span10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12">
                        <label class="span3"><span class="error_placement">Options<span class="f_req">*</span></span></label>
                        <label class="uni-checkbox">
                            <input type="checkbox" name="options[]" class="uni_style" value="1">
                            Page analysis
                        </label>
                        <label class="uni-checkbox">
                            <input type="checkbox" name="options[]" class="uni_style" value="2">
                            Head tag elements
                        </label>
                    <label class="span3 no-margin-first">&nbsp;</label>
                        <label class="uni-checkbox">
                            <input type="checkbox" name="options[]" class="uni_style" value="3">
                            Headings
                        </label>
                        <label class="uni-checkbox">
                            <input type="checkbox" name="options[]" class="uni_style" value="4">
                            Keyword usage
                        </label>
                    <label class="span3 no-margin-first">&nbsp;</label>
                        <label class="uni-checkbox">
                            <input type="checkbox" name="options[]" class="uni_style" value="5">
                            Linking structure
                        </label>
                        <label class="uni-checkbox">
                            <input type="checkbox" name="options[]" class="uni_style" value="6">
                            Page text
                        </label>
                    <label class="span3 no-margin-first">&nbsp;</label>
                        <label class="uni-checkbox">
                            <input type="checkbox" name="options[]" class="uni_style" value="7">
                            Source code
                        </label>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <button class="btn btn-gebo" name="submit" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
</form>

<div id="data">
    
</div>

<?php echo '
    <script type="text/javascript">

        $(document).ready(function() {
            $(".uni_style").uniform();
            gebo_validation.reg();
        });

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
                             urls: { required: true }
                    },
                    messages: {
                              urls: "Please enter urls."
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
