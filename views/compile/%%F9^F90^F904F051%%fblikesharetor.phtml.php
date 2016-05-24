<?php /* Smarty version 2.6.19, created on 2015-03-24 12:03:41
         compiled from gebo/seo/fblikesharetor.phtml */ ?>

<form class="form_validation_reg" method="POST" action="/fblikeshare/torprocess" id="seo" ENCTYPE="multipart/form-data">
        <div class="span10">

            <h3 class="heading">Facebook like/share count</h3>
                        
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
                        <label class="span3 control-label">Enter URL(s)<span class="f_req">*</span></label>
                        <div class="span8 controls">
                            <textarea name="url" id="txtarea_sp" cols="1" rows="4" class="span10"><?php echo $this->_tpl_vars['url']; ?>
</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12">
                        <label class="span3">&nbsp;</label>
                        <div class="span8 no-margin-first">
                            <label class="uni-radio"><input type="radio" name="crawl_type" class="uni_style" id="crawl_type1" value="1" <?php echo $this->_tpl_vars['checked1']; ?>
>Check all pages linked to given URL</label>
                            <label class="uni-radio"><input type="radio" name="crawl_type" class="uni_style" id="crawl_type2" value="2" <?php echo $this->_tpl_vars['checked2']; ?>
>Check all pages of given site</label>
                            <label class="uni-radio"><input type="radio" name="crawl_type" class="uni_style" id="crawl_type3" value="3" <?php echo $this->_tpl_vars['checked3']; ?>
>Only in given URL</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <label class="span3">&nbsp;</label>
                    <div class="span8 no-margin-first">
                        <label class="uni-checkbox">
                            <input type="checkbox" name="titlescraper" id="titlescraper" class="uni_style" value="1">
                            Title scraper
                        </label>
                        <label class="sub_chkbox_sep"></label>
                        <label class="uni-checkbox" id="title">
                            <input type="checkbox" name="kwdensity" id="kwdensity" class="uni_style" value="1">
                            kw density
                        </label>
                    </div>
                    <div class="span12" id="fr">
                        <label class="span3">&nbsp;</label>
                        <span class="help-block syntax">Limit</span>
                         <select name="limit" id="chosen_c" class="chzn_c">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                         </select>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <label class="span3">&nbsp;</label>
                    <div class="span8 no-margin-first">
                        <label class="uni-checkbox">
                            <input type="checkbox" name="fbtwittercount" id="fbtwittercount" class="uni_style" value="1">
                            facebook/twitter count
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
            <div class="control-group">
                <div class="row-fluid" id="data">
                </div>
            </div>
        </div>
</form>

<?php echo '
    <script type="text/javascript">
        $(document).ready(function() {
            $(".uni_style").uniform();
            gebo_validation.reg();
    	    gebo_chosen.init();
        });
	gebo_chosen = {
            init: function(){
                $(".chzn_c").chosen({
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
                             url: { required: true }
                    },
                    messages: {
                              url: "Please enter url(s)."
                    },
                    invalidHandler: function(form, validator) {
                        $.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
                    }
                })
            }
        };

        $("input[name=\'kwdensity\']").change(function() {
            var type=$(\'input[name=kwdensity]:checked\').val();
            if(type==1) {$("#fr").show();} else {$("#fr").hide();}
        });

        $("input[name=\'titlescraper\']").change(function() {
            var titlescraper=$(\'input[name=titlescraper]:checked\').val();
            if(titlescraper==1) {$("#title").show();} else {$("#title").hide();}
        });
    </script>
'; ?>
