<?php /* Smarty version 2.6.19, created on 2015-10-05 09:46:54
         compiled from gebo/stats/invoiceprint.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'gebo/stats/invoiceprint.phtml', 122, false),)), $this); ?>
<?php echo '
    <script type="text/javascript" >
// Read a page\'s GET URL variables and return them as an associative array.
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
$(function(){
$( "#print_invoice" ).click(function(){

    $( "#logo" ).show();
    $( "#tag1" ).show();
    $( "#tag2" ).show();
    $( "#invoicePrint" ).print();
});
});
$(function(){

   if(getUrlVars()["print"]==\'yes\')
   {

    $( "#logo" ).show();
    $( "#tag1" ).show();
    $( "#tag2" ).show();
    $( "#invoicePrint" ).print();
    }
 });
</script>
<style type="text/css">
 .table td {
    border-top: 1px solid #DDDDDD;
    line-height: 20px;
    padding: 8px;
    text-align: center;
    vertical-align: top;
}
</style>
'; ?>



<div class="row-fluid"  id="invoicePrint">
    <div id="section_header"></div>
    <div id="content">  
        <div class="page">
            
                <table style="width: 100%;float:left;" cellpadding="5" cellspacing="5">
                    <tr>
                        <td colspan="2"><img src="http://ep-test.edit-place.co.uk/FO/images/logo-edit-place-old.png" style="background-repeat: no-repeat;" width="279px" height="49px"/><br>
                        67-70 Charlotte Road<br><br>EC2A 3PE LONDON - ENGLAND
                        </td>
                        <td>&nbsp;</td>
                        <td style="text-align:left;background-color:#FFF;font-size:12pt;float:right;width:250px;">
                            <b>Purchase Order</b><br><br>
                            #<?php echo $this->_tpl_vars['invoice_identifier']; ?>
<br><br>
                            Date: <?php echo $this->_tpl_vars['date_invoice']; ?>
 
                        </td>
                    </tr>                   
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>                        
                        <td colspan="2" style="font-size: 12pt;">
                            <?php echo $this->_tpl_vars['address']; ?>
 <br>
                             <b>Account Details :</b><br><br>
                            <?php echo $this->_tpl_vars['full_name']; ?>
<br><br>
                            <?php echo $this->_tpl_vars['payinfo_number']; ?>

                            <?php echo $this->_tpl_vars['bank_account_name']; ?>

                            <?php echo $this->_tpl_vars['remuneration']; ?>

                        </td>
                        <td>&nbsp;</td>
                        <td style="text-align:left;background-color:#FFF;font-size:12pt;float:right;width:250px;">
                            <b>Bill to :</b><br><br>
                            <b>Edit-Place Uk</b><br>
                            67-70 Charlotte Road<br>
							EC2A 3PE London<br>
							England<br><br>
							VAT : GB 182 0572 18	
                        </td>
                    </tr>                    
                </table>            
            
            
                <table style="width: 100%;float:left;" cellpadding="5" cellspacing="5">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            
            <div style="width:100%;float:left;">
                <?php echo $this->_tpl_vars['invoice_details_pdf']; ?>

                <?php echo $this->_tpl_vars['tax_details_pdf']; ?>

                <?php echo $this->_tpl_vars['final_invoice_amount']; ?>

                <?php echo $this->_tpl_vars['bank_transfer_price']; ?>

                <?php echo $this->_tpl_vars['total_transfer_amount']; ?>

            </div>  
            <div style="width:100%;float:left;">
                <table style="width: 50%;padding-top:0px;float:left;">                    
                    <tr>                        
                        <td style="text-align: left;background-color:#FFF;padding:10px;font-size: 12pt;">
                            Thank you
                        </td>
                    </tr>                   
                </table>
            </div>  
        </div>
    </div>
</div>

<?php if ($_GET['print'] != 'yes'): ?>
<div class="row-fluid">
    <a class="btn btn-gebo" href="/stats/downloadinvoice?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&invoiceid=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice_identifier'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
"><i class="splashy-arrow_large_down"></i> Download invoice</a>
    <a class="btn btn-gebo " name="print_invoice" id="print_invoice"><i class="splashy-printer"></i> Print</a>
</div>      
<?php endif; ?>
        