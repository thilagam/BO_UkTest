<?php /* Smarty version 2.6.19, created on 2016-04-19 10:29:47
         compiled from gebo/searchtest/searchtest_view.phtml */ ?>
<?php echo '
<script type="text/javascript">
    $(document).ready(function() {
		
        $(\'#user_type_error\').hide();
        $(\'#rank_error\').hide();
        $(\'#lang_error\').hide();
        $(\'#status_error\').hide();

        $(\'#search_submit\').click(function(){
            var usertype=$(\'#user_type\').val();
            var rank=$(\'#rank\').val();
            var lang=$(\'#lang\').val();
            var status=$(\'#status\').val();
			
            var flag = 0;

            if(!usertype){
                $(\'#user_type_error\').show();
                flag=1;
            }
            if(!rank){
                $(\'#rank_error\').show();
                flag=1;
            }
            if(!lang){
                $(\'#lang_error\').show();
                flag=1;
            }
            if(!status){
                $(\'#status_error\').show();
                flag=1;
            }
            if (flag == 0) {
                $(\'#search_form\').submit();
            }

        });
    });
</script>
'; ?>

   <form id="search_form" action="check" method="post" role="form">
    <div >
        <label>User Type</label>
        <select name="user_type[]" id="user_type" class="chzn_a span8" multiple="multiple">
            <option value="">Select User Type</option>
            <option value="writer">Writer</option>
            <option value="corrector">Corrector</option>
            <option value="translator">Translator</option>
        </select>
        <span id="user_type_error">Reqired</span>
    </div>
    <div >
        <label>Rank</label>
        <select name="rank[]" id="rank" class="chzn_a span8" multiple="multiple">
            <option value="">Select Rank</option>
            <option value="senior">Senior</option>
            <option value="junior">Junior</option>
            <option value="3">Sub Junior</option>
        </select>
        <span id="rank_error">Reqired</span>
    </div>
    <div >
        <label>Language</label>
        <select name="lang[]" id="lang" class="chzn_a span8" multiple="multiple">
            <option value="">Select Language</option>
            <?php $_from = $this->_tpl_vars['ep_lang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
            <option value="<?php echo $this->_tpl_vars['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        <span id="lang_error">Reqired</span>
    </div>
    <div >
        <label>Status</label>
        <select name="status[]" id="status" class="chzn_a span8" multiple="multiple">
            <option value="">Select Status</option>
            <option value="1">Active</option>
            <option value="2">Inactive</option>
        </select>
        <span id="status_error">Reqired</span>
    </div>
    <div >
        <button type="button" name="search_submit" id="search_submit">Search</button>
    </div>
</form>