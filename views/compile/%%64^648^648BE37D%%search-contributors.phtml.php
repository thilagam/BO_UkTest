<?php /* Smarty version 2.6.19, created on 2015-10-07 16:03:59
         compiled from gebo/user/search-contributors.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'gebo/user/search-contributors.phtml', 619, false),array('modifier', 'cat', 'gebo/user/search-contributors.phtml', 621, false),array('modifier', 'wordwrap', 'gebo/user/search-contributors.phtml', 882, false),array('function', 'html_options', 'gebo/user/search-contributors.phtml', 736, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
function getUrlVars()
{
    var vars = [], hash;

    var hashes = window.location.href.slice(window.location.href.indexOf(\'?\') + 1).split(\'&\');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split(\'=\');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function getArrayUrl()
{
    // our test url
    var url =$(location).attr(\'href\');
    // filtering the string..
    var paramsList = url.slice(url.indexOf("?")+1,url.length) ;    //alert(paramsList);
    ///return paramsList;
    var filteredList =  paramsList.split("&") ;
    // an object to store arrays
    var objArr = {} ;

    // the below loop is obvious... we just remove the [] and +.. and split into pair of key and value.. and store as an array...
    for (var i=0, l=filteredList.length; i <l; i +=1 ) {
       // alert(filteredList[i]);
        var param = decodeURIComponent(filteredList[i].replace("[]","")).replace(/\\+/g," ") ;       //alert(param);
        var pair = param.split("=") ;
        if(!objArr[pair[0]]) {  objArr[pair[0]] = [] ;}
        objArr[pair[0]].push(pair[1]);

    }
    return  objArr;

}


var ctype = getUrlVars()["counttype"];
var count = getUrlVars()["count"];

$(document).ready(function() {      //getArrayUrl();
    var tab = getParameterByName(\'tab\', $(location).attr(\'href\'));
    if(tab == \'\')
        $("#contributorstab").addClass(\'active\');
    else
        $("#"+tab).addClass(\'active\');
    //////////////////////////////////////////////////////////////
    $("#sel_type").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#sel_status").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#type").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#status").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#sel_group").chosen({ allow_single_deselect: true,search_contains: true  });
    $("#sel_user").chosen({ allow_single_deselect: true,search_contains: true  });
    $("#category").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#nationalism").chosen({ allow_single_deselect: true,search_contains: true  });
    $("#language").chosen({ allow_single_deselect: true,search_contains: true  });
    $("#language2").chosen({ allow_single_deselect: false,search_contains: true  });
    $("#contrib").chosen({ allow_single_deselect: true,search_contains: true  });
    $("#country").chosen({ allow_single_deselect: true,search_contains: true  });
    $("#aotitle").chosen({ allow_single_deselect: true,search_contains: true  });
    $("#contribquiz").chosen({ allow_single_deselect: true,search_contains: true  });
    $(".uni_style").uniform();
    gebo_validation.reg();
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
                $( "#slider-skill_number_1").val( ui.value +"%");
            }
        });
        $( "#slider-skill_number_1").val( $( "#slider-skill_1").slider( "value" ) +"%" );

    });

    $(\'#contribsgrid\').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/user/loadcontributor",
        "fnServerParams": function ( aoData ) {
            aoData.push( { "name": ctype, "value": "yes" } );
            aoData.push({ "name": "totalcount", "value": count })
            aoData.push({ "name": "searchsubmit", "value": getUrlVars()["searchsubmit"] })
            aoData.push({ "name": "start_date", "value": getUrlVars()["start_date"] })
            aoData.push({ "name": "end_date", "value": getUrlVars()["end_date"] })
            aoData.push({ "name": "activity_start_date", "value": getUrlVars()["activity_start_date"] })
            aoData.push({ "name": "activity_end_date", "value": getUrlVars()["activity_end_date"] })
            aoData.push({ "name": "aoList", "value": getUrlVars()["aoList"] })
            aoData.push({ "name": "arttitle", "value": getUrlVars()["arttitle"] })
            aoData.push({ "name": "contrib", "value": getUrlVars()["contrib"] })
            aoData.push({ "name": "type", "value": getUrlVars()["type"] })
            aoData.push({ "name": "type2", "value": getUrlVars()["type2"] })
            aoData.push({ "name": "status", "value": getUrlVars()["status"] })
            aoData.push({ "name": "blacklist", "value": getUrlVars()["blacklist"] })
            aoData.push({ "name": "nationalism", "value": getUrlVars()["nationalism"] })
            aoData.push({ "name": "category", "value": getUrlVars()["category"] })
            aoData.push({ "name": "categ", "value": getUrlVars()["categ"]})
            //aoData.push({ "name": "fullurl", "value": JSON.stringify(getArrayUrl())})
            aoData.push({ "name": "fullurl", "value": $(location).attr(\'href\')})
            aoData.push({ "name": "language", "value": getUrlVars()["language"] })
            aoData.push({ "name": "language2", "value": getUrlVars()["language2"] })
            aoData.push({ "name": "aotitle", "value": getUrlVars()["aotitle"] })
            aoData.push({ "name": "minage", "value": getUrlVars()["minage"] })
            aoData.push({ "name": "maxage", "value": getUrlVars()["maxage"] })
            aoData.push({ "name": "min_arts_validated", "value": getUrlVars()["min_arts_validated"] })
            aoData.push({ "name": "max_arts_validated", "value": getUrlVars()["max_arts_validated"] })
            aoData.push({ "name": "min_total_parts", "value": getUrlVars()["min_total_parts"] })
            aoData.push({ "name": "max_total_parts", "value": getUrlVars()["max_total_parts"] })
            aoData.push({ "name": "min_arts_sent", "value": getUrlVars()["min_arts_sent"] })
            aoData.push({ "name": "max_arts_sent", "value": getUrlVars()["max_arts_sent"] })
            aoData.push({ "name": "min_parts_refused", "value": getUrlVars()["min_parts_refused"] })
            aoData.push({ "name": "max_parts_refused", "value": getUrlVars()["max_parts_refused"] })
            aoData.push({ "name": "min_arts_refused", "value": getUrlVars()["min_arts_refused"] })
            aoData.push({ "name": "max_arts_refused", "value": getUrlVars()["max_arts_refused"] })
            aoData.push({ "name": "noof_disapproved", "value": getUrlVars()["noof_disapproved"] })
            aoData.push({ "name": "contrib_self_details", "value": getUrlVars()["contrib_self_details"] })
            aoData.push({ "name": "contributortest", "value": getUrlVars()["contributortest"] })
        },
        "oTableTools": {
            "aButtons": [
                "copy",
                "print",
                {
                    "sExtends":    "collection",
                    "sButtonText": \'Sauvegarder <span class="caret" />\',
                    "aButtons":    [ "csv", "xls", "pdf" ]
                }
            ],
            "sSwfPath": "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
        }
    } );

    /////////////save search function///////////////
    $("#savesearch").click(function(){
        $("#savesearch").hide();
        $("#subsavesearch").show();
        $("#searchname").show();
    });
    $("#subsavesearch").click(function(){
        if ($(\'#searchname\').val() == \'\') {
            smoke.alert(\'Please Enter Search Name\');
            $(\'#searchname\').focus();
            return false;
        }
        else
        {
            var target_page = "/user/savesearch?searchname="+$(\'#searchname\').val();
            $.post(target_page,  function(data){
                smoke.alert(\'Your seach criteria has been saved\');
                $("#savesearch").show();
                $("#subsavesearch").hide();
                $("#searchname").hide();
            });
        }
    });
    var str = $(location).attr(\'href\');
    var str = decodeURIComponent(str);
    var urlarr = str.split(\'&\');

     mycategs = new Array();
    for(var i=0; i<urlarr.length; i++)
    {
        if(urlarr[i].match(\'categ\') && !urlarr[i].match(\'category\'))
        {
            var catarr = urlarr[i].split(\'=\');
            var replacedword = urlarr[i].replace("categ[", \'\');
            replacedword = replacedword.replace("]", \'\');
            mycategs.push(replacedword);
        }
    }
    if(mycategs != \'\')
        categoryInSearch(mycategs);

     mylanges = new Array();
    for(var i=0; i<urlarr.length; i++)
    {
        if(urlarr[i].match(\'lange\'))
        {
            var langarr = urlarr[i].split(\'=\');
            var replacedlangword = urlarr[i].replace("lange[", \'\');
            replacedlangword = replacedlangword.replace("]", \'\');
            mylanges.push(replacedlangword);
        }
    }
    if(mylanges != \'\')
        languageInSearch(mylanges);

});
function getURLParameter(name) {
    return decodeURI(
            (RegExp(name + \'=\' + \'(.+?)(&|$)\').exec(location.search)||[,null])[1]
    );
}
/////////////edit search function///////////////
function editSearch(id)
{
    $("#editsearch_"+id).hide();
    $("#editsubsavesearch_"+id).show();
    $("#editsearchname_"+id).show();
}
function editSubSaveSearch(id)
{
    if ($(\'#editsearchname_\'+id).val() == \'\') {
        smoke.alert(\'Please Enter Search Name\');
        $(\'#editsearchname_\'+id).focus();
        return false;
    }
    else
    {    // alert($(\'#editsearchid_\'+id).val());    alert($(\'#editsearchname_\'+id).val());
        var target_page = "/user/editsearch?searchId="+$(\'#editsearchid_\'+id).val()+"&editsearchname="+$(\'#editsearchname_\'+id).val();
        $.post(target_page,  function(data){ //alert(data);
            smoke.alert(\'Your seach criteria has been saved\');
            $("#editsearch_"+id).show();
            $("#editsubsavesearch_"+id).hide();
            $("#editsearchname_"+id).hide();
            $("#editedval_"+id).html($(\'#editsearchname_\'+id).val());
        });
        //window.location.reload();
    }
}
function checkEmailExist()
{
    var email = $("#email").val();
    var target_page = "/user/email-exits?email="+email;
    $.post(target_page, function(data){ //alert(data);
        var data1 = data.trim();
        if(data1 == "yes")
        {
            smoke.alert("email id is already exist");
            $("#emai").val(\'\');
            return false;
        }
        else
        {

            return true;
        }
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
            },
            unhighlight: function(element) {
                $(element).closest(\'div\').removeClass("f_error");
            },
            errorPlacement: function(error, element) {
                $(element).closest(\'div\').append(error);
                $(\'.error\').css("font-size", "10px");
                $(\'.error\').css("padding-top", "5px");
            },
            rules: {
                first_name: { required: true, minlength: 3 },
                last_name: { required: true, minlength: 2 },
                login: { required: true, minlength: 2 },
                password: { required: true, minlength: 2 },
                phone_number: { required: true },
                address2: { required: true, minlength: 5 },
                country: { required: true, minlength: 2 },
                email: { required: true, minlength: 3 },
                type: { valueNotEquals: "default" } ,
                status: { valueNotEquals: "default" }
            },
            invalidHandler: function(form, validator) {
                $.sticky("There are some errors. Please correct them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });
            }
        })
    }
};

///////////adding percentages values for categories
var selectedarray = [];
//* sliders
function categoryList()
{        // alert(mycategs);
    var count = $("#category :selected").length;
    if(count > 0)
    {
        $(\'#targetdiv\').show();
        var opts=$("#category :selected").text();
        var optsvalues=$("#category :selected").val();
       //alert(selectedarray); alert(optsvalues);   alert($.inArray(optsvalues, selectedarray));
        if($.inArray(optsvalues, selectedarray) == -1 && $.inArray(opts, selectedarray) == -1)
        {
            var newdiv = \'<div id=div_\'+optsvalues+\'><div>\' + opts + \'</div><div class="ui_slider span9" ondblclick="getIds(this.id);" id=\'+optsvalues+\' ></div><input type="text" class="span2" style="position:relative;top:-15px;left:10px;" id=percentage_\'+optsvalues+\' name=categ[\'+optsvalues+\']></input>\' +
                    \'<button  class="close" type="button" id=skill_close_\'+optsvalues+\' value=\'+optsvalues+\'  >&times;</button></div>\'
            $(\'#targetdiv\').append(newdiv);
            $("#"+optsvalues).slider({
                range: "min",
                value: 0,
                min: 1,
                max: 100,
                slide: function( event, ui ) {
                    $( "#percentage_"+optsvalues ).val( ui.value );
                }
            });
            $( "#percentage_"+optsvalues ).val($( "#"+optsvalues ).slider( "value" ) );

        }
        selectedarray.push(opts);
        $(\'#targetdiv\').show();

    }
}
/**closing the  categories with sliders**/
$("[id^=skill_close_]").live(\'click\', function(i) {
    var id = $(this).attr(\'value\');
    $("#div_"+id).remove();
    if ($.trim( $(\'#targetdiv\').text() ).length === 0) {
        $(\'#targetdiv\').hide();
    }
});
function categoryInSearch(cates)
{
    for(var i=0; i<cates.length; i++)
    {
        var catdetail = cates[i].split(\'=\');
        $(\'#targetdiv\').show();
        var opts=catdetail[0];
        var optsvalues=catdetail[0];

        var catarray = new Array();
        catarray[\'kitchen\'] = \'cusine\'; catarray[\'ecomm\'] = \'E-commerce / shopping\'; catarray[\'edu\'] = \'Education\';
        catarray[\'tech\'] = \'High Tech / Téléphonie \';catarray[\'finance\'] = \'Immobilier / Finances / Bourse \';catarray[\'computer\'] = \'Informatique\';catarray[\'fashion\'] = \'Mode / Femme / Beauté\';
        catarray[\'ppl\'] = \'People\';catarray[\'meet\'] = \' Rencontre\';catarray[\'corpsite\'] = \'Site institutionnel\';catarray[\'sports\'] = \'Sport / Paris sportifs \';
        catarray[\'ls\'] = \'Vie pratique\'; catarray[\'travel\'] = \'Voyage  / shopping\'; catarray[\'other\'] = \' Autres\';
        if($.inArray(opts, selectedarray) == -1)
        {
            var newdiv = \'<div id=div_\'+optsvalues+\' ><div>\' + catarray[opts] + \'</div><div class="ui_slider span9" ondblclick="getIds(this.id);" id=\'+optsvalues+\' ></div><input type="text" class="span2" style="position:relative;top:-15px;left:10px;" id=percentage_\'+optsvalues+\' name=categ[\'+optsvalues+\']></input>\' +
                    \'<button  class="close" type="button" id=skill_close_\'+optsvalues+\' value=\'+optsvalues+\'  >&times;</button></div>\'
            $(\'#targetdiv\').append(newdiv);
            $( "#"+optsvalues ).slider({
                range: "min",
                value: 0,
                min: 1,
                max: 100,
                slide: function( event, ui ) {
                    $( "#percentage_"+optsvalues ).val( ui.value );
                }
            });
            $( "#percentage_"+optsvalues ).val(catdetail[1]);

        }
        selectedarray.push(opts);
        $(\'#targetdiv\').show();
    }
}
///////////adding percentages values for languages 2////////
var selectedarray = [];
function language2List()
{
    var count = $("#language2 :selected").length;
    if(count > 0)
    {
        $(\'#targetdivlang\').show();
        var opts=$("#language2 :selected").text();
        var optsvalues=$("#language2 :selected").val();

        if($.inArray(opts, selectedarray) == -1)
        {
            var newdiv = \'<div id=div_\'+optsvalues+\'><div >\' + opts + \'</div><div class="ui_slider span9" ondblclick="getLang2Ids(this.id);" id=\'+optsvalues+\' ></div><input type="text"  class="span2" style="position:relative;top:-15px;left:10px;" id=perctlang_\'+optsvalues+\' name=lange[\'+optsvalues+\']></input>\' +
                    \'<button  class="close" type="button" id=lang_close_\'+optsvalues+\' value=\'+optsvalues+\'  >&times;</button></div>\'
            $(\'#targetdivlang\').append(newdiv);
            $( "#"+optsvalues ).slider({
                range: "min",
                value: 0,
                min: 1,
                max: 100,
                slide: function( event, ui ) {
                    $( "#perctlang_"+optsvalues ).val( ui.value );
                }
            });
            $( "#perctlang_"+optsvalues ).val($( "#"+optsvalues ).slider( "value" ) );
        }
        selectedarray.push(opts);
        $(\'#targetdivlang\').show();

    }
}
/**closing the  languge with sliders**/
$("[id^=lang_close_]").live(\'click\', function(i) {
    var id = $(this).attr(\'value\');
    $("#div_"+id).remove();
    if ($.trim( $(\'#targetdivlang\').text() ).length === 0) {
        $(\'#targetdivlang\').hide();
    }
});

function languageInSearch(langes)
{
    for(var i=0; i<langes.length; i++)
    {
        var langdetail = langes[i].split(\'=\');
        $(\'#targetdivlang\').show();
        var opts=langdetail[0];
        var optsvalues=langdetail[0];
        var langarray = new Array();
        langarray[\'fr\']=\'Fran\\u00c7ais\'; langarray[\'us\']=\'Anglais (US)\'; langarray[\'uk\']=\'Anglais (Uk)\';langarray[\'sp\']=\'Espagnol\';
        langarray[\'de\']=\'Allemand\'; langarray[\'it\']=\'Italien\'; langarray[\'dn\']=\'Danois\'; langarray[\'fl\']=\'Finlandais (Finnois)\';
        langarray[\'po\']=\'Portugais\'; langarray[\'nl\'] =\'N\\u00e9erlandais\'; langarray[\'nr\']=\'Norv\\u00e9gien\'; langarray[\'su\']=\'Su\\u00e9dois\';
        langarray[\'ru\']=\'Russe\'; langarray[\'pol\']=\'Polonais\';langarray[\'ch\']=\'Chinois\'; langarray[\'jap\']=\'Japonais\';
        langarray[\'cor\']=\'Cor\\u00e9en\'; langarray[\'ar\'] =\'Arabe\'; langarray[\'afr\']=\'Afrikaans\'; langarray[\'alb\']=\'Albanais\';
        langarray[\'alms\']=\'Allemand (Suisse)\'; langarray[\'alma\'] =\'Allemand (Autriche)\'; langarray[\'angaus\']=\'Anglais (Australie/ Nouvelle Z\\u00e9lande)\';
        langarray[\'arb\']=\'Arabe\'; langarray[\'blg\'] =\'Bulgare\'; langarray[\'cat\']=\'Catalan\'; langarray[\'chn\']=\'Chinois (cantonais)\';
        langarray[\'crt\']=\'Croate\'; langarray[\'espa\'] =\'Espagnol (Argentine)\'; langarray[\'espm\']=\'Espagnol (Mexique)\'; langarray[\'est\']=\'Estonien\';
        langarray[\'flp\']=\'Filipino\'; langarray[\'frs\']=\'Polonais\';langarray[\'ch\']=\'Chinois\'; langarray[\'jap\']=\'Japonais\';
        langarray[\'frb\']=\'Français (Belgique)\'; langarray[\'grec\']=\'Grec\';langarray[\'hbr\']=\'H\\u00e9breu\'; langarray[\'hngr\']=\'Hongrois\';
        langarray[\'hindi\']=\'Hindi\'; langarray[\'ind\']=\'Indon\\u00e9sien\';langarray[\'isl\']=\'Islandais\'; langarray[\'kmr\']=\'Khmer\';
        langarray[\'krd\']=\'Kurde\'; langarray[\'ltn\']=\'Letton\';langarray[\'ltin\']=\'Lituanien\'; langarray[\'mal\']=\'Malais\';
        langarray[\'nrld\']=\'N\\u00e9erlandais (flamand)\'; langarray[\'prsn\']=\'Persan\';langarray[\'ptsb\']=\'Portugais (Br\\u00e9sil)\'; langarray[\'qtr\']=\'Qatari\';
        langarray[\'rmn\']=\'Roumain\'; langarray[\'srb\']=\'Serbe\';langarray[\'svq\']=\'Slovaque\'; langarray[\'sml\']=\'Somali\';
        langarray[\'krd\']=\'Swahili\'; langarray[\'tch\']=\'Tch\\u00e8que\';langarray[\'turc\']=\'Turc\'; langarray[\'ukrn\']=\'Ukrainien\';
        langarray[\'vtnm\']=\'Vietnamien\'; langarray[\'espco\']=\'Espagnol (Colombie)\';langarray[\'espp\']=\'Espagnol (P\\u00e9rou)\'; langarray[\'espc\']=\'Espagnol (Chili)\';
        langarray[\'espv\']=\'Espagnol (Venezuela)\'; langarray[\'sl\']=\'Slov\\u00e8ne\';langarray[\'bsn\']=\'Bosniaque\'; langarray[\'arm\']=\'Arm\\u00e9nien\';
        langarray[\'grg\']=\'Georgien\'; langarray[\'azr\']=\'Az\\u00e9ri\';langarray[\'mng\']=\'Mongol\'; langarray[\'ozk\']=\'Ouzbek\'; langarray[\'ml\']=\'Maltais\';

        if($.inArray(opts, selectedarray) == -1)
        {
            var newdiv = \'<div id=div_\'+optsvalues+\'><div >\' + langarray[opts] + \'</div><div class="ui_slider span9" ondblclick="getLang2Ids(this.id);" id=\'+optsvalues+\' ></div><input type="text"  class="span2" style="position:relative;top:-15px;left:10px;" id=perctlang_\'+optsvalues+\' name=lange[\'+optsvalues+\']></input>\' +
                    \'<button  class="close" type="button" id=lang_close_\'+optsvalues+\' value=\'+optsvalues+\'  >&times;</button></div>\'
            $(\'#targetdivlang\').append(newdiv);
            $( "#"+optsvalues ).slider({
                range: "min",
                value: 0,
                min: 1,
                max: 100,
                slide: function( event, ui ) {
                    $( "#perctlang_"+optsvalues ).val( ui.value );
                }
            });
            $( "#perctlang_"+optsvalues ).val(langdetail[1]);
        }
        selectedarray.push(opts);
        $(\'#targetdivlang\').show();
    }
}
///////validating the search form/////
function valSearchContribs()
{
    if($(\'#minage\').val()!= \'\')
    {
        if ($.isNumeric($(\'#minage\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#minage\').focus();
            return false;
        }
        else if ($.isNumeric($(\'#maxage\').val()) == false || $(\'#maxage\').val()=="")
        {
            smoke.alert("please enter only numeric values");
            $(\'#maxage\').focus();
            return false;
        }
        else if ($(\'#minage\').val() >=  $(\'#maxage\').val())
        {
            smoke.alert("min value is greater than max value");
            $(\'#maxage\').focus();
            return false;
        }
    }
    if($(\'#min_arts_validated\').val()!= \'\')
    {
        if ($.isNumeric($(\'#min_arts_validated\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#min_arts_validated\').focus();
            return false;
        }
        else if ($.isNumeric($(\'#max_arts_validated\').val()) == false || $(\'#max_arts_validated\').val()=="")
        {
            smoke.alert("please enter only numeric values");
            $(\'#max_arts_validated\').focus();
            return false;
        }
    }
    if($(\'#min_total_parts\').val()!= \'\')
    {
        if ($.isNumeric($(\'#min_total_parts\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#min_total_parts\').focus();
            return false;
        }
        else if ($.isNumeric($(\'#max_total_parts\').val()) == false || $(\'#max_total_parts\').val()=="")
        {
            smoke.alert("please enter only numeric values");
            $(\'#max_total_parts\').focus();
            return false;
        }
    }
    if($(\'#min_arts_sent\').val()!= \'\')
    {
        if ($.isNumeric($(\'#min_arts_sent\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#min_arts_sent\').focus();
            return false;
        }
        else if ($.isNumeric($(\'#max_arts_sent\').val()) == false || $(\'#max_arts_sent\').val()=="")
        {
            smoke.alert("please enter only numeric values");
            $(\'#max_arts_sent\').focus();
            return false;
        }
    }
    if($(\'#min_parts_refused\').val()!= \'\')
    {
        if ($.isNumeric($(\'#min_parts_refused\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#min_parts_refused\').focus();
            return false;
        }
        else if ($.isNumeric($(\'#max_parts_refused\').val()) == false || $(\'#max_parts_refused\').val()=="")
        {
            smoke.alert("please enter only numeric values");
            $(\'#max_parts_refused\').focus();
            return false;
        }
    }
    if($(\'#min_arts_refused\').val()!= \'\')
    {
        if ($.isNumeric($(\'#min_arts_refused\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#min_arts_refused\').focus();
            return false;
        }
        else if ($.isNumeric($(\'#max_arts_refused\').val()) == false || $(\'#max_arts_refused\').val()=="")
        {
            smoke.alert("please enter only numeric values");
            $(\'#max_arts_refused\').focus();
            return false;
        }
    }
    if($(\'#noof_disapproved\').val()!= \'\')
    {
        if ($.isNumeric($(\'#noof_disapproved\').val()) == false)
        {
            smoke.alert("please enter only numeric values");
            $(\'#noof_disapproved\').focus();
            return false;
        }
    }
    else
        return true;

}
//* bootstrap datepicker
gebo_datepicker = {
    init: function() {
        $(\'#dp1\').datepicker();
        $(\'#dp2\').datepicker();
        $(\'#actdp1\').datepicker();
        $(\'#actdp2\').datepicker();
    }};

</script>
'; ?>

<div class="row-fluid">
  <div class="span12" style="">
      <div class="tabbable">
          <ul class="nav nav-tabs">
              <li <?php if ($_GET['tab'] == 'contributorstab' || $_GET['tab'] == ''): ?> class="active" <?php endif; ?>><a href="#contributorstab" data-toggle="tab" class="lable-danger"><strong>Contributeurs</strong></a></li>
              <li <?php if ($_GET['tab'] == 'searchcontirbtab'): ?> class="active" <?php endif; ?>><a href="#searchcontirbtab" data-toggle="tab" class="lable-info"><strong>Rechercher Les Contributeurs</strong></a></li>
              <!--<a href="adduser?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
">new user</a>-->
          </ul>
          <div class="tab-content">
          <div id="contributorstab" class="tab-pane">
              <div class="alert alert-info form-inline">
                  <div class="alpbold">
                      Total Contributors : <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab&counttype=total_contribs" class="label label-info"><?php echo $this->_tpl_vars['contribCount'][4]['total_contribs']; ?>
</a> |
                      Never Participated  : <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab&counttype=never_participated" class="label label-warning"><?php echo $this->_tpl_vars['contribCount'][0]['never_participated']; ?>
</a> |
                      Never Validated : <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab&counttype=never_validated" class="label label-gebo"><?php echo $this->_tpl_vars['contribCount'][2]['never_validated']; ?>
</a> |
                      Never Sent  : <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab&counttype=never_sent" class="label label-danger"><?php echo $this->_tpl_vars['contribCount'][1]['never_sent']; ?>
</a> |
                      Atleast 1 Validated : <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab&counttype=once_validated" class="label label-inverse"><?php echo $this->_tpl_vars['contribCount'][3]['once_validated']; ?>
</a> |
                      Published : <a href="/user/users-list?submenuId=ML2-SL7&tab=contributorstab&counttype=once_published" class="label label-success"><?php echo $this->_tpl_vars['contribCount'][5]['once_published']; ?>
</a></div>
              </div>
              <table class="table table-striped table-bordered dTableR tdleftalign" id="contribsgrid">
                  <thead>
                  <tr>
                      <th>SL.NO</th>
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Profile Type</th>
                      <th>Statut</th>
                      <th>Compte cr&eacute;&eacute; le</th>
                      <th>categories</th>
                      <th>Langue</th>
                      <th>Tested contributor</th>
                      <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
              <div class="row-fluid">
                  <div class="span7 form-inline">
                      <?php $this->assign('urlstring', $_SERVER['REQUEST_URI']); ?>
                      <?php $this->assign('pageurl', ((is_array($_tmp=$this->_tpl_vars['urlstring'])) ? $this->_run_mod_handler('explode', true, $_tmp, "&") : smarty_modifier_explode($_tmp, "&"))); ?>
                      <?php if ($_GET['searchsubmit']): ?>
                      <?php $this->assign('urlstring1', ((is_array($_tmp=$this->_tpl_vars['urlstring'])) ? $this->_run_mod_handler('cat', true, $_tmp, "&download=download") : smarty_modifier_cat($_tmp, "&download=download"))); ?>
                      <?php else: ?>
                      <?php $this->assign('urlstring1', "/user/users-list?submenuId=ML2-SL7&download=download"); ?>
                      <?php endif; ?>
                      <a href="<?php echo $this->_tpl_vars['urlstring1']; ?>
" class="btn btn-info ">Download XLs</a>
                      <?php if ($_GET['searchsubmit'] == Search): ?>
                      <a href="/user/search-contributors?submenuId=ML10-SL6" class="btn btn-danger ">clear</a>
                      <button type="button"  name="savesearch" id="savesearch" class="btn btn-success ">Save Search Criteria</button>
                      <input type="text" value="" name="searchname" id="searchname" class="hide" style="display: none">
                      <button type="button"  name="subsavesearch" id="subsavesearch" onclick="return valSaveSearch();" class="btn btn-success hide" >Save</button>
                      <?php endif; ?>

                  </div>
              </div>
          </div>
        <!-- ///////////////////stats contributors search block////////////////////////////////////////////////////////////////////// -->
              <div id="searchcontirbtab" class="tab-pane" style="overflow-y: hidden">
                  <div class="alert alert-warning"><b>Recherche r&eacute;dacteur</b><a href="/user/search-contributors?submenuId=ML2-SL7&tab=searchcontirbtab" class="label label-inverse pull-right">clear</a></div>
                  <form action="/user/search-contributors?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="get" id="searchstatscontribs" name="searchstatscontribs" onsubmit="return valSearchContribs();">
                  <input id="submenuId" name="submenuId" value="<?php echo $this->_tpl_vars['submenuId']; ?>
" type="hidden" />
                  <input id="tab" name="tab" value="contributorstab" type="hidden" />
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Compte cr&eacute;&eacute;</label>
                                  <input type="text"  placeholder="From" id="dp1" data-date-format="dd-mm-yyyy" name="start_date" value="<?php echo $_GET['start_date']; ?>
" class="span3 pull-left"  />
                                    <label></label>
                                  <input type="text" placeholder="To" id="dp2"  data-date-format="dd-mm-yyyy" name="end_date"  value="<?php echo $_GET['end_date']; ?>
" class="span3  pull-left" />
                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Activiity Date </label>
                                  <input class="span3" type="text" placeholder="From" id="actdp1" data-date-format="dd-mm-yyyy" name="activity_start_date" value="<?php echo $_GET['activity_start_date']; ?>
"  />
                                    <label></label>
                                  <input class="span3" type="text" placeholder="To" id="actdp2" data-date-format="dd-mm-yyyy" name="activity_end_date"  value="<?php echo $_GET['activity_end_date']; ?>
" />
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Type  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="type" id="junior" class="uni_style" value="junior" <?php if ($_GET['type'] == 'junior'): ?>  checked="checked" <?php endif; ?> /> Junior
                                  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="type" id="senior"class="uni_style"  value="senior" <?php if ($_GET['type'] == 'senior'): ?>  checked="checked" <?php endif; ?> /> Senior
                                  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="type" id="both" class="uni_style" value="0"  <?php if ($_GET['type'] == '0' || $_GET['type'] == ''): ?>  checked="checked" <?php endif; ?> /> Both
                                  </label>
                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Black List   </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="blacklist" id="yes" class="uni_style" value="yes" <?php if ($_GET['blacklist'] == 'yes'): ?>  checked="checked" <?php endif; ?> /> Yes
                                  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="blacklist" id="no" class="uni_style" value="no" <?php if ($_GET['blacklist'] == 'no' || $_GET['blacklist'] == ''): ?>  checked="checked" <?php endif; ?> /> No
                                  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="blacklist" id="blacklist" class="uni_style" value="0" <?php if ($_GET['blacklist'] == '0'): ?>  checked="checked" <?php endif; ?>  /> Ignore
                                  </label>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3"> Active </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="status" id="status_yes" class="uni_style" value="active" <?php if ($_GET['status'] == 'active' || $_GET['status'] == ''): ?>  checked="checked" <?php endif; ?> /> Active
                                  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="status" id="status_no"class="uni_style" value="inactive" <?php if ($_GET['status'] == 'inactive'): ?>  checked="checked" <?php endif; ?> /> Inactive
                                  </label>
                                  <label class="uni-radio">
                                    <input type="radio" name="status" id="status_both" class="uni_style" value="0" <?php if ($_GET['status'] == '0'): ?>  checked="checked" <?php endif; ?> /> Both
                                  </label>
                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Correcteur</label>
                                  <label class="uni-radio">
                                      <input type="radio" name="type2" id="corrector" value="corrector" class="uni_style" <?php if ($_GET['type2'] == 'corrector'): ?>  checked="checked" <?php endif; ?> /> Yes
                                  </label>
                                  <label class="uni-radio">
                                      <input type="radio" name="type2" id="writer" value="writer" class="uni_style" <?php if ($_GET['type2'] == 'writer'): ?>  checked="checked" <?php endif; ?> /> No
                                  </label>
                                  <label class="uni-radio">
                                      <input type="radio" name="type2" id="all" value="0" class="uni_style" <?php if ($_GET['type2'] == '0' || $_GET['type2'] == ''): ?>  checked="checked" <?php endif; ?> /> All
                                  </label>
                              </div>

                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Nombre de refus</label>
                                  <input type="text" id="noof_disapproved" name="noof_disapproved" value="<?php echo $_GET['noof_disapproved']; ?>
" />
                              </div>

                              <div class="span6 form-inline">
                                  <label class="span3">Nombre articles valid&eacute;s</label>
                                  <input type="text" id="min_arts_validated" name="min_arts_validated" value="<?php echo $_GET['min_arts_validated']; ?>
"  class="span3 pull-left" placeholder="min"/>
                                  <label></label>
                                  <input type="text" id="max_arts_validated" name="max_arts_validated"  value="<?php echo $_GET['max_arts_validated']; ?>
"  class="span3 pull-left" placeholder="max"/>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3"> Name/Email  </label>
                                  <select name="contrib" id="contrib" data-placeholder="Select Name/Email">
                                      <option value="0"></option>
                                      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['contributor_array'],'class' => 'span5','selected' => $_GET['contrib']), $this);?>

                                  </select>
                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Nombre de participations</label>
                                  <input type="text" id="min_total_parts" name="min_total_parts" value="<?php echo $_GET['min_total_parts']; ?>
"  class="span3 pull-left" placeholder="min"/>
                                  <label></label>
                                  <input type="text" id="max_total_parts" name="max_total_parts"  value="<?php echo $_GET['max_total_parts']; ?>
"  class="span3 pull-left" placeholder="max"/>
                              </div>

                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Nationalit&eacute;</label>
                                  <select  name=nationalism id=nationalism data-placeholder="Select Nationalit&eacute;">
                                      <option value=""> </option>
                                      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['nationality_array'],'selected' => $_GET['nationalism']), $this);?>


                                  </select>
                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Articles Sent </label>
                                  <input type="text" id="min_arts_sent" name="min_arts_sent" value="<?php echo $_GET['min_arts_sent']; ?>
" class="span3 pull-left" placeholder="min"/>
                                  <label></label>
                                  <input type="text" id="max_arts_sent" name="max_arts_sent"  value="<?php echo $_GET['max_arts_sent']; ?>
"  class="span3 pull-left" placeholder="max"/>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Langue maternelle</label>
                                  <select  name=language  id=language data-placeholder="Select Langue maternelle">
                                      <option value="0"> </option>
                                      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['language_array'],'selected' => $_GET['language']), $this);?>

                                  </select>
                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Nbre bidding perdus</label>
                                  <input type="text" id="min_parts_refused" name="min_parts_refused" value="<?php echo $_GET['min_parts_refused']; ?>
" class="span3 pull-left" placeholder="min"/>
                                  <label></label>
                                  <input type="text" id="max_parts_refused" name="max_parts_refused"  value="<?php echo $_GET['max_parts_refused']; ?>
" class="span3 pull-left" placeholder="max"/>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Missions</label>
                                  <?php echo smarty_function_html_options(array('name' => 'aotitle','id' => 'aotitle','options' => $this->_tpl_vars['delivery_array'],'onChange' => "fnloadao();",'selected' => $_GET['aotitle']), $this);?>

                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Nombre de refus  d&eacute;finitif</label>
                                  <input type="text" id="min_arts_refused" name="min_arts_refused" value="<?php echo $_GET['min_arts_refused']; ?>
" class="span3 pull-left" placeholder="min" />
                                  <label></label>
                                  <input type="text" id="max_arts_refused" name="max_arts_refused"  value="<?php echo $_GET['max_arts_refused']; ?>
" class="span3 pull-left" placeholder="max"/>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Quizz</label>
                                  <span id="quiz_load"> </span>
                                    <span id="quiz_preload">
                                    <select  id="contribquiz" name="contribquiz"  data-placeholder="Select Quizz">
                                        <option value="0"> </option>
                                        <?php echo smarty_function_html_options(array('id' => 'contribquiz','options' => $this->_tpl_vars['quizlist'],'selected' => $this->_tpl_vars['contribquiz']), $this);?>

                                    </select>  </span>
                              </div>

                              <div class="span6 form-inline">
                                  <label class="span3">Age</label>
                                  <input id="minage" name="minage" type="text" value="<?php echo $_GET['minage']; ?>
" class="span3 pull-left" placeholder="min" />
                                  <label></label><input id="maxage" name="maxage" type="text" value="<?php echo $_GET['maxage']; ?>
" class="span3 pull-left" placeholder="max" />
                              </div>

                          </div>
                      </div>

                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Cat&eacute;gories</label>
                                  <select  id="category" name="category[]"  onchange="categoryList();" data-placeholder="Select Cat&eacute;gories">
                                      <option value="0"> </option>
                                      <?php echo smarty_function_html_options(array('id' => 'category','options' => $this->_tpl_vars['category_array'],'selected' => $this->_tpl_vars['category'],'onchange' => "fnloadquiz();"), $this);?>

                                  </select>

                              </div>
                              <div class="span6 form-inline">
                                  <label class="span3">Langue 2</label>
                                  <select  id=language2 name=language2 onchange="language2List();"  data-placeholder="Select Langue2">
                                      <option value="0"> </option>
                                      <?php echo smarty_function_html_options(array('id' => 'language2','options' => $this->_tpl_vars['language_array'],'selected' => $this->_tpl_vars['language2']), $this);?>

                                  </select>
                              </div>

                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <div class="alert alert-info span9 hide" id="targetdiv">  </div>
                              </div>
                              <div class="span6 form-inline">
                                  <div class="alert alert-info span9 hide" id="targetdivlang"> </div>
                              </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <label class="span3">Self Details</label>
                                  <input type="text" id="contrib_self_details" name="contrib_self_details" value="<?php echo $_GET['contrib_self_details']; ?>
" />
                              </div>
							  <div class="span6 form-inline">
								  <label class="span3">This contributor has been tested</label>
								  <label class="uni-radio">
									  <input type="radio" name="contributortest" id="contributortest" value="yes" class="uni_style" <?php if ($_GET['contributortest'] == 'yes'): ?>  checked="checked" <?php endif; ?> /> Yes
								  </label>
								  <label class="uni-radio">
									  <input type="radio" name="contributortest" id="contributortest" value="no" class="uni_style" <?php if ($_GET['contributortest'] == 'no'): ?>  checked="checked" <?php endif; ?> /> No
								  </label>
								  <label class="uni-radio">
									  <input type="radio" name="contributortest" id="all" value="0" class="uni_style" <?php if ($_GET['contributortest'] == '0' || $_GET['contributortest'] == ''): ?>  checked="checked" <?php endif; ?> /> All
								  </label>
							  </div>
                          </div>
                      </div>
                      <div class="formSep">
                          <div class="row-fluid">
                              <div class="span6 form-inline">
                                  <button type="submit" name="searchsubmit" class="btn btn-success pull-right" value="Search" >Search</button>
                              </div>
                          </div>
                      </div>
                  </form>
                  <div class="alert alert-info">
                      <h3 class="heading">Recherches sauvegard&eacute;es</h3>
                      <div style="padding-left: 10px;">
                          <ul class="list_d">
                          <?php if ($this->_tpl_vars['savedSearchesUrls'] != 'NO'): ?>
                          <?php $_from = $this->_tpl_vars['savedSearchesUrls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['urlslist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['urlslist']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['urls']):
        $this->_foreach['urlslist']['iteration']++;
?>
                          <li><a href="<?php echo $this->_tpl_vars['urls']['url']; ?>
" id="editedval_<?php echo $this->_tpl_vars['urls']['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['urls']['search_name'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 10) : smarty_modifier_wordwrap($_tmp, 10)); ?>
</a><a href="/user/deletesearch?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&searchId=<?php echo $this->_tpl_vars['urls']['id']; ?>
">
                              <i class="icon-trash"></i></a>
                              <i id="editsearch" class="icon-pencil"  style="cursor: pointer"  onclick="editSearch(<?php echo $this->_tpl_vars['urls']['id']; ?>
);"></i>
                              <input type="text" value="<?php echo $this->_tpl_vars['urls']['search_name']; ?>
" name="editsearchname_<?php echo $this->_tpl_vars['urls']['id']; ?>
" id="editsearchname_<?php echo $this->_tpl_vars['urls']['id']; ?>
" class="hide" style="display: none">
                              <input type="hidden" value="<?php echo $this->_tpl_vars['urls']['id']; ?>
" name="editsearchid_<?php echo $this->_tpl_vars['urls']['id']; ?>
" id="editsearchid_<?php echo $this->_tpl_vars['urls']['id']; ?>
" class="hide" style="display: none">
                              <a class="btn btn-success hide" id="editsubsavesearch_<?php echo $this->_tpl_vars['urls']['id']; ?>
" name="editsubsavesearch_<?php echo $this->_tpl_vars['urls']['id']; ?>
" onclick="editSubSaveSearch(<?php echo $this->_tpl_vars['urls']['id']; ?>
);">save</a>
                          </li>
                          <?php endforeach; endif; unset($_from); ?>
                          <?php else: ?>
                          No Saved Searches
                          <?php endif; ?>

                          </ul>

                      </div>
                  </div>
              </div>
          <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
          </div>
      </div>

  </div>
</div>


<div style="visibility:hidden" >
    <form id="user_login_form" name="user_login_form" method="post" action="" target="_blank">
        <input type="text" id="login_name" name="login_name" value="">
        <input type="password" id="login_password" name="login_password" value="<?php echo $this->_tpl_vars['user_detail'][0]['password']; ?>
" >
        <input type="submit" value="Login" />
    </form>
</div>


<?php echo '
<script type="text/javascript" >
    function connect_fo(user,email,pwd)
    {
        document.forms["user_login_form"].action="http://ep-test.edit-place.co.uk/index/userfologin";
        $(\'#login_name\').val(email);
        $(\'#login_password\').val(pwd);
        document.forms["user_login_form"].submit();
    }
</script>
'; ?>


