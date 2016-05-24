<?php /* Smarty version 2.6.19, created on 2016-04-11 08:45:29
         compiled from gebo/ebookers/managelist.phtml */ ?>

<?php echo '
<script type="text/javascript" >
    /*NOTE: DO NOT DELETE FUNCTIN(few functions are defined here and called from formpopup.phtml file) */
    function update_managelist(id,type){
        var flag=true;
        $(".error_msg").hide();// hide all the error msg before validation
        if(type == \'themes\'){
            if($("#theme_name").val().length <= 1 ) {
                smoke.alert("Please enter theme name");
                flag = false;
            }
            else if( $("#theme_no").val().length < 1  ){
                smoke.alert("Please enter the number between 1 to 100");
                flag = false;
            }
            else{
                for(j=0;j<$("#theme_no").val();j++) {
                    if($("#theme_lang_"+j).val() == \'\') {
                        $("#theme_lang_error_" + j).show();
                        smoke.alert("Please select the langauge");
                        flag = false;
                    }
                }
            }
        }
        if(type == \'category\'){
            if($("#cat_themes_id").val() == \'\'){
                smoke.alert("Please select Theme");
                flag = false;
            }
            else if($("#category_name").val().length <= 1 ) {
                smoke.alert("Please enter category name");
                flag = false;
            }
        }
        if(type == \'tokens\'){
            var count = $("#no_tokens").val();
            console.log("#tokens_category_id = ");
            console.log($("#tokens_category_id").val());

            if($("#tokens_themes_id").val() == \'\'){
                smoke.alert("Please select themes");
                flag = false;
            }
            else if($("#tokens_category_id").val() == \'\' || $("#tokens_category_id").val() === null){
                smoke.alert("Please select category");
                flag = false;
            }
            else if(count < 1 || count == \'\'){
                smoke.alert("Please enter token names by entering tokens");
                flag = false;
            }
            else {
                for (i = 0; i < count; i++) {
                    if ($("#token_name_" + i).val().length <= 1) {
                        smoke.alert("Please enter token names");
                        flag = false;
                        break;
                    }
                }
            }
        }
        if(type == \'sample_text\'){
            if($("#sample_text_themes_id").val() == \'\'){
                smoke.alert("Please select themes");
                flag = false;
            }
            else if($("#sample_text_category_id").val() == \'\' || $("#sample_text_category_id").val() === null){
                smoke.alert("Please select category");
                flag = false;
            }
            else if($("#no_sample_text").val() == \'\' ) {
                smoke.alert("Please enter number of sample text");
                flag = false;
            }
            else if($("#sample_text_token_id").val() == \'\' || $("#sample_text_token_id").val() === null) {
                smoke.alert("Please select Token");
                flag = false;
            }
            else{
                for (i = 0; i < $("#no_sample_text").val(); i++) {
                    if ($("#sample_text_description_" + i).val().length <= 1) {
                        smoke.alert("Please enter all the sample text description");
                        flag = false;
                        break;
                    }
                }
            }
        }
        if(flag) {
            console.log("ajax initialed id =" + id);
            var ajax_url = "/ebookers/update-managelist?";
            var form_data = "&submit=" + id + "&" + $("#" + id).closest(\'form\').serialize();
            console.log(ajax_url + form_data);
            $.ajax({
                type: \'POST\',
                url: ajax_url + form_data,
                success: function (data) {
                    console.log(data);
                    console.log("ajax terminated");
                    load_datatable(type);
                    smoke.alert("Created Successfully");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                    smoke.alert("Updated Unsuccessfully,Ajax call error");
                }
            });
        }
    }
    //load themes/category/tokens/ssampletet into datatable//
    function load_datatable(type){
        if(type == \'themes\') {
            $(\'#themes_edit_table\').dataTable().fnDestroy();
            $(\'#themes_edit_table\').dataTable({
                "sAjaxSource": "/ebookers/load-datatable?datatable=themes",
                "aoColumns": [
                    {mData: \'sl_no\'},
                    {mData: \'theme_name\'},
                    {mData: \'description\'},
                    {mData: \'action\'}
                ],
                "fnDrawCallback":callback
            });
        }
        else if(type == \'category\') {
            $(\'#category_edit_table\').dataTable().fnDestroy();
            $(\'#category_edit_table\').dataTable({
                "sAjaxSource": "/ebookers/load-datatable?datatable=category",
                "aoColumns": [
                    {mData: \'sl_no\'},
                    {mData: \'category_name\'},
                    {mData: \'description\'},
                    {mData: \'theme_name\'},
                    {mData: \'action\'}
                ],
                "fnDrawCallback":callback
            });
        }
        else if(type == \'tokens\') {
            $(\'#tokens_edit_table\').dataTable().fnDestroy();
            $(\'#tokens_edit_table\').dataTable({
                "sAjaxSource": "/ebookers/load-datatable?datatable=tokens",
                "aoColumns": [
                    {mData: \'sl_no\'},
                    {mData: \'token_name\'},
                    {mData: \'token_code\'},
                    {mData: \'token_type\'},
                    {mData: \'description\'},
                    {mData: \'category_name\'},
                    {mData: \'theme_name\'},
                    {mData: \'action\'}
                ],
                "fnDrawCallback":callback
            });
        }
        else if(type == \'sample_text\') {
            $(\'#sample_text_edit_table\').dataTable().fnDestroy();
            $(\'#sample_text_edit_table\').dataTable({
                "sAjaxSource": "/ebookers/load-datatable?datatable=sample_text",
                "aoColumns": [
                    {mData: \'sl_no\'},
                    {mData: \'description\'},
                    {mData: \'token_name\'},
                    {mData: \'language\'},
                    {mData: \'category_name\'},
                    {mData: \'theme_name\'},
                    {mData: \'action\'}
                ],
                "fnDrawCallback":callback
            });
        }
        $(".tab-pane").removeClass(\'active\');
        $("#"+type+"_edit").addClass(\'active\');
        $(".dropdown-menu li").removeClass(\'active\');
        $("input,textarea").val(\'\');
    }
    function callback() {
        $(".table").css("width","100%");
    }

    function view_edit_list(id,type){
        var ajax_url = "/ebookers/view-edit-list?&id="+id+"&type="+type;
        $.ajax({
            type: \'POST\',
            url: ajax_url,
            success:function(data){
                console.log(data);
                $("#editModal .modal-body").html(data);
            }
        });

    }
    function delete_list(id,type){
        smoke.confirm(
            "Are you sure you want to delete?",
            function(e){
                if(e){
                    console.log("ajax initialed id ="+id);
                    var ajax_url = "/ebookers/delete-list?&id="+id+"&type="+type;
                    $.ajax({
                        type: \'POST\',
                        url: ajax_url,
                        success:function(data){
                            console.log(data);
                            console.log("ajax terminated");
                            load_datatable(type);
                        }
                    });
                }
            }
        );
    }
    //function to validate token name duplication in database//
    function validate_token(value,type,error_id,val_id) {
        var ajax_url = "/ebookers/validate?&value="+value+"&type="+type+"&tokens_themes_id="+$("#tokens_themes_id").val()+"&tokens_category_id="+$("#tokens_category_id").val();
        console.log(ajax_url);
        $("#" + error_id).hide();
        $("#" + type + "_submit").attr(\'disabled\', false);
        $.ajax({
            type: \'POST\',
            url: ajax_url,
            success:function(data){
                console.log(data);
                if($.trim(data) == 1) {
                    $("#" + error_id).show();
                    $("#" + type + "_submit").attr(\'disabled\',true);
                }
                else{
                        for(j=0;j<$("#no_tokens").val();j++) {
                            if (val_id != j) {
                                console.log(val_id +\'!=\'+ j);
                                if (value == $("#token_name_" + j).val()) {
                                    //console.log(value + "=" + $("#token_name_" + j).val());
                                    $("#" + error_id).show();
                                    $("#" + type + "_submit").attr(\'disabled\',true);
                                    break;
                                }
                                else if($.trim(data) == 0) {
                                    $("#" + error_id).hide();
                                    $("#" + type + "_submit").attr(\'disabled\', false);
                                }
                            }
                        }

                }

            }
        });
    }
    function validate_lang(value,type,error_id,val_id) {
                    $(".error_msg").hide();
                    for(j=0;j<$("#theme_no").val();j++) {
                        if (val_id != j) {
                            console.log(val_id +\'!=\'+ j);
                            if (value == $("#theme_lang_" + j).val()) {
                                console.log(error_id);
                                $("#" + error_id).show();
                                $("#" + type + "_submit").attr(\'disabled\',true);
                                break;
                            }
                            else{
                                $("#" + type + "_submit").attr(\'disabled\',false);
                            }
                        }
                    }
    }
    function cat_validate_lang(value,type,error_id,val_id) {
        console.log(value+" "+type);
        $(".error_msg").hide();
        for(j=0;j<$("#"+type+"_no").val();j++) {
            if (val_id != j) {
                console.log(val_id +\'!=\'+ j);
                if (value == $("#"+type+"_lang_" + j).val()) {
                    console.log("#" + type + "_submit");
                    $("#" + error_id).show();
                    $("#" + type + "_submit").attr(\'disabled\',true);
                    break;
                }
                else{
                    $("#" + type + "_submit").attr(\'disabled\',false);
                }
            }
        }
    }
    function edit_validate_lang(value,type,error_id,val_id) {
        console.log(value+" "+val_id);
                    for(j=0;j<$("#edit_theme_no").val();j++) {
                        if (val_id != j) {
                            if (value == $("#language_" + j).val()) {

                                console.log(value +"=="+ $("#language_" + j).val()+"/n "+error_id);
                                $("#" + error_id).show();
                                $("#save_theme_lang_" + val_id).val(\'0\');
                                break;
                            }
                            else{
                                $("#" + error_id).hide();
                                $("#save_theme_lang_" + val_id).val(\'1\');
                            }
                        }
                    }
    }
    /* *** added on 16.12.2015 *** */
    function CT_edit_validate_lang(value,type,error_id,val_id) {
        console.log(value+" "+val_id);
                    for(j=0;j<$("#edit_category_no").val();j++) {
                        if (val_id != j) {
                            if (value == $("#language_" + j).val()) {

                                console.log(value +"=="+ $("#language_" + j).val()+"/n "+error_id);
                                $("#" + error_id).show();
                                $("#save_category_lang_" + val_id).val(\'0\');
                                break;
                            }
                            else{
                                $("#" + error_id).hide();
                                $("#save_category_lang_" + val_id).val(\'1\');
                            }
                        }
                    }
    }
    //function to validate theme name/category name duplication in database//
    function validate(value,type,error_id){
        if((type == \'themes\'))
            var ajax_url = "/ebookers/validate?&value="+value+"&type="+type;
        else if(type == \'category\')
            var ajax_url = "/ebookers/validate?&value="+value+"&type="+type+"&cat_themes_id="+$("#cat_themes_id").val();
        console.log(ajax_url);
       $.ajax({
            type: \'POST\',
            url: ajax_url,
            success:function(data){
                console.log(data);
                    if($.trim(data) == 1) {
                        $("#" + error_id).show();
                        $("#" + type + "_submit").attr(\'disabled\',true);
                    }
                    else {
                        $("#" + error_id).hide();
                        $("#" + type + "_submit").attr(\'disabled\',false);
                    }

            }
        });
    }
    //dynamically adding token form based on the number of tokens entered by the user//
    function add_tokens() {
        var val = $("#no_tokens").val();
        var token_div =
        \'<table class="table table-bordered table-striped" width="100%" cellspacing="10" cellpadding="10">\' +
            \'<tr>\' +
                \'<th>\' +
                    \'<label>Token Name<span class="danger">*</span></label>\'+
                \'</th>\' +
                \'<th>\' +
                    \'<label>Token code</label>\'+
                \'<th>\' +
                    \'<label>Description(If any)</label>\'+
                \'</th>\' +
                \'<th>\' +
                    \'<label>Token Type</label>\'+
                \'</th>\' +
            \'</tr>\';
        for (i = 0; i < val; i++){
            var token_name_ = ($("#token_name_" + i).val() != undefined ) ? $("#token_name_" + i).val() : \'\';
            var token_code_ = ($("#token_code_" + i).val() != undefined ) ? $("#token_code_" + i).val() : \'\';
            var description_ = ($("#description_" + i).val() != undefined ) ? $("#description_" + i).val() : \'\';
            token_div +=
                    \'<tr>\'+
                        \'<td valign="top">\'+
                            \'<input class="form-control form-input" type="text" name="token_name_\'+i+\'" id="token_name_\'+i+\'" value="\'+token_name_+\'"onkeyup="validate_token(this.value,\\\'tokens\\\',\\\'token_error_\'+i+\'\\\',\\\'\'+i+\'\\\')"/>\'+
                            \'<br /><span class="error_msg" id="token_error_\'+i+\'">Already Exist, Error</span>\'+
                        \'</td>\'+
                        \'<td>\'+
                            \'<textarea class="form-control" name="token_code_\'+i+\'" id="token_code_\'+i+\'" >\'+token_code_+\'</textarea>\'+
                        \'</td>\'+
                        \'<td>\'+
                            \'<textarea class="form-control" name="description_\'+i+\'"  id="description_\'+i+\'" >\'+description_+\'</textarea>\'+
                        \'</td>\'+
                        \'<td align="left">\'+
                            \'<label> <input value="mandatory" name="token_type_\'+i+\'" type="radio" checked="checked"> Mandatory</label>\'+
                            \'<label> <input value="optional" name="token_type_\'+i+\'" type="radio" > Optional</label>\'+
                            \'<label> <input value="hidden" name="token_type_\'+i+\'" type="radio" > Hidden</label>\'+
                    \'</td>\'+
                    \'</tr>\';
        }
        token_div += \'</table>\';
        $("#tokens_screen").html(token_div);
    }
    //dynamically adding sample text form based on the number of tokens entered by the user//
    function add_sample_text() {
        var val = $("#no_sample_text").val();
        var sample_text_div =
        \'<table class="table table-bordered table-striped" width="100%" cellspacing="10" cellpadding="10">\' +
            \'<tr>\' +
                \'<th>\' +
                    \'<label>Sample Text Description</label>\' +
                \'</th>\' +
            \'</tr>\';
        for (i = 0; i < val; i++) {
            var description = ($("#sample_text_description_" + i).val() != undefined ) ? $("#sample_text_description_" + i).val() : \'\';
            sample_text_div +=
                \'<tr>\' +
                    \'<td>\' +
                        \'<textarea class="form-control"  style="width:80%" id="sample_text_description_\' + i + \'" name="description_\' + i + \'" >\'+ description +\'</textarea>\' +
                    \'</td>\' +
                \'</tr>\';
        }
        sample_text_div +=\'</table>\';
        $("#sample_text_screen").html(sample_text_div);
    }
    //loading themes slect option and caetgory select option based on al the given conditions//
    function load_options(type){
        console.log("loading opion ajax");
        var ajax_url = "/ebookers/load-themes-option";
        $.ajax({
            type: \'POST\',
            url: ajax_url,
            success:function(data){
                console.log(data);
                $("input[name=themes_id]").empty().append(data);
                $("#tokens_themes_id").empty().append(data);
                $("#sample_text_themes_id").empty().append(data);
                if(type==\'cat\') {
                    $("#cat_themes_id_div").html(\'<label>Select Category<span class="danger">*</span></label>\'+
                    \'<select id="cat_themes_id" multiple="multiple" name="themes_id[]">\'+
                    \'</select>\');
                    $("#cat_themes_id").empty().append(data);
                    $("#" + type + "_themes_id").multiselect();
                    $("#" + type + "_themes_id").multiselectfilter();
                }
            }
        });
    }
    function load_category(theme_id,type){
        var ajax_url = "/ebookers/load-category-option?&theme_id="+theme_id+"&type="+type;
        $.ajax({
            type: \'POST\',
            url: ajax_url,
            success:function(data){
                console.log(data);
                if(type == "tokens") {
                    $("#" + type + "_category_id_div").html(\'<label>Select Categorized Token<span class="danger">*</span></label>\' +
                    \'<select id="\' + type + \'_category_id" multiple="multiple" name="category_id[]" ></select>\');
                    $("#" + type + "_category_id").empty().append(data);
                    $("#edit_" + type + "_category_id").empty().append(data);
                    $("#" + type + "_category_id").multiselect();
                    $("#" + type + "_category_id").multiselectfilter();
                }
                else if(type=="sample_text"){
                    $("#" + type + "_category_id_div").html(\'<label>Select Categorized Token<span class="danger">*</span></label>\' +
                    \'<select id="\' + type + \'_category_id" name="category_id[]" onchange="load_tokens(this.id)"></select>\');
                    $("#" + type + "_category_id").empty().append(data);
                    $("#edit_" + type + "_category_id").empty().append(data);
                }
            }
        });
    }

    function load_tokens(cat_id){
        var type= "sample_text";
        var ajax_url = "/ebookers/load-tokens-option?&cat_id="+$(\'#\'+cat_id).val();
        console.log(ajax_url);
        $.ajax({
            type: \'POST\',
            url: ajax_url,
            success:function(data){
                console.log(data);
                $("#" + type + "_token_id_div").html(\'<label>Select Token<span class="danger">*</span></label>\' +
                \'<select id="\' + type + \'_token_id" multiple="multiple" name="token_id[]" ></select>\');
                $("#" + type + "_token_id").empty().append(data);
                $("#edit_" + type + "_token_id").empty().append(data);
                $("#" + type + "_token_id").multiselect();
                $("#" + type + "_token_id").multiselectfilter();
            }
        });
    }
    function loadImportform(){
        $("#editModal").html(\'<form></form>\');
    }
    $( document).ready(function(){
        load_datatable(\'category\');
//        load_datatable(\'tokens\');
//        load_datatable(\'sample_text\');
//        load_datatable(\'themes\');//call this function at last to avoid showing of other above list//
        $(".modal").hide();

    });
    /* *** added on 16.12.2015 *** */
    //functio to add CT based on the input(number) given by the user//

    function add_category(){
        var lang_select = \'<option value="" >Select</option>\';
        '; ?>

            <?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
                <?php echo ' lang_select += \'<option value="'; ?>
<?php echo $this->_tpl_vars['langkey']; ?>
<?php echo '" >'; ?>
<?php echo $this->_tpl_vars['langitem']; ?>
<?php echo '</option>\';'; ?>

            <?php endforeach; endif; unset($_from); ?>
        <?php echo '
        var val = $("#category_no").val()
        var category_div =
            \'<table class="table table-bordered table-striped" width="100%" cellspacing="10" cellpadding="10">\' +
            \'<tr>\' +
                \'<th>\' +
                \'<label>Langauge<span class="danger">*</span></label>\'+
                \'</th>\' +
                \'<th>\' +
                \'<label>Title<!--Description(If any)--></label>\'+
                \'</th>\' +
                \'<th>\' +
                \'<label>Title Condtiiton</label>\'+
                \'</th>\' +
            \'</tr>\';
        for (i = 0; i < val; i++){
            //var token_name_ = ($("#token_name_" + i).val() != undefined ) ? $("#token_name_" + i).val() : \'\';
            //var token_code_ = ($("#token_code_" + i).val() != undefined ) ? $("#token_code_" + i).val() : \'\';
            //var description_ = ($("#description_" + i).val() != undefined ) ? $("#description_" + i).val() : \'\';
            category_div +=
                \'<tr>\'+
                    \'<td valign="top">\'+
                    \'<select id="category_lang_\'+i+\'" name="category_langauge[]" onchange="cat_validate_lang(this.value,\\\'category\\\',\\\'category_lang_error_\'+i+\'\\\',\\\'\'+i+\'\\\')">\'+lang_select+\'</select>\'+
                    \'<br /><span class="error_msg" id="category_lang_error_\'+i+\'">Already Exist, Error</span>\'+
                    \'</td>\'+
                    \'<td>\'+
                    \'<textarea class="form-control" name="CT_description[]"></textarea>\'+
                    \'</td>\'+
                    \'<td>\'+
                    \'<textarea class="form-control" name="CT_title_condition[]"></textarea>\'+
                    \'</td>\'+
                \'</tr>\';
        }
        category_div += \'</table>\';
        $("#category_screen").html(category_div);
    }
    function add_themes(){
        var lang_select = \'<option value="" >Select</option>\';
        '; ?>

            <?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
                <?php echo ' lang_select += \'<option value="'; ?>
<?php echo $this->_tpl_vars['langkey']; ?>
<?php echo '" >'; ?>
<?php echo $this->_tpl_vars['langitem']; ?>
<?php echo '</option>\';'; ?>

            <?php endforeach; endif; unset($_from); ?>
        <?php echo '
        var val = $("#theme_no").val()
        var themes_div =
            \'<table class="table table-bordered table-striped" width="100%" cellspacing="10" cellpadding="10">\' +
            \'<tr>\' +
                \'<th>\' +
                \'<label>Langauge<span class="danger">*</span></label>\'+
                \'</th>\' +
                \'<th>\' +
                \'<label>Title<!--Description(If any)--></label>\'+
                \'</th>\' +
                \'<th>\' +
                \'<label>Title Condtiiton</label>\'+
                \'</th>\' +
            \'</tr>\';
        for (i = 0; i < val; i++){
            //var token_name_ = ($("#token_name_" + i).val() != undefined ) ? $("#token_name_" + i).val() : \'\';
            //var token_code_ = ($("#token_code_" + i).val() != undefined ) ? $("#token_code_" + i).val() : \'\';
            //var description_ = ($("#description_" + i).val() != undefined ) ? $("#description_" + i).val() : \'\';
            themes_div +=
                \'<tr>\'+
                    \'<td valign="top">\'+
                    \'<select id="theme_lang_\'+i+\'" name="langauge[]" onchange="validate_lang(this.value,\\\'themes\\\',\\\'theme_lang_error_\'+i+\'\\\',\\\'\'+i+\'\\\')">\'+lang_select+\'</select>\'+
                    \'<br /><span class="error_msg" id="theme_lang_error_\'+i+\'">Already Exist, Error</span>\'+
                    \'</td>\'+
                    \'<td>\'+
                    \'<textarea class="form-control" name="description[]"></textarea>\'+
                    \'</td>\'+
                    \'<td>\'+
                    \'<textarea class="form-control" name="title_condition[]"></textarea>\'+
                    \'</td>\'+
                \'</tr>\';
        }
        themes_div += \'</table>\';
        $("#themes_screen").html(themes_div);
    }
</script>

<style>
    .label{font-size: 12px!important; font-weight: bold;}
    .tokens_div{border: 1px dotted #000000;}
    .error_msg{color:#FF0000;display: none;}
    .deleted{color:#FF0000;}
</style>
'; ?>

<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Ebookers Menu Option</h3>
        <div class="tabbable tabbable-bordered">
            <ul class="nav nav-tabs">
                <li class="dropdown active">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a href="#themes_edit" data-toggle="tab" onclick="load_datatable('themes');">List Categories</a></li><li class="divider"></li>
                        <li><a href="#themes" data-toggle="tab">Add Category</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Categorized tokens <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#category_edit" data-toggle="tab" onclick="load_datatable('category');">List categorized tokens</a></li><li class="divider"></li>
                        <li><a href="#category" data-toggle="tab" onclick="load_options('cat');">Add categorized token</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Tokens <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#tokens_edit" data-toggle="tab"  onclick="load_datatable('tokens');">List Tokens</a></li><li class="divider"></li>
                        <li><a href="#tokens" data-toggle="tab" onclick="load_options('tokens');">Add New Tokens</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Sample Text <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#sample_text_edit" data-toggle="tab"  onclick="load_datatable('sample_text');">List Sample Text</a></li><li class="divider"></li>
                        <li><a href="#sample_text" data-toggle="tab" onclick="load_options('sample_text');">Add New Sample Text</a></li>
                    </ul>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="themes">
                    <!-- form to add themes -->
                    <form>
                        <div class="formSep">
                            <label>Category Name<span class="danger">*</span></label>
                            <input class="form-control form-input" type="text" name="theme_name" id="theme_name" onkeyup="validate(this.value,'themes','themes_error')"/>
                            <span class="danger error_msg" id="themes_error">Already Exist, Error</span>
                        </div>
                        <div class="formSep">
                            <label>No. of Category(language).<span class="danger">*</span></label>
                            <input class="form-control form-input" type="text" name="theme_no" id="theme_no"/>
                            <button type="button" class="btn btn-info" id="addthemes" onclick="add_themes();">GO</button>
                            <span class="danger error_msg" id="theme_no_error">Invalid number</span>
                        </div>
                        <div id="themes_screen">
                        </div>
                        <div class="formSep">
                            <button onclick="update_managelist(this.id,'themes');" class="btn btn-info" type="button" id="themes_submit" name="themes_submit">Submit</button>
                        </div>
                    </form>
                    <!-- end of form to add themes -->
                </div>
                <div class="tab-pane active" id="themes_edit">
                    <table id="themes_edit_table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL.NO.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="tab-pane" id="category">
                    <!-- form to add category -->
                    <form>
                        <div class="formSep">

                        </div>
                        <div class="formSep">
                            <div id="cat_themes_id_div">

                            </div>
                        </div>
                        <div class="formSep">
                            <label>Categorized Token Name<span class="danger">*</span></label>
                            <input class="form-control form-input" type="text" name="category_name" id="category_name" onkeyup="validate(this.value,'category','category_error')"/>
                            <span class="danger error_msg" id="category_error">Already Exist, Error</span>
                        </div>
                        <!--<div class="formSep">
                            <label>Conditional Type<span class="danger">*</span></label>
                            <label> <input value="none" name="conditional_type" type="radio" checked="checked"> Mandatory</label>
                            <label> <input value="and" name="conditional_type" type="radio" > Hidden</label>
                            <label> <input value="or" name="conditional_type" type="radio" > Optional</label>
                        </div>-->
                        <!--<div class="formSep">
                            <label>Description(If any)</label>
                            <textarea class="form-control" name="description" ></textarea>
                        </div>-->
                        <div class="formSep">
                            <label>No. of Categorized Token(language).<span class="danger">*</span></label>
                            <input class="form-control form-input" type="text" name="category_no" id="category_no"/>
                            <button type="button" class="btn btn-info" id="addthemes" onclick="add_category();">GO</button>
                            <span class="danger error_msg" id="CT_no_error">Invalid number</span>
                        </div>
                        <div id="category_screen">
                        </div>
                        <div class="formSep">
                            <button onclick="update_managelist(this.id,'category');" class="btn btn-info" type="button" id="category_submit" name="category_submit">Submit</button>
                        </div>
                    </form>
                    <!-- end of form to add themes -->
                </div>
                <div class="tab-pane" id="category_edit">
                    <table id="category_edit_table" class="table table-bordered table-striped" style="width:100% !important;">
                        <thead>
                        <tr>
                            <th>SL.NO.</th>
                            <th>Categorized token Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="tab-pane" id="tokens">
                    <!-- form to add tokens -->
                    <form>
                        <div class="formSep">

                        </div>
                        <div class="formSep">
                            <label>Select Category<span class="danger">*</span></label>
                            <select id="tokens_themes_id" name="themes_id" onchange="load_category(this.value,'tokens')">
                            </select>
                        </div>
                        <div class="formSep">
                            <div id="tokens_category_id_div">

                            </div>
                        </div>
                        <div class="formSep">
                            <label>No of tokens<span class="danger">*</span></label>
                            <input class="form-control form-input" type="number" id="no_tokens" name="no_tokens" placeholder="no of tokens" >
                            <button  type="button" onclick="add_tokens();" class="btn btn-info">GO</button>
                        </div>
                        <div id="tokens_screen">
                            <!-- display tokens -->
                        </div>
                        <div class="formSep">
                            <p>&nbsp;</p>
                            <button onclick="update_managelist(this.id,'tokens');" class="btn btn-info" type="button" id="tokens_submit" name="tokens_submit">Submit</button>
                        </div>
                    </form>
                    <!-- end of form to add themes -->
                </div>
                <div class="tab-pane" id="tokens_edit">
                    <table id="tokens_edit_table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL.NO.</th>
                            <th>Token Name</th>
                            <th>Token code</th>
                            <th>Manditory</th>
                            <th>Description</th>
                            <th>Categorized Token</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="tab-pane" id="sample_text">
                    <!-- form to add sammple -->
                    <form>

                        <div class="formSep">
                            <label>Select Laungague<span class="danger">*</span></label>
                            <select name="language" id="language">
                                <option value="" selected>Select</option>

                                <?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
                                <option value="<?php echo $this->_tpl_vars['langkey']; ?>
" ><?php echo $this->_tpl_vars['langitem']; ?>
</option>
                                <?php endforeach; endif; unset($_from); ?>
                            </select>
                        </div>
                        <div class="formSep">
                            <label>Select Category<span class="danger">*</span></label>
                            <select id="sample_text_themes_id" name="themes_id" onchange="load_category(this.value,'sample_text')">
                            </select>
                        </div>
                        <div class="formSep">
                            <div id="sample_text_category_id_div">

                            </div>
                        </div>
                        <div class="formSep">
                            <div id="sample_text_token_id_div">

                            </div>
                        </div>
                        <div class="formSep">
                            <label>No of Sample Text<span class="danger">*</span></label>
                            <input class="form-control form-input" type="number" name="no_sample_text" id="no_sample_text" placeholder="no of Sample Text" >
                            <button  type="button" onclick="add_sample_text();" class="btn btn-info">GO</button>
                        </div>
                        <div id="sample_text_screen">
                            <!-- display tokens -->
                        </div>
                        <div class="formSep" >
                            <p>&nbsp;</p>
                            <button onclick="update_managelist(this.id,'sample_text');" class="btn btn-info" type="button" id="sample_text_submit" name="sample_text_submit">Submit</button>
                        </div>
                    </form>
                    <!-- end of form to add themes -->
                </div>
                <div class="tab-pane" id="sample_text_edit">
                    <table id="sample_text_edit_table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL.NO.</th>
                            <th>Description</th>
                            <th>Token</th>
                            <th>Language</th>
                            <th>Categorized Token</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!--<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#importModal" onclick="loadImportform();">Import from XLSX</button>-->
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" role="dialog" style="left: 40%;width: 800px;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit</h4>
            </div>
            <div class="modal-body">
                <p>Loading....</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="importModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form>
                    <label>Select XLSX file</label><br />
                    <input id="xlsx" type="file" name="sortpic" onchange="uploadfile(this.id,'<?php echo $this->_tpl_vars['uploadpath']; ?>
','xlsx');"/>
                    <span class="uploadfile_status"/></span>
                    <!--<label>Theme</label><br />
                    <input type="text" value="test"><br />
                    <label>Categorized Token</label><br />
                    <input type="text" value="B"><br />
                    <label>Token</label><br />
                    <input type="text" value="C"><br />-->
                    <button type="button" class="btn btn-info">Import Now</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<?php echo '
<style>
    .form-input{height: 28px !important;}
    #themes_edit_table_filter input,#category_edit_table_filter input ,#tokens_edit_table_filter input,#sample_text_edit_table_filter input{height: 30px !important;}
</style>
'; ?>
