<?php /* Smarty version 2.6.19, created on 2015-03-24 12:02:56
         compiled from gebo/seo/broken_url.phtml */ ?>
<form method="POST" name="seo" action="" id="seo" class="form_validation_reg" >
    <div class="span10">

        <h3 class="heading">Broken URL Finder</h3>

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
                    <label class="span3">Enter URL<span class="f_req">*</span></label>
                    <div class="span8 form-inline no-margin-first">
                        <input type="text" name="url" class="span5"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="control-group formSep">
            <div class="row-fluid">
                <div class="span12">
                    <label class="span3">&nbsp;</label>
                    <div class="span8 no-margin-first">
                        <label class="uni-radio"><input type="radio" name="crawl_type" id="crawl_type1" class="uni_style" value="1" >Check all pages linked to given URL</label>
                        <label class="uni-radio"><input type="radio" name="crawl_type" id="crawl_type2" class="uni_style" value="2" >Check all pages of given site</label>
                        <label class="uni-radio"><input type="radio" name="crawl_type" id="crawl_type3" class="uni_style" value="3" checked>Only in given URL</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="row-fluid">
                <div class="span12 form-inline">
                    <button class="btn btn-gebo" name="submit" type="submit">
                        Search
                    </button>
                </div>
            </div>
        </div>
        <div id="data"></div>
    </div>
        <?php echo $this->_tpl_vars['result']; ?>
 
</form>

<?php echo '
<script type="text/javascript">
    $(document).ready(function() {
        $(".uni_style").uniform();
        gebo_validation.reg();
    });

    //* validation
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
                    url : {required : true}
                },
                messages : {
                    url : "Please enter url."
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

    function modalwindow(url) {
        $.get("http://admin-test.edit-place.co.uk/seotool/" + url, function(data) {
            $(".modal-body").html(data);
        });
        $("#seoresults").modal(\'show\');
    }
</script>
'; ?>
