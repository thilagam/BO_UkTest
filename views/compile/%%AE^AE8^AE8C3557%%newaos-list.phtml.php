<?php /* Smarty version 2.6.19, created on 2016-03-11 13:34:08
         compiled from gebo/processao/newaos-list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/processao/newaos-list.phtml', 150, false),array('modifier', 'stripslashes', 'gebo/processao/newaos-list.phtml', 200, false),array('modifier', 'wordwrap', 'gebo/processao/newaos-list.phtml', 200, false),array('modifier', 'upper', 'gebo/processao/newaos-list.phtml', 200, false),array('modifier', 'date_format', 'gebo/processao/newaos-list.phtml', 201, false),array('modifier', 'string_format', 'gebo/processao/newaos-list.phtml', 215, false),)), $this); ?>
<?php echo '

<script type="text/javascript" >
$(document).ready(function() {
    $("#newmissionsgrid").addClass(\'active\');
    var tab = getParameterByName(\'tab\', $(location).attr(\'href\'));
    if(!tab)
        window.location.href = "http://admin-test.edit-place.co.uk/processao/newaos-list?submenuId=ML2-SL1&tab=newmissiontab";
    else
        $("#"+tab).addClass(\'active\');
    $(\'#newmissionsgrid\').dataTable({
        "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
        "sPaginationType": "bootstrap",
        "aaSorting": [[ 0, "asc" ]],
        "sScrollXInner" : \'200px\',
        "aoColumns": [
            { "sType": "formatted-num" },
            { "sType": "string" },
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
    $(\'#ongoingmissionsgrid\').dataTable({
        "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
        "sPaginationType": "bootstrap",
        "aaSorting": [[ 0, "asc" ]],
        "aoColumns": [
            { "sType": "formatted-num" },
            { "sType": "string" },
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
    $(\'#refusemissionsgrid\').dataTable({
        "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
        "sPaginationType": "bootstrap",
        "aaSorting": [[ 0, "asc" ]],
        "aoColumns": [
            { "sType": "formatted-num" },
            { "sType": "string" },
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
    $(\'#validmissionsgrid\').dataTable({
        "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
        "sPaginationType": "bootstrap",
        "aaSorting": [[ 0, "asc" ]],
        "aoColumns": [
            { "sType": "formatted-num" },
            { "sType": "string" },
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
    $(\'#closemissionsgrid\').dataTable({
        "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
        "sPaginationType": "bootstrap",
        "aaSorting": [[ 0, "asc" ]],
        "aoColumns": [
            { "sType": "formatted-num" },
            { "sType": "string" },
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
/*$("#editaopop").live(\'click\',function(e) { //alert("hello");
    e.preventDefault();
    var href = $(this).attr(\'href\');
    $("#editao").removeData(\'modal\');
    $(\'#editao .modal-body\').load(href);
    $("#editao").modal();
    $(".modal-backdrop:gt(0)").remove();
    //$(\'.modal-backdrop\').css(\'opacity\',\'0.0\');

});
$("#publishaopop").live(\'click\',function(e) { //alert("hello");
    e.preventDefault();
    var href = $(this).attr(\'href\');
    $("#publishao").removeData(\'modal\');
    $(\'#publishao .modal-body\').load(href);
    $("#publishao").modal();
    $(".modal-backdrop:gt(0)").remove();

});*/
</script>
'; ?>

<div class="row-fluid">
  <div class="span12" style="">
<!--    <h3 class="heading">Mod&eacute;ration mission libert&eacute;<a href="#searchblock" onclick="showSearch();"  class="label label-inverse alignright">Search</a></h3>
-->     <div class="hide" id="searchblock">
      <form action=<?php echo $_SERVER['REQUEST_URI']; ?>
 method="get" id="searchform" name="searchform" >
          <input type="hidden" id="submenuId" name="submenuId"  value="<?php echo $this->_tpl_vars['submenuId']; ?>
"/>
        <table id="searchtable" class="table tdleftalign">
            <tr><td class="span1"><input type="text"  placeholder="From" id="dp1" name="startdate" data-date-format="dd-mm-yyyy" value="<?php echo $_GET['startdate']; ?>
"/></td>
                <td class="span5">
                    <select id="clientId" name="clientId" onChange=fnloadao(this.value); data-placeholder="clients" class="span8">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['client_array'],'selected' => $_GET['clientId']), $this);?>

                    </select>
                </td>
                <td class="span1"><button class="btn btn-info pull-left" id="clear" name="clear" type="button" value="clear" onclick="clearAll();" >Clear</button></td>
            </tr>
            <tr>
                <td class="span1"><input type="text"  placeholder="To" id="dp2" name="enddate" data-date-format="dd-mm-yyyy" value="<?php echo $_GET['enddate']; ?>
"/></td>
                <td  class="span5" id="aolist" style="display:none;"> <span id="ao_load"></span></td>
                <td  class="span"id="aolistall" >
                    <select  name=aoId id=aoId data-placeholder="deliveries" class="span8">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['delivery_array'],'selected' => $_GET['aoId']), $this);?>

                    </select>
                </td>
                <td class="span1"><button class="btn btn-info pull-left" id="search" name="search" type="submit" value="search" onclick="return validateSearch();" >Search</button>&nbsp;&nbsp;</td>
            </tr>
        </table>
      </form>
     </div>
     <div class="tabbable">
          <ul class="nav nav-tabs">
              <li <?php if ($_GET['tab'] == 'newmissiontab' || $_GET['tab'] == ''): ?> class="active" <?php endif; ?>><a href="#newmissiontab" data-toggle="tab" class="lable-danger"><strong>Nouvelles missions libert&eacute;</strong></a></li>
              <li <?php if ($_GET['tab'] == 'ongoingtab'): ?> class="active" <?php endif; ?>><a href="#ongoingtab" data-toggle="tab" class="lable-info"><strong>Missions libert&eacute; en cours</strong></a></li>
              <li <?php if ($_GET['tab'] == 'validtab'): ?> class="active" <?php endif; ?>><a href="#validtab" data-toggle="tab" class="lable-info"><strong>Missions libert&eacute; termin&eacute;es</strong></a></li>
              <li <?php if ($_GET['tab'] == 'refusetab'): ?> class="active" <?php endif; ?>><a href="#refusetab" data-toggle="tab" class="lable-info"><strong>Missions libert&eacute; refus&eacute;es</strong></a></li>
              <li <?php if ($_GET['tab'] == 'closetab'): ?> class="active" <?php endif; ?>><a href="#closetab" data-toggle="tab" class="lable-info"><strong>Missions libert&eacute; annul&eacute;es</strong></a></li>
          </ul>
          <div class="tab-content">
          <div id="newmissiontab" class="tab-pane" style="overflow-x: scroll;">
             <table id="newmissionsgrid" class="table table-bordered table-striped table_vam"  style="overflow-x: scroll;">
                <thead>
                <tr>
                    <th>SL.NO</th>
                    <th>Titre</th>
                    <th>Client</th>
                    <th>Create</th>
                    <th>Type of content</th>
                    <th>Language</th>
                    <th>writing/translation</th>
                    <th>History</th>
                    <th>Status</th>
                    <th>Number of Participants</th>
                    <th>Payments</th>
                    <th>Action</th>
                    <th>CA Generated</th>
                </tr>
                </thead>
                <tbody>
                <?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['newaos_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['newaos_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['newaos_key'] => $this->_tpl_vars['newaos_item']):
        $this->_foreach['newaos_loop']['iteration']++;
?>
                <tr>
                    <td><?php echo ($this->_foreach['newaos_loop']['iteration']-1)+1; ?>
</td>
                    <td><a data-target="#artprofile" role="button" href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['newaos_item']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['newaos_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)))) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a></td>
                    <td><a href="/user/client-edit?submenuId=ML10-SL2&tab=viewclient&userId=<?php echo $this->_tpl_vars['newaos_item']['user_id']; ?>
" class="hint--bottom hint--info" data-hint="since : <?php echo ((is_array($_tmp=$this->_tpl_vars['newaos_item']['doj'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"><?php if ($this->_tpl_vars['newaos_item']['company_name'] != ''): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['newaos_item']['company_name'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
<?php else: ?><?php echo $this->_tpl_vars['newaos_item']['email']; ?>
<?php endif; ?></a></td>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['newaos_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y &agrave; %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y &agrave; %H:%M")); ?>
</td>
                    <td><?php echo $this->_tpl_vars['newaos_item']['deltype']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['newaos_item']['language']; ?>
</td>
                    <td><?php if ($this->_tpl_vars['newaos_item']['content_type'] == 'writing'): ?>R&eacute;daction<?php else: ?>Traduction<?php endif; ?></td>
                    <td><a href="/ongoing/ao-history?ao_id=<?php echo $this->_tpl_vars['newaos_item']['id']; ?>
"  data-toggle="modal" data-hint="history" data-target="#ao_history" ><i class="splashy-information"></i></a></td>
                    <td><?php if ($this->_tpl_vars['newaos_item']['status_bo'] == ''): ?>NEW<?php else: ?><?php echo $this->_tpl_vars['newaos_item']['status_bo']; ?>
<?php endif; ?></td>
                    <td><?php echo $this->_tpl_vars['newaos_item']['contributors']; ?>
</td>
                    <td><?php if ($this->_tpl_vars['newaos_item']['paid_status'] == 'notpaid'): ?>Non pay&eacute;<?php else: ?>pay&eacute;<?php endif; ?></td>
                    <td><!--<a data-toggle="modal" data-target="#publishao" id="publishaopop" href="/processao/showpraoinfo?aoid=<?php echo $this->_tpl_vars['newaos_item']['id']; ?>
&function=publish"><i class="splashy-check"></i></a>-->
                        <a data-toggle="modal" data-target="#editao" id="editaopop" href="/processao/showpraoinfo?aoid=<?php echo $this->_tpl_vars['newaos_item']['id']; ?>
&function=edit"><i class="splashy-pencil"></i></a>
                        <a href="/processao/mission-split?submenuId=ML2-SL1&aoid=<?php echo $this->_tpl_vars['newaos_item']['id']; ?>
" data-hint="split mission" class="hint--left hint--danger"><i class="splashy-diamonds_4"></i></a>
                        <a href="/BO/downloadpremiumquote.php?id=<?php echo $this->_tpl_vars['newaos_item']['quoteid']; ?>
"><i class="splashy-download"></i></a>
                    </td>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['newaos_item']['cost'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
<b> &euro;</b></td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
                </tbody>
             </table>
          </div>
          <div id="ongoingtab" class="tab-pane" style="overflow-x: scroll;">
              <table id="ongoingmissionsgrid" class="table table-bordered table-striped table_vam"  style="overflow-x: scroll;">
                  <thead>
                  <tr>
                    <th>SL.NO</th>
                    <th>Titre</th>
                    <th>Client</th>
                    <th>Create</th>
                    <th>Type of content</th>
                    <th>Language</th>
                    <th>writing/translation</th>
                    <th>History</th>
                    <th>Status</th>
                    <th>Number of Participants</th>
                    <th>Payments</th>
                    <th>Action</th>
                    <th>CA Generated</th>
                </tr>
                  </thead>
                  <tbody>
                  <?php $_from = $this->_tpl_vars['ongoinglist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ongoingaos_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ongoingaos_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ongoingaos_key'] => $this->_tpl_vars['ongoingaos_item']):
        $this->_foreach['ongoingaos_loop']['iteration']++;
?>
                  <tr>
                      <td><?php echo ($this->_foreach['ongoingaos_loop']['iteration']-1)+1; ?>
</td>
                      <td><a data-target="#artprofile" role="button" href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['ongoingaos_item']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['ongoingaos_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)))) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a></td>
                      <td><a href="/user/client-edit?submenuId=ML10-SL2&tab=viewclient&userId=<?php echo $this->_tpl_vars['ongoingaos_item']['user_id']; ?>
" class="hint--bottom hint--info" data-hint="since : <?php echo ((is_array($_tmp=$this->_tpl_vars['ongoingaos_item']['doj'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"><?php if ($this->_tpl_vars['ongoingaos_item']['company_name'] != ''): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['ongoingaos_item']['company_name'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
<?php else: ?><?php echo $this->_tpl_vars['ongoingaos_item']['email']; ?>
<?php endif; ?></a></td>
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['ongoingaos_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y &agrave; %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y &agrave; %H:%M")); ?>
</td>
                      <td><?php echo $this->_tpl_vars['ongoingaos_item']['deltype']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['ongoingaos_item']['language']; ?>
</td>
                      <td><?php if ($this->_tpl_vars['ongoingaos_item']['content_type'] == 'writing'): ?>R&eacute;daction<?php else: ?>Traduction<?php endif; ?></td>
                      <td><a href="/ongoing/ao-history?ao_id=<?php echo $this->_tpl_vars['ongoingaos_item']['id']; ?>
"  data-toggle="modal" data-hint="history" data-target="#ao_history" ><i class="splashy-information"></i></a></td>
                      <td><?php echo $this->_tpl_vars['ongoingaos_item']['latestStatus']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['ongoingaos_item']['contributors']; ?>
</td>
                      <td><?php if ($this->_tpl_vars['ongoingaos_item']['paid_status'] == 'notpaid'): ?>Non pay&eacute;<?php else: ?>pay&eacute;<?php endif; ?></td>
                      <td><!--<a data-toggle="modal" data-target="#publishao" id="publishaopop" href="/processao/showpraoinfo?aoid=<?php echo $this->_tpl_vars['ongoingaos_item']['id']; ?>
&function=publish"><i class="splashy-check"></i></a>
-->                          <a data-toggle="modal" data-target="#editao" id="editaopop" href="/processao/showpraoinfo?aoid=<?php echo $this->_tpl_vars['ongoingaos_item']['id']; ?>
&function=edit"><i class="splashy-pencil"></i></a>
                          <a href="/processao/mission-split?submenuId=ML2-SL1&aoid=<?php echo $this->_tpl_vars['ongoingaos_item']['id']; ?>
" data-hint="split mission" class="hint--left hint--danger"><i class="splashy-diamonds_4"></i></a>
                          <a href="/BO/downloadpremiumquote.php?id=<?php echo $this->_tpl_vars['newaos_item']['quoteid']; ?>
"><i class="splashy-download"></i></a>
                      </td>
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['newaos_item']['cost'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
<b> &euro;</b></td>
                  </tr>
                  <?php endforeach; endif; unset($_from); ?>
                  </tbody>
              </table>
          </div>
          <div id="validtab" class="tab-pane" style="overflow-x: scroll;">
              <table id="validmissionsgrid" class="table table-bordered table-striped table_vam" style="overflow-x: scroll;">
                  <thead>
                  <tr>
                    <th>SL.NO</th>
                    <th>Titre</th>
                    <th>Client</th>
                    <th>Create</th>
                    <th>Type of content</th>
                    <th>Language</th>
                    <th>writing/translation</th>
                    <th>History</th>
                    <th>Status</th>
                    <th>Number of Participants</th>
                    <th>Payments</th>
                    <th>Action</th>
                    <th>CA Generated</th>
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
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['validaos_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y &agrave; %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y &agrave; %H:%M")); ?>
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
"><i class="splashy-download"></i></a>
                      </td>
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['validaos_item']['cost'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
<b> &euro;</b></td>
                  </tr>
                  <?php endforeach; endif; unset($_from); ?>
                  </tbody>
              </table>
          </div>
          <div id="refusetab" class="tab-pane" style="overflow-x: scroll;">
              <table id="refusemissionsgrid" class="table table-bordered table-striped table_vam" style="overflow-x: scroll;">
                  <thead>
                  <tr>
                    <th>SL.NO</th>
                    <th>Titre</th>
                    <th>Client</th>
                    <th>Create</th>
                    <th>Type of content</th>
                    <th>Language</th>
                    <th>writing/translation</th>
                    <th>History</th>
                    <th>Status</th>
                    <th>Number of Participants</th>
                    <th>Payments</th>
                    <th>Action</th>
                    <th>CA Generated</th>
                </tr>
                  </thead>
                  <tbody>
                  <?php $_from = $this->_tpl_vars['refusedlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['refusedaos_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['refusedaos_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['refusedaos_key'] => $this->_tpl_vars['refusedaos_item']):
        $this->_foreach['refusedaos_loop']['iteration']++;
?>
                  <tr>
                      <td><?php echo ($this->_foreach['refusedaos_loop']['iteration']-1)+1; ?>
</td>
                      <td><a data-target="#artprofile" role="button" href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['refusedaos_item']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['refusedaos_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)))) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a></td>
                      <td><a href="/user/client-edit?submenuId=ML10-SL2&tab=viewclient&userId=<?php echo $this->_tpl_vars['refusedaos_item']['user_id']; ?>
" class="hint--bottom hint--info" data-hint="since : <?php echo ((is_array($_tmp=$this->_tpl_vars['refusedaos_item']['doj'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"><?php if ($this->_tpl_vars['refusedaos_item']['company_name'] != ''): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['refusedaos_item']['company_name'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
<?php else: ?><?php echo $this->_tpl_vars['refusedaos_item']['email']; ?>
<?php endif; ?></a></td>
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['refusedaos_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y &agrave; %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y &agrave; %H:%M")); ?>
</td>
                      <td><?php echo $this->_tpl_vars['refusedaos_item']['deltype']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['refusedaos_item']['language']; ?>
</td>
                      <td><?php if ($this->_tpl_vars['refusedaos_item']['content_type'] == 'writing'): ?>R&eacute;daction<?php else: ?>Traduction<?php endif; ?></td>
                      <td><a href="/ongoing/ao-history?ao_id=<?php echo $this->_tpl_vars['refusedaos_item']['id']; ?>
"  data-toggle="modal" data-hint="history" data-target="#ao_history"><i class="splashy-information"></i></a></td>
                      <td><?php echo $this->_tpl_vars['refusedaos_item']['latestStatus']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['refusedaos_item']['contributors']; ?>
</td>
                      <td><?php if ($this->_tpl_vars['refusedaos_item']['paid_status'] == 'notpaid'): ?>Non pay&eacute;<?php else: ?>pay&eacute;<?php endif; ?></td>
                      <td><!--<a data-toggle="modal" data-target="#publishao" id="publishaopop" href="/processao/showpraoinfo?aoid=<?php echo $this->_tpl_vars['refusedaos_item']['id']; ?>
&function=publish"><i class="splashy-check"></i></a>-->
                          <a data-toggle="modal" data-target="#editao" id="editaopop" href="/processao/showpraoinfo?aoid=<?php echo $this->_tpl_vars['refusedaos_item']['id']; ?>
&function=edit"><i class="splashy-pencil"></i></a>
                          <a href="/processao/mission-split?submenuId=ML2-SL1&aoid=<?php echo $this->_tpl_vars['refusedaos_item']['id']; ?>
" data-hint="split mission" class="hint--left hint--danger"><i class="splashy-diamonds_4"></i></a>
                          <a href="/BO/downloadpremiumquote.php?id=<?php echo $this->_tpl_vars['newaos_item']['quoteid']; ?>
"><i class="splashy-download"></i></a>
                      </td>
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['refusedaos_item']['cost'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
<b> &euro;</b></td>
                  </tr>
                  <?php endforeach; endif; unset($_from); ?>
                  </tbody>
              </table>
          </div>
          <div id="closetab" class="tab-pane" style="overflow-x: scroll;">
              <table id="closemissionsgrid" class="table table-bordered table-striped table_vam" style="overflow-x: scroll;">
                  <thead>
                  <tr>
                    <th>SL.NO</th>
                    <th>Titre</th>
                    <th>Client</th>
                    <th>Create</th>
                    <th>Type of content</th>
                    <th>Language</th>
                    <th>writing/translation</th>
                    <th>History</th>
                    <th>Status</th>
                    <th>Number of Participants</th>
                    <th>Payments</th>
                    <th>Action</th>
                    <th>CA Generated</th>
                </tr>
                  </thead>
                  <tbody>
                  <?php $_from = $this->_tpl_vars['cancelledlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['closedaos_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['closedaos_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['closedaos_key'] => $this->_tpl_vars['closedaos_item']):
        $this->_foreach['closedaos_loop']['iteration']++;
?>
                  <tr>
                      <td><?php echo ($this->_foreach['closedaos_loop']['iteration']-1)+1; ?>
</td>
                      <td><a data-target="#artprofile" role="button" href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['closedaos_item']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['closedaos_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)))) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a></td>
                      <td><a href="/user/client-edit?submenuId=ML10-SL2&tab=viewclient&userId=<?php echo $this->_tpl_vars['closedaos_item']['user_id']; ?>
" class="hint--bottom hint--info" data-hint="since : <?php echo ((is_array($_tmp=$this->_tpl_vars['closedaos_item']['doj'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"><?php if ($this->_tpl_vars['closedaos_item']['company_name'] != ''): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['closedaos_item']['company_name'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
<?php else: ?><?php echo $this->_tpl_vars['closedaos_item']['email']; ?>
<?php endif; ?></a></td>
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['closedaos_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y &agrave; %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y &agrave; %H:%M")); ?>
</td>
                      <td><?php echo $this->_tpl_vars['closedaos_item']['deltype']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['closedaos_item']['language']; ?>
</td>
                      <td><?php if ($this->_tpl_vars['closedaos_item']['content_type'] == 'writing'): ?>R&eacute;daction<?php else: ?>Traduction<?php endif; ?></td>
                      <td><a href="/ongoing/ao-history?ao_id=<?php echo $this->_tpl_vars['closedaos_item']['id']; ?>
"  data-toggle="modal" data-hint="history" data-target="#ao_history" ><i class="splashy-information"></i></a></td>
                      <td><?php echo $this->_tpl_vars['closedaos_item']['latestStatus']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['closedaos_item']['contributors']; ?>
</td>
                      <td><?php if ($this->_tpl_vars['closedaos_item']['paid_status'] == 'notpaid'): ?>Non pay&eacute;<?php else: ?>pay&eacute;<?php endif; ?></td>
                      <td><!--<a data-toggle="modal" data-target="#publishao" id="publishaopop" href="/processao/showpraoinfo?aoid=<?php echo $this->_tpl_vars['closedaos_item']['id']; ?>
&function=publish"><i class="splashy-check"></i></a>-->
                          <a data-toggle="modal" data-target="#editao" id="editaopop" href="/processao/showpraoinfo?aoid=<?php echo $this->_tpl_vars['closedaos_item']['id']; ?>
&function=edit"><i class="splashy-pencil"></i></a>
                          <a href="/processao/mission-split?submenuId=ML2-SL1&aoid=<?php echo $this->_tpl_vars['closedaos_item']['id']; ?>
" data-hint="split mission" class="hint--left hint--danger"><i class="splashy-diamonds_4"></i></a>
                          <a href="/BO/downloadpremiumquote.php?id=<?php echo $this->_tpl_vars['newaos_item']['quoteid']; ?>
"><i class="splashy-download"></i></a>
                      </td>
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['closedaos_item']['cost'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
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


