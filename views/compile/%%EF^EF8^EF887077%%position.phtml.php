<?php /* Smarty version 2.6.19, created on 2014-12-08 13:35:14
         compiled from gebo/seo/position.phtml */ ?>
<form class="form_validation_reg" method="POST" action="/seotool/posssh2_upload" name="importcsv" id="seo" ENCTYPE="multipart/form-data">
        <div class="span10">

            <h3 class="heading">Positioning Tool</h3>
                        
            <div class="control-group formSep" id="seotool-notify" style="display: none;">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                            <div id="seo-message"><?php echo $this->_tpl_vars['msg']; ?>
</div>
                    </div>
                </div>
            </div>    
            
            <div class="control-group formSep" id="clientRow">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3"><span class="error_placement">Client</span></label>
                        <select name="client" id="client" class="chzn_a" data-placeholder="S&eacute;lectionner">                            
                            <!--<option value=""></option>-->
							<?php $_from = $this->_tpl_vars['client_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['client']):
?>
                                <?php if ($this->_tpl_vars['client']['identifier'] == $this->_tpl_vars['def_user']): ?>
                                <option value="<?php echo $this->_tpl_vars['client']['identifier']; ?>
" selected><?php echo $this->_tpl_vars['client']['name']; ?>
</option>
                                <?php else: ?>
                                <option value="<?php echo $this->_tpl_vars['client']['identifier']; ?>
"><?php echo $this->_tpl_vars['client']['name']; ?>
</option>
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>   
                    </div>
                </div>
            </div>
            <div class="control-group formSep" id="title">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">Title<span class="f_req">*</span></label>
                        <div class="span8 form-inline no-margin-first">
                            <input type="text" name="title" class="span5"/>
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
                        <label class="span3">URL & Keywords<span class="f_req">*</span></label>
                        <span class="help-block syntax">Syntax : <span id="load_syntax_file">url;kw</span></span>
                        
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
                        <label class="span3 control-label">URL & Keywords<span class="f_req">*</span></label>
                        <div class="span8 controls">
                            <span class="help-block syntax">Syntax : <span id="load_syntax_text">url;kw</span></span>
                            <textarea name="kw" id="txtarea_sp" cols="1" rows="4" class="span10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3"><span class="error_placement">Site</label>
                        <select name="site" id="chosen_b" class="chzn_b span3">
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
                        <label class="span3">Result limit</label>
                         <select name="limit" id="chosen_c" class="chzn_c span3">
                            <option value="200">200</option>
                            <option value="500">500</option>
                            <option value="1000">1000</option>
                         </select>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12">
                        <label class="span3">Type</label>
                        <div class="span8 form-inline no-margin-first">
                            <label class="uni-radio"><input type="radio" name="type" class="uni_style" value="1" checked>Google position was Given url and comparison with the url of the better competitor...
                                <a href="javascript:void(0);" class="pop_over" data-content="GooglePconcurrentositiona given url and comparison withthe besturl:
Input :
url;kw
url1;kw1
url2;kw2...etc not end with a ;" data-original-title="Google position on a given url" data-placement="right"><span class="splashy-information"></span></a>
                            </label>
                            <label class="uni-radio"><input type="radio" name="type" class="uni_style" value="2" >Best position on a Google domain<a href="javascript:void(0);" class="pop_over" data-content="Below url, kw
Input :
Thank you present your items this way:
url;kw
url1;kw1
url2;kw2...etc not end with a ; " data-original-title="Best position on a Google domain" data-placement="right"><span class="splashy-information"></span></a>
                            </label>
                            <label class="uni-radio"><input type="radio" name="type" class="uni_style" value="3" >Google position on a given url VS better position on the Google domain<a href="javascript:void(0);" class="pop_over" data-content="Below url, kw
Input :
Thank you present your items this way:
url;kw
url1;kw1
url2;kw2...etc not end with a ;" data-original-title="Google position on a given url VS better position on the Google domain" data-placement="left"><span class="splashy-information"></span></a></label>
                            <label class="uni-radio"><input type="radio" name="type" class="uni_style" value="4" >Google position on a given url and comparison with the url of the better competitor<a href="javascript:void(0);" class="pop_over" data-content="Below url, kw; urlcomp
Input :
Thank you present your items this way:
url;kw;compurl
url1;kw1;compurl
...etc not end with a ;
For many keywords, you can specify: url, kw; kw1; compurl" data-original-title="Google position on a given url and comparison with the url of the better competitor" data-placement="left"><span class="splashy-information"></span></a></label>
                            <label class="uni-radio"><input type="radio" name="type" class="uni_style" value="5" >Google best position of a field against a competitor<a href="javascript:void(0);" class="pop_over" data-content="En dessous de url;kw;urlcomp
Input
Thank you present your items this way:
url;kw;compurl
url1;kw1;compurl1
...etc not end with a ;
For many keywords, you can specify: url, kw; kw1; compurl" data-original-title="Google best position of a field against a competitor" data-placement="right"><span class="splashy-information"></span></a></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">Schedule</label>
                        <label class="uni-checkbox">
                            <input type="checkbox" name="posSchedule" id="posSchedule" class="uni_style" value="1">
                        </label>
                    </div>
                </div>
            </div>
            <div class="control-group formSep" id="scheduleRow1" style="display: none;">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">Date<span class="f_req">*</span></label>
                        <div  id="scheduleDate1" class="input-append date" >
                              <input data-format="dd/MM/YYYY HH:mm:ss" id="scheduleDate" name="scheduleDate" type="text" value="" class="input-append date" readonly="readonly" />
                                <span class="add-on">
                                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                  </i>
                                </span>
                          </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep" id="scheduleRow2" style="display: none;">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">Email</label>
                        <label class="uni-checkbox">
                            <input type="checkbox" name="posSchedule" id="posSchedule" class="uni_style" value="1">
                        </label>
                    </div>
                </div>
            </div>
            <div class="control-group formSep">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">Frequency</label>
                        <label class="uni-checkbox">
                            <input type="checkbox" name="frequency" id="frequency" class="uni_style" value="1">
                            <span id="select_all"><a class="select-all" href="javascript:void(0);">Select all</a></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="control-group formSep" id="fr">
                <div class="row-fluid">
                    <div class="span12" id="days">
                        <label class="span3">&nbsp;</label>
                        <div class="span2 no-margin-first">
                            <label class="uni-checkbox">
                                <input type="checkbox" name="day[]" id="day1" class="uni_style" value="sunday">
                                sunday
                            </label>
                            <label class="uni-checkbox">
                                <input type="checkbox" name="day[]" id="day2" class="uni_style" value="thursday">
                                Thursday
                            </label>
                        </div>
                        <div class="span2">
                            <label class="uni-checkbox">
                                <input type="checkbox" name="day[]" id="day3" class="uni_style" value="monday">
                                Monday
                            </label>
                            <label class="uni-checkbox">
                                <input type="checkbox" name="day[]" id="day4" class="uni_style" value="friday">
                                Friday
                            </label>
                        </div>
                        <div class="span2">
                            <label class="uni-checkbox">
                                <input type="checkbox" name="day[]" id="day5" class="uni_style" value="tuesday">
                                Tuesday
                            </label>
                            <label class="uni-checkbox">
                                <input type="checkbox" name="day[]" id="day6" class="uni_style" value="saturday">
                                Saturday
                            </label>
                        </div>
                        <div class="span2">
                            <label class="uni-checkbox">
                                <input type="checkbox" name="day[]" id="day7" class="uni_style" value="wednesday">
                                Wednesday
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group formSep" id="fr_end_date">
                <div class="row-fluid">
                    <div class="span12 form-inline">
                        <label class="span3">Frequency end Date<span class="f_req">*</span></label>
                        <div  id="frequencyEndDate" class="input-append date" >
                              <input data-format="dd/mm/YYYY" id="enddate" name="enddate" type="text" value=""   class="input-append date" readonly="readonly" />
                                <span class="add-on">
                                  <i class="icon-calendar" data-time-icon="icon-time" data-date-icon="icon-calendar">
                                  </i>
                                </span>
                          </div>
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
            gebo_validation.reg();
            gebo_chosen.init();
            gebo_popOver.init();
            
            $(\'#scheduleDate1\').datetimepicker({
                language: \'pt-BR\',
                format: \'dd/MM/yyyy HH:mm\',
                pickSeconds: false,
                pick12HourFormat: false
            });
            $(\'#frequencyEndDate\').datepicker({
                language: \'pt-BR\',
                format: \'dd/mm/yyyy\',
                pickSeconds: false,
                pick12HourFormat: false
            });
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

        $("input[name=\'type\']").change(function() {
            
             var type=$(\'input[name=type]:checked\').val();
             var csvformat ;
             switch(type) {
              case \'4\':
               csvformat = \'url;kw;urlcomp\';
              break;
              case \'5\':
               csvformat = \'url;kw;urlcomp\';
              break;
              default :
               csvformat = \'url;kw\';
                   break ;
              }
              $(\'#load_syntax_file\').html(csvformat);
              $(\'#load_syntax_text\').html(csvformat);
        });
            
        $(\'input[name=frequency]\').change(function(){
            if($(\'input[name=frequency]\').is(\':checked\'))
            {
                $(\'#fr\').show();
                $(\'#fr_end_date\').show();
                $(\'#clientRow\').show();
                $(\'#title\').show();
                $(\'#select_all\').show();
            } 
            else 
            {
                 $(\'#fr\').hide();
                 $(\'#fr_end_date\').hide();
                 if($(\'input[name=posSchedule]:checked\').val() != 1 )
                 {
                     $(\'#clientRow\').hide();
                     $(\'#title\').hide();					 
                 }
                 $(\'#select_all\').hide();
                 var $b = $(\'input[name=day\\\\[\\\\]]\');
                 $b.attr(\'checked\', false); 
                 $(\'a.select-all\').text(\'S.elect all\');
                 
            }
        });

        $(\'a.select-all\').bind(\'click\', function() {
            for (var i = 1; i <= 7; i++) {
                $(\'#day\'+i).click();
            }
            if(this.innerHTML.indexOf(\'Deselect\') != -1) {
                //var $b = $(\'input[name=day\\\\[\\\\]]\');
                    //$b.attr(\'checked\', false); 
                $(this).text(\'Select all\');
            } else {
                $(this).text(\'Deselect all\');
                //var $b = $(\'input[name=day\\\\[\\\\]]\');
                //$b.attr(\'checked\', true);                
                //$(this).closest("span").addClass("uni-checked");
            }
        });

        $(\'input[name=posSchedule]\').change(function(){
            if($(\'input[name=posSchedule]\').is(\':checked\'))
            {
                $("#scheduleRow1").show();
                $("#scheduleRow2").show();
                $(\'#clientRow\').show();
                $(\'#title\').show();				
            } 
            else 
            {
                 $("#scheduleRow1").hide();
                 $("#scheduleRow2").hide();
                 if($(\'input[name=frequency]:checked\').val() != 1 )
                 {
                     $(\'#clientRow\').hide();
                     $(\'#title\').hide();
                 }
            }
        });

        gebo_chosen = {
            init: function(){
                $(".chzn_a").chosen({
                    allow_single_deselect: true
                });
                $(".chzn_b").chosen({
                    allow_single_deselect: true,
                    disable_search: true
                });
                $(".chzn_c").chosen({
                    allow_single_deselect: true,
                    disable_search: true
                });
            }
        };
		$(\'#client\').bind("change", function(){
			$(\'.form_validation_reg\').validate().element($(\'#client\'));
		});
        //* popovers
        gebo_popOver = {
            init: function() {
                $(".pop_over").popover({trigger: \'hover\'});
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
                              },
                          client: {required:true},
                          title: {required: function(element) {
                                  return ($(\'#posSchedule\').is(\':checked\'));
                                 }
                              },
                  scheduleDate: {required: function(element) {
                                  return ($(\'#posSchedule\').is(\':checked\'));
                                 }
                              }
                    },
                    messages: {
                              kw: "Please enter keyword(s).",
                    keyword_file: {required: "Please selects csv/xls file.", accept: "Accept only xls or csv."},
                    client: "Please select one client.",
                    title: "Please enter title.",
                    scheduleDate: "Please select the scheduled date."
                    },
                    invalidHandler: function(form, validator) {
                        $.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
                    }
                })
            }
        };
        function clientValidation()
        {
            if($(\'#posSchedule\').is(\':checked\'))
              {
                  //if($("#client option[value=\'\']")){return false;}else{return true;}
                  if($("#client").val()==\'\'){return false;}else{return true;}
              }
        }
        function modalwindow(url)
        {
            $.get( "http://admin-test.edit-place.co.uk/seotool/"+url, function( data ) {
              $( ".modal-body" ).html( data );
            });
            $("#seoresults").modal(\'show\');
        }
    </script>
'; ?>