<?php /* Smarty version 2.6.19, created on 2016-03-08 12:54:08
         compiled from gebo/bnp/formpopup.phtml */ ?>
<?php echo '
<script type="text/javascript" >
    function validate_onedit(value,type,error_id,old_value){
        if(value == old_value){
            console.log("do nothing");
        }
        else {
            if ((type == \'region\'))
                var ajax_url = "/bnp/validate?&value=" + value + "&type=" + type;
            else if (type == \'city\')
                var ajax_url = "/bnp/validate?&value=" + value + "&type=" + type + "&city_region_id=" + $("#edit_city_region_id").val();
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
                CKEDITOR.instances.editor.updateElement();
                var ajax_url = "/bnp/edit-managelist?";
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
    $(document).ready(function() {
        initSample();
    });
</script>
'; ?>

<div class="row-fluid">
    <?php if ($this->_tpl_vars['data'][0]['type'] == 'region'): ?>
        <form>
            <div class="formSep">
                <strong>Edit Region</strong>
            </div>
            <div class="formSep">
                <label>Region Name<span class="danger">*</span></label>
                <input class="form-control" type="text" name="region_name" value="<?php echo $this->_tpl_vars['data'][0]['region_name']; ?>
" onkeyup="validate_onedit(this.value,'region','edit_region_error','<?php echo $this->_tpl_vars['data'][0]['region_name']; ?>
')"/>
                <span class="danger error_msg" id="edit_region_error">Already Exist, Error</span>
            </div>
            <div class="formSep">
                <label>Description(If any)</label>
                <textarea class="form-control" name="description" ><?php echo $this->_tpl_vars['data'][0]['description']; ?>
</textarea>
            </div>
            <div class="formSep">
                <button onclick="edit_managelist(this.id,'region','<?php echo $this->_tpl_vars['data'][0]['region_id']; ?>
');" class="btn btn-info" type="button" id="edit_region_submit" name="edit_region_submit">Submit</button>
            </div>
        </form>
    <?php elseif ($this->_tpl_vars['data'][0]['type'] == 'city'): ?>
        <form>
            <div class="formSep">
                <strong>Edit City</strong>
            </div>
            <div class="formSep">
                <label>Select Region<span class="danger">*</span></label>
                <select id="edit_city_region_id" name="region_id">
                    <?php echo $this->_tpl_vars['data'][0]['region_option']; ?>

                </select>
            </div>
            <div class="formSep">
                <label>city Name<span class="danger">*</span></label>
                <input class="form-control" type="text" name="city_name" value="<?php echo $this->_tpl_vars['data'][0]['city_name']; ?>
" onkeyup="validate_onedit(this.value,'city','edit_city_error','<?php echo $this->_tpl_vars['data'][0]['city_name']; ?>
');"/>
                <span class="danger error_msg" id="edit_city_error">Already Exist, Error</span>
            </div>
            <div class="formSep">
                <label>Description(If any)</label>
                <textarea class="form-control" name="description" ><?php echo $this->_tpl_vars['data'][0]['description']; ?>
</textarea>
            </div>
            <div class="formSep">
                <button onclick="edit_managelist(this.id,'city','<?php echo $this->_tpl_vars['data'][0]['city_id']; ?>
');" class="btn btn-info" type="button" id="edit_city_submit" name="edit_city_submit">Submit</button>
            </div>
        </form>
    <?php elseif ($this->_tpl_vars['data'][0]['type'] == 'sample_text'): ?>
        <form>
            <div class="formSep">
                <strong>Edit Sample Text</strong>
            </div>
            <div class="formSep">
                <label>Select Theme<span class="danger">*</span></label>
                <select id="edit_sample_text_region_id" name="region_id" onchange="load_city(this.value,'sample_text')">
                    <?php echo $this->_tpl_vars['data'][0]['region_option']; ?>

                </select>
            </div>
            <div class="formSep">
                <label>Select category<span class="danger">*</span></label>
                <select id="edit_sample_text_city_id" name="city_id" >
                    <?php echo $this->_tpl_vars['data'][0]['city_option']; ?>

                </select>
            </div>
            <div class="formSep">
                <label>Title</label>
                <input class="form-control " type="text" id="title" name="title" value="<?php echo $this->_tpl_vars['data'][0]['title']; ?>
" />
            </div>
            <div class="formSep">
                <label>Sample Text</label>
                <textarea class="form-control " id="editor" name="description" ><?php echo $this->_tpl_vars['data'][0]['description']; ?>
</textarea>
            </div>
            <div class="formSep">
                <button onclick="edit_managelist(this.id,'sample_text','<?php echo $this->_tpl_vars['data'][0]['sample_id']; ?>
');" class="btn btn-info" type="button" id="edit_sample_text_submit" name="edit_sample_text_submit">Submit</button>
            </div>
        </form>
    <?php endif; ?>
</div>