<?php /* Smarty version 2.6.19, created on 2016-03-01 12:16:20
         compiled from gebo/bnp/managelist.phtml */ ?>
<?php echo '
<script src="/BO/theme/gebo/lib/ckeditor/ckeditor.js" xmlns="http://www.w3.org/1999/html"></script>
<script src="/BO/theme/gebo/lib/ckeditor/samples/js/sample.js"></script><!--
<link rel="stylesheet" href="/BO/theme/gebo/lib/ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="/BO/theme/gebo/lib/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">-->
<script type="text/javascript" >
    /*NOTE: DO NOT DELETE FUNCTIN(few functions are defined here and called from formpopup.phtml file) */
    function update_managelist(id,type){
        var flag=true;
        if(type == \'region\'){
            if($("#region_name").val().length <= 1 ) {
                smoke.alert("Please enter theme name");
                flag = false;
            }
        }
        else if(type == \'city\'){
            if($("#city_region_id").val() == \'\'){
                smoke.alert("Please select Region");
                flag = false;
            }
            else if($("#city_name").val().length <= 1 ) {
                smoke.alert("Please enter city name");
                flag = false;
            }
        }
        else if(type == \'sample_text\'){
            if($("#sample_text_region_id").val() == \'\'){
                smoke.alert("Please select themes");
                flag = false;
            }
            else if($("#sample_text_city_id").val() == \'\'){
                smoke.alert("Please select category");
                flag = false;
            }
            else if($("#no_sample_text").val() == \'\' ) {
                smoke.alert("Please enter number of sample text");
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
            var ajax_url = "/bnp/update-managelist?";
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
        if(type == \'region\') {
            $(\'#region_edit_table\').dataTable().fnDestroy();
            $(\'#region_edit_table\').dataTable({
                "sAjaxSource": "/bnp/load-datatable?datatable=region",
                "aoColumns": [
                    {mData: \'sl_no\'},
                    {mData: \'region_name\'},
                    {mData: \'description\'},
                    {mData: \'action\'}
                ],
                "fnDrawCallback":callback
            });
        }
        else if(type == \'city\') {
            $(\'#category_edit_table\').dataTable().fnDestroy();
            $(\'#category_edit_table\').dataTable({
                "sAjaxSource": "/bnp/load-datatable?datatable=city",
                "aoColumns": [
                    {mData: \'sl_no\'},
                    {mData: \'city_name\'},
                    {mData: \'description\'},
                    {mData: \'action\'}
                ],
                "fnDrawCallback":callback
            });
        }
        else if(type == \'sample_text\') {
            $(\'#sample_text_edit_table\').dataTable().fnDestroy();
            $(\'#sample_text_edit_table\').dataTable({
                "sAjaxSource": "/bnp/load-datatable?datatable=sample_text",
                "aoColumns": [
                    {mData: \'sl_no\'},
                    {mData: \'description\'},
                    {mData: \'title\'},
                    {mData: \'city_name\'},
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
        var ajax_url = "/bnp/view-edit-list?&id="+id+"&type="+type;
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
                    var ajax_url = "/bnp/delete-list?&id="+id+"&type="+type;
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
        var ajax_url = "/bnp/validate?&value="+value+"&type="+type+"&tokens_themes_id="+$("#tokens_themes_id").val()+"&tokens_category_id="+$("#tokens_category_id").val();
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
    //function to validate theme name/category name duplication in database//
    function validate(value,type,error_id){
        if((type == \'region\'))
            var ajax_url = "/bnp/validate?&value="+value+"&type="+type;
        else if(type == \'city\')
            var ajax_url = "/bnp/validate?&value="+value+"&type="+type+"&city_region_id="+$("#city_region_id").val();
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
    function add_tokens(val) {
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
            token_div +=
                    \'<tr>\'+
                        \'<td valign="top">\'+
                            \'<input class="form-control" type="text" name="token_name_\'+i+\'" id="token_name_\'+i+\'" onkeyup="validate_token(this.value,\\\'tokens\\\',\\\'token_error_\'+i+\'\\\',\\\'\'+i+\'\\\')"/>\'+
                            \'<br /><span class="error_msg" id="token_error_\'+i+\'">Already Exist, Error</span>\'+
                        \'</td>\'+
                        \'<td>\'+
                            \'<textarea class="form-control" name="token_code_\'+i+\'" ></textarea>\'+
                        \'</td>\'+
                        \'<td>\'+
                            \'<textarea class="form-control" name="description_\'+i+\'" ></textarea>\'+
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
            sample_text_div +=
                \'<tr>\' +
                    \'<td>\' +
                        \'<textarea class="form-control"  style="width:80%;height:400px;"  id="sample_text_description_\' + i + \'" name="description_\' + i + \'" ></textarea>\' +
                    \'</td>\' +
                \'</tr>\';
        }
        sample_text_div +=\'</table>\';
        $("#sample_text_screen").html(sample_text_div);
    }
    //loading themes slect option and caetgory select option based on al the given conditions//
    function load_options(type){
        console.log("loading opion ajax");
        var ajax_url = "/bnp/load-region-option";
        $.ajax({
            type: \'POST\',
            url: ajax_url,
            success:function(data){
                console.log(data);
                $("input[name=region_id]").empty().append(data);
                if(type==\'city\' ) {
                    $("#" + type + "_region_id").multiselect();
                    $("#" + type + "_region_id").multiselectfilter();
                }
            }
        });
    }
    function load_city(region_id,type){
        var ajax_url = "/bnp/load-city-option?&region_id="+region_id+"&type="+type;
        $.ajax({
            type: \'POST\',
            url: ajax_url,
            success:function(data){
                console.log(data);
                $("#"+type+"_city_id_div").html(\'<select id="\'+type+\'_city_id"  name="city_id[]" ><option "">Select</option></select>\');
                $("#"+type+"_city_id").empty().append(data);
                $("#edit_"+type+"_city_id").empty().append(data);

            }
        });
    }
    function loadImportform(){
        $("#editModal").html(\'<form></form>\');
    }
    $( document).ready(function(){
        load_datatable(\'city\');
        $(".modal").hide();
    });
    var filearray = new Array();
    var spec = $("#spec_file_name").val();
    if(spec!="")
    {
        var speclist = spec.split(",");
        if(speclist.length>0)
        {
            for(var s=0;s<speclist.length;s++)
                filearray.push(speclist[s]);
        }
    }
    $(function(){
        var btnUpload=$(\'#uploadspec\');
        var status=$(\'#fname\');

        new AjaxUpload(btnUpload, {

            action: \'uploadaospec\',
            name: \'uploadfile\',

            onSubmit: function(file, ext){
                if (! (ext && /^(doc|docx|xls|xlsx|pdf|csv|xml|rtf|zip)$/.test(ext))){
                    $(\'#fileerr\').html(\'Uniquement doc, docx, xls, xlsx, pdf, csv, xml, zip et rtf\').css(\'color\',\'#FF0000\');
                    return false;
                }

                var client=$("#client_list").val();

                if(client==0)
                {
                    $(\'#fileerr\').html(\'Please select client\').css(\'color\',\'#FF0000\');
                    return false;
                }

                status.html(\'<img src="/BO/theme/gebo/img/loading.gif" />\');
            },
            onComplete: function(file, response){//alert(response);
                if(response!="error"){
                    status.html(\'\').css(\'color\',\'#000000\');
                    var fname=response.split("#");
                    $(\'#spec_file_name\').val(fname[1]);
                    $(\'#fname\').html(fname[1]);
                    $(\'#fileerr\').html(\'\');
                }
            }
        });
    });
</script>

<style>
    .label{font-size: 12px!important; font-weight: bold;}
    .tokens_div{border: 1px dotted #000000;}
    .error_msg{color:#FF0000;display: none;}
</style>
'; ?>

<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">BNP Menu Option</h3>
        <div class="tabbable tabbable-bordered">
            <ul class="nav nav-tabs">
                                <li class="dropdown active">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Ville <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a href="#city_edit" data-toggle="tab" onclick="load_datatable('city');">List Ville</a></li><li class="divider"></li>
                        <li><a href="#city" data-toggle="tab" onclick="load_options('city');">Add Ville</a></li>
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
                <div class="tab-pane" id="region">
                    <!-- form to add themes -->
                    <form>
                        <div class="formSep">
                        </div>
                        <div class="formSep">
                            <label>Region Name<span class="danger">*</span></label>
                            <input class="form-control" type="text" name="region_name" id="region_name" onkeyup="validate(this.value,'region','region_error')"/>
                            <span class="danger error_msg" id="region_error">Already Exist, Error</span>
                        </div>
                        <div class="formSep">
                            <label>Description(If any)</label>
                            <textarea class="form-control" name="description" ></textarea>
                        </div>
                        <div class="formSep">
                            <button onclick="update_managelist(this.id,'region');" class="btn btn-info" type="button" id="region_submit" name="region_submit">Submit</button>
                        </div>
                    </form>
                    <!-- end of form to add themes -->
                </div>
                <div class="tab-pane active" id="region_edit">
                    <table id="region_edit_table" class="table table-bordered table-striped">
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
                <div class="tab-pane" id="city">
                    <!-- form to add category -->
                    <form>
                        <div class="formSep">

                        </div>
                        <div class="formSep">
                            <label>Select Region<span class="danger">*</span></label>
                            <select id="city_region_id" multiple="multiple" name="region_id[]">
                                <?php echo $this->_tpl_vars['region_options']; ?>

                            </select>
                        </div>
                        <div class="formSep">
                            <label>Ville Name<span class="danger">*</span></label>
                            <input class="form-control" type="text" name="city_name" id="city_name" onkeyup="validate(this.value,'city','city_error')"/>
                            <span class="danger error_msg" id="city_error">Already Exist, Error</span>
                        </div>
                        <!--<div class="formSep">
                            <label>Conditional Type<span class="danger">*</span></label>
                            <label> <input value="none" name="conditional_type" type="radio" checked="checked"> Mandatory</label>
                            <label> <input value="and" name="conditional_type" type="radio" > Hidden</label>
                            <label> <input value="or" name="conditional_type" type="radio" > Optional</label>
                        </div>-->
                        <div class="formSep">
                            <label>Description(If any)</label>
                            <textarea class="form-control" name="description" ></textarea>
                        </div>
                        <div class="formSep">
                            <button onclick="update_managelist(this.id,'city');" class="btn btn-info" type="button" id="city_submit" name="city_submit">Submit</button>
                        </div>
                    </form>
                    <!-- end of form to add themes -->
                </div>
                <div class="tab-pane" id="city_edit">
                    <table id="category_edit_table" class="table table-bordered table-striped" style="width:100% !important;">
                        <thead>
                        <tr>
                            <th>SL.NO.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <!--<th>Region</th>-->
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="tab-pane" id="sample_text">
                    <!-- form to add sammple -->
                    <form>
                        <div class="formSep">

                        </div>
                        <div class="formSep">
                            <label>Select Region<span class="danger">*</span></label>
                            <select id="sample_text_region_id" name="region_id" onchange="load_city(this.value,'sample_text')">
                                <option>Select Region</option><?php echo $this->_tpl_vars['region_options']; ?>

                            </select>
                        </div>
                        <div class="formSep">
                            <label>Select Ville<span class="danger">*</span></label>
                            <div id="sample_text_city_id_div">

                            </div>
                        </div>

                        <div class="formSep">
                            <label>Title<span class="danger">*</span></label>
                            <input type="text" name="title" id="title" placeholder="title" >

                        </div>

                        <div class="formSep">
                            <label>No of Sample Text<span class="danger">*</span></label>
                            <input type="text" name="no_sample_text" id="no_sample_text" placeholder="no of Sample Text" >
                            <button type="button" onclick="add_sample_text();" class="btn btn-info">GO</button>
                        </div>
                        <div id="sample_text_screen">
                            <!-- display tokens -->
                        </div>
                        <div class="formSep">
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
                            <th>Title</th>
                            <th>City</th>
                          <!--  <th>Region</th>-->
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" role="dialog">
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
<div class="modal fade" id="importModal" role="dialog" style="">
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
                    <input type="file" ><br />
                    <label>Theme</label><br />
                    <input type="text" value="test"><br />
                    <label>Categorized Token</label><br />
                    <input type="text" value="B"><br />
                    <label>Token</label><br />
                    <input type="text" value="C"><br />
                    <button type="button">Import Now</button>
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
    .modal {left: 30%;
        z-index: 1050;
        width: 860px;
        margin-left: -230px;
        border: 1px #00000 solid;}
    #editor{ height:400px !important; }
</style>
'; ?>
