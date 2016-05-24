<?php /* Smarty version 2.6.19, created on 2016-03-18 07:43:56
         compiled from gebo/ao/ao-create2lot.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/ao/ao-create2lot.phtml', 259, false),array('function', 'html_options', 'gebo/ao/ao-create2lot.phtml', 301, false),)), $this); ?>
<?php echo '

<script type="text/javascript" >

$(document).ready(function() { 

	$(".favcontribcheck").multiselect();  

    $(".favcontribcheck").multiselectfilter();

	$(".contrib_lang").multiselect();

	$(".contrib_lang").multiselectfilter();

	$(".singleselect").chosen({ disable_search: true  });

	$(".submission").chosen({disable_search: true });

	$(\'#loadvals\').focus(function() {

		if($(\'#loadvals\').val() =="Ins&eacute;rer les titres de chaque article ici en revenant &agrave; la ligne &agrave; chaque fois") 

		  this.value = "";

	});

	//$("div[id^=\'uploadexcel_\']").each(function()
	$("#uploadexcel").click(function()
	{
		
		var btnUpload=$(\'#uploadexcel\');
		
		new AjaxUpload(btnUpload, {
			action: \'uploadartxls\',
			name: \'excelfile\',
			onSubmit: function(file, ext){  
				if (! (ext && /^(xls|xlsx)$/.test(ext))){
					// extension is not allowed
					alert(\'Only xls file type allowed\');
					return false;
				}
			},

			onComplete: function(file, response){//alert(response);
				var titles=response.split("@@");
				var lotcount=$("#TotArt").val();
		
					var t=0;
		
					for(l=1;l<=lotcount;l++)
					{
						var artcount=$("#editcounter_"+l).val();
						for(a=1;a<=artcount;a++)
						{
							$("#subtitle_"+(l-1)+"_"+a).val(titles[t]);
							t++;
						}
					}
				/*for(var i=0;i<titles.length;i=i+1){
						$("#subtitle_"+index+"_"+i).val(titles[i]);
					}*/
				} 
		});
	});

});

	

	function updatecontriblistarticle(index)

	{

		var cat=$("#contrib_cat_"+index).val();

		var lang=$("select#contrib_lang_"+index).val();

		

		$.ajax({

			  type: \'GET\',

			  url: \'/ao/updatecontriblistarticle\',

			  data: \'&category=\'+cat+\'&language=\'+lang+\'&index=\'+index,

			  

			  success: function(data)

			  {

				$(\'#contribs_\'+index).html(data);

				$(".favcontribcheck").multiselect();

				$(".favcontribcheck").multiselectfilter();

			  }

		  });

	}
	
	function addfield(num)
	{
		var counter = $("#editcounter_"+num).val();
	
		if(counter=="")
			counter = 1;
	
		if (counter > 10) {
			alert("Only 10 textboxes allowed");
			return false;  
		}
		
		counter++;
		num1=num-1;
		$(\'<div/>\',{\'id\':\'ArticleBoxDiv\' + counter}) 
		.append(\'Article \'+counter+\' : \') 
		.append( $(\'<input type="text" name="subtitle[\'+num1+\'][]" id="subtitle_\'+num1+\'_\'+counter+\'">\') ) 
		.appendTo( \'#ArticleBoxesGroup_\'+num)       
		if(counter>1)
			$("#removebutton_"+num).show();
		
		$("#editcounter_"+num).val(counter);
	}
	
	function removefield(num)  
	{
		var counter = $("#editcounter_"+num).val();
		
		if (counter==1) {
			alert("Minimum 1 article required");
			return false;  
		}
		$("#ArticleBoxDiv"+counter).hide();
		counter--
		$("#editcounter_"+num).val(counter);
	}


	function validateloadlot()
	{  
		n=document.getElementById(\'loadvals\').value.replace(/\\n/gi,\'<br />\');
		
		var strArray = n.split("<br />");
		strArray =removeEmptyElem(strArray);
		var lotcount=$("#TotArt").val();
		
		var s=0;
		//for(i=0;i<strArray.length;i++)
		//{
			//document.getElementById(\'art_title_\'+(i+1)).value=strArray[i];
			for(l=1;l<=lotcount;l++)
			{
				var artcount=$("#editcounter_"+l).val();
				for(a=1;a<=artcount;a++)
				{
					$("#subtitle_"+(l-1)+"_"+a).val(strArray[s]);
					s++;
				}
			}
			
		//}
	}
	


</script>

<style>

	input, textarea {text-transform:none !important;}

</style>

'; ?>


<form action="/ao/ao-create3?submenuId=ML2-SL3" name="creation_step2" id="creation_step2" method="POST" enctype="multipart/form-data" >

	<div class="row-fluid">

  		<div class="span12"> 

    		<h3 class="heading">Cr&eacute;ation d'un appel d'offres

				<span align="right"> 

					<img src="/BO/theme/gebo/img/path-2.png" width="120" height="35" border="0" usemap="#Map" style="float:right;" />

					<map name="Map" id="Map">

					<?php if ($this->_tpl_vars['nav_1'] == 1): ?>

						<area shape="circle" coords="18,18,17" href="/ao/ao-create1?submenuId=ML2-SL3"/>

					<?php endif; ?>

					<?php if ($this->_tpl_vars['nav_3'] == 1): ?>

						<area shape="circle" coords="102,17,18" href="/ao/ao-create3?submenuId=ML2-SL3"/>

					<?php endif; ?>

					</map>

				</span>

			</h3>			

			 
			<div id="contribsalert" style="color:#FF0000;padding-top:25px;"></div>	  	

			<table align="center" cellpadding="8" cellspacing="5" width="100%" >
				<tr>
					<td><strong>Modifier les titres de mes articles avec le formulaire</strong></td>
				</tr>
				<tr>
					<td>
						<span style="text-transform:none !important;">Insérez le titre de chacun de vos articles dans le champ ci-dessous en allant à la ligne à chaque fois puis cliquez<br> sur "Valider", ou bien télécharger le modèle excel en <a href="/BO/download_excelformat.php">cliquant ici</a>, et uploadez-le une fois complété.</span><br>
					</td>
				</tr>
				<tr>
					<td>
						<table>	
							<tr>   
								<td>
									<textarea name="loadvals" id="loadvals" style="width: 500px; height: 100px; margin-bottom: 10px;"></textarea>
								</td>
								<td>
									<div id="uploadexcel">
										<span class="btn btn-file btn-warning">
											<span class="fileupload-new">Upload...</span>
											<input type="file" name="file" id="file"  class=""  /> 
										</span>
										
									</div><br><br>
									<button type="button" class="btn btn-warning" value="Load" onclick="validateloadlot();" style="vertical-align:bottom !important;margin-bottom: 12px;">Valider</button> 
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<?php unset($this->_sections['article_loop']);
$this->_sections['article_loop']['name'] = 'article_loop';
$this->_sections['article_loop']['loop'] = is_array($_loop=$this->_tpl_vars['totalart']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['article_loop']['show'] = true;
$this->_sections['article_loop']['max'] = $this->_sections['article_loop']['loop'];
$this->_sections['article_loop']['step'] = 1;
$this->_sections['article_loop']['start'] = $this->_sections['article_loop']['step'] > 0 ? 0 : $this->_sections['article_loop']['loop']-1;
if ($this->_sections['article_loop']['show']) {
    $this->_sections['article_loop']['total'] = $this->_sections['article_loop']['loop'];
    if ($this->_sections['article_loop']['total'] == 0)
        $this->_sections['article_loop']['show'] = false;
} else
    $this->_sections['article_loop']['total'] = 0;
if ($this->_sections['article_loop']['show']):

            for ($this->_sections['article_loop']['index'] = $this->_sections['article_loop']['start'], $this->_sections['article_loop']['iteration'] = 1;
                 $this->_sections['article_loop']['iteration'] <= $this->_sections['article_loop']['total'];
                 $this->_sections['article_loop']['index'] += $this->_sections['article_loop']['step'], $this->_sections['article_loop']['iteration']++):
$this->_sections['article_loop']['rownum'] = $this->_sections['article_loop']['iteration'];
$this->_sections['article_loop']['index_prev'] = $this->_sections['article_loop']['index'] - $this->_sections['article_loop']['step'];
$this->_sections['article_loop']['index_next'] = $this->_sections['article_loop']['index'] + $this->_sections['article_loop']['step'];
$this->_sections['article_loop']['first']      = ($this->_sections['article_loop']['iteration'] == 1);
$this->_sections['article_loop']['last']       = ($this->_sections['article_loop']['iteration'] == $this->_sections['article_loop']['total']);
?>  
				<tr> 
					<td style="font-weight:bold;">  
						<span style="text-transform:none !important;vertical-align:top"><?php echo $this->_tpl_vars['clientname']; ?>
 -</span>&nbsp; 
						<span style="text-transform:uppercase;vertical-align:top"><?php echo $this->_tpl_vars['language'][$this->_sections['article_loop']['index']]; ?>
 -</span>&nbsp;    
						<select  class="singleselect" name="wtype[]" style="text-transform:none !important;width:120px;">
							<option value="Rédaction" <?php if ($this->_tpl_vars['wtype'][$this->_sections['article_loop']['index']] == "R&eacute;daction"): ?>selected<?php endif; ?>>R&eacute;daction</option>
							<option value="Traduction" <?php if ($this->_tpl_vars['wtype'][$this->_sections['article_loop']['index']] == 'Traduction'): ?>selected<?php endif; ?>>Traduction</option>
							<option value="Correction" <?php if ($this->_tpl_vars['wtype'][$this->_sections['article_loop']['index']] == 'Correction'): ?>selected<?php endif; ?>>Correction</option>
						</select>&nbsp;  	
						<span style="text-transform:none !important;vertical-align:top"> - <?php echo $this->_tpl_vars['totalart']; ?>
 article(s) -</span> 
						<?php $this->assign('typeval', $this->_tpl_vars['type'][$this->_sections['article_loop']['index']]); ?>
						<span style="text-transform:none !important;vertical-align:top"> <?php echo ((is_array($_tmp=$this->_tpl_vars['type_array'][$this->_tpl_vars['typeval']])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
 -</span> 	 					
						<span style="text-transform:none !important;vertical-align:top">LOT <?php echo $this->_sections['article_loop']['iteration']; ?>
 -</span>
						<span style="text-transform:none !important;vertical-align:top"><?php echo $this->_tpl_vars['frnow']; ?>
 </span>
					</td>
					<input type="hidden" value="<?php echo $this->_tpl_vars['wtype'][$this->_sections['article_loop']['index']]; ?>
"  id="art_title_<?php echo $this->_sections['article_loop']['iteration']; ?>
" name="art_title[]" />
				</tr>
				
				<tr>
					<td>
						<table id="art_div_<?php echo $this->_sections['article_loop']['iteration']; ?>
" width="90%"  cellspacing="2" cellpadding="0" style=" background-color: #F5D0A9;border: 1px solid rgb(225, 225, 232);">
							<tr>
								<td valign="top" rowspan="11" width="10%" style="padding:10px"> </td>
								<td>&nbsp;</td>
								<td><span id="art_<?php echo $this->_sections['article_loop']['iteration']; ?>
_notice"></span></td>
								<td style="vertical-align:top;"><div class="holder-link-sup"></div></td>
							</tr>
							
							<?php if ($this->_tpl_vars['articletype'] == 'lot'): ?>
							<tr align="center"> 
								<td style="background: rgb(247, 247, 249);padding:15px;border-radius:10px;">
									<div id="ArticleBoxesGroup_<?php echo $this->_sections['article_loop']['iteration']; ?>
">
										<?php $this->assign('loop', 1); ?> 
										<?php while ($this->_tpl_vars['loop'] <= $this->_tpl_vars['sub_article'][$this->_sections['article_loop']['index']]) { ?> 
										<?php $this->assign('loop1', $this->_tpl_vars['loop']-1); ?> 
											<div id="ArticleBoxDiv<?php echo $this->_tpl_vars['loop']; ?>
"> 
												Article <?php echo $this->_tpl_vars['loop']; ?>
: <input type="text" name="subtitle[<?php echo $this->_sections['article_loop']['iteration']-1; ?>
][]" id="subtitle_<?php echo $this->_sections['article_loop']['iteration']-1; ?>
_<?php echo $this->_tpl_vars['loop']; ?>
" value="<?php echo $this->_tpl_vars['subtitle'][$this->_sections['article_loop']['index']][$this->_tpl_vars['loop1']]; ?>
" />
											</div>
											<?php $this->assign('loop', $this->_tpl_vars['loop']+1); ?> 	
										<?php } ?>  
										<input type="hidden" name="editcounter_<?php echo $this->_sections['article_loop']['iteration']; ?>
" id="editcounter_<?php echo $this->_sections['article_loop']['iteration']; ?>
" value="<?php echo $this->_tpl_vars['sub_article'][$this->_sections['article_loop']['index']]; ?>
"/>
									</div>
									<div style="float:right">
										<a href="javascript:void(0);" class="hint--bottom hint--info" data-hint="Add Option" onClick="addfield(<?php echo $this->_sections['article_loop']['iteration']; ?>
);"><i class="splashy-add"></i></a>&nbsp;
										<a href="javascript:void(0);" id="removebutton_<?php echo $this->_sections['article_loop']['iteration']; ?>
" <?php if ($this->_tpl_vars['sub_article'][$this->_sections['article_loop']['index']] == 1): ?>style="display:none;"<?php endif; ?> class="hint--bottom hint--info" data-hint="Remove Option" onClick="removefield(<?php echo $this->_sections['article_loop']['iteration']; ?>
);"><i class="splashy-remove"></i></a>
									</div>
								</td>
							</tr>
						
							<?php endif; ?>
							
							<tr> 
								<td>Langue</td>
								<td><?php echo smarty_function_html_options(array('name' => "language[]",'options' => $this->_tpl_vars['language_array'],'selected' => $this->_tpl_vars['language'][$this->_sections['article_loop']['index']],'class' => 'singleselect'), $this);?>
</td>
							</tr>
							<tr>
								<td>Type</td>
								<td><?php echo smarty_function_html_options(array('name' => "type[]",'options' => ((is_array($_tmp=$this->_tpl_vars['type_array'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)),'selected' => $this->_tpl_vars['type'][$this->_sections['article_loop']['index']],'class' => 'singleselect'), $this);?>
</td> 
							</tr>
							<tr>
								<td>Cat&eacute;gorie</td>
								<td><?php echo smarty_function_html_options(array('name' => "category[]",'options' => $this->_tpl_vars['category_array'],'selected' => $this->_tpl_vars['category'][$this->_sections['article_loop']['index']],'class' => 'singleselect'), $this);?>
</td>
							</tr>
							<tr>
								<td>Nombre de</td> 
								<td nowrap>
									<?php echo smarty_function_html_options(array('name' => "signtype[]",'selected' => $this->_tpl_vars['sign_type'][$this->_sections['article_loop']['index']],'options' => $this->_tpl_vars['signtype_array'],'class' => 'singleselect'), $this);?>

									<span style="vertical-align:top"><input type="text" value="<?php echo $this->_tpl_vars['num_min'][$this->_sections['article_loop']['index']]; ?>
" id="num_min_<?php echo $this->_sections['article_loop']['iteration']; ?>
" name="num_min[]" style="width:40px;"/></span>
									<span style="vertical-align:top"><input type="text" value="<?php echo $this->_tpl_vars['num_max'][$this->_sections['article_loop']['index']]; ?>
" id="num_max_<?php echo $this->_sections['article_loop']['iteration']; ?>
" name="num_max[]" style="width:40px;"/></span>
								</td>
							</tr>
							<tr <?php if ($this->_tpl_vars['aotype'] != 'private'): ?>style="display:none;"<?php endif; ?>>
								<td>Langue(s)</td>
								<td> 
									<select name="contrib_lang[<?php echo $this->_sections['article_loop']['iteration']-1; ?>
][]" class="contrib_lang" id="contrib_lang_<?php echo $this->_sections['article_loop']['iteration']; ?>
" onChange="updatecontriblistarticle('<?php echo $this->_sections['article_loop']['iteration']; ?>
');" multiple="multiple" style="width:250px;">
										<?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
											<?php if (in_array ( $this->_tpl_vars['langkey'] , $this->_tpl_vars['contrib_lang'][$this->_sections['article_loop']['index']] )): ?>
												<option value="<?php echo $this->_tpl_vars['langkey']; ?>
" selected><?php echo $this->_tpl_vars['langitem']; ?>
</option>
											<?php else: ?>
												<option value="<?php echo $this->_tpl_vars['langkey']; ?>
"><?php echo $this->_tpl_vars['langitem']; ?>
</option>
											<?php endif; ?>
										<?php endforeach; endif; unset($_from); ?>
									</select>
								</td>
							</tr>
							<tr <?php if ($this->_tpl_vars['aotype'] != 'private'): ?>style="display:none;"<?php endif; ?>>  
								<td>Catégorie(s)</td>
								<td>
									<select name="contrib_cat[<?php echo $this->_sections['article_loop']['iteration']-1; ?>
]" id="contrib_cat_<?php echo $this->_sections['article_loop']['iteration']; ?>
" class="singleselect" onChange="updatecontriblistarticle('<?php echo $this->_sections['article_loop']['iteration']; ?>
');">
										<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['Contrib_cats'],'selected' => $this->_tpl_vars['contrib_cat'][$this->_sections['article_loop']['index']]), $this);?>
 
									</select>
								</td>
							</tr>
							<tr <?php if ($this->_tpl_vars['aotype'] != 'private'): ?>style="display:none;"<?php endif; ?> >
								<td >Contributeurs</td>
								<td id="contribs_<?php echo $this->_sections['article_loop']['iteration']; ?>
">
									<select multiple="multiple" name="favcontribcheck[<?php echo $this->_sections['article_loop']['iteration']-1; ?>
][]" class="favcontribcheck" id="favcontribcheck_<?php echo $this->_sections['article_loop']['iteration']; ?>
">
									<?php $_from = $this->_tpl_vars['contriblistall1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contrib']):
?>
										<?php if (in_array ( $this->_tpl_vars['contrib']['identifier'] , $this->_tpl_vars['contrib_array'][$this->_sections['article_loop']['index']] )): ?>
										<option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
" selected><?php echo $this->_tpl_vars['contrib']['name']; ?>
</option>
										<?php else: ?>
										<option value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
"><?php echo $this->_tpl_vars['contrib']['name']; ?>
</option>
										<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?>
									</select>
									<div id="contriberr_<?php echo $this->_sections['article_loop']['iteration']; ?>
" style="color:red;"></div>
								</td>
							</tr>
							<tr <?php if ($this->_tpl_vars['aotype'] != 'private' && $this->_tpl_vars['mission_type'] == 'liberte'): ?>style="display:none;"<?php endif; ?>>
								<td>Fourchette de prix du redacteur</td>
								<td style="padding-top:10px">
									<span><input type="text" value="<?php echo $this->_tpl_vars['price_min'][$this->_sections['article_loop']['index']]; ?>
" id="price_min_<?php echo $this->_sections['article_loop']['iteration']; ?>
" name="price_min[]" style="width:40px;"/></span>
									<span><input type="text" value="<?php echo $this->_tpl_vars['price_max'][$this->_sections['article_loop']['index']]; ?>
" id="price_max_<?php echo $this->_sections['article_loop']['iteration']; ?>
" name="price_max[]" style="width:40px;"/></span>
								</td>
							</tr>
							<tr <?php if ($this->_tpl_vars['correction'] == ""): ?>style="display:none;"<?php endif; ?>>
								<td>Fourchette de prix du correcteur</td>
								<td style="padding-top:10px">
									<span><input type="text" value="<?php echo $this->_tpl_vars['correction_pricemin'][$this->_sections['article_loop']['index']]; ?>
" id="correction_pricemin_<?php echo $this->_sections['article_loop']['iteration']; ?>
" name="correction_pricemin[]" style="width:40px;"/></span>
									<span><input type="text" value="<?php echo $this->_tpl_vars['correction_pricemax'][$this->_sections['article_loop']['index']]; ?>
" id="correction_pricemax_<?php echo $this->_sections['article_loop']['iteration']; ?>
" name="correction_pricemax[]" style="width:40px;"/></span>
								</td>
							</tr>					
							<tr> 
								<td>Reversement contributeur par article en %</td>
								<td><span><input type="text" name="contrib_percentage[]" id="contrib_percentage_<?php echo $this->_sections['article_loop']['iteration']; ?>
" value="<?php echo $this->_tpl_vars['contrib_percentage'][$this->_sections['article_loop']['index']]; ?>
" style="width:40px;"/></span>&nbsp;%</td>
							</tr>
							<tr>
								<td>Time rendering Article</td>
								<td>
									<span style="vertical-align:top;">JC0 <input type="text" name="subjunior_time[]" id="subjunior_time_<?php echo $this->_sections['article_loop']['iteration']; ?>
" style="width:40px;" value="<?php echo $this->_tpl_vars['subjunior_time'][$this->_sections['article_loop']['index']]; ?>
" maxlength="3" /></span>
									<span style="vertical-align:top;">JC <input type="text" name="junior_time[]" id="junior_time_<?php echo $this->_sections['article_loop']['iteration']; ?>
" style="width:40px;" value="<?php echo $this->_tpl_vars['junior_time'][$this->_sections['article_loop']['index']]; ?>
" maxlength="3" /></span>&nbsp;
									<span style="vertical-align:top;">SC <input type="text" name="senior_time[]" id="senior_time_<?php echo $this->_sections['article_loop']['iteration']; ?>
" style="width:40px;" value="<?php echo $this->_tpl_vars['senior_time'][$this->_sections['article_loop']['index']]; ?>
"  maxlength="3"/></span>&nbsp; 
									<select name="submit_option[]" id="submit_option_<?php echo $this->_sections['article_loop']['iteration']; ?>
" style="width:90px" class="submission">
										<option value="min" <?php if ($this->_tpl_vars['submit_option'][$this->_sections['article_loop']['index']] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>
										<option value="hour" <?php if ($this->_tpl_vars['submit_option'][$this->_sections['article_loop']['index']] == 'hour' || $this->_tpl_vars['submit_option'] == ""): ?>selected<?php endif; ?>>Hour(s)</option>
										<option value="day" <?php if ($this->_tpl_vars['submit_option'][$this->_sections['article_loop']['index']] == 'day'): ?>selected<?php endif; ?>>Day(s)</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Time after rejection is</td> 
								<td>
									<span style="vertical-align:top;">JC0 <input type="text" name="jc0_resubmission[]" id="jc0_resubmission_<?php echo $this->_sections['article_loop']['iteration']; ?>
" style="width:40px;" value="<?php echo $this->_tpl_vars['jc0_resubmission'][$this->_sections['article_loop']['index']]; ?>
"  maxlength="3"/></span>
									<span style="vertical-align:top;">JC <input type="text" name="jc_resubmission[]" id="jc_resubmission_<?php echo $this->_sections['article_loop']['iteration']; ?>
" style="width:40px;" value="<?php echo $this->_tpl_vars['jc_resubmission'][$this->_sections['article_loop']['index']]; ?>
"  maxlength="3" /></span>&nbsp;
									<span style="vertical-align:top;">SC <input type="text" name="sc_resubmission[]" id="sc_resubmission_<?php echo $this->_sections['article_loop']['iteration']; ?>
" style="width:40px;" value="<?php echo $this->_tpl_vars['sc_resubmission'][$this->_sections['article_loop']['index']]; ?>
"  maxlength="3"/></span>&nbsp;
									<select name="resubmit_option[]" id="resubmit_option_<?php echo $this->_sections['article_loop']['iteration']; ?>
" style="width:90px" class="submission">
										<option value="min" <?php if ($this->_tpl_vars['resubmit_option'][$this->_sections['article_loop']['index']] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>
										<option value="hour" <?php if ($this->_tpl_vars['resubmit_option'][$this->_sections['article_loop']['index']] == 'hour' || $this->_tpl_vars['resubmit_option'] == ""): ?>selected<?php endif; ?>>Hour(s)</option>
										<option value="day" <?php if ($this->_tpl_vars['resubmit_option'][$this->_sections['article_loop']['index']] == 'day'): ?>selected<?php endif; ?>>Day(s)</option>
									</select>
								</td>
							</tr>
							<?php if ($this->_tpl_vars['whitelist'] == 'on'): ?>
							<tr>
								<td>White list kws</td>
								<td>
									<select name="white_list_kw_count[]" id="white_list_kw_count_<?php echo $this->_sections['article_loop']['iteration']; ?>
" onchange="wblkws(<?php echo $this->_sections['article_loop']['iteration']; ?>
, 'white');">
										<option value="">s&#233;lectionner</option>
										<?php $this->assign('i', 0); ?>
										<?php while ($this->_tpl_vars['i'] < 100) { ?>
										<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
										<option value="<?php echo $this->_tpl_vars['i']; ?>
" <?php if ($this->_tpl_vars['wl_kw_count'][$this->_sections['article_loop']['index']] == $this->_tpl_vars['i']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['i']; ?>
</option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td id="whiteKws<?php echo $this->_sections['article_loop']['iteration']; ?>
">
									<?php if ($this->_tpl_vars['wl_kw_count'][$this->_sections['article_loop']['index']] > 0): ?>
										<?php $this->assign('i', 0); ?>
										<?php while ($this->_tpl_vars['i'] < $this->_tpl_vars['wl_kw_count'][$this->_sections['article_loop']['index']]) { ?>
											<input type="text" value="<?php echo $this->_tpl_vars['wl_kws'][$this->_sections['article_loop']['index']][$this->_tpl_vars['i']]; ?>
" id="white_list_<?php echo $this->_sections['article_loop']['iteration']; ?>
[]" name="white_list_<?php echo $this->_sections['article_loop']['iteration']; ?>
[]" placeholder="Keyword">&nbsp;
											<input type="text" style="width:40px;" value="<?php echo $this->_tpl_vars['wl_kw_density_min'][$this->_sections['article_loop']['index']][$this->_tpl_vars['i']]; ?>
" id="white_list_density_min_<?php echo $this->_sections['article_loop']['iteration']; ?>
[]" name="white_list_density_min_<?php echo $this->_sections['article_loop']['iteration']; ?>
[]" placeholder="Min">&nbsp;
											<input type="text" style="width:40px;" value="<?php echo $this->_tpl_vars['wl_kw_density_max'][$this->_sections['article_loop']['index']][$this->_tpl_vars['i']]; ?>
" id="white_list_density_max_<?php echo $this->_sections['article_loop']['iteration']; ?>
[]" name="white_list_density_max_<?php echo $this->_sections['article_loop']['iteration']; ?>
[]" placeholder="Max"><br>
											<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
										<?php } ?>
								   <?php endif; ?>
								</td>
							</tr>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['blacklist'] == 'on'): ?>
							<tr>
								<td>Black list kws</td>
								<td>
									<select name="black_list_kw_count[]" id="black_list_kw_count_<?php echo $this->_sections['article_loop']['iteration']; ?>
" onchange="wblkws(<?php echo $this->_sections['article_loop']['iteration']; ?>
, 'black');">
										<option value="">s&#233;lectionner</option>
										<?php $this->assign('i', 0); ?>
										<?php while ($this->_tpl_vars['i'] < 100) { ?>
										<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
										<option value="<?php echo $this->_tpl_vars['i']; ?>
" <?php if ($this->_tpl_vars['bl_kw_count'][$this->_sections['article_loop']['index']] == $this->_tpl_vars['i']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['i']; ?>
</option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td id="blackKws<?php echo $this->_sections['article_loop']['iteration']; ?>
">
								   <?php if ($this->_tpl_vars['bl_kw_count'][$this->_sections['article_loop']['index']] > 0): ?>
										<?php $this->assign('i', 0); ?>
										<?php while ($this->_tpl_vars['i'] < $this->_tpl_vars['bl_kw_count'][$this->_sections['article_loop']['index']]) { ?>
											<input type="text" size="20" value="<?php echo $this->_tpl_vars['bl_kws'][$this->_sections['article_loop']['index']][$this->_tpl_vars['i']]; ?>
" id="black_list_<?php echo $this->_sections['article_loop']['iteration']; ?>
[]" name="black_list_<?php echo $this->_sections['article_loop']['iteration']; ?>
[]" placeholder="Keyword">&nbsp;
											<br>
											<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
										<?php } ?>
								   <?php endif; ?>
								</td>
							</tr>
							<?php endif; ?>
							<!-- column for xls/xlsx article --->
							<tr>  
								<td style="vertical-align:top">Columns for XLS/XLSX Article (add comma(,) <br>seperated for multiple)</td>
								<td>
								  <textarea name="column_xls[<?php echo $this->_sections['article_loop']['index']; ?>
]" id="column_xls_<?php echo $this->_sections['article_loop']['iteration']; ?>
"><?php echo $this->_tpl_vars['column_xls'][$this->_sections['article_loop']['index']]; ?>
</textarea>
								</td>
							</tr>		
						</table>
					<td> 
				</tr>
				<tr><td>&nbsp;</td></tr>
				<?php endfor; endif; ?>
			</table>
		</div>
       <input type="hidden" name="editcounter" id="editcounter" value="<?php echo $this->_tpl_vars['sub_article']; ?>
"/>
		<div style="float:right;padding:30px;padding-right:130px">
			<button type="submit" value="Aller en Etape 3" class="btn btn-info" id="aoSubmit" onClick="return validate_aocreation_step2();">Aller en Etape 3</button>
		</div>
	</div>

	<input type="hidden" name="deli_id" id="deli_id" value="<?php echo $this->_tpl_vars['deliver_id']; ?>
" />
	<input type="hidden" id="aotype" name="aotype" value="<?php echo $this->_tpl_vars['aotype']; ?>
" />
	<input type="hidden" id="correction" name="correction" value="<?php echo $this->_tpl_vars['correction']; ?>
" />
	<input type="hidden" name="TotArt" id="TotArt" value="<?php echo $this->_tpl_vars['totalart']; ?>
" />
	<input type="hidden" name="missiontype" id="missiontype" value="<?php echo $this->_tpl_vars['mission_type']; ?>
" />
</form>		

					
