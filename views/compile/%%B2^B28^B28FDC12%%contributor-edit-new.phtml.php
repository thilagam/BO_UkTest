<?php /* Smarty version 2.6.19, created on 2016-01-08 14:55:54
         compiled from gebo/user/contributor-edit-new.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'gebo/user/contributor-edit-new.phtml', 1172, false),array('modifier', 'date_format', 'gebo/user/contributor-edit-new.phtml', 1182, false),array('modifier', 'count', 'gebo/user/contributor-edit-new.phtml', 1291, false),array('modifier', 'replace', 'gebo/user/contributor-edit-new.phtml', 2059, false),array('modifier', 'wordwrap', 'gebo/user/contributor-edit-new.phtml', 2155, false),array('function', 'html_select_date', 'gebo/user/contributor-edit-new.phtml', 1181, false),array('function', 'html_options', 'gebo/user/contributor-edit-new.phtml', 1187, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
    (function($) {
        $.fn.extend( {
            limiter: function(limit, elem) {
                $(this).on("keyup focus", function() {
                    setCount(this, elem);
                });
                function setCount(src, elem) {
                    var chars = src.value.length;
                    /*if (chars > limit) {
                     src.value = src.value.substr(0, limit);
                     chars = limit;
                     }*/
                    //elem.html( chars+\'/\'+(limit - chars) );
                    elem.html(chars);
                }
                setCount($(this)[0], elem);
            }
        });
    })(jQuery);

    /**closing the  categories with sliders**/
    var skill=0;
    $("[id^=skill_close_]").live(\'click\', function(i) {

        var parentDiv=$(this).parents("div:first").attr(\'id\');
        var closeDiv=$("#"+parentDiv).children(".close").attr(\'id\');
        if($("[id^=skill_more_]").size()>1)
        {
            $("#"+parentDiv).remove();
            var skill =  $("[id^=skill_close_]").length-1;
            $("#addmore_skill_link").attr("onClick","addnewrow("+skill+")");
        }
        else
        {
            $("#"+closeDiv).hide();
        }
        $("#ep_category_count").val(skill);
    });
    /**closing the  languages more with sliders**/
    var language=0;
    $("[id^=language_close_]").live(\'click\', function() {
        var parentDiv=$(this).parents("div:first").attr(\'id\');
        var closeDiv=$("#"+parentDiv).children(".close").attr(\'id\');
        if($("[id^=language_more_]").size()>1)
        {
            $("#"+parentDiv).remove();
            var language =  $("[id^=language_close_]").length-1;
            $("#addmore_language_link").attr("onClick","addnewLanguage("+language+")");
        }
        else
        {
            $("#"+closeDiv).hide();
        }
        $("#ep_language_count").val(language);
    });
    $(document).ready(function() {
        var elem = $("#contributortestcomment_count");
        $("#contributortestcomment").limiter(70, elem);

        var tab = getParameterByName(\'tab\', $(location).attr(\'href\'));
        $("#"+tab).addClass(\'active\');

        $("#language_more").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#favourite_category").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#language").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#nationality").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#country").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#profession").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#education").chosen({ allow_single_deselect: false,search_contains: true  });
        /* edited by naseer on 11-09-2015 */

        //$("#period_Day").chosen({ allow_single_deselect: false,search_contains: true  });
        //$("#period_Month").chosen({ allow_single_deselect: false,search_contains: true  });
        //$("#period_Year").chosen({ allow_single_deselect: false,search_contains: true  });
        $(\'#datepicker1\').datepicker({language: \'fr\'});
        $(\'#datepicker2\').datepicker({
            language: \'fr\',
            changeYear: true,
            showButtonPanel: true,
            dateFormat: \'yy\'
        });


        /* end of edited */
        $("#start_month").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#end_month").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#start_train_month").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#end_train_month").chosen({ allow_single_deselect: false,search_contains: true  });
        $(".uni_style").uniform();
        gebo_validation.reg();
        gebo_sliders.init();

        $( ".jobtypedetails" ).each(function(j) {
            $("#ep_job_"+j).chosen({ allow_single_deselect: false,search_contains: true  });
        });

        /*$( ".ep_cates" ).each(function(j) {
         $("#ep_category_"+j).chosen({ allow_single_deselect: false,search_contains: true  });
         });
         $( ".ep_langmore" ).each(function(j) {
         $("#ep_language_"+j).chosen({ allow_single_deselect: false,search_contains: true  });
         });*/
        //Royalties pop up css change
        var top=$(window).scrollTop();
        $(\'#billing-ajax\').css(\'top\', (parseInt(60) + ((top*2)/$(window).height())) + \'%\');
        //destroy the Modal object before subsequent toggles
        $(\'body\').on(\'hidden\', \'.modal\', function () {
            $(this).removeData(\'modal\');
            $(".datepicker").hide();
        });
        //date picker in cart page
        $("[id^=date_limit_]").each(function(i) {
            var myDate=new Date();
            myDate.setDate(myDate.getDate()-1);
            $(this).datepicker({
                format: \'dd/mm/yyyy\',
                startDate: myDate
            });
        });
        //date picker in cart page
        $("[id^=poll_date_limit_]").each(function(i) {
            var myDate=new Date();
            myDate.setDate(myDate.getDate()-1);
            $(this).datepicker({
                format: \'dd/mm/yyyy\',
                startDate: myDate
            });
        });
        //Prev Next in Offer pop up
        $("[id^=to_modal_]").live(\'click\',function(e) {
            e.preventDefault();
            var href = $(this).attr(\'href\');
            $("#viewOffer-ajax").removeData(\'modal\');
            $(\'#viewOffer-ajax .modal-body\').load(href);
            $("#viewOffer-ajax").modal();
            $(".modal-backdrop:gt(0)").remove();
        });
    });

    //* sliders
    gebo_sliders = {
        init: function(){
//* default slider
            $( ".ui_slider1" ).each(function(j) {
                // read initial values from markup and remove that
                var value = parseInt( $( this ).text(), 10 );
                if(isNaN(value))
                    value=50;
                //alert(i+\'--\'+value);
                $( this ).empty().slider({
                    range: "min",
                    value: value,
                    min: 1,
                    max: 100,
                    slide: function( event, ui ) {
                        $( "#slider-skill_number_"+j ).val( ui.value +"%");
                    }
                });
                $( "#slider-skill_number_"+j ).val( $( "#slider-skill_"+j ).slider( "value" ) +"%" );
                skill=j;
            });
            $( ".ui_slider2" ).each(function(j) {
                // read initial values from markup and remove that
                var value = parseInt( $( this ).text(), 10 );
                if(isNaN(value))
                    value=50;
                //alert(i+\'--\'+value);
                $( this ).empty().slider({
                    range: "min",
                    value: value,
                    min: 1,
                    max: 100,
                    slide: function( event, ui ) {
                        $( "#slider-language_number_"+j ).val( ui.value +"%");
                    }
                });
                $( "#slider-language_number_"+j ).val( $( "#slider-language_"+j ).slider( "value" ) +"%" );
                skill=j;
            });
        }
    };
    function fnchangeProfession(other){
        var myindex  = other.selectedIndex;
        var SelValue = other.options[myindex].value;
        if(SelValue==\'option5\')
        {
            $("#otherProfession").show();
        }
        else
        {
            $("#otherProfession").hide();
            $("#profession_other").val(\'\');
        }
    }
    function showtype2(sho)
    {
        if(sho==\'yes\')
            $("#type2block").show();
        else
        {
            $("#type2block").hide();
            $("#profile_type").removeAttr(\'checked\');
        }
    }
    function EditContribInfo(userid)
    {
        var utype=$(\'#user_type\').val();
        var user=$(\'#user_list\').val();
        /*target_page = "/ao/editusercontrib?user="+user+"&utype="+utype;
         query = $("#myForm").serialize();
         $.get(target_page, query, function(data){
         $("#fade").show();
         $("#pop-box-edit").show();
         $("#pop-box-edit").html(data);
         {$user_detail[0].email}      /user/contributor-edit?submenuId=ML3-SL6&mode=view&userId=130724134912292
         });*/
        window.open(
            "/user/contributor-edit?submenuId=ML3-SL6&mode=edit&userId="+userid,
            \'_self\'
        );
    }
    function showhistory(userid)
    {
        target_page = "/user/userhistory?user="+userid;
        query = $("#myForm").serialize();
        $.get(target_page, query, function(data){
            $("#showhistory").modal(\'show\');
        });
    }
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
                errorPlacement: function(error, element) {
                    $(element).closest(\'div\').append(error);
                    $(\'.error\').css("font-size", "10px");
                    $(\'.error\').css("padding-top", "5px");
                    $(\'.error\').hide();
                },
                rules: {
                    email: { required: true, minlength: 5 },
                    first_name: { required: true, minlength: 2 },
                    last_name: { required: true, minlength: 2},
                    password: { required: true, minlength: 6 },
                    //profession: { required: true, minlength: 4 },
                    //university: { required: true, minlength: 5 },
                    //phone_number: { required: true, minlength: 5},
                    //address: { required: true, minlength: 5 },
                    //city: { required: true, minlength: 3 },
                    //degree: { required: true, minlength: 3 },

                    //payinfo:"required" ,
                    /* ssn: {required: function(element) {
                     return $(\'input:radio[name=payinfo]:checked\').val()==\'ssn\';   }
                     },
                     company_number: {required: function(element) {
                     return $(\'input:radio[name=payinfo]:checked\').val()==\'comp_num\';  }
                     },
                     VAT_number: {required: function(element) {
                     return $(\'input:radio[name=payinfo]:checked\').val()==\'comp_num\' && $(\'input[name=vat_check]\').is(":checked");  }
                     },
                     //payment_type:"required",
                     paypal_id:	{required: function(element) {
                     return $(\'input:radio[name=payment_type]:checked\').val()==\'paypal\'; }
                     },
                     rib_id_1: { required: true, minlength: 3 },
                     rib_id_2: { required: true, minlength: 3 },
                     rib_id_3: { required: true, minlength: 3 },
                     rib_id_4: { required: true, minlength: 3 },
                     rib_id_5: { required: true, minlength: 3 },
                     rib_id_6: { required: true, minlength: 3 },
                     rib_id_7: { required: true, minlength: 3 }*/
                    contributortestcomment:	{required: function(element) {
                        return $(\'input:radio[name=contributortest]:checked\').val()==\'yes\'; },
                        minlength:70
                    },
                    contributortestmarks:	{required: function(element) {
                        return $(\'input:radio[name=contributortest]:checked\').val()==\'yes\'; }
                    }
                },
                invalidHandler: function(form, validator) {
                    $.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
                }

            });
        }
    };
    //$("#addmore_skill_link").click(function(){       alert("hi");
    function addnewrow(category)
    {
        var skill=category;
        var cloned =$("#addmore_skill_link");// $(\'#skill_more_\'+skill);
        $("#skill_more_"+skill).clone().attr(\'id\', \'skill_more_\'+(++skill) ).insertBefore( cloned );
        // alert(skill);
        /*unselect the selected one**/
        $(\'#skill_more_\'+skill+\' select\').attr(\'id\',\'ep_category_\'+skill);
        // $(\'#skill_more_\'+skill+\' select\').attr(\'id\',\'ep_category_\'+skill+\'_chzn\');
        $(\'#skill_more_\'+skill+\' option:selected\').removeAttr("selected");

        var slider_number=$(\'#skill_more_\'+skill+\' input\');
        var slider=$(\'#skill_more_\'+skill+\' .ui_slider1\');
        $(\'#skill_more_\'+skill+\' .muted\').attr(\'for\',\'slider-skill_number_\'+skill);
        slider.attr(\'id\',\'slider-skill_\'+skill);
        slider_number.attr(\'id\',\'slider-skill_number_\'+skill);
        $( "#slider-skill_"+skill).html(\'\');

        $(\'#skill_more_\'+skill+\' .close\').attr(\'id\',\'skill_close_\'+skill);
        $(\'#skill_more_\'+skill+\' .close\').show();
        $("#addmore_skill_link").attr("onClick","addnewrow("+skill+")");
        /**resetting the div**/
        clearChildren(document.getElementById(\'skill_more_\'+skill));
        // Slider Skills
        var slider_val=skill;
        $( "#slider-skill_"+slider_val).slider({
            range: "min",
            value: 10,
            min: 1,
            max: 100,
            slide: function( event, ui ) {
                $( "#slider-skill_number_"+slider_val ).val( ui.value +"%");
            }
        });
        $( "#slider-skill_number_"+slider_val).val( $( "#slider-skill_"+slider_val ).slider( "value" ) +"%" );
        $(\'#skill_more_\'+skill+\' .ep_category_error\').attr(\'id\',\'ep_category_\'+skill+\'_error\');
        $( "#ep_category_count").val(skill);

    }
    function addnewLanguage(langmore)
    {
        var language=langmore;
        var cloned =$("#addmore_language_link");// $(\'#languageage_more_\'+language);
        $("#language_more_"+language).clone().attr(\'id\', \'language_more_\'+(++language) ).insertBefore( cloned );
        /*unselect the selected one**/
        $(\'#language_more_\'+language+\' select\').attr(\'id\',\'ep_language_\'+language);
        $(\'#language_more_\'+language+\' option:selected\').removeAttr("selected");

        var slider_number=$(\'#language_more_\'+language+\' input\');
        var slider=$(\'#language_more_\'+language+\' .ui_slider2\');
        $(\'#language_more_\'+language+\' .muted\').attr(\'for\',\'slider-language_number_\'+language);
        slider.attr(\'id\',\'slider-language_\'+language);
        slider_number.attr(\'id\',\'slider-language_number_\'+language);
        $( "#slider-language_"+language).html(\'\');

        $(\'#language_more_\'+language+\' .close\').attr(\'id\',\'language_close_\'+language);
        $(\'#language_more_\'+language+\' .close\').show();
        $("#addmore_language_link").attr("onClick","addnewLanguage("+language+")");
        /**resetting the div**/
        clearChildren(document.getElementById(\'language_more_\'+language));
        // Slider languages
        var slider_val=language;
        $( "#slider-language_"+slider_val).slider({
            range: "min",
            value: 10,
            min: 1,
            max: 100,
            slide: function( event, ui ) {
                $( "#slider-language_number_"+slider_val ).val( ui.value +"%");
            }
        });
        $( "#slider-language_number_"+slider_val).val( $( "#slider-language_"+slider_val ).slider( "value" ) +"%" );
        $(\'#language_more_\'+language+\' .ep_language_error\').attr(\'id\',\'ep_language_\'+language+\'_error\');
        $( "#ep_language_count").val(language);

    }
    /****************add more jobs*********************/
    $("[id^=job_close_]").live(\'click\', function() {
        var DivId = $(this).attr(\'id\');
        var parentDiv=$(this).parents("div:first").attr(\'id\');
        var job_identifier=$(this).attr(\'rel\');
        var closeDiv=$("#"+parentDiv).children(".close").attr(\'id\');
        var job =  $("[id^=job_close_]").length-1;
        $("#addmore_job_link").attr("onClick","addJob("+job+")");
        if(!job_identifier)
            $("#"+parentDiv).remove();
        else
        {
            if($("[id^=job_more_]").size()>1)
            {
                // $("#"+parentDiv).html(\'<center>\'+bigLoader+\' Deleting... </center>\');
                ajaxProfileUpdate(\'job\',job_identifier,parentDiv);
            }
            else
            {
                $("#"+closeDiv).hide();
            }
        }
        $("#experience_count"  ).val(job);
    });

    //$("#addmore_job_link").click(function(){    alert("masiv");
    function addJob(jobno)
    {
        var job= jobno;
        var cloned =$("#addmore_job_link");
        $("#job_more_"+job).clone().attr(\'id\', \'job_more_\'+(++job) ).insertBefore( cloned );
        $(\'#job_more_\'+job+\' .collapse\').addClass(\'in\');
        $(\'#job_more_\'+job+\' .close\').attr(\'id\',\'job_close_\'+job);
        $(\'#job_more_\'+job+\' .close\').show();
        $(\'#job_more_\'+job+\' .close\').attr(\'rel\',\'\');
        $(\'#job_more_\'+job+\' .collapse\').attr(\'id\',\'stillWorkingThere_\'+job);
        $(\'#job_more_\'+job+\' input:checkbox\').attr(\'data-target\',\'#stillWorkingThere_\'+job);
        $("#addmore_job_link").attr("onClick","addJob("+job+")");
        clearChildren(document.getElementById(\'job_more_\'+job));
        /*added by naseer on 09-09-2015*/
        $("#job_more_"+job+" .job_title"  ).attr(\'id\',\'JobName_\'+job);
        $("#job_more_"+job+" .job_institute"  ).attr(\'id\',\'CompanyName_\'+job);
        $("#job_more_"+job+" .ep_job"  ).attr(\'id\',\'ep_job_\'+job);
        $("#job_more_"+job+" .job_title_error"  ).attr(\'id\',\'JobName_\'+job+\'_error\');
        $("#job_more_"+job+" .job_institute_error"  ).attr(\'id\',\'CompanyName_\'+job+\'_error\');
        $("#job_more_"+job+" .ep_job_error"  ).attr(\'id\',\'ep_job_\'+job+\'_error\');
        $("#experience_count"  ).val(job);
        $("#job_more_"+job+" .start_month"  ).attr(\'id\',\'start_month_\'+job);
        $("#job_more_"+job+" .start_year"  ).attr(\'id\',\'start_year_\'+job);
        $("#job_more_"+job+" .end_month"  ).attr(\'id\',\'end_month_\'+job);
        $("#job_more_"+job+" .end_year"  ).attr(\'id\',\'end_year_\'+job);
        $("#job_more_"+job+" .still_working"  ).attr(\'id\',\'stillWorkingThere_\'+job);
        //select current year by default//
        var cur_year = (new Date).getFullYear();
        $(\'#start_year_\'+job+\' option[value="\'+cur_year+\'"]\').prop(\'selected\', true);
        $(\'#end_year_\'+job+\' option[value="\'+cur_year+\'"]\').prop(\'selected\', true);


    }
    //});
    /****************add more Trainings****************/
    $("[id^=training_close_]").live(\'click\', function() {
        var DivId = $(this).attr(\'id\');
        var parentDiv=$(this).parents("div:first").attr(\'id\');
        var training_identifier=$(this).attr(\'rel\');
        var closeDiv=$("#"+parentDiv).children(".close").attr(\'id\');
        var training =  $("[id^=training_close_]").length-1;
        $("#addmore_training_link").attr("onClick","addTraining("+training+")");
        if(!training_identifier)
            $("#"+parentDiv).remove();
        else
        {
            if($("[id^=training_more_]").size()>1)
            {
                // $("#"+parentDiv).html(\'<center>\'+bigLoader+\' Deleting... </center>\');
                ajaxProfileUpdate(\'education\',training_identifier,parentDiv);
            }
            else
            {
                $("#"+closeDiv).hide();
            }
        }
        $("#training_count"  ).val(training);
    });
    //$("#addmore_training_link").click(function(){
    function addTraining(trainingno)
    {
        var training =   trainingno;
        var cloned =$("#addmore_training_link");
        $("#training_more_"+training).clone().attr(\'id\', \'training_more_\'+(++training) ).insertBefore( cloned );
        //$("#training_more_"+training+").clone().attr(\'id\', \'training_more_\'+(++training) ).insertBefore( cloned );
        //$(\'#training_more_\'+training+\' .clone\').attr(\'id\', \'training_more_\'+(++training) ).insertBefore( cloned );
        $(\'#training_more_\'+training+\' .collapse\').addClass(\'in\');
        $(\'#training_more_\'+training+\' .close\').attr(\'id\',\'training_close_\'+training);
        $(\'#training_more_\'+training+\' .close\').show();
        $(\'#training_more_\'+training+\' .close\').attr(\'rel\',\'\');
        $(\'#training_more_\'+training+\' .collapse\').attr(\'id\',\'stillTrainingThere_\'+training);
        $(\'#training_more_\'+training+\' input:checkbox\').attr(\'data-target\',\'#stillTrainingThere_\'+training);
        $("#addmore_training_link").attr("onClick","addTraining("+training+")");
        clearChildren(document.getElementById(\'training_more_\'+training));

        $("#training_more_"+training+" .training_title"  ).attr(\'id\',\'trainingName_\'+training);
        $("#training_more_"+training+" .training_institute"  ).attr(\'id\',\'trainingSchoolName_\'+training);
        $("#training_more_"+training+" .training_title_error"  ).attr(\'id\',\'trainingName_\'+training+\'_error\');
        $("#training_more_"+training+" .training_institute_error"  ).attr(\'id\',\'trainingSchoolName_\'+training+\'_error\');
        $("#training_count").val(training);
        $("#training_more_"+training+" .start_train_month"  ).attr(\'id\',\'start_train_month_\'+training);
        $("#training_more_"+training+" .start_train_year"  ).attr(\'id\',\'start_train_year_\'+training);
        $("#training_more_"+training+" .end_train_month"  ).attr(\'id\',\'end_train_month_\'+training);
        $("#training_more_"+training+" .end_train_year"  ).attr(\'id\',\'end_train_year_\'+training);
        $("#training_more_"+training+" .still_training"  ).attr(\'id\',\'still_training_\'+training);
        //select current year by default//
        var cur_year = (new Date).getFullYear();
        $(\'#start_train_year_\'+training+\' option[value="\'+cur_year+\'"]\').prop(\'selected\', true);
        $(\'#end_train_year_\'+training+\' option[value="\'+cur_year+\'"]\').prop(\'selected\', true);
    }
    /** ajax function to delete profile data**/
    function ajaxProfileUpdate(type,identifier,divid)
    {
        var target_page = "/user/delete-profile-data?type="+type+"&identifier="+identifier;
        $.post(target_page, function(data){  //alert(data);
            //sleep(4000);
            $("#"+divid).remove();

        });
    }

    /*reset all childs of a div**/
    function clearChildren(element) {
        for (var i = 0; i < element.childNodes.length; i++) {
            var e = element.childNodes[i];
            if (e.tagName) switch (e.tagName.toLowerCase()) {
                case \'input\':
                    switch (e.type) {
                        case "radio":
                        case "checkbox": e.checked = false; break;
                        case "button":
                        case "submit":
                        case "image": break;
                        default: e.value = \'\'; break;
                    }
                    break;
                case \'select\': e.selectedIndex = 0; break;
                case \'textarea\': e.innerHTML = \'\'; break;
                default: clearChildren(e);
            }
        }
    }
    /**toggle for payment infos**/
    $(\'input[type=radio]\').live(\'click\', function () {

        var payment_type = $("input:radio[name =\'payment_type\']:checked").val();
        var country = $("#country").val();
        var payinfo=$(\'input:radio[name=payinfo]:checked\').val();

        if (this.checked && $(this).val() == \'ssn\')
        {
            $(this).addClass(\'in\');
            $("#siretNum").removeClass(\'in\');
            $("#siretNum").css(\'height\',\'0px\');

            if(payment_type==\'virement\' && country!=38)
            {
                $("#c_out_france").show();
                $("#c_france").hide();
            }
            else if(payment_type==\'virement\')
            {
                $("#c_out_france").hide();
                $("#c_france").show();
            }

            if(country!=38)
            {
                $("#cheque_radio").hide();
                $("#cheque_radio").find("input:radio:checked").removeProp(\'checked\');
            }
            else
                $("#cheque_radio").show();
        }
        else if (this.checked && $(this).val() == \'comp_num\')
        {
            $(this).addClass(\'in\');
            $("#national-InsuranceNum").removeClass(\'in\');
            $("#national-InsuranceNum").css(\'height\',\'0px\');

            if(payment_type==\'virement\'  && country!=38)
            {
                $("#c_out_france").show();
                $("#c_france").hide();
            }
            else if(payment_type==\'virement\')
            {
                $("#c_out_france").hide();
                $("#c_france").show();
            }
            if(country!=38)
            {
                $("#cheque_radio").hide();
                $("#cheque_radio").find("input:radio:checked").removeProp(\'checked\');
            }
            else
                $("#cheque_radio").show();
        }
        else if (this.checked && $(this).val() == \'out_france\')
        {
            $("#national-InsuranceNum").removeClass(\'in\');
            $("#national-InsuranceNum").css(\'height\',\'0px\');
            $("#siretNum").removeClass(\'in\');
            $("#siretNum").css(\'height\',\'0px\');


            if(payment_type==\'virement\'  || country!=38)
            {
                $("#c_out_france").show();
                $("#c_france").hide();
            }
            else if(payment_type==\'virement\')
            {
                $("#c_out_france").hide();
                $("#c_france").show();
            }
            $("#cheque_radio").hide();
            $("#cheque_radio").find("input:radio:checked").removeProp(\'checked\');

        }
        else if (this.checked && $(this).val() == \'virement\')
        {

            var payinfo = $("input:radio[name =\'payinfo\']:checked").val();
            if(payinfo==\'out_france\' || country!=38)
            {
                $("#c_out_france").show();
                $("#c_france").hide();
            }
            else
            {
                $("#c_out_france").hide();
                $("#c_france").show();
            }
            $("#paypalEmail").hide();
            $("#virementId").show();
        }
        else if (this.checked && $(this).val() == \'paypal\' || this.checked && $(this).val() == \'cheque\' )
        {
            if(this.checked && $(this).val() == \'paypal\' )
            {
                $("#paypalEmail").show();
            }
            else
            {
                $("#paypalEmail").hide();
            }
            $("#virementId").hide();
        }

    });
    function changeCountry(){
        var country=$("#country").val();
        var payment_type = $("input:radio[name =\'payment_type\']:checked").val();
        //alert(country+"--"+payment_type);
        if(country!=54)
        {
            $("#cheque_radio").hide();
            $("#cheque_radio").find("input:radio:checked").removeProp(\'checked\');
            if(payment_type==\'virement\')
            {
                $("#c_out_france").show();
                $("#c_france").hide();
                $("#virement_country").val(country);
            }
        }
        else
        {
            $("#cheque_radio").show();
            if(payment_type==\'virement\')
            {
                $("#c_out_france").hide();
                $("#c_france").show();
                $("#virement_country").val(country);
            }
        }
    }
    $("input:radio[name=payinfo]").click(function(){
        var selected=$(this).val();

        if(selected==\'comp_num\')
        {
            $(\'label[for="ssn"]\').hide();
            $(\'label[for="company_number"]\').show();
            if(!$("#ssn").val().match(/^([0-9]{15})?$/))
                $("#ssn").val(\'\');
        }
        else if(selected==\'ssn\')
        {
            $(\'label[for="company_number"]\').hide();
            $(\'label[for="ssn"]\').show();
            if(!$("#company_number").val().match(/^([0-9]{14})?$/))
                $("#company_number").val(\'\');
        }
        else
        {
            $(\'label[for="company_number"]\').hide();
            $(\'label[for="ssn"]\').hide();
        }

    });


    function showremarks(param){
        if(param==\'yes\')
            $("#remarksblock").show();
        else
            $("#remarksblock").hide();
    }
    /* added by naseer on 31-07-2015 */
    function toggle_com_siren(){
        if($("#com_country").val() == 38){
            $("#com_siren_label").show();
        }
        else{
            $("#com_siren_label").hide();
        }
    }
    function toggle_details(val){
        $(".details").hide();
        $("#"+val).show();
        $("#options_group").val(\'selected\');
    }
    /*by naseer on 06.08.2015*/
    function update_contrib_form(id,userId){
        var flag = true;
        if(id === \'submit_contrib_bo_only\'){
            $(".error").hide();
            if (!$("input[name=\'status\']:checked").val()) {
                $("#status_error").show();
                flag = false;
            }
            if (!$("input[name=\'profile_type\']:checked").val()) {
                $("#profile_type_error").show();
                flag = false;
            }
            if (!$("input[name=\'type2\']:checked").val()) {
                $("#type2_error").show();
                flag = false;
            }
            /*if (!$("input[name=\'profile_type2\']:checked").val()) {
                $("#profile_type2_error").show();
                flag = false;
            }*/
            if (!$("input[name=\'blackstatus\']:checked").val()) {
                $("#blackstatus_error").show();
                flag = false;
            }
            if($("#contributortest_yes").is(\':checked\')){
                if($("#contributortestcomment").val().length < 70){
                    $("#contributortestcomment_error").show();
                    flag = false;
                }
                if($("#contributortestmarks").val() == \' \'){
                    $("#contributortestmarks_error").show();
                    flag = false;
                }

            }
        }
        else if(id === \'submit_contrib_user_basic\'){
            $(".error").hide();
            if ($("#self_details").val().length == 0 ) {
                $("#self_details_error").show();
                flag = false;
            }
            if ($("#language").val().length == 0 ) {
                $("#language_error").show();
                flag = false;
            }
            if ($("#nationality").val().length == 0 ) {
                $("#nationality_error").show();
                flag = false;
            }
            if ($("#phone_number").val().length == 0 ) {
                $("#phone_number_error").show();
                flag = false;
            }
            if ($("#address").val().length == 0 ) {
                $("#address_error").show();
                flag = false;
            }
            if ($("#city").val().length == 0 ) {
                $("#city_error").show();
                flag = false;
            }
            if ($("#zipcode").val().length == 0 ) {
                $("#zipcode_error").show();
                flag = false;
            }
            if ($("#country").val().length == 0 ) {
                $("#country_error").show();
                flag = false;
            }
        }
        else if(id === \'submit_contrib_categories_and_lang\'){
            $(".error").hide();
            var ep_category_count = $("#ep_category_count").val();
            for(i=0; i<=ep_category_count;i++){
                var result = validate_category(i);
                if(!result){
                    flag = false;
                    break;
                }
            }
            var ep_language_count = $("#ep_language_count").val();
            for(i=0; i<=ep_language_count;i++){
                var result = validate_language(i);
                if(!result){
                    flag = false;
                    break;
                }
            }
        }
        else if(id === \'submit_contrib_experience\'){
            $(".error").hide();
            var experience_count = $("#experience_count").val();
            for(i=1; i<=experience_count;i++){
                var result = validate_experience(i);
                if(!result){
                    flag = false;
                    break;
                }
            }
            var training_count = $("#training_count").val();
            for(i=1; i<=training_count;i++){
                var result = validate_training(i);
                if(!result){
                    flag = false;
                    break;
                }
            }

        }
        else if(id === \'submit_contrib_payment_info_form\'){
            $(".error").hide();
            if (!$("input[name=\'payment_type\']:checked").val()) {
                $("#payment_type_error").show();
                flag = false;
            }
            else if($("input[name=\'payment_type\']:checked").val() == \'paypal\'){
                if($("#paypal_id").val().length == 0){
                    $("#paypal_id_error").show();
                    flag = false;
                }
            }
            else if ($("input[name=\'payment_type\']:checked").val() == \'virement\'){
                if($("#virement_country").val() == \'38\'){
                    if($("#rib_id_1").val().length == 0) {
                        $("#rib_id_1_error").show();
                        flag = false;
                    }
                    if($("#rib_id_2").val().length == 0) {
                        $("#rib_id_2_error").show();
                        flag = false;
                    }
                    if($("#rib_id_3").val().length == 0) {
                        $("#rib_id_3_error").show();
                        flag = false;
                    }
                    if($("#rib_id_4").val().length == 0) {
                        $("#rib_id_4_error").show();
                        flag = false;
                    }
                    if($("#rib_id_5").val().length == 0) {
                        $("#rib_id_5_error").show();
                        flag = false;
                    }
                }
                else if($("#virement_country").val() != \'38\'){
                    if($("#rib_id_6").val().length == 0) {
                        $("#rib_id_6_error").show();
                        flag = false;
                    }
                    if($("#rib_id_7").val().length == 0) {
                        $("#rib_id_7_error").show();
                        flag = false;
                    }

                }
            }
        }
        else if(id === \'submit_contrib_more_info_form\'){
            if($("#reg_check").is(\':checked\')) {
                if ($("#passport_no").val().length >= 1 || $("#id_card").val().length >= 1) {
                    //$("#submit_contrib_more_info_form").prop(\'disabled\', false);
                    $("#passport_no_error").hide();
                }
                else {
                    flag = false;//$("#submit_contrib_more_info_form").prop(\'disabled\', true);
                    $("#passport_no_error").show();
                }
            }
            else if($("#com_check").is(":checked")){
                console.log("com_check");
                $(".error").hide();
                if ($("#com_name").val().length <= 1) {
                    flag = false;//$("#submit_contrib_more_info_form").prop(\'disabled\', true);
                    $("#com_name_error").show();
                    console.log("ok to proceed");
                }
                if($("#com_address").val().length <= 1) {
                    flag = false;//$("#submit_contrib_more_info_form").prop(\'disabled\', true);
                    $("#com_address_error").show();
                    console.log("error");
                }
                if($("#com_city").val().length <= 1) {
                    flag = false;//$("#submit_contrib_more_info_form").prop(\'disabled\', true);
                    $("#com_city_error").show();
                    console.log("error");
                }
                if($("#com_zipcode").val().length <= 1) {
                    flag = false;//$("#submit_contrib_more_info_form").prop(\'disabled\', true);
                    $("#com_zipcode_error").show();
                    console.log("error");
                }
                if($("#com_tva_number").val().length <= 1) {
                    flag = false;//$("#submit_contrib_more_info_form").prop(\'disabled\', true);
                    $("#com_tva_number_error").show();
                    console.log("error");
                }
                if($("#com_country").val().length <= 1) {
                    flag = false;//$("#submit_contrib_more_info_form").prop(\'disabled\', true);
                    $("#com_country_error").show();
                    console.log("error");
                }
                if($("#com_phone").val().length <= 1) {
                    flag = false;//$("#submit_contrib_more_info_form").prop(\'disabled\', true);
                    $("#com_phone_error").show();
                    console.log("error");
                }
            }
            else if($("#tva_check").is(":checked")){
                console.log("tva_check"+$("#tav_number").val().length);
                if($("#tav_number").val().length == 0) {
                    flag = false;//$("#submit_contrib_more_info_form").prop(\'disabled\', true);
                    $("#tav_number_error").show();
                }
                else{
                    //$("#submit_contrib_more_info_form").prop(\'disabled\', false);
                    $("#tav_number_error").hide();
                }
            }
        }
        if(flag) {
            console.log("ajax initialed id =" + id);
            var ajax_url = "/user/update-contrib-ajax?";
            var form_data = "userId=" + userId + "&submit=" + id + "&" + $("#" + id).closest(\'form\').serialize();
            console.log(ajax_url + form_data);
            $.ajax({
                type: \'POST\',
                url: ajax_url + form_data,
                success: function (data) {
                    console.log(data.trim());
                    console.log("ajax terminated");
                    if(data.trim() == \'1\')
                        smoke.alert("Updated Successfully!!!");
                    else
                        smoke.alert("Sorry,Failed to update!!!");

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }

            });
        }
        else{
            smoke.alert("Error!! manditory field missing.");
        }
    }
    function validate_experience(i){
        var flag = true;
            if($("#JobName_"+i).val().length == 0){
                $("#JobName_"+i+"_error").show();
                flag = false;
            }
            if($("#CompanyName_"+i).val().length == 0){
                $("#CompanyName_"+i+"_error").show();
                flag = false;
            }
            if($("#ep_job_"+i).val() === \' \' ){
                $("#ep_job_"+i+"_error").show();
                flag = false;
            }
        return flag;
    }
    function validate_training(i){
        var flag = true;
            if($("#trainingName_"+i).val().length == 0){
                $("#trainingName_"+i+"_error").show();
                flag = false;
            }
            if($("#trainingSchoolName_"+i).val().length == 0){
                $("#trainingSchoolName_"+i+"_error").show();
                flag = false;
            }
        return flag;
    }
    function validate_category(i){
        var flag = true;
            if($("#ep_category_"+i).val().length == 0){
                $("#ep_category_"+i+"_error").show();
                flag = false;
            }
        return flag;
    }
    function validate_language(i){
        var flag = true;
            if($("#ep_language_"+i).val().length == 0){
                $("#ep_language_"+i+"_error").show();
                flag = false;
            }
        return flag;
    }
    /*added by naseer on 11-11-2015*/
    function load_user_logs(userId){
        var ajax_url = "/user/load-user-logs?userId="+userId;
        $.ajax({
            type: \'POST\',
            url: ajax_url ,
            success: function (data) {
                //console.log(data);
                $("#userlogs").html(\'\');
                $("#userlogs").html(data);
            }
        });
    }
    /*end of added by naseer on 11-11-2015*/

</script>
'; ?>

<div class="row-fluid">
    <div class="span12" style="">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li <?php if ($_GET['tab'] == 'editcontrib' || $_GET['tab'] == ''): ?> class="active" <?php endif; ?>><a href="#editcontrib" data-toggle="tab" class="lable-success"><i class="icon-pencil"></i>&nbsp;<strong>Edit</strong></a></li>
                <li <?php if ($_GET['tab'] == 'viewcontrib'): ?> class="active" <?php endif; ?>><a href="#viewcontrib" data-toggle="tab" class="lable-danger"><i class="icon-eye-open"></i>&nbsp;<strong>View</strong></a></li>

                <li <?php if ($_GET['tab'] == 'userlogs'): ?> class="active" <?php endif; ?>><a href="#userlogs" onclick="load_user_logs('<?php echo $this->_tpl_vars['userId']; ?>
');" data-toggle="tab" class="lable-danger"><i class="icon-eye-open"></i>&nbsp;<strong>User Logs</strong></a></li>
                <a class="label label-inverse pull-right" href="/user/users-list?submenuId=ML3-SL6&tab=contributorstab">retour</a>
            </ul>


            <div class="tab-content" style="overflow: hidden;">
                <div id="editcontrib" class="tab-pane ">
                    <h3 class="heading alert alert-info">
                        <?php if ($this->_tpl_vars['user_detail'][0]['first_name'] != ''): ?>
                        <?php echo $this->_tpl_vars['user_detail'][0]['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['user_detail'][0]['last_name']; ?>

                        <?php else: ?>
                        <?php echo $this->_tpl_vars['user_detail'][0]['email']; ?>

                        <?php endif; ?>
                    </h3>
                    <!-- form that can only be changed by BO users-->
                    <div id="" class="accordion">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#bo_user_form" data-parent="#contrib_edit_forms" data-toggle="collapse" class="accordion-toggle">
                                    BO User Ediatble
                                </a>
                            </div>
                            <div class="accordion-body in collapse" id="bo_user_form">
                                <div class="accordion-inner">
                                    <form  autocomplete="off" >
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="span6 form-inline">
                                                    <label class="span4">Status </label>
                                                    <label class="uni-radio"> <input type="radio" name="status" value="Active" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['status'] == 'Active'): ?>checked<?php endif; ?>/>Active&nbsp;   </label>
                                                    <label class="uni-radio"><input type="radio" name="status" value="Inactive" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['status'] == 'Inactive'): ?>checked<?php endif; ?>/>Inactive   </label>
                                                    <br />
                                                    <span class="error hide" id="status_error">mandatory</span>
                                                </div>
                                                <div class="span6 form-inline">
                                                    <label class="span4">Type </label>
                                                    <label class="uni-radio"> <input type="radio" name="profile_type" value="senior" class="uni_style"<?php if ($this->_tpl_vars['user_detail'][0]['profile_type'] == 'senior'): ?>checked<?php endif; ?>/>Senior&nbsp; </label>
                                                    <label class="uni-radio"> <input type="radio" name="profile_type" value="junior" class="uni_style"<?php if ($this->_tpl_vars['user_detail'][0]['profile_type'] == 'junior'): ?>checked<?php endif; ?>/>Junior&nbsp; </label>
                                                    <label class="uni-radio"> <input type="radio" name="profile_type" value="sub-junior" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['profile_type'] == "sub-junior"): ?>checked<?php endif; ?>/>Sub Junior </label>
                                                    <br />
                                                    <span class="error hide" id="profile_type_error">mandatory</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="span6 form-inline">
                                                    <label class="span4">Corrector </label>
                                                    <label class="uni-radio"><input type="radio" name="type2" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['type2'] == 'corrector'): ?>checked<?php endif; ?> onClick="showtype2('yes');"/>Yes&nbsp; </label>
                                                    <label class="uni-radio"><input type="radio" name="type2" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['type2'] == 'no' || $this->_tpl_vars['user_detail'][0]['type2'] == ""): ?>checked<?php endif; ?> onClick="showtype2('no');"/>No  </label>
                                                    <div id="type2block" <?php if ($this->_tpl_vars['user_detail'][0]['type2'] == ""): ?>style="display:none;"<?php endif; ?>></div>
                                                    <br />
                                                    <span class="error hide" id="type2_error">mandatory</span>
                                                </div>
                                                <div class="span6 form-inline">
                                                    <label class="span4">Corrector Statut</label>
                                                    <label class="uni-radio"><input type="radio" name="profile_type2" value="senior" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['type2'] == 'corrector' && $this->_tpl_vars['user_detail'][0]['profile_type2'] == 'senior'): ?>checked<?php endif; ?>/>Senior&nbsp;  </label>
                                                    <label class="uni-radio"> <input type="radio" name="profile_type2" value="junior" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['type2'] == 'corrector' && $this->_tpl_vars['user_detail'][0]['profile_type2'] == 'junior'): ?>checked<?php endif; ?>/>Junior  </label>
                                                    <br />
                                                    <span class="error hide" id="profile_type2_error">mandatory</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- added by naseer on 26.11.2015-->
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="span6 form-inline">
                                                    <label class="span4">Translator </label>
                                                    <label class="uni-radio"><input type="radio" name="translator" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['translator'] == 'yes'): ?>checked<?php endif; ?> />Yes&nbsp; </label>
                                                    <label class="uni-radio"><input type="radio" name="translator" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['translator'] == 'no'): ?>checked<?php endif; ?> "/>No  </label>
                                                    <br />
                                                    <span class="error hide" id="translator_error">obligatoire</span>
                                                </div>
                                                <div class="span6 form-inline">
                                                    <label class="span4">Translator Statut</label>
                                                    <label class="uni-radio"><input type="radio" name="translator_type" value="senior" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['translator_type'] == 'senior' && $this->_tpl_vars['user_detail'][0]['translator'] == 'yes'): ?>checked<?php endif; ?>/>Senior&nbsp;  </label>
                                                    <label class="uni-radio"> <input type="radio" name="translator_type" value="junior" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['translator_type'] == 'junior' && $this->_tpl_vars['user_detail'][0]['translator'] == 'yes'): ?>checked<?php endif; ?>/>Junior  </label>
                                                    <br />
                                                    <span class="error hide" id="translator_type_error">obligatoire</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="span6 form-inline">
                                                    <label class="span4">Black list </label>
                                                    <label class="uni-radio"><input type="radio" name="blackstatus" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['blackstatus'] == 'yes'): ?>checked<?php endif; ?>/>Yes&nbsp; </label>
                                                    <label class="uni-radio"><input type="radio" name="blackstatus" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['blackstatus'] == 'no'): ?>checked<?php endif; ?>/>No</label>
                                                    <br />
                                                    <span class="error hide" id="blackstatus_error">mandatory</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <!-- User test -->
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="span5 form-inline">
                                                    <label class="span4">This contributor has been tested</label>
                                                    <label class="uni-radio"> <input type="radio" id="contributortest_yes"name="contributortest" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['contributortest'] == 'yes'): ?>checked<?php endif; ?> onClick="showremarks('yes');" />Oui&nbsp;   </label>
                                                    <label class="uni-radio"><input type="radio" name="contributortest" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['contributortest'] == 'no'): ?>checked<?php endif; ?> onClick="showremarks('no');" />Non   </label>
                                                </div>
                                                <div class="span7 form-inline" id="remarksblock" <?php if ($this->_tpl_vars['user_detail'][0]['contributortest'] == 'no'): ?>style="display:none;"<?php endif; ?>>
                                                    <div >
                                                        <label class="span3">Comments</label>
                                                        <textarea name="contributortestcomment" id="contributortestcomment" placeholder="Comment (Mandatory, 70 characters at least)" rows="5" style="width:300px"><?php echo $this->_tpl_vars['user_detail'][0]['contributortestcomment']; ?>
</textarea>
                                                        <span id="contributortestcomment_count" style="vertical-align:top"></span>
                                                        <br />
                                                        <span class="error hide"  id="contributortestcomment_error" >Please enter at least 70 characters.</span>
                                                    </div>
                                                    <p>&nbsp;</p>
                                                    <?php $this->assign('foo', '1'); ?>
                                                    <div >
                                                        <label class="span3">Marks</label>
                                                        <select name="contributortestmarks" id="contributortestmarks" style="">
                                                            <option value=" ">Mark</option>
                                                            <?php while ($this->_tpl_vars['foo'] < 21) { ?>
                                                            <option value="<?php echo $this->_tpl_vars['foo']; ?>
" <?php if ($this->_tpl_vars['user_detail'][0]['contributortestmarks'] == $this->_tpl_vars['foo']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['foo']; ?>
</option>
                                                            <?php echo $this->_tpl_vars['foo']++; ?>

                                                            <?php } ?>
                                                        </select>
                                                        <br />
                                                        <span class="error hide" id="contributortestmarks_error">mandatory</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input onclick="update_contrib_form(this.id,<?php echo $_GET['userId']; ?>
);" type="button" name="submit_contrib_bo_only" value="Update" id="submit_contrib_bo_only"  class="btn btn-info pull-right gap" />
                                    </form>
                                    <!-- end of form that can only be changed by BO users-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of bo_user_form -->
                    <!-- User Basic Form -->
                    <div id="" class="accordion">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#user_basic_form" data-parent="#contrib_edit_forms" data-toggle="collapse" class="accordion-toggle">
                                    User Basic Form
                                </a>
                            </div>
                            <div class="accordion-body  in collapse" id="user_basic_form">
                                <div class="accordion-inner">
                                    <form  autocomplete="off"  >
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <label class="span4"><strong>Text of presentation</strong></label>
                                                <textarea class="span12" placeholder="100 caract&egrave;res min" name="self_details" id="self_details" ><?php echo ((is_array($_tmp=$this->_tpl_vars['user_detail'][0]['self_details'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</textarea>
                                                <br />
                                                <span class="error hide" id="self_details_error">Mandatory field</span>
                                            </div>
                                        </div>
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="span6 form-inline">
                                                    <label class="span4">Date of birth</label>
                                                    <!--<?php echo smarty_function_html_select_date(array('end_year' => '1950','start_year' => '-1','field_order' => 'DMY','time' => $this->_tpl_vars['user_detail'][0]['dob'],'field_separator' => "&nbsp;",'day_extra' => 'id="period_Day"','month_extra' => 'id="period_Month"','year_extra' => 'id="period_Year"','class' => 'span2'), $this);?>
-->
                                                    <input type="text" autocomplete="off" name="birth_date" id="datepicker1" data-date-format="dd-mm-yyyy" value="<?php if ($this->_tpl_vars['dob'] != ' '): ?><?php echo $this->_tpl_vars['dob']; ?>
<?php else: ?>01-01-<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')); ?>
<?php endif; ?>" readonly/>
                                                </div>
                                                <div class="span6 form-inline">
                                                    <label class="span4">Language 1</label>
                                                    <select  name="language" id="language">
                                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['language_array'],'selected' => $this->_tpl_vars['user_detail'][0]['language']), $this);?>

                                                    </select>
                                                    <br />
                                                    <span class="error hide" id="language_error">mandatory</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="span6 form-inline">
                                                    <label class="span4">Nationality</label>
                                                    <select name="nationality" id="nationality"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['nationality_array'],'selected' => $this->_tpl_vars['user_detail'][0]['nationality']), $this);?>
</select>
                                                    <br />
                                                    <span class="error hide" id="nationality_error">Choisissez un pays</span>
                                                </div>
                                                <div class="span6 form-inline">
                                                    <label class="span4">phone </label>
                                                    <input type="text" autocomplete="off" name="phone_number" id="phone_number" value="<?php echo $this->_tpl_vars['user_detail'][0]['phone_number']; ?>
" />
                                                    <br />
                                                    <span class="error hide" id="phone_number_error">Num&eacute;ro de t&eacute;l&eacute;phone mandatory</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="span6 form-inline">
                                                    <label class="span4">Address </label>
                                                    <input type="text" autocomplete="off" name="address" id="address" value="<?php echo $this->_tpl_vars['user_detail'][0]['address']; ?>
"/>
                                                    <br />
                                                    <span class="error hide" id="address_error">Adresse mandatory</span>
                                                </div>
                                                <div class="span6 form-inline">
                                                    <label class="span4">City </label>
                                                    <input type="text"  autocomplete="off" name="city" id="city" value="<?php echo $this->_tpl_vars['user_detail'][0]['city']; ?>
" />
                                                    <br />
                                                    <span class="error hide" id="city_error">Ville mandatory</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="span6 form-inline">
                                                    <label class="span4">Zip Code</label>
                                                    <input type="text" autocomplete="off" name="zipcode" id="zipcode" value="<?php echo $this->_tpl_vars['user_detail'][0]['zipcode']; ?>
" />
                                                    <br />
                                                    <span class="error hide" id="zipcode_error">Code postal mandatory</span>
                                                </div>
                                                <div class="span6 form-inline">
                                                    <label class="span4">Country</label>
                                                    <select size="1" name="country" id="country" onchange=changeCountry();>
                                                        <option value=""></option>
                                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['country_array'],'selected' => $this->_tpl_vars['user_detail'][0]['country']), $this);?>

                                                    </select>
                                                    <br />
                                                    <span class="error hide" id="country_error">mandatory</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="span6 form-inline">
                                                    <label class="span4"><strong>Subscription (nl)</strong> </label>
                                                    <label class="uni-radio"><input type="radio" name="subscribe" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['subscribe'] == 'yes'): ?>checked<?php endif; ?> />Yes&nbsp; </label>
                                                    <label class="uni-radio"><input type="radio" name="subscribe" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['subscribe'] == 'no'): ?>checked<?php endif; ?> />No  </label>
                                                </div>
                                                <div class="span6 form-inline">
                                                    <label class="span4"><strong>Subscription (alert)</strong> </label>
                                                    <label class="uni-radio"><input type="radio" name="alert_subscribe" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['alert_subscribe'] == 'yes'): ?>checked<?php endif; ?> />Yes&nbsp; </label>
                                                    <label class="uni-radio"><input type="radio" name="alert_subscribe" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['alert_subscribe'] == 'no'): ?>checked<?php endif; ?> />No  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <input onclick="update_contrib_form(this.id,<?php echo $_GET['userId']; ?>
);" type="button" name="submit_contrib_user_basic" value="Update" id="submit_contrib_user_basic" class="btn btn-info pull-right gap" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of User Basic Form-->
                    <!-- fav Category and more laungaue Form-->
                    <div id="" class="accordion">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#categories_and_lang_form" data-parent="#contrib_edit_forms" data-toggle="collapse" class="accordion-toggle">
                                    Favorite Categories and  Langues more
                                </a>
                            </div>
                            <div class="accordion-body  in collapse" id="categories_and_lang_form">
                                <div class="accordion-inner">
                                    <form  autocomplete="off">
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="span6 form-inline">
                                                    <label class="span4">Categories Preferences</label>
                                                    <?php $_from = $this->_tpl_vars['category_more']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moreSkills'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moreSkills']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['kcategory'] => $this->_tpl_vars['percent']):
        $this->_foreach['moreSkills']['iteration']++;
?>
                                                    <?php $this->assign('skill_index', ($this->_foreach['moreSkills']['iteration']-1)); ?>
                                                    <!-- Start, new skill row -->
                                                    <div class="addmore form-inline span12" id="skill_more_<?php echo $this->_tpl_vars['skill_index']; ?>
">
                                                        <select class="ep_cates span4" name="ep_category[]" id="ep_category_<?php echo ($this->_foreach['moreSkills']['iteration']-1); ?>
" style="bottom:10px;position:relative;">
                                                            <option value="">Select a category</option>
                                                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['category_array'],'selected' => $this->_tpl_vars['kcategory']), $this);?>

                                                        </select>
                                                        <label for="slider-skill_number_<?php echo ($this->_foreach['moreSkills']['iteration']-1); ?>
" class="muted" style="bottom:10px;position:relative;">At :</label>
                                                        <input type="text" autocomplete="off" id="slider-skill_number_<?php echo ($this->_foreach['moreSkills']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['percent']; ?>
" name="category_slider_more[]" style="bottom:10px;position:relative;" class="span2"/>
                                                        <button  class="close" type="button" id="skill_close_<?php echo $this->_tpl_vars['skill_index']; ?>
" style="padding-right:25%" <?php if (count($this->_tpl_vars['category_more']) < 2): ?> style="display:none"<?php endif; ?>>&times;</button>
                                                        <div class="sepH_c span8">
                                                            <div id="slider-skill_<?php echo ($this->_foreach['moreSkills']['iteration']-1); ?>
" class="ui_slider1"><?php echo $this->_tpl_vars['percent']; ?>
</div>
                                                            <span class="pull-left legend muted">New</span> <span class="pull-right legend muted">Expert</span>
                                                        </div>
                                                        <br /><span class="error hide ep_category_error" id="ep_category_<?php echo ($this->_foreach['moreSkills']['iteration']-1); ?>
_error">mandatory</span>
                                                    </div>
                                                    <?php endforeach; else: ?>
                                                    <?php $this->assign('skill_index', '0'); ?>
                                                    <div class="addmore form-inline span12" id="skill_more_<?php echo $this->_tpl_vars['skill_index']; ?>
">
                                                        <select class="ep_cates span4" name="ep_category[]" id="ep_category_<?php echo $this->_tpl_vars['skill_index']; ?>
" style="bottom:10px;position:relative;">
                                                            <option value="">S&eacute;lectionnez une comp&eacute;tence</option>
                                                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['category_array'],'selected' => $this->_tpl_vars['kcategory']), $this);?>

                                                        </select>
                                                        <label for="slider-skill_number_<?php echo $this->_tpl_vars['skill_index']; ?>
" class="muted" style="bottom:10px;position:relative;">Votre niveau :</label>
                                                        <input type="text" autocomplete="off" id="slider-skill_number_<?php echo $this->_tpl_vars['skill_index']; ?>
" value="<?php echo $this->_tpl_vars['percent']; ?>
" name="category_slider_more[]" style="bottom:10px;position:relative;" class="span2"/>
                                                        <button  class="close" type="button" id="skill_close_<?php echo $this->_tpl_vars['skill_index']; ?>
" style="padding-right:25%" <?php if (count($this->_tpl_vars['category_more']) < 2): ?> style="display:none"<?php endif; ?>>&times;</button>
                                                        <div class="sepH_c span8">
                                                            <div id="slider-skill_<?php echo $this->_tpl_vars['skill_index']; ?>
" class="ui_slider1"><?php echo $this->_tpl_vars['percent']; ?>
</div>
                                                            <span class="pull-left legend muted">D&eacute;butant</span> <span class="pull-right legend muted">Expert</span>
                                                        </div>
                                                        <br /><span class="error hide ep_category_error" id="ep_category_<?php echo $this->_tpl_vars['skill_index']; ?>
_error">mandatory</span>
                                                    </div>

                                                    <?php endif; unset($_from); ?>
                                                    <input type="hidden" value="<?php echo $this->_tpl_vars['skill_index']; ?>
)" id="ep_category_count"/>
                                                    <br /><p class="addmore-button" id="addmore_skill_link" onclick="addnewrow(<?php echo $this->_tpl_vars['skill_index']; ?>
);" ><a class="btn btn-link btn-small"><i class="icon-plus"></i> Add skill</a></p>
                                                </div>
                                                <div class="span6 form-inline">
                                                    <label class="span4">Languages more</label>
                                                    <?php $_from = $this->_tpl_vars['language_more']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moreLanguage'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moreLanguage']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lang'] => $this->_tpl_vars['percent']):
        $this->_foreach['moreLanguage']['iteration']++;
?>
                                                    <?php $this->assign('lang_index', ($this->_foreach['moreLanguage']['iteration']-1)); ?>
                                                    <!-- Start, new language row -->
                                                    <div class="addmore form-inline span12" id="language_more_<?php echo $this->_tpl_vars['lang_index']; ?>
">
                                                        <select class="ep_langmore span4" name="language_more[]" id="ep_language_<?php echo ($this->_foreach['moreLanguage']['iteration']-1); ?>
" style="bottom:10px;position:relative;">
                                                            <option value="">S&eacute;lectionnez une langue</option>
                                                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['language_array'],'selected' => $this->_tpl_vars['lang']), $this);?>

                                                        </select>
                                                        <label for="slider-language_number_<?php echo ($this->_foreach['moreLanguage']['iteration']-1); ?>
" class="muted" style="bottom:10px;position:relative;">At :</label>
                                                        <input type="text" autocomplete="off"id="slider-language_number_<?php echo ($this->_foreach['moreLanguage']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['percent']; ?>
" name="lang_slider_more[]" style="bottom:10px;position:relative;" class="span2"/>
                                                        <button  class="close" type="button" id="language_close_<?php echo $this->_tpl_vars['lang_index']; ?>
" style="padding-right:25%" <?php if (count($this->_tpl_vars['language_more']) < 2): ?> style="display:none"<?php endif; ?>>&times;</button>
                                                        <div class="sepH_c span8">
                                                            <div id="slider-language_<?php echo ($this->_foreach['moreLanguage']['iteration']-1); ?>
" class="ui_slider2"><?php echo $this->_tpl_vars['percent']; ?>
</div>
                                                            <span class="pull-left legend muted">New</span> <span class="pull-right legend muted">Expert</span>
                                                        </div>
                                                        <br /><span class="error hide ep_language_error" id="ep_language_<?php echo ($this->_foreach['moreSkills']['iteration']-1); ?>
_error">mandatory</span>
                                                    </div>
                                                    <?php endforeach; else: ?>
                                                    <?php $this->assign('lang_index', '0'); ?>
                                                    <!-- Start, new language row -->
                                                    <div class="addmore form-inline span12" id="language_more_<?php echo $this->_tpl_vars['lang_index']; ?>
">
                                                        <select class="ep_langmore span4" name="language_more[]" id="ep_language_<?php echo $this->_tpl_vars['lang_index']; ?>
" style="bottom:10px;position:relative;">
                                                            <option value="">S&eacute;lectionnez une langue</option>
                                                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['language_array']), $this);?>

                                                        </select>
                                                        <label for="slider-language_number_<?php echo $this->_tpl_vars['lang_index']; ?>
" class="muted" style="bottom:10px;position:relative;">Votre niveau :</label>
                                                        <input type="text" autocomplete="off" id="slider-language_number_<?php echo $this->_tpl_vars['lang_index']; ?>
" value="<?php echo $this->_tpl_vars['percent']; ?>
" name="lang_slider_more[]" style="bottom:10px;position:relative;" class="span2"/>
                                                        <button  class="close" type="button" id="language_close_<?php echo $this->_tpl_vars['lang_index']; ?>
" style="padding-right:25%" <?php if (count($this->_tpl_vars['language_more']) < 2): ?> style="display:none"<?php endif; ?>>&times;</button>
                                                        <div class="sepH_c span8">
                                                            <div id="slider-language_<?php echo $this->_tpl_vars['lang_index']; ?>
" class="ui_slider2"><?php echo $this->_tpl_vars['percent']; ?>
</div>
                                                            <span class="pull-left legend muted">D&eacute;butant</span> <span class="pull-right legend muted">Expert</span>
                                                        </div>
                                                        <br /><span class="error hide ep_language_error" id="ep_language_<?php echo ($this->_foreach['moreSkills']['iteration']-1); ?>
_error">mandatory</span>
                                                    </div>
                                                    <?php endif; unset($_from); ?>
                                                    <input type="hidden" value="<?php echo $this->_tpl_vars['lang_index']; ?>
" id="ep_language_count"/>
                                                    <br/><p class="addmore-button" id="addmore_language_link" onclick="addnewLanguage(<?php echo $this->_tpl_vars['lang_index']; ?>
);"><a class="btn btn-link btn-small"><i class="icon-plus"></i>  Add language</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <input onclick="update_contrib_form(this.id,<?php echo $_GET['userId']; ?>
);" type="button" name="submit_contrib_categories_and_lang" value="Update" id="submit_contrib_categories_and_lang" class="btn btn-info pull-right gap" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of fav Category and more laungaue Form-->
                    <!-- experence form Start, Job module -->
                    <div id="" class="accordion">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#experience_form" data-parent="#contrib_edit_forms" data-toggle="collapse" class="accordion-toggle">
                                    Professional Experience and Training
                                </a>
                            </div>
                            <div class="accordion-body  in collapse" id="experience_form">
                                <div class="accordion-inner">
                                    <form name="" autocomplete="off"  >

                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="control-group">
                                                    <label class="control-label span2 offset1" for=""><strong>Professional Experience  <span class="error">*</span></strong>
                                                        <br><span id="job_error"></span>
                                                    </label>
                                                    <div class="controls span8">
                                                        <?php $_from = $this->_tpl_vars['jobDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['job_details'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['job_details']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['job']):
        $this->_foreach['job_details']['iteration']++;
?>
                                                        <?php $this->assign('job_index', ($this->_foreach['job_details']['iteration']-1)+1); ?>
                                                        <!-- Start, job row -->
                                                        <div class="addmore" id="job_more_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                            <button  class="close" type="button" id="job_close_<?php echo $this->_tpl_vars['job_index']; ?>
" rel="<?php echo $this->_tpl_vars['job']['identifier']; ?>
"  <?php if (count($this->_tpl_vars['jobDetails']) < 2): ?> style="display:none"<?php endif; ?>>&times;</button>
                                                            <label><input class="span5 job_title" type="text" autocomplete="off" id="JobName_<?php echo $this->_tpl_vars['job_index']; ?>
" value="<?php echo $this->_tpl_vars['job']['title']; ?>
" name="job_title[]" placeholder="Job Title"><span class="error hide job_title_error" id="JobName_<?php echo $this->_tpl_vars['job_index']; ?>
_error">mandatory</span></label>
                                                            <label><input class="span5 job_institute" type="text" autocomplete="off" id="CompanyName_<?php echo $this->_tpl_vars['job_index']; ?>
" value="<?php echo $this->_tpl_vars['job']['institute']; ?>
" name="job_institute[]" placeholder="Job Institute"><span class="error hide job_institute_error" id="CompanyName_<?php echo $this->_tpl_vars['job_index']; ?>
_error">mandatory</span></label>
                                                            <select class="span5 jobtypedetails ep_job" name="ep_job[]" id="ep_job_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                                <option value=" ">Select type of contract</option>
                                                                <option value="cdi" <?php if ($this->_tpl_vars['job']['contract'] == 'cdi'): ?>selected<?php endif; ?>>CDI</option>
                                                                <option value="cdd" <?php if ($this->_tpl_vars['job']['contract'] == 'cdd'): ?>selected<?php endif; ?>>CDD</option>
                                                                <option value="freelance" <?php if ($this->_tpl_vars['job']['contract'] == 'freelance'): ?>selected<?php endif; ?>>Freelance</option>
                                                                <option value="intern" <?php if ($this->_tpl_vars['job']['contract'] == 'intern'): ?>selected<?php endif; ?>>Interim</option>
                                                                <option value="stage" <?php if ($this->_tpl_vars['job']['contract'] == 'stage'): ?>selected<?php endif; ?>>Stage</option>
                                                            </select>
                                                            <span class="error hide ep_job_error" id="ep_job_<?php echo $this->_tpl_vars['job_index']; ?>
_error">mandatory</span>
                                                            <div class="clearfix">
                                                                <div class="container-field span5">
                                                                    <label>
                                                                        <span class="span3">D&eacute;but</span>
                                                                    </label>
                                                                    <select class="start_month input-small inline start_month" name="start_month[]" id="start_month_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                                        <option value="1" <?php if ($this->_tpl_vars['job']['from_month'] == '1'): ?>selected<?php endif; ?>>January</option>
                                                                        <option value="2" <?php if ($this->_tpl_vars['job']['from_month'] == '2'): ?>selected<?php endif; ?>>Febuary</option>
                                                                        <option value="3" <?php if ($this->_tpl_vars['job']['from_month'] == '3'): ?>selected<?php endif; ?>>March</option>
                                                                        <option value="4" <?php if ($this->_tpl_vars['job']['from_month'] == '4'): ?>selected<?php endif; ?>>April</option>
                                                                        <option value="5" <?php if ($this->_tpl_vars['job']['from_month'] == '5'): ?>selected<?php endif; ?>>May</option>
                                                                        <option value="6" <?php if ($this->_tpl_vars['job']['from_month'] == '6'): ?>selected<?php endif; ?>>June</option>
                                                                        <option value="7" <?php if ($this->_tpl_vars['job']['from_month'] == '7'): ?>selected<?php endif; ?>>July</option>
                                                                        <option value="8" <?php if ($this->_tpl_vars['job']['from_month'] == '8'): ?>selected<?php endif; ?>>August</option>
                                                                        <option value="9" <?php if ($this->_tpl_vars['job']['from_month'] == '9'): ?>selected<?php endif; ?>>September</option>
                                                                        <option value="10" <?php if ($this->_tpl_vars['job']['from_month'] == '10'): ?>selected<?php endif; ?>>October</option>
                                                                        <option value="11" <?php if ($this->_tpl_vars['job']['from_month'] == '11'): ?>selected<?php endif; ?>>November</option>
                                                                        <option value="12" <?php if ($this->_tpl_vars['job']['from_month'] == '12'): ?>selected<?php endif; ?>>December</option>
                                                                    </select>
                                                                    &nbsp;&nbsp;
                                                                    <select class="input-small inline start_year" name="start_year[]" id="start_year_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                                        <?php $this->assign('i', '1950'); ?>
                                                                        <?php while ($this->_tpl_vars['i'] <= 2020) { ?>
                                                                        <?php if ($this->_tpl_vars['job']['from_year'] == $this->_tpl_vars['i']): ?>
                                                                        <option value="<?php echo $this->_tpl_vars['i']; ?>
" selected><?php echo $this->_tpl_vars['i']; ?>
</option>
                                                                        <?php elseif ($this->_tpl_vars['job']['from_year'] == ' ' && ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')) == $this->_tpl_vars['i']): ?>
                                                                        <option value="<?php echo $this->_tpl_vars['i']; ?>
" selected><?php echo $this->_tpl_vars['i']; ?>
</option>
                                                                        <?php else: ?>
                                                                        <option value="<?php echo $this->_tpl_vars['i']; ?>
"><?php echo $this->_tpl_vars['i']; ?>
</option>
                                                                        <?php endif; ?>
                                                                        <?php echo $this->_tpl_vars['i']++; ?>

                                                                        <?php } ?>
                                                                    </select>
                                                                    
                                                                    <div class="collapse <?php if ($this->_tpl_vars['job']['still_working'] != 'yes'): ?> in <?php endif; ?>" id="stillWorkingThere_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                                        <label>
                                                                            <span class="span3">Fin</span>
                                                                        </label>
                                                                        <select class="end_month input-small inline end_month" name="end_month[]" id="end_month_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                                            <option value="1" <?php if ($this->_tpl_vars['job']['to_month'] == '1'): ?>selected<?php endif; ?>>January</option>
                                                                            <option value="2" <?php if ($this->_tpl_vars['job']['to_month'] == '2'): ?>selected<?php endif; ?>>Febuary</option>
                                                                            <option value="3" <?php if ($this->_tpl_vars['job']['to_month'] == '3'): ?>selected<?php endif; ?>>March</option>
                                                                            <option value="4" <?php if ($this->_tpl_vars['job']['to_month'] == '4'): ?>selected<?php endif; ?>>April</option>
                                                                            <option value="5" <?php if ($this->_tpl_vars['job']['to_month'] == '5'): ?>selected<?php endif; ?>>May</option>
                                                                            <option value="6" <?php if ($this->_tpl_vars['job']['to_month'] == '6'): ?>selected<?php endif; ?>>June</option>
                                                                            <option value="7" <?php if ($this->_tpl_vars['job']['to_month'] == '7'): ?>selected<?php endif; ?>>July</option>
                                                                            <option value="8" <?php if ($this->_tpl_vars['job']['to_month'] == '8'): ?>selected<?php endif; ?>>August</option>
                                                                            <option value="9" <?php if ($this->_tpl_vars['job']['to_month'] == '9'): ?>selected<?php endif; ?>>September</option>
                                                                            <option value="10" <?php if ($this->_tpl_vars['job']['to_month'] == '10'): ?>selected<?php endif; ?>>October</option>
                                                                            <option value="11" <?php if ($this->_tpl_vars['job']['to_month'] == '11'): ?>selected<?php endif; ?>>November</option>
                                                                            <option value="12" <?php if ($this->_tpl_vars['job']['to_month'] == '12'): ?>selected<?php endif; ?>>December</option>
                                                                        </select>
                                                                        &nbsp;&nbsp;

                                                                        <select class="input-small inline end_year" name="end_year[]" id="end_year_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                                            <?php $this->assign('j', '1950'); ?>
                                                                            <?php while ($this->_tpl_vars['j'] <= 2020) { ?>
                                                                            <?php if ($this->_tpl_vars['job']['to_year'] == $this->_tpl_vars['j']): ?>
                                                                            <option value="<?php echo $this->_tpl_vars['j']; ?>
" selected><?php echo $this->_tpl_vars['j']; ?>
</option>
                                                                            <?php elseif ($this->_tpl_vars['job']['to_year'] == ' ' && ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')) == $this->_tpl_vars['i']): ?>
                                                                            <option value="<?php echo $this->_tpl_vars['i']; ?>
" selected><?php echo $this->_tpl_vars['i']; ?>
</option>
                                                                            <?php else: ?>
                                                                            <option value="<?php echo $this->_tpl_vars['j']; ?>
"><?php echo $this->_tpl_vars['j']; ?>
</option>
                                                                            <?php endif; ?>
                                                                            <?php echo $this->_tpl_vars['j']++; ?>

                                                                            <?php } ?>
                                                                        </select>
                                                                        <!--<input class="input-small inline end_year" type="text" id="end_year_<?php echo $this->_tpl_vars['job_index']; ?>
" placeholder="Ann&eacute;e" value="<?php echo $this->_tpl_vars['job']['to_year']; ?>
" name="end_year[]" style="position:relative;top: -7px;">-->
                                                                    </div>
                                                                    <label class="uni-checkbox">
                                                                        <input type="checkbox" id="still_working_<?php echo $this->_tpl_vars['job_index']; ?>
" class="uni_style still_working" data-target="#stillWorkingThere_<?php echo $this->_tpl_vars['job_index']; ?>
" data-toggle="collapse" <?php if ($this->_tpl_vars['job']['still_working'] == 'yes'): ?> checked <?php endif; ?>  name="still_working[]">I still hold this position
                                                                    </label>
                                                                    <input type="hidden" name="job_identifier[]" value="<?php echo $this->_tpl_vars['job']['identifier']; ?>
">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end, job row -->
                                                        <?php endforeach; else: ?>
                                                        <?php $this->assign('job_index', '0'); ?>
                                                        <!-- Start, job row -->
                                                        <div class="addmore" id="job_more_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                            <button  class="close" type="button" id="job_close_<?php echo $this->_tpl_vars['job_index']; ?>
" rel="<?php echo $this->_tpl_vars['job']['identifier']; ?>
"  <?php if (count($this->_tpl_vars['jobDetails']) < 2): ?> style="display:none"<?php endif; ?>>&times;</button>
                                                            <label><input class="span5 job_title" type="text" autocomplete="off" id="JobName_<?php echo $this->_tpl_vars['job_index']; ?>
" value="<?php echo $this->_tpl_vars['job']['title']; ?>
" name="job_title[]" placeholder="Intitul&eacute; du poste"><span class="error hide job_title_error" id="JobName_<?php echo $this->_tpl_vars['job_index']; ?>
_error">mandatory</span></label>
                                                            <label><input class="span5 job_institute" type="text" autocomplete="off" id="CompanyName_<?php echo $this->_tpl_vars['job_index']; ?>
" value="<?php echo $this->_tpl_vars['job']['institute']; ?>
" name="job_institute[]" placeholder="Nom de l'entreprise"><span class="error hide job_institute_error" id="CompanyName_<?php echo $this->_tpl_vars['job_index']; ?>
_error">mandatory</span></label>
                                                            <select class="span5 jobtypedetails ep_job" name="ep_job[]" id="ep_job_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                                <option value=" ">Select the type of Contract</option>
                                                                <option value="cdi" <?php if ($this->_tpl_vars['job']['contract'] == 'cdi'): ?>selected<?php endif; ?>>CDI</option>
                                                                <option value="cdd" <?php if ($this->_tpl_vars['job']['contract'] == 'cdd'): ?>selected<?php endif; ?>>CDD</option>
                                                                <option value="freelance" <?php if ($this->_tpl_vars['job']['contract'] == 'freelance'): ?>selected<?php endif; ?>>Freelance</option>
                                                                <option value="intern" <?php if ($this->_tpl_vars['job']['contract'] == 'intern'): ?>selected<?php endif; ?>>Interim</option>
                                                                <option value="stage" <?php if ($this->_tpl_vars['job']['contract'] == 'stage'): ?>selected<?php endif; ?>>Stage</option>
                                                            </select>
                                                            <span class="error hide ep_job_error" id="ep_job_<?php echo $this->_tpl_vars['job_index']; ?>
_error">mandatory</span>
                                                            <div class="clearfix">
                                                                <div class="container-field span5">
                                                                    <label>
                                                                        <span class="span3">D&eacute;but</span>
                                                                    </label>
                                                                    <select class="start_month input-small inline start_month" name="start_month[]" id="start_month_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                                        <option value="1" <?php if ($this->_tpl_vars['job']['from_month'] == '1'): ?>selected<?php endif; ?>>January</option>
                                                                        <option value="2" <?php if ($this->_tpl_vars['job']['from_month'] == '2'): ?>selected<?php endif; ?>>Febuary</option>
                                                                        <option value="3" <?php if ($this->_tpl_vars['job']['from_month'] == '3'): ?>selected<?php endif; ?>>March</option>
                                                                        <option value="4" <?php if ($this->_tpl_vars['job']['from_month'] == '4'): ?>selected<?php endif; ?>>April</option>
                                                                        <option value="5" <?php if ($this->_tpl_vars['job']['from_month'] == '5'): ?>selected<?php endif; ?>>May</option>
                                                                        <option value="6" <?php if ($this->_tpl_vars['job']['from_month'] == '6'): ?>selected<?php endif; ?>>June</option>
                                                                        <option value="7" <?php if ($this->_tpl_vars['job']['from_month'] == '7'): ?>selected<?php endif; ?>>July</option>
                                                                        <option value="8" <?php if ($this->_tpl_vars['job']['from_month'] == '8'): ?>selected<?php endif; ?>>August</option>
                                                                        <option value="9" <?php if ($this->_tpl_vars['job']['from_month'] == '9'): ?>selected<?php endif; ?>>September</option>
                                                                        <option value="10" <?php if ($this->_tpl_vars['job']['from_month'] == '10'): ?>selected<?php endif; ?>>October</option>
                                                                        <option value="11" <?php if ($this->_tpl_vars['job']['from_month'] == '11'): ?>selected<?php endif; ?>>November</option>
                                                                        <option value="12" <?php if ($this->_tpl_vars['job']['from_month'] == '12'): ?>selected<?php endif; ?>>December</option>
                                                                    </select>
                                                                    &nbsp;&nbsp;
                                                                    <select class="input-small inline start_year" name="start_year[]" id="start_year_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                                        <?php $this->assign('i', '1950'); ?>
                                                                        <?php while ($this->_tpl_vars['i'] <= 2020) { ?>
                                                                        <?php if ($this->_tpl_vars['job']['from_year'] == $this->_tpl_vars['i']): ?>
                                                                        <option value="<?php echo $this->_tpl_vars['i']; ?>
" selected><?php echo $this->_tpl_vars['i']; ?>
</option>
                                                                        <?php elseif ($this->_tpl_vars['job']['from_year'] == ' ' && ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')) == $this->_tpl_vars['i']): ?>
                                                                        <option value="<?php echo $this->_tpl_vars['i']; ?>
" selected><?php echo $this->_tpl_vars['i']; ?>
</option>
                                                                        <?php else: ?>
                                                                        <option value="<?php echo $this->_tpl_vars['i']; ?>
"><?php echo $this->_tpl_vars['i']; ?>
</option>
                                                                        <?php endif; ?>
                                                                        <?php echo $this->_tpl_vars['i']++; ?>

                                                                        <?php } ?>
                                                                    </select>
                                                                    
                                                                    <div class="collapse <?php if ($this->_tpl_vars['job']['still_working'] != 'yes'): ?> in <?php endif; ?>" id="stillWorkingThere_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                                        <label>
                                                                            <span class="span3">Fin</span>
                                                                        </label>
                                                                        <select class="end_month input-small inline end_month" name="end_month[]" id="end_month_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                                            <option value="1" <?php if ($this->_tpl_vars['job']['to_month'] == '1'): ?>selected<?php endif; ?>>January</option>
																			<option value="2" <?php if ($this->_tpl_vars['job']['to_month'] == '2'): ?>selected<?php endif; ?>>Febuary</option>
																			<option value="3" <?php if ($this->_tpl_vars['job']['to_month'] == '3'): ?>selected<?php endif; ?>>March</option>
																			<option value="4" <?php if ($this->_tpl_vars['job']['to_month'] == '4'): ?>selected<?php endif; ?>>April</option>
																			<option value="5" <?php if ($this->_tpl_vars['job']['to_month'] == '5'): ?>selected<?php endif; ?>>May</option>
																			<option value="6" <?php if ($this->_tpl_vars['job']['to_month'] == '6'): ?>selected<?php endif; ?>>June</option>
																			<option value="7" <?php if ($this->_tpl_vars['job']['to_month'] == '7'): ?>selected<?php endif; ?>>July</option>
																			<option value="8" <?php if ($this->_tpl_vars['job']['to_month'] == '8'): ?>selected<?php endif; ?>>August</option>
																			<option value="9" <?php if ($this->_tpl_vars['job']['to_month'] == '9'): ?>selected<?php endif; ?>>September</option>
																			<option value="10" <?php if ($this->_tpl_vars['job']['to_month'] == '10'): ?>selected<?php endif; ?>>October</option>
																			<option value="11" <?php if ($this->_tpl_vars['job']['to_month'] == '11'): ?>selected<?php endif; ?>>November</option>
																			<option value="12" <?php if ($this->_tpl_vars['job']['to_month'] == '12'): ?>selected<?php endif; ?>>December</option>
																		</select>
                                                                        &nbsp;&nbsp;

                                                                        <select class="input-small inline end_year" name="end_year[]" id="end_year_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                                                            <?php $this->assign('j', '1950'); ?>
                                                                            <?php while ($this->_tpl_vars['j'] <= 2020) { ?>
                                                                            <?php if ($this->_tpl_vars['job']['to_year'] == $this->_tpl_vars['j']): ?>
                                                                            <option value="<?php echo $this->_tpl_vars['j']; ?>
" selected><?php echo $this->_tpl_vars['j']; ?>
</option>
                                                                            <?php elseif ($this->_tpl_vars['job']['to_year'] == ' ' && ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')) == $this->_tpl_vars['i']): ?>
                                                                            <option value="<?php echo $this->_tpl_vars['i']; ?>
" selected><?php echo $this->_tpl_vars['i']; ?>
</option>
                                                                            <?php else: ?>
                                                                            <option value="<?php echo $this->_tpl_vars['j']; ?>
"><?php echo $this->_tpl_vars['j']; ?>
</option>
                                                                            <?php endif; ?>
                                                                            <?php echo $this->_tpl_vars['j']++; ?>

                                                                            <?php } ?>
                                                                        </select>
                                                                        <!--<input class="input-small inline end_year" type="text" id="end_year_<?php echo $this->_tpl_vars['job_index']; ?>
" placeholder="Ann&eacute;e" value="<?php echo $this->_tpl_vars['job']['to_year']; ?>
" name="end_year[]" style="position:relative;top: -7px;">-->
                                                                    </div>
                                                                    <label class="uni-checkbox">
                                                                        <input type="checkbox" id="still_working_<?php echo $this->_tpl_vars['job_index']; ?>
" class="uni_style still_working" data-target="#stillWorkingThere_<?php echo $this->_tpl_vars['job_index']; ?>
" data-toggle="collapse" <?php if ($this->_tpl_vars['job']['still_working'] == 'yes'): ?> checked <?php endif; ?>  name="still_working[]">I still hold this position
                                                                    </label>
                                                                    <input type="hidden" name="job_identifier[]" value="<?php echo $this->_tpl_vars['job']['identifier']; ?>
">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end, job row -->
                                                        <?php endif; unset($_from); ?>
                                                        <input type="hidden" id="experience_count" value="<?php echo $this->_tpl_vars['job_index']; ?>
" />
                                                        <p class="addmore-button" id="addmore_job_link" onclick="addJob(<?php echo $this->_tpl_vars['job_index']; ?>
);"><a class="btn btn-link btn-small"><i class="icon-plus"></i> Add Experience</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End, Job -->
                                        <hr />
                                        <!-- Start, Training module -->
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="control-group">
                                                    <label class="control-label span2 offset1" for=""><strong>Training <span class="error">*</span></strong>
                                                        <br><span id="edu_error"></span>
                                                    </label>
                                                    <div class="controls span8">
                                                        <?php $_from = $this->_tpl_vars['educationDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['edu_details'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['edu_details']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['education']):
        $this->_foreach['edu_details']['iteration']++;
?>
                                                        <?php $this->assign('edu_index', ($this->_foreach['edu_details']['iteration']-1)+1); ?>
                                                        <!-- Start, School row -->
                                                        <div class="addmore" id="training_more_<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                                            <button  class="close" type="button" id="training_close_<?php echo $this->_tpl_vars['edu_index']; ?>
" rel="<?php echo $this->_tpl_vars['education']['identifier']; ?>
" <?php if (count($this->_tpl_vars['educationDetails']) < 2): ?> style="display:none"<?php endif; ?>>&times;</button>
                                                            <label><input class="span5 training_title" type="text" autocomplete="off" id="trainingName_<?php echo $this->_tpl_vars['edu_index']; ?>
" value="<?php echo $this->_tpl_vars['education']['title']; ?>
" name="training_title[]" placeholder="Course title"><span class="error hide training_title_error" id="trainingName_<?php echo $this->_tpl_vars['edu_index']; ?>
_error">mandatory</span></label>
                                                            <label><input class="span5 training_institute" type="text" autocomplete="off" id="trainingSchoolName_<?php echo $this->_tpl_vars['edu_index']; ?>
" value="<?php echo $this->_tpl_vars['education']['institute']; ?>
" name="training_institute[]" placeholder="School, university, etc..."><span class="error hide training_institute_error" id="trainingSchoolName_<?php echo $this->_tpl_vars['edu_index']; ?>
_error">mandatory</span></label>
                                                            <div class="clearfix">
                                                                <div class="container-field span5">
                                                                    <label>
                                                                        <span class="span3">D&eacute;but</span>
                                                                    </label>
                                                                    <select class="start_train_month input-small inline" name="start_train_month[]" id="start_train_month_<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                                                         <option value="1" <?php if ($this->_tpl_vars['education']['from_month'] == '1'): ?>selected<?php endif; ?>>January</option>
																			<option value="2" <?php if ($this->_tpl_vars['education']['from_month'] == '2'): ?>selected<?php endif; ?>>Febuary</option>
																			<option value="3" <?php if ($this->_tpl_vars['education']['from_month'] == '3'): ?>selected<?php endif; ?>>March</option>
																			<option value="4" <?php if ($this->_tpl_vars['education']['from_month'] == '4'): ?>selected<?php endif; ?>>April</option>
																			<option value="5" <?php if ($this->_tpl_vars['education']['from_month'] == '5'): ?>selected<?php endif; ?>>May</option>
																			<option value="6" <?php if ($this->_tpl_vars['education']['from_month'] == '6'): ?>selected<?php endif; ?>>June</option>
																			<option value="7" <?php if ($this->_tpl_vars['education']['from_month'] == '7'): ?>selected<?php endif; ?>>July</option>
																			<option value="8" <?php if ($this->_tpl_vars['education']['from_month'] == '8'): ?>selected<?php endif; ?>>August</option>
																			<option value="9" <?php if ($this->_tpl_vars['education']['from_month'] == '9'): ?>selected<?php endif; ?>>September</option>
																			<option value="10" <?php if ($this->_tpl_vars['education']['from_month'] == '10'): ?>selected<?php endif; ?>>October</option>
																			<option value="11" <?php if ($this->_tpl_vars['education']['from_month'] == '11'): ?>selected<?php endif; ?>>November</option>
																			<option value="12" <?php if ($this->_tpl_vars['education']['from_month'] == '12'): ?>selected<?php endif; ?>>December</option>
                                                                    </select>
                                                                    &nbsp;&nbsp;
                                                                    <select class="input-small inline start_train_year" name="start_train_year[]" id="start_train_year_<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                                                        <?php $this->assign('k', '1950'); ?>
                                                                        <?php while ($this->_tpl_vars['k'] <= 2020) { ?>
                                                                        <?php if ($this->_tpl_vars['education']['from_year'] == $this->_tpl_vars['k']): ?>
                                                                        <option value="<?php echo $this->_tpl_vars['k']; ?>
" selected><?php echo $this->_tpl_vars['k']; ?>
</option>
                                                                        <?php else: ?>
                                                                        <option value="<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['k']; ?>
</option>
                                                                        <?php endif; ?>
                                                                        <?php echo $this->_tpl_vars['k']++; ?>

                                                                        <?php } ?>
                                                                    </select>
                                                                    <!--<input class="input-small inline" type="text" placeholder="Ann&eacute;e" id="start_train_year_<?php echo $this->_tpl_vars['edu_index']; ?>
" value="<?php echo $this->_tpl_vars['education']['from_year']; ?>
" name="start_train_year[]" style="position:relative;top: -7px;">-->

                                                                    <div class="collapse  <?php if ($this->_tpl_vars['education']['still_working'] != 'yes'): ?> in <?php endif; ?>" id="stillTrainingThere_<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                                                        <label>
                                                                            <span class="span3">Fin</span>
                                                                        </label>
                                                                        <select class="end_train_month input-small inline" name="end_train_month[]" id="end_train_month_<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                                                            <option value="1" <?php if ($this->_tpl_vars['education']['to_month'] == '1'): ?>selected<?php endif; ?>>January</option>
																			<option value="2" <?php if ($this->_tpl_vars['education']['to_month'] == '2'): ?>selected<?php endif; ?>>Febuary</option>
																			<option value="3" <?php if ($this->_tpl_vars['education']['to_month'] == '3'): ?>selected<?php endif; ?>>March</option>
																			<option value="4" <?php if ($this->_tpl_vars['education']['to_month'] == '4'): ?>selected<?php endif; ?>>April</option>
																			<option value="5" <?php if ($this->_tpl_vars['education']['to_month'] == '5'): ?>selected<?php endif; ?>>May</option>
																			<option value="6" <?php if ($this->_tpl_vars['education']['to_month'] == '6'): ?>selected<?php endif; ?>>June</option>
																			<option value="7" <?php if ($this->_tpl_vars['education']['to_month'] == '7'): ?>selected<?php endif; ?>>July</option>
																			<option value="8" <?php if ($this->_tpl_vars['education']['to_month'] == '8'): ?>selected<?php endif; ?>>August</option>
																			<option value="9" <?php if ($this->_tpl_vars['education']['to_month'] == '9'): ?>selected<?php endif; ?>>September</option>
																			<option value="10" <?php if ($this->_tpl_vars['education']['to_month'] == '10'): ?>selected<?php endif; ?>>October</option>
																			<option value="11" <?php if ($this->_tpl_vars['education']['to_month'] == '11'): ?>selected<?php endif; ?>>November</option>
																			<option value="12" <?php if ($this->_tpl_vars['education']['to_month'] == '12'): ?>selected<?php endif; ?>>December</option>
                                                                        </select>
                                                                        &nbsp;&nbsp;
                                                                        <select class="input-small inline end_train_year" name="end_train_year[]" id="end_train_year<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                                                            <?php $this->assign('l', '1950'); ?>
                                                                            <?php while ($this->_tpl_vars['l'] <= 2020) { ?>
                                                                            <?php if ($this->_tpl_vars['education']['from_year'] == $this->_tpl_vars['l']): ?>
                                                                            <option value="<?php echo $this->_tpl_vars['l']; ?>
" selected><?php echo $this->_tpl_vars['l']; ?>
</option>
                                                                            <?php else: ?>
                                                                            <option value="<?php echo $this->_tpl_vars['l']; ?>
"><?php echo $this->_tpl_vars['l']; ?>
</option>
                                                                            <?php endif; ?>
                                                                            <?php echo $this->_tpl_vars['l']++; ?>

                                                                            <?php } ?>
                                                                        </select>
                                                                        <!--<input class="input-small inline" type="text" id="end_train_year_<?php echo $this->_tpl_vars['edu_index']; ?>
" placeholder="Ann&eacute;e" value="<?php echo $this->_tpl_vars['education']['to_year']; ?>
" name="end_train_year[]" style="position:relative;top: -5px;">-->
                                                                    </div>
                                                                    <label class="uni-checkbox">
                                                                        <input type="checkbox" id="still_training_<?php echo $this->_tpl_vars['edu_index']; ?>
" class="uni_style still_training" data-target="#stillTrainingThere_<?php echo $this->_tpl_vars['edu_index']; ?>
" name="still_training[]" data-toggle="collapse" <?php if ($this->_tpl_vars['education']['still_working'] == 'yes'): ?> checked <?php endif; ?>>I'm still in training
                                                                    </label>
                                                                    <input type="hidden" name="training_identifier[]" value="<?php echo $this->_tpl_vars['education']['identifier']; ?>
">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end, school row -->
                                                        <?php endforeach; else: ?>
                                                        <?php $this->assign('edu_index', '0'); ?>
                                                        <!-- Start, School row -->
                                                        <div class="addmore" id="training_more_<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                                            <button  class="close" type="button" id="training_close_<?php echo $this->_tpl_vars['edu_index']; ?>
" rel="<?php echo $this->_tpl_vars['education']['identifier']; ?>
" <?php if (count($this->_tpl_vars['educationDetails']) < 2): ?> style="display:none"<?php endif; ?>>&times;</button>
                                                            <label><input class="span5 training_title" type="text" autocomplete="off" id="trainingName_<?php echo $this->_tpl_vars['edu_index']; ?>
" value="<?php echo $this->_tpl_vars['education']['title']; ?>
" name="training_title[]" placeholder="Intitul&eacute; de la formation"><span class="error hide training_title_error" id="trainingName_<?php echo $this->_tpl_vars['edu_index']; ?>
_error">mandatory</span></label>
                                                            <label><input class="span5 training_institute" type="text" autocomplete="off" id="trainingSchoolName_<?php echo $this->_tpl_vars['edu_index']; ?>
" value="<?php echo $this->_tpl_vars['education']['institute']; ?>
" name="training_institute[]" placeholder="Ecole, universit&eacute;, etc..."><span class="error hide training_institute_error" id="trainingSchoolName_<?php echo $this->_tpl_vars['edu_index']; ?>
_error">mandatory</span></label>
                                                            <div class="clearfix">
                                                                <div class="container-field span5">
                                                                    <label>
                                                                        <span class="span3">New</span>
                                                                    </label>
                                                                    <select class="start_train_month input-small inline" name="start_train_month[]" id="start_train_month_<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                                                         <option value="1" <?php if ($this->_tpl_vars['education']['from_month'] == '1'): ?>selected<?php endif; ?>>January</option>
																			<option value="2" <?php if ($this->_tpl_vars['education']['from_month'] == '2'): ?>selected<?php endif; ?>>Febuary</option>
																			<option value="3" <?php if ($this->_tpl_vars['education']['from_month'] == '3'): ?>selected<?php endif; ?>>March</option>
																			<option value="4" <?php if ($this->_tpl_vars['education']['from_month'] == '4'): ?>selected<?php endif; ?>>April</option>
																			<option value="5" <?php if ($this->_tpl_vars['education']['from_month'] == '5'): ?>selected<?php endif; ?>>May</option>
																			<option value="6" <?php if ($this->_tpl_vars['education']['from_month'] == '6'): ?>selected<?php endif; ?>>June</option>
																			<option value="7" <?php if ($this->_tpl_vars['education']['from_month'] == '7'): ?>selected<?php endif; ?>>July</option>
																			<option value="8" <?php if ($this->_tpl_vars['education']['from_month'] == '8'): ?>selected<?php endif; ?>>August</option>
																			<option value="9" <?php if ($this->_tpl_vars['education']['from_month'] == '9'): ?>selected<?php endif; ?>>September</option>
																			<option value="10" <?php if ($this->_tpl_vars['education']['from_month'] == '10'): ?>selected<?php endif; ?>>October</option>
																			<option value="11" <?php if ($this->_tpl_vars['education']['from_month'] == '11'): ?>selected<?php endif; ?>>November</option>
																			<option value="12" <?php if ($this->_tpl_vars['education']['from_month'] == '12'): ?>selected<?php endif; ?>>December</option>
                                                                    </select>
                                                                    &nbsp;&nbsp;
                                                                    <select class="input-small inline start_train_year" name="start_train_year[]" id="start_train_year_<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                                                        <?php $this->assign('k', '1950'); ?>
                                                                        <?php while ($this->_tpl_vars['k'] <= 2020) { ?>
                                                                        <?php if ($this->_tpl_vars['education']['from_year'] == $this->_tpl_vars['k']): ?>
                                                                        <option value="<?php echo $this->_tpl_vars['k']; ?>
" selected><?php echo $this->_tpl_vars['k']; ?>
</option>
                                                                        <?php else: ?>
                                                                        <option value="<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['k']; ?>
</option>
                                                                        <?php endif; ?>
                                                                        <?php echo $this->_tpl_vars['k']++; ?>

                                                                        <?php } ?>
                                                                    </select>
                                                                    <!--<input class="input-small inline" type="text" placeholder="Ann&eacute;e" id="start_train_year_<?php echo $this->_tpl_vars['edu_index']; ?>
" value="<?php echo $this->_tpl_vars['education']['from_year']; ?>
" name="start_train_year[]" style="position:relative;top: -7px;">-->

                                                                    <div class="collapse  <?php if ($this->_tpl_vars['education']['still_working'] != 'yes'): ?> in <?php endif; ?>" id="stillTrainingThere_<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                                                        <label>
                                                                            <span class="span3">Fin</span>
                                                                        </label>
                                                                        <select class="end_train_month input-small inline" name="end_train_month[]" id="end_train_month_<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                                                            <option value="1" <?php if ($this->_tpl_vars['education']['to_month'] == '1'): ?>selected<?php endif; ?>>January</option>
                                                                            <option value="2" <?php if ($this->_tpl_vars['education']['to_month'] == '2'): ?>selected<?php endif; ?>>Febuary</option>
                                                                            <option value="3" <?php if ($this->_tpl_vars['education']['to_month'] == '3'): ?>selected<?php endif; ?>>March</option>
                                                                            <option value="4" <?php if ($this->_tpl_vars['education']['to_month'] == '4'): ?>selected<?php endif; ?>>April</option>
                                                                            <option value="5" <?php if ($this->_tpl_vars['education']['to_month'] == '5'): ?>selected<?php endif; ?>>May</option>
                                                                            <option value="6" <?php if ($this->_tpl_vars['education']['to_month'] == '6'): ?>selected<?php endif; ?>>June</option>
                                                                            <option value="7" <?php if ($this->_tpl_vars['education']['to_month'] == '7'): ?>selected<?php endif; ?>>July</option>
                                                                            <option value="8" <?php if ($this->_tpl_vars['education']['to_month'] == '8'): ?>selected<?php endif; ?>>August</option>
                                                                            <option value="9" <?php if ($this->_tpl_vars['education']['to_month'] == '9'): ?>selected<?php endif; ?>>September</option>
                                                                            <option value="10" <?php if ($this->_tpl_vars['education']['to_month'] == '10'): ?>selected<?php endif; ?>>October</option>
                                                                            <option value="11" <?php if ($this->_tpl_vars['education']['to_month'] == '11'): ?>selected<?php endif; ?>>November</option>
                                                                            <option value="12" <?php if ($this->_tpl_vars['education']['to_month'] == '12'): ?>selected<?php endif; ?>>December</option>
                                                                        </select>
                                                                        &nbsp;&nbsp;
                                                                        <select class="input-small inline end_train_year" name="end_train_year[]" id="end_train_year<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                                                            <?php $this->assign('l', '1950'); ?>
                                                                            <?php while ($this->_tpl_vars['l'] <= 2020) { ?>
                                                                            <?php if ($this->_tpl_vars['education']['from_year'] == $this->_tpl_vars['l']): ?>
                                                                            <option value="<?php echo $this->_tpl_vars['l']; ?>
" selected><?php echo $this->_tpl_vars['l']; ?>
</option>
                                                                            <?php else: ?>
                                                                            <option value="<?php echo $this->_tpl_vars['l']; ?>
"><?php echo $this->_tpl_vars['l']; ?>
</option>
                                                                            <?php endif; ?>
                                                                            <?php echo $this->_tpl_vars['l']++; ?>

                                                                            <?php } ?>
                                                                        </select>
                                                                        <!--<input class="input-small inline" type="text" id="end_train_year_<?php echo $this->_tpl_vars['edu_index']; ?>
" placeholder="Ann&eacute;e" value="<?php echo $this->_tpl_vars['education']['to_year']; ?>
" name="end_train_year[]" style="position:relative;top: -5px;">-->
                                                                    </div>
                                                                    <label class="uni-checkbox">
                                                                        <input type="checkbox" id="still_training_<?php echo $this->_tpl_vars['edu_index']; ?>
" class="uni_style still_training" data-target="#stillTrainingThere_<?php echo $this->_tpl_vars['edu_index']; ?>
" name="still_training[]" data-toggle="collapse" <?php if ($this->_tpl_vars['education']['still_working'] == 'yes'): ?> checked <?php endif; ?>>Still in training
                                                                    </label>
                                                                    <input type="hidden" name="training_identifier[]" value="<?php echo $this->_tpl_vars['education']['identifier']; ?>
">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end, school row -->
                                                        <?php endif; unset($_from); ?>
                                                        <input type="hidden" id="training_count" value="<?php echo $this->_tpl_vars['edu_index']; ?>
" />
                                                        <p class="addmore-button" id="addmore_training_link" onclick="addTraining(<?php echo $this->_tpl_vars['edu_index']; ?>
);" ><a  class="btn btn-link btn-small"><i class="icon-plus"></i> Add Training</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End, Training module -->

                                        <input onclick="update_contrib_form(this.id,<?php echo $_GET['userId']; ?>
);" type="button" name="submit_contrib_experience" value="Update" id="submit_contrib_experience" class="btn btn-info pull-right gap" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- experence form Start, Job module -->
                    <!-- payment info anf RIB info -->
                    <div id="" class="accordion">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#payment_info_form" data-parent="#contrib_edit_forms" data-toggle="collapse" class="accordion-toggle">
                                    <!--Informations de facturation and-->  Choice of compensation
                                </a>
                            </div>
                            <div class="accordion-body in collapse" id="payment_info_form">
                                <div class="accordion-inner">
                                    <form name="" autocomplete="off"  >
                                        <!-- Start, billing info module -->
                                                                                <!-- Start, payment info module -->
                                        <div class="formSep">
                                            <div class="row-fluid">
                                                <div class="control-group">
                                                    <label class="control-label span2 offset1" for=""><strong>Choice of compensation <?php if ($_GET['profile'] == 'invoice'): ?><span class="error">*</span><?php endif; ?> </strong></label>
                                                    <div class="controls span8">
                                                        <label class="uni-radio">
                                                            <input type="radio" value="paypal" class="uni_style" <?php if ($this->_tpl_vars['payment_type'] == 'paypal'): ?>checked class="collapsed"<?php endif; ?> name="payment_type">Paypal
                                                        </label>
                                                        <!-- if Payapl is true, display the input "paypal email" -->
                                                        <?php if ($this->_tpl_vars['payment_type'] == 'paypal'): ?><?php $this->assign('style_pp', 'style="display:block"'); ?><?php else: ?><?php $this->assign('style_pp', 'style="display:none"'); ?><?php endif; ?>
                                                        <div id="paypalEmail"   <?php echo $this->_tpl_vars['style_pp']; ?>
><!-- class="collapse <?php if ($this->_tpl_vars['payment_type'] == 'paypal'): ?>in<?php endif; ?> out"  -->
                                                            <i class="icon-arrow-right"></i> <input type="text" autocomplete="off" class="span4" placeholder="paypal email" name="paypal_id" id="paypal_id" value="<?php echo $this->_tpl_vars['paypal_id']; ?>
"><span class="error hide" id="paypal_id_error">Manditory Field</span>

                                                        </div>
                                                        <br />
                                                        <label class="uni-radio" id="cheque_radio" <?php if ($this->_tpl_vars['pay_info_type'] == 'out_france' || $this->_tpl_vars['user_detail'][0]['country'] != 38): ?> style="display:none" <?php endif; ?>>
                                                        <input type="radio" value="cheque" class="uni_style" <?php if ($this->_tpl_vars['payment_type'] == 'cheque'): ?>checked<?php endif; ?> name="payment_type" >Ch&egrave;que
                                                        </label>
                                                        <br />
                                                        <label class="uni-radio">
                                                            <input type="radio" value="virement" class="uni_style" <?php if ($this->_tpl_vars['payment_type'] == 'virement'): ?>checked<?php endif; ?> name="payment_type" >Virement bancaire<!--data-target="#virementId" data-toggle="collapse"-->
                                                        </label>
                                                        <!-- if virement is true, display the input "paypal email" -->
                                                        <?php if ($this->_tpl_vars['payment_type'] == 'virement'): ?><?php $this->assign('style_vi', 'style="display:block"'); ?><?php else: ?><?php $this->assign('style_vi', 'style="display:none"'); ?><?php endif; ?>
                                                        <div id="virementId" <?php echo $this->_tpl_vars['style_vi']; ?>
 > <!-- class="collapse <?php if ($this->_tpl_vars['payment_type'] == 'virement'): ?>in<?php endif; ?> out"  -->
                                                            <input type="hidden" value="<?php echo $this->_tpl_vars['user_detail'][0]['country']; ?>
" id="virement_country" name="virement_country"/>
                                                            <input type="hidden" value="<?php echo $this->_tpl_vars['pay_info_type']; ?>
" id="pay_info_type" name="pay_info_type"/>
                                                            <?php if ($this->_tpl_vars['pay_info_type'] != 'out_france' && $this->_tpl_vars['payment_type'] == 'virement' && $this->_tpl_vars['user_detail'][0]['country'] == 38): ?><?php $this->assign('style1', 'style="display:block"'); ?><?php else: ?><?php $this->assign('style1', 'style="display:none"'); ?><?php endif; ?>
                                                            <div id="c_france" <?php echo $this->_tpl_vars['style1']; ?>
>
                                                                <br />
                                                                <i class="icon-arrow-right"></i>
                                                                <input type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['rib_id_1']; ?>
"  placeholder="Name is complimentary" name="rib_id_1" id="rib_id_1"/>
                                                                <span class="error hide" id="rib_id_1_error">mandatory</span>
                                                                <br />
                                                                <i class="icon-arrow-right"></i>
                                                                <input type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['rib_id_2']; ?>
"  placeholder="Bank code" name="rib_id_2" id="rib_id_2"/>
                                                                <span class="error hide" id="rib_id_2_error">mandatory</span>
                                                                <br />
                                                                <i class="icon-arrow-right"></i>
                                                                <input type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['rib_id_3']; ?>
"  placeholder="Counter Code" name="rib_id_3" id="rib_id_3"/>
                                                                <span class="error hide" id="rib_id_3_error">mandatory</span>
                                                                <br />
                                                                <i class="icon-arrow-right"></i>
                                                                <input type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['rib_id_4']; ?>
"  placeholder="Account number" name="rib_id_4" id="rib_id_4"/>
                                                                <span class="error hide" id="rib_id_4_error">mandatory</span>
                                                                <br />
                                                                <i class="icon-arrow-right"></i>
                                                                <input type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['rib_id_5']; ?>
"  placeholder="key RIB" name="rib_id_5"  id="rib_id_5"/>
                                                                <span class="error hide" id="rib_id_5_error">mandatory</span>
                                                            </div>
                                                            <?php if (( $this->_tpl_vars['pay_info_type'] == 'out_france' && $this->_tpl_vars['payment_type'] == 'virement' ) || $this->_tpl_vars['user_detail'][0]['country'] != 38): ?><?php $this->assign('style2', 'style="display:block"'); ?><?php else: ?><?php $this->assign('style2', 'style="display:none"'); ?><?php endif; ?>
                                                            <div  id="c_out_france" <?php echo $this->_tpl_vars['style2']; ?>
>
                                                                <i class="icon-arrow-right"></i>
                                                                <input type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['rib_id_6']; ?>
"  placeholder="BIC" name="rib_id_6" id="rib_id_6"/>
                                                                <span class="error hide" id="rib_id_6_error">mandatory</span>
                                                                <br />
                                                                <i class="icon-arrow-right"></i>
                                                                <input type="text" autocomplete="off" value="<?php echo $this->_tpl_vars['rib_id_7']; ?>
"  placeholder="IBAN" name="rib_id_7" id="rib_id_7"/>
                                                                <span class="error hide" id="rib_id_7_error">mandatory</span>

                                                            </div>
                                                        </div>
                                                        <br>
                                                        <span class="error hide" id="payment_type_error">Manditory Field</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input onclick="update_contrib_form(this.id,<?php echo $_GET['userId']; ?>
);" type="button" name="submit_contrib_payment_info_form" value="Update" id="submit_contrib_payment_info_form" class="btn btn-info pull-right gap" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of payment info anf RIB info -->
                    <!-- registraion/passport extra details-->
                                    </div>
                <!-- User test -->
                <div class="formSep hide">
                    <div class="row-fluid">
                        <div class="span6 form-inline" id="remarksblock" <?php if ($this->_tpl_vars['user_detail'][0]['contributortest'] == 'no'): ?>style="display:none;"<?php endif; ?>>
                            <div style="float:left">
                                <textarea name="contributortestcomment" id="contributortestcomment" placeholder="Commentaire (mandatory, 70 caract&egrave;res minimum)" rows="5" style="width:300px"><?php echo $this->_tpl_vars['user_detail'][0]['contributortestcomment']; ?>
</textarea>
                                <span id="contributortestcomment_count" style="vertical-align:top"></span>
                            </div>

                        </div>
                    </div>
                </div>

                <!------------------------------------------------------------- Contributor view ---------------------------------------------------->
                <div id="viewcontrib" class="tab-pane">
                    <?php echo '<style>#view_table td{text-align: left;}</style>'; ?>

                    <table class="table table-striped table-bordered table-condensed span8" id="view_table" >
                        <tr>
                            <td colspan="2">
                                <div class="row-fluid ">
                                    <div class="pull-left">
                                        <h3 ><?php if ($this->_tpl_vars['user_detail'][0]['first_name'] != ''): ?>
                                            <?php echo $this->_tpl_vars['user_detail'][0]['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['user_detail'][0]['last_name']; ?>

                                            <?php else: ?>
                                            <?php echo $this->_tpl_vars['user_detail'][0]['email']; ?>

                                            <?php endif; ?> </h3>
                                        <div style="height:10px;"></div>
                                        <!--<button onclick="EditContribInfo('<?php echo $this->_tpl_vars['user_detail'][0]['user_id']; ?>
');" class="btn btn-info" name="editcontrib" type="button"> Edit profile</button>-->
                                        <a data-toggle="modal" data-target="#showhistory" href="/user/user-history?user=<?php echo $this->_tpl_vars['user_detail'][0]['user_id']; ?>
" class="btn btn-success">history</a>
                                        <a class="btn btn-warning" data-hint="Commenter"  data-target="#comments" data-toggle="modal"  name="send_comment"  href="/proofread/getallbousercomments?userId=<?php echo $this->_tpl_vars['user_detail'][0]['user_id']; ?>
" >Comment</a>
                                        <button onclick="connect_fo('contrib');" class="btn btn-danger" name="editclient" type="button"> Connect to fo </button>
                                    </div>
                                    <div class="pull-right " style="height:70px;">
                                        <img alt="contributor pic" src="<?php echo $this->_tpl_vars['user_pic']; ?>
" class="fileupload-new thumbnail1 pull-right">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td  colspan="2" >
                                <div class="row-fluid">
                                    <h4>INFORMATIONS PERSONNELLES</h4>
                                    <dl>
                                        <dd><strong>Email :</strong> <?php echo $this->_tpl_vars['user_detail'][0]['email']; ?>
</dd>
                                        <?php if ($this->_tpl_vars['groupId'] == 1): ?>
                                        <dd><strong>Password :</strong> <?php echo $this->_tpl_vars['user_detail'][0]['password']; ?>
</dd>
                                        <?php endif; ?>
                                        <br />
                                        <dd><strong>Birth of date :</strong> <?php echo ((is_array($_tmp=$this->_tpl_vars['user_detail'][0]['dob'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</dd>
                                        <dd><strong>Mother Tounge 1 :</strong> <?php echo $this->_tpl_vars['language']; ?>
</dd>
                                        <dd><strong>Known Laungauge :</strong> <?php echo ((is_array($_tmp=$this->_tpl_vars['user_detail'][0]['language_more'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', ', ') : smarty_modifier_replace($_tmp, ',', ', ')); ?>
</dd>
                                        <dd>
                                            <address>
                                                <strong>Address :</strong> <?php echo $this->_tpl_vars['user_detail'][0]['address']; ?>

                                                <br />
                                                <strong>City :</strong> <?php echo $this->_tpl_vars['user_detail'][0]['city']; ?>
, Code Postal : <?php echo $this->_tpl_vars['user_detail'][0]['zipcode']; ?>

                                                <br />
                                                <strong>Nationality :</strong> <?php echo $this->_tpl_vars['nationality']; ?>

                                                <br />
                                                <strong>phone :</strong> <?php echo $this->_tpl_vars['user_detail'][0]['phone_number']; ?>

                                            </address>
                                        </dd>
                                        <dd><strong>Subscription (nl) :</strong> <?php echo $this->_tpl_vars['user_detail'][0]['subscribe']; ?>
</dd>
                                        <dd><strong>Subscription (alert) :</strong> <?php echo $this->_tpl_vars['user_detail'][0]['alert_subscribe']; ?>
</dd>
                                        <dd><strong>Country :</strong> <?php echo $this->_tpl_vars['country_name']; ?>
</dd>
                                    </dl>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong>favorite Categories </strong>: <?php echo ((is_array($_tmp=$this->_tpl_vars['user_detail'][0]['category_more'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', ', ') : smarty_modifier_replace($_tmp, ',', ', ')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong>Experience </strong>: <?php if ($this->_tpl_vars['educationDetailsview'] != ""): ?>
                                <table class="table table-striped table-bordered table-condensed">
                                    <tr class="alpbold"><td>Designation</td><td>Company</td><td>Duration</td></tr>
                                    <?php $_from = $this->_tpl_vars['educationDetailsview']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['exp_key'] => $this->_tpl_vars['exp_item']):
?>
                                    <tr><td><?php echo $this->_tpl_vars['exp_item']['title']; ?>
</td><td><?php echo $this->_tpl_vars['exp_item']['institute']; ?>
</td><td><?php echo $this->_tpl_vars['exp_item']['start_date']; ?>
 to <?php echo $this->_tpl_vars['exp_item']['end_date']; ?>
</td></tr>
                                    <?php endforeach; endif; unset($_from); ?>
                                </table>
                                <?php else: ?>
                                not available
                                <?php endif; ?>
                            </td>
                        </tr>
                        <!--<tr>
                            <td colspan="2">
                                <h4>Formation</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h4>Informations de facturation</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h4>Choix de r&eacute;mun&eacute;ration</h4>
                            </td>
                        </tr>-->


                        <tr>
                            <td colspan="2">
                                <strong>Status : </strong><?php echo $this->_tpl_vars['user_detail'][0]['status']; ?>
<br />
                                <strong>Type : </strong><?php echo $this->_tpl_vars['user_detail'][0]['profile_type']; ?>
<br />
                                <strong>Corrector : </strong><?php if ($this->_tpl_vars['user_detail'][0]['type2'] == ""): ?>no<?php else: ?><?php echo $this->_tpl_vars['user_detail'][0]['type2']; ?>
<?php endif; ?><br />
				<hr />	
                                <?php if ($this->_tpl_vars['user_detail'][0]['type2'] == 'corrector'): ?>
                                <strong>Corrector Statut : </strong><?php echo $this->_tpl_vars['user_detail'][0]['profile_type2']; ?>
<br />
                                <?php endif; ?>
                                <strong>Black list : </strong><?php echo $this->_tpl_vars['user_detail'][0]['blackstatus']; ?>
<br />
                                <strong>First name : </strong><?php echo $this->_tpl_vars['user_detail'][0]['first_name']; ?>
<br />
                                <strong>Name : </strong><?php echo $this->_tpl_vars['user_detail'][0]['last_name']; ?>
<br />
                                <?php if ($this->_tpl_vars['user_detail'][0]['profession'] == 'option5'): ?>
                                <strong>Profession : </strong><?php echo $this->_tpl_vars['profession']; ?>
<br />
                                <?php endif; ?>
				<hr />	
                                <strong>University : </strong><?php echo $this->_tpl_vars['user_detail'][0]['university']; ?>
<br />
                                <strong>level of studies : </strong><?php echo $this->_tpl_vars['education']; ?>
<br />
                                <strong>Diplome obtained : </strong><?php echo $this->_tpl_vars['user_detail'][0]['degree']; ?>
<br />
                            </td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Twitter ID : </strong><?php echo $this->_tpl_vars['user_detail'][0]['twitter_id']; ?>
<br />
                <strong>Facebook ID : </strong><?php echo $this->_tpl_vars['user_detail'][0]['facebook_id']; ?>
<br />
                <strong>Website/Blog : </strong><?php echo $this->_tpl_vars['user_detail'][0]['website']; ?>
<br />

            </td>
        </tr>
                        <tr>
                            <td class="span3"><span class="pull-right alpbold">Download CV</span> </td>
                            <td class="span9"><span class="pull-left "><?php if ($this->_tpl_vars['user_detail'][0]['cv_file'] != ""): ?>
                <a href="/ao/users?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&cv_path=<?php echo $this->_tpl_vars['user_detail'][0]['cv_file']; ?>
" >download</a>
                <?php else: ?> not available <?php endif; ?>
                </span></td>
                        </tr>
                        <tr>
                            </td>
                        </tr>
                        <tr>
                            <td class="span3"><span class="pull-right alpbold">Presentation text</span></td>
                            <td class="span9"><span class="pull-left "><?php echo ((is_array($_tmp=$this->_tpl_vars['user_detail'][0]['self_details'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 30) : smarty_modifier_wordwrap($_tmp, 30)); ?>
</span></td>
                        </tr>
                        <tr>
                            <td class="span3"><span class="pull-right alpbold">Payment</span></td>
                            <td class="span9"><span class="pull-left ">
                <?php if ($this->_tpl_vars['pay_info_type'] != 'out_france' && $this->_tpl_vars['payment_type'] == 'virement' && $this->_tpl_vars['user_detail'][0]['country'] == 38): ?>
                    <?php if (( $this->_tpl_vars['rib_id_1'] != '' ) && ( $this->_tpl_vars['rib_id_2'] != '' ) && ( $this->_tpl_vars['rib_id_3'] != '' ) && ( $this->_tpl_vars['rib_id_4'] != '' ) && ( $this->_tpl_vars['rib_id_5'] != '' )): ?>
                        <div><strong>RIB : </strong><?php echo $this->_tpl_vars['rib_id_1']; ?>
 <?php echo $this->_tpl_vars['rib_id_2']; ?>
 <?php echo $this->_tpl_vars['rib_id_3']; ?>
 <?php echo $this->_tpl_vars['rib_id_4']; ?>
 <?php echo $this->_tpl_vars['rib_id_5']; ?>
 </div>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if (( $this->_tpl_vars['rib_id_6'] != '' ) && ( $this->_tpl_vars['rib_id_7'] != '' )): ?>
                        <div><strong>BIC : </strong><?php echo $this->_tpl_vars['rib_id_6']; ?>
 <strong>IBAN :</strong> <?php echo $this->_tpl_vars['rib_id_7']; ?>
</div>
                    <?php endif; ?>
                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="span3"><span class="pull-right alpbold">Download Contract</span></td><td class="span9"><span class="pull-left "><a href="/ongoing/download-contract?user_id=<?php echo $this->_tpl_vars['user_detail'][0]['user_id']; ?>
" >Download</a></span></td>
                        </tr>
                        <tr>
                            <td class="span3"><span class="pull-right alpbold">This contributor has been tested</td>
                            <td class="span9">
					<span class="pull-left ">
						<?php if ($this->_tpl_vars['user_detail'][0]['contributortest'] == 'yes'): ?>
							Oui
							<!--<br><b>Comment</b>: <?php echo $this->_tpl_vars['user_detail'][0]['contributortestcomment']; ?>
<br>
							<b>Marks</b>: <?php echo $this->_tpl_vars['user_detail'][0]['contributortestmarks']; ?>
-->
						<?php else: ?>
							Non
						<?php endif; ?>
					</span>
                            </td>
                        </tr>
         <tr>
            <td class="span3"><span class="pull-right alpbold">Software Ownership and Experience Level</td>
            <td class="span9">
                <table class="table table-bordered">
                    <tr>
                        <td></td>
                        <td>Beginner</td>
                        <td>Intermediate</td>
                        <td>Advanced</td>
                        <td>I own it</td>
                    </tr>
                                        <?php $_from = $this->_tpl_vars['ep_software_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['SoftwareList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['SoftwareList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['softwarekey'] => $this->_tpl_vars['software']):
        $this->_foreach['SoftwareList']['iteration']++;
?>
                    <?php $this->assign('s_index', ($this->_foreach['SoftwareList']['iteration']-1)+1); ?>
                    <?php if ($this->_tpl_vars['previous_software'] != $this->_tpl_vars['software'][0]): ?>
                    <tr style="background-color: #DDDDDD;">
                        <td><b><?php echo $this->_tpl_vars['software'][0]; ?>
</b></td>
                        <td colspan="4"></td>
                    </tr>
                    <?php endif; ?>
                    <!--code to check if the value is saved in DB-->
                    <?php $this->assign('check', 0); ?>
                    <?php $this->assign('condition', 'false'); ?>
                    <?php $this->assign('level', 'false'); ?>
                    <?php $this->assign('own', 'false'); ?>
                    <?php while ($this->_tpl_vars['check'] < $this->_tpl_vars['software_list_count']) { ?>
                    <?php if ($this->_tpl_vars['software_list'][$this->_tpl_vars['check']][0] == $this->_tpl_vars['softwarekey']): ?>
                    <?php $this->assign('condition', 'true'); ?>
                    <?php $this->assign('level', $this->_tpl_vars['software_list'][$this->_tpl_vars['check']][1]); ?>
                    <?php $this->assign('own', $this->_tpl_vars['software_list'][$this->_tpl_vars['check']][2]); ?>
                    <?php endif; ?>
                    <?php $this->assign('check', $this->_tpl_vars['check']+1); ?>
                    <?php } ?>
                    <!-- end of code to check if the value is saved in DB -->
                    <?php if ($this->_tpl_vars['condition'] == 'true'): ?>
                    <tr>
                        <td>
                            <label class="checkbox">
                                <input type="checkbox" name="software_name[<?php echo $this->_tpl_vars['s_index']; ?>
]" id="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="<?php echo $this->_tpl_vars['softwarekey']; ?>
" checked onclick="toggle_software_details(this.id);" disabled/><?php echo $this->_tpl_vars['software'][1]; ?>

                            </label>
                        </td>
                        <td><label class="radio "><input type="radio" name="software_level[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="beginner" <?php if ($this->_tpl_vars['level'] == 'beginner'): ?>checked<?php endif; ?> disabled/></label></td>
                        <td><label class="radio "><input type="radio" name="software_level[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="intermediate" <?php if ($this->_tpl_vars['level'] == 'intermediate'): ?>checked<?php endif; ?> disabled/></label></td>
                        <td><label class="radio "><input type="radio" name="software_level[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="advanced" <?php if ($this->_tpl_vars['level'] == 'advanced'): ?>checked<?php endif; ?> disabled/></label></td>
                        <td><label class="checkbox"><input type="checkbox" name="software_own[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" <?php if ($this->_tpl_vars['own'] == 'on'): ?>checked<?php endif; ?> disabled/></label></td>
                    </tr>
                    <?php else: ?>
                    <tr>

                        <td>
                            <label class="checkbox">
                                <input type="checkbox" name="software_name[<?php echo $this->_tpl_vars['s_index']; ?>
]" id="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="<?php echo $this->_tpl_vars['softwarekey']; ?>
"   disabled/><?php echo $this->_tpl_vars['software'][1]; ?>

                            </label>
                        </td>

                        <td><label class="radio "><input type="radio" name="software_level[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="beginner" disabled/></label></td>
                        <td><label class="radio "><input type="radio" name="software_level[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="intermediate" disabled/></label></td>
                        <td><label class="radio "><input type="radio" name="software_level[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="advanced" disabled/></label></td>
                        <td><label class="checkbox"><input type="checkbox" name="software_own[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" disabled/></label></td>
                    </tr>
                    <?php endif; ?>
                                        <?php $this->assign('previous_software', $this->_tpl_vars['software'][0]); ?>
                    <?php endforeach; endif; unset($_from); ?>

                </table>

            </td>
        </tr>
    </table>
</div>
                <div id="userlogs" class="tab-pane">
                    <table class="table table-bordered table-striped table_vam">
                        <thead>
                        <tr>
                            <th>Field Changed</th>
                            <th>Previous values</th>
                            <th>New values</th>
                            <th>Updated At</th>
                        </tr>
                        </thead>
                        <?php $_from = $this->_tpl_vars['user_logs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user_logs_key'] => $this->_tpl_vars['user_logs_item']):
?>
                            <tr>
                                <td><?php echo $this->_tpl_vars['user_logs_item']['field_name']; ?>
</td>
                                <td><?php echo $this->_tpl_vars['user_logs_item']['old_value']; ?>
</td>
                                <td><?php echo $this->_tpl_vars['user_logs_item']['new_value']; ?>
</td>
                                <td><?php echo $this->_tpl_vars['user_logs_item']['updated_at']; ?>
</td>
                            </tr>
                        <?php endforeach; endif; unset($_from); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div style="visibility:hidden" >
        <form id="user_login_form" name="user_login_form" method="post" action="" target="_blank">
            <input type="text" autocomplete="off" id="login_name" name="login_name" value="<?php echo $this->_tpl_vars['user_detail'][0]['email']; ?>
">
            <input type="password" id="login_password" name="login_password" value="<?php echo $this->_tpl_vars['user_detail'][0]['password']; ?>
" >
            <input type="submit" value="Login" />
        </form>
    </div>
    <!--///for the contributor history popup///-->
    <div class="modal hide fade" id="showhistory">
        <div class="modal-header">
            <button class="close" onclick="closePopup('showhistory');" >&times;</button>
            <h3>Contributor history</h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
        </div>
    </div>
    <!--///for the contributor history popup///-->
    <div class="modal hide fade" id="refusereasonslist">
        <div class="modal-header">
            <button class="close" onclick="closePopup('refusereasonslist');" >&times;</button>
            <h3>Refuse Reasons List</h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
        </div>
    </div>
    <!--///for the writer list where the corrector connected to///-->
    <div class="modal hide fade" id="writerlist">
        <div class="modal-header">
            <button class="close" onclick="closePopup('writerlist');" >&times;</button>
            <h3>Writers List</h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
        </div>
    </div>

    <!--///BO user send comments to for the participant ///-->
    <div class="modal hide fade" id="comments">
        <div class="modal-header">
            <button class="close" onclick="closePopup('comments');">&times;</button>
            <h3>Write Comments</h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">

        </div>
    </div>
    <!--///BO recent marks comments for the user ///-->
    <div class="modal hide fade" id="markscomments">
        <div class="modal-header">
            <button class="close" onclick="closePopup('markscomments');">&times;</button>
            <h3>Recent Commentaire</h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">

        </div>
    </div>
    <?php echo '
    <script type="text/javascript" >
        function connect_fo(user)
        {
            // this has to be chagened or use a global varible
            document.forms["user_login_form"].action="http://ep-test.edit-place.com/index/userfologin";
            //$(\'#login_name\').val(email);
            //$(\'#login_password\').val(pwd);
            document.forms["user_login_form"].submit();
    }

    $(document).ready(function() {
        

        //function to display the respective tab on loading the page//
        var tab = '; ?>
<?php echo $_GET['tab']; ?>
<?php echo ';
        var userId = '; ?>
<?php echo $this->_tpl_vars['userId']; ?>
<?php echo ';
        if(tab != \'\'){
            $("#"+tab).addClass(\'active\');
            if(tab == \'userlogs\'){
                load_user_logs(\'\\\'\'+userId+\'\\\'\');
            }
            else if(tab == \'quizlogs\'){
                console.log("INI quizlogs");
                load_quizlogs(\'\\\'\'+userId+\'\\\'\');
            }
        }
        else {
            $("#editcontrib").addClass(\'active\');
        }



    });
    </script>
    <style>
        .error{color:#FF0000;}
        .hide{display:none;}
        .gap{margin-bottom: 15px;}
    </style>
'; ?>

    