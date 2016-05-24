<?php /* Smarty version 2.6.19, created on 2013-12-03 14:05:04
         compiled from gebo/processao/mission-split.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'gebo/processao/mission-split.phtml', 58, false),array('modifier', 'substr', 'gebo/processao/mission-split.phtml', 59, false),array('modifier', 'explode', 'gebo/processao/mission-split.phtml', 59, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
function addArticle()
{
    var num = $("#split_no").val();
    if(num == 0 || num == \'\' || isNaN(num)  ){
    smoke.alert("Please enter valid data"); return false;   }
    else
    {
        var missions = $("#missions").text();
        var each_mission = missions.split("|");
        var existmissioncount =  each_mission.length;
        $("#existmissioncount").val(existmissioncount)-1;

        $("#TextBoxesGroup").empty();
        var artname = $("#artname").val();
        for(i=1;i<existmissioncount;i++)       ///filling the text with existed missions
        {
            var counter = i;
            var newTextBoxDiv = $(document.createElement(\'div\'))
                    .attr("id", \'TextBoxDiv\' + counter);
            var each_mission_details = each_mission[counter].split("*");
            newTextBoxDiv.append().html(\'Article \'+ counter + \'    :    \' +
                    \'<input type="text" size="50" class="span9" name="textbox\' + counter +
                    \'" id="textbox\' + counter + \'" value="\' + each_mission_details[0] +
                    \'" >\' +
                    \'<input style="display: none;" type="text" size="30" name="artId\' + counter +
                    \'" id="artId\' + counter + \'" value="\' + each_mission_details[1] +
                    \'" >\'
                    );
            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;
        }
        for(i=existmissioncount;i<=num;i++)        ///continuing the text boxes for new missions
        {
            var counter = i;
            var newTextBoxDiv = $(document.createElement(\'div\'))
                    .attr("id", \'TextBoxDiv\' + counter);
            newTextBoxDiv.append().html(\'Article \'+ counter + \'    :    \' +
                    \'<input type="text" size="50" class="span9" name="textbox\' + counter +
                    \'" id="textbox\' + counter + \'" value="" >\');
            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;
        }
        $("#TextBoxesGroup").show();
        $("#sub_mission").show();
    }
}
 </script>
 '; ?>

 <form action="/processao/savemissions?submenuId=<?php echo $this->_tpl_vars['submenuId']; ?>
" method="post" id="delpublish" name="delpublish" onsubmit="return validate3NewUser(1);">
 <div class="row-fluid">
     <div class="span12">
         <h3 class="heading">Delivery SPLIT</h3>

         <table id="grptabledetails" class="table tdleftalign btn-gebo" >
             <tr>
                 <td style="vertical-align: middle"><b>Delivery : </b><?php echo ((is_array($_tmp=$this->_tpl_vars['deltitle'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
                 <td style="padding-top: 25px;"><b>EXISTING DELIVERY : </b><?php $this->assign('missions', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['artgrouptitle'])) ? $this->_run_mod_handler('substr', true, $_tmp, -1) : smarty_modifier_substr($_tmp, -1)))) ? $this->_run_mod_handler('explode', true, $_tmp, "|") : smarty_modifier_explode($_tmp, "|"))); ?>
                     <?php $_from = $this->_tpl_vars['missions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mission_key'] => $this->_tpl_vars['mission_item']):
?>
                     <?php $this->assign('eachmissions', ((is_array($_tmp=$this->_tpl_vars['mission_item'])) ? $this->_run_mod_handler('explode', true, $_tmp, "*") : smarty_modifier_explode($_tmp, "*"))); ?> <?php echo $this->_tpl_vars['eachmissions'][0]; ?>
 <br/>
                     <?php endforeach; endif; unset($_from); ?></td>
                 <td style="padding-top: 15px;"><b>SPLIT DELIVERY INTO : </b><input id="split_no" name="split_no"  type="text" class="input-mini" />&nbsp;&nbsp;</td>
                 <td style="padding-top: 15px;">    <button type="button" id="sub_splitno" name="sub_splitno" class="btn btn-info"  onclick="addArticle();" >Split</button>
                 <div style="display: none;" id="missions">ex*123|<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['artgrouptitle'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('substr', true, $_tmp, -2) : smarty_modifier_substr($_tmp, -2)); ?>
</div></td>
             </tr>
         </table>
          <input type="hidden" id="artname" name="artname" value="<?php echo $this->_tpl_vars['arttitle']; ?>
" />
          <input type="hidden" id="delId" name="delId" value="<?php echo $this->_tpl_vars['delId']; ?>
" />
          <input type="hidden" id="clientId" name="clientId" value="<?php echo $this->_tpl_vars['clientId']; ?>
" />
          <div id='TextBoxesGroup' class="alert alert-success hide">
             <div id="TextBoxDiv1"></div>
         </div>
         <button type="submit" id="sub_mission" name="sub_mission" class="btn btn-success hide" >create Delivery</button>
         <input type="hidden" name="existmissioncount" id="existmissioncount" value=""/>
     </div>
 </div>
 </form>

