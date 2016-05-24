<?php /* Smarty version 2.6.19, created on 2014-12-02 12:32:09
         compiled from gebo/stats/contrib_inprocess_invoice_list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'gebo/stats/contrib_inprocess_invoice_list.phtml', 136, false),array('modifier', 'replace', 'gebo/stats/contrib_inprocess_invoice_list.phtml', 502, false),array('modifier', 'date_format', 'gebo/stats/contrib_inprocess_invoice_list.phtml', 506, false),array('function', 'html_options', 'gebo/stats/contrib_inprocess_invoice_list.phtml', 469, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
	var all_invoice_ids=new Array();
	
	$(document).ready(function() {
        //gebo_select_row.init();
        $(".uni_style").uniform();
		
		if ($(\'#contrib-payments-list\').length) {
			$(\'#contrib-payments-list\').dataTable({
				"sPaginationType" : "bootstrap",
				"iDisplayLength" : 200,
				"sDom" : "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
				"aoColumns" : [
				{"bSortable": false},
				{"sType" : "formatted-num"},
				{"sType" : "french-string"},
				{"sType" : "french-string"}, 
				{"sType" : "eu_date"}, 
				{"sType" : "payable"},
				{"sType" : "string"}, 
				{"sType" : "html"}
				],
				"aaSorting" : [[1, "asc"]],
				"oTableTools" : {
					"aButtons" : ["copy", "print", {
						"sExtends" : "collection",
						"sButtonText" : \'Save <span class="caret" />\',
						"aButtons" : ["csv", "xls", "pdf"]
					}],
					"sSwfPath" : "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
				},
                "fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
                    //alert(\'aaData = \'+aaData);
                    var tmp ;
                    var iTotalMarket = 0;
                    for ( var i=0 ; i<aaData.length ; i++ )
                    {
                        tmp = aaData[i][5];
                        tmp = tmp.replace(\'<span class="label label-inverse pull-right">\', \'\');
                        tmp1 = tmp.split("&nbsp;");
                        tmp = tmp1[0];
                        tmp = replaceAll(tmp, \' \', \'\');
                        tmp = tmp.replace(\',\', \'.\');
                        //tmp = tmp.replace(\' &euro;\', \'\');&nbsp;€</span>
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
                        tmp = aaData[i][5];
                        tmp = tmp.replace(\'<span class="label label-inverse pull-right">\', \'\');
                        tmp1 = tmp.split("&nbsp;");
                        tmp = tmp1[0];
                        tmp = replaceAll(tmp, \' \', \'\');
                        tmp = tmp.replace(\',\', \'.\');
                        //tmp = tmp.replace(\' &euro;\', \'\');
                        iPageMarket += tmp*1;
                    }
                    $("#sumup").html("<span class=\'label label-success\'>"+(formatNumber(iPageMarket))+"</span> / <span class=\'label label-inverse\'>"+(formatNumber(iTotalMarket))+"</span>");
                }
			});
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

        $(\'#select_rows\').click(function() {
            /*var chekd = 0;
            for (var i = 1; i <= '; ?>
<?php echo count($this->_tpl_vars['paginator']); ?>
<?php echo '; i++) {
                if($(\'#row_sel\'+i).length)
                {
                    if($(\'#select_rows\').is(\':checked\')){alert(\'io=\'+i);
                        chekd = 1;
                        if(! $(\'#row_sel\'+i).is(\':checked\')){$(\'#row_sel\'+i).click();}
                    }
                    else
                    {
                        if($(\'#row_sel\'+i).is(\':checked\')){$(\'#row_sel\'+i).click();}
                    }
                }
            }
            if(chekd)
                calculateTotal();*/
               
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

	//////to select all check boxes/////////////
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
    jQuery.fn.dataTableExt.oSort[\'payable-asc\'] = function(a, b) {//alert(\'a=\'+a);alert(\'b=\'+b);
            a = a.replace(\'<span class="label label-inverse pull-right">\', \'\');
            a1 = a.split("&nbsp;");
            a = a1[0];
            a = replaceAll(a, \' \', \'\');
            a = a.replace(\',\', \'.\');
            a = a*1;
            b = b.replace(\'<span class="label label-inverse pull-right">\', \'\');
            b1 = b.split("&nbsp;");
            b = b1[0];
            b = replaceAll(b, \' \', \'\');
            b = b.replace(\',\', \'.\');
            b = b*1;
            var c = ((a < b) ? -1 : ((a > b) ? 1 : 0));
            return c;
    };
    jQuery.fn.dataTableExt.oSort[\'payable-desc\'] = function(a, b) {//alert(\'a=\'+a);alert(\'b=\'+b);
            a = a.replace(\'<span class="label label-inverse pull-right">\', \'\');
            a1 = a.split("&nbsp;");
            a = a1[0];
            a = replaceAll(a, \' \', \'\');
            a = a.replace(\',\', \'.\');
            a = a*1;
            b = b.replace(\'<span class="label label-inverse pull-right">\', \'\');
            b1 = b.split("&nbsp;");
            b = b1[0];
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
			    //alert(selected[i]);
				total += parseFloat(selected[i]);
			}
            //$("#sumupselected").html("selected :" + total.toFixed(1));
			$("#sumupselected").html("selected : " + formatNumber(total));
		} else
			$("#sumupselected").html("");

	}

	function validateAll(num) {
		// $("#hide_totaldelete").val(countselected);
		var $b = $(\'input[type=checkbox]\');
		var countselected = $b.filter(\':checked\').length;
		if (countselected >= 1) {
			var selected = new Array();

			$b.filter(\':checked\').each(function() {
				selected.push($(this).attr(\'name\'));
			});
			$("#hide_total").val(selected);
			if (num == 2) {
				var answer = smoke.confirm(\'Do you really want to refuse invoice\');
				if (answer) {
					return true;
				} else {
					return false;
				}
			} else if (num == 1) {
				counter = 1;
				///its a global varible
				//smoke.alert(selected);
				var url = "/BO/download_invoice.php?invoice_id=" + selected;
				$(location).attr(\'href\', url);

				return true;
			}
		} else {
			smoke.alert("Merci de s\\u00e9lectionner au moins 1.");
			return false;
		}
	}
	
	//function to download all payable invoices at a time
	function fndownloadAll()
	{
		//alert(all_invoice_ids);
		var msg="you want to download all invoices ?";		
		smoke.confirm(msg,function(e){
			if (e){					
					var url = "/BO/download_invoice.php?invoice_id=" + all_invoice_ids;
					$(location).attr(\'href\', url);
				}
			else{
				return false;
			}
		},{cancel :\'No\',ok:\'Yes\'});
	
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
	window.open("/stats/generatepdf?submenuId=ML5-SL1&invoiceid=" + selected + "&print=yes", windowName, "width = 800,hieght=1000,scrollbars = yes");

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
    function replaceAll(string, token, newtoken) {
        if(token!=newtoken)
        while(string.indexOf(token) > -1) {
            string = string.replace(token, newtoken);
        }
        return string;
    }
    function formatNumber(yourNumber) {//alert(yourNumber);
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
    function conf1(act, invid, cntrlr)
    {
        alert(act+invid+cntrlr);
    }
    function conf(act, invid, cntrlr)
    { alert(cntrlr);
        smoke.confirm(((act == \'pay\') ? \'Pay\' : \'Refuse\') + \' now?\',function(e){
            if (e){
                window.location="/stats/"+cntrlr+"?invoice_id="+invid;
            }else{
                e.preventDefault();
            }
        }, {ok:"Yeah", cancel:"No"}) ;
    }
    function fnpayAll()
    {
        var $b = $(\'input[type=checkbox]\');
        var countselected = $b.filter(\':checked\').length;
        if (countselected >= 1) {
            var selected = new Array();

            $b.filter(\':checked\').each(function() {
                if(($(this).attr(\'name\')) != \'select_rows\')
                    selected.push($(this).attr(\'name\'));
            });
            //alert(selected);
            smoke.confirm(\'Voulez-vous payer ces factures maintenant ?\',function(e){
                if (e){
                     window.location="/stats/paycontributors?invoice_ids="+selected;
                }else{
                    e.preventDefault();
                }
            }, {ok:"YES", cancel:"NO"}) ;
        } else {
            smoke.alert("Please select atleast 1.");
            return false;
        }
        return false;
    }
	function mergeAll() {
		// $("#hide_totaldelete").val(countselected);
		var $b = $(\'input[type=checkbox]\');
		var countselected = $b.filter(\':checked\').length;
		if (countselected >= 1) {
			var selected = new Array();

			$b.filter(\':checked\').each(function() {
				selected.push($(this).attr(\'name\'));
			});
			$("#hide_total").val(selected);
			
			counter = 1;
			///its a global varible
			//smoke.alert(selected);
			var url = "/BO/download_invoice.php?merge_pdf=yes&invoice_id=" + selected;
			$(location).attr(\'href\', url);

			return true;
			
		} else {
			smoke.alert("Merci de s\\u00e9lectionner au moins 1.");
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
        <h3 class="heading">Payments inprocess<a class="btn btn-gebo1" id="ong_search">Search</a></h3>
        <div class="<?php if (! $_GET['search']): ?>hide<?php endif; ?> well clearfix" id="search_block">
            <div class="row-fluid">
                <form action=<?php echo $_SERVER['REQUEST_URI']; ?>
 method="get" id="searchform" name="searchform" >
                    <input type="hidden" id="submenuId" name="submenuId"  value="ML5-SL1"/>
                    <span class="sepV_c">
                        <select name="sel_type" id="sel_type" data-placeholder="Payment type">
                            <option value=""></option>
                            <option value="All" <?php if ($this->_tpl_vars['sel_type'] == 'All'): ?> selected<?php endif; ?>>All</option>
                            <option value="paypal" <?php if ($this->_tpl_vars['sel_type'] == 'paypal'): ?> selected<?php endif; ?>>Paypal</option>
                            <option value="cheque" <?php if ($this->_tpl_vars['sel_type'] == 'cheque'): ?> selected<?php endif; ?>>Cheque</option>
                            <option value="virement" <?php if ($this->_tpl_vars['sel_type'] == 'virement'): ?> selected<?php endif; ?>>Bank</option>
                        </select> </span>
                    <span class="sepV_c">
                        <input type="text" placeholder="start date" id="dp_start" name="start_date" readonly data-date-format="dd-mm-yyyy" value="<?php echo $this->_tpl_vars['start_date']; ?>
"/>
                    </span>
                    <span class="sepV_c">
                        <input type="text"  placeholder="end date" id="dp_end" name="end_date" readonly data-date-format="dd-mm-yyyy" value="<?php echo $this->_tpl_vars['end_date']; ?>
"/>
                    </span>
                    <span class="sepV_c">
                        <input type="text" id="invoicename" name="invoicename" value="<?php echo $this->_tpl_vars['invoicename']; ?>
"  placeholder="Invoice no" />
                    </span>
                    <span class="sepV_c">
                        <select id="contribname" name="contribname" data-placeholder="Contributeur">
                            <option value=""></option>
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['contributor_array'],'selected' => $this->_tpl_vars['contribname']), $this);?>

						</select> 
					</span>
                    
                    <span class="sepV_c">
                        <button class="btn btn-danger pull-center" id="search" name="search" type="submit" value="search" >
                            Search
                        </button>
                        <button class="btn btn-info pull-center" id="clear" name="clear" type="button" value="clear" onclick="clearAll();" >
                            Clear
                        </button> </span>
                    <!--</div>-->
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
                <th>AMOUNT<!--(in &#8364;)--></th>
                <th>PAYMENT TYPE</th>
                <th>ACTION</th>
            </thead>
            <tbody>
                <?php $this->assign('total_amount_to_be_paid', 0); ?>
                <?php if ($this->_tpl_vars['nores'] != 'true'): ?>
                <?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['payablecontrib_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['payablecontrib_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['payablecontrib_key'] => $this->_tpl_vars['payablecontrib_item']):
        $this->_foreach['payablecontrib_loop']['iteration']++;
?>
                <tr>
                    <td><input type="checkbox" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['payablecontrib_item']['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
" id="row_sel<?php echo ($this->_foreach['payablecontrib_loop']['iteration']-1)+1; ?>
" class="uni_style" value="<?php echo $this->_tpl_vars['payablecontrib_item']['total_invoice_paid']; ?>
" onclick="calculateTotal();selectALL();" /></td>
                    <td><?php echo ($this->_foreach['payablecontrib_loop']['iteration']-1)+1; ?>
</td>
                    <td><a href="/stats/generatepdf?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&invoiceid=<?php echo ((is_array($_tmp=$this->_tpl_vars['payablecontrib_item']['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['payablecontrib_item']['first_name'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '_') : smarty_modifier_replace($_tmp, ' ', '_')); ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['payablecontrib_item']['invoiceId_new'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
</a></td>
                    <td><a style="cursor: pointer" href="/user/contributor-edit?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['payablecontrib_item']['user_id']; ?>
" onclick="return getParticipateUserInfo(<?php echo $this->_tpl_vars['payablecontrib_item']['user_id']; ?>
, <?php echo $this->_tpl_vars['payablecontrib_item']['user_id']; ?>
);" target="_userparticipateinfo"><?php if ($this->_tpl_vars['payablecontrib_item']['first_name'] != ''): ?><?php echo $this->_tpl_vars['payablecontrib_item']['first_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['payablecontrib_item']['email']; ?>
<?php endif; ?></a></td>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payablecontrib_item']['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
                    <td><span class="label label-inverse pull-right"><?php echo $this->_tpl_vars['payablecontrib_item']['total_invoice_paid']; ?>
&nbsp;<?php if ($this->_tpl_vars['payablecontrib_item']['currency'] == 'pound'): ?>&#163;<?php else: ?>&#8364;<?php endif; ?></span></td>
                    <?php $this->assign('total_amount_to_be_paid', $this->_tpl_vars['total_amount_to_be_paid']+$this->_tpl_vars['payablecontrib_item']['total_invoice_paid']); ?>
                    <td><?php echo $this->_tpl_vars['payablecontrib_item']['payment_type']; ?>
<!----></td>
                    <td> <?php if ($this->_tpl_vars['payablecontrib_item']['status'] == 'refuse'): ?> <span class="label label-important">Refus&eacute;</span><?php else: ?>
					<a href="javascript:void(0);" style="cursor: pointer;" onclick="return conf('pay', '<?php echo ((is_array($_tmp=$this->_tpl_vars['payablecontrib_item']['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
', 'paycontributor');"><button class="btn hint--bottom hint--info" data-hint="Paye"><i class="splashy-thumb_up"></i></button></a>
					<a href="javascript:void(0);" style="cursor:pointer;" onclick="return conf('refuse', '<?php echo ((is_array($_tmp=$this->_tpl_vars['payablecontrib_item']['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
', 'refuseinvoice');"><button class="btn hint--bottom hint--info" data-hint="Refuse"><i class="splashy-thumb_down"></i></button></a><?php endif; ?>
                    <a onclick="return printInvoice('<?php echo ((is_array($_tmp=$this->_tpl_vars['payablecontrib_item']['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
');" id="print" class="btn hint--bottom hint--info" data-hint="Print" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['payablecontrib_item']['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
 " style="cursor: pointer;" ><i class="splashy-printer"></i> </a></td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div style="width: 100%;float: left;"><span class="label" id="sumup" style="float: left; margin-left: 410px;margin-bottom: 5px;"></span></div>
        <!--<div style="text-align:center;padding-left:600px;">            
            <div style="border-radius:7px;background-color:#eed3d7;width:120px;border-color: #7d7d7d;border: solid 2px;height: 20px;"><?php echo count($this->_tpl_vars['paginator']); ?>
</div>
        </div>-->
    <?php if ($this->_tpl_vars['total_amount_to_be_paid'] != 0): ?>
         <div style="width: 100%;float: left;"><span class="label" id="sumupselected" style="float: left; margin-left: 410px;"></span></div>
    <?php endif; ?>

        <input type="hidden" id="hide_total" name="hide_total"  />

        <div style="float:left;">           
			
			<button onclick="fnpayAll();" name="pay_all" class="btn btn-gebo" type="button"> PAY SELECTED INVOICES </button>
			
			<button onclick="fndownloadAll();" name="download_all" class="btn btn-gebo" type="button"><i class="splashy-arrow_large_down"></i> DOWNLOAD ALL</button>
			<button onclick="return validateAll(1);" name="selectall" class="btn btn-gebo" value="Download the selected invoices" type="button"><i class="splashy-arrow_large_down"></i> Download the selected invoices</button>

			<button onclick="return mergeAll();" name="mergeall" class="btn btn-gebo"  type="button"><i class="splashy-arrow_large_down"></i> Merge Selected invoices
</button>
            <a onclick="return printInvoice(1);" id="print" class="btn btn-gebo" name="Print"><i class="splashy-printer"></i> Print</a>
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
