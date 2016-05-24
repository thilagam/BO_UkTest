<?php /* Smarty version 2.6.19, created on 2015-03-24 14:26:44
         compiled from gebo/stats/stats_newsletter_details.phtml */ ?>
<?php echo '
<script type="text/javascript" >
    $(document).ready(function() {
        if ($(\'#stats-newsletter\').length) {
            $(\'#stats-newsletter\').dataTable({
                "sPaginationType" : "bootstrap",
                "iDisplayLength" : 25,
                "sDom" : "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
                "aoColumns" : [{
                    "sType" : "formatted-num"
                }, {
                    "sType" : "string"
                }, {
                    "sType" : "string"
                }, {
                    "sType" : "string"
                }],
                "aaSorting" : [[0, "asc"]],
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

        $("#user").chosen({
            allow_single_deselect : true,
            search_contains : true
        });
    });
    
    function userFilter(userid)
    {
        if(userid > 0)
        {
            window.location=\'/stats/newsletter-details?submenuId=ML2-SL13&user_id=\'+userid;
        }
    }
</script>
'; ?>


<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Statistics : Newsletter Details</h3>
        <div id="search_block">           
             <table cellspacing="5" cellpadding="5" id="searchtable">
                <tbody>
                    <tr>
                        <td>selectionner :</td>
                        <td>
                            <select class="span8" id="user" name="user" data-placeholder="Select user" onchange="userFilter(this.value)" style="width: 100%;">
                                <option value=""></option><?php echo $this->_tpl_vars['users']; ?>

                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span8 form-inline">
        <label class="span2">Name :</label><div class="span5"><strong><?php echo $this->_tpl_vars['userinfo'][0]['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['userinfo'][0]['last_name']; ?>
</strong></div>

        <label class="span2">Email :</label><div class="span3"><strong><?php echo $this->_tpl_vars['userinfo'][0]['email']; ?>
</strong></div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">

        <table class="table table-striped table-bordered dTableR" id="stats-newsletter">
            <thead>
                <th>S.No.</th>
                <th>Date of nl</th>
                <th>Status</th>
                <th>Opened at</th>
            </thead>
            <tbody>
                <?php $_from = $this->_tpl_vars['newsletters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['newsletter_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['newsletter_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['newsletter_key'] => $this->_tpl_vars['newsletter_item']):
        $this->_foreach['newsletter_loop']['iteration']++;
?>
                <tr>
                    <td><?php echo ($this->_foreach['newsletter_loop']['iteration']-1)+1; ?>
</td>
                    <td><?php echo $this->_tpl_vars['newsletter_item']['created_at']; ?>
</td>
                    <td><?php if ($this->_tpl_vars['newsletter_item']['viewed_at'] != ''): ?>opened<?php else: ?>not opened<?php endif; ?></td>
                    <td><?php if ($this->_tpl_vars['newsletter_item']['viewed_at'] != ''): ?><?php echo $this->_tpl_vars['newsletter_item']['viewed_at']; ?>
<?php endif; ?></td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
            </tbody>
        </table>
    </div>
</div>