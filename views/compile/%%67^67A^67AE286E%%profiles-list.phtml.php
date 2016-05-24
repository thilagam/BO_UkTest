<?php /* Smarty version 2.6.19, created on 2014-12-01 12:52:09
         compiled from gebo/processao/profiles-list.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/processao/profiles-list.phtml', 50, false),array('function', 'math', 'gebo/processao/profiles-list.phtml', 103, false),array('modifier', 'stripslashes', 'gebo/processao/profiles-list.phtml', 98, false),array('modifier', 'wordwrap', 'gebo/processao/profiles-list.phtml', 98, false),array('modifier', 'upper', 'gebo/processao/profiles-list.phtml', 98, false),array('modifier', 'date_format', 'gebo/processao/profiles-list.phtml', 99, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
$(document).ready(function() {
    $(\'#profilelistgrid\').dataTable({
        "sPaginationType": "bootstrap",
        "iDisplayLength" : 25,
        "sDom": "<\'row\'<\'span4\'l><\'span4\'T><\'span4\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
        "aoColumns": [
            { "sType": "formatted-num" },
            { "sType": "string" },
            { "sType": "string" },
            { "sType": "html" },
            { "sType": "html" },
            { "sType": "html" },
            { "sType": "formatted-num" },
            { "sType": "date-euro" },
            { "sType": "string" }
        ],
        "aaSorting": [[ 0, "asc" ]],
        "oTableTools": {
            "aButtons": [
                "copy",
                "print",
                {
                    "sExtends":    "collection",
                    "sButtonText": \'Save <span class="caret" />\',
                    "aButtons":    [ "csv", "xls", "pdf" ]
                }
            ],
            "sSwfPath": "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
        }
    });

});

</script>
'; ?>


<div class="row-fluid">
  <div class="span12" style="">
    <h3 class="heading">Selection profile<a href="#searchblock" onclick="showSearch();"  class="label label-inverse alignright">Search</a></h3>
     <div class="hide" id="searchblock">
      <form action=<?php echo $_SERVER['REQUEST_URI']; ?>
 method="get" id="searchform" name="searchform" >
          <input type="hidden" id="submenuId" name="submenuId"  value="<?php echo $this->_tpl_vars['submenuId']; ?>
"/>
        <table id="searchtable" class="table tdleftalign">
            <tr><td class="span1"><input type="text"  placeholder="From" id="dp1" name="startdate" data-date-format="dd-mm-yyyy" value="<?php echo $_GET['startdate']; ?>
"/></td>
                <td class="span1"><input type="text"  placeholder="To" id="dp2" name="enddate" data-date-format="dd-mm-yyyy" value="<?php echo $_GET['enddate']; ?>
"/></td>
                <td class="span5">
                    <select id="clientId" name="clientId" onChange=fnloadao(this.value); data-placeholder="clients" class="span12">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['client_array'],'selected' => $_GET['clientId']), $this);?>

                    </select>
                </td>
                <td class="span1"><button class="btn btn-info pull-left" id="clear" name="clear" type="button" value="clear" onclick="clearAll();" >Clear</button></td></tr>
            <tr>
                <td class="span1">
                    <select   name=inchargeId id=inchargeId data-placeholder="&Eacute;diteur en charge">
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['incharge_array'],'selected' => $_GET['inchargeId']), $this);?>

                    </select>
                </td>
                <td class="span1"> <select name="closed" id="closed"  data-placeholder="Type d'AO" >
                    <option value="0"></option>
                    <option value="all" <?php if ($_GET['closed'] == 'all'): ?>selected="selected"<?php endif; ?>>ALL</option>
                    <option value="closed" <?php if ($_GET['closed'] == 'closed'): ?>selected="selected"<?php endif; ?>>CLOSED</option>
                    <option value="notclosed" <?php if ($_GET['closed'] == 'notclosed'): ?>selected="selected"<?php endif; ?>>NOT CLOSED</option>
                </select></td>
                <td  class="span5" id="aolist" style="display:none;"> <span id="ao_load"></span></td>
                <td  class="span5"id="aolistall" >
                    <select  name=aoId id=aoId data-placeholder="Appel d'offre" class="span12">
                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['delivery_array'],'selected' => $_GET['aoId']), $this);?>

                    </select>
                </td>
                <td class="span1"><button class="btn btn-info pull-left" id="search" name="search" type="submit" value="search" onclick="return validateSearch();" >Search</button>&nbsp;&nbsp;</td></tr>
        </table>
      </form>
     </div>

    <table id="profilelistgrid" class="table table-bordered table-striped table_vam">
        <thead>
        <tr>
            <th>SL.NO</th>
            <th>AO TITLE</th>
            <th>CLIENT</th>
            <th>TOTAL ARTICLES</th>
            <th>ARTICLES Assigned</th>
            <th>ANOTHER POST</th>
            <th>BID ITEMS IN PROGRESS</th>
            <th>Created at</th>
           <!-- <th>STATUT</th>-->
            <th>EDITER IN CHARGE</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($this->_tpl_vars['nores'] != 'true'): ?>
        <?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['profiles_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['profiles_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['profiles_key'] => $this->_tpl_vars['profiles_item']):
        $this->_foreach['profiles_loop']['iteration']++;
?>
        <tr>
            <td><?php echo ($this->_foreach['profiles_loop']['iteration']-1)+1; ?>
</td>
            <td>
                <a data-target="#artprofile" role="button" href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['profiles_item']['id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['profiles_item']['deliveryTitle'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)))) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a></td>
            <td><a class="hint--bottom hint--info" data-hint="since : <?php echo ((is_array($_tmp=$this->_tpl_vars['profiles_item']['doj'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
"><?php if ($this->_tpl_vars['profiles_item']['company_name'] != ''): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['profiles_item']['company_name'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['profiles_item']['email'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
<?php endif; ?></a></td>
            <td><a data-target="#artprofile" role="button" class="num-large" href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['profiles_item']['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['profiles_item']['artCount'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a></td>
            <td><?php if ($this->_tpl_vars['profiles_item']['affectedart'] != 0): ?>
            <a data-target="#artprofile" role="button" class="num-large" href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['profiles_item']['id']; ?>
&status=affect"><?php echo $this->_tpl_vars['profiles_item']['affectedart']; ?>
</a><?php else: ?> 0 <?php endif; ?> </td>
            <?php echo smarty_function_math(array('equation' => "a-b-c",'a' => $this->_tpl_vars['profiles_item']['artCount'],'b' => $this->_tpl_vars['profiles_item']['affectedart'],'c' => $this->_tpl_vars['profiles_item']['bidencours'],'assign' => 'notaffectedart'), $this);?>

			<td><?php if ($this->_tpl_vars['notaffectedart'] != 0): ?>
            <a data-target="#artprofile" role="button" class="num-large" href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['profiles_item']['id']; ?>
&status=reaffect"><?php echo $this->_tpl_vars['notaffectedart']; ?>
</a><?php else: ?> 0 <?php endif; ?></td>
            <td><?php if ($this->_tpl_vars['profiles_item']['bidencours'] != 0): ?>
            <a data-target="#artprofile" role="button" class="num-large" href="/processao/article-profiles?submenuId=ML2-SL2&aoId=<?php echo $this->_tpl_vars['profiles_item']['id']; ?>
&status=encours"><?php echo $this->_tpl_vars['profiles_item']['bidencours']; ?>
</a><?php else: ?> 0 <?php endif; ?></td>
            <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['profiles_item']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")))) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</td>
           <!-- <td><?php if ($this->_tpl_vars['profiles_item']['notclosedprofiles'] == 'NO'): ?>NOT CLOSED<?php else: ?>CLOSED<?php endif; ?></td>-->
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['profiles_item']['incharge'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
        <samp id="76"><?php echo $this->_tpl_vars['nodes'][76]; ?>
</samp>
        <?php endif; ?>
        </tbody>
    </table>
  </div>
</div>





