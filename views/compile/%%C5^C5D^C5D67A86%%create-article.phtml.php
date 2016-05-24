<?php /* Smarty version 2.6.19, created on 2013-09-19 17:06:07
         compiled from gebo/contract/create-article.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/contract/create-article.phtml', 1, false),)), $this); ?>
<?php echo '<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/jquery.validate.min.js"></script><script type="text/javascript">    $(document).ready(function() {					$(\'#delivery_date\').datepicker({language: \'fr\'});		$("#delivery_list").chosen({ allow_single_deselect: true,search_contains: true});		$("#type_list").chosen({ allow_single_deselect: true,search_contains: true});		$("#category_list").chosen({ allow_single_deselect: true,search_contains: true});						$("#create_article").validate({				onkeyup: false,                    errorClass: \'error\',                    validClass: \'valid\',					messages:{},                    highlight: function(element) {                        $(element).closest(\'div\').addClass("f_error");                                            },                    unhighlight: function(element) {                        $(element).closest(\'div\').removeClass("f_error");                    },                                        errorPlacement: function(error, element) {                                                $(element).closest(\'div\').append(error);                        $(\'.error\').css("font-size", "10px");                        $(\'.error\').css("padding-top", "5px");                    },                    					rules: {						article_name: {								required: true,								minlength: 3								},						client_id:"required",						delivery_id:"required",						type:"required",						category:"required",						delivery_date:"required",						words:"required",						author:"required"					},                                        invalidHandler: function(form, validator) {                        $.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-center", type: "st-error" });                    }		});					});//get client deliveriesfunction  fngetdelivery(clientId){	  if (typeof clientId != "undefined" && clientId!=\'\')	  {			var loader=\'<img src="/BO/theme/gebo/img/ajax_loader.gif">\';			$(\'#delivery_div\').html(loader);			var target_page = "/contract/ajax-get-delivery?clientId="+clientId;			$.get(target_page, function(data){								if(data!=\'NO\')				{					//alert(data);					$(\'#delivery_div\').html(data);					$("#delivery_list").chosen({ allow_single_deselect: true,search_contains: true });										$(\'#submit_div\').show();				}				else				{					$(\'#delivery_div\').html(\'No Deliveries\');					$(\'#submit_div\').hide();				}			});	  }}</script>'; ?>
<!--Bread Crumbs--><nav>	<div id="jCrumbs" class="breadCrumb module">		<ul>			<li>				<a href="/index"><i class="icon-home"></i></a>			</li>			<li>				<a>Boursorama</a>			</li>			<li>				<a href="/contract/article-list?submenuId=ML7-SL2">Article list</a>			</li>				<?php if ($this->_tpl_vars['article_id']): ?>							<li>					Update article				</li>			<?php else: ?>				<li>					Cr&eacute;er article				</li>			<?php endif; ?>		</ul>	</div></nav><div class="row-fluid">	<div class="span12">		<?php if ($this->_tpl_vars['article_id']): ?>			<h3 class="heading">Update article :: <?php echo $this->_tpl_vars['article_name']; ?>
 </h3>		<?php else: ?>			<h3 class="heading">Cr&eacute;er article</h3>		<?php endif; ?>			<div class="row-fluid">			<div class="span3"></div>			<div class="span6">				<form class="stepy-wizzard form-horizontal" action="/contract/save-article?submenuId=ML7-SL3" name="create_article" id="create_article" method="post" enctype="multipart/form-data">					<fieldset>												<div class="sepH_c control-group">							<label for="clients" class="control-label">Client <span class="f_req">*</span></label>							<div class="controls">								<select name="client_id" id="clients" data-placeholder="S&eacute;lectionner client"  onchange="fngetdelivery(this.value)">									<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['client_array'],'selected' => $this->_tpl_vars['clientid']), $this);?>
								</select>							</div>						</div>						<div class="sepH_c control-group">							<label for="delivery_list" class="control-label">Delivery  <span class="f_req">*</span></label>							<div class="controls" id="delivery_div">								<select name="delivery_id" id="delivery_list" data-placeholder="S&eacute;lectionner delivery">									<option value=''></option>									<?php echo $this->_tpl_vars['delivery_list']; ?>
								</select>							</div>						</div>						<div class="sepH_c control-group">							<label for="article_name" class="control-label">Titre de l'article  <span class="f_req">*</span></label>							<div class="controls">								<input type="text" name="article_name" id="article_name" value="<?php echo $this->_tpl_vars['article_name']; ?>
" />							</div>						</div>						<div class="sepH_c control-group">							<label for="type_list" class="control-label">Type de l'article <span class="f_req">*</span></label>							<div class="controls">								<select name="type" id="type_list" data-placeholder="S&eacute;lectionner Type">									<option value=''></option>									<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_type_list'],'selected' => $this->_tpl_vars['type']), $this);?>
								</select>							</div>						</div>										<div class="sepH_c control-group">							<label for="category_list" class="control-label">Category <span class="f_req">*</span></label>							<div class="controls">								<select name="category" id="category_list" data-placeholder="S&eacute;lectionner category">									<option value=''></option>									<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_categories_list'],'selected' => $this->_tpl_vars['category']), $this);?>
								</select>							</div>						</div>						<div class="sepH_c control-group">							<label for="delivery_date" class="control-label">Date de livraison <span class="f_req">*</span></label>							<div class="controls">								<input type="text" id="delivery_date" name="delivery_date" readonly data-date-format="dd-mm-yyyy" value="<?php echo $this->_tpl_vars['delivery_date']; ?>
"/>							</div>						</div>							<div class="sepH_c control-group">							<label for="words" class="control-label">Nombre de signes demand&eacute;s <span class="f_req">*</span></label>							<div class="controls">								<input type="text" name="words" id="words" value="<?php echo $this->_tpl_vars['words']; ?>
" />							</div>						</div>						<div class="sepH_c control-group">							<label for="author" class="control-label">Author  <span class="f_req">*</span></label>							<div class="controls">								<input type="text" name="author" id="author" value="<?php echo $this->_tpl_vars['author']; ?>
" />							</div>						</div>						<div class="sepH_c control-group">							<label for="upload_article" class="control-label">Upload Article </label>							<div class="controls">								<div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">									<span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" name="upload_article" id="upload_article"/></span>									<span class="fileupload-preview"></span>									<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>									<?php if ($this->_tpl_vars['article_path']): ?><a href="/contract/download-file?type=article&aid=<?php echo $this->_tpl_vars['article_id']; ?>
">Download</a><?php endif; ?>								</div>															</div>						</div>						<div class="sepH_c control-group">														<div class="controls" id="submit_div">								<button type="submit" class="btn btn-gebo"><?php if ($this->_tpl_vars['article_id']): ?>Update<?php else: ?>Cr&eacute;er<?php endif; ?></button>							</div>						</div>					</fieldset>					<?php if ($this->_tpl_vars['article_id']): ?>						<input type="hidden" name="article_id" value="<?php echo $this->_tpl_vars['article_id']; ?>
">					<?php endif; ?>				</form>			</div>		</div>	</div></div>		