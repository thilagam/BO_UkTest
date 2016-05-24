<?php /* Smarty version 2.6.19, created on 2015-12-18 13:20:19
         compiled from gebo/followup/stencils.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/followup/stencils.phtml', 27, false),array('modifier', 'cat', 'gebo/followup/stencils.phtml', 90, false),array('modifier', 'explode', 'gebo/followup/stencils.phtml', 96, false),array('modifier', 'in_array', 'gebo/followup/stencils.phtml', 101, false),array('modifier', 'htmlentities', 'gebo/followup/stencils.phtml', 118, false),)), $this); ?>
<?php echo '
<style>
#searchform
{
	margin: 0;
}
.multiselect-container > li > a { white-space: normal; }
</style>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/validation-engine/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="/BO/theme/gebo/lib/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css"/>
<script src="/BO/theme/gebo/lib/bootstrap-multiselect/bootstrap-multiselect.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/BO/theme/gebo/js/ZeroClipboard/ZeroClipboard.js"></script>
'; ?>


<div class="row-fluid">
	<div class="span12">
    	<h1 class="heading pull-left">Stencils</h1>
	</div>
</div>	
<form action=<?php echo $_SERVER['REQUEST_URI']; ?>
 method="post" id="searchform" name="searchform" >		
	<div class="well clearfix" id="search_block">
				<div class="row-fluid">
					<span class="span2">
						<select name="language" class="span12 customselect validate[required]" id="language" data-placeholder="Language" onchange="loadMissions();">
							<option value=""></option>
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['languages_array'],'selected' => $this->_tpl_vars['language_selected']), $this);?>

						</select>	
					</span>
					<span class="span2">
						<select name="category" onchange="loadcategory()"   class="span12 catselect themes validate[required]" id="category" data-placeholder="Category">
							<option value=""></option>
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['sthemes'],'selected' => $this->_tpl_vars['stheme_selected']), $this);?>

						</select>	
					</span>
					<span class="span2">
						<select id="category_variation" onchange="loadtokens(true)" multiple class="category span12 validate[required]" name="category_variation[]" data-placeholder="Category Variation">
						<?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
							<option value="<?php echo $this->_tpl_vars['category']['cat_id']; ?>
" <?php if (in_array ( $this->_tpl_vars['category']['cat_id'] , $this->_tpl_vars['cat_selected'] )): ?>
							selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['category']['category_name']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
						</select>	
					</span>					
					<span class="span2">
						<select id="tokens" class="span12" multiple name="tokens[]" data-placeholder="Tokens" onchange="loadMissions();">
						<?php $_from = $this->_tpl_vars['tokens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['token']):
?>
							<option value="<?php echo $this->_tpl_vars['token']['token_id']; ?>
" <?php if (in_array ( $this->_tpl_vars['token']['token_id'] , $this->_tpl_vars['tokens_selected'] )): ?>
							selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['token']['token_name']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
						</select>	
					</span>
					<span class="span3">
						<select id="missions" class="span12" multiple name="missions[]" data-placeholder="Missions">
							<?php $_from = $this->_tpl_vars['missions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['missionitem']):
?>
								<option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if (in_array ( $this->_tpl_vars['key'] , $this->_tpl_vars['mission'] )): ?>
								selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['missionitem']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?> 
						</select>	
					</span>
					<span class="span1">
						<button class="btn btn-danger pull-center submit" id="search"  name="search" type="submit" value="search">Search</button>
					</span>
				</div>
	</div>
	<?php if ($this->_tpl_vars['stencils'] || $this->_tpl_vars['stheme_selected']): ?>
		
	<div class="row-fluid">
	<table class="table table-bordered slide" id="stenciltable">
		<thead>
			<tr>
				<th></th>
				<th>Token Name</th>
				<th>Token Code</th>
				<th>Variation</th>
				<th>Category</th>
				<th>Stencils with token replace</th>
				<th>Hidden tokens</th>
				<th>Type</th>
				<th>Final stencil with condition and titles</th>
			</tr>
		</thead>
		<tbody>
			<?php $_from = $this->_tpl_vars['stencils']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['stencils'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['stencils']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['stencil']):
        $this->_foreach['stencils']['iteration']++;
?>
			<tr>
				<?php if ($this->_tpl_vars['stencil']['found']): ?>
				<td>
				<input type="checkbox" name="validstencil[<?php echo $this->_tpl_vars['stencil']['token_id']; ?>
]" checked="checked" class="validstencil" value="<?php echo $this->_tpl_vars['stencil']['id']; ?>
" />
				<div>[<?php echo $this->_tpl_vars['stencil']['used_count']; ?>
]</div>
				</td>
				<td><?php echo $this->_tpl_vars['stencil']['token_name']; ?>
<?php $this->assign('stoken_cond', ((is_array($_tmp=$this->_tpl_vars['stencil']['token_name'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_CONDITION') : smarty_modifier_cat($_tmp, '_CONDITION'))); ?></td>
				<td><?php echo $this->_tpl_vars['stencil']['token_code']; ?>
</td>
				<td><?php echo $this->_tpl_vars['stencil']['category_name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['stencil']['theme_name']; ?>
</td>
				<td class="token_replaced"><?php echo $this->_tpl_vars['stencil']['token_replace']; ?>
</td>
				<td>
				<?php $this->assign('splittokens', ((is_array($_tmp=$this->_tpl_vars['stencil']['token_condition'])) ? $this->_run_mod_handler('explode', true, $_tmp, "##") : smarty_modifier_explode($_tmp, "##"))); ?>
					<select id="" class="hidden_select" name="" onchange="applyhiddentoken(this,'hiddentoken')" data-placeholder="Hidden Tokens" disabled="disabled">
						<option value=""></option>
						<?php $_from = $this->_tpl_vars['hidden_tokens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['htoken']):
?>
							<option value="<?php echo $this->_tpl_vars['htoken']['token_code']; ?>
" rel="<?php echo $this->_tpl_vars['htoken']['token_id']; ?>
"
								<?php if (( $this->_tpl_vars['stoken_cond'] == $this->_tpl_vars['htoken']['token_name'] ) || ( ((is_array($_tmp=$this->_tpl_vars['htoken']['token_name'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['splittokens']) : in_array($_tmp, $this->_tpl_vars['splittokens'])) )): ?>
								selected="selected"
								<?php endif; ?>
							><?php echo $this->_tpl_vars['htoken']['token_name']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</td>
				<td class="htype">
				<select name="type[]" class="typeselect" onchange="applyhiddentoken(this,'htype')"  style="width:80px">
					<option value="b">Title</option>
					<option value="p" selected>Para</option>
				</select>
				</td>
				<td class="hidden_replaced">
									"<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<p>')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['stencil']['token_replace']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['stencil']['token_replace'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</p>') : smarty_modifier_cat($_tmp, '</p>')))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>
"
								</td>
				<?php else: ?>
				<td></td>
				<td><?php echo $this->_tpl_vars['stencil']['token']['token_name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['stencil']['token']['token_code']; ?>
</td>
				<td><?php echo $this->_tpl_vars['stencil']['token']['category_name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['stencil']['token']['theme_name']; ?>
</td>
				<td colspan="4">No Stencils Found</td>
				<?php endif; ?>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
		</tbody>
	</table>
	<div class="row-fluid topset2">
		<div class="span12 pull-right" style="text-align:right">
			<a class="lessdetails" style="display:none">Hide Stencils Details</a>
			<a class="moredetails">Show Stencils Details</a>
		</div>
	</div>
	<div class="row-fluid topset2">
	<div class="span12 pull-center">
		<button class="btn btn-primary topset2" type="button" onclick="generateFinalStencil()">Generate Stencil Code</button>
	</div>
	<h3 class="row-fluid topset2">Short Desc</h3>
	<div class="row-fluid">
		<input type="text" name="short_desc" value="<?php echo $this->_tpl_vars['short_desc']; ?>
" id="short_desc" class="span8" readonly="readonly" />
	</div>
	<div class="row-fluid" style="margin:0">
		<button class="btn btn-primary topset2" type="button" id="short_copy" name="short_copy" value=	"short_copy" style="">Copy</button>
	</div>
	<h3 class="row-fluid topset2">Code</h3>
	<textarea class="span12 topset2" readonly id="finalstencil" style="display:none;min-height:200px"></textarea>
	</div>
	<div class="row-fluid topset2">
		<div class="span12 pull-center">
					<button class="btn btn-danger topset2" id="lock" type="button" value="lock">Lock</button>
			<button class="btn btn-primary topset2" type="button" id="candvalidate" name="candvalidate" value="candvalidate" style="display:none">Copy and Validate</button>
			<button class="btn btn-info topset2 submit" value="search" name="showother" type="submit">Show other stencils randomly</button>
		</div>
	</div>
	</div>	
	<?php endif; ?>
	<input type="hidden" name="cat_desc" id="cat_desc" value="<?php echo $this->_tpl_vars['cat_desc']; ?>
" />
</form>
<?php echo '
    <script type="text/javascript">
	//function copystencils()
	//{
      var client = new ZeroClipboard($(\'#candvalidate\'));

      client.on(\'ready\',function(event) {
        // console.log( \'movie is loaded\' );

        client.on( \'copy\', function(event) {
          event.clipboardData.setData(\'text/plain\', $("#finalstencil").val());
        } );

        client.on( \'aftercopy\', function(event) {
          console.log(\'Copied text to clipboard: \' + event.data[\'text/plain\']);
        } );
      } );

      client.on( \'error\', function(event) {
        // console.log( \'ZeroClipboard error of type "\' + event.name + \'": \' + event.message );
        ZeroClipboard.destroy();
      } );
	  
	  var short_desc = new ZeroClipboard($(\'#short_copy\'));

      short_desc.on(\'ready\',function(event) {
        // console.log( \'movie is loaded\' );

        short_desc.on( \'copy\', function(event) {
          event.clipboardData.setData(\'text/plain\', $("#short_desc").val());
        } );

        short_desc.on( \'aftercopy\', function(event) {
          console.log(\'Copied text to clipboard: \' + event.data[\'text/plain\']);
        } );
      } );

      short_desc.on( \'error\', function(event) {
        // console.log( \'ZeroClipboard error of type "\' + event.name + \'": \' + event.message );
        ZeroClipboard.destroy();
      } );
	//}
    </script>
'; ?>

<?php echo '
<script>
var validstencils;
var validtokens;
var hiddenids;
var titletype;
var final_stencils;
var validateStencils = true;
var copval='; ?>
"<?php echo $this->_tpl_vars['copval']; ?>
"<?php echo ';
$(document).ready(function(){
	$(".customselect").chosen({ allow_single_deselect: true,search_contains: true});
	$(".catselect").chosen({ search_contains: true});
	$(".typeselect, .hidden_select").chosen({ allow_single_deselect: true,disable_search: true});
	$("#tokens").multiselect({
				includeSelectAllOption: true,
				nonSelectedText:\'Select Tokens\',
				numberDisplayed: 1,
				buttonWidth:\'200px\',
				maxHeight: 200,
				enableCaseInsensitiveFiltering: true
			});
	$("#category_variation").multiselect({
				includeSelectAllOption: true,
				nonSelectedText:\'Category Variation\',
				numberDisplayed: 1,
				buttonWidth:\'200px\',
				maxHeight: 200,
				enableCaseInsensitiveFiltering: true,
				onChange: function(option, checked, select) {
					//loadtokens(true);
				}
			});
	$("#missions").multiselect({
				includeSelectAllOption: true,
				nonSelectedText:\'Missions\',
				numberDisplayed: 1,
				buttonWidth:\'300px\',
				maxHeight: 200,
				enableCaseInsensitiveFiltering: true,
				onChange: function(option, checked, select) {
					//loadtokens(true);
				}
			});
	$("#searchform").validationEngine({prettySelect : true,useSuffix: "_chzn",onValidationComplete: function(form, status){
			if(status == true)
			{
				$(".submit").text("Please wait loading stencils");
				return true;
			}
	}});
	
	$("#lock").click(function(e){
			if(validstencils.length)
			{
				smoke.confirm("Are you sure want to lock this stencils?",function(e){
					if(e)
					{
						$.sticky("Locked stencils successfully", {autoclose : 5000, position: "top-center", type: "st-success" });
						$.post("/followup/lockstencils/",{"sids":validstencils},function(success){
							
						});
					}
				});
			}
			else
			{
				smoke.alert("Please select stencils");
			}
	})
	
	validstencils = $(\'.validstencil:checkbox:checked\').map(function (i,e) {
				  return this.value;
			}).get();
	validtokens = $(\'.validstencil:checkbox:checked\').map(function (i,e) {
				  str = $(e).attr("name");
				  return str.substring(13,str.indexOf("]"));;
			}).get();
			
	$(".validstencil").click(function(){
	validstencils = $(\'.validstencil:checkbox:checked\').map(function (i,e) {
			  return this.value;
			}).get();
			
	if(validstencils.length==0)
		$("#candvalidate, #finalstencil").hide();
	
	validtokens = $(\'.validstencil:checkbox:checked\').map(function (i,e) {
				  str = $(e).attr("name");
				  return str.substring(13,str.indexOf("]"));;
			}).get();
			
	});
	
	if(copval)
	{
		$.sticky("Copied and validated stencil successfully", {autoclose : 5000, position: "top-center", type: "st-success" });
	}
	var begintoken;
	$("#stenciltable tbody tr").each(function(){
		if($(this).find(".validstencil").prop("checked"))
		{
			begintoken = false;
			htype = $(this).find(".typeselect").val();
			hidden_value = $(this).find(".hidden_select").val();
			token_replaced_content = token_replaced_content_org =  $.trim($(this).find(".token_replaced").text());
			if(token_replaced_content.charAt(0)=="\'" || token_replaced_content.charAt(0)==\'"\')
			{
				token_replaced_content = token_replaced_content.substr(3);
				begintoken = true;
			}
			console.log(token_replaced_content+" "+htype+" "+hidden_value);
			if(hidden_value)
			{
				token_replaced_content = token_replaced_content.replace(/"/g, "\'");
				token_replaced_content_org = token_replaced_content_org.replace(/"/g, "\'");
				$(this).find(".token_replaced").text(token_replaced_content_org);
				if(!begintoken)
				hidden_replaced_content = \'"<\'+htype+">${if("+hidden_value+"){\'"+token_replaced_content+"\'}else{\'\'}}</"+htype+\'>"\';
				else
				hidden_replaced_content = \'"<\'+htype+">${if("+hidden_value+"){"+token_replaced_content+"\'}else{\'\'}}</"+htype+\'>"\';
				$(this).find(".hidden_replaced").text(hidden_replaced_content);
			}
		}
	});
	
	$(document).on(\'click\',\'.moredetails\',function(){
			$(this).hide();
			$(".lessdetails").show();
			$(".slide").slideDown();
		});
		
	$(document).on(\'click\',\'.lessdetails\',function(){
		$(this).hide();
		$(".moredetails").show();
		$(".slide").slideUp();
	});
	
	if($("#category").val())
	generateFinalStencil();
});

function loadcategory()
{
	var theme_id = $(".themes").val();
	$.post(\'/quotedelivery/get-category/\',{"theme_id":theme_id},function(json){
		$(".category").html("");
		//$(".category").append($("<option></option>").val(\'\').text(""));
		for(var key in json) 
		{
			 $(".category").append($("<option></option>").attr("selected","selected").val(json[key].cat_id).html(json[key].category_name));
		}
		$("#category_variation").multiselect(\'rebuild\');
		loadtokens(true);
	},\'json\');
}

function loadtokens(status)
{
	var cat_id = $("#category_variation").val();
	if(cat_id)
	{
		var matokens = "";
		var oatokens = "";
		var hatokens = "";
		var selected = false;
		$.post(\'/quotedelivery/get-tokens\',{"cat_ids":cat_id,\'all\':true},function(json){
				$("#tokens").html("");
				//json = $.trim(json);
				for(var key in json) 
				{
					if(json[key].token_type=="mandatory")
					 $("#tokens").append($("<option></option>").attr("selected","selected").val(json[key].token_id).html(json[key].token_name));
				}
			$(\'#tokens\').multiselect(\'rebuild\');
			loadMissions();
			},\'json\');
	}
	else
	{
		$("#tokens").html("");
		$(\'#tokens\').multiselect(\'rebuild\');
	}
}

function loadMissions()
{
	var token_ids = $("#tokens").val();
	var language=$("#language").val();
	if(token_ids)
	{
		$.post(\'/followup/load-stencil-missions/\',{"token_ids":token_ids,\'all\':true,"cat_variation":$("#category_variation").val(),"language":language},function(json){
				$("#missions").html("");
				//json = $.trim(json);
				for(var key in json) 
				{
					//console.log(key)
					$("#missions").append($("<option></option>").attr("selected","selected").val(key).html(json[key]));
				}
			$(\'#missions\').multiselect(\'rebuild\');
			},\'json\');
	}
	else
	{
		$("#missions").html("");
		$(\'#missions\').multiselect(\'rebuild\');
	}
}

function applyhiddentoken(current,type)
{
	$("#candvalidate, #finalstencil").hide();
	var ctd = $(current).closest("td");
	if(type=="htype")
	{
		var htype = $(current).val();
		var hidden_value = ctd.prev().find(".hidden_select").val();
	}
	else
	{
		var hidden_value = $(current).val();
		var htype = ctd.next().find(".typeselect").val();
	}
	var token_replaced_content = ctd.siblings(".token_replaced").text();
	if(hidden_value)
	{
	var hidden_replaced_content = \'"<\'+htype+">${if("+hidden_value+"){\'"+token_replaced_content+"\'}else{\'\'}}</"+htype+\'>"\';
	}
	else
	var hidden_replaced_content = \'"<\'+htype+">"+token_replaced_content+"</"+htype+\'>"\';
	//if(htype && hidden_value)
	ctd.siblings(".hidden_replaced").text(hidden_replaced_content);
	/* else
	ctd.siblings(".hidden_replaced").text(\'\'); */
}

function generateFinalStencil()
{ 
	if(validstencils.length)
	{
		var final_stencil = [];
		hiddenids = [];
		titletype = [];
		final_stencils = [];
		var htype = "";
		var token_replace = "";
		$("#stenciltable tbody tr").each(function(){
			if($(this).find(".validstencil").prop("checked"))
			{
				htype = $(this).find(".typeselect").val();
				if(hidden_stencil = $(this).find(".hidden_replaced").text())
				{
					final_stencil.push($.trim(hidden_stencil));
				}
				else
				{
					token_replace = $(this).find(".token_replaced").text();
					final_stencil.push($.trim(\'"<\'+htype+\'>\'+token_replace+\'</\'+htype+\'>"\'));
				}
				hiddentoken = $(this).find(".hidden_select option:selected").attr("rel");
				if(hiddentoken)
				hiddenids.push(hiddentoken);
				else
				hiddenids.push(0);
				titletype.push(htype);
			}
		});
		final_stencils = final_stencil;
		final_content = final_stencil.join("+");
		var cat_desc = $.trim($("#cat_desc").val());
		if(cat_desc)
		final_content = $.trim(\'"<b>\'+cat_desc+\'</b>"+\') + final_content;
		$("#finalstencil").text(final_content);
		$("#candvalidate, #finalstencil").show();
	}
	else
	{
		smoke.alert("Please select stencils");
	}
}

$("#candvalidate").click(function(){
	if(validateStencils)
	{
		smoke.confirm("Are you sure want to copy and validate stencils?",function(e){
		if(e)
		{
			validateStencils = false;
			$.post("/followup/validate-stencils",{"validstencil":validstencils,"validtokens":validtokens,"hiddenids":hiddenids,"titletype":titletype,"final_stencils":final_stencils},function(success){});
			$.sticky("Copied and validated stencils successfully", {autoclose : 5000, position: "top-center", type: "st-success" });
		}
		});
	}
	else
	{
		$.sticky("Copied stencils successfully", {autoclose : 5000, position: "top-center", type: "st-success" });
	}
}); 
</script>
'; ?>