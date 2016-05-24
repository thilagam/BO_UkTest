<?php /* Smarty version 2.6.19, created on 2015-11-25 14:49:25
         compiled from gebo/quotecontractmission/add-mission.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/quotecontractmission/add-mission.phtml', 25, false),array('function', 'math', 'gebo/quotecontractmission/add-mission.phtml', 250, false),array('modifier', 'zero_cut', 'gebo/quotecontractmission/add-mission.phtml', 234, false),)), $this); ?>
<form class="form-horizontal" action="/contractmission/save-mission" name="" method="post" id="addmission">
<div class="w-box" id="quote_mission">
	<div class="w-box-header"><span id="box_title_1">Mission Details</span>						
	</div>
	<div class="w-box-content  cnt_a">
		<div class="formSep">
			<div class="row-fluid">							
				<label class="span3 moveright">Type <span class="f_req">*</span> </label>
				<div class="span8">
					<select name="product" id="product_1" onchange="fnCheckProduct(this);" class="span2 validate[required]" data-placeholder="Select type">
						<option></option>
						<option value="redaction" <?php if ($this->_tpl_vars['mission_res']['product'] == 'redaction'): ?>selected<?php endif; ?>>R&eacute;daction</option>
						<option value="translation"<?php if ($this->_tpl_vars['mission_res']['product'] == 'translation'): ?>selected<?php endif; ?>>Traduction</option>
					</select>	
				</div>										
			</div>
		</div>	
		<div id="other_info_1">
			<div class="formSep">
				<div class="row-fluid">							
					<label class="span3 moveright">Langue <span class="f_req">*</span> </label>
					<div class="span3">
						<select name="language" id="language_1" class="span8 validate[required]" data-placeholder="Select language" style="width: 267px;">
							<option></option>
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['mission_res']['language_source']), $this);?>

						</select>
					</div>
					<div class="span3">
						<select name="languagedest" id="languagedest_1" style="<?php if ($this->_tpl_vars['mission_res']['product'] == 'redaction'): ?>display:none;width: 267px;<?php endif; ?>" class="span8 checklanguage validate[required]" data-placeholder="Select language" >
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['mission_res']['language_dest']), $this);?>

						</select>
					</div>									
				</div>	
			</div>
			<div class="formSep">
				<div class="row-fluid">							
					<label class="span3 moveright">Produit <span class="f_req">*</span> </label>
					<div class="span3">
						<select name="producttype" style="width: 267px;" id="producttype_1" class="span6 validate[required]" data-placeholder="Select Produit" onchange="fnCheckProductType(this);">
							<option></option>
							<option value="article_de_blog" <?php if ($this->_tpl_vars['mission_res']['product_type'] == 'article_de_blog'): ?>selected<?php endif; ?>>Article de blog</option>
							<option value="news" <?php if ($this->_tpl_vars['mission_res']['product_type'] == 'news'): ?>selected<?php endif; ?>>News</option>
							<option value="descriptif_produit" <?php if ($this->_tpl_vars['mission_res']['product_type'] == 'descriptif_produit'): ?>selected<?php endif; ?>>Desc.Produit</option>
							<option value="article_seo" <?php if ($this->_tpl_vars['mission_res']['product_type'] == 'article_seo'): ?>selected<?php endif; ?>>Article SEO</option>
							<option value="guide" <?php if ($this->_tpl_vars['mission_res']['product_type'] == 'guide'): ?>selected<?php endif; ?>>Guide</option>												
							<option value="autre" <?php if ($this->_tpl_vars['mission_res']['product_type'] == 'autre'): ?>selected<?php endif; ?>>Autres</option>
						</select>
						<div id="producttypeotherdiv_1"   <?php if ($this->_tpl_vars['mission_res']['product_type'] != 'autre'): ?>style="display: none;"<?php endif; ?>>
							<input type="text" class="span10 validate[required]" value="<?php echo $this->_tpl_vars['mission_res']['product_type_other']; ?>
" id="producttypeother" name="producttypeother">
						</div>	
					</div>	
					<div class="span2">
						<div class="input-append">
							<input type="text" name="nb_words" id="nb_words_1" class="span6 validate[required,custom[number]]" value="<?php echo $this->_tpl_vars['mission_res']['nb_words']; ?>
">
							<span class="add-on">nb mots</span>
						</div>
					</div>	
				</div>
			</div>
			<div class="formSep">
				<div class="row-fluid">								
					<label class="span3 moveright">Dur&eacute;e la mission <span class="f_req">*</span> </label>
					<div class="span3" id="mission_duration_details_1">
						<div class="span4">
							<input name="mission_length" id="mission_length_1" class="validate[required,custom[number]] span12" type="text" value="<?php echo $this->_tpl_vars['mission_res']['mission_length']; ?>
">
						</div>
						<div class="span7">											
							<select name="mission_length_option" id="mission_length_option_1" class="span11">
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['duration_array'],'selected' => $this->_tpl_vars['mission_res']['mission_length_option']), $this);?>

							</select>											
						</div>
					</div>	
					<div class="span4" style="margin-left: 0px">
						<label class="checkbox inline">
							<input type="checkbox" class="dont_know" id="duration_dont_know_1" name="duration_dont_know"  value="yes" <?php if ($this->_tpl_vars['mission_res']['duration_dont_know'] == 'yes'): ?>checked<?php endif; ?>>Je ne sais pas
						</label>
					</div>
				</div>
			</div>
			<div class="formSep">
				<div class="row-fluid">	
					<label class="span3 moveright">Volume<span class="f_req">*</span> </label>
					<div class="span2">
						<input name="volume" id="volume" class="validate[required,custom[number]] span12" type="text" placeholder="Volume" onkeyup="fnCalTotalCosts();" value="<?php echo $this->_tpl_vars['mission_res']['volume']; ?>
" >
					</div>
				</div>
			</div>	
			<div class="formSep">
			<div class="row-fluid">								
				<label class="span3 moveright">Staffing set up</label>
				<div class="span3">
					<div class="span4">
						<input type="text" id="staff_time" name="staff_time" class="span12 validate[required]" value="<?php echo $this->_tpl_vars['mission_res']['staff_time']; ?>
" />
					</div>
					<div class="span7">
						<select name="staff_time_option" id="staff_time_option" class="span11">	
							<option value="days" <?php if ($this->_tpl_vars['mission_res']['staff_time_option'] == 'days'): ?>selected<?php endif; ?>>Jours</option>
							<option value="hours" <?php if ($this->_tpl_vars['mission_res']['staff_time_option'] == 'hours'): ?>selected<?php endif; ?>>Hours</option>									
						</select>
					</div>
				</div>	
			</div>
			</div>
			<div class="formSep">
				<div class="row-fluid">	
					<label class="span3 moveright">One shot<span class="f_req">*</span> </label>
					<div class="span2">
						<input type="radio" name="oneshot" id="" class="oneshot" checked="checked" <?php if ($this->_tpl_vars['mission_res']['oneshot'] == 'yes'): ?>checked<?php endif; ?>  value="yes">Oui&nbsp;
						<input type="radio" name="oneshot" id="" class="oneshot" <?php if ($this->_tpl_vars['mission_res']['oneshot'] == 'no'): ?>checked<?php endif; ?>  value="no">Non
					</div>											
				</div>
			</div>
			<div class="formSep"  id="tempo_details" <?php if ($this->_tpl_vars['mission_res']['oneshot'] != 'no'): ?>style="display:none"<?php endif; ?>>
				<div class="row-fluid">	
					<label class="span3 moveright">&nbsp;</label>
					<div class="span9">
						<div class="span2">												
							<input name="volume_max" id="volume_max_1" class="validate[required,custom[number]] span12" type="text" placeholder="Volume" value="<?php echo $this->_tpl_vars['mission_res']['volume_max']; ?>
">
						</div>
						<div class="span2">
							<select name="tempo" id="tempo_type_1" class="span12">
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_array'],'selected' => $this->_tpl_vars['mission_res']['tempo']), $this);?>

							</select>
						</div>
						<div class="span2">
							<select name="delivery_volume_option" id="delivery_volume_option_1" class="span12">
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['volume_option_array'],'selected' => $this->_tpl_vars['mission_res']['delivery_volume_option']), $this);?>

							</select>
						</div>
						<div class="span2">
							<input type="text" id="tempo_length_1" name="tempo_length" class="validate[required] span12" value="<?php echo $this->_tpl_vars['mission_res']['tempo_length']; ?>
" />
						</div>
						<div class="span3">
							<select name="tempo_length_option" id="tempo_length_option_1" class="span12">
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tempo_duration_array'],'selected' => $this->_tpl_vars['mission_res']['tempo_length_option']), $this);?>

							</select>
						</div>
					</div>
				</div>
			</div>		
		</div>	
		<div class="formSep">
			<div class="row-fluid">								
				<label class="span3 moveright">Commentaire </label>
				<div class="span8">
					<textarea name="comments" id="comments_1" class="span12"><?php echo $this->_tpl_vars['mission_res']['comments']; ?>
</textarea>
				</div>
			</div>
		</div>
		<div class="formSep">
			<div class="row-fluid">	
				<label class="span3 moveright">Demande Client<span class="f_req">*</span> </label>
				<div class="span2">
					<input type="radio" class="demand validate[required]" name="demande_client" id="" <?php if ($this->_tpl_vars['mission_res']['demande_client'] == 'yes'): ?>  checked <?php endif; ?>  value="yes">Oui&nbsp;
					<input type="radio" class="demand validate[required]" name="demande_client" id="" <?php if ($this->_tpl_vars['mission_res']['demande_client'] == 'no'): ?>  checked <?php endif; ?>  value="no">Non
				</div>											
			</div>
		</div>
		<div class="formSep">
			<div class="row-fluid">	
				<label class="span3 moveright">Free Mission<span class="f_req">*</span> </label>
				<div class="span2">
					<input type="radio" class="validate[required]" name="free_mission" id="" <?php if ($this->_tpl_vars['mission_res']['free_mission'] == 'yes'): ?>  checked <?php endif; ?> value="yes">Oui&nbsp;
					<input type="radio" class="validate[required]" name="free_mission" id="" <?php if ($this->_tpl_vars['mission_res']['free_mission'] == 'no' || $this->_tpl_vars['mission_res']['free_mission'] == ''): ?>  checked <?php endif; ?>  value="no">Non
				</div>											
			</div>
		</div>
	</div>
</div>		
<div class="w-box" style="margin-top:20px" id="prod_mission">
	<div class="w-box-header"><span id="box_title_1">Prod Mission Details</span>						
	</div>
	<div class="w-box-content  cnt_a">
		<div class="formSep">
			<div class="row-fluid">	
				<label class="span3 moveright"><span class="box_title"></span> Nb r&eacute;dacteurs<span class="f_req">*</span> </label>
				<div class="span2">
					<input name="prod_mission_writing_staff" id="" class="validate[required,custom[number]] span12" type="text" placeholder="" value="<?php echo $this->_tpl_vars['prod_mission_writing']['staff']; ?>
" >
				</div>
			</div>
		</div>
		<div class="formSep">
			<div class="row-fluid">	
				<label class="span3 moveright"><span class="box_title"></span> Co&ucirc;t(&<?php echo $this->_tpl_vars['mission_res']['sales_suggested_currency']; ?>
;)<span class="f_req">*</span> </label>
				<div class="span2">
					<input name="prod_mission_writing_cost" id="writer_cost" class="validate[required,custom[number]] span12" type="text" placeholder="" value="<?php echo $this->_tpl_vars['prod_mission_writing']['cost']; ?>
" onkeyup="fnCalTotalCosts();" >
				</div>
			</div>
		</div>
		<div class="formSep">
			<div class="row-fluid">	
				<label class="span3 moveright">Correction Nb r&eacute;dacteurs<span class="f_req">*</span> </label>
				<div class="span2">
					<input name="prod_mission_correction_staff" id="" class="validate[required,custom[number]] span12" type="text" placeholder="" value="<?php echo $this->_tpl_vars['prod_mission_correction']['staff']; ?>
" >
				</div>
			</div>
		</div>
		<div class="formSep">
			<div class="row-fluid">	
				<label class="span3 moveright">Correction Co&ucirc;t(&<?php echo $this->_tpl_vars['mission_res']['sales_suggested_currency']; ?>
;)<span class="f_req">*</span> </label>
				<div class="span2">
					<input name="prod_mission_correction_cost" id="corrector_cost" class="validate[required,custom[number]] span12" type="text" placeholder="" value="<?php echo $this->_tpl_vars['prod_mission_correction']['cost']; ?>
" onkeyup="fnCalTotalCosts();" >
				</div>
			</div>
		</div>
		<div class="formSep">
			<div class="row-fluid">	
				<label class="span3 moveright">Merge<span class="f_req">*</span> </label>
				<div class="span2">
						<input id="margin_percentage" class="span5" type="text" value="<?php if ($this->_tpl_vars['mission_res']['margin_percentage']): ?><?php echo $this->_tpl_vars['mission_res']['margin_percentage']; ?>
<?php else: ?>60.00<?php endif; ?>" onkeyup="fnCalTotalCosts();" name="margin_percentage" size="16">
						<span class="add-on">%</span>
				</div>
			</div>
		</div>
		<?php if ($this->_tpl_vars['reqaction'] == 'edit'): ?>
		<div class="formSep">
			<div class="row-fluid">	
				<label class="span3 moveright">Formule<span class="f_req">*</span> </label>
				<div class="span2">
					<select name="package" id="package" class="span12 validate[required]" onchange="changemargin();fnCalTotalCosts()">
						<option value="lead" <?php if ($this->_tpl_vars['mission_res']['package'] == 'lead'): ?> selected <?php endif; ?>>Lead</option>
						<option value="team" <?php if ($this->_tpl_vars['mission_res']['package'] == 'team'): ?> selected <?php endif; ?>>Team</option>
						<option value="link" <?php if ($this->_tpl_vars['mission_res']['package'] == 'link'): ?> selected <?php endif; ?>>Link</option>
						<option value="user" <?php if ($this->_tpl_vars['mission_res']['package'] == 'user'): ?> selected <?php endif; ?>>User</option>
					</select>
				</div>
			</div>
		</div>
		<div class="formSep fpackuser fpack" style="display:none">
			<div class="row-fluid">	
				<label class="span3 moveright">Fees offre user<span class="f_req">*</span> </label>
				<div class="span2">
					<div class="input-append">
						<input type="text" class="span5" id="user_fee" name="user_fee" value="<?php if ($this->_tpl_vars['mission_res']['user_fee']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['mission_res']['user_fee'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
<?php else: ?>1<?php endif; ?>"  onkeyup="fnCalTotalCosts()"><span class="add-on">&<?php echo $this->_tpl_vars['mission_res']['sales_suggested_currency']; ?>
;</span>
					</div>
				</div>
			</div>
		</div>
		<div class="formSep fpackteam fpack" style="display:none">
			<div class="row-fluid">	
				<label class="span3 moveright">Team pack and fee<span class="f_req">*</span> </label>
				<div class="span8">
					<input id="team_packs" class="span2 validate[required,custom[number]]" type="text" onkeyup="fnCalTotalCosts();calteamca()" value="<?php if ($this->_tpl_vars['mission_res']['team_packs']): ?><?php $this->assign('team_packs', $this->_tpl_vars['mission_res']['team_packs']); ?><?php echo $this->_tpl_vars['mission_res']['team_packs']; ?>
<?php else: ?><?php $this->assign('team_packs', 1); ?>1<?php endif; ?>" name="team_packs">
					x 
					<div class="input-append" style="margin-left:-40px">
					<input id="team_fee" class="span5 validate[required,custom[number]]" type="text" onkeyup="fnCalTotalCosts();calteamca()" value="<?php if ($this->_tpl_vars['mission_res']['team_fee']): ?><?php $this->assign('team_fee', $this->_tpl_vars['mission_res']['team_fee']); ?><?php echo $this->_tpl_vars['mission_res']['team_fee']; ?>
<?php else: ?><?php $this->assign('team_fee', 1); ?>1<?php endif; ?>" name="team_fee">
					<span class="add-on">&<?php echo $this->_tpl_vars['mission_res']['sales_suggested_currency']; ?>
;/pack</span>
					</div>
					<input id="" class="" type="hidden" value="" name="team_fee_ca">
					<b id="team_fee_ca" style="margin-left:-40px;"> <?php echo smarty_function_math(array('equation' => "x * y",'x' => $this->_tpl_vars['team_fee'],'y' => $this->_tpl_vars['team_packs']), $this);?>
</b>&nbsp; &<?php echo $this->_tpl_vars['mission_res']['sales_suggested_currency']; ?>
;
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="formSep">
			<div class="row-fluid">	
				<label class="span3 moveright">P VENTE/ARTICLE<span class="f_req">*</span> </label>
				<div class="span2">
					<span id="unit_price_text"></span>
					<input type="hidden" name="unit_price" value="" id="unit_price" />
				</div>
			</div>
		</div>
		<div class="formSep">
			<div class="row-fluid">	
				<label class="span3 moveright">Mission CA<span class="f_req">*</span> </label>
				<div class="span2">
					<span id="mission_turnover_text"></span>
					<input type="hidden" name="mission_turnover" value="" id="mission_turnover" />
				</div>
			</div>
		</div>
		<div class="formSep">
			<div class="row-fluid">	
				<label class="span3 moveright">Total CA<span class="f_req">*</span> </label>
				<div class="span2">
						<span id="total_turnover_text"></span>
						<input type="hidden" name="total_turnover" value="" id="total_turnover" />
						<input type="hidden" name="total_turnover_org" value="<?php echo $this->_tpl_vars['contract_details']['turnover']; ?>
" id="" />
						<input type="hidden" name="actual_mission_turnover" value="<?php if ($this->_tpl_vars['mission_res']['cm_turnover'] != '0.00' && $this->_tpl_vars['mission_res']['cm_turnover'] != '0' && $this->_tpl_vars['mission_res']['cm_turnover'] != ''): ?><?php echo $this->_tpl_vars['mission_res']['cm_turnover']; ?>
<?php else: ?><?php echo $this->_tpl_vars['mission_res']['turnover']; ?>
<?php endif; ?>" id="actual_mission_turnover" />
						<input type="hidden" name="prod_mission_writing" value="<?php echo $this->_tpl_vars['prod_mission_writing']['identifier']; ?>
" id="" />
						<input type="hidden" name="prod_mission_correction" value="<?php echo $this->_tpl_vars['prod_mission_correction']['identifier']; ?>
" id="" />
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="quote_id" value="<?php echo $this->_tpl_vars['mission_res']['quote_id']; ?>
" id="quote_id" />
<input type="hidden" name="mid" value="<?php echo $this->_tpl_vars['mid']; ?>
" id="mid" />
<input type="hidden" name="category" value="<?php echo $this->_tpl_vars['mission_res']['category']; ?>
" id="" />
<input type="hidden" name="internalcost" value="" id="internalcost" />
<input type="hidden" name="reqaction" value="<?php echo $this->_tpl_vars['reqaction']; ?>
" id="reqaction" />
<input type="hidden" name="cmid" value="<?php echo $this->_tpl_vars['cmid']; ?>
" id="" />
<input type="hidden" name="sales_suggested_missions" value="<?php echo $this->_tpl_vars['mission_res']['sales_suggested_missions']; ?>
" id="sales_suggested_missions" />
<input type="hidden" name="cid" value="<?php echo $this->_tpl_vars['cid']; ?>
" id="" />
<div class="row-fluid topset2" style="padding-bottom: 10px;">
	<div class="span12 row-centered" style="text-align:center">
	<button class="btn" value="cancel" name="cancel" type="button" data-dismiss="modal">Cancel</button>
	<button class="btn btn-primary" value="add" name="add" type="submit"><i	style="margin-right:5px" class="icon-ok icon-white"></i><?php if ($this->_tpl_vars['reqaction'] == 'edit'): ?>Update<?php else: ?>Add<?php endif; ?> Mission</button>
	</div>
</div>
</form>
<div class="clearfix"></div>
<?php echo '
<script>
var volume_error = true;
var language_error = true;

/* to check is Translation and Source language are different */
function checklanguage(){
		if($("#product_1").val()=="translation")
		{
			$(this).closest(".span4").find(".alert-danger").remove();
			if($("#language_1").val()==$("#languagedest_1").val())
			{
				$(this).closest(".span4").append("<div class=\'alert-danger\' style=\'padding:0 5px;\'>Merci de s&eacute;lectionner une langue diff&eacute;rente de la langue m&egrave;re</div>");
				$("#product_"+current_index+"_chzn .chzn-single").focus();
				language_error = false;	
			}
			else
				language_error = true;
		}
		else
			language_error = true;
}

function oneshotVolume()
{
	
	if($(".oneshot:checked").val()=="no")
	{
	duration_missionval=$(\'#mission_length\').val();
	totalvolumeval=$(\'#volume\').val();
	volumeMax=$(\'#volume_max\').val();
	tempotype=$(\'#tempo_type\').val();
	deleveryvolumeoption=$(\'#delivery_volume_option\').val();
	tempoLength=$(\'#tempo_length\').val();
	tempoLengthoption=$(\'#tempo_length_option\').val();
	durationknow=$(\'#duration_dont_know\').is(":checked");
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
		 if(durationknow==false){
			caltotval=Math.round(duration_missionval/tempo_callenth) * volumeMax;
			}else{
				caltotval=  tempo_callenth *volumeMax;
			}
		//alert(caltotval+\' vol \'+totalvolumeval)
			if(caltotval!=totalvolumeval){
				$(this).find(\'.span9\').after("<div class=\'alert-danger span7 offset3\' style=\'padding:0 5px;\'>Le tempo indiqu&#233; ne correspond pas au volume et &#224; la  dur&#233;e de la mission</div>");
					$("#volume_max").focus();
					volume_error = false;						
			}else
				volume_error = true;	
	}
	else
		volume_error = true;
}

function changemargin()
{
	var packval = $("#package").val();
	if(packval=="team")
	$("#margin_percentage").val(\'50.00\');
	else if(packval=="link")
	$("#margin_percentage").val(\'30.00\');
	else if(packval=="lead")
	$("#margin_percentage").val(\'60.00\');
	else
	$("#margin_percentage").val(\'0\');
}

function calteamca()
{
	$("#team_fee_ca").text((parseFloat($("#team_packs").val())*parseFloat($("#team_fee").val())).toFixed(2));
}
	/* chosen */
	$("[id^=product_]").chosen({ allow_single_deselect: false,disable_search: true});
	$("[id^=producttype_]").chosen({ allow_single_deselect: false,disable_search: true});	
	$("[id^=language_]").chosen({ allow_single_deselect: false,search_contains: true});
	$("#staff_time_option").chosen({ allow_single_deselect: false,search_contains: true});
	
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
	
	$(\'.oneshot\').live(\'ifClicked\', function (event) {	
		var value=this.value;
		if(value==\'no\')
			$("#tempo_details").show();
		else	
			$("#tempo_details").hide();
	});
	
	
	$(\'#quote_mission input\').iCheck({
		checkboxClass: \'icheckbox_square-blue\',
		radioClass: \'iradio_square-blue\'		
	});

	$(\'.dont_know\').live(\'ifChecked\', function (event) {
		var id=this.id.split("_");		
		var index=id[3];		
		$("#mission_duration_details_"+index).hide();
	});
	
	$(\'.dont_know\').live(\'ifUnchecked\', function (event) {
		var id=this.id.split("_");
		var index=id[3];		
		$("#mission_duration_details_"+index).show();
	});
	
	$(".box_title").text($("#product_1 option:selected").text());
	fnCalTotalCosts();
	
	$(document).ready(function(){
		$("#addmission").validationEngine({prettySelect : true,useSuffix: "_chzn",onValidationComplete: function(form, status){
				if(status == true)
				{
					checklanguage();
					oneshotVolume();
					if(language_error && volume_error)
						return true;
				}
		}}); 
		
		$(\'[name=free_mission]\').live(\'ifClicked\', function (event) {	
			if(this.value=="yes")
			{
				$("#mission_turnover").val(\'0\');
				$("#mission_turnover_text").html("0");
			}
			else
			{
				var internalcost=parseFloat($("#writer_cost").val().replace(",","."))+parseFloat($("#corrector_cost").val().replace(",","."));
				var volume= parseFloat($("#volume").val().replace(",","."));
				margin_percentage = parseFloat($("#margin_percentage").val().replace(",","."));
				var unit_price=(internalcost/(1-margin_percentage/100));
				var turnover =(volume*unit_price).toFixed(2);
				var turnover_text=turnover.replace(".",",");
				$("#mission_turnover").val(turnover);
				$("#mission_turnover_text").html("<b>"+turnover_text+"</b>");
			}
		});
		
	});
	
</script>
'; ?>
