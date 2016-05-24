<?php /* Smarty version 2.6.19, created on 2013-06-20 15:16:06
         compiled from gebo/processao/profileslist.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/processao/profileslist.phtml', 60, false),array('modifier', 'stripslashes', 'gebo/processao/profileslist.phtml', 131, false),array('modifier', 'wordwrap', 'gebo/processao/profileslist.phtml', 131, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
    $(window).load(function() {
        $(\'#dt_gal\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "aaSorting": [[ 2, "asc" ]],
            "aoColumns": [

                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "formatted-num" },
                { "sType": "formatted-num" },
                { "sType": "formatted-num" },
                { "sType": "formatted-num" },
                { "sType": "eu_date" },
                { "bSortable": false }
            ]
        });
        $(\'.dt_actions\').html($(\'.dt_gal_actions\').html());
    });
    ///////////for all contributors details list in popup////////////////
    function getParticipatedProfiles($aoid)
    {
        var target_page = "/processao/showgroupprofiles?$aoId="+$aoid;
        $.post(target_page, function(data){   //alert(data);
            $("#grpprofilepopup").show(data);
            $("#grpprofilepopup").html(data);
        });
    }
</script>
'; ?>

<form action="/processao/profileslist?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="get" id="searchprofile" name="searchprofile" >
  <?php if ($this->_tpl_vars['actionmessages'][0]): ?>
    <div class="alert alert-success">
      <a class="close" data-dismiss="alert">×</a>
      <strong><?php echo $this->_tpl_vars['actionmessages'][0]; ?>
</strong>
    </div>
  <?php endif; ?>
<!--//////search popup////-->
<div class="modal3 hide" id="searchpopup"  >
    <div class="modal-header">
        <button class="close" data-dismiss="modal3">×</button>
        <h3>Search this page</h3>
    </div>
    <div class="modal3-body">

        <input type="hidden" id="submenuId" name="submenuId"  value="<?php echo $this->_tpl_vars['submenuId']; ?>
"/>

        <table width="1000" border="0">
            <tr>
                <td>From</td>
                <td>:  <input type="text" placeholder="start date" id="start_date" name="start_date" readonly="readonly" value="<?php echo $this->_tpl_vars['startdate']; ?>
"/></td>
                <td>To</td>
                <td>:  <input type="text" id="end_date" name="end_date" readonly="readonly" value="<?php echo $this->_tpl_vars['enddate']; ?>
"  /></td>
            </tr>
            <tr>
                <td>Aos</td>
                <td>: <?php echo smarty_function_html_options(array('name' => 'aotitle','id' => 'aotitle','options' => $this->_tpl_vars['aoList'],'onChange' => "fnloadao();",'selected' => $this->_tpl_vars['aotitle'],'style' => "width: 200px;"), $this);?>
</td>
                <td>Articles</td>
                <td>:  <input type="text" id="artname" name="artname"  value="<?php echo $this->_tpl_vars['artname']; ?>
"  />
                    <!-- <?php echo smarty_function_html_options(array('name' => 'arttitle','id' => 'arttitle','options' => $this->_tpl_vars['artList'],'selected' => $this->_tpl_vars['arttitle'],'style' => "width: 200px;"), $this);?>
--></td>
            </tr>

            <tr>
                <td>Contributors</td>
                <td>:  <span id="contrib_load">
<!--                   <?php echo smarty_function_html_options(array('name' => 'contribnames','id' => 'contribnames','options' => $this->_tpl_vars['contriboptions'],'selected' => $this->_tpl_vars['contribnames'],'style' => "width: 200px;"), $this);?>
-->
                </span>
              <span id="contrib_preload">
               <select multiple="multiple" id="contribnames" name="contribnames[]" class="" >
                   <?php echo smarty_function_html_options(array('id' => 'contribnames','options' => $this->_tpl_vars['contrib_list'],'selected' => $this->_tpl_vars['contribnames']), $this);?>

               </select>
              </span></td>
                <td>Select By</td>
                <td>:  <select name="selection_type" id="selection_type"  data-placeholder="macarina" class="text-field-big">
                    <option value="0">Select</option>
                    <option value="all">All</option>
                    <option value="1" <?php if ($this->_tpl_vars['statusSel'] == '1'): ?>selected="selected"<?php endif; ?>>ONGOING</option>
                    <option value="bo">JC valid&eacute;<!--CLOSED--><!-- BY BO--></option>
                    <option value="client" <?php if ($this->_tpl_vars['statusSel'] == 'client'): ?>selected="selected"<?php endif; ?>>Client valid&eacute;<!--CLOSED BY CLIENT--></option>
                    <option value="auto" <?php if ($this->_tpl_vars['statusSel'] == 'auto'): ?>selected="selected"<?php endif; ?>> SC valid&eacute;<!--CLOSED BY CRON--></option>
                    <option value="auto_temp" <?php if ($this->_tpl_vars['statusSel'] == 'bid_refused_temp'): ?>selected="selected"<?php endif; ?>>JC &agrave; valider<!--NOT CLOSED--></option>
                </select></td>
            </tr>
            <tr>
                <td>Closed</td>
                <td>:  <select name="closed" id="closed" data-placeholder="closed"  class="text-field-big">
                    <option value="0">Select</option>
                    <option value="closed" <?php if ($this->_tpl_vars['closed'] == 'closed'): ?>selected="selected"<?php endif; ?>>CLOSED</option>
                    <option value="2" <?php if ($this->_tpl_vars['closed'] == ''): ?>selected="selected"<?php endif; ?>>NOT CLOSED</option>
                </select></td>
                <td></td>
                <td> </td>
            </tr>

        </table>
    </div>
    <div class="modal3-footer">
        <samp id="42"><input type="submit" value="Search" name="search_button" id="search_button" class="btn" onclick="return validSearch();"/></samp>
    </div>
</div>  </form>

<form action="/processao/selectallprofiles?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post" id="selectallprofile" name="selectallprofile" onsubmit="return validate3NewUser(1);">
<div class="row-fluid">
  <div class="span12">
    <h3 class="heading">Selection profile<a data-toggle="modal"  href="#searchpopup" class="btn pop_over">Search</a></h3>

        <table id="dt_gal" class="table table-bordered table-striped table_vam">
            <thead>
            <tr>
                <th>Sl.no</th>
                <th>Titre AO</th>
                <th>Client</th>
                <th>Total Articles</th>
                <th>Articles affectés</th>
                <th>Articles à réaffecter</th>
                <th>Articles bid en cours</th>
                <th>Editeur en charge</th>

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
                    <a data-html="true" class="pop_over" data-trigger="hover" onclick="return getParticipatedProfiles('<?php echo $this->_tpl_vars['profiles_item']['id']; ?>
');" ><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['profiles_item']['deliveryTitle'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</a></td>
                <td><?php if ($this->_tpl_vars['profiles_item']['company_name'] != ''): ?><?php echo $this->_tpl_vars['profiles_item']['company_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['profiles_item']['email']; ?>
<?php endif; ?></td>
                <td><?php echo $this->_tpl_vars['profiles_item']['artCount']; ?>
</td>
                <td><?php echo $this->_tpl_vars['profiles_item']['affectedart']; ?>
 </td>
                <td><?php echo $this->_tpl_vars['profiles_item']['notaffectedart']; ?>
</td>
                <td><?php echo $this->_tpl_vars['profiles_item']['bidencours']; ?>
</td>
                <td><?php echo $this->_tpl_vars['profiles_item']['incharge']; ?>
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
    <input type="hidden" id="hide_total" name="hide_total" <!--e="" />
</form>

 <!--//////groupprofiles popup////-->
 <div class="modal4 hide in" id="grpprofilepopup">
 </div>



