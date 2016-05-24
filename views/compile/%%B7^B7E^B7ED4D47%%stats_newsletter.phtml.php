<?php /* Smarty version 2.6.19, created on 2016-01-13 09:33:48
         compiled from gebo/stats/stats_newsletter.phtml */ ?>
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
                    "sType" : "formatted-num"
                }, {
                    "sType" : "formatted-num"
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
    });
</script>
'; ?>


<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Statistics : Newsletter</h3>

        <table class="table table-striped table-bordered dTableR" id="stats-newsletter">
            <thead>
                <th>S.No.</th>
                <th>User name</th>
                <th>Email</th>
                <th>Total NL</th>
                <th>Total NL opened</th>
                <th>Action</th>
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
                    <td><?php echo $this->_tpl_vars['newsletter_item']['username']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['newsletter_item']['email']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['newsletter_item']['total_nl']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['newsletter_item']['total_opened']; ?>
</td>
                    <td><a href="/stats/newsletter-details?submenuId=ML2-SL13&user_id=<?php echo $this->_tpl_vars['newsletter_item']['user_id']; ?>
" target="_newsletter">View more</a></td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
            </tbody>
        </table>
    </div>
</div>