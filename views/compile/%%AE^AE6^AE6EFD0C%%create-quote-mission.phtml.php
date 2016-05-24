<?php /* Smarty version 2.6.19, created on 2016-01-14 13:22:29
         compiled from gebo/quote/create-quote-mission.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/quote/create-quote-mission.phtml', 606, false),array('modifier', 'stripslashes', 'gebo/quote/create-quote-mission.phtml', 746, false),array('modifier', 'zero_cut_t', 'gebo/quote/create-quote-mission.phtml', 941, false),array('modifier', 'domain_url', 'gebo/quote/create-quote-mission.phtml', 945, false),array('function', 'html_options', 'gebo/quote/create-quote-mission.phtml', 640, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/js/validation-engine/validationEngine.jquery.css" type="text/css"/>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="/BO/theme/gebo/lib/iCheck/skins/square/blue.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/iCheck/icheck.min.js" type="text/javascript" charset="utf-8"></script><script src="/BO/theme/gebo/js/jquery.MultiFileQuote.js" type="text/javascript" charset="utf-8"></script>
'; ?>


<?php echo '
<script language="javascript">
/** ajax function to delete super client contact data**/
var language_error = true;
var volume_error=true;

function ajaxQuoteMissionDelete(mission_index,mission_identifier,divid,last)
{
       var target_page = "/quote/delete-quote-mission?mission_index="+mission_index+"&mission_identifier="+mission_identifier;
		//alert(target_page);	
		$.post(target_page, function(data){					
				//alert(data);
				sleep(4000);
				$("#"+divid).remove();
				if(last==\'final\')
					location.reload();
			});
}
$(document).ready(function() {

	$(".assign_pop_over").popover({trigger: \'click\'});
	
	$(\'input\').iCheck({
		checkboxClass: \'icheckbox_square-blue\',
		radioClass: \'iradio_square-blue\'		
	});
	/* validation */
	$("#create_quote_mission").validationEngine({prettySelect : true,useSuffix: "_chzn",onValidationComplete: function(form, status){
			if(status == true)
			{
				changeNames();
				checklanguage();
				oneshotVolume(\'start\');
				if(language_error && volume_error)
					return true;	
			}
	}}); 
	
	/* chosen */
	$("[id^=product_]").chosen({ allow_single_deselect: false,search_contains: true});
	$("[id^=producttype_]").chosen({ allow_single_deselect: false,search_contains: true});	
	$("[id^=language_]").chosen({ allow_single_deselect: false,search_contains: true});
	
	$("[id^=languagedest_]" ).each(function(u) {
		if ( $(this).is(":visible") ) {
			$(this).chosen({ allow_single_deselect: false,search_contains: true});
		}
	});
	/*Added w.r.t tempo*/
	$("[id^=mission_length_option_]").chosen({ allow_single_deselect: false,disable_search: true});
	$("[id^=delivery_volume_option_]").chosen({ allow_single_deselect: false,disable_search: true});
	$("[id^=tempo_length_option_]").chosen({ allow_single_deselect: false,disable_search: true});
	$("[id^=tempo_type_]").chosen({ allow_single_deselect: false,disable_search: true});
	$(\'[id^=oneshot_]\').live(\'ifClicked\', function (event) {
		var id=this.id.split("_");
		var index=id[1];		
		//alert(index);
		var value=this.value;
		if(value==\'no\')
			$("#tempo_details_"+index).show();
		else	
			$("#tempo_details_"+index).hide();
	});
	$(\'[id^=nb_words_]\').live(\'change\', function (event) {
		
		var id=this.id.split("_");
		var index=id[2];		
		var nbvalue=this.value;
		var prodval= $(\'#producttype_\'+index).val();
		if(prodval==\'article_de_blog\' && (250>nbvalue || nbvalue>500)){	
		$(\'#nb_words_\'+index).removeClass();	
		$(\'#nb_words_\'+index).addClass(\'validate[required,nbblogRange]\').addClass(\'span12\');
		}else if(prodval==\'news\' && (50>nbvalue || nbvalue>200)){
		$(\'#nb_words_\'+index).removeClass();
		$(\'nb_words_\'+index).addClass(\'validate[required,nbnewsRange]\').addClass(\'span12\');	
		}else if(prodval==\'descriptif_produit\' && (30>nbvalue || nbvalue>150)){
		$(\'#nb_words_\'+index).removeClass();
		$(\'#nb_words_\'+index).addClass(\'validate[required,nbdescRange]\').addClass(\'span12\');
		}else if(prodval==\'guide\' && (500>nbvalue || nbvalue>1500)){
		$(\'#nb_words_\'+index).removeClass();
		$(\'#nb_words_\'+index).addClass(\'validate[required,nbguideRange]\').addClass(\'span12\');
		}
	}); 
	$(\'.dont_know\').live(\'ifChecked\', function (event) {
		var id=this.id.split("_");		
		var index=id[3];		
		$("#mission_duration_details_"+index).hide();
		oneshotVolume(\'change\');
	});
	$(\'.dont_know\').live(\'ifUnchecked\', function (event) {
		var id=this.id.split("_");
		var index=id[3];		
		$("#mission_duration_details_"+index).show();
		oneshotVolume(\'change\');
	});
	$(\'[id^=tempo_type_]\').live(\'change\',function(){
        var volume_max = $(this).val();
		var id=$(this).attr(\'id\').split("_");		
		var index=id[2];
		if(volume_max==\'max\')
		{
			//removed .addClass( "validate[required]" ) based clied requirement
			$(\'#comments_\'+index).removeClass( "validate[required]" );
		}	
		else{
			$(\'#comments_\'+index).removeClass( "validate[required]");
		}
    });
	/*ENDED*/
	
	
	$("[id^=mission_close_]").live(\'click\', function() {
			var DivId = $(this).attr(\'id\');
			var indexes=DivId.split("_");			
			var mission_index=indexes[2];
			var parentDiv=$(this).parents("div:eq(2)").attr(\'id\');
			//alert(parentDiv);
			var mission_identifier=$(this).attr(\'rel\');			
			if(!mission_identifier)
			{
				if($("[id^=quote_mission_]").size()>1)
					$("#"+parentDiv).remove();
			}	
			else
			{	
				smoke.confirm("Do you want to remove this mission?",function(e){
					if (e)
					{
						if($("[id^=quote_mission_]").size()>1)
						{
							$("#"+parentDiv).html(\'<center><img alt="" src="/BO/theme/gebo/img/ajax_loader.gif"> Deleting Mission... </center>\');
							ajaxQuoteMissionDelete(mission_index,mission_identifier,parentDiv,\'\');
						}	
						else
						{
							$("#"+parentDiv).html(\'<center><img alt="" src="/BO/theme/gebo/img/ajax_loader.gif"> Deleting Mission... </center>\');
							ajaxQuoteMissionDelete(mission_index,mission_identifier,parentDiv,\'final\');	
							
						}
					}
					else
					{
						return false;
					}
				});				
			}	
			missionIncDec();	
		});	
	
	//Adding quote missions
	var mission_cnt=1;
	$("[id^=quote_mission_]" ).each(function(z) {
			mission_cnt=++z;
	});
	
	//Add duplicate mission
	$("[id^=duplicate_mission_]").live(\'click\', function() {	
		var button_id = $(this).attr(\'id\');	
		var div_numbers=button_id.split("_");
		var duplicate_id=div_numbers[2];
		
		var cloned =$("#quote_missions");		
		/*tempo changes*/
		var oneshotvalue = $("input:radio[name=oneshot_"+ duplicate_id +"]:checked").val();
				/*demande changes*/
		var demandevalue = $("input:radio[name=demande_"+ duplicate_id +"]:checked").val();
		
		$(\'#quote_mission_\'+duplicate_id+\' input\').iCheck(\'destroy\');
		$("#quote_mission_"+duplicate_id).clone().attr(\'id\', \'quote_mission_\'+(++mission_cnt) ).appendTo( cloned );	
		
		$(\'#quote_mission_\'+mission_cnt+\' #box_title_\'+duplicate_id).attr(\'id\',\'box_title_\'+mission_cnt); //changing mission tilte id
		$(\'#box_title_\'+mission_cnt).text(\'Mission \'+mission_cnt); //changing mission tilte
		$(\'#quote_mission_\'+mission_cnt+\' #duplicate_mission_\'+duplicate_id).attr(\'id\',\'duplicate_mission_\'+mission_cnt); //chaning id of duplicate button
		$(\'#quote_mission_\'+mission_cnt+\' #mission_close_\'+duplicate_id).attr(\'id\',\'mission_close_\'+mission_cnt); //chaning id of close button
		$(\'#mission_close_\'+mission_cnt).show();
		$(\'#mission_close_\'+mission_cnt).attr(\'rel\',\'\');
		
		//changing other info id
		$(\'#quote_mission_\'+mission_cnt+\' #other_info_\'+duplicate_id).attr(\'id\',\'other_info_\'+mission_cnt); //chaning id of other info dev	
		
		//Product select box
		$(\'#quote_mission_\'+mission_cnt+\' #product_\'+duplicate_id).attr(\'id\',\'product_\'+mission_cnt); //changing product id
		//Language select box
		$(\'#quote_mission_\'+mission_cnt+\' #language_\'+duplicate_id).attr(\'id\',\'language_\'+mission_cnt); //changing Language id
		//Language dest select box
		$(\'#quote_mission_\'+mission_cnt+\' #languagedest_\'+duplicate_id).attr(\'id\',\'languagedest_\'+mission_cnt); //changing Language id
		//Product select box
		$(\'#quote_mission_\'+mission_cnt+\' #producttype_\'+duplicate_id).attr(\'id\',\'producttype_\'+mission_cnt); //changing producttype id
		
		$("#product_"+mission_cnt).removeClass("chzn-done" ).addClass("");		 
		$("#language_"+mission_cnt).removeClass("chzn-done" ).addClass("");
		$("#languagedest_"+mission_cnt).removeClass("chzn-done" ).addClass("");
		$("#producttype_"+mission_cnt).removeClass("chzn-done" ).addClass("");
		/*tempo changes*/
			$(\'#quote_mission_\'+mission_cnt+\' #mission_length_option_\'+duplicate_id).attr(\'id\',\'mission_length_option_\'+mission_cnt); //changing mission length optionid
			$(\'#quote_mission_\'+mission_cnt+\' #delivery_volume_option_\'+duplicate_id).attr(\'id\',\'delivery_volume_option_\'+mission_cnt); //changing delivery volume option id
			$(\'#quote_mission_\'+mission_cnt+\' #tempo_length_option_\'+duplicate_id).attr(\'id\',\'tempo_length_option_\'+mission_cnt); //changing tempo length option id
			$(\'#quote_mission_\'+mission_cnt+\' #tempo_type_\'+duplicate_id).attr(\'id\',\'tempo_type_\'+mission_cnt); //changing tempo_type_ id
			$("#mission_length_option_"+mission_cnt).removeClass("chzn-done" ).addClass("");
			$("#delivery_volume_option_"+mission_cnt).removeClass("chzn-done" ).addClass("");
			$("#tempo_length_option_"+mission_cnt).removeClass("chzn-done" ).addClass("");
			$("#tempo_type_"+mission_cnt).removeClass("chzn-done" ).addClass("");
		/*end*/
		$("#quote_mission_"+mission_cnt+ " .chzn-container").remove(); 
		
		$("#product_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});	//updating selected value
		$("#product_"+mission_cnt).val($(\'#product_\'+duplicate_id).val());
		$("#product_"+mission_cnt).trigger("liszt:updated");		
		
		$("#language_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});//updating selected value
		$("#language_"+mission_cnt).val($(\'#language_\'+duplicate_id).val());
		$("#language_"+mission_cnt).trigger("liszt:updated");
		
		if($(\'#product_\'+duplicate_id).val()==\'translation\')
		{
			$("#languagedest_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});//updating selected value
			$("#languagedest_"+mission_cnt).val($(\'#languagedest_\'+duplicate_id).val());
			$("#languagedest_"+mission_cnt).trigger("liszt:updated");
		}	
		
		$("#producttype_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});//updating selected value
		$("#producttype_"+mission_cnt).val($(\'#producttype_\'+duplicate_id).val());
		$("#producttype_"+mission_cnt).trigger("liszt:updated");
		/*tempo changes*/
			$(\'#quote_mission_\'+mission_cnt+\' #mission_duration_details_\'+duplicate_id).attr(\'id\',\'mission_duration_details_\'+mission_cnt); //changing mission_duration_details_ id		
			$(\'#quote_mission_\'+mission_cnt+\' #tempo_details_\'+duplicate_id).attr(\'id\',\'tempo_details_\'+mission_cnt); //changing tempo_details id		
			$(\'#quote_mission_\'+mission_cnt+\' #oneshot_\'+duplicate_id).attr(\'name\',\'oneshot_\'+mission_cnt); //changing one shot name dont change the order of these two
			$(\'#quote_mission_\'+mission_cnt+\' #oneshot_\'+duplicate_id).attr(\'id\',\'oneshot_\'+mission_cnt); //changing one shot id
			$(\'#quote_mission_\'+mission_cnt+\' #demande_\'+duplicate_id).attr(\'name\',\'demande_\'+mission_cnt); //changing Demande client name dont change the order of these two
			$(\'#quote_mission_\'+mission_cnt+\' #demande_\'+duplicate_id).attr(\'id\',\'demande_\'+mission_cnt); //changing Demande client id
			$(\'#quote_mission_\'+mission_cnt+\' input[name="mission_length[]"]\').attr(\'id\',\'mission_length_\'+mission_cnt);
			$(\'#quote_mission_\'+mission_cnt+\' input[name="volume_max[]"]\').attr(\'id\',\'volume_max_\'+mission_cnt);
			$(\'#quote_mission_\'+mission_cnt+\' input[name="tempo_length[]"]\').attr(\'id\',\'tempo_length_\'+mission_cnt);
			$(\'#quote_mission_\'+mission_cnt+\' #duration_dont_know_\'+duplicate_id).attr(\'name\',\'duration_dont_know_\'+mission_cnt); //changing dont know option name
			$(\'#quote_mission_\'+mission_cnt+\' #duration_dont_know_\'+duplicate_id).attr(\'id\',\'duration_dont_know_\'+mission_cnt); //changing dont know option id
			
			$("#mission_length_option_"+mission_cnt).chosen({ allow_single_deselect: false,disable_search: true});
			$("#delivery_volume_option_"+mission_cnt).chosen({ allow_single_deselect: false,disable_search: true});
			$("#tempo_length_option_"+mission_cnt).chosen({ allow_single_deselect: false,disable_search: true});
			$("#tempo_type_"+mission_cnt).chosen({ allow_single_deselect: false,disable_search: true});
			/*activate icheck after clone*/
			$("input:radio[name=oneshot_"+ duplicate_id +"]").filter("[value="+oneshotvalue+"]").attr("checked", "checked");
			$("input:radio[name=oneshot_"+ duplicate_id +"]").iCheck(\'update\');
				/*demande Client start by naveen*/
			$("input:radio[name=demande_"+ duplicate_id +"]").filter("[value="+demandevalue+"]").attr("checked", "checked");
			$("input:radio[name=demande_"+ duplicate_id +"]").iCheck(\'update\');
			/*end*/
			$(\'#quote_mission_\'+duplicate_id+\' input\').iCheck({checkboxClass: \'icheckbox_square-blue\', radioClass: \'iradio_square-blue\'});
			$(\'#quote_mission_\'+mission_cnt+\' input\').iCheck({
				checkboxClass: \'icheckbox_square-blue\',
				radioClass: \'iradio_square-blue\'		
			});
		/*end*/
		
		
		$(\'#quote_mission_\'+mission_cnt+\' input[name="nb_words[]"]\').attr(\'id\',\'nb_words_\'+mission_cnt);
		$(\'#quote_mission_\'+mission_cnt+\' input[name="volume[]"]\').attr(\'id\',\'volume_\'+mission_cnt);
		$(\'#quote_mission_\'+mission_cnt+\' #comments_\'+duplicate_id).attr(\'id\',\'comments_\'+mission_cnt);
		$(\'#quote_mission_\'+mission_cnt+\' input[name="mission_id[]"]\').val(\'\');
		
		$(\'#comments_\'+mission_cnt).val($(\'#comments_\'+duplicate_id).val());	
		
		//Added autre produit type 
		$(\'#quote_mission_\'+mission_cnt+\' #producttypeotherdiv_\'+duplicate_id).attr(\'id\',\'producttypeotherdiv_\'+mission_cnt);
		$(\'#quote_mission_\'+mission_cnt+\' input[name="producttypeother[]"]\').attr(\'id\',\'producttypeother_\'+mission_cnt);
		if($(\'#producttype_\'+duplicate_id).val()==\'autre\')
			$(\'#producttypeotherdiv_\'+mission_cnt).show();
		else
			$(\'#producttypeotherdiv_\'+mission_cnt).hide();
		
		$("#other_info_"+mission_cnt).find(".alert-danger").remove();
		
		missionIncDec();
	});	
	
	function missionIncDec()
	{
		var mid =1;
		$("[id^=box_title_]").each(function(){
			$(this).text(\'Mission \'+mid++);
		})
	}
	
	//Add more mission
	$("#addmore_mission_link").click(function() {
		
		var cloned =$("#quote_missions");	
		var duplicate_id;		
		
		$("[id^=quote_mission_]" ).each(function(m) {
			var div_id = $(this).attr(\'id\');
			var div_numbers=div_id.split("_");
			duplicate_id=div_numbers[2];
			if(duplicate_id)
			return false;
			//break;
		});
		
		/*tempo changes*/
		var oneshotvalue = $("input:radio[name=oneshot_"+ duplicate_id +"]:checked").val();
		/*demande changes*/
		var demandevalue = $("input:radio[name=demande_"+ duplicate_id +"]:checked").val();
		
		$(\'#quote_mission_\'+duplicate_id+\' input\').iCheck(\'destroy\');    	
		
		$("#quote_mission_"+duplicate_id).clone().attr(\'id\', \'quote_mission_\'+(++mission_cnt) ).appendTo( cloned );	//clone	
		
		$(\'#quote_mission_\'+mission_cnt+\' #box_title_\'+duplicate_id).attr(\'id\',\'box_title_\'+mission_cnt); //changing mission tilte id
		$(\'#box_title_\'+mission_cnt).text(\'Mission \'+mission_cnt); //changing mission tilte
		$(\'#quote_mission_\'+mission_cnt+\' #duplicate_mission_\'+duplicate_id).attr(\'id\',\'duplicate_mission_\'+mission_cnt); //chaning id of duplicate button
		$(\'#quote_mission_\'+mission_cnt+\' #mission_close_\'+duplicate_id).attr(\'id\',\'mission_close_\'+mission_cnt); //chaning id of close button
		$(\'#mission_close_\'+mission_cnt).show();
		$(\'#mission_close_\'+mission_cnt).attr(\'rel\',\'\');
		
		//changing other info id
		$(\'#quote_mission_\'+mission_cnt+\' #other_info_\'+duplicate_id).attr(\'id\',\'other_info_\'+mission_cnt); //chaning id of other info dev
		$(\'#other_info_\'+mission_cnt).show();
		
			
		//Product select box
		$(\'#quote_mission_\'+mission_cnt+\' #product_\'+duplicate_id).attr(\'id\',\'product_\'+mission_cnt); //changing product id
		//Language select box
		$(\'#quote_mission_\'+mission_cnt+\' #language_\'+duplicate_id).attr(\'id\',\'language_\'+mission_cnt); //changing Language id
		//Language dest select box
		$(\'#quote_mission_\'+mission_cnt+\' #languagedest_\'+duplicate_id).attr(\'id\',\'languagedest_\'+mission_cnt); //changing Language id
		//Product select box
		$(\'#quote_mission_\'+mission_cnt+\' #producttype_\'+duplicate_id).attr(\'id\',\'producttype_\'+mission_cnt); //changing producttype id
		
		$("#product_"+mission_cnt).removeClass("chzn-done" ).addClass("");		 
		$("#language_"+mission_cnt).removeClass("chzn-done" ).addClass("");
		$("#languagedest_"+mission_cnt).removeClass("chzn-done" ).addClass("");
		$("#producttype_"+mission_cnt).removeClass("chzn-done" ).addClass("");
		/*tempo changes*/
			$(\'#quote_mission_\'+mission_cnt+\' #mission_length_option_\'+duplicate_id).attr(\'id\',\'mission_length_option_\'+mission_cnt); //changing mission length optionid
			$(\'#quote_mission_\'+mission_cnt+\' #delivery_volume_option_\'+duplicate_id).attr(\'id\',\'delivery_volume_option_\'+mission_cnt); //changing delivery volume option id
			$(\'#quote_mission_\'+mission_cnt+\' #tempo_length_option_\'+duplicate_id).attr(\'id\',\'tempo_length_option_\'+mission_cnt); //changing tempo length option id
			$(\'#quote_mission_\'+mission_cnt+\' #tempo_type_\'+duplicate_id).attr(\'id\',\'tempo_type_\'+mission_cnt); //changing tempo_type_option id
			$("#mission_length_option_"+mission_cnt).removeClass("chzn-done" ).addClass("");
			$("#delivery_volume_option_"+mission_cnt).removeClass("chzn-done" ).addClass("");
			$("#tempo_length_option_"+mission_cnt).removeClass("chzn-done" ).addClass("");
			$("#tempo_type_"+mission_cnt).removeClass("chzn-done" ).addClass("");
		/*end*/
		$("#quote_mission_"+mission_cnt+ " .chzn-container").remove(); 
		
		$("#product_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});	//updating selected value
		$("#product_"+mission_cnt).val(\'\');
		$("#product_"+mission_cnt).trigger("liszt:updated");	
		
		$("#language_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});//updating selected value
		//$("#languagedest_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});//updating selected value
		$("#languagedest_"+mission_cnt).hide();
		$("#producttype_"+mission_cnt).chosen({ allow_single_deselect: false,search_contains: true});//updating selected value
		
		
		/*tempo changes*/
			$(\'#quote_mission_\'+mission_cnt+\' #mission_duration_details_\'+duplicate_id).attr(\'id\',\'mission_duration_details_\'+mission_cnt); //changing mission_duration_details_ id		
			$(\'#quote_mission_\'+mission_cnt+\' #mission_duration_details_\'+mission_cnt).show();			
			$(\'#quote_mission_\'+mission_cnt+\' #tempo_details_\'+duplicate_id).attr(\'id\',\'tempo_details_\'+mission_cnt); //changing tempo_details id
			$(\'#quote_mission_\'+mission_cnt+\' #tempo_details_\'+mission_cnt).hide();
			$(\'#quote_mission_\'+mission_cnt+\' #oneshot_\'+duplicate_id).attr(\'name\',\'oneshot_\'+mission_cnt); //changing one shot name dont change the order of these two
			$(\'#quote_mission_\'+mission_cnt+\' #oneshot_\'+duplicate_id).attr(\'id\',\'oneshot_\'+mission_cnt); //changing one shot id	
			$(\'#quote_mission_\'+mission_cnt+\' #demande_\'+duplicate_id).attr(\'name\',\'demande_\'+mission_cnt); //changing Demande client name dont change the order of these two
			$(\'#quote_mission_\'+mission_cnt+\' #demande_\'+duplicate_id).attr(\'id\',\'demande_\'+mission_cnt); //changing Demande client id		
			//check yes by default
			$("input:radio[name=oneshot_"+ mission_cnt +"]").filter("[value=yes]").attr("checked", "checked");	
			
				
			
			$(\'#quote_mission_\'+mission_cnt+\' input[name="mission_length[]"]\').attr(\'id\',\'mission_length_\'+mission_cnt);
			$(\'#quote_mission_\'+mission_cnt+\' input[name="volume_max[]"]\').attr(\'id\',\'volume_max_\'+mission_cnt);
			$(\'#quote_mission_\'+mission_cnt+\' input[name="tempo_length[]"]\').attr(\'id\',\'tempo_length_\'+mission_cnt);
			$(\'#quote_mission_\'+mission_cnt+\' #duration_dont_know_\'+duplicate_id).attr(\'name\',\'duration_dont_know_\'+mission_cnt); //changing dont know option name
			$(\'#quote_mission_\'+mission_cnt+\' #duration_dont_know_\'+duplicate_id).attr(\'id\',\'duration_dont_know_\'+mission_cnt); //changing dont know option id
			$("#mission_length_option_"+mission_cnt).chosen({ allow_single_deselect: false,disable_search: true});
			$("#delivery_volume_option_"+mission_cnt).chosen({ allow_single_deselect: false,disable_search: true});
			$("#tempo_length_option_"+mission_cnt).chosen({ allow_single_deselect: false,disable_search: true});
			$("#tempo_type_"+mission_cnt).chosen({ allow_single_deselect: false,disable_search: true});
			/*activate icheck after clone*/
			$("input:radio[name=oneshot_"+ duplicate_id +"]").filter("[value="+oneshotvalue+"]").attr("checked", "checked");
			$("input:radio[name=oneshot_"+ duplicate_id +"]").iCheck(\'update\');
			
			/*demande Client start by naveen*/
			$("input:radio[name=demande_"+ duplicate_id +"]").filter("[value="+demandevalue+"]").attr("checked", "checked");
			$("input:radio[name=demande_"+ duplicate_id +"]").iCheck(\'update\');
			
			/*end*/
			$(\'#quote_mission_\'+duplicate_id+\' input\').iCheck({checkboxClass: \'icheckbox_square-blue\', radioClass: \'iradio_square-blue\'});
			$(\'#quote_mission_\'+mission_cnt+\' #duration_dont_know_\'+mission_cnt).iCheck(\'uncheck\');
			$(\'#quote_mission_\'+mission_cnt+\' input\').iCheck({
				checkboxClass: \'icheckbox_square-blue\',
				radioClass: \'iradio_square-blue\'		
			});
		/*end*/
		$(\'#quote_mission_\'+mission_cnt+\' input[name="nb_words[]"]\').attr(\'id\',\'nb_words_\'+mission_cnt);
		$(\'#quote_mission_\'+mission_cnt+\' input[name="volume[]"]\').attr(\'id\',\'volume_\'+mission_cnt);
		$(\'#quote_mission_\'+mission_cnt+\' #comments_\'+duplicate_id).attr(\'id\',\'comments_\'+mission_cnt);
		
		//Added autre produit type 
		$(\'#quote_mission_\'+mission_cnt+\' #producttypeotherdiv_\'+duplicate_id).attr(\'id\',\'producttypeotherdiv_\'+mission_cnt);
		$(\'#quote_mission_\'+mission_cnt+\' input[name="producttypeother[]"]\').attr(\'id\',\'producttypeother_\'+mission_cnt);
		$(\'#producttypeotherdiv_\'+mission_cnt).hide();
		
		clearChildren(document.getElementById(\'quote_mission_\'+mission_cnt));
		$("#other_info_"+mission_cnt).find(".alert-danger").remove();
		missionIncDec();
	});	

	//
	$("[id^=mission_length_],[id^=volume_max_],[id^=tempo_length_],[id^=tempo_length_option_]").live(\'change keyup keypress\', function() {
		oneshotVolume(\'change\');
	});	
});

//show destination if product is translation
function fnCheckProduct(element)
{
	var product=element.value;
	var mission_details=(element.id).split("_");
	var mission_id=mission_details[1];
	if(product==\'autre\')
	{
		$("#other_info_"+mission_id).hide();
	}
	else if(product==\'translation\')
	{
		$("#other_info_"+mission_id).show();		
		//$("#languagedest_"+mission_id).show();
		$("#languagedest_"+mission_id).chosen({ allow_single_deselect: false,search_contains: true});
		
	}
	else
	{
		$("#other_info_"+mission_id).show();
		
		$("#languagedest_"+mission_id).hide();
		$("#languagedest_"+mission_id).removeClass("chzn-done" ).addClass("");
		$("#languagedest_"+mission_id+"_chzn").remove();
		$("#other_info").hide();
	}
	
}
//show other category if product type is autre
function fnCheckProductType(element)
{	
	var productType=element.value;
	var mission_details=(element.id).split("_");
	var mission_id=mission_details[1];
	
	$("#producttypeotherdiv_"+mission_id).hide();
	
	if(productType==\'autre\')
	{
		$("#producttypeotherdiv_"+mission_id).show();
		$("#nb_words_"+mission_id).removeAttr("class").addClass(\'span12\').addClass(\'validate[required]\');
	}else if(productType==\'article_de_blog\'){
		$("#nb_words_"+mission_id).removeAttr("class").addClass(\'span12\').addClass(\'validate[required,nbblogRange]\');
	   }
	   else if(productType==\'news\'){
		$("#nb_words_"+mission_id).removeAttr("class").addClass(\'span12\').addClass(\'validate[required,nbnewsRange]\');
		   }
	   else if(productType==\'descriptif_produit\'){
	$("#nb_words_"+mission_id).removeAttr("class").addClass(\'span12\').addClass(\'validate[required,nbdescRange]\');
		   }
	   else if(productType==\'guide\'){
	$("#nb_words_"+mission_id).removeAttr("class").addClass(\'span12\').addClass(\'validate[required,nbguideRange]\');
	}
	else{
		$("#nb_words_"+mission_id).removeAttr("class").addClass(\'span12\').addClass(\'validate[required]\');

	}
}
//Assign quote to some other user
function fnassignQuote(ep_user_id)
{				
		var msg = "Do you want to assign this quote to some other user ?";
		smoke.confirm(msg,function(e){
			if (e){
					var target="/quote/assign-quote?ep_user_id="+ep_user_id;
					$.post(target,function(response){
						var obj = $.parseJSON(response);
						//alert(response);
						
						if(obj.status==\'same_user\')
						{
							smoke.alert("Please assign quote to some other user it is currently assigned to same user");
						}
						else if(obj.status==\'success\')
						{
							location.reload(); 
						}
					});      
				}
			else{
				return false;
			}
		});	
	
}

function checklanguage(){

	$(\'.checklanguage\').each(function() {
		var current_id = $(this).attr("id");
		var current_index = current_id.substring(current_id.indexOf("_")+1);
		var current_type = $("#product_"+current_index).val();
		if(current_type=="translation")
		{
			$(this).closest(".span4").find(".alert-danger").remove();
			if($("#language_"+current_index).val()==$(this).val())
			{
				$(this).closest(".span4").append("<div class=\'alert-danger\' style=\'padding:0 5px;\'>Please select an other languauge than source language</div>");
				$("#product_"+current_index+"_chzn .chzn-single").focus();
				language_error = false;	
				return false;
			}
			else
				language_error = true;
		}
	});
	return true;
}
function oneshotVolume(status)
{
	
	$(\'.oneshotVolume\').each(function() {
		
		var current_id = $(this).attr("id");
		var current_details = (current_id).split("_");
	    var current_index= current_details[2];
	    var oneshotval= $("input:radio[name=oneshot_"+ current_index +"]:checked").val();
		//alert(oneshotval);
		if(oneshotval==\'no\'){
			
			duration_missionval=$(\'#mission_length_\'+current_index).val();
			totalvolumeval=$(\'#volume_\'+current_index).val();
			volumeMax=$(\'#volume_max_\'+current_index).val();
			tempotype=$(\'#tempo_type_\'+current_index).val();
			deleveryvolumeoption=$(\'#delivery_volume_option_\'+current_index).val();
			tempoLength=$(\'#tempo_length_\'+current_index).val();
			tempoLengthoption=$(\'#tempo_length_option_\'+current_index).val();
			durationknow=$(\'#duration_dont_know_\'+current_index).is(":checked");
			$(this).find(".alert-danger").remove();
			
			if(tempoLengthoption==\'days\'){
				 tempo_callenth=tempoLength;
			}else if(tempoLengthoption==\'week\')	{
				tempo_callenth=tempoLength*7;
			}
			else if(tempoLengthoption==\'month\')	{
				tempo_callenth=tempoLength*30;
				}
			else if(tempoLengthoption==\'year\')	{
				tempo_callenth=tempoLength*365;
				}
				
				 if(durationknow==false) caltotval=Math.round((duration_missionval/tempo_callenth)*volumeMax);
					else  caltotval= volumeMax;
					if(status==\'change\' && $.isNumeric(caltotval) && caltotval!=0)
					{
						$(\'#volume_\'+current_index).val(caltotval);
						totalvolumeval=$(\'#volume_\'+current_index).val();	
					}
				//alert(caltotval+\' vol \'+totalvolumeval);
					if(caltotval!=totalvolumeval && $.isNumeric(caltotval) && tempotype!=\'max\')
					{
						$(this).find(\'.span9\').after("<div class=\'alert-danger span7 offset3\' style=\'padding:0 5px;\'>The tempo does not correspond to the volume and timeline of the mission</div>");
							$("#volume_max_"+current_index).focus();
							volume_error = false;						
							return false;						
					}
					else volume_error = true;
						
							
			}
	});
	return true;
}

</script>
'; ?>


<div class="row-fluid">    
	<div class="span12">
		<div class="row-fluid">
			<ul id="validate_wizard-titles" class="stepy-titles clearfix">
				<li id="validate_wizard-title-0" class="current-step"><div>Creation</div><span class="stepNb">1</span></li>
				<li id="validate_wizard-title-1"><div>TECH review</div><span class="stepNb">2</span></li>
				<li id="validate_wizard-title-2"><div>SEO review</div><span class="stepNb">3</span></li>
				<li id="validate_wizard-title-3"><div>Prod review</div><span class="stepNb">4</span></li>
				<li id="validate_wizard-title-4"><div>Validation</div><span class="stepNb">5</span></li>
			</ul>
		</div>
		<h1 class="heading topset2"><?php echo $this->_tpl_vars['create_mission']['quote_title']; ?>
</h1>
		<div class="row-fluid">			
			<div class="span8">
				<form class="form_validation_reg" action="/quote/save-quote-mission" id="create_quote_mission" method="post" enctype="multipart/form-data">
				<div class="span12" id="quote_missions">
				<?php if (count($this->_tpl_vars['quote_missions']) > 0): ?>
					<?php $_from = $this->_tpl_vars['quote_missions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['misson'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['misson']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mission']):
        $this->_foreach['misson']['iteration']++;
?>
					<?php $this->assign('gn_index', ($this->_foreach['misson']['iteration']-1)); ?>
					<?php $this->assign('ms_index', ($this->_foreach['misson']['iteration']-1)+1); ?>
					<!--Mission info in create/edit-->										
						<div class="w-box" id="quote_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
">						
							<div class="w-box-header"><span id="box_title_<?php echo $this->_tpl_vars['ms_index']; ?>
">Mission <?php echo $this->_tpl_vars['ms_index']; ?>
</span>						
								<div class="pull-right">
									<a id="duplicate_mission_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="btn btn-default btn-small duplicate">Duplicate</a>
									<a class="label" id="mission_close_<?php echo $this->_tpl_vars['ms_index']; ?>
" rel="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
" <?php if (count($this->_tpl_vars['quote_missions']) < 1): ?> style="display:none"<?php endif; ?>><i class="icon-white icon-remove"></i></a>
								</div>
							</div>
							<input type="hidden" name="mission_id[]" value="<?php echo $this->_tpl_vars['mission']['identifier']; ?>
">
							<div class="w-box-content  cnt_a">
								<div class="formSep">
									<div class="row-fluid">							
										<label class="span3 moveright">Type <span class="f_req">*</span> </label>
										<div class="span8">
											<select name="product[]" id="product_<?php echo $this->_tpl_vars['ms_index']; ?>
" onchange="fnCheckProduct(this);" class="span12 validate[required]" data-placeholder="Select type">
												<option></option>
												<option value="redaction" <?php if ($this->_tpl_vars['mission']['product'] == 'redaction'): ?> selected<?php endif; ?>>Writing</option>
												<option value="translation" <?php if ($this->_tpl_vars['mission']['product'] == 'translation'): ?> selected<?php endif; ?>>Translating</option>
																							</select>	
										</div>										
									</div>
								</div>	
								<div id="other_info_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['product'] == 'autre'): ?> style="display:none"<?php endif; ?>>
									<div class="formSep">
										<div class="row-fluid">							
											<label class="span3 moveright">Language <span class="f_req">*</span> </label>
											<div class="span4">
												<select name="language[]" id="language_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12 validate[required]" data-placeholder="Select language">
													<option></option>
													<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['mission']['language']), $this);?>

												</select>
											</div>
											<div class="span4">
												<select name="languagedest[]" id="languagedest_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['product'] != 'translation'): ?> style="display:none"<?php endif; ?> class="span12 checklanguage validate[required]" data-placeholder="Select language">
													<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['mission']['languagedest']), $this);?>

												</select>
											</div>									
										</div>	
									</div>
									<div class="formSep">
										<div class="row-fluid">							
											<label class="span3 moveright">Product <span class="f_req">*</span> </label>
											<div class="span5">
												<select name="producttype[]" id="producttype_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12 validate[required]" data-placeholder="Select Product" onchange="fnCheckProductType(this);">
													<option></option>
													<option value="news" <?php if ($this->_tpl_vars['mission']['producttype'] == 'news'): ?> selected<?php endif; ?>>News</option>
													<option value="article_de_blog" <?php if ($this->_tpl_vars['mission']['producttype'] == 'article_de_blog'): ?> selected<?php endif; ?>>Blog article</option>
													<option value="descriptif_produit" <?php if ($this->_tpl_vars['mission']['producttype'] == 'descriptif_produit'): ?> selected<?php endif; ?>>Product description</option>
													<option value="article_seo" <?php if ($this->_tpl_vars['mission']['producttype'] == 'article_seo'): ?> selected<?php endif; ?>>SEO article</option>
													<option value="guide" <?php if ($this->_tpl_vars['mission']['producttype'] == 'guide'): ?> selected<?php endif; ?>>Guide</option>													
													<option value="autre" <?php if ($this->_tpl_vars['mission']['producttype'] == 'autre'): ?> selected<?php endif; ?>>Others</option>
												</select>
												<div id="producttypeotherdiv_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['producttype'] == 'autre'): ?>style="display: block;"<?php else: ?>style="display: none;"<?php endif; ?>>
													<input type="text"  class="span12 validate[required]" value="<?php echo $this->_tpl_vars['mission']['producttypeother']; ?>
" id="producttypeother_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="producttypeother[]">	
												</div>	
											</div>	
											<div class="span2">
												<div class="input-append">
													<input type="text" name="nb_words[]" id="nb_words_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span11 validate[required,custom[number]]" value="<?php echo $this->_tpl_vars['mission']['nb_words']; ?>
">
													<span class="add-on">Nb of words</span>
												</div>
											</div>	
										</div>
									</div>
									<div class="formSep">
										<div class="row-fluid">	
											<label class="span3 moveright">One shot<span class="f_req">*</span> </label>
											<div class="span2">
												<input type="radio" name="oneshot_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="oneshot  validate[required]" id="oneshot_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['oneshot'] == 'yes'): ?> checked <?php endif; ?>  value="yes">Yes
												<input type="radio" name="oneshot_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="oneshot  validate[required]" id="oneshot_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['oneshot'] == 'no'): ?> checked <?php endif; ?>   value="no">No
											</div>												
										</div>
								</div>	
									<div class="formSep oneshotVolume" id="tempo_details_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['oneshot'] == 'yes'): ?> style="display:none" <?php endif; ?>>
										<div class="row-fluid">	
											<label class="span3 moveright">&nbsp;</label>
											<div class="span9">
												<div class="span2">												
													<input name="volume_max[]" id="volume_max_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="validate[required,custom[number]] span12" type="text" placeholder="Volume" value="<?php echo $this->_tpl_vars['mission']['volume_max']; ?>
">
												</div>
												<div class="span2">
													<select name="tempo[]" id="tempo_type_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12">
														<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_array'],'selected' => $this->_tpl_vars['mission']['tempo']), $this);?>

													</select>
												</div>
												<div class="span2">
													<select name="delivery_volume_option[]" id="delivery_volume_option_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12">
														<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['volume_option_array'],'selected' => $this->_tpl_vars['mission']['delivery_volume_option']), $this);?>
														
													</select>
												</div>
												<div class="span2">
													<input type="text" id="tempo_length_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="tempo_length[]" class="validate[required] span12" value="<?php echo $this->_tpl_vars['mission']['tempo_length']; ?>
" />
												</div>
												<div class="span3">
													<select name="tempo_length_option[]" id="tempo_length_option_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12">
														<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_duration_array'],'selected' => $this->_tpl_vars['mission']['tempo_length_option']), $this);?>

													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="formSep">
										<div class="row-fluid">								
											<label class="span3 moveright">Mission Duration <span class="f_req">*</span> </label>
											<div class="span3" id="mission_duration_details_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['duration_dont_know'] == 'yes'): ?> style="display:none" <?php endif; ?>>
												<div class="span4">
													<input name="mission_length[]" id="mission_length_<?php echo $this->_tpl_vars['ms_index']; ?>
" value="<?php echo $this->_tpl_vars['mission']['mission_length']; ?>
" class="validate[required,custom[number]] span12" type="text">
												</div>
												<div class="span7">											
													<select name="mission_length_option[]" id="mission_length_option_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span11">
														<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['duration_array'],'selected' => $this->_tpl_vars['mission']['mission_length_option']), $this);?>

													</select>											
												</div>
											</div>	
											<div class="span4" style="margin-left: 0px">
												<label class="checkbox inline">
													<input type="checkbox" class="dont_know" id="duration_dont_know_<?php echo $this->_tpl_vars['ms_index']; ?>
" name="duration_dont_know_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['duration_dont_know'] == 'yes'): ?> checked <?php endif; ?>  value="yes">I don't know
												</label>
											</div>
										</div>
									</div>	
									<div class="formSep">
										<div class="row-fluid">	
											<label class="span3 moveright">Volume <span class="f_req">*</span> </label>
											<div class="span2">
												<input name="volume[]" id="volume_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="validate[required,custom[number]] span12" type="text" placeholder="Volume" value="<?php echo $this->_tpl_vars['mission']['volume']; ?>
">
											</div>
										</div>
									</div>
									
								</div>	
								<div class="formSep">
									<div class="row-fluid">								
										<label class="span3 moveright">Comment(s)</label>
										<div class="span8">
											<textarea name="comments[]" id="comments_<?php echo $this->_tpl_vars['ms_index']; ?>
" class="span12"><?php echo ((is_array($_tmp=$this->_tpl_vars['mission']['comments'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</textarea>
										</div>
									</div>
								</div>
								<div class="formSep">
									<div class="row-fluid">	
										<label class="span3 moveright">Client request<span class="f_req">*</span> </label>
										<div class="span2">
											<input type="radio" class="demand validate[required]" name="demande_<?php echo $this->_tpl_vars['ms_index']; ?>
" id="demande_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['demande_client'] == 'yes'): ?>  checked <?php endif; ?>  value="yes">Yes
											<input type="radio" class="demand validate[required]" name="demande_<?php echo $this->_tpl_vars['ms_index']; ?>
" id="demande_<?php echo $this->_tpl_vars['ms_index']; ?>
" <?php if ($this->_tpl_vars['mission']['demande_client'] == 'no'): ?>  checked <?php endif; ?>  value="no">No
										</div>											
									</div>
								</div>
							</div>
						</div>					
					<?php endforeach; endif; unset($_from); ?>	
				<?php else: ?>	
				<!--Mission info in create/edit-->									
					<div class="w-box" id="quote_mission_1">
						<div class="w-box-header"><span id="box_title_1">Mission 1</span>						
							<div class="pull-right">
								<a id="duplicate_mission_1" class="btn btn-default btn-small duplicate">Duplicate</a>
								<a class="label" id="mission_close_1" rel="" style="display:none"><i class="icon-white icon-remove"></i></a>
							</div>
						</div>
						<div class="w-box-content  cnt_a">
							<div class="formSep">
								<div class="row-fluid">							
									<label class="span3 moveright">Type <span class="f_req">*</span> </label>
									<div class="span8">
										<select name="product[]" id="product_1" onchange="fnCheckProduct(this);" class="span12 validate[required]" data-placeholder="Select type">
											<option></option>
											<option value="redaction">Writing</option>
											<option value="translation">Translating</option>
																					</select>	
									</div>										
								</div>
							</div>	
							<div id="other_info_1">
								<div class="formSep">
									<div class="row-fluid">							
										<label class="span3 moveright">Language <span class="f_req">*</span> </label>
										<div class="span4">
											<select name="language[]" id="language_1" class="span12 validate[required]" data-placeholder="Select language">
												<option></option>
												<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => 'fr'), $this);?>

											</select>
										</div>
										<div class="span4">
											<select name="languagedest[]" id="languagedest_1" style="display:none" class="span12 checklanguage validate[required]" data-placeholder="Select language">
												<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list']), $this);?>

											</select>
										</div>									
									</div>	
								</div>
								<div class="formSep">
									<div class="row-fluid">							
										<label class="span3 moveright">Product <span class="f_req">*</span> </label>
										<div class="span5">
											<select name="producttype[]" id="producttype_1" class="span12 validate[required]" data-placeholder="Select Product" onchange="fnCheckProductType(this);">
												<option></option>
												<option value="article_de_blog">Blog article</option>
												<option value="news">News</option>
												<option value="descriptif_produit">Product description</option>
												<option value="article_seo">SEO article</option>
												<option value="guide">Guide</option>													
												<option value="autre">Others</option>
											</select>
											<div id="producttypeotherdiv_1"  style="display: none;">
												<input type="text" class="span12 validate[required]" value="" id="producttypeother_1" name="producttypeother[]">
											</div>	
										</div>	
										<div class="span2">
											<div class="input-append">
												<input type="text" name="nb_words[]" id="nb_words_1" class="span12 validate[required,custom[number]]">
												<span class="add-on">Nb of words</span>
											</div>
										</div>	
									</div>
								</div>
								<div class="formSep">
									<div class="row-fluid">	
										<label class="span3 moveright">One shot<span class="f_req">*</span> </label>
										<div class="span2">
											<input type="radio" name="oneshot_1" id="oneshot_1" class="oneshot" checked="checked"  value="yes">Yes
											<input type="radio" name="oneshot_1" id="oneshot_1" class="oneshot" value="no">No
										</div>											
									</div>
								</div>
								<div class="formSep oneshotVolume"  id="tempo_details_1" style="display:none">
									<div class="row-fluid">	
										<label class="span3 moveright">&nbsp;</label>
										<div class="span9">
											<div class="span2">												
												<input name="volume_max[]" id="volume_max_1" class="validate[required,custom[number]] span12" type="text" placeholder="Volume">
											</div>
											<div class="span2">
												<select name="tempo[]" id="tempo_type_1" class="span12">
													<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_array']), $this);?>

												</select>
											</div>
											<div class="span2">
												<select name="delivery_volume_option[]" id="delivery_volume_option_1" class="span12">
													<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['volume_option_array']), $this);?>

												</select>
											</div>
											<div class="span2">
												<input type="text" id="tempo_length_1" name="tempo_length[]" class="validate[required] span12" />
											</div>
											<div class="span3">
												<select name="tempo_length_option[]" id="tempo_length_option_1" class="span12">
													<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_duration_array']), $this);?>

												</select>
											</div>
										</div>
									</div>
								</div>		
								<div class="formSep">
									<div class="row-fluid">								
										<label class="span3 moveright">Mission Duration <span class="f_req">*</span> </label>
										<div class="span3" id="mission_duration_details_1">
											<div class="span4">
												<input name="mission_length[]" id="mission_length_1" class="validate[required,custom[number]] span12" type="text">
											</div>
											<div class="span7">											
												<select name="mission_length_option[]" id="mission_length_option_1" class="span11">
													<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['duration_array']), $this);?>

												</select>											
											</div>
										</div>	
										<div class="span4" style="margin-left: 0px">
											<label class="checkbox inline">
												<input type="checkbox" class="dont_know" id="duration_dont_know_1" name="duration_dont_know_1"  value="yes">I don't know
											</label>
										</div>
									</div>
								</div>
								<div class="formSep">
									<div class="row-fluid">	
										<label class="span3 moveright">Volume <span class="f_req">*</span> </label>
										<div class="span2">
											<input name="volume[]" id="volume_1" class="validate[required,custom[number]] span12" type="text" placeholder="Volume">
										</div>
									</div>
								</div>	
								
							</div>	
							<div class="formSep">
								<div class="row-fluid">								
									<label class="span3 moveright">Comments</label>
									<div class="span8">
										<textarea name="comments[]" id="comments_1" class="span12"></textarea>
									</div>
								</div>
							</div>
							<div class="formSep">
									<div class="row-fluid">	
										<label class="span3 moveright">Client request<span class="f_req">*</span> </label>
										<div class="span2">
											<input type="radio" name="demande_1" class="demand" id="demande_1" checked="checked"  value="yes">Yes
											<input type="radio" name="demande_1" class="demand" id="demande_1"  value="no">No
										</div>											
									</div>
								</div>
						</div>
					</div>							
				<!--END Contacts info create/edit-->
				<?php endif; ?>
				</div>
				<div class="row-fluid formSep ">	
					<div class="pull-right" id="addmore_mission_link"><a class="btn btn-default btn-small topset2"><i class="icon-plus"></i> Add a mission</a></div> 
				</div>
				<div class="formSep">
				<hr>
					<div class="row-fluid">
						<div class="span5">
							<a class="btn btn-default" href="/quote/create-quote-step1?submenuId=ML13-SL2"><i class="icon-chevron-left"></i> Back</a>							
						</div>
						<div class="span5 form-inline pull-right">
							<button type="submit" name="quote_mission" class="finish btn btn-primary">Validate</button>							
						</div>						
					</div>
				</div>
				</form>	
			</div>
			<div class="span3 offset1">
				<aside>
					<div class="aside-bg">
						<div class="aside-block" id="selected-editor">
							<div class="editor-container">
								<h2 class="heading">Info client</h2>
								<img title="<?php echo $this->_tpl_vars['create_mission']['company_name']; ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/clients/logos/<?php echo $this->_tpl_vars['create_mission']['client_id']; ?>
/<?php echo $this->_tpl_vars['create_mission']['client_id']; ?>
_global.png?12345">
								<p class="editor-name"><a href="/quote/create-client?uaction=view&client_id=<?php echo $this->_tpl_vars['create_mission']['client_id']; ?>
&submenuId=ML13-SL1" target="_blank"><?php echo $this->_tpl_vars['create_mission']['company_name']; ?>
</a></p>
								<p class="editor-info">
								Turnover : <?php echo ((is_array($_tmp=$this->_tpl_vars['create_mission']['ca_number'])) ? $this->_run_mod_handler('zero_cut_t', true, $_tmp, 2) : smarty_modifier_zero_cut_t($_tmp, 2)); ?>
 euros<br>
								Category : <?php echo $this->_tpl_vars['create_mission']['category_name']; ?>
<br><br>
								<label class="label label-info">Websites</label><br>
									<?php $_from = $this->_tpl_vars['create_step1']['client_websites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['site']):
?>
										<a href="<?php echo $this->_tpl_vars['site']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['site'])) ? $this->_run_mod_handler('domain_url', true, $_tmp) : smarty_modifier_domain_url($_tmp)); ?>
</a> <br/>
									<?php endforeach; endif; unset($_from); ?>
								</p>
								
							</div>
						</div>
						<div class="aside-block" id="selected-editor">
							<div class="editor-container">
								<h2 class="heading">Quote handled by</h2>
								<img title="<?php echo $this->_tpl_vars['create_mission']['quote_user_name']; ?>
" src="<?php echo $this->_tpl_vars['fo_path']; ?>
/profiles/bo/<?php echo $this->_tpl_vars['create_step1']['quote_by']; ?>
/<?php echo $this->_tpl_vars['create_step1']['quote_by']; ?>
_p.jpg">
								<p class="editor-name"><?php echo $this->_tpl_vars['create_mission']['quote_user_name']; ?>
</p>
								<p class="editor-info">
								Phone number : <?php echo $this->_tpl_vars['create_mission']['phone_number']; ?>
<br>
								Email :<a href="mailto:<?php echo $this->_tpl_vars['create_mission']['email']; ?>
"><?php echo $this->_tpl_vars['create_mission']['email']; ?>
</a><br><br>
								</p>
								<!--<a class="btn btn-info assign_pop_over" data-content='<select name="quote_by" id="quote_by" onChange="fnassignQuote(this.value);">	
	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['assign_contacts'],'selected' => $this->_tpl_vars['create_step1']['quote_by']), $this);?>
	
</select>' data-html="true" data-original-title="Sales list" data-placement="left">I'm not the sales incharge</a>-->
							</div>
						</div>
					</div>	
				</aside>
			</div>
		</div>
	</div>
</div>
<?php echo '
<script>
function changeNames()
{
	var i = 1;
	$("#quote_missions").find("[id^=quote_mission_]").each(function(key,index){
		$(this).find(".oneshot").attr("name","oneshot_"+i);
		$(this).find(".demand").attr("name","demande_"+i);
		
						i++;
	});
}
</script>
'; ?>
