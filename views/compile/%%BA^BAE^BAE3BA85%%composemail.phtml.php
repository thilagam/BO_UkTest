<?php /* Smarty version 2.6.19, created on 2015-03-03 09:18:18
         compiled from gebo/master-mails/composemail.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/master-mails/composemail.phtml', 623, false),)), $this); ?>
<?php echo ' 
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/jquery.validate.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/jquery.MultiFile.js"></script>
<style type="text/css">
	.control-label {
		padding-top: 5px;
		font-weight: bold;
	}
	.MultiFile-label {
		padding-top: 3px;
	}
	#msg_object {
		text-transform: none;
	}
	.error {
		display: none !important;
	}
	.uni-radio .f_error{
		color:red;
		border: 1px solid #b94a48;
		border-radius: 25px;
	}
	.m_error{
		border: 1px solid #b94a48;
	}
</style>
<script type="text/javascript" >
	$(document).ready(function() {
	    
        /*document.getElementById(\'doc_alt\').addEventListener(\'click\',function(){
            document.getElementById(\'attachments\').click();
        });*/
        
		$(\'#attachments\').MultiFile({
            selected:\'File selected:\'
        });

		/*$("#from_client_list").chosen({
			allow_single_deselect : false,
			search_contains : true
		});
		$("#from_contributor_list").chosen({
			allow_single_deselect : false,
			search_contains : true
		});*/
		$("#from_ep_list").chosen({
			allow_single_deselect : false,
			search_contains : true
		});
        $(".chzn_a").chosen({
            allow_single_deselect: false,
            search_contains : true
        });
        $(".chzn_b").chosen({
            allow_single_deselect: false,
            search_contains : true
        });
        
        $(".chzn_lan1").chosen({
            allow_single_deselect: false,
            search_contains : true
        });
        
		/*$("#client_list").chosen({
			allow_single_deselect : true,
			search_contains : true
		});
		$("#contributor_list").chosen({
			allow_single_deselect : true,
			search_contains : true
		});*/
        
        /*jQuery(".chzn_a").multiselect({noneSelectedText: "S&eacute;lectionner"});
        jQuery(".chzn_a").multiselectfilter();*/
        
        jQuery("#client_list").multiselect(
				{
				noneSelectedText: "Select Client",
				checkAll: function(){
						$(\'#cldiv\').css("border","1px solid #e3e3e3");
					},
				uncheckAll: function(){
					$(\'#cldiv\').css("border","1px solid red");
					}
				}
				);
        jQuery("#client_list").multiselectfilter();
        
        jQuery("#contributor_list").multiselect({noneSelectedText: "Select Contributor",checkAll: function(){
						$(\'#contribarea\').css("border","1px solid #e3e3e3");
					},
				uncheckAll: function(){
					$(\'#contribarea\').css("border","1px solid red");
					}});
        jQuery("#contributor_list").multiselectfilter();/**/
        
        $(".uni_style").uniform();

        jQuery.validator.addMethod("checkMessage", function(value, element) {
            var content = tinyMCE.activeEditor.getContent();
            //alert(content);
            $("#mail_message").val(content);
            if (content)
                return false;
            else
                return true;
        }, "Merci d\'ins&eacute;rer un num&eacute;ro de t&eacute;l&eacute;phone correct");

        jQuery.validator.addMethod("emetteur", function(value, element) {
            //var cnt = $(\'#from_client_list\').val();
            //var ctr = $(\'#from_contributor_list\').val();
            var bo = $(\'#from_ep_list\').val();
            //if (cnt==\'\' && ctr==\'\' && bo==\'\')
            if (bo==\'\')
                return false;
            else
                return true;
        }, "Please select Emetteur");

        jQuery.validator.addMethod("limitselect", function(value, element) {
			//alert(element.siblings(":selected").length);
			var cb=$(\'#contributor_list\').siblings(":selected").length;
			var cl=$(\'#client_list\').siblings(":selected").length;
			//alert(cb);
			if(200 >= cb && 200 >= cl)
				return true;
			else
				return false;
				 
		},"Sorry, it is not possible to send a message to more than 200 registered, thank you to contact Julien");

		
			
		$("#new_message_form").validate({
			message : false,
			errorClass : \'error\',
			validClass : \'valid\',
			ignore:[],
			highlight : function(element) {
				$(element).closest(\'span\').addClass("f_error");
			},
			unhighlight : function(element) {
				$(element).closest(\'span\').removeClass("f_error");
			},
			errorPlacement : function(error, element) {
				if ($.inArray(element.attr("id"), [\'mail_message\'])) {
					$("#ddd").addClass("m_error");
				} else{
					$(element).closest(\'span\').append(error);
				}		
			},
			rules : {
				msg_object : {
					required : true
				},
				user_type : {
					required : true
				},
				mail_message : {
                    required: true
                },
				from_client_contact : {
					required : true,
                    emetteur : true
                }
                
			},submitHandler: function(form) {
					//alert("HI");
					var errorCount=0;
					if(!retrictSelectCount(\'contributor_list\'))
					{
						$(\'#uiselecterrorcontrib\').html("Sorry, it is not possible to send a message to more than 200 registered, thank you to contact Julien")
						errorCount++;
					}
					if(!retrictSelectCount(\'client_list\')){
						$(\'#uiselecterrorclient\').html("Sorry, it is not possible to send a message to more than 200 registered, thank you to contact Julien")
						errorCount++;
					}
					var type=$(\'input[name=user_type]:checked\').val();
					
					if(type==1){
						
						if(!checkifnotempty(\'client_list\')){
							
							 errorCount++;
							// alert(errorCount);
							 $(\'#cldiv\').css("border","1px solid red");
						}
						
					}
					if(type==2){
						if(!checkifnotempty(\'contributor_list\')){
							errorCount++;
							$(\'#contribarea\').css("border","1px solid red");
						}
					}
					if($(\'#mail_message\').val()==\'\'){
						errorCount++;
					}
					//alert(errorCount);
					if(errorCount==0){
						form.submit();
					}
			}
		});

		$(\'textarea\').tinymce({
			// Location of TinyMCE script
			script_url : \'/BO/theme/gebo/lib/tiny_mce/tiny_mce.js\',
			// General options
			theme : "advanced",
			plugins : "autoresize,style,table,advhr,advimage,advlink,emotions,inlinepopups,preview,media,contextmenu,paste,fullscreen,noneditable,xhtmlxtras,template,advlist",
			// Theme options
			theme_advanced_buttons1 : "undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "forecolor,backcolor,|,cut,copy,paste,pastetext,|,bullist,numlist,link,image,media,|,code,preview,fullscreen",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : false,
			font_size_style_values : "8pt,10pt,12pt,14pt,18pt,24pt,36pt",
			init_instance_callback : function() {
				function resizeWidth() {
					document.getElementById(tinyMCE.activeEditor.id + \'_tbl\').style.width = \'100%\';
				}

				resizeWidth();
				$(window).resize(function() {
					resizeWidth();
				})
			},
			onchange_callback : function(){
					var content = tinyMCE.activeEditor.getContent();
					if(content!=\'\'){
						$("#ddd").removeClass("m_error");
					}else{
						$("#ddd").addClass("m_error");
					}
				}

		});
        
        $("input[name=\'user_type\']").change(function() {
            var type=$(\'input[name=user_type]:checked\').val();//alert(type);
            if(type==1)
            {
                $("#wrdiv").hide();
                $("#cldiv").show();
                $(\'#uiselecterrorclient\').show();
                if($(\'#contrib_type1\').is(\':checked\'))
                {
                    $(\'#contrib_type1\').click();
                    $(\'#wrtRow\').hide();
                    $(\'#uniform-contrib_type1 span\').removeAttr(\'class\');
                }
                if($(\'#contrib_type2\').is(\':checked\'))
                {
                    $(\'#contrib_type2\').click();
                    $(\'#crtRow\').hide();
                    $(\'#uniform-contrib_type2 span\').removeAttr(\'class\');
                }
            }
            else
            {
                $("#wrdiv").show();
                $("#cldiv").hide();
                $(\'#uiselecterrorclient\').hide();
            }
        });
        
	});
	function encode_utf8(s) {
	  return unescape(encodeURIComponent(s));
	}

	function decode_utf8(s) {
	  return decodeURIComponent(escape(s));
	}

	function retrictSelectCount(id){
			//alert(\'HI\');
			var cb=$(\'#\'+id).children(":selected").length;
			//alert(cb);
			if(80 >= cb )
				return true;
			else
				return false;
	}

	function checkifnotempty(id){
		var eb=$(\'#\'+id).children(":selected").length;
			//alert(cb);
			if( 0 < eb )
				return true;
			else
				return false;
	}

	function fnChangeFromContact(type, value) {
	    
		if (value != \'\' && type == \'client\') {
		    
			//$("#from_contributor_list").val(\'0\').trigger("liszt:updated");
			$("#from_ep_list").val(\'0\').trigger("liszt:updated");
			$(\'#client_list\').val(\'0\').trigger("liszt:updated");
			$(\'#client_list\').prop(\'disabled\', true).trigger("liszt:updated");
			$(\'#contributor_list\').prop(\'disabled\', false).trigger("liszt:updated");
			$(\'#clientSel\').hide();
            $(\'#contribSel\').show();
			$(\'#user_type2\').click();
			$(\'#uniform-user_type2 span\').attr(\'class\', \'uni-checked\');
            $(\'#uniform-user_type1 span\').removeAttr(\'class\');
            
			//$(\'#cldiv\').hide();$(\'#wrdiv\').show();

		} else if (value != \'\' && type == \'contributor\') {

			//$("#from_client_list").val(\'0\').trigger("liszt:updated");
			$("#from_ep_list").val(\'0\').trigger("liszt:updated");
			$(\'#contributor_list\').val(\'0\').trigger("liszt:updated");
			$(\'#contributor_list\').prop(\'disabled\', true).trigger("liszt:updated");
			$(\'#client_list\').prop(\'disabled\', false).trigger("liszt:updated");
            $("#contrib_type1").attr(\'checked\', false);
            $("#contrib_type1").parent().attr("class", "");
            $("#contrib_type2").attr(\'checked\', false);
            $("#contrib_type2").parent().attr("class", "");
            $(\'#contribSel\').hide();
            $(\'#clientSel\').show();
            $(\'#user_type1\').click();
            $(\'#uniform-user_type1 span\').attr(\'class\', \'uni-checked\');
            $(\'#uniform-user_type2 span\').removeAttr(\'class\');
            $(\'#wrtRow\').hide();$(\'#crtRow\').hide();
			
		} else if (value != \'\' && type == \'bouser\') {
		    
			//$("#from_client_list").val(\'0\').trigger("liszt:updated");
			//$("#from_contributor_list").val(\'0\').trigger("liszt:updated");
			$(\'#contributor_list\').prop(\'disabled\', false).trigger("liszt:updated");
			$(\'#client_list\').prop(\'disabled\', false).trigger("liszt:updated");
			//$(\'#cldiv\').show();$(\'#wrdiv\').show();
            $(\'#contribSel\').show();
            $(\'#clientSel\').show();
            
            if($(\'#contrib_type1\').is(\':checked\')){$("#cldiv").show();$("#wrdiv").hide();}
            if($(\'#contrib_type2\').is(\':checked\')){$("#wrdiv").show();$("#cldiv").hide();}
		}

	}
    function changeContrib(usr)
    {
        if(usr==1)
		{
            $("#wrtRow").show();
            $("#crtRow").hide();
		}
            
        if(usr==2)
        {
			$("#crtRow").show();
            $("#wrtRow").hide();
		}
        
        //contribFilter(usr);
    }
    function checkWC()
    {
        if($(\'input[name=contrib_type]:checked\').val()==\'writer\')
        {
            if(($(\'#writertype1\').is(\':checked\')==false) && ($(\'#writertype2\').is(\':checked\')==false) && ($(\'#writertype3\').is(\':checked\')==false))
            {
                $(\'#contrib_type1\').click();
                $(\'#uniform-contrib_type1 span\').removeAttr(\'class\');
                $(\'#writertype1\').attr("checked","checked");
                $(\'#writertype2\').attr("checked","checked");
                $(\'#writertype3\').attr("checked","checked");
                $(\'#uniform-writertype1 span\').attr(\'class\',\'uni-checked\');
                $(\'#uniform-writertype2 span\').attr(\'class\',\'uni-checked\');
                $(\'#uniform-writertype3 span\').attr(\'class\',\'uni-checked\');
                $("#wrtRow").hide();
            }
        }
        else if($(\'input[name=contrib_type]:checked\').val()==\'corrector\')
        {
            if(($(\'#correctortype1\').is(\':checked\')==false) && ($(\'#correctortype2\').is(\':checked\')==false))
            {
                $(\'#contrib_type2\').click();
                $(\'#uniform-contrib_type2 span\').removeAttr(\'class\');
                $(\'#correctortype1\').attr("checked","checked");
                $(\'#correctortype2\').attr("checked","checked");
                $(\'#uniform-correctortype1 span\').attr(\'class\',\'uni-checked\');
                $(\'#uniform-correctortype2 span\').attr(\'class\',\'uni-checked\');
                $("#crtRow").hide();
            }
        }
    }
    
    function contribFilter()
    {
        //var usrtype = document.querySelector(\'input[name="user_type"]:checked\').value; 
        if(!arguments[0]){categoryList();languageList();}
        var category = $(\'#category\').val();
        var language2 = $(\'#language2\').val();
        
        /*var language = new Array();
        var lan = document.getElementById("language");
        for (var i=0; i<lan.length; i++)
            if(lan.options[i].selected)
                language.push(lan.options[i].value);
        language = language.join("\',\'");*/
        var language = $(\'#language\').val();
        
        /*if($(\'#contrib_type2\').is(\':checked\') && $(\'#contrib_type1\').is(\':checked\'))
        {//alert(\'2 & 1 checked..\');
            var crvalues = new Array();
            var wrvalues = new Array();
            $.each($("input[name=\'correctortype[]\']:checked"), function() {
                crvalues.push($(this).val());
            });
            var crvalue = \'&c=\'+crvalues;
            $.each($("input[name=\'contribtype[]\']:checked"), function() {
                wrvalues.push($(this).val());
            });
            var wrvalue = \'w=\'+wrvalues;//alert(\'and\');
        }*/
        if($(\'input[name=contrib_type]:checked\').val()==\'corrector\')
        {//alert(\'2 checked..\');
            var crvalues = new Array();
            var wrvalue = \'\';
            $.each($("input[name=\'correctortype[]\']:checked"), function() {
                crvalues.push($(this).val());
            });
            var crvalue = \'c=\'+crvalues;//alert(crvalue);
        }
        else if($(\'input[name=contrib_type]:checked\').val()==\'writer\')
        {//alert(\'1 checked..\');
            var wrvalues = new Array();
            var crvalue = \'\';
            $.each($("input[name=\'contribtype[]\']:checked"), function() {
                wrvalues.push($(this).val());
            });
            var wrvalue = \'w=\'+wrvalues;//alert(wrvalue);
        }
        else{var wrvalue = \'\',crvalue = \'\';}//alert(\'none checked..\');
        //alert("/mastermails/get-contrib-select?"+wrvalue+crvalue);
        //alert(language);alert(category);

        var list = document.getElementsByTagName(\'input\');  //Array containing all the input controls
        var catArray = [], lang2Array = []; //target Array
        for (var i = 0; i < list.length; i++) 
        {
            var node = list[i];//alert(node.getAttribute);
            if(node.getAttribute && node.getAttribute("id"))
            {
                //alert(node.getAttribute("id").substring(0, 11));
                if (node.getAttribute(\'type\') == \'text\' &&  node.getAttribute("id").substring(0, 11) == "percentage_")
                    catArray.push((node.getAttribute("id"))+\'=\'+($(\'#\'+(node.getAttribute("id"))).val()));
                else if (node.getAttribute(\'type\') == \'text\' &&  node.getAttribute("id").substring(0, 16) == "lang_percentage_")
                    lang2Array.push((node.getAttribute("id"))+\'=\'+($(\'#\'+(node.getAttribute("id"))).val()));
            }
        }

        $.post(
            "/mastermails/get-contrib-select?"+wrvalue+crvalue,
            { "language": language, "categ": catArray.join(\'|\'), "lng2": lang2Array.join(\'|\') },
            function(data,status)
            {
		//$(\'#ddd\').html(data);
                data = data.trim();
                data1 = data.split(\'#\');//alert(data);
                data2 = data1[1].split(\'|\');//alert(data2);
                $(\'#contribarea\').html(data1[0]);
                $(\'#sc_count\').html(\'(\'+data2[0]+\')\');
                $(\'#jc_count\').html(\'(\'+data2[1]+\')\');
                $(\'#jc0_count\').html(\'(\'+data2[2]+\')\');
                $(\'#csc_count\').html(\'(\'+data2[3]+\')\');
                $(\'#cjc_count\').html(\'(\'+data2[4]+\')\');
                $("#contributor_list").multiselect({noneSelectedText: "Select Contributor"});
                $("#contributor_list").multiselectfilter();
            }
        );
        document.getElementById(\'category\').selectedIndex = \'\';
        document.getElementById(\'language2\').selectedIndex = \'\';
		//retrictSelectCount(\'contributor_list\');
        
    }
    
	function fnChangeContact(type, value) {
		//alert(\'HI\');
		if (value != \'\' && type == \'client\') {
			$(\'#contributor_list\').val(\'0\').trigger("liszt:updated");
			if(checkifnotempty(\'client_list\')){
				 $(\'#cldiv\').css("border","1px solid #e3e3e3");
			}
			//alert("Ji");
			//
		} else if (value != \'\' && type == \'contributor\') {
			$(\'#client_list\').val(\'0\').trigger("liszt:updated");
			if(checkifnotempty(\'contributor_list\')){
				 $(\'#contribarea\').css("border","0px ");
			}
			
		}
	}
    
///////////adding percentages values for categories
var selectedarray = [];
//* sliders
function categoryList()
{        // alert(mycategs);
    var count = $("#category :selected").length;
    if(count > 0)
    {
        var opts=$("#category :selected").text();//alert(opts);
        var optsvalues=$("#category :selected").val();//alert(optsvalues);
        
        if(optsvalues.trim() != \'\')
        {
            $(\'#targetdiv\').show();
            if(($.inArray(optsvalues, selectedarray) == -1 && $.inArray(opts, selectedarray) == -1))
            {
                var newdiv = \'<div id=div_\'+optsvalues+\' style="float:left;width:215px;padding-right:35px;"><div>\' + opts + \'</div><div class="ui_slider span9" ondblclick="getIds(this.id);" id=\'+optsvalues+\' ></div><input type="text" class="span3" style="position:relative;top:-15px;left:10px;" id=percentage_\'+optsvalues+\' name=categ[\'+optsvalues+\']></input>\' +
                        \'<button  class="close" type="button" id=skill_close_\'+optsvalues+\' value=\'+optsvalues+\'  >&times;</button></div>\'
                $(\'#targetdiv\').append(newdiv);
                $("#"+optsvalues).slider({
                    range: "min",
                    value: 80,
                    min: 1,
                    max: 100,
                    slide: function( event, ui ) {
                        $( "#percentage_"+optsvalues ).val( ui.value );
                    },
                    change: function( event, ui ) {
                        contribFilter();
                    }
                });
                $( "#percentage_"+optsvalues ).val($( "#"+optsvalues ).slider( "value" ) );
    
            }
            selectedarray.push(opts);
            $(\'#targetdiv\').show();
        }
    }
}
/**closing the  categories with sliders**/
$("[id^=skill_close_]").live(\'click\', function(i) {
    var id = $(this).attr(\'value\');
    selectedarray.splice($.inArray(id, selectedarray), 1);
    $("#div_"+id).remove();
    if ($.trim( $(\'#targetdiv\').text() ).length === 0) {
        $(\'#targetdiv\').hide();
    }
    contribFilter(\'close\');
});

///////////adding percentages values for languages
var langselectedarray = [];
//* sliders
function languageList()
{        // alert();
    var count = $("#language2 :selected").length;
    if(count > 0)
    {
        var opts=$("#language2 :selected").text();//alert(opts);
        var optsvalues=$("#language2 :selected").val();//alert(optsvalues);
        
        if(optsvalues.trim() != \'\')
        {
            $(\'#langtargetdiv\').show();
            if(($.inArray(optsvalues, langselectedarray) == -1 && $.inArray(opts, langselectedarray) == -1))
            {
                var newdiv = \'<div id=langdiv_\'+optsvalues+\' style="float:left;width:215px;padding-right:35px;"><div>\' + opts + \'</div><div class="ui_slider span9" ondblclick="getIds(this.id);" id=lang\'+optsvalues+\' ></div><input type="text" class="span3" style="position:relative;top:-15px;left:10px;" id=lang_percentage_\'+optsvalues+\' name=lang2[\'+optsvalues+\']></input>\' +
                        \'<button  class="close" type="button" id=lang_skill_close_\'+optsvalues+\' value=\'+optsvalues+\'  >&times;</button></div>\'
                $(\'#langtargetdiv\').append(newdiv);
                $("#lang"+optsvalues).slider({
                    range: "min",
                    value: 80,
                    min: 1,
                    max: 100,
                    slide: function( event, ui ) {
                        $( "#lang_percentage_"+optsvalues ).val( ui.value );
                    },
                    change: function( event, ui ) {
                        contribFilter();
                    }
                });
                $( "#lang_percentage_"+optsvalues ).val($( "#lang"+optsvalues ).slider( "value" ) );
    
            }
            langselectedarray.push(opts);
            $(\'#langtargetdiv\').show();
        }
    }
}
/**closing the  languages with sliders**/
$("[id^=lang_skill_close_]").live(\'click\', function(i) {
    var id = $(this).attr(\'value\');
    langselectedarray.splice($.inArray(id, langselectedarray), 1);
    $("#langdiv_"+id).remove();
    if ($.trim( $(\'#langtargetdiv\').text() ).length === 0) {
        $(\'#langtargetdiv\').hide();
    }
    contribFilter(\'close\');
});
</script>
<style>
    /*input#attachments{position:fixed;top:-700px; display:none;}*/
</style>
'; ?>

<div class="row-fluid">
    <div class="span12">
		<h3 class="heading">
			System Messages :: Write Message
		</h3>

        <div class="tab-pane" id="mbox_new">
            <form id="new_message_form" method="POST" name="new_message" action="/mastermails/sendcomposemail" enctype="multipart/form-data">
                <?php if ($this->_tpl_vars['user_type'] == 'superadmin'): ?>
                <div class="sepH_b">
                    <label class="control-label" for="mail_sender">Transmitter</label>
                    <!--<select style="min-width:300px;" name="from_client_contact" id="from_client_list" data-placeholder="S&eacute;lectionner Client" onchange="fnChangeFromContact('client',this.value);">
                        <option value=""></option>
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['Cients_contacts'],'selected' => $this->_tpl_vars['toClientId']), $this);?>

                    </select>
                    <select style="min-width:300px;" name="from_contributor_contact" id="from_contributor_list" data-placeholder="S&eacute;lectionner Contributor" onchange="fnChangeFromContact('contributor',this.value);">
                        <option value=""></option>
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['Contributor_contacts'],'selected' => $this->_tpl_vars['toContributorId']), $this);?>

                    </select>-->
                    <select style="min-width:300px;" name="from_ep_contact" id="from_ep_list" data-placeholder="UTILISATEUR BO" onchange="fnChangeFromContact('bouser',this.value);">
                        <option value=""></option>
                         <?php $_from = $this->_tpl_vars['EP_contacts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['epkey'] => $this->_tpl_vars['epitem']):
?>
							<option value="<?php echo $this->_tpl_vars['epkey']; ?>
" <?php if ($this->_tpl_vars['epkey'] == $this->_tpl_vars['sender']): ?>selected<?php endif; ?>><?php if ($this->_tpl_vars['epkey'] == $this->_tpl_vars['sender']): ?>Me<?php else: ?><?php echo $this->_tpl_vars['epitem']; ?>
<?php endif; ?></option>
						<?php endforeach; endif; unset($_from); ?>
                    </select>
                </div>
                <?php else: ?>
                <input type="hidden" name="from_ep_contact" value="<?php echo $this->_tpl_vars['admin_user_id']; ?>
">
                <?php endif; ?>
                
                <div class="sepH_b">
                    <label class="control-label">Receiver</label>
                </div>
                
                <div class="sepH_b form-inline">
                    <label class="uni-radio" id="clientSel"><input type="radio" name="user_type" class="uni_style"  value="1" id="user_type1">Client</label>
                    <label class="uni-radio" id="contribSel"><input type="radio" name="user_type" class="uni_style"  value="2" id="user_type2">Contributeur</label>
                </div>
                
                <div class="sepH_b">
                    
                    <div id="cldiv" class="well" style="display:none;width:450px;">
                        <select multiple="multiple" id="client_list" name="client_contact[]" class="span6" onchange="fnChangeContact('client',this.value);" data-placeholder="S&eacute;lectionner Client" style="min-width:300px;">
                            <?php echo smarty_function_html_options(array('id' => 'client_list','options' => $this->_tpl_vars['Cients_contacts'],'selected' => $this->_tpl_vars['toClientId']), $this);?>

                        </select>
                        <!-- style="width:185px;" data-placeholder="S&eacute;lectionner Client"-->
                    </div>
                     <div><span style='color:red;' id='uiselecterrorclient'></span></div>
                    
                </div>
                
                <div class="sepH_b">
                    
                    <div style="display:none;width:95%;float:left;" class="well" id="wrdiv">
                        
                        <table width="100%" cellspacing="4" cellpadding="4" align="left">
                            <tr>
                                <td align="left">
                                    <!--<label class="uni-radio"><input type="radio" name="contrib_type" class="uni_style"  value="1" id="contrib_type1">Writer</label>-->
                                    <label class="uni-checkbox"><input type="radio" value="writer" name="contrib_type" id="contrib_type1" class="uni_style" onchange="contribFilter()" onClick="changeContrib(1);"/>Writer</label>
                                </td>
                            </tr>
                            <tr id="wrtRow" style="display:none;">
                                <td align="left" style="padding-left:30px;">
                                    
                                    <label class="uni-checkbox"><input type="checkbox" value="senior" name="contribtype[]" id="writertype1" class="uni_style" checked onchange="contribFilter();checkWC();" onClick="updatecontriblist(0);"/>SC<b id="sc_count">(<?php echo $this->_tpl_vars['sc_count']; ?>
)</b></label>
                
                                    <label class="uni-checkbox"><input type="checkbox" value="junior" name="contribtype[]" id="writertype2" class="uni_style" checked onchange="contribFilter();checkWC();" onClick="updatecontriblist(0);"/>JC<b id="jc_count">(<?php echo $this->_tpl_vars['jc_count']; ?>
)</b></label>
                
                                    <label class="uni-checkbox"><input type="checkbox" value="sub-junior" name="contribtype[]" id="writertype3" class="uni_style" checked onchange="contribFilter();checkWC();" onClick="updatecontriblist(0);"/>JC0<b id="jc0_count">(<?php echo $this->_tpl_vars['jc0_count']; ?>
)</b></label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <!--<label class="uni-radio"><input type="radio" name="contrib_type" class="uni_style"  value="2" id="contrib_type2">Corrector</label>-->
                                    <label class="uni-checkbox"><input type="radio" value="corrector" name="contrib_type" id="contrib_type2" class="uni_style" onchange="contribFilter()" onClick="changeContrib(2);"/>Proof reader</label>
                                </td>
                            </tr>
                            <tr id="crtRow" style="display:none;">
                                <td align="left" style="padding-left:30px;">
                                    
                                    <label class="uni-checkbox"><input type="checkbox" value="senior" name="correctortype[]" id="correctortype1" class="uni_style" checked onchange="contribFilter();checkWC();" onClick="updatecontriblist(0);"/>SC<b id="csc_count">(<?php echo $this->_tpl_vars['csc_count']; ?>
)</b></label>
                
                                    <label class="uni-checkbox"><input type="checkbox" value="junior" name="correctortype[]" id="correctortype2" class="uni_style" checked onchange="contribFilter();checkWC();" onClick="updatecontriblist(0);"/>JC<b id="cjc_count">(<?php echo $this->_tpl_vars['cjc_count']; ?>
)</b></label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    
                                    <label class="control-label" for="language">Langue maternelle</label>
                                    <span>
                                        <select name="language" id="language" class="chzn_a" onchange="contribFilter()" data-placeholder="S&eacute;lectionner">
                                            <option value="">Select</option>
                                            <?php $_from = $this->_tpl_vars['ep_language_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitm']):
?>
                                                <option value="<?php echo $this->_tpl_vars['langkey']; ?>
"><?php echo $this->_tpl_vars['langitm']; ?>
</option>
                                            <?php endforeach; endif; unset($_from); ?>
                                         </select>
                                    </span>
                                    
                                    <label class="control-label" for="language">Langue 2</label>
                                    <span>
                                        <select name="language2" id="language2" class="chzn_lan1" onchange="contribFilter()" data-placeholder="S&eacute;lectionner">
                                            <option value="">Select</option>
                                            <?php $_from = $this->_tpl_vars['ep_language_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitm']):
?>
                                                <option value="<?php echo $this->_tpl_vars['langkey']; ?>
"><?php echo $this->_tpl_vars['langitm']; ?>
</option>
                                            <?php endforeach; endif; unset($_from); ?>
                                         </select>
                                    </span>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    
                                    <div class="alert alert-info span9 hide" id="langtargetdiv" style="width:100%;margin:0;"></div>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    
                                    <label class="control-label" for="category">Categorie</label>
                                    <span>
                                        <select name="category" id="category" class="chzn_b" onchange="contribFilter();" data-placeholder="S&eacute;lectionner">
                                            <option value="">S&eacute;lectionner</option>
                                            <?php $_from = $this->_tpl_vars['ep_categories_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['catkey'] => $this->_tpl_vars['catitm']):
?>
                                                <option value="<?php echo $this->_tpl_vars['catkey']; ?>
"><?php echo $this->_tpl_vars['catitm']; ?>
</option>
                                            <?php endforeach; endif; unset($_from); ?>
                                         </select>
                                    </span>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    
                                    <div class="alert alert-info span9 hide" id="targetdiv" style="width:100%;"></div>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-top:10px;" id="contribarea">
                                    <select multiple="multiple" id="contributor_list" name="contributor_contact[]" class="span6" data-placeholder="S&eacute;lectionner Contributor" onchange="fnChangeContact('contributor',this.value);" style="min-width:300px;">
                                        <?php echo smarty_function_html_options(array('id' => 'contributor_list','options' => $this->_tpl_vars['Contributor_contacts'],'selected' => $this->_tpl_vars['toContributorId']), $this);?>

                                    </select>
                                    
                                </td>
                            </tr>
                            <tr><td><span  style='color:red;' id='uiselecterrorcontrib'></span></td></tr>
                        </table>
                        
                    </div>
                    
                </div>
                
                <div class="sepH_b">
                    <label class="control-label" for="msg_object">Subject</label>
                    <span>
                        <input type="text" class="span12" id="msg_object" name="msg_object">
                    </span>
                </div>
                <div class="sepH_c">
                    <label class="control-label">Attachment(s)</label>
                        <!--<button id="doc_alt">Choisir un flchier</button><label for="doc_alt">Aucun fichier choisi</label>-->
                    <div class="mail_uploader">
                        <input type="file" name="attachment[]" id="attachments"  class="multi">
                    </div>

                </div>
                <div class="formSep" id="ddd">
                    <label class="control-label" for="mail_message">Message</label>
                    <span>                        <textarea class="span12 auto_expand" rows="5" cols="10" id="mail_message" name="mail_message"></textarea></span>
                    <span id="message_error"></span>
                </div>

                <div>
                    <button class="btn btn-gebo" type="submit" id="send_message">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>