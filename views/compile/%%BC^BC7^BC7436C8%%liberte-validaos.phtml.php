<?php /* Smarty version 2.6.19, created on 2015-07-14 14:36:40
         compiled from gebo/processao/liberte-validaos.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/processao/liberte-validaos.phtml', 69, false),array('modifier', 'wordwrap', 'gebo/processao/liberte-validaos.phtml', 69, false),array('modifier', 'upper', 'gebo/processao/liberte-validaos.phtml', 69, false),array('modifier', 'date_format', 'gebo/processao/liberte-validaos.phtml', 70, false),array('modifier', 'string_format', 'gebo/processao/liberte-validaos.phtml', 84, false),)), $this); ?>
<?php echo '

<script type="text/javascript" >
$(document).ready(function() {

    $(\'#validmissionsgrid\').dataTable({
        "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
        "sPaginationType": "bootstrap",
        "aaSorting": [[ 0, "asc" ]],
        "aoColumns": [
            { "sType": "formatted-num" },
            { "sType": "string" , "sWidth": "15%"},
            { "sType": "string" },
            { "sType": "natural" },
            { "sType": "natural" },
            { "sType": "natural" },
            { "sType": "natural" },
            { "sType": "natural" },
            { "sType": "natural" },
            { "sType": "natural" },
            { "sType": "natural" },
            { "sType": "natural" },
            { "sType": "natural" }
        ]

    });

});

</script>
'; ?>

<div class="row-fluid">
  <div class="span12" style="">
<!--    <h3 class="heading">Mod&eacute;ration mission libert&eacute;<a href="#searchblock" onclick="showSearch();"  class="label label-inverse alignright">Search</a></h3>
-->     <div class="hide" id="searchblock">

     </div>
     <div class="tabbable">
         <ul class="nav nav-tabs">
             <li <?php if ($_GET['tab'] == 'newaos' || $_SERVER['REQUEST_URI'] == '/processao/liberte-newaos?submenuId=ML2-SL1'): ?> class="active" <?php endif; ?>><a href="/processao/liberte-newaos?tab=newaos&submenuId=ML2-SL1" class="lable-danger"><strong>New missions</strong></a></li>
             <li <?php if ($_GET['tab'] == 'ongoingaos'): ?> class="active" <?php endif; ?>><a href="/processao/liberte-ongoingaos?tab=ongoingaos&submenuId=ML2-SL1"  class="lable-info"><strong>Ongoing Missions</strong></a></li>
             <li <?php if ($_GET['tab'] == 'validaos'): ?> class="active" <?php endif; ?>><a href="/processao/liberte-validaos?tab=validaos&submenuId=ML2-SL1"  class="lable-info"><strong>Missions finished</strong></a></li>
             <li <?php if ($_GET['tab'] == 'refusedaos'): ?> class="active" <?php endif; ?>><a href="/processao/liberte-refusedaos?tab=refusedaos&submenuId=ML2-SL1"  class="lable-info"><strong>Missions refused</strong></a></li>
             <li <?php if ($_GET['tab'] == 'cancelledaos'): ?> class="active" <?php endif; ?>><a href="/processao/liberte-cancelledaos?tab=cancelledaos&submenuId=ML2-SL1"  class="lable-info"><strong>Missions cancelled</strong></a></li>
         </ul>
             <div id="validtab" class="tab-pane" >
              <table id="validmissionsgrid" class="table table-bordered table-striped table_vam" style="overflow-x: scroll;">
                  <thead>
                   <tr>
                    <th>SL.NO</th>
                    <th>Title</th>
                    <th>Client</th>
                    <th>Created</th>
                    <th>Type of content</th>
                    <th>Language</th>
                    <th>Writing/ Translating</th>
                    <th>History</th>
                    <th>Status</th>
                    <th>Nb of Participations</th>
                    <th>Invoice</th>
                    <th>Action</th>
                    <th>Turnover</th>
                </tr>
                  </thead>
                  <tbody>
                  <?php $_from = $this->_tpl_vars['validatedlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['validaos_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['validaos_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['validaos_key'] => $this->_tpl_vars['validaos_item']):
        $this->_foreach['validaos_loop']['iteration']++;
?>
                  <tr>
                      <td><?php echo ($this->_foreach['validaos_loop']['iteration']-1)+1; ?>
</td>
                      <td><a data-target="#artprofile" role="button" href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['validaos_item']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['validaos_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)))) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a></td>
                      <td><a  href="/user/client-edit?submenuId=ML10-SL2&tab=viewclient&userId=<?php echo $this->_tpl_vars['validaos_item']['user_id']; ?>
" class="hint--bottom hint--info" data-hint="since : <?php echo ((is_array($_tmp=$this->_tpl_vars['validaos_item']['doj'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"><?php if ($this->_tpl_vars['validaos_item']['company_name'] != ''): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['validaos_item']['company_name'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
<?php else: ?><?php echo $this->_tpl_vars['validaos_item']['email']; ?>
<?php endif; ?></a></td>
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['validaos_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
                      <td><?php echo $this->_tpl_vars['validaos_item']['deltype']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['validaos_item']['language']; ?>
</td>
                      <td><?php if ($this->_tpl_vars['validaos_item']['content_type'] == 'writing'): ?>R&eacute;daction<?php else: ?>Traduction<?php endif; ?></td>
                      <td><a href="/ongoing/ao-history?ao_id=<?php echo $this->_tpl_vars['validaos_item']['id']; ?>
"  data-toggle="modal" data-hint="history" data-target="#ao_history" ><i class="splashy-information"></i></a></td>
                      <td><?php echo $this->_tpl_vars['validaos_item']['latestStatus']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['validaos_item']['contributors']; ?>
</td>
                      <td><?php if ($this->_tpl_vars['validaos_item']['paid_status'] == 'notpaid'): ?>Non pay&eacute;<?php else: ?>pay&eacute;<?php endif; ?></td>
                      <td><!--<a data-toggle="modal" data-target="#publishao" id="publishaopop" href="/processao/showpraoinfo?aoid=<?php echo $this->_tpl_vars['validaos_item']['id']; ?>
&function=publish"><i class="splashy-check"></i></a>
-->                          <a data-toggle="modal" data-target="#editao" id="editaopop" href="/processao/showpraoinfo?aoid=<?php echo $this->_tpl_vars['validaos_item']['id']; ?>
&function=edit"><i class="splashy-pencil"></i></a>
                          <a href="/processao/mission-split?submenuId=ML2-SL1&aoid=<?php echo $this->_tpl_vars['validaos_item']['id']; ?>
" data-hint="split mission" class="hint--left hint--danger"><i class="splashy-diamonds_4"></i></a>
                          <a href="/BO/downloadpremiumquote.php?id=<?php echo $this->_tpl_vars['newaos_item']['quoteid']; ?>
" class="hint--left hint--danger" data-hint="Download XSL"><i class="splashy-download"></i></a>
                      </td>
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['validaos_item']['cost'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
<b> &euro;</b></td>
                  </tr>
                  <?php endforeach; endif; unset($_from); ?>
                  </tbody>
              </table>
          </div>
          </div>
     </div>
 </div>
</div>

<!--///for the edit ao detials popup///-->
<div class="modal container hide fade" id="editao">
    <div class="modal-header">
        <button class="close" onclick="closePopup('editao');">&times;</button>
        <h3>Edit AO Details</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>
<!--///for the publish ao  popup///-->
<div class="modal2 hide fade" style="overflow: hidden" id="publishao">
    <div class="modal-header">
        <button class="close" onclick="closePopup('publishao');">&times;</button>
        <h3>Publish AO</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>

<!--History of AO-->
<div class="modal container hide fade" id="ao_history">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Historique des actions men&eacute;es sur l'AO</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>
<!--Comments of AO-->
<div class="modal hide fade" id="refusal_reasons">
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Message to client</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>


