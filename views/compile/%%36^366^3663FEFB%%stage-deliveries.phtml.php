<?php /* Smarty version 2.6.19, created on 2016-01-13 13:55:50
         compiled from gebo/proofread/stage-deliveries.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'gebo/proofread/stage-deliveries.phtml', 89, false),array('modifier', 'stripslashes', 'gebo/proofread/stage-deliveries.phtml', 137, false),array('modifier', 'wordwrap', 'gebo/proofread/stage-deliveries.phtml', 137, false),array('modifier', 'date_format', 'gebo/proofread/stage-deliveries.phtml', 143, false),array('modifier', 'upper', 'gebo/proofread/stage-deliveries.phtml', 143, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
    $(document).ready(function() {
        $(\'#stagedelgrid\').dataTable({
            "sDom": "<\'row\'<\'span6\'<\'dt_actions\'>l><\'span6\'f>r>t<\'row\'<\'span6\'i><\'span6\'p>>",
            "sPaginationType": "bootstrap",
            "bSort": true,
            "aaSorting": [ [ 7, \'desc\' ] ],
            "aoColumns": [
                { "sType": "formatted-num" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "numeric-html" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "string" },
                { "sType": "date-euro" },
                { "sType": "string" }
            ]
        });
        jQuery.fn.dataTableExt.oSort[\'numeric-html-asc\']  = function(a,b) {
            a = parseInt($(a).text());
            b = parseInt($(b).text());
            return ((a < b) ? -1 : ((a > b) ?  1 : 0));
        };

        jQuery.fn.dataTableExt.oSort[\'numeric-html-desc\']  = function(a,b) {
            a = parseInt($(a).text());
            b = parseInt($(b).text());
            return ((a < b) ? 1 : ((a > b) ?  -1 : 0));
        };
    });

    ////////re publish the confirmation ////////
    function republishConfirm(artid)
    {
        var confirmation = confirm("Item will be back online")
        if(confirmation)
        {
            var confirmation1 = confirm("Anounce by Email")
            if(confirmation1)
               // $(location).href("/processao/publisharticlefo?art_id="+artid+"&sendmail=yes");
                window.location.href = "/processao/publisharticlefo?art_id="+artid+"&sendmail=yes";
            else
                //$(location).href("/processao/publisharticlefo?art_id="+artid+"&sendmail=no");
                window.location.href = "/processao/publisharticlefo?art_id="+artid+"&sendmail=no";
        }
        else
        {
            return false;
        }
    }


</script>
'; ?>

<!--<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li>
				<a href="/index"><i class="icon-home"></i></a>
			</li>
			<li>
				<a>Relecture</a>
			</li>
			<li>
				Relecture phase 1
			</li>
		</ul>
	</div>
</nav>
--><?php if ($this->_tpl_vars['submenuId'] == 'ML3-SL2'): ?>
<?php $this->assign('currentstage', '1'); ?>
<?php elseif ($this->_tpl_vars['submenuId'] == 'ML3-SL3'): ?>
<?php $this->assign('currentstage', '2'); ?>
<?php else: ?><?php $this->assign('currentstage', '0'); ?><?php endif; ?>

<div class="row-fluid">
  <div class="span12">
    <h3 class="heading"><?php if ($this->_tpl_vars['currentstage'] == 1): ?> Correction phase 1 <?php elseif ($this->_tpl_vars['currentstage'] == 2): ?>  Final Phase <?php else: ?> Plagiarism Phase<?php endif; ?><a href="#searchblock"  onclick="showSearch();"  class="label label-inverse alignright">Search</a></h3>
      <div class="hide" id="searchblock" >
          <form action=<?php echo $_SERVER['REQUEST_URI']; ?>
 method="get" id="searchform" name="searchform" >
              <input type="hidden" id="submenuId" name="submenuId"  value="<?php echo $this->_tpl_vars['submenuId']; ?>
"/>
              <table id="searchtable" class="table tdleftalign">
                  <tr><td class="span1"><input type="text" placeholder="From" id="dp1" name="startdate" data-date-format="dd-mm-yyyy" value="<?php echo $_GET['startdate']; ?>
"/></td>
                      <td class="span1"><input type="text"  placeholder="To" id="dp2" name="enddate" data-date-format="dd-mm-yyyy" value="<?php echo $_GET['enddate']; ?>
"/></td>
                      <td class="span5">
                          <select id="clientId" name="clientId" onChange=fnloadao(this.value); data-placeholder="clients" class="span12">
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['client_array'],'selected' => $_GET['clientId']), $this);?>

                          </select>
                      </td>
                      <td class="span1"> <button class="btn btn-info pull-center" id="clear" name="clear" type="button" value="clear" onclick="clearAll();" >Clear</button></td>
                  </tr>
                  <tr>
                      <td class="span1">
                          <select   name=inchargeId id=inchargeId data-placeholder="&Eacute;diteur en charge">
                          <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['incharge_array'],'selected' => $_GET['inchargeId']), $this);?>

                          </select>
                      </td>
                      <td class="span1"> <select name="closed" id="closed" data-placeholder="Type d'AO">
                          <option value="0"></option>
                          <option value="all" <?php if ($_GET['closed'] == 'all'): ?>selected="selected"<?php endif; ?>>ALL</option>
                          <option value="closed" <?php if ($_GET['closed'] == 'closed'): ?>selected="selected"<?php endif; ?>>CLOSED</option>
                          <option value="notclosed" <?php if ($_GET['closed'] == 'notclosed'): ?>selected="selected"<?php endif; ?>>NOT CLOSED</option>
                          </select></td>
                      <td  class="span5" id="aolist" style="display:none;"> <span id="ao_load"></span></td>
                      <td  class="span5" id="aolistall">
                          <select  name=aoId id=aoId data-placeholder="Appel d'offre" class="span12">
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['delivery_array'],'selected' => $_GET['aoId']), $this);?>

                          </select>
                      </td>

                      <td class="span1"><button class="btn btn-info pull-center" id="search" name="search" type="submit" value="search" onclick="return validateSearch();" >Search</button></td>
                  </tr>
              </table>
          </form>
      </div>
      <table id="stagedelgrid" class="table table-bordered table-striped table_vam">
          <thead>
          <tr>
            <th>Sl.no</th>
            <th>Delivery Title</th>
            <th>Client</th>
            <th>Total Articles</th>
            <th>Articles to be treated</th>
            <th>Articles traite</th>
            <th>Category</th>
            <th>Create at</th>
            <th>Editor in charge</th>
                      </tr>
          </thead>
          <tbody>
          <?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['stagedel_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['stagedel_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['stagedel_key'] => $this->_tpl_vars['stagedel_item']):
        $this->_foreach['stagedel_loop']['iteration']++;
?>
          <tr>
              <td><?php echo ($this->_foreach['stagedel_loop']['iteration']-1)+1; ?>
</td>
              <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['stagedel_item']['deliveryTitle'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</td>
              <td><?php if ($this->_tpl_vars['stagedel_item']['client'] != ''): ?><?php echo $this->_tpl_vars['stagedel_item']['client']; ?>
<?php else: ?><?php echo $this->_tpl_vars['stagedel_item']['client']; ?>
<?php endif; ?></td>
              <td><?php if ($this->_tpl_vars['groupId'] == 1 || $this->_tpl_vars['groupId'] == 4): ?><a class="num-large" href="/ongoing/ao-details?client_id=<?php echo $this->_tpl_vars['stagedel_item']['client_id']; ?>
&ao_id=<?php echo $this->_tpl_vars['stagedel_item']['delivery_id']; ?>
&submenuId=ML2-SL4"><?php echo $this->_tpl_vars['stagedel_item']['total_article']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['stagedel_item']['total_article']; ?>
<?php endif; ?></td>
              <td><a class="num-large" href="/proofread/stage-articles?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&aoId=<?php echo $this->_tpl_vars['stagedel_item']['delivery_id']; ?>
" ><?php echo $this->_tpl_vars['stagedel_item']['atraiter']; ?>
</a></td>
              <td><?php if ($this->_tpl_vars['groupId'] == 1 || $this->_tpl_vars['groupId'] == 4): ?><?php echo $this->_tpl_vars['stagedel_item']['traiter']; ?>
<?php else: ?><?php echo $this->_tpl_vars['stagedel_item']['traiter']; ?>
<?php endif; ?></td>
              <td><?php echo $this->_tpl_vars['stagedel_item']['del_category']; ?>
</td>
              <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['stagedel_item']['delcreatedat'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")))) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</td>
              <td><?php echo $this->_tpl_vars['stagedel_item']['incharge']; ?>
</td>
                        </tr>
         <?php endforeach; endif; unset($_from); ?>
         </tbody>
      </table>
      <div style="width: 100%;float: left;"><span class="label label-important"  style="float: left; margin-left: 400px;">Total number of articles waiting : <?php echo $this->_tpl_vars['totalatraiter']; ?>
</span></div>
  </div>
</div>
    <input type="hidden" id="hide_total" name="hide_total"  />

<!--///for the article profiles popup///-->
<div class="modal4 hide fade" id="artprofile">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h3>Article Profiles</h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer"></div>
</div>