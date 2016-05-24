<?php /* Smarty version 2.6.19, created on 2016-03-29 15:18:44
         compiled from gebo/stats/clientinvoices.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/stats/clientinvoices.phtml', 210, false),array('modifier', 'replace', 'gebo/stats/clientinvoices.phtml', 582, false),array('modifier', 'ceil', 'gebo/stats/clientinvoices.phtml', 586, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/BO/theme/gebo/css/jquery.multiselect.filter.css" type="text/css"/>
<link rel="stylesheet" href="/BO/theme/gebo/css/jquery.multiselect.css" type="text/css"/>
<script src="/BO/theme/gebo/js/jquery.multiselect.filter.js" type="text/javascript" charset="utf-8"></script>
<script src="/BO/theme/gebo/js/jquery.multiselect.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" >
function getUrlVars()
{
    var vars = [], hash;

    var hashes = window.location.href.slice(window.location.href.indexOf(\'?\') + 1).split(\'&\');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split(\'=\');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function getArrayUrl()
{
    // our test url
    var url =$(location).attr(\'href\');
    // filtering the string..
    var paramsList = url.slice(url.indexOf("?")+1,url.length) ;    //alert(paramsList);
    ///return paramsList;
    var filteredList =  paramsList.split("&") ;
    // an object to store arrays
    var objArr = {} ;

    // the below loop is obvious... we just remove the [] and +.. and split into pair of key and value.. and store as an array...
    for (var i=0, l=filteredList.length; i <l; i +=1 ) {
        // alert(filteredList[i]);
        var param = decodeURIComponent(filteredList[i].replace("[]","")).replace(/\\+/g," ") ;       //alert(param);
        var pair = param.split("=") ;
        if(!objArr[pair[0]]) {  objArr[pair[0]] = [] ;}
        objArr[pair[0]].push(pair[1]);

    }
    return  objArr;

}


var ctype = getUrlVars()["counttype"];
var count = getUrlVars()["count"];
$(function() {
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
    $(document).ready(function() {

        $("#clientname").multiselect();
        $("#clientname").multiselectfilter();
        //gebo_select_row.init();
        var all_invoice_ids=new Array();
        $(".uni_style").uniform();
        if ($(\'#contrib-payments-list\').length) {
            var otable =  $(\'#contrib-payments-list\').dataTable({
                "aaSorting": [[ 3, "desc" ]],
                "oTableTools": {
                    "aButtons": [
                        "copy",
                        "print",
                        {
                            "sExtends":    "collection",
                            "sButtonText": \'Sauvegarder <span class="caret" />\',
                            "aButtons":    [ "csv", "xls", "pdf" ]
                        }
                    ],
                    "sSwfPath": "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                }
            });
        }
        else
        {
            //alert("hey baby");
        }
        $("#ong_search").click(function() {
            $("#search_block").toggle();
        });

        $("#sel_type").chosen({
            allow_single_deselect : true,
            search_contains : true
        });
        $("#contribname").chosen({
            allow_single_deselect : true,
            search_contains : true
        });
        $("#paid_type").chosen({
            allow_single_deselect : true,
            search_contains : true
        });
        /*
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
        */
        /////date picker for the date of paid invoices///
        $(\'#paiddp_start\').datepicker({
            language : \'fr\'
        }).on(\'changeDate\', function(ev) {
                var dateText = $(this).val();
                //data(\'date\');

                var endDateTextBox = $(\'#paiddp_end\');
                if (endDateTextBox.val() != \'\') {
                    var testStartDate = new Date(dateText);
                    var testEndDate = new Date(endDateTextBox.val());
                    if (testStartDate > testEndDate) {
                        endDateTextBox.val(dateText);
                    }
                } else {
                    endDateTextBox.val(dateText);
                };
                $(\'#paiddp_end\').datepicker(\'setStartDate\', dateText);
                $(\'#paiddp_start\').datepicker(\'hide\');
            });
        $(\'#paiddp_end\').datepicker({
            language : \'fr\'
        }).on(\'changeDate\', function(ev) {
                var dateText = $(this).val();
                //data(\'date\');
                var startDateTextBox = $(\'#paiddp_start\');
                if (startDateTextBox.val() != \'\') {
                    var testStartDate = new Date(startDateTextBox.val());
                    var testEndDate = new Date(dateText);
                    if (testStartDate > testEndDate) {
                        startDateTextBox.val(dateText);
                    }
                } else {
                    startDateTextBox.val(dateText);
                };
                $(\'#paiddp_start\').datepicker(\'setEndDate\', dateText);
                $(\'#paiddp_end\').datepicker(\'hide\');
            });

        $(\'#select_rows\').click(function() {
            /*for (var i = 1; i <= '; ?>
<?php echo count($this->_tpl_vars['paginator']); ?>
<?php echo '; i++) {
                if($(\'#row_sel\'+i).length)
                {
                    if($(\'#select_rows\').is(\':checked\')){
                        if(! $(\'#row_sel\'+i).is(\':checked\')){$(\'#row_sel\'+i).click();}
                    }
                    else
                    {
                        if($(\'#row_sel\'+i).is(\':checked\')){$(\'#row_sel\'+i).click();}
                    }
                }
            }*/
           //alert(\'#select_rows\');
            
            if($("#select_rows").attr(\'checked\'))
            {
                var $b = $(\'input[type=checkbox]\');
                $b.attr(\'checked\', true);
            }
            else
            {
                var $b = $(\'input[type=checkbox]\');
                $b.attr(\'checked\', false);
            }
            
            for (var i = 1; i <= '; ?>
<?php echo count($this->_tpl_vars['paginator']); ?>
<?php echo '; i++) {
                if($(\'#row_sel\'+i).length)
                {
                    if($("#select_rows").attr(\'checked\'))
                        $(\'#row_sel\'+i).closest( "span" ).prop("class","uni-checked");
                    else
                        $(\'#row_sel\'+i).closest( "span" ).prop("class","");
                }
            }
            calculateTotal();
        });
    });
    jQuery.fn.dataTableExt.oSort[\'payable-asc\'] = function(a, b) {//alert(\'a=\'+a);alert(\'b=\'+b);
            a = a.replace(\'<span class="label label-inverse pull-right">\', \'\');
            a = a.replace(\'</span>\', \'\');
            a = replaceAll(a, \' \', \'\');
            a = a.replace(\',\', \'.\');
            a = a*1;
            b = b.replace(\'<span class="label label-inverse pull-right">\', \'\');
            b = b.replace(\'</span>\', \'\');
            b = replaceAll(b, \' \', \'\');
            b = b.replace(\',\', \'.\');
            b = b*1;
            var c = ((a < b) ? -1 : ((a > b) ? 1 : 0));
            return c;
    };
    jQuery.fn.dataTableExt.oSort[\'payable-desc\'] = function(a, b) {//alert(\'a=\'+a);alert(\'b=\'+b);
            a = a.replace(\'<span class="label label-inverse pull-right">\', \'\');
            a = a.replace(\'</span>\', \'\');
            a = replaceAll(a, \' \', \'\');
            a = a.replace(\',\', \'.\');
            a = a*1;
            b = b.replace(\'<span class="label label-inverse pull-right">\', \'\');
            b = b.replace(\'</span>\', \'\');
            b = replaceAll(b, \' \', \'\');
            b = b.replace(\',\', \'.\');
            b = b*1;
            var c = ((a < b) ? 1 : ((a > b) ? -1 : 0));
            return c;
    };
    function clearAll()
    {
        $("#dp_start").val(\'\');
        $("#dp_end").val(\'\');
        $("#contribname").val(\'\');
        $("#invoicename").val(\'\');
        $("#sel_type").val(\'\').trigger("liszt:updated");
        $("#paid_type").val(\'\').trigger("liszt:updated"); 
        $("#contribname").val(\'\').trigger("liszt:updated"); 
    }
    function replaceAll(string, token, newtoken) {
        if(token!=newtoken)
        while(string.indexOf(token) > -1) {
            string = string.replace(token, newtoken);
        }
        return string;
    }
    function formatNumber(yourNumber) {
        yourNumber = parseFloat(yourNumber).toFixed(2);
        var n= yourNumber.toString().split(".");
        n[0] = n[0].replace(/\\B(?=(\\d{3})+(?!\\d))/g, " ");
        var n1 = n.join(",");
        if(typeof n[1] === \'undefined\')
        {
            n1 += (n1 + ",00");
        }
        return n1;
    }
    function selectALL() {
        var nchekd = 1;
        for (var i = 1; i <= '; ?>
<?php echo count($this->_tpl_vars['paginator']); ?>
<?php echo '; i++) {
            if($(\'#row_sel\'+i).length){if(! $(\'#row_sel\'+i).is(\':checked\')){nchekd=0;}}
        }
        if(nchekd==1){if(! $(\'#select_rows\').is(\':checked\')){
            $(\'#select_rows\').attr("checked",true);
            $(\'#select_rows\').closest( "span" ).prop("class","uni-checked");
        }}
        else{if($(\'#select_rows\').is(\':checked\')){
            $(\'#select_rows\').attr("checked",false);
            $(\'#select_rows\').closest( "span" ).prop("class","");
        }}
    }

    function calculateTotal() {

        var $b = $(\'input[type=checkbox]\');
        var countselected = $b.filter(\':checked\').length;
        if (countselected >= 1) {
            var selected = new Array();

            $b.filter(\':checked\').each(function() {
                if ($(this).attr(\'value\') != \'all\')
                    selected.push($(this).attr(\'value\'));
            });
            var total = 0;
            for (var i = 0; i < selected.length; i++) {
                selected[i] = replaceAll(selected[i], \' \', \'\');
                selected[i] = selected[i].replace(\',\', \'.\');
                total += parseFloat(selected[i]);
            }
            //$("#sumupselected").html("selected :" + total.toFixed(1));
            $("#sumupselected").html("selected : " + formatNumber(total));
        } else
            $("#sumupselected").html("");

    }
        function validateAll()
        {
            var $b = $(\'input[type=checkbox]\');
            var countselected = $b.filter(\':checked\').length;
            if(countselected >= 1)
            {
               var selected = new Array();
               $b.filter(\':checked\').each(function() {
               selected.push($(this).attr(\'name\'));
               });
               $("#hide_total").val(selected);
                var url = "/BO/download_invoice.php?invoice_id="+selected;
                $(location).attr(\'href\',url);
               return true;
            }
            else
            {
               smoke.alert("Merci de s\\u00e9lectionner au moins 1.");
               return false;
            }
        }
        
    function printInvoice(para) {
        var $b = $(\'input[type=checkbox]\');
        var countselected = $b.filter(\':checked\').length;
        if (countselected == 1 && para == 1) {
            var selected = new Array();
            $b.filter(\':checked\').each(function() {
                selected.push($(this).attr(\'name\'));
            });
            /* var string = selected;
             var arr = string.split(\'_\');alert(arr[0]);alert(arr[1]);*/
            $("#hide_total").val(selected);
            var target_page = "/stats/generatepdf?invoiceid=" + selected;
            $.post(target_page, function(data) {//alert(data);
                window.open("/stats/generatepdf?submenuId=ML5-SL1&invoiceid=" + selected + "&print=yes", \'_blank\');
                $(function() {
                    $("#logo").show();
                    $("#tag1").show();
                    $("#tag2").show();
                    $("#invoicePrint").print();

                });
            });
        } else if (para != 1) {
            selected = para;
            $("#hide_total").val(selected);
            var target_page = "/stats/generatepdf?invoiceid=" + selected;
            $.post(target_page, function(data) {//alert(data);

                var windowName = "popUp";
                //$(this).attr("name");
                window.open("/stats/generatepdf?submenuId=ML5-SL1&invoiceid=" + selected + "&print=yes", windowName, width = "800", hieght = "1000", scrollbars = "yes");

                $(function() {
                    $("#logo").show();
                    $("#tag1").show();
                    $("#tag2").show();
                    $("#invoicePrint").print();

                });
            });
        } else {
            smoke.alert("select only 1 invoice.");
            return false;
        }
    }
    function downloadxlsx() {
        var url = window.location.href;
        var url = url.replace(\'client-invoices?\',\'download-client-invoices-xls?download=yes&\')
        window.location.href = url;
    }
    function downloadzip() {
        var url = window.location.href;
        var url = url.replace(\'client-invoices?\',\'download-client-invoices-zip?download=yes&\')
        window.location.href = url;
    }

</script>

<style>
    .label{font-size: 12px!important;}
</style>
'; ?>


<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Client Invoices<a class="btn btn-gebo1" id="ong_search">Search</a></h3>
        <div class=" well clearfix" id="search_block">
            <div class="row-fluid">
                <form action="/stats/client-invoices?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post" id="searchform" name="searchform" >
                    <input type="hidden" id="submenuId" name="submenuId"  value="ML5-SL3"/>


					<div class="span12">
                        <table>
                            <tr>
                                <td><label>From Date Payment :</label></td>
                                <td><label>To Date Payment :</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="sepV_c" >
                                        <input type="text" placeholder="start date" id="dp_start" name="pdstart_date" readonly data-date-format="dd-mm-yyyy" value="<?php echo $_POST['pdstart_date']; ?>
"/>
                                    </span>
                                </td>
                                <td>
                                    <span class="sepV_c">
                                        <input type="text"  placeholder="end date" id="dp_end" name="pdend_date" readonly data-date-format="dd-mm-yyyy" value="<?php echo $_POST['pdend_date']; ?>
"/>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="sepV_c">
                                        <label>Pay type</label>
                                        <select name="sel_type" id="sel_type" data-placeholder="Pay type">
                                            <option value="">All</option>
                                            <option value="Paypal" <?php if ($_POST['sel_type'] == 'Paypal'): ?> selected<?php endif; ?>>Paypal</option>
                                            <option value="PP" <?php if ($_POST['sel_type'] == 'PP'): ?> selected<?php endif; ?>>PP</option>
                                            <option value="CC" <?php if ($_POST['sel_type'] == 'CC'): ?> selected<?php endif; ?>>CC</option>
											<option value="FO" <?php if ($_POST['sel_type'] == 'FO'): ?> selected<?php endif; ?>>FO</option>
                                        </select>
                                    </span>
                                </td>
                                <td>
                                    <span class="sepV_c">
                                        <label>Client Details</label>
                                        <!--<select name="clientname[]" id="clientname" multiple="multiple" style="width:250px;" Onchange="updatecontribtype();">
                                            <?php if (count($this->_tpl_vars['publish_langarray']) > 0): ?>
                                                <?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
                                                    <?php if (in_array ( $this->_tpl_vars['langkey'] , $this->_tpl_vars['publish_langarray'] )): ?>
                                                        <option value="<?php echo $this->_tpl_vars['langkey']; ?>
" selected><?php echo $this->_tpl_vars['langitem']; ?>
</option>
                                                    <?php else: ?>
                                                        <option value="<?php echo $this->_tpl_vars['langkey']; ?>
"><?php echo $this->_tpl_vars['langitem']; ?>
</option>
                                                    <?php endif; ?>
                                                <?php endforeach; endif; unset($_from); ?>
                                            <?php else: ?>
                                                <?php $_from = $this->_tpl_vars['Contrib_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['langitem']):
?>
                                                <option value="<?php echo $this->_tpl_vars['langkey']; ?>
" selected><?php echo $this->_tpl_vars['langitem']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            <?php endif; ?>
                                        </select>-->
                                        <select id="clientname" name="clientname[]"  multiple="multiple" data-placeholder="Clients">
                                            $client_invoiced
                                            <?php $_from = $this->_tpl_vars['client_invoiced']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['clientkey'] => $this->_tpl_vars['client']):
?>

                                            <?php if ($this->_tpl_vars['clientkey'] == $_POST['clientname']): ?>

                                            <option value="<?php echo $this->_tpl_vars['clientkey']; ?>
" selected><?php echo $this->_tpl_vars['client']; ?>
</option>

                                            <?php else: ?>

                                            <option value="<?php echo $this->_tpl_vars['clientkey']; ?>
"><?php echo $this->_tpl_vars['client']; ?>
</option>

                                            <?php endif; ?>

                                            <?php endforeach; endif; unset($_from); ?>
                                        </select>
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <button class="btn btn-danger pull-center" id="search" name="search" type="submit" value="search" >
                                        Search
                                    </button>

                                    <button class="btn btn-info pull-center" id="clear" name="clear" type="button" value="clear" onclick="clearAll();" >
                                        Clear
                                    </button>
                                </td>
                            </tr>
                        </table>


					</div>

                </form>

            </div>
        </div>
        <div class="results">
            <?php if ($this->_tpl_vars['nores']): ?>
                <h1> No Results Found in database </h1>
            <?php else: ?>
                    <table class="table table-striped table-bordered dTableR" id="contrib-payments-list">


                    <?php if ($this->_tpl_vars['search'] == 'search'): ?>
                    <thead>
                    <?php if ($_POST['pdstart_date'] != ''): ?>
                    <tr>
                        <th colspan="6">Cleint invoices for the period of <?php echo $_POST['pdstart_date']; ?>
 to <?php echo $_POST['pdend_date']; ?>
</th>
                    </tr>
                    <?php endif; ?>
                    <!--<th class="table_checkbox"><input type="checkbox" name="select_rows" id="select_rows" class="uni_style" value="all"/></th>-->


                    </thead>
                    <tbody>
                    <?php $this->assign('foo', 0); ?>
                    <?php $this->assign('total', 0); ?>
                    <?php $this->assign('grand', 0); ?>
                    <?php $this->assign('count', 1); ?>
                    <?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['payablecontrib_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['payablecontrib_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['payablecontrib_key'] => $this->_tpl_vars['payablecontrib_item']):
        $this->_foreach['payablecontrib_loop']['iteration']++;
?>
                    <?php if ($this->_tpl_vars['foo'] != $this->_tpl_vars['payablecontrib_item']['user_id']): ?>
                    <?php if ($this->_tpl_vars['total'] != 0): ?>
                    <tr >
                        <td colspan="5" align="right">Total</td>
                        <td colspan="1"><?php echo $this->_tpl_vars['total']; ?>
</td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                    </tr>
                    <?php $this->assign('total', 0); ?>
                    <?php $this->assign('count', 1); ?>
                    <?php endif; ?>
                    <tr>
                        <th colspan="6" align="right">
                             <?php if ($this->_tpl_vars['payablecontrib_item']['company_name'] != ""): ?>
                                    Cleint :<?php echo $this->_tpl_vars['payablecontrib_item']['company_name']; ?>

                                <?php else: ?>
                                    Cleint Name:<?php echo $this->_tpl_vars['payablecontrib_item']['client_name']; ?>


                            <?php endif; ?>
                            &nbsp;
                            Email : <a href="/user/client-edit?submenuId=ML10-SL2&tab=viewclient&userId=<?php echo $this->_tpl_vars['payablecontrib_item']['user_id']; ?>
" target="_blank"><?php echo $this->_tpl_vars['payablecontrib_item']['email']; ?>
</a>
                        </th>
                    </tr>
                    </tr><tr>
                        <th>SL.No.</th>
                        <th>Article title</th>
                        <th>Paid Date</th>
                        <th>Article cost</th>
                        <th>Tax(%)</th>
                        <th>Total Cost</th>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <!--<td><input type="checkbox" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['payablecontrib_item']['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
" id="row_sel<?php echo ($this->_foreach['payablecontrib_loop']['iteration']-1)+1; ?>
" class="uni_style" value="<?php echo $this->_tpl_vars['payablecontrib_item']['total_invoice_paid']; ?>
" onclick="calculateTotal();selectALL();" /></td>-->
                        <td><?php echo $this->_tpl_vars['count']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['payablecontrib_item']['article_title']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['payablecontrib_item']['created_at']; ?>
</td>
                        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payablecontrib_item']['amount'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
</td>
                        <td><?php echo $this->_tpl_vars['payablecontrib_item']['tax']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['payablecontrib_item']['amount_paid']; ?>
</td>
                    </tr>
                    <?php $this->assign('foo', $this->_tpl_vars['payablecontrib_item']['user_id']); ?>
                    <?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['payablecontrib_item']['amount_paid']); ?>
                    <?php $this->assign('grand', $this->_tpl_vars['grand']+$this->_tpl_vars['payablecontrib_item']['amount_paid']); ?>
                    <?php $this->assign('count', $this->_tpl_vars['count']+1); ?>

                    <?php endforeach; endif; unset($_from); ?>
                    <tr>
                        <td colspan="5" align="right">Total</td>
                        <td colspan="1"><?php echo $this->_tpl_vars['total']; ?>
</td>
                    </tr>
                    <tr>
                        <td colspan=6></td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">Grand Total</td>
                        <td colspan="1"><?php echo $this->_tpl_vars['grand']; ?>
</td>
                    </tr>
                    </tbody>
                    <?php endif; ?>

                </table>
                <!-- <div style="width: 100%;float: left;"><span class="label" id="sumup" style="float: left; margin-left: 410px;margin-bottom: 5px;">Total : <?php echo $this->_tpl_vars['total_amount_to_be_paid']; ?>
</span></div>-->

                <div style="width: 100%;float: left;"><span class="label" id="sumupselected" style="float: left; margin-left: 410px;"></span></div>

                <input type="hidden" id="hide_total" name="hide_total"  />

                <?php if ($_POST['search'] == search): ?>

                    <button onclick="downloadxlsx();" class="btn btn-success">Download the XLSX</button>
                    <button onclick="downloadzip();" class="btn btn-success">Download invoices in ZIP</button>

                <?php endif; ?>
            <?php endif; ?><!--nores-->
        </div><!-- .result -->
    </div>
</div>

<div class="modal4 hide fade" id="artprofile">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">
            &times;
        </button>
        <h3>Article Profiles</h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>
