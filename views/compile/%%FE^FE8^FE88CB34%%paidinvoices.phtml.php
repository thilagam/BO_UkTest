<?php /* Smarty version 2.6.19, created on 2014-12-02 12:31:54
         compiled from gebo/stats/paidinvoices.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/stats/paidinvoices.phtml', 230, false),array('function', 'html_options', 'gebo/stats/paidinvoices.phtml', 457, false),)), $this); ?>
<?php echo '
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

    $(document).ready(function() {
        //gebo_select_row.init();
        var all_invoice_ids=new Array();
        $(".uni_style").uniform();
        if ($(\'#contrib-payments-list\').length) {
            $(\'#contrib-payments-list\').dataTable({
                "iDisplayLength": 200,
                "bProcessing": true,
                "bServerSide": true,
				"aoColumns" : [
                    {"bSortable": true},
                    {"sType" : "formatted-num"},
                    {"sType" : "french-string"},
                    {"sType" : "french-string"},
                    {"sType" : "eu_date"},
                    {"sType" : "eu_date"},
                    {"sType" : "payable"},
                    {"sType" : "string"},
                    {"sType" : "html"}
                ],
                "sAjaxSource": "/stats/loadpaidinvoices",
                "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": ctype, "value": "yes" } );
                    aoData.push({ "name": "totalcount", "value": count })
                    aoData.push({ "name": "search", "value": getUrlVars()["search"] })
                    aoData.push({ "name": "start_date", "value": getUrlVars()["start_date"] })
                    aoData.push({ "name": "end_date", "value": getUrlVars()["end_date"] })
                    aoData.push({ "name": "pdstart_date", "value": getUrlVars()["pdstart_date"] })
                    aoData.push({ "name": "pdend_date", "value": getUrlVars()["pdend_date"] })
                    aoData.push({ "name": "sel_type", "value": getUrlVars()["sel_type"] })
                    aoData.push({ "name": "invoicename", "value": getUrlVars()["invoicename"] })
                    aoData.push({ "name": "contribname", "value": getUrlVars()["contribname"] })
                    aoData.push({ "name": "paid_type", "value": getUrlVars()["paid_type"] })
                    aoData.push({ "name": "contrib", "value": getUrlVars()["contrib"] })
                    aoData.push({ "name": "type", "value": getUrlVars()["type"] })
                },
                "oTableTools" : {
                    "aButtons" : ["copy", "print", {
                        "sExtends" : "collection",
                        "sButtonText" : \'Save <span class="caret" />\',
                        "aButtons" : ["csv", "xls", "pdf"]
                    }],
                    "sSwfPath" : "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                },
                "fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
                    //alert(\'nRow = \'+nRow+\' iStart = \'+iStart+\' iEnd = \'+iEnd+\' aiDisplay = \'+aiDisplay);
                    var tmp ;
                    var iTotalMarket = 0;
                    for ( var i=0 ; i<aaData.length ; i++ )
                    {
                        tmp = aaData[i][5];//alert(tmp);
                        tmp = tmp.replace(\'<span class="label label-inverse pull-right">\', \'\');
                        tmp = tmp.replace(\'</span>\', \'\');
                        tmp = replaceAll(tmp, \' \', \'\');
                        tmp = tmp.replace(\',\', \'.\');

                        //tmp = tmp.replace(\' &euro;\', \'\');
                        iTotalMarket += tmp*1;

                        //adding invoice id to array

                        var invoice_id=aaData[i][2];
                        var regex = /[^<]*(<a href="([^"]+)">([^<]+)<\\/a>)/g;
                        var matches = invoice_id.match(regex);

                        invoice_id = invoice_id.replace( regex, function ( $0,$1,$2,$3) {
                            return $3;
                        });

                        all_invoice_ids.push(invoice_id);
                    }
                    //alert(all_invoice_ids);
                    var iPageMarket = 0;
                    for ( var i=iStart ; i<iEnd ; i++ )
                    {
                        tmp = aaData[ aiDisplay[i] ][5];//tmp = aaData[i][5];
                        tmp = tmp.replace(\'<span class="label label-inverse pull-right">\', \'\');
                        tmp = tmp.replace(\'</span>\', \'\');
                        tmp = replaceAll(tmp, \' \', \'\');
                        tmp = tmp.replace(\',\', \'.\');
                        //tmp = tmp.replace(\' &euro;\', \'\');
                        iPageMarket += tmp*1;
                    }
                    $("#sumup").html("<span class=\'label label-success\'>"+(formatNumber(iPageMarket))+"</span> / <span class=\'label label-inverse\'>"+(formatNumber(iTotalMarket))+"</span>");
                }
            });
        }
        else
        {
            alert("hey baby");
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
</script>
<style>
    .label{font-size: 12px!important;}
</style>
'; ?>


<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Paid Contributors<a class="btn btn-gebo1" id="ong_search">Search</a></h3>
        <div class="<?php if (! $_GET['search']): ?>hide<?php endif; ?> well clearfix" id="search_block">
            <div class="row-fluid">
                <form action="/stats/paid-invoices?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="get" id="searchform" name="searchform" >
                    <input type="hidden" id="submenuId" name="submenuId"  value="ML5-SL3"/>
                    <span class="sepV_c">
                        <select name="sel_type" id="sel_type" data-placeholder="Payment type">
                            <option value=""></option>
                            <option value="All">All</option>
                            <option value="paypal" <?php if ($this->_tpl_vars['sel_type'] == 'paypal'): ?> selected<?php endif; ?>>Paypal</option>
                            <option value="cheque" <?php if ($this->_tpl_vars['tsel_type'] == 'cheque'): ?> selected<?php endif; ?>>Cheque</option>
                            <option value="virement" <?php if ($this->_tpl_vars['sel_type'] == 'virement'): ?> selected<?php endif; ?>>Bank</option>
                        </select> 
					</span>
                   
                    <span class="sepV_c">
                        <input type="text" id="invoicename" name="invoicename" value="<?php echo $_GET['invoicename']; ?>
"  placeholder="Invoice no" />
                    </span>
                    <span class="sepV_c">
                        <select id="contribname" name="contribname" data-placeholder="Contributeur">
                            <option value=""></option>
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['contributor_array'],'selected' => $_GET['contribname']), $this);?>

                        </select> </span>
                    <span class="sepV_c">
                        <select id="paid_type" name="paid_type" data-placeholder="Payment status">
                            <option value=""></option>
                            <option value="All">All</option>
                            <option value="notpaid" <?php if ($_GET['paid_type'] == 'notpaid'): ?> selected<?php endif; ?>>new application</option>
                            <option value="refuse" <?php if ($_GET['paid_type'] == 'refuse'): ?> selected<?php endif; ?>>Refused</option>
                        </select> </span>
                        
                    <div class="span12">
                        <label class="span2">Date Invoice :</label>
					<span class="sepV_c">
                        <input type="text" placeholder="start date" id="dp_start" name="start_date" readonly data-date-format="dd-mm-yyyy" value="<?php echo $_GET['start_date']; ?>
"/>
                    </span>
                    <span class="sepV_c">
                        <input type="text"  placeholder="end date" id="dp_end" name="end_date" readonly data-date-format="dd-mm-yyyy" value="<?php echo $_GET['end_date']; ?>
"/>
                    </span>
					</div>
					
					<div class="span12">
					<label class="span2">Date Paid :</label>
					<span class="sepV_c">
                        <input type="text" placeholder="start date" id="paiddp_start" name="pdstart_date" readonly data-date-format="dd-mm-yyyy" value="<?php echo $_GET['pdstart_date']; ?>
"/>
                    </span>
                    <span class="sepV_c">
                        <input type="text"  placeholder="end date" id="paiddp_end" name="pdend_date" readonly data-date-format="dd-mm-yyyy" value="<?php echo $_GET['pdend_date']; ?>
"/>
                    </span>
                        <button class="btn btn-danger pull-center" id="search" name="search" type="submit" value="search" >
                            Search
                        </button>
                        <button class="btn btn-info pull-center" id="clear" name="clear" type="button" value="clear" onclick="clearAll();" >
                            Clear
                        </button>
					</div>

                </form>

            </div>
        </div>

        <table class="table table-striped table-bordered dTableR" id="contrib-payments-list">
            <thead>
                <th class="table_checkbox"><input type="checkbox" name="select_rows" id="select_rows" class="uni_style" value="all"/></th>
                <th>S.No.</th>
                <th>INVOICE No.</th>
                <th>Writer</th>
                <th>DATE</th>
		<th>DATE Paid</th>
                <th>AMOUNT</th>
                <th>PAYMENT TYPE</th>
                <th>PAYMENT STATUS</th>
            </thead>
            <tbody>
            </tbody>
        </table>
        <?php $this->assign('total_amount_to_be_paid', 0); ?>
       <!-- <div style="width: 100%;float: left;"><span class="label" id="sumup" style="float: left; margin-left: 410px;margin-bottom: 5px;">Total : <?php echo $this->_tpl_vars['total_amount_to_be_paid']; ?>
</span></div>-->

         <div style="width: 100%;float: left;"><span class="label" id="sumupselected" style="float: left; margin-left: 410px;"></span></div>
         
        <input type="hidden" id="hide_total" name="hide_total"  />

        <div style="float:left;">            

            <button onclick="return validateAll();" name="sectall" class="btn btn-gebo" value="T&#232;l&#232;charger ma facture" type="button"><i class="splashy-arrow_large_down"></i>Invoice Download</button>

        </div>

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
