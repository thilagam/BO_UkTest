<?php /* Smarty version 2.6.19, created on 2015-02-17 09:49:03
         compiled from gebo/user/contributor-edit.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_select_date', 'gebo/user/contributor-edit.phtml', 731, false),array('function', 'html_options', 'gebo/user/contributor-edit.phtml', 735, false),array('modifier', 'count', 'gebo/user/contributor-edit.phtml', 808, false),array('modifier', 'strip_tags', 'gebo/user/contributor-edit.phtml', 1073, false),array('modifier', 'date_format', 'gebo/user/contributor-edit.phtml', 1153, false),array('modifier', 'replace', 'gebo/user/contributor-edit.phtml', 1176, false),array('modifier', 'wordwrap', 'gebo/user/contributor-edit.phtml', 1223, false),)), $this); ?>
<?php echo '

<script src="/BO/theme/gebo/js/profile-validaterr.js"></script>
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
        $("#period_Day").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#period_Month").chosen({ allow_single_deselect: false,search_contains: true  });
        $("#period_Year").chosen({ allow_single_deselect: false,search_contains: true  });
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
    function fnchangeProfession(other)
    {
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
					contributortestmark:	{required: function(element) {
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
        }
        else if (this.checked && $(this).val() == \'paypal\' || this.checked && $(this).val() == \'cheque\' )
        {
            $("#c_out_france").hide();
            $("#c_france").hide();
        }

    });
    function changeCountry()
    {
        var country=$("#country").val();
        var payment_type = $("input:radio[name =\'payment_type\']:checked").val();
        //alert(country+"--"+payment_type);
        if(country!=38)
        {
            $("#cheque_radio").hide();
            $("#cheque_radio").find("input:radio:checked").removeProp(\'checked\');
            if(payment_type==\'virement\')
            {
                $("#c_out_france").show();
                $("#c_france").hide();
            }
        }
        else
        {
            $("#cheque_radio").show();
            if(payment_type==\'virement\')
            {
                $("#c_out_france").hide();
                $("#c_france").show();
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
	
	function showremarks(param)
	{
		if(param==\'yes\')
			$("#remarksblock").show();
		else
			$("#remarksblock").hide();
	}
</script>
'; ?>

<div class="row-fluid">
 <div class="span12" style="">
  <div class="tabbable">
  <ul class="nav nav-tabs">
      <li <?php if ($_GET['tab'] == 'editcontrib' || $_GET['tab'] == ''): ?> class="active" <?php endif; ?>><a href="#editcontrib" data-toggle="tab" class="lable-success"><i class="icon-pencil"></i>&nbsp;<strong>Edit</strong></a></li>
    
      <li <?php if ($_GET['tab'] == 'viewcontrib'): ?> class="active" <?php endif; ?>><a href="#viewcontrib" data-toggle="tab" class="lable-danger"><i class="icon-eye-open"></i>&nbsp;<strong>View</strong></a></li>
      <a class="label label-inverse pull-right" href="/user/users-list?submenuId=ML3-SL6&tab=contributorstab">return</a>
  </ul>
  <div class="tab-content" style="overflow: hidden;">
    <div id="editcontrib" class="tab-pane">
        <h3 class="heading alert alert-info">
            <?php if ($this->_tpl_vars['user_detail'][0]['first_name'] != ''): ?>
            <?php echo $this->_tpl_vars['user_detail'][0]['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['user_detail'][0]['last_name']; ?>

            <?php else: ?>
            <?php echo $this->_tpl_vars['user_detail'][0]['email']; ?>

            <?php endif; ?>
        </h3>
        <form name="" class="form_validation_reg"  action="/user/contributor-edit?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&mode=edit&userId=<?php echo $_GET['userId']; ?>
" method="post">
            
            
			<!-- User test -->
			<div class="formSep">
                <div class="row-fluid">
                    
                    
                </div>
            </div> 
            <div class="formSep">
                <div class="row-fluid">
                    <div class="span6 form-inline">
                        <label class="span4">Status </label>
                        <label class="uni-radio"> <input type="radio" name="status" value="Active" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['status'] == 'Active'): ?>checked<?php endif; ?>/>Active&nbsp;   </label>
                        <label class="uni-radio"><input type="radio" name="status" value="Inactive" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['status'] == 'Inactive'): ?>checked<?php endif; ?>/>Inactive   </label>
                    </div>
                    <div class="span6 form-inline">
                        <label class="span4">Type </label>
                        <label class="uni-radio"> <input type="radio" name="profile_type" value="senior" class="uni_style"<?php if ($this->_tpl_vars['user_detail'][0]['profile_type'] == 'senior'): ?>checked<?php endif; ?>/>Senior&nbsp; </label>
                        <label class="uni-radio"> <input type="radio" name="profile_type" value="junior" class="uni_style"<?php if ($this->_tpl_vars['user_detail'][0]['profile_type'] == 'junior'): ?>checked<?php endif; ?>/>Junior&nbsp; </label>
                        <label class="uni-radio"> <input type="radio" name="profile_type" value="sub-junior" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['profile_type'] == "sub-junior"): ?>checked<?php endif; ?>/>Sub Junior </label>
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
                    </div>
                    <div class="span6 form-inline">
                        <label class="span4">Corrector Status</label>
                        <label class="uni-radio"><input type="radio" name="profile_type2" value="senior" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['profile_type2'] == 'senior'): ?>checked<?php endif; ?>/>Senior&nbsp;  </label>
                        <label class="uni-radio"> <input type="radio" name="profile_type2" value="junior" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['profile_type2'] == 'junior' || $this->_tpl_vars['user_detail'][0]['profile_type2'] == ""): ?>checked<?php endif; ?>/>Junior  </label>
                    </div>
                </div>
            </div>
            <div class="formSep">
                <div class="row-fluid">
                    <div class="span6 form-inline">
                        <label class="span4">Black list </label>
                        <label class="uni-radio"><input type="radio" name="blackstatus" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['blackstatus'] == 'yes'): ?>checked<?php endif; ?>/>Yes&nbsp; </label>
                        <label class="uni-radio"><input type="radio" name="blackstatus" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['blackstatus'] == 'no'): ?>checked<?php endif; ?>/>No</label>
                    </div>
		        </div>
            </div>
			
			<div class="formSep">
                <div class="row-fluid">
                    <div class="span6 form-inline">
                        <label class="span5">This contributor has been tested</label>
                        <label class="uni-radio"> <input type="radio" name="contributortest" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['contributortest'] == 'yes'): ?>checked<?php endif; ?> onClick="showremarks('yes');" />Yes&nbsp;   </label>
                        <label class="uni-radio"><input type="radio" name="contributortest" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['contributortest'] == 'no'): ?>checked<?php endif; ?> onClick="showremarks('no');" />No   </label>    
                    </div>	
					<div class="span6 form-inline" id="remarksblock" <?php if ($this->_tpl_vars['user_detail'][0]['contributortest'] == 'no'): ?>style="display:none;"<?php endif; ?>>
						<div style="float:left">
							<textarea name="contributortestcomment" id="contributortestcomment" placeholder="Comment (Mandatory, 70 characters at least)" rows="5" style="width:300px"><?php echo $this->_tpl_vars['user_detail'][0]['contributortestcomment']; ?>
</textarea>
							<span id="contributortestcomment_count" style="vertical-align:top"></span>
						</div>
					   <?php $this->assign('foo', '1'); ?>
					   <div>
							<select name="contributortestmark" id="contributortestmark" style="width:80px;margin-left:90px">
								<option value="">Mark</option>
								<?php while ($this->_tpl_vars['foo'] < 21) { ?>
									<option value="<?php echo $this->_tpl_vars['foo']; ?>
" <?php if ($this->_tpl_vars['user_detail'][0]['contributortestmarks'] == $this->_tpl_vars['foo']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['foo']; ?>
</option>
									<?php echo $this->_tpl_vars['foo']++; ?>

								<?php } ?>
							</select>
					   </div>
                    </div>                    
                </div>
            </div>

            <div class="formSep">
                <div class="row-fluid">
                    <div class="span6 form-inline">
                        <label class="span4">Date of birth</label>
                        <?php echo smarty_function_html_select_date(array('end_year' => '1950','start_year' => '-1','field_order' => 'DMY','time' => $this->_tpl_vars['user_detail'][0]['dob'],'field_separator' => "&nbsp;",'day_extra' => 'id="period_Day"','month_extra' => 'id="period_Month"','year_extra' => 'id="period_Year"','class' => 'span2'), $this);?>

                    </div>
                    <div class="span6 form-inline">
                        <label class="span4">Language 1</label>
                        <select  name="language" id="language"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['language_array'],'selected' => $this->_tpl_vars['user_detail'][0]['language']), $this);?>
</select>
                    </div>
                </div>
            </div>

            <div class="formSep">
                <div class="row-fluid">
                    <div class="span6 form-inline">
                        <label class="span4">Nationality</label>
                        <select name="nationality" id="nationality"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['nationality_array'],'selected' => $this->_tpl_vars['user_detail'][0]['nationality']), $this);?>
</select>
                    </div>
                    <div class="span6 form-inline">
                        <label class="span4">phone </label>
                        <input type="text" name="phone_number" id="phone_number" value="<?php echo $this->_tpl_vars['user_detail'][0]['phone_number']; ?>
" />
                    </div>
                </div>
            </div>
            <div class="formSep">
                <div class="row-fluid">
                    <div class="span6 form-inline">
                        <label class="span4">Address </label>
                        <input type="text" name="address" id="address" value="<?php echo $this->_tpl_vars['user_detail'][0]['address']; ?>
""/>
                    </div>
                    <div class="span6 form-inline">
                        <label class="span4">City </label>
                        <input type="text" name="city" id="city" value="<?php echo $this->_tpl_vars['user_detail'][0]['city']; ?>
" />
                    </div>
                </div>
            </div>
            <div class="formSep">
                <div class="row-fluid">
                    <div class="span6 form-inline">
                        <label class="span4">Zip Code</label>
                        <input type="text" name="zipcode" id="zipcode" value="<?php echo $this->_tpl_vars['user_detail'][0]['zipcode']; ?>
" />
                    </div>
                    <div class="span6 form-inline">
                        <label class="span4">Country</label>
                        <select size="1" name="country" id="country" onchange=changeCountry();>
                            <option value=""></option>
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['country_array'],'selected' => $this->_tpl_vars['user_detail'][0]['country']), $this);?>

                        </select>
                    </div>
                </div>
            </div>
            <div class="formSep">
                <div class="row-fluid">
                    <div class="span6 form-inline">
                        <label class="span4"><strong>Subscription (nl)</strong> </label>
                        <label class="uni-radio"><input type="radio" name="subscribe" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['subscribe'] == 'yes'): ?>checked<?php endif; ?> "/>Yes&nbsp; </label>
                        <label class="uni-radio"><input type="radio" name="subscribe" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['subscribe'] == 'no'): ?>checked<?php endif; ?> />No  </label>
                    </div>
                    <div class="span6 form-inline">
                        <label class="span4"><strong>Subscription (alert)</strong> </label>
                        <label class="uni-radio"><input type="radio" name="alert_subscribe" value="yes" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['alert_subscribe'] == 'yes'): ?>checked<?php endif; ?> "/>Yes&nbsp; </label>
                        <label class="uni-radio"><input type="radio" name="alert_subscribe" value="no" class="uni_style" <?php if ($this->_tpl_vars['user_detail'][0]['alert_subscribe'] == 'no'): ?>checked<?php endif; ?> />No  </label>
                    </div>
                </div>
            </div>

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
                                <input type="text" id="slider-skill_number_<?php echo ($this->_foreach['moreSkills']['iteration']-1); ?>
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
                            </div>
                        <?php endforeach; endif; unset($_from); ?>
                        <p class="addmore-button" id="addmore_skill_link" onclick="addnewrow(<?php echo $this->_tpl_vars['skill_index']; ?>
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
                                    <option value="">Select language</option>
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['language_array'],'selected' => $this->_tpl_vars['lang']), $this);?>

                                </select>
                                <label for="slider-language_number_<?php echo ($this->_foreach['moreLanguage']['iteration']-1); ?>
" class="muted" style="bottom:10px;position:relative;">At :</label>
                                <input type="text" id="slider-language_number_<?php echo ($this->_foreach['moreLanguage']['iteration']-1); ?>
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
                            </div>
                            <?php endforeach; endif; unset($_from); ?>
                            <p class="addmore-button" id="addmore_language_link" onclick="addnewLanguage(<?php echo $this->_tpl_vars['lang_index']; ?>
);"><a class="btn btn-link btn-small"><i class="icon-plus"></i> Add language</a></p>
                    </div>
                </div>
            </div>
            <!-- Start, Job module -->
            <div class="formSep">
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Profession Experience<span class="error">*</span></strong>
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
                                <label><input class="span5" type="text" id="JobName_<?php echo $this->_tpl_vars['job_index']; ?>
" value="<?php echo $this->_tpl_vars['job']['title']; ?>
" name="job_title[]" placeholder="Intitul&eacute; du poste"></label>
                                <label><input class="span5" type="text" id="CompanyName_<?php echo $this->_tpl_vars['job_index']; ?>
" value="<?php echo $this->_tpl_vars['job']['institute']; ?>
" name="job_institute[]" placeholder="Nom de l'entreprise"></label>
                                <select class="span5 jobtypedetails" name="ep_job[]" id="ep_job_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                    <option value="">Select type of contract</option>
                                    <option value="cdi" <?php if ($this->_tpl_vars['job']['contract'] == 'cdi'): ?>selected<?php endif; ?>>CDI</option>
                                    <option value="cdd" <?php if ($this->_tpl_vars['job']['contract'] == 'cdd'): ?>selected<?php endif; ?>>CDD</option>
                                    <option value="freelance" <?php if ($this->_tpl_vars['job']['contract'] == 'freelance'): ?>selected<?php endif; ?>>Freelance</option>
                                    <option value="intern" <?php if ($this->_tpl_vars['job']['contract'] == 'intern'): ?>selected<?php endif; ?>>Interim</option>
                                    <option value="stage" <?php if ($this->_tpl_vars['job']['contract'] == 'stage'): ?>selected<?php endif; ?>>Stage</option>
                                </select>
                                <div class="clearfix">
                                    <div class="container-field span5">
                                        <label>
                                            <span class="span3">new</span>
                                        </label>
                                        <select class="start_month input-small inline" name="start_month[]" id="start_month">
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
                                        &nbsp;&nbsp;<input class="input-small inline" type="text" id="start_year_<?php echo $this->_tpl_vars['job_index']; ?>
" placeholder="Ann&eacute;e" value="<?php echo $this->_tpl_vars['job']['from_year']; ?>
" name="start_year[]" style="position:relative;top: -7px;">

                                        <div class="collapse <?php if ($this->_tpl_vars['job']['still_working'] != 'yes'): ?> in <?php endif; ?>" id="stillWorkingThere_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                            <label>
                                                <span class="span3">Fin</span>
                                            </label>
                                            <select class="end_month input-small inline" name="end_month[]" id="end_month">
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
                                            &nbsp;&nbsp;<input class="input-small inline" type="text" id="end_year_<?php echo $this->_tpl_vars['job_index']; ?>
" placeholder="Ann&eacute;e" value="<?php echo $this->_tpl_vars['job']['to_year']; ?>
" name="end_year[]" style="position:relative;top: -7px;">

                                        </div>
                                        <label class="uni-checkbox">
                                            <input type="checkbox" id="still_working_<?php echo $this->_tpl_vars['job_index']; ?>
" class="uni_style" data-target="#stillWorkingThere_1" data-toggle="collapse" <?php if ($this->_tpl_vars['job']['still_working'] == 'yes'): ?> checked <?php endif; ?>  name="still_working[]">Still Working
                                        </label>
                                        <input type="hidden" name="job_identifier[]" value="<?php echo $this->_tpl_vars['job']['identifier']; ?>
">
                                    </div>
                                </div>
                            </div>
                            <!-- end, job row -->
                            <?php endforeach; endif; unset($_from); ?>
                            <p class="addmore-button" id="addmore_job_link" onclick="addJob(<?php echo $this->_tpl_vars['job_index']; ?>
);"><a class="btn btn-link btn-small"><i class="icon-plus"></i>Add Experience</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End, Job -->
            <!-- Start, Training module -->
            <div class="formSep">
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Formation <span class="error">*</span></strong>
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
                                <label><input class="span5" type="text" id="trainingName_<?php echo $this->_tpl_vars['edu_index']; ?>
" value="<?php echo $this->_tpl_vars['education']['title']; ?>
" name="training_title[]" placeholder="Intitul&eacute; de la formation"></label>
                                <label><input class="span5" type="text" id="trainingSchoolName_<?php echo $this->_tpl_vars['edu_index']; ?>
" value="<?php echo $this->_tpl_vars['education']['institute']; ?>
" name="training_institute[]" placeholder="Ecole, universit&eacute;, etc..."></label>
                                <div class="clearfix">
                                    <div class="container-field span5">
                                        <label>
                                            <span class="span3">New</span>
                                        </label>
                                        <select class="start_train_month input-small inline" name="start_train_month[]" id="start_train_month">
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
                                        &nbsp;&nbsp;<input class="input-small inline" type="text" placeholder="Ann&eacute;e" id="start_train_year_<?php echo $this->_tpl_vars['edu_index']; ?>
" value="<?php echo $this->_tpl_vars['education']['from_year']; ?>
" name="start_train_year[]" style="position:relative;top: -7px;">

                                        <div class="collapse  <?php if ($this->_tpl_vars['education']['still_working'] != 'yes'): ?> in <?php endif; ?>" id="stillTrainingThere_<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                            <label>
                                                <span class="span3">Fin</span>
                                            </label>
                                            <select class="end_train_month input-small inline" name="end_train_month[]" id="end_train_month">
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
                                            &nbsp;&nbsp;<input class="input-small inline" type="text" id="end_train_year_<?php echo $this->_tpl_vars['edu_index']; ?>
" placeholder="Ann&eacute;e" value="<?php echo $this->_tpl_vars['education']['to_year']; ?>
" name="end_train_year[]" style="position:relative;top: -5px;">
                                        </div>
                                        <label class="uni-checkbox">
                                            <input type="checkbox" id="still_training_<?php echo $this->_tpl_vars['edu_index']; ?>
" class="uni_style" data-target="#stillTrainingThere_<?php echo $this->_tpl_vars['edu_index']; ?>
" name="still_training[]" data-toggle="collapse" <?php if ($this->_tpl_vars['education']['still_working'] == 'yes'): ?> checked <?php endif; ?>>Still in training
                                        </label>
                                        <input type="hidden" name="training_identifier[]" value="<?php echo $this->_tpl_vars['education']['identifier']; ?>
">
                                    </div>
                                </div>
                            </div>
                            <!-- end, school row -->
                            <?php endforeach; endif; unset($_from); ?>
                            <p class="addmore-button" id="addmore_training_link" onclick="addTraining(<?php echo $this->_tpl_vars['edu_index']; ?>
);" ><a  class="btn btn-link btn-small"><i class="icon-plus"></i> Add new formation</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End, Training module -->
                <!-- Start, billing info module -->
                <div class="formSep" id="pay_info_type">
                    <div class="row-fluid">
                        <div class="control-group">
                            <label class="control-label span2 offset1" for=""><strong>Billing Information <?php if ($_GET['profile'] == 'invoice'): ?><span class="error">*</span><?php endif; ?></strong> <!--<span class="help-block">In this status, a foreign mailing address only, thank you check that it is well informed. Thank you for the check payment system transfer. Bank charges will be your responsibility.</span>--></label>
                            <div class="controls span8">
                                <!--<label class="uni-radio">
                                    <input type="radio" name="payinfo" value="ssn" class="uni_style" <?php if ($this->_tpl_vars['pay_info_type'] == 'ssn'): ?> checked class="collapsed" <?php endif; ?> data-target="#national-InsuranceNum" data-toggle="collapse">copyright (AGESSA).
                                </label>-->
                                <!-- if AGESSA is true, display the input "National Insurance number" -->
                                <!--<div id="national-InsuranceNum" <?php if ($this->_tpl_vars['pay_info_type'] == 'ssn'): ?> class="collapse in out" <?php else: ?> class="collapse out" <?php endif; ?>>
                                <i class="icon-arrow-right"></i> <input type="text" class="span4" placeholder="Num&eacute;ro de s&eacute;curit&eacute; sociale" name="ssn" id="ssn" value="<?php echo $this->_tpl_vars['SSN']; ?>
">
                            </div>-->

                            <label class="uni-radio">
                                <input type="radio" name="payinfo" value="comp_num" class="uni_style" <?php if ($this->_tpl_vars['pay_info_type'] == 'comp_num'): ?> checked class="collapsed" <?php endif; ?> data-target="#siretNum" data-toggle="collapse">Freelance
                            </label>
                            <!-- if Autoentrepreneur is true, display the input "SIRET number" -->
                            <div id="siretNum" <?php if ($this->_tpl_vars['pay_info_type'] == 'comp_num'): ?> class="collapse in out" <?php else: ?> class="collapse out" <?php endif; ?>>
                            <i class="icon-arrow-right"></i> <input type="text" class="span4" placeholder="Your No. Siret bills" name="company_number" id="company_number" value="<?php echo $this->_tpl_vars['company_number']; ?>
">
                            <label class="uni-checkbox"><input type="checkbox"  name="vat_check" class="uni_style" data-target="#TVANum" data-toggle="collapse" value="YES" id="vat_check" <?php if ($this->_tpl_vars['vat_check'] == 'YES'): ?> checked <?php endif; ?>>Check this box if you are subject to VAT</label>
                            <div id="TVANum" <?php if ($this->_tpl_vars['vat_check'] == 'YES'): ?> class="collapse in out" <?php else: ?> class="collapse out" <?php endif; ?>>
                            <i class="icon-arrow-right"></i> <input type="text" class="span4" placeholder="TVA" name="VAT_number" id="VAT_number" value="<?php if ($this->_tpl_vars['vat_check'] == 'YES'): ?><?php echo $this->_tpl_vars['VAT_number']; ?>
<?php endif; ?>" >
                        </div>
                    </div>
                    <label class="uni-radio">
                        <input type="radio" name="payinfo" value="out_france" class="uni_style" <?php if ($this->_tpl_vars['pay_info_type'] == 'out_france'): ?> checked <?php endif; ?>>Outside of UK
                        <div class="help-block">Choose this option if you have an address overseas (outside the United Kingdom). Please ensure your postal address, bank and/or Paypal details are correct. Bank fees may apply.</div>
                    </label>
                    <br>
                    <span id="payinfo_error"></span>
                </div>
              </div>
              </div>
             </div>
             <!-- End, billing info module 9949666110-->
             <!-- Start, payment info module -->
             <div class="formSep">
                 <div class="row-fluid">
                     <div class="control-group">
                         <label class="control-label span2 offset1" for=""><strong>Choice of compensation<?php if ($_GET['profile'] == 'invoice'): ?><span class="error">*</span><?php endif; ?> </strong></label>
                         <div class="controls span8">
                             <label class="uni-radio">
                                 <input type="radio" value="paypal" class="uni_style" <?php if ($this->_tpl_vars['payment_type'] == 'paypal'): ?>checked class="collapsed"<?php endif; ?> name="payment_type" data-target="#paypalEmail" data-toggle="collapse">Paypal
                             </label>
                             <!-- if Payapl is true, display the input "paypal email" -->
                             <div id="paypalEmail" <?php if ($this->_tpl_vars['payment_type'] == 'paypal'): ?> class="collapse in out" <?php else: ?> class="collapse out" <?php endif; ?> >
                             <i class="icon-arrow-right"></i> <input type="text" class="span4" placeholder="paypal email" name="paypal_id" id="paypal_id" value="<?php echo $this->_tpl_vars['paypal_id']; ?>
">
                         </div>
                         <label class="uni-radio" id="cheque_radio" <?php if ($this->_tpl_vars['pay_info_type'] == 'out_france' || $this->_tpl_vars['user_detail'][0]['country'] != 38): ?> style="display:none" <?php endif; ?>>
                         <input type="radio" value="cheque" class="uni_style" <?php if ($this->_tpl_vars['payment_type'] == 'cheque'): ?>checked<?php endif; ?> name="payment_type">Ch&egrave;que
                         </label>
                         <label class="uni-radio">
                             <input type="radio" value="virement" class="uni_style" <?php if ($this->_tpl_vars['payment_type'] == 'virement'): ?>checked<?php endif; ?> name="payment_type">bank Transfer
                         </label>
                         <!-- if virement is true, display the input "paypal email" -->
                         <div id="virementId" <?php if ($this->_tpl_vars['payment_type'] == 'virement'): ?> class="collapse in out" <?php else: ?> class="collapse in" <?php endif; ?> >
                         <div id="c_france" <?php if ($this->_tpl_vars['pay_info_type'] != 'out_france' && $this->_tpl_vars['payment_type'] == 'virement' && $this->_tpl_vars['user_detail'][0]['country'] == 38): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
                         <i class="icon-arrow-right"></i>
                         <input type="text" value="<?php echo $this->_tpl_vars['rib_id_1']; ?>
"  placeholder="Nom de l'&eacute;tablissemen" name="rib_id_1" id="rib_id_1"/>
                         <input type="text" value="<?php echo $this->_tpl_vars['rib_id_2']; ?>
"  placeholder="Code Banque" name="rib_id_2" id="rib_id_2"/>
                         <input type="text" value="<?php echo $this->_tpl_vars['rib_id_3']; ?>
"  placeholder="Code Guichet" name="rib_id_3" id="rib_id_3"/>
                         <input type="text" value="<?php echo $this->_tpl_vars['rib_id_4']; ?>
"  placeholder="Num&eacute;ro de compte" name="rib_id_4" id="rib_id_4"/>
                         <input type="text" value="<?php echo $this->_tpl_vars['rib_id_5']; ?>
"  placeholder="Cl&eacute; RIB" name="rib_id_5"  id="rib_id_5"/>
                     </div>
                     <div  id="c_out_france" <?php if (( $this->_tpl_vars['pay_info_type'] == 'out_france' && $this->_tpl_vars['payment_type'] == 'virement' ) || $this->_tpl_vars['user_detail'][0]['country'] != 38): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
                     <i class="icon-arrow-right"></i>
                     <input type="text" value="<?php echo $this->_tpl_vars['rib_id_6']; ?>
"  placeholder="BIC" name="rib_id_6" id="rib_id_6"/>
                     <input type="text" value="<?php echo $this->_tpl_vars['rib_id_7']; ?>
"  placeholder="IBAN" name="rib_id_7" id="rib_id_7"/>
                 </div>
             </div>
             <br>
             <span id="payment_error"></span>
            </div>
            </div>
            </div>
            </div>
            <!-- End, payment info module -->
            <div class="formSep">
                <div class="row-fluid">
                    <div class="span6 form-inline">
                <label class="span4"><strong>Presentation text</strong></label>
                        <textarea class="span12" placeholder="100 caract&egrave;res min" name="self_details" id="self_details" ><?php echo ((is_array($_tmp=$this->_tpl_vars['user_detail'][0]['self_details'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</textarea>
                    </div>
		  
                </div>
            </div>

            <div class="formSep">
                <div class="row-fluid">
                    <div class="span6 form-inline">
                        <input type="submit" name="submit_contrib" value="Submit" class="btn btn-info pull-right"> </input>
                    </div>
                </div>
            </div>
            <input type="hidden" name="prev_profile" id="prev_profile" value="<?php echo $this->_tpl_vars['user_detail'][0]['profile_type']; ?>
" />
            <input type="hidden" name="prev_profile2" id="prev_profile2" value="<?php echo $this->_tpl_vars['user_detail'][0]['profile_type2']; ?>
" />
            <input type="hidden" name="userId" id="userId" value="<?php echo $_GET['userId']; ?>
" />
        </form>
    </div>



<!------------------------------------------------------------- Contributor view ---------------------------------------------------->
    <div id="viewcontrib" class="tab-pane">
        <table class="table table-striped table-bordered table-condensed span9">
            <tr>
                <td colspan="2">
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
                    <div class="span2 pull-right" style="height:70px;">
                        <img alt="contributor pic" src="<?php echo $this->_tpl_vars['user_pic']; ?>
" class="fileupload-new thumbnail1 pull-right">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Email</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['email']; ?>
</span></td>
            </tr>
            <?php if ($this->_tpl_vars['groupId'] == 1): ?>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Password</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['password']; ?>
</span></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Status</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['status']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Type</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['profile_type']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Corrector</span></td><td class="span9"><span class="pull-left "><?php if ($this->_tpl_vars['user_detail'][0]['type2'] == ""): ?>no<?php else: ?><?php echo $this->_tpl_vars['user_detail'][0]['type2']; ?>
<?php endif; ?></span></td>
            </tr>

            <?php if ($this->_tpl_vars['user_detail'][0]['type2'] == 'corrector'): ?>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Corrector Status</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['profile_type2']; ?>
</span></td>
            </tr>
            <?php endif; ?>

            <tr>
                <td class="span5"><span class="pull-right alpbold">Black list</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['blackstatus']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Password</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['password']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">First Name</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['first_name']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Last Name</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['last_name']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Date of birth</span></td><td class="span9"><span class="pull-left "><?php echo ((is_array($_tmp=$this->_tpl_vars['user_detail'][0]['dob'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Profession</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['profession']; ?>
</span></td>
            </tr>
            <?php if ($this->_tpl_vars['user_detail'][0]['profession'] == 'option5'): ?>
            <tr>
                <td class="span5"><span class="pull-right alpbold"></span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['profession_other']; ?>
</span></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td class="span5"><span class="pull-right alpbold">University</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['university']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Education</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['education']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Graduation</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['degree']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Language 1</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['language']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Language 2</span></td><td class="span9"><span class="pull-left "><?php echo ((is_array($_tmp=$this->_tpl_vars['user_detail'][0]['language_more'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', ', ') : smarty_modifier_replace($_tmp, ',', ', ')); ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Nationality</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['nationality']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">phone</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['phone_number']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Address</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['address']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">City</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['city']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Zip code</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['user_detail'][0]['zipcode']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Country</span></td><td class="span9"><span class="pull-left "><?php echo $this->_tpl_vars['country_name']; ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Prefered Categories</span></td><td class="span9"><span class="pull-left "><?php echo ((is_array($_tmp=$this->_tpl_vars['user_detail'][0]['category_more'])) ? $this->_run_mod_handler('replace', true, $_tmp, ',', ', ') : smarty_modifier_replace($_tmp, ',', ', ')); ?>
</span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Download CV</span> </td>
                <td class="span9"><span class="pull-left "><?php if ($this->_tpl_vars['user_detail'][0]['cv_file'] != ""): ?>
                <a href="/ao/users?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&cv_path=<?php echo $this->_tpl_vars['user_detail'][0]['cv_file']; ?>
" >download</a>
                <?php else: ?> not available <?php endif; ?>
                </span></td>
            </tr>
            <tr>
                <td class="span5"><span class="pull-right alpbold">Experience</span></td>
                <td class="span9"><span class="pull-left ">
                    <?php if ($this->_tpl_vars['educationDetailsview'] != ""): ?>
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
                </span></td>
            </tr>
			<tr>
                <td class="span5"><span class="pull-right alpbold">Presentation text</span></td>
                <td class="span9"><span class="pull-left "><?php echo ((is_array($_tmp=$this->_tpl_vars['user_detail'][0]['self_details'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 30) : smarty_modifier_wordwrap($_tmp, 30)); ?>
</span></td>
            </tr>
			<tr>
				 <td class="span5"><span class="pull-right alpbold">This contributor has been tested</td>
				 <td class="span9">
					<span class="pull-left ">
						<?php if ($this->_tpl_vars['user_detail'][0]['contributortest'] == 'yes'): ?>
							Yes
						<?php else: ?>
							No
						<?php endif; ?>
					</span>	
				</td>
			</tr>
        </table>
    </div>
   </div>
  </div>
</div>

<div style="visibility:hidden" >
    <form id="user_login_form" name="user_login_form" method="post" action="" target="_blank">
        <input type="text" id="login_name" name="login_name" value="<?php echo $this->_tpl_vars['user_detail'][0]['email']; ?>
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
<?php echo '
<script type="text/javascript" >
function connect_fo(user)
{
    document.forms["user_login_form"].action="http://ep-test.edit-place.co.uk/index/userfologin";
    document.forms["user_login_form"].submit();
}
</script>
'; ?>