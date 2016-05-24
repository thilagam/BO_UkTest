<?php /* Smarty version 2.6.19, created on 2014-12-04 11:30:47
         compiled from gebo/stats/stats_paymentstats.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/stats/stats_paymentstats.phtml', 303, false),array('modifier', 'date_format', 'gebo/stats/stats_paymentstats.phtml', 457, false),array('modifier', 'zero_cut', 'gebo/stats/stats_paymentstats.phtml', 719, false),array('function', 'counter', 'gebo/stats/stats_paymentstats.phtml', 640, false),array('function', 'math', 'gebo/stats/stats_paymentstats.phtml', 759, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >

    $(document).ready(function() {
		 $(".uni_style").uniform();
         if ($(\'#contrib-payments-list\').length) {
            $(\'#contrib-payments-list\').dataTable({
                "sPaginationType" : "bootstrap",
                "iDisplayLength" : 20,
                "sDom" : "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
                "aoColumns" : [
                {"sType" : "string"},
                {"sType" : "string"}, 
                {"sType" : "string"}, 
                {"sType" : "formatted-num"},
                {"sType" : "date-euro"} 
               ],
               
                "aaSorting" : [[1, "asc"]],
                "oTableTools" : {
                    "aButtons" : ["copy", "print", {
                        "sExtends" : "collection",
                        "sButtonText" : \'Save <span class="caret" />\',
                        "aButtons" : ["csv", "xls", "pdf"]
                    }],
                    "sSwfPath" : "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
            });
        }
        if ($(\'#client-payments-list\').length) {
            $(\'#client-payments-list\').dataTable({
                "sPaginationType" : "bootstrap",
                "iDisplayLength" : 20,
                "sDom" : "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
                "aoColumns" : [
                {"sType" : "string"},
                {"sType" : "string"}, 
                {"sType" : "formatted-num"},
                {"sType" : "formatted-num"},
                {"sType" : "string"}, 
                {"sType" : "date-euro"} 
               ],
                "aaSorting" : [[1, "asc"]],
                "oTableTools" : {
                    "aButtons" : ["copy", "print", {
                        "sExtends" : "collection",
                        "sButtonText" : \'Save <span class="caret" />\',
                        "aButtons" : ["csv", "xls", "pdf"]
                    }],
                    "sSwfPath" : "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
            });
        }
        if ($(\'#contrib-validated-list\').length) {
            $(\'#contrib-validated-list\').dataTable({
                "sPaginationType" : "bootstrap",
                "iDisplayLength" : 20,
                "sDom" : "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
                "aoColumns" : [
                {"sType" : "string"},
                {"sType" : "string"}, 
                {"sType" : "string"},
                {"sType" : "formatted-num"},
                {"sType" : "formatted-num"},
                {"sType" : "date-euro"} 
               ],
                "aaSorting" : [[1, "asc"]],
                "oTableTools" : {
                    "aButtons" : ["copy", "print", {
                        "sExtends" : "collection",
                        "sButtonText" : \'Save <span class="caret" />\',
                        "aButtons" : ["csv", "xls", "pdf"]
                    }],
                    "sSwfPath" : "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
            });
        }
        if ($(\'#contrib-disapproved-list\').length) {
            $(\'#contrib-disapproved-list\').dataTable({
                "sPaginationType" : "bootstrap",
                "iDisplayLength" : 20,
                "sDom" : "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
                "aoColumns" : [
                {"sType" : "string"},
                {"sType" : "string"}, 
                {"sType" : "string"},
                {"sType" : "formatted-num"},
                
                {"sType" : "date-euro"} 
               ],
                "aaSorting" : [[1, "asc"]],
                "oTableTools" : {
                    "aButtons" : ["copy", "print", {
                        "sExtends" : "collection",
                        "sButtonText" : \'Save <span class="caret" />\',
                        "aButtons" : ["csv", "xls", "pdf"]
                    }],
                    "sSwfPath" : "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
            });
        }
        if ($(\'#contrib-closed-list\').length) {
            $(\'#contrib-closed-list\').dataTable({
                "sPaginationType" : "bootstrap",
                "iDisplayLength" : 20,
                "sDom" : "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
                "aoColumns" : [
                {"sType" : "string"},
                {"sType" : "string"}, 
                {"sType" : "string"},
                {"sType" : "formatted-num"},
                
                {"sType" : "date-euro"} 
               ],
                "aaSorting" : [[1, "asc"]],
                "oTableTools" : {
                    "aButtons" : ["copy", "print", {
                        "sExtends" : "collection",
                        "sButtonText" : \'Save <span class="caret" />\',
                        "aButtons" : ["csv", "xls", "pdf"]
                    }],
                    "sSwfPath" : "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
            });
        }
        if ($(\'#client-list\').length) {
            $(\'#client-list\').dataTable({
                "sPaginationType" : "bootstrap",
                "iDisplayLength" : 20,
                "sDom" : "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
                "aoColumns" : [
                {"sType" : "formatted-num"},
                {"sType" : "string"},
                {"sType" : "string"}, 
                {"sType" : "string"},
                {"sType" : "date-euro"} 
               ],
                "aaSorting" : [[1, "asc"]],
                "oTableTools" : {
                    "aButtons" : ["copy", "print", {
                        "sExtends" : "collection",
                        "sButtonText" : \'Save <span class="caret" />\',
                        "aButtons" : ["csv", "xls", "pdf"]
                    }],
                    "sSwfPath" : "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
            });
        }
        if ($(\'#contrib-list\').length) {
            $(\'#contrib-list\').dataTable({
                "sPaginationType" : "bootstrap",
                "iDisplayLength" : 20,
                "sDom" : "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
                "aoColumns" : [
                {"sType" : "formatted-num"},
                {"sType" : "string"},
                {"sType" : "string"},
                {"sType" : "string"}, 
                {"sType" : "string"},
                {"sType" : "date-euro"} 
               ],
                "aaSorting" : [[1, "asc"]],
                "oTableTools" : {
                    "aButtons" : ["copy", "print", {
                        "sExtends" : "collection",
                        "sButtonText" : \'Save <span class="caret" />\',
                        "aButtons" : ["csv", "xls", "pdf"]
                    }],
                    "sSwfPath" : "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
            });
        }

        if ($(\'#inv-list\').length) {
            $(\'#inv-list\').dataTable({
                "sPaginationType" : "bootstrap",
                "iDisplayLength" : 20,
                "sDom" : "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
                "aoColumns" : [
                {"sType" : "string"},
                {"sType" : "formatted-num"},
                {"sType" : "string"},
                {"sType" : "formatted-num"},
                {"sType" : "formatted-num"},
                {"sType" : "formatted-num"},
                {"sType" : "date-euro"},
                {"sType" : "date-euro"},
                {"sType" : "string"}
               ],
                "aaSorting" : [[6, "asc"]],
                "oTableTools" : {
                    "aButtons" : ["copy", "print", {
                        "sExtends" : "collection",
                        "sButtonText" : \'Save <span class="caret" />\',
                        "aButtons" : ["csv", "xls", "pdf"]
                    }],
                    "sSwfPath" : "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
            });
        }

         if ($(\'#inv-list2\').length) {
            $(\'#inv-list2\').dataTable({
                "sPaginationType" : "bootstrap",
                "iDisplayLength" : 20,
                "sDom" : "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
                "aoColumns" : [
                {"sType" : "string"},
                {"sType" : "formatted-num"},
                {"sType" : "string"},
                {"sType" : "formatted-num"},
                {"sType" : "string"}
                ],
                "aaSorting" : [[1, "desc"]],
                "oTableTools" : {
                    "aButtons" : ["copy", "print", {
                        "sExtends" : "collection",
                        "sButtonText" : \'Save <span class="caret" />\',
                        "aButtons" : ["csv", "xls", "pdf"]
                    }],
                    "sSwfPath" : "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
               
            });
        }
		 $("#ong_search").click(function() {
            $("#search_block").toggle(\'slow\');
         });
         $("input[name=\'search_type\']").click(function(){
           // alert($(\'input:radio[name=search_type]:checked\').val());
            if($(\'input:radio[name=search_type]:checked\').val()==5){
                $("#type_1").html(\'Backend\');
                $("#type_2").html(\'Frontend\');
                $("#type_4").html(\'both\');
                $("#type_3").hide(\'slow\');
            }else if($(\'input:radio[name=search_type]:checked\').val()==6){
                $("#type_1").html(\'Senior\');
                $("#type_2").html(\'Junior\');
                $("#type_3").show(\'slow\');
                $("#type_4").html(\'All\');
            }else if($(\'input:radio[name=search_type]:checked\').val()==7){
                $("#type_1").html(\'Paid\');
                $("#type_2").html(\'Not paid\');
                $("#type_3").hide(\'slow\');
                $("#type_4").html(\'Both\');
            }else{
                $("#type_1").html(\'Premium\');
                $("#type_2").html(\'Liberte\');
                $("#type_3").hide(\'slow\');
                $("#type_4").html(\'both\');
            }
            //$("#type_1").toggle(\'slow\');
            //$("#type_2").toggle(\'slow\');
         });
         $(\'#dp_start\').datepicker({
            language : \'fr\'
        }).on(\'changeDate\', function(ev) {
            var dateText = $(this).val();
            //data(\'date\');

            var endDateTextBox = $(\'#dp_end\');
            if (endDateTextBox.val() != \'\') {
                var testStartDate = new Date(dateText);
                var testEndDate = new Date(endDateTextBox.val());
                if (testStartDate > testEndDate) {
                    endDateTextBox.val(dateText);
                }
            } else {
                endDateTextBox.val(dateText);
            };
            $(\'#dp_end\').datepicker(\'setStartDate\', dateText);
            $(\'#dp_start\').datepicker(\'hide\');
        });
        $(\'#dp_end\').datepicker({
            language : \'fr\'
        }).on(\'changeDate\', function(ev) {
            var dateText = $(this).val();
            //data(\'date\');
            var startDateTextBox = $(\'#dp_start\');
            if (startDateTextBox.val() != \'\') {
                var testStartDate = new Date(startDateTextBox.val());
                var testEndDate = new Date(dateText);
                if (testStartDate > testEndDate) {
                    startDateTextBox.val(dateText);
                }
            } else {
                startDateTextBox.val(dateText);
            };
            $(\'#dp_start\').datepicker(\'setEndDate\', dateText);
            $(\'#dp_end\').datepicker(\'hide\');
        });
	});
</script>
<style>
    .label{font-size: 12px!important;}
    .clear{clear:both;}
    .fill{  height: 0;
    width: 25px;}
</style>
'; ?>

<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Payment Stats&#233;s<a class="btn btn-gebo1" id="ong_search" <?php if (count($this->_tpl_vars['data']['result']) > 0): ?><?php else: ?>style='display:none;'<?php endif; ?>>Modify Search</a></h3>
        <div class="well clearfix" <?php if (count($this->_tpl_vars['data']['result']) > 0): ?>style='display:none;'<?php endif; ?> id="search_block">
            <div class="row-fluid">
                <form action="/stats/payment-stats?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="get" id="searchform" name="searchform" >
                    <div>
                    <input type="hidden" id="submenuId" name="submenuId"  value="ML5-SL4"/>
                    <span class="sepV_c">Date </span>
                    <span class="sepV_c">
                        <input type="text" placeholder="start date" id="dp_start" name="start_date" readonly data-date-format="dd-mm-yyyy" value=""/>
                    </span>
                    <span class="sepV_c">
                        <input type="text"  placeholder="end date" id="dp_end" name="end_date" readonly data-date-format="dd-mm-yyyy" value=""/>
                    </span>
                    </div>
                    <div class='clear'></div>
                    <div>
                     <span id='type' class="sepV_c">Type </span>
                     <span class='sepV_c'>
                        
                                        <label class="uni-radio">
                                            <input id='' type="radio" class="uni_style" value="1" name="type"  /><span id='type_1'>Premium</span></label>
                    </span>
                     <span class='sepV_c'>
                        
                                        <label class="uni-radio">
                                            <input id='' type="radio" class="uni_style" value="0" name="type"  /><span id='type_2'>Liberte</span></label>
                    </span>
                    <span id='type_3' class='sepV_c' style='display:none'>
                        
                                        <label class="uni-radio">
                                            <input id='' type="radio" class="uni_style" value="2" name="type"  /><span >Sub-junior</span></label>
                    </span>
                    <span class='sepV_c'>

                                        <label class="uni-radio">
                                            <input id='' type="radio" class="uni_style" value="" name="type" checked='checked' /><span id='type_4'>Both</span></label>
                    </span>
                    </div>
                    <div class='clear'></div>
                    <div>
                        <span class="sepV_c" style='margin-right:8px;'>Search</span>
                        <span class='sepV_c'>
                            <label class="uni-radio">
                                <input id='' type="radio" class="uni_style" value="0" name="search_type"  checked='checked'/>Payment info of Writer</label>
                        </span>
                    </div>
                    <div class='clear'></div>
                    <div>
                        <span class="sepV_c">&nbsp;<div class='fill'>&nbsp;</div></span>
                        <span class='sepV_c'>
                            <label class="uni-radio">
                                <input id='' type="radio" class="uni_style" value="1" name="search_type"  />Payment info of client</label>
                        </span>
                    </div>
                    <div class='clear'></div>

                    <div>
                        <span class="sepV_c">&nbsp;<div class='fill'>&nbsp;</div></span>
                        <span class='sepV_c'>
                            <label class="uni-radio">
                                <input id='' type="radio" class="uni_style" value="2" name="search_type"  />Number of articles validated</label>
                        </span>
                    </div>
                    <div class='clear'></div>
                    <div>
                        <span class="sepV_c">&nbsp;<div class='fill'>&nbsp;</div></span>
                        <span class='sepV_c'>
                            <label class="uni-radio">
                                <input id='' type="radio" class="uni_style" value="3" name="search_type"  />Number of articles disapproved</label>
                        </span>
                    </div>
                    <div class='clear'></div>
                    <div>
                       <span class="sepV_c">&nbsp;<div class='fill'>&nbsp;</div></span>
                        <span class='sepV_c'>
                            <label class="uni-radio">
                                <input id='' type="radio" class="uni_style" value="4" name="search_type"  />Number of articles closed</label>
                        </span>
                    </div>
                    <div class='clear'></div>
                    <div>
                        <span class="sepV_c">&nbsp;<div class='fill'>&nbsp;</div></span>
                        <span class='sepV_c'>
                            <label class="uni-radio">
                                <input id='reg_status' type="radio" class="uni_style" value="5" name="search_type"  />No of clients Registered on the Platform </label>
                        </span>
                    </div>
                    <div class='clear'></div>
                    <div>
                       <span class="sepV_c">&nbsp;<div class='fill'>&nbsp;</div></span>
                        <span class='sepV_c'>
                            <label class="uni-radio">
                                <input id='search_1' type="radio" class="uni_style" value="6" name="search_type"  />No of writers Registered on the Platform</label>
                        </span>
                    </div>
                    <div class='clear'></div>
                    <div>
                       <span class="sepV_c">&nbsp;<div class='fill'>&nbsp;</div></span>
                        <span class='sepV_c'>
                            <label class="uni-radio">
                                <input id='search_1' type="radio" class="uni_style" value="7" name="search_type"  />Invoice Stats</label>
                        </span>
                    </div>
                    <div class='clear'></div>
                    <div>
                       <span class="sepV_c">&nbsp;<div class='fill'>&nbsp;</div></span>
                        <span class='sepV_c'>
                            &nbsp;
                        </span>
                    </div>
                    <div class='clear'></div>
                    <div>
                    <span class="sepV_c">
                        <span class="sepV_c">&nbsp;<div class='fill'>&nbsp;</div></span>
                        <button class="btn btn-warning pull-center" id="clear" name="clear" type="button" value="clear" onclick="clearAll();" >
                            Clear
                        </button>
                        <button class="btn btn-primary pull-center" id="search" name="search" type="submit" value="search" >
                            Search
                        </button>
                         </span>
                    </div>    
                    <!--</div>-->
                </form>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="span12" style='margin-left:0;'>
        <?php if (count($this->_tpl_vars['data']) > 0): ?>

        <h3 class="heading">Result</h3>
        <div class="well clearfix" id="result_block">
        <?php switch ($this->_tpl_vars['data']['search_type']) { ?>
<?php case '0': ?>
                <?php $this->assign('total_royalties', 0); ?>
                <table class="table table-striped table-bordered dTableR" id='contrib-payments-list'>
                <thead>
                    <th>Article Title</th>
                    <th>Writer Email</th>
                    <th>Writer Name</th>
                    <th>Royalties</th>
                    <th>Date</th>

                </thead>
                <tbody>
                  
                    <?php $_from = $this->_tpl_vars['data']['result'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['payment_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['payment_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contrib_key'] => $this->_tpl_vars['payment_item']):
        $this->_foreach['payment_loop']['iteration']++;
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['payment_item']['title']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['payment_item']['email']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['payment_item']['first_name']; ?>
 &nbsp;<?php echo $this->_tpl_vars['payment_item']['last_name']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['payment_item']['Contrib_share']; ?>
</td>
                        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y %H:%M') : smarty_modifier_date_format($_tmp, '%d/%m/%Y %H:%M')); ?>
</td>
                    </tr>
                    <?php $this->assign('total_royalties', $this->_tpl_vars['total_royalties']+$this->_tpl_vars['payment_item']['Contrib_share']); ?>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
                </table>
                <?php if ($this->_tpl_vars['total_royalties'] != 0): ?>
                     <div style="width: 100%;float: left;"><h3>Total Articles : <?php echo count($this->_tpl_vars['data']['result'][0]); ?>
 </h3><h3> Total Contributers Royalties Paid : <?php echo $this->_tpl_vars['total_royalties']; ?>
</h3></div>
                <?php endif; ?>
            <?php break; ?>
            <?php case '1': ?>
                <?php $this->assign('total_amount_paid', 0); ?>
                <?php $this->assign('total_amount', 0); ?>
                <?php $this->assign('total_tax', 0); ?>
                <table class="table table-striped table-bordered dTableR" id='client-payments-list'>
                    <thead>
                        <th>Article Title</th>
                        <th>Client Email</th>
                        <th>Article Price</th>
                       
                        <th>Total Price with Tax</th>
                        <th>Payment Type</th>
                        <th>Date</th>

                    </thead>
                    <tbody>
                      
                        <?php $_from = $this->_tpl_vars['data']['result'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['payment_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['payment_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contrib_key'] => $this->_tpl_vars['payment_item']):
        $this->_foreach['payment_loop']['iteration']++;
?>
                        <tr>
                            <td><?php echo $this->_tpl_vars['payment_item']['title']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['email']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['amount']; ?>
</td>
                           
                            <td><?php echo $this->_tpl_vars['payment_item']['amount_paid']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['type']; ?>
</td>
                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y %H:%M') : smarty_modifier_date_format($_tmp, '%d/%m/%Y %H:%M')); ?>
</td>
                        </tr>
                        <?php $this->assign('total_amount_paid', $this->_tpl_vars['total_amount_paid']+$this->_tpl_vars['payment_item']['amount_paid']); ?>
                        <?php $this->assign('total_amount', $this->_tpl_vars['total_amount']+$this->_tpl_vars['payment_item']['amount']); ?>
                        <?php $this->assign('total_tax', $this->_tpl_vars['total_tax']+$this->_tpl_vars['payment_item']['tax']); ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </tbody>
                </table>
                <?php if (count($this->_tpl_vars['data']['result'][0]) != 0): ?>
                     <div style="width: 100%;float: left;">
                        <h3>Total Articles : <?php echo count($this->_tpl_vars['data']['result'][0]); ?>
 </h3>
                        <h3> Total Amount Paid with Tax : <?php echo $this->_tpl_vars['total_amount_paid']; ?>
</h3>
                        <h3> Total Amount Paid without Tax : <?php echo $this->_tpl_vars['total_amount']; ?>
</h3>
                        <h3> Total Amount Paid as a Tax : <?php echo $this->_tpl_vars['total_tax']; ?>
</h3>
                    </div>
                <?php endif; ?>
                <?php break; ?>
            <?php case '2': ?>
                <?php $this->assign('total_amount_paid', 0); ?>
                <?php $this->assign('total_amount_requested', 0); ?>
                
                <table class="table table-striped table-bordered dTableR" id='contrib-validated-list'>
                <thead>
                    <th>Article Title</th>
                    <th>AO Title</th>
                    <th>Writer Email</th>
                    <th>Writer Price</th>
                    <th>EP Price</th>
                    <th>Date</th>

                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['data']['result'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['payment_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['payment_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contrib_key'] => $this->_tpl_vars['payment_item']):
        $this->_foreach['payment_loop']['iteration']++;
?>
                        <tr>
                            <td><?php echo $this->_tpl_vars['payment_item']['article_title']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['ao_title']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['email']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['price_user']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['amount']; ?>
</td>
                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y %H:%M') : smarty_modifier_date_format($_tmp, '%d/%m/%Y %H:%M')); ?>
</td>
                        </tr>
                        <?php $this->assign('total_amount_paid', $this->_tpl_vars['total_amount_paid']+$this->_tpl_vars['payment_item']['amount']); ?>
                        <?php $this->assign('total_amount_requested', $this->_tpl_vars['total_amount_requested']+$this->_tpl_vars['payment_item']['price_user']); ?>
                        
                        <?php endforeach; endif; unset($_from); ?>
                </tbody>
                </table>
                <?php if (count($this->_tpl_vars['data']['result'][0]) != 0): ?>
                     <div style="width: 100%;float: left;">
                        <h3> Total Articles : <?php echo count($this->_tpl_vars['data']['result'][0]); ?>
 </h3>
                        <h3> Total Amount Requested by Writers : <?php echo $this->_tpl_vars['total_amount_requested']; ?>
</h3>
                        <h3> Total Amount Paid without Tax by EP : <?php echo $this->_tpl_vars['total_amount_paid']; ?>
</h3>
                      
                    </div>
                <?php endif; ?>
            <?php break; ?>
            <?php case '3': ?>
                
                <?php $this->assign('total_amount_requested', 0); ?>
                
                <table class="table table-striped table-bordered dTableR" id='contrib-disapproved-list'>
                <thead>
                    <th>Article Title</th>
                    <th>AO Title</th>
                    <th>Writer Email</th>
                    <th>Writer Price</th>
                   
                    <th>Date</th>

                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['data']['result'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['payment_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['payment_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contrib_key'] => $this->_tpl_vars['payment_item']):
        $this->_foreach['payment_loop']['iteration']++;
?>
                        <tr>
                            <td><?php echo $this->_tpl_vars['payment_item']['article_title']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['ao_title']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['email']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['price_user']; ?>
</td>
                           
                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y %H:%M') : smarty_modifier_date_format($_tmp, '%d/%m/%Y %H:%M')); ?>
</td>
                        </tr>
                        
                        <?php $this->assign('total_amount_requested', $this->_tpl_vars['total_amount_requested']+$this->_tpl_vars['payment_item']['price_user']); ?>
                        
                        <?php endforeach; endif; unset($_from); ?>
                </tbody>
                </table>
                <?php if (count($this->_tpl_vars['data']['result'][0]) != 0): ?>
                     <div style="width: 100%;float: left;">
                        <h3> Total Articles : <?php echo count($this->_tpl_vars['data']['result'][0]); ?>
 </h3>
                        <h3> Total Amount Requested by Writers : <?php echo $this->_tpl_vars['total_amount_requested']; ?>
</h3>
                       
                      
                    </div>
                <?php endif; ?>
            <?php break; ?>
            <?php case '4': ?>
                
                <?php $this->assign('total_amount_requested', 0); ?>
                
                <table class="table table-striped table-bordered dTableR" id='contrib-closed-list'>
                <thead>
                    <th>Article Title</th>
                    <th>AO Title</th>
                    <th>Writer Email</th>
                    <th>Writer Price</th>
                   
                    <th>Date</th>

                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['data']['result'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['payment_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['payment_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contrib_key'] => $this->_tpl_vars['payment_item']):
        $this->_foreach['payment_loop']['iteration']++;
?>
                        <tr>
                            <td><?php echo $this->_tpl_vars['payment_item']['article_title']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['ao_title']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['email']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['price_user']; ?>
</td>
                           
                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y %H:%M') : smarty_modifier_date_format($_tmp, '%d/%m/%Y %H:%M')); ?>
</td>
                        </tr>
                        
                        <?php $this->assign('total_amount_requested', $this->_tpl_vars['total_amount_requested']+$this->_tpl_vars['payment_item']['price_user']); ?>
                        
                        <?php endforeach; endif; unset($_from); ?>
                </tbody>
                </table>
                <?php if (count($this->_tpl_vars['data']['result'][0]) != 0): ?>
                     <div style="width: 100%;float: left;">
                        <h3> Total Articles : <?php echo count($this->_tpl_vars['data']['result'][0]); ?>
 </h3>
                        <h3> Total Amount Requested by Writers : <?php echo $this->_tpl_vars['total_amount_requested']; ?>
</h3>
                      
                      
                    </div>
                <?php endif; ?>
            <?php break; ?>
            <?php case '5': ?>
                <table class="table table-striped table-bordered dTableR" id='client-list'>
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Verification Status</th>
                    <th>Date Created</th>

                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['data']['result'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['payment_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['payment_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contrib_key'] => $this->_tpl_vars['payment_item']):
        $this->_foreach['payment_loop']['iteration']++;
?>
                    
                        <tr>
                            <td><?php echo smarty_function_counter(array(), $this);?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['first_name']; ?>
  <?php echo $this->_tpl_vars['payment_item']['last_name']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['email']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['verified_status']; ?>
</td>
                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y %H:%M') : smarty_modifier_date_format($_tmp, '%d/%m/%Y %H:%M')); ?>
</td>
                        </tr>
                       
                       
                        
                        <?php endforeach; endif; unset($_from); ?>
                </tbody>
                </table>
                <?php if (count($this->_tpl_vars['data']['result'][0]) != 0): ?>
                     <div style="width: 100%;float: left;">
                        <h3> Total Clients : <?php echo count($this->_tpl_vars['data']['result'][0]); ?>
 </h3>
                        
                      
                      
                    </div>
                <?php endif; ?>
            <?php break; ?>
            <?php case '6': ?>
                <table class="table table-striped table-bordered dTableR" id='contrib-list'>
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Profile Type</th>
                    <th>Verification Status</th>
                    <th>Date Created</th>

                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['data']['result'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['payment_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['payment_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contrib_key'] => $this->_tpl_vars['payment_item']):
        $this->_foreach['payment_loop']['iteration']++;
?>
                    
                        <tr>
                            <td><?php echo smarty_function_counter(array(), $this);?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['first_name']; ?>
  <?php echo $this->_tpl_vars['payment_item']['last_name']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['email']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['profile_type']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['payment_item']['verified_status']; ?>
</td>
                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y %H:%M') : smarty_modifier_date_format($_tmp, '%d/%m/%Y %H:%M')); ?>
</td>
                        </tr>
                       
                       
                        
                        <?php endforeach; endif; unset($_from); ?>
                </tbody>
                </table>
                <?php if (count($this->_tpl_vars['data']['result'][0]) != 0): ?>
                     <div style="width: 100%;float: left;">
                        <h3> Total Contributers : <?php echo count($this->_tpl_vars['data']['result'][0]); ?>
 </h3>
                        
                      
                      
                    </div>
                <?php endif; ?>
            <?php break; ?>
            <?php case '7': ?>
				 <table class="table table-striped table-bordered dTableR" id='inv-list'>
					<thead>
						<th>Invoice Id</th>
						<th>User Id</th>
						<th>Email</th>
						<th>Total Invoice</th>
						<th>Invoice Paid</th>
						<th>Tax</th>
						<th>Date Created</th>
						<th>Paid Date</th>
						<th>Status</th>

					</thead>
					<tbody>
						<?php $_from = $this->_tpl_vars['data']['result'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['inv_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['inv_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['inv_key'] => $this->_tpl_vars['inv_item']):
        $this->_foreach['inv_loop']['iteration']++;
?>
						
							<tr>
								<td><?php echo $this->_tpl_vars['inv_item']['invoiceId']; ?>
</td>
								<td><?php echo $this->_tpl_vars['inv_item']['identifier']; ?>
</td>
								<td><?php echo $this->_tpl_vars['inv_item']['email']; ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['inv_item']['total_invoice'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['inv_item']['total_invoice_paid'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['inv_item']['tax'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['inv_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y %H:%M') : smarty_modifier_date_format($_tmp, '%d/%m/%Y %H:%M')); ?>
</td>
								<td><?php if ($this->_tpl_vars['inv_item']['status'] == 'Paid'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['inv_item']['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y %H:%M') : smarty_modifier_date_format($_tmp, '%d/%m/%Y %H:%M')); ?>
<?php else: ?><?php endif; ?></td>
								<td><?php echo $this->_tpl_vars['inv_item']['status']; ?>
</td>
							</tr>
						   
						   
							
							<?php endforeach; endif; unset($_from); ?>
					</tbody>
				</table>
				<div class='clearfix'></div>
				<div style='margin-top:20px;'></div>
				<h4 class="heading">Nationality Wise Stats</h4>
				<table class="table table-striped table-bordered dTableR" id='inv-list2'>
					<thead>
						<th>Nationality</th>
						<th>Sum Of Invoices</th>
						<th>%</th>
						<th>Sum Of Invoices After Tax Deduction</th>
						<th>%</th>
						
					</thead>
					<tfoot>
						<tr>
							<th>Total</th>
							<th><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['total']['total'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</th>
							<th><?php if ($this->_tpl_vars['data']['total']['total'] != 0): ?>100%<?php else: ?>0%<?php endif; ?></th>
							<th><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['total']['paid'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</th>
							<th><?php if ($this->_tpl_vars['data']['total']['paid'] != 0): ?>100%<?php else: ?>0%<?php endif; ?></th>
						</tr>
					</tfoot>
					<tbody>
						<?php $_from = $this->_tpl_vars['data']['result'][1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['inv_loop2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['inv_loop2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['inv_key2'] => $this->_tpl_vars['inv_item2']):
        $this->_foreach['inv_loop2']['iteration']++;
?>
						
							<tr>
								<td><?php echo $this->_tpl_vars['data']['nationality'][$this->_tpl_vars['inv_item2']['nationality']]; ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['inv_item2']['total'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</td>
								<td><?php echo smarty_function_math(array('assign' => ($this->_tpl_vars['percentage']),'equation' => "(x / y) * 100",'x' => $this->_tpl_vars['inv_item2']['total'],'y' => $this->_tpl_vars['data']['total']['total'],'format' => "%.2f"), $this);?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['inv_item2']['paid'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</td>
								<td><?php echo smarty_function_math(array('assign' => ($this->_tpl_vars['percentage']),'equation' => "(x / y) * 100",'x' => $this->_tpl_vars['inv_item2']['paid'],'y' => $this->_tpl_vars['data']['total']['paid'],'format' => "%.2f"), $this);?>
</td>

							</tr>
						   
						   
							
							<?php endforeach; endif; unset($_from); ?>
					</tbody>
				</table>
            <?php break; ?>
            <?php default; ?>
            Wrong Choice
        <?php } ?>
        <?php endif; ?>
    </div>
    </div>
</div>