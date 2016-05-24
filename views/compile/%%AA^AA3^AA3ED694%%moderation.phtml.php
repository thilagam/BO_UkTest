<?php /* Smarty version 2.6.19, created on 2015-03-24 12:41:00
         compiled from gebo/correction/moderation.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/correction/moderation.phtml', 71, false),array('modifier', 'escape', 'gebo/correction/moderation.phtml', 71, false),array('modifier', 'wordwrap', 'gebo/correction/moderation.phtml', 71, false),array('modifier', 'date_format', 'gebo/correction/moderation.phtml', 79, false),)), $this); ?>
<script src="/BO/theme/gebo/lib/tiny_mce/jquery.tinymce.js"></script>
<?php echo '
<script language="javascript">
$(document).ready(function() {

    $(\'#moderationgrid\').dataTable({
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
            { "sType": "natural" }
        ]
    });
    $("#bouser").chosen({ allow_single_deselect: false,search_contains: true  });
});

function fnloaduser()
{
    var bouser=$(\'#bouser\').val();
    window.location="/correction/moderation?submenuId=ML3-SL10&bouser="+bouser;
}
/////// moderation correciton page////////
function getModerateCorrection(artId)
{
    var target_page = "/correction/moderationcorrection?articleid="+artId; //
    $.post(target_page, function(data){   alert(data);
        //$("#commentsRefuse_"+userid).val(data);
    });

}
</script>
'; ?>

<div class="row-fluid">
    <div class="span12" >
        <h3 class="heading">Correction Moderation </h3><div >
            <form action="/correction/moderation?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post" id="moderation" name="moderation">
                <strong style="position:relative;top:-10px;padding-left:30%;">Bo Users :</strong> <select name="bouser" id="bouser" onchange="fnloaduser();"  >
                <option value="0" >Select user</option>
                <?php $_from = $this->_tpl_vars['userList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['uk'] => $this->_tpl_vars['user']):
        $this->_foreach['users']['iteration']++;
?>
                <option value=<?php echo $this->_tpl_vars['user']->identifier; ?>
 <?php if ($this->_tpl_vars['user']->identifier == $_GET['bouser'] || $this->_tpl_vars['user']->identifier == $this->_tpl_vars['loginuser']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['user']->login; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            </select>
            </form>
        </div>

    <form action="/correction/moderation?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post" id="moderation" name="moderation">
        <table id="moderationgrid" class="table table-bordered table-striped table_vam">
	  	   	<thead>
				<tr>
				  <th>Article</th>
				  <th>Delivery</samp></th>
				  <th>Writer</th>
                  <th>Corrector</th>
                  <th>Decision</th>
                  <th>Date</th>
				  <th>Decision EP</th>
				  <!--<th><samp id="841"><?php echo $this->_tpl_vars['nodes'][841]; ?>
</samp></th>
				  <th><samp id="842"><?php echo $this->_tpl_vars['nodes'][842]; ?>
</samp></th>-->
				</tr>
			</thead>
			<tbody>
			 <?php $_from = $this->_tpl_vars['paginator']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moderation_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moderation_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['moderation_key'] => $this->_tpl_vars['moderation_item']):
        $this->_foreach['moderation_loop']['iteration']++;
?>
				<tr>
					<td>
						<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['moderation_item']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</td>
					<td>
						<a href="/ongoing/ao-details?submenuId=ML2-SL4&client_id=<?php echo $this->_tpl_vars['moderation_item']['owner']; ?>
&ao_id=<?php echo $this->_tpl_vars['moderation_item']['delivery_id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['moderation_item']['deliveryTitle'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</a>
					</td>
					<td> <a href="/user/contributor-edit?submenuId=ML2-SL7&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['moderation_item']['contributor']; ?>
"><?php echo $this->_tpl_vars['moderation_item']['contributor_name']; ?>
</a></td>
					<!-- <div class="col-two">CAT&Eacute;GORIE</div>-->
                    <td><a href="/user/contributor-edit?submenuId=ML2-SL7&tab=viewcontrib&userId=<?php echo $this->_tpl_vars['moderation_item']['corrector']; ?>
"><?php echo $this->_tpl_vars['moderation_item']['corrector_name']; ?>
</a> </td>
                    <td> <?php if ($this->_tpl_vars['moderation_item']['status'] == 'disapproved_temp'): ?> Refus resoumission <?php else: ?> Refus d&eacute;finitif <?php endif; ?></td>
                    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['moderation_item']['updated_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>

					<td>
                        <!--<a  style="cursor: pointer;text-decoration: underline" onclick="return getAcceptCrtChoice('<?php echo $this->_tpl_vars['moderation_item']['artId']; ?>
','<?php echo $this->_tpl_vars['moderation_item']['status']; ?>
');">accept</a> /
                        <a  style="cursor: pointer;text-decoration: underline" onclick="return getRefuseCrtChoice('<?php echo $this->_tpl_vars['moderation_item']['artId']; ?>
','<?php echo $this->_tpl_vars['moderation_item']['status']; ?>
');">refuse</a>-->
                        <a  style="cursor: pointer;text-decoration: underline" href="/correction/moderation-correction?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
&articleid=<?php echo $this->_tpl_vars['moderation_item']['artId']; ?>
&status=<?php echo $this->_tpl_vars['moderation_item']['status']; ?>
">
                            <i class='splashy-application_windows_edit'></i></a>
                    </td>
                 </tr>
              <?php endforeach; endif; unset($_from); ?>
	         </tbody>
	    </table>
    </form>
    </div>
</div>

<!--///for the correction moderate popup///-->
<div class="modal2 hide fade" id="moderate">
    <div class="modal-header">
        <button class="close" onclick="closePopup('moderate');">&times;</button>
        <h3>Moderate</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
    </div>
</div>

