<?php /* Smarty version 2.6.19, created on 2015-12-16 13:52:33
         compiled from gebo/ebookers/formpopup.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/ebookers/formpopup.phtml', 276, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
    function validate_onedit(value,type,error_id,old_value){
        if(value == old_value){
            console.log("do nothing");
        }
        else {
            if ((type == \'themes\'))
                var ajax_url = "/ebookers/validate?&value=" + value + "&type=" + type;
            else if (type == \'category\')
                var ajax_url = "/ebookers/validate?&value=" + value + "&type=" + type + "&cat_themes_id=" + $("#edit_cat_themes_id").val();
            else if(type == \'tokens\')
                var ajax_url = "/ebookers/validate?&value="+value+"&type="+type+"&tokens_themes_id="+$("#edit_tokens_themes_id").val()+"&tokens_category_id="+$("#edit_tokens_category_id").val();

            $.ajax({
                type: \'POST\',
                url: ajax_url,
                success: function (data) {
                    console.log(data);
                    if ($.trim(data) == 1) {
                        $("#" + error_id).show();
                        $("#edit_" + type + "_submit").attr(\'disabled\', true);
                    }
                    else {
                        $("#" + error_id).hide();
                        $("#edit_" + type + "_submit").attr(\'disabled\', false);
                    }

                }
            });
        }
    }
    function edit_managelist(submit_id,type,id){
        smoke.confirm("are you sure you want to save?", function(e) {
            if (e) {
                console.log("start =" + $("#" + submit_id).closest(\'form\').serialize());
                var ajax_url = "/ebookers/edit-managelist?";
                var form_data = "&submit=" + submit_id + "&type=" + type + "&id=" + id + "&" + $("#" + submit_id).closest(\'form\').serialize();
                console.log(ajax_url+form_data);
                $.ajax({
                    type: \'POST\',
                    url: ajax_url + form_data,
                    success: function (data) {
                        console.log(data);
                        console.log("ajax terminated");
                        load_datatable(type);
                        smoke.alert("updated Successfully");
                        $("#editModal").modal(\'toggle\');
                    }
                });
            }
            else {
                $("#editModal").modal(\'toggle\');
            }
        });
    }
    function save_theme_lang(submit_id,type,id,self_id,theme_id){
           flag=true;
           if($("#save_theme_lang_"+self_id).val() == \'0\' ){
                smoke.alert("Langauge already entered, please select other langauge");
           }
           else {
               if(id== \'new\'){
                   if($("#language_" + self_id).val() == \'\'){
                       smoke.alert("please select langauge");
                       flag=false;
                   }

               }
               else{
                   if($("#language_" + id).val() == \'\'){
                       smoke.alert("please select langauge");
                       flag=false;
                   }
               }
               if(flag) {
                   smoke.confirm("are you sure you want to save?", function (e) {
                       if (e) {
                           console.log("start =" + $("#" + submit_id).closest(\'form\').serialize());
                           var ajax_url = "/ebookers/edit-managelist?";
                           if (id == \'new\') {
                               var form_data = "&submit=" + submit_id + "&type=" + type + "&id=" + id + "&theme_id=" + theme_id + "&language=" + $("#language_" + self_id).val() + "&description=" + encodeURIComponent($("#lang_desc_" + self_id).val()) + "&title_condition=" + encodeURIComponent($("#title_condition_" + self_id).val());

                           }
                           else {
                               var form_data = "&submit=" + submit_id + "&type=" + type + "&id=" + id + "&theme_id=" + theme_id + "&language=" + $("#language_" + self_id).val() + "&description=" + encodeURIComponent($("#lang_desc_" + self_id).val()) + "&title_condition=" + encodeURIComponent($("#title_condition_" + self_id).val());
                           }
                           console.log(ajax_url + form_data);
                           $.ajax({
                               type: \'POST\',
                               url: ajax_url + form_data,
                               success: function (data) {
                                   console.log(data);
                                   console.log("ajax terminated");
                                   //load_datatable(type);
                                   smoke.alert("updated Successfully");
                                   //$("#editModal").modal(\'toggle\');
                               }
                           });
                       }
                       else {
                           $("#editModal").modal(\'toggle\');
                       }
                   });
               }
            }
        }
    /* *** added on 16.12.2015 *** */
    // function to save category laug//
    function save_category_lang(submit_id,type,id,self_id,cat_id){
           flag=true;
           if($("#save_theme_lang_"+self_id).val() == \'0\' ){
                smoke.alert("Langauge already entered, please select other langauge");
           }
           else {
               if(id== \'new\'){
                   if($("#language_" + self_id).val() == \'\'){
                       smoke.alert("please select langauge");
                       flag=false;
                   }

               }
               else{
                   if($("#language_" + id).val() == \'\'){
                       smoke.alert("please select langauge");
                       flag=false;
                   }
               }
               if(flag) {
                   smoke.confirm("are you sure you want to save?", function (e) {
                       if (e) {
                           console.log("start =" + $("#" + submit_id).closest(\'form\').serialize());
                           var ajax_url = "/ebookers/edit-managelist?";
                           if (id == \'new\') {
                               var form_data = "&submit=" + submit_id + "&type=" + type + "&id=" + id + "&cat_id=" + cat_id + "&language=" + $("#language_" + self_id).val() + "&description=" + encodeURIComponent($("#lang_desc_" + self_id).val()) + "&title_condition=" + encodeURIComponent($("#title_condition_" + self_id).val());

                           }
                           else {
                               var form_data = "&submit=" + submit_id + "&type=" + type + "&id=" + id + "&cat_id=" + cat_id + "&language=" + $("#language_" + self_id).val() + "&description=" + encodeURIComponent($("#lang_desc_" + self_id).val()) + "&title_condition=" + encodeURIComponent($("#title_condition_" + self_id).val());
                           }
                           console.log(ajax_url + form_data);
                           $.ajax({
                               type: \'POST\',
                               url: ajax_url + form_data,
                               success: function (data) {
                                   console.log(data);
                                   console.log("ajax terminated");
                                   //load_datatable(type);
                                   smoke.alert("updated Successfully");
                                   //$("#editModal").modal(\'toggle\');
                               }
                           });
                       }
                       else {
                           $("#editModal").modal(\'toggle\');
                       }
                   });
               }
            }
        }
    //few of the values have been saved in hidden teext boxes//
    function delete_lang(lang_id){
        var ajax_url = "/ebookers/delete-theme-langauge?lang_id="+lang_id;
        $.ajax({
            type: \'POST\',
            url: ajax_url,
            success: function (data) {
                console.log(data);
                console.log("ajax terminated");
                //load_datatable(type);
                smoke.alert("updated Successfully");
                $("#editModal").modal(\'toggle\');
            }
        });
    }
    /* *** added on 16.12.2015 *** */
    //few of the values have been saved in hidden teext boxes//
    function CT_delete_lang(lang_id){
        var ajax_url = "/ebookers/delete-category-langauge?lang_id="+lang_id;
        $.ajax({
            type: \'POST\',
            url: ajax_url,
            success: function (data) {
                console.log(data);
                console.log("ajax terminated");
                //load_datatable(type);
                smoke.alert("updated Successfully");
                $("#editModal").modal(\'toggle\');
            }
        });
    }
    /* functio to add new lanunages and description to the themes */
    //few of the values have been saved in hidden teext boxes//
    function add_more_lang(language_id){
        var count = $("#edit_theme_no").val();
        var theme_id = $("#edit_theme_id").val();
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
        $("#add_more_screen").append(\'<tr><td>\'+
            \'<select name="language"  id="language_\'+count+\'" onchange="edit_validate_lang(this.value,\\\'themes\\\',\\\'edit_theme_lang_error_\'+count+\'\\\',\\\'\'+count+\'\\\');" style="width:100px;">\'+lang_select+\'</select>\'+
            \'<br /><span class="error_msg" id="edit_theme_lang_error_\'+count+\'">Already Exist, Error</span>\'+
            \'</td>\'+
            \'<td><textarea id="lang_desc_\'+count+\'" name="lang_desc_\'+language_id+\'" ></textarea></td>\'+
            \'<td><textarea id="title_condition_\'+count+\'" name="title_condition_\'+language_id+\'" ></textarea></td>\'+
            \'<td>\'+
            \'<input type="hidden" class="save_theme_lang" id="save_theme_lang_\'+count+\'" value="1"/>\'+
            \'<button class="btn btn-info" type="button" onclick="save_theme_lang(\\\'edit_themes_lang_submit\\\',\\\'themes_language\\\',\\\'\'+language_id+\'\\\',\\\'\'+count+\'\\\',\\\'\'+theme_id+\'\\\');">save</button>\'+
            \'<button class="btn btn-default"  type="button" onclick="delete_lang(\\\'\'+language_id+\'\\\',\\\'\'+count+\'\\\');">Delete</button>\'+
            \'</td></tr>\');
        count++;
        $("#edit_theme_no").val(count);
    }
    function category_add_more_lang(language_id){
        var count = $("#edit_theme_no").val();
        var theme_id = $("#edit_theme_id").val();
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
        $("#add_more_screen").append(\'<tr><td>\'+
            \'<select name="language"  id="language_\'+count+\'" onchange="edit_validate_lang(this.value,\\\'category\\\',\\\'edit_category_lang_error_\'+count+\'\\\',\\\'\'+count+\'\\\');" style="width:100px;">\'+lang_select+\'</select>\'+
            \'<br /><span class="error_msg" id="edit_category_lang_error_\'+count+\'">Already Exist, Error</span>\'+
            \'</td>\'+
            \'<td><textarea id="lang_desc_\'+count+\'" name="lang_desc_\'+language_id+\'" ></textarea></td>\'+
            \'<td><textarea id="title_condition_\'+count+\'" name="title_condition_\'+language_id+\'" ></textarea></td>\'+
            \'<td>\'+
            \'<input type="hidden" class="save_theme_lang" id="save_theme_lang_\'+count+\'" value="1"/>\'+
            \'<button class="btn btn-info" type="button" onclick="save_category_lang(\\\'edit_category_lang_submit\\\',\\\'category_language\\\',\\\'\'+language_id+\'\\\',\\\'\'+count+\'\\\',\\\'\'+theme_id+\'\\\');">save</button>\'+
            \'<button class="btn btn-default"  type="button" onclick="CT_delete_lang(\\\'\'+language_id+\'\\\',\\\'\'+count+\'\\\');">Delete</button>\'+
            \'</td></tr>\');
        count++;
        $("#edit_theme_no").val(count);
    }
</script>
'; ?>

<div class="row-fluid">
    <?php if ($this->_tpl_vars['data'][0]['type'] == 'themes'): ?>

            <div class="formSep">
                <strong>Edit Category</strong>
            </div>
        <form>
            <div class="formSep">
                <label>Category Name<span class="danger">*</span></label>
                <input class="form-control form-input" type="text" name="theme_name" value="<?php echo $this->_tpl_vars['data'][0]['theme_name']; ?>
" onkeyup="validate_onedit(this.value,'themes','edit_themes_error','<?php echo $this->_tpl_vars['data'][0]['theme_name']; ?>
')"/>
                <span class="danger error_msg" id="edit_themes_error">Already Exist, Error</span>
                <button onclick="edit_managelist(this.id,'themes','<?php echo $this->_tpl_vars['data'][0]['theme_id']; ?>
');" class="btn btn-info" type="button" id="edit_themes_submit" name="edit_themes_submit">Save</button>
            </div>
            <div class="formSep">
            </div>
        </form>
            <div class="formSep">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            Langauage
                        </td>
                        <td>
                            Title
                        </td>
                        <td>
                            Title Condition
                        </td>
                        <td>
                            Action
                        </td>
                    </tr>

                    <?php $this->assign('i', '0'); ?>
                    <?php while ($this->_tpl_vars['i'] < count($this->_tpl_vars['data'])) { ?>
                    <tr>
                        <td>
                            <select name="language"  id="language_<?php echo $this->_tpl_vars['i']; ?>
" onchange="edit_validate_lang(this.value,'themes','edit_theme_lang_error_<?php echo $this->_tpl_vars['i']; ?>
','<?php echo $this->_tpl_vars['i']; ?>
');" style="width:100px;">
                            <?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
                                <?php if ($this->_tpl_vars['data'][$this->_tpl_vars['i']]['language'] == $this->_tpl_vars['langkey']): ?>
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
                            <br /><span class="error_msg" id="edit_theme_lang_error_<?php echo $this->_tpl_vars['i']; ?>
">Already Exist, Error</span>
                        </td>
                        <td><textarea name="lang_desc_<?php echo $this->_tpl_vars['data'][0]['language_id']; ?>
" id="lang_desc_<?php echo $this->_tpl_vars['i']; ?>
"><?php echo $this->_tpl_vars['data'][$this->_tpl_vars['i']]['lang_desc']; ?>
</textarea></td>
                        <td><textarea name="title_condition_<?php echo $this->_tpl_vars['data'][0]['language_id']; ?>
" id="title_condition_<?php echo $this->_tpl_vars['i']; ?>
"><?php echo $this->_tpl_vars['data'][$this->_tpl_vars['i']]['title_condition']; ?>
</textarea></td>
                        <td>
                            <input type="hidden" class="save_theme_lang" id="save_theme_lang_<?php echo $this->_tpl_vars['i']; ?>
" value="1"/>
                            <button class="btn btn-info" type="button" onclick="save_theme_lang('edit_themes_lang_submit','themes_language','<?php echo $this->_tpl_vars['data'][$this->_tpl_vars['i']]['language_id']; ?>
','<?php echo $this->_tpl_vars['i']; ?>
','<?php echo $this->_tpl_vars['data'][$this->_tpl_vars['i']]['theme_id']; ?>
');">save</button>
                            <button class="btn btn-default"  type="button" onclick="delete_lang('<?php echo $this->_tpl_vars['data'][$this->_tpl_vars['i']]['language_id']; ?>
');">Delete</button>
                        </td>
                    </tr>
                    <span class="hide"><?php echo $this->_tpl_vars['i']++; ?>
</span>

                    <?php } ?>

                    <tbody id="add_more_screen">
                    </tbody>
                    <tr>
                        <td colspan="4"><button type="button" class="btn btn-info" onclick="add_more_lang('new');">+ add more Langauge</button></td>
                    </tr>
                </table>
                <input type="hidden" value="<?php echo count($this->_tpl_vars['data']); ?>
" id="edit_theme_no" />
                <input type="hidden" value="<?php echo $this->_tpl_vars['data'][0]['theme_id']; ?>
" id="edit_theme_id" />
            </div>

    <?php elseif ($this->_tpl_vars['data'][0]['type'] == 'category'): ?>
        <form>
            <div class="formSep">
                <strong>Edit Category</strong>
            </div>
            <div class="formSep">
                <label>Select Theme<span class="danger">*</span></label>
                <select id="edit_cat_themes_id" name="themes_id">
                    <?php echo $this->_tpl_vars['themes_option']; ?>

                </select>
            </div>
            <div class="formSep">
                <label>Category Name<span class="danger">*</span></label>
                <input class="form-control" type="text" name="category_name" value="<?php echo $this->_tpl_vars['data'][0]['category_name']; ?>
" onkeyup="validate_onedit(this.value,'category','edit_category_error','<?php echo $this->_tpl_vars['data'][0]['category_name']; ?>
');"/>
                <span class="danger error_msg" id="edit_category_error">Already Exist, Error</span>
            </div>
            <div class="formSep">
                <button onclick="edit_managelist(this.id,'category','<?php echo $this->_tpl_vars['data'][0]['cat_id']; ?>
');" class="btn btn-info" type="button" id="edit_category_submit" name="edit_category_submit">Submit</button>
            </div>
        </form>
    <div class="formSep">
        <table class="table table-bordered">
            <tr>
                <td>
                    Langauage
                </td>
                <td>
                    Title
                </td>
                <td>
                    Title Condition
                </td>
                <td>
                    Action
                </td>
            </tr>

            <?php $this->assign('i', '0'); ?>
            <?php while ($this->_tpl_vars['i'] < count($this->_tpl_vars['data'])) { ?>
            <tr>
                <td>
                    <select name="language"  id="language_<?php echo $this->_tpl_vars['i']; ?>
" onchange="CT_edit_validate_lang(this.value,'category','edit_category_lang_error_<?php echo $this->_tpl_vars['i']; ?>
','<?php echo $this->_tpl_vars['i']; ?>
');" style="width:100px;">
                        <?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
                        <?php if ($this->_tpl_vars['data'][$this->_tpl_vars['i']]['CT_language'] == $this->_tpl_vars['langkey']): ?>
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
                    <br /><span class="error_msg" id="edit_theme_lang_error_<?php echo $this->_tpl_vars['i']; ?>
">Already Exist, Error</span>
                </td>
                <td><textarea name="lang_desc_<?php echo $this->_tpl_vars['data'][0]['language_id']; ?>
" id="lang_desc_<?php echo $this->_tpl_vars['i']; ?>
"><?php echo $this->_tpl_vars['data'][$this->_tpl_vars['i']]['CT_title']; ?>
</textarea></td>
                <td><textarea name="title_condition_<?php echo $this->_tpl_vars['data'][0]['language_id']; ?>
" id="title_condition_<?php echo $this->_tpl_vars['i']; ?>
"><?php echo $this->_tpl_vars['data'][$this->_tpl_vars['i']]['CT_title_condition']; ?>
</textarea></td>
                <td>
                    <input type="hidden" class="save_theme_lang" id="save_theme_lang_<?php echo $this->_tpl_vars['i']; ?>
" value="1"/>
                    <button class="btn btn-info" type="button" onclick="save_category_lang('edit_category_lang_submit','category_language','<?php echo $this->_tpl_vars['data'][$this->_tpl_vars['i']]['CT_language_id']; ?>
','<?php echo $this->_tpl_vars['i']; ?>
','<?php echo $this->_tpl_vars['data'][$this->_tpl_vars['i']]['cat_id']; ?>
');">save</button>
                    <button class="btn btn-default"  type="button" onclick="CT_delete_lang('<?php echo $this->_tpl_vars['data'][$this->_tpl_vars['i']]['CT_language_id']; ?>
');">Delete</button>
                </td>
            </tr>
            <span class="hide"><?php echo $this->_tpl_vars['i']++; ?>
</span>

            <?php } ?>

            <tbody id="add_more_screen">
            </tbody>
            <tr>
                <td colspan="4"><button type="button" class="btn btn-info" onclick="category_add_more_lang('new');">+ add more Langauge</button></td>
            </tr>
        </table>
        <input type="hidden" value="<?php echo count($this->_tpl_vars['data']); ?>
" id="edit_theme_no" />
        <input type="hidden" value="<?php echo $this->_tpl_vars['data'][0]['cat_id']; ?>
" id="edit_theme_id" />
    </div>
    <?php elseif ($this->_tpl_vars['data'][0]['type'] == 'tokens'): ?>
        <form>
            <div class="formSep">
                <strong>Edit Tokens</strong>
            </div>
            <div class="formSep">
                <label>Select Theme<span class="danger">*</span></label>
                <select id="edit_tokens_themes_id" name="themes_id" onchange="load_category(this.value,'tokens')">
                    <?php echo $this->_tpl_vars['themes_option']; ?>

                </select>
            </div>
            <div class="formSep">
                <label>Select category<span class="danger">*</span></label>
                <select id="edit_tokens_category_id" name="category_id" >
                    <?php echo $this->_tpl_vars['category_option']; ?>

                </select>
            </div>
            <div class="formSep">
                <label>Token Name<span class="danger">*</span></label>
                <input class="form-control" type="text" id="edit_token_name" name="token_name" value="<?php echo $this->_tpl_vars['data'][0]['token_name']; ?>
" onkeyup="validate_onedit(this.value,'tokens','edit_tokens_error','<?php echo $this->_tpl_vars['data'][0]['token_name']; ?>
')"/>
                <span class="danger error_msg" id="edit_tokens_error">Already Exist, Error</span>

            </div>
            <div class="formSep">
                <label>Token code</label>
                <textarea class="form-control" name="token_code" ><?php echo $this->_tpl_vars['data'][0]['token_code']; ?>
</textarea>
            </div>
            <div class="formSep">
                <label>Description(If any)</label>
                <textarea class="form-control" name="description" ><?php echo $this->_tpl_vars['data'][0]['description']; ?>
</textarea>
            </div>
            <div class="formSep">
                <label> <input value="mandatory" name="token_type" type="radio" <?php if ($this->_tpl_vars['data'][0]['token_type'] == 'mandatory'): ?>checked="checked"<?php endif; ?>> Mandatory</label>
                <label> <input value="optional" name="token_type" type="radio" <?php if ($this->_tpl_vars['data'][0]['token_type'] == 'optional'): ?>checked="checked"<?php endif; ?>> Optional</label>
                <label> <input value="hidden" name="token_type" type="radio" <?php if ($this->_tpl_vars['data'][0]['token_type'] == 'hidden'): ?>checked="checked"<?php endif; ?>> Hidden</label>
            </div>
            <div class="formSep">
                <button onclick="edit_managelist(this.id,'tokens','<?php echo $this->_tpl_vars['data'][0]['token_id']; ?>
');" class="btn btn-info" type="button" id="edit_tokens_submit" name="edit_tokens_submit">Submit</button>
            </div>
        </form>
    <?php elseif ($this->_tpl_vars['data'][0]['type'] == 'sample_text'): ?>
        <form>
            <div class="formSep">
                <strong>Edit Sample Text</strong>
            </div>
            <div class="formSep">
                <label>Select anguage<span class="danger">*</span></label>
                <select name="language" id="language">
                    <option value="" selected>Select</option>

                    <?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
                        <?php if ($this->_tpl_vars['data'][0]['language'] == $this->_tpl_vars['langkey']): ?>
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
<!--                <select id="edit_sample_text_themes_id" name="themes_id" onchange="load_category(this.value,'sample_text')">-->
<!--                    <?php echo $this->_tpl_vars['themes_option']; ?>
-->
<!--                </select>-->
            </div>
            <div class="formSep">
                <label>Select Theme<span class="danger">*</span></label>
                <select id="edit_sample_text_themes_id" name="themes_id" onchange="load_category(this.value,'sample_text')">
                    <?php echo $this->_tpl_vars['themes_option']; ?>

                </select>
            </div>
            <div class="formSep">
                <label>Select category<span class="danger">*</span></label>
                <select id="edit_sample_text_category_id" name="category_id" onchange="load_tokens(this.id)">
                    <?php echo $this->_tpl_vars['category_option']; ?>

                </select>
            </div>
            <div class="formSep">
                <label>Select category<span class="danger">*</span></label>
                <select id="edit_sample_text_token_id" name="token_id" >
                    <?php echo $this->_tpl_vars['token_option']; ?>

                </select>
            </div>
            <div class="formSep">
                <label>Sample Description</label>
                <textarea class="form-control" name="description" ><?php echo $this->_tpl_vars['data'][0]['description']; ?>
</textarea>
            </div>
            <div class="formSep">
                <button onclick="edit_managelist(this.id,'sample_text','<?php echo $this->_tpl_vars['data'][0]['sample_id']; ?>
');" class="btn btn-info" type="button" id="edit_sample_text_submit" name="edit_sample_text_submit">Submit</button>
            </div>
        </form>
    <?php endif; ?>
</div>